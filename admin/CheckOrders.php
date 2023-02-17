<?php
require_once "../components/db_connect.php";
session_start();
$sql_order = "SELECT * , DATEDIFF(delivery_date, CURDATE()) AS diff FROM orders 
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
         <td>" . $row['product_name'] ." </td>
         <td>" . $row['price'] ." Eur</td>
         <td>" . $row['total_price'] ." Eur</td>

         <td id='action_btns'>
         <a href='update_order.php?id=" . $row['order_id'] . "'><button class=' btn-primary' type='button'>Edit</button></a>
         <a href='delete_order.php?id='" . $row['order_id'] . "'><button class='btn-danger' type='button'>Delete</button></a>
         </td>
      </tr>";}
      
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <?php require_once '../components/navbar_admin.php' ?>
    <table class='table'>
                    <thead>
                        <tr>
                            <th>Picture</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Published on</th>
                            <th>Text</th>
                            <th>Displayed ?</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?= $order ?>
                    </tbody>
                </table>
</body>