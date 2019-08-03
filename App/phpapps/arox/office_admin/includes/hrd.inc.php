<?php 
include_once (INCLUDES_CLASS_PATH . DS .'class.es_candidate.php');
sm_registerglobal('pid','action','update','start','column_name','asds_order','uid','sid','admin',
'st_postaplied','st_postaplied12','primarysub','secondrysub','st_fname','st_lname','st_mobilenumber','printtctostaff','st_email','st_wtest','st_techin','st_finalin','st_department','tcupdate','st_prvpac','tcstudent','st_gender','cl_class','cl_section','accepcted','notaccepcted','txt_deptname','st_basic','st_fahubname','st_doj','st_post','st_department','st_class','st_remarks','emsg','st_selectremarks','st_primsub','st_dob','st_secsub','st_fahbname','st_daughter','st_son','st_pass1','st_pass2','st_pass3','st_board1','st_board2','st_board3','st_year1','st_year2','st_year3','serchtcstaff','st_inst1','st_inst2','st_inst3','st_position1','st_position2','st_position3','st_period1','st_period2','st_period3','st_address','txt_post','serchofferletter','st_city','pofferletter','st_state','st_country','st_pincode','st_pemobno','st_phone','st_residency','st_mobile','st_peadress','st_pecity','st_pestate','st_country','tcstafftcserch','tcdepartment','tcdesignation','candidatename','st_pepin','st_pephone','st_peress','st_mobno','st_refname1','st_refname2','st_refname3','st_pin','st_desg1','st_desg2','st_desg3','st_inst4','st_inst5','st_inst6','st_email1','st_email2','candidateupdate','st_postaplied','st_email3','photo_upload','file1','searchselect','serchdepartment','staff_department','blogDesc','st_doj2','st_qualification','candidatename','takainterview','stafftcserch','tcupdatestudent','staffading','count','checkbox','smail','updateemail','staffsearch','candidateading','Offerupdate','action1','update','emailnotification','updateading','selectionserch','updateinterview','back','addnew','Search','serchinterviewcandidate','dc1','dc2','staff_id','printing_offerletter','print_id','stid','st_department','st_postaplied','st_subject','st_primarysubject','pre_address','sid','letter_id','letter_title','letter_desc','editformats','addformats','st_marks1','st_marks2','st_marks3','st_department','es_deptpostsid','es_staffid','submit_staff','letter_title','subject','searchotherletters','searchotherletter','st_department');

		$es_candidate   = new es_candidate();
		$es_requirement = new es_requirement();
		$es_shortlisted = new es_shortlisted();
		$es_offerletter = new es_offerletter();
		$es_staff       = new es_staff();
		
		$es_tcstudent   = new es_tcstudent();
		$obj_postlist   = new es_deptposts();
		$es_subject		= new es_subject();
$html_obj = new html_form();
/**
*  Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
//gtting all letters titles
	

	$letter_format   = $db->getRows("SELECT * FROM es_otherletter_formats WHERE status!='deleted'");
if(count($letter_format)>0){
foreach($letter_format as $letter){
$otherletters_for[$letter['letter_id']]=$letter['letter_title'];
}
}
//dept 

$exesqlquery = "SELECT * FROM es_departments";
$getdeptlist = $db->getrows($exesqlquery);

foreach($getdeptlist as $eachdept){
$departmentsarr[ $eachdept['es_departmentsid']]=$eachdept['es_deptname'];
}
/** End of the permissions    **/

/** Fetching Department details   **/

	$exesqlquery = "SELECT * FROM `es_departments`";
    $getdeptlist = getamultiassoc($exesqlquery);
	$admintestmail = $db->getrow("SELECT fi_email FROM es_finance_master  ORDER BY `es_finance_masterid` DESC LIMIT 0 , 1 ");
	
///

/** Fetching Class details   **/

	$exesqlquery  = "SELECT * FROM `es_classes` ";
	$getclasslist = getamultiassoc($exesqlquery);	

///
	$es_postList  = $obj_postlist->GetList(array(array("es_postshortname","=",$st_department)));

	$es_subjectList = $es_subject->GetList(array(array("es_subjectshortname","=","$st_class")));


/******************** registration for candidates***********************/

$query  =  $es_requirement ->GetList(array(array("status", "=",'active')) );


/** Fetching all Classes   **/

	$allClasses = getallClasses();

/**
*   *********** Adding Candidate**************
*/

