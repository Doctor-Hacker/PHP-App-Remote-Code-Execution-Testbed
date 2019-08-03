<?php   
        sm_registerglobal('pid', 
						  'action',
						  'uid', 
						  'status',
						  'edit_id',
						  'start',
						  'column_name',
						  'emsg',
						  'personSubmit',
						  'vehicleSubmit',
						  'sec_name',
						  'sec_address',
						  'sec_contact_person',
						  'sec_vehicle_no',
						  'sec_purpose',
						  'sec_mode_app',
						  'sec_time_in',
						  'sec_time_out',
						  'sec_remarks',
						  'status',
						  'Search',						 
						  'type', 
						  'date_to', 
						  'date_from', 
						  'dc1', 
						  'dc2',
						  'Search2',
						  'sec_colour',
						  'sec_phone',
						  'sec_mobile',
						  'sec_make_vehicle',
						  'sec_reg_no',
						  'printpass',
						  'from',
						  'es_securityid',
						  'to'
						  );
						  
/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}

/**End of the permissions    **/

	  

    $q_limit  = 15;
    $es_security = new es_security();
	$securityList = $es_security->GetList(array(array("status", "=", "active"),array("es_securityid", ">", "0")) );
	
	if($action=="securitySlip"){
	$eachslip = $db->getRow("SELECT * FROM  `es_security`  where es_securityid=".$es_securityid);
								  
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_security','SECURITY','VISITOR RECORDS ','".$es_securityid."','PRINT VISITOR RECORDS','".$_SERVER['REMOTE_ADDR']."',NOW())";
$log_insert_exe=mysql_query($log_insert_sql);
  
								  }
								  
								  


//Start of Visitors Record.



if(isset($vehicleSubmit)&&$vehicleSubmit!= ""){
	
		 $error = "";
 
		 $vlc = new FormValidation();
		 
		 if(empty($sec_name)) {
		 $errormessage[0]                 = "Enter Name";
         
		 }

		
  
		if (empty($sec_contact_person)) {
		     $errormessage[2]              = "Enter Person to Meet";
		  
		} 
		
		if (empty($sec_address)) {
		     $errormessage[1]             = "Enter Address";
		}  
		
		if (empty($sec_time_in)) {
		   $errormessage[3]                 = "Enter Time In";
		  
		}  
		
	
	/*	if (empty($sec_vehicle_no)) {
		    $errormessage[4]                 = "Enter Vehicle Registration";
		  
		}*/
		if (empty($sec_phone)) {
		   $errormessage[5]                 = "Enter Phone Number";
		  
		}  
	
		if (isset($sec_mobile) && strlen($sec_mobile)>11) {
		   $errormessage[6]                 = "Mobile No should be 11 characters";
		  
		}  
		
		
 if(count($errormessage)==0) { 
		if (isset($sec_name)){
            		$es_security->sec_name    = $sec_name;
          }
	    
		if (isset($sec_address)){
            		$es_security->sec_address = $sec_address;
          } 
		  
		if (isset($sec_contact_person)){
            		$es_security->sec_contact_person = $sec_contact_person;
          }
		if (isset($sec_purpose)){
            		$es_security->sec_purpose = $sec_purpose;
          }     
		if (isset($sec_mode_app)){
            		$es_security->sec_mode_app = $sec_mode_app;
          }
		if (isset($sec_time_in) ){
            		$es_security->sec_time_in = formatDateCalenderTime($sec_time_in, 'Y-m-d H:i:s');
          }
		if (isset($sec_time_out) && $sec_time_out!=""){
            		$es_security->sec_time_out = formatDateCalenderTime($sec_time_out, 'Y-m-d H:i:s');
          } else{
		  $es_security->sec_time_out ="0000-00-00 00:00:00";
		  } 
		if (isset($sec_remarks)){
            		$es_security->sec_remarks = $sec_remarks;
          } 
		if (isset($sec_vehicle_no)){
            		$es_security->sec_vehicle_no = $sec_vehicle_no;
          }
		if (isset($sec_colour)){
            		$es_security->sec_colour = $sec_colour;
          } 
		if (isset($sec_make_vehicle)){
            		$es_security->sec_make_vehicle = $sec_make_vehicle;
          } 
		if (isset($sec_reg_no)){
            		$es_security->sec_vehicle_no = $sec_reg_no;
          }   
		  if (isset($sec_phone)){
            		$es_security->sec_phone    = $sec_phone;
          }
		  if (isset($sec_name)){
            		$es_security->sec_mobile    = $sec_mobile;
          }            
		$es_security->status = "active"; 
		 
	   if(empty($error)) {
				 
				  if (isset($edit_id) && $edit_id !=""){
					   $sec_time_in = formatDateCalenderTime($sec_time_in, 'Y-m-d H:i:s');
					   $sec_time_out = formatDateCalenderTime($sec_time_out, 'Y-m-d H:i:s');
						$db->update("es_security", "sec_name                 = '$sec_name',
													  sec_address            = '$sec_address',
													  sec_contact_person     = '$sec_contact_person',
													  sec_purpose            = '$sec_purpose',
													  sec_mode_app           = '$sec_mode_app',
													  sec_time_in            = '$sec_time_in',
													  sec_time_out           = '$sec_time_out',
													  sec_vehicle_no         = '$sec_vehicle_no',
													  sec_colour             = '$sec_colour',
													  sec_phone             = '$sec_phone',
													  sec_mobile            = '$sec_mobile',
													  sec_make_vehicle       = '$sec_make_vehicle',
													  sec_reg_no             = '$sec_reg_no',
													  sec_remarks            = '$sec_remarks'","es_securityid=$edit_id"); 
					   
					   
					   
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_security','SECURITY','VISITOR RECORDS ','".$edit_id."','UPDATE VISITOR RECORDS','".$_SERVER['REMOTE_ADDR']."',NOW())";
$log_insert_exe=mysql_query($log_insert_sql);
					header("location: ?pid=$pid&action=vehicle&emsg=2&start=$start");
						exit;
				  }
				  else
            	  {
				  
				  $iid=$es_security->Save();
				  if(isset($iid) && $iid!=""){
				  $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_security','SECURITY','VISITOR RECORDS ','".$iid."','ADD VISITOR RECORDS','".$_SERVER['REMOTE_ADDR']."',NOW())";
$log_insert_exe=mysql_query($log_insert_sql);
  					 header("location:?pid=$pid&action=$action&emsg=1");
            	     exit;
					 }
            	  }

           }   	 
		 
  }
}
	
if (isset($action) && $action=='edit_vehicle') {

 $getvehicles = $es_security->Get($uid);   //gets vehicles
      
}
if (isset($action) && $action=='view_vehicle') {
   
	  $viewvehicles = $es_security->Get($uid); 
	$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_security','SECURITY','VISITOR RECORDS ','".$uid."','VIEW VISITOR  VEHICALS RECORDS','".$_SERVER['REMOTE_ADDR']."',NOW())";
$log_insert_exe=mysql_query($log_insert_sql);
  
	  
	  
	  
	  
	   //gets vehicles 

}
if (isset($action) && $action=='delete_vehicle') {
      $db->update("es_security", "status='deleted'", "es_securityid=$uid");  
      $action = "vehicle";
	  $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_security','SECURITY','VISITOR RECORDS ','".$uid."','DELETE VEHICALS','".$_SERVER['REMOTE_ADDR']."',NOW())";
$log_insert_exe=mysql_query($log_insert_sql);

   header("location:?pid=$pid&action=$action&emsg=3&start=$start");
}

if(isset($action) &&  $action == "edit_vehicle" || $action == "vehicle"  ){
 	  
		if (!isset($start) ){
			$start = 0;
		}
	  
	$no_rows = count($es_security->GetList(array(array("es_securityid", ">", 0),array("status", "=", "active"),array("sec_vehicle_no", "!=", "novehicle")) ));
	
		$orderby_array = array('orb1'=>'es_securityid', 'orb2'=>'tr_transport_type', 'orb3'=>'in_short_name');
		
		if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
			$orderby = $orderby_array[$column_name];
		}else{
			$orderby = "es_securityid";
			
			
		}
		if (isset($asds_order) && $asds_order=='ASC'){
			$order = true;
		}else{
			$order = false;
		}
		
	$vehicleList = $es_security->GetList(array(array("status", "=", "active"),array("es_securityid", ">", "0"),array("sec_vehicle_no", "!=", "novehicle")), $orderby, $order,  "$start , $q_limit" );

}

