<?php

include_once (INCLUDES_CLASS_PATH . DS . 'class.es_feestructure.php');
sm_registerglobal('pid', 'action', 'start', 'column_name', 'asds_order', 'update', 'uid', 'admin', 'emsg ','fee_class','fee_tution', 'fee_library','fee_transportation','fee_mess','fee_book','fee_deposite','fee_hostel','fee_instalments','fee_fine','fees1','fees2','fees3','update','back','fid');


/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
		header('location: ./?pid=1&unauth=0');
		exit;
	}

/**End of the permissions    **/

$es_feestructure = new es_feestructure();

/**************** viewing **************** **/	
	if ($action=='fee_list'){
		$es_feeslist = $es_feestructure->GetList(array(array("es_feestructureid", ">", "0")), "es_feestructureid", false);
	}
/**------------- end of viewing --------------- **/

// for update  fetch the Fees 	
if ($action=='edit' || $action=='view'){
	$es_feeslist = $es_feestructure->GetList(array(array("es_feestructureid", "=", "$fid")), "es_feestructureid", false);
	$feetotal = $es_feeslist[0]->fee_tution + $es_feeslist[0]->fee_library + $es_feeslist[0]->fee_transportation + $es_feeslist[0]->fee_hostel + $es_feeslist[0]->fee_mess + $es_feeslist[0]->fee_book + $es_feeslist[0]->fee_deposite + $es_feeslist[0]->fees1 + $es_feeslist[0]->fees2 + $es_feeslist[0]->fees3;
}

if (isset($update)){
	$db->update('es_feestructure', "fee_tution ='" .$fee_tution . "', fee_library ='" .$fee_library . "',fee_deposite ='" . $fee_deposite . "',fee_hostel ='" .$fee_hostel . "', fee_instalments ='" .$fee_instalments . "',fee_fine ='" . $fee_fine . "', fees1 ='" .$fees1 . "', fees2 ='" .$fees2 . "',fees3 ='" .$fees3 . "', fee_transportation ='" . $fee_transportation . "', fee_mess ='" .$fee_mess . "',fee_book ='" .$fee_book . "'",'es_feestructureid =' .$fid);
	 $emsg = 2;
	header('location:?pid=16&action=edit&fid='.$fid);
}

/**************back **************** **/	
if (isset($back)){
	header('location:?pid=16&action=fee_list');
}
/**------------- end of back button --------------- **/
		

?>