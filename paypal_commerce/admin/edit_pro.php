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
     
     if(isset($_GET['edit_pro'])){
     	$edit_product = $_GET['edit_pro'];
     $get_product = "SELECT * FROM product WHERE ID = '$edit_product'";
      $query = $db->query($get_product);
      $product = mysqli_fetch_assoc($query);
      $editproduct = $product['ID'];
      $cat_id = $product['p_category'];
      $brand_id = $product['p_brand'];
      

     $get_cat = "SELECT * FROM categories WHERE c_id = '$cat_id'";
      $query = $db->query($get_cat);
      $category = mysqli_fetch_assoc($query);
      

     $get_brand = "SELECT * FROM brands WHERE b_id = '$brand_id'";
      $query = $db->query($get_brand);
      $brands = mysqli_fetch_assoc($query);
      
  }
     
     ?>
	<h2>Insert Product</h2>
	<hr>
	<form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
		<div class="form-group">
		    <label for="title" class="col-md-offset-2 col-md-3">Title:</label>
			 <div class="col-md-5">	
			 	<input type="text" class="form-control" name="title"  value="<?=$product['title']; ?>" required />
			 </div>
		 </div>
		 <div class="form-group">
		     <label for="brand" class="col-md-offset-2 col-md-3">Brand:</label>
			 <div class="col-md-5">	
	              <select class="form-control" name="brand">
	              	<option  value=""><?=$brands['title']; ?></option>
	              	<?php
	                 $query = $db->query("SELECT * FROM brands");
	                 while($brand = mysqli_fetch_assoc($query)):
	                 	?>
	                 	 <option value="<?=$brand['b_id'];?>"><?=$brand['title'];?></option>
	                <?php endwhile;	?>
	              </select>
			 </div>
		 </div>
		 <div class="form-group">
		    <label for="category" class="col-md-offset-2 col-md-3">Categorie:</label>
		    <div class="col-md-5">	
		 	   <select class="form-control" name="category">
              	<option  value="" ><?=$category['cat_name']; ?></option>
              	<?php
                 $query = $db->query("SELECT * FROM categories");
                 while($cats = mysqli_fetch_assoc($query)){
                 	echo "<option value=".$cats['c_id'].">".$cats['cat_name']."</option>";
                 }

              	?>
              </select>
		 	</div>
		 </div>
		 <div class="form-group pro_image">
		     <label for="image" class="col-md-offset-2 col-md-3">Image:</label>
			 <div class="col-md-5">	
			 	<img src="image_product/<?=$product['image']; ?>">
			
			 	<input type="file" class="form-control" name="image" required>
			 </div>
		 </div>
		 <div class="form-group">
		    <label for="price" class="col-md-offset-2 col-md-3">Price:</label>
			 <div class="col-md-5">	
			 	<input type="text" class="form-control" name="price" value="<?=$product['price']; ?>" required>
			 </div>
		 </div>
		 <div class="form-group">
		    <label for="description" class="col-md-offset-2 col-md-3">Description:</label>
		    <div class="col-md-5">	
		 	   <textarea cols="62" rows="10" name="description"><?=$product['description']; ?></textarea>
		 	 </div>
		 </div>
		 <div class="form-group">
		     <label for="key" class="col-md-offset-2 col-md-3">Product Key:</label>
			 <div class="col-md-5">	
			 	<input type="text" class="form-control" name="key"  value="<?=$product['p_key']; ?>" required>
			 </div>
		 </div>
		 <div class="form-group">
			 <div class="col-md-offset-1 text-center">	
			 	<input type="submit" class="btn btn-success" name="edit_product" value="Edit Product">
			 </div>
		 </div>
	</form>

<?php 
      if(isset($_POST['edit_product'])){
      	//$pro_id = $_GET['edit_product'];
      	$title = sanitize($_POST['title']);
      	$brand = (isset($_POST['brand'])? sanitize($_POST['brand']):'');
      	$category = (isset($_POST['category'])? sanitize($_POST['category']):'');
      	$description = (isset($_POST['description'])?($_POST['description']):'');
        $price = sanitize($_POST['price']);
      	$key = sanitize($_POST['key']);
      	$image = $_FILES['image']['name'];
      	$image_tmp = $_FILES['image']['tmp_name'];
      	move_uploaded_file($image_tmp, "image_product/$image");
      	$edit = "UPDATE  product SET p_category = '$category', p_brand = '$brand', title = '$title', price = '$price',
      	description = '$description', image = '$image', p_key = '$key' WHERE ID = '$editproduct'";
      	$edit_pro = $db->query($edit);
      	if($edit_pro){
      		 echo "<script>alert('Product Update  By Success')</script>";
             echo '<script>window.open("Aindex.php?view_product","_self")</script>';
 
      	}
      }

//

}      