//Start of View Report
if( $action == 'report' ){
		
		  
		  
			
			
		
		
		
		  
		  
		  
		  $condition = "";
		if(isset($Search2) && $Search2!=""){
			$PageUrl = "&Search2=$Search2";
			
			if(isset($dc1) && $dc1!=""){$from = func_date_conversion("d/m/Y","Y-m-d",$dc1)." 00:00:00";}
			if(isset($dc2) && $dc2!=""){$to = func_date_conversion("d/m/Y","Y-m-d",$dc2)." 23:59:59";}
			
			/*if(isset($date_from) && $date_from!=""){$from = func_date_conversion("d/m/Y","Y-m-d",$date_from)." 00:00:00";}
			if(isset($date_to) && $date_to!=""){$to = func_date_conversion("d/m/Y","Y-m-d",$date_to)." 23:59:59";}
			*/
			if($from!="" && $to!=""){
				$condition .= " AND sec_time_in BETWEEN '".$from."' AND '".$to."'";
				$PageUrl .="&dc1=$dc1&dc2=$dc2";
			}
			if($from!="" && $to==""){
				$condition .= " AND  sec_time_in >= '".$from."' ";
				$PageUrl .="&dc1=$dc1";
			}
			if($from=="" && $to!=""){
				$condition .= " AND sec_time_in <= '".$to."' ";
				$PageUrl .="&dc2=$dc2";
			}
			
		}
		
		
		$sql_qry="select * from es_security where status='active' ".$condition."";
		
		$no_rows=sqlnumber($sql_qry);
		if (!isset($start) ){
			$start = 0;
		}
		$q_limit=20;
		$orderby = "es_securityid";
	     $sql_qry .=" ORDER BY ". $orderby." DESC LIMIT $start,$q_limit";
		$vehicleList=$db->getRows($sql_qry);
		  
		  
	
	
}
	?>			