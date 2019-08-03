<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['memid']))
{
	$_SESSION['msg']="Please Login First to Access User...";
	header('location: index.php');
	exit;
}
?>
