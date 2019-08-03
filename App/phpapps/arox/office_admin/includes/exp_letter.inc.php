<?php
sm_registerglobal('pid','action','update','emsg','start','submit_from','redirecturl','staff_id','date','staff_name','father_name','mother_name','class_name','post','dept','aced_year','rollnumber','marks_obtained','rank','doj','charac','status','created_on','conduct','games','hobbies','id','update','gender','es_staffid','es_departmentsid');
/**
* Only Admin users can view the pages
*/

if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
$exesqlquery = "SELECT * FROM `es_departments`";
	$getdeptlist = getamultiassoc($exesqlquery);

	$exesqlquery = "SELECT * FROM `es_departments`";
	$getdeptlist = getamultiassoc($exesqlquery);
	
	$school_details_sel = "SELECT * FROM `es_finance_master` ORDER BY `es_finance_masterid` DESC";
$school_details_res = getamultiassoc($school_details_sel);


$html_obj = new html_form();
$vlc = new FormValidation();
//$default_title_array=array
//('Male'=>'Male','Female'=>'Female');	
$obj_deptlist    = new es_departments();
$obj_deptlistarr = $obj_deptlist->GetList(array(array("es_departmentsId",">", 0)) );
//$class_list[''] = "-- All --";
foreach($obj_deptlistarr as $eachdept){
$dept_list[$eachdept->es_departmentsId]= $eachdept->es_deptname;
}
//array_print($class_list);
//$students_list=array(""=>"Select Student");



			if(isset($es_departmentsid) && $es_departmentsid!='') {
				if($es_departmentsid=='all'){
		 $sel_stds = "SELECT es_staffid , st_firstname , st_lastname ,st_gender,st_post,st_dateofjoining,st_department,st_fatherhusname  FROM es_staff  WHERE  tcstatus!= 'issued' AND selstatus !='unaccepted'";
				$allstaff= $db->getRows($sel_stds);
				
				if(count($allstaff)>0){
		foreach($allstaff as $each_staff){
		$staff_list[$each_staff['es_staffid']]= $each_staff['st_firstname']. '&nbsp;&lt;'.$each_staff['st_lastname'].'&gt;';
		//array_print($students_list);
		}
		}
				}else{
				$sel_stds =  $sel_stds = "SELECT es_staffid , st_firstname , st_lastname ,st_gender,st_post,st_dateofjoining,st_department,st_fatherhusname  FROM es_staff  WHERE  tcstatus!= 'issued' AND selstatus !='unaccepted' AND st_department=".$es_departmentsid;
				$allstaff = $db->getRows($sel_stds);
				if(count($allstaff)>0){
		foreach($allstaff as $each_staff){
		$staff_list[$each_staff['es_staffid']]= $each_staff['st_firstname']. '&nbsp;';
	
	//	array_print($students_list);
		}
		}
				
				}}
				
	
if(isset($es_departmentsid) && $es_departmentsid!='' && isset($es_staffid) && $es_staffid!='' && !isset($submit_from))
{
$staff_det=$db->getRow("SELECT * FROM es_staff WHERE es_staffid='".$es_staffid."'");

$staff_det2=$db->getRow("SELECT * FROM es_deptposts WHERE es_postshortname='".$staff_det['st_post']."'");


$staff_id=$staff_det['es_staffid'];
$staff_name=$staff_det['st_firstname'].$staff_det['st_lastname'];
$gender=$staff_det['st_gender'];
$doj= func_date_conversion("Y-m-d","d/m/Y",$staff_det['st_dateofjoining']);
$father_name=$staff_det['st_fatherhusname'];
$st_department=$staff_det['st_department'];
$post=$staff_det['st_post'];

$post=$student_det2['es_postname'];

 $sec=$db->getRow("select * FROM es_staff WHERE es_staffid=".$es_staffid); 
 $post=$sec['es_postname'];
 $sec1=$db->getRow("select * from es_staff where es_staffid=".$es_staffid);
//array_print($sec1);
 $rollnumber=$sec1['roll_no'];



}
				
				
if($action=='list'){

		$sql_qr = "SELECT * FROM  es_expcerti where status!='deleted'";//es_expcerti where status=deleted
		$no_rec = sqlnumber($sql_qr);
		$q= "SELECT * FROM es_preadmission tcstatus!='issued' ";
		$no_recs = sqlnumber($q);
		if(!isset($start)){$start=0;}
		$q_limit = 20;
		$sql_qr .=" ORDER BY id  ASC LIMIT ".$start.",".$q_limit."";
		$all_sem_det = $db->getrows($sql_qr);

}
if($action=="delete"){
	
$db->update("es_expcerti","status='Deleted'",'id='.$id );
	header("location: ?pid=116&action=list&emsg=3");
	}




