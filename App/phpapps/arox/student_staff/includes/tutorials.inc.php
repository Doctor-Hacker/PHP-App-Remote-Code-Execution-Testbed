<?php 
sm_registerglobal('pid', 'action','emsg','es_subjectid','es_classesid','addchapter','unit_id','classesid','subjectid','searchunit','uid','chapter_name','chid','chapter_id','tut_desc','file_path','title','tutid','downloadfile','addtutorial','start','check_your_progress');
/**
* Only Student or schoool staff  can be allowed to access this page
*/ 
checkuserinlogin();
/**End of the permissions   **/
$student_det = get_studentdetails( $_SESSION['eschools']['user_id']);

if(isset($downloadfile) && $downloadfile!="") {
ForceDownloadFile("../office_admin/images/tutorials/".$downloadfile);
}
if($action=='tutorialslist' || $action == 'print_list'){

$subject_list=$db->getRow("SELECT subject_id_array FROM subjects_cat WHERE scat_id=(SELECT EPD.scat_id FROM es_preadmission EP,es_preadmission_details EPD WHERE EP.es_preadmissionid=EPD.es_preadmissionid AND EP.es_preadmissionid=".$_SESSION['eschools']['user_id'].')');
	 $subject_id_array=explode('@#@#@',$subject_list['subject_id_array']);
	 
	  $tutorial_qry = "SELECT cl.es_classname, s.es_subjectname , u.unit_name ,c.chapter_name,s.es_subjectid,t.* 
	                  FROM es_classes cl, es_subject s, es_units u, es_chapters c, es_tutorials t  
	                           WHERE  cl.es_classesid ='".$student_det['pre_class']."' 
							   AND   cl.es_classesid = s.es_subjectshortname 
							   AND   s.es_subjectid  = u.es_subjectid
							   AND   u.unit_id       = c.unit_id 
							   AND   c.chapter_id    = t.chapter_id
							   AND   t.status        = 'active'" ;
	$no_rows      = sqlnumber($tutorial_qry);
	
	$q_limit      = 10;
		
	if ( !isset($start) ){
			$start = 0;
		}						   
	$tutorial_qry .="ORDER BY t.tut_id DESC LIMIT " . $start . ", " . $q_limit . ""; 						   
	$tutorials_det = $db->getRows($tutorial_qry);
	//array_print($tutorials_det);
}
if($action=="viewtutorial" || $action=='print_view'){
	$single_tutorial_qry = "SELECT cl.es_classname, s.es_subjectname , u.unit_name ,c.chapter_name, t.* 
							   FROM es_classes cl, es_subject s, es_units u, es_chapters c, es_tutorials t   
							   WHERE  cl.es_classesid ='".$student_det['pre_class']."' 
							   AND   cl.es_classesid = s.es_subjectshortname 
							   AND   s.es_subjectid  = u.es_subjectid
							   AND   u.unit_id       = c.unit_id 
							   AND   c.chapter_id    = t.chapter_id
							   AND   t.tut_id        = ".$tutid ;
							  
							   
	$viewtutorial = $db->getrow($single_tutorial_qry);
	
	if($viewtutorial['user_type']=="staff"){
	
	$viewuserinfo=$db->getRow("select * from es_staff where es_staffid=".$viewtutorial['user_id']);
	$username=$viewuserinfo['st_firstname']	;	
	}	
	if($viewtutorial['user_type']=="admin"){
	$viewuserinfo=$db->getRow("select * from es_admins where es_adminsid=".$viewtutorial['user_id']);
	$username=$viewuserinfo['admin_fname'];
	}
	
	$questioncount = $db->getOne("select count(*) from es_questionbank where chapter_id=".$viewtutorial['chapter_id']);	
	
	if($check_your_progress !="" && isset($check_your_progress)){	
			$_SESSION['eschools']['exam']['chapter']= $viewtutorial['chapter_id'];
			unset($_SESSION['eschools']['exam']['question']);	
			unset($_SESSION['eschools']['exam']['correctanswer']);		
			header("Location:?pid=40&action=chapterexam");
			exit;
		}
	
}

?>	