<?php

	include("../config.php");
$con=mysqli_connect($server,$username,$password,$db);
	
	$username= $_POST["username"];
	$email= $_POST["email"];
	$password= $_POST["password"];
	
	if (mysqli_connect_errno()){
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	$sql="INSERT INTO user_profile (username, password, name, desig, mobile, tel, staff_id, email) VALUES('".$username."','".$password."','NULL','NULL',NULL, NULL ,'NULL','".$email."');";
	
	
	if($username!="" && $password!="" && $email!="")
    {
        if($result=mysqli_query($con,$sql))
            {
        header('Location: ../index.php');
				}
		
    }
    else
    {
        session_start();
        $_SESSION['RFail'] = "Please enter valid data!";
        header('Location: ../register.php');
    }
    
	mysqli_close($con);
	
?>