if($action == 'applicant_enquiries' )
{
sm_registerglobal_no('pid','action','update','start','column_name','asds_order','uid','sid','admin',
'st_postaplied','st_postaplied12','primarysub','secondrysub','st_fname','st_lname','st_mobilenumber','printtctostaff','st_email','st_wtest','st_techin','st_finalin','st_department','tcupdate','st_prvpac','tcstudent','st_gender','cl_class','cl_section','accepcted','notaccepcted','txt_deptname','st_basic','st_fahubname','st_doj','st_post','st_department','st_class','st_remarks','emsg','st_selectremarks','st_primsub','st_dob','st_secsub','st_fahbname','st_daughter','st_son','st_pass1','st_pass2','st_pass3','st_board1','st_board2','st_board3','st_year1','st_year2','st_year3','serchtcstaff','st_inst1','st_inst2','st_inst3','st_position1','st_position2','st_position3','st_period1','st_period2','st_period3','st_address','txt_post','serchofferletter','st_city','pofferletter','st_state','st_country','st_pincode','st_pemobno','st_phone','st_residency','st_mobile','st_peadress','st_pecity','st_pestate','st_country','tcstafftcserch','tcdepartment','tcdesignation','candidatename','st_pepin','st_pephone','st_peress','st_mobno','st_refname1','st_refname2','st_refname3','st_pin','st_desg1','st_desg2','st_desg3','st_inst4','st_inst5','st_inst6','st_email1','st_email2','candidateupdate','st_postaplied','st_email3','photo_upload','file1','searchselect','serchdepartment','staff_department','blogDesc','st_doj2','st_qualification','candidatename','takainterview','stafftcserch','tcupdatestudent','staffading','count','checkbox','smail','updateemail','staffsearch','candidateading','Offerupdate','action1','update','emailnotification','updateading','selectionserch','updateinterview','back','addnew','Search','serchinterviewcandidate','dc1','dc2','staff_id','printing_offerletter','print_id','stid','st_department','st_postaplied','st_subject','st_primarysubject','pre_address');

 if (isset($candidateading)){	
	 $html_obj = new html_form();
	    $vlc    = new FormValidation();
        
		if (!$vlc->is_alpha($st_fname)) {
		
		$errormessage[0] = "Enter First Name ";	
		  
		}		
		/*if (!$vlc->is_alpha($st_lname)) {
		
		$errormessage[1] = "Enter Last Name";	
		  
		}*/
		if ($st_gender !='male' && $st_gender !='female' ) {
		
		$errormessage[2] = "Select Gender";	 
		 
		}	
		if ($st_dob == "") {
		
		$errormessage[3] = "Enter Date of birth";	
		  
		}
		if ( $st_department == "" ) {
		
		$errormessage[4] = "Select Department";	  
		
		}	
		if ($st_postaplied == "") {
		
		$errormessage[5]="Select Post";	 
		 
		}	
		
		if(!$vlc->is_email($st_email)){
		$errormessage[6]="Enter Valid Email Id";
		}
		
				
		
		
		if (!$vlc->is_nonNegNumber($st_mobile)) {
			
				$errormessage[7] = "Enter Mobile No"; 
			}elseif(strlen($st_mobile)!=10 ){
			    $errormessage[7] = "Enter Valid 10 digit Mobile No";
			
			}
		
			
				
				
	if( count($errormessage) == 0 )
	{
					 
			if ( isset( $st_postaplied )){
					  
				$es_candidate ->st_postaplied = $st_postaplied;
			}
			
			if (isset($st_fname)){
			
				$es_candidate ->st_firstname = $st_fname;
			}
			
			if(isset($st_gender)){
					
				$es_candidate->st_gender=$st_gender;
			}
			
			if (isset($st_lname)){
			
				$es_candidate ->st_lastname = $st_lname;
			}
			
			if (isset($st_secsub)){
			
				$es_candidate ->st_mobilenocomunication =$st_secsub;
			 }
			
			if (isset($st_email)){
			
				$es_candidate ->st_email = $st_email;
			 }
			
			if (isset($st_dob)){
			
				$st_dob1 = changejsdate1($st_dob);
				$es_candidate ->st_dob = $st_dob1;
			 }
				
			if (isset($st_class)){
				
				$es_candidate ->st_class = $st_class;
			 }	
			
			if (isset($st_subject)){
			 
				$es_candidate ->st_primarysubject = $st_subject;
			 }
				
			
			if (isset($st_pass1)){
			
				$es_candidate ->st_examp1 = $st_pass1;
			 }
			 
			if (isset($st_pass2)){
			
				$es_candidate ->st_examp2 = $st_pass2;
				
			 }
			 
			if (isset($st_pass3)){
			
				$es_candidate ->st_examp3 = $st_pass3;
				
			 }
			 
			 if (isset($st_marks1)){
			
				$es_candidate ->st_marks1 = $st_marks1;
			 }
			 
			if (isset($st_marks2)){
			
				$es_candidate ->st_marks2 = $st_marks2;
				
			 }
			 
			if (isset($st_marks3)){
			
				$es_candidate ->st_marks3 = $st_marks3;
				
			 }
			 
			if (isset($st_board1)){
			
				$es_candidate ->st_borduniversity1 = $st_board1;
				
			}
			if (isset($st_board2)){
			
				$es_candidate ->st_borduniversity2= $st_board2;
				
			}
			if (isset($st_board3)){
			
				$es_candidate ->st_borduniversity3 = $st_board3;
				
			}
			if (isset($st_year1)){
			
				$es_candidate ->st_year1 = $st_year1;
				
			}
			if (isset($st_year2)){
			
				$es_candidate ->st_year2 = $st_year2;
				
			}
			if (isset($st_year3)){
			
				$es_candidate ->st_year3 = $st_year3;
				
			}
			if (isset($st_inst1)){
				$es_candidate ->st_insititute1 = $st_inst1;
				
			}
			if (isset($st_inst2)){
			
				$es_candidate ->st_insititute2 = $st_inst2;
				
			}
			if (isset($st_inst3)){
			
				$es_candidate ->st_insititute3 = $st_inst3;
				
			}
			if (isset($st_position1)){
			
				$es_candidate ->st_position1 = $st_position1;
				
			}
			if (isset($st_position2)){
			
				$es_candidate ->st_position2 = $st_position2;
				
			}
			if (isset($st_position3)){
			
				$es_candidate ->st_position3 = $st_position3;
				
			}
			if (isset($st_period1)){
			
				$es_candidate ->st_period1 = $st_period1;
				
			}
			if (isset($st_period2)){
			
				$es_candidate ->st_period2 = $st_period2;
				
			}
			if (isset($st_period3)){
			
				$es_candidate ->st_period3 = $st_period3;
				
			}
			if (isset($st_address)){
			
				$es_candidate ->st_pradress = $st_address;
				
			}
			if (isset($st_city)){
			
				$es_candidate ->st_prcity = $st_city;
				
			}
			if (isset($st_state)){
			
				$es_candidate ->st_prstate = $st_state;
				
			}
			if (isset($st_country)){
			
				$es_candidate ->st_prcountry = $st_country;
				
			}
			if (isset($st_pincode)){
			
				$es_candidate ->st_prpincode = $st_pincode;
				
			}
			if (isset($st_phone)){
			
				$es_candidate ->st_prphonecode = $st_phone;
				
			}
			if (isset($st_residency)){
			
				$es_candidate ->st_prresino = $st_residency;
				
			}
			if (isset($st_mobile)){
			
				$es_candidate ->st_prmobno = $st_mobile;
				
			}
			if (isset($pre_address)){
				
		       $es_candidate ->st_peadress = $pre_address;
		
			}
			if (isset($st_pecity)){
			
				$es_candidate ->st_pecity = $st_pecity;
				
			}
			if (isset($st_pestate)){
			
				$es_candidate ->st_pestate = $st_pestate;
				
			}
			if (isset($st_country)){
			
				$es_candidate ->st_pecountry = $st_country;
				
			}
			if (isset($st_pepin)){
			
				$es_candidate ->st_pepincode = $st_pepin;
				
			}
			if (isset($st_pephone)){
			
				$es_candidate ->st_pephoneno = $st_pephone;
				
			}
			if (isset($st_peress)){
			
				$es_candidate ->st_peresino = $st_peress;
				
			}
			if (isset($st_pemobno)){
			
				$es_candidate ->st_pemobileno = $st_pemobno;
				
			}
			if (isset($st_refname1)){
			
				$es_candidate ->st_refposname1 = $st_refname1;
				
			}
			if (isset($st_refname2)){
			
				$es_candidate ->st_refposname2 = $st_refname2;
				
			}
			if (isset($st_refname3)){
			
				$es_candidate ->st_refposname3 = $st_refname3;
				
			}
			if (isset($st_desg1)){
			
				$es_candidate ->st_refdesignation1 = $st_desg1;
				
			}
			if (isset($st_desg2)){
			
				$es_candidate ->st_refdesignation2 = $st_desg2;
				
			}
			if (isset($st_desg3)){
			
				$es_candidate ->st_refdesignation3 = $st_desg3;
				
			}
			if (isset($st_inst4)){
			
				$es_candidate ->st_refinsititute1 = $st_inst4;
				
			}
			if (isset($st_inst5)){
			
				$es_candidate ->st_refinsititute2 = $st_inst5;
				
			}
			if (isset($st_inst6)){
			
				$es_candidate ->st_refinsititute3 = $st_inst6;
				
			}
			
			if (isset($st_email1)){
				$es_candidate ->st_refemail1 = $st_email1;
				
			}
			if (isset($st_email2)){
			
				$es_candidate ->st_refemail2 = $st_email2;
				
			}
			if (isset($st_email3)){
			
				$es_candidate ->st_refemail3 = $st_email3;
				
			}
			
			if (isset($st_department)){
			
				$es_candidate ->st_department = $st_department;
				
			}
			if (isset($st_postaplied)){
			
				$es_candidate ->st_post = $st_postaplied;
				
			}
			
      $cnid = $es_candidate ->Save(); 
	  
	  $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_candidate','HRD','Applicant Enquiry','".$cnid."','ADD APPLICANT / CANDIDATE','".$_SERVER['REMOTE_ADDR']."',NOW())";
	  $log_insert_exe=mysql_query($log_insert_sql);
       
		header('location:?pid=23&action=applicant_enquiries&emsg=1');
	 }
   }
		
 }
  

	
/**************** End of Adding Candidate ******************* **/


/********************** Serch Critiria for search applicants ***************************/	

