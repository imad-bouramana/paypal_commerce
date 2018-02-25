<h2 class="text-center">You Well Realy Delite Your Acount !</h2>
<form action="" method="post" class="text-center">
	    
          <input type="submit" class="btn btn-danger"  value="Yes I Yont" name="yes">
   
    
          <input type="submit" class="btn btn-success"  value="No I Joken" name="no">
    
	
	
</form>
<?php
 $db = mysqli_connect("localhost","root","","ecommerce"); 
        if(mysqli_connect_errno()){
          echo 'faild to conect whith database: '. mysqli_connect_error();
           die();
        }

if(isset($_POST['yes'])){
	$user = $_SESSION['cu_email'];
	$delite = "DELETE  FROM custommers WHERE cu_email = '$user'";
	$db->query($delite);
	echo '<script>alert("We Are Sorry Your Acount Been Deleted")</script>';
	echo '<script>window.open("../index.php","_self")</script>';
}
if(isset($_POST['no'])){
   echo '<script>alert("Dont Joke Againt!")</script>';
   echo '<script>window.open("my_acount.php","_self")</script>';

} 

?>