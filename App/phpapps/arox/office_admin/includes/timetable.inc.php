<?php 
sm_registerglobal('pid', 'action', 'start','emsg','es_timetablesid','es_class','es_sec','es_day','es_staffid','es_subject', 	
'staffid','elid','Submit' ,'es_m1','es_m2','es_m3','es_m4','es_m5','es_m6','es_m7','es_m8','es_m9' ,'es_t1','es_t2','es_t3','es_t4','es_t5','es_t6','es_t7','es_t8','es_t9' ,'es_w1','es_w2','es_w3','es_w4','es_w5','es_w6','es_w7','es_w8','es_w9' ,'es_th1','es_th2','es_th3','es_th4','es_th5','es_th6','es_th7','es_th8','es_th9'  ,'es_f1','es_f2','es_f3','es_f4','es_f5','es_f6','es_f7','es_f8','es_f9' ,'es_s1','es_s2','es_s3','es_s4','es_s5','es_s6','es_s7','es_s8','es_s9','groups','class' ,'orderby', 'updatetable','Update','es_mmid','selectempnum', 'es_staffidnam','es_startfrom','es_endto','es_breakfrom','es_breakto','es_lunchfrom','es_lunchto','es_duration','es_tmid','submit_newsubject','new_subject');
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
/**
* Only Super admin or moderator of the corporate can be allowed to access this page
*/ 
 
/**********************************************************************
* Get  groups and Classes
**********************************************************************/
//get groups
 $c_groups = get_groups();

//get classes  */
if (isset($groups)&& $groups!=""){
	$class_data = getClasses($groups);
  }
  
  $weekdays_arr=array("es_m1"=>"Monday 1st Period", "es_m2"=>"Monday 2nd Period", "es_m3"=>"Monday 3rd Period", "es_m4"=>"Monday 4th Period", "es_m5"=>"Monday 5th Period", "es_m6"=>"Monday 6th Period", "es_m7"=>"Monday 7th Period", "es_m8"=>"Monday 8th Period", "es_m9"=>"Monday 9th Period", 
							
							"es_t1"=>"Tuesday 1st Period", "es_t2"=>"Tuesday 2nd Period", "es_t3"=>"Tuesday 3rd Period", "es_t4"=>"Tuesday 4th Period", "es_t5"=>"Tuesday 5th Period", "es_t6"=>"Tuesday 6th Period", "es_t7"=>"Tuesday 7th Period", "es_t8"=>"Tuesday 8th Period", "es_t9"=>"Tuesday 9th Period", 
							
							"es_w1"=>"Wednesday 1st Period", "es_w2"=>"Wednesday 2nd Period", "es_w3"=>"Wednesday 3rd Period", "es_w4"=>"Wednesday 4th Period", "es_w5"=>"Wednesday 5th Period", "es_w6"=>"Wednesday 6th Period", "es_w7"=>"Wednesday 7th Period", "es_w8"=>"Wednesday 8th Period", "es_w9"=>"Wednesday 9th Period", 
							
							"es_th1"=>"Thursday 1st Period", "es_th2"=>"Thursday 2nd Period", "es_th3"=>"Thursday 3rd Period", "es_th4"=>"Thursday 4th Period", "es_th5"=>"Thursday 5th Period", "es_th6"=>"Thursday 6th Period", "es_th7"=>"Thursday 7th Period", "es_th8"=>"Thursday 8th Period", "es_th9"=>"Thursday 9th Period", 
							
							"es_f1"=>"Friday 1st Period", "es_f2"=>"Friday 2nd Period", "es_f3"=>"Friday 3rd Period", "es_f4"=>"Friday 4th Period", "es_f5"=>"Friday 5th Period", "es_f6"=>"Friday 6th Period", "es_f7"=>"Friday 7th Period", "es_f8"=>"Friday 8th Period", "es_f9"=>"Friday 9th Period", 
							
							"es_s1"=>"Saturday 1st Period", "es_s2"=>"Saturday 2nd Period", "es_s3"=>"Saturday 3rd Period", "es_s4"=>"Saturday 4th Period", "es_s5"=>"Saturday 5th Period", "es_s6"=>"Saturday 6th Period", "es_s7"=>"Saturday 7th Period", "es_s8"=>"Saturday 8th Period", "es_s9"=>"Saturday 9th Period"
							
							);

