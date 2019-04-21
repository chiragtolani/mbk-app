<?php



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
       
    
    
require_once "../vendor/autoload.php";
include("../config.php");
$m_id=$_GET['m_id'];
$con=mysqli_connect($server,$username,$password,$db);
$sql="select b.s_name, b.r_id, b.date, b.s_time,r.r_name, b.email from booking b,rooms r where b.m_id = '$m_id' and r.r_id=b.r_id;";
$result = mysqli_query($con, $sql);
   //echo $m_id;

if(mysqli_num_rows($result) > 0){
                //echo $m_id;
                    while($row = mysqli_fetch_assoc($result))
                         {
                            $tempArray = $row;
                       //     array_push($resultArray, $tempArray);

                
                        $name=$row['s_name'];
                        $room=$row['r_id'];
                        $date=$row['date'];
                        $stime=$row['s_time'];
                        $email=$row['email'];
                        $r_name=$row['r_name'];
                       // echo "trshtdydjy";
                    }
                        
                    $emailarr=explode(",",$email);
                    $message="Greetings '$name', <br /><br /><br />\r\n".
                        "You have successfully booked a meeting for the date '$date' at \r\n".
                        "'".substr($stime,11,5)."'.<br />You have been booked in '$r_name' <br />\r\n".
                        "For any changes or updates in your booking, please contact the Conference Center. <br /><br /><br />\r\n".
                        
                        
                        "Triway Technologies <br /><br />".
                        "This is an automated email, please do not attempt responding to the mailer.";
                    
                    echo $message, $email;
                
                    
                    
                    
                }
mysqli_close($con);


$mail = new PHPMailer;

//Enable SMTP debugging. 
$mail->SMTPDebug = 3;                               
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = "mail.triwaytechnologies.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username = "noreply@triwaytechnologies.com";                 
$mail->Password = "ttech@1234";                           
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "ssl";                           
//Set TCP port to connect to 
$mail->Port = 465;                                   

$mail->From = "noreply@triwaytechnologies.com";
$mail->FromName = "Triway Technologies";

foreach($emailarr as $earr){
    $mail->addAddress($earr, $name);
}
$mail->isHTML(true);

$mail->Subject = "Your Meeting has been Confirmed";
$mail->Body = $message;
//$mail->AltBody = "what goes over here?";
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

 
if(!$mail->send()) 
{
    echo "Mailer Error: " . $mail->ErrorInfo;
    echo "<script> window.location.href = '../home.php#mailfail';</script>";
    
} 
else 
{
    
    echo "Message has been sent successfully";
    echo "<script> window.location.href = '../home.php#success';</script>";
}
       
    

?>