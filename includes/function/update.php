<?php 
require "../../config.php" ;
$id = $_GET['id'];

if(isset($_POST['addBtn'])){
  
    $name = $_POST['name'];
    
    
    $query = "UPDATE `category` SET `name`='$name' WHERE id=$id";
      
           mysqli_query($conn,$query);
             header("location:../../index.php");
            }
?>
 <div class="content">
    <div class="animated fadeIn">
    <div class="row mb-5">
        <div class="col-lg-12 ">
            <div class="card">
                <div class="card-header bg-secondary text-light">update category</div>
                <div class="card-body card-block">
                    <form action="#" method="post" class="" enctype="multipart/form-data">
                        
                        
                        <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" id="name" name="name" placeholder="Name"  class="form-control">
                        </div>
                   
                        <div class="form-actions form-group"><button type="submit" name="addBtn" class="btn btn-success btn-sm">Update </button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
    </div></div>




