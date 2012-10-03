<?php
session_start();
include('variables.php');

if(isset($_POST['id']) && isset($_POST['password'])){
$id = $_POST['id'];
$password = $_POST['password'];

$conn = new PDO("mysql:host = $dbhost;dbname=$dbname",'root');

$sql = "select * from `login` where `id` = '$id'";

if($q = $conn->query($sql)){

	$r = $q->fetch();
	if(!isset($r['id'])) {
		echo "user not found. Want to <a href='login.php'>Sign Up</a>? Just enter username and password ans submit.";
	}
	else if($r['id']==$id) {
		$sql2 = "update `login` set `password`=?, `activated`=? where `id`=?";
		$q2 = $conn->prepare($sql2);
		$q2->execute(array($password,'0',$id));
		
		$_SESSION['to']=$r['id'];
		$_SESSION['secret']=$r['secret'];
		header('Location: mail.php');
	}
	else echo "unsuccessful";
}
else echo "error";
}
else {
echo ('<html>
<head>
	<title> Event Scheduler </title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="http://fonts.googleapis.com/css?family=Nunito:400,700" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Relex" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Lustria" rel="stylesheet" type="text/css">
	
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
	<script type="text/javascript" src="ui.js"></script>
	<script type="text/javascript" src="fav.js"></script>
</head>

<body><section id="login">
		<div id="login" class="scrollInfo">
		<div id="loginText">
		<div id="htext">
		<h1> Forgot Password?<br>Enter new one!</div>
		<div id="ptext">
		<form name="input" action="forgot.php" method="post">
		Username: <input type="text" name="id">@iitk.ac.in<br>
		Password: <input type="password" name="password"><br>
		<input type="submit" value="Submit"></form></div>
		</div>
		</div>
		</section></body>
	</html>');
}

?>