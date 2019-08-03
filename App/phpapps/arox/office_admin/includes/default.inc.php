<?php  
sm_registerglobal('pid', 'action','Submit','schoolid', 'username', 'password','user_type' );

include (INCLUDES_CLASS_PATH . DS . 'class.es_admins.php');
//Php Code will come here
/**
 * administrator login class
 */
$adminlogin = new es_admins();	

if (isset($Submit)&&$Submit=="Submit"){
/**
 *validations 
 */

	$error	= "";
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
//validating School Id
	if (!$vlc->is_allnumbers( $schoolid ) ) {
		$error_school_id  = ADMIN_SCHOOL_ID;
		$error			 .= "schoolid";
	}
	
	$arr_admin_info = array(
					array("admin_schoolid", "=", $schoolid), 
					array("admin_username", "=", $username), 
					array("admin_password", "=", $password)
			   );
    $admin_info = $adminlogin->GetList($arr_admin_info);
//Setting session variable
	if (is_array( $admin_info) && count( $admin_info) > 0){
		foreach ( $admin_info as $eachadmin) {
			//array_print($eachadmin);
		
			$_SESSION['eschools']['admin_user']     = $eachadmin->admin_username;
			$_SESSION['eschools']['admin_schoolid'] = $eachadmin->admin_schoolid;
			$_SESSION['eschools']['admin_id']       = $eachadmin->es_adminsId;
			$_SESSION['eschools']['user_type']      = $eachadmin->user_type;
			$_SESSION['eschools']['user_theme']     = $eachadmin->user_theme;
		}
		header("Location:./?pid=2&action=list_enquiry");
    }else{
		$error_admin_name	  = ADMIN_USER_NAME;
		$error_admin_password = ADMIN_PASSWORD;
		$error_school_id 	  = ADMIN_SCHOOL_ID;
	}	
}
	
?> 
