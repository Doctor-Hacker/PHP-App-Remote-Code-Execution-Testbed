<?php
// Only Admin users can view the pages
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) 
{
	header('location: ./?pid=1&unauth=0');
	exit;
}
?>
<script src="../jquery-1.8.2.js" type="text/javascript"></script>
<script type="text/javascript" language="javascript1.5">
		var gblvar = 1;
		
		//This function will add extra row to provide another file
		function AddRow()
		{
				var prevrow = document.getElementById("uplimg");
				var newrowiddd = parseInt(prevrow.rows.length) + 2;
				var tmpvar = gblvar;
				var newrow = prevrow.insertRow(prevrow.rows.length);
				newrow.id = newrow.uniqueID; // give row its own ID
				var newcell; // an inserted row has no cells, so insert the cells
				newcell = newrow.insertCell(0);
				newcell.id = newcell.uniqueID;
				newcell.innerHTML = "<table width='100%' border='0' cellpadding='0' cellspacing='0'><tr height='25'><td  align='center' width='6%' >&nbsp;"+ newrowiddd +"</td><td  align='center' width='13%'><input name='particulars[]' type='text' size='15' /></td><td align='center' width='27%' ><input type='text' name='amount[]' size='10' /></td><td  align='center' width='13.5%'><a href='javascript:AddRow()' title='Add'><img src='images/add_16.png' border='0' /></a>&nbsp;<a title='Delete' href='javascript:DelRow()'><img src='images/b_drop.png' border='0' /></a></td></tr></table>";
				  
				gblvar = tmpvar + 1;
		}
		
		//This function will delete the last row
		function DelRow()
		{
				if(gblvar == 1)
					return;
				var prevrow = document.getElementById("uplimg");
				prevrow.deleteRow(prevrow.rows.length-1);
				gblvar = gblvar - 1;
		}
		
		function del_feestruc(adminid)
		{
				if(confirm("Are you sure you want to  delete ?"))
					document.location.href = '?pid=17&action=deletefeeitem&fid='+adminid;
		}
</script>