/* End of get groups */	

//for getting staff details in droup down
if(isset($es_subject) && $es_subject!=""){$condition = " AND st_subject='".$es_subject[0]."'";}
$exesqlquery = "SELECT `es_staffid`,`st_firstname`,`st_lastname` FROM `es_staff` WHERE teach_nonteach='teaching' AND status='added' AND selstatus='accepted' AND tcstatus='notissued' ".$condition."";
	$getstafflist = getamultiassoc($exesqlquery);
	
	
	
	/* Add TimeTable*/			
 	if($action=='addtimetable') {	 
      if ($Submit=='Submit'){
	  $vlc = new FormValidation();		
		if ($es_class=="") {
		$errormessage[0]="Enter Class Name";			  
		}
		if(count($errormessage)==0)
	{
	   {
	    $obj_schooltimings = new es_schooltimings();
		$obj_schooltimings->es_startfrom= $es_startfrom;
		$obj_schooltimings->es_endto= $es_endto;
		$obj_schooltimings->es_breakfrom= $es_breakfrom;
		$obj_schooltimings->es_breakto= $es_breakto;
		$obj_schooltimings->es_lunchfrom= $es_lunchfrom;
		$obj_schooltimings->es_lunchto= $es_lunchto;
		$obj_schooltimings->es_periodduration= $es_periodduration;
		  
	$obj_schooltimings->Save();
	   }
	    $obj_schooltimings = new es_schooltimings();
		$obj_schooltimings->es_m1= $es_m1;
			 $obj_ttclass->es_m2= $es_m2;
		     $obj_ttclass->es_m3= $es_m3;
			 $obj_ttclass->es_m4= $es_m4;
			 $obj_ttclass->es_m5= $es_m5;
			 $obj_ttclass->es_m6= $es_m6;
		
	   		$obj_ttclass = new es_timetable();
			$obj_ttclass->es_class = $es_class;
		     $obj_ttclass->es_m1= $es_m1;
			 $obj_ttclass->es_m2= $es_m2;
		     $obj_ttclass->es_m3= $es_m3;
			 $obj_ttclass->es_m4= $es_m4;
			 $obj_ttclass->es_m5= $es_m5;
			 $obj_ttclass->es_m6= $es_m6;
			 $obj_ttclass->es_m7= $es_m7;
			 $obj_ttclass->es_m8= $es_m8;
			 $obj_ttclass->es_m9= $es_m9;
			
		     $obj_ttclass->es_t1= $es_t1;
			 $obj_ttclass->es_t2= $es_t2;
		     $obj_ttclass->es_t3= $es_t3;
			 $obj_ttclass->es_t4= $es_t4;
			 $obj_ttclass->es_t5= $es_t5;
			 $obj_ttclass->es_t6= $es_t6;
			 $obj_ttclass->es_t7= $es_t7;
			 $obj_ttclass->es_t8= $es_t8;
			 $obj_ttclass->es_t9= $es_t9;
			 
			 $obj_ttclass->es_w1= $es_w1;
			 $obj_ttclass->es_w2= $es_w2;
		     $obj_ttclass->es_w3= $es_w3;
			 $obj_ttclass->es_w4= $es_w4;
			 $obj_ttclass->es_w5= $es_w5;
			 $obj_ttclass->es_w6= $es_w6;
			 $obj_ttclass->es_w7= $es_w7;
			 $obj_ttclass->es_w8= $es_w8;
			 $obj_ttclass->es_w9= $es_w9;
			 
			 $obj_ttclass->es_th1= $es_th1;
			 $obj_ttclass->es_th2= $es_th2;
		     $obj_ttclass->es_th3= $es_th3;
			 $obj_ttclass->es_th4= $es_th4;
			 $obj_ttclass->es_th5= $es_th5;
			 $obj_ttclass->es_th6= $es_th6;
			 $obj_ttclass->es_th7= $es_th7;
			 $obj_ttclass->es_th8= $es_th8;
			 $obj_ttclass->es_th9= $es_th9;
			 
			 $obj_ttclass->es_f1= $es_f1;
			 $obj_ttclass->es_f2= $es_f2;
		     $obj_ttclass->es_f3= $es_f3;
			 $obj_ttclass->es_f4= $es_f4;
			 $obj_ttclass->es_f5= $es_f5;
			 $obj_ttclass->es_f6= $es_f6;
			 $obj_ttclass->es_f7= $es_f7;
			 $obj_ttclass->es_f8= $es_f8;
			 $obj_ttclass->es_f9= $es_f9;
			 
			 $obj_ttclass->es_s1= $es_s1;
			 $obj_ttclass->es_s2= $es_s2;
		     $obj_ttclass->es_s3= $es_s3;
			 $obj_ttclass->es_s4= $es_s4;
			 $obj_ttclass->es_s5= $es_s5;
			 $obj_ttclass->es_s6= $es_s6;
			 $obj_ttclass->es_s7= $es_s7;
			 $obj_ttclass->es_s8= $es_s8;
			 $obj_ttclass->es_s9= $es_s9;

      		$obj_ttclass->Save();
     
	 
	 
	 
	 
	for ($i=0; $i<count($es_staffidnam); $i++)
   	{	
	$obj_ttmaster= new es_timetablemaster();
	$obj_ttmaster->es_class = $es_class;
	$obj_ttmaster->es_subject = $es_subject[$i];

	$obj_ttmaster->es_staffid = $es_staffidnam[$i];
		//$obj_ttmaster->es_staffid = $es_staffidnam[$i];
	
	 $obj_ttmaster->Save();
	 }	 
    $emsg = 1;
	header("Location:?pid=31&action=addtimetable&emsg=".$emsg);
	 exit;
	  }
}
  
}  
 /* End of Add timeTable*/	
	   
