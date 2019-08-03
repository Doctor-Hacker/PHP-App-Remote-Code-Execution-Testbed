<?php   
        sm_registerglobal('pid', 
						  'action',
						  'uid', 
						  'status',
						  'edit_id',
						  'start',
						  'column_name',
						  'emsg',
						  'addtrSubmit',
						  'tr_transport_type',
						  'tr_purchase_date',
						  'tr_transport_no',
						  'tr_transport_name',
						  'tr_vehicle_no',
						  'tr_insurance_date',
						  'tr_ins_renewal_date',
						  'tr_seating_capacity',
						  'tr_route',
						  'tr_route_from',
						  'tr_route_to',
						  'tr_route_via',// variable declaration for add transport page ends here..
                          'tr_maintenance_type',
						  'tr_date_of_maintenance',
						  'tr_amount_paid',
						  'tr_remarks',
						  'maintenanceSubmit',//variable declaration for maintenance ends here 
                          'vehicle_no',
						  'Search',						 
						  'type', 
						  'date_to', 
						  'date_from', 
						  'to', 
						  'from', 
						  'dc1', 
						  'dc2',
						  'Search2',
						  'checkitem',
						  'printTransport',
						  'print_view',
						  'transport_print',
						    'allotvehicle',
							 'es_staffid',
							  'es_transportid',
							   'driver_license',
							    'issuing_authority',
								 'valid_date',
								 'license_doc',
								  'driver_alloted_date',
						  'print_transportlist',
						  'trans_option',
						  'vocturetypesel','es_ledger','es_paymentmode','es_bank_name','es_bankacc','es_checkno','es_teller_number','es_bank_pin','es_narration','Submit2','asds_order','tr_transport_type' 
						  );
						  
/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
$html_obj = new html_form();

/**************** st_post ,st_department  Preparing non teaching staff array***********/

$nonteaching_staff="select sf.es_staffid,sf.st_firstname,sf.st_lastname,post.es_postname from es_staff sf ,es_deptposts post where sf.status='added' AND sf.selstatus='accepted' AND sf.tcstatus='notissued' AND sf.teach_nonteach = 'nonteaching' and sf.st_post=post.es_deptpostsid";
$nonteach_array=$db->getRows($nonteaching_staff);

/*if(count($non_teach)>0){
foreach($non_teach as $each_staff){
$nonteach_array[$each_staff['es_staffid']]=$each_staff['st_firstname']."".$each_staff['st_lastname']."(".$each_staff['es_postname'].")";
}
}*/
/**********Preparing transport array*************/
$trans_sql="select es_transportid, tr_transport_type,tr_vehicle_no from es_transport where status='active'";
$trans_details=$db->getRows($trans_sql);
if(count($trans_details)>0){
foreach($trans_details as $each_trans){
$trans_array[$each_trans['es_transportid']]=$each_trans['tr_vehicle_no']."(".$each_trans['tr_transport_type'].")";
}
}

// vocher select

$voucherlistarr = voucher_finance();
					//array_print($voucherlistarr);
					
					for($i=0;$i<count($voucherlistarr);$i++){
					
					$vids[$voucherlistarr[$i]['voucher_type']]=$voucherlistarr[$i]['es_voucherid'];
					
					}
					

