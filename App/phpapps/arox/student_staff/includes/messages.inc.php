<?php

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
	define("MANDATORY", "Note : * Feilds are Mandatory");


/**
*	Rating information
**/
	define("THANKQFORVOTE","Thank You for Voting");

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
      
      define( "SM_CONFIRM_DELETE_MESSAGE", "Are You Sure To Delete ?" );
	  
	  
	
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
		$sucessmessage[11] = "Sorry! Failed  in Updation !";
		
//  Financial Accounting		 	
		$sucessmessage[5] = "School Details Added Sucessfully"; 
		$sucessmessage[13] = "Voucher Entered Successfully";
		
//   Hostel Module
		$sucessmessage[6] = "Items added sucessfully to the room !";  
		$sucessmessage[7] = "Items added sucessfully to the person !";
	  
// Fee Master
		$sucessmessage[8] = "Groups Added Successfully !";  
		$sucessmessage[9] = "Classes Added Successfully !";
		$sucessmessage[10] = "Particulars created Successfully for corresponding classes";
		$sucessmessage[14] = "Fee Paid Successfully";
		
// Themes 
		$sucessmessage[12] = "Theme Changed Sucessfully";	
		
		$sucessmessage[15] = "Processed Successfully";	
// Examination 
		$sucessmessage[16] = "Marks Entered Successfully";
		
		$sucessmessage[17] = "User Name Already Exists";
		
		$sucessmessage[18] = "Already Exists";
		$sucessmessage[19]   = "Email Sent Successfully";
		$sucessmessage[20]   = "Accepted Successfully";
		$sucessmessage[21]   = "Not Accepted";
		$sucessmessage[22]   = "Attendance Taken";
		$sucessmessage[23]   = "Successfully Imported";
		$sucessmessage[28]   = "Message sent Successfully";
		$sucessmessage[29]  = "Message Deleted Successfully";
		$sucessmessage[70]  = "Warning:Obtained marks must not be greater than the Total Marks";
		define('MOBILE_USERNAME', 'aaa');
		define('MOBILE_PASSWORD', 'aaa');
		define('MOBILE_SENDER_ID', 'EIMS');
		define('CDMA_HEADER', '919949104230');
		

?>
