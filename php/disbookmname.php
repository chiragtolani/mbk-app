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
    <head>
    </head>
    <body>
    <?php

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
                                
                                $name=$_GET['m_name'];
                                
                                
                                

                                $sql = "SELECT s_id, s_name, m_name, guests, s_time, e_time, contact, email FROM booking WHERE m_name = '$name';";


                                if ($result = mysqli_query($con, $sql))
                                {

                                    $resultArray = array();
                                    $tempArray = array();
                                   
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                        $tempArray = $row;
                                        array_push($resultArray, $tempArray);

                                        $datetime = date_create($row['s_time']);
                                        $date = date_format($datetime,"Y-m-d");
                                        $s_time = date_format($datetime,"H:i:s");
                                        $datetime = date_create($row['e_time']);
                                        $e_time = date_format($datetime,"H:i:s");
                                        ?>

                                    <div class="text-form">Meeting Name<input class="text-field editable" type="text" name="m_name" value="<?php echo '' .$row['m_name']; ?>" readonly required><br></div>
                                    <div class="text-form ">Staff Name<input class="text-field editable" type="text" name="s_no" value="<?php echo ''.$row['s_name'];?>" readonly required><br></div>
                                    <div class="text-form">Staff Number<input class="text-field editable" type="text" name="s_id" value="<?php  echo ''. $row['s_id']; ?>" readonly required><br></div>
                                    <div class="text-form date-form">Date<input class="text-field editable" type="date" name="date" value="<?php echo '' . $date;?>" readonly required><br></div>
                                    <div class="text-form">Start Time<input class="text-field editable" type="time" name="start" value="<?php echo '' .$s_time; ?>" readonly required><br></div>
                                    <div class="text-form">End Time<input class="text-field editable" type="time" name="end" value="<?php echo '' .$e_time; ?>" readonly required><br></div>
                                    <div class="text-form">No.of Attendees<input class="text-field editable" type="text" name="guests" value="<?php echo '' .$row['guests']; ?>" readonly><br></div>
                                    <!---<div class="text-form">Room Name<input class="text-field editable" type="text" name="r_no" readonly><br></div>--->
                                    <div class="text-form">Contact Number<input class="text-field editable" type="text" name="id" value="<?php      echo '' .$row['email']; ?>" readonly required></div>
                                    <div class="text-form">Email<input class="text-field editable" type="text" name="id" value="<?php  echo '' .$row['contact']; ?>" readonly required></div>
                                    <br>
                                    <!--ON CLICKING SUBMIT, AN UPDATE SQL QUERY MUST RUN-->
                                    <div class="form-sub"><button class="form-submit edit-submit" type="submit" style="display:none;" action="php/editbooking.php?m_name=<?php echo $row['m_name']; ?>"/>Submit</div>
                           
                        



                        <form>
                            <a href="#" class="button1" style="" action="php/editbooking.php">Edit Meeting</a>
                            <a href="index.php" onclick="return confirm('Are you sure?')" class="button2" action="php/deletebooking.php">Delete Meeting</a>

                        </form>
        
                                    <?php 
                                }//for the while loop
                                header("Content-type: application/json");
                                $fp = fopen('../json/bookingmeeting.json', 'w');
                                fwrite($fp, json_encode($resultArray));
                                fclose($fp);
                            } // for the if condition

                            mysqli_close($con);

                         ?>
        
    </body>


</html>
<?php } ?>