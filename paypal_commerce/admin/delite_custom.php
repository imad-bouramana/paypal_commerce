<?php
   
   if(!isset($_SESSION['email'])){
       echo '<script>window.open("login.php?not_admin=You Are Not Admin !","_self")</script>';
 }else{

  $db = mysqli_connect("localhost","root","","ecommerce"); 
if(mysqli_connect_errno()){
	echo 'faild to conect whith database: '. mysqli_connect_error();
	die();
}
if(isset($_GET['delite_custom'])){

	$delite_custom = $_GET['delite_custom'];
	$delite = "DELETE FROM custommers WHERE cu_id = '$delite_custom'";
	$query = $db->query($delite);
	if($query){
		echo "<script>alert('Custommer Delited  By Success')</script>";
        echo '<script>window.open("Aindex.php?view_customers","_self")</script>';
 
	}
}
}
?>