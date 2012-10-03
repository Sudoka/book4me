<?php 
session_start();
include('variables.php');
require_once "../../../../php/PEAR/Mail.php";
 
					$to = $_SESSION["to"] . '@iitk.ac.in';
					echo $to;
					$secret = $_SESSION["secret"];
					echo $secret;
					$subject ="book4me forgot password confirmation link";
					$body = "Please click http://" . $site . "activate.php?secret=" . $secret . "&&id=" .$_SESSION['to'] . " to complete forgot password request.";
		
		$headers = array ('From' => $from,
		'To' => $to,
		'Subject' => $subject);
		$smtp = Mail::factory('smtp',
		array ('host' => $host,
				'port' => $port,
				'auth' => true,
				'username' => $username,
				'password' => $password));
 
		if($mail = $smtp->send($to, $headers, $body)) echo "a mail sent";
		else echo "fail retry again";
		session_destroy();
		header('Location: login.php');
		?>