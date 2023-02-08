<?php
session_start();
require_once '../components/db_connect.php';

if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM user WHERE user_id = {$id}";
    $result = mysqli_query($connect, $sql);
    $data = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) == 1) {
        $name = $data['user_name'];
        $email = $data['email'];
    } else {
        header("location: error.php");
    }
    mysqli_close($connect);
} else {
    header("location: error.php");
}
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
        <legend class='h2 mb-3'>Delete <?php echo $name ?> ?</legend>


        <h3 class="mb-4">Do you really want to delete your account ?</h3>
        <form action="a_deleteAccount.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id ?>" />
            <button  type="submit" class="delete">Yes, delete it!</button>
            <a href="../user/index_user.php"><button  type="button" class="goBack">No, go back!</button></a>
        </form>
    </fieldset>
</div>
</body>
</html>