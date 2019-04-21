<?php 
	include("../config.php");
	date_default_timezone_set('Asia/Dubai');
	$con=mysqli_connect($server,$username,$password,$db) or die(mysqli_error());
	$r_id=mysqli_real_escape_string($con,$_GET['r_id']);
	$sql="select status from rooms where r_id = ".$r_id.";";
	if($res=mysqli_query($con,$sql)){
		while($row=mysqli_fetch_assoc($res)){
			$status=$row['status'];
			if($status==1){
				$status=0;
				$sql1="select * from booking where r_id = ".$r_id." and date='".date('Y-m-d')."';";
				if($res1=mysqli_query($con,$sql1)){
					while($row=mysqli_fetch_assoc($res1)){
						
						if((date('Y-m-d H:i:s')>=date('Y-m-d H:i:s',strtotime($row['s_time']))) && (date('Y-m-d H:i:s')<=date('Y-m-d H:i:s', strtotime($row['e_time'])))){
							$sql2="update booking set status=0 where m_id=".$row['m_id'].";";
							if(!mysqli_query($con,$sql2)){
								echo "status toggling failed";
							}
						}
					}
				}
			}
			else{
				$status=1;
			}
		}
	}
	$sql="update rooms set status=".$status." where r_id=".$r_id.";";
	if(!mysqli_query($con,$sql)){
		echo "0";
	}
	else{
		echo $status;
	}
		mysqli_close($con);
?>