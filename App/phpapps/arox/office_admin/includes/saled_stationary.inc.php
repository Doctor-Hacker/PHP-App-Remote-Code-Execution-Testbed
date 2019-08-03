<?php   
        sm_registerglobal('pid', 
						  'action',					
						  'status',				
						  'start',
						  'routetitle',	
						  'route_via',	
						  'addroute',
						  'updateroute',
						  'id',
						  'viewbill',
						  'selyear',
						  'selmonth',
						  'selgroup',
						  'selclass',
						  'chgid',
						  'dueamount',
						  'receive_amount',
						  'amount_paid',
						  'deduction',
						  'eq_paymode',
						  'vocturetypesel',
						  'es_ledger',
						  'viewbill',
						  'registration_no',
						  'exportbill',
						  'emsg'					
						 );
						  
/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
$html_obj = new html_form();
$vlc = new FormValidation();



$class_sql="select * from es_classes";
$class_details=$db->getRows($class_sql);
if(count($class_details)>0){
foreach($class_details as $each_class){
$class_array[$each_class['es_classesid']]=$each_class['es_classname'];
}
}




if($action == "saled_stationary" || $action=='print_tr_bills'){		
			
			/*$today = date("Y-m-d");
			$generated_month = $selyear.'-'.$selmonth.'-'."01";
			$difference =  date_diff($generated_month,$today);
			
		    if($difference['days']<1){$errormessage[2] = "You can not prepare bills for future dates";}*/
			$condition="";
			if(isset($viewbill) && $viewbill!=""){	
					
			$PageUrl = "&viewbill=Search";
			if($selclass!="") { $condition.=" AND EP.pre_class='".$selclass."'"; $PageUrl .="&selclass=$selclass";}
			if($registration_no!="") { $condition.=" AND ESP.student_id = '".$registration_no."'"; $PageUrl .="&registration_no=$registration_no";}
			}
			
			if ( !isset($start) ){
			$start = 0;
			}
			$q_limit=20;
			
			//$sql="SELECT EP.es_preadmissionid, EP.pre_name, EP.pre_fathername, EC.es_classname, ES.invoice_no, ES.created_on, ES.total_amount FROM es_preadmission EP, es_stationary ES, es_classes EC WHERE EP.es_preadmissionid = ES.student_id AND EC.es_classesid=EP.pre_class GROUP BY ES.student_id";
			//$sql="SELECT A.*,P.pre_name,P.es_preadmissionid,P.pre_fathername,P.pre_class FROM es_trans_payment_history A,es_preadmission P WHERE A.studentid=P.es_preadmissionid ".$condition;
			$sql="SELECT EP.es_preadmissionid,EP.status,EP.pre_name, EP.pre_fathername, EC.es_classname, ESP.saled_date, ESP.invoice_no, ESP.total_amount, ESP.pay_status, ESP.st_pay_id, ESP.paid_amount, ESP.waived_amount  FROM es_preadmission EP, es_classes EC, es_stationary_payment ESP WHERE ESP.student_id=EP.es_preadmissionid AND EP.pre_class=EC.es_classesid".$condition."";
			$student1_row = $db->getRows($sql);		
			$no_rows = count($student1_row);
			$student_row=$db->getRows($sql);
			//$student_row = $db->getRows($sql." ORDER BY $orderby id LIMIT $start , $q_limit " );
			
	}
	
