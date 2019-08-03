<?php

//include_once (INCLUDES_CLASS_PATH . DS . 'class.es_assignment.php');
sm_registerglobal('pid','action','update','emsg','start','column_name','asds_order','uid','sid','admin',
'Submit','blogDesc','title','es_date', 'update','es_messagesid','es_staffid','subject','message','submit_staff','submit_student','es_classesid','es_preadmissionid','es_adminsid','keyword','search','type','dc1','dc2');
/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}


$obj_classlist    = new es_classes();
$obj_stafflist    = new es_staff();

$html_obj = new html_form();

$obj_classlistarr = $obj_classlist->GetList(array(array("es_classesid", ">", 0)) );
//$class_list['all'] = "-- All --";
foreach($obj_classlistarr as $eachclass){
$class_list[$eachclass->es_classesId]= $eachclass->es_classname;
}


$obj_stafflistarr = $obj_stafflist->GetList(array(array("es_staffid", ">", 0),array("status", "=", 'added'),array("selstatus", "=", 'accepted'),array("tcstatus", "=",'notissued')) );
$staff_list['all'] = "-- All --";
foreach($obj_stafflistarr as $eachstaff){

$staff_list[$eachstaff->es_staffId]= $eachstaff->st_firstname.' '.$eachstaff->st_lastname.'&nbsp;&lt;'.$eachstaff->es_staffId. '&gt;';
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
header("location: ?pid=57&action=mailtostaff&st_department=".$staff_detals['st_department']."&es_deptpostsid=".$staff_detals['st_post']."&es_staffid=".$staff_detals['es_staffid']."&type=reply");

exit;
 }
 if($rep_message['from_type']=="student"){
 $es_preadmissionid=$rep_message['from_id'];
 $student_detals=$db->getrow("select es_preadmissionid,pre_class from es_preadmission where es_preadmissionid=".$es_preadmissionid);
header("location: ?pid=57&action=mailtostudents&es_classesid=".$student_detals['pre_class']."&es_preadmissionid=".$student_detals['es_preadmissionid']."&type=reply");
exit;
 }
 
  if($rep_message['from_type']=="admin"){
 $es_adminsid=$rep_message['from_id'];
 $adm_detals=$db->getrow("select es_adminsid from es_admins where es_adminsid=".$es_adminsid);
header("location: ?pid=57&action=mailtoadmin&es_adminsid=".$adm_detals['es_adminsid']."&type=reply");
exit;
 }
 
 
}


if($action=='mailtoadmin'){
	if(isset($submit_staff) && $submit_staff!=''){
	    if($es_adminsid==''){ $errormessage['es_adminsid'] = "Select Name";}
		if($subject==''){ $errormessage['subject'] = "Enter Subject";}
		if($message==''){ $errormessage['message'] = "Enter Message";}
		
		if(count($errormessage)==0){
			if($es_adminsid=='all'){
			//echo count($obj_stafflistarr);
			 	foreach($alladmins as $each_admin){
					$message_arr = array( "from_id"    =>$_SESSION['eschools']['admin_id'],
										  "from_type"  =>"admin",	
										  "to_id"      =>$each_admin['es_adminsid'],	
										  "to_type"    =>"admin",	
										  "subject"    =>$subject,	
										  "message"    =>$message,	
										  "created_on" =>date("Y-m-d H:i:s"),
					                         );
					$message_arr  = stripslashes_deep($message_arr);
					$id=$db->insert("es_notice_messages",$message_arr);
					
				if(isset($id)){
				
		
	$log_insert_exe=mysql_query($log_insert_sql);
	
	
				
					if($es_messagesid!="" && isset($es_messagesid)){
		 $db->update('es_notice_messages', "replay_status ='replied'",'es_messagesid =' . $es_messagesid);
		 }
		 }

					
				}
				header("location:?pid=57&action=$action&emsg=28");	
			}else{

					$message_arr = array( "from_id"    =>$_SESSION['eschools']['admin_id'],
										  "from_type"  =>"admin",	
										  "to_id"      =>$es_adminsid,	
										  "to_type"    =>"admin",	
										  "subject"    =>$subject,	
										  "message"    =>$message,	
										  "created_on" =>date("Y-m-d H:i:s"),
					                         );
					$message_arr  = stripslashes_deep($message_arr);
					$id=$db->insert("es_notice_messages",$message_arr);	
					if(isset($id)){
					if($es_messagesid!="" && isset($es_messagesid)){
		 $db->update('es_notice_messages', "replay_status ='replied'",'es_messagesid =' . $es_messagesid);
		 }
		 }
					header("location:?pid=57&action=$action&emsg=28");					
			}
		}
	}


}

