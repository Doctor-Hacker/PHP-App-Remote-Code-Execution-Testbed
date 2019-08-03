<?php
sm_registerglobal('pid','action','update','emsg','start','submit_from','redirecturl','sno1','date','student_name','father_name','mother_name','class_name','section','exam_name','exam_date','rollnumber','marks_obtained','rank','dob','charector','status','created_on','conduct','games','hobbies','id','update','gender','es_preadmissionid','es_classesid');
/**
* Only Admin users can view the pages
*/

if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
	$exesqlquery = "SELECT * FROM `es_groups`";
	$getgrplist = getamultiassoc($exesqlquery);
	
	$school_details_sel = "SELECT * FROM `es_finance_master` ORDER BY `es_finance_masterid` DESC";
$school_details_res = getamultiassoc($school_details_sel);


$html_obj = new html_form();
$vlc = new FormValidation();
$default_title_array=array
('Male'=>'Male','Female'=>'Female');	
$obj_classlist    = new es_classes();

$html_obj = new html_form();

$obj_classlistarr = $obj_classlist->GetList(array(array("es_classesid", ">", 0)) );
//$class_list[''] = "-- All --";
foreach($obj_classlistarr as $eachclass){
$class_list[$eachclass->es_classesId]= $eachclass->es_classname;
}
//array_print($class_list);
//$students_list=array(""=>"Select Student");



			if(isset($es_classesid) && $es_classesid!='') {
				if($es_classesid=='all'){
		 $sel_stds = "SELECT es_preadmissionid , pre_name , pre_emailid ,pre_dateofbirth, pre_student_username  FROM es_preadmission  WHERE  pre_status!= 'inactive' AND status !='inactive'   ";
				$allstudents = $db->getRows($sel_stds);
				
				if(count($allstudents)>0){
		foreach($allstudents as $each_student){
		$students_list[$each_student['es_preadmissionid']]= $each_student['pre_name']. '&nbsp;&lt;'.$each_student['pre_student_username'].'&gt;';
		//array_print($students_list);
		}
		}
				}else{
				$sel_stds = "SELECT es_preadmissionid , pre_name , pre_emailid ,pre_dateofbirth, pre_student_username FROM es_preadmission  WHERE pre_class='".$es_classesid."' AND pre_status!= 'inactive' AND status !='inactive'  ";
				$allstudents = $db->getRows($sel_stds);
				if(count($allstudents)>0){
		foreach($allstudents as $each_student){
		$students_list[$each_student['es_preadmissionid']]= $each_student['pre_name']. '&nbsp;';
	
	//	array_print($students_list);
		}
		}
				
				}}
				
	
if(isset($es_classesid) && $es_classesid!='' && isset($es_preadmissionid) && $es_preadmissionid!='' && !isset($submit_from))
{
$student_det=$db->getRow("SELECT * FROM es_preadmission WHERE es_preadmissionid='".$es_preadmissionid."'");

$student_det2=$db->getRow("SELECT * FROM subjects_cat WHERE classid='".$student_det['pre_class']."'");


$student_id=$student_det['es_preadmissionid'];
 $student_name=$student_det['pre_name'];
$gender=$student_det['pre_gender'];
  $dob= func_date_conversion("Y-m-d","d/m/Y",$student_det['pre_dateofbirth']);
$father_name=$student_det['pre_fathername'];
$mother_name=$student_det['pre_mothername'];
$section=$student_det2['scat_name'];

 $sec=$db->getRow("select ES.* FROM es_sections_student ESS,es_sections ES ,es_preadmission EP WHERE ES.section_id=ESS.section_id AND EP.es_preadmissionid=ESS.student_id AND ESS.course_id=EP.pre_class AND ESS.student_id=".$es_preadmissionid); 
 ("select ES.* FROM es_sections_student ESS,es_sections ES ,es_preadmission EP WHERE ES.section_id=ESS.section_id AND EP.es_preadmissionid=ESS.student_id AND ESS.course_id=EP.pre_class AND ESS.student_id=".$es_preadmissionid); 
 $section=$sec['section_name'];
 $sec1=$db->getRow("select * from es_feepaid_new where es_preadmissionid=".$es_preadmissionid);
//array_print($sec1);
$rank=$sec1['paid'];
$marks_obtained=$sec1['class_id'];
 $rollnumber=$student_det['es_preadmissionid'];



}
				
				
if($action=='list'){

		$sql_qr = "SELECT * FROM es_intxcerti where status !='Deleted' ";
		$no_rec = sqlnumber($sql_qr);
		$q= "SELECT * FROM es_preadmission where status !='Deleted' ";
		$no_recs = sqlnumber($q);
		if(!isset($start)){$start=0;}
		$q_limit = 20;
		$sql_qr .=" ORDER BY id  DESC LIMIT ".$start.",".$q_limit."";
		$all_sem_det = $db->getrows($sql_qr);

}
if($action=="delete"){
	
$db->update("es_intxcerti","status='Deleted'",'id='.$id );
	header("location: ?pid=119&action=list&emsg=3");
	}




