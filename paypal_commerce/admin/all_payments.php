<?php
 
// include "function/function.php";

 $db = mysqli_connect("sql202.ezyro.com","ezyro_19667789","ROCHAN1982","ezyro_19667789_ecommerce"); 

//
 if(mysqli_connect_errno()){
	echo 'faild to conect whith database: '. mysqli_connect_error();
	die();
}

?>
<h2 class="text-center">View All Payment</h2>
<table class="table table-bordered table-condensed table-sriped text-center table-responsive">
	<thead>
		<th>S:N</th>
		<th>Email</th>
		<th>Amount</th>
		<th>Title</th>
		<th>Image</th>
		<th>Date</th>
		<th>Transition</th>
		
	</thead>
	<tbody>
		<?php
      
      $get_paym = "SELECT * FROM paymount";
      $q_paym = $db->query($get_paym); 
      $i = 0;
    while($paymount = mysqli_fetch_assoc($q_paym)):
      $c_id = $paymount['customer_id'];
      $p_id = $paymount['product_id'];
      $get_product = "SELECT * FROM product WHERE ID = '$p_id'";
      $q_product = $db->query($get_product);
      $fetch_pro = mysqli_fetch_assoc($q_product);
      $title = $fetch_pro['title'];
      $i++;  ?>
		<tr>
                        <td><?=$i; ?></td>
                        <td><?=$i; ?></td>
                        <td><?='$'.$paymount['amount']; ?></td>
                        <td><?=$title; ?></td>
			            <td><img src="../customer/customer/<?= $fetch_pro['image']; ?>" class="img-responsive get-img"></td>
                        <td><?=$paymount['date']; ?></td>
                        <td><?=$paymount['txn_id']; ?></td>
		</tr>
		<?php
	endwhile; ?>
	</tbody>
</table>

