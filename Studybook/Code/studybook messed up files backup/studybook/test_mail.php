<html>
<head>
<title>PHPMailer - SMTP test</title>
</head>
<body>

<?php

require_once('class.phpmailer.php');

$mail             = new PHPMailer();

$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "cse.msstate.edu"; // SMTP server
$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
                                           // 0 = no debug output
                                           // 1 = errors and messages
                                           // 2 = messages only

$mail->SetFrom('StudyBook', 'DCSP Group 1');

//$mail->AddReplyTo("name@yourdomain.com","First Last");

$mail->Subject    = "PHPMailer Test";

$mail->Body    = "This is a test message.?"; 


$address = "nn149@msstate.edu";
$mail->AddAddress($address, "Joe Crumpton");


if(!$mail->Send())
{
  echo "Mailer Error: " . $mail->ErrorInfo;
}
else
{
  echo "Message sent!";
}

?>

</body>
</html>
