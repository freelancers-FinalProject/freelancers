<?php
require 'config.php';
require 'includes/function/function.php';
if($_SERVER['REQUEST_METHOD']=="POST"){  
    $image_id =$_POST['image_id'];
    $id =$_POST['id'] ;
    $cate_name =$_POST['cate_name'];
    
foreach($_FILES['file']['name'] as $key=>$val){
   $file_name =$_FILES['file']['name'][$key];
   // get file extension
$ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

// get filename without extension
$filenamewithoutextension = pathinfo($file_name, PATHINFO_FILENAME);
if (!file_exists(getcwd(). '/uploads')) {
  mkdir(getcwd(). '/uploads', 0777);
  
}else{
     $filename_to_store = $filenamewithoutextension. '.' .$ext;
updatePost($conn , $filename_to_store , $image_id);
 move_uploaded_file($_FILES['file']['tmp_name'][$key], getcwd(). '/uploads/'.$filename_to_store);
 
}

}

}

?>