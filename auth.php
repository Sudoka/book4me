<?php
session_start();
include ("variables.php");

$id = $_POST['id'];
$password = $_POST['password'];

/*try {
    $conn = new PDO('mysql:host=localhost;dbname=book4me', 'rachit', 'mario');
    echo 'Connected to database';
    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }*/
$conn = new PDO("mysql:host = $dbhost;dbname=$dbname",'root');

$sql = "select * from `login` where `id` = '$id'";

if($q = $conn->query($sql)){

	$r = $q->fetch();
		if(!isset($r['id'])){
				$_SESSION['newid']=$id;
				$_SESSION['newpassword']=$password;
				/*echo ("Username not in database. <a href='signup.php'>Create</a> a new account");*/
				echo ('<form name="input" action="signup.php" method="GET">
		Facebook id: <input type="text" name="facebook"><br>
		Name: <input type="text" name="name"><br>
		<input type="submit" value="Submit"></form>');
		}
		else if($r['id']==$id && $r['password']==$password && $r['activated']==1) {
			$_SESSION['id']=$r['id'];
			$_SESSION['password']=$r['password'];
			$_SESSION['name']=$r['name'];
			$_SESSION['facebook']=$r['facebook'];
			echo $_SESSION['id'];
			$_SESSION['priority']=$r['priority'];
			header('Location: main.php');
			//echo '<a href="main.php"> main </a>';
		}
		else if($r['id']==$id && $r['password']==$password && $r['activated']!=1) {
			echo "please activate your account";
			echo '<a href="login.php">CLick</a> here';
		}
		else echo "keep out";

}
else
{
	echo "failed to connect";	
	echo "click <a href='main.php'> here </a> to go back";
}


?>