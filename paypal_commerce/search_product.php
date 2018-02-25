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
         <li><a href="#">Shoping Cart</span></a></li>
         <li><a href="customer/my_acount.php">My Acount</a></li>
         <li><a href="#">Contact Us</a></li>
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
     <div class="menu-bar">
          <div class="row">
            <?php
      if(isset($_GET['search'])){
         $search = $_GET['search_p'];
         $query = "SELECT * FROM product WHERE p_key like '%$search%'";
         $stmt = $db->query($query);
         while($product = mysqli_fetch_assoc($stmt)):   ?>


            <div class="col-sm-6 col-md-4">
              <div class="thumbnail">
                 <h3 class="text-center"><?= $product['title']; ?></h3>
                 
                <img src="admin/image_product/<?=$product['image']; ?>" alt="<?=$product['image']['name']; ?>" class="img-responsive">
                <div class="caption">
                   <a href="details.php?pro_id=<?=$product['ID'];?>" class="btn btn-success btn-sm" role="button">Detail</a> 
                  <span class="pull-right"><?=$product['price']; ?></span>
                  <a href="index.php?pro_id=<?=$product['ID']; ?>" class="btn btn-default btn-sm">Add To Cart</a>
                </div>
              </div>
            </div>

          <?php endwhile;

         }



            if(isset($_GET['brand'])){
          
            $brand = $_GET['brand'];
             $query_brand = "SELECT * FROM product WHERE p_brand = '$brand'";
             $stmt = $db->query($query_brand);
             $countbrand = mysqli_num_rows($stmt);
            if($countbrand  ==0 ){
               echo '<h2 class="text-center bg-danger">No Such Product Here</h2>';
        
              }else{
        
         while($brand = mysqli_fetch_assoc($stmt)):   ?>


            <div class="col-sm-6 col-md-4">
              <div class="thumbnail">
                 <h3 class="text-center"><?= $brand['title']; ?></h3>
                 
                <img src="admin/image_product/<?=$brand['image']; ?>" alt="<?=$brand['image']['name']; ?>" class="img-responsive">
                <div class="caption">
                   <a href="details.php?pro_id=<?=$brand['ID'];?>" class="btn btn-success btn-sm" role="button">Detail</a> 
                  <span class="pull-right"><?=$brand['price']; ?></span>
                  <a href="index.php?cart_id=<?=$brand['ID']; ?>" class="btn btn-default btn-sm">Add To Cart</a>
                </div>
              </div>
            </div>

          <?php endwhile;
        }
          
         
            $cat = $_GET['cat'];
             $query_cat= "SELECT * FROM product WHERE p_category = '$cat'";
             $stmt = $db->query($query_cat);
             $count = mysqli_num_rows($stmt);
            if($count ==0 ){
               echo '<h2 class="text-center bg-danger">No Such Product Here</h2>';
        
              }else{
        
          
         while($cat = mysqli_fetch_assoc($stmt)):  
            
          ?>
               
            <div class="col-sm-6 col-md-4">
              <div class="thumbnail">
                 <h3 class="text-center"><?=$cat['title']; ?></h3>
                 
                <img src="admin/image_product/<?=$cat['image']; ?>" alt="<?=$cat['image']['name']; ?>" class="img-responsive">
                <div class="caption">
                   <a href="details.php?pro_id=<?=$cat['ID'];?>" class="btn btn-success btn-sm" role="button">Detail</a> 
                  <span class="pull-right"><?=$cat['price']; ?></span>
                  <a href="index.php?cart_id=<?=$cat['ID']; ?>" class="btn btn-default btn-sm">Add To Cart</a>
                </div>
              </div>
            </div>

          <?php endwhile;
        }
          } 
        
        ?>
          </div>
     </div>
    </div>
</div>
<?php
include "include/footer.php";