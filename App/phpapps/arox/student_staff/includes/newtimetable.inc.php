<?php 
sm_registerglobal('pid', 'action', 'start','emsg','submit_time','submit_time_table');
checkuserinlogin();
if($_SESSION['eschools']['login_type']=='student')
{
$class_id=$db->getRow("SELECT pre_class FROM es_preadmission WHERE es_preadmissionid=".$_SESSION['eschools']['user_id']);
$student_class=$class_id['pre_class'];
}
 if($action=='time_table' || $action=='print_time_table'){
$time_periods=$db->getRows("SELECT * FROM time_period ORDER BY period_id");
if(is_array($time_periods))
{
foreach($time_periods as $each_time)
{
if($each_time['from_p']!='' && $each_time['to_p']!='')
$durations[$each_time['period_id']]=$each_time['from_p'].' TO '.$each_time['to_p'];
}
}
$class_array=$db->getRows("SELECT * FROM es_classes ORDER BY es_classesid");

$subjects_array=$db->getRows("SELECT * FROM es_subject ORDER BY es_subjectshortname,es_subjectid");
if(is_array($subjects_array))
{
foreach($subjects_array as $each_subject)
{
$subject[$each_subject['es_subjectshortname']][$each_subject['es_subjectid']]=$each_subject['es_subjectname'];
$subject_name[$each_subject['es_subjectid']]=$each_subject['es_subjectname'];
}
}
$staff_array=$db->getRows("SELECT * FROM es_staff WHERE teach_nonteach='teaching'");
if(is_array($staff_array))
{
foreach($staff_array as $each_staff)
{
$staff_name[$each_staff['es_staffid']]=$each_staff['st_firstname']."&nbsp;".$each_staff['st_lastname'];
}
}

$toatl_time_table=$db->getRows("SELECT * FROM es_new_timetable ");
if(is_array($toatl_time_table))
{
foreach($toatl_time_table as $each_total_table)
{
$subject_selected[$each_total_table['class_id']][$each_total_table['period_id']]=$each_total_table['subject_id'];
$staff_selected[$each_total_table['class_id']][$each_total_table['period_id']]=$each_total_table['staff_id'];
$staff_free[$each_total_table['period_id']][]=$each_total_table['staff_id'];
}
}

for($i=1;$i<=8;$i++)
		{
		if($i!=5)
		{
		$rev_staff=array_flip($staff_name);
if(count($staff_free[$i])>0)
{
$free_staff[$i]=array_diff($rev_staff,$staff_free[$i]);
}
}
}
for($i=1;$i<=8;$i++)
		{
		if(count($free_staff[$i])>0 && $i!=5)
$final_free_staff[$i]=array_flip($free_staff[$i]);
}
}
//array_print($final_free_staff);
?>
