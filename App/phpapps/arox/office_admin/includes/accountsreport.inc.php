<?php 
sm_registerglobal('pid', 'action', 'start','ledgersummerysub','es_particulars','dc1','dc2','searchbalance','pre_year','column_name','es_checkno');

/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
		header('location: ./?pid=1&unauth=0');
		exit;
	}

	

$school_details_sel = "SELECT * FROM `es_finance_master` ORDER BY `es_finance_masterid` DESC";
$school_details_res = getamultiassoc($school_details_sel);	
	
if ($pre_year<1) {
 
	   $from_finance = $_SESSION['eschools']['from_finance'];
	   $to_finance   = $_SESSION['eschools']['to_finance'];
		
		
	 }
		 
		  

//To view the ledger details
if ($action=='ledger' ||$ledgersummerysub=='Search'  ){
    
	$orderby      = 'es_voucherentryid';
	$navigatepage = PAGENATE_LIMIT;
	if($pre_year!=""){
	$finance_res  = getarrayassoc("SELECT * FROM `es_finance_master` WHERE `es_finance_masterid`= '" . $pre_year . "'");
	$from_finance = $finance_res['fi_startdate'];
	$to_finance   = $finance_res['fi_enddate'];
	}
	$con='';
	if($es_checkno!='')
	{
	$con=" AND es_checkno LIKE '".$es_checkno."%'";
	}
	$no_rows1     = "SELECT * FROM es_voucherentry WHERE es_particulars = '" . $es_particulars . "' 
	                 AND ve_fromfinance BETWEEN  '" . $from_finance . "' AND '" . $to_finance . "'
					 AND ve_tofinance BETWEEN    '" . $from_finance . "' AND '" . $to_finance . "'".$con;
	$no_rows      = sqlnumber($no_rows1);
	
	$q_limit  = 50;
	
	if ( !isset($start) ){
		$start = 0;
	}
	
	$opening = "SELECT * FROM es_ledger WHERE lg_name='" . $es_particulars . "'"; 
	
	$record  = getarrayassoc($opening);
	
	$sqlqery = "SELECT * FROM es_voucherentry WHERE es_particulars = '".$es_particulars."' 
	                                          AND ve_fromfinance BETWEEN  '" . $from_finance . "' AND '" . $to_finance . "'
					                          AND ve_tofinance BETWEEN    '" . $from_finance . "' AND '" . $to_finance . "'".$con."
	                                          ORDER BY ".$orderby." ASC  LIMIT ".$start.", ".$q_limit."";
	
	$ledger_det = getamultiassoc($sqlqery);
	$grandtotal = "SELECT 
						sum(CASE es_vouchermode WHEN 'paidin' THEN es_amount ELSE 0 END)AS paidintotal,
						sum(CASE es_vouchermode WHEN 'paidout' THEN es_amount ELSE 0 END)AS paidouttotal 
						FROM es_voucherentry 
						WHERE es_particulars = '".$es_particulars."' 
						AND ve_fromfinance BETWEEN  '" . $from_finance . "' AND '" . $to_finance . "'
					    AND ve_tofinance BETWEEN    '" . $from_finance . "' AND '" . $to_finance . "'"; 
	 
	 $grand_total = getarrayassoc($grandtotal);
	 $credittot = $grand_total['paidintotal'];
	 $debittot = $grand_total['paidouttotal'];
	
}
//End of view the ledger details


// To print ledger
if ($action=='print_ledger' ){
        if($pre_year>0){
		
        $finance_res  = getarrayassoc("SELECT * FROM `es_finance_master` WHERE `es_finance_masterid`= '" . $pre_year . "'");
	    $from_finance = $finance_res['fi_startdate'];
	    $to_finance   = $finance_res['fi_enddate'];
		}
	
	    // To get opening balance
	    $opening = "SELECT * FROM es_ledger WHERE lg_name='" . $es_particulars . "'"; 
	
	$record  = getarrayassoc($opening);
	// To print entire records in ledger
	 $sqlqery = "SELECT * FROM es_voucherentry WHERE es_particulars = '" . $es_particulars . "' 
	                                          AND ve_fromfinance BETWEEN  '" . $from_finance . "' AND '" . $to_finance . "'
					                          AND ve_tofinance BETWEEN    '" . $from_finance . "' AND '" . $to_finance . "'";
	
	$ledger_det = getamultiassoc($sqlqery);
	// To get grand total of paidin & paidout
	$grandtotal = "SELECT 
						sum(CASE es_vouchermode WHEN 'paidin' THEN es_amount ELSE 0 END)AS paidintotal,
						sum(CASE es_vouchermode WHEN 'paidout' THEN es_amount ELSE 0 END)AS paidouttotal 
						FROM es_voucherentry 
						WHERE es_particulars = '".$es_particulars."' 
						AND ve_fromfinance BETWEEN  '" . $from_finance . "' AND '" . $to_finance . "'
					    AND ve_tofinance BETWEEN    '" . $from_finance . "' AND '" . $to_finance . "'";  
	 
	 $grand_total = getarrayassoc($grandtotal);
	 $credittot = $grand_total['paidintotal'];
	 $debittot = $grand_total['paidouttotal'];}
//End of print ledger   
//To view the balance sheet
if ($action=='balancesheet'){ 
	$from_finance = $_SESSION['eschools']['from_finance'];
	$to_finance = $_SESSION['eschools']['to_finance']; 
	if (isset($searchbalance) && $searchbalance=='search'){ 
		$finance_res = getarrayassoc("SELECT * FROM `es_finance_master` WHERE `es_finance_masterid`= $pre_year");
		$from_finance = $finance_res['fi_startdate'];
		$to_finance   = $finance_res['fi_enddate']; 
	}
  } 
  
  //To Print the balance sheet
if ($action=='print_balancesheet'){ 
	$from_finance = $_SESSION['eschools']['from_finance'];
	$to_finance = $_SESSION['eschools']['to_finance']; 
	if (isset($searchbalance) && $searchbalance=='search'){ 
		$finance_res = getarrayassoc("SELECT * FROM `es_finance_master` WHERE `es_finance_masterid`= $pre_year");
		$from_finance = $finance_res['fi_startdate'];
		$to_finance   = $finance_res['fi_enddate']; 
	}
  }   
?>