<?php if($action == 'createfeetypes')
{
?>	<form action="" name="fee_master" method="post" >
			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:5px;">
					<tr>
						<td height="25" colspan="3" class="bgcolor_02" style="padding-left:5px;">Add Fees</td>
					</tr>
					
					<tr>
							<td width="1" class="bgcolor_02"></td>
							<td  align="center" valign="top">
									<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
											<tr>
												<td width="9%" height="23" align="left" valign="middle" class="narmal">&nbsp;Group</td>
												<td width="30%" align="left" valign="middle" class="narmal">
													<select name="groups" style="width:130px;" onchange="JavaScript:document.fee_master.submit();">
														<option value="all" >All</option>
														<?php if (count($c_groups)>0)
																	{
																		foreach($c_groups as $eachgroup)
																		{ ?>
																			<option value="<?php echo $eachgroup['es_groupsid']; ?>"  <?php echo ($eachgroup['es_groupsid']==$groups)?"selected":""?> ><?php echo $eachgroup['es_groupname']; ?></option>
														<?php		}
																	}
														?>
													</select>
												</td>
												<td width="7%" height="23" align="left" valign="middle" class="narmal">&nbsp;Class</td>
												<td width="54%" align="left" valign="middle" class="narmal">
												<select name="selectclass" style="width:130px;">
													<option value="all" >All</option>
													<?php		if (count($class_data)>0)
																	{
																		foreach($class_data as $eachclass)
																		{
													?>						<option value="<?php echo $eachclass['es_classesid']; ?>"   <?php echo ($eachclass['es_classesid']==$selectclass)?"selected":""?> ><?php echo $eachclass['es_classname']; ?></option>
													<?php			}
																	}
													?>
												</select></td>
											</tr>
											
											<tr>
												<td height="23" align="left" valign="middle" class="narmal">&nbsp;Financial&nbsp;Year</td>
												<td height="23" colspan="3" align="left" valign="middle" class="narmal">
													<select name="pre_year">
														<?php	foreach($school_details_res as $each_record)
																	{
														?>				<option value="<?php echo $each_record['es_finance_masterid']; ?>" <?php if ($each_record['es_finance_masterid']==$pre_year) { echo "selected"; }?>><?php echo displaydate($each_record['fi_startdate'])." To ".displaydate($each_record['fi_enddate']); ?></option>
														<?php } ?>
													</select></td>
											</tr>
											
											<tr>
												<td height="23" colspan="4" align="center" valign="middle" class="narmal">
														<table width="100%" border="0" cellpadding="0" cellspacing="0">
																<!--<tr height="25" >
																		<td  align="center"></td>
																		<td  class="narmal" align="right"></td>
																		<td colspan="5" align="left"  class="narmal">
																				<ul><strong><u>NOTE:</u></strong>
																					<li>Please enter Tuition if your institute collectes Monthly   Fee as<strong>Tuition</strong>.</li>
																					<li><strong>Monthly :</strong> Total Amount will be divided by 12 and will be collected monthly</li>
																					<li><strong>Yearly :</strong> Will be collected only once in the year, anytime in the year</li>
																				</ul></td>
																</tr>-->
																
																
																
																<tr height="25" class="bgcolor_02">
																		<td width="7%"  align="center" class="admin">S.No</td>					   
																		<td width="18%"  align="center" class="admin">Particulars</td>
																		<td width="33%"  align="center" class="admin">Amount</td>
																		<!--<td width="26%"  align="center" class="admin">Fee Type</td>-->
																		<td width="16%"  align="center" class="admin">Action&nbsp;</td>
																</tr>
																
																<tr height="25">
																		<td align="center" >1</td>
																		<td align="center" ><input name="particulars[]" type="text" size="15" /></td>
																		<td align="center" ><input type="text" name="amount[]" id="fee" onkeyup="evaluateRemaining(this.value);" size="10" /></td>
																		<!--<td align="center" ><select name="instalments[]" />
																												<option value="10">Monthly</option>
																												<option value="1">Yearly</option>
																											</select></td>-->
																		<td align="center" >
																			<?php if(in_array('2_15',$admin_permissions))
																						{
																			?>			<a href="javascript:AddRow()" title="Add"><img src="images/add_16.png" border="0" /></a>
																			<?php }
																			?>
																		
																			<?php if(in_array('2_20',$admin_permissions))
																						{
																			?>			<a href="javascript:DelRow()" title="Delete"><img src="images/b_drop.png" border="0" /></a>
																			<?php }
																			?>
																		</td>
																</tr>
                                                                
                                                                 
																<tr><!-- Additional fields on '+' button click will be part of this section -->
																	<td colspan="5" align="center">
																			<table id="uplimg" width="100%" border="0" cellspacing="0" cellpadding="0"></table>
																	</td>
																</tr>
														</table>
												</td>
											</tr>
											
											<tr>
													<td width="9%" height="23" align="right">&nbsp;</td>
													<td align="right">&nbsp;</td>
													<td colspan="2">
													<?php if(in_array('2_15',$admin_permissions))
																{
													?>				<input name="Submit" type="submit" class="bgcolor_02" value="Save" style="cursor:pointer;"/>
																		<input name="back" type="reset" class="bgcolor_02" value="Reset" style="cursor:pointer;"/>
													<?php }
													?>
													 &nbsp;&nbsp;</td>
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

<iframe width=188 height=166 name="gToday:datetime:agenda.js:gfPop:plugins_time.js" id="gToday:datetime:agenda.js:gfPop:plugins_time.js" src="<?php echo JS_PATH ?>/DateTime/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe>

<script>

	function evaluateRemaining()
	{
		var total_fees = document.getElementById('total_fee').value;
		var till_now = document.getElementById('fee').value;
		document.getElementById('remaining_fees').value = total_fees-till_now;
	}

</script>

<?php 
} // End of $action == 'createfeetypes'



