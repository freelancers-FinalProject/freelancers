<?php 

include_once "DbConnection.php";
if($_SERVER['REQUEST_METHOD']=="GET"){ 
      $id = $_GET['id']; 
}else if($_SERVER['REQUEST_METHOD']=="POST"){ 
    $id = $_POST['id']; 
    
  }
    $sql ="SELECT * FROM sub_admin WHERE id='$id'"; 
    $reslut = $con->query($sql); 
    $row = $reslut->fetch_assoc(); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sub_admin profile</title>
    <link rel="stylesheet" href="profile_style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>


</head>
<body>
 

        <!-- Profile widget -->
        <div class="bg-white shadow rounded overflow-hidden">
            <div class="px-4 pt-0 pb-4 bg-dark">
                <div class="media align-items-end profile-header">
                    <div class="profile mr-3">
                        <!-- put here profile_pic -->
                        <img src="<?php echo $row['profile_pic'] ; ?>" alt="profile_pic" width="130" class="rounded mb-2 img-thumbnail">
                       
                        <!-- put here the Price -->
                        <p class="font-weight-bold">Price : <?php echo $row['price'];  ?>-JD </p>
                    </div>
                     <!-- for Name And Adress -->
                    <div class="media-body mb-5 text-white">
                        <h4 class="mt-0 mb-0"><?php echo $row['username']; ?></h4>
                        <p class="small mb-4"> <i class="fas fa-map-marker-alt"></i> <?php echo $row['address']; ?></p>
                    </div>
                     <!-- for phone -->
                    <div class="media-body mb-5 text-white txt-deco">
                    <small class="text-muted"><i class="fas fa-phone-square-alt"></i></small> phone
                    <a href=""><p class="text-white">  <?php echo $row['phone']; ?></p></a>
                        
                    </div>
                    <!-- for Email -->
                    <div class="media-body mb-5 text-white txt-deco">
                    <small class="text-muted"><i class="fas fa-envelope"></i></small> Email
                    <a href=""> <p class="text-white"> <?php echo $row['email']; ?></p> </a>
                        
                    </div>
                </div>
            </div>
      <!-- for rating or followers -->
            <div class="bg-light p-4 d-flex justify-content-end text-center">
                <ul class="list-inline mb-0">
                    
                    <li class="list-inline-item">
                        <h5 class="font-weight-bold mb-0 d-block">241</h5><small class="text-muted"> <i class="fa fa-picture-o mr-1"></i>Photos</small>
                    </li>
                    <li class="list-inline-item">
                        <h5 class="font-weight-bold mb-0 d-block">84K</h5><small class="text-muted"> <i class="fa fa-user-circle-o mr-1"></i>Followers</small>
                    </li>
                </ul>
            </div>

            <div class="py-4 px-4">
                <div class="d-flex align-items-center justify-content-between mb-3">
                <?php if($_SERVER['REQUEST_METHOD']=="GET"){ ?>   
                <h5 class="mb-0">All posts</h5>
                <?php }else {
                    
                 ?>
                 <h5 class="mb-0"><?php echo $_POST['sub-category']; ?></h5>
                 <?php } ?>
                    <!-- <a href="#" class="btn btn-link text-muted">Show all</a> -->
                    

                    <!-- form here -->
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        
                    <select name="sub-category"  class="dropdown_menu">
                    <option value="All posts" >All Posts</option>
                       <?php 
                       $subCate_Sql = "SELECT * FROM sub_category WHERE subAdmin_id='$id' " ; 
                       $subCate_result = $con->query($subCate_Sql) ; 
                       if($subCate_result->num_rows > 0 ) { 
                        while($subCate_row = $subCate_result->fetch_assoc()){ 

                       ?>
                       <option value="<?php echo $subCate_row['name']; ?>"><?php echo $subCate_row['name']; ?></option>
                       <?php } } ?>
                        
                    </select>
                    <input name="id" type="text" style="display:none;" value="<?php echo $id ; ?>">
                    <input type="submit" value="ok" class="btn">
                    </form>
                </div>
                
                

















<!-- galary is here -->




