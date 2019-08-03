<?php

sm_registerglobal('pid', 'action','emsg','es_subjectid','es_classesid','addunit','unit_name','classesid','subjectid','searchunit','uid','updateunit','addunitslist');

/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
if(isset($addunitslist) && $addunitslist!=""){
header("location:?pid=51&action=addunit");

}

if($action=="deleteunit"){

			//$db->delete('es_units','unit_id=' . $uid);
			
			
			 
			
						$db->update('es_units', "status ='deleted'", 'unit_id =' . $uid);

				$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_units','TUTORIALS','ADD UNITS','".$uid."','UNIT DELETED','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
	
			header("location:?pid=51&action=list&emsg=3&classesid=".$classesid."&subjectid=".$subjectid."&searchunit=Submit");
			exit;
}
if(isset($addunit) && $addunit!=""){
		if (empty($es_classesid)) {
		$errormessage[0]="Select Class";	  
		}
		if (empty($es_subjectid)) {
		$errormessage[1]="Select Subject";	  
		}
		if (empty($unit_name)) {
		$errormessage[2]="Enter Unit Name";	  
		}
		if($es_classesid!="" && $es_subjectid!="" && $unit_name!=""){
		$count=$db->getOne("select * from es_units where es_classesid=".$es_classesid." AND  es_subjectid =".$es_subjectid." AND unit_name ='".$unit_name."'");
		if($count>0){
		$errormessage[3]="Unit Name Already Exist";	  
		}
		}
		if(count($errormessage)==0){
		$today=date("Y-m-d");
		 $photo_array = array(
							'es_classesid' 	=> $es_classesid,
							'es_subjectid' 	=> $es_subjectid,							
							'unit_name' 	=> $unit_name,
							'created_on'	=> $today
						 );
						 $photo_array = stripslashes_deep($photo_array);
			$rec_id=$db->insert('es_units',$photo_array);
			
			// logs inserting
		
		$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_units','TUTORIALS','ADD UNITS','".$rec_id."','UNIT ADDED','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);
	
			header("Location:?pid=51&action=list&emsg=1");
	 		exit;
	}
	}
if(isset($updateunit) && $updateunit!=""){
		if (empty($es_classesid)) {
		$errormessage[0]="Select Class";	  
		}
		if (empty($es_subjectid)) {
		$errormessage[1]="Select Subject";	  
		}
		if (empty($unit_name)) {
		$errormessage[2]="Enter Unit Name";	  
		}
		if($es_classesid!="" && $es_subjectid!="" && $unit_name!=""){
		$count=$db->getOne("select * from es_units where es_classesid=".$es_classesid." AND  es_subjectid =".$es_subjectid." AND unit_name ='".$unit_name."' AND unit_id!=". $uid);
		if($count>0){
		$errormessage[3]="Unit Name already Exist";	  
		}
		}
		if(count($errormessage)==0){
		$today=date("Y-m-d");
			$db->update('es_units', "es_classesid ='" . $es_classesid . "',es_subjectid ='" . $es_subjectid . "',unit_name ='" . $unit_name . "'", 'unit_id =' . $uid);
			
			
			
			// logs inserting
		
		$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_units','TUTORIALS','ADD UNITS','".$uid."','UNIT UPDATED','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);
	
	
			header("Location:?pid=51&action=list&emsg=2");
	 		exit;
	}
	}
if($action=='updateunits'){
$editunits=$db->getRow("select * from es_units where unit_id=". $uid);
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
		if(count($errormessage)==0){
	
		if($subjectid !="" && $classesid!=""){
			
				$unitsarr = $db->getRows("SELECT u.*,c.es_classname,s.es_subjectname FROM `es_classes` c, `es_units` u, `es_subject` s WHERE u.es_subjectid=s.es_subjectid AND s.es_subjectshortname=c.es_classesid AND s.es_subjectid='".$subjectid."' AND c.es_classesid='".$classesid."' AND u.status!='deleted' ORDER BY `es_classesid` ASC");
		}
		}

}

}

?>