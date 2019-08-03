<?php
sm_registerglobal('pid', 'action', 'emsg', 'selectempnum', 'selectloantype', 'saveallowance', 'basicsalary', 'loanintrestrate', 'loanmaxlimit', 'loantotamount', 'totnoofinstalments', 'dedmonth', 'deductionamt', 'selempid', 'selyear', 'selmonth', 'start','checkloantype','vocturetypesel','es_ledger','es_paymentmode','es_bank_name','es_bankacc','es_checkno','es_teller_number','es_bank_pin','es_narration', 'searchuser','pre_year','school_year','es_issueloanid','update','updatepayamount','stfid','balanceamount','staffid','st_department','es_bank_name');

/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}

if(!isset($school_year)) {
	 $from_finance = $_SESSION['eschools']['from_finance'];
	 $to_finance = $_SESSION['eschools']['to_finance'];
}
if(!isset($pre_year)){$pre_year = $_SESSION['eschools']['es_finance_masterid'];}
 if(isset($pre_year)){

		$finance_res = getarrayassoc("SELECT * FROM `es_finance_master` WHERE `es_finance_masterid`= $pre_year");
		 $from_finance = $finance_res['fi_startdate'];
		$to_finance   = $finance_res['fi_enddate']; 
}
$school_details_sel = "SELECT * FROM `es_finance_master` ORDER BY `es_finance_masterid` DESC";
$school_details_res = getamultiassoc($school_details_sel);


$exesqlquery = "SELECT * FROM es_departments";
$getdeptlist = $db->getrows($exesqlquery);


/**End of the permissions   

 **/

