<?php
if(!isset($_SESSION['id'])) header('Location: login.php');?>
<head>
<link rel="stylesheet" type="text/css" href="style.css"></head>

<?php

include('variables.php');
include('functions.php');
date_default_timezone_set('Asia/Calcutta');
$date = getdate();
$date = $date['yday'];
$date++;
?>
<div id="day">
<?php
echo "<table><tr>";
for($i=$date;$i<=$date+7;$i++){
$daynum = findday($i);
$daylong = finddaylong($daynum);
echo '<td id="day_entry" onclick="loadday(' . $i .');return false;">' . $daylong . '</td>';
}
//echo "</table>";
?>
 <?php //echo '<td id="day_entry" onclick="loadday(1);return false;">html test</td></tr>';?>
</table>
</div>
<br><br>
<div id="time_event">
<div id="time">
<table>
<tr> <td id="time_entry">7:00</td></tr>
<tr> <td id="time_entry">8:00</td></tr>
<tr> <td id="time_entry">09:00</td></tr>
<tr> <td id="time_entry">10:00</td></tr>
<tr> <td id="time_entry">11:00</td></tr>
<tr> <td id="time_entry">12:00</td></tr>
<tr> <td id="time_entry">13:00</td></tr>
<tr> <td id="time_entry">14:00</td></tr>
<tr> <td id="time_entry">15:00</td></tr>
<tr> <td id="time_entry">16:00</td></tr>
<tr> <td id="time_entry">17:00</td></tr>
<tr> <td id="time_entry">18:00</td></tr>
<tr> <td id="time_entry">19:00</td></tr>
<tr> <td id="time_entry">20:00</td></tr>
<tr> <td id="time_entry">21:00</td></tr>
<tr> <td id="time_entry">22:00</td></tr>
<tr> <td id="time_entry">23:00</td></tr>
</table>
</div>
<div id="event">
this is loaded from event div
</div>
</div>
<script>
function loadday(num){
	//alert('here');
   //$("#time").load('test.php?name=rachit');
   $("#time").load('timings.php?date=' + num);		//add time
   $("#event").load('test.php?name=thiswillgoblank'); //make event div blank
}
function loadevent(date, start, end) {
	$('#event').load('events.php?start=' + start + '&&end=' + end);
}
</script>

