<?php

$to = 'test@email.com';

$subject = 'Hola';

$message = 'This is a test email.';

mail($to, $subject, $message);

?>
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
    <?php require_once 'components/navbar.php' ?>
    <div class="path">
        <a href="index.php">🏠 Startseite</a> > <a href="warenkorb.php">warenkorb</a>
    </div>
    <div id="korb">
        <div class="einkauf">
            <h5>my einkauf</h5>
            <ol>
                <li>test</li>
                <li>test</li>
                <li>test</li>
                <li>test</li>
                <li>test</li>
            </ol>
        </div>
        <div class="bill">
            total: XX $ <br>

        </div>
    </div>
    <div id="payment">
        <form action="" method="post">
            <label for="">Name</label>
            <input type="text">
            <label for="Phone">Phone</label>
            <input type="tel" name="" id="">
            <select name="" id="">
                <option value="">>Click and collect</option>
                <option value="">>Visa</option>
                <option value="">other</option>
            </select>
            <button type="submit">Book</button>
        </form>
    </div>
   
    <?php require_once 'components/footer.php' ?>
</body>
</html>