<?php

sm_registerglobal('pid', 'action','emsg','addphoto','holiday_date','title','id','status','start','hiddenimage','updatephoto','actionedit','year');

/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
//
$html_obj =new html_form();

if($action=="updatestatus"){
 if($status == 'Active'){$newstatus='Inactive';}else{$newstatus='Active';}
		$db->update('es_holidays', "status ='" . $newstatus ."'  ",'id=' . $id); 
		header("location:index.php?pid=58&action=holidayslist&emsg=33");
			exit;

}
if($action=="delete"){
		$db->delete('es_holidays','id=' . $id); 
		
		
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_holidays','HOLIDAYS','','".$id."','DELETE HOLIDAYS','".$_SERVER['REMOTE_ADDR']."',NOW())";
$log_insert_exe=mysql_query($log_insert_sql);
		
		
		header("location:index.php?pid=58&action=holidayslist&emsg=3");
			exit;

}
if(isset($addphoto)&& $addphoto!=""){

if($title==""){
$errormessage['title']='Enter  Title';
}

if($holiday_date==""){
$errormessage['holiday_date']='Select Date';
}

if(count($errormessage)==0){
$holiday_date = formatDateCalender($holiday_date,"Y-m-d");

	$today=date("Y-m-d");
 $holiday_array = array(
							'title' 	=> stripslashes($title),
							'holiday_date' 	=> $holiday_date,
							'status' 		=> 'Active',
							'created_on' 	=> $today
						 );
			$id=$db->insert('es_holidays',$holiday_array);
			
			
			
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_holidays','HOLIDAYS','','".$id."','ADD HOLIDAYS','".$_SERVER['REMOTE_ADDR']."',NOW())";
$log_insert_exe=mysql_query($log_insert_sql);

			
			header("location:index.php?pid=58&action=holidayslist&emsg=1");
			exit;

}

}

if(isset($updatephoto)&& $updatephoto!=""){
if($title==""){
$errormessage['title']='Enter image Title';
}
if($image_path==""){
$errormessage['image_path']='Enter Video Path';
		}
if(count($errormessage)==0){
		
		
	$db->update('es_holidays', "title ='" . $title ."' , image_path ='" . $image_path ."' ",'id=' . $id); 
	header("location:index.php?pid=58&action=holidayslist&emsg=2&start=".$start);
	exit;

}

}


if($action=="holidayslist"  || $action=='print_holidays'){
/*if($actionedit=="edit"){
 $editphoto   = "SELECT * FROM  es_holidays  WHERE id=".$id; 
$rs_editphoto  = $db->getRow($editphoto );
}*/
if(!isset($year)){
				$year = date("Y");
				}
$no_rows  = sqlnumber("SELECT * FROM  es_holidays  WHERE DATE_FORMAT(holiday_date, '%Y')='".$year."'");
 	$q_limit  = PAGENATE_LIMIT;
	$orderby     = 'holiday_date';
	$start = (isset($start))?$start:0;	
	
  $allphotos   = "SELECT * FROM  es_holidays  WHERE DATE_FORMAT(holiday_date, '%Y')='".$year."' AND  status!='Deleted' ORDER BY  " . $orderby . " ASC "; 
	$rs_photos  = $db->getRows($allphotos );

}
?>