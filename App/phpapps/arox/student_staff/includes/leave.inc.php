<?php 
                                    sm_registerglobal('pid', 
									                  'action',
													  'emsg', 
													  'update', 
													  'fid', 
													  'submit', 
													  'fee_amount', 
													  'admin', 
													  'Submit',
													  'as_createdon',
													  'as_lastdate',
													  'update',
													  'es_assid',
													  'back', 
													  'particulars',
													  'groups',
													  'selectclass',
													  'amount',
													  'instalments',
													   'periodSubmit',
													  'at_no_periods',
													  'at_day',
													  'uid',
													  'stud_attend_Submit',
													  'student_report_submit',
													  'at_std_wise_name',
													  'dc1',
													  'dc2',
													  'staffwise_report_submit',
													  'class_student_report_submit',
													  'attend_staff_report_date_submit',
													  'es_leaveleterid',
													  'leave_msg','pid','action','update','start','column_name','asds_order','update_leaveleter','sid','blogDesc','emsg'
													  );
/**
* Only Student or schoool staff  can be allowed to access this page
*/ 
checkuserinlogin();

$from_acad = $_SESSION['eschools']['from_acad'];
	$to_acad   = $_SESSION['eschools']['to_acad'];
?>



		
<?php if ($action == 'Leave') {
$obj_leavemaster = new es_leavemaster();
		$q_limit  = 10;
		if ( !isset($start))$start = 0;
	 	$sql_qry = "SELECT L.* FROM es_leavemaster L , es_staff S  WHERE S.st_post = L.lev_post AND es_staffid =".$_SESSION['eschools']['user_id']." AND lev_from_date>='".$from_acad."'AND lev_to_date<='".$to_acad."'";
		$no_rows = sqlnumber($sql_qry);
		$sql_qry .= " order by es_leavemasterid limit ".$start." , ".$q_limit." "; 
		$leavemaster_det = $db->getRows($sql_qry);
 }
 
 
 
 
 if($action=='Leave' || $action=='leaveletter_edit'  ||  $action=='printleaveletter')  {

    
 	$es_leaveleter  =  new es_leaveleter();
	$es_staff        =  new es_staff();  
	
	$leaveletter_det = $es_leaveleter ->GetList(array(array("es_leaveleterid", ">", 0)) );
	//array_print($leaveletter_det);
	}
	
	foreach ($leaveletter_det as $eachrecord) {
	$message=$eachrecord->leave_msg ;
	} 
	
	if (isset($update_leaveleter) && $update_leaveleter!= "") {
		$db->update("es_leaveleter","leave_msg = '$blogDesc'","es_leaveleterId = '".$sid."'");
		//header("Location:?pid=24&action=leaveletter_edit&sid=1&emsg=2");
		header("Location:?pid=24&action=Leave&emsg=2");
		exit;
		
	}
	
	 	$staffId =  $_SESSION['eschools']['user_id'];       
	$staffList  =  $es_staff ->GetList(array(array("es_staffid", "=", "$staffId")) );
	
	foreach ($staffList as $eachstaff) {
	$name          =$eachstaff->st_firstname;
	$address       =$eachstaff->st_pradress;
	$state         =$eachstaff->st_prcity;
	$city          =$eachstaff->st_prstate;
	$zip           =$eachstaff->st_prpincode;
	$postaplied    =$eachstaff->st_postaplied;
	$department    =$eachstaff->st_department;
	$doj           =$eachstaff->st_dateofjoining;
	$basic         =$eachstaff->st_basic;
	$date          =date('d/m/Y');
	$to            =$eachstaff->st_email;
	$es_post       =$eachstaff->st_post;
	}
		

		/* if($action=='leaveletter_edit' || $action=='Leave' ){
		  	$es_leaveleter  =  new es_leaveleter();
	
	$leaveletter_det = $es_leaveleter ->GetList(array(array("es_leaveleterid", ">", 0)) );
	}
	
	foreach ($leaveletter_det as $eachrecord) {
	$message=$eachrecord->leave_msg ;
	} 
	
	if (isset($update_leaveleter) && $update_leaveleter!= "") {
		$db->update("es_leaveleter","leave_msg = '$blogDesc'","es_leaveleterId = '".$sid."'");
		header("Location:?pid=24&action=leave&emsg=2");
		exit;
		 }
		 
		*/
		
/*			sm_registerglobal ('pid','action','update','start','column_name','asds_order','uid','update_resignation','blogDesc','sid','emsg');
	$es_resignation  =  new es_resignation();
	
	$resignation = $es_resignation ->GetList(array(array("es_resignationid", ">", 0)) );
	
	foreach ($resignation as $eachresignation) {
	$message=$eachresignation->res_letter ;
	} 
	
	if (isset($update_resignation) && $update_resignation!= "") {
		$db->update("es_resignation","res_letter = '$blogDesc'","es_resignationId = '".$sid."'");
		header("Location:?pid=25&action=res_format&emsg=2");
		exit;
		
	}
*/


/*foreach ($leaveletter_det as $eachrecord) {
	$message=$eachrecord->leave_msg ;
	} 
	
	if (isset($update_leaveleter) && $update_leaveleter!= "") {
		$db->update("es_leaveleter","leave_msg = '$blogDesc'","es_leaveleterId = '".$sid."'");
		header("Location:?pid=24&action=leave&emsg=2");
		exit;
		
	}*/
		
		
		
/* $obj_leaveleter = new es_leaveleter();
{
	$obj_leaveleter =$es_leaveleter ->GetList(array(array("es_leaveleterId", ">", 0)) );
}*/
/*if($action=='offerletter')
{
	$offerview =$es_offerletter ->Get($sid);
}
	*/
/*if(isset($Offerupdate))
{	
$db->update('es_offerletter',
"ofr_message         ='$blogDesc'", 'es_offerletterid ='. $sid);
header('location: ?pid=24&action=leave&sid=1&emsg=2');*/
	
//}
 
 
// }


?>
