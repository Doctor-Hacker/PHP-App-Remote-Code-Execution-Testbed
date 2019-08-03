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
if($action=="saled_stationary"){
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="3" colspan="3"></td>
</tr>
<tr>
<td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;View Saled Stationary</strong></td>
</tr>
<tr>
<td width="1" class="bgcolor_02" ></td>
<td align="left" height="4" ></td>
<td width="1" class="bgcolor_02" ></td>
</tr>
<tr>
<td width="1" class="bgcolor_02"></td>
<td align="left" valign="top">		
				<form action="" method="post" name="preparetransportbill_form" >
				<table width="100%" border="0" cellspacing="3" cellpadding="0">	
					<?php  
					if (isset($message) && $message!=""){
					?>
					<tr>
					<td height="25" colspan="7" align="center" ><strong><?php echo $message; ?></strong></td>
					</tr>
					<?php
					}
					?>
                    <tr>
				<td width="18%" align="left" class="narmal">Class</td>
					<td width="48%" align="left"  class="narmal">
                    <select name="selclass">
					  <option value="">Select Class</option>
                      <?php
					  $class_sql="SELECT * FROM es_classes";
					  $class_exe=mysql_query($class_sql);
					  while($class_row=mysql_fetch_array($class_exe)){
					  ?>
					  <option <?php if($selclass==$class_row['es_classesid']) { echo "selected='selected'"; } ?> value="<?php echo $class_row['es_classesid']; ?>"><?php echo $class_row['es_classname']; ?></option>
					  <?php }?>
					  </select></td>
					<td width="7%" align="left">&nbsp;</td>
					<td colspan="2" align="left">&nbsp;</td>
					<td width="1%">&nbsp;</td>
					<td width="2%">&nbsp;</td>
				  </tr>
                  <?php /*?><tr>
					<td align="left" class="narmal">Payment Status</td>
					<td align="left"><span class="narmal">
					  <select name="payment_status" >
					    <option value="">-Select-</option>
					    <option <?php if($payment_status=='Paid') { echo "selected='selected'"; } ?> value="Paid">Paid</option>
					    <option <?php if($payment_status=='Unpaid') { echo "selected='selected'"; } ?> value="Unpaid">Unpaid</option>					    
				    </select>
					</span></td>
					<td align="left"><span class="narmal"> </span></td>
					<td colspan="2" align="left">      </td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr><?php */?>
                  <tr>
					<td align="left" class="narmal">Registration No.</td>
					<td align="left"><span class="narmal"><input name="registration_no" type="text" value="<?php echo $registration_no; ?>" size="5" />
					</span></td>
					<td align="left"><span class="narmal"> </span></td>
					<td colspan="2" align="left">      </td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td align="left" class="narmal">&nbsp;</td>
					<td align="left" class="narmal">					
					  <input name="viewbill" type="submit" class="bgcolor_02" value="Search" />
                      <?php if (in_array("14_14", $admin_permissions)) {?><input name="exportbill" type="submit" class="bgcolor_02" value="Export List" /><?php }?>					</td>
					<td align="left">&nbsp;</td>
					<td colspan="2" align="left">&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>		 
				  </table>
				</form>
                
                <table width="100%" cellpadding="0" cellspacing="0">
                <tr class="bgcolor_02" height="25">
                   <td width="5%" align="left" valign="top">S.NO</td>
				   <td width="11%" align="center" valign="top">Reg No.</td>
                   <td width="11%" align="center" valign="top">Student/Father Name</td>
				   <td width="8%" align="center" valign="top">Class</td>
				   <td width="11%" align="center" valign="top">Invoice No</td>
                  <td width="12%" align="center" valign="top">Saled Date</td>
                  <td width="11%" align="right" valign="top">Bill Amount</td>
                  <td width="10%" align="right" valign="top">Waived</td>
                  <td width="10%" align="right" valign="top">Paid Amount</td>
                  <td width="11%" align="center" valign="top">Action</td>
                </tr>
                <?php
                $i=1;
                	//array_print($student_row);
					//exit;
					$rw = 1;
					$slno = $start+1;
					$total_room_rate = 0;
					$total_deduction = 0;
					$total_amount_paid =0;
					if(count($student_row)>0){
					foreach($student_row as $student)					
						 {  
							if($rw %2 ==0)
								$rowclass = "even";
								else
								$rowclass = "odd";
								
								if($student['status']=='inactive')
								{
								$sty="style='color:red; font-weight:bold;'";
								}
								else
								{
								$sty='';
								}
								                ?>
                <tr class="<?php echo $rowclass;?>" height="25">
                   <td align="center" <?php echo $sty; ?>><?php echo $slno; ?></td>
				   <td align="center" <?php echo $sty; ?>><?php echo $student['es_preadmissionid']; ?></td>
                  <td align="center" <?php echo $sty; ?>><?php echo ucfirst($student['pre_name']).'<br>('.ucfirst($student['pre_fathername']).')'; ?></td>
				   <td align="center" <?php echo $sty; ?>><?php echo $student['es_classname']; ?></td>
				   <td align="center" <?php echo $sty; ?>><?php echo $student['invoice_no']; ?></td>
                  <td align="center" <?php echo $sty; ?>><?php echo func_date_conversion('Y-m-d', 'd/m/Y', $student['saled_date']); ?></td>
                   <td align="right" <?php echo $sty; ?>><?php echo number_format($student['total_amount'], 2, '.', ''); ?></td>
                   <td align="right" <?php echo $sty; ?>><?php echo number_format($student['waived_amount'], 2, '.', ''); ?></td>
                   <td align="right" <?php echo $sty; ?>><?php echo number_format($student['paid_amount'], 2, '.', ''); ?></td>
                   <td align="center" <?php echo $sty; ?>>
                   <a href="?pid=103&action=invoice_details&chgid=<?php echo $student['st_pay_id']; ?>&start=<?php echo $start.$PageUrl;?>" ><img src="images/b_browse.png" border="0" title="Print Recipt" alt="Print Recipt" /></a>&nbsp;
                   <?php
				   if($student['pay_status']=="Paid"){?><a href="javascript: void(0)" onclick="popup_letter('?pid=103&action=receipt&chgid=<?php echo $student['st_pay_id']; ?>&start=<?php echo $start.$PageUrl;?>')" ><img src="images/print_16.png" border="0" title="Print Recipt" alt="Print Recipt" /></a><?php }else{?>
                   <?php if (in_array("14_15", $admin_permissions)) {?>
                   <a href="?pid=103&action=payamount&chgid=<?php echo $student['st_pay_id']; ?>&start=<?php echo $start.$PageUrl;?>" >
                   <img src="images/pay_balance_16.png" border="0" title="Pay Amount" alt="Pay Amount" />
                   </a><?php }}?>
                   </td>
                </tr>
                <?php
					$rw++;
				    $slno++;
				    $total += $student['total_amount'];
					$total_deduction += $student['waived_amount'];
					$total_amount_paid +=$student['paid_amount'];
                }
                ?>
				<tr height="25">
                   <td colspan="6" align="right"><b>Total :</b> </td> 
				   <td align="right"><?php if($total > 0){echo number_format($total, 2, '.', '');}?></td>  
				   <td align="right"><?php if($total_deduction>0){echo number_format($total_deduction, 2, '.', '');}?></td>  
				   <td align="right"><?php if($total_amount_paid>0){echo number_format($total_amount_paid, 2, '.', '');}?></td>    
				   <td></td>                
                </tr>
                <tr height="25">
                   <td align="center" colspan="10"><?php
				   
				   
				   paginateexte($start, $q_limit, $no_rows, "action=".$action.$PageUrl);
				   ?></td>                   
                </tr>
				<tr height="25">
                   <td align="right" colspan="10" style="padding-right:5px;"><input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=103&action=print_tr_bills&start=<?php echo $start.$PageUrl; ?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /></td>                   
                </tr>
				<?php }else{?>
				<tr height="25">
                   <td align="center" colspan="10" >No Records Found</td>                   
                </tr>
				<?php }?>
				
                </table>
</td>
<td width="1" class="bgcolor_02"></td>
</tr>
</td>
<td width="1" class="bgcolor_02"></td>
</tr>
<tr>
<td height="1" colspan="3" class="bgcolor_02"></td>
</tr>
</table>
<?php }?>
<?php if($action=='print_tr_bills'){?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="3" colspan="3"></td>
</tr>
<tr>
<td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Stationary Bills</strong></td>
</tr>

<tr>
<td width="1" class="bgcolor_02"></td>
<td align="left" valign="top"><br />
<table width="100%" cellpadding="0" cellspacing="0">
                <tr class="bgcolor_02" height="25">
                   <td width="5%" align="left" valign="top">S.NO</td>
				   <td width="11%" align="center" valign="top">Reg No.</td>
                   <td width="11%" align="center" valign="top">Student/Father Name</td>
				   <td width="8%" align="center" valign="top">Class</td>
				   <td width="14%" align="center" valign="top">Invoice No</td>
                  <td width="15%" align="center" valign="top">Saled Date</td>
                  <td width="12%" align="right" valign="top">Bill Amount</td>
                  <td width="10%" align="right" valign="top">Waived</td>
                   <td width="14%" align="right" valign="top">Paid Amount</td>
                </tr>
                <?php
                $i=1;
                	//array_print($student_row);
					//exit;
					$rw = 1;
					$slno = $start+1;
					$total_room_rate = 0;
					$total_deduction = 0;
					$total_amount_paid =0;
					if(count($student_row)>0){
					foreach($student_row as $student)					
						 {  
							if($rw%2==0)
								$rowclass = "even";
								else
								$rowclass = "odd";
                ?>
                <tr class="<?php echo $rowclass;?>" height="25">
                   <td align="center"><?php echo $slno; ?></td>
				   <td align="center"><?php echo $student['es_preadmissionid']; ?></td>
                  <td align="center"><?php echo ucfirst($student['pre_name']).'<br>('.ucfirst($student['pre_fathername']).')'; ?></td>
				   <td align="center"><?php echo $student['es_classname']; ?></td>
				   <td align="center"><?php echo $student['invoice_no']; ?></td>
                  <td align="center"><?php echo func_date_conversion('Y-m-d', 'd/m/Y', $student['saled_date']); ?></td>
                   <td align="right"><?php echo number_format($student['total_amount'], 2, '.', ''); ?></td>
                   <td align="right"><?php echo number_format($student['waived_amount'], 2, '.', ''); ?></td>
                   <td align="right"><?php echo number_format($student['paid_amount'], 2, '.', ''); ?></td>
        </tr>
                <?php
					$rw++;
				    $slno++;
				    $total += $student['total_amount'];
					$total_deduction += $student['waived_amount'];
					$total_amount_paid +=$student['paid_amount'];
                }
                ?>
				<tr height="25">
                   <td colspan="6" align="right"><b>Total :</b> </td> 
				   <td align="right"><?php if($total > 0){echo number_format($total, 2, '.', '');}?></td>  
				   <td align="right"><?php if($total_deduction>0){echo number_format($total_deduction, 2, '.', '');}?></td>  
				   <td align="right"><?php if($total_amount_paid>0){echo number_format($total_amount_paid, 2, '.', '');}?></td>    
			    </tr>
                
				
				<?php }?>
				
                </table>
</td>
<td width="1" class="bgcolor_02"></td>
</tr>
<tr>
<td height="1" colspan="3" class="bgcolor_02"></td>
</tr>
</table>
<?php }?>
<?php if($action=='receipt') { 

// insert logs
		//$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_hostel_charges','HOSTEL','View Details','".$chgid."','RECEIPT PRINT','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	//$log_insert_exe=mysql_query($log_insert_sql);
//array_print($_GET);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Stationary Receipt</strong></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top">
				   <table width="100%" border="0">
					  <tr>
						<td>
								<table width="100%" border="0">
								  <tr>
									<td width="50%" valign="top"><table width="100%" border="0">
										  <tr>
											
											<td width="25%" height="25" align="left" valign="middle" class="admin">Receipt&nbsp;No</td>
											<td width="2%" align="left" valign="middle" class="admin">:</td>
											<td width="73%" align="left" valign="middle"><?php echo $payamount_details['st_pay_id']?></td>
										  </tr>
										  <tr>
											
											<td width="25%" height="25" align="left" valign="middle" class="admin">Student&nbsp;Name</td>
											<td width="2%" align="left" valign="middle" class="admin">:</td>
											<td width="73%" align="left" valign="middle"><?php echo ucfirst($payamount_details['pre_name']); ?></td>
										  </tr>
										<tr>
											
											<td height="25" align="left" valign="middle" class="admin">Registration&nbsp;No</td>
											<td align="left" valign="middle" class="admin">:</td>
											<td align="left" valign="middle"><?php echo $payamount_details['es_preadmissionid'];?></td>
										</tr>
									</table></td>
									<td valign="top"><table width="100%" border="0">
										  <tr>
												
												<td width="25%" height="25" align="left" valign="middle" class="admin">Receipt&nbsp;Date</td>
												<td width="2%" align="left" valign="middle" class="admin">:</td>
												<td width="73%" align="left" valign="middle"><?php echo func_date_conversion("Y-m-d","d/m/Y",$payamount_details['paid_date']); ?></td>
										  </tr>
										  <tr>
											
											<td height="25" align="left" valign="middle" class="admin">Father&nbsp;Name</td>
											<td align="left" valign="middle">:</td>
											<td align="left" valign="middle"><?php echo ucfirst($payamount_details['pre_fathername']);?></td>
										</tr>
										<tr>
											
											<td height="25" align="left" valign="middle" class="admin">Class</td>
											<td align="left" valign="middle" class="admin">:</td>
											<td align="left" valign="middle"><?php echo $payamount_details['es_classname']; ?></td>
										</tr>
										</table></td>	
									
								  </tr>
								</table>

						</td>
					  </tr>
					  <tr>
						<td><table width="100%" border="0">
							  <tr class="admin">
								<td align="left">Due Amount</td>
								<td align="left">Amount Waived</td>
								<td align="left">Amount Received</td>
							  </tr>
							  <tr>
								<td align="left"><?php echo number_format($payamount_details['total_amount'], 2, '.', ''); ?></td>
								<td align="left"><?php echo number_format($payamount_details['waived_amount'], 2, '.', ''); ?></td>
								<td align="left"><?php  echo number_format($payamount_details['paid_amount'], 2, '.', ''); ?></td>
							  </tr>
							</table>
                      </td>
					  </tr>
					  
					  <tr>
						<td><table width="100%" border="0">
							  <tr>
								<td align="right" valign="middle" class="admin">Authorised Signature</td>
							  </tr>
							  <tr>
								<td>&nbsp;</td>
							  </tr>
							</table>
						</td>
					  </tr>
					</table>
				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
    </tr>
  </table>
<?php } ?>
<?php
if($action=="payamount"){
?>
<script type="text/javascript" >
	function showAvatar()
			{
		
				var ch = document.de_allocate_room_form.eq_paymode.value;
				if (ch=='cash'){
					document.getElementById("patiddivdisp").style.display="none";
				}else{
				document.getElementById("patiddivdisp").style.display="block";
				}
			}		  
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="3" colspan="3"></td>
</tr>
<tr>
<td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Pay Stationary Charges</strong></td>
</tr>
<tr>
<td width="1" class="bgcolor_02" ></td>
<td align="left" height="4" ></td>
<td width="1" class="bgcolor_02" ></td>
</tr>
<tr>
<td width="1" class="bgcolor_02"></td>
<td align="left" valign="top">		
				
				<form action="" method="post" name="de_allocate_room_form">
                <table width="100%" border="0" cellspacing="3" cellpadding="4">	
					<?php  
					if (isset($message) && $message!=""){
					?>
					<tr>
					<td height="25" colspan="5" align="center" ><strong><?php echo $message; ?></strong></td>
					</tr>
					<?php
					}
					?>
                    <tr>
				<td width="19%" align="left" class="admin">Registration No.</td>
					<td width="1%" align="left" class="admin">:</td>
					<td width="31%" align="left"  class="narmal"><?php echo $student_row['es_preadmissionid']; ?></td>
					<td width="22%" align="left">&nbsp;</td>
					<td width="27%" align="left">&nbsp;</td>
				  </tr>
                    <tr>
				<td width="19%" align="left" class="admin">Student Name</td>
					<td width="1%" align="left" class="admin">:</td>
					<td width="31%" align="left"  class="narmal"><?php echo ucfirst($student_row['pre_name']); ?></td>
					<td width="22%" align="left">&nbsp;</td>
					<td align="left">&nbsp;</td>
				  </tr>
					<tr>
				<td width="19%" align="left" class="admin">Class</td>
					<td width="1%" align="left" class="admin">:</td>
					<td width="31%" align="left"  class="narmal"><?php echo $student_row['es_classname']; ?></td>
					<td width="22%" align="left">&nbsp;</td>
					<td align="left">&nbsp;</td>
				  </tr>
				  <tr>
				<td width="19%" align="left" class="admin">Father Name</td>
					<td width="1%" align="left" class="admin">:</td>
					<td width="31%" align="left"  class="narmal"><?php echo ucfirst($student_row['pre_fathername']); ?></td>
					<td width="22%" align="left">&nbsp;</td>
					<td align="left">&nbsp;</td>
				  </tr>
				 
                  
                  <tr>
					<td colspan="2" align="left" class="admin">Due Amount </td>
					<td align="left" class="admin">Amount Received </td>
					<td align="left"><span class="admin"> Waived Amount </span></td>
					<td align="left">      </td>
				  </tr>
				  <tr>
					<td colspan="2" align="left" valign="top" class="admin"><font color="#FF0000"><b>RS <?php echo $student_row['total_amount']; ?></b></font></td>
					<td align="left" valign="top" class="narmal"><input type="text" name="amount_paid" value="<?php echo $amount_paid; ?>" /></td>
					<td align="left" valign="top"><span class="narmal">
					  <input type="text" name="deduction" value="<?php echo $deduction; ?>" />
					</span></td>
					<td align="left">&nbsp;</td>
				  </tr>
                  <tr>					
					<td align="left" class="narmal" colspan="5">
                    
                    						<table width="100%" border="0" cellspacing="3" cellpadding="0">											
											<tr>
                                       		  <td width="15%" align="left" valign="middle" class="admin">&nbsp;&nbsp;</td>
                                       		  <td width="19%" align="left" valign="middle" class="admin">Payment Mode</td>
                                       		  <td width="3%" align="left" valign="top" class="admin">:</td>
                                       		  <td width="63%" align="left" valign="top" class="admin"><select name="eq_paymode" style="width:150px;" onchange="Javascript:showAvatar();" >
                                                <option value=""> - Select - </option>
												<option <?php if($eq_paymode=='cash') { echo "selected='selected'"; } ?> value ="cash">Cash</option>
                                                <option <?php if($eq_paymode=='cheque') { echo "selected='selected'"; } ?> value ="cheque">Cheque</option>
                                                <option <?php if($eq_paymode=='DD') { echo "selected='selected'"; } ?> value ="DD">DD</option>
                                              </select><font color="#FF0000">*</font></td>
                                   		    </tr>
											<tr>
											<td height="25" class="admin">&nbsp;</td>
											<td height="25" class="admin">Voucher&nbsp;Type</td>
											<td align="left" class="admin">:</td>
											<td class="narmal"><select name="vocturetypesel" style="width:150px;">
											<option value=""> - Select - </option>
											  <?php 
																						$voucherlistarr = voucher_finance();
																						krsort($voucherlistarr);
																						foreach($voucherlistarr as $eachvoucher) {	?>
											  <option value="<?php echo $eachvoucher['es_voucherid']; ?>" <?php if ($vocturetypesel==$eachvoucher['es_voucherid']){  
											   echo 'selected'; }?> ><?php echo $eachvoucher['voucher_type'];                        ?> ( <?php echo $eachvoucher['voucher_mode']; ?> )</option>
											  <?php } ?>
											</select><font color="#FF0000">*</font></td>
										    </tr>
                                            <tr>
												<td height="25" class="narmal">&nbsp;</td>
												<td height="25" class="admin">Ledger&nbsp;Type</td>
												<td align="left" class="admin">:</td>
												<td class="narmal"><select name="es_ledger" style="width:150px;"><option value=""> - Select - </option>
												  <?php 
																							$ledgerlistarr = ledger_finance();
																							foreach($ledgerlistarr as $eachledger) { 
																							?>
												  <option value="<?php echo $eachledger['lg_name']; ?>" <?php if($es_ledger==$eachledger['lg_name']) { echo                        'selected'; } elseif($eachledger['lg_name']=='Staff Salary'){echo 'selected';} ?>><?php echo $eachledger['lg_name']; ?> </option>
												  <?php } ?>
												</select><font color="#FF0000">*</font></td>
											</tr>
											<tr>
                                       		  <td align="left" valign="middle" colspan="4"><div  id="patiddivdisp"  style="display:none;" >
																<table  border="1" cellspacing="0" class="tbl_grid" width="100%" cellpadding="3">
																						
																	<tr>
																		<td align="left" class="bgcolor_02" colspan="3">Bank Details </td>
																	</tr>
																	
																	<tr>
																		<td align="left"   width="22%" class="admin" >Bank Name </td>
																		<td align="center"  width="4%" class="admin">:</td>
																		<td align="left"  width="74%"><input type="text" name="es_bank_name" value="<?php echo $es_bank_name;?>" /></td>
																	</tr>
																	<tr>
																		<td align="left" class="admin"> Account Number</td>
																		<td align="center" class="admin">:</td>
																		<td align="left" ><input type="text" name="es_bankacc" value="<?php echo $es_bankacc;?>" /></td>
																	</tr>
																	<tr>
																		<td align="left" class="admin">Cheque / DD Number </td>
																		<td align="center" class="admin">:</td>
																		<td align="left"><input type="text" name="es_checkno" value="<?php echo $es_checkno;?>" /></td>
																	</tr>
																	<tr>
																		<td align="left" class="admin">Teller Number </td>
																		<td align="center" class="admin">:</td>
																		<td align="left"><input type="text" name="es_teller_number" value="<?php echo $es_teller_number;?>" /></td>
																	</tr>
																	<tr>
																		<td align="left" class="admin">Pin </td>
																		<td align="center" class="admin">:</td>
																		<td align="left"><input type="text" name="es_bank_pin" value="<?php echo $es_bank_pin;?>" /></td>
																	</tr>
																</table>	
																</div></td>
                                   		    </tr>
											</table>                    </td>						
				  </tr>
				  <tr>
				    <td colspan="2" align="left" class="admin">&nbsp;</td>
				    <td align="left" class="narmal"><input type="hidden" name="dueamount" value="<?php echo $student_row['pay_amount'];?>" /><input type="submit" name="receive_amount" value="Pay Amount" class="bgcolor_02" /></td>
				    <td align="left">&nbsp;</td>
				    <td align="left">&nbsp;</td>
			      </tr>		 
				  </table>
                </form>
				
                
                
</td>
<td width="1" class="bgcolor_02"></td>
</tr>
</td>
<td width="1" class="bgcolor_02"></td>
</tr>
<tr>
<td height="1" colspan="3" class="bgcolor_02"></td>
</tr>
</table>
<?php } if($action == 'invoice_details' || $action == 'print_invoice_details') { ?>
<?php if($action == 'print_invoice_details') { ?>Academic Year:  <?php echo func_date_conversion('Y-m-d','d-m-Y',$academic_det['fi_startdate']).' To '.func_date_conversion('Y-m-d','d-m-Y',$academic_det['fi_enddate']); } ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="3" colspan="3"></td>
</tr>
<tr>
<td height="25" colspan="3" class="bgcolor_02"><span class="admin">&nbsp;Invoice Details</span></td>
</tr>
<tr>
<td class="bgcolor_02" width="1px"></td>
<td>
<table border="0" cellpadding="2" cellspacing="1" width="100%">
<tr>
<td width="8%" align="right">&nbsp;</td>
<td width="16%" align="left"><b>Student Name</b></td>
<td width="1%" align="left">:</td>
<td width="33%" align="left">&nbsp;<?php echo ucfirst($invoice_det[0]['pre_name']); ?></td>
<td width="12%" align="left"><b>Class</b>&nbsp;</td>
<td width="1%" align="left">:</td>
<td width="29%" align="left">&nbsp;<?php echo $invoice_det[0]['CLASS']; ?></td>
</tr>
<tr>
<td width="8%" align="right">&nbsp;</td>
<td width="16%" align="left"><strong>Father Name </strong></td>
<td width="1%" align="left">:</td>
<td width="33%" align="left">&nbsp;<?php echo ucfirst($invoice_det[0]['pre_fathername']); ?></td>
<td width="12%" align="left"><strong>Section</strong></td>
<td width="1%" align="left">:</td>
<td width="29%" align="left">&nbsp;<?php echo $invoice_det[0]['SECTION']; ?></td>
</tr>
<tr>
<td width="8%" align="right">&nbsp;</td>
<td width="16%" align="left"><strong>Reg.No</strong></td>
<td width="1%" align="left">:</td>
<td width="33%" align="left"><?php echo $invoice_det[0]['student_id']; ?></td>
<td width="12%" align="left"><strong>Invoice No </strong></td>
<td width="1%" align="left">:</td>
<td width="29%" align="left">&nbsp;<?php echo $invoice_det[0]['invoice_no']; ?></td>
</tr>
<tr>
<td width="8%" align="right">&nbsp;</td>
<td width="16%" align="left"><strong>Roll.No</strong></td>
<td width="1%" align="left">:</td>
<td width="33%" align="left"><?php echo $invoice_det[0]['ROLL_NO']; ?></td>
<td width="12%" align="left"><strong>Saled Date</strong></td>
<td width="1%" align="left">:</td>
<td width="29%" align="left">&nbsp;<?php echo func_date_conversion('Y-m-d','d-m-Y',$invoice_det[0]['created_on']); ?></td>
</tr>
</table>
</td>
<td class="bgcolor_02" width="1px"></td>
</tr>
<tr>
<td class="bgcolor_02" width="1px"></td>
<td>
<form method="post" action="" enctype="multipart/form-data">
<table width="100%" cellpadding="5">
<tr class="bgcolor_02" height="25">
<td>S.No</td><td>Item</td><td>Quantity</td><td>Price</td><td>Total</td>
</tr>
<?php
$i=0;
$total=0;
foreach($invoice_det as $invoice)
{

$class=($i%2==0)?'even':'odd';
?>
<tr class='<?php echo $class; ?>'>
<td><?php echo $i+1;?></td>
<td><?php echo $items_inf[$i]['item_name'];?></td>
<td><?php echo $invoice['item_qty'];?></td>
<td><?php echo $items_inf[$i]['cost'];?></td>
<td><?php echo ($invoice['item_qty']*$items_inf[$i]['cost']);?></td>
</tr>
<?php
$total+=$invoice['item_qty']*$items_inf[$i]['cost'];
$i++;
} 
?>
<tr class="bgcolor_02" ><td colspan="4" align="right"><strong>Grand Total</strong>:</td>
<td align="left" style="padding:5px;"><?php echo $total; ?></td></tr>
<?php if($action != 'print_invoice_details') { ?>
<tr><td colspan="5" align="right" style="padding:5px;"><input type="Button" name="back" value="Back" title="Back" alt="Back" class="bgcolor_02" onclick="history.go(-1)"/>&nbsp;&nbsp;<input type="button" name="print" value="Print" title="print" alt="print" onclick="window.open('?pid=103&action=print_invoice_details&chgid=<?php echo $chgid; ?>&start=<?php echo $start.$PageUrl; ?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');" class="bgcolor_02" />&nbsp;</td></tr>
<?php } ?>
</table>
</form>
</td>
<td class="bgcolor_02" width="1px"></td>
</tr>
<tr>
<td class="bgcolor_02" height="1px" colspan="3"></td>
</tr>
</table>
<?php } ?>


