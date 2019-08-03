<?php
sm_registerglobal('pid', 'action','update1', 'start', 'column_name', 'asds_order', 'uid', 'sid','admin', 'txt_post', 'txt_deptname', 'txt_qulification', 'txt_experience', 'txt_postingdate','txt_nopos','submit','update1','back','addnew','Search1','dc1','dc2','emsg','st_department','pid', 'action','update', 'start', 'column_name', 'asds_order', 'uid', 'sid','admin', 'cfs_name', 'cfs_modeofads', 'cfs_poteddate', 'blogDesc', 'submit','update','back1','addclassified','Search','dc1','dc2','emsg','from','to');

/**
* Only Admin users can view the pages
*/

if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}

/** End of the permissions    **/

/******************** Post Vacancy Starts Here ***********************/

	$es_enquiry    = new es_requirement();
	$obj_postlist  = new es_deptposts();


if($action == 'registration') {
	//fetching  dept  ///
	
	$exesqlquery = "SELECT * FROM `es_departments`";
	$getdeptlist = getamultiassoc($exesqlquery);
	
	//fetching  dept  ///
	
	if(isset($st_department))
	{
	$es_postList = $obj_postlist->GetList(array(array("es_postshortname","=","$st_department")));
	}
	
	if (isset($submit)){
	 
	    $error	= "";
		$vlc    = new FormValidation();
		
		if ($txt_post == '') {
	     $errormessage[0] = "Select Department Name";			
		}
					
		if ($txt_deptname=="") {
		$errormessage[1] = "Select Post";			
		}		
	
		if(count($errormessage) == 0)
		{
			if (isset($txt_post)){
	
			$es_enquiry->es_post = $txt_deptname;
			}
			if (isset($txt_deptname)){
			
				$es_enquiry->es_depatname = $st_department;
			}
		
			if (isset($txt_qulification)){
			
				$es_enquiry->es_qualification = $txt_qulification;
			}
			if (isset($txt_experience)){
			
				$es_enquiry->es_experience = $txt_experience;
			}	
			if (isset($txt_nopos)){
			
				$es_enquiry->es_noofpositions = $txt_nopos;
			}
			if (isset($txt_postingdate) && $txt_postingdate!=""){
			
				$txt_postingdate1 = formatDateCalender($txt_postingdate,"Y-m-d");			
				$es_enquiry->es_date_posteddate = $txt_postingdate1;
				
			}else{
			   $es_enquiry->es_date_posteddate  = date("Y-m-d");
			}	
			$es_enquiry->status = active;
			if ($postid = $es_enquiry->Save()){
			
			 $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_requirement','HRD','Post Vacancy','".$postid."','ADD POST VACANCY','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
			  
				header("location:?pid=9&action=post_vacancy&emsg=1");
				
			}
	    }
	}
}
	
/************* End of Insertion of Post Vacancy **************** **/


