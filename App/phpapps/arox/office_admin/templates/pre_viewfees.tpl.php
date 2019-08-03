<script type="text/javascript">
function popup_letter(url) {
		 var width  = 700;
		 var height = 500;
		 var left   = (screen.width  - width)/2;
		 var top    = (screen.height - height)/2;
		 var params = 'width='+width+', height='+height;
		 params += ', top='+top+', left='+left;
		 params += ', directories=no';
		 params += ', location=no';
		 params += ', menubar=no';
		 params += ', resizable=no';
		 params += ', scrollbars=yes';
		 params += ', status=no';
		 params += ', toolbar=no';
		 newwin=window.open(url,'windowname5', params);
		 if (window.focus) {
			 newwin.focus()
		 }
	 return false;
}

</script>

<?php 
// FEE DETAILS
	if($action=='viewfeedetails')
	{

$viewfid=$_GET['sid'];
?>
<table width="311" border="1">
  <tr>
 
  
    <td width="301"><a href="?pid=110&action=viewfeedetails&sid=<?php echo $viewfid;?>&clid=<?php if($sm_class!=''){echo $sm_class;}else{echo $clid;}?>&secid='<?php if($sm_section!=''){echo $sm_section;}else {echo $secid;}?>">Fees </a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="?pid=110&action=finedetails&sid=<?php echo $viewfid;?>&clid=<?php if($sm_class!=''){echo $sm_class;}else{echo $clid;}?>&secid='<?php if($sm_section!=''){echo $sm_section;}else {echo $secid;}?>" >View Misc. Fine </a></td>
	

	
  </tr>

</table>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
         <td height="3" colspan="3"></td>
	 </tr>
	  <tr>
		<td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">My Fee Details</span></td>
	  </tr>
	  <tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="center" valign="top">
		  <table width="100%" border="0" cellspacing="0" cellpadding="0" >
                <tr>
                    <td height="25" align="left" valign="middle" class="admin">&nbsp;Fee Details For Class : <?php echo classname($es_classname); ?></td>
            </tr>
                <tr>
                    <td align="center" valign="top">
                        <table width="100%" border="1" cellspacing="0" cellpadding="3" class="tbl_grid">
                            <tr class="bgcolor_02" height="20">
                                <td width="39%" class="admin">&nbsp;Particulars</td>
                                <td width="23%" class="admin">Amount</td>
                              <td width="38%" class="admin">Installments</td>					
                          </tr>
                            <?php 				
                            $obj_feesmaster = new es_feemaster();
                            $es_feemasterList = $obj_feesmaster->GetList(array(array("fee_class", "=", "$es_classname"),
                                                                        array("fee_fromdate","=","$from_finance"),
                                                                        array("fee_todate","=","$to_finance")), "es_feemasterid", false);
                            if(count($es_feemasterList)>0)
                            {
                            foreach ($es_feemasterList as $eachrecord){
                            ?>
                            <tr class="narmal">
                                <td align="left">&nbsp;<?php echo ucwords(strtolower($eachrecord->fee_particular)); ?></td>
                                <td align="left"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord->fee_amount, 2, '.', ''); ?></td>
                                <td align="center"><?php echo $eachrecord->fee_instalments; ?></td>					
                          </tr>	
                            <?php } } else { ?>	
                            <tr class="narmal">
                                <td align="center" colspan="3">No Particulars Added</td>					
                            </tr>
                        <?php } ?>	
                        </table>
                    </td>
                </tr>
                <tr>
                    <td height="25" align="left" valign="middle" class="admin">&nbsp;Fee Paid Details</td>
                </tr>
                <tr>
                    <td align="center" valign="top">
                        <table width="100%" border="1" cellspacing="0" cellpadding="3" class="tbl_grid">
                      <tr class="bgcolor_02" height="25">
                                <td width="5%" align="center" class="admin">&nbsp;S.No</td>
                              <td width="22%" align="left" class="admin">&nbsp;Particulars</td>
                              <td width="24%" class="admin">Payment Date</td>
                              <td width="26%" class="admin">Amount Paid</td>
							  <td width="23%" class="admin">Amount Waived</td>
                          </tr>		
                            <?php 
                            $i= 1;
                            if(count($feedetails)>0)
                            {
								foreach($feedetails as $eachrecord)
								{ ?>
									<tr>
										<td align="center" class="narmal">&nbsp;<?php echo $i++; ?></td>
									  <td align="left" class="narmal">&nbsp;<?php echo ucwords(strtolower($eachrecord['particulartname'])); ?></td>
									  <td align="left" class="narmal"><?php echo displayDate($eachrecord['date']); ?></td>
									  <td align="left" class="narmal"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['feeamount'], 2, '.', ''); ?></td>  
									  <td align="left" class="narmal"><?php if($eachrecord['fee_waived']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['fee_waived'], 2, '.', '');} ?></td> 
									  
						  </tr>
						<?php 	}
							} else { ?>
                                <tr>
                                    <td colspan="5" align="center" class="narmal"> No fee Paid Till Now</td>
                                </tr>
                            <?php } ?>
                         </table>
                  </td>
                </tr>
                <tr>
                    <td height="25" align="left" valign="middle" class="admin">&nbsp;Balance Fee</td>
            </tr>
                <tr>
                    <td align="center" valign="top">
                        <table width="100%" border="1" cellspacing="0" cellpadding="3" class="tbl_grid">
                            <tr class="bgcolor_02" height="35">
                                <td width="5%" align="center" class="admin">&nbsp;S.No</td>
                              <td width="16%" class="admin">Particulars</td>
                                <td width="11%" class="admin">Total Fee </td>
                              <td width="4%" class="admin">[I]</td>
                                <td width="22%" class="admin">Fee Paid</td>
								 <td width="17%" class="admin">Fee Waived</td>
                                <td width="14%" class="admin">Balance</td>
                              <td width="11%" class="admin">[PI]</td>
                          </tr>		
                            <?php 				
                            $viewfid=$_GET['sid'];
                            $es_feemasterList = $obj_feesmaster->GetList(array(array("fee_class", "=", "$es_classname"),
                            array("fee_fromdate","=","$from_finance"),
                            array("fee_todate","=","$to_finance")), "es_feemasterid", false);
                            if(count($es_feemasterList)>0)
                            {
								$total_fee = 0;
								$paid_fee = 0;
								$balance_fee = 0;
								$i=1;
								foreach ($es_feemasterList as $eachrecord){
									$feetotdetails = getarrayassoc("SELECT COUNT(*),SUM(feeamount),SUM(fee_waived) FROM `es_feepaid` 
									WHERE `studentid` =".$viewfid." 
									AND `class` = '".$es_classname."' 
									AND `particulartname` = '".$eachrecord->fee_particular."'
									AND fi_fromdate = '" . $from_finance . "' 
									AND fi_todate = '" . $to_finance . "' ");
									
									?>
									<tr class="narmal">
                                        <td align="center">&nbsp;<?php echo $i++; ?></td> 
                                      <td align="left"><?php echo ucwords(strtolower($eachrecord->fee_particular)); ?></td>
                                        <td align="left"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord->fee_amount, 2, '.', ''); ?></td>
                                        <td align="center"><?php echo $eachrecord->fee_instalments; ?></td>
                                        <td align="left"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($feetotdetails['SUM(feeamount)'], 2, '.', ''); ?></td> 
										<td align="left"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($feetotdetails['SUM(fee_waived)'], 2, '.', ''); $tot_waived +=$feetotdetails['SUM(fee_waived)']; ?></td>
                                        <td align="left"><?php
										$tot_paid = $feetotdetails['SUM(feeamount)']+$feetotdetails['SUM(fee_waived)'];
										 echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord->fee_amount-$tot_paid, 2, '.', ''); ?></td>
                                        <td align="center"><?php echo $feetotdetails['COUNT(*)']; ?></td>					
									</tr>
								<?php 
								$total_fee+=$eachrecord->fee_amount;
								 $paid_fee+=$feetotdetails['SUM(feeamount)'];
								 $balance_fee+=$eachrecord->fee_amount-$feetotdetails['SUM(feeamount)'];
								
                            	}
								 
								?>
								<tr class="narmal">
                                        <td align="center">&nbsp;</td> 
                                        <td align="left"><b>TOTAL</b></td>
                                        <td align="left"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($total_fee, 2, '.', ''); ?></td>
                                        <td align="center"></td>
                                        <td align="left"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($paid_fee, 2, '.', ''); ?></td>
										<td align="left"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($tot_waived, 2, '.', ''); ?></td>
                                        <td align="left"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($balance_fee, 2, '.', ''); ?></td>
                                        <td align="center"><?php echo $feetotdetails['COUNT(*)']; ?></td>					
									</tr>
								<?php 
							} else { ?>	
                            <tr class="narmal">
                                <td align="center" colspan="8">No Particulars Added</td>					
                            </tr>	
                            <?php } ?>
                        </table>
                    </td>
                </tr>
				<tr>
                    <td height="25" align="left" valign="middle" class="admin">&nbsp;[I] Total Installments&nbsp;&nbsp;&nbsp;[PI] Paid Installments</td>
            </tr>
			<?php 

