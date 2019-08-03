<?php
	if (!defined('FROMINDEX')) {
		header("location:./");
	}
//include_once (INCLUDES_CLASS_PATH . DS . 'class.es_feemaster.php');

sm_registerglobal('pid', 'action','emsg','groups_id', 'classes_id', 'examname', 'subject_ids', 'maxmarks', 'minmarks', 'cr_examsbmt','action1','start','serchexamresults', 'classid','result_serchnameofexam','search_students','entermarks','studentid','studentmarks','subjectid','examid','radiobutton','markscount','classwiseserch','sm_class','sid','studentid','stid','resultserch','examdtae','sperfarmance','subjectnames','back','exam_details','academicyear','exam_marks_search','exam_reports','exam_next','classTeacher','class_id','exmid','exam_submit','exam_search','edmark','submit_marks','student_id','subject_id','exam_duration','total_marks','pass_marks','exam_detailsid','upload_exam_paper','stud_marks','student_marksid','regd_no','search_stdnt','submit_std_mrk','marksobtnd','exm_dtl','examname','download','old_exam_file','subject_sud_total','sub_sud_tot','ed','exportcreateexam','exportcreateexam_student');

/**
* Only Student or schoool staff  can be allowed to access this page
*/ 
checkuserinlogin();
 $_SESSION['eschools']['user_id'];
$checkClass ="";
$checkClass = staff_class($_SESSION['eschools']['user_id']);	 
$classes_id = staff_class($_SESSION['eschools']['user_id']);
$groups_id  = class_group($classes_id);
$classname = classname($classes_id);

/**End of the permissions   **/
$obj_exam = new es_examinations();
$students = new es_preadmission();
$subjectname= new es_subject();
$marks=new es_marks();
$es_classes= new es_classes();
$exams       = new es_exam();
$obj_academic_exam       = new es_exam_academic();
$obj_exam_details       = new es_exam_details();

/**********************************************************************
* Get  groups and Classes
**********************************************************************/

//get groups
 $c_groups = get_groups();
 
 if(isset($download) && $download!=""){
    $file_path = "office_admin/documents".$download;
    ForceDownloadFile("../office_admin/documents".$download);
	
	}
 
 

//get classes
 if (isset($groups_id) && $groups_id!="") {
	$class_data = getClasses($groups_id);
 } else {
 	$class_data = getClasses();
 }

/**********************************************************************
* Get  groups and Classes
**********************************************************************/

//get groups
 $c_groups = get_groups();

//get classes
 if (isset($groups_id) && $groups_id!="") {
	$class_data = getClasses($groups_id);
 }
//get Exams
	$exam_data = get_Exams();

//Get subjects
$subjects_data = gettingSubject();
	
	$from_acad = $_SESSION['eschools']['from_acad'];
	$to_acad   = $_SESSION['eschools']['to_acad'];
	
	$school_details_sel = "SELECT * FROM `es_finance_master` ORDER BY `es_finance_masterid` DESC";
	$school_details_res = getamultiassoc($school_details_sel);

//creation of exams 
if ($cr_examsbmt=="Submit")
{
	$vlc   = new FormValidation();
   		
		if ($groups_id=="") {
		$errormessage[0]="Enter Group Name";			  
		}
		if ($classes_id=="all") {
		$errormessage[1]="Enter Class Name";			  
		}
		if ($subject_ids=="") {
		$errormessage[2]="Enter Subject Name";			  
		}
		
		
	if (!$vlc->is_alpha_numeric($examname)){
		$errormessage[3] = "Examination name Should not empty or must be alphanumeric";
	}
	if (!$vlc->is_allnumbers($maxmarks)||$maxmarks<1 ){
		$errormessage[4] =  "Maximum marks name Should not empty or must be Positive numeric";
	}
	if (!$vlc->is_allnumbers($minmarks)){
		$errormessage[5] = "Minimum marks name Should not empty or must be Positive numeric ";
	}
	if (count($errormessage)==0){
		for ( $i=0; $i<=count($subject_ids)-1; $i++)
		{
	
		$obj_exam->es_examinationsId =0;
		$obj_exam->examname   = $examname;
		$obj_exam->maxmarks	  = $maxmarks;
		$obj_exam->minmarks   = $minmarks;
		$obj_exam->group_id   = $groups_id;
		$obj_exam->class_id   = $classes_id; 
		$obj_exam->subject_id =  $subject_ids[$i]; 
		$obj_exam->examdate   = DatabaseFormat($examdtae,"Y-m-d");
	  // saving the data
		$obj_exam->Save();
	
	
		}
	}
	header("Location:?pid=57&emsg=1&action=createxam");
}
/*
*Start of Create Examination a particular staff can create Exam for his class only
*/	 
if ($exam_next=="Next")
{
		
		$vlc   = new FormValidation();
	
		
		if ($examname=="") {
		$errormessage[2]="Select Exam Name";			  
		}
		if ($academicyear=="") {
		$errormessage[3]="Select Academic Year";			  
		}
		
		if (count($errormessage)==0) {
			
			$existExam = $db->getRow("SELECT * FROM es_exam_academic WHERE exam_id = '$examname' AND group_id = '$groups_id' AND class_id = '$classes_id' AND academic_year = '$academicyear' ");
			
			$exam_id = $existExam['es_exam_academicid'];
			if($existExam != "" && count($existExam) > 0) {
				header("Location:?pid=57&action=createxam_next&exmid=$exam_id&class_id=$classes_id");
				exit;
			} else {
				$obj_academic_exam->es_exam_academicId =0;
				$obj_academic_exam->exam_id   = $examname;
				$obj_academic_exam->group_id   = $groups_id;
				$obj_academic_exam->class_id   = $classes_id; 
				$obj_academic_exam->academic_year   = $academicyear;
				$obj_academic_exam->created_date   = date("Y-m-d H:i:s");
				$obj_academic_exam->Save();
				$ins_id = $obj_academic_exam->es_exam_academicId;
				
				header("Location:?pid=57&action=createxam_next&exmid=$ins_id&class_id=$classes_id");
				exit;
			}
		}
	
}

