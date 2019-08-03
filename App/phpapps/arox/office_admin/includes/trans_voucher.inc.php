<?php
sm_registerglobal('pid','es_bankacc','es_checkno','action','emsg', 'update', 'uid', 'start', 'asds_order', 'Submit', 'column_name', 'admin', 'es_vouchertype', 'es_receiptno', 'es_narration', 'es_particulars', 'es_amount', 'es_checkno', 'es_vouchermode', 'es_bankacc', 'es_paymentmode', 'es_receiptdate', 'Submit', 'savegroups', 'groupname', 'undgroup', 'gid', 'submitledger', 'lg_name', 'lg_groupname', 'lg_openingbalance', 'update', 'vocturetype', 'vocturid', 'vocturetypesel','es_bank_pin', 'es_bank_name', 'es_teller_number','voucher_date','start','q_limit','Update','es_voucherentryid','es_receiptno_new','Update','search_voucher','es_voucherid','dc1','dc2');
/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
$html_obj = new html_form();
$voucher_det = $db->getrows("SELECT * FROM es_voucher");
if(count($voucher_det )>=1){
foreach($voucher_det as $eachrecord){
$voucher_type_arr[$eachrecord['es_voucherid']] = $eachrecord['voucher_type'];
}
}



 if($action=="delete"){
$sql= "delete from es_voucherentry where  es_voucherentryid=".$es_voucherentryid;
mysql_query($sql);


$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_voucherentry','ACCOUNTING','VOUCHER ENTRY','".$es_voucherentryid."','VOUCHER ENTRY DELETED','".$_SERVER['REMOTE_ADDR']."',NOW())";

	$log_insert_exe=mysql_query($log_insert_sql);
	
 header("Location:?pid=24&action=vouchers_list&emsg=3&start=$start");
		exit;
 
 }
//adding new voucher//
if ($action=='voucher_entry') {	 
    if ($Submit=='Submit'){
	
	
	    $vlc = new FormValidation();		
		if (!$vlc->is_number($es_receiptno)) {
			$errormessage[1]="Enter Voucher Number";	  
		}
		
		if (empty($voucher_date)) {
			$errormessage[4]="Enter Voucher Date";	  
		}
		$flag = 0;

		if (count($es_amount)>=1) {
			foreach($es_amount as $k=>$v){
				
				 if($v<=0 || $v=='')
				 {
				 $flag++;
				 
			}
			}			  
		}
		if($flag > 0){
			$errormessage[5]="Enter Valid Amount";	  
		}
		
		if ($es_paymentmode!="cash"){
			if (!$vlc->is_alpha_numeric($es_checkno)) {
				$errormessage[2]="Enter Check Number";	  
			}	
			if (!$vlc->is_alpha_numeric($es_bankacc)) {
				$errormessage[3]="Enter Bank Number";	  
			}	
		}
	if (count($errormessage)==0){	
	  	$vocturedetails = voucherid_finance($vocturetypesel);
			  
		
		for ($i=0; $i<count($es_particulars); $i++){
		$es_receiptnod="rec_".$es_receiptno;	
		   if($es_amount[$i]!=""){
	   		$obj_voucherentry = new es_voucherentry();
	  		$obj_voucherentry->es_vouchertype   = $vocturedetails['voucher_type'];
			$obj_voucherentry->es_receiptno     = $es_receiptnod;
			$obj_voucherentry->es_paymentmode   = $es_paymentmode;
			
			$obj_voucherentry->es_particulars   = $es_particulars[$i];
			$obj_voucherentry->es_amount        = $es_amount[$i];
			$obj_voucherentry->es_narration     = $es_narration;
			
			$obj_voucherentry->es_vouchermode   = $vocturedetails['voucher_mode'];
			
			$obj_voucherentry->es_bankacc       = $es_bankacc;
			$obj_voucherentry->es_checkno       = $es_checkno;
            $obj_voucherentry->es_bank_pin      = $es_bank_pin;
			$obj_voucherentry->es_bank_name     = $es_bank_name;
			$obj_voucherentry->es_teller_number = $es_teller_number;
			
			$obj_voucherentry->es_receiptdate = date('Y-m-d H:i:s');
			$obj_voucherentry->ve_fromfinance = formatDateCalender($voucher_date);
		    $obj_voucherentry->ve_tofinance   = formatDateCalender($voucher_date);

      		$vid=$obj_voucherentry->Save();
			
			$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_voucherentry','ACCOUNTING','VOUCHER ENTRY','".$vid."','VOUCHER ENTRY ADDED','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);
	
			$es_receiptno=$es_receiptno+1;
			}
			
	      }
	     header("Location:?pid=24&action=voucher_entry&emsg=13");
		exit;
	  }
	}
}

