<?php
session_start(); 
if (isset($_SESSION['USER']) != "") {
  header("Location: user/index_user.php");
}
if (isset($_SESSION['ADMIN']) != "") {
  header("Location: admin/index_admin.php"); 
} 
require_once 'components/db_connect.php';

$error = false;
$user_name = $email = $password = '';
$user_nameError =  $emailError = $passwordError = '';
if (isset($_POST['btn-signup'])) {

    $user_name = trim($_POST['user_name']);
    $user_name = strip_tags($user_name);
    $user_name = htmlspecialchars($user_name);

    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);

    $password = trim($_POST['password']);
    $password = strip_tags($password);
    $password = htmlspecialchars($password);

    // basic name validation
    if (empty($user_name)) {
        $error = true;
        $nameError = "Please enter a username";
    } else if (strlen($user_name) < 3) {
        $error = true;
        $nameError = "Username must have at least 3 characters.";
    } else if (!preg_match("/^[a-zA-Z]+$/", $user_name)) {
        $error = true;
        $nameError = "Username must contain only letters and no spaces.";
    }

    // basic email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $emailError = "Please enter valid email address.";
    } else {
        // checks whether the email exists or not
        $query = "SELECT email FROM user WHERE email='$email'";
        $result = mysqli_query($connect, $query);
        $count = mysqli_num_rows($result);
        if ($count != 0) {
            $error = true;
            $emailError = "Provided Email is already in use.";
        }
    }
    // password validation
    if (empty($password)) {
        $error = true;
        $passwordError = "Please enter password.";
    } else if (strlen($password) < 6) {
        $error = true;
        $passwordError = "Password must have at least 6 characters.";
    }

    $password = hash('sha256', $password);
    if (!$error) {

        $query = "INSERT INTO user(user_name, password, email)
              VALUES('$user_name','$password', '$email')";
        $res = mysqli_query($connect, $query);

        if ($res) {
            $errTyp = "success";
            $errMSG = "Successfully registered, you may login now";
        } else {
            $errTyp = "danger";
            $errMSG = "Something went wrong, try again later...";
        }
    }
}

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
</head>

<body>

    <div id="register">
        <form class="container" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off" enctype="multipart/form-data">
            <h1>Register</h1>

            <?php
            if (isset($errMSG)) {
            ?>
                <div class="alert alert-<?php echo $errTyp ?>">
                    <p><?php echo $errMSG; ?></p>
                </div>

            <?php
            }
            ?>

            <input type="text" name="user_name" class="form-control mb-2" placeholder="Username" maxlength="50" value="<?php echo $user_name ?>" />
            <span class="text-danger"> <?php echo $user_nameError; ?> </span>

            <input type="email" name="email" class="form-control mb-2" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />
            <span class="text-danger"> <?php echo $emailError; ?> </span>

            <input type="password" name="password" class="form-control" placeholder="Enter Password" maxlength="15" />
            <span class="text-danger"> <?php echo $passwordError; ?> </span>
            <hr />

            <button type="submit" class="btn btn-block btn-primary" name="btn-signup">Sign Up</button>
            <hr />
            <a href="login.php" class="btn btn-outline-primary">Sign in here</a>
        </form>
    </div>
    <a href="index.php" id="backhome">🏠 Startseite</a>

</body>

</html>