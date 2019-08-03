<?php
ob_start();
session_start();
//Report simple running errors
	//error_reporting(E_ERROR | E_WARNING | E_PARSE);
// Report all errors except E_NOTICE
 //error_reporting(E_ALL ^ E_NOTICE);
   error_reporting(0);

	//This variable is for avoiding the unautherized page access 
	$path_arr = explode('/', $_SERVER['PHP_SELF']);
	$cur_foldpath =  count($path_arr)-3;
	if(isset($_SESSION['eschools']['superadmin_school']) && $_SESSION['eschools']['superadmin_school']!=$path_arr[$cur_foldpath]){
		header("Location: ../index.php?emsg=15");
		exit;
	}
	
	if (!defined('FROMINDEX')) {
		define('FROMINDEX', true);
	}

	if (!defined('DS')) {
		define('DS', '/');
	}	
	include ('includes/config.inc.php');
	//class
	function __autoload($class_name) {
		include_once INCLUDES_CLASS_PATH . DS . "class." . $class_name . '.php';
	}
	
	include (INCLUDES_CLASS_PATH . DS .'developer.mysql.class.php');
	include (INCLUDES_CLASS_PATH . DS . 'validation.class.php');
	include (INCLUDES_CLASS_PATH . DS . 'html_form.class.php');
	//files
	include (INCLUDES_PATH . DS .'messages.inc.php');
	include (INCLUDES_PATH . DS . 'functions.inc.php');
		
	sm_registerglobal('pid', 'admin', 'action', 'set_color');
/**
* Creation of database object for  class developer_db [developer.mysql.class.php file]
*/
	$db = new developer_db();
