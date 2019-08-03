<?php
sm_registerglobal('pid', 'action','emsg', 'update', 'start', 'fmid', 'fine_amount','fine_type','save_fine' ,'es_classesid','search_fee','pre_year','inst_id','fine_name','es_classesid','es_preadmissionid','add_otherfee_submit','sid','ofid','balance','export_hostel_charges','es_bank_name','es_bankacc','es_checkno','es_teller_number','es_bank_pin','vocturetypesel','es_ledger','eq_paymode','receive_amount','amount_paid','deduction_allowed','dueamount','remarks','dc1','dc2','search_all_otherfines','std_count','ofid','created_on','waived_amount','paid_amount','submit_old_balance','balance','obpid','search_oldbal','symbol','old_balance','newa','ofid');


/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
$school_details_sel = "SELECT * FROM `es_finance_master` ORDER BY `es_finance_masterid` DESC";
$school_details_res = getamultiassoc($school_details_sel);
$html_obj = new html_form();
$vlc = new FormValidation();
if(isset($pre_year) && $pre_year!=""){
        $finance_res = getarrayassoc("SELECT * FROM `es_finance_master` WHERE `es_finance_masterid`= $pre_year");
		$from_finance = $finance_res['fi_startdate'];
		$to_finance   = $finance_res['fi_enddate']; 
		$from_acad    = $finance_res['fi_ac_startdate'];
		$to_acad      = $finance_res['fi_ac_enddate'];
}else{

       $from_acad    = $_SESSION['eschools']['from_acad'];
	   $to_acad      = $_SESSION['eschools']['to_acad'];
	   $from_finance = $_SESSION['eschools']['from_finance'];
	   $to_finance   = $_SESSION['eschools']['to_finance']; 

}
		
if($action=='addfine'){
		$fine_master_det = $db->getrow("SELECT * FROM es_fine_master ORDER BY es_fine_masterid LIMIT 0,1");
		if(isset($save_fine) && $save_fine!=""){

		//echo $fine_type;exit;
	//	echo $fine_type;exit;
/*				if($fine_type=='Percentage' && ($fine_amount=="" || $fine_amount>100 || $fine_amount<=0)) {
					$errormessage[1]="Please Enter Valid Percentage";	  
					}*/
					if($fine_amount=="" || $fine_amount<0) {
					$errormessage[2]="Please Enter Valid Amount";	  
					}
					if(count($errormessage)==0){
							$today = date('Y-m-d');
							if(isset($fmid) && $fmid>0){
									$db->update("es_fine_master","fine_amount='".$fine_amount."',fine_type='Amount',created_on='".$today."'","es_fine_masterid=".$fmid);
									
									$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_fine_master','SET UP','Late Fee Fine','".$fmid."','EDIT FINE','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
	
									header("location:index.php?pid=79&action=addfine&emsg=2");
									exit;
							}else{
									$fine_master_arr = array("fine_amount"=>$fine_amount,"fine_type"=>'Amount',"created_on"=>$today);
									$fine_master_arr = stripslashes_deep($fine_master_arr);
									$fineadid = $db->insert("es_fine_master",$fine_master_arr);
									$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_fine_master','SET UP','Late Fee Fine','".$fineadid."','ADD FINE','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
									header("location:index.php?pid=79&action=addfine&emsg=1");
									exit;
							}
					
					}
		
		}
		
		


}

if($action=='add_lastdate'){
		
		
		if(isset($save_fine) && $save_fine!=""){
		
				if(count($errormessage) == 0){
				
				$today = date('Y-m-d');
						for($i=0;$i<12;$i++){ 
							$newa ='ins_last_date'.$i;
							$hiden ='inst_id'.$i;
							
							if($_POST[$newa]!=""){
							$value = func_date_conversion("d/m/Y","Y-m-d",$_POST[$newa]);
							
							}else{
							$value ='0000-00-00';
							}
							
							$st= $i+1;
							if(isset($_POST[$hiden]) && $_POST[$hiden] !=""){
							
							 $id = $_POST[$hiden];
							$db->update("es_fee_inst_last_date","es_finance_masterid='".$pre_year."',last_date='".$value."'","inst_id=".$id);
							if($value!='0000-00-00'){
							$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_fee_inst_last_date','SET UP','Fee Due Date','".$id."','EDIT LAST DATE FOR INSTALLMENT','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
	}
							}else{
							$inst_arr = array("es_finance_masterid"=>$pre_year,"instalment_no"=>$st,"last_date"=>$value,"created_on"=>$today);
							array_print($inst_arr); 
							$dateadid = $db->insert("es_fee_inst_last_date",$inst_arr);
							
							$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_fee_inst_last_date','SET UP','Fee Due Date','".$dateadid."','ADD LAST DATE FOR INSTALLMENT','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
							
							}
							}
				
				
				header("location:index.php?pid=79&action=add_lastdate&search_fee=submit&emsg=1$PageUrl");
				exit;
			}
		
		}
}


