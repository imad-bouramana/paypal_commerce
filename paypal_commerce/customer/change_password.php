<h2 class="text-center">Change Password</h2>
<form action="" method="post" class="form-horisontal">

	<div class="form-group">
		<label class="control-label col-sm-3 col-md-offset-2">Old Pasword :</label>
		<div class="form-group col-md-4">
		   <input type="password" name="old_password" class="form-control" required>
	    </div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-3 col-md-offset-2">New Pasword :</label>
		<div class="form-group col-md-4">
		   <input type="password" name="new_password" class="form-control" required>
	    </div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-3 col-md-offset-2">Confirm Pasword :</label>
		<div class="form-group col-md-4">
		   <input type="password" name="confirm_password" class="form-control" required>
	    </div>
	</div>
	<div class="form-group">
		<div class="form-group col-md-4 col-md-offset-5">
		   <input type="submit" name="change" class="btn btn-primary" value="Change Password">
	    </div>
	</div>

</form>
<?php
 $db = mysqli_connect("localhost","root","","ecommerce"); 
        if(mysqli_connect_errno()){
          echo 'faild to conect whith database: '. mysqli_connect_error();
           die();
        }
    if(isset($_POST['change'])){
    	$old_password = $_POST['old_password'];
    	$new_password = $_POST['new_password'];
    	$confirm_password = $_POST['confirm_password'];

       $user = $_SESSION['cu_email'];
       $password = "SELECT * FROM custommers WHERE cu_pass = '$old_password' AND cu_email = '$user'";
       $cu_pass = $db->query($password);
       $up_password = mysqli_num_rows($cu_pass);
       if($up_password == 0){
       	  echo '<script>alert("Your Pasword Is Wrong!")</script>';
       	  exit();
       }
       if($new_password != $confirm_password){
       	  echo '<script>alert("Your New Password Not Confirm!")</script>';
       	  exit();
       }else{
       	  $update_pass = "UPDATE custommers SET cu_pass = '$new_password' Where cu_email = '$user'";
       	  $rsult = $db->query($update_pass);
       	  echo '<script>alert("Your Pasword Is Updated By Success!")</script>';
          echo '<script>window.open("my_acount.php","_self")</script>';
     
       }
      }


?>