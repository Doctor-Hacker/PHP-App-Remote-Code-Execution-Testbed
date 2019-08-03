<?php

sm_registerglobal('pid', 'action','emsg','cid','selval','classid','es_subjectid','subjectid','unit_id','chapter_id','albmtype','es_departmentsid');

/**
* Only Admin users can view the pages
*/

checkuserinlogin();

// Unit Management
if($action=='classwisesubjects'){

	$classlistarr = $db->getRows("SELECT * FROM `es_subject` WHERE `es_subjectshortname` ='".$cid."' ORDER BY `es_subjectid` ASC");
}
// Unit Management
if($action=='classwisesubjects2'){
	$classlistarr = $db->getRows("SELECT * FROM `es_subject` WHERE `es_subjectshortname` ='".$cid."' ORDER BY `es_subjectid` ASC");

}

if($action=='classwisesubjects3'){
	$classlistarr = $db->getRows("SELECT * FROM `es_subject` WHERE `es_subjectshortname` ='".$cid."' ORDER BY `es_subjectid` ASC");

}


/******* these are adding chapters actions***********/
if($action=='classwisesubjects_units'){
	$classlistarr = $db->getRows("SELECT * FROM `es_subject` WHERE `es_subjectshortname` ='".$cid."' ORDER BY `es_subjectid` ASC");
}

if($action=='classwiseunits'){
$unitslistarr = $db->getRows("SELECT * FROM `es_units` WHERE es_subjectid='".$es_subjectid."' ORDER BY `unit_id` ASC");

}
/******* these are searching chapters actions***********/
if($action=='classwisesubjectstwo'){

	$classlistarr = $db->getRows("SELECT * FROM `es_subject` WHERE `es_subjectshortname` ='".$cid."' ORDER BY `es_subjectid` ASC");
}

if($action=='classwiseunits2'){
$unitslistarr = $db->getRows("SELECT * FROM `es_units` WHERE es_subjectid='".$subjectid."' and status!='deleted' ORDER BY `unit_id` ASC");

}



if($action=='classwiseunitsone'){
$unitslistarr = $db->getRows("SELECT * FROM `es_units` WHERE es_subjectid='".$es_subjectid."' and status!='deleted' ORDER BY `unit_id` ASC");

}
if($action=='unitwisechapters'){
$chapterlistarr = $db->getRows("SELECT * FROM `es_chapters` WHERE unit_id='".$unit_id."' and status!='deleted' ORDER BY `chapter_id` ASC");

}

if($action=='chpaters2'){
$chapterlistarr = $db->getRows("SELECT * FROM `es_chapters` WHERE unit_id='".$unit_id."' and status!='deleted' ORDER BY `chapter_id` ASC");

}
// albms
if($action=='getphotos'){
$albumsres = $db->getRows("SELECT * FROM `es_photogallery` WHERE album_cover ='".$albmtype."' ORDER BY `id` Desc");
return $albumsres;
}

/************** department wise post displaying ******************/

if($action=='getposts'){
$post_arr = $db->getrows("SELECT * FROM es_deptposts WHERE es_postshortname='".$es_departmentsid."' ORDER BY es_deptpostsid ASC");
}

if($action=='getstaff'){
$staff_arr = $db->getrows("SELECT * FROM es_staff WHERE st_post='".$cid."' AND status='added' AND selstatus='accepted' AND tcstatus='notissued' ORDER BY es_staffid ASC");
}

if($action=="subbookacts"){

if($cid!=""){
 $sal_query="select *  from es_subcategory where subcat_catname=".$cid." AND subcat_status!='inactive'";
$es_sublist = $db->getrows($sal_query);
}


}
?>