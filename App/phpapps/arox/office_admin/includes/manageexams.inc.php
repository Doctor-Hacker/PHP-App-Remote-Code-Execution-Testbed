<?php

sm_registerglobal('pid', 'action','emsg','examname','eid','save','eid', 'editExam', 'edit_class');

/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
	$obj_exam    = new es_exam();
$html_obj = new html_form();
$vlc = new FormValidation();
	// Deleting Exams
	if($action=='deleteexam')
	{
		$obj_exam->es_examId = $eid;
		$obj_exam->Delete();
		$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_exam','SET UP','Add Exams','".$eid."','DELETE EXAMS','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);	
				
		header("Location:?pid=47&action=manageexams&emsg=3");
		exit;	
	}
	
	//Adding Multiple Exams

	if($action == 'manageexams') {
		$allexamlist = $obj_exam->GetList(array(array("es_examid", ">", 0)) );
	if ($save=='Save'){
	//$vlc = new FormValidation();
	
	//echo count(empty($examname));exit;
	//echo print_r($examname);exit;
	
	foreach($examname as $key=>$value){	
	if($value!=""){ $validation="yes";}
	}

		if ($validation=='') {
				$errormessage[0] = "Enter Exam";
			}
			

	if(count($errormessage) == 0){
			
		for ($i=0; $i<=count($examname); $i++) {	
			if(trim($examname[$i])!="")
			{
				$obj_exam->es_examId = 0;
				$obj_exam->es_examname = trim($examname[$i]);
				$obj_exam->es_examordby = "1";
				$exadid = $obj_exam->Save();
				$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_exam','SET UP','Add Exams','".$exadid."','ADD EXAMS','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);	
				
			}
		}
		header("Location:?pid=47&action=manageexams&emsg=1");
		 exit;
		 }
		
	}
}	
	
	// Updating the Exams
	
	if (isset($_POST['editExam_x']) && isset($_POST['editExam_y'])  ) {
	
	
			if (empty($edit_class)) {
				 $errormessage[0] = "Enter Exam";

			}	
			
			if (count($errormessage) == 0) { 
			$db->update("es_exam","es_examname = '$edit_class'"," es_examid = $eid ");
			
			$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_exam','SET UP','Add Exams','".$eid."','EDIT EXAMS','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
			header('Location:?pid=47&action=manageexams&emsg=2');
			exit;
			}
			
	}


?>