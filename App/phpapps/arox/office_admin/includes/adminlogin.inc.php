<?php
 header("Location:../index.php");


/*sm_registerglobal('pid', 'action','Submit','schoolid', 'username', 'password');

include (INCLUDES_CLASS_PATH . DS . 'class.es_admins.php');*/
//Php Code will come here
/**
 * administrator login class
 */
/*$adminlogin = new es_admins();	

if (isset($_POST['Submit_x']) && isset($_POST['Submit_y']) ){*/
/**
 *validations 
 */

/*	$error	= "";
	$vlc    = new FormValidation();
	
	if (!$vlc->is_alpha_numeric( $username ) ) {
		$error_admin_name  = ADMIN_USER_NAME;
		$error			  .= "username";
	}
	
//validating Password
	
	if (!$vlc->is_alpha_numeric( $password ) ) {
		$error_admin_password  = ADMIN_PASSWORD;
		$error				  .= "password";
	} 

	
	$arr_admin_info = array(					
					array("admin_username", "=", $username), 
					array("admin_password", "=", $password)
			   );
    $admin_info = $adminlogin->GetList($arr_admin_info);
//Setting session variable
	if (is_array( $admin_info) && count( $admin_info) > 0){
		foreach ( $admin_info as $eachadmin) {
			//array_print($eachadmin);
		
			$_SESSION['eschools']['admin_user'] = $eachadmin->admin_username;			
			$_SESSION['eschools']['admin_id']   = $eachadmin->es_adminsId;
			$_SESSION['eschools']['user_type']  = $eachadmin->user_type;
			$_SESSION['eschools']['user_theme'] = $eachadmin->user_theme;
			$obj_accounts = new es_finance_master();
			//$compdetails = $obj_accounts->Get(1);
			$compdetails  = getarrayassoc("SELECT *FROM `es_finance_master`  ORDER BY `es_finance_masterid` DESC LIMIT 0 , 1");
			$_SESSION['eschools']['currency']       = $compdetails['fi_symbol'];
			$_SESSION['eschools']['schoollogo']     = $compdetails['fi_school_logo'];
			$_SESSION['eschools']['from_acad']      = $compdetails['fi_ac_startdate'];
			$_SESSION['eschools']['to_acad']        = $compdetails['fi_ac_enddate'];
			$_SESSION['eschools']['from_finance']   = $compdetails['fi_startdate'];
			$_SESSION['eschools']['to_finance']     = $compdetails['fi_enddate'];
			$_SESSION['eschools']['es_finance_masterid']  = $compdetails['es_finance_masterid'];
			
			$_SESSION['eschools']['schoolname'] = stripslashes($compdetails['fi_schoolname']);
		}
		header("Location:./?pid=44");
    }else{
		$error_admin_name	  = ADMIN_USER_NAME;
		$error_admin_password = ADMIN_PASSWORD;
		$error_school_id 	  = ADMIN_SCHOOL_ID;
	}	
}*/
	
?> 