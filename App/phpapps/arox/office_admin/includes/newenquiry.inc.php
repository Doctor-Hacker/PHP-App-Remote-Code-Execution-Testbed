<?php
include_once (INCLUDES_CLASS_PATH . DS . 'class.es_enquiry.php');
sm_registerglobal_no('pid', 'action','update', 'uid', 'admin', 'eq_sex', 'eq_name', 'eq_address', 'eq_city', 'eq_wardname',  'eq_class', 'eq_phno', 'eq_mobile', 'eq_emailid', 'eq_reftype', 'eq_refname', 'eq_description', 'eq_newregistration', 'eq_state', 'emsg','Submit','eq_createdon','newapplicant','eq_mothername','eq_zip','eq_prv_acdmic','eq_countryid','eq_dob','submit');
sm_registerglobal_no('pid', 'action','update', 'uid', 'pre_serialno', 'pre_student_username', 'pre_student_password', 'pre_dateofbirth', 'pre_fathername', 'pre_mothername', 'pre_fathersoccupation', 'pre_motheroccupation', 'pre_contactname1', 'pre_contactno1', 'pre_contactno2', 'pre_contactname2', 'pre_address1', 'pre_city1', 'pre_state1', 'pre_country1', 'pre_phno1', 'pre_mobile1', 'pre_prev_acadamicname', 'pre_prev_class', 'pre_prev_university', 'pre_prev_percentage', 'pre_prev_tcno', 'pre_current_acadamicname', 'pre_current_class1', 'pre_current_percentage1', 'pre_current_result1', 'pre_current_class2', 'pre_current_percentage2', 'pre_current_result2', 'pre_current_class3', 'pre_current_percentage3', 'pre_current_result3', 'pre_physical_details', 'pre_height', 'pre_weight', 'pre_alerge', 'pre_physical_status', 'pre_special_care', 'pre_class', 'pre_sec', 'pre_name', 'pre_age', 'pre_address', 'pre_city', 'pre_state', 'pre_country', 'pre_phno', 'pre_mobile', 'pre_resno', 'pre_resno1', 'pre_image', 'test1', 'test2', 'test3', 'pre_pincode1', 'pre_pincode','pre_mobile','pre_country', 'newpreadmission','transport','boardid', 'pre_emailid', 'pre_pincode', 'pre_sec', 'pre_fromdate','es_user_theme', 'pre_todate', 'emsg', 'Submit','pre_blood_group','pre_hobbies','pre_gender','acad_year','caste_id','ann_income','scat_id','tr_place_id','document_deposited','admission_date','fee_concession','old_balance');
/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}

/********************Enquiry form details ***********************/

