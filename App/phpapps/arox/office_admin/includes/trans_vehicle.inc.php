<?php   
        sm_registerglobal('pid', 
						  'action',					
						  'status',				
						  'start',
						  'tr_transport_type',	
						  'tr_transport_name',	
						  'tr_vehicle_no',
						  'tr_seating_capacity',
						  'tr_purchase_date',
						  'tr_insurance_date',
						  'tr_ins_renewal_date',
						  'addvehicle',
						  'updatevehicle',
						  'id',							
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


/**********Preparing transport array*************/
/*$trans_sql="select es_transportid, tr_transport_type,tr_vehicle_no from es_transport where status='active'";
$trans_details=$db->getRows($trans_sql);
if(count($trans_details)>0){
foreach($trans_details as $each_trans){
$trans_array[$each_trans['es_transportid']]=$each_trans['tr_vehicle_no']."(".$each_trans['tr_transport_type'].")";
}
}*/




if(isset($action) && $action == "addvehicle" && $addvehicle=="Add Vehicle"){


	if(isset($addvehicle) && $addvehicle== "Add Vehicle"){
	  			
		if ($tr_transport_type=="") {
		$errormessage[0]="Select transport type";	  
		}
		
		if ($tr_transport_name=="") {
		$errormessage[1]="Enter transport name";	  
		}		
			
		if ($tr_vehicle_no=="") {
		$errormessage[2]="Enter vehicle no"; 
		}
		
		if ($tr_seating_capacity=="") {
		$errormessage[3]="Enter Number Of Passengers"; 
		}
		
		if (!$vlc->is_nonNegNumber($tr_seating_capacity)) {
		$errormessage[3]="Enter Number Of Passengers"; 
		}
		
		if ($tr_purchase_date=="") {
		$errormessage[4]="Enter purchase date"; 
		}
		
		if ($tr_insurance_date=="") {
		$errormessage[5]="Enter insurance date"; 
		}
		
		if ($tr_ins_renewal_date=="") {
		$errormessage[6]="Enter insurance renewal date"; 
		}
		$tr_purchase_date_new=func_date_conversion('d/m/Y', 'Y-m-d', $tr_purchase_date);
		$tr_insurance_date_new=func_date_conversion('d/m/Y', 'Y-m-d', $tr_insurance_date);
		$tr_ins_renewal_date_new=func_date_conversion('d/m/Y', 'Y-m-d', $tr_ins_renewal_date);	
        if(count($errormessage)==0)
	 		{
			$vehicle_sql="INSERT INTO es_trans_vehicle (`tr_transport_type`,`tr_purchase_date`,`tr_transport_name`,`tr_vehicle_no`,`tr_insurance_date`,`tr_ins_renewal_date`,`tr_seating_capacity`,`status`) VALUES ('".$tr_transport_type."','".$tr_purchase_date_new."','".$tr_transport_name."','".$tr_vehicle_no."','".$tr_insurance_date_new."','".$tr_ins_renewal_date_new."','".$tr_seating_capacity."','Active')";
			mysql_query($vehicle_sql);
			header('location: ?pid=77&action=vehiclelist&emsg=1');
			}
	}  
}

if(isset($action) && $action == "editvehicle"){
	if(isset($updatevehicle) && $updatevehicle=="Update Vehicle"){				
			
		if ($tr_transport_type=="") {
		$errormessage[0]="Select transport type";	  
		}
		
		if ($tr_transport_name=="") {
		$errormessage[1]="Enter transport name";	  
		}		
			
		if ($tr_vehicle_no=="") {
		$errormessage[2]="Enter vehicle no"; 
		}
		
		if ($tr_seating_capacity=="") {
		$errormessage[3]="Enter seating capacity"; 
		}
		
		if ($tr_purchase_date=="") {
		$errormessage[4]="Enter purchase date"; 
		}
		
		if ($tr_insurance_date=="") {
		$errormessage[5]="Enter insurance date"; 
		}
		
		if ($tr_ins_renewal_date=="") {
		$errormessage[6]="Enter insurance renewal date"; 
		}
		$tr_purchase_date_new=func_date_conversion('d/m/Y', 'Y-m-d', $tr_purchase_date);
		$tr_insurance_date_new=func_date_conversion('d/m/Y', 'Y-m-d', $tr_insurance_date);
		$tr_ins_renewal_date_new=func_date_conversion('d/m/Y', 'Y-m-d', $tr_ins_renewal_date);
			
			if(count($errormessage)==0)
				{
				$vehicle_sql="UPDATE  es_trans_vehicle SET `tr_transport_type`='".$tr_transport_type."',`tr_purchase_date`='".$tr_purchase_date_new."',`tr_transport_name`='".$tr_transport_name."',`tr_vehicle_no`='".$tr_vehicle_no."',`tr_insurance_date`='".$tr_insurance_date_new."',`tr_ins_renewal_date`='".$tr_ins_renewal_date_new."',`tr_seating_capacity`='".$tr_seating_capacity."' WHERE es_transportid=".$id;
				mysql_query($vehicle_sql);		
				header('location: ?pid=77&action=vehiclelist&emsg=2');
				}
	}
$vehicle_sql = "SELECT * FROM  es_trans_vehicle WHERE status!='Delete' AND es_transportid=".$_GET['id'];
$vehicle_exe = mysql_query($vehicle_sql);
$vehicle_row = mysql_fetch_array($vehicle_exe);  
}

if(isset($action) && $action == "deletevehicle"){

	print $vehicle_sql="UPDATE es_trans_vehicle SET `status`='Delete' WHERE es_transportid=".$id;
	mysql_query($vehicle_sql);
	header('location: ?pid=77&action=vehiclelist&emsg=3');
				
}




if($action == "vehiclelist" || $action=='print_vechilelist'){

$q_limit  = 20;
if ( !isset($start) ){
	$start = 0;
   }
   $no_rows = sqlnumber("SELECT * FROM es_trans_vehicle WHERE status!='Delete'");
$vehicle_sql = "SELECT * FROM es_trans_vehicle WHERE status!='Delete' ORDER BY es_transportid DESC LIMIT ".$start." , ".$q_limit;
$vehicle_row =$db->getRows($vehicle_sql);

$vehicle1_sql = "SELECT * FROM es_trans_vehicle WHERE status!='Delete'";
$vehicle1_exe = mysql_query($vehicle1_sql);
$vehicle1_num = mysql_num_rows($vehicle1_exe);

/*$route_sql = "SELECT * FROM es_trans_route WHERE status!='Delete'";
$route_exe = mysql_query($route_sql);
while($route_row = mysql_fetch_array($route_exe)){
$route_array[$route_row['id']]=$route_row['route_title'];
}*/

}
?>