$viewfid=$_GET['sid'];
?>	
                 <tr>
                    <td align="center" valign="top">
					<table width="100%" border="1" cellspacing="0" cellpadding="3" class="tbl_grid">
                           <tr><td align="center" valign="middle"><?php /*?><input type="button" style="display:block;cursor:pointer;" id="printfeedet_t" name="print_paid_balance" value="Print Fee Paid and Balance" onclick="window.open('?pid=110&action=printpaid_balance&sid=<?php echo $viewfid; ?>',null,''width=700,height=400,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /><?php */?>
						   
						   <input type="button" style="display:block;cursor:pointer;" id="printfeedet_t" name="print_paid_balance" value="Print Fee Paid and Balance" onclick="window.open('?pid=110&action=printpaid_balance&sid=<?php echo $viewfid; ?>',null,'width=700,height=500,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  />
						   
						   </td></tr>
                        </table>
					
                        
                    </td>
                </tr>
          </table>
		</td>
		<td width="1" class="bgcolor_02"></td>
	  </tr>	  
	</table>
<?php	
	}
// End of FEE DETAILS	
?>
<?php
$viewfid=$_GET['sid'];
if ($action=="printcompletefeedet"){ 
	if (is_array($fees_banksdata)&&count($fees_banksdata)>0){
	?>
<table width="100%" border="1" cellspacing="0" cellpadding="0" class="tbl_grid">
<tr>
	<td colspan="9">
		<ol><b>Notes</b>
		  <li>IN =>Installment Number</li>
		  <li>VT =&gt; Voucher Type</li>
		</ol>	</td>
</tr>
<tr>
	<td colspan="9">
		<table width="100%" border="0" cellspacing="0" cellpadding="2" >
		<tr>
			<td></td>
			<td></td>
			<td width="592" rowspan="10" align="center"><?php echo displayimage("images/student_photos/".$stdentdata['pre_image'],'127');?></td>
		</tr>
		<tr>
			<td align="left" width="276">&nbsp;&nbsp;<b>Registration&nbsp;Number :</b> </td>
			<td align="left" width="321"><?php echo $_SESSION['eschools']['student_prefix'];?><?php echo $viewfid;?></td>
			<td width="91"></td>
		</tr>
		<tr>
			<td align="left">&nbsp;&nbsp;<b>Name : </b></td>
			<td align="left"><?php echo $stdentdata['pre_name'];?></td>
			<td></td>
		</tr>
		
		<tr>
			<td align="left">&nbsp;&nbsp;<b>Class : </b></td>
			<td align="left"><?php echo classname($stdentdata['pre_class']);?></td>
			<td></td>
		</tr>
		<tr>
			<td align="left">&nbsp;&nbsp;<b>Date Of Birth : </b></td>
			<td align="left"><?php echo displaydate($stdentdata['pre_dateofbirth']);?></td>
			<td></td>
		</tr>
		<tr>
			<td align="left">&nbsp;&nbsp;<b>Father/Guardian Name : </b></td>
			<td align="left"><?php echo $stdentdata['pre_fathername'];?></td>
			<td></td>
		</tr>
		<tr>
			<td align="left">&nbsp;&nbsp;<b>Academic Year : </b></td>
			<td align="left"><?php echo $fees_banksdata[0]['academicyear']; ?></td>
			<td></td>
		</tr>
		<tr>
			<td height="20"></td>
			<td>&nbsp;</td>
			<td></td>
		</tr>
		</TABLE>	</td>
</tr>	
<tr class="bgcolor_02">
	<td align="left">Paid&nbsp;On<br />[Last Date]</td>
	<td width="10" height="25" align="left">Particulars</td>
	<td align="left">Fee&nbsp;Paid </td>
	<td align="left">Fee Waived </td>
	<td align="left">Fine</td>
	<td align="left">Fine&nbsp;Paid </td>
	<td align="left">Fine Waived </td>
	<td align="left">VT</td>
	<td width="5" align="left">IN&nbsp;</td>
  </tr>
<?php 
$total_fee =0;
$total_fee_waived =0;
$total_fine = 0;
$total_fine_paid = 0;
$total_fine_waived = 0;
foreach($fees_banksdata as $eachfees_banks){ 
	 $sel_voutherbalances = "SELECT * FROM `es_voucherentry` WHERE `es_receiptno` = 'student".$eachfees_banks['es_feepaidid']."' AND `es_receiptdate`='" . $eachfees_banks['date'] . "'";

$voutherbalances_data = getarrayassoc( $sel_voutherbalances );
$actual_fine = "";
$paid_fine = "";
$waived_fine = "";
$lastdate ="";
$fcc_det = $db->getrow("SELECT * FROM es_fine_charged_collected WHERE es_installment=".$eachfees_banks['es_installment']." AND es_feemasterid=".$eachfees_banks['particularid']);  	
if(is_array($fcc_det) && count($fcc_det)>=1){
$actual_fine = $fcc_det['fine_amount'];
$paid_fine = $fcc_det['amount_paid'];
$waived_fine = $fcc_det['deduction_allowed'];
}
$last_date = $db->getone("SELECT last_date FROM es_fee_inst_last_date WHERE es_feemasterid=".$eachfees_banks['particularid']." AND instalment_no=".$eachfees_banks['es_installment']." ");
if($last_date!="" && $last_date!='0000-00-00'){
$lastdate = "<br>[".func_date_conversion("Y-m-d","d/m/Y",$last_date)."]";
}

//array_print($voutherbalances_data);
	?>
<tr>
	<td><?php echo displaydate($eachfees_banks['date']); echo $lastdate;  ?></td>
	<td><?php echo $eachfees_banks['particulartname']; ?></td>
	<td><?php echo $eachfees_banks['feeamount']; ?></td>
	<td><?php echo $eachfees_banks['fee_waived']; ?></td>
	<td><?php echo $actual_fine; ?></td> 
	 <td><?php echo $paid_fine; ?></td> 
	 <td><?php echo $waived_fine; ?></td> 
	<td><?php echo $voutherbalances_data['es_vouchermode']; ?></td>
	<td><?php echo $eachfees_banks['es_installment']; ?></td>
  </tr>
  
<?php 
$total_fee +=$eachfees_banks['feeamount'];
$total_fee_waived +=$eachfees_banks['fee_waived'];
$total_fine += $actual_fine;
$total_fine_paid += $paid_fine;
$total_fine_waived += $waived_fine;
	unset($voutherbalances_data);
}?>
<tr>
	<td></td>
	<td><b>Total : </b></td>
	<td><b><?php echo $total_fee; ?></b></td>
	<td><b><?php echo $total_fee_waived; ?></b></td>
	<td><b><?php echo $total_fine; ?></b></td> 
	 <td><b><?php echo $total_fine_paid; ?></b></td> 
	 <td><b><?php echo $total_fine_waived; ?></b></td> 
	<td></td>
	<td></td>
  </tr>
</table>	
<?php
}
else{echo "No records available";}
}
?>

