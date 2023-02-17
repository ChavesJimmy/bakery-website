<?php 
require_once '../components/db_connect.php';
session_start();
if ($_POST) {
    $buyer=$_POST['name'];
    $product='';
    $email=$_POST['email'];
    $pickup=$_POST['pickup'];
    $pickup_time=$_POST['pickup_time'];
    $total_price=$_POST['total_price'];
    $date=date('Y-m-d');
    $message="";
    $cart="SELECT * FROM shopping_cart WHERE fk_session={$_SESSION['USER']}";
    $result=mysqli_query($connect, $cart);
    while($rowcart = mysqli_fetch_assoc($result)){
    $sqlorder = "INSERT INTO orders (buyer, total_price, date_of_order, delivery_date, user_email, pickup_time, fk_product) VALUES('$buyer',$total_price, '$date', '$pickup','$email','$pickup_time',{$rowcart['fk_product']})";

    if (mysqli_query($connect, $sqlorder) === true) {
        
        $delete = "DELETE FROM shopping_cart WHERE fk_session = {$_SESSION['USER']}";
        if ($connect->query($delete) === TRUE) {
            $class = "alert alert-success";
            $message = "Shopping Cart empty";
        } else {
            $class = "alert alert-danger";
            $message = "The entry was not deleted due to: <br>" . $connect->error;
        }
        $messageinfo = "Your order was successful! <br>
        You will receive an email with the details of your order soon.";
        header("refresh:3;url=../user/index_user.php");
    } else {
        $message = "Error while confirming order, try again later : <br>" . $connect->error;
    }}
    mail(
        $to = $email,
        $subject = "Your Order @ Noppe Bakery",
        $message = "Your order was succesfull !
        Your order detail:
        
        Amount to pay on the ". $pickup ." at ". $pickup_time ." : ".$total_price."EUR.
        
        Thank you for your order !
        Your Noppe Team."
    );
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>confirm order</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <div class="action">
    <?= $messageinfo?>
    </div>
</body>
</html>