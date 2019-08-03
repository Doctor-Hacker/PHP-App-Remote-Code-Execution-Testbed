<?php 
/**
* Only Admin users can view the pages 
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
		header('location: ./?pid=1&unauth=0');
		exit;
}
	sm_registerglobal('pid', 'action', 'emsg', 
	  'update', 'fid', 'submit', 
	  'fee_amount', 
	  'admin', 
	  'fee_class', 
	  'fee_instalments',
	  'as_sec',
	  'as_lastdate',
	  'as_name',
	  'as_description', 
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
	  'updatefeeitem',
	  'newparticular',
	  'newamount',
	  'newinstalment',
	  'periodSubmit',
	  'at_no_periods',
	  'at_day',
	  'uid',
	  'stud_attend_Submit',
	  'at_std_class',
	  'at_std_group',
	  'at_std_class',
	  'at_attendance_date',
	  'at_std_subject',
	  'at_std_period',
	  'at_period_from',
	  'at_period_to',
	  'at_reg_no',
	  'at_stud_name',
	  'at_attendance',
	  'at_remarks',
	  'at_staff_dept',
	  'staff_attend_Submit',
	  'at_staff_date',
	  'at_staff_id',
	  'at_staff_name',
	  'at_staff_desig',
	  'at_staff_attend',
	  'at_staff_remarks',
	  'at_std_class_report',
	  'at_staff_dept1',
	  'at_std_wise_class_report',
	  'at_stdregno',
	  'student_report_submit',
	  'at_std_wise_name',
	  'dc1',
	  'dc2',
	  'at_staffwise_dept',
	  'at_staffid',
	  'at_staff_wise_name',
	  'staffwise_report_submit',
	  'class_student_report_submit',
	  'attend_staff_report_date_submit',
	  'from',
	  'to',
	  'print_staffwise_report',
	  'caid',
	  'school_year',
	  'pre_year',
	  'sabf',
	  'sabt',
	  'cadf',
	  'cadt',
	  'pcf',
	  'pct',
	  'psf',
	  'pst','es_post','stud_editattend_Submit','stud_updateattend_Submit','studentnamelist1','staff_editattend_Submit','staff_updateattend_Submit','classid'
	  );
	 

if(!isset($school_year)) {
	$from_acad = $_SESSION['eschools']['from_acad'];
	$to_acad   = $_SESSION['eschools']['to_acad'];
}
else {
		$academic_res = getarrayassoc("SELECT * FROM `es_finance_master` WHERE `es_finance_masterid`= $pre_year");
		$from_acad = $academic_res['fi_ac_startdate'];
		$to_acad   = $academic_res['fi_ac_enddate'];
}

$school_details_sel = "SELECT * FROM `es_finance_master` ORDER BY `es_finance_masterid` DESC";
$school_details_res = getamultiassoc($school_details_sel);
$es_attend_student = new es_attend_student();
$es_attend_staff = new es_attend_staff();
 $q_limit  = 4;
 if ($Submit=='Save'){	
	if($groups=='all')
	{
	$classlist = getallClasses();
	}
	elseif($selectclass=='all') 
	{
	$classlist = getClasses($groups);
	}
	else
	{		
		for ($i=0; $i<count($particulars); $i++) {	
					if($particulars[$i]!="" && $amount[$i]!="")
					{	
					$obj_feesmaster = new es_feemaster();
					$obj_feesmaster->fee_particular = strtoupper($particulars[$i]);
					$obj_feesmaster->fee_class = $selectclass;
					$obj_feesmaster->fee_amount = $amount[$i];
					$obj_feesmaster->fee_instalments = $instalments[$i];
					$obj_feesmaster->Save();
					}
				}
	}
	if (count($classlist)>0){
		foreach($classlist as $eachclass){
			for ($i=0; $i<count($particulars); $i++) {
				if($particulars[$i]!="" && $amount[$i]!="" && $amount[$i]>0)
					{	
					$obj_feesmaster = new es_feemaster();
					$obj_feesmaster->fee_particular = strtoupper($particulars[$i]);
					$obj_feesmaster->fee_class = $eachclass['es_classname'];
					$obj_feesmaster->fee_amount = $amount[$i];
					$obj_feesmaster->fee_instalments = $instalments[$i];
					$obj_feesmaster->Save();
					}
			}
		}
	}
	header("Location:?pid=17&action=viewfees&emsg=".$emsg);
	exit;
  }
 
/**********************************************************************
* Get  groups and Classes
**********************************************************************/
//get groups
 $c_groups = get_groups();

