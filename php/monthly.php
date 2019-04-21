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
		$sql = "SELECT * FROM booking b,rooms r WHERE b.date BETWEEN SUBDATE('".$send_date."',INTERVAL 1 MONTH) AND '".$send_date."' and b.r_id=r.r_id ORDER BY b.date ASC;";
		 
		if ($result = mysqli_query($con, $sql))
		{
		    
			$resultArray = array();
			$tempArray = array();
		 
			while($row = mysqli_fetch_assoc($result))
			{
				$tempArray = $row;
			    array_push($resultArray, $tempArray);
			}

		    
		    $fp = fopen('../json/monthly.json', 'w');
		    fwrite($fp, json_encode($resultArray));
		    fclose($fp);
		}
		
		
		 
		mysqli_close($con);
		
		$excel = new SimpleExcel('JSON');
		$excel->parser->loadFile('../json/monthly.json');                   
		
		
		$excel->convertTo('CSV');
		$date = date_parse_from_format('Y/m/d',$send_date);
		$string = $date['month'];
		
		switch($string)
		{
			case "1": $string = "JAN-".$date['year'];
						break;
			case "2": $string = "FEB-".$date['year'];
						break;
			case "3": $string = "MAR-".$date['year'];
						break;
			case "4": $string = "APR-".$date['year'];
						break;
			case "5": $string = "MAY-".$date['year'];
						break;
			case "6": $string = "JUN-".$date['year'];
						break;
			case "7": $string = "JUL-".$date['year'];
						break;
			case "8": $string = "AUG-".$date['year'];
						break;
			case "9": $string = "SEP-".$date['year'];
						break;
			case "10": $string = "OCT-".$date['year'];
						break;
			case "11": $string = "NOV-".$date['year'];
						break;
			case "12": $string = "DEC-".$date['year'];
						break;
			default : $String = "example";
		}
		$excel->writer->saveFile($string);
		header('Location: ../home.php');
		
	}
?>