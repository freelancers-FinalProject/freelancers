<?php 

include_once "DbConn.php"; 
include_once "function.php"; 

if($_SERVER['REQUEST_METHOD']=="POST"){ 
    
$image = $_POST['image'] ;
$image_id = $_POST['image_id']  ;
$id = $_POST['id']; 
$category_name= $_POST['category_name']; 

echo $image . "     ".$image_id ;
updatePost($con , $image , $image_id) ;
header("location:posts.php ?id=$id&category_name=$category_name"); 
}else { 
    echo "you can't make this proccess ." ; 
}

?>

