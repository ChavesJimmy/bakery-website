<?php
    $tbody="";
if(isset($_SESSION['ADMIN'])){
    $sql="SELECT * FROM user WHERE user_id={$_SESSION['ADMIN']}";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result)  > 0) {
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
      $tbody=$row['user_name'];}}
      ?>
<div id="navbar">
    <div id="links">
        <div id="flexlinks">
        <div class="links left">
            <a href="addarticle.php">News/Jobs</a>
            <a href="products_list.php">Produkte</a></div>

            <div class="links right">
            <a href="AnswerReview.php">Reviews</a>
            <a href="CheckOrders.php">Orders</a>
        </div>
                    
        </div>
         <div class="logoadmin">
            <a href="../index.php"><img src="https://cdn.pixabay.com/photo/2017/02/09/11/26/alphabet-2051688__480.png" alt="logo"></a>
        </div>
    </div>
    
</div>
   
<div id="title">NOPPE BÄCKEREI</div>
<div class="welcome">Welcome <?= $tbody?>     <a href="../logout.php?logout"><button>log out</button></a>
</div>  