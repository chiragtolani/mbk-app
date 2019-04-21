<?php
session_start(); 
    if(!isset($_SESSION['Login']))
    {
        header('Location: ../index.php');
    }
    else
    {

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

        include("../config.php");
	$con=mysqli_connect($server,$username,$password,$db);
	
	        $m_id=$_REQUEST["m_id"];    
			$meeting_name=$_REQUEST["m_name"];
			$emp_name=$_REQUEST["s_name"];
            $staff_no=intval($_REQUEST["s_id"]);
            $date=$_REQUEST["date"];
			$time_s=$_REQUEST["start"];
			$time_e=$_REQUEST["end"];
			$nog=intval($_REQUEST["nog"]);
			$cont=intval($_REQUEST["cont"]);
			
			$ms=$date.' '.$time_s;
            $me=$date.' '.$time_e;
            echo $time_s;
            //SQL query changes when primary key changes

                        $datetime = date_create($ms);
                                    $date = date_format($datetime,"Y-m-d");
                                    $s_time = date_format($datetime,"Y-m-d H:i:s");
                                    $datetime = date_create($me);
                                    $e_time = date_format($datetime,"Y-m-d H:i:s");

			$sql="UPDATE booking SET s_name='$emp_name', m_name='$meeting_name', date='$date', guests=$nog, s_time='$s_time', e_time='$e_time', contact='$cont' WHERE m_id = '$m_id';";
    

 if($result=mysqli_query($con,$sql)) 
 { 
     echo "Booking successfully edited!"; 
    //header('Location:book_log.php?m_id='.$m_id.'&type=edit'); 
     echo "<script>
				alert('Booking Edited Successfully!');
				window.location.href='book_log.php?m_id=$m_id&type=edit';
		</script>";
 }	
	mysqli_close($con);
    }
?>
