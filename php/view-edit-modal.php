 <!-- Bootstrap core CSS     -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" />

    <!--  Material Dashboard CSS    -->
    <link href="../css/material-dashboard.css" rel="stylesheet" />

<link rel="stylesheet" href="../css/font-awesome.css">
<link rel="stylesheet" href="../css/jquery-ui.css">
<script type="text/javascript" charset="UTF-8" async="true" src="../js/atc.min.js"></script>
    <link href="../css/addtocalendar.css" rel="stylesheet" type="text/css">


<div class="box" style="width:100%">
          <div class="content">  
            <div class="error"></div>
              <div class="form viewBox2">
                <?php
                                    
                                
                                include("../config.php");

                                con=mysqli_connect($server,$username,$password,$db);


                                if (mysqli_connect_errno())
                                {
                                  echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                }
                                
                                $mid=$_GET['m_id'];
                                //echo $mid;
                                $sql = "SELECT b.s_id, b.s_name, b.m_name, b.guests, b.s_time, b.e_time, b.r_id, b.contact, b.email, b.m_id,r.r_name FROM booking b,rooms r where b.m_id = '$mid' AND r.r_id=b.r_id;";

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
                                    
                                    
                                    
                                    <form method="post" action="php/editbooking.php?m_id=<?php echo '' .$row['m_id']; ?>&m_name=<?php echo '' .$row['m_name']; ?>&s_name=<?php echo ''.$row['s_name'];?>&s_id=<?php  echo ''. $row['s_id']; ?>&date=<?php echo '' . substr($row['s_time'],0,10);?>&start=<?php echo '' .$s_time; ?>&end=<?php echo '' .$e_time; ?>&nog=<?php echo '' .$row['guests']; ?>&room=<?php echo '' .$row['r_id']?>&cont=<?php echo '' .$row['contact']; ?>&email=<?php  echo '' .$row['email']; ?>" accept-charset="UTF-8">
                                    <div class="row">
                                    <div class="col-md-4">
                                    <label class="text-danger">Meeting ID:</label><input type="number" class="form-control view" id="mid" placeholder="Meeting ID" name="m_id"  value="<?php echo '' .$row['m_id']; ?>" required readonly>
                                    </div>
                                    <div class="col-md-4">
                                    <label class="text-danger">Meeting Name:</label><input type="text" class="form-control view" placeholder="Meeting Name" id="m_name"  value="<?php echo '' .$row['m_name']; ?>" name="m_name" readonly required>
                                    </div>
                                    <div class="col-md-4">
                                    <label class="text-danger">Staff ID:</label><input type="text" class="form-control view" placeholder="Staff Name" name="s_name" id="s_name" value="<?php echo ''.$row['s_name'];?>" readonly required>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-4">
                                    <label class="text-danger">Staff Name:</label><input type="text" class="form-control view" placeholder="Staff ID" name="s_id" id="s_id" value="<?php  echo ''. $row['s_id']; ?>" required readonly>
                                    </div>
                                    <div class="col-md-4">
                                    <label class="text-danger">Date:</label><input type="text" class="form-control view" placeholder="Date" id='edit-date' name="date" value="<?php echo '' . substr($row['s_time'],0,10);?>" required readonly>
                                    </div>
                                    </div>
                                    <script type="text/javascript">
                                        flatpickr("#edit-date", {enableTime: false, minDate: "today",weekNumbers: true,});
                                    </script>
                                    <div class="row">
                                    <div class="col-md-4">
                                    <label class="text-danger">Start Time:</label><input type='text' class="form-control view" readonly placeholder="Start Time" id='edit-stime' value="<?php echo '' .$s_time; ?>" name="s_time" required />
                                    </div>
                                    <script type="text/javascript">
                                    flatpickr("#edit-stime",{enableTime: true,
                                noCalendar: true,

                                enableSeconds: false, // disabled by default

                                time_24hr: false, // AM/PM time picker is used by default

                                // default format
                                dateFormat: "H:i", 

                                // initial values for time. don't use these to preload a date
                                defaultHour: 12,
                                defaultMinute: 0

                                // Preload time with defaultDate instead:
                                // defaultDate: "3:30"})
                                                     });
                      </script>
                                   <div class="col-md-4">           
                                    <label class="text-danger">End Time:</label><input type='text' class="form-control view" placeholder="End Time" id='edit-etime' value="<?php echo '' .$e_time; ?>" name="e_time" required  readonly/>
                                    </div>
                                    
                                    <script type="text/javascript">
                       flatpickr("#edit-etime",{enableTime: true,
                                noCalendar: true,

                                enableSeconds: false, // disabled by default

                                time_24hr: false, // AM/PM time picker is used by default

                                // default format
                                dateFormat: "H:i", 

                                // initial values for time. don't use these to preload a date
                                defaultHour: 12,
                                defaultMinute: 0

                                // Preload time with defaultDate instead:
                                // defaultDate: "3:30"})
                                                     });
                      </script>  
                                   <div class="col-md-4">          
                                    <label class="text-danger">Number Of Guests:</label><input type="number" class="form-control view" placeholder="Number of Guests" id="nog" value="<?php echo '' .$row['guests']; ?>" value="<?php echo '' .$row['guests']?>" readonly name="guests" required>
                                    </div>
                                    </div>
                                    <div class="row" style="position:relative">
                                    <div class="col-md-4"> 
                                    <label class="text-danger">Room No:</label><input type="number" class="form-control view" placeholder="Room" id="room" value="<?php echo '' .$row['r_id']; ?>" value="<?php echo '' .$row['r_id']?>" name="r_id" required readonly>
                                    </div>
                                    <div class="col-md-4">
                                    <label class="text-danger">Contact:</label><input type="number" class="form-control view" placeholder="Contact" name="contact" id="contact"  value="<?php echo '' .$row['contact']; ?>" required readonly>
                                    </div>
                                    <div class="col-md-4">
                                    <label class="text-danger">Email:</label><input id="email" class="form-control view" type="text" placeholder="Email" id="email" name="email" value="<?php  echo '' .$row['email']; ?>"  readonly>
                                    </div>
                                    </div>
                                    <input class="btn btn-danger" style="float:right; " id='edit-button' type="button" value="Edit meeting" onclick="edit()">
                                    
                                    <input class="btn btn-danger" id='edit-button' type="button" value="Delete meeting" onclick="delete_booking()">
                                    <span class="addtocalendar atc-style-red" style="text-align:center;display:inline-block;margin-left:50px;width:25%;">
                                            <!--<var class="atc_event">
                                               <var class="atc_date_start"><?php echo $row['s_time']; ?></var>
                                               <var class="atc_date_end"><?php echo $row['e_time']; ?></var>
                                               <var class="atc_timezone">Asia/Dubai</var>
                                               <var class="atc_title"><?php echo $row['m_name']; ?></var>
                                               <var class="atc_description">None</var>
                                               <var class="atc_location"><?php echo $row['r_name']; ?></var>
                                               <var class="atc_organizer"><?php echo $row['s_name']; ?></var>
                                               <var class="atc_organizer_email"><?php echo $row['email']; ?></var>
                                            </var>-->
                                                                    
                                     </span>
                                    </form>
                                      
                                       <?php 
                                                                }//for the while loop

                                                             } // for the if condition

                                                         mysqli_close($con); 

                                                    ?>
        
     
            </div>
          </div>
        </div>