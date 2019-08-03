<?php

sm_registerglobal('pid', 'action','emsg', 'update', 'fid', 'submit', 'fee_amount', 'admin', 'fee_class', 'fee_instalments','as_sec','as_lastdate','as_name','as_description', 'Submit','as_createdon','as_lastdate','update','es_assid','back', 'particulars','groups','selectclass','amount','instalments', 'updatefeeitem', 'newparticular', 'newamount', 'newinstalment', 'print_id','pre_year');
/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
		header('location: ./?pid=1&unauth=0');
		exit;
	}
	
if (!isset($pre_year)) {
	    $finance_res = getarrayassoc("SELECT *FROM `es_finance_master` ORDER BY `es_finance_masterid` DESC LIMIT 0 , 1 ");
		 $finance_res ['es_finance_masterid']; 
	    $from_finance = $_SESSION['eschools']['from_finance'];
	    $to_finance = $_SESSION['eschools']['to_finance'];
	}else{
		$finance_res = getarrayassoc("SELECT * FROM `es_finance_master` WHERE `es_finance_masterid`= $pre_year");
		$from_finance = $finance_res['fi_startdate'];
		$to_finance   = $finance_res['fi_enddate']; 
	} 
	

$school_details_sel = "SELECT * FROM `es_finance_master` ORDER BY `es_finance_masterid` DESC";
$school_details_res = getamultiassoc($school_details_sel);
$vlc = new FormValidation();

// Add Fields
 $obj_feesmaster = new es_feemaster();
 if ($action == 'createfeetypes' && $Submit=='Save'){	
   	$error_save = 0;
	if($particulars[0]=="" ){
	$error_save++;
	}
	if($amount[0]=="" ){
	$error_save++;
	}elseif(!$vlc->is_nonNegNumber($amount[0])){
	$error_save++;
	}
	if ($groups=='all'){
		$classlist = getallClasses();
	}elseif($selectclass=='all') {
		$classlist = getClasses($groups);
	}else{ 
		for ($i=0; $i<=count($particulars); $i++) {	
			 if ($particulars[$i]!="" && $amount[$i]!="" && $amount[$i]>0){	
			    $obj_feesmaster = new es_feemaster();
				$obj_feesmaster->fee_particular = strtoupper($particulars[$i]);
				$obj_feesmaster->fee_class = $selectclass;
				$obj_feesmaster->fee_amount = round($amount[$i],2);
				$obj_feesmaster->fee_instalments = $instalments[$i];
				$obj_feesmaster->fee_fromdate = $from_finance; 
				$obj_feesmaster->fee_todate = $to_finance; 
				$sel_leave = "SELECT * FROM  es_feemaster WHERE fee_class = '" . $selectclass . "' 
				                                           AND fee_particular  = '" . $particulars[$i] . "' 
														   AND fee_fromdate = '" . $from_finance . "' 
														   AND fee_todate   = '" . $to_finance . "'"; 
					$records = sqlnumber($sel_leave); 
					if( $records >0){
					   header("Location:?pid=17&action=createfeetypes&emsg=18");
				       exit();
					}else {
				    $feadid = $obj_feesmaster->Save();
					$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_feemaster','SET UP','Add Fees','".$feadid."','ADD FEE','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
					
					}
				}
			 }
		}
	
	if (count($classlist)>0){ 
		foreach($classlist as $eachclass){
			for ($i=0; $i<count($particulars); $i++) {
				if($particulars[$i]!="" && $amount[$i]!="" && $amount[$i]>0){	
					$obj_feesmaster = new es_feemaster();
					$obj_feesmaster->fee_particular = strtoupper($particulars[$i]);
					$obj_feesmaster->fee_class = $eachclass['es_classesid'];
					$obj_feesmaster->fee_amount = round($amount[$i],2);
					$obj_feesmaster->fee_instalments = $instalments[$i];
					$obj_feesmaster->fee_fromdate = $from_finance; 
				    $obj_feesmaster->fee_todate = $to_finance; 
					$sel_leave = "SELECT * FROM  es_feemaster WHERE fee_class = '" . $eachclass['es_classesid'] . "'
					                                       AND fee_particular  = '" . $particulars[$i] . "' 
														   AND fee_fromdate = '" . $from_finance . "' 
														   AND fee_todate   = '" . $to_finance . "'";
					$group_records = sqlnumber($sel_leave); 
					if( $group_records >0){
				      header("Location:?pid=17&action=createfeetypes&emsg=18");
					  exit();
					 }else {
					 $obj_feesmaster->Save();
					 $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_feemaster','SET UP','Add Fees','".$feadid."','ADD FEE','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
					}
				}
			}

		} 
	} 
	if ($error_save==0){ 
		$emsg = 10;
		header("Location:?pid=17&action=viewfees&emsg=".$emsg);
		exit;
	}else{ 
		$errormessage[0]="Please Enter valid Data"; 	 
	}

	
	
 }
 
/**********************************************************************
* Get  groups and Classes
**********************************************************************/
//get groups
 $c_groups = get_groups();

//get classes
 if (isset($groups)&& $groups!=""){
	$class_data = getClasses($groups);
  }

  
if ($action=='deletefeeitem'){
	//$obj_feesmaster = new es_feemaster();
	$obj_feesmaster->es_feemasterId = $fid;
	$obj_feesmaster->Delete();
	
	$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_feemaster','Fee Payment','Fee Details','".$fid."','DELETE FEE','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
	
	$emsg = 3;
	header("Location:?pid=17&action=viewfees&emsg=".$emsg);
	exit;	
}

// get details for updating fee item
if ($action == 'edit_feeitem') {
	//$obj_feesmaster = new es_feemaster();
	$es_feemasterdet = $obj_feesmaster->Get($fid);
	//Update fee item
	
}
if ($updatefeeitem == 'Update'){
     
	if ($newamount>0 && $newparticular!=""){
		$db->update('es_feemaster', "fee_particular ='" . strtoupper($newparticular) . "',	fee_amount 	 ='" . round($newamount,2) . "', fee_instalments ='" . $newinstalment . "'", 'es_feemasterid =' . $fid);
		$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_feemaster','Fee Payment','Fee Details','".$fid."','EDIT FEE','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
	header("Location:?pid=17&action=viewfees&emsg=2");
	exit;
	}else{
	$errormessage[0] = "Please enter valid Amount and Particulars";
	}
	
	
 }
  
  
  ?>