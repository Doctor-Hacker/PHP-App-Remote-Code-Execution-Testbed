<?php

include_once (INCLUDES_CLASS_PATH . DS . 'class.es_assignment.php');
sm_registerglobal('pid', 'action', 'start', 'column_name', 'asds_order', 'update', 'uid', 'admin', 'eq_createdon', 'eq_name', 'as_description');

$es_assignment = new es_assignment();
 $es_assignment = $es_assignment->GetList(array(array("es_assignmentid", "=", "$uid")), "es_assignmentid", false);
	//array_print($es_assignment);
?>