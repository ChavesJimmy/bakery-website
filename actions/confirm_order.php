<?php 
require_once '../components/db_connect.php';
session_start();
ini_set('smtp_port',587);
$tshop="";
if($_SESSION['USER']){
    $sql="SELECT * FROM user WHERE user_id={$_SESSION['USER']}";
     $result = mysqli_query($connect, $sql);
     if (mysqli_num_rows($result)  > 0) {
       $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
     }
    $sqlshop="SELECT * FROM shopping_cart 
    JOIN products ON products.product_id=shopping_cart.fk_product
    WHERE fk_session={$_SESSION['USER']} order by product_name asc";
    $resultshop = mysqli_query($connect, $sqlshop);
    if (mysqli_num_rows($resultshop)  > 0) {
        while($rowshop = mysqli_fetch_array($resultshop, MYSQLI_ASSOC)){
            $sqlcount="SELECT count(fk_product) as count FROM shopping_cart where fk_product={$rowshop['product_id']}";
            $resultcount = mysqli_query($connect, $sqlcount);
            $rowcount = mysqli_fetch_array($resultcount, MYSQLI_ASSOC);
            
            $tshop.=$rowshop['product_name']." ".$rowshop['price']." EUR ,";
}}}
if ($_POST) {
    $pickup = $_POST['pickup'];
    $pickup_time = $_POST['pickup_time'];
    $date = date('d M Y');
    $username = $_POST['name'];
    $email = $_POST['email'];
    $totalprice=$_POST['total_price'];
    $cart="SELECT * FROM shopping_cart 
    JOIN products ON products.product_id = shopping_cart.fk_product
    WHERE fk_session={$_SESSION['USER']}";
    $resultcart=mysqli_query($connect, $cart);
    while($rowcart = mysqli_fetch_assoc($resultcart)){
    $sql = "INSERT INTO orders (buyer, total_price, date_of_order, fk_product, delivery_date, pickup_time, user_email) VALUES ('$username', $totalprice,'$date', {$rowcart['fk_product']} ,'$pickup','$pickup_time','$email')";}

    if (mysqli_query($connect, $sql) === true) {
/*         mail(
            $to = $email,
            $subject = "Your Order @ Noppe Bakery",
            $message = "Your order was succesfull !
            Your order detail
            ".$tshop."
            Amount to pay on the ". $pickup." at ".$pickup_time." : ".$totalprice."EUR.
            
            Thank you for your order !
            Your Noppe Team."
        ); */
        $delete = "DELETE FROM shopping_cart WHERE fk_session = {$_SESSION['USER']}";
        if ($connect->query($delete) === TRUE) {
            $class = "alert alert-success";
            $message = "Shopping Cart empty";
        } else {
            $class = "alert alert-danger";
            $message = "The entry was not deleted due to: <br>" . $connect->error;
        }
        $message = "Your order was successful! <br>
        You will receive an email with the details of your order soon.";
        header("refresh:3;url=../user/index_user.php");
    } else {
        $message = "Error while confirming order, try again later : <br>" . $connect->error;
    }
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
    <?= $message?>
    </div>
</body>
</html>