<?php
sm_registerglobal('pid', 'action','emsg', 'update', 'start', 'back', 'saveleave', 'seldepartment', 'leavetype', 'noofleaves', 'carryforward', 'encashable', 'nofocarryfordays', 'start', 'lid', 'elid', 'saveallowance', 'allonctype', 'dc1', 'dc2', 'alwamount', 'alw_amt_type', 'loanctype', 'loanname', 'intrestrate', 'taxname', 'slabrateto', 'slabratefrom', 'rateamount', 'employeercont', 'empconttype', 'employeecont', 'emyconttype', 'st_department','st_postaplied','alw_dept','es_postname','pre_year','leave_school_year','allowance_school_year','deduction_school_year','loan_school_year','tax_school_year','pf_school_year','elid' );

/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}


$school_details_sel = "SELECT * FROM `es_finance_master` ORDER BY `es_finance_masterid` DESC";
$school_details_res = getamultiassoc($school_details_sel);

/**End of the permissions   **/

$obj_leavemaster = new es_leavemaster();
$obj_allowancemaster = new es_allowencemaster();
$obj_deductionmaster = new es_deductionmaster();
$obj_loanmaster = new es_loanmaster();
$obj_taxmaster = new es_taxmaster();
$obj_pfmaster = new es_pfmaster();

//fetching  dept  ///
   
$exesqlquery = "SELECT * FROM `es_departments`";
$getdeptlist = getamultiassoc($exesqlquery);

if (isset($st_department)&&$st_department!=""){ 
	$sel_posts =  "SELECT * FROM `es_deptposts` WHERE es_postshortname='".$st_department."'";
	$posts_list2 = getamultiassoc($sel_posts);
}

	
// Leave Master
if ($action=='leavemaster' ){
	if (!isset($leave_school_year)) {
	    $from_finance = $_SESSION['eschools']['from_finance'];
	    $to_finance = $_SESSION['eschools']['to_finance'];
	}else{
		$finance_res = getarrayassoc("SELECT * FROM `es_finance_master` WHERE `es_finance_masterid`= $pre_year");
		$from_finance = $finance_res['fi_startdate'];
		$to_finance   = $finance_res['fi_enddate']; 
	} 

    // Edit Leave Master			
	if (isset($elid) && $elid!=""){
		$leavemasterdetails = $obj_leavemaster->Get($elid);
		$sel_posts =  "SELECT * FROM `es_deptposts` WHERE es_postshortname='" . $leavemasterdetails->lev_dept . "'";
		$posts_list = getamultiassoc($sel_posts);
	}
	// Insert  Leave Master
	if (isset($saveleave) && $saveleave=='Update' && $leavetype!="" && $noofleaves>0){
	 
	    
		$vlc = new FormValidation();
		$fromdate = formatDateCalender($dc1,"Y-m-d");
		$todate = formatDateCalender($dc2,"Y-m-d");		
		if (empty($leavetype)) {
			$errormessage[0] = "Enter Leave Type";	  
		}
		if ($noofleaves=="" || $noofleaves<=0 || $noofleaves>100) {
			$errormessage[1]="Enter No of Leaves per Year";	  
		}
		if (empty($st_department)) {
			$errormessage[2] = "Select Department";	  
		}
		if (empty($es_postname)) {
			$errormessage[3] = "Select Post";	  
		}	
		if(!isset($dc1) || $dc1=="" ) {
			$errormessage[4]="Enter Year";	  
		}
		if(!isset($dc2) || $dc2=="" ) {
			$errormessage[4]="Enter Year";	  
		}
		 $sel_leave = "SELECT * FROM es_leavemaster WHERE lev_post = '" . $es_postname . "' 
				                                           AND lev_dept   = '" . $st_department . "' 
														   AND lev_type   = '" . $leavetype . "'
														   AND lev_from_date BETWEEN '" . $from_finance . "' AND '" . $to_finance . "'
														   AND lev_to_date BETWEEN '" . $from_finance . "' AND '" . $to_finance . "' AND es_leavemasterid!=".$elid; 
														   
					$records = sqlnumber($sel_leave); 
					if($records>=1){$errormessage[6]="Already Exist";}
		
	
		if (count($errormessage)==0){
			$db->update('es_leavemaster', "lev_post ='" . $es_postname . "', lev_type ='" . $leavetype . "',	lev_leavescount ='" . $noofleaves . "',	lev_carryforward ='no', lev_dept ='" . $st_department . "',	lev_days ='" . $nofocarryfordays . "', lev_enchashable ='no'",'es_leavemasterid =' . $elid);
			
			$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_leavemaster','PAYROLL','CREATE ANUAL LEAVE','".$elid."','ANUAL LEAVE UPDATED','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);
	
			header("Location:?pid=29&action=leavemaster&emsg=2");
			exit();
		}
	}
	if (isset($saveleave) && $saveleave=='Save'){
	
		$vlc = new FormValidation();
		if (empty($st_department)) {
		    $errormessage[0]="Please Select Department";	  
		}
		if (count($seldepartment)==0){
		    $errormessage[1] = "Please Select Post ";
		}							
		if (empty($leavetype)) {
			$errormessage[2]="Enter Leave Type";	  
		}	
		if ($noofleaves=="" || $noofleaves<=0 || $noofleaves>100) {
			$errormessage[3]="Enter No of Leaves per Year";	  
		}
		
		if(!isset($dc1) || $dc1=="" ) {
			$errormessage[4]="Enter Year";	  
		}
		if(!isset($dc2) || $dc2=="" ) {
			$errormessage[4]="Enter Year";	  
		}
	
	
		if (count($errormessage)==0){
			$fromdate = formatDateCalender($dc1,"Y-m-d");
		    $todate = formatDateCalender($dc2,"Y-m-d");
			
			for($i=0; $i<count($seldepartment);$i++){
			   $obj_leavemaster = new es_leavemaster();
				    
					$obj_leavemaster->lev_type = $leavetype;
					$obj_leavemaster->lev_leavescount = $noofleaves;
					$obj_leavemaster->lev_carryforward ='no';
					$obj_leavemaster->lev_days = $nofocarryfordays;
					$obj_leavemaster->lev_enchashable = 'no';
					$obj_leavemaster->lev_dept = $st_department;
					$obj_leavemaster->lev_post = $seldepartment[$i];
					$obj_leavemaster->lev_from_date = $fromdate;
					$obj_leavemaster->lev_to_date = $todate;	
					
					$sel_leave = "SELECT * FROM es_leavemaster WHERE lev_post = '" . $seldepartment[$i] . "' 
				                                           AND lev_dept   = '" . $st_department . "' 
														   AND lev_type   = '" . $leavetype . "'
														   AND lev_from_date BETWEEN '" . $from_finance . "' AND '" . $to_finance . "'
														   AND lev_to_date BETWEEN '" . $from_finance . "' AND '" . $to_finance . "'"; 
														   
					$records = sqlnumber($sel_leave); 
					
					if( $records >0){
					   header("Location:?pid=29&action=leavemaster&emsg=81");
				       exit();
					}else {	
					$lvid=$obj_leavemaster->Save();
					
					$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_leavemaster','PAYROLL','CREATE ANUAL LEAVE','".$lvid."','ANUAL LEAVE ADDED','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);
	
					
					}
					
					
			
			}
			
			header("Location:?pid=29&action=leavemaster&emsg=1");
			      exit();
			
		}
	}    	
		//Displaying Leaves List
		//$obj_leavemaster = new es_leavemaster();
		$q_limit  = PAGENATE_LIMIT;
		if ( !isset($start))$start = 0;
		$no_rows = count($obj_leavemaster->GetList(array(array("es_leavemasterId", ">", 0),
		                                                 array("lev_to_date", "between", "$from_finance AND $to_finance")) ));
		$orderby_array = array( 'orb1'=>'lev_post', 'orb2'=>'lev_post');
		
		if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
			$orderby = $orderby_array[$column_name];
		}else{
			$orderby = "lev_post";
		}
		if (isset($asds_order)&&$asds_order=='ASC'){
			$order = true;
		}else{
			$order = false;
		}
		if (isset($leave_school_year) && $leave_school_year=='Submit'){
			$leavemaster_det = $obj_leavemaster->GetList(array( array("es_leavemasterId", ">", 0),
															  array("lev_to_date", "between", "$from_finance AND $to_finance")), 
															$orderby, 
															$order,  
															"$start , $q_limit" );
															
		}else{
			$leavemaster_det = $obj_leavemaster->GetList(array(array("es_leavemasterId", ">", 0),
		                                                   array("lev_to_date", "between", "$from_finance AND $to_finance")), 
							                         $orderby, $order,  "$start , $q_limit" );
		}
}


	// Deleting an Leave Master