if($action=='mailtostaff'){
	if(isset($submit_staff) && $submit_staff!=''){
	    if($es_staffid==''){ $errormessage['es_staffid'] = "Select Name";}
		if($subject==''){ $errormessage['subject'] = "Enter Subject";}
		if($message==''){ $errormessage['message'] = "Enter Message";}
		
		if(count($errormessage)==0){
			if($es_staffid=='all'){
			//echo count($obj_stafflistarr);
			 	foreach($obj_stafflistarr as $each_staff){
					$message_arr = array( "from_id"    =>$_SESSION['eschools']['admin_id'],
										  "from_type"  =>"admin",	
										  "to_id"      =>$each_staff->es_staffId,	
										  "to_type"    =>"staff",	
										  "subject"    =>$subject,	
										  "message"    =>$message,	
										  "created_on" =>date("Y-m-d H:i:s"),
					                         );
					$message_arr  = stripslashes_deep($message_arr);
					$id=$db->insert("es_notice_messages",$message_arr);
					if(isset($id)){
					
					
					// logs insert
				
					$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_notice_messages','SEND NOTICE','TO STAFF','".$id."','NOTICE TO STAFF','".$_SERVER['REMOTE_ADDR']."',NOW())";
						$log_insert_exe=mysql_query($log_insert_sql);
					
					
					if($es_messagesid!="" && isset($es_messagesid)){
		 $db->update('es_notice_messages', "replay_status ='replied'",'es_messagesid =' . $es_messagesid);
		 }
		 }
				}
				header("location:?pid=57&action=$action&emsg=28");	
			}else{

					$message_arr = array( "from_id"    =>$_SESSION['eschools']['admin_id'],
										  "from_type"  =>"admin",	
										  "to_id"      =>$es_staffid,	
										  "to_type"    =>"staff",	
										  "subject"    =>$subject,	
										  "message"    =>$message,	
										  "created_on" =>date("Y-m-d H:i:s"),
					                         );
					$message_arr  = stripslashes_deep($message_arr);
					$id=$db->insert("es_notice_messages",$message_arr);	
					if(isset($id)){
					// logs insert
				
					$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_notice_messages','SEND NOTICE','TO STAFF','".$id."','NOTICE TO STAFF','".$_SERVER['REMOTE_ADDR']."',NOW())";
						$log_insert_exe=mysql_query($log_insert_sql);
					if($es_messagesid!="" && isset($es_messagesid)){
		 $db->update('es_notice_messages', "replay_status ='replied'",'es_messagesid =' . $es_messagesid);
		 }
		 }
					header("location:?pid=57&action=$action&emsg=28");					
			}
		}
	}


}

if($action=='mailtostudents'){
	if($es_classesid!="") {
	    if($es_classesid=='all'){
		$sel_stds = "SELECT es_preadmissionid , pre_name , pre_emailid , pre_student_username  FROM es_preadmission  WHERE  pre_status!= 'inactive' AND status !='inactive' AND pre_fromdate='".$_SESSION['eschools']['from_acad']."'";
		$allstudents = $db->getRows($sel_stds);
		}else{
	    $sel_stds = "SELECT es_preadmissionid , pre_name , pre_emailid , pre_student_username FROM es_preadmission  WHERE pre_class = $es_classesid AND pre_status!= 'inactive' AND status !='inactive' AND pre_fromdate='".$_SESSION['eschools']['from_acad']."'";
		$allstudents = $db->getRows($sel_stds);
		}
	}
	if(isset($submit_student) && $submit_student!=''){
	    if($es_classesid==''){ $errormessage['es_classesid'] = "Select Class";}
		if($es_preadmissionid==''){ $errormessage['es_preadmissionid'] = "Select Student(s)";}
		
		if($subject==''){ $errormessage['subject'] = "Enter Subject";}
		if($message==''){ $errormessage['message'] = "Enter Message";}
			if(count($errormessage)==0){
			
				if(isset($es_preadmissionid) && $es_preadmissionid!='all'){
					
					$message_arr = array( "from_id" =>$_SESSION['eschools']['admin_id'],
										  "from_type" =>"admin",	
										  "to_id" =>$es_preadmissionid,	
										  "to_type" =>"student",	
										  "subject" =>$subject,	
										  "message" =>$message,	
										  "created_on" =>date("Y-m-d H:i:s"),
					                         );
					$message_arr  = stripslashes_deep($message_arr);
					$id=$db->insert("es_notice_messages",$message_arr);	
					if(isset($id)){
					$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_notice_messages','SEND NOTICE','TO STUDENTS','".$id."','NOTICE TO STUDENT','".$_SERVER['REMOTE_ADDR']."',NOW())";
						$log_insert_exe=mysql_query($log_insert_sql);
					
					if($es_messagesid!="" && isset($es_messagesid)){
		 $db->update('es_notice_messages', "replay_status ='replied'",'es_messagesid =' . $es_messagesid);
		 }
		 }
					header("location:?pid=57&action=$action&emsg=28");					 
				}else{
					//array_print($allstudents);
					foreach($allstudents as $each_student){
						$message_arr = array( "from_id" =>$_SESSION['eschools']['admin_id'],
										  "from_type" =>"admin",	
										  "to_id" =>$each_student['es_preadmissionid'],	
										  "to_type" =>"student",	
										  "subject" =>$subject,	
										  "message" =>$message,	
										  "created_on" =>date("Y-m-d H:i:s"),
					                         );
					$message_arr  = stripslashes_deep($message_arr);
					$id=$db->insert("es_notice_messages",$message_arr);
					if(isset($id)){
					
					$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_notice_messages','SEND NOTICE','TO STUDENTS','".$id."','NOTICE TO STUDENT','".$_SERVER['REMOTE_ADDR']."',NOW())";
						$log_insert_exe=mysql_query($log_insert_sql);
					
					if($es_messagesid!="" && isset($es_messagesid)){
		 $db->update('es_notice_messages', "replay_status ='replied'",'es_messagesid =' . $es_messagesid);
		 }
		 }
					}
					header("location:?pid=57&action=$action&emsg=28");
				
				}
			}
	}


}
    
