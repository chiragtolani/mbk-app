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


    		$sql = "SELECT b.m_id,b.r_id,b.m_name,b.s_time,b.e_time,r.r_name,b.s_name FROM booking b,rooms r WHERE b.r_id=r.r_id;";

        if ($result = mysqli_query($con, $sql))
		{
		    
			$resultArray = array();
			$tempArray = array();
		 
			while($row = mysqli_fetch_assoc($result))
			{
					$id = $row['m_id'];
					$group = $row['r_id'];
					$name = $row['m_name'];
                    $emp = $row['s_name'];
                    $start = date_create($row['s_time']);
                    $end = date_create($row['e_time']);
                    $room = $row['r_name'];
                    $s = date_format($start,'H:i:s');
                    $e = date_format($end,'H:i:s');
                    $string = "<b>Meeting Name: </b>".$name."<br><b>Booked By: </b>".$emp."<br><b>Room Name: </b>".$room."<br><b>Timings: </b>".$s."-".$e;
                    
                    $resultArray[]=array('id'=>$id,'group'=>$group,'content'=>$name,'start'=>$row['s_time'],'end'=>$row['e_time'],'title'=>$string);	
			}

		    
		    $fp = fopen('../json/vis.json', 'w');
		    fwrite($fp, json_encode($resultArray));
		    fclose($fp);
            return;
            //header("Location:../home.php");
		}



mysqli_close($con);

    }

?>