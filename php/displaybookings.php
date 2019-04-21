<?php
session_start();     
if(!isset($_SESSION['Login']))
    {
        header('Location: ../index.php');
    }
    else
    {
        include("../config.php");
 
$con=mysqli_connect($server,$username,$password,$db);
  
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
 
$sql = "SELECT * FROM booking b,rooms r WHERE b.s_id=r.s_id;";

 
if ($result = mysqli_query($con, $sql))
{
    
	$resultArray = array();
	$tempArray = array();
 
	while($row = mysqli_fetch_assoc($result))
	{
		$tempArray = $row;
	    array_push($resultArray, $tempArray);
	}
	header("Content-type: application/json");
    
    $fp = fopen('../json/alldata.json', 'w');
    fwrite($fp, json_encode($resultArray));
    fclose($fp);
}

echo json_encode($resultArray);
 
mysqli_close($con);
    }
?>