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
					  'fld_bookinventoryname', 
					  'fld_shortname', 
					  'fld_description', 
					  'fld_categoryname', 
					  'fld_description',
					  'fld_name',
					  'fld_address',
					  'fld_city',
					  'fld_state',
					  'fld_country',
					  'fld_office_no',
					  'fld_mobile_no',
					  'fld_email',
					  'fld_fax',
					  'fld_item_code',
					  'fld_item_name',
					  'fld_item_name',
					  'fld_qty_available',
					  'fld_reorder_level',
					  'fld_quantity_issued',
					  'fld_recieved_date',
					  'fld_last_issued_date',
					  'fld_units',
					  'fld_inventory_id',
					  'fld_category_id',//inventory,category,item,supply  variables ends here 
					  'Submit', 
					  'item_code', 
					  'item_name', 
					  'quantity', 
					  'price', 
					  'amount', 
					  'es_bookordersid', 
					  'fld_booksupplier', 
					  'fld_itempurchased', 
					  'fld_orderdate', 
					  'fld_recnote', 
					  'fld_recdate', 
					  'fld_recbillno', 
					  'fld_recitemsreceived', 
					  'fld_totalamount', 
					  'fld_orderstatus', 
					  'fld_status', 
					  'checkitem', 
					  'OrderNow', 
					  'type', 
					  'es_inventoryid', 
					  'es_goodsissueid', 
					  'fld_issuedate', 
					  'fld_issueto', 
					  'fld_inventoryid', 
					  'fld_issueditem', 
					  'fld_returneditem', 
					  'fld_departmentid', 
					  'fld_issuestatus', 
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
	  $es_book_orders = new es_book_orders();
      $es_booksupplier_master = new es_booksupplier_master();
      $es_itembook_master = new es_itembook_master();
      $es_goodsissue = new es_goodsissue();
      $es_bookinventory = new es_bookinventory();
      
	  $query1    = "select max(es_bookordersid) from es_book_orders";    // To Get next Order number
      $maxOrder  = $db->getOne($query1);
      $nextOrder = $maxOrder+1;                                   // Next Order number
      
      $query2    = "select max(fld_recnote) from es_book_orders";    // To Get next GRN number
      $maxGrn    = $db->getOne($query2);
      $nextGrn   = $maxGrn+1;                                   // Next GRN number
      
      $query3    = "select max(es_goodsissueid) from es_goodsissue"; 
	  //$query31    = "select * from es_in_goods_issue ORDER BY es_in_goods_issueid LIMIT 0,1 "; 
	     //$maxGIN123   = $db->getrow($query31);
		 //array_print(unserialize($maxGIN123['in_issued_items']));
		 // To Get next GIN number
      $maxGIN    = $db->getOne($query3);
      $nextGIN   = $maxGIN+1;                                   // Next GIN number
   
	  $in_supplierList = $es_booksupplier_master->GetList(array(array("fld_status", "=", "active")));
      $in_itemsList    = $es_itembook_master->GetList(array(array("fld_status", "=", "active")));
      $in_OrdersList   = $es_book_orders->GetList(array(array("fld_orderstatus", "=", "pending"),array("fld_status", "=", "active")));
      
      
}

	$q_limit  = PAGENATE_LIMIT;

	$es_bookinventory = new es_bookinventory();
	
	$es_bookcategory = new es_bookcategory();
	
	$inventoryList = $es_bookinventory->GetList(array(array("fld_status", "=", "active"),array("es_bookinventoryid", ">", "0")));
	$categoryList = $es_bookcategory->GetList(array(array("fld_status", "=", "active"),array("es_bookcategoryid", ">", "0")));

