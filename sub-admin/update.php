<?php
require 'config.php';
require 'includes/function/function.php';
 $id   = $_POST['id'];
 $name = $_POST['cateName'];
 updataData($name,$id);
header("location:index.php");
?>