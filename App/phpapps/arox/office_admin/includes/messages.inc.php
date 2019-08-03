<?php
    define("PAGENATE_LIMIT", 20);
	define("INVALID_LOGIN", "Your Username or Password is Invalid.");
	define("LOGOUT_SUCCESS", "You have Logged out Sucsessfully.");
	define("LOGOUT_ERROR", "Unauthorised Access: You have Logged out.");
	define("MESSAGE_SEND_SUCCESS", "Message send succes fully");

/***
*	PASSWORD change messages
*/

	define("CHANGE_PASSOWRD_SUCCESS","Password Changed Successfully.");
	define("CHANGE_PASSOWRD_FAILED","Your Password not Changed.");
	define("CHANGE_PASSOWRD_DB_NOTMATCHED","Your Current Password not matched.");
	define("FORGOT_PASSWORD_SUCESS","Please check your mail, for new password!");
	define("FORGOT_PASSWORD_FAIL","Username doesn't exist,Please enter existing username.");
	define("CHANGE_PWD_LBL", "Password Change");

/***
*	REGISTRATION information
*/

	define("REGISTRATION_SUCCESSFUL","Thank You For Registering With Us.");
	define("EMPLOYEE_REGISTRATION_SUCCESSFUL","Successfully Registered.");
	define("EMPLOYEE_REGISTRATION_FAIL","Sorry Employee Registration fail!!");
	




/***
*	FEILD  existance
*/
	define("USERNAME_EXIST", "Sorry! Username Already Exists.");
	define("EMAIL_USERNAME_EXIST", " Email Already Existed.");
	define("EMAIL_EXIST", "Sorry! Email Already Existed.");
	define("USERNAME_EXIST", "Sorry! Username Already Exists.");
    
	define("EMAIL_SENT_SUCCESS", "Username and Password sent Succeefully.");
	define("EMAIL_SENT_FAIL", "Oops!! Username and Password are not sent.");
	define("EMAIL_INVALID", "Invalid  Email Format.");
	
	define("PHONE_INVALID", "Invalid  PhoneNumber Format.");


	define("CATEGORY_INSERT_SUCCESS","Success!! New Category Successfully  Added");
	define("CATEGORY_INSERT_FAIL","Fail!! Ooops Fail New Category Addition");

	define("ITEM_INSERT_SUCCESS","Success!! New Items Successfully  Added");
	define("ITEM_INSERT_FAIL","Fail!! Ooops Fail New Item Addition");
	
/**
* Addons information
*/
define( "ADDON_SUCCESS", "Success!! New Addons Successfully  Added" );
	
	
	

/****
*	Empty FIELDS checking
*/
	define( "CATEGORY_FIELD_EMPTY", "Category field shouldn't empty" );
	define( "ACTIVATE_FLAG_CORPORATE", "Activated Successfully." );
	define( "INACTIVATE_FLAG_CORPORATE", "Inactivated  Successfully." );
	define( "UPDATE", "Updated Successfully.");
	define( "ORDER_FORM_SUCESS", "Ordered Successfully." );
	define( "MAIL_SUCCESS", " Mail sent Successfully." );
	define( "MAIL_FAIL", " Mail sending Failed." );
	define( "DELIVERY_SERVICE_INSERTED", "(Delivery / Service Info) Inserted Successfully." );
	define( "DELIVERY_SERVICE_UPDATE", "(Delivery / Service Info) Updated Successfully." );
	define( "SESSION_EXPITID", "Your Session was expired Please Login Again" );

/*
* Order status
**/
	define( "ORDER_CONFIRMED", "Order Confirmed" );
	define( "ORDER_DENEID", "Order Denied" );
	define( "ORDER_DELIVERED", "Order Delivered" );




/***
*	Notes Mandatory
*/
	define("MANDATORY", "Note : * Fields are Mandatory");



/**
*	Contact persons
*/
	define( "CONTACT_PERSON_ADD_SUCCESS", "Success! Contact Person Added." );
	define( "CONTACT_PERSON_DELETE_SUCCESS", "Success! Contact Person Deleted." );
	define( "CONTACT_PERSON_DELETE_FAIL", "Fail! Contact Person Not Deleted." );
	define( "CONTACT_PERSON_ADD_FAIL", "Oops ! Contact Person not Added." );
	define( "INFORMATION_EDIT_SUCCESS", " SUCCESS. Information edited.  ");

