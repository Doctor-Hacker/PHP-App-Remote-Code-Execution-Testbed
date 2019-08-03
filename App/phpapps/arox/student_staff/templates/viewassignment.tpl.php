<table width="100%" height="177" align="center" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="3" class="bgcolor_02" height="30" >&nbsp;&nbsp;Details</td>
  </tr>
    <tr>
    <td width="18%" ><strong>Subject</strong></td>
    <td width="2%" align="center"> : </td>
    <td width="80%" height="30" align="left" ><?php  echo subjectname($es_assignment[0]->as_suject); ?></td>
  </tr>
  <tr>
    <td width="18%" ><strong>Assignment</strong></td>
    <td width="2%" align="center"> : </td>
    <td width="80%" height="30" align="left" ><?php  echo $es_assignment[0]->as_name; ?></td>
  </tr>
  <tr>
    <td><strong>Last date</strong></td>
    <td align="center"> : </td>
    <td height="30" align="left" ><?php echo displaydate($es_assignment[0]->as_lastdate); ?></td>
  </tr>

  <tr>
    <td align="center" ></td>
    <td align="center" >&nbsp;</td>
    <td align="left" ><a href="<?php echo "assignments/".$es_assignment[0]->as_description; ?>" ><strong>Click Here</strong></a> to view the assignment.</td>
  </tr>
  <tr><td></td><td></td>
    <td align="left" ><input name="Close"  onclick="javascript:window.close();" type="button" value="close" class="bgcolor_02"  /></td>
  </tr>
</table>
<br/>

