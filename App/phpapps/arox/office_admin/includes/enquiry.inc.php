<?php
include_once (INCLUDES_CLASS_PATH . DS . 'class.es_enquiry.php');
sm_registerglobal('pid', 'action', 'start', 'column_name', 'asds_order', 'update', 'uid', 'admin', 'eq_createdon', 'eq_name', 'eq_address', 'eq_city', 'eq_wardname', 'eq_sex', 'eq_class', 'eq_phno', 'eq_mobile', 'eq_emailid', 'eq_reftype', 'eq_refname', 'eq_description', 'eq_formtype', 'eq_paymode', 'eq_chequeno', 'eq_bankname', 'eq_submitedon', 'eq_acadamic', 'eq_marksobtain', 'eq_outof', 'eq_oralexam', 'eq_familyinteraction', 'eq_percentage', 'eq_result', 'eq_amountpaid', 'eq_state', 'emsg','disptype','class_id','eq_countryid','eq_prv_acdmic','eq_zip','eq_mothername','search_id','submit','registrationsubmit','studentmarksubmit','eq_application_no','es_bank_name','es_bankacc','es_checkno','es_teller_number','es_bank_pin','vocturetypesel','es_ledger','es_voucherentryid','dc1','dc2','start','PageUrl','es_enquiryid','enqid');

/**
* Only Admin users can view the pages
*/

if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
		header('location: ./?pid=1&unauth=0');
		exit;
	}
	$html_obj = new html_form();
$vlc = new FormValidation();
/**End of the permissions    **/

$school_details_sel = "SELECT * FROM `es_finance_master` ORDER BY `es_finance_masterid` DESC";
$school_details_res = getamultiassoc($school_details_sel);

if (!isset($eq_acadamic)) {
 
	   $from_finance = $_SESSION['eschools']['from_acad'];
	   $to_finance   = $_SESSION['eschools']['to_acad'] ;
		
	 }else{
	
		$finance_res   = getarrayassoc("SELECT * FROM `es_finance_master` WHERE `es_finance_masterid`= $eq_acadamic");
		 $from_finance = $finance_res['fi_ac_startdate'];
		 $to_finance   = $finance_res['fi_ac_enddate']; 
				  
 } 


$es_enquiry = new es_enquiry();

