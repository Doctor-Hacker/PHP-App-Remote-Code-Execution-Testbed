<?php  
include_once (INCLUDES_CLASS_PATH . DS .'class.es_staff.php');

sm_registerglobal('pid','action','update','start','column_name','asds_order','uid','sid','admin',
'st_postaplied',
'st_postaplied12',
'primarysub',
'secondrysub',
'st_fname',
'st_lname',
'st_mobilenumber',
'printtctostaff',
'st_email',
'st_marital',
'st_experience',
'st_category',
'st_fthname',
'st_wtest',
'st_techin',
'st_finalin',
'tcupdate',
'st_prvpac',
'tcstudent',
'st_gender2',
'cl_class',
'cl_section',
'accepcted',
'notaccepcted',
'st_basic',
'st_fahubname',
'st_doj',
'st_post',
'st_department',
'st_remarks',
'st_class',
'st_subject',
'emsg',
'st_selectremarks',
'st_primsub',
'st_dob',
'st_secsub',
'st_fahbname',
'st_daughter',
'st_son',
'st_pass1',
'st_pass2',
'st_pass3',
'st_board1',
'st_board2',
'st_board3',
'st_year1',
'st_year2',
'st_year3',
'serchtcstaff',
'st_inst1',
'st_inst2',
'st_inst3',
'st_position1',
'st_position2',
'st_position3',
'st_period1',
'st_period2',
'st_period3',
'st_address',
'st_faminfo',
'st_hobbies',
'serchofferletter',
'st_city',
'pofferletter',
'st_state',
'st_country',
'st_pecountry',
'st_pincode',
'st_pemobno',
'st_phone',
'st_residency',
'st_mobile',
'st_peadress',
'st_pecity',
'st_pestate',
'st_country',
'tcstafftcserch',
'tcdepartment',
'tcdesignation',
'tcempid',
'st_pepin',
'st_pephone',
'st_peress',
'st_mobno',
'st_refname1',
'st_refname2',
'st_refname3',
'st_pin',
'st_desg1',
'st_desg2',
'st_desg3',
'st_inst4',
'st_inst5',
'st_inst6',
'st_email1',
'st_email2',
'candidateupdate',
'st_email3',
'photo_upload',
'file1',
'file',
'searchselect',
'serchdepartment',
'staff_department',
'blogDesc',
'st_doj2',
'candidatename',
'st_fname2',
'st_lname2',
'st_postaplied2',
'Submit',
'staffading',
'st_postaplied',
'st_email',
'st_user',
'st_password',
'selstatus',
'st_perviouspackage',
'st_basic',
'tcstatus',
'st_department',
'st_qualification','transport','boardid',
'image', 'takainterview', 'stafftcserch', 'tcupdatestudent','staffading','count','checkbox','smail','updateemail','staffsearch','candidateading','Offerupdate','action1','update','emailnotification','updateading','selectionserch','updateinterview','back','addnew','Search','serchinterviewcandidate','dc1','dc2','st_theme','photo','st_remarks','st_noofsons','feed_dis','st_marks1','st_marks2','st_marks3','st_bloodgroup','st_permissions','teach_nonteach');

/**
* Only Admin users can view the pages
*/ 
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
 $pattern_pass = "/(\s)/";
		$vlc    = new FormValidation();	
/**End of the permissions    **/
   $vlc = new FormValidation();

	$es_staff       = new es_staff();
	$es_subject		= new es_subject();
	$obj_dept       = new es_departments();
	$obj_postlist   = new es_deptposts();
	$es_requirement = new es_requirement();
	$query          =  $es_requirement ->GetList(array(array("status", "=", 'active')) );

// fetching  dept  ///

	$exesqlquery = "SELECT * FROM `es_departments`";
	$getdeptlist = getamultiassoc($exesqlquery);
	
// fetching  Class  ///
	$exesqlquery = "SELECT * FROM `es_classes`";
	$getclasslist = getamultiassoc($exesqlquery);
	
/**
* *********************Adding New Staff /NonStaff *******************
*/
	

