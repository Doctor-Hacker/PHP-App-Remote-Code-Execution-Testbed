<?php
	if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}

sm_registerglobal('pid', 'action','emsg','groups_id','exportcreateexam','exam_reports_export','classes_id', 'examname', 'subject_ids','at_std_subject', 'maxmarks', 'minmarks', 'cr_examsbmt','action1','start','serchexamresults', 'classid','result_serchnameofexam','search_students','examname','entermarks','studentid','studentmarks','subjectid','examid','radiobutton','markscount','classwiseserch','sm_class','sid','studentid','stid','resultserch','examdtae','esid','clsid','back','upload_std_marks','exam_next','academicyear','exmid','subject_id','exam_duration','total_marks','pass_marks','exam_submit','exam_search','edmark','submit_marks','student_id','stud_marks','exam_reports','class_id','exam_detailsid','student_marksid','student_id','studentr_regno','exam_marks_search','regd_no','search_stdnt','submit_std_mrk','exm_dtl','marksobtnd','upload_exam_paper','subject_sud_total','sub_sud_tot','std_clsid','ed','old_exam_paper');
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ../?pid=1&unauth=0');
	exit;
}
$obj_exam    = new es_examinations();
$students    = new es_preadmission();
$subjectname = new es_subject();
$es_classes  = new es_classes();
$marks       = new es_marks();
$exams       = new es_exam();
$obj_academic_exam       = new es_exam_academic();
$obj_exam_details       = new es_exam_details();

/**********************************************************************
* Get  groups and Classes
**********************************************************************/

//get groups
	$c_groups = get_groups();
	
	

//get classes
 if (isset($groups_id)&& $groups_id!="") {
	$class_data = getClasses($groups_id);
 } else {
 	$class_data = getClasses();
 }
//get Exams
	$exam_data = get_Exams();

	$from_acad = $_SESSION['eschools']['from_acad'];
	$to_acad   = $_SESSION['eschools']['to_acad'];
	$school_details_sel = "SELECT * FROM `es_finance_master` ORDER BY `es_finance_masterid` DESC";
	$school_details_res = getamultiassoc($school_details_sel);

if($action=='delete_paper'){
$rec_det = $db->getrow("SELECT * FROM es_exam_details WHERE es_exam_detailsid=".$exam_detailsid."");
unlink("documents/".$rec_det['upload_exam_paper']);
$db->update("es_exam_details","upload_exam_paper=''","es_exam_detailsid=".$exam_detailsid);
header("location:index.php?pid=36&action=createxam_next&exmid=$exmid&class_id=$class_id&emsg=56");
exit;
}	
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
		$obj_exam->subject_id = $subject_ids[$i]; 
		$obj_exam->examdate   = DatabaseFormat($examdtae,"Y-m-d");
	  // saving the data
		$obj_exam->Save();
	
	
	}
	}
	header("Location:?pid=36&emsg=1&action=createxam");
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
		
		$c_sql="SELECT es_classname,es_classesid FROM es_classes";
		$c_exe=mysql_query($c_sql);		
		while($c_row=mysql_fetch_array($c_exe)){ $classnamearray[$c_row['es_classesid']]=$c_row['es_classname'];}
		
		$g_sql="SELECT es_groupname,es_groupsid FROM es_groups";
		$g_exe=mysql_query($g_sql);		
		while($g_row=mysql_fetch_array($g_exe)){ $groupnamearray[$g_row['es_groupsid']]=$g_row['es_groupname'];}
				
		$data='"Group"'."\t".'"Class"'."\t".'"Exam Name"'."\t".'"Academic Year"'."\t".'"Subjects"'."\t".'"Exam Date"'."\t".'"Duration (hr)"'."\t".'"Total Marks"'."\t".'"Pass Marks"'."\n";  
		$condition="";
		if($groups_id!=""){ $condition.=" AND ea.group_id=".$groups_id; }
		if($class_id!=""){ $condition.=" AND ea.class_id=".$classes_id; }
		
		$reportdetails = "SELECT ea.group_id,ea.class_id,ea.exam_id,ea.academic_year,subject_id,exam_date,exam_duration,total_marks,pass_marks FROM es_exam_academic ea, es_exam_details ed WHERE ed.academicexam_id=ea.es_exam_academicid AND ea.exam_id = '$examname' AND ea.academic_year = '$academicyear' ".$condition;
		
	   
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
*Start of Create Examination Web Page
*/	

if ($exam_next=="Next")
{
	
	$vlc   = new FormValidation();

	if ($groups_id=="") {
	$errormessage[0]="Select Group";			  
	}
	if ($classes_id=="") {
	$errormessage[1]="Select Class";			  
	}
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
			header("Location:?pid=36&action=createxam_next&exmid=$exam_id&class_id=$classes_id");
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
			$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_exam_academic','EXAMINATION','CREATE EXAM','".$ins_id."','CREATE NEW ACADEMIC EXAM','".$_SERVER['REMOTE_ADDR']."',NOW())";
    $log_insert_exe=mysql_query($log_insert_sql);
			
			header("Location:?pid=36&action=createxam_next&exmid=$ins_id&class_id=$classes_id");
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
if($exam_submit=="Submit")
{
	
	/*array_print($_POST);
	exit;*/
	
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
			$obj_exam_details = new es_exam_details();
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
				
			
				$new_thumbname = "";
					 $upload_exam_paper = $_FILES['upload_exam_paper']['name'][$f]; 
					if (is_uploaded_file($_FILES['upload_exam_paper']['tmp_name'][$f])) {
						$ext = explode(".",$_FILES['upload_exam_paper']['name'][$f]);
						$str = date("mdY_hms");
						$new_thumbname = "str_".$str."_".$ext[0].".".$ext[1];
						$updir  = "documents/";
						$uppath = $updir.$new_thumbname;
						move_uploaded_file($_FILES['upload_exam_paper']['tmp_name'][$f],$uppath);
						 //$upload_exam_paper = $new_thumbname; 
												
					}
					elseif($old_exam_paper[$exam_detailsid[$f]] !=""){
					$new_thumbname = $old_exam_paper[$exam_detailsid[$f]];
					}
					
			
				 
				$obj_exam_details->academicexam_id = $exmid;
				$obj_exam_details->subject_id = $subject_id[$f];
				$obj_exam_details->exam_date = $value_dt;
				$obj_exam_details->exam_duration = $exam_duration[$f];
				$obj_exam_details->total_marks = $total_marks[$f];
				$obj_exam_details->upload_exam_paper = $new_thumbname;
				$obj_exam_details->pass_marks = $pass_marks[$f];
								
				$obj_exam_details->Save();
				$obj_exam_details->pog_query; 
				$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_exam_details','EXAMINATION','CREATE EXAM','".$exmid."','CREATE NEW ACADEMIC EXAM SCHEDULE','".$_SERVER['REMOTE_ADDR']."',NOW())";
    $log_insert_exe=mysql_query($log_insert_sql);
			}
		}
		
		header("Location:?pid=36&action=createxam_next&exmid=$exmid&class_id=$class_id&emsg=1");
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