/**End of the permissions    **/
if(!isset($school_year)) {
	$from_finance = $_SESSION['eschools']['from_finance'];
	$to_finance = $_SESSION['eschools']['to_finance'];
}
else{
		$finance_res = getarrayassoc("SELECT * FROM `es_finance_master` WHERE `es_finance_masterid`= $pre_year");
		$from_finance = $finance_res['fi_startdate'];
		$to_finance   = $finance_res['fi_enddate']; 
}
$school_details_sel = "SELECT * FROM `es_finance_master` ORDER BY `es_finance_masterid` DESC";
$school_details_res = getamultiassoc($school_details_sel);
	  

      $q_limit  = 20;
      if(isset($emsg) && $emsg!="")
      {
            switch($emsg)
            {
                  case "addvehicles" :
                  $message = "Vehicle Added Successfully.";
                  break;
                  
                  case "updatevehicles" :
                  $message = "Updated Vehicles Successfully.";
                  break;
                  
                  case "deletesuccess" :
                  $message = "Deleted Successfully.";
                  break;
                  
                  case "addmaintenance" :
                  $message = "Maintenance Added Successfully.";
                  break;
				  
				  case "updatemaintenance" :
                  $message = "Updated Maintenance Successfully.";
                  break; 
 
            }
      }
	$es_transport = new es_transport();
	$addTransportList = $es_transport->GetList(array(array("status", "=", "active"),array("es_transportid", ">", "0")) );

	  if(isset($addtrSubmit) && $addtrSubmit!= ""){
	  	
	 	 $error = "";
		 
		$vlc = new FormValidation();		
		if (empty($tr_transport_type)) {
		$errormessage[0]="Select Transport Type";	  
		}		
			
		if (empty($tr_transport_no)) {
		$errormessage[1]="Enter Transport Number"; 
		}	
		
		if (empty($tr_vehicle_no)) {
		$errormessage[2]="Enter Vehicle Registration Number"; 
		}	
			if (empty($tr_ins_renewal_date)) {
		$errormessage[3]="Enter Renewal Date"; 
		}
		
		if (empty($tr_route)) {
		$errormessage[4]="Enter Route"; 
		}
		
   if(count($errormessage)==0)
	 {
	 	 if (!isset($edit_id) && $edit_id ==""){
		sm_registerglobal_no('status','edit_id','start','column_name','emsg','addtrSubmit','tr_transport_type','tr_purchase_date','tr_transport_no','tr_transport_name','tr_vehicle_no','tr_insurance_date','tr_ins_renewal_date','tr_seating_capacity','tr_route','tr_route_from','tr_route_to','tr_route_via','tr_maintenance_type','tr_date_of_maintenance','tr_amount_paid','tr_remarks','maintenanceSubmit','vehicle_no','Search','type', 'date_to', 'date_from', 'to', 'from', 'dc1', 'dc2','Search2','checkitem','printTransport','print_view','transport_print','print_transportlist','trans_option','vocturetypesel','es_ledger','es_paymentmode','es_bank_name','es_bankacc','es_checkno','es_teller_number','es_bank_pin','es_narration','Submit2','asds_order');
		
		}
		
		if(isset($tr_transport_type)) {
		     $es_transport->tr_transport_type = $tr_transport_type;
		  
		  }
		  
		  if (isset($tr_transport_name)){
            		$es_transport->tr_transport_name = $tr_transport_name;
          }
		  
		 if (isset($tr_transport_no)){
            		$es_transport->tr_transport_no = $tr_transport_no;
          }
		  
		  if (isset($tr_vehicle_no)){
            		$es_transport->tr_vehicle_no = $tr_vehicle_no;
          }
		  
		  if (isset($tr_insurance_date)){
		  			$tr_insurance_date = formatDateCalender($tr_insurance_date);
            		$es_transport->tr_insurance_date = $tr_insurance_date;
          }

          if (isset($tr_ins_renewal_date)){
          			$tr_ins_renewal_date = formatDateCalender($tr_ins_renewal_date);
            		$es_transport->tr_ins_renewal_date = $tr_ins_renewal_date;
          }
		 if (isset($tr_purchase_date)){
		 			$tr_purchase_date = formatDateCalender($tr_purchase_date);
            		$es_transport->tr_purchase_date = $tr_purchase_date;
          }
		  
		  if (isset($tr_seating_capacity)){
            		$es_transport->tr_seating_capacity = $tr_seating_capacity;
          }
		   if (isset($tr_route)){
            		$es_transport->tr_route = $tr_route;
          }
		  
		  if (isset($tr_route_from)){
            		$es_transport->tr_route_from = $tr_route_from;
          }
		  
		  if (isset($tr_route_to)){
            		$es_transport->tr_route_to = $tr_route_to;
          }
		  
		  if (isset($tr_route_via)){
            		$es_transport->tr_route_via = $tr_route_via;
          }
		 
		  $es_transport->status = "active";
          
		  
	        if(empty($error)) {
				 
				  if (isset($edit_id) && $edit_id !=""){
				  	
					   $db->update("es_transport", "tr_transport_type              = '$tr_transport_type',
															  tr_transport_name     = '$tr_transport_name',
														      tr_purchase_date      = '$tr_purchase_date',
															  tr_transport_no       = '$tr_transport_no',
															  tr_vehicle_no         = '$tr_vehicle_no',
															  tr_insurance_date     = '$tr_insurance_date',
															  tr_ins_renewal_date   = '$tr_ins_renewal_date',
															  tr_seating_capacity   = '$tr_seating_capacity',
															  tr_route              = '$tr_route',
															  tr_route_from         = '$tr_route_from',
															  tr_route_to           = '$tr_route_to',
															  tr_route_via          = '$tr_route_via'","es_transportid=$edit_id"); 
					   
					   
						header("location:?pid=$pid&action=addtransport&emsg=2");
						exit;
				  } else {
				  	
					        
					$es_transport->Save();            	  
            	    header("location:?pid=$pid&action=$action&emsg=1");
            	    exit;
            	  }

           }  
       }
	}

if (isset($action) && $action=='edit_vehicles') {

 $getvehicles = $es_transport->Get($uid);   //gets vehicles 
      
}
if (isset($action) && $action=='view_vehicles') {
   
	  $viewvehicles = $es_transport->Get($uid);  //gets vehicles 

}
if (isset($action) && $action=='delete_vehicles') {
      $db->update("es_transport", "status='deleted'", "es_transportid=$uid");  
      $action = "addtransport";
	   header("location:?pid=$pid&action=$action&emsg=3");
}

if(isset($action) && $action == 'list_supply' ||  $action == "edit_vehicles" || $action == "addtransport"  ){
  

	if ( !isset($start) ){
		$start = 0;
	}	
	$no_rows = count($es_transport->GetList(array(array("es_transportid", ">", 0),array("status", "=", "active")) ));
	
		$orderby_array = array('orb1'=>'es_transportid', 'orb2'=>'tr_transport_type', 'orb3'=>'in_short_name');
		
		if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
			$orderby = $orderby_array[$column_name];
		}else{
			$orderby = "es_transportid";
		}
		if (isset($asds_order) && $asds_order=='ASC'){
			$order = true;
		}else{
			$order = false;
		}
	$addTransportList = $es_transport->GetList(array(array("status", "=", "active"),array("es_transportid", ">", "0")), $orderby, $order,  "$start , $q_limit" );

}
	