if ($Update=='Update'){
	
	
	    $vlc = new FormValidation();		
		if (!$vlc->is_number($es_receiptno_new)) {
			$errormessage[1]="Enter Voucher Number";	  
		}
		
		if (empty($voucher_date)) {
			$errormessage[4]="Enter Voucher Date";	  
		}
		$flag = 0;
		if($es_amount<=0 || $es_amount=='')
				 {
				 $flag++;
				
			}
		
		if($flag > 0){
			$errormessage[5]="Enter Valid Amount";	  
		}
		
		if ($es_paymentmode!="cash"){
			if (!$vlc->is_alpha_numeric($es_checkno)) {
				$errormessage[2]="Enter Check Number";	  
			}	
			if (!$vlc->is_alpha_numeric($es_bankacc)) {
				$errormessage[3]="Enter Bank Number";	  
			}	
		}
	if (count($errormessage)==0){
	if($es_paymentmode=="cash"){
	$es_bank_name="";
	$es_bankacc="";
	$es_checkno="";
	$es_teller_number="";
	$es_bank_pin="";
	}
		$vocturedetails = explode("_",$vocturetypesel);
	$voucher_date = func_date_conversion("d/m/Y","Y-m-d",$voucher_date);
	$db->update("es_voucherentry","es_paymentmode = '".$es_paymentmode."',es_narration = '".$es_narration."',es_vouchertype = '".$vocturedetails[0]."',es_vouchermode = '".$vocturedetails[1]."',es_receiptdate = '".$voucher_date."',es_bank_name = '".$es_bank_name."',es_bankacc = '".$es_bankacc."',es_checkno = '".$es_checkno."',es_teller_number = '".$es_teller_number."',es_bank_pin = '".$es_bank_pin."',es_particulars = '".$es_particulars."',es_amount = '".$es_amount."'", 'es_voucherentryid ='. $es_voucherentryid);

$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_voucherentry','ACCOUNTING','VOUCHER ENTRY','".$es_voucherentryid."','VOUCHER ENTRY UPDATED','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
	
	  header("Location:?pid=24&action=vouchers_list&emsg=2&start=$start");
		exit;
	}
	}

if($action=="voucher_edit" & !$_POST){
$sql="select * from es_voucherentry where es_voucherentryid='".$es_voucherentryid ."'";
$vocher_det=$db->getrow($sql);
 $vocturetypesel=$vocher_det['es_vouchertype'];
$es_receiptno=$vocher_det['es_receiptno'];
	$voucher_date = func_date_conversion("Y-m-d","d/m/Y",$vocher_det['es_receiptdate']);

$es_paymentmode=$vocher_det['es_paymentmode'];
$es_narration=$vocher_det['es_narration'];
$es_bank_name=$vocher_det['es_bank_name'];
$es_bankacc=$vocher_det['es_bankacc'];
$es_checkno=$vocher_det['es_checkno'];
$es_teller_number=$vocher_det['es_teller_number'];
$es_bank_pin=$vocher_det['es_bank_pin'];
$es_particulars=$vocher_det['es_particulars'];
$es_amount=$vocher_det['es_amount'];

//array_print($vocher_det);

}
//$recno="rec_";
if ($action=='vouchers_list' || $action=='print_vouchers_list') {
      // $condition = " AND es_receiptno like '".$recno."%'";
		
			$PageUrl = "&search_all_otherfines=$search_all_otherfines";
			if(isset($dc1) && $dc1!=""){$from = func_date_conversion("d/m/Y","Y-m-d",$dc1);}
			if(isset($dc2) && $dc2!=""){$to = func_date_conversion("d/m/Y","Y-m-d",$dc2);}
			
			if($from!="" && $to!=""){
				$condition .= " AND es_receiptdate BETWEEN '".$from."' AND '".$to."'";
				$PageUrl .="&dc1=$dc1&dc2=$dc2";
			}
			if($from!="" && $to==""){
				$condition .= " AND es_receiptdate >= '".$from."' ";
				$PageUrl .="&dc1=$dc1";
			}
			if($from=="" && $to!=""){
				$condition .= " AND es_receiptdate <= '".$to."' ";
				$PageUrl .="&dc2=$dc2";
			}
			if($from=="" && $to!=""){
				$condition .= " AND es_receiptdate <= '".$to."' ";
				$PageUrl .="&dc2=$dc2";
			}
			if($es_checkno!=""){
				$condition .= " AND es_checkno LIKE '".$es_checkno."%'";
				$PageUrl .="&es_checkno=$es_checkno";
			}
			if($es_bankacc!=""){
				$condition .= " AND es_bankacc LIKE '".$es_bankacc."%'";
				$PageUrl .="&es_bankacc=$es_bankacc";
			}
			if($es_voucherid!=""){
			    $voucher_det = $db->getrow("SELECT * FROM es_voucher WHERE es_voucherid=".$es_voucherid);
				$condition .= " AND es_vouchertype = '".$voucher_det['voucher_type']."' ";
				$PageUrl .="&es_voucherid=$es_voucherid";
			}
	if(isset($start)){
$start=$start;
}else{
$start=0;
}	
$q_limit=20;
$sql="select * from es_voucherentry where 1 ".$condition."";

 $sql.=" order by es_voucherentryid DESC LIMIT  ".$start.",".$q_limit."";
$a="select * from es_voucherentry where 1 ".$condition."";
$rows1=$db->getRows($a);
$rows=$db->getRows($sql);
 	 $no_rows = sqlnumber($a);




$res_details=$db->getRows($sql);
}
?>