if ($action=="marksentry"){
	
}
/*
*From Here Student Marks can be entered individually
*/	
if($exam_search == "Search")
{
	 

	 $vlc = new FormValidation();		
		
		if (empty($groups_id)) {
		$errormessage[0]="Select Group";	  
		}	
		
		if (empty($classes_id)) {
		$errormessage[1]="Select Class";	  
		}		
			
		if (empty($examname)) {
		$errormessage[2]="Select Exam Name"; 
		}	
		
		if (empty($academicyear)) {
		$errormessage[3]="Select Academic Year"; 
		}	
		
   if(count($errormessage)==0)
	 {
	 	$exam_det_qry = "SELECT ae.*, ed.*, s.es_subjectname from es_exam_academic ae, es_exam_details ed, es_subject s WHERE ae.exam_id = $examname AND ae.group_id = $groups_id AND ae.class_id = $classes_id AND ae.academic_year = '$academicyear' AND ae.es_exam_academicid = ed.academicexam_id AND ed.subject_id = s.es_subjectid ";
	  $examdetails = $db->getRows($exam_det_qry);
	}


}

if ($action=="entermarks" || $action=="entermarksprint"){
		$from = substr($academicyear,0,10);
	    $to = substr($academicyear,10,20);
		
	//$sub_std_qry = "SELECT stud.pre_name as student_name, stud.es_preadmissionid as student_id, m.* ,detail.* FROM es_preadmission stud, es_classes cl, es_marks m ,es_preadmission_details detail  WHERE detail.es_preadmissionid = stud.es_preadmissionid  AND detail.pre_fromdate = '".$from."' AND detail.pre_todate = '".$to."' AND   detail.pre_class = cl.es_classesid AND cl.es_classesid = '$classes_id' AND m.es_examdetailsid='$edmark' AND m.es_marksstudentid = stud.es_preadmissionid AND stud.status!= 'inactive' AND stud.status!= 'resultawaiting'";	
	 //$class_students = $db->getRows($sub_std_qry);
	
	//array_print($class_students);
	if(count($class_students) == 0) {
	 $sub_mrks = "SELECT stud.pre_name as student_name, stud.es_preadmissionid as student_id FROM 
		 es_preadmission stud, es_classes cl ,es_preadmission_details detail WHERE 
		 detail.es_preadmissionid = stud.es_preadmissionid  AND stud.pre_status!='delete'
		 AND detail.pre_fromdate = '".$from."' AND detail.pre_todate = '".$to."' 
		 AND detail.pre_class = cl.es_classesid AND cl.es_classesid = $classes_id AND stud.status!= 'inactive' AND stud.status!= 'resultawaiting'";
		 $class_students = $db->getRows($sub_mrks);
	}
	//$id=mysql_query('es_classname');
	$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_classes','EXAMINATION','SUBJECT WISE MARKS','','PRINT MARKS SUBJECT WISE','".$_SERVER['REMOTE_ADDR']."',NOW())";
    $log_insert_exe=mysql_query($log_insert_sql);
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
			$marks = new es_marks();
			
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
			
			
			//echo '<br>'.$marks->pog_query;
			$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_marks','EXAMINATION','SUBJECT WISE MARKS','".$stud_marks[$g]."','UPDATING MARKS SUBJECT WISE','".$_SERVER['REMOTE_ADDR']."',NOW())";
    $log_insert_exe=mysql_query($log_insert_sql);
		}
		
//		array_print($_POST);exit;
		header("Location:?pid=36&action=marksentry&emsg=1&groups_id=$groups_id&classes_id=$classes_id&examname=$examname&academicyear=$academicyear&exam_search=Search");
		exit;
	}
}
}

