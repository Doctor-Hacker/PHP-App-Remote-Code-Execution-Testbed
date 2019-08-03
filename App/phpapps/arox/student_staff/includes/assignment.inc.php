<?php
sm_registerglobal('pid', 'action', 'asds_order' ,'as_class', 'column_name', 'start', 'q_limit', 'no_rows' , 'assignment_id');

/**
* Only Student or schoool staff  can be allowed to access this page
*/ 
checkuserinlogin();
  //view student assignment
 if ($action=="myassignment"  || $action=='print_assignment' ){
	
	//Limit
	$q_limit  = 10;
	
	//start records
	if ( !isset($start))$start = 0;
		$orderby_array = array( 'orb1'=>'as_suject', 'orb2'=>'as_createdon');
	if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
		$orderby = $orderby_array[$column_name];
	}else{
		$orderby = "es_assignmentid";
	}
	if (!isset($asds_order)){
		$asds_order = 'DESC';
	}
	
	   $from_acad = $_SESSION['eschools']['from_acad'];
	   $to_acad   = $_SESSION['eschools']['to_acad'];
	
	$subject_list=$db->getRow("SELECT subject_id_array FROM subjects_cat WHERE scat_id=(SELECT EPD.scat_id FROM es_preadmission EP,es_preadmission_details EPD WHERE EP.es_preadmissionid=EPD.es_preadmissionid AND EP.es_preadmissionid=".$_SESSION['eschools']['user_id'].')');
	 $subject_id_array=explode('@#@#@',$subject_list['subject_id_array']);
	
	 $no_rows   = count($db->getRows("SELECT  `es_assignment`.* FROM `es_assignment` WHERE  as_lastdate BETWEEN '".$from_acad."' AND '".$to_acad."' AND `as_class` IN(SELECT `pre_class` FROM `es_preadmission` WHERE `es_preadmissionid`=" . $_SESSION['eschools']['user_id'] . ")"));
	
	 
	 //fetch the records 
	   
	   $assignment_det = $db->getRows("SELECT  `es_assignment`.* FROM `es_assignment` WHERE as_lastdate BETWEEN '".$from_acad."' AND '".$to_acad."' AND `as_class` IN(SELECT `pre_class` FROM `es_preadmission` WHERE `es_preadmissionid`=" . $_SESSION['eschools']['user_id'] . ")  ORDER BY `" . $orderby ."`  " . $asds_order . " LIMIT " . $start . " , " . $q_limit . ""); 
	  
	   $adminlisturl ="&start=$start";
	 
 }
 //view the assignment
 if ($action=="viewassignment"){
         
	$viewassignment_det = $db->getRow("SELECT * FROM `es_assignment` WHERE `es_assignmentid` = '" . $assignment_id . "'");
  }
  //Download Assignment
/*  if($action=="Download"){
  
   $sql  = "select * from `es_assignment` where `es_assignmentid`='" . $assignment_id . "'";
   $esql = mysql_query($sql);
   $data = mysql_fetch_assoc($esql);
   $file="assignments/".$data['as_description'];
    
	
     function Downloadfile($file)
      {
	    if (file_exists($file))
        {

          $filesize = @filesize($file);		 
          header('Content-Disposition: attachment; filename="' .$file. '"');
          readfile($file);
          return;
      }
}



Downloadfile($file); 
  
  }*/
?> 