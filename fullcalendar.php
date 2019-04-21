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
    
    <?php include('header2.php'); ?>
    <meta charset='utf-8' />
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!--  Material Dashboard CSS    -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!--  Material Dashboard CSS    -->
    <link href="css/material-dashboard.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <!--     Fonts and icons     -->
    <link href='css/icons.css' rel='stylesheet' type='text/css'>
    <link href="css/login-register.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/font-awesome.css">
    <link href='css/fullcalendar.min.css' rel='stylesheet' /> <!-- loading the css part of the calendar. -->
    <link href='css/fullcalendar.print.min.css' rel='stylesheet' media='print' /><!-- css part when the calendar needs to be printed. -->
    <link href="css/flatpickr.min.css" rel="stylesheet"/>
    <link href="css/material_red.css" rel="stylesheet"/>
 
	<!-- jQuery -->

 

  

    <script src='js/moment.min.js'></script>
    <script src='js/jquery.min.js'></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/material.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.js" type="text/javascript"></script>
    <script src="js/login-register.js" type="text/javascript"></script>
    <script src='js/fullcalendar.min.js'></script>
      <!--  Notifications Plugin    -->
    <script src="js/bootstrap-notify.js"></script>
    <script src="js/flatpickr.js"></script>
    <!--  Google Maps Plugin    -->
  <!--  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>-->

    <!-- Material Dashboard javascript methods -->
    <script src="js/material-dashboard.js"></script>

  
    <script> // echo the jquery codes for it to work in a php file. 
                   //client side script is not understood by server the side script.

  

	$(document).ready(function() {

		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay,listWeek'
			},
			defaultDate: new Date(),
			editable: false, // allows resizing and dragging of the events in the interactive calendar.
			navLinks: true, // can click day/week names to navigate views
			eventLimit: true, // allow 'more' link when too many events
			events: {
				url: 'php/get-events.php', //get the events stored in the json file and displays on the interactive calendar.
				error: function() { 
					$('#script-warning').show(); //error if the server is not working.
				}
			},
            loading: function(bool) {
				$('#loading').toggle(bool); //loading of the interactive calendar.
			},
			
			eventClick: function(event,jsEvent,view) {
                if(event.m_id) {
                    // $('#view-meeting').toggle(); //show the display for 'edit a meeting' sidebar.
                    $('#meetingid').val(event.m_id);
                    $('#view-button').click();
                    // var link = 'home.php?m_id=' + event.m_id; //the link that is to be called again.
                    // delete the above link and use a local variable to pass the variable m_name. easier and quicker solution.
                    // window.location.href = link; 
                    // for the edit part, store the link in a variable in jquery and call it in php so there is no need to load a page again!
                    //$('#add-meeting').toggle(); //hide the display for the 'add a booking' side-bar
                    return false;
       }
		
		},
                eventColor:'red', //change the color for the events on the calendar!
                eventRender: function(event, element) {
                    var url = 'php/view-event-details.php?m_id=' + event.m_id;
                    var start = moment(event.start).format("hh:mm A");
                    var end = moment(event.end).format("hh:mm A");
                    
                    $.ajax({
                        url: url,
                        success: function(data)
                        {
                            var json = $.parseJSON(data);
                            $(element).tooltip({
                            html: true,
                            title: "<b>Meeting Name:</b> " + json.m_name + "<br><b>Room Name:</b> " + json.r_name + "<br><b>Timings:</b> " + start + "-" + end + "<br><b>Booked By:</b> " + json.s_name
                            });
                        }
                    });
                }
		
	});
    });

</script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">


    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>
	
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
        .form-group{
          margin:3px 0 0 0;
        }
        body {

         
        }
        
        #script-warning {
            display: none;
            
        }
        
        #loading {
            display: none;
            position: relative;
            top: -20px;
            right: 10px;
        }
        
        #calendar {
            float: right;
            max-width: 70%;
            display: block;
            padding: 0 10px;
            align-content: center;
            align-items: center;
            margin: 80px 170px 0px 0px;
        }
        
     .fc-day-number,.fc-more
        {
            color:black;
            font-weight:bold;
        }
        

    </style>


