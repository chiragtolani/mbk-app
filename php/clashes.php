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
    $con=mysqli_connect($server,$username,$password,$db); //Connect to the mySQL server.
    if (mysqli_connect_errno()) 
        { 
            echo "Failed to connect to MySQL: " . mysqli_connect_error(); //If unable to connect, display error.
        }
    $meeting_name=$_POST['m_name']; //Meeting Name.
    $emp_name=$_POST['s_name'];     //Employee Name.
    $time_s=$_POST['s_time'];   //Meeting Start Time
    $time_e=$_POST['e_time'];     //Meeting End Time
    $nog=intval($_POST['guests']);  //Number of guests
    $cont=intval($_POST['contact']);//Contact 
    $staff_id=intval($_POST['s_id']);//Staff Id 
    $email=$_POST['email'];         //Email
    $m_date=$_POST['date'];        //Meeting Date
    //$room=$_POST['r_id'];           //Room Number
    $ms=$m_date.' '.$time_s;         //For combining the date and time to make date time format as defined by SQL
    $me=$m_date.' '.$time_e;         //For combining the date and time to make date time format as defined by SQL 
    $avail=0;                       //For checking the availability of the room.
    $sql1="SELECT * FROM rooms;";   //Selects all the rows in the rooms table from the SQL Database
    $sql2="SELECT * FROM booking;"; //Selects all the rows in the booking table from the SQL Database
    $sql3="INSERT INTO `booking`(`m_name`, `s_name`, `s_id`, `s_time`, `e_time`, `date`, `guests`, `contact`, `email`) VALUES ('".$meeting_name."','".$emp_name."','".$staff_id."','".$ms."','".$me."','".$m_date."','".$nog."','".$cont."','".$email."');";
       
                                  //For updating the booking table on booking a meeting
  //  $sql4="UPDATE rooms SET s_id='$staff_id',avail='$avail' WHERE r_id='$room';";
                                    //For updating the rooms table in the database
    
    $dt1=date_create($ms);          //To create datetime variable which will be used to compare for timeclashing
    $ms1=date_format($dt1,"Y-m-d H:i:s");
    $dt2=date_create($me);
    $me1=date_format($dt2,"Y-m-d H:i:s");
    $from=$ms1;                     //Start meeting time
    $to=$me1;   //End meeting time
    //if($result2=mysqli_query($con,$sql2)){ //Put everything in booking table temporarily.
            $result3=mysqli_query($con,$sql3);
        //}
    //if($result1=mysqli_query($con,$sql1))//connects to rooms table
    //{
    $room_id=array();
    $capacity=array();
    $check=0;
    if($result1=mysqli_query($con,$sql1)){
        while($row=mysqli_fetch_assoc($result1)){
            $rooms[]=$row['r_id'];
            $capacity[]=$row['capacity'];
        }
    }
        
        $room_assigned=array();
        $rooms_available=array();
        if($result2=mysqli_query($con,$sql2))//connect to booking table
        {
            while($row1=mysqli_fetch_assoc($result2))//while getting results from the booking table
            {
                $from_compare = $row1['s_time'];//meeting start time from the already booked meetings
                $to_compare = $row1['e_time'];//meeting end time from already booked meetings
                
                $another_meeting=($to<=$from_compare || $from>=$to_compare);
                    
                //$another_meeting = (strcmp($from,$from_compare) && strcmp($from,$to_compare)) || 
                            //(strcmp($from_compare,$from) && strcmp($from_compare,$to));//logic is wrong, re-verify
                
                if($another_meeting==false)//if times are clashing, display
                {
                    $check=1;
                    $room_assigned[]=$row1['r_id'];
                    //echo "Timings are clashing!";
                    //break;
                }
                
            }
            //else, proceed to book the meeting
            $rooms_available=array_diff($rooms,$room_assigned);
           // echo $rooms_available,$room_assigned;
                /*if($check!=1){
                    
                        //while($row2['r_id']!=$room)
                       //{
                            $result3=mysqli_query($con,$sql3);
                            //$result4=mysqli_query($con,$sql4);
                            echo "Booking Updated Successfully!";
                            header('Location:../index.php');
                            //break;
                        //}
                    }*/
            
            ?>
        
        <form name="room_select" action="set_room_no.php?m_name=<?php echo $meeting_name ?>" method="POST" style="display:block; margin-left:auto;  margin-right:auto; border:2px solid rgb(200,0,0); border-radius:3px; padding:20px 20px 20px 20px; margin-top:100px; background-color:rgb(245,245,245); font-family:helvetica; width:350px; height:100px;">
            <label>Please select from the rooms available on the requested day.</label><br><br><br>
            <select required name="room_number" class="text-field">
            <br>
                
                <?php foreach($rooms_available as $avail){
                echo "<option style='width:300px; font-size:16px;' value='$avail'>$avail</option>";
            } ?>
            
        </select>
            <button type="submit" name="submit" style="background-color:rgb(200,0,0); border:1px solid rgb(200,0,0); border-radius:2px; color:white; float:right; margin-top:0px; height:5opx; padding:5px 5px 5px 5px; ">Submit</button>
            </form>
        
        
        <?php
            
                }
        
//    }
mysqli_close($con);//close the connection.
?>
    </body>
</html>
<?php } ?>