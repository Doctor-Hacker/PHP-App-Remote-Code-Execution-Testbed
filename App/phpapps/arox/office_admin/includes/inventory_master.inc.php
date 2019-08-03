<?php
    	sm_registerglobal('pid', 
	                  'action',
				      'uid', 
					  'status',
					  'edit_id',
					  'start',
					  'column_name',
					  'emsg', 
					  'asds_order', 
					  'admin', 
					  'update',
					  'inventorysubmit', 
					  'in_inventory_name', 
					  'in_short_name', 
					  'in_description', 
					  'in_category_name', 
					  'in_description',
					  'in_name',
					  'in_address',
					  'in_city',
					  'in_state',
					  'in_country',
					  'in_office_no',
					  'in_mobile_no',
					  'in_email',
					  'in_fax',
					  'in_item_code',
					  'in_item_name',
					  'in_item_name',
					  'in_qty_available',
					  'in_reorder_level',
					  'in_quantity_issued',
					  'in_recieved_date',
					  'in_last_issued_date',
					  'in_units',
					  'in_inventory_id',
					  'in_category_id',//inventory,category,item,supply  variables ends here 
					  'Submit', 
					  'item_code', 
					  'item_name', 
					  'quantity', 
					  'price', 
					  'amount', 
					  'es_in_ordersid', 
					  'in_suplier_name', 
					  'in_items_purchased', 
					  'order_date', 
					  'in_rec_note_no', 
					  'in_rec_date', 
					  'in_rec_bill_no', 
					  'in_items_recieved', 
					  'in_tot_amnt', 
					  'in_ord_status', 
					  'status', 
					  'checkitem', 
					  'OrderNow', 
					  'type', 
					  'es_inventoryid', 
					  'es_in_goods_issueid', 
					  'in_issue_date', 
					  'in_issue_to', 
					  'in_inventory_id', 
					  'in_issued_items', 
					  'in_returned_items', 
					  'in_department_id', 
					  'in_issue_status', 
					  'return_date', 
					  'Search', 
					  'dc1',
					  'dc2',
					  'reorder', 
					  'date_to', 
					  'date_from', 
					  'from', 
					  'to', 
					  'selectview',
					  'item',
					  'inventory_print',
					  'inv_category_print',
					  'item_print',
					  'supplier_print',
					  'vocturetypesel','cost','es_ledger','es_paymentmode','es_bank_name','es_bankacc','es_checkno','es_teller_number','es_bank_pin','es_narration','Submit2','update_purchase','update_goodsreceipt','status','status1'
					  );

/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
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
 
if($action=="add_order" || $action=='goods_reciept' || $action=='stock_details' || $action=='goods_issue' || $action=='return_issue' || $action=='inventory_reports')
{
	  $es_in_orders = new es_in_orders();
      $es_in_supplier_master = new es_in_supplier_master();
      $es_in_item_master = new es_in_item_master();
      $es_in_goods_issue = new es_in_goods_issue();
      $es_inventory = new es_inventory();
      
	  $query1    = "select max(es_in_ordersid) from es_in_orders";    // To Get next Order number
      $maxOrder  = $db->getOne($query1);
      $nextOrder = $maxOrder+1;                                   // Next Order number
      
      $query2    = "select max(in_rec_note_no) from es_in_orders";    // To Get next GRN number
      $maxGrn    = $db->getOne($query2);
      $nextGrn   = $maxGrn+1;                                   // Next GRN number
      
      $query3    = "select max(es_in_goods_issueid) from es_in_goods_issue"; 
	  //$query31    = "select * from es_in_goods_issue ORDER BY es_in_goods_issueid LIMIT 0,1 "; 
	     //$maxGIN123   = $db->getrow($query31);
		 //array_print(unserialize($maxGIN123['in_issued_items']));
		 // To Get next GIN number
      $maxGIN    = $db->getOne($query3);
      $nextGIN   = $maxGIN+1;                                   // Next GIN number
   
	  $in_supplierList = $es_in_supplier_master->GetList(array(array("status", "=", "active")));
      $in_itemsList    = $es_in_item_master->GetList(array(array("status", "=", "active")));
      $in_OrdersList   = $es_in_orders->GetList(array(array("in_ord_status", "=", "pending"),array("status", "=", "active")));
      
      
}

	$q_limit  = PAGENATE_LIMIT;

	$es_inventory = new es_inventory();
	
	$es_in_category = new es_in_category();
	
	$inventoryList = $es_inventory->GetList(array(array("status", "=", "active"),array("es_inventoryid", ">", "0")));
	$categoryList = $es_in_category->GetList(array(array("status", "=", "active"),array("es_in_categoryid", ">", "0")));

//	$es_inventory->es_enquiryId = $uid;
if(isset($inventorysubmit)) {
	
      $error = "";
	  
	  $vlc = new FormValidation();		
		if ($in_inventory_name=="") {
			$errormessage[0]="Enter Inventory Type";	  
		}else{
		    $condition="";
		    if(isset($edit_id) && $edit_id !=""){$condition = " AND es_inventoryid!=".$edit_id."";}
			$rows = $db->getone("SELECT COUNT(*) FROM es_inventory WHERE in_inventory_name='".$in_inventory_name."' ".$condition."");
			if($rows>=1){$errormessage[0]="Inventory Type Already Exists";}
		}	
		if ($in_short_name=="") {
			$errormessage[1]="Enter Short Name";	  
		}		
		if (($in_description=="")) {
			$errormessage[2]="Enter Description"; 
		}	
		
	if(count($errormessage)==0)
	{
		if (isset($in_inventory_name)){
			$es_inventory->in_inventory_name = $in_inventory_name;
		}
		if (isset($in_short_name)){
			$es_inventory->in_short_name = $in_short_name;
		}
		if (isset($in_description)){
			$es_inventory->in_description = $in_description;
		}
		$es_inventory->status = "active";
      
	if(empty($error)) {
	  if (isset($edit_id) && $edit_id !=""){
           
		    $db->update("es_inventory", "in_inventory_name = '$in_inventory_name',
                                      in_short_name     = '$in_short_name',   
                                      in_description    = '$in_description'","es_inventoryid=$edit_id"); 
           $action = "addinventory";
		     $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_inventory','Inventory','Create Inventory Type','".$edit_id."','EDIT INVENTORY','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
		  // $emsg = "editsuccess";
		    header("location: ?pid=$pid&action=$action&emsg=2");
            exit;
      }
      elseif ($in_id = $es_inventory->Save())
      {
	  
	  $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_inventory','Inventory','Create Inventory Type','".$in_id."','ADD INVENTORY','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
	
            $action = "addinventory";
		    $emsg = "insertsuccess";
		    header("location:?pid=$pid&action=$action&emsg=1");
            exit;
      }
     }
   }
}
if (isset($action) && $action=='edit_inventory') {
      $getinventory = $es_inventory->Get($uid);  //gets inventory whose id is 1
}
if (isset($action) && $action=='view_inventory') {
      $viewinventory = $es_inventory->Get($uid);  //gets inventory whose id is 1
}

if (isset($action) && $action=='delete') {
      $db->update("es_inventory", "status='deleted'", "es_inventoryid=$uid");  //deletes the record from the database.
	  
	  $action = "addinventory";
	  
	  $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_inventory','Inventory','Create Inventory Type','".$uid."','DELETE INVENTORY','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
	
	  header("location:?pid=$pid&action=$action&emsg=deletesuccess");
}
if(isset($action) && $action == 'list_inventory' ||  $action == "remove_inventory" || $action == "edit_inventory" || $action == "addinventory"  ){
  
  
	if ( !isset($start) ){
		$start = 0;
	}	
	$no_rows = count($es_inventory->GetList(array(array("es_inventoryid", ">", 0),array("status", "=", "active")) ));
	
		$orderby_array = array('orb1'=>'es_inventoryid', 'orb2'=>'in_inventory_name', 'orb3'=>'in_short_name');
		
		if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
			$orderby = $orderby_array[$column_name];
		}else{
			$orderby = "es_inventoryid";
		}
		if (isset($asds_order) && $asds_order=='ASC'){
			$order = true;
		}else{
			$order = false;
		}
	$inventoryList = $es_inventory->GetList(array(array("status", "=", "active"),array("es_inventoryid", ">", "0")), $orderby, $order,  "$start , $q_limit" );

}

