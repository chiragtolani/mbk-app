<?php
	include("../config.php");
	$con=mysqli_connect($server,$username,$password,$db);
	
	$username= $_POST["username"];
	$new_pass= $_POST["npass"];
	$con_pass= $_POST["cpass"];
	
	if (mysqli_connect_errno()){
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	$sql="UPDATE user_profile SET password = '".$new_pass."' WHERE username = '".$username."';";


    if($new_pass == $con_pass)
		{
			if($result=mysqli_query($con,$sql))
				{
					header('Location: ../index.php');
				}
		}
    else
        {
            session_start();
            $_SESSION['FailP'] = "Passwords do not match!";
            header('Location: ../forgot.php');
        }

	mysqli_close($con);
	
?>