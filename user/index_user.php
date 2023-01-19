<?php 
session_start();
require_once '../components/db_connect.php';

if(isset($_SESSION['ADMIN'])){
    header('Location: ./admin/index_admin.php');
    exit;
  }

    $sql="SELECT * FROM user WHERE user_id={$_SESSION['USER']}";
    $result = mysqli_query($connect, $sql);
    $tbody = '';
    if (mysqli_num_rows($result)  > 0) {
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
      $tbody=$row['user_name'];
    
    }
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noppe Bäckerei</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>

    <?php require_once '../components/navbar_user.php' ?>
<div class="resume"> Welcome <?= $tbody?> !</div> <br>

    <div id="carousel">
        <?php require_once '../components/carousel.php'?>
    </div>
    <div id="articles">
    <h2>INFOS</h2>
<div class="article"><h5>Article 1</h5>
    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae nulla magni quod odio quibusdam voluptate doloremque. Velit praesentium maxime, nesciunt sapiente explicabo necessitatibus repellat quis illo delectus et officia accusantium expedita iure beatae, neque impedit, facere maiores nulla nobis. Quo vero fugiat rem vel? Delectus, excepturi. Facilis in iusto ipsum deserunt corporis. <br><br> <small>10 Jänner 2023</small></div>
<div class="article"><h5>Article 2</h5>
Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae nulla magni quod odio quibusdam voluptate doloremque. Velit praesentium maxime, nesciunt sapiente explicabo necessitatibus repellat quis illo delectus et officia accusantium expedita iure beatae, neque impedit, facere maiores nulla nobis. Quo vero fugiat rem vel? Delectus, excepturi. Facilis in iusto ipsum deserunt corporis.</div>
<div class="article"><h5>Article 3</h5>
Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae nulla magni quod odio quibusdam voluptate doloremque. Velit praesentium maxime, nesciunt sapiente explicabo necessitatibus repellat quis illo delectus et officia accusantium expedita iure beatae, neque impedit, facere maiores nulla nobis. Quo vero fugiat rem vel? Delectus, excepturi. Facilis in iusto ipsum deserunt corporis.</div>
    </div>

    <div id="letreview">
        <form  method="post">
            <h2>Leave a review</h2>
            <label for="" name="author">Name/Pseudo</label>
            <input type="text">
            <label for="Rate">rate us</label>
            <select name="rate" >
                <option value=5>⭐⭐⭐⭐⭐</option>
                <option value=4>⭐⭐⭐⭐</option>
                <option value=3>⭐⭐⭐</option>
                <option value=2>⭐⭐</option>
                <option value=1>⭐</option>
                <option value=0>😡</option>
            </select>
            <label for="">your review</label>
            <textarea name="comment" cols="50" rows="20"></textarea>
            <button type="submit">Send review</button>
        </form>
    </div>
    <?php require_once '../components/footer.php' ?>

    <div id="admin"><a href="../login.php"><img src="https://cdn.pixabay.com/photo/2021/06/04/01/22/chef-6308412__480.png" alt="admin"></a></div>
    <script>
    
        <?php require_once '../scripts/script_carousel.js'?>
    </script>
</body>
</html>