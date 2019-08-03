<?php
include_once (INCLUDES_CLASS_PATH . DS . 'class.es_staff.php');

sm_registerglobal('pid', 'action','update', 'start', 'column_name', 'asds_order', 'uid', 'sid','admin','st_regno','st_fname','st_lname','st_gender','st_dob','st_postapp','st_secsubj','st_fahbname','st_daughter','st_son','st_email','st_sno1','st_pass1','st_board1','st_year1','st_sno2','st_pass2','st_board2','st_year2','st_sno3','st_pass3','st_board3','st_year3','st_sno4','st_inst1','st_position1','st_period1','st_sno5',
'st_inst2','st_position2','st_period2','st_sno6','st_inst3','st_position3','st_period3','st_address','st_city','st_state','st_country','st_pin','st_phone','st_residency','st_mobile','st_peadress','st_pecity','st_pestate','st_pecountry','st_pepin','st_pepincode','st_peresi','st_pemobno','st_sno7','st_refname1','st_desg1','st_inst4',
'st_email1','st_sno8','st_refname2','st_desg2','st_inst5','st_email2','st_sno9','st_refname3','st_desg3','st_inst6','st_email3','','submit','update','back','addnew','Search','dc1','dc2');

/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}

/**End of the permissions    **/

/******************** registration ***********************/
$es_clsifieds = new es_staff();


if ($action=='classifieds_registration'){
	if (isset($submit)){
	$error	= "";
	$vlc    = new FormValidation();
	if (!$vlc->is_alpha_numeric($cfs_name)) {
		$ecfs_name = "Please enter alpha numeric format";
		$error .= "user";
	}	
	if (!$vlc->is_alpha_numeric($cfs_modeofads)) {
		$ecfs_modeofads = "Please enter alpha numeric format";
		$error .= "user";
	}
	if ($cfs_poteddate=="") {
			$ecfs_poteddate = "Select date";
			$error .= "user";
		}	
	if ($blogDesc=="") {
			$ecfs_desc = "Please enter valid classified descrption";
			$error .= "user";
		}	
		
	if ($error=="" && isset($error)){
		if (isset($cfs_name)){
		$es_clsifieds->cfs_name = $cfs_name;
	}
	if (isset($cfs_modeofads)){
		$es_clsifieds->cfs_modeofadds = $cfs_modeofads;
	}
	if (isset($cfs_poteddate)){
		$cfs_poteddate1 = DatabaseFormat($cfs_poteddate,"Y-m-d");			
		$es_clsifieds->cfs_posteddate = $cfs_poteddate1;
	}
	if (isset($blogDesc)){
		$es_clsifieds->cfs_details = $blogDesc;
		$es_clsifieds->status = active;
	}
	
	if ($es_clsifieds->Save()){
		
		header('location:?pid=13&action=list_classifieds&insertsucess=*2');
		
		}
	}
	}
}
	
/**------------- end of registration --------------- **/


/** edit and updating **************** **/
	if ($action=='edit_classifieds'){
		
		$es_clsifiedsList1 = $es_clsifieds->GetList(array(array("es_classifiedsid", "=", "$sid")), "es_classifiedsid", false);
	}
   
	
	
	if (isset($update)){
		$cfs_poteddate1 = DatabaseFormat($cfs_poteddate,"Y-m-d");	
		
	$db->update('es_classifieds', "cfs_name ='" . $cfs_name . "', cfs_modeofadds ='" . $cfs_modeofads . "',
	cfs_posteddate ='" . $cfs_poteddate1 . "', cfs_details ='" . $blogDesc . "'",'es_classifiedsid =' . $sid);
	
	header('location: ?pid=13&action=list_classifieds&updatesucess=*1');
	}	
	
	/**------------- end of updating --------------- **/
	
	
	
	
/**************** viewing **************** **/	
	if ($action=='view_classifieds'){
		$es_clsifiedsList1 = $es_clsifieds->GetList(array(array("es_classifiedsid", "=", "$sid")), "es_classifiedsid", false);
	}
	/**------------- end of viewing --------------- **/
	
	
	
	/**************back **************** **/	
	
	if (isset($back)){
		header('location: ?pid=13&action=list_classifieds');
	}
	/**------------- end of back button --------------- **/
	
	
	

/************Add **************** **/		
	if (isset($addnew)){
		header('location: ?pid=13&action=classifieds_registration');
	}
	/**------------- end of Add button --------------- **/
	
	
	

	/**------------- View Listing --------------- **/
	if($action=='list_classifieds')
	{
		$q_limit  = 2;
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
		//$es_clsifiedsList = $es_clsifieds->GetList(array(array("es_clsifiedsid", ">", 0)), $orderby, $order,  "$start , $q_limit" );
	$es_clsifiedsList = $es_clsifieds->GetList(array(array("status", "=", 'active')) , $orderby, $order,  "$start , $q_limit");
	}
	/**------------- end of Listing --------------- **/
	
	
	
	
	/**------------- Serching --------------- **/
	if (isset($Search)){
		$q_limit  = 10;
	if ( !isset($start) ){
		$start = 0;
	   }	
	   $dc3 = DatabaseFormat($dc1,"Y-d-m");
	  $dc4 = DatabaseFormat($dc2,"Y-d-m");
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
		$es_clsifiedsList = $es_clsifieds->GetList(array(array("status", "=", 'active'),array("cfs_posteddate", "between", $dc3."'  and  '".$dc4)),$orderby, $order,  "$start , $q_limit");
		}
		if($no_rows=='0'){
			$nill="No records found" ;
		}
		
	}
/**------------- eof searchinmg --------------- **/




	/**------------- deleting --------------- **/

	if($action=='delete_classifieds')
	{	
		/*$es_clsifieds->es_requirementId = $sid;		
		$es_clsifieds->Delete();	
		header('location:?pid=10');	*/
		
$db->update('es_classifieds', "status = 'deleted'", 'es_classifiedsid =' . $sid);
header('location:?pid=13&action=list_classifieds');
	
   }
   /**------------- eof deleting --------------- **/ 
   
   /**------------- pagination --------------- **/
   
   if($action1=='search')
	{	
		$q_limit  = 1;
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
		//$es_clsifiedsList = $es_clsifieds->GetList(array(array("es_clsifiedsid", ">", 0)), $orderby, $order,  "$start , $q_limit" );
	$es_clsifiedsList = $es_clsifieds->GetList(array(array("status", "=", 'active')) , $orderby, $order,  "$start , $q_limit");
   }
   
  
   /**------------- eof pagination --------------- **/ 

		  
   
?> 
