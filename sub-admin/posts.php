<?php 
session_start();
if(isset($_SESSION['id2'])) {
require 'template/header.php';
require 'template/navbar.php';
require 'config.php';
require 'includes/function/function.php';


$id=$_GET['id'];
$category_name=$_GET['category_name'];

?>

    
<div class="container p-5">

<!-- Card deck -->
<div class="card-deck row ">

  <!-- Card -->
  <?php 
$content_result=getSubCategory($conn,$id,$category_name);

if($content_result->num_rows > 0 ){ 
    while($content_row = $content_result->fetch_assoc()){ 
?>
 <div class="col-xs-12 col-sm-6 col-md-4">
  <div class="card " >
    <!--Card image-->
    <div class="view overlay">
      <img class="card-img-top"
       src="uploads/<?php echo $content_row['images']; ?>" id="uploads/<?php echo $content_row['images'];  ?>" alt="Card image cap">
      <a href="#!">
        <div class="mask rgba-white-slight"></div>
      </a>
    </div>

    <!--Card content-->
    <div class="card-body d-flex justify-content-center">
   <a  href="updatePost.php?id_image=<?php echo $content_row['id']?>&id=<?php echo $content_row['subCate_id']?>&cate_name=<?php echo  $category_name?>" class="btn btn-primary m-3 " >Update</a>
      <form action="deletePost.php" method="post" class="m-3">
        <input type="text"  name = "image_id" class="hidden" value="<?php echo $content_row['id']; ?>"> 
        <input type="text" class="hidden" name ="id" value="<?php echo $id ; ?>"> 
        <input type="text" name ="category_name" class="hidden" value="<?php echo $category_name ; ?>"> 
            
        <input type="submit" value="Delete" class="btn btn-danger">
      </form>
      
    </div>
   

  </div>
  <!-- Card -->
  </div>
<?php 
 }
}


?>
  
</div> 
<!-- Card deck -->
  








</div>
<?php
}
require 'template/footer.php';
?>