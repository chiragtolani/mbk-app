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

    <link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon.png" />

    <link rel="icon" type="image/png" href="img/favicon.png" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />



    <title>Meeting Booking System</title>



    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

    <meta name="viewport" content="width=device-width" />

    



    <!-- Bootstrap core CSS     -->

    <link href="css/bootstrap.min.css" rel="stylesheet" />



    <!--  Material Dashboard CSS    -->

    <link href="css/material-dashboard.css" rel="stylesheet" />





    <!--     Fonts and icons     -->

    <link href="css/font-awesome.css" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>

    <link href="css/addtocalendar.css" rel="stylesheet" type="text/css">

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

<script type="text/javascript" charset="UTF-8" async="true" src="js/atc.min.js"></script>





<!--  Notifications Plugin    -->

<script src="js/bootstrap-notify.js"></script>





<!-- Material Dashboard javascript methods -->

<script src="js/material-dashboard.js"></script>







</script>

</head>



<body>











    <div class="wrapper">

        <?php include('header2.php'); ?>

        <div class="sidebar" data-color="red" data-background="blue" style="position:fixed;">

            <div class="sidebar-wrapper" style="margin-top:50%;">

                <ul class="nav">

                   

                    <li id="p" class="active">

                        <a id="edit_profile" href="#" >

                            <i class="material-icons">person</i>

                            <p>My Profile</p>

                        </a>

                        <script>

                            $('#edit_profile').click(function(){

                              if($('#m').hasClass('active')){

                                $('#m').removeClass('active');

                                $('#p').addClass('active');

                                $('#meeting_row').addClass('hidden');

                                $('#group_row').addClass('hidden');

                                $('#profile_row').removeClass('hidden');

                                $('#contact_row').addClass('hidden');

                              }

                              else if($('#a').hasClass('active')){

                                $('#a').removeClass('active');

                                $('#p').addClass('active');

                                 $('#meeting_row').addClass('hidden');

                                $('#group_row').addClass('hidden');

                                $('#profile_row').removeClass('hidden');

                                $('#contact_row').addClass('hidden');

                              }

                              else if($('#g').hasClass('active')){

                                $('#g').removeClass('active');

                                $('#p').addClass('active');

                                 $('#meeting_row').addClass('hidden');

                                $('#group_row').addClass('hidden');

                                $('#profile_row').removeClass('hidden');

                                $('#contact_row').addClass('hidden');

                              }

                            });

                    </script>

                    </li>

                    <li id="m">

                        <a id="my_meeting" href="#">

                            <i class="material-icons">search</i>

                            <p>My Meetings</p>

                        </a>

                        <script>

                            $('#my_meeting').click(function(){

                              if($('#p').hasClass('active')){

                                $('#p').removeClass('active');

                                $('#m').addClass('active');

                                $('#meeting_row').removeClass('hidden');

                                $('#group_row').addClass('hidden');

                                $('#profile_row').addClass('hidden');

                                $('#contact_row').addClass('hidden');

                              }

                              else if($('#a').hasClass('active')){

                                $('#a').removeClass('active');

                                $('#m').addClass('active');

                                $('#meeting_row').removeClass('hidden');

                                $('#group_row').addClass('hidden');

                                $('#profile_row').addClass('hidden');

                                $('#contact_row').addClass('hidden');

                              }

                              else if($('#g').hasClass('active')){

                                $('#g').removeClass('active');

                                $('#m').addClass('active');

                                $('#meeting_row').removeClass('hidden');

                                $('#group_row').addClass('hidden');

                                $('#profile_row').addClass('hidden');

                                $('#contact_row').addClass('hidden');

                              }

                            });

                    </script>

                    </li>

                    <li id="a">

                        <a id="address_book" href="#">

                            <i class="material-icons">library_books</i>

                            <p>My Contacts</p>

                        </a>

                        <script>

                            $('#address_book').click(function(){

                              if($('#p').hasClass('active')){

                                $('#p').removeClass('active');

                                $('#a').addClass('active');

                                $('#meeting_row').addClass('hidden');

                                $('#group_row').addClass('hidden');

                                $('#profile_row').addClass('hidden');

                                $('#contact_row').removeClass('hidden');

                              }

                              else if($('#m').hasClass('active')){

                                $('#m').removeClass('active');

                                $('#a').addClass('active');

                                $('#meeting_row').addClass('hidden');

                                $('#group_row').addClass('hidden');

                                $('#profile_row').addClass('hidden');

                                $('#contact_row').removeClass('hidden');

                              }

                              else if($('#g').hasClass('active')){

                                $('#g').removeClass('active');

                                $('#a').addClass('active');

                                $('#meeting_row').addClass('hidden');

                                $('#group_row').addClass('hidden');

                                $('#profile_row').addClass('hidden');

                                $('#contact_row').removeClass('hidden');

                              }

                            });

                    </script>

                    </li>

                    <li id="g">

                        <a id="group" href="#">

                            <i class="material-icons">group</i>

                            <p>My Groups</p>

                        </a>

                        <script>

                        $('#group').click(function(){

                              if($('#p').hasClass('active')){

                                $('#p').removeClass('active');

                                $('#g').addClass('active');

                                $('#meeting_row').addClass('hidden');

                                $('#group_row').removeClass('hidden');

                                $('#profile_row').addClass('hidden');

                                $('#contact_row').addClass('hidden');

                              }

                              else if($('#m').hasClass('active')){

                                $('#m').removeClass('active');

                                $('#g').addClass('active');

                                $('#meeting_row').addClass('hidden');

                                $('#group_row').removeClass('hidden');

                                $('#profile_row').addClass('hidden');

                                $('#contact_row').addClass('hidden');

                              }

                              else if($('#a').hasClass('active')){

                                $('#a').removeClass('active');

                                $('#g').addClass('active');

                                $('#meeting_row').addClass('hidden');

                                $('#group_row').removeClass('hidden');

                                $('#profile_row').addClass('hidden');

                                $('#contact_row').addClass('hidden');

                              }

                            });

                    </script>

                    </li>

                    <li>

	                    <a class="btn btn-simple btn-danger" onclick="history.go(-1)">

	                        <i class="material-icons">arrow_back</i>

	                        <p>Back</p>

	                    </a>

                    </li>

                </ul>

            </div>

        </div>



        <div class="main-panel">

            <div class="content">

               <?php

                    

                    include("config.php");

                    $con=mysqli_connect($server,$username,$password,$db);

                    $sql = "SELECT name,staff_id,email,mobile,tel,desig FROM user_profile WHERE username='".$_SESSION['Login']."';";

        

                    if($result=mysqli_query($con,$sql))

                    {

                        while($row=mysqli_fetch_assoc($result))

                        {

                    

                ?>

                

                        <div class="container" style="margin-top:8%; margin-left:16%; width:1800px;">

                            <div id="profile_row" class="row">

                                <div class="col-md-6">

                                    <div class="card card-profile">

                                        <div class="card-avatar">

                                            <a href="#">

                                        <img class="img" src="img/new_logo.png">

                                            </a>

                                        </div>



                                        <div class="content">

                                            <h3 class="category text-danger"><?php echo $row['desig']; ?></h3>

                                            <h2 class="card-title"><?php echo $row['name']; ?></h2>

                                            <span class="row card-content">

                                        <h4 class="col-xs-6" style="margin-left:-60px"><label style="font-size:24px" class="btn btn-simple btn-danger">Staff ID:</label> <?php echo $row['staff_id']; ?></h4>                                     

                                        <h4 class="col-xs-6" style="white-space:nowrap"><label style="font-size:24px;" class="btn btn-simple btn-danger">Email:</label><?php echo $row['email']; ?></h4>                                                                   </span>

                                            <span class="row card-content" >                                         

                                            <h4 class="col-xs-6" style="margin-top:-30px;margin-left:-30px"><label style="font-size:24px" class="btn btn-simple btn-danger">Mobile No.:</label><?php echo $row['mobile']; ?></h4>                             

                                            <h4 class="col-xs-6" style="margin-top:-30px; margin-left:-55px"><label style="font-size:24px" class="btn btn-simple btn-danger">Telephone No.:</label><?php echo $row['tel']; ?></h4>                                                         </span><br>



                                        </div>

                                    </div>

                                </div>

                                

                            </div>

                            <div id="meeting_row" class="row hidden">

                                <div class="col-md-6">

                                    <div class="card">

                                <div class="card-header"  data-background-color="red">

                                    <h4 class="title">My Meetings</h4>

                                </div>

                                <div class="card-content table-responsive" style="overflow:auto; max-height:400px;">

                                    <table class="table" >

                                        <thead class="text-primary text-danger">

                                           <tr>

                                            <th>Name</th>

                                            <th>Date</th>

                                            <th>Start Time</th>

                                            <th>End Time</th>

                                            <th>Room Name</th>

                                            <th></th>

                                            </tr>

                                        </thead>

                                       

                                         <tbody>

                                            

                                        

                                        <?php

                                                include("config.php");

                                                $con=mysqli_connect($server,$username,$password,$db);

                                                $sql = "SELECT b.m_name,u.name,r.r_name,b.s_time,b.e_time,b.date,u.email FROM booking b,rooms r,user_profile u WHERE b.s_id = u.staff_id and b.r_id=r.r_id and u.username='".$_SESSION['Login']."';";

                                                

                                                if($result=mysqli_query($con,$sql))

                                                {

                                                    while($row = mysqli_fetch_assoc($result))

                                                    {

                                                        $stime=date_create($row['s_time']);

                                                        $s=date_format($stime,'H:i:s');

                                                        $etime=date_create($row['e_time']);

                                                        $e=date_format($etime,'H:i:s');

                                                

                                                        echo '';

                                                      echo '<tr>

                                                        <td>'.$row['m_name'].'</td>                                                        <td>'.$row['date'].'</td>

                                                        <td>'.$s.'</td>

                                                        <td>'.$e.'</td>

                                                        <td>'.$row['r_name'].'</td>

                                                        <td class="td-actions text-right">

                                                        <span class="addtocalendar atc-style-red">

                                                                    <var class="atc_event">

                                                                        <var class="atc_date_start">'.$row['s_time'].'</var>

                                                                        <var class="atc_date_end">'.$row['e_time'].'</var>

                                                                        <var class="atc_timezone">Asia/Dubai</var>

                                                                        <var class="atc_title">'.$row['m_name'].'</var>

                                                                        <var class="atc_description">None</var>

                                                                        <var class="atc_location">'.$row['r_name'].'</var>

                                                                        <var class="atc_organizer">'.$row['name'].'</var>

                                                                        <var class="atc_organizer_email">'.$row['email'].'</var>

                                                                    </var>

                                                                    

                                                        </span>

                                                        </td>

                                                        </tr>';

                                                        

                                                        echo ' <script>(

                                                                function(){

                                                                    if (window.addtocalendar)if(typeof window.addtocalendar.start == "function")return;

                                                                })();

                                                                </script>';

                                                            

                                                                

                                                    }

                                          } ?>

                                          

                                         

                                        </tbody>

                                    </table>

                                </div>

                            </div>

                                </div>

                                

                            </div>

                           <div id="contact_row" class="row hidden">

                                <div class="col-md-6">

                                    <div class="card">

                                <div class="card-header"  data-background-color="red">

                                    <h4 class="title">My Contacts</h4>

                                </div>

                                <div class="card-content table-responsive" style="overflow:auto; max-height:400px;">

                                       <div style="">

                                        <form role="search">

                                            <div style="display:inline-block" class="form-group form-danger">

                                              <input id="myInput" type="text" class="form-control" placeholder="Search" onkeyup="search()">

                                              <style type="text/css">

                                                  #myInput{

                                                        width: 250px;

                                                        -webkit-transition: width 0.4s ease-in-out;

                                                        transition: width 0.4s ease-in-out;

                                                    }

                                                  #myInput:focus{

                                                      width: 830px;

                                                    }

                                                </style>

                                            </div>

	                                   </form>

                                      </div>

                                          <div style="margin-top:15px">

                                          <table id="contact" class="table">

                                           <?php 

                            

                                                include("config.php");

                                                $con=mysqli_connect($server,$username,$password,$db);

                                                $sql = "SELECT name FROM user_profile WHERE username!='".$_SESSION['Login']."' ORDER BY name ASC;";

                                                $addr_book=array();

                                                $search="";

                            

                                                if($result=mysqli_query($con,$sql))

                                                {

                                                    while($row=mysqli_fetch_assoc($result))

                                                    {

                                                        $fn=$row['name'];

                                                        

                                                        echo '<tr style="list-style: none;margin-bottom:30px">';

                                                            

                                                        if(!in_array($fn,$addr_book))

                                                        {

                                                            $addr_book[]=$fn;

                                                            

                                                            

                                                           echo '<td><a class="btn-simple" href="#" style="color:black; margin-left:60px;font-size:18px">'.$fn.'</a>'; 

                                                           echo ' <div style="margin-right:30px;" class="td-actions pull-right">

                                                                <button type="button" rel="tooltip" title="View" class="btn btn-info btn-simple">

                                                                    <i style="font-size:24px;padding-left: 25px; padding-right: 25px;" class="material-icons">assignment_ind</i>

                                                                </button>

                                                                <button type="button" rel="tooltip" title="Invite" class="btn btn-success btn-simple">

                                                                    <i style="font-size:24px;padding-left: 25px; padding-right: 25px;" class="material-icons">insert_invitation</i>

                                                                </button>

                                                                <button id="but_'.$fn.'" type="button" rel="tooltip" data-toggle="modal" data-target="#contactModal" title="Group To" class="btn btn-danger btn-simple">

                                                                    <i style="font-size:24px;padding-left: 25px; padding-right: 25px;" class="material-icons">group_work</i>

                                                                </button>

                                                           </div></td>';

                                                            

                                                      echo '<script>

                                                            

                                                                   document.getElementById("but_'.$fn.'").addEventListener("click",function(){

                                                                        document.getElementById("contname").innerText = "'.$fn.'"

                                                                   });

                                                                

                                                            </script>';

                                                           

                                                            

                                                        }

                                                      

                                                       

                                                          echo '</tr>';  

                                                    

                                                    }

                                                    

                                                }

                                              

                                                   

                                                   

                                           ?>

                                           </table>

                                       </div>

                                        <script>

                                                function search() {

                                                    var input, filter, td, i,tr,table,j;

                                                    var names = new Array();

                                                    <?php foreach($addr_book as $key => $val){ 

                                                        echo 'names.push("'.$val.'");';

                                                 } ?>

                                                   input = document.getElementById("myInput");

                                                    filter = input.value.toUpperCase();

                                               

                                                   var table = document.getElementById("contact")

                                                   var tr = table.getElementsByTagName("tr");

                                                    

                                                    for (i = 0; i < tr.length; i++) {

                                                        td = tr[i].getElementsByTagName("td")[0];

                                                        if (td) {

                                                          if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {

                                                            tr[i].style.display = "";

                                                          } else {

                                                            tr[i].style.display = "none";

                                                          }

                                                        } 

                                                      }

                                                    

                                                }

                                             

                                    </script>    

                                            

                                </div>

                            </div>

                                </div>

                                

                            </div>

                            <div id="group_row" class="row hidden">

                                <div class="col-md-6" >

                                    <div class="card">

                                    

                                <div class="card-header"  data-background-color="red">

                                    <h4 class="title">My Groups</h4>

                                    <div style="margin-left:630px;margin-top:-50px">

                                    <button type="button" rel="tooltip" data-toggle="modal" data-target="#groupModal" title="Add New Group" class="btn btn-simple btn-white">

                                    <i style="font-size:24px;" class="material-icons">group_add</i>

                                    </button>

                                    <!--<button type="button" rel="tooltip" title="Delete Group" class="btn btn-simple btn-white">

                                    <i style="font-size:24px;" onclick="delete_group()" class="material-icons">delete</i>

                                    </button>

                                    <script>

                                        function delete_group(){

                                            var result = confirm("Are you sure you want to delete the group?");

                                            if(result)

                                                {

                                                    window.location.href = "php/delete_group.php";

                                                }

                                            

                                        }

                                        </script>-->

                                    </div>

                                </div>

                                <div class="card-content table-responsive" style="overflow:scroll; max-height:400px;">

                                    <table class="table">

                                       <thead class="text-primary text-danger" >

                                           <tr>

                                               <th style="text-align:center"><b>Group ID</b></th>

                                               <th style="text-align:center"><b>Group Name</b></th>

                                               <th style="text-align:center"><b>Actions</b></th>

                                            </tr>

                                        </thead>

                                        <tbody>

                                            <?php 

                            

                                                include("config.php");

                                                $con=mysqli_connect($server,$username,$password,$db);

                                                $sql = "SELECT g.g_id,g.g_name FROM groups g,user_profile u WHERE u.u_id=g.u_id and u.username='".$_SESSION['Login']."';";

                            

                                                if($result=mysqli_query($con,$sql))

                                                {

                                                    while($row = mysqli_fetch_assoc($result))

                                                    {

                                                        echo '<script>

                                                                function delete_group(){

                                                                    var result = confirm("Are you sure you want to delete the group?");

                                                                    if(result)

                                                                        {

                                                                            window.location.href = "php/delete_group.php?g_id='.$row["g_id"].'&g_name='.$row["g_name"].'";

                                                                        }



                                                                }

                                                                </script>';

                                                        

                                                        echo '<tr style="text-align:center">

                                                        <td>'.$row['g_id'].'</td>

                                                        <td>'.$row['g_name'].'</td>

                                                        <td><a id="'.$row['g_id'].'" rel="tooltip" title="View Contacts" class="btn btn-simple btn-danger"><i class="material-icons" style="font-size:22px;padding-left: -15px; padding-right: -15px;">contacts</i></a>

                                                        <a rel="tooltip" title="Delete Group" class="btn btn-simple btn-danger">

                                                        <i style="font-size:22px;padding-left: -15px; padding-right: -15px;" onclick="delete_group()" class="material-icons">delete</i>

                                                        </a>

                                                        <a rel="tooltip" title="Add Contacts" class="btn btn-simple btn-danger"><i class="material-icons" style="font-size:22px;padding-left: -15px; padding-right: -15px;">add_box</i></a>

                                                        <a rel="tooltip" title="Invite" class="btn btn-simple btn-danger"><i class="material-icons" style="font-size:22px;padding-left: -15px; padding-right: -15px;">insert_invitation</i></a></td>

                                                        </tr>';

                                                        

                                                        echo '<script>

                                                                var bt = "#'.$row['g_id'].'";

                                                                $(bt).click(function(){

                                                                $("#vcm").html("");

                                                                

                                                                var g = "'.$row['g_id'].'";

                                                                var url = "viewContactModal.php?g_id=" + g;

                                                                 $("#viewcontactModal").modal("show");

                                                                        $.getJSON(url,function(data)

                                                                        {                                                         

                                                                            for(var i = 0;i<data.length;++i)

                                                                            {

                                                                                $("#vcm").append("<tr>" +

                                                                                                "<td>" + data[i].u_id + "</td>" +

                                                                                                "<td>" + data[i].name + "</td>" +

                                                                                            "</tr>");

                                                                            }   

                                                                    });

                                                                });

                                                            </script>';

                                                        

                                                        

                                                        

                                                    

                                                    }

                                                }

                                            ?>

                                        </tbody>

                                           

                                        

                                    </table>

                                </div>

                            </div>

                                

                            </div>

                        </div>

                        <?php

                       }

                    }

            mysqli_close($con);

                            ?>

                        <div class="modal fade" id="groupModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                          <div class="modal-dialog">

                            <div class="modal-content">

                              <div class="modal-header">

                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                                <h4 class="modal-title" id="myModalLabel">Add a New Group</h4>

                              </div>

                              <div class="modal-body">

                                <div class="box">

                                    <div class="content">

                                        <div class="form">

                                          <form method="POST" accept-charset="UTF-8" action="php/create_group.php" id="groupcreate">

                                            <div class="row">

                                            <div class="col-md-8">

                                            <div class="form-group label-floating">

                                              <label class="control-label">Group Name</label>

                                              <input type="text" class="form-control label-floating" name="g_name" required>

                                            </div>

                                              </div>

                                              </div>                            

                                            <button class="btn btn-default btn-login" value="Create Group">Create Group</button>

                                          </form>

                                    </div>

                                </div>

                              </div>

                            </div>

                          </div>

                        </div>

                    </div>

                       <div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                          <div class="modal-dialog">

                            <div class="modal-content">

                              <div class="modal-header">

                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                                <h4 class="modal-title" id="myModalLabel">Add Contact to Group</h4>

                              </div>

                              <div class="modal-body">

                                <div class="box">

                                    <div class="content">

                                        <div class="form">

                                            <div class="row">

                                            <div class="col-md-8">

                                            <table class="table">

                                              <thead>

                                                  <tr>

                                                     <th>Group ID</th>

                                                      <th>Group Name</th>

                                                  </tr>

                                              </thead>

                                              <label id="contname"></label>

                                              <tbody>

                                                  <?php

                                                        include("config.php");

                                                        $con=mysqli_connect($server,$username,$password,$db);

                                                        

                                                        $sql = "SELECT * FROM groups g,user_profile u WHERE u.u_id=g.u_id and u.username='".$_SESSION['Login']."';";

        

                                                        if($result=mysqli_query($con,$sql))

                                                        {

                                                            while($row=mysqli_fetch_assoc($result))

                                                            {

                                                                echo '<tr>

                                                                <td id="id_'.$row['g_name'].'">'.$row['g_id'].'</td>

                                                                <td id="name_'.$row['g_name'].'"><a class="text-danger" href="javascript:add_contact_group(\''.$row['g_name'].'\')">'.$row['g_name'].'</a></td>

                                                                </tr>';

                                                            }

                                                        }

                                                    ?>

                                                    <script>

                                                        function add_contact_group(name)

                                                        {

                                                            var group = name;

                                                           

                                                                    var id_data=document.getElementById("id_"+group);

                                                                    var name_data=document.getElementById("name_"+group);

                                                                    var group_id = id_data.innerText;

                                                                    var group_name = name_data.innerText;

                                                                    var contact_name = document.getElementById('contname').innerText;

                                                                    window.location.href = "php/add_contact_group.php?g_id="+group_id+"&g_name="+group_name+"&contact="+contact_name;

                                                                    

                                                                

                                                        }

                                                  </script>

                                                  <?php mysqli_close($con); ?>

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

                            <div class="modal fade" id="viewcontactModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-dialog">

                            <div class="modal-content">

                              <div class="modal-header">

                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                                <h4 class="modal-title" id="myModalLabel">Contacts</h4>

                              </div>

                              <div class="modal-body">

                                <div class="box">

                                    <div class="content">

                                            <div class="row">

                                            <div class="col-md-8">

                                                <table class="table">

                                                    <thead> 

                                                        <tr> 

                                                            <th>Contact ID</th>

                                                            <th>Contact Name</th>

                                                        </tr>

                                                    </thead>                                   

                                                    <tbody id="vcm">

                                                    

                                                    </tbody>

                                                </table>

                                              </div>

                                              </div>                            

                                          

                                </div>

                              </div>

                            </div>

                          </div>

                        </div></div>

                        

                    </div>

                </div>





            </div>

            

        </body>













</html>

<?php } ?>

