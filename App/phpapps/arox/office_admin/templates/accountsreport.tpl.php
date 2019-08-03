<script type="text/JavaScript">
function newWindowOpen(href){
    window.open(href,null, 'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');
}

</script>
<?php
/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
/**
*   View balance sheeet Reports
*/
	if ($action=='balancesheet'){ 
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
  </tr>
	<tr>
		<td height="25" colspan="3" class="bgcolor_02">&nbsp;Balance Sheet</td>
	</tr>
    <tr>
		<td width="1" class="bgcolor_02"></td>
        <td align="left" valign="top">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr height="25"><td>&nbsp;</td></tr>
				<tr>
					<td>
						<table width="100%" border="0" class="" cellpadding="5px;">
							<form action="" method="post">
							<tr>
								<td width="27%">&nbsp;Financial Year</td>
								<td width="43%">
									<select name="pre_year">
									<?php 
									foreach($school_details_res as $each_record) { ?>
									<option value="<?php echo $each_record['es_finance_masterid']; ?>" <?php if($each_record['es_finance_masterid']                                    ==$pre_year) { echo "selected"; }?>><?php echo displaydate($each_record['fi_startdate'])." To ".displaydate(                                    $each_record['fi_enddate']); ?>                   
									</option>
									<?php } ?>
									</select>	
							  </td>
							 
								<td width="30%" align="right">
									<input name="searchbalance" type="submit" class="bgcolor_02" value="search"  style="cursor:pointer;"/>
							  </td>
							</tr>
						  </form>
						</table>
					</td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td align="center">
						<table width="100%" border="1" cellspacing="0" cellpadding="0" class="tbl_grid">
							<tr class="bgcolor_02" height="25">
								<td align="center" class="admin" width="50%">Paid In</td>
								<td align="center" class="admin" width="50%">Paid Out</td>
							</tr>
							<tr>
								<td align="center" valign="top" >
									<table width="90%" border="0" cellspacing="0" cellpadding="0">
				  <?php 
				  		
						$paidinarr  = voucher_partypes('paidin');
						$paidintot  = 0;
						foreach($paidinarr as $eachvocture) 
						{
						$vocurname  = $eachvocture['voucher_type'];
						 $vocturetot = vouchersumforselvoc("$vocurname", $from_finance, $to_finance );
						if(isset($vocturetot) && $vocturetot!=""){
						$paidintot  = $paidintot+$vocturetot;
					?>
										<tr>
											<td width="50%" class="narmal" align="left">
												<?php echo $eachvocture['voucher_type']; ?>
											</td>
											<td width="50%" class="narmal" align="right">
				<?php echo $_SESSION['eschools']['currency'] .'&nbsp;'. number_format($vocturetot, 2, '.', ''); ?>
											</td>
										</tr>
						 <?php } }?> 
										<tr>
											<td>&nbsp;</td>
											<td>&nbsp;</td>
										</tr>
									
									</table>
								</td>
								<td align="center" valign="top">
									<table width="90%" border="0" cellspacing="0" cellpadding="0">
<?php

	$paidoutarr = voucher_partypes('paidout');
	$paidouttot = 0;
	foreach($paidoutarr as $eachvocture) {						
		$vocurname  = $eachvocture['voucher_type'];
		$paidoutvocturetot = vouchersumforselvoc("$vocurname", $from_finance, $to_finance );
		if (isset($paidoutvocturetot) && $paidoutvocturetot!=""){
			$paidouttot = $paidouttot+$paidoutvocturetot;
?>
										<tr>
											<td width="50%" class="narmal" align="left"><?php echo $eachvocture['voucher_type']; ?></td>
											<td width="50%" class="narmal" align="right">
		<?php echo $_SESSION['eschools']['currency'].'&nbsp;'.number_format($paidoutvocturetot, 2, '.', ''); ?>
											</td>
										</tr>
						      <?php } }?> 
										<tr>
											<td>&nbsp;</td>
											<td>&nbsp;</td>
										</tr>
						  
									</table>
								</td>
							</tr>	
                            <tr>
								<td align="center" valign="middle" >
									<table border="0" cellpadding="0" cellspacing="0" width="90%">
											<?php if(isset($paidintot) && $paidintot!=""){ ?>
										<tr>
											<td width="50%" height="20" align="right" class="adminfont">Total:</td>
										  <td width="50%" align="right" class="adminfont">
				<?php echo $_SESSION['eschools']['currency'].'&nbsp;'.number_format($paidintot, 2, '.', ''); ?>
										  </td>
										</tr>
									<?php }else{?>
										<tr>
											<td colspan="2" align="center" class="bgcolor_02">No Records Found </td>
							
										</tr><?php }?>
								  </table>
								</td>
								<td align="center" valign="middle">
                                <table border="0" cellpadding="0" cellspacing="0" width="90%">
										<?php if(isset($paidouttot) && $paidouttot!=""){ ?>
										<tr>
											<td width="50%" height="20" align="right" class="adminfont">Total:</td>
										  <td width="50%" align="right" class="adminfont">
				<?php echo $_SESSION['eschools']['currency'].'&nbsp;'.number_format($paidouttot, 2, '.', ''); ?>
										  </td>
										</tr>
						  <?php }else{?>
										<tr>
											<td colspan="2" align="center" class="bgcolor_02">No Records Found </td>
							
										</tr><?php }?>
								  </table>
									
								</td>
							</tr>					  
						</table>					
					</td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td align="right" style="padding-right:5px;">
					   
					   <?php 
					   if($paidintot!="" || $paidouttot!=""){
					   if(in_array('12_9',$admin_permissions)){?>
<input type="button" value="Print" class="bgcolor_02" onclick= "newWindowOpen('?pid=25&action=print_balancesheet&pre_year=<?php echo $pre_year;?>&searchbalance=<?php echo $searchbalance;?>');" style="cursor:pointer;"/>
				


<?php }}?>
					   
			   	  </td>
				</tr>
				<tr><td>&nbsp;</td></tr>
			</table>
		</td>
		<td width="1" class="bgcolor_02"></td>
	</tr>
	<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>			
</table>

<?php
}

