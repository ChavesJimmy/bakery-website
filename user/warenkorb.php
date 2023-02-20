<?php
require_once "../components/db_connect.php";
session_start();
$tshop="";
$totalprice = 0;
$disabled="";
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
            <div>".$rowshop['product_name']." / ".$rowshop['price']." EUR
            <form method='post' action='../actions/removeProduct.php'>
            <input type='hidden' name='id' value=".$rowshop['cart_id'].">
            <button type='submit'>X</button></form></div>";
            $totalprice += $rowshop['price'];      

}}
else{
    $tshop="Shopping Cart Empty";
    $disabled="disabled";
}}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping cart</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <?php require_once '../components/navbar_user.php' ?>
    <div class="path">
        <a href="index_user.php">🏠 Startseite</a> > <a href="warenkorb.php">warenkorb</a>
    </div>
    <div id="korb">
        <div class="einkauf">
            <h5>My Shopping Cart</h5>
            <div>
               <?= $tshop?> 
            </div>
        </div>
        <div class="bill">TOTAL : <br>
          <?php echo $totalprice ?> Eur
        </div>
    </div>
    <div id="payment">
        <form action="../actions/confirm_order.php" method="post">
            <label for="">Name</label>
            <input type="hidden" name="name" value="<?= $row['user_name']?>"><?= $row['user_name']?><br><br>
            <label for="email">Email</label>
            <input type="hidden" name="email" value="<?= $row['email']?>"><?= $row['email']?><br><br>
            <label for="pickup">Pickup date <br> (all commands must be made at least the day before the pick up) </label>
            <input type="date" name="pickup" id="datePickerId"><br><br>
            <label for="pichup">Pickup hour <br> (all commands must be made at least the day before the pick up) </label>
            <input type="time" name="pickup_time" id="time" min="06:00" max="16:00">
            <input type="hidden" name="total_price" value=<?= $totalprice?>>
            <button type="submit" <?= $disabled?>>Book</button>
        </form>
    </div>
   
    <?php require_once '../components/footer_user.php' ?>
    <script>
        //min date tomorrow
        const today = new Date();
        console.log("today => ",today);
        let tomorrow =  new Date();
        tomorrow.setDate(today.getDate() + 1);
        console.log("tomorrow => ",tomorrow);
        datePickerId.min = new Date(tomorrow).toISOString().split("T")[0];
        //disables day off
        const picker = document.getElementById('datePickerId'); 
        picker.addEventListener('input', function(e){
        var day = new Date(this.value).getUTCDay();
        if([1].includes(day)){
        e.preventDefault();
        this.value = '';
        alert('we are closed on monday');
  }
});
    </script>
</body>
</html>