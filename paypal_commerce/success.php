<?php  
session_start();


 include "function/function.php";


              global $db;
              $total = 0;
              $ip = getIp();
              $adress = "SELECT * FROM cart WHERE ip_add = '$ip'";
              $cart_id = $db->query($adress);

              while($p_adress = mysqli_fetch_array($cart_id)){
                   $id_product = $p_adress['p_id'];

                   $p_price = "SELECT * FROM product WHERE ID = '$id_product'";
                   $query2 = $db->query($p_price);
                   while($price = mysqli_fetch_array($query2)){
                    $items_price = array($price['price']);
                    $sum_price = array_sum($items_price);
                    $product_id = $price['ID'];
                    $total += $sum_price;

                   }
               }   
              $select_qty = "SELECT * FROM cart WHERE p_id = '$product_id'";
              $get_qty = $db->query($select_qty);
              $qty_q = mysqli_fetch_assoc($get_qty); 
              $qty = $qty_q['qyt'];
              if($qty == 0){
                $qty = 1;
              }else{
                $qty = $qty;
              }
       $user = (isset($_SESSION['cu_email'])? $_SESSION['cu_email']:'');
       $custom = "SELECT * FROM custommers WHERE cu_email = '$user'";
       $query_c = $db->query($custom);
       $customer = mysqli_fetch_assoc($query_c);
       $custom_id = $customer['cu_id'];
      $custom_name = $customer['cu_name'];
              $amount = $_GET['amt'];
              $currency = $_GET['cc'];
              $trx_id = $_GET['tx'];

        $insert_payment = "INSERT INTO  paymount (amount,customer_id,product_id,currancy)
         VALUES ('$amount','$custom_id','$id_product','$currency')";
         $paymount = $db->query($insert_payment);

         $insert_order = "INSERT INTO orders (p_id,c_id,qty) 
         VALUES ('$id_product','$custom_id','$qty')";  
         $order = $db->query($insert_order);

         $delet_cart = "DELETE FROM cart";
         $delete = $db->query($delet_cart);   

  ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Succes Page</title>
  </head>
  <body>
  	<?php if($amount == $total): ?>
     <h2>Welcome : <?php echo $_SESSION['cu_email'];?> Your Payment Was Succesful</h2>
     <a href="http://bouraimad.ezyro.com/newcommerce/customer/my_acount.php">  Go To your Acount</a>
    <?php else: ?>
      <h2>Welcome : Geost Your Payment Was Faild</h2>
     <a href="http://bouraimad.ezyro.com/newcommerce/index.php">Go To Shop Again !</a>
   
    <?php endif; 
     //email 
      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
      $headers .= 'From: <sales@bouraimad.ezyro.com>' . "\r\n";
      
      $subject = "Order Details";
      
      $message = "<html> 
      <p>
      
      Hello dear <b style='color:blue;'>$custom_name</b> you have ordered some products on our website bouraimad.ezyro.com,
       please find your order details, your order will be processed shortly. Thank you!</p>
      
        
        <table class='table table-bordered table-condensed table-sriped text-center table-responsive'>
         <thead>
      
          <h2 class='text-center'>Your Order Details from bouraimad.ezyro.com</h2>
            <th><b>S.N</b></th>
            <th><b>Product Name</b></th>
            <th><b>Quantity</b></th>
            <th><b>Paid Amount</th></th>
            <th>Invoice No</th>
          
          </thead>
          <tbody>
          <tr>
            <td>1</td>
            <td>$pro_name</td>
            <td>$qty</td>
            <td>$amount</td>
            <td>$invoice</td>
          </tr>
         </tbody>
        </table>
        <h3>Please go to your account and see your order details!</h3>
        
        <h2> <a href='http://bouraimad.ezyro.com/newcommerce/customer/my_acount.php'>

        Click here</a> to login to your account</h2>
        
        <h3> Thank you for your order @ - www.bouraimad.ezyro.com</h3>
        
      </html>
      
      ";
      
      mail($user,$subject,$message,$headers);
      



    ?>
 </body>
</html>