if($action=='search_applicants' || ($action1 == 'serchselect') || $action=='print_applicants')
{

		$q_limit  = 10;
	if ( !isset($start) ){
		$start = 0;
	   }	
	
	
		/*$orderby_array = array('orb1'=>'es_candidateid','orb2'=>'cfs_name','orb3'=>'cfs_modeofadds','orb4'=>'cfs_posteddate');
		
		if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
			$orderby = $orderby_array[$column_name];
		}else{
			$orderby = "es_candidateid";
		}
		if (isset($asds_order)&&$asds_order == 'ASC'){
			$order = true;
		}else{
			$order = false;
		}*/
		$conditon =array();
		if(isset($selectionserch)){
		if(isset($st_department) && $st_department!='' && isset($txt_deptname) && $txt_deptname!=''){
			$conditon[] = array("st_department","=",$st_department);	
			$conditon[] = array("st_post","=",$txt_deptname);	
			//$conditon[] = array("status", "=", "");
		}else
		if(isset($st_department) && $st_department !='' && $txt_deptname == '')
		{
			$conditon[] = array("st_department","=",$st_department);	
			//$conditon[] = array("status", "=", "");
			
		}else
		
		if(isset($txt_deptname) && $txt_deptname!='' && $st_department == '')
		{
			$conditon[] = array("st_post","=",$txt_deptname);	
			//$conditon[] = array("status", "=", "");
		
		}
		}
		
		
		//$no_rows1 = count($es_candidate ->GetList($conditon, $orderby, $order, " $start, $q_limit "));
		//$es_candiadteList = $es_candidate->GetList($conditon, $orderby, $order, " $start, $q_limit ");
		 $no_rows1 = count($es_candidate ->GetList($conditon));
		$es_candiadteList = $es_candidate->GetList($conditon);
		//array_print($es_candiadteList);
		$adminlisturl = "&st_department=$st_department&st_post=$st_post&selectionserch=search";
		}
		if($no_rows1 == '0'){
		 $nill1="No records found" ;
	}
/********************** End of Serch Critiria   ***************************/	


/**
*   *********** Email Notification for search applicants***************************************
*/

if(isset($emailnotification)){
    if(count($checkbox)>0){
      
		for($i=0;$i<=$_POST['rowcount'];$i++)
		{
	
			$value=$_POST['checkbox'][$i];

		 $email  =  $es_candidate ->GetList(array(array("es_candidateid", "=", "$value")) );
		
			foreach ($email as $email1)
			{	
			    
			$id=$email1->es_candidateId;        
				$name=$email1->st_firstname;

				$to=$email1->st_email;

		        $emailview =$es_shortlisted ->GetList(array(array("es_shortlistedid", ">", 0)) );
				foreach ($emailview as $emailview1){
				$message=$emailview1->stl_message;

					}
					  $subject = "Interview Call";
		 $headers ="From:".$admintestmail['fi_email']."";
		// To send HTML mail, the Content-type header must be set
	    $headers .= '' . "\r\n";
		$headers .='Content-type: text/html; charset=iso-8859-1'. "\r\n";
		
				 $mail_send = @mail($to,$subject,$message,$headers);
			
				$db->update('es_candidate',"status ='selected',st_emailsend='1'",'es_candidateid ='. $value);
				
				$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_candidate','HRD','Search Applicants','".$value."','SEND EMAIL NOTIFICATION','".$_SERVER['REMOTE_ADDR']."',NOW())";
	  $log_insert_exe=mysql_query($log_insert_sql);
				
				

			   }
			}
		
			header("location:?pid=23&action=search_applicants&emsg=40");
			}else{
			$errormessage[0] = "Please check at least one candidate";
			}	
        }
		
/********************** Candidate Editing ***************************/	

		if($action == 'editcandidate')
		{
			$eachrecord1 = $es_candidate ->Get($sid);
			//array_print($eachrecord1);
				if(isset($st_department) && $st_department!='')
				{
				$es_postList = $obj_postlist->GetList(array(array("es_postshortname","=","$st_department")));
				}
				else
				{
				
				$es_postList = $obj_postlist->GetList(array(array("es_postshortname","=","$eachrecord1->st_department")));
				}
				if(isset($st_class))
				{
				$es_subjectList = $es_subject->GetList(array(array("es_subjectshortname","=","$st_class")));
				}
				else
				{
			$es_subjectList = $es_subject->GetList(array(array("es_subjectshortname","=","$eachrecord1->st_class")));
			}
		}
		


			if(isset($candidateupdate))
			{
			
			$vlc    = new FormValidation();
        
		if (!$vlc->is_alpha($st_fname)) {
		
		$errormessage[0] = "Enter First Name ";	
		  
		}		
		/*if (!$vlc->is_alpha($st_lname)) {
		
		$errormessage[1] = "Enter Last Name";	
		  
		}*/
		if ($st_gender !='male' && $st_gender !='female' ) {
		
		$errormessage[2] = "Select Gender";	 
		 
		}	
		if ($st_dob == "") {
		
		$errormessage[3] = "Enter Date of birth";	
		  
		}
		if ( $st_department == "" ) {
		
		$errormessage[4] = "Select Department";	  
		
		}	
		if ($st_postaplied == "") {
		
		$errormessage[5]="Select Post";	 
		 
		}	
		
		if(!$vlc->is_email($st_email)){
		$errormessage[6]="Enter Valid Email Id";
		}
		
				
		
		
		if (!$vlc->is_nonNegNumber($st_mobile)) {
			
				$errormessage[5] = "Enter Mobile No"; 
			}elseif(strlen($st_mobile)!=10 ){
			    $errormessage[5] = "Enter Valid 10 digit Mobile No";
			
			}
			if(count($errormessage)==0){
			
			
				$st_dob1 = func_date_conversion("d-m-Y","Y-m-d",$st_dob);
				/*echo "st_department  ='$st_department',
				st_post         ='$st_postaplied', 
				st_firstname           ='$st_fname',
				st_lastname            ='$st_lname', 
				st_gender              ='$st_gender',
				st_dob                 ='$st_dob1',
				st_primarysubject      ='$st_subject',
				st_mobilenocomunication='$st_secsub',
				st_fatherhusname       ='$st_fahbname',
				st_noofdughters        ='$st_daughter',
				st_noofsons            ='$st_son',
				st_email               ='$st_email',
				st_examp1              ='$st_pass1',
				st_examp2              ='$st_pass2',
				st_examp3              ='$st_pass3',
				st_borduniversity1     ='$st_board1',
				st_borduniversity2     ='$st_board2',
				st_borduniversity3     ='$st_board3',
				st_year1               ='$st_year1',
				st_year2               ='$st_year2',
				st_year3               ='$st_year3',
				st_insititute1         ='$st_inst1',
				st_insititute2         ='$st_inst2',
				st_insititute3         ='$st_inst3',
				st_position1           ='$st_position1',
				st_position2           ='$st_position2',
				st_position3           ='$st_position3',
				st_period1             ='$st_period1',
				st_period2             ='$st_period2',
				st_period3             ='$st_period3',
				st_pradress            ='$st_address',
				st_prcity              ='$st_city',
				st_prpincode           ='$st_pincode',
				st_prphonecode         ='$st_phone',
				st_prstate             ='$st_state',
				st_prresino            ='$st_residency',
				st_prcountry           ='$st_country',
				st_prmobno             ='$st_mobile',
				st_peadress            ='$pre_address',
				st_pecity              ='$st_pecity',
				st_pepincode           ='$st_pepin',
				st_pephoneno           ='$st_pephone',
				st_pestate             ='$st_pestate',
				st_peresino            ='$st_pepin',
				st_pecountry           ='$st_country',
				st_pemobileno          ='$st_country',
				st_refposname1         ='$st_refname1',
				st_refposname2         ='$st_refname2',
				st_refposname3         ='$st_refname3',
				st_refdesignation1     ='$st_desg1',
				st_refdesignation2     ='$st_desg2',
				st_refdesignation3     ='$st_desg3',
				st_refinsititute1      ='$st_inst4',
				st_refinsititute2      ='$st_inst5',
				st_refinsititute3      ='$st_inst6',
				st_refemail1           ='$st_email1',
				st_refemail2           ='$st_email2',
				st_refemail3           ='$st_email3',
				st_class               ='$st_class'";
				exit;*/
				$db->update('es_candidate',
				"st_department  ='$st_department',
				st_post         ='$st_postaplied', 
				st_firstname           ='$st_fname',
				st_lastname            ='$st_lname', 
				st_gender              ='$st_gender',
				st_dob                 ='$st_dob1',
				st_primarysubject      ='$st_subject',
				st_mobilenocomunication='$st_secsub',
				st_fatherhusname       ='$st_fahbname',
				st_noofdughters        ='$st_daughter',
				st_noofsons            ='$st_son',
				st_email               ='$st_email',
				st_examp1              ='$st_pass1',
				st_examp2              ='$st_pass2',
				st_examp3              ='$st_pass3',
				st_borduniversity1     ='$st_board1',
				st_borduniversity2     ='$st_board2',
				st_borduniversity3     ='$st_board3',
				st_year1               ='$st_year1',
				st_year2               ='$st_year2',
				st_year3               ='$st_year3',
				st_insititute1         ='$st_inst1',
				st_insititute2         ='$st_inst2',
				st_insititute3         ='$st_inst3',
				st_position1           ='$st_position1',
				st_position2           ='$st_position2',
				st_position3           ='$st_position3',
				st_period1             ='$st_period1',
				st_period2             ='$st_period2',
				st_period3             ='$st_period3',
				st_pradress            ='$st_address',
				st_prcity              ='$st_city',
				st_prpincode           ='$st_pincode',
				st_prphonecode         ='$st_phone',
				st_prstate             ='$st_state',
				st_prresino            ='$st_residency',
				st_prcountry           ='$st_country',
				st_prmobno             ='$st_mobile',
				st_peadress            ='$pre_address',
				st_pecity              ='$st_pecity',
				st_pepincode           ='$st_pepin',
				st_pephoneno           ='$st_pephone',
				st_pestate             ='$st_pestate',
				st_peresino            ='$st_pepin',
				st_pecountry           ='$st_country',
				st_pemobileno          ='$st_country',
				st_refposname1         ='$st_refname1',
				st_refposname2         ='$st_refname2',
				st_refposname3         ='$st_refname3',
				st_refdesignation1     ='$st_desg1',
				st_refdesignation2     ='$st_desg2',
				st_refdesignation3     ='$st_desg3',
				st_refinsititute1      ='$st_inst4',
				st_refinsititute2      ='$st_inst5',
				st_refinsititute3      ='$st_inst6',
				st_refemail1           ='$st_email1',
				st_refemail2           ='$st_email2',
				st_refemail3           ='$st_email3',
				st_class               ='$st_class'",
				
				'es_candidateid ='. $sid);
				
				$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_candidate','HRD','Search Applicants','".$sid."','EDIT APPLICANT / CANDIDATE','".$_SERVER['REMOTE_ADDR']."',NOW())";
	  $log_insert_exe=mysql_query($log_insert_sql);

header('location: ?pid=23&action=search_applicants&st_postaplied12='.$st_postaplied12.'&primarysub='.$primarysub.'&secondrysub='.$secondrysub.'&emsg=2');
}
}