//get classes
 if (isset($groups)&& $groups!=""){
	$class_data = getClasses($groups);
  }
// get Departments 
	$exesqlquery = "SELECT * FROM `es_departments`";
$getdeptlist = getamultiassoc($exesqlquery); 
  /**********************************************************************
//* Get  Student Names for taking attendance
**********************************************************************/
//get student name
if(isset($at_std_class) && $at_std_class!=""){
	$studentnamelist = get_StudAttend($at_std_class);
	
}	
/*
*Start of Enter Students Attendance Inc Page
*/
if ($action == "stud_attend") { 
	if(isset($stud_attend_Submit) && $stud_attend_Submit != "") {
		$error = "";
		$vlc = new FormValidation();
		
		if(empty($at_attendance_date)) {
			$errormessage[0]         = "Enter Date";
		
		 }
		if(empty($at_attendance)) {
			$errormessage[1]         = "Invalid";
		} 
		if(count($errormessage)==0) {		 
			if (isset($at_attendance_date)){
				$attendance_date = formatDateCalender($at_attendance_date, 'Y-m-d');
				$today =  date("Y-m-d");
				$rowCount = $db->getOne('SELECT * FROM `es_attend_student` WHERE  `at_attendance_date`= "' .$attendance_date . '" AND `at_std_class` = "' .$at_std_class .'";');	
				$differencedate_val = dateDiff($today, $attendance_date);
					
			}
			 
		   if (isset($rowCount) && $rowCount > 0 ) {
				$emsg = 37;	
				header("location:?pid=$pid&action=stud_attend&at_std_class=$at_std_class&emsg=37");
				exit;
		   }
		   if (isset($differencedate_val) && $differencedate_val > 0 ) {
			   $emsg = 38;
			   header("location:?pid=$pid&action=stud_attend&at_std_class=$at_std_class&emsg=38");
			   exit;
			}
			if(empty($error) && empty($error1) && empty($error2)) {
			  
				 for ($i=0; $i<count($at_stud_name); $i++) {
					if($at_stud_name[$i]!="" )
						{	
						$ob_student = new es_attend_student();
						$ob_student->at_std_class = $at_std_class;
						$ob_student->at_std_subject = $at_std_subject;
						$ob_student->at_period_from = $at_period_from;
						$ob_student->at_period_to = $at_period_to;
						$ob_student->at_attendance_date = $attendance_date;
						$ob_student->at_reg_no = $at_reg_no[$i];
						$ob_student->at_stud_name = $at_stud_name[$i];
						$ob_student->at_attendance = $at_attendance[$i];
						$ob_student->at_remarks = $at_remarks[$i];
						
						
						
						  $id=$ob_student->save();
				    if(isset($id) && $id!="") {
					
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_attend_student','ATTENDANCE','STUDENT ATTENDANCE','".$id."',' ENTER STUDENT ATTENDANCE','".$_SERVER['REMOTE_ADDR']."',NOW())";
$log_insert_exe=mysql_query($log_insert_sql);
						
						header("location:?pid=$pid&action=stud_attend&emsg=22");
						}
								 } 
				 }
			}	
	}
  }
}
/*
*End of Enter Students Attendance Inc Page
*/
/*
*Start  of Enter Staff Attendance Inc Page
*/
/**********************************************************************
//* Get  Staff Names
**********************************************************************/
//get Staff name
if(isset($at_staff_dept) && $at_staff_dept!=""){
	$staffdept = getstudentdetails($at_staff_dept);
	
}	