/*
 *Printing of Inventory Reports 
*/
	 if ($action == 'inventory_print') {
	 
	 $orderby_array = array('orb1'=>'es_inventoryid', 'orb2'=>'in_inventory_name', 'orb3'=>'in_short_name');
		
		if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
			$orderby = $orderby_array[$column_name];
		}else{
			$orderby = "es_inventoryid";
		}
		if (isset($asds_order) && $asds_order=='ASC'){
			$order = true;
		}else{
			$order = false;
		}
	$inventoryListPrint = $es_inventory->GetList(array(array("status", "=", "active"),array("es_inventoryid", ">", "0")), $orderby, $order);
	 
	  $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_inventory','Inventory','Create Inventory Type','','PRINT INVENTORY','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
	
	}


if(isset($_POST['categorysubmit'])) {

	     $error = "";
	  
	    $vlc = new FormValidation();		
		if ($in_category_name=="") {
		$errormessage[0]="Enter Category Name";	  
		}else{
		    $condition="";
		    if(isset($edit_id) && $edit_id !=""){$condition = " AND es_in_categoryid!=".$edit_id."";}
			$rows = $db->getone("SELECT COUNT(*) FROM es_in_category WHERE in_category_name='".$in_category_name."' ".$condition."");
			if($rows>=1){$errormessage[0]="Category already Exists";}
		}			
			
		if (($in_description=="")) {
		$errormessage[2]="Enter Description"; 
		}	
		
   if(count($errormessage)==0)
	 {
		
            if (isset($in_category_name)){
      		$es_in_category->in_category_name = $in_category_name;
      	}
           if (isset($in_description)){
      		$es_in_category->in_description = $in_description;
      	}
          $es_in_category->status = "active";
  
         if(empty($error)) {
	     if (isset($edit_id) && $edit_id !=""){
           
		    $db->update("es_in_category", "in_category_name = '$in_category_name',
                                      
                                      in_description    = '$in_description'","es_in_categoryid=$edit_id"); 
									  
			  $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_in_category','Inventory','Add Product Category','".$edit_id."','EDIT PRODUCT CATEGORY','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
           $action = "addcategory";
		   $emsg = 2;
		    header("location: ?pid=$pid&action=$action&emsg=2");
            exit;
		  }
		  elseif ($ic_id = $es_in_category->Save(true)){
		  
		    $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_in_category','Inventory','Add Product Category','".$ic_id."','ADD PRODUCT CATEGORY','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
	
				$action = "addcategory";
				$emsg = 1;
				header("location:?pid=$pid&action=$action&emsg=1");
				exit;		
        }
      }
   }
}

if (isset($action) && $action=='edit_category') {
    
	  $getcategory = $es_in_category->Get($uid);  //gets category whose id is 1
      
}
if (isset($action) && $action=='view_category') {
   
	  $viewcategory = $es_in_category->Get($uid);  //gets category whose id is 1

}

if (isset($action) && $action=='delete_category') {
      $db->update("es_in_category", "status='deleted'", "es_in_categoryid=$uid");  //deletes the record from the database.
	  
	  
		    $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_in_category','Inventory','Add Product Category','".$uid."','DELETE PRODUCT CATEGORY','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
	
	  $action = "addcategory";
	  header("location:?pid=$pid&action=$action&emsg=3");
}
if(isset($action) && $action == 'list_category' ||  $action == "remove_category" || $action == "edit_category" || $action == "addcategory"  ){
  
 
	if ( !isset($start) ){
		$start = 0;
	}	
	$no_rows = count($es_in_category->GetList(array(array("es_in_categoryid", ">", 0),array("status", "=", "active")) ));
	
		$orderby_array = array('orb1'=>'es_in_categoryid', 'orb2'=>'in_category_name', 'orb3'=>'in_description');
		
		if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
			$orderby = $orderby_array[$column_name];
		}else{
			$orderby = "es_in_categoryid";
		}
		if (isset($asds_order) && $asds_order=='ASC'){
			$order = true;
		}else{
			$order = false;
		}
	$categoryList = $es_in_category->GetList(array(array("status", "=", "active"),array("es_in_categoryid", ">", "0")), $orderby, $order,  "$start , $q_limit" );
	
	

}

		if ( $action == 'inv_category_print') {
			if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
			$orderby = $orderby_array[$column_name];
			}else{
			$orderby = "es_in_categoryid";
			}
			if (isset($asds_order) && $asds_order=='ASC'){
				$order = true;
			}else{
				$order = false;
			}
			$categoryListPrint = $es_in_category->GetList(array(array("status", "=", "active"),array("es_in_categoryid", ">", "0")), $orderby, $order);
			
			$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_in_category','Inventory','Add Product Category','".$uid."','DELETE PRODUCT CATEGORY','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);

		
		}
$es_in_item_master = new es_in_item_master();
  
     if(isset($_POST['itemSubmit'])) {
        $error = "";
		
		$vlc = new FormValidation();		
		if (empty($in_item_code)){
		$errormessage[0]="Enter Item Code";	  
		}
		else
		{
		$con='';
		if(isset($edit_id) && $edit_id!='')
		{
		$con=' AND es_in_item_masterid!='.$edit_id;
		}
		 $rowCount = $db->getOne('SELECT COUNT(*) FROM es_in_item_master WHERE in_item_code="'.$in_item_code.'"'.$con);
	
			if ( isset($rowCount)&&$rowCount>0 ) {
				$errormessage[0]="Item Code Already Exists";
			}
			}	
		if (empty($in_item_name)) {
		$errormessage[1]="Enter Item Name";	  
		}
		if (empty($in_inventory_id)) {
		$errormessage[2]="Enter Inventory Type";	  
		}		
		if  (empty($in_category_id)) {
		$errormessage[3]="Enter Category Name"; 
		}
		if (empty($in_units)) {
		$errormessage[4]="Invalid Units"; 
		}
		if (!$vlc->is_nonNegNumber($cost )) {
		$errormessage[5]="Invalid Item Cost";	  
		}
		if (!$vlc->is_nonNegNumber($in_qty_available )) {
		$errormessage[6]="Invalid Quantity in hand"; 
		}	
		if (!$vlc->is_nonNegNumber($in_reorder_level )) {
		$errormessage[7]="Invalid Re-order Level";	  
		}
					
			
			
		

	if(count($errormessage)==0)
	{
		

		if (isset($in_item_code)){
		$es_in_item_master->in_item_code = $in_item_code;
	      }
		if (isset($in_item_name)){
		$es_in_item_master->in_item_name = $in_item_name;
	      }
		if (isset($in_units)){
			$es_in_item_master->in_units = $in_units;
		}
		if (isset($cost)){
			$es_in_item_master->cost = $cost;
		}	
		if (isset($in_qty_available)){
			$es_in_item_master->in_qty_available = $in_qty_available;
		}	
		if (isset($in_reorder_level)){
			$es_in_item_master->in_reorder_level = $in_reorder_level;
		}
	      
		if (isset($in_inventory_id)){
			$es_in_item_master->in_inventory_id = $in_inventory_id;
		}  
		if (isset($in_category_id)){
			$es_in_item_master->in_category_id = $in_category_id;
		}  
		  $es_in_item_master->status = "active";
	
		
		
        
                 if (isset($edit_id) && $edit_id !=""){
           
		    $db->update("es_in_item_master", "in_item_code       = '$in_item_code',
                                      in_item_name                   = '$in_item_name',   
                                      in_units                       = '$in_units',
                                      in_qty_available               = '$in_qty_available',
                                      in_inventory_id                = '$in_inventory_id',
                                      in_category_id                 = '$in_category_id',
                                      in_reorder_level               = '$in_reorder_level',
									  cost							= '$cost'","es_in_item_masterid=$edit_id"); 
			$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_in_item_master','Inventory','Add Item','".$edit_id."','UPDATE ITEM','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
	
           $action = "additem";
		   $emsg = "editsuccess";
		    header("location: ?pid=$pid&action=$action&emsg=2");
            exit;
      }
    
        
     
  
	    if ($es_in_item_master->Save(true))
			  {
			      $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_in_item_master','Inventory','Add Item','".$edit_id."','ADD ITEM','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
			       $action = "additem";
					$emsg = "insertsuccess";
					header("location:?pid=$pid&action=$action&emsg=1");
					exit;
			  } 
			  else {
			       header("location: ?pid=$pid&action=$action&emsg=".$error1);
                    exit;

			  }   
	   
	    
  
  }     
}

      if (isset($action) && $action=='edit_item') {
      $getitem = $es_in_item_master->Get($uid);  //gets inventory whose id is 1
}
      if (isset($action) && $action=='view_item') {
            $viewitem = $es_in_item_master->Get($uid);  //gets inventory whose id is 1
     		$inventory_name  = $db->getRow("SELECT * FROM `es_inventory` WHERE  `es_inventoryid` =  '".$es_in_item_master->in_inventory_id."' ");
			$category_sel   = mysql_query("SELECT * FROM `es_in_category` WHERE es_in_categoryid=".$es_in_item_master->in_category_id);
			$category_name  = mysql_fetch_assoc($category_sel);
			
			$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_in_item_master','Inventory','Add Item','".$es_in_item_master->in_inventory_id."','VIEW ITEM','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
	  }
      
      if (isset($action) && $action=='delete_item') {
            $db->update("es_in_item_master", "status='deleted'", "es_in_item_masterid=$uid");  //deletes the record from the database.
			
			$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_in_item_master','Inventory','Add Item','".$uid."','DELETE ITEM','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
      	  $action = "additem";
      	  header("location:?pid=$pid&action=$action&emsg=3");
      }
if(isset($action) && $action == "edit_item" || $action == "additem"  ){
  

	if ( !isset($start) ){
		$start = 0;
	}	
	$no_rows = count($es_in_item_master->GetList(array(array("es_in_item_masterid", ">", 0),array("status", "=", "active")) ));
	
	$orderby_array = array('orb1'=>'in_item_code', 'orb2'=>'in_item_name', 'orb3'=>'in_inventory_id');
	
	if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
		$orderby = $orderby_array[$column_name];
	}else{
		$orderby = "es_in_item_masterid";
	}
/*
      if (isset($asds_order) && $asds_order=='ASC'){
		$order = true;
	}else{
		$order = false;
	}
	//$itemList = $es_in_item_master->GetList(array(array("status", "=", "active"),array("es_in_item_masterid", ">", "0")), $orderby, $order,  "$start , $q_limit" );
*/
      if (isset($asds_order) && $asds_order=='ASC'){
		$order = "ASC";
	}else{
		$order = "DESC";
	}
	
	$itemList = $db->getRows("SELECT * FROM es_in_item_master  WHERE status='active' ORDER BY $orderby $order LIMIT $start , $q_limit ");
	

}

		if ($action == "item_print") {
		
			$orderby_array = array('orb1'=>'in_item_code', 'orb2'=>'in_item_name', 'orb3'=>'in_inventory_id');
	
			if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
				$orderby = $orderby_array[$column_name];
			}else{
				$orderby = "es_in_item_masterid";
			}

			  if (isset($asds_order) && $asds_order=='ASC'){
				$order = "ASC";
			  }else{
				$order = "DESC";
			  }
			//  echo "SELECT itm.*, inv.in_inventory_name FROM es_in_item_master itm, es_inventory inv WHERE itm.status='active' AND itm.es_in_item_masterid > 0 AND itm.in_inventory_id = inv.es_inventoryid ORDER BY $orderby $order";
			$itemListPrint = $db->getRows("SELECT * FROM es_in_item_master  WHERE status='active' ORDER BY $orderby $order");