/********************** Candidate Deleting ***************************/	

	if($action == 'dropcandiadte')

	{
		$es_candidate = new es_candidate();
		$es_candidate->es_candidateId = $sid;
		$es_candidate->Delete();
		
		$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_candidate','HRD','Applicant Enquiry','".$sid."','DELETE APPLICANT / CANDIDATE','".$_SERVER['REMOTE_ADDR']."',NOW())";
	  $log_insert_exe=mysql_query($log_insert_sql);
	  		
		header("Location:?pid=23&action=search_applicants&emsg=3");	
		exit();
	}

/**
*   *********** For Shortlisted Format View**************
*/

	if($action == 'shortlistedformatview'|| $action == 'letter_formats')
		{
			$emailview = $es_shortlisted ->GetList(array(array("es_shortlistedid", ">", 0)) );
		}

	if($action == 'shortlistedformat')
	{
		$emailview = $es_shortlisted ->Get($sid);
		
	}	
	
	if(isset($updateemail))
	{	
	$db->update('es_shortlisted',
	"stl_message         ='$blogDesc'", 'es_shortlistedid ='. $sid);
	$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_shortlisted','HRD','Letter Formats','".$sid."','UPDATE Short Listed Candidate Email Format','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
	header('location: ?pid=23&action=shortlistedformat&sid=1&emsg=2');
		
	}
	
/**
*   *********** For Offerletter Format View**************
*/

	
	if($action == 'offerletterview' || $action == 'letter_formats')
	{
		$offerview = $es_offerletter ->GetList(array(array("es_offerletterid", ">", 0)) );
	}
	if($action == 'offerletter')
	{
		$offerview = $es_offerletter ->Get($sid);
	}
	
	if(isset($Offerupdate))
	{	
	$db->update('es_offerletter',
	"ofr_message         ='$blogDesc'", 'es_offerletterid ='. $sid);
	
	$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_offerletter','HRD','Letter Formats','".$sid."','UPDATE Offer Letter Format','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
	
	header('location: ?pid=23&action=offerletter&sid=1&emsg=2');
		
	}

/**
*   *********** For Searching Offer Letter **************
*/

if(isset($serchofferletter))
{
	
	$q_limit  = 10;
		if ( !isset($start) ){
		$start = 0;
	   	}	
	
	
		$orderby_array = array('orb1'=>'es_candidateid','orb2'=>'cfs_name','orb3'=>'cfs_modeofadds','orb4'=>'cfs_posteddate');
		
		if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
			$orderby = $orderby_array[$column_name];
		}else{
			$orderby = "es_staffid";
		}
		if (isset($asds_order)&&$asds_order=='ASC'){
			$order = true;
		}else{
			$order = false;
		}
		
		$conditon = array();
		
		if (isset($txt_post)&&$txt_post!=''&&isset($candidatename)&& $candidatename!=''&& isset($st_department)&&$st_department!='' ){
			$status='added';
			
			
			$conditon[] = array("st_post", "=", $txt_post);
			$conditon[] = array("st_department", "=",$st_department);
			$conditon[] = array("es_staffid", "=",$candidatename);
			$conditon[] = array("status", "=",$status);
		
					
		}elseif(isset($st_department) && $txt_post=='' && $candidatename==''){
			$status='added';
			$conditon[] = array("st_department", "=",$st_department);
        	$conditon[] = array("status", "=",$status);
		}elseif(isset($txt_post) && $candidatename=='' && $st_department==''){
			$status='added';
			$conditon[] = array("st_post", "=",$txt_post);
        	$conditon[] = array("status", "=",$status);
		}elseif (isset($candidatename) && $st_department=='' && $txt_post=='' ){  
        	$status = 'added';
			$conditon[] =array("es_staffid","=",$candidatename);
			$conditon[] = array("status", "=",$status);
	
        }elseif(isset($txt_post)&&$txt_post!=''&&isset($candidatename)&& $candidatename!='')
        {    $status = 'added';
        	  $conditon[] = array("st_post", "=", $txt_post);
        	$conditon[] = array("es_staffid", "=",$candidatename);
			$conditon[] = array("status", "=",$status);
        }elseif(isset($st_department)&&$st_department!=''&&isset($candidatename)&& $candidatename!='')
        {  
            $status = 'added';  
        	$conditon[] = array("st_department", "=",$st_department);
        	$conditon[] = array("es_staffid", "=",$candidatename);
			$conditon[] = array("status", "=",$status);
        }elseif(isset($st_department)&&$st_department!=''&&isset($txt_post)&& $txt_post!='')
        { 
        	$status = 'added';
        	  $conditon[] = array("st_department", "=",$st_department);
        	$conditon[] = array("st_post", "=",$txt_post);
			$conditon[] = array("status", "=",$status);
        }
	$no_rows2 = count($es_staff ->GetList($conditon, $orderby, $order, " $start, $q_limit "));
$es_staffingList = $es_staff->GetList($conditon, $orderby, $order, " $start, $q_limit ");
		
		}
		if($no_rows2=='0'){
		 $nill1="No records found" ;
	}
	
