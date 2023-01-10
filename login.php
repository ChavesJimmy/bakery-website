<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require_once 'components/db_connect.php';

if (isset($_SESSION['ADMIN'])) {
  header("Location:admin/admin_index.php");
  exit;
}
else{
  header("Location:index.php");
  exit;
} 

$error = false;
$user_name = $password = $user_nameError = $passwordError = '';

if (isset($_POST['login'])) {

  $user_name = trim($_POST['user_name']);
  $user_name = strip_tags($user_name);
  $user_name = htmlspecialchars($user_name);

  $password = trim($_POST['password']);
  $password = strip_tags($password);
  $password = htmlspecialchars($password);

  if (empty($user_name)) {
    $error = true;
    $user_nameError = "Please enter your user name.";
  }

  if (empty($password)) {
    $error = true;
    $passwordError = "Please enter your password.";
  }


  if (!$error) {

    $password = hash('sha256', $password);

   $sql = "SELECT id, status, password FROM users WHERE user_name = '$user_name'";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
    $count = mysqli_num_rows($result);
    if ($count == 1 && $row['password'] == $password) {
      if ($row['status'] == 'ADMIN') {
          $_SESSION['ADMIN'] = $row['id'];
          header("Location: admin/admin_index.php");
      } if ($row['status'] == 'USER'){
          $_SESSION['USER'] = $row['id'];
          header("Location: user/user_index.php");
      } 
  } else {
      $errMSG = "Incorrect Credentials, Try again...";
  }
}
}

  
mysqli_close($connect);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link rel="stylesheet" href="./scss/style.css">
</head>


<body>

  <form class="cont1 container border rounded rounded-3 p-4 w-50 mb-5" style="margin-top:5%; background-color: rgba(127, 123, 116, 0.8431372549);" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    <h1 class="mb-5" style="margin-left:35%;">Login</h1>
    <?php
    if (isset($errMSG)) {
      echo $errMSG;
    }
    ?>

    <input class="form-control mb-3 w-50" type="text" autocomplete="off" name="user_name" placeholder="Username" value="<?php echo $user_name; ?>" maxlength="40" style="margin-left:20%;" />
    <span class="text-danger"><?php echo $user_nameError; ?></span>

    <input class="form-control w-50 mb-3" type="password" name="password" placeholder="Password" maxlength="15" style="margin-left:20%;" />
    <span class="text-danger"><?php echo $passwordError; ?></span>
    <button class="btn btn-block btn-primary mb-3" type="submit" name="login" style="margin-left:20%;">
      Sign In
    </button>
  </form>
<body>
  </html>