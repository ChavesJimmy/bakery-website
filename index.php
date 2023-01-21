<?php 
session_start();
require_once './components/db_connect.php';

if(isset($_SESSION['ADMIN'])){
    header('Location: ./admin/index_admin.php');
    exit;
  }
if(isset($_SESSION['USER'])){
    header('Location: ./user/index_user.php');
    exit;
  }
  //display all the news
$sqlnews="SELECT * FROM article WHERE category='news' and displayed=1";
$resultnews = mysqli_query($connect, $sqlnews);
$tbodynews = '';
if (mysqli_num_rows($resultnews)  > 0) {
    while($rownews = mysqli_fetch_array($resultnews, MYSQLI_ASSOC)){
        if($rownews['image'] == true){
    $tbodynews .="<div class='article'>
    <div class='img_article'><img src='./image_article/".$rownews['image']."'></div>
    <div class='article_body'>
    <h5>".$rownews['title']."</h5>
    ".$rownews['article_text']."<br><br> <small>".$rownews['publication_date']."</small></div>
    </div>";}
    else{
        $tbodynews .="<div class='simplearticle'>
        <h5>".$rownews['title']."</h5>
        ".$rownews['article_text']."<br><br> <small>".$rownews['publication_date']."</small>
        </div>"; 
    }
    }}

else{
   $tbodynews="No news";
}
  
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noppe Bäckerei</title>
    <link rel="stylesheet" href="./style/style.css">
</head>
<body>
    <?php require_once 'components/navbar.php' ?>

    <div id="carousel">
        <?php require_once 'components/carousel.php'?>
    </div>
    <div id="articles">
    <h2>INFOS</h2>
    <?= $tbodynews?>

    </div>
    <div id="letreview">
        <form  method="post">
            <h2>Leave a review</h2>
            <label for="" name="author">Name/Pseudo</label>
            <input type="text">
            <label for="Rate">rate us</label>
            <select name="rate" >
                <option value=5>⭐⭐⭐⭐⭐</option>
                <option value=4>⭐⭐⭐⭐</option>
                <option value=3>⭐⭐⭐</option>
                <option value=2>⭐⭐</option>
                <option value=1>⭐</option>
                <option value=0>😡</option>
            </select>
            <label for="">your review</label>
            <textarea name="comment" cols="50" rows="20"></textarea>
            <button type="submit">Send review</button>
        </form>
    </div>
    <?php require_once 'components/footer.php' ?>

    <script>
    
        <?php require_once 'scripts/script_carousel.js'?>
    </script>
</body>
</html>