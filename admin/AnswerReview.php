<?php
require_once "../components/db_connect.php";
session_start();

$reviews = "";
$sqlReview = "SELECT * FROM comments";
$resultReview = mysqli_query($connect, $sqlReview);
if (mysqli_num_rows($resultReview)  > 0) {   
    while ($rowReview = mysqli_fetch_array($resultReview, MYSQLI_ASSOC)) {
         $reviews .= "<tr class='text-center'>
         <td>" . $rowReview['date'] . "</td>
         <td>" . $rowReview['author'] . "</td>
         <td>" . $rowReview['comment'] ." </td>
         <td>" . $rowReview['rate'] ." </td>


         <td id='action_btns'>
         <a href='answer.php?id=" . $rowReview['comment_id'] . "'><button class=' btn-primary' type='button'>Answer</button></a>
         <a href='delete_order.php?id='" . $rowReview['comment_id'] . "'><button class='btn-danger' type='button'>Delete</button></a>
         </td>
      </tr>";}
      
    }
    else{
        $reviews = "NO ORDERS";
    }
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
<?php require_once '../components/navbar_admin.php' ?>
<table class='table'>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Author</th>
                            <th>Comment</th>
                            <th>Rate</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?= $reviews ?>
                    </tbody>
                </table>
    
</body>
</html>