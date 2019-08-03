<?php

include_once (INCLUDES_CLASS_PATH . DS . 'class.es_assignment.php');
sm_registerglobal('pid', 'action', 'start', 'column_name', 'asds_order', 'update', 'uid', 'admin', 'eq_createdon', 'eq_name', 'as_description');
/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
$es_assignment = new es_assignment();
 $es_assignment = $es_assignment->GetList(array(array("es_assignmentid", "=", "$uid")), "es_assignmentid", false);
 
 $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_assignment','ASSIGNMENT','VIEW ASSIGNMENT','".$uid."','VIEW ASSIGNMENT','".$_SERVER['REMOTE_ADDR']."',NOW())";
$log_insert_exe=mysql_query($log_insert_sql);

 
	//array_print($es_assignment);
?>