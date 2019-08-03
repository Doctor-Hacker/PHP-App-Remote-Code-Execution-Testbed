<?php
/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}

?>
      
<table width="100%" height="177" align="center" border="0" cellpadding="0" cellspacing="0">
  <tr class="bgcolor_02">
    <td >&nbsp;</td>
    <td height="30" colspan="3" class="admin" >Details</td>
  </tr>
  <tr>
    <td >&nbsp;</td>
    <td ><strong>Subject</strong></td>
    <td align="center">:</td>
    <td height="30" align="left"><?php
	$subject_name = $db->getOne("SELECT `es_subjectname` FROM `es_subject` WHERE `es_subjectid` =".$es_assignment[0]->as_suject);
	  echo $subject_name; ?></td>
  </tr>
  <tr>
    <td width="3%" >&nbsp;</td>
    <td width="24%" ><strong>Assignment</strong></td>
    <td width="4%" align="center"> : </td>
    <td width="69%" height="30" align="left"><?php  echo $es_assignment[0]->as_name; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><strong>Last date</strong></td>
    <td align="center"> : </td>
    <td height="30" align="left" ><?php echo displaydate($es_assignment[0]->as_lastdate); ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td height="30" align="left" ><a href="<?php echo "../student_staff/assignments/".$es_assignment[0]->as_description; ?>" ><strong>Click</strong></a> to view  Assignment.</td>
  </tr>
  <?php /*?><tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td height="30" align="left" ><input name="Close"  onclick="javascript:window.close();" type="button" value="Close" class="bgcolor_02"  /></td>
  </tr>   <?php */?>     
      
</table>