if(isset($staff_attend_Submit) && $staff_attend_Submit != "") {

		
	     $error = "";
 
		 $vlc = new FormValidation();
		 
		 if(empty($at_staff_date)) {
		    $errormessage[0]         = "Enter Date";

		 }
		 
		 if(empty($at_staff_attend)) {
		   $errormessage[1]              = "Invalid";
         
		 } 	
		  		  
	 if(count($errormessage)==0)
	 {	  
		  if (isset($at_staff_date)){
            		$staff_date = formatDateCalender($at_staff_date, 'Y-m-d');
                    $today =  date("Y-m-d");
         			$rowCount = $db->getOne('SELECT * FROM `es_attend_staff` WHERE  `at_staff_date`= "' .$staff_date . '" AND `at_staff_dept` = "' .$at_staff_dept .'";');	
			        $differencedate_val = dateDiff($today, $staff_date);
		  		
		  }
		 
		  if (isset($rowCount) && $rowCount > 0 ) {
		   
		      $emsg = 37;	
				header("location:?pid=$pid&action=staff_attend&at_staff_dept=$at_staff_dept&emsg=37");
				exit;
			  	 	  
		  }
		   if (isset($differencedate_val) && $differencedate_val > 0 ) {
		  
				$emsg = 38;	
				header("location:?pid=$pid&action=staff_attend&at_staff_dept=$at_staff_dept&emsg=38");
				exit;
			  	 	  
		  }
		  
		  if(empty($error) && empty($error1) && empty($error2)) {
			
			 for ($i=0; $i<count($at_staff_name); $i++) {
				if($at_staff_name[$i]!="" )
					{	
					if( ($at_staff_attend[$i]=='A' || $at_staff_attend[$i]=='L') && $at_staff_remarks[$i]!='LWP'){
					    
					     $sql_gettotalleaves = "SELECT SUM(lev_leavescount) as total FROM  es_leavemaster WHERE lev_post=".$es_post." AND lev_from_date='".$from_acad."' AND lev_to_date ='".$to_acad."'"; 
					    $total_leaves = $db->getrow($sql_gettotalleaves);
						
					    $sss_qry = "SELECT COUNT(*) FROM  es_attend_staff WHERE at_staff_id='".$at_staff_id[$i]."' AND (at_staff_attend = 'L' OR at_staff_attend = 'A')  AND at_staff_remarks != 'LWP' AND at_staff_date BETWEEN '".$from_acad."' AND '".$to_acad."'";
						$staff_used = $db->getone($sss_qry );
						if($staff_used >= $total_leaves['total']){
						
						   $at_staff_remarks[$i] = 'LWP';
						
						}
					
						
						
						
					}
					//echo $at_staff_name[$i]."<hr>";
					$ob_staff = new es_attend_staff();
					$ob_staff->at_staff_dept = $at_staff_dept;
				    $ob_staff->at_staff_date = $staff_date;
					$ob_staff->at_staff_id = $at_staff_id[$i];
					$ob_staff->at_staff_name = $at_staff_name[$i];
				    $ob_staff->at_staff_attend = $at_staff_attend[$i];
					$ob_staff->at_staff_desig = $at_staff_desig[$i];
					$ob_staff->at_staff_remarks = $at_staff_remarks[$i];
					$ob_staff->Save();
					  $id=$ob_staff->save();
				    if(isset($id) && $id!="") {
					
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_attend_staff','ATTENDANCE','FACULTY ATTENDANCE','".$id."','CREATE FACULTY ATTANDANCE','".$_SERVER['REMOTE_ADDR']."',NOW())";
$log_insert_exe=mysql_query($log_insert_sql);
					
					header("location:?pid=$pid&action=$action&emsg=22");
					}
				  
               }  }
			 
           }

  }
} 
/*
*End  of Enter Staff Attendance Inc Page
*/
/*
*Start Student Attendance Record for student wise Inc Page
*/

/**********************************************************************
* Get  Student Attendance Record for student wise for reg number
**********************************************************************/
//get Student Attendance
if(isset($at_std_wise_class_report) && $at_std_wise_class_report!=""){
	
	$stud_regno =  get_StudAttend($at_std_wise_class_report);
}	
	
