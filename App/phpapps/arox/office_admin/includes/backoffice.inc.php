<?php
sm_registerglobal('pid', 'action','start', 'emsg', 'dispatchcategory','submit','group','dispatchdate','company','address','subject','partculars','referenceno','recivedby','submitedto','uploadfile','type','status','in_receivedthrough','consignment_no','out_sender', 'out_to', 'out_address', 'out_sentthrough', 'dispatch_type', 'outward_dispatch_type','p_latter_id','s_from','s_to', 's_reference', 'd_letter_types', 's_subject', 's_particulars', 's_group', 's_staus', 'Search', 'dispatch_type', 'export','courrier_name' );




			
$in_receivedthrough_array=array( 1=>"Courier",2=>"Speed post",3=>"By hand"); //array_print($in_receivedthrough_array);

$in_sendthrough_array=array( 1=>"Courier",2=>"Speed post",3=>"By Hand"); //array_print($in_receivedthrough_array);
			
			 
			 
			 
/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
$dispatchcat_sql = "SELECT * FROM `es_dispatch` WHERE `status`!='Delete'";
$dispatchcat_exe = mysql_query($dispatchcat_sql);
while($dispatchcat_row=mysql_fetch_array($dispatchcat_exe)){
$dispat_group[$dispatchcat_row['id']]=$dispatchcat_row['dispatch_category'];
}

if($action=="dispatchcategory" || $action=='dispatchcategoryedit' || $action=='print_list_groupname'){
$cat_sql = "SELECT * FROM `es_dispatch` WHERE `status`!='Delete'";
$cat_exe = mysql_query($cat_sql);
}

if($action=='dispatchcategory'){
	if (isset($submit) && $submit!=""){		
		
			if ($dispatchcategory==""){			
				$errormessage[1]="Enter dispatch group";
			}
			if ($dispatchcategory!=""){	
				$exesqlquery = "SELECT * FROM `es_dispatch` WHERE `dispatch_category`='".$dispatchcategory."'";
				$exesqlquery_num = sqlnumber($exesqlquery);	
				if($exesqlquery_num>0){
				$errormessage[1]="Group already exist";
				}
			}
		
		if (count($errormessage)==0){
		$insert_sql="INSERT INTO es_dispatch (`dispatch_category`,`created_on`) VALUES ('".$dispatchcategory."',NOW())";
		mysql_query($insert_sql);
		
$id=mysql_insert_id();



  if(isset($id) && $id!="") {
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_dispatch','DISPATCH GROUP ','CREATE DISPATCH GROUP','".$id."','CREATE DISPATCH GROUP','".$_SERVER['REMOTE_ADDR']."',NOW())";
$log_insert_exe=mysql_query($log_insert_sql);
	
		header("Location:?pid=74&action=dispatchcategory&emsg=1");		
		

		exit();		
		}	}	
	}
}

if($action=='dispatchcategoryedit'){
$category_sql = "SELECT * FROM `es_dispatch` WHERE `status`!='Delete' AND id=".$_GET['id'];
$category_exe = mysql_query($category_sql);
$category_row = mysql_fetch_array($category_exe);

	if (isset($submit) && $submit!=""){		
		
			if ($dispatchcategory==""){			
				$errormessage[1]="Enter dispatch group";
			}
			if ($dispatchcategory!=""){	
				$exesqlquery = "SELECT * FROM `es_dispatch` WHERE `dispatch_category`='".$dispatchcategory."' AND id!=".$_GET['id'];
				$exesqlquery_num = sqlnumber($exesqlquery);	
				if($exesqlquery_num>0){
				$errormessage[1]="Group already exist";
				}
			}
		
		if (count($errormessage)==0){
		$update_sql="UPDATE es_dispatch SET dispatch_category='".$dispatchcategory."' WHERE id=".$_GET['id'];
		mysql_query($update_sql);
		
							
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_dispatch','DISPATCH GROUP','CREATE DISPATCH GROUP','".$_GET['id']."','EDIT DISPATCH GROUP','".$_SERVER['REMOTE_ADDR']."',NOW())";
$log_insert_exe=mysql_query($log_insert_sql);
		
		
		header("Location:?pid=74&action=dispatchcategory&emsg=2");		
		exit();		
		}		
	}
}

