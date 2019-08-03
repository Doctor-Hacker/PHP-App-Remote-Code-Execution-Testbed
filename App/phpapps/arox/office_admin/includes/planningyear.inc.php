<?php
sm_registerglobal('pid','action','update','emsg','start','submit_from','es_pid','es_junewd', 'es_junesun', 'es_junetd', 'es_julywd', 'es_julysun', 'es_julytd','es_augwd','es_augsun','es_augtd','es_septwd','es_septsun','es_septtd','es_octwd','es_octsun','es_octtd','es_otherwd1','es_othersun1','es_othertd1','es_novwd','es_novsun','es_novtd','es_decwd','es_decsun','es_dectd','es_janwd','es_jansun','es_jantd','es_febwd','es_febsun','es_febtd','es_marchwd','es_marchsun','es_marchtd','es_aprilwd','es_aprilsun','es_apriltd','es_maywd','es_maysun','es_maytd','es_otherwd2','es_othersun2','es_othertd2','es_status');
/**
* Only Admin users can view the pages
*/


if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}

				
if($action=='list'){

		$sql_qr = "SELECT * FROM  es_planningyear where es_status!='Deleted'";
		$no_rec = sqlnumber($sql_qr);
		//$q= "SELECT * FROM es_preadmission tcstatus!='issued' ";
//		$no_recs = sqlnumber($q);
		if(!isset($start)){$start=0;}
		$q_limit = 20;
		$sql_qr .=" ORDER BY es_pid  ASC LIMIT ".$start.",".$q_limit."";
		$all_sem_det = $db->getrows($sql_qr);

}
if($action=="delete"){
	
//$db->delete("es_execommittee","es_status='Deleted'",'es_exid='.$es_exid );
	//header("location: ?pid=122&action=list&emsg=3");
	$query="DELETE FROM es_planningyear WHERE es_pid=".$es_pid;
$result=mysql_query($query) or die("Record Deletion Not Possible!");
$num=mysql_affected_rows();
$msg="$num Record Deleted Succeessfully";
header("location: ?pid=130&action=list&emsg=3");
	}