if ($action=="uploadmarks"){
	
	$class_students = $db->getRows("SELECT stud.pre_name as student_name, stud.es_preadmissionid as student_id, m.* FROM es_preadmission stud, es_classes cl, es_marks m WHERE stud.pre_class = cl.es_classname  AND stud.pre_status!='delete' AND cl.es_classesid = '$classes_id' AND m.es_examdetailsid='$edmark' AND m.es_marksstudentid = stud.es_preadmissionid ");
	
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
			header("Location:?pid=36&action=marksentry&emsg=1");
			exit;
		}
	}
}
/*
*From Here Student Marks can be entered individually
*/
if ($action=="stdmarksentry" || $action=="stdmarksentryprint"){
 
	if($classes_id!="" && academicyear!='') {
	 $a=substr($academicyear,0,10);
	 $b=substr($academicyear,10,20);
		$allstudents = $db->getRows("SELECT std.pre_name,std.es_preadmissionid, cl.es_classesid FROM es_preadmission std, es_classes cl WHERE cl.es_classesid = '$classes_id' AND cl.es_classesid = std.pre_class AND std.status!= 'inactive'  AND std.pre_status!='delete'AND std.status!= 'resultawaiting' and pre_todate = '".$b."' AND  pre_fromdate = '".$a."'");		
	}	
	 $school['fi_ac_startdate'].$school['fi_ac_enddate'];
	if($submit_std_mrk!="")
	{ 
		for($r=1;$r<=count($sub_sud_tot);$r++)
		{
			$val=is_numeric($marksobtnd[$r]); 
			if($marksobtnd[$r]!="" && $val==1) {
			if($marksobtnd[$r] > $sub_sud_tot[$r]){
		 $errormessage[$submit_std_mrk[$r]]= "Obtained Marks Should not be greater than Total Marks";
		}
		}
		 
		}
	}
if(count($errormessage)>0){
header("Location:?pid=36&action=stdmarksentry&search_stdnt=Search&classes_id=$classes_id&regd_no=$regd_no&examname=$examname&academicyear=$academicyear&emsg=70");
		exit;
}
	
	
	if(count($errormessage)==0){
	
	if($submit_std_mrk!="")
	{ 
		for($r=1;$r<=count($exm_dtl);$r++)
		{
		    $marks = new es_marks();
			if($student_marksid[$r]!="") {
				 $marks->es_marksId = $student_marksid[$r];
			} else {
				 $marks->es_marksId = 0;
			}
			
			
			$marks->es_examdetailsid = $exm_dtl[$r];
			$marks->es_marksstudentid = $regd_no;
			$marks->es_marksobtined = $marksobtnd[$r];
			$marks->status = "active";
			if( $marksobtnd[$r]!=""){
			$marks->Save();
			}
			
			//echo '<br>'.$marks->pog_query;
			$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_marks','EXAMINATION','STUDENT WISE MARKS','".$regd_no."','ENTERING MARKS STUDENT WISE','".$_SERVER['REMOTE_ADDR']."',NOW())";
    $log_insert_exe=mysql_query($log_insert_sql);
			
		}
		//exit;
		header("Location:?pid=36&action=stdmarksentry&emsg=1");
		exit;
	}
	
	}
	if($search_stdnt!="")
	{
		$vlc = new FormValidation();
		
		if (empty($classes_id)) {
			$errormessage[1]="Select Class";	  
		}
		
		if (empty($regd_no)) {
			$errormessage[0]="Select Student Registration No.";	  
		}
		
		if (empty($examname)) {
			$errormessage[2]="Select Exam Name"; 
		}
		
		if (empty($academicyear)) {
			$errormessage[3]="Select Academic Year"; 
		}
		if(count($errormessage)==0){
		$from = substr($academicyear,0,10);
	    $to = substr($academicyear,10,20);
		$check_student = "SELECT COUNT(*) FROM es_preadmission_details WHERE pre_fromdate = '".$from."' AND pre_todate = '". $to ."' AND pre_class = '".$classes_id."' AND es_preadmissionid='".$regd_no."'";
		$student_rows = $db->getone($check_student);
		if($student_rows==0){$errormessage[4]="!!! Alert Student is not available in this Academic Year"; }
		$check_exam = "SELECT COUNT(*) FROM es_exam_academic EA , es_exam_details ED WHERE ED.academicexam_id = EA.es_exam_academicid 
		AND EA.exam_id ='".$examname."' AND EA.class_id = '".$classes_id."' AND academic_year='".$academicyear."' ";
		$exam_rows = $db->getone($check_exam);
		if($exam_rows==0){$errormessage[5]="!!! Alert Exam is not created in this Academic Year"; }
		
		}
		
		if(count($errormessage)==0)
		{
			$allstudent = $db->getRow("SELECT std.pre_name,std.pre_fathername,std.es_preadmissionid,pre_class FROM es_preadmission std WHERE std.es_preadmissionid = '$regd_no' AND std.pre_status!='delete'");
			//array_print($allsubjects);
			$c_sql="SELECT es_classname,es_classesid FROM es_classes";
			$c_exe=mysql_query($c_sql);		
			while($c_row=mysql_fetch_array($c_exe)){ $classnamearray[$c_row['es_classesid']]=$c_row['es_classname'];}
			
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
            $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_marks','EXAMINATION','STUDENT WISE MARKS','".$regd_no."','PRINT MARKS STUDENT WISE','".$_SERVER['REMOTE_ADDR']."',NOW())";
    $log_insert_exe=mysql_query($log_insert_sql);
		}
	}
}

if ($action=="downloadsample"){
	
	$dir      = "./documents/";
	$file      = "studentmarks.xls";
    if ((isset($file))&&(file_exists($dir.$file))) {
       header("Content-type: application/force-download");
       header('Content-Disposition: inline; filename="' . $dir.$file . '"');
       header("Content-Transfer-Encoding: Binary");
       header("Content-length: ".filesize($dir.$file));
       header('Content-Type: application/octet-stream');
       header('Content-Disposition: attachment; filename="' . $file . '"');
       readfile("$dir$file");
    } else {
       echo "No file selected to download";
    }
    
}

/**
*Create the marks sheets for the students
*/
if ($action=="marksheet"){

}
/**
* Create the marks sheets for the students
*/
if ($action=="reports"){

}

if($action=='genaretemarks'||$action=='classwise'||$action=='classwise1')
  {
	  $class_data =$es_classes ->GetList(array(array("es_classesid", ">", 0)));
	  $examname=$obj_exam ->GetList(array(array("es_examinationsid", ">", 0)));
	  

  }
  if(isset($serchexamresults)||$action1=='marksexam')
  {
	  $q_limit  = 1;
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
		
		
if (isset($classes_id)&&$classes_id!=''&&isset($result_serchnameofexam)&& $result_serchnameofexam!=''){
	
			$status='active';
			$conditon[] = array("es_markclassid", "=", $classes_id);
			$conditon[] = array("es_marksexamid", "=",$result_serchnameofexam);
			$conditon[] = array("status", "=",$status);
		
					
		}elseif(isset($classes_id)&& $classes_id!=''){
			
			$status='active';;
			$conditon[] = array("es_markclassid", "=", $classes_id);
        	$conditon[] = array("status", "=",$status);
			
        }
        elseif (isset($result_serchnameofexam)&& $result_serchnameofexam!='')
        {  
            $status='active';
		   $conditon[] = array("es_marksexamid", "=",$result_serchnameofexam);
           $conditon[] = array("status", "=",$status);
	
        }
	 $no_rows = count($marks ->GetList($conditon, $orderby, $order));
		$marksoptained = $marks->GetList($conditon, $orderby, $order, " $start, $q_limit ");

		}
		if($no_rows=='0'){
		 $nill1="No records found" ;
	
}