/**********************************************************************
* Get  Student Attendance Record for student wise for name
**********************************************************************/
//get Student Attendance
if(isset($at_stdregno) && $at_stdregno!=""){
	
	$stud_name =  get_StudAttend_Reg1($at_stdregno);

}	

/**
*For Particular Studentwise Report 
*/
if(isset($student_report_submit) && $student_report_submit != "") {
	$error = "";
	$vlc = new FormValidation();
	if(empty($at_std_wise_class_report)) {
	$errormessage[0]             = "Select Class";
	
	}
	
	if(empty($at_stdregno)) {
	$errormessage[1]              = "Select Registration No";
	
	} 	
	
	if(empty($dc1)) {
	$errormessage[2]             = "Enter From Date";
	
	}
	
	if(empty($dc2)) {
	$errormessage[3]              = "Enter To  Date";
	
	} 	
	 
	if(count($errormessage)==0)
	 {
		 $from   =  formatDateCalender($dc1, 'Y-m-d'); 
		 $to     =  formatDateCalender($dc2, 'Y-m-d');
		
		$studentwiseReportList = get_StudWise_report($from,$to,$at_std_wise_class_report,$at_stdregno);
		$studurl				= "&from=$from&to=$to&at_std_wise_class_report=$at_std_wise_class_report&at_stdregno=$at_stdregno";
	}
	
	 $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_attend_student','ATTENDANCE','STUDENT REPORT','".$at_stdregno."','PRINT STUDENT REPORT','".$_SERVER['REMOTE_ADDR']."',NOW())";
$log_insert_exe=mysql_query($log_insert_sql);

	$cnt_rec_atnd = $studentwiseReportList[0]['COUNT(*)'];
}
/*
*End Student Attendance Record for student wise Inc  Page
*/
/*
*Start of Student Attendance Record for student wise Inc Print Page
*/
if ($action == 'print_stud_report') {

	$class = "SELECT es_classname FROM es_classes WHERE es_classesid='".$at_std_wise_class_report."'";
	$className	= getarrayassoc($class);
	$studentwiseReportList = get_StudWise_report($from,$to,$at_std_wise_class_report,$at_stdregno);

}
/*
*End Student Attendance Record for student wise Inc Print Page
*/
/*Start of students Attendance classwise Inc Page */


$printpassurl = "";
if(isset($at_std_class_report) && $at_std_class_report!=""){
 
	$studentReportList = getamultiassoc("SELECT DISTINCT `at_reg_no` ,`at_stud_name` FROM `es_attend_student` WHERE  `at_attendance_date` BETWEEN  '$from_acad' AND  '$to_acad' AND `at_std_class`= '$at_std_class_report'");
	$printpassurl = "&at_std_class_report=$at_std_class_report&pcf=$from_acad&pct=$to_acad";
	
}	
 
if (isset($class_student_report_submit) && $class_student_report_submit != "") { 
	if(empty($dc1)) {
	   $errormessage[0]             = "Enter From Date";

	}
		 
	if(empty($dc2)) {
	$errormessage[1]              = "Enter To  Date";
	
	} 	
	 
	if(count($errormessage)==0)
	 {

 	  $from   =  formatDateCalender($dc1, 'Y-m-d'); 
	  $to     =  formatDateCalender($dc2, 'Y-m-d');
	 $printpassurl = "&at_std_class_report=$at_std_class_report&from=$from&to=$to";
	 $studentReport_date    = "SELECT DISTINCT `at_reg_no` ,`at_stud_name` FROM `es_attend_student` WHERE `at_attendance_date`  BETWEEN '$from' AND '$to'  AND `at_std_class`= '$at_std_class_report'";
	 
	
	 
	 
	 $studentReportList_date =  getamultiassoc($studentReport_date);
	
	

	
	
	}
}

/*Start of students classwise Print Page */

