<?php
sm_registerglobal('pid', 'action','update', 'start', 'column_name', 'asds_order', 'uid', 'sid','sjid','admin','st_class','st_subject',
'st_postaplied',
'st_fname',
'st_lname',
'st_mobilenumber',
'st_email',
'st_wtest',
'st_techin',
'st_finalin',
'st_prvpac',
'st_gender',
'st_basic',
'st_doj',
'st_post',
'st_user',
'st_password',
'st_theme',
'st_department',
'st_remarks',
'st_selectremarks',
'st_pemobno',
'st_primsub',
'st_dob',
'st_secsub',
'st_fahbname',
'st_daughter',
'st_son',
'st_pass1',
'st_pass2',
'st_primarysub',
'st_secondrysub',
'st_pass3',
'st_board1',
'st_board2',
'st_board3',
'st_year1',
'st_year2',
'st_year3',
'st_inst1',
'st_inst2',
'st_inst3',
'st_posts',
'st_position1',
'st_position2',
'st_position3',
'st_period1',
'st_period2',
'st_period3',
'st_address',
'st_city',
'st_state',
'st_country',
'st_pecountry',
'st_pincode',
'st_phone',
'st_residency',
'st_mobile',
'st_peadress',
'st_pecity',
'st_pestate',
'st_country',
'st_pepin',
'st_post',
'st_pephone',
'st_peress',
'st_mobno',
'st_refname1',
'st_refname2',
'st_refname3',
'st_departments',
'st_pin',
'st_desg1',
'st_desg2',
'st_desg3',
'st_inst4',
'st_inst5',
'st_inst6',
'st_email1',
'st_email2',
'st_email3',
'photo_upload',
'departments',
'file1',
'emsg',
'searchselect',
'serchdepartment',
'st_postse',
'staff_department',
'st_doj2',
'st_qualification','transport','boardid',
'takainterview','staffading','staffsearch','Submit','update','updateading','selectionsearch','updateinterview','back','addnew','Search','dc1','dc2','photo','staff_type','st_marks1','st_marks2','st_marks3','st_bloodgroup','st_permissions','feed_dis','permision_str1');


/**
* Only Super admin or moderator of the corporate can be allowed to access this page
*/

  if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
		header('location: ./?pid=1&unauth=0');
		exit;
	}
 $pattern_pass = "/(\s)/";
		$vlc    = new FormValidation();	
/**End of the permissions    **/


//fetching  Class  ///

	$exesqlquery = "SELECT * FROM `es_classes`";
	$getclasslist = getamultiassoc($exesqlquery);
	

//fetching  dept  ///

	$exesqlquery = "SELECT * FROM `es_departments`";
	$getdeptlist = getamultiassoc($exesqlquery);
	
	
/******************** Registration ***********************/

	$es_staff = new es_staff();
	$es_requirement = new es_requirement();
	$es_candidate = new es_candidate();
	$obj_dept       = new es_departments();
	$obj_postlist   = new es_deptposts();
	$es_subject = new es_subject();

   $query  =  $es_requirement ->GetList(array(array("status", "=", 'active')) );

/**
* *********************Candidate Details *******************
*/