if(isset($action) && $action == "saled_stationary" && isset($exportbill) && $exportbill=="Export List"){		
			
			/*$today = date("Y-m-d");
			$generated_month = $selyear.'-'.$selmonth.'-'."01";
			$difference =  date_diff($generated_month,$today);
			
		    if($difference['days']<1){$errormessage[2] = "You can not prepare bills for future dates";}*/
			
			if(isset($exportbill) && $exportbill!=""){			
			$condition="";
			if($selclass!="") { $condition.=" AND EP.pre_class='".$selclass."'"; 
			if($registration_no!="") { $condition.=" AND ESP.student_id = '".$registration_no."'";}
				
			}
		
			$query_log_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) 
			VALUES ('".$_SESSION['eschools']['admin_id']."','es_trans_payment_history','Stationary','View Saled Stationaries','','EXPORT STATIONARY BILLS','".$_SERVER['REMOTE_ADDR']."',NOW())";
			mysql_query($query_log_sql);
			
			
			$data=
		
		'"REG No"'."\t".
		'"STUDENT/FATHER NAME"'."\t".
		'"CLASS"'."\t".
		'"INVOICE NO"'."\t".
		'"SALED DATE"'."\t".
		'"BILL AMOUNT"'."\t".
		'"WAIVED"'."\t".
		'"PAID AMOUNT"'."\t".
		'"PAID ON"'."\t".
		'"BILL CREATED ON"'."\n";
		
		$sql="SELECT EP.es_preadmissionid, EP.pre_name, EP.pre_fathername, EC.es_classname, ESP.saled_date, ESP.invoice_no, ESP.total_amount, ESP.pay_status, ESP.st_pay_id, ESP.paid_amount, ESP.waived_amount,ESP.paid_date  FROM es_preadmission EP, es_classes EC, es_stationary_payment ESP WHERE ESP.student_id=EP.es_preadmissionid AND EP.pre_class=EC.es_classesid".$condition."";
		
		//$sql="SELECT A.*,P.pre_name,P.es_preadmissionid,P.pre_fathername,cl.es_classname FROM es_trans_payment_history A,es_preadmission P,es_classes cl WHERE A.studentid=P.es_preadmissionid  AND P.pre_class = cl.es_classesid".$condition;
				
		
		$entry_sql=$sql;
		$details = $db->getRows($entry_sql);
		//array_print($details);
		//exit;
		if(count($details)>0 ){
		foreach ($details as $row) { 
			$line = '';
			
				$value = str_replace('"', '""', $row['es_preadmissionid']);
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
				
				$value = str_replace('"', '""', $row['pre_name'].'/'.$row['pre_fathername']);
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
				
				$value = str_replace('"', '""', $row['es_classname']);
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
				
				$value = str_replace('"', '""', $row['invoice_no']);
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
				
				$value = str_replace('"', '""', func_date_conversion('Y-m-d', 'd/m/Y', $row['saled_date']));
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
				
				$value = str_replace('"', '""', $row['total_amount']);
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
				
				$value = str_replace('"', '""', $row['waived_amount']);
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
				
				$value = str_replace('"', '""', $row['paid_amount']);
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
				
					if($row['pay_status']=='Pending'){$paiddate='';}else{$paiddate=$row['paid_date'];}
				$value = str_replace('"', '""', func_date_conversion('Y-m-d', 'd/m/Y', $paiddate));
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
				
				$value = str_replace('"', '""', func_date_conversion('Y-m-d', 'd/m/Y', $paiddate));
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
			
			/*foreach($row as $field=>$value) { if($field=="in_receivedthrough"){$value=$in_receivedthrough_array[$value];} if($field=="out_sentthrough"){$value=$in_sendthrough_array[$value];} if($field=="dispatchgroup"){$value=$dispat_group[$value];}
			
				$value = str_replace('"', '""', $value);
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
			}*/
			
			$data .= trim($line). "\n";
		}
		$data = str_replace("\r", "", $data);
		if ($data =="") {
			$data ="\n(0) Records Found!\n";
		}
		
		//header("Content-type: application/x-msdownload");
		header("Content-type: application/vnd.ms-excel");
		header('Content-Disposition: attachment; filename="stationarybillreport.xls"');
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$data";
		exit;
			
	}
}
}
	
