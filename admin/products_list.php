<?php 
require_once "../components/db_connect.php";
session_start();
//print products
$sql_products = "SELECT * FROM products";
$result_products = mysqli_query($connect,$sql_products);
$tproduct = "";
if ($result_products->num_rows > 0) {
    while ($row = $result_products->fetch_array(MYSQLI_ASSOC)) {
                if($row['discount']>0){
                $tproduct .= "<tr class='text-center'>
                    <td><img class='img-thumbnail rounded-circle' src='" . $row['photo'] . "'></td>
                    <td>" . $row['product_name'] . "</td>
                    <td>" . $row['price'] . "</td>
                    <td>" . $row['discount'] ." </td>
                    <td>" . $row['price']-($row['discount']*$row['price']/100). "</td>
                    <td id='action_btns'><a href='update_products.php?id=" . $row['product_id'] . "'><button class=' btn-primary' type='button'>Edit</button></a>
                    <a href='delete_product.php?id='" . $row['product_id'] . "'><button class='btn-danger' type='button'>Delete</button></a>
                    <a href='sale_statistic.php?id=". $row['product_id']."'><button class='btn-warning' type='button'>Sales</button></a>
                    </td>
                 </tr>";} 
                 
                 else{
                    $tproduct .= "<tr>
                    <td><img class='img-thumbnail rounded-circle' src='" . $row['photo'] . "'></td>
                    <td>" . $row['product_name'] . "</td>
                    <td>" . $row['price'] . "</td>
                    <td>no discount</td>
                    <td> no discounted price</td>
                    <td id='action_btns'><a href='update_products.php?id=" . $row['product_id'] . "'><button class='btn btn-primary btn-sm' type='button'>Edit</button></a>
                    <a href='delete_product.php?id=" . $row['product_id'] . "'><button class='btn btn-danger btn-sm' type='button'>Delete</button></a>
                    <a href='sale_statistic.php?id=". $row['product_id']."'><button class='btn btn-warning btn-sm' type='button'>Sales</button></a>
                    </td>
                   
                 </tr>";
                 }
                }
        } else {
            $tproduct = "<tr><td colspan='5'><center>No Data Available </center></td></tr>";
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
    <?= require_once "../components/navbar_admin.php"?>
    <table class='table'>
                    <thead>
                        <tr>
                            <th>Picture</th>
                            <th>Name</th>
                            <th>Price(EUR)</th>
                            <th>discount(%)</th>
                            <th>Discounted price(EUR)</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?= $tproduct ?>
                    </tbody>
                </table>
    <?= require_once "../components/footer_admin.php"?>

</body>
</html>