<?php
sm_registerglobal('pid', 'action','action1','update', 'start', 'column_name', 'asds_order', 'uid', 'sid','admin','transport','boardid',
 'reg_search', 'sm_section', 'Search', 'pre_student_username', 'pre_student_password', 'pre_dateofbirth', 'pre_fathername', 'pre_mothername', 'pre_fathersoccupation', 'pre_motheroccupation', 'pre_contactname1', 'pre_contactno1', 'pre_contactno2', 'pre_contactname2', 'pre_address1', 'pre_city1', 'pre_state1', 'pre_country1', 'pre_phno1', 'pre_mobile1', 'pre_prev_acadamicname','pre_prev_class', 'pre_prev_university', 'pre_prev_percentage', 'pre_prev_tcno', 'pre_current_acadamicname', 'pre_current_class1', 'pre_current_percentage1', 'pre_current_result1', 'pre_current_class2', 'pre_current_percentage2', 'pre_current_result2', 'pre_current_class3', 'pre_current_percentage3', 'pre_current_result3', 'pre_physical_details', 'pre_height', 'pre_weight', 'pre_alerge', 'pre_physical_status', 'pre_special_care', 'pre_class', 'pre_sec', 'pre_name', 'pre_age', 'pre_address', 'pre_city', 'pre_state', 'pre_country', 'pre_phno', 'pre_mobile', 'pre_resno', 'pre_resno1', 'pre_image', 'pre_pincode1', 'pre_pincode', 'newpreadmission', 'pre_emailid', 'pre_pincode', 'pre_sec', 'test1', 'test2', 'test3','photo', 'back', 'clid', 'secid', 'pre_todate', 'action2', 'pre_fromdate', 'cl_class', 'cl_section', 'classserch', 'updatestudentid', 'stustatus', 'updatestudents', 'emsg', 'submit','sm_class','regnum','classserch','pre_blood_group','pre_hobbies','pre_gender','print_class','studentserch','ac_year','curnt_year','prev_class','up_class','batch_id','batchid','examstatus','searchclasswise','caste_id','ann_income','scat_id','tr_place_id','document_deposited','admission_date','fee_concession','print_class','searchstudentlist','section','middle_name','pre_lastname','pre_dateofbirth3','pre_dateofbirth2','pre_number');
/**
* Only Admin users can view the pages
*/ 
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
	
	


}

/**End of the permissions    **/
	$allClasses = getallClasses();
$html_obj = new html_form();	
/**
* *********Students Search with respect to class and reg.number**************
*/	
$school_details_sel = "SELECT * FROM `es_finance_master` ORDER BY `es_finance_masterid` DESC";
$school_details_res = getamultiassoc($school_details_sel);
if (!isset($ac_year)) {
	    $from_finance = $_SESSION['eschools']['from_acad'];
	    $to_finance   = $_SESSION['eschools']['to_acad'] ;
	 }else{
		$finance_res   = getarrayassoc("SELECT * FROM `es_finance_master` WHERE `es_finance_masterid`= $ac_year");
		  $from_finance = $finance_res['fi_ac_startdate'];
		 $to_finance   = $finance_res['fi_ac_enddate'];
} 
if(isset($action) && $action == "exportreport"){

$q_limit  = 2000;
if ( !isset($start) ){
	$start = 0;
   }
   $query_log_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) 
   VALUES ('".$_SESSION['eschools']['admin_id']."','','Transport','Student Wise Report','','EXPORT REPORT','".$_SERVER['REMOTE_ADDR']."',NOW())";
   mysql_query($query_log_sql);
   $condition='';
   if($es_classesid!=""){
			$condition .= " AND P.pre_class='".$es_classesid."'";
			}
   
   	$finance_res   = getarrayassoc("SELECT * FROM `es_finance_master` ORDER BY es_finance_masterid  DESC LIMIT 1");
		  $from_ac_finance = $finance_res['fi_ac_startdate'];
		 $to_ac_finance   = $finance_res['fi_ac_enddate'];
		 
		 
