<?php
include_once (INCLUDES_CLASS_PATH . DS . 'class.es_classifieds.php');

sm_registerglobal('pid', 'action','update', 'start', 'column_name', 'asds_order', 'uid', 'sid','admin', 'cfs_name', 'cfs_modeofads', 'cfs_poteddate', 'blogDesc', 'submit','update','back','addnew','Search','dc1','dc2','emsg');

/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}

/** ********End of the Permissions ************ **/

/********************Classifieds Registration ***********************/
$es_clsifieds = new es_classifieds();


if($action=='classifieds_registration')
{
if (isset($submit)){
	
	$error	= "";	
	
		  $vlc = new FormValidation();
		  		
		if (!$vlc->is_alpha_numeric($cfs_name)) {
		$errormessage[0]="Enter Name";	  
		}		
			
		if (!$vlc->is_alpha_numeric($cfs_modeofads)) {
		$errormessage[2]="Enter Ad Type"; 
		}		
	
		/*if (empty($cfs_poteddate)) {
		$errormessage[3]="Select Date"; 
		}*/
  
 if(count($errormessage)==0)
  {
		
	if($error=="" && isset($error))
	{
		if (isset($cfs_name)){
		$es_clsifieds->cfs_name = $cfs_name;
	}
	if (isset($cfs_modeofads)){
		$es_clsifieds->cfs_modeofadds = $cfs_modeofads;
	}
	if (isset($cfs_poteddate)){
		$cfs_poteddate1 = formatDateCalender($cfs_poteddate,"Y-m-d");			
		$es_clsifieds->cfs_posteddate = $cfs_poteddate1;
	}
	if (isset($blogDesc)){
		$es_clsifieds->cfs_details = $blogDesc;
		$es_clsifieds->status = active;
	}
	
	if ($es_clsifieds->Save()){
			$emsg = 1;
		header('location:?pid=13&action=list_classifieds&emsg='.$emsg);
		
		}
	  }
	}
  }
}	
/***************** End of Classifieds Registration ****************** **/


/*************** Edit and Updating of Classifieds**************** **/
	if ($action=='edit_classifieds'){
		
		$es_clsifiedsList1 = $es_clsifieds->GetList(array(array("es_classifiedsid", "=", "$sid")), "es_classifiedsid", false);
	}
   	
	if (isset($update)){

		$cfs_poteddate1 = formatDateCalender($cfs_poteddate,"Y-m-d");	
		
	$db->update('es_classifieds', "cfs_name ='" . $cfs_name . "', cfs_modeofadds ='" . $cfs_modeofads . "',
	cfs_posteddate ='" . $cfs_poteddate1 . "', cfs_details ='" . $blogDesc . "'",'es_classifiedsid =' . $sid);
	$emsg = 2;
	header('location: ?pid=13&action=list_classifieds&emsg='.$emsg);
	}	
	
/**************** End of Updating ******************** **/
	
	
/**************** viewing Classifieds **************** **/	

	if ($action=='view_classifieds' ||$action=='mail'){
		$es_clsifiedsList1 = $es_clsifieds->GetList(array(array("es_classifiedsid", "=", "$sid")), "es_classifiedsid", false);
	}
/*************** End of Viewing Classifieds********************* **/
	
	
	
/************** Back **************** **/	
	
	if (isset($back)){
		header('location: ?pid=13&action=list_classifieds');
	}
	
/************** End of Back Button ****************** **/
	
	

/************Add **************** **/	
	
	if (isset($addnew)){
		header('location: ?pid=13&action=classifieds_registration');
	}
	
/************ End of Add Button ***************** **/
	

/************** View Listing **********************/

	if($action=='list_classifieds')
	{
		$q_limit  = 10;
	if ( !isset($start) ){
		$start = 0;
	   }	
	$no_rows = count($es_clsifieds->GetList(array(array("status", "=", 'active')) ));
	
		$orderby_array = array('orb1'=>'es_classifiedsid', 'orb2'=>'cfs_name', 'orb3'=>'cfs_modeofadds', 'orb4'=>'cfs_posteddate');
		
		if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
			$orderby = $orderby_array[$column_name];
		}else{
			$orderby = "es_classifiedsid";
		}
		if (isset($asds_order)&&$asds_order=='ASC'){
			$order = true;
		}else{
			$order = false;
		}
		
	$es_clsifiedsList = $es_clsifieds->GetList(array(array("status", "=", 'active')) , $orderby, $order,  "$start , $q_limit");
	}
	
	