// views fees			  
if($action == 'viewfees' )
{?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr><td height="3" colspan="3"></td></tr>
    <tr><td height="25" colspan="3" class="bgcolor_02" style="padding: 0px 0px 0px 8px;">Fee Details</td></tr>
	<tr><td colspan="3"></td></tr> 
    <tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="center" valign="top">
			<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
				<!------------------------------------------------- Selection of financial year ------------------------------------------------->
				<form action="" method="post">
                <tr>
                	<td>
                    	<table align="center">
							<tr>
								<td align="center" class="adminfont" colspan="2">Financial&nbsp;Year</td>
								<td align="center" class="narmal" colspan="3">
                                    <select name="pre_year">
                                        <?php	foreach($school_details_res as $each_record)
                                                { ?>
                                                    <option value="<?php echo $each_record['es_finance_masterid']; ?>" <?php  if ($each_record['es_finance_masterid']==$pre_year) { echo "selected"; }?>><?php echo displaydate($each_record['fi_startdate'])." to ".displaydate($each_record['fi_enddate']); ?>						                        </option>
                                        <?php	} ?>
                                    </select>					
                    			</td>
								<td align="center" class="adminfont" colspan="2">
                                	<input type="submit" name="leave_school_year" class="bgcolor_02" value="Submit" style="cursor:pointer;"/>
								</td>
							</tr>
						</table>
					</td>				
				</tr>
                </form>
				<!------------------------------------------------- End of selection of financial year ------------------------------------------------->
				
				<tr>
					<td align="center">
					<?php
                        $all_classlist = getallClasses();
                        if (count($all_classlist) > 0)
						{
                        	foreach($all_classlist as $eachclass)
							{
                        		$es_classID = $eachclass['es_classesid'];
                    ?>
                                <fieldset>
                                <legend class="adminfont">Fee Details For Class : <?php echo $eachclass['es_classname']; ?></legend>
                                <table width="95%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td width="0" class="bgcolor_02"></td>
                                        <td>
                                            <table width="100%" border="0" cellspacing="1" cellpadding="0">
                                                <tr class="bgcolor_02" height="20">
                                                    <td width="25%" class="admin" style="padding-left: 3px;">Particulars</td>
                                                    <td width="24%" class="admin" align="center">Amount</td>
                                                    <!--<td width="25%" class="admin" align="center">Fee Type</td>-->
                                                    <?php 
															if($from_finance == $_SESSION['eschools']['from_finance'])
															{?>
																<td width="26%" class="admin" align="center">Action</td>
													<?php	}?>
                                                </tr>
												<?php 
														$obj_feesmaster   = new es_feemaster();
														$es_feemasterList = $obj_feesmaster->GetList(array(array("fee_class", "=", "$es_classID"),
																											array("fee_fromdate","=", "$from_finance "),
																											array("fee_todate","=", "$to_finance")), "es_feemasterid", false);

														if (count($es_feemasterList)>0)
														{
                                                        	foreach ($es_feemasterList as $eachrecord)
															{?>
																<tr class="narmal">
                                                                    <td align="left">&nbsp;<?php echo ucwords(strtolower($eachrecord->fee_particular)); ?></td>
                                                                    <td align="center"><?php echo $_SESSION['eschools']['currency'].'. '.number_format($eachrecord->fee_amount, 2, '.', ''); ?></td>
                                                                    <!--<td align="center"><?php //if($eachrecord->fee_instalments==10){echo "Monthly";}else{echo "Yearly";} ?></td>-->
                                                                    <?php 
																			$day = (strtotime($today) - strtotime($comingdate)) / (60 * 60 * 24);
																			if($eachrecord->fee_fromdate  == $_SESSION['eschools']['from_finance'])
																			{?>
                                                                    			<td align="center">
                                                            		<?php		if(in_array('6_1',$admin_permissions))
																				{?>
																					<a href="<?php echo buildurl(array('pid'=>17, 'action'=>'edit_feeitem', 'fid'=>$eachrecord->es_feemasterId));?>" title="Edit">
                                                                                    	<img src="images/b_edit.png" border="0" />
                                                                                    </a>&nbsp;
																	<?php		}?>
                                                                    
                                                            		<?php		if(in_array('6_2',$admin_permissions))
																				{?>
                        				                                            <a href="javascript:del_feestruc(<?php echo $eachrecord->es_feemasterId; ?>)" title="Delete" >
                                                                                    	<img src="images/b_drop.png" border="0" />
                                                                                    </a>
																	</td>
																	<?php		}?>
																	<?php	}?>		
																</tr>
													<?php	$total += $eachrecord->fee_amount;
															}	?>
                                                    
                                                          <tr height="1">
                                                            <td class="bgcolor_02"></td>
                                                            <td class="bgcolor_02"></td>
                                                            <td class="bgcolor_02"></td>
                                                          </tr>
                                                          <tr>
                                                          	<td style="font-weight:bold; text-align:left; padding: 3px 3px 3px 0px;">Total</td>
                                                            <td style="font-weight:bold; text-align:center;">Rs. <?php echo $total; $total=0; ?></td>
                                                            <td></td>
                                                          </tr>
                                                <tr>
                                                    <td align="right" colspan="7">
                                                    <?php if(in_array('6_14',$admin_permissions)){?>
        
        <input type="button" value="Print" class="bgcolor_02" onclick="window.open('?pid=17&action=print_fees_class&print_id=<?php echo $eachrecord->fee_class;?>&pre_year=<?php if(!isset($pre_year)){echo $finance_res ['es_finance_masterid']; } else {echo $pre_year; }?>',null,'width=900,height=900,left=140,right=40,menubar=yes,scrollbars=yes');" style="cursor:pointer;"/></td>
        
        
        <?php }?>
                                                    
                                                </tr>
        <?php } else { echo '<tr class="narmal"><td align="center" colspan="4">No Particulars Added</td></tr>'; } ?>
                                        </table>
                                    </td>
                                    <td width="0" class="bgcolor_02"></td>
                                </tr>
                                <tr>
                                    <td colspan="3" height="0" class="bgcolor_02"></td>   
                                </tr>
                            </table>
                                </fieldset><br />
				<?php } } ?>
				<tr>
					<td align="right" colspan="7">
					
					<?php 
					if (count($all_classlist)>0){
					if(in_array('6_15',$admin_permissions)){?>

<input type="button" value="Print" class="bgcolor_02" onclick="window.open('?pid=17&action=print_fees&pre_year=<?php if(!isset($pre_year)){echo $finance_res ['es_finance_masterid']; } else {echo $pre_year; }?>',null,'width=900,height=600,left=140,right=40,menubar=yes,scrollbars=yes');" style="cursor:pointer;"/><?php } }?></td>
			


					
						</tr>
		  </table>			
		</td>
		<td width="1" class="bgcolor_02"></td>
	</tr>
    <tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>
</table>
<?php 
}



