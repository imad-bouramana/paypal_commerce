<?php 
  
   if(!isset($_SESSION['email'])){
       echo '<script>window.open("login.php?not_admin=You Are Not Admin !","_self")</script>';
 }else{
//


               $db = mysqli_connect("localhost","root","","ecommerce"); 
          if(mysqli_connect_errno()){
          	echo 'faild to conect whith database: '. mysqli_connect_error();
          	die();
          }
	
     
     ?>
     <h2 class="text-center">Add Brand</h2>
     <form action="" method="post">
     	<div class="form-group">
     		<label class="col-md-offset-1 col-md-3">Insert Brand :</label>
     		<div class="col-md-4">
     		    <input type="text" name="add_brand" placeholder="Add brand" class="form-control" required>
     	    </div>
     	</div>
          <div class="form-group">
		 <div class="text-center">	
			 	<input type="submit" class="btn btn-success" name="Add_brand" value="Insert Brand">
		 </div>
     	</div>

     </form>
     <?php


     if(isset($_POST['Add_brand'])){
		$brands = $_POST['add_brand'];
		$ad_brand = "INSERT INTO brands (title) VALUES ('$brands')";
		$run_brand = $db->query($ad_brand);
		if($run_brand){
     		echo '<script>alert("Brand Insert By Success")</script>';
			echo '<script>window.open("Aindex.php?view_brand","_self")</script>';

		} 
	}
     //
}