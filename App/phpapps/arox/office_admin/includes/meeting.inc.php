<?php
sm_registerglobal('pid','action','update','emsg','start','submit_from','es_mid','es_mschool1', 'es_macademic1', 'es_mparents1', 'update','es_status');
/**
* Only Admin users can view the pages
*/


if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}

				
if($action=='list'){

		$sql_qr = "SELECT * FROM  es_meeting where es_status!='Deleted'";
		$no_rec = sqlnumber($sql_qr);
		//$q= "SELECT * FROM es_preadmission tcstatus!='issued' ";
//		$no_recs = sqlnumber($q);
		if(!isset($start)){$start=0;}
		$q_limit = 20;
		$sql_qr .=" ORDER BY es_mid  ASC LIMIT ".$start.",".$q_limit."";
		$all_sem_det = $db->getrows($sql_qr);

}
if($action=="delete"){
	
//$db->delete("es_execommittee","es_status='Deleted'",'es_exid='.$es_exid );
	//header("location: ?pid=122&action=list&emsg=3");
	$query="DELETE FROM es_meeting WHERE es_mid=".$es_mid;
$result=mysql_query($query) or die("Record Deletion Not Possible!");
$num=mysql_affected_rows();
$msg="$num Record Deleted Succeessfully";
header("location: ?pid=126&action=list&emsg=3");
	}
if($action=='add'){

//$es_exid=$es_exid+1;
if(isset($submit_from) && $submit_from!="" ){
  
	$es_mschool1 = func_date_conversion("d/m/Y","Y-m-d",$es_mschool1);
	$es_macademic1 = func_date_conversion("d/m/Y","Y-m-d",$es_macademic1);
	$es_mparents1 = func_date_conversion("d/m/Y","Y-m-d",$es_mparents1);
		if(count($errormessage)==0){
		//$doj1 = func_date_conversion("d/m/Y","Y-m-d",$doj);
	                     echo $message_arr = array( 
						    "es_mid" =>$es_mid,						  
						    "es_mschool1"=>$es_mschool1,
							"es_macademic1"=>$es_macademic1,
							"es_mparents1"=>$es_mparents1,
							//"es_atrep3"=>$es_atrep3,
//							"es_atrep4"=>$es_atrep4,
//							"es_atrep5"=>$es_atrep5,
//							"es_atrep6"=>$es_atrep6,
//							"es_apopassociation"=>$es_apopassociation						  
					       );
					  $db->insert("es_meeting",$message_arr);
					  header("location:?pid=126&action=list&emsg=1");	
       }
    }

if($action=='edit'){

	$sem_det = $db->getrow("SELECT * FROM es_meeting WHERE es_mid=".$es_mid);
		if(isset($update) && $update!=""){
		
			if(count($errormessage)==0){
		 $query="update es_meeting set es_mschool1='".$es_mschool1."',es_macademic1='".$es_macademic1."',es_mparents1='".$es_mparents1."' where es_mid=".$es_mid;
				
				mysql_query($query);
				header("location:?pid=126&action=list&emsg=2");
				exit;
			}
		
		}
		 $es_exid = $sem_det['es_exid'];				
		                  $es_mid=$sem_det['es_mid'];						  
						    $es_mschool1=$sem_det['es_mschool1'];
							$es_macademic1=$sem_det['es_macademic1'];
							$es_mparents1=$sem_det['es_mparents1'];
		
}
}

?>
