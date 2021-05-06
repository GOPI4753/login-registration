<?php
include 'config.php';
session_start();
if(isset($_POST['submit'])){
	$user_email = $_POST['user_email'];
	$user_password =md5($_POST['user_password']);
	$sqli = "SELECT * FROM user WHERE user_email = '$user_email' AND user_password = '$user_password' ";
	$result = mysqli_query($conn,$sqli);
	if($result->num_rows > 0){
		$row = mysqli_fetch_assoc($result);
		$_SESSION['user_name'] = $row['user_name'];
		header("Location:welcome.php");
	}else{
		echo "<script> alert('woop! Email or password is wrong.')</script>";
	}
}
?>

<!doctype>
<html>
	<head>
		<title>Login Form</title>
	<style>
		.login{
			width: 360px;
			margin:50px auto;
			font:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", "serif";
			border-redius:10px;
			border: 2px solid #ccc;
			padding:10px 40px 25px;
			margin-top:70px;
		}
		
		</style>
	</head>
       <body style="background-color: aqua;">
<div class="login">
	
    <h1 align="center">Login</h1>
    <form action="" method="post" style="text-align:center">
	   <div>
		<input type="email" class="form-control" placeholder="Email" name="user_email" required> <br/><br/>
		   </div>
		<div>
		<input type="password" class="form-control" placeholder="Password" name="user_password"    required>  <br/><br/>
		</div>
		<div>
			<button class="btn" name ="submit">Login</button>
          </div>
		<p class="login-registration-text">Dont have an account?<a href="register-login.php">register here</a></p>
		</from>
		</div>
		  
		  
	</body>
	</html>