/**
* Meta keywords list
*/
	$meta_keywords    = "";
	$meta_description = "";

	/// List of processes
	$arr_pages = array (
				0=> array (
							'action' => 'default.inc',
							'view'   => 'default.tpl',
							'labels' => 'default.lbl',
							'title'  => 'Default Page'
								),
				1=> array (
							'action' => 'stafflogin.inc',
							'view'   => 'stafflogin.tpl',
							'labels' => 'stafflogin.lbl',
							'title'  => 'Staff Sign up'
							    ),
				2=> array (
							'action' => 'myprofile.inc',
							'view'   => 'myprofile.tpl',
							'labels' => 'myprofile.lbl',
							'title'  => 'My Profile'
							),
				3=> array (
							'action' => 'attendance.inc',
							'view'   => 'attendance.tpl',
							'labels' => 'attendance.lbl',
							'title'  => 'Attendance'
							),
				4=> array (
							'action' => 'knowledge_base.inc',
							'view'   => 'knowledge_base.tpl',
							'labels' => 'knowledge_base.lbl',
							'title'  => 'Knowledge Base'
							),
				5=> array (
							'action' => 'changepassword.inc',
							'view'   => 'changepassword.tpl',
							'labels' => 'changepassword.lbl',
							'title'  => 'Change Password'
							),
				6=> array (
							'action' => 'transport.inc',
							'view'   => 'transport.tpl',
							'labels' => 'transport.lbl',
							'title'  => 'Transport'
							),
				7=> array (
							'action' => 'themes.inc',
							'view'   => 'themes.tpl',
							'labels' => 'themes.lbl',
							'title'  => 'Themes'
							),
				8=> array (
							'action' => 'help.inc',
							'view'   => 'help.tpl',
							'labels' => 'help.lbl',
							'title'  => 'Help'
							),
				9=> array (
							'action' => 'logout.inc',
							'view'   => 'logout.tpl',
							'labels' => 'logout.lbl',
							'title'  => 'Logout'
							),
				10=> array (
							'action' => 'feedetails.inc',
							'view'   => 'feedetails.tpl',
							'labels' => 'feedetails.lbl',
							'title'  => 'Fee details '
							),
				11=> array (
							'action' => 'examination1.inc',
							'view'   => 'examination1.tpl',
							'labels' => 'examination1.lbl',
							'title'  => 'Academic Examinations'
							),
				12=> array (
							'action' => 'assignment.inc',
							'view'   => 'assignment.tpl',
							'labels' => 'assignment.lbl',
							'title'  => 'Assignment  Details'
							),
				13=> array (
							'action' => 'timetable.inc',
							'view'   => 'timetable.tpl',
							'labels' => 'timetable.lbl',
							'title'  => 'Time Table'
							),
				14=> array (
							'action' => 'viewnotice.inc',
							'view'   => 'viewnotice.tpl',
							'labels' => 'viewnotice.lbl',
							'title'  => 'viewnotice'
							),	
				15=> array (
							'action' => 'library.inc',
							'view'   => 'opec.tpl',
							'labels' => 'notice.lbl',
							'title'  => 'Notice'
							),
				16=> array (
							'action' => 'viewstaff.inc',
							'view'   => 'viewstaff.tpl',
							'labels' => 'viewstaff.lbl',
							'title'  => 'Staff Details'
							),	
				17=> array (
							'action' => 'examination1.inc',
							'view'   => 'examination1.tpl',
							'labels' => 'examination1.lbl',
							'title'  => 'Examinations'
						   ),
				18=> array (
							'action' => 'staff_knowledge_base.inc',
							'view'   => 'staff_knowledge_base.tpl',
							'labels' => 'staff_knowledge_base.lbl',
							'title'  => 'Staff knowledge base'
							),	
				19=> array (
							'action' => 'staff_attendance.inc',
							'view'   => 'staff_attendance.tpl',
							'labels' => 'staff_attendance.lbl',
							'title'  => 'Staff Attendance'
						   ),
				20=> array (
							'action' => 'viewsalary.inc',
							'view'   => 'viewsalary.tpl',
							'labels' => 'viewsalary.lbl',
							'title'  => 'Salary'
						   ),	
				21=> array (
							'action' => 'addassignment.inc',
							'view'   => 'addaissignment.tpl',
							'labels' => 'addassignment.lbl',
							'title'  => 'Assignment'
						   ),
				22=> array (
							'action' => 'viewassignment.inc',
							'view'   => 'viewassignment.tpl',
							'labels' => 'assignment.lbl',
							'title'  => 'Assignment'
						   ),
			    23=> array (
							'action' => 'stafftimetable.inc',
							'view'   => 'stafftimetable.tpl',
							'labels' => 'stafftimetable.lbl',
							'title'  => 'Time Table'
						   ),	
				 24=> array (
							'action' => 'leave.inc',
							'view'   => 'leave.tpl',
							'labels' => 'leave.lbl',
							'title'  => 'Leave'
						   ),
			 /*?>25=> array (
							'action'  => 'resignation.inc',
							'view'	  => 'resignation.tpl',
							'lablels' => 'resignation.lbl',
						    'title'	  => 'Resignation'
							),<?php */
				26=> array (
							'action' => 'viewassignment1.inc',
							'view'   => 'viewassignment1.tpl',
							'labels' => 'viewassignment1.lbl',
							'title'  => 'View Assignment'
				            ),	
				27=> array (
							'action' => 'sendmail.inc',
							'view'   => 'sendmail.tpl',
							'labels' => 'sendmail.lbl',
							'title'  => 'INTERNAL MESSAGING SYSTEM'
				            ),
				28=> array (
							'action' => 'staffsendmail.inc',
							'view'   => 'staffsendmail.tpl',
							'labels' => 'staffsendmail.lbl',
							'title'  => 'INTERNAL MESSAGING SYSTEM'
				            ),
				29=> array (
							'action' => 'holidays.inc',
							'view'   => 'holidays.tpl',
							'labels' => 'holidays.lbl',
							'title'  => 'Holidays'
				            ),
				30=> array (
							'action' => 'sendnotices.inc',
							'view'   => 'sendnotices.tpl',
							'labels' => 'sendnotices.lbl',
							'title'  => 'Notice Management'
				            ),
				31=> array (
							'action' => 'staffsendnotices.inc',
							'view'   => 'staffsendnotices.tpl',
							'labels' => 'staffsendnotices.lbl',
							'title'  => 'Notice Management'
				            ),
				32=> array (
							'action' => 'videogalleries.inc',
							'view'   => 'videogalleries.tpl',
							'labels' => 'videogalleries.lbl',
							'title'  => 'Video Gallery'
				            ),
				33=> array (
							'action' => 'notice.inc',
							'view'   => 'notice.tpl',
							'labels' => 'notice.lbl',
							'title'  => 'Notice Board'
				            ),
				34=> array (
							'action' => 'tutorials.inc',
							'view'   => 'tutorials.tpl',
							'labels' => 'tutorials.lbl',
							'title'  => 'Tutorials'
				            ),
				35=> array (
							'action' => 'booklets.inc',
							'view'   => 'booklets.tpl',
							'labels' => 'booklets.lbl',
							'title'  => 'Booklets'
				            ),
				36=> array (
							'action' => 'staff_tutorials.inc',
							'view'   => 'staff_tutorials.tpl',
							'labels' => 'staff_tutorials.lbl',
							'title'  => 'Tutorials'
				            ),
				37=> array (
							'action' => 'staff_booklets.inc',
							'view'   => 'staff_booklets.tpl',
							'labels' => 'staff_booklets.lbl',
							'title'  => 'Booklets'
				            ),
				38=> array (
							'action' => 'ajaxdropdowns.inc',
							'view'   => 'ajaxdropdowns.tpl',
							'labels' => 'ajaxdropdowns.lbl',
							'title'  => 'Ajax'
							),
				39=> array (
							'action' => 'staffquestions.inc',
							'view'   => 'staffquestions.tpl',
							'labels' => 'staffquestions.lbl',
							'title'  => 'Question Bank Management'
							),
							
				40=> array (
							'action' => 'studentquestions.inc',
							'view'   => 'studentquestions.tpl',
							'labels' => 'studentquestions.lbl',
							'title'  => 'Question Bank'
							),	
				41=> array (
							'action' => 'photogalleries.inc',
							'view'   => 'photogalleries.tpl',
							'labels' => 'photogalleries.lbl',
							'title'  => 'Galleries Bank'
							),
				42=> array (
							'action' => 'trans_myrouteboard.inc',
							'view'   => 'trans_myrouteboard.tpl',
							'labels' => 'trans_myrouteboard.lbl',
							'title'  => 'My Route/Board Details'
							),
				43=> array (
							'action' => 'trans_allrouteboard.inc',
							'view'   => 'trans_allrouteboard.tpl',
							'labels' => 'trans_allrouteboard.lbl',
							'title'  => 'All Route/Board Details'
							),
				44=> array (
							'action' => 'library.inc',
							'view'   => 'library.tpl',
							'labels' => 'notice.lbl',
							'title'  => 'Library'
							),
				45=> array (
							'action' => 'timetable_staff.inc',
							'view'   => 'timetable_staff.tpl',
							'labels' => 'timetable_staff.lbl',
							'title'  => 'Staff Wise Timetable'
							),
				46=> array (
							'action' => 'trans_myrouteboard_staff.inc',
							'view'   => 'trans_myrouteboard_staff.tpl',
							'labels' => 'trans_myrouteboard_staff.lbl',
							'title'  => 'Staff Wise Timetable'
							),
				47=> array (
							'action' => 'hostel.inc',
							'view'   => 'hostel.tpl',
							'labels' => 'hostel.lbl',
							'title'  => 'Hostel Management'
							),
				48=> array (
							'action' => 'hostel_staff.inc',
							'view'   => 'hostel_staff.tpl',
							'labels' => 'hostel_staff.lbl',
							'title'  => 'Hostel Management'
							),
				49=> array (
							'action' => 'addon.inc',
							'view'   => 'addon.tpl',
							'labels' => 'addon.lbl',
							'title'  => 'Addon Management'
							),
				50=> array (
						'action' => 'examination_new.inc',
						'view'   => 'examination_new.tpl',
						'labels' => 'examination.lbl',
						'title'  => 'Examinations'
					   ),
				51=> array (
							'action' => 'timetablestaff.inc',
							'view'   => 'timetablestaff.tpl',
							'labels' => 'timetablestaff.lbl',
							'title'  => 'Staff Wise Timetable'
							),				
							
				52=> array (
							'action' => 'timetablenew.inc',
							'view'   => 'timetablenew.tpl',
							'labels' => 'newtimetable.lbl',
							'title'  => 'Timetable'
							),
				53=> array (
							'action' => 'examination.inc',
							'view'   => 'examination.tpl',
							'labels' => 'examination.lbl',
							'title'  => 'Examinations'
						   ),
				 54=> array (
						'action' => 'timetablestaff2.inc',
						'view'   => 'timetablestaff2.tpl',
						'labels' => 'timetablestaff2.lbl',
						'title'  => 'Staff Wise Timetable'
						),
						
					55=> array (
							'action' => 'attendance_new.inc',
							'view'   => 'attendance_new.tpl',
							'labels' => 'attendance_new.lbl',
							'title'  => 'Attendance'
							),
					56=> array (
							'action' => 'staffattendance.inc',
							'view'   => 'staffattendance.tpl',
							'labels' => 'staffattendance.lbl',
							'title'  => 'Staff Attendance'
						   ),
					57=> array (
							'action' => 'exam.inc',
							'view'   => 'exam.tpl',
							'labels' => 'exam.lbl',
							'title'  => 'Examinations'
						   ),
					58=> array (
							'action' => 'exam.inc',
							'view'   => 'exam.tpl',
							'labels' => 'exam.lbl',
							'title'  => 'Examinations'
						   ),
					
														   							   
						);

	// include javascripts here
	$arr_scripts = array ('prototype.js', 'validator.js', 'datetimepicker.js', 'profile.js', 'datepickercontrol.js', 'DateTime.js', 'common.js');
	$arr_css = array ('blue.css', 'pink.css', 'violet.css', 'green.css', 'orange.css', 'red.css');
	// set default process
	if (!isset($pid) || $pid >= count($arr_pages)) {
		$pid = 1;
	}
		// Including inc files ( PHP Coding files )
	if (file_exists(INCLUDES_PATH . DS . $arr_pages[$pid]['action'] . ".php")) {
		include(INCLUDES_PATH . DS . $arr_pages[$pid]['action'] . ".php");
	}
	
	// Including Lables
	if (file_exists(LABELS_PATH. DS . $arr_pages[$pid]['labels'] . ".php")) {
		include(LABELS_PATH . DS . $arr_pages[$pid]['labels'] . ".php");
	}
	

	// set defualt $layout here
	switch ($pid) {
		
	case 0:
		$layout = "default";
		break;

	case 1:
		$layout = "stafflogin";
		break;	
	case 3:
	if($action=='printslip' || $action == 'print_class_report' || $action == 'print_staff_report' || $action =='print_stud_report' || $action == 'print_staffwise_report')
	{
		$layout = "print2";
	}else
	if($action == 'class_report_absent' || $action == 'class_report_absent_date') {
					$layout ="blank";
					}	
	else
	{
	    $layout = "index";
	}
	break;	
	
	case 4:
   	if ($action == 'print_category' || $action=='print_notices_det' || $action=='print_subcat') {
		$layout = "print2";
	}			
    else 
	{
	    $layout ="index";
	}
	break;	
		
	case 10 : 
	
	if($action=='printcompletefeedet' || $action=='print_student_details' || $action=='printpaid_balance' || $action=='print_fine_details'){$layout = "print2";}else
	{
	    $layout = "index";
	}	
	break;	
	
	
	case 12:
			if ($action=="viewassignment"){
				$layout = "blank";
			}elseif($action=='print_assignment')
	{
		$layout = "print2";
	}	else{
				$layout = "index";
			}		
	break;
	case 13:
	if($action=='printtimetable')
	{
		$layout = "print2";
	}	
	else
	{
	    $layout = "index";
	}
	break;	
	case 14:
		$layout = "blank";
		break;	
	case 15:
		$layout = "plain";
		break;	
	 case 17:
   	if ($action == 'mark_print') {
		$layout = "print2";
	}			
    else 
	{
	    $layout ="index";
	}
	break;	
	 case 18:
   	if ($action == 'print_category' || $action=='print_notices_det' || $action=='print_subcat' || $action=='print_search') {
		$layout = "print2";
	}			
    else 
	{
	    $layout ="index";
	}
	break;			
	case 19:
	if($action=='printslip' || $action == 'print_class_report' || $action == 'print_staff_report' || $action =='print_stud_report' || $action == 'print_staffwise_report')
	{
		$layout = "print2";
	}elseif($action == 'class_report_absent' || $action == 'class_report_absent_date' || $action == 'staff_report_absent'  || $action == 'staff_report_absent_date') {
					$layout ="blank";
					}	
	else
	{
	    $layout = "index";
	}
	break;
	case 20:
	if($action=='loanissueslist'){$layout="index_left";}elseif($action=='print_list' || $action=='print_salarylist' || $action=='print_loan'){$layout = "print2";}else{$layout = "index";}
	break;
	
	case 21:
	if($action=='print_assignment')
	{
		$layout = "print2";
	}	
	else
	{
	    $layout = "index";
	}
	break;
	case 23:
	if($action=='printtimetable' || $action=='print_class_timetable')
	{
		$layout = "print2";
	}	
	else
	{
	    $layout = "index";
	}
	break;
	case 24:
	if($action=='printleaveletter')
	{
		$layout = "print2";
	}	
	else
	{
	    $layout = "index";
	}
	break;
	//case 25:	
//	if ($action == 'print_resignation' ) {
//		$layout = "print2";
//	}
//	else
//	{
//	    $layout = "index";
//	}
//	break;
	case 26: $layout = "blank";
			break;	
	case 22:
		$layout = "blank";
		break;
  
	case 27: 
	if ($action=='fullmessage' || $action=="fullmessage_sent" || $action=="print_not_list" || $action=='print_reply_list'){
					$layout = "print2";
				} else 
	{
	    $layout ="index";
	}
		break;	
	case 28: 
	if ($action=='fullmessage' || $action=="fullmessage_sent" || $action=="print_not_list" || $action=='print_reply_list'){
					$layout = "print2";
				} else 
	{
	    $layout ="index";
	}
		break;	
	case 29: 
	if ($action=='print_holidays'){
					$layout = "print2";
				} else 
	{
	    $layout ="index";
	}
		break;
		
		case 30: 
				
	if ( $action=="fullmessage_sent" || $action=="print_not_list" || $action=='print_reply_list'||$action=='fullmessage' ){
					$layout = "print2";
				}
				elseif($action=='sentmails'){$layout="index_left";}
				 else 
	{
	    $layout ="index";
	}
		break;
		case 31: 
	if ($action=='fullmessage' || $action=="fullmessage_sent" || $action=="print_not_list" || $action=='print_reply_list'){
					$layout = "print2";
				} else 
	{
	    $layout ="index_left";
	}
		break;	
		case 33: 
	if ($action=='print_notices' || $action=="print"){
					$layout = "print2";
				} else 
	{
	    $layout ="index";
	}
		break;	
		case 34: 
	if ($action=='print_list' || $action=="print_view"){
					$layout = "print2";
				} else 
	{
	    $layout ="index";
	}
		break;	
		case 35: 
	if ($action=='print_list' || $action=="print_view"){
					$layout = "print2";
				} else 
	{
	    $layout ="index";
	}
		break;
		case 36: 
	if ($action=='print_list' || $action=="print_view"){
					$layout = "print2";
				} else 
	{
	    $layout ="index";
	}
		break;	
		case 37: 
	if ($action=='print_list' || $action=="print_view"){
					$layout = "print2";
				} else 
	{
	    $layout ="index";
	}
		break;
	case 38: 
	    $layout = "none";
		 break;	
		 case 39: 
	if ($action=='print_list' || $action=="print_view"){
					$layout = "print2";
				} else 
	{
	    $layout ="index";
	}
		break;
	case 40:
			if ($action=="viewfeedback"){
				$layout = "blank";
			}elseif ($action=="printresult"){
				$layout = "print2";
			}elseif ($action=="printresult1" || $action=='printresult'){
				$layout = "print2";
			}else{
				$layout = "index";
			}		
	break;	
	  case 41:
 if($action=='print_photo' || $action=='print_album' || $action=='print_photo_single')
	{
		$layout = "print2";
	}	
	else
	{
	    $layout = "index";
	}
	 break;	
	 case 42:
 if($action=='print_tr_bills' || $action=='receipt' || $action=='print_tr_details')
	{
		$layout = "print2";
	}	
	else
	{
	    $layout = "index";
	}
	 break;	
	   case 44:
 if($action=='student_record_print' || $action=='faculty_record_print')
	{
		$layout = "print2";
	}	
	else
	{
	    $layout = "index";
	}
	 break;	
	case 45: 
	if ($action=="timetable")
		 {
			$layout = "index";
		}
		else{
	    $layout = "blank";
		}
		 break;	
		 case 46:
 if($action=='print_tr_bills' || $action=='receipt' || $action=='print_tr_details')
	{
		$layout = "print2";
	}	
	else
	{
	    $layout = "index";
	}
	
	if($action=='mydetails'){$layout="index_left";}
	 break;	
	 case 47:
 if($action=='person_allotment_details' || $action=='receipt' || $action=='print_list')
	{
		$layout = "print2";
	}	
	else
	{
	    $layout = "index";
	}
	 break;	
	  case 48:
 if($action=='person_allotment_details' || $action=='receipt' || $action=='print_list')
	{
		$layout = "print2";
	}	
	else
	{
	    $layout = "index";
	}
	 break;	
		
		case 51: if ($action=='viewtimetable' || $action=='staff_timetable' || $action=='free_staff' || $action=='edit_timetable') $layout = "blank";
		
			break;
		case 52: 
		if ($action=='timetable' || $action=='viewtimetable1' ) $layout = "index";
		if($action=='viewtimetableprint_time_table'){$layout = "print2";}
		
		if ($action=='edittimetable' || $action=='viewtimetable') $layout = "blank";
			break;
		case 53:  $layout = "index";
	if ($action=='createxam' ||$action=='createxamexport'||$action=='marksentry'||$action=='stdmarksentry'||$action=='allstudents'||$action=='allstudentsexport'||$action=='stud_report'||$action=='chatreports'||$action=='chatreports_schoolwise' ||$action=='classwiseviewresult') $layout = "index";
	if ($action == "stud_certificate" || $action == "stdmarksentryprint" || $action == "entermarksprint" || $action=='print_list_allstudents' || $action=='mark_print' ) $layout = "print2";
			break;	
			
	case 54: if ($action=='viewtimetable' || $action=='staff_timetable' || $action=='free_staff' || $action=='edit_timetable') $layout = "blank";
	if ($action=='staff' || $action=='time_table'  ) $layout = "index";
	if ($action=='edittimetable' || $action=='viewtimetable') $layout = "index";
	if ($action == "viewtimetable"  ) $layout = "print2";
	
		break;
			
			case 55: if ($action=='printslip' || $action == 'print_class_report' || $action == 'print_staff_report' || $action =='print_stud_report' || $action == 'print_staffwise_report'  || $action=='class_report_absent_date'){
					$layout = "print2";
				}elseif($action == 'class_report_absent' || $action == 'class_report_absent_date' || $action == 'staff_report_absent'  || $action == 'staff_report_absent_date') {
					$layout ="blank";
					}
					if ($action=='stud_attend' || $action=='stud_report'|| $action=='class_report'  ) $layout = "index";

			break;
			case 56:
			if ($action=='timetable'||$action=='viewtimetable'   ) $layout = "index";
	if($action=='printslip' || $action == 'print_class_report' || $action == 'print_staff_report' || $action =='print_stud_report' || $action == 'print_staffwise_report')
	{
		$layout = "print2";
	}elseif($action == 'class_report_absent' || $action == 'class_report_absent_date' || $action == 'staff_report_absent'  || $action == 'staff_report_absent_date') {
					$layout ="blank";
					}	
	else
	{
	    $layout = "index";
	}
	
	break;
					
		 case 57:
   	if ($action == 'mark_print') {
		$layout = "print2";
	}			
    else 
	{
	    $layout ="index";
	}			
			
			
	default:
		if (!isset($layout) || !file_exists("templates/layouts/" . $layout . ".tpl.php"))
		 {
			$layout = "index";
		}
	}
	
	
	

	//Call templates
	include( TEMPLATES_PATH . DS . 'layouts' . DS . $layout . ".tpl.php");
	
?>
