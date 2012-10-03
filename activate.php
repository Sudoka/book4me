<?php
include ("variables.php");
session_start();

$id = $_GET['id'];
$secret = $_GET['secret'];

$conn = new PDO("mysql:host = $dbhost;dbname=$dbname",'root');

$sql = "select * from `login` where `id` = '$id'";

if($q = $conn->query($sql)){

	$r = $q->fetch();
	if(!isset($r['id'])) echo "error... try again later.";
	else if($r['id']==$id && $r['secret']=$secret) {
		echo $r['id'];
		$sql2 = "update `login` set `activated`=? where `id`=?";
		$q2 = $conn->prepare($sql2);
		$q2->execute(array('1',$id));
		echo "successfull";
	}
	else echo "error";
	}
else echo "connection failed";

?>