if($action=='add_otherfines'){
	
		$all_classes = $db->getrows("SELECT * FROM es_classes");
		foreach($all_classes as $each){
			$classes_arr[$each['es_classesid']] = $each['es_classname'];
		}
		if($es_classesid!="") {
	    		$sel_stds = "SELECT * FROM es_preadmission  WHERE pre_class = $es_classesid 
						AND pre_status!= 'inactive' AND status!='inactive' AND pre_fromdate='".$_SESSION['eschools']['from_acad']."' AND pre_todate='".$_SESSION['eschools']['to_acad']."' ";
					$allstudents = $db->getRows($sel_stds);
		}
		if(isset($add_otherfee_submit) && $add_otherfee_submit!=""){
		        
				//array_print($es_preadmissionid);
				if($fine_name==""){$errormessage[0]="Enter Fine Type";}
				if(!$vlc->is_nonNegNumber($fine_amount)){$errormessage[1]="Enter Valid Amount";}
				if($created_on==""){$errormessage[2]="Please Select Date";}
				if(count($es_preadmissionid)==0){$errormessage[3]="Please Check atleast one";}
			
				if(count($errormessage)==""){
				$id_arr = array_values($es_preadmissionid);
						for($i=0;$i<count($id_arr);$i++){
						
						
								$other_fine_arr = array("es_preadmissionid"=>$id_arr[$i],
														"fine_name"=>$fine_name,
														"fine_amount"=>$fine_amount,
														"created_on"=>func_date_conversion("d/m/Y","Y-m-d",$created_on),
														"balance"=>$fine_amount
														);
								$other_fine_arr = stripslashes_deep($other_fine_arr);
									
								$db->insert("es_other_fine_dettails",$other_fine_arr);
								$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_other_fine_dettails','Fee Payment','Add Other Fine','".$id_arr[$i]."','ADD OTHER FINE TO STUDENT','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);					
						    }
						
						header("location:index.php?pid=79&action=add_otherfines&emsg=1");
						exit;
				}
		}
		
}

if($action=='view_list' || $action=='print_list'){
		$condition = "";
		if(isset($search_all_otherfines) && $search_all_otherfines!=""){
			$PageUrl = "&search_all_otherfines=$search_all_otherfines";
			if(isset($dc1) && $dc1!=""){$from = func_date_conversion("d/m/Y","Y-m-d",$dc1);}
			if(isset($dc2) && $dc2!=""){$to = func_date_conversion("d/m/Y","Y-m-d",$dc2);}
			
			if($from!="" && $to!=""){
				$condition .= " AND fd.created_on BETWEEN '".$from."' AND '".$to."'";
				$PageUrl .="&dc1=$dc1&dc2=$dc2";
			}
			if($from!="" && $to==""){
				$condition .= " AND fd.created_on >= '".$from."' ";
				$PageUrl .="&dc1=$dc1";
			}
			if($from=="" && $to!=""){
				$condition .= " AND fd.created_on <= '".$to."' ";
				$PageUrl .="&dc2=$dc2";
			}
			if($vlc->is_allnumbers($es_preadmissionid)){
				$condition .= " AND fd.es_preadmissionid = '".$es_preadmissionid."' ";
				$PageUrl .="&es_preadmissionid=$es_preadmissionid";
			}
			if($fine_name!=""){
				$condition .= " AND fd.fine_name LIKE '%".$fine_name."%' ";
				$PageUrl .="&fine_name=$fine_name";
			}
			
		
		
		}
		$sel_qry = "SELECT fd.*,pre.pre_name,pre.pre_class FROM es_other_fine_dettails fd , es_preadmission pre  WHERE fd.es_preadmissionid = pre.es_preadmissionid  ".$condition." ";
		$no_rows = sqlnumber($sel_qry);
		if(!isset($start)){$start=0;}
		$q_limit = 20;
		$sel_qry .="  ORDER BY fd.otherfine_id LIMIT ".$start.",".$q_limit."";
		$fine_charged_det = $db->getrows($sel_qry);
		
		//$totals_all_det = $db->getrow("SELECT SUM(fine_amount) , SUM(paid_amount) , SUM(deduction_allowed) FROM  es_other_fine_dettails");
		
}