if ($action=='deleteleavemaster'){
	//$obj_leavemaster = new es_leavemaster();
	$obj_leavemaster->es_leavemasterId = $lid;
	$obj_leavemaster->Delete();	
	$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_leavemaster','PAYROLL','CREATE ANUAL LEAVE','".$lid."','ANUAL LEAVE DELETED','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);	
	header("Location:?pid=29&action=leavemaster&emsg=3");		
	exit();
}

if ($action=='printleavemaster'){ 
	 /*if(!isset($leave_school_year)) {
		$from_finance = $_SESSION['eschools']['from_finance'];
		$to_finance = $_SESSION['eschools']['to_finance'];
	}
	else{*/
			$finance_res = getarrayassoc("SELECT * FROM `es_finance_master` WHERE `es_finance_masterid`= $pre_year");
			$from_finance = $finance_res['fi_startdate'];
			$to_finance   = $finance_res['fi_enddate']; 
	//} 
	
	$q_limit  = PAGENATE_LIMIT;
	if ( !isset($start))$start = 0;
		$no_rows = count($obj_leavemaster->GetList(array(array("es_leavemasterId", ">", 0)) ));
		$orderby_array = array( 'orb1'=>'lev_post', 'orb2'=>'lev_post');
		if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
			$orderby = $orderby_array[$column_name];
		}else{
			$orderby = "lev_post";
		}
		if (isset($asds_order)&&$asds_order=='ASC'){
			$order = true;
		}else{
			$order = false;
		}
		if (isset($leave_school_year) && $leave_school_year=='Submit'){
			$leavemaster_det = $obj_leavemaster->GetList(array( array("es_leavemasterId", ">", 0),
															  array("lev_to_date", "between", "$from_finance AND $to_finance")), 
															$orderby, 
															$order,  
															"$start , $q_limit" );
															
		}else{
			$leavemaster_det = $obj_leavemaster->GetList(array(array("es_leavemasterId", ">", 0),
		                                                   array("lev_to_date", "between", "$from_finance AND $to_finance")), 
							                         $orderby, $order,  "$start , $q_limit" );
		}
		//array_print($leavemaster_det);
	
	}
// End of Leave Master	
	
