<?php
require ("_lib/class.phpmailer.php");
$mail = new PHPMailer();
function filter($data) {
	$data = trim(htmlentities(strip_tags($data)));
	
	if (get_magic_quotes_gpc())
		$data = stripslashes($data);
	
	return $data;
}

$to = "uchennaanih16@gmail.com";
$name =  filter($_POST['name']);
$subject = "Message From user";
$email = filter($_POST['email']);
$phone = filter($_POST['phone']);
$message = filter($_POST['message']);


$mail->IsSMTP();//set mailer to use SMTP
$mail->From = $email;
$mail->FromName = $name;
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Port = 587;
$mail->Username = "anihuchenna16@gmail.com";
$mail->Password = "nomsky24";
$mail->WordWrap = 70;
$mail->IsHTML(true);
$mail->Subject = $subject;
$mail->Body = $message;

if($mail->send()){
    echo "email sent";
}else {
    echo "mail not sent". $mail->ErrorInfo;
}


?>