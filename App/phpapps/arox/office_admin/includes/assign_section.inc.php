<?php
sm_registerglobal('pid','action','update','emsg','start','submit','redirecturl','sudent_id','es_classesid','roll_no','section_id','update');
/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}

$html_obj = new html_form();
$vlc = new FormValidation();
$finance_info  = getarrayassoc("SELECT *FROM `es_finance_master`  ORDER BY `es_finance_masterid` DESC LIMIT 0 , 1");	

$from_acad = $finance_info['fi_ac_startdate'];
		$to_acad   = $finance_info['fi_ac_enddate'];
//SECTION LIST
$sect_sql="SELECT * FROM es_sections";
$sect_det=$db->getRows($sect_sql);

/*if($action=='assign_section'){	
		$class_sql="SELECT * FROM es_classes ";
		$class_res=$db->getRows($class_sql);
		$con='';
		if(isset($es_classesid) && $es_classesid != ''){
		$con.=" AND EPD.pre_class=".$es_classesid;
		}
		
		$sql_qr = "SELECT EP.es_preadmissionid, EP.pre_student_username, (SELECT roll_no FROM es_sections_student ESS WHERE ESS.student_id=EP.es_preadmissionid AND ESS.course_id= EPD.pre_class) AS ROLL_NO, (SELECT section_student_id FROM es_sections_student ESS WHERE ESS.student_id=EP.es_preadmissionid AND ESS.course_id= EPD.pre_class) AS SECTION FROM es_preadmission EP , es_preadmission_details EPD  where EP.pre_status !='inactive' AND EPD.es_preadmissionid=EP.es_preadmissionid ".$con." ";
		
/*	echo	$sql_qr = "SELECT EP.es_preadmissionid, EP.pre_student_username, (SELECT roll_no FROM es_sections_student ESS WHERE ESS.student_id=EP.es_preadmissionid AND ESS.course_id= EPD.pre_class) AS ROLL_NO, (SELECT section_id FROM es_sections_student ESS WHERE ESS.student_id=EP.es_preadmissionid AND ESS.course_id= EPD.pre_class) AS SECTION FROM es_preadmission EP , es_preadmission_details EPD  where EP.pre_status !='inactive' AND EPD.es_preadmissionid=EP.es_preadmissionid ".$con." ";exit;
		$no_rec = sqlnumber($sql_qr);
		if(!isset($start)){$start=0;}
		$q_limit = 20;
		$sql_qr .=" ORDER BY es_preadmissionid ASC LIMIT ".$start.",".$q_limit."";
		$all_sem_det = $db->getrows($sql_qr);
		}*/
if($action=='assign_section'){
$class_sql="SELECT * FROM es_classes ";
		$class_res=$db->getRows($class_sql);
		$con='';
		if(isset($es_classesid) && $es_classesid != ''){
		$con.=" AND EPD.pre_class=".$es_classesid;
		}
		
		 $sql_qr = "SELECT EP.es_preadmissionid, EP.pre_student_username, (SELECT roll_no FROM es_sections_student ESS WHERE ESS.student_id=EP.es_preadmissionid) AS ROLL_NO, (SELECT section_student_id FROM es_sections_student ESS WHERE ESS.student_id=EP.es_preadmissionid ) AS SECTION FROM es_preadmission EP , es_preadmission_details EPD  where EP.pre_status !='inactive' AND EPD.es_preadmissionid=EP.es_preadmissionid   ".$con." AND  EP.pre_fromdate='".$from_acad."' AND EP.pre_todate=".$to_acad;

$sno=$sno+1;
if(isset($submit) && $submit!="" ){

	if($es_classesid == '' || !isset($es_classesid)){
	$errormessage[0]="Select Class";
	}
	
	//array_print($roll_no);
	//	array_print($section_id);exit;
	
	
	$vlc = new FormValidation();
	
	
	foreach($roll_no as $key=>$value){	
	if($value!=""){ $validation="yes";}
	}
	
	if ($validation=='') {
				$errormessage[0] = "Enter Roll Nunmber";
			}
			
	
	foreach($section_id as $key1=>$value1){	
	if($value1!=""){ $validation1="yes";}
	}
	
	if ($validation1=='') {
				$errormessage[1] = "Select Section";
			}
			
			
		/*			
			if (empty($roll_no)) {

				$errormessage[0] = "Enter Roll Nunmber";	  
			}	
						
			if (empty($section_id)) {
				$errormessage[0] = "Select Section";	  
			}	*/
		
	
	if(count($errormessage) == 0){
	 $stu_sql="SELECT * FROM es_sections_student";
	$stu_res=$db->getRows($stu_sql);
	   for($i=0;$i<count($sudent_id);$i++){
	   $stu_sql="SELECT * FROM es_sections_student WHERE student_id=".$sudent_id[$i]." AND year_id =".$_SESSION['eschools']['es_finance_masterid']."";
	    $num=sqlnumber($stu_sql);
	  if($num > 0){
	 
	   $db->update("es_sections_student","roll_no='".$roll_no[$i]."', section_id ='".$section_id[$i]."', course_id ='".$es_classesid."' ","student_id=".$sudent_id[$i]);
	   //$update_query="UPDATE es_sections_student SET roll_no='".$roll_no[$i]."',section_id =".$section_id[$i]." WHERE course_id =".$es_classesid." AND student_id=".$sudent_id[$i]."  ";
	// mysql_query($update_query);
	 //  $db->update("es_sections_student","roll_no='".$roll_no[$i]."', section_id =".$section_id[$i].", course_id =".$es_classesid." ","student_id=".$sudent_id[$i]);
	   }
	 else{
	    $message_arr = array( 
						  "student_id" 	=>$sudent_id[$i],	
						  "course_id"  	=>$es_classesid,	
						  "year_id"  	=>$_SESSION['eschools']['es_finance_masterid'],	
						  "roll_no"  	=>$roll_no[$i],
						  "section_id"  =>$section_id[$i]
						   );
					  $db->insert("es_sections_student",$message_arr);
			}
			
		}
		header("location:?pid=96&action=assign_section&emsg=1");
    }
	
	}
}

if($action=='print_sectionwise'){
	 $stu_sql="SELECT * FROM es_sections_student sc, es_preadmission pre, (SELECT EC.es_classname FROM es_classes EC WHERE EC.es_classesid=".$es_classesid.") AS CLASS WHERE sc.student_id= pre.es_preadmissionid AND sc.year_id =".$_SESSION['eschools']['es_finance_masterid']." AND sc.course_id='".$es_classesid."'";
	$student_det = $db->getrows($stu_sql);
	}

?>
