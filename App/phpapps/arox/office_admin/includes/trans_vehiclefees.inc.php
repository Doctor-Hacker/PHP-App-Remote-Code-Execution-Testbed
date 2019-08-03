<?php   
        sm_registerglobal('pid', 
						  'action',					
						  'status',				
						  'start',
						  'boardtitle',	
						  'board_capacity',	
						  'route_id',
						  'addboard',
						  'updateboard',
						  'id',
						  'financial_year',
						  'classid',
						  'updatefee',
						  'emsg'					
						 );
						  
/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
$html_obj = new html_form();
$vlc = new FormValidation();

	$fyear_sql = "SELECT *FROM `es_finance_master`  ORDER BY `es_finance_masterid` DESC LIMIT 0 , 1";
	$fyear_row = getarrayassoc($fyear_sql);
	
	$class_sql = "SELECT * FROM es_classes";
	$class_exe = mysql_query($class_sql);
	while($class_row = mysql_fetch_array($class_exe)){
	$class_array[$class_row['es_classesid']]=$class_row['es_classname'];
	}
	
	$finance_sql = "SELECT * FROM es_finance_master";
	$finance_exe = mysql_query($finance_sql);
	while($finance_row = mysql_fetch_array($finance_exe)){
	$finance_array[$finance_row['es_finance_masterid']]=$finance_row['fi_startdate']." - ".$finance_row['fi_enddate'] ;
	}








if(isset($action) && $action == "vehiclefees"){	
	
	if($_GET['financial_year']!=""){ $financial_year_new=$_GET['financial_year'];}
	if($_POST['financial_year']!=""){ $financial_year_new=$_POST['financial_year'];}
	if($_POST['financial_year']=="" && $_GET['financial_year']=="" && $fyear_row['es_finance_masterid']!=""){ $financial_year_new=$fyear_row['es_finance_masterid'];}
}


if($action=="editfee"){
	$fee_edit_sql="SELECT * FROM es_trans_fee_details WHERE financial_year=".$financial_year." AND class_id=".$classid;
	$fee_edit_row=$db->getRow($fee_edit_sql);
	
	if(isset($updatefee) && $updatefee!=""){ 
	
	if (isset($_POST['fee_amount']) && !$vlc->is_nonNegNumber($_POST['fee_amount'])) {
		//$errormessage[0]="Enter Amount"; 
		}
		if(count($errormessage)==0){
		$fee_sql="SELECT * FROM es_trans_fee_details WHERE class_id=".$_POST['fee_class']." AND financial_year=".$_POST['fee_financial_year'];
		$fee_exe=mysql_query($fee_sql);
		$fee_num=mysql_num_rows($fee_exe);
		if($fee_num==1){
		$sql="UPDATE es_trans_fee_details SET amount='".round((float)$_POST['fee_amount'],2)."' WHERE class_id=".$_POST['fee_class']." AND financial_year=".$_POST['fee_financial_year'];
		mysql_query($sql);
		
		$id_sql="SELECT * FROM es_trans_fee_details WHERE class_id=".$_POST['fee_class']." AND financial_year=".$_POST['fee_financial_year'];
		$id_exe=mysql_query($id_sql);
		$id_row=mysql_fetch_array($id_exe);
		
		
		$query_log_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) 
		VALUES ('".$_SESSION['eschools']['admin_id']."','es_trans_fee_details','Transport','Vehicle Fees','".$id_row['id']."','UPDATE VEHICLE FEE TO CLASSES','".$_SERVER['REMOTE_ADDR']."',NOW())";
		mysql_query($query_log_sql);
		
		}else{
			$sql="INSERT INTO es_trans_fee_details (`class_id`,`amount`,`installment_type`,`financial_year`) VALUES ('".$_POST['fee_class']."','".round($_POST['fee_amount'],2)."','monthly','".$_POST['fee_financial_year']."')";
			mysql_query($sql);
		}
		header('location:?pid=78&action=vehiclefees&financial_year='.$_POST['fee_financial_year']."&emsg=2");
		}
	}
}
?>


