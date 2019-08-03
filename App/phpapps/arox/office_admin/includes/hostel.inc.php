<?php
sm_registerglobal('pid', 'action','emsg', 'update', 'uid', 'start', 'asds_order', 'submit', 'Submit', 'es_hostelroomid','room_type','room_capacity','room_vacancy', 'room_no','column_name','hostel_itemcode', 'hostel_itemname', 'hostel_itemtype','roomid','Item_Name','Item_type','hostel_itemqty','es_roomid','selectroom','savealotdet','health_name','health_class','health_section','health_problem','health_address','health_contactno','health_prescription','health_doctorname','health_regno','Add','persontype','personid','studentroomid','hostelperson_itemno','hostelperson_itemcode','hostelperson_itemname','hostelperson_itemtype','hostelperson_itemqty','es_createdon','es_pid','raid','es_persontype','back','emsg','es_roomid' ,'es_hostelbuldid','buld_name','es_buldid','es_buldname','es_buldname123','build_name','updateb','room_rate','allocated_date','deallocate_date','de_allocate','ralotid','selyear','selmonth','preparebill','chgid','receive_amount','amount_paid','deduction','dueamount','remarks','search_hostel_charges','persontype','balance','export_hostel_charges','es_bank_name','es_bankacc','es_checkno','es_teller_number','es_bank_pin','vocturetypesel','es_ledger','eq_paymode','issued_items','bid','es_personid','es_hostelroomid');
/**
* Only Admin users can view the pages
*/

if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
/**************Addin Building**********************/
   
$obj_hostelbuld= new es_hostelbuld(); 
  
if ($action =='addbuilding'){
  
if ($Submit =='Submit'){

	    $error	= "";
		$vlc    = new FormValidation();		
		if  (!$vlc->is_alpha_numeric($buld_name )) {
			$errormessage[0] = "Invalid building Name";	  
		}
		
		if (count($errormessage)==0)
			  
		if ($error=="" && isset($error)){	 
		
	  if (isset($buld_name)){
	  
		$obj_hostelbuld->buld_name = $buld_name;
	   }
	
	$obj_hostelbuld->status= 'active';
	
	$obj_hostelbuld->createdon = date('Y-m-d H:i:s');
	
	      $query    = "SELECT * FROM `es_hostelbuld` WHERE `buld_name`='".$buld_name."'";
          $exequery = mysql_query($query);
          $count    = mysql_num_rows($exequery);
		  
          if($count > 0){
		  
		       $errormessage[2]=" Building is already existing ";	   
		  }
		  
	      else
		  {
		  $inid=$obj_hostelbuld->Save();
		  if (isset($inid) && $inid!=""){ 
		  
		  
		  $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_hostelbuld','HOSTEL','ADD BUILDING','".$inid."','BUILDING ADDED','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
	 
		  $emsg = 1;
		  header("Location:?pid=19&action=addbuilding&emsg=".$emsg);
		  }
	  }
    }
   }  
 }  
 
 	/**------------- View Building Listing --------------- **/
	
	if ($action =='addbuilding'){
		$q_limit  = 10;
		if ( !isset($start) ){
			$start = 0;
		}	
		$no_rows = count($obj_hostelbuld->GetList(array(array("es_hostelbuldid", ">", 0)) ));
		$orderby_array = array('orb1'=>'es_hostelbuldid');
		if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
			$orderby = $orderby_array[$column_name];
		}
		if (isset($asds_order)&&$asds_order=='ASC'){
			$order = true;
		}else{
			$order = false;
		}
		$es_buldList = $obj_hostelbuld->GetList(array(array("es_hostelbuldid", ">", 0)) , $orderby, $order,  "$start , $q_limit");
	}
/**------------- end of Listing --------------- **/


if (isset($updateb)){
$vlc    = new FormValidation();		
		if  (!$vlc->is_alpha_numeric($buld_name )) {
			$errormessage[0] = "Invalid building Name";	  
		}
		 $query    = "SELECT * FROM `es_hostelbuld` WHERE `buld_name`='".$buld_name."' AND es_hostelbuldid!=".$es_buldid;
		 
          $exequery = mysql_query($query);
          $count    = mysql_num_rows($exequery);
		 
          if($count > 0){
		  
		       $errormessage[2]=" Building is already existing ";	   
		  }
$com= count($errormessage);
if($com==0){
	$db->update('es_hostelbuld', "buld_name ='" . $buld_name . "'", 'es_hostelbuldid =' . $es_buldid);
	 $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_hostelbuld','HOSTEL','ADD BUILDING','".$es_buldid."','BUILDING UPDATED','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
	 
	$emsg = 2;
	header('location:?pid=19&action=addbuilding&emsg='.$emsg.'&es_buldid='.$es_buldid);
}

}


if ($action =='editbuilding'){
  $obj_hostelbuld= new es_hostelbuld(); 
  	$es_buldDetails = $obj_hostelbuld->GetList(array(array("es_hostelbuldid", "=", "$es_buldid")), "es_hostelbuldid", false);

  }

if ($action =='deletebuilding'){
    $rooms = $db->getone("SELECT COUNT(*) FROM es_hostelroom WHERE es_hostelbuldid=".$es_buldid."");
	if($rooms==0){
	$obj_hostelbuld->es_hostelbuldId = $es_buldid;
    $obj_hostelbuld->Delete();
	
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_hostelbuld','HOSTEL','ADD BUILDING','".$es_buldid."','BUILDING DELETED','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
	$emsg = 3;
	header('location:?pid=19&action=addbuilding&emsg='.$emsg);
	exit;
	}else{
	header('location:?pid=19&action=addbuilding&emsg=54');
	exit;
	}

}
	
/***************Adding ROOM*******************/
$obj_hostelbuld    = new es_hostelbuld(); 
$obj_hostelroom    = new es_hostelroom();
$es_in_item_master = new es_in_item_master();
$in_itemsList      = $es_in_item_master->GetList(array(array("status", "=", "active")));

//for getting building details in droup down

$exesqlquery = "SELECT * FROM `es_hostelbuld`";
$getbuldinglist = getamultiassoc($exesqlquery);

/*****************END**********************/	

