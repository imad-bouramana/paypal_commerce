<div class="text-center">
	<?php
             global $db;
              $total = 0;
              $ip = getIp();
              $adress = "SELECT * FROM cart WHERE ip_add = '$ip'";
              $query = $db->query($adress);

              while($p_adress = mysqli_fetch_assoc($query)){
                   $id_product = $p_adress['p_id'];

                   $p_price = "SELECT * FROM product WHERE ID = '$id_product'";
                   $query2 = $db->query($p_price);
                   while($price = mysqli_fetch_assoc($query2)){
                    $items_price = array($price['price']);
                    $sum_price = array_sum($items_price);
                    $items_title = $price['title'];
                    $total += $sum_price;
                }
            }

              ?>      
	<h2 class="text-center">By Width Paypal</h2>
	<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

  <!-- Identify your business so that you can collect the payments. -->
  <input type="hidden" name="business" value="bouraimad_test@hotmail.com">

  <!-- Specify a Buy Now button. -->
  <input type="hidden" name="cmd" value="_xclick">
  <!-- Specify details about the item that buyers will purchase. -->
  <input type="hidden" name="item_name" value="<?=$items_title; ?>">
  <input type="hidden" name="amount" value="<?=$total; ?>">
  <input type="hidden" name="currency_code" value="USD">
  
  <input type="hidden" name="return" value="success.php">
  <input type="hidden" name="cancel_return" value="https://www.google.com">
  
  <!-- Display the payment button. -->
  <input type="image" name="submit" border="0"
  src="admin/image_product/paypal_button.png"
  alt="Buy Now">
  <img alt="" border="0" width="1" height="1"
  src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

</form>
</div>