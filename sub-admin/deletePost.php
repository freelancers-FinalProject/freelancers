<?php 
require 'config.php';
require 'includes/function/function.php';
if($_SERVER['REQUEST_METHOD']=="POST"){ 
    $image_id = $_POST['image_id'] ;
    $id = $_POST['id']; 
    $category_name =$_POST['category_name']; 
    DeletePost($conn,$image_id) ;
    header("location:posts.php?id=$id&category_name=$category_name");

}

?>