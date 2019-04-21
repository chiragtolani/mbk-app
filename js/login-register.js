// If values are not coming in edit form, remove $('input').html(''); for that form.
function showViewForm(){

    $('.viewBox').fadeIn('fast'); 
    $('.modal-title').html('<br>View/Edit a booking');
    $('.error').removeClass('alert alert-danger').html(''); 
    $('input').html('');
}
function showViewForm2(){

    $('.viewBox2').fadeIn('fast'); 
    $('.modal-title').html('<br>View/Edit a booking');
    $('.error').removeClass('alert alert-danger').html('');
    $('input').html('');
}

function showLoginForm(){

    $('.loginBox').fadeIn('fast');    
    $('.modal-title').html('<br>Add a booking');
    $('.error').removeClass('alert alert-danger').html('');
    $('input').html('');
}

function showLoginForm2(){

    $('.loginBox2').fadeIn('fast');    
    $('.modal-title').html('<br>Add a booking');
    $('.error').removeClass('alert alert-danger').html('');
    $('input').html('');
}

function showCMSForm(){

    $('.CMSBox').fadeIn('fast');    
    $('.modal-title').html('<br>Add an advertisement');
    $('.error').removeClass('alert alert-danger').html('');
    $('input').html('');
}

function showScheduleForm(){

    $('.ScheduleBox').fadeIn('fast');    
    $('.modal-title').html('<br>Add a Schedule');
    $('.error').removeClass('alert alert-danger').html(''); 
    $('input').html('');
}

function showAddRoom(){

    $('.addRoom').fadeIn('fast');    
    $('.modal-title').html('<br>Add a Room');
    $('.error').removeClass('alert alert-danger').html(''); 
    $('input').html('');
}

function showViewRoom(){

    $('.viewRoom').fadeIn('fast');    
    //$('#viewRoomHeading').html('<br>View Meetings');
    $('.error').removeClass('alert alert-danger').html(''); 
    $('input').html('');
}

function openLoginModal(){
    

    showLoginForm();
    setTimeout(function(){
        $('#loginModal').modal('show');    
    }, 230);
    
}
function openLoginModal2(){
    

    showLoginForm2();
    setTimeout(function(){
        $('#loginModal2').modal('show');    
    }, 230);
    
}

function openViewModal2(){
    if(window.location.href.indexOf("m_id") > -1) {
       

    showViewForm2();
    setTimeout(function(){
        $('#viewModal2').modal('show');    
    }, 230);
    }
  else if(window.location.href.indexOf("r_id") > -1){
    showViewRoom();
    setTimeout(function(){
        $('#viewRoom').modal('show');    
    }, 230);
  }
  else if(window.location.href.indexOf("#success") > -1){
    alert("Successful!");
  }
  else if(window.location.href.indexOf("#fail") > -1){
    alert("Please Try Again!");
  }
  
}
function openViewModal(){
    showViewForm();
    setTimeout(function(){
        $('#viewModal').modal('show');    
    }, 230);
    
}

function openAddRoom(){
    showAddRoom();
    setTimeout(function(){
        $('#addRoom').modal('show');    
    }, 230);
    
}

function openCMSModal(){
    showCMSForm();
    setTimeout(function(){
        $('#CMSModal').modal('show');    
    }, 230);
    
}

function openScheduleModal(){
    showScheduleForm();
    setTimeout(function(){
        $('#ScheduleModal').modal('show');    
    }, 230);
    
}

function getMeeting() {
    //window.location.href="home.php?m_id="+$('#meetingid').val();
    $("#meeting_id_modal").text($("#meetingid").val());
    $("#viewModal").modal('hide');
     showViewForm2();
    setTimeout(function(){
        $('#viewModal2').modal('show');    
    }, 230);
}

function addCMS(){
    window.location.href='php/phpupload_content.php';
}

function loginAjax(){
    /*   Remove this comments when moving to server
    $.post( "/login", function( data ) {
            if(data == 1){
                window.location.replace("/home");            
            } else {
                 shakeModal(); 
            }
        });
    */

/*   Simulate error message from the server   */
     shakeModal();
}

function shakeModal(){
    $('#loginModal .modal-dialog').addClass('shake');
             $('.error').addClass('alert alert-danger').html("Invalid email/password combination");
             $('input[type="password"]').val('');
             setTimeout( function(){ 
                $('#loginModal .modal-dialog').removeClass('shake'); 
    }, 1000 ); 
}