// allowence Master
if ($action=='allowencemaster' ){
	$vlc = new FormValidation();
	if (!isset($allowance_school_year)) {
		$from_finance = $_SESSION['eschools']['from_finance'];
		$to_finance   = $_SESSION['eschools']['to_finance'];
	}else{
		$finance_res = getarrayassoc("SELECT * FROM `es_finance_master` WHERE `es_finance_masterid`= $pre_year");
		$from_finance = $finance_res['fi_startdate'];
		$to_finance   = $finance_res['fi_enddate']; 
	}
	if (isset($elid) && $elid!=""){
		// Edit allowence Master
		
		$allowancemasterdetails = $obj_allowancemaster->Get($elid);
		$sel_posts =  "SELECT * FROM `es_deptposts` WHERE es_postshortname='" . $allowancemasterdetails->alw_dept."'";
		$posts_list2 = getamultiassoc($sel_posts);
	
		if (isset($saveallowance) && $saveallowance=='Update'){ 
			$fromdate = formatDateCalender($dc1,"Y-m-d");
			$todate = formatDateCalender($dc2,"Y-m-d");
			$vlc = new FormValidation();
			if ($es_postname==""){
			$errormessage[0]="Please Select Post ";
		}
			if (empty($dc1) || empty($dc2)) {
				$errormessage[1]="Enter Year";	  
			}
			if(empty($allonctype)) {
				$errormessage[2]="Please Enter Allowance Type";	  
			}	
			
			if(!$vlc->is_number($alwamount)){
			  $errormessage[5]="Enter Valid Amount";	
			}else{	
				if($alw_amt_type=='Percentage'){
					if ($alwamount=="" || $alwamount<=0 || $alwamount>100) {
						$errormessage[3]="Enter Allowance Percentage";	  
					}else{
					  $alwamount = number_format($alwamount,2,".","");
					 }
				}
				if($alw_amt_type=='Amount'){
					if ($alwamount=="" || $alwamount<=0) {
					$errormessage[4]="Enter Allowance Amount";	  
					}else{
					  $alwamount = number_format($alwamount,2,".","");
					 }
				}
				}
				$sel_allowance = "SELECT * FROM es_allowencemaster WHERE alw_type ='".$allonctype."' 
					                                                   AND alw_post= '".$es_postname."' 
					                                                   AND alw_dept= '".$st_department."'
																	   AND alw_fromdate BETWEEN '" . $from_finance . "' AND '" . $to_finance . "'
														               AND alw_todate BETWEEN '" . $from_finance . "' AND '" . $to_finance . "' AND es_allowencemasterid!=".$elid;
														   
					$records = sqlnumber($sel_allowance); 
					if($records>=1){$errormessage[6]="Already Exist";}
			if(count($errormessage)==0)
			{
			$db->update('es_allowencemaster', "alw_post ='" . $es_postname . "', alw_type ='" . $allonctype . "',	alw_fromdate ='" . $fromdate . "', alw_todate ='" . $todate . "',	alw_amount ='" . round($alwamount,2) . "', alw_dept ='" . $st_department . "', alw_amt_type ='" . $alw_amt_type . "'",'es_allowencemasterid =' . $elid);
			
			
			 $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_allowencemaster','PAYROLL','CREATE ALLOWANCE TYPE','".$elid."','ALLOWANCE TYPE UPDATED','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);
			header("Location:?pid=29&action=allowencemaster&emsg=2");
			exit();
			}
			}
	}
		// Insert allowence Master
		if (isset($saveallowance) && $saveallowance=='Save'){
		
			$vlc = new FormValidation();
			if (empty($st_department)) {
				$errormessage[0]="Please Select Department";	  
			}
			if (count($seldepartment)==0){
				$errormessage[1]="Please Select Post ";
			}							
			if (empty($allonctype)) {
				$errormessage[2]="Please Enter Allowance Type";	  
			}	
			if (empty($dc1) || empty($dc2)) {
				$errormessage[3]="Enter Year";	  
			}	
		
			if(!$vlc->is_number($alwamount)){
			  $errormessage[5]="Enter Valid Amount";	
			}else{	
				if($alw_amt_type=='Percentage'){
					if ($alwamount=="" || $alwamount<=0 || $alwamount>100) {
						$errormessage[3]="Enter Allowance Percentage";	  
					}else{
					  $alwamount = number_format($alwamount,2,".","");
					 }
				}
				if($alw_amt_type=='Amount'){
					if ($alwamount=="" || $alwamount<=0) {
					$errormessage[4]="Enter Allowance Amount";	  
					}else{
					  $alwamount = number_format($alwamount,2,".","");
					 }
				}
				}
		if (count($errormessage)==0){
			$fromdate = formatDateCalender($dc1,"Y-m-d");
			$todate = formatDateCalender($dc2,"Y-m-d");
			for ($i=0; $i<count($seldepartment);$i++){				
				$obj_allowancemaster = new es_allowencemaster();
				$obj_allowancemaster->alw_dept = $st_department;
				$obj_allowancemaster->alw_post = $seldepartment[$i];
				$obj_allowancemaster->alw_type = $allonctype;
				$obj_allowancemaster->alw_fromdate = $fromdate;
				$obj_allowancemaster->alw_todate = $todate;
				$obj_allowancemaster->alw_amount = round($alwamount,2);
				$obj_allowancemaster->alw_amt_type = $alw_amt_type;
				 $sel_allowance = "SELECT * FROM es_allowencemaster WHERE alw_type ='".$allonctype."' 
					                                                   AND alw_post= '".$seldepartment[$i]."' 
					                                                   AND alw_dept= '".$st_department."'
																	   AND alw_fromdate BETWEEN '" . $from_finance . "' AND '" . $to_finance . "'
														               AND alw_todate BETWEEN '" . $from_finance . "' AND '" . $to_finance . "'";
																	 
					$records = sqlnumber($sel_allowance);
					if( $records >0){
					   header("Location:?pid=29&action=allowencemaster&emsg=82");
				       exit;
					} 
					else{			
					    $insid= $obj_allowancemaster->Save();
						 
						 
						 
						 $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_allowencemaster','PAYROLL','CREATE ALLOWANCE TYPE','".$insid."','ALLOWANCE TYPE ADDED','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);	
						 
						 
					}
					
				}			
				header("Location:?pid=29&action=allowencemaster&emsg=1");
				exit();
		}
    }	
	
    //Displaying Allowence Master List
		//$obj_allowancemaster = new es_allowencemaster();
		$q_limit  = PAGENATE_LIMIT;
		if ( !isset($start))$start = 0;
		
			$no_rows = count($obj_allowancemaster->GetList(array(array("es_allowencemasterId", ">", 0),
		                                                 array("alw_todate", "between", $from_finance." AND ".$to_finance)) ));
																
	
		$orderby_array = array( 'orb1'=>'lev_post', 'orb2'=>'lev_post');
		
		if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
			$orderby = $orderby_array[$column_name];
		}else{
			$orderby = "alw_post";
		}
		if (isset($asds_order)&&$asds_order=='ASC'){
			$order = true;
		}else{
			$order = false;
		}
		
		if (isset($allowance_school_year) && $allowance_school_year=='Submit'){
		$allowancemaster_det = $obj_allowancemaster->GetList(array(array("es_allowencemasterId", ">", 0), 
		                                                   array("alw_todate", "between", "$from_finance AND $to_finance")), 
									                       $orderby, $order,  "$start , $q_limit" );
		}else{ 
		$allowancemaster_det = $obj_allowancemaster->GetList(array(array("es_allowencemasterId", ">", 0), 
		                                                   array("alw_todate", "between", "$from_finance AND $to_finance")), 
									                       $orderby, $order,  "$start , $q_limit" );
			}
		
	}
	//Delete Allowence Master
if($action=='deleteallowencemaster'){
		//$obj_leavemaster = new es_allowencemaster();
		$obj_allowancemaster->es_allowencemasterId = $lid;
		$obj_allowancemaster->Delete();		
		
			 $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_allowencemaster','PAYROLL','CREATE ALLOWANCE TYPE','".$lid."','ALLOWANCE TYPE DELETED','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);
		header("Location:?pid=29&action=allowencemaster&emsg=3");		
		exit();
	}
// End of allowence Master
	
