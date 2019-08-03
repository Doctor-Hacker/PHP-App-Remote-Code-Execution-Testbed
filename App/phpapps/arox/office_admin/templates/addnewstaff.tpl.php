<?Php

/**
* *********************Adding New Staff *******************
*/

if($action =='addnewstaff' ){
if(!isset($st_permissions)){
$st_permissions =array();
}
?>
<script type="text/javascript">
function showtable(){
	if(document.getElementById("feed_dis_1").checked) {
		document.getElementById("feedback").style.display = "block";
	}
	else {
		document.getElementById("feedback").style.display = "none";
	}
}
</script>
		
		
<table width="100%" border="0" cellspacing="0" cellpadding="0"> 
	<form action="" method="post" name="viewstaff" enctype="multipart/form-data"> 
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><a  class="admin">&nbsp;Add Staff </a><strong></strong> </td>
              </tr>		
			  	<tr>
                <td width="1px" class="bgcolor_02" ></td>
                <td height="25" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font><br /></td>
                 <td width="1px" class="bgcolor_02" ></td></td>
              </tr>  
              <tr>                
				<td width="1" class="bgcolor_02"></td>
                <td  align="left" valign="top">
				
				   <table width="100%" border="0" align="center" cellpadding="3"     cellspacing="3">
                     <tr>				  
                        <td align="left" valign="top">
					         <table width="98%" border="0" cellspacing="3" cellpadding="3">
                             <tr align="left" valign="middle">
									<td>&nbsp;</td>
									<td class="narmal">Employment Id  </td>
									<td>:</td>
									<td><?php
                                    $max_id=$db->getRow("SELECT MAX(es_staffid) as max_id FROM es_staff");
									echo $max_id['max_id']+1;
									?></td>
							   </tr>
							                  
								  <tr>					  
									 <td width="7%" align="left" valign="middle">&nbsp;</td>
									 <td width="20%" align="left" valign="middle" class="narmal"> First&nbsp;Name <font color="#FF0000">*</font></td>
									 <td width="3%" align="left" valign="middle">:</td>
								    <td width="28%" align="left" valign="middle"><input type="text" name="st_fname2" id="st_fname2" value="<?php echo $st_fname2 ?>"/></td>                        
									 <td width="42%" colspan="4" rowspan="6" align="left" >
									 <?php if(isset($image) && $image!=''){?>
									<?php }?></td>
								 </tr>
								  <tr align="left" valign="middle">
									<td>&nbsp;</td>
									<td class="narmal">Last&nbsp;Name </td>
									<td>:</td>
									<td><input type="text" name="st_lname2" id="st_lname2" value="<?php echo $st_lname2 ?>"/></td>
							   </tr>
							     <tr align="left" valign="middle">
									<td>&nbsp;</td>
									<td class="narmal">Gender <font color="#FF0000">*</font></td>
									<td>:</td>
								   <td><select name="st_gender2"  id="st_gender2" style="width:150px;">
									<option value="" >Select Gender </option>
									<option value="Male"<?php if($st_gender2=="Male") {	echo "selected";} ?> >Male
									</option>
									<option value="Female" <?php if($st_gender2=="Female"){echo "selected";	} ?>>Female
									</option>
								   </select></td>
						       </tr> 
							   <tr align="left" valign="middle">
									<td>&nbsp;</td>
									<td class="narmal">Father's&nbsp;Name </td>
									<td>:</td>
									<td><input type="text" name="st_fthname" id="st_fthname" value="<?php echo $st_fthname ?>"/></td>
							   </tr> 
							    <tr height="25" >
								<td align="left" class="narmal"></td>
                               						   
                              <td  align="left" class="narmal" colspan="3" >
							  <table width="100%" border="0">
							  <?php 
							   if((!isset($feed_dis) || $feed_dis=="") || $feed_dis=='teaching'){$a = "checked='checked'";$b = "";}
							   if(isset($feed_dis) && $feed_dis=='nonteaching'){$b = "checked='checked'";$a = "";}
							  
							  ?>
							  <tr>
								<td><input type="radio" name="feed_dis" id="feed_dis_1" value="teaching" <?php echo $a;?> onclick="showtable();" />&nbsp;Teaching Staff</td>
								<td><input type="radio" name="feed_dis" id="feed_dis_2" value="nonteaching" <?php echo $b;?> onclick="showtable();" />&nbsp;Non - Teaching Staff</td>
								
							  </tr>
							</table>
                            </td>
                  </tr>
				                       
							    <tr align="left" valign="middle">
								  <td>&nbsp;</td>
								  <td class="narmal">Department <font color="#FF0000">*</font></td>
								  <td>:</td>						
								  <td >
				                  <select name="st_department" onchange="JavaScript:document.viewstaff.submit();" 
				                         style="width:150px;" >
								<option value="">-Select-</option>
									<?php foreach($getdeptlist as $eachrecord) { ?>
									<option value="<?php echo $eachrecord[es_departmentsid];?>" <?php echo ($eachrecord[es_departmentsid]==	$st_department)?"selected":""?>  ><?php echo $eachrecord[es_deptname];?></option>
					           <?php } ?>
					             </select></td>
					           </tr>
					  
						      <tr align="left" valign="middle">
							   <td>&nbsp;</td>
							   <td class="narmal">Post Applied For <font color="#FF0000">*</font></td>
							   <td>:</td>
							
							  <td>
								<select name="st_postaplied" onchange="JavaScript:document.viewstaff.submit();" style="width:150px;">
								   <option value="select" >Select</option>
								   <?php if(count($es_postList) > 0 ){
								   foreach ($es_postList as $eachrecord){ ?>
								   <option value="<?php echo $eachrecord->es_deptpostsId;?>" <?php echo ($eachrecord->es_deptpostsId==$st_postaplied)?"selected":""?>  ><?php echo $eachrecord->es_postname;?></option>
								   <?php    } }?>
								</select></td>
						     </tr>
						      <tr>
							  <td>&nbsp;</td>
							  <td colspan="3">
				  <div id="feedback" style="display:<?php if($a!="") echo "none"; else "block"; ?>;">
				  <table border="0" width="100%" >
				   <tr align="left" valign="middle">
								
								<td width="41%" class="narmal">Class <font color="#FF0000">*</font></td>
								<td width="5%">:</td>
						  <td width="54%">
								<select name="st_class" onchange="JavaScript:document.viewstaff.submit();" style="width:150px;" >
								<option value="">-Select-</option>
									<?php foreach($getclasslist as $eachrecord) { ?>
									<option value="<?php echo $eachrecord[es_classesid];?>" <?php echo ($eachrecord[es_classesid]==$st_class)?"selected":""?>  ><?php echo $eachrecord[es_classname];?></option>
				                  <?php } ?>
	                      </select></td>
				        </tr> 
							   <tr align="left" valign="middle">
								
								<td class="narmal">Primary Subject <font color="#FF0000">*</font></td>
								<td>:</td>
								<td>
								<select name="st_subject" style="width:150px;">
								<option value="">-Select-</option>
											
							  <?php if(count($es_subjectList) > 0 ){
							   foreach ($es_subjectList as $eachrecord){ ?>
							   <option value="<?php echo $eachrecord->es_subjectId;?>" <?php echo ($eachrecord->es_subjectId==$st_subject)?"selected":""?>  ><?php echo $eachrecord->es_subjectname;?></option>
							   <?php    } }?>
							   </select></td>
							  </tr>  
							  <?php /*?> <tr align="left" valign="middle">
								
								<td class="narmal">Secondary Subject </td>
								<td>:</td>
								<?php
								/*$sub=$es_staffList2->st_primarysubject;
								$sub1=explode(",",$sub);
								?>
								<td><input name="st_theme" type="hidden" id="st_theme" value="pink.css" />
								 <input name="st_primsub" type="text" id="st_primsub" value="<?php echo $st_primsub ?>"/></td>
							  </tr><?php */?>
							  <tr>
                       
                        <td align="left" valign="middle" class="narmal">Can prepare & upload Assignment</td>
                        <td align="left" valign="middle">:</td>
                        <td colspan="4" align="left" valign="middle"><input type="checkbox" name="st_permissions[]" value="1" 
						<?php if (in_array('1', $st_permissions)== TRUE){ echo "checked='checked'"; } ?>  /></td>
                      </tr>
					  <tr>
                      
                        <td align="left" valign="middle" class="narmal">Can mark Attendence</td>
                        <td align="left" valign="middle">:</td>
                        <td colspan="4" align="left" valign="middle"><input type="checkbox" name="st_permissions[]" value="2" 
						<?php if (in_array('2', $st_permissions)== TRUE){ echo "checked='checked'"; } ?>  /></td>
                      </tr>
					  <tr>
                       
                        <td align="left" valign="middle" class="narmal">Can prepare & upload Examination</td>
                        <td align="left" valign="middle">:</td>
                        <td colspan="4" align="left" valign="middle"><input type="checkbox" name="st_permissions[]" value="3" 
						<?php if (in_array('3', $st_permissions)== TRUE){ echo "checked='checked'"; } ?>  /></td>
                      </tr>
					  <tr>
                       
                        <td align="left" valign="middle" class="narmal">Can enter Obtained Marks</td>
                        <td align="left" valign="middle">:</td>
                        <td colspan="4" align="left" valign="middle"><input type="checkbox" name="st_permissions[]" value="4" 
						<?php if (in_array('4', $st_permissions)== TRUE){ echo "checked='checked'"; } ?>  /></td>
                      </tr>
				  </table>
				  </div>
				  <script language="javascript" type="text/javascript">
				  	showtable();
				  </script>
				  </td>
				  </tr>
							  <tr align="left" valign="middle">
								<td>&nbsp;</td>
								<td class="narmal">Username <font color="#FF0000">*</font></td>
								<td>:</td>
								<td colspan="4" ><input name="st_user" type="text" id="st_user"  value="<?php echo $st_user ?>" /></td>
							  </tr>
								  
							  <?php
							  if($action=='addnewstaff')
							  {
							  ?>
							  <tr align="left" valign="middle">
								<td>&nbsp;</td>
								<td class="narmal">Password <font color="#FF0000">*</font></td>
								<td>:</td>
								<td colspan="4"><input name="st_password" type="password" id="st_password" value=""/></td>
							  </tr>
							  <?php
							  }
							  ?>
                     
							  <tr align="left" valign="middle">
								<td>&nbsp;</td>
								<td class="narmal">Email</td>
								<td>:</td>
								<td colspan="4"><input name="st_email" type="text" id="st_email" value="<?php echo $st_email ?>"/></td>
							  </tr>
							  
							   <tr align="left" valign="middle">
								<td>&nbsp;</td>
								<td class="narmal">Nationality</td>
								<td>:</td>
								<td colspan="4"><input name="st_noofsons" type="text" id="st_noofsons" value="<?php echo $st_noofsons ?>"/></td>
							  </tr>
							  
							  
							  
							  
							  <tr>
                              <td width="2%">&nbsp;</td>
                              <td width="19%"  class="narmal">Give Information about your family</td>
                              <td width="2%">:</td>
                              <td width="25%"  class="narmal">
						  
							  <textarea name="st_faminfo" cols="12" rows="2" id="st_faminfo"><?php if($st_faminfo!='') echo stripslashes($st_faminfo);if(isset($es_staffList1)&&$st_faminfo!='') echo stripslashes($st_faminfo);if(isset($es_staffList1->st_faminfo)&&$es_staffList1->st_faminfo!='') echo stripslashes($es_staffList2->st_faminfo); ?></textarea>
							  </td>
                              <td width="12%">&nbsp;</td>
                              <td width="22%">&nbsp;</td>
                              <td width="9%">&nbsp;</td>
                              <td width="9%">&nbsp;</td>
                          </tr>
							  
							   <tr>
                              <td width="2%">&nbsp;</td>
                              <td width="19%"  class="narmal">Hobbies</td>
                              <td width="2%">:</td>
                              <td width="25%"  class="narmal">
						  
							  <textarea name="st_hobbies" cols="12" rows="2" id="st_hobbies"><?php if($st_hobbies!='') echo stripslashes($st_hobbies);if(isset($st_hobbies)&&$st_hobbies!='') echo stripslashes($st_hobbies);if(isset($es_staffList1->st_hobbies)&&$es_staffList1->st_hobbies!='') echo stripslashes($es_staffList2->st_hobbies); ?></textarea>
							  </td>
                              <td width="12%">&nbsp;</td>
                              <td width="22%">&nbsp;</td>
                              <td width="9%">&nbsp;</td>
                              <td width="9%">&nbsp;</td>
                          </tr>
							  
								  
							  <!-- <tr align="left" valign="middle">
								<td>&nbsp;</td>
								<td class="narmal">Comments</td>
								<td>:</td>
								<td colspan="4"><textarea name="st_remarks" cols="18" id="st_remarks"><?php// echo $st_remarks; ?></textarea></td>
							  </tr>-->
							  
							   </tr>
							  
							   <tr align="left" valign="middle">
								<td>&nbsp;</td>
								<td class="narmal">Marital Status</td>
								<td>:</td>
								<td colspan="4"><input type="radio" name="st_marital" id="st_marital" value="Married"/>Married&nbsp;&nbsp;<input type="radio" name="st_marital" id="st_marital" value="Unmarried"/>Unmarried</td>
							  </tr>
							   
							   </tr>
							  
							   <tr align="left" valign="middle">
								<td>&nbsp;</td>
								<td class="narmal">Experience</td>
								<td>:</td>
								<td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;<input name="st_experience" type="text" id="st_experience" value="<?php echo $st_experience ?>"/></td>
							  </tr>
							  
							  </tr>
							  
							  <tr align="left" valign="middle">
								<td>&nbsp;</td>
								<td class="narmal">Attached Documents</td>
								<td>:</td>
								<td colspan="4">1. <input name="st_attach1" type="text" id="st_attach1" value="<?php echo $st_attach1 ?>"/></td>
								
							  </tr>
							  
							  <tr align="left" valign="middle">
							  	<td></td>
							  	<td></td>
							  	<td></td>
							  	<td colspan="4">2. <input name="st_attach2" type="text" id="st_attach2" value="<?php echo $st_attach2 ?>"/></td>
							  </tr>
							  
							  <tr align="left" valign="middle">
							  	<td></td>
							  	<td></td>
							  	<td></td>
							  	<td colspan="4">3. <input name="st_attach3" type="text" id="st_attach3" value="<?php echo $st_attach3 ?>"/></td>
							  </tr>
							  
							  <tr align="left" valign="middle">
							  	<td></td>
							  	<td></td>
							  	<td></td>
							  	<td colspan="4">4. <input name="st_attach4" type="text" id="st_attach4" value="<?php echo $st_attach4 ?>"/></td>
							  </tr>
							  
							  <tr align="left" valign="middle">
							  	<td></td>
							  	<td></td>
							  	<td></td>
							  	<td></td>
							  </tr>
							  
							  </tr>
							   
							   
							   
							    <tr align="left" valign="middle">
								<td>&nbsp;</td>
								<td class="narmal">Do You Belong to Reserved Category</td>
								<td>:</td>
								<td colspan="4"><select name="st_category" id="st_category">
												<option value="">Select</option>
												<option value="SC">SC</option>
												<option value="ST">ST</option>
												<option value="OBC">OBC</option>
												<option value="VJ/NT">VJ/NT</option>
												<option value="SBC">SBC</option>
												<option value="OTHER">OTHER</option>
								</select>
								</td>
							  </tr>
							   
                      <tr>
                        <td valign="top">&nbsp;</td>
                        <td align="left" valign="middle" class="narmal">Blood Group</td>
                        <td align="left" valign="middle">:</td>
                        <td colspan="4" align="left" valign="middle"><input name="st_bloodgroup" type="text" id="st_bloodgroup" value="<?php if($st_bloodgroup!='') echo $st_bloodgroup; ?>" />
						
						</td>
                      </tr>
				
							  <tr align="left" valign="middle">
								<td>&nbsp;</td>
								<td class="narmal">Upload Photo </td>
								<td>:</td>
								<td colspan="4"><input type="file" name="image"    value="" id="picField" /></td>
							  </tr>
							
							  <tr align="left" valign="middle">
								<td>&nbsp;</td>
								<td class="narmal">Date Of Birth <font color="#FF0000">*</font></td>
								<td>:</td>
								<td colspan="4">
									<table width="29%" border="0" cellspacing="0" cellpadding="0">
										<tr>
											 <td width="17%"><input name="st_dob" value="<?php echo $st_dob; ?>"  type="text"size="14" onchange="return registrationvalid()"  id="st_doj" readonly/></td>
											<td width="83%"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.viewstaff.st_dob);return false;" ><img name="popcal" align="absmiddle" src="<?php echo JS_PATH ?>/WeekPicker/calbtn.gif" width="34" height="22" border="0" alt="" /></a></td>
											<td>&nbsp;</td>
										</tr>
																				
								   </table>	
					            </td>
                               </tr>
							   
							   
							   
							   
							   
							   
							   
							   
							   
			           <tr align="left" valign="middle">
                        <td colspan="7" class="bgcolor_02"> <strong>Qualification</strong></td>
                      </tr>
					  <tr>
                        <td colspan="7" > </td>
                      </tr>
					  
                      <tr>
                        <td>&nbsp;</td>
                        <td colspan="6" align="left" valign="middle" class="narmal">
						  <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" class="tbl_grid">
                            <tr>
                              <td width="7%" height="20" class="bgcolor_02"><strong>&nbsp;S No </strong></td>
                              <td width="31%" class="bgcolor_02"><strong>&nbsp;&nbsp;&nbsp;Exam Passed </strong></td>
							  <td width="31%" class="bgcolor_02"><strong>&nbsp;&nbsp;&nbsp;Marks Obtained </strong></td>
                              <td width="35%" class="bgcolor_02"><strong>&nbsp;&nbsp;Board / University </strong></td>
                              <td width="27%" class="bgcolor_02"><strong>&nbsp;&nbsp;Year/session</strong></td>
                            </tr>
                            <tr>
                              <td class="narmal"><input name="st_sno1" type="text" id="st_sno1" size="5"  value="1"/></td>
                              <td class="narmal"><input name="st_pass1" type="text" id="st_pass1" size="30"  value="<?php echo $st_pass1;?>"/></td>
							  <td class="narmal"><input name="st_marks1" type="text" id="st_marks1" size="20"  value="<?php echo $st_marks1;?>"/></td>
                              <td class="narmal"><input name="st_board1" type="text" id="st_board1" size="30" value="<?php echo $st_board1;?>" /></td>
                              <td class="narmal"><input name="st_year1" type="text" id="st_year1" size="20" value="<?php echo $st_year1;?>" /></td>
                            </tr>
                            <tr>
                              <td class="narmal"><input name="st_sno2" type="text" id="st_sno2" size="5"  value="2"/></td>
                              <td class="narmal"><input name="st_pass2" type="text" id="st_pass2" size="30"  value="<?php echo $st_pass2;?>"/></td>
							  <td class="narmal"><input name="st_marks2" type="text" id="st_marks2" size="20" value="<?php echo $st_marks2;?>"/></td>
                              <td class="narmal"><input name="st_board2" type="text" id="st_board2" size="30"value="<?php echo $st_board2;?>" /></td>
                              <td class="narmal"><input name="st_year2" type="text" id="st_year2" size="20" value="<?php echo $st_year2;?>"/></td>
                            </tr>
                            <tr>
                              <td class="narmal"><input name="st_sno3" type="text" id="st_sno3" size="5"  value="3"/></td>
                              <td class="narmal"><input name="st_pass3" type="text" id="st_pass3" size="30" value="<?php echo $st_pass3;?>"/></td>
							  <td class="narmal"><input name="st_marks3" type="text" id="st_marks3" size="20"  value="<?php echo $st_marks3;?>"/></td>
                              <td class="narmal"><input name="st_board3" type="text" id="st_board3" size="30" value="<?php echo $st_board3;?>"/></td>
                              <td class="narmal"><input name="st_year3" type="text" id="st_year3" size="20" value="<?php echo $st_year3;?>"/></td>
                            </tr>
                        </table></td>
						
                      </tr>
					  <tr>                        
                        <td class="bgcolor_02" colspan="7" valign="top"><strong>Experience</strong></td>
                      </tr>
					  <tr>                        
                        <td  colspan="7" valign="top"></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td colspan="6" class="narmal">
						<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" class="tbl_grid">
                            <tr>
                              <td width="7%" height="20" class="bgcolor_02"><strong>&nbsp;S No </strong></td>
                              <td width="31%" class="bgcolor_02"><strong>&nbsp;&nbsp;Institution</strong></td>
                              <td width="35%" class="bgcolor_02"><strong>&nbsp;&nbsp;&nbsp;Position</strong></td>
                              <td width="27%" class="bgcolor_02"><strong>Period</strong></td>
                            </tr>
                            <tr>
                              <td class="narmal"><input name="st_sno4" type="text" id="st_sno4" size="5"  value="1"/></td>
                              <td class="narmal"><input name="st_inst1" type="text" id="st_inst1" size="45"  value="<?php echo $st_inst1;?>"/></td>
                              <td class="narmal"><input name="st_position1" type="text" id="st_position1" size="35"value="<?php echo $st_position1;?>" /></td>
                              <td class="narmal"><input name="st_period1" type="text" id="st_period1" size="25" value="<?php echo $st_period1;?>"/></td>
                            </tr>
                            <tr>
                              <td class="narmal"><input name="st_sno5" type="text" id="st_sno5" size="5"  value="2"/></td>
                              <td class="narmal"><input name="st_inst2" type="text" id="st_inst2" size="45" value="<?php echo $st_inst2;?>" /></td>
                              <td class="narmal"><input name="st_position2" type="text" id="st_position2" size="35" value="<?php echo $st_position2;?>" /></td>
                              <td class="narmal"><input name="st_period2" type="text" id="st_period2" size="25" value="<?php echo $st_period2;?>" /></td>
                            </tr>
                            <tr>
                              <td class="narmal"><input name="st_sno6" type="text" id="st_sno6" size="5" value="3" /></td>
                              <td class="narmal"><input name="st_inst3" type="text" id="st_inst3" size="45"  value="<?php echo $st_inst3;?>"/></td>
                              <td class="narmal"><input name="st_position3" type="text" id="st_position3" size="35"  value="<?php echo $st_position3;?>"/></td>
                              <td class="narmal"><input name="st_period3" type="text" id="st_period3" size="25" value="<?php echo $st_period3;?>" /></td>
                            </tr>
                        </table></td>
                      </tr>					  
				<tr>
                   <td  colspan="7" class="bgcolor_02"><strong>&nbsp;&nbsp;Present Address</strong></td>
                 </tr>		  
					  
                      <tr>
                        <td valign="top">&nbsp;</td>
                        <td colspan="6" valign="top" class="narmal">
						<table width="100%" border="0" align="center" cellpadding="0" cellspacing="3"> 
						<tr>
                              <td width="2%">&nbsp;</td>
                              <td width="19%"  class="narmal">Address</td>
                              <td width="2%">:</td>
                              <td width="25%"  class="narmal">
						  
							  <textarea name="st_address" cols="12" rows="2" id="st_address"><?php if($st_address!='') echo stripslashes($st_address);if(isset($es_staffList1)&&$st_address!='') echo stripslashes($st_address);if(isset($es_staffList1->st_peadress)&&$es_staffList1->st_pradress!='') echo stripslashes($es_staffList2->st_peadress); ?></textarea>
							  </td>
                              <td width="12%">&nbsp;</td>
                              <td width="22%">&nbsp;</td>
                              <td width="9%">&nbsp;</td>
                              <td width="9%">&nbsp;</td>
                          </tr>
                            <tr>
                              <td>&nbsp;</td>
                              <td  class="narmal">City</td>
                              <td>:</td>
                              <td><input name="st_city" type="text" id="st_city" size="15"  value="<?php echo $st_city;?>"/></td>
                              <td  class="narmal">State</td>
							  <td><input name="st_state" type="text" id="st_state" size="15" value="<?php echo $st_state;?>" /></td>
                              <td  class="narmal">&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                              <td>Country</td>
                              <td>&nbsp;</td>
                              <td><input name="st_country" type="text" id="st_country" size="15"  value="<?php echo $st_country;?>"/></td>
                              <td>Post Code </td>
                              <td><input name="st_pin" type="text" id="st_pin" size="15" value="<?php echo $st_pin;?>" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>
                     
                            <tr>
                              <td>&nbsp;</td>
                              <td  class="narmal">Phone </td>
                              <td>:</td>
                              <td><input name="st_phone" type="text" id="st_phone" size="15" value="<?php echo $st_phone;?>"/></td>
                              <td  class="narmal">Mobile&nbsp;</td>
                              <td><input name="st_mobile" type="text" id="st_mobile" size="15"  value="<?php echo $st_mobile;?>" />&nbsp;<font color="#FF0000"><b>*</b></font></td>
                              <td  class="narmal">&nbsp;</td>
                              <td>&nbsp;</td>
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
                        </table>
						<script type="text/javascript">
	function getfieldvalues(){
		if (document.getElementById('sameaddress').checked){
			document.viewstaff.st_peadress.value = document.viewstaff.st_address.value;
			
			document.viewstaff.st_pecity.value    = document.viewstaff.st_city.value;
			document.viewstaff.st_pestate.value 	= document.viewstaff.st_state.value;			
			document.viewstaff.st_pecountry.value = document.viewstaff.st_country.value;			
			document.viewstaff.st_pephone.value   = document.viewstaff.st_phone.value;
			document.viewstaff.st_pemobno.value  = document.viewstaff.st_mobile.value;
			document.viewstaff.st_pepin.value 	= document.viewstaff.st_pin.value;
		}else{
			document.viewstaff.st_peadress.value = "";
			
			document.viewstaff.st_pecity.value    = "";
			document.viewstaff.st_pestate.value 	= "";			
			document.viewstaff.st_pecountry.value = "";			
			document.viewstaff.st_pephone.value   = "";
			document.viewstaff.st_pemobno.value  = "";
			document.viewstaff.st_pepin.value 	= "";
		}
  }
