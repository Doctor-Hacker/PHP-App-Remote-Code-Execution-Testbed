<?php 
/**
* Only Student or schoool staff  can be allowed to access this page
*/ 
checkuserinlogin();
                                    sm_registerglobal('pid', 
									                  'action',
													  'emsg', 
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
													  'caid',
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
													  'pst'
													  );

$school_details_sel = "SELECT * FROM `es_finance_master` ORDER BY `es_finance_masterid` DESC";
$school_details_res = getamultiassoc($school_details_sel);
$es_attend_student = new es_attend_student();
$es_attend_staff = new es_attend_staff();
if(!isset($pre_year)) {
	$from_acad = $_SESSION['eschools']['from_acad'];
	$to_acad   = $_SESSION['eschools']['to_acad'];
}
else {
		$academic_res = getarrayassoc("SELECT * FROM `es_finance_master` WHERE `es_finance_masterid`= $pre_year");
		$from_acad = $academic_res['fi_ac_startdate'];
		$to_acad   = $academic_res['fi_ac_enddate'];
}
$q_limit  = 4;
if ($Submit=='Save'){
	if ($groups=='all'){
		$classlist = getallClasses();
	}elseif($selectclass=='all'){
		$classlist = getClasses($groups);
	}else{		
		for ($i=0; $i<count($particulars); $i++) {	
			 if ($particulars[$i]!="" && $amount[$i]!=""){
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
				 if ($particulars[$i]!="" && $amount[$i]!="" && $amount[$i]>0){	
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
	//$emsg = ;
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
 
  /**********************************************************************
//* Get  Student Names for taking attendance
**********************************************************************/

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
			$errormessage[1]              = "Invalid";
		} 
		if(count($errormessage)==0) {		 
			if (isset($at_attendance_date)){
				$attendance_date = formatDateCalender($at_attendance_date, 'Y-m-d');
				$today =  date("Y-m-d");
				$rowCount = $db->getOne('SELECT * FROM `es_attend_student` WHERE  `at_attendance_date`= "' .$attendance_date . '" AND `at_std_class` = "' .$at_std_class .'";');	
				$differencedate_val = dateDiff($today, $attendance_date);
					
			}
			 
		   if (isset($rowCount) && $rowCount > 0 ) {
				//$error1 = "Attendance has already been taken for this date";	
				$errormessage[11]= "Attendance has already been taken for this date";
		   }
		   if (isset($differencedate_val) && $differencedate_val > 0 ) {
			   //$error2 = "Attendance cannot be taken for future date's";
			   $errormessage[11]= "Attendance cannot be taken for future date's";
			}
			if(count($errormessage)==0){
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
						$ob_student->Save();
						header("location:?pid=$pid&action=$action&emsg=22");
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
//array_print($_POST);
	
		 
	 	
	if(empty($at_std_class_report)) {
	$errormessage[0]              = "Select Class";
	
	}
	if(empty($dc1)) {
	   $errormessage[1]             = "Enter From Date";

	}
	if(empty($dc2)) {
	$errormessage[2]              = "Enter To  Date";
	
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
	}
/*Start of students Absentees  classwise Print Datewise Page */
if ($action == 'class_report_absent_date') {
		$sel_absent = "SELECT * FROM `es_attend_student`  WHERE `at_attendance_date`  BETWEEN '$from' AND '$to' AND `at_attendance` = 'A' AND `at_reg_no` = '$caid' ORDER BY `at_attendance_date` DESC ";
		$class_absenties = getamultiassoc($sel_absent); 
	}
/*End of students Attendance classwise Inc Page */

 /**********************************************************************
//* Get  Department Names of Particular Staff for Attendance Reporting
**********************************************************************/
//get department name

	//$staffReportList = get_DeptAttend_report($at_staff_dept1);
	
	$staffid = $_SESSION['eschools']['user_id'];
    $staffReport = "SELECT DISTINCT `at_staff_name` , `at_staff_id` FROM `es_attend_staff` WHERE `at_staff_date` BETWEEN  '$from_acad' AND  '$to_acad' AND `at_staff_id` ='$staffid' GROUP BY at_staff_id " ;
	
	$staffReportList = getamultiassoc($staffReport);
	
	//$workdays_staff = get_workingdays_staff($at_staff_dept1);
	
	 $workday = "SELECT  COUNT(`at_staff_date`) FROM `es_attend_staff` WHERE `at_staff_date` BETWEEN  '$from_acad' AND  '$to_acad' AND `at_staff_id` ='$staffid' AND at_staff_attend !='D'";
	
	$workdays_staff = getarrayassoc($workday);
	
	$presentday	= "SELECT COUNT(`at_staff_date`) FROM `es_attend_staff` WHERE `at_staff_date` BETWEEN  '$from_acad' AND  '$to_acad' AND  `at_staff_attend` = 'P' AND `at_staff_id` ='$staffid'";
	
	$presentdays_staff = getarrayassoc($presentday);

if (isset($attend_staff_report_date_submit) && $attend_staff_report_date_submit != "") {

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
	 
	$staffid = $_SESSION['eschools']['user_id'];
	
	$staffReport_date = "SELECT DISTINCT `at_staff_name` , `at_staff_id` FROM `es_attend_staff` WHERE `at_staff_id` ='$staffid'" ;
	
	$staffReportList_date = getamultiassoc($staffReport_date);
			
	 $workday_date = "SELECT  COUNT(*) FROM `es_attend_staff` WHERE  `at_staff_date`  BETWEEN '$from' AND '$to'  AND `at_staff_id` ='$staffid' AND at_staff_attend!='D'";
	
	$workdays_staff_date  = getarrayassoc($workday_date);
	
	$presentday_date	= "SELECT COUNT(*) FROM `es_attend_staff` WHERE  `at_staff_date` BETWEEN '$from' AND '$to' AND`at_staff_attend` = 'P' AND `at_staff_id` ='$staffid'";
	
	$presentdays_staff_date = getarrayassoc($presentday_date);
	
	}	
}	

if ($action == 'staff_report_absent') {
		$sel_absent = "SELECT * FROM `es_attend_staff`  WHERE `at_staff_attend` != 'p' AND `at_staff_attend` != 'D' AND `at_staff_id` = '$caid' ORDER BY `at_staff_date` DESC ";
		$staff_absenties = getamultiassoc($sel_absent); 
	}

if ($action == 'staff_report_absent_date') {
		
		$sel_absent = "SELECT * FROM `es_attend_staff`  WHERE `at_staff_date`  BETWEEN '$from' AND '$to' AND `at_staff_attend` != 'p' AND `at_staff_id` = '$caid' ORDER BY `at_staff_date` DESC ";
		$staff_absenties = getamultiassoc($sel_absent); 
}

if($school_year!=""){
if($at_std_class_report==""){
 $errormessage[0]              = "Select Class";
}
if($pre_year==""){
 $errormessage[1]              = "Select Academic Year";
}

}

?> 