<?php
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
         <li><a href="cart.php">Shop  <span class="glyphicon glyphicon-shopping-cart"></span></a></li>
         <span class="items text-primary">Items : <?php items();?> - Total Price : <?php totale_price();?></span>

         
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
	 <div class="col-md-12">
	   <div class="menu-bar">
	   	    <div class="row">
            <?php
            $query = "SELECT * FROM product";
         $stmt = $db->query($query);
         while($product = mysqli_fetch_assoc($stmt)):   ?>


            <div class="col-sm-6 col-md-3">
              <div class="thumbnail">
                 <h3 class="text-center"><?= $product['title']; ?></h3>
                 
                <img src="admin/image_product/<?=$product['image']; ?>" alt="<?=$product['image']['name']; ?>" class="img-responsive">
                <div class="caption">
                   <a href="details.php?pro_id=<?=$product['ID'];?>" class="btn btn-success btn-sm" role="button">Detail</a> 
                  <span class="pull-right"><?=$product['price']; ?></span>
                  <a href="index.php?cart_id=<?=$product['ID']; ?>" class="btn btn-default btn-sm">Add To Cart</a>
                </div>
              </div>
            </div>

          <?php endwhile;
        
        ?>
          </div>
	   </div>
    </div>
</div>
<?php
include "include/footer.php";