/*
*After clicking next button u will see the details
*/
if ($action=="createxam_next")
{
	$subjects_data = gettingSubject($class_id);
	$exmdetails = $db->getRows("SELECT * FROM es_exam_details WHERE academicexam_id = '$exmid'");
	
	foreach ($exmdetails as $ex)
	{
		$tmpid = $ex['subject_id'];
		$arrSubDetails[$tmpid]['es_exam_detailsid'] 	= $ex['es_exam_detailsid'];
		$arrSubDetails[$tmpid]['academicexam_id'] 		= $ex['academicexam_id'];
		$arrSubDetails[$tmpid]['subject_id'] 			= $ex['subject_id'];
		$arrSubDetails[$tmpid]['exam_date'] 			= $ex['exam_date'];
		$arrSubDetails[$tmpid]['exam_duration'] 		= $ex['exam_duration'];
		$arrSubDetails[$tmpid]['total_marks'] 			= $ex['total_marks'];
		$arrSubDetails[$tmpid]['pass_marks'] 			= $ex['pass_marks'];
		$arrSubDetails[$tmpid]['upload_exam_paper'] 	= $ex['upload_exam_paper'];
	}
//	array_print($arrSubDetails);
}
if ($exportcreateexam=="Export")
{
	
	$vlc   = new FormValidation();	
	if ($examname=="") {
	$errormessage[2]="Select Exam Name";			  
	}
	if ($academicyear=="") {
	$errormessage[3]="Select Academic Year";			  
	}
	
	if(count($errormessage)==0)
	 {
	    $subjects_sql="SELECT es_subjectname,es_subjectid FROM es_subject";
		$subjects_exe=mysql_query($subjects_sql);		
		while($subjects_row=mysql_fetch_array($subjects_exe)){ $subject_array[$subjects_row['es_subjectid']]=$subjects_row['es_subjectname'];}
		
		$e_sql="SELECT es_examname,es_examid FROM es_exam";
		$e_exe=mysql_query($e_sql);		
		while($e_row=mysql_fetch_array($e_exe)){ $examname_array[$e_row['es_examid']]=$e_row['es_examname'];}
		$staff_det = get_staffdetails($_SESSION['eschools']['user_id']);
		$c_sql="SELECT es_classname,es_classesid FROM es_classes WHERE es_classesid='".$staff_det['st_class']."'";
		$c_exe=mysql_query($c_sql);	
			
		while($c_row=mysql_fetch_array($c_exe)){ $classnamearray[$c_row['es_classesid']]=$c_row['es_classname'];}
		
		$g_sql="SELECT es_groupname,es_groupsid FROM es_groups";
		$g_exe=mysql_query($g_sql);		
		while($g_row=mysql_fetch_array($g_exe)){ $groupnamearray[$g_row['es_groupsid']]=$g_row['es_groupname'];}
				
		$data='"Group"'."\t".'"Class"'."\t".'"Exam Name"'."\t".'"Academic Year"'."\t".'"Subjects"'."\t".'"Exam Date"'."\t".'"Duration (hr)"'."\t".'"Total Marks"'."\t".'"Pass Marks"'."\n";  
		$condition="";
		if($groups_id!=""){ $condition.=" AND ea.group_id=".$groups_id; }
		if($class_id!=""){ $condition.=" AND ea.class_id=".$classes_id; }
		
		$reportdetails = "SELECT ea.group_id,ea.class_id,ea.exam_id,ea.academic_year,subject_id,exam_date,exam_duration,total_marks,pass_marks FROM es_exam_academic ea, es_exam_details ed WHERE ed.academicexam_id=ea.es_exam_academicid AND ea.exam_id = '$examname' AND ea.academic_year = '$academicyear' AND ea.class_id='".$staff_det['st_class']."' ".$condition;
		
	   
	   //$reportdetails = "SELECT std.es_preadmissionid, std.pre_name, std.pre_fathername, e.es_examname, s.es_subjectname, ed.total_marks, ed.pass_marks, m.es_marksobtined FROM es_exam_academic ae, es_exam_details ed, es_subject s, es_marks m, es_exam e, es_preadmission std, es_classes cl WHERE ae.exam_id = $examname AND ae.class_id = $classes_id AND ae.academic_year = '$academicyear' AND ed.academicexam_id = ae.es_exam_academicid AND ed.subject_id = s.es_subjectid AND e.es_examid = ae.exam_id AND cl.es_classesid = $classes_id AND m.es_examdetailsid = ed.es_exam_detailsid AND std.es_preadmissionid = m.es_marksstudentid ".$condition." ORDER BY std.es_preadmissionid, ed.subject_id ";
	
		$details = $db->getRows($reportdetails);
		//array_print($details);
		
			//exit;
		if(count($details)>0 ){
		foreach ($details as $row) {
			$line = '';
			foreach($row as $field=>$value) { if($field=="subject_id"){$value=$subject_array[$value];} if($field=="exam_id"){$value=$examname_array[$value];} if($field=="class_id"){$value=$classnamearray[$value];} if($field=="group_id"){$value=$groupnamearray[$value];}if($field=="exam_date"){$value=func_date_conversion("Y-m-d h:i:s","d/m/Y",$value);}
				$value = str_replace('"', '""', $value);
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
			}
			$data .= trim($line). "\n";
			$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_exam_academic','EXAMINATION','EXPORT CREATE EXAM','".$details."','EXPORT CREATE ACADEMIC EXAM','".$_SERVER['REMOTE_ADDR']."',NOW())";
    $log_insert_exe=mysql_query($log_insert_sql);
			
			
			
		}
		$data = str_replace("\r", "", $data);
		if ($data =="") {
			$data ="\n(0) Records Found!\n";
		}
		//print $data;exit;
		//header("Content-type: application/x-msdownload");
		header("Content-type: application/vnd.ms-excel");
		header('Content-Disposition: attachment; filename="examdetails.xls"');
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$data";
		exit;
	 }
	   
	}
}