/** 
* PRINT FEEE
*/
if ($action == 'print_fees') {
  
?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr><td align="center"><br />
<?php
	
	$all_classlist = getallClasses();
	if (count($all_classlist)>0){
	$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_feemaster','SET UP','FEE DETAILS','','PRINT FEE','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
	
	
		foreach($all_classlist as $eachclass){			
			$es_classID = $eachclass['es_classesid'] ;
?>
				<fieldset> <legend class="adminfont">Fee Details For Class :<?php echo $eachclass['es_classname']; ?></legend>
				<table width="95%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td width="0" class="bgcolor_02"></td>
					<td>
				<table width="100%" border="0" cellspacing="1" cellpadding="0">
				  <tr class="bgcolor_02" height="20">
					<td width="25%" class="admin">&nbsp;Particulars</td>
					<td width="24%" class="admin" align="center">Amount</td>
					<!--<td width="25%" class="admin" align="center">Fee Type</td>-->
					
				  </tr>
<?php 	

	
	$obj_feesmaster = new es_feemaster(); 
	$es_feemasterList = $obj_feesmaster->GetList(array(array("fee_class", "=", "$es_classID"),
	                                                    array("fee_fromdate","=", "$from_finance "),
													   array("fee_todate","=", "$to_finance")), "es_feemasterid", false);
	if (count($es_feemasterList)>0){
		foreach ($es_feemasterList as $eachrecord){
?>
				   <tr class="narmal">
					<td align="left">&nbsp;<?php echo ucwords(strtolower($eachrecord->fee_particular)); ?></td>
					<td align="center"><?php echo $_SESSION['eschools']['currency'].'. '.number_format($eachrecord->fee_amount, 2, '.', ''); ?></td>
					<!--<td align="center"><?php //if($eachrecord->fee_instalments==10){echo "Monthly";}else{echo "Yearly";} ?></td>-->
					
				  </tr>
					
				  <?php 
				  	$total += $eachrecord->fee_amount;
				  } ?>
                  <tr height="1">
                  	<td colspan="2"><hr></td>
                  </tr>
                   <tr>
                        <td style="font-weight:bold; text-align:right; padding: 3px 3px 3px 0px;">Total:</td>
                        <td style="font-weight:bold; text-align:center;">Rs. <?php echo $total; $total=0; ?></td>
                   </tr>
                   
				  <?php } else { ?>	
				  <tr class="narmal">
					<td align="center" colspan="4">No Particulars Added</td>					
				  </tr>	
				  <?php } ?>
				   <!--<tr class="bgcolor_02">
					<td align="center"  height="2" colspan="4">fghdfhdfhdfhfhdfyfdgh</td>					
				  </tr>	-->			  
				</table></td>
					<td width="1" class="bgcolor_02"></td>
				  </tr>
				  <tr>
					<td colspan="3" height="1" class="bgcolor_02"></td>   
				  </tr>
				</table>
				</fieldset><br />
				
				<?php } } ?>
				
				</td>
  </tr>
</table> 
<?php 

}
/**
** Print classs
***/

