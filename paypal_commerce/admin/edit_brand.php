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
	if(isset($_GET['edit_brand'])){
      $edit_brand = $_GET['edit_brand'];
      $get_brand = "SELECT * FROM brands WHERE b_id = '$edit_brand'";
      $query = $db->query($get_brand);
      $brand = mysqli_fetch_assoc($query);
      $brand_title = $brand['title'];
      
     }
     ?>
     <h2 class="text-center">Edit Brand</h2>
     <form action="" method="post">
     	<div class="form-group">
     		<label class="col-md-offset-1 col-md-3">Edit Brand :</label>
     		<div class="col-md-4">
     		    <input type="text" name="brand" value="<?=$brand_title; ?>" class="form-control" required>
     	    </div>
     	</div>
		 <div class="col-md-offset-1 text-center">	
			 	<input type="submit" class="btn btn-success" name="edit_Brand" value="Update Brand">
		 </div>
     </form>
     <?php


  if(isset($_POST['edit_Brand'])){
     	  $edit_brand = $_POST['brand'];
        $edit_id = $_GET['edit_brand'];
		    $brand = "UPDATE  brands SET title = '$edit_brand' WHERE b_id = '$edit_id'";
		    $edit_cat = $db->query($brand);
		if($edit_cat){
			echo '<script>alert("Brand Updated By Success")</script>';
			echo '<script>window.open("Aindex.php?view_brand","_self")</script>';

		} 
	}
//
}