if ($exportcreateexam_student=="Export")
{
	
	$vlc   = new FormValidation();	
	if ($examname=="") {
	$errormessage[2]="Select Exam Name";			  
	}
	$acyear_sel = "SELECT * FROM `es_finance_master` ORDER BY `es_finance_masterid` DESC LIMIT 0,1";
	$acyear_det = $db->getrow($acyear_sel);
	$academicyear = $acyear_det['fi_ac_startdate'].$acyear_det['fi_ac_enddate'];
	
	
	if(count($errormessage)==0)
	 {
	    $subjects_sql="SELECT es_subjectname,es_subjectid FROM es_subject";
		$subjects_exe=mysql_query($subjects_sql);		
		while($subjects_row=mysql_fetch_array($subjects_exe)){ $subject_array[$subjects_row['es_subjectid']]=$subjects_row['es_subjectname'];}
		
		$e_sql="SELECT es_examname,es_examid FROM es_exam";
		$e_exe=mysql_query($e_sql);		
		while($e_row=mysql_fetch_array($e_exe)){ $examname_array[$e_row['es_examid']]=$e_row['es_examname'];}
		$student_det = get_studentdetails($_SESSION['eschools']['user_id']);
		$c_sql="SELECT es_classname,es_classesid FROM es_classes WHERE es_classesid='".$student_det['pre_class']."'";
		$c_exe=mysql_query($c_sql);	
			
		while($c_row=mysql_fetch_array($c_exe)){ $classnamearray[$c_row['es_classesid']]=$c_row['es_classname'];}
		
		$g_sql="SELECT es_groupname,es_groupsid FROM es_groups";
		$g_exe=mysql_query($g_sql);		
		while($g_row=mysql_fetch_array($g_exe)){ $groupnamearray[$g_row['es_groupsid']]=$g_row['es_groupname'];}
				
		$data='"Group"'."\t".'"Class"'."\t".'"Exam Name"'."\t".'"Academic Year"'."\t".'"Subjects"'."\t".'"Exam Date"'."\t".'"Duration (hr)"'."\t".'"Total Marks"'."\t".'"Pass Marks"'."\n";  
		$condition="";
		if($groups_id!=""){ $condition.=" AND ea.group_id=".$groups_id; }
		if($class_id!=""){ $condition.=" AND ea.class_id=".$classes_id; }
		
		 $reportdetails = "SELECT ea.group_id,ea.class_id,ea.exam_id,ea.academic_year,subject_id,exam_date,exam_duration,total_marks,pass_marks FROM es_exam_academic ea, es_exam_details ed WHERE ed.academicexam_id=ea.es_exam_academicid AND ea.exam_id = '$examname' AND ea.academic_year = '$academicyear' AND ea.class_id='".$student_det['pre_class']."' ".$condition; 
		
	   
	   //$reportdetails = "SELECT std.es_preadmissionid, std.pre_name, std.pre_fathername, e.es_examname, s.es_subjectname, ed.total_marks, ed.pass_marks, m.es_marksobtined FROM es_exam_academic ae, es_exam_details ed, es_subject s, es_marks m, es_exam e, es_preadmission std, es_classes cl WHERE ae.exam_id = $examname AND ae.class_id = $classes_id AND ae.academic_year = '$academicyear' AND ed.academicexam_id = ae.es_exam_academicid AND ed.subject_id = s.es_subjectid AND e.es_examid = ae.exam_id AND cl.es_classesid = $classes_id AND m.es_examdetailsid = ed.es_exam_detailsid AND std.es_preadmissionid = m.es_marksstudentid ".$condition." ORDER BY std.es_preadmissionid, ed.subject_id ";
	
		$details = $db->getRows($reportdetails);
		//array_print($details);
		
			//exit;
		if(count($details)>0 ){
		foreach ($details as $row) {
			$line = '';
			foreach($row as $field=>$value) { if($field=="subject_id"){$value=$subject_array[$value];} if($field=="exam_id"){$value=$examname_array[$value];} if($field=="class_id"){$value=$classnamearray[$value];} if($field=="group_id"){$value=$groupnamearray[$value];}if($field=="exam_date"){$value=func_date_conversion("Y-m-d h:i:s","d/m/Y",$value);}
				$value = str_replace('"', '""', $value);
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
			}
			$data .= trim($line). "\n";
			$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_exam_academic','EXAMINATION','EXPORT CREATE EXAM','".$details."','EXPORT CREATE ACADEMIC EXAM','".$_SERVER['REMOTE_ADDR']."',NOW())";
    $log_insert_exe=mysql_query($log_insert_sql);
			
			
			
		}
		$data = str_replace("\r", "", $data);
		if ($data =="") {
			$data ="\n(0) Records Found!\n";
		}
		
		//header("Content-type: application/x-msdownload");
		header("Content-type: application/vnd.ms-excel");
		header('Content-Disposition: attachment; filename="examdetails.xls"');
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$data";
		exit;
	 }
	   
	}
}


/*
*From Here Student Marks can be entered
*/	
if($exam_search == "Search")
{
			 $vlc = new FormValidation();		
			
			if (empty($examname)) {
			$errormessage[2]="Enter Exam Name"; 
			}	
			
			if (empty($academicyear)) {
			$errormessage[3]="Select Year"; 
			}	
			
		   if(count($errormessage)==0)
			 {
			 
			$examdetails = $db->getRows("SELECT ae.*, ed.*, s.es_subjectname from es_exam_academic ae, es_exam_details ed, es_subject s WHERE ae.exam_id = $examname AND ae.group_id = $groups_id AND ae.class_id = $classes_id AND ae.academic_year = '$academicyear' AND ae.es_exam_academicid = ed.academicexam_id AND ed.subject_id = s.es_subjectid ");
			}
	

}

