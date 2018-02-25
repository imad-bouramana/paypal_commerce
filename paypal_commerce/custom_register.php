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
      <h2 class="text-center">Create Acount</h2>
      <form class="form-horizontal" action="custom_register.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="name" class="col-md-offset-2 col-sm-2 control-label">Name :</label>
            <div class="col-sm-10 col-md-6">
              <input type="text" class="form-control" id="name" name="name" placeholder="name" required>
            </div>
          </div>
          <div class="form-group">
            <label for="image" class="col-md-offset-2 col-sm-2 control-label">Image:</label>
            <div class="col-sm-10 col-md-6">
              <input type="file" class="form-control" name="image">
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="col-md-offset-2 col-sm-2 control-label">Email :</label>
            <div class="col-sm-10 col-md-6">
              <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
            </div>
          </div>
          <div class="form-group">
            <label for="password" class="col-md-offset-2 col-sm-2 control-label">Password:</label>
            <div class="col-sm-10 col-md-6">
              <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>
          </div>
          <div class="form-group">
            <label for="adress" class="col-md-offset-2 col-sm-2 control-label">Adress:</label>
            <div class="col-sm-10 col-md-6">
              <input type="text" class="form-control" id="adress" name="adress" placeholder="adress" required>
            </div>
          </div>
          <div class="form-group">
            <label for="country" class="col-md-offset-2 col-sm-2 control-label">Country:</label>
            <div class="col-sm-10 col-md-6">
              <input type="text" class="form-control" id="country" name="country" placeholder="country" required>
            </div>
          </div>
          <div class="form-group">
            <label for="city" class="col-md-offset-2 col-sm-2 control-label">City:</label>
            <div class="col-sm-10 col-md-6">
              <input type="text" class="form-control" id="city" name="city" placeholder="city">
            </div>
          </div>
          <div class="form-group">
            <label for="contact" class="col-md-offset-2 col-sm-2 control-label">Contact:</label>
            <div class="col-sm-10 col-md-6">
              <input type="text" class="form-control" id="contact" name="contact" placeholder="contact" required>
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-offset-4 col-sm-10 col-md-6">
              <button type="submit" class="btn btn-default" name="register">Sign in</button>
            </div>
          </div>
      </form>
        
    </div>
</div>
<?php
if(isset($_POST['register'])){
  $ip = getIp();
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $adress = $_POST['adress'];
  $country = $_POST['country'];
  $city = $_POST['city'];
  $contact = $_POST['contact'];
  $image = $_FILES['image']['name'];
  $tmp_name = $_FILES['image']['tmp_name'];
  move_uploaded_file($tmp_name, "images/customer/$image");
  $insert_r = "INSERT INTO custommers (`cu_ip`,`cu_name`,`cu_email`,`cu_pass`,`adress`,`cu_city`,`cu_country`,`cu_contact`,`cu_image`)
                        VALUES ('$ip','$name','$email','$password','$adress','$city','$country','$contact','$image')";
    $query = $db->query($insert_r);

    $custom = "SELECT * FROM cart WHERE ip_add = '$ip'";
    $stmt = $db->query($custom);
    $count = mysqli_num_rows($stmt);
    if($count == 0){
      $_SESSION['cu_email'] = $email;
      echo "<script>alert('You Are Register By Success')</script>";
      echo '<script>window.open("my_acount.php","_self")</script>';
    }else{
      $_SESSION['cu_email'] = $email;
      echo "<script>alert('You Are Register By Success')</script>";
      echo '<script>window.open("checkout.php","_self")</script>';
 
   
    }

}
include "include/footer.php";