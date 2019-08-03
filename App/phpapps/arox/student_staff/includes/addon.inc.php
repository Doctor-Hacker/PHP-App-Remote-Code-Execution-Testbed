<?php
sm_registerglobal('pid','action','start');
checkuserinlogin();

if($_SESSION['eschools']['login_type']=='student')
{
$qurey="SELECT * FROM es_addon_modules WHERE v_student='Y' ORDER BY addon_id DESC";
}
if($_SESSION['eschools']['login_type']=='staff')
{
$qurey="SELECT * FROM es_addon_modules WHERE v_staff='Y' ORDER BY addon_id DESC";
}
$num_rows=sqlnumber($qurey);
if(!isset($start) || $start==""  || $num_rows<$start){$start=0;}
$q_limit=10;
 $qurey.=" LIMIT ".$start.",".$q_limit;
$list_addon=$db->getRows($qurey);
//array_print($list_addon);
?>