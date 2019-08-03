<?php
include_once (INCLUDES_CLASS_PATH . DS . 'class.es_assignment.php');

sm_registerglobal('pid', 'action','emsg', 'update', 'as_marks', 'uid', 'start', 'asds_order', 'submit', 'column_name', 'admin','as_name', 'as_suject', 'as_class','as_sec','as_lastdate','as_description', 'Submit','as_createdon','as_lastdate','as_marks','update','es_assid','back','delete','prev','pre_year');
/**
* Only Student or schoool staff  can be allowed to access this page
*/ 
checkuserinlogin();
/**End of the permissions*/   

	$school_details_sel = "SELECT * FROM `es_finance_master` ORDER BY `es_finance_masterid` DESC";
	$school_details_res = getamultiassoc($school_details_sel);

//fetching  Class  //*/
    $staff_det = get_staffdetails($_SESSION['eschools']['user_id']);
	$exesqlquery = "SELECT * FROM `es_classes` WHERE  es_classesid=".$staff_det['st_class'];
    $getclasslist = getamultiassoc($exesqlquery);
	
	//fetching  Class  ///

// Add Assignments


$obj_assignment = new es_assignment();
$es_subject		= new es_subject();
if ($Submit=='Submit'){
	if (isset($Submit)){
		
		 $vlc = new FormValidation();		
		if ($as_class=="") {
		$errormessage[0]="Select Class";			  
		}
		if ($as_marks=="" || $as_marks>100 || $as_marks<0) {
		$errormessage[3]="Enter Marks less than 100";			  
		}	
		if ($as_suject=="") {
		$errormessage[1]="Select Subject";			  
		}	
		if ($as_name=="") {
		$errormessage[2]="Enter Assignment";			  
		}	
	   	
		if ($as_lastdate=="") {
		$errormessage[5]="Enter Date";	  
		}	
       if(basename($_FILES["txt_file"]["name"])=='') {
   	   $errormessage[4]="Upload Document";	  
	    }
		
		$finance_res  = getarrayassoc("SELECT * FROM `es_finance_master` ORDER BY  `es_finance_masterid` DESC LIMIT 0,1");
		$from_finance = $finance_res['fi_startdate'];
		$to_finance   = $finance_res['fi_enddate'];
		
		$no_rows = $db->getone("SELECT COUNT(*) FROM es_assignment WHERE as_suject='".$as_suject."' AND as_class='".$as_class."' AND as_name='".$as_name."'");
		if($no_rows>=1){$errormessage[5]="Assignment Already exists";	}

	if($HTTP_POST_FILES['txt_file']['tmp_name']!=""){
		$extention=fileextension( $HTTP_POST_FILES['txt_file']['name']);
}
      $allowed_formats = array("doc", "pdf");
				if ($HTTP_POST_FILES['txt_file']['tmp_name']!=""){
					if (!in_array($extention, $allowed_formats)){
						$errormessage['7']='Upload valid document';

					}
				}
 if(count($errormessage)==0)
	{	
		
    $obj_assignment->as_createdon = date('Y-m-d H:i:s');
	//echo $as_marks ;
	//exit;
	  
	if (isset($as_name)){
		$obj_assignment->as_name = $as_name;
	}
	
	if (isset($as_class)){
		$obj_assignment->as_class = $as_class;
	}
	
	if (isset($as_suject)){
		$obj_assignment->as_suject = $as_suject;
	}
	
	if (isset($as_lastdate)){
		$as_lastdate1 = formatDateCalender($as_lastdate,"Y-m-d");			
		$obj_assignment->as_lastdate = $as_lastdate1;
		$obj_assignment->as_marks = $as_marks;
	}
	


  if(filesize($txt_file)!= " " ) {
   {
	 $p="assignments/";
     $dest_path = $p.$HTTP_POST_FILES['txt_file']['name'];
    
	 $srcfile   = $HTTP_POST_FILES['txt_file']['tmp_name'];
     move_uploaded_file($srcfile,$dest_path);
     $as_description = $HTTP_POST_FILES['txt_file']['name'];  
 	}
  }
	else {
   echo "The file does not exist";
}


		if (isset($as_description)){
		$obj_assignment->as_description = $as_description;
	}	
	
		if (isset($as_marks)){
		$obj_assignment->as_marks =$as_marks;
	} 
	$obj_assignment->person_type ='staff';
	$obj_assignment->created_by =$_SESSION['eschools']['user_id']; 
	
	 if ($obj_assignment->Save())
	  $emsg = 1;
		header("Location:?pid=21&action=addassignment&emsg=".$emsg);
        }
 
      }
    }