if ($action =='registration' || $action =='print_enquirylist'){	

	//$es_enquiryList = $es_enquiry->GetList(array(array("es_enquiryid", "=", "$uid")), "es_enquiryid", false);
	 $es_enquiryList  = $db->getrow("SELECT * FROM es_enquiry WHERE es_enquiryid=".$uid);
		foreach($es_enquiryList as $k=>$v){
		 if($v==""){$v=" --- ";}
		 $es_enquiryList[$k] = stripslashes($v); 
		}
		if($es_enquiryList['es_voucherentryid']>=1){
		$voucher_det = $db->getrow("SELECT * FROM es_voucherentry WHERE es_voucherentryid=".$es_enquiryList['es_voucherentryid']);
		$vouch_det = $db->getrow("SELECT * FROM es_voucher WHERE voucher_type='".$voucher_det['es_vouchertype']."' 
		AND voucher_mode='".$voucher_det['es_vouchermode']."'");
		}
	
	//array_print($es_enquiryList );
	
	}
	

if ($disptype=='formpurchase' && $action=='registration' && $registrationsubmit=='Submit'){
 $vlc    = new FormValidation();
     if($eq_paymode==""){$errormessage[0]="Select Payment Mode";}
	 elseif ($eq_paymode!="cash"){
			if (!$vlc->is_alpha_numeric($es_checkno)) {
			$errormessage[1]="Enter Cheque Number";	  
		}	
		if (!$vlc->is_alpha_numeric($es_bankacc)) {
			$errormessage[2]="Enter Bank Number";	  
		}	
	}
	 if($vocturetypesel==""){$errormessage[3]="Select Voucher Type";}
	 if($es_ledger==""){$errormessage[4]="Select Ledger";}
	  if($eq_amountpaid==""){$errormessage[5]="Enter Amount Paid";}
	  elseif($eq_amountpaid <=0){$errormessage[5]="Enter Valid Amount ";}
	 if(count($errormessage)==0){
	

	if(isset($es_voucherentryid) && $es_voucherentryid!=''){
	        $amount_voucher = round($eq_amountpaid,2);
			        $voucherlistarr = voucher_finance();
					for($i=0;$i<count($voucherlistarr);$i++){
					
					$arr[$voucherlistarr[$i]['es_voucherid']]=$voucherlistarr[$i]['voucher_type'];
					
					}
					
					for($i=0;$i<count($voucherlistarr);$i++){
					
					$vmode[$voucherlistarr[$i]['es_voucherid']]=$voucherlistarr[$i]['voucher_mode'];
					
					}
			$tes=$arr[$vocturetypesel];
			$vocherm=$vmode[$vocturetypesel];
			$db->update("es_voucherentry", 			"es_vouchertype        = '$tes',
					    										es_vouchermode        = '$vocherm',
															     es_paymentmode        = '$eq_paymode',
																 
																 es_bankacc 		   = '$es_bankacc',
																 es_particulars 	   = '$es_ledger',
																 es_amount 		       = '$amount_voucher',
																 es_checkno 		   = '$es_checkno',
																 es_teller_number 	   = '$es_teller_number',
																 es_bank_pin 		   = '$es_bank_pin',
																 es_bank_name 		   = '$es_bank_name',
																 es_narration 		   = '$es_narration '","es_voucherentryid='$es_voucherentryid'");
			$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_enquiry','Front Office','Enquiry List','".$uid."','EDIT ENQUIRY REGISTRATION','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql); 
	
	
	       }else{
		  $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_enquiry','Front Office','Enquiry List','".$uid."','ENQUIRY REGISTRATION','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql); 
			$sel_paidin_amount = "SELECT 
				sum(CASE es_vouchermode WHEN 'paidin' THEN es_amount ELSE 0 END)AS paidintotal,
				sum(CASE es_vouchermode WHEN 'paidout' THEN es_amount ELSE 0 END)AS paidouttotal
				FROM es_voucherentry  "; 
				$sel_amount_exe = getarrayassoc($sel_paidin_amount);
				$paidintotal=$sel_amount_exe['paidintotal'];
				$paidouttotal=$sel_amount_exe['paidouttotal'];
				$diffamount = $paidintotal - $paidouttotal;
				//if ($diffamount>=$tr_amount_paid){
					$receptid = mysql_insert_id();	
					 
						 $obj_voucherentry = new es_voucherentry();
						 $vocturedetails = voucherid_finance($vocturetypesel);
						 $obj_voucherentry->es_vouchertype = $vocturedetails['voucher_type'];
						 $obj_voucherentry->es_receiptno   = "prospectus_sale".$uid;
						 $obj_voucherentry->es_paymentmode = $eq_paymode;
						 $obj_voucherentry->es_bankacc	   = $es_bankacc;
						 $obj_voucherentry->es_particulars = $es_ledger;
						 $obj_voucherentry->es_amount	   = round($eq_amountpaid,2); 
			
			            
						 $obj_voucherentry->es_bank_pin      = $es_bank_pin;
						 $obj_voucherentry->es_bank_name     = $es_bank_name;
						 $obj_voucherentry->es_teller_number = $es_teller_number;
			
						 $obj_voucherentry->es_narration   = $es_narration;
						 $obj_voucherentry->es_vouchermode = $vocturedetails['voucher_mode'];
						 $obj_voucherentry->es_checkno     = $es_checkno;
						 $obj_voucherentry->es_receiptdate = date('Y-m-d H:i:s');
						 $obj_voucherentry->ve_fromfinance = $_SESSION['eschools']['from_finance'];
						 $obj_voucherentry->ve_tofinance   = $_SESSION['eschools']['to_finance'];
						 
						 $es_voucherentryid = $obj_voucherentry->Save();
	}
	
	$db->update("es_enquiry","eq_formtype = '$eq_formtype', eq_paymode = '$eq_paymode' , eq_amountpaid = '$eq_amountpaid' , eq_application_no = '$eq_application_no' ,es_voucherentryid = '$es_voucherentryid'"," es_enquiryid  = $uid ");	
	
	
	header("Location:?pid=2&action=list_enquiry&emsg=2");
	exit;
	}
	}
	
	
	
if ($disptype=='studentmarks' && $action=='registration' && $studentmarksubmit=='Submit'){	

	$db->update("es_enquiry","eq_outof = '$eq_outof', eq_marksobtain = '$eq_marksobtain' , eq_result = '$eq_result'"," es_enquiryid  = $uid ");
	
	
	
	$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_enquiry','Front Office','Enquiry List','".$uid."','ENQUIRY ENTRANCE TEST','".$_SERVER['REMOTE_ADDR']."',NOW())";
    $log_insert_exe=mysql_query($log_insert_sql);
	
	
	header("Location:?pid=2&action=list_enquiry&emsg=2");
	exit;
	
	}
	


	    $obj_grouplist    = new es_groups();
		$obj_grouplistarr = $obj_grouplist->GetList(array(array("es_groupsid", ">", 0)) );

