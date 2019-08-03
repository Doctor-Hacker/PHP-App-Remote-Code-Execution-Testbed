<?php 
sm_registerglobal('pid', 'action', 'start','emsg','es_timetablesid','es_class','es_sec','es_day','es_staffid','es_subject', 	
'staffid','elid','Submit' ,'es_m1','es_m2','es_m3','es_m4','es_m5','es_m6','es_m7','es_m8','es_m9' ,'es_t1','es_t2','es_t3','es_t4','es_t5','es_t6','es_t7','es_t8','es_t9' ,'es_w1','es_w2','es_w3','es_w4','es_w5','es_w6','es_w7','es_w8','es_w9' ,'es_th1','es_th2','es_th3','es_th4','es_th5','es_th6','es_th7','es_th8','es_th9'  ,'es_f1','es_f2','es_f3','es_f4','es_f5','es_f6','es_f7','es_f8','es_f9' ,'es_s1','es_s2','es_s3','es_s4','es_s5','es_s6','es_s7','es_s8','es_s9','groups','class' ,'orderby', 'updatetable','Update','es_mmid','selectempnum', 'es_staffidnam','es_startfrom','es_endto','es_breakfrom','es_breakto','es_lunchfrom','es_lunchto','es_duration','es_tmid','submit_newsubject','new_subject','es_m1f','es_m2f','es_m3f','es_m4f','es_m5f','es_m6f','es_m7f','es_m8f','es_m9f','es_t1f','es_t2f','es_t3f','es_t4f','es_t5f','es_t6f','es_t7f','es_t8f','es_t9f' ,'es_w1f','es_w2f','es_w3f','es_w4f','es_w5f','es_w6f','es_w7f','es_w8f','es_w9f' ,'es_th1f','es_th2f','es_th3f','es_th4f','es_th5f','es_th6f','es_th7f','es_th8f','es_th9f'  ,'es_f1f','es_f2f','es_f3f','es_f4f','es_f5f','es_f6f','es_f7f','es_f8f','es_f9f' ,'es_s1f','es_s2f','es_s3f','es_s4f','es_s5f','es_s6f','es_s7f','es_s8f','es_s9f');
checkuserinlogin();  

$html_obj =new html_form();
/**
* Only Super admin or moderator of the corporate can be allowed to access this page
*/ 
 
/**********************************************************************
* Get  groups and Classes
**********************************************************************/
//get groups
 $c_groups = get_groups();

 

//get classes  */
if (isset($groups)&& $groups!=""){
	$class_data = getClasses($groups);
  }
  
  $weekdays_arr=array("es_m1"=>"Monday 1st Period", "es_m2"=>"Monday 2nd Period", "es_m3"=>"Monday 3rd Period", "es_m4"=>"Monday 4th Period", "es_m5"=>"Monday 5th Period", "es_m6"=>"Monday 6th Period", "es_m7"=>"Monday 7th Period", "es_m8"=>"Monday 8th Period", "es_m9"=>"Monday 9th Period", 
							
							"es_t1"=>"Tuesday 1st Period", "es_t2"=>"Tuesday 2nd Period", "es_t3"=>"Tuesday 3rd Period", "es_t4"=>"Tuesday 4th Period", "es_t5"=>"Tuesday 5th Period", "es_t6"=>"Tuesday 6th Period", "es_t7"=>"Tuesday 7th Period", "es_t8"=>"Tuesday 8th Period", "es_t9"=>"Tuesday 9th Period", 
							
							"es_w1"=>"Wednesday 1st Period", "es_w2"=>"Wednesday 2nd Period", "es_w3"=>"Wednesday 3rd Period", "es_w4"=>"Wednesday 4th Period", "es_w5"=>"Wednesday 5th Period", "es_w6"=>"Wednesday 6th Period", "es_w7"=>"Wednesday 7th Period", "es_w8"=>"Wednesday 8th Period", "es_w9"=>"Wednesday 9th Period", 
							
							"es_th1"=>"Thursday 1st Period", "es_th2"=>"Thursday 2nd Period", "es_th3"=>"Thursday 3rd Period", "es_th4"=>"Thursday 4th Period", "es_th5"=>"Thursday 5th Period", "es_th6"=>"Thursday 6th Period", "es_th7"=>"Thursday 7th Period", "es_th8"=>"Thursday 8th Period", "es_th9"=>"Thursday 9th Period", 
							
							"es_f1"=>"Friday 1st Period", "es_f2"=>"Friday 2nd Period", "es_f3"=>"Friday 3rd Period", "es_f4"=>"Friday 4th Period", "es_f5"=>"Friday 5th Period", "es_f6"=>"Friday 6th Period", "es_f7"=>"Friday 7th Period", "es_f8"=>"Friday 8th Period", "es_f9"=>"Friday 9th Period", 
							
							"es_s1"=>"Saturday 1st Period", "es_s2"=>"Saturday 2nd Period", "es_s3"=>"Saturday 3rd Period", "es_s4"=>"Saturday 4th Period", "es_s5"=>"Saturday 5th Period", "es_s6"=>"Saturday 6th Period", "es_s7"=>"Saturday 7th Period", "es_s8"=>"Saturday 8th Period", "es_s9"=>"Saturday 9th Period"
							
							);

