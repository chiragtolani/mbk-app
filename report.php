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
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Reports</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!--  Material Dashboard CSS    -->
    <link href="css/material-dashboard.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="fonts/font-awesome.min.css" rel="stylesheet">
    <link href='css/icons.css' rel='stylesheet' type='text/css'>
    <style>
        #title {
            margin: 17px 5px 10px 5px;
            font-size: 35px;
            color: black;
        }
        
        #menu {
            margin-left: 470px;
            margin-top: 50px;
        }
        
        .atv,
        .str {
            color: #05AE0E;
        }
        
        .tag,
        .pln,
        .kwd {
            color: #3472F7;
        }
        
        .atn {
            color: #2C93FF;
        }
        
        .pln {
            color: #333;
        }
        
        .com {
            color: #999;
        }
        
        .space-top {
            margin-top: 50px;
        }
        
        .area-line {
            border: 1px solid #999;
            border-left: 0;
            border-right: 0;
            color: #666;
            display: block;
            margin-top: 20px;
            padding: 8px 0;
            text-align: center;
        }
        
        .area-line a {
            color: #666;
        }
        
        .container-fluid {
            padding-right: 15px;
            padding-left: 15px;
        }
    </style>
    <!--   Core JS Files   -->
<script src="js/jquery-3.1.0.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/material.min.js" type="text/javascript"></script>


<!--  Notifications Plugin    -->
<script src="js/bootstrap-notify.js"></script>


<!-- Material Dashboard javascript methods -->
<script src="js/material-dashboard.js"></script>
</head>

