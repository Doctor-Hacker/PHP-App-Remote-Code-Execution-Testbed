<?php   
        sm_registerglobal('pid', 
						  'action',					
						  'status',				
						  'start',
						  'routetitle',	
						  'route_via',	
						  'addroute',
						  'updateroute',
						  'id',
						  'prepare',
						  'selyear',
						  'selmonth',
						  'selgroup',
						  'selclass',
						  'emsg','id'					
						 );
						  
/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
$html_obj = new html_form();
$vlc = new FormValidation();


/**********Preparing transport array*************/
/*$trans_sql="select es_transportid, tr_transport_type,tr_vehicle_no from es_transport where status='active'";
$trans_details=$db->getRows($trans_sql);
if(count($trans_details)>0){
foreach($trans_details as $each_trans){
$trans_array[$each_trans['es_transportid']]=$each_trans['tr_vehicle_no']."(".$each_trans['tr_transport_type'].")";
}
}*/




if(isset($action) && $action == "preparetransportbill"){


	if(isset($prepare) && $prepare== "Prepare"){
	  			
		/*if ($id<1) {
		$errormessage[0]="Select Route";	  
		}*/
		if ($selyear=="") {
		$errormessage[2]="Select year";	  
		}		
			
		if ($selmonth=="") {
		$errormessage[3]="Select month"; 
		}		
		
			$today = date("Y-m-d");
			$generated_month = $selyear.'-'.$selmonth.'-'."01";
			$difference =  date_diff($generated_month,$today);
			
		    //if($difference['days']<1){$errormessage[2] = "You can not prepare bills for future dates";}	
		
        if(count($errormessage)==0){
			
			$start_end_dates = $db->getrow("SELECT * FROM es_finance_master WHERE '".$generated_month."' BETWEEN fi_startdate AND fi_enddate");
			
				if($id>1){$condition = " AND FD.id = '".$id."'";}
				
		 $student_sql="SELECT A.student_staff_id,FD.amount FROM es_trans_board_allocation_to_student A, es_preadmission_details P ,es_trans_route FD , es_trans_board B
			WHERE A.student_staff_id=P.es_preadmissionid 
			AND B.route_id = FD.id
			AND A.board_id = B.id AND P.status!='inactive' 
			".$condition."
			AND A.type='student'
			AND P.pre_fromdate = '".$start_end_dates['fi_ac_startdate']."'
			AND P.pre_todate = '".$start_end_dates['fi_ac_enddate']."'
			
			GROUP BY A.student_staff_id ,  A.type "; 
		/*	AND YEAR(A.created_on) <= ".$selyear." 
			AND MONTHNAME(A.created_on) <= ".$selmonth." 
			AND ( YEAR(A.deallocated) >=  ".$selyear." OR YEAR(A.deallocated) =0000)
			AND ( MONTHNAME(A.deallocated) >=  ".$selmonth." OR MONTHNAME(A.deallocated) =00)*/
			$all_det = $db->getrows($student_sql);
			
				$today_date=date('Y-m-d');
			if(count($all_det)>=1){ 
		    for($i=0;$i<count($all_det);$i++){
				$charges_arr[$i]['studentid']=$all_det[$i]['student_staff_id'];
				$charges_arr[$i]['pay_amount']=$all_det[$i]['amount'];
				$charges_arr[$i]['due_month']=$generated_month;
				$charges_arr[$i]['created_on']=$today;
		   }
		   
		  
		   	if(is_array($charges_arr) && count($charges_arr)>=1){
		    for($j=0;$j<count($charges_arr);$j++){
					$sql_dupli_rec = "SELECT COUNT(*) FROM es_trans_payment_history WHERE  due_month ='".$charges_arr[$j]['due_month']."' AND studentid='".$charges_arr[$j]['studentid']."'";
		$records = $db->getone($sql_dupli_rec);
				if($records==0 ){
				
				$db->insert("es_trans_payment_history",$charges_arr[$j]);
				}
			}
			
			header('location:?pid=83&action=preparetransportbill&emsg=72');
		    }
	        }else{
		   header('location:?pid=83&action=preparetransportbill&emsg=73');
		   }  
        }
	}		
}
?>