if ($action =='addroom'){
    if (isset($Submit)){
	    $error	= "";			
		$vlc    = new FormValidation();		
		if  (!$vlc->is_nonNegNumber($room_no )) {
			$errormessage[0] = "invalid Room No";	  
		}
		// fetching the Bulding Name
		    $sql = 'SELECT * FROM `es_hostelbuld` WHERE `es_hostelbuldid`="'.$es_buldname.'"';
		    $exequery = mysql_query($sql);
		    $result   = mysql_fetch_assoc($exequery);
			$buildid  = $result['es_hostelbuldid'];

		// Check the Romm number is available or not
			
		$query    = "SELECT * FROM `es_hostelroom` WHERE `room_no`='".$room_no."' AND `es_hostelbuldid`='".$buildid."'";
		$exequery = mysql_query($query);
		$count    = mysql_num_rows($exequery);
		if($count > 0){
		   $errormessage[4] =" Room No is allredy exiting "; 
		}
			if($es_buldname==''){
		   $errormessage[0] ="Select Buliding"; 
		}
		if (!$vlc->is_alpha_numeric($room_type)) {
			$errormessage[1] = "invalid room type";	  
		}		
		if  (!$vlc->is_nonNegNumber($room_capacity )) {
			$errormessage[2] ="invalid capacity"; 
		}
		
		if  (!$vlc->is_nonNegNumber($room_rate ) || $room_rate <1 ) {
			$errormessage[3] ="invalid Rate"; 
		}
		
		if (count($errormessage)==0){	  
		    if ($error =="" && isset($error)){			
			  
			//	$obj_hostelroom->buld_name = $es_buldname;
				
				$obj_hostelroom->es_hostelbuldid = $es_buldname;
				
				if (isset($room_no)){
					$obj_hostelroom->room_no = $room_no;
				}
				if (isset($room_type)){
					$obj_hostelroom->room_type = $room_type;
				}
				if (isset($room_capacity)){
					$obj_hostelroom->room_capacity = $room_capacity;
					$obj_hostelroom->room_vacancy = $room_capacity;
				}
				if (isset($room_rate)){
					$obj_hostelroom->room_rate = $room_rate;
				}
				$obj_hostelroom->status = 'active';
				$inind=$obj_hostelroom->Save();
			 		if(isset($inind) && $inind!=""){
					$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_hostelroom','HOSTEL','ADD ROOM','".$inind."','ROOM ADDED','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
	
					$emsg = 1;
					header("Location:?pid=19&action=addroom&emsg=".$emsg);
				}
			
			}
		}
	}
	/**------------- View Listing --------------- **/
	
	if ($action =='addroom'){
		
		$q_limit  = 10;
		if ( !isset($start) ){
			$start = 0;
		}	
		$no_rows = $db->getone("SELECT * FROM es_hostelroom EHR,es_hostelbuld EH WHERE EH.es_hostelbuldid=EHR.es_hostelbuldid AND EH.status='active' AND EHR.es_hostelroomid>0");
		$orderby_array = array('orb1'=>'es_hostelroomid', 'orb2'=>'Capacity', 'orb3'=>'Vecancy');
		if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
			$orderby = $orderby_array[$column_name];
		}else{
			$orderby = "es_hostelroomid";
		}
		if (isset($asds_order)&&$asds_order =='ASC'){
			$order = true;
		}else{
			$order = false;
		}
		
		//$es_roomList = $obj_hostelroom->GetList(array(array("es_hostelroomid", ">", 0)) , $orderby, $order,  "$start , $q_limit");
		$es_roomList=$db->getRows("SELECT * FROM es_hostelroom EHR,es_hostelbuld EH WHERE EH.es_hostelbuldid=EHR.es_hostelbuldid AND EH.status='active' AND EHR.es_hostelroomid>0 ORDER BY es_hostelroomid DESC LIMIT ".$start.','.$q_limit);
	}
	/**------------- end of Listing --------------- **/
}	

if (isset($update)){
     $vlc    = new FormValidation();	
	$room_data = $obj_hostelroom->Get($es_roomid);
	//array_print($room_data);
	$roomvac = $room_data->room_vacancy;
	$roomcap = $room_data->room_capacity;
	$diff = $roomcap - $roomvac;
	$roomvac = $room_capacity - $diff;	
	$query    = "SELECT * FROM `es_hostelroom` WHERE `room_no`='".$room_no."' AND `es_hostelbuldid`='".$buildid."' AND es_hostelroomid  !=".$es_roomid;
		$exequery = mysql_query($query);
		$count    = mysql_num_rows($exequery);
		if($count > 0){
		   $errormessage[1] =" Room No is already exiting "; 
		}
	/*	if($es_buldname==''){
		   $errormessage[2] ="Select Buliding"; 
		}*/
		
		if (!$vlc->is_alpha_numeric($room_type)) {
			$errormessage[3] = "invalid room type";	  
		}		
		if  (!$vlc->is_nonNegNumber($room_capacity )) {
			$errormessage[4] ="invalid capacity"; 
		}
		
		if  (!$vlc->is_nonNegNumber($room_rate ) || $room_rate <1 ) {
			$errormessage[5] ="invalid Rate"; 
		}
		if(count($errormessage)==0){
	$db->update('es_hostelroom', "room_no ='" . $room_no . "', 	room_type ='" . $room_type . "', room_capacity ='" . $room_capacity . "', room_rate ='" . $room_rate . "', room_vacancy ='" . $roomvac . "'", 'es_hostelroomid =' . $es_roomid);
	
	$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_hostelroom','HOSTEL','ADD ROOM','".$es_roomid."','ROOM UPDATED','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
	
	$emsg = 2;
	header('location:?pid=19&action=addroom&emsg='.$emsg);
	}
}	

if ($action =='editroom'){
//$obj_hostelroom = new es_hostelroom();
	$es_roomDetails = $obj_hostelroom->GetList(array(array("es_hostelroomid", "=", "$es_roomid")), "es_hostelroomid", false);
	}
