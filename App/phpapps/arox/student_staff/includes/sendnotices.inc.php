<?php

//include_once (INCLUDES_CLASS_PATH . DS . 'class.es_assignment.php');
sm_registerglobal('pid','action','update','emsg','start','column_name','asds_order','uid','sid','admin',
'Submit','blogDesc','title','es_date', 'update','es_messagesid','es_staffid','subject','message','submit_staff','submit_student','es_classesid','es_preadmissionid','es_adminsid','keyword','search','usertype','type','dc1','dc2');

/**
* Only Student or schoool staff  can be allowed to access this page
*/ 
checkuserinlogin();$obj_classlist    = new es_classes();
$obj_stafflist    = new es_staff();
$html_obj = new html_form();

 $obj_classlistarr = $obj_classlist->GetList(array(array("es_classesid", ">", 0)) );
//$class_list['all'] = "-- All --";
foreach($obj_classlistarr as $eachclass){
$class_list[$eachclass->es_classesId]= $eachclass->es_classname;
}


$obj_stafflistarr = $obj_stafflist->GetList(array(array("es_staffid", ">", 0)) );
$staff_list['all'] = "-- All --";
foreach($obj_stafflistarr as $eachstaff){

$staff_list[$eachstaff->es_staffId]= $eachstaff->st_firstname.' '.$eachstaff->st_lastname.'&nbsp;&lt;'. $eachstaff->st_username . '&gt;';
}


$alladmins = $db->getrows("SELECT * FROM es_admins ORDER BY es_adminsid ASC");

if(count($alladmins)>0){

$alladmins_arr['all'] = "-- All --";
foreach($alladmins as $each_admin){
$alladmins_arr[$each_admin['es_adminsid']]= $each_admin['admin_fname'].'&nbsp;&lt;'. $each_admin['admin_username'] . '&gt;';
}
}
//array_print($alladmins);
if($action=="replay"){
 $rep_qry ="SELECT * FROM es_notice_messages WHERE es_messagesid=".$es_messagesid;
 $rep_message=$db->getrow($rep_qry);
 if($rep_message['from_type']=="staff"){
 $es_staffid=$rep_message['from_id'];
 $staff_detals=$db->getrow("select es_staffid,st_post,st_department from es_staff where es_staffid=".$es_staffid);
header("location: ?pid=30&action=mailtostaff&st_department=".$staff_detals['st_department']."&es_deptpostsid=".$staff_detals['st_post']."&es_staffid=".$staff_detals['es_staffid']."&type=reply");
exit;
 }
 if($rep_message['from_type']=="student"){
 $es_preadmissionid=$rep_message['from_id'];
 $student_detals=$db->getrow("select es_preadmissionid,pre_class from es_preadmission where es_preadmissionid=".$es_preadmissionid);
header("location: ?pid=30&action=mailtostudents&es_classesid=".$student_detals['pre_class']."&es_preadmissionid=".$student_detals['es_preadmissionid']."&type=reply");
exit;
 }
 if($rep_message['from_type']=="admin"){
 $es_adminsid=$rep_message['from_id'];
 $adm_detals=$db->getrow("select es_adminsid from es_admins where es_adminsid=".$es_adminsid);
header("location: ?pid=30&action=replyto&es_messagesid=".$es_messagesid."&type=reply");
exit;
 }
 
 
}
if($action=='replyto'){
                       
					   $notice_det = $db->getrow("SELECT * FROM es_notice_messages WHERE es_messagesid =".$es_messagesid); 
					   if($notice_det['from_type']=='admin'){
					   $admin_arr = $db->getrow("select * from es_admins where es_adminsid=".$notice_det['from_id']);
					   $from_name = $admin_arr['admin_fname']. '&nbsp;&lt;'.$admin_arr['admin_username'].'&gt;';
					   $usertype = 'admin';
					   }
	 
	if(isset($submit_staff) && $submit_staff!=''){
	    if($subject==''){ $errormessage['subject'] = "Enter Subject";}
		if($message==''){ $errormessage['message'] = "Enter Message";}
		
		if(count($errormessage)==0){
			
					$message_arr = array( "from_id"    =>$_SESSION['eschools']['user_id'],
										  "from_type"  =>"student",	
										  "to_id"      =>$es_adminsid,	
										  "to_type"    =>$usertype,	
										  "subject"    =>$subject,	
										  "message"    =>$message,
										  "replied_message_id"   =>$es_messagesid,	
										  "created_on" =>date("Y-m-d H:i:s"),
					                         );
					$message_arr  = stripslashes_deep($message_arr);
					$id=$db->insert("es_notice_messages",$message_arr);	
					if(isset($id)){
					if($es_messagesid!="" && isset($es_messagesid)){
		 $db->update('es_notice_messages', "replay_status ='replied'",'es_messagesid =' . $es_messagesid);
		 }
		 }
					header("location:?pid=30&action=mails_received&emsg=28");					
			
		}
	}


}

   