/**
* Profile, Departments & Positions
* Case code information
*/
	define( "ROLE_CODE_UPDATE_FAIL", "Fail in Role Update" );
	define( "ROLE_CODE_SUCCESS", "New Role Successfully Added!!" );
	define( "ROLE_CODE_UPDATE_SUCCESS", "Role Updated Successfully" );
	
	define( "PROFILE_APPLIED_SUCCESS", "Profile Applied Successfully." );
	define( "PROFILE_APPLIED_FAIL", "Oops Fail!!  Profile no applied." );
	define( "DEPARTMENT_CODE_UPDATE_SUCCESS", "Department Successfully Updateed!!" );
	
	define( "PROFILE_CREATION_SUCCESS","Profile Successfully Created" );
	define( "PROFILE_UPDATE_SUCCESS", "Profile Successfully Updated" );
	define( "DELETE_PROFILE_SUCCESS", "Profile Deleted");
	define( "DELETE_PROFILE_FAIL", "Oops fail!! Profile not  Deleted");

	define( "DEPARTMENT_CODE_INSERT_SUCCESS", "New Department Successfully Added!!" );
	
	define( "EXPENSE_CODE_ADD", "Expense Code successfully added!" );
	define( "EXPENSE_CODE_FAIL", "Sorry!! Code Not added!" );
	define( "EXPENSE_CODE_UPDATE", "Expense Code successfully Modified!" );
	define( "EXPENSE_CODE_UPDATE_FAIL", "Fail!! Code not updated!" );
	define( "EXPENSE_CODE_ADD", "Expense Code successfully updated!" );
	define( "EXPENSECODE_DELETE_SUCCESS", "Expense Code successfully deleted!" );


	define( "CORPORATE", "Corporate" );
	define( "RESTAURANT", "Restaurant" );



	$LOGIN_LABEL = array(
						"LOGIN_CORPO"=>"Corporate Login",
						"LOGIN_RESTAU"=>"Restaurant Login" ,
						"LOGIN_ADMIN"=>"Admin Login"
					);

		foreach($LOGIN_LABEL as $key => $val)
		define($key, $val);
		
	
//    Added By Susanta (School Management)
      
      define( "SM_CONFIRM_DELETE_MESSAGE", "Are you sure you want to  Delete ?" );
	  
	  
	
//    Added By Rakesh (School Management) Failure Messages for Admin Login
      
      define( "ADMIN_USER_NAME", "Invalid User Name" );
	  define( "ADMIN_PASSWORD", "Invalid Password" );
	  define( "ADMIN_SCHOOL_ID", "Invalid School Id" );
	  
// Sucess Or Failure Messages

// Common Messages	
		$sucessmessage[1] = "Added Successfully";  
		$sucessmessage[2] = "Updated Successfully";  
		$sucessmessage[3] = "Deleted Successfully";  
		$sucessmessage[4] = "Registered Successfully"; 
		
		
//  Financial Accounting		 	
		$sucessmessage[5] = "School Details Added Successfully"; 
		
		
//   Hostel Module
		$sucessmessage[6] = "Items added Successfully to a room ";  
		$sucessmessage[7] = "Items added Successfully to a person ";
	  
// Fee Master
		$sucessmessage[8] = "Group(s) Added Successfully ";  
		$sucessmessage[9] = "Class Added Successfully";
		$sucessmessage[10] = "Particulars created Successfully for corresponding classes";
		$sucessmessage[11] = "Sorry! Failed in Updation ";
		
		
// Themes 
		$sucessmessage[12] = "Theme Changed Successfully";	
		$sucessmessage[13] = "Voucher Entered Successfully";
		$sucessmessage[14] = "Fee Paid Successfully";
		$sucessmessage[15] = "Processed Successfully";	
