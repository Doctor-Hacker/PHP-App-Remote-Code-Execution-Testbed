<?php
sm_registerglobal_no('pid', 'action','update', 'uid', 'pre_serialno', 'pre_student_username', 'pre_student_password', 'pre_dateofbirth', 'pre_dateofbirth1', 'pre_fathername', 'pre_mothername', 'pre_fathersoccupation','pre_fathersoccupation2', 'pre_motheroccupation','pre_motheroccupation2', 'pre_contactname1', 'pre_contactno1', 'pre_contactno2', 'pre_contactname2', 'pre_address1', 'pre_city1', 'pre_state1', 'pre_country1', 'pre_phno1', 'pre_mobile1', 'pre_prev_acadamicname', 'pre_prev_class', 'pre_prev_university', 'pre_prev_percentage', 'pre_prev_tcno', 'pre_current_acadamicname', 'pre_current_class1', 'pre_current_percentage1', 'pre_current_result1', 'pre_current_class2', 'pre_current_percentage2', 'pre_current_result2', 'pre_current_class3', 'pre_current_percentage3', 'pre_current_result3', 'pre_physical_details', 'pre_height', 'pre_weight', 'pre_alerge', 'pre_physical_status', 'pre_special_care', 'pre_class', 'pre_sec', 'pre_name', 'pre_age', 'pre_address', 'pre_city', 'pre_state', 'pre_country', 'pre_phno', 'pre_mobile', 'pre_resno', 'pre_resno1', 'pre_image', 'test1', 'test2', 'test3', 'pre_pincode1', 'pre_pincode','pre_mobile','pre_country', 'newpreadmission','transport','boardid', 'pre_emailid', 'pre_pincode', 'pre_fromdate','es_user_theme', 'pre_todate', 'emsg', 'Submit','pre_blood_group','pre_hobbies','pre_gender','acad_year','caste_id','ann_income','scat_id','tr_place_id','document_deposited','admission_date','admission_date1','fee_concession','old_balance','es_home','admission_status','es_econbackward','es_econbackward1','es_econbackward2','es_econbackward3','es_econbackward4','es_econbackward5','pre_number','searchsch','group','schoolname','admission_id','school_id','sid','pre_lastname','pre_placeofbirth','pre_contactno','pre_contactno3','pre_resno2','pre_resno2','pre_emailid2','middle_name','pre_dateofbirth3','pre_dateofbirth2','aadharno','board','edugap','reason','reason12');

/**
* Only Admin users can view the pages
*/

if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
$html_obj = new html_form();
$vlc = new FormValidation();
$academic_year = getamultiassoc("SELECT * FROM `es_finance_master` order by `es_finance_masterid` DESC ");
 $pattern_pass = "/(\s)/";
		$vlc    = new FormValidation();	
if($action=="searchschool")
{
	$grprs=mysql_query("select * from es_groups");
	
	if(isset($searchsch) && $searchsch !="")
	{
		 header("Location:?pid=5&action=pre_admission&sid=$schoolname&gid=$group");
		 exit;
	}
	
}
/**
* End of the admin permissions
*/

/**
* ***********Pre-admission for Students****************************
*/

