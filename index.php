<?php
require "templete/header.php";
// require "templete/sidebar.php";
// require "templete/navbar.php";
require "config.php";
require "includes/function/function.php";
  
if ($_SERVER['REQUEST_METHOD'] =='POST' ){
   $name = $_POST['name_cat'];
   if ( isset($name ) && !empty($name) ){
     insert($name);
     header("location:index.php");
   }else{
     echo "error";
   }


 }





//  if(isset($_POST['delete'])){
//   //  header('Location:function/delete.php');
//   // $sql ="SELECT * FROM category WHERE "
//   // $q="SELECT * FROM category WHERE name = '$name' "; 
//   // $q_result = $conn->query($q); 
//   // $q_row = $q_result->fetch_assoc(); 
//   // $category_id = $q_row['id']; 

//   // $re = "DELETE FROM category WHERE id='$category_id' ";
//   // $re_result= $conn->query($re); 
//   // echo "deleted!.."; 

  
  


//  }
?>

 <!-- partial -->
 <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Basic Tables </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Tables</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Basic tables</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Bordered table</h4>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Add New Category</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?=$_SERVER['PHP_SELF'] ?>" method="POST">
          <div class="form-group">
            <label for="recipient-name"  class="col-form-label">Name:</label>
            <input type="text" name="name_cat" class="form-control" id="recipient-name">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Send message</button>
      </div>
      </form>
    </div>
  </div>
</div>
<form action="" method="post">


                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th> #ID </th>
                          <th> Category Name </th>
                          <th> Action </th>
                          <!-- <th> Amount </th>
                          <th> Deadline </th> -->
                        </tr>
                      </thead>
                      <tbody>
                          <?php 
                            $row = fetch_data();
                     for($i= 0;$i<count($row);$i++){
                     echo' <tr>

                          <td>'.$row[$i]['id'].' </td>
                          <td> '.$row[$i]['name'].' </td>
                          <td>



                           <button   type="submit"  name="addBtn" class="btn btn-danger">
                            <a href="includes/function/update.php?id='.$row[$i]['id'].'">    update</button>
                          

                           <button class="btn btn-danger" name="delete">
                           <a href="includes/delete.php?id='.$row[$i]['id'].'">delete</a>

                           </button> 

                          </td>
                        </tr>' ;}
                       
                        ?>
                        
  
                       
        
                       
                      </tbody>
                    </table>
                    </form>
                  </div>
                </div>
              </div>
            
             
            </div>
          </div>
          <!-- content-wrapper ends -->
  <?php

require "templete/footer.php";


?>