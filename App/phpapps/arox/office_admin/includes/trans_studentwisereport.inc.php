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
						  'emsg','search_staff','es_transportid','route_id'	,'es_classesid','section_id','routes_id','es_staffid'					
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

$class_sql="select * from es_classes";
$class_details=$db->getRows($class_sql);
if(count($class_details)>0){
foreach($class_details as $each_class){
$class_array[$each_class['es_classesid']]=$each_class['es_classname'];
}
}

if(isset($action) && $action == "studentreport"  || $action == 'print_student_wise'){
$q_limit  = 20;
if ( !isset($start) ){
	$start = 0;
   }
   $condition="";
   if(isset($search_staff) && $search_staff!=""){
          $page_URL = "&search_staff=Search";
		  $condition = '';
   		if($es_classesid!=""){
			$condition .= " AND P.pre_class='".$es_classesid."'";
			$page_URL .= "&es_classesid=$es_classesid";
		}
		/*if($section_id != ''){
			$condition .= " AND ESS.section_id='".$section_id."'";
			$page_URL .= "&section_id=$section_id";
		}*/
		if($es_transportid!=""){
			$condition .= " AND TV.es_transportid='".$es_transportid."'";
			$page_URL .= "&es_transportid=$es_transportid";
		}
		if($route_id!=""){
			$condition .= " AND TR.id='".$route_id."'";
			$page_URL .= "&route_id=$route_id";
		}
   
   }
   if($action == 'print_student_wise'){
   		if($es_classesid!=""){
			$condition .= " AND P.pre_class='".$es_classesid."'";
			$page_URL .= "&es_classesid=$es_classesid";
		}
		/*if($section_id != ''){
			$condition .= " AND ESS.section_id='".$section_id."'";
			$page_URL .= "&section_id=$section_id";
		}*/
   }
   
   $calssid="27";

$sql="SELECT P.es_preadmissionid,P.pre_name,P.pre_class,P.pre_fromdate,P.pre_todate,P.pre_mobile1,BS.board_id,P.pre_fathername, TB.board_title,TB.route_id, TR.route_title,TR.route_Via,TR.amount ,TV.tr_vehicle_no,TV.tr_transport_type , DAV.driver_id,SS.roll_no 
			
			FROM es_preadmission P, es_trans_board_allocation_to_student BS, es_trans_board TB, es_trans_vehicle_allocation_to_board VAB, es_trans_route TR ,es_trans_vehicle TV ,
			es_trans_driver_allocation_to_vehicle DAV,  es_sections_student SS
			WHERE BS.type='student'
			AND BS.student_staff_id = P.es_preadmissionid
			AND BS.board_id = TB.id
			AND TB.route_id = TR.id
			AND TB.id = VAB.board_id
			AND BS.status = 'Active'
			AND VAB.vehicle_id = TV.es_transportid
			AND DAV.vehicle_id = TV.es_transportid
			
			".$condition."
			GROUP BY P.es_preadmissionid
			ORDER BY BS.id DESC"; 
   
   
   
   /*P.pre_class='".$calssid."'*/

   
$query_sql = $sql." LIMIT ".$start." , ".$q_limit;

$query_row =$db->getRows($query_sql);

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
   VALUES ('".$_SESSION['eschools']['admin_id']."','','Transport','Student Wise Report','','EXPORT REPORT','".$_SERVER['REMOTE_ADDR']."',NOW())";
   mysql_query($query_log_sql);
   $condition='';
   if($es_classesid!=""){
			$condition .= " AND P.pre_class='".$es_classesid."'";
			}
	/*if($section_id != ''){
			$condition .= " AND ESS.section_id='".$section_id."'";
			}
   */
   $data=
		'"ROLL NO"'."\t".
		'"REG.NO"'."\t".
		'"NAME"'."\t".
		'"FATHER NAME"'."\t".
		'"ROUTE"'."\t".
		'"MOBILE NO"'."\t".
		'"ROUTE NO"'."\t".		
		'"BUS NO"'."\t".
		'"TPT FEE"'."\n";					   
				
			$sql="SELECT P.es_preadmissionid,P.pre_name,P.pre_class,P.pre_fromdate,P.pre_todate,P.pre_mobile1,BS.board_id,P.pre_fathername, TB.board_title, TR.route_title,TR.route_Via,TR.amount ,TV.tr_vehicle_no,TV.tr_transport_type , DAV.driver_id 
			
			FROM es_preadmission P, es_trans_board_allocation_to_student BS, es_trans_board TB, es_trans_vehicle_allocation_to_board VAB, es_trans_route TR ,es_trans_vehicle TV ,
			es_trans_driver_allocation_to_vehicle DAV
			WHERE BS.type='student'
			AND BS.student_staff_id = P.es_preadmissionid
			AND BS.board_id = TB.id
			AND TB.route_id = TR.id
			AND TB.id = VAB.board_id
			AND BS.status = 'Active'
			AND VAB.vehicle_id = TV.es_transportid
			AND DAV.vehicle_id = TV.es_transportid
		
			".$condition."
			GROUP BY P.es_preadmissionid
			ORDER BY BS.id DESC";

		$entry_sql=$sql;
		$details = $db->getRows($entry_sql);
		
		//array_print($details);
		//exit;
		if(count($details)>0 ){
		foreach ($details as $row) { 
		 $query2="SELECT * FROM es_sections_student WHERE student_id = '". $row['es_preadmissionid']."' ";
					$result2=mysql_query($query2);
					$row2=mysql_fetch_array($result2);
			$line = '';
			
				$value = str_replace('"', '""', $row2['roll_no']);
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
				
				$value = str_replace('"', '""', $row['es_preadmissionid']);
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
				
				$value = str_replace('"', '""', $row['pre_name']);
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
				
				                   
				
				$value = str_replace('"', '""', $row['pre_fathername']);
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
				
				$value = str_replace('"', '""', $row['route_title']);
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
				
				$value = str_replace('"', '""', $row['pre_mobile1']);
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
				
				
				$value = str_replace('"', '""', $row['board_title']);
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
			
				$value = str_replace('"', '""', $row['tr_vehicle_no']);
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
				$value = str_replace('"', '""', $_SESSION['eschools']['currency']." ".number_format( $row['amount'], 2, '.', ''));
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
		header('Content-Disposition: attachment; filename="studentwisereport.xls"');
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
else{
header('location: ?pid=88&action=studentreport');
}
}

//Mani
if(isset($es_classesid) && $es_classesid != ''){
	$class_sql = "SELECT * FROM es_classes WHERE es_classesid=".$es_classesid;
	$res=$db->getRow($class_sql);

//Incharge Information
$incharge_sql="SELECT ES.st_firstname, ES.st_lastname FROM es_incharge EI, es_staff ES WHERE ES.es_staffid=EI.es_staffid AND EI.es_classesid=".$es_classesid;
$incharge_res=$db->getRow($incharge_sql);	
}
	
/*if(isset($section_id) && $section_id != ''){
	$sect_sql = "SELECT * FROM es_sections WHERE section_id=".$section_id;
	$sect_res=$db->getRow($sect_sql);
	}*/

$finance_sql="SELECT fi_startdate, fi_enddate FROM es_finance_master WHERE es_finance_masterid =".$_SESSION['eschools']['es_finance_masterid'];
$finance_res=$db->getRow($finance_sql);
?>

<?php //Driver Copy ?>

<?php
if($action == 'driver_copy' || $action == 'print_driver_report'){
$q_limit  = 20;
if ( !isset($start) ){
	$start = 0;
   }
   $condition="";
   if(isset($search_staff) && $search_staff!=""){
          $page_URL = "&search_staff=Search";
		  $condition = '';
   		if($es_staffid!=""){
			$condition .= " AND BS.board_id=VAB.board_id AND VAB.vehicle_id=DAV.vehicle_id AND DAV.driver_id='".$es_staffid."'";
			$page_URL .= "&es_transportid=$es_transportid";
		}
		if($routes_id!=""){
			$condition .= " AND TR.id='".$routes_id."'";
			$page_URL .= "&route_id=$routes_id";
		}   
   }
   
   if($action == 'print_driver_report'){
   $condition = '';
   		if($es_staffid!=""){
			$condition .= " AND BS.board_id=VAB.board_id AND VAB.vehicle_id=DAV.vehicle_id AND DAV.driver_id='".$es_staffid."'";
			$page_URL .= "&es_transportid=$es_transportid";
		}
		if($routes_id!=""){
			$condition .= " AND TR.id='".$routes_id."'";
			$page_URL .= "&route_id=$routes_id";
		}
   }
   
   $calssid="27";
   
    $sql="SELECT P.es_preadmissionid,P.pre_name,P.pre_image,P.pre_fromdate,P.pre_todate,P.pre_mobile1,BS.board_id,P.pre_fathername, TB.board_title, TR.route_title,TR.route_Via,TR.amount ,TV.tr_vehicle_no,TV.tr_transport_type , DAV.driver_id 
			
			FROM es_preadmission P, es_trans_board_allocation_to_student BS, es_trans_board TB, es_trans_vehicle_allocation_to_board VAB, es_trans_route TR ,es_trans_vehicle TV ,
			es_trans_driver_allocation_to_vehicle DAV
			WHERE BS.type='student'
			AND BS.student_staff_id = P.es_preadmissionid
			AND BS.board_id = TB.id
			AND TB.route_id = TR.id
			AND TB.id = VAB.board_id
			AND BS.status = 'Active'
			AND VAB.vehicle_id = TV.es_transportid
			AND DAV.vehicle_id = TV.es_transportid
			
			".$condition."
			GROUP BY P.es_preadmissionid
			ORDER BY BS.id DESC"; 
   
   
   
   /*P.pre_class='".$calssid."'
   AND TB.route_id = TR.id*/

   
$query_sql = $sql." LIMIT ".$start." , ".$q_limit;

$query_row =$db->getRows($query_sql);

$query1_sql = $sql;
$query1_exe = mysql_query($query1_sql);
$query1_num = mysql_num_rows($query1_exe);

if(isset($routes_id) && $routes_id != '' ){
$routes_sql="SELECT board_title FROM es_trans_board WHERE id=".$routes_id;
$routes_res=$db->getRow($routes_sql);

$routes_sql1="SELECT * FROM es_trans_board WHERE id=".$routes_id;
$routes_res1=$db->getRow($routes_sql1);


$bus_sql="SELECT ETV.tr_vehicle_no FROM es_trans_vehicle ETV, es_trans_vehicle_allocation_to_board ETVA, es_trans_board ETB WHERE ETV.es_transportid=ETVA.vehicle_id AND ETVA.board_id=ETB.id AND ETB.id=".$routes_id;
$bus_res=$db->getRow($bus_sql);
}

if($es_staffid != ''){
$driver_sql="SELECT ES.st_firstname, ES.st_lastname  FROM es_staff ES WHERE ES.es_staffid=".$es_staffid;
$driver_res=$db->getRow($driver_sql);
}
}


//EXPORT DRIVER REPORT
if($action == 'exportdriver_report'){

$q_limit  = 2000;
if ( !isset($start) ){
	$start = 0;
   }
   $query_log_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) 
   VALUES ('".$_SESSION['eschools']['admin_id']."','','Transport','Student Wise Report','','EXPORT REPORT','".$_SERVER['REMOTE_ADDR']."',NOW())";
   mysql_query($query_log_sql);
   $condition = '';
   		if($es_staffid!=""){
			$condition .= " AND BS.board_id=VAB.board_id AND VAB.vehicle_id=DAV.vehicle_id AND DAV.driver_id='".$es_staffid."'";
			//$page_URL .= "&es_transportid=$es_transportid";
		}
		if($routes_id!=""){
			$condition .= " AND TR.id='".$routes_id."'";
			//$page_URL .= "&route_id=$routes_id";
		}
   
   $data='"ROLL NO"'."\t".
		'"REG.NO"'."\t".
		'"NAME"'."\t".
		'"FATHER NAME"'."\t".
		'"ROUTE"'."\t".
		'"MOBILE NO"'."\t".
		'"TPT FEE"'."\n";		
				
		$sql="SELECT P.es_preadmissionid,P.pre_name,P.pre_image,P.pre_fromdate,P.pre_todate,P.pre_mobile1,BS.board_id,P.pre_fathername, TB.board_title, TR.route_title,TR.route_Via,TR.amount ,TV.tr_vehicle_no,TV.tr_transport_type , DAV.driver_id 
			
			FROM es_preadmission P, es_trans_board_allocation_to_student BS, es_trans_board TB, es_trans_vehicle_allocation_to_board VAB, es_trans_route TR ,es_trans_vehicle TV ,
			es_trans_driver_allocation_to_vehicle DAV
			WHERE BS.type='student'
			AND BS.student_staff_id = P.es_preadmissionid
			AND BS.board_id = TB.id
			
			AND TB.id = VAB.board_id
			AND BS.status = 'Active'
			AND VAB.vehicle_id = TV.es_transportid
			AND DAV.vehicle_id = TV.es_transportid
			".$condition."
			GROUP BY P.es_preadmissionid
			ORDER BY BS.id DESC";	

		$entry_sql=$sql;
		$details = $db->getRows($entry_sql);
		//array_print($details);
		//exit;
		if(count($details)>0 ){
		foreach ($details as $row) { 
		 $query2="SELECT * FROM es_sections_student WHERE student_id = '". $row['es_preadmissionid']."' ";
					$result2=mysql_query($query2);
					$row2=mysql_fetch_array($result2);
					
			
					
					
					  
			$line = '';
			
	/*	echo	$board_sql = "SELECT * FROM es_translist WHERE id=".$query['route_Via']." AND status='Active'";
				  $board_row =$db->getRow($board_sql);
					 echo $board_row['route_title'];
					  echo $query['route_title'];      */
					
					                 
                      
			
				$value = str_replace('"', '""', $row2['roll_no']);
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
				
				$value = str_replace('"', '""', $row['es_preadmissionid']);
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
				
				$value = str_replace('"', '""', $row['pre_name']);
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
				
				                   
				
				$value = str_replace('"', '""', $row['pre_fathername']);
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
				
				/*$value = str_replace('"', '""', $row['route_title']);
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;*/
				 
					 
					   $board_sql1 = "SELECT * FROM es_translist WHERE id=".$row['route_Via']." AND status='Active'";
				  $board_row1 =$db->getRow($board_sql1);
					  
				 $board_sql="SELECT * FROM es_trans_board WHERE id=".$row['board_id'];
					$board_exe=mysql_query($board_sql);
					$board_row=mysql_fetch_array($board_exe);
					if($board_row['route_id']!=""){
					$route_sql="SELECT * FROM es_trans_route WHERE id=".$board_row['route_id'];
					$route_exe=mysql_query($route_sql);
					$route_row=mysql_fetch_array($route_exe);
					}
                    $value= $board_row1['route_title']."(".$route_row['route_title'].")(".$board_row['board_title'].")";
					$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
				
				$value = str_replace('"', '""', $row['pre_mobile1']);
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
				
				
				$value = str_replace('"', '""', $_SESSION['eschools']['currency']." ".number_format( $row['amount'], 2, '.', ''));
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
		header('Content-Disposition: attachment; filename="studentwisereport.xls"');
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
else{
header('location: ?pid=88&action=studentreport');
}

}

?>
