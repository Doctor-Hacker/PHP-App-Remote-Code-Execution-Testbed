<?php
include_once (INCLUDES_CLASS_PATH . DS . 'class.es_assignment.php');
sm_registerglobal('pid', 'action','emsg', 'update', 'uid', 'start', 'asds_order', 'submit', 'column_name', 'admin', 'as_suject', 'as_class','as_sec','as_lastdate','as_name','as_description', 'Submit','as_createdon','as_lastdate','as_marks','update','es_assid','back','delete','prev','pre_year','column_name');


 
/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
		header('location: ./?pid=1&unauth=0');
		exit;
	}
/**End of the permissions */
/********* Dates For Acadamic year ***********/ 


	$school_details_sel = "SELECT * FROM `es_finance_master` ORDER BY `es_finance_masterid` DESC";
	$school_details_res = getamultiassoc($school_details_sel);
/********* End Dates For Acadamic year ***********/ 
//fetching  Class  //
	$exesqlquery = "SELECT * FROM `es_classes`";
    $getclasslist = getamultiassoc($exesqlquery);
	
$obj_assignment = new es_assignment();
$es_subject		= new es_subject();
	
	
if ($Submit=='Submit'){
	if (isset($Submit)){
	  //$as_lastdate1 = func_date_conversion("d/m/Y h:i A","Y-m-d",$as_lastdate); 
	
	$substr = substr($as_lastdate, 0, 10);
	$final_date = str_replace('/', '-', $substr);
	
	$as_lastdate1 = date("Y-m-d", strtotime($final_date));
	
	
	/*echo $as_lastdate." <br>Final Date: ".$final_date."<br>".$as_lastdate1;
	exit;*/
		 $vlc = new FormValidation();		
		if ($as_class=="") {
		$errormessage[0]="Select Class";			  
		}
		if(!$vlc->is_nonNegNumber($as_marks)){
			$errormessage[3]="Enter Valid Marks";	
		}elseif ($as_marks=="" || $as_marks>100 || $as_marks<1) {
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
		}/*elseif($as_lastdate1<date("Y-m-d")){
		$errormessage[5]="Enter Valid Date ";	
		}	*/
       if(basename($_FILES["txt_file"]["name"])=='') {
   	   $errormessage[4]="Upload Document";	  
	    }
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
					
		$obj_assignment->as_lastdate = $as_lastdate1;
		$obj_assignment->as_marks = $as_marks;
	}
	


  if(filesize($txt_file)!= " " ) {
   {
	 $p="../student_staff/assignments/";
     //$dest_path = $p.$HTTP_POST_FILES['txt_file']['name'];
    $dest_path = $p.$_FILES['txt_file']['name'];
	
	 //$srcfile   = $HTTP_POST_FILES['txt_file']['tmp_name'];
	 $srcfile   = $_FILES['txt_file']['tmp_name'];
	 
     move_uploaded_file($srcfile,$dest_path);
     //$as_description = $HTTP_POST_FILES['txt_file']['name'];  
	 $as_description = $_FILES['txt_file']['name'];
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
	$obj_assignment->person_type ='admin';
	$obj_assignment->created_by =$_SESSION['eschools']['admin_id'];

	 
	  $id=$obj_assignment->save();
				    if(isset($id) && $id!="") {
					
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_assignment','ASSIGNMENT','ADD ASSIGNMENT','".$id."','ADD ASSIGNMENT','".$_SERVER['REMOTE_ADDR']."',NOW())";
$log_insert_exe=mysql_query($log_insert_sql);
				 
				 
	  $emsg = 1;
		header("Location:?pid=4&action=addassignment&emsg=".$emsg);
        }
 }
      }
    }

if(isset($as_class) && $as_class!='')
{
$es_subjectList = $es_subject->GetList(array(array("es_subjectshortname","=","$as_class")));
}
	
    /**********update assignment **************/