<?php 
if($_SERVER['REQUEST_METHOD']=="POST"){ 
  $id = $_POST['id']; 
  
}else if($_SERVER['REQUEST_METHOD']=="GET"){ 
  $id = $_GET['id']; 
  
}
 ?>


<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Lightbox gallery with Bootstrap </title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css'><link rel="stylesheet" href="dist/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>

<div class="container">
<div class="row d-flex flex-wrap align-items-center" data-toggle="modal" data-target="#lightbox">
 
<?php 

if ($_SERVER['REQUEST_METHOD']=="POST") { 
  
  $sub_category    = $_POST['sub-category'] ;
  if($sub_category!="All posts"){ 
     
      
  
  $sql             = "SELECT id FROM sub_category WHERE name = '$sub_category' and subAdmin_id='$id' ";  
  $result          = $con->query($sql); 
  $sub_category_row = $result->fetch_assoc(); 
  $sub_category_id = $sub_category_row['id'];  
  $content_sql     = "SELECT * FROM content  WHERE subCate_id='$sub_category_id' " ;
  $content_result  = $con->query($content_sql); 
   
 $counter=-1;
if($content_result->num_rows > 0){ 
  while($content_row = $content_result->fetch_assoc()){ 
  $counter++; 
?>

<div class="col-12 col-md-6 col-lg-3">  
<img src="<?php echo $content_row['images']; ?>" data-target="#indicators" data-slide-to="<?php echo $counter; ?>" alt="" /> 
</div>




<!-- must to put modal here  -->





  <?php  }}
  }else { 
  // here to show all pic
  $counter=-1;
  $all_subCate_sql = "SELECT * FROM sub_category WHERE subAdmin_id='$id' "; 
   $all_subCate_result = $con->query($all_subCate_sql) ;
   
   if($all_subCate_result->num_rows > 0) { 
     while($all_subCate_row = $all_subCate_result->fetch_assoc() ) {
       
       $subCate_id = $all_subCate_row['id']; 
       $posts_sql = "SELECT * FROM content WHERE subCate_id='$subCate_id' " ;
       $posts_result = $con->query($posts_sql); 
       if($posts_result->num_rows > 0 ){ 
         while($posts_row = $posts_result->fetch_assoc()){ 
         
          $counter++;
        
  ?>
  
   <!-- here put the pics witout filter  --> 
<div class="col-12 col-md-6 col-lg-3">
    
<img src="<?php echo $posts_row['images']; ?>" data-target="#indicators" data-slide-to="<?php echo $counter; ?>" alt="" /> 

</div>





   <?php 
    }
  }
}
}


}  
  
   ?> 







<!-- Modal -->
<div class="modal fade" id="lightbox" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <button type="button" class="close text-right p-2" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      <div id="indicators" class="carousel slide" data-interval="false">
  <ol class="carousel-indicators">
  <li data-target="#indicators" data-slide-to="0" class="active"></li>
      <?php 
      
      for($i=1;$i<4;$i++){ 
                //^
      // we need num of rows ...^

      ?>
    <li data-target="#indicators" data-slide-to="<?php echo $i; ?>" class="active"></li>
<?php } ?>
    
  </ol>

  <div class="carousel-inner">
 
    <?php  
    if($sub_category=="All posts"){ 

    
     $all_subCate_sql = "SELECT * FROM sub_category WHERE subAdmin_id='$id' "; 
     $all_subCate_result = $con->query($all_subCate_sql) ;
     
     if($all_subCate_result->num_rows > 0) { 
       while($all_subCate_row = $all_subCate_result->fetch_assoc() ) {
         
         $subCate_id = $all_subCate_row['id']; 
         $posts_sql = "SELECT * FROM content WHERE subCate_id='$subCate_id' " ;
         $posts_result = $con->query($posts_sql); 
         if($posts_result->num_rows > 0 ){ 
           while($posts_row = $posts_result->fetch_assoc()){ 
           
            
    
    ?>
    <div class="carousel-item ">
      
      <img class="d-block w-100" src="<?php echo $posts_row['images']; ?>" alt="First slide">
    </div>

    <?php 
    }
  } } } 


   ?>
   <!-- to make modal activated -->
    <div class="carousel-item active">
      
      <img class="d-block w-100" src="<?php echo $posts_row['images']; ?>" alt="First slide">
    </div>
<?php  
}else { 
  
  $sql             = "SELECT id FROM sub_category WHERE name = '$sub_category' ";  
  $result          = $con->query($sql); 
  $sub_category_row = $result->fetch_assoc(); 
  $sub_category_id = $sub_category_row['id'];  
  $content_sql     = "SELECT * FROM content  WHERE subCate_id='$sub_category_id' " ;
  $content_result  = $con->query($content_sql); 
   
 $counter=-1;
if($content_result->num_rows > 0){ 
  while($content_row = $content_result->fetch_assoc()){



?>

<div class="carousel-item ">
      
      <img class="d-block w-100" src="<?php echo $content_row['images']; ?>" alt="">
    </div>



<?php }} } ?>

<div class="carousel-item active">
      
      <img class="d-block w-100" src="<?php echo $content_row['images']; ?>" alt="">
    </div>



  <?php 
}else { 
  // here to show all pic
   $counter=-1;
   $all_subCate_sql = "SELECT * FROM sub_category WHERE subAdmin_id='$id' "; 
   $all_subCate_result = $con->query($all_subCate_sql) ;
   
   if($all_subCate_result->num_rows > 0) { 
     while($all_subCate_row = $all_subCate_result->fetch_assoc() ) {
       
       $subCate_id = $all_subCate_row['id']; 
       $posts_sql = "SELECT * FROM content WHERE subCate_id='$subCate_id' " ;
       $posts_result = $con->query($posts_sql); 
       if($posts_result->num_rows > 0 ){ 
         while($posts_row = $posts_result->fetch_assoc()){ 
         $counter++ ;
         
        
  ?>
  
   <!-- here put the pics witout filter  --> 
<div class="col-12 col-md-6 col-lg-3">
    
<img src="<?php echo $posts_row['images']; ?>" data-target="#indicators" data-slide-to="<?php echo $counter; ?>" alt="" /> 

</div>

   <?php 
    }
  }
}
}


}  

   ?>







