<?php   
        sm_registerglobal('pid', 
						  'action',					
						  'status',				
						  'start',
						  'routetitle',	
						  'route_via',	
						  'addroute',
						  'updateroute',
						  'id',							
						  'emsg','amount'				
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




if(isset($action) && $action == "addroute" && $addroute=="Add Route"){


	if(isset($addroute) && $addroute== "Add Route"){
	  			
		if ($routetitle=="") {
		$errormessage[0]="Enter route title";	  
		}		
			
		if ($route_via=="") {
		$errormessage[1]="Enter route "; 
		}	
		if ($amount<1) {
		$errormessage[2]="Enter Amount"; 
		}		
		
        if(count($errormessage)==0)
	 		{
			 $route_sql="INSERT INTO es_trans_route (`route_title`,`route_Via`,amount,`status`,`created_on`) VALUES ('".$routetitle."','".$route_via."','".ceil($amount)."','Active',NOW())";
			mysql_query($route_sql);
			$id=mysql_insert_id();
			
			$query_log_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) 
			VALUES ('".$_SESSION['eschools']['admin_id']."','es_trans_route','Transport','Add Route','".$id."','ADD ROUTR','".$_SERVER['REMOTE_ADDR']."',NOW())";
			mysql_query($query_log_sql);
			
			header('location: ?pid=75&action=routelist&emsg=1');
			}
	}  
}

if(isset($action) && $action == "editroute"){

$route_sql = "SELECT * FROM es_trans_route WHERE status!='Delete' AND id=".$_GET['id'];
$route_exe = mysql_query($route_sql);
$route_row = mysql_fetch_array($route_exe);

	if(isset($updateroute) && $updateroute=="Update Route"){
					
			if ($routetitle=="") {
			$errormessage[0]="Enter route title";	  
			}		
				
			if ($route_via=="") {
			$errormessage[1]="Enter route via"; 
			}
			if ($amount<1) {
		$errormessage[2]="Enter Amount"; 
		}		
			
			if(count($errormessage)==0)
				{
				$route_sql="UPDATE es_trans_route SET `route_title`='".$routetitle."',`route_Via`='".$route_via."',`amount`='".ceil($amount)."' WHERE id=".$id;
				mysql_query($route_sql);
				
				
				$query_log_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) 
				VALUES ('".$_SESSION['eschools']['admin_id']."','es_trans_route','Transport',' Route List','".$id."','EDIT ROUTE','".$_SERVER['REMOTE_ADDR']."',NOW())";
				mysql_query($query_log_sql);

				header('location: ?pid=75&action=routelist&emsg=2');
				}
	}  
}

if(isset($action) && $action == "deleteroute"){

	$route_sql="UPDATE es_trans_route SET `status`='Delete' WHERE id=".$id;
	mysql_query($route_sql);
	
	$query_log_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) 
	VALUES ('".$_SESSION['eschools']['admin_id']."','es_trans_route','Transport','Route List','".$id."','DELETE ROUTE','".$_SERVER['REMOTE_ADDR']."',NOW())";
	mysql_query($query_log_sql);
				
	header('location: ?pid=75&action=routelist&emsg=3');
				
}


if(isset($action) && $action == "deleteroute1"){

	$route_sql="UPDATE es_translist SET `status`='Delete' WHERE id=".$id;
	mysql_query($route_sql);
	
	$query_log_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) 
	VALUES ('".$_SESSION['eschools']['admin_id']."','es_trans_route','Transport','Route List','".$id."','DELETE ROUTE','".$_SERVER['REMOTE_ADDR']."',NOW())";
	mysql_query($query_log_sql);
				
	header('location: ?pid=75&action=routelist1&emsg=3');
				
}

if($action == "routelist" || $action=='print_routelist'){

$q_limit  = 20;
if ( !isset($start) ){
	$start = 0;
   }
$no_rows = sqlnumber("SELECT * FROM es_trans_route WHERE status!='Delete'");
$route_sql = "SELECT * FROM es_trans_route WHERE status!='Delete' ORDER BY id DESC LIMIT ".$start." , ".$q_limit;
$route_row =$db->getRows($route_sql);

$route1_sql = "SELECT * FROM es_trans_route WHERE status!='Delete'";
$route1_exe = mysql_query($route1_sql);
$route1_num = mysql_num_rows($route1_exe);
}
if($action == "routelist1" || $action=='print_routelist1'){

$q_limit  = 10;
if ( !isset($start) ){
	$start = 0;
   }
$no_rows = sqlnumber("SELECT * FROM es_translist WHERE status!='Delete'");
$route_sql = "SELECT * FROM es_translist WHERE status!='Delete' ORDER BY id DESC LIMIT ".$start." , ".$q_limit;
$route_row =$db->getRows($route_sql);

$route1_sql = "SELECT * FROM es_translist WHERE status!='Delete'";
$route1_exe = mysql_query($route1_sql);
$route1_num = mysql_num_rows($route1_exe);
}
if(isset($action) && $action == "addroute1" && $addroute=="Add Route"){


	if(isset($addroute) && $addroute== "Add Route"){
	  			
		if ($routetitle=="") {
		$errormessage[0]="Enter route title";	  
		}		
			
			
		
        if(count($errormessage)==0)
	 		{
			 $route_sql="INSERT INTO es_translist (`route_title`,`status`,`created_on`) VALUES ('".$routetitle."','Active',NOW())";
			mysql_query($route_sql);
			$id=mysql_insert_id();
			
			$query_log_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) 
			VALUES ('".$_SESSION['eschools']['admin_id']."','es_trans_route','Transport','Add Route','".$id."','ADD ROUTR','".$_SERVER['REMOTE_ADDR']."',NOW())";
			mysql_query($query_log_sql);
			
			header('location: ?pid=75&action=routelist1&emsg=1');
			}
	}  
}

if(isset($action) && $action == "editroute1"){

$route_sql = "SELECT * FROM es_translist WHERE status!='Delete' AND id=".$_GET['id'];
$route_exe = mysql_query($route_sql);
$route_row = mysql_fetch_array($route_exe);

	if(isset($updateroute) && $updateroute=="Update Route"){
					
			if ($routetitle=="") {
			$errormessage[0]="Enter route title";	  
			}		
		
			if(count($errormessage)==0)
				{
				$route_sql="UPDATE es_translist SET `route_title`='".$routetitle."' WHERE id=".$id;
				mysql_query($route_sql);
				
				
				$query_log_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) 
				VALUES ('".$_SESSION['eschools']['admin_id']."','es_trans_route','Transport',' Route List','".$id."','EDIT ROUTE','".$_SERVER['REMOTE_ADDR']."',NOW())";
				mysql_query($query_log_sql);

				header('location: ?pid=75&action=routelist1&emsg=2');
				}
	}  
}
?>


