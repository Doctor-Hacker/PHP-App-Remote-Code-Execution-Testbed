<?php 
sm_registerglobal('pid', 'action', 'emsg', 'update', 'getstudetails', 'studentid', 'student_id', 'stuclass', 'feemasterid', 'feepartuclars', 'feeamountpaid', 'Submitpayform', 'selfeetypecheck', 'feepartuclarid', 'sid', 'start', 'pre_class', 'dc1', 'dc2', 'Search', 'comments', 'todat', 'fromdat', 'es_vouchertype','vocturetypesel', 'es_receiptno', 'es_narration', 'es_particulars', 'es_amount', 'es_checkno', 'es_vouchermode', 'es_bankacc', 'es_paymentmode', 'es_receiptdate','es_paymentmode', 'es_ledger', 'es_bank_pin', 'es_bank_name', 'es_teller_number', 'es_installment','feecategories','print_cat','pre_class','pre_year','school_year','fee_school_year','from_finan','to_finan','ac_year','paid_on');

 if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
		header('location: ./?pid=1&unauth=0');
		exit;
 }
 
 
if(isset($ac_year) && $ac_year!=''){
$academic_res = getarrayassoc("SELECT * FROM `es_finance_master` WHERE `es_finance_masterid`= ".$ac_year);
$from_acad    = $academic_res['fi_ac_startdate'];
$to_acad      = $academic_res['fi_ac_enddate'];
$from_finance = $academic_res['fi_startdate'];
$to_finance   = $academic_res['fi_enddate'];
}

$fi_res         = getarrayassoc("SELECT *FROM `es_finance_master` ORDER BY `es_finance_masterid` DESC LIMIT 0 , 1 ");
$current_yearid = $fi_res ['es_finance_masterid'];	

$school_details_sel = "SELECT * FROM `es_finance_master` ORDER BY `es_finance_masterid` DESC";
$school_details_res = getamultiassoc($school_details_sel);


$obj_stud_details = new es_preadmission_details();

