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
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}

    $q_limit  = 4;
												  
if(isset($passwordSubmit) && $passwordSubmit!="") {
	     $error = "";
		 
		 $vlc = new FormValidation();
		 $pattern = "/^([a-zA-Z0-9._-]+)$/"; 		
		if (empty($ch_old_password)) {
		$errormessage[0]="Enter Old Password";	  
		}
				
		if (empty($ch_new_password)) {
		$errormessage[1]="Enter Password";	  
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

    $ch_old_password = $ch_old_password;		
	$qAdmin  = "SELECT * FROM `es_admins`  WHERE `admin_username`='" . $_SESSION['eschools']['admin_user'] . "' AND `admin_password`='$ch_old_password'";
	$no_rows = sqlnumber($qAdmin);
	
	if ($no_rows > 0){
	    $ch_new_password = $ch_new_password;
		$db->update("es_admins", "`admin_password` ='$ch_new_password' ", "`admin_username` ='" . $_SESSION['eschools']['admin_user'] . "'" );	
		header("location:?pid=$pid&action=$action&emsg=2");
		exit;	
	}else{	
		  $notValid = "Please Enter the correct Password";
	}
}	
}
?>	