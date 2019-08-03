<?php
sm_registerglobal('pid', 'action','emsg');

/**
* Only Student or schoool staff  can be allowed to access this page
*/ 
checkuserinlogin();     
/**End of the permissions   **/
/*
*Start of Time Table Web Page
*/
	if($action=='viewtimetable') {	
		$es_classdet = getarrayassoc("SELECT `pre_class` FROM `es_preadmission` WHERE `es_preadmissionid` = ".$_SESSION['eschools']['user_id']);
		$es_class = $es_classdet ['pre_class'];	
		
		$obj_ttclass = new es_timetable();
		$obj_ttmaster = new  es_timetablemaster();
		// obj_schooltimings = new es_es_schooltimings();
		 
		$timetabledetails = $obj_ttclass->GetList(array(array("es_class", "=", "$es_class")), "es_timetableid", false);
		$timetablemasterdetails = $obj_ttmaster->GetList(array(array("es_class", "=", "$es_class")), "es_timetablemasterid", false);
		// $schooltimingsdetails = $obj_schooltimings->GetList(array(array("es_schooltimingsid", ">", 0)), "es_schooltimingsid", false);
	 }
	
/**
* print time table
*/	
	if($action=='printtimetable') {			
		//$obj_leavemaster = new es_preadmission();
		$studentdetails = $db->getRow("SELECT * FROM es_preadmission WHERE es_preadmissionid=".$_SESSION['eschools']['user_id']);
	}
	
	
	
	{	
	$es_classdet = getarrayassoc("SELECT `pre_class` FROM `es_preadmission` WHERE `es_preadmissionid` = ".$_SESSION['eschools']['user_id']);
	$es_class = $es_classdet['pre_class'];		
	 $obj_ttclass = new es_timetable();
	 $obj_ttmaster = new  es_timetablemaster();
	// obj_schooltimings = new es_es_schooltimings();
	 
	 $timetabledetails = $obj_ttclass->GetList(array(array("es_class", "=", "$es_class")), "es_timetableid", false);
	 
	  $timetablemasterdetails = $obj_ttmaster->GetList(array(array("es_class", "=", "$es_class")), "es_timetablemasterid", false);
	  // $schooltimingsdetails = $obj_schooltimings->GetList(array(array("es_schooltimingsid", ">", 0)), "es_schooltimingsid", false);
	 }
	
	
	?>
	
	