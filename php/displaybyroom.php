<?php
session_start(); 
    if(!isset($_SESSION['Login']))
    {
        header('Location: ../index.php');
    }
    else
    {
	$r_name = $_GET['r_id'];
	
	
 
			include("../config.php");
			$con=mysqli_connect($server,$username,$password,$db);
			  
			if (mysqli_connect_errno())
			{
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			 
			$sql = "SELECT b.s_time,b.e_time,b.m_name,b.s_name,b.contact FROM booking b WHERE b.r_id = '$r_name' ;";

			 
			if ($result = mysqli_query($con, $sql))
			{
			    
				$resultArray = array();
				$tempArray = array();
			 
				while($row = mysqli_fetch_assoc($result))
				{
					$tempArray = $row;
				    array_push($resultArray, $tempArray);
				}
			    
			    $fp = fopen('../json/roomdata.json', 'w');
			    fwrite($fp, json_encode($resultArray));
			    fclose($fp);
			}
			
			echo json_encode($resultArray);
			 
			mysqli_close($con);
            header("Location: home.php#openRoomDetails");
			
	}
?>