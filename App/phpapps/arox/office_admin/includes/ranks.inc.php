<?php
sm_registerglobal('pid', 'action', 'start','classid','section_id','exam_id','search_record','action','academicyear');
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
		header('location: ./?pid=1&unauth=0');
		exit;
	}
$each_subject_array=array();
$each_get_array=array();
$student_marks=array();
$from_acad = $_SESSION['eschools']['from_acad'];
	$to_acad   = $_SESSION['eschools']['to_acad'];
	$school_details_sel = "SELECT * FROM `es_finance_master` ORDER BY `es_finance_masterid` DESC";
	$school_details_res = getamultiassoc($school_details_sel);

$class_array=$db->getRows("SELECT * FROM es_classes ORDER BY es_classesid ASC");
if(is_array($class_array))
{
foreach($class_array as $each_class)
{
$array_class[$each_class['es_classesid']]=$each_class['es_classname'];
}
}
$pageurl='';
if((isset($search_record) && $search_record=='Submit') )
{

if(empty($classid))
{

$errormessage[0]="Select Class";
}
else
{
$pageurl.="&classid=".$classid;
}
if(empty($exam_id))
{

$errormessage[1]="Select Exam";
}
else
{
$pageurl.="&exam_id=".$exam_id;
}
$condition='';
if(isset($academicyear) && $academicyear!='')
{
$condition=" AND EEA.academic_year='".$academicyear."'";
$pageurl.="&academicyear=".$academicyear;
}
else
{
$condition=" AND EEA.academic_year='".$from_acad.$to_acad."'";
$pageurl.="&academicyear=".$from_acad.$to_acad;
}
if(count($errormessage)==0)
{
		if(isset($classid))
		{
		$subject_array=$db->getRows("SELECT * FROM es_subject WHERE es_subjectshortname='".$classid."'");
		
		if(is_array($subject_array))
		{
		foreach($subject_array as $each_subject)
		{
		$array_subject[$each_subject['es_subjectid']]=$each_subject['es_subjectname'];
		}
		}
		$roll_array=$db->getRows("SELECT * FROM es_sections_student WHERE course_id='".$classid."' ORDER BY roll_no ASC"); 
		if(is_array($roll_array))
		{
		foreach($roll_array as $each_rool)
		{
		$array_rool[$each_rool['student_id']]=$each_rool['roll_no'];
		}
		}
		$student_array=$db->getRows("SELECT * FROM es_preadmission WHERE pre_class='".$classid."' and status!='inactive' ORDER BY es_preadmissionid ASC");
		
		if(is_array($student_array))
		{
		foreach($student_array as $each_student)
		{
		$array_student[$each_student['es_preadmissionid']]=$each_student['pre_name'];
		//echo "SELECT * FROM es_subject ES,es_exam EE,es_exam_academic EEA,es_exam_details EED,es_marks EM WHERE EM.es_marksstudentid='".$each_student['es_preadmissionid']."' AND ES.es_subjectid=EED.subject_id AND EE.es_examid=EEA.exam_id AND EED.academicexam_id=EEA.es_exam_academicid AND EED.es_exam_detailsid=EM.es_examdetailsid AND EEA.class_id='".$classid."' AND EE.es_examid='".$exam_id."' ".$condition."  ORDER BY EM.es_marksstudentid";
		
		$exam_mark=$db->getRows("SELECT * FROM es_subject ES,es_exam EE,es_exam_academic EEA,es_exam_details EED,es_marks EM WHERE EM.es_marksstudentid='".$each_student['es_preadmissionid']."' AND ES.es_subjectid=EED.subject_id AND EE.es_examid=EEA.exam_id AND EED.academicexam_id=EEA.es_exam_academicid AND EED.es_exam_detailsid=EM.es_examdetailsid AND EEA.class_id='".$classid."' AND EE.es_examid='".$exam_id."' ".$condition."  ORDER BY EM.es_marksstudentid");
		$student_marks[$each_student['es_preadmissionid']]=$exam_mark;
	}
		}
		}
		//array_print($student_marks);
		//exit;
		foreach($student_marks as $each_student1)
		{
		foreach($each_student1 as $each_student)
		{
		$each_subject_array[$each_student['es_marksstudentid']][]=$each_student['total_marks'];
		$each_get_array[$each_student['es_marksstudentid']]['get_marks'][$each_student['subject_id']]=$each_student['es_marksobtined'];
		//$each_subject_array[$each_student['es_marksstudentid']][$each_student['subject_id']]['subject_name']=$each_student['es_subjectname'];
		}
		}
		if(is_array($student_array))
		{
		$rank_1[0]=0;
		foreach($student_array as $each_student)
		{
		if(is_array($each_get_array[$each_student['es_preadmissionid']]['get_marks']))
		{
		$rank_1[]=array_sum($each_get_array[$each_student['es_preadmissionid']]['get_marks']);
		}
		}
		}
		if(is_array($rank_1))
		{
		$rank_keys=array_keys($rank_1);
		$rank_values=array_values($rank_1);
		arsort($rank_values);
		$result_ranks=array_values($rank_values);
		$results=array_flip(array_keys(array_flip($result_ranks)));
		//array_print($results);
		//exit;
		}
}
}
if($action=='print')
{
$condition='';
if(isset($academicyear))
{
$condition=" AND EEA.academic_year='".$academicyear."'";
//$pageurl.="&academicyear=".$academicyear;
}

		if(isset($classid))
		{
		$subject_array=$db->getRows("SELECT * FROM es_subject WHERE es_subjectshortname='".$classid."'");
		
		if(is_array($subject_array))
		{
		foreach($subject_array as $each_subject)
		{
		$array_subject[$each_subject['es_subjectid']]=$each_subject['es_subjectname'];
		}
		}
		$roll_array=$db->getRows("SELECT * FROM es_sections_student WHERE course_id='".$classid."' ORDER BY roll_no ASC"); 
		if(is_array($roll_array))
		{
		foreach($roll_array as $each_rool)
		{
		$array_rool[$each_rool['student_id']]=$each_rool['roll_no'];
		}
		}
		$student_array=$db->getRows("SELECT * FROM es_preadmission WHERE pre_class='".$classid."'  and status!='inactive' ORDER BY es_preadmissionid ASC");
		
		if(is_array($student_array))
		{
		foreach($student_array as $each_student)
		{
		$array_student[$each_student['es_preadmissionid']]=$each_student['pre_name'];
		//echo "SELECT * FROM es_subject ES,es_exam EE,es_exam_academic EEA,es_exam_details EED,es_marks EM WHERE EM.es_marksstudentid='".$each_student['es_preadmissionid']."' AND ES.es_subjectid=EED.subject_id AND EE.es_examid=EEA.exam_id AND EED.academicexam_id=EEA.es_exam_academicid AND EED.es_exam_detailsid=EM.es_examdetailsid AND EEA.class_id='".$classid."' AND EE.es_examid='".$exam_id."' ORDER BY EM.es_marksstudentid";
		
		$exam_mark=$db->getRows("SELECT * FROM es_subject ES,es_exam EE,es_exam_academic EEA,es_exam_details EED,es_marks EM WHERE EM.es_marksstudentid='".$each_student['es_preadmissionid']."' AND ES.es_subjectid=EED.subject_id AND EE.es_examid=EEA.exam_id AND EED.academicexam_id=EEA.es_exam_academicid AND EED.es_exam_detailsid=EM.es_examdetailsid AND EEA.class_id='".$classid."' AND EE.es_examid='".$exam_id."'".$condition." ORDER BY EM.es_marksstudentid");
		$student_marks[$each_student['es_preadmissionid']]=$exam_mark;
	}
		}
		}
		//array_print($student_marks);
		//exit;
		foreach($student_marks as $each_student1)
		{
		foreach($each_student1 as $each_student)
		{
		$each_subject_array[$each_student['es_marksstudentid']][]=$each_student['total_marks'];
		$each_get_array[$each_student['es_marksstudentid']]['get_marks'][$each_student['subject_id']]=$each_student['es_marksobtined'];
		//$each_subject_array[$each_student['es_marksstudentid']][$each_student['subject_id']]['subject_name']=$each_student['es_subjectname'];
		}
		}
		if(is_array($student_array))
		{
		$rank_1[0]=0;
		foreach($student_array as $each_student)
		{
		if(is_array($each_get_array[$each_student['es_preadmissionid']]['get_marks']))
		{
		$rank_1[]=array_sum($each_get_array[$each_student['es_preadmissionid']]['get_marks']);
		}
		}
		}
		if(is_array($rank_1))
		{
		$rank_keys=array_keys($rank_1);
		$rank_values=array_values($rank_1);
		arsort($rank_values);
		$result_ranks=array_values($rank_values);
		$results=array_flip(array_keys(array_flip($result_ranks)));
		//array_print($results);
		//exit;
		}

}
?>
