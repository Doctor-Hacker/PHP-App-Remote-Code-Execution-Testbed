<?php 

/**
* Only Admin users can view the pages
*/

if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
	
	if($action = 'email_compose') {
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;&nbsp;Email-System/Compose Mail </strong></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="left" valign="top"><table width="100%" border="0" cellspacing="3" cellpadding="0">
                      <tr>
                        <td width="12%" class="narmal">&nbsp;</td>
                        <td width="28%" class="narmal">&nbsp;</td>
                        <td width="60%" class="narmal">&nbsp;</td>
                        </tr>
                      <tr>
                        <td align="left" class="narmal">To</td>
                        <td class="narmal"><select name="select">
                          <option>Student</option>
                          <option>Staff</option>
                          <option>Parents</option>
                        </select></td>
                        <td rowspan="3" class="narmal"><select name="select4" size="6" multiple="multiple">
                          <option value="All">All</option>
                          <option value="1">1</option>
                          <option value="1">1</option>
                          <option value="1">1</option>
                          <option value="1">1</option>
                          <option value="1">1</option>
                          <option value="1">1</option>
                          <option value="1">1</option>
                          <option value="1">1</option>
                          <option value="1">1</option>
                          <option value="1">1</option>
                        </select>                        </td>
                        </tr>
                      <tr>
                        <td align="left" class="narmal">Class</td>
                        <td class="narmal"><select name="select2">
                        </select>                        </td>
                        </tr>
                      <tr>
                        <td align="left" class="narmal">Section</td>
                        <td class="narmal"><select name="select3">
                        </select></td>
                        </tr>
                      <tr>
                        <td align="left" class="narmal">Subject</td>
                        <td colspan="2" class="narmal"><input name="textfield" type="text" size="80" /></td>
                      </tr>
                      <tr>
                        <td align="left" class="narmal">Massege</td>
                        <td colspan="2" class="narmal"><textarea name="textfield2" cols="60"></textarea></td>
                        </tr>
                      <tr>
                        <td align="right" class="narmal">&nbsp;</td>
                        <td colspan="2" class="narmal"><input type="file" name="file" /></td>
                        </tr>
                      <tr>
                        <td align="right" class="narmal">&nbsp;</td>
                        <td class="narmal">&nbsp;</td>
                        <td class="narmal">Add More </td>
                        </tr>
                      <tr>
                        <td align="right" class="narmal">&nbsp;</td>
                        <td class="narmal"><input name="Submit" type="submit" class="bgcolor_02" value="   Send Maul" />
                          <input name="Submit2" type="submit" class="bgcolor_02" value="  Reset" /></td>
                        <td class="narmal">&nbsp;</td>
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
			
<?php } ?>			