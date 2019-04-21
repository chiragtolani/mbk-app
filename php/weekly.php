<?php
	 use SimpleExcel\SimpleExcel;
	 
 session_start();
	if(!isset($_SESSION['Login']))
    {
        header('Location: ../index.php');
    } 
    else
    {    
 
		  require_once '../vendor/autoload.php';
		
		 include("../config.php");
		$con=mysqli_connect($server,$username,$password,$db);
		  
		if (mysqli_connect_errno())
		{
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		 
		
		$send_date=date('Y-m-d');
		$sql = "SELECT * FROM booking b,rooms r WHERE b.date BETWEEN SUBDATE('".$send_date."',INTERVAL 7 DAY) AND '".$send_date."' and b.r_id=r.r_id ORDER BY b.date ASC;";
		 
		if ($result = mysqli_query($con, $sql))
		{
		    
			$resultArray = array();
			$tempArray = array();
		 
			while($row = mysqli_fetch_assoc($result))
			{
				$tempArray = $row;
			    array_push($resultArray, $tempArray);
			}

		    
		    $fp = fopen('../json/weekly.json', 'w');
		    fwrite($fp, json_encode($resultArray));
		    fclose($fp);
		}
		
		
		 
		mysqli_close($con);
		
		$excel = new SimpleExcel('JSON');
		$excel->parser->loadFile('../json/weekly.json');                   
		
		
		$excel->convertTo('CSV');
		$date = date('W');
		$string = "Week".$date;
		$excel->writer->saveFile($string);
		header('Location: ../home.php');
		
	}
?>