// Issue Loan 
	if($action=='issueloan')
	{
	
	$exesqlquery = "SELECT `es_staffid`,`st_firstname`,`st_lastname` FROM `es_staff` WHERE `selstatus`='accepted' AND status='added' AND tcstatus='notissued'";
	$getstafflist = getamultiassoc($exesqlquery);
	if(isset($selectempnum) && $selectempnum!="")
	{
	//echo $selectempnum;
	$dispstaffdetails = get_staffdetails($selectempnum);
		 $school_details_sel = "SELECT * FROM `es_finance_master` ORDER BY `es_finance_masterid` DESC limit 0,1";
$school_details_res = getarrayassoc($school_details_sel);
 $from_finance = $school_details_res['fi_startdate'];
		$to_finance   = $school_details_res['fi_enddate']; 

	
	$exesqlqueryloan = "SELECT * FROM `es_loanmaster` WHERE `loan_post`='" . $dispstaffdetails['st_post'] . "' AND loan_fromdate='".$from_finance."'   AND loan_todate='".$to_finance."' ";
	$disploandetails = getamultiassoc($exesqlqueryloan);
	
		if(isset($selectloantype) && $selectloantype!='')
		{
		$queryloan = "SELECT * FROM `es_loanmaster` WHERE `es_loanmasterid`=".$selectloantype;
		$dispcompdetails = getarrayassoc($queryloan);
		
		}
	}
		// Saving Records
		if (isset($saveallowance) && $saveallowance!=""){	
			
				if ($loantotamount>$loanmaxlimit || $loantotamount<=0 || $loantotamount==""){
					$errormessage[0]="Enter valid Loan Amount";
				}
				if ($checkloantype=="Refundable"){
				if ($totnoofinstalments<=0 || $totnoofinstalments=="" || $totnoofinstalments>241 ){
					$errormessage[1]="Enter No of Installments";
				}
				if ($dedmonth ==""){
					$errormessage[3] = "Select Date"; 
				}		
			
			
			if ($deductionamt ==""){
					$errormessage[9] = "Generate  Deduction Amount"; 
				}}
			$vlc    = new FormValidation();
	if($vocturetypesel==""){$errormessage[7]="Select Voucher Type";}
		   if ($es_ledger=="") {
				$errormessage[8]="Select Ledger";	  
			}
	       if($es_paymentmode==""){
		   		$errormessage[4]="Select Payment Mode";
		   }elseif ($es_paymentmode!="cash"){
				if (!$vlc->is_alpha_numeric($es_checkno)) {
				$errormessage[5]="Enter Cheque Number";	  
				}
				
				if (!$vlc->is_alpha_numeric($es_bankacc)) {
					$errormessage[6]="Enter Bank Number";	  
				}	
		    }
	
			

			if (count($errormessage)==0){
				$stotamt       = $loantotamount+(($loantotamount*$loanintrestrate)/100);
				$spermonthinst = $stotamt/$totnoofinstalments;
				echo $spermonthinst;
				echo $basicsalary;
				if($spermonthinst>$basicsalary)
				{
				$errormessage[2]="Your Basic Salary is less than the instalment Amount";
				}
				if(count($errormessage)==0)
				{
					
					
					
					$sql="select * from es_voucher where es_voucherid=".$vocturetypesel;
	$vocher_details=$db->getRow($sql);
	$es_vouchertype=$vocher_details['voucher_type'];
	$es_vouchermode=$vocher_details['voucher_mode'];
	
					$es_receiptno="loanissue".$tet;
	$vocher_array = array(
							'es_vouchertype' 	=> $es_vouchertype,
							'es_receiptno' => $es_receiptno,
							'es_receiptdate' => date("Y-m-d"),
							'es_paymentmode' => $es_paymentmode,
							'es_bankacc' => $es_bankacc,
							'es_particulars' => $es_ledger,
							'es_amount' => $loantotamount,
							'es_narration' => $es_narration,
							'es_vouchermode' => $es_vouchermode,
							'es_checkno' => $es_checkno,
							'es_teller_number' => $es_teller_number,
							'es_bank_pin' => $es_bank_pin,
							'es_bank_name' => $es_bank_name,
							've_fromfinance' => $from_finance,
							've_tofinance' => $to_finance
						 );
				$vocher_array = stripslashes_deep($vocher_array);
				$payamt=$db->insert("es_voucherentry",$vocher_array);
					
					
				$obj_leavemaster = new es_issueloan();
					$obj_leavemaster->es_staffid = $selectempnum;
					$obj_leavemaster->es_loanmasterid = $selectloantype;
					$obj_leavemaster->loan_intrestrate = $loanintrestrate;
					$obj_leavemaster->loan_amount = $loantotamount;
					$obj_leavemaster->loan_instalments = $totnoofinstalments;
					$obj_leavemaster->deductionmonth = formatDateCalender($dedmonth);	
					$obj_leavemaster->dud_amount = $spermonthinst;	
					$obj_leavemaster->voucherid = $payamt;	
					$obj_leavemaster->amountpaidtillnow = "0";	
					$obj_leavemaster->noofinstalmentscompleted ="0";
					$obj_leavemaster->created_on =date("Y-m-d");
					$tet=$obj_leavemaster->Save();	
					
					
					
					$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_issueloan','PAYROLL','ISSUE LOAN','".$tet."','LOAN ISSUED','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);
	
	
					
				header("Location:?pid=35&action=issueloan&emsg=15");
					exit();
				}				
			}		
		}	
	}	
// End of Issue Loan

