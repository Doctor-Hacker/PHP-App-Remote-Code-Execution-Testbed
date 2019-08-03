<?php

//include_once (INCLUDES_CLASS_PATH . DS . 'class.es_assignment.php');
sm_registerglobal('pid','action','update','emsg','start','chgid','search_hostel_charges','es_buldname','selyear','selmonth','balance','export_hostel_charges');
/**
* Only Admin users can view the pages
*/
checkuserinlogin();

if($action=='view_room_details' || $action=='print_list'){
$room_allotsdet_sel = "SELECT * , B.buld_name as buidingname FROM es_hostelbuld B , es_hostelroom R , es_roomallotment RA  
		 WHERE B.es_hostelbuldid  = R.es_hostelbuldid  
		 AND RA.es_hostelroomid = R.es_hostelroomid AND RA.es_persontype='staff' AND RA.es_personid=".$_SESSION['eschools']['user_id'];
$room_allotdet = $db->getrows($room_allotsdet_sel);

}
if($action=='person_allotment_details'){

$sql_qry = "SELECT * , B.buld_name as buidingname FROM  es_hostelbuld B , es_hostelroom R , es_roomallotment RA 
	WHERE RA.es_roomallotmentid =".$chgid." 
	
	AND RA.es_hostelroomid = R.es_hostelroomid
	AND B.es_hostelbuldid  = R.es_hostelbuldid
	";
	$payamount_details = $db->getrow($sql_qry);
	    
		//$es_roomDetails = new es_hostelperson_item();
		$perid = $payamount_details['es_personid'];
		$pertype = $payamount_details['es_persontype'];
		$qry = "SELECT hi.*, i.in_item_code as h_item_code, i.in_item_name as h_item_name FROM es_hostelperson_item hi, es_in_item_master i WHERE hi.es_personid = '$perid' AND hi.es_persontype = '$pertype' AND hi.hostelperson_itemcode = i.es_in_item_masterid AND hi.hostelperson_itemtype = 'Returnable' AND hi.es_roomallotmentid= '".$chgid."'";
		
		$es_roomDetails = $db->GetRows($qry); 
		
		$payment_det_qry = "SELECT * FROM es_hostel_charges WHERE es_personid=".$perid." AND es_persontype='".$pertype."' AND es_roomallotmentid='".$chgid."'";
		$payment_det = $db->getrows($payment_det_qry);
		
		
	   
}


if($action=='viewdetails'){
		if(isset($search_hostel_charges) && $search_hostel_charges!="" ){
		
		
			if($es_personid > 0 && $persontype==""){
				 $errormessage[0] = "Select Person type";
			}
		}
		if(count($errormessage)==0){

		if(isset($search_hostel_charges) && $search_hostel_charges!="" ){
				$PageUrl = "&search_hostel_charges=Search";
				$condition = "";
				if(isset($es_buldname) && $es_buldname !=""){
						$condition = " AND HC.es_hostelbuldid='".$es_buldname."'";
						$PageUrl .="&es_buldname=$es_buldname"; 
				}
				if(isset($selyear) && $selyear !=""){
						$condition .= " AND YEAR(HC.due_month)=".$selyear."";
						$PageUrl .="&selyear=$selyear"; 
				}
				if(isset($selmonth) && $selmonth !=""){
						$condition .= " AND MONTHNAME(HC.due_month)=".$selmonth."";
						$PageUrl .="&selmonth=$selmonth"; 
				}
		
				if(isset($balance) && $balance !=""){
				        if($balance=='paid'){
						$condition .= " AND HC.balance=0";
						}
						if($balance=='unpaid'){
						$condition .= " AND HC.balance > 0";
						}
						$PageUrl .="&balance=$balance"; 
				}
				
		}
		$qqqrr = "SELECT SUM(room_rate) AS totaldues ,SUM(amount_paid) AS totalamountreceived ,SUM(deduction) AS totaldeduction ,SUM(balance) AS totalbalance FROM  es_hostel_charges ";
		$amounts_arr = $db->getrow($qqqrr);
		 $sql_qry = "SELECT * , B.buld_name as buidingname FROM es_hostel_charges HC , es_hostelbuld B , es_hostelroom R , es_roomallotment RA  
		 WHERE HC.es_hostelbuldid = B.es_hostelbuldid 
		 AND B.es_hostelbuldid  = R.es_hostelbuldid  
		 AND HC.es_roomallotmentid = RA.es_roomallotmentid 
		 AND RA.es_hostelroomid = R.es_hostelroomid
		 AND RA.es_persontype = 'staff'
		 AND RA.es_personid = '".$_SESSION['eschools']['user_id']."'
		  ".$condition."";
		$no_rows = sqlnumber($sql_qry);
		if(!isset($start)){$start=0;}
		$q_limit = 20;
		$sql_qry .=" ORDER BY es_hostel_charges_id DESC LIMIT ".$start.",".$q_limit.""; 
		$charges_details = $db->getrows($sql_qry);
		}

}

