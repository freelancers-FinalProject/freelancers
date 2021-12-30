<?php
///////////////delete/////////////
require "../config.php" ;
$id= $_GET['id'] ;

    $sql = "DELETE FROM category WHERE id=$id ";
  
    if (mysqli_query($conn, $sql)) {
      echo "Record deleted successfully";
    } else {
      echo "Error deleting record: " . mysqli_error($conn);
    }
    
    
  
  


?>