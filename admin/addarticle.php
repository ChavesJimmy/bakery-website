<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <?php require_once '../components/navbar_admin.php' ?>
    <div id="addarticle">
        <form action="" method="post">
            <label for="title">Title</label>
            <input type="text" name="" id="">
            <label for="article">Article</label>
            <textarea name="" id="" cols="30" rows="10"></textarea>
            <label for="image">Image</label>
            <input type="file" name="" id="">
            <button type="submit">Submit</button>
        </form>
    </div>
    <?php require_once '../components/footer_admin.php' ?>

</body>
</html>