// Add Fields
if($action == 'view' ){ 
 if (isset($getstudetails) && $getstudetails!=''){
      $vlc    = new FormValidation();
	  	
      
	   if(!$vlc->is_allnumbers($studentid )){$errormessage[0]="Enter Valid Registration Number"; }
	 
	  if($ac_year==""){$errormessage[1]="Select Year";}
	 
     if (count($errormessage)==0){
	  
	  if($ac_year != $current_yearid ){
           $sqlquery = "SELECT * FROM `es_preadmission_details` WHERE `es_preadmissionid` ='" . $studentid . "' 
	               AND pre_fromdate = '" . $from_acad . "' AND pre_todate= '" . $to_acad . "'";
	      $studetails = $db->getrow($sqlquery);
		  $prev_class = $studetails['pre_class'];
		  $student_rows = sqlnumber($sqlquery);	
		  		  
	      }else{
	       $sqlquery = "SELECT * FROM `es_preadmission` WHERE `es_preadmissionid` ='" . $studentid . "'
		               AND pre_fromdate = '" . $from_acad . "' AND pre_todate= '" . $to_acad . "'";
	      $studetails = $db->getrow($sqlquery);
	      $prev_class = $studetails['pre_class'];
		  $student_rows = sqlnumber($sqlquery);	
		  }
		   $section_det = $db->getrow("SELECT * FROM es_sections_student SS , es_sections S WHERE 	SS.student_id='".$studentid."' AND SS.course_id='".$prev_class."' AND SS.section_id=S.section_id ");
		 
	   
	   
	  if ($student_rows==0){
		  $errormessage[0]="Student Does Not Exist"; 	
	     }
		 
		} 
	  
	 	
	  
	 
	 if (count($errormessage)==0){
	 		  
	   	  
	    $sqlquery = "SELECT ep.pre_name,ep.pre_student_username,ep.es_preadmissionid,ep.pre_emailid,pre_fathername,ep.pre_address1,ep.pre_mobile1,ep.pre_image,epd.pre_fromdate,epd.pre_todate FROM es_preadmission ep,es_preadmission_details epd  WHERE ep.es_preadmissionid= epd.es_preadmissionid and ep.es_preadmissionid ='" . $studentid . "' AND epd.pre_fromdate = '" . $from_acad . "' AND epd.pre_todate = '" . $to_acad . "'";
	      $studetails = $db->getrow($sqlquery);
     
	 
		// library
		
		$bookissue_det = $db->getrows("SELECT * FROM es_bookissue WHERE bki_id=".$studentid." AND status='active' AND issuetype='student' and  issuedate BETWEEN '" . $from_acad . "' AND '" . $to_acad . "'");
		
		$sel_studentwise_rec = "SELECT * FROM es_other_fine_dettails WHERE es_preadmissionid=".$studentid;
	$studentwise_det = $db->getrows($sel_studentwise_rec);
		
		$libfine_det = $db->getrows("SELECT * FROM es_libbookfinedet WHERE es_libbooksid=".$studentid." AND es_libbookfine > 0 AND es_type='student' and  es_libbookdate  BETWEEN '" . $from_acad . "' AND '" . $to_acad . "'" );
		
		
		// hostel
	
		$hostelitems_det = $db->getrows("SELECT * FROM es_hostelperson_item WHERE es_personid=".$studentid." AND es_persontype='student' AND hostelperson_itemtype='Returnable' and return_on  BETWEEN '" . $from_acad . "' AND '" . $to_acad . "'");
		
		$hostelamount_det = $db->getrows("SELECT * FROM es_hostel_charges WHERE es_personid=".$studentid." AND balance!='' AND created_on BETWEEN '" . $from_acad . "' AND '" . $to_acad . "' AND es_persontype='student'");
	
	$hostelamount_det1 = $db->getrows("SELECT * FROM es_hostel_charges WHERE es_personid=".$studentid." AND balance!='' AND created_on BETWEEN '" . $from_acad . "' AND '" . $to_acad . "'");
	
	$roomallot_rows = $db->getone("SELECT COUNT(*) FROM es_roomallotment WHERE es_personid=".$studentid." AND es_persontype='student' AND alloted_date BETWEEN '" . $from_acad . "' AND '" . $to_acad . "' ");
		
		
		//assignment
		$assignments_det = $db->getrows("SELECT * FROM es_assignment WHERE as_class=".$prev_class." AND as_createdon BETWEEN '" . $from_acad . "' AND '" . $to_acad . "'");
			
	        $exam_data = get_Exams();
			
			
			
				/// count notices
				
				
			
	 $msg_qry ="SELECT * FROM es_notice_messages WHERE to_id=".$studentid." AND to_type='student' and to_status='active' and  created_on  BETWEEN '" . $from_acad . "' AND '" . $to_acad . "'";
	 $no_records = sqlnumber($msg_qry);
	 $msg_qry .="ORDER BY es_messagesid DESC ";
     $sel_messages = $db->getrows($msg_qry);
	 
	   $replies_qry ="SELECT * FROM es_notice_messages WHERE from_id=".$studentid." AND from_type='student' and from_status='active' and  created_on  BETWEEN '" . $from_acad . "' AND '" . $to_acad . "'";
	 
	 $replies_qry .="ORDER BY es_messagesid DESC ";
     $noticereplies_det = $db->getrows($replies_qry);
	 
	 /// messages count
			
		// receved 
		 $msg_qry ="SELECT * FROM es_messages WHERE to_id=".$studentid." AND to_type='student' and to_status='active' and  created_on  BETWEEN '" . $from_acad . "' AND '" . $to_acad . "'";
	 $no_records_messages = sqlnumber($msg_qry);
	 $msg_qry .="ORDER BY es_messagesid DESC ";
     $sel_messages = $db->getrows($msg_qry);
	 
	 
	 // send messages
	  $replies_qry ="SELECT * FROM es_messages WHERE from_id=".$studentid." AND from_type='student' and from_status='active' and  created_on  BETWEEN '" . $from_acad . "' AND '" . $to_acad . "'";
	 
	 $replies_qry .="ORDER BY es_messagesid DESC ";
     $noticereplies_det_messages = $db->getrows($replies_qry);
		
		
		//End of marks details
		
		
	 }		
 }
 
}
 if ($action =='printrepot'){
 	 $studentid = $sid;
	
	 if($pre_year != $current_yearid ){
	 
	 $sqlquery  = "SELECT `es_preadmissionid` FROM `es_preadmission_details` WHERE `es_preadmissionid` ='" . $studentid . "' 
	               AND pre_fromdate ='" .$from_acad. "' AND pre_todate= '" .$to_acad . "'";

	 }else{
	 $sqlquery = "SELECT `es_preadmissionid` FROM `es_preadmission` WHERE `es_preadmissionid` ='".$studentid."' 
	              AND pre_fromdate = '" . $from_acad . "' AND pre_todate= '" . $to_acad . "'";
	 }
	if (sqlnumber($sqlquery)==0){
		$errormessage[0]="Student Does Not Exist"; 	
	}
	if (count($errormessage)==0){
		
		$studetails = $db->getrow("SELECT * FROM es_preadmission WHERE es_preadmissionid='".$studentid."'");
		//$obj_studetails->Get($studentid);
		 if($pre_year != $current_yearid ){
		 $prev_class_sql = "SELECT pre_class FROM es_preadmission_details WHERE `es_preadmissionid` ='".$studentid."' 
	                          AND pre_fromdate = '" . $from_acad . "' AND pre_todate= '" . $to_acad . "'";
		 $prev_class_exe = getarrayassoc($prev_class_sql);
		  $prev_class = $prev_class_exe['pre_class'];	
		  $getfeelistsql = "SELECT * FROM `es_feemaster` WHERE `fee_class`='".$prev_class."' AND fee_fromdate = '" . $from_finance . "' AND fee_todate = '" . $to_finance . "'";
		
		 }else{
		$getfeelistsql = "SELECT * FROM `es_feemaster` WHERE `fee_class`='".$studetails->pre_class."' AND fee_fromdate = '" . $from_finance . "' AND fee_todate = '" . $to_finance . "'";
		}
		$getfeelist = getamultiassoc($getfeelistsql);
        if($pre_year != $current_yearid ){
		$sel_receptnumber = "SELECT `es_installment` FROM `es_feepaid` WHERE `studentid`=".$studetails->es_preadmissionId." AND `class`='".        $prev_class."'  AND fi_fromdate = '" . $from_finance . "' 
						   AND fi_todate   = '" . $to_finance . "'      ORDER BY `es_installment` DESC LIMIT 0 , 1";
		}else{
	$sel_receptnumber = "SELECT `es_installment` FROM `es_feepaid` WHERE `studentid`=".$studetails->es_preadmissionId." AND `class`='".        $studetails->pre_class."'   AND fi_fromdate = '" . $from_finance . "' 
						   AND fi_todate   = '" . $to_finance . "'      ORDER BY `es_installment` DESC LIMIT 0 , 1";
		}
		$receptnumber = getarrayassoc($sel_receptnumber);
		
	}
 }



   
  ?>
 