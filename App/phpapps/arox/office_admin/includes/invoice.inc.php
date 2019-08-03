<?php
sm_registerglobal('pid','action','submit','ids','class_id','student_id','Save','emsg');

/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
if(!isset($_SESSION['quantity']))
{
header('location: ?pid=99&action=inventory_reports&emsg=1');
exit;
}
$stu_inf_sql="SELECT pre_name, (SELECT es_classname FROM es_classes EC WHERE EC.es_classesid=EP.pre_class) AS CLASS, (SELECT section_name FROM es_sections ES, es_sections_student ESS WHERE ES.section_id=ESS.section_id AND ESS.student_id=".$_SESSION['student'].") AS SECTION FROM es_preadmission EP WHERE EP.es_preadmissionid=".$_SESSION['student'];
$stu_inf_res=$db->getRow($stu_inf_sql);

$items_list=$db->getRows("SELECT * FROM es_in_item_master");
foreach($items_list as $each_item)
{
$items_array[$each_item['es_in_item_masterid']]=$each_item['in_item_name'];
}
if(isset($Save) && $Save != ''){
$today=date('Y-m-d');
$pay_sql="INSERT INTO es_stationary_payment (`student_id`,`invoice_no`,`total_amount`,`saled_date`)
	 VALUES('".$_SESSION['student']."','".$_SESSION['invoice_no']."','".array_sum($_SESSION['total'])."','".$today."')";
mysql_query($pay_sql);
$pay_id=mysql_insert_id();
foreach($_SESSION['quantity'] as $k=>$v){
$stationary_sql="INSERT INTO es_stationary (`student_id`,`item_id`,`st_pay_id`,`item_qty`,`invoice_no`,`total_amount`,`created_on`)
	 VALUES('".$_SESSION['student']."','".$k."','".$pay_id."','".$v."','".$_SESSION['invoice_no']."','".array_sum($_SESSION['total'])."','".$today."')";
	
	 mysql_query($stationary_sql);
$db->update('es_in_item_master', "in_qty_available =in_qty_available -".$v."", 'es_in_item_masterid ='.$k);
}


header('location: ?pid=101&emsg=1');
//header("window.open('?pid=101&action=print',null, 'width=700,height=700,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30')");
}
$academic_sql="SELECT fi_startdate , fi_enddate  FROM es_finance_master WHERE es_finance_masterid =".$_SESSION['eschools']['es_finance_masterid'];
$academic_det=$db->getRow($academic_sql);
?>