$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_in_item_master','Inventory','Add Item','','PRINT ITEM','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
		
		}

$es_in_supplier_master = new es_in_supplier_master();
  if(isset($_POST['supplysubmit'])) {
  

       $error = "";
	   
	   
	   $vlc = new FormValidation();
		
		if (empty($in_name))	{
		$errormessage[0]="Enter Supplier Name";	  
		}else{
		    $condition="";
		    if(isset($edit_id) && $edit_id !=""){$condition = " AND es_in_supplier_masterid!=".$edit_id."";}
			$rows = $db->getone("SELECT COUNT(*) FROM es_in_supplier_master WHERE in_name='".$in_name."' ".$condition."");
			if($rows>=1){$errormessage[0]="Supplier Already Exists";}
		}			
		if (empty($in_address )) {
		$errormessage[1]="Enter Address";	  
		}
		
		
		if  (empty($in_office_no)) {
			$errormessage[2]="Enter Office Number"; 
		}
		
		if(count($errormessage)==0)
		{
		    if (isset($in_name)){
            	$es_in_supplier_master->in_name = $in_name;
            }
            if (isset($in_address)){
            	$es_in_supplier_master->in_address = $in_address;
            }
            if (isset($in_city)){
            	$es_in_supplier_master->in_city = $in_city;
            }
            if (isset($in_state)){
            	$es_in_supplier_master->in_state = $in_state;
            }
            if (isset($in_country)){
            	$es_in_supplier_master->in_country = $in_country;
            }
            if (isset($in_office_no)){
            	$es_in_supplier_master->in_office_no = $in_office_no;
            }
            if (isset($in_mobile_no)){
            	$es_in_supplier_master->in_mobile_no = $in_mobile_no;
            }
            if (isset($in_email)){
            	$es_in_supplier_master->in_email = $in_email;
            }
        
			
			if (isset($in_fax)){
            	$es_in_supplier_master->in_fax = $in_fax;
            }
            if (isset($in_description)){
            	$es_in_supplier_master->in_description = $in_description;
            }
           $es_in_supplier_master->status = "active";                      	
 
          if(empty($error)) {
		  if (isset($edit_id) && $edit_id !=""){
           
		    $db->update("es_in_supplier_master", "in_name        = '$in_name',
                                                  in_address     = '$in_address',
												  in_city        = '$in_city',
												  in_state       = '$in_state',
												  in_country     = '$in_country',
												  in_address     = '$in_address',
												  in_office_no   = '$in_office_no',
												  in_mobile_no   = '$in_mobile_no',
												  in_email       = '$in_email',
												  in_fax         = '$in_fax',
												  in_description = '$in_description'","es_in_supplier_masterid=$edit_id"); 
												  
			$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_in_supplier_master','Inventory','Add Supplier','".$edit_id."','UPDATE SUPPLIERS','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
           $action = "addsupply";
		   $emsg = "editsuccess";
		    header("location: ?pid=$pid&action=$action&emsg=2");
            exit;
      }
      elseif ($sm_id = $es_in_supplier_master->Save(true)){
	  
	  $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_in_supplier_master','Inventory','Add Supplier','".$sm_id."','ADD SUPPLIERS','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
	
            $action = "addsupply";
		    $emsg = "insertsuccess";
		    header("location:?pid=$pid&action=$action&emsg=1");
            exit;		
        }

   }  
}
}

if (isset($action) && $action=='edit_supply') {
    
	  $getsupply = $es_in_supplier_master->Get($uid);  //gets Supply whose id is 1
      
}
if (isset($action) && $action=='view_supply') {
   
	  $viewsupply = $es_in_supplier_master->Get($uid);  //gets Supply whose id is 1
	  
	  $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_in_supplier_master','Inventory','Add Supplier','".$uid."','VIEW SUPPLIERS','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);

}

if (isset($action) && $action=='delete_supply') {
      $db->update("es_in_supplier_master", "status='deleted'", "es_in_supplier_masterid=$uid");  //deletes the record from the database.
	  
	   $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_in_supplier_master','Inventory','Add Supplier','".$uid."','DELETE SUPPLIERS','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);

	  $action = "addsupply";
	  header("location:?pid=$pid&action=$action&emsg=3");
}

