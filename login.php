<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require_once 'components/db_connect.php';

if (isset($_SESSION['ADMIN'])) {
  header("Location:admin/index_admin.php");
  exit;
}


$error = false;
$admin_name = $password = $admin_nameError = $passwordError = '';

if (isset($_POST['login'])) {

  $admin_name = trim($_POST['admin_name']);
  $admin_name = strip_tags($admin_name);
  $admin_name = htmlspecialchars($admin_name);

  $password = trim($_POST['password']);
  $password = strip_tags($password);
  $password = htmlspecialchars($password);

  if (empty($admin_name)) {
    $error = true;
    $admin_nameError = "Please enter your user name.";
  }

  if (empty($password)) {
    $error = true;
    $passwordError = "Please enter your password.";
  }


  if (!$error) {
   $sql = "SELECT admin_id, admin_name, password FROM admin WHERE admin_name = '$admin_name'";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
    $count = mysqli_num_rows($result);
    if ($count == 1 && $row['password'] == $password) {
      if ($row['admin_name'] == 'NoppeAdmin') {
          $_SESSION['ADMIN'] = $row['admin_id'];
          header("Location: admin/index_admin.php");
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
  <title>Login Admin</title>
  <link rel="stylesheet" href="./style/style.css">
  <style>
    form{
      background-color: burlywood;
      display:flex;
      flex-direction :column;
      width: 50%;
      margin:auto;
      margin-top:2rem;
      border-radius:25px;
      padding: 2rem;
      gap :0.5rem;
      border: solid 5px
    }
    .form-control{
      width:50%;
      margin:auto;
      padding:0.5rem;
      border-radius:25px;
      text-align:center
    }
    .btn{
      width:25%;
      padding:0.5rem;
      font-weight:bold;
      margin:auto;
      border-radius:25px;
      background-color: black;
      color:white;
      transition:0.5s
    }
    .btn:hover{
      transform: scale(1.05);
      box-shadow: black 2px 2px 10px 5px ;
      background-color: whitesmoke;
      color:black


    }
  </style>
</head>


<body>

  <form class="login" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    <h1 class="login_title">Login Admin</h1>
    <?php
    if (isset($errMSG)) {
      echo $errMSG;
    }
    ?>

    <input class="form-control" type="text" autocomplete="off" name="admin_name" placeholder="Admin name" value="<?php echo $admin_name; ?>" />
    <span class="text-danger"><?php echo $admin_nameError; ?></span>

    <input class="form-control" type="password" name="password" placeholder="Password" maxlength="15"/>
    <span class="text-danger"><?php echo $passwordError; ?></span>
    <button class="btn" type="submit" name="login">
      Sign In
    </button>
  </form>
<body>
  </html>