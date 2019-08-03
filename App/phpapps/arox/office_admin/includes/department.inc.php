<?php

sm_registerglobal('pid', 'action','emsg','deptname','post','eid','save','eid', 'editdept','sub_post','savepost', 'edit_dept','scid','sub_edit','action','emsg','savegroups','savesubject','sub_class','gid','sid','cid','save', 'editGroup','gr_name', 'cgid' , 'cg','class_name', 'editClass','class_type','scid','sub_edit');

/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
	$obj_dept    = new es_departments();

	// Deleting Department
	if($action=='deletedept')
	{
	if($eid!=13){
		$obj_dept->es_departmentsId = $eid;
		$obj_dept->Delete();
		
			$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_departments','STAFF','ADD DEPARTMENT','".$eid."','DEPARTMENT DELETED','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
		
		header("Location:?pid=49&action=department&emsg=3");
		exit;
		}else{
		header("Location:?pid=49&action=department&emsg=77");
		exit;
		}
	}
		
	//Adding Multiple Departments
	
	if ($save!=""){
		for ($i=0; $i<=count($deptname); $i++) {	
			if(trim($deptname[$i])!="")
			{				
				$obj_dept    = new es_departments();
				$obj_dept->es_departmentsId = 0;
				$obj_dept->es_deptname = trim($deptname[$i]);
				$obj_dept->es_orderby = "1";
				$dp=$obj_dept->Save();
				
				$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_departments','STAFF','ADD DEPARTMENT','".$dp."','DEPARTMENT ADDED','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
	
				
			}
		}
		header("Location:?pid=49&action=department&emsg=1");
		exit;
		
	}
	
	// Fetching Multiple Rows for Department
	if($action == 'department') {
		$alldeptlist = $obj_dept->GetList(array(array("es_departmentsid", ">", 0)) );
	}
	
	// Updating the Department
	
	if (isset($_POST['editdept_x']) && isset($_POST['editdept_y'])  ) {
	
	
			if (empty($edit_dept)) {
				 $errormessage[0] = "Enter Class";

			}	
			if($eid!=13){
			
			if (count($errormessage) == 0) { 
			$db->update("es_departments","es_deptname = '$edit_dept'"," es_departmentsid = $eid ");
			
			$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_departments','STAFF','ADD DEPARTMENT','".$eid."','DEPARTMENT UPDATED','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
			header('Location:?pid=49&action=department&emsg=2');
			exit;
			}
			}else{
		header("Location:?pid=49&action=department&emsg=77");
		exit;
		}

	
  
	}
	 if ($savepost!=""){	
 	
			extract($_POST);	
			for ($is=0; $is<count($post); $is++) {	
				if($post[$is]!='')
				{	
					$obj_post = new es_deptposts();
					$obj_post->es_departmentsId = 0;
					$obj_post->es_postname = strtoupper($post[$is]);
					$obj_post->es_postshortname = $sub_post;
					$postinsid=$obj_post->Save();
					
					
					
			$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_departments','STAFF','ADD DEPARTMENT','".$postinsid."','POST ADDED','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
				}
			}
			$emsg = 1;
			header("Location:?pid=49&action=department&emsg=$emsg&sub_post=$sub_post");
			exit;
			
		}		
		
		if(isset($sub_post) && $sub_post!="")
		{
			$obj_postlist   = new es_deptposts();
			$obj_postlisttlistarr = $obj_postlist->GetList(array(array("es_postshortname", "=", $sub_post)) );
		}
		
		
		//Editing the Post
	if (isset($_POST['editpost_x']) && isset($_POST['editpost_y']) ) {
		if (empty($sub_edit)) {
			$errormessage[0] = "Enter Subject";
		}
		
		if (count($errormessage) == 0) {
		if($scid!=16){
		$db->update("es_deptposts","es_postname ='$sub_edit'","es_deptpostsid = '$scid'");
		
		$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_departments','STAFF','ADD DEPARTMENT','".$scid."','POST UPDATED','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
	
	
		header("Location:?pid=49&action=department&emsg=2");
		exit;
		}else{
		header("Location:?pid=49&action=department&emsg=78");
		exit;
		}
		}
	}
	
		// Deleting post
	if($action=='deletepost')
	{
	    if($scid!=16){
		$obj_postlist = new es_deptposts();
		$obj_postlist->es_deptpostsId = $scid;
		$obj_postlist->Delete();
		//$emsg = ;
		
		$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_departments','STAFF','ADD DEPARTMENT','".$scid."','POST DELETED','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
		header("Location:?pid=49&action=department&emsg=3");
		exit;	
		}else{
		header("Location:?pid=49&action=department&emsg=78");
		exit;	
		}
	}
		
?>