<?php
//include "../include/connect.php";
$db = mysqli_connect("localhost","root","","ecommerce"); 
//if(mysqli_connect_errno()){
//	echo 'faild to conect whith database: '. mysqli_connect_error();
//	die();
//}
// get ip adress
function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}
//ad items to cart database
function cart(){
	global $db;
	if(isset($_GET['cart_id'])){
		$cart_id = $_GET['cart_id'];
		$ip  = getIp();
		$query = "SELECT * FROM cart WHERE ip_add = '$ip' AND p_id = '$cart_id'";
		$stmt = $db->query($query);
		if(mysqli_num_rows($stmt) > 0){
			echo "";
		}else{
			$insert = "INSERT INTO cart (p_id,ip_add) VALUES ('$cart_id','$ip')";
			$stmt2 = $db->query($insert);
		    echo "<script>window.open('index.php','_self')</script>";
		}
	}
}
// count the total price
function totale_price(){

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
       	$total += $sum_price;
       }
	}
	echo "$ ".$total;
}
// count to items in cart
function items(){
	global $db;
	if(isset($_GET['cart_id'])){
		$ip = getIp();
		$query = "SELECT * FROM cart WHERE ip_add = '$ip'";
		$stmt  = $db->query($query);
		$count = mysqli_num_rows($stmt);
	}else{
		global $db;
		$ip = getIp();
		$query = "SELECT * FROM cart WHERE ip_add = '$ip'";
		$stmt  = $db->query($query);
		
		$count = mysqli_num_rows($stmt);
	
	}
	echo $count;
}
// get the categories
function getCats(){

	global $db;
	$cat_row = $db->query("SELECT * FROM categories");
	while($get_cats = mysqli_fetch_assoc($cat_row)){
		    $cat = $get_cats['c_id'];
          
           echo "<li><a href='index.php?cat=$cat'>".$get_cats['cat_name'].'</a></li>';
	}
}
//get brands
function getbrands(){

	global $db;
	$brand_row = $db->query("SELECT * FROM brands");
	while($get_brands = mysqli_fetch_assoc($brand_row)){
		   $brand = $get_brands['b_id'];
           echo "<li><a href='index.php?brand=$brand'>".$get_brands['title'].'</a></li>';
	}
}
 // Page title
  function getTittle(){

     global $tittlepage;

     if(isset($tittlepage)){
     
 	echo $tittlepage;

    }else{

 	echo 'page faild';
    }
}
//sanitize $_POST
function sanitize($dirty){
	return htmlentities($dirty, ENT_QUOTES, "UTF-8");
}
?>