if ($action == 'print_fees_class') { 
 ?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td align="center"><br />
		<fieldset>
			<legend class="adminfont">Fee Details For Class : <?php echo classname($print_id); ?></legend>
			<table width="95%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td width="0" class="bgcolor_02"></td>
					<td>
						<table width="100%" border="0" cellspacing="1" cellpadding="0">
							<tr class="bgcolor_02" height="20">
								<td width="25%" class="admin">&nbsp;Particulars</td>
								<td width="24%" class="admin" align="center">Amount</td>
								<!--<td width="25%" class="admin" align="center">Fee Type</td>-->
							</tr>
<?php 				

	$obj_feesmaster = new es_feemaster();
	$es_feemasterList = $obj_feesmaster->GetList(array(array("fee_class", "=", "$print_id"),
	                                                   array("fee_fromdate","=", "$from_finance "),
													   array("fee_todate","=", "$to_finance")), "es_feemasterid", false);
	if (count($es_feemasterList)>0){
	$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,module,submodule,`record_id`,`action`,ipaddress,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_feemaster','SET UP','FEE DETAILS','".$print_id."','PRINT FEE','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
	
	$total = 0;
		foreach ($es_feemasterList as $eachrecord){
?>
							<tr class="narmal">
								<td align="left">&nbsp;<?php echo ucwords(strtolower($eachrecord->fee_particular)); ?></td>
								<td align="center"><?php echo $_SESSION['eschools']['currency'].'. '.number_format($eachrecord->fee_amount, 2, '.', ''); ?></td>
								<!--<td align="center"><?php //if($eachrecord->fee_instalments==10){echo "Monthly";}else{echo "Yearly";} ?></td>-->
							</tr>
					
<?php $total += $eachrecord->fee_amount;
	
		} ?>
		<tr height="1">
        	<td colspan="2"><hr></td>
        </tr>
        <tr>
        	<td style="font-weight:bold; text-align:right; padding: 3px 3px 3px 0px;">Total:</td>
            <td style="font-weight:bold; text-align:center;">Rs. <?php echo $total; $total=0; ?></td>
        </tr>
<?php }else {					
					echo '<tr class="narmal"><td align="center" colspan="4">No Particulars Added</td></tr>';	
	} 
 ?>
						</table>
					</td>
					<td width="0" class="bgcolor_02"></td>
				</tr>
				<tr><td colspan="3" height="0" class="bgcolor_02"></td></tr>
			</table>
		  </fieldset>
	  </td>
	</tr>
</table> 
<?php 

} 
// edit fee item from fee list
if ($action == 'edit_feeitem') { ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
	 </tr>
	<tr> 
		<td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Update Fee Item</span></td></tr>
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="center" valign="top">
		<form action="" name="updatefee" method="post">
			<table width="45%" border="0" cellspacing="2" cellpadding="2">
		  <tr>
					<td width="28%" class="narmal"></td>
					<td width="2%"></td>
					<td width="70%">&nbsp;</td>
				</tr>
				<tr>
					<td width="28%" align="left" class="narmal">Class</td>
				  <td width="2%" align="left"><strong>:</strong></td>
				  <td width="70%" align="left" class="narmal"><?php echo classname($es_feemasterdet->fee_class); ?></td>
			  </tr>
				<tr>
					<td align="left" class="narmal">Particulars</td>
				  <td align="left"><strong>:</strong></td>
				  <td align="left"><input type="text" name="newparticular" value="<?php echo $es_feemasterdet->fee_particular; ?>" /><input type="hidden" name="feeitemid" value="<?php echo $es_feemasterdet->es_feemasterId; ?>" /></td>
			  </tr>
				<tr>
					<td align="left" class="narmal">Amount</td>
				  <td align="left"><strong>:</strong></td>
				  <td align="left"><input type="text" name="newamount" value="<?php echo $es_feemasterdet->fee_amount; ?>" /></td>
			  </tr>
				<!--<tr>
					<td align="left" class="narmal">Fee Type</td>
				  <td align="left"><strong>:</strong></td>
			  <td align="left">
				<select name="newinstalment" />
                <option value="10" <?php //if ($es_feemasterdet->fee_instalments==10) echo "selected";?>>Monthly</option>
                <option value="1" <?php //if ($es_feemasterdet->fee_instalments==1) echo "selected";?>>Yearly</option>
                </select>
					</td>
			  </tr>-->
					<tr height="5">
					<td colspan="3" align="left"></td>				  
			  </tr>
				<tr>
					<td align="left">&nbsp;</td>
				  <td align="left"></td>
				  <td align="left"><input type="submit" name="updatefeeitem" value="Update" class="bgcolor_02"></td>
			  </tr>
				<tr>
				    <td>&nbsp;</td>
				    <td></td>
				    <td>&nbsp;</td>
				</tr>
			</table></form>						
		</td>
		<td width="1" class="bgcolor_02"></td>
    </tr>       
    <tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>
</table>
<?php 
} 
?>