<?php 
sm_registerglobal('pid', 'action','emsg','blid','downloadfile','start');
/**
* Only Student or schoool staff  can be allowed to access this page
*/ 
checkuserinlogin();
/**End of the permissions   **/
$student_det = get_studentdetails( $_SESSION['eschools']['user_id']);
if(isset($downloadfile) && $downloadfile!="") {
ForceDownloadFile("../office_admin/images/tutorials/".$downloadfile);
}
if($action=='bookletlist' || $action=='print_list'){
// $subject_list=$db->getRow("SELECT subject_id_array FROM subjects_cat WHERE scat_id=(SELECT EPD.scat_id FROM es_preadmission EP,es_preadmission_details EPD WHERE EP.es_preadmissionid=EPD.es_preadmissionid AND EP.es_preadmissionid=".$_SESSION['eschools']['user_id'].')');


$subject_list=$db->getRow("SELECT scat_name FROM subjects_cat WHERE scat_id=(SELECT EPD.scat_id FROM es_preadmission EP,es_preadmission_details EPD WHERE EP.es_preadmissionid=EPD.es_preadmissionid AND EP.es_preadmissionid=".$_SESSION['eschools']['user_id'].')');



	 $subject_id_array=explode('@#@#@',$subject_list['subject_id_array']);
	 
	   $tutorial_qry = "SELECT cl.es_classname, s.es_subjectname , b.* 
	                  FROM es_classes cl, es_subject s,es_booklets b  
	                           WHERE  cl.es_classesid ='".$student_det['pre_class']."' 
							   AND   cl.es_classesid = s.es_subjectshortname 
							   AND   b.subject_id    = s.es_subjectid
							   AND   b.status        = 'active'" ;
	 $no_rows      = sqlnumber($tutorial_qry);
	
	$q_limit      = 10;
		
	if ( !isset($start) ){
			$start = 0;
		}						   
	$tutorial_qry .="ORDER BY b.booklet_id DESC LIMIT " . $start . ", " . $q_limit . ""; 						   
	$tutorials_det = $db->getRows($tutorial_qry);
	//array_print($tutorials_det);
}
if($action=="viewbooklet" || $action=='print_view'){
	$single_tutorial_qry = "SELECT cl.es_classname, s.es_subjectname , b.* 
	                  FROM es_classes cl, es_subject s,es_booklets b  
	                           WHERE  cl.es_classesid ='".$student_det['pre_class']."' 
							   AND   cl.es_classesid = s.es_subjectshortname 
							   AND   b.subject_id    = s.es_subjectid
							   AND   b.booklet_id        = ".$blid ;
							   
	$viewtutorial = $db->getrow($single_tutorial_qry);
	
	if($viewtutorial['user_type']=="staff"){
	
	$viewuserinfo=$db->getRow("select * from es_staff where es_staffid=".$viewtutorial['user_id']);
	$username=$viewuserinfo['st_firstname']	;	
	}	
	if($viewtutorial['user_type']=="admin"){
	$viewuserinfo=$db->getRow("select * from es_admins where es_adminsid=".$viewtutorial['user_id']);
	$username=$viewuserinfo['admin_fname'];
	}
	
}

?>	