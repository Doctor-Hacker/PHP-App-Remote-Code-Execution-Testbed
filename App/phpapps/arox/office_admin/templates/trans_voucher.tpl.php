<?php
/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
?>
<script type="text/javascript" language="javascript1.5">
	var gblvar = 1;
	function AddRow1() //This function will add extra row to provide another file
	 {
	  var prevrow = document.getElementById("addgrolis");
	  var newrowiddd = parseInt(prevrow.rows.length) + 2;
	  var tmpvar = gblvar;
	  var newrow = prevrow.insertRow(prevrow.rows.length);
	  newrow.id = newrow.uniqueID; // give row its own ID
	  
	  var newcell; // an inserted row has no cells, so insert the cells
	  newcell = newrow.insertCell(0);
	  newcell.id = newcell.uniqueID;
	  newcell.innerHTML = "<table width='100%' border='0' cellpadding='0' cellspacing='0'><tr height='25'><td align='center' width='25%' class='narmal'>"+newrowiddd+"</td><td align='center' width='25%' class='narmal'><select name='es_particulars[]' ><?php $ledgerlistarr =ledger_finance();
	  foreach($ledgerlistarr as $eachledger) 
					{ ?><option value='<?php echo $eachledger['lg_name']; ?>'><?php echo $eachledger['lg_name']; ?></option><?php } ?>  </select></td><td align='center' width='25%' class='narmal'><input name='es_amount[]' type='text' size='15' /></td><td align='center' width='25%' class='narmal'><a href='javascript:AddRow1()' title='Add'><img src='images/add_16.png' border='0' /></a><a href='javascript:DelRow1()' title='Delete'><img src='images/b_drop.png' border='0' /></a></td></tr></table>";
	  
	  gblvar = tmpvar + 1;
	}

	function DelRow1() //This function will delete the last row
	{
		if(gblvar == 1)
			return;
		var prevrow = document.getElementById("addgrolis");
		prevrow.deleteRow(prevrow.rows.length-1);
		gblvar = gblvar - 1;
	}

