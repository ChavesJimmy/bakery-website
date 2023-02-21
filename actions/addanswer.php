<?php 
require_once '../components/db_connect.php';

if ($_POST) {
    $comment = $_POST['comment'];
    $rate = $_POST['rate'];
    $date = date('d M Y');
    $username = $_POST['author'];

    $sql = "INSERT INTO comments (author, comment, date, rate) VALUES ('$username','$comment','$date','$rate')";
    if (mysqli_query($connect, $sql) === true) {
        $class = "alert alert-success";
        $message = "Your comment was successfully added";
        header("refresh:2;url=../impressum.php");
    } else {
        $class = "alert alert-danger";
        $message = "Error while adding comment : try again later : <br>" . $connect->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add comment</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <div class="action">
    <?= $message?>
    </div>
</body>
</html>