if($action=='add'){

$sno=$sno+1;
if(isset($submit_from) && $submit_from!="" ){
  //array_print($_POST);

   if($es_classesid==''){ $errormessage['es_classesid'] = "Select  Branch";}
   if($hobbies==''){ $errormessage['hobbies'] = "Select  Class";}
    if($es_preadmissionid==''){ $errormessage['es_preadmissionid'] = "Select Student ID";}
		else{ 
		
	 $count="select count(*) from  es_intxcerti where   sno='".$es_preadmissionid."' and status !='Deleted' ";
$c =$db->getOne($count);
  if($c!=0){$errormessage['student_name']  = " Income tax Bonafied Certificate already issued to this student";}

	if($gender==''){ $errormessage['gender'] = "Select Your Gender";}
		//$count=getdata('es_charcerti','count(student_name)','student_name="'.$student_name.'  " ');
//  if($c!=0){$errormessage['student_name']  = "Student Name Already Exist";}
  }
	
	    if($student_name==''){ $errormessage['student_name'] = "Enter Student name";}
		else{ 
		
	 $count="select count(*) from  es_intxcerti where   student_name='".$es_preadmissionid."' and status !='Deleted' ";
$c =$db->getOne($count);
  if($c!=0){$errormessage['student_name']  = "Student Name Has Already Issued The Income tax Bonafied Certificate";}

	if($gender==''){ $errormessage['gender'] = "Select Your Gender";}
		//$count=getdata('es_charcerti','count(student_name)','student_name="'.$student_name.'  " ');
//  if($c!=0){$errormessage['student_name']  = "Student Name Already Exist";}
  }
  

  if($gender==''){ $errormessage['gender'] = "Select Gender";}
		if($father_name==''){ $errormessage['father_name'] = "Enter Father Name";}
		//if($mother_name==''){ $errormessage['mother_name'] = "Enter Mother Name";}
	
		//if($section==''){ $errormessage['section'] = "Enter Class Section";}
		//if($exam_name==''){ $errormessage['exam_name'] = "Enter Passed Exam Name";}
		// if($exam_date==''){ $errormessage['exam_date'] = "Enter Exam Year";}
	if($rollnumber==''){ $errormessage['rollnumber'] = "Enter Roll Number";}
		//if($marks_obtained==''){ $errormessage['marks_obtained'] = "Enter Obtained Marks";}
	
		
		 if($rank==''){ $errormessage['rank'] = "Enter paid fee";}
		if($dob==''){ $errormessage['dob'] = "Enter Student Date Of Birth";}
				
	/*	if(isset($email) && $email!=""){
				if(!$vlc->is_email($email)){$errormessage['email'] = "Enter Valid Email";}
		}
	*/		 
	
		if(count($errormessage)==0){
		$dob=func_date_conversion("d/m/Y","Y-m-d",$dob);
	                      $message_arr = array( 
						  "sno" =>$es_preadmissionid,	
						  "date"  =>$date,							  
						  "student_name"  =>$student_name,						  
						  "father_name"  =>$father_name,	
						  "mother_name"     =>$mother_name,	
						  "class_name"    =>$es_classesid,
						  "section"     =>$section,						  
						   "gender"     =>$gender,
						  "exam_name" =>$exam_name,	
						  "exam_date"  =>$exam_date,	
						  "roll_number"  =>$rollnumber,	
						  "marks_obtained"  =>$marks_obtained,	
						  "rank"     =>$rank,	
						  "dob"    =>$dob,
						  "section"     =>$section,
						  
						    "charector"  =>$charector,	
						  "conduct"     =>$conduct,	
						  "games"    =>$games,
						  "hobbies"     =>$hobbies,
						  "created_on" =>date("Y-m-d"),
					       );
					  $db->insert("es_intxcerti",$message_arr);
					  header("location:?pid=119&action=list&emsg=1");	
       }
    }
}