if ( isset($printTransport) && $printTransport!="" ) {
	

	$get_trans      = "SELECT * FROM `es_transport` where `es_transportid`=$checkitem";
	$get_trans_det  = getamultiassoc($get_trans);
	//header("Location:?&pid=11&action=print_transport");
	
	
	
}


/**********************************************************************
* Get  groups and Classes
**********************************************************************/
//get vehicle number
if(isset($vehicle_no) && $vehicle_no!=""){
	$vehicle_nbr = get_vehiclename($vehicle_no);
}	
	
	
	
	$es_transport_maintenance  = new es_transport_maintenance(); 
	
	if(isset($maintenanceSubmit)&&$maintenanceSubmit!= ""){
	//array_print($_POST); exit;
	  
	     $error = "";
		 
		  $vlc = new FormValidation();		
		if (empty($vehicle_no)) {
		$errormessage[0]="Enter Registration Number";	  
		}
		if (empty($tr_maintenance_type)) {
		$errormessage[1]="Enter Maintenance Type";	  
		}		
			
		if (!$vlc->is_nonNegNumber($tr_amount_paid)) {
		$errormessage[2]="Enter Amount"; 
		}	
		
	   if (empty($tr_remarks)) {
		$errormessage[4]="Enter Remarks"; 
		}
			
   if(count($errormessage)==0)
	 {
 
sm_registerglobal_no('status','edit_id','start','column_name','emsg','addtrSubmit','tr_transport_type','tr_purchase_date','tr_transport_no','tr_transport_name','tr_vehicle_no','tr_insurance_date','tr_ins_renewal_date','tr_seating_capacity','tr_route','tr_route_from','tr_route_to','tr_route_via','tr_maintenance_type','tr_date_of_maintenance','tr_amount_paid','tr_remarks','maintenanceSubmit','vehicle_no','Search','type', 'date_to', 'date_from', 'to', 'from', 'dc1', 'dc2','Search2','checkitem','printTransport','print_view','transport_print','print_transportlist','trans_option','vocturetypesel','es_ledger','es_paymentmode','es_bank_name','es_bankacc','es_checkno','es_teller_number','es_bank_pin','es_narration','Submit2','asds_order');

		if (isset($vehicle_no)) {
				$es_transport_maintenance->tr_transportid   = $vehicle_no;
			}
		
		
		if (isset($tr_maintenance_type)) {
		     $es_transport_maintenance->tr_maintenance_type    = $tr_maintenance_type;
		} 
		if (isset($tr_date_of_maintenance)) { 
				
			$tr_date_of_maintenance                              =  formatDateCalender($tr_date_of_maintenance);
		    $es_transport_maintenance->tr_date_of_maintenance    =  $tr_date_of_maintenance;
		}
        if (isset($tr_amount_paid)) {
		     $es_transport_maintenance->tr_amount_paid         = round($tr_amount_paid,2);
		  
		}
        if (isset($tr_remarks)) {
		     $es_transport_maintenance->tr_remarks             = $tr_remarks;
		  
		}
		if (isset($es_ledger)) {
		     $es_transport_maintenance->es_ledger             = $es_ledger;
		  
		}
   
        $es_transport_maintenance->status = "active";
        if(empty($error)) {
				 
				  if (isset($edit_id) && $edit_id !=""){
					   $vsel=array();
						$eid="trans_maintain".$uid;
						$voucherlistarr = voucher_finance();
					//array_print($voucherlistarr);
					
					for($i=0;$i<count($voucherlistarr);$i++){
					
					$arr[$voucherlistarr[$i]['es_voucherid']]=$voucherlistarr[$i]['voucher_type'];
					
					}
					
					for($i=0;$i<count($voucherlistarr);$i++){
					
					$vmode[$voucherlistarr[$i]['es_voucherid']]=$voucherlistarr[$i]['voucher_mode'];
					
					}
				
						//array_print($arr);
								//exit;
						$tes=$arr[$vocturetypesel];
						$vocherm=$vmode[$vocturetypesel];
						$db->update("es_transport_maintenance", "tr_maintenance_type        = '$tr_maintenance_type',
															     tr_amount_paid             = '$tr_amount_paid',
																 tr_date_of_maintenance		= '$tr_date_of_maintenance',
																 es_ledger                  = '$es_ledger',
															     tr_remarks                 = '$tr_remarks'","es_transport_maintenanceid=$edit_id"); 
																 
																 
					   $db->update("es_voucherentry", 			"es_vouchertype        = '$tes',
					    										es_vouchermode        = '$vocherm',
															     es_paymentmode        = '$es_paymentmode',
																 
																 es_bankacc 		   = '$es_bankacc',
																 es_particulars 	   = '$es_ledger',
																 es_amount 		       = '$tr_amount_paid',
																 es_checkno 		   = '$es_checkno',
																 es_teller_number 	   = '$es_teller_number',
																 es_bank_pin 		   = '$es_bank_pin',
																 es_bank_name 		   = '$es_bank_name',
																 es_narration 		   = '$es_narration '","es_receiptno='$eid'"); 
																 
																 
					   
						header("location: ?pid=$pid&action=edit_maintenance&emsg=2&uid=".$uid);
						exit;
				  }
				  else {			  
				  
				  
				   $insert_id = $es_transport_maintenance->Save();
            	 
				  ////******** narsimha ******///////
	$sel_paidin_amount = "SELECT 
				sum(CASE es_vouchermode WHEN 'paidin' THEN es_amount ELSE 0 END)AS paidintotal,
				sum(CASE es_vouchermode WHEN 'paidout' THEN es_amount ELSE 0 END)AS paidouttotal
				FROM es_voucherentry  "; 
				$sel_amount_exe = getarrayassoc($sel_paidin_amount);
				$paidintotal=$sel_amount_exe['paidintotal'];
				$paidouttotal=$sel_amount_exe['paidouttotal'];
				$diffamount = $paidintotal - $paidouttotal;
				//if ($diffamount>=$tr_amount_paid){
					$receptid = mysql_insert_id();	
					 
						 $obj_voucherentry = new es_voucherentry();
						 $vocturedetails = voucherid_finance($vocturetypesel);
						 $obj_voucherentry->es_vouchertype = $vocturedetails['voucher_type'];
						 $obj_voucherentry->es_receiptno   = "trans_maintain".$receptid;
						 $obj_voucherentry->es_paymentmode = $es_paymentmode;
						 $obj_voucherentry->es_bankacc	   = $es_bankacc;
						 $obj_voucherentry->es_particulars = $es_ledger;
						 $obj_voucherentry->es_amount	   = round($tr_amount_paid,2); 
			
			
						 $obj_voucherentry->es_bank_pin      = $es_bank_pin;
						 $obj_voucherentry->es_bank_name     = $es_bank_name;
						 $obj_voucherentry->es_teller_number = $es_teller_number;
			
						 $obj_voucherentry->es_narration   = $es_narration;
						 $obj_voucherentry->es_vouchermode = $vocturedetails['voucher_mode'];
						 $obj_voucherentry->es_checkno     = $es_checkno;
						 $obj_voucherentry->es_receiptdate = date('Y-m-d H:i:s');
						 $obj_voucherentry->ve_fromfinance = $tr_date_of_maintenance;
						 $obj_voucherentry->ve_tofinance   = $tr_date_of_maintenance;
						 
						 $obj_voucherentry->Save();
						
						// }
						 
						
	////********end narsimha *****/////

            	     header("location:?pid=$pid&action=$action&emsg=1");
            	     exit;
            	  }

           }  

     }
   }
if (isset($action) && $action=='edit_maintenance' && !$_POST) {
$eid="trans_maintain".$uid;
 $getmaintenance = $es_transport_maintenance->Get($uid); 
 $sql="SELECT * from es_voucherentry where es_receiptno='".$eid."'";
 $edit_main=$db->getRow($sql);
 
$vocturetypesel=$vids[$edit_main['es_vouchertype']];
$es_ledger=$edit_main['es_particulars'];
 $es_paymentmode=$edit_main['es_paymentmode'];
$es_bank_name=$edit_main['es_bank_name'];
$es_bankacc=$edit_main['es_bankacc'];
$es_checkno=$edit_main['es_checkno'];
$es_teller_number=$edit_main['es_teller_number'];
$es_bank_pin=$edit_main['es_bank_pin'];
$es_narration=$edit_main['es_narration'];
 $edit_id=$getmaintenance->es_transport_maintenanceId;
   //gets vehicles 
      
}
if (isset($action) && $action=='view_maintenance') {
   
	  $viewmaintenance = $es_transport_maintenance->Get($uid);  //gets vehicles 

}
if (isset($action) && $action=='delete_maintenance') {
$eid="trans_maintain".$uid;
      $db->update("es_transport_maintenance", "status='deleted'", "es_transport_maintenanceid=$uid"); 
	   $sql="delete from es_voucherentry where es_receiptno='".$eid."'";	
	 mysql_query($sql);

      $action = "maintenance";
	   header("location:?pid=$pid&action=$action&emsg=3&start=".$start);
}

if(isset($action) && ($action == "edit_maintenance" || $action == "maintenance")){
  

	if ( !isset($start) ){
		$start = 0;
	}	
	
	$maintain ="SELECT tran. * , main. * 
				FROM es_transport tran, es_transport_maintenance main
				WHERE tran.status =  'active'
				AND main.status =  'active'
				AND es_transport_maintenanceid >0
				AND tr_transportid = tr_vehicle_no";
	
	$no_rows = count($db->getRows($maintain));
	
	$orderby_array = array('orb1'=>'es_transport_maintenanceid', 'orb2'=>'tr_amount_paid', 'orb3'=>'in_short_name');
	
	if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
		$orderby = $orderby_array[$column_name];
	}else{
		$orderby = "es_transport_maintenanceid";
	}
	if (isset($asds_order) && $asds_order=='ASC'){
		$order = "ASC";
	}else{
		$order = "DESC";
	}
	
	$maintain ="SELECT tran. * , main. * 
				FROM es_transport tran, es_transport_maintenance main
				WHERE tran.status =  'active'
				AND main.status =  'active'
				AND es_transport_maintenanceid >0
				AND tr_transportid = tr_vehicle_no ORDER BY $orderby $order LIMIT $start , $q_limit";
	
	$maintenanceList = $db->getRows($maintain); 
	

}
/**
 * For Printing the maintenance details 
 */
$printmainurl = "";
if($action == 'trans_main_print') {
	
	$orderby_array = array('orb1'=>'es_transport_maintenanceid', 'orb2'=>'tr_amount_paid', 'orb3'=>'in_short_name');
	
	if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
		$orderby = $orderby_array[$column_name];
	}else{
		$orderby = "es_transport_maintenanceid";
	}
	if (isset($asds_order) && $asds_order=='ASC'){
		$order = "ASC";
	}else{
		$order = "DESC";
	}
	
	$maintain ="SELECT tran. * , main. * 
				FROM es_transport tran, es_transport_maintenance main
				WHERE tran.status =  'active'
				AND main.status =  'active'
				AND es_transport_maintenanceid >0
				AND tr_transportid = tr_vehicle_no ORDER BY $orderby $order ";
	
	$maintenanceList = $db->getRows($maintain); 

}
/**
*For View Report Page of Transport
*/

