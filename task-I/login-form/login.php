
<?php
$error ='';
if(isset($_POST['submit'])){
	if(empty($_POST['user_name'])||empty($_POST['user_password'])){
		$error = "Usernmae or Password invalid ";
	}else{
		$user_name = $_POST['user_name'];
		$user_password = $_POST['user_password'];
	
	$conn = mysqli_connect("localhost","root");
		$db = mysqli_select_db($conn,"log_in");
		 	
		$query = mysqli_query($conn," SELECT * FROM user WHERE user_password = '$user_password' AND user_name='$user_name' ");
		
		$rows =  mysqli_num_rows($query);
		 if( $rows == 1){
			 header("Location: welcome.php");
		 }else{
			 $error ="Username or Password invalid";
		 }
		mysqli_close($conn);
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
		<input type="text" class="form-control" placeholder="Username " name="user_name"> <br/><br/>
		<input type="password" class="form-control" placeholder="Password" name="user_password">  <br/><br/>
		
		<input type="submit" name="submit" value="login" />
           <span><?php echo $error; ?></span>  
		</from>
		</div>
		  
		  
	</body>
	</html>