if($action=='view_allotment_details'){

                $PageUrl = "&search_hostel_charges=Search";
				$condition = "";
				if(isset($es_buldname) && $es_buldname !=""){
						$condition = " AND HC.es_hostelbuldid='".$es_buldname."'";
						$PageUrl .="&es_buldname=$es_buldname"; 
				}
				if(isset($selyear) && $selyear !=""){
						$condition .= " AND YEAR(HC.due_month)=".$selyear."";
						$PageUrl .="&selyear=$selyear"; 
				}
				if(isset($selmonth) && $selmonth !=""){
						$condition .= " AND MONTHNAME(HC.due_month)=".$selmonth."";
						$PageUrl .="&selmonth=$selmonth"; 
				}
				if($es_personid > 0 && isset($persontype)){
						$condition .= " AND HC.es_personid = ".$es_personid." AND HC.es_persontype='".$persontype."'";
						$PageUrl .="&es_personid=$es_personid&persontype=$persontype"; 
				
				}elseif(isset($persontype) && $persontype !=""){
						$condition .= " AND HC.es_persontype='".$persontype."'";
						$PageUrl .="&persontype=$persontype"; 
				}
				if(isset($balance) && $balance !=""){
				        if($balance=='paid'){
						$condition .= " AND HC.balance=0";
						}
						if($balance=='unpaid'){
						$condition .= " AND HC.balance > 0";
						}
						$PageUrl .="&balance=$balance"; 
				}

$sql_qry = "SELECT * , B.buld_name as buidingname , HC.room_rate as dueamount FROM es_hostel_charges HC , es_hostelbuld B , es_hostelroom R , es_roomallotment RA 
	WHERE HC.es_hostel_charges_id =".$chgid." 
	AND HC.es_roomallotmentid = RA.es_roomallotmentid
	AND RA.es_hostelroomid = R.es_hostelroomid
	AND B.es_hostelbuldid  = R.es_hostelbuldid
	AND HC.es_hostelbuldid = B.es_hostelbuldid ";
	$payamount_details = $db->getrow($sql_qry);
	    
	
		$perid = $payamount_details['es_personid'];
		$pertype = $payamount_details['es_persontype'];
		$qry = "SELECT hi.*, i.in_item_code as h_item_code, i.in_item_name as h_item_name FROM es_hostelperson_item hi, es_in_item_master i WHERE hi.es_personid = '$perid' AND hi.es_persontype = '$pertype' AND hi.hostelperson_itemcode = i.es_in_item_masterid AND hi.hostelperson_itemtype = 'Returnable' ";
		
		$es_roomDetails = $db->GetRows($qry); 
		// insert logs
		$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_hostel_charges','HOSTEL','View Details','".$chgid."','VIEW CHARGE DETAILS','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);
		
	   
}
if($action=='receipt') { 
	 $sql_qry = "SELECT * , B.buld_name as buidingname , HC.room_rate as dueamount FROM es_hostel_charges HC , es_hostelbuld B , es_hostelroom R , es_roomallotment RA 
	WHERE HC.es_hostel_charges_id =".$chgid." 
	AND HC.es_roomallotmentid = RA.es_roomallotmentid
	AND RA.es_hostelroomid = R.es_hostelroomid
	AND B.es_hostelbuldid  = R.es_hostelbuldid
	AND HC.es_hostelbuldid = B.es_hostelbuldid ";
	$payamount_details = $db->getrow($sql_qry);
	}
	
