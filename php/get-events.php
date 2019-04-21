<?php

//--------------------------------------------------------------------------------------------------
// This script reads event data from a JSON file and outputs those events which are within the range
// supplied by the "start" and "end" GET parameters.
//
// An optional "timezone" GET parameter will force all ISO8601 date stings to a given timezone.
//
// Requires PHP 5.2.0 or higher.
//--------------------------------------------------------------------------------------------------

require 'utils.php';

$s = $_GET['start'];
$e = $_GET['end'];
include("../config.php");
$con=mysqli_connect($server,$username,$password,$db);

// Require our Event class and datetime utilities


        
// Short-circuit if the client did not give us a date range.
if (!isset($s) || !isset($e)) {
	die("Please provide a date range.");
}


// Parse the start/end parameters.
// These are assumed to be ISO8601 strings with no time nor timezone, like "2013-12-29".
// Since no timezone will be present, they will parsed as UTC.
$range_start = parseDateTime($s);
$range_end = parseDateTime($e);

// Parse the timezone parameter if it is present.
//$timezone = null;
if (isset($_GET['timezone'])) {
	$timezone = new DateTimeZone($_GET['timezone']);
}
else {$timezone = null;}

// Read and parse our events JSON file into an array of event data arrays.
$sql = "SELECT * FROM booking;";

 
if($result = mysqli_query($connect,$sql))
{
	while($row = mysqli_fetch_assoc($result))
	{
		$title = $row['m_name'];
        $start = $row['s_time'];
        $end = $row['e_time'];
        $m_id=$row['m_id'];
        
        $modified_array[]=array('m_id'=>$m_id,'title'=>$title,'start'=>$start,'end'=>$end);
	}
    
    $result_array=$modified_array;
    $fp = fopen('../json/events.json', 'w');
    fwrite($fp, json_encode($result_array));
    fclose($fp);
    $json = file_get_contents('../json/events.json');
    $input_arrays = json_decode($json, true);

// Accumulate an output array of event data arrays.
$output_arrays = array();
foreach ($input_arrays as $array) {

	// Convert the input array into a useful Event object
	$event = new Event($array, $timezone);

	// If the event is in-bounds, add it to the output
	if ($event->isWithinDayRange($range_start, $range_end)) {
		$output_arrays[] = $event->toArray();
	}
}

}
        mysqli_close($connect);
// Send JSON to the client.
echo json_encode($output_arrays);

?>