<?php 
session_start();
if(isset($_SESSION['id2'])) {
require 'template/header.php';
require 'template/navbar.php';
$image_id = isset($_GET['id_image']) && is_numeric($_GET['id_image'])? intval( $_GET['id_image']):0;
 $cate_name = isset($_GET['cate_name']) && is_string($_GET['cate_name'])? strval( $_GET['cate_name']):0;

?>

<div class="jumbotron jumbotron-fluid eidt-jumbotron">
  <div class="container">
    <div class="display-4 text-center ">
    <div id="drop_box" ondrop="prev_image(event)" ondragover="return false">
        <div id="drog_upload_file ">
        <i class='fas fa-cloud-upload-alt'></i>
            <p>Drop Image Or video here</p>
            <p>or</p>
            <p><input type="button" value="Select Image Or video" onclick="update_image();" ></p>
            <input type="file" id="selectedFile"  style="display: none" >
            <input type="text"  id="image_id" class="hidden" value="<?php echo $image_id?>" onclick="get_id_image();" >
            <input type="text"  id="cate_name" class="hidden" value="<?php echo $cate_name?>" onclick="get_NameCate();" >
           <a  href="posts.php?id=<?php echo $_SESSION['id2']?>&category_name=<?php echo$cate_name?>"  name="save" >Save</a>
        </div>
    </div>
</div>
  </div>
</div>
<?php
}
require 'template/footer.php';
?>
