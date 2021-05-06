<?php
$host = 'localhost';
    $user = 'root';
    $passwd = '';
    $schema = 'register-login';
    $conn = mysqli_connect($host, $user, $passwd, $schema);
     if(mysqli_connect_errno()){
		 echo "connection fail";
	 }else{
		 echo "connection ok";
	 }


?>