/***************** Export Details **********************/
		if(isset($export_hostel_charges) && $export_hostel_charges!=""){
		
		
		
		
			if($es_personid > 0 && $persontype==""){
				 $errormessage[0] = "Select Person type";
			}
		
		if(count($errormessage)==0){
		
						$PageUrl = "&search_hostel_charges=Search";
				$condition = "";
				if(isset($es_buldname) && $es_buldname !=""){
						$condition = " AND HC.es_hostelbuldid='".$es_buldname."'";
						$PageUrl .="&es_buldname=$es_buldname"; 
				}
				if(isset($selyear) && $selyear !=""){
						$condition .= " AND YEAR(HC.due_month)=".$selyear."";
						$PageUrl .="&selyear=$selyear"; 
				}
				if(isset($selmonth) && $selmonth !=""){
						$condition .= " AND MONTHNAME(HC.due_month)=".$selmonth."";
						$PageUrl .="&selmonth=$selmonth"; 
				}
				
				if(isset($balance) && $balance !=""){
				        if($balance=='paid'){
						$condition .= " AND HC.balance=0";
						}
						if($balance=='unpaid'){
						$condition .= " AND HC.balance > 0";
						}
						$PageUrl .="&balance=$balance"; 
				}
				
				 $sql_qry = "SELECT  B.buld_name , R.room_no , R.room_type , RA.alloted_date , RA.dealloted_date , RA.es_personid , HC.name , HC.father , RA.es_persontype ,HC.due_month , HC.room_rate ,  HC.paid_on , HC.amount_paid , HC.deduction , HC.balance 
				 FROM es_hostel_charges HC , es_roomallotment RA , es_hostelbuld B , es_hostelroom R 
				 WHERE HC.es_roomallotmentid = RA.es_roomallotmentid 
				 AND RA.es_hostelroomid = R.es_hostelroomid
				 AND R.es_hostelbuldid = B.es_hostelbuldid
				 AND RA.es_persontype = 'staff'
		         AND RA.es_personid = '".$_SESSION['eschools']['user_id']."'
				 ".$condition." ORDER BY es_hostel_charges_id ";
				 
				 $details = $db->getrows($sql_qry);
				 
				$data='"Building Name"'."\t".'"Room Number"'."\t".'"Room Type"'."\t".'"Alloted On"'."\t".'"Vacated On"'."\t".'"Registration Number"'."\t".'"Person Name"'."\t".'"Father Name"'."\t".'"Person Type"'."\t".'"Due Month"'."\t".'"Due Amount"'."\t".'"Paid On"'."\t".'"Paid Amount"'."\t".'"Deduction Allowed"'."\t".'"Balance"'."\n"; 
				
						if(count($details)>0 ){
							foreach ($details as $row) {
								$line = '';
								foreach($row as $field=>$value) { 
									if($field=='dealloted_date' && $value=='0000-00-00'){$value ="";}
									if($field=='due_month' && $value=='0000-00-00'){$value ="";}
									if($field=='paid_on' && $value=='0000-00-00'){$value ="";}
									if($field=='amount_paid' && $value < 1){$value ="";}
									if($field=='deduction' && $value < 1){$value ="";}
									if($field=='balance' && $value < 1){$value ="";}
									
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
							header('Content-Disposition: attachment; filename="hostel_dues.xls"');
							header("Pragma: no-cache");
							header("Expires: 0");
							print "$data";
							exit;
						 }
					}
		}


?>