if($exam_submit=="Submit")
{
	//array_print($_FILES); exit;
	if(count($total_marks)>=1){
	if($total_marks[0]==""){
		$errormessage[0] = 'Please Enter all the fields';
		} }
	
	if(count($errormessage)==0){


	$cnar = count($subject_id);
	$errorfound = "";
	$subsno = array();
	for($f=0;$f<$cnar;$f++)
	{
		$vardate = "exam_date_".$f;
		$value_date = $_POST[$vardate];
		
		$vlc   = new FormValidation();
		if($value_date=="" && $exam_duration[$f]=="" && $total_marks[$f]=="" && $pass_marks[$f]=="")
		{
			$arrsub[] = $f;
		}
		else if(($value_date=="" || $exam_duration[$f]=="" || $total_marks[$f]=="" || !$vlc->is_allnumbers($total_marks[$f]) || $total_marks[$f]<1 || $pass_marks[$f]=="" || !$vlc->is_allnumbers($pass_marks[$f]) || $pass_marks[$f]<1) && ($value_date!="" || $exam_duration[$f]!="" || $total_marks[$f]!="" || $pass_marks[$f]!="")) {
			$errorfound = "yes";
			$subsno[] = $f+1;
		}
		
	}
	if($errorfound != "yes") {
		
		for($f=0;$f<$cnar;$f++)
		{
			if(!in_array($f,$arrsub))
			{
				$vardate = "exam_date_".$f;
				$value_dt = formatDateCalender($_POST[$vardate],"Y-m-d H:i:s");
				
				if($exam_detailsid[$f] != "") {
					$obj_exam_details->es_exam_detailsId = $exam_detailsid[$f];
				} else {
					$obj_exam_details->es_exam_detailsId = 0;
				}
				//echo basename($_FILES["upload_exam_paper"]["name"][$ar]);exit;
				
					
				if(!isset($old_exam_file[$f])){
					$upload_exam_paper = $_FILES['upload_exam_paper']['name'][$f];
					if (is_uploaded_file($_FILES['upload_exam_paper']['tmp_name'][$f])) {
						$ext = explode(".",$_FILES['upload_exam_paper']['name'][$f]);
						$str = date("mdY_hms");
						$new_thumbname = "str_".$str."_".$ext[0].".".$ext[1];
						$updir  = "../office_admin/documents/";
						$uppath = $updir.$new_thumbname;
						move_uploaded_file($_FILES['upload_exam_paper']['tmp_name'][$f],$uppath);
						$upload_exam_paper = $new_thumbname;
						
					} 
					}else {
					$upload_exam_paper = $old_exam_file[$f];
					}
			
			
				$obj_exam_details->academicexam_id = $exmid;
				$obj_exam_details->upload_exam_paper = $upload_exam_paper;
				$obj_exam_details->subject_id = $subject_id[$f];
				$obj_exam_details->exam_date = $value_dt;
				$obj_exam_details->exam_duration = $exam_duration[$f];
				$obj_exam_details->total_marks = $total_marks[$f];
				$obj_exam_details->pass_marks = $pass_marks[$f];
				
				$obj_exam_details->Save();
			}
		}
		header("Location:?pid=57&action=createxam&emsg=1");
		exit;
	}
	else {
		$str = implode(", ",$subsno);
		
		if(count($subsno)>0){
		foreach($subsno as $eachvalue){
		$errormessage[$eachvalue] = 'Please enter all fields for S.No. "'.$eachvalue.'".';
		}
		}
	}
	
	}
}
/**
* getting the list of exams
*/
if ((isset($search_students)&&$search_students=="Search")||$action1=='serchexam')
	{
		
	$classname=$obj_exam->GetList(array(array("examname", "LIKE", "%$esid%"),
		array("subject_id", "=", $subject_ids),array("class_id", "=", $clsid)));
	$count=count($obj_exam->GetList(array(array("examname", "LIKE", "%$esid%"),
		array("subject_id", "=", $subject_ids),array("class_id", "=", $clsid))));
    }
/*Examination Shedule  will be displayed for his class.*/
if ($action=="examlistforstaff")
	{
//$exams_data = $obj_exam->GetList();






       if(isset($exam_details) && $exam_details!="" ) {
	   
	   if ($examname=="") {
		$errormessage[0]="Select Exam";			  
		}
	
	if ($academicyear=="") {
			$errormessage[1]="Select Academic Year";			  
		}
		
		if(count($errormessage)==0){
	 		
		$examDetails = "SELECT acad. * , det. * 
								FROM es_exam_academic acad, es_exam_details det
								WHERE acad.group_id = '$groups_id'
								AND acad.class_id = '$classes_id'
								AND acad.academic_year = '$academicyear'
								AND acad.exam_id = '$examname'
								AND acad. es_exam_academicid = det. academicexam_id
								";
								
								$examDetailsList = getamultiassoc($examDetails);
			}	   
	   
	   }
	}