// deductions Master
if ($action=='deductionsmaster'){
if(!isset($deduction_school_year)) {
	$from_finance = $_SESSION['eschools']['from_finance'];
	$to_finance = $_SESSION['eschools']['to_finance'];
}
else{
		$finance_res = getarrayassoc("SELECT * FROM `es_finance_master` WHERE `es_finance_masterid`= $pre_year");
		$from_finance = $finance_res['fi_startdate'];
		$to_finance   = $finance_res['fi_enddate']; 
}
		// Edit Deductions Master
	if (isset($elid) && $elid!=""){
		
		$deductionmasterdetails = $obj_deductionmaster->Get($elid);
		
		$sel_posts =  "SELECT * FROM `es_deptposts` WHERE es_postshortname='" . $deductionmasterdetails->ded_dept."'";
		$posts_list3 = getamultiassoc($sel_posts);
	}
	
	// update deduction master
	if (isset($saveallowance) && $saveallowance=='Update'){
	
	    $vlc = new FormValidation();
		if($es_postname=="")
		{
		$errormessage[0]="Please Select Post ";
		}			
		if (empty($allonctype)) {
			$errormessage[1]="Please Enter Deduction Type";	  
		}	
		if	(empty($dc1) || empty($dc2)) {
			$errormessage[2]="Enter Year";	  
		}	
		    $sel_deduction = "SELECT * FROM es_deductionmaster WHERE ded_post= '" . $es_postname. "' 
					                                                   AND ded_dept= '" . $st_department . "' 
																	   AND ded_type ='" . $allonctype . "'
																	   AND ded_fromdate BETWEEN '" . $from_finance . "' AND '" . $to_finance . "'
														               AND ded_todate BETWEEN '" . $from_finance . "' AND '" . $to_finance . "'AND es_deductionmasterid!=".$elid;
					
					$records = sqlnumber($sel_deduction);
					if($records>=1){$errormessage[6]="Already Exist";} 


		      if(!$vlc->is_number($alwamount)){
			  $errormessage[5]="Enter Valid Amount";	
			}else{	
					if($alw_amt_type=='Percentage')
					{
					if ($alwamount=="" || $alwamount<=0 || $alwamount>100) {
					$errormessage[3]="Enter Correct Deduction Percentage";	  
					}else{
					  $alwamount = number_format($alwamount,2,".","");
					 }
					}
					if($alw_amt_type=='Amount')
					{
					if ($alwamount=="" || $alwamount<=0) {
					$errormessage[4]="Enter Correct Deduction Amount";	  
					}else{
					  $alwamount = number_format($alwamount,2,".","");
					 }
					}
				}
				
		if(count($errormessage)==0)
		{
		
			$fromdate = formatDateCalender($dc1,"Y-m-d");
			$todate = formatDateCalender($dc2,"Y-m-d");
			$db->update('es_deductionmaster', "ded_post ='" . $es_postname . "', ded_type ='" . $allonctype . "',	ded_fromdate ='" . $fromdate . "', ded_todate ='" . $todate . "',	ded_amount ='" . round($alwamount,2) . "', ded_dept ='" . $st_department . "', ded_amt_type ='" . $alw_amt_type . "'",'es_deductionmasterid =' . $elid);
			
				$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_deductionmaster','PAYROLL','CREATE DEDUCTION TYPE','".$elid."','DEDUCTION TYPE UPDATED','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);
	
	
		
			header("Location:?pid=29&action=deductionsmaster&emsg=2");
			exit();	
			
		}		
	}
		// Insert Deduction Master
   		if(isset($saveallowance) && $saveallowance=='Save')
		{		
		$vlc = new FormValidation();
		
		if(empty($st_department)) {
		$errormessage[0]="Please Select Department";	  
		}
		if(count($seldepartment)==0)
		{
		$errormessage[1]="Please Select Post ";
		}				
		if(empty($allonctype)) {
		$errormessage[2]="Please Enter Deduction Type";	  
		}
		if(empty($dc1) || empty($dc2)) {
		$errormessage[3]="Enter Year";	  
		}	
		if(!$vlc->is_number($alwamount)){
			  $errormessage[5]="Enter Valid Amount";	
			}else{	
					if($alw_amt_type=='Percentage')
					{
					if ($alwamount=="" || $alwamount<=0 || $alwamount>100) {
					$errormessage[3]="Enter Correct Deduction Percentage";	  
					}else{
					  $alwamount = number_format($alwamount,2,".","");
					 }
					}
					if($alw_amt_type=='Amount')
					{
					if ($alwamount=="" || $alwamount<=0) {
					$errormessage[4]="Enter Correct Deduction Amount";	  
					}else{
					  $alwamount = number_format($alwamount,2,".","");
					 }
					}
				}
		if(count($errormessage)==0)
		{
				$fromdate = formatDateCalender($dc1,"Y-m-d");
				$todate = formatDateCalender($dc2,"Y-m-d");
				for($i=0;$i<count($seldepartment);$i++)
				{				
					$obj_deductionmaster = new es_deductionmaster();
					$obj_deductionmaster->ded_post = $seldepartment[$i];
					$obj_deductionmaster->ded_dept = $st_department;
					$obj_deductionmaster->ded_type = $allonctype;
					$obj_deductionmaster->ded_fromdate = $fromdate;
					$obj_deductionmaster->ded_todate = $todate;
					$obj_deductionmaster->ded_amount = round($alwamount,2);
					$obj_deductionmaster->ded_amt_type = $alw_amt_type;
					$sel_deduction = "SELECT * FROM es_deductionmaster WHERE ded_post= '" . $seldepartment[$i] . "' 
					                                                   AND ded_dept= '" . $st_department . "' 
																	   AND ded_type ='" . $allonctype . "'
																	   AND ded_fromdate BETWEEN '" . $from_finance . "' AND '" . $to_finance . "'
														               AND ded_todate BETWEEN '" . $from_finance . "' AND '" . $to_finance . "'";
					
					$records = sqlnumber($sel_deduction); 
					if( $records >0){
					   header("Location:?pid=29&action=deductionsmaster&emsg=83");
				       exit();
					} 
					else{
					   $did= $obj_deductionmaster->Save();
					   
					   $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_deductionmaster','PAYROLL','CREATE DEDUCTION TYPE','".$did."','DEDUCTION TYPE ADDED','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);
	
					}	
				}			
				header("Location:?pid=29&action=deductionsmaster&emsg=1");
				exit();
			}
		}
		//Displaying Deduction Master List
		//$obj_leavemaster = new es_deductionmaster();
		$q_limit  = PAGENATE_LIMIT;
		if ( !isset($start))$start = 0;
		$no_rows = count($obj_deductionmaster->GetList(array(array("es_deductionmasterId", ">", 0),
		                                                     array("ded_todate", "between", "$from_finance AND $to_finance")) ));
		$orderby_array = array( 'orb1'=>'lev_post', 'orb2'=>'lev_post');
		if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
			$orderby = $orderby_array[$column_name];
		}else{
			$orderby = "ded_post";
		}
		if (isset($asds_order)&&$asds_order=='ASC'){
			$order = true;
		}else{
			$order = false;
		}
		if (isset($deduction_school_year) && $deduction_school_year=='Submit'){
		$deductionmaster_det = $obj_deductionmaster->GetList(array(array("es_deductionmasterId", ">", 0),
		                                                           array("ded_todate", "between", "$from_finance AND $to_finance")),
																   $orderby, $order,  "$start , $q_limit" );
		}else{   
	    $deductionmaster_det = $obj_deductionmaster->GetList(array(array("es_deductionmasterId", ">", 0),
		                                                           array("ded_todate", "between", "$from_finance AND $to_finance")),
																   $orderby, $order,  "$start , $q_limit" );
			}
	}
	//Delete Deduction Master
