<?php 
require_once "../components/db_connect.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <?php require_once '../components/navbar_user.php'?>
    <div class="path">
        <a href="index_user.php">🏠 Startseite</a> > <a href="filliale.php">filliale</a>
    </div>
    <?php require_once '../components/footer_user.php'?>

</body>
</html>