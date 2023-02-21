<?php
require_once "../components/db_connect.php";
session_start();
$buyer=$_GET['id'];
$sql="SELECT * FROM orders 
join products on product_id=fk_product
WHERE buyer = '{$buyer}'";
$result_order = mysqli_query($connect,$sql);
$order = "";
$time="";
$total=0;
if (mysqli_num_rows($result_order)  > 0) {   
    while ($row = mysqli_fetch_array($result_order, MYSQLI_ASSOC)) {
        $time="
        <h2>Order for ".$row['buyer']."</h2>
        <div class='bestellungZeit'><h3> Bestellung : </h3> 
        Day : ".$row['delivery_date']." <br>
        Hour : ".$row['pickup_time']."</div> ";
         $order .= "<tr class='text-center'>
         <td>" . $row['product_name'] . "</td>
         <td>" . $row['price'] ." Eur</td>
<br>
         
      </tr>";
    $total=$row['total_price'];
}
      
    }
    else{
        $order="no order";
    }

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
    <div id="detailOrder">
    <?= $time?><br>
    <div class="bestellungDetail">Details: <br>
    <?= $order?>
</div>
    Total : <?= $total ?> EUR
</div>
<a href="CheckOrders.php">Back</a>
</body>
</html>