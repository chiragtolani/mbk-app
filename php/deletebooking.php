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
?>
<?php
include("../config.php");
 
$con=mysqli_connect($server,$username,$password,$db);
  
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$name=$_GET['m_id'];
 
$sql = "DELETE FROM booking WHERE m_id='$name';";

 
if ($result = mysqli_query($con, $sql))
{
    //echo "Booking deleted!";
    //echo "<script> </script>";
    echo "<script>
				alert('Booking Deleted Successfully!');
				window.location.href = 'book_log.php?m_id=".$name."&type=delete';
          </script>";
    //header('Location:book_log.php?m_id='.$name.'&type=delete'); 

}
 
mysqli_close($con);
    }
?>