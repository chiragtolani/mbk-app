<?php 
		include("../config.php");
		date_default_timezone_set('Asia/Dubai');
		$data=array();
		$con=mysqli_connect($server,$username,$password,$db) or die(mysqli_error());
		$sql="select r_id,status from rooms;";
		if($res=mysqli_query($con,$sql)){
			while($row=mysqli_fetch_assoc($res)){
				$r_id=$row['r_id'];
				//echo " |\/| ".$r_id." : ";
				$sql="select * from booking where r_id = ".$r_id." and date='".date('Y-m-d')."' and status=1;";
				$status=$row['status'];
				if($res1=mysqli_query($con,$sql)){
					while($row=mysqli_fetch_assoc($res1)){
						//echo " ".$row['m_id'];
						//echo date('Y-m-d H:i:s');
						if((date('Y-m-d H:i:s')>=date('Y-m-d H:i:s',strtotime($row['s_time']))) && (date('Y-m-d H:i:s')<=date('Y-m-d H:i:s', strtotime($row['e_time'])))){
							$sql1="update rooms set status=1 where r_id=".$r_id.";";
							if(!mysqli_query($con,$sql1)){
								echo " ".mysqli_error($con);
							}
							else{
								//echo "setting status = 1  room : ".$r_id." break ||| ";
								$status=1;
								break;
							}
						
						}
						else if((date('Y-m-d H:i:s')>=date('Y-m-d H:i:s',strtotime($row['e_time']))) && (date('Y-m-d H:i:s')<=date('Y-m-d H:i:s', strtotime('+15 seconds',strtotime($row['e_time']))))){
							echo "".strtotime('+15 seconds',strtotime($row['e_time']));
							$sql1="update rooms set status=0 where r_id=".$r_id.";";
							if(!mysqli_query($con,$sql1)){
								echo "line 28: ".mysqli_error($con);
							}
							else{
								//echo "setting status = 0 for r_id ".$r_id.". |||";
							}
						}	
					}
				}
				$data[]= array('r_id'=>$r_id,'status'=>$status);
			}
		}
		else{
				echo "No room names match this query! Please enter a valid room name.";
			}
		mysqli_close($con);
//var_dump($data);
echo json_encode($data);
?>