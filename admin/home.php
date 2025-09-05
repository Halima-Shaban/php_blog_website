<?php
require_once('../app/config.php');
require_once('inc/header.php');
 ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <?php 
            if ( $_SESSION['auth']['role'] == "admin") {

               echo "<h1>Admin home page</h1>";

            }else{
                 echo "<h1>Writer home page</h1>";
            }?>
           

          



            <h2><?php echo $_SESSION['auth']['name']; ?></h2>
        </div>
    </div>
</div>

    <?php require_once('inc/footer.php');?>
     
 
   