function showAvatar()
{
var ch=document.createvocture.es_paymentmode.value;
      if(ch=='cash'){
       document.getElementById("patiddivdisp").style.display="none";
	   }
       else{
       document.getElementById("patiddivdisp").style.display="inline";
       } 
}
</script>	
<?php if ($action == 'voucher_entry') { ?>
<form action="" method="post" name="createvocture">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
	 </tr>
	<tr><td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Voucher Entry</span></td></tr>
	<tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
                </tr>
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td  align="left" valign="top">
			<table width="100%" border="0" cellspacing="0" cellpadding="4" class="">
			   <tr><td align="right" colspan="3"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font></td></tr>
				<tr>
					<td width="381"  align="left" class="narmal" >Voucher Type </td>
					<td width="9" align="center">:</td>
					<td width="796"  align="left" class="narmal">
						<select name="vocturetypesel" >
							<?php 
								$voucherlistarr = voucher_finance();
								foreach($voucherlistarr as $eachvoucher) {
							?>
							<option value="<?php echo $eachvoucher['es_voucherid']; ?>"><?php echo $eachvoucher['voucher_type']; ?> ( <?php echo $eachvoucher['voucher_mode']; ?> )</option>   
					<?php } ?>					   
						</select>
				  </td>				
				</tr>
				<?php 
				$sel_rec="select es_receiptno from es_voucherentry where es_receiptno like '".$recno."%' order by  es_receiptno DESC";
				
				$latest_rec=$db->getRows($sel_rec);
				
				if(count($latest_rec)>0){
		// to ge latest recept
		$recp=$latest_rec[0]['es_receiptno'];
		 $recptn=explode("_",$recp);
		 //$es_receiptno=$recptn[1]+1;
				}else{
				$va=1;
			//$es_receiptno=1;
				}
				?>
				<tr>
					<td align="left" class="narmal" >Voucher No</td>
					<td>:</td>
					<td align="left">
					<?php
					$es_receiptno=$db->getOne("SELECT MAX(es_voucherentryid) as id FROM `es_voucherentry` ORDER BY `es_voucherentryid` DESC LIMIT 0,1");
					?>
					<input type="text" name="es_receiptno" value="<?php echo $es_receiptno+1;?>" readonly />
					<font color="#FF0000"><b>*</b></font></td>				
				</tr>
				<tr>
					<td align="left" class="narmal">Voucher Date</td>
					<td>:</td>
					<td align="left"><input name="voucher_date"  id="voucher_date" readonly class="plain" size="20"  value="<?php echo $voucher_date;?>"/>
                      <a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.createvocture.voucher_date);return false;" ><img name="popcal" align="absmiddle" src="<?php echo JS_PATH ?>/WeekPicker/calbtn.gif" width="34" height="22" border="0" alt="" /></a>
                           <iframe width=199 height=178 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="<?php echo JS_PATH ?>/WeekPicker/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe>
					<font color="#FF0000"><b>*</b></font></td>				
				</tr>
				<tr>
					<td align="left" class="narmal">Payment mode </span></td>
					<td>:</td>
					<td align="left" class="narmal">
					  <select name="es_paymentmode" onchange="javascript:showAvatar();">                        
                        <option value="cash" <?php if($es_paymentmode=="cash") echo 'selected';?> >Cash</option>
                        <option value="cheque" <?php if($es_paymentmode=="cheque") echo 'selected';?>>Cheque</option>
                        <option value="dd" <?php if($es_paymentmode=="dd") echo 'selected';?>>DD</option>              
                      </select>
					</td>				
				</tr>
				<tr>
				    <td align="left" class="narmal">Narration</td>
				    <td>:</td>
				    <td align="left"><textarea name="es_narration" rows="3"></textarea></td>
				</tr>
			</table>
			<br>
			<table width="100%" border="0" cellspacing="0" cellpadding="4"  id="patiddivdisp" style="<?php if(isset($es_paymentmode)&&$es_paymentmode!="cash"){ echo 'display:block;';}else{echo 'display:none;';}?>" class="" >
				<tr>
					<td align="left" class="bgcolor_02" colspan="3">Bank Details </td>
				</tr>
				<tr>
					<td width="332" align="left" valign="middle" class="narmal" >Bank Name </td>
					<td align="left" valign="middle">:</td>
				  <td width="721" align="left" valign="middle"><input type="text" name="es_bank_name" value="<?php echo $es_bank_name;?>" /></td>
				</tr>
				<tr>
					<td align="left" valign="middle"  class="narmal"> Account Number</td>
					<td width="14" align="left" valign="middle">:</td>
				  <td align="left" valign="middle" ><input type="text" name="es_bankacc" value="<?php echo $es_bankacc;?>" /></td>
				</tr>
				<tr>
					<td align="left" valign="middle" class="narmal">Cheque / DD Number </td>
					<td align="left" valign="middle">:</td>
					<td align="left" valign="middle"><input type="text" name="es_checkno" value="<?php echo $es_checkno;?>" /></td>
					
				</tr>
				<tr>
					<td align="left" valign="middle" class="narmal">Teller Number </td>
					<td align="left" valign="middle">:</td>
					<td align="left" valign="middle"><input type="text" name="es_teller_number" value="<?php echo $es_teller_number;?>" /></td>
					
				</tr>
				<tr>
					<td align="left" valign="middle" class="narmal">Pin </td>
					<td align="left" valign="middle">:</td>
					<td align="left" valign="middle"><input type="text" name="es_bank_pin" value="<?php echo $es_bank_pin;?>" /></td>
				</tr>
		  </table>
			<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
				<tr>
					<td width="25%">&nbsp;</td>
					<td width="25%">&nbsp;</td>
					<td width="25%">&nbsp;</td>
					<td width="25%">&nbsp;</td>										
				</tr>
				<tr class="bgcolor_02" height="25">
					<td class="admin" align="center" width="19%">S.no</td>
					<td class="admin" align="center">Particulars </td>
					<td class="admin" align="center">Amount</td>					
					<td class="admin" align="center">Action</td>									
				</tr>				  
				<tr>
					<td align="center" class="narmal">1</td>
					<td align="center" class="narmal"><select name="es_particulars[]" >
                      <?php $ledgerlistarr =ledger_finance();
					foreach($ledgerlistarr as $eachledger) 
					{ ?>
                      <option value="<?php echo $eachledger['lg_name']; ?>" <?php if($es_particulars==$eachledger['lg_name']) { echo"selected='selected'"; } ?>><?php echo $eachledger['lg_name']; ?></option>
				  
                      <?php } ?>
                    </select></td>
					<td align="center" class="narmal"><input name="es_amount[]" type="text" size="15" /><font color="#FF0000"><b>*</b></font></td>
						<td align="center" class="narmal"><a href="javascript:AddRow1()" title="Add"><img src="images/add_16.png" border="0" /></a><a href="javascript:DelRow1()" title="Delete"><img src="images/b_drop.png" border="0" /></a></td>					
				</tr>
			<?php /*?>	<?php
				
				for($i=0;$i<count(es_amount);$i++)
				{?>
				<script>
				AddRow1();
				alert('hi');
				</script>
				<?php
				}
				?>	<?php */?>			  
				<tr>
					<td colspan="4">
						<table width="100%" border="0" cellspacing="0" cellpadding="0" id="addgrolis"></table>	
					</td>									
			  </tr>
				  <tr>
				     <td colspan="4" height="25">&nbsp;</td>
				    
			      </tr>
				  <tr>
					<td></td>					
					<td align="rigth" >
					<?php if(in_array('12_7',$admin_permissions)){?>

<input type="submit" name="Submit" value="Submit" class="bgcolor_02" />
					

<?php }?>
					</td>
					<td align="left"><input type="reset" name="reset" value="reset" class="bgcolor_02" /></td>
					<td></td>										
				  </tr>
				  <tr>
				    <td></td>
				    <td></td>
				    <td colspan="2">&nbsp;</td>				   
			      </tr>
		  </table>
	  </td>
                <td width="1" class="bgcolor_02"></td>
    </tr>              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
                </tr>
            </table>
	</form>