// Employee wise pay slip Details
	if($action=='employeewisepayslip')
	{	
	$exesqlquery = "SELECT `es_staffid`,`st_firstname`,`st_lastname` FROM `es_staff` WHERE `selstatus`='accepted' AND status='added' AND tcstatus='notissued'";
	$getstafflist = getamultiassoc($exesqlquery);
		if($searchuser=='Submit')
		{
		
		 if ($st_department==""){
			$errormessage[1]="Please Select Department"; 
			}
			
		  if ($selempid==""){
			$errormessage[0]="Please Select Employee"; 
			}else{
			$staffdetails = get_staffdetails($selempid);
			
			if(dateDiff($staffdetails[st_dateofjoining],$selyear."-".$selmonth."-01")<0)
			{
			$errormessage[1]="No Pay Slip for this Month"; 
			}
			
			}
			 if ($vocturetypesel==""){
			$errormessage[2]="Please Select Voucher Type"; 
			}
			
			 if ($es_ledger==""){
			$errormessage[3]="Please Select Ledger Type"; 
			}
			
			 if ($es_paymentmode==""){
			$errormessage[4]="Please Payment Mode"; 
			}
			$enterpaysql = "SELECT * FROM `es_payslipdetails` WHERE `pay_month`='".$selyear."-".$selmonth."-01' AND `staff_id`=".$selempid;
			
			if(sqlnumber($enterpaysql)==1){
				//$errormessage[2]="Pay Slip already generated for this Month"; 
			}
			  $date_payslip = $selyear."-".$selmonth."-01"; 
		      $today = date('Y-m-d');
			  $date_difference = dateDiff($date_payslip,$today);
			if (isset($date_difference) && $date_difference < 0 ) {
				 $errormessage[3]="You cannot Generate Pay Slip for this month !";
		   }
		    $vlc    = new FormValidation();	
		if ($es_paymentmode=="cheque" || $es_paymentmode=="dd"){
			if (!$vlc->is_alpha_numeric($es_checkno)) {
			$errormessage[4]="Enter Check Number";	  
		}	
		if (!$vlc->is_alpha_numeric($es_bankacc)) {
			$errormessage[5]="Enter Account Number";	  
		}	
	}
			
	   }
	   
	}
			
	
//End of Employee wise pay slip



