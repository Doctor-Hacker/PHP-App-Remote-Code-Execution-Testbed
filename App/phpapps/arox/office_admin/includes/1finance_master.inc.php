<?php
sm_registerglobal('pid', 'action','emsg', 'update', 'uid', 'start', 'asds_order', 'submit', 'column_name', 'admin', 'fi_startdate', 'fi_enddate','fi_address','fi_currency','fi_symbol','fi_email','fi_initialbalance','Submit','savegroups','groupname','undgroup','gid','submitledger','lg_name','lg_groupname','lg_openingbalance','lg_amounttype','lg_createdon','voucher_type','voucher_mode','update','vocturetype','vocturid','vocturemode','back','other_fi_symbol','fi_phoneno','fi_website','fi_school_logo',"fi_schoolname",'oldlogoimage','classSubmit', 'examSubmit', 'feeSubmit','elid','Update','Save','finance_group','groupUpdate','fgid','fi_ac_startdate','fi_ac_enddate','fid','fi_endclass');
/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}


$compdetails_school  = getarrayassoc("SELECT *FROM `es_finance_master`  ORDER BY `es_finance_masterid` DESC LIMIT 0 , 1");
$school_records = sqlnumber("SELECT *FROM `es_finance_master`  ORDER BY `es_finance_masterid` DESC LIMIT 0 , 1");
if ($action=='school_details') { 
	
	if(isset($fid) && $fid!=""){
	$compdetails_school  = getarrayassoc("SELECT *FROM `es_finance_master`  ORDER BY `es_finance_masterid` DESC LIMIT 0 , 1");	
	}
	
	
	if ($Submit=='Submit')	{	
		
		$vlc    = new FormValidation();		
		
		if(!isset($fid) && $fid==""){
			if ($fi_startdate=="") {
				 $errormessage[2]="Enter Financial Year Start Date";	  
			}	
			if ($fi_enddate=="") {
				$errormessage[3]="Enter Financial Year End Date";	  
			}
				if ($fi_ac_startdate=="") {
				$errormessage[0]="Enter Academic Year Start Date";	  
			}	
			if ($fi_ac_enddate=="") {
				$errormessage[1]="Enter Academic Year End Date";	  
			}	
			if ($fi_schoolname=="") {
				$errormessage[4]="Enter School / College Name";	  
			}
			if ($fi_address=="") {
				$errormessage[5]="Enter Address";	  
			}		
			if ($fi_email=="") {
				$errormessage[6]="Enter E-mail ";	  
			}
			if ($fi_phoneno=="") {
				$errormessage[7]="Enter Phone Number ";	  
			}
			if ($oldlogoimage=="") {
				$errormessage[8]="Enter Logo";	  
			}
		}
		if (empty($fi_symbol)) {
			$errormessage[4]="Enter Currency Symbol";	  
		}
		if($school_records==0){
		if($fi_schoolname==""){$errormessage[5]="Enter School / College Name";	}
		if($fi_address==""){$errormessage[7]="Enter Address";	}
		
		if($fi_email==""){$errormessage[8]="Enter Email";	}
		if($fi_phoneno==""){$errormessage[6]="Enter Phone Number";	}
		if($fid==""){
		if($_FILES['fi_school_logo']['name']==""){ $errormessage[9]="Upload Logo"; }
		}
		}	
		
		if (count($errormessage)==0){
			if(isset($fid) && $fid!=""){
			
			$range1 = $db->getOne("SELECT COUNT(*) FROM `es_finance_master` WHERE ( `fi_ac_enddate` BETWEEN '".formatDateCalender($fi_ac_startdate,"Y-m-d")."' AND '".formatDateCalender($fi_ac_enddate,"Y-m-d")."' OR `fi_ac_enddate`>'".formatDateCalender($fi_ac_startdate,"Y-m-d")."' ) AND es_finance_masterid !='".$fid."'");
			
			$range2 = $db->getOne("SELECT COUNT(*) FROM `es_finance_master` WHERE (`fi_enddate` BETWEEN '".formatDateCalender($fi_startdate,"Y-m-d")."' AND '".formatDateCalender($fi_enddate,"Y-m-d")."'  OR `fi_enddate`>'".formatDateCalender($fi_startdate,"Y-m-d")."' ) AND es_finance_masterid !='".$fid."'");
			
			} else {
			
			
			$range1 = $db->getOne("SELECT COUNT(*) FROM `es_finance_master` WHERE `fi_ac_enddate` BETWEEN '".formatDateCalender($fi_ac_startdate,"Y-m-d")."' AND '".formatDateCalender($fi_ac_enddate,"Y-m-d")."' OR `fi_ac_enddate`>'".formatDateCalender($fi_ac_startdate,"Y-m-d")."'");
			
			$range2 = $db->getOne("SELECT COUNT(*) FROM `es_finance_master` WHERE `fi_enddate` BETWEEN '".formatDateCalender($fi_startdate,"Y-m-d")."' AND '".formatDateCalender($fi_enddate,"Y-m-d")."'  OR `fi_enddate`>'".formatDateCalender($fi_startdate,"Y-m-d")."'");
			
				if($range2!=0 ){
				$errormessage[2]="Please check the dates and enter new Financial Year";	
				}
				if($range1!=0 ){
				$errormessage[0]="Please check the dates and enter new Academic Year";	
				}
			}
			
			
			
		
			
		//if (!$vlc->is_number($fi_initialbalance)) {
        //	$errormessage[5]="Enter Balance Amount";	  
        //}	
		if (count($errormessage)==0){	
			
			if (isset($fi_startdate)){
				$fi_startdate = formatDateCalender($fi_startdate,"Y-m-d");			
				
				
			}
			if (isset($fi_enddate)){
				$fi_enddate = formatDateCalender($fi_enddate,"Y-m-d");			
				
				
			}
			if (isset($fi_ac_startdate)){
				$fi_ac_startdate = formatDateCalender($fi_ac_startdate,"Y-m-d");			
				
				
			}
			if (isset($fi_ac_enddate)){
				$fi_ac_enddate = formatDateCalender($fi_ac_enddate,"Y-m-d");			
				
				
			}
			
			
			
			
			
			if (is_uploaded_file($_FILES['fi_school_logo']['tmp_name'])) {	
				$ext = explode(".", $_FILES['fi_school_logo']['name']);
				$str = date("mdY_hms");
				$new_thumbname = "st_".$str."_".$ext[0].".".$ext[1];
				$updir	= "images/school_logo/";
				$uppath = $updir.$new_thumbname;
				@move_uploaded_file($_FILES['fi_school_logo']['tmp_name'],$uppath);
				$pre_image = $new_thumbname;
				
			} else {
				$pre_image = $oldlogoimage;		
				
			}
			
			
			$_SESSION['eschools']['schoollogo'] = $pre_image;
			$_SESSION['eschools']['schoolname'] = $fi_schoolname;
			
			if ( isset($fid) && $fid!="") {
			$fi_details_id = $compdetails['es_finance_masterid'];
					
					$db->update("es_finance_master"," fi_address      = '$fi_address',
													  fi_currency     = '$fi_currency',
													  fi_symbol       = '$fi_symbol',
													  fi_email		  = '$fi_email',
													  fi_schoolname	  = '$fi_schoolname', 
													  fi_phoneno	  = '$fi_phoneno',
													  fi_website	  = '$fi_website',
													  fi_endclass     = '$fi_endclass',
													  fi_school_logo  =	'$pre_image'
													","es_finance_masterid = $fid");

$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_finance_master','SET UP','Institute Details','".$fid."','EDIT INSTITUTE DETAILS','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);														
				$emsg =20;
				header("Location:?pid=22&action=school_details&emsg=2");
				exit();
		
				
				} else {
				$fi_master_arr = array("fi_startdate"=>$fi_startdate,
									   "fi_enddate"=>$fi_enddate,
									   "fi_ac_startdate"=>$fi_ac_startdate,
									   "fi_ac_enddate"=>$fi_ac_enddate,
									   "fi_address"=>$fi_address,
									   "fi_currency"=>$fi_currency,
									   "fi_symbol"=>$fi_symbol,
									   "fi_email"=>$fi_email,
									   "fi_schoolname"=>$fi_schoolname,
									   "fi_phoneno"=>$fi_phoneno,
									   "fi_endclass"=>$fi_endclass,
									   "fi_website"=>$fi_website,
									   "fi_school_logo"=>$pre_image);
				$fi_master_arr = stripslashes_deep($fi_master_arr);
				$db->insert("es_finance_master",$fi_master_arr);
					
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_finance_master','SET UP','Institute Details','".$inst_id."','ADD INSTITUTE OR ACADEMIC YEAR','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);		
				}
			$emsg =20;
				header("Location:?pid=92");
				exit();
		}
	}
	
}

													
													
				$get_school_details = $db->getRows("SELECT * FROM es_finance_master ORDER BY es_finance_masterid DESC");
													
													//echo"<pre>";
													//print_r($get_school_details);
