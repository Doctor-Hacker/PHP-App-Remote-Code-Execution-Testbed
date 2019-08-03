<?php

sm_registerglobal('pid', 'action','emsg','cid','class_id','id','stu_id','selval','classid','es_subjectid','subjectid','unit_id','chapter_id','albmtype','es_departmentsid','eq_createdon','staff_id','module','bid','rid','grpid','namev');

if($action=="getallname")
{
	
	$rs = mysql_query("select pre_name,middle_name,pre_lastname from es_preadmission where pre_name like '". mysql_real_escape_string($namev) ."%' order by pre_name asc limit 0,10");

}
/**
* Only Admin users can view the pages
*/

if($action=='getschoolbyid')
{
	
		$obj_school    = new es_schools();
		$obj_schoollistarr = $obj_school->GetList(array(array("group_id", "=", $grpid)) );
}

if($action=='getschool')
{
	// $str="SELECT * FROM `es_schools` WHERE `group_id` ='".$grpid."' ORDER BY `school_id` ASC";
	$schlistarr = $db->getRows("SELECT * FROM `es_schools` WHERE `group_id` ='".$grpid."' ORDER BY `school_id` ASC");
	//print_r($schlistarr);
}

// Unit Management
if($action=='classwisesubjects'){

	$classlistarr = $db->getRows("SELECT * FROM `es_subject` WHERE `es_subjectshortname` ='".$cid."' ORDER BY `es_subjectid` ASC");
}
// Unit Management
if($action=='classwisesubjects2'){
	$classlistarr = $db->getRows("SELECT * FROM `es_subject` WHERE `es_subjectshortname` ='".$cid."' ORDER BY `es_subjectid` ASC");

}




/******* these are adding chapters actions***********/
if($action=='classwisesubjects_units'){
	$classlistarr = $db->getRows("SELECT * FROM `es_subject` WHERE `es_subjectshortname` ='".$cid."' ORDER BY `es_subjectid` ASC");
}

if($action=='classwiseunits'){
$unitslistarr = $db->getRows("SELECT * FROM `es_units` WHERE es_subjectid='".$es_subjectid."' and status!='deleted' ORDER BY `unit_id` ASC");

}
/******* these are searching chapters actions***********/
if($action=='classwisesubjectstwo'){

	$classlistarr = $db->getRows("SELECT * FROM `es_subject` WHERE `es_subjectshortname` ='".$cid."'  ORDER BY `es_subjectid` ASC");
}

if($action=='classwiseunits2'){
$unitslistarr = $db->getRows("SELECT * FROM `es_units` WHERE es_subjectid='".$subjectid."' and status!='deleted' ORDER BY `unit_id` ASC");

}

if($action=='classwiseunits3'){
$unitslistarr = $db->getRows("SELECT * FROM `es_units` WHERE es_subjectid='".$subjectid."' and status!='deleted' ORDER BY `unit_id` ASC");

}

if($action=='classwiseunitsone'){
$unitslistarr = $db->getRows("SELECT * FROM `es_units` WHERE es_subjectid='".$es_subjectid."' and status!='deleted' ORDER BY `unit_id` ASC");

}
if($action=='unitwisechapters'){
$chapterlistarr = $db->getRows("SELECT * FROM `es_chapters` WHERE unit_id='".$unit_id."' and status!='deleted' ORDER BY `chapter_id` ASC");

}

if($action=='chpaters2'){
$chapterlistarr = $db->getRows("SELECT * FROM `es_chapters` WHERE unit_id='".$unit_id."'and status!='deleted'  ORDER BY `chapter_id` ASC");

}
// albms
if($action=='getphotos'){
$albumsres = $db->getRows("SELECT * FROM `es_photogallery` WHERE album_cover ='".$albmtype."' ORDER BY `id` Desc");
return $albumsres;
}

/************** department wise post displaying ******************/

if($action=='getposts' || $action=='payslip_posts'){
$post_arr = $db->getrows("SELECT * FROM es_deptposts WHERE es_postshortname='".$es_departmentsid."' ORDER BY es_deptpostsid ASC");

}
if($action=='deppost' ){
$post_arr = $db->getrows("SELECT * FROM es_departments ");

}
if($action=='getstaff'){
		
		
$staff_arr = $db->getrows("SELECT * FROM es_staff WHERE status='added'  AND selstatus='accepted' AND tcstatus='notissued' AND st_post='".$cid."'  ORDER BY es_staffid ASC");
}