/*
* Listing the enquires
*/	
if ($action =="list_enquiry"){	




	$condition = "";

	$q_limit  = PAGENATE_LIMIT;

	if ( !isset($start) ){

		$start = 0;
	}
	$condition = " ";
		if(isset($submit) && $submit!=""){
			$PageUrl = "&submit=$submit";
			//if(isset($dc1) && $dc1!=""){$from = func_date_conversion("d/m/Y","Y-m-d",$dc1);}
			//if(isset($dc2) && $dc2!=""){$to = func_date_conversion("d/m/Y","Y-m-d",$dc2);}
			
			$dt1 = str_replace("/", "-", $dc1);
			$dt2 = str_replace("/", "-", $dc2);
			
			if(isset($dc1) && $dc1!=""){$from = date("Y-m-d", strtotime($dt1));}
			if(isset($dc2) && $dc2!=""){$to = date("Y-m-d", strtotime($dt2));}
			
			if($from!="" && $to!=""){
				$condition .= " AND eq_createdon BETWEEN '".$from."' AND '".$to."'";
				$PageUrl .="&dc1=$dc1&dc2=$dc2";
			}
			if($from!="" && $to==""){
				$condition .= " AND  eq_createdon >= '".$from."' ";
				$PageUrl .="&dc1=$dc1";
			}
			if($from=="" && $to!=""){
				$condition .= " AND eq_createdon <= '".$to."' ";
				$PageUrl .="&dc2=$dc2";
			}
			if($vlc->is_allnumbers($search_id)){
				$condition .= " AND es_enquiryid = '".$search_id."' ";
				$PageUrl .="&es_enquiryid=$search_id";
			}
		}
		$no_rows =$db->getOne("select count(*) from es_enquiry where es_enquiryid > 0 ". $condition);
			$es_enquiryList =$db->getRows("select * from es_enquiry where es_enquiryid > 0 ". $condition ." ORDER BY es_enquiryid DESC LIMIT $start,$q_limit");
	//array_print($es_enquiryList);
}
?> 
<?php if($action == "printenquirylist" || $action == ""){

      $q_limit  = PAGENATE_LIMIT;
	  
	if ( !isset($start) ){
	
		$start = 0;
	}	
	$condition = " ";
		
			
			if(isset($dc1) && $dc1!=""){$from = func_date_conversion("d/m/Y","Y-m-d",$dc1);}
			if(isset($dc2) && $dc2!=""){$to = func_date_conversion("d/m/Y","Y-m-d",$dc2);}
			
			if($from!="" && $to!=""){
				$condition .= " AND eq_createdon BETWEEN '".$from."' AND '".$to."'";
				$PageUrl .="&dc1=$dc1&dc2=$dc2";
			}
			if($from!="" && $to==""){
				$condition .= " AND  eq_createdon >= '".$from."' ";
				$PageUrl .="&dc1=$dc1";
			}
			if($from=="" && $to!=""){
				$condition .= " AND eq_createdon <= '".$to."' ";
				$PageUrl .="&dc2=$dc2";
			}
			if($vlc->is_allnumbers($es_enquiryid)){
				$condition .= " AND es_enquiryid = '".$es_enquiryid."' ";
				$PageUrl .="&es_enquiryid=$es_enquiryid";
			}
	
		
		
		$no_rows =$db->getOne("select count(*) from es_enquiry where es_enquiryid > 0 ". $condition);
			$es_enquiryList =$db->getRows("select * from es_enquiry where es_enquiryid > 0 ". $condition ." ORDER BY es_enquiryid DESC LIMIT $start,$q_limit");

	 /*   $no_rows = count($es_enquiry->GetList(array(array("es_enquiryid", ">", 0)) ));
	
		$orderby_array = array('orb1'=>'es_enquiryid', 'orb2'=>'eq_name', 'orb3'=>'eq_createdon');
		
		if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
		
			$orderby = $orderby_array[$column_name];
			
		}else{
		
			$orderby = "es_enquiryid";
		}
		
		if (isset($asds_order)&&$asds_order =='ASC'){
		
			$order = true;
			
		}else{
		
			$order = false;
		}
		
	$es_enquiryList = $es_enquiry->GetList(array(array("es_enquiryid", ">", 0)), $orderby, $order,  "$start , $q_limit" );
	*/
	$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_enquiry','Front Office','Enquiry List','','PRINT ENQUIRY LIST','".$_SERVER['REMOTE_ADDR']."',NOW())";
    $log_insert_exe=mysql_query($log_insert_sql);
}
?>