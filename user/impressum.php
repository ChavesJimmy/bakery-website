<?php 
require_once "../components/db_connect.php";
session_start();
$treview = '';
$sql="SELECT * FROM comments order by date desc ";
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result)  > 0) {
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        if($row['rate'] == 5){
            $rate="(🍰🥐🫓🥖🍞/Excellent)";
        }
        else if($row['rate'] == 4){
            $rate="(🥐🫓🥖🍞/sehr gut)";
        }
        else if($row['rate'] == 3){
            $rate="(🫓🥖🍞/gut)";
        }
        else if($row['rate'] == 2){
            $rate="(🥖🍞/ok)";
        }
        else if($row['rate'] == 1){
            $rate="(🍞/schlecht)";
        }
        else if($row['rate'] == 0){
            $rate="(🚫/horrible)";
        }
        else{
            $rate="";
        }
       
    $treview .="<div class='clientreview'>
            <h3>Review von ".$row['author']."<br>".$rate."</h3>
            <p>\"".$row['comment']."\"</p><br>
            <small>".$row['date']."</small>

            </div>";}}
else{
   $tbody="No Review available";
};
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
    <?php require_once '../components/navbar_user.php';?>
    <div class="path">
        <a href="index_user.php">🏠 Startseite</a>><a href="impressum.php">impressum</a>
    </div>
    <h2>What do people think about us ?</h2>
    <h4>In the newspapers</h4>
    <div class="newspaper">
    <div class="articles">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea id amet unde soluta dolorum voluptates laboriosam facere officiis quasi error hic corporis, autem quidem quos atque porro ipsa? In maxime totam nam sunt mollitia, neque ut ducimus sapiente est rerum non inventore officia, hic eveniet laboriosam modi aliquid id. Eum quibusdam sit velit ipsum.</div></div>
    <h4>Our clients</h4>
    <div class="clients">
        <?= $treview ?>
    </div>
    <?php require_once '../components/footer_user.php'?>

</body>
</html>