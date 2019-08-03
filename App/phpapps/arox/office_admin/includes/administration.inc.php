<?php
sm_registerglobal('pid', 'action','emsg', 'update', 'start', 'back', 'admin_fname' , 'admin_lname', 'admin_username' , 'admin_password', 'admin_password2' , 'admin_email', 'admin_phoneno' , 'adminlevel', 'admin_more' , 'indulpermissions', 'saveallowance', 'lid', 'elid');
/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
		header('location: ./?pid=1&unauth=0');
		exit;
	}
 $pattern_pass = "/(\s)/";
		$vlc    = new FormValidation();	

/**End of the permissions   **/

// Admin List
	if($action=='adminlist' || $action=='print_adminlist')
	{		
		$obj_leavemaster = new es_admins();
		$q_limit  = PAGENATE_LIMIT;
		if ( !isset($start))$start = 0;
		$no_rows = count($obj_leavemaster->GetList(array(array("es_adminsId", ">", 0),array("user_type", "!=", "super")) ));
	
		$orderby_array = array( 'orb1'=>'es_adminsId', 'orb2'=>'admin_username');
		
		if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
			$orderby = $orderby_array[$column_name];
		}else{
			$orderby = "es_adminsId";
		}
		if (isset($asds_order)&&$asds_order=='ASC'){
			$order = true;
		}else{
			$order = false;
		}
	
		 $leavemaster_det = $obj_leavemaster->GetList(array(array("es_adminsId", ">", 0),array("user_type", "!=", "super")), $orderby, $order,  "$start , $q_limit" );
		
		
		
	}
	// Delecting an Admin Master
	if($action=='deleteadmin')
	{
		$obj_leavemaster = new es_admins();
		$obj_leavemaster->es_adminsId = $lid;
		$obj_leavemaster->Delete();
		$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_admins','Administration','Delete Admin','".$lid."','Delete','".$_SERVER['REMOTE_ADDR']."',NOW())";
     $log_insert_exe=mysql_query($log_insert_sql);		
		header("Location:?pid=42&action=adminlist&emsg=3");		
		exit();
	}
	
	
