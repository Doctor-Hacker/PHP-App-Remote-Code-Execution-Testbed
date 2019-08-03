<?php

//include_once (INCLUDES_CLASS_PATH . DS . 'class.es_assignment.php');
sm_registerglobal('pid','action','update','emsg','start','column_name','asds_order','uid','sid','admin',
'Submit','blogDesc','title','es_date', 'update','nid');
/**
* Only Student or schoool staff  can be allowed to access this page
*/ 
checkuserinlogin();

$obj_notice = new es_notice();
 $notice_det = $obj_notice->GetList(array(array("es_noticeid", "=", "$nid")), "es_noticeid", false);
	//array_print($es_assignment);*/
?>