<body style="overflow: scroll;">
  <div class="wrapper">
    <div class="main-panel"><div class="content"><div class="container-fluid">  
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
                            Add a Meeting
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
                            Filtered Meeting Search
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
        
        
        
        
        
        
        
        
        
        
        
        
        
        
            
    
    
    
    <div class="modal fade login" id="loginModal">
		      <div class="modal-dialog login animated">
    		      <div class="modal-content">
    		         <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Add a booking</h4>
                    </div>
                    <div class="modal-body">  
                        <div class="box">
                             <div class="content">
                                
                                <div class="division">
                                    <div class="line l"></div>
                                    <div class="line r"></div>
                                </div>
                                <div class="error"></div>
                                <div class="form loginBox">
                                    <form method="post" accept-charset="UTF-8" action="add_booking.php" id="addabooking">
                                    <div class="form-group label-floating">
		                              <label class="control-label">Meeting Name</label>
                                      <input type="text" class="form-control" name="m_name" required>
                                    </div>
                                    <div class="form-group label-floating">
		                              <label class="control-label">Staff Name</label>
                                      <input type="text" class="form-control" name="s_name" required>
                                    </div>
                                    <div class="form-group label-floating">
		                              <label class="control-label">Staff ID</label>
                                      <input type="text" class="form-control" name="s_id" required>
                                    </div>
                                    <div class="form-group label-floating">
		                              <label class="control-label">Date</label>
                                      <input type="text" class="form-control" id='datetimepicker4' name="Date" required>
                                        
                                           
                                        <script type="text/javascript">
                                           flatpickr("#datetimepicker4", {enableTime: false, minDate: "today",weekNumbers: true});
                                        </script>   
                                    </div>    
                                    <div class="form-group label-floating">
		                              <label class="control-label">Start Time</label>
                                      <input type='text' class="form-control" id='datetimepicker1' name="s_time" required />
                    
                                        <script type="text/javascript">
                                            flatpickr("#datetimepicker1",{enableTime: true,
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
                                    <div class="form-group label-floating">
		                              <label class="control-label">End Time</label>
                                      <input type='text' class="form-control" id='datetimepicker2' name="e_time" required />
                    
                                        <script type="text/javascript">
                                           flatpickr("#datetimepicker2",{enableTime: true,
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
                                      <br>
                                      <label style="margin-left:10px;">Room Allotment</label>
                                      <div class="radio">
                                          <label>
                                              <input type="radio" name="optionsRadios" id="automatic" checked="true">
                                              Automatic
                                          </label>
                                          <label>
                                              <input type="radio" id="manual" name="optionsRadios">
                                              Manual
                                          </label>
                                      </div>
                                      
                                      <script>
                                        $('.radio').click(function(){
                                          if($('#automatic').prop('checked')){
                                            $('#nogtog').html("Number of Guests");
                                            $('#addabooking').attr('action','add_booking.php');
                                          }
                                          else if($('#manual').prop('checked')){
                                            $('#nogtog').html("Room Number");
                                            $('#addabooking').attr('action','add_booking_manual.php');
                                          }
                                        });
                                      </script>
                                    <div class="form-group label-floating">
		                              <label class="control-label" id="nogtog">Number of Guests</label>    
                                      <input type="number" class="form-control" name="guests" required>
                                      </div>
                                    <div class="form-group label-floating">
		                              <label class="control-label">Contact</label>
                                      <input type="number" class="form-control" name="contact" required>
                                      </div>
                                    <div class="form-group label-floating">
		                              <label class="control-label">E-Mail</label>
                                      <input id="email" class="form-control" type="text" name="email">
                                      </div>
                                    <button class="btn btn-default btn-login" value="Add a meeting" >Add a meeting</button>
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
                                <div class="form viewBox" id="testforenter" id="testforenter">
                                    <form  accept-charset="UTF-8" onclick="return false;" >
                                    <input type="number" class="form-control" placeholder="Meeting ID" name="m_id" id="meetingid" required>
                                    
                                    <input class="btn btn-default btn-login" id="view-button" type="submit" value="View a meeting" onclick="getMeeting()">
                                    </form>
                                  
                                </div>
                             </div>
                        </div>
                        
                    </div>
                      
    		      </div>
		      </div>
		  </div>
        
        <div class="modal fade view" id="viewModal2" >
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
        
                                              
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        <div class="modal fade login" id="addRoom">
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
		
        

  
    <div id='script-warning'>
        <code>php/get-events.php</code> must be running.
    </div>

    <div id='loading'>loading...</div>

    <div id='calendar' style="overflow:scroll; height:500px;"></div>
  </div>
      </div></div> </div>

</body>

</html>
<?php } ?>