/*
*From Here Student Marks can be entered individually
*/
	if ($action=="stdmarksentry"){

		
		$allstudents = $db->getRows("SELECT std.es_preadmissionid, cl.es_classesid FROM es_preadmission std, es_classes cl WHERE cl.es_classesid = '$classes_id' AND cl.es_classesid = std.pre_class AND std.status!= 'inactive' AND std.status!= 'resultawaiting'");
	
	
	if($submit_std_mrk!="")
	{ 
		for($r=1;$r<=count($sub_sud_tot);$r++)
		{
			  $val=is_numeric($marksobtnd[$r]);
			if($marksobtnd[$r]!="" && $val==1) {
		if($marksobtnd[$r] > $sub_sud_tot[$r]){
		  $errormessage[$submit_std_mrk[$r]]= "In valid marks entered ";
		}
		} 
		}
	}
if(count($errormessage)>0){
header("Location:?pid=57&action=stdmarksentry&search_stdnt=Search&classes_id=$classes_id&regd_no=$regd_no&examname=$examname&academicyear=$academicyear&emsg=70");
		exit;
}if(count($errormessage)==0){
	if($submit_std_mrk!="")
	{
		
		//array_print($_POST);exit;
		
		for($r=1;$r<=count($exm_dtl);$r++)
		{
			
			if($student_marksid[$r]!="") {
				
				$marks->es_marksId = $student_marksid[$r];
			} else {
			
				$marks->es_marksId = 0;
			}
			$marks->es_examdetailsid = $exm_dtl[$r];
			$marks->es_marksstudentid = $regd_no;
			$marks->es_marksobtined = $marksobtnd[$r];
			$marks->status = "active";
			$marks->Save();
		}
		header("Location:?pid=57&action=stdmarksentry&emsg=1");
		exit;
	}
	
	}
	if($search_stdnt!="")
	{
		$vlc = new FormValidation();
		
		
		
		if (empty($regd_no)) {
			$errormessage[0]="Select Student Registration No.";	  
		}
		
		if (empty($examname)) {
			$errormessage[2]="Select Exam Name"; 
		}
		
		if (empty($academicyear)) {
			$errormessage[3]="Select Year"; 
		}
		
		if(count($errormessage)==0)
		{
			$examdetails = $db->getRows("SELECT ae.*, ed.*, s.es_subjectname from es_exam_academic ae, es_exam_details ed, es_subject s WHERE ae.exam_id = '$examname' AND ae.class_id = '$classes_id' AND ae.academic_year = '$academicyear' AND ae.es_exam_academicid = ed.academicexam_id AND ed.subject_id = s.es_subjectid ");
			
			if(count($examdetails) > 0)
			{
				foreach ($examdetails as $exmd)
				{
					$exmdtlid = $exmd['subject_id'];
					$arrStudents[$exmdtlid]['exm_dtl_id'] = $exmd['es_exam_detailsid'];
					$arrStudents[$exmdtlid]['total_marks'] = $exmd['total_marks'];
					$arrStudents[$exmdtlid]['pass_marks'] = $exmd['pass_marks'];
					if($exmd['es_exam_detailsid']!="") {
						$exd = $exmd['es_exam_detailsid'];
						$markdetails = $db->getRow("SELECT * FROM es_marks WHERE es_examdetailsid = '$exd' AND es_marksstudentid = '$regd_no'");
					}
					if($markdetails != "") {
						$arrStudents[$exmdtlid]['marks_id'] = $markdetails['es_marksid'];
						$arrStudents[$exmdtlid]['mark_obtnd'] = $markdetails['es_marksobtined'];
					}
				}
			}
			$allsubjects = $db->getRows("SELECT * FROM es_subject WHERE es_subjectshortname = '$classes_id'");
//			array_print($arrStudents);
		}
	}
}
/*Fetching his Particular Exam report in Student side*/	
if ($action == 'classwise' ) {



	$printUrl = "&examname=$examname";	
	if (isset($exam_marks_search) && $exam_marks_search!="") {
	
	if ($examname=="") {
		$errormessage[1]="Select Exam";	  
		}
	
	if(count($errormessage)==0){
	
	                
		$student_id = $_SESSION['eschools']['user_id'];
				
		$reportdetails = $db->getRows("SELECT ae.*, ed.*, m.*, s.*, e.es_examname, std.es_preadmissionid, cl.es_classname FROM es_exam_academic ae, es_exam_details ed,es_subject s, es_marks m, es_exam e, es_preadmission std, es_classes cl WHERE std.es_preadmissionid = '$student_id' AND cl.es_classesid = std.pre_class AND ae.class_id = cl.es_classesid AND ae.exam_id = '$examname' AND ed.academicexam_id = ae.es_exam_academicid AND s.es_subjectid = ed.subject_id AND e.es_examid = ae.exam_id AND m.es_examdetailsid = ed.es_exam_detailsid AND m.es_marksstudentid = '$student_id' AND ae.academic_year = '$from_acad$to_acad ' ORDER BY ed.subject_id");
		//array_print($reportdetails);
		if(count($reportdetails) > 0)
		{
			$tot_total = 0;
			$tot_pass = 0;
			$tot_secured = 0;
			foreach($reportdetails as $report) {
				$clasid = $report['class_id'];
				$sub_id = $report['subject_id'];
				$subArray[$sub_id]['subject_name'] = $report['es_subjectname'];
				$subArray[$sub_id]['exam_date'] = $report['exam_date'];
				$subArray[$sub_id]['exam_duration'] = $report['exam_duration'];
				$subArray[$sub_id]['total_marks'] = $report['total_marks'];
				$subArray[$sub_id]['pass_marks'] = $report['pass_marks'];
				$subArray[$sub_id]['marks_obtined'] = $report['es_marksobtined'];
				
				$tot_total = $tot_total + $report['total_marks'];
				$tot_pass = $tot_pass + $report['pass_marks'];
				$tot_secured = $tot_secured + $report['es_marksobtined'];
				
			}
			$sub_data = gettingSubject($clasid);
			$percentagemark = ($tot_secured/$tot_total)*100;
		}
		
//		array_print($reportdetails);
//		exit;
			
				  
	
	}
	
	}
}	
if ($action == 'mark_print') {
		
		$student_id = $_SESSION['eschools']['user_id'];
		
		$reportdetails = $db->getRows("SELECT ae.*, ed.*, m.*, s.*, e.es_examname, std.es_preadmissionid, cl.es_classname FROM es_exam_academic ae, es_exam_details ed,es_subject s, es_marks m, es_exam e, es_preadmission std, es_classes cl WHERE std.es_preadmissionid = '$student_id' AND cl.es_classesid = std.pre_class AND ae.class_id = cl.es_classesid AND ae.exam_id = '$examname' AND ed.academicexam_id = ae.es_exam_academicid AND s.es_subjectid = ed.subject_id AND e.es_examid = ae.exam_id AND m.es_examdetailsid = ed.es_exam_detailsid AND m.es_marksstudentid = '$student_id' AND ae.academic_year = '$from_acad$to_acad ' ORDER BY ed.subject_id");
	//array_print($reportdetails);
	
	if(is_array($reportdetails) && count($reportdetails) > 0)
	{
		$tot_total = 0;
		$tot_pass = 0;
		$tot_secured = 0;
		foreach($reportdetails as $report) {
			$clasid = $report['class_id'];
			$sub_id = $report['subject_id'];
			$subArray[$sub_id]['subject_name'] = $report['es_subjectname'];
			$subArray[$sub_id]['exam_date'] = $report['exam_date'];
			$subArray[$sub_id]['exam_duration'] = $report['exam_duration'];
			$subArray[$sub_id]['total_marks'] = $report['total_marks'];
			$subArray[$sub_id]['pass_marks'] = $report['pass_marks'];
			$subArray[$sub_id]['marks_obtined'] = $report['es_marksobtined'];
			
			$tot_total = $tot_total + $report['total_marks'];
			$tot_pass = $tot_pass + $report['pass_marks'];
			$tot_secured = $tot_secured + $report['es_marksobtined'];
			
		}
		$sub_data = gettingSubject($clasid);
		$percentagemark = ($tot_secured/$tot_total)*100;
	}
		
}	
/**
* getting the list of exams
*/
if ((isset($search_students)&&$search_students=="Search")||$action1=='serchexam'){
	
	$classname=$obj_exam ->GetList(array(array("examname", "LIKE", "%$examname%")));
    }