if($action == "print_class_report")
{
	$class = "SELECT es_classname FROM es_classes WHERE es_classesid='".$at_std_class_report."'";
	$className	= getarrayassoc($class);
	 $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_attend_student','ATTENDANCE','CLASS REPORT','".$at_stdregno."','PRINT CLASS REPORT','".$_SERVER['REMOTE_ADDR']."',NOW())";
$log_insert_exe=mysql_query($log_insert_sql);


	if(isset($at_std_class_report) && $at_std_class_report!="" && $from=="" && $to==""){
		$studentReportList = getamultiassoc("SELECT DISTINCT `at_reg_no` ,`at_stud_name` FROM `es_attend_student` WHERE  `at_attendance_date` BETWEEN  '$pcf' AND  '$pct' AND `at_std_class`= '$at_std_class_report'");
		
	}

	if($at_std_class_report!="" && $from!="" && $to!=""){
	   $studentReport_date    = "SELECT DISTINCT `at_reg_no` ,`at_stud_name` FROM `es_attend_student` WHERE `at_attendance_date`  BETWEEN '$from' AND '$to'  AND `at_std_class`= '$at_std_class_report'";
	   $studentReportList_date =  getamultiassoc($studentReport_date);
	
	


	
	
	}
}
/*Start of students Absentees  classwise Print Page */

if ($action == 'class_report_absent') {
		$sel_absent = "SELECT * FROM `es_attend_student`  WHERE `at_attendance_date` BETWEEN  '$cadf' AND  '$cadt' AND `at_attendance` = 'A' AND `at_reg_no` = '$caid' ORDER BY `at_attendance_date` DESC ";
		$class_absenties = getamultiassoc($sel_absent); 
		
		 $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_attend_student','ATTENDANCE','CLASS REPORT','".$class_absenties."','PRINT CLASS REPORT ABSENT','".$_SERVER['REMOTE_ADDR']."',NOW())";
$log_insert_exe=mysql_query($log_insert_sql);
	}
/*Start of students Absentees  classwise Print Datewise Page */

if ($action == 'class_report_absent_date') {
		$sel_absent = "SELECT * FROM `es_attend_student`  WHERE `at_attendance_date`  BETWEEN '$from' AND '$to' AND `at_attendance` = 'A' AND `at_reg_no` = '$caid' ORDER BY `at_attendance_date` DESC ";
		$class_absenties = getamultiassoc($sel_absent); 
	 $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_attend_student','ATTENDANCE','CLASS REPORT','".$caid."','PRINT CLASS REPORT','".$_SERVER['REMOTE_ADDR']."',NOW())";
$log_insert_exe=mysql_query($log_insert_sql);
}
/*End of students Attendance classwise Inc Page */
/*
*Code for staffwise Attendance Report Starts Here
*/
/*  Fetching Staff Id  According to the Selection of Department Name */
if (isset($at_staffwise_dept) && $at_staffwise_dept!= "") {
 	
	$sel_staffid = "SELECT * FROM  `es_staff` WHERE `st_department` = '".$at_staffwise_dept."'"; 
	$res_staffid = getamultiassoc($sel_staffid);
	

}

/* Fetching Staff Name Depending upon the Selection of Staff ID */
if (isset($at_staffid) && $at_staffid!="" ) {

	$sel_staff_name = "SELECT * FROM  `es_staff` WHERE `es_staffid` = '".$at_staffid ."'";
	$res_staff_name = getamultiassoc($sel_staff_name);
}