//
if ($action == 'master_group'){
		//Adding Multiple Groups
	if ($savegroups=='Save Groups'){			
		for ($ig=0; $ig<count($groupname); $ig++) {	
			if ($groupname[$ig]!=''){	
				$obj_groups = new es_fa_groups();
				$obj_groups->fa_groupname = strtoupper($groupname[$ig]);
				$obj_groups->fa_undergroup = $undgroup[$ig];
				$obj_groups->fa_display = "0";
				$no_rows = $db->getone("SELECT COUNT(*) FROM es_fa_groups WHERE fa_groupname = '".strtoupper($groupname[$ig])."'");
				if($no_rows==0){
				$svg[]=$obj_groups->Save();
				}
				
				$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_fa_groups','ACCOUNTING','CREATE ACCOUNT GROUPS','".$svg."','ACCOUNT GROUP CREATED','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	           $log_insert_exe=mysql_query($log_insert_sql);
				strtoupper($groupname[$ig]).$undgroup[$ig]."<hr>";				
				}
				}
				
				if(count($svg)>=1){$Url="&emsg=1";}else{$Url="";}
				header("Location:?pid=22&action=master_group$Url");
				exit;	
		}
	$obj_classlist    = new es_fa_groups();
	$obj_grouplistarr = $obj_classlist->GetList(array(array("es_fa_groupsid", ">", 0)) );
	}
	
	// Deleting Group
