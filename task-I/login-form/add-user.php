<html lang="en">
<head>
  <title>crud-oparetion</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	
</head>
<body>
<br><br>
<div class="container">
  <h2><center style="color:blue;">Registration</center></h2>
  <form action="" method="post" enctype="multipart/form-data">
	  <div class="form-group">
      <label>Name:</label>
      <input type="text" class="form-control"  placeholder="Enter name" name="user_name">
    </div>
    <div class="form-group">
      <label>Email:</label>
      <input type="email" class="form-control"  placeholder="Enter email" name="user_email">
    </div>
    <div class="form-group">
      <label>Password:</label>
      <input type="password" class="form-control"  placeholder="Enter password" name="user_password">
    </div>
	  <div class="form-group">
      <label>image:</label>
      <input type="file" class="form-control"  placeholder="Enter password" name="user_image">
    </div>
	  <div class="form-group">
      <label>Details:</label>
		  <textarea class="form-control" name="user_details"></textarea>
    </div>
     
   <input type="submit" class="btn btn-success" name="insert_btn" />
  </form>
</div>
	<?php
	$host = 'localhost';
    $user = 'root';
    $passwd = '';
    $schema = 'crud';
    $mysqli = mysqli_connect($host, $user, $passwd, $schema);
    if(isset($_POST['insert_btn']))
	{
	
	 $user_name = $_POST['user_name'];
	 $user_email = $_POST['user_email'];
	 $user_password = $_POST['user_password'];
	 $image = $_FILES['user_image']['name'];
	 $tmp_image = $_FILES['user_image']['tmp_name'];
	 $user_details = $_POST['user_details'];	
		
	$insert = "INSERT INTO user(user_name,user_email,user_password,user_image,user_details) VALUES('$user_name','$user_email','$user_password','$image','$user_details')";	
		
		$run_insert =mysqli_query($mysqli,$insert);
		
		if($run_insert === true){
		echo "data has been inserted";
		move_uploaded_file($tmp_image,"upload/$image");
	   }else{
		echo "failed";
	   }
		
	}
	?>
	
	<a class="btn btn-success" href="view_user.php">view user</a>
	
	</body>
	</html>