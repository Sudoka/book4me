<?php session_start();
if(!isset($_SESSION['id'])) header('Location: login.php');

include ('variables.php');
include ('functions.php');

$date = $_GET['date'];
$month = $_GET['month'];
$date = finddate($date, $month);
$name = $_GET['name'];
$start = $_GET['start'];
$end=$_GET['end'];
$room=$_GET['room'];
if($start >= $end){
echo "Please do different bookings for different days.<br>Plese check from <a href='main.php'>calender</a> and proceed.";
}
else{

$conn = new PDO("mysql:host = $dbhost;dbname=$dbname",'root');

$sql = "select * from `book` where `date` = '$date' and `room` = '$room' and ((`start` <= '$start' and `end` > '$start') or (`start` < '$end' and `end` >= '$end')) ";

if($q = $conn->query($sql)){

	$r = $q->fetch();
	
	if(!isset($r['id'])) {
		//can book
		$sql2 = "insert into `book` (name,date,start,end,id,room,keywords,description) VALUES (:name,:date,:start,:end,:id,:room,:keywords,:description)";
		$q2 = $conn->prepare($sql2);
		if($q2->execute(array(':name'=>$name,
					':date'=>$date,
					':start'=>$_GET['start'],
					':end'=>$_GET['end'],
					':id'=>$_SESSION['id'],
					':room'=>$_GET['room'],
					':keywords'=>$_GET['keywords'],
					':description'=>$_GET['description']))){
						echo "added";
		}
		else echo "connection failure";
		}
	else{
		echo "slot already booked. Plese check from <a href='main.php'>calender</a> and proceed.";
		}
		
}
else echo "try again later";
}