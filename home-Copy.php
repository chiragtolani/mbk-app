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
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Meeting Booking System</title>
    <script type="text/javascript" src="js/moment.min.js"></script>

    <script src="js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="js/jquery-3.1.0.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui.js" type="text/javascript"></script>
    <script src="js/jquery.ui.autocomplete.html.js" type="text/javascript"></script>



    <!--    For modal forms     -->
    <link href="css/login-register.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/font-awesome.css">
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!--<link rel="stylesheet" href="css/bootstrap-datetimepicker.css" />-->
    <link href="css/graph-style.css" rel="stylesheet" />



    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!--  Material Dashboard CSS    -->
    <link href="css/material-dashboard.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="fonts/font-awesome.min.css" rel="stylesheet">
    <link href='css/icons.css' rel='stylesheet' type='text/css'>

    <!-- jQuery -->
    <link rel="stylesheet" href="css/jquery-ui.css">

    <!--   Core JS Files   -->
    <script src="js/jquery.min.js"></script>
    <script src="js/chartist.min.js"></script>

    <link rel="stylesheet" href="css/flatpickr.min.css">
    <script src="js/flatpickr.js"></script>
    <link rel="stylesheet" type="text/css" href="css/material_red.css">


    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/material.min.js" type="text/javascript"></script>
    <script src="js/login-register.js" type="text/javascript"></script>

    <!--<script type="text/javascript" src="js/bootstrap-datetimepicker.js"></script>-->
    <script src="js/vis.min.js" type="text/javascript"></script>
    <link href="css/vis-timeline-graph2d.min.css" rel="stylesheet" type="text/css" />


    <!--  Notifications Plugin    -->
    <script src="js/bootstrap-notify.js"></script>

    <!-- Material Dashboard javascript methods -->
    <script src="js/material-dashboard.js"></script>


    <style>
        #title {
            margin: 17px 5px 10px 5px;
            font-size: 35px;
            color: black;
        }

        #menu {
            margin-left: 500px;
            margin-top: 30px;
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

        .form-group {
            margin: 3px 0 0 0;
        }
        
        .ui-autocomplete { position: absolute; cursor: default;z-index:30 !important;}  
    </style>


    <style>
        /*
            All the necessary styling for the table of rooms done here!
            The only styling dont in-line html is to check if the room is warning with many meetings or not.
            All the rest 0of the styling is done here
        */

        a {
            /*display: block;
            height: 100px;
            width: 250px;*/
            color: white;
            text-decoration-line: none;
        }

        #addaroom {
            color: dimgrey;
            padding-left: 20px;
            cursor: pointer;
        }

        b {
            font-size: 15px;
        }

        #table-layout-inline {
            display: table;
            width: 100%;
            table-layout: fixed;

        }

        td {
            max-width: 300px;
            border-radius: 5px;
            height: auto;
            width: 250px;
            color: white;
            text-align: center;
            cursor: pointer;
        }

        .meeting_time {
            font-size: 11px;
        }

        .occupied_b {
            background-color: red;
        }

        .occupied_a {
            background-color: red;
        }

        #room_table_data {
            padding: 0 10px 0 10px;
        }

        .rooms_table {
            display: block;
            overflow-y: scroll;
            overflow-x: hidden;
            max-height: 500px;
            width: 100%;
        }

        .unselectable {
            -moz-user-select: -moz-none;
            -khtml-user-select: none;
            -webkit-user-select: none;
            -o-user-select: none;
            user-select: none;
        }

        #classTable tbody tr td {
            color: #646464;
        }
    </style>
    <!-- 
            Note: if u dont have an internet connection, you might want to download these files add them to your woking directory and call them locally.
        -->

    <script>
        $(document).ready(function() { //Check if the document is loaded or not.
            $(".card-header").click(function() { //On-click a table cell

                var a = $(this).attr('class').split(' '); //get the class of the cell
                if (a[1] == "success") { //if its success, toggle with occupied success.
                    $(this).toggleClass("success");
                    $(this).toggleClass("occupied_a");
                    $(this).attr("data-background-color", "red");
                } else if (a[1] == "warning") { //if its warning toggle with occupied-warning.
                    $(this).toggleClass("warning");
                    $(this).toggleClass("occupied_b");
                    $(this).attr("data-background-color", "red");
                } else if (a[1] == "occupied_a") { //if its occupied but availabe before it was occupied, toggle with success
                    $(this).toggleClass("occupied_a");
                    $(this).toggleClass("success");
                    $(this).attr("data-background-color", "green");
                } else if (a[1] == "occupied_b") { //if its occupied but warning befor, toggle with warning
                    $(this).toggleClass("occupied_b");
                    $(this).toggleClass("warning");
                    $(this).attr("data-background-color", "orange");
                }


            }); //end click function


        }); //end document and script
    /*    $(document).ready(function($){
    $('#email').autocomplete({
	source:'suggest_name.php', 
	minLength:2,
        		select: function(event,ui){
			var code = ui.item.id;
			var name = ui.item.value;
			if(code != '') {
				location.href= "home-Copy.php" +;
			}
		},
                // optional
		html: true, 
		// optional (if other layers overlap the autocomplete list)
		open: function(event, ui) {
			$(".ui-autocomplete").css("z-index", 1000);
		}
    });
});*/
        
          <script>
  $( function() {
    var availableTags = [
      "ActionScript",
      "AppleScript",
      "Asp",
      "BASIC",
      "C",
      "C++",
      "Clojure",
      "COBOL",
      "ColdFusion",
      "Erlang",
      "Fortran",
      "Groovy",
      "Haskell",
      "Java",
      "JavaScript",
      "Lisp",
      "Perl",
      "PHP",
      "Python",
      "Ruby",
      "Scala",
      "Scheme"
    ];
    function split( val ) {
      return val.split( /,\s*/ );
    }
    function extractLast( term ) {
      return split( term ).pop();
    }
 
    $( "#email" )
      // don't navigate away from the field on tab when selecting an item
      .on( "keydown", function( event ) {
        if ( event.keyCode === $.ui.keyCode.TAB &&
            $( this ).autocomplete( "instance" ).menu.active ) {
          event.preventDefault();
        }
      })
      .autocomplete({
        minLength: 0,
        source: function( request, response ) {
          // delegate back to autocomplete, but extract the last term
          response( $.ui.autocomplete.filter(
            availableTags, extractLast( request.term ) ) );
        },
        focus: function() {
          // prevent value inserted on focus
          return false;
        },
        select: function( event, ui ) {
          var terms = split( this.value );
          // remove the current input
          terms.pop();
          // add the selected item
          terms.push( ui.item.value );
          // add placeholder to get the comma-and-space at the end
          terms.push( "" );
          this.value = terms.join( ", " );
          return false;
        }
      });
  } );
  </script>
    
 