if($section!='')
{
	$condition = "AND s.section_id = '".$section."'";
}

		
   $data=
   '"ACADEMIC YEAR"'."\t".displayDate($from_ac_finance).' To '.displayDate($to_ac_finance)."\n".
   '"CLASS"'."\t".classname($sm_class)."\n".
		'"ROLL NO"'."\t".
		'"SECTION"'."\t".
		'"REG.NO"'."\t".
		'"NAME"'."\t".
		'"FATHER NAME"'."\t".
		'"MOTHER NAME"'."\t".
		'"MOBILE NO"'."\n";

		
   $sql= "SELECT * FROM `es_preadmission` a
 		LEFT JOIN es_sections_student s
		ON a.es_preadmissionid = s.student_id
        WHERE a.pre_class = '".$sm_class."' 
		AND a.pre_fromdate =  '".$from_ac_finance."' 
		AND  a.pre_todate = '".$to_ac_finance."' ".$condition."   ";
		
		
	// $sql= "SELECT * FROM `es_preadmission` WHERE `pre_class` = '".$sm_class."' AND `pre_fromdate` =  '".$from_ac_finance."' AND  `pre_todate` = '".$to_ac_finance."'    ";

		
		$entry_sql=$sql;
		$details = $db->getRows($entry_sql);
		
		
		

		if(count($details)>0 ){
		foreach ($details as $row) { 
/*		 $query2="SELECT * FROM es_sections_student WHERE student_id = '". $row['es_preadmissionid']."' ";
					$result2=mysql_query($query2);
					$row2=mysql_fetch_array($result2);*/
					
/*		 $get_sec= "SELECT * FROM `es_sections_student` WHERE student_id = '".$section."' ";
		  $res_sec=mysql_query($get_sec);
		  $row_sec=mysql_fetch_array($res_sec);
		  $get_rollno=$row_sec['roll_no'];
		   $get_sec=$row_sec['section_student_id'];*/
		   
		   $get_sec1= "SELECT * FROM `es_sections` WHERE section_id = '".$row['section_id']."'";
		  $res_sec1=mysql_query($get_sec1);
		  $row_sec1=mysql_fetch_array($res_sec1);
		   $get_sec1=$row_sec1['section_name'];
		   
		   
			
			
		$line = '';
			
				$value = str_replace('"', '""', $row['roll_no']);
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
				
				$value = str_replace('"', '""', $get_sec1);
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
				
				
				$value = str_replace('"', '""', $row['es_preadmissionid']);
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
				
				$value = str_replace('"', '""', $row['pre_name']);
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
				
				                   
				
				$value = str_replace('"', '""', $row['pre_fathername']);
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
				
				$value = str_replace('"', '""', $row['pre_mothername']);
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
				
				$value = str_replace('"', '""', $row['pre_mobile1']);
				$htmlreplace = array("<br>", "<hr>", "<b>", "</b>");
				$value = str_replace($htmlreplace, "", $value);				
				$xlval = '"' . $value	 . '"' . "\t";
				$line .= $xlval;
				

			$data .= trim($line). "\n";
		}
		$data = str_replace("\r", "", $data);
		if ($data =="") {
			$data ="\n(0) Records Found!\n";
		}
		
		//header("Content-type: application/x-msdownload");
		header("Content-type: application/vnd.ms-excel");
		header('Content-Disposition: attachment; filename="studentwisereport.xls"');
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$data";
		exit;
		
   
$driver_sql = $sql." LIMIT ".$start." , ".$q_limit;

$driver_row =$db->getRows($driver_sql);

$driver1_sql = $sql;
$driver1_exe = mysql_query($driver1_sql);
$driver1_num = mysql_num_rows($driver1_exe);
}
else{
header('location: ?pid=88&action=studentreport');
}
}if ($action =='serchclass' ){
		 $q_limit  = 25;
		 $orderby   = "es_preadmissionid"; 
		 if (!isset($start)){	
			 	$start = 0;								
		 }
		 $condition = "";
		 if(isset($examstatus) && $examstatus!=""){
		  if($examstatus!='newadmission' && $examstatus!='promoted'){
		  		 $condition = " AND admdetail.status='".$examstatus."'";
				  }else{
						$condition = " AND admdetail.admission_status='".$examstatus."'";
				  }
		 }
		 if(isset($sm_section) && $sm_section!=""){
		  	$condition .=" AND admdetail.es_preadmissionid = '".$sm_section."'";
		  
		  }	
		 /* $query="select * from es_preadmission";
		  $result=mysql_query($query);
		  $ret=mysql_fetch_array($result);
		  $studid=$result['pre_hobbies'].$result['pre_hobbies1'].$result['pre_hobbies2'];*/
		$sel_student_record = "SELECT admdetail.pre_class,
								admdetail.status as admdetailstatus,
								admdetail.admission_status as det_adm_status,
								admin.es_preadmissionid,
								admin.pre_student_username,
								admin.pre_student_password,
								admin.pre_name,
								admin.pre_fromdate,
								admin.pre_fathername,
								admin.pre_dateofbirth,
								admin.status as preadminstatus,
								admin.pre_image FROM es_preadmission_details admdetail ,
								es_preadmission admin WHERE admdetail.pre_class = '".$sm_class."'
								AND admin.es_preadmissionid = admdetail.es_preadmissionid 
								AND admdetail.pre_todate ='".$to_finance."' AND admdetail.pre_fromdate ='".$from_finance."'".$condition."";
		  	 
		/*>> admdetail.pre_class = '".$sm_class."'AND  admdetail.pre_class = '".$sm_class."'AND    
		
		//pre_hobbies='".$sm_section."' AND pre_hobbies='".$sm_section."' AND pre_hobbies='".$sm_section."'*/
		 	 $no_rows = sqlnumber($sel_student_record);
			$sel_student_record .= " ORDER BY admdetail.es_preadmissionid   LIMIT $start , $q_limit"; 
	    
		$es_studentList = getamultiassoc($sel_student_record);
		 
		 $searchurl="&sm_class=$sm_class&sm_section=$sm_section&ac_year=$ac_year&start=$start&q_limit=$q_limit&examstatus=$examstatus";
		  	 
		    if (count($es_studentList) == 0){
				
					$nill1="No records found" ;
			}	

}
/**
* *********For print Students Search with respect to class and reg.number**************
*/	
if ($action =='printsearchclass'){
		 $searchurl="&sm_class=$sm_class&sm_section=$sm_section&ac_year=$ac_year&start=$start&q_limit=$q_limit&examstatus=$examstatus";
	 	
				     	   	
		 $q_limit  = 6;
		 $orderby   = "es_preadmissionid"; 
		 if (!isset($start)){	
			 	$start = 0;								
		 }		 
		 
		 if (isset($sm_section) && $sm_section!="") {
		 	$sel_student_record = "SELECT admdetail.pre_class,
								admdetail.status as admdetailstatus,
								admin.es_preadmissionid,
								admin.pre_student_username,
								admin.pre_student_password,
								admin.pre_name,
								admin.pre_fathername,
								admin.pre_dateofbirth,
								admin.status as preadminstatus,
								admin.pre_image FROM es_preadmission_details admdetail ,
								es_preadmission admin WHERE admdetail.es_preadmissionid  = '".$sm_section."' AND admdetail.pre_class = '".$sm_class."'
								AND admin.es_preadmissionid = admdetail.es_preadmissionid 
								AND admdetail.pre_todate = '".$to_finance."' AND  admdetail.pre_fromdate = '".$from_finance."' LIMIT $start , $q_limit";

		 $es_studentList = getamultiassoc($sel_student_record);
		
			
		 } else {
		 	
		 $sel_student_record = "SELECT admdetail.pre_class,
								admdetail.status as admdetailstatus,
								admin.es_preadmissionid,
								admin.pre_student_username,
								admin.pre_student_password,
								admin.pre_name,
								admin.pre_fathername,
								admin.pre_dateofbirth,
								admin.status as preadminstatus,
								admin.pre_image FROM es_preadmission_details admdetail ,
								es_preadmission admin WHERE  admdetail.pre_class = '".$sm_class."'
								AND admin.es_preadmissionid = admdetail.es_preadmissionid 
								AND admdetail.pre_todate = '".$to_finance."' AND  admdetail.pre_fromdate = '".$from_finance."' LIMIT $start , $q_limit";
				 			 			 							  
			$es_studentList = getamultiassoc($sel_student_record);	
			 		 		 	
		 }	
		 $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_preadmission','STUDENT','SEARCH STUDENT RECORD','','PRINT STUDENTS','".$_SERVER['REMOTE_ADDR']."',NOW())";
		$log_insert_exe=mysql_query($log_insert_sql);
	
			if (count($es_studentList) == 0){
				
					$nill1="No records found" ;
			}	
	
}

