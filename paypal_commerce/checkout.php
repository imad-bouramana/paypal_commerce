<?php
 session_start();
 $tittlepage = 'My Shoping Site';
 // include "include/connect.php";

 include "function/function.php";
 include "include/header.php";
 ?>

	<div>
		<img class="img-responsive" src="images/innerbanner.jpg" alt="boutique">
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
         <li><a href="index.php">Home</a></li>
         <li><a href="all_product.php">All Product</a></li>
         <li><a href="#">Sign Up</a></li>
         <li><a href="customer/my_acount.php">My Acount</a></li>
         <li><a href="#">Contact Us</a></li>
         <span class="items text-primary">Items : <?php items();?> - Total Price : <?php totale_price();?></span>

         <li><a href="cart.php">Shop  <span class="glyphicon glyphicon-shopping-cart"></span></a></li>
         
      </ul>
      <form class="navbar-form navbar-left" action="search_product.php" method="get">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search Product" name="search_p">
        </div>
        <button type="submit" class="btn btn-default" name="search" value="search">Submit</button>
      </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>




<div class="container-fluid">
	<div class="col-md-3">
	   <div class="side-bar text-center">
	   	<h2>Categories
	   		<span class="glyphicon glyphicon-plus pull-right list-bar"></span>
	   		
	   	</h2>
	   	<ul>
              <?php  getCats(); ?>    
	   	</ul>
	   	<h2>Brands
	   		<span class="glyphicon glyphicon-plus pull-right list-bar"></span>
	    </h2>
	   	<ul>
	   		<?php  getbrands(); ?>
	   	</ul>
	  </div>
    </div>
    <div class="col-md-9">
      <?php
      if(!isset($_SESSION['cu_email'])){
        include "register.php";
      }else{
        include "payment.php";
      }

      ?>
        
    </div>
</div>
<?php
include "include/footer.php";