if(isset($action) && $action == 'list_supply' ||  $action == "remove_supply" || $action == "edit_supply" || $action == "addsupply"  ){
  

	if ( !isset($start) ){
		$start = 0;
	}	
	$no_rows = count($es_in_supplier_master->GetList(array(array("es_in_supplier_masterid", ">", 0),array("status", "=", "active")) ));
	
		$orderby_array = array('orb1'=>'es_in_supplier_masterid', 'orb2'=>'in_name', 'orb3'=>'in_short_name');
		
		if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
			$orderby = $orderby_array[$column_name];
		}else{
			$orderby = "es_in_supplier_masterid";
		}
		if (isset($asds_order) && $asds_order=='ASC'){
			$order = true;
		}else{
			$order = false;
		}
	$supplyList = $es_in_supplier_master->GetList(array(array("status", "=", "active"),array("es_in_supplier_masterid", ">", "0")), $orderby, $order,  "$start , $q_limit" );

}
/*
 * Print Report for suppliers
*/
	if ($action == 'supplier_print' ) {
			$orderby_array = array('orb1'=>'es_in_supplier_masterid', 'orb2'=>'in_name', 'orb3'=>'in_short_name');
		
		if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
			$orderby = $orderby_array[$column_name];
		}else{
			$orderby = "es_in_supplier_masterid";
		}
		if (isset($asds_order) && $asds_order=='ASC'){
			$order = true;
		}else{
			$order = false;
		}
	$supplyListPrint = $es_in_supplier_master->GetList(array(array("status", "=", "active"),array("es_in_supplier_masterid", ">", "0")), $orderby, $order);
	
	 $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_in_supplier_master','Inventory','Add Supplier','','PRINT SUPPLIERS','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
		
	}
 //Inc file for Purchase Order, Goods Receipt Note, Goods Issue Note, Return Issue Note, Stock Details, Inventory Reports

 
      if($action=="add_order")
      {
           
		 if (isset($OrderNow) && $OrderNow!=""){
                  
				 $vlc = new FormValidation();	
				
				
				 if (empty($checkitem)) {
					   $errormessage[0]="Invalid Check"; 
					}
				
				if(count($errormessage)==0)
	 			   {
				  
				  $itId = array();
                  $str_itm = " ( ".implode(",",$checkitem)." ) ";
                  $Ord_itemList = $db->getRows("SELECT * FROM `es_in_item_master` WHERE `es_in_item_masterid` IN $str_itm ");
				  
				  $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_in_item_master','Inventory','Inventory Reports','','PLACING ORDER','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
            
				  }
			
			
			}
            else if (isset($Submit) && $Submit!=""){
            	
            	
				
				if (isset($in_suplier_name)){
            		$es_in_orders->in_suplier_name = $in_suplier_name;
            	}
            	
           
            	if (isset($order_date)){
            		$es_in_orders->order_date = formatDateCalender($order_date, 'Y-m-d H:i:s');
            	}
            	
            	$arrayItems = array();
            	$sl = 1;
                  for($n=1;$n<=count($item_name);$n++)
            	{
            	     if($item_name[$n]!="" && $item_code[$n]!="" && $quantity[$n]!="")
            	     {
                         $arrayItems[$sl]['slno'] = $sl;
                  	     $arrayItems[$sl]['item_code'] = $item_code[$n];
                  	     $arrayItems[$sl]['item_name'] = $item_name[$n];
                  	     $arrayItems[$sl]['quantity'] = $quantity[$n];
                  	     $sl++;
                        }
            	}

            	if ($arrayItems!=""){
            	     $es_in_orders->in_items_purchased = serialize($arrayItems);
                  }
            	$es_in_orders->in_ord_status = "pending";
            	$es_in_orders->status = "active";
            	if ($ordid = $es_in_orders->Save())
            	{
				    $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_in_orders','Inventory','Purchase Order','".$ordid."','ADD ORDERS','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
	
            	     header("location:?pid=$pid&action=$action&emsg=ordplaced");
            	     exit;
            	}
    			       
		    }
     
	    
	  }
      if($action=='goods_reciept'){
            
            if (isset($Submit) && $Submit!=""){
//			array_print($_POST);exit;
		if (isset($in_rec_date)){
            		$rec_date = func_date_conversion("d/m/Y H:i A","Y-m-d H:i:s",$in_rec_date);
					
            	}
            	if (isset($in_rec_bill_no)){
            		$rec_bill_no = $in_rec_bill_no;
            	}
            	if (isset($es_in_ordersid)){
            		$ordersid = $es_in_ordersid;
            	}
            	if (isset($in_rec_note_no)){
            		$rec_note_no = $in_rec_note_no;
            	}
            	
            	$arrayItems = array();
            	$sl = 1;
                  for($n=1;$n<=count($item_name);$n++)
            	{
            	     if($item_name[$n]!="" && $item_code[$n]!="" && $quantity[$n]!="" && $price[$n]!="")
            	     {
						$arrayItems[$sl]['slno'] = $sl;
                  	     $arrayItems[$sl]['item_code'] = $item_code[$n];
                  	     $arrayItems[$sl]['item_name'] = $item_name[$n];
                  	     $arrayItems[$sl]['quantity'] = $quantity[$n];
                  	     $arrayItems[$sl]['price'] = $price[$n];
                  	     $arrayItems[$sl]['amount'] = $amount[$n];
                  	     
                  	     $prDate = $rec_date;
                  	     if($quantity[$n]>0) {
                  	     	$db->update("es_in_item_master", "in_qty_available = in_qty_available + '$quantity[$n]',
                                      in_last_recieved_date = '$prDate'",
                                      "es_in_item_masterid='$item_code[$n]'");
                  	     }
                  	     $sl++;
                        }
            	}
            	
            	if ($arrayItems!=""){
            		$items_recieved = serialize($arrayItems);
            	}
            	$ord_status = "complete";
            	$tot_amnt = $in_tot_amnt;
            	
                  $db->update("es_in_orders", "in_rec_note_no = '$rec_note_no',
                                      in_rec_date     = '$rec_date',   
                                      in_rec_bill_no     = '$rec_bill_no',   
                                      in_items_recieved     = '$items_recieved',   
                                      in_tot_amnt     = '$tot_amnt',   
                                      in_ord_status    = '$ord_status'",
                                      "es_in_ordersid=$ordersid");
				////******** narsimha ******///////
	            $sel_paidin_amount = "SELECT 
				sum(CASE es_vouchermode WHEN 'paidin' THEN es_amount ELSE 0 END)AS paidintotal,
				sum(CASE es_vouchermode WHEN 'paidout' THEN es_amount ELSE 0 END)AS paidouttotal
				FROM es_voucherentry  "; 
				$sel_amount_exe = getarrayassoc($sel_paidin_amount);
				$paidintotal=$sel_amount_exe['paidintotal'];
				$paidouttotal=$sel_amount_exe['paidouttotal'];
				$diffamount = $paidintotal - $paidouttotal;
				//if ($diffamount>=$netsal){
					$receptid = mysql_insert_id();	
					 
						 $obj_voucherentry = new es_voucherentry();
						 $vocturedetails = voucherid_finance($vocturetypesel);
						 $obj_voucherentry->es_vouchertype = $vocturedetails['voucher_type'];
						 $obj_voucherentry->es_receiptno   = "inventory".$ordersid;
						 $obj_voucherentry->es_paymentmode = $es_paymentmode;
						 $obj_voucherentry->es_bankacc	   = $es_bankacc;
						 $obj_voucherentry->es_particulars = $es_ledger;
						 $obj_voucherentry->es_amount	   = $in_tot_amnt; 
			
			
						 $obj_voucherentry->es_bank_pin      = $es_bank_pin;
						 $obj_voucherentry->es_bank_name     = $es_bank_name;
						 $obj_voucherentry->es_teller_number = $es_teller_number;
			
						 $obj_voucherentry->es_narration   = $es_narration;
						 $obj_voucherentry->es_vouchermode = $vocturedetails['voucher_mode'];
						 $obj_voucherentry->es_checkno     = $es_checkno;
						 $obj_voucherentry->es_receiptdate = date('Y-m-d H:i:s');
						 $obj_voucherentry->ve_fromfinance = $rec_date;
						 $obj_voucherentry->ve_tofinance   = $rec_date;
						 
						 $obj_voucherentry->Save();
						
						 //}
						  $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_in_orders','Inventory','Goods Receipt Note','".$ordersid."','GOODS RECEIPT','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
						 
						
	////********end narsimha *****/////

                  header("location: ?pid=$pid&action=$action&emsg=grnrcvd");
                  exit;
            }
            else if (isset($es_in_ordersid) && $es_in_ordersid!=""){
                  $ord_id = $es_in_ordersid;
                  $OrdItemList = $es_in_orders->Get($es_in_ordersid);
                  $ItemsPurchased = unserialize($OrdItemList->in_items_purchased);
            }

            $ordersId = array();
            $ordersSup = array();
            $tmp = array();
            foreach($in_OrdersList as $ordlst)
            {
                  $ordersId[] = $ordlst->es_in_ordersId;
                  $ordersSup[] = $ordlst->in_suplier_name;
            }
            $tmp[0] = implode("#",$ordersId);
            $tmp[1] = implode("#",$ordersSup);
            $ArrOrdidSupnm = implode("$",$tmp);
      }
      if ($action=='stock_details'){
            /**------------- Searching --------------- **/
        if (isset($Search)){
		
                  header("location:?pid=$pid&action=$action&from=$dc1&to=$dc2&reorder=$reorder");
                  exit;
      	}
            
            if (!isset($start) ){
			$start = 0;
		}
	

		if ($from!="") {
		$dc1=$from;
			$date_from = formatDateCalender($from,"Y-m-d");
			$date_from = $date_from." 00:00:00";
			$searchUrl= "&from=$from";
		}
		if ($to!="") {
		$dc2=$to;
		    $date_to = formatDateCalender($to,"Y-m-d");
			 $date_to = $date_to." 23:59:59";
			$searchUrl.= "&to=$to";
		}
		
		$ConditionArr = array();
	// Searching Conditions
		if($date_from!="" && $date_to!="") {
                  $ConditionArr[] = array("in_last_recieved_date", ">", "$date_from");
				  $ConditionArr[] = array("in_last_recieved_date", "<", "$date_to");
            } else if($date_from!="" && $date_to=="") {
                  $ConditionArr[] = array("in_last_recieved_date", ">", "$date_from");
            } else if($date_from=="" && $date_to!="") {
                  $ConditionArr[] = array("in_last_recieved_date", "<", "$date_to");
            }
            if ($reorder==1 || $reorder==2) {
			if($reorder==2)
			{
			$ConditionArr[] = array("in_qty_available",">","in_reorder_level");
			}
			elseif($reorder==1)
			{
			$ConditionArr[] = array("in_qty_available","<","in_reorder_level");
			}
			
                
                $searchUrl.= "&reorder=$reorder";
            }
			
	
	//array_print($ConditionArr);
      // Searching Conditions Ends
            
            $ConditionArr[] = array("es_in_item_masterid", ">", 0);
            $ConditionArr[] = array("status", "=", "active");
			$obj=$es_in_item_master->GetList($ConditionArr, "", "", "" ,"");
			//array_print($obj);
            $no_rows        = count($obj);
            $orderby_array = array('orb1'=>'in_item_code', 'orb2'=>'in_item_name', 'orb3'=>'in_inventory_id');
		
		if (isset($column_name) && array_key_exists($column_name, $orderby_array)) {
			$orderby = $orderby_array[$column_name];
		}else{
			$orderby = "es_in_item_masterid";
		}
	
		  if (isset($asds_order) && $asds_order=='ASC'){
			$order = true;
		}else{
			$order = false;
		}
		$in_itemsList = $es_in_item_master->GetList($ConditionArr, $orderby, $order,  "$start , $q_limit" , $extracond );
           
      }
      if($action=='goods_issue'){
            $InventoryList = $es_inventory->GetList(array(array("status", "=", "active")));	
		
		if (isset($Submit) && $Submit!=""){
            /*
                  echo "<pre>";
            	print_r($_POST);
            	exit;
            */
            	if (isset($in_issue_date)){
            		$es_in_goods_issue->in_issue_date = formatDateCalender($in_issue_date, 'Y-m-d H:i:s');
            	}
            	if (isset($in_issue_to)){
            		$es_in_goods_issue->in_issue_to = $in_issue_to;
            	}
            	if (isset($in_department_id)){
            		$es_in_goods_issue->in_department_id = $in_department_id;
            	}
            	if (isset($in_inventory_id)){
            		$es_in_goods_issue->in_inventory_id = $in_inventory_id;
            	}
            /*	if (isset($in_issue_to)){
            		$es_in_goods_issue->in_issue_to = $in_issue_to;
            	}*/
            	$arrayItems = array();
            	$sl = 1;
                  for($n=1;$n<=count($item_name);$n++)
            	{
            	     if($item_name[$n]!="" && $item_code[$n]!="" && $quantity[$n]!="")
            	     {
                         $arrayItems[$sl]['slno'] = $sl;
                  	     $arrayItems[$sl]['item_code'] = $item_code[$n];
                  	     $arrayItems[$sl]['item_name'] = $item_name[$n];
                  	     $arrayItems[$sl]['quantity'] = $quantity[$n];
                  	     $arrayItems[$sl]['returned'] = "0";
                  	     
                  	     $issDate = $es_in_goods_issue->in_issue_date;
                  	     if($quantity[$n]>0) {
						// in_qty_available = in_qty_available - $quantity[$n],
                  	     	$db->update("es_in_item_master", "in_last_issued_date = '$issDate'",
                                      "es_in_item_masterid='$item_code[$n]'");
                  	     }
                  	     $sl++;
                        }
            	}
            	if ($arrayItems!=""){
            	     $es_in_goods_issue->in_issued_items = serialize($arrayItems);
                  }
            	$es_in_goods_issue->in_issue_status = "notreturned";
            	$es_in_goods_issue->status = "active";
            	if ($gid = $es_in_goods_issue->Save())
            	{
				
				    $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_in_goods_issue','Inventory','Goods Issue Note','".$gid."','GOODS ISSUE','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
	
            	     header("location:?pid=$pid&action=$action&emsg=ginsuccess");
            	     exit;
            	}
            	
            }
      }
      if($action=='return_issue'){
            $IssueList = $es_in_goods_issue->GetList(array(array("status", "=", "active"),array("in_issue_status", "!=", "returned")));	
            //array_print($IssueList);
            if (isset($es_in_goods_issueid) && $es_in_goods_issueid!=""){
                  $IssueItemsList = $es_in_goods_issue->Get($es_in_goods_issueid);
                  $IssuedItems = unserialize($IssueItemsList->in_issued_items);
            }
		
		if (isset($Submit) && $Submit!=""){
                  $arrayItems = array();
                  $Iss_ItemsList = $es_in_goods_issue->Get($es_in_goods_issueid);
                  $Iss_Items = unserialize($Iss_ItemsList->in_issued_items);
                  if($Iss_ItemsList->in_returned_items!="") {
                        $Ret_Items = unserialize($Iss_ItemsList->in_returned_items);
                        $Ret_no = count($Ret_Items) +1 ;
                        $arrayItems = $Ret_Items;
                  } else {
                        $Ret_no = 1;
                  }
                  
                  $sl = 1;
            	$iss_status = "returned";
                  for($n=1;$n<=count($item_name);$n++)
            	{
      	           $arrayItems[$Ret_no]['items'][$sl]['slno'] = $sl;
            	     $arrayItems[$Ret_no]['items'][$sl]['item_code'] = $item_code[$n];
            	     $arrayItems[$Ret_no]['items'][$sl]['item_name'] = $item_name[$n];
            	     $arrayItems[$Ret_no]['items'][$sl]['quantity'] = $quantity[$n];
            	     
            	     $Iss_Items[$sl]['returned']=$Iss_Items[$sl]['returned']+$quantity[$n];
            	     if($Iss_Items[$sl]['returned'] < $Iss_Items[$sl]['quantity']) {
            	           $iss_status = "partialreturned";
            	     }
            	     $sl++;
                        if (isset($return_date)){
                              $arrayItems[$Ret_no]['return_date'] = formatDateCalender($return_date, 'Y-m-d H:i:s');
                              $ret_date = formatDateCalender($return_date, 'Y-m-d H:i:s');
                        }
                     if($quantity[$n]>0) {
              	     	$db->update("es_in_item_master", "in_qty_available = in_qty_available-{$quantity[$n]},
                                      in_last_issued_date = '$ret_date'",
                                      "es_in_item_masterid='$item_code[$n]'");
                     }
            	}
            	if ($arrayItems!=""){
            	     $returned_items = serialize($arrayItems);
                  }
            	if ($Iss_Items!=""){
            	     $issued_items = serialize($Iss_Items);
                  }
            	$db->update("es_in_goods_issue", "in_issued_items = '$issued_items',
                                      in_returned_items = '$returned_items',
                                      in_issue_status = '$iss_status'",
                                      "es_in_goods_issueid='$es_in_goods_issueid'");
			
			$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_in_goods_issue','Inventory','Issue Return Note','".$es_in_goods_issueid."','GOODS ISSUE RETURN','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
                                      
                  header("location:?pid=$pid&action=$action&emsg=irnsuccess");
                  exit;
            	
            }
      }
     if($action=='inventory_reports'){
		if (isset($Search)){
							 
							  if($emsg!=""){$Page_Url .= "&emsg=$emsg";}
							  if($status!=""){$Page_Url .="&status=$status";}
							  if($status1!=""){$Page_Url .="&status1=$status1";}
							  
			  header("location:?pid=$pid&action=$action&from=$dc1&to=$dc2&selectview=$selectview".$Page_Url);
			  exit;
      	}
      	 if(isset($selectview) && $selectview!="")
      	{
            if (!isset($start)){
      			$start = 0;
      		}
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
      		if ($selectview!="") {
      		    $searchUrl.= "&selectview=$selectview";
      		}
			if ($status!="") {
      		    $searchUrl.= "&status=$status";
      		}
			if ($status1!="") {
      		    $searchUrl .= "&status1=$status1";
      		}

			$ConditionArr = array();
      		
      		switch($selectview)
      		{
                        // Searching Conditions
                        
                        case "pur_ord" :
                              
                              $Disp_PageHead = "Purchase Orders";
								  if($date_from!="" && $date_to!="") {
										$ConditionArr[] = "o.order_date between '$date_from' and '$date_to' ";
								  } else if($date_from!="" && $date_to=="") {
										$ConditionArr[] = "o.order_date > '$date_from' ";
								  } else if($date_from=="" && $date_to!="") {
										$ConditionArr[] = "o.order_date < '$date_to' ";
								  }
								  if($status!=''){$ConditionArr[] = "o.in_ord_status = '$status' ";}
								  $ConditionArr[] = "o.es_in_ordersid > 0";
								  $ConditionArr[] = "o.status = 'active' ";
								  $cond = implode(" AND ",$ConditionArr);
								  
								  $masterClass = $es_in_orders;
								  $orderby_array = array('orb1'=>'in_suplier_name', 'orb2'=>'order_date', 'orb3'=>'es_in_ordersid');
								  $Default_Orderby = "es_in_ordersid";
								  
								  $no_rows = $db->getOne("SELECT count(*) FROM es_in_orders o, es_in_supplier_master s WHERE $cond AND s.es_in_supplier_masterid = o.in_suplier_name");
								  
								  if (isset($column_name) && array_key_exists($column_name, $orderby_array)) {
								$orderby = $orderby_array[$column_name];
							}else{
								$orderby = $Default_Orderby;
							}
							if (isset($asds_order) && $asds_order=='ASC'){
								$asds = 'ASC';
							}else{
								$asds = 'DESC';
							}
						 $qryOrd = "SELECT o.*, s.in_name FROM es_in_orders o, es_in_supplier_master s WHERE $cond AND s.es_in_supplier_masterid = o.in_suplier_name ORDER BY $orderby $asds LIMIT $start , $q_limit";
							
							$Search_Results = $db->getRows($qryOrd);
							
                              
                        break;
                        case "grnlist" :
                              
                              $Disp_PageHead = "GRN List";
                              if($date_from!="" && $date_to!="") {
                                    $ConditionArr[] = "o.in_rec_date between '$date_from' and '$date_to'";
                              } else if($date_from!="" && $date_to=="") {
                                    $ConditionArr[] = "o.in_rec_date > '$date_from'";
                              } else if($date_from=="" && $date_to!="") {
                                    $ConditionArr[] = "o.in_rec_date < '$date_to'";
                              }
                              $ConditionArr[] = "o.in_rec_note_no > 0";
                              $ConditionArr[] = "o.in_ord_status != 'pending'";
                              $ConditionArr[] = "o.status = 'active'";
                              $cond = implode(" AND ",$ConditionArr);
                              
                              $masterClass = $es_in_orders;
                              $orderby_array = array('orb1'=>'in_suplier_name', 'orb2'=>'in_rec_date', 'orb3'=>'in_rec_note_no');
                              $Default_Orderby = "in_rec_note_no";
                              
                              $no_rows = $db->getOne("SELECT count(*) FROM es_in_orders o, es_in_supplier_master s WHERE $cond AND s.es_in_supplier_masterid = o.in_suplier_name");
                              
                              if (isset($column_name) && array_key_exists($column_name, $orderby_array)) {
								$orderby = $orderby_array[$column_name];
							}else{
								$orderby = $Default_Orderby;
							}
							if (isset($asds_order) && $asds_order=='ASC'){
								$asds = 'ASC';
							}else{
								$asds = 'DESC';
							}
							$qryOrd = "SELECT o.*, s.in_name FROM es_in_orders o, es_in_supplier_master s WHERE $cond AND s.es_in_supplier_masterid = o.in_suplier_name ORDER BY $orderby $asds LIMIT $start , $q_limit";
							$Search_Results = $db->getRows($qryOrd);
                              
                        break;
                        case "ginlist" :
                              
                              $Disp_PageHead = "GIN List";
                              if($date_from!="" && $date_to!="") {
                                    $ConditionArr[] = array("in_issue_date", "between", "$date_from' and '$date_to" );
                              } else if($date_from!="" && $date_to=="") {
                                    $ConditionArr[] = array("in_issue_date", ">", "$date_from");
                              } else if($date_from=="" && $date_to!="") {
                                    $ConditionArr[] = array("in_issue_date", "<", "$date_to");
                              }
							  if($status1!=''){$ConditionArr[] = array("in_issue_status", "=", "$status1");}
                              $ConditionArr[] = array("es_in_goods_issueid", ">", 0);
                              $ConditionArr[] = array("status", "=", "active");
                              
                              $orderby_array = array('orb1'=>'in_issue_to', 'orb2'=>'in_issue_date', 'orb3'=>'es_in_goods_issueid');
                              $Default_Orderby = "es_in_goods_issueid";
                              
                               $no_rows = count($es_in_goods_issue->GetList($ConditionArr));
                        
							if (isset($column_name) && array_key_exists($column_name, $orderby_array)) {
								$orderby = $orderby_array[$column_name];
							}else{
								$orderby = $Default_Orderby;
							}
							
							if (isset($asds_order) && $asds_order=='ASC'){
								$order = true;
							}else{
								$order = false;
							}
							
							$Search_Results = $es_in_goods_issue->GetList($ConditionArr, $orderby, $order,  "$start , $q_limit" );
							  //echo $es_in_goods_issue->pog_query;
							break;
                        case "orditems" :
                              
                              $item = (int)($item);
                              $Disp_PageHead = "Ordered Items";
                              $Search_item = $es_in_orders->Get($item);
                              $rcved = $Search_item->in_items_purchased;
                              if($rcved != "")
                              {
                                    $Search_Results = unserialize($rcved); 
                              
                                    for($s=1;$s<=count($Search_Results);$s++)
                                    {
                                          $item_data = $db->getRow("SELECT in_item_code, in_item_name FROM es_in_item_master WHERE es_in_item_masterid = '".$Search_Results[$s]['item_code']."'");
                                          $Search_Results[$s][item_code] = $item_data['in_item_code'];
                                          $Search_Results[$s][item_name] = $item_data['in_item_name'];
                                    }
                              } else {
                                    $Search_Results = array();
                              }
                              
                        break;
                        case "grnitems" :
                              
                              $item = (int)($item);
                              $Disp_PageHead = "GRN Items";
                              $Search_item = $es_in_orders->Get($item);
                              $rcved = $Search_item->in_items_recieved;
                              if($rcved != "")
                              {
                                    $Search_Results = unserialize($rcved); 
                              
                                    for($s=1;$s<=count($Search_Results);$s++)
                                    {
                                          $item_data = $db->getRow("SELECT in_item_code, in_item_name FROM es_in_item_master WHERE es_in_item_masterid = '".$Search_Results[$s]['item_code']."'");
                                          $Search_Results[$s][item_code] = $item_data['in_item_code'];
                                          $Search_Results[$s][item_name] = $item_data['in_item_name'];
                                    }
                              } else {
                                    $Search_Results = array();
                              }
                              
                        break;
                        case "ginitems" :
                              
                              $item = (int)($item);
                              $Disp_PageHead = "Issued Items";
                              $Search_item = $es_in_goods_issue->Get($item);
                              $issued = $Search_item->in_issued_items;
                              if($issued != "")
                              {
                                    $Search_Results = unserialize($issued); 
                              
                                    for($s=1;$s<=count($Search_Results);$s++)
                                    {
                                          $item_data = $db->getRow("SELECT in_item_code, in_item_name FROM es_in_item_master WHERE es_in_item_masterid = '".$Search_Results[$s]['item_code']."'");
                                          $Search_Results[$s][item_code] = $item_data['in_item_code'];
                                          $Search_Results[$s][item_name] = $item_data['in_item_name'];
                                    }
                              } else {
                                    $Search_Results = array();
                              }
                              
                        break;
                        case "rinitems" :
                              
                              $item = (int)($item);
                              $Disp_PageHead = "Returned Issue Items";
                              $Search_item = $es_in_goods_issue->Get($item);
                              $reted = $Search_item->in_returned_items;
                              if($reted != "")
                              {
                                    $Search_Results = unserialize($reted);
                                    $tempArr = array(); 
                                    for($s=1;$s<=count($Search_Results);$s++)
                                    {
                                          $tempArr = $Search_Results[$s]['items'];
                                          for($r=1;$r<=count($tempArr);$r++)
                                          {
                                                $item_data = $db->getRow("SELECT in_item_code, in_item_name FROM es_in_item_master WHERE es_in_item_masterid = '".$tempArr[$r]['item_code']."'");
                                                $tempArr[$r][item_code] = $item_data['in_item_code'];
                                                $tempArr[$r][item_name] = $item_data['in_item_name'];
                                          }
                                          $Search_Results[$s]['items'] = $tempArr;
                                    }
                              } else {
                                    $Search_Results = array();
                              }
                              
                        break;
                        
                        // Searching Conditions Ends
      		}
      		
                  /*echo "<pre>";
            	print_r($Search_Results);
      		exit;*/
      	}
      }
