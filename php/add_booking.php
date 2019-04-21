<!DOCTYPE html>
<?php 
    session_start();
    if(!isset($_SESSION['Login']))
    {
        header('Location: index.php');
    }
    else
    {
       
    
    ?>
<html>
  <head>
     <script src="js/jquery-1.10.2.js" type="text/javascript"></script>  
<script src="js/jquery-ui.js" type="text/javascript"></script>
<script src="js/jquery-3.1.0.min.js" type="text/javascript"></script>
  </head>
  <body>
<?php
    include("../config.php");

    if(isset($_POST["r_id"]) and $_POST['r_id']!=null){
      // When you are booking a meeting directly from the room view~
      // Add a booking from the view room modal
      $con=mysqli_connect($server,$username,$password,$db);

    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
      $meeting_name= $_POST["m_name"];
        $emp_name= $_POST["s_name"];
        $staff_id= $_POST["s_id"];
        $m_date= $_POST["date"];
        $time_s= $_POST["s_time"];
        $time_e= $_POST["e_time"];
        $nog= $_POST["guests"];
        $cont= $_POST["contact"];
        $email= $_POST["email"];
        $r_id= $_POST["r_id"];
      
      
      $meet_s=$m_date.' '.$time_s;
        $meet_e=$m_date.' '.$time_e;
        
        $ms=date_create($meet_s);
        $ms1=date_format($ms,"Y-m-d H:i:s");
        $me=date_create($meet_e);
        $me1=date_format($me,"Y-m-d H:i:s");
		$capacity=0;
	  $cap_sql="select capacity from rooms where r_id=$r_id;";
		
		if($res=mysqli_query($con,$cap_sql)){
			while($row=mysqli_fetch_assoc($res)){
				$capacity=$row['capacity'];
			}
		}
		else{
			echo "<script>";
			echo "alert('Capacity of the room could not be determined. Book at your own risk!');";
			echo "</script>";
		}
		//echo $capacity,$nog;
		if($capacity<$nog){
			echo "<script>";
			echo "alert('The number of guests exceeds the capacity of the room. Please try with a value lesser than $capacity');";
			echo "window.location.href='../home.php';";
			echo "</script>";
			//header('Location:..home.php#cap-err');
		}
        $sql_mid="select max(m_id) from booking";
        if($res=mysqli_query($con,$sql_mid)){
            while($row=mysqli_fetch_assoc($res)){
                
            }
        }
      
      $sql="INSERT INTO `booking`(`m_name`, `s_name`, `s_id`, `s_time`, `e_time`, `date`, `guests`, `contact`, `email`, `r_id`) VALUES ('".$meeting_name."','".$emp_name."','".$staff_id."','".$ms1."','".$me1."','".$m_date."','".$nog."','".$cont."','".$email."',".$r_id.") ;";
      if($capacity>$nog){
		  if(mysqli_query($con,$sql)){
              $sql_mid="select max(m_id) as m_id from booking";
                if($res=mysqli_query($con,$sql_mid)){
                    while($row=mysqli_fetch_assoc($res)){
                $m_id=$row['m_id'];       
            }
        
			header("Location:book_log.php?m_id=$m_id&type=book"); 
                }
              else{
                  header("Location:../home.php#success");
              }
		  }
		  else{
			//echo mysqli_error($con);
			header("Location:../home.php#book-fail");
		  }
	  }
      mysqli_close($con);
    }
    else{
      //when booking made from the left nav bar!
      //automatic part of it!
    $con=mysqli_connect($server,$username,$password,$db);

    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

    //if(isset($_SESSION['Login']))
    //{
        $meeting_name= $_POST["m_name"];
        $emp_name= $_POST["s_name"];
        $staff_id= $_POST["s_id"];
        $m_date= $_POST["date"];
        $time_s= $_POST["s_time"];
        $time_e= $_POST["e_time"];
        $nog= $_POST["guests"];
        $cont= $_POST["contact"];
        $email= $_POST["email"];
        
        if (isset ($_POST["telephone"])){
            $telephone=0;
        }
            else{
                $telephone=0;
            }

    
        if (isset ($_POST["tv"])){
            $tv=1;
        }
            else{
                $tv=0;
            }

        if (isset ($_POST["projector"])){
            $projector=1;
        }
            else{
                $projector=0;
            }

        if (isset ($_POST["pc"])){
            $pc=1;
        }
            else{
                $pc=0;
            }

        if (isset ($_POST["ip"])){
            $ip=1;
        }
            else{
                $ip=0;
            }

        if (isset ($_POST["dvd"])){
            $dvd=1;
        }
            else{
                $dvd=0;
            }

        if (isset ($_POST["podium"])){
            $podium=1;
        }
            else{
                $podium=0;
            }
        if (isset ($_POST["cordless"])){
            $cordless=1;
        }
            else{
                $cordless=0;
            }
        if (isset ($_POST["lap"])){
            $lap=1;
        }
            else{
                $lap=0;
            }
        if (isset ($_POST["vc"])){
            $conference=1;
        }
            else{
                $conference=0;
            }
    
    
    	//echo $tv, $cordless, $podium, $lap, $conference, $dvd, $ip, $pc, $projector;

        $meet_s=$m_date.' '.$time_s;
        $meet_e=$m_date.' '.$time_e;
        
        $ms=date_create($meet_s);
        $ms1=date_format($ms,"Y-m-d H:i:s");
        $me=date_create($meet_e);
        $me1=date_format($me,"Y-m-d H:i:s");

        //To insert the data into booking
        $sql="INSERT INTO `booking`(`m_name`, `s_name`, `s_id`, `s_time`, `e_time`, `date`, `guests`, `contact`, `email`) VALUES ('".$meeting_name."','".$emp_name."','".$staff_id."','".$ms1."','".$me1."','".$m_date."','".$nog."','".$cont."','".$email."');";
        //To get the meeting id of the newly inserted booking
        //execute one of the two sql queries as per ur convinience.
        $sql_get_id="select m_id from booking where r_id =-1 limit 1;";
        $sql_get_id2="select m_id from booking where m_name like '".$meeting_name."' and s_time like '".$time_s."' limit 1;";

         
        

          if($res=mysqli_query($con,$sql))
            {
                            //At this poin of time a meeting has been assigned into the booking table with out a room being assigned   
           
              if($res1=mysqli_query($con,$sql_get_id)){
                  while($row=mysqli_fetch_assoc($res1)){
                        
                   
                  $m_id=$row['m_id'];
                  //To find a room and assign into the booking table
                  $sql1= "update booking  set r_id = (select r_id from rooms where r_id not in (select r_id from (select * from booking) as b where (b.s_time>='".$ms1."' and b.s_time<='".$me1."') or (b.e_time >= '".$ms1."' and b.e_time <= '".$me1."') or (b.s_time<='".$ms1."' and b.e_time>='".$me1."')) and capacity>=".$nog."  and tv>=".$tv." and projector>=".$projector." and pc>=".$pc." and ip_board>=".$ip." and dvd>=".$dvd." and podium_microphone>=".$podium." and cordless_microphone>=".$cordless." and lap_microphone>=".$lap." and video_conferencing>=".$conference." order by capacity limit 1) where m_id = ".$m_id.";";
                  //  echo $sql1;
                  }
                    if (mysqli_query($con,$sql1))                     //automatic room allotment sql query
                       {
                     // echo "I have reached here";
						
                  //If this query executes a room has been successfully allotted.
                  //Display a popup showing room id and meeting id and time and return to home.php
						
                      
							$room_id=NULL;
                        $r_name=NULL;
                      //echo "i have reached here";
                        $sql_get_rid="select b.r_id as r_id,r.r_name as r_name from booking b,rooms r where b.m_id=".$m_id." and b.r_id=r.r_id limit 1;";
							  if($res3=mysqli_query($con,$sql_get_rid)){
								while($row=mysqli_fetch_assoc($res3)){
								  $room_id=$row['r_id'];
                                    $r_name=$row['r_name'];
									//echo $room_id;
											}
                                 // echo $room_id;
								  if($room_id!=-1 or $room_id!=null){
									  		echo "<script>
												alert('Booking Successful! Your assigned Room Name is $r_name');
												window.location.href='book_log.php?m_id=$m_id&type=book';
											</script>";
								  			//header("Location:book_log.php?m_id=$m_id&type=book");
										}
							  }
						else{
								$sql_fail="delete from booking where r_id is null or r_id=-1;";
									if(mysqli_query($con,$sql_fail)){
										echo "<script>
												alert('Booking Unsuccessful! One or more of your requirements have not been met.');
												window.location.href='../home.php';
											</script>";
									//header("Location:../home.php#fail");

									}
                     }
                      //echo "<script type='text/javascript'>
                        //  alert('Booking Successfully Updated'+'\n\n'+'Meeting Name : $meeting_name'+'\n'+'Meeting ID : $m_id'+'\n'+'Start Time : ".substr($time_s,11,5)."'+'\n'+'Room Number : $room_id');
                      //</script>";
                      //header("Location:../home.php#success");
							
              			}
              else{
				  $sql_fail="delete from booking where r_id is null or r_id=-1;";
									if(mysqli_query($con,$sql_fail)){
										echo "<script>
												alert('Booking Unsuccessful! One or more of your requirements have not been met.');
												window.location.href='../home.php';
											</script>";
									//header("Location:../home.php#fail");

									}
                //If this block is getting executed, that means our script was not able to find an empty room.
                //Delete the booking which was inserted into booking where r_id value=null or by m_id
                echo " ".mysqli_error($con);
                //show a popup of failure and return to home.php
                              }
              }
            }
            else {
              //Some serious error occured. check
                echo " ".mysqli_error($con);
            }
                    
                   mysqli_close($con);
    }
    
?>

  </body>
  </html>
<?php } ?>