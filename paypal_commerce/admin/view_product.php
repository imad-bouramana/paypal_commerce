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
<h2 class="text-center">Vieww All Product</h2>
<table class="table table-bordered table-condensed table-sriped text-center get_product table-responsive">
	<thead>
		<th>S:N</th>
		<th>Title</th>
		<th>Price</th>
		<th>Image</th>
		<th>Edit</th>
		<th>Delite</th>
	</thead>
	<tbody>
		<?php
      $get_product = "SELECT * FROM product";
      $query = $db->query($get_product);
      $i = 0;
    while($product = mysqli_fetch_assoc($query)):
      $i++;
		?>
		<tr>
			<td><?=$i;?></td>
			<td><?=$product['title']; ?></td>
			<td><?=$product['price']; ?></td>
			<td><img src="image_product/<?=$product['image'];?>" /></td>
			<td><a href="Aindex.php?edit_pro=<?=$product['ID']; ?>">Edite</a></td>
			<td><a href="delite_pro.php?delite_pro=<?=$product['ID']; ?>">Delite</a></td>
           
		</tr>
		<?php 
	endwhile; ?>
	</tbody>
</table>

<?php


//
} ?>