if ($action =='deleteroom'){
	$no_records = sqlnumber("SELECT * FROM es_roomallotment WHERE es_hostelroomid=".$es_roomid." AND status='allocated'");
	if($no_records ==0){
	$obj_hostelroom->es_hostelroomId = $es_roomid;
    $obj_hostelroom->Delete();
	//$db->delete('es_roomallotment','es_hostelroomid='.$es_roomid);
	
	
	$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_hostelroom','HOSTEL','ADD ROOM','".$es_roomid."','ROOM DELETED','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
	
	$emsg = 3;
	header('location:?pid=19&action=addroom&emsg='.$emsg);
	exit;
	}else{
		$errormessage[0]=" Room is Allocated Filled";
	}
}
/*-----------------Add  Items-----------------------*/	
if($action =='additems') {	
			 
      if ($Submit =='Add To Room'){
	  
       for ($i=1; $i<=count($hostel_itemqty); $i++) {
	   	
	   		$obj_hostel_item = new es_hostel_item();
	  		$obj_hostel_item->hostel_itemcode = $hostel_itemcode[$i];
			$obj_hostel_item->hostel_itemname = $hostel_itemname[$i];
			$obj_hostel_item->hostel_itemtype = $hostel_itemtype[$i];
			$obj_hostel_item->hostel_itemqty = $hostel_itemqty[$i];
			$obj_hostel_item->es_hostelroomid = $es_roomid;      		
			
	  $result = getarrayassoc("SELECT in_qty_available FROM es_in_item_master WHERE es_in_item_masterid = '" . $hostel_itemcode[$i] . "'");
      $in_qty_available = $result['in_qty_available']; 
	  if($in_qty_available > $hostel_itemqty[$i]){
	  
	        $obj_hostel_item->Save();
			$date = date('Y-m-d H:i:s');
			$sql = $db->update("es_in_item_master",
			                     "in_qty_available = in_qty_available -  '$hostel_itemqty[$i]',
								 in_last_issued_date  = '$date'",
								 "es_in_item_masterid  = $hostel_itemcode[$i] ");  
		
		}else{
		$emsg = 28;
		 header("Location:?pid=19&action=student_roomallotment&emsg=".$emsg);
		 exit;
		}
									  
		
      }
	  
    $emsg = 6;
    header("Location:?pid=19&action=student_roomallotment&emsg=".$emsg);
   
	if($action =='additems' )
	{		
		$es_roomDetails = $obj_hostelroom->Get($es_roomid);
	
	}
  }
}

/*-----------------Add  Items-----------------------*/	

if($action =='personitems') {	 
      if ($Submit =='Add To Person'){
	  // array_print($_POST);
      for ($i=1; $i<=count($hostel_itemcode); $i++) {
	  	
	  		$obj_hostelperson_item = new es_hostelperson_item();
	  		$obj_hostelperson_item->hostelperson_itemcode = $hostel_itemcode[$i];
			$obj_hostelperson_item->hostelperson_itemname = $hostel_itemname[$i];
			$obj_hostelperson_item->hostelperson_itemtype = $hostel_itemtype[$i];
			$obj_hostelperson_item->hostelperson_itemqty= $hostel_itemqty[$i];
			$obj_hostelperson_item->es_personid = $es_pid;
			$obj_hostelperson_item->hostelperson_itemissued = date('Y-m-d H:i:s');
			$obj_hostelperson_item->es_persontype = $es_persontype;
			$obj_hostelperson_item->es_roomallotmentid = $raid;
			$obj_hostelperson_item->status = 'issued';
      		
			 $result = getarrayassoc("SELECT in_qty_available FROM es_in_item_master WHERE es_in_item_masterid = '" . $hostel_itemcode[$i] . "'");
             $in_qty_available = $result['in_qty_available']; 
			
	  if($in_qty_available > $hostel_itemqty[$i]){
	  
	        $idss=$obj_hostelperson_item->Save();
			// insert logs
			$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_hostelperson_item','HOSTEL','ROOM ALLOCATION','".$idss."','PERSON ALLOTED','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
			
			$date = date('Y-m-d H:i:s');
			$sql  = $db->update("es_in_item_master",
			                     "in_qty_available     = in_qty_available -  '$hostel_itemqty[$i]',
								  in_last_issued_date  = '$date'",
								 "es_in_item_masterid  = $hostel_itemcode[$i] ");  
			
		
		 }else{
		 $emsg = 28;
		 header("Location:?pid=19&action=student_roomallotment&emsg=".$emsg);
		 exit;
		}
		   
	
      }   
	       $emsg = 7 ;
	  		header("Location:?pid=19&action=student_roomallotment&emsg=".$emsg);
	  		exit;  
      
    }
}

//for getting selected room in dropdown
	if(isset($selectroom) && $selectroom!='')
	{		
		$es_roomDetails = $obj_hostelroom->Get($selectroom);
	
	}
// for selecting rooms to display in dropdown
	if($action =='student_roomallotment') {	
		$es_roomList = $obj_hostelroom->GetList(array(array("es_hostelroomid", ">", 0),array("es_hostelbuldid","=","$es_buldname123")),'room_no',true);
//fetching students from selected room
		$obj_allotedstudentlist = new es_roomallotment();
		$allotedstudentlist = $obj_allotedstudentlist->GetList(array(array("es_hostelroomid", "=", $es_roomDetails->es_hostelroomId),array("status", "!=", 'deallocated')),'es_roomallotmentid',true);
	
	
	}
	if($action =='Report') {	
		$es_roomList = $obj_hostelroom->GetList(array(array("es_hostelroomid", ">", 0)),'room_no',true);
	//fetching students from selected room
		$obj_allotedstudentlist = new es_roomallotment();
		$allotedstudentlist = $obj_allotedstudentlist->GetList(array(array("es_hostelroomid", "=", $es_roomDetails->es_hostelroomId)),'es_roomallotmentid',true);
	}
