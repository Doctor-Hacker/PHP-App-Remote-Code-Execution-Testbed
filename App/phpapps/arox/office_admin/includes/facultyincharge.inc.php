<?php
sm_registerglobal('pid', 'action','emsg', 'update', 'start','es_classesid','es_staffid','asignstaff','incharge_id','addsmsmessage','username','password','sender','cdma_header','admission_msg','feepaid_msg','exam_msg','st_appoint_msg','st_salary_msg','hiddenid','slotallot_msg');

/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
$html_obj = new html_form();
$allclasses = getallClasses();
if(count($allclasses)>=1){
foreach($allclasses as $each){
$classes_arr[$each['es_classesid']] = $each['es_classname'];
}
}

$allstaff = $db->getrows("SELECT * FROM es_staff WHERE status='added' AND selstatus='accepted' AND tcstatus='notissued' AND teach_nonteach = 'teaching' ORDER BY es_staffid ASC");
foreach($allstaff as $eachstaff){
$staff_arr[$eachstaff['es_staffid']] = $eachstaff['st_firstname'].''.$eachstaff['st_lastname'].' ('.$eachstaff['st_username'].')';
}

if($action=='delete'){
$db->delete("es_incharge","incharge_id=".$incharge_id);
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_incharge','STAFF','ASSIGN INCHARGE','".$incharge_id."','INCHARGE DELETED','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);
header("location: ?pid=64&action=asignincharge&emsg=3");
exit;
}
if($action=="asignincharge" || $action=='print_list'){

if(isset($asignstaff) && $asignstaff!=""){
 	if($es_classesid==""){$errormessage[0]="Select Class";
	}else{
	$no_records = sqlnumber("SELECT * FROM es_incharge WHERE es_classesid=".$es_classesid);
	if($no_records>0){$errormessage[0]="Already Incharge appointed";}
	}
	if($es_staffid==""){$errormessage[1]="Select Faculty";}
	if(count($errormessage)==0){
	$today = date("Y-m-d H:i:s");
	$inchargearr = array("es_classesid"=>$es_classesid, "es_staffid"=>$es_staffid,"created_on"=>$today);
	$inchargearr = stripslashes_deep($inchargearr);
	$insid=$db->insert("es_incharge",$inchargearr);
	
	// logs inserting
		
		
		
		$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_incharge','STAFF','ASSIGN INCHARGE','".$insid."','INCHARGE ADDED','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);
	
	header("location:?pid=64&action=asignincharge&emsg=1");
	exit;
	}
  }
  
  $incharges_det = $db->getrows("SELECT * FROM es_incharge ORDER BY incharge_id DESC");

}

if($action=='managesms'){
	$smsmessages_det = $db->getrow("SELECT * FROM es_manage_sms ");
}
if(isset($addsmsmessage) && $addsmsmessage!=""){
		if($username==""){$errormessage['username']="Enter User Name";}
		if($password==""){$errormessage['password']="Enter Password";}
		if($sender==""){$errormessage['sender']="Enter Sender Name";}
		if($cdma_header==""){$errormessage['cdma_header']="Enter CDMA Header";}
		if($admission_msg==""){$errormessage['admission_msg']="Enter Message for Student Admission";}
		if($feepaid_msg==""){$errormessage['feepaid_msg']="Enter Message for Fee Payment";}
		if($slotallot_msg==""){$errormessage['slotallot_msg']="Enter Message for Exam Payment Received";}
		if($exam_msg==""){$errormessage['exam_msg']="Enter Message for Exam Result";}
		if($st_appoint_msg==""){$errormessage['st_appoint_msg']="Enter Message for Faculty Recruitment";}
		if($st_salary_msg==""){$errormessage['st_salary_msg']="Enter Message for Payslip";}
		
		if(count($errormessage)==0){
			if(isset($hiddenid) && $hiddenid!=""){
				$db->update("es_manage_sms","username='".$username."',password='".$password."',sender='".$sender."',cdma_header='".$cdma_header."',admission_msg='".$admission_msg."',feepaid_msg='".$feepaid_msg."',exam_msg='".$exam_msg."',st_appoint_msg='".$st_appoint_msg."',st_salary_msg='".$st_salary_msg."',slotallot_msg='".$slotallot_msg."'","id=".$hiddenid);
				$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_manage_sms','Setup','Manage SMS','".$hiddenid."','Update SMS message','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);
				header("location:?pid=64&action=managesms&emsg=2");
				exit;
			}else{
				$smsmsg_arr = array("username"=>$username,"password"=>$password,"sender"=>$sender,"cdma_header"=>$cdma_header,"admission_msg"=>$admission_msg,"feepaid_msg"=>$feepaid_msg,"exam_msg"=>$exam_msg,"st_appoint_msg"=>$st_appoint_msg,"st_salary_msg"=>$st_salary_msg,"slotallot_msg"=>$slotallot_msg);
				$smsmsg_arr = stripslashes_deep($smsmsg_arr);
				$sms_id = $db->insert("es_manage_sms",$smsmsg_arr);
				$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_manage_sms','Setup','Manage SMS','".$sms_id."','Add SMS message','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);
				header("location:?pid=64&action=managesms&emsg=1");
				exit;
			}
		
		}
		
		


}

	
?>