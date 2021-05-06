
<?php
include 'config.php';
error_reporting(0);
if(isset($_POST['submit']))
{
$user_name = $_POST['user_name'];	
$user_email = $_POST['user_email'];
$password = md5($_POST['password']);
$cpassword = md5($_POST['cpassword']);
	if($password == $cpassword){
		 $sqli = "SELECT * FROM user WHERE user_email='$user_email'" ;
		 $result = mysqli_query($conn,$sqli);
		  if(!$result->num_rows > 0){
			  $sqli = "INSERT INTO user(user_name,user_email,user_password)
		 VALUES('$user_name','$user_email','$password')";
		 $result = mysqli_query($conn,$sqli);
		if($result){
		   echo "<script> alert('wow! user registration succesfully.')</script>";
			$user_name ="";
			$user_email = "";
			$_POST['password'] = "";
			$_POST['cpassword'] = "";
		  }else{
			echo "<script> alert('woops somthing went wrong!.')</script>";
		} 
		  }else{
			   echo "<script> alert('woop! Email already exist.')</script>";
		}  
		  } else{
		echo "<script> alert('password not mached.')</script>";
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
	
    <h1 align="center">Register</h1>
    <form action="" method="POST" style="text-align:center">
		<input type="text" class="form-control" placeholder="Username" name="user_name" value="<?php echo $user_name;?>"> <br/><br/>
				<input type="email" class="form-control" placeholder="Email " name="user_email" value="<?php echo $user_email;?>"> <br/><br/>

		<input type="password" class="form-control" placeholder="Password" name="password" value="<?php echo $_POST['password'];?>">  <br/><br/>
		<input type="password" class="form-control" placeholder="conform password" name="cpassword" value="<?php echo $_POST['cpassword'];?>">  <br/><br/>

		<div>
			<button name="submit" class="btn">Register</button>
          </div>
		<p class="login-registration-text">Dont have an account?<a href="index.php">Login here</a></p>
          
		</from>
		</div>
		  
		  
	</body>
	</html>