// Saving allocated rooms to db
if($action =='student_roomallotment') {	

   if (isset($Submit)){ 
   
   
   for ($i=0; $i<count($personid); $i++)
   {	
   		if($personid[$i]!="" &&  $_POST["allocate_date_$i"]==""){
		$rec = $i+1;
		$errormessage[$i]="Please Select Date ";
			
		}
		if($persontype[$i]!='' && $personid[$i]!='')
		{
		if($persontype[$i]=='student')
		{
		$cou=$db->getOne("SELECT COUNT(*) FROM es_preadmission WHERE es_preadmissionid='".$personid[$i]."' AND status!='inactive'");
		}	
		else
		{
		$cou=$db->getOne("SELECT COUNT(*) FROM es_staff WHERE es_staffid='".$personid[$i]."' AND tcstatus='notissued'");
		}
		if($cou<=0)
		{
		$errormessage[$i]="Enter Valid Reg No";
		}
		unset($cou);
		}
   }
  
   $error	= "";      		  
	    $vlc = new FormValidation();
				
		if (count($errormessage)==0){					
	    $no = 0;
		for ($i=0; $i<count($personid); $i++) {	
			if($personid[$i]!="")
			{			
				$obj_roomallotment = new es_roomallotment();			
				$obj_roomallotment->es_hostelroomid = $studentroomid;			
				$obj_roomallotment->es_personid = $personid[$i];
				$obj_roomallotment->es_persontype = $persontype[$i];
				$obj_roomallotment->alloted_date = func_date_conversion("d/m/Y","Y-m-d",$_POST["allocate_date_$i"]);
				$obj_roomallotment->status = 'allocated';
				$query    = "SELECT * FROM `es_roomallotment` WHERE `es_personid`='".$personid[$i]."' AND es_persontype='".$persontype[$i]."' AND status ='allocated'";//exit;
				$exequery = mysql_query($query);
                $count    = mysql_num_rows($exequery);
                if($count > 0){
				 $errormessage[1]="Person Allready allocated";
				}
				else
				{
				$idss=$obj_roomallotment->Save();
				
				$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_roomallotment','HOSTEL','ROOM ALLOCATION','".$idss."','ROOM ALLOTED','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);
				
				
				}
				$no++;
			}		   	
		}
	if (count($errormessage)==0){		
	$db->update('es_hostelroom', " room_vacancy = room_vacancy-$no ", 'es_hostelroomid =' . $studentroomid);
	$emsg = 1;
	header("Location:?pid=19&action=student_roomallotment&emsg=".$emsg);
	}
	}
   } 
 }
 
 
 
 

 if($action =='buildreport') {
   
 if (isset($submit) && $submit =="Search"){
   
	 $error	= "";
		$vlc  = new FormValidation();		
		if  ($es_buldname == "") {
			$errormessage[0] = "Select building Name";	  
		}		
		if (count($errormessage)==0){
			  
		if ($error=="" && isset($error)){	 
 
   $obj_hostelroom  = new es_hostelroom();

		$q_limit  = 10;
		if ( !isset($start) )
			$start = 0;
			if ($submit =='Search' || $submit =='print') {	
		$no_rows = count($obj_hostelroom->GetList(array(array("es_hostelbuldid", "=", $es_buldname))));
		$orderby_array = array('orb1'=>'es_hostelbuldid');
		if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
			$orderby = $orderby_array[$column_name];
		}else{
			$orderby = "es_hostelbuldid";
		}
		if (isset($asds_order)&&$asds_order =='ASC'){
			$order = true;
		}else{
			$order = false;
		}
		$buildUrl = "&es_buldname=$es_buldname";
		$es_roomList1 = $obj_hostelroom->GetList(array(array("es_hostelbuldid", "=", $es_buldname)) , $orderby, $order,  "$start , $q_limit");
	 }
	
   }	
  }
 }
}
/**------------- end of Listing --------------- **/

/**------------- print printreport--------------- **/
 if($action=='printreport') {

$obj_hostelroom    = new es_hostelroom();
	 $buildUrl = "&es_buldname=$es_buldname";
		if ( !isset($start) )
			$start = 0;
		$orderby_array = array('orb1'=>'es_hostelbuldid');
		if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
			$orderby = $orderby_array[$column_name];
		}else{
			$orderby = "es_hostelbuldid";
		}
		if (isset($asds_order)&&$asds_order=='ASC'){
			$order = true;
		}else{
			$order = false;
		$es_roomList1 = $obj_hostelroom->GetList(array(array("es_hostelbuldid", "=", $es_buldname)) , $orderby, $order);
	}	
}	

/**------------- end of printreport --------------- **/

/**------------- print viewrecord--------------- **/

	if ($action =='printviewrecord'||$action =='personitems'){
		$rommallotdetails = get_roomallot_details($raid);
		$room_details     = get_room_details($rommallotdetails['es_hostelroomid']);
		if ($rommallotdetails['es_persontype'] == 'student'){
			$stud_details = get_studentdetails($rommallotdetails['es_personid']);					  
		}
		if ($rommallotdetails['es_persontype'] == 'staff'){
			$staff_details = get_staffdetails($rommallotdetails['es_personid']);	
		}	
		$es_roomDetails = new es_hostelperson_item();
		$perid = $rommallotdetails['es_personid'];
		$pertype = $rommallotdetails['es_persontype'];
		$qry = "SELECT hi.*, i.in_item_code as h_item_code, i.in_item_name as h_item_name FROM es_hostelperson_item hi, es_in_item_master i WHERE hi.es_personid = '$perid' AND hi.es_persontype = '$pertype' AND hi.hostelperson_itemcode = i.es_in_item_masterid ";
		
		$es_roomDetails = $db->GetRows($qry); 
	   $es_roomDetail = new es_hostel_health();	
	   $es_roomDetail = $es_roomDetail->GetList(array(array("es_personid", "=" , $rommallotdetails['es_personid']), array("es_persontpe", "=" , $rommallotdetails['es_persontype'])));	
	   
	   
	$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_hostelroom','HOSTEL','ROOM ALLOCATION','".$raid."','ROOM ALLOCATION PRINT','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);   
	   
	   
	   
 }
$ridurl = "&raid=$raid"; 
/**------------- end of print viewrecord --------------- **/
   
/****************hostel health ******************/