<body>
    

  
        

    <div class="wrapper">
           <?php include('header2.php'); ?> 
          <div class="sidebar" data-color="red" data-background="blue" style="position:fixed;">
			<!--
		        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

		        Tip 2: you can also add an image using data-image tag
		    -->
	    	<div class="sidebar-wrapper">
				<ul class="nav">
                    <br>
                    <br>
	                <li>
	                    <a id="exportExcel" style="margin-top:50%;">
	                        <i class="material-icons">file_upload</i>
                          <script>
                            $('#exportExcel').click(function(){
                              if($('#daily').hasClass('active')){
                                window.location.href="php/daily.php";
                              }
                              else if($('#weekly').hasClass('active')){
                                window.location.href="php/weekly.php";
                              }
                              else if($('#monthly').hasClass('active')){
                                window.location.href="php/monthly.php";
                              }
                            });
                          </script>
	                        <p>Export to Excel</p>
	                    </a>
	                </li>
                    <li>
	                    <a href="#">
	                        <i class="material-icons">print</i>
	                        <p>Print</p>
	                    </a>
	                </li>
                     <li>
	                    <a href="user-profile.php">
	                        <i class="material-icons">person</i>
	                        <p>User Profile</p>
	                    </a>
	                </li>
	               
	              
	                <li>
	                    <a href="settings.php">
	                        <i class="material-icons">settings</i>
	                        <p>Settings</p>
	                    </a>
	                </li>
                    
	           </ul>
	    	</div>
		</div>
        
    <div class="main-panel">
              <div class="content">
                <p id="date" style="color:black; margin-top:70px; font-size:30px; font-family:helvetica;">
                    <script type="text/javascript">
                        var m_names = ["January", "February", "March",
                            "April", "May", "June", "July", "August", "September",
                            "October", "November", "December"
                        ];

                        var d_names = ["Sunday", "Monday", "Tuesday", "Wednesday",
                            "Thursday", "Friday", "Saturday"
                        ];

                        var myDate = new Date();
                        var temp = myDate;
                        temp.setDate(myDate.getDate() );
                        var curr_date = myDate.getDate();
                        var curr_month = myDate.getMonth();
                        var curr_day = myDate.getDay();
                        document.write(d_names[curr_day] + "," + m_names[curr_month] + " " + curr_date);

                    </script>
                </p>
                <div class="container-fluid">
                    <div class="row" style="margin-top:2%;">
                        <div class="col-lg-12 col-md-18s ">
                            <div class="card card-nav-tabs">
                                <div class="card-header" data-background-color="red">
                                    <div class="nav-tabs-navigation">
                                        <div class="nav-tabs-wrapper">
                                            <span class="nav-tabs-title"><h4>REPORT</h4><nbsp></nbsp></span>
                                                <ul class="nav nav-tabs" data-tabs="tabs" >
                                                    <li class="" style="float:right;">
                                                        <a href="#monthly" data-toggle="tab">
                                                            <i class="material-icons">view_comfy</i> Monthly
                                                            <div class="ripple-container"></div>
                                                        </a>
                                                    </li>
                                                    <li class="" style="float:right;">
                                                        <a href="#weekly" data-toggle="tab">
                                                            <i class="material-icons">view_week</i> Weekly
                                                            <div class="ripple-container"></div>
                                                        </a>
                                                    </li>
                                                    
                                                  <li class="active" style="float:right;">
                                                        <a href="#daily" data-toggle="tab">
                                                            <i class="material-icons">today</i> Daily
                                                            <div class="ripple-container"></div>
                                                        </a>
                                                    </li>
                                        </ul>
                                        </div>
                                    </div>
                                </div>
                                    <div class="card-content" > 
                                    <div class="tab-content" style="overflow:scroll; max-height:350px;">
                                        <div class="tab-pane active" id="daily">
                                             <div class="card-content table-responsive"   >
                                    <table class="table">
                                        <thead class="text-warning">
                                            <th>Meeting Name</th>
                                            <th>Booked By</th>
                                            <th>Date</th>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                            <th>Room Number</th>  
                                            <th>Attendees</th>  
                                            <th>Email</th>
                                            <th>Contact</th>
                                         </thead>
                                        <tbody>
                                            <?php 
                                                include("config.php");

                                                $con=mysqli_connect($server,$username,$password,$db);

                                                $sql = "SELECT * FROM booking b,rooms r WHERE b.date = '".date('Y-m-d')."' and b.r_id=r.r_id ORDER BY b.date ASC;";
                                                
                                                if($result=mysqli_query($con,$sql))
                                                {
                                                    while($row = mysqli_fetch_assoc($result))
                                                    {
                                                        $stime=date_create($row['s_time']);
                                                        $s=date_format($stime,'H:i:s');
                                                        $etime=date_create($row['e_time']);
                                                        $e=date_format($etime,'H:i:s');
                                                
                                                
                                                      echo '<tr>
                                                        <td>'.$row['m_name'].'</td>
                                                        <td>'.$row['s_name'].'</td>
                                                        <td>'.$row['date'].'</td>
                                                        <td>'.$s.'</td>
                                                        <td>'.$e.'</td>
                                                        <td>'.$row['r_name'].'</td>  
                                                        <td>'.$row['guests'].'</td>  
                                                        <td>'.$row['email'].'</td>
                                                        <td class="text-danger">'.$row['contact'].'</td>
                                                           
                                                        </tr>';
                                                    }
                                          } ?>
                                        </tbody>
                                    </table>
                                </div>
                                        </div>
                                         
                                        <div class="tab-pane" id="weekly">
                                             <div class="card-content table-responsive">
                                    <table class="table">
                                        <thead class="text-warning">
                                            <th>Meeting Name</th>
                                            <th>Booked By</th>
                                            <th>Date</th>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                            <th>Room Number</th>  
                                            <th>Attendees</th>  
                                            <th>Email</th>
                                            <th>Contact</th>
                                         </thead>
                                        <tbody>
                                           <?php 
                                                include("config.php");

                                                $con=mysqli_connect($server,$username,$password,$db);

                                                $sql = "SELECT * FROM booking b,rooms r WHERE b.date BETWEEN SUBDATE('".date('Y-m-d')."',INTERVAL 7 DAY) AND '".date('Y-m-d')."' and b.r_id=r.r_id ORDER BY b.date ASC;";
                                                
                                                if($result=mysqli_query($con,$sql))
                                                {
                                                    while($row = mysqli_fetch_assoc($result))
                                                    {
                                                        
                                                        $stime=date_create($row['s_time']);
                                                        $s=date_format($stime,'H:i:s');
                                                        $etime=date_create($row['e_time']);
                                                        $e=date_format($etime,'H:i:s');
                                                
                                                      echo '<tr>
                                                            <td>'.$row['m_name'].'</td>
                                                        <td>'.$row['s_name'].'</td>
                                                        <td>'.$row['date'].'</td>
                                                        <td>'.$s.'</td>
                                                        <td>'.$e.'</td>
                                                        <td>'.$row['r_name'].'</td>  
                                                        <td>'.$row['guests'].'</td>  
                                                        <td>'.$row['email'].'</td>
                                                        <td class="text-danger">'.$row['contact'].'</td>
                                                           
                                                        </tr>';
                                                    }
                                          } ?>
                                        </tbody>
                                    </table>
                                </div>
                                        </div>
                                           
                                        <div class="tab-pane" id="monthly">
                                             <div class="card-content table-responsive">
                                    <table class="table">
                                        <thead class="text-warning">
                                            <th>Meeting Name</th>
                                            <th>Booked By</th>
                                            <th>Date</th>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                            <th>Room Number</th>  
                                            <th>Attendees</th>  
                                            <th>Email</th>
                                            <th>Contact</th>
                                         </thead>
                                        <tbody>
                                           <?php 
                                                include("config.php");

                                                $con=mysqli_connect($server,$username,$password,$db);

                                            $sql = "SELECT * FROM booking b,rooms r WHERE b.date BETWEEN SUBDATE('".date('Y-m-d')."',INTERVAL 1 MONTH) AND '".date('Y-m-d')."' and b.r_id=r.r_id ORDER BY b.date ASC;";
                                                
                                                if($result=mysqli_query($con,$sql))
                                                {
                                                    while($row = mysqli_fetch_assoc($result))
                                                    {
                                                        $stime=date_create($row['s_time']);
                                                        $s=date_format($stime,'H:i:s');
                                                        $etime=date_create($row['e_time']);
                                                        $e=date_format($etime,'H:i:s');
                                                
                                                      echo '<tr>
                                                        <td>'.$row['m_name'].'</td>
                                                        <td>'.$row['s_name'].'</td>
                                                        <td>'.$row['date'].'</td>
                                                        <td>'.$s.'</td>
                                                        <td>'.$e.'</td>
                                                        <td>'.$row['r_name'].'</td>  
                                                        <td>'.$row['guests'].'</td>  
                                                        <td>'.$row['email'].'</td>
                                                        <td class="text-danger">'.$row['contact'].'</td>
                                                           
                                                        </tr>';
                                                    }
                                          } ?>
                                        </tbody>
                                    </table>
          </div>
         </div>
        </div>
       </div>                            
      </div>        
     </div>        
    </div>      
   </div>
  </div>
        </div>
  </div>
</body>
    





</html>
<?php } ?>