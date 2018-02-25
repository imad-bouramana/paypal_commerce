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
	<h2>Insert Product</h2>
	<hr>
	<form action="Aindex.php?insert_product" method="post" enctype="multipart/form-data" class="form-horizontal">
		<div class="form-group">
		    <label for="title" class="col-md-offset-2 col-md-3">Title:</label>
			 <div class="col-md-5">	
			 	<input type="text" class="form-control" name="title" placeholder="title" required />
			 </div>
		 </div>
		 <div class="form-group">
		     <label for="brand" class="col-md-offset-2 col-md-3">Brand:</label>
			 <div class="col-md-5">	
	              <select class="form-control" name="brand">
	              	<option  value="" >Select brand</option>
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
              	<option  value="" >Select Category</option>
              	<?php
                 $query = $db->query("SELECT * FROM categories");
                 while($cats = mysqli_fetch_assoc($query)){
                 	echo "<option value=".$cats['c_id'].">".$cats['cat_name']."</option>";
                 }

              	?>
              </select>
		 	</div>
		 </div>
		 <div class="form-group">
		     <label for="image" class="col-md-offset-2 col-md-3">Image:</label>
			 <div class="col-md-5">	
			 	<input type="file" class="form-control" name="image" required>
			 </div>
		 </div>
		 <div class="form-group">
		    <label for="price" class="col-md-offset-2 col-md-3">Price:</label>
			 <div class="col-md-5">	
			 	<input type="text" class="form-control" name="price" placeholder="Price" required>
			 </div>
		 </div>
		 <div class="form-group">
		    <label for="description" class="col-md-offset-2 col-md-3">Description:</label>
		    <div class="col-md-5">	
		 	   <textarea cols="62" rows="10" name="description"></textarea>
		 	 </div>
		 </div>
		 
		 <div class="form-group">
			 <label for="key" class="col-md-offset-2 col-md-3">Product Key:</label>
			 <div class="col-md-5">	
			 	<input type="text" class="form-control" name="key" placeholder="Product Key" required>
			 </div>
		 </div>
		 <div class="col-md-offset-1 text-center">	
			 	<input type="submit" class="btn btn-success" name="insert_post" value="Insert Product">
		     
		 </div>
	</form>

<?php 
      if(isset($_POST['insert_post'])){
      	$title = sanitize($_POST['title']);
      	$brand = (isset($_POST['brand'])? sanitize($_POST['brand']):'');
      	$category = (isset($_POST['category'])? sanitize($_POST['category']):'');
      	$description = (isset($_POST['description'])?($_POST['description']):'');
        $price = sanitize($_POST['price']);
      	$key = sanitize($_POST['key']);
      	$image = $_FILES['image']['name'];
      	$image_tmp = $_FILES['image']['tmp_name'];
      	move_uploaded_file($image_tmp, "image_product/$image");
      	$insert = "INSERT INTO product (`p_category`,`p_brand`,`title`,`price`,`description`,`image`,`p_key`) VALUES
      	 ('$category','$brand','$title','$price','$description','$image','$key')";
      	 $insert_pro = $db->query($insert);
      	if($insert_pro){
      		 echo "<script>alert('Product Insert  By Success')</script>";
             echo '<script>window.open("Aindex.php?insert_products","_self")</script>';
 
      	}
      }


//

  }