// Pay slip list
	if($action=='paysliplist'|| $school_year=='Submit' || $action=='print_pslip_list')
	{	
	$q_limit = 10;
	$errMsg = 0;
	if(!isset($start) ){
			$start = 0;
	}	
	$qGetAdmin   = getamultiassoc("SELECT es. * , py. * FROM es_payslipdetails py, es_staff es WHERE es.es_staffid = py.staff_id  
	AND py.pay_month BETWEEN '" . $from_finance . "' AND '" . $to_finance . "'ORDER BY py.pay_month  DESC");
	$no_rows   = count($qGetAdmin);	
	$sql_qry = "SELECT es. * , py. * FROM es_payslipdetails py, es_staff es WHERE es.es_staffid = py.staff_id AND pay_month BETWEEN '" . $from_finance . "' AND '" . $to_finance . "'  ORDER BY py.pay_month DESC LIMIT $start , $q_limit";	
	$paysallist = getamultiassoc($sql_qry);	
	$adminlisturl = "&pre_year=$pre_year&start=$start";
	}
// End of Pay slip list

// Employee wise Print pay slip Details
	if($action=='printpayslip')
	{	
	$exesqlquery = "SELECT `es_staffid`,`st_firstname`,`st_lastname` FROM `es_staff` WHERE `selstatus`='accepted'";
	$getstafflist = getamultiassoc($exesqlquery);
		
		
			if($selempid=="")
			{
			$errormessage[0]="Please Select Employee"; 
			}
			else
			{
			$staffdetails = get_staffdetails($selempid);
			if(dateDiff($staffdetails[st_dateofjoining],$selyear."-".$selmonth."-01")<0)
			{
			$errormessage[1]="No Pay Slip for this Month"; 
			}
			}		
	}
//End of Employee wise Print pay slip


// list all loan issues list



if($action=='loanissueslist' || $action=='print_loan_list')
	{
	$q_limit = 15;
	$errMsg = 0;
	if(!isset($start) ){
			$start = 0;
	}	
 $sql="select lm.loan_name,lm.loan_maxlimit,isl.es_staffid,lm.loan_intrestrate,isl.loan_amount,isl.created_on,isl.loan_instalments,isl.deductionmonth,isl.amountpaidtillnow,isl.noofinstalmentscompleted,isl.es_issueloanid ,isl.dud_amount from es_issueloan isl,es_loanmaster lm where lm.es_loanmasterid=isl.es_loanmasterid";
	$norows=$db->getrows($sql);
	$no_rows=count($norows);
	
 	$sql_list="select lm.loan_name,lm.loan_maxlimit,isl.es_staffid,isl.created_on,lm.loan_intrestrate,isl.loan_amount,isl.loan_instalments,isl.deductionmonth,isl.amountpaidtillnow,isl.noofinstalmentscompleted ,isl.es_issueloanid ,isl.dud_amount from es_issueloan isl,es_loanmaster lm where lm.es_loanmasterid=isl.es_loanmasterid ORDER BY isl.es_issueloanid DESC LIMIT $start , $q_limit";
	
	$issueslist=$db->getrows($sql_list);
	
	}
	
	
	if (isset($update) && $update!=""){	
			
				if ($loantotamount>$loanmaxlimit || $loantotamount<=0 || $loantotamount==""){
					$errormessage[0]="Enter valid Loan Amount";
				}
			
				if ($totnoofinstalments<=0 || $totnoofinstalments=="" || $totnoofinstalments>241 ){
					$errormessage[1]="Enter No of Installments";
				}
				if ($dedmonth ==""){
					$errormessage[3] = "Select Date"; 
				}	
			if ($deductionamt ==""){
					$errormessage[4] = "Click generate to Deduction "; 
				}else{
				if($deductionamt>$basicsalary){
				$errormessage[5] = " Deduction amount should be less than salary"; 
				}
				}
				
				$vlc    = new FormValidation();
	if($vocturetypesel==""){$errormessage[7]="Select Voucher Type";}
		   if ($es_ledger=="") {
				$errormessage[8]="Select Ledger";	  
			}
	       if($es_paymentmode==""){
		   		$errormessage[4]="Select Payment Mode";
		   }elseif ($es_paymentmode!="cash"){
				if (!$vlc->is_alpha_numeric($es_checkno)) {
				$errormessage[5]="Enter Cheque Number";	  
				}
				
				if (!$vlc->is_alpha_numeric($es_bankacc)) {
					$errormessage[6]="Enter Bank Number";	  
				}	
		    }
			if($errormessage==0){
			$dedmonth=func_date_conversion("d/m/Y","Y-m-d",$dedmonth);
			echo  $db->update('es_issueloan', "loan_amount ='" . $loantotamount . "',loan_instalments ='" . $totnoofinstalments . "',deductionmonth ='" . $dedmonth . "',dud_amount ='" . $deductionamt . "'", 'es_issueloanid =' . $es_issueloanid);
			

/*				
			$sd=explode('(',$vocturetypesel);
			$v_type= $sd[0];
			$t=$sd[1];
			$v_mode= rtrim($t,')');*/

		echo $es_paymentmode;
	
			//$es_receiptno="loanissue".$es_issueloanid;
		$sql="select * from es_voucher where es_voucherid=".$vocturetypesel;
		//$sql="select * from es_voucher where voucher_type='".$sd."' and voucher_mode = '".$v_mode."'";
			$online_sql="select * from es_issueloan where es_issueloanid=".$es_issueloanid;
		 $online_row=$db->getRow($online_sql);	
				$vocher_det="select * from es_voucherentry where es_voucherentryid='".$online_row['voucherid']."'";
	$voch=$db->getrow($vocher_det);
	


		
	//$vocher_details=$db->getRow($sql);
	$es_vouchertype=$vocher_details['voucher_type'];
	$es_vouchermode=$vocher_details['voucher_mode'];
			$dd=date("Y-m-d");
			
  //$query="update es_voucherentry set es_vouchertype ='" . $es_vouchertype. "',es_receiptdate ='" . $dd . "',es_paymentmode='" . $es_paymentmode . "',es_bankacc='" . $es_bankacc . "',es_particulars='" . $es_ledger . "',es_amount='" . $loantotamount . "',es_vouchermode='" . $es_vouchermode . "',es_checkno='" . $es_checkno . "',es_teller_number='" . $es_teller_number . "',es_bank_pin='" . $es_bank_pin . "',es_bank_name='" . $es_bank_name . "',es_narration='" . $es_narration . "' where es_voucherentryid=".$online_row['voucherid'];
				
				//mysql_query($query);
			
			// insert logs
			
			$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_issueloan','PAYROLL','LOAN ISSUES LIST','".$es_issueloanid."','LOAN AMOUNT UPDATED','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);
			
		header("Location:?pid=35&action=loanissueslist&start=$start&emsg=2");
	 		exit;
			}
			}


