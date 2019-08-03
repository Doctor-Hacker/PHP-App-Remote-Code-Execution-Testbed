<?php
sm_registerglobal('pid', 'action', 'password', 'schoolid', 'username', 'user_type','login_sbmt_x', 'login_sbmt_y', 'user_type');

if (isset($login_sbmt_x)&&isset($login_sbmt_y) ) {
	
		
	
	//Student Login
	if($user_type=='student')
	{		
	
		/*$studentlogin = new es_preadmission();	
		$arr_admin_info = array(					
						array("pre_student_username", "=", $username), 
						array("pre_student_password", "=", $password)
				   );*/
		$admin_info = $db->getRows('SELECT * FROM es_preadmission WHERE pre_student_username="'.$username.'" AND pre_student_password="'.$password.'"');
		
		if (is_array( $admin_info) && count( $admin_info) > 0){
		
		      foreach ( $admin_info as $eachadmin) {
				//array_print($eachadmin);			
			     $_SESSION['eschools']['user_name']      = $eachadmin['pre_student_username']; 
				 $_SESSION['eschools']['user_id']        = $eachadmin['es_preadmissionId'];
				
				 $_SESSION['eschools']['login_type']     = $user_type;
				 $_SESSION['eschools']['user_theme']     = $eachadmin['es_user_theme'];
				$obj_accounts = new es_finance_master();
				$compdetails = getarrayassoc("SELECT *FROM `es_finance_master`  ORDER BY `es_finance_masterid` DESC LIMIT 0 , 1");
				
				$_SESSION['eschools']['currency']       = $compdetails['fi_symbol'];
				$_SESSION['eschools']['schoollogo']     = $compdetails['fi_school_logo'];
				$_SESSION['eschools']['schoolname']     = $compdetails['fi_schoolname'];
				$_SESSION['eschools']['from_acad']      = $compdetails['fi_ac_startdate'];
			    $_SESSION['eschools']['to_acad']        = $compdetails['fi_ac_enddate'];
			    $_SESSION['eschools']['from_finance']   = $compdetails['fi_startdate'];
			    $_SESSION['eschools']['to_finance']     = $compdetails['fi_enddate'];
				header("Location:./?pid=2&action=viewprofile");
			    exit();
				
			}
			
		}else{
		header("Location:../?emsg=error");	
		exit();	
		}	
	}
	//End of Student Login
	
	//Staff Login
	if($user_type=='staff')
	{		
		$stafflogin = new es_staff();	
		$arr_admin_info = array(					
						array("st_username", "=", $username), 
						array("st_password", "=", $password)
				   );
		$admin_info = $stafflogin->GetList($arr_admin_info);
		if (is_array( $admin_info) && count( $admin_info) > 0){
		    foreach ( $admin_info as $eachadmin) {
				//array_print($eachadmin);
				$_SESSION['eschools']['user_name']      = $eachadmin->st_username;
				$_SESSION['eschools']['user_id']        = $eachadmin->es_staffId;
				$_SESSION['eschools']['st_postaplied']  = $eachadmin->es_staff;
				$_SESSION['eschools']['login_type']     = $user_type;
				$_SESSION['eschools']['user_theme']     = $eachadmin->st_theme;
				
				$obj_accounts = new es_finance_master();
				$compdetails = getarrayassoc("SELECT *FROM `es_finance_master`  ORDER BY `es_finance_masterid` DESC LIMIT 0 , 1");
				$_SESSION['eschools']['currency']     = $compdetails['fi_symbol'];
				$_SESSION['eschools']['schoollogo']   = $compdetails['fi_school_logo'];
				$_SESSION['eschools']['schoolname']   = $compdetails['fi_schoolname'];
				$_SESSION['eschools']['from_acad']    = $compdetails['fi_ac_startdate'];
			    $_SESSION['eschools']['to_acad']      = $compdetails['fi_ac_enddate'];
			    $_SESSION['eschools']['from_finance'] = $compdetails['fi_startdate'];
			    $_SESSION['eschools']['to_finance']   = $compdetails['fi_enddate'];
			}
			header("Location:./?pid=16&action=viewprofile");
			exit();
		}else{
		header("Location:../?emsg=error");		
		exit();
		}	
	}
	//End of Staff Login
}	
?> 