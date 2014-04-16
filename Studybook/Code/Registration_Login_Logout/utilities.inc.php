<?php
//Utilities class

class utilities {

//checks if a user is logged in 
public function loggedin(){
if (isset($_SESSION['net_id'])){
return true;
}

else{
return false;
}
}

//gets a specified field from the database
public function getfield($field){
$sth = $_SESSION['net_id'];
$query = "SELECT $field FROM student WHERE netid = '$sth'";
if($query_run = mysql_query($query)){
return mysql_result($query_run,0,$field);
}
else{echo 'query fail';}
}

//sends a confirmation email
public function send_mail($id,$hash){
require_once('class.phpmailer.php');

$mail             = new PHPMailer();

$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "cse.msstate.edu"; // SMTP server
$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
                                           // 0 = no debug output
                                           // 1 = errors and messages
                                           // 2 = messages only

@$mail->SetFrom('Studybook@pluto.cse.msstate.edu', 'Studybook');

//$mail->AddReplyTo("name@yourdomain.com","First Last");

$mail->Subject    = "StudyBook Registration";

$mail->Body    = "Copy and paste this code into the link below: $hash 
					
					http://130.18.209.166/~nn149/loginreg2/check.php "; 


$address = "$id@msstate.edu";
$mail->AddAddress($address, "Joe Crumpton");


if(!$mail->Send())
{
  echo "Mailer Error: " . $mail->ErrorInfo;
}
else
{
 // echo "Message sent!";
}

}

//logout user and destroy session
public function logout(){
if(isset($_POST['logout'])) {
session_destroy();
header('Location: index.php');
}}

}
?>