//TO Print balancesheet
if ($action=='print_balancesheet'){ 

	$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_finance_master','ACCOUNTING','BALANCE SHEET','0','BALANCE SHEET PRINT','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
	
?>
	<table width="100%" border="1" cellspacing="0" cellpadding="0" class="tbl_grid">
							<tr class="bgcolor_02" height="25">
								<td align="center" class="admin" width="50%">Paid In</td>
								<td align="center" class="admin" width="50%">Paid Out</td>
							</tr>
							<tr>
								<td align="center" valign="top">
									<table width="90%" border="0" cellspacing="0" cellpadding="0">
				  <?php 
				  		
						$paidinarr  = voucher_partypes('paidin');
						$paidintot  = 0;
						foreach($paidinarr as $eachvocture) 
						{
						$vocurname  = $eachvocture['voucher_type'];
						$vocturetot = vouchersumforselvoc("$vocurname", $from_finance, $to_finance );
						if(isset($vocturetot) && $vocturetot!=""){
						$paidintot  = $paidintot+$vocturetot;
					?>
										<tr>
											<td width="50%" class="narmal" align="left">
												<?php echo $eachvocture['voucher_type']; ?>
											</td>
											<td width="50%" class="narmal" align="right">
				<?php echo $_SESSION['eschools']['currency'] .'&nbsp;'. number_format($vocturetot, 2, '.', ''); ?>
											</td>
										</tr>
						 <?php } }?> 
										<tr>
											<td>&nbsp;</td>
											<td>&nbsp;</td>
										</tr>
									
									</table>
								</td>
								<td align="center" valign="top">
									<table width="90%" border="0" cellspacing="0" cellpadding="0">
<?php

	$paidoutarr = voucher_partypes('paidout');
	$paidouttot = 0;
	foreach($paidoutarr as $eachvocture) {						
		$vocurname  = $eachvocture['voucher_type'];
		$paidoutvocturetot = vouchersumforselvoc("$vocurname", $from_finance, $to_finance );
		if (isset($paidoutvocturetot) && $paidoutvocturetot!=""){
			$paidouttot = $paidouttot+$paidoutvocturetot;
?>
										<tr>
											<td width="50%" class="narmal" align="left"><?php echo $eachvocture['voucher_type']; ?></td>
											<td width="50%" class="narmal" align="right">
		<?php echo $_SESSION['eschools']['currency'].'&nbsp;'.number_format($paidoutvocturetot, 2, '.', ''); ?>
											</td>
										</tr>
						      <?php } }?> 
										<tr>
											<td>&nbsp;</td>
											<td>&nbsp;</td>
										</tr>
						  
									</table>
								</td>
							</tr>
							<tr>
								<td align="center" valign="middle" >
									<table border="0" cellpadding="0" cellspacing="0" width="90%">
											<?php if(isset($paidintot) && $paidintot!=""){ ?>
										<tr>
											<td width="50%" height="20" align="right" class="adminfont">Total:</td>
										  <td width="50%" align="right" class="adminfont">
				<?php echo $_SESSION['eschools']['currency'].'&nbsp;'.number_format($paidintot, 2, '.', ''); ?>
										  </td>
										</tr>
									<?php }else{?>
										<tr>
											<td colspan="2" align="center" class="bgcolor_02">No Records Found </td>
							
										</tr><?php }?>
								  </table>
								</td>
								<td align="center" valign="middle">
                                <table border="0" cellpadding="0" cellspacing="0" width="90%">
										<?php if(isset($paidouttot) && $paidouttot!=""){ ?>
										<tr>
											<td width="50%" height="20" align="right" class="adminfont">Total:</td>
										  <td width="50%" align="right" class="adminfont">
				<?php echo $_SESSION['eschools']['currency'].'&nbsp;'.number_format($paidouttot, 2, '.', ''); ?>
										  </td>
										</tr>
						  <?php }else{?>
										<tr>
											<td colspan="2" align="center" class="bgcolor_02">No Records Found </td>
							
										</tr><?php }?>
								  </table>
									
								</td>
							</tr>
							<tr> 
							    <td align="right" colspan="2">		
	
							   </td>	
							</tr>					  
</table>

<?php
}
// End of printing balance sheet
/**
*   View ledger summery Reports
*/
	if ($action=='ledger' ){ 
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<form action="?pid=25&action=ledger" method="post" name="ledger">
	<tr>
         <td height="3" colspan="3"></td>
    </tr>
	<tr>
	  <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;Ledger Summary</td>
	</tr>
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="left" valign="top">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr><td colspan="6" height="25">&nbsp;</td></tr>
				<tr>
					<td width="" class="admin">&nbsp;Ledger Type </td>
					<td width="" class="menutitlein">
						<select name="es_particulars" >
						<?php $ledgerlistarr =ledger_finance();
						foreach($ledgerlistarr as $eachledger) { ?>
						<option value="<?php echo $eachledger['lg_name']; ?>" <?php if($es_particulars==$eachledger['lg_name']) { echo "selected='selected'"; } ?>><?php echo $eachledger['lg_name']; ?></option>
						<?php } ?>
						</select>
					</td>
					<td>&nbsp;</td>
					<td> 
						<select name="pre_year">
						<?php 
						foreach($school_details_res as $each_record) { ?>
						<option value="<?php echo $each_record['es_finance_masterid']; ?>" <?php if($each_record['es_finance_masterid']                        ==$pre_year) { echo "selected"; }?>><?php echo displaydate($each_record['fi_startdate'])." To ".displaydate(                        $each_record['fi_enddate']); ?>                   
						</option>
						<?php } ?>
						</select>	
					</td>
					 <td>Cheque No</td>
						<td>:</td>
						<td><input type="text" name="es_checkno" value="<?php echo $es_checkno; ?>" /></td>
					<td>&nbsp;</td>
					<td width="" class="menutitlein">
					    <input name="ledgersummerysub" type="submit" class="bgcolor_02" value="Search" style="cursor:pointer" />
				    </td>
				</tr>
				<tr><td colspan="6" height="25">&nbsp;</td></tr>
			</table>
<?php if ($ledgersummerysub=='Search' ) {?>

			<table width="100%" border="1" cellpadding="0" cellspacing="0" class="tbl_grid">
			
				<?php if($record['lg_openingbalance']!='' || $credittot!='' || $debittot!=''){?>
				<tr>
				       <td colspan="3" align="left"  class="narmal" style="padding:10px;"><strong>Opening Balance&nbsp;:&nbsp;&nbsp;
					   <?php $opening = $record['lg_openingbalance'];
							 
					 echo $_SESSION['eschools']['currency']?>&nbsp;<?php echo number_format($opening, 2, '.', '').' '.ucfirst($record['lg_amounttype']); ?>
					 </strong></td>
                 	 <td colspan="4" align="right"  class="narmal" style="padding:10px;"><strong>Closing Balance : 
					  <?php if($record['lg_amounttype']=='credit'){
					  $probal = $credittot-$debittot+$opening;
					  echo $_SESSION['eschools']['currency']?>&nbsp;<?php echo number_format($probal, 2,'.', '');
					  }
					  else{
					  $probal = $credittot-$debittot-$opening;
					  echo $_SESSION['eschools']['currency'].number_format($probal, 2,'.', '');} ?>
					  <?php if($probal<0){echo 'Debit';}elseif($probal>0){echo 'Credit';}?>
					  </strong>
				  </td>
				</tr>
				 <?php }?> 				
				
			<?php if($no_rows > 0){?>
				<tr>
					<td width="11%" height="23" align="center" valign="middle" class="bgcolor_02">Date</td>
					<td align="center" valign="middle" class="bgcolor_02">Narration</td>
					<td align="left" valign="middle" class="bgcolor_02">Voucher Type</td>
					<td class="bgcolor_02" align="center">Voucher</td>
					<td class="bgcolor_02" align="center">Debit</td>
					<td class="bgcolor_02" align="center">Credit</td>
					<td class="bgcolor_02" align="center">Bank Details</td>
				</tr>
<?php 
	$rownum = 1;
	$debittot = 0;
	$credittot = 0;	
	 
	foreach ($ledger_det as $eachrecord){
?>	
				 <tr>
					<td height="25" align="center" valign="middle" class="narmal"><?php echo displaydate($eachrecord['es_receiptdate']); ?></td>
					<td width="19%" align="left" valign="middle" class="narmal"><?php echo $eachrecord['es_narration']; ?></td>
					<td width="16%" align="left" valign="middle" class="narmal"><?php echo $eachrecord['es_vouchertype']; ?></td>
					<td width="11%" align="left" valign="middle" class="narmal"><?php echo $eachrecord['es_voucherentryid'].'/'.$eachrecord['es_receiptno']; ?></td>
					<td width="11%" align="right" valign="middle" class="narmal"><?php if($eachrecord['es_vouchermode'] == 'paidout') { echo                    $_SESSION['eschools']['currency'].'&nbsp;'.number_format($eachrecord['es_amount'], 2, '.', '');
					$debittot = $debittot+$eachrecord['es_amount']; } else { echo " "; }  ?></td>
					<td width="10%" align="right" valign="middle" class="narmal"><?php if($eachrecord['es_vouchermode'] == 'paidin') { echo 
					$_SESSION['eschools']['currency'].'&nbsp;'.number_format($eachrecord['es_amount'], 2, '.', '');
					$credittot = $credittot+$eachrecord['es_amount']; } else { echo " "; } ?>					</td>
					<td width="22%" align="left" valign="middle" class="narmal">
				Acct - <?php echo $eachrecord['es_bankacc'];?><br />
				  Chq - <?php echo $eachrecord['es_checkno'];?><br />
			      Bank - <?php echo ucfirst($eachrecord['es_bank_name']);?>
				   </td>
				</tr>
				
<?php
			$rownum++;
				} 
	
?>	
    
			<tr>
				<td colspan="4" align="right"><strong>Total&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</strong></td>
				<td align="right"><b><?php echo $_SESSION['eschools']['currency'].'&nbsp;'.number_format($debittot, 2, '.', ''); ?></b></td>
				<td align="right"><strong><?php echo $_SESSION['eschools']['currency'].'&nbsp;'.number_format($credittot, 2, '.', ''); ?></strong></td>
				<td></td>
			</tr>
			
				 
		  </table>
			<table width="100%">
			<tr>
			    
				 <td align="center" >
				 <?php  paginateexte($start, $q_limit, $no_rows, "action=ledger&column_name=".$orderby."&es_particulars=".$es_particulars."&ledgersummerysub=".$ledgersummerysub."&pre_year=".$pre_year); ?>
				 </td>
	</tr>
	</table> 		
			<!-- <table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
				  <td width="150" align="right" class="menutitlein">&nbsp;</td>
				  <td width="150" align="right" class="menutitlein">&nbsp;</td>
				  <td width="166" align="right" class="narmal"><strong>Opening Balance </strong></td>
				  <td width="59" align="right" class="narmal"><strong><?php //echo $_SESSION['eschools']['currency'].number_format($debittot,                              2, '.', ''); ?></strong></td>
				  <td width="73" align="right" class="narmal">&nbsp;</td>
				</tr>
				<tr>
				  <td align="right" class="menutitlein">&nbsp;</td>
				  <td align="right" class="menutitlein">&nbsp;</td>
				  <td align="right" class="narmal"><strong>Current Total </strong></td>
				  <td align="right" class="narmal">&nbsp;</td>
				  <td align="right" class="narmal"><strong><?php //echo $_SESSION['eschools']['currency'].number_format($credittot, 2, '.', '                         '); ?></strong></td>
				</tr>
				<tr>
				  <td align="right" class="menutitlein">&nbsp;</td>
				  <td align="right" class="menutitlein">&nbsp;</td>
				  <td align="right" class="narmal"><strong>Closing Balance </strong></td>
				  <td align="right" class="narmal"><strong>
				  <?php //$probal =$credittot-$debittot; echo $_SESSION['eschools']['currency'].number_format($probal, 2,'.', '');?></strong>                          </td>
				  <td align="right" class="narmal">&nbsp;</td>
				</tr>
			</table> -->
			<table width="100%" height="38" border="0" cellpadding="0" cellspacing="0">
					<tr>
					  <td align="right" valign="bottom" style="padding-right:5px;">
					  <?php if(in_array('12_10',$admin_permissions)){?>

<input name="button" type="button" class="bgcolor_02" style="cursor:pointer;" 
					  onclick= "newWindowOpen('?pid=25&action=print_ledger&pre_year=<?php echo $pre_year;?>
					  &es_particulars=<?php echo $es_particulars;?>');" value="Print"/>
					  

<?php }?>
					  
					  
					  
					  </td>
					</tr>
					<tr><td>&nbsp;</td></tr>
					 <?php }else {echo '<tr><td colspan="6" align="center"  class="bgcolor_02">No Records Found</td></tr>'; }?>
			</table>
		  <?php } ?>
		</td>
		<td width="1" class="bgcolor_02"></td>
	</tr>
	<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>
 </form>
</table>			
<?php
}
//To print ledger
if ($action=='print_ledger' ){ 
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_voucherentry','ACCOUNTING','LEDGER SUMMERY','".$svg."','LEDGER SUMMERY PRINT','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);
?>
<table width="100%" border="1" cellpadding="0" cellspacing="0" class="tbl_grid">
			
				<tr>
                      <td height="25" colspan="3" align="left"  class="narmal" >
					  <strong>Ledger&nbsp;Name&nbsp;:&nbsp;<?php echo $es_particulars;   ?></strong></td>
					  <td colspan="3" align="right"  class="narmal" >
					  <strong>&nbsp;Financial&nbsp;Year&nbsp;:&nbsp;<?php echo func_date_conversion("Y-m-d","d/m/Y",$from_finance).'&nbsp;To&nbsp;'.func_date_conversion("Y-m-d","d/m/Y",$to_finance);   ?></strong></td>
				</tr>
				
				
				<tr>   <?php if($record['lg_openingbalance']!=''){?>
				       <td colspan="3" align="left"  class="narmal"><strong>Opening Balance&nbsp;:&nbsp;&nbsp;
					   <?php $opening = $record['lg_openingbalance'];
					 echo $_SESSION['eschools']['currency']?>&nbsp;<?php echo number_format($opening, 2, '.', '').' '.ucfirst($record['lg_amounttype']); ?>
					 </strong></td><?php }?>
					 <?php if($record['lg_openingbalance']!='' || $credittot!='' || $debittot!=''){?>
                 	 <td colspan="3" align="right"  class="narmal" style="padding:10px;"><strong>Closing Balance : 
					  <?php if($record['lg_amounttype']=='credit'){$probal = $credittot-$debittot+$opening;
					  echo $_SESSION['eschools']['currency']?>&nbsp;<?php echo number_format($probal, 2,'.', '');}
					  else{$probal = $credittot-$debittot-$opening;
					  echo $_SESSION['eschools']['currency']?>&nbsp;<?php echo number_format($probal, 2,'.', '');} ?>
					  <?php if($probal<0){echo 'Debit';}elseif($probal>0){echo 'Credit';}?>
					  </strong>
				  </td>
				</tr>
				 <?php }?> 				
				
			
				<tr>
					<td width="14%" height="23" align="center" valign="middle" class="bgcolor_02">Date</td>
					<td align="center" valign="middle" class="bgcolor_02">Narration</td>
					<td align="center" valign="middle" class="bgcolor_02">Voucher Type</td>
					<td align="center" valign="middle" class="bgcolor_02">Voucher</td>
					<td class="bgcolor_02" align="center">Debit</td>
					<td class="bgcolor_02" align="center">Credit</td>
				</tr>
