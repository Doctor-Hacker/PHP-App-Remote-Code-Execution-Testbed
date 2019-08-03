<?php
sm_registerglobal('pid', 'action','emsg');

/**
* Only Student or schoool staff  can be allowed to access this page
*/ 
//checkuserinlogin();      
/**End of the permissions   **/
    $from_finance = $_SESSION['eschools']['from_finance'];
	$to_finance = $_SESSION['eschools']['to_finance']; 
    $viewfid=$_GET['sid'];
	if($action=='viewfeedetails')
	{			
	$feedetails = "SELECT * FROM `es_feepaid` WHERE `studentid` =$viewfid
	AND fi_fromdate = '" . $from_finance . "' AND fi_todate = '" . $to_finance . "'
	AND `class` IN (SELECT `pre_class` FROM `es_preadmission` WHERE `es_preadmissionid` =$viewfid) 
	ORDER BY `date` ASC";
	$feedetails = getamultiassoc($feedetails);
	$getclassname = getarrayassoc("SELECT `pre_class` FROM `es_preadmission` WHERE `es_preadmissionid` = $viewfid");
	$es_classname = $getclassname['pre_class'];	
	}
	$viewfid=$_GET['sid'];
	if($action=='printpaid_balance')
	{			
	$feedetails = "SELECT * FROM `es_feepaid` WHERE `studentid` =".$viewfid." 
	AND fi_fromdate = '" . $from_finance . "' AND fi_todate = '" . $to_finance . "'
	AND `class` IN (SELECT `pre_class` FROM `es_preadmission` WHERE `es_preadmissionid` = ".$viewfid.") 
	ORDER BY `date` ASC";
	$feedetails = getamultiassoc($feedetails);
	$getclassname = getarrayassoc("SELECT `pre_class` FROM `es_preadmission` WHERE `es_preadmissionid` ='".$viewfid."'");
	$es_classname = $getclassname['pre_class'];	
	}
	$viewfid=$_GET['sid'];
	if ($action=="printcompletefeedet"){ 
	$sel_feebalances="SELECT * FROM `es_feepaid` WHERE `studentid` ='" .$viewfid. "' 
	                       AND fi_fromdate = '" .  $_SESSION['eschools']['from_finance'] . "' 
						   AND fi_todate   = '" .  $_SESSION['eschools']['to_finance']  . "' ";
	$fees_banksdata = getamultiassoc( $sel_feebalances );
	
   
	$sel_student = "SELECT `pre_dateofbirth` , `es_preadmissionid`,`pre_fathername` , `pre_class` , `pre_name` , `pre_image` FROM   `es_preadmission` WHERE `es_preadmissionid` ='" . $viewfid . "'";
	$stdentdata = getarrayassoc($sel_student);
    }
    $viewfid=$_GET['sid'];
    if($action=='finedetails' || $action=='print_fine_details'){

	 $sel_studentwise_rec = "SELECT * FROM es_other_fine_dettails WHERE es_preadmissionid='$viewfid'";
	$studentwise_det = $db->getrows($sel_studentwise_rec);
    }
	
?>