if($action=='dispatchcategorydelete'){
$category_sql = "UPDATE `es_dispatch` SET status='Delete' WHERE id=".$_GET['id'];
$category_exe = mysql_query($category_sql);


$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_dispatch','DISPATCH GROUP','CREATE DISPATCH GROUP','".$_GET['id']."','DELETE DISPATCH CATEGORY','".$_SERVER['REMOTE_ADDR']."',NOW())";
$log_insert_exe=mysql_query($log_insert_sql);


header("Location:?pid=74&action=dispatchcategory&emsg=3");	
exit();
}

if($action=='incomingletters'){
	if (isset($submit) && $submit!=""){	
		
			if ($group==""){			
				$errormessage[1]="Select Group";
			}
			if ($dispatchdate==""){			
				$errormessage[2]="Enter dispatch date";
			}
			if ($company==""){			
				$errormessage[3]="Enter company";
			}
			if ($address==""){			
				$errormessage[4]="Enter address";
			}
			if ($subject==""){			
				$errormessage[5]="Enter subject";
			}
			if ($partculars==""){			
				$errormessage[6]="Enter particulars";
			}
			if ($referenceno==""){			
				$errormessage[7]="Enter reference";
			}
			if ($recivedby==""){			
				$errormessage[8]="Enter received by";
			}
			if ($submitedto==""){			
				$errormessage[9]="Enter submited to";
			}		
			if (count($errormessage)==0){
			
			if($_FILES['uploadfile']['name']!=""){
			$imgextsm = fileextension($_FILES['uploadfile']['name']);
			$imgnamesmall = "dispatch".date("YmdHis").".".$imgextsm;			
			$imgtempsm = $_FILES['uploadfile']['tmp_name'];
			$up_path1 = "dispatchuploads/".$imgnamesmall;
			@move_uploaded_file($imgtempsm, $up_path1);
			chmod($up_path1, 0755); 
			}
			
			$dispatchdate_new=func_date_conversion('d/m/Y', 'Y-m-d', $dispatchdate);
			
			$insert_sql="INSERT INTO es_dispatch_entry (`dispatchgroup`,`dateofdispatch`,`received_company`,`received_address`,`subject`,`partculars`,`reference_no`,`recived_by`,`submited_to`,`upload_file`,`type`,`latter_status`,`status`,`created_on`,`in_receivedthrough`,`consignment_no`,courrier_name,`d_letter_types`) 
												VALUES ('".$group."','".$dispatchdate_new."','".$company."','".$address."','".$subject."','".$partculars."','".$referenceno."','".$recivedby."','".$submitedto."','".$up_path1."','".$type."','".$status."','Active',NOW(),'".$in_receivedthrough."','".$consignment_no."','".$courrier_name."','inward')";
			mysql_query($insert_sql);
			
			$id=mysql_insert_id();

if(isset($id) && $id!="") {
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_dispatch_entry','DISPATCH GROUP','Add / Edit Inward Dispatch Entry ','".$id."',' Add Inward Dispatch Entry ','".$_SERVER['REMOTE_ADDR']."',NOW())";
$log_insert_exe=mysql_query($log_insert_sql);

			
			
			
			
			//exit;
			header("Location:?pid=74&action=manageletters&emsg=1");		
			exit();		
			}		
	}}

}


