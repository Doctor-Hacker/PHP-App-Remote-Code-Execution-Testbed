<?php   
        sm_registerglobal('pid', 
						  'action',					
						  'status',				
						  'start',
						  'boardtitle',	
						  'board_capacity',	
						  'route_id',
						  'boardid',
						  'updateboard',
						  'id',
						  'financial_year',
						  'classid',
						  'updatefee',
						  'updateboard',
						  'vehicleid',
						  'updatevehicle',
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

	/*$fyear_sql = "SELECT *FROM `es_finance_master`  ORDER BY `es_finance_masterid` DESC LIMIT 0 , 1";
	$fyear_row = getarrayassoc($fyear_sql);
	echo $fyear_row['es_finance_masterid'];
	
	$class_sql = "SELECT * FROM es_classes";
	$class_exe = mysql_query($class_sql);
	while($class_row = mysql_fetch_array($class_exe)){
	$class_array[$class_row['es_classesid']]=$class_row['es_classname'];
	}
	
	$finance_sql = "SELECT * FROM es_finance_master";
	$finance_exe = mysql_query($finance_sql);
	while($finance_row = mysql_fetch_array($finance_exe)){
	$finance_array[$finance_row['es_finance_masterid']]=$finance_row['fi_startdate']." - ".$finance_row['fi_enddate'] ;
	}*/
	
	$vehicle_sql = "SELECT * FROM es_trans_vehicle";
	$vehicle_exe = mysql_query($vehicle_sql);
	while($vehicle_row = mysql_fetch_array($vehicle_exe)){
	$vehicle_array[$vehicle_row['es_transportid']]=$vehicle_row['tr_vehicle_no'];
	}








if(isset($action) && $action == "allottedlist"){	
	
	
}


if($action=="editallotment"){
	$vehicle_edit_sql="SELECT * FROM es_trans_driver_allocation_to_vehicle WHERE vehicle_id=".$vehicleid." ORDER BY `id` DESC LIMIT 0 , 1";
	$vehicle_edit_row=$db->getRow($vehicle_edit_sql);
	
	
	
	if(isset($updatevehicle) && $updatevehicle!=""){  
			if($_POST['allotestaff']==""){
				$errormessage[0]="Select driver";	
				}
		    if(count($errormessage)==0)
	 		{	
			$update_sql="UPDATE es_trans_driver_allocation_to_vehicle SET status='Inactive' WHERE vehicle_id=".$_POST['vehicleid'];
			mysql_query($update_sql);
			$sql="INSERT INTO es_trans_driver_allocation_to_vehicle (`driver_id`,`vehicle_id`,`created_on`) VALUES ('".$_POST['allotestaff']."','".$_POST['vehicleid']."',NOW())";
			mysql_query($sql);
			$id=mysql_insert_id();
			$query_log_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) 
			VALUES ('".$_SESSION['eschools']['admin_id']."','es_trans_driver_allocation_to_vehicle','Transport','Allot Driver to Vehicle','".$id."','ALLOT DRIVER TO VEHICLE','".$_SERVER['REMOTE_ADDR']."',NOW())";
			mysql_query($query_log_sql);
			
			header('location:?pid=82&action=allotteddriverlist&emsg=2');
			}
			
		}
		
	}

?>