if($action=='print_list11'){
		$sel_qry = "SELECT fd.*,pre.pre_name ,cls.es_classname FROM es_other_fine_dettails fd , es_preadmission pre ,es_classes cls WHERE fd.es_preadmissionid = pre.es_preadmissionid AND pre.pre_class = cls.es_classesid GROUP BY fd.es_preadmissionid ORDER BY fd.otherfine_id ";
		$fine_charged_det = $db->getrows($sel_qry);
		
		$totals_all_det = $db->getrow("SELECT SUM(fine_amount) , SUM(paid_amount) , SUM(deduction_allowed) FROM  es_other_fine_dettails");
		
		$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_other_fine_dettails','Fee Payment','View Fine Charged','','VIEW OTHER FINE DETAILS','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);	
		
}
if($action=='view_student_details' || $action=='print_student_details'){
	$sel_studentwise_rec = "SELECT * FROM es_other_fine_dettails WHERE es_preadmissionid=".$sid;
	$studentwise_det = $db->getrows($sel_studentwise_rec);
	$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_other_fine_dettails','Fee Payment','View Fine Charged','".$sid."','VIEW/PRINT OTHER FINE DETAILS','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
}

if($action=='payamount' || $action=='receipt'){
	$payamount_details = $db->getrow("SELECT * FROM es_other_fine_dettails WHERE otherfine_id=".$ofid);
	$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_other_fine_dettails','Fee Payment','View Fine Charged','".$ofid."','VIEW/RECEIPT PRINT FOR OTHER FINE DETAILS','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
	
}