if($action=='deletedeductionsmaster')
	{
		//$obj_leavemaster = new es_deductionmaster();
		$obj_deductionmaster->es_deductionmasterId = $lid;
		$obj_deductionmaster->Delete();	
		$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_deductionmaster','PAYROLL','CREATE DEDUCTION TYPE','".$lid."','DEDUCTION TYPE DELETED','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);
		
		header("Location:?pid=29&action=deductionsmaster&emsg=3");		
		exit();
	}
// End of deductions Master
	
// loan Master
if($action=='loanmaster'){
	if(!isset($loan_school_year)) {
	$from_finance = $_SESSION['eschools']['from_finance'];
	$to_finance = $_SESSION['eschools']['to_finance'];
}
else{
		$finance_res = getarrayassoc("SELECT * FROM `es_finance_master` WHERE `es_finance_masterid`= $pre_year");
		$from_finance = $finance_res['fi_startdate'];
		$to_finance   = $finance_res['fi_enddate']; 
}
		// Edit Loan Master
		if(isset($elid) && $elid!="")
		{
		
		$loanmasterdetails = $obj_loanmaster->Get($elid);
		$sel_posts =  "SELECT * FROM `es_deptposts` WHERE es_postshortname='" . $loanmasterdetails->loan_dept."'";
		$posts_list4 = getamultiassoc($sel_posts);
		}
		if(isset($saveallowance) && $saveallowance=='Update')
		{
		$vlc = new FormValidation();
		if($es_postname=="")
		{
		$errormessage[0]="Please Select Post ";
		}
		if(empty($loanname)) {
		$errormessage[2]="Please Enter Loan Name";	  
		}	
		if(empty($dc1) || empty($dc2)) {
		$errormessage[3]="Enter Year";	  
		}	
		if ($intrestrate=="" || $intrestrate<0 || $intrestrate>=100) {
		$errormessage[4]="Enter Correct Interest Percentage";	  
		}else{
			 $intrestrate = number_format($intrestrate,2,".","");
		}		
		if (!$vlc->is_nonNegNumber($alwamount)) {
		$errormessage[5]="Enter Valid Limit";	  
		}	
		
		$sel_deduction = "SELECT * FROM es_loanmaster WHERE loan_post= '" . $es_postname . "' 
					                                              AND loan_dept= '" . $st_department . "' 
																  AND loan_name ='" . $loanname . "'
																  AND loan_fromdate BETWEEN '" . $from_finance . "' AND '" . $to_finance . "'
														          AND loan_todate BETWEEN '" . $from_finance . "' AND '" . $to_finance . "' where es_loanmasterid!=elid";
					
					$records = sqlnumber($sel_deduction); 
					if($records>=1){$errormessage[6]="Already Exist";} 	
		if(count($errormessage)==0)
		{
		$fromdate = formatDateCalender($dc1,"Y-m-d");
		$todate = formatDateCalender($dc2,"Y-m-d");
		$db->update('es_loanmaster', "loan_post ='" . $es_postname . "', loan_type ='Refundable',	loan_name ='" . $loanname . "', loan_fromdate ='" . $fromdate . "', loan_todate ='" . $todate . "', loan_dept ='" . $st_department . "', loan_intrestrate ='" . round($intrestrate,2) . "', loan_maxlimit ='" . round($alwamount,2) . "'",'es_loanmasterid =' . $elid);
		
		
		$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_loanmaster','PAYROLL','CREATE LOAN','".$elid."','LOAN UPDATED','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);
	
	
		
		header("Location:?pid=29&action=loanmaster&emsg=2");
		exit();
		}
		}
		// Insert Loan Master
		if(isset($saveallowance) && $saveallowance=='Save')
		{
		$vlc = new FormValidation();
		if(empty($st_department)) {
		$errormessage[0]="Please Select Department";	  
		}
		if(count($seldepartment)==0)
		{
		$errormessage[1]="Please Select Post ";
		}									
		/*if(empty($loanname)) {
		$errormessage[2]="Please Enter Loan Name";	  
		}	*/
		if(empty($dc1) || empty($dc2)) {
		$errormessage[3]="Enter Year";	  
		}	
		if ($intrestrate=="" || $intrestrate<0 || $intrestrate>=100) {
		$errormessage[4]="Enter Correct Interest Percentage";	  
		}else{
			 $intrestrate = number_format($intrestrate,2,".","");
		}		
		if (!$vlc->is_nonNegNumber($alwamount))  {
		$errormessage[5]="Enter Valid Limit";	  
		}		
		if(count($errormessage)==0)
		{
		
			$fromdate = formatDateCalender($dc1,"Y-m-d");
			$todate = formatDateCalender($dc2,"Y-m-d");
				for($i=0;$i<count($seldepartment);$i++)
				{				
					$obj_loanmaster = new es_loanmaster();
					$obj_loanmaster->loan_post = $seldepartment[$i];
					$obj_loanmaster->loan_type ='Refundable';
					$obj_loanmaster->loan_dept = $st_department;
					$obj_loanmaster->loan_name = $loanname;
					$obj_loanmaster->loan_fromdate = $fromdate;
					$obj_loanmaster->loan_todate = $todate;
					$obj_loanmaster->loan_intrestrate = round($intrestrate,2);	
					$obj_loanmaster->loan_maxlimit = round($alwamount,2);
					$sel_deduction = "SELECT * FROM es_loanmaster WHERE loan_post= '" . $seldepartment[$i] . "' 
					                                              AND loan_dept= '" . $st_department . "' 
																  AND loan_name ='" . $loanname . "'
																  AND loan_fromdate BETWEEN '" . $from_finance . "' AND '" . $to_finance . "'
														          AND loan_todate BETWEEN '" . $from_finance . "' AND '" . $to_finance . "'";
					
					$records = sqlnumber($sel_deduction); 
					if( $records >0){
					   header("Location:?pid=29&action=loanmaster&emsg=18");
				       exit();
					} 
					else{
					     $lnms=$obj_loanmaster->Save();
						 
						 	$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_loanmaster','PAYROLL','CREATE LOAN','".$lnms."','LOAN ADDED','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);
	
	
						 
					}
				}			
				header("Location:?pid=29&action=loanmaster&emsg=1");
				exit();	
			}	
	}
		//Displaying Loan Master List
		//$obj_leavemaster = new es_loanmaster();
		$q_limit  = PAGENATE_LIMIT;
		if ( !isset($start))$start = 0;
		$no_rows = count($obj_loanmaster->GetList(array(array("es_loanmasterId", ">", 0),
		                                                 array("loan_todate", "between", "$from_finance AND $to_finance")) ));
	
		$orderby_array = array( 'orb1'=>'loan_post', 'orb2'=>'loan_type');
		
		if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
			$orderby = $orderby_array[$column_name];
		}else{
			$orderby = "loan_post";
		}
		if (isset($asds_order)&&$asds_order=='ASC'){
			$order = true;
		}else{
			$order = false;
		}
		if (isset($loan_school_year) && $loan_school_year=='Submit'){
		$loanmaster_det = $obj_loanmaster->GetList(array(array("es_loanmasterId", ">", 0),
		                                                  array("loan_todate", "between", "$from_finance AND $to_finance")), 
		                                                  $orderby, $order,  "$start , $q_limit" );
		}else{
		$loanmaster_det = $obj_loanmaster->GetList(array(array("es_loanmasterId", ">", 0),
		                                                  array("loan_todate", "between", "$from_finance AND $to_finance")), 
		                                                  $orderby, $order,  "$start , $q_limit" );
		}
		
	}
	
	
	
	
	//Delete Loan Master
