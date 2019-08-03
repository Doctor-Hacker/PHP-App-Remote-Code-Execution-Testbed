<?php
/**
* Only Admin users can view the pages
*/

?>
<table width="96%" height="52%" border="0" cellpadding="0" cellspacing="0">
	<tr>
	  <td height="33" colspan="3"><h3>Notice</h3></td>
  </tr>
  <tr>
    <td width="21%" height="30" align="left" valign="middle"> Title </td>
    <td width="3%"  align="center"><strong> :</strong></td>
    <td  align="left" valign="middle">&nbsp;<?php echo $notice_det[0]->es_title?> </td>
  </tr>
  <tr>
    <td height="30" align="left" valign="middle"> Date</td>
    <td  align="center" valign="middle"><strong> :</strong></td>
    <td   align="left" valign="middle">&nbsp;<?php echo displaydate($notice_det[0]->es_date);?></td>
  </tr>
    <tr>
    <td height="30" align="left"  valign="middle"> Notice</td>
    <td  valign="middle"  align="center"><strong> :</strong></td>
    <td width="76%" align="left" valign="middle">&nbsp;<?php echo $notice_det[0]->es_message?></td>
  </tr>
   <tr>
    <td height="30" align="left"  valign="middle"></td>
    <td  valign="middle"  align="center"><strong></strong></td>
    <td width="76%" align="left" valign="middle"><input name="Close"  onclick="javascript:window.close();" type="button" value="close"   class="bgcolor_02" /></td>
  </tr>
</table>