/**
* ******************End of Print Student*********************************
*/

/**
* *************Edit Student*************************************************
*/
	
	
	
if (($action == 'editstudent') && $back == ""){	


    $eachrecord1 = $db->getrow("SELECT * FROM es_preadmission WHERE es_preadmissionid=".$sid);
	$pre_admin_details=$db->getRow("SELECT * FROM es_preadmission_details WHERE es_preadmissionid=".$sid." order by es_preadmission_detailsid Asc LIMIT 0,1");
	
	
	

	
	if (isset($update)){
	
	$vlc = new FormValidation();
	if (empty($pre_name)) {
				$errormessage[0] = "Enter Name";	  
			}
			
	if (empty($pre_fathername)) {
			
				$errormessage[1] = "Enter Fathers Name";	  
			}
			
	if (empty($pre_address1)) {
			
				$errormessage[2] = "Enter Address"; 
			}
	if (!$vlc->is_nonNegNumber($pre_mobile1)) {
			
				$errormessage[3] = "Enter Mobile No"; 
			}elseif(strlen($pre_mobile1)!=10 ){
			    $errormessage[3] = "Enter Valid Mobile No";
			
			}
	if (!$vlc->is_alpha_numeric($pre_contactno1)) {
			
				$errormessage[4] = "Enter Contact No "; 	 
			}
			//if (empty($scat_id)) {
//			
//				$errormessage[13] = "Select Subjects"; 
//			}	
		/*	if (empty($batchid)) {
			
				$errormessage[5] = "Select Batch"; 
			}*/
			
			//$query="SELECT fee_amount  FROM es_feemaster WHERE fee_particular='tuition' AND fee_class='".$pre_class."' ";
//  $res=$db->getrow($query);
// $count=sqlnumber($query);
// $tuitionfee=$res['fee_amount'];
			
					
			//if (!empty($fee_concession)) {	
//			if($count>0){	
//				if(!$vlc->is_nonNegNumber($fee_concession))	
//				{
//					$errormessage[14] = "Enter valid tuition fee"; 	 
//				}
//			elseif ($fee_concession>$tuitionfee) 	
//				{
//					$errormessage[15] = "Tuition fee must not be greater than the total tuition fee"; 
//				
//				}
//			}
//			else
//		{
//			$errormessage[16] = "No tuition has been added for the this class"; 
//		}
		//}
		
		
			
			
			if(empty($pre_class)){}	
	
	if(count($errormessage) == 0){
		$transferfile = "images/student_photos/";
		
		$transferfile = $transferfile.basename($_FILES["pre_image"]["name"]);
		
		$file = basename($_FILES["pre_image"]["name"]);
		
		if ($_FILES["pre_image"]["name"]!=""){
		
			if ($_FILES["pre_image"]["error"] > 0){}
			
			$pre_image = $_FILES['pre_image']['name'];
			
			if (is_uploaded_file($_FILES['pre_image']['tmp_name'])) {	
			
				$ext = explode(".",$_FILES['pre_image']['name']);
				
				$str = date("mdY_hms");
				
				$new_thumbname = "st_".$str."_".$ext[0].".".$ext[1];
				
				$updir = "images/student_photos/";
				
				$uppath = $updir.$new_thumbname;
				
				move_uploaded_file($_FILES['pre_image']['tmp_name'],$uppath);
				
				$file = $new_thumbname;
			} 
			}else { 
			
			$file = $photo;
			 }
		 
 	$pre_fromdate    = formatDateCalender($pre_fromdate,"Y-m-d");
		
	$pre_todate      = formatDateCalender($pre_todate,"Y-m-d");	
	
	$pre_dateofbirth = formatDateCalender($pre_dateofbirth,"Y-m-d");
	
	$db->update('es_preadmission',
			"pre_student_username  ='" . $pre_student_username . "', 
			pre_dateofbirth2        ='" . $pre_dateofbirth2 . "', 
			pre_dateofbirth3        ='" . $pre_dateofbirth3 . "', 
			pre_fathername         ='" . $pre_fathername . "',
			middle_name            ='" . $middle_name . "',
			pre_mothername         ='" . $pre_mothername . "',
			pre_fathersoccupation  ='" . $pre_fathersoccupation. "',
			pre_motheroccupation   ='" . $pre_motheroccupation . "',
			pre_contactname1       ='" . $pre_contactname1 . "',
			pre_contactno1         ='" . $pre_contactno1 . "',
			pre_contactno2         ='" . $pre_contactno2 . "',
			pre_contactname2       ='" . $pre_contactname2 . "',
			pre_address1           ='" . $pre_address1 . "',
			pre_city1              ='" . $pre_city1 . "',
			pre_state1             ='" . $pre_state1 . "',
			pre_country1           ='" . $pre_country1 . "',
			pre_phno1              ='" . $pre_phno1. "',
			pre_mobile1            ='" . $pre_mobile1 . "',
			pre_prev_acadamicname  ='" . $pre_prev_acadamicname . "',
			pre_prev_class         ='" . $pre_prev_class . "',
			pre_prev_university    ='" . $pre_prev_university . "',
			pre_prev_percentage    ='" . $pre_prev_percentage . "',
			pre_prev_tcno          ='" . $pre_prev_tcno . "',
			pre_current_acadamicname='" . $pre_current_acadamicname . "',
			pre_current_class1      ='" . $pre_current_class1 . "',
			pre_current_percentage1 ='" . $pre_current_percentage1 . "',
			pre_current_result1     ='" . $pre_current_result1 . "',
			pre_current_class2      ='" . $pre_current_class2 . "',
			pre_current_percentage2 ='" . $pre_current_percentage2 . "',
			pre_current_result2     ='" . $pre_current_result2 . "',
			pre_current_class3      ='" . $pre_current_class3 . "',
			pre_current_percentage3 ='" . $pre_current_percentage3. "',
			pre_current_result3     ='" . $pre_current_result3 . "',
			pre_physical_details    ='" . $pre_physical_details . "',
			pre_height              ='" . $pre_height . "',
			pre_weight              ='" . $pre_weight . "',
			pre_alerge              ='" . $pre_alerge . "',
			pre_physical_status     ='" . $pre_physical_status . "',
			pre_special_care        ='" . $pre_special_care. "',
			pre_class               ='" . $pre_class . "',
			pre_sec                 ='" . $pre_sec . "',
			pre_name                ='" . $pre_name . "',
			pre_age                 ='" . $pre_age . "',
			pre_address             ='" . $pre_address . "',
			pre_city                ='" . $pre_city . "',
			pre_state               ='" . $pre_state . "',
			pre_country             ='" . $pre_country . "',
			pre_phno                ='" . $pre_phno . "',
			pre_mobile              ='" . $pre_mobile . "',
			pre_resno               ='" . $pre_resno . "',
			pre_resno1              ='" . $pre_resno1 . "',
			pre_image               ='" . $file . "',
			pre_pincode1            ='" . $pre_pincode1 . "',
			pre_pincode             ='" . $pre_pincode . "',
			test3            		='" . $test3 . "',
			test2            		='" . $test2 . "',
			test1           		='" . $test1 . "',
			pre_todate              ='" . $pre_todate . "',
			pre_fromdate            ='" . $pre_fromdate ."',
			pre_blood_group         ='" . $pre_blood_group ."',
			pre_hobbies             ='" . $pre_hobbies ."',
			pre_gender              ='" . $pre_gender ."',
			pre_emailid             ='" . $pre_emailid . "',
			caste_id                ='" . $caste_id . "',
			ann_income              ='" . $ann_income . "',
			tr_place_id             ='" . $tr_place_id . "',
			document_deposited      ='" . $document_deposited. "',
			fee_concession          ='".$fee_concession."',  
			es_program              ='" . $es_program."',
			es_branch 	            ='" . $es_branch. "',
			es_admitted             ='" . $es_admitted . "',
			es_rcat 	            ='" . $es_rcat. "',
			es_phandcaped 	        ='" . $es_phandcaped. "',
			es_econbackward         ='" . $es_econbackward. "',
			es_home                 ='".$es_home."', 
			pre_hobbies1 	        ='" . $pre_hobbies1 	 . "',
			pre_hobbies2 	        ='" . $pre_hobbies2. "',
			pre_building            ='".$pre_building."', 
			pre_lastname            ='".$pre_lastname."',
			pre_room                ='".$pre_room."', 
			pre_number                ='".$pre_number."', 
			
			admission_date          ='" . func_date_conversion("d/m/Y","Y-m-d",$admission_date) . "'",
			'es_preadmissionid =' . $sid);	
			$sql_det = "UPDATE es_preadmission_details SET scat_id='".$scat_id."' WHERE  pre_fromdate='".$pre_fromdate."' AND es_preadmissionid=".$sid; 
			mysql_query($sql_det);
			//$db->update("es_preadmission_details","scat_id='".$scat_id."'","es_preadmission_detailsid=" . $pre_admin_details['es_preadmission_detailsid']);
									
							/*"caste_id"=>$caste_id,
							"ann_income"=>$ann_income,
							"tr_place_id"=>$tr_place_id,
							"document_deposited"=>$document_deposited,
							"admission_date"=>func_date_conversion("d/m/Y","Y-m-d",$admission_date)*/
		$emsg = 2;
		$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_preadmission','STUDENT','SEARCH STUDENT RECORD','".$sid."','EDIT PRE ADMISSION','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
		 $log_insert_exe=mysql_query($log_insert_sql);
		
		
		
		
		
	
			 if(isset($transport)){	
			 
		
			 
			 if($transport=='YES')
			 {
			 	$status='Active';
			 }
			 else
			 {
			 	$status='Inactive';
			 
			 }

			
				  $check_sql="SELECT * FROM es_trans_board_allocation_to_student WHERE student_staff_id=".$sid." AND type='student' ORDER BY id DESC LIMIT 0,1";
				  $std_allocation_det =  $db->getrow($check_sql);
				  $std_allocation_rec = sqlnumber($check_sql);
				  if($std_allocation_rec==0 || $std_allocation_det['status']=='Inactive'){
				  		$insert_sql="INSERT INTO es_trans_board_allocation_to_student (board_id,`student_staff_id`,`status`,`type`,`created_on`) 
					  VALUES('".$boardid."','".$sid."','Active','student',NOW())";
					  mysql_query($insert_sql);
				  }	 
			 
			 else{
			 
				
					$update_sql="UPDATE es_trans_board_allocation_to_student SET `status`='".$status."' , board_id='".$boardid."' ,  deallocated ='".date("Y-m-d")."'  WHERE type='student' AND  student_staff_id=".$sid;
				 mysql_query($update_sql);			 
			 }
			 
		 }
		 else
		 {
		 
		 
		 	 $update_sql="UPDATE es_trans_board_allocation_to_student SET `status`='Inactive' ,   deallocated ='".date("Y-m-d")."'  WHERE type='student' AND  student_staff_id=".$sid;
			
			 mysql_query($update_sql);
		 }
		 
		 
		header('Location: ?pid=21&action=editstudent&action=serchclass&emsg=' . $emsg);
		}
	}
}
if (isset($back)){
	
	$q_limit  = 10;
	if ( !isset($start)) $start = 0;
	header('location: ?pid=21&action=serchclass&action1=back&sid='.$sid.'&sm_class='.$clid.'&sm_section='.$secid);	   
}
/**
* ***************************End of Student Editing****************************
*/
/*

/*
* displaying the student records and searched student record for the promotion to next class
*/
if (($action=='classserch')|| (isset($classserch)&&$classserch=="Search")){
if (empty($sm_class)) {
		$errormessage[1]="Please Select Class";	  
		}
		if (empty($regnum)) {
		$errormessage[2]="Please Enter Registration Number";	  
		}
		if($errormessage==0){
	
	$student_sql = "SELECT * FROM es_preadmission WHERE pre_class='".$sm_class."' AND status!='inactive' AND es_preadmissionid='".$regnum."'";
	$es_studentList = $db->getrows($student_sql);
	
	
}}