$es_enquiry = new es_enquiry();

    if (isset($Submit)){
		
		$vlc    = new FormValidation();	
			
		if (empty($eq_wardname)) {
		
		$errormessage[1] = "Enter Applicant Name";
			  
		}
		
		if (empty($eq_sex)) {
		
		$errormessage[2] = "Select Gender";
			  
		}
		
		
		if (empty($eq_name)) {
		
		$errormessage[3] = "Enter Father / Guardian Name";
			  
		}
		if (empty($eq_address)) {
		
		$errormessage[4] = "Enter Address"; 
		
		}	
			
		if($eq_dob==""){
			$errormessage[6] = "Select Date of birth";
		
		}	
		if (empty($eq_mobile)) {
		
		$errormessage[5] = "Enter Mobile No"; 
		
		}		
		
		if (!$vlc->is_nonNegNumber($eq_mobile)) {
			
				$errormessage[5] = "Enter Mobile No"; 
			}elseif(strlen($eq_mobile)!=10 ){
			    $errormessage[5] = "Enter Valid Mobile No";
			
			}
	    if(count($errormessage) == 0){
		
		$es_enquiry = new es_enquiry();
		
		$es_enquiry->eq_createdon = date('Y-m-d');
			
		if (isset($eq_sex)){
		
			 $es_enquiry->eq_sex = $eq_sex; 
		}
		if (isset($eq_name)){
		
			$es_enquiry->eq_name = $eq_name;
		}
	 
		if (isset($eq_address)){
		
			$es_enquiry->eq_address = $eq_address;
		}
		if (isset($eq_city)){
		
			$es_enquiry->eq_city = $eq_city;
		}
		if (isset($eq_wardname)){
		
			$es_enquiry->eq_wardname = $eq_wardname;
		}
		
		if (isset($eq_class)){
		
			$es_enquiry->eq_class = $eq_class;
		}
		if (isset($eq_phno)){
		
			$es_enquiry->eq_phno = $eq_phno;
		}
		if (isset($eq_mobile)){
		
			$es_enquiry->eq_mobile = $eq_mobile;
		}
		if (isset($eq_emailid)){
		
			$es_enquiry->eq_emailid = $eq_emailid;
		}
		if (isset($eq_reftype)){
		
			$es_enquiry->eq_reftype = $eq_reftype;
		}
		if (isset($eq_refname)){
		
			$es_enquiry->eq_refname = $eq_refname;
		}
		if (isset($eq_description)){
		
			$es_enquiry->eq_description = $eq_description;
		}
		if (isset($eq_state)){
			
			$es_enquiry->eq_state = $eq_state;
		}
		if (isset($eq_prv_acdmic)){
			
			$es_enquiry->eq_prv_acdmic = $eq_prv_acdmic;
		}
		if (isset($eq_zip)){
			
			$es_enquiry->eq_zip = $eq_zip;
		}
		if (isset($eq_mothername)){
			
			$es_enquiry->eq_mothername = $eq_mothername;
		}
		if (isset($eq_countryid)){
			
			$es_enquiry->eq_countryid = $eq_countryid;
		}
		
		if (isset($pre_class)){
			
			$es_enquiry->pre_class = $pre_class;
		}
		
		
		if (isset($scat_id)){
			
			$es_enquiry->scat_id = $scat_id;
		}
		if (isset($eq_dob)){		
			$new_dob = func_date_conversion('d/m/Y','Y-m-d',$eq_dob);
			$es_enquiry->eq_dob = $new_dob;
		}
		
		
		$es_enquiry->eq_submitedon = date('Y-m-d');		
		
		 if (isset($newapplicant) && $newapplicant == 'newapplicant'){
				    		
				 
					$insert_id = $es_enquiry->Save();
					
					$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_enquiry','Front Office','Enquiry Form','".$insert_id."','ADD ENQUIRY','".$_SERVER['REMOTE_ADDR']."',NOW())";
					$log_insert_exe=mysql_query($log_insert_sql);
							
						// Send email
			if($eq_emailid!=""){	
			$admin_message =  getarrayassoc("SELECT * FROM es_emailmanagement WHERE id=3");		
			$finance_info = getarrayassoc("SELECT * FROM es_finance_master ORDER BY es_finance_masterid DESC LIMIT 0,1");
			
			$headers = "From: ".$finance_info['fi_email'] ."\r\n";
		    $headers .= 'MIME-Version: 1.0' . "\r\n";
		    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		    $to = $eq_emailid;
		    $subject = ucwords($finance_info['fi_schoolname']). " -   Enquiry Id: ES".$insert_id  ." ".$admin_message['subject']; 
		    $message='<table width="80%" cellspacing="2" cellpadding="2" border="0">
						
						<tr>
							<td align="left"> Dear '.stripslashes(ucwords($eq_wardname)).',</td>
						</tr>
						<tr>
							<td align="left"><p>Thank you for contacting '.ucwords($finance_info['fi_schoolname']).' Admissions Unit. If you need to speak to us regarding your admission please walkin to our Admissions Unit or Contact us by using your referral Enquiry ID : ES'.$insert_id.'</P></td>
							
						</tr>
						<tr>
							<td align="left"><p>'.$admin_message['message'].'</P></td>
							
						</tr>
						
						<tr>
							<td align="left"><p>Kind Regards</P></td>
							
						</tr>
						
						<tr>
							<td align="left"><p>Sunrise Convent <br>
6, NIT Plot, Ward No. 10, Nr. BHEL Quarter, Ring Road Jaripatka, <br>
Nagpur-14 <br>
Email :- sunriseconvent@gmail.com<br>
Contact:- 0721-2641208, 3191208</P></td>
							
						</tr>
						
				</table>';
			
		    @mail($to, $subject, $message, $headers);
			}
						// email	
											
						header("Location:?pid=8&emsg=1");
						exit;		
	           //  }	
	    }
  }
}	
/********************End of the Enquiry form details ***********************/
?>