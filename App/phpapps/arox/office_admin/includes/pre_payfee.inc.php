<?php 
sm_registerglobal('pid', 'action', 'emsg', 'update', 'getstudetails', 'studentid', 'student_id', 'stuclass', 'feemasterid', 'feepartuclars', 'feeamountpaid', 'Submitpayform', 'selfeetypecheck', 'feepartuclarid', 'sid', 'start', 'pre_class', 'dc1', 'dc2', 'Search', 'comments', 'todat', 'fromdat', 'es_vouchertype','vocturetypesel', 'es_receiptno', 'es_narration', 'es_particulars', 'es_amount', 'es_checkno', 'es_vouchermode', 'es_bankacc', 'es_paymentmode', 'es_receiptdate','es_paymentmode', 'es_ledger', 'es_bank_pin', 'es_bank_name', 'es_teller_number', 'es_installment','feecategories','print_cat','pre_class','pre_year','school_year','fee_school_year','from_finan','to_finan','finecharged','finepaid','finededucted','fee_waived','dc1','dc2','search_all_otherfines','es_preadmissionid','get_student_receipts','rid','fee_instalments','get_fee_card','prev_class','misc_actual','misc_fine_paid','misc_fine_waived','tptfee_actual','tptfee_paid','tptfee_waived','st_sale_actual','st_sale_paid','st_sale_waived','book_fine_actual','book_fine_paid','book_fine_waived','hostel_fee_actual','hostel_fee_paid','hostel_fee_waived','old_bal_actual','old_bal_paid','old_bal_waived','otherfine_id','tptfeeid','st_pay_id','es_libbookfinedetid','es_hostel_charges_id','fine_name','due_month','invoice_no','lfp','es_hostel_month','ob_id','submit_fee_status','cash_paid','total_amount','exam_fee','exam_fee_id','fine_name','fee_concession','ofid','es_preadmissionid','roll_no');

 if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
		header('location: ./?pid=1&unauth=0');
		exit;
 }

 // for printing
 if(isset($pre_class)){
 $printurl="&pre_class=$pre_class";
 }
if(isset($dc1)){
 $printurl.="&dc1=$dc1";
 }
 if(isset($dc2)){
 $printurl.="&dc2=$dc2";
 }
  if(isset($pre_year)){
 $printurl.="&pre_year=$pre_year";
 }
 $printurl.="&fee_school_year=$fee_school_year";
 
 
 // for payment details
 if(isset($feecategories)){
 $prinfeeturl="&feecategories=$feecategories";
 }
if(isset($dc1)){
 $prinfeeturl.="&dc1=$dc1";
 }
 if(isset($dc2)){
 $prinfeeturl.="&dc2=$dc2";
 }
  if(isset($pre_year)){
 $prinfeeturl.="&pre_year=$pre_year";
 }
 $prinfeeturl.="&fee_school_year=$fee_school_year";
 
 
 //end

if (!isset($pre_year) ) {
	   $from_acad    = $_SESSION['eschools']['from_acad'];
	   $to_acad      = $_SESSION['eschools']['to_acad'];
	   $from_finance = $_SESSION['eschools']['from_finance'];
	   $to_finance   = $_SESSION['eschools']['to_finance']; 
	}else{ 
	     $fi_res = getarrayassoc("SELECT *FROM `es_finance_master` ORDER BY `es_finance_masterid` DESC LIMIT 0 , 1 ");
		 $current_yearid = $fi_res ['es_finance_masterid'];
		 $finance_res  = getarrayassoc("SELECT * FROM `es_finance_master` WHERE `es_finance_masterid`= $pre_year");
		 $from_finance = $finance_res['fi_startdate'];
		 $to_finance   = $finance_res['fi_enddate']; 
		 $from_acad    = $finance_res['fi_ac_startdate'];
		 $to_acad      = $finance_res['fi_ac_enddate'];
	} 
if(isset($school_year)){
         $finance_res = getarrayassoc("SELECT * FROM `es_finance_master` WHERE `es_finance_masterid`= $school_year");
		 $from_finance = $finance_res['fi_startdate'];
		 $to_finance   = $finance_res['fi_enddate']; 
}	

$school_details_sel = "SELECT * FROM `es_finance_master` ORDER BY `es_finance_masterid` DESC";
$school_details_res = getamultiassoc($school_details_sel);





