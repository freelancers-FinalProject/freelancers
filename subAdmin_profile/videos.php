<?php 
if($_SERVER['REQUEST_METHOD']=="POST"){ 
  $id=$_POST['id']; 
  
}else { 
  $id=$_GET['id']; 

}

  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>

<div class="container">

  
<div class="btn-group btn-group-justified filter-button-group" role="group" aria-label="filterImages">
<div class="btn-group" role="group">
    <button type="button" class="btn btn-default is-checked" >VIDEOS</button>
  </div>
  </div>


<div class="row">
  
  <?php 

  $result = getVideo($con, $id);

  if($result->num_rows > 0) { 
    while($row = $result->fetch_assoc()){ 
      if($row['video']!=""){ 

      

   ?>
<!-- HERE IS THE VIDEO  -->

<div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
  <video class="video-fluid z-depth-1  w-100 shadow-1-strong rounded mb-4"  controls>
  <source src="<?= $row['video']; ?>" type="video/mp4" />
 </video>

</div>
<!-- End  THE VIDEO  -->
<?php } 

}
}else { 


?>

<!-- When RESULT EMPTY  -->
<div class="alert alert-warning" role="alert">
 0 result .
</div>
<?php } ?>

</body>
</html>









   
   