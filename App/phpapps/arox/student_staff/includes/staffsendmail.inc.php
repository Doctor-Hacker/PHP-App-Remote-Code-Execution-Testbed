<?php

//include_once (INCLUDES_CLASS_PATH . DS . 'class.es_assignment.php');
sm_registerglobal('pid','action','update','emsg','start','column_name','asds_order','uid','sid','admin',
'Submit','blogDesc','title','es_date', 'update','es_messagesid','es_staffid','subject','message','submit_staff','submit_student','es_classesid','es_preadmissionid','es_adminsid','keyword','search','st_department','es_deptpostsid','type','copyid','filecount','newimage','downloadfile','dc1','dc2');
/**
* Only Admin users can view the pages
*/
checkuserinlogin();$obj_messages = new es_messages();
$obj_classlist    = new es_classes();
$obj_stafflist    = new es_staff();
//$obj_studentslist    = new es_preadmission();
$html_obj = new html_form();

$obj_classlistarr = $obj_classlist->GetList(array(array("es_classesid", ">", 0)) );
$class_list['all'] = "-- All --";
foreach($obj_classlistarr as $eachclass){
$class_list[$eachclass->es_classesId]= $eachclass->es_classname;
}


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
if(isset($downloadfile) && $downloadfile!="") {
ForceDownloadFile("../office_admin/images/messagedoc/".$downloadfile);
}

$exesqlquery = "SELECT * FROM es_departments";
$getdeptlist = $db->getrows($exesqlquery);
//array_print($alladmins);
if($action=="replay"){
 $rep_qry ="SELECT * FROM es_messages WHERE es_messagesid=".$es_messagesid;
 $rep_message=$db->getrow($rep_qry);
 if($rep_message['from_type']=="staff"){
 $es_staffid=$rep_message['from_id'];
 $staff_detals=$db->getrow("select es_staffid,st_post,st_department from es_staff where es_staffid=".$es_staffid);
header("location: ?pid=28&action=mailtostaff&st_department=".$staff_detals['st_department']."&es_deptpostsid=".$staff_detals['st_post']."&es_staffid=".$staff_detals['es_staffid']."&copyid=".$staff_detals['es_staffid']."&type=reply&es_messagesid=".$es_messagesid);
exit;
 }
 if($rep_message['from_type']=="student"){
 $es_preadmissionid=$rep_message['from_id'];
 $student_detals=$db->getrow("select es_preadmissionid,pre_class from es_preadmission where es_preadmissionid=".$es_preadmissionid);
header("location: ?pid=28&action=mailtostudents&es_classesid=".$student_detals['pre_class']."&es_preadmissionid=".$student_detals['es_preadmissionid']."&copyid=".$student_detals['es_preadmissionid']."&type=reply&es_messagesid=".$es_messagesid);
exit;
 }
 if($rep_message['from_type']=="admin"){
 $es_adminsid=$rep_message['from_id'];
 $adm_detals=$db->getrow("select es_adminsid from es_admins where es_adminsid=".$es_adminsid);
header("location: ?pid=28&action=mailtoadmin&es_adminsid=".$adm_detals['es_adminsid']."&copyid=".$adm_detals['es_adminsid']."&type=reply&es_messagesid=".$es_messagesid);
exit;
 }
 
 
}

