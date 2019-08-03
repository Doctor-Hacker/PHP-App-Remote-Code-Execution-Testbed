<?php
sm_registerglobal('pid','action','update','emsg','start','submit_from','redirecturl','es_exid','es_chairman','es_vchairman','es_secretary','es_jointsecretary','es_teachrep','es_partrep','es_reservedrep','es_total','es_eduinst','es_add1','es_nopresodent','es_add2','es_phno2','es_nosecretary','es_add3','es_phno3','games','hobbies','update','gender','es_staffid','es_departmentsid','es_status');
/**
* Only Admin users can view the pages
*/


if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}

				
if($action=='list'){

		$sql_qr = "SELECT * FROM  es_execommittee where es_status!='Deleted'";
		$no_rec = sqlnumber($sql_qr);
		//$q= "SELECT * FROM es_preadmission tcstatus!='issued' ";
//		$no_recs = sqlnumber($q);
		if(!isset($start)){$start=0;}
		$q_limit = 20;
		$sql_qr .=" ORDER BY es_exid  ASC LIMIT ".$start.",".$q_limit."";
		$all_sem_det = $db->getrows($sql_qr);

}

if($action=='edit'){

	$sem_det = $db->getrow("SELECT * FROM es_execommittee WHERE es_exid=".$es_exid);
		if(isset($update) && $update!=""){
		
			if(count($errormessage)==0){
		 $query="update es_execommittee set es_chairman='".$es_chairman."',es_vchairman ='".$es_vchairman ."',es_secretary  ='".$es_secretary."',es_jointsecretary='".$es_jointsecretary."',es_teachrep='".$es_teachrep."',es_partrep='".$es_partrep."',es_reservedrep='".$es_reservedrep."',es_total='".$es_total."',es_eduinst='".$es_eduinst."',es_add1='".$es_add1."',es_nopresodent='".$es_nopresodent."',es_add2='".$es_add2."',es_phno2='".$es_phno2."',es_nosecretary='".$es_nosecretary."',es_add3='".$es_add3."',es_phno3='".$es_phno3."' where es_exid=".$es_exid;
				
				mysql_query($query);
				header("location:?pid=122&action=list&emsg=2");
				exit;
			}
		
		
	
		}
	
		
		                  $es_exid = $sem_det['es_exid'];						  
						   $es_chairman  = $sem_det['es_chairman'];						  
						   $es_vchairman = $sem_det['es_vchairman'];		
						   $es_secretary = $sem_det['es_secretary'];
						   $es_jointsecretary = $sem_det['es_jointsecretary'];						  
						   $es_teachrep = $sem_det['es_teachrep'];
						   $es_partrep = $sem_det['es_partrep'];	
						   $es_reservedrep = $sem_det['es_reservedrep'];
						   $es_total = $sem_det['es_total'];
						   $es_eduinst = $sem_det['es_eduinst'];	
						   $es_add1 = $sem_det['es_add1'];	
						   $es_nopresodent = $sem_det['es_nopresodent'];
						   $es_add2 = $sem_det['es_add2'];
						   $es_phno2 = $sem_det['es_phno2'];
						   $es_nosecretary = $sem_det['es_nosecretary'];
						   $es_add3 = $sem_det['es_add3'];
						   $es_phno3 = $sem_det['es_phno3'];
		
}
//}

?>