if($action == 'interview_registration')
{

	$eachrecord1 = $es_candidate ->Get($sid);	
	$es_postList = $obj_postlist->GetList(array(array("es_postshortname","=","$eachrecord1->st_department")));
	if (isset($Submit)){
	$error	= "";
	$vlc    = new FormValidation();
	
		if (!$vlc->is_alpha_numeric($st_department)) {
		$errormessage[0] = "Enter Department";	  
		}
		if ($st_postaplied == "select") {
			$errormessage[1] = "Please Select Post";			  
		}
		if (empty($st_fname)) {
		$errormessage[2] = "Enter First Name"; 
		}	
		
		/*if (!$vlc->is_alpha_numeric($st_lname)){
		$errormessage[3] = "Enter Last Name"; 
		}*/
		/*if (!$vlc->is_nonNegNumber($st_mobilenumber)) {
			
				$errormessage[4] = "Enter Mobile No"; 
			}elseif(strlen($st_mobilenumber)!=10 ){
			    $errormessage[4] = "Enter Valid 10 digit Mobile No";
			
			}*/
		if($st_selectremarks==""){
			$errormessage[5] = "Please Select Remarks";	
		}elseif($st_selectremarks=="selected"){
		    if(empty($st_basic)){
			$errormessage[6] = "Please Enter Salary";
			}
			if(empty($st_doj)){
			$errormessage[7] = "Please Select Date of joining";	
		    }
		}
		
		
     
   if(count($errormessage) == 0)
	 {
	
	 	if($st_departments!='')
	{
		$departments=$st_departments;
	}
	else
	{
		$departments=$eachrecord1->st_department;
	}

	if($error=="" && isset($error))
	{
		$eachrecord1 = $es_candidate ->Get($sid);
		
	if (isset($st_posts)){
		$es_staff ->st_post = $st_posts;
	}
	 
	 
	if (isset($st_fname)){
		$es_staff ->st_firstname = $st_fname;
	}
	if(isset($st_gender)){
		
		$es_staff->st_gender=$st_gender;
	}
	if (isset($st_lname)){
		$es_staff ->st_lastname = $st_lname;
	}
	if (isset($st_mobilenumber)){
		$es_staff ->st_mobilenocomunication =$st_mobilenumber;
		}
	
	if (isset($st_email)){
		$es_staff ->st_email = $st_email;
		}
	if (isset($st_wtest)){
		$es_staff ->st_writentest = $st_wtest;
		
	}
	if (isset($st_dob)){
		 $st_dob1 = func_date_conversion("d/m/Y","Y-m-d",$st_dob);
		$es_staff ->st_dob = $st_dob1;
		
	}
	if (isset($st_techin)){
		$es_staff ->st_technicalinterview = $st_techin;
		
	}
	if (isset($st_finalin)){
		$es_staff ->st_finalinterview = $st_finalin;
		
	}
	if (isset($st_selectremarks)){
		$es_staff ->status = $st_selectremarks;
		
	}
	if (isset($st_prvpac)){
		$es_staff ->st_perviouspackage = $st_prvpac;
		
	}
	if (isset($st_basic)){
		$es_staff ->st_basic = $st_basic;
		
	}
	if (isset($st_doj)){
		$st_doj1 = func_date_conversion("d/m/Y","Y-m-d",$st_doj);
		$es_staff ->st_dateofjoining = $st_doj1;
		
	}
	
	if (isset($st_department)){
		$es_staff ->st_department = $departments;
		
	}
	if (isset($st_remarks)){
		$es_staff ->st_remarks = $st_remarks;
		
	}
	if (isset($st_secondrysub)){
		
		$es_staff ->st_primarysubject = $st_secondrysub;
		
	}
	if (isset($eachrecord1->st_fatherhusname)){
		$es_staff ->st_fatherhusname = $eachrecord1->st_fatherhusname ;
		
	}
	if (isset($eachrecord1->st_noofdughters)){
		$es_staff ->st_noofdughters = $eachrecord1->st_noofdughters;
		
	}
	if (isset($eachrecord1->st_noofsons)){
		$es_staff ->st_noofsons = $eachrecord1->st_noofsons;
		
	}
	if (isset($eachrecord1->st_examp1)){
		$es_staff ->st_examp1 = $eachrecord1->st_examp1;
		
	}
	if (isset($eachrecord1->st_examp2)){
		$es_staff ->st_examp2 = $eachrecord1->st_examp2;
		
	}
	if (isset($eachrecord1->st_examp3)){
		$es_staff ->st_examp3 = $eachrecord1->st_examp3;
		
	}
	
	
	if (isset($eachrecord1->st_marks1)){
		$es_staff ->st_marks1 = $eachrecord1->st_marks1;
		
	}
	if (isset($eachrecord1->st_marks2)){
		$es_staff ->st_marks2 = $eachrecord1->st_marks2;
		
	}
	if (isset($eachrecord1->st_marks3)){
		$es_staff ->st_marks3 = $eachrecord1->st_marks3;
		
	}
	
	
	if (isset($eachrecord1->st_borduniversity1)){
		$es_staff ->st_borduniversity1 = $eachrecord1->st_borduniversity1;
		
	}
	if (isset($eachrecord1->st_borduniversity2)){
		$es_staff ->st_borduniversity2= $eachrecord1->st_borduniversity2;
		
	}
	if (isset($eachrecord1->st_borduniversity3)){
		$es_staff ->st_borduniversity3 = $eachrecord1->st_borduniversity3;
		
	}
	if (isset($eachrecord1->st_year1)){
		$es_staff ->st_year1 = $eachrecord1->st_year1;
		
	}
	if (isset($eachrecord1->st_year2)){
		$es_staff ->st_year2 = $eachrecord1->st_year2;
		
	}
	if (isset($eachrecord1->st_year3)){
		$es_staff ->st_year3 = $eachrecord1->st_year3;
		
	}
	if (isset($eachrecord1->st_insititute1)){
		$es_staff ->st_insititute1 = $eachrecord1->st_insititute1;
		
	}
	if (isset($eachrecord1->st_insititute2)){
		$es_staff ->st_insititute2 = $eachrecord1->st_insititute2;
		
	}
	if (isset($eachrecord1->st_insititute3)){
		$es_staff ->st_insititute3 = $eachrecord1->st_insititute3;
		
	}
	if (isset($eachrecord1->st_position1)){
		$es_staff ->st_position1 = $eachrecord1->st_position1;
		
	}
	if (isset($eachrecord1->st_position2)){
		$es_staff ->st_position2 = $eachrecord1->st_position2;
		
	}
	if (isset($eachrecord1->st_position3)){
		$es_staff ->st_position3 = $eachrecord1->st_position3;
		
	}
	if (isset($eachrecord1->st_period1)){
		$es_staff ->st_period1 = $eachrecord1->st_period1;
		
	}
	if (isset($eachrecord1->st_period2)){
		$es_staff ->st_period2 = $eachrecord1->st_period2;
		
	}
	if (isset($eachrecord1->st_period3)){
		$es_staff ->st_period3 = $eachrecord1->st_period3;
		
	}
	if (isset($eachrecord1->st_pradress)){
		$es_staff ->st_pradress = $eachrecord1->st_pradress;
		
	}
	if (isset($eachrecord1->st_prcity)){
		$es_staff ->st_prcity = $eachrecord1->st_prcity;
		
	}
	if (isset($eachrecord1->st_prstate)){
		$es_staff ->st_prstate = $eachrecord1->st_prstate;
		
	}
	if (isset($eachrecord1->st_prcountry)){
		$es_staff ->st_prcountry = $eachrecord1->st_prcountry;
		
	}
	if (isset($eachrecord1->st_prpincode)){
		$es_staff ->st_prpincode = $eachrecord1->st_prpincode;
		
	}
	if (isset($eachrecord1->st_prphonecode)){
		$es_staff ->st_prphonecode = $eachrecord1->st_prphonecode;
		
	}
	if (isset($eachrecord1->st_prresino)){
		$es_staff ->st_prresino = $eachrecord1->st_prresino;
		
	}
	if (isset($eachrecord1->st_prmobno)){
		$es_staff ->st_prmobno = $eachrecord1->st_prmobno;
		
	}
	if (isset($eachrecord1->st_peadress)){
		$es_staff ->st_peadress =$eachrecord1->st_peadress;
		
	}
	if (isset($eachrecord1->st_pecity)){
		$es_staff ->st_pecity = $eachrecord1->st_pecity;
		
	}
	if (isset($eachrecord1->st_pestate)){
		$es_staff ->st_pestate = $eachrecord1->st_pestate;
		
	}
	if (isset($eachrecord1->st_pecountry)){
		$es_staff ->st_pecountry = $eachrecord1->st_pecountry;
		
	}
	if (isset($eachrecord1->st_pepincode)){
		$es_staff ->st_pepincode = $eachrecord1->st_pepincode;
		
	}
	if (isset($eachrecord1->st_pephoneno)){
		$es_staff ->st_pephoneno = $eachrecord1->st_pephoneno;
		
	}
	if (isset($eachrecord1->st_peresino)){
		$es_staff ->st_peresino = $eachrecord1->st_peresino;
		
	}
	if (isset($eachrecord1->st_pemobileno)){
		$es_staff ->st_pemobileno = $eachrecord1->st_pemobileno;
		
	}
	if (isset($eachrecord1->st_refposname1)){
		$es_staff ->st_refposname1 = $eachrecord1->st_refposname1;
		
	}
	if (isset($eachrecord1->st_refposname2)){
		$es_staff ->st_refposname2 = $eachrecord1->st_refposname2;
		
	}
	if (isset($eachrecord1->st_refposname3)){
		$es_staff ->st_refposname3 = $eachrecord1->st_refposname3;
		
	}
	if (isset($eachrecord1->st_refdesignation1)){
		$es_staff ->st_refdesignation1 = $eachrecord1->st_refdesignation1;
		
	}
	if (isset($eachrecord1->st_refdesignation2)){
		$es_staff ->st_refdesignation2 = $eachrecord1->st_refdesignation2;
		
	}
	if (isset($eachrecord1->st_refdesignation3)){
		$es_staff ->st_refdesignation3 = $eachrecord1->st_refdesignation3;
		
	}
	if (isset($eachrecord1->st_refinsititute1)){
		$es_staff ->st_refinsititute1 = $eachrecord1->st_refinsititute1;
		
	}
	if (isset($eachrecord1->st_refinsititute2)){
		$es_staff ->st_refinsititute2 = $eachrecord1->st_refinsititute2;
		
	}
	if (isset($eachrecord1->st_refinsititute3)){
		$es_staff ->st_refinsititute3 = $eachrecord1->st_refinsititute3;
		
	}
	if (isset($eachrecord1->st_refemail1)){
		$es_staff ->st_refemail1 = $eachrecord1->st_refemail1;
		
	}
	if (isset($eachrecord1->st_refemail2)){
		$es_staff ->st_refemail2 = $eachrecord1->st_refemail2;
		
	}
	if (isset($eachrecord1->st_refemail3)){
		$es_staff ->st_refemail3 = $eachrecord1->st_refemail3;
		
	}
	if (isset($st_user)){
		$es_staff ->st_username = $st_user;
		
	}
	if (isset($st_password)){
		$es_staff ->st_password = $st_password;
		
	}
	if (isset($st_theme)){
		$es_staff ->st_theme = $st_theme;
		
	}
	if (isset($st_qualification)){
		$es_staff ->st_qualification = $st_qualification;
		
	}
	
	 $es_staff->intdate = date('Y-m-d H:i:s');
	 $es_staff->tcstatus  ='notissued';
	 $es_staff->selstatus ='accepted';
	  $es_staff->hrdsid  =$sid;
	
   if ($insertedid = $es_staff ->Save())
	   {
	   $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_staff','HRD','Take Interview','".$insertedid."','INTERVIEW ATTENDED CANDIDATE','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
	   	
		$db->update('es_candidate',"status ='completed',es_staffid='".$insertedid."',staff_status='notadded'",'es_candidateid ='. $sid);
			
		header('location:?pid=58&action=applicants_list&emsg=42');
		  }
		}
	   }
	}
}
	
