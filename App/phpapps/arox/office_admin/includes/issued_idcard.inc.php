<?php
sm_registerglobal('pid','action','update','emsg','start','column_name','asds_order','uid','sid','admin','formattype',
'Submit','blogDesc','title','es_date', 'update','es_messagesid','es_staffid','message','submit_staff','submit_student','es_classesid','es_preadmissionid','es_adminsid','submit_staff2','keyword','search','st_department','es_deptpostsid','status','id','studentstatus');
/**
* Only Admin users can view the pages
*/

if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}



$obj_classlist    = new es_classes();
$obj_stafflist    = new es_staff();
$obj_studentslist    = new es_preadmission();
$html_obj = new html_form();

$obj_classlistarr = $obj_classlist->GetList(array(array("es_classesid", ">", 0)) );
foreach($obj_classlistarr as $eachclass){
$class_list[$eachclass->es_classesId]= $eachclass->es_classname;
}


$obj_stafflistarr = $obj_stafflist->GetList(array(array("es_staffid", ">", 0)) );

foreach($obj_stafflistarr as $eachstaff){

$staff_list[$eachstaff->es_staffId]= $eachstaff->st_firstname.' '.$eachstaff->st_lastname.'&nbsp;&lt;'. $eachstaff->st_username . '&gt;';
}




$exesqlquery = "SELECT * FROM es_departments";
$getdeptlist = $db->getrows($exesqlquery);

foreach($getdeptlist as $eachdept){
$departmentsarr[ $eachdept['es_departmentsid']]=$eachdept['es_deptname'];
}

//status for issued or not issued  for staff
if(isset($status) && $status!="")
{
	if($status=='issued')
	{
		$newstatus='not_issued';
	}
	else
	{
		$newstatus='issued';
	}
		$db->update("es_staff","id_card_status='".$newstatus."'",'es_staffid='.$id);
}
if($action=='mailtostaff'){
	if(isset($submit_staff) && $submit_staff!="")
{
if($st_department==''){ $errormessage['st_department'] = "Select Department";}
		if($es_deptpostsid==''){ $errormessage['es_deptpostsid'] = "Select Post";}
	   
	if(count($errormessage)==0){
		 $sql= "select * from  es_staff s,es_departments d, es_deptposts p where d.es_departmentsid=s.st_department and p.es_deptpostsid=s.st_post and s.st_post=".$es_deptpostsid;
	$issuedidcard = $db->getrows($sql);
 count($issuedidcard);
}
}

	

}

if(isset($studentstatus) && $studentstatus!="")
{
	if($studentstatus=='issued')
	{
		$newstatus='not_issued';
	}
	else
	{
		$newstatus='issued';
	}
		$db->update("es_preadmission","id_card_status='".$newstatus."'",'es_preadmissionid='.$id);
}


if($action=='mailtostudents'){
	
	if(isset($submit_student) && $submit_student!='')
	{
		if($es_classesid==''){ $errormessage['es_classesid'] = "Select Class";}
		if(count($errormessage)==0)
		{
			$sql= "select * from  es_preadmission p,es_classes c where p.pre_class=c.es_classesid and p.pre_class=".$es_classesid;
	$issuedstudentcard = $db->getrows($sql);
    count($issuedstudentcard); 
		}
	}
	


}
    

?>
