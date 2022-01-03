
<?php
  session_start();
  // require 'config.php';
  // require 'includes/function/function.php';
  //  $row = fetchData_Users($id);
  //  for ($i=0;i<count(fetchData_Users($id));$i++){
  //      print_r($row);
  //  }
   if(@$navbarTrans){?>
   <nav class="navbar navbar-expand-lg navbar-dark fixed-top " id="mainColor">
<?php
   }else{?>
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<?php
   }
?>
   <a class="navbar-brand" href="#"><img src="img/img10.png" alt=""></a> 
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
  <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"><i class="fas fa-search"></i>
      <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
    </form>
    <ul class="navbar-nav ">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <?php if(!isset($_SESSION['id1'])){?>

     
      <li class="nav-item">
        <a class="nav-link" href="../login/index.php">Login | Register</a>
      </li>
   <?php }else{?>
      <li class="nav-item dropdown mr-5">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
        <img src="img/avater.png" alt="" class="pic_profile" style=" width: 33px;  border: 1px solid;
            border-radius: 15px; height: 33px;">
    <?php echo $_SESSION['username']?> 
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="margin-left: -71px;  margin-top: -3px;">
          <a class="dropdown-item" href="editprofile.php">Edit Profile </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
      </li>
      <?php }?>
    </ul>
  </div>
  
</nav> 
