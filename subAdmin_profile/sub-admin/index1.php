<?php 
// include_once("../admin/config.php");
include_once("../conection.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link href="../sub-admin/CSS/sop.css" rel="stylesheet">
<?php
			$sql = "SELECT id, username, email, address, profile_pic, facebook, instagram, cate_id  FROM sub_admin";
			$resultset = mysqli_query($con, $sql) or die("database error:". mysqli_error($conn));
            
			while( $record = mysqli_fetch_assoc($resultset) ) {
                $cate_id = $record['cate_id']; 
                $cate_sql = "SELECT * FROM category WHERE id='$cate_id' " ;
                $cate_result =$con->query($cate_sql); 
                $cate_row =$cate_result->fetch_assoc();
			?>
<div class="container">
    
	<div class="row">
		<div class="col-md-4">
            <a href='../subAdmin_profile.php?id=<?=$record['id']; ?>'>
    <div class="profile-card-2" >
        
        <img src="<?php echo $record['profile_pic']; ?>" class="img img-responsive">
        <div class="profile-name"><?php echo $record['username']; ?></div>
        <div class="profile-username"><?php echo $record['email']; ?></div>
        <div class="profile-email"><?php echo $cate_row['name']; ?></div>
        <div class="profile-icons"><a href="http://www.facebook.com/<?= $record['facebook']; ?>"><i class="fa fa-facebook"></i></a><a href="http://www.instagram.com/<?= $record['instagram']; ?>"><i class="fa fa-instagram"></i></a><a href="#"><i class="fa fa-linkedin"></i></a></div>
        
    </div>
    </a>
</div>
<?php } ?>
