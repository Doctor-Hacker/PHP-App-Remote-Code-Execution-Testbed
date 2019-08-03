<?php
sm_registerglobal('pid', 'action','emsg','Submit','selectyear','selmonth','es_issueloanid');

/**
* Only Super admin or moderator of the corporate can be allowed to access this page
*/checkuserinlogin();
/**End of the permissions   **/


	if(($action=='viewsalary' && $Submit=='Submit') || $action=='print_salarylist')
	{	
	if(isset($selmonth) && $selmonth!=""){$condition = " AND MONTHNAME( `pay_month` )  =".$selmonth;}	
	
	$paysallist = getamultiassoc("SELECT * FROM `es_payslipdetails` WHERE `staff_id` =".$_SESSION['eschools']['user_id']." 
									AND `pay_month` LIKE '".$selectyear."%' " .$condition. " ORDER BY `es_payslipdetails`.`pay_month` ASC");
									$adminlisturl = "&Submit=Submit";	
	}
	if($action=='loanissueslist'  || $action=='print_list')
	{
	$q_limit = 15;
	$errMsg = 0;
	if(!isset($start) ){
			$start = 0;
	}	
 $sql="select lm.loan_name,lm.loan_maxlimit,isl.es_staffid,lm.loan_intrestrate,isl.loan_amount,isl.loan_instalments,isl.deductionmonth,isl.amountpaidtillnow,isl.noofinstalmentscompleted,isl.es_issueloanid ,isl.dud_amount from es_issueloan isl,es_loanmaster lm where lm.es_loanmasterid=isl.es_loanmasterid and isl.es_staffid=".$_SESSION['eschools']['user_id'];
	$norows=$db->getrows($sql);
	
	$no_rows=count($norows);
	
	 $sql_list="select lm.loan_name,lm.loan_maxlimit,isl.es_staffid,lm.loan_intrestrate,isl.loan_amount,isl.created_on,isl.loan_instalments,isl.deductionmonth,isl.amountpaidtillnow,isl.noofinstalmentscompleted ,isl.es_issueloanid ,isl.dud_amount from es_issueloan isl,es_loanmaster lm where lm.es_loanmasterid=isl.es_loanmasterid AND  isl.es_staffid=".$_SESSION['eschools']['user_id']." ORDER BY isl.es_issueloanid DESC LIMIT $start , $q_limit";
	
	$issueslist=$db->getrows($sql_list);
	$adminlisturl = "&start=$start";

	
	}	
	
	
	if($action=="viewloan" || $action=='print_loan'){
 $sql="select lm.loan_name,lm.loan_maxlimit,isl.es_staffid,lm.loan_intrestrate,isl.loan_amount,isl.created_on,isl.loan_instalments,isl.deductionmonth,isl.amountpaidtillnow,isl.noofinstalmentscompleted,isl.es_issueloanid,lm.loan_type ,isl.dud_amount from es_issueloan isl,es_loanmaster lm where lm.es_loanmasterid=isl.es_loanmasterid and isl.es_issueloanid=".$es_issueloanid ."  AND  isl.es_staffid=".$_SESSION['eschools']['user_id'];








$viewloandetails=$db->getrow($sql);


	

//array_print($viewloandetails);
	

}
	?>
	