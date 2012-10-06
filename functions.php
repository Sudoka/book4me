<?php
include ('variables.php');
if(!isset($_SESSION['id'])) header('Location: login.php');

function finddate($date, $month){
$new =0;
for($i=1;$i<$month;$i++){
if($i==1) $new = $new+31;
else if($i==2) $new=$new+29;
else if($i==3) $new=$new+31;
else if($i==5) $new=$new+31;
else if($i==7) $new=$new+31;
else if($i==8) $new=$new+31;
else if($i==10) $new=$new+31;
else $new=$new+30;
}
for($i=1;$i<=$date;$i++){
$new++;
}
return $new;
}

function findday($date){
$day = $date % 7;
//sunday=1
return $day;
}

function finddaylong($day) {

$w =0;
if($day==1) $w='Sun';
else if($day==2) $w='Mon';
else if($day==3) $w='Tue';
else if($day==4) $w='Wed';
else if($day==5) $w='Thu';
else if($day==6) $w='Fri';
else if($day==0) $w='Sat';
return $w;
}

function textroom($room){
$text=$room;
if($room==1) $text='CS101';
if($room==2) $text='CS102';
if($room==3) $text='CS103';
return $text;
}
function getname($id){
include ('variables.php');
$new=$id;
if(isset($_SESSION['id'])){
if($_SESSION['id']==$new) return 'You';
}
$conn = new PDO("mysql:host = $dbhost;dbname=$dbname",'root');
$sql = "select * from `login` where `id` = '$id'";
if($q = $conn->query($sql)){
	$r = $q->fetch();
	if(isset($r['id'])) $new=$r['name'];
}
return $new;
}

function ampm($time)
{
$oldtime = $time;
$s='AM';
if($time>11) {$s='PM';
$time++;
if($time==13) $time--;
}
$new = ($oldtime) . ':00';
return $new;
}