/**
* Enter the marks acarding to the exam name
*/
	//if(isset($entermarks))
//{
//$count=count($studentid)-1;
//
//for($i=0;$i<=$count;$i++)
//{
//	$marks->es_marksId=0;
//	$marks->examname   = $examname;
//		$marks->es_marksexamid	  = $examid[$i];
//		$marks->es_marksstudentid = $studentid[$i];
//		$marks->es_markssubjectid = $subjectid[$i];
//		$marks->es_marksobtined   = $studentmarks[$i]; 
//        $marks->es_markclassid    = $classid[$i];
//		$marks->status            = 'active'; 
//	  // saving the data
//		$marks->Save();
//	//header("Location:?pid=17&emsg=1&action=createxam");
//	
//
//	 
//	
//
//}
//
//}
if($action == 'entermarks') {
         $from = substr($academicyear,0,10);
	     $to = substr($academicyear,10,20);
/*$class_students = $db->getRows("SELECT stud.pre_name as student_name, stud.es_preadmissionid as student_id, m.* FROM es_preadmission stud, es_classes cl, es_marks m WHERE stud.pre_class = cl.es_classesid AND cl.es_classesid = '$classes_id' AND m.es_examdetailsid='$edmark' AND m.es_marksstudentid = stud.es_preadmissionid AND stud.status!= 'inactive' AND stud.status!= 'resultawaiting'");*/
	
	if(count($class_students) == 0) {
	 $sub_mrks = "SELECT stud.pre_name as student_name, stud.es_preadmissionid as student_id FROM 
		 es_preadmission stud, es_classes cl ,es_preadmission_details detail WHERE 
		 detail.es_preadmissionid = stud.es_preadmissionid  
		 AND detail.pre_fromdate = '".$from."' AND detail.pre_todate = '".$to."' 
		 AND detail.pre_class = cl.es_classesid AND cl.es_classesid = $classes_id AND stud.status!= 'inactive' AND stud.status!= 'resultawaiting'";
		 $class_students = $db->getRows($sub_mrks);
		 
		 
		/*$class_students = $db->getRows("SELECT stud.pre_name as student_name, stud.es_preadmissionid as student_id FROM es_preadmission stud, es_classes cl WHERE stud.pre_class = cl.es_classesid AND cl.es_classesid = $classes_id AND stud.status!= 'inactive' AND stud.status!= 'resultawaiting'");*/
	}
}
if($submit_marks=="Submit")
{

// validation for checking total marks  and ubtained marks
if(count($student_id) > 0)
	{
		for($g=0;$g<count($student_id);$g++)
		{
		 $val=is_numeric($stud_marks[$g]);
		
			if($stud_marks[$g]!="" && $val==1) {
			//echo $stud_marks[$g]."<br>";
		if($stud_marks[$g] > $subject_sud_total){
		 $errormessage[$student_id[$g]]= "In valid marks entered to student SM".$student_id[$g];
		}
		} 
		}
	}
if(count($errormessage)==0){
	
	if(count($student_id) > 0)
	{
		for($g=0;$g<count($student_id);$g++)
		{
			if($student_marksid[$g]!="") {
				$marks->es_marksId = $student_marksid[$g];
			} else {
				$marks->es_marksId = 0;
			}
			$marks->es_examdetailsid = $edmark;
			$marks->es_marksstudentid = $student_id[$g];
			$marks->es_marksobtined = $stud_marks[$g];
			$marks->status = "active";
			$marks->Save();
		}
//		array_print($_POST);exit;
		header("Location:?pid=57&action=marksentry&emsg=1");
		exit;
	}
}
}
if ($action=="uploadmarks"){
	
	$class_students = $db->getRows("SELECT stud.pre_name as student_name, stud.es_preadmissionid as student_id, m.* FROM es_preadmission stud, es_classes cl, es_marks m WHERE stud.pre_class = cl.es_classname AND cl.es_classesid = '$classes_id' AND m.es_examdetailsid='$edmark' AND m.es_marksstudentid = stud.es_preadmissionid ");
	
	if (isset($upload_std_marks)){
		$dbase = new mysql_driver(DB_SERVER, DB_SERVER_USERNAME, DB_SERVER_PASSWORD, DB_DATABASE);
		
		$file_upldmrk_path = $_FILES['upldmrk'];
		
		$extraPars = "es_examdetailsid=$edmark";
		$arr_tabs = array(
					"es_marksstudentid"=>"Registration Number",
					"es_marksobtined"=>"Marks Obtained"
				);
		$result = $dbase->import_table("es_marks",$file_upldmrk_path,false,',',false,$arr_tabs,$extraPars);
		if($result) {
			header("Location:?pid=57&action=marksentry&emsg=1");
			exit;
		}
	}
}
	
