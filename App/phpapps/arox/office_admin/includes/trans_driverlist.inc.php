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
						  'adddriver',
						  'addvehicle',
						  'updatedriver',
						  'id',	
						  'driver_name','driver_addrs','diver_mobile',
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

if(isset($action) && $action == "adddriver" && $adddriver=="Add Driver"){
//if($adddriver == "Add Driver"){
		if ($driver_name=="") {
		$errormessage[0]="Enter driver name";	  
		}
		if ($driver_addrs=="") {
		$errormessage[0]="Enter driver Addr";	  
		}
		if ($diver_mobile=="") {
		$errormessage[0]="Enter driver Mobile no";	  
		}
		
		if ($driver_license=="") {
		$errormessage[1]="Enter driver license";	  
		}
		
		if ($driver_issuing_authority=="") {
		$errormessage[2]="Enter issuing authority";	  
		}		
			
		if ($driver_dl_valid_upto=="") {
		$errormessage[3]="Enter valid upto"; 
		}
		
		$driver_dl_valid_upto_new=func_date_conversion('d/m/Y', 'Y-m-d', $driver_dl_valid_upto);	
			
			if(count($errormessage)==0)
				{
					
				if (isset($driver_license)){
					$es_transport_drivers ->driver_license = $driver_license;
				}
				if (isset($driver_issuing_authority)){
					$es_transport_drivers ->issuing_authority = $driver_issuing_authority;
				}
				if (isset($driver_dl_valid_upto)){
					$es_transport_drivers ->valid_date = $driver_dl_valid_upto;
				}
				//$driver_document = $_FILES['driver_document']['name'];				
//				if(is_uploaded_file($_FILES['driver_document']['tmp_name'])) {	
//						$ext=explode(".",$_FILES['driver_document']['name']);
//						$new_thumbname = "driver_dl__".$driver_id."_".$ext[0].".".$ext[1];
//						$updir = "images/dirverdoc/";
//						$uppath = $updir.$new_thumbname;
//						move_uploaded_file($_FILES['driver_document']['tmp_name'],$uppath);
//						$license_doc=$new_thumbname;}
//					$es_transport_drivers->license_doc = $license_doc;
				//$driver_id = $es_transport_drivers->Save();
				$driver_document = $_FILES['driver_document']['name'];
	
		if(is_uploaded_file($_FILES['driver_document']['tmp_name'])) {
			
			$ext = explode(".",$_FILES['driver_document']['name']);
			
			$str = date("mdY_hms");
			
			$new_thumbname = "st_".$str."_".$ext[0].".".$ext[1];
			
			$updir = "images/dirverdoc/";
			
			$uppath = $updir.$new_thumbname;
			
			move_uploaded_file($_FILES['driver_document']['tmp_name'],$uppath);
			
			$driver_document = $new_thumbname;
			
		    } else {
		
			$driver_document = "userphoto.gif";
			
		}
		
		if(count($errormessage)==0)
		{
				$driverdetails_sql="INSERT INTO es_trans_driver_details (`driver_name`,`driver_addrs`,`diver_mobile`,`driver_license`,`issuing_authority`,`valid_date`,`driver_id`,`status`) VALUES ('".$driver_name."','".$driver_addrs."','".$diver_mobile."','".$driver_license."','".$driver_issuing_authority."','".$driver_dl_valid_upto_new."','".$_GET['id']."','Active')";
				mysql_query($driverdetails_sql);
				$driver_id=mysql_insert_id();
		
				$query_log_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) 
				VALUES ('".$_SESSION['eschools']['admin_id']."','es_trans_driver_details','Transport','Driver Details List','".$driver_id."',".$_GET['id']."','Active')";
				mysql_query($query_log_sql);
				}
				}
				header('location:?pid=81&action=driverlist&emsg=1');
				exit;
			}
	
	if($action == "deletedriver")
	{
		$sqlDelete="delete from es_trans_driver_details where id='".$_GET["id"]."'";
		mysql_query($sqlDelete);
		header('location:?pid=81&action=driverlist&emsg=3');
	}
