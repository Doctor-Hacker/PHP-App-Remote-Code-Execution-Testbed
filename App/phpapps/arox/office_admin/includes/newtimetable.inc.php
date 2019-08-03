<?php 
sm_registerglobal('pid', 'action', 'start','emsg','submit_time','submit_time_table','staff_id','staff_time');
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
if($action=='addtmimes')
{
if(isset($submit_time)&& $submit_time=='Submit')
{
$j=0;
for($i=1;$i<=8;$i++)
{
if($_POST['f'.$i]=='' && $_POST['f'.$i]=='')
{
$j++;
}
if($_POST['f'.$i]!='')
{
if($_POST['t'.$i]=='')
{
$errormessage[0]='Eneter End Time Of the Period';
}
}
}
if($j==8)
{
$errormessage[0]='Enter one Period Duration Must';
}
if(count($errormessage)==0)
{

for($i=1;$i<=8;$i++)
{
$per_count=$db->getOne("SELECT COUNT(*) FROM time_period WHERE period_id=".$i);
if($per_count>0)
{
$db->update('time_period',"from_p='".$_POST['f'.$i]."',to_p='".$_POST['t'.$i]."'",'period_id='.$i);
}
elseif($per_count==0)
{
if($_POST['f'.$i]!='' && $_POST['t'.$i]!='')
{
$time_array=array(
'period_id'=>$i,
'from_p'=>$_POST['f'.$i],
'to_p'=>$_POST['t'.$i]
);
$time_array=stripslashes_deep($time_array);
$db->insert('time_period',$time_array);
}
}
}

header('location: ?pid='.$pid."&action=".$action."&emsg=76");
}
}

$time_period=$db->getRows("SELECT * FROM time_period");
if(is_array($time_period))
{
foreach($time_period as $each_time)
{
$_POST['f'.$each_time['period_id']]=$each_time['from_p'];
$_POST['t'.$each_time['period_id']]=$each_time['to_p'];
}
}
}
?>
<?php if($action=='timetable' || $action=='print_time_table'){
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
if(is_array($class_array))
{
foreach($class_array as $each_class_name)
{
$class_name[$each_class_name['es_classesid']]=strtoupper($each_class_name['es_classname']);
}
}
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

if(isset($submit_time_table)&& $submit_time_table=='Submit')
{		
$j=0;
		 foreach($class_array as $each_class)
		{
		for($i=1;$i<=8;$i++)
		{
		if($i!=5)
		{
		$subject_selected[$each_class['es_classesid']][$i]=$_POST['subject_selected'][$each_class['es_classesid']][$i];
		$staff_selected[$each_class['es_classesid']][$i]=$_POST['staff_selected'][$each_class['es_classesid']][$i];
		if($_POST['staff_selected'][$each_class['es_classesid']][$i]=='' && $_POST['subject_selected'][$each_class['es_classesid']][$i]=='')
		{
		$j++;
		}
		if($_POST['subject_selected'][$each_class['es_classesid']][$i]!='')
		{
		if($_POST['staff_selected'][$each_class['es_classesid']][$i]=='')
		{
		$errormessage['staff_error'.$each_class['es_classesid'].$i]="Select Staff For Period&nbsp;".$i."&nbsp;in Class&nbsp;".$class_name[$each_class['es_classesid']];
		}
		}
		elseif($_POST['staff_selected'][$each_class['es_classesid']][$i]!='')
		{
		if($_POST['subject_selected'][$each_class['es_classesid']][$i]=='')
		{
		$errormessage['subject_error'.$each_class['es_classesid'].$i]="Select Subject For Period&nbsp;".$i."&nbsp;in Class&nbsp;".$class_name[$each_class['es_classesid']];
		}
		}
		}
		}
		
		}
		for($i=1;$i<=8;$i++)
		{
		$c=1;
		$x='somthing_staff';
		foreach($class_array as $each_class)
		{
		if($c==1 && $_POST['staff_selected'][$each_class['es_classesid']][$i]!='')
		{
		$x=$_POST['staff_selected'][$each_class['es_classesid']][$i];
		$class_id=$each_class['es_classesid'];
		$c++;
		}
		elseif($x==$_POST['staff_selected'][$each_class['es_classesid']][$i])
		{
		$errormessage['assign_error'.$_POST['staff_selected'][$each_class['es_classesid']][$i].$each_class['es_classesid']]=$staff_name[$_POST['staff_selected'][$each_class['es_classesid']][$i]].' Already Assign To Class&nbsp;'.$class_name[$class_id].'&nbsp;in Period&nbsp;'.$i.' You Can\'t Assign To Class '.$class_name[$each_class['es_classesid']];
		}
		}
		}
		if($j==count($class_array)*(7))
		{
		$errormessage[0]="Please set Subject,Teacher For one Period";
		}
		if(count($errormessage)==0)
		{
		 foreach($class_array as $each_class)
		{
		for($i=1;$i<=8;$i++)
		{
		if($i!=5)
		{
		if($_POST['subject_selected'][$each_class['es_classesid']][$i] !='' && $_POST['staff_selected'][$each_class['es_classesid']][$i]!='')
		{
		$single_array[]="('".$each_class['es_classesid']."','".$i."','".$_POST['subject_selected'][$each_class['es_classesid']][$i]."','".$_POST['staff_selected'][$each_class['es_classesid']][$i]."')";
		}
		}
		}
		}
		mysql_query("TRUNCATE TABLE es_new_timetable");
		$fine_values=implode(',',$single_array);
		$x="INSERT INTO `es_new_timetable` (`class_id` ,`period_id` ,`subject_id` ,`staff_id`) VALUES ".$fine_values;
		mysql_query($x);
		header('location: ?pid=104&action=timetable&emsg=1');
		exit;
		}
}
if(!isset($submit_time_table))
{
$toatl_time_table=$db->getRows("SELECT * FROM es_new_timetable");
if(is_array($toatl_time_table))
{
foreach($toatl_time_table as $each_total_table)
{
$subject_selected[$each_total_table['class_id']][$each_total_table['period_id']]=$each_total_table['subject_id'];
$staff_selected[$each_total_table['class_id']][$each_total_table['period_id']]=$each_total_table['staff_id'];
$staff_free[$each_total_table['period_id']][]=$each_total_table['staff_id'];
}
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
if($action=='staff_wise' || $action=='print_staff')
{
	
$time_periods=$db->getRows("SELECT * FROM time_period ORDER BY period_id");
if(is_array($time_periods))
{
foreach($time_periods as $each_time)
{
if($each_time['from_p']!='' && $each_time['to_p']!='')
$durations[$each_time['period_id']]=$each_time['from_p'].' TO '.$each_time['to_p'];
}
}

$subjects_array=$db->getRows("SELECT * FROM es_subject ORDER BY es_subjectshortname,es_subjectid");
if(is_array($subjects_array))
{
foreach($subjects_array as $each_subject)
{
$subject[$each_subject['es_subjectshortname']][$each_subject['es_subjectid']]=$each_subject['es_subjectname'];
$subject_name[$each_subject['es_subjectid']]=$each_subject['es_subjectname'];
}
}

$class_array=$db->getRows("SELECT * FROM es_classes ORDER BY es_classesid");
if(is_array($class_array))
{
foreach($class_array as $each_class_name)
{
$class_name[$each_class_name['es_classesid']]=strtoupper($each_class_name['es_classname']);
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
if(isset($staff_time) && $staff_time!='')
{
if(empty($staff_id))
{
$errormessage[0]='Select Staff';
}
if(count($errormessage)==0)
{
$toatl_time_table=$db->getRows("SELECT * FROM es_new_timetable WHERE staff_id=".$staff_id);
if(is_array($toatl_time_table))
{
foreach($toatl_time_table as $each_total_table)
{
$subject_selected[$each_total_table['class_id']][$each_total_table['period_id']]=$each_total_table['subject_id'];
$staff_selected[$each_total_table['class_id']][$each_total_table['period_id']]=$each_total_table['staff_id'];
//$staff_free[$each_total_table['period_id']][]=$each_total_table['staff_id'];
}
}}
}
}

//array_print($final_free_staff);
?>