if($action=='print_purchase_orders'){



if(isset($selectview) && $selectview!="")
      	{
		$es_in_orders = new es_in_orders();
		 $es_in_goods_issue = new es_in_goods_issue();
            if (!isset($start)){
      			$start = 0;
      		}
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
      		if ($selectview!="") {
      		    $searchUrl.= "&selectview=$selectview";
      		}
			if ($status!="") {
      		    $searchUrl.= "&status=$status";
      		}

			$ConditionArr = array();
      		
      		switch($selectview)
      		{
                        // Searching Conditions
                        
                        case "pur_ord" :
                              
                              $Disp_PageHead = "Purchase Orders";
								  if($date_from!="" && $date_to!="") {
										$ConditionArr[] = "o.order_date between '$date_from' and '$date_to' ";
								  } else if($date_from!="" && $date_to=="") {
										$ConditionArr[] = "o.order_date > '$date_from' ";
								  } else if($date_from=="" && $date_to!="") {
										$ConditionArr[] = "o.order_date < '$date_to' ";
								  }
								  if($status!=''){$ConditionArr[] = "o.in_ord_status = '$status' ";}
								  $ConditionArr[] = "o.es_in_ordersid > 0";
								  $ConditionArr[] = "o.status = 'active' ";
								  $cond = implode(" AND ",$ConditionArr);
								  
								  $masterClass = $es_in_orders;
								  $orderby_array = array('orb1'=>'in_suplier_name', 'orb2'=>'order_date', 'orb3'=>'es_in_ordersid');
								  $Default_Orderby = "es_in_ordersid";
								  
								  $no_rows = $db->getOne("SELECT count(*) FROM es_in_orders o, es_in_supplier_master s WHERE $cond AND s.es_in_supplier_masterid = o.in_suplier_name");
								  
								  if (isset($column_name) && array_key_exists($column_name, $orderby_array)) {
								$orderby = $orderby_array[$column_name];
							}else{
								$orderby = $Default_Orderby;
							}
							if (isset($asds_order) && $asds_order=='ASC'){
								$asds = 'ASC';
							}else{
								$asds = 'DESC';
							}
						 $qryOrd = "SELECT o.*, s.in_name FROM es_in_orders o, es_in_supplier_master s WHERE $cond AND s.es_in_supplier_masterid = o.in_suplier_name ORDER BY $orderby $asds ";
							
							$Search_Results = $db->getRows($qryOrd);
							
                              
                        break;
                        case "grnlist" :
                              
                              $Disp_PageHead = "GRN List";
                              if($date_from!="" && $date_to!="") {
                                    $ConditionArr[] = "o.in_rec_date between '$date_from' and '$date_to'";
                              } else if($date_from!="" && $date_to=="") {
                                    $ConditionArr[] = "o.in_rec_date > '$date_from'";
                              } else if($date_from=="" && $date_to!="") {
                                    $ConditionArr[] = "o.in_rec_date < '$date_to'";
                              }
                              $ConditionArr[] = "o.in_rec_note_no > 0";
                              $ConditionArr[] = "o.in_ord_status != 'pending'";
                              $ConditionArr[] = "o.status = 'active'";
                              $cond = implode(" AND ",$ConditionArr);
                              
                              $masterClass = $es_in_orders;
                              $orderby_array = array('orb1'=>'in_suplier_name', 'orb2'=>'in_rec_date', 'orb3'=>'in_rec_note_no');
                              $Default_Orderby = "in_rec_note_no";
                              
                              $no_rows = $db->getOne("SELECT count(*) FROM es_in_orders o, es_in_supplier_master s WHERE $cond AND s.es_in_supplier_masterid = o.in_suplier_name");
                              
                              if (isset($column_name) && array_key_exists($column_name, $orderby_array)) {
								$orderby = $orderby_array[$column_name];
							}else{
								$orderby = $Default_Orderby;
							}
							if (isset($asds_order) && $asds_order=='ASC'){
								$asds = 'ASC';
							}else{
								$asds = 'DESC';
							}
							$qryOrd = "SELECT o.*, s.in_name FROM es_in_orders o, es_in_supplier_master s WHERE $cond AND s.es_in_supplier_masterid = o.in_suplier_name ORDER BY $orderby $asds LIMIT $start , $q_limit";
							$Search_Results = $db->getRows($qryOrd);
                              
                        break;
                        case "ginlist" :
						$es_in_goods_issue = new es_in_goods_issue();
                              $Disp_PageHead = "GIN List";
                              if($date_from!="" && $date_to!="") {
                                    $ConditionArr[] = array("in_issue_date", "between", "$date_from' and '$date_to" );
                              } else if($date_from!="" && $date_to=="") {
                                    $ConditionArr[] = array("in_issue_date", ">", "$date_from");
                              } else if($date_from=="" && $date_to!="") {
                                    $ConditionArr[] = array("in_issue_date", "<", "$date_to");
                              }
							   if($status1!=''){$ConditionArr[] = array("in_issue_status", "=", "$status1");}
                              $ConditionArr[] = array("es_in_goods_issueid", ">", 0);
                              $ConditionArr[] = array("status", "=", "active");
                              
                              $orderby_array = array('orb1'=>'in_issue_to', 'orb2'=>'in_issue_date', 'orb3'=>'es_in_goods_issueid');
                              $Default_Orderby = "es_in_goods_issueid";
                              
                             $no_rows = count($es_in_goods_issue->GetList($ConditionArr));
                        
							if (isset($column_name) && array_key_exists($column_name, $orderby_array)) {
								$orderby = $orderby_array[$column_name];
							}else{
								$orderby = $Default_Orderby;
							}
							
							if (isset($asds_order) && $asds_order=='ASC'){
								$order = true;
							}else{
								$order = false;
							}
							
							
							$Search_Results = $es_in_goods_issue->GetList($ConditionArr, $orderby, $order,  "$start , $q_limit" );
							//echo $es_in_goods_issue->pog_query;
							 
							break;
                        case "orditems" :
                              $es_in_orders = new es_in_orders();
                              $item = (int)($item);
                              $Disp_PageHead = "Ordered Items";
                              $Search_item = $es_in_orders->Get($item);
                              $rcved = $Search_item->in_items_purchased;
                              if($rcved != "")
                              {
                                    $Search_Results = unserialize($rcved); 
                              
                                    for($s=1;$s<=count($Search_Results);$s++)
                                    {
                                          $item_data = $db->getRow("SELECT in_item_code, in_item_name FROM es_in_item_master WHERE es_in_item_masterid = '".$Search_Results[$s]['item_code']."'");
                                          $Search_Results[$s][item_code] = $item_data['in_item_code'];
                                          $Search_Results[$s][item_name] = $item_data['in_item_name'];
                                    }
                              } else {
                                    $Search_Results = array();
                              }
                              
                        break;
                        case "grnitems" :
                             
                              $item = (int)($item);
                              $Disp_PageHead = "GRN Items";
                              $Search_item = $es_in_orders->Get($item);
                              $rcved = $Search_item->in_items_recieved;
                              if($rcved != "")
                              {
                                    $Search_Results = unserialize($rcved); 
                              
                                    for($s=1;$s<=count($Search_Results);$s++)
                                    {
                                          $item_data = $db->getRow("SELECT in_item_code, in_item_name FROM es_in_item_master WHERE es_in_item_masterid = '".$Search_Results[$s]['item_code']."'");
                                          $Search_Results[$s][item_code] = $item_data['in_item_code'];
                                          $Search_Results[$s][item_name] = $item_data['in_item_name'];
                                    }
                              } else {
                                    $Search_Results = array();
                              }
                              
                        break;
                        case "ginitems" :
                              
                              $item = (int)($item);
                              $Disp_PageHead = "Issued Items";
                              $Search_item = $es_in_goods_issue->Get($item);
                              $issued = $Search_item->in_issued_items;
                              if($issued != "")
                              {
                                    $Search_Results = unserialize($issued); 
                              
                                    for($s=1;$s<=count($Search_Results);$s++)
                                    {
                                          $item_data = $db->getRow("SELECT in_item_code, in_item_name FROM es_in_item_master WHERE es_in_item_masterid = '".$Search_Results[$s]['item_code']."'");
                                          $Search_Results[$s][item_code] = $item_data['in_item_code'];
                                          $Search_Results[$s][item_name] = $item_data['in_item_name'];
                                    }
                              } else {
                                    $Search_Results = array();
                              }
                              
                        break;
                        case "rinitems" :
                              
                              $item = (int)($item);
                              $Disp_PageHead = "Returned Issue Items";
                              $Search_item = $es_in_goods_issue->Get($item);
                              $reted = $Search_item->in_returned_items;
                              if($reted != "")
                              {
                                    $Search_Results = unserialize($reted);
                                    $tempArr = array(); 
                                    for($s=1;$s<=count($Search_Results);$s++)
                                    {
                                          $tempArr = $Search_Results[$s]['items'];
                                          for($r=1;$r<=count($tempArr);$r++)
                                          {
                                                $item_data = $db->getRow("SELECT in_item_code, in_item_name FROM es_in_item_master WHERE es_in_item_masterid = '".$tempArr[$r]['item_code']."'");
                                                $tempArr[$r][item_code] = $item_data['in_item_code'];
                                                $tempArr[$r][item_name] = $item_data['in_item_name'];
                                          }
                                          $Search_Results[$s]['items'] = $tempArr;
                                    }
                              } else {
                                    $Search_Results = array();
                              }
                              
                        break;
                        
                        // Searching Conditions Ends
      		}
      		
                  /*echo "<pre>";
            	print_r($Search_Results);
      		exit;*/
      	}
}
if($action=='edit_purchase_order'){

$details = $db->getrow("SELECT * FROM  es_in_orders WHERE es_in_ordersid=".$item);
$pdetails = unserialize($details['in_items_purchased']);
//array_print($pdetails);
		if(isset($update_purchase) && $update_purchase!=""){
		       $arrayItems = array();
            	$sl = 1;
                  foreach($pdetails as $eachrecord)
            	{
				    
            	     if(isset($_POST['item_'.$eachrecord['slno']]))
            	     {
				
					    $item_det = $db->getrow("SELECT * FROM `es_in_item_master` WHERE `es_in_item_masterid`=" . $eachrecord['item_name']);
							
                         $arrayItems[$sl]['slno'] = $sl;
                  	     $arrayItems[$sl]['item_code'] = $item_det['es_in_item_masterid'];
                  	     $arrayItems[$sl]['item_name'] = $item_det['es_in_item_masterid'];
                  	     $arrayItems[$sl]['quantity'] = (int)$_POST['item_'.$eachrecord['slno']];
                  	     $sl++;
                        }
            	}

            	
		
		}
		
		if ($arrayItems!=""){
            	      $serilised_str = serialize($arrayItems);
					 
					  $Page_Url = "&Search=Search";
					  if($from!=""){$Page_Url .= "&from=$from";}
					  if($to!=""){$Page_Url .= "&to=$to";}
					  if($selectview!=""){$Page_Url .= "&selectview=$selectview";}
					  $db->update("es_in_orders","in_items_purchased='". $serilised_str ."'","es_in_ordersid=".$item);
					  header("location:?pid=7&action=inventory_reports&emsg=2".$Page_Url);
					  exit;
                  }
				 
				  
				  

}
if($action=='edit_goodsreceipt_order'){
$details = $db->getrow("SELECT * FROM  es_in_orders WHERE es_in_ordersid=".$item);
$pdetails = unserialize($details['in_items_recieved']);
$rno = "inventory".$item;

//array_print($pdetails);
		if(isset($update_goodsreceipt) && $update_goodsreceipt!=""){
		       $arrayItems = array();
            	$sl = 1;
				$to_amt = 0;
                  foreach($pdetails as $eachrecord)
            	{
				    
            	     if(isset($_POST['item_'.$eachrecord['slno']]) )
            	     {
				      $update_qty =$_POST['item_'.$eachrecord['slno']] - $eachrecord['quantity'];
					    $item_det = $db->getrow("SELECT * FROM `es_in_item_master` WHERE `es_in_item_masterid`=" . $eachrecord['item_name']);
							
                         $arrayItems[$sl]['slno'] = $sl;
                  	     $arrayItems[$sl]['item_code'] = $item_det['es_in_item_masterid'];
                  	     $arrayItems[$sl]['item_name'] = $item_det['es_in_item_masterid'];
                  	     $arrayItems[$sl]['quantity'] = (int)$_POST['item_'.$eachrecord['slno']];
						 $arrayItems[$sl]['price'] = $_POST['price_'.$eachrecord['slno']];
						   $amount=0;
						  $amount = $_POST['item_'.$eachrecord['slno']]*$_POST['price_'.$eachrecord['slno']];
						 $arrayItems[$sl]['amount'] = $amount;
                  	     $sl++;
						 $to_amt +=$amount;
						 $prDate = date("Y-m-d");
						 
						 $db->update("es_in_item_master", "in_qty_available = in_qty_available + '".$update_qty."',
                                      in_last_recieved_date = '".$prDate."'",
                                      "es_in_item_masterid=".$eachrecord['item_name']);
                        }
            	}

            	
		
		}
		
		if ($arrayItems!=""){
		//array_print($arrayItems);
            	      $serilised_str = serialize($arrayItems);
					  
					 
					  $Page_Url = "&Search=Search";
					  if($from!=""){$Page_Url .= "&from=$from";}
					  if($to!=""){$Page_Url .= "&to=$to";}
					  if($selectview!=""){$Page_Url .= "&selectview=$selectview";}
					  $voucher_entry_det = $db->getrow("SELECT * FROM es_voucherentry WHERE es_receiptno='".$rno ."'");
					  if(is_array($voucher_entry_det ) && count($voucher_entry_det )>=1){
					  $db->update("es_voucherentry","es_amount='".$to_amt."'","es_voucherentryid=".$voucher_entry_det['es_voucherentryid']);
					  }
					  $db->update("es_in_orders","in_items_recieved='". $serilised_str ."',in_tot_amnt='".$to_amt."'","es_in_ordersid=".$item);
					  header("location:?pid=7&action=inventory_reports&emsg=2".$Page_Url);
					  exit;
                  }

}
if($action=='purchase_goodsreceipt' || $action=='print_purchase_goodsreceipt'){
$details = $db->getrow("SELECT * FROM  es_in_orders WHERE es_in_ordersid=".$item);
$pdetails = unserialize($details['in_items_purchased']);
$gdetails = unserialize($details['in_items_recieved']);
}

?>
