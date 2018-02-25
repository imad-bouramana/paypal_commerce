<?php
  $db = mysqli_connect("localhost","root","","ecommerce"); 
if(mysqli_connect_errno()){
  echo 'faild to conect whith database: '. mysqli_connect_error();
  die();
}
 
?>
<h2 class="text-center">Login Or Register To By!</h2>
<form class="form-horizontal" action="" method="post">
  <div class="form-group">
    <label for="email" class="col-md-offset-1 col-sm-2 control-label">Email</label>
    <div class="col-sm-6">
      <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
    </div>
  </div>
  <div class="form-group">
    <label for="pass" class="col-md-offset-1 col-sm-2 control-label">Password</label>
    <div class="col-sm-6">
      <input type="password" class="form-control" id="pass" name="pass" placeholder="Password" required>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox"> Remember me
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-10">
      <button type="submit" class="btn btn-default" name="login">Sign in</button>
      <h3><a href="custom_register.php">New? Register</a></h3> 
    </div>
  </div>
  
</form>
<?php


if(isset($_POST['login'])){
  $email = $_POST['email'];
  $pass = $_POST['pass'];
  $select_log = "SELECT * FROM custommers WHERE cu_email = '$email' AND cu_pass = '$pass'";
  $query_log = $db->query($select_log);
  $login = mysqli_num_rows($query_log);
  if($login == 0){
    echo '<script>alert("Sory Email or Password Wrong Please Try Again !")</script>';
  }else{
    $ip = getIp();
    $custom = "SELECT * FROM cart WHERE ip_add = '$ip'";
    $stmt = $db->query($custom);
    $count = mysqli_num_rows($stmt);
    if($login > 0 && $count == 0){
      $_SESSION['cu_email'] = $email;
      echo "<script>alert('You Are Login By Success')</script>";
      echo '<script>window.open("myacount.php","_self")</script>';
   
    }else{
       $_SESSION['cu_email'] = $email;
      echo "<script>alert('You Are Login By Success')</script>";
      echo '<script>window.open("checkout.php","_self")</script>';
   
    }
   
  }

}