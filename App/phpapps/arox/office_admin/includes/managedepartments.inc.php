<?php

sm_registerglobal('pid', 'action','emsg','savegroups','savesubject','gid','sid','cid','save');

/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
	
	//Adding Multiple Groups
	
	if ($savegroups=='Save Groups'){			
			extract($_POST);		
			for ($ig=0; $ig<count($groupname); $ig++) {	
			if($groupname[$ig]!='')
			{	
			$obj_groups = new es_deapartment();
			$obj_groups->es_deapartmentanme  = ($groupname[$ig]);
			$obj_groups->status = "active";
			$obj_groups->Save();					
			}
			}
			$emsg = 1;
			header("Location:?pid=45&action=manageclasses&emsg=".$emsg);
			exit;	
	}
	
	//Adding Multiple Classes
	
	if ($save=='Save'){
			extract($_POST);		
			for ($ic=0; $ic<count($classname); $ic++) {	
			if($classname[$ic])
			{
			$obj_groups = new es_deapartment();
			$obj_classes = new es_deptposts();
			$obj_classes->es_postname = $classname[$ic];
			$obj_classes->es_deapartmentid = $classtype[$ic];
			$es_deptname= $obj_groups ->Get($classtype[$ic]);
			$obj_classes->es_deapartmentname = $es_deptname->es_deapartmentanme;			
			$obj_classes->status = "active";
			$obj_classes->Save();					
			}
			}
			$emsg = 9;
			header("Location:?pid=45&action=manageclasses&emsg=".$emsg);
			exit;
	}
	
		//Adding Multiple Subject
		
		if ($savesubject=='Save Subject'){			
			extract($_POST);		
			for ($is=0; $is<count($subject); $is++) {	
			if($subject[$is]!='')
			{	
			$obj_subject = new es_subject();
			$obj_subject->es_subjectname = strtoupper($subject[$is]);
			$obj_groups->es_grouporderby = "1";
			$obj_subject->Save();					
			}
			}
			$emsg = 8;
			header("Location:?pid=45&action=manageclasses&emsg=".$emsg);
			exit;	
	}
	
	
	if($action == 'manageclasses') {
	// Fetching Multiple Rows for Groups
	$obj_grouplist    = new es_deapartment();
	$obj_grouplistarr = $obj_grouplist->GetList(array(array("es_deapartmentid", ">", 0)) );
	//array_print($obj_grouplistarr);
	
	// Fetching Multiple Rows for Classes
	$obj_classlist    = new es_deptposts();
	$obj_classlistarr = $obj_classlist->GetList(array(array("es_deptpostsid", ">", 0)) );
	
		
	}
	
	// Deleting Group
	if($action=='deletegroup')
	{
		$obj_delgroup = new es_deapartment();
		$obj_delgroup->es_deapartmentId = $gid;
		$obj_delgroup->Delete();
		//$emsg = ;
		header("Location:?pid=45&action=manageclasses");
		exit;	
		
	}
	
	// Deleting Class
	if($action=='deleteclass')
	{
		$obj_feesmaster = new es_classes();
		$obj_feesmaster->es_classesId = $cid;
		$obj_feesmaster->Delete();
		//$emsg = ;
		header("Location:?pid=45&action=manageclasses");
		exit;	
	}
		// Deleting Group
	if($action=='deletesubject')
	{
		$obj_delsubject = new es_subject();
		$obj_delsubject->es_subjectId = $sid;
		$obj_delsubject->Delete();
		//$emsg = ;
		header("Location:?pid=45&action=manageclasses");
		exit;	
		
	}
?>