/*
*Start of Edit Table Web Page
*/

if(isset($submit_newsubject) && $submit_newsubject!=""){
	if($new_subject!=""){
	echo $sql_sub = "INSERT INTO `es_timetable_subjects` ( `classid` ,`subjectname` ) VALUES('".$es_class."', '".addslashes($new_subject)."' );";
       mysql_query($sql_sub);
 $emsg = 1;
	header("Location:?pid=31&action=edittimetable&es_class=".$es_class."&emsg=".$emsg);
	 exit;
	
	}

}
if($action == 'edittimetable') {

	if(isset($es_class) && $es_class!="") {
		 $obj_ttclass = new es_timetable();
		 $obj_ttmaster = new  es_timetablemaster();
		 
		 $timetabledetails = $obj_ttclass->GetList(array(array("es_class", "=", "$es_class")), "es_timetableid", false);
		 
		 $timetablemasterdetails = $obj_ttmaster->GetList(array(array("es_class", "=", "$es_class")), "es_timetablemasterid", false);
		 
		 

	if (isset($updatetable) && $updatetable=='Update'){ {
		
		$array_values=array("es_m1"=>$es_m1, "es_m2"=>$es_m2, "es_m3"=>$es_m3, "es_m4"=>$es_m4, "es_m5"=>$es_m5, "es_m6"=>$es_m6, "es_m7"=>$es_m7, "es_m8"=>$es_m8, "es_m9"=>$es_m9, 
							
							"es_t1"=>$es_t1, "es_t2"=>$es_t2, "es_t3"=>$es_t3, "es_t4"=>$es_t4, "es_t5"=>$es_t5, "es_t6"=>$es_t6, "es_t7"=>$es_t7, "es_t8"=>$es_t8, "es_t9"=>$es_t9, 
							
							"es_w1"=>$es_w1, "es_w2"=>$es_w2, "es_w3"=>$es_w3, "es_w4"=>$es_w4, "es_w5"=>$es_w5, "es_w6"=>$es_w6, "es_w7"=>$es_w7, "es_w8"=>$es_w8, "es_w9"=>$es_w9, 
							
							"es_th1"=>$es_th1, "es_th2"=>$es_th2, "es_th3"=>$es_th3, "es_th4"=>$es_th4, "es_th5"=>$es_th5, "es_th6"=>$es_th6, "es_th7"=>$es_th7, "es_th8"=>$es_th8, "es_th9"=>$es_th9, 
							
							"es_f1"=>$es_f1, "es_f2"=>$es_f2, "es_f3"=>$es_f3, "es_f4"=>$es_f4, "es_f5"=>$es_f5, "es_f6"=>$es_f6, "es_f7"=>$es_f7, "es_f8"=>$es_f8, "es_f9"=>$es_f9, 
							
							"es_s1"=>$es_s1, "es_s2"=>$es_s2, "es_s3"=>$es_s3, "es_s4"=>$es_s4, "es_s5"=>$es_s5, "es_s6"=>$es_s6, "es_s7"=>$es_s7, "es_s8"=>$es_s8, "es_s9"=>$es_s9
							
							);
		
		$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."',' es_timetablemaster','TIME TABLE','CLASS WISE TIME TABLE','".$es_class."','EDIT  CLASS TIMETABLE','".$_SERVER['REMOTE_ADDR']."',NOW())";
$log_insert_exe=mysql_query($log_insert_sql);


		foreach($array_values as $key=>$value){		
			 $query_sql="SELECT * FROM es_timetablemaster TM WHERE  TM.es_subject='".$value."' AND TM.es_class='".$es_class."'";
			 //echo "<br>";
			 $query_exe=mysql_query($query_sql);
			 $query_row=mysql_fetch_array($query_exe);
			 
			 $query1_sql="SELECT * FROM es_timetable T,es_timetablemaster TM WHERE T.es_class=TM.es_class AND T.es_class!='".$es_class."'";
			 //echo "<br>";
			 $query1_exe=mysql_query($query1_sql);
			 while($query1_row=mysql_fetch_array($query1_exe)){
			 $query2_sql="SELECT * FROM es_timetablemaster TM WHERE TM.es_class='".$query1_row['es_class']."' AND TM.es_subject='".$query1_row[$key]."'";
			 //echo "<br>";
			 $query2_exe=mysql_query($query2_sql);
			 $query2_row=mysql_fetch_array($query2_exe);		
			 
			 if($query2_row['es_staffid']==$query_row['es_staffid'] && $query2_row['es_staffid']!=""){
			 $error[$key]=$key;
			  $errormessage[$key] = "PLease check the staff assigned in ".$weekdays_arr[$key];
			 }
			
			 
			 //print "es_staffid : ".$query_row['es_staffid'];
			 //print "es_staffid : ".$query2_row['es_staffid'];
			 //echo "<br>";echo "<br>";
			 
			 
			 }			 
		 }
		 //array_print($errormessage);
		
		 
	    if(count($error)==0){
		$db->update('es_timetable', "es_m1 ='" . $es_m1 . "', es_m2 ='" . $es_m2 . "',	es_m3 ='" . $es_m3 . "', es_m4 ='" . $es_m4 . "',	es_m5 ='" . $es_m5 . "',es_m6 ='" . $es_m6 . "', es_m7 ='" . $es_m7 . "',es_m8 ='" . $es_m8 . "',es_m9 ='" . $es_m9 . "',es_t1 ='" . $es_t1 . "',es_t2 ='" . $es_t2 . "',es_t3 ='" . $es_t3 . "',es_t4 ='" . $es_t4 . "',es_t5 ='" . $es_t5 . "',es_t6 ='" . $es_t6 . "',es_t7 ='" . $es_t7 . "',es_t8 ='" . $es_t8 . "',es_t9 ='" . $es_t9 . "',es_w1 ='" . $es_w1 . "',es_w2 ='" . $es_w2 . "',es_w3 ='" . $es_w3 . "',es_w4 ='" . $es_w4 . "',es_w5 ='" . $es_w5 . "',es_w6 ='" . $es_w6 . "',es_w7 ='" . $es_w7 . "',es_w8 ='" . $es_w8 . "',es_w9 ='" . $es_w9 . "',es_th1 ='" . $es_th1 . "',es_th2 ='" . $es_th2 . "',es_th3 ='" . $es_th3 . "',es_th4 ='" . $es_th4 . "',es_th5 ='" . $es_th5 . "',es_th6 ='" . $es_th6 . "',es_th7 ='" . $es_th7 . "',es_th8 ='" . $es_th8 . "',es_th9 ='" . $es_th9 . "',es_f1 ='" . $es_f1 . "',es_f2 ='" . $es_f2 . "',es_f3 ='" . $es_f3 . "',es_f4 ='" . $es_f4 . "',es_f5 ='" . $es_f5 . "',es_f6 ='" . $es_f6 . "',es_f7 ='" . $es_f7 . "',es_f8 ='" . $es_f8 . "',es_f9 ='" . $es_f9 . "',es_s1 ='" . $es_s1 . "',es_s2 ='" . $es_s2 . "',es_s3 ='" . $es_s3 . "',es_s4 ='" . $es_s4 . "',es_s5 ='" . $es_s5 . "',es_s6 ='" . $es_s6 . "',es_s7 ='" . $es_s7 . "',es_s8 ='" . $es_s8 . "',es_s9 ='" . $es_s9 . "',es_startfrom ='" . $es_startfrom . "',es_endto ='" . $es_endto . "',es_breakfrom ='" . $es_breakfrom . "',es_breakto ='" . $es_breakto . "',es_lunchfrom ='" . $es_lunchfrom . "',es_lunchto ='" . $es_lunchto . "',es_duration ='" . $es_duration . "'",'es_class =' . "'$es_class'");
	


	
		for ($i=0; $i<count($es_staffidnam); $i++)
   	{	
	if($es_subject[$i]!="" && $es_staffidnam[$i]!="")
	{
	$pr="SELECT * FROM es_timetablemaster WHERE es_subject=". $es_subject[$i]." AND es_class=".$es_class;
	$num=sqlnumber($pr);
	//print $num;
	//exit;
	if($num==0){
	$obj_ttmaster= new es_timetablemaster();
	$obj_ttmaster->es_class = $es_class;
	$obj_ttmaster->es_subject = $es_subject[$i];

	$obj_ttmaster->es_staffid = $es_staffidnam[$i];
	
	
	 
	   $obj_ttmaster->save();
				


	 }
	 else{ $emsg = 71;
	 
	 
	 
	header("Location:?pid=31&action=edittimetable&es_class=".$es_class."&timetable_id=".$timetable_id."&emsg=".$emsg);exit; }
	 }
	 }	 
	for($i=0;$i<=count($es_staffid);$i++)
	{
	//$db->update('es_timetablemaster', "es_staffid ='" . $es_staffid[$i] . "'",'es_timetablemasterid =' . "'$es_mmid[$i]'");
	}
	

	 $emsg = 2;
	header("Location:?pid=31&action=edittimetable&es_class=".$es_class."&emsg=".$emsg);
	 exit;
		}else{ unset($emsg);
		/*header("Location:?pid=31&action=edittimetable&es_class=".$es_class."&emsg=79");
	    exit;*/
		};
	
	}
	
	
	}

}}
/*
*Start of View Table Web Page
*/

if($action == 'viewtimetable') {


	if(isset($es_class) && $es_class!="")
	{
	 $obj_ttclass = new es_timetable();
	 $obj_ttmaster = new  es_timetablemaster();
	 
	 $timetabledetails = $obj_ttclass->GetList(array(array("es_class", "=", "$es_class")), "es_timetableid", false);
	 
	 $timetablemasterdetails = $obj_ttmaster->GetList(array(array("es_class", "=", "$es_class")), "es_timetablemasterid", false);
	
	


$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."',' es_timetable','TIME TABLE','CLASS/STAFF WISE TIME TABLE','".$es_class."','VIEW TIMETABLE','".$_SERVER['REMOTE_ADDR']."',NOW())";
$log_insert_exe=mysql_query($log_insert_sql);





	
	 
	 }


}
// Delete of Staff
if ($action=='delete'){
	
	$obj_timetablemaster = new es_timetablemaster();
	$obj_timetablemaster->es_timetablemasterId = $es_tmid;
	$obj_timetablemaster->Delete();
	$emsg = 3;
	header("Location:?pid=31&action=edittimetable&es_class=".$es_class."&emsg=".$emsg);
	exit;

}

?>

  
	
  
  
 