function delete_booking(){
  if(confirm("Are you sure you want to delete?")){
    window.location.href="php/deletebooking.php?m_id="+$('#mid').val();
  }
}

function edit(){
    if($('#edit-button').val()=="Edit meeting"){
        $('.view').removeAttr('readonly');
        $('#edit-button').val('Save Changes');

    }
    else{
        window.location.href='php/editbooking.php?m_id='+$('#mid').val()+'&m_name='+$('#m_name').val()+'&s_name='+$('#s_name').val()+'&s_id='+$('#s_id').val()+'&date='+$('#edit-date').val()+'&start='+$('#edit-stime').val()+'&end='+$('#edit-etime').val()+'&nog='+$('#nog').val()+'&room='+$('#room').val()+'&cont='+$('#contact').val()+'&email='+$('#email').val();
    }
}

function addRoom(){
    window.location.href='php/add_room.php?r_name='+$('#rname').val()+'&r_id='+$('#rid').val()+'&capacity='+$('#capacity').val();
}

$(function(){
	
	$(".card-header").click(function(){ //On-click a table cell
                if(confirm("Are you sure you want to toggle?")){
					$.ajax({
								url: "php/room-status-toggle.php?r_id="+$(this).attr('id')
							});
				}
				
                var a = $(this).attr('class').split(' '); //get the class of the cell
                /*if(a[1]=="success"){ //if its success, toggle with occupied success.
					if(confirm("Are you sure you want to block the room?")){
						
						$(this).toggleClass("success");
						$(this).toggleClass("occupied_a");
						$(this).attr("data-background-color","red");
					}
                }
                else if(a[1]=="warning"){ //if its warning toggle with occupied-warning.
                    $(this).toggleClass("warning");
                    $(this).toggleClass("occupied_b");
                    $(this).attr("data-background-color","red");
                }
                else if(a[1]=="occupied_a"){ //if its occupied but availabe before it was occupied, toggle with success
                    $(this).toggleClass("occupied_a");
                    $(this).toggleClass("success");
                    $(this).attr("data-background-color","green");
                }
                else if(a[1]=="occupied_b"){ //if its occupied but warning befor, toggle with warning
                    $(this).toggleClass("occupied_b");
                    $(this).toggleClass("warning");
                    $(this).attr("data-background-color","orange");
                }*/
			});
			setInterval(function(){
					$.ajax({
						url: "php/meeting_status.php",
						dataType : 'json',
						success : function(data){
							//alert('works');
							var status=0,r_id=0;
							for(var i=0;i<data.length;i++){
								r_id=data[i].r_id;
								status=data[i].status;
								var a = $('#'+r_id).attr('class').split(' '); //get the class of the cell
								if(status==1){
									$('#'+r_id).attr("data-background-color","red");
									if(a[1]=="success"){ //if its success, toggle with occupied success.
										$('#'+r_id).toggleClass("success");
										$('#'+r_id).toggleClass("occupied_a");
										//$('#'+r_id).attr("data-background-color","red");
									}
									else if(a[1]=="warning"){ //if its warning toggle with occupied-warning.
										$('#'+r_id).toggleClass("warning");
										$('#'+r_id).toggleClass("occupied_b");
										//$('#'+r_id).attr("data-background-color","red");
									}
									
								}
								else{
									if(a[1]=="occupied_a" || a[1]=="success"){ //if its occupied but availabe before it was occupied, toggle with success
										$('#'+r_id).toggleClass("occupied_a");
										$('#'+r_id).toggleClass("success");
										$('#'+r_id).attr("data-background-color","green");
									}
									else if(a[1]=="occupied_b" || a[1]=="warning"){ //if its occupied but warning befor, toggle with warning
										$('#'+r_id).toggleClass("occupied_b");
										$('#'+r_id).toggleClass("warning");
										$('#'+r_id).attr("data-background-color","orange");
									}
								}
							}
						}
					});
					//alert("interbasfsad");    
            },1000);
				
			
			//end click function
			
		
          
	  $('.room-card-footer-view').click(function(){
		var c=$(this).attr('value');
		$('#meetingid').val(c);
		//openViewModal2();
		$('#view-button').click();
	  });
	  $('.room-table-view').click(function(){
			showViewRoom();
			var b = $(this).attr("value");
			//alert(b);
			$("#room-table").load("php/room-view-booking.php?r_id="+b);   
			setTimeout(function(){
				$('#viewRoom').modal('show');    
			}, 230);
		});
	  $("#view-button").click(function(){
		  var a = $("#meetingid").val();
		  $("#view-edit-modal-body").load("php/view-edit-modal.php?m_id="+a);
	  });
	  $('#testforenter').keypress(function(event){
		  if(event.which==13){
			  $('#view-button').click(); 
		  } 
		});

	});

