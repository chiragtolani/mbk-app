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

    <title>Settings</title>
    
    <script src="js/jquery-1.10.2.js" type="text/javascript"></script>  
    <script src="js/jquery-3.1.0.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui.js" type="text/javascript"></script>
    
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!--  Material Dashboard CSS    -->
    <link href="css/material-dashboard.css" rel="stylesheet" />
    <!--<link href="css/material-kit.css" rel="stylesheet" />-->
    <link href="css/material-kit-2.css" rel="stylesheet" />

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="css/demo.css" rel="stylesheet" />

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

<!--  Notifications Plugin    -->
<script src="js/bootstrap-notify.js"></script>


<!-- Material Dashboard javascript methods -->
<script src="js/material-dashboard.js"></script>
 <script src="js/material-kit.js"></script>
<script src="js/bootstrap-tagsinput.js"></script>
</head>

<body>
    

  
        

    <div class="wrapper">
        
           <?php include('header2.php'); ?> 
          <div class="sidebar" data-color="red" data-background="blue" style="margin:100px 0px 0px 0px;">
			<!--
		        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

		        Tip 2: you can also add an image using data-image tag
		    -->
	    	<div class="sidebar-wrapper">
				<ul class="nav" >
                    <br>
                    <br>
	                <li id="acc" class="active">
	                    <a id="acco" href="#">
	                        <i class="material-icons">account_box</i>
	                        <p>Account</p>
	                    </a>
	                    <script>
                            $('#acco').click(function(){
                              if($('#req').hasClass('active')){
                                $('#req').removeClass('active');
                                $('#acc').addClass('active');
                                $('#manual_row').addClass('hidden');
                                $('#request_row').addClass('hidden');
                                $('#edit_profile_row').removeClass('hidden');
                              }
                              else if($('#use').hasClass('active')){
                                $('#use').removeClass('active');
                                $('#acc').addClass('active');
                                 $('#manual_row').addClass('hidden');
                                $('#request_row').addClass('hidden');
                                $('#edit_profile_row').removeClass('hidden');
                              }
                            });
                    </script>
	                </li>
                    <li id="req">
	                    <a id="reqt" href="#">
	                        <i class="material-icons">report</i>
	                        <p>Report/Request</p>
	                    </a>
	                    <script>
                            $('#reqt').click(function(){
                              if($('#acc').hasClass('active')){
                                $('#acc').removeClass('active');
                                $('#req').addClass('active');
                                $('#manual_row').addClass('hidden');
                                $('#edit_profile_row').addClass('hidden');
                                $('#request_row').removeClass('hidden');
                              }
                              else if($('#use').hasClass('active')){
                                $('#use').removeClass('active');
                                $('#req').addClass('active');
                                 $('#manual_row').addClass('hidden');
                                $('#edit_profile_row').addClass('hidden');
                                $('#request_row').removeClass('hidden');
                              }
                            });
                    </script>
	                </li>
                     <li id="use">
	                    <a id="userm" href="#">
	                        <i class="material-icons">library_books</i>
	                        <p>User Manual</p>
	                    </a>
	                    <script>
                            $('#userm').click(function(){
                              if($('#acc').hasClass('active')){
                                $('#acc').removeClass('active');
                                $('#use').addClass('active');
                                $('#request_row').addClass('hidden');
                                $('#edit_profile_row').addClass('hidden');
                                $('#manual_row').removeClass('hidden');
                              }
                              else if($('#req').hasClass('active')){
                                $('#req').removeClass('active');
                                $('#use').addClass('active');
                                 $('#request_row').addClass('hidden');
                                $('#edit_profile_row').addClass('hidden');
                                $('#manual_row').removeClass('hidden');
                              }
                            });
                    </script>
                    </li>
                    <li>
	                    <button class="btn btn-simple btn-danger" onclick="history.go(-1)">
	                        <i class="material-icons" data-background-color="red">arrow_back</i>
	                        <p>Back</p>
	                    </a>
                    </li>
	           </ul>
	    	</div>
		</div>
       <div class="main-panel">
        <div class="content" style="margin-top:130px">
                <div class="container-fluid">
                    <div id="edit_profile_row" class="row">
                        <div class="col-md-11" style="margin-left:60px;">
                            <div class="card">
                                <div class="card-header" data-background-color="red">
                                    <h4 class="title">Edit Profile</h4>
                                    <p class="category">Complete your profile</p>
                                </div>
                                <div class="card-content">
                                   <?php
                                        include("config.php");

                                        $con=mysqli_connect($server,$username,$password,$db);

                                        $sql = "SELECT * FROM user_profile WHERE username='".$_SESSION['Login']."';";
        
                                        if($result=mysqli_query($con,$sql))
                                        {
                                            while($row=mysqli_fetch_assoc($result))
                                            {
                                                
                                                
                                    ?>
                                     <form id="profile_form" onsubmit="return false;">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Username</label>
                                                    <input id="user_inp" type="text" name="username" class="form-control" value="<?php echo $row['username']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Password</label>
                                                    <input id="pass_inp" type="password" name="password" class="form-control" value="<?php echo $row['password']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Email address</label>
                                                    <input id="email_inp" type="email" name="email" class="form-control rr" value="<?php echo $row['email']; ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Name</label>
                                                    <input id="name_inp" type="text" name="name" class="form-control rr" value="<?php echo $row['name']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Staff ID</label>
                                                    <input id="staff_inp" type="text" name="staff_id" class="form-control rr" value="<?php echo $row['staff_id']; ?>" readonly>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Designation</label>
                                                    <input id="desig_inp" type="text" name="desig" class="form-control rr" value="<?php echo $row['desig']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Mobile No.</label>
                                                    <input id="mob_inp" type="text" name="mobile" class="form-control rr" value="<?php echo $row['mobile']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Telephone No.</label>
                                                    <input id="tel_inp" type="text" name="tel" class="form-control rr" value="<?php echo $row['tel']; ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <button id="profile_submit" type="submit" class="btn btn-primary btn-danger pull-right" value="Edit Profile">Edit Profile</button>
                                        <div class="clearfix"></div>
                                        <script>
                                                
                                                $('#profile_submit').click(function(){
                                                        if($('#profile_submit').val()=="Edit Profile")
                                                        {
                                                            $('.rr').removeAttr('readonly');
                                                            $(this).val('Update Profile');
                                                             $(this).html('Update Profile');

                                                            $('#profile_form').attr('method','post');
                                                            $('#profile_form').attr('action','php/update_profile.php');


                                                        }
                                                
                                                        
                                                    
                                                else if($('#profile_submit').val()=="Update Profile")
                                                {
                                                    $('#profile_form').removeAttr('onsubmit');

                                                }
                                            });
                                        </script>
                                       </form> 
                                        
                                        
                                    
                                    <?php }
                                        }
                                    mysqli_close($con);
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                       <div id="request_row" class="row hidden">
                        <div class="col-md-11" style="margin-left:60px">
                            <div class="card">
                                <div class="card-header" data-background-color="red">
                                    <h4 class="title">Ticket</h4>
                                    <p class="category">Let us know if you have any queries or requests.</p>
                                </div>
                                <div class="card-content">
                                  <?php
                                    include("config.php");

                                    $con=mysqli_connect($server,$username,$password,$db);

        
                                    $sql = "SELECT name,email FROM user_profile WHERE username='".$_SESSION['Login']."';";
        
                                    if($result=mysqli_query($con,$sql))
                                    {
                                        while($row=mysqli_fetch_assoc($result))
                                        {
                                    
                                    ?>
                                     <form id="report_form" onsubmit="return false;">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Name</label>
                                                    <input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Email address</label>
                                                    <input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        }
                                    }
                                mysqli_close($con);
                                            ?>
                                         <div class = "row">
                                        <div class="col-md-4">
                                            <div class="form-group label-floating">
                                                <label class="control-label">&nbsp;&nbsp;Comments</label>
                                                <textarea style="border:1px grey solid;width:650px" class="form-control" rows="5" cols="500">&nbsp;&nbsp;</textarea>
                                            </div>
                                        </div>
                                       </div>
                                        
                                        
                                        <button type="submit" class="btn btn-primary btn-danger pull-right">Report</button>
                                        <div class="clearfix"></div>
                                     
                                       </form> 
                                        
                                        
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                       <div id="manual_row" class="row hidden" style="margin-left:60px; ">
                        <div class="col-md-11" style="overflow:scroll; height: 600px;">
                            <div class="card">
                                <div class="card-header" data-background-color="red">
                                    <h4 class="title">User Manual</h4>
                                    <p class="category">Instructions on how to use the application</p>
                                </div>
                                <div class="card-content">
                                  <p style="font-size:16px"><b>
                                      This application provides the user to book meetings without any hassle. It can also generate reports,lets you know your events in your calendar and also allows you to invite other people into your meetings. Here are some instructions that can help you get around the application. 
                                      </b></p>
                            <div id="acordion">
                            <div class="panel-group" id="accordion">
                          <div class="panel panel-border panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <a class="drop" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <h4 class="panel-title text-danger" style="margin-top:-10px;margin-left:10px">
                                    How do I book a meeting?
                                    <i class="material-icons change">keyboard_arrow_up</i>
                                    </h4>
                                </a>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse">
                              <div class="panel-body" style="color:black">
                                  <p style="margin-left:10px;font-size:16px">Click <label style="color:red">Add a Meeting</label> from the sidebar or from the calendar and enter your details. Click Book Meeting and your meeting will be successfully booked. </p>
                              </div>
                            </div>
                          </div>
                          <div class="panel panel-border panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <a class="drop" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-controls="collapseOne">
                                    <h4 class="panel-title text-danger" style="margin-top:-10px;margin-left:10px">
                                    How to book a meeting in a particular room?
                                    <i class="material-icons change">keyboard_arrow_down</i>
                                    </h4>
                                </a>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                              <div class="panel-body" style="color:black">
                                  <p style="margin-left:10px"> Click on the desired room in the grid view of the application. At the end of the dialog box there should be an option to add a meeting.</p>
                              </div>
                            </div>
                          </div>
                          <div class="panel panel-border panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <a class="drop" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-controls="collapseOne">
                                    <h4 class="panel-title text-danger" style="margin-top:-10px;margin-left:10px">
                                    How do I view all the details of a particular meeting?
                                    <i class="material-icons change">keyboard_arrow_down</i>
                                    </h4>
                                </a>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                              <div class="panel-body" style="color:black">
                                <p style="margin-left:10px"> There is more than one way to do so. 
                                  1. In the calendar view, hovering over a meeting provides a summary of details. Clicking an event will display all it's details.
                                  2. Click the room on the grid view where you can view all the meetings for the day and selecting them will display all the details.
                                  3. Filtered Search Tab allows you to search for meetings through a combination of variables.</p>
                              </div>
                            </div>
                          </div>
                           <div class="panel panel-border panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <a class="drop" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-controls="collapseOne">
                                    <h4 class="panel-title text-danger" style="margin-top:-10px;margin-left:10px">
                                    How can I edit the details of a meeting?
                                    <i class="material-icons change">keyboard_arrow_down</i>
                                    </h4>
                                </a>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                              <div class="panel-body" style="color:black">
                                <p style="margin-left:10px"> This option is available when you view details of a meeting. Selecting edit a meeting will let you edit details then and there. The meeting will be altered in the database, not booked as a new one.</p>
                              </div>
                            </div>
                          </div>
                        <div class="panel panel-border panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <a class="drop" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-controls="collapseOne">
                                    <h4 class="panel-title text-danger" style="margin-top:-10px;margin-left:10px">
                                    How can I delete a meeting?
                                    <i class="material-icons change">keyboard_arrow_down</i>
                                    </h4>
                                </a>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                              <div class="panel-body" style="color:black">
                                <p style="margin-left:10px"> This option is available when you view the details of a meeting.</p>
                              </div>
                            </div>
                          </div>
                        <div class="panel panel-border panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <a class="drop" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-controls="collapseOne">
                                    <h4 class="panel-title text-danger" style="margin-top:-10px;margin-left:10px">
                                    How do I change my password?
                                    <i class="material-icons change">keyboard_arrow_down</i>
                                    </h4>
                                </a>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                              <div class="panel-body" style="color:black">
                                <p style="margin-left:10px"> Please contact your system administrator for a new password or username.</p>
                              </div>
                            </div>
                          </div>    
                                  <div class="panel panel-border panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <a class="drop" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-controls="collapseOne">
                                    <h4 class="panel-title text-danger" style="margin-top:-10px;margin-left:10px">
                                    How can I invite contacts and/or groups to a meeting that's booked?
                                    <i class="material-icons change">keyboard_arrow_down</i>
                                    </h4>
                                </a>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                              <div class="panel-body" style="color:black">
                                <p style="margin-left:10px"> Navigate to the User Profile tab on the left  hand side bar and under My Contacts you will notice a red icon against every contact listed. Clicking it will let you invite particular people. The same if followed under the My Groups will do the same thing </p>
                              </div>
                            </div>
                          </div>
                        <div class="panel panel-border panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <a class="drop" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-controls="collapseOne">
                                    <h4 class="panel-title text-danger" style="margin-top:-10px;margin-left:10px">
                                    How do I add contacts and groups?
                                    <i class="material-icons change">keyboard_arrow_down</i>
                                    </h4>
                                </a>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                              <div class="panel-body" style="color:black">
                                <p style="margin-left:10px"> Contacts can be added under the My Contacts tab in user profile and only your contacts can be used to make groups in the My Groups tab.</p>
                              </div>
                            </div>
                          </div>  
                                  <div class="panel panel-border panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <a class="drop" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-controls="collapseOne">
                                    <h4 class="panel-title text-danger" style="margin-top:-10px;margin-left:10px">
                                    How can I view all the meetings I have booked as an user?
                                    <i class="material-icons change">keyboard_arrow_down</i>
                                    </h4>
                                </a>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                              <div class="panel-body" style="color:black">
                                <p style="margin-left:10px"> This section can be found under User Profile > My Meetings.</p>
                              </div>
                            </div>
                          </div>  
                        <div class="panel panel-border panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <a class="drop" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-controls="collapseOne">
                                    <h4 class="panel-title text-danger" style="margin-top:-10px;margin-left:10px">
                                    How do I add and manage rooms?
                                    <i class="material-icons change">keyboard_arrow_down</i>
                                    </h4>
                                </a>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                              <div class="panel-body" style="color:black">
                                <p style="margin-left:10px"> Raise a ticket to request for changes.</p>
                              </div>
                            </div>
                          </div> 
                        <div class="panel panel-border panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <a class="drop" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-controls="collapseOne">
                                    <h4 class="panel-title text-danger" style="margin-top:-10px;margin-left:10px">
                                    How do I add and manage recources? 
                                    <i class="material-icons change">keyboard_arrow_down</i>
                                    </h4>
                                </a>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                              <div class="panel-body" style="color:black">
                                <p style="margin-left:10px"> Raise a ticket request for changes.</p>
                              </div>
                            </div>
                          </div> 
                        <div class="panel panel-border panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <a class="drop" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-controls="collapseOne">
                                    <h4 class="panel-title text-danger" style="margin-top:-10px;margin-left:10px">
                                    How do I address any other queries I may have?
                                    <i class="material-icons change">keyboard_arrow_down</i>
                                    </h4>
                                </a>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                              <div class="panel-body" style="color:black">
                                <p style="margin-left:10px"> Under the help tab, head to report or request and send us your query or requirement. We will get back to you in a day or two.</p>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div> 
                                    <script>
                                           $(".drop").click(function(){
                                              if($(this).children('h4').children('.change').html()=="keyboard_arrow_down")
                                                {
                                               $(this).children('h4').children('.change').html("keyboard_arrow_up");
                                                }
                                            else{
                                                $(this).children('h4').children('.change').html("keyboard_arrow_down");
                                            } 
                                           });
                                    </script>
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