//	$es_inventory->es_enquiryId = $uid;
if(isset($inventorysubmit)) {
	
      $error = "";
	  
	  $vlc = new FormValidation();		
		if ($fld_bookinventoryname=="") {
			$errormessage[0]="Enter Inventory Type";	  
		}else{
		    $condition="";
		    if(isset($edit_id) && $edit_id !=""){$condition = " AND es_bookinventoryid!=".$edit_id."";}
			$rows = $db->getone("SELECT COUNT(*) FROM es_bookinventory WHERE fld_bookinventoryname='".$fld_bookinventoryname."' ".$condition."");
			if($rows>=1){$errormessage[0]="Inventory Type Already Exists";}
		}	
		if ($fld_shortname=="") {
			$errormessage[1]="Enter Short Name";	  
		}		
		if (($fld_description=="")) {
			$errormessage[2]="Enter Description"; 
		}	
		
	if(count($errormessage)==0)
	{
		if (isset($fld_bookinventoryname)){
			$es_bookinventory->fld_bookinventoryname = $fld_bookinventoryname;
		}
		if (isset($fld_shortname)){
			$es_bookinventory->fld_shortname = $fld_shortname;
		}
		if (isset($fld_description)){
			$es_bookinventory->fld_description = $fld_description;
		}
		$es_bookinventory->fld_status = "active";
      
	if(empty($error)) {
	  if (isset($edit_id) && $edit_id !=""){
           
		    $db->update("es_bookinventory", "fld_bookinventoryname = '$fld_bookinventoryname',
                                      fld_shortname     = '$fld_shortname',   
                                      fld_description    = '$fld_description'","es_bookinventoryid=$edit_id"); 
           $action = "addinventory";
		     $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_bookinventory','Inventory','Create Inventory Type','".$edit_id."','EDIT INVENTORY','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
		  // $emsg = "editsuccess";
		    header("location: ?pid=$pid&action=$action&emsg=2");
            exit;
      }
      elseif ($in_id = $es_inventory->Save())
      {
	  
	  $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_bookinventory','Inventory','Create Inventory Type','".$in_id."','ADD INVENTORY','".$_SERVER['REMOTE_ADDR']."',NOW())";
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
      $getinventory = $es_bookinventory->Get($uid);  //gets inventory whose id is 1
}
if (isset($action) && $action=='view_inventory') {
      $viewinventory = $es_bookinventory->Get($uid);  //gets inventory whose id is 1
}

if (isset($action) && $action=='delete') {
      $db->update("es_bookinventory", "fld_status='deleted'", "es_bookinventoryid=$uid");  //deletes the record from the database.
	  
	  $action = "addinventory";
	  
	  $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_bookinventory','Inventory','Create Inventory Type','".$uid."','DELETE INVENTORY','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
	
	  header("location:?pid=$pid&action=$action&emsg=deletesuccess");
}
if(isset($action) && $action == 'list_inventory' ||  $action == "remove_inventory" || $action == "edit_inventory" || $action == "addinventory"  ){
  
  
	if ( !isset($start) ){
		$start = 0;
	}	
	$no_rows = count($es_inventory->GetList(array(array("es_bookinventoryid", ">", 0),array("fld_status", "=", "active")) ));
	
		$orderby_array = array('orb1'=>'es_bookinventoryid', 'orb2'=>'fld_bookinventoryname', 'orb3'=>'fld_shortname');
		
		if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
			$orderby = $orderby_array[$column_name];
		}else{
			$orderby = "es_bookinventoryid";
		}
		if (isset($asds_order) && $asds_order=='ASC'){
			$order = true;
		}else{
			$order = false;
		}
	$inventoryList = $es_inventory->GetList(array(array("fld_status", "=", "active"),array("es_bookinventoryid", ">", "0")), $orderby, $order,  "$start , $q_limit" );

}

/*
 *Printing of Inventory Reports 
*/
	 if ($action == 'inventory_print') {
	 
	 $orderby_array = array('orb1'=>'es_bookinventoryid', 'orb2'=>'fld_bookinventoryname', 'orb3'=>'fld_shortname');
		
		if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
			$orderby = $orderby_array[$column_name];
		}else{
			$orderby = "es_bookinventoryid";
		}
		if (isset($asds_order) && $asds_order=='ASC'){
			$order = true;
		}else{
			$order = false;
		}
	$inventoryListPrint = $es_inventory->GetList(array(array("fld_status", "=", "active"),array("es_bookinventoryid", ">", "0")), $orderby, $order);
	 
	  $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_bookinventory','Inventory','Create Inventory Type','','PRINT INVENTORY','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
	
	}


if(isset($_POST['categorysubmit'])) {

	     $error = "";
	  
	    $vlc = new FormValidation();		
		if ($fld_categoryname=="") {
		$errormessage[0]="Enter Category Name";	  
		}else{
		    $condition="";
		    if(isset($edit_id) && $edit_id !=""){$condition = " AND es_bookcategoryid!=".$edit_id."";}
			$rows = $db->getone("SELECT COUNT(*) FROM es_bookcategory WHERE fld_categoryname='".$fld_categoryname."' ".$condition."");
			if($rows>=1){$errormessage[0]="Category already Exists";}
		}			
			
		if (($fld_description=="")) {
		$errormessage[2]="Enter Description"; 
		}	
		
   if(count($errormessage)==0)
	 {
		
            if (isset($fld_categoryname)){
      		$es_bookcategory->fld_categoryname = $fld_categoryname;
      	}
           if (isset($fld_description)){
      		$es_bookcategory->fld_description = $fld_description;
      	}
          $es_bookcategory->fld_status = "active";
  
         if(empty($error)) {
	     if (isset($edit_id) && $edit_id !=""){
           
		    $db->update("es_bookcategory", "fld_categoryname = '$fld_categoryname',
                                      
                                      fld_description    = '$fld_description'","es_bookcategoryid=$edit_id"); 
									  
			  $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_bookcategory','Inventory','Add Product Category','".$edit_id."','EDIT PRODUCT CATEGORY','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
           $action = "addcategory";
		   $emsg = 2;
		    header("location: ?pid=$pid&action=$action&emsg=2");
            exit;
		  }
		  elseif ($ic_id = $es_in_category->Save(true)){
		  
		    $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_bookcategory','Inventory','Add Product Category','".$ic_id."','ADD PRODUCT CATEGORY','".$_SERVER['REMOTE_ADDR']."',NOW())";
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
      $db->update("es_bookcategory", "fld_status='deleted'", "es_bookcategoryid=$uid");  //deletes the record from the database.
	  
	  
		    $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_bookcategory','Inventory','Add Product Category','".$uid."','DELETE PRODUCT CATEGORY','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
	
	  $action = "addcategory";
	  header("location:?pid=$pid&action=$action&emsg=3");
}
if(isset($action) && $action == 'list_category' ||  $action == "remove_category" || $action == "edit_category" || $action == "addcategory"  ){
  
 
	if ( !isset($start) ){
		$start = 0;
	}	
	$no_rows = count($es_bookcategory->GetList(array(array("es_bookcategoryid", ">", 0),array("fld_status", "=", "active")) ));
	
		$orderby_array = array('orb1'=>'es_bookcategoryid', 'orb2'=>'fld_categoryname', 'orb3'=>'fld_description');
		
		if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
			$orderby = $orderby_array[$column_name];
		}else{
			$orderby = "es_bookcategoryid";
		}
		if (isset($asds_order) && $asds_order=='ASC'){
			$order = true;
		}else{
			$order = false;
		}
	$categoryList = $es_bookcategory->GetList(array(array("fld_status", "=", "active"),array("es_bookcategoryid", ">", "0")), $orderby, $order,  "$start , $q_limit" );
	
	

}

		if ( $action == 'inv_category_print') {
			if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
			$orderby = $orderby_array[$column_name];
			}else{
			$orderby = "es_bookcategoryid";
			}
			if (isset($asds_order) && $asds_order=='ASC'){
				$order = true;
			}else{
				$order = false;
			}
			$categoryListPrint = $es_bookcategory->GetList(array(array("fld_status", "=", "active"),array("es_bookcategoryid", ">", "0")), $orderby, $order);
			
			$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_bookcategory','Inventory','Add Product Category','".$uid."','DELETE PRODUCT CATEGORY','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);

		
		}
$es_itembook_master = new  es_itembook_master();
  
     if(isset($_POST['itemSubmit'])) {
        $error = "";
		
		$vlc = new FormValidation();		
		if (empty($fld_item_code)){
		$errormessage[0]="Enter Item Code";	  
		}
		else
		{
		$con='';
		if(isset($edit_id) && $edit_id!='')
		{
		$con=' AND fld_item_masterid!='.$edit_id;
		}
		 $rowCount = $db->getOne('SELECT COUNT(*) FROM es_itembook_master WHERE fld_item_code="'.$fld_item_code.'"'.$con);
	
			if ( isset($rowCount)&&$rowCount>0 ) {
				$errormessage[0]="Item Code Already Exists";
			}
			}	
		if (empty($fld_item_name)) {
		$errormessage[1]="Enter Item Name";	  
		}
		if (empty($fld_inventory_id)) {
		$errormessage[2]="Enter Inventory Type";	  
		}		
		if  (empty($fld_category_id)) {
		$errormessage[3]="Enter Category Name"; 
		}
		if (empty($fld_units)) {
		$errormessage[4]="Invalid Units"; 
		}
		//if (!$vlc->is_nonNegNumber($cost )) {
//		$errormessage[5]="Invalid Item Cost";	  
//		}
		if (!$vlc->is_nonNegNumber($fld_qty_available )) {
		$errormessage[6]="Invalid Quantity in hand"; 
		}	
		if (!$vlc->is_nonNegNumber($fld_reorder_level )) {
		$errormessage[7]="Invalid Re-order Level";	  
		}
					
			
			
		

	if(count($errormessage)==0)
	{
		

		if (isset($fld_item_code)){
		$es_itembook_master->fld_item_code = $fld_item_code;
	      }
		if (isset($fld_item_name)){
		$es_itembook_master->fld_item_name = $fld_item_name;
	      }
		if (isset($fld_units)){
			$es_itembook_master->fld_units = $fld_units;
		}
		//if (isset($cost)){
//			$es_in_item_master->cost = $cost;
//		}	
		if (isset($fld_qty_available)){
			$es_itembook_master->fld_qty_available = $fld_qty_available;
		}	
		if (isset($fld_reorder_level)){
			$es_itembook_master->fld_reorder_level = $fld_reorder_level;
		}
	      
		if (isset($fld_inventory_id)){
			$es_itembook_master->fld_inventory_id = $fld_inventory_id;
		}  
		if (isset($fld_category_id)){
			$es_itembook_master->fld_category_id = $fld_category_id;
		}  
		  $es_itembook_master->status = "active";
	
		
		
        
                 if (isset($edit_id) && $edit_id !=""){
           
		    $db->update("es_itembook_master", "fld_item_code       = '$fld_item_code',
                                      fld_item_name                   = '$fld_item_name',   
                                      	fld_units                       = '$fld_units',
                                      fld_qty_available               = '$fld_qty_available',
                                      fld_inventory_id                = '$fld_inventory_id',
                                      fld_category_id                 = '$fld_category_id',
                                      fld_reorder_level               = '$fld_reorder_level',
									  fld_cost							= '$fld_cost'","fld_item_masterid=$edit_id"); 
			$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_itembook_master','Inventory','Add Item','".$edit_id."','UPDATE ITEM','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
	
           $action = "additem";
		   $emsg = "editsuccess";
		    header("location: ?pid=$pid&action=$action&emsg=2");
            exit;
      }
    
        
     
  
	    if ($es_in_item_master->Save(true))
			  {
			      $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_itembook_master','Inventory','Add Item','".$edit_id."','ADD ITEM','".$_SERVER['REMOTE_ADDR']."',NOW())";
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
      $getitem = $es_itembook_master->Get($uid);  //gets inventory whose id is 1
}
      if (isset($action) && $action=='view_item') {
            $viewitem = $es_itembook_master->Get($uid);  //gets inventory whose id is 1
     		$inventory_name  = $db->getRow("SELECT * FROM `es_bookinventory` WHERE  `es_bookinventoryid` =  '".$es_itembook_master->es_bookinventoryid."' ");
			$category_sel   = mysql_query("SELECT * FROM `es_bookcategory` WHERE es_bookcategoryid=".$es_itembook_master->es_bookcategoryid);
			$fld_categoryname  = mysql_fetch_assoc($category_sel);
			
			$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_itembook_master','Inventory','Add Item','".$es_itembook_master->es_bookinventoryid."','VIEW ITEM','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
	  }
      
      if (isset($action) && $action=='delete_item') {
            $db->update("es_itembook_master", "fld_status='deleted'", "es_in_item_masterid=$uid");  //deletes the record from the database.
			
			$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_itembook_master','Inventory','Add Item','".$uid."','DELETE ITEM','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
      	  $action = "additem";
      	  header("location:?pid=$pid&action=$action&emsg=3");
      }
if(isset($action) && $action == "edit_item" || $action == "additem"  ){
  

	if ( !isset($start) ){
		$start = 0;
	}	
	$no_rows = count($es_itembook_master->GetList(array(array("fld_item_masterid", ">", 0),array("fld_status", "=", "active")) ));
	
	$orderby_array = array('orb1'=>'fld_item_code', 'orb2'=>'fld_item_name', 'orb3'=>'es_bookinventoryid');
	
	if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
		$orderby = $orderby_array[$column_name];
	}else{
		$orderby = "fld_item_masterid";
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
	
	$itemList = $db->getRows("SELECT * FROM es_itembook_master  WHERE fld_status='active' ORDER BY $orderby $order LIMIT $start , $q_limit ");
	

}

		if ($action == "item_print") {
		
			$orderby_array = array('orb1'=>'fld_item_code', 'orb2'=>'fld_item_name', 'orb3'=>'es_bookinventoryid');
	
			if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
				$orderby = $orderby_array[$column_name];
			}else{
				$orderby = "fld_item_masterid";
			}

			  if (isset($asds_order) && $asds_order=='ASC'){
				$order = "ASC";
			  }else{
				$order = "DESC";
			  }
			//  echo "SELECT itm.*, inv.in_inventory_name FROM es_in_item_master itm, es_inventory inv WHERE itm.status='active' AND itm.es_in_item_masterid > 0 AND itm.in_inventory_id = inv.es_inventoryid ORDER BY $orderby $order";
			$itemListPrint = $db->getRows("SELECT * FROM es_itembook_master  WHERE fld_status='active' ORDER BY $orderby $order");

$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_itembook_master','Inventory','Add Item','','PRINT ITEM','".$_SERVER['REMOTE_ADDR']."',NOW())";
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
		    if(isset($edit_id) && $edit_id !=""){$condition = " AND  es_booksupplier_master!=".$edit_id."";}
			$rows = $db->getone("SELECT COUNT(*) FROM  es_booksupplier_master WHERE fld_name='".$fld_name."' ".$condition."");
			if($rows>=1){$errormessage[0]="Supplier Already Exists";}
		}			
		if (empty($fld_address )) {
		$errormessage[1]="Enter Address";	  
		}
		
		
		if  (empty($fld_office_no)) {
			$errormessage[2]="Enter Office Number"; 
		}
		
		if(count($errormessage)==0)
		{
		    if (isset($fld_name)){
            	$es_booksupplier_master->fld_name = $fld_name;
            }
            if (isset($fld_address)){
            	$es_booksupplier_master->fld_address = $fld_address;
            }
            if (isset($fld_city)){
            	$es_booksupplier_master->fld_city = $fld_city;
            }
            if (isset($fld_state)){
            	$es_booksupplier_master->fld_state = $fld_state;
            }
            if (isset($fld_country)){
            	$es_booksupplier_master->fld_country = $fld_country;
            }
            if (isset($fld_office_no)){
            	$es_booksupplier_master->fld_office_no = $fld_office_no;
            }
            if (isset($fld_mobile_no)){
            	$es_booksupplier_master->fld_mobile_no = $fld_mobile_no;
            }
            if (isset($fld_email)){
            	$es_booksupplier_master->fld_email = $fld_email;
            }
        
			
			if (isset($fld_fax)){
            	$es_booksupplier_master->fld_fax = $fld_fax;
            }
            if (isset($fld_description)){
            	$es_booksupplier_master->fld_description = $fld_description;
            }
           $es_booksupplier_master->fld_status = "active";                      	
 
          if(empty($error)) {
		  if (isset($edit_id) && $edit_id !=""){
           
		    $db->update("es_booksupplier_master", "fld_name        = '$fld_name',
                                                  fld_address     = '$fld_address',
												  fld_city        = '$fld_city',
												  fld_state       = '$fld_state',
												  fld_country     = '$fld_country',
												  fld_address     = '$fld_address',
												  fld_office_no   = '$fld_office_no',
												  fld_mobile_no   = '$fld_mobile_no',
												  fld_email       = '$fld_email',
												  fld_fax         = '$fld_fax',
												  fld_description = '$fld_description'","fld_supplier_masterid=$edit_id"); 
												  
			$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_booksupplier_master','Inventory','Add Supplier','".$edit_id."','UPDATE SUPPLIERS','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
           $action = "addsupply";
		   $emsg = "editsuccess";
		    header("location: ?pid=$pid&action=$action&emsg=2");
            exit;
      }
      elseif ($sm_id = $es_in_supplier_master->Save(true)){
	  
	  $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_booksupplier_master','Inventory','Add Supplier','".$sm_id."','ADD SUPPLIERS','".$_SERVER['REMOTE_ADDR']."',NOW())";
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
    
	  $getsupply = $es_booksupplier_master->Get($uid);  //gets Supply whose id is 1
      
}
if (isset($action) && $action=='view_supply') {
   
	  $viewsupply = $es_booksupplier_master->Get($uid);  //gets Supply whose id is 1
	  
	  $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_booksupplier_master','Inventory','Add Supplier','".$uid."','VIEW SUPPLIERS','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);

}

if (isset($action) && $action=='delete_supply') {
      $db->update("es_booksupplier_master", "status='deleted'", "fld_supplier_masterid=$uid");  //deletes the record from the database.
	  
	   $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_booksupplier_master','Inventory','Add Supplier','".$uid."','DELETE SUPPLIERS','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);

	  $action = "addsupply";
	  header("location:?pid=$pid&action=$action&emsg=3");
}

if(isset($action) && $action == 'list_supply' ||  $action == "remove_supply" || $action == "edit_supply" || $action == "addsupply"  ){
  

	if ( !isset($start) ){
		$start = 0;
	}	
	$no_rows = count($es_in_supplier_master->GetList(array(array("fld_supplier_masterid", ">", 0),array("status", "=", "active")) ));
	
		$orderby_array = array('orb1'=>'fld_supplier_masterid', 'orb2'=>'fld_name', 'orb3'=>'fld_short_name');
		
		if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
			$orderby = $orderby_array[$column_name];
		}else{
			$orderby = "fld_supplier_masterid";
		}
		if (isset($asds_order) && $asds_order=='ASC'){
			$order = true;
		}else{
			$order = false;
		}
	$supplyList = $es_booksupplier_master->GetList(array(array("fld_status", "=", "active"),array("fld_supplier_masterid", ">", "0")), $orderby, $order,  "$start , $q_limit" );

}
/*
 * Print Report for suppliers
*/
	if ($action == 'supplier_print' ) {
			$orderby_array = array('orb1'=>'fld_supplier_masterid', 'orb2'=>'fld_name', 'orb3'=>'fld_short_name');
		
		if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
			$orderby = $orderby_array[$column_name];
		}else{
			$orderby = "fld_supplier_masterid";
		}
		if (isset($asds_order) && $asds_order=='ASC'){
			$order = true;
		}else{
			$order = false;
		}
	$supplyListPrint = $es_booksupplier_master->GetList(array(array("fld_status", "=", "active"),array("fld_supplier_masterid", ">", "0")), $orderby, $order);
	
	 $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_booksupplier_master','Inventory','Add Supplier','','PRINT SUPPLIERS','".$_SERVER['REMOTE_ADDR']."',NOW())";
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
                  $Ord_itemList = $db->getRows("SELECT * FROM `es_itembook_master` WHERE `fld_item_masterid` IN $str_itm ");
				  
				  $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_itembook_master','Inventory','Inventory Reports','','PLACING ORDER','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
            
				  }
			
			
			}
            else if (isset($Submit) && $Submit!=""){
            	
            	
				
				if (isset($fld_booksupplier)){
            		$es_book_orders->fld_booksupplier = $fld_booksupplier;
            	}
            	
           
            	if (isset($fld_orderdate)){
            		$es_book_orders->fld_orderdate = formatDateCalender($order_date, 'Y-m-d H:i:s');
            	}
            	
            	$arrayItems = array();
            	$sl = 1;
                  for($n=1;$n<=count($item_name);$n++)
            	{
            	     if($item_name[$n]!="" && $item_code[$n]!="" && $quantity[$n]!="")
            	     {
                         $arrayItems[$sl]['slno'] = $sl;
                  	     $arrayItems[$sl]['fld_item_code'] = $item_code[$n];
                  	     $arrayItems[$sl]['fld_item_name'] = $item_name[$n];
                  	     $arrayItems[$sl]['quantity'] = $quantity[$n];
                  	     $sl++;
                        }
            	}

            	if ($arrayItems!=""){
            	     $es_book_orders->fld_itempurchased = serialize($arrayItems);
                  }
            	$es_book_orders->fld_orderstatus = "pending";
            	$es_book_orders->fld_status = "active";
            	if ($ordid = $es_book_orders->Save())
            	{
				    $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_book_orders','Inventory','Purchase Order','".$ordid."','ADD ORDERS','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
	
            	     header("location:?pid=$pid&action=$action&emsg=ordplaced");
            	     exit;
            	}
    			       
		    }
     
	    
	  }
      if($action=='goods_reciept'){
            
            if (isset($Submit) && $Submit!=""){
//			array_print($_POST);exit;
		if (isset($fld_recdate)){
            		$rec_date = func_date_conversion("d/m/Y H:i A","Y-m-d H:i:s",$fld_recdate);
					
            	}
            	if (isset($fld_recbillno)){
            		$fld_recbillno = $fld_recbillno;
            	}
            	if (isset($es_bookordersid)){
            		$es_bookordersid = $es_bookordersid;
            	}
            	if (isset($fld_recnote)){
            		$fld_recnote = $fld_recnote;
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
                  	     	$db->update("es_itembook_master", "fld_qty_available = fld_qty_available + '$quantity[$n]',
                                      fld_last_recieved_date = '$prDate'",
                                      "fld_item_masterid='$item_code[$n]'");
                  	     }
                  	     $sl++;
                        }
            	}
            	
            	if ($arrayItems!=""){
            		$items_recieved = serialize($arrayItems);
            	}
            	$ord_status = "complete";
            	$tot_amnt = $fld_totalamount;
            	
                  $db->update("es_book_orders", "fld_recnote = '$fld_recnote',
                                      fld_recdate     = '$fld_recdate',   
                                      fld_recbillno     = '$fld_recbillno',   
                                      fld_recitemsreceived     = '$fld_recitemsreceived',   
                                      fld_totalamount     = '$fld_totalamount',   
                                      fld_orderstatus    = '$fld_orderstatus'",
                                      "es_bookordersid=$es_bookordersid");
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
						  $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_book_orders','Inventory','Goods Receipt Note','".$ordersid."','GOODS RECEIPT','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
						 
						
	////********end narsimha *****/////

                  header("location: ?pid=$pid&action=$action&emsg=grnrcvd");
                  exit;
            }
            else if (isset($es_bookordersid) && $es_bookordersid!=""){
                  $ord_id = $es_bookordersid;
                  $OrdItemList = $es_book_orders->Get($es_bookordersid);
                  $ItemsPurchased = unserialize($OrdItemList->fld_itempurchased);
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
                  $ConditionArr[] = array("fld_last_recieved_date", ">", "$date_from");
				  $ConditionArr[] = array("fld_last_recieved_date", "<", "$date_to");
            } else if($date_from!="" && $date_to=="") {
                  $ConditionArr[] = array("fld_last_recieved_date", ">", "$date_from");
            } else if($date_from=="" && $date_to!="") {
                  $ConditionArr[] = array("fld_last_recieved_date", "<", "$date_to");
            }
            if ($reorder==1 || $reorder==2) {
			if($reorder==2)
			{
			$ConditionArr[] = array("fld_qty_available",">","fld_reorder_level");
			}
			elseif($reorder==1)
			{
			$ConditionArr[] = array("fld_qty_available","<","fld_reorder_level");
			}
			
                
                $searchUrl.= "&reorder=$reorder";
            }
			
	
	//array_print($ConditionArr);
      // Searching Conditions Ends
            
            $ConditionArr[] = array("fld_item_masterid", ">", 0);
            $ConditionArr[] = array("fld_status", "=", "active");
			$obj=$es_in_item_master->GetList($ConditionArr, "", "", "" ,"");
			//array_print($obj);
            $no_rows        = count($obj);
            $orderby_array = array('orb1'=>'fld_item_code', 'orb2'=>'fld_item_name', 'orb3'=>'es_bookinventoryid');
		
		if (isset($column_name) && array_key_exists($column_name, $orderby_array)) {
			$orderby = $orderby_array[$column_name];
		}else{
			$orderby = "fld_item_masterid";
		}
	
		  if (isset($asds_order) && $asds_order=='ASC'){
			$order = true;
		}else{
			$order = false;
		}
		$in_itemsList = $es_bookitem_master->GetList($ConditionArr, $orderby, $order,  "$start , $q_limit" , $extracond );
           
      }
      if($action=='goods_issue'){
            $InventoryList = $es_bookinventory->GetList(array(array("fld_status", "=", "active")));	
		
		if (isset($Submit) && $Submit!=""){
            /*
                  echo "<pre>";
            	print_r($_POST);
            	exit;
            */
            	if (isset($fld_issuedate)){
            		$es_goodsissue->fld_issuedate = formatDateCalender($fld_issuedate, 'Y-m-d H:i:s');
            	}
            	if (isset($fld_issueto)){
            		$es_goodsissue->fld_issueto = $fld_issueto;
            	}
            	if (isset($fld_departmentid)){
            		$es_goodsissue->fld_departmentid = $fld_departmentid;
            	}
            	if (isset($fld_inventoryid)){
            		$es_goodsissue->fld_inventoryid = $fld_inventoryid;
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
                  	     
                  	     $issDate = $es_goodsissue->fld_issuedate;
                  	     if($quantity[$n]>0) {
						// in_qty_available = in_qty_available - $quantity[$n],
                  	     	$db->update("es_itembook_master", "fld_last_issued_date = '$issDate'",
                                      "fld_item_masterid='$item_code[$n]'");
                  	     }
                  	     $sl++;
                        }
            	}
            	if ($arrayItems!=""){
            	     $es_goodsissue->fld_issueditem = serialize($arrayItems);
                  }
            	$es_goodsissue->fld_issuestatus = "notreturned";
            	$es_goodsissue->fld_status = "active";
            	if ($gid = $es_goodsissue->Save())
            	{
				
				    $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_goodsissue','Inventory','Goods Issue Note','".$gid."','GOODS ISSUE','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
	
            	     header("location:?pid=$pid&action=$action&emsg=ginsuccess");
            	     exit;
            	}
            	
            }
      }
      if($action=='return_issue'){
            $IssueList = $es_goodsissue->GetList(array(array("fld_status", "=", "active"),array("fld_issuestatus", "!=", "returned")));	
            //array_print($IssueList);
            if (isset($es_goodsissueid) && $es_goodsissueid!=""){
                  $IssueItemsList = $es_goodsissue->Get($es_goodsissueid);
                  $IssuedItems = unserialize($IssueItemsList->fld_issueditem);
            }
		
		if (isset($Submit) && $Submit!=""){
                  $arrayItems = array();
                  $Iss_ItemsList = $es_goodsissue->Get($es_goodsissueid);
                  $Iss_Items = unserialize($Iss_ItemsList->fld_issueditem);
                  if($Iss_ItemsList->in_returned_items!="") {
                        $Ret_Items = unserialize($Iss_ItemsList->fld_returneditem);
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
              	     	$db->update("es_itembook_master", "fld_qty_available = fld_qty_available-{$quantity[$n]},
                                      fld_last_issued_date = '$ret_date'",
                                      "fld_item_masterid='$item_code[$n]'");
                     }
            	}
            	if ($arrayItems!=""){
            	     $returned_items = serialize($arrayItems);
                  }
            	if ($Iss_Items!=""){
            	     $issued_items = serialize($Iss_Items);
                  }
            	$db->update("es_goodsissue", "fld_issueditem = '$issued_items',
                                      fld_returneditem = '$returned_items',
                                      fld_issuestatus = '$iss_status'",
                                      "es_goodsissueid='$es_goodsissueid'");
			
			$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_goodsissue','Inventory','Issue Return Note','".$es_in_goods_issueid."','GOODS ISSUE RETURN','".$_SERVER['REMOTE_ADDR']."',NOW())";
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
										$ConditionArr[] = "o.fld_orderdate between '$date_from' and '$date_to' ";
								  } else if($date_from!="" && $date_to=="") {
										$ConditionArr[] = "o.fld_orderdate > '$date_from' ";
								  } else if($date_from=="" && $date_to!="") {
										$ConditionArr[] = "o.fld_orderdate < '$date_to' ";
								  }
								  if($status!=''){$ConditionArr[] = "o.fld_orderstatus = '$fld_status' ";}
								  $ConditionArr[] = "o.es_bookordersid > 0";
								  $ConditionArr[] = "o.fld_status = 'active' ";
								  $cond = implode(" AND ",$ConditionArr);
								  
								  $masterClass = $es_book_orders;
								  $orderby_array = array('orb1'=>'fld_booksupplier', 'orb2'=>'fld_orderdate', 'orb3'=>'es_bookordersid');
								  $Default_Orderby = "es_bookordersid";
								  
								  $no_rows = $db->getOne("SELECT count(*) FROM es_book_orders o, es_booksupplier_master s WHERE $cond AND s.fld_supplier_masterid = o.fld_booksupplier");
								  
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
						 $qryOrd = "SELECT o.*, s.fld_name FROM es_book_orders o, es_booksupplier_master s WHERE $cond AND s.fld_supplier_masterid = o.fld_booksupplier ORDER BY $orderby $asds LIMIT $start , $q_limit";
							
							$Search_Results = $db->getRows($qryOrd);
							
                              
                        break;
                        case "grnlist" :
                              
                              $Disp_PageHead = "GRN List";
                              if($date_from!="" && $date_to!="") {
                                    $ConditionArr[] = "o.fld_recdate between '$date_from' and '$date_to'";
                              } else if($date_from!="" && $date_to=="") {
                                    $ConditionArr[] = "o.fld_recdate > '$date_from'";
                              } else if($date_from=="" && $date_to!="") {
                                    $ConditionArr[] = "o.fld_recdate < '$date_to'";
                              }
                              $ConditionArr[] = "o.fld_recnote > 0";
                              $ConditionArr[] = "o.fld_orderstatus != 'pending'";
                              $ConditionArr[] = "o.fld_status = 'active'";
                              $cond = implode(" AND ",$ConditionArr);
                              
                              $masterClass = $es_book_orders;
                              $orderby_array = array('orb1'=>'fld_booksupplier', 'orb2'=>'fld_recdate', 'orb3'=>'fld_recnote');
                              $Default_Orderby = "fld_recnote";
                              
                              $no_rows = $db->getOne("SELECT count(*) FROM es_book_orders o,  es_booksupplier_master s WHERE $cond AND s.fld_supplier_masterid = o.fld_booksupplier");
                              
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
							$qryOrd = "SELECT o.*, s.fld_name FROM es_book_orders o, es_booksupplier_master s WHERE $cond AND s.fld_supplier_masterid = o.fld_booksupplier ORDER BY $orderby $asds LIMIT $start , $q_limit";
							$Search_Results = $db->getRows($qryOrd);
                              
                        break;
                        case "ginlist" :
                              
                              $Disp_PageHead = "GIN List";
                              if($date_from!="" && $date_to!="") {
                                    $ConditionArr[] = array("fld_issuedate", "between", "$date_from' and '$date_to" );
                              } else if($date_from!="" && $date_to=="") {
                                    $ConditionArr[] = array("fld_issuedate", ">", "$date_from");
                              } else if($date_from=="" && $date_to!="") {
                                    $ConditionArr[] = array("fld_issuedate", "<", "$date_to");
                              }
							  if($status1!=''){$ConditionArr[] = array("fld_issuestatus", "=", "$status1");}
                              $ConditionArr[] = array("es_goodsissueid", ">", 0);
                              $ConditionArr[] = array("fld_status", "=", "active");
                              
                              $orderby_array = array('orb1'=>'fld_issueto', 'orb2'=>'fld_issuedate', 'orb3'=>'es_goodsissueid');
                              $Default_Orderby = "es_goodsissueid";
                              
                               $no_rows = count($es_goodsissue->GetList($ConditionArr));
                        
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
							
							$Search_Results = $es_goodsissue->GetList($ConditionArr, $orderby, $order,  "$start , $q_limit" );
							  //echo $es_in_goods_issue->pog_query;
							break;
                        case "orditems" :
                              
                              $item = (int)($item);
                              $Disp_PageHead = "Ordered Items";
                              $Search_item = $es_book_orders->Get($item);
                              $rcved = $Search_item->fld_itempurchased;
                              if($rcved != "")
                              {
                                    $Search_Results = unserialize($rcved); 
                              
                                    for($s=1;$s<=count($Search_Results);$s++)
                                    {
                                          $item_data = $db->getRow("SELECT fld_item_code, fld_item_name FROM es_itembook_master WHERE fld_item_masterid = '".$Search_Results[$s]['item_code']."'");
                                          $Search_Results[$s][item_code] = $item_data['fld_item_code'];
                                          $Search_Results[$s][item_name] = $item_data['fld_item_name'];
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
                                          $item_data = $db->getRow("SELECT fld_item_code, fld_item_name FROM es_itembook_master WHERE fld_item_masterid = '".$Search_Results[$s]['item_code']."'");
                                          $Search_Results[$s][item_code] = $item_data['fld_item_code'];
                                          $Search_Results[$s][item_name] = $item_data['fld_item_name'];
                                    }
                              } else {
                                    $Search_Results = array();
                              }
                              
                        break;
                        case "ginitems" :
                              
                              $item = (int)($item);
                              $Disp_PageHead = "Issued Items";
                              $Search_item = $es_goodsissue->Get($item);
                              $issued = $Search_item->fld_issueditem;
                              if($issued != "")
                              {
                                    $Search_Results = unserialize($issued); 
                              
                                    for($s=1;$s<=count($Search_Results);$s++)
                                    {
                                          $item_data = $db->getRow("SELECT fld_item_code, fld_item_name FROM es_itembook_master WHERE fld_item_masterid = '".$Search_Results[$s]['item_code']."'");
                                          $Search_Results[$s][item_code] = $item_data['fld_item_code'];
                                          $Search_Results[$s][item_name] = $item_data['fld_item_name'];
                                    }
                              } else {
                                    $Search_Results = array();
                              }
                              
                        break;
                        case "rinitems" :
                              
                              $item = (int)($item);
                              $Disp_PageHead = "Returned Issue Items";
                              $Search_item = $es_goodsissue->Get($item);
                              $reted = $Search_item->fld_returneditem;
                              if($reted != "")
                              {
                                    $Search_Results = unserialize($reted);
                                    $tempArr = array(); 
                                    for($s=1;$s<=count($Search_Results);$s++)
                                    {
                                          $tempArr = $Search_Results[$s]['items'];
                                          for($r=1;$r<=count($tempArr);$r++)
                                          {
                                                $item_data = $db->getRow("SELECT fld_item_code, fld_item_name FROM es_itembook_master WHERE fld_item_masterid = '".$tempArr[$r]['item_code']."'");
                                                $tempArr[$r][item_code] = $item_data['fld_item_code'];
                                                $tempArr[$r][item_name] = $item_data['fld_item_name'];
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
		$es_book_orders = new es_book_orders();
		 $es_goodsissue = new es_goodsissue();
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
										$ConditionArr[] = "o.fld_orderdate between '$date_from' and '$date_to' ";
								  } else if($date_from!="" && $date_to=="") {
										$ConditionArr[] = "o.fld_orderdate > '$date_from' ";
								  } else if($date_from=="" && $date_to!="") {
										$ConditionArr[] = "o.fld_orderdate < '$date_to' ";
								  }
								  if($status!=''){$ConditionArr[] = "o.fld_orderstatus = '$status' ";}
								  $ConditionArr[] = "o.es_bookordersid > 0";
								  $ConditionArr[] = "o.fld_status = 'active' ";
								  $cond = implode(" AND ",$ConditionArr);
								  
								  $masterClass = $es_in_orders;
								  $orderby_array = array('orb1'=>'es_booksupplier_master', 'orb2'=>'fld_orderdate', 'orb3'=>'es_bookordersid');
								  $Default_Orderby = "es_bookordersid";
								  
								  $no_rows = $db->getOne("SELECT count(*) FROM es_book_orders o, es_booksupplier_master s WHERE $cond AND s.fld_supplier_masterid = o.fld_booksupplier");
								  
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
						 $qryOrd = "SELECT o.*, s.fld_name FROM es_book_orders o, es_booksupplier_master s WHERE $cond AND s.fld_supplier_masterid = o.fld_booksupplier ORDER BY $orderby $asds ";
							
							$Search_Results = $db->getRows($qryOrd);
							
                              
                        break;
                        case "grnlist" :
                              
                              $Disp_PageHead = "GRN List";
                              if($date_from!="" && $date_to!="") {
                                    $ConditionArr[] = "o.fld_recdate between '$date_from' and '$date_to'";
                              } else if($date_from!="" && $date_to=="") {
                                    $ConditionArr[] = "o.fld_recdate > '$date_from'";
                              } else if($date_from=="" && $date_to!="") {
                                    $ConditionArr[] = "o.fld_recdate < '$date_to'";
                              }
                              $ConditionArr[] = "o.fld_recnote > 0";
                              $ConditionArr[] = "o.fld_orderstatus != 'pending'";
                              $ConditionArr[] = "o.fld_status = 'active'";
                              $cond = implode(" AND ",$ConditionArr);
                              
                              $masterClass = $es_in_orders;
                              $orderby_array = array('orb1'=>'fld_booksupplier', 'orb2'=>'fld_recdate', 'orb3'=>'fld_recnote');
                              $Default_Orderby = "fld_recnote";
                              
                              $no_rows = $db->getOne("SELECT count(*) FROM es_book_orders o, es_booksupplier_master s WHERE $cond AND s.fld_supplier_masterid = o.fld_booksupplier");
                              
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
							$qryOrd = "SELECT o.*, s.fld_name FROM es_book_orders o, es_booksupplier_master s WHERE $cond AND s.fld_supplier_masterid = o.fld_booksupplier ORDER BY $orderby $asds LIMIT $start , $q_limit";
							$Search_Results = $db->getRows($qryOrd);
                              
                        break;
                        case "ginlist" :
						$es_goodsissue = new es_goodsissue();
                              $Disp_PageHead = "GIN List";
                              if($date_from!="" && $date_to!="") {
                                    $ConditionArr[] = array("fld_issuedate", "between", "$date_from' and '$date_to" );
                              } else if($date_from!="" && $date_to=="") {
                                    $ConditionArr[] = array("fld_issuedate", ">", "$date_from");
                              } else if($date_from=="" && $date_to!="") {
                                    $ConditionArr[] = array("fld_issuedate", "<", "$date_to");
                              }
							   if($status1!=''){$ConditionArr[] = array("fld_issuestatus", "=", "$status1");}
                              $ConditionArr[] = array("es_goodsissueid", ">", 0);
                              $ConditionArr[] = array("fld_status", "=", "active");
                              
                              $orderby_array = array('orb1'=>'in_issue_to', 'orb2'=>'in_issue_date', 'orb3'=>'es_in_goods_issueid');
                              $Default_Orderby = "es_goodsissueid";
                              
                             $no_rows = count($es_goodsissue->GetList($ConditionArr));
                        
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
							
							
							$Search_Results = $es_goodsissue->GetList($ConditionArr, $orderby, $order,  "$start , $q_limit" );
							//echo $es_in_goods_issue->pog_query;
							 
							break;
                        case "orditems" :
                              $es_book_orders = new es_book_orders();
                              $item = (int)($item);
                              $Disp_PageHead = "Ordered Items";
                              $Search_item = $es_book_orders->Get($item);
                              $rcved = $Search_item->fld_itempurchased;
                              if($rcved != "")
                              {
                                    $Search_Results = unserialize($rcved); 
                              
                                    for($s=1;$s<=count($Search_Results);$s++)
                                    {
                                          $item_data = $db->getRow("SELECT fld_item_code, fld__item_name FROM es_itembook_master WHERE fld_item_masterid = '".$Search_Results[$s]['item_code']."'");
                                          $Search_Results[$s][item_code] = $item_data['fld_item_code'];
                                          $Search_Results[$s][item_name] = $item_data['fld_item_name'];
                                    }
                              } else {
                                    $Search_Results = array();
                              }
                              
                        break;
                        case "grnitems" :
                             
                              $item = (int)($item);
                              $Disp_PageHead = "GRN Items";
                              $Search_item = $es_book_orders->Get($item);
                              $rcved = $Search_item->fld_recitemsreceived;
                              if($rcved != "")
                              {
                                    $Search_Results = unserialize($rcved); 
                              
                                    for($s=1;$s<=count($Search_Results);$s++)
                                    {
                                          $item_data = $db->getRow("SELECT fld_item_code, fld_item_name FROM es_itembook_master WHERE fld_item_masterid = '".$Search_Results[$s]['item_code']."'");
                                          $Search_Results[$s][item_code] = $item_data['fld_item_code'];
                                          $Search_Results[$s][item_name] = $item_data['fld_item_name'];
                                    }
                              } else {
                                    $Search_Results = array();
                              }
                              
                        break;
                        case "ginitems" :
                              
                              $item = (int)($item);
                              $Disp_PageHead = "Issued Items";
                              $Search_item = $es_goodsissue->Get($item);
                              $issued = $Search_item->fld_issueditem;
                              if($issued != "")
                              {
                                    $Search_Results = unserialize($issued); 
                              
                                    for($s=1;$s<=count($Search_Results);$s++)
                                    {
                                          $item_data = $db->getRow("SELECT fld_item_code, fld_item_name FROM  es_itembook_master WHERE fld_item_masterid = '".$Search_Results[$s]['item_code']."'");
                                          $Search_Results[$s][item_code] = $item_data['fld_item_code'];
                                          $Search_Results[$s][item_name] = $item_data['fld_item_name'];
                                    }
                              } else {
                                    $Search_Results = array();
                              }
                              
                        break;
                        case "rinitems" :
                              
                              $item = (int)($item);
                              $Disp_PageHead = "Returned Issue Items";
                              $Search_item = $es_goodsissue->Get($item);
                              $reted = $Search_item->fld_returneditem;
                              if($reted != "")
                              {
                                    $Search_Results = unserialize($reted);
                                    $tempArr = array(); 
                                    for($s=1;$s<=count($Search_Results);$s++)
                                    {
                                          $tempArr = $Search_Results[$s]['items'];
                                          for($r=1;$r<=count($tempArr);$r++)
                                          {
                                                $item_data = $db->getRow("SELECT fld_item_code, fld_item_name FROM es_itembook_master WHERE fld_item_masterid = '".$tempArr[$r]['item_code']."'");
                                                $tempArr[$r][item_code] = $item_data['fld_item_code'];
                                                $tempArr[$r][item_name] = $item_data['fld_item_name'];
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
				
					    $item_det = $db->getrow("SELECT * FROM `es_itembook_master` WHERE `fld_item_masterid`=" . $eachrecord['item_name']);
							
                         $arrayItems[$sl]['slno'] = $sl;
                  	     $arrayItems[$sl]['item_code'] = $item_det['fld_item_masterid'];
                  	     $arrayItems[$sl]['item_name'] = $item_det['fld_item_masterid'];
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
					  $db->update("es_book_orders","fld_itempurchased='". $serilised_str ."'","es_bookordersid=".$item);
					  header("location:?pid=132&action=inventory_reports&emsg=2".$Page_Url);
					  exit;
                  }
				 
				  
				  

}
if($action=='edit_goodsreceipt_order'){
$details = $db->getrow("SELECT * FROM  es_book_orders WHERE es_bookordersid=".$item);
$pdetails = unserialize($details['fld_recitemsreceived']);
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
					    $item_det = $db->getrow("SELECT * FROM `es_itembook_master` WHERE `fld_item_masterid`=" . $eachrecord['item_name']);
							
                         $arrayItems[$sl]['slno'] = $sl;
                  	     $arrayItems[$sl]['item_code'] = $item_det['fld_item_masterid'];
                  	     $arrayItems[$sl]['item_name'] = $item_det['fld_item_masterid'];
                  	     $arrayItems[$sl]['quantity'] = (int)$_POST['item_'.$eachrecord['slno']];
						 $arrayItems[$sl]['price'] = $_POST['price_'.$eachrecord['slno']];
						   $amount=0;
						  $amount = $_POST['item_'.$eachrecord['slno']]*$_POST['price_'.$eachrecord['slno']];
						 $arrayItems[$sl]['amount'] = $amount;
                  	     $sl++;
						 $to_amt +=$amount;
						 $prDate = date("Y-m-d");
						 
						 $db->update("es_itembook_master", "fld_qty_available = fld_qty_available + '".$update_qty."',
                                      fld_last_recieved_date = '".$prDate."'",
                                      "fld_item_masterid=".$eachrecord['item_name']);
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
					  $db->update("es_book_orders","fld_recitemsreceived='". $serilised_str ."',fld_totalamount='".$to_amt."'","es_bookordersid=".$item);
					  header("location:?pid=132&action=inventory_reports&emsg=2".$Page_Url);
					  exit;
                  }

}
if($action=='purchase_goodsreceipt' || $action=='print_purchase_goodsreceipt'){
$details = $db->getrow("SELECT * FROM  es_book_orders WHERE es_bookordersid=".$item);
$pdetails = unserialize($details['fld_itempurchased']);
$gdetails = unserialize($details['fld_recitemsreceived']);
}

?>