if($action=='outletters'){
if($p_latter_id!=""){
$dispath_sql = "SELECT * FROM `es_dispatch_entry` WHERE `id`='".$p_latter_id."'";
$dispath_exe = mysql_query($dispath_sql);
$dispath_row = mysql_fetch_array($dispath_exe);
}
	if (isset($submit) && $submit!=""){	
		
			if ($group==""){			
				$errormessage[1]="Select Group";
			}
			if ($dispatchdate==""){			
				$errormessage[2]="Enter dispatch date";
			}
			if ($out_sender==""){			
				$errormessage[3]="Enter sender";
			}
			if ($out_to==""){			
				$errormessage[4]="Enter send to";
			}
			
			if ($out_address==""){			
				$errormessage[5]="Enter send address";
			}
			if ($subject==""){			
				$errormessage[6]="Enter subject";
			}
			if ($partculars==""){			
				$errormessage[7]="Enter particulars";
			}
			if ($referenceno==""){			
				$errormessage[8]="Enter reference";
			}					
			if (count($errormessage)==0){
			
			if($_FILES['uploadfile']['name']!=""){
			$imgextsm = fileextension($_FILES['uploadfile']['name']);
			$imgnamesmall = "outdispatch".date("YmdHis").".".$imgextsm;			
			$imgtempsm = $_FILES['uploadfile']['tmp_name'];
			$up_path1 = "dispatchuploads/".$imgnamesmall;
			@move_uploaded_file($imgtempsm, $up_path1);
			chmod($up_path1, 0755); 
			}
			
			$dispatchdate_new=func_date_conversion('d/m/Y', 'Y-m-d', $dispatchdate);
			
			if(isset($p_latter_id) && $p_latter_id!=""){
			$outward_dispatch_type="Repaly Outward";
			
			$category_sql = "UPDATE `es_dispatch_entry` SET latter_status ='Closed' WHERE id=".$p_latter_id;
			$category_exe = mysql_query($category_sql);
			
			
			
			
			
			}else{$outward_dispatch_type="New Outward";}
			
			$insert_sql="INSERT INTO es_dispatch_entry 
			(`dispatchgroup`,
			`dateofdispatch`,
			`out_sender`,
			`out_to`,
			`out_address`,
			`subject`,
			`partculars`,
			`reference_no`,
			`out_sentthrough`,
			`consignment_no`,
			`upload_file`,
			`dispatch_type`,
			`latter_status`,
			`dispatch_type`,
			`status`,
			`d_letter_types`,
			`outward_dispatch_type`,
			`p_latter_id`,
			courrier_name,
			`created_on`)
			 VALUES (
			 '".$group."',
			 '".$dispatchdate_new."',
			 '".$out_sender."',
			 '".$out_to."',
			 '".$out_address."',
			 '".$subject."',
			 '".$partculars."',
			 '".$referenceno."',
			 '".$out_sentthrough."',
			 '".$consignment_no."',
			 '".$up_path1."',
			 '".$dispatch_type."',
			 '".$status."',
			 '".$dispatch_type."',
			 'Active',
			 'outward',
			 '".$outward_dispatch_type."',
			 '".$p_latter_id."',
			 '".$courrier_name."',
			 NOW())";
			 
			mysql_query($insert_sql);
			//exit;
			
			$id=mysql_insert_id();



  if(isset($id) && $id!="") {
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_dispatch_entry','DISPATCH GROUP ','ADD / EDIT OUTWARD DISPATCH ENTRY','".$id."','Add  Outward Dispatch Entry','".$_SERVER['REMOTE_ADDR']."',NOW())";
$log_insert_exe=mysql_query($log_insert_sql);

		header("Location:?pid=74&action=manageletters&emsg=1");		
			exit();		
			}		
	}

}}



