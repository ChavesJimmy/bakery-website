<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noppe Bäckerei</title>
    <link rel="stylesheet" href="./style/style.css">
</head>
<body>
    <?php require_once 'components/navbar.php' ?>

    <div id="carousel">
        <?php require_once 'components/carousel.php'?>
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
    <?php require_once 'components/footer.php' ?>

    <div id="admin"><a href="login.php"><img src="https://cdn.pixabay.com/photo/2021/06/04/01/22/chef-6308412__480.png" alt="admin"></a></div>
    <script>
    
        <?php require_once 'scripts/script_carousel.js'?>
    </script>
</body>
</html>