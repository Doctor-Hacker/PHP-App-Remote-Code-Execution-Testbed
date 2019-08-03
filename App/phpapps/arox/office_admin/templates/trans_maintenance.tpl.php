<?php
if($action=="addmaintenance" || $action=="edit"){
		if(is_array($maintain_det) && count($maintain_det)>=1 && !$_POST ){
		$vehicle_no = $maintain_det['tr_transportid'];
		$maintenance_type = $maintain_det['tr_maintenance_type'];
		$maintenance_date = func_date_conversion("Y-m-d","d/m/Y",$maintain_det['tr_date_of_maintenance']);
		$amount_paid = $maintain_det['tr_amount_paid'];
		$remarks = $maintain_det['tr_remarks'];
		}
		if(is_array($voucher_det) && count($voucher_det)>=1 && !$_POST ){
		
		$eq_paymode = $voucher_det['es_paymentmode'];
		
		
		$voucher_det_01 = $db->getrow("SELECT * FROM es_voucher WHERE voucher_type = '".$voucher_det['es_vouchertype']."' AND voucher_mode='".$voucher_det['es_vouchermode']."'");
		$vocturetypesel =$voucher_det_01['es_voucherid'];
		$es_ledger = $voucher_det['es_particulars'];
		
		$es_bank_name = $voucher_det['es_bank_name'];
		$es_bankacc = $voucher_det['es_bankacc'];
		$es_checkno = $voucher_det['es_checkno'];
		$es_teller_number = $voucher_det['es_teller_number'];
		$es_bank_pin = $voucher_det['es_bank_pin'];
		}
?>
<script type="text/javascript" >
	function showAvatar()
			{
		
				var ch = document.maintenance_add.eq_paymode.value;
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
<td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Add Maintenance</strong></td>
</tr>
<tr>
<td width="1" class="bgcolor_02" ></td>
<td align="left" height="4" ></td>
<td width="1" class="bgcolor_02" ></td>
</tr>
<tr>
<td width="1" class="bgcolor_02"></td>
<td align="left" valign="top">		
				<form action="" method="post" name="maintenance_add" >
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
                    <td width="24%" align="left" class="narmal">Registration Number </td>
					<td width="42%" align="left"  class="narmal">
                    <select name="vehicle_no">
                    <option value="">Select Vehicle</option>
                    <?php
					$vehicle_sql="SELECT * FROM es_trans_vehicle WHERE status!='Delete'";
					$vehicle_exe=mysql_query($vehicle_sql);
					while($vehicle_row=mysql_fetch_array($vehicle_exe)){
					?>
                    <option value="<?php echo $vehicle_row['es_transportid']; ?>" <?php if($vehicle_no==$vehicle_row['es_transportid']){?> selected="selected"<?php }?>><?php echo $vehicle_row['tr_vehicle_no']; ?></option>
                    <?php }?>
                    </select><font color="#FF0000">*</font></td>
					<td width="7%" align="left">&nbsp;</td>
					<td colspan="2" align="left">&nbsp;</td>
					<td width="1%">&nbsp;</td>
					<td width="2%">&nbsp;</td>
				  </tr>
				  <tr>
					<td align="left" class="narmal"> Maintenance Type </td>
					<td align="left"><span class="narmal">
					  <input name="maintenance_type" type="text" size="16" value="<?php echo $maintenance_type; ?>" />
					  <font color="#FF0000">*</font></span></td>
					<td align="left"><span class="narmal"> </span></td>
					<td colspan="2" align="left">      </td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
                  <tr>
					<td align="left" class="narmal"> Maintenance Date </td>
					<td align="left"><span class="narmal">
					  <input name="maintenance_date" type="text" size="16" value="<?php echo $maintenance_date; ?>" readonly="true" />
                      <a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.maintenance_add.maintenance_date);return false;" ><img name="popcal" align="absmiddle" src="<?php echo JS_PATH ?>/WeekPicker/calbtn.gif" width="34" height="22" border="0" alt="" /></a>
                       <iframe width=199 height=178 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="<?php echo JS_PATH ?>/WeekPicker/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe>
					</span></td>
					<td align="left"><span class="narmal"> </span></td>
					<td colspan="2" align="left">      </td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
                  <tr>
					<td align="left" class="narmal">Amount Paid </td>
					<td align="left"><span class="narmal">
					  <input name="amount_paid" type="text" size="16" value="<?php echo $amount_paid; ?>" />
					  <font color="#FF0000">*</font></span></td>
					<td align="left"><span class="narmal"> </span></td>
					<td colspan="2" align="left">      </td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
                  <tr>
					<td align="left" class="narmal"> Remarks </td>
					<td align="left"><span class="narmal">
					  <input name="remarks" type="text" size="16" value="<?php echo $remarks; ?>" />
					  <font color="#FF0000">*</font></span></td>
					<td align="left"><span class="narmal"> </span></td>
					<td colspan="2" align="left">      </td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
                  <tr>
					<td align="left" class="narmal" colspan="6"><table width="100%" border="0" cellspacing="3" cellpadding="0">											
											<tr>
                                       		  <td width="15%" align="left" valign="middle" class="admin">&nbsp;&nbsp;</td>
                                       		  <td width="19%" align="left" valign="middle" class="admin">Payment Mode</td>
                                       		  <td width="3%" align="left" valign="top" class="admin">:</td>
                                       		  <td width="63%" align="left" valign="top" class="admin">
											  <?php if($action!='edit') { ?>
											  <select name="eq_paymode" style="width:150px;" onchange="Javascript:showAvatar();"  >
                                                <option <?php if($eq_paymode=='cash') { echo "selected='selected'"; } ?> value ="cash" >Cash</option>
                                                <option <?php if($eq_paymode=='cheque') { echo "selected='selected'"; } ?> value ="cheque">Cheque</option>
                                                <option <?php if($eq_paymode=='DD') { echo "selected='selected'"; } ?> value ="DD">DD</option>
                                              </select><?php } else { ?>  <select name="eq_paymode" style="width:150px; " onchange="Javascript:showAvatar();" disabled="disabled"  >
                                                <option <?php if($eq_paymode=='cash') { echo "selected='selected'"; } ?> value ="cash">Cash</option>
                                                <option <?php if($eq_paymode=='cheque') { echo "selected='selected'"; } ?> value ="cheque">Cheque</option>
                                                <option <?php if($eq_paymode=='DD') { echo "selected='selected'"; } ?> value ="DD">DD</option>
                                              </select><?php } ?></td>
                                   		    </tr>
											<tr>
											<td height="25" class="admin">&nbsp;</td>
											<td height="25" class="admin">Voucher&nbsp;Type</td>
											<td align="left" class="admin">:</td>
											<td class="narmal">  <?php if($action!='edit') { ?>
											<select name="vocturetypesel" style="width:150px;">
											  <?php 
																						$voucherlistarr = voucher_finance();
																						krsort($voucherlistarr);
																						foreach($voucherlistarr as $eachvoucher) {	?>
											  <option value="<?php echo $eachvoucher['es_voucherid']; ?>" <?php if ($vocturetypesel==$eachvoucher['es_voucherid']){  
											   echo 'selected'; } elseif($eachvoucher['es_voucherid']==9){ echo 'selected';}?> ><?php echo $eachvoucher['voucher_type'];                        ?> ( <?php echo $eachvoucher['voucher_mode']; ?> )</option>
											  <?php } ?>
											</select><?php } else { ?> <select name="vocturetypesel" style="width:150px;" disabled="disabled">
											  <?php 
																						$voucherlistarr = voucher_finance();
																						krsort($voucherlistarr);
																						foreach($voucherlistarr as $eachvoucher) {	?>
											  <option value="<?php echo $eachvoucher['es_voucherid']; ?>" <?php if ($vocturetypesel==$eachvoucher['es_voucherid']){  
											   echo 'selected'; } elseif($eachvoucher['es_voucherid']==9){ echo 'selected';}?> ><?php echo $eachvoucher['voucher_type'];                        ?> ( <?php echo $eachvoucher['voucher_mode']; ?> )</option>
											  <?php } ?>
											</select> <?php } ?></td>
										    </tr>
                                            <tr>
												<td height="25" class="narmal">&nbsp;</td>
												<td height="25" class="admin">Ledger&nbsp;Type</td>
												<td align="left" class="admin">:</td>
												<td class="narmal"> <?php if($action!='edit') { ?><select name="es_ledger" style="width:150px;">
                                                <option value=""> - Select - </option>
												  <?php 
																							$ledgerlistarr = ledger_finance();
																							foreach($ledgerlistarr as $eachledger) { 
																							?>
												  <option value="<?php echo $eachledger['lg_name']; ?>" <?php if($es_ledger==$eachledger['lg_name']) { echo                        'selected'; } ?>><?php echo $eachledger['lg_name']; ?> </option>
												  <?php } ?>
												</select> <?php } else { ?><select name="es_ledger" style="width:150px;" disabled="disabled">
                                                <option value=""> - Select - </option>
												  <?php 
																							$ledgerlistarr = ledger_finance();
																							foreach($ledgerlistarr as $eachledger) { 
																							?>
												  <option value="<?php echo $eachledger['lg_name']; ?>" <?php if($es_ledger==$eachledger['lg_name']) { echo                        'selected'; } ?>><?php echo $eachledger['lg_name']; ?> </option>
												  <?php } ?>
												</select><?php } ?>
                                                <font color="#FF0000">*</font></td>
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
																		<td align="left"  width="74%"><?php if($action!='edit') { ?><input type="text" name="es_bank_name" value="<?php echo $es_bank_name;?>" /><?php } else { ?><input type="text" name="es_bank_name" value="<?php echo $es_bank_name;?>" readonly="readonly" /><?php } ?></td>
																	</tr>
																	<tr>
																		<td align="left" class="admin"> Account Number</td>
																		<td align="center" class="admin">:</td>
																		<td align="left" ><?php if($action!='edit') { ?><input type="text" name="es_bankacc" value="<?php echo $es_bankacc;?>" /><?php } else { ?><input type="text" name="es_bankacc" value="<?php echo $es_bankacc;?>" readonly="readonly" /> <?php } ?></td>
																	</tr>
																	<tr>
																		<td align="left" class="admin">Cheque / DD Number </td>
																		<td align="center" class="admin">:</td>
																		<td align="left"><?php if($action!='edit') { ?><input type="text" name="es_checkno" value="<?php echo $es_checkno;?>" /><?php } else { ?><input type="text" name="es_checkno" value="<?php echo $es_checkno;?>" readonly="readonly" /><?php } ?></td>
																	</tr>
																	<tr>
																		<td align="left" class="admin">Teller Number </td>
																		<td align="center" class="admin">:</td>
																		<td align="left"><?php if($action!='edit') { ?><input type="text" name="es_teller_number" value="<?php echo $es_teller_number;?>" /><?php } else {?><input type="text" name="es_teller_number" value="<?php echo $es_teller_number;?>" readonly="readonly" /><?php } ?></td>
																	</tr>
																	<tr>
																		<td align="left" class="admin">Pin </td>
																		<td align="center" class="admin">:</td>
																		<td align="left"><?php if($action!='edit') { ?><input type="text" name="es_bank_pin" value="<?php echo $es_bank_pin;?>" /><?php } else {?><input type="text" name="es_bank_pin" value="<?php echo $es_bank_pin;?>" readonly="readonly" /><?php } ?></td>
																	</tr>
																</table>	
																</div></td>
                                   		    </tr>
											<?php if($eq_paymode!='cash'){?>
											<script>
											showAvatar();
											</script>
											<?php }?>
											</table></td>					
				  </tr>
				  <tr>
					<td align="left" class="narmal">&nbsp;</td>
					<td align="left" class="narmal">
					<?php if($action=="addmaintenance"){?>
					  <input name="addmaintenance" type="submit" class="bgcolor_02" value="Add Maintenance" />
					<?php }else{?>
					  <input name="updatemaintenance" type="submit" class="bgcolor_02" value="Update Maintenance" />
					<?php }?>					</td>
					<td align="left">&nbsp;</td>
					<td colspan="2" align="left">&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>		 
				  </table>
				</form>
</td>
<td width="1" class="bgcolor_02"></td>
</tr>
<tr>
<td height="1" colspan="3" class="bgcolor_02"></td>
</tr>
</table>
<?php }?>
<?php
if($action=="maintenancedetails"){
?>			
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="3" colspan="3"></td>
</tr>
<tr>
<td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Maintenance Details</strong></td>
</tr>
<tr>
<td width="1" class="bgcolor_02" ></td>
<td align="left" height="4" ></td>
<td width="1" class="bgcolor_02" ></td>
</tr>
<tr>
<td width="1" class="bgcolor_02"></td>
<td align="left" valign="top">
<p align="right">
<?php if (in_array("14_16", $admin_permissions)) {?>
<a href="?pid=85&action=addmaintenance" class="bgcolor_02" style="text-decoration:none; padding:2px;">Add Maintenance</a>
<?php }?></p>
				<table width="100%" border="0" cellpadding="1" cellspacing="1" bordercolor="#CCCCCC">
				  <tr  class="bgcolor_02">
					<td width="8%" height="23" align="center"><strong>S No</strong></td>
					<td width="10%" align="center"><strong><span class="narmal">Registration Number </span></strong></td>
					<td width="14%" align="center"><strong><span class="narmal">Maintenance Date </span></strong></td>  
					<td width="14%" align="center"><strong><span class="narmal">Amount</span></strong></td>    
					<td width="21%" align="center"><strong>Action</strong></td>
				  </tr>
				  <?php if(count($maintenance_row) > 0 ){ ?>
				  <?php						
					$rw = 1;
					$slno = $start+1;
					$total_amount =0;
					foreach ($maintenance_row as $maintenance)
						 {  
							if($rw%2==0)
								$rowclass = "even";
								else
								$rowclass = "odd";
					?>
				  <tr class="<?php echo $rowclass;?>">
					<td align="center"><?php echo $slno;?></td>
					<td align="center"><?php echo $trans_array[$maintenance['tr_transportid']]; ?></td>
					<td align="center"><?php if( $maintenance['tr_date_of_maintenance']!='0000-00-00'){echo func_date_conversion('Y-m-d', 'd/m/Y', $maintenance['tr_date_of_maintenance']);}?></td> 
					<td align="right"><?php 
					echo $_SESSION['eschools']['currency']."&nbsp;".number_format($maintenance['tr_amount_paid'], 2, '.', '');
					$total_amount +=$maintenance['tr_amount_paid'];
					 ?></td>   
					<td align="center">
					<a title="View" href="?pid=85&action=viewmaintenance&id=<?php echo $maintenance['es_transport_maintenanceid'];?>&start=<?php echo $start; ?>">
                    <?php echo viewIcon(); ?></a>&nbsp;&nbsp;<a title="Edit" href="?pid=85&action=edit&id=<?php echo $maintenance['es_transport_maintenanceid'];?>&start=<?php echo $start; ?>"><?php echo editIcon(); ?></a>&nbsp;&nbsp;<a title="Edit" href="?pid=85&action=delete&id=<?php echo $maintenance['es_transport_maintenanceid'];?>&start=<?php echo $start; ?>" onclick="return confirm('Are you sure want to delete?');"><?php echo deleteIcon(); ?></a>						
					</td>
				  </tr>
				  <?php           
				  $rw++;
				  $slno++;	   
				  } ?>
				  <tr><td colspan="3" align="right"><b>Total : </b></td><td align="right"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($total_amount, 2, '.', '');?></td><td></td></tr>
				  <tr>
					<td colspan="5" align="center"><?php paginateexte($start, $q_limit, $maintenance1_num, "action=".$action) ?>    </td>
				  </tr>
				  <tr>
					<td colspan="5" align="right"><?php if (in_array("14_107", $admin_permissions)) {?><input type="button" style="cursor:pointer;" value="Print Details" onclick="window.open('?pid=85&action=print_maintain_details&start=<?php echo $start; ?>',null,'width=700,height=500,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /><?php }?></td>
				  </tr>
				  <?php } 
											
							  else {
							   echo "<tr>";
							   echo "<td align='center' class='narmal' colspan='7'>No records found</td>";
							   echo "</tr>";
						} 
										
										
										
				  ?>
				</table>
</td>
<td width="1" class="bgcolor_02"></td>
</tr>
<tr>
<td height="1" colspan="3" class="bgcolor_02"></td>
</tr>
</table>
<?php }?>
<?php if($action=='print_maintain_details'){
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	       VALUES('".$_SESSION['eschools']['admin_id']."','es_trans_maintenance','Transport','Maintenance Details','','Print','".$_SERVER['REMOTE_ADDR']."',NOW())";
     $log_insert_exe=mysql_query($log_insert_sql);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="3" colspan="3"></td>
</tr>
<tr>
<td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Maintenance Details</strong></td>
</tr>

<tr>
<td width="1" class="bgcolor_02"></td>
<td align="left" valign="top">

				<table width="100%" border="0" cellpadding="1" cellspacing="1" bordercolor="#CCCCCC">
				  <tr  class="bgcolor_02">
					<td width="8%" height="23" align="center"><strong>S No</strong></td>
					<td width="10%" align="center"><strong><span class="narmal">Registration Number </span></strong></td>
					<td width="14%" align="center"><strong><span class="narmal">Maintenance Date </span></strong></td>  
					<td width="14%" align="center"><strong><span class="narmal">Amount</span></strong></td>    
					
				  </tr>
				  <?php if(count($maintenance_row) > 0 ){ ?>
				  <?php						
					$rw = 1;
					$slno = $start+1;
					$total_amount =0;
					foreach ($maintenance_row as $maintenance)
						 {  
							if($rw%2==0)
								$rowclass = "even";
								else
								$rowclass = "odd";
					?>
				  <tr class="<?php echo $rowclass;?>">
					<td align="center"><?php echo $slno;?></td>
					<td align="center"><?php echo $trans_array[$maintenance['tr_transportid']]; ?></td>
					<td align="center"><?php if( $maintenance['tr_date_of_maintenance']!='0000-00-00'){echo func_date_conversion('Y-m-d', 'd/m/Y', $maintenance['tr_date_of_maintenance']);}?></td> 
					<td align="right"><?php 
					echo $_SESSION['eschools']['currency']."&nbsp;".number_format($maintenance['tr_amount_paid'], 2, '.', '');
					$total_amount +=$maintenance['tr_amount_paid'];
					 ?></td>   
					</tr>
				  <?php           
				  $rw++;
				  $slno++;	   
				  } ?>
				  <tr><td colspan="3" align="right"><b>Total : </b></td><td align="right"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($total_amount, 2, '.', '');?></td></tr>
				  
				  <?php } 
											
							  else {
							   echo "<tr>";
							   echo "<td align='center' class='narmal' colspan='4'>No records found</td>";
							   echo "</tr>";
						} 
										
										
										
				  ?>
				</table>
</td>
<td width="1" class="bgcolor_02"></td>
</tr>
<tr>
<td height="1" colspan="3" class="bgcolor_02"></td>
</tr>
</table>
<?php }?>

<?php
if($action=="viewmaintenance" || $action=='print_viewmaintenance'){
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="3" colspan="3"></td>
</tr>
<tr>
<td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp; Maintenance Details</strong></td>
</tr>
<tr>
<td width="1" class="bgcolor_02" ></td>
<td align="left" height="4" ></td>
<td width="1" class="bgcolor_02" ></td>
</tr>
<tr>
<td width="1" class="bgcolor_02"></td>
<td align="left" valign="top">		
				<form action="" method="post" name="maintenance_add" >
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
                    <td width="24%" align="left" class="narmal">Registration Number </td>
					<td width="42%" align="left"  class="narmal"><?php echo $trans_array[$maintenance1_row['tr_transportid']]; ?></td>
					<td width="7%" align="left">&nbsp;</td>
					<td colspan="2" align="left">&nbsp;</td>
					<td width="1%">&nbsp;</td>
					<td width="2%">&nbsp;</td>
				  </tr>
				  <tr>
					<td align="left" class="narmal"> Maintenance Type </td>
					<td align="left"><span class="narmal"><?php echo $maintenance1_row['tr_maintenance_type']; ?></span></td>
					<td align="left"><span class="narmal"> </span></td>
					<td colspan="2" align="left">      </td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
                  <tr>
					<td align="left" class="narmal"> Maintenance Date </td>
					<td align="left"><span class="narmal"><?php if($maintenance1_row['tr_date_of_maintenance']!='0000-00-00'){echo func_date_conversion('Y-m-d', 'd/m/Y', $maintenance1_row['tr_date_of_maintenance']); }?></span></td>
					<td align="left"><span class="narmal"> </span></td>
					<td colspan="2" align="left">      </td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
                  <tr>
					<td align="left" class="narmal">Amount Paid </td>
					<td align="left"><span class="narmal"><?php 
					 echo $_SESSION['eschools']['currency']."&nbsp;".number_format($maintenance1_row['tr_amount_paid'], 2, '.', '');
					?></span></td>
					<td align="left"><span class="narmal"> </span></td>
					<td colspan="2" align="left">      </td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
                  <tr>
					<td align="left" class="narmal"> Remarks </td>
					<td align="left"><span class="narmal"><?php echo $maintenance1_row['tr_remarks']; ?></span></td>
					<td align="left"><span class="narmal"> </span></td>
					<td colspan="2" align="left">      </td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr> 
				  <?php if($action!='print_viewmaintenance'){?>                 
				  <tr>
					<td align="left" class="narmal">&nbsp;</td>
					<td align="left" class="narmal"><a href="?pid=85&action=maintenancedetails&start=<?php echo $start; ?>" class="bgcolor_02">Back</a>&nbsp;&nbsp;&nbsp;<input type="button" style="cursor:pointer;" value="Print Details" onclick="window.open('?pid=85&action=print_viewmaintenance&id=<?php echo $id; ?>',null,'width=700,height=500,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /></td>
					<td align="left">&nbsp;</td>
					<td colspan="2" align="left">&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>	
				  <?php }?>	 
				  </table>
				</form>
</td>
<td width="1" class="bgcolor_02"></td>
</tr>
<tr>
<td height="1" colspan="3" class="bgcolor_02"></td>
</tr>
</table>
<?php }?>
