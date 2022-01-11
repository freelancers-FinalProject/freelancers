<?php 

if($_SERVER['REQUEST_METHOD']=="POST"){ 
  $id=$_POST['id']; 
  
}else { 
  $id=$_GET['id']; 
  // $sub_category    = $_GET['sub-category'] ;

}


?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Image Gallery Bootstrap with Isotope</title>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/prettyphoto/3.1.6/css/prettyPhoto.css'><link rel="stylesheet" href="image-gallery-bootstrap-with-isotope/dist/style.css">

</head>
<body>



<div class="container">
<?php $cate_result = getSubCategory($con, $id); 
if($cate_result->num_rows >0 ) {  ?>
<div class="btn-group btn-group-justified filter-button-group" role="group" aria-label="filterImages">
<div class="btn-group" role="group">
    <button type="button" class="btn btn-default is-checked" data-filter="*">All</button>
  </div>
  
  <!--filtering-->
<?php 



  while($cate_row = $cate_result->fetch_assoc()) { 
    if($cate_row['name']!="") { 

    
 
?>


  <div class="btn-group " role="group">
    <button type="button" class="btn btn-default is-checked " data-filter=".<?= $cate_row['name']; ?>"><?= $cate_row['name']; ?></button>
  </div>



 <?php
    }
}
}else { 


?> 

<!-- When RESULT EMPTY  -->
<div class="alert alert-warning" role="alert">
 0 result .
</div>



<?php } ?>
</div>

  <div class="grid">
    <div class="grid-sizer col-xs-12 col-sm-6 col-md-4 col-lg-4"></div>

    <?php 

    
    $result = getContent($con, $id);
    
    if($result->num_rows > 0 ) { 
      while($row=$result->fetch_assoc()){ 
        if($row['images']!= "") { 

        
    ?>

    <div  class="col-xs-12 col-sm-6 col-md-4 grid-item <?= $row['name']; ?>"><a class="prettyphoto" href="<?= $row['images']; ?>" rel="prettyPhoto[portfolio]"><img  class="thumbnail img-responsive " src="<?= $row['images']; ?>" alt=" <?= $row['name']; ?>"></a></div>

<?php    }
    } 
  }
       ?>

   
  </div>





</div>
<!-- partial -->
<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>
<script src='https://npmcdn.com/isotope-layout@3.0/dist/isotope.pkgd.min.js'></script>
<script src='https://cdn.jsdelivr.net/prettyphoto/3.1.6/js/jquery.prettyPhoto.js'></script><script  src="image-gallery-bootstrap-with-isotope/dist/script.js"></script>


</body>
</html>