if($action=='manageletters'  && $export!="export" ){
			$q_limit  = 20;
			if ( !isset($start) ){
				$start = 0;
			   }
			   
		if(isset($Search) && $Search=="Search"){
			$condition="";  
			$fromdate1 = func_date_conversion("d/m/Y","Y-m-d",$s_from);
			$todate1 = func_date_conversion("d/m/Y","Y-m-d",$s_to);
			if($s_from!="" && $s_to==!"")
			{
				$condition .= " AND (dateofdispatch BETWEEN  '".$fromdate1."' and '".$todate1."')";
			} 
			else if($s_from!="") {
				$condition .= " AND dateofdispatch  >=  '".$fromdate1."'";
			} 
			else if($s_to!="") {
				$condition .= " AND dateofdispatch  <= '".$todate1."'";
			}
			
			if($s_reference!="")
			{
				$condition .= " AND reference_no LIKE '%".$s_reference."%'";
			}
			
			if($d_letter_types!="")
			{
				$condition .= " AND d_letter_types='".$d_letter_types."'";
			}
			
			if($s_subject!="")
			{
				$condition .= " AND subject LIKE '%".$s_subject."%'";
			}
			
			if($s_particulars!="")
			{
				$condition .= " AND partculars LIKE '%".$s_particulars."%'";
			}
			
			if($s_group!="")
			{
				$condition .= " AND dispatchgroup='".$s_group."'";
			}
			
			if($s_staus!="")
			{
				$condition .= " AND latter_status='".$s_staus."'";
			}
		}

$entry_sql = "SELECT * FROM `es_dispatch_entry` WHERE `status`!='Delete' ".$condition." ORDER BY id DESC LIMIT ".$start." , ".$q_limit;
$entry_exe = mysql_query($entry_sql);

$entry1_sql = "SELECT * FROM `es_dispatch_entry` WHERE `status`!='Delete' ".$condition." ORDER BY id DESC";
$entry1_exe = mysql_query($entry1_sql);
$entry1_num = mysql_num_rows($entry1_exe);
}