if(isset($as_class) && $as_class!='')
{
$es_subjectList = $es_subject->GetList(array(array("es_subjectshortname","=","$as_class")));
}
	
if (isset($update)){

		 if ($as_name=="") {
		$errormessage[2]="Enter Assignment Name";			  
		}	
	   	
		if ($as_marks=="" || $as_marks>100 || $as_marks<0) {
		$errormessage[3]="Enter Marks less than 100";			  
		}	
		
   if(count($errormessage)==0){	
     $as_lastdate1 = formatDateCalender($as_lastdate,"Y-m-d");	
     $p="assignments/";
     if (isset($HTTP_POST_FILES['txt_file']['name'])&&$HTTP_POST_FILES['txt_file']['name']!=""){
	 $dest_path = $p.$HTTP_POST_FILES['txt_file']['name'];
	 $srcfile   = $HTTP_POST_FILES['txt_file']['tmp_name'];
     move_uploaded_file($srcfile,$dest_path);
     $as_description = $HTTP_POST_FILES['txt_file']['name'];  
	 }else{
	 $as_description =$prev;
	 }
	$db->update('es_assignment', "as_name ='" . $as_name . "', 	 as_sec='" . $as_sec . "', as_marks='" . $as_marks . "', as_description='" .          $as_description . "',as_lastdate ='" . $as_lastdate1 . "'", 'es_assignmentid =' . $es_assid);
	
		 $emsg = 2;
	header('location:?pid=21&action=view&emsg='.$emsg);
     }	
 }
    // update assignment 
	
if ($action=='edit'){
	$es_assignmentlist = $obj_assignment->GetList(array(array("es_assignmentid", "=", "$es_assid")), "es_assignmentid", false);
	}


	/**************back **************** **/	
	
	if (isset($back)){
		header('location:?pid=21&action=view');
	}
	/**------------- end of back button --------------- **/
		
	
	
 //  listing  assignments
 
if ($action=='view' || $action=='delete' || $action=='print_assignment'){
	
	if ($submit=='search') {
	     if($as_class==""){
	     $errormessage[0]="Please Select Class ";
	    } 
		if(count($errormessage)==0){
	    $academic_res = getarrayassoc("SELECT * FROM `es_finance_master` WHERE `es_finance_masterid`= '".$pre_year."'");
	    $from_acad = $academic_res['fi_ac_startdate'];
	    $to_acad   = $academic_res['fi_ac_enddate']; 
		$orderby      = 'es_assignmentid';
		$navigatepage = 2;
		$finance_res  = getarrayassoc("SELECT * FROM `es_finance_master` WHERE `es_finance_masterid`= '" . $pre_year . "'");
		$from_finance = $finance_res['fi_startdate'];
		$to_finance   = $finance_res['fi_enddate'];
		$no_rows1     = "SELECT * FROM es_assignment WHERE as_class = '" . $as_class . "' AND as_lastdate BETWEEN '" . $from_acad . "' AND '" .                        $to_acad . "'"; 
		$no_rows      = sqlnumber($no_rows1);
		$q_limit      = 10;
		
		if ( !isset($start) ){
			$start = 0;
		}
		
		$sel_assignments = "SELECT * FROM es_assignment WHERE as_class = '" . $as_class . "' 
							AND as_lastdate BETWEEN '" . $from_acad . "' AND '" . $to_acad . "'  
							ORDER BY " . $orderby . " ASC  LIMIT " . $start . ", " . $q_limit . "";
		$assignment_det = getamultiassoc($sel_assignments);

     }
	}
	$adminlisturl ="&start=$start&submit=search&pre_year=$pre_year&as_class=$as_class";
}

if ($action=='delete'){
	$obj_assignment = new es_assignment();
	$obj_assignment->es_assignmentId = $es_assid;
	$obj_assignment->Delete();
	$emsg = 3;
	header('location:?pid=21&action=view&emsg='.$emsg);
	exit;
}


	
?>
