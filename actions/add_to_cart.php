<?php
require_once "../components/db_connect.php";
session_start();
 //addtocart
 $tid="";
 $message="";
 if($_SESSION['USER']){
     $sql="SELECT * FROM user WHERE user_id={$_SESSION['USER']}";
     $result = mysqli_query($connect, $sql);
     if (mysqli_num_rows($result)  > 0) {
       $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
       $tid=$row['user_id'];
     }
 }
 if ($_POST) {
     $session = $tid;
     $product = $_POST['product_id'];
     $quantity = $_POST['quantity'];
     for ($i=0; $i < $quantity; $i++) { 
     $sql = "INSERT INTO shopping_cart (fk_session, fk_product) VALUES ($session, $product)";
     if (mysqli_query($connect, $sql) === true) {
         $class = "alert alert-success";
         $message = "The article(s) was(were) successfully added";
         header("refresh:5;url=../user/products.php");
     } else {
         $class = "alert alert-danger";
         $message = "Error while addidng to cart record : <br>" . $connect->error;
     }}
 }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?=$quantity?>
    <?= $message?>
</body>
</html>