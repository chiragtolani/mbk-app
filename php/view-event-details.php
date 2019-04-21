<?php
    include("../config.php");

    $con=mysqli_connect($server,$username,$password,$db);

    $mid = $_GET["m_id"];
    

    $sql = "SELECT r.r_name,b.m_name,b.s_name FROM booking b,rooms r WHERE r.r_id = b.r_id and b.m_id=".$mid.";";

    $result = mysqli_query($con,$sql);
    $row = $result->fetch_assoc();
    $resultarray = json_encode($row);


    mysqli_close($con);

    echo $resultarray;

?>