</head>

<body onload="openViewModal2()">



    <div class="wrapper">
        <?php include('header2.php'); ?>



        <div class="sidebar" data-color="red" data-background="blue" style="position:fixed;width:260px">
            <!--
		        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

		        Tip 2: you can also add an image using data-image tag
		    -->



            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li>
                        <a data-toggle="modal" href="javascript:void(0)" onclick="openLoginModal();" style="margin-top:60%;">
                        
                            
                            <i class="material-icons unselectable">event</i>
                            Add a meeting
                        </a>
                    </li>
                    <!--<li>
	                    <a data-toggle="modal" href="javascript:void(0)" onclick="openViewModal();">
                            <i class="material-icons unselectable">edit</i>
                            View/Edit a meeting
                        </a>
	                </li>-->

                    <li>
                        <a data-toggle="modal" href="javascript:void(0)" onclick="openViewModal3();">
                            <i class="material-icons unselectable">search</i>
                            Filtered Meeting search
                        </a>
                    </li>
                    <!--<li>
	                    <a data-toggle="modal" href="javascript:void(0)" onclick="openAddRoom();">
	                        <i class="material-icons unselectable">add box</i>
	                        <p>Add a Room</p>
	                    </a>
	                </li>-->
                    <li>
                        <a href="user-profile.php">
	                        <i class="material-icons unselectable">person</i>
	                        <p>User Profile</p>
	                    </a>
                    </li>


                    <li>
                        <a href="settings.php">
	                        <i class="material-icons unselectable">settings</i>
	                        <p>Settings</p>
	                    </a>
                    </li>





                </ul>
            </div>
        </div>









        <div class="modal fade login" id="loginModal" style="margin-top:-90px">
            <div class="modal-dialog login animated">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Add a booking</h4>
                    </div>
                    <div class="modal-body">
                        <div class="box">
                            <div class="content">
                                <div class="form loginBox">
                                    <form method="POST" accept-charset="UTF-8" action="php/add_booking.php" id="addabooking">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Meeting Name</label>
                                                    <input type="text" class="form-control" name="m_name" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label" id="nogtog">Number of Guests</label>
                                                    <input type="number" class="form-control" name="guests" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Staff Name</label>
                                                    <input type="text" class="form-control" name="s_name" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Staff ID</label>
                                                    <input type="text" class="form-control" name="s_id" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group label-floating">

                                            <label class="control-label">Date</label>
                                            <input type="text" class="form-control" id='datetimepicker4' name="date" required>
                                            <script type="text/javascript">
                                                flatpickr("#datetimepicker4", {
                                                    enableTime: false,
                                                    minDate: "today",
                                                    weekNumbers: true
                                                });
                                            </script>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Start Time</label>
                                                    <input type='text' class="form-control" id='datetimepicker1' name="s_time" required />
                                                    <script type="text/javascript">
                                                        flatpickr("#datetimepicker1", {
                                                            enableTime: true,
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
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">End Time</label>
                                                    <input type='text' class="form-control" id='datetimepicker2' name="e_time" required />
                                                    <script type="text/javascript">
                                                        flatpickr("#datetimepicker2", {
                                                            enableTime: true,
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
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="checkbox">
                                            <label>
                          <input type="checkbox" name="telephone">
                          Telephone
                      </label>
                                            <label style="position:fixed; left:50%;">
                          <input type="checkbox" name="tv">
                          TV
                      </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                          <input type="checkbox" name="projector">
                          Projector
                      </label>
                                            <label style="position:fixed; left:50%;">
                          <input type="checkbox" name="pc">
                          PC
                      </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                          <input type="checkbox" name="ip">
                          IP-Board
                      </label>
                                            <label style="position:fixed; left:50%;">
                          <input type="checkbox" name="dvd">
                          DVD
                      </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                          <input type="checkbox" name="podium">
                          Podium-Microphone
                      </label>
                                            <label style="position:fixed; left:50%;">
                          <input type="checkbox" name="cordless">
                          Cordless-Microphone
                      </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                          <input type="checkbox" name="lap">
                          Lap-Microphone
                      </label>
                                            <label style="position:fixed; left:50%;">
                          <input type="checkbox" name="vc">
                          Video-Conferencing
                      </label>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Contact</label>
                                                    <input type="number" class="form-control" name="contact" required>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group label-floating">
                                                    <div class="ui-widget">
                                                    <label for="email" class="control-label">E-Mail</label>
                                                    <form action="" method="post">
                                                    <input id="email" class="form-control ui-autocomplete-input" type="text" name="email" autocomplete="on"></form>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-default btn-login" value="Add a meeting">Add a meeting</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>










        <div class="modal fade login" id="loginModal2">
            <div class="modal-dialog login animated">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Add a booking</h4>
                    </div>
                    <div class="modal-body">
                        <div class="box">
                            <div class="content">
                                <div class="form loginBox2">
                                    <form method="POST" accept-charset="UTF-8" action="php/add_booking.php" id="addabooking2">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Meeting Name</label>
                                                    <input type="text" class="form-control" name="m_name" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label" id="nogtog">Number of Guests</label>
                                                    <input type="number" class="form-control" name="guests" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Staff Name</label>
                                                    <input type="text" class="form-control" name="s_name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Staff ID</label>
                                                    <input type="text" class="form-control" name="s_id">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <label class="control-label">Date</label>
                                            <input type="text" class="form-control" id='datetimepicker4' name="date" required>
                                            <script type="text/javascript">
                                                flatpickr("#datetimepicker4", {
                                                    enableTime: false,
                                                    minDate: "today",
                                                    weekNumbers: true
                                                });
                                            </script>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Start Time</label>
                                                    <input type='text' class="form-control" id='datetimepicker1' name="s_time" required />
                                                    <script type="text/javascript">
                                                        flatpickr("#datetimepicker1", {
                                                            enableTime: true,
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
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">End Time</label>
                                                    <input type='text' class="form-control" id='datetimepicker2' name="e_time" required />
                                                    <script type="text/javascript">
                                                        flatpickr("#datetimepicker2", {
                                                            enableTime: true,
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
                                                </div>
                                            </div>
                                        </div>
                                        <br>

                                        <input type="hidden" name="r_id" id="r_id_room_booking" value="" />
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Contact</label>
                                                    <input type="number" class="form-control" name="contact" required>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">E-Mail</label>
                                                    <input id="email" class="form-control" type="text" name="email">
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-default btn-login" value="Add a meeting">Add a meeting</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>










        <div class="modal fade view" id="viewModal">
            <div class="modal-dialog login animated">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">View a booking</h4>
                    </div>
                    <div class="modal-body">
                        <div class="box">
                            <div class="content">
                                <div class="form viewBox" id="testforenter">
                                    <form accept-charset="UTF-8" onclick="return false;">
                                        <input type="number" class="form-control" placeholder="Meeting ID" name="m_id" id="meetingid" required>

                                        <input class="btn btn-default btn-login" id="view-button" type="submit" value="View a meeting" onclick="getMeeting()">
                                    </form>
                                    <script>
                                    </script>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>










        <div class="modal fade view" id="viewModal3">
            <div class="modal-dialog login animated">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">View a booking</h4>
                    </div>
                    <div class="modal-body" id="filterMeetings">



                    </div>

                </div>
            </div>
        </div>


        <div class="modal fade view" id="viewModal4">
            <div class="modal-dialog login animated">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">View a booking</h4>
                    </div>
                    <div class="modal-body" id="viewMeetingsByDate">
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade view" id="viewModal2">
            <div class="modal-dialog login animated">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">View a booking</h4>
                    </div>
                    <div class="modal-body" id="view-edit-modal-body">
                        <script>
                        </script>
                    </div>
                </div>
            </div>
        </div>










        <div class="modal fade login" id="addRoom" style="margin-top:-90px">
            <div class="modal-dialog login animated">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Add a Room</h4>
                    </div>
                    <div class="modal-body">
                        <div class="box">
                            <div class="content">
                                <div class="form addRoom">

                                    <form method="post" action="" accept-charset="UTF-8">

                                        <input type="text" class="form-control" placeholder="Enter Room ID" name="r_id" id="rid" required>
                                        <input type="text" class="form-control" placeholder=" Enter Room Name" name="r_name" id='rname' required>
                                        <input type="text" class="form-control" placeholder="Enter Room Capacity" name="capacity" id='capacity' required>
                                        <input class="btn btn-default btn-login" type="button" value="Submit" onclick="addRoom()">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>










        <div class="main-panel">

            <div class="content">

                <!-- <p id="date" style="color:Black; margin-top:60px; font-size:30px; font-family:helvetica;"> 
                     
                     <script type="text/javascript">
                          var m_names = ["January", "February", "March", 
                          "April", "May", "June", "July", "August", "September", 
                          "October", "November", "December"];

                          var d_names = ["Sunday","Monday", "Tuesday", "Wednesday", 
                          "Thursday", "Friday", "Saturday"];

                          var myDate = new Date();
                          myDate.setDate(myDate.getDate());
                          var curr_date = myDate.getDate();
                          var curr_month = myDate.getMonth();
                          var curr_day  = myDate.getDay();
                          document.write(d_names[curr_day] + ","  + m_names[curr_month] + " " +curr_date);
                     </script>
                 
                 </p>-->


                <!-- <ul class="nav nav-pills nav-pills-danger" role="tablist" style="margin-top:-40px; margin-left:850px;">
                      <li class="">
                                  <a href="home.php" role="tab">
                                      Grid View
                                  </a>
                      </li>
                      <li class="">
                                  <a href="php/vis-js-json.php" role="tab">
                                      Graph View
                                  </a>
                      </li>
                  </ul>-->
                <nav class="navbar navbar-danger" style="margin-top:3%;">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-danger">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
                            <a class="navbar-brand" href="#pablo"><b><script type="text/javascript">
                          var m_names = ["January", "February", "March", 
                          "April", "May", "June", "July", "August", "September", 
                          "October", "November", "December"];

                          var d_names = ["Sunday","Monday", "Tuesday", "Wednesday", 
                          "Thursday", "Friday", "Saturday"];

                          var myDate = new Date();
                          myDate.setDate(myDate.getDate());
                          var curr_date = myDate.getDate();
                          var curr_month = myDate.getMonth();
                            var curr_year = myDate.getFullYear();
                          var curr_day  = myDate.getDay();
                          document.write(d_names[curr_day] + ", "  + m_names[curr_month] + " " +curr_date + " " + curr_year);
                                    </script></b></a>
                        </div>

                        <div class="collapse navbar-collapse" id="example-navbar-danger" style="margin-right:3%">
                            <ul class="nav navbar-nav navbar-right">
                                <li id="gri" class="active">
                                    <a id="grid" href="#">
											<i class="material-icons">grid_on</i> Grid View
		                                </a>
                                    <script>
                                        $('#grid').click(function() {
                                            if ($('#gra').hasClass('active')) {
                                                $('#gra').removeClass('active');
                                                $('#gri').addClass('active');
                                                $('#graph-view').addClass('hidden');
                                                $('#room-view').removeClass('hidden');
                                            }
                                        });
                                    </script>
                                </li>
                                <li id="gra">
                                    <a id="graph" href="#">
											<i class="material-icons">insert_chart</i> Graph View
		                                </a>
                                    <script>
                                        $('#graph').click(function() {
                                            if ($('#gri').hasClass('active')) {
                                                $.ajax({
                                                    url: 'php/vis-js-json.php'
                                                });
                                                $('#graph-view').load('graph.php');
                                                $('#gri').removeClass('active');
                                                $('#gra').addClass('active');
                                                $('#room-view').addClass('hidden');
                                                $('#graph-view').removeClass('hidden');
                                            }


                                        });
                                    </script>
                                </li>

                            </ul>
                        </div>
                    </div>
                </nav>




                <?php //start php code.
    
         $con=mysqli_connect("localhost","root","root","EKBooking"); //Connect to the mySQL server.
    if (mysqli_connect_errno()) //Check if its connected or not.
        { 
            echo "Failed to connect to MySQL: " . mysqli_connect_error(); //If unable to connect, display error.
        }
    $get_room_id="select r_id,r_name from rooms order by capacity;"; // SQL query to get room id from the database.
    $room_id=array();
    $room_name=array();             // An array to store all the room numbers.
    $result=mysqli_query($con,$get_room_id); //Execute the query.
    if(mysqli_num_rows($result) > 0){ // check if the query returned any rows, if yes then proceed:
        //echo "Get room number successful!"; //For debugging purposes.
        while($row = mysqli_fetch_assoc($result)){ //if there are more than 1 rows, then an array to read data one by one from the result.
            $room_id[]=$row['r_id'];  // for storing the room ids in the $room_id array.
            $room_name[]=$row['r_name'];
        }
        
        
    }
    
    // uncomment the following lines to check if the room numbers are being called correctly.
    
    /*foreach($room_id as $room_no){
        echo "\n room number : ".$room_no;
    }*/
    $today=date("Y/m/d");
    
    
    $meeting_detail = array(); // for storing all the details of meetings that are going to take place in a room
    
    foreach($room_id as $room_no){
        $get_meetings="select m_name,s_time,e_time,s_name,m_id from booking where date='$today' and r_id='$room_no';";
        $room_meeting_detail=array();
        $result=mysqli_query($con,$get_meetings);
        $meeting_detail_array=array();
        if(mysqli_num_rows($result) > 0){ // check if the query returned any rows, if yes then proceed:
            
          //  echo "Get Meetings successfully"; //For debugging purposes.
            while($row = mysqli_fetch_assoc($result)){ //if there are more than 1 rows, then an array to read data one by one from the                                                  //result.
                
                //Storing the required details in an array.
                $room_meeting_detail['m_name']=$row['m_name'];        
                $room_meeting_detail['s_name']=$row['s_name'];        
                $room_meeting_detail['s_time']=$row['s_time'];        
                $room_meeting_detail['e_time']=$row['e_time'];        
                $room_meeting_detail['m_id']=$row['m_id'];        
                $meeting_detail_array[]=$room_meeting_detail;
            }
        }
        //var_dump($meeting_detail_array);
        $meeting_detail[$room_no]=$meeting_detail_array; //creating a nested array to hold all the meeting deatils according to the room                                                       //numbers in an array.
        //var_dump($room_meeting_detail);
        // clearing and reinitialising the array.
        unset($room_meeting_detail);
        $room_meeting_detail=array();
    }
    //var_dump($meeting_detail); //dumping all the variables to check if the array is proper. For debugging.
    
    //echo sizeof($room_id); //for debugging
    
    
    
    //change the html code here for visuals and stuff
        echo "<div id='room-view' class='container-fluid' style='margin-top:-40px'>"; //creating a division to hold the table.
        echo "<table class='rooms_table' id='room_table' style='max-height:450px'>"; //creating a table
        $i=0; //row count
        $j=0; //column count
        $col_count=4;//the column size
        $room_count=0;//roomcount
        $more_option=1;//assigns the number of meetings to be displayed on each cell after which the more option appears.
        // Creating the rows and cloumns of the table as per the rooms table in the ekbooking database.
        // to add new rooms dont change anything in this file.
        // just update the rooms table in the database and refresh the page to see the changes.
        while($i<(sizeof($room_id)/$col_count)){ //check for number of rows
            echo "<div class='row' style='margin:10px 0px 0px 0px;'>";
            echo "<tr id='table-layout-inline'>"; //creating a table row
                while($j<$col_count){ //check for number of columns
                    
                    $id=$room_id[$room_count]; //too assign the id of individual room element in the table
                    echo " 
                    <div class='col-lg-3 col-md-6 col-sm-6'>
                    <td id='room_table_data'>
                    <div class='card card-stats' style='width:270px'>
                    <div class='card-header success' data-background-color=green id='$id' >
                                    
									<i class='material-icons unselectable' unselectable='on'>group</i>
								</div>
                                
                    
                    <div class='card-content'>
                                    <h2 class='title' style='white-space:nowrap;'><b><a href='#' class='room-table-view' value='".$room_id[$room_count]."'> $room_name[$room_count]</a></b></h2>
                                   
									
								</div>
                            ";//creating the room cell in the table
                                //echo $room_id[$room_count]; //echoing the room number
                                //echo "<br>"; 
                                $x=0; // this variable is for checking if there are meetings more than the threshhold. if so, show a more 
                                      //option and hide the extra part.
                                $md=$meeting_detail[$room_id[$room_count]];//get all the meeting details for the room
                                //var_dump($md);//for debugging
                                echo "	<div class='card-footer'>
									<div class='stats '>";
                                echo "<i class='material-icons text-success unselectable' id='time-icon-".$room_id[$room_count]."'>schedule</i> ";
                    
										
									            
                                foreach($md as $md1){   
                                    //for displaying all the meeting happening in the room.
                                    echo "<a href='#' class='room-card-footer-view' value='".$md1['m_id']."'>(".substr($md1['s_time'],11,5)." - ".substr($md1['e_time'],11,5).")&nbsp</a>";
                                    $x++;
                                    if($x>$more_option){
                                        echo "More"; //if meeting are more than 1 display more then stop.
                                        //make the room warning if the number of meetings are more than 3.
                                        echo "<script>
                        
                                           $('#".$room_id[$room_count]."').attr('data-background-color','orange');
                       
                                            $('#".$room_id[$room_count]."').toggleClass('success');//change the class for success here
                                            $('#".$room_id[$room_count]."').toggleClass('warning'); //change the class for warning here
                                            $('#time-icon-".$room_id[$room_count]."').toggleClass('text-success'); //change the class for time icon here
                                            $('#time-icon-".$room_id[$room_count]."').toggleClass('text-danger'); //change the class for time icon here
                                            
                                            </script>";
                                      
                                        break;
                                    }// close if
                                }// close foreach
                    echo "</div>
								</div>
				                        ";
                    echo "
                        
                        </div>
                        </td>
                        </div>";//closing html tags
                    $j++;//increment column
                    if($room_count<sizeof($room_id)-1){
                        $room_count++; //increment the roomcount
                    }
                    else{
                        break; //if roomcount more than number of rooms, break.
                    }
                }//close inner while
            echo "</tr>";//close html tags
            echo "</div>";
            $i++;//increment row.
            $j=0;//rest coumn to 0.
        }//close outer while
        echo "</table>";//close table
        echo "</div>";//close div
                
        
        //end php.
        ?>
                <div id="graph-view" class="hidden">

                </div>



                <div class="modal fade" id="viewRoom" tabindex="-1" role="dialog" aria-labelledby="View Room" aria-hidden="true">
                    <div class="modal-dialog" id="room-table">
                        <script>
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php } ?>