<?php 
session_start();
if(isset($_SESSION['id2'])) {
require 'includes/function/function.php';
$pageTitle = "Edit Profile";
require 'template/header.php';
$navbarTrans = false;
require 'template/navbar.php';
?>
<div id='changeColor'class="changeColor"></div>
<div class="form" style="border:1px solid white;margin:100px;border-radius:10px;box-shadow: 0px -3px 4px 2px rgb(232 220 220);">
<div class="container">
    <h2 class="text-center p-3">Edit your Profile</h2>
<form action="update_info_profile.php" method="POST">
<div class="form-row">
  <div class="form-group col-md-6">
    <img src="img/avater2.png" alt="enter image your profile" style="width: 14%;" >
    <input type="file" id="selectedFile" style="display: none;" />
 <input type="button" value="Browse..." onclick="document.getElementById('selected_image').click();" />
 </div>
<div class="form-group">
    <label for="inputname">Username </label>
    <input type="text" class="form-control" id="inputname" placeholder="Enter your name">
  </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" id="inputPassword4">
    </div>
  </div>
   <div class="d-flex justify-content-center"> 
  <button type="submit" class="btn btn-primary m-1">Update Profile </button>
  <button type="submit" class="btn btn-secondary m-1">Close </button>
  </div>
</form>
</div>
</div>


<?php
}
require 'template/footer.php';
?>