if(isset($action) && $action == "viewreport"   ){
    
		if (isset($Search)){

				  header("location:?pid=$pid&action=$action&from=$dc1&to=$dc2&trans_option=$trans_option");
                  exit;
      	}
		
		if ( !isset($start) ){
			$start = 0;
		}	
		
		if ($trans_option == "") {
			if ($from!="") {
					$date_from = formatDateCalender($from,"Y-m-d");
					$date_from = $date_from." 00:00:00";
					$searchUrl.= "&from=$from";
			}
			if ($to!="") {
				$date_to = formatDateCalender($to,"Y-m-d");
				$date_to = $date_to." 23:59:59";
				$searchUrl.= "&to=$to";
			}
			if($date_from!="" && $date_to!="") {
				  $ConditionArr = "AND main.tr_date_of_maintenance between '$date_from' and '$date_to' ";
			} else if($date_from!="" && $date_to=="") {
				  $ConditionArr = "AND main.tr_date_of_maintenance > '$date_from' ";
			} else if($date_from=="" && $date_to!="") {
				  $ConditionArr = "AND main.tr_date_of_maintenance < '$date_to' ";
			} else {
				$ConditionArr = "";
			}
        }
		else {
			if ($from!="") {
				$date_from = formatDateCalender($from,"Y-m-d");
				$date_from = $date_from." 00:00:00";
				$searchUrl.= "&from=$from";
			}
			if ($to!="") {
				$date_to = formatDateCalender($to,"Y-m-d");
				$date_to = $date_to." 23:59:59";
				$searchUrl.= "&to=$to";
			}
			if($date_from!="" && $date_to!="") {
				  $ConditionArr = "AND  tr_ins_renewal_date between '$date_from' and '$date_to' ";
			} else if($date_from!="" && $date_to=="") {
				  $ConditionArr = "AND  tr_ins_renewal_date > '$date_from' ";
			} else if($date_from=="" && $date_to!="") {
				  $ConditionArr = "AND  tr_ins_renewal_date < '$date_to' ";
			} else {
				$ConditionArr = "";
			}
		}        
  
		$orderby_array = array('orb1'=>'in_item_code', 'orb2'=>'in_item_name', 'orb3'=>'in_inventory_id');
		if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
			$orderby = $orderby_array[$column_name];
		}else{
			$orderby = "es_transportid";
		}
	
		if (isset($asds_order) && $asds_order=='ASC'){
			$order = "ASC";
		}else{
			$order = "DESC";
		}

		
		
		if ($trans_option == "") {
		
		$transport_no = $db->getRows("SELECT tran.* , main.* FROM es_transport tran, es_transport_maintenance main WHERE tran.status = 'active' AND main.status = 'active' AND tran.es_transportid >0 AND tran.tr_vehicle_no = main.tr_transportid $ConditionArr");
		
		$no_rows = count($transport_no);
		
		$transportList = $db->getRows("SELECT tran.* , main.* FROM es_transport tran, es_transport_maintenance main WHERE tran.status = 'active' AND main.status = 'active' AND tran.es_transportid >0 AND tran.tr_vehicle_no = main.tr_transportid $ConditionArr ORDER BY $orderby $order LIMIT $start , $q_limit " );
	
	
		}
		else {
		
		$trans_no = $db->getRows("SELECT * FROM `es_transport` WHERE status = 'active' $ConditionArr");
		
		$no_rows = count($trans_no);
	
		$transList = $db->getRows("SELECT * FROM `es_transport` WHERE status = 'active'  $ConditionArr ORDER BY $orderby $order LIMIT $start , $q_limit " );
		
		}
	

}