/* End of get groups */	

//for getting staff details in droup down
if(isset($es_subject) && $es_subject!=""){$condition = " AND st_subject='".$es_subject[0]."'";}
$exesqlquery = "SELECT `es_staffid`,`st_firstname`,`st_lastname` FROM `es_staff` WHERE teach_nonteach='teaching' AND status='added' AND selstatus='accepted' AND tcstatus='notissued' ";
	$getstafflist = getamultiassoc($exesqlquery);
	
	
	
	
 /* End of Add timeTable*/	
	   
/*
*Start of Edit Table Web Page
*/

if(isset($submit_newsubject) && $submit_newsubject!=""){
	if($new_subject!=""){
	$records = sqlnumber("SELECT * FROM es_timetable_subjects");
	if($records>=1){$id = 'NULL';}else{$id=1000;}
	
	$sql_sub = "INSERT INTO `es_timetable_subjects` (ts_id, `classid` ,`subjectname` ) VALUES( '".$id."' ,'".$es_class."', '".strtoupper($new_subject)."' );";
       mysql_query($sql_sub);
 $emsg = 1;
	header("Location:?pid=56&action=edittimetable&es_class=".$es_class."&emsg=".$emsg);
	 exit;
	
	}

}
if($action == 'edittimetable') {

	if(isset($es_class) && $es_class!="") {
		 $obj_ttclass = new es_timetable();
		 $obj_ttmaster = new  es_timetablemaster();
		 
		 $subject_det = $db->getrow("SELECT * FROM es_timetable_subject WHERE es_class = '".$es_class."'");
		
		 $staff_det = $db->getrow("SELECT * FROM es_timetable_staff WHERE es_class = '".$es_class."'");
	
		if (isset($updatetable) && $updatetable=='Update'){
		
			
			$array_values=array("es_m1"=>$es_m1, "es_m2"=>$es_m2, "es_m3"=>$es_m3, "es_m4"=>$es_m4, "es_m5"=>$es_m5, "es_m6"=>$es_m6, "es_m7"=>$es_m7, "es_m8"=>$es_m8, "es_m9"=>$es_m9, 
								
								"es_t1"=>$es_t1, "es_t2"=>$es_t2, "es_t3"=>$es_t3, "es_t4"=>$es_t4, "es_t5"=>$es_t5, "es_t6"=>$es_t6, "es_t7"=>$es_t7, "es_t8"=>$es_t8, "es_t9"=>$es_t9, 
								
								"es_w1"=>$es_w1, "es_w2"=>$es_w2, "es_w3"=>$es_w3, "es_w4"=>$es_w4, "es_w5"=>$es_w5, "es_w6"=>$es_w6, "es_w7"=>$es_w7, "es_w8"=>$es_w8, "es_w9"=>$es_w9, 
								
								"es_th1"=>$es_th1, "es_th2"=>$es_th2, "es_th3"=>$es_th3, "es_th4"=>$es_th4, "es_th5"=>$es_th5, "es_th6"=>$es_th6, "es_th7"=>$es_th7, "es_th8"=>$es_th8, "es_th9"=>$es_th9, 
								
								"es_f1"=>$es_f1, "es_f2"=>$es_f2, "es_f3"=>$es_f3, "es_f4"=>$es_f4, "es_f5"=>$es_f5, "es_f6"=>$es_f6, "es_f7"=>$es_f7, "es_f8"=>$es_f8, "es_f9"=>$es_f9, 
								
								"es_s1"=>$es_s1, "es_s2"=>$es_s2, "es_s3"=>$es_s3, "es_s4"=>$es_s4, "es_s5"=>$es_s5, "es_s6"=>$es_s6, "es_s7"=>$es_s7, "es_s8"=>$es_s8, "es_s9"=>$es_s9
								
								);
			
			$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
		 VALUES('".$_SESSION['eschools']['admin_id']."',' es_timetablemaster','TIME TABLE','CLASS WISE TIME TABLE','".$es_class."','EDIT  CLASS TIMETABLE','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
	
	
			
			
			 
			if(count($error)==0){
			$db->update('es_timetable_subject', "es_m1 ='" . $es_m1 . "', es_m2 ='" . $es_m2 . "',	es_m3 ='" . $es_m3 . "', es_m4 ='" . $es_m4 . "',	es_m5 ='" . $es_m5 . "',es_m6 ='" . $es_m6 . "', es_m7 ='" . $es_m7 . "',es_m8 ='" . $es_m8 . "',es_m9 ='" . $es_m9 . "',es_t1 ='" . $es_t1 . "',es_t2 ='" . $es_t2 . "',es_t3 ='" . $es_t3 . "',es_t4 ='" . $es_t4 . "',es_t5 ='" . $es_t5 . "',es_t6 ='" . $es_t6 . "',es_t7 ='" . $es_t7 . "',es_t8 ='" . $es_t8 . "',es_t9 ='" . $es_t9 . "',es_w1 ='" . $es_w1 . "',es_w2 ='" . $es_w2 . "',es_w3 ='" . $es_w3 . "',es_w4 ='" . $es_w4 . "',es_w5 ='" . $es_w5 . "',es_w6 ='" . $es_w6 . "',es_w7 ='" . $es_w7 . "',es_w8 ='" . $es_w8 . "',es_w9 ='" . $es_w9 . "',es_th1 ='" . $es_th1 . "',es_th2 ='" . $es_th2 . "',es_th3 ='" . $es_th3 . "',es_th4 ='" . $es_th4 . "',es_th5 ='" . $es_th5 . "',es_th6 ='" . $es_th6 . "',es_th7 ='" . $es_th7 . "',es_th8 ='" . $es_th8 . "',es_th9 ='" . $es_th9 . "',es_f1 ='" . $es_f1 . "',es_f2 ='" . $es_f2 . "',es_f3 ='" . $es_f3 . "',es_f4 ='" . $es_f4 . "',es_f5 ='" . $es_f5 . "',es_f6 ='" . $es_f6 . "',es_f7 ='" . $es_f7 . "',es_f8 ='" . $es_f8 . "',es_f9 ='" . $es_f9 . "',es_s1 ='" . $es_s1 . "',es_s2 ='" . $es_s2 . "',es_s3 ='" . $es_s3 . "',es_s4 ='" . $es_s4 . "',es_s5 ='" . $es_s5 . "',es_s6 ='" . $es_s6 . "',es_s7 ='" . $es_s7 . "',es_s8 ='" . $es_s8 . "',es_s9 ='" . $es_s9 . "',es_startfrom ='" . $es_startfrom . "',es_endto ='" . $es_endto . "',es_breakfrom ='" . $es_breakfrom . "',es_breakto ='" . $es_breakto . "',es_lunchfrom ='" . $es_lunchfrom . "',es_lunchto ='" . $es_lunchto . "',es_duration ='" . $es_duration . "'",'es_class =' . "'$es_class'");
			
			$db->update('es_timetable_staff', "es_m1 ='" . $es_m1f . "', es_m2 ='" . $es_m2f . "',	es_m3 ='" . $es_m3f . "', es_m4 ='" . $es_m4f . "',	es_m5 ='" . $es_m5f . "',es_m6 ='" . $es_m6f . "', es_m7 ='" . $es_m7f . "',es_m8 ='" . $es_m8f . "',es_m9 ='" . $es_m9f . "',es_t1 ='" . $es_t1f . "',es_t2 ='" . $es_t2f . "',es_t3 ='" . $es_t3f . "',es_t4 ='" . $es_t4f . "',es_t5 ='" . $es_t5f . "',es_t6 ='" . $es_t6f . "',es_t7 ='" . $es_t7f . "',es_t8 ='" . $es_t8f . "',es_t9 ='" . $es_t9f . "',es_w1 ='" . $es_w1f . "',es_w2 ='" . $es_w2f . "',es_w3 ='" . $es_w3f . "',es_w4 ='" . $es_w4f . "',es_w5 ='" . $es_w5f . "',es_w6 ='" . $es_w6f . "',es_w7 ='" . $es_w7f . "',es_w8 ='" . $es_w8f . "',es_w9 ='" . $es_w9f . "',es_th1 ='" . $es_th1f . "',es_th2 ='" . $es_th2f . "',es_th3 ='" . $es_th3f . "',es_th4 ='" . $es_th4f . "',es_th5 ='" . $es_th5f . "',es_th6 ='" . $es_th6f . "',es_th7 ='" . $es_th7f . "',es_th8 ='" . $es_th8f . "',es_th9 ='" . $es_th9f . "',es_f1 ='" . $es_f1f . "',es_f2 ='" . $es_f2f . "',es_f3 ='" . $es_f3f . "',es_f4 ='" . $es_f4f . "',es_f5 ='" . $es_f5f . "',es_f6 ='" . $es_f6f . "',es_f7 ='" . $es_f7f . "',es_f8 ='" . $es_f8f . "',es_f9 ='" . $es_f9f . "',es_s1 ='" . $es_s1f . "',es_s2 ='" . $es_s2f . "',es_s3 ='" . $es_s3f . "',es_s4 ='" . $es_s4f . "',es_s5 ='" . $es_s5f . "',es_s6 ='" . $es_s6f . "',es_s7 ='" . $es_s7f . "',es_s8 ='" . $es_s8f . "',es_s9 ='" . $es_s9f . "'",'es_class =' . "'$es_class'");
		
	
	
		
	
		
	
		 $emsg = 2;
		header("Location:?pid=56&action=edittimetable&es_class=".$es_class."&emsg=".$emsg);
		 exit;
			}else{ unset($emsg);
			
			};
		
		}
		}
}
/*
*Start of View Table Web Page
*/

if($action == 'viewtimetable') {


	if(isset($es_class) && $es_class!="")
	{
	$timetable_sql = "SELECT S.*,F.es_m1 as es_m1f, 
F.es_m2 as es_m2f, 
F.es_m3 as es_m3f, 
F.es_m4 as es_m4f,
F.es_m5 as es_m5f,
F.es_m6 as es_m6f,
F.es_m7 as es_m7f,
F.es_m8 as es_m8f,
F.es_m9 as es_m9f,
F.es_t1 as es_t1f,
F.es_t2 as es_t2f,
F.es_t3 as es_t3f,
F.es_t4 as es_t4f,
F.es_t5 as es_t5f,
F.es_t6 as es_t6f,
F.es_t7 as es_t7f,
F.es_t8 as es_t8f,
F.es_t9 as es_t9f,
F.es_w1 as es_w1f,
F.es_w2 as es_w2f,
F.es_w3 as es_w3f,
F.es_w4 as es_w4f,
F.es_w5 as es_w5f,
F.es_w6 as es_w6f,
F.es_w7 as es_w7f,
F.es_w8 as es_w8f,
F.es_w9 as es_w9f,
F.es_th1 as es_th1f,
F.es_th2 as es_th2f,
F.es_th3 as es_th3f,
F.es_th4 as es_th4f,
F.es_th5 as es_th5f,
F.es_th6 as es_th6f,
F.es_th7 as es_th7f,
F.es_th8 as es_th8f,
F.es_th9 as es_th9f,
F.es_f1 as es_f1f,
F.es_f2 as es_f2f,
F.es_f3 as es_f3f,
F.es_f4 as es_f4f,
F.es_f5 as es_f5f,
F.es_f6 as es_f6f,
F.es_f7 as es_f7f,
F.es_f8 as es_f8f,
F.es_f9 as es_f9f,
F.es_s1 as es_s1f,
F.es_s2 as es_s2f,
F.es_s3 as es_s3f,
F.es_s4 as es_s4f,
F.es_s5 as es_s5f,
F.es_s6 as es_s6f,
F.es_s7 as es_s7f,
F.es_s8 as es_s8f,
F.es_s9 as es_s9f FROM es_timetable_subject S, es_timetable_staff F WHERE S.es_class = F.es_class AND S.es_class= '".$es_class."'";
	 
	$view_timetable = $db->getrow($timetable_sql);
	//array_print($view_timetable);
	 
	 					 $subjectsuni_sql="( SELECT `es_subjectname`,es_subjectid FROM es_subject )UNION (SELECT `subjectname`,ts_id FROM es_timetable_subjects )";
						 $subject_info = $db->getRows($subjectsuni_sql);
						if(count($subject_info)>=1){
							foreach($subject_info as $each){
							$subject_array[$each['es_subjectid']] = ucfirst(strtolower($each['es_subjectname']));
							}
						}
						//array_print($subject_array);
						$staff_sql = "SELECT `es_staffid`,`st_firstname`,`st_lastname` FROM `es_staff`  WHERE teach_nonteach='teaching' AND status='added' AND selstatus='accepted' AND tcstatus='notissued'";
						$staff_info = $db->getrows($staff_sql);
						if(count($staff_info)>=1){
							foreach($staff_info as $each){
							$staff_arr[$each['es_staffid']] = ucfirst($each['st_firstname']) ."&nbsp;".ucfirst($each['st_lastname']);
							}
						}
						//array_print($staff_arr);
	
	


$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."',' es_timetable','TIME TABLE','CLASS/STAFF WISE TIME TABLE','".$es_class."','VIEW TIMETABLE','".$_SERVER['REMOTE_ADDR']."',NOW())";
$log_insert_exe=mysql_query($log_insert_sql);





	
	 
	 }


}
// Delete of Staff
if ($action=='delete'){
	
	$obj_timetablemaster = new es_timetablemaster();
	$obj_timetablemaster->es_timetablemasterId = $es_tmid;
	$obj_timetablemaster->Delete();
	$emsg = 3;
	header("Location:?pid=56&action=edittimetable&es_class=".$es_class."&emsg=".$emsg);
	exit;

}
if($action == 'viewtimetable1' || $action=='viewtimetableprint_time_table') {


	/*if(isset($es_class) && $es_class!="")
	{*/
	$a=($_SESSION['eschools']['user_id']);
	 $online_sql="select * from es_preadmission where es_preadmissionid=".$a;
 $online_row=$db->getRow($online_sql);
 $timetable_sql = "SELECT S.*,F.es_m1 as es_m1f, 
F.es_m2 as es_m2f, 
F.es_m3 as es_m3f, 
F.es_m4 as es_m4f,
F.es_m5 as es_m5f,
F.es_m6 as es_m6f,
F.es_m7 as es_m7f,
F.es_m8 as es_m8f,
F.es_m9 as es_m9f,
F.es_t1 as es_t1f,
F.es_t2 as es_t2f,
F.es_t3 as es_t3f,
F.es_t4 as es_t4f,
F.es_t5 as es_t5f,
F.es_t6 as es_t6f,
F.es_t7 as es_t7f,
F.es_t8 as es_t8f,
F.es_t9 as es_t9f,
F.es_w1 as es_w1f,
F.es_w2 as es_w2f,
F.es_w3 as es_w3f,
F.es_w4 as es_w4f,
F.es_w5 as es_w5f,
F.es_w6 as es_w6f,
F.es_w7 as es_w7f,
F.es_w8 as es_w8f,
F.es_w9 as es_w9f,
F.es_th1 as es_th1f,
F.es_th2 as es_th2f,
F.es_th3 as es_th3f,
F.es_th4 as es_th4f,
F.es_th5 as es_th5f,
F.es_th6 as es_th6f,
F.es_th7 as es_th7f,
F.es_th8 as es_th8f,
F.es_th9 as es_th9f,
F.es_f1 as es_f1f,
F.es_f2 as es_f2f,
F.es_f3 as es_f3f,
F.es_f4 as es_f4f,
F.es_f5 as es_f5f,
F.es_f6 as es_f6f,
F.es_f7 as es_f7f,
F.es_f8 as es_f8f,
F.es_f9 as es_f9f,
F.es_s1 as es_s1f,
F.es_s2 as es_s2f,
F.es_s3 as es_s3f,
F.es_s4 as es_s4f,
F.es_s5 as es_s5f,
F.es_s6 as es_s6f,
F.es_s7 as es_s7f,
F.es_s8 as es_s8f,
F.es_s9 as es_s9f FROM es_timetable_subject S, es_timetable_staff F WHERE S.es_class = F.es_class AND S.es_class= '".$online_row['pre_class']."'";
	 
	$view_timetable = $db->getrow($timetable_sql);
	//array_print($view_timetable);
	 
	 					 $subjectsuni_sql="( SELECT `es_subjectname`,es_subjectid FROM es_subject )UNION (SELECT `subjectname`,ts_id FROM es_timetable_subjects )";
						 $subject_info = $db->getRows($subjectsuni_sql);
						
						if(count($subject_info)>=1){
							foreach($subject_info as $each){
							$subject_array[$each['es_subjectid']] = ucfirst(strtolower($each['es_subjectname']));
							}
						}
						//array_print($subject_array);
						$staff_sql = "SELECT `es_staffid`,`st_firstname`,`st_lastname` FROM `es_staff`  WHERE teach_nonteach='teaching' AND status='added' AND selstatus='accepted' AND tcstatus='notissued'";
						$staff_info = $db->getrows($staff_sql);
							if(count($staff_info)>=1){
							foreach($staff_info as $each){
							$staff_arr[$each['es_staffid']] = ucfirst($each['st_firstname']) ."&nbsp;".ucfirst($each['st_lastname']);
							}
						}
						//array_print($staff_arr);
	
	


$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['user_id']."',' es_timetable','TIME TABLE','CLASS/STAFF WISE TIME TABLE','".$es_class."','VIEW TIMETABLE','".$_SERVER['REMOTE_ADDR']."',NOW())";
$log_insert_exe=mysql_query($log_insert_sql);





	
	 
	 }


/*}*/
/* if($action=='viewtimetable1' || $action=='viewtimetableprint_time_table'){
$time_periods1=$db->getRows("SELECT * FROM time_period ORDER BY period_id");

if(is_array($time_periods1))
{
foreach($time_periods1 as $each_time)
{

if($each_time['from_p']!='' && $each_time['to_p']!='')
$durations[$each_time['period_id']]=$each_time['from_p'].' TO '.$each_time['to_p'];
}

}
$class_array1=$db->getRows("SELECT * FROM es_classes ORDER BY es_classesid");

$subjects_array1=$db->getRows("SELECT * FROM es_subject ORDER BY es_subjectshortname,es_subjectid");
if(is_array($subjects_array1))
{
foreach($subjects_array1 as $each_subject)
{

$subject[$each_subject['es_subjectshortname']][$each_subject['es_subjectid']]=$each_subject['es_subjectname'];
$subject_name[$each_subject['es_subjectid']]=$each_subject['es_subjectname'];
}
}
$staff_array1=$db->getRows("SELECT * FROM es_staff WHERE teach_nonteach='teaching'");
if(is_array($staff_array1))
{
foreach($staff_array1 as $each_staff)
{

 $staff_name[$each_staff['es_staffid']]=$each_staff['st_firstname']."&nbsp;".$each_staff['st_lastname'];
}
}

$toatl_time_table12=$db->getRows("SELECT * FROM es_timetable_staff ");

if(is_array($toatl_time_table12))
{

foreach($toatl_time_table12 as $each_total_table)
{
array_print($each_total_table);
exit;
$subject_selected[$each_total_table['class_id']][$each_total_table['period_id']]=$each_total_table['subject_id'];
$staff_selected[$each_total_table['class_id']][$each_total_table['period_id']]=$each_total_table['staff_id'];
$staff_free[$each_total_table['period_id']][]=$each_total_table['staff_id'];
}
}

for($i=1;$i<=8;$i++)
		{
		if($i!=5)
		{
		$rev_staff=array_flip($staff_name);
if(count($staff_free[$i])>0)
{
 $free_staff[$i]=array_diff($rev_staff,$staff_free[$i]);
}
}
}
for($i=1;$i<=8;$i++)
		{
		if(count($free_staff[$i])>0 && $i!=5)
$final_free_staff[$i]=array_flip($free_staff[$i]);
}
}*/
?>

  
	
  
  
 