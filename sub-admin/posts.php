<?php 
session_start();
if(isset($_SESSION['id2'])) {
require 'template/header.php';
require 'template/navbar.php';
require 'config.php';
require 'includes/function/function.php';

$subAdmin_id =$_SESSION['id2']; 

$category_name=$_GET['category_name'];

?>

  <?php 
  
$content_result=getSubCategory($conn,$subAdmin_id,$category_name);
if($content_result->num_rows > 0 ){ 
    while($content_row = $content_result->fetch_assoc()){ 
      if (!($content_row['images'] =="NULL")){
  
?> 
 <div class="col-xs-12 col-sm-6 col-md-4">
   <div class="container">
    <!--Card image-->
    <img class="edit-img" src="uploads_image/<?php echo $content_row['images']; ?>" id="uploads_image/<?php echo $content_row['images'];  ?>" alt="<?php echo $content_row['images'];  ?>">
     <a href="updatePost.php?id_image=<?php echo $content_row['id']?>&id=<?php echo $content_row['subCate_id']?>&cate_name=<?php echo  $category_name?>" class="btn btn-primary m-3 " >Update</a>
      <form action="deletePost.php" method="post" class="m-3">
        <input type="text"  name = "image_id" class="hidden" value="<?php echo $content_row['id'];?>"> 
        <input type="text" class="hidden" name ="id" value="<?php echo $id;?>"> 
        <input type="text" name ="category_name" class="hidden" value="<?php echo $category_name ;?>">     
        <input type="submit" value="Delete" class="btn btn-danger">
      </form>
      </div>
   </div>

<?php 
     } }
}else{
  
echo '<div class="container">
<div class="alert alert-warning" role="alert">
There is no work!  try to add something from you work
</div>
</div>';
}


?>
  
</div> 
<!-- Card deck -->

</div>
<?php
}
require 'template/footer.php';
?>