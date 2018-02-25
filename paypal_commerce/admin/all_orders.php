<?php
 
// include "function/function.php";

 $db = mysqli_connect("sql202.ezyro.com","ezyro_19667789","ROCHAN1982","ezyro_19667789_ecommerce"); 

//
 if(mysqli_connect_errno()){
	echo 'faild to conect whith database: '. mysqli_connect_error();
	die();
}

?>
<h2 class="text-center">All Orders</h2>
<table class="table table-bordered table-condensed table-sriped text-center table-responsive">
	<thead>
		<th>S:N</th>
		<th>Title</th>
		<th>Price</th>
		<th>Image</th>
		<th>Date</th>
		<th>Qty</th>
		<th>Avoice</th>
		<th>Status</th>

	</thead>
	<tbody>
		<?php
       $get_orders = "SELECT * FROM orders";
      $q_orders = $db->query($get_orders); 
     $i = 0;
    while($orders = mysqli_fetch_assoc($q_orders)):
      $orders_id = $orders ['p_id'];
      $get_product = "SELECT * FROM product WHERE ID = '$orders_id'";
      $q_product = $db->query($get_product);
      $fetch_pro = mysqli_fetch_assoc($q_product);
      $title = $fetch_pro['title'];
      $i++;  ?>
		<tr>
                        <td><?=$i; ?></td>
			<td><?= $title ; ?></td>
			<td><?= $fetch_pro['price']; ?></td>
                        <td><img src="customer/<?= $fetch_pro['image']; ?>" class="img-responsive get-img"></td>
                        <td><?= $orders['date']; ?></td>
                        <td><?= $orders['qty']; ?></td>
                        <td><?= $orders['avoice']; ?></td>
                        <td><?= $orders['status']; ?></td>
		</tr>
		<?php
	endwhile; ?>
	</tbody>
</table>

