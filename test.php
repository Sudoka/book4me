this content is loaded from test.html
<?php
session_start();
include ('variables.php');
if(!isset($_SESSION['id'])) header('Location: login.php');
echo $_GET['name'];
echo $_SESSION['date'];?>