<?php
/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}

?>

<h3>&nbsp;&nbsp;Assignment Details</h3>            
<table width="95%" height="177" align="center" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="18%" ><strong>Name</strong></td>
    <td width="2%" align="center"> : </td>
    <td width="80%" height="30" align="left"><?php  echo $es_assignment[0]->as_name; ?></td>
  </tr>
  <tr>
    <td><strong>Last date</strong></td>
    <td align="center"> : </td>
    <td height="30" align="left" ><?php echo displaydate($es_assignment[0]->as_lastdate); ?></td>
  </tr>
  <tr>
    <td colspan="3" height="20"></td>
  </tr>
  <tr>
    <td colspan="3" align="center" ><a href="<?php echo "../student_staff/assignments/".$es_assignment[0]->as_description; ?>" ><strong>Click Here</strong></a> to view the assignment.</td>
  </tr>
  <tr><td></td><td></td>
    <td align="right" ><p>&nbsp;
      </p>
      <p>
        <input name="Close"  onclick="javascript:window.close();" type="button" value="close"  />
      </p></td>
  </tr>
</table>