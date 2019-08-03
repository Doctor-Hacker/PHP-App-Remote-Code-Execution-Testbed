<?php 
                                    sm_registerglobal('pid', 
									                  'action',
													  'emsg', 
													  'passwordSubmit',
													  'ch_old_password',
													  'ch_new_password',
													  'ch_rew_password',
													  'notvalid'
													  );
/**
* Only Student or schoool staff  can be allowed to access this page
*/ 
checkuserinlogin();
/**End of the permissions   **/

    $q_limit  = 4;
												  
if(isset($passwordSubmit) && $passwordSubmit!="") {

			$error = "";
		 
		 $vlc = new FormValidation();	
		 $pattern = "/^([a-zA-Z0-9._-]+)$/"; 	
		if (empty($ch_old_password)) {
		$errormessage[0]="Enter Old Password";	  
		}
				
		if (empty($ch_new_password)) {
		$errormessage[1]="Enter Required Password";	  
		}else{
			 if (!preg_match($pattern,$ch_new_password)){
	   $errormessage[1]="Enter&nbsp;valid&nbsp;Password";	
	   }
		}
				
		if (empty($ch_rew_password)) {
		$errormessage[2]="Rewrite Password";	  
		}
				
		if ($ch_new_password  != $ch_rew_password) {
		$errormessage[3]="New Password And Rewrite Password Are Not Same";	  
		}
		
		
		 if(count($errormessage)==0)
		 {
				if( $_SESSION['eschools']['login_type'] == "student"){
		   
					$qAdmin  = "SELECT * FROM `es_preadmission`  WHERE `pre_student_username`='" . $_SESSION['eschools']['user_name'] . "' 
							  AND `pre_student_password`='$ch_old_password'";
				   $no_rows = sqlnumber($qAdmin);
				   if ($no_rows > 0){
						$db->update("es_preadmission", "`pre_student_password` ='$ch_new_password' ", 
						                 "`pre_student_username` ='" . $_SESSION['eschools']['user_name'] . "'" );	
						header("location:?pid=$pid&action=$action&emsg=2");
						exit;	
					}else{	
						  $errormessage[4] = "Please Enter the correct Old Password";
					}
			
				}else{
					$qAdmin  = "SELECT * FROM `es_staff`  WHERE `st_username`='" . $_SESSION['eschools']['user_name'] . "' 
							  AND `st_password`='$ch_old_password'";
				   $no_rows = sqlnumber($qAdmin);
				   if ($no_rows > 0){
						$db->update("es_staff", "`st_password` ='$ch_new_password' ", 
						                 "`st_username` ='" . $_SESSION['eschools']['user_name'] . "'" );	
						header("location:?pid=$pid&action=$action&emsg=2");
						exit;	
					}else{	
						  $errormessage[4] = "Please Enter the correct Old Password";
					}
				
				
				}
			}	
}
?>	