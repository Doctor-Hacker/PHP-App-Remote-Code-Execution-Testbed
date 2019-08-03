<?php
/* Stop the configure file being accessed directly */
if(basename(__FILE__) == basename($_SERVER['PHP_SELF'])){
	header("Location: ../");
}

$bdd = new PDO("mysql:host=localhost;dbname=lunar", "root", "hacklab2019");

/* Session Name */
$secure = "e356e18b3d60be34d523408bf3da3eb8ace4179e";

?>