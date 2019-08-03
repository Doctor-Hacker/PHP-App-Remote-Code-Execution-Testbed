<?php
sm_registerglobal('pid', 'action', 'start','castes_id','addcaste','emsg','castes','page','inst_id','inst_name','tr_place_id','place_name','subject_cat','classid','subject_id_array','scat_name','scat_id','class','q_limit');

if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
		header('location: ./?pid=1&unauth=0');
		exit;
	}
if($page=='castecategory')
{


if($action=='delete')
{
$db->delete('tbl_castes','castes_id='.$castes_id);
header('location: ?pid=121&page=castecategory&emsg=3');
exit;
}
if(isset($addcastes))
{
if(!isset($castes) || $castes=='')
{
$errormessage[0]='Enter Castes ';
}
elseif($caste!='')
{
if($addcaste=='Submit')
{
$count_rows=$db->getOne('SELECT COUNT(*) FROM tbl_castes WHERE castes="'.$castes.'"');
}
if($addcaste=='Update')
{
$count_rows=$db->getOne('SELECT COUNT(*) FROM tbl_castes WHERE castes="'.$castes.'" AND castes_id!='.$castes_id);
}
if($count_rows>0)
{
$errormessage[0]='Caste already exist';
}
}
if(count($errormessage)==0)
{
$today=date('Y-m-d');
if($addcaste=='Submit')
{
$caste_array=array('castes'=>$castes,
'created_date'=>$today
);
//array_print($caste_array);
$db->insert('tbl_castes',$caste_array);
header('location: ?pid=121&page=castecategory&emsg=1');
exit;
}
if($addcaste=='Update')
{
$db->update('tbl_castes',"castes='".$castes."',created_date='".$today."'",'castes_id='.$castes_id);
header('location: ?pid=121&page=castecategory&emsg=2');
exit;
}
}
}
if($action=='edit')
{
$caste_det=$db->getRow("SELECT * FROM tbl_castes WHERE castes_id=".$castes_id);
 if(!isset($_REQUEST['caste']))
	 {
	 $caste=$caste_det['castes'];
	 }

}
$caste_array=$db->getRows("SELECT * FROM tbl_castes ORDER BY castes_id");
}
if($page=='int')
{

if($action=='delete')
{
$db->delete('es_institutes','inst_id='.$inst_id);
header('location: ?pid=121&page=int&emsg=3');
exit;
}
if(isset($addcaste))
{
if(!isset($inst_name) || $inst_name=='')
{
$errormessage[0]='Enter Institute';
}
elseif($inst_name!='')
{
if($addcaste=='Submit')
{
$count_rows=$db->getOne('SELECT COUNT(*) FROM es_institutes WHERE inst_name="'.$inst_name.'"');
}
if($addcaste=='Update')
{
$count_rows=$db->getOne('SELECT COUNT(*) FROM es_institutes WHERE inst_name="'.$inst_name.'" AND inst_id!='.$inst_id);
}
if($count_rows>0)
{
$errormessage[0]='Institute already exist';
}
}
if(count($errormessage)==0)
{
$today=date('Y-m-d');
if($addcaste=='Submit')
{
$caste_array=array('inst_name'=>$inst_name,
'created_date'=>$today
);
//array_print($caste_array);
$db->insert('es_institutes',$caste_array);
header('location: ?pid=121&page=int&emsg=1');
exit;
}
if($addcaste=='Update')
{
$db->update('es_institutes',"inst_name='".$inst_name."',created_date='".$today."'",'inst_id='.$inst_id);
header('location: ?pid=121&page=int&emsg=2');
exit;
}
}
}
if($action=='edit')
{
$caste_det=$db->getRow("SELECT * FROM es_institutes WHERE inst_id=".$inst_id);
 if(!isset($_REQUEST['inst_name']))
	 {
	 $inst_name=$caste_det['inst_name'];
	 }

}
$q_limit  = PAGENATE_LIMIT;
if ( !isset($start))$start = 0;
$caste_array=$db->getRows("SELECT * FROM es_institutes ORDER BY inst_id limit $start , $q_limit");
$no_rows =$db->getOne("select count(*) from es_institutes ORDER BY inst_id");

}
if($page=='transport')
{


if($action=='delete')
{
$db->delete('es_transport_places','tr_place_id='.$tr_place_id);
header('location: ?pid=94&page=transport&emsg=3');
exit;
}
if(isset($addcaste))
{
if(!isset($place_name) || $place_name=='')
{
$errormessage[0]='Enter Pick-up point';
}
elseif($place_name!='')
{
if($addcaste=='Submit')
{
$count_rows=$db->getOne('SELECT COUNT(*) FROM es_transport_places WHERE place_name="'.$place_name.'"');
}
if($addcaste=='Update')
{
$count_rows=$db->getOne('SELECT COUNT(*) FROM es_transport_places WHERE place_name="'.$place_name.'" AND tr_place_id!='.$tr_place_id);
}
if($count_rows>0)
{
$errormessage[0]='Pick-up point already exist';
}
}
if(count($errormessage)==0)
{
$today=date('Y-m-d');
if($addcaste=='Submit')
{
$caste_array=array('place_name'=>$place_name,
'created_date'=>$today
);
//array_print($caste_array);
$db->insert('es_transport_places',$caste_array);
//header('location: ?pid=94&page=transport&emsg=1');
exit;
}
if($addcaste=='Update')
{
$db->update('es_transport_places',"place_name='".$place_name."',created_date='".$today."'",'tr_place_id='.$tr_place_id);
//header('location: ?pid=94&page=transport&emsg=2');
exit;
}
}
}
if($action=='edit')
{
$caste_det=$db->getRow("SELECT * FROM es_transport_places WHERE tr_place_id=".$tr_place_id);
 if(!isset($_REQUEST['place_name']))
	 {
	 $place_name=$caste_det['place_name'];
	 }

}
$caste_array=$db->getRows("SELECT * FROM es_transport_places ORDER BY tr_place_id");
}
if($page=='subject')
{
if($action=='delete')
{
$db->delete('subjects_cat','scat_id='.$scat_id);
header('location: ?pid=121&page=subject&emsg=3&action=list');
exit;
}
if(isset($subject_cat))
{
if(empty($classid))
{
$errormessage[0]='Select Class';
}
if(count($subject_id_array)==0)
{
$errormessage[1]='Select Atleast One Subject';
}
if(empty($scat_name))
{
$errormessage[2]='Enter Category';
}
if(!empty($scat_name) && !empty($classid))
{
if($subject_cat=='Submit')
{
$count=$db->getOne('SELECT COUNT(*) FROM subjects_cat WHERE scat_name="'.$scat_name.'" AND classid="'.$classid.'"');
}
elseif($subject_cat=='Update')
{
$count=$db->getOne('SELECT COUNT(*) FROM subjects_cat WHERE scat_name="'.$scat_name.'" AND classid="'.$classid.'" AND scat_id!='.$scat_id);
}
if($count>0)
{
$errormessage[2]="Category Already Exist";
}
}
if(count($errormessage)==0)
			{
				$date=date('Y-m-d');
				if($subject_cat=='Submit')
				{
				$insert_array=array('classid'=>$classid,
									'subject_id_array'=>implode('@#@#@',$subject_id_array),
									'scat_name'=>$scat_name,
									'created_date'=>$date
									);
					$db->insert('subjects_cat',$insert_array);
					//header('location: ?pid=94&page=subject&emsg=1&action=list');
					exit;
				}
				if($subject_cat=='Update')
				{
				$db->update('subjects_cat','subject_id_array="'.implode('@#@#@',$subject_id_array).'",scat_name="'.$scat_name.'",created_date="'.$date.'"','scat_id='.$scat_id);
					//header('location: ?pid=94&page=subject&emsg=2&action=list');
					exit;
				}

}
}
if($action=='edit')
{

  $sub_det=$db->getRow('SELECT * FROM subjects_cat SC,es_classes EC WHERE SC.scat_id='.$scat_id);
	$classid=$sub_det['classid'];
	if(!$_POST)
	{
	$subject_id_array=explode('@#@#@',$sub_det['subject_id_array']);
	$scat_name=$sub_det['scat_name'];
	}
}
if($action=='list')
{
$condition='';
if(isset($class) && $class!='')
{
$condition=" AND SC.classid='".$class."'";
}
else
{
$class=1;
$condition=" AND SC.classid='1'";
}
$list_cat=$db->getRows('SELECT * FROM subjects_cat SC,es_classes EC WHERE SC.classid=EC.es_classesid '.$condition.' ORDER BY SC.scat_id DESC');
}
}


?>
