<?php
 session_start();
 if(!isset($_SESSION['email'])){
       echo '<script>window.open("login.php?not_admin=You Are Not Admin !","_self")</script>';
 }else{
 $tittlepage = 'Admin';
 // include "include/connect.php";

 include "function/function.php";
 include "include/header.php";
 ?>


<div class="container">
  
  <div class="row">
    <div>
    <img class="img-responsive admin_img" src="image_product/admin.jpg" alt="boutique">
  </div>
  
	 <div class="col-md-3 col-xs-12 right">
    <h2 class="text-center">Manage Content</h2>
	   		
	   	<ul>
        <li><a href="Aindex.php?insert_product">Insert New Product</a></li>
        <li><a href="Aindex.php?view_product">View Product</a></li>
        <li><a href="Aindex.php?insert_categorie">Insert Categorie</a></li>
        <li><a href="Aindex.php?view_categorie">View Categorie</a></li>
        <li><a href="Aindex.php?insert_brand">Insert Brand</a></li>
        <li><a href="Aindex.php?view_brand">View Brand</a></li>
        <li><a href="Aindex.php?view_customers">View customers</a></li>
        <li><a href="Aindex.php?view_orders">view Orders</a></li>
        <li><a href="Aindex.php?view_payment">View Payments</a></li>
        <li><a href="logout.php">Log Out</a></li>

      </ul>
      
	 
    </div>
    <div class="col-md-9 left text-center">
      <h1 style="text-align: center; font-size: 40px; padding: 20px"><?php echo @$_GET['admin'];?></h1>

     <?php
       if(isset($_GET['insert_product'])){
          include "insert_products.php";
       }
        if(isset($_GET['view_product'])){
          include "view_product.php";
       }
       if(isset($_GET['edit_pro'])){
          include "edit_pro.php";
       }
       if(isset($_GET['insert_categorie'])){
          include "insert_categorie.php";
       }
        if(isset($_GET['view_categorie'])){
          include "view_categorie.php";
       }
       if(isset($_GET['edit_cat'])){
          include "edit_cat.php";
       }
       if(isset($_GET['insert_brand'])){
          include "insert_brand.php";
       }
       if(isset($_GET['view_brand'])){
          include "view_brand.php";
       }
       if(isset($_GET['edit_brand'])){
          include "edit_brand.php";
       }
        if(isset($_GET['view_customers'])){
          include "view_customers.php";
       }
       
       
       

      ?>
    
	        
    </div>
  </div>
</div>
</body>
</html>
<?php } ?>