/*
* *************Student updating******************************************
*/
$studentUrl = "&sid=$sid&clid=$clid";	

  if (isset($updatestudents) && $updatestudents == 'Submit'){
		
		
		for ($j = 0; $j<count($updatestudentid); $j++) {
			
			$session_year    = $_SESSION['eschools']['es_finance_masterid'];
			$acc_year        = substr($ac_year[$j],0,1);
	 	 	$pre_ac_fromdate = substr($ac_year[$j],1,-10);
			$pre_ac_todate   = substr($ac_year[$j],-10);
			
			$student_acyear_id = $db->getone("SELECT fin.es_finance_masterid FROM es_preadmission pre , es_finance_master fin WHERE pre.es_preadmissionid = ".$updatestudentid[$j]." AND pre.pre_fromdate = fin.fi_ac_startdate " );
			
			$studentUrl = "&sid=$sid&clid=$clid";
			
				if ($stustatus[$j] =="pass") {
					
					if($up_class[$j] < $sm_class || $_SESSION['eschools']['es_finance_masterid'] <= $student_acyear_id ){
					   $errormessage = "Invalid Class";	
					   header('location: ?pid=21&action=classrecards&emsg=25');
					   exit;
					 }
			   }
			   elseif ($stustatus[$j] =="fail") {		     
			     
		   		    if($up_class[$j] != $sm_class ||  $_SESSION['eschools']['es_finance_masterid'] <= $student_acyear_id  ){
				       $errormessage  = "Invalid Class";
				       header('location: ?pid=21&action=classrecards&emsg=25');
				       exit;
				 }
		      }elseif ($stustatus[$j] =="resultawaiting" ||$stustatus[$j] =="inactive" ){
			  
		   		   if($up_class[$j] != $sm_class || $session_year > $acc_year[$j] ){
					  $errormessage  = "Invalid Class";
				      header('location: ?pid=21&action=classrecards&emsg=25');
				      exit;
				 }
		 }
			
				if ($errormessage == "" ||empty($errormessage) ){
				
					$update_pre_details = mysql_query("UPDATE es_preadmission_details SET status = '".$stustatus[$j]."'  WHERE es_preadmissionid = '".$updatestudentid[$j]. "' AND  pre_class = '".$sm_class."' ");
					
					$update_student = mysql_query("UPDATE es_preadmission SET status = '".$stustatus[$j]."', pre_fromdate  = '" . $pre_ac_fromdate . "',  pre_todate    = '" . $pre_ac_todate . "',pre_class = '" . $up_class[$j] . "', admission_status ='promoted'  WHERE es_preadmissionid = '".$updatestudentid[$j]. "' ");
					
					if($stustatus[$j] =="inactive"){
					$allocation_student = mysql_query("UPDATE es_trans_board_allocation_to_student SET status = 'Inactive' WHERE student_staff_id = '".$updatestudentid[$j]. "'");
					}
					
					if($stustatus[$j] =="pass" || $stustatus[$j] =="fail" ){
					$insert_details = mysql_query("INSERT INTO  es_preadmission_details(pre_fromdate,pre_todate,pre_class,es_preadmissionid,status,admission_status) VALUES('".$pre_ac_fromdate."','".$pre_ac_todate."','".$up_class[$j]."','".$updatestudentid[$j]."','','promoted')");
					}
					
					$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_preadmission','STUDENT','UPDATE STUDENT RECORD','".$updatestudentid[$j]."','UPDATE STUDENT','".$_SERVER['REMOTE_ADDR']."',NOW())";
		$log_insert_exe=mysql_query($log_insert_sql);	
						
						if($stustatus[$j] =="pass"){	
						
					$studetails_mobile = $db->getRow("SELECT * FROM `es_preadmission` WHERE `es_preadmissionid` =".$updatestudentid[$j]);
					
					if($studetails_mobile['pre_mobile1']!="" && function_exists('curl_init')){
					
																		 
									   $url = "http://www.smsprovider.co.in/messageapi.asp?username=".MOBILE_USERNAME."&password=".MOBILE_PASSWORD."&sender=".MOBILE_SENDER_ID."&mobile=".$studetails_mobile['pre_mobile1']."&message=Congratulations!!!%20You%20are%20Promoted%20to%20the%20next%20academic%20year-eCAMPUS";
									 
									$curl = curl_init();
									curl_setopt ($curl, CURLOPT_URL, $url);
									curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1);
									$request_result = curl_exec ($curl);
									$request_result;
									curl_close ($curl);
						 }
						}
					header('location: ?pid=21&action=classrecards&emsg=2');
					exit;
				 
				}
         } 
	 
	 
	
  }

