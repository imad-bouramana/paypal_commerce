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
<h2 class="text-center">Vieww All Customer</h2>
<table class="table table-bordered table-condensed table-sriped text-center get_product table-responsive">
	<thead>
		<th class="text-center">S:N</th>
		<th class="text-center">Name</th>
		<th class="text-center">Email</th>
		<th class="text-center">Image</th>
		<th class="text-center">Delite</th>
	</thead>
	<tbody>
		<?php
      $custom = "SELECT * FROM custommers";
      $query = $db->query($custom);
      $i = 0;
    while($custommres = mysqli_fetch_assoc($query)):
      $i++;
		?>
		<tr>
			<td><?=$i;?></td>
			<td><?=$custommres['cu_name'];?></td>
			<td><?=$custommres['cu_email'];?></td>
			<td><img src="../customer/customer/<?=$custommres['cu_image'];?>" ></td>
			<td><a href="delite_custom.php?delite_custom=<?=$custommres['cu_id']; ?>">Delite</a></td>
           
		</tr>
		<?php 
	endwhile; ?>
	</tbody>
</table>
<?php  
} //?>