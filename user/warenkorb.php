<?php
require_once "../components/db_connect.php";
session_start();
$tshop="";
$totalprice = 0;

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
            
            $tshop.="
            <li>".$rowshop['product_name']." ".$rowshop['price']." EUR</li>";
            $totalprice += $rowshop['price'];

}}}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoping cart</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <?php require_once '../components/navbar_user.php' ?>
    <div class="path">
        <a href="index_user.php">🏠 Startseite</a> > <a href="warenkorb.php">warenkorb</a>
    </div>
    <div id="korb">
        <div class="einkauf">
            <h5>my einkauf</h5>
            <ol>
               <?= $tshop?> 
            </ol>
        </div>
        <div class="bill">
            total: <?= $totalprice?> Eur<br>

        </div>
    </div>
    <div id="payment">
        <form action="order.php" method="post">
            <label for="">Name</label>
            <input type="hidden" name="name" value="<?= $row['user_name']?>"><?= $row['user_name']?><br><br>
            <label for="Phone">Email</label>
            <input type="hidden" name="email"  value="<?= $row['email']?>"><?= $row['email']?><br><br>
            <select name="" id="">
                <option value="">>Click and collect</option>
                <option value="">>Visa</option>
                <option value="">other</option>
            </select>
            <button type="submit">Book</button>
        </form>
    </div>
   
    <?php require_once '../components/footer_user.php' ?>
</body>
</html>