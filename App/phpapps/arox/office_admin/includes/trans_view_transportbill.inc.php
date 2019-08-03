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
						  'emsg','es_bankacc','es_narration','es_bank_pin','es_bank_name','es_teller_number','es_narration','voucher_mode','es_checkno'					
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




if($action == "viewtransportbill" || $action=='print_tr_bills'){		
			
			/*$today = date("Y-m-d");
			$generated_month = $selyear.'-'.$selmonth.'-'."01";
			$difference =  date_diff($generated_month,$today);
			
		    if($difference['days']<1){$errormessage[2] = "You can not prepare bills for future dates";}*/
			$condition="";
			if(isset($viewbill) && $viewbill!=""){	
					
			$PageUrl = "&viewbill=Search";
			if($selclass!="") { $condition.=" AND P.pre_class='".$selclass."'"; $PageUrl .="&selclass=$selclass";}
			if($selyear!="") { $condition.=" AND YEAR(due_month) = ".$selyear.""; $PageUrl .="&selyear=$selyear"; }
			if($selmonth!="") { $condition.=" AND MONTHNAME(due_month) = ".$selmonth.""; $PageUrl .="&selmonth=$selmonth"; }
			if($registration_no!="") { $condition.=" AND studentid = '".$registration_no."'"; $PageUrl .="&registration_no=$registration_no";}
			}
			
			if ( !isset($start) ){
			$start = 0;
			}
			$q_limit=20;
			
			$sql="SELECT A.*,P.pre_name,P.es_preadmissionid,P.pre_fathername,P.pre_class,P.status FROM es_trans_payment_history A,es_preadmission P WHERE A.studentid=P.es_preadmissionid ".$condition;
			
			$student1_row = $db->getRows($sql);		
			$no_rows = count($student1_row);
			
			$student_row = $db->getRows($sql." ORDER BY $orderby id LIMIT $start , $q_limit " );
			
	}
	
if(isset($action) && $action == "viewtransportbill" && isset($exportbill) && $exportbill=="Export List"){		
			
			/*$today = date("Y-m-d");
			$generated_month = $selyear.'-'.$selmonth.'-'."01";
			$difference =  date_diff($generated_month,$today);
			
		    if($difference['days']<1){$errormessage[2] = "You can not prepare bills for future dates";}*/
			
			if(isset($exportbill) && $exportbill!=""){			
			$condition="";
			if($selclass!="") { $condition.=" AND P.pre_class='".$selclass."'";}
			if($selyear!="") { $condition.=" AND YEAR(due_month) = ".$selyear."";}
			if($selmonth!="") { $condition.=" AND MONTHNAME(due_month) = ".$selmonth."";}
			if($registration_no!="") { $condition.=" AND studentid = '".$registration_no."'";}
			}
		
			$query_log_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) 
			VALUES ('".$_SESSION['eschools']['admin_id']."','es_trans_payment_history','Transport','View Transport Bills','','EXPORT TRANSPORT BILLS','".$_SERVER['REMOTE_ADDR']."',NOW())";
			mysql_query($query_log_sql);
			
			
			$data=
		
		'"REG No"'."\t".
		'"STUDENT"'."\t".
		'"CLASS"'."\t".
		'"FATHER NAME"'."\t".
		'"MONTH"'."\t".
		'"BILL AMOUNT"'."\t".
		'"DEDUCTION"'."\t".
		'"PAID AMOUNT"'."\t".
		'"PAID ON"'."\t".
		'"BILL CREATED ON"'."\n";
		
		$sql="SELECT A.*,P.pre_name,P.es_preadmissionid,P.pre_fathername,cl.es_classname FROM es_trans_payment_history A,es_preadmission P,es_classes cl WHERE A.studentid=P.es_preadmissionid  AND P.pre_class = cl.es_classesid".$condition;
				
		
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
				
				$value = str_replace('"', '""', $row['pre_name']);
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
				
				$value = str_replace('"', '""', $row['es_classname']);
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
				
				$value = str_replace('"', '""', $row['pre_fathername']);
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
				
				$value = str_replace('"', '""', func_date_conversion('Y-m-d', 'd/m/Y', $row['due_month']));
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
				
				$value = str_replace('"', '""', $row['pay_amount']);
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
				
				$value = str_replace('"', '""', $row['deduction']);
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
				
				$value = str_replace('"', '""', $row['amount_paid']);
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
				if( $row['paid_on']!='0000-00-00') {
				$value = str_replace('"', '""', func_date_conversion('Y-m-d', 'd/m/Y', $row['paid_on']));
				}
				else {
				$value = str_replace('"', '""','');
				} 
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
				
				$value = str_replace('"', '""', func_date_conversion('Y-m-d', 'd/m/Y', $row['created_on']));
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
		header('Content-Disposition: attachment; filename="transportbillreport.xls"');
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$data";
		exit;
			
	}
}
	