if($action=='add'){

$staff_id=$staff_id+1;
if(isset($submit_from) && $submit_from!="" ){
  //array_print($_POST);
   if($es_departmentsid==''){ $errormessage['es_departmentsid'] = "Select  Department";}
   
    //if($es_departmentsid==''){ $errormessage['es_departmentsid'] = "Select Student ID";}
		else{ 
		
	 $count="select count(*) from  es_expcerti where   staff_id='".$es_staffid."' and status !='Deleted' ";
$c =$db->getOne($count);
  if($c!=0){$errormessage['staff_name']  = " Experience Certificate already issued to this staff";}

	if($gender==''){ $errormessage['gender'] = "Select Your Gender";}
		//$count=getdata('es_charcerti','count(student_name)','student_name="'.$student_name.'  " ');
//  if($c!=0){$errormessage['student_name']  = "Student Name Already Exist";}
  }
	
	    if($staff_name==''){ $errormessage['staff_name'] = "Enter Staff name";}
		else{ 
	 $count="select count(*) from  es_expcerti where staff_name='".$es_staffid."' and status !='Deleted' ";
$c =$db->getOne($count);
  if($c!=0){$errormessage['staff_name']  = "Staff Name Has Already Issued The Experience Certificate";}

	if($gender==''){ $errormessage['gender'] = "Select Your Gender";}
  }
  if($gender==''){ $errormessage['gender'] = "Select Gender";}
		//if($father_name==''){ $errormessage['father_name'] = "Enter Father Name";}
		if($post==''){ $errormessage['post'] = "Enter post";}
		if($aced_year==''){ $errormessage['aced_year'] = "Enter Year";}
		//if($exam_date==''){ $errormessage['exam_date'] = "Enter Exam Year";}
		//if($marks_obtained==''){ $errormessage['marks_obtained'] = "Enter Obtained Marks";}
		// if($rank==''){ $errormessage['rank'] = "Enter Division";}
		if($doj==''){ $errormessage['doj'] = "Enter Staff Date Of joining";}
				
	/*	if(isset($email) && $email!=""){
				if(!$vlc->is_email($email)){$errormessage['email'] = "Enter Valid Email";}
		}
	*/		 
	
		if(count($errormessage)==0){
		$doj=func_date_conversion("d/m/Y","Y-m-d",$doj);
	                      $message_arr = array( 
						  "staff_id" =>$es_staffid,						  
						  "staff_name"  =>$staff_name,						  
						  "father_name"  =>$father_name,		
						  "dept"    =>$es_departmentsid,
						  "post"     =>$post,						  
						  "gender"     =>$gender,
						  "aced_year"  =>$aced_year,	
						  "doj"    =>$doj,
						  "charac"  =>$charac,	
						  "conduct"     =>$conduct,	
						  "created_on" =>date("Y-m-d"),
						  "status" => 'Active',
					       );
					  $db->insert("es_expcerti",$message_arr);
					  header("location:?pid=116&action=list&emsg=1");	
       }
    }
}
if($action=='edit'){

	$sem_det = $db->getrow("SELECT * FROM es_expcerti WHERE id=".$id);
		if(isset($update) && $update!=""){
		if(isset($update) && $update!=""){
		/*if($father_name==''){ $errormessage['father_name'] = "Enter Father Name";}*/
		if($post==''){ $errormessage['post'] = "Enter post";}
		if($aced_year==''){ $errormessage['aced_year'] = "Enter Year";}
		if($gender==''){ $errormessage['gender'] = "Select Your Gender";}
		if($doj==''){ $errormessage['doj'] = "Enter Staff Date Of joining";}
		    }
			$doj=func_date_conversion("d/m/Y","Y-m-d",$doj);
			if(count($errormessage)==0){
		$query="update es_expcerti set gender='".$gender."',father_name ='".$father_name ."',post  ='".$post."',aced_year='".$aced_year."',doj='".$doj."',charac='".$charac."',conduct='".$conduct."' where id=".$id;
				
				mysql_query($query);
				header("location:?pid=116&action=list&emsg=2");
				exit;
			}
		
		
	
		}
		$staff_id = $sem_det['staff_id'];
		$staff_name = $sem_det['staff_name'];
		$father_name  = $sem_det['father_name'];
		 $post  = $sem_det['post'];
		$aced_year  = $sem_det['aced_year'];
		 $doj= func_date_conversion("Y-m-d","d/m/Y",$sem_det['doj']);
		$charac  = $sem_det['charac'];
		$conduct  = $sem_det['conduct'];
		$dept = $sem_det['dept'];
		$gender  = $sem_det['gender'];
		
}





if($action=='print_expcertificate'){
	$candidate_det_01 = $db->getrow("SELECT * FROM es_expcerti WHERE id=".$id);
								if(is_array($candidate_det_01)){
									foreach($candidate_det_01 as $k=>$v){
										if($v==""){$v=" --- ";}
										$candidate_det[$k]=$v;
										

//array_print($candidate_det);
									}
									}
								//array_print($candidate_det);


}


	

?>
