<?php
sm_registerglobal('pid','action','update','emsg','start','submit_from','sno','name','fname','nationality','sc','dobw','dob','class_name','subject','dobp','monthfeepay','feecons','doblast','datestuck','attendance','sissuecetrti','rls','ncc','games','conduct','acharge','status','created_on','es_preadmissionid','es_classesid','exam_date','gender','section','sno1','id','admissionno','dob1');
/**
* Only Admin users can view the pages
*/

if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
$html_obj = new html_form();
$vlc = new FormValidation();

$default_tcons_array=array
('Yes'=>'Yes','No'=>'No');	
$default_title_array=array
('Male'=>'Male','Female'=>'Female');	
$obj_classlist    = new es_classes();

$html_obj = new html_form();

$obj_classlistarr = $obj_classlist->GetList(array(array("es_classesid", ">", 0)) );
$class_list[''] = "-- All --";
foreach($obj_classlistarr as $eachclass){
$class_list[$eachclass->es_classesId]= $eachclass->es_classname;
}
//array_print($class_list);
$students_list=array(""=>"Select Student");



			if(isset($es_classesid) && $es_classesid!='') {
				if($es_classesid=='all'){
		 $sel_stds = "SELECT es_preadmissionid , pre_name , pre_emailid , pre_student_username  FROM es_preadmission  WHERE  pre_status!= 'inactive' AND status !='inactive'   ";
				$allstudents = $db->getRows($sel_stds);
				
				if(count($allstudents)>0){
		foreach($allstudents as $each_student){
		$students_list[$each_student['es_preadmissionid']]= $each_student['pre_name']. '&nbsp;&lt;'.$each_student['pre_student_username'].'&gt;';
		//array_print($students_list);
		}
		}
				}else{
				$sel_stds = "SELECT es_preadmissionid , pre_name , pre_emailid , pre_student_username FROM es_preadmission  WHERE pre_class='".$es_classesid."' AND pre_status!= 'inactive' AND status !='inactive'  ";
				$allstudents = $db->getRows($sel_stds);
				if(count($allstudents)>0){
		foreach($allstudents as $each_student){
		$students_list[$each_student['es_preadmissionid']]= $each_student['pre_name']. '&nbsp;';
		
		}
		}
				
				}}
				
				
if(isset($es_classesid) && $es_classesid!='' && isset($es_preadmissionid) && $es_preadmissionid!='')
{
$student_det=$db->getRow("SELECT * FROM es_preadmission WHERE es_preadmissionid='".$es_preadmissionid."' and status=='inactive'");

$name=$student_det['pre_student_username'];
$gender=$student_det['pre_gender'];
$fname=$student_det['pre_fathername'];
//$mother_name=$student_det['pre_mothername'];
$sec=$db->getRow("select ES.* FROM es_sections_student ESS,es_sections ES ,es_preadmission EP WHERE ES.section_id=ESS.section_id AND EP.es_preadmissionid=ESS.student_id AND ESS.course_id=EP.pre_class AND ESS.student_id=".$es_preadmissionid); 
$section=$sec['section_name'];
//$roll_number=$sec['roll_no'];
$dob=func_date_conversion("Y-m-d","d/m/Y",$student_det['pre_dateofbirth']);

}
				
				
if($action=='list'){

		$sql_qr = "SELECT * FROM es_transferstudent where status !='Deleted' ";
		$no_rec = sqlnumber($sql_qr);
		$q= "SELECT * FROM es_preadmission where status !='Deleted' ";
		$no_recs = sqlnumber($q);
		if(!isset($start)){$start=0;}
		$q_limit = 20;
		$sql_qr .=" ORDER BY id  DESC LIMIT ".$start.",".$q_limit."";
		$all_sem_det = $db->getrows($sql_qr);

}
if($action=="delete"){
	/*$sql="select * from es_accommodations where host_id =$host_id  and status='active'";
	$subcount=$db->getOne($sql);*/
$db->update("es_transferstudent","status='Deleted'",'id='.$id );
	header("location: ?pid=98&action=list&emsg=3");
	}