if ($action=='deletegroup'){
		$obj_delgroup = new es_fa_groups();
		$obj_delgroup->es_fa_groupsId = $gid;
		
		$obj_delgroup->Delete();
		
		$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_fa_groups','ACCOUNTING','CREATE ACCOUNT GROUPS','".$gid."','ACCOUNT GROUP DELETED','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);
		$emsg = 3;
		header("Location:?pid=22&action=master_group&emsg=3");
		exit;	
	}

//**************** Financial/ Ledger***********/
	if ($action=='ledger'){
		if (isset($gid) && $gid!=""){
			$obj_leavemaster = new es_ledger();
			$leavemasterdetails = $obj_leavemaster->Get($gid);
		}
		
		if(isset($Submit) && $Submit=='Update')
		{
		/*$fromdate = DatabaseFormat($dc1);
		$todate = DatabaseFormat($dc2);*/
	$vlc    = new FormValidation();		
			
		if ($lg_name=="") {
		$errormessage[2]="Enter Ledger Name";	  
		}	
		if ($lg_openingbalance < 0) {
		$errormessage[3]="Enter Valid amount";	  
		}	
	if(count($errormessage)==0)
	{	
		
		$db->update('es_ledger', "lg_name ='" . $lg_name . "', lg_groupname ='" . $lg_groupname . "',	lg_openingbalance ='" . $lg_openingbalance . "',lg_amounttype ='" . $lg_amounttype . "'",'es_ledgerid =' . $gid);
		
		$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_ledger','ACCOUNTING','CREATE ACCOUNT LEDGER','".$gid."','LEDGER UPDATED','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);
		
		header("Location:?pid=22&action=ledger&emsg=2");
		exit();
		}
}
	//getting all groups
	$finance_groups = groups_finance();
	
	//Inserting a new Ledger
	$obj_ledger = new es_ledger();
	if (isset($Submit) && $Submit=='Save'){
	       $error	= "";
	    $vlc    = new FormValidation();		
			
		if ($lg_name=="") {
		$errormessage[2]="Enter Ledger Name";	  
		}	
			if ($lg_openingbalance < 0) {
		$errormessage[3]="Enter Valid amount";	  
		}
		$no_rows = $db->getone("SELECT COUNT(*) FROM es_ledger WHERE lg_name = '".$lg_name."'");
		echo $no_rows ;
				if($no_rows>=1){
				$errormessage[4]="Ledger name Already Exists";
				}	
	if(count($errormessage)==0)
	{	  
		
		if (isset($Submit)){
			if (isset($lg_name)){
				$obj_ledger->lg_name = $lg_name;
			}
			
			if (isset($lg_groupname)){
				$obj_ledger->lg_groupname = $lg_groupname;
			}
			if (isset($lg_openingbalance)){
				$obj_ledger->lg_openingbalance = $lg_openingbalance;
			}
			if (isset($lg_amounttype)){
				$obj_ledger->lg_amounttype = $lg_amounttype;
			}
			$obj_ledger->lg_createdon = date('Y-m-d H:i:s');
			
				
	        $ld=$obj_ledger->Save();
			 if (isset($ld) && $ld!=""){
			 
			 
			 $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_ledger','ACCOUNTING','CREATE ACCOUNT LEDGER','".$ld."','LEDGER ADDED','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);
			 
				 $emsg = 1;
				 
				header("Location:?pid=22&action=ledger&emsg=".$emsg);
			 }
	
		}
	}
		
	}
		
		
		//get list of ledgers
		$q_limit  = PAGENATE_LIMIT;
		if ( !isset($start) ){
			$start = 0;
		}	
		$no_rows = count($obj_ledger->GetList(array(array("es_ledgerId", ">", 0)) ));
		
		$orderby_array = array('orb1'=>'es_ledgerid', 'orb2'=>'lg_name', 'orb3'=>'lg_openingbalance');
		
		if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
			$orderby = $orderby_array[$column_name];
		}else{
			$orderby = "es_ledgerid";
		}
		if (isset($asds_order)&&$asds_order=='ASC'){
			$order = true;
		}else{
			$order = false;
		}
		
		$es_ledgerList = $obj_ledger->GetList(array(array("es_ledgerId", ">", 0)) , $orderby, $order,  "$start , $q_limit");
	
	}

