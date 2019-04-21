<?php

session_start();     
    if(!isset($_SESSION['Login']))
    {
        header('Location: ../index.php');
    }
    else
    {

    include("../config.php");
     
    $gid = intval($_GET['g_id']);

    $user = $_GET['contact'];
        
    $uid="";
    $con=mysqli_connect($server,$username,$password,$db);

    $sql1 = "SELECT u_id FROM user_profile WHERE name='".$user."';";
    
    if($result=mysqli_query($con,$sql1))
    {
        while($row=mysqli_fetch_assoc($result))
        {
            $uid = $row['u_id'];
        }
    }
    $sql2 = "INSERT INTO `contact_groups`(`g_id`,`u_id`) VALUES(".$gid.",".$uid.");";
       
    if($result2=mysqli_query($con,$sql2))
    {
    header('Location: ../user-profile.php');
    }
        

    mysqli_close($con);
    }
?>