<?php 
$viewfid=$_GET['sid'];
if($action=='finedetails')	{

?>
<table width="311" border="1">
  <tr>

    <td width="301"><a href="?pid=110&action=viewfeedetails&sid=<?php echo $viewfid;?>&clid=<?php if($sm_class!=''){echo $sm_class;}else{echo $clid;}?>&secid='<?php if($sm_section!=''){echo $sm_section;}else {echo $secid;}?>">Fees </a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="?pid=110&action=finedetails&sid=<?php echo $viewfid;?>&clid=<?php if($sm_class!=''){echo $sm_class;}else{echo $clid;}?>&secid='<?php if($sm_section!=''){echo $sm_section;}else {echo $secid;}?>" >View Misc. Fine </a></td>
  </tr>

</table>
 <?php }?>
	  
<?php

if ($action=="finedetails" || $action=='print_fine_details'){ 
	
	?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">


	  <tr>
		<td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Misc. Fine Details </span></td>
	  </tr>
	  <tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="left" valign="top">
		
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
			<tr><td colspan="6" align="left">
			<table width="100%" border="0">
			<?php
$viewfid=$_GET['sid'];
if($action=='print_fine_details'){
$stdentdata = getarrayassoc("SELECT * FROM `es_preadmission` WHERE `es_preadmissionid` ='$viewfid'");
$es_classname = $stdentdata['pre_class'];	
?>
  <tr>
    <td width="24%" height="25" align="left" valign="middle" class="admin">Registration Number</td>
    <td width="1%" height="25" align="left" valign="middle" class="admin">:</td>
    <td width="75%" height="25" align="left" valign="middle"><?php echo $viewfid;?></td>
  </tr>
  <tr>
    <td height="25" align="left" valign="middle" class="admin">Student Name</td>
    <td height="25" align="left" valign="middle" class="admin">:</td>
    <td height="25" align="left" valign="middle"><?php 
	//$DET = get_studentdetails($viewfid);
	echo $stdentdata['pre_name'];?></td>
  </tr>
  <tr>
    <td height="25" align="left" valign="middle" class="admin">Class</td>
    <td height="25" align="left" valign="middle" class="admin">:</td>
    <td height="25" align="left" valign="middle"><?php 
	
	echo classname($stdentdata['pre_class']);?></td>
  </tr>
  <?php }?>
</table>

			</td></tr>
  <tr class="bgcolor_02" height="25">
    <td>S.No</td>
    <td>Fine Type</td>
    <td>Charged On</td>
    <td>Fine Amount</td>
    <td>Fine Paid</td>
    <td>Fine waived</td>
    
  </tr>
  <?php						
		if(count($studentwise_det)>=1){
         $slno = $start+1;
		 $rw =1;
		 $tot_fine_amount =0;
		 $tot_paid_amount =0;
		 $tot_deduction_allowed =0;
foreach ($studentwise_det as $eachrecord)
      {
	if($slno%2==0)
		$rowclass = "even";
		else
		$rowclass = "odd";
		
		
?>       
  <tr class="<?php echo $rowclass;?>">
    <td height="15" align="left" valign="middle">&nbsp;<?php echo $slno;?></td>
    <td height="15" align="left" valign="middle">&nbsp;<?php echo ucfirst($eachrecord['fine_name']); ?></td>
    <td height="15" align="left" valign="middle">&nbsp;<?php echo func_date_conversion("Y-m-d","d/m/Y",$eachrecord['created_on']); ?></td>
    <td height="15" align="left" valign="middle">&nbsp;
      <?php if($eachrecord['fine_amount']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['fine_amount'], 2, '.', '');}  ?></td>
    <td height="15" align="left" valign="middle">&nbsp;
      <?php if($eachrecord['paid_amount']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['paid_amount'], 2, '.', '');}  ?></td>
    <td height="15" align="left" valign="middle">&nbsp;
      <?php if($eachrecord['deduction_allowed']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['deduction_allowed'], 2, '.', '');}?></td>
    
  </tr>
  <?php  $slno++;
         $tot_fine_amount +=$eachrecord['fine_amount'];
		 $tot_paid_amount +=$eachrecord['paid_amount'];
		 $tot_deduction_allowed +=$eachrecord['deduction_allowed'];
  
  }?>
  <tr height="25">
    <td></td>
    <td></td>
    <td><b>Total:</b></td>
    <td><?php if($tot_fine_amount>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($tot_fine_amount, 2, '.', '');}  ?></td>
    <td><?php if($tot_paid_amount>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($tot_paid_amount, 2, '.', '');}  ?></td>
    <td><?php if($tot_deduction_allowed>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($tot_deduction_allowed, 2, '.', '');}  ?></td>
    <td></td>
  </tr>
   <tr height="25">
    <td colspan="7">
	<table width="100%" border="0">
  <tr>
    <td width="13%">Total</td>
    <td width="1%">:</td>
    <td width="86%"><?php if($tot_fine_amount>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($tot_fine_amount, 2, '.', '');}  ?></td>
  </tr>
  <tr>
    <td>Fine Paid</td>
    <td>:</td>
    <td><?php if($tot_paid_amount>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($tot_paid_amount, 2, '.', '');}  ?></td>
  </tr>
  <tr>
    <td>Remaining</td>
    <td>:</td>
    <td><?php 
	$remaining = $tot_fine_amount-$tot_paid_amount;
	
	if($remaining>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($remaining, 2, '.', '');}  ?></td>
  </tr>
  <tr>
    <td>Fine Waived</td>
    <td>:</td>
    <td><?php if($tot_deduction_allowed>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($tot_deduction_allowed, 2, '.', '');}  ?></td>
  </tr>
  <tr>
    <td>Balance</td>
    <td>:</td>
    <td><font color="#FF0000"><b><?php 
	$Balance = $remaining-$tot_deduction_allowed;
	
	if($Balance>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($Balance, 2, '.', '');}else{echo "---";}  ?></b></font></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td></td>
  </tr>
  
