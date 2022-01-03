<?php
require 'config.php';
require 'includes/function/function.php';
 $extImage =array('jpg','jpeg','png','gif');
 $extVideo =array();
 $sub_category = $_POST['sub_category'];
 
foreach($_FILES['file']['name'] as $key=>$val){

    $file_name = $_FILES['file']['name'][$key];
    
    // get file extension
    $ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
     
    // get filename without extension
    $filenamewithoutextension = pathinfo($file_name, PATHINFO_FILENAME);
    if (!file_exists(getcwd(). '/uploads')) {
        mkdir(getcwd(). '/uploads', 0777);
    }
    $filename_to_store = $filenamewithoutextension. '.' .$ext;
    insertImageandVideo($filename_to_store,$sub_category);
    move_uploaded_file($_FILES['file']['tmp_name'][$key], getcwd(). '/uploads/'.$filename_to_store);
  }

?>