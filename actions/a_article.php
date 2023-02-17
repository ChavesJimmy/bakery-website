<?php
session_start();
require_once '../components/db_connect.php';
require_once '../components/file_upload.php';

if ($_POST) {
    $title = $_POST['title'];
    $image = file_upload($_FILES['image']);
    $text = $_POST['article_text'];
    $category = $_POST['category'];
    $date = date('d M Y');

    $uploadError = ''; 
if($image->error === 0){

}
    $sql = "INSERT INTO article (article_text, title, image, category, publication_date) VALUES('$text', '$title', '$image->fileName', '$category', '$date')";

    if (mysqli_query($connect, $sql) === true) {
        $message = $category ." successfully created";
        $uploadError = ($image->error != 0) ? $image->ErrorMessage : '';
        header("refresh:2, ../admin/index_admin.php");

    } else {
        $message = "Problem while adding article";
        $uploadError = ($image->error != 0) ? $image->ErrorMessage : '';
    }
    mysqli_close($connect);
} else {
    header("location: ../error.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add news/job</title>
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>
    <div class="action">
        <?= $message?>
    </div>
</body>
</html>