$obj_hostelhealth = new es_hostel_health();
if($action=='Health_record') {
	if ($Submit=='Add')	{
	
	
		$error	= "";		   
		$vlc = new FormValidation();		
		if (empty($health_name ))  {
			$errormessage[0]="Enter Name";	  
		}		
				
		if (empty($health_class ))  {
			$errormessage[2]="Enter class"; 
		}		
		if (empty($health_problem ))  {
			$errormessage[3]="Enter Problem Description";	  
		}		
		if (!$vlc->is_alpha_numeric($health_doctorname)) {
			$errormessage[4]="Enter Doctor Name";	  
		}		
		/*if (empty($health_prescription ))  {
			$errormessage[5]="Enter Prescription"; 
		}*/
		if (count($errormessage)==0){	
			$obj_hostelhealth->es_hostel_healthId = "";
			$obj_hostelhealth->es_createdon = date('Y-m-d H:i:s');
			$obj_hostelhealth->es_personid = $es_pid;
			$obj_hostelhealth->es_persontpe = $es_persontype;
			if (isset($health_name)){
				$obj_hostelhealth->health_name = $health_name;
			}
			if (isset($health_regno)){
				$obj_hostelhealth->health_regno = $health_regno;
			}
			if (isset($health_class)){
				$obj_hostelhealth->health_class = $health_class;
			}
			if (isset($health_section)){
				$obj_hostelhealth->health_section = $health_section;
			}
			if (isset($health_problem)){
				$obj_hostelhealth->health_problem = $health_problem;
			}
			
			if (isset($health_address)){
				$obj_hostelhealth->health_address = $health_address;
			}
			if (isset($health_doctorname)){
				$obj_hostelhealth->health_doctorname = $health_doctorname;
			}
			if (isset($health_contactno)){
				$obj_hostelhealth->health_contactno = $health_contactno;
			}
			if (isset($health_prescription)){
				$obj_hostelhealth->health_prescription = $health_prescription;
			}
		
			$sts=$obj_hostelhealth->Save();
			
			$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_hostel_health','HOSTEL','ROOM ALLOCATION','".$sts."','HEALTH RECORD','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);
			
			header("Location:?pid=19&action=student_roomallotment&emsg=39");
		}
	}
	if($es_pid != "") {
		
		$obj_Staff = new es_staff();
		
		if($es_persontype == 'student') {
			$es_StudentDetail = get_studentdetails($es_pid);
			$prsn_name = $es_StudentDetail['pre_name'];
			$prsn_dpt_cls = classname($es_StudentDetail['pre_class']);
			$prsn_fld_txt = "Class";
		}
		if($es_persontype == 'staff') {
			$es_StaffDetail = get_staffdetails($es_pid);
			$prsn_name = $es_StaffDetail['st_firstname']." ".$es_StaffDetail['st_lastname'];
			$prsn_dpt_cls = deptname($es_StaffDetail['st_department']);
			$prsn_fld_txt = "Department";
		}
		
	}
}
 
	if ($action =='additems' ) {
		$es_roomDetails = $obj_hostelroom->Get($es_roomid);
	}

	if ($action =='personitems'){		
		$es_roomDetails = $obj_hostelroom->Get($es_pid);
	}
	if ($action =='Report'||$action =='personitems'){
	
		$rommallotdetails = get_roomallot_details($raid);
		$room_details     = get_room_details($rommallotdetails['es_hostelroomid']);
		if ($rommallotdetails['es_persontype'] == 'student'){
			$stud_details = get_studentdetails($rommallotdetails['es_personid']);					  
		}
		if ($rommallotdetails['es_persontype'] == 'staff'){
			$staff_details = get_staffdetails($rommallotdetails['es_personid']);	
		}	
		$es_roomDetails = new es_hostelperson_item();
	
/*
	Join Query for getting item name and item code.
*/
		
		$perid   = $rommallotdetails['es_personid'];
		$pertype = $rommallotdetails['es_persontype'];
		$qry = "SELECT hi.*, i.in_item_code as h_item_code, i.in_item_name as h_item_name FROM es_hostelperson_item hi, es_in_item_master i WHERE hi.es_personid = '$perid' AND hi.es_persontype = '$pertype' AND hi.hostelperson_itemcode = i.es_in_item_masterid ";		
		$es_roomDetails = $db->GetRows($qry);
	
	    $es_roomDetail = new es_hostel_health();	
		$es_roomDetail = $es_roomDetail->GetList(array(array("es_personid", "=" , $rommallotdetails['es_personid']), array("es_persontpe", "=" , $rommallotdetails['es_persontype'])));
		
	
	
	
	
	
		
	
	}
 	/**************back **************** **/	
	
	if (isset($back)){
		header("location:?pid=19&action=student_roomallotment&es_buldname123=$es_buldname123&selectroom=$selectroom");
	}
	/**------------- end of back button --------------- **/
	/**************start De allocation **************** **/	
if($action=='deallocate_room') {
    $sql_qry = "SELECT * FROM es_hostelroom R , es_hostelbuld B WHERE R.es_hostelroomid=".$raid." AND R.es_hostelbuldid = B.es_hostelbuldid";
 	$room_det = $db->getrow($sql_qry);
 
 }
 if(isset($de_allocate) && $de_allocate!=""){
      //array_print($_POST);
      if($deallocate_date==""){$errormessage[0] ="Please select the date";}else{
      $de_allocate_date = func_date_conversion("d/m/Y","Y-m-d",$deallocate_date);
	  $difference =  date_diff($allocated_date,$de_allocate_date);
	  if($difference['days']<1){ $errormessage[1] = "Deallocation date should greater than allocation Date";}
	  }
	  $item_issued = $db->getone("SELECT COUNT(*) FROM es_hostelperson_item WHERE es_roomallotmentid='".$ralotid."' AND hostelperson_itemtype='Returnable' AND status='issued'");
	  if($item_issued >=1){$errormessage[2] = "Please collect Returnable Items";}
	 if(count($errormessage)==0){
/*$sql_qry_dd = "SELECT * ,B.es_hostelbuldid as buldid , R.es_hostelroomid roomid  FROM es_hostelbuld B , es_hostelroom R , es_roomallotment RA 
WHERE RA.es_hostelroomid = ".$ralotid." 
AND B.es_hostelbuldid  = R.es_hostelbuldid 
AND RA.es_hostelroomid = R.es_hostelroomid  ";
$all_det = $db->getrow($sql_qry_dd );

if($all_det[$i]['es_persontype'] == 'student')
{ 
$stud_details = get_studentdetails($all_det[$i]['es_personid']);
$name = ucwords($stud_details['pre_name']);
$father = ucwords($stud_details['pre_fathername']);
}
if($all_det[$i]['es_persontype'] == 'staff')
{
$staff_details = get_staffdetails($all_det[$i]['es_personid']);
$name = ucwords($staff_details['st_firstname']." ".$staff_details['st_lastname']);
$father = ucwords($staff_details['st_fatherhusname']);
}


$deall_array = array("es_roomallotmentid"=>$ralotid,"es_hostelbuldid"=>$ralotid,"es_personid"=>$ralotid,"es_persontype"=>$ralotid,"due_month"=>$ralotid,"room_rate"=>$ralotid,"balance"=>$ralotid,"name"=>$ralotid,"father"=>$ralotid,"created_on"=>$de_allocate_date);
*/	    $db->update("es_hostelroom","room_vacancy=room_vacancy +1","es_hostelroomid=".$raid);
	 	$db->update("es_roomallotment","dealloted_date='". $de_allocate_date."',status='deallocated'","es_roomallotmentid = ".$ralotid);
		
		$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_roomallotment','HOSTEL','ROOM ALLOCATION','".$ralotid."','DE ALLOCATED','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);
		
		header("location:?pid=19&action=student_roomallotment&emsg=49");
       }
 }
 	/**------------- end of De allocation --------------- **/
	