if(isset($action) && $action == "payamount"){		
					
			$student_sql="SELECT A.*,P.pre_name,P.pre_class ,P.pre_fathername FROM es_trans_payment_history A,es_preadmission P WHERE A.studentid=P.es_preadmissionid AND id=".$chgid;
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
			if($dueamount!=$total_receive){$errormessage[2]="Total Amount + Deduction should be equal to Due Amount";}
			if(count($errormessage)==0){ $today_date=date('Y-m-d');
			
			$query_log_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) 
			VALUES ('".$_SESSION['eschools']['admin_id']."','es_trans_payment_history','Transport','View Transport Bills','".$chgid."','PAY TRANSPORT CHARGES','".$_SERVER['REMOTE_ADDR']."',NOW())";
			mysql_query($query_log_sql);
					
					
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
						 $obj_voucherentry->es_receiptno   = "transport_charges".$chgid;
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
						 
				$update_sql="UPDATE es_trans_payment_history SET amount_paid='".$amount_paid."',deduction='".$deduction."',paid_on='".$today_date."',pay_status='paid',voucherid='".$es_voucherentryid."' WHERE id=".$chgid;
					mysql_query($update_sql);					
					
					
						 $PageUrl = "&start=$start";
			if(isset($viewbill) && $viewbill!=""){	
			$PageUrl .= "&viewbill=Search";
			if($selclass!="") { $PageUrl .="&selclass=$selclass";}
			if($selyear!="") { $PageUrl .="&selyear=$selyear"; }
			if($selmonth!="") { $PageUrl .="&selmonth=$selmonth"; }
			if($registration_no!="") { $PageUrl .="&registration_no=$registration_no";}
			}
						 
					header("location:?pid=84&action=viewtransportbill&emsg=50".$PageUrl);
					exit;
					
			}
			}
	}
	
if($action=='receipt'){
		 $student_sql="SELECT A.*,P.pre_name,P.pre_class ,BS.board_id,P.pre_fathername, TB.board_title, TR.route_title ,TV.tr_vehicle_no,TV.tr_transport_type , DAV.driver_id  FROM es_trans_payment_history A,es_preadmission P , es_trans_board_allocation_to_student BS, es_trans_board TB, es_trans_vehicle_allocation_to_board VAB, es_trans_route TR ,es_trans_vehicle TV ,es_trans_driver_allocation_to_vehicle DAV 
WHERE A.studentid=P.es_preadmissionid 
AND BS.type='student'
AND BS.student_staff_id = P.es_preadmissionid
AND BS.board_id = TB.id
AND TB.route_id = TR.id
AND TB.id = VAB.board_id

AND VAB.vehicle_id = TV.es_transportid
AND DAV.vehicle_id = TV.es_transportid
AND A.id=".$chgid." 
GROUP BY P.es_preadmissionid
";

$payamount_details = $db->getrow($student_sql);

}	
if($action=='receiptpayment'){
		 $student_sql="SELECT A.*,P.pre_name,P.pre_class ,BS.board_id,P.pre_fathername, TB.board_title, TR.route_title ,TV.tr_vehicle_no,TV.tr_transport_type , DAV.driver_id  FROM es_trans_payment_history A,es_preadmission P , es_trans_board_allocation_to_student BS, es_trans_board TB, es_trans_vehicle_allocation_to_board VAB, es_trans_route TR ,es_trans_vehicle TV ,es_trans_driver_allocation_to_vehicle DAV 
WHERE A.studentid=P.es_preadmissionid 
AND BS.type='student'
AND BS.student_staff_id = P.es_preadmissionid
AND BS.board_id = TB.id
AND TB.route_id = TR.id
AND TB.id = VAB.board_id

AND VAB.vehicle_id = TV.es_transportid
AND DAV.vehicle_id = TV.es_transportid
AND A.id=".$chgid." 
GROUP BY P.es_preadmissionid
";

$payamount_details = $db->getrow($student_sql);

}	
?>


