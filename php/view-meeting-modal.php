
              <div class="form viewBox4">
				  
				  
				  <?php
                       include("../config.php");


            
                     if((isset($_GET['s_date']) or isset($_GET['e_date'])) and (isset($_GET['s_time']) or isset($_GET['e_time']))){
						$con=mysqli_connect($server,$username,$password,$db) or die(mysqli_error());    //Connect to the database
						if(isset($_GET['s_date'])){
							$s_date=$_GET['s_date'];
						}
						if(isset($_GET['e_date'])){
							$e_date=$_GET['e_date'];
						}
						if(strlen($s_date)<2){
							$s_date=$e_date;
						}
						else if(strlen($e_date)<2){
							$e_date=$s_date;
						}
						if(isset($_GET['s_time'])){
							$s_time=$_GET['s_time'];
						}
						if(isset($_GET['e_time'])){
							$e_time=$_GET['e_time'];
						}
						if(strlen($s_time)<2){
							$s_time=date('H:i:s',strtotime('-12 hours', strtotime($e_time)));
						}
						else if(strlen($e_time)<2){
							$e_time=date('H:i:s',strtotime('+12 hours', strtotime($s_time)));
						}
						$s_time=$s_date.' '.$s_time;
					   	$e_time=$e_date.' '.$e_time;
						//echo $s_time." ".$e_time;
						$sql="select * from booking where s_time between '".$s_time."' and '".$e_time."' order by s_time;";
						$meeting_details=array();
						$meeting_detail=array();
						if($res=mysqli_query($con,$sql)){
							while($row=mysqli_fetch_assoc($res)){
								$meeting_detail['m_id']=$row['m_id'];
								$meeting_detail['m_name']=$row['m_name'];
								$meeting_detail['s_name']=$row['s_name'];
								$meeting_detail['s_id']=$row['s_id'];
								$meeting_detail['s_time']=$row['s_time'];
								$meeting_detail['e_time']=$row['e_time'];
								$meeting_detail['r_id']=$row['r_id'];
								$meeting_detail['guests']=$row['guests'];
								$meeting_detail['contact']=$row['contact'];
								$meeting_details[]=$meeting_detail;
								
							}
						}
						foreach($meeting_details as $md){
							//echo $md['m_id']." ";
						}
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
            
              foreach($meeting_details as $res){
                
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
				  <?php
						mysqli_close($con);

					}  
				  
				  
				  
				  
				  
				  
				  
				  
				  
				
               
                                    
                    else if(isset($_GET['s_date']) or isset($_GET['e_date'])){
						$con=mysqli_connect($server,$username,$password,$db) or die(mysqli_error());    //Connect to the database
						if(isset($_GET['s_date'])){
							$s_date=$_GET['s_date'];
						}
						if(isset($_GET['e_date'])){
							$e_date=$_GET['e_date'];
						}
						if(strlen($s_date)<2){
							$s_date=date('Y-m-d',strtotime('-1 day', strtotime($e_date)));
						}
						else if(strlen($e_date)<2){
							$e_date=date('Y-m-d',strtotime('+1 day', strtotime($s_date)));
						}
						//echo $s_date." ".$e_date;
						$sql="select * from booking where date between '".$s_date."' and '".$e_date."' order by s_time;";
						$meeting_details=array();
						$meeting_detail=array();
						if($res=mysqli_query($con,$sql)){
							while($row=mysqli_fetch_assoc($res)){
								$meeting_detail['m_id']=$row['m_id'];
								$meeting_detail['m_name']=$row['m_name'];
								$meeting_detail['s_name']=$row['s_name'];
								$meeting_detail['s_id']=$row['s_id'];
								$meeting_detail['s_time']=$row['s_time'];
								$meeting_detail['e_time']=$row['e_time'];
								$meeting_detail['r_id']=$row['r_id'];
								$meeting_detail['guests']=$row['guests'];
								$meeting_detail['contact']=$row['contact'];
								$meeting_details[]=$meeting_detail;
								
							}
						}
						foreach($meeting_details as $md){
							//echo $md['m_id']." ";
						}
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
            
              foreach($meeting_details as $res){
                
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
				  <?php
						mysqli_close($con);

					}            
                              
					
                                    
                   else if(isset($_GET['s_time']) or isset($_GET['e_time'])){
						$con=mysqli_connect($server,$username,$password,$db) or die(mysqli_error());    //Connect to the database
						if(isset($_GET['s_time'])){
							$s_time=$_GET['s_time'];
						}
						if(isset($_GET['e_time'])){
							$e_time=$_GET['e_time'];
						}
						if(strlen($s_time)<2){
							$s_time=date('H:i:s',strtotime('-12 hours', strtotime($e_time)));
						}
						else if(strlen($e_time)<2){
							$e_time=date('H:i:s',strtotime('+12 hours', strtotime($s_time)));
						}
						//echo $s_time." ".$e_time;
					   	$s_time=date('Y-m-d').' '.$s_time;
					   	$e_time=date('Y-m-d').' '.$e_time;
						$sql="select * from booking where s_time between '".$s_time."' and '".$e_time."' order by s_time;";
						$meeting_details=array();
						$meeting_detail=array();
						if($res=mysqli_query($con,$sql)){
							while($row=mysqli_fetch_assoc($res)){
								$meeting_detail['m_id']=$row['m_id'];
								$meeting_detail['m_name']=$row['m_name'];
								$meeting_detail['s_name']=$row['s_name'];
								$meeting_detail['s_id']=$row['s_id'];
								$meeting_detail['s_time']=$row['s_time'];
								$meeting_detail['e_time']=$row['e_time'];
								$meeting_detail['r_id']=$row['r_id'];
								$meeting_detail['guests']=$row['guests'];
								$meeting_detail['contact']=$row['contact'];
								$meeting_details[]=$meeting_detail;
								
							}
						}
						foreach($meeting_details as $md){
							//echo $md['m_id']." ";
						}
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
            
              foreach($meeting_details as $res){
                
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
						
				  <?php
						mysqli_close($con);

					}            
                              
				  	
				  
				                   
                    else if(isset($_GET['s_id']) ){
						$con=mysqli_connect($server,$username,$password,$db) or die(mysqli_error());    //Connect to the database
						$s_id=$_GET['s_id'];
						//echo $s_date." ".$e_date;
						$sql="select * from booking where s_id='".$s_id."' order by s_time;";
						$meeting_details=array();
						$meeting_detail=array();
						if($res=mysqli_query($con,$sql)){
							while($row=mysqli_fetch_assoc($res)){
								$meeting_detail['m_id']=$row['m_id'];
								$meeting_detail['m_name']=$row['m_name'];
								$meeting_detail['s_name']=$row['s_name'];
								$meeting_detail['s_id']=$row['s_id'];
								$meeting_detail['date']=$row['date'];
								$meeting_detail['s_time']=$row['s_time'];
								$meeting_detail['e_time']=$row['e_time'];
								$meeting_detail['r_id']=$row['r_id'];
								$meeting_detail['guests']=$row['guests'];
								$meeting_detail['contact']=$row['contact'];
								$meeting_details[]=$meeting_detail;
								
							}
						}
						foreach($meeting_details as $md){
							//echo $md['m_id']." ";
						}
						?>
						<table id="classTable" class="table table-bordered" style="color:#646464;">
          <thead>
			  Showing all the meetings of ID: <?php echo $s_id; ?> 
          </thead>
          <tbody>
            <tr >
              <td>Meeting ID</td>
              <td>Meeting Name</td>
              <td>Start Time</td>
              <td>End Time</td>
              <td>Room Number</td>
              <td>Contact Details</td>
              
             </tr>
            <?php 
            
              foreach($meeting_details as $res){
                
                echo "<tr id='show-meeting-details-".$res['m_id']."'>"; 
                echo "<td>".$res['m_id']."</td>";
                echo "<td>".$res['m_name']."</td>";
                //echo "<td>".$res['date']."</td>";
                echo "<td>".$res['s_time']."</td>";
                echo "<td>".$res['e_time']."</td>";
                //echo "<td>".$res['s_name']."</td>";
                echo "<td>".$res['r_id']."</td>";
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
				  <?php
						mysqli_close($con);

					} 
				  
				  
				  
				  
				  
				                    
                    else if(isset($_GET['s_name']) ){
						$con=mysqli_connect($server,$username,$password,$db) or die(mysqli_error());    //Connect to the database
						$s_name=$_GET['s_name'];
						//echo $s_date." ".$e_date;
						$sql="select * from booking where s_name like '%".$s_name."%' order by s_time;";
						$meeting_details=array();
						$meeting_detail=array();
						if($res=mysqli_query($con,$sql)){
							while($row=mysqli_fetch_assoc($res)){
								$meeting_detail['m_id']=$row['m_id'];
								$meeting_detail['m_name']=$row['m_name'];
								$meeting_detail['s_name']=$row['s_name'];
								$meeting_detail['s_id']=$row['s_id'];
								$meeting_detail['date']=$row['date'];
								$meeting_detail['s_time']=$row['s_time'];
								$meeting_detail['e_time']=$row['e_time'];
								$meeting_detail['r_id']=$row['r_id'];
								$meeting_detail['guests']=$row['guests'];
								$meeting_detail['contact']=$row['contact'];
								$meeting_details[]=$meeting_detail;
								
							}
						}
						foreach($meeting_details as $md){
							//echo $md['m_id']." ";
						}
						?>
						<table id="classTable" class="table table-bordered" style="color:#646464;">
          <thead>
			  Showing all the meetings booked by people whose names contains '<?php echo $s_name; ?>' 
          </thead>
          <tbody>
            <tr >
              <td>Meeting ID</td>
              <td>Meeting Name</td>
              <td>Start Time</td>
              <td>End Time</td>
              <td>Room Number</td>
              <td>Contact Details</td>
              
             </tr>
            <?php 
            
              foreach($meeting_details as $res){
                
                echo "<tr id='show-meeting-details-".$res['m_id']."'>"; 
                echo "<td>".$res['m_id']."</td>";
                echo "<td>".$res['m_name']."</td>";
                //echo "<td>".$res['date']."</td>";
                echo "<td>".$res['s_time']."</td>";
                echo "<td>".$res['e_time']."</td>";
                //echo "<td>".$res['s_name']."</td>";
                echo "<td>".$res['r_id']."</td>";
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
				  <?php
						mysqli_close($con);

					} 
				  ?>
        
     
            </div>
