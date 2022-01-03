<?php 
include_once "DbConn.php"; 
include_once "function.php"; 

$id=$_GET['id'];
$category_name=$_GET['category_name'];
//to fetch the subCate_id
// $subCate_sql = "SELECT * FROM sub_category WHERE subAdmin_id='$id' and name='$category_name' " ;
// $subCate_result =$con->query($subCate_sql); 
// $subCate_row = $subCate_result->fetch_assoc(); 
// $subCate_id = $subCate_row['id']; 
// $content_sql = "SELECT * FROM content WHERE subCate_id='$subCate_id' " ;
// $content_result = $con->query($content_sql); 




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    
<div class="container ">

<!-- Card deck -->
<div class="card-deck row ">

  <!-- Card -->
  <?php 
$content_result=getSubCategory($con,$id,$category_name);
if($content_result->num_rows > 0 ){ 
    while($content_row = $content_result->fetch_assoc()){ 

?>
 <div class="col-xs-12 col-sm-6 col-md-4">
  <div class="card " >

    <!--Card image-->
    <div class="view overlay">
      <img class="card-img-top"
       src="<?php echo $content_row['images'];  ?>" alt="Card image cap">
      <a href="#!">
        <div class="mask rgba-white-slight"></div>
      </a>
    </div>

    <!--Card content-->
    <div class="card-body d-flex">
<button class="btn btn-primary m-3 " data-toggle="modal" data-target="#editCategory'.$data[$i]['id'].'" data-whatever="@getbootstrap">Update</button>
 <div class="modal fade" id="editCategory'.$data[$i]['id'].'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eidt Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
   <form action="updatePost.php" method="POST">
      <div class="modal-body">

          <div class="form-group">
            <!-- <label for="nameCate" class="col-form-label">Choose Image:</label> -->
            <i class="fas fa-cloud-upload-alt" style="font-size: 25px;"></i>
            <input type="file"  name = "image" style="display:none"id="selectedFile"> 
            <input type="button" value="select image and video" onclick="document.getElementById('selectedFile').click();"> 
            <input type="text"  name = "image_id" class="hidden" value="<?php echo $content_row['id']; ?>"> 
            <input type="text" class="hidden" name ="id" value="<?php echo $id ; ?>"> 
            <input type="text" name ="category_name" class="hidden" value="<?php echo $category_name ; ?>"> 
            
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
   </form>
    </div> 
  </div>
</div>


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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>