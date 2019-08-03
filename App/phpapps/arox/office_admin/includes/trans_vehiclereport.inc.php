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
						  'emsg','search_staff','es_transportid','route_id'						
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



if(isset($action) && $action == "vehiclereport"){ 
$q_limit  = 20;
if ( !isset($start) ){
	$start = 0;
   }  
  
    $condition="";
   if(isset($search_staff) && $search_staff!=""){
          $page_URL = "&search_staff=Search";
   		if($es_transportid!=""){
			$condition = " AND TV.es_transportid='".$es_transportid."'";
			$page_URL .= "&es_transportid=$es_transportid";
		}
		if($route_id!=""){
			$condition = " AND TR.id='".$route_id."'";
			$page_URL .= "&route_id=$route_id";
		}
   
   }
   
   
    $sql="SELECT * FROM es_trans_board TB, es_trans_vehicle_allocation_to_board VAB, es_trans_route TR ,es_trans_vehicle TV ,
es_trans_driver_allocation_to_vehicle DAV 
    WHERE  TB.route_id = TR.id
	AND TB.id = VAB.board_id
	AND VAB.status='Active'
	AND VAB.vehicle_id = TV.es_transportid
	AND DAV.vehicle_id = TV.es_transportid
	".$condition."
	GROUP BY TB.id
      ORDER BY TB.id DESC";
   
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
   VALUES ('".$_SESSION['eschools']['admin_id']."','','Transport','Vehicle Report','','EXPORT REPORT','".$_SERVER['REMOTE_ADDR']."',NOW())";
   mysql_query($query_log_sql);
   
   
   $data=
		'"DATE OF PURCHASE"'."\t".
		'"TYPE OF VEHICLE"'."\t".
		'"REGISTRATION NO"'."\t".
		'"ROUTE"'."\t".
		'"INSURANCE VALID UPTO"'."\t".
		'"NAME OF THE ALLOCATED DRIVER"'."\t".		
		'"SEATING CAPACITY"'."\n"; 
		
		
		
					   
		//$entry_sql = "SELECT dispatchgroup,dateofdispatch,reference_no,subject,partculars,consignment_no,received_company,received_address,recived_by,submited_to,in_receivedthrough,type,latter_status,out_sender,out_to,out_address,out_sentthrough,dispatch_type FROM `es_dispatch_entry` WHERE `status`!='Delete' ".$condition." ORDER BY id DESC";		
		$entry_sql="SELECT tr_purchase_date,tr_transport_type,tr_vehicle_no,board_id,tr_insurance_date,vehicle_id,tr_seating_capacity FROM es_trans_vehicle V		   
		   LEFT OUTER JOIN es_trans_vehicle_allocation_to_board VB ON V.es_transportid = VB.vehicle_id  		   
		   WHERE 		   
		   VB.status='Active'	   
		   ORDER BY es_transportid DESC";
/*		   
		   			   $entry_sql="SELECT  TV.tr_purchase_date,TV.tr_transport_type,TV.tr_vehicle_no,VAB.board_id,TV.tr_insurance_date,VAB.vehicle_id,TV.tr_seating_capacity  FROM es_trans_board TB, es_trans_vehicle_allocation_to_board VAB, es_trans_route TR ,es_trans_vehicle TV ,
es_trans_driver_allocation_to_vehicle DAV 
    WHERE  TB.route_id = TR.id
	AND TB.id = VAB.board_id
	AND VAB.status='Active'
	AND VAB.vehicle_id = TV.es_transportid
	AND DAV.vehicle_id = TV.es_transportid
	GROUP BY TB.id
      ORDER BY TB.id DESC";*/
	   
	    $details = $db->getRows($entry_sql);
		
		//array_print($details);
		 //echo $driver['route_title']."(".$driver['board_title'].")";
			//exit;
		if(count($details)>0 ){
		foreach ($details as $row) { 
			$line = '';
			
					
			foreach($row as $field=>$value) { 
					if($field=="board_id"){	
					
					$board_sql="SELECT * FROM es_trans_board WHERE id=".$value;
					$board_exe=mysql_query($board_sql);
					$board_row=mysql_fetch_array($board_exe);
					if($board_row['route_id']!=""){
					$route_sql="SELECT * FROM es_trans_route WHERE id=".$board_row['route_id'];
					$route_exe=mysql_query($route_sql);
					$route_row=mysql_fetch_array($route_exe);
					}
                    $value=$route_row['route_title']."(".$board_row['board_title'].")";
					}
					
					if($field=="vehicle_id"){	
					$vehicle_sql="SELECT * FROM es_trans_driver_allocation_to_vehicle WHERE vehicle_id=".$value;
					$vehicle_exe=mysql_query($vehicle_sql);
					$vehicle_row=mysql_fetch_array($vehicle_exe);
					if($vehicle_row['driver_id']!=""){
					$staff_sql="SELECT * FROM es_staff WHERE es_staffid=".$vehicle_row['driver_id'];
					$staff_exe=mysql_query($staff_sql);
					$staff_row=mysql_fetch_array($staff_exe);
					}
                    $value=$staff_row['st_firstname']." ".$staff_row['st_lastname'];
					}
					
					if($field=="tr_purchase_date"){	
					$value=func_date_conversion('Y-m-d', 'd/m/Y', $value);
					}
					if($field=="tr_insurance_date"){	
					$value=func_date_conversion('Y-m-d', 'd/m/Y', $value);
					}
					
				$value = str_replace('"', '""', $value);
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
			}
			$data .= trim($line). "\n";
		}
		$data = str_replace("\r", "", $data);
		if ($data =="") {
			$data ="\n(0) Records Found!\n";
		}
		
		//header("Content-type: application/x-msdownload");
		header("Content-type: application/vnd.ms-excel");
		header('Content-Disposition: attachment; filename="vehiclereport.xls"');
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


