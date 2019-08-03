<?php   
        sm_registerglobal('pid', 
						  'action',					
						  'status',				
						  'start',
						  'routetitle',	
						  'route_via',	
						  'addroute',
						  'updateroute',
						  'vehicle_no',
						  'maintenance_type',
						  'maintenance_date',
						  'amount_paid',
						  'remarks',
						  'id',	
						  'eq_paymode',
						  'vocturetypesel',
						  'es_ledger',
						  'addmaintenance',
						  'emsg','updatemaintenance','es_bank_name','es_bankacc','es_bank_pin','es_teller_number','es_checkno'					
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


/**********Preparing transport array*************/
$trans_sql="select * from es_trans_vehicle";
$trans_details=$db->getRows($trans_sql);
if(count($trans_details)>0){
foreach($trans_details as $each_trans){
$trans_array[$each_trans['es_transportid']]=$each_trans['tr_vehicle_no'];
}
}


if($action=='delete'){
		$vid = "transport_charges".$id;
		$db->delete("es_voucherentry","es_receiptno='".$vid."'");
		$db->delete("es_trans_maintenance","es_transport_maintenanceid=".$id);
		header("location:?pid=85&action=maintenancedetails&start=$start&emsg=3");
		 exit;

}

if($action=='edit'){
		$maintain_det = $db->getrow("SELECT * FROM es_trans_maintenance WHERE es_transport_maintenanceid=".$id);
		$voucher_det = $db->getrow("SELECT * FROM es_voucherentry WHERE es_receiptno='transport_charges".$id."'");
}

if(isset($updatemaintenance) && $updatemaintenance!="" ){
			if ($vehicle_no=="") {
			$errormessage[0]="Select vehicle(Registration No)";	  
			}		
				
			if ($maintenance_type=="") {
			$errormessage[1]="Enter Maintenance Type"; 
			}			
			
			if (!$vlc->is_nonNegNumber($amount_paid)) {
			$errormessage[2]="Enter Amount"; 
			}
			
			if ($remarks=="") {
			$errormessage[3]="Enter remarks"; 
			}
			
			if ($es_ledger=="") {
			$errormessage[4]="Select ledger type"; 
			}
			if(count($errormessage)==0)
	 		{
				$maintenance_date_new=func_date_conversion('d/m/Y', 'Y-m-d', $maintenance_date);
		$db->update("es_trans_maintenance","tr_transportid='".$vehicle_no."',tr_maintenance_type='".$maintenance_type."',tr_amount_paid='".round($amount_paid,2)."',tr_remarks='".$remarks."'","es_transport_maintenanceid=".$id);	
		$vocturedetails = voucherid_finance($vocturetypesel);
		$vid = "transport_charges".$id;
		 
		$db->update("es_voucherentry","es_vouchertype='".$vocturedetails['voucher_type']."',es_paymentmode='".$eq_paymode."',es_particulars='".$es_ledger."',es_amount='".round($amount_paid,2)."',es_bank_name='".$es_bank_name."',es_bankacc='".$es_bankacc."',es_bank_pin='".$es_bank_pin."',es_teller_number='".$es_teller_number."',es_vouchermode='".$vocturedetails['voucher_mode']."',es_checkno='".$es_checkno."'","es_receiptno='".$vid."'");
		 header("location:?pid=85&action=maintenancedetails&start=$start&emsg=2");
		 exit;
				
				
			}	






}




if($action == "addmaintenance"){


	if(isset($addmaintenance) && $addmaintenance== "Add Maintenance"){
	  			
		if ($vehicle_no=="") {
		$errormessage[0]="Select vehicle(Registration No)";	  
		}		
			
		if ($maintenance_type=="") {
		$errormessage[1]="Enter Maintenance Type"; 
		}			
		
		if (!$vlc->is_nonNegNumber($amount_paid)) {
		$errormessage[2]="Enter Amount"; 
		}
		
		if ($remarks=="") {
		$errormessage[3]="Enter remarks"; 
		}
		
		if ($es_ledger=="") {
		$errormessage[4]="Select ledger type"; 
		}
		
        if(count($errormessage)==0)
	 		{
				$maintenance_date_new=func_date_conversion('d/m/Y', 'Y-m-d', $maintenance_date);
				
			$maintenance_sql="INSERT INTO es_trans_maintenance (`tr_transportid`,`tr_maintenance_type`,`tr_date_of_maintenance`,`tr_amount_paid`,`tr_remarks`,`status`,`created_on`) VALUES ('".$vehicle_no."','".$maintenance_type."','".$maintenance_date_new."','".$amount_paid."','".$remarks."','Active',NOW())";			
			mysql_query($maintenance_sql);
			$id=mysql_insert_id();
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
						
						 $obj_voucherentry->es_particulars = $es_ledger;
						 $obj_voucherentry->es_amount	   = round($amount_paid,2); 
			
			             $obj_voucherentry->es_bank_name     = $es_bank_name;
						 $obj_voucherentry->es_bankacc	     = $es_bankacc;
						 $obj_voucherentry->es_bank_pin      = $es_bank_pin;
						 $obj_voucherentry->es_teller_number = $es_teller_number;
			
						 //$obj_voucherentry->es_narration   = $es_narration;
						 $obj_voucherentry->es_vouchermode = $vocturedetails['voucher_mode'];
						 $obj_voucherentry->es_checkno     = $es_checkno;
						 $obj_voucherentry->es_receiptdate = date('Y-m-d H:i:s');
						 $obj_voucherentry->ve_fromfinance = $_SESSION['eschools']['from_finance'];
						 $obj_voucherentry->ve_tofinance   = $_SESSION['eschools']['to_finance'];
						 
						 $es_voucherentryid = $obj_voucherentry->Save();
						 
						 $query_log_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) 
						 VALUES ('".$_SESSION['eschools']['admin_id']."','es_trans_maintenance','Transport','Maintenance Details','".$id."','ADD MAINTENANCE','".$_SERVER['REMOTE_ADDR']."',NOW())";
						 mysql_query($query_log_sql);
			
			
			
			
			header('location: ?pid=85&action=addmaintenance&emsg=1');
			}
	}  
}



if($action == "maintenancedetails" || $action=='print_maintain_details'){

$q_limit  = 20;
if ( !isset($start) ){
	$start = 0;
   }
$maintenance_sql = "SELECT * FROM es_trans_maintenance WHERE status!='Delete' ORDER BY es_transport_maintenanceid DESC LIMIT ".$start." , ".$q_limit;
$maintenance_row =$db->getRows($maintenance_sql);

$maintenance1_sql = "SELECT * FROM es_trans_maintenance WHERE status!='Delete'";
$maintenance1_exe = mysql_query($maintenance1_sql);
$maintenance1_num = mysql_num_rows($maintenance1_exe);
}

if($action == "viewmaintenance" || $action=='print_viewmaintenance'){

$maintenance1_sql = "SELECT * FROM es_trans_maintenance WHERE es_transport_maintenanceid='".$id."' ORDER BY es_transport_maintenanceid DESC";
$maintenance1_exe = mysql_query($maintenance1_sql);
$maintenance1_row = mysql_fetch_array($maintenance1_exe);
}
?>