if($action== 'printledger'){
	$obj_ledger = new es_ledger();
		$q_limit  = PAGENATE_LIMIT;
		if ( !isset($start) ){
			$start = 0;
		}	
		$no_rows = count($obj_ledger->GetList(array(array("es_ledgerId", ">", 0)) ));
		
		$orderby_array = array('orb1'=>'lg_createdon', 'orb2'=>'lg_createdon', 'orb3'=>'lg_createdon');
		
		if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
			$orderby = $orderby_array[$column_name];
		}else{
			$orderby = "es_ledgerid";
		}
		if (isset($asds_order)&&$asds_order=='ASC'){
			$order = true;
		}else{
			$order = false;
		}
		
		$es_ledgerList = $obj_ledger->GetList(array(array("es_ledgerId", ">", 0)) , $orderby, $order);
}
if($action=='voucher' ){

$obj_ledger = new es_ledger();
$q_limit  = PAGENATE_LIMIT;
		if ( !isset($start) ){
			$start = 0;
		}	
		$no_rows = count($obj_ledger->GetList(array(array("es_ledgerId", ">", 0)) ));
		
		$orderby_array = array('orb1'=>'es_ledgerid', 'orb2'=>'lg_name', 'orb3'=>'lg_openingbalance');
		
		if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
			$orderby = $orderby_array[$column_name];
		}else{
			$orderby = "es_ledgerid";
		}
		if (isset($asds_order)&&$asds_order=='ASC'){
			$order = true;
		}else{
			$order = false;
		}
		
		$es_ledgerList = $obj_ledger->GetList(array(array("es_ledgerId", ">", 0)) , $orderby, $order,  "$start , $q_limit");
}

