<?php
 session_start();
    if(!isset($_SESSION['Login']))
    {
        header('Location: ../index.php');
    }
    else
    {
?>
<!DOCTYPE html>
<html>
    <body>
        <?php

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
        <?php

    include("../config.php");

$con=mysqli_connect($server,$username,$password,$db);


    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

    //if(isset($_SESSION['Login']))
    //{
        $meeting_name= mysqli_real_escape_string($con,$_REQUEST["m_name"]);
        $emp_name= mysqli_real_escape_string($con,$_REQUEST["s_name"]);
        $time_e= mysqli_real_escape_string($con,$_REQUEST["e_time"]);
        $time_s= mysqli_real_escape_string($con,$_REQUEST["s_time"]);
        $nog= mysqli_real_escape_string($con,$_REQUEST["guests"]);
        $cont= mysqli_real_escape_string($con,$_REQUEST["contact"]);
        $email= mysqli_real_escape_string($con,$_REQUEST["email"]);
        $m_date= mysqli_real_escape_string($con,$_REQUEST["date"]);
        $staff_id= mysqli_real_escape_string($con,$_REQUEST["s_id"]);
        //$pyscript='D:\\wamp64\\www\\Meeting_Scheduler\\python\\test.py';
        //$python='C:\\Python34\\python.exe';
        //exec("../python/test.py $meeting_name $emp_name $time_s $time_e $nog $cont $m_date $staff_id");

        $meet_s=$m_date.' '.$time_s;
        $meet_e=$m_date.' '.$time_e;
        
        $ms=date_create($meet_s);
        $ms1=date_format($ms,"Y-m-d H:i:s");
        $me=date_create($meet_e);
        $me1=date_format($me,"Y-m-d H:i:s");


        $sql="INSERT INTO `booking`(`m_name`, `s_name`, `s_id`, `s_time`, `e_time`, `date`, `guests`, `contact`, `email`) VALUES ('".$meeting_name."','".$emp_name."','".$staff_id."','".$ms1."','".$me1."','".$m_date."','".$nog."','".$cont."','".$email."');";
        

          if($res=mysqli_query($con,$sql))
            {
                    
                    echo "<script>
                            $(document).ready({
                                
                            
                            });
                    
                    </script>";
                    
                   header('Location:../index.php'); 
              
                 
            }
            else {
                echo "Meeting already exists! change the meeting name and try again!";
            }
                    
                   mysqli_close($con);

    
         
          
?>
    </body>
</html>
<?php } ?>