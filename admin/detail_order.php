<?php
require_once "../components/db_connect.php";
session_start();
$total_price=$_GET['id'];
$sql="SELECT * FROM orders 
join products on product_id=fk_product
WHERE total_price={$total_price}";
$result_order = mysqli_query($connect,$sql);
$order = "";
$time="";
if (mysqli_num_rows($result_order)  > 0) {   
    while ($row = mysqli_fetch_array($result_order, MYSQLI_ASSOC)) {
        $time="Day : ".$row['delivery_date']." <br>
        Hour : ".$row['pickup_time'];
         $order .= "<tr class='text-center'>
         <td>" . $row['product_name'] . "</td>
         <td>" . $row['price'] ." Eur</td>
<br>
         
      </tr>";}
      
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
</head>
<body>
    <?= $time?><br>
    <?= $order?>
</body>
</html>