<?php 
	sm_registerglobal ('pid','action','update','start','column_name','asds_order','uid','update_resignation','blogDesc','sid','emsg');
	/**
* Only Student or schoool staff  can be allowed to access this page
*/ 
checkuserinlogin();$es_resignation  =  new es_resignation();
	$es_staff        =  new es_staff();   
	
	$resignation = $es_resignation ->GetList(array(array("es_resignationid", ">", 0)) );
	
	foreach ($resignation as $eachresignation) {
	$message=$eachresignation->res_letter ;
	} 
	
	if (isset($update_resignation) && $update_resignation!= "") {
		$db->update("es_resignation","res_letter = '$blogDesc'","es_resignationId = '".$sid."'");
		header("Location:?pid=25&action=res_format&emsg=2");
		exit;
		
	}
 
 	$staffId =  $_SESSION['eschools']['user_id'];       
	$staffList  =  $es_staff ->GetList(array(array("es_staffid", "=", "$staffId")) );
	
	foreach ($staffList as $eachstaff) {
	$name          =$eachstaff->st_firstname;
	$address       =$eachstaff->st_pradress;
	$state         =$eachstaff->st_prcity;
	$city          =$eachstaff->st_prstate;
	$zip           =$eachstaff->st_prpincode;
	$postaplied    =$eachstaff->st_postaplied;
	$department    =$eachstaff->st_department;
	$doj           =$eachstaff->st_dateofjoining;
	$basic         =$eachstaff->st_basic;
	$date          =date('d/m/Y');
	$to            =$eachstaff->st_email;
	}
				        

?>