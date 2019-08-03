<?php

//include_once (INCLUDES_CLASS_PATH . DS . 'class.es_assignment.php');
sm_registerglobal('pid','action','update','emsg','start','column_name','asds_order','uid','sid','admin',
'Submit','blogDesc','title','es_date', 'update','nid');
/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}

$obj_notice = new es_notice();
 $notice_det = $obj_notice->GetList(array(array("es_noticeid", "=", "$nid")), "es_noticeid", false);
	//array_print($es_assignment);*/
?>