/** ************Edit and Updating for post vacancy **************** **/

	if ($action == 'edit'){
		
		$es_enquiryList = $es_enquiry->GetList(array(array("es_requirementid", "=", "$sid")), "es_requirementid", false);
		 $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_requirement','HRD','Post Vacancy','".$sid."','VIEW POST VACANCY','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
		
	}
   
	if (isset($update1))
		
	{
 
	$txt_postingdate1 = formatDateCalender($txt_postingdate,"Y-m-d");
	$db->update('es_requirement', " 
	es_qualification ='" . $txt_qulification . "', es_experience ='" . $txt_experience . "',es_date_posteddate ='" . $txt_postingdate1 . "',es_noofpositions ='" . $txt_nopos . "'",'es_requirementid =' . $sid);
	
	 $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_requirement','HRD','Post Vacancy','".$sid."','EDIT POST VACANCY','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
	
	 $emsg = 2;
	header("location:?pid=9&action=post_vacancy&emsg=".$emsg);
	 }	
	
/************* End of Updating for post vacancy**************** **/
		
/**************** Viewing for post vacancy**************** **/	

	if ($action == 'view_post_vacancy'){
		
		$es_enquiryList = $es_enquiry->GetList(array(array("es_requirementid", "=", "$sid")), "es_requirementid", false);
//fetching  dept  ///
		
		$exesqlquery = "SELECT * FROM `es_departments`";
		$getdeptlist = getamultiassoc($exesqlquery);
		
//fetching  dept  ///
			
        $st_department = $es_enquiryList[0]->es_depatname;
		
	
	if(isset($st_department))
	{
	$es_postList = $obj_postlist->GetList(array(array("es_postshortname","=","$st_department")));
	}
		
	$st_postaplied = $es_enquiryList[0]->es_post;
		
	}
	if ($action == 'view1'){
		
		$es_enquiryList = $es_enquiry->GetList(array(array("es_requirementid", "=", "$sid")), "es_requirementid", false);
		
//fetching  dept  ///

		$exesqlquery = "SELECT * FROM `es_departments`";
		$getdeptlist = getamultiassoc($exesqlquery);
		

	if(isset($st_department))
	{
	$es_postList = $obj_postlist->GetList(array(array("es_postshortname","=","$st_department")));
	}
		
	}
	/************** End of Viewing for post vacancy ************* **/
	/**************Back **************** **/	
	
	if (isset($back1)){
		header('location:?pid=9&action=post_vacancy');
	}
	/*************** End of Back Button **************** **/

/************Add post vacancy**************** **/		
	if (isset($addnew)){
		header('location: ?pid=9&action=registration');
	}
	/****************** End of Add Button ******************** **/

	/************** View Listing for post vacancy************************ **/
	if($action == 'post_vacancy')
	{
			 
		$q_limit  = 10;
	if ( !isset($start) ){
		$start = 0;
	   }	
	$no_rows = count($es_enquiry->GetList(array(array("status", "=", 'active')) ));
	
		$orderby_array = array('orb1'=>'es_requirementid', 'orb2'=>'es_post', 'orb3'=>'es_depatname', 'orb4'=>'es_qualification', 'orb5'=>'es_experience', 'orb6'=>'es_noofpositions', 'orb7'=>'es_date_posteddate');
		
		if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
		
			$orderby = $orderby_array[$column_name];
			
		}else{
		
			$orderby = "es_requirementid";
		}
		
		if (isset($asds_order)&&$asds_order=='ASC'){
		
			$order = true;
			
		}else{
		
			$order = false;
		}

	$es_enquiryList = $es_enquiry->GetList(array(array("status", "=", 'active')) , $orderby, $order,  "$start , $q_limit");
	
	/***************** End of Listing ********************** **/
	
	/**************** Serching for post vacancy************************** **/
	$nill='';
	if (isset($Search1) || $action == 'Search1'){
			     
		$q_limit  = 10;
	if ( !isset($start) ){
	
		$start = 0;
		
	   }	
	  $dc3 = formatDateCalender($dc1,"Y-m-d");
	  $dc4 = formatDateCalender($dc2,"Y-m-d");
	  
	  $no_rows  = count($es_enquiry->GetList(array(array("status", "=", 'active'),array("es_date_posteddate", "between", $dc3."'  and  '".$dc4))));
	  
		if($no_rows >'0')
		{
	  $orderby_array = array('orb1'=>'es_requirementid', 'orb2'=>'es_post', 'orb3'=>'es_depatname', 'orb4'=>'es_qualification', 'orb5'=>'es_experience', 'orb6'=>'es_noofpositions', 'orb7'=>'es_date_posteddate');
		
		if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
		
			$orderby = $orderby_array[$column_name];
			
		}else{
		
			$orderby = "es_requirementid";
		}
		
		if (isset($asds_order)&&$asds_order=='ASC'){
		
			$order = true;
			
		}else{
		
			$order = false;
		}
		
		$es_enquiryList = $es_enquiry->GetList(array(array("status", "=", 'active'),array("es_date_posteddate", "between", $dc3."'  and  '".$dc4)),$orderby, $order,  "$start , $q_limit");
		}
				
		if($no_rows == '0'){
		
			$nill="No records found" ;
		}
		
	}
}
	 
