<?php
require_once "../components/db_connect.php";
session_start();
$sql_article = "SELECT * FROM article";
$result_article = mysqli_query($connect,$sql_article);
$article = "";
if (mysqli_num_rows($result_article)  > 0) {   
    while ($row = mysqli_fetch_array($result_article, MYSQLI_ASSOC)) {
        if($row['image']){
         $article .= "<tr class='text-center'>
         <td><img class='img-thumbnail rounded-circle' src='../image_article/" . $row['image'] . "'></td>
         <td>" . $row['title'] . "</td>
         <td>" . $row['category'] . "</td>
         <td>" . $row['publication_date'] ." </td>
         <td class='tdText'>".$row['article_text']."</td>
         <td class='tdDispl'>" . $row['displayed']."</td>
         <td id='action_btns'><a href='update_article.php?id=" . $row['article_id'] . "'><button class=' btn-primary' type='button'>Edit</button></a>
         <a href='delete_article.php?id='" . $row['article_id'] . "'><button class='btn-danger' type='button'>Delete</button></a>
         <a href='sale_statistic.php?id=". $row['article_id']."'><button class='btn-warning' type='button'>Sales</button></a>
         </td>
      </tr>";}
      else{
        $article .= "<tr class='text-center'>
         <td>No image</td>
         <td>" . $row['title'] . "</td>
         <td>" . $row['category'] . "</td>
         <td>" . $row['publication_date'] ." </td>
         <td class='tdText'>".$row['article_text']."</td>
         <td class='tdDispl'>" . $row['displayed']."</td>
         <td id='action_btns'><a href='update_article.php?id=" . $row['article_id'] . "'><button class=' btn-primary' type='button'>Edit</button></a>
         <a href='delete_article.php?id='" . $row['article_id'] . "'><button class='btn-danger' type='button'>Delete</button></a>
         <a href='sale_statistic.php?id=". $row['article_id']."'><button class='btn-warning' type='button'>Sales</button></a>
         </td>
      </tr>";
      }
    }}
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
    <table class='table'>
                    <thead>
                        <tr>
                            <th>Picture</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Published on</th>
                            <th>Text</th>
                            <th>Displayed ?</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?= $article ?>
                    </tbody>
                </table>
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