if($action=="editloan" ){
$sql="select lm.loan_name,lm.loan_maxlimit,isl.es_staffid,isl.es_issueloanid,lm.loan_intrestrate,isl.loan_amount,isl.loan_instalments,isl.deductionmonth,isl.amountpaidtillnow,isl.noofinstalmentscompleted,isl.es_issueloanid,lm.loan_type ,isl.dud_amount from es_issueloan isl,es_loanmaster lm where lm.es_loanmasterid=isl.es_loanmasterid and isl.es_issueloanid=".$es_issueloanid;
	$loandetail=$db->getrow($sql);

	//if(!$_POST){
	$dedmonth=func_date_conversion("Y-m-d","d/m/Y",$loandetail['deductionmonth']);
	$totnoofinstalments=$loandetail['loan_instalments'];
	$loantotamount=$loandetail['loan_amount'];
	$deductionamt=$loandetail['dud_amount'];
	

	$reno="loanissue".$es_issueloanid;
	
	$vocher_det="select * from es_voucherentry where es_receiptno='".$reno."'";
	$voch=$db->getrow($vocher_det);
	
	 $sql="select * from es_voucher where voucher_type='".$voch['es_vouchertype']."'";
	$vocher_details=$db->getRow($sql);
	
		 $online_sql="select * from es_issueloan where es_issueloanid=".$es_issueloanid;
		 $online_row=$db->getRow($online_sql);	
				$vocher_det1="select * from es_voucherentry where es_voucherentryid='".$online_row['voucherid']."'";
	$voch1=$db->getrow($vocher_det1);
	
	

	
$es_paymentmode=$voch['es_paymentmode'];
$vocturetypesel=$vocher_details['es_voucherid'];
$es_ledger=$voch['es_particulars'];
$es_bank_name=$voch['es_bank_name'];
	
$es_bankacc=$voch['es_bankacc'];
$es_checkno=$voch['es_checkno'];
$es_teller_number=$voch['es_teller_number'];
$es_bank_pin=$voch['es_bank_pin'];
$es_narration=$voch1['es_narration'];
	
	//}


}

if($action=="viewloan" || $action=='print_loan_details'){
$sql="select lm.loan_name,lm.loan_maxlimit,isl.es_staffid,lm.loan_intrestrate,isl.loan_amount,isl.loan_instalments,isl.deductionmonth,isl.created_on,isl.amountpaidtillnow,isl.noofinstalmentscompleted,isl.es_issueloanid,lm.loan_type ,isl.dud_amount from es_issueloan isl,es_loanmaster lm where lm.es_loanmasterid=isl.es_loanmasterid and isl.es_issueloanid=".$es_issueloanid;

$viewloandetails=$db->getrow($sql);

$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_issueloan','PAYROLL','LOAN ISSUES LIST','".$es_issueloanid."','LOAN VIEWED','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);
	

//array_print($viewloandetails);
	

}

if($action=="viewloanpayment" ){
$sql="select lm.loan_name,lm.loan_maxlimit,isl.es_staffid,lm.loan_intrestrate,isl.loan_amount,isl.loan_instalments,isl.deductionmonth,isl.created_on,isl.amountpaidtillnow,isl.noofinstalmentscompleted,isl.es_issueloanid,lm.loan_type ,isl.dud_amount from es_issueloan isl,es_loanmaster lm where lm.es_loanmasterid=isl.es_loanmasterid and isl.es_issueloanid=".$es_issueloanid;

$viewloandetails=$db->getrow($sql);

$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_issueloan','PAYROLL','LOAN ISSUES LIST','".$es_issueloanid."','LOAN VIEWED','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);
	

