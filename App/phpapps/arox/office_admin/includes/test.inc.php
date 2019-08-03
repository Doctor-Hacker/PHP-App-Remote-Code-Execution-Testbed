<?php
/**
* include_once (INCLUDES_CLASS_PATH . DS . 'class.es_in_orders.php');
* include_once (INCLUDES_CLASS_PATH . DS . 'class.es_in_supplier_master.php');
* include_once (INCLUDES_CLASS_PATH . DS . 'class.es_in_item_master.php');
*/
      
      sm_registerglobal('pid', 'action','update', 'start', 'emsg', 'uid', 'admin', 'Submit', 'item_code', 'item_name', 'quantity', 'price', 'amount', 'es_in_ordersid', 'in_suplier_name', 'in_items_purchased', 'order_date', 'in_rec_note_no', 'in_rec_date', 'in_rec_bill_no', 'in_items_recieved', 'in_tot_amnt', 'in_ord_status', 'status', 'checkitem', 'OrderNow', 'type','Search', 'dc1','dc2','reorder', 'date_to', 'date_from', 'from', 'to');
	
/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
	$es_in_orders		   = new es_in_orders();
	$es_in_supplier_master = new es_in_supplier_master();
	$es_in_item_master     = new es_in_item_master();
	
	$query1    = "select max(es_in_ordersid) from es_in_orders";    // To Get next Order number
	$maxOrder  = $db->getOne($query1);
	$nextOrder = $maxOrder+1;                                   // Next Order number
	$query2    = "select max(in_rec_note_no) from es_in_orders";    // To Get next Order number
	$maxGrn    = $db->getOne($query2);
	$nextGrn   = $maxGrn+1;                                   // Next Order number

	$in_supplierList = $es_in_supplier_master->GetList(array(array("status", "=", "active")));
	$in_itemsList = $es_in_item_master->GetList(array(array("status", "=", "active")));
	$in_OrdersList = $es_in_orders->GetList(array(array("in_ord_status", "=", "pending"),array("status", "=", "active")));

      if(isset($emsg) && $emsg!="")
      {
            switch($emsg)
            {
			  case "ordplaced" :
			  $message = "Order Placed Successfully.";
			  break;
			  
			  case "grnrcvd" :
			  $message = "Goods Received Successfully.";
			  break; 
            }
      }
      
      if($action=="add_order")
      {
            if (isset($OrderNow) && $OrderNow!=""){
                  $itId = array();
                  $str_itm = " ( ".implode(",",$checkitem)." ) ";
                  $Ord_itemList = $db->getRows("SELECT * FROM `es_in_item_master` WHERE `es_in_item_masterid` IN $str_itm ");
            }
            if (isset($Submit) && $Submit!=""){
            	
            	if (isset($in_suplier_name)){
            		$es_in_orders->in_suplier_name = $in_suplier_name;
            	}
            	if (isset($order_date)){
            		$es_in_orders->order_date = $order_date;
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
            	if ($es_in_orders->Save())
            	{
            	     header("location:?pid=11&action=add_order&emsg=ordplaced");
            	     exit;
            	}
            }
      }
      if($action=='goods_reciept'){
	  
		    if (isset($Submit) && $Submit!=""){
            
            	if (isset($in_rec_date)){
            		$rec_date = $in_rec_date;
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
                  	     
                  	     $prDate = date("Y-m-d H:i:s");
                  	     
                  	     $db->update("es_in_item_master", "in_qty_available = in_qty_available + '$quantity[$n]',
                                      in_last_recieved_date = '$prDate'",
                                      "es_in_item_masterid='$item_code[$n]'");
                  	     
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
                  header("location: ?pid=11&action=goods_reciept&emsg=grnrcvd");
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
            /**------------- Serching --------------- **/
        if (isset($Search)){
                  header("location:?pid=$pid&action=$action&from=$dc1&to=$dc2&reorder=$reorder");
                  exit;
      	}
            
            $q_limit  = 4;
		if (!isset($start) ){
			$start = 0;
		}
		if ($from!="") {
			$date_from = DatabaseFormat($from,"Y-m-d");
			$date_from = $date_from." 00:00:00";
			$searchUrl= "&from=$from";
		}
		if ($to!="") {
		    $date_to = DatabaseFormat($to,"Y-m-d");
			$date_to = $date_to." 23:59:59";
			$searchUrl.= "&to=$to";
		}
		
		$ConditionArr = array();
	// Searching Conditions
		if($date_from!="" && $date_to!="") {
                  $ConditionArr[] = array("in_last_recieved_date", "between", "$date_from' and '$date_to" );
            } else if($date_from!="" && $date_to=="") {
                  $ConditionArr[] = array("in_last_recieved_date", ">", "$date_from");
            } else if($date_from=="" && $date_to!="") {
                  $ConditionArr[] = array("in_last_recieved_date", "<", "$date_to");
            }
            if ($reorder!="") {
                $extracond = " in_qty_available $reorder in_reorder_level ";
                $searchUrl.= "&reorder=$reorder";
            }
      // Searching Conditions Ends
            
            $ConditionArr[] = array("es_in_item_masterid", ">", 0);
            $ConditionArr[] = array("status", "=", "active");
            $no_rows        = count($es_in_item_master->GetList($ConditionArr, "", "", "" , $extracond));
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
