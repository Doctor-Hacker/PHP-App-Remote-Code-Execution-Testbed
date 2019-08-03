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

$department_sql="select * from es_departments";
$department_details=$db->getRows($department_sql);
if(count($department_details)>0){
foreach($department_details as $each_department){
$department_array[$each_department['es_departmentsid']]=$each_department['es_deptname'];
}
}

$post_sql="select * from es_deptposts";
$post_details=$db->getRows($post_sql);
if(count($post_details)>0){
foreach($post_details as $each_post){
$post_array[$each_post['es_deptpostsid']]=$each_post['es_postname'];
}
}



if(isset($action) && $action == "staffreport"){
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
      
  
  
  $sql="SELECT S.es_staffid, S.st_firstname, S.st_lastname, S.st_department, S.st_post, TB.board_title, TR.route_title,TR.route_Via  ,TV.tr_vehicle_no,TV.tr_transport_type , DAV.driver_id
FROM es_staff S, es_trans_board_allocation_to_student BS, es_trans_board TB, es_trans_vehicle_allocation_to_board VAB, es_trans_route TR ,es_trans_vehicle TV ,
es_trans_driver_allocation_to_vehicle DAV 
WHERE BS.type = 'staff'
AND BS.student_staff_id = S.es_staffid
AND BS.board_id = TB.id
AND TB.route_id = TR.id
AND TB.id = VAB.board_id
AND BS.status = 'Active'

".$condition."
GROUP BY S.es_staffid
ORDER BY S.es_staffid DESC"; 
   /*P.pre_class='".$calssid."'*/

   
$query_sql = $sql." LIMIT ".$start." , ".$q_limit;

$query_row =$db->getRows($query_sql);
//array_print($query_row);
$query1_sql = $sql;
$query1_exe = mysql_query($query1_sql);
$query1_num = mysql_num_rows($query1_exe);
}

if(isset($action) && $action == "exportreport"){
$q_limit  = 2000;
if ( !isset($start) ){
	$start = 0;
   }
   
   
    $query_log_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) 
   VALUES ('".$_SESSION['eschools']['admin_id']."','','Transport','Staff Wise Report','','EXPORT REPORT','".$_SERVER['REMOTE_ADDR']."',NOW())";
   mysql_query($query_log_sql);
   $calssid="27";
   
   $data=
		'"ID NO.OF THE STAFF MEMBER"'."\t".
		'"NAME OF THE STAFF"'."\t".
		'"DEPARTMENT"'."\t".
		'"POST"'."\t".
		'"TYPE OF VEHICLE"'."\t".
		'"REG.NO. OF THE VEHICLE"'."\t".
		'"ROUTE"'."\t".		
		'"NAME OF THE DRIVER"'."\n";					   
				
		$sql="SELECT S.es_staffid,S.st_firstname,S.st_lastname,S.st_department,S.st_post,BS.board_id FROM es_staff S
   
		   LEFT OUTER JOIN es_trans_board_allocation_to_student BS ON BS.student_staff_id = S.es_staffid   
		   
		   WHERE    
		   
		   BS.type='staff'
		   
		   AND BS.status='Active'
		   
		   ORDER BY S.es_staffid DESC"; 
		$entry_sql=$sql;
		$details = $db->getRows($entry_sql);
		//array_print($details);
		//exit;
		if(count($details)>0 ){
		foreach ($details as $row) { 
			$line = '';
			
				$value = str_replace('"', '""', $row['es_staffid']);
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
				
				$value = str_replace('"', '""', $row['st_firstname']." ".$row['st_lastname']);
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
				
				$value = str_replace('"', '""', $department_array[$row['st_department']]);
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
				
				$value = str_replace('"', '""', $post_array[$row['st_post']]);
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
				
					$board_sql="SELECT * FROM es_trans_vehicle_allocation_to_board WHERE board_id=".$row['board_id'];
					$board_exe=mysql_query($board_sql);
					$board_row=mysql_fetch_array($board_exe);
					$vehicle_id=$board_row['vehicle_id'];
					if($board_row['vehicle_id']!=""){
					$vehicle_sql="SELECT * FROM  es_trans_vehicle WHERE es_transportid=".$board_row['vehicle_id'];
					$vehicle_exe=mysql_query($vehicle_sql);
					$vehicle_row=mysql_fetch_array($vehicle_exe);
					}                            
				
				$value = str_replace('"', '""', $vehicle_row['tr_transport_type']);
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
				
				
				
				
				
				
				
				$value = str_replace('"', '""', $vehicle_row['tr_vehicle_no']);
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
				
					$board_sql="SELECT * FROM es_trans_board WHERE id=".$row['board_id'];
					$board_exe=mysql_query($board_sql);
					$board_row=mysql_fetch_array($board_exe);
					if($board_row['route_id']!=""){
					$route_sql="SELECT * FROM es_translist WHERE id=".$board_row['route_id'];
					$route_exe=mysql_query($route_sql);
					$route_row=mysql_fetch_array($route_exe);
					}
				
			/*	$value = str_replace('"', '""', $route_row['route_title']."(".$board_row['board_title']);
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;*/
				
					 $board_sql="SELECT * FROM es_trans_board WHERE id=".$row['board_id'];
					$board_exe=mysql_query($board_sql);
					$board_row=mysql_fetch_array($board_exe);
					if($board_row['route_id']!=""){
					$route_sql="SELECT * FROM es_trans_route WHERE id=".$board_row['route_id'];
					$route_exe=mysql_query($route_sql);
					$route_row=mysql_fetch_array($route_exe);
					}
                    $value=$route_row['route_title']."(".$board_row['board_title'].")";
					$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
				
				
					if($vehicle_id!=""){
					$board_sql="SELECT * FROM es_trans_driver_allocation_to_vehicle WHERE status='Active' AND vehicle_id=".$vehicle_id;
					$board_exe=mysql_query($board_sql);
					$board_row=mysql_fetch_array($board_exe);
					if($board_row['driver_id']!=""){
					$vehicle_sql="SELECT * FROM  es_staff WHERE es_staffid=".$board_row['driver_id'];
					$vehicle_exe=mysql_query($vehicle_sql);
					$vehicle_row=mysql_fetch_array($vehicle_exe);
					}
                    //echo $vehicle_row['st_firstname']." ".$vehicle_row['st_lastname'];
					}                 
				
				$value = str_replace('"', '""', $vehicle_row['st_firstname']." ".$vehicle_row['st_lastname']);
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
				
			
			
			/*foreach($row as $field=>$value) { if($field=="in_receivedthrough"){$value=$in_receivedthrough_array[$value];} if($field=="out_sentthrough"){$value=$in_sendthrough_array[$value];} if($field=="dispatchgroup"){$value=$dispat_group[$value];}
			
				$value = str_replace('"', '""', $value);
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
			}*/
			
			$data .= trim($line). "\n";
		}
		$data = str_replace("\r", "", $data);
		if ($data =="") {
			$data ="\n(0) Records Found!\n";
		}
		
		//header("Content-type: application/x-msdownload");
		header("Content-type: application/vnd.ms-excel");
		header('Content-Disposition: attachment; filename="staffwisereport.xls"');
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


