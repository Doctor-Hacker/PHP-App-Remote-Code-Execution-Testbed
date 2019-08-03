<?php
sm_registerglobal('pid', 'action', 'start','section_id','section_name','emsg','addsection');
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
		header('location: ./?pid=1&unauth=0');
		exit;
	}
if($action=='delete')
{
$db->delete('es_sections','section_id='.$section_id);
header('location: ?pid=97&action=list&emsg=3');
exit;
}
if(isset($addsection))
{
if(!isset($section_name) || $section_name=='')
{
$errormessage[0]='Enter Section Name';
}
elseif($section_name!='')
{
if($addsection == 'Submit')
{
$count_rows=$db->getOne('SELECT COUNT(*) FROM es_sections WHERE section_name="'.$section_name.'"');
}
if($addcaste=='Update')
{
$count_rows=$db->getOne('SELECT COUNT(*) FROM es_sections WHERE section_name="'.$section_name.'" AND section_id!='.$section_id);
}
if($count_rows>0)
{
$errormessage[0]='Section already exist';
}
}
if(count($errormessage)==0)
{
$today=date('Y-m-d');
if($addsection=='Submit')
{
$caste_array=array(
		'section_name'	=>$section_name,
		'created_on'	=>$today
		);
//array_print($caste_array);
$db->insert('es_sections',$caste_array);
header('location: ?pid=97&action=list&emsg=1');
exit;
}
if($addsection=='Update')
{
$vlc = new FormValidation();
	$query="SELECT * FROM es_sections WHERE section_name ='".$section_name."'";
	 $no_rows = sqlnumber($query);
	if($no_rows<=0){
$db->update('es_sections',"section_name='".$section_name."',created_on='".$today."'",'section_id='.$section_id);
header('location: ?pid=97&action=list&emsg=2');
exit;}else{$errormessage[0]="Section already exist";}

}
}
}
if($action=='edit')
{
	$section_det=$db->getRow("SELECT * FROM es_sections WHERE section_id=".$section_id);
	$section_name=$section_det['section_name'];
}
$sections_array=$db->getRows("SELECT * FROM es_sections ORDER BY section_id");


?>
