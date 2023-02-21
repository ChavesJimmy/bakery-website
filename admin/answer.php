<?php
require_once "../components/db_connect.php";
session_start();

$tbody="";
  if(isset($_SESSION['ADMIN'])){
    
    $sql="SELECT * FROM user WHERE user_id={$_SESSION['ADMIN']}";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result)  > 0) {
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
      $tbody=$row['user_name'];
    
    }
    }

    //display comment to be reviewed
    $comment="";
    $id=$_GET['id'];
    $sql = "SELECT * FROM comments WHERE comment_id={$id}";
    $result =mysqli_query($connect, $sql);
    $rowcomment = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $comment=$rowcomment['comment']
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Answer review</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
  <?php require_once "../components/navbar_admin.php" ?>
<div id="letreview">
    <form method="post" action="./actions/addanswer.php" enctype="multipart/form-data">
            <h2>Answer review</h2>
            <label for="" name="author" style="border:solid ; padding:1rem ; width:75%; margin:auto;background-color:whitesmoke"><h4>Answer to the comment : </h4>
            <div style="font-style:italic"><?=$comment?></div><br>
          from <?= $rowcomment['author'] ?></label>
            <h2>by <?= $tbody?></h2>
            <input class="form-control" type="hidden" name="author" value="<?= $tbody?>">
           <label for="">your answer</label>
            <textarea name="comment" cols="50" rows="20"></textarea>
            <button type="submit">Send Answer</button>
        </form>
    </div>
    <a href="AnswerReview.php">Back</a>

    
</body>
</html>