</table>
	</td>
  </tr>
  <?php 
  $viewfid=$_GET['sid'];
  if($action!='print_fine_details'){?>
  <tr><td colspan="7" align="center"><?php /*?><input type="button" style="display:block;cursor:pointer;" id="printfeedet_t" name="print_paid_balance" value="Print Misc. Fine Details" onclick="window.open('?pid=110&action=print_fine_details&sid=<?php echo $viewfid;?>',null,'width=500,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /><?php */?>
  
   <input type="button" style="display:block;cursor:pointer;" id="printfeedet_t" name="print_paid_balance" value="Print Misc. Fine Details" onclick="window.open('?pid=110&action=print_fine_details&sid=<?php echo $viewfid;?>',null,'width=700,height=500,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  />
  
  
  </td></tr>
  <?php }}else{?>
  <tr><td colspan="7" align="center" class="narmal"> No Records Found</td></tr>
  <?php }?>
  
   <tr height="25">
    <td colspan="7" align="center"></td>
   
  </tr>
  
  
</table>
<?php }?>
		</td>
		<td width="1" class="bgcolor_02"></td>
	  </tr>	  
	  <tr>
		<td height="1" colspan="3" class="bgcolor_02"></td>
	  </tr>
	</table>
<?php //}?>
<?php
$viewfid=$_GET['sid'];
if($action=='printpaid_balance'){
$stdentdata = getarrayassoc("SELECT * FROM `es_preadmission` WHERE `es_preadmissionid` = '$viewfid'");
$es_classname = $stdentdata['pre_class'];	
?>
<table width="100%" border="0">
  <tr>
    <td>
	<table width="100%" border="0" cellspacing="0" cellpadding="2" >
		<tr>
			<td></td>
			<td></td>
	<td width="592" rowspan="10" align="center"><?php echo displayimage("images/student_photos/".$stdentdata['pre_image'],'127');?></td>
		</tr>
		<tr>
			<td align="left" width="276">&nbsp;&nbsp;<b>Registration&nbsp;Number :</b> </td>
			<td align="left" width="321"><?php //echo $_SESSION['eschools']['student_prefix'];?><?php echo $viewfid;?></td>
			<td width="91"></td>
		</tr>
		<tr>
			<td align="left">&nbsp;&nbsp;<b>Name : </b></td>
			<td align="left"><?php echo $stdentdata['pre_name'];?></td>
			<td></td>
		</tr>
		
		<tr>
			<td align="left">&nbsp;&nbsp;<b>Class : </b></td>
			<td align="left"><?php echo classname($stdentdata['pre_class']);?></td>
			<td></td>
		</tr>
		<tr>
			<td align="left">&nbsp;&nbsp;<b>Date Of Birth : </b></td>
			<td align="left"><?php echo displaydate($stdentdata['pre_dateofbirth']);?></td>
			<td></td>
		</tr>
		<tr>
			<td align="left">&nbsp;&nbsp;<b>Father/Guardian Name : </b></td>
			<td align="left"><?php echo $stdentdata['pre_fathername'];?></td>
			<td></td>
		</tr>
		<tr>
			<td height="20"></td>
			<td>&nbsp;</td>
			<td></td>
		</tr>
		</table>
	</td>
  </tr>
   <tr>
                    <td align="center" valign="top">
                        <table width="100%" border="1" cellspacing="0" cellpadding="3" class="tbl_grid">
                            <tr class="bgcolor_02" height="20">
                                <td width="39%" class="admin">&nbsp;Particulars</td>
                                <td width="23%" class="admin">Amount</td>
                              <td width="38%" class="admin">Installments</td>					
                          </tr>
                            <?php 				
                            $obj_feesmaster = new es_feemaster();
                            $es_feemasterList = $obj_feesmaster->GetList(array(array("fee_class", "=", "$es_classname"),
                                                                        array("fee_fromdate","=","$from_finance"),
                                                                        array("fee_todate","=","$to_finance")), "es_feemasterid", false);
                            if(count($es_feemasterList)>0)
                            {
                            foreach ($es_feemasterList as $eachrecord){
                            ?>
                            <tr class="narmal">
                                <td align="left">&nbsp;<?php echo ucwords(strtolower($eachrecord->fee_particular)); ?></td>
                                <td align="left"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord->fee_amount, 2, '.', ''); ?></td>
                                <td align="center"><?php echo $eachrecord->fee_instalments; ?></td>					
                          </tr>	
                            <?php } } else { ?>	
                            <tr class="narmal">
                                <td align="center" colspan="3">No Particulars Added</td>					
                            </tr>
                        <?php } ?>	
                        </table>
                    </td>
                </tr>
				<tr>
                    <td height="25" align="left" valign="middle" class="admin">&nbsp;Fee Paid Details</td>
                </tr>
				  <tr>
                    <td align="center" valign="top">
                        <table width="100%" border="1" cellspacing="0" cellpadding="3" class="tbl_grid">
                      <tr class="bgcolor_02" height="25">
                                <td width="5%" align="center" class="admin">&nbsp;S.No</td>
                              <td width="22%" align="left" class="admin">&nbsp;Particulars</td>
                              <td width="24%" class="admin">Payment Date</td>
                              <td width="26%" class="admin">Amount Paid</td>
							  <td width="23%" class="admin">Amount Waived</td>
                          </tr>		
                            <?php 
                            $i= 1;
                            if(count($feedetails)>0)
                            {
								foreach($feedetails as $eachrecord)
								{ ?>
									<tr>
										<td align="center" class="narmal">&nbsp;<?php echo $i++; ?></td>
									  <td align="left" class="narmal">&nbsp;<?php echo ucwords(strtolower($eachrecord['particulartname'])); ?></td>
									  <td align="left" class="narmal"><?php echo displayDate($eachrecord['date']); ?></td>
									  <td align="left" class="narmal"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['feeamount'], 2, '.', ''); ?></td>  
									  <td align="left" class="narmal"><?php if($eachrecord['fee_waived']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['fee_waived'], 2, '.', '');} ?></td> 
									  
						  </tr>
						<?php 	}
							} else { ?>
                                <tr>
                                    <td colspan="5" align="center" class="narmal"> No fee Paid Till Now</td>
                                </tr>
                            <?php } ?>
                         </table>
                  </td>
                </tr>
				<tr>
                    <td height="25" align="left" valign="middle" class="admin">&nbsp;Balance Fee</td>
                </tr>
  <tr>
    <td><table width="100%" border="1" cellspacing="0" cellpadding="3" class="tbl_grid">
                            <tr class="bgcolor_02" height="35">
                                <td width="5%" align="center" class="admin">&nbsp;S.No</td>
                              <td width="16%" class="admin">Particulars</td>
                                <td width="11%" class="admin">Total Fee </td>
                              <td width="4%" class="admin">[I]</td>
                                <td width="22%" class="admin">Fee Paid</td>
								 <td width="17%" class="admin">Fee Waived</td>
                                <td width="14%" class="admin">Balance</td>
                              <td width="11%" class="admin">[PI]</td>
                          </tr>		
                            <?php 				
                            $obj_feesmaster = new es_feemaster();
                            $es_feemasterList = $obj_feesmaster->GetList(array(array("fee_class", "=", "$es_classname"),
                            array("fee_fromdate","=","$from_finance"),
                            array("fee_todate","=","$to_finance")), "es_feemasterid", false);
                            if(count($es_feemasterList)>0)
                            {
								$total_fee = 0;
								$paid_fee = 0;
								$balance_fee = 0;
								$i=1;
								foreach ($es_feemasterList as $eachrecord){
									$feetotdetails = getarrayassoc("SELECT COUNT(*),SUM(feeamount),SUM(fee_waived) FROM `es_feepaid`
									WHERE `studentid` =".$viewfid." 
									AND `class` = '".$es_classname."' 
									AND `particulartname` = '".$eachrecord->fee_particular."'
									AND fi_fromdate = '" . $from_finance . "' 
									AND fi_todate = '" . $to_finance . "' ");
									
									?>
									<tr class="narmal">
                                        <td align="center">&nbsp;<?php echo $i++; ?></td> 
                                      <td align="left"><?php echo ucwords(strtolower($eachrecord->fee_particular)); ?></td>
                                        <td align="left"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord->fee_amount, 2, '.', ''); ?></td>
                                        <td align="center"><?php echo $eachrecord->fee_instalments; ?></td>
                                        <td align="left"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($feetotdetails['SUM(feeamount)'], 2, '.', ''); ?></td> 
										<td align="left"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($feetotdetails['SUM(fee_waived)'], 2, '.', ''); $tot_waived +=$feetotdetails['SUM(fee_waived)']; ?></td>
                                        <td align="left"><?php
										$tot_paid = $feetotdetails['SUM(feeamount)']+$feetotdetails['SUM(fee_waived)'];
										 echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord->fee_amount-$tot_paid, 2, '.', ''); ?></td>
                                        <td align="center"><?php echo $feetotdetails['COUNT(*)']; ?></td>					
									</tr>
								<?php 
								$total_fee+=$eachrecord->fee_amount;
								 $paid_fee+=$feetotdetails['SUM(feeamount)'];
								 $balance_fee+=$eachrecord->fee_amount-$feetotdetails['SUM(feeamount)'];
								
                            	}
								 
								?>
								<tr class="narmal">
                                        <td align="center">&nbsp;</td> 
                                        <td align="left"><b>TOTAL</b></td>
                                        <td align="left"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($total_fee, 2, '.', ''); ?></td>
                                        <td align="center"></td>
                                        <td align="left"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($paid_fee, 2, '.', ''); ?></td>
										<td align="left"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($tot_waived, 2, '.', ''); ?></td>
                                        <td align="left"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($balance_fee, 2, '.', ''); ?></td>
                                        <td align="center"><?php echo $feetotdetails['COUNT(*)']; ?></td>					
									</tr>
								<?php 
							} else { ?>	
                            <tr class="narmal">
                                <td align="center" colspan="8">No Particulars Added</td>					
                            </tr>	
                            <?php } ?>
                        </table></td>
  </tr>
    
                
              
</table>


<?php }?>