if(isset($receive_amount) && $receive_amount!=''){
	        //array_print($_POST);
			$vlc    = new FormValidation();	
			
			if(isset($amount_paid) && $amount_paid!="" ){
				if(!$vlc->is_nonNegNumber($amount_paid) ){
					$errormessage[0]="Enter valid amount";
				}
			}
			if(isset($deduction_allowed) && $deduction_allowed!="" ){
				if(!$vlc->is_nonNegNumber($deduction_allowed) ){
					$errormessage[1]="Enter valid deduction amount";
				}
			}
			
			if($eq_paymode==""){ $errormessage[2]="Select Payment Mode";}
	        elseif ($eq_paymode!="cash"){
				if (!$vlc->is_alpha_numeric($es_checkno)) {
				$errormessage[3]="Enter Cheque Number";	  
				}
				
				if (!$vlc->is_alpha_numeric($es_bankacc)) {
					$errormessage[4]="Enter Bank Number";	  
				}	
		    }
	
			if($vocturetypesel==""){$errormessage[5]="Select Voucher Type";}
		
		   if ($es_ledger=="") {
				$errormessage[6]="Select Ledger";	  
			}	
			$total_receive = $amount_paid+$deduction_allowed;
			if($dueamount!=$total_receive){$errormessage[7]="Total Amount + Deduction should be equal to Due Amount";}
			
			if(count($errormessage)==0){
					$db->update("es_other_fine_dettails","paid_amount='".$amount_paid."',deduction_allowed='".$deduction_allowed."',paid_on='".date("Y-m-d")."',balance=0,remarks='".$remarks."'","otherfine_id=".$ofid);
					
					$sel_paidin_amount = "SELECT 
				sum(CASE es_vouchermode WHEN 'paidin' THEN es_amount ELSE 0 END)AS paidintotal,
				sum(CASE es_vouchermode WHEN 'paidout' THEN es_amount ELSE 0 END)AS paidouttotal
				FROM es_voucherentry  "; 
				$sel_amount_exe = getarrayassoc($sel_paidin_amount);
				$paidintotal=$sel_amount_exe['paidintotal'];
				$paidouttotal=$sel_amount_exe['paidouttotal'];
				$diffamount = $paidintotal - $paidouttotal;
				//if ($diffamount>=$tr_amount_paid){
					
					 
						 $obj_voucherentry = new es_voucherentry();
						 $vocturedetails = voucherid_finance($vocturetypesel);
						 $obj_voucherentry->es_vouchertype = $vocturedetails['voucher_type'];
						 $obj_voucherentry->es_receiptno   = "other_fine".$ofid;
						 $obj_voucherentry->es_paymentmode = $eq_paymode;
						 $obj_voucherentry->es_bankacc	   = $es_bankacc;
						 $obj_voucherentry->es_particulars = $es_ledger;
						 $obj_voucherentry->es_amount	   = round($amount_paid,2); 
			
			            
						 $obj_voucherentry->es_bank_pin      = $es_bank_pin;
						 $obj_voucherentry->es_bank_name     = $es_bank_name;
						 $obj_voucherentry->es_teller_number = $es_teller_number;
			
						 //$obj_voucherentry->es_narration   = $es_narration;
						 $obj_voucherentry->es_vouchermode = $vocturedetails['voucher_mode'];
						 $obj_voucherentry->es_checkno     = $es_checkno;
						 $obj_voucherentry->es_receiptdate = date('Y-m-d H:i:s');
						 $obj_voucherentry->ve_fromfinance = $_SESSION['eschools']['from_finance'];
						 $obj_voucherentry->ve_tofinance   = $_SESSION['eschools']['to_finance'];
						 
						 $es_voucherentryid = $obj_voucherentry->Save();
						 
						 
						 echo	$misc_edit="UPDATE es_other_fine_dettails SET paid_amount='".$amount_paid."',deduction_allowed='".$deduction_allowed."',paid_on='".date("Y-m-d")."',balance=0,remarks='".$remarks."', voucherid ='".$es_voucherentryid."' WHERE 	otherfine_id ='".$ofid."'";
						 mysql_query($misc_edit);
						 
						 
						 
						 $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_other_fine_dettails','Fee Payment','View Fine Charged','','PAY OTHER FINE','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
						 
					header("location:index.php?pid=79&action=view_list&emsg=50");
					
			//}
			}
			
			
			
	
	}
/// Oldbalances List
if($action=='view_oldbalances' || $action =='print_oldbalancelist'){
		if(isset($search_oldbal) && $search_oldbal){
			$PageUrl .= "&search_oldbal=$search_oldbal";
			if(isset($sid) && $sid>0){	$condition = " AND studentid='".$sid."'"; $PageUrl .= "&sid=$sid";}
			if(isset($old_balance) && $old_balance>0){	
			$PageUrl .= "&symbol=$symbol&old_balance=$old_balance";
			
			 $condition .= " AND old_balance ".$symbol." '".$old_balance."'"; $PageUrl .= "&sid=$sid";}
		
		}

  $sel_qry = "SELECT fd.*,pre.pre_name,pre.pre_class  FROM es_old_balances fd , es_preadmission pre , es_preadmission_details det   WHERE fd.studentid = pre.es_preadmissionid AND det.es_preadmissionid = pre.es_preadmissionid AND det.pre_fromdate ='".$from_acad."'  AND fd.old_balance>0 ".$condition." ";
//,SUM(OBP.paid_amount),SUM(OBP.waived_amount) , es_old_balace_paid OBP AND fd.ob_id = OBP.ob_id
		$no_rows = sqlnumber($sel_qry);
		if(!isset($start)){$start=0;}
		$q_limit = 20;
		$sel_qry .="  ORDER BY fd.ob_id LIMIT ".$start.",".$q_limit."";
		$oldbalances_det = $db->getrows($sel_qry);
		if($pre_year!=""){
		$PageUrl .= "&pre_year=$pre_year";
		}
		
}

