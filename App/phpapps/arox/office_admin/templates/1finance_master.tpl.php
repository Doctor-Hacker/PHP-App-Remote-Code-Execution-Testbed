<?php 
/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
// Creating School Details
if($action == 'school_details') { ?>
<style type="text/css">
<!--
.style1 {color: #333333}
-->
</style>

<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" >
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">School / College Details</span></td>
              </tr>
               <tr>
                <td width="1" class="bgcolor_02"></td>
                <td  align="center" valign="top">&nbsp;
              <table width="95%" border="1" class="tbl_grid" cellspacing="0" cellpadding="2">
					<tr class="bgcolor_02">
						<td align="left">S&nbsp;NO</td>
					  <td align="left">Name</td>
						<td align="left">Financial Year</td>
						<td align="left">Academic Year</td>
						<td align="left" >Address</td>
						
					</tr>
					<?php
					$sno = 1;
					 
					 foreach ($get_school_details as $each_school) {
					 
					?>
					<tr <?php if($sno==1){ ?>bgcolor="#FFFFFF" <?php } ?>>
						<td align="left"><?php echo $sno;?></td>
						<td align="left"><?php echo $each_school['fi_schoolname'];?></td>
						<td align="left"><?php echo displaydate($each_school['fi_startdate'])." To <br/>". displaydate($each_school['fi_enddate']);?></td>
						<td align="left"><?php echo displaydate($each_school['fi_ac_startdate'])." To <br/>". displaydate($each_school['fi_ac_enddate']);?></td>
						<td align="left" ><?php echo $each_school['fi_address']."<br/>Phone :".$each_school['fi_phoneno']."<br/>Email:".$each_school['fi_email'];?></td>
						
					</tr>
                    <?php if($sno==1){ ?> 
                    <tr bgcolor="#FFFFFF">
						<td align="right" colspan="5">
						<?php if(in_array('2_2',$admin_permissions)){?><a href="?pid=22&action=school_details&fid=<?php echo $each_school['es_finance_masterid'];?>"  style="text-decoration:none; font-weight:bold; color:#000033;">[ Edit Current Financial Year ]&nbsp;</a><?php }?>
</td>
</tr>
                    <?php } ?>
						
					<?php  
					
						$sno++; 
					} ?>
				</table>&nbsp;</td>
               </td>
                <td align="left" width="1" class="bgcolor_02"></td>
              </tr> 
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin"><?php if(isset($fid) && $fid!=""){ echo "Edit"; } else { echo "Add"; } ?> Financial year</span></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td  align="center" valign="top"><form id="form1" name="schooldetailsform" method="post" action="" enctype="multipart/form-data">
				<table width="95%" border="0" cellspacing="2" cellpadding="2">
				  <tr>
					<td colspan="6"  align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font></td>
				  </tr>
				   <!-- <tr>
					  <td colspan="6" align="left" class="narmal">
							<ul><b><u>NOTE:</u></b>
								<li>Start&nbsp;Date of the Academic Year/Financial year means it is the starting date of the Academic Year/Financial year or Term/Semister of the School and the same with End Date.</li>
						</ul>
			          </td>
				  </tr>-->
				  <?php if(!isset($fid) && $fid==""){ ?>
				   <tr>
					<td align="left"  width="21%" class="narmal">Financial year</td>
					<td align="left" ><strong>:</strong></td>
					<td align="left"  colspan="2" class="narmal"><table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td align="left"  width="61%" class="narmal">Start&nbsp;Date:</td>
					
						<td align="left" width="34%"><input class="plain" name="fi_startdate" value="<?php if(isset($fid) && $fid!="") { echo formatDBDateTOCalender($compdetails_school['fi_startdate']); } ?>" size="12" onfocus="this.blur()" readonly /></td>
						<td align="left" width="25%"><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fStartPop(document.schooldetailsform.fi_startdate,document.schooldetailsform.fi_enddate);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt=""></a></td><td>
						<font color="#FF0000"><b>*</b></font></td>
				 </tr></table></td>
					<td align="left" colspan="2" class="narmal"><table width="94%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" width="61%" class="narmal">End&nbsp;Date:</td>
    <td align="left" width="33%"><input class="plain" name="fi_enddate" value="<?php if(isset($fid) && $fid!="") { echo formatDBDateTOCalender($compdetails_school['fi_enddate']); }?>" size="12" onFocus="this.blur()" readonly></td>
    <td align="left" width="20%"><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fEndPop(document.schooldetailsform.fi_startdate,document.schooldetailsform.fi_enddate);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt=""></a></td><td><font color="#FF0000"><b>*</b></font></td>
  </tr>
</table><iframe width=132 height=142 name="gToday:contrast:agenda.js" id="gToday:contrast:agenda.js" src="<?php echo JS_PATH ?>/DateRange/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe></td>
				  </tr>
				  <tr>
					<td align="left"  width="21%" class="narmal">Academic Year</td>
					<td align="left" ><strong>:</strong></td>
					<td align="left"  colspan="2" class="narmal"><table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td align="left"  width="61%" class="narmal">Start&nbsp;Date:</td>
					
						<td align="left" width="34%"><input class="plain" name="fi_ac_startdate" value="<?php if(isset($fid) && $fid!="") { echo formatDBDateTOCalender($compdetails_school['fi_ac_startdate']); } ?>" size="12" onfocus="this.blur()" readonly /></td>
						<td align="left" width="25%"><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fStartPop(document.schooldetailsform.fi_ac_startdate,document.schooldetailsform.fi_ac_enddate);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt=""></a></td><td>
						<font color="#FF0000"><b>*</b></font></td>
				 </tr></table></td>
					<td align="left" colspan="2" class="narmal"><table width="94%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" width="61%" class="narmal">End&nbsp;Date:</td>
    <td align="left" width="33%"><input class="plain" name="fi_ac_enddate" value="<?php if(isset($fid) && $fid!="") {  echo formatDBDateTOCalender($compdetails_school['fi_ac_enddate']); } ?>" size="12" onFocus="this.blur()" readonly></td>
    <td align="left" width="20%"><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fEndPop(document.schooldetailsform.fi_ac_startdate,document.schooldetailsform.fi_ac_enddate);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt=""></a></td><td><font color="#FF0000"><b>*</b></font></td>
  </tr>
</table></td>
				  </tr>
                  <?php } ?>
				  <tr>
					<td align="left" class="narmal">School / College Name</td>
					<td align="left"><strong>:</strong></td>
					<td align="left" colspan="2"><input type="text" name="fi_schoolname" value="<?php echo $compdetails_school['fi_schoolname']; ?>" /><font color="#FF0000"><b>*</b></font></td>
					<td align="left" width="2%">&nbsp;</td>
					<td align="left" width="40%">&nbsp;</td>
				  </tr>
				  <tr>
					<td align="left" class="narmal">Address</td>
					<td align="left"><strong>:</strong></td>
					<td align="left" colspan="2"><input type="hidden" name="fi_currency" value="INR" /><input type="hidden" name="fi_symbol" value="Rs" /><textarea name="fi_address" ><?php echo $compdetails_school['fi_address']; ?></textarea><font color="#FF0000"><b>*</b></font></td>
					<td align="left" width="2%">&nbsp;</td>
					<td width="40%" rowspan="8" align="center"><?php
					if($compdetails_school['fi_school_logo']!=""){
					 
					echo displayimage("images/school_logo/".$compdetails_school['fi_school_logo'], "100"); 
					}
					?></td>
				  </tr>
                  <tr>
				    <td align="left" class="narmal"><span id="internal-source-marker_0.1192490060995729"> </span><span id="internal-source-marker_0.">Affiliation</span> Details&nbsp;</td>
				    <td align="left"><strong>:</strong></td>
				    <td align="left" colspan="2"><input type="text" name="fi_endclass" value="<?php echo $compdetails_school['fi_endclass']; ?>" /></td>
				    <td align="left">&nbsp;</td>
			      </tr>
				 			  
				  <tr>
				    <td align="left" class="narmal">E-mail&nbsp;</td>
				    <td align="left"><strong>:</strong></td>
				    <td align="left" colspan="2"><input type="text" name="fi_email" value="<?php echo $compdetails_school['fi_email']; ?>" /><font color="#FF0000"><b>*</b></font></td>
				    <td align="left">&nbsp;</td>
			      </tr>
				  <tr>
				    <td align="left" class="narmal">Phone Number</td>
				    <td align="left"><strong>:</strong></td>
				    <td align="left" colspan="2"><input type="text" name="fi_phoneno" value="<?php echo $compdetails_school['fi_phoneno']; ?>" />
			        <font color="#FF0000"><b>*</b></font></td>
				    <td align="left">&nbsp;</td>
			      </tr>	
				   <tr>
				    <td align="left" class="narmal">Web Site Url</td>
				    <td align="left"><strong>:</strong></td>
				    <td align="left" colspan="2"><input type="text" name="fi_website" value="<?php echo $compdetails_school['fi_website']; ?>" /></td>
				    <td align="left">&nbsp;</td>
			      </tr>	
				<!--  <tr>
				    <td align="left" class="narmal">Starting Balance </td>
				    <td align="left"><strong>:</strong></td>
				    <td align="left" colspan="2"><input type="text" name="fi_initialbalance" value="<?php //echo $compdetails['fi_initialbalance']; ?>" />
			        <font color="#FF0000"><b>*</b></font></td>
				    <td align="left">&nbsp;</td>
			      </tr>	-->
				  <tr>
				    <td align="left" class="narmal"> Logo</td>
				    <td align="left"><strong>:</strong></td>
				    <td align="left" colspan="4"><input type="file" name="fi_school_logo" />
			        <font color="#FF0000"><b>*</b></font><input type="hidden" name="oldlogoimage" value="<?php echo $compdetails_school['fi_school_logo']; ?>" /></td>				    
			      </tr>				
				  <tr>
				    <td align="left">&nbsp;</td>
				    <td align="left"></td>
				    <td align="left" colspan="2">(Upload image of size 100 X 100)</td>
				    <td align="left">&nbsp;</td>
				    <td align="left">&nbsp;</td>
			      </tr>
				  <tr>
				    <td align="left">&nbsp;</td>
				    <td align="left"></td>
				    <td align="left" colspan="2">
					<?php if(in_array('2_1',$admin_permissions)){?><input type="submit" class="bgcolor_02" name="Submit" value="Submit" />&nbsp;<input type="reset" name="Reset" class="bgcolor_02" value="Reset" /><?php }?>
</td>
				    <td align="left">&nbsp;</td>
				    <td align="left">&nbsp;</td>
			      </tr>
				  <tr>
				    <td align="left">&nbsp;</td>
				    <td align="left">&nbsp;</td>
				    <td align="left" width="5%">&nbsp;</td>
				    <td align="left" width="32%">&nbsp;</td>
				    <td align="left">&nbsp;</td>
				    <td align="left">&nbsp;</td>
			      </tr>
				</table>
                </form>	
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<form action="<?php echo buildurl(array('pid'=>22));?>" method="post" />
					 <tr>
				    <td align="left">&nbsp;<span class="style1">&nbsp;</span></td>
				    <td align="left"></td>
				    <td align="left" colspan="2"><input type="submit" class="bgcolor_02" name="classSubmit" value="Add Class/Subject" />
					<input type="submit" class="bgcolor_02" name="examSubmit" value="Add  Exams" />
					<input type="submit" class="bgcolor_02" name="feeSubmit" value="Add Fees" />
					</td>
				    <td align="left">&nbsp;</td>
				    <td align="left">&nbsp;</td>
			      </tr>
					</form>
					
				</table>				
				
				
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					
					 <tr>
				    <td align="left"></td>
				    <td align="left"></td>
				    <td align="left" colspan="2"></td>
				    <td align="left">&nbsp;</td>
				    <td align="left">&nbsp;</td>
			      </tr>
				</table>
				</td>
                <td align="left" width="1" class="bgcolor_02"></td>
              </tr>
              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
  </tr>
</table>
<?php 
}

// Creating Multiple Groups 
if($action == 'master_group') { ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02" >&nbsp;&nbsp;<span class="admin">Create Account Groups</span></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
      <td  align="center" valign="top">
				<form id="form2" name="schgrops" method="post" action="">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				
				
				 <tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
			    </tr>
				  <tr class="bgcolor_02" height="25" >
					<td width="10%" class="admin" align="center">S&nbsp;No</td>
					<td width="30%" class="admin" align="center">Group&nbsp;Name</td>
					<td width="30%" class="admin" align="center">Under&nbsp;Group</td>
					<td width="30%" class="admin" align="center">Action</td>
				  </tr>
				  <?php		$rownum = 1;
							 foreach ($obj_grouplistarr as $eachrecord){ ?>
							<tr height="25">
							<?php if (isset($fgid) && $fgid == $eachrecord->es_fa_groupsId) {  ?>
          
							  <td  align="center" width="10%" class="narmal"> <?php echo $rownum ;?></td>
							  
							  <td align="center" width="30%" class="narmal" valign="middle"><?php echo '<input type="text" name="finance_group" value="'.$eachrecord->fa_groupname.'" >'; ?></td>
							   <td align="center" width="30%" class="narmal"><?php echo $eachrecord->fa_undergroup; ?></td>
							  <td align="center" width="30%">
							  <?php if(in_array('12_1',$admin_permissions)){?>

<?php if($eachrecord->fa_display=="0") {?>&nbsp;<a href="javascript:AddRow()" title="Add"><img src="images/add_16.png" border="0" /></a>&nbsp;
							 

<?php }?>
							   <?php if(in_array('12_2',$admin_permissions)){?>


  <a href="javascript:del_group(<?php echo $eachrecord->es_fa_groupsId; ?>)" title="Delete"><img src="images/b_drop.png" border="0" /></a><?php } ?>
   				
<?php }?>
							  
							</td>  
							
							<?php } 	else { ?>
							<td align="center" width="10%" class="narmal"><?php echo $rownum ?></td>
							  <td align="center" width="30%" class="narmal"><?php echo $eachrecord->fa_groupname; ?></td>
							   <td align="center" width="30%" class="narmal"><?php echo $eachrecord->fa_undergroup; ?></td>
							  <td align="center" width="30%"><?php if($eachrecord->fa_display=="0") {?>
							  
						<?php if(in_array('12_1',$admin_permissions)){?>

 <a href="javascript:AddRow()" title="Add"><img src="images/add_16.png" border="0" /></a>&nbsp;
							 

<?php }?>	  
							  
						<?php if(in_array('12_2',$admin_permissions)){?>

  <a href="javascript:del_group(<?php echo $eachrecord->es_fa_groupsId; ?>)" title="Delete"><img src="images/b_drop.png" border="0" /></a><?php } ?>
							

<?php }?>	  
							  
							  
							  
							  
							  
							  <?php /*?><a href="<?php echo buildurl(array('pid'=>'22','action'=>'master_group','fgid'=>$eachrecord->es_fa_groupsId));?>" title="Edit Group"><?php echo editIcon();?></a><?php */?></td>
							<?php }  ?>
						
  </tr>
							
							<?php
							$rownum++;
							 }
							 
							 ?>
                            <tr height="25">
                              <td align="center" width="9%" class="narmal"><?php echo $rownum ?></td>
							  <td width="30%" align="center" valign="middle"><input name="groupname[]" type="text" size="15" /></td>
							   <td width="30%" align="center" valign="middle"><select name="undgroup[]" /><option value="PRIMARY">PRIMARY</option>
							   <?php $finance_group_list = groups_finance();
							   foreach($finance_group_list as $eachgroupind) {
							    ?><option value="<?php echo $eachgroupind['fa_groupname'];?>"><?php echo $eachgroupind['fa_groupname'];?></option>                 
								<?php } ?></select></td>
							  <td align="center" width="31%">
							  <a href="javascript:AddRow()" title="Add">
							  
							  <?php if(in_array('12_1',$admin_permissions)){?>

<img src="images/add_16.png" border="0" /></a>&nbsp;

<?php }?>
<?php if(in_array('12_2',$admin_permissions)){?>

  
							  <a href="javascript:DelRow()" title="Delete"><img src="images/b_drop.png" border="0" /></a>

<?php }?>
							</td>
                  		</tr>
							<tr>
							<td colspan="4" align="center"><table id="uplimg" width="100%" border="0" cellspacing="0" cellpadding="0">
													</table></td></tr>
							<tr height="30"><td colspan="4" align="center">
							<?php if(in_array('12_1',$admin_permissions)){?><input class="bgcolor_02" type="submit" name="savegroups" value="Save Groups" />&nbsp;<input class="bgcolor_02" type="reset" name="reset" value="Reset" /><?php }?>
							</td>
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
<?php } 

if($action == 'ledger') { ?>


<script type="text/javascript">
		
		function newWindowOpen (href) {
		
		       window.open(href,null,  'width=900,height=900,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');
		}
	</script> 

<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Create Account Ledger</span></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td  align="center" valign="top">
				<?php if(isset($gid) && $gid!="")
		{ ?>

				<form name="creatledg" method="post" action="" >
				<table width="100%" border="0" cellspacing="2" cellpadding="2">
				  <tr>
					<td width="24%">&nbsp;</td>
					<td width="1%">&nbsp;</td>
					<td width="75%" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font></td>
				  </tr>
				  <tr class="bgcolor_02" height="22">
					<td colspan="3" class="admin">&nbsp;Create a New Ledger </td>
				  </tr>
				  <tr height="5"><td colspan="3"></td></tr>
				  <tr>
					<td class="narmal" align="left">Name of the Ledger</td>
					<td><strong>:</strong></td>
					<td align="left"><input type="text" name="lg_name" value="<?php if(!$_POST){echo $leavemasterdetails->lg_name; }else{ echo $lg_name;} ?>" />
				    <font color="#FF0000"><b>*</b></font></td>
				  </tr>
				  
				  
	
				  <tr>
					<td class="narmal" align="left">Group Name</td>
					<td><strong>:</strong></td>
					<td align="left"><select name="lg_groupname" >
                      <?php 

	if (count($finance_groups)>0){
		foreach($finance_groups as $eachgroup){
?>
                      <option value="<?php echo $eachgroup['fa_groupname']; ?>" <?php if($leavemasterdetails->lg_groupname==$eachgroup['fa_groupname']) { echo "selected='selected'";  } ?> ><?php echo $eachgroup['fa_groupname']; ?></option>
                      <?php
		}
	}
?>
                    </select></td>
				  </tr>
				  <tr>
					<td class="narmal" align="left">Opening Balance</td>
					<td><strong>:</strong></td>
					<td align="left"><input type="text" name="lg_openingbalance" value="<?php if(!$_POST){echo $leavemasterdetails->lg_openingbalance;}else{echo $lg_openingbalance; } ?>" /></td>
				  </tr>
				    <tr>
					<td class="narmal" align="left">Type</td>
					<td><strong>:</strong></td>
					
			
					
					<td align="left"><select name="lg_amounttype"><option value="credit" <?php if($leavemasterdetails->lg_amounttype=="credit") { echo "selected='selected'";  } ?>>Credit</option>
					
					<option value="debit" <?php if($leavemasterdetails->lg_amounttype=="debit") { echo "selected='selected'";  } ?>>Debit</option>
					</select></td>
				  </tr>	
				   <tr>
		    <td colspan="3" class="adminfont" align="center"><input type="submit" name="Submit" value="Update" class="bgcolor_02" />&nbsp;<input type="reset" name="reset" value="Reset" class="bgcolor_02" />&nbsp;<input type="button" name="back" value="Back" onclick="javascript:history.back();" class="bgcolor_02" /></td>
	      </tr>				  
				  	 
				</table>
				</form>
				
				
		<?php } else { ?>
		<form name="creatledg" method="post" action="" >
		
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td width="24%">&nbsp;</td>
					<td width="1%">&nbsp;</td>
					<td width="75%" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font></td>
				  </tr>
				  <tr class="bgcolor_02" height="22">
					<td colspan="3" align="left" valign="middle" class="admin" width="100%">&nbsp;Create a New Ledger </td>
				  </tr>
				  <tr height="5"><td colspan="3"></td></tr>
				  <tr>
					<td class="narmal" align="left">Name of the Ledger</td>
					<td><strong>:</strong></td>
					<td align="left"><input type="text" name="lg_name" />
				    <font color="#FF0000"><b>*</b></font></td>
				  </tr>
				  <tr>
					<td class="narmal" align="left">Group Name</td>
					<td><strong>:</strong></td>
					<td align="left"><select name="lg_groupname" >
                      <?php 

	if (count($finance_groups)>0){
		foreach($finance_groups as $eachgroup){
?>
                      <option value="<?php echo $eachgroup['fa_groupname']; ?>"><?php echo $eachgroup['fa_groupname']; ?></option>
                      <?php
		}
	}
?>
                    </select></td>
				  </tr>
				  <tr>
					<td class="narmal" align="left">Opening Balance</td>
					<td><strong>:</strong></td>
					<td align="left"><input type="text" name="lg_openingbalance" value="0.00"  /></td>
				  </tr>
				    <tr>
					<td class="narmal" align="left">Type</td>
					<td><strong>:</strong></td>
					<td align="left"><select name="lg_amounttype"><option value="credit">Credit</option><option value="debit">Debit</option></select></td>
				  </tr>		
				   <tr>  
		    <td colspan="3" class="adminfont" align="center">
		<?php if(in_array('12_3',$admin_permissions)){?>

<input type="submit" name="Submit" value="Save" class="bgcolor_02" />

<?php }?>
			</td>
	      </tr>			  
				 		 
		  </table>
				</form>
					<?php } ?>
		
		
				<br />
				<table width="100%" border="0" cellpadding="0" cellspacing="0">
                      <?php if(count($es_ledgerList) > 0 ){ ?>
                      <tr class="bgcolor_02">
             <td width="10%" height="23" align="center" class="admin">S No</td>
                        <td width="17%" align="center"  class="admin">Ledger&nbsp;Name</td>
                        <td width="14%" align="center" class="admin">Group Name</td>
                        <td width="13%" align="center" class="admin" >Balance</td>
		                <td width="14%" align="center" class="admin">&nbsp;Type</td>
                        <td width="14%" align="center" class="admin">&nbsp;<strong>Action</strong></td>
                      </tr>
                      <?php 
											    $rw = 1;
											$slno = $start+1;	
											foreach ($es_ledgerList as $eachrecord){
											 if($rw%2==0)
									$rowclass = "even";
									else
									$rowclass = "odd";
													
									?>
                        <tr class="<?php echo $rowclass;?>">
                        <td height="25" align="center"><?php echo $slno;?></td>
                        <td align="center"><?php echo $eachrecord->lg_name; ?></td>
                        <td align="center"><?php echo $eachrecord->lg_groupname; ?> </td>
                        <td align="center"><?php 
						if($eachrecord->lg_openingbalance>0){
						echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord->lg_openingbalance, 2, '.', '');
						} ?> </td>
					   <td align="center"><?php echo $eachrecord->lg_amounttype; ?></td>
						
						<td align="center" class="narmal"><?php ?>
						<?php if(in_array('12_4',$admin_permissions)){?>

<a href="?pid=22&action=ledger&gid=<?php echo $eachrecord->es_ledgerId; ?>" title="Edit"><img src="images/b_edit.png" border="0" /></a><?php ?>&nbsp;
						

<?php }?>
						
					<?php if(in_array('12_5',$admin_permissions)){?>

<a href="javascript:del_ledger(<?php echo $eachrecord->es_ledgerId; ?>,<?php echo $start; ?>)" title="Delete"><img src="images/b_drop.png" border="0" /></a></td>
						

<?php }?>	
						
						
						
						
						  
                      <?php /*?>  <td align="center"><a href="javascript:del_ledger(<?php echo $eachrecord->es_ledgerId; ?>)" title="Delete"><img src="images/b_drop.png" border="0" /></a></td><?php */?>
                      </tr>
                      <?php        
					      $rw++;
					   $slno++;
					    }	?>
                      <tr>
                        <td colspan="6" align="center"><?php paginateexte($start, $q_limit, $no_rows, "action=".$action."&column_name=".$orderby."&asds_order=".$asds_order) ?>                        </td>
                      </tr>
					  <tr>
								   		<td colspan="6" align="right">
										
										<?php if(in_array('12_11',$admin_permissions)){?>

<input type="button" name="print_ledger" class="bgcolor_02"value="Print" onclick="newWindowOpen('?pid=22&action=printledger')" />

<?php }?>
										
										</td>
			      </tr>
                      <?php
					}	
					
					else {
					       echo "<tr class='bgcolor_02'>";
					       echo "<td align='center'><strong>No records found</strong></td>";
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
<?php } 
if($action== 'printledger'){?>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
                      <?php if(count($es_ledgerList) > 0 ){ ?>
                      <tr class="bgcolor_02">
             <td width="10%" height="23" align="center" class="admin">S No</td>
                        <td width="17%" align="center"  class="admin">Ledger Name</td>
                        <td width="14%" align="center" class="admin">Group Name  </td>
                        <td width="13%" align="center" class="admin" >Balance</td>
		                <td width="14%" align="center" class="admin">&nbsp;Amount Type</td>
                        <td width="14%" align="center" class="admin">Created On<strong></strong></td>
                      </tr>
                      <?php 
											    $rw = 1;
											$slno = $start+1;	
											foreach ($es_ledgerList as $eachrecord){
											 if($rw%2==0)
									$rowclass = "even";
									else
									$rowclass = "odd";
													
									?>
                        <tr class="<?php echo $rowclass;?>">
                        <td height="25" align="center"><?php echo $slno;?></td>
                        <td align="center"><?php echo $eachrecord->lg_name; ?></td>
                        <td align="center"><?php echo $eachrecord->lg_groupname; ?> </td>
                        <td align="center"><?php echo $eachrecord->lg_openingbalance; ?> </td>
					   <td align="center"><?php echo $eachrecord->lg_amounttype; ?></td>
					<td align="center"><?php echo displaydate($eachrecord->lg_createdon); ?></td>	
						
						
                     
                      </tr>
                      <?php        
					      $rw++;
					   $slno++;
					    }	?>
                      
                      <?php
					}	
					
					else {
					       echo "<tr class='bgcolor_02'>";
					       echo "<td align='center'><strong>No records found</strong></td>";
						   echo "</tr>";
					} 
                  ?>
				  
				  
</table>
<?php }
if($action == 'voucher') { ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" align="left" valign="middle" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Manage Voucher </span></td>
              </tr>
			 
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td  align="center" valign="top">
				  <p>&nbsp;</p>
				  <p><strong>Note</strong> <strong>:</strong> You can only update an existing Voucher Type. </p>
				  <table width="62%" height="70" border="1" cellpadding="0" cellspacing="0" class="tbl_grid">
		      <?php if(count($es_voucherList) > 0 ){ ?>
                      <tr class="bgcolor_02">
                        <td width="22%" height="25" align="center" class="admin" >S.no</td>
                        <td width="37%" align="center"  class="admin">Voucher Type</td>
						<td width="37%" align="center"  class="admin">Voucher Mode</td>
                      
                      
                        <!-- <td width="41%" align="center" class="narmal">&nbsp;<strong>Actions</strong></td>-->
  
                      </tr>
                      <?php 
											$rownum = 1;	
											foreach ($es_voucherList as $eachrecord){
													$zibracolor = ($rownum%2==0)?"even":"odd";
									?>
                      <tr align="center"  class="narmal">
                        <td height="25"><?php echo $eachrecord->es_voucherId; ?></td>
                        <td><?php echo $eachrecord->voucher_type; ?></td>
						     <td><?php echo ucwords($eachrecord->voucher_mode); ?></td>
                     
                        
						
     
						
                      </tr>
                      <?php   }	?>
                    <?php /*?>  <tr>
                        <td colspan="5" align="center"><?php //paginateexte($start, $q_limit, $no_rows, "action=".$action."&column_name=".$orderby."&asds_order=".$asds_order) ?>                        </td>
                      </tr><?php */?>
				   
                      <?php
					}	
					
					else {
					       echo "<tr class='bgcolor_02'>";
					       echo "<td align='center'><strong>No records found</strong></td>";
						   echo "</tr>";
					} 
                  ?>

				  
				 
                  </table>				
				<table width="90%" border="0" cellspacing="0" cellpadding="0">
              				  	  <tr height="30"><td colspan="4" align="center">
							<?php if(in_array('12_6',$admin_permissions)){?>

 <form name="voucher" method="post" action="?pid=22&action=edit_voucher" >&nbsp;<input class="bgcolor_02" type="submit" name="upvoucher" value="update" />&nbsp;<input class="bgcolor_02" type="submit" name="back" value="back" /></form>
								 

<?php }?>	  
								  
								  
								  </td></tr>
				  </table>
				</td>
				<td width="1" class="bgcolor_02"></td>
  </tr>				  
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
  </tr>
</table>
<?php } 

if($action == 'edit_voucher') { ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Voucher Edit </span></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td  align="center" valign="top"><br />
				<form name="edit_voucher" method="post" action="" >
				<table width="62%" height="70" border="1" cellpadding="0" cellspacing="0">				
			       <?php if(count($es_voucherList) > 0 ){ ?>
                      <tr class="bgcolor_02">
                      
			              <td width="27%" align="center"   class="admin" >S.no</td>
                        <td width="37%" align="center"   class="admin" >Voucher Type</td>
                        <td width="47%" align="center"   class="admin" >Voucher Mode</td>
                      
                        <!--  <td width="41%" align="center" class="narmal">&nbsp;<strong>Actions</strong></td>-->
  
                      </tr>
                      <?php 
											$rownum = 1;	
											foreach ($es_voucherList as $eachrecord){
													$zibracolor = ($rownum%2==0)?"even":"odd";
									?>
                      <tr align="center"  class="narmal">
                        <td height="25"><?php echo $eachrecord->es_voucherId ; ?><input type="hidden" name="vocturid[]" value="<?php echo $eachrecord->es_voucherId; ?>" /></td>
						<td><input name="vocturetype[]" type="text" value="<?php echo $eachrecord->voucher_type; ?>" /></td>	
						<td><select name="vocturemode[]" >
						<option value="paidin" <?php if($eachrecord->voucher_mode=='paidin') { ?> selected="selected" <?php } ?>>Paid In</option>
						<option value="paidout" <?php if($eachrecord->voucher_mode=='paidout') { ?> selected="selected" <?php } ?>>Paid Out</option>
						</select></td>					
                      </tr>
                      <?php   }	}					
					else {
					       echo "<tr class='bgcolor_02'>";
					       echo "<td align='center'><strong>No records found</strong></td>";
						   echo "</tr>";
					} 
                  ?>
				    
				  
                  </table>
				  <table width="90%" border="0" cellspacing="0" cellpadding="0">
				  	<tr height="30"><td colspan="4" align="center"><input class="bgcolor_02" type="submit" name="submit" value="submit" />&nbsp;<input class="bgcolor_02" type="submit" name="back" value="back" /></td></tr>
				  </table> </form> 			
				<p>&nbsp;</p></td>
                <td width="1" class="bgcolor_02"></td>
              </tr>              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
  </tr>
</table>
<?php }
?>
	<script type="text/javascript" language="javascript1.5">
		var gblvar = 1;		
		

	
	
	</script>
<script type="text/javascript">
function showotherfielddf(ch)
{
//var ch=document.form1.fi_symbol.selectedIndex.value;
//alert(ch.value);
      if(ch.value=='other'){
	  document.getElementById("othdivid").style.display="inline";       
	   }
       else{
       document.getElementById("othdivid").style.display="none";
       } 
}
</script>

<script type="text/javascript">
function del_ledger(adminid,start){
	if(confirm(" Are you sure you want to  delete Ledger?")){
		document.location.href = '?pid=22&action=deleteledger&gid='+adminid+'&start='+start;
	}
	}
</script>