/******************* End of Searching for post vacancy******************* **/

	/****************** Deleting the records for post vacancy ****************** **/

	if($action == 'delete')
	{	
				
	$db->update('es_requirement', "status = 'deleted'", 'es_requirementid =' . $sid);
	$emsg = 3;
	
	 
	
	header("location:?pid=9&action=post_vacancy&emsg=".$emsg);
	
   }
   
    /*************** End of Deleting the records for post vacancy********************* **/
   
   
   
?> 

<?php

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
	if (isset($cfs_poteddate) && $cfs_poteddate!=""){
	
		$cfs_poteddate1 = formatDateCalender($cfs_poteddate,"Y-m-d");			
		$es_clsifieds->cfs_posteddate = $cfs_poteddate1;
	}else{
	    $es_clsifieds->cfs_posteddate = date("Y-m-d");
	}
	if (isset($blogDesc)){
	
		$es_clsifieds->cfs_details = $blogDesc;
		$es_clsifieds->status = active;
	}
	
	if ($clid = $es_clsifieds->Save()){
	$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_classifieds','HRD','Classifieds','".$clid."','ADD CLASSIFIEDS','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
			$emsg = 1;
		header('location:?pid=9&action=list_classifieds&emsg='.$emsg);
		
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
	
	$vlc = new FormValidation();
	 if (!$vlc->is_alpha_numeric($cfs_name)) {
		
		$errormessage[0]="Enter Name";	  
		}		
			
		if (!$vlc->is_alpha_numeric($cfs_modeofads)) {
		
		$errormessage[2]="Enter Ad Type"; 
		}
		if(count($errormessage)==0){

		$cfs_poteddate1 = formatDateCalender($cfs_poteddate,"Y-m-d");	
		
	$db->update('es_classifieds', "cfs_name ='" . $cfs_name . "', cfs_modeofadds ='" . $cfs_modeofads . "',
	cfs_posteddate ='" . $cfs_poteddate1 . "', cfs_details ='" . $blogDesc . "'",'es_classifiedsid =' . $sid);
	
	$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_classifieds','HRD','Classifieds','".$sid."','EDIT CLASSIFIEDS','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
	
	$emsg = 2;
	header('location: ?pid=9&action=list_classifieds&emsg='.$emsg);
	}	
	}
	
/**************** End of Updating of Classifieds******************** **/
	
	
/**************** viewing Classifieds **************** **/	

	if ($action=='view_classifieds' ||$action=='mail'){
	
		$es_clsifiedsList1 = $es_clsifieds->GetList(array(array("es_classifiedsid", "=", "$sid")), "es_classifiedsid", false);
		
		$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_classifieds','HRD','Classifieds','".$sid."','VIEW / EMAIL CLASSIFIEDS','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
	}
/*************** End of Viewing Classifieds********************* **/
	
	
	
/************** Back **************** **/	
	
	if (isset($back)){
		header('location: ?pid=9&action=list_classifieds');
	}
	
/************** End of Back Button ****************** **/
	
	

/************Add **************** **/	
	
	if (isset($addclassified)){
		header('location: ?pid=9&action=classifieds_registration');
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
	
	
/******************** Serching for classifieds************************ **/

	if (isset($Search) || $action1 == 'Search'){
		
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
/************** End of Searching for classifieds*********************** **/

/*************** Deleting the records for classifieds************************* **/

	if($action=='delete_classifieds')
	{	
				
		$db->update('es_classifieds', "status = 'deleted'", 'es_classifiedsid =' . $sid);
		
		$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_classifieds','HRD','Classifieds','".$sid."','DELETE CLASSIFIEDS','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
			
		header('location:?pid=9&action=list_classifieds&emsg=3');
	
   }
   
/********************* End of Deleting **********************/ 
   

   
?> 