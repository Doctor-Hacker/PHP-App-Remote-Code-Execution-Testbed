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
						  'emsg','search_route'					
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




if(isset($action) && $action == "addboard" && $addboard=="Add Board"){


	if(isset($addboard) && $addboard== "Add Board"){
	  			
		if ($route_id=="") {
		$errormessage[0]="Select route";	  
		}
		
		if ($boardtitle=="") {
		$errormessage[1]="Enter board title";	  
		}		
			
		if ($board_capacity=="") {
		$errormessage[2]="Enter board capacity"; 
		}
		
		if (!$vlc->is_nonNegNumber($board_capacity)) {
		$errormessage[2]="Enter board capacity"; 
		}
		
        if(count($errormessage)==0)
	 		{
			$board_sql="INSERT INTO es_trans_board (`route_id`,`board_title`,`capacity`,`status`,`created_on`) VALUES ('".$route_id."','".$boardtitle."','".$board_capacity."','Active',NOW())";
			mysql_query($board_sql);
			$id=mysql_insert_id();
			$query_log_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) 
			VALUES ('".$_SESSION['eschools']['admin_id']."','es_trans_route','Transport','Board List','".$id."','ADD BOARD','".$_SERVER['REMOTE_ADDR']."',NOW())";
			mysql_query($query_log_sql);
			
			header('location: ?pid=76&action=boardlist&emsg=1');
			}
	}  
}

if(isset($action) && $action == "editboard"){
	if(isset($updateboard) && $updateboard=="Update Board"){				
			
			if ($route_id=="") {
			$errormessage[0]="Select route";	  
			}
			
			if ($boardtitle=="") {
			$errormessage[1]="Enter board title";	  
			}	
				
			if ($board_capacity=="") {
			$errormessage[2]="Enter board capacity"; 
			}		
			
			if(count($errormessage)==0)
				{
				$board_sql="UPDATE  es_trans_board SET `route_id`='".$route_id."',`board_title`='".$boardtitle."',`capacity`='".$board_capacity."' WHERE id=".$id;
				mysql_query($board_sql);
			
				$query_log_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) 
				VALUES ('".$_SESSION['eschools']['admin_id']."','es_trans_route','Transport','Board List','".$id."','EDIT BOARD','".$_SERVER['REMOTE_ADDR']."',NOW())";
				mysql_query($query_log_sql);
			
				header('location: ?pid=76&action=boardlist&emsg=2');
				}
	}
$board_sql = "SELECT * FROM  es_trans_board WHERE status!='Delete' AND id=".$_GET['id'];
$board_exe = mysql_query($board_sql);
$board_row = mysql_fetch_array($board_exe);  


}

if(isset($action) && $action == "deleteboard"){

	$board_sql="UPDATE es_trans_board SET `status`='Delete' WHERE id=".$id;
	mysql_query($board_sql);
	
	$query_log_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) 
	VALUES ('".$_SESSION['eschools']['admin_id']."','es_trans_board','Transport','Board List','".$id."','DELETE BOARD','".$_SERVER['REMOTE_ADDR']."',NOW())";
	mysql_query($query_log_sql);
				
	header('location: ?pid=76&action=boardlist&emsg=3');
				
}




if($action == "boardlist" || $action=='print_boardlist'){

$q_limit  = 10;
if ( !isset($start) ){
	$start = 0;
   }
   if(isset($search_route) && $search_route!=""){
    	$page_Url = "&search_route=Search";
		if($route_id!=""){
		$condition = " AND route_id='".$route_id."'";
		$page_Url .= "&route_id=$route_id";}
		
   }
   $no_rows = sqlnumber("SELECT * FROM es_trans_board WHERE status!='Delete' ".$condition."");
$board_sql = "SELECT * FROM es_trans_board WHERE status!='Delete' ".$condition." ORDER BY id DESC LIMIT ".$start." , ".$q_limit;
$board_row =$db->getRows($board_sql);

$board1_sql = "SELECT * FROM es_trans_board WHERE status!='Delete'";
$board1_exe = mysql_query($board1_sql);
$board1_num = mysql_num_rows($board1_exe);

$route_sql = "SELECT * FROM es_trans_route WHERE status!='Delete'";
$route_exe = mysql_query($route_sql);
while($route_row = mysql_fetch_array($route_exe)){
$route_array[$route_row['id']]=$route_row['route_title'];

}

}
?>