if($action=='pay_oldbalance'){
$sql = "SELECT * FROM es_old_balances WHERE ob_id = '".$ofid."'";
    $balance_det = $db->getrow($sql);
	if(isset($submit_old_balance) && $submit_old_balance!=""){
	   $vlc    = new FormValidation();	
	
		    $total_receive = $paid_amount+$waived_amount;
			if($total_receive<=0){$errormessage[0]="Please enter valid amount or deduction";
			}
			
			if($eq_paymode==""){ $errormessage[2]="Select Payment Mode";}
	        elseif ($eq_paymode!="cash"){
				if (!$vlc->is_alpha_numeric($es_checkno)) {
				$errormessage[3]="Enter Cheque Number";	  
				}
				
				if (!$vlc->is_alpha_numeric($es_bankacc)) {
					$errormessage[4]="Enter Bank Number";	  
				}	
		    }
	
			if($vocturetypesel==""){$errormessage[5]="Select Voucher Type";}
		
		   if ($es_ledger=="") {
				$errormessage[6]="Select Ledger";	  
			}
			//print_r($errormessage);	
			
			if(count($errormessage)==0){
					$obpaid_arr = array("ob_id"=>$ofid,"paid_amount"=>$paid_amount,"waived_amount"=>$waived_amount,"paid_on"=>date("Y-m-d"));
					$obpaid_arr = stripslashes_deep($obpaid_arr);
					$bid = $db->insert("es_old_balances_paid",$obpaid_arr);
					
					$db->update("es_old_balances","last_paid_dt='".date("Y-m-d")."',balance=balance-('".$paid_amount."'+'".$waived_amount."')","ob_id=".$ofid);
					
					$obj_voucherentry = new es_voucherentry();
						 $vocturedetails = voucherid_finance($vocturetypesel);
						 $obj_voucherentry->es_vouchertype = $vocturedetails['voucher_type'];
						 $obj_voucherentry->es_receiptno   = "old_balance".$bid;
						 $obj_voucherentry->es_paymentmode = $eq_paymode;
						 $obj_voucherentry->es_bankacc	   = $es_bankacc;
						 $obj_voucherentry->es_particulars = $es_ledger;
						 $obj_voucherentry->es_amount	   = round($paid_amount,2); 
			
			            
						 $obj_voucherentry->es_bank_pin      = $es_bank_pin;
						 $obj_voucherentry->es_bank_name     = $es_bank_name;
						 $obj_voucherentry->es_teller_number = $es_teller_number;
			
						 //$obj_voucherentry->es_narration   = $es_narration;
						 $obj_voucherentry->es_vouchermode = $vocturedetails['voucher_mode'];
						 $obj_voucherentry->es_checkno     = $es_checkno;
						 $obj_voucherentry->es_receiptdate = date('Y-m-d H:i:s');
						 $obj_voucherentry->ve_fromfinance = $_SESSION['eschools']['from_finance'];
						 $obj_voucherentry->ve_tofinance   = $_SESSION['eschools']['to_finance'];
						 
						 $es_voucherentryid = $obj_voucherentry->Save();
					header("location:index.php?pid=79&action=view_oldbalances&emsg=75");
					exit;
			
			}
			
			
			
			
			
			
	
	}


}

//Old Balance Paid Details
if($action=='view_old_det' || $action=='print_view_old_det'){
		$old_bal = $db->getrow("SELECT * FROM es_old_balances WHERE ob_id='".$ofid."'");
		
		$sql_det = "SELECT * FROM es_old_balances_paid WHERE ob_id='".$ofid."'";
		$no_rows = sqlnumber($sql_det);
		$oldbal_paid_det = $db->getrows($sql_det);



}

// Receipt for Old Balance
if($action=='receipt_oldbal'){
		$payamount_details = $db->getrow("SELECT * FROM es_old_balances_paid WHERE obp_id='".$obpid."'");

}
	
	?>
	
    
    
 <?php
 if($action=='payamount' || $action=='receipt'|| $action=='receiptpayment'){
	$payamount_details = $db->getrow("SELECT * FROM es_other_fine_dettails WHERE otherfine_id =".$ofid);
	$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_examfee','Fee Payment','View EXAM FEE charged','".$ofid."','VIEW/RECEIPT PRINT FOR EXAM FEE PAID','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
	
}
 ?>   