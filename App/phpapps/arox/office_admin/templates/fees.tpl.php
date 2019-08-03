<?php
/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}

?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
	 </tr>
	<tr>
		<td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Fee Structure</span></td>
	</tr>

	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="left" valign="top">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr><td align="left" valign="top">&nbsp;</td></tr>
				<tr>
					<td height="450" align="left" valign="top">
						<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
							<tr>
								<td height="23" align="left" valign="top">
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td valign="middle" class="adminfont" align="center">
<?php if ($action=='edit') { ?>
<form method="post" action="" name="viewform">
<table width="544" border="0" cellspacing="2" cellpadding="0">
    <tr>
    <td >Fees Type </td>
    <td >Total Amount </td>
  </tr>
  
  <tr>
    <td width="262"  class="narmal" >Class</td>
	<td width="282">Std:<?php echo $es_feeslist[0]->fee_class ?></td>
  </tr>
  <tr>
    <td  class="narmal">Tution</td>
    <td><input name="fee_tution" type="text" value="<?php echo $es_feeslist[0]->fee_tution ?>" /></td>
  </tr>
  <tr>
    <td class="narmal">Library</td>
    <td><input name="fee_library" type="text" value="<?php echo $es_feeslist[0]->fee_library ?>" /></td>
  </tr>
  <tr>
    <td  class="narmal">Transportation</td>
    <td><input name="fee_transportation" type="text" value="<?php echo $es_feeslist[0]->fee_transportation ?>" /></td>
  </tr>
    <tr>
    <td  class="narmal">Hostel</td>
    <td><input name="fee_hostel" type="text" value="<?php echo $es_feeslist[0]->fee_hostel ?>" /></td>
  </tr>
  <tr>
    <td class="narmal">Mess</td>
    <td><input name="fee_mess" type="text" value="<?php echo $es_feeslist[0]->fee_mess ?>" /></td>
  </tr>
   <tr>
    <td  class="narmal">Book</td>
    <td><input name="fee_book" type="text" value="<?php echo $es_feeslist[0]->fee_book ?>" /></td>
  </tr>
   <tr>
    <td  class="narmal">Deposit</td>
    <td><input name="fee_deposite" type="text" value="<?php echo $es_feeslist[0]->fee_deposite ?>" /></td>
  </tr>
  <tr>
    <td  class="narmal">Instalments</td>
    <td><input name="fee_instalments" type="text" value="<?php echo $es_feeslist[0]->fee_instalments ?>" /></td>
  </tr>
   <tr>
    <td  class="narmal">Fine</td>
    <td><input name="fee_fine" type="text" value="<?php echo $es_feeslist[0]->fee_fine ?>" /></td>
  </tr>
  <tr>
    <td  class="narmal">Additional Fees -1</td>
    <td><input name="fees1" type="text" value="<?php echo $es_feeslist[0]->fees1 ?>" /></td>
  </tr>
  <tr>
    <td  class="narmal">Additional Fees -2</td>
    <td><input name="fees2" type="text" value="<?php echo $es_feeslist[0]->fees2 ?>" /></td>
  </tr>
   <tr>
    <td  class="narmal">Additional Fees -3</td>
    <td><input name="fees3" type="text" value="<?php echo $es_feeslist[0]->fees3 ?>" /></td>
  </tr>	  	
     <tr>
    <td ><strong>Total</strong></td>
    <td><?php echo $feetotal ?></td>
  </tr>
  <tr><td align="right">
  
<?php //if ($action=="edit")?>
<input name="update" type="submit" class="bgcolor_02" value="update" />
						
  &nbsp;&nbsp;
  
  <input name="back" type="submit" class="bgcolor_02" value="Back" />
  &nbsp;
  </td>
  </tr>
  
</table>
</form>
<?php }
if($action=='view')
{ ?>
<form method="post" action="" name="viewform"><table width="539" border="0" cellspacing="2" cellpadding="0" >
    <tr class="bgcolor_02" height="25" >
    <td class="admin" style="padding-left:5px">Fees Type </td>
    <td class="admin" style="padding-left:5px" >Total Amount </td>
  </tr>
  
  <tr>
    <td width="237"  class="narmal" >Class</td>
	<td width="296">Std:<?php echo $es_feeslist[0]->fee_class ?></td>
  </tr>
  <tr>
    <td  class="narmal">Tution</td>
    <td><?php echo $es_feeslist[0]->fee_tution ?></td>
  </tr>
  <tr>
    <td class="narmal">Library</td>
    <td><?php echo $es_feeslist[0]->fee_library ?></td>
  </tr>
  <tr>
    <td  class="narmal">Transportation</td>
    <td><?php echo $es_feeslist[0]->fee_transportation ?></td>
  </tr>
    <tr>
    <td  class="narmal">Hostel</td>
    <td><?php echo $es_feeslist[0]->fee_hostel ?></td>
  </tr>
  <tr>
    <td class="narmal">Mess</td>
    <td><?php echo $es_feeslist[0]->fee_mess ?></td>
  </tr>
   <tr>
    <td  class="narmal">Book</td>
    <td><?php echo $es_feeslist[0]->fee_book ?></td>
  </tr>
   <tr>
    <td  class="narmal">Deposit</td>
    <td><?php echo $es_feeslist[0]->fee_deposite ?></td>
  </tr>
  <tr>
    <td  class="narmal">Instalments</td>
    <td><?php echo $es_feeslist[0]->fee_instalments ?></td>
  </tr>
   <tr>
    <td  class="narmal">Fine</td>
    <td><?php echo $es_feeslist[0]->fee_fine ?></td>
  </tr>
  <tr>
    <td  class="narmal">Additional Fees -1</td>
    <td><?php echo $es_feeslist[0]->fees1 ?></td>
  </tr>
  <tr>
    <td  class="narmal">Additional Fees -2</td>
    <td><?php echo $es_feeslist[0]->fees2 ?></td>
  </tr>
   <tr>
    <td  class="narmal">Additional Fees -3</td>
    <td><?php echo $es_feeslist[0]->fees3 ?></td>
  </tr>	  	
     <tr>
    <td ><strong>Total</strong></td>
    <td><?php echo $feetotal ?></td>
  </tr>
  <tr>
  <td align="right"><input name="back" type="submit" class="bgcolor_02" value="Back" /></td>
  </tr>
</table></form>
<?php
}
if($action=='fee_list')
{
?>
								<!--Fetching User List-->
                                  <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                    <tr class="bgcolor_02">
                                      <td width="15%" height="25"  align="center" class="admin">Class</td>
									   <td width="27%" height="25" class="admin" align="center">Admission Fee</td>
									    <td width="28%" height="25" class="admin" align="center">Hostel</td>
									    <td width="30%" height="25" class="admin" align="center">Action </td>
                                    </tr>
<?php 
	
	$rownum = 1;
	foreach ($es_feeslist as $eachrecord){
		$zibracolor = ($rownum%2==0)?"even":"odd";
	
	?>			
							<tr class="<?php echo $zibracolor;?>">	 
										<td class="narmal" align="center" >Std.<?php echo $eachrecord->fee_class; ?></td>
										<td class="narmal" align="center"><?php echo $eachrecord->fee_tution; ?></td>
										<td class="narmal" align="center"><?php echo $eachrecord->fee_hostel; ?></td>
										<td class="narmal" align="center"><a href="<?php echo buildurl(array('pid'=>16, 'action'=>'edit', 'fid'=>$eachrecord->es_feestructureId));?>">Edit</a> - <a href="<?php echo buildurl(array('pid'=>16, 'action'=>'view', 'fid'=>$eachrecord->es_feestructureId));?>">View</a></td>
									</tr>
<?php
	$rownum++;	
	}
?>
									
                                  </table>
<?php 
			
	} //End of Fetching User List 
?>
							    </td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td height="10" align="left" valign="top"></td>
                        </tr>
                        <tr>
                          <td align="left" valign="top"></td>
                        </tr>                        
                    </table></td>
              </tr>
          </table></td>
                <td width="1" class="bgcolor_02"></td>
              
			  
  </tr>
              
	<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>
</table>
