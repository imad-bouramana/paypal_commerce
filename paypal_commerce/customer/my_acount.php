<?php
 session_start();
 $tittlepage = 'My Shoping Site';
 // include "include/connect.php";

 include "../function/function.php";
 include "include/header.php";
 ?>

	<div>
		<img class="img-responsive" src="../images/innerbanner.jpg" alt="boutique">
	</div>
	<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
    	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#MyNavbar" aria-expanded="false">
         <span class="sr-only">Toggle navigation</span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
    
         </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="MyNavbar">
      <ul class="nav navbar-nav navbar-left">
         <li><a href="../index.php">Home</a></li>
         <li><a href="../all_product.php">All Product</a></li>
         <li><a href="#">Sign Up</a></li>
         <li><a href="my_acount.php">My Acount</a></li>
         <li><a href="#">Contact Us</a></li>
         <span class="items text-primary">Items : <?php items();?> - T Price : <?php totale_price();?></span>

         <li><a href="../cart.php">Shop  <span class="glyphicon glyphicon-shopping-cart"></span></a></li>
         
      </ul>
      <form class="navbar-form navbar-left" action="../search_product.php" method="get">
        <div class="form-group">
          <input type="text" class="form-control search" placeholder="Search" name="search_p">
        </div>
        <button type="submit" class="btn btn-default" name="search" value="search">Submit</button>
      </form>
      <?php
       if(!isset($_SESSION['cu_email'])){
        echo '<a href="../checkout.php" class="items">Login</a>';
       }else{
         echo '<a href="../logout.php" class="items">Logout</a>';
       }

      ?>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>




<div class="container-fluid">
  
	<div class="col-md-3 my_acount">
    <h2 class="text-center">My Acount</h2>
    <?php
       
       $user = (isset($_SESSION['cu_email'])? $_SESSION['cu_email']:'');
       $image = "SELECT * FROM custommers WHERE cu_email = '$user'";
       $img = $db->query($image);
       $cu_image = mysqli_fetch_assoc($img);
       $image_user = $cu_image['cu_image'];
       
       if(isset($_SESSION['cu_email'])){
    ?> 

      <img src="customer/<?=$image_user;?>" class="img-responsive" alt="my_image">
    <?php } ?>
      <p><a href="my_acount.php?my_orders">My Orders</a></p>
      <p><a href="my_acount.php?my_profile">Edit Profile</a></p>
      <p><a href="my_acount.php?my_password">Change Password</a></p>
      <p><a href="my_acount.php?delite_profile">Delite Profile</a></p>
    
  </div>
  <div class="col-md-9">
       <?php cart(); ?>
    
     <div class="menu-bar menu_acount">
          <div class="row">
           <?php 
          if(!isset($_GET['my_orders'])){
             if(!isset($_GET['my_profile'])){
                if(!isset($_GET['my_password'])){
                   if(!isset($_GET['delite_profile'])){
                    echo '<h2 class="text-center">Welcome : '.$cu_image["cu_name"].'</h2>';
                    echo '<h3 class="text-center">You Can See You Order By Cliking This <a href="my_acount.php?my_orders">Link</a></h3>';
                   }
                }
              }
          }
         if(isset($_GET['my_profile'])){
           include "my_profile.php";
         }
         if(isset($_GET['my_password'])){
           include "change_password.php";
         }
         if(isset($_GET['delite_profile'])){
           include "delite_profile.php";
         }
       
           ?>
          
         </div>
     </div>

  </div>

    
</div>

<?php

include "../include/footer.php";