<!-- Modal -->
<div class="modal fade" id="lightbox" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <button type="button" class="close text-right p-2" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      <div id="indicators" class="carousel slide" data-interval="false">
  <ol class="carousel-indicators">
  <li data-target="#indicators" data-slide-to="0" class="active"></li>
      <?php 
      
      for($i=1;$i<4;$i++){ 
                //^
      // we need num of rows ...^

      ?>
    <li data-target="#indicators" data-slide-to="<?php echo $i; ?>" class="active"></li>
<?php } ?>
    
  </ol>

  <div class="carousel-inner">
 
    <?php  
     $all_subCate_sql = "SELECT * FROM sub_category WHERE subAdmin_id='$id' "; 
     $all_subCate_result = $con->query($all_subCate_sql) ;
     
     if($all_subCate_result->num_rows > 0) { 
       while($all_subCate_row = $all_subCate_result->fetch_assoc() ) {
         
         $subCate_id = $all_subCate_row['id']; 
         $posts_sql = "SELECT * FROM content WHERE subCate_id='$subCate_id' " ;
         $posts_result = $con->query($posts_sql); 
         if($posts_result->num_rows > 0 ){ 
           while($posts_row = $posts_result->fetch_assoc()){ 
           
            
    
    ?>
    <div class="carousel-item ">
      
      <img class="d-block w-100" src="<?php echo $posts_row['images']; ?>" alt="First slide">
    </div>

    <?php 
    }
  } } } 
 

   ?>
   <!-- to make modal activated -->
    <div class="carousel-item active">
      
      <img class="d-block w-100" src="<?php echo $posts_row['images']; ?>" alt="First slide">
    </div>

<!-- <a class="carousel-control-prev" href="#indicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#indicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div> -->


<!-- END Modal -->


   </div>
</div>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.5.3/umd/popper.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.min.js'></script>
</body>
</html>

















             
               <!-- https://freefrontend.com/bootstrap-profiles/ -->
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>
</html>