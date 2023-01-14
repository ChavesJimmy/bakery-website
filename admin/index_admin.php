<?php 
session_start();
require_once '../components/db_connect.php';

if(!isset($_SESSION['ADMIN'])){
    header('Location: ../index.php');
    exit;
  }

$sql="SELECT * FROM admin WHERE admin_id={$_SESSION['ADMIN']}";
$result = mysqli_query($connect, $sql);
$tbody = '';
if (mysqli_num_rows($result)  > 0) {
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $tbody=$row['admin_name'];

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin dashboard</title>
    <link rel="stylesheet" href="../style/style.css" type="text/css">
</head>
<body>
    <?php require_once '../components/navbar_admin.php' ?>
    <div class="welcome">Welcome <?= $tbody?></div>  
    <div id="actions">
        <a href=""><div class="prod"><h3>Add Product</h3></div></a>
        <a href=""><div class="article"><h3>Add Article</h3></div></a>
        <a href=""><div class="review"><h3>Answer review</h3></div></a>
        <a href=""><div class="job"><h3>Add Job</h3></div></a>
        <a href=""><div class="orders"><h3>See orders</h3></div></a>
    </div>
    <?php require_once '../components/footer_admin.php' ?>
    <a href="../logout.php?logout"><button>log out</button></a>
</body>
</html>