if($action=='add'){

//$es_exid=$es_exid+1;
if(isset($submit_from) && $submit_from!="" ){
  
	
		if(count($errormessage)==0){
		$doj=func_date_conversion("d/m/Y","Y-m-d",$doj);
	                      $message_arr = array( 
						    "es_pid" =>$es_pid,
							"es_junewd"=>$es_junewd,						  
						    "es_junesun"=>$es_junesun,
							"es_junetd"=>$es_junetd,
							"es_julywd"=>$es_julywd,
							"es_julysun"=>$es_julysun,
							"es_julytd"=>$es_julytd,
							"es_augwd"=>$es_augwd,
							"es_augsun"=>$es_augsun,
							"es_augtd"=>$es_augtd,
							"es_septwd"=>$es_septwd,
							"es_septsun"=>$es_septsun,
							"es_septtd"=>$es_septtd,
							"es_octwd"=>$es_octwd,
							"es_octsun"=>$es_octsun,
							"es_octtd"=>$es_octtd,
							"es_otherwd1"=>$es_otherwd1,
							"es_othersun1"=>$es_othersun1,
							"es_othertd1"=>$es_othertd1,
							"es_novwd"=>$es_novwd,
							"es_novsun"=>$es_novsun,
							"es_novtd"=>$es_novtd,
							"es_decwd"=>$es_decwd,
							"es_decsun"=>$es_decsun,
							"es_dectd"=>$es_dectd,
							"es_janwd"=>$es_janwd,
							"es_jansun"=>$es_jansun,
							"es_jantd"=>$es_jantd,
							"es_febwd"=>$es_febwd,
							"es_febsun"=>$es_febsun,
							"es_febtd"=>$es_febtd,
							"es_marchwd"=>$es_marchwd,
							"es_marchsun"=>$es_marchsun,
							"es_marchtd"=>$es_marchtd,
							"es_aprilwd"=>$es_aprilwd,
							"es_aprilsun"=>$es_aprilsun,
							"es_apriltd"=>$es_apriltd,
							"es_maywd"=>$es_maywd,
							"es_maysun"=>$es_maysun,
							"es_maytd"=>$es_maytd,
							"es_otherwd2"=>$es_otherwd2,
							"es_othersun2"=>$es_othersun2,		
							"es_othertd2"=>$es_othertd2,		
					       );
					  $db->insert("es_planningyear",$message_arr);
					  header("location:?pid=130&action=list&emsg=1");	
       }
    }

if($action=='edit'){

	$sem_det = $db->getrow("SELECT * FROM es_planningyear WHERE es_pid=".$es_pid);
		if(isset($update) && $update!=""){
		
			if(count($errormessage)==0){
		 $query="update es_planningyear set es_junewd='".$es_junewd."',es_junesun ='".$es_junesun ."',es_junetd='".$es_junetd."',es_julywd='".$es_julywd."',es_julysun='".$es_julysun."',es_julytd='".$es_julytd."',es_augwd='".$es_augwd."',es_augsun='".$es_augsun."',es_augtd='".$es_augtd."',es_septwd ='".$es_septwd ."',es_septsun='".$es_septsun."',es_septtd='".$es_septtd."',es_octwd='".$es_octwd."',es_octsun='".$es_octsun."',es_octtd='".$es_octtd."',es_otherwd1='".$es_otherwd1."',es_othersun1='".$es_othersun1."',es_othertd1='".$es_othertd1."',es_novwd='".$es_novwd."',es_novsun='".$es_novsun."',es_novtd='".$es_novtd."',es_decwd='".$es_decwd."',es_decsun='".$es_decsun."',es_dectd='".$es_dectd."',es_janwd='".$es_janwd."',es_jansun='".$es_jansun."',es_jantd='".$es_jantd."',es_febwd='".$es_febwd."',es_febsun='".$es_febsun."',es_febtd='".$es_febtd."',es_marchwd='".$es_marchwd."',es_marchsun='".$es_marchsun."',es_marchtd='".$es_marchtd."',es_aprilwd='".$es_aprilwd."',es_aprilsun='".$es_aprilsun."',es_apriltd='".$es_apriltd."',es_maywd='".$es_maywd."',es_maysun='".$es_maysun."',es_maytd='".$es_maytd."',es_otherwd2='".$es_otherwd2."',es_othersun2='".$es_othersun2."',es_othertd2='".$es_othertd2."' where es_pid=".$es_pid;
				
				mysql_query($query);
				header("location:?pid=130&action=list&emsg=2");
				exit;
			}
		
		}
		                  //$es_pid = $sem_det['es_pid'];						  
						  $es_pid =$sem_det['es_pid'];
						  $es_junewd=$es_junewd['es_junewd'];						  
						  $es_junesun =$sem_det['es_junesun'];
						  $es_junetd =$sem_det['es_junetd'];
						  $es_julywd =$sem_det['es_julywd'];
						  $es_julysun =$sem_det['es_julysun'];
						  $es_julytd =$sem_det['es_julytd'];
						  $es_augwdb =$sem_det['es_augwd'];
						  $es_augsun=$sem_det['es_augsun'];
						  $es_augtd=$sem_det['es_augtd'];
						  $es_septwd=$sem_det['es_septwd'];
						  $es_septsun=$sem_det['es_septsun'];
						  $es_septtd=$sem_det['es_septtd'];
						  $es_octwd=$sem_det['es_octwd'];
						  $es_octsun=$sem_det['es_octsun'];
						  $es_octtd=$sem_det['es_octtd'];
						  $es_otherwd1=$sem_det['es_otherwd1'];
						  $es_othersun1=$sem_det['es_othersun1'];
						  $es_othertd1=$sem_det['es_othertd1'];
						  $es_novwd=$sem_det['es_novwd'];
						  $es_novsun=$sem_det['es_novsun'];
						  $es_novtd=$sem_det['es_novtd'];
						  $es_decwd=$sem_det['es_decwd'];
						  $es_decsun=$sem_det['es_decsun'];
						  $es_dectd=$sem_det['es_dectd'];
						  $es_janwd=$sem_det['es_janwd'];
						  $es_jansun=$sem_det['es_jansun'];
						  $es_jantd=$sem_det['es_jantd'];
						  $es_febwd=$sem_det['es_febwd'];
						  $es_febsun=$sem_det['es_febsun'];
						  $es_febtd=$sem_det['es_febtd'];
						  $es_marchwd=$sem_det['es_marchwd'];
						  $es_marchsun=$sem_det['es_marchsun'];
						  $es_marchtd=$sem_det['es_marchtd'];
						  $es_aprilwd=$sem_det['es_aprilwd'];
						  $es_aprilsun=$sem_det['es_aprilsun'];
						  $es_apriltd=$sem_det['es_apriltd'];
						  $es_maywd=$sem_det['es_maywd'];
						  $es_maysun=$sem_det['es_maysun'];
						  $es_maytd=$sem_det['es_maytd'];
						  $es_otherwd2=$sem_det['es_otherwd2'];
						  $es_othersun2=$sem_det['es_othersun2'];		
						  $es_othertd2=$sem_det['es_othertd2'];		
		
}
}

?>
