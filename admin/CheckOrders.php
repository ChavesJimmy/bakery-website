<?php
require_once "../components/db_connect.php";
session_start();
$sql_order = "SELECT distinct buyer, delivery_date,total_price,pickup_time , DATEDIFF(delivery_date, CURDATE()) AS diff FROM orders 
join products ON orders.fk_product=products.product_id
order by CASE WHEN diff < 1 THEN 1 ELSE 0 END, diff desc";
$result_order = mysqli_query($connect,$sql_order);
$order = "";
if (mysqli_num_rows($result_order)  > 0) {   
    while ($row = mysqli_fetch_array($result_order, MYSQLI_ASSOC)) {
         $order .= "<tr class='text-center'>
         <td>" . $row['buyer'] . "</td>
         <td>" . $row['delivery_date'] . "</td>
         <td>" . $row['pickup_time'] ." </td>
         <td>" . $row['total_price'] ." Eur</td>

         <td id='action_btns'>
         <a href='detail_order.php?id=" . $row['buyer'] . "'><button class=' btn-primary' type='button'>Detail</button></a>
         <a href='delete_order.php?id='" . $row['delivery_date'] . "'><button class='btn-danger' type='button'>Delete</button></a>
         </td>
      </tr>";}
      
    }
    else{
        $order = "NO ORDERS";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check orders</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <?php require_once '../components/navbar_admin.php' ?>
    <table class='table' style="width:100%">
                    <thead>
                        <tr>
                            <th>Buyer</th>
                            <th>Pick up date</th>
                            <th>Pick up time</th>
                            <th>Total price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?= $order ?>
                    </tbody>
                </table>
</body>