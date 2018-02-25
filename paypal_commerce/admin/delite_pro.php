<?php
 if(!isset($_SESSION['email'])){
       echo '<script>window.open("login.php?not_admin=You Are Not Admin !","_self")</script>';
 }else{


		  $db = mysqli_connect("localhost","root","","ecommerce"); 
		if(mysqli_connect_errno()){
			echo 'faild to conect whith database: '. mysqli_connect_error();
			die();
		}
		if(isset($_GET['delite_pro'])){

			$delite_pro = $_GET['delite_pro'];
			$delite = "DELETE FROM product WHERE ID = '$delite_pro'";
			$query = $db->query($delite);
			if($query){
				echo "<script>alert('Product Delited  By Success')</script>";
		        echo '<script>window.open("Aindex.php?view_product","_self")</script>';
		 
			}
		}
}
?>