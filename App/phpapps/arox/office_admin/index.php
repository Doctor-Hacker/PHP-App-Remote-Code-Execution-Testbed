<?php
	ob_start();
	session_start();	
	//Report simple running errors
    //error_reporting(E_ERROR | E_WARNING | E_PARSE);
	// Report all errors except E_NOTICE
	// This is the default value set in php.ini
   //error_reporting(E_ALL ^ E_NOTICE);
	error_reporting(0);
	$path_arr = explode('/', $_SERVER['PHP_SELF']);
	$cur_foldpath =  count($path_arr)-3;
	//This variable is for avoiding the unautherized page access 
	
	
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


// Get the permission list
	//$permissions = $db->getRow("SELECT `admin_permissions` FROM `es_admins` WHERE `es_adminsid`='" . $_SESSION['eschools']['admin_id'] . "'");
	
	
	
	$permissions = $db->getRow("SELECT `admin_permissions` FROM `es_admins` WHERE `es_adminsid`='" . $_SESSION['eschools']['admin_id'] . "'");
	$new_data1=$permissions['admin_permissions'];
	$new_data=explode(",",$new_data1);	
	
	foreach($new_data as $new){
		$admin_permissions[$new]=$new;
	}	
	
	//array_print($admin_permissions);
	//echo count($admin_permissions);
	//echo "hi";
	//exit;	
	
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
							'action' => 'adminlogin.inc',
							'view'   => 'adminlogin.tpl',
							'labels' => 'adminsignup.lbl',
							'title'  => 'Administrator Sign up'
							),
				2=> array (
							'action' => 'enquiry.inc',
							'view'   => 'enquiry.tpl',
							'labels' => 'enquiry.lbl',
							'title'  => 'Enquire page'
							),	
				3=> array (
							'action' => 'admissionlist.inc',
							'view'   => 'admissionlist.tpl',
							'labels' => 'admissionlist.lbl',
							'title'  => 'Admission list page'
							),	
				4=> array (
							'action' => 'addassignment.inc',
							'view'   => 'addaissignment.tpl',
							'labels' => 'addaissignment.lbl',
							'title'  => 'Add assignment page'
							),
                5=> array (
							'action' => 'preadmission.inc',
							'view'   => 'preadmission.tpl',
							'labels' => 'preadmission.lbl',
							'title'  => 'Preadmission page'
							),
							
				6=> array (
							'action' => 'addstaff.inc',
							'view'   => 'addstaff.tpl',
							'labels' => 'addstaff.lbl',
							'title'  => 'Add Staff page'
				             ),	
				7=> array (
							'action' => 'inventory_master.inc',
							'view'   => 'inventory_master.tpl',
							'labels' => 'inventory_master.lbl',
							'title'  => 'Add Inventory'
							),		
				8=> array (
							'action' => 'newenquiry.inc',
							'view'   => 'newenquiry.tpl',
							'labels' => 'newenquiry.lbl',
							'title'  => 'New Registration'
							),							
				9=> array (
							'action' => 'requirement.inc',
							'view'   => 'requirement.tpl',
							'labels' => 'requirement.lbl',
							'title'  => 'Add Requirement'
							),	
				10=> array (
							'action' => 'logout.inc',
							'view'   => 'logout.tpl',
							'labels' => 'logout.lbl',
							'title'  => 'Logout'
							),							
				11=> array (
							'action' => 'transport.inc',
							'view'   => 'transport.tpl',
							'labels' => 'transport.lbl',
							'title'  => 'Transport'
							),
				12=> array (
							'action' => 'viewassignment.inc',
							'view'   => 'viewassignment.tpl',
							'labels' => 'viewassignment.lbl',
							'title'  => 'View assignment'
							),
				13=> array (
							'action' => 'classifieds.inc',
							'view'   => 'classifieds.tpl',
							'labels' => 'classifieds.lbl',
							'title'  => 'Classifieds '
							),						
				14=> array (
							'action' => 'themes.inc',
							'view'   => 'themes.tpl',
							'labels' => 'themes.lbl',
							'title'  => 'Themes'
							),
				15=> array (
							'action' => 'interview.inc',
							'view'   => 'interview.tpl',
							'labels' => 'interview.lbl',
							'title'  => 'Interview'
							),
				16=> array (
							'action' => 'fees.inc',
							'view'   => 'fees.tpl',
							'labels' => 'fees.lbl',
							'title'  => 'Fee Structure'
							),
				17=> array (
							'action' => 'fees_master.inc',
							'view'   => 'fees_master.tpl',
							'labels' => 'fees_master.lbl',
							'title'  => 'Fee Master'
							),
				18=> array (
							'action' => 'test.inc',
							'view'   => 'test.tpl',
							'labels' => 'test.lbl',
							'title'  => 'Testing'
							),
				19=> array (
							'action' => 'hostel.inc',
							'view'   => 'hostel.tpl',
							'labels' => 'hostel.lbl',
							'title'  => 'Hostel'
							),
				20=> array (
							'action' => 'manageclasses.inc',
							'view'   => 'manageclasses.tpl',
							'labels' => 'manageclasses.lbl',
							'title'  => 'Manage Classes'
							),
				21=> array (
							'action' => 'stdent_mst.inc',
							'view'   => 'stdent_mst.tpl',
							'labels' => 'stdent_mst.lbl',
							'title'  => 'Student Master Records'
							),
				22=> array (
							'action' => 'finance_master.inc',
							'view'   => 'finance_master.tpl',
							'labels' => 'finance_master.lbl',
							'title'  => 'School Details'
							),	
				23=> array (
							'action' => 'hrd.inc',
							'view'   => 'hrd.tpl',
							'labels' => 'hrd.lbl',
							'title'  => 'Human Resourcing and development'
							),
				24=> array (
							'action' => 'trans_voucher.inc',
							'view'   => 'trans_voucher.tpl',
							'labels' => 'trans_voucher.lbl',
							'title'  => 'Transaction Voucher Entry'
							),	
				25=> array (
							'action' => 'accountsreport.inc',
							'view'   => 'accountsreport.tpl',
							'labels' => 'accountsreport.lbl',
							'title'  => 'Accounts Report'
							),
				26=> array (
							'action' => 'security.inc',
							'view'   => 'security.tpl',
							'labels' => 'security.lbl',
							'title'  => 'Security'
							),
				27=> array (
							'action' => 'attendance.inc',
							'view'   => 'attendance.tpl',
							'labels' => 'attendance.lbl',
							'title'  => 'Attendance'
							),
				28=> array (
							'action' => 'offerletter.inc',
							'view'   => 'offerletter.tpl',
							'labels' => 'offerletter.lbl',
							'title'  => 'Offer letter'
							),
				29=> array (
							'action' => 'payroll_master.inc',
							'view'   => 'payroll_master.tpl',
							'labels' => 'payroll_master.lbl',
							'title'  => 'Pay Roll Master'
							),
				30=> array (
							'action' => 'knowledge_base.inc',
							'view'   => 'knowledge_base.tpl',
							'labels' => 'knowledge_base.lbl',
							'title'  => 'Knowledge Base'
							),							
				31=> array (
							'action' => 'timetable.inc',
							'view'   => 'timetable.tpl',
							'labels' => 'timetable.lbl',
							'title'  => 'Timetable'
							),	
				32=> array (
							'action' => 'library.inc',
							'view'   => 'library.tpl',
							'labels' => 'library.lbl',
							'title'  => 'Library'
							),								
				33=> array (
							'action' => 'timetablereport.inc',
							'view'   => 'timetablereport.tpl',
							'labels' => 'timetablereport.lbl',
							'title'  => 'Timetable Report'
						   ),	
				34=> array (
							'action' => 'email.inc',
							'view'   => 'email.tpl',
							'labels' => 'email.lbl',
							'title'  => 'Email'
						  ),
				35=> array (
							'action' => 'payroll_employee.inc',
							'view'   => 'payroll_employee.tpl',
							'labels' => 'payroll_employee.lbl',
							'title'  => 'Pay Roll'
						  ),
				36=> array (
							'action' => 'examination.inc',
							'view'   => 'examination.tpl',
							'labels' => 'examination.lbl',
							'title'  => 'Examinations'
						   ),				
				37=> array (
							'action' => 'notice.inc',
							'view'   => 'notice.tpl',
							'labels' => 'notice.lbl',
							'title'  => 'Notice'
							),
			    38=> array (
							'action' => 'library.inc',
							'view'   => 'opec.tpl',
							'labels' => 'notice.lbl',
							'title'  => 'Notice'
							),								
				39=> array (
							'action' => 'viewnotice.inc',
							'view'   => 'viewnotice.tpl',
							'labels' => 'viewnotice.lbl',
							'title'  => 'View notice'
							),
				40=> array (
							'action' => 'feepayment.inc',
							'view'   => 'feepayment.tpl',
							'labels' => 'feepayment.lbl',
							'title'  => 'Fee Payment'
							),
				41=> array (
							'action' => 'changepassword.inc',
							'view'   => 'changepassword.tpl',
							'labels' => 'changepassword.lbl',
							'title'  => 'Change Password'
							),	
				42=> array (
							'action' => 'administration.inc',
							'view'   => 'administration.tpl',
							'labels' => 'administration.lbl',
							'title'  => 'Administration'
							),
				43=> array (
							'action' => 'help.inc',
							'view'   => 'help.tpl',
							'labels' => 'help.lbl',
							'title'  => 'Help'
							),
				44=> array (
							'action' => 'home.inc',
							'view'   => 'home.tpl',
							'labels' => 'home.lbl',
							'title'  => 'Home'
							),
				45=> array (
							'action' => 'managedepartments.inc',
							'view'   => 'managedepartments.tpl',
							'labels' => 'deaptment.lbl',
							'title'  => 'Department'
							),	
				46=> array (
							'action' => 'addnewstaff.inc',
							'view'   => 'addnewstaff.tpl',
							'labels' => 'newstaff.lbl',
							'title'  => 'New staff',
							),
				47=> array (
							'action' => 'manageexams.inc',
							'view'   => 'manageexams.tpl',
							'labels' => 'manageexams.lbl',
							'title'  => 'Manage Exams',
							),
				48=> array (
							'action' => 'backup.inc',
							'view'   => 'backup.tpl',
							'labels' => 'backup.lbl',
							'title'  => 'Backup',
							),	
				49=> array (
							'action' => 'department.inc',
							'view'   => 'department.tpl',
							'labels' => 'department.lbl',
							'title'  => 'Department',
							),
				50=> array (
							'action' => 'sendmail.inc',
							'view'   => 'sendmail.tpl',
							'labels' => 'sendmail.lbl',
							'title'  => 'INTERNAL MESSAGING SYSTEM'
							),	
				51=> array (
							'action' => 'unitsmanagement.inc',
							'view'   => 'unitsmanagement.tpl',
							'labels' => 'unitsmanagement.lbl',
							'title'  => 'Units Management'
							),
				52=> array (
							'action' => 'thoughts.inc',
							'view'   => 'thoughts.tpl',
							'labels' => 'thoughts.lbl',
							'title'  => 'Thoughts Management'
							),
				53=> array (
							'action' => 'helpdesk.inc',
							'view'   => 'helpdesk.tpl',
							'labels' => 'helpdesk.lbl',
							'title'  => 'Help Desk'
							)	,
				54=> array (
							'action' => 'photogalleries.inc',
							'view'   => 'photogalleries.tpl',
							'labels' => 'photogalleries.lbl',
							'title'  => 'Photo Gallery'
							)	,
				55=> array (
							'action' => 'ajaxdropdowns.inc',
							'view'   => 'ajaxdropdowns.tpl',
							'labels' => 'ajaxdropdowns.lbl',
							'title'  => 'Ajax'
							),
				56=> array (
							'action' => 'videogalleries.inc',
							'view'   => 'videogalleries.tpl',
							'labels' => 'videogalleries.lbl',
							'title'  => 'Videos'
							),
				57=> array (
							'action' => 'sendnotices.inc',
							'view'   => 'sendnotices.tpl',
							'labels' => 'sendnotices.lbl',
							'title'  => 'Notice Management'
							),
				58=> array (
							'action' => 'holidays.inc',
							'view'   => 'holidays.tpl',
							'labels' => 'holidays.lbl',
							'title'  => 'Holidays'
							)	,
				59=> array (
							'action' => 'chaptermanagement.inc',
							'view'   => 'chaptermanagement.tpl',
							'labels' => 'chaptermanagement.lbl',
							'title'  => 'Chapter Management'
							),
				60=> array (
							'action' => 'tutorialsmanagement.inc',
							'view'   => 'tutorialsmanagement.tpl',
							'labels' => 'tutorialsmanagement.lbl',
							'title'  => 'Tutorials Management'
							),
				61=> array (
							'action' => 'booklets.inc',
							'view'   => 'booklets.tpl',
							'labels' => 'booklets.lbl',
							'title'  => 'Booklets'
							),
				62=> array (
							'action' => 'sendsms.inc',
							'view'   => 'sendsms.tpl',
							'labels' => 'sendsms.lbl',
							'title'  => 'SMS Management'
							),	
				63=> array (
							'action' => 'questionbank.inc',
							'view'   => 'questionbank.tpl',
							'labels' => 'questionbank.lbl',
							'title'  => 'Question Bank Management'
							),
				64=> array (
							'action' => 'facultyincharge.inc',
							'view'   => 'facultyincharge.tpl',
							'labels' => 'facultyincharge.lbl',
							'title'  => 'Class wise Faculty in-charge'
							),
				65=> array (
							'action' => 'onlinequestionbank.inc',
							'view'   => 'onlinequestionbank.tpl',
							'labels' => 'onlinequestionbank.lbl',
							'title'  => 'Online  Question Bank'
							),
				66=> array (
							'action' => 'batch.inc',
							'view'   => 'batch.tpl',
							'labels' => 'batch.lbl',
							'title'  => 'Batches Management'
							),	
				67=> array (
							'action' => 'manageonlineunits.inc',
							'view'   => 'manageonlineunits.tpl',
							'labels' => 'manageonlineunits.lbl',
							'title'  => 'Units / Category Management'
							),
				68=> array (
							'action' => 'slotbooking.inc',
							'view'   => 'slotbooking.tpl',
							'labels' => 'slotbooking.lbl',
							'title'  => 'Slot Booking Management'
							),
				69=> array (
							'action' => 'onlineexamresult.inc',
							'view'   => 'onlineexamresult.tpl',
							'labels' => 'onlineexamresult.lbl',
							'title'  => 'Online Exam Result'
							),
				70=> array (
							'action' => 'createslot.inc',
							'view'   => 'createslot.tpl',
							'labels' => 'createslot.lbl',
							'title'  => 'Online Slot Creation'
							),
				71=> array (
							'action' => 'emailmanagement.inc',
							'view'   => 'emailmanagement.tpl',
							'labels' => 'emailmanagement.lbl',
							'title'  => 'Email Management'
							),	
				72=> array (
							'action' => 'idcard.inc',
							'view'   => 'idcard.tpl',
							'labels' => 'idcard.lbl',
							'title'  => 'ID Card Generator'
							),
				73=> array (
							'action' => 'issued_idcard.inc',
							'view'   => 'issued_idcard.tpl',
							'labels' => 'issued_idcard.lbl',
							'title'  => 'Issued ID Card'
							),
				74=> array (
							'action' => 'backoffice.inc',
							'view'   => 'backoffice.tpl',
							'labels' => 'backoffice.lbl',
							'title'  => 'Back Office'
							),
				75=> array (
							'action' => 'trans_route.inc',
							'view'   => 'trans_route.tpl',
							'labels' => 'trans_route.lbl',
							'title'  => 'Routes'
							),		
				76=> array (
							'action' => 'trans_board.inc',
							'view'   => 'trans_board.tpl',
							'labels' => 'trans_board.lbl',
							'title'  => 'Board'
							),
				77=> array (
							'action' => 'trans_vehicle.inc',
							'view'   => 'trans_vehicle.tpl',
							'labels' => 'trans_vehicle.lbl',
							'title'  => 'Vehicle'
							),
				78=> array (
							'action' => 'trans_vehiclefees.inc',
							'view'   => 'trans_vehiclefees.tpl',
							'labels' => 'trans_vehiclefees.lbl',
							'title'  => 'Vehicle Fees'
							),
				79=> array (
							'action' => 'fine_management.inc',
							'view'   => 'fine_management.tpl',
							'labels' => 'fine_management.lbl',
							'title'  => 'Fine Management'
							),
				80=> array (
							'action' => 'trans_allotevehicle.inc',
							'view'   => 'trans_allotevehicle.tpl',
							'labels' => 'trans_allotevehicle.lbl',
							'title'  => 'Allot Vehicle'
							),
				81=> array (
							'action' => 'trans_driverlist.inc',
							'view'   => 'trans_driverlist.tpl',
							'labels' => 'trans_driverlist.lbl',
							'title'  => 'Driver List'
							),
				82=> array (
							'action' => 'trans_allotedrivertovehicle.inc',
							'view'   => 'trans_allotedrivertovehicle.tpl',
							'labels' => 'trans_allotedrivertovehicle.lbl',
							'title'  => 'Allot driver to vehicle'
							),
				83=> array (
							'action' => 'trans_prepare_transportbill.inc',
							'view'   => 'trans_prepare_transportbill.tpl',
							'labels' => 'trans_prepare_transportbill.lbl',
							'title'  => 'Prepare Transport Bill'
							),
				84=> array (
							'action' => 'trans_view_transportbill.inc',
							'view'   => 'trans_view_transportbill.tpl',
							'labels' => 'trans_view_transportbill.lbl',
							'title'  => 'View Transport Bill'
							),
				85=> array (
							'action' => 'trans_maintenance.inc',
							'view'   => 'trans_maintenance.tpl',
							'labels' => 'trans_maintenance.lbl',
							'title'  => 'Transport Maintenance'
							),
				86=> array (
							'action' => 'trans_driverreport.inc',
							'view'   => 'trans_driverreport.tpl',
							'labels' => 'trans_driverreport.lbl',
							'title'  => 'Driver Report'
							),
				87=> array (
							'action' => 'trans_vehiclereport.inc',
							'view'   => 'trans_vehiclereport.tpl',
							'labels' => 'trans_vehiclereport.lbl',
							'title'  => 'Vehicle Report'
							),
				88=> array (
							'action' => 'trans_studentwisereport.inc',
							'view'   => 'trans_studentwisereport.tpl',
							'labels' => 'trans_studentwisereport.lbl',
							'title'  => 'Student Wise Report'
							),
				89=> array (
							'action' => 'trans_staffwisereport.inc',
							'view'   => 'trans_staffwisereport.tpl',
							'labels' => 'trans_staffwisereport.lbl',
							'title'  => 'Staff Wise Report'
							),
				90=> array (
							'action' => 'timetable_staff.inc',
							'view'   => 'timetable_staff.tpl',
							'labels' => 'timetable_staff.lbl',
							'title'  => 'Staff Wise Timetable'
							),
				91=> array (
							'action' => 'role_management.inc',
							'view'   => 'role_management.tpl',
							'labels' => 'role_management.lbl',
							'title'  => 'Role Management'
							),
				92=> array (
							'action' => 'logout_college.inc',
							'view'   => 'logout_college.tpl',
							'labels' => 'logout_college.lbl',
							'title'  => ''
							),
				93=> array (
							'action' => 'addon.inc',
							'view'   => 'addon.tpl',
							'labels' => 'addon.lbl',
							'title'  => 'Add on Modules'
							),
					94=> array (
							'action' => 'cast.inc',
							'view'   => 'cast.tpl',
							'labels' => 'cast.lbl',
							'title'  => 'Manage Cast'
							),
				95=> array (
							'action' => 'charcertificate.inc',
							'view'   => 'charcertificate.tpl',
							'labels' => 'certificatemanagement.lbl',
							'title'  => 'Character Certificate'
							),
				96=> array (
							'action' => 'assign_section.inc',
							'view'   => 'assign_section.tpl',
							'labels' => 'assign_section.lbl',
							'title'  => 'Assign Section'
							),
				97=> array (
							'action' => 'sections_add.inc',
							'view'   => 'sections_add.tpl',
							'labels' => 'sections_add.lbl',
							'title'  => 'Sections Add'
							),
				98=> array (
							'action' => 'studenttransfer.inc',
							'view'   => 'studenttransfer.tpl',
							'labels' => 'studenttransfer.lbl',
							'title'  => 'Transfer Certificate'
							),
				99=> array (
							'action' => 'stationary.inc',
							'view'   => 'stationary.tpl',
							'labels' => 'stationary.lbl',
							'title'  => 'Stationary'
							),
				100=> array (
							'action' => 'ranks.inc',
							'view'   => 'ranks.tpl',
							'labels' => 'ranks.lbl',
							'title'  => 'Ranks'
							),
			101=> array (
							'action' => 'invoice.inc',
							'view'   => 'invoice.tpl',
							'labels' => 'invoice.lbl',
							'title'  => 'Invoice'
							),
			102=> array (
							'action' => 'exam_ranks.inc',
							'view'   => 'exam_ranks.tpl',
							'labels' => 'exam_ranks.lbl',
							'title'  => 'ExamRanks'
							),
			103=> array (
							'action' => 'saled_stationary.inc',
							'view'   => 'saled_stationary.tpl',
							'labels' => 'saled_stationary.lbl',
							'title'  => 'Saled Stationary'
							),
			104=> array (
							'action' => 'newtimetable.inc',
							'view'   => 'newtimetable.tpl',
							'labels' => 'newtimetable.lbl',
							'title'  => 'Timetable'
							),
			105=> array (
							'action' => 'manage_examfee.inc',
							'view'   => 'manage_examfee.tpl',
							'labels' => 'newtimetable.lbl',
							'title'  => 'Manage Exam fee'
							),
			106=> array (
							'action' => 'timetablenew.inc',
							'view'   => 'timetablenew.tpl',
							'labels' => 'newtimetable.lbl',
							'title'  => 'Timetable'
							),
			107=> array (
							'action' => 'fee_details.inc',
							'view'   => 'fee_details.tpl',
							'labels' => 'fee_details.lbl',
							'title'  => 'fee_details'
							),	
			108=> array (
							'action' => 'pre_viewstudent.inc',
							'view'   => 'pre_viewstudent.tpl',
							'labels' => 'pre_viewstudent.lbl',
							'title'  => 'pre_viewstudent'
							),											
								
			109=> array (
							'action' => 'pre_viewattend.inc',
							'view'   => 'pre_viewattend.tpl',
							'labels' => 'pre_viewattend.lbl',
							'title'  => 'pre_viewattend'
							),
			110=> array (
							'action' => 'pre_viewfees.inc',
							'view'   => 'pre_viewfees.tpl',
							'labels' => 'pre_viewfees.lbl',
							'title'  => 'pre_viewfees'
							),
			111=> array (
							'action' => 'pre_viewmarks.inc',
							'view'   => 'pre_viewmarks.tpl',
							'labels' => 'pre_viewmarks.lbl',
							'title'  => 'pre_viewmarks'
							),
			112=> array (
							'action' => 'pre_viewstatus.inc',
							'view'   => 'pre_viewstatus.tpl',
							'labels' => 'pre_viewstatus.lbl',
							'title'  => 'pre_viewstatus'
							),
			113=> array (
							'action' => 'pre_editstudent.inc',
							'view'   => 'pre_editstudent.tpl',
							'labels' => 'pre_editstudent.lbl',
							'title'  => 'pre_editstudent'
							),	
			114=> array (
							'action' => 'pre_payfee.inc',
							'view'   => 'pre_payfee.tpl',
							'labels' => 'pre_payfee.lbl',
							'title'  => 'pre_payfee'
							),	
			115=> array (
							'action' => 'pre_feecard.inc',
							'view'   => 'pre_feecard.tpl',
							'labels' => 'pre_feecard.lbl',
							'title'  => 'pre_feecard'
							),
			116=> array (
							'action' => 'exp_letter.inc',
							'view'   => 'exp_letter.tpl',
							'labels' => 'exp_letter.lbl',
							'title'  => 'Experience Certificate'
							),
			117=> array (
							'action' => 'bonafied_letter.inc',
							'view'   => 'bonafied_letter.tpl',
							'labels' => 'bonafied_letter.lbl',
							'title'  => 'Bonafied Certificate'
							),
			118=> array (
							'action' => 'loan_letter.inc',
							'view'   => 'loan_letter.tpl',
							'labels' => 'loan_letter.lbl',
							'title'  => 'loan Certificate'
							),
			119=> array (
							'action' => 'incometax_letter.inc',
							'view'   => 'incometax_letter.tpl',
							'labels' => 'incometax_letter.lbl',
							'title'  => 'Incometax Certificate'
							),
			120=> array (
							'action' => 'bonafied_bank.inc',
							'view'   => 'bonafied_bank.tpl',
							'labels' => 'bonafied_bank.lbl',
							'title'  => 'bonafiedbank Certificate'
							),
			121=> array (
							'action' => 'castcategory.inc',
							'view'   => 'castcategory.tpl',
							'labels' => 'castcategory.lbl',
							'title'  => 'Manage Cast Category'
							),
			122=> array (
							'action' => 'committee.inc',
							'view'   => 'committee.tpl',
							'labels' => 'committee.lbl',
							'title'  => 'Association Executive Committee'
							),	
			123=> array (
							'action' => 'schoolcommittee.inc',
							'view'   => 'schoolcommittee.tpl',
							'labels' => 'schoolcommittee.lbl',
							'title'  => 'School Committee'
							),	
			124=> array (
							'action' => 'editcommittee.inc',
							'view'   => 'editcommittee.tpl',
							'labels' => 'editcommittee.lbl',
							'title'  => 'Edit Committee'
							),	
			125=> array (
							'action' => 'editschoolcommittee.inc',
							'view'   => 'editschoolcommittee.tpl',
							'labels' => 'editschoolcommittee.lbl',
							'title'  => 'Edit School Committee'
							),	
			126=> array (
							'action' => 'academiccouncil.inc',
							'view'   => 'academiccouncil.tpl',
							'labels' => 'academiccouncil.lbl',
							'title'  => 'Academic Council'
							),	
			127=> array (
							'action' => 'editacademiccouncil.inc',
							'view'   => 'editacademiccouncil.tpl',
							'labels' => 'editacademiccouncil.lbl',
							'title'  => 'Edit Academic Council'
							),												

			128=> array (
							'action' => 'meeting.inc',
							'view'   => 'meeting.tpl',
							'labels' => 'meeting.lbl',
							'title'  => 'Meeting'
							),	
			129=> array (
							'action' => 'editmeeting.inc',
							'view'   => 'editmeeting.tpl',
							'labels' => 'editmeeting.lbl',
							'title'  => 'Edit Meeting'
							),													
		     130=> array (
							'action' => 'planningyear.inc',
							'view'   => 'planningyear.tpl',
							'labels' => 'planningyear.lbl',
							'title'  => 'Planning Year'
							),	
			131=> array (
							'action' => 'editplanningyear.inc',
							'view'   => 'editplanningyear.tpl',
							'labels' => 'editplanningyear.lbl',
							'title'  => 'Edit Planning Year'
							),		
			132=> array (
							'action' => 'inventorybook_master.inc',
							'view'   => 'inventorybook_master.tpl',
							'labels' => 'inventorybook_master.lbl',
							'title'  => 'Inventory Books'
							),
			133=> array (
							'action' => 'pre_viewstaff.inc',
							'view'   => 'pre_viewstaff.tpl',
							'labels' => 'pre_viewstaff.lbl',
							'title'  => 'pre_viewstaff'
							),		
		    134=> array (
							'action' => 'class-report1.inc',
							'view'   => 'class-report1.tpl',
							'labels' => 'class-report1.lbl',
							'title'  => 'class-report1'
							),		
		    									
																				
						);    

	// include javascripts here
	$arr_scripts = array ('prototype.js', 'validator.js', 'datetimepicker.js', 'profile.js', 'datepickercontrol.js','DateTime.js','tiny_mce.js');
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
	
		case 0: $layout = "default";
			break;
		
		case 1: $layout = "adminlogin";
			break;
			
		case 2: if ($action=='printenquirylist' || $action=='print_enquiry'  ) $layout = "print2";
		break;
		
		case 3:	if ($action=='printlist' || $action=='printlist_enquiry' || $action=='print_cast_list' || $action=='print_age_wise' ) $layout = "print2";
		if ($action=='cast_list' || $action=='age_wise' ) $layout = "index_left";
			break;
			case 4:	if ($action=='print_assignment') $layout = "print2";
				if($action=='view' )$layout = "index_left";
			break;	
		case 5: $layout = "index_left";
		break;	
			

		
		case 7: if ($action == "print_purchase_orders" || $action == "inv_category_print" || $action == "item_print"  || $action == "supplier_print" || $action=='inventory_print' || $action=='print_purchase_goodsreceipt') $layout = "print2";
		
		elseif($action == "inventory_reports" || $action=='purchase_goodsreceipt' || $action =='stock_details' || $action =='add_order')
		{
		$layout = "index_left";
		}
		
			break;
			
		case 11: if ($action == 'trans_main_print' || $action == 'trans_report_print'  || $action == 'transport_print' || $action == 'trans_print'){
					$layout = "print2";
				}
		break;	

			
		case 12: $layout = "blank";
			break;
		
		
		case 15: if ($action == "addtostaff" || $action == "editstaff" || $action == "staffviewing") $layout = "index_left";
		if($action=='print_staff' || $action=='print_list'){$layout = "print2";}
			break;
			
		case 17: if ($action == "print_fees" || $action == "print_fees_class") $layout = "print2";
			break;
			
		case 19: if ($action == 'printreport' || $action == 'printviewrecord' || $action == 'receipt' || $action=='view_item_details' || $action=='person_allotment_details'|| $action=='print_hostel_persons') $layout = "print2";
		if($action=='student_roomallotment' || $action=='viewdetails' || $action=='view_persons')$layout = "index_left";
		break;	
			
			
			case 21: if ($action == 'printsearchclass')	$layout = "print2";
			if($action == 'printstudent' ) $layout="print6";
		break;	
		
		case 22: if	($action == 'printledger') $layout = "print2";
		break;	
		case 23: if ($action == 'print_offer' || $action == 'print_offerletter' || $action == 'printtctostudent' || $action == 'printtctostaff'  || 
		$action == 'printofferletter' || $action == 'printletterformat123' || $action == 'printledger' || $action=="printotherletterformats" || $action=='print_applicants' || $action=='print_takeinterview_list' || $action=='print_list_offerletter' || $action=='print_list_tcissued_student' || $action=='print_list_staff_terminated'|| $action=='expe' ) $layout = "print2";
		
				if ($action == "printing") $layout = "blank1";
				if ($action=="applicant_enquiries" || $action=="editcandidate"|| $action=="issuetcstaff"|| $action=="otherlettergeneration") $layout= "index_left";
				
			break;
		case 24: 				if ($action == "print_vouchers_list")
								$layout = "print2";
								else
								$layout = "index_left";
		break;	
			case 25: if ($action=='print_balancesheet'||$action=='print_ledger') $layout = "print2";
				if($action=='ledger'){$layout = "index_left";
}
			break;
		
		case 26: if ($action=='securitySlip' || $action == 'printpass' || $action=="allsecurity" ) $layout = "print2";
		         if ($action=='vehicle' || $action=="edit_vehicle"|| $action=="report") $layout = "index_left";
			break;
			
		case 27: if ($action=='printslip' || $action == 'print_class_report' || $action == 'print_staff_report' || $action =='print_stud_report' || $action == 'print_staffwise_report' || $action == 'print_descriptive_notes'){
					$layout = "print2";
				}elseif($action == 'class_report_absent' || $action == 'class_report_absent_date' || $action == 'staff_report_absent'  || $action == 'staff_report_absent_date') {
					$layout ="blank";
					}
					 if ($action=='staff_attend' || $action=="edit_staff_attendence") $layout = "index_left";
					
			break;
		
		case 28: $layout = "blank1";
			break;
	    case 30:
			if ($action == 'print_category' || $action=='print_notices_det' || $action=='print_subcat' || $action=='print_search') {
				$layout = "print2";
			}	
		break;
		case 31: if ($action=='edittimetable' || $action=='viewtimetable') $layout = "blank";
			break;
			
		case 32:
			
		 if ($action == "bookdetails_print" || $action == 'student_record_print' || $action == 'book_analysis_print' || $action == 'printlstudent' || $action == 'plstaff' || $action=='faculty_record_print' || $action=='receipt_lib' || $action=='allpayprints' || $action=='print_list_category' || $action=='print_list_subcategory' || $action=='print_list_publishers' || $action=='print_list_booksavailable' || $action=='print_list_books_avialability' || $action=='print_list_books_issuedstudent' || $action=='print_list_books_issuefaculty') {$layout = "print2";}
				
		
		if($action=='viewreserved_details'){
		$layout = "blank";
		}
		if($action=='studentrecard1' || $action=='facultyrecard1' || $action=='bookissueforstudent1' || $action=='bookissueforstaff1' || $action=='bookissueforstaff' || $action=='bookissueforstudent' || $action=='issueandreturn'|| $action=='finepayments'){
		$layout = "index_left";
		}
					
				
			break;
			
			
			case 35: if ($action=='printpayslip' || $action=='print_pslip_list' || $action=='print_loan_list' || $action=='print_loan_details') $layout = "print2";
			if($action=="loanissueslist" || $action=="paysliplist"|| $action=='viewloanpayment'|| $action=='employeewisepayslip'){
				$layout = "index_left";
				}
		break;
		
		
		case 36: if ($action == "stud_certificate" || $action == "stdmarksentryprint" || $action == "entermarksprint" || $action=='print_list_allstudents') $layout = "print2";
		if($action=="createxam_next" || $action=="allstudents"  ){
				$layout = "index_left";
				}
		
			break;
			case 37: 
			if($action=="noticeboard" || $action=="addnotice"|| $action=="editnotice"     ){
				$layout = "index_left";
				
				}
			
	      if ($action=='print_notices' || $action=="print"){
					$layout = "print2";
				} 
			break;	
			
		case 38: $layout = "plain";
			break;
			
		case 39: $layout = "blank";
			break;
			
		case 40: if ($action=='printrepot' || $action =='feepaidlistreport' || $action =='outstandingfeesreport'||$action=="printcompletefeedet" || $action == 'print_categorywisefee' || $action =='classwisepayment_listprint' || $action=="fee_paid_listprint" || $action=='print_list' || $action=='print_each_outstanding'||$action=='print_each_receipt'|| $action=='print_all_receipts' || $action=='print_fee_card'  || $action=='print_classwise_fee_card'  || $action=='receiptpayment' || $action=='ad_classwise_fee_card_print'){
					$layout = "print2";
				}
				if( $action=='print_each_receipt2')
				{$layout = "print8";}
				if($action=="classwisepayment_list" || $action=="fee_paid_list"|| $action=='payfee' || $action=='fee_card'||$action=='classwise_fee_card'){
				$layout = "index_left";
				}
				
		break;
		case 42: if($action=='print_adminlist'){$layout = "print2";}else{$layout = "index_left";}
			break;	
			case 44: if($action=='birthday_students'){$layout = "print2";}
			
		//$arr_pages [44]['title']='Birthday';
		$arr_pages [44]['title']='Home';
			break;	
		case 46: $layout = "index_left";
			break;
			
		
		case 50: if ($action=='fullmessage' || $action=="fullmessage_sent"  || $action=="print_not_list" || $action=='print_reply_list'){
					$layout = "print2";
				}
		break;	
		case 51: if ($action=='print_list'){
					$layout = "print2";
				}
		break;
		case 52: if ($action=='print_list'){
					$layout = "print2";
				}
		break;	
		
		case 53:
		if ($action=='view' ) $layout = "index_left";
					
			break;
			
			
		case 54:
		 if($action=='print_photo' || $action=='print_album' || $action=='print_photo_single')
			{
				$layout = "print2";
			}	
	    break;
		case 55: $layout = "none";
			break;
		case 57: if ($action=='fullmessage' || $action=="fullmessage_sent"  || $action=="print_not_list" || $action=='print_reply_list'){
					$layout = "print2";
				}
		break;	
		case 58: 
	if ($action=='print_holidays'){
					$layout = "print2";
				} 
		break;
		case 59: if ($action=='print_list'){
					$layout = "print2";
				}
		break;
		case 60: if ($action=='print_list' || $action=='print_view'){
					$layout = "print2";
				}
		break;
		case 61: if ($action=='print_list' || $action=='print_view'){
					$layout = "print2";
				}
		break;
		case 63: if ($action=='print_list' || $action=='print_view'){
					$layout = "print2";
				}
		break;
		case 64: if ($action=='print_list'){
					$layout = "print2";
				}
		break;
		
			
		case 72:if($action=="print_staff_hid" || $action=="print_staff_vid" || $action=="print_student_hid" || $action=="print_student_vid"){
				$layout = "blank";
				}			
		break;
		
		
		case 74:if ($action=='print_list_groupname'){
					$layout = "print2";
				}
		if($action=="manageletters" ){
				$layout = "index_left";
				}			
		break;
		case 75:if($action=="print_routelist" ||$action=="print_routelist1"  ){
				$layout = "print2";
				}			
		break;	
		case 76:if($action=="print_boardlist" ){
				$layout = "print2";
				}			
		break;
		case 77:if($action=="print_vechilelist" ){
				$layout = "print2";
				}			
		break;
		
		
		case 79: if($action=="view_list" || $action=='view_oldbalances' ){
					$layout = "index_left";
					
					}	
		if ($action == 'receipt' || $action=='print_student_details'  || $action=='print_list' || $action=='print_oldbalancelist' || $action=='print_view_old_det' || $action=='receipt_oldbal'  || $action=='receiptpayment') $layout = "print2";
		//if($action=='pay_oldbalance' || $action=='success'){$layout = "blank";}
		break;	
		
		case 80:if($action=="print_board_vechle" ){
				$layout = "print2";
				}			
		break;	
		case 81:if($action=="print_driverlist" ){
				$layout = "print2";
				}			
		break;	
		case 82:if($action=="print_driver_vechle" ){
				$layout = "print2";
				}			
		break;	
		case 84:if($action=="print_tr_bills" || $action=='receipt' || $action=='receiptpayment' ){
				$layout = "print2";
				}if($action=='viewtransportbill'){$layout = "index_left";}			
		break;	
		case 85:if($action=="print_maintain_details" || $action=='print_viewmaintenance' ){
				$layout = "print2";
				}			
		break;	
		
		case 86:if($action=="driverreport"){
				$layout = "index_left";
				}				
		break;
		
		case 87:if($action=="vehiclereport"){
				$layout = "index_left";
				}			
		break;
		
		case 88:if($action=="studentreport" || $action=="driver_copy"){
				$layout = "index_left";
				}
				else if($action=='print_student_wise') { 
				$layout = "print2";
				}
				else if($action == 'print_driver_report'){
				$layout = "print2";
				}
							
		break;
		
		case 89:if($action=="staffreport"){
				$layout = "index_left";
				}			
		break;
		
		case 90: if ($action=='viewtimetable' || $action=='staff_timetable' || $action=='free_staff' || $action=='edit_timetable') $layout = "blank";
		
			break;
			
		case 91:
				$layout = "index_left";
						
		break;
		case 94:	if ($action=='display_sub') $layout = "print2";
			break;
	    case 95:	if ($action=='print_charactercertificate' || $action=='print_attemptcertificate' || $action=='print_feesnotice' || $action=='print_udertaking' || $action=='print_holidaynoti' || $action=='print_eligibilitycerti' || $action=='print_studentabsentnoti') $layout = "print4";
			break;
			case 96:	if ($action=='print_sectionwise') $layout = "print2";
			break;
	  case 98:	if ($action=='print_transfercertificate') $layout = "print5";
			break;
	  case 99:	if ($action=='inventory_reports') $layout = "index_left";
			break;
			
	case 117:	if ($action=='print_bonafiedcertificate' || $action=='print_year_list') $layout = "print4";

			break;	
	case 116:	if ($action=='print_expcertificate' || $action=='print_year_list') $layout = "print4";

			break;				
			case 100: if($action=='print')
						{
						$layout = "print2";
						}
						else
						{
						$layout = "index_left";
						}
						break;
