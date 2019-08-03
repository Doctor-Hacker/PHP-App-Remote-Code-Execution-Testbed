<?php
sm_registerglobal('pid','action','update','emsg','start','column_name','asds_order','uid','sid','admin',
'Submit','blogDesc','title','es_date','subject', 'update','nid');
/**
* Only Admin users can view the pages
*/
checkuserinlogin();
//**********View notice*******************//
$obj_notice = new es_notice();
//Manage Notice Starts Here
if ($action=="noticeboard" || $action=='print_notices'){
	$q_limit  = 15;
	if (!isset($start))$start = 0;
	
	$no_rows = count($obj_notice->GetList(array(array("es_noticeid", ">", 0)) ));
	
	$orderby = "es_noticeid"; 
	$order = false;	
	$notice_det = $obj_notice->GetList(array(array("es_noticeid", ">", 0)),$orderby,$order, "$start , $q_limit");
}
/**
*  Adding Notice and sudmission here
*/
if ($Submit=='Submit'){
	$error = "";	 
	if (!isset($title)||$title==""){
		$error = "Title";
		$error_title = "Title is mandatory";
	}

	if (!isset($subject)||$subject== ""){
		$error = "Subject";
		$error_subject = "Subject is mandatory";
	}
	if ($error==""){
		$obj_notice->es_date = date('Y-m-d H:i:s');
		$obj_notice->es_subject = $subject;
		$obj_notice->es_message = $blogDesc;
		$obj_notice->es_title   = $title;
		$obj_notice->Save();  
		header("Location:?pid=37&action=noticeboard&emsg=1");
	}
	$action = "addnotice";
 }


/**
* Delete notice 
*/

if ($action=="deletenotice"){
	$obj_notice->es_noticeId = $nid;
	$obj_notice->Delete();	
	header("Location:?pid=37&action=noticeboard&emsg=1");
}
		


/**
* Updating notice 
*/
if ($action=='viewnotice' || $action=='print'){
	$notice_det = $obj_notice->GetList(array(array("es_noticeid", "=", "$nid")), "es_noticeid", false);
	
	
}

if (isset($update)&&$update="update"){	
	
	 $update = 'UPDATE `es_notice` SET `es_message` ="'.$blogDesc.'", `es_title`= "' . $title . '", 
	 `es_subject`= "'.$subject.'"   WHERE  es_noticeid ="'.$nid.'" ';
	if (mysql_query($update)) {
		header('Location:?pid=37&action=noticeboard&emsg=2');
	}
}
		
			
?>
	