//array_print($viewloandetails);
	

}


//payamount
if(isset($updatepayamount) && $updatepayamount!=""){

 $vlc    = new FormValidation();	
		if ($es_paymentmode!="cash"){
			if (!$vlc->is_alpha_numeric($es_checkno)) {
			$errormessage[4]="Enter Check Number";	  
		}	
		if (!$vlc->is_alpha_numeric($es_bankacc)) {
			$errormessage[5]="Enter Account Number";	  
		}	
	}
	
	if(count($errormessage)==0){
	$sql="select * from es_voucher where es_voucherid=".$vocturetypesel;
	$vocher_details=$db->getRow($sql);
	$es_vouchertype=$vocher_details['voucher_type'];
	$es_vouchermode=$vocher_details['voucher_mode'];

	$sql_loan="select loan_instalments,dud_amount,noofinstalmentscompleted ,amountpaidtillnow from es_issueloan where es_issueloanid=".$es_issueloanid;
	$issueloan_details=$db->getRow($sql_loan);
	
	$payamountcount=($issueloan_details['loan_instalments']-$issueloan_details['noofinstalmentscompleted']);
	
	//echo $payamountcount;
 	$inst_amount=$issueloan_details['dud_amount'];
 	$es_issueloanid=$es_issueloanid;
	 $noofinstalmentscompleted=$issueloan_details['loan_instalments'];
	 $amountpaidtillnow=$balanceamount+$issueloan_details['amountpaidtillnow'];
	
	
	$db->update('es_issueloan', "amountpaidtillnow ='" . $amountpaidtillnow . "',noofinstalmentscompleted ='" . $noofinstalmentscompleted . "'", 'es_issueloanid =' . $es_issueloanid);
	$es_receiptno="loan".$staffid;
	$vocher_array = array(
							'es_vouchertype' 	=> $es_vouchertype,
							'es_receiptno' => $es_receiptno,
							'es_receiptdate' => date("Y-m-d"),
							'es_paymentmode' => $es_paymentmode,
							'es_bankacc' => $es_bankacc,
							'es_particulars' => $es_ledger,
							'es_amount' => $balanceamount,
							'es_narration' => $es_narration,
							'es_vouchermode' => $es_vouchermode,
							'es_checkno' => $es_checkno,
							'es_teller_number' => $es_teller_number,
							'es_bank_pin' => $es_bank_pin,
							'es_bank_name' => $es_bank_name,
							've_fromfinance' => $from_finance,
							've_tofinance' => $to_finance
						 );
				$vocher_array = stripslashes_deep($vocher_array);
				$payamt=$db->insert("es_voucherentry",$vocher_array);
				
				
				$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_issueloan','PAYROLL','LOAN ISSUES LIST','".$payamt."','AMOUNT PAYED','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);
	
	
	

	for($i=1;$i<=$payamountcount;$i++){
	$loanpay_array = array(
							'es_issueloanid' 	=> $es_issueloanid,
							'inst_amount' => $inst_amount,
							'onmonth' => date("Y-m-d")
						 );
				$vocher_array = stripslashes_deep($loanpay_array);
				$db->insert("es_loanpayment",$loanpay_array);
	}
	header("Location:?pid=35&action=loanissueslist&start=$start&emsg=2");
	 		exit;
	
	}
}

if($action=="payamount" ){
$sql="select lm.loan_name,lm.loan_maxlimit,isl.es_staffid,lm.loan_intrestrate,isl.loan_amount,isl.loan_instalments,isl.deductionmonth,isl.amountpaidtillnow,isl.noofinstalmentscompleted,isl.es_issueloanid,lm.loan_type ,isl.dud_amount from es_issueloan isl,es_loanmaster lm where lm.es_loanmasterid=isl.es_loanmasterid and isl.es_issueloanid=".$es_issueloanid;
$viewloandetails=$db->getrow($sql);
//array_print($viewloandetails);
}



?>