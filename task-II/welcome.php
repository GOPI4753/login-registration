<?php
session_start();
?>
<!doctype>
<html lang="en">
<head>
  <title>Organisations</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	
</head>
<body>
<br><br>
<div class="container-fluid">
  <div class="row">
	  <div class="col-sm-4"></div>
  <form action="" method="post" enctype="multipart/form-data">
	  <div class="form-group">
      Organisation Name:
      <input type="text" class="form-control"  placeholder="Organization Name" name="org_name">
    </div>
	  <div class="form-group">
      <label>Organisation logo:</label>
      <input type="file" class="form-control"  placeholder="Enter password" name="org_logo">
    </div>
    <label>Organisation Address:</label>
		  <textarea class="form-control" name="org_address"></textarea>
   
	<div class="form-group">
      <label>contact:</label>
		  <input type="email" class="form-control" placeholder=" email" name="org_contact">
    </div>
	  
	  
	<input type="submit" class="btn btn-success" name="insert_btn" />
     <a href="logout.php">Logout</a>
	<div class="col-sm-4"></div>
	  
	  </form>
  </div>	
</div>
	<?php
	$host = 'localhost';
    $user = 'root';
    $passwd = '';
    $schema = 'org_database';
    $conn = mysqli_connect($host, $user, $passwd, $schema);
	 if(isset($_POST['insert_btn']))
	{
	
	 $org_name = $_POST['org_name'];
	 $image = $_FILES['org_logo']['name'];
	 $tmp_image = $_FILES['org_logo']['tmp_name'];
	 $org_address = $_POST['org_address'];
	 $org_contact = $_POST['org_contact'];		
	 
	
		
	   $insert = "INSERT INTO user(org_name,org_logo,org_address,org_contact) VALUES('$org_name','$image','$org_address','$org_contact')";	
		
		$run_insert =mysqli_query($conn,$insert);
		
		if($run_insert === true){
		echo "";
		move_uploaded_file($tmp_image,"upload/$image");
	   }else{
		echo "failed";
	   }
		
	}
	?>
	<div class="container">
  <h2 style="text-align: center">Organisation</h2>
	
  <table class="table table-dark">
    <thead>
      <tr>
        <th>Id</th>
        <th>organisation</th>
          <th>Image</th>
		  <th>Address</th>
		  <th>Contact</th>
		  
      </tr>
    </thead>
    <tbody>
		<?php
		$host = 'localhost';
        $user = 'root';
        $passwd = '';
        $schema = 'org_database';
        $conn = mysqli_connect($host, $user, $passwd, $schema);
    
		$select = "SELECT * FROM user";
		$run = mysqli_query($conn,$select);
	while	($row_user = mysqli_fetch_array($run)){
		$user_id = $row_user['id'];
		$org_name = $row_user['org_name'];
	    $org_logo = $row_user['org_logo'];
		$org_address = $row_user['org_address'];
		$org_contact = $row_user['org_contact'];
		?>
      <tr>
        <td><?php echo $user_id;?></td>
        <td><?php echo $org_name;?></td>
		
		<td><img src="upload/<?php echo $org_logo;?>" height="70px"></td> 
		<td><?php echo $org_address;?></td> 
		 <td><?php echo $org_contact;?></td>  
       
		 
	</tr>
		 <?php } ?>
      
</div>

	

</body>
</html>