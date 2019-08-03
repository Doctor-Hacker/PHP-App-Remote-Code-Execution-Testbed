<?php 
sm_registerglobal('pid', 'action', 'start','emsg','es_timetablesid','es_class','es_sec','es_day','es_staffid','es_subject', 	
'staffid','elid','Submit' ,'es_m1','es_m2','es_m3','es_m4','es_m5','es_m6','es_m7','es_m8','es_m9' ,'es_t1','es_t2','es_t3','es_t4','es_t5','es_t6','es_t7','es_t8','es_t9' ,'es_w1','es_w2','es_w3','es_w4','es_w5','es_w6','es_w7','es_w8','es_w9' ,'es_th1','es_th2','es_th3','es_th4','es_th5','es_th6','es_th7','es_th8','es_th9'  ,'es_f1','es_f2','es_f3','es_f4','es_f5','es_f6','es_f7','es_f8','es_f9' ,'es_s1','es_s2','es_s3','es_s4','es_s5','es_s6','es_s7','es_s8','es_s9','groups','class' ,'orderby', 'updatetable','Update','es_mmid','selectempnum', 'es_staffidnam','es_startfrom','es_endto','es_breakfrom','es_breakto','es_lunchfrom','es_lunchto','es_duration','es_tmid','st_department','txt_deptname','selectionserch','fid','update_timetable','es_class');
/*if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
*//**
* Only Super admin or moderator of the corporate can be allowed to access this page
*/ 
 
/**********************************************************************
* Get  groups and Classes
**********************************************************************/
//get groups
 $c_groups = get_groups();
 $html_obj =new html_form();
 $days_arr = array(1=>"Mon",2=>"Tue",3=>"Wed",4=>"Thurs",5=>"Fri",6=>"Sat");
 $period_arr = array(1=>"es_m",2=>"es_t",3=>"es_w",4=>"es_th",5=>"es_f",6=>"es_s");
 
 //dept 

$exesqlquery = "SELECT * FROM es_departments";
$getdeptlist = $db->getrows($exesqlquery);
$obj_postlist   = new es_deptposts();
$es_postList  = $obj_postlist->GetList(array(array("es_postshortname","=","$st_department")));

//get classes  */
if (isset($groups)&& $groups!=""){
	$class_data = getClasses($groups);
  }

/* End of get groups */	
//for getting staff details in droup down
$condition = "";
if(isset($selectionserch) && $selectionserch!=""){
$condition = " AND st_department='".$st_department."' AND st_post='".$txt_deptname."'";
}

 $exesqlquery = "SELECT `es_staffid`,`st_firstname`,`st_lastname` FROM `es_staff` WHERE teach_nonteach='teaching' AND status='added' AND selstatus='accepted' AND tcstatus='notissued' ".$condition."";
	$getstafflist = getamultiassoc($exesqlquery);

/*
*Start of View Table Web Page
*/

if($action == 'viewtimetable') {


	$query_sql="SELECT * FROM es_classes";
	$query_exe=mysql_query($query_sql);
	while($query_row=mysql_fetch_array($query_exe)){
		$classes_array[$query_row['es_classesid']]=$query_row['es_classname'];												   
	}
	//print_r($classes_array);

   
	$subject_info=$db->getrows("SELECT * FROM es_subject");
	if($subject_info>=1){
	foreach($subject_info as $each){
	$subject_arr[$each['es_subjectid']] = $each['es_subjectname'];
	}
	}
	

}
if($action == 'staff_timetable' || $action=='edit_timetable') {


	$query_sql="SELECT * FROM es_classes";
	$query_exe=mysql_query($query_sql);
	while($query_row=mysql_fetch_array($query_exe)){
		$classes_array[$query_row['es_classesid']]=$query_row['es_classname'];												   
	}
	//print_r($classes_array);

   				$subjectsuni_sql="( SELECT `es_subjectname`,es_subjectid FROM es_subject )UNION (SELECT `subjectname`,ts_id FROM es_timetable_subjects )";
				$subject_info = $db->getRows($subjectsuni_sql);
				if(count($subject_info)>=1){
					foreach($subject_info as $each){
					$subject_array[$each['es_subjectid']] = ucfirst(strtolower($each['es_subjectname']));
					}
				}
				$condition = 4;
				

 
 
//$styaff_info = $db->getrows($q);
//array_print($styaff_info);
 $new_q = "SELECT S.*,F.es_m1 as es_m1f, 
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
F.es_s9 as es_s9f FROM es_timetable_subject S, es_timetable_staff F WHERE S.es_class = F.es_class";
$styaff_info = $db->getrows($new_q);

$i=0;
foreach($styaff_info as $each){

	$result = mysql_query("SHOW COLUMNS FROM es_timetable_staff  ");
	if (mysql_num_rows($result) > 0) 
	{
	 while ($row = mysql_fetch_array($result)) 
	   {
	   if($row[0]!="es_st_id" && $row[0]!="es_class"){ 
		$staff_info[$i][$row[0]]['class'] = $each['es_class'];
		$staff_info[$i][$row[0]]['suject'] = $each[$row[0]];
		$staff_info[$i][$row[0]]['staff'] = $each[$row[0]."f"];
		$staff_info[$i][$row[0]]['es_st_id'] = $each["es_st_id"];
		$staff_info[$i][$row[0]]['es_sub_id'] = $each["es_sub_id"];
		}
		}
		}
$i++;
}


}

if($action=='free_staff'){
function showfreestaff($perid){
$arraydata = array();
 $t1_staff_sql = "SELECT `st_firstname`,`st_lastname` FROM `es_staff` ST WHERE ST.teach_nonteach='teaching' AND ST.status='added' AND ST.selstatus='accepted' AND ST.tcstatus='notissued' AND ST.es_staffid NOT IN(SELECT ".$perid." FROM es_timetable_staff TS ) ORDER BY  es_staffid ASC";
						
						 $rs_qury   = @mysql_query($t1_staff_sql);
					if (@mysql_num_rows($rs_qury)>0){
					  
					   while ($data = @mysql_fetch_assoc($rs_qury)){
							$arraydata[] = $data;
						}
						return $arraydata;
						
					}
					 return null;
	}
}

if(isset($update_timetable) && $update_timetable!=""){
			 for($j=1;$j<=count($days_arr);$j++){
				for($k=1;$k<=9;$k++){
					$aaa = "";
					$bbb = "";
				 	$aaa = $period_arr[$j].$k;
					$bbb = $period_arr[$j].$k.'f';
						if($_POST[$aaa]!="" && $_POST[$bbb]!=""){
						  $sql_1 = "UPDATE es_timetable_subject SET  ".$aaa." ='".$_POST[$aaa]."'  WHERE es_class='".$es_class[$j][$aaa]."'";
						 mysql_query($sql_1);
						  $sql_2 = "UPDATE es_timetable_staff SET ".$aaa." ='".$_POST[$bbb]."' WHERE es_class='".$es_class[$j][$aaa]."'";
						 mysql_query($sql_2);
						}
				}
			 }
		header("location:?pid=90&action=edit_timetable&fid=$fid&emsg=2");
		exit;
}

?>

  
	
  
  
 