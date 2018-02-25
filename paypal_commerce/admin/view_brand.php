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
<h2 class="text-center">Vieww All Brand</h2>
<table class="table table-bordered table-condensed table-sriped text-center get_product table-responsive">
	<thead>
		<th class="text-center">S:N</th>
		<th class="text-center">Title</th>
		<th class="text-center">Edit</th>
		<th class="text-center">Delite</th>
	</thead>
	<tbody>
		<?php
      $get_brand = "SELECT * FROM brands";
      $query = $db->query($get_brand);
      $i = 0;
    while($brand = mysqli_fetch_assoc($query)):
      $i++;
		?>
		<tr>
			<td><?=$i;?></td>
			<td><?=$brand['title'];?></td>

			<td><a href="Aindex.php?edit_brand=<?=$brand['b_id']; ?>">Edite</a></td>
			<td><a href="delite_brand.php?delite_brand=<?=$brand['b_id']; ?>">Delite</a></td>
           
		</tr>
		<?php 
	endwhile; ?>
	</tbody>
</table>

<?php //
}