if($action=='edit'){

	$sem_det = $db->getrow("SELECT * FROM es_intxcerti WHERE id=".$id);
		if(isset($update) && $update!=""){
		if(isset($update) && $update!=""){
		//	  if($student_name==''){ $errormessage['student_name'] = "Enter Student name";}
		if($father_name==''){ $errormessage['father_name'] = "Enter Father Name";}
		//if($mother_name==''){ $errormessage['mother_name'] = "Enter Mother Name";}
	// if($class_name==''){ $errormessage['class_name'] = "Enter Class name";}
		//if($section==''){ $errormessage['section'] = "Enter Class Section";}
		//if($exam_name==''){ $errormessage['exam_name'] = "Enter Passed Exam Name";}
		// if($exam_date==''){ $errormessage['exam_date'] = "Enter Exam Year";}
		if($rollnumber==''){ $errormessage['rollnumber'] = "Enter Roll Number";}
		//if($marks_obtained==''){ $errormessage['marks_obtained'] = "Enter Obtained Marks";}
		if($gender==''){ $errormessage['gender'] = "Select Your Gender";}
   if($es_classesid==''){ $errormessage['es_classesid'] = "Select  Branch";}
   if($hobbies==''){ $errormessage['hobbies'] = "Select  Class";}
		 if($rank==''){ $errormessage['rank'] = "Enter Paid fee";}
		if($dob==''){ $errormessage['dob'] = "Enter Student Date Of Birth";}
		    }
			$dob=func_date_conversion("d/m/Y","Y-m-d",$dob);
			if(count($errormessage)==0){
			//	$db->update("es_charcerti","sno='".$sno1."',gender='".$gender."',father_name ='".$father_name ."',mother_name ='".$mother_name ."',section  ='".$section."',exam_date='".$exam_date."',roll_number='".$rollnumber."',marks_obtained='".$marks_obtained."',rank='".$rank."',dob='".$dob."',charector='".$charector."',conduct='".$conduct."',games='".$games."',hobbies='".$hobbies."'	,exam_name='".$exam_name."'","sno=".$id);
				
				
				 $query="update es_intxcerti set gender='".$gender."',father_name ='".$father_name ."',mother_name ='".$mother_name ."',roll_number='".$rollnumber."',rank='".$rank."',dob='".$dob."',charector='".$charector."',conduct='".$conduct."',hobbies='".$hobbies."',marks_obtained='".$marks_obtained."', where id=".$id;
				
				mysql_query($query);
				header("location:?pid=119&action=list&emsg=2");
				exit;
			}
		
		
	
		}
		$sno1 = $sem_det['sno'];
		$student_name = $sem_det['student_name'];
		$father_name  = $sem_det['father_name'];
		$mother_name = $sem_det['mother_name'];
		//$class_name  = $sem_det['class_name'];
		 $section  = $sem_det['section'];
		$exam_date  = $sem_det['exam_date'];
		
		$rollnumber = $sem_det['roll_number'];
		$marks_obtained = $sem_det['marks_obtained'];
		$rank  = $sem_det['rank'];
		 $dob= func_date_conversion("Y-m-d","d/m/Y",$sem_det['dob']);
		$charector  = $sem_det['charector'];
		$conduct  = $sem_det['conduct'];
		$games  = $sem_det['games'];
		$hobbies  = $sem_det['hobbies'];
		$exam_name  = $sem_det['exam_name'];
		$gender  = $sem_det['gender'];
		
}





if($action=='print_incometaxcertificate'){
	$candidate_det_01 = $db->getrow("SELECT * FROM es_intxcerti WHERE id=".$id);
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