<?php 
	$rownum = 1;
	$debittot = 0;
	$credittot = 0;	
	 if(count($ledger_det)>=1){
	foreach ($ledger_det as $eachrecord){
?>	
				 <tr>
					<td height="25" align="center" valign="middle" class="narmal"><?php echo displaydate($eachrecord['es_receiptdate']); ?></td>
					<td width="23%" align="left" valign="middle" class="narmal"><?php echo $eachrecord['es_narration']; ?></td>
					<td width="16%" align="left" valign="middle" class="narmal"><?php echo $eachrecord['es_vouchertype']; ?></td>
					<td width="16%" align="left" valign="middle" class="narmal"><?php echo $eachrecord['es_voucherentryid'].'/'.$eachrecord['es_receiptno']; ?></td>
					<td width="15%" align="right" valign="middle" class="narmal"><?php if($eachrecord['es_vouchermode'] == 'paidout') { echo                    $_SESSION['eschools']['currency'].'&nbsp;'.number_format($eachrecord['es_amount'], 2, '.', '');
					$debittot = $debittot+$eachrecord['es_amount']; } else { echo " "; }  ?></td>
					<td width="16%" align="right" valign="middle" class="narmal"><?php if($eachrecord['es_vouchermode'] == 'paidin') { echo 
					$_SESSION['eschools']['currency'].'&nbsp;'.number_format($eachrecord['es_amount'], 2, '.', '');
					$credittot = $credittot+$eachrecord['es_amount']; } else { echo " "; } ?>					</td>
				</tr>
				
<?php
			$rownum++;
				} }
	
?>	
    
			<tr>
				<td colspan="4" align="right"><strong>Total&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</strong></td>
				<td align="right"><b><?php echo $_SESSION['eschools']['currency'].'&nbsp;'.number_format($debittot, 2, '.', ''); ?></b></td>
				<td align="right"><strong><?php echo $_SESSION['eschools']['currency'].'&nbsp;'.number_format($credittot, 2, '.', ''); ?></strong></td>
			</tr>
			
				 
</table>
<?php	

}	
//End of print ledger
?>