if(isset($classwiseserch)||$action=='classwise1')
{
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
		
		if (isset($classes_id)&&$classes_id!=''&&isset($result_serchnameofexam)&& $result_serchnameofexam!=''){
			
			$condition = " WHERE  es_markclassid ='".$classes_id."' AND "."  es_marksexamid='".$result_serchnameofexam."'  AND  status = 'active'";
		}elseif(isset($classes_id)&& $classes_id!=''){

			$condition = " WHERE  es_markclassid ='".$classes_id."'  AND status = 'active'";
		}elseif (isset($result_serchnameofexam)&& $result_serchnameofexam!=''){  
           
			$condition = " WHERE  es_marksexamid='".$result_serchnameofexam."'  AND status = 'active'";
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

   

		}
		if($no_rows=='0'){
		 $nill1="No records found" ;
	
}

	  $allClasses = getallClasses();
 
  if($action=='classwisestudent')
  {
	  
  $classwisestudent = $students ->GetList(array(array("pre_class", "=",$sid),array("pre_status", "=",'inactive')));
  }

  if($action=='studentwise')
  {
	  
  $classwisestudent = $students ->GetList(array(array("pre_class", "=",$sid),array("pre_status", "=",'inactive')));
  }
  
  if(isset($resultserch))
  {
 $name =$students ->Get($sid);
 $year=date(y);
 $sqlq="SELECT DISTINCT es_marksexamid from es_marks where`es_markclassid`='".$sid."' and year='".$year."'";
 $examids = $db->getRows($sqlq);
  }
  if(isset($back))
    {
		header('location: ?pid=44');
  }
	
  /*We will get Class wise Exam reports */	
  
if ($action=='allstudents' || $action=='print_list_allstudents'){
	$q_limit = 10;
	if ( !isset($start) ){
		$start = 0;
	}
	
	if ($exam_reports || ($examname!="" && $classes_id!="" && $academicyear!="")){
	   $vlc = new FormValidation();		
		if (empty($classes_id)) {
		$errormessage[0]="Select Class";	  
		}		
			
		if (empty($examname)) {
		$errormessage[2]="Select Exam Name"; 
		}	
		
		if (empty($academicyear)) {
		$errormessage[3]="Select Academic Year"; 
		}	
		
		
	//$sub_std_qry = "SELECT stud.pre_name as student_name, stud.es_preadmissionid as student_id, m.* ,detail.* FROM es_preadmission stud, es_classes cl, es_marks m ,es_preadmission_details detail  WHERE detail.es_preadmissionid = stud.es_preadmissionid  AND detail.pre_fromdate = '".$from."' AND detail.pre_todate = '".$to."' AND   detail.pre_class = cl.es_classesid AND cl.es_classesid = '$classes_id' AND m.es_examdetailsid='$edmark' AND m.es_marksstudentid = stud.es_preadmissionid AND stud.status!= 'inactive' AND stud.status!= 'resultawaiting'";	
		
   if(count($errormessage)==0)
	 {
	    $from = substr($academicyear,0,10);
	    $to = substr($academicyear,10,20);
		
	  $report_det_qry = "SELECT ae.*, ed.*, m.*, s.es_subjectname, e.es_examname, std.es_preadmissionid, std.pre_dateofbirth, std.pre_name, std.pre_fathername,std.pre_emailid, cl.es_classname  FROM es_exam_academic ae, es_exam_details ed, es_subject s, es_marks m, es_exam e, es_preadmission std, es_classes cl , es_preadmission_details detail WHERE detail.es_preadmissionid = std.es_preadmissionid  AND detail.pre_fromdate = '".$from."' AND detail.pre_todate = '".$to."' AND   detail.pre_class = ae.class_id AND ae.exam_id = $examname AND ae.class_id = $classes_id AND ae.academic_year = '$academicyear' AND ed.academicexam_id = ae.es_exam_academicid AND ed.subject_id = s.es_subjectid AND e.es_examid = ae.exam_id AND cl.es_classesid = $classes_id AND m.es_examdetailsid = ed.es_exam_detailsid AND std.es_preadmissionid = m.es_marksstudentid AND std.status !='inactive' AND std.pre_status !='delete'  ORDER BY std.es_preadmissionid, ed.subject_id ";
	   $reportdetails = $db->getRows($report_det_qry);
	   $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','','EXAMINATION','REPORT','','REPORT CARD STUDENT WISE','".$_SERVER['REMOTE_ADDR']."',NOW())";
    $log_insert_exe=mysql_query($log_insert_sql);
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
				$disp_report[$tmp_std]['email'] = $reportdetails[$i]['pre_emailid'];
				$disp_report[$tmp_std]['subjects'][$s]['subject_name'] = $reportdetails[$i]['es_subjectname'];
				$disp_report[$tmp_std]['subjects'][$s]['total_marks'] = $reportdetails[$i]['total_marks'];
				$disp_report[$tmp_std]['subjects'][$s]['pass_marks'] = $reportdetails[$i]['pass_marks'];
				$disp_report[$tmp_std]['subjects'][$s]['mark_obtined'] = $reportdetails[$i]['es_marksobtined'];
				
				$total+=$reportdetails[$i]['total_marks'];
				$pass_total+=$reportdetails[$i]['pass_marks'];
				if(is_numeric($reportdetails[$i]['es_marksobtined'])){$val=$reportdetails[$i]['es_marksobtined'];}else{ $val=0;}
				$secured_total+= $val;
				
				$tmpname = $reportdetails[$i]['es_subjectname'];
				if((int)$reportdetails[$i]['es_marksobtined'] >= (int)$reportdetails[$i]['pass_marks']) {
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
					$disp_report[$tmp_std]['subjects'][$s]['total_marks'] = $reportdetails[$i]['total_marks'];
					$disp_report[$tmp_std]['subjects'][$s]['pass_marks'] = $reportdetails[$i]['pass_marks'];
					$disp_report[$tmp_std]['subjects'][$s]['mark_obtined'] = $reportdetails[$i]['es_marksobtined'];
					
					$total+=$reportdetails[$i]['total_marks'];
					$pass_total+=$reportdetails[$i]['pass_marks'];
				if(is_numeric($reportdetails[$i]['es_marksobtined'])){$val=$reportdetails[$i]['es_marksobtined'];}else{ $val=0;}
				$secured_total+= $val;
					
					$tmpname = $reportdetails[$i]['es_subjectname'];
					if((int)$reportdetails[$i]['es_marksobtined'] >= (int)$reportdetails[$i]['pass_marks']) {
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
				$s++;
			}
		
//		array_print($disp_report);

			$no_rows = $disp_report['cnt_std'];
			$loopstrt = $start;
			$loopend = $start + $q_limit;
		}
	}
	 /*We will get Student wise Exam reports individually*/	
	if ($action == 'stud_report' ) {
	

	if (isset($exam_marks_search) && $exam_marks_search!="") {
	 $from = substr($academicyear,0,10);
	 $to = substr($academicyear,10,20);
	
	       	
		$vlc = new FormValidation();

		if($student_id == ""){
			$errormessage[0] = "Enter Student Registration Number";
		}if($student_id!=""){
		$sqlquery = "SELECT * , detail.pre_class as prev_class FROM `es_preadmission` pre , es_preadmission_details detail  WHERE pre.`es_preadmissionid` ='" . $student_id . "' AND pre.`es_preadmissionid` = detail.es_preadmissionid AND detail.pre_fromdate = '".$from."' AND detail.pre_todate = '".$to."' AND pre.status !='inactive'  AND pre.status !='delete' ";
		
		$cls_det = $db->getrow($sqlquery);
		$std_clsid = $cls_det['prev_class'];
		
	 if (sqlnumber($sqlquery)==0){
		$errormessage[0]="Student Does Not Exist"; 	
	 }
		
		}
		
		if ($examname=="") {
			$errormessage[1]="Select Exam Name";			  
		}
		
		if (empty($errormessage)) { 
			$exam_std_det_qry = "SELECT ae.*, ed.*, m.*, s.*, e.es_examname, std.es_preadmissionid, std.pre_name, std.pre_fathername, cl.es_classname FROM es_exam_academic ae, es_exam_details ed,es_subject s, es_marks m, es_exam e, es_preadmission std, es_classes cl WHERE std.es_preadmissionid = '$student_id' AND cl.es_classesid = std.pre_class AND ae.class_id = cl.es_classesid AND ae.exam_id = '$examname' AND ed.academicexam_id = ae.es_exam_academicid AND s.es_subjectid = ed.subject_id AND e.es_examid = ae.exam_id AND m.es_examdetailsid = ed.es_exam_detailsid AND m.es_marksstudentid = '$student_id' AND ae.academic_year='$academicyear'  AND ae.class_id = $std_clsid ORDER BY ed.subject_id";
			 $reportdetails = $db->getRows($exam_std_det_qry );
		
			if(count($reportdetails) > 0)
			{
				$tot_total = 0;
				$tot_pass = 0;
				$tot_secured = 0;
				$pass_status = "Pass";
				foreach($reportdetails as $report) {
					$clasid = $report['class_id'];
					$sub_id = $report['subject_id'];
					$class_name = $report['es_classname'];
					$std_name = $report['pre_name'];
					$reg_no = $report['es_preadmissionid'];
					$subArray[$sub_id]['subject_name'] = $report['es_subjectname'];
					$subArray[$sub_id]['exam_date'] = $report['exam_date'];
					$subArray[$sub_id]['exam_duration'] = $report['exam_duration'];
					$subArray[$sub_id]['total_marks'] = $report['total_marks'];
					$subArray[$sub_id]['pass_marks'] = $report['pass_marks'];
					$subArray[$sub_id]['marks_obtined'] = $report['es_marksobtined'];
					
					if((int)$report['es_marksobtined'] < (int)$report['pass_marks']) {
						$pass_status = "Fail";
					}
					
					$tot_total = $tot_total + $report['total_marks'];
					$tot_pass = $tot_pass + $report['pass_marks'];
					$tot_secured = $tot_secured + $report['es_marksobtined'];
					
				}
				$sub_data = gettingSubject($clasid);
				$percentagemark = ($tot_secured/$tot_total)*100;
			}
		}
	}
	$cert = "&examname=$examname&student_id=$student_id&std_clsid=$std_clsid&academicyear=$academicyear" ;
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
	if(isset($entermarks))
{
$count=count($studentid)-1;

for($i=0;$i<=$count;$i++)
{
	$marks->es_marksId=0;
	$marks->examname   = $examname;
		$marks->es_marksexamid	  = $examid[$i];
		$marks->es_marksstudentid = $studentid[$i];
		$marks->es_markssubjectid = $subjectid[$i];
		$marks->es_marksobtined   = $studentmarks[$i]; 
        $marks->es_markclassid    = $classid[$i];
		$marks->status            = 'active'; 
	    $marks->Save();
	
}

}

if ($action == 'stud_certificate') {
	
		

 	
	$reportdetails = $db->getRows("SELECT ae.*, ed.*, m.*, s.*, e.es_examname, std.es_preadmissionid, std.pre_name, std.pre_fathername, cl.es_classname FROM es_exam_academic ae, es_exam_details ed,es_subject s, es_marks m, es_exam e, es_preadmission std, es_classes cl WHERE std.es_preadmissionid = '$student_id' AND cl.es_classesid = std.pre_class AND ae.class_id = cl.es_classesid AND ae.exam_id = '$examname' AND ed.academicexam_id = ae.es_exam_academicid AND s.es_subjectid = ed.subject_id AND e.es_examid = ae.exam_id AND m.es_examdetailsid = ed.es_exam_detailsid AND m.es_marksstudentid = '$student_id' AND ae.academic_year='$academicyear'  AND ae.class_id = $std_clsid ORDER BY ed.subject_id");
		
		if(count($reportdetails) > 0)
		{
			$tot_total = 0;
			$tot_pass = 0;
			$tot_secured = 0;
			$pass_status = "Pass";
			foreach($reportdetails as $report) {
				$clasid = $report['class_id'];
				$sub_id = $report['subject_id'];
				$exam	= $report['es_examname'];
				$class_name = $report['es_classname'];
				$std_name = $report['pre_name'];
				$subArray[$sub_id]['subject_name'] = $report['es_subjectname'];
				$subArray[$sub_id]['exam_date'] = $report['exam_date'];
				$subArray[$sub_id]['exam_duration'] = $report['exam_duration'];
				$subArray[$sub_id]['total_marks'] = $report['total_marks'];
				$subArray[$sub_id]['pass_marks'] = $report['pass_marks'];
				$subArray[$sub_id]['marks_obtined'] = $report['es_marksobtined'];
				
				if((int)$report['es_marksobtined'] < (int)$report['pass_marks']) {
					$pass_status = "Fail";
				}
				
				$tot_total = $tot_total + $report['total_marks'];
				$tot_pass = $tot_pass + $report['pass_marks'];
				$tot_secured = $tot_secured + $report['es_marksobtined'];
				
			}
			$sub_data = gettingSubject($clasid);
			$percentagemark = ($tot_secured/$tot_total)*100;
			$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_preadmission','EXAMINATION','STUDENT REPORT','".$clasid."','INDIVIDUAL STUDENT WISE REPORT CARD','".$_SERVER['REMOTE_ADDR']."',NOW())";
    $log_insert_exe=mysql_query($log_insert_sql);
		}
	
 }
/*Class wise Grahpical Report of pass and Fail*/
if ($action=='chatreports'){

	include_once("charts/charts.php");
	
	if ($exam_reports){
	   $vlc = new FormValidation();		
		if (empty($classes_id)) {
		$errormessage[0]="Select Class";	  
		}		
			
		if (empty($examname)) {
		$errormessage[2]="Select Exam Name"; 
		}	
		
		if (empty($academicyear)) {
		$errormessage[3]="Select Academic Year"; 
		}	
		
   if(count($errormessage)==0)
	 {
	 $from = substr($academicyear,0,10);
	 $to = substr($academicyear,10,20);
	 
		$chart_report_qry = "SELECT ae.*, ed.*, m.*, s.es_subjectname, e.es_examname, std.es_preadmissionid, std.pre_dateofbirth, std.pre_name, std.pre_emailid, cl.es_classname  FROM es_exam_academic ae, es_exam_details ed, es_subject s, es_marks m, es_exam e, es_preadmission std, es_classes cl ,es_preadmission_details details
		WHERE ae.exam_id = $examname 
		AND ae.class_id = $classes_id 
		AND ae.academic_year = '$academicyear' 
		AND ed.academicexam_id = ae.es_exam_academicid 
		AND ed.subject_id = s.es_subjectid 
		AND e.es_examid = ae.exam_id 
		AND std.pre_status !='delete'
		AND cl.es_classesid = $classes_id 
		AND m.es_examdetailsid = ed.es_exam_detailsid 
		AND std.es_preadmissionid = details.es_preadmissionid
		AND details.pre_fromdate = '".$from."' 
		AND details.pre_todate = '".$to."'
		AND std.es_preadmissionid = m.es_marksstudentid 
		AND std.status!= 'inactive'
		ORDER BY std.es_preadmissionid, ed.subject_id ";
		
	 	$reportdetails = $db->getRows($chart_report_qry);
	  
	  
	   
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
		$fail_std = array();
			
		for($i=0;$i<count($reportdetails);$i++){
			if ($tmp_std != $reportdetails[$i]['es_preadmissionid']){
				$cnt_std++;
				$total = 0;
				$pass_total = 0;
				$secured_total = 0;
				$tmp_std = $reportdetails[$i]['es_preadmissionid'];
				
				$disp_report[$tmp_std]['examname'] = $reportdetails[$i]['es_examname'];
				$disp_report[$tmp_std]['year'] = $reportdetails[$i]['academic_year'];
				$disp_report[$tmp_std]['name'] = $reportdetails[$i]['pre_name'];
				$disp_report[$tmp_std]['class'] = $reportdetails[$i]['es_classname'];
				$disp_report[$tmp_std]['dob'] = $reportdetails[$i]['pre_dateofbirth'];
				$disp_report[$tmp_std]['email'] = $reportdetails[$i]['pre_emailid'];
				$disp_report[$tmp_std]['email'] = $reportdetails[$i]['pre_emailid'];
				$disp_report[$tmp_std]['subjects'][$s]['subject_name'] = $reportdetails[$i]['es_subjectname'];
				$disp_report[$tmp_std]['subjects'][$s]['total_marks'] = $reportdetails[$i]['total_marks'];
				$disp_report[$tmp_std]['subjects'][$s]['pass_marks'] = $reportdetails[$i]['pass_marks'];
				$disp_report[$tmp_std]['subjects'][$s]['mark_obtined'] = $reportdetails[$i]['es_marksobtined'];
				
				$total+=$reportdetails[$i]['total_marks'];
				$pass_total+=$reportdetails[$i]['pass_marks'];
				$secured_total+=$reportdetails[$i]['es_marksobtined'];
				
				$tmpname = $reportdetails[$i]['es_subjectname'];
				if((int)$reportdetails[$i]['es_marksobtined'] >= (int)$reportdetails[$i]['pass_marks']) {
					if($disp_report['cnt_pass'][$tmpname]) {
						$disp_report['cnt_pass'][$tmpname] = $disp_report['cnt_pass'][$tmpname]+1;
					} else {
						$disp_report['cnt_pass'][$tmpname] = 1;
					}
				} else {
					$fail_std[] = $tmp_std;
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
					$disp_report[$tmp_std]['subjects'][$s]['total_marks'] = $reportdetails[$i]['total_marks'];
					$disp_report[$tmp_std]['subjects'][$s]['pass_marks'] = $reportdetails[$i]['pass_marks'];
					$disp_report[$tmp_std]['subjects'][$s]['mark_obtined'] = $reportdetails[$i]['es_marksobtined'];
					
					
					$total+=$reportdetails[$i]['total_marks'];
					$pass_total+=$reportdetails[$i]['pass_marks'];
					$secured_total+=$reportdetails[$i]['es_marksobtined'];
					
					$tmpname = $reportdetails[$i]['es_subjectname'];
					if((int)$reportdetails[$i]['es_marksobtined'] >= (int)$reportdetails[$i]['pass_marks']) {
						if($disp_report['cnt_pass'][$tmpname]) {
							$disp_report['cnt_pass'][$tmpname] = $disp_report['cnt_pass'][$tmpname]+1;
						} else {
							$disp_report['cnt_pass'][$tmpname] = 1;
						}
					} else {
						$fail_std[] = $tmp_std;
					}
					
					$percentage = ($secured_total/$total)*100;
					$percentage = number_format($percentage,2,'.','');
					$disp_report[$tmp_std]['total'] = $total;
					$disp_report[$tmp_std]['pass_total'] = $pass_total;
					$disp_report[$tmp_std]['secured_total'] = $secured_total;
					$disp_report[$tmp_std]['percentage'] = $percentage;
				}
				$s++;
				//array_print($tmp_std);
			}
			
		
		if(is_array($disp_report['cnt_pass']) && count($disp_report['cnt_pass'] > 0))
		{
			$keysrep = array_keys($disp_report['cnt_pass']);
			$valsrep = array_values($disp_report['cnt_pass']);
		}
		$tot_std = $disp_report['cnt_std'];
			
		$report_chart[0][0]="";
		$report_chart[1][0] = "Pass";
		$report_chart[2][0] = "Fail";
		
		for($d=0;$d<count($disp_report['cnt_pass']);$d++) {
			$report_chart[0][$d+1] = $keysrep[$d];
			$report_chart[1][$d+1] = $valsrep[$d];
            		$report_chart[2][$d+1] = $tot_std - $valsrep[$d];
		}
		
		$cht_data = makestrforgraph($report_chart);
		
		
		
		
		$fail_std = array_unique($fail_std);
		$totfail = count($fail_std);
		$totpass = $tot_std - $totfail;
		
		$rep_pass_chart[0][0] = "";
		$rep_pass_chart[0][1] = "Pass";
		$rep_pass_chart[0][2] = "Fail";
		$rep_pass_chart[1][0] = "";
		$rep_pass_chart[1][1] = $totpass;
		$rep_pass_chart[1][2] = $totfail;
      
		$cht_rep_data = makestrforgraph($rep_pass_chart);
	}
}
function makestrforgraph($arraydata)
	{
	    for($n=0;$n<count($arraydata);$n++)
	    {
	          $implist[] = implode("*",$arraydata[$n]);
	    }
	    $string = implode("$",$implist);
	    return $string;
	}

 /*School wise Grahpical Report of pass and Fail*/
if ($action=='chatreports_schoolwise'){
		
		include_once("charts/charts.php");
		
		if ($exam_reports){
		  
		   $vlc = new FormValidation();		
			
			if (empty($examname)) {
			$errormessage[2]="Select Exam Name"; 
			}	
			
			if (empty($academicyear)) {
			$errormessage[3]="Select Academic Year"; 
			}	
			
	   		if(count($errormessage)==0) {
		 
		   	  $inst_rpt_sql = "SELECT ae.*, ed.*, m.*,s.es_subjectname, e.es_examname, std.es_preadmissionid, std.pre_dateofbirth, std.pre_name, 			                                                std.pre_emailid
												FROM es_exam_academic ae, es_exam_details ed, es_marks m, es_subject s, es_preadmission std, es_exam e
												WHERE ae.exam_id ='$examname'
												AND ae.academic_year ='$academicyear'
												AND ae.es_exam_academicid = ed.academicexam_id
												AND ed.es_exam_detailsid = m.es_examdetailsid
												AND ed.subject_id = s.es_subjectid
												AND e.es_examid = ae.exam_id
												AND std.es_preadmissionid = m.es_marksstudentid
												ORDER BY std.es_preadmissionid, ed.subject_id
												";
			   $reportdetails = $db->getRows( $inst_rpt_sql);
				//array_print($reportdetails);												
		 
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
		$fail_std = array();
			//echo count($reportdetails);
		for($i=0;$i<count($reportdetails);$i++){
			if ($tmp_std != $reportdetails[$i]['es_preadmissionid']){
				$cnt_std++;
				$reportdetails[$i]['es_preadmissionid'];
				$total = 0;
				$pass_total = 0;
				$secured_total = 0;
				$tmp_std = $reportdetails[$i]['es_preadmissionid'];
				
				$disp_report[$tmp_std]['examname'] = $reportdetails[$i]['es_examname'];
				$disp_report[$tmp_std]['year'] = $reportdetails[$i]['academic_year'];
				$disp_report[$tmp_std]['name'] = $reportdetails[$i]['pre_name'];
				$disp_report[$tmp_std]['class'] = $reportdetails[$i]['es_classname'];
				$disp_report[$tmp_std]['dob'] = $reportdetails[$i]['pre_dateofbirth'];
				$disp_report[$tmp_std]['email'] = $reportdetails[$i]['pre_emailid'];
				$disp_report[$tmp_std]['email'] = $reportdetails[$i]['pre_emailid'];
				$disp_report[$tmp_std]['subjects'][$s]['subject_name'] = $reportdetails[$i]['es_subjectname'];
				$disp_report[$tmp_std]['subjects'][$s]['total_marks'] = $reportdetails[$i]['total_marks'];
				$disp_report[$tmp_std]['subjects'][$s]['pass_marks'] = $reportdetails[$i]['pass_marks'];
				$disp_report[$tmp_std]['subjects'][$s]['mark_obtined'] = $reportdetails[$i]['es_marksobtined'];
				
				$total+=$reportdetails[$i]['total_marks'];
				$pass_total+=$reportdetails[$i]['pass_marks'];
				$secured_total+=$reportdetails[$i]['es_marksobtined'];
				
				
				$tmpname = $reportdetails[$i]['es_subjectname'];
				if((int)$reportdetails[$i]['es_marksobtined'] >= (int)$reportdetails[$i]['pass_marks']) {
					if($disp_report['cnt_pass'][$tmpname]) {
						$disp_report['cnt_pass'][$tmpname] = $disp_report['cnt_pass'][$tmpname]+1;
					} else {
						$disp_report['cnt_pass'][$tmpname] = 1;
					}
				} else {
					$fail_std[] = $tmp_std;
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
					$disp_report[$tmp_std]['subjects'][$s]['total_marks'] = $reportdetails[$i]['total_marks'];
					$disp_report[$tmp_std]['subjects'][$s]['pass_marks'] = $reportdetails[$i]['pass_marks'];
					$disp_report[$tmp_std]['subjects'][$s]['mark_obtined'] = $reportdetails[$i]['es_marksobtined'];
					
					$total+=$reportdetails[$i]['total_marks'];
					$pass_total+=$reportdetails[$i]['pass_marks'];
					$secured_total+=$reportdetails[$i]['es_marksobtined'];
					$tmpname = $reportdetails[$i]['es_subjectname'];
					if((int)$reportdetails[$i]['es_marksobtined'] >= (int)$reportdetails[$i]['pass_marks']) {
						if($disp_report['cnt_pass'][$tmpname]) {
						
							$disp_report['cnt_pass'][$tmpname] = $disp_report['cnt_pass'][$tmpname]+1;
						} else {
							$disp_report['cnt_pass'][$tmpname] = 1;
						}
					} else {
						$fail_std[] = $tmp_std;
					}
					
					$percentage = ($secured_total/$total)*100;
					$percentage = number_format($percentage,2,'.','');
					$disp_report[$tmp_std]['total'] = $total;
					$disp_report[$tmp_std]['pass_total'] = $pass_total;
					$disp_report[$tmp_std]['secured_total'] = $secured_total;
					$disp_report[$tmp_std]['percentage'] = $percentage;
				}
				$s++;
			}
			//echo $cnt_std;
		
		if(is_array($disp_report['cnt_pass']) && count($disp_report['cnt_pass'] > 0))
		{
			$keysrep = array_keys($disp_report['cnt_pass']);
			$valsrep = array_values($disp_report['cnt_pass']);
		}
		$tot_std = $disp_report['cnt_std'];
			
		$report_chart[0][0]="";
		$report_chart[1][0] = "Pass";
        $report_chart[2][0] = "Fail";
		for($d=0;$d<count($disp_report['cnt_pass']);$d++) {
			$report_chart[0][$d+1] = $keysrep[$d];
			$report_chart[1][$d+1] = $valsrep[$d];
            $report_chart[2][$d+1] = $tot_std - $valsrep[$d];
		}
		$cht_data = makestrforgraph($report_chart);
		
		$fail_std = array_unique($fail_std);
		$totfail = count($fail_std);
		$totpass = $tot_std - $totfail;
		
		$rep_pass_chart[0][0] = "";
		$rep_pass_chart[0][1] = "Pass";
		$rep_pass_chart[0][2] = "Fail";
		$rep_pass_chart[1][0] = "";
		$rep_pass_chart[1][1] = $totpass;
		$rep_pass_chart[1][2] = $totfail;
      	
		$cht_rep_data = makestrforgraph($rep_pass_chart);
	}
	
}
if ($action=='allstudentsexport'){	
	
		if ($exam_reports_export){
		if (empty($classes_id)) {
		$errormessage[0]="Select Class";	  
		}		
			
		if (empty($examname)) {
		$errormessage[2]="Select Exam Name"; 
		}	
		
		if (empty($academicyear)) {
		$errormessage[3]="Select Academic Year"; 
		}	
		
   if(count($errormessage)==0)
	 {
	    /*foreach($custom_field as $key=>$value){
		if($z<count($custom_field)){ $data .='"'.ucwords($fieldsarray[$value]).'"'. "\t"; } else { $data .='"'.ucwords($fieldsarray[$value]).'"'. "\n"; } $z++;
		}*/
		
		$data='"RegNo"'."\t".'"Name"'."\t".'"Father"'."\t".'"Exam"'."\t".'"Subject"'."\t".'"MaxMarks"'."\t".'"PassMarks"'."\t".'"MarksObtain"'."\n";  
		$condition="";
		if($at_std_subject!=""){ $condition.=" AND ed.subject_id=".$at_std_subject; }
		if($studentr_regno!=""){ $condition.=" AND std.es_preadmissionid=".$studentr_regno; }
	   
	    $reportdetails = "SELECT std.es_preadmissionid, std.pre_name, std.pre_fathername, e.es_examname, s.es_subjectname, ed.total_marks, ed.pass_marks, m.es_marksobtined FROM es_exam_academic ae, es_exam_details ed, es_subject s, es_marks m, es_exam e, es_preadmission std, es_classes cl WHERE ae.exam_id = $examname AND ae.class_id = $classes_id AND ae.academic_year = '$academicyear' AND ed.academicexam_id = ae.es_exam_academicid AND ed.subject_id = s.es_subjectid AND e.es_examid = ae.exam_id AND cl.es_classesid = $classes_id AND m.es_examdetailsid = ed.es_exam_detailsid AND std.es_preadmissionid = m.es_marksstudentid AND std.status !='inactive' ".$condition." ORDER BY std.es_preadmissionid, ed.subject_id ";
	  
	
		$details = $db->getRows($reportdetails);
		$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_classes','EXAMINATION','EXPORT REPORT','','EXPORT THE REPORT CARD','".$_SERVER['REMOTE_ADDR']."',NOW())";
    $log_insert_exe=mysql_query($log_insert_sql);
		//array_print($details);
		
			//exit;
		if(count($details)>0 ){
		foreach ($details as $row) {
			$line = '';
			foreach($row as $field=>$value) {		
				$value = str_replace('"', '""', $value);
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
			}
			$data .= trim($line). "\n";
		}
		$data = str_replace("\r", "", $data);
		if ($data =="") {
			$data ="\n(0) Records Found!\n";
		}
		
		//header("Content-type: application/x-msdownload");
		header("Content-type: application/vnd.ms-excel");
		header('Content-Disposition: attachment; filename="examresult.xls"');
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$data";
		exit;
	 }
	   
	}	
	}}
?>