/**
*   *********** Email Notification for offer letter generation**************
*/
	
	
	if ($action == 'printing') {	
	
		if (isset($smail)){
		
		if(count($_POST['checkbox'])==0){
		
 			header('location: ?pid=23&action=offerlettergenration&&emsg=74&serchofferletter=Search&&st_department='.$st_department);
						exit;


		}
		
		if(count($errormessage)==0){
	
			for ($i=0; $i<=$_POST['count']; $i++){
			    
				$value  = $_POST['checkbox'][$i];
				$email  = $es_staff ->GetList(array(array("es_staffid", "=", "$value")) );
				foreach ($email as $email1){
			
				
					$name		= $email1->st_firstname;
					$address	= $email->st_pradress;
					$state		= $email->st_prcity;
					$city		= $email->st_prstate;
					$zip		= $email->st_prpincode;
					$postaplied = $emil1->st_postaplied;
					$department	= $email1->st_department;
					$doj		= $email1->st_dateofjoining;
					$basic		= $email1->st_basic;
					$postaplied1 = $email1->st_post;
					$date		= date('d-m-Y');
					$to         = $email1->st_email;
					$emailview  = $es_offerletter ->GetList(array(array("es_offerletterid", ">", 0)) );
					foreach ($emailview as $emailview1){
						$randomstring = $emailview1->ofr_message;
					}
					 $online_sql1="select * from es_departments where es_departmentsid=".$department;
 $online_row111=$db->getRow($online_sql1);

		 $online_sql2="select * from es_deptposts where es_deptpostsid=".$email1->st_post;
 $online_row112=$db->getRow($online_sql2);
		
					 $subject="OFFER LETTER";
			 /*  $headers = "From: ".$admintestmail['fi_email']."\r\n";
			   $headers .= '' . "\r\n";
		       $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$doj1=displaydate($doj);*/
				 $message="<html>
					<body>
					<table width='100%' border='0'>
						<tr><td colspan='2' align='center'>OFFER LETTER</td></tr>
						<tr>
							<td align='left'>
								<p>" . $date . " </p>
								<p>" . $name . "</p>
								<p>" . $address . "</p>
								<p>" . $state . "</p>
								<p>" . $city . " </p>
								<p>" . $zip . " </p>
							</td>
						</tr>
						<tr><td colspan='2'>Dear " . $name . " </td></tr>
						<tr>
							<td colspan='2'>It gives me great pleasure to offer you an appointment as " .$online_row112['es_postname']. " in the Department of " . $online_row111['es_deptname'] . "  to begin " . $doj1 . " .</td>
						</tr>
						<tr>
							<td colspan='2'>The position will be a  month appointment at a monthly salary of " . $basic . " . Salary increases are based entirely on merit.</td>
						</tr>
						<tr><td colspan='2'>" . $randomstring . "</td></tr>
					</table>
					</body>
					</html>";
				 $headers ="From:".$admintestmail['fi_email']."";
		// To send HTML mail, the Content-type header must be set
	    $headers.= '' . "\r\n";
		$headers.='Content-type: text/html; charset=iso-8859-1'. "\r\n";	
					 @mail($to,$subject,$message, $headers);
					//echo $to;
				//echo $subject;
				//echo $message;
				//	echo $headers;
					  $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_staff','HRD','Generate Offer Letter','".$value."','EMAIL OFFER LETTER','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
							}
							
						}						
			header('location: ?pid=23&action=offerlettergenration&emsg=19');
												
				}
				
				}
	
	/**
*   *********** End of Email Notification for offer letter generation**************
*/
	


/**
*   *********** Email Notification for offer letter generation for accept button**************
*/


 if (isset($accepcted)) {
 
 $count = count($checkbox);
	
 
 if($count ==0){
 			header('location: ?pid=23&action=offerlettergenration&&emsg=74&serchofferletter=Search&&st_department='.$st_department);
			exit;


		}else{
	
	
	
	
	for ($i=0; $i<=$count-1; $i++){
	
		$value=$checkbox[$i];
		
		$db->update('es_staff', "selstatus='accepted', tcstatus='notissued'", 'es_staffid ='. $value);
		 $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_staff','HRD','Generate Offer Letter','".$value."','ACCEPTING CANDIDATE AS STAFF','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
	}
	header('location: ?pid=23&action=offerlettergenration&emsg=20');
 }
	
	}
/**
*   ***********End of Email Notification for offer letter generation for accept button**************
*/

/**
*   ***********Email Notification for offer letter generation for notaccepted button**************
*/

	
		if(isset($notaccepcted))
		{
		$count= count($checkbox);
		if($count ==0){
 			header('location: ?pid=23&action=offerlettergenration&&emsg=74&serchofferletter=Search&&st_department='.$st_department);
			exit;


		}else{
		for($i=0;$i<=$count-1;$i++)
		{		
			$value=$checkbox[$i];
			$db->update('es_staff',"selstatus='notaccepted'", 'es_staffid ='. $value);
			 
			 $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_staff','HRD','Generate Offer Letter','".$value."','DECLAIND CANDIDATE AS STAFF','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
		
		}
		header('location: ?pid=23&action=offerlettergenration&emsg=21');
		}
			
			}
		}
		
		
/**
*   ***********End of Email Notification for offer letter generation for notaccepted button**************
*/
	
/**
*   *********** TC view and generation  **************
*/		

		
		$es_tcmaster=new es_tcmaster();
		if($action=='tcview' || $action=='letter_formats')
		{
			$tcview =$es_tcmaster->GetList(array(array("es_tcmasterid", ">", 0)) );
		}
		if($action =='tcgenaration')
		{
			$tcvview =$es_tcmaster ->Get($sid);
		}
	
/**
*   *********** TC update for student**************
*/		
		if(isset($tcupdate))
		{	
		$db->update('es_tcmaster',"tcm_description ='$blogDesc'", 'es_tcmasterid ='. $sid);
		
		$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_tcmaster','HRD','Letter Formats','".$sid."','UPDATE TERMINATION LETTER FORMAT','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
	
		header('location: ?pid=23&action=tcgenaration&sid=1&emsg=2');			
		}
		
		$tcviews =$es_tcstudent ->GetList(array(array("es_tcstudentid", ">", 0)) );
		if($action =='tcviewstudent' || $action =='letter_formats')
		{
			$tcviews =$es_tcstudent ->GetList(array(array("es_tcstudentid", ">", 0)) );
		}
		if($action =='tcgenarationforstudent')
		{
			$tcvview = $es_tcstudent ->Get($sid);
		}
			
		if(isset($tcupdatestudent))
		{	
			
		$db->update('es_tcstudent',"tcm_description ='$blogDesc'", 'es_tcstudentid ='. $sid);
		
		$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_tcstudent','HRD','Letter Formats','".$sid."','UPDATE TC LETTER FORMAT','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
		
		header('location: ?pid=23&action=tcgenarationforstudent&sid=1&emsg=2');
			
		}
		
		
/**
*   ***********End of  TC update for student**************
*/	
		
/**
*   *********** Search T.C for Staff **************
*/		
		
		
if(isset($serchtcstaff))
{
$PageUrl ="&serchtcstaff=Search"; 

	/*if ($candidatename =='' && $txt_deptname =='' && $txt_post =='') 
		{
		$errormessage[0]="Please enter either Department or Employee ID ";			  
		}
		else
	{*/
		$q_limit  = 20;
	if ( !isset($start) ){
		$start = 0;
	   }
	
		$orderby_array = array('orb1'=>'es_candidateid','orb2'=>'cfs_name','orb3'=>'cfs_modeofadds','orb4'=>'cfs_posteddate');
		
		if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
			$orderby = $orderby_array[$column_name];
		}else{
			$orderby = "es_staffid";
		}
		if (isset($asds_order)&&$asds_order=='ASC'){
			$order = true;
		}else{
			$order = false;
		}
		$conditon =array();
		$status    ='added';
		$selstatus ='accepted';
		$conditon[] = array("status","=",$status);
		$conditon[] = array("selstatus","=",$selstatus);
		if (isset($txt_deptname)&& $txt_deptname!='')
        {  
           $conditon[] = array("st_department","=",$st_department);
		   $PageUrl .="&txt_deptname=$txt_deptname"; 
        }
		if (isset($txt_post)&& $txt_post!='')
        {
            $conditon[] = array("st_post","=",$txt_post);
			 $PageUrl .="&txt_post=$txt_post"; 	
        }
		if(isset($candidatename)&& $candidatename!=''){
		    $conditon[] = array("es_staffid","=", $candidatename);
			 $PageUrl .="&candidatename=$candidatename"; 	
		}
		//echo  $PageUrl;
		$no_rows3 = count($es_staff ->GetList($conditon, $orderby, $order));
        $es_staffingtcList = $es_staff->GetList($conditon, $orderby, $order, " $start, $q_limit ");
		
		//echo $es_staff->pog_query;
	    if($no_rows3 =='0'){
		 $nill1="No records found" ;
	     }
		//}
		
}


