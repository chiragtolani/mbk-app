<?php
 session_start();    
if(!isset($_SESSION['Login']))
    {
        header('Location: ../index.php');
    }
    else
    {
       
    
	include("../config.php");
	$$con=mysqli_connect($server,$username,$password,$db);

	
    $user=$_POST["username"];
    $pass=$_POST["password"];
	$email=$_POST["email"];
    $name=$_POST["name"];
    $s_id=$_POST["staff_id"];
    $desig=$_POST["desig"];
    $mobile=$_POST["mobile"];
    $tel=$_POST["tel"];
	
	if (mysqli_connect_errno()){
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	$sql="UPDATE user_profile SET email='".$email."',name='".$name."',staff_id='".$s_id."',desig='".$desig."',mobile=".$mobile.",tel=".$tel." WHERE username='".$user."';";
	
	
	
        if($result=mysqli_query($con,$sql))
        {
        header('Location: ../settings.php');
        }
        
   
    
	mysqli_close($con);
    }
?>