if($action=='getstaff_payslip'){

		
$staff_arr = $db->getrows("SELECT * FROM es_staff WHERE status='added' AND selstatus='accepted' AND tcstatus='notissued' AND st_department = '".$es_departmentsid."' ORDER BY es_staffid ASC");
}


/************** Date wise Enquiry list displaying ******************/

if($action=="checkavailablestudents"){
	$sql_qry = "SELECT * FROM es_enquiry WHERE es_preadmissionid<1 AND eq_createdon='".func_date_conversion("d/m/Y h:i A","Y-m-d",$eq_createdon)."' ORDER BY es_enquiryid DESC";
	$es_enquiryList = $db->getrows($sql_qry);
}
if($action=="dirveravilable"){
if($staff_id!=""){
	$sql_qry = "SELECT * FROM es_transport_drivers WHERE es_staffid=".$staff_id;
	$es_staff_arr = $db->getRows($sql_qry);
	if(count($es_staff_arr)>0){
		echo $es_staff_arr[0]['driver_license']."###";		
		echo  $es_staff_arr[0]['issuing_authority']."###";	
		echo func_date_conversion("Y-m-d","d/m/Y",$es_staff_arr[0]['valid_date'])."###";		
if($es_staff_arr[0]['license_doc']!=""){
		echo $es_staff_arr[0]['license_doc'];	
		} 
 } else {
   echo "nodata";
   } 
   }else{
   echo "nodata";
   }
}


if($action=="subbookacts"){

if($cid!=""){
 $sal_query="select *  from es_subcategory where subcat_catname=".$cid." AND subcat_status!='inactive'";
$es_sublist = $db->getrows($sal_query);
}


}

if($action=="getsubmodules"){
 $submodule_sql="SELECT DISTINCT submodule FROM es_userlogs WHERE module='".$module."' ORDER BY submodule";
$submodule_list = $db->getrows($submodule_sql);
}
if($action=="getrooms"){
$submodule_sql="SELECT * FROM es_hostelroom WHERE es_hostelbuldid='".$bid."' ORDER BY es_hostelroomid";
$submodule_list = $db->getrows($submodule_sql);
}
if($action == "assign_section"){
$con='';
if($id != ''){
$con.=" AND EPD.pre_class=".$id;
}
//AND ESS.course_id= EPD.pre_class
$sql_qr = "SELECT EP.es_preadmissionid, EP.pre_name, (SELECT roll_no FROM es_sections_student ESS WHERE ESS.student_id=EP.es_preadmissionid ) AS ROLL_NO, (SELECT section_id FROM es_sections_student ESS WHERE ESS.student_id=EP.es_preadmissionid) AS SECTION FROM es_preadmission EP , es_preadmission_details EPD  where EP.pre_status !='inactive' AND EPD.es_preadmissionid=EP.es_preadmissionid ".$con." ORDER BY es_preadmissionid ASC";
$all_sem_det = $db->getrows($sql_qr);
$sect_sql="SELECT * FROM es_sections";
$sect_det=$db->getRows($sect_sql);
}

if($action == 'inventory_reports' && $class_id!=''){
$stu_sql="SELECT es_preadmissionid, pre_name,(SELECT roll_no FROM es_sections_student WHERE student_id=es_preadmissionid) AS ROLL_NO FROM es_preadmission WHERE status!='inactive' AND pre_class=".$class_id; 
$stu_det=$db->getRows($stu_sql);
}
if($action == 'students_information'){
if($stu_id!='')
{
$student_inf_sql="SELECT EP.pre_name, EP.pre_image, EC.es_classname, ESS.roll_no, (SELECT section_name FROM es_sections WHERE section_id=ESS.section_id AND student_id=".$stu_id.") AS SECTION FROM es_sections_student ESS, es_classes EC, es_preadmission EP WHERE EC.es_classesid=ESS.course_id AND ESS.student_id=".$stu_id." AND EP.es_preadmissionid=".$stu_id."";
$student_inf_det=$db->getRow($student_inf_sql);
}
}

?>