/**
*   *********** Search T.C for Student **************
*/

	if(isset($tcstudent))
	{
		
	
	   	
/*$orderby_array = array('orb1'=>'es_staffid', 'orb2'=>'cfs_name', 'orb3'=>'cfs_modeofadds', 'orb4'=>'cfs_posteddate');
		
		if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
			$orderby = $orderby_array[$column_name];
		}else{
			$orderby = "es_preadmissionid";
		}
		if (isset($asds_order)&&$asds_order=='ASC'){
			$order = true;
		}else{
			$order = false;
		}	
            $conditon =array();

         $conditon[] = array("status", "=",'inactive');
		if (isset($cl_class)&&$cl_class!=''&&isset($cl_section)&& $cl_section!=''){
			
			
			$conditon[] = array("pre_class", "=", $cl_class);
			$conditon[] = array("pre_sec", "=",$cl_section);
			
		
		}elseif (isset($cl_class)&&$cl_class!="") {
			
        	$conditon[] = array("pre_class", "=", $cl_class);
        }elseif(isset($cl_section)&& $cl_section!=""){
        	
        	
        	$conditon[] = array("pre_sec", "=",$cl_section);
        }*/
		$condition = "";
		if($cl_class >=1){$condition = " AND pre_class='".$cl_class."'";}
       		
	/*		$students_tc = "SELECT es_preadmissionid,pre_class,pre_name,pre_fathername FROM es_preadmission WHERE status='inactive' ".$condition."
			
					UNION
					
					SELECT sno AS es_preadmissionid ,class_name  AS pre_class,name AS pre_name,fname AS pre_fathername FROM es_transferstudent where status !='Deleted' 
			
			";*/
			
					$students_tc = "SELECT es_preadmissionid,pre_class,pre_name,pre_fathername FROM es_preadmission WHERE status='inactive' ".$condition."";
			
		$no_rows11 = sqlnumber($students_tc);
		$q_limit  = 10;
	    if ( !isset($start)){
		$start = 0;
	   }	
		$orderby = "es_preadmissionid";
		$students_tc .= " ORDER BY '".$orderby."' LIMIT ".$start.",".$q_limit." ";
$es_studentList=$db->getrows($students_tc);
//$es_search->GetList($conditon, $orderby, $order, " $start, $q_limit ");
		}
		if($no_rows11=='0'){
		 $nill1="No records found" ;
		}	

if(isset($back))
{
	header('location: ?pid=23&action=letter_formats');
}
if($action=="printtctostudent"){


$sem_det = $db->getrow("SELECT * FROM es_preadmission WHERE es_preadmissionid=".$sid);
	
	$sem_det1 = $db->getrow("SELECT * FROM es_transferstudent WHERE sno=".$sid);
	

$es_tcstudent   = new es_tcstudent();
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_tcstudent','HRD','Student Transfer','".$sid."','PRINT TC FOR STUDENT','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);

}
if($action=="printtctostaff"){

$es_tcmaster   = new es_tcmaster();

$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_tcstudent','HRD','Staff Termination','".$sid."','TERMINATING STAFF AND PRINT TERMINATION LETTER','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);

}
		
		
/**
*   *********** Serch Interview Candidate **************
*/
			
		if($action=='take_interview' ||($action1=='serchselect') || $action=='print_takeinterview_list')
    {
	
		$q_limit  = 10;
	if ( !isset($start) ){
		$start = 0;
	   }		
	
		/*$orderby_array = array('orb1'=>'es_candidateid','orb2'=>'cfs_name','orb3'=>'cfs_modeofadds','orb4'=>'cfs_posteddate');
		
		if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
			$orderby = $orderby_array[$column_name];
		}else{
			$orderby = "es_candidateid";
		}
		if (isset($asds_order)&&$asds_order=='ASC'){
			$order = true;
		}else{
			$order = false;
		}*/
		$conditon =array();
		
		if(isset($serchinterviewcandidate)){
		if(isset($st_department) && $st_department!='' && $txt_post=='')
		{
			$conditon[] =array("st_department","=",$st_department);	
			$conditon[]=array("status", "=", "selected");
			
		}
		
		if(isset($txt_post) && $txt_post!='' && $st_department=='')
		{
			$conditon[] =array("st_post","=",$txt_post);	
			$conditon[]=array("status", "=", "selected");
		
		}
		
		if(isset($st_department) && $st_department!='' && isset($txt_deptname) && $txt_deptname!=''){
			$conditon[] =array("st_department","=",$st_department);	
			$conditon[] =array("st_post","=",$txt_post);	
			$conditon[]=array("status", "=", "selected");
		}
		}

		//$conditon[]=array("status!='notattend'");
//$no_rows1 = count($es_candidate ->GetList($conditon, $orderby, $order, " $start, $q_limit "));
//$es_candiadteList = $es_candidate->GetList($conditon, $orderby, $order, " $start, $q_limit ");
$no_rows1 = count($es_candidate ->GetList($conditon, $orderby, $order, "  $start, $q_limit "));
$es_candiadteList = $es_candidate->GetList($conditon, $orderby, $order, " $start, $q_limit ");

//echo $online_sql="select * from es_candidate where  orderby=".$orderby." and order=".$order." $start, $q_limit ";
// $es_candiadteList=$db->getRow($online_sql);
/*array_print($conditon);
array_print($_POST); 
array_print($es_candiadteList);
exit;*/
		}
		if($no_rows1=='0'){
		 $nill1="No records found" ;
	}
	
	if($action == 'search_applicants')
	
{
	$exesqlquery = "SELECT * FROM `es_departments`";
	$getdeptlist = getamultiassoc($exesqlquery);
	
	if(isset($st_department))
	{
	$es_postList = $obj_postlist->GetList(array(array("es_postshortname","=","$st_department")));
	}
}
	if($action =='take_interview' || $action=='print_takeinterview_list')
{
	$exesqlquery = "SELECT * FROM `es_departments`";
	$getdeptlist = getamultiassoc($exesqlquery);
	
	if(isset($st_department))
	{
	$es_postList = $obj_postlist->GetList(array(array("es_postshortname","=","$st_department")));
	}
}





