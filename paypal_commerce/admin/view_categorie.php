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
<h2 class="text-center">Vieww All Categorie</h2>
<table class="table table-bordered table-condensed table-sriped text-center get_product table-responsive">
	<thead>
		<th class="text-center">S:N</th>
		<th class="text-center">Title</th>
		<th class="text-center">Edit</th>
		<th class="text-center">Delite</th>
	</thead>
	<tbody>
		<?php
      $get_cat = "SELECT * FROM categories";
      $query = $db->query($get_cat);
      $i = 0;
    while($category = mysqli_fetch_assoc($query)):
      $i++;
		?>
		<tr>
			<td><?=$i;?></td>
			<td><?=$category['cat_name'];?></td>

			<td><a href="Aindex.php?edit_cat=<?=$category['c_id']; ?>">Edite</a></td>
			<td><a href="delite_cat.php?delite_cat=<?=$category['c_id']; ?>">Delite</a></td>
           
		</tr>
		<?php 
	endwhile; ?>
	</tbody>
</table>

<?php  } //?>