if($action=="mails_received" || $action=='print_not_list'){
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
	
	 $msg_qry ="SELECT * FROM es_notice_messages WHERE to_id=".$_SESSION['eschools']['admin_id']." AND to_type='admin' and to_status!='deleted'".$condition." ";
	 $no_records = sqlnumber($msg_qry);
	
	 
		$q_limit      =20;
		if ( !isset($start) ){
			$start = 0;
		}
		  $msg_qry .="ORDER BY es_messagesid DESC  LIMIT " . $start . "," . $q_limit . "";
     $sel_messages = $db->getrows($msg_qry);

}	

if($action=="delete"){
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_notice_messages','SEND NOTICE','RECEIVED REPLIES','".$es_messagesid."','DELETE NOTICE REPLY','".$_SERVER['REMOTE_ADDR']."',NOW())";
						$log_insert_exe=mysql_query($log_insert_sql);
						
$db->update('es_notice_messages', "to_status ='deleted'", 'es_messagesid =' . $es_messagesid);
header("location: ?pid=57&action=mails_received&emsg=29");
}

if($action=="deletesent"){

$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_notice_messages','SEND NOTICE','SENT NOTICES','".$es_messagesid."','DELETE SENT NOTICE','".$_SERVER['REMOTE_ADDR']."',NOW())";
						$log_insert_exe=mysql_query($log_insert_sql);

$db->update('es_notice_messages', "from_status ='deleted'", 'es_messagesid =' . $es_messagesid);
header("location: ?pid=57&action=sentmails&emsg=29");
}

if($action=="fullmessage"){

$db->update('es_notice_messages',"read_status='Read'","es_messagesid=".$es_messagesid);
 $msg_qry ="SELECT * FROM es_notice_messages WHERE to_id=".$_SESSION['eschools']['admin_id']." AND to_type='admin' and es_messagesid=".$es_messagesid;
 $details_message=$db->getrow($msg_qry);
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
	    $msg_qry ="SELECT * FROM es_notice_messages WHERE from_id=".$_SESSION['eschools']['admin_id'].$condition." AND from_type='admin' and from_status!='deleted'";
	 $no_records = sqlnumber($msg_qry);
	 
		$q_limit      = 20;
		if ( !isset($start) ){
			$start = 0;
		}
		 $msg_qry .="ORDER BY es_messagesid DESC  LIMIT " . $start . "," . $q_limit . "";
     $sel_messages = $db->getrows($msg_qry);
}


if($action=="fullmessage_sent"){
 $msg_qry ="SELECT * FROM es_notice_messages WHERE from_id=".$_SESSION['eschools']['admin_id']." AND from_type='admin' and es_messagesid=".$es_messagesid;
 $details_message=$db->getrow($msg_qry);
 ?>
<?php /*?> <script type="text/javascript" language="javascript">
window.opener.location.href="?pid=57&action=sentmails";
 </script><?php */?>
 <?php
}



?>
