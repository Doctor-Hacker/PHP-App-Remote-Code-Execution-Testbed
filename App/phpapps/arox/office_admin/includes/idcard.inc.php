<?php
sm_registerglobal('pid','action','update','emsg','start','column_name','asds_order','uid','sid','admin','formattype',
'Submit','blogDesc','title','es_date', 'update','es_messagesid','start','es_staffid','message','submit_staff','s_format','submit_student','es_classesid','es_preadmissionid','es_adminsid','keyword','search','st_department','es_deptpostsid','submit_image','verticalimage','horizontalimage','image_det','idstr','id','type');
/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
/*if($formattype=='horizontal')
{
echo "horizontal";
exit;
}
if($formattype=='vertical')
{
echo "vertical";
exit;
}*/


$obj_messages     = new es_messages();
$obj_classlist    = new es_classes();
$obj_stafflist    = new es_staff();
$obj_studentslist    = new es_preadmission();
$obj_accounts = new es_finance_master();
$compdetails_school  = getarrayassoc("SELECT *FROM `es_finance_master`  ORDER BY `es_finance_masterid` DESC LIMIT 0 , 1");

$html_obj = new html_form();

$obj_classlistarr = $obj_classlist->GetList(array(array("es_classesid", ">", 0)) );
$class_list['all'] = "-- All --";
foreach($obj_classlistarr as $eachclass){
$class_list[$eachclass->es_classesId]= $eachclass->es_classname;
}


$obj_stafflistarr = $obj_stafflist->GetList(array(array("es_staffid", ">", 0)) );

foreach($obj_stafflistarr as $eachstaff){

$staff_list[$eachstaff->es_staffId]= $eachstaff->st_firstname.' '.$eachstaff->st_lastname.'&nbsp;&lt;'. $eachstaff->st_username . '&gt;';
}


$alladmins = $db->getrows("SELECT * FROM es_admins ORDER BY es_adminsid ASC");

if(count($alladmins)>0){

foreach($alladmins as $each_admin){
$alladmins_arr[$each_admin['es_adminsid']]= $each_admin['admin_fname'].'&nbsp;&lt;'. $each_admin['admin_username'] . '&gt;';
}
}

$exesqlquery = "SELECT * FROM es_departments";
$getdeptlist = $db->getrows($exesqlquery);

foreach($getdeptlist as $eachdept){
$departmentsarr[ $eachdept['es_departmentsid']]=$eachdept['es_deptname'];
}


//Background image for Id cards
if(isset($submit_image) && $submit_image!="")
{

		if($_FILES['horizontalimage']['tmp_name']==""){
						$errormessage[0] = "Upload Horizontal Image"; 
					}
		if($_FILES['verticalimage']['tmp_name']==""){
						$errormessage[1] = "Upload Vertical Image"; 
					}
					
		if(!(($_FILES["horizontalimage"]["type"] == "image/gif")  || ($_FILES["horizontalimage"]["type"] == "image/jpe")  || ($_FILES["horizontalimage"]["type"] == "image/png")   || ($_FILES["horizontalimage"]["type"] == "image/jpeg") || ($_FILES["horizontalimage"]["type"] == "image/pjpeg")))
			{
										$errormessage[0] = "Invalid Horizontal Image"; 

			}
			if(!(($_FILES["verticalimage"]["type"] == "image/gif")  || ($_FILES["verticalimage"]["type"] == "image/jpg")  || ($_FILES["verticalimage"]["type"] == "image/png") || ($_FILES["verticalimage"]["type"] == "image/jpeg") || ($_FILES["verticalimage"]["type"] == "image/pjpeg")))
			{
										$errormessage[1] = "Invalid Vertical Image"; 

			}
		if(count($errormessage)==0)
		{
			if(is_uploaded_file($_FILES['horizontalimage']['tmp_name']) && is_uploaded_file($_FILES['verticalimage']['tmp_name']) ) 
			{
			
			$ext1 = explode(".",$_FILES['horizontalimage']['name']);
			$ext2 = explode(".",$_FILES['verticalimage']['name']);
			$str1 = date("mdY_hms");
			$str2 = date("mdY_hms");
			$new_thumbname1 = "st_".$str1."_".$ext1[0].".".$ext1[1];
			$new_thumbname2 = "st_".$str2."_".$ext2[0].".".$ext2[1];
			$updir1 = "images/idcard_images/";
			$updir2 = "images/idcard_images/";
			$uppath1 = $updir1.$new_thumbname1;
			$uppath2 = $updir2.$new_thumbname2;
			move_uploaded_file($_FILES['horizontalimage']['tmp_name'],$uppath1);
			move_uploaded_file($_FILES['verticalimage']['tmp_name'],$uppath2);
			$horizontal_image = $new_thumbname1;
			$verticalimage = $new_thumbname2;
		    } 
	$sql_qry="SELECT horizontal_image,vertical_image FROM es_idcard_image";
$image_det = $db->getrows($sql_qry);
 if(count($image_det)>=1){
			$db->update("es_idcard_image","horizontal_image='".$horizontal_image."',vertical_image='".$verticalimage."'","id=1");
			$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_idcard_image','ID CARD','CARD IMAGE','1','BACKGROUND IMAGE FOR ID CARD','".$_SERVER['REMOTE_ADDR']."',NOW())";
    $log_insert_exe=mysql_query($log_insert_sql);
			
			}else{
		$sql="INSERT INTO `es_idcard_image` (`id` ,`horizontal_image` ,`vertical_image`) VALUES ( NULL ,  '".$horizontal_image."',  '".$verticalimage."')";
		mysql_query($sql);
		$id=mysql_insert_id();
		$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_idcard_image','ID CARD','CARD IMAGE','".$id."','BACKGROUND IMAGE FOR ID CARD','".$_SERVER['REMOTE_ADDR']."',NOW())";
    $log_insert_exe=mysql_query($log_insert_sql);
	
		
      }
  }
	 header("location: ?pid=72&action=addimage&emsg=79");						
}
/*for idcardlogo*/




