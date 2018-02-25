<?php 
 if(!isset($_SESSION['email'])){
       echo '<script>window.open("login.php?not_admin=You Are Not Admin !","_self")</script>';
 }else{

//
      ob_start();
     $db = mysqli_connect("localhost","root","","ecommerce"); 
if(mysqli_connect_errno()){
	echo 'faild to conect whith database: '. mysqli_connect_error();
	die();
}
	
     
     ?>
     <h2 class="text-center">Add Categories</h2>
     <form action="" method="post">
     	<div class="form-group">
     		<label class="col-md-offset-1 col-md-3">Insert Category :</label>
     		<div class="col-md-4">
     		    <input type="text" name="add_cat" placeholder="Add Category" class="form-control" required>
     	    </div>
     	</div>

		 <div class="col-md-offset-1 text-center">	
			 	<input type="submit" class="btn btn-success" name="insert_cat" value="Insert Category">
		     
		 </div>
     	

     </form>
     <?php


     if(isset($_POST['insert_cat'])){
		$category = $_POST['add_cat'];
		$ad_cat = "INSERT INTO categories (cat_name) VALUES ('$category')";
		$run_cat = $db->query($ad_cat);
		if($run_cat){
			echo '<script>alert("Category Insert By Success")</script>';
			echo '<script>window.open("Aindex.php?view_categorie","_self")</script>';

		} 
	}

//
}