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
            <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<b>Themes</b></td>
      </tr>
	  <tr>
            <td height="25" colspan="3" class="narmal">&nbsp;&nbsp;Theme Changed Sucessfully</td>
      </tr>
</table>