function getForm(){
	$("#viewModal3").modal('hide');
		//alert($('#mid-filter').val());
	if($('#mid-filter').val().length>0){
		$('#meetingid').val($('#mid-filter').val());
		//alert($('#meetingid').val());
		$('#view-button').click();
		
	}
	else if($('#room_name_filter').val().length>0){
		$.ajax({
			url: "php/getRoomId.php?r_name="+$('#room_name_filter').val(),
			success: function(a){
				var r_id = a;
				showViewRoom();
				$("#room-table").load("php/room-view-booking.php?r_id="+r_id);   
				setTimeout(function(){
					$('#viewRoom').modal('show');    
				}, 230);
				//alert(r_id);
			}
		});
		
	}
	//order for openViewModal4 variables => sdate,edate,stime,etime,sid,sname,0-5
	else if(($('#s_time_filter').val().length>0 || $('#e_time_filter').val().length>0) && ($('#s_date_filter').val().length>0 || $('#e_date_filter').val().length>0)){
		openViewModal4($('#s_date_filter').val(),$('#e_date_filter').val(),$('#s_time_filter').val(),$('#e_time_filter').val(),0,0,3);
	}
	else if($('#s_date_filter').val().length>0 || $('#e_date_filter').val().length>0){
		openViewModal4($('#s_date_filter').val(),$('#e_date_filter').val(),0,0,0,0,1);
	}
	else if($('#s_time_filter').val().length>0 || $('#e_time_filter').val().length>0){
		openViewModal4(0,0,$('#s_time_filter').val(),$('#e_time_filter').val(),0,0,2);
	}
	else if($('#s_id_filter').val().length>0){
		openViewModal4(0,0,0,0,$('#s_id_filter').val(),0,4);
	}
	else if($('#s_name_filter').val().length>0){
		openViewModal4(0,0,0,0,0,$('#s_name_filter').val(),5);
	}
	
	
	return false;
}
function openViewModal3(){
	$('#filterMeetings').load('filtermeetings.html');
    showViewForm3();
    setTimeout(function(){
        $('#viewModal3').modal('show');    
    }, 230);
	
    
}
function showViewForm3(){

    $('.viewBox3').fadeIn('fast'); 
    $('.modal-title').html('<br>View/Edit a booking');
    $('.error').removeClass('alert alert-danger').html(''); 
	$('input').val('');
}

function openViewModal4(s_date,e_date,s_time,e_time, s_id,s_name,a){
	//alert(s_date,e_date)
	if(a==1){
		$('#viewMeetingsByDate').load('php/view-meeting-modal.php?s_date='+s_date+'&e_date='+e_date);
		showViewForm4();
		setTimeout(function(){
			$('#viewModal4').modal('show');    
		}, 300);
	}
	else if(a==2){
		$('#viewMeetingsByDate').load('php/view-meeting-modal.php?s_time='+s_time+'&e_time='+e_time);
		showViewForm4();
		setTimeout(function(){
			$('#viewModal4').modal('show');    
		}, 300);
	}
	else if(a==3){
		$('#viewMeetingsByDate').load('php/view-meeting-modal.php?s_time='+s_time+'&e_time='+e_time+'&s_date='+s_date+'&e_date='+e_date);
		showViewForm4();
		setTimeout(function(){
			$('#viewModal4').modal('show');    
		}, 300);
	}
	else if(a==4){
		$('#viewMeetingsByDate').load('php/view-meeting-modal.php?s_id='+s_id);
		showViewForm4();
		setTimeout(function(){
			$('#viewModal4').modal('show');    
		}, 300);
	}
	else if(a==5){
		//alert('php/view-meeting-modal.php?s_name='+s_name);
		s_name=s_name.replace(/ /g,'%20');
		//alert(s_name);
		$('#viewMeetingsByDate').load('php/view-meeting-modal.php?s_name='+s_name);
		showViewForm4();
		setTimeout(function(){
			$('#viewModal4').modal('show');    
		}, 300);
	}
	
    
}
function showViewForm4(){

    $('.viewBox4').fadeIn('fast'); 
    $('.modal-title').html('<br>View bookings');
    $('.error').removeClass('alert alert-danger').html(''); 
	$('input').val('');
}