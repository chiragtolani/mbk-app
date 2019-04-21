<?php
session_start();     
    if(!isset($_SESSION['Login']))
    {
        header('Location: ../index.php');
    }
else
{
    include("../config.php");
    $g_name=$_POST["g_name"];
    $user=$_SESSION['Login'];
   
    
    $con=mysqli_connect($server,$username,$password,$db);
    
    $sql1 = "SELECT u_id,name FROM user_profile WHERE username='".$user."';";
    
    $result1 = mysqli_query($con,$sql1);
    $row = mysqli_fetch_assoc($result1);
    $name = $row['name'];
    $uid = $row['u_id'];
        
    $sql2 = "INSERT INTO groups (g_name,g_created_by,u_id) VALUES('".$g_name."','".$name."','".$uid."');";
    
   if($result2=mysqli_query($con,$sql2))
    {
        header('Location: ../user-profile.php');
    }
}

mysqli_close($con);
?>