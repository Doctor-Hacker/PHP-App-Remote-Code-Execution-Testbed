<?php 
ob_start();
session_start();
include("includes/constants.inc.php");
include("includes/functions.php");
//include("includes/constants.php");
include("includes/messages.php");
include("classes/html_form.class.php");
include("classes/validator.class.php");
include("classes/Database.class.php");
$db = Database::getInstance(DB_SERVER, DB_SERVER_USERNAME, DB_SERVER_PASSWORD, DB_DATABASE);




?>