/****************** End of Registration ******************** **/
/********************** Back ***************************/	
	
	if (isset($back)){
		header('location:?pid=58&action=applicants_list');
	}
/*************** End of Back Button -*******************/


/***************** View Listing ************************/
	if($action == 'applicants_list')
	{
		$q_limit  = 58;
	if ( !isset($start) ){
		$start = 0;
	   }	
	$no_rows = count($es_staff ->GetList(array(array("status", "!=", 'added')) ));
	
		$orderby_array = array('orb1'=>'es_staffid', 'orb2'=>'es_staffid', 'orb3'=>'st_firstname', 'orb4'=>'st_postaplied', 'orb5'=>'st_department', 'orb6'=>'intdate', 'orb7'=>'status');
		
		if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
			$orderby = $orderby_array[$column_name];
		}else{
			$orderby = "es_staffid";
		}
		if (isset($asds_order)&&$asds_order == 'ASC'){
			$order = true;
		}else{
			$order = false;
		}
		
	$es_staffList = $es_staff ->GetList(array(array("status", "!=", 'added')) , $orderby, $order,  "$start , $q_limit");
	
	}
	/**************** End of Listing ************************ **/
	
	
	/********************** Take interview ***************************/	

	if (isset($takainterview)){
		header('location: ?pid=58&action=interview_registration');
	}
/***************- end of Take interview -*******************/


/********************** Add To Staff ***************************/	

	if($action == 'addtostaff') {
		$es_staffList1 = $es_staff ->GetList(array(array("es_staffid", "=", "$sid")), "es_staffid", false);
		$es_staffList2 = $es_staff ->Get($sid);
		
	     if(isset($st_class) && $st_class!='') {
		$es_subjectList = $es_subject->GetList(array(array("es_subjectshortname","=","$st_class")));
	      }		
	}
/*************** End of Add To Staff-*******************/

