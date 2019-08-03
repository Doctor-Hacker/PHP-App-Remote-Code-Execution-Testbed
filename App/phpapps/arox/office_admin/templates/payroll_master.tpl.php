<?php 
/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
// Leave Master
	if ($action=='leavemaster' || $leave_school_year=='Submit'){ 
		/*echo "<pre>";
		var_dump($leavemaster_det);*/
?>
<script type="text/javascript">
	function newWindowOpen (href) {
	 window.open(href, null,  'width=900, height=900, scrollbars=yes, toolbar=no, directories=no, status=no, menubar=yes, left=140, top=30');
	}
</script> 
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
	 </tr>
	<tr><td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;Create Annual Leave</td></tr>
	
		<tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="left" valign="middle"   class="narmal">&nbsp;<b>Note :</b>  Annual Leave will be added successfully for past  and future academic years but can only be viewed after <br />&nbsp;creating the respective academic year under <b>SETUP</b></td>
<td width="1" class="bgcolor_02"></td>
</tr>
<tr>
		<td width="1" class="bgcolor_02"></td>
		<td   class="narmal">&nbsp;
</td>
<td width="1" class="bgcolor_02"></td>
</tr>
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="right" valign="top"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font><br />
<?php 
	if (isset($elid) && $elid!=""){ 
?>
		
		<form action="" method="post" name="leavemaster">
			<table width="100%" border="0" cellspacing="2" cellpadding="2">
				<tr>
					<td width="24%" align="left"  class="adminfont">Department Name </td>
				  <td width="2%"  >:</td>
			  <td width="74%" align="left"> 
<select name="st_department" onChange="JavaScript:document.leavemaster.submit();" style="width:120px;">
							<option value="">-Select-</option>
							<?php foreach($getdeptlist as $eachrecord1) {  ?>
							<option value="<?php echo $eachrecord1["es_departmentsid"];?>" <?php echo ($eachrecord1["es_departmentsid"]==$leavemasterdetails->lev_dept)? "selected":""?>  ><?php echo $eachrecord1["es_deptname"];?></option>
						<?php } ?>
						</select><font color="#FF0000"><b>*</b></font>
					</td>
			  </tr>
				<tr>
					<td class="adminfont" align="left">Post </td>
					<td >:</td>
					<td align="left">
						<select name="es_postname" style="width:120px;" >
						<option value="" >Select</option>
						<?php if(count($posts_list) > 0 ){
						foreach ($posts_list as $eachrecord){ ?>
						<option value="<?php echo $eachrecord["es_deptpostsid"]; ?>" <?php echo ($eachrecord["es_deptpostsid"] == $leavemasterdetails->lev_post)?"selected":"" ?>  ><?php echo $eachrecord["es_postname"];?></option>
						<?php    } }?>
						</select><font color="#FF0000"><b>*</b></font>
					</td>
				</tr>
				<tr>
					<td class="adminfont" align="left">Leave Type</td>
					<td>:</td>
					<td align="left"><input type="text" name="leavetype" value="<?php echo	stripslashes($leavemasterdetails->lev_type); ?>" />
					<font color="#FF0000"><b>*</b></font></td>
				</tr>
				<tr>
					<td class="adminfont" align="left">No of Leaves per year </td>
					<td>:</td>
					<td align="left"><input type="text" name="noofleaves" value="<?php echo $leavemasterdetails->lev_leavescount; ?>" />
					<font color="#FF0000"><b>*</b></font></td>
				</tr>
				<tr>
					<td align="left" class="adminfont">Year </td>
					<td align="left">:</td>
					<td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">						
						<tr>                                          
							<td width="17%" >
							<table width="31%" border="0" cellspacing="0" cellpadding="0">
							<tr>
							
							<td width="21%" align="left" >
								<input class="plain" name="dc1" value="<?php echo formatDBDateTOCalender($leavemasterdetails->lev_from_date);?>" size="12" onFocus="this.blur()" readonly="readonly" />
							</td>
							<td width="79%" align="left" >
								<a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fStartPop(document.leavemaster.dc1,document.leavemaster.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a></td>
							</tr>
							</table>
						  </td>  
							 <td width="11%" align="center" valign="middle">&nbsp;--&nbsp;</td>                                
							<td width="72%" align="left" >
							<table border="0" cellspacing="0" cellpadding="0">
							<tr>
								
							  <td width="72" align="left" ><input class="plain" name="dc2" value="<?php echo formatDBDateTOCalender($leavemasterdetails->lev_to_date);?>" size="12" onFocus="this.blur()" readonly="readonly" /></td>
								<td width="99" align="left" ><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fEndPop(document.leavemaster.dc1,document.leavemaster.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a>&nbsp;<font color="#FF0000"><b>*</b></font></td>
							</tr>
							</table>
						  </td>                                    
                        </tr>                                     
                      </table>
						
								<iframe width=132 height=142 name="gToday:contrast:agenda.js" id="gToday:contrast:agenda.js" src="<?php echo JS_PATH ?>/DateRange/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe>
				  </td>
			  </tr>
					<?php /*?><tr>
						<td class="adminfont" align="left">Carry Forward </td>
						<td>:</td>
						<td align="left" class="narmal">
							<input name="carryforward" type="radio" value="yes" <?php if ($leavemasterdetails->lev_carryforward == "yes") { echo "checked='checked'"; } ?> />Carry Forward ( Limit 
							<input type="text" name="nofocarryfordays" size="4" value="<?php echo $leavemasterdetails->lev_days; ?>"  />  days)<br />
							<input name="carryforward" type="radio" value="no" <?php if($leavemasterdetails->lev_carryforward == "no") { echo "checked='checked'"; } ?> />Non-Carryforward</td>
					</tr>
					<tr>
						<td align="left" class="adminfont">Encashable</td>
						<td>:</td>
						<td align="left" class="narmal">
							<input name="encashable" type="radio" value="yes" <?php if ($leavemasterdetails->lev_enchashable == "yes") {
							echo "checked='checked'"; } ?> />Yes 
							<input name="encashable" type="radio" value="no" <?php if($leavemasterdetails->lev_enchashable == "no") { echo "checked='checked'"; } ?> />No</td>
					</tr><?php */?>
					<tr>
						<td colspan="3" class="adminfont" align="center">
							<input type="submit" name="saveleave" value="Update" class="bgcolor_02" style="cursor:pointer;"/>&nbsp;<input type="reset" name="reset" value="Reset" class="bgcolor_02" style="cursor:pointer;"/>&nbsp;</td>
					</tr>
					<tr><td colspan="3" class="adminfont" align="center">&nbsp;</td></tr>		 
		  </table>
		</form>
		<?php } else { ?>
		<form action="" method="post" name="leavemaster">
				<table width="100%" border="0" cellspacing="2" cellpadding="2">
					<tr>
						<td width="26%"  align="left" class="adminfont">Department Name</td>
						<td width="4%" align="center">:</td>
						<td colspan="4" align="left"> 
							<select name="st_department" onchange="JavaScript:document.leavemaster.submit();" style="width:120px;">
								<option value="">-Select-</option>
								<?php foreach($getdeptlist as $eachrecord) { ?>
								<option value="<?php echo $eachrecord["es_departmentsid"];?>" <?php echo ($eachrecord["es_departmentsid"]==	$st_department)?"selected": ""?>  ><?php echo $eachrecord["es_deptname"];?></option>
							<?php } ?>
							</select><font color="#FF0000"><b>*</b></font>
						</td>
				  </tr>
					 <tr>
						<td align="left" width="24%" class="adminfont">Post </td>
						<td align="left" width="1%">:</td>
						<td align="left" width="75%">
						<?php $allpostsarr=getallPosts($st_department);
						?>
						<select name="seldepartment[]" multiple="multiple" size="5" style="width:120px;">
						<?php 
						foreach($allpostsarr as $eachallpost)
						{ ?>
						<option value="<?php echo $eachallpost['es_deptpostsid'];?>"><?php echo postname($eachallpost['es_deptpostsid']);?></option>
						<?php } ?>
						</select>
						<font color="#FF0000"><b>*</b></font>Use Ctrl + Mouse click for multi selection
						</td>
					 </tr>
					 <tr>
						<td align="left" class="adminfont">Leave Type</td>
						<td align="left">:</td>
						<td align="left"><input type="text" name="leavetype" value="<?php echo stripslashes($leavetype); ?>" />
						<font color="#FF0000"><b>*</b></font></td>
					 </tr>
					 <tr>
						<td align="left" class="adminfont">No of Leaves per year </td>
						<td align="left">:</td>
						<td align="left"><input type="text" name="noofleaves" value="<?php echo $noofleaves;?>" />
						<font color="#FF0000"><b>*</b></font></td>
					 </tr>
					 <tr>
						<td align="left" class="adminfont">Year </td>
						<td align="left">:</td>
						<td align="left">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">					<tr>                                          
									<td width="26%">
										<table width="61%" border="0" cellspacing="0" cellpadding="0">
									    <tr>
												
                                              <td width="22%" align="left" ><input class="plain" name="dc1" value="" size="12" onfocus="this.blur()" readonly="readonly" /></td>
                                                <td width="78%" align="left" ><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fStartPop(document.leavemaster.dc1,document.leavemaster.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a></td>
                                          </tr>
                                      </table>
							  </td> <td width="7%" align="center" valign="middle">&nbsp;--&nbsp;</td>                                   
				    <td align="left" width="67%">
<table border="0" cellspacing="0" cellpadding="0">
												<tr>
													
													<td align="left" ><input class="plain" name="dc2" value="" size="12" onfocus="this.blur()" readonly="readonly" /></td>
													<td align="left" ><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fEndPop(document.leavemaster.dc1,document.leavemaster.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a>&nbsp;<font color="#FF0000"><b>*</b></font></td>
												</tr>
                      </table>
							  </td>                                    
									</tr>                                     
						  </table>
				    <iframe width=132 height=142 name="gToday:contrast:agenda.js" id="gToday:contrast:agenda.js" src="<?php echo JS_PATH ?>/DateRange/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe>
					</td>
				</tr>
			<?php /*?>	<tr>
					<td align="left" class="adminfont">Carry Forward </td>
					<td align="left">:</td>
					<td align="left" class="narmal">
						<input name="carryforward" type="radio" value="yes" />
			  Carry Forward ( Limit 
						<input type="text" name="nofocarryfordays" size="4" />
	days		         )<br />
						<input name="carryforward" type="radio" value="no" checked="checked" />Non-Carryforward
					</td>
				</tr>
				<tr>
					<td align="left" class="adminfont">Encashable</td>
					<td align="left">:</td>
					<td align="left" class="narmal"><input name="encashable" type="radio" value="yes" checked="checked" /> Yes<input name="encashable" type="radio" value="no" />No</td>
				</tr><?php */?>
				<tr>
				  <td colspan="3" class="adminfont" align="center">
					<?php if(in_array('11_1',$admin_permissions)){?>
<input type="submit" name="saveleave" value="Save" class="bgcolor_02" style="cursor:pointer;"/>&nbsp;
					<input type="reset" name="reset" value="Reset" class="bgcolor_02" style="cursor:pointer;"/>&nbsp;


<?php }?>
						</td>
				</tr>
				<tr><td colspan="3" class="adminfont" align="center">&nbsp;</td></tr>		 
			</table>
		</form>
		<?php } ?>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td align="center" class="adminfont" colspan="2">Academic Year</td>
				<form action="" method="post">
					<td align="center" class="narmal" colspan="2">
						<select name="pre_year">
						<?php  foreach($school_details_res as $each_record) { ?>
						<option value="<?php echo $each_record['es_finance_masterid']; ?>" <?php if ($each_record['es_finance_masterid']==$pre_year) {                echo "selected"; }?>><?php echo displaydate($each_record['fi_startdate'])." To ".displaydate($each_record['fi_enddate']); ?>						</option>
				<?php } ?>
				</select>					</td>
					<td align="center" class="adminfont" colspan="2">
					<input type="submit" name="leave_school_year" class="bgcolor_02" value="Submit" style="cursor:pointer;"/>					</td></form>
				</tr>  
				<tr class="bgcolor_02" height="25">
					<td width="8%" align="left" class="admin">S No</td>
					<td width="24%" align="left" class="admin">Department</td>
					<td width="20%" align="left" class="admin">Post</td>
					<td width="18%" align="left" class="admin">Holiday Type </td>
					<th width="10%"  class="admin">Days</th>
					<td width="20%" align="center" class="admin">Action</td>
				</tr>
		  <?php 
		  
			$rownum = $start+1;
			if (count($leavemaster_det)>0) { //array_print($leavemaster_det);
			foreach ($leavemaster_det as $eachrecord){
				$zibracolor = ($rownum%2==0)?"even":"odd";
			
			?>	
				<tr class="<?php echo $zibracolor;?>">
					<td align="left" class="narmal"><?php echo $rownum;  ?></td>
					<td align="left" class="narmal"><?php echo deptname($eachrecord->lev_dept); ?></td>
					<td align="left" class="narmal"><?php echo postname($eachrecord->lev_post); ?></td>
					<td align="center" class="narmal" ><?php echo $eachrecord->lev_type; ?></td>
					<td align="center" class="narmal"><?php echo $eachrecord->lev_leavescount; ?></td>
					<td align="center" class="narmal">
					<?php 
			$today = $_SESSION['eschools']['from_finance'];
			$comingdate = $eachrecord->lev_to_date;
			$day = (strtotime($today) - strtotime($comingdate)) / (60 * 60 * 24);
			if($day < 0){?>
			<?php if(in_array('11_2',$admin_permissions)){?>

<a href="?pid=29&action=leavemaster&elid=<?php echo $eachrecord->es_leavemasterId; ?>" title="Edit"><img src="images/b_edit.png" border="0" /></a>&nbsp;
			

<?php }?>
			
			<?php if(in_array('11_3',$admin_permissions)){?>
<a href="javascript:del_leavemaster(<?php echo $eachrecord->es_leavemasterId; ?>)" title="Delete"><img src="images/b_drop.png" border="0" /></a><?php } ?></td>
			


<?php }?>
			
			
				</tr>
		  <?php  $rownum++;} ?>
				<tr>
					<td colspan="6" align="center" class="narmal"><?php paginateexte($start, $q_limit, $no_rows, "&action=leavemaster");?></td>
				</tr>
		  <?php
		   } else { ?>
				<tr><td colspan="6" align="center" class="narmal">No Leaves Added Till Now</td></tr>
		  <?php } ?>		 
				<tr>
					<td colspan="6" align="right" class="narmal"><?php /*?><?php if($leave_school_year!="") { ?><input type="button" name="print_ledger" class="bgcolor_02"value="Print" onclick="newWindowOpen('?pid=29&action=printleavemaster&pre_year=<?php echo $pre_year; ?>')" /><?php } ?><?php */?></td>
				</tr>
			</table>
		<td width="1" class="bgcolor_02"></td>
	</tr>	  
	<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>
</table>
<?php	}?>

<?php
	if($action=='printleavemaster')
	{
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
		 <tr class="bgcolor_02" height="25">
			<td width="8%" align="left" class="admin">S No</td>
			<td width="24%" align="left" class="admin">Department</td>
			<td width="20%" align="left" class="admin">Post</td>
			<td width="18%" align="center" class="admin">Holiday Type </td>
			<th width="10%"  class="admin">Days</th>
		  </tr>
		  <?php 
			$rownum = 1;
			if(count($leavemaster_det)>0) {
			foreach ($leavemaster_det as $eachrecord){
			$zibracolor = ($rownum%2==0)?"even":"odd";
			?>	
		  <tr class="<?php echo $zibracolor;?>">
			<td align="left" class="narmal"><?php echo $rownum; ?></td>
			<td align="left" class="narmal"><?php echo deptname($eachrecord->lev_dept); ?></td>
			<td class="narmal" align="left"><?php echo postname($eachrecord->lev_post); ?></td>
			<td align="center" class="narmal" ><?php echo $eachrecord->lev_type; ?></td>
			<td align="center" class="narmal"><?php echo $eachrecord->lev_leavescount; ?></td>
		  </tr>
		  <?php 
		  $rownum++;
		  } ?>
		   
		  <?php
		  } ?>
		</table>
<?php	
	
	}

if ($action=='allowencemaster' || $allowance_school_year == 'Submit'){
	
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
	 </tr>
	<tr>
		<td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Create Allowance Type</span></td>
	</tr>
	 <tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="left" valign="middle"   class="narmal">&nbsp;<b>Note :</b>  Allowance   will be added successfully for past and future academic years but can only be viewed after <br />&nbsp;creating the respective academic year under <b>SETUP</b></td>
<td width="1" class="bgcolor_02"></td>
</tr>
<tr>
		<td width="1" class="bgcolor_02"></td>
		<td   class="narmal" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font>
</td>
<td width="1" class="bgcolor_02"></td>
</tr>
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="left" valign="top">
	<?php if(isset($elid) && $elid!=""){ ?>
	<form action="" method="post" name="allowenceform">
			<table width="100%" border="0" cellspacing="2" cellpadding="2">
				<tr>
					<td class="adminfont" align="left">Department</td>
                    <td >:</td>
                   	<td colspan="4" align="left"> 
						<select name="st_department" onchange="JavaScript:document.allowenceform.submit();" style="width:120px;">
							<option value="">-Select-</option>
							<?php foreach($getdeptlist as $eachrecord) { ?>
							<option value="<?php echo $eachrecord[es_departmentsid];?>" <?php echo ($eachrecord[es_departmentsid]==		 							$allowancemasterdetails->alw_dept)?"selected":""?>  ><?php echo $eachrecord[es_deptname];?></option>
						<?php } ?>
						</select><font color="#FF0000"><b>*</b></font>					</td>
				</tr>
				<tr>
					<td width="24%" align="left" valign="middle" class="adminfont">Post </td>
					<td align="left" width="1%">:</td>
					<td align="left" width="75%"><?php echo $innervalue->es_postname;?>
						    <select name="es_postname" style="width:120px;">
							<option value="" >Select</option>
							       <?php if(count($posts_list2) > 0 ){
								foreach ($posts_list2 as $eachrecord){ ?>
							<option value="<?php echo $eachrecord['es_deptpostsid'];?>" <?php echo ($eachrecord['es_deptpostsid']==$allowancemasterdetails->alw_post)?"selected":""?>  ><?php echo $eachrecord['es_postname'];?></option>
					   <?php    }}?>
							</select>
		    <font color="#FF0000"><b>*</b></font></td>
		  </tr>
		  <tr>
			<td align="left" class="adminfont">Allowance Type</td>
			<td align="left">:</td>
			<td align="left"><input type="text" name="allonctype" value="<?php echo stripslashes($allowancemasterdetails->alw_type);?>" />
		    <font color="#FF0000"><b>*</b></font></td>
		  </tr>
		  <tr>
			<td align="left" class="adminfont">Year </td>
			<td align="left">:</td>
			<td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">                                      
                                        <tr>                                          
                                          <td width="16%"><table border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                                
                                                <td align="left" ><input class="plain" name="dc1" value="<?php echo formatDBDateTOCalender($allowancemasterdetails->alw_fromdate);?>" size="12" onfocus="this.blur()" readonly="readonly" /></td>
                                                <td align="left"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fStartPop(document.allowenceform.dc1,document.allowenceform.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a></td>
                                              </tr>
                                          </table></td>                                    
									       <td width="12%" align="center" valign="middle">&nbsp;--&nbsp;</td>
									       <td align="left" width="74%"><table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                             
                                              <td align="left" ><input class="plain" name="dc2" value="<?php echo formatDBDateTOCalender($allowancemasterdetails->alw_todate);?>" size="12" onfocus="this.blur()" readonly="readonly" /></td>
                                              <td align="left" ><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fEndPop(document.allowenceform.dc1,document.allowenceform.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a>&nbsp;<font color="#FF0000"><b>*</b></font></td>
                                            </tr>
                                          </table></td>                                    
                                        </tr>                                     
                                  </table>
				    <iframe width=132 height=142 name="gToday:contrast:agenda.js" id="gToday:contrast:agenda.js" src="<?php echo JS_PATH ?>/DateRange/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe></td>
		  </tr>
		  <tr>
			<td align="left" class="adminfont">Amount</td>
			<td align="left">:</td>
			<td align="left" class="narmal"><input name="alwamount" type="text" size="8" value="<?php echo $allowancemasterdetails->alw_amount;?>" />
			  <select name="alw_amt_type">
                <option value="Percentage" <?php if($allowancemasterdetails->alw_amt_type=="Percentage") { echo "selected='selected'";  } ?>>Percentage</option>
                <option value="Amount" <?php if($allowancemasterdetails->alw_amt_type=="Amount") { echo "selected='selected'";  } ?>>Amount</option>
              </select>
			  <font color="#FF0000"><b>*</b></font></td>
		  </tr>
		  <tr>
		    <td colspan="3" class="adminfont" align="center">
			<input type="submit" name="saveallowance" value="Update" class="bgcolor_02" style="cursor:pointer;"/>
		      &nbsp;
			<input type="reset" name="reset" value="Reset" class="bgcolor_02" style="cursor:pointer;"/>&nbsp;</td>
	      </tr>
		  <tr>
		    <td colspan="3" class="adminfont" align="center">&nbsp;</td>
	      </tr>		 
		</table>	 
		</form>
		<?php } else { ?>
		<form action="" method="post" name="allowenceform">
		<table width="90%" border="0" cellspacing="2" cellpadding="2">
		
					 <tr>
                        <td align="left" class="adminfont" >Department</td>
                        <td class="narmal">&nbsp;</td>
                   		<td colspan="4" align="left">
						    <select name="st_department" onchange="JavaScript:document.allowenceform.submit();" style="width:120px;">
						    <option value="">-Select-</option>
							<?php foreach($getdeptlist as $eachrecord) { ?>
							<option value="<?php echo $eachrecord[es_departmentsid];?>" <?php echo ($eachrecord[es_departmentsid]==		 							                            $st_department)?"selected":""?>  ><?php echo $eachrecord[es_deptname];?></option>
			                <?php } ?>
			                </select><font color="#FF0000"><b>*</b></font>
						</td>
          </tr>
		
		
		  <tr>
			<td align="left" width="24%" class="adminfont">Post </td>
			<td align="left" width="1%">:</td>
			<td align="left" width="75%">
			<?php $allpostsarr=getallPosts($st_department);
			?>
			<select name="seldepartment[]" multiple="multiple" size="5" style="width:120px;">
			<?php 
			foreach($allpostsarr as $eachallpost)
			{ ?>
			<option value="<?php echo $eachallpost['es_deptpostsid'];?>"><?php echo postname($eachallpost['es_deptpostsid']);?></option>
			<?php } ?>
			</select>
		   <font color="#FF0000"><b>*</b></font></td>
		  </tr>
		  <tr>
			<td align="left" class="adminfont">Allowance Type</td>
			<td align="left">:</td>
			<td align="left"><input type="text" name="allonctype" value="<?php echo stripslashes($allonctype); ?>" />
		    <font color="#FF0000"><b>*</b></font></td>
		  </tr>
		  <tr>
			<td align="left" class="adminfont">Year </td>
			<td align="left">:</td>
			<td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">                                      
                                        <tr>                                          
                                          <td width="18%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                                
                                                <td align="left"><input class="plain" name="dc1" size="12" onfocus="this.blur()" value="<?php echo $dc1; ?>" readonly /></td>
                                                <td align="left"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fStartPop(document.allowenceform.dc1,document.allowenceform.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a></td>
                                              </tr>
                                          </table></td>                                    
									       <td width="12%" align="center" valign="middle">&nbsp;--&nbsp;</td>
									       <td width="70%"><table  border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              
                                              <td align="left" ><input class="plain" name="dc2" value="<?php echo $dc2; ?>" size="12" onfocus="this.blur()" readonly /></td>
                                              <td align="left" ><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fEndPop(document.allowenceform.dc1,document.allowenceform.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a>&nbsp;<font color="#FF0000"><b>*</b></font></td>
                                            </tr>
                                          </table></td>                                    
                                        </tr>                                     
                                  </table>
				    <iframe width=132 height=142 name="gToday:contrast:agenda.js" id="gToday:contrast:agenda.js" src="<?php echo JS_PATH ?>/DateRange/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe></td>
		  </tr>
		  <tr>
			<td align="left" class="adminfont">Amount</td>
			<td align="left">:</td>
			<td align="left" class="narmal"><input name="alwamount" type="text" size="8" value="<?php echo $alwamount;  ?>" />
			  <select name="alw_amt_type">
                <option value="Percentage">Percentage</option>
                <option value="Amount">Amount</option>
              </select>
			  <font color="#FF0000"><b>*</b></font></td>
		  </tr>
		  <tr>
		    <td colspan="3" class="adminfont" align="center">
		<?php if(in_array('11_4',$admin_permissions)){?>

<input type="submit" name="saveallowance" value="Save" class="bgcolor_02" style="cursor:pointer;"/>&nbsp;
			<input type="reset" name="reset" value="Reset" class="bgcolor_02" style="cursor:pointer;"/>&nbsp;

<?php }?>
		
		
			</td>
	      </tr>
		  <tr>
		    <td colspan="3" class="adminfont" align="center">&nbsp;</td>
	      </tr>		 
		</table>
		</form>
		<?php } ?>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		       <tr>
					<td align="center" class="adminfont" colspan="2">Academic Year</td>
				      <form action="" method="post">
					<td align="center" class="narmal" colspan="2">
						<select name="pre_year">
						<?php  foreach($school_details_res as $each_record) { ?>
						<option value="<?php echo $each_record['es_finance_masterid']; ?>" <?php if ($each_record['es_finance_masterid']==                        $pre_year) { echo "selected"; }?>><?php echo displaydate($each_record['fi_startdate'])." To ".displaydate($each_record[                        'fi_enddate']); ?>						</option>
						<?php } ?>
						</select>					</td>
					<td align="center" class="adminfont" colspan="2">
					<input type="submit" name="allowance_school_year" class="bgcolor_02" value="Submit" style="cursor:pointer;"/>					</td></form>
		  </tr>  
				
		  <tr class="bgcolor_02" height="25">
			<td width="7%" align="left" class="admin">&nbsp;S&nbsp;No</td>
			<td width="15%" align="left" class="admin">Department</td>
			<td width="21%" align="left" class="admin">Post</td>
			<td width="21%" align="left" class="admin">Allowance Type </td>
			<td align="left" class="admin" colspan="2">Amount</td>
			<td width="18%" align="center" class="admin">Action</td>
		  </tr>
		  <?php 
			$allowance_rownum = 1;
			if(count($allowancemaster_det)>0) {
			foreach ($allowancemaster_det as $allowance_eachrecord){
			$zibracolor = ($allowance_rownum%2==0)?"even":"odd";
			?>	
		  <tr class="<?php echo $zibracolor;?>">
		  
	
			<td align="left" class="narmal"><?php $allowance_rownum; echo $allowance_rownum++; ?></td>
			<td align="left" class="narmal"><?php echo deptname($allowance_eachrecord->alw_dept); ?></td>
			<td align="left" class="narmal"><?php echo postname($allowance_eachrecord->alw_post); ?></td>
			<td align="left" class="narmal"><?php echo $allowance_eachrecord->alw_type; ?></td>
			<td align="left" class="narmal" colspan="2"><?php echo $allowance_eachrecord->alw_amount;
				 if($allowance_eachrecord->alw_amt_type=='Percentage')
			{
			echo "%";
			}
			  ?></td>
			<td align="center" class="narmal">
			<?php 
			$today = $_SESSION['eschools']['from_finance'];
			$comingdate = $allowance_eachrecord->alw_todate;
			$day = (strtotime($today) - strtotime($comingdate)) / (60 * 60 * 24);
			if($day < 0){?>
			<?php if(in_array('11_5',$admin_permissions)){?>

<a href="?pid=29&action=allowencemaster&elid=<?php echo $allowance_eachrecord->es_allowencemasterId; ?>" title="Edit"><img src="images/b_edit.png" border="0" /></a>&nbsp;
			

<?php }?>
			
			<?php if(in_array('11_6',$admin_permissions)){?>

<a href="javascript:del_allowencemaster(<?php echo $allowance_eachrecord->es_allowencemasterId; ?>)" title="Delete">
			<img src="images/b_drop.png" border="0" /></a>	
			

<?php }?>
			
			<?php }?>		
			</td>
		  </tr>
		  <?php 
		  $rownum++;
		  } ?>
		   <tr>
			<td colspan="6" align="center" class="narmal"><?php paginateexte($start, $q_limit, $no_rows, "&action=allowencemaster");?></td>
		  </tr>
		  <?php
		   } else { ?>
		   <tr>
			<td colspan="6" align="center" class="narmal">No Allowance Added Till Now</td>
		  </tr>
		  <?php } ?>		 
		  <tr>
		    <td colspan="6" align="center" class="narmal">&nbsp;</td>
	      </tr>
		</table>
		</td>
		<td width="1" class="bgcolor_02"></td>
  </tr>	  
	  <tr>
		<td height="1" colspan="3" class="bgcolor_02"></td>
  </tr>
</table>
<?php
	}
// End of allowence Master
	
// deductions Master
	if($action=='deductionsmaster')
	{
?>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
         <td height="3" colspan="3"></td>
	 </tr>
	  <tr>
		<td height="25" colspan="3" class="bgcolor_02">&nbsp;Create Deduction Type</td>
	  </tr>
	  <tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="left" valign="middle"   class="narmal">&nbsp;<b>Note :</b>  Deduction   will be added successfully for past  and future academic years but can only be viewed after <br />&nbsp;creating the respective academic year under <b>SETUP</b></td>
<td width="1" class="bgcolor_02"></td>
</tr>
<tr>
		<td width="1" class="bgcolor_02"></td>
		<td   class="narmal" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font><br />
</td>
<td width="1" class="bgcolor_02"></td>
</tr>
	  <tr>
		<td width="1" class="bgcolor_02"></td>
		<td  align="left" valign="top">
		
		<?php if(isset($elid) && $elid!="")
		{ ?>
		<form action="" method="post" name="allowenceform">
		<table width="90%" border="0" cellspacing="2" cellpadding="2">
		
					 <tr>
                        <td align="left" class="adminfont">Department</td>
                        <td >:</td>
                   		<td colspan="4" align="left"> 
						<select name="st_department" onchange="JavaScript:document.allowenceform.submit();" style="width:120px;">
						<option value="">-Select-</option>
							<?php foreach($getdeptlist as $eachrecord) { ?>
							<option value="<?php echo $eachrecord[es_departmentsid];?>" <?php echo ($eachrecord[es_departmentsid]==		 							$deductionmasterdetails->ded_dept)?"selected":""?>  ><?php echo $eachrecord[es_deptname];?></option>
			<?php } ?>
			</select>&nbsp;<font color="#FF0000"><b>*</b></font></td>
            </tr>
		  <tr>
			<td align="left" width="24%" class="adminfont">Post </td>
			<td align="left" width="1%">:</td>
			<td align="left" width="75%"><select name="es_postname" style="width:120px;">
                       <option value="" >Select</option>
                       <?php if(count($posts_list3) > 0 ){
					   foreach ($posts_list3 as $eachrecord){ ?>
					   <option value="<?php echo $eachrecord['es_deptpostsid'];?>" <?php echo ($eachrecord['es_deptpostsid']==$deductionmasterdetails->ded_post)?"selected":""?>  ><?php echo $eachrecord['es_postname'];?></option>
					   <?php    } }?>
                       </select>
		    <font color="#FF0000"><b>*</b></font></td>
		  </tr>
		  <tr>
			<td align="left" class="adminfont">Deduction Type</td>
			<td align="left">:</td>
			<td align="left"><input type="text" name="allonctype" value="<?php echo stripslashes($deductionmasterdetails->ded_type); ?>" />
		    <font color="#FF0000"><b>*</b></font></td>
		  </tr>
		  <tr>
			<td align="left" class="adminfont">Year </td>
			<td align="left">:</td>
			<td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">                                      
                                        <tr>                                          
                                          <td width="16%"><table border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                                
                                                <td align="left" ><input class="plain" name="dc1" value="<?php echo formatDBDateTOCalender($deductionmasterdetails->ded_fromdate);?>" size="12" onfocus="this.blur()" readonly="readonly" /></td>
                                                <td align="left"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fStartPop(document.allowenceform.dc1,document.allowenceform.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a></td>
                                              </tr>
                                          </table></td>                                    
									       <td width="12%" align="center" valign="middle">&nbsp;--&nbsp;</td>
									       <td width="72%"><table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              
                                              <td align="left"><input class="plain" name="dc2" value="<?php echo formatDBDateTOCalender($deductionmasterdetails->ded_todate);?>" size="12" onfocus="this.blur()" readonly="readonly" /></td>
                                              <td align="left" ><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fEndPop(document.allowenceform.dc1,document.allowenceform.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a>&nbsp;<font color="#FF0000"><b>*</b></font></td>
                                            </tr>
                                          </table></td>                                    
                                        </tr>                                     
                                  </table>
				    <iframe width=132 height=142 name="gToday:contrast:agenda.js" id="gToday:contrast:agenda.js" src="<?php echo JS_PATH ?>/DateRange/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe></td>
		  </tr>
		  <tr>
			<td align="left" class="adminfont">Amount</td>
			<td align="left">:</td>
			<td align="left" class="narmal"><input name="alwamount" type="text" size="8" value="<?php echo $deductionmasterdetails->ded_amount;?>" />
			  <select name="alw_amt_type" >
                <option value="Percentage" <?php if($deductionmasterdetails->ded_amt_type=="Percentage") { echo "selected='selected'";  } ?>>Percentage</option>
                <option value="Amount" <?php if($deductionmasterdetails->ded_amt_type=="Amount") { echo "selected='selected'";  } ?>>Amount</option>
              </select>
			  <font color="#FF0000"><b>*</b></font></td>
		  </tr>
		  <tr>
		    <td colspan="3" class="adminfont" align="center">
			<input type="submit" name="saveallowance" value="Update" class="bgcolor_02" style="cursor:pointer;"/>&nbsp;
			<input type="reset" name="reset" value="Reset" class="bgcolor_02" style="cursor:pointer;"/>&nbsp;</td>
	      </tr>
		  <tr>
		    <td colspan="3" class="adminfont" align="center">&nbsp;</td>
	      </tr>		 
		</table>
		</form>
		<?php } else { ?>
		<form action="" method="post" name="allowenceform">
		<table width="90%" border="0" cellspacing="2" cellpadding="2">
							 <tr>
                        <td align="left"><span class="adminfont">Department</span></td>
                        <td class="narmal">&nbsp;</td>
                   		<td colspan="4" align="left"> <select name="st_department" onchange="JavaScript:document.allowenceform.submit();" style="width:120px;">
						<option value="">-Select-</option>
							<?php foreach($getdeptlist as $eachrecord) { ?>
							<option value="<?php echo $eachrecord[es_departmentsid];?>" <?php echo ($eachrecord[es_departmentsid]==		 							$st_department)?"selected":""?>  ><?php echo $eachrecord[es_deptname];?></option>
			<?php } ?>
			</select><font color="#FF0000"><b>*</b></font></td>
            </tr>
		  <tr>
			<td align="left" width="24%" class="adminfont">Post </td>
			<td align="left" width="1%">:</td>
			<td align="left" width="75%">
			<?php $allpostsarr=getallPosts($st_department);?>
			<select name="seldepartment[]" multiple="multiple" size="5"style="width:120px;">
			<?php 
			
			foreach($allpostsarr as $eachallpost)
			{ ?>
			<option value="<?php echo $eachallpost['es_deptpostsid'];?>"><?php echo postname($eachallpost['es_deptpostsid']);?></option>
			<?php } ?>
			</select>
		    <font color="#FF0000"><b>*</b></font></td>
		  </tr>
		  <tr>
			<td align="left" class="adminfont">Deduction Type</td>
			<td align="left">:</td>
			<td align="left"><input type="text" name="allonctype" value="<?php echo stripslashes($allonctype);?>" />
		    <font color="#FF0000"><b>*</b></font></td>
		  </tr>
		  <tr>
			<td align="left" class="adminfont">Year </td>
			<td align="left">:</td>
			<td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">                                      
                                        <tr>                                          
                                          <td width="16%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                               
                                                <td align="left" ><input class="plain" name="dc1" value="<?php echo $dc1; ?>" size="12" onfocus="this.blur()" readonly="readonly" /></td>
                                                <td align="left" ><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fStartPop(document.allowenceform.dc1,document.allowenceform.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a></td>
                                              </tr>
                                          </table></td>                                    
									       <td width="12%" align="center" valign="middle">&nbsp;--&nbsp;</td>
									       <td width="72%"><table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                             
                                              <td align="left" ><input class="plain" name="dc2" value="<?php echo $dc2; ?>" size="12" onfocus="this.blur()" readonly="readonly" /></td>
                                              <td align="left" ><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fEndPop(document.allowenceform.dc1,document.allowenceform.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a>&nbsp;<font color="#FF0000"><b>*</b></font></td>
                                            </tr>
                                          </table></td>                                    
                                        </tr>                                     
                                  </table>
				    <iframe width=132 height=142 name="gToday:contrast:agenda.js" id="gToday:contrast:agenda.js" src="<?php echo JS_PATH ?>/DateRange/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe></td>
		  </tr>
		  <tr>
			<td align="left" class="adminfont">Amount</td>
			<td align="left">:</td>
			<td align="left" class="narmal"><input name="alwamount" type="text" size="8" value="<?php echo $alwamount;?>"/>
			  <select name="alw_amt_type">
                <option value="Percentage">Percentage</option>
                <option value="Amount">Amount</option>
              </select>
			  <font color="#FF0000"><b>*</b></font></td>
		  </tr>
		  <tr>
		    <td colspan="3" class="adminfont" align="center">
			<?php if(in_array('11_7',$admin_permissions)){?>

<input type="submit" name="saveallowance" value="Save" class="bgcolor_02" style="cursor:pointer;"/>&nbsp;
		    <input type="reset" name="reset" value="Reset" class="bgcolor_02" style="cursor:pointer;"/>&nbsp;</td>
		  

<?php }?>
			
			
			</tr>
		  <tr>
		    <td colspan="3" class="adminfont" align="center">&nbsp;</td>
	      </tr>		 
		</table>
		</form>
		<?php } ?>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
					<td align="center" class="adminfont" colspan="2">Academic Year</td>
				      <form action="" method="post">
					<td align="center" class="narmal" colspan="2">
						<select name="pre_year">
						<?php  foreach($school_details_res as $each_record) { ?>
						<option value="<?php echo $each_record['es_finance_masterid']; ?>" <?php if ($each_record['es_finance_masterid']==                        $pre_year) { echo "selected"; }?>><?php echo displaydate($each_record['fi_startdate'])." To ".displaydate($each_record[                        'fi_enddate']); ?>
						</option>
						<?php } ?>
						</select>
					</td>
					<td align="center" class="adminfont" colspan="2">
						<input type="submit" name="deduction_school_year" class="bgcolor_02" value="Submit" style="cursor:pointer;"/>
					</td></form>
		  </tr>  
		  <tr class="bgcolor_02" height="25">
			<td width="9%" align="left" class="admin">&nbsp;S&nbsp;No</td>
			<td width="18%" align="left" class="admin">Department</td>
			<td width="18%" align="left" class="admin">Post</td>
			<td width="33%" align="left" class="admin">Deduction Type </td>
			<td width="22%" align="left" class="admin">Amount</td>
			<td width="18%" align="center" class="admin">Action</td>
		  </tr>
		  <?php 
			$deduction_rownum = 1;
			if(count($deductionmaster_det)>0) {
			foreach ($deductionmaster_det as $deduction_eachrecord){
			$zibracolor = ($deduction_rownum%2==0)?"even":"odd";
			?>	
		  <tr class="<?php echo $zibracolor;?>">
			<td align="left" class="narmal"><?php $deduction_rownum; echo $deduction_rownum++; ?></td>
			<td align="left" class="narmal"><?php echo deptname($deduction_eachrecord->ded_dept); ?></td>
			<td align="left" class="narmal"><?php echo postname($deduction_eachrecord->ded_post); ?></td>
			<td align="left" class="narmal"><?php echo $deduction_eachrecord->ded_type; ?></td>
			<td align="left" class="narmal"><?php echo $deduction_eachrecord->ded_amount; 
			if($deduction_eachrecord->ded_amt_type=='Percentage')
			{
			echo "%";
			}
			 ?></td>
			<td align="center" class="narmal"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php 
			$today = $_SESSION['eschools']['from_finance'];
			$comingdate = $deduction_eachrecord->ded_todate;
			$day = (strtotime($today) - strtotime($comingdate)) / (60 * 60 * 24);
			if($day < 0){?>
			<?php if(in_array('11_8',$admin_permissions)){?>

<a href="?pid=29&action=deductionsmaster&elid=<?php echo $deduction_eachrecord->es_deductionmasterId; ?>" title="Edit">
			<img src="images/b_edit.png" border="0" /></a>	

<?php }?>
			</td>
    <td><?php if(in_array('11_9',$admin_permissions)){?>

<a href="javascript:del_deductionsmaster(<?php echo $deduction_eachrecord->es_deductionmasterId; ?>)" title="Delete">
			<img src="images/b_drop.png" border="0" /></a>

<?php }?>
			
			<?php }?></td>
  </tr>
</table>

			
			
			</td>
		  </tr>
		  <?php 
		  $rownum++;
		  } ?>
		   <tr>
			<td colspan="5" align="center" class="narmal"><?php paginateexte($start, $q_limit, $no_rows, "&action=deductionsmaster");?></td>
		  </tr>
		  <?php
		   } else { ?>
		   <tr>
			<td colspan="5" align="center" class="narmal">No Deduction's Added Till Now </td>
		  </tr>
		  <?php } ?>		 
		  <tr>
		    <td colspan="5" align="center" class="narmal">&nbsp;</td>
	      </tr>
		</table>
		</td>
		<td width="1" class="bgcolor_02"></td>
	  </tr>	  
	  <tr>
		<td height="1" colspan="3" class="bgcolor_02"></td>
	  </tr>
	</table>
<?php
	}
// End of deductions Master
	
// loan Master
	if($action=='loanmaster')
	{
?>	
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
         <td height="3" colspan="3"></td>
	 </tr>
	  <tr>
		<td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Create a Loan</span></td>
	  </tr>
	  <tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="left" valign="middle"   class="narmal">&nbsp;<b>Note :</b>  Loan will be added successfully for past  and future academic years but can only be viewed after <br />&nbsp;creating the respective academic year under <b>SETUP</b></td>
<td width="1" class="bgcolor_02"></td>
</tr>
<tr>
		<td width="1" class="bgcolor_02"></td>
		<td   class="narmal" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font><br />
</td>
<td width="1" class="bgcolor_02"></td>
</tr>
	  <tr>
		<td width="1" class="bgcolor_02"></td>
		<td  align="left" valign="top">
		
		<?php if(isset($elid) && $elid!="")
		{ ?>
		<form action="" method="post" name="allowenceform">
		<table width="90%" border="0" cellspacing="2" cellpadding="2">
		
		
		 <tr>
          <td align="left" class="adminfont">Department</td>
                        <td > :</td>
                   		<td colspan="4" align="left"> 
						<select name="st_department" onchange="JavaScript:document.allowenceform.submit();" style="width:120px;">
						<option value="">-Select-</option>
							<?php foreach($getdeptlist as $eachrecord) { ?>
							<option value="<?php echo $eachrecord['es_departmentsid'];?>" <?php echo ($eachrecord['es_departmentsid']==		 							$loanmasterdetails->loan_dept)?"selected":""?>  ><?php echo $eachrecord['es_deptname'];?></option>
			<?php } ?>
			</select>&nbsp;<font color="#FF0000"><b>*</b></font></td>
          </tr>
		  <tr>
			<td align="left" width="24%" class="adminfont">Post </td>
			<td align="left" width="1%">:</td>
			<td align="left" width="75%">
			           <select name="es_postname" style="width:120px;">
                       <option value="" >Select</option>
                       <?php if(count($posts_list4) > 0 ){
					   foreach ($posts_list4 as $eachrecord){ ?>
					   <option value="<?php echo $eachrecord['es_deptpostsid'];?>" <?php echo ($eachrecord['es_deptpostsid']==$loanmasterdetails->loan_post)?"selected":""?>  ><?php echo $eachrecord['es_postname'];?></option>
					   <?php    } }?>
                       </select>
		    <font color="#FF0000"><b>*</b></font></td>
		  </tr>	 
		 <?php /*?>  <tr>
			<td align="left" class="adminfont">Loan Type</td>
			<td align="left">:</td>
			<td align="left"><select name="loanctype" style="width:120px;">
			<option <?php if($loanmasterdetails->loan_type=='Refundable')echo "selected='selected'";?> value="Refundable">Refundable</option>
			<option <?php if($loanmasterdetails->loan_type=='Non-Refundable')echo "selected='selected'";?> value="Non-Refundable">Non-Refundable</option>			
			</select></td>
		  </tr><?php */?>
		   <tr>
			<td align="left" class="adminfont">Loan Name </td>
			<td align="left">:</td>
			<td align="left"><input type="text" name="loanname" value="<?php echo stripslashes($loanmasterdetails->loan_name); ?>" />
		     <font color="#FF0000"><b>*</b></font></td>
		  </tr>
		  <tr>
			<td align="left" class="adminfont">Year </td>
			<td align="left">:</td>
			<td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">                                      
                                        <tr>                                          
                                          <td width="16%"><table border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                               
                                                <td align="left"><input class="plain" name="dc1" value="<?php echo formatDBDateTOCalender($loanmasterdetails->loan_fromdate); ?>" size="12" onfocus="this.blur()" readonly="readonly" /></td>
                                                <td align="left"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fStartPop(document.allowenceform.dc1,document.allowenceform.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a></td>
                                              </tr>
                                          </table></td>                                    
									       <td width="12%" align="center" valign="middle">&nbsp;--&nbsp;</td>
										   <td width="72%"><table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              
                                              <td align="left" ><input class="plain" name="dc2" value="<?php echo formatDBDateTOCalender($loanmasterdetails->loan_todate); ?>" size="12" onfocus="this.blur()" readonly="readonly" /></td>
                                              <td align="left"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fEndPop(document.allowenceform.dc1,document.allowenceform.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a>&nbsp;<font color="#FF0000"><b>*</b></font></td>
                                            </tr>
                                          </table></td>                                    
                                        </tr>                                     
                                  </table>
				    <iframe width=132 height=142 name="gToday:contrast:agenda.js" id="gToday:contrast:agenda.js" src="<?php echo JS_PATH ?>/DateRange/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe></td>
		  </tr>
		  <tr>
			<td align="left" class="adminfont">Interest Rate</td>
			<td align="left">:</td>
			<td align="left" class="narmal"><input name="intrestrate" type="text" value="<?php echo $loanmasterdetails->loan_intrestrate; ?>" size="8" />%<font color="#FF0000"><b>*</b></font></td>
		  </tr>
		   <tr>
			<td align="left" class="adminfont">Max Limit</td>
			<td align="left">:</td>
			<td align="left" class="narmal"><input name="alwamount" type="text" size="8" value="<?php echo $loanmasterdetails->loan_maxlimit; ?>" />
		     <font color="#FF0000"><b>*</b></font></td>
		  </tr>
		  <tr>
		    <td colspan="3" class="adminfont" align="center">
			<input type="submit" name="saveallowance" value="Update" class="bgcolor_02" style="cursor:pointer;"/>&nbsp;
			<input type="reset" name="reset" value="Reset" class="bgcolor_02" style="cursor:pointer;"/>&nbsp;</td>
		  </tr>
		  <tr>
		    <td colspan="3" class="adminfont" align="center">&nbsp;</td>
	      </tr>		 
		</table>
		</form>
		<?php } else { ?>
		<form action="" method="post" name="allowenceform">
		<table width="90%" border="0" cellspacing="2" cellpadding="2">
							 <tr>
                        <td align="left" class="adminfont">Department</td>
                        <td > :</td>
                   		<td colspan="4" align="left"> <select name="st_department" onchange="JavaScript:document.allowenceform.submit();" >
						<option value="">-Select-</option>
							<?php foreach($getdeptlist as $eachrecord) { ?>
							<option value="<?php echo $eachrecord[es_departmentsid];?>" <?php echo ($eachrecord[es_departmentsid]==		 							$st_department)?"selected":""?>  ><?php echo $eachrecord[es_deptname];?></option>
			<?php } ?>
			</select><font color="#FF0000"><b>*</b></font></td>
            </tr>
		  <tr>
			<td align="left" width="24%" class="adminfont">Post </td>
			<td align="left" width="1%">:</td>
			<td align="left" width="75%">
				<?php $allpostsarr=getallPosts($st_department);?>
			<select name="seldepartment[]" multiple="multiple" size="5" style="width:120px;">
			<?php 
			
			foreach($allpostsarr as $eachallpost)
			{ ?>
			<option value="<?php echo $eachallpost['es_deptpostsid'];?>"><?php echo postname($eachallpost['es_deptpostsid']);?></option>
			<?php } ?>
			</select>&nbsp;<font color="#FF0000"><b>*</b></font></td>
		  </tr>	 
		 <?php /*?>  <tr>
			<td align="left" class="adminfont">Loan Type</td>
			<td align="left">:</td>
			<td align="left"><select name="loanctype" />
			<option value="Refundable">Refundable</option>
			<option value="Non-Refundable">Non-Refundable</option>			
			</select>&nbsp;<font color="#FF0000"><b>*</b></font></td>
		  </tr><?php */?>
		   <tr>
			<td align="left" class="adminfont">Loan Name </td>
			<td align="left">:</td>
			<td align="left"><input type="text" name="loanname" value="<?php echo stripslashes($loanname);?>" />&nbsp;<font color="#FF0000"><b>*</b></font></td>
		  </tr>
		  <tr>
			<td align="left" class="adminfont">Year </td>
			<td align="left">:</td>
			<td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">                                      
                                        <tr>                                          
                                          <td width="16%"><table border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                                
                                                <td align="left"><input class="plain" name="dc1" value="<?php echo $dc1; ?>" size="12" onfocus="this.blur()" readonly="readonly" /></td>
                                                <td align="left"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fStartPop(document.allowenceform.dc1,document.allowenceform.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a></td>
                                              </tr>
                                          </table></td>                                    
									      <td width="12%" align="center" valign="middle">&nbsp;--&nbsp;</td>
										  <td width="72%"><table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              
                                              <td align="left"><input class="plain" name="dc2" value="<?php echo $dc2; ?>" size="12" onfocus="this.blur()" readonly="readonly" /></td>
                                              <td align="left"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fEndPop(document.allowenceform.dc1,document.allowenceform.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a>&nbsp;<font color="#FF0000"><b>*</b></font></td>
                                            </tr>
                                          </table></td>                                    
                                        </tr>                                     
                                  </table>
				    <iframe width=132 height=142 name="gToday:contrast:agenda.js" id="gToday:contrast:agenda.js" src="<?php echo JS_PATH ?>/DateRange/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe></td>
		  </tr>
		  <tr>
			<td align="left" class="adminfont">Interest Rate</td>
			<td align="left">:</td>
			<td align="left" class="narmal"><input name="intrestrate" type="text" size="8" value="<?php echo $intrestrate; ?>" />%<font color="#FF0000"><b>*</b></font></td>
		  </tr>
		   <tr>
			<td align="left" class="adminfont">Max Limit</td>
			<td align="left">:</td>
			<td align="left" class="narmal"><input name="alwamount" type="text" size="8" value="<?php echo $alwamount; ?>" />
		     <font color="#FF0000"><b>*</b></font></td>
		  </tr>
		  <tr>
		    <td colspan="3" class="adminfont" align="center">
			<?php if(in_array('11_10',$admin_permissions)){?>

	<input type="submit" name="saveallowance" value="Save" class="bgcolor_02" style="cursor:pointer;"/>&nbsp;
			<input type="reset" name="reset" value="Reset" class="bgcolor_02" style="cursor:pointer;"/>&nbsp;</td>
	     

<?php }?>
			
			
		 </tr>
		  <tr>
		    <td colspan="3" class="adminfont" align="center">&nbsp;</td>
	      </tr>		 
		</table>
		</form>
		<?php } ?>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		   <tr>
					<td align="center" class="adminfont" colspan="2">Academic Year</td>
				      <form action="" method="post">
					<td align="center" class="narmal" colspan="2">
						<select name="pre_year">
						<?php  foreach($school_details_res as $each_record) { ?>
						<option value="<?php echo $each_record['es_finance_masterid']; ?>" <?php if ($each_record['es_finance_masterid']==                        $pre_year) { echo "selected"; }?>><?php echo displaydate($each_record['fi_startdate'])." To ".displaydate($each_record[                        'fi_enddate']); ?>						</option>
						<?php } ?>
						</select>					</td>
					<td align="center" class="adminfont" colspan="2">
					<input type="submit" name="loan_school_year" class="bgcolor_02" value="Submit" style="cursor:pointer;"/>					                    </td></form>
		  </tr>  
		  <tr class="bgcolor_02" height="25">
			<td width="7%" align="left" class="admin">S&nbsp;No</td>
			<td width="17%" align="left" class="admin">Departmentt</td>
			<td width="17%" align="left" class="admin">Post</td>
			<td width="28%" align="left" class="admin">Loan Name</td>
			<td width="17%" align="left" class="admin">Interest Rate </td>
			<td width="15%" align="left" class="admin">Max Limit </td>
			<td width="16%" align="center" class="admin">Action</td>
		  </tr>
		  <?php 
			$loan_rownum = 1;
			if(count($loanmaster_det)>0) {
			foreach ($loanmaster_det as $loanmaster_eachrecord){
			$zibracolor = ($loan_rownum%2==0)?"even":"odd";
			?>	
		  <tr class="<?php echo $zibracolor;?>">
			<td align="left" class="narmal"><?php $loan_rownum; echo $loan_rownum++; ?></td>
						<td align="left" class="narmal"><?php echo deptname($loanmaster_eachrecord->loan_dept); ?></td>

			<td align="left" class="narmal"><?php echo postname($loanmaster_eachrecord->loan_post); ?></td>
			<td align="left" class="narmal"><?php echo $loanmaster_eachrecord->loan_name; ?></td>
			<td align="left" class="narmal"><?php echo $loanmaster_eachrecord->loan_intrestrate; ?>%</td>
			<td align="left" class="narmal"><?php echo $loanmaster_eachrecord->loan_maxlimit; ?></td>
			<td align="center" class="narmal">
			<?php 
			$today = $_SESSION['eschools']['from_finance'];
			$comingdate = $loanmaster_eachrecord->loan_todate;
			$day = (strtotime($today) - strtotime($comingdate)) / (60 * 60 * 24);
			if($day < 0){?>
			<?php if(in_array('11_11',$admin_permissions)){?>
<a href="?pid=29&action=loanmaster&elid=<?php echo $loanmaster_eachrecord->es_loanmasterId; ?>" title="Edit">
			<img src="images/b_edit.png" border="0" /></a>&nbsp;
			


<?php }?>
			
			<?php if(in_array('11_12',$admin_permissions)){?>

<a href="javascript:del_loanmaster(<?php echo $loanmaster_eachrecord->es_loanmasterId; ?>)" title="Delete">
			<img src="images/b_drop.png" border="0" /></a>
			

<?php }?>
			
			<?php }?>
			</td>
		  </tr>
		  <?php 
		  $rownum++;
		  } ?>
		   <tr>
			<td colspan="6" align="center" class="narmal"><?php paginateexte($start, $q_limit, $no_rows, "&action=loanmaster");?></td>
		  </tr>
		  <?php
		   } else { ?>
		   <tr>
			<td colspan="6" align="center" class="narmal">No Loans Added Till Now </td>
		  </tr>
		  <?php } ?>		 
		  <tr>
		    <td colspan="6" align="center" class="narmal">&nbsp;</td>
	      </tr>
		</table>
		</td>
		<td width="1" class="bgcolor_02"></td>
	  </tr>	  
	  <tr>
		<td height="1" colspan="3" class="bgcolor_02"></td>
	  </tr>
	</table>
<?php
	}		
// End of loan Master	

// Tax Master
	if($action=='taxmaster')
	{
?>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
         <td height="3" colspan="3"></td>
	 </tr>
	  <tr>
		<td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Create a Tax</span></td>
	  </tr>
	  <tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="left" valign="middle"   class="narmal">&nbsp;<b>Note :</b>  Tax will be added successfully for past  and future academic years but can only be viewed after <br />&nbsp;creating the respective academic year under <b>SETUP</b></td>
<td width="1" class="bgcolor_02"></td>
</tr>
<tr>
		<td width="1" class="bgcolor_02"></td>
		<td   class="narmal" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font><br />
</td>
<td width="1" class="bgcolor_02"></td>
</tr>
	 <tr>
		 <td width="1" class="bgcolor_02"></td>
		 
		<td align="left" valign="top">
		
		<?php if(isset($elid) && $elid!="")
		{ ?>
		<form action="" method="post" name="allowenceform">
		
		<table width="90%" border="0" cellspacing="2" cellpadding="2">	 
		   <tr>
			<td align="left" width="18%" class="adminfont">Tax Type </td>
			<td align="left" width="2%">:</td>
			<!--<td align="left" ><input type="text" name="taxname" value="<?php //echo $taxname; ?>" />-->
			<td align="left" width="80%"><input type="text" name="taxname" value="<?php echo stripslashes($taxmasterdetails->tax_name); ?>" />
		     <font color="#FF0000"><b>*</b></font></td>
		  </tr>
		   <tr>
			<td align="left" class="adminfont">Rate Type</td>
			<td align="left">:</td>
			<td align="left"><select name="allonctype">
			  <option <?php if($taxmasterdetails->tax_percentage_type=='percentage')echo "selected='selected'";?> value="percentage">Percentage</option>
			  <option <?php if($taxmasterdetails->tax_percentage_type=='amount')echo "selected='selected'";?> value="amount">Amount</option>
			  </select>			</td>
		   </tr>
		     <tr>
			<td align="left" class="adminfont"><font color="#FF0000"><b>*</b></font>Slab Rate's</td>
			<td align="left">:</td>
			<td align="left"></td>
		   </tr>
		  <tr>
			<td align="left" colspan="3">
            	<table width="100%" border="0" cellspacing="2" cellpadding="0">
                    <tr>
                        <td width="25%" align="center" class="adminfont">From</td>
                        <td width="25%" align="center" class="adminfont">To</td>
                        <td width="25%" align="center" class="adminfont">Rate</td>
                        <td width="25%" align="center" class="adminfont"></td>
                    </tr>
                    <tr>
                        <td height="25" align="center"><input type="text" name="slabratefrom" id="slabratefrom" value="<?php echo $taxmasterdetails->tax_from; ?>"  onblur="return ValidateIntegerVal(this.id);" style="width:80px; text-align:center;" /></td>
                        <td align="center"><input type="text" name="slabrateto" id="slabrateto" value="<?php echo $taxmasterdetails->tax_to; ?>" onblur="return ValidateIntegerVal(this.id);" style="width:80px; text-align:center;" /></td>
                        <td align="center"><input type="text" name="rateamount" id="rateamount" value="<?php echo $taxmasterdetails->tax_rate; ?>"  onblur="return ValidatePercent(this.id);" style="width:80px; text-align:center;" /></td>
                        <td align="center"></td>
                        </td>
                    </tr>
                    <tr>
                    	<td colspan="4" height="10"></td>
                    </tr>
				</table>
             </td>
		  </tr>
		  <tr>
			<td align="left" class="adminfont">Date of Year </td>
			<td align="left">:</td>
			<td align="left">
            	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                	<tr>                                          
                      <td width="50%" height="30" align="left" valign="middle">From &nbsp;<input class="plain" name="dc1" value="<?php echo formatDBDateTOCalender($taxmasterdetails->tax_from_date);?>" size="12" onfocus="this.blur()" readonly="readonly" /><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fStartPop(document.allowenceform.dc1,document.allowenceform.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a></td>                                    
                      <td align="left" width="50%" valign="middle">To &nbsp;<input class="plain" name="dc2" value="<?php echo formatDBDateTOCalender($taxmasterdetails->tax_to_date);?>" size="12" onfocus="this.blur()" readonly="readonly" /><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fEndPop(document.allowenceform.dc1,document.allowenceform.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a>&nbsp;<font color="#FF0000"><b>*</b></font></td>                                    
                    </tr> 
                                                        
                                  </table>
				    <iframe width=132 height=142 name="gToday:contrast:agenda.js" id="gToday:contrast:agenda.js" src="<?php echo JS_PATH ?>/DateRange/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe></td>
		  </tr>	
		  <tr>
		    <td colspan="3" class="adminfont" align="center">
			<input type="submit" name="saveallowance" value="Update" class="bgcolor_02" style="cursor:pointer;"/>&nbsp;
			<input type="reset" name="reset" value="Reset" class="bgcolor_02" style="cursor:pointer;"/>&nbsp;</td>
	      </tr>
		  <tr>
		    <td colspan="3" class="adminfont" align="center">&nbsp;</td>
	      </tr>		 
		</table>
		</form>
		<?php } else { ?>
		<form action="" method="post" name="allowenceform">
		<table width="90%" border="0" cellspacing="2" cellpadding="2">	 
		   <tr>
			<td align="left" width="18%" class="adminfont">Tax Type </td>
			<td align="left" width="2%">:</td>
			<td align="left" width="80%"><input type="text" name="taxname" value="<?php echo stripslashes($taxname); ?>" />
		     <font color="#FF0000"><b>*</b></font></td>
		  </tr>
		   <tr>
			<td align="left" class="adminfont">Rate Type</td>
			<td align="left">:</td>
			<td align="left"><select name="allonctype" id="allonctype">
			  <option value="percentage">Percentage</option>
			  <option value="amount">Amount</option>
			  </select>&nbsp;<font color="#FF0000"><b>*</b></font></td>
		   </tr>
		     <tr>
			<td align="left" class="adminfont"><font color="#FF0000"><b>*</b></font>Slab Rate's</td>
			<td align="left">:</td>
			<td align="left"></td>
		   </tr>
		  <tr>
			<td align="left" colspan="3" >
                <table width="90%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="25%" align="center" class="adminfont">From</td>
                        <td width="25%" align="center" class="adminfont">To</td>
                        <td width="25%" align="center" class="adminfont">Rate</td>
                        <td width="25%" align="center" class="adminfont">Action</td>
                    </tr>
                    <tr>
                        <td colspan="4" align="center">
                            <table id="maintblrows" width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                                <tr>
                                    <td align="center" width="25%" height="25"><input type="text" name="slabratefrom[1]" id="slabratefrom[1]" value="" style="width:80px; text-align:center;" /></td>
                                    <td align="center" width="25%"><input type="text" name="slabrateto[1]" id="slabrateto[1]" value="" style="width:80px; text-align:center;" onblur="return ValidateCharges(this.id);" /></td>
                                    <td align="center" width="25%"><input type="text" name="rateamount[1]" id="rateamount[1]" value="" style="width:80px; text-align:center;" onblur="return ValidatePercent(this.id);" /></td>
                                    <td align="center" width="25%">
									
									
									
									<a href="javascript:AddNewRow()" title="Add"><img src="images/add_16.png" border="0" /></a>&nbsp;
									
									
									
									<a href="javascript:DeleteLastRow()" title="Delete"><img src="images/b_drop.png" border="0" /></a></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" align="center" height="10"></td>
                    </tr>
                </table>
            </td>
		  </tr>
		  <tr>
			<td align="left" class="adminfont">Date of Year </td>
			<td align="left">:</td>
			<td align="left">
            	<table width="100%" border="0" cellspacing="0" cellpadding="0">                                      
                    <tr>                                          
                      <td width="50%" height="30" align="left" valign="middle">From &nbsp;<input class="plain" name="dc1" value="<?php //echo formatDBDateTOCalender($leavemasterdetails->alw_fromdate);?>" size="12" onfocus="this.blur()" readonly="readonly" /><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fStartPop(document.allowenceform.dc1,document.allowenceform.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a></td>                                    
                      <td align="left" width="50%" valign="middle">To &nbsp;<input class="plain" name="dc2" value="<?php //echo formatDBDateTOCalender($leavemasterdetails->alw_todate);?>" size="12" onfocus="this.blur()" readonly="readonly" /><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fEndPop(document.allowenceform.dc1,document.allowenceform.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a>&nbsp;<font color="#FF0000"><b>*</b></font></td>                                    
                    </tr>                                     
              	</table>
				<iframe width=132 height=142 name="gToday:contrast:agenda.js" id="gToday:contrast:agenda.js" src="<?php echo JS_PATH ?>/DateRange/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe></td>
		  </tr>	
		  <tr>
		    <td colspan="3" class="adminfont" align="center">
			
			<?php if(in_array('11_13',$admin_permissions)){?>

<input type="submit" name="saveallowance" id="saveallowance" value="Save" class="bgcolor_02" style="cursor:pointer;" onclick="return ValidateCharges('');" />&nbsp;<input type="reset" name="reset" value="Reset" class="bgcolor_02" style="cursor:pointer;"/>&nbsp;

<?php }?>
			
			</td>
		  </tr>
		  <tr>
		    <td colspan="3" class="adminfont" align="center">&nbsp;</td>
	      </tr>		 
		</table>
		</form>
		<?php } ?>
		
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
					<td align="center" class="adminfont" colspan="2">Academic Year</td>
				      <form action="" method="post">
					<td align="center" class="narmal" colspan="2">
						<select name="pre_year">
						<?php  foreach($school_details_res as $each_record) { ?>
						<option value="<?php echo $each_record['es_finance_masterid']; ?>" <?php if ($each_record['es_finance_masterid']==                        $pre_year) { echo "selected"; }?>><?php echo displaydate($each_record['fi_startdate'])." To ".displaydate($each_record[                        'fi_enddate']); ?>						</option>
						<?php } ?>
						</select>					</td>
					<td align="center" class="adminfont" colspan="2">
					<input type="submit" name="tax_school_year" class="bgcolor_02" value="Submit" style="cursor:pointer;"/>					                    </td></form>
		  </tr>  
		  <tr class="bgcolor_02" height="25">
			<td width="7%" align="left" class="admin">S&nbsp;No</td>
			<td width="20%" align="left" class="admin">Tax Type </td>
			<td width="12%" align="left" class="admin">From</td>
			<td width="8%" align="left" class="admin"></td>
			<td width="23%" align="left" class="admin">To</td>
			<td width="14%" align="left" class="admin">Rate</td>
			<td width="16%" align="center" class="admin">Action</td>
		  </tr>
		  <?php 
			$taxmaster_rownum = 1;
			if(count($taxmaster_det)>0) {
			foreach ($taxmaster_det as $taxmaster_eachrecord){
			$zibracolor = ($taxmaster_rownum%2==0)?"even":"odd";
			?>	
		  <tr class="<?php echo $zibracolor;?>">
			<td align="left" class="narmal"><?php $taxmaster_rownum; echo $taxmaster_rownum++; ?></td>
			<td align="left" class="narmal"><?php echo $taxmaster_eachrecord->tax_name; ?></td>
			<td align="left" class="narmal"><?php echo $taxmaster_eachrecord->tax_from; ?></td>
			<td align="left" class="narmal">to</td>
			<td align="left" class="narmal"><?php echo $taxmaster_eachrecord->tax_to; ?></td>
			<td align="left" class="narmal"><?php echo $taxmaster_eachrecord->tax_rate; 
			if($eachrecord->tax_percentage_type=='percentage') { echo "%";  } ?></td>
			<td align="center" class="narmal">
			<?php 
			$today = $_SESSION['eschools']['from_finance'];
			$comingdate = $taxmaster_eachrecord->tax_to_date;
			$day = (strtotime($today) - strtotime($comingdate)) / (60 * 60 * 24);
			if($day < 0){?>
			
			<?php if(in_array('11_14',$admin_permissions)){?>

<a href="?pid=29&action=taxmaster&elid=<?php echo $taxmaster_eachrecord->es_taxmasterId; ?>" title="Edit">
			<img src="images/b_edit.png" border="0" /></a><?php ?>&nbsp;
			

<?php }?>
			<?php if(in_array('11_15',$admin_permissions)){?>

	<a href="javascript:del_taxmaster(<?php echo $taxmaster_eachrecord->es_taxmasterId; ?>)" title="Delete">
			<img src="images/b_drop.png" border="0" /></a>

<?php }?>
			
		
			<?php }?>
			</td>
		  </tr>
		  <?php 
		  $rownum++;
		  } ?>
		   <tr>
			<td colspan="7" align="center" class="narmal"><?php paginateexte($start, $q_limit, $no_rows, "&action=taxmaster");?></td>
		  </tr>
		  <?php
		   } else { ?>
		   <tr>
			<td colspan="7" align="center" class="narmal">No Tax Added Till Now </td>
		  </tr>
		  <?php } ?>		 
		  <tr>
		    <td colspan="7" align="center" class="narmal">&nbsp;</td>
	      </tr>
		</table>
		</td>
		<td width="1" class="bgcolor_02"></td>
	  </tr>	  
	  <tr>
		<td height="1" colspan="3" class="bgcolor_02"></td>
	  </tr>
	</table>
<?php
	}		
// End of Tax Master	

// Pf Master
	if($action=='pfmaster')
	{
?>	
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
         <td height="3" colspan="3"></td>
	 </tr>
	  <tr>
		<td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Create PF</span></td>
	  </tr>
	  <tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="left" valign="middle"   class="narmal">&nbsp;<b>Note :</b>  PF will be added successfully for past  and future academic years but can only be viewed after <br />&nbsp;creating the respective academic year under <b>SETUP</b></td>
<td width="1" class="bgcolor_02"></td>
</tr>
<tr>
		<td width="1" class="bgcolor_02"></td>
		<td   class="narmal" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font><br />
</td>
<td width="1" class="bgcolor_02"></td>
</tr>
	  <tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="left" valign="top">
		<?php if(isset($elid) && $elid!="")
		{ ?>
		<form action="" method="post" name="allowenceform">
		  <table width="90%" border="0" cellspacing="2" cellpadding="2">
		   <tr>
                        <td align="left" class="adminfont">Department</td>
                        <td >:</td>
                   		<td colspan="4" align="left"> 
						<select name="st_department" onchange="JavaScript:document.allowenceform.submit();" style="width:120px;">
						<option value="">-Select-</option>
							<?php foreach($getdeptlist as $eachrecord) { ?>
						<option value="<?php echo $eachrecord['es_departmentsid'];?>" <?php echo ($eachrecord['es_departmentsid']==		 							$pfmasterdetails->pf_dept)?"selected":""?>  ><?php echo $eachrecord['es_deptname'];?></option>
			<?php } ?>
			</select>&nbsp; <font color="#FF0000"><b>*</b></font></td>
            </tr>
		  <tr>
			<td align="left" width="28%" class="adminfont">Post </td>
			<td align="left" width="1%">:</td>
			<td align="left" width="71%">
			           <select name="es_postname" style="width:120px;">
                       <option value="" >Select</option>
                       <?php if(count($posts_list5) > 0 ){
					   foreach ($posts_list5 as $eachrecord){ ?>
					   <option value="<?php echo $eachrecord['es_deptpostsid'];?>" <?php echo ($eachrecord['es_deptpostsid']==$pfmasterdetails->pf_post)?"selected":""?>  ><?php echo $eachrecord['es_postname'];?></option>
					   <?php    } }?>
                       </select>&nbsp;<font color="#FF0000"><b>*</b></font></td>
		  </tr>	 
		   <tr>
			<td align="left" class="adminfont">Employer Contribution</td>
			<td align="left">:</td>
			<td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td align="left" width="19%"><input name="employeercont" type="text" size="6" maxlength="8" value="<?php echo $pfmasterdetails->pf_empycont; ?>" /></td>
					<td align="left" width="81%"><select name="empconttype" />
			<option <?php if($pfmasterdetails->pf_empyconttype=='Percentage')echo "selected='selected'";?> value="Percentage">Percentage</option>
			<option <?php if($pfmasterdetails->pf_empyconttype=='Amount')echo "selected='selected'";?> value="Amount">Amount</option>			
			</select>&nbsp;<font color="#FF0000"><b>*</b></font></td>
				  </tr>
				</table>
			</td>
		  </tr>
		   <tr>
			<td align="left" class="adminfont">Employee Contribution</td>
			<td align="left">:</td>
			<td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td align="left" width="19%"><input name="employeecont" type="text" size="6" maxlength="8" value="<?php echo $pfmasterdetails->pf_empcont; ?>" /></td>
					<td align="left" width="81%"><select name="emyconttype" />
			<option <?php if($pfmasterdetails->pf_empconttype=='Percentage')echo "selected='selected'";?> value="Percentage">Percentage</option>
			<option <?php if($pfmasterdetails->pf_empconttype=='Amount')echo "selected='selected'";?> value="Amount">Amount</option>		
			</select>&nbsp;<font color="#FF0000"><b>*</b></font></td>
				  </tr>
				</table>
			</td>
		  </tr>
		  <tr>
			<td align="left" class="adminfont">Year </td>
			<td align="left">:</td>
			<td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">                                      
                                        <tr>                                          
                                          <td width="16%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                               
                                                <td align="left"><input name="dc1"  class="plain" 
												value="<?php if (isset($pfmasterdetails->pf_from_date)) {	echo func_date_conversion("Y-m-d","d/m/Y",$pfmasterdetails->pf_from_date);}else{echo $dc1; } ?>" size="12" onfocus="this.blur()" readonly="readonly" /></td>
                                                <td align="left"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fStartPop(document.allowenceform.dc1,document.allowenceform.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a></td>
                                              </tr>
                                          </table></td>                                    
									      <td align="center" valign="middle" width="14%">&nbsp;--&nbsp;</td>
										  <td align="left" width="70%"><table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              
                                              <td align="left"><input class="plain" name="dc2" value="<?php echo formatDBDateTOCalender($pfmasterdetails->pf_to_date);?>" size="12" onfocus="this.blur()" readonly="readonly" /></td>
                                              <td align="left" ><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fEndPop(document.allowenceform.dc1,document.allowenceform.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a>&nbsp;<font color="#FF0000"><b>*</b></font></td>
                                            </tr>
                                          </table></td>                                    
                                        </tr>                                     
                                  </table>
				    <iframe width=132 height=142 name="gToday:contrast:agenda.js" id="gToday:contrast:agenda.js" src="<?php echo JS_PATH ?>/DateRange/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe></td>
		  </tr>
		  <tr>
		    <td colspan="3" class="adminfont" align="center"><input type="submit" name="saveallowance" value="Update" class="bgcolor_02" style="cursor:pointer;"/>&nbsp;<input type="reset" name="reset" value="Reset" class="bgcolor_02" style="cursor:pointer;"/>&nbsp;</td>
		  </tr>
		  <tr>
		    <td colspan="3" class="adminfont" align="center">&nbsp;</td>
	      </tr>		 
		</table>
		</form>
		<?php } else { ?>
		<form action="" method="post" name="allowenceform">
		<table width="90%" border="0" cellspacing="2" cellpadding="2">
		 <tr>
                        <td align="left" class="adminfont">Department</td>
                        <td >:</td>
                   		<td colspan="4" align="left"> 
						<select name="st_department" onchange="JavaScript:document.allowenceform.submit();" style="width:120px;">
						<option value="">-Select-</option>
							<?php foreach($getdeptlist as $eachrecord) { ?>
						<option value="<?php echo $eachrecord[es_departmentsid];?>" <?php echo ($eachrecord[es_departmentsid]==		 							                                  $st_department)?"selected":""?>  ><?php echo $eachrecord[es_deptname];?></option>
			<?php } ?>
			             </select>&nbsp;<font color="#FF0000"><b>*</b></font>
		    </td>
          </tr>
		  <tr>
			<td align="left" width="28%" class="adminfont">Post </td>
			<td align="left" width="1%">:</td>
			<td align="left" width="71%">
				<?php $allpostsarr=getallPosts($st_department);?>
			<select name="seldepartment[]" multiple="multiple" style="width:120px;">
			<?php 
			
			foreach($allpostsarr as $eachallpost)
			{ ?>
			<option value="<?php echo $eachallpost['es_deptpostsid'];?>"><?php echo postname($eachallpost['es_deptpostsid']);?></option>
			<?php } ?>
			</select>&nbsp;<font color="#FF0000"><b>*</b></font></td>
		  </tr>	 
		   <tr>
			<td align="left" class="adminfont">Employer Contribution</td>
			<td align="left">:</td>
			<td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td align="left" width="19%"><input name="employeercont" type="text" size="6" maxlength="8" value="<?php echo $employeercont; ?>" /></td>
					<td align="left" width="81%"><select name="empconttype" />
					<option value="Percentage">Percentage</option>
					<option value="Amount">Amount</option>			
					</select>&nbsp;<font color="#FF0000"><b>*</b></font></td>
				  </tr>
				</table>
			</td>
		  </tr>
		   <tr>
			<td align="left" class="adminfont">Employee Contribution</td>
			<td align="left">:</td>
			<td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td align="left" width="19%"><input name="employeecont" type="text" size="6" maxlength="8" value="<?php echo $employeecont; ?>" /></td>
					<td align="left" width="81%">
						<select name="emyconttype" />
						<option value="Percentage">Percentage</option>
						<option value="Amount">Amount</option>			
						</select>&nbsp;<font color="#FF0000"><b>*</b></font>
					</td>
				  </tr>
				</table>
			</td>
		  </tr>
		  <tr>
			<td align="left" class="adminfont">Year </td>
			<td align="left">:</td>
			<td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">                                      
                                        <tr>                                          
                                          <td width="16%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                                
                                                <td align="left"><input class="plain" name="dc1" value="<?php //echo formatDBDateTOCalender($leavemasterdetails->alw_fromdate);?>" size="12" onfocus="this.blur()" readonly="readonly" /></td>
                                                <td align="left"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fStartPop(document.allowenceform.dc1,document.allowenceform.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a></td>
                                              </tr>
                                          </table></td>                                    
									      <td align="center" valign="middle" width="14%">&nbsp;--&nbsp;</td>
										  <td align="left" width="70%"><table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                             
                                              <td align="left" ><input class="plain" name="dc2" value="<?php //echo formatDBDateTOCalender($leavemasterdetails->alw_todate);?>" size="12" onfocus="this.blur()" readonly="readonly" /></td>
                                              <td align="left"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fEndPop(document.allowenceform.dc1,document.allowenceform.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a>&nbsp;<font color="#FF0000"><b>*</b></font></td>
                                            </tr>
                                          </table></td>                                    
                                        </tr>                                     
                                  </table>
				    <iframe width=132 height=142 name="gToday:contrast:agenda.js" id="gToday:contrast:agenda.js" src="<?php echo JS_PATH ?>/DateRange/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe></td>
		  </tr>
		  <tr>
		    <td colspan="3" class="adminfont" align="center">
			<?php if(in_array('11_16',$admin_permissions)){?>

<input type="submit" name="saveallowance" value="Save" class="bgcolor_02" style="cursor:pointer;"/>&nbsp;<input type="reset" name="reset" value="Reset" class="bgcolor_02" style="cursor:pointer;"/>&nbsp;
	    

<?php }?>
			
			</td>
			  </tr>
		  <tr>
		    <td colspan="3" class="adminfont" align="center">&nbsp;</td>
	      </tr>		 
		</table>
		</form>
		<?php } ?>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
					<td align="center" class="adminfont" colspan="2">Academic Year</td>
				      <form action="" method="post">
					<td align="center" class="narmal" colspan="2">
						<select name="pre_year">
						<?php  foreach($school_details_res as $each_record) { ?>
						<option value="<?php echo $each_record['es_finance_masterid']; ?>" <?php if ($each_record['es_finance_masterid']==                        $pre_year) { echo "selected"; }?>><?php echo displaydate($each_record['fi_startdate'])." To ".displaydate($each_record[                        'fi_enddate']); ?>						</option>
						<?php } ?>
						</select>					</td>
					<td align="center" class="adminfont" colspan="2">
					<input type="submit" name="pf_school_year" class="bgcolor_02" value="Submit" style="cursor:pointer;"/>					                    </td></form>
		  </tr>  
		  <tr class="bgcolor_02" height="25">
			<td width="11%" align="left" class="admin">S&nbsp;No</td>
			<td width="17%" align="left" class="admin">Department</td>
			<td width="17%" align="left" class="admin">Post</td>
			<td width="29%" align="left" class="admin">Employer&nbsp;Contribution</td>
			<td width="26%" align="left" class="admin">Employee&nbsp;Contribution</td>			
			<td width="17%" align="center" class="admin">Action</td>
		  </tr>
		  <?php 
			$pfmaster_rownum = 1;
			if(count($pfmaster_det)>0) {
			foreach ($pfmaster_det as $pfmaster_eachrecord){
			$zibracolor = ($pfmaster_rownum%2==0)?"even":"odd";
			?>	
		  <tr class="<?php echo $zibracolor;?>">
			<td align="left" class="narmal"><?php $pfmaster_rownum; echo $pfmaster_rownum++; ?></td>
			<td align="left" class="narmal"><?php echo deptname($pfmaster_eachrecord->pf_dept); ?></td>
			<td align="left" class="narmal"><?php echo postname($pfmaster_eachrecord->pf_post); ?></td>
			<td align="left" class="narmal"><?php echo $pfmaster_eachrecord->pf_empycont; if($pfmaster_eachrecord->pf_empyconttype =='Percentage') { echo "%";} ?></td>
			<td align="left" class="narmal"><?php echo $pfmaster_eachrecord->pf_empcont; if($pfmaster_eachrecord->pf_empconttype =='Percentage') { echo "%";} ?></td>			
			<td align="center" class="narmal">
			<?php 
			$today = $_SESSION['eschools']['from_finance'];
			$comingdate = $pfmaster_eachrecord->pf_to_date;
			$day = (strtotime($today) - strtotime($comingdate)) / (60 * 60 * 24);
			if($day < 0){?>
		
		<?php if(in_array('11_17',$admin_permissions)){?>


<a href="?pid=29&action=pfmaster&elid=<?php echo $pfmaster_eachrecord->es_pfmasterId; ?>" title="Edit">
			<img src="images/b_edit.png" border="0" /></a>&nbsp;
			
<?php }?>
		<?php if(in_array('11_18',$admin_permissions)){?>


			<a href="javascript:del_pfmaster(<?php echo $pfmaster_eachrecord->es_pfmasterId; ?>)" title="Delete">
			<img src="images/b_drop.png" border="0" /></a>

<?php }?>
		
			<?php } ?>
			</td>
		  </tr>
		  <?php 
		  $rownum++;
		  } ?>
		   <tr>
			<td colspan="5" align="center" class="narmal"><?php paginateexte($start, $q_limit, $no_rows, "&action=loanmaster");?></td>
		  </tr>
		  <?php
		   } else { ?>
		   <tr>
			<td colspan="5" align="center" class="narmal">No PF Added Till Now </td>
		  </tr>
		  <?php } ?>		
		  
		  <tr>
		    <td colspan="5" align="center" class="narmal">&nbsp;</td>
	      </tr>
		</table>
		</td>
		<td width="1" class="bgcolor_02"></td>
	  </tr>	  
	  <tr>
		<td height="1" colspan="3" class="bgcolor_02"></td>
	  </tr>
	</table>
<?php
	}		
// End of Pf Master	
?>
<script type="text/javascript">
	function del_leavemaster(adminid){
	if(confirm("Are you sure you want to delete ?")){
		document.location.href = '?pid=29&action=deleteleavemaster&lid='+adminid;
	}
	}
	function del_allowencemaster(adminid)
	{
	if(confirm("Are you sure you want to delete ?")){
		document.location.href = '?pid=29&action=deleteallowencemaster&lid='+adminid;
	}
	}
	function del_deductionsmaster(adminid)
	{
	if(confirm("Are you sure you want to delete ?")){
		document.location.href = '?pid=29&action=deletedeductionsmaster&lid='+adminid;
	}
	}	
	function del_loanmaster(adminid)
	{
	if(confirm("Are you sure you want to delete ?")){
		document.location.href = '?pid=29&action=deleteloanmaster&lid='+adminid;
	}
	}
	function del_taxmaster(adminid)
	{
	if(confirm("Are you sure you want to delete?")){
		document.location.href = '?pid=29&action=deletetaxmaster&lid='+adminid;
	}
	}
	function del_pfmaster(adminid)
	{
	if(confirm("Are you sure you want to delete ?")){
		document.location.href = '?pid=29&action=deletepfmaster&lid='+adminid;
	}
	}
	var gblvar = 1;
	function DelRow1() //This function will delete the last row
	{
		if(gblvar == 1)
			return;
		var prevrow = document.getElementById("addgrolis");
		prevrow.deleteRow(prevrow.rows.length-1);
		gblvar = gblvar - 1;
	}
	function AddRow1() //This function will add extra row to provide another file
	 {
	  var prevrow = document.getElementById("addgrolis");
	  var newrowiddd = parseInt(prevrow.rows.length) + 2 ;
	  var tmpvar = gblvar;
	  var newrow = prevrow.insertRow(prevrow.rows.length);
	  newrow.id = newrow.uniqueID; // give row its own ID
	  
	  var newcell; // an inserted row has no cells, so insert the cells
	  newcell = newrow.insertCell(0);
	  newcell.id = newcell.uniqueID;
	  newcell.innerHTML = "<table width='100%' border='0' cellpadding='0' cellspacing='2'><tr height='25'><td align='left' width='20%'><input type='text' name='slabrateto[]' /></td><td align='left' width='19%'><input type='text' name='slabratefrom[]' /></td><td align='left' width='23%'><input type='text' name='rateamount[]' /></td><td align='center'><a href='javascript:AddRow1()' title='Add'><img src='images/add_16.png' border='0' /></a>&nbsp;<a href='javascript:DelRow1()' title='Delete'><img src='images/b_drop.png' border='0' /></a></td></tr></table>";
	  
	  gblvar = tmpvar + 1;
	  }	
</script>
<script type="text/javascript" >
	function ValidateIntegerVal( fldid ) //This function will add extra row to provide another file
	{
		if( fldid != "") {
			 crosschecknegetive( fldid,0 );
		}
	}
	function ValidatePercent( fldid ) //This function will add extra row to provide another file
	{
		if( fldid != "") {
			 crosschecknegetive( fldid,2 );
		}
		if(document.getElementById("allonctype").value=="percentage") {
			if(parseFloat(document.getElementById( fldid ).value) > 100)
				document.getElementById( fldid ).value = "100.00";
		}
	}
function ValidateCharges( fldid ) //This function will add extra row to provide another file
	{

	 	var mntbl = document.getElementById("maintblrows");
		var tot_nmrws = parseInt(mntbl.rows.length);
		//alert(fldid);
		if( fldid != "") {
			 crosschecknegetive( fldid,0 );
		}

		for( t=1; t <= tot_nmrws; t++ ){
			var to_fld = "slabrateto["+t+"]";
			var to_fld_val = document.getElementById(to_fld).value;
			var frm_fld = "slabratefrom["+t+"]";
			var frm_fld_val = document.getElementById(frm_fld).value;
			var nxt_t = t+1;
			var nxt_frm_fld = "slabratefrom["+nxt_t+"]";
			
			if(to_fld_val=="" || isNaN(to_fld_val)) { alert("Invalid Entry for ‘From’ and Invalid Entry for ‘To’"); return false }
			else if(parseInt(to_fld_val) <= parseInt(frm_fld_val)) { alert("The Value of 'To' ( "+t+" ) should be greater than "+ parseInt(frm_fld_val)); document.getElementById(to_fld).focus(); return false; }
			
			if(to_fld_val!="" && t!=tot_nmrws)
				document.getElementById(nxt_frm_fld).value = parseInt(to_fld_val) + 1;
			
		}
		return true;
	}
	function AddNewRow() //This function will add extra row to provide another file
	 {
	 	var maintbl = document.getElementById("maintblrows");
		var maintbl_rows = parseInt(maintbl.rows.length);
		
		var prev_to_fld = "slabrateto["+maintbl_rows+"]";
		
		var newrowiddd = parseInt(maintbl_rows + 1);
		
		var newrow = maintbl.insertRow(maintbl.rows.length);
		newrow.id = newrow.uniqueID; // give row its own ID
		
		var newcell; // an inserted row has no cells, so insert the cells
		newcell = newrow.insertCell(0);
		newcell.colSpan = 4;
		newcell.id = newcell.uniqueID;
		if( document.getElementById(prev_to_fld).value!="" && !isNaN(document.getElementById(prev_to_fld).value) )
			var prev_to_val = parseInt(document.getElementById(prev_to_fld).value) + 1;
		else var prev_to_val = "";
		
		newcell.innerHTML =  '<table width="100%" border="0" cellpadding="0" cellspacing="0"><tr><td align="center" width="25%" height="25"><input type="text" name="slabratefrom['+newrowiddd+']" id="slabratefrom['+newrowiddd+']" value="'+prev_to_val+'" style="width:80px; text-align:center;" readonly /></td><td align="center" width="25%"><input type="text" name="slabrateto['+newrowiddd+']" id="slabrateto['+newrowiddd+']" onblur="return ValidateCharges(this.id);" style="width:80px; text-align:center;" /></td><td align="center" width="25%"><input type="text" name="rateamount['+newrowiddd+']" id="rateamount['+newrowiddd+']" onblur="return ValidatePercent(this.id);" style="width:80px; text-align:center;" /></td><td align="center" width="25%"><a href="javascript:AddNewRow()" title="Add New Row"><img src="images/add_16.png" border="0" /></a>&nbsp;<a href="javascript:DeleteLastRow()" title="Delete Last Row"><img src="images/b_drop.png" border="0" /></a></td></tr></table>';
	}
	
	function DeleteLastRow() //This function will delete the last row
	{
		var maintbl = document.getElementById("maintblrows");
		var maintbl_rows = parseInt(maintbl.rows.length);
		if(maintbl_rows == 1) {
			alert("You can not Delete more Rows")
			return;
		}
		var prevrow = document.getElementById("maintblrows");
		maintbl.deleteRow(maintbl.rows.length-1);
	}
	
	function dec_nonnegetive_format(pnumber, decimals, nonnegetive)
	{
		if (isNaN(pnumber)) { return 0};
		if (pnumber=='') { return 0};
		if (nonnegetive!='' && pnumber < 0) { return 0};
		
		var result = 0;
		if(pnumber!="") {
			var actualnum = parseFloat(pnumber);
			var actdecimals = parseInt(decimals);
			result = actualnum.toFixed(actdecimals);
		}
		return result;
	}
	
	function crosschecknegetive(fldid, decimals) {
		var fldval = document.getElementById(fldid).value;
		var fldnewval = dec_nonnegetive_format(fldval, decimals, "yes");
		document.getElementById(fldid).value = fldnewval;
	}
</script>