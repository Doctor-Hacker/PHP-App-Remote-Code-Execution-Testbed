<?php if($action=='viewnotice')  {?>
		
		<h3>Notice Details 
  
</h3>            
<table width="46%" height="177" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="11%" > Title </td>
    <td width="2%" align="center">:</td>
    <td width="87%" height="30" align="left"><input type="text" name="title" value="<?php echo $notice_det[0]->es_date?>" /></td>
  </tr>
  <tr>
    <td>date</td>
    <td width="2%" align="center">:</td>
    <td height="30" align="left" ><input type="text" name="blogDesc"  value="<?php echo $notice_det[0]->es_title?>"/></td>
  </tr>
  <tr>
    <td >Description</td>
    <td width="2%" align="center">:</td>
    <td height="85" align="left" ><textarea name="textarea" cols="40" rows="5"> <?php echo $notice_det[0]->es_message?></textarea></td>
  </tr>
  <tr><td></td><td></td>
    <td align="right" ><p>&nbsp;
      </p>
      <p>
        <input name="Close"  onclick="javascript:window.close();" type="button" value="close"  />
      </p></td>
  </tr>
</table>
<br/>
<?php }?>
