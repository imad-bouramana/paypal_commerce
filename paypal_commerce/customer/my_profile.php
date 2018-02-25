      <?php
      $db = mysqli_connect("localhost","root","","ecommerce"); 
        if(mysqli_connect_errno()){
          echo 'faild to conect whith database: '. mysqli_connect_error();
           die();
        }
       $user = $_SESSION['cu_email'];
       $profile = "SELECT * FROM custommers WHERE cu_email = '$user'";
       $stmt = $db->query($profile);
       $up_prof = mysqli_fetch_assoc($stmt);
      
       $cu_ip = $up_prof['cu_ip'];

      ?>
      <h2 class="text-center">Update My Acount</h2>
      <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="name" class="col-md-offset-2 col-sm-2 control-label">Name :</label>
            <div class="col-sm-10 col-md-6">
              <input type="text" class="form-control" value="<?=$up_prof['cu_name']; ?>" name="name" placeholder="name" required>
            </div>
          </div>
          <div class="form-group">
            <label for="image" class="col-md-offset-2 col-sm-2 control-label">Image:</label>
            <div class="col-sm-10 col-md-6">
              <img src="customer/<?=$up_prof['cu_image']; ?>">
              <input type="file" class="form-control" name="image" required>
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="col-md-offset-2 col-sm-2 control-label">Email :</label>
            <div class="col-sm-10 col-md-6">
              <input type="email" class="form-control" value="<?=$up_prof['cu_email']; ?>" name="email" placeholder="Email" required>
            </div>
          </div>
          <div class="form-group">
            <label for="password" class="col-md-offset-2 col-sm-2 control-label">Password:</label>
            <div class="col-sm-10 col-md-6">
              <input type="password" class="form-control" value="<?=$up_prof['cu_pass']; ?>" name="password" placeholder="Password" required>
            </div>
          </div>
          <div class="form-group">
            <label for="adress" class="col-md-offset-2 col-sm-2 control-label">Adress:</label>
            <div class="col-sm-10 col-md-6">
              <input type="text" class="form-control" value="<?=$up_prof['adress']; ?>" name="adress" placeholder="adress" required>
            </div>
          </div>
          <div class="form-group">
            <label for="country" class="col-md-offset-2 col-sm-2 control-label">Country:</label>
            <div class="col-sm-10 col-md-6">
              <input type="text" class="form-control" value="<?=$up_prof['cu_country']; ?>" name="country" placeholder="country" required>
            </div>
          </div>
          <div class="form-group">
            <label for="city" class="col-md-offset-2 col-sm-2 control-label">City:</label>
            <div class="col-sm-10 col-md-6">
              <input type="text" class="form-control" value="<?=$up_prof['cu_city']; ?>" name="city" placeholder="city">
            </div>
          </div>
          <div class="form-group">
            <label for="contact" class="col-md-offset-2 col-sm-2 control-label">Contact:</label>
            <div class="col-sm-10 col-md-6">
              <input type="text" class="form-control" value="<?=$up_prof['cu_contact']; ?>" name="contact" placeholder="contact" required>
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-offset-4 col-sm-10 col-md-6">
              <button type="submit" class="btn btn-default" name="update">Update Profile</button>
            </div>
          </div>
      </form>
        
  
<?php
if(isset($_POST['update'])){
  $ip = getIp();
  $c_ip = $cu_ip;
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $adress = $_POST['adress'];
  $country = $_POST['country'];
  $city = $_POST['city'];
  $contact = $_POST['contact'];
  $image = $_FILES['image']['name'];
  $tmp_name = $_FILES['image']['tmp_name'];
  move_uploaded_file($tmp_name, "customer/$image");
  $update = "UPDATE custommers SET cu_name = '$name',cu_email = '$email',cu_pass = '$password' ,adress = '$adress',cu_city = '$city',
  cu_country = '$country',cu_contact = '$contact',cu_image = '$image' WHERE cu_ip = '$c_ip'";
    $upp = $db->query($update);
    if($upp){
      echo '<script>alert("Your Acount Has Been Updated!")</script>';
      echo '<script>window.open("my_acount.php","_self")</script>';

    }

}
