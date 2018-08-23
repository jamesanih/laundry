<?php
require_once './vendor/autoload.php';

function filter($data) {
	$data = trim(htmlentities(strip_tags($data)));
	
	if (get_magic_quotes_gpc())
		$data = stripslashes($data);
	
	return $data;
}
//data from contact.html
//$to = "uchennaanih16@gmail.com";
$name =  filter($_POST['name']);
$subject = "Message From user";
$email = filter($_POST['email']);
$phone = filter($_POST['phone']);
$message = filter($_POST['message']);
$fullmsg = $name. "  with email ". $email. "  and number ". $phone. "  ". "just contacted dbqdrycleaners. <br/><br/>";
$fullmsg .= "Thanks Managment";

// Create the Transport
$transport = (new Swift_SmtpTransport('mail.dbqdrycleaners.com', 587))
  ->setUsername('info@dbqdrycleaners.com')
  ->setPassword('dbqdrycleaners4');

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message('Contact Mailer'))
  ->setFrom(['info@dbqdrycleaners.com' => $name])
  ->setTo(['uchennaanih16@gmail.com' => 'dbqdrycleaners'])
  ->setBody($fullmsg , 'text/html');

// Send the message
if($mailer->send($message, $failures)) {
  echo "message sent";
}else {
  echo "wrong email input". " " . $failures;
}




 ?>