$query="SELECT fee_amount  FROM es_feemaster WHERE fee_particular='tuition' AND fee_class='".$pre_class."' ";
  $res=$db->getrow($query);
 $count=sqlnumber($query);
 $tuitionfee=$res['fee_amount'];
  
	if (isset($Submit)){
	
	   
	   /*$error = "";
	  
	    $vlc = new FormValidation();		
		if ($in_category_name=="") {
		$errormessage[0]="Enter Number";	  
		}else{
		    $condition="";
		    if(isset($edit_id) && $edit_id !=""){$condition = " AND es_in_number!=".$edit_id."";}
			$rows = $db->getone("SELECT COUNT(*) FROM es_preeadmission WHERE es_in_number='".$es_in_number."' ".$condition."");
			if($rows>=1){$errormessage[0]="Number already Exists";}
		}		*/
		
		
		
	
			 $acadmicdates = explode("To",$acad_year);
			 
			 $frm_acadmicdates = $acadmicdates[0].'<br>';
			 
			 $to_acadmicdates = $acadmicdates[1];
			 
			 /*$es_finance_master_sql="SELECT * FROM es_finance_master WHERE fi_startdate='". $frm_acadmicdates."' AND fi_enddate='".$to_acadmicdates."'";
			 $es_finance_master_exe=mysql_query($es_finance_master_sql);
			 $es_finance_master_row=mysql_fetch_array($es_finance_master_exe);
			 $es_finance_master_id=$es_finance_master_row['es_finance_masterid'];*/
		
		   
			$vlc = new FormValidation();
			
			/*if (empty($pre_number)) {
			
			   $errormessage[14] = "Enter Number"; 	 
			}else{
			
			$pattern = "/^([a-zA-Z0-9._-]+)$/";
			if (!preg_match($pattern,$pre_number)){
					  $errormessage[3]="Enter valid Number";        
			  }else{
						
			 $sel_user_sql1 = 'SELECT count(*) FROM `es_preadmission` WHERE `pre_number` = "'.$pre_number.'"; '; 
			 $reg_user_count = $db->getOne($sel_user_sql1);
			 if ($reg_user_count>=1) {
				 $errormessage[14] = "Number Already Exist"; 
			}
			}
			}
			*/
			/*if (empty($pre_number)) {
				$errormessage[0] = "Enter Number";	  
			}*/
					
			if (empty($pre_name)) {
				$errormessage[0] = "Enter Applicant Name";	  
			}	
			if (empty($pre_gender)) {
			
				$errormessage[8] = "Select Gender"; 
			}	
			if ($acad_year == "") {
			
				$errormessage[10] = "Select Academic Year"; 
			}	
			
				if (empty($pre_dateofbirth)) {
			
				$errormessage[1] = "Enter Date of Birth"; 	 
			}	
			
			if (empty($pre_class)) {
			
				//$errormessage[9] = "Select Class"; 
			}
			
				//if (empty($scat_id)) {
//			
//				$errormessage[13] = "Select Subjects"; 
//			}	
				
			if (empty($pre_student_username)) {
			
			   $errormessage[3] = "Enter User Name"; 	 
			}else{
			
			$pattern = "/^([a-zA-Z0-9._-]+)$/";
			if (!preg_match($pattern,$pre_student_username)){
					  $errormessage[3]="Enter valid User Name";        
			  }else{
						
			 $sel_user_sql = 'SELECT count(*) FROM `es_preadmission` WHERE `pre_student_username` = "'.$pre_student_username.'"; '; 
			 $reg_user_count = $db->getOne($sel_user_sql);
			 if ($reg_user_count>=1) {
				 $errormessage[3] = "User Name Already Exist"; 
			}
			}
			}

	   
			if (empty($pre_student_password)) {
			
			   $errormessage[4] = "Enter Password"; 	 
			}elseif (preg_match($pattern_pass,$pre_student_password)){
		$errormessage[3]="Password must not contain spaces
";
		}
			
			if (!$vlc->is_alpha_numeric($pre_student_password)) {
				 $errormessage[4] = "Enter valid Password"; 
			}
			
					
			
						
			if (empty($pre_fathername)) {
			
				$errormessage[5] = "Enter Father's Name";	  
			}
			
		
		
				
			if (!empty($fee_concession)) {	
			if($count>0){	
				if(!$vlc->is_nonNegNumber($fee_concession))	
				{
					$errormessage[13] = "Enter valid tuition fee"; 	 
				}
			elseif ($fee_concession>$tuitionfee) 	
				{
					$errormessage[14] = "Tuition fee must not be greater than the total tuition fee"; 
				
				}
			}
			else
		{
			//$errormessage[15] = "No tuition has been added for the this class"; 
		}
		}
		
		
			if (empty($pre_address1)) {
			
				$errormessage[6] = "Enter Address"; 
			}
			
			if (!$vlc->is_nonNegNumber($pre_mobile1)) {
			
				$errormessage[11] = "Enter Mobile No"; 
			}elseif(strlen($pre_mobile1)!=10 ){
			    $errormessage[11] = "Enter Valid Mobile No";
			
			}	
			
			if (!$vlc->is_alpha_numeric($pre_contactno1)) {
			
				//$errormessage[7] = "Enter Contact No "; 	 
			}
			
			if (isset($transport) && $transport=="YES" && $boardid=="") {
			
				//$errormessage[12] = "Select Route/Board"; 	 
			}
		
			
			
			
		if(count($errormessage) == 0){
		
		
		
			

/**
* ***********Pre admission for Students image uploading*****************************
*/
            $acadmicdates = explode("To",$acad_year);
			 
			 $frm_acadmicdates = $acadmicdates[0];
			 $to_acadmicdates = $acadmicdates[1];

	$pre_image = $_FILES['pre_image']['name'];
	
		if(is_uploaded_file($_FILES['pre_image']['tmp_name'])) {
			
			$ext = explode(".",$_FILES['pre_image']['name']);
			
			$str = date("mdY_hms");
			
			$new_thumbname = "st_".$str."_".$ext[0].".".$ext[1];
			
			$updir = "images/student_photos/";
			
			$uppath = $updir.$new_thumbname;
			
			move_uploaded_file($_FILES['pre_image']['tmp_name'],$uppath);
			
			$pre_image = $new_thumbname;
			
		    } else {
		
			$pre_image = "userphoto.gif";
			
		}
		$pre_dateofbirth = func_date_conversion("d/m/Y","Y-m-d",$pre_dateofbirth);
		$pre_dateofbirth1 = func_date_conversion("d/m/Y","Y-m-d",$pre_dateofbirth1);
		 $preadm_arr = array(
		                    "pre_serialno"=>$pre_serialno,
							"middle_name"=>$middle_name,
							"pre_resno2"=>$pre_resno2,
							"pre_number"=>$pre_number,
							"pre_student_username"=>$pre_student_username,
							"pre_student_password"=>$pre_student_password,
							"pre_dateofbirth"=> $pre_dateofbirth,
							"pre_dateofbirth1"=> $pre_dateofbirth1,
							"pre_fathername"=>$pre_fathername,
							"pre_mothername"=>$pre_mothername,
							"pre_fathersoccupation"=>$pre_fathersoccupation,
							"pre_motheroccupation"=>$pre_motheroccupation,
							"pre_contactname1"=>$pre_contactname1,
							"pre_contactno1"=>$pre_contactno1,
							"pre_contactno2"=>$pre_contactno2,
							"pre_contactno3"=>$pre_contactno3,
							"pre_contactno"=>$pre_contactno,
							"pre_current_class3" => $pre_current_class3,
							"pre_address1"=>$pre_address1,
							"pre_city1"=>$pre_city1,
							"pre_state1"=>$pre_state1,
							"pre_contactname2"=>$pre_contactname2,
							"pre_country1"=>$pre_country1,
							"pre_prev_class"=>$pre_prev_class,
							"pre_phno1"=>$pre_phno1,
							"pre_mobile1"=>$pre_mobile1,
							"pre_prev_acadamicname"=>$pre_prev_acadamicname,
							'pre_current_class3'=>$pre_current_class3,
							"pre_prev_university"=>$pre_prev_university,
							"pre_prev_percentage"=> $pre_prev_percentage,
							"pre_prev_tcno"=>$pre_prev_tcno,
							"pre_current_acadamicname"=>$pre_current_acadamicname,
							"pre_current_class1"=>$pre_current_class1,
							"pre_current_percentage1"=>$pre_current_percentage1,
							"pre_current_result1"=>$pre_current_result1,
							"pre_current_class2"=>$pre_current_class2,
							"pre_current_percentage2"=>$pre_current_percentage2,
							"pre_current_result2"=>$pre_current_result2,
							"pre_current_class3"=>$pre_current_class3,
							"pre_current_percentage3"=>$pre_current_percentage3,
							"pre_current_result3"=>$pre_current_result3,
							"pre_physical_details"=>$pre_physical_details,
							"pre_height"=>$pre_height,
							"pre_weight"=>$pre_weight,
							"test3"=>$test3,
							"pre_alerge"=>$pre_alerge,
							"pre_physical_status"=>$pre_physical_status,
							"pre_special_care"=>$pre_special_care,
							'pre_class' => $pre_class,
							'aadharno' => $aadharno,
							'board' => $board,
							'edugap' => $edugap,
							'pre_sec'=>$pre_sec,
							"pre_name"=>$pre_name,
							"pre_age"=>$pre_age,
							"pre_address"=>$pre_address,
							"pre_city"=>$pre_city,
							"pre_state"=>$pre_state,
							"pre_country"=>$pre_country,
							"pre_phno"=>$pre_phno,
							"admission_status"=>$admission_status,
							"pre_mobile"=>$pre_mobile,
							"pre_resno"=>$pre_resno,
							"pre_resno1"=>$pre_resno1,
							"pre_image"=>$pre_image,
							"test1"=>$test1,
							"test2"=>$test2,
							"pre_pincode1"=>$pre_pincode1,
							"pre_pincode"=>$pre_pincode,
							"pre_emailid"=>$pre_emailid,
							'pre_fromdate'=>$frm_acadmicdates,
							'pre_todate'=>$to_acadmicdates,
							"pre_status"=>'active',
							"es_user_theme"=>"pink.css",
							"pre_hobbies"=>$pre_hobbies,
							"pre_blood_group"=>$pre_blood_group,
							"es_econbackward"=>$es_econbackward,
							"es_econbackward1"=>$es_econbackward1,
							"es_econbackward2"=>$es_econbackward2,
							"es_econbackward3"=>$es_econbackward3,
							"es_econbackward4"=>$es_econbackward4,
							"es_econbackward5"=>$es_econbackward5,
							"pre_gender"=>$pre_gender,
							"caste_id"=>$caste_id,
							"pre_emailid2"=>$pre_emailid2,
							"ann_income"=>$ann_income,
							"tr_place_id"=>$tr_place_id,
							"pre_fathersoccupation2"=>$pre_fathersoccupation2,
							"pre_motheroccupation2"=>$pre_motheroccupation2,
							
							"admission_id"=>$admission_id,
							"school_id"=>$sid,
							"document_deposited"=>$document_deposited,
							"es_home"=>$es_home,
							"admission_date"=>func_date_conversion("d/m/Y","Y-m-d",$admission_date),
							"admission_date1"=>func_date_conversion("d/m/Y","Y-m-d",$admission_date1),
							"pre_dateofbirth3"=>func_date_conversion("d/m/Y","Y-m-d",$pre_dateofbirth3),
							"pre_dateofbirth2"=>func_date_conversion("d/m/Y","Y-m-d",$pre_dateofbirth2),
							"fee_concession"=>$fee_concession,
							"pre_placeofbirth"=>$pre_placeofbirth,
							"pre_lastname"=>$pre_lastname,
							"reason"=>$reason
							);
				
		/*echo "<pre>";
		print_r($preadm_arr);
		echo "</pre>";*/
	       if (isset($newpreadmission) && $newpreadmission == 'newpreadmission'){
		   

		     
			     $preadm_arr = stripslashes_deep($preadm_arr);
				 $inset_id = $db->insert("es_preadmission",$preadm_arr);
				 if(isset($uid) && $uid!=""){
					 $db->update("es_enquiry","es_preadmissionid='".$inset_id."'",'es_enquiryid='.$uid);
					 }
			//Resulted ID inserting into es_preadmission_details table
			$pre_details_array=array('es_preadmissionid'=>$inset_id,
									'admission_status'=>'newadmission',
									'pre_class' => $pre_class,
									"scat_id"=>$scat_id,
									'pre_fromdate'=>$frm_acadmicdates,
									'pre_todate'=>$to_acadmicdates);
			 $pre_details_array = stripslashes_deep($pre_details_array);
			 $db->insert("es_preadmission_details",$pre_details_array);
		     if($old_balance>=1){
			 $old_bal_arr = array("studentid"=>$inset_id,"old_balance"=>$old_balance,"balance"=>$old_balance,"created_on"=>date("Y-m-d"));
			 $old_bal_arr = stripslashes_deep($old_bal_arr);
			 $db->insert("es_old_balances",$old_bal_arr);
			 
			 }
		             
			
					 $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_preadmission','Pre Admission','','".$pid."','ADD STUDENT','".$_SERVER['REMOTE_ADDR']."',NOW())";
					$log_insert_exe=mysql_query($log_insert_sql);
					 
					 
					 if(isset($transport) && $transport=="YES"){
					echo $insert_sql="INSERT INTO es_trans_board_allocation_to_student (`board_id`,`student_staff_id`,`type`,`status`,`created_on`) VALUES('".$boardid."','".$inset_id."','student','Active',NOW())";
					 mysql_query($insert_sql);
					 }
					 // Send SMS
					 if($pre_mobile1!="" && function_exists('curl_init')){
					 $url = "http://122.166.5.17/desk2web/SendSMS.aspx?UserName=".MOBILE_USERNAME."&password=".MOBILE_PASSWORD."&MobileNo=".$pre_mobile1."&SenderID=".MOBILE_SENDER_ID."&CDMAHeader=".CDMA_HEADER."&Message=Registered%20Sucessfully-EIMS%20Username:".$pre_student_username."%20Password:".$pre_student_password."&isFlash=false";
					$curl = curl_init();
					curl_setopt ($curl, CURLOPT_URL, $url);
					curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1);
					$request_result = curl_exec ($curl);
					 $request_result;
					curl_close ($curl);
					 }
					 
			if($pre_emailid!=""){		 
			$finance_info  = getarrayassoc("SELECT *FROM `es_finance_master`  ORDER BY `es_finance_masterid` DESC LIMIT 0 , 1");		 
					$headers = "From: ".$finance_info['fi_email'] ."\r\n"; 
			//$headers = "From: ".ADMINTESTMAIL."\r\n";
		    $headers .= 'MIME-Version: 1.0' . "\r\n";
		    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		    $to   = $pre_emailid;
		    $subject = ucwords($finance_info['fi_schoolname']). " -   Registration Number: ".$inset_id; 
		    $message='<table width="80%" cellspacing="2" cellpadding="2" border="0">
						
						<tr>
							<td align="left"> Dear '.stripslashes(ucwords($pre_name)).',</td>
						</tr>
						<tr>
							<td align="left"><p>Your admission has been successfully completed. Below are your login details to access Student Module.</P></td>
							
						</tr>
						
						<tr>
							<td align="left"><p> User Name : '.$pre_student_username.' </P>
							                 <p>Password : '.$pre_student_password.'</p>
							</td>
							
						</tr>
						
						<tr>
							<td align="left"><p>Kind Regards</P></td>
							
						</tr>
						
						<tr>
							<td align="left"><p>Great Britain Convent <br>
6, NIT Plot, Ward No. 10, Nr. BHEL Quarter, Ring Road Jaripatka,<br />
Nagpur-14<br />
Email :- sunriseconvent@gmail.com<br>
Contact:- 0721-2641208, 3191208</P></td>

						</tr>
				</table>'; 
				
		    @mail($to, $subject, $message, $headers);
		  
			 }
			
	      }	
		   //header("Location: ?pid=21&action=editstudent&sid=$inset_id&clid=$pre_class&secid=&emsg=80");
		  header("Location: ?pid=21&action=serchclass&sid=$inset_id&clid=$pre_class&secid=&emsg=4");
		  exit;
			 
	 }
}
	$es_enquiry     = new es_enquiry();
	
	$es_enquiryList = $es_enquiry->GetList(array(array("es_enquiryid", "=", "$uid")), "es_enquiryid", false);
	
?> 