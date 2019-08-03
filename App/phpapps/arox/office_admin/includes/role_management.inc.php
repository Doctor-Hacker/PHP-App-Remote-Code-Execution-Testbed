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
						  's_from',
						  's_to',
						  's_module',
						  's_submodule',
						  's_action',
						  'Search',
						  'export',						
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



if(isset($action) && $action == "report" && $Search=="Search"){ 
$q_limit  = 10;
if ( !isset($start) ){
	$start = 0;
   }  
   
   
   
   /*$query_log_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) 
   VALUES ('".$_SESSION['eschools']['admin_id']."','','Transport','Vehicle Report','','EXPORT REPORT','".$_SERVER['REMOTE_ADDR']."',NOW())";
   mysql_query($query_log_sql);*/
   
   
   if(isset($Search) && $Search=="Search"){
			$condition="";  
			$fromdate1 = func_date_conversion("d/m/Y","Y-m-d",$s_from);
			$todate1 = func_date_conversion("d/m/Y","Y-m-d",$s_to);
			if($s_from!="" && $s_to==!"")
			{
				$condition .= " AND (posted_on BETWEEN  '".$fromdate1."' and '".$todate1."')";
			} 
			else if($s_from!="") {
				$condition .= " AND posted_on  >=  '".$fromdate1."'";
			} 
			else if($s_to!="") {
				$condition .= " AND posted_on  <= '".$todate1."'";
			}
			
			if($s_module!="")
			{
				$condition .= " AND module LIKE '%".$s_module."%'";
			}
			
			if($s_submodule!="")
			{
				$condition .= " AND submodule LIKE '%".$s_submodule."%'";
			}
			
			if($s_action!="")
			{
				$condition .= " AND action LIKE '%".$s_action."%'";
			}			
		}
   
		   	 $sql="SELECT * FROM es_userlogs   
				   WHERE					   
				   1   
				   ".$condition ."   
				   ORDER BY id DESC";
   
$driver_sql = $sql." LIMIT ".$start." , ".$q_limit;

$driver_row =$db->getRows($driver_sql);

//array_print($driver_row);

$driver1_sql = $sql;
$driver1_exe = mysql_query($driver1_sql);
$driver1_num = mysql_num_rows($driver1_exe);
}

if(isset($action) && $action == "report" && $export=="export"){
$q_limit  = 2000;
if ( !isset($start) ){
	$start = 0;
   }
   
   
   
   
   $data=
		'"ADMIN"'."\t".
		'"Module"'."\t".
		'"Sub-Module"'."\t".
		'"Action"'."\t".
		'"IP Address"'."\t".
		'"DateTime"'."\n"; 
		
		$condition="";  
			$fromdate1 = func_date_conversion("d/m/Y","Y-m-d",$s_from);
			$todate1 = func_date_conversion("d/m/Y","Y-m-d",$s_to);
			if($s_from!="" && $s_to==!"")
			{
				$condition .= " AND (posted_on BETWEEN  '".$fromdate1."' and '".$todate1."')";
			} 
			else if($s_from!="") {
				$condition .= " AND posted_on  >=  '".$fromdate1."'";
			} 
			else if($s_to!="") {
				$condition .= " AND posted_on  <= '".$todate1."'";
			}
			
			if($s_module!="")
			{
				$condition .= " AND module LIKE '%".$s_module."%'";
			}
			
			if($s_submodule!="")
			{
				$condition .= " AND submodule LIKE '%".$s_submodule."%'";
			}
			
			if($s_action!="")
			{
				$condition .= " AND action LIKE '%".$s_action."%'";
			}
		
		 $sql="SELECT * FROM es_userlogs
			   WHERE			   
			   1			   
			   ".$condition ."			   
			   ORDER BY id DESC";
					   
		//$entry_sql = "SELECT dispatchgroup,dateofdispatch,reference_no,subject,partculars,consignment_no,received_company,received_address,recived_by,submited_to,in_receivedthrough,type,latter_status,out_sender,out_to,out_address,out_sentthrough,dispatch_type FROM `es_dispatch_entry` WHERE `status`!='Delete' ".$condition." ORDER BY id DESC";		
		$entry_sql=$sql;
	   
	    $details = $db->getRows($entry_sql);
		//array_print($details);
		
			//exit;
		if(count($details)>0 ){
		foreach ($details as $row) { 
			$line = '';
			//foreach($row as $field=>$value) { 
			
					$user_sql="SELECT * FROM es_admins WHERE es_adminsid=".$row['user_id'];
					$user_exe=mysql_query($user_sql);
					$user_row=mysql_fetch_array($user_exe);					
			
				$value = str_replace('"', '""', $user_row['admin_username']);
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
				
				$value = str_replace('"', '""', ucfirst(strtolower($row['module'])));
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
				
				$value = str_replace('"', '""', ucfirst(strtolower($row['submodule'])));
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
				
				$value = str_replace('"', '""', ucfirst(strtolower($row['action'])));
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
				
				$value = str_replace('"', '""', $row['ipaddress']);
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
				
				$value = str_replace('"', '""', func_date_conversion('Y-m-d H:i:s', 'd/m/Y H:i:s', $row['posted_on']));
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
			//}
			$data .= trim($line). "\n";
		}
		$data = str_replace("\r", "", $data);
		if ($data =="") {
			$data ="\n(0) Records Found!\n";
		}
		
		//header("Content-type: application/x-msdownload");
		header("Content-type: application/vnd.ms-excel");
		header('Content-Disposition: attachment; filename="rolemanagementreport.xls"');
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$data";
		exit;

}
}
?>