/*
* *****************End of Student Updating*********************************
*/

if ($action =='printstudent'){	
	$eachrecord1 = $db->getrow("SELECT * FROM es_preadmission WHERE es_preadmissionid='".$sid."'");
	
}
?>

<?php if(isset($searchclasswise) && $searchclasswise!=""){
// preadmition
if($ac_year<=0){$errormessage[]="Select Academic Year";}

if(count($errormessage)==0){
if($sm_class=="all"){
$condition="";
}else{
$condition=" where CLS.es_classesid=".$sm_class;
}
if($ac_year==$_SESSION['eschools']['es_finance_masterid']){
$sql= "select CLS.es_classname,(select  count(*) from es_preadmission where pre_gender='male' and pre_class=CLS.es_classesid and status!='inactive' and pre_fromdate='".$from_finance."' and pre_todate='".$to_finance."') as maletotal ,(select  count(*) from es_preadmission where pre_gender='female' and pre_class= CLS.es_classesid and status!='inactive' and pre_fromdate='".$from_finance."' and pre_todate='".$to_finance."') as femaletotal from es_classes CLS ".$condition;

}else{
// preadmintion details
 $sql= "select CLS.es_classname,(select  count(*) from es_preadmission PA ,es_preadmission_details PDA where PA.pre_gender='male' and PDA.pre_class= CLS.es_classesid and PA.es_preadmissionid=PDA.es_preadmissionid and PDA.status!='inactive' and PDA.pre_fromdate='".$from_finance."' and PDA.pre_todate='".$to_finance."') as maletotal ,(select  count(*) from es_preadmission PA ,es_preadmission_details PDA where PA.pre_gender='female' and PDA.pre_class= CLS.es_classesid and PA.es_preadmissionid=PDA.es_preadmissionid and PDA.status!='inactive' and PDA.pre_fromdate='".$from_finance."' and PDA.pre_todate='".$to_finance."') as femaletotal from es_classes CLS ".$condition;
}  
$result_details=$db->getRows($sql);
}
}

