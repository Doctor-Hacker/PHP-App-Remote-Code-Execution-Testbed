<?php

sm_registerglobal('pid', 'action','emsg','es_subjectid','es_classesid','addchapter','unit_id','classesid','subjectid','searchunit','uid','chapter_name','chid','addchapterslist','update_chapter');

/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
if(isset($addchapterslist) && $addchapterslist!=""){
header("location:?pid=59&action=addchapters");

}

if($action=="deletechapter"){
	
			
						$db->update('es_chapters', "status ='deleted'", 'chapter_id =' . $chid);
			
				$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_chapters','TUTORIALS','ADD CHAPTER','".$chid."','CHAPTER DELETED','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);
	
			
			header("location:?pid=59&action=list&emsg=3&classesid=".$classesid."&subjectid=".$subjectid."&unit_id=".$unit_id."&searchunit=Submit");
			exit;
}
if(isset($addchapter) && $addchapter!=""){
	
		if (empty($es_classesid)) {
		$errormessage[0]="Select Class";	  
		}
		if (empty($es_subjectid)) {
		$errormessage[1]="Select Subject";	  
		}
		if (empty($unit_id)) {
		$errormessage[2]="Select Unit";	  
		}
		if (empty($chapter_name)) {
		$errormessage[3]="Enter Chapter Name";	  
		}
		if($es_classesid!="" && $es_subjectid!="" && $unit_id!="" && $chapter_name!=""){
		$count=$db->getOne("select * from es_chapters where unit_id ='".$unit_id."' AND chapter_name ='".$chapter_name."'");
		if($count>0){
		$errormessage[4]="Chapter Name already Exist";	  
		}
		}
		if(count($errormessage)==0){
		$today=date("Y-m-d");
		 $chapter_array = array(
							'unit_id' 	=> $unit_id,
							'chapter_name' 	=> $chapter_name,							
							'status' 	=> 'Active',
							'created_on'	=> $today
						 );
					$chapter_array = stripslashes_deep($chapter_array);
			$chaid=$db->insert('es_chapters',$chapter_array);
			
			
				// logs inserting
		
		$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_chapters','TUTORIALS','ADD CHAPTER','".$chaid."','CHAPTER ADDED','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);
	
			
			header("Location:?pid=59&action=list&emsg=1");
	 		exit;
	}
	
	}
	
	
	
	if(isset($update_chapter) && $update_chapter!=""){
	
		if (empty($es_classesid)) {
		$errormessage[0]="Select Class";	  
		}
		if (empty($es_subjectid)) {
		$errormessage[1]="Select Subject";	  
		}
		if (empty($unit_id)) {
		$errormessage[2]="Select Unit";	  
		}
		if (empty($chapter_name)) {
		$errormessage[3]="Enter Chapter Name";	  
		}
		if($es_classesid!="" && $es_subjectid!="" && $unit_id!="" && $chapter_name!=""){
		$count=$db->getOne("select * from es_chapters where unit_id ='".$unit_id."' AND chapter_name ='".$chapter_name."'  AND chapter_id!=". $chid);
		if($count>0){
		$errormessage[4]="Chapter Name already Exist";	  
		}
		}
		
		if(count($errormessage)==0){
		$today=date("Y-m-d");
		 $db->update('es_chapters', "unit_id ='" . $unit_id . "',chapter_name ='" . $chapter_name . "'", 'chapter_id =' . $chid);
		
		
			// logs inserting
		
		$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_chapters','TUTORIALS','ADD CHAPTER','".$chid."','CHAPTER UPDATED','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);
		
			header("Location:?pid=59&action=list&emsg=2");
	 		exit;
	}
	
	}
	
	
if($action=='updatechapters'){
$editchapters=$db->getRow("select * from es_chapters where chapter_id=". $chid);
}
	$classlistarr = $db->getRows("SELECT * FROM `es_classes` ORDER BY `es_classesid` ASC");



if($action=='list' || $action=='print_list'){

if(isset($searchunit) && $searchunit!=""){



	if (empty($classesid)) {
		$errormessage['classesid']="Select Class";	  
		}
		
		if (empty($subjectid)) {
		$errormessage['subjectid']="Select Subject";	  
		}
		if (empty($unit_id)) {
		$errormessage['unit_id']="Select Unit";	  
		}
		if(count($errormessage)==0){

	if($subjectid !="" && $classesid!="" && $unit_id!=""){
	$unitsarr = $db->getRows("SELECT c.*,u.*,s.* FROM `es_chapters` c, `es_units` u, `es_subject` s  WHERE c.unit_id=u.unit_id AND u.es_subjectid=s.es_subjectid AND c.unit_id='".$unit_id."' AND c.status !='deleted' AND s.es_subjectid='".$subjectid."' ORDER BY `chapter_id` ASC");
		}
}
}





}

?>