if(isset($action) && $action == "editdriver"){

	$driverdetails_sql2 = mysql_query("SELECT * FROM  es_trans_driver_details WHERE id=".$_GET['id']);
	$driverdetails_sql1=mysql_fetch_assoc($driverdetails_sql2);
	
	if(isset($updatedriver) && $updatedriver=="Update Driver"){		 
			
		if ($driver_name=="") {
		$errormessage[0]="Enter driver name";	  
		}
		if ($driver_addrs=="") {
		$errormessage[0]="Enter driver Addr";	  
		}
		if ($diver_mobile=="") {
		$errormessage[0]="Enter driver Mobile no";	  
		}
		if ($driver_license=="") {
		$errormessage[0]="Enter driver license";	  
		}
		
		if ($driver_issuing_authority=="") {
		$errormessage[1]="Enter issuing authority";	  
		}		
			
		if ($driver_dl_valid_upto=="") {
		$errormessage[2]="Enter valid upto"; 
		}
		
		$driver_dl_valid_upto_new=func_date_conversion('d/m/Y', 'Y-m-d', $driver_dl_valid_upto);	
			
			if(count($errormessage)==0)
				{
					
			    $driverdetails_sql = "SELECT * FROM  es_trans_driver_details WHERE id=".$_GET['id'];
				$driverdetails_exe = mysql_query($driver_sql);
				$driverdetails_num = mysql_num_rows($driverdetails_sql2);
				
				if($driverdetails_num!=0){
				$driverdetails_sql="UPDATE  es_trans_driver_details SET `driver_name`='".$driver_name."',`driver_addrs`='".$driver_addrs."',`diver_mobile`='".$diver_mobile."',`driver_license`='".$driver_license."',`issuing_authority`='".$driver_issuing_authority."',`valid_date`='".$driver_dl_valid_upto_new."' WHERE id=".$_GET['id'];
				mysql_query($driverdetails_sql);
				$driver_id=$_GET['id'];	
				
				$query_log_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) 
				VALUES ('".$_SESSION['eschools']['admin_id']."','es_trans_driver_details','Transport','Driver Details List','".$driver_id."','UPDATE DETAILS','".$_SERVER['REMOTE_ADDR']."',NOW())";
				mysql_query($query_log_sql);
				
							
				}else{ 
				$driverdetails_sql="INSERT INTO es_trans_driver_details (`driver_license`,`issuing_authority`,`valid_date`,`driver_id`,`status`) VALUES ('".$driver_license."','".$driver_issuing_authority."','".$driver_dl_valid_upto_new."','".$_GET['id']."','Active')";
				mysql_query($driver_sql);
				$driver_id=mysql_insert_id();
				
				$query_log_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) 
				VALUES ('".$_SESSION['eschools']['admin_id']."','es_trans_driver_details','Transport','Driver Details List','".$driver_id."','UPDATE DETAILS','".$_SERVER['REMOTE_ADDR']."',NOW())";
				mysql_query($query_log_sql);
				
				
				}
					if(is_uploaded_file($_FILES['driver_document']['tmp_name'])) {	
						$ext=explode(".",$_FILES['driver_document']['name']);
						$new_thumbname = "driver_dl__".$driver_id."_".$ext[0].".".$ext[1];
						$updir = "images/dirverdoc/";
						$uppath = $updir.$new_thumbname;
						move_uploaded_file($_FILES['driver_document']['tmp_name'],$uppath);
						$license_doc=$new_thumbname;
						if($driverdetails_num!=0){
						$driverdetails_sql="UPDATE  es_trans_driver_details SET `license_doc`='".$license_doc."' WHERE id=".$driver_id;
						mysql_query($driverdetails_sql);
						}else{
						$driverdetails_sql="UPDATE  es_trans_driver_details SET `license_doc`='".$license_doc."' WHERE id=".$driver_id;
						mysql_query($driverdetails_sql);
						}
							
					}
					
				header('location:?pid=81&action=driverlist&emsg=2');
				}
	}
$driverdetails_sql = "SELECT * FROM  es_trans_driver_details WHERE id=".$_GET['id'];
$driverdetails_exe = mysql_query($driverdetails_sql);
$driverdetails_row = mysql_fetch_array($driverdetails_exe);  
}


if(isset($action) && $action == "viewdriver"){
$driverdetails_sql = "SELECT * FROM  es_trans_driver_details WHERE id=".$_GET['id'];
$driverdetails_exe = mysql_query($driverdetails_sql);
$driverdetails_row12 = mysql_fetch_array($driverdetails_exe);  
}

if($action == "driverlist" || $action=='print_driverlist'){
$q_limit  = 20;
if ( !isset($start) ){
	$start = 0;

   }
$no_rows = sqlnumber("SELECT * FROM es_trans_driver_details WHERE status!='Delete'");
$driverdetails_sql = "SELECT * FROM es_trans_driver_details WHERE status!='Delete' ORDER BY driver_id DESC LIMIT ".$start." , ".$q_limit;
$driverdetails_row =$db->getRows($driverdetails_sql);
 
              /*       $driverdetails_sql="SELECT * FROM es_trans_driver_details WHERE driver_id=".$driver['es_staffid'];
					$driverdetails_exe=mysql_query($driverdetails_sql);
					$driverdetails_row=mysql_fetch_array($driverdetails_exe);
                $driver_sql = "SELECT * FROM  es_trans_driver_details WHERE driver_id=".$_GET['id'];
				$driver_exe = mysql_query($driver_sql);
				$driver_num = mysql_num_rows($driver_exe);
*/
/*$no_rows = sqlnumber("SELECT * FROM es_staff WHERE st_post='1' AND st_department='1'");
$driver_sql = "SELECT * FROM es_staff WHERE st_post='1' AND st_department='1' ORDER BY es_staffid DESC LIMIT ".$start." , ".$q_limit;
$driver_row =$db->getRows($driver_sql);
*/
$no_rows = sqlnumber("SELECT * FROM es_trans_driver_details");
$driver_sql =("SELECT * FROM `es_trans_driver_details` LIMIT ".$start." , ".$q_limit);
$driver_row =$db->getRows($driver_sql);

$driver1_sql = "SELECT * FROM es_staff WHERE st_post='1'";
$driver1_exe = mysql_query($driver1_sql);
$driver1_num = mysql_num_rows($driver1_exe);
}
?>


