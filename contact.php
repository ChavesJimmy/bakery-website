<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style/style.css">
</head>
<body>
    <?php require_once './components/navbar.php' ?>  
    <div class="path">
        <a href="">🏠 Startseite</a>><a href="">contact</a>
    </div>
    <h1>How to contact us?</h1>
    <h4>Our address</h4>
    <?php require_once './components/googleMaps/location.html' ?></div>
  
        <div class="address">
            xxX bakerstrasse 1234 WIEN
            <div class="offnungzeit">Öffnugzeiten: <br>
            -Dienstag bis Samstag 06:00-17:00 Uhr
            <br>
            -Sonntag 07:00-13:00 Uhr 

            </div>
        </div>
    <h4>Phone/Email</h4>
    <div class="tel_email">
        tel:012345678 <br>
        email:xxxxx@gmail.wien
    </div>
    <h4>Social Media</h4>
    <div class="media">
        <div><a href=""><img src="https://cdn4.iconfinder.com/data/icons/social-media-and-logos-12/32/Logo_facebook-128.png"><p>Facebook</p></a></div>
        <div><a href=""><img src="https://cdn3.iconfinder.com/data/icons/social-media-2253/17/Vector-1-128.png"><p>Instagram</p></a></div>
        <div><a href=""><img src="https://cdn1.iconfinder.com/data/icons/social-media-outline-6/128/SocialMedia_Twitter-Outline-128.png"><p>Twitter</p></a></div>
    </div>
    

    <?php require_once './components/footer.php' ?>
</body>
</html>