if($action=='deleteloanmaster')
	{
		//$obj_leavemaster = new es_loanmaster();
		$obj_loanmaster->es_loanmasterId = $lid;
		$obj_loanmaster->Delete();		
		
		$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_loanmaster','PAYROLL','CREATE LOAN','".$lid."','LOAN DELETED','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);
		header("Location:?pid=29&action=loanmaster&emsg=3");		
		exit();
	}	
// End of loan Master	
if(isset($gid) && $gid!="")
		{
		$obj_leavemaster = new es_ledger();
		$leavemasterdetails = $obj_leavemaster->Get($gid);
		//array_print($leavemasterdetails); 
		}
		if(isset($Submit) && $Submit=='Update')
		{
		$db->update('es_ledger', "lg_name ='" . $lg_name . "', lg_groupname ='" . $lg_groupname . "',	lg_openingbalance ='" . round($lg_openingbalance,2) . "',lg_amounttype ='" . $lg_amounttype . "'",'es_ledgerid =' . $gid);
		header("Location:?pid=22&action=ledger&emsg=2");
		exit();
		}

// Tax Master
if($action=='taxmaster'){

	$vlc = new FormValidation();

	if(!isset($tax_school_year)) {
		$from_finance = $_SESSION['eschools']['from_finance'];
		$to_finance = $_SESSION['eschools']['to_finance'];
	}
	else{
		$finance_res = getarrayassoc("SELECT * FROM `es_finance_master` WHERE `es_finance_masterid`= $pre_year");
		$from_finance = $finance_res['fi_startdate'];
		$to_finance   = $finance_res['fi_enddate']; 
	} 
	// Edit Tax Master
	if(isset($elid) && $elid!="") {
		$taxmasterdetails = $obj_taxmaster->Get($elid);
	}
	
	if(isset($saveallowance) && $saveallowance=='Update') {
		$errormessage = array();
		
		if(empty($taxname)) {
			$errormessage[0]="Enter Tax Type";	
		}
			/*else{
						
			 $sel_user_sql = "SELECT count(*) FROM `es_taxmaster` WHERE tax_name = ".strtoupper($taxname)." AND es_taxmasterid!=".$elid; 
			 $reg_user_count = $db->getOne($sel_user_sql);
			 if ($reg_user_count>=1) {
				 $errormessage[3] = "Tax Type Already Exist"; 
			}
			}*/
		if(empty($slabratefrom) || empty($slabrateto) || empty($rateamount)) {
			$errormessage[1]="Enter valid Slab Rate's";	
		}
		if(empty($dc1) || empty($dc2)) {
			$errormessage[2]="Select Date of Year";	
		}
		
		if( count($errormessage) == 0) {
			$errormessage = array();
			
			$fromdate = formatDateCalender($dc1,"Y-m-d");
			$todate = formatDateCalender($dc2,"Y-m-d");
			
			 $sel_tax = "SELECT * FROM es_taxmaster WHERE tax_name= '".strtoupper($taxname)."' 
											   AND (tax_from_date BETWEEN '" . $fromdate . "' AND '" . $todate . "'
											   OR tax_to_date BETWEEN '" . $fromdate . "' AND '" . $todate . "' 
											   OR ( tax_from_date < '" . $fromdate . "' AND tax_to_date > '" . $todate . "' ) ) 
											   AND (tax_from BETWEEN '" . $slabratefrom . "' AND '" . $slabrateto . "'
											   OR tax_to BETWEEN '" . $slabratefrom . "' AND '" . $slabrateto . "') 
											   OR tax_from < '" . $slabratefrom . "' AND tax_to > '" . $slabrateto . "') ) 
											   AND es_taxmasterid != '". $elid ."' ";
			$records = sqlnumber($sel_tax);
		
			if( $records >0) {
				$errormessage[0]="This Tax type with the Range & the Date of Year already exists";	
			}
			if( count($errormessage) == 0) {
				$db->update('es_taxmaster', "tax_name ='" . $taxname . "', tax_percentage_type ='" . $allonctype . "',	
											tax_to ='" . $slabrateto . "', tax_from ='" . $slabratefrom . "',
											tax_rate ='" . round($rateamount,2) . "',tax_from_date='".$fromdate."',
											tax_to_date='".$todate."'", 'es_taxmasterid =' . $elid);
											
		// insert logs
		
		
		
						$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_taxmaster','PAYROLL','CREATE TAX','".$elid."','TAX UPDATED','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);
	
				header("Location:?pid=29&action=taxmaster&emsg=2");
				exit();
			}
		}
	}
	
	// Insert Tax Master
	if(isset($saveallowance) && $saveallowance=='Save') {	
		
		$errormessage = array();
		
		if(empty($taxname)) {
			$errormessage[0]="Enter Tax Type";	
		}
		else{
						
			 $sel_user_sql = 'SELECT count(*) FROM `es_taxmaster` WHERE `tax_name` = "'.strtoupper($taxname).'"; '; 
			 $reg_user_count = $db->getOne($sel_user_sql);
			 if ($reg_user_count>=1) {
				 $errormessage[3] = "Tax Name Already Exist"; 
			}
			}?>
			<?php /*?><script type="text/javascript">
			function ValidateCharges( fldid ) //This function will add extra row to provide another file
	{

	 	var mntbl = document.getElementById("maintblrows");
		var tot_nmrws = parseInt(mntbl.rows.length);
		//alert(fldid);
		if( fldid != "") {
			 crosschecknegetive( fldid,0 );
		}

		for( t=1; t <= tot_nmrws; t++ ){
			var to_fld = "slabrateto["+t+"]";
			var to_fld_val = document.getElementById(to_fld).value;
			var frm_fld = "slabratefrom["+t+"]";
			var frm_fld_val = document.getElementById(frm_fld).value;
			var nxt_t = t+1;
			var nxt_frm_fld = "slabratefrom["+nxt_t+"]";
			
			if(to_fld_val=="" || isNaN(to_fld_val)) { 
			
			alert("Invalid Entry for ‘From’ and Invalid Entry for ‘To’  "); return false }
			else if(parseInt(to_fld_val) <= parseInt(frm_fld_val)) { alert("The Value of 'To'  should be greater than "+ parseInt(frm_fld_val)); document.getElementById(to_fld).focus(); return false; }
			
			if(to_fld_val!="" && t!=tot_nmrws)
				document.getElementById(nxt_frm_fld).value = parseInt(to_fld_val) + 1;
			
		}
		return true;
	}</script><?php */?><?php
		
		if(empty($dc1) || empty($dc2)) {
			$errormessage[1]="Select Date of Year";	
		}
		
		$fromdate = formatDateCalender($dc1,"Y-m-d");
		$todate = formatDateCalender($dc2,"Y-m-d");
		
		if( count($errormessage) == 0 && count($slabratefrom) > 0) {
			for ($ig=1; $ig <= count($slabratefrom); $ig++) {
				if($slabratefrom[$ig]!="" && $slabrateto[$ig]!="" && $rateamount[$ig]!="") {
				
					 $sel_tax = "SELECT * FROM es_taxmaster WHERE tax_name= '".strtoupper($taxname)."' 
											   AND (tax_from_date BETWEEN '" . $fromdate . "' AND '" . $todate . "'
											   OR tax_to_date BETWEEN '" . $fromdate . "' AND '" . $todate . "' 
											   OR ( tax_from_date < '" . $fromdate . "' AND tax_to_date > '" . $todate . "' ) ) 
											   AND (tax_from BETWEEN '" . $slabratefrom . "' AND '" . $slabrateto . "'
											   OR tax_to BETWEEN '" . $slabratefrom . "' AND '" . $slabrateto . "') 
											   OR tax_from < '" . $slabratefrom . "' AND tax_to > '" . $slabrateto . "') ) ";
					$records = sqlnumber($sel_tax);
					
					if($records<=0) {
					
						$obj_taxmaster->es_taxmasterId = "";
						$obj_taxmaster->tax_name = strtoupper($taxname);
						$obj_taxmaster->tax_percentage_type = $allonctype;
						$obj_taxmaster->tax_to = $slabrateto[$ig];
						$obj_taxmaster->tax_from = $slabratefrom[$ig];
						$obj_taxmaster->tax_rate = round($rateamount[$ig],2);
						$obj_taxmaster->tax_from_date = $fromdate;
						$obj_taxmaster->tax_to_date = $todate;
					
						$tx_id=$obj_taxmaster->Save();
						
						$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_taxmaster','PAYROLL','CREATE TAX','".$tx_id."','TAX ADDED','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);
						
						
					} else{
					header("Location:?pid=29&action=taxmaster&emsg=84");
			exit();
					}
				}
			}
			header("Location:?pid=29&action=taxmaster&emsg=1");
			exit();
		}
	}
		//Displaying Tax Master List
		//$obj_leavemaster = new es_taxmaster();
		$q_limit  = PAGENATE_LIMIT;
		if (!isset($start))$start = 0;
		
		$no_rows = count($obj_taxmaster->GetList(array(array("es_taxmasterId", ">", 0),
		                                                 array("tax_to_date", "between", "$from_finance AND $to_finance")) ));
		
		$orderby_array = array( 'orb1'=>'tax_name', 'orb2'=>'tax_name');
		if (isset($column_name) && array_key_exists($column_name, $orderby_array)) {
			$orderby = $orderby_array[$column_name];
		}else{
			$orderby = "tax_name";
		}
		if (isset($asds_order) && $asds_order=='ASC'){
			$order = true;
		}else{
			$order = false;
		}
		if (isset($tax_school_year) && $tax_school_year=='Submit'){
			$taxmaster_det = $obj_taxmaster->GetList(array(array("es_taxmasterId", ">", 0),
		                                                 array("tax_to_date", "between", "$from_finance AND $to_finance")),
														 $orderby, $order,  "$start , $q_limit" ); 
		}else{
			$taxmaster_det = $obj_taxmaster->GetList(array(array("es_taxmasterId", ">", 0),
		                                                 array("tax_to_date", "between", "$from_finance AND $to_finance")),
														 $orderby, $order,  "$start , $q_limit" ); 
		}												 
	}
	//Delete Tax Master
	if($action=='deletetaxmaster')
	{
		//$obj_leavemaster = new es_taxmaster();
		$obj_taxmaster->es_taxmasterId = $lid;
		$obj_taxmaster->Delete();		
		// insert logs
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_taxmaster','PAYROLL','CREATE TAX','".$lid."','TAX DELETED','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);
	
		header("Location:?pid=29&action=taxmaster&emsg=3");		
		exit();
	}	