if($action=='mailtoadmin'){

	if(isset($submit_staff) && $submit_staff!=''){
	
	 $j=$_FILES['newimage']['name'];
function findexts ($m) 
 {
 $count=count($m);
 for($i=0;$i<$count;$i++)
{
 $filename = strtolower($m[$i]) ; 
 $exts1 = split("[/\\.]", $m[$i]) ; 
 $exts[] = $exts1;
 }
 return $exts; 
 } 
	
	    if($es_adminsid==''){ $errormessage['es_adminsid'] = "Select Name";}
		
		if($subject==''){ $errormessage['subject'] = "Enter Subject";}
		if($message==''){ $errormessage['message'] = "Enter Message";}
		
			foreach(findexts($j) as $filetype)
		 {
			 if($filetype[1]=='docx')
			 {
			 	$errormessage[0] = "Invalid file .docx";
			 }
		 }

		
		if(count($errormessage)==0){
	
		           for($j=0; $j<count($es_adminsid); $j++){
					$message_arr = array( "from_id"    =>$_SESSION['eschools']['user_id'],
										  "from_type"  =>"staff",	
										  "to_id"      =>$es_adminsid[$j],	
										  "to_type"    =>"admin",	
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
					if(isset($id)){
					if($es_messagesid!="" && isset($es_messagesid)){
		 $db->update('es_messages', "replay_status ='replied'",'es_messagesid =' . $es_messagesid);
		 }
		 }
					
				}
				header("location:?pid=28&action=$action&emsg=28");	
		}
	}


}

if($action=='mailtostaff'){
	if(isset($submit_staff) && $submit_staff!=''){
	
			 $j=$_FILES['newimage']['name'];
		function findexts ($m) 
		 {
		 $count=count($m);
		 for($i=0;$i<$count;$i++)
		{
		 $filename = strtolower($m[$i]) ; 
		 $exts1 = split("[/\\.]", $m[$i]) ; 
		 $exts[] = $exts1;
		 }
		 return $exts; 
		 } 


	    if($st_department==''){ $errormessage['st_department'] = "Select Department";}
		if($es_deptpostsid==''){ $errormessage['es_deptpostsid'] = "Select Post";}
	    if($es_staffid==''){ $errormessage['es_staffid'] = "Select Name";}
		if($subject==''){ $errormessage['subject'] = "Enter Subject";}
		if($message==''){ $errormessage['message'] = "Enter Message";}
		foreach(findexts($j) as $filetype)
		 {
			 if($filetype[1]=='docx')
			 {
			 	$errormessage[0] = "Invalid file .docx";
			 }
		 }

		
		if(count($errormessage)==0){
		

			 	for($k=0; $k<count($es_staffid); $k++){
					$message_arr = array( "from_id"    =>$_SESSION['eschools']['user_id'],
										  "from_type"  =>"staff",	
										  "to_id"      =>$es_staffid[$k],	
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
					if(isset($id)){
					if($es_messagesid!="" && isset($es_messagesid)){
		 $db->update('es_messages', "replay_status ='replied'",'es_messagesid =' . $es_messagesid);
		  
		 }
		 }
				}
				header("location:?pid=28&action=$action&emsg=28");		
		}
	}


}

if($action=='mailtostudents'){
$students_list=array(""=>"Select Student");

	if($es_classesid!="") {
	    if($es_classesid=='all'){
		$sel_stds = "SELECT es_preadmissionid , pre_name , pre_emailid , pre_student_username  FROM es_preadmission  WHERE  pre_status!= 'inactive' AND status !='inactive' AND pre_fromdate='".$_SESSION['eschools']['from_acad']."' ";
		$allstudents = $db->getRows($sel_stds);
		if(count($allstudents)>0){
foreach($allstudents as $each_student){
$students_list[$each_student['es_preadmissionid']]= $each_student['pre_name']. '&nbsp;&lt;'.$each_student['pre_student_username'].'&gt;';
}
}
		}else{
	    $sel_stds = "SELECT es_preadmissionid , pre_name , pre_emailid , pre_student_username FROM es_preadmission  WHERE pre_class = $es_classesid AND pre_status!= 'inactive' AND status !='inactive' AND pre_fromdate='".$_SESSION['eschools']['from_acad']."' ";
		$allstudents = $db->getRows($sel_stds);
		if(count($allstudents)>0){
foreach($allstudents as $each_student){
$students_list[$each_student['es_preadmissionid']]= $each_student['pre_name']. '&nbsp;&lt;'.$each_student['pre_student_username'].'&gt;';

}
}
		}
	}

	if(isset($submit_student) && $submit_student!=''){
	
		 $j=$_FILES['newimage']['name'];
	
	function findexts ($m) 
	 {
	 $count=count($m);
	 for($i=0;$i<$count;$i++)
	{
	 $filename = strtolower($m[$i]) ; 
	 $exts1 = split("[/\\.]", $m[$i]) ; 
	 $exts[] = $exts1;
	 }
	 return $exts; 
	 } 
	 
	 
	    if($es_classesid==''){ $errormessage['es_classesid'] = "Select Class";}
		if(count($es_preadmissionid)==0){ $errormessage['student'] = "Select Student";}
		if($subject==''){ $errormessage['subject'] = "Enter Subject";}
		if($message==''){ $errormessage['message'] = "Enter Message";}
		
		foreach(findexts($j) as $filetype)
		 {
			 if($filetype[1]=='docx')
			 {
			 	$errormessage[0] = "Invalid file .docx";
			 }
		 }



			if(count($errormessage)==0){
			 	for($i=0; $i<count($es_preadmissionid); $i++){
					$message_arr = array( "from_id"    =>$_SESSION['eschools']['user_id'],
										  "from_type"  =>"staff",	
										  "to_id"      =>$es_preadmissionid[$i],	
										  "to_type"    =>"student",	
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
					if(isset($id)){
					if($es_messagesid!="" && isset($es_messagesid)){
		 $db->update('es_messages', "replay_status ='replied'",'es_messagesid =' . $es_messagesid);
		 }
		 }
				}
				header("location:?pid=28&action=$action&emsg=28");	
			}
	}


}
    
if($action=="mails_received"  || $action=='print_not_list'){
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
	 $msg_qry ="SELECT * FROM es_messages WHERE to_id=".$_SESSION['eschools']['user_id']." AND to_type='staff' and to_status!='deleted' ".$condition." ";
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
	header("location: ?pid=28&action=mails_received&emsg=29");
}
if($action=="deletesent"){
$db->update('es_messages', "from_status ='deleted'", 'es_messagesid =' . $es_messagesid);
header("location: ?pid=28&action=sentmails&emsg=29");
}

if($action=="fullmessage"){
 $msg_qry ="SELECT * FROM es_messages WHERE to_id=".$_SESSION['eschools']['user_id']." AND to_type='staff' and es_messagesid=".$es_messagesid;
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
	   $msg_qry ="SELECT * FROM es_messages WHERE from_id=".$_SESSION['eschools']['user_id'].$condition." AND from_type='staff' and from_status!='deleted'";
	 $no_records = sqlnumber($msg_qry);
	 
		$q_limit      = 10;
		if ( !isset($start) ){
			$start = 0;
		}
		 $msg_qry .="ORDER BY es_messagesid DESC  LIMIT " . $start . "," . $q_limit . "";
     $sel_messages = $db->getrows($msg_qry);
}
if($action=="fullmessage_sent"){
 $msg_qry ="SELECT * FROM es_messages WHERE from_id=".$_SESSION['eschools']['user_id']." AND from_type='staff' and es_messagesid=".$es_messagesid;
 $details_message=$db->getrow($msg_qry);
}


?>