// Examination 
		$sucessmessage[16] = "Marks Entered Successfully";
		
		$sucessmessage[17] = "User Name Already Exist";
		$sucessmessage[18]   = "Already Exist";
		$sucessmessage[19]   = "Email Sent Successfully";
		$sucessmessage[20]   = "Accepted Successfully";
		$sucessmessage[21]   = "Not Accepted";
		$sucessmessage[22]   = "Attendance Taken";
		$sucessmessage[23]   = "Successfully Imported";
		$sucessmessage[24]   = "Book issued";
		$sucessmessage[25]   = "Alert! You need to select next Class and next academic to update student record.";
		$sucessmessage[26]   = "Invalid Year Selection";
		$sucessmessage[27]   = "Please Select Fee Category";
		$sucessmessage[28]   = "Message sent Successfully";
		$sucessmessage[29]  = "Message Deleted Successfully";
		$sucessmessage[30]  = "Thought Added Successfully";
		$sucessmessage[31]  = "Thought Updated Successfully";
		$sucessmessage[32]  = "Successfully Updated as Today's Thought";
		$sucessmessage[33]  = "Status Changed Successfully";
		$sucessmessage[34]   = "SMS sent Successfully";
		$sucessmessage[35]   = "Please select at least one candidate";
		$sucessmessage[36]   = "Staff Added Successfully";
		$sucessmessage[37]   = "Alert! Attendance has already been taken for this date";		
		$sucessmessage[38]   = "Alert! Attendance cannot be taken for future date's";
		$sucessmessage[39]   = "Health Record Added Succcessfully";
		$sucessmessage[40]   = "Email Notification Sent Sucessfully"; 
		$sucessmessage[41]   = "Alert! The record has been moved from here. You can view it under Search Applicants Menu"; 
		$sucessmessage[42]   = "Interview Completed Successfully"; 
		$sucessmessage[43]   = "SMS Scheduled Successfully"; 
		$sucessmessage[44]   = "Query Posted Successfully"; 
		$sucessmessage[45]  = "Slot Booked Successfully";
		$sucessmessage[46]  = "No Records Found";
		$sucessmessage[47]  = "In Valid Login";
		$sucessmessage[48]  = "You have reached maximum limit, you cannot add more";
		$sucessmessage[49]  = "Deallocated Successfully";
		$sucessmessage[50]  = "Amount received Successfully";
		$sucessmessage[51]  = "Hostel Bills generated Successfully";
		$sucessmessage[52]  = "Alert! There is no data to prepare Hostel Bills ";
		$sucessmessage[53]  = "Returnable Items Collected Successfully ";
		$sucessmessage[54]  = "Delete Rooms to Delete building";
		$sucessmessage[55]  = "Attendance Updated Successfully";
		$sucessmessage[56]  = "Document deleted Successfully";
		$sucessmessage[57]  = "Image deleted Successfully";
		$sucessmessage[58]  = "!Alert Classes exists in this Group";
		$sucessmessage[59]  = "!Alert Students data or subjects or fee exists in this Class";
		$sucessmessage[60]  = "Book Issued Successfully ";
		$sucessmessage[61]  = "Book Returned Successfully ";
		$sucessmessage[62]  = "Delete All Subcategories First Under It";
		$sucessmessage[63]  = "Delete All Books First Under It";
		$sucessmessage[70]  = "Warning:Obtained marks must not be greater than the Total Marks";
		$sucessmessage[71]   = "Subject Already Entered";
		$sucessmessage[72]  = "Transport Bills generated Successfully";
		$sucessmessage[73]  = "No student availing Transport facility";
		$sucessmessage[74]  = "Warning : Please select atleast one check box";
		$sucessmessage[75]  = "Amount Received Successfully ";
		$sucessmessage[76]  = "Period Durations Added Sucessfully";
		$sucessmessage[77]  = "!Alert Transport can not be delete or edit";
		$sucessmessage[78]  = "!Alert Driver can not be delete or edit";
		$sucessmessage[79]  = "!Alert Please check the staff is free or not";
		$sucessmessage[80]  = "Registered Successfully. Right now you are in Edit mode";
		
			$sucessmessage[81]  = "Warning: Leave type already exist.";
			$sucessmessage[82]  = "Warning: Allowance type already exist.";
		$sucessmessage[83]  = "Warning: Deduction type already exist.";
		$sucessmessage[84]  = "Warning: Tax  type already exist.";
		$sucessmessage[85]  = "Warning: Employee Contribution  already exist.";
				$sucessmessage[86]  = "Offer Letter Sent";
					$sucessmessage[87]  = "Letter Sent Successfully";
		
		$sucessmessage['ordplaced']   = "Order Placed Successfully";
		$sucessmessage['grnrcvd']   = "Goods Received Successfully";
		$sucessmessage['ginsuccess']   = "Goods Issued Successfully";
		$sucessmessage['irnsuccess']   = "Issued Goods Returned Successfully";
		
		/*define('MOBILE_USERNAME', '');
		define('MOBILE_PASSWORD', '');
		define('MOBILE_SENDER_ID', '');
		define('CDMA_HEADER', '');*/
		
		
		function getarrayassoc_sudha($sql_qury){
	
	$rs_qury   = @mysql_query($sql_qury);
 
   if (@mysql_num_rows($rs_qury)>0){
  
   return @mysql_fetch_assoc($rs_qury);
   }
   //echo $sql_qury;
   return null;
}

		$compdetails  = getarrayassoc_sudha("SELECT *FROM `es_finance_master`  ORDER BY `es_finance_masterid` DESC LIMIT 0 , 1");
		
		define('ADMINTESTMAIL', $compdetails['fi_email']);
		
		
?>
