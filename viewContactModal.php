<?php
        
$g = $_GET['g_id'];
     
$include("config.php");

$con=mysqli_connect($server,$username,$password,$db);
                        
$sql = "SELECT c.g_id as GroupID,c.u_id as UserID,u.* FROM contact_groups c,groups g,user_profile u WHERE c.g_id=".$g." AND c.u_id=u.u_id and g.g_id = c.g_id;";
$resultArray = array();

if($result=mysqli_query($con,$sql))
    {
    
        while($row=mysqli_fetch_assoc($result))
        {
            $uid = $row['u_id'];
            $name = $row['name'];
            
            //$resultArray[] = array('u_id'=>$uid,'name'=>$name);
            $resultArray[] = $row;
            
        }                                             
    }                          
                            
mysqli_close($con); 

echo json_encode($resultArray);
?>
                                             