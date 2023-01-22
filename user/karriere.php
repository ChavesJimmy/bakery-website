<?php 
require_once "../components/db_connect.php";
session_start();
$sql="SELECT * FROM article WHERE category='job'";
$result = mysqli_query($connect, $sql);
$tjobs = '';
if (mysqli_num_rows($result)  > 0) {
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $tjobs="<div class='angebot'>
        <h3>".$row['title']."</h3>
        <p>".$row['article_text']."</p><br>
        <small>added the ".$row['publication_date']."</small>
        
    </div>";

    }}
    else{
        $tjobs="No jobs available at the moment <br>
        Send us your CV at xxxx@gmail.com, we will contact you if an opportunity come";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karriere</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <?php require_once '../components/navbar_user.php'?>
    <div class="path">
        <a href="index_user.php">🏠 Startseite</a>><a href="karriere.php">karriere</a>
    </div>
    <div id="jobs">
    <?= $tjobs ?>
        
    </div>
    <?php require_once '../components/footer_user.php'?>

</body>
</html>