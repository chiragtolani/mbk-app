<?php 
session_start();     
    if(!isset($_SESSION['Login']))
    {
        header('Location: ../index.php');
    }
    else
    {
        include("../config.php");

    $r_name=$_GET['r_name'];                                   //Get the name of the room from the passed url 
    $r_id=$_GET['r_id'];                                       //Get the id of the room 
    $capacity=$_GET['capacity'];                               //get the capacity of the room
    $con=mysqli_connect($server,$username,$password,$db) or die(mysqli_error());    //Connect to the database
    $sql="insert into rooms values('".$r_name."',".$r_id.",".$capacity.");"; //SQL query to insert into the rooms table.
    //echo $sql;
    //echo $r_name,$r_id,$capacity; //For debugging purposes
    if(mysqli_query($con,$sql)){
        echo "<script>
            alert('Room added successfully');
        </script>";
        
    }
    else{
        echo "Room could not be added. Please try again later.";
    }
    mysqli_close($con);

header("Location:home.php");
} 
?>