<?php
	include("../config.php");
	
    $con=mysqli_connect($server,$username,$password,$db);
    		date_default_timezone_set('Asia/Dubai');


    $username=mysqli_real_escape_string($con,$_POST["username"]);
	$password=mysqli_real_escape_string($con,$_POST["password"]);
	
	$flag=0;
	
	
	if(mysqli_connect_errno())
    {
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	$sql="SELECT * FROM user_profile;";
    
	if($result=mysqli_query($con,$sql))
		{
			while($row=mysqli_fetch_assoc($result))
				{ 
                    
	    			if($row['password']==$password && $row['username']==$username)
	    				{
                            session_start();
                            $_SESSION['Login']=$username;
	    					header("Location: ../home.php");
	    				}
                    else
                    	{
                         continue; $flag=1;
                    	}
	    		}
            if($flag) {session_start(); $_SESSION['Message']="Login Unsuccessful";
                        header("Location: ../index.php");}
            mysqli_free_result($result);
		}
    else
    {
        echo "Username invalid. Please enter a valid username!";
    }
	
	mysqli_close($con);
?>