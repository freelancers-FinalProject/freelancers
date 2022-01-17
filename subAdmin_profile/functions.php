<?php 

function getSubCategory($con , $id){ 
    
$cate             = "SELECT * FROM sub_category WHERE subAdmin_id='$id' ";  
$cate_result          = $con->query($cate); 
return $cate_result ;
}

function getContent($con, $id){ 
    $sql ="SELECT sub_category.id , name , images 
    FROM sub_category
    INNER JOIN content ON content.subCate_id=sub_category.id 
    WHERE subAdmin_id='$id' " ;
    $result = $con->query($sql);
    return $result ;
}

function getSubAdminInfo($con, $id){ 

    // $sql ="SELECT * FROM sub_admin WHERE id='$id'"; 
    // $reslut = $con->query($sql); 
    // $row = $reslut->fetch_assoc(); 
    // return $row ;

    $sql ="SELECT category.id, name,
    sub_admin.id, username, email, address, phone, profile_pic, facebook, instagram 
    FROM category 
    INNER JOIN sub_admin 
    ON cate_id=category.id 
    WHERE sub_admin.id='$id' ";

    $result = $con->query($sql); 
    $row = $result->fetch_assoc(); 
    return $row ;
}

function getVideo($con, $id){
     

    $sql=" SELECT 
    sub_category.id,
    content.video
     FROM  sub_category 
     INNER JOIN content  
     ON content.subCate_id =sub_category.id

     WHERE sub_category.subAdmin_id= '$id' ";
     
     

     $result=$con->query($sql); 

      
      
     return $result ;


}

?>