<?php 
include_once "DbConn.php"; 
include_once "function.php";
if($_SERVER['REQUEST_METHOD']=="POST"){ 
    $image_id = $_POST['image_id'] ;
    $id = $_POST['id']; 
    $category_name =$_POST['category_name']; 
    DeletePost($con,$image_id) ;
    header("location:posts.php?id=$id&category_name=$category_name");

}

?>