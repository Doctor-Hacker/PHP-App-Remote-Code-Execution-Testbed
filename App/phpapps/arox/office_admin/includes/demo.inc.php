<?php 
sm_registerglobal('pid', 'action', 'start','emsg','es_timetablesid',  
  	'es_class', 	
	'es_sec', 		
	'es_day', 	
	'es_period1', 	
	'es_period2',	
	'es_period3', 	 	
	'es_period4', 	
	'es_period5', 		
	'es_period6', 	
	'es_period7', 	
	'es_period8', 
	'es_staffid',	
	'subject', 	
	'staffid',
	'elid',
	'Submit' ,'es_m1','es_m2','es_m3','es_m4','es_m5','es_m6','es_m7','es_m8','es_m9');

/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
		header('location: ./?pid=1&unauth=0');
		exit;
	}

  

/**End of the permissions
 
/**********************************************************************
* Get  groups and Classes
**********************************************************************/
//get groups
 $c_groups = get_groups();

//get classes  */
if (isset($groups)&& $groups!=""){
	$class_data = getClasses($groups);
  }

/* 

ADD timetable
*/				

 $obj_ttclass = new es_timetable();
 
 
if($action=='addtimetable') {	

         if (isset($Submit) && $Submit=='Submit'){
								/* extract($_POST);	
								 echo count($es_staffid);		 
								 for ($i=1; $i<count($es_staffid); $i++) {	
								   echo $es_staffid[$i]."<hr>";
								   } 
								   exit();
								   echo $es_class;
								echo $es_staffid;*/
							   
	 
		
		 
	if($error=="" && isset($error))
	{
		if (isset($es_class)){
			$obj_ttclass->es_class = $es_class;
		}
		if (isset($es_m1)){
			$obj_ttclass->es_m1 = $es_m1;
		}
		if (isset($es_m2)){
			$obj_ttclass->es_m2 = $es_m2;
		}
			if (isset($es_m3)){
			$obj_ttclass->es_m3 = $es_m3;
		}
			if (isset($es_m4)){
			$obj_ttclass->es_m4 = $es_m4;
		}
			if (isset($es_m5)){
			$obj_ttclass->es_m5 = $es_m5;
		}
			if (isset($es_m6)){
			$obj_ttclass->es_m6 = $es_m6;
		}
			if (isset($es_m7)){
			$obj_ttclass->es_m7 = $es_m7;
		}
			if (isset($es_m8)){
			$obj_ttclass->es_m8 = $es_m8;
		}
			if (isset($es_m9)){
			$obj_ttclass->es_m9 = $es_m9;
		}
		
		if (isset($es_t1)){
			$obj_ttclass->es_t1 = $es_mt;
		}
		if (isset($es_t2)){
			$obj_ttclass->es_t2 = $es_t2;
		}
			if (isset($es_t3)){
			$obj_ttclass->es_t3 = $es_t3;
		}
			if (isset($es_t4)){
			$obj_ttclass->es_t4 = $es_t4;
		}
			if (isset($es_t5)){
			$obj_ttclass->es_t5 = $es_t5;
		}
			if (isset($es_t6)){
			$obj_ttclass->es_t6 = $es_t6;
		}
			if (isset($es_t7)){
			$obj_ttclass->es_t7 = $es_t7;
		}
			if (isset($es_t8)){
			$obj_ttclass->es_t8 = $es_t8;
		}
			if (isset($es_t9)){
			$obj_ttclass->es_t9 = $es_t9;
		}
		
				
		if (isset($es_w1)){
			$obj_ttclass->es_w1 = $es_w1;
		}
		if (isset($es_w2)){
			$obj_ttclass->es_w2 = $es_w2;
		}
			if (isset($es_w3)){
			$obj_ttclass->es_w3 = $es_w3;
		}
			if (isset($es_w4)){
			$obj_ttclass->es_w4 = $es_w4;
		}
			if (isset($es_w5)){
			$obj_ttclass->es_w5 = $es_w5;
		}
			if (isset($es_w6)){
			$obj_ttclass->es_w6 = $es_w6;
		}
			if (isset($es_w7)){
			$obj_ttclass->es_w7 = $es_w7;
		}
			if (isset($es_w8)){
			$obj_ttclass->es_w8 = $es_w8;
		}
			if (isset($es_w9)){
			$obj_ttclass->es_w9 = $es_w9;
		}
		
		
			if (isset($es_th1)){
			$obj_ttclass->es_th1 = $es_th1;
		}
		if (isset($es_th2)){
			$obj_ttclass->es_th2 = $es_th2;
		}
			if (isset($es_th3)){
			$obj_ttclass->es_th3 = $es_th3;
		}
			if (isset($es_th4)){
			$obj_ttclass->es_th4 = $es_th4;
		}
			if (isset($es_th5)){
			$obj_ttclass->es_th5 = $es_th5;
		}
			if (isset($es_th6)){
			$obj_ttclass->es_th6 = $es_th6;
		}
			if (isset($es_th7)){
			$obj_ttclass->es_th7 = $es_th7;
		}
			if (isset($es_th8)){
			$obj_ttclass->es_th8 = $es_th8;
		}
			if (isset($es_th9)){
			$obj_ttclass->es_th9 = $es_th9;
		}
		
				if (isset($es_f1)){
			$obj_ttclass->es_f1 = $es_f1;
		}
		if (isset($es_f2)){
			$obj_ttclass->es_f2 = $es_f2;
		}
			if (isset($es_f3)){
			$obj_ttclass->es_f3 = $es_f3;
		}
			if (isset($es_f4)){
			$obj_ttclass->es_f4 = $es_f4;
		}
			if (isset($es_f5)){
			$obj_ttclass->es_f5 = $es_f5;
		}
			if (isset($es_f6)){
			$obj_ttclass->es_f6 = $es_f6;
		}
			if (isset($es_f7)){
			$obj_ttclass->es_f7 = $es_f7;
		}
			if (isset($es_f8)){
			$obj_ttclass->es_f8 = $es_f8;
		}
			if (isset($es_f9)){
			$obj_ttclass->es_f9 = $es_f9;
		}
		
		if (isset($es_s1)){
			$obj_ttclass->es_s1 = $es_s1;
		}
		if (isset($es_s2)){
			$obj_ttclass->es_s2 = $es_s2;
		}
			if (isset($es_s3)){
			$obj_ttclass->es_s3 = $es_s3;
		}
			if (isset($es_s4)){
			$obj_ttclass->es_s4 = $es_s4;
		}
			if (isset($es_s5)){
			$obj_ttclass->es_s5 = $es_s5;
		}
			if (isset($es_s6)){
			$obj_ttclass->es_s6 = $es_s6;
		}
			if (isset($es_s7)){
			$obj_ttclass->es_s7 = $es_s7;
		}
			if (isset($es_s8)){
			$obj_ttclass->es_s8 = $es_s8;
		}
			if (isset($es_s9)){
			$obj_ttclass->es_s9 = $es_s9;
		}
		
		 if ($obj_ttclass->Save())

		 {
			// $emsg = 1;
			//header("Location:?pid=19&action=addroom&emsg=".$emsg);
		 }

		}
		
	 
		for ($i=0; $i<count($es_staffid); $i++) {	
        echo $es_staffid[$i]."<hr>";
   
	   		/*$obj_ttmaster = new es_timetablemaster();
	  		$obj_ttmaster->$es_class = $es_class[$i];
			$obj_ttmaster->$es_staffid = $staffid[$i];
			$obj_ttmaster->$es_subject = $es_subject[$i];
      		$obj_ttmaster->Save();*/
        } 
	    exit;    
    // $emsg = 13 ;
	/*header("Location:?pid=24&action=voucher_entry&emsg=".$emsg);
	 exit;*/
	 // }
}

}

 
 
	   
	  

	   
   



/* --------------Edit------------------- */
/*if($action == 'edittimetable') {
	$obj_ttclass = new es_timetable();
	$es_feemasterdet = $obj_feesmaster->Get($fid);
	//Update fee item
	if($updateclass == 'Update')
	{
	//if($newm1>0 && $newm2!="")
	{
	$db->update('es_timetable', "es_m1 ='" . strtoupper($newm1) . "',	es_m2 	 ='" . $newm2 . "', es_m3 	 ='" . $newm3 . "', es_m4 	 ='" . $newm4 . "', es_m5 	 ='" . $newm5 . "', es_m6 	 ='" . $newm6 . "',es_m7 	 ='" . $newm7 . "',es_m8 	 ='" . $newm8 . "',es_m9 	 ='" . $newm9 . "',es_staffid ='" . $newstaffid . "'", 'es_timetableid =' . $Tid);
	}
	$emsg = 2;
	/*header("Location:?pid=17&action=viewfees&emsg=".$emsg);
	exit;*/
	//}
//}*/
?>
  
 