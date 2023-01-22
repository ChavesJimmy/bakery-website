<?php
$tbody = '';
$tid="";

if(isset($_SESSION['USER'])){
   
    $sql="SELECT * FROM user WHERE user_id={$_SESSION['USER']}";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result)  > 0) {
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
      $tbody=$row['user_name'];
      $tid=$row['user_id'];
    
    }}
?>
<div id="navbar">
    <div id="links">
        <div id="flexlinks">
        <div class="links left">
            <a href="./überuns.php">Über uns</a>
            <a href="./products.php">Produkte</a>
        </div>
        
        <div class="links right">
            <a href="./contact.php">Kontakt</a>
            <a href="./warenkorb.php">Warenkorb</a>
        </div></div>
         <div class="logo">
            <a href="index_user.php"><img src="https://cdn.pixabay.com/photo/2017/02/09/11/26/alphabet-2051688__480.png" alt="logo"></a>
        </div>
    </div>
    
</div>
<div class="resume"> Welcome <?= $tbody?> !     <a href="../logout.php?logout"><button>log out</button></a>
</div> <br>

<div id="title">NOPPE BÄCKEREI</div>
