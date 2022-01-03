<?php
session_start();
if(isset($_SESSION['id2'])) {
require 'template/header.php';
require 'template/navbar.php';
require 'config.php';
require 'includes/function/function.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
  $cateName = $_POST['cateName'];
  if(isset($cateName) && !empty($cateName) ){
    insertData($cateName,$_SESSION['id2']);
  }else{
    echo '<div class="alert alert-warning" role="alert">
          Pleas Enter Name Category!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
     </div>';
  }
}
?>
<div class="container">
 <button type="submit" class="btn btn-primary edit-submit" data-toggle="modal" data-target="#addCategory" data-whatever="@getbootstrap">New Category</button>
<div class="modal fade" id="addCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus"></i>New Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
   <form ation="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
      <div class="modal-body">
     
          <div class="form-group">
            <label for="nameCate" class="col-form-label">Name Category:</label>
            <input type="text" class="form-control" id="nameCate" name="cateName">
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

  <div class="row">
<?php
    $data =fetchData($_SESSION['id2']);
    if(isset($data)){   
     for ($i=0; $i <count($data) ; $i++) { 
 echo '
 <div class="col-sm-6 col-lg-4">
   <div class="card">
     <div class="card-body text-center">
       <p class="card-text "><i class="fas fa-icons"></i> '.$data[$i]['name'].'</p>
       <div class="container">
       <button  class="btn btn-success" data-toggle="modal" data-target="#editCategory'.$data[$i]['id'].'" data-whatever="@getbootstrap"><i class="far fa-edit"></i>Update</button>
       <div class="modal fade" id="editCategory'.$data[$i]['id'].'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
             <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel">Eidt Category</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
         <form action="update.php" method="POST">
            <div class="modal-body">
           
               <div class="form-group">
                            <label for="nameCate" class="col-form-label">Name Category:</label>
                  <input type="hidden"  name="id" value="'.$data[$i]['id'].'">
                  <input type="text" class="form-control" id="nameCate" name="cateName" value="'.$data[$i]['name'].'">
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
       <a href="delete.php?id='.$data[$i]['id'].'"class="btn btn-danger"><i class="far fa-trash-alt"></i>Delete</a>
       </div>
       <div class="go-corner" >
      <div class="go-arrow">
        →
      </div>
    </div>
     </div>
   </div>
 </div>
 ';}}?>  
 </div>
 </div>
<?php
}
require 'template/footer.php';
?>

