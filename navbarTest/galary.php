<?php 
include_once "DbConnection.php"; 
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
  
  $sql             = "SELECT id FROM sub_category WHERE name = '$sub_category' ";  
  $result          = $con->query($sql); 
  $sub_category_row = $result->fetch_assoc(); 
  $sub_category_id = $sub_category_row['id'];  
  $content_sql     = "SELECT * FROM content  WHERE subCate_id='$sub_category_id' " ;
  $content_result  = $con->query($content_sql); 
   

if($content_result->num_rows > 0){ 
  while($content_row = $content_result->fetch_assoc()){ 
   
?>

<div class="col-12 col-md-6 col-lg-3">  
<img src="<?php echo $content_row['images']; ?>" data-target="#indicators" data-slide-to="0" alt="" /> 
</div>

  <?php  }} 
  header("location:profile.php?id=$id");
  
}else { 
  // here to show all pic
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
  
   <!-- here put the pics witout filter  --> 
<div class="col-12 col-md-6 col-lg-3">
    
<img src="<?php echo $posts_row['images']; ?>" data-target="#indicators" data-slide-to="0" alt="" /> 

</div>

   <?php 
    }
  }
}
}


}  

   ?>

  <!-- <div class="col-12 col-md-6 col-lg-3">
       <img src="https://source.unsplash.com/random/201" data-target="#indicators" data-slide-to="1" alt="" />
  </div>
  <div class="col-12 col-md-6 col-lg-3">
     <img src="https://source.unsplash.com/random/202" data-target="#indicators" data-slide-to="2"  alt="" />
  </div>
  <div class="col-12 col-md-6 col-lg-3">
       <img src="https://source.unsplash.com/random/203" data-target="#indicators" data-slide-to="3" alt="" />
  </div>
  <div class="col-12 col-md-6 col-lg-3">
       <img src="https://source.unsplash.com/random/204" data-target="#indicators" data-slide-to="4"  alt="" />
  </div>
  <div class="col-12 col-md-6 col-lg-3">
       <img src="https://source.unsplash.com/random/205" data-target="#indicators" data-slide-to="5" alt="" />
   -->
   </div>
</div>

<!-- Modal -->
<!-- <div class="modal fade" id="lightbox" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <button type="button" class="close text-right p-2" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      <div id="indicators" class="carousel slide" data-interval="false">
  <ol class="carousel-indicators">
    <li data-target="#indicators" data-slide-to="0" class="active"></li>
    <li data-target="#indicators" data-slide-to="1"></li>
    <li data-target="#indicators" data-slide-to="2"></li>
    <li data-target="#indicators" data-slide-to="3"></li>
    <li data-target="#indicators" data-slide-to="4"></li>
    <li data-target="#indicators" data-slide-to="5"></li>
  </ol>
  <div class="carousel-inner">
    
    <div class="carousel-item active">
      
      <img class="d-block w-100" src="https://source.unsplash.com/random/200" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://source.unsplash.com/random/201" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://source.unsplash.com/random/202" alt="Third slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://source.unsplash.com/random/203" alt="Fourth slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://source.unsplash.com/random/204" alt="Fifth slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://source.unsplash.com/random/205" alt="Sixth slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#indicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#indicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div> -->

    </div>
  </div>
</div>
                         </div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.5.3/umd/popper.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.min.js'></script>
</body>
</html>
