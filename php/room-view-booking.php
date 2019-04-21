<div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="viewRoomHeading">View Meetings</h4>
      </div>
      <div class="modal-body">
        
        <div class="box">
        
        
        
        
        
        
        
<?php
	$r_id = $_GET['r_id'];
	
      include("../config.php");
			$con=mysqli_connect($server,$username,$password,$db);
			  
			if (mysqli_connect_errno())
			{
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			 
			$sql = "SELECT b.s_time,b.e_time,b.m_name,b.s_name,b.contact,b.m_id FROM booking b WHERE b.r_id = '$r_id' and b.date='".date('Y-m-d')."';";

			 
			if ($result = mysqli_query($con, $sql))
			{
			    
				$resultArray = array();
				$tempArray = array();
			 
				while($row = mysqli_fetch_assoc($result))
				{
					$tempArray = $row;
				    array_push($resultArray, $tempArray);
				}

			}
			

			 
			mysqli_close($con);
            
			
	
?>
        
        
        
        
        
        
        
        
        
        
        
        
          <table id="classTable" class="table table-bordered" style="color:#646464;">
          <thead>
          </thead>
          <tbody>
            <tr >
              <td>Meeting ID</td>
              <td>Meeting Name</td>
              <td>Start Time</td>
              <td>End Time</td>
              <td>Booked by</td>
              <td>Contact Details</td>
              
             </tr>
            <?php 
            
              foreach($resultArray as $res){
                
                echo "<tr id='show-meeting-details-".$res['m_id']."'>"; 
                echo "<td>".$res['m_id']."</td>";
                echo "<td>".$res['m_name']."</td>";
                echo "<td>".$res['s_time']."</td>";
                echo "<td>".$res['e_time']."</td>";
                echo "<td>".$res['s_name']."</td>";
                echo "<td>".$res['contact']."</td>";
                echo "</tr>";
                echo "<script>
            $('#show-meeting-details-".$res['m_id']."').click(function(){
              //window.location.href='home.php?m_id=".$res['m_id']."';
              $('#meetingid').val('".$res['m_id']."');
              $('#view-button').click();
              showViewForm2();
                setTimeout(function(){
                $('#viewModal2').modal('show');    
              }, 230);
              
          });
            </script>";
              }
            
            ?>
          </tbody>
          </table>
          </div>
          </div>
      <a data-toggle="modal" href="javascript:void(0)" onclick="openLoginModal2();" style="margin-top:60%; margin-left:10%;">
                        
                            <script>
                                $(this).click(function(){
                                  $('#viewRoom').modal('hide');
								  $('#r_id_room_booking').val("<?php echo $r_id; ?>")
                                });
                            </script>
                            <i class="material-icons unselectable">add</i>
                            Add a meeting in this room
                        </a>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Close</button>
        </div>
    </div>