<?php 
	sm_registerglobal ('pid','action','update','start','column_name','asds_order','uid','update_resignation','blogDesc','sid','emsg','chgid');
	/**
* Only Student or schoool staff  can be allowed to access this page
*/ 
checkuserinlogin();$es_resignation  =  new es_resignation();
	
if($action=="mydetails"  || $action=='print_tr_bills' || $action=='print_tr_details'){ 
   $sql="SELECT P.st_firstname,P.st_lastname,BS.board_id, TB.board_title, TR.route_title ,TV.tr_vehicle_no,TV.tr_transport_type , DAV.driver_id FROM es_staff P, es_trans_board_allocation_to_student BS, es_trans_board TB, es_trans_vehicle_allocation_to_board VAB, es_trans_route TR ,es_trans_vehicle TV ,
es_trans_driver_allocation_to_vehicle DAV  WHERE BS.type='staff'
AND BS.student_staff_id = P.es_staffid
AND BS.board_id = TB.id
AND TB.route_id = TR.id
AND TB.id = VAB.board_id
AND BS.status = 'Active'
AND VAB.vehicle_id = TV.es_transportid
AND DAV.vehicle_id = TV.es_transportid
AND P.es_staffid = ".$_SESSION['eschools']['user_id']."
ORDER BY BS.id DESC";
$query =$db->getRow($sql);
	
	/*$query_sql="SELECT * FROM es_trans_board_allocation_to_student WHERE student_staff_id='".$_SESSION['eschools']['user_id']."' AND status='Active'";
	$query_exe=mysql_query($query_sql);
	$query_row=mysql_fetch_array($query_exe);
	$query_num=mysql_num_rows($query_exe);*/
	//print_r($query_row);
	
	if($query_num==1){
	 
		
		/*$board_sql="SELECT * FROM es_trans_board WHERE id='".$query_row['board_id']."'";
		$board_exe=mysql_query($board_sql);
		$board_row=mysql_fetch_array($board_exe);
		
		
		$route_sql="SELECT * FROM es_trans_route WHERE id='".$board_row['route_id']."'";
		$route_exe=mysql_query($route_sql);
		$route_row=mysql_fetch_array($route_exe);	*/	
	}	
	
	if ( !isset($start) ){
			$start = 0;
			}
			$q_limit=20;
			 /*$student_sql="SELECT A.*,P.pre_name,P.pre_class ,BS.board_id,P.pre_fathername, TB.board_title, TR.route_title ,TV.tr_vehicle_no,TV.tr_transport_type , DAV.driver_id  FROM es_trans_payment_history A,es_preadmission P , es_trans_board_allocation_to_student BS, es_trans_board TB, es_trans_vehicle_allocation_to_board VAB, es_trans_route TR ,es_trans_vehicle TV ,es_trans_driver_allocation_to_vehicle DAV 
WHERE A.studentid=P.es_preadmissionid 
AND BS.type='student'
AND BS.student_staff_id = P.es_preadmissionid
AND P.es_preadmissionid = ".$_SESSION['eschools']['user_id']."
AND BS.board_id = TB.id
AND TB.route_id = TR.id
AND TB.id = VAB.board_id
AND VAB.vehicle_id = TV.es_transportid
AND DAV.vehicle_id = TV.es_transportid
GROUP BY BS.id";*/
			
			$sql="SELECT A.*,A.id as histid,P.es_preadmissionid,P.pre_fathername,P.pre_class ,BS.* , TB.board_title, TR.route_title ,TV.tr_vehicle_no,TV.tr_transport_type , DAV.driver_id 
			 FROM es_trans_payment_history A,es_preadmission P,es_trans_board_allocation_to_student BS , es_trans_board TB, es_trans_vehicle_allocation_to_board VAB, es_trans_route TR ,es_trans_vehicle TV ,es_trans_driver_allocation_to_vehicle DAV 
			  WHERE A.studentid=P.es_preadmissionid 
			  AND BS.student_staff_id=P.es_preadmissionid 
			  AND BS.type = 'student' 
			  AND BS.board_id = TB.id
			AND TB.route_id = TR.id
			AND TB.id = VAB.board_id
			AND VAB.vehicle_id = TV.es_transportid
			AND DAV.vehicle_id = TV.es_transportid
			  AND P.es_preadmissionid = ".$_SESSION['eschools']['user_id']." GROUP BY A.id ";
			
			$student1_row = $db->getRows($sql);		
			$no_rows = count($student1_row);
			
			$student_row = $db->getRows($sql." ORDER BY A.id LIMIT $start , $q_limit " );
}


if($action=='receipt'){
		 $student_sql="SELECT A.*,P.pre_name,P.pre_class ,BS.board_id,P.pre_fathername, TB.board_title, TR.route_title ,TV.tr_vehicle_no,TV.tr_transport_type , DAV.driver_id  FROM es_trans_payment_history A,es_preadmission P , es_trans_board_allocation_to_student BS, es_trans_board TB, es_trans_vehicle_allocation_to_board VAB, es_trans_route TR ,es_trans_vehicle TV ,es_trans_driver_allocation_to_vehicle DAV 
WHERE A.studentid=P.es_preadmissionid 
AND BS.type='student'
AND BS.student_staff_id = P.es_preadmissionid
AND BS.board_id = TB.id
AND TB.route_id = TR.id
AND TB.id = VAB.board_id

AND VAB.vehicle_id = TV.es_transportid
AND DAV.vehicle_id = TV.es_transportid
AND A.id=".$chgid." 
GROUP BY P.es_preadmissionid
";

$payamount_details = $db->getrow($student_sql);

}	
				        

?>