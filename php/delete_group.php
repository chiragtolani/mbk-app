<?php
 session_start();     
    if(!isset($_SESSION['Login']))
    {
        header('Location: ../index.php');
    }
    else
    {
     include("../config.php");   
    $g_id = $_GET['g_id'];
    $g_name = $_GET['g_name'];

    $user = $_SESSION['Login'];
    $con=mysqli_connect($server,$username,$password,$db);

    $sql = "DELETE FROM groups WHERE g_id=".$g_id.";";

    if($result=mysqli_query($con,$sql))
    {
        header('Location: ../user-profile.php');
    }

    mysqli_close($con);
    }
?>