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
        $message = "The comment was successfully added";
        header("refresh:5;url=../impressum.php");
    } else {
        $class = "alert alert-danger";
        $message = "Error while updating record : <br>" . $connect->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?= $message?>
    
</body>
</html>