if(isset($preparebill) && $preparebill!=""){
				
			if($es_buldname==''){$errormessage[0]="Select Building";}
			
			//$today = date("Y-m-d");
			//$generated_month = $selyear.'-'.$selmonth.'-'."01";
			$generated_month = $selyear.'-'.$selmonth;
			//$difference =  date_diff($generated_month,$today);
			
			$difference = strtotime(date("Y-m")) - strtotime($generated_month);
			
			//echo "Date difference: ".$difference;
			//exit;
						
		    //if($difference['days']<1)
			if($difference<0)
			{
			$errormessage[1] = "You can not prepare bills for future dates";}
			
			
		   
		
			//if($allready_prepared_month>=1){$errormessage[2] = "!Alert Bills for this month Already generated";}
	
		    //array_print($_POST);
			if(count($errormessage)==0){
		   $sql_qry = "SELECT RA.es_roomallotmentid , RA.es_personid , RA.es_persontype , R.room_rate FROM es_hostelbuld B , es_hostelroom R , es_roomallotment RA 
		WHERE B.es_hostelbuldid = ".$es_buldname." 
		AND B.es_hostelbuldid  = R.es_hostelbuldid 
		AND RA.es_hostelroomid = R.es_hostelroomid 
		AND YEAR(RA.alloted_date) <= ".$selyear." 
		AND MONTHNAME(RA.alloted_date) <= ".$selmonth." 
		AND ( YEAR(RA.dealloted_date) >=  ".$selyear." OR YEAR(RA.dealloted_date) =0000)
		AND ( MONTHNAME(RA.dealloted_date) >=  ".$selmonth." OR MONTHNAME(RA.dealloted_date) =00)
		GROUP BY RA.es_personid ,  RA.es_persontype "; 
		
		$all_det = $db->getrows($sql_qry);
		
		
		 
		/*"AND YEAR(RA.dealloted_date) >=  ".$selyear."
		AND MONTHNAME(RA.dealloted_date) >=  ".$selmonth." AND RA.status!='deallocated' "*/
		
		    if(count($all_det)>=1){ 
		    for($i=0;$i<count($all_det);$i++){
			$charges_arr[$i]['es_hostelbuldid']=$es_buldname;
			$charges_arr[$i]['es_roomallotmentid']=$all_det[$i]['es_roomallotmentid'];
			$charges_arr[$i]['es_personid']=$all_det[$i]['es_personid'];
			$charges_arr[$i]['es_persontype']=$all_det[$i]['es_persontype'];
			$charges_arr[$i]['room_rate']=$all_det[$i]['room_rate'];
			$charges_arr[$i]['balance']=$all_det[$i]['room_rate'];
											if($all_det[$i]['es_persontype'] == 'student')
											  { 
												$stud_details = get_studentdetails($all_det[$i]['es_personid']);
											  $name = ucwords($stud_details['pre_name']);
											  $father = ucwords($stud_details['pre_fathername']);
											  }
											   if($all_det[$i]['es_persontype'] == 'staff')
											  {
											   $staff_details = get_staffdetails($all_det[$i]['es_personid']);
											  $name = ucwords($staff_details['st_firstname']." ".$staff_details['st_lastname']);
											  $father = ucwords($staff_details['st_fatherhusname']);
											  }
			$charges_arr[$i]['name']=$name;
			$charges_arr[$i]['father']=$father;
			$charges_arr[$i]['due_month']=$generated_month;
			$charges_arr[$i]['created_on']=$today;
			
		}
		
		//array_print($charges_arr);
		
		    for($j=0;$j<count($charges_arr);$j++){
			
		$sql_dupli_rec = "SELECT COUNT(*) FROM es_hostel_charges WHERE  due_month ='".$charges_arr[$j]['due_month']."' AND es_persontype='".$charges_arr[$j]['es_persontype']."' AND es_personid='".$charges_arr[$j]['es_personid']."'";
		$records = $db->getone($sql_dupli_rec);
		
				$de_all = "SELECT COUNT(*) FROM es_roomallotment WHERE  es_roomallotmentid = '".$charges_arr[$j]['es_roomallotmentid']."' 
				AND status = 'deallocated' 
				AND YEAR(dealloted_date) =  ".$selyear."
		        AND MONTHNAME(dealloted_date) >  ".$selmonth." "; 
		
		//$de_all_rec = $db->getone($de_all);
		
				if($records==0 ){
				
				$db->insert("es_hostel_charges",$charges_arr[$j]);
				}
		}
		    header("location:?pid=19&action=prepare_bill&emsg=51");
			exit;
			}else{
			header("location:?pid=19&action=prepare_bill&emsg=52");
			exit;
			}
		
		}
	}


