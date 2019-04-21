<!DOCTYPE html>

<?php header('Refresh: 3;url=small.php?r_id='.$_GET['r_id'].''); ?>
<html>

<head>
  <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
  <link type="text/css" rel="stylesheet" href="../css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="../css/material-kit.css">
  <link type="text/css" rel="stylesheet" href="../css/material-dashboard.css">
        <link href="../css/bootstrap.css" rel="stylesheet" /> 
    <link href="../css/login-register.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/font-awesome.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/bootstrap-datetimepicker.min.css" />

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" />

    <!--  Material Dashboard CSS    -->
    <link href="../css/material-dashboard.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
 
	<!-- jQuery -->
    <link rel="stylesheet" href="../css/jquery-ui.css">
    
    <meta http-equiv="refresh" content="30;url=http://192.168.1.117/screens/small.php?r_id=<?php echo $_GET['r_id']; ?>" />
  
</head>

<body>



   <?php

      $r_id=$_GET['r_id'];
      include("../config.php");

  

      date_default_timezone_set('Asia/Dubai');
      $date=date('Y-m-d H:i:s');
      $con=mysqli_connect($server,$username,$password,$db) or die(mysqli_connect_error);
      $sql="select b.m_name,b.m_id,b.s_time,b.e_time,r.r_name from booking b,rooms r where b.r_id=".$r_id." and r.r_id=b.r_id order by b.s_time;";
      $m_name=array();
      $m_id=array();
      $s_time=array();
      $e_time=array();
  
     // echo $date."\n";
      
      //echo (strtotime($date)+300)."\n";
    $date1=strtotime($date)+300;
   // echo date('Y-m-d H:i:s',$date1);
      if($res1=mysqli_query($con,$sql)){
                  while($row=mysqli_fetch_assoc($res1)){
                    $m_name[]=$row['m_name'];
                    $m_id[]=$row['m_id'];
                    $s_time[]=$row['s_time'];
                    $e_time[]=$row['e_time'];
                    $room=$row['r_name'];
                  }
      }
      else{
        echo mysqli_error($con);
      }
    foreach($s_time as $i=>$stime){
     // echo "    ".$stime." ".$e_time[$i];
      if((strtotime($stime) <= (strtotime($date)+300)) && (strtotime($e_time[$i])>=strtotime(date('Y-m-d H:i:s'))) ){
        $meetingname=$m_name[$i];
        $starttime=$s_time[$i];
        $endtime=$e_time[$i];
        break;
      }
    }


        
if(isset($meetingname)){

echo"


        <div class='wrapper' style='background-image:url(\"../img/emirates.jpg\"); background-repeat: no-repeat; background-size:cover; background-position:top-center;'>

            <div class='main-panel'>
                <div class='content'>
                    <div class='container-fluid'>
                        <div class='row'>
                            <div class='col-md-8' style=''>
                                <div class='card' style='background-color: rgba(255, 255, 255, 0.5); height:350px;'>
                                    <div class='card-content table-responsive'>
                                    
                                    <h1 class='title'>
                                             ".$meetingname."
                                        </h1>
                                        <h2><b>".$room."</b></h2>
                                        <h2><b>".substr($starttime,11,5)." - ".substr($endtime,11,5)."</b></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>";
}
  else{
    echo "<div class='wrapper' style='background-image:url(\"../img/emirates.jpg\"); background-repeat: no-repeat; background-size:cover;'>
    <div class='row'>
                            <div class='col-md-8' style='margin-top:250px;'>
        <h1><b><center style='color:black;'>NO MEETINGS RIGHT NOW</center> </b></h1>
        </div>
        </div>
    </div>";
  }
        ?>

</body>
<script src="../js/jquery-3.1.0.min.js" type="text/javascript"></script>
    <script src="../js/material.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../js/material-dashboard.js" type="text/javascript"></script>
</html>