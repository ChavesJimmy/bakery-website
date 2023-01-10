<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="./style/style.css">
</head>
<body>
    <?php require_once 'components/navbar.php' ?>
    <div id="menu">
            <a href="#brot">Brot</a>
            <a href="#viennoiserie">Viennoiserie</a>
            <a href="#patisserie">Pâtisserie</a>
            <a href="#geback">Gebäck</a>
            <a href="#pikant">Pikant</a>
            <a href="#divers">Divers</a>
</div>
<div id="container">
    <div id="brot">
        <h3>Unser Brot</h3>
        <div class="card">
            <div class="img"><img src="https://media.istockphoto.com/id/166578145/fr/photo/baguettes-de-pain.jpg?s=612x612&w=0&k=20&c=F2_xC144R7CZ8pl-3BYmCOyzK21rSrnXlOCElCdf8j0=" alt="baguette"></div>
            <div class="description">
                <p>Baguette Tradition 300g, 2,20 €</p>
                <input type="number" name="" id="">
                <button>+</button><button>-</button>
                <button><a href="">add to cart</a></button>
                </div>
        </div>
        <div class="card">
            <div class="img"><img src="https://cdn.pixabay.com/photo/2015/08/21/11/56/bread-898771__480.jpg" alt="baguette"></div>
            <div class="description">
                <p>Roggen brot, 2,20 €</p>
                <input type="number" name="" id="">
                <button>+</button><button>-</button>
                <button><a href="">add to cart</a></button>
                </div>
        </div>
    </div>
    <div id="viennoiserie"><h3>Unser Viennoiserie</h3></div>
        <div class="card">
            <div class="img"><img src="https://cdn.pixabay.com/photo/2017/06/17/19/16/croissant-2413245__480.jpg" alt="baguette"></div>
            <div class="description">
                <p>Croissant, 2,20 €</p>
                <input type="number" name="" id="">
                <button>+</button><button>-</button>
                <button><a href="">add to cart</a></button>
                </div>
        </div>
        <div class="card">
            <div class="img"><img src="https://cdn.pixabay.com/photo/2016/11/09/15/06/brioche-1811926__480.jpg" alt="baguette"></div>
            <div class="description">
                <p>Brioche, 2,20 €</p>
                <input type="number" name="" id="">
                <button>+</button><button>-</button>
                <button><a href="">add to cart</a></button>
                </div>
        </div>
    <div id="patisserie"><h3>Unser Patisserie</h3></div>
    <div id="geback"><h3>Unser Geback</h3></div>
    <div id="pikant"><h3>Unser Pikant</h3></div>
    <div id="divers"><h3>Unser Divers</h3></div>
</div>
    <?php require_once 'components/footer.php' ?>

</body> 
</html>