/**
*For Particular StaffWise Report
*/
if (isset($staffwise_report_submit) && $staffwise_report_submit !="") {
	 $error = "";

	 $vlc = new FormValidation();
	  if(empty($at_staffwise_dept)) {
		$errormessage[0]             = "Select Department";

	 }
	 
	 if(empty($at_staffid)) {
	   $errormessage[1]              = "Select Employee Id";
	 
	 } 	
	 
	 if(empty($dc1)) {
		$errormessage[2]             = "Enter From Date";

	 }
	 
	 if(empty($dc2)) {
	   $errormessage[3]              = "Enter To  Date";
	 
	 } 	
	 
	if(count($errormessage)==0)
	 {
	 
	 $from   =  formatDateCalender($dc1, 'Y-m-d'); 
	 $to     =  formatDateCalender($dc2, 'Y-m-d');
	 
	 
	 $Sel_Staffwise_report = "SELECT COUNT(*) FROM `es_attend_staff` WHERE `at_staff_date` BETWEEN '$from' AND '$to'  AND `at_staff_dept` = '" .$at_staffwise_dept ."' AND `at_staff_id` = '". $at_staffid."'  ";
	 
	 
	$Staffwise_report = getamultiassoc($Sel_Staffwise_report);
	
	$cnt_rec_atnd = $Staffwise_report[0]['COUNT(*)'];

		
	 $staffwiseurl = "&from=$from&to=$to&at_staffwise_dept=$at_staffwise_dept&at_staffid=$at_staffid"; 

	
	$sel_workdays = "SELECT * FROM `es_attend_staff` WHERE `at_staff_date` BETWEEN '$from' AND '$to'  AND `at_staff_dept` = '" .$at_staffwise_dept ."' AND `at_staff_id` = '". $at_staffid."'   ";
	
	
	$workdays     = sqlnumber($sel_workdays);
	
	$sel_presentdays = "SELECT * FROM `es_attend_staff` WHERE `at_staff_date` BETWEEN '$from' AND '$to'  AND `at_staff_dept` = '" .$at_staffwise_dept ."' AND `at_staff_id` = '". $at_staffid."'   AND `at_staff_attend`='P'";
	
	$presentdays = sqlnumber($sel_presentdays);
	}
	

}
/*
*Code for Print of staffwise Attendance Report Starts Here
*/
if ($action == 'print_staffwise_report') {

	$Sel_Staffwise_report = "SELECT COUNT(*) FROM `es_attend_staff` WHERE `at_staff_date` BETWEEN '$from' AND '$to'  AND `at_staff_dept` = '" .$at_staffwise_dept ."' AND `at_staff_id` = '". $at_staffid."'  ";
	 
	$Staffwise_report = getamultiassoc($Sel_Staffwise_report);
	$sel_workdays = "SELECT * FROM `es_attend_staff` WHERE `at_staff_date` BETWEEN '$from' AND '$to'  AND `at_staff_dept` = '" .$at_staffwise_dept ."' AND `at_staff_id` = '". $at_staffid."'   ";
	
	$workdays     = sqlnumber($sel_workdays);
	
	$sel_presentdays = "SELECT * FROM `es_attend_staff` WHERE `at_staff_date` BETWEEN '$from' AND '$to'  AND `at_staff_dept` = '" .$at_staffwise_dept ."' AND `at_staff_id` = '". $at_staffid."'   AND `at_staff_attend`='P'";
	
	$presentdays = sqlnumber($sel_presentdays);
	
	
}
/*
*Code for staff Attendance Report Starts Here
*/
/**********************************************************************
//* Get  Department Names for reporting
**********************************************************************/
//get department name
$staffurl = "";
if(isset($at_staff_dept1) && $at_staff_dept1!=""){
	$staffReportList =  getamultiassoc("SELECT DISTINCT `at_staff_name` , `at_staff_id` ,at_staff_desig  FROM `es_attend_staff` WHERE  `at_staff_date` BETWEEN  '$from_acad' AND  '$to_acad' AND `at_staff_dept` ='$at_staff_dept1'");
	
	$staffurl		="&at_staff_dept1=$at_staff_dept1&psf=$from_acad&pst=$to_acad";
	
}
if (isset($attend_staff_report_date_submit) && $attend_staff_report_date_submit != "") {

	if(empty($dc1)) {
		    $errormessage[0]             = "Enter From Date";

	}
		 
	 if(empty($dc2)) {
	   $errormessage[1]              = "Enter To  Date";
	 
	 } 	
	 
	if(count($errormessage)==0)
	 {
  	 $from   =  formatDateCalender($dc1, 'Y-m-d').' 00:00:00'; 
	 $to     =  formatDateCalender($dc2, 'Y-m-d').' 23:59:59';
	 $staffurl		="&at_staff_dept1=$at_staff_dept1&from=$from&to=$to";
	 
	 $staffReport_date    = "SELECT DISTINCT `at_staff_name` , `at_staff_id`,at_staff_desig FROM `es_attend_staff` WHERE `at_staff_date`  BETWEEN '$from' AND '$to'  AND `at_staff_dept` ='$at_staff_dept1'";
	
		$staffReportList_date =  getamultiassoc($staffReport_date);
	}	

}	
/*
*Code for Print of staff Attendance Report Starts Here
*/
if ($action == 'print_staff_report') {

	if (isset($at_staff_dept1) && $at_staff_dept1!="" && $from!= "" && $to!= "") {
	
	$staffReport_date    = "SELECT DISTINCT `at_staff_name` , `at_staff_id`,at_staff_desig FROM `es_attend_staff` WHERE `at_staff_date`  BETWEEN '$from' AND '$to'  AND `at_staff_dept` ='$at_staff_dept1'";
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."',' es_attend_staff','ATTENDANCE','FACULTY REPORT','".$at_staff_dept."','PRINT FACULTY REPORT','".$_SERVER['REMOTE_ADDR']."',NOW())";
$log_insert_exe=mysql_query($log_insert_sql);
	
		$staffReportList_date =  getamultiassoc($staffReport_date);
		
		

		
		
	}
}
	
