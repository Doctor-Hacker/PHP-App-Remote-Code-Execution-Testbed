<?php
sm_registerglobal('pid','action','update','emsg','start','column_name','asds_order','uid','sid','admin',
'Submit','blogDesc','title','es_date','subject', 'update','nid');
/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
	
//**********View notice*******************//
$obj_notice = new es_notice();
//Manage Notice Starts Here
if ($action=="noticeboard" || $action=='print_notices'){
	$q_limit  = PAGENATE_LIMIT;
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
	 
	if (!isset($title)||$title==""){
		
		$errormessage[1] = "Enter Title";
	}

	/*if (!isset($subject)||$subject== ""){
		
		$errormessage[2] = "Enter Subject";
	}*/
	
	if (!isset($blogDesc)||$blogDesc== ""){
		
		$errormessage[3] = "Enter Notice";
	}
	
	
	if ($errormessage==0){
		$obj_notice->es_date = date('Y-m-d H:i:s');
		$obj_notice->es_subject = $subject;
		$obj_notice->es_message = $blogDesc;
		$obj_notice->es_title   = $title;
		$item_id=$obj_notice->Save(); 
		  $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_notice','NOTICE BOARD','','".$item_id."','ADD NOTICE','".$_SERVER['REMOTE_ADDR']."',NOW())";
    $log_insert_exe=mysql_query($log_insert_sql);
		header("Location:?pid=37&action=noticeboard&emsg=1");
	}
	$action = "addnotice";
 }
 
 if ($action=='print'){
	$notice_det = $obj_notice->GetList(array(array("es_noticeid", "=", "$nid")), "es_noticeid", false);
	
	
}


/**
* Delete notice 
*/

if ($action=="deletenotice"){
	$obj_notice->es_noticeId = $nid;	
	$obj_notice->Delete();
		
	 $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_notice','NOTICE BOARD','','".$nid."','DELETE NOTICE','".$_SERVER['REMOTE_ADDR']."',NOW())";
    $log_insert_exe=mysql_query($log_insert_sql);
	
	header("Location:?pid=37&action=noticeboard&emsg=3");
}
		


/**
* Updating notice 
*/
if ($action=='editnotice'){
	$notice_det = $obj_notice->GetList(array(array("es_noticeid", "=", "$nid")), "es_noticeid", false);
	
}

if (isset($update)&&$update="update"){	
if (!isset($title)||$title==""){
		
		$errormessage[1] = "Enter Title";
	}

/*	if (!isset($subject)||$subject== ""){
		
		$errormessage[2] = "Enter Subject";
	}*/
	
	if (!isset($blogDesc)||$blogDesc== ""){
		
		$errormessage[3] = "Enter Notice";
	}
	
	
	if ($errormessage==0){

	
	 $update = 'UPDATE `es_notice` SET `es_message` ="'.$blogDesc.'", `es_title`= "' . $title . '", 
	 `es_subject`= "'.$subject.'"   WHERE  es_noticeid ="'.$nid.'" ';
	 
	if (mysql_query($update)) {
	$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_notice','NOTICE BOARD','','".$nid."','UPDATE NOTICE','".$_SERVER['REMOTE_ADDR']."',NOW())";
    $log_insert_exe=mysql_query($log_insert_sql);
		header('Location:?pid=37&action=noticeboard&emsg=2');
	}
}}
		
			
?>
	