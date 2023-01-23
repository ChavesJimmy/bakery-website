<?php
require_once "../components/db_connect.php";
session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <?php require_once '../components/navbar_admin.php' ?>
    
    <div id="addarticle">
        <h1>Add news/job offer</h1>
        <form action="../actions/a_article.php" method="post" enctype="multipart/form-data">
            <label for="title">Title</label>
            <input type="text" name="title" id="">
            <label for="article">Article</label>
            <textarea name="article_text" id="" cols="30" rows="10"></textarea>
            <label for="image">Image</label>
            <input id="upload" type="file" name="image" id="">
            <label for="category">Category</label>
            <select name="category" id="">
                <option value="news">news</option>
                <option value="job">job<option>

            </select>
            <button type="submit">Submit</button>
        </form>
    </div>
    <?php require_once '../components/footer_admin.php' ?>

</body>
</html>