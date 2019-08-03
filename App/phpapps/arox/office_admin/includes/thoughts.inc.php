<?php
sm_registerglobal('pid', 'action','emsg', 'update', 'start', 'back','Submit','Update','message','tip_id' );

/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}

$date = date("Y-m-d H:i:s");

   
   if(isset($Update) && $Update!=""){
   		if($message==""){$errormessage[0] =" Enter Thought";}
		if(count($errormessage)==0){
		
		 $qur = "UPDATE es_tips SET message='".$message."' , lastupdated_on='".$date."' WHERE tip_id=".$tip_id;
		  mysql_query($qur);
		  header("location: ?pid=52&action=tip_day&emsg=31&start=$start");
		}
   
   }

	if(isset($Submit) && $Submit!=""){
		if($message==""){$errormessage[0] =" Enter Thought";}
		if(count($errormessage)==0){
			$msg_arr = array("message"=>$message,
			                  "lastupdated_on" =>$date
							);
						$msg_arr =	stripslashes_deep($msg_arr);
						$db->insert("es_tips",$msg_arr);
						header("location: ?pid=52&action=tip_day&emsg=30");
						exit;
		}
	}
	
	 
	

if($action=='edit'){
$edt_tip = $db->getrow("SELECT * FROM es_tips WHERE tip_id=".$tip_id);
 $message_edt = $edt_tip['message']; 
}

if($action=='update'){
$db->update("es_tips","lastupdated_on='".$date."'",'tip_id='.$tip_id);
 header("location: ?pid=52&action=tip_day&emsg=32&start=$start");

}

if($action=='delete'){
 $db->delete("es_tips",'tip_id='.$tip_id);
 header("location: ?pid=52&action=tip_day&emsg=3&start=$start");
 exit;
 
}



    $sql_qry = "SELECT * FROM es_tips WHERE status='active'";
	$no_rows = sqlnumber($sql_qry );
	$orderby = "tip_id";
	$q_limit  = PAGENATE_LIMIT;
	if(!isset($start)){$start=0;}
	$sql_qry .= "ORDER BY ".$orderby." DESC LIMIT ".$start." , ".$q_limit."";
	$tips_det = $db->getrows($sql_qry);
	
	
	 $todays_tip = $db->getrow("SELECT * FROM es_tips WHERE status='active' ORDER BY lastupdated_on DESC LIMIT 0,1");
	 $todaystip = $todays_tip['message'];
	
	 
?>