// ADD ADMIN Master
	if($action=='addadmin' && $saveallowance=='Submit')
	{
	   
		//echo "<pre>";
		$new_post=$_POST;
		unset($new_post['admin_fname']);
		unset($new_post['admin_lname']);
		unset($new_post['admin_username']);
		unset($new_post['admin_password']);
		unset($new_post['admin_password2']);
		unset($new_post['admin_email']);
		unset($new_post['admin_phoneno']);
		unset($new_post['adminlevel']);
		unset($new_post['admin_more']);
		unset($new_post['saveallowance']);
		//print_r($_POST);
		//print_r($new_post);
		
		
		$vlc    = new FormValidation();	
		if (empty($admin_fname)) {
		$errormessage[0]="Enter First Name";	  
		}
		if (empty($admin_lname)) {
		$errormessage[1]="Enter Last Name";	  
		}	
		$pattern = "/^([a-zA-Z0-9._-]+)$/";
				
		if (empty($admin_username)) {
		$errormessage[2]="Enter valid User Name";	  
		}elseif(!preg_match($pattern,$admin_username)){
			$errormessage[2]="Enter valid User Name";	 
		}else{
		$records = sqlnumber("SELECT * FROM es_admins WHERE admin_username='".$admin_username."'");
		if($records >0){$errormessage[2]="User Name already exist";	}
		}		
		if (empty($admin_password)) {
		$errormessage[3]="Enter valid Password";	  
		}elseif (preg_match($pattern_pass,$admin_password)){
		$errormessage[3]="Password must not contain spaces
";
		}
		if ($admin_password!=$admin_password2) {
		$errormessage[4]="Password and Re-type Password should be same";	  
		}
						
		if (empty($admin_phoneno)) {
		$errormessage[6]="Enter valid Phone Number"; 
		}
		
		if (!$vlc->is_email($admin_email)) {
		$errormessage[5]="Enter valid E-mail"; 	 
		}
		else{
		$records = sqlnumber("SELECT * FROM es_admins WHERE admin_email='".$admin_email."'");
		if($records >0){$errormessage[5]="Email already exist";	}
		}	
		
		if(count($errormessage)=="0ghghghgh")
		{						
			$permissarr = implode(",", $new_post);
			$obj_allowance = new es_admins();
			$obj_allowance->admin_username = $admin_username;
			$obj_allowance->admin_password = $admin_password;
			$obj_allowance->admin_fname = $admin_fname;
			$obj_allowance->user_theme = "pink.css";
			$obj_allowance->user_type = $adminlevel;
			$obj_allowance->admin_lname = $admin_lname;	
			$obj_allowance->admin_email = $admin_email;			
			$obj_allowance->admin_phoneno = $admin_phoneno;			
			$obj_allowance->admin_more = $admin_more;			
			$obj_allowance->admin_permissions = $permissarr;			
			$id = $obj_allowance->Save();		
			
			$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_admins','Administration','Add Admin','".$id."','Add Admin','".$_SERVER['REMOTE_ADDR']."',NOW())";
     $log_insert_exe=mysql_query($log_insert_sql);
				
			header("Location:?pid=42&action=adminlist&emsg=1");
			exit();		
		}
		
    }	
	
	// Update Admin
	if($action=='edit')
	{
	$obj_leavemaster = new es_admins();
	$admindetails = $obj_leavemaster->Get($elid);	
	$new_data1=$admindetails->admin_permissions;
	$new_data=explode(",",$new_data1);	
	foreach($new_data as $new){
		$per_row[$new]=$new;
	}
	
	 if($saveallowance=='Submit') 
	 {	
		$vlc    = new FormValidation();	
		if (empty($admin_fname)) {
		$errormessage[0]="Enter valid First Name";	  
		}
		if (empty($admin_lname)) {
		$errormessage[1]="Enter valid Last Name";	  
		}			
		if (empty($admin_username)) {
		$errormessage[2]="Enter valid User Name";	  
		}else{
		$records = sqlnumber("SELECT * FROM es_admins WHERE admin_username='".$admin_username."' AND es_adminsid !=".$elid);
		if($records >0){$errormessage[2]="User Name already exist";	}
		}		
		if (!$vlc->is_email($admin_email)) {
		$errormessage[5]="Enter valid E-mail"; 	 
		}else{
		$records = sqlnumber("SELECT * FROM es_admins WHERE admin_email='".$admin_email."' AND es_adminsid !=".$elid);
		if($records >0){$errormessage[5]="Email already exist";	}
		}				
		if (empty($admin_phoneno)) {
		$errormessage[6]="Enter valid Phone Number"; 
		}	
		
		if(count($errormessage)==0)
		{						
			//$permissarr = implode(",", $indulpermissions);
			$new_post=$_POST;
			unset($new_post['admin_fname']);
			unset($new_post['admin_lname']);
			unset($new_post['admin_username']);
			unset($new_post['admin_password']);
			unset($new_post['admin_password2']);
			unset($new_post['admin_email']);
			unset($new_post['admin_phoneno']);
			unset($new_post['adminlevel']);
			unset($new_post['admin_more']);
			unset($new_post['saveallowance']);
			$permissarr = implode(",", $new_post);
			 $db->update('es_admins', "admin_username ='" . $admin_username . "', admin_fname ='" . $admin_fname . "',	user_type ='" . $adminlevel . "',	admin_lname ='" . $admin_lname . "',	admin_email ='" . $admin_email . "', admin_phoneno ='" . $admin_phoneno . "', admin_more ='" . $admin_more . "', admin_permissions ='" . $permissarr . "'",'es_adminsid =' . $elid);	
			
			 $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_admins','Administration','Edit Admin','".$elid."','Update Admin','".$_SERVER['REMOTE_ADDR']."',NOW())";
     $log_insert_exe=mysql_query($log_insert_sql);
			
							
			header("Location:?pid=42&action=adminlist&emsg=2");
			exit();		
		}
		}
    }	
	
    ?>