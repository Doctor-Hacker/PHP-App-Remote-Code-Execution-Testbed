<?php
include_once (INCLUDES_CLASS_PATH . DS . 'class.es_preadmission.php');
sm_registerglobal('pid', 'action','update','column_name','start','asds_order','submit','search','Submit','Search','pre_class','pre_year','start','q_limit');

/** $start,$q_limit
* Only Super admin or moderator of the corporate can be allowed to access this page
*/ 
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}


if (!isset($pre_year) || $pre_year=='') {
	   $from_acad    = $_SESSION['eschools']['from_acad'];
	   $to_acad      = $_SESSION['eschools']['to_acad'];
	   $from_finance = $_SESSION['eschools']['from_finance'];
	   $to_finance   = $_SESSION['eschools']['to_finance']; 
	   $selectedyearid = $_SESSION['eschools']['es_finance_masterid'];
	}else{ 
	$pageUrl='&pre_year='.$pre_year;
		 $finance_res  = getarrayassoc("SELECT * FROM `es_finance_master` WHERE `es_finance_masterid`= $pre_year");
		 $from_finance = $finance_res['fi_startdate'];
		 $to_finance   = $finance_res['fi_enddate']; 
		 $from_acad    = $finance_res['fi_ac_startdate'];
		 $to_acad      = $finance_res['fi_ac_enddate'];
		 $selectedyearid = $pre_year;
	} 

?> 




<?php
if ($action=="list_enquiry"){


		$q_limit  = "1";
		if ( !isset($start) ){
			$start = 0;
		}
				//$_SESSION['eschools']['from_acad'] ;
				//$_SESSION['eschools']['to_acad'];
		if ($submit == 'Search' || $submit == 'print') {
		
			
		 $sql="SELECT ad.pre_name ,ad.es_preadmissionid ,cls.es_classname FROM es_preadmission ad,es_preadmission_details adt,es_classes cls 
		 WHERE ad.pre_fromdate='".$_SESSION['eschools']['from_acad']."' 
		 AND  ad.es_preadmissionid=adt.es_preadmissionid 
		 AND ad.pre_class='".$pre_class."' 
		 AND ad.pre_class=cls. es_classesid and 1=(select count(*) from es_preadmission_details adt where adt.es_preadmissionid=ad.es_preadmissionid) order by ad.es_preadmissionid ASC ";
	
	$es_enquiryList =$db->getRows($sql);
			 $no_rows=count($es_enquiryList);
			
			//array_print($es_enquiryList);
			$adminlisturl = "&pre_class=$pre_class";
		
		}
}
?>

<?PHP 
if ($action == "printlist"){


	$sql="SELECT ad.pre_name ,ad.es_preadmissionid ,cls.es_classname from es_preadmission ad,es_preadmission_details adt,es_classes cls where ad.pre_fromdate='".$_SESSION['eschools']['from_acad']."' and  ad.es_preadmissionid=adt.es_preadmissionid and ad.pre_class='".$pre_class."' and ad.pre_class=cls. es_classesid and 1=(select count(*) from es_preadmission_details adt where adt.es_preadmissionid=ad.es_preadmissionid) order by ad.es_preadmissionid ASC  ";
	
	$es_enquiryList =$db->getRows($sql);
			 $no_rows=count($es_enquiryList);
			 
			 $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_preadmission','FRONT OFFICE','MALE FEMALE','".$pre_class."','PRINT MALE FEMALE','".$_SERVER['REMOTE_ADDR']."',NOW())";
					$log_insert_exe=mysql_query($log_insert_sql);
			

}

if($action=='enquiry_students'){
		$q_limit  = 5;
		if ( !isset($start) ){
			$start = 0;
		}
				//$_SESSION['eschools']['from_acad'] ;
				//$_SESSION['eschools']['to_acad'];
		if ($submit == 'Search') {

          $sql="SELECT ad.pre_name ,ad.es_preadmissionid ,cls.es_classname FROM es_preadmission ad,es_preadmission_details adt,es_classes cls ,es_enquiry eq
		 WHERE ad.pre_fromdate='".$_SESSION['eschools']['from_acad']."' 
		 AND  ad.es_preadmissionid=adt.es_preadmissionid 
		 AND  ad.pre_class='".$pre_class."' 
		 AND ad.es_preadmissionid = eq.es_preadmissionid
		 AND ad.pre_class=cls.es_classesid and 1=(select count(*) from es_preadmission_details adt where adt.es_preadmissionid=ad.es_preadmissionid) order by ad.es_preadmissionid ASC  ";
		 $es_enquiryList =$db->getRows($sql);
			 $no_rows=count($es_enquiryList);
			
			//array_print($es_enquiryList);
			$adminlisturl = "&pre_class=$pre_class";
		
		}

}


if ($action == "printlist_enquiry"){


	 $sql="SELECT ad.pre_name ,ad.es_preadmissionid ,cls.es_classname FROM es_preadmission ad,es_preadmission_details adt,es_classes cls ,es_enquiry eq
		 WHERE ad.pre_fromdate='".$_SESSION['eschools']['from_acad']."' 
		 AND  ad.es_preadmissionid=adt.es_preadmissionid 
		 AND  ad.pre_class='".$pre_class."' 
		 AND ad.es_preadmissionid = eq.es_preadmissionid
		 AND ad.pre_class=cls.es_classesid and 1=(select count(*) from es_preadmission_details adt where adt.es_preadmissionid=ad.es_preadmissionid) order by ad.es_preadmissionid ASC  ";
	
	         $es_enquiryList =$db->getRows($sql);
			 $no_rows=count($es_enquiryList);
			 
			/* $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_preadmission','FRONT OFFICE','MALE FEMALE','".$pre_class."','PRINT MALE FEMALE','".$_SERVER['REMOTE_ADDR']."',NOW())";
					$log_insert_exe=mysql_query($log_insert_sql);*/
			

}
?> 

<?php
//cast list
if($action=='cast_list' || $action=='print_cast_list')
{
$caste_array=$db->getRows("SELECT * FROM es_caste ORDER BY caste_id");
$class_array=$db->getRows("SELECT * FROM es_classes ORDER BY es_classesid");
//array_print($cast_array);
$school_details_sel = "SELECT * FROM `es_finance_master` ORDER BY `es_finance_masterid` DESC";
$school_details_res = getamultiassoc($school_details_sel);
}

if($action=='age_wise' || $action=='print_age_wise')
{
$class_array=$db->getRows("SELECT * FROM es_classes ORDER BY es_classesid");
$school_details_sel = "SELECT * FROM `es_finance_master` ORDER BY `es_finance_masterid` DESC";
$school_details_res = getamultiassoc($school_details_sel);
}
?>
