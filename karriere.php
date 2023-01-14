<?php
require_once "components/db_connect.php";
$sql="SELECT * FROM article WHERE article_type='jobs'";
$result = mysqli_query($connect, $sql);
$tbody = '';
if (mysqli_num_rows($result)  > 0) {
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $tbody="<div class='angebot'>
        <h3>".$row['article_title']."</h3>
        <p>".$row['article_content']."</p>
        <span>Start :". $row['start']."</span><br>
        <span>Salary : ".$row['salary']."</span>
    </div>";

    }}
    else{
        $tbody="No jobs available at the moment <br>
        Send us your CV at xxxx@gmail.com, we will contact you if an opportunity come";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <?php require_once 'components/navbar.php'?>
    <div class="path">
        <a href="index.php">🏠 Startseite</a>><a href="karriere.php">karriere</a>
    </div>
    <div id="jobs">
    <?= $tbody ?>
        
    </div>
    <?php require_once 'components/footer.php'?>

</body>
</html>