if($action=='add'){

$sno=$sno+1;
if(isset($submit_from) && $submit_from!="" ){

 if($es_classesid==''){ $errormessage['es_classesid'] = "Select The Class";}
	 if($es_preadmissionid==''){ $errormessage['es_preadmissionid'] = "Select Student Name";}
/* if($sno1==''){ $errormessage['sno1'] = "Enter Serial Number";}*/

 if($name==''){ $errormessage['name'] = "Enter Student Name";}
 
 else{ 
	 $count="select count(*) from  es_transferstudent where  name='".$es_preadmissionid."' and status !='Deleted' ";
$c =$db->getOne($count);

  if($c!=0){$errormessage['name']  = "Student Name Has Already Issued The Transfer Certificate";}
}


 if($gender==''){ $errormessage['gender'] = "Select The Gender Of Student";}

 if($fname==''){ $errormessage['fname'] = "Enter Father Name";}
 if($nationality==''){ $errormessage['nationality'] = "Enter Nationality";}
 //if($sc==''){ $errormessage['sc'] = "Enter Whether the Pupil belong to scheduled caste or schedule tribe";}
/* if($dobw==''){ $errormessage['dobw'] = "Enter Date of birth According to admission Register";}*/
 if($dob1==''){ $errormessage['dob1'] = "Enter Date Of Birth";}
/* if($section==''){ $errormessage['section'] = "Enter Class Section";}*/
 if($subject==''){ $errormessage['subject'] = "Subject Studing, starting in each compulsory or Elective,According to NCERT Syllabus, Hindi ,English,General Science,Social Study";}
 if($dobp==''){ $errormessage['dobp'] = "Date Of Promotion to the Class in";}
	 if($monthfeepay==''){ $errormessage['monthfeepay'] = "Enter Month Upto Fees Has Been Paid";}
 if($exam_date==''){ $errormessage['exam_date'] = "Select Year Upto Fees Has Been Paid";}
if($feecons==''){ $errormessage['feecons'] = "Select Whether the pupil was in receipt of any fees concession ";}
 if($doblast==''){ $errormessage['doblast'] = "Select Date Of Pupil's Last Attend School";}
 if($datestuck==''){ $errormessage['datestuck'] = "Date In Which He/She Stuck Off His Rolls Of The School";}
 
 if($attendance==''){ $errormessage['attendance'] = "Enter Attandance During The Period ";}
 if($sissuecetrti==''){ $errormessage['sissuecetrti'] = "Select Date Of Issue Of Certificate";}
 if($rls==''){ $errormessage['rls'] = "Enter Resons Of Leaving The School";}
  if($admissionno==''){ $errormessage['admissionno'] = "Student Admission No.";}
		/*if($dob1==''){ $errormessage['dob'] = "Enter Student Date Of Birth";}*/
				
	/*	if(isset($email) && $email!=""){
				if(!$vlc->is_email($email)){$errormessage['email'] = "Enter Valid Email";}
		}
	*/		$dob=func_date_conversion("d/m/Y","Y-m-d",$dob);
	$dobp=func_date_conversion("d/m/Y","Y-m-d",$dobp);
	$sissuecetrti=func_date_conversion("d/m/Y","Y-m-d",$sissuecetrti);
	
	$doblast=func_date_conversion("d/m/Y","Y-m-d",$doblast);
	
	$datestuck=func_date_conversion("d/m/Y","Y-m-d",$datestuck);
		if(count($errormessage)==0){
	                      $message_arr = array( 
						  "sno" =>$sno1,	
						     "name"  =>$es_preadmissionid,	
					    	"admissionno"  =>$admissionno,	
						  "fname"  =>$fname,	
						 "class_name"    =>$es_classesid,
						  "section"     =>$section,
						   "gender"     =>$gender,
						  "dob"    =>$dob,
						  "section"     =>$section,
						 "conduct"     =>$conduct,	
						 "nationality"    =>$nationality,
						  "sc"     =>$sc,
						   "dobw"     =>$dobw,
						  "dob"    =>$dob,
						  "subject"     =>$subject,
						 "dobp"     =>$dobp,	
						 "monthfeepay"     =>$monthfeepay,	
						 "feecons"    =>$feecons,
						  "doblast"     =>$doblast,
						   "datestuck"     =>$datestuck,
						  "attendance"    =>$attendance,
						  "sissuecetrti"     =>$sissuecetrti,
						 "rls"     =>$rls,	
						 
						 "ncc"     =>$ncc,	
						 "games"     =>$games,	
						 "acharge"    =>$acharge,
						  "exam_date"     =>$exam_date,
						  
					 "created_on" =>date("Y-m-d"),
					       );
					  $db->insert("es_transferstudent",$message_arr);
					  header("location:?pid=98&action=list&emsg=1");	
       }
    }
}



