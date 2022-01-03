<?php 
session_start();
// sgin in users 
$con=mysqli_connect('localhost','root','','freelancer');
if(isset($_POST['login'])){
	$email=$_POST['Email'];
	$pass=$_POST['Password'];
	$hash_pass =sha1($pass);
	$query="select * from users where email='$email' && password='$hash_pass'";
	$result=mysqli_query($con,$query);
	$row=mysqli_fetch_assoc($result);
	$total=mysqli_num_rows($result);
	
	if($total==1)
	{
	$_SESSION['id1'] =  $row['id'];
	$_SESSION['username'] =  $row['username']; 
		header("location:../user_interface/index.php");
		
	}
	else 
	{
		echo '<script>alert("login failed")</script>';
	}
	}
?>

<?php

if(isset($_POST['username']) && isset($_POST['Email']) && isset($_POST['Password']))
{
 $user= $_POST['username'] ;
 $email= $_POST['Email'] ;
 $pass= $_POST['Password'];
 $hash_pass = sha1($pass);
  
    $s="select * FROM users WHERE email ='$email'";
    $result = mysqli_query($con,$s);
    $num=mysqli_num_rows ($result) ;
    if( $num==1)
    {
      myFunction1($num);
    }
    else {
    	$reg="INSERT INTO `users`( `username`, `email`, `password`) VALUES ('$user','$email','$hash_pass')";
    	mysqli_query($con,$reg); 
    	myFunction1($num);
    }
}
?>


<?php 
if(isset($_POST['login_as_admin'])){
	$email=$_POST['Email'];
	$pass=$_POST['Password'];
	$query="select * from sub_admin where email='$email' && password='$pass' ";
	$result=mysqli_query($con,$query);
	$row=mysqli_fetch_assoc($result);
	$total=mysqli_num_rows($result);
	
	if($total==1)
	{
		if ($row["type"]==0) {
			$_SESSION['id2']=$row['id'];
			$_SESSION['username_subAdmin']=$row['username'];
			header("location:../sub-admin/index.php");
		}
		else if ($row["type"]==1){
			header("location:index3.php");
		}
		
		
	}
	else 
	{
		echo '<script>alert("login failed")</script>';
	}
	}
?>

<?php

if(isset($_POST['signup_as_admin']))
{
 $user= $_POST['username'] ;
 $email= $_POST['Email'] ;
 $pass= $_POST['Password'];
 $hash_pass = sha1($pass);
  
    $s="select * FROM sub_admin WHERE email ='$email'";
    $result = mysqli_query($con,$s);
    $num=mysqli_num_rows ($result) ;
    if( $num==1)
    {
      myFunction1($num);
    }
    else {
    	$reg="INSERT INTO `sub_admin`( `username`, `email`, `password`) VALUES ('$user','$email','$hash_pass')";
    	mysqli_query($con,$reg); 
    	myFunction1($num);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form method="post">
			<h1>Create Account</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your email for registration</span>
			<input type="text" name="username" placeholder="username" required/>
			<input type="email" name="Email" placeholder="example@gmail.com" required pattern=".+@gmail\.com"  />
			<input type="password" name="Password" placeholder="Password"  id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required />
            <input type="password" placeholder="confirm Password" id="confirm_password" required />
			<button>Sign Up</button> 
			<br>
			<button name="signup_as_admin">as Admin</button>
					
		</form>
	</div>

<!-- sign-in  -->

	<div class="form-container sign-in-container">
		<form method="post">
			<h1>Sign in</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your account</span>
			<input type="email" name="Email" placeholder="Email" required />
			<input type="password" name="Password" placeholder="Password" required />
			<a href="#">Forgot your password?</a>
			<button name="login" >Sign In</button>
			<br>
			<button name="login_as_admin">as Admin</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>

                      <?php
                          function myFunction1($num) {
                          if($num==1)
                          {
                           echo" <script>  confirm('username already taken') </script>";
                          }
                          else
                          {
                              echo" <script>  confirm('registeration successful') </script>";
                              header("location:index.php"); 

                          }
                          }
                     ?>

<script>
	var password = document.getElementById("password")
	  , confirm_password = document.getElementById("confirm_password");

	function validatePassword(){
	  if(password.value != confirm_password.value) {
	    confirm_password.setCustomValidity("Passwords Don't Match");
	  } else {
	    confirm_password.setCustomValidity('');
	  }
	}

	password.onchange = validatePassword;
	confirm_password.onkeyup = validatePassword;
	</script>

<script src="javas.js"></script>

</body>
</html>