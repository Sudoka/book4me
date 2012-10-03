<?php
session_start();
include ("variables.php");

$secret = rand() . rand() . rand() . rand();
//$secret = $secret . rand();

$conn = new PDO("mysql:host = $dbhost;dbname=$dbname",'root');
$sql = "insert into `login` (id,password,activated,priority,secret,facebook,name) VALUES (:id,:password,:activated,:priority,:secret,:facebook,:name)";
$q = $conn->prepare($sql);
if($q->execute(array(':id'=>$_SESSION['newid'],
					':password'=>$_SESSION['newpassword'],
					':activated'=>0,
					':priority'=>0,
					':name'=>$_GET['name'],
					':facebook'=>$_GET['facebook'],
					':secret'=>$secret))){
					echo $_SESSION['newid'] . $secret . $_SESSION['newpassword'];
					
					require_once "../../../../php/PEAR/Mail.php";
 
					$to = $_SESSION['newid'] . '@iitk.ac.in';
					$subject ="book4me registration confirmation link";
					$body = "Please click http://" . $site . "activate.php?secret=" . $secret . "&&id=" .$_SESSION['newid'] . " to complete registration";
 
 
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
 }
 else echo "unsuccessful";
	
	?>
					
				
