<?php 
session_start();
require_once '../components/db_connect.php';

if(!isset($_SESSION['ADMIN'])){
    header('Location: ../index.php');
    exit;
  }
$tbody="";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User index</title>
    <link rel="stylesheet" href="../style/style.css" type="text/css">
</head>
<body>
    <?php require_once '../components/navbar_admin.php' ?>
    <div id="actions">
        <a href="products_list.php"><div class="prod"><h3>Add Product</h3></div></a>
        <a href="addarticle.php"><div class="article"><h3>Add News/Jobs</h3></div></a>
        <a href="AnswerReview.php"><div class="review"><h3>Answer review</h3></div></a>
        <a href="CheckOrders.php"><div class="orders"><h3>See orders</h3></div></a>
    </div>
    <?php require_once '../components/footer_admin.php' ?>
</body>
</html>