/*Start of Staff Attendance  Absentees Print Page */ 	
if ($action == 'staff_report_absent') {
	$sel_absent = "SELECT * FROM `es_attend_staff`  WHERE `at_staff_date` BETWEEN  '$sabf' AND  '$sabt' AND `at_staff_attend` != 'p' AND `at_staff_id` = '$caid' ORDER BY `at_staff_date` DESC ";
	$staff_absenties = getamultiassoc($sel_absent); 

$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."',' es_attend_staff','ATTENDANCE','FACULTY REPORT','".$caid."','PRINT FACULTY ABSENT REPORT','".$_SERVER['REMOTE_ADDR']."',NOW())";
$log_insert_exe=mysql_query($log_insert_sql);





}
/*Start of Staff Attendance  Absentees Print Page Dtaewise */ 
if ($action == 'staff_report_absent_date') {
	$sel_absent = "SELECT * FROM `es_attend_staff`  WHERE `at_staff_date`  BETWEEN '$from' AND '$to' AND `at_staff_attend` != 'p' AND `at_staff_id` = '$caid' ORDER BY `at_staff_date` DESC ";
	$staff_absenties = getamultiassoc($sel_absent); 
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."',' es_attend_staff','ATTENDANCE','EMPLOYEE REPORT','".$caid."','PRINT STAFF ABSENT REPORT DATEWISE','".$_SERVER['REMOTE_ADDR']."',NOW())";
$log_insert_exe=mysql_query($log_insert_sql);



}

if($action=='staff_report'){

	if($school_year2!=""){
	
	}
	
	if($attend_staff_report_date_submit!=""){
	
	
	
	}
}