if($action=='mailtostaff'){
	if(isset($submit_staff) && $submit_staff!=''){
	    if($st_department==''){ $errormessage['st_department'] = "Select Department";}
		if($es_deptpostsid==''){ $errormessage['es_deptpostsid'] = "Select Post";}
	    if($es_staffid==''){ $errormessage['es_staffid'] = "Select Name";}
		if(count( $errormessage)==0){
			if(count($es_staffid)>=1){
			$idstr = implode("@@@",$es_staffid);
			}
			
		}
	}
}



if($action=='mailtostudents'){
//$students_list=array(""=>"Select Student");

	if($es_classesid!="") {
	    if($es_classesid=='all'){
		$sel_stds = "SELECT es_preadmissionid , pre_name , pre_emailid , pre_student_username  FROM es_preadmission  WHERE  pre_status!= 'inactive' AND pre_status!= 'delete' AND status !='inactive'  AND pre_fromdate='".$_SESSION['eschools']['from_acad']."' ";
		$allstudents = $db->getRows($sel_stds);
		if(count($allstudents)>0){
foreach($allstudents as $each_student){
$students_list[$each_student['es_preadmissionid']]= $each_student['pre_name']. '&nbsp;&lt;SM'.$each_student['es_preadmissionid'].'&gt;';
}
}
		}else{
	    $sel_stds = "SELECT es_preadmissionid , pre_name , pre_emailid , pre_student_username FROM es_preadmission  WHERE pre_class = $es_classesid AND pre_status!= 'inactive' AND  pre_status!= 'delete'  AND status !='inactive' AND pre_fromdate='".$_SESSION['eschools']['from_acad']."'";
		$allstudents = $db->getRows($sel_stds);
		if(count($allstudents)>0){
foreach($allstudents as $each_student){
$students_list[$each_student['es_preadmissionid']]= $each_student['pre_name']. '&nbsp;&lt;SM'.$each_student['es_preadmissionid'].'&gt;';

}
}
		
		}
	}
	
	if(isset($submit_student) && $submit_student!=''){
		if($es_classesid==''){ $errormessage['es_classesid'] = "Select Class";}
		//echo count($es_preadmissionid);
		if(count($es_preadmissionid)==0){ $errormessage['student'] = "Select Student";}
	}
	
if(count( $errormessage)==0){
if(count($es_preadmissionid)>=1){
$idstr = implode("@@@",$es_preadmissionid);
}
}

}
    
if($action=="mails_received"){
    $condition = "";
	if(isset($keyword) && $keyword!=''){ $condition=" AND ( from_type LIKE '%$keyword%' OR subject LIKE '%$keyword%' OR message LIKE '%$keyword%' )"; }
	 $msg_qry ="SELECT * FROM es_messages WHERE to_id=".$_SESSION['eschools']['admin_id']." AND to_type='admin' ".$condition." ";
	 $no_records = sqlnumber($msg_qry);
	 
		$q_limit      = 5;
		if ( !isset($start) ){
			$start = 0;
		}
		 $msg_qry .="ORDER BY es_messagesid DESC  LIMIT " . $start . "," . $q_limit . "";
     $sel_messages = $db->getrows($msg_qry);
//array_print($sel_messages);
}	
if($action=="delete_image"){
    echo $sql_qry="SELECT * FROM es_idcard_image WHERE id=".$id;
     $image_det = $db->getrow($sql_qry);
	 if($type=='horizantal'){
	 
		 unlink("images/idcard_images/".$image_det['horizontal_image ']);
		 $db->update("es_idcard_image","horizontal_image =''",'id='.$id);
	 }
	 if($type=='vertical'){
		 unlink("images/idcard_images/".$image_det['vertical_image']);
		 $db->update("es_idcard_image","vertical_image=''",'id='.$id);
	 }
	 header("location: ?pid=72&action=addimage&emsg=57");
	 exit;
}

if($action=='addimage'){
$sql_qry="SELECT * FROM es_idcard_image";
$image_det = $db->getrow($sql_qry);


}
?>
