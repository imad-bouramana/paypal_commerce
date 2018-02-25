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
	if(isset($_GET['edit_cat'])){
      $edit_cat = $_GET['edit_cat'];
      $get_cat = "SELECT * FROM categories WHERE c_id = '$edit_cat'";
      $query = $db->query($get_cat);
      $category = mysqli_fetch_assoc($query);
      $categorie = $category['cat_name'];
      
     }
     ?>
     <h2 class="text-center">Edit Categories</h2>
     <form action="" method="post">
     	<div class="form-group">
     		<label class="col-md-offset-1 col-md-3">Edit Category :</label>
     		<div class="col-md-4">
     		    <input type="text" name="edit" value="<?=$categorie; ?>" class="form-control" required>
     	    </div>
     	</div>
		 <div class="col-md-offset-1 text-center">	
			 	<input type="submit" class="btn btn-success" name="edit_cat" value="Update Category">
		 </div>
     </form>
     <?php


     if(isset($_POST['edit_cat'])){
     	$edit_name = $_POST['edit'];
        $edit_id = $_GET['edit_cat'];
		$cat = "UPDATE  categories SET cat_name = '$edit_name' WHERE c_id = '$edit_id'";
		$edit_cat = $db->query($cat);
		if($edit_cat){
			echo '<script>alert("Category Updated By Success")</script>';
			echo '<script>window.open("Aindex.php?view_categorie","_self")</script>';

		} 
	}

//
}