<?php } ?>
<?php if ($action == 'voucher_edit') { ?>
<form action="" method="post" name="createvocture">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
	 </tr>
	<tr><td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Voucher Entry</span></td></tr>
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td  align="left" valign="top">
			<table width="100%" border="0" cellspacing="0" cellpadding="4" class="">
			   <tr><td align="right" colspan="3"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font></td></tr>
				<tr>
					<td  align="left" class="narmal" >Voucher Type </td>
					<td width="5" align="center">:</td>
					<td  align="left" class="narmal">
						<select name="vocturetypesel" >
							<?php 
								$voucherlistarr = voucher_finance();
							
								foreach($voucherlistarr as $eachvoucher) {
							?>
							<option value="<?php echo $eachvoucher['voucher_type']."_".$eachvoucher['voucher_mode']; ?>" <?php if(trim($vocturetypesel)==trim($eachvoucher['voucher_type'])){echo "selected";}?>><?php echo $eachvoucher['voucher_type']; ?> ( <?php echo $eachvoucher['voucher_mode']; ?> )</option>   
					<?php } ?>					   
						</select>
					</td>				
				</tr>
				<?php 
				if(!$_POST){
		$recp=$es_receiptno;
		 $recptn=explode("_",$recp);
		 $es_receiptno_new=$recptn[1];
		 }
				
				?>
				<tr>
					<td align="left" class="narmal" >Voucher No</td>
					<td>:</td>
					<td align="left"><input type="text" name="es_receiptno_new" value="<?php echo $es_receiptno_new;?>" readonly />
					<font color="#FF0000"><b>*</b></font></td>				
				</tr>
				<tr>
					<td align="left" class="narmal">Voucher Date</td>
					<td>:</td>
					<td align="left"><input name="voucher_date"  id="voucher_date" readonly class="plain" size="20" value="<?php echo $voucher_date;?>"/>
                      <a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.createvocture.voucher_date);return false;" ><img name="popcal" align="absmiddle" src="<?php echo JS_PATH ?>/WeekPicker/calbtn.gif" width="34" height="22" border="0" alt="" /></a>
                           <iframe width=199 height=178 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="<?php echo JS_PATH ?>/WeekPicker/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe>
					<font color="#FF0000"><b>*</b></font></td>				
				</tr>
				<tr>
					<td align="left" class="narmal">Payment mode </span></td>
					<td>:</td>
					<td align="left" class="narmal">
					  <select name="es_paymentmode" onchange="javascript:showAvatar();">                        
                        <option value="cash" <?php if($es_paymentmode=="cash") echo 'selected';?> >Cash</option>
                        <option value="cheque" <?php if($es_paymentmode=="cheque") echo 'selected';?>>Cheque</option>
                        <option value="dd" <?php if($es_paymentmode=="dd") echo 'selected';?>>DD</option>              
                      </select>
					</td>				
				</tr>
				<tr>
				    <td align="left" class="narmal">Narration</td>
				    <td>:</td>
				    <td align="left"><textarea name="es_narration" rows="3"><?php echo $es_narration; ?></textarea></td>
				</tr>
			</table>
			<br>
			<table width="100%" border="0" cellspacing="0" cellpadding="4"  id="patiddivdisp" style="<?php if(isset($es_paymentmode)&&$es_paymentmode!="cash"){ echo 'display:block;';}else{echo 'display:none;';}?>" class="" >
				<tr>
					<td align="left" class="bgcolor_02" colspan="3">Bank Details </td>
				</tr>
				<tr>
					<td width="332" align="left" valign="middle" class="narmal" >Bank Name </td>
					<td align="left" valign="middle">:</td>
				  <td width="721" align="left" valign="middle"><input type="text" name="es_bank_name" value="<?php echo $es_bank_name;?>" /></td>
				</tr>
				<tr>
					<td align="left" valign="middle"  class="narmal"> Account Number</td>
					<td width="14" align="left" valign="middle">:</td>
				  <td align="left" valign="middle" ><input type="text" name="es_bankacc" value="<?php echo $es_bankacc;?>" /></td>
				</tr>
				<tr>
					<td align="left" valign="middle" class="narmal">Cheque / DD Number </td>
					<td align="left" valign="middle">:</td>
					<td align="left" valign="middle"><input type="text" name="es_checkno" value="<?php echo $es_checkno;?>" /></td>
					
				</tr>
				<tr>
					<td align="left" valign="middle" class="narmal">Teller Number </td>
					<td align="left" valign="middle">:</td>
					<td align="left" valign="middle"><input type="text" name="es_teller_number" value="<?php echo $es_teller_number;?>" /></td>
					
				</tr>
				<tr>
					<td align="left" valign="middle" class="narmal">Pin </td>
					<td align="left" valign="middle">:</td>
					<td align="left" valign="middle"><input type="text" name="es_bank_pin" value="<?php echo $es_bank_pin;?>" /></td>
				</tr>
		  </table>
			<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
				<tr>
					<td width="22%">&nbsp;</td>
					<td width="26%">&nbsp;</td>
					<td width="32%">&nbsp;</td>
					<td width="20%">&nbsp;</td>										
				</tr>
				<tr class="bgcolor_02" height="25">
					<td class="admin" align="center" width="22%">&nbsp;</td>
					<td class="admin" align="center">Particulars </td>
					<td class="admin" align="center">Amount</td>					
					<td class="admin" align="center">&nbsp;</td>									
				</tr>		
				<?php $ledgerlistarr =ledger_finance();
				
				foreach($ledgerlistarr as $eachledger) 
					{
					$led[$eachledger['lg_name']]=$eachledger['lg_name'];
					}
				?>		  
				<tr>
					<td align="center" class="narmal">&nbsp;</td>
					<td align="center" class="narmal"><?php echo $html_obj->draw_selectfield('es_particulars',$led,$es_particulars,'')?></td>
					<td align="center" class="narmal"><input name="es_amount" type="text" size="15" value="<?php echo $es_amount;?>"/><font color="#FF0000"><b>*</b></font></td>
						<td align="center" class="narmal"></td>					
				</tr>				  
				
				  <tr>
				     <td colspan="4" height="25">&nbsp;</td>
			      </tr>
				  <tr>
					<td colspan="4" align="center" valign="middle"><input type="submit" name="Update" value="Update" class="bgcolor_02" /></td>					
				  </tr>
				  <tr>
				     <td colspan="4" height="25">&nbsp;</td>
			      </tr>
				  <tr>
				    <td></td>
				    <td></td>
				    <td colspan="2">&nbsp;</td>				   
			      </tr>
		  </table>
	  </td>
                <td width="1" class="bgcolor_02"></td>
    </tr>              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
                </tr>
            </table>
	</form>
	<?php } ?>
	
	<?php 

	if ($action == 'vouchers_list') { 
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
	 </tr>
	 
	<tr>
	  <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Voucher List</span></td>
	</tr>
	  <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
                </tr>
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="left" valign="top"><br>
			<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
				
				<tr>
					
					<td align="right" colspan="7" style="padding:4px;"></td>
					<td width="13%" align="left"><a href="?pid=24&action=voucher_entry" style="text-decoration:none; padding:3px;" class="bgcolor_02">Add New</a></td>	
															
				</tr>
				<tr>
					
					<td align="right" colspan="9" >
					<form action="?pid=24&action=vouchers_list" name="fee_search" method="post">
				<table width="100%" border="0">
				  
				  
				  <tr>
					<td>
					<table width="100%" border="0">
					  <tr>
						<td>Fine Received From</td>
						<td>:</td>
						<td><?php echo $html_obj->draw_inputfield('dc1','','','readonly="readonly" size="10"');?><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fStartPop(document.fee_search.dc1,document.fee_search.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a></td>
						<td>To</td>
						<td>:</td>
						<td><?php echo $html_obj->draw_inputfield('dc2','','','readonly="readonly" size="10"');?><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fEndPop(document.fee_search.dc1,document.fee_search.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a></td>
					 <td>Acc.No</td>
						<td>:</td>
						<td><?php echo $html_obj->draw_inputfield('es_bankacc','','','');?></td>
					  
					  </tr>
					  <iframe width=132 height=142 name="gToday:contrast:agenda.js" id="gToday:contrast:agenda.js" src="<?php echo JS_PATH ?>/DateRange/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
	</iframe>
					  <tr>
						<td>Voucher Type</td>
						<td>:</td>
						<td><?php echo $html_obj->draw_selectfield('es_voucherid',$voucher_type_arr,'','');?></td>
						<td>Cheque No</td>
						<td>:</td>
						<td><?php echo $html_obj->draw_inputfield('es_checkno','','','');?>
						
						</td>
					  <td></td><td></td>
					  </tr>
					</table>

					</td>
				  </tr>
				  <tr>
					<td align="center"><input type="submit" name="search_voucher" value="Search" class="bgcolor_02" style="cursor:pointer" /></td>
				  </tr>
				  <tr>
					<td align="center" height="25"></td>
				  </tr>
				</table>
                </form>
				  </td>
					
															
				</tr>
				<tr>
					<td height="10" colspan="7" align="center" valign="middle"></td>
					<td width="13%"></td>										
				</tr>
				<tr class="bgcolor_02" height="25">
					<td width="9%" align="center" valign="middle" class="admin">S.No</td>
					<td width="12%" align="left" valign="middle" class="admin">Voucher Type </td>
					<td width="13%" align="center" valign="middle" class="admin">Voucher </td>	
					<td width="13%" align="left" valign="middle" class="admin">Amt </td>
					<td width="11%" align="center" valign="middle" class="admin">Date</td>	
					<td width="11%" align="center" valign="middle" class="admin">P Mode</td>
					<td width="18%" align="left" valign="middle" class="admin">Bank Details</td>					
					<td width="13%"  align="center" valign="middle" class="admin">Action</td>									
				</tr>	
				<?php 
				
				
				$rownum=$start+1;
				if($no_rows>0){foreach($res_details as $eachrow){
				?>
				<tr>
					<td height="50" align="center" valign="middle" class="narmal"><?php echo $rownum;?></td>
					<td align="left" valign="middle" class="narmal"><?php echo $eachrow['es_vouchertype'];?><br/>Particulars - <?php echo $eachrow['es_particulars'];?></td>
						<td align="center" valign="middle" class="narmal"><?php echo $eachrow['es_voucherentryid']?></td>
					<td align="left" valign="middle" class="narmal"><?php echo $_SESSION['eschools']['currency'].'&nbsp;'.number_format($eachrow['es_amount'], 2, '.', '');?></td>
					<td align="center" valign="middle" class="narmal"><?php echo func_date_conversion("Y-m-d","d/m/Y",$eachrow['es_receiptdate']);?></td>
					<td align="center" valign="middle" class="narmal"><?php echo $eachrow['es_paymentmode'];?></td>
					<td align="left" valign="middle" class="narmal">Acct - <?php echo $eachrow['es_bankacc'];?><br />
				  Chq - <?php echo $eachrow['es_checkno'];?><br />
			      Bank - <?php echo ucfirst($eachrow['es_bank_name']);?></td>
					<td align="center" valign="middle" class="narmal">
					
					<?php if(in_array('12_8',$admin_permissions)){?>
<a href="?pid=24&action=voucher_edit&es_voucherentryid=<?php echo $eachrow['es_voucherentryid']; ?>&start=<?php echo $start;?>" ><img src="images/b_edit.png" border="0" title="Edit" alt="Edit"  /></a>&nbsp;&nbsp;
					


<?php }?>
					
			<?php if(in_array('12_12',$admin_permissions)){?>

<a href="?pid=24&action=delete&es_voucherentryid=<?php echo $eachrow['es_voucherentryid']; ?>&start=<?php echo $start;?>" onClick="return confirm('Are you sure you want to  delete ?')"><img src="images/b_drop.png" border="0" title="Delete" alt="Delete"  /></a>
					

<?php }?>					</td>					
				</tr>	
				<?php $rownum++;}?>			  
				<tr>
					<td colspan="9"><?php  paginateexte($start, $q_limit, $no_rows, "action=vouchers_list&column_name=".$orderby.$PageUrl) ?>
					</td>									
			  </tr>
			  <tr>
					<td colspan="9" align="right"><input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=24&action=print_vouchers_list<?php echo $PageUrl; ?>&start=<?php echo $start; ?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  />
					</td>									
			  </tr>
			  <?php } else{?>
				  <tr>
				     <td height="25" colspan="9" align="center" valign="middle">No Records Found</td>
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

	<?php }
	
	if ($action == 'print_vouchers_list') { 
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
	 </tr>
	 
	<tr>
	  <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Voucher List</span></td>
	</tr>
	  <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
                </tr>
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="left" valign="top"><br>
			<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
				
				<tr>
					
					<td align="right" colspan="7" style="padding:4px;"></td>
					<td width="0%" align="left"><!--<a href="?pid=24&action=voucher_entry" style="text-decoration:none; padding:3px;" class="bgcolor_02">Add New</a>--></td>	
															
				</tr>
			
				<tr>
					<td height="10" colspan="7" align="center" valign="middle"></td>
					<td width="0%"></td>										
				</tr>
				<tr class="bgcolor_02" height="25">
					<td width="10%" align="center" valign="middle" class="admin">S.No</td>
					<td width="24%" align="left" valign="middle" class="admin">Voucher Type </td>
					<td width="8%" align="center" class="admin">Voucher</td>	
					<td width="13%" align="center" class="admin">Amt </td>
					<td width="11%" align="center" class="admin"> Date</td>	
					<td width="12%" align="center" class="admin">P Mode</td>
					<td width="22%" align="center" class="admin">Bank Details</td>					
								
				</tr>	
				<?php 
				
				
				$rownum=$start+1;
				if($no_rows>0){
				foreach($res_details as $eachrow){
				
				?>
				<tr>
					<td  height="50"align="center" valign="middle" class="narmal"><?php echo $rownum;?></td>
					<td align="left" valign="middle" class="narmal"><?php echo $eachrow['es_vouchertype'];?><br/>
				  Particulars - <?php echo $eachrow['es_particulars'];?></td>
									<td align="center" class="narmal"><?php echo $eachrow['es_voucherentryid']?></td>
					<td align="center" class="narmal"><?php echo $_SESSION['eschools']['currency'].'&nbsp;'.number_format($eachrow['es_amount'], 2, '.', '');?></td>
					<td align="center" class="narmal"><?php echo func_date_conversion("Y-m-d","d/m/Y",$eachrow['es_receiptdate']);?></td>
					<td align="center" class="narmal"><?php echo $eachrow['es_paymentmode'];?></td>
					<td align="left" class="narmal">Acct - <?php echo $eachrow['es_bankacc'];?><br />
				  Chq - <?php echo $eachrow['es_checkno'];?><br />
			      Bank - <?php echo $eachrow['es_bank_name'];?></td>
										
				</tr>	
				<?php $rownum++;}?>			  
				
			  <?php } ?>
		  </table>
	  </td>
                <td width="1" class="bgcolor_02"></td>
    </tr>              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
                </tr>
            </table>

	<?php } ?>
	 