if ($action=='addnewstaff' || isset($st_department)){

//array_print($_POST);
	$es_postList = $obj_postlist->GetList(array(array("es_postshortname","=","$st_department")));
	
	$es_subjectList = $es_subject->GetList(array(array("es_subjectshortname","=","$st_class")));

 
		
	if (isset($staffading)&& $staffading!="" ){
	 
	
		$vlc    = new FormValidation();	
		if ($st_fname2=="") {
			$errormessage[0]="Enter First Name";			  
		}
		if (!$vlc->is_alpha($st_gender2)) {
			$errormessage[1]="Enter Gender";	  
		}
		if ($st_department=="") {
			$errormessage[8]="Please Select Department";			  
		}
		if ($st_postaplied=="select") {
			$errormessage[9]="Please Select Post";			  
		}
			if($feed_dis=="teaching"){
			if ($st_class=="") {
				$errormessage[6]="Please Select Class Name";			  
			}
			if ($st_subject == "") {
					
				$errormessage[7]="Please Select Subject Name";			  
			}
		}
			if ($st_user=="") {
			$errormessage[5]="Enter User Name";			  
		}
		else{
			
			$pattern = "/^([a-zA-Z0-9._-]+)$/";
			if (!preg_match($pattern,$st_user)){
					  $errormessage[5]="Enter valid User Name";        
			  }
		
		else{
		
		$no_records = sqlnumber("SELECT * FROM es_staff WHERE st_username='".$st_user."'");
		if($no_records>0){
			$errormessage[5] = "User Name Already exist";	
		}}
		}
		if ($st_password=="") {
			$errormessage[3]="Enter Password";			  
		}
		elseif (preg_match($pattern_pass,$st_password)){
		$errormessage[3]="Password must not contain spaces
";
		}
		if (!$vlc->is_alpha_numeric($st_password)) {
				 $errormessage[3] = "Enter valid Password"; 
			}
			
		
	
		
		
		/*if ($st_lname2=="") {
			$errormessage[2]="Enter last Name";			  
		}	*/
	
		if ($st_dob=="") {
			$errormessage[4]="Enter Date of birth";	  
		}
	
		
	
		
		if (!$vlc->is_nonNegNumber($st_mobile)) {
		
			$errormessage[10] = "Enter Valid Mobile No"; 
		}elseif(strlen($st_mobile)!=10 ){
			$errormessage[10] = "Enter Valid Mobile No";
		
		}		  
		
		if ($st_basic=="") {
			$errormessage[11]="Enter Salary";			  
		}
		if ($st_doj2=="") {
			$errormessage[12]="Select Date of joining";			  
		}
		
		if (isset($transport) && $transport=="YES" && $boardid=="") {
			
				$errormessage[13] = "Select Route/Board"; 	 
			}
		
	if (count($errormessage)==0){
	
	if (isset($st_qualification)){
		$es_staff ->st_qualification = $st_qualification;
	}
	if (isset($st_fname2)){
		$es_staff ->st_firstname = $st_fname2;
	}
	
	if (isset($st_postaplied)){
		$es_staff ->st_post  = $st_postaplied;
	}
	
	if (isset($st_fname)){
		$es_staff ->st_firstname = $st_fname;
	}
	
	if (isset($st_department)){
		$es_staff ->st_department = $st_department;
	}
	
	if (isset($st_lname2)){
		$es_staff ->st_lastname = $st_lname2;
	}
	if (isset($st_marital)){
		$es_staff ->st_marital = $st_marital;
	}
	if (isset($st_experience)){
		$es_staff ->st_experience = $st_experience;
	}
	if (isset($st_category)){
		$es_staff ->st_category = $st_category;
	}
	if (isset($st_fthname)){
		$es_staff ->st_fthname = $st_fthname;
	}
	if(isset($st_gender2)){
		
		$es_staff->st_gender=$st_gender2;
	}
		
    if (isset($st_dob)){
		
		$es_staff ->st_dob  = formatDateCalender($st_dob,"Y-m-d");
		
	}
	
	if (isset($st_doj2)){
		
		$es_staff ->st_dateofjoining  = formatDateCalender($st_doj2,"Y-m-d");
	}
	if (isset($st_postaplied2)){
		$es_staff ->st_lastname = $st_postaplied2;
	}
	if (isset($st_primsub)){
		$es_staff ->st_primarysubject = $st_primsub;		
	}		
	if (isset($st_secsub)){
		$es_staff ->st_mobilenocomunication =$st_secsub;
	}
	if (isset($st_password)){
		$es_staff ->st_password = $st_password;
	}
	if (isset($st_user)){
		$es_staff ->st_username = $st_user;
	}		
	if (isset($st_email)){
		$es_staff ->st_email = $st_email;
	}
	if (isset($st_pass1)){
		$es_staff ->st_examp1 = $st_pass1;
	}
	if (isset($st_pass2)){
		$es_staff ->st_examp2 = $st_pass2;
	}
	if (isset($st_pass3)){
		$es_staff ->st_examp3 = $st_pass3;
	}
	
	if (isset($st_marks1)){
		$es_staff ->st_marks1 = $st_marks1;
	}
	if (isset($st_marks2)){
		$es_staff ->st_marks2 = $st_marks2;
	}
	if (isset($st_marks3)){
		$es_staff ->st_marks3 = $st_marks3;
	}
	
	
	if (isset($st_board1)){
		$es_staff ->st_borduniversity1 = $st_board1;
	}
	if (isset($st_board2)){
		$es_staff ->st_borduniversity2= $st_board2;
	}
	if (isset($st_board3)){
		$es_staff ->st_borduniversity3 = $st_board3;
	}
	if (isset($st_year1)){
		$es_staff ->st_year1 = $st_year1;
	}
	if (isset($st_year2)){
		$es_staff ->st_year2 = $st_year2;
	}
	if (isset($st_year3)){
		$es_staff ->st_year3 = $st_year3;
	}
	if (isset($st_inst1)){
		$es_staff ->st_insititute1 = $st_inst1;
	}
	if (isset($st_inst2)){
		$es_staff ->st_insititute2 = $st_inst2;
	}
	if (isset($st_inst3)){
		$es_staff ->st_insititute3 = $st_inst3;
	}
	if (isset($st_position1)){
		$es_staff ->st_position1 = $st_position1;
	}
	if (isset($st_position2)){
		$es_staff ->st_position2 = $st_position2;
	}
	if (isset($st_position3)){
		$es_staff ->st_position3 = $st_position3;
	}
	if (isset($st_period1)){
		$es_staff ->st_period1 = $st_period1;
	}
	if (isset($st_period2)){
		$es_staff ->st_period2 = $st_period2;
	}
	if (isset($st_period3)){
		$es_staff ->st_period3 = $st_period3;
	}
	if (isset($st_address)){
		$es_staff ->st_pradress = $st_address;
	}
	if (isset($st_faminfo)){
		$es_staff ->st_faminfo = $st_faminfo;
	}
	if (isset($st_hobbies)){
		$es_staff ->st_hobbies = $st_hobbies;
	}
	if (isset($st_city)){
		$es_staff ->st_prcity = $st_city;
	}
	if (isset($st_state)){
		$es_staff ->st_prstate = $st_state;
	}
	if (isset($st_country)){
		$es_staff ->st_prcountry = $st_country;
	}
	
	if (isset($st_pin)){
		$es_staff ->st_prpincode = $st_pin;
	}
	if (isset($st_phone)){
		$es_staff ->st_prphonecode = $st_phone;
	}
	if (isset($st_residency)){
		$es_staff ->st_prresino = $st_residency;
	}
	if (isset($st_mobile)){
		$es_staff ->st_prmobno = $st_mobile;
	}
	if (isset($st_peadress)){
		$es_staff ->st_peadress = $st_peadress;
	}
	if (isset($st_pecity)){
		$es_staff ->st_pecity = $st_pecity;
	}
	if (isset($st_pestate)){
		$es_staff ->st_pestate = $st_pestate;
	}
	if (isset($st_pecountry)){
		$es_staff ->st_pecountry = $st_pecountry;
	}
	if (isset($st_pepin)){
		$es_staff ->st_pepincode = $st_pepin;
	}
	if (isset($st_pephone)){
		$es_staff ->st_pephoneno = $st_pephone;
	}
	if (isset($st_pepin)){
		$es_staff ->st_peresino = $st_pepin;
	}
	if (isset($st_pemobno)){
		$es_staff ->st_pemobileno = $st_pemobno;
	}
	if (isset($st_refname1)){
		$es_staff ->st_refposname1 = $st_refname1;
	}
	if (isset($st_refname2)){
		$es_staff ->st_refposname2 = $st_refname2;
	}
	if (isset($st_refname3)){
		$es_staff ->st_refposname3 = $st_refname3;
	}
	if (isset($st_desg1)){
		$es_staff ->st_refdesignation1 = $st_desg1;
	}
	if (isset($st_desg2)){
		$es_staff ->st_refdesignation2 = $st_desg2;
	}
	if (isset($st_desg3)){
		$es_staff ->st_refdesignation3 = $st_desg3;
	}
	if (isset($st_inst4)){
		$es_staff ->st_refinsititute1 = $st_inst4;
	}
	if (isset($st_inst5)){
		$es_staff ->st_refinsititute2 = $st_inst5;
	}
	if (isset($st_inst6)){
		$es_staff ->st_refinsititute3 = $st_inst6;
	}
	if (isset($st_email1)){
		$es_staff ->st_refemail1 = $st_email1;
	}
	if (isset($st_email2)){
		$es_staff ->st_refemail2 = $st_email2;
	}
	if (isset($st_email3)){
		$es_staff ->st_refemail3 = $st_email3;
	}
	if (isset($st_noofsons)){
		$es_staff ->st_noofsons = $st_noofsons;
	}
	if (isset($st_remarks)){
		$es_staff ->st_remarks = $st_remarks;
	}
	if (isset($st_basic)){
		$es_staff ->st_basic = $st_basic;
	}
	if (isset($st_prvpac)){
		$es_staff ->st_perviouspackage = $st_prvpac;
	}
	if (isset($st_class)){
		$es_staff ->st_class = $st_class;
	}
			
	if (isset($st_subject)){
		$es_staff ->st_subject = $st_subject;
	}
	if(count($st_permissions)>=1){$permision_str = implode(",",$st_permissions);
		$es_staff ->st_permissions = $permision_str;
	
		}
	if (isset($st_bloodgroup)){
		$es_staff ->st_bloodgroup = $st_bloodgroup;
	}
	if (isset($feed_dis)){
		$es_staff ->teach_nonteach = $feed_dis;
	}
	
	
	$es_staff->st_theme = "pink.css";
	$es_staff->status ='added';
	$es_staff->tcstatus ='notissued';
	$es_staff->selstatus ='accepted';
     
	$image = $_FILES['image']['name'];
		if(is_uploaded_file($_FILES['image']['tmp_name'])) {	
			$ext=explode(".",$_FILES['image']['name']);
			$str=date("mdY_hms");
			$new_thumbname = "staff_".$str."_".$ext[0].".".$ext[1];
			$updir = "images/staff/";
			$uppath = $updir.$new_thumbname;
			move_uploaded_file($_FILES['image']['tmp_name'],$uppath);
			$image=$new_thumbname;
			
		} else {
			$image = "userphoto.gif";
		}
		
	$es_staff->image = $image;
	
	

	 $getStaff =  $db->getRow('SELECT * FROM `es_staff` WHERE `st_username` = "'.$st_user.'"; '); 

	 if( isset($getStaff)&& $getStaff>0) {
			
	 	header("location:?pid=46&action=addnewstaff&emsg=18");
			exit;
		} 
	 else {

   $insetid = $es_staff->Save();
   $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_staff','STAFF','ADD STAFF','".$insetid."','STAFF ADDED','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
   
   
   if(isset($transport) && $transport=="YES"){
	 $insert_sql="INSERT INTO es_trans_board_allocation_to_student (`board_id`,`student_staff_id`,`type`,`status`,`created_on`) VALUES('".$boardid."','".$insetid."','staff','Active',NOW())";
	 mysql_query($insert_sql);
	 }
   
   
   
                     // Send SMS
					 if($st_mobile!="" && function_exists('curl_init')){
						 $url = "http://122.166.5.17/desk2web/SendSMS.aspx?UserName=".MOBILE_USERNAME."&password=".MOBILE_PASSWORD."&MobileNo=".$st_mobile."&SenderID=".MOBILE_SENDER_ID."&CDMAHeader=".CDMA_HEADER."&Message=Registered%20Sucessfully-EIMS%20Username:".$st_user."%20Password:".$st_password."&isFlash=false";
						$curl = curl_init();
						curl_setopt ($curl, CURLOPT_URL, $url);
						curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1);
						$request_result = curl_exec ($curl);
						$request_result;
						curl_close ($curl);
					 }
			if($st_email!=""){		 
			$finance_info  = getarrayassoc("SELECT *FROM `es_finance_master`  ORDER BY `es_finance_masterid` DESC LIMIT 0 , 1");		
				$headers = "From: ".$finance_info['fi_email'] ."\r\n";  
			//$headers = "From: ".ADMINTESTMAIL."\r\n";
		    $headers .= 'MIME-Version: 1.0' . "\r\n";
		    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		    $to   = $st_email;
		    $subject = ucwords($finance_info['fi_schoolname']). " -    Staff Id: ".$insetid; 
		    $message='<table width="80%" cellspacing="2" cellpadding="2" border="0">
						
						<tr>
							<td align="left"> Dear '.stripslashes(ucwords($st_fname2)).' '.stripslashes(ucwords($st_lname2)).',</td>
						</tr>
						<tr>
							<td align="left"><p>You are appointed as '.postname($st_postaplied).' ['.deptname($st_department).']. Below are your login details to access Staff Module. </P></td>
							
						</tr>
						
						<tr>
							<td align="left"><p> User Name : '.$st_user.' </P>
							                 <p>Password : '.$st_password.'</p>
							</td>
							
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

		 	header('location:?pid=46&action=addnewstaff&emsg=4');
			exit;
		  }
		
	    }

	  }
	
}
?>