if($action=='edit'){
	
	$sem_det = $db->getrow("SELECT * FROM es_preadmission WHERE es_preadmissionid=".$id);
	
	$sem_det1 = $db->getrow("SELECT * FROM es_transferstudent WHERE sno=".$id);
	
	 $sem_det2 = $db->getrow("SELECT * FROM subjects_cat WHERE classid=".$sem_det['pre_class']);

	
	

		if(isset($update) && $update!=""){

		/* if($es_classesid==''){ $errormessage['es_classesid'] = "Select The Class";}
	 if($es_preadmissionid==''){ $errormessage['es_preadmissionid'] = "Select Student Name";}*/
/* if($sno1==''){ $errormessage['sno1'] = "Enter Serial Number";}*/
//if($es_classesid==''){ $errormessage['es_classesid'] = "Select The Class";}
 //if($name==''){ $errormessage['name'] = "Enter Student Name";}
 
 if($gender==''){ $errormessage['gender'] = "Select Gender";}

 if($fname==''){ $errormessage['fname'] = "Enter Father Name";}
 if($nationality==''){ $errormessage['nationality'] = "Enter Nationality";}
 //if($sc==''){ $errormessage['sc'] = "Enter Whether the Pupil belong to scheduled caste or schedule tribe";}
/* if($dobw==''){ $errormessage['dobw'] = "Enter Date of birth According to admission Register";}*/
 if($dob1==''){ $errormessage['dob'] = "Enter Date Of Birth";}
 if($section==''){ $errormessage['section'] = "Enter Class / Section";}
 if($subject==''){ $errormessage['subject'] = "Enter subject studied information";}
 if($dobp==''){ $errormessage['dobp'] = "Date Of Promotion to the Class in";}
	 if($monthfeepay==''){ $errormessage['monthfeepay'] = "Enter Fees paid details";}
 if($exam_date==''){ $errormessage['exam_date'] = "Select Year";}
if($feecons==''){ $errormessage['feecons'] = "Enter whether the pupil was in receipt of any fee concession ";}
 if($doblast==''){ $errormessage['doblast'] = "Select Date Of Pupil's last attendance at the School";}
 if($datestuck==''){ $errormessage['datestuck'] = "Date on which he/she struck off the rolls of the School";}
 
 if($attendance==''){ $errormessage['attendance'] = "Enter Attendance during the period ";}
 if($sissuecetrti==''){ $errormessage['sissuecetrti'] = "Select Date Of Issue of this Certificate";}
 if($rls==''){ $errormessage['rls'] = "Enter Reasons for leaving the School";}


  
		if($dob1==''){ $errormessage['dob1'] = "Enter Student Date Of Birth";}
		
		
		$dob=func_date_conversion("d/m/Y","Y-m-d",$dob1);
	$dobp=func_date_conversion("d/m/Y","Y-m-d",$dobp);
	
	$sissuecetrti=func_date_conversion("d/m/Y","Y-m-d",$sissuecetrti);
	
	$doblast=func_date_conversion("d/m/Y","Y-m-d",$doblast);
	
	$datestuck=func_date_conversion("d/m/Y","Y-m-d",$datestuck);
	
	  $sem_det2 = "SELECT * FROM es_transferstudent WHERE sno=".$sno1;
	 $no_rec3 = sqlnumber($sem_det2);

	if(count($errormessage)==0){
	
	if($no_rec3==0)
	{
	
 $query="INSERT INTO es_transferstudent(sno,fname,nationality ,sc,dobw ,dob,class_name,subject,dobp,monthfeepay,feecons,doblast,conduct,datestuck,attendance,sissuecetrti,rls,ncc,games,acharge,exam_date,gender,section)VALUES('".$sno1."','".$fname."','".$nationality ."','".$sc ."','".$dobw  ."','".$dob ."','".$es_classesid."','".$subject."','".$dobp."','".$monthfeepay."','".$feecons."','".$doblast."','".$conduct."','".$datestuck."','".$attendance."','".$sissuecetrti."','".$rls."','".$ncc."','".$games."','".$acharge."','".$exam_date."','".$gender."','".$section."')";
	
	mysql_query($query);
		header("location:?pid=23&action=issuetcforstudent&emsg=2");
				exit;
				
	}
	else
	{
	if(count($errormessage)==0){
				$db->update("es_transferstudent","sno='".$sno1."',admissionno='".$admissionno."',fname='".$fname."',nationality ='".$nationality ."',sc ='".$sc ."',dobw  ='".$dobw  ."',dob  ='".$dob ."',subject='".$subject."',dobp='".$dobp."',monthfeepay='".$monthfeepay."',feecons='".$feecons."',doblast='".$doblast."',conduct='".$conduct."',datestuck='".$datestuck."',attendance='".$attendance."'
				,rls='".$rls."',ncc='".$ncc."',games='".$games."',acharge='".$acharge."',exam_date='".$exam_date."',gender='".$gender."',section='".$section."',sissuecetrti='".$sissuecetrti."'","id=".$id);
			
	
	}
				
				header("location:?pid=23&action=issuetcforstudent&emsg=2");
				exit;
			}
		
		
	
		}
		
	
		
}
$sno1 = $sem_det['sno'];
		$admissionno = $sem_det['admissionno'];
		$name = $sem_det['name'];
		$fname  = $sem_det['fname'];
		$nationality = $sem_det1['nationality'];
		$sc  = $sem_det1['sc'];
		$dobw  = $sem_det1['dobw'];
		$dob1  = func_date_conversion("Y-m-d","d/m/Y",$sem_det1['dob1']);
	$class_name = $sem_det['class_name'];
		$subject = $sem_det1['subject'];
		$dobp  = func_date_conversion("Y-m-d","d/m/Y",$sem_det1['dobp']);
		$monthfeepay = $sem_det1['monthfeepay'];
		$feecons  = $sem_det1['feecons'];
		$doblast  = func_date_conversion("Y-m-d","d/m/Y",$sem_det1['doblast']);
		$datestuck  = func_date_conversion("Y-m-d","d/m/Y",$sem_det1['datestuck']);
		$attendance  = $sem_det1['attendance'];
		$sissuecetrti  = func_date_conversion("Y-m-d","d/m/Y",$sem_det['sissuecetrti']);
		$rls  = $sem_det1['rls'];
		$ncc = $sem_det1['ncc'];
		$games = $sem_det1['games'];
		$conduct  = $sem_det1['conduct'];
		$acharge = $sem_det1['acharge'];
		$exam_date  = $sem_det1['exam_date'];
		$gender  = $sem_det['gender'];
		$section  = $sem_det2['scat_name'];
$sem_det2['scat_name'];
}



if($action=='print_transfercertificate'){
	$candidate_det_01 = $db->getrow("SELECT * FROM es_transferstudent WHERE id=".$id);
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
