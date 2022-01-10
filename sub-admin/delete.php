<?php
require 'config.php';
require 'includes/function/function.php';
$id =$_GET['id'];
deleteData($id);
header("location:index.php");
?>