if ($action == 'printotherletterformats'){ 

	$staffdata_tip = $db->getrow("SELECT * FROM es_staff WHERE es_staffid=".$sid);

			$name     = $staffdata_tip['st_firstname'].' '.$staffdata_tip['st_lastname'];
			$id= $staffdata_tip['es_staffid'];
			$address  	= $staffdata_tip['st_pradress'];
			$state    	= $staffdata_tip['st_prcity'];
			$city     	= $staffdata_tip['st_prstate'];
			$zip     	 = $staffdata_tip['st_prpincode'];			
			$postaplied = $staffdata_tip['st_postaplied'];
			$department = $staffdata_tip['st_department'];
			$doj        = $staffdata_tip['st_dateofjoining'];
			$basic      = $staffdata_tip['st_basic'];
			$date       = date('d/m/Y');
			$to         = $staffdata_tip['st_email']; 
			 
			
			$print_dat = $db->getrow("SELECT * FROM es_otherletter_formats WHERE letter_id=".$letter_title);
			$randomstring=$print_dat['letter_desc'];
			
			$dep = $db->getrow("SELECT * FROM es_departments WHERE es_departmentsid=".$department);
			$depost = $db->getrow("SELECT * FROM es_deptposts WHERE es_deptpostsid=".$es_deptpostsid);
		
			     
	        $print_message = '<table width="100%" border="0"><tr><td width="635" height="100"><table width="100%" border="0">
				<tr>
        			<td height="93" align="right" valign="top"><table width="100%" border="0">
          		<tr>
            		<td align="left" valign="top"><span class="style1">'.$sch_name.'</span></td>
          		</tr>
         		<tr>
            		<td align="right" valign="middle"><span class="style5">&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
          		</tr>
        		</table>          <h4 class="style2">&nbsp;</h4></td>
     			</tr>
				<tr>
					<td colspan="3" align="center" height="10"><strong>'.ucwords($print_dat['letter_title']).'</strong></td></tr><tr>
				</tr>
				<tr><td  height="10">Name</td><td  height="10" align="left">:</td><td  height="10" align="left"  width="80%">' . ucwords($name) . ' </td></tr>
				<tr><td  height="10">Id</td><td  height="10" align="left">:</td><td  height="10" align="left"  width="80%">' . ucwords($id) . ' </td></tr>
				
					<tr><td  height="10">Department</td><td  height="10" align="left">:</td><td  height="10" align="left" width="80%">' . ucwords($dep['es_deptname']) . ' </td></tr>
					<tr><td  height="10">Post</td><td  height="10" align="left">:</td><td  height="10" align="left"  width="80%">' . ucwords($depost['es_postname']) . ' </td></tr>
		
				
				<tr>
					<td colspan="3" valign="top">' . $randomstring . '
					</td>
				</tr>
				<tr><td colspan="3"></td></tr>
		   </table>';
		   
		   $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_tcstudent','HRD','Print Formats','".$sid."','PRINT LETTER TO STAFF','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
		   
}

/**
*   *********** Print Offer Letter **************
*/
			
if ($action == 'printofferletter'){ 

	$staffdata_tip = $db->getrow("SELECT * FROM es_staff WHERE es_staffid=".$sid);

			$name     = $staffdata_tip['st_firstname'].' '.$staffdata_tip['st_lastname'];
			$address  	= $staffdata_tip['st_pradress'];
			$state    	= $staffdata_tip['st_prcity'];
			$city     	= $staffdata_tip['st_prstate'];
			$zip     	 = $staffdata_tip['st_prpincode'];			
			$postaplied = postname($staffdata_tip['st_post']);
			$department = deptname($staffdata_tip['st_department']);
			$doj        = func_date_conversion("Y-m-d","d/m/Y",$staffdata_tip['st_dateofjoining']);
			$basic      = $staffdata_tip['st_basic'];
			$date       = date('d/m/Y');
			$to         = $staffdata_tip['st_email']; 
			 
			
			$print_dat = $db->getrow("SELECT * FROM es_offerletter WHERE es_offerletterid=1");
			$randomstring=$print_dat['ofr_message'];

			
				
			     
	        $print_message = '<table width="100%" border="0"><tr><td width="635" height="100"><table width="100%" border="0">
				<tr>
        			<td height="93" align="right" valign="top"><table width="100%" border="0">
          		<tr>
            		<td align="left" valign="top"><span class="style1">'.$sch_name.'</span></td>
          		</tr>
         		<tr>
            		<td align="right" valign="middle"><span class="style5">&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
          		</tr>
        		</table>          <h4 class="style2">&nbsp;</h4></td>
     			</tr>
				<tr>
					<td colspan="3" align="center" height="10"><strong>OFFER LETTER</strong></td></tr><tr>
				</tr>
				<tr><td colspan="3" height="10" >Dear ' . $name . ' :</td></tr>
				<tr>
					<td colspan="3" height="10" >It gives me great pleasure to offer you an appointment as '.$postaplied.' in the Department of '.$department.'  to begin '.$doj.' .</td>
				</tr>
				<tr>
					<td colspan="3" height="10" >The position will be a  month appointment at a monthly salary of '.$basic.' . Salary increases are based entirely on merit.</td>
				</tr>
				<tr>
					<td colspan="3"  >' . $randomstring . '
					</td>
				</tr>
				<tr><td colspan="3"></td></tr>
		   </table>';

}

/**
*   ***********End of offer letter generation for printing**************
*/

if($action=="deleteletter"){
$sql="delete from es_otherletter_formats where letter_id=".$letter_id;
mysql_query($sql);
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) 
			VALUES('".$_SESSION['eschools']['admin_id']."','es_otherletter_formats','HRD','Other letter Formats','".$letter_id."','DELETE LETTER FORMAT','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
header('location: ?pid=23&action=letterslist&emsg=3&start='.$start);
			exit;

}

if(isset($addformats)&& $addformats!=""){
if ($letter_title == "") {
		$errormessage[1] = "Enter Title";	
		}else{
		$getcount=$db->getOne("SELECT count(*) from es_otherletter_formats where status!='deleted' and letter_title='".$letter_title."'");
		if($getcount>0){
		$errormessage[3] = "Title already exist";	
		}
		}
		if ( $letter_desc == "" ) {
		
		$errormessage[2] = "Enter Description";	  
		}
		if(count($errormessage)==0){
		// Insert  here
		$addletter_array = array(
							'letter_title' 	=> stripslashes($letter_title),
							'letter_desc' 	=> $letter_desc,
							'created_on' 	=> date('Y-m-d')
						);
			$addletter_array = stripslashes_deep($addletter_array);
			$lid = $db->insert("es_otherletter_formats",$addletter_array);
			
			$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) 
			VALUES('".$_SESSION['eschools']['admin_id']."','es_otherletter_formats','HRD','Other letter Formats','".$lid."','ADD NEW LETTER FORMAT','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
			header('location: ?pid=23&action=letterslist&emsg=1');
			exit;
		}
		
}
if(isset($editformats)&& $editformats!=""){
if ($letter_title == "") {
		$errormessage[1] = "Enter Title";	
		}else{
		$getcount=$db->getOne("SELECT count(*) from es_otherletter_formats where letter_title='".$letter_title."' and status!='deleted' and letter_id!=".$letter_id);
		if($getcount>0){
		$errormessage[3] = "Title already exist";	
		}
		}
		if ( $letter_desc == "" ) {
		$errormessage[2] = "Enter Description";	  
		}
		if(count($errormessage)==0){
		// Update here
		$db->update('es_otherletter_formats',
				"letter_title         ='".$letter_title."', 
				letter_desc         ='".$letter_desc."'",
				'letter_id ='. $letter_id);
				
	$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) 
			VALUES('".$_SESSION['eschools']['admin_id']."','es_otherletter_formats','HRD','Other letter Formats','".$letter_id."','EDIT LETTER FORMAT','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
	
	header('location: ?pid=23&action=editformat&letter_id='.$letter_id.'&emsg=2');
		exit;
		}
		
}


if ($action == 'printletterformat123'){ 

	
			$date       = date('d/m/Y');
		
			 
			
			$print_dat = $db->getrow("SELECT * FROM es_otherletter_formats WHERE letter_id=".$letter_id);
			$randomstring=$print_dat['letter_desc'];

			     
	        $print_message = '<table width="100%" border="0"><tr><td width="635" height="30"><table width="100%" border="0">
				<tr>
        			<td height="35" align="right" valign="top"> <h4 class="style2">&nbsp;</h4></td>
     			</tr>
				<tr>
					<td colspan="3" align="center" height="10"><strong>'.ucwords($print_dat['letter_title']).'</strong></td></tr><tr>
				</tr>
				
				
				<tr>
					<td colspan="3"  >' . $randomstring . '
					</td>
				</tr>
				<tr><td colspan="3"></td></tr>
		   </table>';

}
// new requre ment

