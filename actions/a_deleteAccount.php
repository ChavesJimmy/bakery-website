<?php
session_start();
require_once '../components/db_connect.php';

if ($_POST) {
    $id = $_POST['id'];
   
    $sql = "DELETE FROM user WHERE user_id = {$id}";
    if (mysqli_query($connect, $sql) === TRUE) {
        $class = "success";
        $message = "Successfully Deleted!";
    } else {
        $class = "danger";
        $message = "The entry was not deleted due to: <br>" . $connect->error;
    }
    mysqli_close($connect);}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>
    <div class="action">
    <fieldset>
        <legend class='h2 mb-3'>Delete account</legend>
        <?= $message ?>        
    </fieldset>
</div>
</body>
</html>