if(isset($action) && $action == "payamount"){	

					
			//$student_sql="SELECT A.*,P.pre_name,P.pre_class ,P.pre_fathername FROM es_trans_payment_history A,es_preadmission P WHERE A.studentid=P.es_preadmissionid AND id=".$chgid;
			$student_sql="SELECT EP.es_preadmissionid, EP.pre_fathername, EP.pre_name, EC.es_classname, ESP.total_amount, ESP.saled_date FROM es_stationary_payment ESP, es_preadmission EP, es_classes EC WHERE EC.es_classesid=EP.pre_class AND ESP.student_id = EP.es_preadmissionid AND ESP.st_pay_id=".$chgid;
			$student_exe=mysql_query($student_sql);
			$student_row=mysql_fetch_array($student_exe);
			
			
			if(isset($receive_amount) && $receive_amount!=''){
	        //array_print($_POST);exit;
			$vlc    = new FormValidation();	
			
			if(isset($amount_paid) && $amount_paid!="" ){
				if(!$vlc->is_nonNegNumber($amount_paid) ){
					$errormessage[0]="Enter valid amount";
				}
			}
			if(isset($deduction) && $deduction!="" ){
				if(!$vlc->is_nonNegNumber($deduction) ){
					$errormessage[1]="Enter valid deduction amount";
				}
			}
			if ($es_ledger=="") {
			$errormessage[3]="Select ledger type"; 
			}
			if ($eq_paymode=="") {
			$errormessage[4]="Select Payment type"; 
			}
			if ($vocturetypesel=="") {
			$errormessage[5]="Select Voucher type"; 
			}
			$total_receive = $amount_paid+$deduction;
			if($student_row['total_amount']!=$total_receive){$errormessage[2]="Total Amount + Deduction should be equal to Due Amount";}
			if(count($errormessage)==0){ $today_date=date('Y-m-d');
			
			$query_log_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) 
			VALUES ('".$_SESSION['eschools']['admin_id']."','es_trans_payment_history','Transport','View Transport Bills','".$chgid."','PAY TRANSPORT CHARGES','".$_SERVER['REMOTE_ADDR']."',NOW())";
			mysql_query($query_log_sql);
					
					$update_sql="UPDATE es_stationary_payment SET paid_amount ='".$amount_paid."',waived_amount ='".$deduction."',paid_date='".$today_date."',pay_status='Paid' WHERE st_pay_id =".$chgid;
					mysql_query($update_sql);
					
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
						 $obj_voucherentry->es_receiptno   = "Stationary".$chgid;
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
						 $PageUrl = "&start=$start";
			if(isset($viewbill) && $viewbill!=""){	
			$PageUrl .= "&viewbill=Search";
			if($selclass!="") { $PageUrl .="&selclass=$selclass";}
			if($selyear!="") { $PageUrl .="&selyear=$selyear"; }
			if($selmonth!="") { $PageUrl .="&selmonth=$selmonth"; }
			if($registration_no!="") { $PageUrl .="&registration_no=$registration_no";}
			}
										
			header("location:?pid=103&action=saled_stationary&emsg=50".$PageUrl);
					exit;
					
			}
			}
	
	}
	
if($action=='receipt'){
		 $student_sql="SELECT EP.es_preadmissionid, EP.pre_fathername, EP.pre_name, EC.es_classname, ESP.total_amount, ESP.waived_amount, ESP.paid_amount, ESP.saled_date,ESP.st_pay_id,ESP.paid_date FROM es_stationary_payment ESP, es_preadmission EP, es_classes EC WHERE EC.es_classesid=EP.pre_class AND ESP.student_id = EP.es_preadmissionid AND ESP.st_pay_id=".$chgid;

$payamount_details = $db->getrow($student_sql);

}

if($action == 'invoice_details' || $action == 'print_invoice_details'){
$invoice_sql="SELECT ES.item_id, ES.item_qty, ES.invoice_no, ES.total_amount, ES.student_id,EP.pre_fathername, EP.pre_name,ES.created_on, (SELECT es_classname FROM es_classes EC, es_preadmission EP WHERE EC.es_classesid=EP.pre_class AND  EP.es_preadmissionid=ES.student_id) AS CLASS, (SELECT section_name FROM es_sections ES, es_sections_student ESS WHERE ESS.section_id=ES.section_id AND ESS.student_id=EP.es_preadmissionid) AS SECTION, (SELECT roll_no FROM es_sections_student WHERE student_id=EP.es_preadmissionid) AS ROLL_NO FROM es_stationary ES, es_preadmission EP WHERE EP.es_preadmissionid= ES.student_id AND ES.st_pay_id=".$chgid;
$invoice_det=$db->getRows($invoice_sql);
$i=0;
foreach($invoice_det as $va){
$items_sql="SELECT in_item_name, cost FROM es_in_item_master WHERE es_in_item_masterid=".$va['item_id'];
$res=$db->getRow($items_sql);
$items_inf[$i]=array('item_name'=>$res['in_item_name'],
				'cost'=>$res['cost']);
				$i++;
}
}	
$academic_sql="SELECT fi_startdate , fi_enddate  FROM es_finance_master WHERE es_finance_masterid =".$_SESSION['eschools']['es_finance_masterid'];
$academic_det=$db->getRow($academic_sql);
?>