if ($action=='edit'){ 
	$es_assignmentlist = $obj_assignment->GetList(array(array("es_assignmentid", "=", "$es_assid")), "es_assignmentid", false);
	if (isset($update)){
	
	$len=strlen($as_lastdate);
	if($len==10)
	{
		 $arr=explode('/',$as_lastdate);
	 $as_lastdate1 = $arr[2].'-'.$arr[1].'-'.$arr[0];
	}
	else
	{
	$as_lastdate1 = func_date_conversion("d/m/Y h:i A","Y-m-d",$as_lastdate); 
	}

	//echo $as_lastdate;

	 //$arr=explode('/',$as_lastdate);
	// $as_lastdate1 = $arr[2].'-'.$arr[1].'-'.$arr[0];

	
	  if ($as_name=="") {
		$errormessage[2]="Enter Assignment Name";			  
		}	
	   	
		if ($as_marks=="" || $as_marks>100 || $as_marks<1) {
		$errormessage[3]="Enter Marks less than 100";			  
		}	
		if ($as_marks<1) {
		$errormessage[3]="Enter Valid Marks";			  
		}	
		/*
		$oldDate = $as_lastdate;
			$arr = explode('/', $oldDate);
			$as_lastdate1 = $arr[2].'-'.$arr[1].'-'.$arr[0];*/
//echo $as_lastdate1;exit;
		if ($as_lastdate=="") {
		$errormessage[5]="Enter Date";	  
		}elseif($as_lastdate1<date("Y-m-d")){
		$errormessage[5]="Enter Valid Date ";	
		}
		$no_rows = $db->getone("SELECT COUNT(*) FROM es_assignment WHERE as_suject='".$as_suject."' AND as_class='".$as_class."' AND as_name='".$as_name."' AND es_assignmentid !=".$es_assid);
		if($no_rows>=1){$errormessage[6]="Assignment Already exists";	}
      if(count($errormessage)==0){	
         $as_lastdate1 = formatDateCalender($as_lastdate,"Y-m-d");	
         $p="../student_staff/assignments/";
		 if (isset($HTTP_POST_FILES['txt_file']['name'])&&$HTTP_POST_FILES['txt_file']['name']!=""){
		 $dest_path = $p.$HTTP_POST_FILES['txt_file']['name'];
		 $srcfile   = $HTTP_POST_FILES['txt_file']['tmp_name'];
		 move_uploaded_file($srcfile,$dest_path);
		 $as_description = $HTTP_POST_FILES['txt_file']['name'];  
	     }else{
	     $as_description =$prev;
	     }	
         $as_lastdate1 = formatDateCalender($as_lastdate);
	    $db->update('es_assignment', "as_name ='" . $as_name . "', as_sec='" . $as_sec . "', as_marks='" . $as_marks . "', as_description='" . $as_description . "',as_lastdate ='" . $as_lastdate1 . "'", 'es_assignmentid =' . $es_assid);
	    
		 
		 
		 $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_assignment','ASSIGNMENT ','VIEW ASSIGNMENT','".$es_assid."','Edit Assignment ','".$_SERVER['REMOTE_ADDR']."',NOW())";
$log_insert_exe=mysql_query($log_insert_sql);

		  $emsg = 2;
	     header('location:?pid=4&action=view&emsg='.$emsg);
		 exit;
        }	
      }
	}
	/**************End of Update **********/
	/**************back **************** **/	
	
	if (isset($back)){
		header('location:?pid=4&action=view');
	}
  /**------------- end of back button --------------- **/
 /*************** listing  assignments ****************/
if ($action=='view'  || $action=='print_assignment'){ 
  	if ($submit=='search') {
	     if($as_class==""){
	     $errormessage[0]="Please Select Class ";
	    } 
		if(count($errormessage)==0){
	    $academic_res = getarrayassoc("SELECT * FROM `es_finance_master` WHERE `es_finance_masterid`= '". $pre_year ."'");
	    $from_acad = $academic_res['fi_ac_startdate'];
	    $to_acad   = $academic_res['fi_ac_enddate']; 
		$orderby      = 'es_assignmentid';
		$navigatepage = 2;
		$finance_res  = getarrayassoc("SELECT * FROM `es_finance_master` WHERE `es_finance_masterid`= '" . $pre_year . "'");
		$from_finance = $finance_res['fi_startdate'];
		$to_finance   = $finance_res['fi_enddate'];
		$no_rows1     = "SELECT * FROM es_assignment WHERE as_class = '" . $as_class . "' AND as_lastdate BETWEEN '" . $from_acad . "' AND '" . $to_acad . "'"; 
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
	$adminlisturl ="&submit=search&pre_year=$pre_year&as_class=$as_class";
	
}	

if ($action=='delete'){

$db->delete('es_assignment','es_assignmentid=' . $es_assid); 
$emsg = 3;


 $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_assignment','ASSIGNMENT ','VIEW ASSIGNMENT','".$es_assid."','Delete Assignment ','".$_SERVER['REMOTE_ADDR']."',NOW())";
$log_insert_exe=mysql_query($log_insert_sql);


	     header('location:?pid=4&action=view&emsg='.$emsg);
		 exit;
}	

/***********End of listing assignments ***********/
	
?>
