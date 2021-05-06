<?php
$error ='';
if(isset($_POST['submit'])){
	if(empty($_POST['user_name'])||empty($_POST['pass'])){
		$error = "Usernmae or Password invalid ";
	}else{
		$user_name = $_POST['user_name'];
		$user_password = $_POST['user_password'];
	
	$conn = mysqli_connect("localhost","root");
		$db = mysqli_select_db($conn,"log_in");
		
		$query = mysqli_query($conn,"SELECT * FROM user WHERE user_password = '$user_password' AND user_name='$user_name'");
		
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