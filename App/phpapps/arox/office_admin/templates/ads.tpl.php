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
  <tr><td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp; Add New</strong></td></tr>
  <tr>
	<td width="1" class="bgcolor_02"></td>
	<td align="left" valign="top">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr><td align="left" valign="top">&nbsp;</td></tr>
			<tr>
		<td align="left" valign="top"><table width="100%" border="0" cellspacing="3" cellpadding="0">
		  <tr>
			<td width="26%" align="right" class="narmal">Name</td>
			<td width="4%" align="center">:</td>
			<td width="31%"><input type="text" name="textfield" /></td>
			<td width="39%">&nbsp;</td>
		  </tr>
		  <tr>
			<td align="right" class="narmal">&nbsp;&nbsp;&nbsp;&nbsp;Mode Of Ads </td>
			<td align="center">:</td>
			<td><input type="text" name="textfield2" /></td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td align="right" class="narmal">&nbsp;&nbsp;Posted Date &nbsp;&nbsp;</td>
			<td align="center">:</td>
			<td><input type="text" name="textfield3" /></td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td align="right" class="narmal">Details</td>
			<td align="center">:</td>
			<td><input type="text" name="textfield4" /></td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td align="right" class="narmal">Action</td>
			<td align="center">:</td>
			<td><input type="text" name="textfield5" /></td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td align="right" class="narmal">&nbsp;</td>
			<td align="center">&nbsp;</td>
			<td height="50"><input name="Submit" type="submit" class="bgcolor_02" value="Submit" /></td>
			<td>&nbsp;</td>
		  </tr>
		</table></td>
	  </tr>
	  <tr>
		<td align="left" valign="top">&nbsp;</td>
	  </tr>
	</table></td>
	<td width="1" class="bgcolor_02"></td>
  </tr>
  
  <tr>
	<td height="1" colspan="3" class="bgcolor_02"></td>
	</tr>
</table>