/*
*Start of Edit Students Attendance Inc Page
*/
if ($action == "edit_stud_attendence") { 
	if(isset($stud_editattend_Submit) && $stud_editattend_Submit != "") {
		$error = "";
		$vlc = new FormValidation();
		
		if(empty($at_std_class)) {
			$errormessage[0]         = "Select Class";
		} 
		if(empty($at_attendance_date)) {
			$errormessage[1]         = "Enter Date";
		
		 }
		
		
		if(count($errormessage)==0) { $studentnamelist1 = get_StudAttend($at_std_class); 
		$at_attendance_date1=formatDateCalender($at_attendance_date, 'Y-m-d');
		$attendance = "SELECT * FROM `es_attend_student` WHERE at_std_class='".$at_std_class."' AND at_attendance_date='".$at_attendance_date1."' AND at_std_subject='".$at_std_subject."' AND at_std_period='".$at_std_period."'";
		$attendance_num =sqlnumber($attendance);
		
		
		
		
		}
  }
  if(isset($stud_updateattend_Submit) && $stud_updateattend_Submit != "") {
  $studentnamelist1 = get_StudAttend($at_std_class);
  foreach ($studentnamelist1 as $student)
	{
	$student_addtendance=$_POST['at_attendance'.$student['es_preadmissionid']];
	$student_remarks=$_POST['at_remarks'.$student['es_preadmissionid']];
	$at_attendance_date1=formatDateCalender($at_attendance_date, 'Y-m-d');	
     $sql="UPDATE `es_attend_student` SET at_attendance='".$student_addtendance."',at_remarks='".$student_remarks."' WHERE at_std_class='".$at_std_class."' AND at_attendance_date='".$at_attendance_date1."' AND at_reg_no=".$student['es_preadmissionid']; 
mysql_query($sql);

$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_attend_student','ATTENDANCE','STUDENT ATTENDANCE','".$student['es_preadmissionid']."',' UPDATE STUDENT ATTENDANCE','".$_SERVER['REMOTE_ADDR']."',NOW())";
$log_insert_exe=mysql_query($log_insert_sql);

header("location: ?pid=27&action=edit_stud_attendence&emsg=55");
exit;


}
$studentnamelist1 = get_StudAttend($at_std_class);
$at_attendance_date1=formatDateCalender($at_attendance_date, 'Y-m-d');
$attendance = "SELECT * FROM `es_attend_student` WHERE at_std_class='".$at_std_class."' AND at_attendance_date='".$at_attendance_date1."' ";
$attendance_num =sqlnumber($attendance);
}}

if ($action == "edit_staff_attendence") { 
//array_print($_POST); 
	if(isset($staff_editattend_Submit) && $staff_editattend_Submit != "") {
		$error = "";
		$vlc = new FormValidation();
		
		if(empty($at_staff_dept)) {
			$errormessage[0]         = "Select Class";
		} 
		if(empty($at_staff_date)) {
			$errormessage[1]         = "Enter Date";
		
		 }
		
		
		if(count($errormessage)==0) { //$studentnamelist1 = get_StudAttend($at_std_class); 
		$at_attendance_date1=formatDateCalender($at_staff_date, 'Y-m-d');
		$attendance = "SELECT * FROM `es_attend_staff` WHERE at_staff_dept='".$at_staff_dept."' AND at_staff_date='".$at_attendance_date1."'";
		$attendance_num =sqlnumber($attendance);
		
		
		
		
		}
  }
  if(isset($staff_updateattend_Submit) && $staff_updateattend_Submit != "") {

  $staffdept = getstudentdetails($at_staff_dept);
  foreach ($staffdept as $staff)
	{
	$staff_addtendance=$_POST['at_staff_attend'.$staff['es_staffid']];
	$staff_remarks=$_POST['at_staff_remarks'.$staff['es_staffid']];
	$at_attendance_date1=formatDateCalender($at_staff_date, 'Y-m-d');	
     $sql="UPDATE `es_attend_staff` SET at_staff_attend='".$staff_addtendance."',at_staff_remarks='".$staff_remarks."' WHERE at_staff_dept='".$at_staff_dept."' AND at_staff_date='".$at_attendance_date1."' AND at_staff_id=".$staff['es_staffid']; 
mysql_query($sql);
}

$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_attend_staff','ATTENDANCE','FACULTY ATTENDANCE','".$staff['es_staffid']."','EDIT FACULTY ATTANDANCE','".$_SERVER['REMOTE_ADDR']."',NOW())";
$log_insert_exe=mysql_query($log_insert_sql);


/*$studentnamelist1 = getstudentdetails($at_staff_dept);
$at_attendance_date1=formatDateCalender($at_attendance_date, 'Y-m-d');
$attendance = "SELECT * FROM `es_attend_staff` WHERE at_staff_dept='".$at_staff_dept."' AND at_attendance_date='".$at_attendance_date1."' ";
$attendance_num =sqlnumber($attendance);*/
header("location: ?pid=27&action=edit_staff_attendence&emsg=55");
exit;
}
}





?> 