case 101: if($action=='print')
			{
						$layout = "print2";
						}
						elseif($action==''){$layout = "index_left";}
						break;
						case 102: 
						$layout = "index_left";
						if($action=='print')
			{
						$layout = "print2";
						}
						
						break;
		case 103:if($action=='receipt'){
				$layout = "print2";
				}
				else if($action == 'print_tr_bills'){ 
				$layout = "print2";
				}
				else if($action == 'print_invoice_details'){
				$layout = "print2";
				}
				else if($action =='saled_stationary' || $action =='invoice_details')
				{
				$layout = "index_left";
				}
			break;
			case 104:if($action=='timetable'){
				$layout = "index_left";
				}
				if($action=='print_time_table' || $action=='print_staff'){
				$layout = "print2";
				}
			break;
			case 105: if($action=="view_list" || $action=='view_oldbalances' ){
					$layout = "index_left";
					}	
		if ($action == 'receipt'||$action == 'receiptpayment' || $action=='print_student_details'  || $action=='print_list' || $action=='print_oldbalancelist' || $action=='print_view_old_det' || $action=='receipt_oldbal') $layout = "print2";
		//if($action=='pay_oldbalance' || $action=='success'){$layout = "blank";}
		break;	
		case 106: if ($action=='edittimetable' || $action=='viewtimetable') $layout = "blank";
			break;
		default: $layout = "index";
	}
	
	
/**
* for default layout
*/
	if (!isset($layout)||$layout=="" || !file_exists("templates/layouts/" . $layout . ".tpl.php")) {
		$layout = "index";
	}

/** 
* Call templates 
*/
	include( TEMPLATES_PATH . DS . 'layouts' . DS . $layout . ".tpl.php");
	
?>