/*************************** adding for staff************************ **/
if(isset($staffading))
{

        $vlc  = new FormValidation();	
		 if($feed_dis=="teaching"){
			 if ($st_class == '') {
			$errormessage[0] = "Select Class";	  
			}
			if ($st_subject == '') {
			$errormessage[1] = "Select Subject";	  
			}
			if(count($permision_str1)>=1){$permision_str1 = implode(",",$permision_str1);	}
		}
		if (!$vlc->is_alpha_numeric($st_user)) {
		$errormessage[2] = "Enter valid user name";	  
		}
			else{
			
			$pattern = "/^([a-zA-Z0-9._-]+)$/";
			if (!preg_match($pattern,$st_user)){
					  $errormessage[5]="Enter valid User Name";        
			
		
		
		}
		
		else{
		$no_records = sqlnumber("SELECT * FROM es_staff WHERE st_username='".$st_user."' AND es_staff_id!=".$sid);
		
		if($no_records>0){
			$errormessage[2] = "User Name Already exist";	
		}
		}	  }
		if ($st_password == '') {
		$errormessage[3] = "Enter valid Password";	  
		}elseif (preg_match($pattern_pass,$st_password)){
		$errormessage[3]="Password must not contain spaces
";
		}
		if (!$vlc->is_alpha_numeric($st_password)) {
				 $errormessage[3] = "Enter valid Password"; 
			}
			
		if ($st_basic == '') {
		$errormessage[4] = "Enter Basic Salary";	  
		}
		if ($st_doj == '') {
		$errormessage[5] = "Select Date of joining";	  
		}
		
		if (!$vlc->is_nonNegNumber($st_mobile)) {
			
				$errormessage[7] = "Enter Mobile No"; 
			}elseif(strlen($st_mobile)!=10 ){
			    $errormessage[7] = "Enter Valid 10 digit Mobile No";
			
			}
			
		
			
			
				
	if (count($errormessage) == 0)
		{
		if(isset($_FILES["photo_upload"]["tmp_name"]) && $_FILES["photo_upload"]["tmp_name"]!=""){
		$str = date("mdY_hms");
		
		$new_thumbname = "staff_".$str;
		
		$file1 = basename($_FILES["photo_upload"]["name"]);
		
		$transferfile = "images/staff/";
		
		$transferfile = $transferfile.$file1; 
		
		
		
		$file = $new_thumbname.$file1;
		
 
	if ($_FILES["photo_upload"]["error"] > 0){
	
		$error_image = "Image Is Not Uploded";
		
		$error .= "user";
	}
// The "i" after the pattern delimiter indicates a case-insensitive search

	/*if ((preg_match("/JPEG/i", "$file")) || (preg_match("/png/i", "$file")) || (preg_match("/jpg/i", "$file"))){ 
		if (!move_uploaded_file($_FILES["photo_upload"]["tmp_name"], $transferfile)){
			$error_image = "Image Is Not Uploded";
			$error .= "user";
	    }
	}else{
		$error_image = "Invalid Image Format";
		$error .= "user";	
	}	
	}else{
	$file = "userphoto.gif";*/
	}
   
	$image = $_FILES['photo_upload']['name'];
		if(is_uploaded_file($_FILES['photo_upload']['tmp_name'])) {	
			$ext=explode(".",$_FILES['photo_upload']['name']);
			$str=date("mdY_hms");
			$new_thumbname = "staff_".$str."_".$ext[0].".".$ext[1];
			$updir = "images/staff/";
			$uppath = $updir.$new_thumbname;
			move_uploaded_file($_FILES['photo_upload']['tmp_name'],$uppath);
			$image=$new_thumbname;
			
		} else {
			$image = "userphoto.gif";
		}
	$sub = $st_secsub;
	
	if ($error==""){
	 

	 
		$st_dob3 = func_date_conversion("d/m/Y","Y-m-d",$st_dob);	
		$st_doj3 = func_date_conversion("d/m/Y","Y-m-d",$st_doj);	
		$db->update('es_staff',
			"st_postaplied         ='" . $st_postaplied . "', 
			st_firstname           ='" . $st_fname . "',
			st_lastname            ='" . $st_lname . "', 
			st_gender              ='" . $st_gender . "',
			st_dob                 ='" . $st_dob3 . "',
			st_class               ='" . $st_class . "',
			st_subject             ='" . postname($st_subject) . "',
			st_primarysubject      ='" . $sub . "',
			st_fatherhusname       ='" . $st_fahbname . "',
			st_noofdughters        ='" . $st_daughter . "',
			st_noofsons            ='" . $st_son . "',
			st_email               ='" . $st_email . "',
			st_examp1              ='" . $st_pass1 . "',
			st_examp2              ='" . $st_pass2 . "',
			st_examp3              ='" . $st_pass3 . "',
			st_borduniversity1     ='" . $st_board1 . "',
			st_borduniversity2     ='" . $st_board2 . "',
			st_borduniversity3     ='" . $st_board3. "',
			st_year1               ='" . $st_year1 . "',
			st_year2               ='" . $st_year2 . "',
			st_year3               ='" . $st_year3 . "',
			st_insititute1         ='" . $st_inst1 . "',
			st_insititute2         ='" . $st_inst2 . "',
			st_insititute3         ='" . $st_inst3 . "',
			st_position1           ='" . $st_position1 . "',
			st_position2           ='" . $st_position2 . "',
			st_position3           ='" . $st_position3 . "',
			st_period1             ='" . $st_period1 . "',
			st_period2             ='" . $st_period2 . "',
			st_period3             ='" . $st_period3 . "',
			st_pradress            ='" . $st_address . "',
			st_prcity              ='" . $st_city . "',
			st_prpincode           ='" . $st_pin . "',
			st_prphonecode         ='" . $st_phone . "',
			st_prstate             ='" . $st_state . "',
			st_prresino            ='" . $st_residency . "',
			st_prcountry           ='" . $st_country . "',
			st_prmobno             ='" . $st_mobile . "',
			st_peadress            ='" . $st_peadress . "',
			st_pecity              ='" . $st_pecity . "',
			st_pepincode           ='" . $st_pepin . "',
			st_pephoneno           ='" . $st_pephone . "',
			st_pestate             ='" . $st_pestate . "',
			st_peresino            ='" . $st_pepin . "',
			st_pecountry           ='" . $st_pecountry . "',
			st_pemobileno          ='" . $st_country . "',
			st_refposname1         ='" . $st_refname1 . "',
			st_refposname2         ='" . $st_refname2 . "',
			st_refposname3         ='" . $st_refname3 . "',
			st_refdesignation1     ='" . $st_desg1 . "',
			st_refdesignation2     ='" . $st_desg2 . "',
			st_refdesignation3     ='" . $st_desg3 . "',
			st_refinsititute1      ='" . $st_inst4 . "',
			st_refinsititute2      ='" . $st_inst5 . "',
			st_refinsititute3      ='" . $st_inst6 . "',
			st_refemail1           ='" . $st_email1 . "',
			st_refemail2           ='" . $st_email2 . "',
			image                  ='" . $image . "',
			status                 =     'added',
			st_dateofjoining       ='" . $st_doj3 . "',
			st_basic               ='" . $st_basic . "',
			st_perviouspackage     ='" . $st_prvpac . "',
			st_refemail3           ='" . $st_email3 . "',
			st_username            ='" . $st_user . "',
			st_qualification       ='" . $st_qualification . "',
			st_password            ='" . $st_password . "',
			st_marks1            ='" . $st_marks1 . "',
			st_marks2            ='" . $st_marks2 . "',
			st_marks3            ='" . $st_marks3 . "',
			st_bloodgroup            ='" . $st_bloodgroup . "',
			st_permissions            ='" . $permision_str1 . "',
			teach_nonteach            ='" . $feed_dis . "',
			st_theme               ='pink.css'",'es_staffid =' . $sid);
		
			$db->update("es_candidate","staff_status='addedtostaff'","es_staffid=". $sid);
			
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
					
					
					$query1="SELECT st_post FROM `es_staff` WHERE es_staffid='".$sid."'";
					$row1=$db->getrow($query1);
					
					//echo $row1['st_post'];
					
					$query2="SELECT es_postname FROM es_deptposts WHERE es_deptpostsid='".$row1['st_post']."'";
					$row2=$db->getrow($query2);
					
					//echo $row2['es_postname'];
					 
			if($st_email!=""){	
			$dap_det = get_staffdetails($sid);	 
			$finance_info  = getarrayassoc("SELECT *FROM `es_finance_master`  ORDER BY `es_finance_masterid` DESC LIMIT 0 , 1");		 
			$headers = "From: ".$finance_info['fi_email'] ."\r\n";  
		    $headers .= 'MIME-Version: ' . "\r\n";
		    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		    $to   = $st_email;
		    $subject = ucwords($finance_info['fi_schoolname']). " -   Staff Id: ".$sid; 
			/*
			echo postname($st_posts['st_posts']);
			 deptname($dap_det['st_department']);
			 
			 echo postname($st_posts['es_postname']);
			echo $postName;
			echo postname($st_posts);
			*/
			
		//	exit;
		
		    $message='<table width="80%" cellspacing="2" cellpadding="2" border="0">
						
						<tr>
							<td align="left"> Dear '.stripslashes(ucwords($st_fname)).' '.stripslashes(ucwords($st_lname)).',</td>
						</tr>
						<tr>
							<td align="left"><p>You are appointed as '.$row2['es_postname']	.' ['.deptname($dap_det['st_department'] ).']. Below are your login details to access Staff Module. </P></td>
							
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
							<td align="left"><p>Himalyan Public Sr.Sec.School<br>
								Nagrota Bagwan Distt. Kangra <br>
								Himachal Pradesh<br>
								Email :- info@himalyanpublicschool.com<br>
								Contact:- 01892-250514</P></td>
							
						</tr>
						
						
						
				       </table>';
		    @mail($to, $subject, $message, $headers);
			}
		header('location: ?pid=58&action=applicants_list&emsg=36');
	
	}
	}
	
}	
/*************************** End of staff adding **********************************/

/*************************** Staff Viewing ************************ **/

if ($action == 'staffviewing'  || $action == 'print_staff'){
	$q_limit  = 58;
	if ( $start=="" ){
		$start = 0;
	   }	
	$no_rows = count($es_staff ->GetList(array(array("status", "=", 'added'),array("selstatus", "=", 'accepted'),array("tcstatus", "=", 'notissued'))));
	$orderby_array = array('orb1'=>'es_staffid','orb2'=>'st_firstname', 'orb3'=>'st_postaplied', 'orb4'=>'st_department', 'orb5'=>'st_dateofjoining');
		
	if (isset($column_name) && array_key_exists($column_name, $orderby_array)) {
		$orderby = $orderby_array[$column_name];
	}else{
		$orderby = "es_staffid";
		}
	if (isset($asds_order)&&$asds_order == 'DESC'){
		$order = false;
	}else{
		$order = true;
	}
	
		
	$es_staffview = $es_staff ->GetList(array(array("status", "=", 'added'),array("selstatus", "=", 'accepted'),array("tcstatus", "=", 'notissued')), $orderby, $order,  "$start , $q_limit");
	
	
/***************************End of Staff Viewing ************************ **/	
		
/*******************Searching Staff according to the department *************/	
	
	if($staffsearch=='Search'){
		
		$q_limit  = 58;
		
			if ( !isset($start) ){
					$start = 0;
	   	    }
	   
	    if( $staff_type == 'added' ){
	   
	$no_rows = count($es_staff ->GetList(array(array("st_department", "=", $staff_department),array("status", "=", $staff_type),array("selstatus", "=",'accepted' ),array("tcstatus", "=", 'notissued'))));
	
	     }elseif(isset($staff_type) && $staff_type == 'dismisied' ){
		
		  $no_rows = count($es_staff ->GetList(array(array("st_department", "=", $staff_department),array("tcstatus", "=", 'issued'))));
		  
		  }		
					
		$orderby_array = array('orb1'=>'es_staffid', 'orb2'=>'cfs_name', 'orb3'=>'cfs_modeofadds', 'orb4'=>'cfs_posteddate');
		
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
		
		
		if(isset($staff_type) && $staff_type == 'added' ){
		
			$es_staffview = $es_staff ->GetList(array(array("st_department", "=", $staff_department),array(	"status", "=", $staff_type),array("selstatus", "=",'accepted' ),array("tcstatus", "=", 'notissued')) , $orderby, 	$order,  "$start , $q_limit");
			
			
	    }elseif(isset($staff_type) && $staff_type == 'dismisied' ){
	 
	 $es_staffview = $es_staff ->GetList(array(array("st_department", "=", $staff_department),array("tcstatus", "=", 'issued')) , $orderby, $order,  "$start , $q_limit");
	 
	    }
		 if($no_rows == '0'){
	
		 $nill="No records found" ;
	}
	}	
	$adminlisturl = "&staffsearch=Search&staff_department=".$staff_department."&staff_type=$staff_type";

}

/*if($action=='print_staff'){

$es_staffview = $es_staff ->GetList(array(array("status", "=", 'added'),array("selstatus", "=", 'accepted'),array("tcstatus", "=", 'notissued')));
$no_rows = count($es_staff ->GetList(array(array("status", "=", 'added'),array("selstatus", "=", 'accepted'),array("tcstatus", "=", 'notissued'))));

		
		$q_limit  = 1;
		
			if ( !isset($start) ){
					$start = 0;
	   	    }
	   
	    if( $staff_type == 'added' ){
	   
	$no_rows = count($es_staff ->GetList(array(array("st_department", "=", $staff_department),array("status", "=", $staff_type),array("selstatus", "=",'accepted' ),array("tcstatus", "=", 'notissued'))));
	
	     }elseif(isset($staff_type) && $staff_type == 'dismisied' ){
		
		  $no_rows = count($es_staff ->GetList(array(array("st_department", "=", $staff_department),array("tcstatus", "=", 'issued'))));
		  
		  }		
					
		$orderby_array = array('orb1'=>'es_staffid', 'orb2'=>'cfs_name', 'orb3'=>'cfs_modeofadds', 'orb4'=>'cfs_posteddate');
		
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
		
		
		if(isset($staff_type) && $staff_type == 'added' ){
		
			$es_staffview = $es_staff ->GetList(array(array("st_department", "=", $staff_department),array(	"status", "=", $staff_type),array("selstatus", "=",'accepted' ),array("tcstatus", "=", 'notissued')) , $orderby, 	$order,  "$start , $q_limit");
			
			
	    }elseif(isset($staff_type) && $staff_type == 'dismisied' ){
	 
	 $es_staffview = $es_staff ->GetList(array(array("st_department", "=", $staff_department),array("tcstatus", "=", 'issued')) , $orderby, $order,  "$start , $q_limit");
	 
	    }
		 if($no_rows == '0'){
	
		 $nill="No records found" ;
	}
	
	
}
*/
/*******************End of Searching Staff according to the department *************/	

/********************** Edit Staff ***************************/	
if($action == 'editstaff')
{
	$es_staffListedit = $es_staff ->GetList(array(array("es_staffid", "=", "$sid")), "es_staffid", false);

//fetching  dept  ///
	$exesqlquery = "SELECT * FROM `es_departments`";
	$getdeptlist = getamultiassoc($exesqlquery);

	
	//fetching  dept  ///
	if($st_class!='')
	{
	$es_subjectList = $es_subject->GetList(array(array("es_subjectshortname","=","$st_class")));
	}

}
/*************** End of Edit Staff *******************************************/


/********************** Update Staff ***************************/	

	if(isset($updateading))
	{
	
		$vlc    = new FormValidation();	
		if ($st_fname == "") {
			$errormessage[0]="Enter First Name";			  
		}
		
		/*if ($st_lname == "") {
			$errormessage[2]="Enter last Name";			  
		}*/
		 		
		if ($st_department == "") {
			$errormessage[5]="Enter Department";	  
		} 
		
		if ($st_posts == "") {
			$errormessage[5] = "Enter Post";	  
		} 
		if($feed_dis=="teaching"){
			if ($st_class == "") {
				$errormessage[6]="Enter class";	  
			}		
			
			if ($st_subject == "") {
				$errormessage[7]="Enter subject";	  
			}
		}
		if ($st_mobile=="") {
			$errormessage[8]="Enter Mobile Number";			  
		}
		if ($st_basic=="") {
			$errormessage[9]="Enter Salary";			  
		}
		
		
		if ($st_doj2=="") {
			$errormessage[10]="Select Date of joining";			  
		}
		if (isset($transport) && $transport=="YES" && $boardid=="") {
			
				$errormessage[11] = "Select Route/Board"; 	 
			}
	
if($_FILES["photo_upload"]["name"] != ''){

        $file = $_FILES['photo_upload']['name'];
		
		if(is_uploaded_file($_FILES['photo_upload']['tmp_name'])) {	
			$ext=explode(".",$_FILES['photo_upload']['name']);
			$str=date("mdY_hms");
			$new_thumbname = "staff_".$str."_".$ext[0].".".$ext[1];
				$updir = "images/staff/";
			$uppath = $updir.$new_thumbname;
			move_uploaded_file($_FILES['photo_upload']['tmp_name'],$uppath);
			$file=$new_thumbname;
			
		} 
}
if($_FILES["photo_upload"]["name"] == ''){
		 $file = $photo;
		
}

	$sub = $st_secsub;
	
	if($st_departments!='')
	{
		$dept = $st_departments;
	}

	if (count($errormessage) == 0){
		
		 $check_sql="SELECT * FROM es_trans_board_allocation_to_student WHERE student_staff_id=".$sid." AND type='staff'";
		 $check_exe=mysql_query($check_sql);
		  $check_num=mysql_num_rows($check_exe);
		 if($check_num==0){	
		 
			$insert_sql="INSERT INTO es_trans_board_allocation_to_student (`student_staff_id`,`status`,`type`,`created_on`) VALUES('".$sid."','Inactive','staff',NOW())";
			mysql_query($insert_sql);
		 }
		
		 if(isset($transport) && $transport=="YES"){	
		$update_sql="UPDATE es_trans_board_allocation_to_student SET `board_id`=".$boardid.",`status`='Active' WHERE type='staff' AND student_staff_id=".$sid;
		 mysql_query($update_sql);
		 }else{
		 $update_sql="UPDATE es_trans_board_allocation_to_student SET `status`='Inactive' WHERE type='staff' AND student_staff_id=".$sid;
		 mysql_query($update_sql);
		 }
		 

     $st_dob1 = func_date_conversion("d/m/Y","Y-m-d",$st_dob);
	 $st_doj1 = func_date_conversion("d/m/Y","Y-m-d",$st_doj2);

	if(count($permision_str1)>=1){$permision_str = implode(",",$permision_str1);	}
	if($feed_dis=="nonteaching"){$st_class=""; $st_subject=""; }
		$db->update('es_staff',
		"st_postaplied         = '".$st_postaplied."', 
		st_firstname           = '".$st_fname."',
		st_lastname            ='" . $st_lname . "', 
		st_gender              ='" . $st_gender . "',
		st_dob                 ='" . $st_dob1 . "',
		st_primarysubject      ='" . $sub . "',
		st_fatherhusname       ='" . $st_fahbname . "',
		st_noofdughters        ='" . $st_daughter . "',
		st_noofsons            ='" . $st_son . "',
		st_email               ='" . $st_email . "',
		st_examp1              ='" . $st_pass1 . "',
		st_examp2              ='" . $st_pass2 . "',
		st_examp3              ='" . $st_pass3 . "',
		st_borduniversity1     ='" . $st_board1 . "',
		st_borduniversity2     ='" . $st_board2 . "',
		st_borduniversity3     ='" . $st_board3. "',
		st_year1               ='" . $st_year1 . "',
		st_year2               ='" . $st_year2 . "',
		st_year3               ='" . $st_year3 . "',
		st_insititute1         ='" . $st_inst1 . "',
		st_insititute2         ='" . $st_inst2 . "',
		st_insititute3         ='" . $st_inst3 . "',
		st_position1           ='" . $st_position1 . "',
		st_position2           ='" . $st_position2 . "',
		st_position3           ='" . $st_position3 . "',
		st_period1             ='" . $st_period1 . "',
		st_period2             ='" . $st_period2 . "',
		st_period3             ='" . $st_period3 . "',
		st_pradress            ='" . $st_address . "',
		st_prcity              ='" . $st_city . "',
		st_prpincode           ='" . $st_pin . "',
		st_prphonecode         ='" . $st_phone . "',
		st_prstate             ='" . $st_state . "',
		st_prresino            ='" . $st_residency . "',
		st_prcountry           ='" . $st_country . "',
		st_prmobno             ='" . $st_mobile . "',
		st_peadress            ='" . $st_peadress . "',
		st_pecity              ='" . $st_pecity . "',
		st_pepincode           ='" . $st_pepin . "',
		st_pephoneno           ='" . $st_pephone . "',
		st_pestate             ='" . $st_pestate . "',
		st_peresino            ='" . $st_pepin . "',
		st_pecountry           ='" . $st_pecountry . "',
		st_pemobileno          ='" . $st_pemobno . "',
		st_refposname1         ='" . $st_refname1 . "',
		st_refposname2         ='" . $st_refname2 . "',
		st_refposname3         ='" . $st_refname3 . "',
		st_refdesignation1     ='" . $st_desg1 . "',
		st_refdesignation2     ='" . $st_desg2 . "',
		st_refdesignation3     ='" . $st_desg3 . "',
		st_refinsititute1      ='" . $st_inst4 . "',
		st_refinsititute2      ='" . $st_inst5 . "',
		st_refinsititute3      ='" . $st_inst6 . "',
		st_refemail1           ='" . $st_email1 . "',
		st_refemail2           ='" . $st_email2 . "',
		image                  ='" . $file . "',
		st_perviouspackage     ='" . $st_prvpac . "',
		st_basic               ='" . $st_basic . "',
		st_dateofjoining       ='" . $st_doj1 . "',
		st_remarks             ='" . $st_remarks . "',
		st_refemail3           ='" . $st_email3 . "',
		st_username            ='" . $st_user . "',
		st_class               ='".$st_class."',
		st_subject             ='".$st_subject."',
		st_department          ='".$dept."',
		st_post                ='".$st_posts."',
		st_qualification       ='".$st_qualification."',
		st_marks1            ='" . $st_marks1 . "',
		st_marks2            ='" . $st_marks2 . "',
		st_marks3            ='" . $st_marks3 . "',
		st_bloodgroup            ='" . $st_bloodgroup . "',
		st_permissions            ='" . $permision_str . "',
		teach_nonteach            ='" . $feed_dis . "',
		st_theme               ='pink.css'",'es_staffid =' . $sid);	
			
header("location: ?pid=58&action=staffviewing&emsg=2&start=$start&action1=selsearch&column_name=es_staffid");
		
		
		
		 $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_staff','STAFF','VIEW STAFF','".$sid."','STAFF UPDATED','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
		}
		
	}	
		
/*************** End of Upadte Staff *******************/

/********************** Add To non Staff ***************************/	

if($action == 'nonselectedlist')
{
$es_nonselectedlist = $es_staff ->GetList(array(array("es_staffid", "=", "$sid")), "es_staffid", false);
	
}

/*************** End of Add To non Staff **************************************/

/********************** Update non selected Staff ***************************/	

if(isset($updateinterview))
{
	 $vlc    = new FormValidation();	
	/*
	}*/
	if ($st_selectremarks == "") {
			$errormessage[11]="Select Remarks";	  
		} 
		
	if ($st_selectremarks == "selected") {
			  
		/*if(isset($st_prvpac) && !$vlc->is_nonNegNumber($st_prvpac)){
		$errormessage[0]="Enter Valid Previous Package";
		}*/
	if(!$vlc->is_nonNegNumber($st_basic)){
		$errormessage[1]="Enter Valid Basic Salary";
	}} 
    if(count($errormessage)==0){
	$st_dob1 = func_date_conversion("d/m/Y","Y-m-d",$st_dob);	
	//$st_doj1 = DatabaseFormat($st_doj,"Y-m-d");
	$st_doj1 = func_date_conversion("d/m/Y","Y-m-d",$st_doj);
		
		$db->update('es_staff',
		"st_postaplied           ='" . $st_postaplied . "', 
		st_firstname             ='" . $st_fname . "',
		st_lastname              ='" . $st_lname . "', 
		st_gender                ='" . $st_gender . "',
		st_dob                   ='" . $st_dob1 . "',
		st_mobilenocomunication  ='" . $st_mobilenumber . "',
		st_email                 ='" . $st_email . "',
		st_writentest            ='" . $st_wtest . "',
		st_technicalinterview    ='" . $st_techin . "',
		st_finalinterview        ='" . $st_finalin . "',
		status                   ='" . $st_selectremarks . "',
		st_perviouspackage       ='" . $st_prvpac . "',
		st_basic                 ='" . $st_basic . "',
		st_dateofjoining         ='" . $st_doj1 . "',
		
		st_remarks               ='" . $st_remarks . "'",'es_staffid =' . $sid);	
			
		header('location: ?pid=58&action=applicants_list&emsg=2');
		}
			
}
/********************** End of upadte non selected Staff-*******************/

/********************** Searching for applicants list ***************************/	

if(isset($selectionsearch)||$action == 'searchlimit' || $action=='print_list') {
	
      $q_limit  = 58;
	  
	   if ( !isset($start) ){
	   
		$start = 0;
		
	   }	
	    
		$orderby_array = array('orb1'=>'es_staffid', 'orb2'=>'cfs_name', 'orb3'=>'cfs_modeofadds', 'orb4'=>'cfs_posteddate');
		
		if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
		
			$orderby = $orderby_array[$column_name];
			
		}else{
		
			$orderby = "es_staffid";
			
		}
		if (isset($asds_order)&&$asds_order == 'ASC'){
		
			$order = true;
			
		}else{
		
			$order = false;
		}
		
		$conditon = array();
		
		if (isset($searchselect) && $searchselect !='' && isset($serchdepartment)&& $serchdepartment!=''){
		
			$conditon[] = array("status", "=", $searchselect);
			
			$conditon[] = array("st_department", "=",$serchdepartment);
		
		}elseif (isset($searchselect)) {
		
        	$conditon[] = array("status", "=", $searchselect);
			
        }elseif(isset($serchdepartment)){
		
        	$conditon[] = array("st_department", "=",$serchdepartment);
			
        }
		
		
	$no_rows1     = count($es_staff ->GetList($conditon));
	
	$es_staffList = $es_staff->GetList($conditon, $orderby, $order, " $start, $q_limit ");
	
	
		}
		
		if($no_rows1 == '0'){
		
		 $nill1="No records found" ;
		 
		}

/**************************** End of Serching for applicants list******************************/	
	


	
/********************** Serch in Staff Section for pagination***************************/
	
if($action1 == 'selsearch')
{
	
      $q_limit  = 58;
	  
	  if ( !isset($start) ){
	  
		$start = 0;
		
	   }	
	   
	    $no_rows = count($es_staff ->GetList(array(array("es_staffid", ">", 0)) ));
	
		$orderby_array = array('orb1'=>'es_staffid','orb2'=>'st_firstname', 'orb3'=>'st_postaplied', 'orb4'=>'st_department', 'orb5'=>'st_dateofjoining');
		
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
		
	$es_staffview = $es_staff ->GetList(array(array("status", "=", 'added')) , $orderby, $order,  "$start , $q_limit");
	
	
	
}
/********************** End of Staff Section ******************************/
	
/********************** Delete Staff *****************************/
	
	
	if ($action == 'deletestaff'){

	$es_staff = new es_staff();
	$es_staff->es_staffId = $sid;
	$es_staff->Delete();
	$emsg = 3;
	header('location:?pid=58&action=staffviewing&emsg'.$emsg);
	exit;

}

/********************** End of Delete Staff ******************************/

if($action =='interview_registration1')
{
	$eachrecord1 = $es_candidate ->Get($sid);
	$db->update('es_candidate',	"status ='notattend',st_emailsend =''",'es_candidateid ='. $sid);
	
	$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_candidate','HRD','Take Interview','".$sid."','INTERVIEW NOT ATTENDED CANDIDATE','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);

    header('location:?pid=23&action=take_interview&emsg=41');
	exit;
}

if($action == 'valuesstaff'){
	//fetching  dept  ///
	$exesqlquery = "SELECT * FROM `es_departments`";
	$getdeptlist = getamultiassoc($exesqlquery);
	
	//fetching  dept  ///
	
	if(isset($st_departments))
	{
	$es_postList = $obj_postlist->GetList(array(array("es_postshortname","=","$st_departments")));
	}
	$eachrecord1 = $es_candidate ->Get($sid);
}

?>