if($action=='view_persons' || $action=='print_hostel_persons'){
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
						$condition = " AND B.es_hostelbuldid='".$es_buldname."'";
						$PageUrl .="&es_buldname=$es_buldname"; 
				}
				if(isset($es_hostelroomid) && $es_hostelroomid !=""){
						$condition = " AND R.es_hostelroomid='".$es_hostelroomid."'";
						$PageUrl .="&es_hostelroomid=$es_hostelroomid"; 
				}
				
				if($es_personid > 0 && isset($persontype)){
						$condition .= " AND RA.es_personid = ".$es_personid." AND RA.es_persontype='".$persontype."'";
						$PageUrl .="&es_personid=$es_personid&persontype=$persontype"; 
				
				}elseif(isset($persontype) && $persontype !=""){
						$condition .= " AND RA.es_persontype='".$persontype."'";
						$PageUrl .="&persontype=$persontype"; 
				}
				
				
				
		}
		/*$qqqrr = "SELECT SUM(room_rate) AS totaldues ,SUM(amount_paid) AS totalamountreceived ,SUM(deduction) AS totaldeduction ,SUM(balance) AS totalbalance FROM  es_hostel_charges ";
		$amounts_arr = $db->getrow($qqqrr);*/
		 $sql_qry = "SELECT * , B.buld_name as buidingname FROM es_hostelbuld B , es_hostelroom R , es_roomallotment RA  
		 WHERE B.es_hostelbuldid  = R.es_hostelbuldid  
		 AND RA.es_hostelroomid = R.es_hostelroomid ".$condition."";
		$no_rows = sqlnumber($sql_qry);
		if(!isset($start)){$start=0;}
		$q_limit = 20;
		$sql_qry .=" ORDER BY RA.es_roomallotmentid DESC LIMIT ".$start.",".$q_limit.""; 
		$allotment_details = $db->getrows($sql_qry);
		}

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
				
		}
		$qqqrr = "SELECT SUM(room_rate) AS totaldues ,SUM(amount_paid) AS totalamountreceived ,SUM(deduction) AS totaldeduction ,SUM(balance) AS totalbalance FROM  es_hostel_charges ";
		$amounts_arr = $db->getrow($qqqrr);
		 $sql_qry = "SELECT * , B.buld_name as buidingname FROM es_hostel_charges HC , es_hostelbuld B , es_hostelroom R , es_roomallotment RA  
		 WHERE HC.es_hostelbuldid = B.es_hostelbuldid 
		 AND B.es_hostelbuldid  = R.es_hostelbuldid  
		 AND HC.es_roomallotmentid = RA.es_roomallotmentid 
		 AND RA.es_hostelroomid = R.es_hostelroomid ".$condition."";
		$no_rows = sqlnumber($sql_qry);
		if(!isset($start)){$start=0;}
		$q_limit = 20;
		$sql_qry .=" ORDER BY es_hostel_charges_id DESC LIMIT ".$start.",".$q_limit.""; 
		$charges_details = $db->getrows($sql_qry);
		}

}
if($action=='payamount' || $action=='receipt') { 
	 $sql_qry = "SELECT * , B.buld_name as buidingname , HC.room_rate as dueamount FROM es_hostel_charges HC , es_hostelbuld B , es_hostelroom R , es_roomallotment RA 
	WHERE HC.es_hostel_charges_id =".$chgid." 
	AND HC.es_roomallotmentid = RA.es_roomallotmentid
	AND RA.es_hostelroomid = R.es_hostelroomid
	AND B.es_hostelbuldid  = R.es_hostelbuldid
	AND HC.es_hostelbuldid = B.es_hostelbuldid ";
	$payamount_details = $db->getrow($sql_qry);
	
     if(isset($receive_amount) && $receive_amount!=''){
	        //array_print($_POST);
			$vlc    = new FormValidation();	
			
			if(isset($amount_paid) && $amount_paid!="" ){
				if(!$vlc->is_nonNegNumber($amount_paid) ){
					$errormessage[0]="Enter valid amount";
				}
			}
			if(isset($deduction) && $deduction!="" ){
				if(!$vlc->is_nonNegNumber($deduction) ){
					$errormessage[1]="Enter valid deduction amount";
				}
			}
			$total_receive = $amount_paid+$deduction;
			if($dueamount!=$total_receive){$errormessage[7]="Total Amount + Deduction should be equal to Due Amount";}
			
			if($eq_paymode==""){$errormessage[2]="Select Payment Mode";}
	        elseif ($eq_paymode!="cash"){
				if (!$vlc->is_alpha_numeric($es_checkno)) {
				$errormessage[3]="Enter Cheque Number";	  
				}
				
				if (!$vlc->is_alpha_numeric($es_bankacc)) {
					$errormessage[4]="Enter Bank Number";	  
				}	
		    }
	
			if($vocturetypesel==""){$errormessage[5]="Select Voucher Type";}
		
		   if ($es_ledger=="") {
				$errormessage[6]="Select Ledger";	  
			}
			if(count($errormessage)==0){
			
					$db->update("es_hostel_charges","amount_paid='".$amount_paid."',deduction='".$deduction."',paid_on='".date("Y-m-d")."',balance=0,remarks='".$remarks."'","es_hostel_charges_id=".$chgid);
					
					$sel_paidin_amount = "SELECT 
				sum(CASE es_vouchermode WHEN 'paidin' THEN es_amount ELSE 0 END)AS paidintotal,
				sum(CASE es_vouchermode WHEN 'paidout' THEN es_amount ELSE 0 END)AS paidouttotal
				FROM es_voucherentry  "; 
				$sel_amount_exe = getarrayassoc($sel_paidin_amount);
				$paidintotal=$sel_amount_exe['paidintotal'];
				$paidouttotal=$sel_amount_exe['paidouttotal'];
				$diffamount = $paidintotal - $paidouttotal;
				//if ($diffamount>=$tr_amount_paid){
					
					 
						 $obj_voucherentry = new es_voucherentry();
						 $vocturedetails = voucherid_finance($vocturetypesel);
						 $obj_voucherentry->es_vouchertype = $vocturedetails['voucher_type'];
						 $obj_voucherentry->es_receiptno   = "hostel_charges".$chgid;
						 $obj_voucherentry->es_paymentmode = $eq_paymode;
						 $obj_voucherentry->es_bankacc	   = $es_bankacc;
						 $obj_voucherentry->es_particulars = $es_ledger;
						 $obj_voucherentry->es_amount	   = round($amount_paid,2); 
			
			            
						 $obj_voucherentry->es_bank_pin      = $es_bank_pin;
						 $obj_voucherentry->es_bank_name     = $es_bank_name;
						 $obj_voucherentry->es_teller_number = $es_teller_number;
			
						 //$obj_voucherentry->es_narration   = $es_narration;
						 $obj_voucherentry->es_vouchermode = $vocturedetails['voucher_mode'];
						 $obj_voucherentry->es_checkno     = $es_checkno;
						 $obj_voucherentry->es_receiptdate = date('Y-m-d H:i:s');
						 $obj_voucherentry->ve_fromfinance = $_SESSION['eschools']['from_finance'];
						 $obj_voucherentry->ve_tofinance   = $_SESSION['eschools']['to_finance'];
						 
						 $vid=$es_voucherentryid = $obj_voucherentry->Save();
						 
						 
						 
						 
						 // insert logs
		$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_voucherentry','HOSTEL','View Details','".$vid."','PAY AMOUNT','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);
	
	if(isset($search_hostel_charges) && $search_hostel_charges!="" ){
				$PageUrl = "&search_hostel_charges=Search";
				
				if(isset($es_buldname) && $es_buldname !=""){
						
						$PageUrl .="&es_buldname=$es_buldname"; 
				}
				if(isset($selyear) && $selyear !=""){
						
						$PageUrl .="&selyear=$selyear"; 
				}
				if(isset($selmonth) && $selmonth !=""){
						
						$PageUrl .="&selmonth=$selmonth"; 
				}
				if($es_personid > 0 && isset($persontype)){
						
						$PageUrl .="&es_personid=$es_personid&persontype=$persontype"; 
				
				}elseif(isset($persontype) && $persontype !=""){
						
						$PageUrl .="&persontype=$persontype"; 
				}
				if(isset($balance) && $balance !=""){
				        
						$PageUrl .="&balance=$balance"; 
				}
				
		}
						 
						 
					header("location:?pid=19&action=viewdetails&emsg=50".$PageUrl);
					//}
					
			}
			
			
			
	
	
			
			}
	
	

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
				
				 $sql_qry = "SELECT  B.buld_name , R.room_no , R.room_type , RA.alloted_date , RA.dealloted_date , RA.es_personid , HC.name , HC.father , RA.es_persontype ,HC.due_month , HC.room_rate ,  HC.paid_on , HC.amount_paid , HC.deduction , HC.balance 
				 FROM es_hostel_charges HC , es_roomallotment RA , es_hostelbuld B , es_hostelroom R 
				 WHERE HC.es_roomallotmentid = RA.es_roomallotmentid 
				 AND RA.es_hostelroomid = R.es_hostelroomid
				 AND R.es_hostelbuldid = B.es_hostelbuldid
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
if(isset($issued_items) && $issued_items!=""){
//GROUP BY personid
		              $items_qry = "SELECT * , HPI.es_personid as personid , HPI.status as itemstatus FROM es_hostelperson_item HPI , es_roomallotment RA , es_hostelroom R , es_hostelbuld B 
		              WHERE B.es_hostelbuldid = R.es_hostelbuldid
					  AND R.es_hostelroomid = RA.es_hostelroomid
					  AND RA.es_roomallotmentid = HPI.es_roomallotmentid
					  AND B.es_hostelbuldid = '".$es_buldname."'
					  AND HPI.hostelperson_itemtype = 'Returnable' ";
					  
					  if(!isset($start)){$start=0;}
					  $q_limit = 20;
					  $no_rows = sqlnumber($items_qry );
					  $items_qry .= " ORDER BY HPI.es_personid LIMIT ".$start." , ".$q_limit."  ";
					  $all_issued_items = $db->getrows($items_qry);
}
if($action=='view_item_details'){

				
					$rommallotdetails = get_roomallot_details($raid);
		            $room_details     = get_room_details($rommallotdetails['es_hostelroomid']);
					if ($rommallotdetails['es_persontype'] == 'student'){
			$stud_details = get_studentdetails($rommallotdetails['es_personid']);					  
		}
		if ($rommallotdetails['es_persontype'] == 'staff'){
			$staff_details = get_staffdetails($rommallotdetails['es_personid']);	
		}	
		$es_roomDetails = new es_hostelperson_item();
		$perid = $rommallotdetails['es_personid'];
		$pertype = $rommallotdetails['es_persontype'];
		$qry = "SELECT hi.*, i.in_item_code as h_item_code, i.in_item_name as h_item_name FROM es_hostelperson_item hi, es_in_item_master i WHERE hi.es_personid = '$perid' AND hi.es_persontype = '$pertype' AND hi.hostelperson_itemcode = i.es_in_item_masterid AND hi.hostelperson_itemtype = 'Returnable' ";
		
		$es_roomDetails = $db->GetRows($qry); 
	   $es_roomDetail = new es_hostel_health();	
	   $es_roomDetail = $es_roomDetail->GetList(array(array("es_personid", "=" , $rommallotdetails['es_personid']), array("es_persontpe", "=" , $rommallotdetails['es_persontype'])));
	   
	   
	   // insert log
	   $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_hostelperson_item','HOSTEL','COLLECT ITEMS','".$rommallotdetails['es_personid']."','VIEW ITEMS','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);
	   
}