//get list of voucher	
	if($action=='voucher' )
	{
	
	$obj_voucher = new es_voucher();
	
		$q_limit  = 15;
		if ( !isset($start) ){
			$start = 0;
		}	
		$no_rows = count($obj_voucher->GetList(array(array("es_voucherid", ">", 0)) ));
		
		$orderby_array = array('orb1'=>'es_voucherid');
		
		if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
			$orderby = $orderby_array[$column_name];
		}else{
			$orderby = "es_voucherid";
		}
		if (isset($asds_order)&&$asds_order=='ASC'){
			$order = true;
		}else{
			$order = false;
		}
		
		$es_voucherList = $obj_voucher->GetList(array(array("es_voucherid", ">", 0)) , $orderby, $order,  "$start , $q_limit");
	
	}
	
	//Update list of voucher	
	if($action=='edit_voucher')
	{
		if(isset($submit) && $submit=='submit')
		{
			for($i=0;$i<count($vocturid);$i++)
			{
			//echo $vocturid[$i].$vocturetype[$i].$vocturemode[$i]."<hr>";
			$db->update('es_voucher', "voucher_type ='" . $vocturetype[$i] . "', voucher_mode ='" . $vocturemode[$i] . "'", 'es_voucherid =' . $vocturid[$i]);	
			
			$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_voucher','ACCOUNTING','MANAGE VOUCHER','".$vocturid[$i]."','VOUCHER UPDATED','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
			}
			
			$emsg = 2;
			header('location:?pid=22&action=edit_voucher&emsg='.$emsg);
			exit;
		}
	$obj_voucher = new es_voucher();
	
		$q_limit  = 15;
		if ( !isset($start) ){
			$start = 0;
		}	
		$no_rows = count($obj_voucher->GetList(array(array("es_voucherid", ">", 0)) ));
		
		$orderby_array = array('orb1'=>'es_voucherid');
		
		if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
			$orderby = $orderby_array[$column_name];
		}else{
			$orderby = "es_voucherid";
		}
		if (isset($asds_order)&&$asds_order=='ASC'){
			$order = true;
		}else{
			$order = false;
		}
		
		$es_voucherList = $obj_voucher->GetList(array(array("es_voucherid", ">", 0)) , $orderby, $order,  "$start , $q_limit");
	
  }
		if (isset($back)){
		header('location:?pid=22&action=voucher');
		exit;
	     }

	// Deleting Ledger	
	
	if($action=='deleteledger')
	{
		$obj_delgroup = new es_ledger();
		$obj_delgroup->es_ledgerId = $gid;
		$obj_delgroup->Delete();
		
		 $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_ledger','ACCOUNTING','CREATE ACCOUNT LEDGER','".$gid."','LEDGER DELETED','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);
		$emsg = 3;
		header("Location:?pid=22&action=ledger&emsg=$emsg&start=$start");
		exit;	
	}
	
	



	if (isset($classSubmit)) {
  		header("Location:?pid=20&action=manageclasses");
		exit;  
    }
  
  if (isset($examSubmit)) {
  
		header("Location:?pid=47&action=manageexams");
		exit;  
  
  }
  if (isset($feeSubmit)) {
  	header("Location:?pid=17&action=createfeetypes");
		exit;  
  
  }
/* Updation of Groups */
  if (isset($_POST['groupUpdate_x']) && isset($_POST['groupUpdate_y']) ) {
  		$group = $db->update("es_fa_groups","fa_groupname  = '$finance_group'","es_fa_groupsid = '$fgid'");
		header("Location:?pid=22&action=master_group&emsg=2");
		exit;
  }
		
}	?>