</script></td>
                      </tr>
					  <tr>
                         <td  colspan="7" class="bgcolor_02"><span class="admin">&nbsp;Permanent Address <input type="checkbox" name="sameaddress" id="sameaddress" value="0" onclick="javascript:getfieldvalues()" />Same as Above</td>
                      </tr>
					  			  
                      <tr>
                        <td valign="top">&nbsp;</td>
                        <td colspan="6" valign="top" class="narmal">
						<table width="100%" border="0" align="center" cellpadding="0" cellspacing="3">               
                            <tr>
                              <td width="2%">&nbsp;</td>
                              <td width="19%"  class="narmal">Address</td>
                              <td width="2%">:</td>
                              <td width="25%"><textarea name="st_peadress" cols="12" rows="2" id="st_peadress"><?php if($st_peadress!='') echo stripslashes($st_peadress); ?></textarea></td>
                              <td width="12%">&nbsp;</td>
                              <td width="22%">&nbsp;</td>
                              <td width="11%">&nbsp;</td>
                              <td width="7%">&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                              <td  class="narmal">City</td>
                              <td>:</td>
                              <td><input name="st_pecity" type="text" id="st_pecity" size="15"  value="<?php echo $st_pecity;?>"/></td>
                              <td  class="narmal">State</td>
                              <td><input name="st_pestate" type="text" id="st_pestate" size="15" value="<?php echo $st_pestate;?>" /></td>
                              <td  class="narmal">&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>  
                            <tr>
                              <td>&nbsp;</td>
                              <td>Country</td>
                              <td>&nbsp;</td>
                              <td><input name="st_pecountry" type="text" id="st_pecountry" size="15" value="<?php echo $st_pecountry;?>" /></td>
                              <td>Post Code </td>
                              <td><input name="st_pepin" type="text" id="st_pepin" size="15" value="<?php echo $st_pepin;?>"/></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>                    
                            <tr>
                              <td  class="narmal">&nbsp;</td>
                              <td  class="narmal">Phone </td>
                              <td>:</td>
                              <td><input name="st_pephone" type="text" id="st_pephone" size="15" value="<?php echo $st_pephone;?>" /></td>
                              <td  class="narmal">Mobile&nbsp;</td>
                              <td ><input name="st_pemobno" type="text" id="st_pemobno" size="15" value="<?php echo $st_pemobno;?>" /></td>
                              <td  class="narmal">&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>
                                                      
                        </table>
						</td>
                      </tr>					  
					 
                      
					   <tr>
                           <td  colspan="7" ></td>
                       </tr>
                      
                      <?php
					  if($action=='addnewstaff')
	                  {
			          ?>
                      <tr>
                        <td colspan="7" >&nbsp;</td>
                      </tr>
                      <tr>
                           <td  colspan="7" align="left" class="bgcolor_02">&nbsp;
                            <span><strong class="admin">Selected</strong></span></td>
                      </tr>
                      <tr>
                        <td colspan="7" >&nbsp;</td>
                      </tr>
                      <tr>
                        <td width="7%">&nbsp;</td>
                        <td align="right" class="narmal" >Previous Package</td>
                        <td align="center" >:</td>
                        <td><input name="st_prvpac" type="text" id="st_prvpac"  value="<?php echo $st_prvpac; ?>"/></td>
                        <td colspan="3">&nbsp;</td>
                      </tr>
                      <tr>
                        <td width="7%">&nbsp;</td>
                        <td align="right" class="narmal" >Basic<font color="#FF0000"><b> *</b></font></td>
                        <td align="center">:</td>
                        <td><input name="st_basic" type="text" id="st_basic" value="<?php echo $st_basic; ?>" />&nbsp;</td>
                        <td colspan="3">&nbsp;</td>
                      </tr>
                      <tr>
                        <td width="7%">&nbsp;</td>
                        <td align="right" class="narmal" >Date&nbsp;Of&nbsp;Joining<font color="#FF0000"><b> *</b></font> </td>
                        <td align="center">:</td>
                        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="17%"><input name="st_doj2"  value="<?php echo $st_doj2;?>"  type="text"size="14" readonly /></td>
                              <td width="83%"><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.viewstaff.st_doj2);return false;" ><img name="popcal" align="absmiddle" src="<?php echo JS_PATH ?>/WeekPicker/calbtn.gif" width="34" height="22" border="0" alt="" /></a>&nbsp;</td>
                            </tr>
                          </table>
                            <iframe width=199 height=178 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="<?php echo JS_PATH ?>/WeekPicker/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"> </iframe></td>
                        <td colspan="3">&nbsp;</td>
                      </tr>
                      
                      <tr>
                        <td width="7%">&nbsp;</td>
                        <td align="right" class="narmal" >Remarks</td>
                        <td align="center">:</td>
                        <td><textarea name="textarea" cols="16" id="textarea"><?php if($st_remarks!='') echo $st_remarks; ?></textarea></td>
                        <td colspan="3">&nbsp;</td>
                      </tr>          
                      <tr>
                           <td  colspan="7" align="left" class="bgcolor_02">&nbsp;
                            <span><strong class="admin">TRANSPORT</strong></span></td>
                      </tr>
                      <tr>
                        <td colspan="7" >&nbsp;</td>
                      </tr>
                      <tr>
                        <td width="7%">&nbsp;</td>
                        <td align="right" class="narmal" >Transport</td>
                        <td align="center" >:</td>                       
                        <td colspan="3"><input type="checkbox" name="transport" value="YES" <?php if($transport=="YES"){?> checked="checked"<?php }?> /></td>
                      </tr>
                      <tr>
                        <td width="7%">&nbsp;</td>
                        <td align="right" class="narmal" >Route / Board</td>
                        <td align="center">:</td>                        
                        <td colspan="3">
                           <select name="boardid">
                           <option value="">Select Route/Board</option>
                           <?php
                           $route_sql="SELECT * FROM es_trans_route R WHERE R.status!='Delete'";
                           $route_exe=mysql_query($route_sql);
                           while($route_row=mysql_fetch_array($route_exe)){?>
                           <optgroup label="<?php echo $route_row['route_title']." -(".substr($route_row['route_Via'],0,25).")"; ?>">
                           <?php
                           $board_sql="SELECT * FROM es_trans_board B WHERE B.status!='Delete' AND B.route_id=".$route_row['id'];
                           $board_exe=mysql_query($board_sql);
                           while($board_row=mysql_fetch_array($board_exe)){
							   $query_sql="SELECT * FROM es_trans_board_allocation_to_student WHERE status='Active' AND board_id=".$board_row['id'];
							   $query_exe=mysql_query($query_sql);
							   $query_num=mysql_num_rows($query_exe);
							   
							   if($query_num<$board_row['capacity']){
                               
                               ?>													   
                           <option value="<?php echo $board_row['id']; ?>" <?php if($boardid==$board_row['id']){?> selected="selected"<?php }?>><?php echo $board_row['board_title']; ?></option>
                           <?php }}?>
                           </optgroup>
                           <?php }?>
                           </select>
                        
                        </td>
                      </tr>              
                      <?php } ?>
                      <tr>
                        <td valign="top">&nbsp;</td>
                        <td colspan="6" align="center" valign="top" class="narmal"><?php if($action=='addnewstaff')
                        {?>
						
						<?php if(in_array('10_7',$admin_permissions) ){?> <input name="staffading" type="submit" class="bgcolor_02" value="Add Staff" style="cursor:pointer"/><?php }?>
                           
                            <?php } ?>
                            <?php if($action=='addnewstaff1')
                        {?>
                            <input name="updateading" type="submit" class="bgcolor_02" value="Update" style="cursor:pointer"/>
                            <?php }?>
                            <?php /*?><input name="back2" type="submit" class="bgcolor_02" value="Back" style="cursor:pointer"/><?php */?></td>
                      </tr>
                      
                    </table>
					    </td>
                  </tr>
                  </table>
				</td>
				
                <td width="1" class="bgcolor_02"></td>
              </tr>
			  
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
          </tr>
	</form>
</table>
<?php }?>
