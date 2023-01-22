<?php 
session_start();
require_once '../components/db_connect.php';
$tbody="";
if(isset($_SESSION['ADMIN'])){
    header('Location: ./admin/index_admin.php');
    exit;
  }
  if(isset($_SESSION['USER'])){
    
    $sql="SELECT * FROM user WHERE user_id={$_SESSION['USER']}";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result)  > 0) {
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
      $tbody=$row['user_name'];
    
    }
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
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>

    <?php require_once '../components/navbar_user.php' ?>
    <p><?php echo ($message) ?? ''; ?></p>

    <div id="carousel">
        <?php require_once '../components/carousel.php'?>
    </div>
    <div id="articles">
    <h2>INFOS</h2>
    <?= $tbodynews?>
</div>


    <div id="letreview">
        <form method="post" action="../actions/addcomment.php" enctype="multipart/form-data">
            <h2>Leave a review</h2>
            <label for="" name="author" >Review from <h2><?= $tbody?></h2></label>
            <input class="form-control" type="hidden" name="author" value="<?= $tbody?>">
            <label for="Rate">rate us</label>
            <select class="form-control" name="rate" >
                <option value=null default></option>
                <option value=5>⭐⭐⭐⭐⭐</option>
                <option value=4>⭐⭐⭐⭐</option>
                <option value=3>⭐⭐⭐</option>
                <option value=2>⭐⭐</option>
                <option value=1>⭐</option>
                <option value=0>😡</option>
            </select>
            <label for="">your review</label>
            <textarea class="form-control" name="comment" cols="50" rows="20"></textarea>
            <button type="submit">Send review</button>
        </form>
    </div>
    <?php require_once '../components/footer_user.php' ?>
    <script>
    
        <?php require_once '../scripts/script_carousel.js'?>
    </script>
</body>
</html>