if($action=='manageletters' && $export=="export"){			   

			$condition="";  
			$fromdate1 = func_date_conversion("d/m/Y","Y-m-d",$s_from);
			$todate1 = func_date_conversion("d/m/Y","Y-m-d",$s_to);
			if($s_from!="" && $s_to==!"")
			{
				$condition .= " AND (dateofdispatch BETWEEN  '".$fromdate1."' and '".$todate1."')";
			} 
			else if($s_from!="") {
				$condition .= " AND dateofdispatch  >=  '".$fromdate1."'";
			} 
			else if($s_to!="") {
				$condition .= " AND dateofdispatch  <= '".$todate1."'";
			}
			
			if($s_reference!="")
			{
				$condition .= " AND reference_no='".$s_reference."'";
			}
			
			if($d_letter_types!="")
			{
				$condition .= " AND d_letter_types='".$d_letter_types."'";
			}
			
			if($s_subject!="")
			{
				$condition .= " AND subject='".$s_subject."'";
			}
			
			if($s_particulars!="")
			{
				$condition .= " AND partculars='".$s_particulars."'";
			}
			
			if($s_group!="")
			{
				$condition .= " AND dispatchgroup='".$s_group."'";
			}
			
			if($s_staus!="")
			{
				$condition .= " AND latter_status='".$s_staus."'";
			}	

	   
		$data=
		'"Dispatch Type"'."\t".
		'"Group"'."\t".
		'"Date"'."\t".
		'"Reference"'."\t".
		'"Subject"'."\t".
		'"Particulars"'."\t".
		'"Consignment_No"'."\t".
		
		
		'"Inward_Received_From_Company"'."\t".
		'"Inward_Received_From_Address"'."\t".
		'"Inward_Received_by"'."\t".
		'"Inward_Submitted_To"'."\t".
		'"Inward_Received_Through"'."\t".
		'"Inward_Type"'."\t".
		'"Inward_Status"'."\t".
		
		'"Outward_Sender"'."\t".
		'"Outward_Send_to"'."\t".
		'"Outward_Send_Address"'."\t".	
		'"Outward_Sent_Through"'."\t".
		'"Outward_Type"'."\n"; 
		
					   
		$entry_sql = "SELECT d_letter_types,dispatchgroup,dateofdispatch,reference_no,subject,partculars,consignment_no,received_company,received_address,recived_by,submited_to,in_receivedthrough,type,latter_status,out_sender,out_to,out_address,out_sentthrough,dispatch_type FROM `es_dispatch_entry` WHERE `status`!='Delete' ".$condition." ORDER BY id DESC";		
		
	   
	    $details = $db->getRows($entry_sql);
		
		
		
		$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_dispatch_entry','Manage Dispatch Letters','Manage Dispatch Letters','". $details."','EXPORT DISPATCH GROUP','".$_SERVER['REMOTE_ADDR']."',NOW())";
$log_insert_exe=mysql_query($log_insert_sql);

		
		
		//array_print($details);
		
			//exit;
		if(count($details)>0 ){
		foreach ($details as $row) { 
			$line = '';
			foreach($row as $field=>$value) { if($field=="in_receivedthrough"){$value=$in_receivedthrough_array[$value];} if($field=="out_sentthrough"){$value=$in_sendthrough_array[$value];} if($field=="dispatchgroup"){$value=$dispat_group[$value];}
			
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
		header('Content-Disposition: attachment; filename="backoffice.xls"');
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$data";
		exit;
	 }
}




if($action=='dispatchletterdelete'){
$category_sql = "UPDATE `es_dispatch_entry` SET status='Delete' WHERE id=".$_GET['id'];
$category_exe = mysql_query($category_sql);


		$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_dispatch_entry','Manage Dispatch Letters ','Manage Dispatch Letters','".$_GET['id']."','Delete Dispatch Entry ','".$_SERVER['REMOTE_ADDR']."',NOW())";
$log_insert_exe=mysql_query($log_insert_sql);




header("Location:?pid=74&action=manageletters&emsg=3");	
exit();
}

if($action=='dispatchletterview'){
$entry_sql = "SELECT * FROM `es_dispatch_entry` WHERE `status`!='Delete' AND id=".$_GET['id'];
$entry_exe = mysql_query($entry_sql);
$entry_row = mysql_fetch_array($entry_exe);

$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_dispatch_entry','DISPATCH GROUP ','Manage Dispatch Letters','".$_GET['id']."','VIEW DISPATCH GROUP','".$_SERVER['REMOTE_ADDR']."',NOW())";
$log_insert_exe=mysql_query($log_insert_sql);


}



if($action=='dispatchletteredit'){
$entry_sql = "SELECT * FROM `es_dispatch_entry` WHERE `status`!='Delete' AND id=".$_GET['id'];
$entry_exe = mysql_query($entry_sql);
$entry_row = mysql_fetch_array($entry_exe);


	if (isset($submit) && $submit!=""){	
		
			if ($group==""){			
				$errormessage[1]="Select Group";
			}
			if ($dispatchdate==""){			
				$errormessage[2]="Enter dispatch date";
			}
			if ($company==""){			
				$errormessage[3]="Enter company";
			}
			if ($address==""){			
				$errormessage[4]="Enter address";
			}
			if ($subject==""){			
				$errormessage[5]="Enter subject";
			}
			if ($partculars==""){			
				$errormessage[6]="Enter partculars";
			}
			if ($referenceno==""){			
				$errormessage[7]="Enter reference no";
			}
			if ($recivedby==""){			
				$errormessage[8]="Enter recived by";
			}
			if ($submitedto==""){			
				$errormessage[9]="Enter submited to";
			}		
			if (count($errormessage)==0){
			
			if($_FILES['uploadfile']['name']!=""){
			$imgextsm = fileextension($_FILES['uploadfile']['name']);
			$imgnamesmall = "dispatch".date("YmdHis").".".$imgextsm;			
			$imgtempsm = $_FILES['uploadfile']['tmp_name'];
			$up_path1 = "dispatchuploads/".$imgnamesmall;
			@move_uploaded_file($imgtempsm, $up_path1);
			chmod($up_path1, 0755); 
			$condition=" , `upload_file`='".$up_path1."'";
			}
			
			$dispatchdate_new=func_date_conversion('d/m/Y', 'Y-m-d', $dispatchdate);
			
	
			
			
			$update_sql="UPDATE es_dispatch_entry SET 			
			`dispatchgroup`='".$group."',
			`dateofdispatch`='".$dispatchdate_new."',
			`received_company`='".$company."',
			`received_address`='".$address."',
			`subject`='".$subject."',
			`partculars`='".$partculars."',
			`reference_no`='".$referenceno."',
			`consignment_no`='".$consignment_no."',
			`recived_by`='".$recivedby."',
			`submited_to`='".$submitedto."',			
			`type`='".$type."',
			`courrier_name`='".$courrier_name."',
			`latter_status`='".$status."' ".$condition."			
			 WHERE id=".$_GET['id'];		
			 mysql_query($update_sql);
			//exit;
			
			
		$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_dispatch_entry','Manage Dispatch Letters ','Manage Dispatch Letters','".$_GET['id']."','Edit Inward Dispatch Entry ','".$_SERVER['REMOTE_ADDR']."',NOW())";
$log_insert_exe=mysql_query($log_insert_sql);



			
			
			header("Location:?pid=74&action=manageletters&emsg=2");		
			exit();		
			}		
	}


}




if($action=='outwarddispatchletteredit'){
$entry_sql = "SELECT * FROM `es_dispatch_entry` WHERE `status`!='Delete' AND id=".$_GET['id'];
$entry_exe = mysql_query($entry_sql);
$entry_row = mysql_fetch_array($entry_exe);


	if (isset($submit) && $submit!=""){	
		
			if ($group==""){			
				$errormessage[1]="Select Group";
			}
			if ($dispatchdate==""){			
				$errormessage[2]="Enter dispatch date";
			}
			if ($out_sender==""){			
				$errormessage[3]="Enter sender";
			}
			if ($out_to==""){			
				$errormessage[4]="Enter send to";
			}
			if ($out_address==""){			
				$errormessage[5]="Enter send address";
			}
			if ($partculars==""){			
				$errormessage[6]="Enter partculars";
			}
			if ($referenceno==""){			
				$errormessage[7]="Enter reference";
			}
			if ($subject==""){			
				$errormessage[8]="Enter subject";
			}
					
			if (count($errormessage)==0){			
			if($_FILES['uploadfile']['name']!=""){
			$imgextsm = fileextension($_FILES['uploadfile']['name']);
			$imgnamesmall = "dispatch".date("YmdHis").".".$imgextsm;			
			$imgtempsm = $_FILES['uploadfile']['tmp_name'];
			$up_path1 = "dispatchuploads/".$imgnamesmall;
			@move_uploaded_file($imgtempsm, $up_path1);
			chmod($up_path1, 0755); 
			$condition=" , `upload_file`='".$up_path1."'";
			}
			
			$dispatchdate_new=func_date_conversion('d/m/Y', 'Y-m-d', $dispatchdate);			 
			 			
			$update_sql="UPDATE es_dispatch_entry SET 			
			`dispatchgroup`='".$group."',
			`dateofdispatch`='".$dispatchdate_new."',
			`out_sender`='".$out_sender."',
			`out_to`='".$out_to."',
			`out_address`='".$out_address."',
			`subject`='".$subject."',
			`partculars`='".$partculars."',
			`reference_no`='".$referenceno."',
			`out_sentthrough`='".$out_sentthrough."',
			`consignment_no`='".$consignment_no."',			
			`dispatch_type`='".$dispatch_type."',
			`courrier_name`='".$courrier_name."',
			`dispatch_type`='".$dispatch_type."',
			`latter_status`='".$status."' ".$condition."						
			 WHERE id=".$_GET['id'];		
			 mysql_query($update_sql);
		




		$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_dispatch_entry','Manage Dispatch Letters ','Manage Dispatch Letters','".$_GET['id']."','Edit Outward Dispatch Entry ','".$_SERVER['REMOTE_ADDR']."',NOW())";
$log_insert_exe=mysql_query($log_insert_sql);


			 
			//exit;
			header("Location:?pid=74&action=manageletters&emsg=2");		
			exit();		
			}		
	
}

}



?>