// End of Tax Master

// Pf Master
if($action=='pfmaster'){
if(!isset($pf_school_year)) {
	$from_finance = $_SESSION['eschools']['from_finance'];
	$to_finance = $_SESSION['eschools']['to_finance'];
}
else{
		$finance_res = getarrayassoc("SELECT * FROM `es_finance_master` WHERE `es_finance_masterid`= $pre_year");
		$from_finance = $finance_res['fi_startdate'];
		$to_finance   = $finance_res['fi_enddate']; 
} 
	    // Edit Pf Master
		if(isset($elid) && $elid!="")
		{
		
		$pfmasterdetails = $obj_pfmaster->Get($elid);
		$sel_posts =  "SELECT * FROM `es_deptposts` WHERE es_postshortname='" . $pfmasterdetails->pf_dept."'";
		$posts_list5 = getamultiassoc($sel_posts);
		}
		if(isset($saveallowance) && $saveallowance=='Update')
		{
		$fromdate = formatDateCalender($dc1,"Y-m-d");
		$todate = formatDateCalender($dc2,"Y-m-d"); 
		$vlc = new FormValidation();	
		if($es_postname=="")
		{
		$errormessage[0]="Please Select Post ";
		}		
		if($empconttype=='Percentage' && ($employeercont=="" || $employeercont>100 || $employeercont<=0)) {
		$errormessage[1]="Please Enter Employer Contribution Percentage";	  
		}
		if($empconttype=='Amount' && ($employeercont=="" || $employeercont<=0)) {
		$errormessage[2]="Please Enter Employer Contribution Amount";	  
		}
		if($emyconttype=='Percentage' && ($employeecont=="" || $employeecont>100 || $employeecont<=0)) {
		$errormessage[3]="Please Enter Employee Contribution Percentage";	  
		}
		if($emyconttype=='Amount' && ($employeecont=="" || $employeecont<=0)) {
		$errormessage[4]="Please Enter Employee Contribution Amount";	  
		}
		
		$sel_pf = "SELECT * FROM es_pfmaster WHERE pf_post= '".$es_postname."' 
					                                     AND pf_dept= '".$st_department."'
														 AND pf_from_date BETWEEN '" . $from_finance . "' AND '" . $to_finance . "'
														 AND pf_to_date BETWEEN '" . $from_finance . "' AND '" . $to_finance . "' AND es_pfmasterid!=".elid;
					$records = sqlnumber($sel_pf); 
					if($records>=1){$errormessage[6]="Already Exist";} 
					
		if(count($errormessage)==0)
		{	
		$db->update('es_pfmaster', "pf_post ='" . $es_postname . "', pf_empcont ='" . round($employeecont,2) . "',	pf_empconttype ='" . $emyconttype . "', pf_empycont ='" . round($employeercont,2) . "', pf_dept ='" . $st_department . "', pf_empyconttype ='" . $empconttype . "'", 'es_pfmasterid =' . $elid);
		
		
		$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_pfmaster','PAYROLL','CREATE PF','".$elid."','PF UPDATED','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);
		
		
		
		header("Location:?pid=29&action=pfmaster&emsg=2");
		exit();
		}
		}
		// Insert into Pf Master
		if(isset($saveallowance) && $saveallowance=='Save')
		{
		$vlc = new FormValidation();		
		if(empty($st_department)) {
		$errormessage[0]="Please Select Department";	  
		}
		if(count($seldepartment)==0)
		{
		$errormessage[1]="Please Select Post ";
		}							
		if($empconttype=='Percentage' && ($employeercont=="" || $employeercont>100 || $employeercont<=0)) {
		$errormessage[2]="Please Enter Employer Contribution Percentage";	  
		}
		if($empconttype=='Amount' && ($employeercont=="" || $employeercont<=0)) {
		$errormessage[3]="Please Enter Employer Contribution Amount";	  
		}
		if($emyconttype=='Percentage' && ($employeecont=="" || $employeecont>100 || $employeecont<=0)) {
		$errormessage[4]="Please Enter Employee Contribution Percentage";	  
		}
		if($emyconttype=='Amount' && ($employeecont=="" || $employeecont<=0)) {
		$errormessage[5]="Please Enter Employee Contribution Amount";	  
		}
		if(!isset($dc1) || $dc1=="" ) {
			$errormessage[7]="Enter Year";	  
		}
		if(!isset($dc2) || $dc2=="" ) {
			$errormessage[7]="Enter Year";	  
		}
		if(count($errormessage)==0)
		{	
		       $fromdate = formatDateCalender($dc1,"Y-m-d");
			   $todate = formatDateCalender($dc2,"Y-m-d");					
				for($i=0;$i<count($seldepartment);$i++)
				{				
					$obj_pfmaster = new es_pfmaster();
					$obj_pfmaster->pf_post = $seldepartment[$i];
					$obj_pfmaster->pf_dept = $st_department;
					$obj_pfmaster->pf_empcont = round($employeecont,2);
					$obj_pfmaster->pf_empconttype = $emyconttype;
					$obj_pfmaster->pf_empycont = round($employeercont,2);
					$obj_pfmaster->pf_empyconttype = $empconttype;
					$obj_pfmaster->pf_from_date = $fromdate;
					$obj_pfmaster->pf_to_date = $todate;
					$sel_pf = "SELECT * FROM es_pfmaster WHERE pf_post= '".$seldepartment[$i]."' 
					                                     AND pf_dept= '".$st_department."'
														 AND pf_from_date BETWEEN '" . $from_finance . "' AND '" . $to_finance . "'
														 AND pf_to_date BETWEEN '" . $from_finance . "' AND '" . $to_finance . "'";
					$records = sqlnumber($sel_pf); 
					if( $records >0){
					   header("Location:?pid=29&action=pfmaster&emsg=85");
				       exit();
					} 
					else{
					   $pf_id= $obj_pfmaster->Save();
						
						
					$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_pfmaster','PAYROLL','CREATE PF','".$pf_id."','PF ADDED','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);
		
		
			
					}
				}			
				header("Location:?pid=29&action=pfmaster&emsg=1");
				exit();	
		}	
	}
		//Displaying Loan Master List
		//$obj_leavemaster = new es_pfmaster();
		$q_limit  = PAGENATE_LIMIT;
		if ( !isset($start))$start = 0;
		$no_rows = count($obj_pfmaster->GetList(array(array("es_pfmasterId", ">", 0),
		                                              array("pf_to_date", "between", "$from_finance AND $to_finance")) ));
	
		$orderby_array = array( 'orb1'=>'pf_post', 'orb2'=>'loan_type');
		
		if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
			$orderby = $orderby_array[$column_name];
		}else{
			$orderby = "pf_post";
		}
		if (isset($asds_order)&&$asds_order=='ASC'){
			$order = true;
		}else{
			$order = false;
		}
		if (isset($pf_school_year) && $pf_school_year=='Submit'){
		$pfmaster_det = $obj_pfmaster->GetList(array(array("es_pfmasterId", ">", 0),
		                                             array("pf_to_date", "between", "$from_finance AND $to_finance")), 
		                                             $orderby, $order,  "$start , $q_limit" );
		} else { 
		$pfmaster_det = $obj_pfmaster->GetList(array(array("es_pfmasterId", ">", 0),
		                                             array("pf_to_date", "between", "$from_finance AND $to_finance")), 
		                                             $orderby, $order,  "$start , $q_limit" );
		}
	}
	//Delete Pf Master
	if($action=='deletepfmaster')
	{
		//$obj_leavemaster = new es_pfmaster();
		$obj_pfmaster->es_pfmasterId = $lid;
		$obj_pfmaster->Delete();	
			
			
				$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_pfmaster','PAYROLL','CREATE PF','".$lid."','PF DELETED','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);
		header("Location:?pid=29&action=pfmaster&emsg=3");		
		exit();
	}	
// End of loan Master		
	?>