if($action=='editformat'){
$edit_format   = $db->getRow("SELECT * FROM es_otherletter_formats WHERE letter_id=".$letter_id);
}
if($action=='letterslist'){
 $orderby   = 'letter_id';
	$no_rows   = $db->getOne("SELECT COUNT(*) FROM es_otherletter_formats");
	$q_limit   =25;
	if ( !isset($start) ){
		$start = 0;
	}
 $letter_list="SELECT * FROM  es_otherletter_formats  ORDER BY " . $orderby . "  DESC   LIMIT  " . $start ." , " .$q_limit ."" ;
 $letter_details = $db->getRows($letter_list);
	}

///send to staff

if(isset($submit_staff) && $submit_staff!=''){
	    if($st_department==''){ $errormessage['st_department'] = "Select Department";}
		if($es_deptpostsid==''){ $errormessage['es_deptpostsid'] = "Select Post";}
	    if($es_staffid==''){ $errormessage['es_staffid'] = "Select Name";}
		if($subject==''){ $errormessage['subject'] = "Enter Subject";}
		if($letter_title==''){ $errormessage['letter_title'] = "Select Letter Title";}
	
		
		if(count($errormessage)==0){
		$letterformat   = $db->getRow("SELECT * FROM es_otherletter_formats WHERE letter_id=".$letter_title);
		
		
		
                       if (strtoupper(substr(PHP_OS,0,3)=='WIN')) {
                               $eol="\r\n";
                       } elseif (strtoupper(substr(PHP_OS,0,3)=='MAC')) {
                               $eol="\r";
                       } else {
                               $eol="\n";
                       }                   
                       $now = date("YmdHis");
               # Common Headers
                       $headers  = 'From: '.$admintestmail['fi_email'].$eol;
                       $headers .= 'Return-Path: '.$from.$eol; // these two to set reply address
                       $headers .= "Message-ID: <".$now." - ".$_SERVER['SERVER_NAME'].">".$eol;
                       $headers .= "X-Mailer: yoga ".$eol; // These two to help avoid spam-filters, replace FIN Infocom according to your project.
               # Boundary for marking the split & Multitype Headers
                       $mime_boundary=md5(time());
                       $headers .= 'MIME-Version: 1.0'.$eol;
                       $headers .= "Content-Type: text/html; boundary=\"".$mime_boundary."\"".$eol;
                      
				# Boundary for marking the split & Multitype Headers
					
		for($k=0; $k<count($es_staffid); $k++){
		 $query="update es_staff set st_mail='1' where es_staffid=".$es_staffid[$k];
				
				mysql_query($query);
	
		 $es_staffid[$k];
		//$sql="update es_staff set st_emailsend='1' where es_staffid=".$es_staffid[$k];
		$k1=mysql_query($sql);
		$staffemail   = $db->getRow("SELECT st_firstname,st_email FROM es_staff WHERE es_staffid=".$es_staffid[$k]);
		$to=$staffemail['st_email'];
		$message = '<table width="635" border="0"><tr><td width="635" height="100"><table width="100%" border="0">
				<tr>
        			<td height="93" align="right" valign="top"><table width="100%" border="0">
         		<tr>
            		<td align="right" valign="middle"><span class="style5">&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
          		</tr>
        		</table><h4 class="style2">&nbsp;</h4></td>
     			</tr>
				<tr>
					<td colspan="3" align="center" height="10"><strong>'.$letterformat['letter_title'].'</strong></td></tr><tr>
				</tr>
				<tr>
            		<td align="left" valign="top" colspan="3"><span class="style1">'.$staffemail['st_firstname']." ".$staffemail['st_lastname'].'</span></td>
          		</tr>
				<tr>
					<td colspan="3" >' . $letterformat['letter_desc'] . '
					</td>
				</tr>
				<tr><td colspan="3"></td></tr>
		   </table>';
		  
		   $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) 
			VALUES('".$_SESSION['eschools']['admin_id']."','es_otherletter_formats','HRD','Send Formats','".$es_staffid[$k]."','SEND LETTER FORMAT TO STAFF','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
	
		@mail($to, $subject, $message, $headers); 
	//	echo $to;
		//echo $subject;
	//	echo $emailmessage;
	//	echo $headers;
		}
header("location:?pid=23&action=$action&emsg=87");
exit;
	

	}

	}
	
if(isset($searchotherletter))
{

if ($txt_deptname == "") {
		$errormessage[1] = "Select Department";	
		}
if ($txt_post == "") {
		$errormessage[2] = "Select Post";	
		}
if ($letter_title == "") {
		$errormessage[3] = "Select a Letter";	
		}
if(count($errormessage)==0){
	
	$q_limit  = 10;
		if ( !isset($start) ){
		$start = 0;
	   	}	
	
	
		$orderby_array = array('orb1'=>'es_candidateid','orb2'=>'cfs_name','orb3'=>'cfs_modeofadds','orb4'=>'cfs_posteddate');
		
		if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
			$orderby = $orderby_array[$column_name];
		}else{
			$orderby = "es_staffid";
		}
		if (isset($asds_order)&&$asds_order=='ASC'){
			$order = true;
		}else{
			$order = false;
		}
		
		$conditon = array();
		
		if (isset($txt_post)&&$txt_post!=''&&isset($candidatename)&& $candidatename!=''&& isset($st_department)&&$st_department!='' ){
			$status='added';
			
			
			$conditon[] = array("st_post", "=", $txt_post);
			$conditon[] = array("st_department", "=",$st_department);
			$conditon[] = array("es_staffid", "=",$candidatename);
			$conditon[] = array("status", "=",$status);
			
		
					
		}elseif(isset($st_department) && $txt_post=='' && $candidatename==''){
			$status='added';
			$conditon[] = array("st_department", "=",$st_department);
        	$conditon[] = array("status", "=",$status);
		}elseif(isset($txt_post) && $candidatename=='' && $st_department==''){
			$status='added';
			$conditon[] = array("st_post", "=",$txt_post);
        	$conditon[] = array("status", "=",$status);
		}elseif (isset($candidatename) && $st_department=='' && $txt_post=='' ){  
        	$status = 'added';
			$conditon[] =array("es_staffid","=",$candidatename);
			$conditon[] = array("status", "=",$status);
	
        }elseif(isset($txt_post)&&$txt_post!=''&&isset($candidatename)&& $candidatename!='')
        {    $status = 'added';
        	  $conditon[] = array("st_post", "=", $txt_post);
        	$conditon[] = array("es_staffid", "=",$candidatename);
			$conditon[] = array("status", "=",$status);
        }elseif(isset($st_department)&&$st_department!=''&&isset($candidatename)&& $candidatename!='')
        {  
            $status = 'added';  
        	$conditon[] = array("st_department", "=",$st_department);
        	$conditon[] = array("es_staffid", "=",$candidatename);
			$conditon[] = array("status", "=",$status);
        }elseif(isset($st_department)&&$st_department!=''&&isset($txt_post)&& $txt_post!='')
        { 
        	$status = 'added';
        	  $conditon[] = array("st_department", "=",$st_department);
        	$conditon[] = array("st_post", "=",$txt_post);
			$conditon[] = array("status", "=",$status);
        }
		$conditon[] = array("selstatus", "=",'accepted');
			$conditon[] = array("tcstatus", "=",'notissued');
	$no_rows2 = count($es_staff ->GetList($conditon, $orderby, $order, " $start, $q_limit "));
$es_staffingList = $es_staff->GetList($conditon, $orderby, $order, " $start, $q_limit ");
		
		}
		}
		if($no_rows2=='0'){
		 $nill1="No records found" ;
	}
	
?>
<?php
if($action=='expe')
{
 $staff_row=$db->getRow('SELECT * FROM es_staff where es_staffid ='.$sid);
}if($action=='resigned')
{
 $today=date("d/m/Y");
$db->update("es_staff","   tcstatus = 'resigned', terminationdate = '".$today."'","es_staffId = $sid");

	
	header("Location:?pid=23&action=issuetcstaff&emsg=2");
		exit;	
}
?>