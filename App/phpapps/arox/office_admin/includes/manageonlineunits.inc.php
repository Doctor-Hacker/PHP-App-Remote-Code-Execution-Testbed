<?php

sm_registerglobal('pid', 'action','emsg','es_subjectid','es_classesid','updateunit','name','classesid','subjectid','searchunit','uid','id','updatecategory');
$html_obj =new html_form();
/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
if($action=='update_unit'){
$unitsarrupdate = $db->getRow("SELECT * FROM `es_online_units` where id=".$id);
}

if(isset($updateunit) && $updateunit!=""){
		if (empty($name)) {
		$errormessage[2]="Enter Unit Name";	  
		}
		if(count($errormessage)==0){
$db->update("es_online_units","name='".$name."'",'id='.$id);
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	       VALUES('".$_SESSION['eschools']['admin_id']."','es_online_units','Setup','Manage Units','".$id."','Edit Unit','".$_SERVER['REMOTE_ADDR']."',NOW())";
           $log_insert_exe=mysql_query($log_insert_sql);
header("Location:?pid=67&action=unitlist&emsg=2");
exit;
	}
	
	}

//Manage Category	
	
	if($action=='update_category'){
$categoryarrupdate = $db->getRow("SELECT * FROM `es_online_categories` where id=".$id);
}

if(isset($updatecategory) && $updatecategory!=""){
		if (empty($name)) {
		$errormessage[2]="Enter Category";	  
		}
		if(count($errormessage)==0){
$db->update("es_online_categories","name='".$name."'",'id='.$id);
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	       VALUES('".$_SESSION['eschools']['admin_id']."','es_online_categories','Setup','Manage Units','".$id."','Edit Category','".$_SERVER['REMOTE_ADDR']."',NOW())";
           $log_insert_exe=mysql_query($log_insert_sql);
header("Location:?pid=67&action=catlist&emsg=2");
exit;
	}
	
	}
if($action=='unitlist' || $action=='print_units_list'){
$unitsarr = $db->getRows("SELECT * FROM `es_online_units` ORDER BY `id` ASC");
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
		if(count($errormessage)==0){
		$today=date("Y-m-d");
		 $photo_array = array(
							'es_classesid' 	=> $es_classesid,
							'es_subjectid' 	=> $es_subjectid,							
							'unit_name' 	=> $unit_name,
							'created_on'	=> $today
						 );
						 $photo_array = stripslashes_deep($photo_array);
			$db->insert('es_units',$photo_array);
			header("Location:?pid=51&action=list&emsg=1");
	 		exit;
	}
	
	}
if($action=='catlist' || $action=='print_cat_list'){
$catlistarr = $db->getRows("SELECT * FROM `es_online_categories` ORDER BY `id` ASC");
}

?>