if($action=='performence')
{
	$class_data =$es_classes ->GetList(array(array("es_classesid", ">", 0)));
	$examname=$obj_exam ->GetList(array(array("es_examinationsid", ">", 0)));
    $subjects=$subjectname ->GetList(array(array("es_subjectid", ">", 0)));
}
if(isset($sperfarmance))
{
if (isset($classes_id)&&$classes_id=='Select'&&isset($result_serchnameofexam)&& $result_serchnameofexam=='Select'&&isset($subjectnames)&&$subjectnames=='Select')
	{
	$errormessage[0]="Select All Select Boxes";
	}
	else
	{

$q_limit  = 10;
	if ( !isset($start) ){
		$start = 0;
	   }	
	
	
		$orderby_array = array('orb1'=>'es_marksid','orb2'=>'cfs_name','orb3'=>'cfs_modeofadds','orb4'=>'cfs_posteddate');
		
		if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
			$orderby = $orderby_array[$column_name];
		}else{
			$orderby = "es_marksid";
		}
		if (isset($asds_order)&&$asds_order=='ASC'){
			$order = true;
		}else{
			$order = false;
		}
		$conditon =array();
		
		
if (isset($classes_id)&&$classes_id!=''&&isset($result_serchnameofexam)&& $result_serchnameofexam!=''&&isset($subjectnames)&&$subjectnames!=''){
	
			$status='active';
			$conditon[] = array("es_markclassid", "=", $classes_id);
			$conditon[] = array("es_marksexamid", "=",$result_serchnameofexam);
			$conditon[] = array("es_markssubjectid", "=",$subjectnames);
			$conditon[] = array("status", "=",$status);
		
					
		}
	 $no_rows = count($marks ->GetList($conditon, $orderby, $order));
		$marksoptained = $marks->GetList($conditon, $orderby, $order, " $start, $q_limit ");

		}
		if($no_rows=='0'){
		 $nill1="No records found" ;
	
}
}
if(isset($back))
{
	header("Location:?pid=57&action=examlistforstaff");
}

