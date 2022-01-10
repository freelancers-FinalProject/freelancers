<?php 


function getSubCategory($con ,$id, $category_name ){ 
    $subCate_sql = "SELECT * FROM sub_category WHERE subAdmin_id='$id' and name='$category_name' " ;
$subCate_result =$con->query($subCate_sql); 
$subCate_row = $subCate_result->fetch_assoc(); 
$subCate_id = $subCate_row['id']; 
return getPost($con,$subCate_id);
}

function getPost($con,$subCate_id ){ 
    $content_sql = "SELECT * FROM content WHERE subCate_id='$subCate_id' " ;
    $content_result = $con->query($content_sql); 
    return $content_result;
}

function updatePost($con, $image , $image_id){
    $sql = "UPDATE content SET images='$image' WHERE id = '$image_id' ";
    $result = $con->query($sql); 
    echo "<pre>"; print_r($result); echo "</pre>"; 
    
    
}


function DeletePost($con, $image_id){ 
$sql = "DELETE FROM content WHERE id='$image_id'"; 
$result= $con->query($sql); 
echo "deleted successfully" ;
}


?>