?>




<?php 
if(isset($_POST['searchstudentlist']) && $_POST['searchstudentlist']!=""){
$vlc = new FormValidation();

if($sm_class=='all'){$errormessage[0]="Select Class";}


if(count($errormessage)==0){

/*          $page_URL = "&search_staff=Search";
		  $condition = '';
   		if($es_classesid!=""){
			$condition .= " AND P.pre_class='".$es_classesid."'";
			$page_URL .= "&es_classesid=$es_classesid";
		}
		
		if($es_classesid!=""){
			$condition .= " AND P.pre_class='".$es_classesid."'";
			$page_URL .= "&es_classesid=$es_classesid";
		}*/
		

	$finance_res   = getarrayassoc("SELECT * FROM `es_finance_master` ORDER BY es_finance_masterid  DESC LIMIT 1");
		  $from_ac_finance = $finance_res['fi_ac_startdate'];
		 $to_ac_finance   = $finance_res['fi_ac_enddate'];
		 
if($section!='')
{
	$condition = "AND s.section_id = '".$section."'";
}

 $sql= "SELECT * FROM `es_preadmission` a
 		LEFT JOIN es_sections_student s
		ON a.es_preadmissionid = s.student_id
        WHERE a.pre_class = '".$sm_class."' 
		AND a.pre_fromdate =  '".$from_ac_finance."' 
		AND  a.pre_todate = '".$to_ac_finance."' ".$condition."   ";

 /* $sql2= "SELECT * FROM `es_preadmission` WHERE `pre_class` = '".$sm_class."' AND `pre_fromdate` =  '".$from_ac_finance."' AND  `pre_todate` = '".$to_ac_finance."'    ";
  */
  $result_details=$db->getRows($sql);

}
}
?>


	<?php 
	$studentUrl = "&sid=$sid&clid=$clid";
	