if($action=='classwise1')
  {
	  $class_data =$es_classes ->GetList(array(array("es_classesid", ">", 0)));
	  $examname=$obj_exam ->GetList(array(array("es_examinationsid", ">", 0)));
	  

  }
 /*  if(isset($classwiseserch)||$action=='classwise1')
{

	$studentclass=$students->Get($_SESSION['eschools']['user_id']);

 $q_limit  = 1;
	if ( !isset($start) ){
		$start = 0;
	   }	
	
	
		$orderby_array = array('orb1'=>'es_marksid','orb2'=>'cfs_name','orb3'=>'cfs_modeofadds','orb4'=>'cfs_posteddate');
		
		if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
			$orderby = $orderby_array[$column_name];
		}else{
			$orderby = " ORDER BY `es_marksid`";
		}
		if (isset($asds_order)&&$asds_order=='ASC'){
			$order = 'ASC';
		}else{
			$order = 'DESC';
		}
		
		if (isset($result_serchnameofexam)&& $result_serchnameofexam!=''){
			
			$condition = " WHERE  es_markclassid =".$studentclass->pre_class." AND "."  es_marksexamid=".$result_serchnameofexam." AND "."	es_marksstudentid=".$studentclass->es_preadmissionId."  AND  status = 'active'";
		}

		//$no_rows = //count($marks ->GetList($conditon, $orderby, $order));
		$sql = "SELECT * FROM `es_marks`  ".$condition ."  ".$orderby."  "."   ".$order."  LIMIT  " . $start .", ". $q_limit;
		$sql1 = "SELECT * FROM `es_marks`  ".$condition ."  ".$orderby."  "."   ".$order;
		$query=mysql_query($sql1);
		$no_rows=mysql_num_rows($query);
		$marksoptained = $db->getRows($sql);
		
		 //array_print($marksoptained);
		$studenarr = array(); 
		foreach($marksoptained as $eachmar){
			$tempid = $eachmar['es_marksstudentid'];
			if ($tempid == $eachmar['es_marksstudentid']){
				$studenarr[$eachmar['es_marksstudentid']] = $eachmar;
			
			}
		}
		//$srchmarks = array_print($studenarr);
//exit;
   

		}
		if($no_rows=='0'){
		 $nill1="No records found" ;
	
} */
/*
Performance of the students for his class will come here.
*/
if ($action=='allstudents'){
	$q_limit = 5;
	if ( !isset($start) ){
		$start = 0;
	}
	if ($exam_reports || ($examname!="" && $classes_id!="" && $academicyear!="")){
	   $vlc = new FormValidation();		
			
		if (empty($examname)) {
		$errormessage[2]="Enter Exam Name"; 
		}	
		
		if (empty($academicyear)) {
		$errormessage[3]="Select Year"; 
		}	
		
   if(count($errormessage)==0)
	 {
	 $from = substr($academicyear,0,10);
	    $to = substr($academicyear,10,20);
	  $report_det_qry = "SELECT ae.*, ed.*, m.*, s.*, e.es_examname, std.es_preadmissionid, std.pre_dateofbirth, std.pre_name, std.pre_fathername,std.pre_emailid, cl.es_classname  FROM es_exam_academic ae, es_exam_details ed, es_subject s, es_marks m, es_exam e, es_preadmission std, es_classes cl , es_preadmission_details detail WHERE detail.es_preadmissionid = std.es_preadmissionid  AND detail.pre_fromdate = '".$from."' AND detail.pre_todate = '".$to."' AND   detail.pre_class = ae.class_id AND ae.exam_id = $examname AND ae.class_id = $classes_id AND ae.academic_year = '$academicyear' AND ed.academicexam_id = ae.es_exam_academicid AND ed.subject_id = s.es_subjectid AND e.es_examid = ae.exam_id AND cl.es_classesid = $classes_id AND m.es_examdetailsid = ed.es_exam_detailsid AND std.es_preadmissionid = m.es_marksstudentid AND std.status !='inactive' ORDER BY std.es_preadmissionid, ed.subject_id ";
	  $reportdetails = $db->getRows( $report_det_qry);
	 }  
		$rep_subject = array();
		if ($reportdetails!="") {
			foreach ($reportdetails as $rep) {
				$rep_subject[] = $rep['subject_id'];
			}
			$cnt_sub = count(array_unique($rep_subject));
		}
		$s = 0;
		$cnt_std = 0;
		$tmp_std = "";
		$total = 0;
		$pass_total = 0;
		$secured_total = 0;
		$subPassCnt = array();
		$disp_report = array();
			
		for($i=0;$i<count($reportdetails);$i++){
				$subject_str=$db->getRow("SELECT * FROM es_preadmission EP,es_preadmission_details EPD,subjects_cat SC WHERE EPD.scat_id=SC.scat_id AND  EP.es_preadmissionid=EPD.es_preadmissionid AND EP.pre_class=EPD.pre_class AND EP.es_preadmissionid=".$reportdetails[$i]['es_preadmissionid']);
			
			if($subject_str['subject_id_array']!=''){
			$subject_id_array=explode('@#@#@',$subject_str['subject_id_array']);
			//echo $reportdetails[$i]['es_subjectid'];
			if(in_array($reportdetails[$i]['es_subjectid'],$subject_id_array)){

			if ($tmp_std != $reportdetails[$i]['es_preadmissionid']){
				$cnt_std++;
				$total = 0;
				$pass_total = 0;
				$secured_total = 0;
				$tmp_std = $reportdetails[$i]['es_preadmissionid'];
				$disp_report[$tmp_std]['examname'] = $reportdetails[$i]['es_examname'];
				$disp_report[$tmp_std]['year'] = $reportdetails[$i]['academic_year'];
				$disp_report[$tmp_std]['name'] = $reportdetails[$i]['pre_name'];
				$disp_report[$tmp_std]['fathername'] = $reportdetails[$i]['pre_fathername'];
				$disp_report[$tmp_std]['regid'] = $reportdetails[$i]['es_preadmissionid'];
				$disp_report[$tmp_std]['class'] = $reportdetails[$i]['es_classname'];
				$disp_report[$tmp_std]['dob'] = $reportdetails[$i]['pre_dateofbirth'];
				$disp_report[$tmp_std]['email'] = $reportdetails[$i]['pre_emailid'];
				$disp_report[$tmp_std]['subjects'][$s]['subject_name'] = $reportdetails[$i]['es_subjectname'];
				$disp_report[$tmp_std]['subjects'][$s]['subject_id'] = $reportdetails[$i]['es_subjectid'];
				$disp_report[$tmp_std]['subjects'][$s]['total_marks'] = $reportdetails[$i]['total_marks'];
				$disp_report[$tmp_std]['subjects'][$s]['pass_marks'] = $reportdetails[$i]['pass_marks'];
				$disp_report[$tmp_std]['subjects'][$s]['mark_obtined'] = $reportdetails[$i]['es_marksobtined'];
				$total+=$reportdetails[$i]['total_marks'];
				$pass_total+=$reportdetails[$i]['pass_marks'];
				if(is_numeric($reportdetails[$i]['es_marksobtined'])){$val=$reportdetails[$i]['es_marksobtined'];}else{ $val=0;}
				$secured_total+= $val;
				$tmpname = $reportdetails[$i]['es_subjectname'];
				if($reportdetails[$i]['es_marksobtined'] > $reportdetails[$i]['pass_marks']) {
					if($disp_report['cnt_pass'][$tmpname]) {
						$disp_report['cnt_pass'][$tmpname] = $disp_report['cnt_pass'][$tmpname]+1;
					} else {
						$disp_report['cnt_pass'][$tmpname] = 1;
					}
				}
				$disp_report['cnt_std'] = $cnt_std;
				$percentage = ($secured_total/$total)*100;
				$percentage = number_format($percentage,2,'.','');
				$disp_report[$tmp_std]['total'] = $total;
				$disp_report[$tmp_std]['pass_total'] = $pass_total;
				$disp_report[$tmp_std]['secured_total'] = $secured_total;
				$disp_report[$tmp_std]['percentage'] = $percentage;
				
			}else {
					$disp_report[$tmp_std]['subjects'][$s]['subject_name'] = $reportdetails[$i]['es_subjectname'];
					$disp_report[$tmp_std]['subjects'][$s]['subject_id'] = $reportdetails[$i]['es_subjectid'];
					$disp_report[$tmp_std]['subjects'][$s]['total_marks'] = $reportdetails[$i]['total_marks'];
					$disp_report[$tmp_std]['subjects'][$s]['pass_marks'] = $reportdetails[$i]['pass_marks'];
					$disp_report[$tmp_std]['subjects'][$s]['mark_obtined'] = $reportdetails[$i]['es_marksobtined'];
					
					$total+=$reportdetails[$i]['total_marks'];
					$pass_total+=$reportdetails[$i]['pass_marks'];
					
					if(is_numeric($reportdetails[$i]['es_marksobtined'])){$val=$reportdetails[$i]['es_marksobtined'];}else{ $val=0;}
				$secured_total+= $val;
					
			
					
					$tmpname = $reportdetails[$i]['es_subjectname'];
					if($reportdetails[$i]['es_marksobtined'] > $reportdetails[$i]['pass_marks']) {
						if($disp_report['cnt_pass'][$tmpname]) {
							$disp_report['cnt_pass'][$tmpname] = $disp_report['cnt_pass'][$tmpname]+1;
						} else {
							$disp_report['cnt_pass'][$tmpname] = 1;
						}

					}
					
					$percentage = ($secured_total/$total)*100;
					$percentage = number_format($percentage,2,'.','');
					$disp_report[$tmp_std]['total'] = $total;
					$disp_report[$tmp_std]['pass_total'] = $pass_total;
					$disp_report[$tmp_std]['secured_total'] = $secured_total;
					$disp_report[$tmp_std]['percentage'] = $percentage;
				}
				
				}}
				$s++;
				
			}
		
		//array_print($disp_report);
			$no_rows = $disp_report['cnt_std'];
			$loopstrt = $start;
			$loopend = $start + $q_limit;
		}
	}



?>