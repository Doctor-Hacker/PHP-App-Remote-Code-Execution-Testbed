<?php

sm_registerglobal('pid', 'action','emsg','addphoto','holiday_date','title','id','status','start','hiddenimage','updatephoto','actionedit','year');

/**
* student or staff
*/
checkuserinlogin();      

//
$html_obj =new html_form();

if($action=="holidayslist" || $action=='print_holidays'){

if(!isset($year)){
				$year = date("Y");
				}
    $no_rows  = sqlnumber("SELECT * FROM  es_holidays  WHERE DATE_FORMAT(holiday_date, '%Y')='".$year."'");
 	$q_limit     = 20;
	$orderby     = 'holiday_date';
	$start = (isset($start))?$start:0;	
	
  $allphotos   = "SELECT * FROM  es_holidays  WHERE DATE_FORMAT(holiday_date, '%Y')='".$year."' AND  status!='Deleted' ORDER BY  " . $orderby . " ASC "; 
	$rs_photos  = $db->getRows($allphotos );

}
?>