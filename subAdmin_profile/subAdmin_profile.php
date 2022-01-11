<?php 

require "conection.php";
require "functions.php";

if($_SERVER['REQUEST_METHOD']=="POST"){ 
  $id=$_POST['id']; 
  
}else { 
  $id=$_GET['id']; 
}

$subAdmin = getSubAdminInfo($con, $id); 



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">

<link href='https://fonts.googleapis.com/css?family=Lato:400,300' rel='stylesheet' type='text/css'>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- animation link START-->
<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
  <!-- animation link END-->

  <!-- fontAowsem link START-->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
 <!-- fontAowsem link END-->

 <link rel="stylesheet" href="style2.css">

</head>
<body>
    <!-- profile start -->

 



<div class="box animate__animated animate__backInDown animate__fast">
  <div id="overlay">
    <div  style='
     background:
      url("<?= $subAdmin['profile_pic'];?>")
     center center no-repeat;
     background-size: cover;'
     class="image">
      <div class="trick">

      </div>
    </div>
    <ul class="text "> <?= $subAdmin['username']; ?></ul>
    <div class="text1 "> <?= $subAdmin['name']; ?> </div>
</div>



<div class="panel-group mt-5" id="accordion" role="tablist" aria-multiselectable="true">
<div class="panel panel-default ">
  <div class="panel-heading " role="tab" id="headingOne">
    <h4 class="panel-title ">
      <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="" aria-controls="collapseOne">
        <div class="title  btn btn-danger btn-outline btn-lg">ABOUT</div>
      </a>
    </h4>
  </div>
  <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
    <div class="panel-body">
     <!-- About info -->
     <?php if($subAdmin['address']!==""){ ?>

      <div>
      <i class="fas fa-map-marker-alt"></i> <?=$subAdmin['address'];?>
      </div> 
    <?php } ?>

    <?php if($subAdmin['phone']!==""){ ?>
      <div class="btn  btn-sm text-center">
      <i class="fas fa-phone-square-alt"></i> <a href="" ><?= $subAdmin['phone'];?></a>
      </div>
      <?php }?>
      <!-- About info END-->
    
  </div>
  </div>
</div>
<div class="panel panel-default ">
  <div class="panel-heading" role="tab" id="headingTwo">
    <h4 class="panel-title">
      <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        <div class="title btn btn-danger btn-outline btn-lg">SOCIAL</div>
      </a>
    </h4>
  </div>
  <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
    <div class="panel-body">

   <!-- Social info START -->
   
  
                          <!-- EMAIL  -->
                          
                          <?php if($subAdmin['email']!==""){ ?>
                           
                      <a class="btn btn-danger btn-sm"  target="_blank" rel="publisher"
                       href="https://mail.google.com/<?= $subAdmin['email']; ?>">
                        <i class="fa fa-google"></i>

                         <small><?= $subAdmin['email']; ?></small>
                    </a>
                    
                    <?php } ?>
                    

                           <!-- FACEBOOK  -->
                           <?php if($subAdmin['facebook']!==""){ ?>
                            

                        
                    <a class="btn btn-primary btn-sm" rel="publisher" target="_blank"
                       href="http://www.facebook.com/<?= $subAdmin['facebook']; ?>">
                        <i class="fa fa-facebook"></i>
                        <small><?= $subAdmin['facebook']; ?> </small>
                    </a>
                    
                    <?php } ?>

                           <!-- INSTAGRAM  -->
                           <?php if($subAdmin['instagram']!==""){ ?>
                            
                     <a class="btn btn-warning btn-sm" rel="publisher" target="_blank"
                       href="http://www.instagram.com/<?= $subAdmin['instagram']; ?>">
                        <i class="fa fa-instagram"></i>
                        <small><?= $subAdmin['instagram']; ?></small>
                    </a>
               
                    <?php } ?>
   
      
      
      <!-- Social info END-->


  </div>
  </div>
</div>
<!-- <div class="panel panel-default ">
  <div class="panel-heading" role="tab" id="headingThree">
    <h4 class="panel-title">
      <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        <div class="title btn btn-danger btn-outline btn-lg">CONTACT</div>
      </a>
    </h4>
  </div>
  <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
    <div class="panel-body">

      
      
                <form id="form" class="topBefore">

          <input id="name" type="text" placeholder="NAME">
          <input id="email" type="text" placeholder="E-MAIL">
          <textarea id="message" type="text" placeholder="MESSAGE"></textarea>
          <input id="submit" type="submit" value="Submit Now!">

        </form>


      
      
      
      
    </div>
  </div>
</div> -->
</div>





    <!-- profile End -->
    <?php 
    
    require "gallary.php";  
    require "videos.php";
    ?>

    
    
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<script src="main.js"></script>


</body>
</html>