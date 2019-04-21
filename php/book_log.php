<?php 
	session_start();
    if(!isset($_SESSION['Login']))
    {
        header('Location: index.php');
    }
    else
    {
       include("../config.php");
		date_default_timezone_set('Asia/Dubai');
		$con=mysqli_connect($server,$username,$password,$db) or die(mysqli_error());
		$m_id=mysqli_real_escape_string($con,$_GET['m_id']);
		$type=mysqli_real_escape_string($con,$_GET['type']);
		$sql="insert into book_log values('".$_SESSION['Login']."','".date('Y-m-d H:i:s')."','".$m_id."','".$type."')";
		if(mysqli_query($con,$sql)){
			if($type=="book"){
				header("Location:send_mail.php?m_id=$m_id"); 
			}
			else {
				header("Location:../home.php"); 

			}
		}
		else{
			echo "some error occured.".mysqli_error($con);
		}
	}

?>