if($action=="mails_received" || $action=="print_not_list"){
    $condition = "";
	if(isset($search) && $search!=""){
			$PageUrl = "&search=$search";
			if(isset($dc1) && $dc1!=""){$from = func_date_conversion("d/m/Y","Y-m-d",$dc1).' 00:00:00';}
			if(isset($dc2) && $dc2!=""){$to = func_date_conversion("d/m/Y","Y-m-d",$dc2).' 23:59:59';}
			
			if($from!="" && $to!=""){
				$condition .= " AND created_on BETWEEN '".$from."' AND '".$to."'";
				$PageUrl .="&dc1=$dc1&dc2=$dc2";
			}
			if($from!="" && $to==""){
				$condition .= " AND  created_on >= '".$from."' ";
				$PageUrl .="&dc1=$dc1";
			}
			if($from=="" && $to!=""){
				$condition .= " AND created_on <= '".$to."' ";
				$PageUrl .="&dc2=$dc2";
			}
			
			if(isset($keyword) && $keyword!=''){ 
			$condition .=" AND ( from_type LIKE '%$keyword%' OR subject LIKE '%$keyword%' OR message LIKE '%$keyword%' )";
			$PageUrl .="&keyword=$keyword";
			 }
		}
	 $msg_qry ="SELECT * FROM es_notice_messages WHERE to_id=".$_SESSION['eschools']['user_id']." AND to_type='student' and to_status!='deleted' ".$condition." ";
	 $no_records = sqlnumber($msg_qry);
	 
		$q_limit      = 10;
		if ( !isset($start) ){
			$start = 0;
		}
		 $msg_qry .="ORDER BY es_messagesid DESC  LIMIT " . $start . "," . $q_limit . "";
     $sel_messages = $db->getrows($msg_qry);
//array_print($sel_messages);
}	
if($action=="delete"){
	$db->update('es_notice_messages', "to_status ='deleted'", 'es_messagesid =' . $es_messagesid);
	header("location: ?pid=30&action=mails_received&emsg=29");
}
if($action=="deletesent"){
$db->update('es_notice_messages', "from_status ='deleted'", 'es_messagesid =' . $es_messagesid);
header("location: ?pid=30&action=sentmails&emsg=29");
}

if($action=="fullmessage"){

 $msg_qry ="SELECT * FROM es_notice_messages WHERE to_id=".$_SESSION['eschools']['user_id']." AND to_type='student' and es_messagesid=".$es_messagesid;
 $details_message=$db->getrow($msg_qry);
 $db->update('es_notice_messages', "read_status ='Read'",'es_messagesid =' . $es_messagesid);
}
if($action=="sentmails" || $action=='print_reply_list'){
$condition = "";
	if(isset($search) && $search!=""){
			$PageUrl = "&search=$search";
			if(isset($dc1) && $dc1!=""){$from = func_date_conversion("d/m/Y","Y-m-d",$dc1).' 00:00:00';}
			if(isset($dc2) && $dc2!=""){$to = func_date_conversion("d/m/Y","Y-m-d",$dc2).' 23:59:59';}
			
			if($from!="" && $to!=""){
				$condition .= " AND created_on BETWEEN '".$from."' AND '".$to."'";
				$PageUrl .="&dc1=$dc1&dc2=$dc2";
			}
			if($from!="" && $to==""){
				$condition .= " AND  created_on >= '".$from."' ";
				$PageUrl .="&dc1=$dc1";
			}
			if($from=="" && $to!=""){
				$condition .= " AND created_on <= '".$to."' ";
				$PageUrl .="&dc2=$dc2";
			}
			
			if(isset($keyword) && $keyword!=''){ 
			$condition .=" AND ( from_type LIKE '%$keyword%' OR subject LIKE '%$keyword%' OR message LIKE '%$keyword%' )";
			$PageUrl .="&keyword=$keyword";
			 }
		}
	   $msg_qry ="SELECT * FROM es_notice_messages WHERE from_id=".$_SESSION['eschools']['user_id'].$condition." AND from_type='student' and from_status!='deleted'";
	 $no_records = sqlnumber($msg_qry);
	 
		$q_limit      = 10;
		if ( !isset($start) ){
			$start = 0;
		}
		 $msg_qry .="ORDER BY es_messagesid DESC  LIMIT " . $start . "," . $q_limit . "";
     $sel_messages = $db->getrows($msg_qry);
}
if($action=="fullmessage_sent"){
 $msg_qry ="SELECT * FROM es_notice_messages WHERE from_id=".$_SESSION['eschools']['user_id']." AND from_type='student' and es_messagesid=".$es_messagesid;
 $details_message=$db->getrow($msg_qry);
}


?>