if (($action == 'viewprofile') && $back == ""){	


    $eachrecord1 = $db->getrow("SELECT * FROM es_preadmission WHERE es_preadmissionid=".$sid);
	$pre_admin_details=$db->getRow("SELECT * FROM es_preadmission_details WHERE es_preadmissionid=".$sid." order by es_preadmission_detailsid Asc LIMIT 0,1");
	
	
	
	$studentUrl = "&sid=$sid&clid=$clid";
	
	if (isset($update)){
	
	$vlc = new FormValidation();
	if (empty($pre_name)) {
				$errormessage[0] = "Enter Name";	  
			}
			
	if (empty($pre_fathername)) {
			
				$errormessage[1] = "Enter Fathers Name";	  
			}
			
	if (empty($pre_address1)) {
			
				$errormessage[2] = "Enter Address"; 
			}
	if (!$vlc->is_nonNegNumber($pre_mobile1)) {
			
				$errormessage[3] = "Enter Mobile No"; 
			}elseif(strlen($pre_mobile1)!=10 ){
			    $errormessage[3] = "Enter Valid Mobile No";
			
			}
	if (!$vlc->is_alpha_numeric($pre_contactno1)) {
			
				$errormessage[4] = "Enter Contact No "; 	 
			}
			if (empty($scat_id)) {
			
				$errormessage[13] = "Select Subjects"; 
			}	
		/*	if (empty($batchid)) {
			
				$errormessage[5] = "Select Batch"; 
			}*/
			
			$query="SELECT fee_amount  FROM es_feemaster WHERE fee_particular='tuition' AND fee_class='".$pre_class."' ";
  $res=$db->getrow($query);
 $count=sqlnumber($query);
 $tuitionfee=$res['fee_amount'];
			
					
			if (!empty($fee_concession)) {	
			if($count>0){	
				if(!$vlc->is_nonNegNumber($fee_concession))	
				{
					$errormessage[14] = "Enter valid tuition fee"; 	 
				}
			elseif ($fee_concession>$tuitionfee) 	
				{
					$errormessage[15] = "Tuition fee must not be greater than the total tuition fee"; 
				
				}
			}
			else
		{
			$errormessage[16] = "No tuition has been added for the this class"; 
		}
		}
		
		
			
			
			if(empty($pre_class)){}	
	
	if(count($errormessage) == 0){
		$transferfile = "images/student_photos/";
		
		$transferfile = $transferfile.basename($_FILES["pre_image"]["name"]);
		
		$file = basename($_FILES["pre_image"]["name"]);
		
		if ($_FILES["pre_image"]["name"]!=""){
		
			if ($_FILES["pre_image"]["error"] > 0){}
			
			$pre_image = $_FILES['pre_image']['name'];
			
			if (is_uploaded_file($_FILES['pre_image']['tmp_name'])) {	
			
				$ext = explode(".",$_FILES['pre_image']['name']);
				
				$str = date("mdY_hms");
				
				$new_thumbname = "st_".$str."_".$ext[0].".".$ext[1];
				
				$updir = "images/student_photos/";
				
				$uppath = $updir.$new_thumbname;
				
				move_uploaded_file($_FILES['pre_image']['tmp_name'],$uppath);
				
				$file = $new_thumbname;
			} 
			}else { 
			
			$file = $photo;
			 }
		 
 	$pre_fromdate    = formatDateCalender($pre_fromdate,"Y-m-d");
		
	$pre_todate      = formatDateCalender($pre_todate,"Y-m-d");	
	
	$pre_dateofbirth = formatDateCalender($pre_dateofbirth,"Y-m-d");
	
	$db->update('es_preadmission',
			"pre_student_username  ='" . $pre_student_username . "', 
			
			pre_dateofbirth        ='" . $pre_dateofbirth . "', 
			pre_fathername         ='" . $pre_fathername . "',  
			middle_name            ='" . $middle_name . "',
			pre_mothername         ='" . $pre_mothername . "',
			pre_fathersoccupation  ='" . $pre_fathersoccupation. "',
			pre_motheroccupation   ='" . $pre_motheroccupation . "',
			pre_contactname1       ='" . $pre_contactname1 . "',
			pre_contactno1         ='" . $pre_contactno1 . "',
			pre_contactno2         ='" . $pre_contactno2 . "',
			pre_contactname2       ='" . $pre_contactname2 . "',
			pre_address1           ='" . $pre_address1 . "',
			pre_city1              ='" . $pre_city1 . "',
			pre_state1             ='" . $pre_state1 . "',
			pre_country1           ='" . $pre_country1 . "',
			pre_phno1              ='" . $pre_phno1. "',
			pre_mobile1            ='" . $pre_mobile1 . "',
			pre_prev_acadamicname  ='" . $pre_prev_acadamicname . "',
			pre_prev_class         ='" . $pre_prev_class . "',
			pre_prev_university    ='" . $pre_prev_university . "',
			pre_prev_percentage    ='" . $pre_prev_percentage . "',
			pre_prev_tcno          ='" . $pre_prev_tcno . "',
			pre_current_acadamicname='" . $pre_current_acadamicname . "',
			pre_current_class1      ='" . $pre_current_class1 . "',
			pre_current_percentage1 ='" . $pre_current_percentage1 . "',
			pre_current_result1     ='" . $pre_current_result1 . "',
			pre_current_class2      ='" . $pre_current_class2 . "',
			pre_current_percentage2 ='" . $pre_current_percentage2 . "',
			pre_current_result2     ='" . $pre_current_result2 . "',
			pre_current_class3      ='" . $pre_current_class3 . "',
			pre_current_percentage3 ='" . $pre_current_percentage3. "',
			pre_current_result3     ='" . $pre_current_result3 . "',
			pre_physical_details    ='" . $pre_physical_details . "',
			pre_height              ='" . $pre_height . "',
			pre_weight              ='" . $pre_weight . "',
			pre_alerge              ='" . $pre_alerge . "',
			pre_physical_status     ='" . $pre_physical_status . "',
			pre_special_care        ='" . $pre_special_care. "',
			pre_class               ='" . $pre_class . "',
			pre_sec                 ='" . $pre_sec . "',
			pre_name                ='" . $pre_name . "',
			pre_age                 ='" . $pre_age . "',
			pre_address             ='" . $pre_address . "',
			pre_city                ='" . $pre_city . "',
			pre_state               ='" . $pre_state . "',
			pre_country             ='" . $pre_country . "',
			pre_phno                ='" . $pre_phno . "',
			pre_mobile              ='" . $pre_mobile . "',
			pre_resno               ='" . $pre_resno . "',
			pre_resno1              ='" . $pre_resno1 . "',
			pre_image               ='" . $file . "',
			pre_pincode1            ='" . $pre_pincode1 . "',
			pre_pincode             ='" . $pre_pincode . "',
			test2            		='" . $test2 . "',
			test1           		='" . $test1 . "',
			pre_todate              ='" . $pre_todate . "',
			pre_fromdate            ='" . $pre_fromdate ."',
			pre_blood_group         ='" . $pre_blood_group ."',
			pre_hobbies             ='" . $pre_hobbies ."',
			pre_gender              ='" . $pre_gender ."',
			pre_emailid             ='" . $pre_emailid . "',
			caste_id                ='" . $caste_id . "',
			ann_income              ='" . $ann_income . "',
			tr_place_id             ='" . $tr_place_id . "',
			document_deposited      ='" . $document_deposited . "',
			fee_concession          ='".$fee_concession."',  
			admission_date          ='" . func_date_conversion("d/m/Y","Y-m-d",$admission_date) . "'",
			'es_preadmissionid =' . $sid);	
			$sql_det = "UPDATE es_preadmission_details SET scat_id='".$scat_id."' WHERE  pre_fromdate='".$pre_fromdate."' AND es_preadmissionid=".$sid; 
			mysql_query($sql_det);
			//$db->update("es_preadmission_details","scat_id='".$scat_id."'","es_preadmission_detailsid=" . $pre_admin_details['es_preadmission_detailsid']);
									
							/*"caste_id"=>$caste_id,
							"ann_income"=>$ann_income,
							"tr_place_id"=>$tr_place_id,
							"document_deposited"=>$document_deposited,
							"admission_date"=>func_date_conversion("d/m/Y","Y-m-d",$admission_date)*/
		$emsg = 2;
		$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_preadmission','STUDENT','SEARCH STUDENT RECORD','".$sid."','EDIT PRE ADMISSION','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
		 $log_insert_exe=mysql_query($log_insert_sql);
		
		
		
		
		
	
			 if(isset($transport)){	
			 
		
			 
			 if($transport=='YES')
			 {
			 	$status='Active';
			 }
			 else
			 {
			 	$status='Inactive';
			 
			 }

			
				  $check_sql="SELECT * FROM es_trans_board_allocation_to_student WHERE student_staff_id=".$sid." AND type='student' ORDER BY id DESC LIMIT 0,1";
				  $std_allocation_det =  $db->getrow($check_sql);
				  $std_allocation_rec = sqlnumber($check_sql);
				  if($std_allocation_rec==0 || $std_allocation_det['status']=='Inactive'){
				  		$insert_sql="INSERT INTO es_trans_board_allocation_to_student (board_id,`student_staff_id`,`status`,`type`,`created_on`) 
					  VALUES('".$boardid."','".$sid."','Active','student',NOW())";
					  mysql_query($insert_sql);
				  }	 
			 
			 else{
			 
				
					$update_sql="UPDATE es_trans_board_allocation_to_student SET `status`='".$status."' , board_id='".$boardid."' ,  deallocated ='".date("Y-m-d")."'  WHERE type='student' AND  student_staff_id=".$sid;
				 mysql_query($update_sql);			 
			 }
			 
		 }
		 else
		 {
		 
		 
		 	 $update_sql="UPDATE es_trans_board_allocation_to_student SET `status`='Inactive' ,   deallocated ='".date("Y-m-d")."'  WHERE type='student' AND  student_staff_id=".$sid;
			
			 mysql_query($update_sql);
		 }
		 
		 
		header('Location: ?pid=21&action=editstudent&action=serchclass&emsg=' . $emsg);
		}
	}
}
if (isset($back)){
	
	$q_limit  = 10;
	if ( !isset($start)) $start = 0;
	header('location: ?pid=21&action=serchclass&action1=back&sid='.$sid.'&sm_class='.$clid.'&sm_section='.$secid);	   
}
?>