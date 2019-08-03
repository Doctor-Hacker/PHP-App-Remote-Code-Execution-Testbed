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
                <td height="25" colspan="3" class="bgcolor_02"><a href="#" class="admin">Teacher</a> <strong>View</strong> </td>
              </tr>
              <tr>
                <td width="2" class="bgcolor_02"></td>
                <td width="1209" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="left" valign="top"><table width="100%" border="0" cellspacing="3" cellpadding="0">
                     <!-- <tr>
                        <td width="1%">&nbsp;</td>
                        <td width="24%" class="narmal">Registration No </td>
                        <td width="1%">:</td>
                        <td colspan="4"><input type="text" name="st_regno"  id="st_regno"/></td>
                      </tr>-->
                      <tr>
                        <td>&nbsp; </td>
                        <td class="narmal"> First&nbsp;Name </td>
                        <td>:</td>
                        <td colspan="4"><input type="text" name="st_fname" id="st_fname" /></td>
                      </tr>
					  <tr>
                        <td>&nbsp; </td>
                        <td class="narmal">Last&nbsp;Name </td>
                        <td>:</td>
                        <td colspan="4"><input type="text" name="st_lname" id="st_lname" /></td>
                      </tr>
					  <tr>
                        <td>&nbsp;</td>
                        <td class="narmal">Gender</td>
                        <td>:</td>
                        <td colspan="4"><select name="st_gender" id="st_gender" >
                          <option>Male</option>
                          <option>Female</option>
                        </select>                        </td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td class="narmal">Date Of Birth </td>
                        <td>:</td>
                        <td colspan="4"><input name="st_dob" type="text" id="st_dob" /></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td class="narmal">Post Applied For </td>
                        <td>:</td>
                        <td colspan="4"><input name="st_postapp" type="text" id="st_postapp" /></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td class="narmal">Primary Subject </td>
                        <td>:</td>
                        <td><input name="st_primsub" type="text" id="st_primsub" /></td>
                        <td colspan="2">&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td class="narmal">Secondary Subject</td>
                        <td>:</td>
                        <td><input name="st_secsub" type="text" id="st_secsubj" /></td>
                        <td colspan="2">&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td class="narmal">fathers/Husband Name </td>
                        <td>:</td>
                        <td colspan="4"><input name="st_fahbname" type="text" id="st_fahubname" /></td>
                      </tr>
					  <tr>
                        <td>&nbsp;</td>
                        <td class="narmal">No Of Daughters </td>
                        <td>:</td>
                        <td colspan="4"><input name="st_daughter" type="text" id="st_daughter" /></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td class="narmal">No Of Sons </td>
                        <td>:</td>
                        <td colspan="4"><input name="st_son" type="text" id="st_son" /></td>
                      </tr>
                     
                      <tr>
                        <td valign="top">&nbsp;</td>
                        <td valign="top" class="narmal">Email</td>
                        <td valign="top">:</td>
                        <td colspan="4" valign="top"><input name="st_email" type="text" id="st_email" /></td>
                      </tr>
						  
                      <tr>
                        <td>&nbsp;</td>
                        <td class="narmal"><strong>Qualification</strong></td>
                        <td>&nbsp;</td>
                        <td colspan="4">&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td colspan="6" class="narmal"><table width="100%" border="1" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="7%" height="20" class="bgcolor_02"><strong>&nbsp;S No </strong></td>
                            <td width="31%" class="bgcolor_02"><strong>&nbsp;&nbsp;&nbsp;Exam Passed </strong></td>
                            <td width="35%" class="bgcolor_02"><strong>&nbsp;&nbsp;Board / University </strong></td>
                            <td width="27%" class="bgcolor_02"><strong>&nbsp;&nbsp;Year/session</strong></td>
                          </tr>
                          <tr>
                            <td class="narmal"><input name="st_sno1" type="text" id="st_sno1" size="5" /></td>
                            <td class="narmal"><input name="st_pass1" type="text" id="st_pass1" size="15" /></td>
                            <td class="narmal"><input name="st_board1" type="text" id="st_board1" size="15" /></td>
                            <td class="narmal"><input name="st_year1" type="text" id="st_year1" size="15" /></td>
                          </tr>
                          <tr>
                            <td class="narmal"><input name="st_sno2" type="text" id="st_sno2" size="5" /></td>
                            <td class="narmal"><input name="st_pass2" type="text" id="st_pass2" size="15" /></td>
                            <td class="narmal"><input name="st_board2" type="text" id="st_board2" size="15" /></td>
                            <td class="narmal"><input name="st_year2" type="text" id="st_year2" size="15" /></td>
                          </tr>
                          <tr>
                            <td class="narmal"><input name="st_sno3" type="text" id="st_sno3" size="5" /></td>
                            <td class="narmal"><input name="st_pass3" type="text" id="st_pass3" size="15" /></td>
                            <td class="narmal"><input name="st_board3" type="text" id="st_board3" size="15" /></td>
                            <td class="narmal"><input name="st_year3" type="text" id="st_year3" size="15" /></td>
                          </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td class="narmal"><strong>Experience</strong></td>
                        <td>:</td>
                        <td colspan="4">&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td colspan="6" class="narmal"><table width="100%" border="1" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="7%" height="20" class="bgcolor_02"><strong>&nbsp;S No </strong></td>
                            <td width="31%" class="bgcolor_02"><strong>&nbsp;&nbsp;Institution</strong></td>
                            <td width="35%" class="bgcolor_02"><strong>&nbsp;&nbsp;&nbsp;Position</strong></td>
                            <td width="27%" class="bgcolor_02"><strong>Period</strong></td>
                          </tr>
                          <tr>
                            <td class="narmal"><input name="st_sno4" type="text" id="st_sno4" size="5" /></td>
                            <td class="narmal"><input name="st_inst1" type="text" id="st_inst1" size="15" /></td>
                            <td class="narmal"><input name="st_position1" type="text" id="st_position1" size="15" /></td>
                            <td class="narmal"><input name="st_period1" type="text" id="st_period1" size="15" /></td>
                          </tr>
                          <tr>
                            <td class="narmal"><input name="st_sno5" type="text" id="st_sno5" size="5" /></td>
                            <td class="narmal"><input name="st_inst2" type="text" id="st_inst2" size="15" /></td>
                            <td class="narmal"><input name="st_position2" type="text" id="st_position2" size="15" /></td>
                            <td class="narmal"><input name="st_period2" type="text" id="st_period2" size="15" /></td>
                          </tr>
                          <tr>
                            <td class="narmal"><input name="st_sno6" type="text" id="st_sno6" size="5" /></td>
                            <td class="narmal"><input name="st_inst3" type="text" id="st_inst3" size="15" /></td>
                            <td class="narmal"><input name="st_position3" type="text" id="st_position3" size="15" /></td>
                            <td class="narmal"><input name="st_period3" type="text" id="st_period3" size="15" /></td>
                          </tr>
                        </table></td>
                      </tr>
                      
                      <tr>
                        <td valign="top">&nbsp;</td>
                        <td colspan="6" valign="top" class="narmal"><table width="100%" border="0" cellspacing="3" cellpadding="0">
                          <tr>
                            <td height="25" colspan="8" class="bgcolor_02"><strong>&nbsp;&nbsp;Present Address</strong></td>
                          </tr>
                          <tr>
                            <td width="2%">&nbsp;</td>
                            <td width="19%">Addres</td>
                            <td width="2%">:</td>
                            <td width="15%"><textarea name="st_address" cols="12" id="st_address"></textarea></td>
                            <td width="8%">&nbsp;</td>
                            <td width="21%">&nbsp;</td>
                            <td width="18%">&nbsp;</td>
                            <td width="15%">&nbsp;</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>City</td>
                            <td>:</td>
                            <td><input name="st_city" type="text" id="st_city" size="15" /></td>
                            <td>&nbsp;&nbsp;State</td>
                            <td><input name="st_state" type="text" id="st_state" size="10" /></td>
                            <td>Country</td>
                            <td><input name="st_country" type="text" id="st_country" size="10" /></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>Post Code </td>
                            <td>:</td>
                            <td colspan="5"><input name="st_pin" type="text" id="st_pin" size="15" /></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>Phone No </td>
                            <td>:</td>
                            <td><input name="st_phone" type="text" id="st_phone" size="15" /></td>
                            <td>Resi No</td>
                            <td><input name="st_residency" type="text" id="st_residency" size="10" /></td>
                            <td>Mob No</td>
                            <td><input name="st_mobile" type="text" id="st_mobile" size="10" /></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                          </tr>
                        </table></td>
                      </tr>
                      
                      <tr>
                        <td valign="top">&nbsp;</td>
                        <td colspan="6" valign="top" class="narmal"><table width="100%" border="0" cellspacing="3" cellpadding="0">
                          <tr>
                            <td height="25" colspan="8" class="bgcolor_02"><strong>&nbsp;&nbsp;<span class="admin">Permanent</span> Address</strong></td>
                          </tr>
                          <tr>
                            <td width="2%">&nbsp;</td>
                            <td width="19%">Addres</td>
                            <td width="2%">:</td>
                            <td width="15%"><textarea name="st_peadress" cols="12" id="st_peadress"></textarea></td>
                            <td width="8%">&nbsp;</td>
                            <td width="21%">&nbsp;</td>
                            <td width="18%">&nbsp;</td>
                            <td width="15%">&nbsp;</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>City</td>
                            <td>:</td>
                            <td><input name="st_pecity" type="text" id="st_pecity" size="15" /></td>
                            <td>&nbsp;&nbsp;State</td>
                            <td><input name="st_pestate" type="text" id="st_pestate" size="10" /></td>
                            <td>Country</td>
                            <td><input name="st_pecountry" type="text" id="st_pecountry" size="10" /></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>Post Code </td>
                            <td>:</td>
                            <td colspan="5"><input name="st_pepin" type="text" id="st_pepin" size="15" /></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>Phone No </td>
                            <td>:</td>
                            <td><input name="st_pephone" type="text" id="st_pephone" size="15" /></td>
                            <td>Resi No</td>
                            <td><input name="st_peresi" type="text" id="st_peresi" size="10" /></td>
                            <td>Mob No</td>
                            <td><input name="st_pemobno" type="text" id="st_pemobno" size="10" /></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td height="20" colspan="8" class="admin">&nbsp;<strong>Reference</strong></td>
                          </tr>
                          
                        </table></td>
                      </tr>
                      <tr>
                        <td valign="top">&nbsp;</td>
                        <td colspan="6" valign="top" class="narmal"><table width="100%" border="1" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="7%" height="20" class="bgcolor_02"><strong>&nbsp;S No </strong></td>
                            <td width="26%" class="bgcolor_02"><strong>Reference Person Name </strong></td>
                            <td width="26%" class="bgcolor_02"><strong>&nbsp;&nbsp;Designation </strong></td>
                            <td width="20%" class="bgcolor_02"><strong>&nbsp;&nbsp;Institute</strong></td>
                            <td width="21%" class="bgcolor_02">&nbsp;<strong>E-mail</strong> </td>
                          </tr>
                          <tr>
                            <td class="narmal"><input name="st_sno7" type="text" id="st_sno7" size="5" /></td>
                            <td class="narmal"><input name="st_refname1" type="text" id="st_refname1" size="15" /></td>
                            <td class="narmal"><input name="st_desg1" type="text" id="st_desg1" size="15" /></td>
                            <td class="narmal"><input name="st_inst4" type="text" id="st_inst4" size="15" /></td>
                            <td class="narmal"><input name="st_email1" type="text" id="st_email1" size="15" /></td>
                          </tr>
                          <tr>
                            <td class="narmal"><input name="st_sno8" type="text" id="st_sno8" size="5" /></td>
                            <td class="narmal"><input name="st_refname2" type="text" id="st_refname2" size="15" /></td>
                            <td class="narmal"><input name="st_desg2" type="text" id="st_desg2" size="15" /></td>
                            <td class="narmal"><input name="st_inst5" type="text" id="st_inst5" size="15" /></td>
                            <td class="narmal"><input name="st_email2" type="text" id="st_email2" size="15" /></td>
                          </tr>
                          <tr>
                            <td class="narmal"><input name="st_sno9" type="text" id="st_sno9" size="5" /></td>
                            <td class="narmal"><input name="st_refname3" type="text" id="st_refname3" size="15" /></td>
                            <td class="narmal"><input name="st_desg3" type="text" id="st_desg3" size="15" /></td>
                            <td class="narmal"><input name="st_inst6" type="text" id="st_inst6" size="15" /></td>
                            <td class="narmal"><input name="st_email3" type="text" id="st_email3" size="15" /></td>
                          </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td valign="top">&nbsp;</td>
                        <td colspan="6" align="center" valign="top" class="narmal"><input name="Submit" type="submit" class="bgcolor_02" value="Submit" /></td>
                      </tr>
                    
                    </table></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">&nbsp;</td>
                  </tr>
                </table></td>
                <td width="5" class="bgcolor_02"></td>
              </tr>
              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
                </tr>
            </table>