// Add Fields
	if($action == 'payfee' ){ 

 if ($getstudetails=='Go'){
 //print($pre_year);
        $sqlquery = "SELECT pre_class FROM es_preadmission_details WHERE `es_preadmissionid` ='".$studentid."' 
	                          AND pre_fromdate = '" . $from_acad . "' AND pre_todate= '" . $to_acad . "' ";
		  $prev_class_exe = getarrayassoc($sqlquery);
		  $prev_class = $prev_class_exe['pre_class'];	

     /*if($pre_year != $current_yearid ){
     $sqlquery = "SELECT pre_class FROM es_preadmission_details WHERE `es_preadmissionid` ='".$studentid."' 
	                          AND pre_fromdate = '" . $from_acad . "' AND pre_todate= '" . $to_acad . "' ";
		 $prev_class_exe = getarrayassoc($sqlquery);
		  $prev_class = $prev_class_exe['pre_class'];				  
	 }else{
	 $sqlquery = "SELECT * FROM `es_preadmission` WHERE `es_preadmissionid` ='" . $studentid . "' 
	               AND pre_fromdate = '" . $from_acad . "' AND pre_todate= '" . $to_acad . "' ";
				   }*/
				   
				   
				   
		 if (empty($studentid)){
		$errormessage[1]="Enter Student Roll Number "; 	
	 }
		
				   
	 elseif (sqlnumber($sqlquery)==0){
		$errormessage[0]="Student Does Not Exist"; 	
	 }
	 if (count($errormessage)==0){
		$studetails = $db->getrow("SELECT * FROM es_preadmission WHERE es_preadmissionid='".$studentid."'");
		 $section_det = $db->getrow("SELECT * FROM es_sections_student SS , es_sections S WHERE 	SS.student_id='".$studentid."' AND SS.course_id='".$prev_class."' AND SS.section_id=S.section_id ");
		//$obj_studetails->Get($studentid);
	 }		
 }



 if ( $Submitpayform=='Pay Fee'){

	     $vlc    = new FormValidation();
			if($cash_paid<=1){ $errormessage[0]="Enter Valid amount";	}
			if($vocturetypesel==""){$errormessage[1]="Select Voucher Type";}
		    if ($es_ledger=="") {$errormessage[2]="Select Ledger";	  	}
	       if($es_paymentmode==""){
		   		$errormessage[3]="Select Payment Mode";
		   }elseif ($es_paymentmode!="cash"){
		   
		   		if (!$vlc->is_alpha_numeric($es_bankacc)) {
					$errormessage[4]="Enter Bank Account Number";	  
				}	
				if (!$vlc->is_alpha_numeric($es_checkno)) {
				$errormessage[5]="Enter Cheque Number";	  
				}
		    }
	if(count($errormessage)==0){
	 
	$maxcomments = $db->getone("SELECT MAX(comments) FROM es_feepaid");
	if($maxcomments==0){
	$comments = 101;
	}else{$comments = $maxcomments+1;}
		 $vocturedetails = voucherid_finance($vocturetypesel);
		// echo $_POST['total_fee1'];exit;
	/*	 if($_POST['total_fee1']==''){
		 	$newfee_arr =    array( "es_preadmissionid"=>$student_id,
								 "financemaster_id"=>$pre_year,
								 "class_id"=>$stuclass,
								 "total_amount"=>$_POST['total_fee1'],
								 "paid"=>ceil($cash_paid),
								 "balance"=> $_POST['total_fee1'] - $cash_paid,
								 "paid_on"=>date('Y-m-d')
								  );
			$fid = $db->insert('es_feepaid_new',$newfee_arr);
		 }
		 else
		 {*/
		// echo 'fsafsasdfs';exit;
		
		/*echo $query="SELECT * FROM es_feepaid_new WHERE es_preadmissionid = '".$student_id."' ORDER BY fid ASC";exit;
		$res=$db->getrows($query);
		echo $res[''];*/
		if($total_amount<$cash_paid)
		{
		$vlc    = new FormValidation();
		$errormessage[7]="Can not pay more than total amount";
		  //header("Location:?pid=40&action=payfee");
		}
		else
		{
			             $obj_voucherentry = new es_voucherentry();
						 $vocturedetails = voucherid_finance($vocturetypesel);
						 $obj_voucherentry->es_vouchertype = $vocturedetails['voucher_type'];
						 $obj_voucherentry->es_receiptno   = "feepaid_".$fid;
						 $obj_voucherentry->es_paymentmode = $es_paymentmode;
						 $obj_voucherentry->es_bankacc	   = $es_bankacc;
						 $obj_voucherentry->es_particulars = $es_ledger;
						 $obj_voucherentry->es_amount	   = ceil($cash_paid); 
						 $obj_voucherentry->es_bank_pin      = $es_bank_pin;
						 $obj_voucherentry->es_bank_name     = $es_bank_name;
						 $obj_voucherentry->es_teller_number = $es_teller_number;
						 $obj_voucherentry->es_narration   = $es_narration;
						 $obj_voucherentry->es_vouchermode = $vocturedetails['voucher_mode'];
						 $obj_voucherentry->es_checkno     = $es_checkno;
						 $obj_voucherentry->es_receiptdate = date('Y-m-d H:i:s');
						 $obj_voucherentry->ve_fromfinance = $from_finance;
						 $obj_voucherentry->ve_tofinance   = $to_finance;
						 $es_voucherentryid = $obj_voucherentry->Save();
						 
						 	$newfee_arr =    array( "es_preadmissionid"=>$student_id,
								 "financemaster_id"=>$pre_year,
								 "class_id"=>$stuclass,
								 "total_amount"=>$total_amount,
								 "paid"=>ceil($cash_paid),
								 "balance"=> $total_amount - $cash_paid,
								 "paid_on"=>date('Y-m-d'),
								 "voucherid"=> $es_voucherentryid
								  );
			$fid = $db->insert('es_feepaid_new',$newfee_arr);
			
			//////////////////////////////
			
				$newfee_arr1 =    array( "studentid"=>$student_id,
								 "old_balance"=>$total_amount,
								 "paid_amount"=> ceil($cash_paid),
								 "wived_amount"=>$total_amount,
								 "last_paid_dt"=>date('Y-m-d'),
								 "balance"=> $total_amount - $cash_paid,
								 "created_on"=>date('Y-m-d')
								  );
			$fid1 = $db->insert('es_old_balances',$newfee_arr1);
			$log_insert_sql1="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_old_balances','Fee Payment','Pay Fee','".$fid1."','FEE PAID','".$_SERVER['REMOTE_ADDR']."',NOW())";
	    $log_insert_exe=mysql_query($log_insert_sql1);
			
			
			
			///////////////////////////////
			
		foreach ($selfeetypecheck as $k=>$v) {
		
	 if($k==1){
	         foreach($v as $sk=>$sv){
			 $ival = $sv;
			 $today = date('Y-m-d');
			 $feepaid_det_arr = array("fid"=>$fid,"particulars"=>$feepartuclars[$ival],"amount"=>ceil($feeamountpaid[$ival]),"created_on"=>date("Y-m-d"));
			 $db->insert("es_feepaid_new_details",$feepaid_det_arr);
			
			$d1 = date('Y');
			$d2 = date('Y')+1;
			if($fee_instalments[$ival]==12){
			$getfeelistsql = "SELECT * FROM `es_feemaster` WHERE `es_feemasterid`='".$feepartuclarid[$ival]."' ";
			$fee_parti_det = $db->getrow($getfeelistsql);
			$inst_amt_1 = $fee_parti_det['fee_amount']/12;
			if($fee_parti_det['fee_particular']=='TUITION'){
			$amount = $inst_amt_1-$fee_concession; 
			}else{
			$amount = $inst_amt_1; 
			}
			$inst_amt = ceil($amount);
			$loop_1 = $feeamountpaid[$ival]/$inst_amt;
			$amount_arr = array();
			       for($i=0;$i<floor($loop_1);$i++){
				   $amount_arr[$i] = $inst_amt;
				    }
					
					
			if($feeamountpaid[$ival]%$inst_amt!=0){
					$last_element = $feeamountpaid[$ival] - array_sum( $amount_arr);
				    array_push($amount_arr, $last_element);
			}
			
			$loop = ceil($loop_1);
			
			for($i=0;$i<$loop;$i++){
			//new loop start
			
			$feepaid_arr = array("studentid"=>$student_id,
								 "class"=>$stuclass,
								 "particularid"=>$feepartuclarid[$ival],
								 "particulartname"=>$feepartuclars[$ival],
								 "feeamount"=>ceil($amount_arr[$i]),
								 "date"=>date('Y-m-d'),
								 "academicyear"=> $d1."-".$d2,
								 "es_installment"=>$es_installment[$ival],
								 "comments"=>$comments,
								 "fi_fromdate"=>$from_finance,
								 "fi_todate"=>$to_finance,
								  "es_voucherentryid"=>$fee_waived[$ival],
								 "fee_waived"=>$fee_waived[$ival]
								 
								  );
			
			
			$receptid = $db->insert('es_feepaid',$feepaid_arr);
			
			$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_feepaid','Fee Payment','Pay Fee','".$receptid."','FEE PAID','".$_SERVER['REMOTE_ADDR']."',NOW())";
	    $log_insert_exe=mysql_query($log_insert_sql);
			
			
			
			
			//new loop end here
			}
			
			}else{
			$feepaid_arr = array("studentid"=>$student_id,
								 "class"=>$stuclass,
								 "particularid"=>$feepartuclarid[$ival],
								 "particulartname"=>$feepartuclars[$ival],
								 "feeamount"=>ceil($feeamountpaid[$ival]),
								 "date"=>date('Y-m-d'),
								 "academicyear"=> $d1."-".$d2,
								 "es_installment"=>$es_installment[$ival],
								 "comments"=>$comments,
								 "fi_fromdate"=>$from_finance,
								 "fi_todate"=>$to_finance,
								 "fee_waived"=>$fee_waived[$ival] );
			
			
			$receptid = $db->insert('es_feepaid',$feepaid_arr);
			
			$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_feepaid','Fee Payment','Pay Fee','".$receptid."','FEE PAID','".$_SERVER['REMOTE_ADDR']."',NOW())";
	    $log_insert_exe=mysql_query($log_insert_sql);
			
					}
			
			
			if($feeamountpaid[$ival]!=""){
			//voucher generation
			$obj_voucherentry = new es_voucherentry();
			
			$obj_voucherentry->es_vouchertype = $vocturedetails['voucher_type'];
			$obj_voucherentry->es_receiptno   = "student".$receptid;
			$obj_voucherentry->es_paymentmode = $es_paymentmode;
			$obj_voucherentry->es_bankacc	  = $es_bankacc;
			$obj_voucherentry->es_particulars = $es_ledger;
			$obj_voucherentry->es_amount	  = round($feeamountpaid[$ival],2);


			$obj_voucherentry->es_bank_pin      = $es_bank_pin;
			$obj_voucherentry->es_bank_name     = $es_bank_name;
			$obj_voucherentry->es_teller_number = $es_teller_number;

			$obj_voucherentry->es_narration   = $es_narration;
			$obj_voucherentry->es_vouchermode = $vocturedetails['voucher_mode'];
			$obj_voucherentry->es_checkno     = $es_checkno;
			$obj_voucherentry->es_receiptdate = date('Y-m-d H:i:s');
			$obj_voucherentry->ve_fromfinance = $from_finance;
			$obj_voucherentry->ve_tofinance   = $to_finance;
			
			//$sudid=$obj_voucherentry->Save();
			//$db->update('es_feepaid', "es_voucherentryid ='" . $sudid . "'", 'es_feepaidid =' . $receptid);
			}
			
			
			
			
			
			
			if($finecharged[$ival]>0||$finededucted[$ival]>0 ){
			
			 $feepaid_det_arr = array("fid"=>$fid,"particulars"=>"Tution Fee Fine","amount"=>$finecharged[$ival],"created_on"=>date("Y-m-d"));
			        $db->insert("es_feepaid_new_details",$feepaid_det_arr);
					
			$fcc_arr = array("studentid"=>$student_id, "class"=>$stuclass,"es_feemasterid"=>$feepartuclarid[$ival],"fine_amount"=>$finecharged[$ival],"amount_paid"=>$finecharged[$ival],"deduction_allowed"=>$finededucted[$ival],"es_installment"=>$es_installment[$ival],"date"=>$today,"fi_fromdate"=>$from_finance,"fi_todate"=>$to_finance);
			$fiid = $db->insert("es_fine_charged_collected",$fcc_arr);
					
					if($finepaid[$ival]>0){
					//voucher generation for fine
					$obj_voucherentry = new es_voucherentry();
					
					$obj_voucherentry->es_vouchertype = $vocturedetails['voucher_type'];
					$obj_voucherentry->es_receiptno   = "student_fine".$fiid;
					$obj_voucherentry->es_paymentmode = $es_paymentmode;
					$obj_voucherentry->es_bankacc	  = $es_bankacc;
					$obj_voucherentry->es_particulars = $es_ledger;
					$obj_voucherentry->es_amount	  = $finecharged[$ival];
		
		
					$obj_voucherentry->es_bank_pin      = $es_bank_pin;
					$obj_voucherentry->es_bank_name     = $es_bank_name;
					$obj_voucherentry->es_teller_number = $es_teller_number;
		
					$obj_voucherentry->es_narration   = $es_narration;
					$obj_voucherentry->es_vouchermode = $vocturedetails['voucher_mode'];
					$obj_voucherentry->es_checkno     = $es_checkno;
					$obj_voucherentry->es_receiptdate = date('Y-m-d H:i:s');
					$obj_voucherentry->ve_fromfinance = $from_finance;
					$obj_voucherentry->ve_tofinance   = $to_finance;
					//$sudid123=$obj_voucherentry->Save();
					//$db->update('es_fine_charged_collected', "es_voucherentryid ='" . $sudid123 . "'", 'es_fcc_id =' . $fiid);
					}
			}
			
			
		}
	 }
	 if($k==2){
	 
	 	foreach($v as $mk=>$mv){
		   $ival = $mk;
		  
		     $feepaid_det_arr = array("fid"=>$fid,"particulars"=>$fine_name[$ival],"amount"=>$misc_actual[$ival],"created_on"=>date("Y-m-d"));
			 $db->insert("es_feepaid_new_details",$feepaid_det_arr);
			 
	 	   $db->update("es_other_fine_dettails","paid_amount='".$misc_actual[$ival]."',deduction_allowed='".$misc_fine_waived[$ival]."',
		   					paid_on='".date("Y-m-d")."',balance=0,remarks='".$remarks."'","otherfine_id=".$otherfine_id[$ival]);
						  
					$obj_voucherentry = new es_voucherentry();
						 $vocturedetails = voucherid_finance($vocturetypesel);
						 $obj_voucherentry->es_vouchertype = $vocturedetails['voucher_type'];
						 $obj_voucherentry->es_receiptno   = "other_fine".$otherfine_id[$ival];
						 $obj_voucherentry->es_paymentmode = $es_paymentmode;
						 $obj_voucherentry->es_bankacc	   = $es_bankacc;
						 $obj_voucherentry->es_particulars = $es_ledger;
						 $obj_voucherentry->es_amount	   = $misc_actual[$ival]; 
			
			            
						 $obj_voucherentry->es_bank_pin      = $es_bank_pin;
						 $obj_voucherentry->es_bank_name     = $es_bank_name;
						 $obj_voucherentry->es_teller_number = $es_teller_number;
			
						 $obj_voucherentry->es_narration   = $es_narration;
						 $obj_voucherentry->es_vouchermode = $vocturedetails['voucher_mode'];
						 $obj_voucherentry->es_checkno     = $es_checkno;
						 $obj_voucherentry->es_receiptdate = date('Y-m-d H:i:s');
						 $obj_voucherentry->ve_fromfinance = $from_finance;
						 $obj_voucherentry->ve_tofinance   = $to_finance;
						 
						 //$es_voucherentryid = $obj_voucherentry->Save();
			}
	 
	 
	 
	 }
	 if($k==3){
	 	foreach($v as $tk=>$tv){
		   $ival = $tk;
		   
		     $feepaid_det_arr = array("fid"=>$fid,"particulars"=>"TPT for".$due_month[$ival],"amount"=>$tptfee_actual[$ival],"created_on"=>date("Y-m-d"));
			 $db->insert("es_feepaid_new_details",$feepaid_det_arr);
			 
	 	   $db->update("es_trans_payment_history","amount_paid='".$tptfee_actual[$ival]."',deduction='".$tptfee_waived[$ival]."',
		   					paid_on='".date("Y-m-d")."',pay_status='paid'","id=".$tptfeeid[$ival]);
						  
					$obj_voucherentry = new es_voucherentry();
						 $vocturedetails = voucherid_finance($vocturetypesel);
						 $obj_voucherentry->es_vouchertype = $vocturedetails['voucher_type'];
						  $obj_voucherentry->es_receiptno   = "transport_charges".$tptfeeid[$ival];
						 $obj_voucherentry->es_paymentmode = $es_paymentmode;
						 $obj_voucherentry->es_bankacc	   = $es_bankacc;
						 $obj_voucherentry->es_particulars = $es_ledger;
						 $obj_voucherentry->es_amount	   = $tptfee_actual[$ival]; 
			
			            
						 $obj_voucherentry->es_bank_pin      = $es_bank_pin;
						 $obj_voucherentry->es_bank_name     = $es_bank_name;
						 $obj_voucherentry->es_teller_number = $es_teller_number;
			
						 $obj_voucherentry->es_narration   = $es_narration;
						 $obj_voucherentry->es_vouchermode = $vocturedetails['voucher_mode'];
						 $obj_voucherentry->es_checkno     = $es_checkno;
						 $obj_voucherentry->es_receiptdate = date('Y-m-d H:i:s');
						 $obj_voucherentry->ve_fromfinance = $from_finance;
						 $obj_voucherentry->ve_tofinance   = $to_finance;
						 
						// $es_voucherentryid = $obj_voucherentry->Save();
			}
	 
	 
	 
	 }
	 if($k==4){
	 	foreach($v as $salk=>$salv){
		   $ival = $salk;
		   
		     $feepaid_det_arr = array("fid"=>$fid,"particulars"=>"SALE Inv.NO:".$invoice_no[$ival],"amount"=>$st_sale_actual[$ival],"created_on"=>date("Y-m-d"));
			 $db->insert("es_feepaid_new_details",$feepaid_det_arr);
			 
	 	   $db->update("es_stationary_payment","paid_amount='".$st_sale_actual[$ival]."',waived_amount='".$st_sale_waived[$ival]."',
		   					paid_date='".date("Y-m-d")."',pay_status='paid'","st_pay_id=".$st_pay_id[$ival]);
						  
					$obj_voucherentry = new es_voucherentry();
						 $vocturedetails = voucherid_finance($vocturetypesel);
						 $obj_voucherentry->es_vouchertype = $vocturedetails['voucher_type'];
						 $obj_voucherentry->es_receiptno   = "Stationary".$st_pay_id[$ival];
						 $obj_voucherentry->es_paymentmode = $es_paymentmode;
						 $obj_voucherentry->es_bankacc	   = $es_bankacc;
						 $obj_voucherentry->es_particulars = $es_ledger;
						 $obj_voucherentry->es_amount	   = $st_sale_actual[$ival]; 
			
			            
						 $obj_voucherentry->es_bank_pin      = $es_bank_pin;
						 $obj_voucherentry->es_bank_name     = $es_bank_name;
						 $obj_voucherentry->es_teller_number = $es_teller_number;
			
						 $obj_voucherentry->es_narration   = $es_narration;
						 $obj_voucherentry->es_vouchermode = $vocturedetails['voucher_mode'];
						 $obj_voucherentry->es_checkno     = $es_checkno;
						 $obj_voucherentry->es_receiptdate = date('Y-m-d H:i:s');
						 $obj_voucherentry->ve_fromfinance = $from_finance;
						 $obj_voucherentry->ve_tofinance   = $to_finance;
						 
						 //$es_voucherentryid = $obj_voucherentry->Save();
			}
	 
	 
	 
	 }
	 if($k==5){
	 	foreach($v as $libk=>$libv){
		   $ival = $libk;
	 	   
		   
		     $feepaid_det_arr = array("fid"=>$fid,"particulars"=>"Lib. Fine","amount"=>$book_fine_actual[$ival],"created_on"=>date("Y-m-d"));
			 $db->insert("es_feepaid_new_details",$feepaid_det_arr);
			 
			 
			$db->update('es_libbookfinedet', "fine_paid ='" . $book_fine_actual[$ival] . "',fine_deducted ='" . $book_fine_waived[$ival] . "', 
			             remarks='" . $remarks . "', paid_on='" . date("Y-m-d") . "'", 'es_libbookfinedetid =' . $es_libbookfinedetid[$ival]);
						  
					$obj_voucherentry = new es_voucherentry();
						 $vocturedetails = voucherid_finance($vocturetypesel);
						 $obj_voucherentry->es_vouchertype = $vocturedetails['voucher_type'];
						 $obj_voucherentry->es_receiptno   = "libbookfineid".$es_libbookfinedetid[$ival];
						 $obj_voucherentry->es_paymentmode = $es_paymentmode;
						 $obj_voucherentry->es_bankacc	   = $es_bankacc;
						 $obj_voucherentry->es_particulars = $es_ledger;
						 $obj_voucherentry->es_amount	   = $book_fine_actual[$ival]; 
			
			            
						 $obj_voucherentry->es_bank_pin      = $es_bank_pin;
						 $obj_voucherentry->es_bank_name     = $es_bank_name;
						 $obj_voucherentry->es_teller_number = $es_teller_number;
			
						 $obj_voucherentry->es_narration   = $es_narration;
						 $obj_voucherentry->es_vouchermode = $vocturedetails['voucher_mode'];
						 $obj_voucherentry->es_checkno     = $es_checkno;
						 $obj_voucherentry->es_receiptdate = date('Y-m-d H:i:s');
						 $obj_voucherentry->ve_fromfinance = $from_finance;
						 $obj_voucherentry->ve_tofinance   = $to_finance;
						 
						 //$es_voucherentryid = $obj_voucherentry->Save();
			}
	 
	 
	 
	 }
	 if($k==6){
	 	foreach($v as $hcpk=>$hcpv){
		   $ival = $hcpk;
	 	   
		   
		     $feepaid_det_arr = array("fid"=>$fid,"particulars"=>"Hostel fee".$es_hostel_month[$ival],"amount"=>$hostel_fee_actual[$ival],"created_on"=>date("Y-m-d"));
			 $db->insert("es_feepaid_new_details",$feepaid_det_arr);
			 
			 
			$db->update("es_hostel_charges","amount_paid='".$hostel_fee_actual[$ival]."',deduction='".$hostel_fee_waived[$ival]."',
			paid_on='".date("Y-m-d")."',balance=0,remarks='".$remarks."'","es_hostel_charges_id=".$es_hostel_charges_id[$ival]);
						  
					$obj_voucherentry = new es_voucherentry();
						 $vocturedetails = voucherid_finance($vocturetypesel);
						 $obj_voucherentry->es_vouchertype = $vocturedetails['voucher_type'];
						 $obj_voucherentry->es_receiptno   = "hostel_charges".$es_hostel_charges_id[$ival];
						 $obj_voucherentry->es_paymentmode = $es_paymentmode;
						 $obj_voucherentry->es_bankacc	   = $es_bankacc;
						 $obj_voucherentry->es_particulars = $es_ledger;
						 $obj_voucherentry->es_amount	   = $hostel_fee_actual[$ival]; 
			
			            
						 $obj_voucherentry->es_bank_pin      = $es_bank_pin;
						 $obj_voucherentry->es_bank_name     = $es_bank_name;
						 $obj_voucherentry->es_teller_number = $es_teller_number;
			
						 $obj_voucherentry->es_narration   = $es_narration;
						 $obj_voucherentry->es_vouchermode = $vocturedetails['voucher_mode'];
						 $obj_voucherentry->es_checkno     = $es_checkno;
						 $obj_voucherentry->es_receiptdate = date('Y-m-d H:i:s');
						 $obj_voucherentry->ve_fromfinance = $from_finance;
						 $obj_voucherentry->ve_tofinance   = $to_finance;
						 
						// $es_voucherentryid = $obj_voucherentry->Save();
			}
	 
	 
	 
	 }
	 
	
	 if($k==7){
	 	
		   $ival = "old".$v;
	 	   
			        $feepaid_det_arr = array("fid"=>$fid,"particulars"=>"Old Balance","amount"=>$old_bal_actual,"created_on"=>date("Y-m-d"));
			        $db->insert("es_feepaid_new_details",$feepaid_det_arr);
					
					$obpaid_arr = array("ob_id"=>$ob_id,"paid_amount"=>$old_bal_actual,"waived_amount"=>$old_bal_waived,"paid_on"=>date("Y-m-d"));
					$obpaid_arr = stripslashes_deep($obpaid_arr);
					$bid = $db->insert("es_old_balances_paid",$obpaid_arr);
					
					$db->update("es_old_balances","last_paid_dt='".date("Y-m-d")."',balance=balance-('".$old_bal_actual."'+'".$old_bal_waived."')","ob_id=".$ob_id);
						  
					$obj_voucherentry = new es_voucherentry();
						 $vocturedetails = voucherid_finance($vocturetypesel);
						 $obj_voucherentry->es_vouchertype = $vocturedetails['voucher_type'];
						 $obj_voucherentry->es_receiptno   = "old_balance".$bid;
						 $obj_voucherentry->es_paymentmode = $es_paymentmode;
						 $obj_voucherentry->es_bankacc	   = $es_bankacc;
						 $obj_voucherentry->es_particulars = $es_ledger;
						 $obj_voucherentry->es_amount	   = $old_bal_actual; 
			
			            
						 $obj_voucherentry->es_bank_pin      = $es_bank_pin;
						 $obj_voucherentry->es_bank_name     = $es_bank_name;
						 $obj_voucherentry->es_teller_number = $es_teller_number;
			
						 $obj_voucherentry->es_narration   = $es_narration;
						 $obj_voucherentry->es_vouchermode = $vocturedetails['voucher_mode'];
						 $obj_voucherentry->es_checkno     = $es_checkno;
						 $obj_voucherentry->es_receiptdate = date('Y-m-d H:i:s');
						 $obj_voucherentry->ve_fromfinance = $from_finance;
						 $obj_voucherentry->ve_tofinance   = $to_finance;
						 
						 //$es_voucherentryid = $obj_voucherentry->Save();
			
	 
	 
	 
	 }
	 
	 
  }
  if($k==8){
	 
	 	foreach($v as $mk=>$mv){
		   $ival = $mk;
		  
	 	            $feepaid_det_arr = array("fid"=>$fid,"particulars"=>"Exam fee","amount"=>$exam_fee[$ival],"created_on"=>date("Y-m-d"));
			        $db->insert("es_feepaid_new_details",$feepaid_det_arr);
		  
		                   $db->update("es_examfee","paid_amount='".$exam_fee[$ival]."',
		   					paid_on='".date("Y-m-d")."',balance=0,remarks='".$remarks."'","exam_fee_id=".$exam_fee_id[$ival]);
						  
					
			}
	 
	 
	 
	 }
	 if($prev_month_balance!=""){
	                $feepaid_det_arr = array("fid"=>$fid,"particulars"=>"Previous Balance","amount"=>$prev_month_balance,"created_on"=>date("Y-m-d"));
			        $db->insert("es_feepaid_new_details",$feepaid_det_arr);
	 }
  
         
		
		$studetails_mobile = $db->getrow("SELECT * FROM es_preadmission WHERE es_preadmissionid='".$student_id."'");
		//$obj_studetails->Get($student_id);
		if($studetails_mobile['pre_mobile1']!="" && function_exists('curl_init')){
		
		//$smsmsg_det = $db->getrow("SELECT * FROM es_manage_sms");
						$username = str_replace(" ","%20",$smsmsg_det['username']);
						$password = str_replace(" ","%20",$smsmsg_det['password']);
						$sender   = str_replace(" ","%20",$smsmsg_det['sender']);
						$message = str_replace(" ","%20",$smsmsg_det['feepaid_msg']);
						if(is_array($smsmsg_det) && count($smsmsg_det)>0){
						/*$url = "http://www.smsprovider.co.in/messageapi.asp?username=".$username."&password=".$password."&sender=".$sender."&mobile=".$studetails_mobile['pre_mobile1']."&message=".$message; */
						
						$curl = curl_init();
						curl_setopt ($curl, CURLOPT_URL, $url);
						curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1);
						$request_result = curl_exec ($curl);
						$request_result;
						curl_close ($curl);
						}
			}
			
		header("Location: ?pid=114&action=receipt_list&get_student_receipts=GO&studentid=$student_id&pre_year=$pre_year");
		exit;
		}
	}
	//$student_id;
	$studentid = $student_id;
	$studetails = $db->getrow("SELECT * FROM es_preadmission WHERE es_preadmissionid='".$student_id."'");
	 /*$sqlquery = "SELECT pre_class FROM es_preadmission_details WHERE `es_preadmissionid` ='".$studentid."' 
	                          AND pre_fromdate = '" . $from_acad . "' AND pre_todate= '" . $to_acad . "' ";
		  $prev_class_exe = getarrayassoc($sqlquery);
		  $prev_class = $prev_class_exe['pre_class'];*/	
	//extract
	//array_print($studetails);
	//$obj_studetails->Get($student_id);
	$getstudetails = "Go";
	$pre_year = $pre_year;		
 }
}
 if ($action =='printrepot'){
 	$studentid = $sid;
	
	 if($pre_year != $current_yearid ){
	 
	 $sqlquery  = "SELECT `es_preadmissionid` FROM `es_preadmission_details` WHERE `es_preadmissionid` ='" . $studentid . "' 
	               AND pre_fromdate ='" .$from_acad. "' AND pre_todate= '" .$to_acad . "'";

	 }else{
	 $sqlquery = "SELECT `es_preadmissionid` FROM `es_preadmission` WHERE `es_preadmissionid` ='".$studentid."' 
	              AND pre_fromdate = '" . $from_acad . "' AND pre_todate= '" . $to_acad . "'";
	 }
	if (sqlnumber($sqlquery)==0){
		$errormessage[0]="Student Does Not Exist"; 	
	}
	
	if (count($errormessage)==0){
		
		$studetails = $db->getrow("SELECT * FROM es_preadmission WHERE es_preadmissionid='".$studentid."'");
		
		
		//$obj_studetails->Get($studentid);
		 if($pre_year != $current_yearid ){
		 $prev_class_sql = "SELECT pre_class FROM es_preadmission_details WHERE `es_preadmissionid` ='".$studentid."' 
	                          AND pre_fromdate = '" . $from_acad . "' AND pre_todate= '" . $to_acad . "'";
		 $prev_class_exe = getarrayassoc($prev_class_sql);
		  $prev_class = $prev_class_exe['pre_class'];	
		  $getfeelistsql = "SELECT * FROM `es_feemaster` WHERE `fee_class`='".$prev_class."' AND fee_fromdate = '" . $from_finance . "' AND fee_todate = '" . $to_finance . "'";
		
		 }else{
		$getfeelistsql = "SELECT * FROM `es_feemaster` WHERE `fee_class`='".$studetails['pre_class']."' AND fee_fromdate = '" . $from_finance . "' AND fee_todate = '" . $to_finance . "'";
		$prev_class = $studetails['pre_class'];
		}
		$section_det = $db->getrow("SELECT * FROM es_sections_student SS , es_sections S WHERE 	SS.student_id='".$studentid."' AND SS.course_id='".$prev_class."' AND SS.section_id=S.section_id ");
		$getfeelist = getamultiassoc($getfeelistsql);
        if($pre_year != $current_yearid ){
		$sel_receptnumber = "SELECT `es_installment` FROM `es_feepaid` WHERE `studentid`=".$studetails['es_preadmissionid']." AND `class`='".        $prev_class."'  AND fi_fromdate = '" . $from_finance . "' 
						   AND fi_todate   = '" . $to_finance . "'      ORDER BY `es_installment` DESC LIMIT 0 , 1";
		}else{
	$sel_receptnumber = "SELECT `es_installment` FROM `es_feepaid` WHERE `studentid`=".$studetails['es_preadmissionid']." AND `class`='".        $studetails['pre_class']."'   AND fi_fromdate = '" . $from_finance . "' 
						   AND fi_todate   = '" . $to_finance . "'      ORDER BY `es_installment` DESC LIMIT 0 , 1";
		}
		$receptnumber = getarrayassoc($sel_receptnumber);
		
		$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_feepaid','Fee Payment','Pay Fee','".$studetails['es_preadmissionid']."','PRINT FEE PAID (RECEIPT)','".$_SERVER['REMOTE_ADDR']."',NOW())";
	    $log_insert_exe=mysql_query($log_insert_sql);
		
	}
 }


/**
*  complete fee details with bank details
*/

if ($action=="printcompletefeedet"){ 
	$sel_feebalances="SELECT * FROM `es_feepaid` WHERE `studentid` ='" . $sid . "' 
	                       AND fi_fromdate = '" . $from_finance . "' 
						   AND fi_todate   = '" . $to_finance . "' ";
	$fees_banksdata = getamultiassoc( $sel_feebalances );
	
    if($pre_year != $current_yearid ){
	$sel_student = "SELECT PA.pre_dateofbirth , PA.es_preadmissionid, PA.pre_fathername , PAD.pre_class , PA.pre_name , PA.pre_image 
	                FROM  es_preadmission PA ,es_preadmission_details PAD WHERE PAD.es_preadmissionid ='" . $sid . "'
					AND PAD.es_preadmissionid = PA.es_preadmissionid AND PAD.pre_fromdate = '" . $from_acad . "' 
					AND PAD.pre_todate= '" . $to_acad . "' ";
	}else{
	$sel_student = "SELECT `pre_dateofbirth` , `es_preadmissionid`,`pre_fathername` , `pre_class` , `pre_name` , `pre_image` FROM  `es_preadmission` WHERE `es_preadmissionid` ='" . $sid . "'";
	}
	$stdentdata = getarrayassoc($sel_student);
	
	$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_feepaid','Fee Payment','Pay Fee','".$sid."','PRINT FEE PAID (COMPLETE DETAILS)','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
}

/**
* out standing fees
* SELECT FD.`particulartname`, SUM(FD.`feeamount`) AS sumamount , FD.`particularid`, COUNT( FD.`particularid`)  AS installment FROM `es_feepaid` FD LEFT JOIN `es_feemaster` FM ON  FD.`particulartname` = FM.`fee_particular` WHERE FD.`class` = "NURSERY" GROUP BY FD.`particulartname` 
*/



if ($action == 'outstandingfees'||$action == 'outstandingfeesreport' || $action=='print_each_outstanding'){ 
	$q_limit = 4;
	if (!isset($start)){
		$start = 0;
	}
	
	 if(isset($Search) && $pre_year!=$current_yearid){ 
	 $joindates = "";
	    $where = " AND "; 
	    if (isset($Search)&&$Search=="Search"){
		if ($pre_class!="ALL"){
			$joindates .= $where.' PAD.pre_class = "' . $pre_class . '"';
			
		   }
	    }
	$sel_students = " SELECT * FROM es_preadmission_details PAD
	                                                  WHERE PAD.pre_fromdate = '" . $from_acad . "' 
	                                                  AND PAD.pre_todate = '" . $to_acad . "'  
													  	" . $joindates . " ORDER BY  PAD.es_preadmissionid";
	 }else{
	 $joindates = "";
	    $where = " AND "; 
	    if (isset($Search)&&$Search=="Search"){
		if ($pre_class!="ALL"){
			$joindates .= $where.' pre_class = "' . $pre_class . '"';
		   }
	    }
		$condition = "";
		if($studentid!=""){$condition = " AND es_preadmissionid='".$studentid."'";}
	 $sel_students = " SELECT * FROM `es_preadmission` WHERE pre_fromdate = '" . $from_acad . "' 
	                                                  AND pre_todate = '" . $to_acad . "' " . $joindates .$condition. " ORDER BY  es_preadmissionid ";
	}
  
	
	$loopstrt = $start;
    $loopend = $start + $q_limit;
	$no_records = sqlnumber($sel_students);
	
	$sel_students .=" LIMIT ".$start.",".$q_limit." ";
	
	$students_data = getamultiassoc($sel_students);
	
	$outstandingfeesUrl = "&Search=$Search&pre_class=".$pre_class."&pre_year=".$pre_year."&start=".$start."&q_limit=".$q_limit;
}


/*
* fees faid list
*/
if ($action == 'feepaidlist'|| $action == 'feepaidlistreport') { 


	$condition = "";
	$and = " AND "; 
	$d1 = formatDateCalender($dc1);
	$d2 = formatDateCalender($dc2);
	if (isset($Search)&&$Search=="Search"){
		if (isset($dc1)&&$dc1!=""&& isset($dc2)&&$dc2!=""){
			
			$condition .= $and . "  FD.date BETWEEN '$d1' AND '$d2'";
			$and = " AND "  ;
		
		}else{
			if (isset($dc1)&&$dc1!=""){
				$condition .= $and . " FD.`date` >= '$d1' "; 
				$and = " AND "  ;
			}
			if (isset($dc2)&&$dc2!=""){
				$condition .= $and . " FD.`date` <= '$d2' ";
				$and = " AND "  ;
			}
		}
		if ($pre_class!="ALL"){
			$condition .= $and . "   FD.`class` = '$pre_class'";
		}
		
	}
	
	$q_limit = 15;
	if (!isset($start)){
		$start = 0;
	}
	if (isset($school_year)&&$school_year=="Submit" ){
		
         $finance_res = getarrayassoc("SELECT * FROM `es_finance_master` WHERE `es_finance_masterid`= $pre_year");
		 $from_finance = $finance_res['fi_startdate'];
		 $to_finance   = $finance_res['fi_enddate']; 
        
		$condition = " ";
		if ($pre_class!="ALL"){
		$and =  " AND "  ; 
		$condition .= $and . "   FD.`class` = '$pre_class'"; 
		}
		$sel_paidfee = " SELECT SUM( FD.`feeamount` ) AS sumamt, SUM( FD.`fee_waived` ) AS waidamt,FD.`studentid` , PD.`pre_student_username` ,PD.`pre_name`
	                       FROM `es_feepaid` FD , es_preadmission PD 
						   WHERE  PD.es_preadmissionid = FD.`studentid` ".$condition."  
						   AND fi_fromdate = '" . $from_finance . "' 
						   AND fi_todate   = '" . $to_finance . "'
		                    GROUP BY FD.`studentid`";
		 
										
		$no_rows = count(getamultiassoc($sel_paidfee)); 
	    $sel_paidfee .= "    LIMIT $start , $q_limit ";
	    $paid_feedet = getamultiassoc($sel_paidfee);
		
		}else{
		
		$sel_paidfee = " SELECT SUM( FD.`feeamount` ) AS sumamt, SUM( FD.`fee_waived` ) AS waidamt, FD.`studentid` , PD.`pre_student_username`,PD.`pre_name`  
	                       FROM `es_feepaid` FD , es_preadmission PD 
						   WHERE  PD.es_preadmissionid = FD.`studentid` ".$condition."  
						   AND fi_fromdate = '" . $from_finance . "' 
						   AND fi_todate   = '" . $to_finance . "' 
						   GROUP BY FD.`studentid`";
	
	$no_rows = count(getamultiassoc($sel_paidfee)); 
	$sel_paidfee .= "    LIMIT $start , $q_limit ";
	$paid_feedet = getamultiassoc($sel_paidfee);
	
	
		}
		$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_feepaid','Fee Payment','Paid Fee List','".$pre_class."','PRINT FEE PAID (LIST)','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
		
		 if (isset($school_year)){
		 $Submit="Submit";
		 $feespaidurl = "&pre_year=".$pre_year."&pre_class=".$pre_class."&school_year=".$Submit;
		 }else{
		 $feespaidurl = "&Search=$Search&pre_class=".$pre_class."&dc1=".$dc1."&dc2=".$dc2; 
		 }
		
	
}


	
/*****************************
PRABHAKAR STARTED CODING HERE 
***************************************************************************************************************/
if ($action=="fee_list"){
/************************************************************************************************************

SELECT `es_feepaidid`, `studentid`, `class`, `particularid`, `particulartname`, `feeamount`, `date`, `academicyear`, `comments`  FROM `es_feepaid`

SELECT `es_preadmissionid`, `pre_student_username` FROM `es_preadmission` WHERE 1

 SELECT * , SUM( `fee_amount` )
FROM `es_feemaster`
GROUP BY `fee_class`
LIMIT 0 , 30 
***************************************************************************************************************/

	$sel_schoolgrandfee  = "SELECT SUM(`feeamount`) AS sumamt FROM `es_feepaid`";
	$schoolgrandfee_data = getarrayassoc($sel_schoolgrandfee);
		//"WHERE FD.`class` = '$pre_class';
	
	$sel_schoolfees = " SELECT  FD.`feeamount`,  FD.`es_feepaidid`, FD.`class`, CL.`es_classname`,  FD.`particularid`,  FD.`particulartname`,  FD.`date`,  FD.`academicyear`, PD.`pre_student_username` FROM `es_feepaid` FD LEFT JOIN `es_preadmission` PD ON   FD.`studentid`= PD.`es_preadmissionid`  LEFT JOIN  `es_classes` CL ON CL.es_classesid = FD.`class`  ORDER BY PD.`es_preadmissionid`";
	
	
	$class_fees = array();
	$schoolfees_det = getamultiassoc($sel_schoolfees);
	
    foreach ($schoolfees_det as $eachfees){

		$class_fees[$eachfees['class']][$eachfees['es_feepaidid']] = $eachfees;
		}
}

?>

  
   <?php
  
  if ($action == 'categorywisefee' ) { 
if($dc1!=""){
$pageUrl = "&dc1=$dc1";
$d1 = formatDateCalender($dc1);
if($d1<$from_finance || $d1>$to_finance){
$errormessage[1]=" From date is not matching with Finanacial year";
}
} if($dc2!=""){
 $pageUrl .= "&dc2=$dc2";
	$d2 = formatDateCalender($dc2);
if($d2<$from_finance || $d2>$to_finance){
$errormessage[2]=" To date is not matching with Finanacial year";

}
}
	if(count($errormessage)==0){
    //to fetch categories
	if (isset($dc1)&&$dc1!=""&& isset($dc2)&&$dc2!=""){
			$condition .=  " AND  date BETWEEN '$d1' AND '$d2'";
		}else{
			if (isset($dc1)&&$dc1!=""){
				$condition .=  " AND `date` >= '$d1' "; 
			}
			if (isset($dc2)&&$dc2!=""){
				$condition .=  " AND `date` <= '$d2' ";
			}
		}
	
	$sel_fees_cat = "SELECT DISTINCT fee_particular FROM es_feemaster"; 
    $fees_cat_det = getamultiassoc($sel_fees_cat);
	if(isset($fee_school_year) && $fee_school_year=='Submit'){
	   if(isset($feecategories) && $feecategories==""){
	    $errormessage[0]="Please Select Fee Category";
	}
		if(count($errormessage)==0){
		if($pre_year!=$current_yearid){
	    $sel_fee = "SELECT CLS.es_classname, CLS.es_classesid, FEE.fee_amount, COUNT(PAD.pre_class) AS students 
					  FROM `es_feemaster` FEE, `es_classes` CLS, es_preadmission_details PAD
					  WHERE  PAD.pre_class = CLS.es_classesid 
					  AND FEE.fee_class = CLS.es_classesid 
					  AND FEE.fee_particular = '".$feecategories."'
					  AND FEE.fee_fromdate   = '" . $from_finance . "' 
					  AND FEE.fee_todate     = '" . $to_finance . "'
					  AND PAD.pre_fromdate   = '" . $from_acad . "'
					  AND PAD.pre_todate     = '" . $to_acad . "'  
					  AND PAD.status !='inactive'    
					  GROUP BY PAD.pre_class ";
		}else{
		//to fetch fee as per class and category
				 $sel_fee = "SELECT CLS.es_classname, CLS.es_classesid, FEE.fee_amount, COUNT(PRE.pre_class) AS students 
					  FROM `es_feemaster` FEE, `es_classes` CLS, `es_preadmission` PRE 
					  WHERE  PRE.pre_class = CLS.es_classesid 
					  AND FEE.fee_class = CLS.es_classesid 
					  AND FEE.fee_particular = '".$feecategories."'
					  AND FEE.fee_fromdate = '" . $from_finance . "' 
					  AND FEE.fee_todate = '" . $to_finance . "' 
					  AND PRE.pre_fromdate   = '" . $from_acad . "'
					  AND PRE.pre_todate     = '" . $to_acad . "'    
					  AND PRE.status !='inactive'    
					  GROUP BY PRE.pre_class ";
			}
					  
        $no_rows = count(getamultiassoc($sel_fee));
		$fee_exe_det = getamultiassoc($sel_fee);
	   	// total paid fee as per category and class	
	  $sel_tfee = "SELECT SUM( `feeamount` ) AS amount, class  FROM `es_feepaid` 
	                WHERE `particulartname`='".$feecategories."' 
					AND fi_fromdate = '" . $from_finance . "' 
					AND fi_todate   = '" . $to_finance . "'
					".$condition ."
					GROUP BY `class`";
	   $tfee_exe_det = getamultiassoc($sel_tfee);
	   //array_print($tfee_exe_det);
	   $count = count($tfee_exe_det);
	   }
	   }
	
    }
  }
   
  ?>
  
 <?php
  //to print categorywisefee
  if ($action == 'print_categorywisefee') {  
  if($dc1!=""){
  $pageUrl = "&dc1=$dc1";
$d1 = formatDateCalender($dc1);
if($d1<$from_finance || $d1>$to_finance){
$errormessage[1]=" From date is not matching with Finanacial year";
}
} if($dc2!=""){
  $pageUrl .= "&dc2=$dc2";
	$d2 = formatDateCalender($dc2);
if($d2<$from_finance || $d2>$to_finance){
$errormessage[2]=" To date is not matching with Finanacial year";

}
}
	if(count($errormessage)==0){
    //to fetch categories
	if (isset($dc1)&&$dc1!=""&& isset($dc2)&&$dc2!=""){
			$condition .=  " AND  date BETWEEN '$d1' AND '$d2'";
		}else{
			if (isset($dc1)&&$dc1!=""){
				$condition .=  " AND `date` >= '$d1' "; 
			}
			if (isset($dc2)&&$dc2!=""){
				$condition .=  " AND `date` <= '$d2' ";
			}
		}
  
    //to fetch categories
	$sel_fees_cat = "SELECT DISTINCT fee_particular FROM es_feemaster"; 
    $fees_cat_det = getamultiassoc($sel_fees_cat);	
	
	
		if($pre_year!=$current_yearid){
	    $sel_fee = "SELECT CLS.es_classname, CLS.es_classesid, FEE.fee_amount, COUNT(PAD.pre_class) AS students 
					  FROM `es_feemaster` FEE, `es_classes` CLS, es_preadmission_details PAD
					  WHERE  PAD.pre_class = CLS.es_classesid 
					  AND FEE.fee_class = CLS.es_classesid 
					  AND FEE.fee_particular = '".$feecategories."'
					  AND FEE.fee_fromdate   = '" . $from_finance . "' 
					  AND FEE.fee_todate     = '" . $to_finance . "'
					  AND PAD.pre_fromdate   = '" . $from_acad . "'
					  AND PAD.pre_todate     = '" . $to_acad . "'  
					   AND PAD.status !='inactive'      
					  GROUP BY PAD.pre_class ";
		}else{
		//to fetch fee as per class and category
				 $sel_fee = "SELECT CLS.es_classname, CLS.es_classesid, FEE.fee_amount, COUNT(PRE.pre_class) AS students 
					  FROM `es_feemaster` FEE, `es_classes` CLS, `es_preadmission` PRE 
					  WHERE  PRE.pre_class = CLS.es_classesid 
					  AND FEE.fee_class = CLS.es_classesid 
					  AND FEE.fee_particular = '".$feecategories."'
					  AND FEE.fee_fromdate = '" . $from_finance . "' 
					  AND FEE.fee_todate = '" . $to_finance . "' 
					  AND PRE.pre_fromdate   = '" . $from_acad . "'
					  AND PRE.pre_todate     = '" . $to_acad . "'  
					   AND PRE.status !='inactive'        
					  GROUP BY PRE.pre_class ";
			}
		
		
					  
        
		$fee_exe_det = getamultiassoc($sel_fee);
	   	// total paid fee as per category and class	
	  $sel_tfee = "SELECT SUM( `feeamount` ) AS amount, class  FROM `es_feepaid` 
	                WHERE `particulartname`='".$feecategories."' 
					AND fi_fromdate = '" . $from_finance . "' 
					AND fi_todate   = '" . $to_finance . "'
					".$condition."
					GROUP BY `class`";
	   $tfee_exe_det = getamultiassoc($sel_tfee);
	   $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_feepaid','Fee Payment','Category Wise Details','".$feecategories."','PRINT Category Wise Fee Paid / Pending','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
	}
	 
  
  }
   
  ?>
  <?php
   if ($action == 'fee_paid_list' ) { 
    //to fetch categories
	$sel_fees_cat = "SELECT DISTINCT fee_particular FROM es_feemaster"; 
    $fees_cat_det = getamultiassoc($sel_fees_cat);
	
if(isset($fee_school_year) && $fee_school_year=='Submit'){
if($dc1!=""){
$d1 = formatDateCalender($dc1);
if($d1<$from_finance || $d1>$to_finance){
$errormessage[1]=" From date is not matching with Finanacial year";
}
} if($dc2!=""){
	$d2 = formatDateCalender($dc2);
if($d2<$from_finance || $d2>$to_finance){
$errormessage[2]=" To date is not matching with Finanacial year";

}
}

if(count($errormessage)==0){
$condition=" ";
if($feecategories=="all"){
$condition=" ";
}else{
$condition.="AND F.particulartname = '".$feecategories."'";
}
if (isset($dc1)&&$dc1!=""&& isset($dc2)&&$dc2!=""){
			$condition .=  " AND  F.date BETWEEN '$d1' AND '$d2'";
		}else{
			if (isset($dc1)&&$dc1!=""){
				$condition .=  " AND F.`date` >= '$d1' "; 
			}
			if (isset($dc2)&&$dc2!=""){
				$condition .=  " AND F.`date` <= '$d2' ";
			}
		}
 if($pre_year!=$current_yearid){
   $sel_fee = "SELECT DISTINCT(V.es_receiptno) , PA.es_preadmissionid,PA.pre_name,PA.pre_fathername,CLS.es_classname,V.es_paymentmode,V.es_receiptno,F.* FROM  es_preadmission PA,es_classes CLS ,es_voucherentry V RIGHT JOIN es_feepaid F ON(V.es_voucherentryid = F.es_voucherentryid ) where PA.es_preadmissionid=F.studentid and F.class=CLS.es_classesid ".$condition ." AND F.fi_fromdate = '" . $from_finance . "' AND F.fi_todate = '" . $to_finance . "'  ORDER BY F.particulartname ASC";
		}else{
	  $sel_fee = "SELECT  DISTINCT(V.es_receiptno) ,PA.es_preadmissionid,PA.pre_name,PA.pre_fathername,CLS.es_classname,V.es_paymentmode,V.es_receiptno,  F.*  from es_preadmission PA,es_classes CLS ,es_preadmission_details PAD ,es_voucherentry V RIGHT JOIN es_feepaid F ON(V.es_voucherentryid = F.es_voucherentryid )  where PAD.es_preadmissionid=F.studentid  and  PA.es_preadmissionid=F.studentid and F.class=CLS.es_classesid  ".$condition ." AND F.fi_fromdate = '" . $from_finance . "' AND F.fi_todate = '" . $to_finance . "'  order by F.particulartname ASC ";
}
 $no_rows = count(getamultiassoc($sel_fee));
	$fee_exe_det = getamultiassoc($sel_fee);
	
	
    }
	
	}
  }
  ?>
  <?php if($action=="fee_paid_listprint"){
   
    //to fetch categories
	$sel_fees_cat = "SELECT DISTINCT fee_particular FROM es_feemaster"; 
    $fees_cat_det = getamultiassoc($sel_fees_cat);
	
if(isset($fee_school_year) && $fee_school_year=='Submit'){
if($dc1!=""){
$d1 = formatDateCalender($dc1);
if($d1<$from_finance || $d1>$to_finance){
$errormessage[1]=" From date is not matching with Finanacial year";
}
} if($dc2!=""){
	$d2 = formatDateCalender($dc2);
if($d2<$from_finance || $d2>$to_finance){
$errormessage[2]=" To date is not matching with Finanacial year";

}
}

if(count($errormessage)==0){
$condition=" ";
if($feecategories=="all"){
$condition=" ";
}else{
$condition.="AND F.particulartname = '".$feecategories."'";
}
if (isset($dc1)&&$dc1!=""&& isset($dc2)&&$dc2!=""){
			$condition .=  " AND  F.date BETWEEN '$d1' AND '$d2'";
		}else{
			if (isset($dc1)&&$dc1!=""){
				$condition .=  " AND F.`date` >= '$d1' "; 
			}
			if (isset($dc2)&&$dc2!=""){
				$condition .=  " AND F.`date` <= '$d2' ";
			}
		}
 if($pre_year!=$current_yearid){
  $sel_fee = "SELECT  DISTINCT(V.es_receiptno) ,PA.es_preadmissionid,PA.pre_name,PA.pre_fathername,CLS.es_classname,V.es_paymentmode,V.es_receiptno,F.* from es_preadmission PA,es_classes CLS ,es_voucherentry V RIGHT JOIN es_feepaid F ON(V.es_voucherentryid = F.es_voucherentryid ) where PA.es_preadmissionid=F.studentid and F.class=CLS.es_classesid  ".$condition ." AND F.fi_fromdate = '" . $from_finance . "' AND F.fi_todate = '" . $to_finance . "' order by F.particulartname ASC";
		}else{
	 $sel_fee = "SELECT DISTINCT(V.es_receiptno) , PA.es_preadmissionid,PA.pre_name,PA.pre_fathername,CLS.es_classname,V.es_paymentmode,V.es_receiptno, F.* from es_preadmission PA,es_classes CLS ,es_preadmission_details PAD ,es_voucherentry V RIGHT JOIN es_feepaid F ON(V.es_voucherentryid = F.es_voucherentryid ) where PAD.es_preadmissionid=F.studentid  and  PA.es_preadmissionid=F.studentid and F.class=CLS.es_classesid  ".$condition ." AND F.fi_fromdate = '" . $from_finance . "' AND F.fi_todate = '" . $to_finance . "' order by F.particulartname ASC ";
}
 $no_rows = count(getamultiassoc($sel_fee));
	$fee_exe_det = getamultiassoc($sel_fee);
	
	$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_feepaid','Fee Payment','Paid Fee [Category]','','PRINT Category Wise Fee Paid','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
		
	
	
    }
	
	}
  
  
 }?>
  
   <?php
   if ($action == 'classwisepayment_list' ) { 
    //to fetch categories
	$sel_fees_cat = "SELECT DISTINCT fee_particular FROM es_feemaster"; 
    $fees_cat_det = getamultiassoc($sel_fees_cat);
	
if(isset($fee_school_year) && $fee_school_year=='Submit'){
if($dc1!=""){
$d1 = formatDateCalender($dc1);
if($d1<$from_finance || $d1>$to_finance){
$errormessage[1]=" From date is not matching with Finanacial year";
}
} if($dc2!=""){
	$d2 = formatDateCalender($dc2);
if($d2<$from_finance || $d2>$to_finance){
$errormessage[2]=" To date is not matching with Finanacial year";

}
}

if(count($errormessage)==0){
$condition=" ";
if($pre_class=="all"){
$condition=" ";
}else{
$condition.="AND F.class = '".$pre_class."'";
}
if (isset($dc1)&&$dc1!=""&& isset($dc2)&&$dc2!=""){
			$condition .=  " AND  F.date BETWEEN '$d1' AND '$d2'";
		}else{
			if (isset($dc1)&&$dc1!=""){
				$condition .=  " AND F.`date` >= '$d1' "; 
			}
			if (isset($dc2)&&$dc2!=""){
				$condition .=  " AND F.`date` <= '$d2' ";
			}
		}
 if($pre_year!=$current_yearid){
  $sel_fee = "SELECT   DISTINCT(V.es_receiptno) ,PA.es_preadmissionid,PA.pre_name,PA.pre_fathername,CLS.es_classname,V.es_paymentmode,V.es_receiptno,F.* from es_preadmission PA,es_classes CLS ,es_voucherentry V RIGHT JOIN es_feepaid F ON(V.es_voucherentryid = F.es_voucherentryid ) where PA.es_preadmissionid=F.studentid and F.class=CLS.es_classesid  ".$condition ." AND F.fi_fromdate = '" . $from_finance . "' AND F.fi_todate = '" . $to_finance . "'  order by F.particulartname ASC";
		}else{
	  $sel_fee = "SELECT  DISTINCT(V.es_receiptno) ,PA.es_preadmissionid,PA.pre_name,PA.pre_fathername,CLS.es_classname,V.es_paymentmode,V.es_receiptno, F.* from es_preadmission PA,es_classes CLS ,es_preadmission_details PAD ,es_voucherentry V RIGHT JOIN es_feepaid F ON(V.es_voucherentryid = F.es_voucherentryid ) where PAD.es_preadmissionid=F.studentid  and  PA.es_preadmissionid=F.studentid and F.class=CLS.es_classesid  ".$condition ." AND F.fi_fromdate = '" . $from_finance . "' AND F.fi_todate = '" . $to_finance . "'  order by F.particulartname ASC ";
}
 $no_rows = count(getamultiassoc($sel_fee));
	$fee_exe_det = getamultiassoc($sel_fee);
	
	
    }
	
	}
  }
  ?>
   <?php
   if ($action == 'classwisepayment_listprint' ) { 
    //to fetch categories
	$sel_fees_cat = "SELECT DISTINCT fee_particular FROM es_feemaster"; 
    $fees_cat_det = getamultiassoc($sel_fees_cat);
	
if(isset($fee_school_year) && $fee_school_year=='Submit'){
if($dc1!=""){
$d1 = formatDateCalender($dc1);
if($d1<$from_finance || $d1>$to_finance){
$errormessage[1]=" From date is not matching with Finanacial year";
}
} if($dc2!=""){
	$d2 = formatDateCalender($dc2);
if($d2<$from_finance || $d2>$to_finance){
$errormessage[2]=" To date is not matching with Finanacial year";

}
}

if(count($errormessage)==0){
$condition=" ";
if($pre_class=="all"){
$condition=" ";
}else{
$condition.="AND F.class = '".$pre_class."'";
}
if (isset($dc1)&&$dc1!=""&& isset($dc2)&&$dc2!=""){
			$condition .=  " AND  F.date BETWEEN '$d1' AND '$d2'";
		}else{
			if (isset($dc1)&&$dc1!=""){
				$condition .=  " AND F.`date` >= '$d1' "; 
			}
			if (isset($dc2)&&$dc2!=""){
				$condition .=  " AND F.`date` <= '$d2' ";
			}
		}
 if($pre_year!=$current_yearid){
  $sel_fee = "SELECT   DISTINCT(V.es_receiptno) ,PA.es_preadmissionid,PA.pre_name,PA.pre_fathername,CLS.es_classname,V.es_paymentmode,V.es_receiptno,F.* from es_preadmission PA,es_classes CLS ,es_voucherentry V RIGHT JOIN es_feepaid F ON(V.es_voucherentryid = F.es_voucherentryid ) where PA.es_preadmissionid=F.studentid and F.class=CLS.es_classesid  ".$condition ." AND F.fi_fromdate = '" . $from_finance . "' AND F.fi_todate = '" . $to_finance . "'  order by F.particulartname ASC";
		}else{
	  $sel_fee = "SELECT   DISTINCT(V.es_receiptno) ,PA.es_preadmissionid,PA.pre_name,PA.pre_fathername,CLS.es_classname,V.es_paymentmode,V.es_receiptno, F.* from es_preadmission PA,es_classes CLS ,es_preadmission_details PAD ,es_voucherentry V RIGHT JOIN es_feepaid F ON(V.es_voucherentryid = F.es_voucherentryid ) where PAD.es_preadmissionid=F.studentid  and  PA.es_preadmissionid=F.studentid and F.class=CLS.es_classesid  ".$condition ." AND F.fi_fromdate = '" . $from_finance . "' AND F.fi_todate = '" . $to_finance . "'  order by F.particulartname ASC ";
}
 $no_rows = count(getamultiassoc($sel_fee));
 
	$fee_exe_det = getamultiassoc($sel_fee);
	$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_feepaid','Fee Payment','Paid Fee [Category]','','PRINT Class Wise Fee Paid','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
	
	
    }
	
	}
  }
  
  
if($action=='installment_fines' ||  $action == 'print_list'){
$html_obj = new html_form();
$vlc = new FormValidation();
			$condition = "";
		if(isset($search_all_otherfines) && $search_all_otherfines!=""){
			$PageUrl = "&search_all_otherfines=$search_all_otherfines";
			if(isset($dc1) && $dc1!=""){$from = func_date_conversion("d/m/Y","Y-m-d",$dc1);}
			if(isset($dc2) && $dc2!=""){$to = func_date_conversion("d/m/Y","Y-m-d",$dc2);}
			
			if($from!="" && $to!=""){
				$condition .= " AND fcc.date BETWEEN '".$from."' AND '".$to."'";
				$PageUrl .="&dc1=$dc1&dc2=$dc2";
			}
			if($from!="" && $to==""){
				$condition .= " AND fcc.date >= '".$from."' ";
				$PageUrl .="&dc1=$dc1";
			}
			if($from=="" && $to!=""){
				$condition .= " AND fcc.date <= '".$to."' ";
				$PageUrl .="&dc2=$dc2";
			}
			if($vlc->is_allnumbers($es_preadmissionid)){
				$condition .= " AND fcc.studentid = '".$es_preadmissionid."' ";
				$PageUrl .="&es_preadmissionid=$es_preadmissionid";
			}
			}
			
			
			
			
			$ins_fines_qry = "SELECT * FROM es_fine_charged_collected fcc , es_preadmission pre  WHERE fcc.studentid = pre.es_preadmissionid  ".$condition." ";
			$no_rows = sqlnumber($ins_fines_qry);
			if(!isset($start)){$start=0;}
			$q_limit = 20;
			$ins_fines_qry .=" ORDER BY es_fcc_id LIMIT ".$start." , ".$q_limit." ";
			$fine_charged_details = $db->getrows($ins_fines_qry );
			
			if($action=='print_list'){
			$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_feepaid','Fee Payment','Installment Fines','','PRINT Installment Fines charged','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
	}


}
if(isset($get_student_receipts) && $get_student_receipts!=""){

$sqlquery = "SELECT pre_class FROM es_preadmission_details WHERE `es_preadmissionid` ='".$studentid."' 
	                          AND pre_fromdate = '" . $from_acad . "' AND pre_todate= '" . $to_acad . "' ";
		  $prev_class_exe = getarrayassoc($sqlquery);
		  $prev_class = $prev_class_exe['pre_class'];	
         if (sqlnumber($sqlquery)==0){
		     $errormessage[0]="Student Does Not Exist"; 	
	      }
		  $studetails = $db->getrow("SELECT * FROM es_preadmission WHERE es_preadmissionid='".$studentid."'");
		  $section_det = $db->getrow("SELECT * FROM es_sections_student SS , es_sections S WHERE 	SS.student_id='".$studentid."' AND SS.course_id='".$prev_class."' AND SS.section_id=S.section_id ");
	 if (count($errormessage)==0){
	 	$receipt_sql = "SELECT * FROM es_feepaid_new WHERE es_preadmissionid='".$studentid."' AND financemaster_id = '".$pre_year ."' ORDER BY fid DESC ";
		$std_rcpt_det = $db->getrows($receipt_sql);
	 
	 }
	 $PageUrl = "&get_student_receipts=GO&studentid=$studentid&pre_year=$pre_year";
}

if($action=='print_each_receipt'){
 $sqlquery = "SELECT pre_class FROM es_preadmission_details WHERE `es_preadmissionid` ='".$studentid."' 
	                          AND pre_fromdate = '" . $from_acad . "' AND pre_todate= '" . $to_acad . "' ";
		  $prev_class_exe = getarrayassoc($sqlquery);
		  $prev_class = $prev_class_exe['pre_class'];	
$studetails = $db->getrow("SELECT * FROM es_preadmission WHERE es_preadmissionid='".$studentid."'");
$section_det = $db->getrow("SELECT * FROM es_sections_student SS , es_sections S WHERE 	SS.student_id='".$studentid."' AND SS.course_id='".$prev_class."' AND SS.section_id=S.section_id ");

		     $recept_det_sql = "SELECT * FROM es_feepaid_new WHERE fid='".$rid."' ";
		     $receipt_det = $db->getrow($recept_det_sql);
			 $sql_fee_det = "SELECT * FROM es_feepaid_new_details WHERE fid ='".$rid."'";
			 $fee_det = $db->getrows($sql_fee_det );
			
}


if($action=='print_each_receipt2'){
 $sqlquery = "SELECT pre_class FROM es_preadmission_details WHERE `es_preadmissionid` ='".$studentid."' 
	                          AND pre_fromdate = '" . $from_acad . "' AND pre_todate= '" . $to_acad . "' ";
		  $prev_class_exe = getarrayassoc($sqlquery);
		  $prev_class = $prev_class_exe['pre_class'];	
$studetails = $db->getrow("SELECT * FROM es_preadmission WHERE es_preadmissionid='".$studentid."'");
$section_det = $db->getrow("SELECT * FROM es_sections_student SS , es_sections S WHERE 	SS.student_id='".$studentid."' AND SS.course_id='".$prev_class."' AND SS.section_id=S.section_id ");

		     $recept_det_sql = "SELECT * FROM es_feepaid_new WHERE fid='".$rid."' ";
		     $receipt_det = $db->getrow($recept_det_sql);
			 $sql_fee_det = "SELECT * FROM es_feepaid_new_details WHERE fid ='".$rid."'";
			 $fee_det = $db->getrows($sql_fee_det );
			
}


//SELECT SUM( es_amount ) , DATE_FORMAT( es_receiptdate, '%M , %Y' ) FROM `es_voucherentry` GROUP BY DATE_FORMAT( es_receiptdate, '%M , %Y' ) LIMIT 0 , 30 

if(isset($get_fee_card) && $get_fee_card!=""){

		 $sqlquery = "SELECT pre_class FROM es_preadmission_details WHERE `es_preadmissionid` ='".$studentid."' 
	                          AND pre_fromdate = '" . $from_acad . "' AND pre_todate= '" . $to_acad . "' ";
		  $prev_class_exe = getarrayassoc($sqlquery);
		  $prev_class = $prev_class_exe['pre_class'];	
         if (sqlnumber($sqlquery)==0){
		     $errormessage[0]="Student Does Not Exist"; 	
	      }
		 
	 if (count($errormessage)==0){
	 $getfeelistsql = "SELECT * FROM `es_feemaster` WHERE `fee_class`='".$prev_class."' 
				                  AND fee_fromdate = '" . $from_finance . "' AND fee_todate = '" . $to_finance . "'";
				$getfeelist = getamultiassoc($getfeelistsql);
		
		 $section_det = $db->getrow("SELECT * FROM es_sections_student SS , es_sections S WHERE SS.student_id='".$studentid."' AND SS.course_id='".$prev_class."' AND SS.section_id=S.section_id ");
		 $stud_details = get_studentdetails($studentid);		
	 
		$yr_arr = explode("-", $from_acad);
		
		
	   $sel_studentwise_rec = "SELECT SUM(fine_amount),SUM(paid_amount),SUM(deduction_allowed), MONTHNAME( created_on ),YEAR( created_on ) FROM es_other_fine_dettails WHERE es_preadmissionid=".$studentid." GROUP BY MONTHNAME( created_on ) ,YEAR( created_on )";
			$misc_det = $db->getrows($sel_studentwise_rec);
			
			foreach($misc_det as $each){
				$misc_arr[$each['YEAR( created_on )']][$each['MONTHNAME( created_on )']]=number_format($each['SUM(fine_amount)'],2,'.','');
				$misc_paid_arr[$each['YEAR( created_on )']][$each['MONTHNAME( created_on )']]=number_format($each['SUM(paid_amount)'],2,'.','');
				 $misc_wave_arr[$each['YEAR( created_on )']][$each['MONTHNAME( created_on )']]=number_format($each['SUM(deduction_allowed)'],2,'.','');
			}
			
		
			
          $sql_tr="SELECT SUM(pay_amount),SUM(amount_paid),SUM(deduction), MONTHNAME( due_month ),YEAR( due_month ) FROM es_trans_payment_history  WHERE studentid= ".$studentid." GROUP BY MONTHNAME( due_month ) ,YEAR( due_month )";
			$tr_row = $db->getRows($sql_tr);
			
			foreach($tr_row as $each){
				$trans_arr[$each['YEAR( due_month )']][$each['MONTHNAME( due_month )']]=number_format($each['SUM(pay_amount)'],2,'.','');
				$trans_paid_arr[$each['YEAR( due_month )']][$each['MONTHNAME( due_month )']]=number_format($each['SUM(amount_paid)'],2,'.','');
				$trans_wave_arr[$each['YEAR( due_month )']][$each['MONTHNAME( due_month )']]=number_format($each['SUM(deduction)'],2,'.','');
			}
			
		
			
			$sql_stationary="SELECT SUM(total_amount),SUM(paid_amount), MONTHNAME( saled_date ),YEAR( saled_date ) FROM es_stationary_payment  WHERE student_id= ".$studentid." GROUP BY MONTHNAME( saled_date ) ,YEAR( saled_date )";
			$stationary_row = $db->getRows($sql_stationary);
			
			foreach($stationary_row as $each){
				$station_arr[$each['YEAR( saled_date )']][$each['MONTHNAME( saled_date )']]=number_format($each['SUM(total_amount)'],2,'.','');
				$station_paid_arr[$each['YEAR( saled_date )']][$each['MONTHNAME( saled_date )']]=number_format($each['SUM(paid_amount)'],2,'.','');
				
			}
		
			$sql_libfine="SELECT SUM(es_libbookfine),SUM(fine_paid),SUM(fine_deducted), MONTHNAME( es_libbookdate ),YEAR( es_libbookdate ) FROM es_libbookfinedet  WHERE es_libbooksid= ".$studentid." AND es_type='student' GROUP BY MONTHNAME( es_libbookdate ),YEAR( es_libbookdate )";
			$lib_row = $db->getRows($sql_libfine);
			
			foreach($lib_row as $each){
				$libfine_arr[$each['YEAR( es_libbookdate )']][$each['MONTHNAME( es_libbookdate )']]=number_format($each['SUM(es_libbookfine)'],2,'.','');
				$libfine_paid_arr[$each['YEAR( es_libbookdate )']][$each['MONTHNAME( es_libbookdate )']]=number_format($each['SUM(fine_paid)'],2,'.','');
				$libfine_wave_arr[$each['YEAR( es_libbookdate )']][$each['MONTHNAME( es_libbookdate )']]=number_format($each['SUM(fine_deducted)'],2,'.','');
			}
			
			$sql_hostel="SELECT SUM(room_rate),SUM(amount_paid),SUM(deduction), MONTHNAME( due_month ),YEAR( due_month ),SUM(amount_paid) FROM es_hostel_charges  WHERE es_personid= ".$studentid." AND es_persontype='student' GROUP BY MONTHNAME( due_month ),YEAR( due_month )";
			$hostel_row = $db->getRows($sql_hostel);
			
			foreach($hostel_row as $each){
				$hostel_arr[$each['YEAR( due_month )']][$each['MONTHNAME( due_month )']]=number_format($each['SUM(room_rate)'],2,'.','');
				$hostel_paid_arr[$each['YEAR( due_month )']][$each['MONTHNAME( due_month )']]=number_format($each['SUM(amount_paid)'],2,'.','');
					$hostel_wave_arr[$each['YEAR( due_month )']][$each['MONTHNAME( due_month )']]=number_format($each['SUM(deduction)'],2,'.','');
				
			}
			
		$sql_examfee = "SELECT SUM(fine_amount),SUM(paid_amount),SUM(deduction_allowed), MONTHNAME( created_on ),YEAR( created_on ) FROM es_examfee WHERE es_preadmissionid=".$studentid." GROUP BY MONTHNAME( created_on ) ,YEAR( created_on )";
			$exam_det = $db->getrows($sql_examfee);
			
			foreach($exam_det as $each){
				$examfee_arr[$each['YEAR( created_on )']][$each['MONTHNAME( created_on )']]=number_format($each['SUM(fine_amount)'],2,'.','');
				
				$paid_arr[$each['YEAR( created_on )']][$each['MONTHNAME( created_on )']]=number_format($each['SUM(paid_amount)'],2,'.','');
				$paid_wave_arr[$each['YEAR( created_on )']][$each['MONTHNAME( created_on )']]=number_format($each['SUM(deduction_allowed)'],2,'.','');
			}

			
			
			 $sql_oldbalpaid = "SELECT SUM(old_balance),SUM(paid_amount),SUM(wived_amount), MONTHNAME( created_on ),YEAR( created_on ) FROM es_old_balances WHERE studentid = ".$studentid." GROUP BY MONTHNAME( created_on ),YEAR( created_on )";
			$balance_row = $db->getrows($sql_oldbalpaid);
			
			foreach($balance_row as $each){
				 $oldbal_arr[$each['YEAR( created_on )']][$each['MONTHNAME( created_on )']]=number_format($each['SUM(old_balance)'],2,'.','');
				$oldbal_paid_arr[$each['YEAR( created_on )']][$each['MONTHNAME( created_on )']]=number_format($each['SUM(paid_amount)'],2,'.','');
				$oldbal_wave_arr[$each['YEAR( created_on )']][$each['MONTHNAME( created_on )']]=number_format($each['SUM(wived_amount)'],2,'.','');
				
			}
			
			
			$sql_feemaster = "SELECT * FROM es_feemaster WHERE fee_class='".$prev_class."'";
				$feemaster_det = $db->getrows($sql_feemaster);
				//array_print($feemaster_det);
				
				foreach($feemaster_det as $each){
					if($each['fee_instalments']==1){
					//$fullfeemaster_arr[$yr_arr[0]][$month_arr[1]][$each['fee_particular']] = $each['fee_amount'];
					$fullfeemaster_arr[$yr_arr[0]][$month_arr[1]][$each['fee_particular']] = number_format($each['fee_amount'], 2, '.', '');
							//$each['fee_amount'];
					
					}else{
							for($i=0;$i<count($month_arr);$i++){
								$sr = $i+1;
								if($sr<10){$year_card = $yr_arr[0];}else{$year_card = $yr_arr[0]+1;}
					    //  $fullfeemaster_arr[$year_card][$month_arr[$sr]][$each['fee_particular']]=ceil($each['fee_amount']/12);
						   $fullfeemaster_arr[$year_card][$month_arr[$sr]][$each['fee_particular']]=number_format(($each['fee_amount']/12), 2, '.', '');
						  }
					
					}
				}
				//$amttopayfee_inst = number_format($amttopayfee_inst_1, 2, '.', '');
				
				$sql_ins_fime="SELECT SUM(fine_amount),SUM(amount_paid),SUM(deduction_allowed), MONTHNAME( date ),YEAR( date )  FROM es_fine_charged_collected WHERE studentid= ".$studentid." GROUP BY MONTHNAME( date ),YEAR( date )";
			   $installmentfine_row = $db->getRows($sql_ins_fime);	
			   
			   foreach($installmentfine_row as $each){
				$ins_fine_arr[$each['YEAR( date )']][$each['MONTHNAME( date )']]=number_format($each['SUM(fine_amount)'],2,'.','');
				$ins_fine_paid_arr[$each['YEAR( date )']][$each['MONTHNAME( date )']]=number_format($each['SUM(amount_paid)'],2,'.','');
				$ins_wave_paid_arr[$each['YEAR( date )']][$each['MONTHNAME( date )']]=number_format($each['SUM(deduction_allowed)'],2,'.','');
				}
	
				 $newfee_master_paid_sql = "SELECT SUM(paid) as totpaid, MONTHNAME( paid_on ),YEAR( paid_on )FROM es_feepaid_new WHERE es_preadmissionid = ".$studentid." GROUP BY MONTHNAME( paid_on ),YEAR( paid_on )";
	          $newfee_paid_det = $db->getrows($newfee_master_paid_sql);
			   
			   foreach($newfee_paid_det as $each){
				$newfee_arr_paid[$each['YEAR( paid_on )']][$each['MONTHNAME( paid_on )']]= number_format($each['totpaid'], 2, '.', '');
				
				//$each['totpaid'];
				$newfee_arr_balance[$each['YEAR( paid_on )']][$each['MONTHNAME( paid_on )']]=number_format($each['totpaid'],2,'.','');;
				
				}
				
	 
	 $PageUrl = "&studentid=$studentid&pre_year=$pre_year";
  }
}

if($action=='print_fee_card'){ $sqlquery = "SELECT pre_class FROM es_preadmission_details WHERE `es_preadmissionid` ='".$studentid."' 
	                          AND pre_fromdate = '" . $from_acad . "' AND pre_todate= '" . $to_acad . "' ";
		  $prev_class_exe = getarrayassoc($sqlquery);
		  $prev_class = $prev_class_exe['pre_class'];

	 $getfeelistsql = "SELECT * FROM `es_feemaster` WHERE `fee_class`='".$prev_class."' 
				                  AND fee_fromdate = '" . $from_finance . "' AND fee_todate = '" . $to_finance . "'";
				$getfeelist = getamultiassoc($getfeelistsql);
		
		 $section_det = $db->getrow("SELECT * FROM es_sections_student SS , es_sections S WHERE SS.student_id='".$studentid."' AND SS.course_id='".$prev_class."' AND SS.section_id=S.section_id ");
		 $stud_details = get_studentdetails($studentid);		
	 
		$yr_arr = explode("-", $from_acad);
		
		
	  $sel_studentwise_rec = "SELECT SUM(fine_amount),SUM(paid_amount),SUM(deduction_allowed), MONTHNAME( created_on ),YEAR( created_on ) FROM es_other_fine_dettails WHERE es_preadmissionid=".$studentid." GROUP BY MONTHNAME( created_on ) ,YEAR( created_on )";
			$misc_det = $db->getrows($sel_studentwise_rec);
			
			foreach($misc_det as $each){
				$misc_arr[$each['YEAR( created_on )']][$each['MONTHNAME( created_on )']]=number_format($each['SUM(fine_amount)'],2,'.','');
				$misc_paid_arr[$each['YEAR( created_on )']][$each['MONTHNAME( created_on )']]=number_format($each['SUM(paid_amount)'],2,'.','');
				$misc_wave_arr[$each['YEAR(created_on)']][$each['MONTHNAME( created_on )']]=number_format($each['SUM(deduction_allowed)'],2,'.','');
			}
			
	
          $sql_tr="SELECT SUM(pay_amount),SUM(amount_paid),SUM(deduction), MONTHNAME( due_month ),YEAR( due_month ) FROM es_trans_payment_history  WHERE studentid= ".$studentid." GROUP BY MONTHNAME( due_month ) ,YEAR( due_month )";
			$tr_row = $db->getRows($sql_tr);
			
			foreach($tr_row as $each){
				$trans_arr[$each['YEAR( due_month )']][$each['MONTHNAME( due_month )']]=number_format($each['SUM(pay_amount)'],2,'.','');
				$trans_paid_arr[$each['YEAR( due_month )']][$each['MONTHNAME( due_month )']]=number_format($each['SUM(amount_paid)'],2,'.','');
				$trans_wave_arr[$each['YEAR( due_month )']][$each['MONTHNAME( due_month )']]=number_format($each['SUM(deduction)'],2,'.','');
			}
	
			$sql_stationary="SELECT SUM(total_amount),SUM(paid_amount), MONTHNAME( saled_date ),YEAR( saled_date ) FROM es_stationary_payment  WHERE student_id= ".$studentid." GROUP BY MONTHNAME( saled_date ) ,YEAR( saled_date )";
			$stationary_row = $db->getRows($sql_stationary);
			
			foreach($stationary_row as $each){
				$station_arr[$each['YEAR( saled_date )']][$each['MONTHNAME( saled_date )']]=number_format($each['SUM(total_amount)'],2,'.','');
				$station_paid_arr[$each['YEAR( saled_date )']][$each['MONTHNAME( saled_date )']]=number_format($each['SUM(paid_amount)'],2,'.','');
				
			}
			

			$sql_libfine="SELECT SUM(es_libbookfine),SUM(fine_paid),SUM(fine_deducted), MONTHNAME( es_libbookdate ),YEAR( es_libbookdate ) FROM es_libbookfinedet  WHERE es_libbooksid= ".$studentid." AND es_type='student' GROUP BY MONTHNAME( es_libbookdate ),YEAR( es_libbookdate )";
			$lib_row = $db->getRows($sql_libfine);
			
			foreach($lib_row as $each){
				$libfine_arr[$each['YEAR( es_libbookdate )']][$each['MONTHNAME( es_libbookdate )']]=number_format($each['SUM(es_libbookfine)'],2,'.','');
				$libfine_paid_arr[$each['YEAR( es_libbookdate )']][$each['MONTHNAME( es_libbookdate )']]=number_format($each['SUM(fine_paid)'],2,'.','');
				$libfine_wave_arr[$each['YEAR( es_libbookdate )']][$each['MONTHNAME( es_libbookdate )']]=number_format($each['SUM(fine_deducted)'],2,'.','');
			}
			

			$sql_hostel="SELECT SUM(room_rate),SUM(amount_paid),SUM(deduction), MONTHNAME( due_month ),YEAR( due_month ),SUM(amount_paid) FROM es_hostel_charges  WHERE es_personid= ".$studentid." AND es_persontype='student' GROUP BY MONTHNAME( due_month ),YEAR( due_month )";
			$hostel_row = $db->getRows($sql_hostel);
			
			foreach($hostel_row as $each){
				$hostel_arr[$each['YEAR( due_month )']][$each['MONTHNAME( due_month )']]=number_format($each['SUM(room_rate)'],2,'.','');
				$hostel_paid_arr[$each['YEAR( due_month )']][$each['MONTHNAME( due_month )']]=number_format($each['SUM(amount_paid)'],2,'.','');
					$hostel_wave_arr[$each['YEAR( due_month )']][$each['MONTHNAME( due_month )']]=number_format($each['SUM(deduction)'],2,'.','');
				
			}
			
		$sql_examfee = "SELECT SUM(fine_amount),SUM(paid_amount),SUM(deduction_allowed), MONTHNAME( created_on ),YEAR( created_on ) FROM es_examfee WHERE es_preadmissionid=".$studentid." GROUP BY MONTHNAME( created_on ) ,YEAR( created_on )";
			$exam_det = $db->getrows($sql_examfee);
			
			foreach($exam_det as $each){
				$examfee_arr[$each['YEAR( created_on )']][$each['MONTHNAME( created_on )']]=number_format($each['SUM(fine_amount)'],2,'.','');
				
				$paid_arr[$each['YEAR( created_on )']][$each['MONTHNAME( created_on )']]=number_format($each['SUM(paid_amount)'],2,'.','');
				$paid_wave_arr[$each['YEAR( created_on )']][$each['MONTHNAME( created_on )']]=number_format($each['SUM(deduction_allowed)'],2,'.','');
			}
			

			
			$sql_oldbalpaid = "SELECT SUM(old_balance),SUM(paid_amount),SUM(wived_amount), MONTHNAME( created_on ),YEAR( created_on ) FROM es_old_balances WHERE studentid = ".$studentid." GROUP BY MONTHNAME( created_on ),YEAR( created_on )";
			$balance_row = $db->getrows($sql_oldbalpaid);
			
			foreach($balance_row as $each){
				$oldbal_arr[$each['YEAR( created_on )']][$each['MONTHNAME( created_on )']]=number_format($each['SUM(old_balance)'],2,'.','');
				$oldbal_paid_arr[$each['YEAR( created_on )']][$each['MONTHNAME( created_on )']]=number_format($each['SUM(paid_amount)'],2,'.','');
				$oldbal_wave_arr[$each['YEAR( created_on )']][$each['MONTHNAME( created_on )']]=number_format($each['SUM(wived_amount)'],2,'.','');
				
			}
			
			
			
			$sql_feemaster = "SELECT * FROM es_feemaster WHERE fee_class='".$prev_class."'";
				$feemaster_det = $db->getrows($sql_feemaster);
				//array_print($feemaster_det);
				
				foreach($feemaster_det as $each){
					if($each['fee_instalments']==1){
					//$fullfeemaster_arr[$yr_arr[0]][$month_arr[1]][$each['fee_particular']] = $each['fee_amount'];
					$fullfeemaster_arr[$yr_arr[0]][$month_arr[1]][$each['fee_particular']] = number_format($each['fee_amount'], 2, '.', '');
							//$each['fee_amount'];
					
					}else{
							for($i=0;$i<count($month_arr);$i++){
								$sr = $i+1;
								if($sr<10){$year_card = $yr_arr[0];}else{$year_card = $yr_arr[0]+1;}
					    //  $fullfeemaster_arr[$year_card][$month_arr[$sr]][$each['fee_particular']]=ceil($each['fee_amount']/12);
						   $fullfeemaster_arr[$year_card][$month_arr[$sr]][$each['fee_particular']]=number_format(($each['fee_amount']/12), 2, '.', '');
						  }
					
					}
				}
				//$amttopayfee_inst = number_format($amttopayfee_inst_1, 2, '.', '');
				
				$sql_ins_fime="SELECT SUM(fine_amount),SUM(amount_paid),SUM(deduction_allowed), MONTHNAME( date ),YEAR( date )  FROM es_fine_charged_collected WHERE studentid= ".$studentid." GROUP BY MONTHNAME( date ),YEAR( date )";
			   $installmentfine_row = $db->getRows($sql_ins_fime);	
			   
			   foreach($installmentfine_row as $each){
				$ins_fine_arr[$each['YEAR( date )']][$each['MONTHNAME( date )']]=number_format($each['SUM(fine_amount)'],2,'.','');
				$ins_fine_paid_arr[$each['YEAR( date )']][$each['MONTHNAME( date )']]=number_format($each['SUM(amount_paid)'],2,'.','');
				$ins_wave_paid_arr[$each['YEAR( date )']][$each['MONTHNAME( date )']]=number_format($each['SUM(deduction_allowed)'],2,'.','');
				}
				
				/*$sql_ins_fime_paid="SELECT SUM(amount_paid), SUM(deduction_allowed), MONTHNAME( date ),YEAR( date )  FROM es_fine_charged_collected WHERE studentid= ".$studentid." GROUP BY MONTHNAME( date ),YEAR( date )";
			   $installmentfine_row_paid = $db->getRows($sql_ins_fime_paid);	
			   
			   foreach($installmentfine_row_paid as $each){
				 $ins_fine_arr_paid[$each['YEAR( date )']][$each['MONTHNAME( date )']]=$each['SUM(amount_paid)'];
				 $ins_fine_arr_waived[$each['YEAR( date )']][$each['MONTHNAME( date )']]=$each['SUM(deduction_allowed)'];
				}*/
				
				
				
				
				
				
			 /* $fee_master_paid_sql = "SELECT ceil(SUM(feeamount)) as totpaid,SUM(fee_waived), MONTHNAME( date ),YEAR( date )FROM es_feepaid WHERE studentid = ".$studentid." GROUP BY MONTHNAME( date ),YEAR( date )";
	          $fee_paid_det = $db->getrows($fee_master_paid_sql);
	 
	            foreach($fee_paid_det as $each){
				$fee_arr_paid[$each['YEAR( date )']][$each['MONTHNAME( date )']]=$each['totpaid'];
				$fee_arr_waived[$each['YEAR( date )']][$each['MONTHNAME( date )']]=$each['SUM(fee_waived)'];
				}*/
				//array_print($fee_arr_paid);
				 $newfee_master_paid_sql = "SELECT SUM(paid) as totpaid, MONTHNAME( paid_on ),YEAR( paid_on )FROM es_feepaid_new WHERE es_preadmissionid = ".$studentid." GROUP BY MONTHNAME( paid_on ),YEAR( paid_on )";
	          $newfee_paid_det = $db->getrows($newfee_master_paid_sql);
			   
			   foreach($newfee_paid_det as $each){
				$newfee_arr_paid[$each['YEAR( paid_on )']][$each['MONTHNAME( paid_on )']]= number_format($each['totpaid'], 2, '.', '');
				
				//$each['totpaid'];
				$newfee_arr_balance[$each['YEAR( paid_on )']][$each['MONTHNAME( paid_on )']]=number_format($each['totpaid'],2,'.','');;
				
				}
				
	 
	 $PageUrl = "&studentid=$studentid&pre_year=$pre_year";
  
         
}


if(isset($submit_fee_status) && $submit_fee_status!=""){

		$sql_get_all_fees = "SELECT * FROM es_feemaster WHERE fee_class='".$pre_class."' AND fee_fromdate = '" . $from_finance . "' AND fee_todate = '" . $to_finance . "'";
		$fee_det = $db->getrows($sql_get_all_fees);
		 /*$sql_students_rollno = "SELECT pre.es_preadmissionid,pre.fee_concession,pre.pre_name,S.section_name,SS.roll_no FROM es_preadmission pre LEFT JOIN 
		 es_sections_student SS ON(SS.student_id = pre.es_preadmissionid) LEFT JOIN  es_sections S ON(SS.section_id=S.section_id)
		WHERE  pre.pre_fromdate = '".$_SESSION['eschools']['from_acad']."'
		AND pre.pre_class = '".$pre_class."'
	    ORDER BY es_preadmissionid ASC ";*/
	//	pre_fromdate 	pre_todate 	
		
		 $sql_students_rollno = "SELECT pre.es_preadmissionid,pre.fee_concession,pre.pre_name,S.section_name,SS.roll_no FROM es_preadmission pre LEFT JOIN 
		 es_sections_student SS ON(SS.student_id = pre.es_preadmissionid) LEFT JOIN  es_sections S ON(SS.section_id=S.section_id)
		WHERE  pre.pre_fromdate = '" . $from_acad . "' AND pre.pre_todate= '" . $to_acad . "'
		AND pre.pre_class = '".$pre_class."'
	    ORDER BY es_preadmissionid ASC ";
		
		//AND pre_fromdate = '" . $from_acad . "' AND pre_todate= '" . $to_acad . "'
		$all_students_class =$db->getrows($sql_students_rollno);
		//array_print($all_students_class);
		 $sql_paid_fee = "SELECT es_preadmissionid,SUM(paid)   FROM es_feepaid_new
		WHERE paid!='' AND paid_on BETWEEN '".$from_finance."' AND '".$to_finance."' GROUP BY es_preadmissionid ";
		$paidfee_info = $db->getrows($sql_paid_fee);
	//	array_print($paidfee_info);
		//array_print($paidfee_info);
		foreach($paidfee_info as $each){
		 $student_paid[$each['es_preadmissionid']]=number_format($each['SUM(paid)'],2,'.','');
		}
		//array_print($student_paid);
		//array_print($student_waived);
		//echo $student_paid[1][1];
		 $_SESSION['eschools']['from_finance'];
	     $_SESSION['eschools']['to_finance'];
		   $sel_studentwise_rec = "SELECT SUM(fine_amount),SUM(paid_amount),SUM(deduction_allowed),es_preadmissionid FROM es_other_fine_dettails WHERE created_on BETWEEN '".$from_finance."' AND  '".$to_finance."' GROUP BY  es_preadmissionid";
			$misc_det = $db->getrows($sel_studentwise_rec);
		foreach($misc_det as $each){
		$misc_topay[$each['es_preadmissionid']]=number_format($each['SUM(fine_amount)'],2,'.','');
		$misc_paid[$each['es_preadmissionid']]=number_format($each['SUM(paid_amount)'],2,'.','');
		$misc_waived[$each['es_preadmissionid']]=number_format($each['SUM(deduction_allowed)'],2,'.','');
		}
		
			
			$sql_tr="SELECT SUM(pay_amount),SUM(amount_paid),SUM(deduction),studentid FROM es_trans_payment_history WHERE created_on BETWEEN '".$from_finance."' AND  '".$to_finance."' GROUP BY studentid";
			$tr_row = $db->getRows($sql_tr);
		foreach($tr_row as $each){
		$tr_topay[$each['studentid']]=number_format($each['SUM(pay_amount)'],2,'.','');
		$tr_paid[$each['studentid']]=number_format($each['SUM(amount_paid)'],2,'.','');
		$tr_waived[$each['studentid']]=number_format($each['SUM(deduction)'],2,'.','');
		}
		//array_print($tr_topay);
			
			$sql_stationary="SELECT SUM(total_amount),SUM(paid_amount),SUM(waived_amount),student_id FROM es_stationary_payment WHERE saled_date BETWEEN '".$from_finance."' AND '".$to_finance."' GROUP BY student_id";
			$stationary_row = $db->getRows($sql_stationary);
		foreach($stationary_row as $each){
		$stationary_topay[$each['student_id']]=number_format($each['SUM(total_amount)'],2,'.','');
		$stationary_paid[$each['student_id']]=number_format($each['SUM(paid_amount)'],2,'.','');
		$stationary_waived[$each['student_id']]=number_format($each['SUM(waived_amount)'],2,'.','');
		}
			
			$sql_libfine="SELECT SUM(es_libbookfine),SUM(fine_paid),SUM(fine_deducted),es_libbooksid FROM es_libbookfinedet  WHERE es_type='student' AND (paid_on BETWEEN  '".$from_finance."' AND '".$to_finance."' or returnedon BETWEEN  '".$from_finance."' AND '".$to_finance."') GROUP BY es_libbooksid";
			$lib_row = $db->getRows($sql_libfine);
		foreach($lib_row as $each){
		$lib_topay[$each['es_libbooksid']]=number_format($each['SUM(es_libbookfine)'],2,'.','');
		$lib_paid[$each['es_libbooksid']]=number_format($each['SUM(fine_paid)'],2,',','');
		$lib_waived[$each['es_libbooksid']]=number_format($each['SUM(fine_deducted)'],2,',','');
		}
			
			$sql_hostel="SELECT SUM(room_rate),SUM(amount_paid),SUM(deduction),es_personid FROM es_hostel_charges  WHERE  es_persontype='student'   AND due_month BETWEEN '".$from_finance."' AND  '".$to_finance."' GROUP BY es_personid";
			$hostel_row = $db->getRows($sql_hostel);
		foreach($hostel_row as $each){
		$hostel_topay[$each['es_personid']]=number_format($each['SUM(room_rate)'],2,'.','');
		$hostel_paid[$each['es_personid']]=number_format($each['SUM(amount_paid)'],2,'.','');
		$hostel_waived[$each['es_personid']]=number_format($each['SUM(deduction)'],2,'.','');
		}
			
		$sel_examfee_rec = "SELECT SUM(fine_amount),SUM(paid_amount),SUM(deduction_allowed),es_preadmissionid FROM es_examfee WHERE created_on BETWEEN  '".$from_finance."' AND '".$to_finance."' GROUP BY  es_preadmissionid";

			$examfee_det = $db->getrows($sel_examfee_rec);
		foreach($examfee_det as $each){
		$examfee_topay[$each['es_preadmissionid']]=number_format($each['SUM(fine_amount)'],2,'.','');
		$examfee_paid[$each['es_preadmissionid']]=number_format($each['SUM(paid_amount)'],2,'.','');
		$examfee_waived[$each['es_preadmissionid']]=number_format($each['SUM(deduction_allowed)'],2,'.','');
		}	
	//	$sql_ins_fime="SELECT SUM(fine_amount),SUM(amount_paid),SUM(deduction_allowed),studentid FROM es_fine_charged_collected  WHERE 			date BETWEEN '".$_SESSION['eschools']['from_finance']."' AND '".$_SESSION['eschools']['to_finance']."' GROUP BY studentid ";
	
	 $sql_ins_fime="SELECT SUM(fine_amount),SUM(amount_paid),SUM(deduction_allowed),studentid FROM es_fine_charged_collected  WHERE 
			fi_fromdate='".$from_finance."' AND fi_todate= '".$to_finance."' GROUP BY studentid ";
			
			$installmentfine_row = $db->getRows($sql_ins_fime);	
		foreach($installmentfine_row as $each){
		$installmentfine_topay[$each['studentid']]=number_format($each['SUM(fine_amount)'],2,'.','');
		$installmentfine_paid[$each['studentid']]=number_format($each['SUM(amount_paid)'],2,'.','');
		$installmentfine_waived[$each['studentid']]=number_format($each['SUM(deduction_allowed)'],2,',','');
		}
		//array_print($installmentfine_topay);
			 $sql_oldbalpaid = "SELECT OB.old_balance,OBP.paid_amount,OBP.waived_amount,OB.studentid FROM es_old_balances OB 
			 LEFT JOIN es_old_balances_paid OBP ON (OB.ob_id = OBP.ob_id) 
			 WHERE created_on  BETWEEN '".$from_finance."' AND '".$to_finance."' GROUP BY studentid";
			$balance_row = $db->getrows($sql_oldbalpaid);
		foreach($balance_row as $each){
		$balance_topay[$each['studentid']]=number_format($each['old_balance'],2,'.','');
		$balance_paid[$each['studentid']]=number_format($each['paid_amount'],2,'.','');
		$balance_waived[$each['studentid']]=number_format($each['waived_amount'],2,'.','');
		}

$PageUrl = "&submit_fee_status=submit&pre_class=$pre_class";
}

  ?>
 
<?php
 if($action=='payamount' || $action=='receipt'|| $action=='receiptpayment'){

	 $payamount_details1 = "SELECT * FROM es_feepaid_new WHERE fid=".$ofid;
	$payamount_details=$db->getrow($payamount_details1); 
	$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_examfee','Fee Payment','View EXAM FEE charged','".$ofid."','VIEW/RECEIPT PRINT FOR EXAM FEE PAID','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
	
}
?>