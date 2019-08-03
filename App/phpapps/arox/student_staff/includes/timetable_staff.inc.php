<?php 
sm_registerglobal('pid', 'action', 'start','emsg','es_timetablesid','es_class','es_sec','es_day','es_staffid','es_subject', 	
'staffid','elid','Submit' ,'es_m1','es_m2','es_m3','es_m4','es_m5','es_m6','es_m7','es_m8','es_m9' ,'es_t1','es_t2','es_t3','es_t4','es_t5','es_t6','es_t7','es_t8','es_t9' ,'es_w1','es_w2','es_w3','es_w4','es_w5','es_w6','es_w7','es_w8','es_w9' ,'es_th1','es_th2','es_th3','es_th4','es_th5','es_th6','es_th7','es_th8','es_th9'  ,'es_f1','es_f2','es_f3','es_f4','es_f5','es_f6','es_f7','es_f8','es_f9' ,'es_s1','es_s2','es_s3','es_s4','es_s5','es_s6','es_s7','es_s8','es_s9','groups','class' ,'orderby', 'updatetable','Update','es_mmid','selectempnum', 'es_staffidnam','es_startfrom','es_endto','es_breakfrom','es_breakto','es_lunchfrom','es_lunchto','es_duration','es_tmid','st_department','txt_deptname','selectionserch');

/**
* Only Super admin or moderator of the corporate can be allowed to access this page
*/ 
 
/**********************************************************************
* Get  groups and Classes
**********************************************************************/
//get groups
 $c_groups = get_groups();
 
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


}


?>

  
	
  
  
 