/************** End of Listing *********************** **/
	
	
/******************** Serching ************************ **/

	if (isset($Search)){
		$q_limit  = 10;
	if ( !isset($start) ){
		$start = 0;
	   }	
	   $dc3 = changejsdate1($dc1);
	  $dc4 = changejsdate1($dc2);
	  $no_rows  = count($es_clsifieds->GetList(array(array("status", "=", 'active'),array("cfs_posteddate", "between", $dc3."'  and  '".$dc4)) ));
		if($no_rows>'0')
		{
	    $orderby_array = array('orb1'=>'es_classifiedsid', 'orb2'=>'cfs_name', 'orb3'=>'cfs_modeofadds', 'orb4'=>'cfs_posteddate');
		
		if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
			$orderby = $orderby_array[$column_name];
		}else{
			$orderby = "es_classifiedsid";
		}
		if (isset($asds_order)&&$asds_order=='ASC'){
			$order = true;
		}else{
			$order = false;
		}
		$conditon =array();
	if(isset($dc3) && $dc4=='--'&& $dc3!='--'){
		$dt=date('Y-m-d');
		
		$conditon[] = array("cfs_posteddate", "between", $dc3."'  and  '".$dt);
		$conditon[]=array("status", "=", 'active');
		
	}
	if(isset($dc4) && $dc3=='--'&& $dc4!='--'){
		$dt=date('Y-m-d');
		$conditon[] = array("cfs_posteddate", "<=", $dc4);
		$conditon[]=array("status", "=", 'active');
		
	}
	if( $dc4!='--' &&  $dc3!='--')
	{
		$conditon[] = array("cfs_posteddate", "between", $dc3."'  and  '".$dc4);
		$conditon[]=array("status", "=", 'active');
		
	}
		$es_clsifiedsList = $es_clsifieds->GetList($conditon,$orderby, $order,  "$start , $q_limit");
		}
		if($no_rows=='0'){
			$nill="No records found" ;
		}
		
	}
/************** End of Searching *********************** **/

/*************** Deleting ************************* **/

	if($action=='delete_classifieds')
	{	
		/*$es_clsifieds->es_requirementId = $sid;		
		$es_clsifieds->Delete();	
		header('location:?pid=10');	*/
		
		$db->update('es_classifieds', "status = 'deleted'", 'es_classifiedsid =' . $sid);
			$emsg = 3;
		header('location:?pid=13&action=list_classifieds&emsg='.$emsg);
	
   }
   
/********************* End of Deleting **********************/ 
   
/********************** Pagination ***************************/
   
   if($action1=='search')
	{	
		$q_limit  = 10;
	if ( !isset($start) ){
		$start = 0;
	   }	
	$no_rows = count($es_clsifieds->GetList(array(array("status", "=", 'active')) ));
	
		$orderby_array = array('orb1'=>'es_classifiedsid', 'orb2'=>'cfs_name', 'orb3'=>'cfs_modeofadds', 'orb4'=>'cfs_posteddate');
		
		if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
			$orderby = $orderby_array[$column_name];
		}else{
			$orderby = "es_classifiedsid";
		}
		if (isset($asds_order)&&$asds_order=='ASC'){
			$order = true;
		}else{
			$order = false;
		}
		
	$es_clsifiedsList = $es_clsifieds->GetList(array(array("status", "=", 'active')) , $orderby, $order,  "$start , $q_limit");
   }  
  
/**************** End of Pagination ******************/ 
   
?> 
