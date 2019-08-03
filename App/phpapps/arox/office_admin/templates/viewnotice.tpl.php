<?php
/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td height="25" colspan="3" align="left" valign="middle" class="bgcolor_02">&nbsp;Notice</td>
  </tr>
  <tr>
    <td width="11%" align="left" valign="middle" >&nbsp; Title </td>
    <td width="2%" align="left" valign="middle"><strong> :</strong></td>
    <td width="87%" height="30" align="left" valign="middle"><?php echo $notice_det[0]->es_title?> </td>
  </tr>
  <tr>
    <td height="30" align="left" valign="middle"> &nbsp;Date</td>
    <td width="2%" align="left" valign="middle"><strong> :</strong></td>
    <td  align="left" valign="middle" ><?php echo displaydate($notice_det[0]->es_date);?></td>
  </tr>
 <?php /*?> <tr>
    <td height="30" align="left" valign="middle">&nbsp;Subject</td>
    <td width="2%" align="left" valign="middle"><strong> :</strong></td>
    <td  align="left" valign="middle" ><?php echo $notice_det[0]->es_subject;?></td>
  </tr><?php */?>
  
    <tr>
    <td width="11%" align="left" valign="middle" > &nbsp;Notice </td>
    <td width="2%" valign="middle"  align="left"><strong> :</strong></td>
    <td width="87%" height="30" align="left"valign="middle"><?php echo $notice_det[0]->es_message?></td>
  </tr>
<?php /*?> <tr>
    <td align="left" valign="middle" >&nbsp;</td>
    <td width="2%" align="left" valign="middle" >&nbsp;</td>
    <td height="30"  align="left" valign="middle" > <input name="Close" class="bgcolor_02"  onclick="javascript:window.close();" type="button" value="Close"  /></td>
  </tr><?php */?>


</table>
<br/>