?>

<?php
if ($action == 'trans_report_print') {


	
	if($date_from!="" && $date_to!="") {
			  $ConditionArr = "AND main.tr_date_of_maintenance between '$date_from' and '$date_to' ";
		} else if($date_from!="" && $date_to=="") {
			  $ConditionArr = "AND main.tr_date_of_maintenance > '$date_from' ";
		} else if($date_from=="" && $date_to!="") {
			  $ConditionArr = "AND main.tr_date_of_maintenance < '$date_to' ";
		} else {
			$ConditionArr = "";
		}
                
  
		$orderby_array = array('orb1'=>'in_item_code', 'orb2'=>'in_item_name', 'orb3'=>'in_inventory_id');
		if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
			$orderby = $orderby_array[$column_name];
		}else{
			$orderby = "es_transportid";
		}
	
		if (isset($asds_order) && $asds_order=='ASC'){
			$order = "ASC";
		}else{
			$order = "DESC";
		}

		if ($trans_option == "") {
		$transportList = $db->getRows("SELECT tran.* , main.* FROM es_transport tran, es_transport_maintenance main WHERE tran.status = 'active' AND main.status = 'active' AND tran.es_transportid >0 AND tran.tr_vehicle_no = main.tr_transportid $ConditionArr ORDER BY $orderby $order  " );
		}
		else {
		$transportList = $db->getRows("SELECT tran.* , main.* FROM es_transport tran, es_transport_maintenance main WHERE tran.status = 'active' AND main.status = 'active' AND tran.es_transportid >0 AND tran.tr_vehicle_no = main.tr_transportid $ConditionArr ORDER BY $orderby $order  " );
		}
	
}
if ($action == 'trans_print') {
			
			$orderby_array = array('orb1'=>'in_item_code', 'orb2'=>'in_item_name', 'orb3'=>'in_inventory_id');
				if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
					$orderby = $orderby_array[$column_name];
				}else{
					$orderby = "es_transportid";
				}
			
				if (isset($asds_order) && $asds_order=='ASC'){
					$order = "ASC";
				}else{
					$order = "DESC";
				}

