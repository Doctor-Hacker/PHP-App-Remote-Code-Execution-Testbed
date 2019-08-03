<?php   
        sm_registerglobal('pid', 
						  'action',					
						  'status',				
						  'start',
						  'driver_license',	
						  'driver_issuing_authority',	
						  'driver_dl_valid_upto',
						  'tr_seating_capacity',
						  'driver_license',
						  'driver_issuing_authority',
						  'driver_dl_valid_upto',
						  'addvehicle',
						  'updatedriver',
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



if((isset($action) && $action == "driverreport") || $action == "print_driver_wise"){
$q_limit  = 25;
if ( !isset($start) ){
	$start = 0;
   }
   
    $sql="SELECT * FROM es_trans_driver_details D,es_trans_vehicle V,es_trans_driver_allocation_to_vehicle DV
   
   WHERE DV.driver_id=D.id AND DV.vehicle_id=V.es_transportid AND DV.status='Active'";   
   
$driver_sql = $sql." LIMIT ".$start." , ".$q_limit;

$driver_row =$db->getRows($driver_sql);

$driver1_sql = $sql;
$driver1_exe = mysql_query($driver1_sql);
$driver1_num = mysql_num_rows($driver1_exe);
}

if(isset($action) && $action == "exportreport"){
$q_limit  = 2000;
if ( !isset($start) ){
	$start = 0;
   }
   
   $query_log_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) 
   VALUES ('".$_SESSION['eschools']['admin_id']."','','Transport','Driver Details List','','EXPORT REPORT','".$_SERVER['REMOTE_ADDR']."',NOW())";
   mysql_query($query_log_sql);
   
   
   $data=
		'"DRIVER NAME"'."\t".		
		'"REGISTRATION NO"'."\t".
		//'"ROUTE (BOARD)"'."\t".		
		'"MOBILE NUMBER"'."\t".
		'"DRIVING LICENSE NO/ISSUING AUTHORITY"'."\t".
		'"DL VALID UPTO"'."\n"; 
		
					   
		//$entry_sql = "SELECT dispatchgroup,dateofdispatch,reference_no,subject,partculars,consignment_no,received_company,received_address,recived_by,submited_to,in_receivedthrough,type,latter_status,out_sender,out_to,out_address,out_sentthrough,dispatch_type FROM `es_dispatch_entry` WHERE `status`!='Delete' ".$condition." ORDER BY id DESC";		
		/*$entry_sql="SELECT  S.st_firstname,S.st_lastname,V.tr_vehicle_no,R.route_title,B.board_title,S.st_pemobileno,D.driver_license,D.issuing_authority,D.valid_date FROM 
   
		     ";*/
		   
		   $sql="SELECT * FROM es_trans_driver_details D,es_trans_vehicle V,es_trans_driver_allocation_to_vehicle DV
   
   WHERE DV.driver_id=D.id AND DV.vehicle_id=V.es_transportid AND DV.status='Active'";   
	   
	    $details = $db->getRows($entry_sql);
		//array_print($details);
		
			//exit;
		if(count($details)>0 ){
		foreach ($details as $row) { 
			$line = '';
			
			
				$value = str_replace('"', '""', $row['st_firstname']." ".$row['st_lastname']);
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;				
				
				$value = str_replace('"', '""', $row['tr_vehicle_no']);
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
				
				    $vehicle_sql="SELECT * FROM es_trans_vehicle_allocation_to_board WHERE vehicle_id=".$row['es_transportid']." AND status='Active'";
					$vehicle_exe=mysql_query($vehicle_sql);
					$vehicle_row=mysql_fetch_array($vehicle_exe);
					if($vehicle_row['board_id']!=""){
					$board_sql="SELECT * FROM es_trans_board WHERE id=".$vehicle_row['board_id'];
					$board_exe=mysql_query($board_sql);
					$board_row=mysql_fetch_array($board_exe);
					
					$route_sql="SELECT * FROM es_translist WHERE id=".$board_row['route_id'];
					$route_exe=mysql_query($route_sql);
					$route_row=mysql_fetch_array($route_exe);					
					//echo $route_row['route_title']." (".$board_row['board_title'].")";
					if($board_row['board_title']!=""){$board_title=" (".$board_row['board_title'].")";}
					}
				/*$value = str_replace('"', '""', $route_row['route_title'].$board_title);
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;*/
				
				$value = str_replace('"', '""', $row['st_pemobileno']);
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
				
				$value = str_replace('"', '""', $row['driver_license']." / ".$row['issuing_authority']);
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
				
				$value = str_replace('"', '""', func_date_conversion('Y-m-d', 'd/m/Y', $row['valid_date']));
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;			
			
			$data .= trim($line). "\n";
		}
		$data = str_replace("\r", "", $data);
		if ($data =="") {
			$data ="\n(0) Records Found!\n";
		}
		
		//header("Content-type: application/x-msdownload");
		header("Content-type: application/vnd.ms-excel");
		header('Content-Disposition: attachment; filename="driverreport.xls"');
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$data";
		exit;
		
		
   
   
   
$driver_sql = $sql." LIMIT ".$start." , ".$q_limit;

$driver_row =$db->getRows($driver_sql);

$driver1_sql = $sql;
$driver1_exe = mysql_query($driver1_sql);
$driver1_num = mysql_num_rows($driver1_exe);
}
}
?>


