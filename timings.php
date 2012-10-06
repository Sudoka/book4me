<?php
session_start();
include ('variables.php');
include ('functions.php');
if(!isset($_SESSION['id'])) header('Location: login.php');
//echo '<script> alert("rachit"); </script>';

$date = $_GET['date'];
$_SESSION['date']=$date;
$conn = new PDO("mysql:host = $dbhost;dbname=$dbname",'root');
$prevstart = 0;
$prevend = 0;
$prevroom =0;

$sql = "select * from `book` where `date` = '$date' ORDER BY `start` , `end`";

if($q = $conn->query($sql)){
echo "<h4><div id='h4text'>" .finddaylong(findday($_SESSION['date'])) ."</div><h4>";
echo "<table>";

	while($r = $q->fetch()){
		if(isset($r['id'])){
			if(!(($prevstart==$r['start']) && ($prevend==$r['end']))){
			$prevstart = $r['start'];
			$prevend =  $r['end'];
			$rstart = $r['start'];
			$rend = $r['end'];
			$rdate = $_SESSION['date'];
			echo '<tr> <td id="time_entry" onclick="loadevent(' . $rdate . ',' . $rstart .',' . $rend .');return false;">&nbsp;&nbsp;' . ampm($rstart) . ' - ' . ampm($r['end']) . '</td></tr>';
			}
		}	
	}
echo "</table>";
}
else {
echo 'connecton failed. Click<a href="main.php">here</a>to conrinue.';
}
?>
				