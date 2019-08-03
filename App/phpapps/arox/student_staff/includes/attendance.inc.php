<?php 
sm_registerglobal('pid', 'action', 'emsg', 
		  'update', 
		  'fid', 
		  'submit', 
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
		  'at_staff_desig', 'at_staff_attend', 'at_staff_remarks', 'at_std_class_report', 'at_staff_dept1', 'at_std_wise_class_report', 'at_stdregno', 'student_report_submit', 'at_std_wise_name', 'dc1', 'dc2', 'at_staffwise_dept', 'at_staffid', 'at_staff_wise_name', 'staffwise_report_submit','class_student_report_submit','caid','from','to'
		  );
/**
* Only Student or schoool staff  can be allowed to access this page
*/ 
checkuserinlogin();
$studid = $_SESSION['eschools']['user_id'];

if(!isset($school_year) && $school_year!="") {
	$from_acad = $_SESSION['eschools']['from_acad'];
	$to_acad   = $_SESSION['eschools']['to_acad'];
}
else {
		$academic_res = getarrayassoc("SELECT * FROM `es_finance_master` WHERE `es_finance_masterid`= $pre_year");
		$from_acad = $academic_res['fi_ac_startdate'];
		$to_acad   = $academic_res['fi_ac_enddate'];
}
/*Start of student Attendance  Page */

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
	 
	 
		$present    = "SELECT *  FROM `es_attend_student` WHERE `at_attendance_date`  BETWEEN '$from' AND '$to'  AND `at_reg_no`='$studid' AND `at_attendance`='P'";
	
		$presentdays_date =  sqlnumber($present);
		
		$work = "SELECT *  FROM `es_attend_student`  WHERE  `at_attendance_date`  BETWEEN '$from' AND '$to' AND `at_reg_no`='$studid' ";
		$workdays_date = sqlnumber($work);
		
		$studentwiseReport     = "SELECT COUNT(*) FROM `es_attend_student`  WHERE `at_attendance_date`  BETWEEN '$from' AND '$to'  AND `at_reg_no`='$studid'";
	 	$studentwiseReportList_date = getamultiassoc($studentwiseReport);
		

	}

	$studurl= "&dc1=$dc1&dc2=$dc2&class_student_report_submit=Search&studid=$studid";
}

	
	/*$studentwiseReport     = "SELECT COUNT(*) FROM `es_attend_student`  WHERE `at_attendance_date` BETWEEN  '$from_acad' AND  '$to_acad' AND `at_reg_no`='$studid'";
	$studentwiseReportList = getamultiassoc($studentwiseReport);
	
	$work = "SELECT *  FROM `es_attend_student`  WHERE `at_attendance_date` BETWEEN  '$from_acad' AND  '$to_acad' AND `at_reg_no`='$studid' ";
	$workdays = sqlnumber($work);
	
	$present = "SELECT *  FROM `es_attend_student`  WHERE  `at_attendance_date` BETWEEN  '$from_acad' AND  '$to_acad' AND `at_reg_no`='$studid' AND `at_attendance`='P'";
	$presentdays = sqlnumber($present);	 
*/
/*Start of student Absentees Attendance  Page */
if ($action == 'class_report_absent') {
	
		$sel_absent = "SELECT * FROM `es_attend_student`  WHERE `at_attendance_date` BETWEEN  '$from_acad' AND  '$to_acad' AND `at_attendance` = 'A' AND `at_reg_no` = '$caid' ORDER BY `at_attendance_date` DESC ";
		$class_absenties = getamultiassoc($sel_absent); 
	}
/*Start of student Absentees Attendance  DatewisePage */
if ($action == 'class_report_absent_date') {

	$sel_absent = "SELECT * FROM `es_attend_student`  WHERE `at_attendance_date`  BETWEEN '$from' AND '$to' AND `at_attendance` = 'A' AND `at_reg_no` = '$caid' ORDER BY `at_attendance_date` DESC ";
	$class_absenties = getamultiassoc($sel_absent); 
}

?> 