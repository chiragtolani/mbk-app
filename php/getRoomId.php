<?php 
	$r_name=$_GET['r_name'];
	include("../config.php");
	$con=mysqli_connect($server,$username,$password,$db) or die(mysqli_error());
	$sql="select r_id from rooms where r_name like '%".$r_name."%' limit 1;";
	if($res=mysqli_query($con,$sql)){
        while($row=mysqli_fetch_assoc($res)){
			$r_id=$row['r_id'];
		}
        
    }
	else{
		echo "No room names match this query! Please enter a valid room name.";
	}
	mysqli_close($con);
	echo $r_id;

?>