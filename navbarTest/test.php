<?php 
include_once "DbConnection.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link href="style.css" rel="stylesheet">

<div class="container">	
	
	<div class="row">
		<div class="col-lg-3 col-sm-6">
			<?php
			$sql = "SELECT id, username, email, address, profile_pic, facebook, instagram ,cate_id  FROM sub_admin";
			$resultset = mysqli_query($con, $sql) or die("database error:". mysqli_error($con));
            
			while( $record = mysqli_fetch_assoc($resultset) ) { 
                $cate_id = $record['cate_id']; 
                $cate_sql = "SELECT * FROM category WHERE id='$cate_id' " ;
                $cate_result =$con->query($cate_sql); 
                $cate_row =$cate_result->fetch_assoc(); 
                    
			?>
            <div class="card hovercard">
                <div class="cardheader" style="background: url('images/nature.jpeg');">               
					<div class="avatar">
						<img alt="" src="<?php echo $record['profile_pic']; ?>">
					</div>
				 </div>
                <div class="card-body info">
                    <div class="title">
                        <a href="#"><?php echo $record['username']; ?></a>
                    </div>

                    <div class="desc"><?php echo $cate_row['name']; ?></div>      
					<div class="desc"><?php echo $record['address']; ?></div>								
                </div>
                <div class="card-footer bottom">
                    <a class="btn btn-primary btn-twitter btn-sm" href="<?php echo $record['instagram']; ?>">
                        <i class="fa fa-instagram"></i>
                    </a>
                    <a class="btn btn-danger btn-sm" rel="publisher"
                       href="<?php echo $record['email']; ?>">
                        <i class="fa fa-google"></i>
                    </a>
                    <a class="btn btn-primary btn-sm" rel="publisher"
                       href="<?php echo $record['facebook']; ?>">
                        <i class="fa fa-facebook"></i>
                    </a>                 
                </div>
                <a class="btn btn-default read-more" style="background:#3399ff;color:white" href="profile.php?id=<?php echo $record['id'];  ?>">show more</a>
            </div>
			<?php } ?>
        </div>
	</div>	
</div>

