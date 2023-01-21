<?php 
require_once "../components/db_connect.php";
session_start();
//display brot
$sqlbrot="SELECT * FROM products WHERE category='brot'";
$resultbrot = mysqli_query($connect, $sqlbrot);
$tbodybrot = '';
if (mysqli_num_rows($resultbrot)  > 0) {
    while($rowbrot = mysqli_fetch_array($resultbrot, MYSQLI_ASSOC)){
    $tbodybrot .="<div class='card'>
    <img src='".$rowbrot['photo']."' alt='".$rowbrot['product_name']."'>   
    <h4>".$rowbrot['product_name']."</h4>
    <p>".$rowbrot['description']."</p>
    <p>".$rowbrot['price']."EUR</p>
    <div id='btnaction'>
    <button>+</button><button>-</button>
    <button><a href=''>add to cart</a></button>
    </div>
        
</div>";}}
else{
   $tbodybrot="No Brot available";
}
//display patisserie
$sqlpatisserie="SELECT * FROM products WHERE category='patisserie'";
$resultpatisserie = mysqli_query($connect, $sqlpatisserie);
$tbodypatisserie = '';
if (mysqli_num_rows($resultpatisserie)  > 0) {
    while($rowpatisserie = mysqli_fetch_array($resultpatisserie, MYSQLI_ASSOC)){
    $tbodypatisserie .="<div class='card'>
    <div class='img'><img src='".$rowpatisserie['photo']."' alt='".$rowpatisserie['product_name']."'></div>
    <div class='description'>
        <h4>".$rowpatisserie['product_name']."</h4>
        <p>".$rowpatisserie['description']."</p>
        <p>".$rowpatisserie['price']."EUR</p>
        <input type='number' name='' id=''>
        <button>+</button><button>-</button>
        <button><a href=''>add to cart</a></button>
        </div>
</div>";}}
else{
    $tbodypatisserie="No Patisserie available";
 }
//display geback
$sqlgeback="SELECT * FROM products WHERE category='geback'";
$resultgeback = mysqli_query($connect, $sqlgeback);
$tbodygeback = '';
if (mysqli_num_rows($resultgeback)  > 0) {
    while($rowgeback = mysqli_fetch_array($resultgeback, MYSQLI_ASSOC)){
    $tbodygeback .="<div class='card'>
    <div class='img'><img src='".$rowgeback['photo']."' alt='".$rowgeback['product_name']."'></div>
    <div class='description'>
        <h4>".$rowgeback['product_name']."</h4>
        <h6>".$rowgeback['weigth']."g</h6>
        <p>".$rowgeback['description']."</p>
        <p>".$rowgeback['price']."EUR</p>
        <input type='number' name='' id=''>
        <button>+</button><button>-</button>
        <button><a href=''>add to cart</a></button>
        </div>
</div>";}}
else{
    $tbodygeback="No Gebäck available";
 }
//display Viennoiserie
$sqlvienn="SELECT * FROM products WHERE category='viennoiserie'";
$resultvienn = mysqli_query($connect, $sqlvienn);
$tbodyvienn = '';
if (mysqli_num_rows($resultvienn)  > 0) {
    while($rowvienn = mysqli_fetch_array($resultvienn, MYSQLI_ASSOC)){
    $tbodyvienn .="<div class='card'>
    <div class='img'><img src='".$rowvienn['photo']."' alt='".$rowvienn['product_name']."'></div>
    <div class='description'>
        <h4>".$rowvienn['product_name']."</h4>
        <h6>".$rowvienn['weigth']."g</h6>
        <p>".$rowvienn['description']."</p>
        <p>".$rowvienn['price']."EUR</p>
        <input type='number' name='' id=''>
        <button>+</button><button>-</button>
        <button><a href=''>add to cart</a></button>
        </div>
</div>";}}
else{
    $tbodyvienn="No Viennoiserie available";
 }
//display pikant
$sqlpikant="SELECT * FROM products WHERE category='pikant'";
$resultpikant = mysqli_query($connect, $sqlpikant);
$tbodypikant = '';
if (mysqli_num_rows($resultpikant)  > 0) {
    while($rowpikant = mysqli_fetch_array($resultpikant, MYSQLI_ASSOC)){
    $tbodypikant .="<div class='card'>
    <div class='img'><img src='".$rowpikant['photo']."' alt='".$rowpikant['product_name']."'></div>
    <div class='description'>
        <h4>".$rowpikant['product_name']."</h4>
        <h6>".$rowpikant['weigth']."g</h6>
        <p>".$rowpikant['description']."</p>
        <p>".$rowpikant['price']."EUR</p>
        <input type='number' name='' id=''>
        <button>+</button><button>-</button>
        <button><a href=''>add to cart</a></button>
        </div>
</div>";}}
else{
    $tbodypikant="No Pikant available";
 }
 //display divers
$sqldivers="SELECT * FROM products WHERE category='divers'";
$resultdivers = mysqli_query($connect, $sqldivers);
$tbodydivers = '';
if (mysqli_num_rows($resultdivers)  > 0) {
    while($rowdivers = mysqli_fetch_array($resultdivers, MYSQLI_ASSOC)){
    $tbodydivers .="<div class='card'>
    <div class='img'><img src='".$rowdivers['photo']."' alt='".$rowdivers['product_name']."'></div>
    <div class='description'>
        <h4>".$rowdivers['product_name']."</h4>
        <h6>".$rowdivers['weigth']."g</h6>
        <p>".$rowdivers['description']."</p>
        <p>".$rowdivers['price']."EUR</p>
        <input type='number' name='' id=''>
        <button>+</button><button>-</button>
        <button><a href=''>add to cart</a></button>
        </div>
</div>";}}
else{
    $tbodydivers="No Pikant available";
 }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <?php require_once '../components/navbar_user.php' ?>
   
    <div id="menu">
            <a href="#brot">Brot</a>
            <a href="#viennoiserie">Viennoiserie</a>
            <a href="#patisserie">Pâtisserie</a>
            <a href="#geback">Gebäck</a>
            <a href="#pikant">Pikant</a>
            <a href="#divers">Divers</a>
</div> 

<div class="path">
        <a href="index.php">🏠 Startseite</a> > <a href="products.php">produkte</a>
    </div>
<div id="container">
    <div id="brot">
        <h3>Unser Brot</h3>
        <?= $tbodybrot?>
    </div>
    <div id="viennoiserie">
        <h3>Unser Viennoiserie</h3>
        <?= $tbodyvienn?>
    <div id="patisserie">
        <h3>Unser Patisserie</h3>
        <?= $tbodypatisserie?>
    </div>
    <div id="geback">
        <h3>Unser Geback</h3>
        <?= $tbodygeback?>
    </div>
    <div id="pikant">
        <h3>Unser Pikant</h3>
        <?= $tbodypikant?>
</div>
    <div id="divers">
        <h3>Unser Divers</h3>
        <?= $tbodydivers?>
</div>
</div>
    <?php require_once 'components/footer.php' ?>

</body> 
</html>