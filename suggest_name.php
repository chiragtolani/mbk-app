<?php

include("config.php");
$mysqli = new MySQLi($server,$username,$password,$db);

/* Connect to database and set charset to UTF-8 */
if($mysqli->connect_error) {
  echo 'Database connection failed...' . 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
  exit;
} else {
  $mysqli->set_charset('utf8');
}
/* retrieve the search term that autocomplete sends */
$term = trim(strip_tags($_GET['term'])); 
$a_json = array();
$a_json_row = array();
if ($data = $mysqli->query("SELECT * FROM user_profile WHERE name LIKE '%$term%' ")) {
	while($row = mysqli_fetch_array($data)) {
		$name = htmlentities(stripslashes($row['name']));
		$email = htmlentities(stripslashes($row['email']));
		//$code = htmlentities(stripslashes($row['customercode']));
		$a_json_row["id"] = $name;
		$a_json_row["value"] = $email;
		$a_json_row["label"] = $name;
		array_push($a_json, $a_json_row);
	}
}
// jQuery wants JSON data
echo json_encode($a_json);
flush();

$mysqli->close();
?>