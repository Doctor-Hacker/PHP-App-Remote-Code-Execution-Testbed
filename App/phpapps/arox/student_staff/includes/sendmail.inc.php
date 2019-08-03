
<?php

//include_once (INCLUDES_CLASS_PATH . DS . 'class.es_assignment.php');
sm_registerglobal('pid','action','update','emsg','start','column_name','asds_order','uid','sid','admin',
'Submit','blogDesc','title','es_date', 'update','es_messagesid','es_staffid','subject','message','submit_staff','submit_student','es_classesid','es_preadmissionid','es_adminsid','keyword','search','filecount','newimage','downloadfile','dc1','dc2');

/**
* Only Student or schoool staff  can be allowed to access this page
*/ 
checkuserinlogin();

$obj_messages = new es_messages();
$obj_classlist    = new es_classes();
$obj_stafflist    = new es_staff();
$html_obj = new html_form();

 $obj_classlistarr = $obj_classlist->GetList(array(array("es_classesid", ">", 0)) );
$class_list['all'] = "-- All --";
foreach($obj_classlistarr as $eachclass){
$class_list[$eachclass->es_classesId]= $eachclass->es_classname;
}

$student_det = get_studentdetails( $_SESSION['eschools']['user_id']);
$student_class = $student_det['pre_class'];
$obj_stafflistarr = $obj_stafflist->GetList(array(array("es_staffid", ">", 0)) );

foreach($obj_stafflistarr as $eachstaff){

$staff_list[$eachstaff->es_staffId]= $eachstaff->st_firstname.' '.$eachstaff->st_lastname.'&nbsp;&lt;'. $eachstaff->st_username . '&gt;';
}


$alladmins = $db->getrows("SELECT * FROM es_admins ORDER BY es_adminsid ASC");

if(count($alladmins)>0){
foreach($alladmins as $each_admin){
$alladmins_arr[$each_admin['es_adminsid']]= $each_admin['admin_fname'].'&nbsp;&lt;'. $each_admin['admin_username'] . '&gt;';
}
}
//array_print($alladmins);
if(isset($downloadfile) && $downloadfile!="") {
ForceDownloadFile("../office_admin/images/messagedoc/".$downloadfile);
}
if($action=='mailtoadmin'){
	if(isset($submit_staff) && $submit_staff!=''){
	
	//echo "SELECT * FROM es_incharge inc, es_staff st WHERE inc.es_classesid=".$student_class." AND inc.es_staffid = st.es_staffid AND st.status='added' AND st.selstatus='accepted' AND st.tcstatus='notissued'";

	
	
	    $incharge_det = $db->getrow("SELECT * FROM es_incharge inc, es_staff st WHERE inc.es_classesid=".$student_class." AND inc.es_staffid = st.es_staffid AND st.status='added' AND st.selstatus='accepted' AND st.tcstatus='notissued'");
		$incharge_id = $incharge_det['es_staffid'];
		//if($incharge_id<1){$errormessage['inchargeid']="Sorry You can not send the message. Please Contact Administrator";}
		//else{
		if($subject==''){ $errormessage['subject'] = "Enter Subject";}
		if($message==''){ $errormessage['message'] = "Enter Message";}
		//}
		if(count($errormessage)==0){
		           
					$message_arr = array( "from_id"    =>$_SESSION['eschools']['user_id'],
										  "from_type"  =>"student",	
										  "to_id"      =>$incharge_id,	
										  "to_type"    =>"staff",	
										  "subject"    =>$subject,	
										  "message"    =>$message,	
										  "created_on" =>date("Y-m-d H:i:s"),
					                         );
					$message_arr  = stripslashes_deep($message_arr);
					$id=$db->insert("es_messages",$message_arr);
								
if(count($filecount)>0){
for($i=0;$i<count($filecount);$i++) {
$image_file = basename($_FILES['newimage']['name'][$i]);
$ext=explode(".",$_FILES['newimage']['name'][$i]);
$str=date("mdY_hms");
//$t=rand(1, 15);
$new_thumbname = "$ext[0]".$str.$t.".".$ext[1];
$updir = "../office_admin/images/messagedoc/";
$dest_path = $updir.$new_thumbname;
$up_images[$i] = $dest_path;
$srcfile = $_FILES['newimage']['tmp_name'][$i];
@move_uploaded_file($srcfile, $dest_path);
$ins_arr_prod_images = array(
	'`es_messagesid`'  => $id,
	'`message_doc`'     => $new_thumbname
	);
$db->insert("es_message_documents",$ins_arr_prod_images);
}
	}
	header("location:?pid=27&action=$action&emsg=28");	
		}//ed
	}


}

if($action=='mailtostaff'){
	if(isset($submit_staff) && $submit_staff!=''){
	    if($es_staffid==''){ $errormessage['es_staffid'] = "Select Name";}
		if($subject==''){ $errormessage['subject'] = "Enter Subject";}
		if($message==''){ $errormessage['message'] = "Enter Message";}
		
		if(count($errormessage)==0){
			 	for($k=0; $k<count($es_staffid); $k++){
					$message_arr = array( "from_id"    =>$_SESSION['eschools']['user_id'],
										  "from_type"  =>"student",	
										  "to_id"      =>$es_staffid[$k],	
										  "to_type"    =>"staff",	
										  "subject"    =>$subject,	
										  "message"    =>$message,	
										  "created_on" =>date("Y-m-d H:i:s"),
					                         );
					$message_arr  = stripslashes_deep($message_arr);
					$db->insert("es_messages",$message_arr);
				}
				header("location:?pid=27&action=$action&emsg=28");	
		}
	}


}

