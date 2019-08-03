<?php
sm_registerglobal('pid','action','update','emsg','start','submit_from','es_aid','es_achairman', 'es_atrep1', 'es_atrep2', 'es_atrep3', 'es_atrep4', 'es_atrep5', 'es_atrep6','update','es_apopassociation','es_status');
/**
* Only Admin users can view the pages
*/


if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}

				
if($action=='list'){

		$sql_qr = "SELECT * FROM  es_academic where es_status!='Deleted'";
		$no_rec = sqlnumber($sql_qr);
		//$q= "SELECT * FROM es_preadmission tcstatus!='issued' ";
//		$no_recs = sqlnumber($q);
		if(!isset($start)){$start=0;}
		$q_limit = 20;
		$sql_qr .=" ORDER BY es_aid  ASC LIMIT ".$start.",".$q_limit."";
		$all_sem_det = $db->getrows($sql_qr);

}


if($action=='edit'){

	$sem_det = $db->getrow("SELECT * FROM es_academic WHERE es_aid=".$es_aid);
		if(isset($update) && $update!=""){
		
			if(count($errormessage)==0){
		 $query="update es_academic set es_achairman='".$es_achairman."',es_atrep1 ='".$es_atrep1 ."',es_atrep2='".$es_atrep2."',es_atrep3='".$es_atrep3."',es_atrep4='".$es_atrep4."',es_atrep5='".$es_atrep5."',es_atrep6='".$es_atrep6."',es_apopassociation='".$es_apopassociation."' where es_aid=".$es_aid;
				
				mysql_query($query);
				header("location:?pid=126&action=list&emsg=2");
				exit;
			}
		
		}
		                  $es_aid = $sem_det['es_aid'];						  
						  $es_achairman=$sem_det['es_achairman'];
						  $es_atrep1=$sem_det['es_atrep1'];
						  $es_atrep2=$sem_det['es_atrep2'];
						  $es_atrep3=$sem_det['es_atrep3'];
						  $es_atrep4=$sem_det['es_atrep4'];
						  $es_atrep5=$sem_det['es_atrep5'];
						  $es_atrep6=$sem_det['es_atrep6'];
						  $es_apopassociation=$sem_det['es_apopassociation'];
		
}
//}

?>
