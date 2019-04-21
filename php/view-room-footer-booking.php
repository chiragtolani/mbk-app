<?php
 session_start();
    if(!isset($_SESSION['Login']))
    {
        header('Location: ../index.php');
    }
    else
    {
        include("../config.php");
    $connect=mysqli_connect($server,$username,$password,$db);
    
    $start = mysqli_real_escape_string($connect,$_GET['s_time']);
    $room = mysqli_real_escape_string($connect,$_GET['r_id']);
    $sql = "SELECT m_id FROM booking WHERE s_time='".$start."' AND r_id='".$room."' limit 1;";

        if($result=mysqli_query($connect,$sql))
        {
            
            while($row=mysqli_fetch_assoc($result))
                {
                    $meeting_id=$row['m_id'];   
                }
                      
        }
        mysqli_close($connect);
    header('Location: ../home.php?m_id='.$meeting_id); 
    }
?>

