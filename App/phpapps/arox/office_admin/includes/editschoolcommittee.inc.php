<?php
sm_registerglobal('pid','action','update','emsg','start','submit_from','redirecturl','ex_id', 'ex_chariman', 'ex_member', 'ex_teachermem', 'ex_nonteachingmem', 'ex_officioses','update','es_status');
/**
* Only Admin users can view the pages
*/


if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}

				
if($action=='list'){

		$sql_qr = "SELECT * FROM  es_schoolcommittee where es_status!='Deleted'";
		$no_rec = sqlnumber($sql_qr);
		//$q= "SELECT * FROM es_preadmission tcstatus!='issued' ";
//		$no_recs = sqlnumber($q);
		if(!isset($start)){$start=0;}
		$q_limit = 20;
		$sql_qr .=" ORDER BY ex_id  ASC LIMIT ".$start.",".$q_limit."";
		$all_sem_det = $db->getrows($sql_qr);

}

if($action=='edit'){

	$sem_det = $db->getrow("SELECT * FROM es_schoolcommittee WHERE ex_id=".$ex_id);
		if(isset($update) && $update!=""){
		
			if(count($errormessage)==0){
		 echo $query="update es_schoolcommittee set ex_chariman='".$ex_chariman."',ex_chariman ='".$ex_chariman ."',ex_teachermem  ='".$ex_teachermem."',ex_nonteachingmem='".$ex_nonteachingmem."',ex_officioses='".$ex_officioses."' where ex_id=".$ex_id;
				
				mysql_query($query);
				header("location:?pid=123&action=list&emsg=2");
				exit;
			}
		
		}
		                  $ex_id = $sem_det['ex_id'];						  
						  $ex_chariman = $sem_det['ex_chariman'];
						  $ex_member = $sem_det['ex_member'];
						  $ex_teachermem = $sem_det['ex_teachermem'];
						  $ex_nonteachingmem = $sem_det['ex_nonteachingmem'];
						  $ex_officioses = $sem_det['ex_officioses'];
		
}
//}

?>
