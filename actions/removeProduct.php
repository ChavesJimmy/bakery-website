<?php
require_once '../components/db_connect.php';

if($_POST){
    $id=$_POST['id'];
    $delete = "DELETE FROM shopping_cart WHERE cart_id = {$id}";
    if ($connect->query($delete) === TRUE) {
        $message="Product removed from your shopping cart !";
        header("refresh:0;url=../user/warenkorb.php");
    }}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remove product</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
<div class="action">
    <?= $message?>
</div>
</body>
</html>