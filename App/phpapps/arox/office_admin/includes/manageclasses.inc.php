<?php



sm_registerglobal('pid', 'action','emsg','savegroups','savesubject','sub_class','gid','sid','cid','save', 'editGroup','gr_name', 'cgid' , 'cg','class_name', 'editClass','class_type','scid','sub_edit','superadmin','admin','update_emails','hiddenemails','currency','hiddenid','update_currency','paypal_email','student_prefix','slot_prefix','class_type1','es_groupid','group','es_groupname','es_groupsid');



/**

* Only Admin users can view the pages

*/



if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {

	header('location: ./?pid=1&unauth=0');

	exit;

}



//echo $es_groupId;



	$vlc = new FormValidation();

	//Adding Multiple Groups

	

	if ($savegroups=='Save'){			

			extract($_POST);

					

			for ($ig=0; $ig<count($groupname); $ig++) {	

			if($groupname[$ig]!='')

			{	

			$obj_groups = new es_groups();

			$obj_groups->es_groupname = (ucwords($groupname[$ig]));

			//$obj_groups->es_grouporderby = "1";

			$agid = $obj_groups->Save();

			$emsg = 8;

			$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_groups','SET UP','Groups/Classes/Subjects','".$agid."','ADD GROUP','".$_SERVER['REMOTE_ADDR']."',NOW())";

	$log_insert_exe=mysql_query($log_insert_sql);										

			}

			}

			header("Location:?pid=20&action=manageclasses&emsg=".$emsg);

			exit;

			

	}

	

	

	//Adding Multiple Classes

	

	if ($save=='Save')
	{
		extract($_POST);	
		
		// count the total number
		for ($ic=0; $ic<count($classname); $ic++)
		{
			if($classname[$ic])
			{
				$obj_classes = new es_classes();
				$obj_classes->es_classname = strtoupper($classname[$ic]);
				$obj_classes->es_groupId = $classtype[$ic];
				$obj_classes->es_orderby = "1";
	
				$cladid = $obj_classes->Save();
	
				$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_classes','SET UP','Groups/Classes/Subjects','".$cladid."','ADD CLASS','".$_SERVER['REMOTE_ADDR']."',NOW())";
				$log_insert_exe=mysql_query($log_insert_sql);		
			
				$emsg = 9;
			}
		}

		header("Location:?pid=20&action=manageclasses&emsg=".$emsg."&#cls");
		exit;
	}

	

		//Adding Multiple Subject

		

		if ($savesubject=='Save'){

				

			extract($_POST);		

			for ($is=0; $is<count($subject); $is++) {	

			if($subject[$is]!='')

			{	

			

			$obj_subject = new es_subject();

			$obj_subject->es_subjectname = strtoupper($subject[$is]);

			$obj_subject->es_subjectshortname = $sub_class;

			$obj_subject->es_groupId = $group[$is];

			$sadid = $obj_subject->Save();

			$emsg = 1;

			$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_subject','SET UP','Groups/Classes/Subjects','".$sadid."','ADD SUBJECT','".$_SERVER['REMOTE_ADDR']."',NOW())";

	$log_insert_exe=mysql_query($log_insert_sql);	

			

			}

			}

			header("Location:?pid=20&action=manageclasses&emsg=$emsg&sub_class=$sub_class&#subj");

			exit;	

			

		}

	

	

	if($action == 'manageclasses')
	{
		if(isset($sub_class) && $sub_class!="")
		{
			$obj_subjectlist    = new es_subject();
			$obj_subjectlistarr = $obj_subjectlist->GetList(array(array("es_subjectshortname", "=", $sub_class)) );
		}

		// Fetching Multiple Rows for Groups
		$obj_grouplist    = new es_groups();
		$obj_grouplistarr = $obj_grouplist->GetList(array(array("es_groupsid", ">", 0)) );

		// Fetching Multiple Rows for Classes
		$obj_classlist    = new es_classes();
		$obj_classlistarr = $obj_classlist->GetList(array(array("es_classesid", ">", 0)) );
	}

	

	// Deleting Group
	if($action=='deletegroup')
	{
		$obj_delgroup = new es_groups();
		$no_rows = $db->getone("SELECT COUNT(*) FROM es_classes WHERE es_groupid=".$gid);

		/*if($no_rows>=1)
		{
			header("Location:?pid=20&action=manageclasses&emsg=58");
			exit;
		}*/

		if(count($errormessage)==0)
		{
			$obj_delgroup->es_groupsId = $gid;
			$obj_delgroup->Delete();
	
			$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_groups','SET UP','Groups/Classes/Subjects','".$gid."','DELETE GROUP','".$_SERVER['REMOTE_ADDR']."',NOW())";
			$log_insert_exe=mysql_query($log_insert_sql);	
	
			//$emsg = ;
			header("Location:?pid=20&action=manageclasses&emsg=3");
			exit;	
		}
	}

	

	// Deleting Class

	if($action=='deleteclass')
	{
		$obj_feesmaster = new es_classes();
		$no_rows = $db->getone("SELECT COUNT(*) FROM es_preadmission_details WHERE pre_class=".$cid);

		///echo $no_rows ="SELECT COUNT(*) FROM es_preadmission_details WHERE pre_class=".$cid;
		if($no_rows>=1)
		{
			header("Location:?pid=20&action=manageclasses&emsg=59");
			exit;	
		}

		$obj_feesmaster->es_classesId = $cid;
		$obj_feesmaster->Delete();
		$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_classes','SET UP','Groups/Classes/Subjects','".$cid."','DELETE CLASS','".$_SERVER['REMOTE_ADDR']."',NOW())";
		$log_insert_exe=mysql_query($log_insert_sql);	
		//$emsg = ;

		header("Location:?pid=20&action=manageclasses&emsg=3#cls");
		exit;	

	}

	
	// Deleting Subject

	if($action=='deletesubject')

	{

		$obj_delsubject = new es_subject();

		$obj_delsubject->es_subjectId = $sid;

		$obj_delsubject->Delete();

		

		$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_subject','SET UP','Groups/Classes/Subjects','".$sid."','DELETE SUBJECT','".$_SERVER['REMOTE_ADDR']."',NOW())";

	$log_insert_exe=mysql_query($log_insert_sql);	

	

		//$emsg = ;

		header("Location:?pid=20&action=manageclasses&emsg=3#subj");

		exit;	

		

	}

	// Editing the Group

	if (isset($_POST['editGroup_x']) && isset($_POST['editGroup_y']) )
	{

		if (empty($gr_name))
		{
			$errormessage[0] = "Enter Group Name"; 
		}

		if ($errormessage == 0)
		{
			$db->update("es_groups", "es_groupname  = '".ucwords($gr_name)."' " ,"es_groupsid = $gid ");
	
			$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module, submodule, `record_id`, `action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_groups','SET UP','Groups/Classes/Subjects','".$gid."','EDIT GROUP','".$_SERVER['REMOTE_ADDR']."',NOW())";
	
			$log_insert_exe=mysql_query($log_insert_sql);	
	
			header("Location:?pid=20&action=manageclasses&emsg=2");
	
			exit;

		}
	}

	//Editing the Class

	if (isset($_POST['editClass_x']) && isset($_POST['editClass_y'])  ) {

		if (empty($class_name)) {

			$errormessage[0] ="Enter Class"; 

		

		}

		

		if (count($errormessage) == 0) {

		

		$db->update("es_classes", "es_classname = '$class_name',

								   es_groupid	= '$class_type'","es_classesid = $cg" );

		$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_classes','SET UP','Groups/Classes/Subjects','".$cg."','EDIT CLASS','".$_SERVER['REMOTE_ADDR']."',NOW())";

	$log_insert_exe=mysql_query($log_insert_sql);	

		header("Location:?pid=20&action=manageclasses&emsg=2#cls");

		exit;

		}

	

	}

	//Editing the Subject

	if (isset($_POST['editSubject_x']) && isset($_POST['editSubject_y']) ) {

		if (empty($sub_edit)) {

			$errormessage[0] = "Enter Subject";

		}

		

		if (count($errormessage) == 0) {

		

		$db->update("es_subject","es_subjectname ='$sub_edit'","es_subjectid   = '$scid'");

		

		$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_subject','SET UP','Groups/Classes/Subjects','".$scid."','EDIT SUBJECT','".$_SERVER['REMOTE_ADDR']."',NOW())";

	$log_insert_exe=mysql_query($log_insert_sql);	

	

		header("Location:?pid=20&action=manageclasses&emsg=2#subj");

		exit;

		}

	}

	

	if($action=='emailslist'){

	

	    if(isset($update_emails) && $update_emails!=""){

		    if(isset($_SESSION['eschools']['superadmin_email']) && $_SESSION['eschools']['superadmin_email']!=""){

		    if(!$vlc->is_email($superadmin)){ $errormessage[0] = "Enter Valid Email Id for Super Admin";}

			}else{

			    $emails_det = $db->getrow("SELECT * FROM es_manage_emails");

				$superadmin = $emails_det['superadmin'];

			}

			if(!$vlc->is_email($admin)){ $errormessage[1] = "Enter Valid Email Id for Admin";}

			if($paypal_email!="" && !$vlc->is_email($paypal_email)){ $errormessage[2] = "Enter Valid Email Id for Paypal Account";}

			if($student_prefix==""){ $errormessage[3] = "Enter Student Prefix";}

			if($slot_prefix==""){ $errormessage[4] = "Enter Slot Prefix";}

			

			if(count( $errormessage)==0){

				if($hiddenemails>0){

					$db->update("es_manage_emails","superadmin='".$superadmin."',admin='".$admin."',paypal_email='".$paypal_email."',student_prefix='".$student_prefix."',slot_prefix='".$slot_prefix."'",'email_id='.$hiddenemails);

					header("location: ?pid=20&action=emailslist&emsg=2");

					exit;

				}else{

				   $emailarr = array("superadmin"=>$superadmin,"admin"=>$admin,"paypal_email"=>$paypal_email,"student_prefix"=>$student_prefix,"slot_prefix"=>$slot_prefix);

				   $emailarr = stripslashes_deep($emailarr);

				   $db->insert("es_manage_emails",$emailarr);

				   header("location: ?pid=20&action=emailslist&emsg=1");

				   exit;

				}

			}

		}

		

		$emails_det = $db->getrow("SELECT * FROM es_manage_emails");

		if(!$_POST){

		$superadmin = $emails_det['superadmin'];

		$admin = $emails_det['admin'];

		$paypal_email = $emails_det['paypal_email'];

		$student_prefix = $emails_det['student_prefix'];

		$slot_prefix = $emails_det['slot_prefix'];

		}

	}

	if($action=='managecurrency')
	{

	

	    if(isset($update_currency) && $update_currency!=""){

		    if(!$vlc->is_nonNegNumber($currency)){ $errormessage[0] = "Enter Valid Currency";}

			

			if(count( $errormessage)==0){

				if($hiddenid>0){

					$db->update("es_manage_currency","value='".$currency."'",'id='.$hiddenid);

					header("location: ?pid=20&action=managecurrency&emsg=2");

					exit;

				}else{

				   $emailarr = array("value"=>$currency);

				   $emailarr = stripslashes_deep($emailarr);

				   $db->insert("es_manage_currency",$emailarr);

				   header("location: ?pid=20&action=managecurrency&emsg=1");

				   exit;

				}

			}

		}

		

		$currency_det = $db->getrow("SELECT * FROM es_manage_currency");

		if(!$_POST){

		$currency = $currency_det['value'];

		

		}

	}

?>