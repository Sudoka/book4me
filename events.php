<?php
session_start();
include ('variables.php');
include ('functions.php');
if(!isset($_SESSION['id'])) header('Location: login.php');
$start = $_GET['start'];
$date = $_SESSION['date'];
$end = $_GET['end'];
$conn = new PDO("mysql:host = $dbhost;dbname=$dbname",'root');

$sql = "select * from `book` where `date` = '$date' and `start` = '$start' and `end` = '$end'";

if($q = $conn->query($sql)){
//echo "<table>";
$s='AM';
$e='AM';
$eend=$end;
$sstart=$start;
if($sstart>11) {$s='PM';
$sstart++;
if($sstart==13) $sstart--;
}
if($eend>11){ $e='PM';
$eend++;
if($eend==13) $eend--;
}
echo "<h4><div id='h3text'>" .($sstart%13) . ":00" . $s ." - " . ($eend%13) .":00" . $e . "</div><h4>";
	while($r = $q->fetch()){
		if(isset($r['id'])){
			$rroom = textroom($r['room']);
			$rid = $r['id'];
			$ridname = getname($rid);
			//echo $r['start'];
			//echo $r['end'];
			//$rstart = $r['start'];
			//$rdate = $_SESSION['date'];
			//echo '<tr> <td id="time_entry" onclick="loadevent(' . $rdate . ',' . $rstart .');return false;">&nbsp;&nbsp;' . $rstart . ':00 - ' . $r['end'] . ':00</td></tr>';
			//echo $r['start'] . $r['room'] . $r['id'];
			echo "<center><h3><div id='h3text'>" . $r['name'] . "</h3></div></center><center><p3>By: &nbsp;</p3><p2>" . $ridname . "</p2></center>";
			echo "<p3>Venue: &nbsp;</p3><p2>" . $rroom . "</p2><br>";
			
			}
	}
//echo "</table>";
}
else {
echo 'connecton failed. Click<a href="main.php">here</a>to conrinue.';
}

?>