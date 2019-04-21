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
$meeting_name=$_GET['m_name'];
if(isset($_POST['submit'])){
        $room_selected_number=$_POST['room_number'];

                
            
            $sql_room_select="update booking set r_id='$room_selected_number' where m_name like '$meeting_name';";
            
            if(mysqli_query($con,$sql_room_select)){
                echo "Booking Successful";
                
               
                mysqli_close($con);
               header('Location:../mailtest.php?m_name='.$meeting_name); 
            }
            else{
                echo "Booking Unsucessful";
                $sql_fail="delete from booking where m_name like '$meeting_name'";
                mysqli_query($con,$sql_fail);
            }
            
                
            }


mysqli_close($con);
    }
?>