if($action=='return_items'){
		$item_det = $db->getrows("SELECT * FROM es_hostelperson_item WHERE es_roomallotmentid='".$raid."' AND hostelperson_itemtype='Returnable' AND status='issued'");
		
		if(count($item_det )>=1){
			foreach($item_det  as $each){
				$db->update("es_in_item_master","in_qty_available     = in_qty_available + '".$each['hostelperson_itemqty']."'",
				"es_in_item_masterid  =".$each['hostelperson_itemcode']);
			}
		}
		$db->update("es_hostelperson_item","status='issuereturn',return_on='".date("Y-m-d")."'","es_roomallotmentid=".$raid);
		
		$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_hostelperson_item','HOSTEL','COLLECT ITEMS','".$raid."','COLLECT RETURNABLE ITEMS','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);
		
		header("location:?pid=19&action=collect_items&es_buldname=$bid&issued_items=Search&start=$start&emsg=53");
		exit;

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

if($action=='person_allotment_details'){

$sql_qry = "SELECT * , B.buld_name as buidingname FROM  es_hostelbuld B , es_hostelroom R , es_roomallotment RA 
	WHERE RA.es_roomallotmentid =".$chgid." 
	
	AND RA.es_hostelroomid = R.es_hostelroomid
	AND B.es_hostelbuldid  = R.es_hostelbuldid
	";
	$payamount_details = $db->getrow($sql_qry);
	    
		$es_roomDetails = new es_hostelperson_item();
		$perid = $payamount_details['es_personid'];
		$pertype = $payamount_details['es_persontype'];
		$qry = "SELECT hi.*, i.in_item_code as h_item_code, i.in_item_name as h_item_name FROM es_hostelperson_item hi, es_in_item_master i WHERE hi.es_personid = '$perid' AND hi.es_persontype = '$pertype' AND hi.hostelperson_itemcode = i.es_in_item_masterid AND hi.hostelperson_itemtype = 'Returnable' AND es_roomallotmentid= '".$chgid."' ";
		
		$es_roomDetails = $db->GetRows($qry); 
		
		$payment_det_qry = "SELECT * FROM es_hostel_charges WHERE es_personid=".$perid." AND es_persontype='".$pertype."'  AND es_roomallotmentid='".$chgid."'";
		$payment_det = $db->getrows($payment_det_qry);
		
		// insert logs
		$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_hostel_charges','HOSTEL','View Details','".$chgid."','VIEW CHARGE DETAILS','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);
		
	   
}
?>
