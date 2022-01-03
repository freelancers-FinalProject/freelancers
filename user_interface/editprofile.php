<?php
$navbarTrans = false;
require 'template/navbar.php'; 
if(isset($_SESSION['id1'])) {
require 'template/header.php';
require 'includes/function/function.php';
require 'config.php';
$pageTitle = "Edit Profile";
if($_SERVER['REQUEST_METHOD']=='POST'){
  $id_user   = $_POST['id']; 
  echo $id_user;
  print_r($_FILES);
  $username  = $_POST['username'];
  $email     = $_POST['email'];
  $Old_pass  = $_POST['Old_pass'];
  $New_pass  = $_POST['New_pass'];
  $hash_pass = sha1($New_pass);
  if(isset($New_pass)){
      update_info_profile($username,$email,$hash_pass,$id_user);
  }else{
      update_info_profile($username,$email,$Old_pass,$id_user);
  }
  }
?>

<div class="form" style="border:1px solid white;margin:30px;border-radius: 10px;box-shadow: 0px -3px 4px 2px rgb(232 220 220);">
<div class="container">
    <h3 class="text-center p-3"><i class="fas fa-user-edit"></i>Edit your Profile</h3>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
 <?php foreach(fetchData_Users($_SESSION['id1']) as $val){
      
 ?>
 <div class="form-row form_img">
  <div class="form-group col-md-6">
    <?php if( $val['profile_pic'] == null ){?>
  <img src="img/avater2.png" alt="enter image your profile" style="width: 20%;" >
  <?php }else{?>
    <img src="img/avater2.png" alt="enter image your profile" style="width: 20%;" id="image" >
    <?php }?>
    <input type="file" id="pic_profile" style="display: none;"  name=""/>
  <span onclick="document.getElementById('pic_profile').click();"><i class='fas fa-camera-retro'  > </i>Upload picture</span>
  </div>
  </div>
<div class="form-row">
 <div class="form-group">
    <label for="inputname"><i class="far fa-user"></i> Username </label>
    <input type="hidden"  name="id"  value="<?php echo $val['id']?>">
    <input type="text" class="form-control" name="username"  id="inputname" placeholder="Enter your name" value="<?php echo $val['username']?>">
  </div>
</div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="email"><i class="fas fa-envelope-open-text"></i> Email</label>
      <input type="text" class="form-control" id="email" name="email" value="<?php echo $val['email']?>">
        <span id="valid_email"></span>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4"><i class="fas fa-lock"></i> Password</label>
      <input type="hidden"  name="Old_pass"  value="<?php echo $val['password']?>">
      <input type="password" class="form-control" id="pass" name="New_pass" >
      <span id="valid_pass"></span>
    </div>
  </div>
   <div class="d-flex justify-content-center"> 
  <button type="submit" class="btn btn-primary m-1" onclick="get_Data();">Update Profile </button>
  <button type="button" class="btn btn-secondary m-1" >Close </button>
  </div>
</form>
<?php   } ?>
</div>
</div>
<?php
 }
require 'template/footer.php';
?>