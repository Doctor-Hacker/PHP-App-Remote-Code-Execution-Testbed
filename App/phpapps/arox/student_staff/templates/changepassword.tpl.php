<?php if($action = "change_password") {
?>
<script type="text/javascript">
function equality() {


/*if(document.form.ch_new_password.value == document.form.ch_rew_password.value)
	    {
           alert("fdgfhfghhjn");
		   
		   return (false);
	    }*/
}
</script>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Change Password</strong></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="4" cellpadding="0">
                  <tr>
                    <td align="left" valign="top"><table width="100%" border="0" cellspacing="5" cellpadding="0">
                      <form action="" method="post" name="password_change">
					<?php  
	
							if (isset($notValid) && $notValid!=""){
						?>
							 <tr>
								  <td height="25" colspan="3" align="center" class="success_message"><strong><?php echo $notValid; ?></strong></td>
							 </tr>
							 <?php
							}
						?>
					
					  <tr>
                        <td width="26%" class="narmal">&nbsp;<span class="forms">Old Password </span></td>
                        <td width="19%" class="narmal"><input type="password" name="ch_old_password" id="ch_old_password"></td>
                        <td colspan="2" class="narmal">&nbsp;</td>
                        <td width="27%" class="narmal">&nbsp;</td>
                      </tr>
                      <tr>
                        <td class="narmal">&nbsp;<span class="forms">New Password</span></td>
                        <td class="narmal"><input type="password" name="ch_new_password" id="ch_new_password"></td>
                        <td width="15%" class="narmal">&nbsp;</td>
                        <td width="13%" class="narmal">&nbsp;</td>
                        <td class="narmal">&nbsp;</td>
                      </tr>
                      <tr>
                        <td class="narmal">&nbsp;<span class="forms">Rewrite Password</span></td>
                        <td class="narmal"><input type="password" name="ch_rew_password" id="ch_rew_password"></td>
                        <td colspan="2" class="narmal">&nbsp;</td>
                        <td class="narmal">&nbsp;</td>
                      </tr>
                      <tr>
                           <td class="narmal">&nbsp;</td>
                           <td class="narmal"><input name="passwordSubmit" type="submit" class="bgcolor_02" value="Submit" onclick="return equality();"></td>
                           <td colspan="2" class="narmal">&nbsp;</td>
                           <td class="narmal">&nbsp;</td>
                      </tr>
                    </form>
					</table></td>
                  </tr>
                  <tr>
                       <td height="25" align="left" valign="middle">&nbsp;</td>
                  </tr>
                </table></td>
				<td width="1" class="bgcolor_02"></td>
              </tr>
			  
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
              </tr>
            </table>
<?php } ?>			