if($action=='mailtostudents'){
$students_list=array(""=>"Select Student");

	if($es_classesid!="") {
	    if($es_classesid=='all'){
		$sel_stds = "SELECT es_preadmissionid , pre_name , pre_emailid , pre_student_username  FROM es_preadmission  WHERE  pre_status!= 'inactive' ";
		$allstudents = $db->getRows($sel_stds);
		if(count($allstudents)>0){
foreach($allstudents as $each_student){
$students_list[$each_student['es_preadmissionid']]= $each_student['pre_name']. '&nbsp;&lt;'.$each_student['pre_student_username'].'&gt;';
}
}
		}else{
	    $sel_stds = "SELECT es_preadmissionid , pre_name , pre_emailid , pre_student_username FROM es_preadmission  WHERE pre_class = $es_classesid AND pre_status!= 'inactive' ";
		$allstudents = $db->getRows($sel_stds);
		if(count($allstudents)>0){
foreach($allstudents as $each_student){
$students_list[$each_student['es_preadmissionid']]= $each_student['pre_name']. '&nbsp;&lt;'.$each_student['pre_student_username'].'&gt;';
}
}
		}
	}
	if(isset($submit_student) && $submit_student!=''){
	    if($es_classesid==''){ $errormessage['es_classesid'] = "Select Class";}
		if(count($es_preadmissionid)==0){ $errormessage['student'] = "Select Student";}
		if($subject==''){ $errormessage['subject'] = "Enter Subject";}
		if($message==''){ $errormessage['message'] = "Enter Message";}
			if(count($errormessage)==0){
			 	for($i=0; $i<count($es_preadmissionid); $i++){
					$message_arr = array( "from_id"    =>$_SESSION['eschools']['user_id'],
										  "from_type"  =>"student",	
										  "to_id"      =>$es_preadmissionid[$i],	
										  "to_type"    =>"student",	
										  "subject"    =>$subject,	
										  "message"    =>$message,	
										  "created_on" =>date("Y-m-d H:i:s"),
					                         );
					$message_arr  = stripslashes_deep($message_arr);
					$db->insert("es_messages",$message_arr);
				}
				header("location:?pid=27&action=$action&emsg=28");	
			}
	}


}
   
/*if($action=="mails_received"){
    $condition = "";
	if(isset($keyword) && $keyword!=''){ $condition=" AND ( from_type LIKE '%$keyword%' OR subject LIKE '%$keyword%' OR message LIKE '%$keyword%' )"; }
	 $msg_qry ="SELECT * FROM es_messages WHERE to_id=".$_SESSION['eschools']['user_id']." AND to_type='student' ".$condition." ";
	 $no_records = sqlnumber($msg_qry);
	 
		$q_limit      = 5;
		if ( !isset($start) ){
			$start = 0;
		}
		 $msg_qry .="ORDER BY es_messagesid DESC  LIMIT " . $start . "," . $q_limit . "";
     $sel_messages = $db->getrows($msg_qry);
//array_print($sel_messages);
}	
if($action=="delete"){
	$db->delete("es_messages",'es_messagesid='.$es_messagesid);
	header("location: ?pid=27&action=mails_received&emsg=29");
}*/


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
	 $msg_qry ="SELECT * FROM es_messages WHERE to_id=".$_SESSION['eschools']['user_id']." AND to_type='student' and to_status!='deleted' ".$condition." ";
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
	$db->update('es_messages', "to_status ='deleted'", 'es_messagesid =' . $es_messagesid);
	header("location: ?pid=27&action=mails_received&emsg=29");
}
if($action=="deletesent"){
$db->update('es_messages', "from_status ='deleted'", 'es_messagesid =' . $es_messagesid);
header("location: ?pid=27&action=sentmails&emsg=29");
}

if($action=="fullmessage"){
 $msg_qry ="SELECT * FROM es_messages WHERE to_id=".$_SESSION['eschools']['user_id']." AND to_type='student' and es_messagesid=".$es_messagesid;
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
	   $msg_qry ="SELECT * FROM es_messages WHERE from_id=".$_SESSION['eschools']['user_id'].$condition." AND from_type='student' and from_status!='deleted'";
	 $no_records = sqlnumber($msg_qry);
	 
		$q_limit      = 10;
		if ( !isset($start) ){
			$start = 0;
		}
		 $msg_qry .="ORDER BY es_messagesid DESC  LIMIT " . $start . "," . $q_limit . "";
     $sel_messages = $db->getrows($msg_qry);
	}


if($action=="fullmessage_sent"){
 $msg_qry ="SELECT * FROM es_messages WHERE from_id=".$_SESSION['eschools']['user_id']." AND from_type='student' and es_messagesid=".$es_messagesid;
 $details_message=$db->getrow($msg_qry);
}
?>
