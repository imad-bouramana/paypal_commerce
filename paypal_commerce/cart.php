<?php
 session_start();
 $tittlepage = 'My Shoping Site';
 // include "include/connect.php";

 include "function/function.php";
 include "include/header.php";

 ?>

	<div><?php echo htmlentities($var, ENT_QUOTES, 'utf-8') ?>		
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




<div class="container">
	<div class="row">
      <h2 class="text-center">My Shoping Details</h2>
    <div class="col-md-12">
      <form action="cart.php" method="GET" enctype="multipart/form-data" class="form-group">
        <table class="table table-bordered table-condensed table-striped table-responsive">
           <thead>
            <th>Remove</th>
            <th>Title</th>
            <th>Image</th>
            <th>Price</th>
            <th>Qyt</th>
            <th>Totale Price</th>
           </thead>
           <tbody>
            <?php
             global $db;
              $total = 0;
              $ip = getIp();
              $adress = "SELECT * FROM cart WHERE ip_add = '$ip'";
              $cart_id = $db->query($adress);

              while($p_adress = mysqli_fetch_array($cart_id)){
                   $id_product = $p_adress['p_id'];

                   $p_price = "SELECT * FROM product WHERE ID = '$id_product'";
                   $query2 = $db->query($p_price);
                   while($price = mysqli_fetch_array($query2)){
                    $items_price = array($price['price']);
                    $sum_price = array_sum($items_price);

                    $total += $sum_price;


              ?>      
                
            
            <tr>
              <td><a href="cart.php?delite=<?=$id_product;?>" name="delite" class="btn btn-default btn-xs">
                <span class="glyphicon glyphicon-remove"></span></a>
             </td>
              <td><?=$price['title'];?></td>
              <td><img style="width:130px" src="admin/image_product/<?=$price['image']; ?>"></td>
               <td><?="$".$price['price']; ?></td>
               <td><input type="text" name="qyt"  /></td>
              
               <?php 

             if(isset($_GET['update'])){
                $qyt = $_GET['qyt'];
                $update_qyt = "UPDATE cart SET qyt = '$qyt' WHERE ip_add = '$ip'";
                $qyt_query = $db->query($update_qyt);
                $_SESSION['qyt'] = $qyt;
                $price['price'] = $price['price'] * $qyt;
                $total = $total * $qyt;
              }
             ?>
               <td><?="$".$price['price']; ?></td>
              
           </tr>
           <?php } } ?>

         <tr>
           <td></td>
           <td></td>
           <td><input type="submit" name="update" value="update" class="btn btn-success">
           </td>
           <td> <a href="index.php" class="btn btn-primary">Continue</a>
           </td><td> <a href="checkout.php" class="btn btn-primary">Checkout</a>
           </td>
           <td class="bg-success"> <span>Sum Totale : <?=$total.'$'; ?></span>
           </td>

         </tr>
           </tbody>
      </table>
    </form> 
    </div>
  </div>

     <?php
          global $db;
          $ip = getIp();
          if(isset($_GET['delite'])){ 
          $productid = $_GET['delite'];
          $delite = "DELETE FROM cart WHERE p_id = '$productid' AND ip_add = '$ip'";
          $update = $db->query($delite);
           }
         
      // header('LOCATION: cart.php');
            
     ?>

</div>
<?php
include "include/footer.php";
