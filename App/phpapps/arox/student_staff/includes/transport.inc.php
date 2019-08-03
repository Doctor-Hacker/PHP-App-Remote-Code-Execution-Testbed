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
						  'dc1', 
						  'dc2',
						  'Search2',
						  'asds_order' 
						  );
						  

/**
* Only Student or schoool staff  can be allowed to access this page
*/ 
checkuserinlogin();   
/**End of the permissions   **/
	  

      $q_limit  = 4;
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

	  if(isset($addtrSubmit)&&$addtrSubmit!= ""){
	
		 
		 $error = "";
		 
		  $vlc = new FormValidation();		
		if (empty($tr_transport_type)) {
		$errormessage[0]="Enter Transport";	  
		}		
			
		if (empty($tr_transport_no)) {
		$errormessage[2]="Enter Transport Number"; 
		}	
		
			if (empty($tr_route)) {
		$errormessage[3]="Enter Route"; 
		}
			if (empty($tr_ins_renewal_date)) {
		$errormessage[4]="Enter Renewal Date"; 
		}
   if(count($errormessage)==0)
	 {
 
		 /*$vlc = new FormValidation();
		 
		 if(empty($tr_transport_type)) {
		 $error_transport_type         = "Empty Transport";
         $error                       .= "transporttype"; 
		 }

		if (empty($tr_transport_no)) {
		    $error_transport_no         = "Empty Transport Number";
		    $error				       .= "transportno";
		}  
  
		if (empty($tr_route)) {
		    $error_route               = "Empty Route";
		    $error				      .= "route";
		}  
		
		if (empty($tr_ins_renewal_date)) {
		    $error_renewal_date               = "Empty&nbsp;Renewal";
		    $error				      .= "renewal";
		} */
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
            		$es_transport->tr_insurance_date = DatabaseFormat($tr_insurance_date, 'Y-m-d H:i:s');
          }
		  if (isset($tr_ins_renewal_date)){
            		$es_transport->tr_ins_renewal_date = DatabaseFormat($tr_ins_renewal_date,  'Y-m-d H:i:s');
          }
		 if (isset($tr_purchase_date)){
            		$es_transport->tr_purchase_date = DatabaseFormat($tr_purchase_date,  'Y-m-d H:i:s');
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
					   
						            $tr_insurance_date   =  DatabaseFormat($tr_insurance_date, 'Y-m-d H:i:s');
									$tr_ins_renewal_date = DatabaseFormat($tr_ins_renewal_date, 'Y-m-d H:i:s');
									$tr_purchase_date    = DatabaseFormat($tr_purchase_date, 'Y-m-d H:i:s');
						
						$db->update("es_transport", "tr_transport_type        = '$tr_transport_type',
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
					   
					   
						header("location: ?pid=$pid&action=$action&emsg=2");
						exit;
				  }
				  elseif ($es_transport->Save())
            	  {
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
		}else {
			$order = false;
		}
		
	$addTransportList = $es_transport->GetList(array(array("status", "=", "active"),array("es_transportid", ">", "0")), $orderby, $order,  "$start , $q_limit" );

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
	  
	     $error = "";
		 
		  $vlc = new FormValidation();		
		if (empty($vehicle_no)) {
		$errormessage[0]="Enter Vehicle Number";	  
		}
		if (empty($tr_maintenance_type)) {
		$errormessage[1]="Enter Maintenance";	  
		}		
			
		if (!$vlc->is_nonNegNumber($tr_amount_paid)) {
		$errormessage[2]="Invalid Amount"; 
		}	
		
	   if (empty($tr_remarks)) {
		$errormessage[4]="Enter Remarks"; 
		}
			
   if(count($errormessage)==0)
	 {
 
		/* 
		 if(empty($tr_maintenance_type)) {
		 $error_maintenance_type         = "Empty Maintenance";
         $error                         .= "maintenancetype"; 
		 }
        if (!$vlc->is_nonNegNumber($tr_amount_paid)) {
		$error_amount_paid             ="Invalid Amount";
		$error                        .="amount";
		}	 
        if (empty($tr_remarks)) {
	          $error_remarks                 ="Emty Remarks";
		      $error                        .="remarks";
		}*/

		if (isset($vehicle_no)) {
				$es_transport_maintenance->tr_transportid   = $vehicle_no;
			}
		
		
		if (isset($tr_maintenance_type)) {
		     $es_transport_maintenance->tr_maintenance_type    = $tr_maintenance_type;
		} 
		if (isset($tr_date_of_maintenance)) {
		     $es_transport_maintenance->tr_date_of_maintenance    = DatabaseFormat($tr_date_of_maintenance, 'Y-m-d H:i:s');
		}
        if (isset($tr_amount_paid)) {
		     $es_transport_maintenance->tr_amount_paid         = $tr_amount_paid;
		  
		}
        if (isset($tr_remarks)) {
		     $es_transport_maintenance->tr_remarks             = $tr_remarks;
		  
		}
   
        $es_transport_maintenance->status = "active";
        if(empty($error)) {
				 
				  if (isset($edit_id) && $edit_id !=""){
					   
						$tr_date_of_maintenance = DatabaseFormat($tr_date_of_maintenance, 'Y-m-d H:i:s');
						$db->update("es_transport_maintenance", "tr_maintenance_type        = '$tr_maintenance_type',
															     tr_amount_paid             = '$tr_amount_paid',
																 tr_date_of_maintenance		= '$tr_date_of_maintenance',
															     tr_remarks                 = '$tr_remarks'","es_transport_maintenanceid=$edit_id"); 
					   
					   
						header("location: ?pid=$pid&action=$action&emsg=2");
						exit;
				  }
				  elseif ($es_transport_maintenance->Save())
            	  {
            	     header("location:?pid=$pid&action=$action&emsg=1");
            	     exit;
            	  }

           }  

     }
   }
if (isset($action) && $action=='edit_maintenance') {

 $getmaintenance = $es_transport_maintenance->Get($uid);   //gets vehicles 
      
}
if (isset($action) && $action=='view_maintenance') {
   
	  $viewmaintenance = $es_transport_maintenance->Get($uid);  //gets vehicles 

}
if (isset($action) && $action=='delete_maintenance') {
      $db->update("es_transport_maintenance", "status='deleted'", "es_transport_maintenanceid=$uid");  
      $action = "maintenance";
	   header("location:?pid=$pid&action=$action&emsg=3");
}

if(isset($action) && $action == "edit_maintenance" || $action == "maintenance"  ){
  

	if ( !isset($start) ){
		$start = 0;
	}	
	$no_rows = count($es_transport_maintenance->GetList(array(array("es_transport_maintenanceid", ">", 0),array("status", "=", "active")) ));
	
		$orderby_array = array('orb1'=>'es_transport_maintenanceid', 'orb2'=>'tr_amount_paid', 'orb3'=>'in_short_name');
		
		if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
			$orderby = $orderby_array[$column_name];
		}else{
			$orderby = "es_transport_maintenanceid";
		}
		if (isset($asds_order) && $asds_order=='ASC'){
			$order = true;
		}else{
			$order = false;
		}
	$maintenanceList = $es_transport_maintenance->GetList(array(array("status", "=", "active"),array("es_transport_maintenanceid", ">", "0")), $orderby, $order,  "$start , $q_limit" );

}
/**
*For View Report Page of Transport
*/

if(isset($action) && $action == "viewreport"   ){
    
	if (isset($Search)){
                
				  header("location:?pid=$pid&action=$action&from=$dc1&to=$dc2");
                  exit;
      	}
	

	if ( !isset($start) ){
		$start = 0;
	}	
	if ($dc1!="") {
			$date_from = DatabaseFormat($dc1,"Y-m-d");
			$date_from = $date_from." 00:00:00";
			$searchUrl= "&from=$dc1";
		}
		if ($dc2!="") {
		    $date_to = DatabaseFormat($dc2,"Y-m-d");
			$date_to = $date_to." 23:59:59";
			$searchUrl.= "&to=$dc2";
		}
		
		//$ConditionArr = array();
	// Searching Conditions
		     
			
	
		if ($Search2=='Search') {
			  
				if($date_from!="" && $date_to!="") {
				
					  $ConditionArr = "AND `tr_ins_renewal_date` between '$date_from' and '$date_to' ";
				} else if($date_from!="" && $date_to=="") {
					  $ConditionArr = "AND `tr_ins_renewal_date` > '$date_from' ";
				} else if($date_from=="" && $date_to!="") {
					  $ConditionArr = "AND `tr_ins_renewal_date` < '$date_to' ";
				}
				else 
				{
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
	
	//$transportList = $db->getRows("SELECT tran. * , main. * FROM es_transport tran, es_transport_maintenance main WHERE tran.status = 'active' AND tran.es_transportid >0
//AND tran.es_transportid = main.tr_transportid $ConditionArr ORDER BY $orderby $order " );


$transportList = $db->getRows("SELECT * FROM `es_transport` WHERE `status` = 'active' AND es_transportid >0
 $ConditionArr ");	

}

?>