$transList = $db->getRows("SELECT * FROM `es_transport` WHERE status = 'active'  $ConditionArr ORDER BY $orderby $order " );
}

if(isset($allotvehicle) && $allotvehicle!=""){
if (empty($es_staffid)) {
		$errormessage[0]="Select Staff";	  
		}else{
	$sql_qry = "SELECT * FROM es_transport_allots WHERE es_staffid=".$es_staffid." and status='Allocated'";
	$coun = $db->getRows($sql_qry);
	if(count($coun)>0){
	$errormessage[7]="This user already alloted";	 
	}
		}
		if (empty($es_transportid)) {
		$errormessage[1]="Select Transpot type";	  
		}else{
	$sql_qry = "SELECT * FROM es_transport_allots WHERE es_transportid=".$es_transportid." and status='Allocated'";
	$coun = $db->getRows($sql_qry);
	if(count($coun)>0){
	$errormessage[6]="Vehicle already alloted";	 
	}
		}
		if (empty($driver_license)) {
		$errormessage[2]="Enter license";	  
		}	
		if (empty($issuing_authority)) {
		$errormessage[3]="Enter issuing Authority";	  
		}
		if (empty($valid_date)) {
		$errormessage[4]="Enter valid date";	  
		}
		if (empty($driver_alloted_date)) {
		$errormessage[5]="Enter Allot date";	  
		}
		
		
		if(count($errormessage)==0){
		//  checking existing driver in driver license details table
	$sql_qry = "SELECT * FROM es_transport_drivers WHERE es_staffid=".$es_staffid;
	$es_staff_arr = $db->getRows($sql_qry);
if(count($es_staff_arr)>0){
	if(is_uploaded_file($_FILES['license_doc']['tmp_name'])) {	
			$ext=explode(".",$_FILES['license_doc']['name']);
			$new_thumbname = "staff_".$es_staffid."_".$ext[0].".".$ext[1];
			$updir = "images/dirverdoc/";
			$uppath = $updir.$new_thumbname;
			move_uploaded_file($_FILES['license_doc']['tmp_name'],$uppath);
			$license_doc=$new_thumbname;
			
		} else {
			$license_doc = $es_staff_arr[0]['license_doc'];
		}
	$vldate=func_date_conversion("d/m/Y","Y-m-d",$valid_date);
	$db->update("es_transport_drivers", "driver_license        = '$driver_license',
															     issuing_authority             = '$issuing_authority',
																 valid_date		= '$vldate',
																 license_doc                  = '$license_doc'","es_staffid=$es_staffid");
	
	}else{
	
	if(is_uploaded_file($_FILES['license_doc']['tmp_name'])) {
	
			$ext=explode(".",$_FILES['license_doc']['name']);
			$new_thumbname = "staff_".$es_staffid ."_".$ext[0].".".$ext[1];
			$updir = "images/dirverdoc/";
			$uppath = $updir.$new_thumbname;
			move_uploaded_file($_FILES['license_doc']['tmp_name'],$uppath);
			$license_doc=$new_thumbname;
			
		}
		
	$valid_date=func_date_conversion("d/m/Y","Y-m-d",$valid_date);
		$al_array = array(
							'driver_license' 	=> $driver_license,
							'issuing_authority' => $issuing_authority,
							'valid_date' => $valid_date,
							'es_staffid' => $es_staffid,
							'license_doc' => $license_doc);
				$al_array = stripslashes_deep($al_array);
				$db->insert("es_transport_drivers",$al_array);
	}
$driver_alloted_date=func_date_conversion("d/m/Y","Y-m-d",$driver_alloted_date);
$alins_array = array(
					'es_staffid' 	=> $es_staffid,
					'es_transportid' => $es_transportid,
					'driver_alloted_date' => $driver_alloted_date,
					'deallocate_date' => "",
					'status' => 'Allocated');
				$alins_array = stripslashes_deep($alins_array);
				$db->insert("es_transport_allots",$alins_array);
				 header("location:?pid=11&action=allotdriver&emsg=1");
				
		}
		
}
?>


