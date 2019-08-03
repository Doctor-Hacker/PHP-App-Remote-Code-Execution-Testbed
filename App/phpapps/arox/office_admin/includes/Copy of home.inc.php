<?php 
include_once (INCLUDES_CLASS_PATH . DS . 'class.es_preadmission.php');
sm_registerglobal('pid', 'action','update','column_name','start','asds_order','submit','search','Submit','Search','pre_class','pre_year');

if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
$q= $_SESSION['eschools']['from_acad'];
if($action=='birthday_students'){


} 

 $today = date("Y-m-d");
list($year, $month) = explode('-', date('Y-n'));

 $date = getdate();
 $year = $date['year'];
echo $month = $date['mon'];exit;



  echo $sql_todaybirth = "SELECT *  FROM es_preadmission  WHERE  pre_status!= 'inactive' AND status !='inactive'  ORDER BY pre_class ASC";
 
//$sql_todaybirth = "SELECT *  FROM es_preadmission  WHERE  pre_status!= 'inactive' AND status !='inactive'  ORDER BY pre_class ASC"AND pre_dateofbirth = '".$month."';
?>