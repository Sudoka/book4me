<?php
include('variables.php');
session_start();

if(!(isset($_SESSION['id']))) header('Location : login.php');
?>