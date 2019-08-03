<?php
/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}

?>
<form action="" method="post">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>Add Staff</strong> </td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="left" valign="top"><table width="100%" border="0" cellspacing="3" cellpadding="0">
                     
                      <tr>
                        <td>&nbsp; </td>
                        <td class="narmal"> Teacher&nbsp;Name </td>
                        <td>:</td>
                        <td colspan="5"><input name="txt_teacher" type="text" size="15" /></td>
                      </tr>
					  <tr>
                        <td>&nbsp;</td>
                        <td class="narmal">Gender</td>
                        <td>:</td>
                        <td><select name="sel_gender">
						<option>Male</option>
						<option>Female</option>
						</select></td>
                        <td width="12%">&nbsp;</td>
                        <td width="16%">&nbsp;</td>
                        <td width="13%">&nbsp;</td>
                        <td width="16%">&nbsp;</td>
					  </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td class="narmal">Date Of Birth </td>
                        <td>:</td>
                        <td colspan="5"><input name="txt_dob" id="txt_dob" type="text" size="15" /></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td class="narmal">Designation</td>
                        <td>:</td>
                        <td width="17%"><input name="txt_designation" id="txt_designation" type="text" size="15" /></td>
                        <td class="narmal">&nbsp;</td>
                        <td class="narmal">&nbsp;</td>
                        <td class="narmal">&nbsp;</td>
                        <td class="narmal">&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td class="narmal">Primary Subject </td>
                        <td>:</td>
                        <td><input name="txt_primarysubject" type="text" size="15" /></td>
                        <td class="narmal">&nbsp;</td>
                        <td colspan="3">&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td class="narmal">Secondary Subject</td>
                        <td>:</td>
                        <td><input name="txt_secondrysubject" id="txt_secondrysubject" type="text" size="15" /></td>
                        <td>&nbsp;</td>
                        <td colspan="3">&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td class="narmal">fathers/Husband Name </td>
                        <td>:</td>
                        <td colspan="5"><input name="txt_father" id="txt_father" type="text" size="15" /></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td class="narmal">Qualification</td>
                        <td>:</td>
                        <td colspan="5">&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td colspan="7" class="narmal"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="7%" height="20" class="bgcolor_02"><strong>&nbsp;S No </strong></td>
                            <td width="31%" class="bgcolor_02"><strong>&nbsp;&nbsp;&nbsp;Exam Passed </strong></td>
                            <td width="35%" class="bgcolor_02"><strong>&nbsp;&nbsp;Board / University </strong></td>
                            <td width="27%" class="bgcolor_02"><strong>&nbsp;&nbsp;Year/session</strong></td>
                          </tr>
                          <tr>
                            <td class="narmal">1</td>
                            <td class="narmal"><input type="text" name="txt_exampassed" id="txt_exampassed" /></td>
                            <td class="narmal"><input type="text" name="txt_bord" id="txt_bord" /></td>
                            <td class="narmal"><input type="text" name="txt_year" id="txt_year" /></td>
                          </tr>
                        </table></td>
                        </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td class="narmal">Experience</td>
                        <td>:</td>
                        <td colspan="5"><input name="txt_exp" type="text" size="15" /></td>
                      </tr>
                       <tr>
                        <td>&nbsp;</td>
                        <td class="narmal">No Of Daughters </td>
                        <td>:</td>
                        <td colspan="5"><input name="txt_nod" id="txt_nod" type="text" size="15" /></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td class="narmal">No Of Sons </td>
                        <td>:</td>
                        <td colspan="5"><input name="txt_nos" id="txt_nos" type="text" size="15" /></td>
                      </tr>
                     <tr>
                        <td>&nbsp;</td>
                        <td class="narmal">Present Address </td>
                        <td>:</td>
                        <td><input name="textfield10" type="text" size="15" /></td>
                        <td colspan="4" class="narmal">&nbsp;</td>
                        </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td class="narmal">City</td>
                        <td>:</td>
                        <td colspan="5"><input name="textfield102" type="text" size="15" /></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td class="narmal">State</td>
                        <td>:</td>
                        <td><input name="textfield12" type="text" size="15" /></td>
                        <td colspan="4" class="narmal">&nbsp;</td>
                        </tr>
                      <tr>
                        <td valign="top">&nbsp;</td>
                        <td valign="top" class="narmal">Country</td>
                        <td valign="top">:</td>
                        <td valign="top"><input name="textfield123" type="text" size="15" /></td>
                        <td colspan="4" valign="top">&nbsp;</td>
                        </tr>
                      <tr>
                        <td valign="top">&nbsp;</td>
                        <td valign="top" class="narmal">Zip Code </td>
                        <td valign="top">:</td>
                        <td valign="top"><input name="textfield122" type="text" size="15" /></td>
                        <td colspan="4" valign="top" class="narmal">&nbsp;</td>
                      </tr>
                      <tr>
                        <td valign="top">&nbsp;</td>
                        <td valign="top" class="narmal">ResidenceNo </td>
                        <td valign="top">:</td>
                        <td valign="top"><input name="textfield1222" type="text" size="15" /></td>
                        <td colspan="4" valign="top" class="narmal">&nbsp;</td>
                      </tr>
                      <tr>
                        <td valign="top">&nbsp;</td>
                        <td valign="top" class="narmal">Mobile No </td>
                        <td valign="top">:</td>
                        <td valign="top"><input name="textfield12222" type="text" size="15" /></td>
                        <td colspan="4" valign="top" class="narmal">&nbsp;</td>
                      </tr>
                      <tr>
                        <td valign="top">&nbsp;</td>
                        <td valign="top" class="narmal">Email</td>
                        <td valign="top">:</td>
                        <td valign="top"><input name="textfield12223" type="text" size="15" /></td>
                        <td colspan="4" valign="top" class="narmal">&nbsp;</td>
                      </tr>
                      <tr>
                        <td valign="top">&nbsp;</td>
                        <td valign="top" class="narmal">Permanent Address </td>
                        <td valign="top">:</td>
                        <td valign="top"><input name="textfield12224" type="text" size="15" /></td>
                        <td colspan="4" valign="top" class="narmal">&nbsp;</td>
                      </tr>
                      <tr>
                        <td valign="top">&nbsp;</td>
                        <td valign="top" class="narmal">City</td>
                        <td valign="top">:</td>
                        <td valign="top"><input name="textfield122242" type="text" size="15" /></td>
                        <td colspan="4" valign="top" class="narmal">&nbsp;</td>
                      </tr>
                      <tr>
                        <td valign="top">&nbsp;</td>
                        <td valign="top" class="narmal">State</td>
                        <td valign="top">:</td>
                        <td valign="top"><input name="textfield122243" type="text" size="15" /></td>
                        <td colspan="4" valign="top" class="narmal">&nbsp;</td>
                      </tr>
                      <tr>
                        <td valign="top">&nbsp;</td>
                        <td valign="top" class="narmal">Country</td>
                        <td valign="top">:</td>
                        <td valign="top"><input name="textfield122244" type="text" size="15" /></td>
                        <td colspan="4" valign="top" class="narmal">&nbsp;</td>
                      </tr>
                      <tr>
                        <td valign="top">&nbsp;</td>
                        <td valign="top" class="narmal">Zip Code </td>
                        <td valign="top">:</td>
                        <td valign="top"><input name="textfield122245" type="text" size="15" /></td>
                        <td colspan="4" valign="top" class="narmal">&nbsp;</td>
                      </tr>
                     
                      <tr>
                        <td valign="top">&nbsp;</td>
                        <td valign="top" class="narmal">Previous Employer</td>
                        <td valign="top">:</td>
                        <td valign="top"><input name="textfield1222482" type="text" size="15" /></td>
                        <td colspan="4" valign="top" class="narmal">&nbsp;</td>
                      </tr>
                      <tr>
                        <td valign="top">&nbsp;</td>
                        <td valign="top"><span class="style1"><span class="narmal">Institution Name </span></span></td>
                        <td valign="top">:</td>
                        <td valign="top"><input name="textfield1222483" type="text" size="15" /></td>
                        <td colspan="4" valign="top" class="narmal">&nbsp;</td>
                      </tr>
                      <tr>
                        <td valign="top">&nbsp;</td>
                        <td valign="top" class="narmal">Period</td>
                        <td valign="top">:</td>
                        <td valign="top"><input name="textfield1222484" type="text" size="15" /></td>
                        <td colspan="4" valign="top" class="narmal">&nbsp;</td>
                      </tr>
                      <tr>
                        <td valign="top">&nbsp;</td>
                        <td valign="top" class="narmal">Designation</td>
                        <td valign="top">:</td>
                        <td valign="top"><input name="textfield1222485" type="text" size="15" /></td>
                        <td colspan="4" valign="top" class="narmal">&nbsp;</td>
                      </tr>
                     <tr>
                        <td valign="top">&nbsp;</td>
                        <td valign="top" class="narmal"></td>
                        <td valign="top"></td>
                        <td valign="top"><input name="submit" type="submit" class="bgcolor_02" value="Submit" /></td>
                        <td colspan="4" valign="top" class="narmal">&nbsp;</td>
                      </tr>
					</table></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">&nbsp;</td>
                  </tr>
                </table></td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
              
              
            </table>
			</form>
			