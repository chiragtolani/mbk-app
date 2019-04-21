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
 

$send_date=date('Y/m/d');
$sql = "SELECT * FROM booking b,rooms r WHERE b.date = '".$send_date."' and b.r_id=r.r_id ORDER BY b.date ASC;";
 
if ($result = mysqli_query($con, $sql))
{
    
	$resultArray = array();
	$tempArray = array();
 
	while($row = mysqli_fetch_assoc($result))
	{
		$tempArray = $row;
	    array_push($resultArray, $tempArray);
	}
	//header("Content-type: application/json");
    
    $fp = fopen('../json/daily.json', 'w');
    fwrite($fp, json_encode($resultArray));
    fclose($fp);
}


 
mysqli_close($con);

$excel = new SimpleExcel('JSON');
$excel->parser->loadFile('../json/daily.json');                   


$excel->convertTo('CSV');

$excel->writer->saveFile($send_date);
header('Location: ../home.php');

    }
?>