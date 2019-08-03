<?php
/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
?>
<script>
function logs(MyWin,user_id,table_name,record_id,action)
    {
	winpopup=window.open(MyWin+'?user_id='+user_id+'&table_name='+table_name+'&record_id='+record_id+'&action='+action,table_name+user_id,'height=222,width=555,menubar=no,scrollbars=yes,status=no,toolbar=no,sereenX=100,screenY=0,left=100,top=0,class=text');	
	winpopup.moveTo(111,25);
	}
</script>
<?php

if ($action=='registration' && $disptype=="studentmarks"){ ?>
<script type="text/javascript">
function newWindowOpen(href)
{
    window.open(href,null, 'width=700,height=700,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');
}
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
  </tr>
	<tr>
		<td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Entrance Test</span></td>
  </tr>
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td  align="left" valign="top">
           
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr><td align="left" valign="top">&nbsp;</td></tr>
                
                <tr><td align="left" valign="top">&nbsp;</td></tr>
				<tr>
					<td height="50" align="left" valign="top">
						<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
							<tr>
								<td height="23" align="left" valign="top">
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td align="left" valign="middle" class="admin">
											<form action="" name="regform" method="post"><table width="100%" border="0" cellspacing="0" cellpadding="0">								
													<tr>
														<td>
															<table width="90%" border="0" cellspacing="3" cellpadding="0">
															
																<tr>
																  <td align="left" class="narmal">&nbsp;&nbsp;Applicant Name</td>
																  <td align="left" class="narmal"><input type="text" value="<?php echo $es_enquiryList['eq_wardname']; ?>" name="eq_wardname"  readonly="readonly" /></td>
																  <td>&nbsp;</td>
															  </tr>
																<tr>
																  <td align="left" class="narmal">&nbsp;&nbsp;Gender</td>
																  <td align="left" class="narmal"><input type="text" name="eq_sex" value="<?php if($es_enquiryList['eq_sex']=='male') { echo "Male";} else { echo "Female";} ?>" readonly  /></td>
																  <td>&nbsp;</td>
															  </tr>
															
<tr>
																  <td align="left" class="narmal">&nbsp;&nbsp;Class</td>
																  <td align="left" class="narmal">
                  
                                  <?php   $student_detclass=$db->getRow("SELECT * FROM es_classes WHERE es_classesid='".$es_enquiryList['pre_class']."'");
									
										?>
                                       
                                      <?php ($student_detclass['es_classname']); ?>
                                                                  
                                                                  <input type="text" value="<?php if($es_enquiryList['pre_class']!=''){  echo ucwords($student_detclass['es_classname']);} else{ echo "---"; } ?>" name="eq_wardname"  readonly="readonly" /></td>
																  <td>&nbsp;</td>
															  </tr>
													<tr>
																  <td align="left" class="narmal">&nbsp;&nbsp;Subject</td>
                                                                  
																  <td align="left" class="narmal">
     <?php   $student_detclass1=$db->getRow("SELECT * FROM subjects_cat WHERE scat_id 	='".$es_enquiryList['scat_id']."'");
									
										?>
                                       
                                      <?php $student_detclass1['scat_name']; ?>
                                                                  
                                                                  <input type="text" value="<?php if($es_enquiryList['scat_id']!=''){  echo $student_detclass1['scat_name'];} else{ echo "---"; }  ?>" name="eq_wardname"  readonly="readonly" /></td>
																  <td>&nbsp;</td>
															  </tr>
															  
															  
																<tr>
																	<td width="35%" align="left" class="narmal">&nbsp;&nbsp;Father / Guardian Name</td>
																	<td width="49%" align="left" class="narmal"><input type="text" value="<?php echo $es_enquiryList['eq_name']; ?>" name="eq_name"  readonly="readonly" />
																    <input type="hidden" value="update" name="update"/>
															      <input type="hidden" value="<?php echo $uid; ?>" name="es_enquiryId"/></td>
																	<td width="16%">&nbsp;</td>
																</tr>
																<tr>
																  <td align="left" class="narmal">&nbsp;&nbsp;Mother Name</td>
																  <td align="left" class="narmal"><input type="text" value="<?php echo $es_enquiryList['eq_mothername']; ?>" name="eq_mothername"  readonly="readonly" /></td>
																  <td></td>
															  </tr>
																<tr>
																	<td align="left" class="narmal">&nbsp;&nbsp;Address </td>
																	<td align="left" class="narmal"><input type="text" value="<?php echo $es_enquiryList['eq_address']; ?>" name="eq_address"  readonly /></td>
																	<td></td>
																</tr>
																 <tr>
																	<td align="left" class="narmal">&nbsp;&nbsp;City </td>
																	<td align="left" class="narmal"><input type="text" value="<?php echo $es_enquiryList['eq_city']; ?>" name="eq_city"  readonly /></td>
																	<td></td>
																</tr>
																 <tr>
																	<td align="left" class="narmal">&nbsp;&nbsp;State </td>
																	<td align="left" class="narmal"><input type="text" value="<?php echo $es_enquiryList['eq_state']; ?>" name="eq_state"  readonly /></td>
																	<td></td>
																</tr>
																 <tr>
																   <td align="left" class="narmal">&nbsp;&nbsp;Country</td>
																   <td align="left" class="narmal"><input type="text" value="<?php echo $es_enquiryList['eq_countryid']; ?>" name="eq_countryid"  readonly /></td>
																   <td></td>
														      </tr>
															    <tr>
																	<td align="left" class="narmal">&nbsp;&nbsp;Email Id</td>
																	<td align="left" class="narmal"><input type="text" value="<?php echo $es_enquiryList['eq_emailid']; ?>" name="eq_emailid"  readonly /></td>
																	<td></td>
																</tr>
																<tr>
																  <td align="left" class="narmal">&nbsp;&nbsp;Postal Code</td>
																  <td align="left" class="narmal"><input type="text" value="<?php echo $es_enquiryList['eq_zip']; ?>" name="eq_zip"  readonly /></td>
																  <td></td>
															  </tr>
																<tr>
																  <td align="left" class="narmal">&nbsp;&nbsp;Date of Birth</td>
																  <td align="left" class="narmal"><input type="text" value="<?php if($es_enquiryList['eq_dob']=="0000-00-00"){ echo "---"; } else { 
																  $new_dob = func_date_conversion('Y-m-d','d/m/Y',$es_enquiryList['eq_dob']);
																  echo $new_dob; } ?>" name="eq_dob"  readonly="readonly" /></td>
																  <td></td>
															  </tr>
																<tr>
																	<td align="left" class="narmal">&nbsp;&nbsp;Phone No </td>
																	<td align="left" class="narmal"><input type="text" value="<?php echo $es_enquiryList['eq_phno'];?>" name="eq_phno"  readonly="readonly" /></td>
																	<td></td>
																</tr>
																<tr>
																	<td align="left" class="narmal">&nbsp;&nbsp;Mobile No </td>
																	<td align="left" class="narmal"><input type="text" value="<?php echo $es_enquiryList['eq_mobile']; ?>" name="eq_mobile"  readonly="readonly" /></td>
																	<td></td>
																</tr>
																<?php /*?><tr>
																	<td align="left" class="narmal">&nbsp;&nbsp;Admission for Class </td>
																	<td align="left" class="narmal"><input type="hidden" name="eq_class" value="<?php  if($es_enquiryList['eq_class']!='') { echo $es_enquiryList['eq_class']; } else { echo "---";}?>" />
                                                                      <input type="text" value="<?php if($es_enquiryList['eq_class']!='') { echo classname($es_enquiryList['eq_class']); } else { echo "---";} ?>" name="class_id"  readonly="readonly" /></td>
																	<td>&nbsp;</td>
																</tr><?php */?>
																<tr>
																  <td align="left" class="narmal">&nbsp;&nbsp;Previous Academics</td>
																  <td align="left" class="narmal"><input type="text" value="<?php echo $es_enquiryList['eq_prv_acdmic']; ?>" name="eq_prv_acdmic"  readonly /></td>
																  <td>&nbsp;</td>
															  </tr>
																<tr>
																  <td align="left" class="narmal">&nbsp;&nbsp;Enquired on</td>
																  <td align="left" class="narmal"><input type="text" value="<?php echo formatDBDateTOCalender($es_enquiryList['eq_createdon']);?>" name="eq_createdon"  readonly /></td>
																  <td>&nbsp;</td>
															  </tr>
																<tr>
																  <td align="left" class="narmal">&nbsp;&nbsp;Reference Type</td>
																  <td align="left" class="narmal"><input type="text" value="<?php echo $es_enquiryList['eq_reftype']; ?>" name="eq_reftype" readonly/></td>
																  <td>&nbsp;</td>
															  </tr>
																<tr>
																  <td align="left" class="narmal">&nbsp;&nbsp;Reference Name</td>
																  <td align="left" class="narmal"><input type="text" value="<?php echo $es_enquiryList['eq_refname']; ?>" name="eq_refname" readonly/></td>
																  <td>&nbsp;</td>
															  </tr>
																<tr>
																  <td align="left" class="narmal">&nbsp;&nbsp;Details</td>
																  <td align="left" class="narmal">
                                                                  <textarea name="eq_description" cols="30" rows="5" readonly><?php echo $es_enquiryList['eq_description']; ?></textarea>                                                                 </td>
																  <td>&nbsp;</td>
															  </tr>			
															</table>
													  </td>
													</tr>
													<tr>
														<td>
														
													<table border="0" cellpadding="0" cellspacing="0" width="100%">
														<tr height="25">
														<td class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Form Purchase </span></td>
													</tr>
													
														<td>
											<table width="100%" border="0" cellspacing="0" cellpadding="0">
											<tr>
												<td width="390" align="left" valign="top" class="narmal">&nbsp;&nbsp;Form Type </td>
											  <td width="12" align="left" valign="top"></td>
											  <td width="884" align="left" valign="top" class="narmal"><select name="eq_formtype" style="width:150px;" disabled="disabled" >
												<?php foreach ($obj_grouplistarr as $eachrecord){ ?>
												<option value="<?php echo $eachrecord->es_groupsId; ?>" <?php if($es_enquiryList['eq_formtype']==$eachrecord->es_groupsId) { ?>selected="selected"<?php } ?>><?php echo $eachrecord->es_groupname; ?></option>                            
												<?php } ?>							
											  </select></td>
											</tr>
											<tr>
                                       		  <td align="left" valign="top" class="narmal">&nbsp;&nbsp;Payment Mode</td>
                                       		  <td align="left" valign="top" class="narmal"></td>
                                       		  <td align="left" valign="top" class="narmal"><input type="text" readonly name="eq_paymode" value="<?php echo $es_enquiryList['eq_paymode'];?>"></td>
                                   		    </tr>
											
											  <tr>
												  <td align="left" valign="top" class="narmal">&nbsp;&nbsp;Amount Paid</td>
												  <td align="left" valign="top" class="narmal"></td>
												  <td align="left" valign="top" class="narmal"><input type="text" name="eq_amountpaid" value="<?php echo $es_enquiryList['eq_amountpaid']; ?>" readonly /></td>
                                   		    </tr>
                                            
        <?php  if($es_enquiryList['eq_paymode']!='cash' ||$es_enquiryList['eq_paymode']!='' ){
		$online_sql="select * from es_voucherentry where es_voucherentryid=".$es_enquiryList['es_voucherentryid'];
	       $online_row=$db->getRow($online_sql);
		
		 ?>
        
        <tr>
												  <td align="left" valign="top" class="narmal">&nbsp;&nbsp;Bank Name </td>
												  <td align="left" valign="top" class="narmal"></td>
												  <td align="left" valign="top" class="narmal"><input type="text" name="es_bank_name" value="<?php if($online_row['es_bank_name']!='') { echo $online_row['es_bank_name']; } else { echo "---";} ?>" readonly /></td>
                                   		    </tr>
                                            
                                            <tr>
												  <td align="left" valign="top" class="narmal">&nbsp;&nbsp;Account Number</td>
												  <td align="left" valign="top" class="narmal"></td>
												  <td align="left" valign="top" class="narmal"><input type="text" name="es_bankacc" value="<?php if($online_row['es_bankacc']!='') { echo $online_row['es_bankacc'];  } else { echo "---";} ?>" readonly /></td>
                                   		    </tr>
                                            
                                            <tr>
												  <td align="left" valign="top" class="narmal">&nbsp;&nbsp;Cheque / DD Number</td>
												  <td align="left" valign="top" class="narmal"></td>
												  <td align="left" valign="top" class="narmal"><input type="text" name="es_checkno" value="<?php if($online_row['es_checkno']!='') { echo $online_row['es_checkno'];  } else { echo "---";} ?>" readonly /></td>
                                   		    </tr>
                                            
                                            <tr>
												  <td align="left" valign="top" class="narmal">&nbsp;&nbsp;Teller Number </td>
												  <td align="left" valign="top" class="narmal"></td>
												  <td align="left" valign="top" class="narmal"><input type="text" name="es_teller_number" value="<?php if($online_row['es_teller_number']!='') { echo $online_row['es_teller_number']; } else { echo "---";} ?>" readonly /></td>
                                   		    </tr>
                                            
                                            
                                            <tr>
												  <td align="left" valign="top" class="narmal">&nbsp;&nbsp;Pin </td>
												  <td align="left" valign="top" class="narmal"></td>
												  <td align="left" valign="top" class="narmal"><input type="text" name="es_bank_pin" value="<?php  if($online_row['es_bank_pin']!='') { echo $online_row['es_bank_pin'];  } else { echo "---";}?>" readonly /></td>
                                   		    </tr>
                                            
                                            
        <?php } ?>
											<tr>
												  <td align="left" valign="top" class="narmal">&nbsp;&nbsp;Application Number</td>
												  <td align="left" valign="top" class="narmal"></td>
												  <td align="left" valign="top" class="narmal"><input type="text" name="eq_application_no" value="<?php echo $es_enquiryList['eq_application_no']; ?>" readonly /></td>
                                   		    </tr>
                                       								
                                    </table>								
								</td>
							</tr>
						</table>
						
						 </td>
					 </tr>
					 <tr>
                       <td>
	                	
	              	<table width="100%" border="0" cellspacing="0" cellpadding="0">     
                      <tr>
                        <td height="23" colspan="4" class="bgcolor_02">&nbsp;&nbsp;<strong>Student Marks</strong></td>
                        </tr>
                      <tr>
                        <td width="1%">&nbsp;</td>
                        <td width="31%" class="narmal"> </td>
                        <td width="44%" valign="middle">&nbsp;</td>
                        <td width="24%">&nbsp;</td>
                        </tr>
					  <tr>
                        <td>&nbsp;</td>
                        <td height="25" class="narmal">Total Marks</td>
                        <td valign="middle"><input type="text" name="eq_outof" value="<?php echo $es_enquiryList['eq_outof'] ?>"  /></td>
                        <td class="narmal">&nbsp;</td>
                        </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td height="25" class="narmal">Marks Obtained</td>
                        <td><input type="text" name="eq_marksobtain" value="<?php echo $es_enquiryList['eq_marksobtain']; ?>" /></td>
                        <td>&nbsp;</td>
                        </tr>                    
                     
                      <tr>
                        <td>&nbsp;</td>
                        <td height="25" class="narmal">Result</td>
                        <td><select name="eq_result" style="width:150px;">
                          <option value="Admitted" <?php if($es_enquiryList['eq_result']=="Admitted") { ?> selected="selected" <?php } ?>>Admitted</option>
                          <option value="Not -Admitted" <?php if($es_enquiryList['eq_result']=="Not -Admitted") { ?> selected="selected" <?php } ?>>Not -Admitted</option>
                        </select></td>
                        <td>&nbsp;</td>
                      </tr>                    
                      <tr>
                        <td colspan="4" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          </table></td>
                        </tr>
                    </table>
						</td>
                 	</tr>
					<tr>
					   <td align="center"><br /><input name="studentmarksubmit" type="submit" class="bgcolor_02" value="Submit" style="cursor:pointer;"/>&nbsp;
					  <input name="reset3" type="reset" class="bgcolor_02" value="Reset" style="cursor:pointer;"/>  &nbsp;&nbsp;
					  
					  <input name="Submit" type="button" onclick="newWindowOpen ('?pid=2&action=print_enquiry&enqid=<?php echo $es_enquiryList['es_enquiryid']?>');" class="bgcolor_02" value="Print" style="cursor:pointer;"/>
					  
					 </td>
					 </tr>									 
    		    </table></form>
							    </td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td height="10" align="left" valign="top"></td>
                        </tr>
                        <tr>
                          <td align="left" valign="top"></td>
                        </tr>                        
                    </table></td>
              </tr>
          </table></td>
         <td width="1" class="bgcolor_02"></td>		  
  </tr>
    <tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>
</table>
<?php } ?>

<?php

if (($action=='registration' && $disptype=="formpurchase") || ($action=="print_enquirylist")){ ?>
<script type="text/javascript">
function newWindowOpen(href)
{
    window.open(href,null, 'width=700,height=700,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');
}
</script>
<script type="text/javascript" >
	function showAvatar()
			{
		
				var ch = document.regform.eq_paymode.value;
				if (ch=='cash'|| ch==''){
					document.getElementById("patiddivdisp").style.display="none";
				}else{
				document.getElementById("patiddivdisp").style.display="block";
				}
			}		  
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
  </tr>
	<tr>
		<td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Registration</span></td>
  </tr>
  <?php if($_GET["uid"])
  		{
			$uid=$_GET["uid"];
		}
  ?>
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td  align="left" valign="top">
           
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr><td align="left" valign="top">&nbsp;</td></tr>
                
                <tr><td align="left" valign="top">&nbsp;</td></tr>
				<tr>
					<td height="50" align="left" valign="top">
						<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
							<tr>
								<td height="23" align="left" valign="top">
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td align="left" valign="middle" class="admin">
											<form action="" name="regform" method="post"><table width="100%" border="0" cellspacing="0" cellpadding="0">								
													<tr>
														<td>
															<table width="90%" border="0" cellspacing="3" cellpadding="0">
															
																<tr>
																  <td align="left" class="narmal">&nbsp;&nbsp;Applicant Name</td>
																  <td align="left" class="narmal"><?php echo $es_enquiryList['eq_wardname']; ?></td>
																  <td>&nbsp;</td>
															  </tr>
																<tr>
																  <td align="left" class="narmal">&nbsp;&nbsp;Gender</td>
																  <td align="left" class="narmal"><?php if($es_enquiryList['eq_sex']=='male') { echo "Male";} else { echo "Female";} ?></td>
																  <td>&nbsp;</td>
															  </tr>
															  
															  
		<tr>
																	<tr>
																  <td align="left" class="narmal">&nbsp;&nbsp;Class</td>
																  <td align="left" class="narmal">
                                                                  
                                                                     <?php 
															  $class_id =mysql_query("SELECT * FROM es_classes WHERE es_classesid='".$es_enquiryList['pre_class']."'");
															  $class_res=mysql_fetch_array($class_id);
															
															   ?>
                                                                  
                                                                  
                                                                  <?php if($es_enquiryList['pre_class']!=''){ echo $class_res['es_classname'];} else{ echo "---"; } ?>
                                                                  
                                                                  <input type="hidden" value="<?php if($es_enquiryList['pre_class']!=''){ echo $es_enquiryList['pre_class'];} else{ echo "---"; } ?>" name="eq_wardname"  />
                                                                  </td>
																  <td>&nbsp;</td>
															  </tr>
													<?php /*?><tr>
																  <td align="left" class="narmal">&nbsp;&nbsp;subject</td>
																  <td align="left" class="narmal">
                                                                  
                                                                       <?php 
															  $class_id1 =mysql_query("SELECT * FROM subjects_cat WHERE scat_id='".$es_enquiryList['scat_id']."'");
															  $class_res1=mysql_fetch_array($class_id1);
															
															   ?>
                                                               
                                                                 <input type="text" value="<?php if($es_enquiryList['scat_id']!=''){  echo $class_res1['scat_name'];} else{ echo "---"; }  ?>" name="eq_wardname1"  readonly="readonly" />
                                                                 
                                                                  <input type="hidden" value="<?php if($es_enquiryList['scat_id']!=''){  echo $es_enquiryList['scat_id'];} else{ echo "---"; }  ?>" name="eq_wardname"  readonly="readonly" /></td>
																  <td>&nbsp;</td>
															  </tr><?php */?>
															  				  
	
	
	
	
																<tr>
																	<td width="35%" align="left" class="narmal">&nbsp;&nbsp;Father / Guardian Name</td>
																	<td width="49%" align="left" class="narmal"><?php echo $es_enquiryList['eq_name']; ?>
																    <input type="hidden" value="update" name="update"/>
															      <input type="hidden" value="<?php echo $uid; ?>" name="es_enquiryId"/></td>
																	<td width="16%">&nbsp;</td>
																</tr>
																<tr>
																  <td align="left" class="narmal">&nbsp;&nbsp;Mother Name</td>
																  <td align="left" class="narmal"><?php echo $es_enquiryList['eq_mothername']; ?></td>
																  <td></td>
															  </tr>
																<tr>
																	<td align="left" class="narmal">&nbsp;&nbsp;Address </td>
																	<td align="left" class="narmal"><?php echo $es_enquiryList['eq_address']; ?></td>
																	<td></td>
																</tr>
																 <tr>
																	<td align="left" class="narmal">&nbsp;&nbsp;City </td>
																	<td align="left" class="narmal"><?php echo $es_enquiryList['eq_city']; ?></td>
																	<td></td>
																</tr>
																 <tr>
																	<td align="left" class="narmal">&nbsp;&nbsp;State </td>
																	<td align="left" class="narmal"><?php echo $es_enquiryList['eq_state']; ?></td>
																	<td></td>
																</tr>
																 <tr>
																   <td align="left" class="narmal">&nbsp;&nbsp;Country</td>
																   <td align="left" class="narmal"><?php echo $es_enquiryList['eq_countryid']; ?></td>
																   <td></td>
														      </tr>
															    <tr>
																	<td align="left" class="narmal">&nbsp;&nbsp;Email Id</td>
																	<td align="left" class="narmal"><?php echo $es_enquiryList['eq_emailid']; ?></td>
																	<td></td>
																</tr>
																<tr>
																  <td align="left" class="narmal">&nbsp;&nbsp;Postal Code</td>
																  <td align="left" class="narmal"><?php echo $es_enquiryList['eq_zip']; ?></td>
																  <td></td>
															  </tr>
                                                              <tr>
																  <td align="left" class="narmal">&nbsp;&nbsp;Date of Birth</td>
																  <td align="left" class="narmal"><?php if($es_enquiryList['eq_dob']=="0000-00-00"){ echo "---"; } else { 
																  $new_dob = func_date_conversion('Y-m-d','d/m/Y',$es_enquiryList['eq_dob']);
																  echo $new_dob; } ?></td>
																  <td></td>
															  </tr>
																<tr>
																	<td align="left" class="narmal">&nbsp;&nbsp;Phone No </td>
																	<td align="left" class="narmal"><?php echo $es_enquiryList['eq_phno'];?></td>
																	<td></td>
																</tr>
																<tr>
																	<td align="left" class="narmal">&nbsp;&nbsp;Mobile No </td>
																	<td align="left" class="narmal"><?php echo $es_enquiryList['eq_mobile']; ?></td>
																	<td></td>
																</tr>
																<?php /*?><tr>
																	<td align="left" class="narmal">&nbsp;&nbsp;Admission for Class </td>
																	<td align="left" class="narmal"><input type="hidden" name="eq_class" value="<?php echo $es_enquiryList['eq_class'];?>" />
                                                                      <input type="text" value="<?php if(classname($es_enquiryList['eq_class'])!='') { echo classname($es_enquiryList['eq_class']); } else { echo  "---"; }  ?>" name="class_id"  readonly="readonly" /></td>
																	<td>&nbsp;</td>
																</tr><?php */?>
																<tr>
																  <td align="left" class="narmal">&nbsp;&nbsp;Previous Academics</td>
																  <td align="left" class="narmal"><?php echo $es_enquiryList['eq_prv_acdmic']; ?></td>
																  <td>&nbsp;</td>
															  </tr>
																<tr>
																  <td align="left" class="narmal">&nbsp;&nbsp;Enquired on</td>
																  <td align="left" class="narmal"><?php echo formatDBDateTOCalender($es_enquiryList['eq_createdon']);?></td>
																  <td>&nbsp;</td>
															  </tr>
																<tr>
																  <td align="left" class="narmal">&nbsp;&nbsp;Reference Type</td>
																  <td align="left" class="narmal"><?php echo $es_enquiryList['eq_reftype']; ?></td>
																  <td>&nbsp;</td>
															  </tr>
																<tr>
																  <td align="left" class="narmal">&nbsp;&nbsp;Reference Name</td>
																  <td align="left" class="narmal"><?php echo $es_enquiryList['eq_refname']; ?></td>
																  <td>&nbsp;</td>
															  </tr>
																<tr>
																  <td align="left" class="narmal">&nbsp;&nbsp;Details</td>
																  <td align="left" class="narmal">
                                                                  <?php echo $es_enquiryList['eq_description']; ?>
                                                                 </td>
																  <td>&nbsp;</td>
															  </tr>			
															</table>
													  </td>
													</tr>
													<tr>
					   <?php if($action=="registration") {?>
					   <td align="center">
					   <?php if($es_enquiryList['es_voucherentryid']>=1){?>
					   <input type="hidden" name="es_voucherentryid" value="<?php echo $es_enquiryList['es_voucherentryid'];?>"  /><?php }?>
					  <!-- <input name="print" type="submit" class="bgcolor_02" value="Print" style="cursor:pointer;" onclick=""/>&nbsp;-->
					 <?php /*?> <input name="reset3" type="reset" class="bgcolor_02" value="Reset" style="cursor:pointer;"/> <?php */?> &nbsp;<!--<input name="Submit" type="button" onclick="newWindowOpen('?pid=2&action=print_enquirylist&uid=<?php //echo $uid?>');" class="bgcolor_02" value="Print" style="cursor:pointer;"/>-->
					</td><?php }?></tr>	
														
													<?php /*?><table border="0" cellpadding="0" cellspacing="0" width="100%">
														<tr height="25">
														<td class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Form Purchase </span></td>
													</tr>
													<tr height="25"><td>&nbsp;</td></tr>
													<tr>
														<td><?php */?>
											<?php /*?><table width="100%" border="0" cellspacing="3" cellpadding="0">
											<tr>
												<td width="390" align="left" valign="middle" class="narmal">&nbsp;&nbsp;Form Type </td>
											  <td width="12" align="left" valign="top"></td>
											  <td width="884" align="left" valign="top" class="narmal">
												
												<select name="eq_formtype" style="width:150px;">
												<?php foreach ($obj_grouplistarr as $eachrecord){ ?>
												<option value="<?php echo $eachrecord->es_groupsId; ?>" <?php if($es_enquiryList['eq_formtype']==$eachrecord->es_groupsId) { ?>selected="selected"<?php } ?>><?php echo $eachrecord->es_groupname; ?></option>                            
												<?php } ?>							
											  </select></td>
											</tr>
											<tr>
                                       		  <td align="left" valign="middle" class="narmal">&nbsp;&nbsp;Payment Mode</td>
                                       		  <td align="left" valign="top" class="narmal"></td>
                                       		  <td align="left" valign="top" class="narmal"><select name="eq_paymode" style="width:150px;" onchange="Javascript:showAvatar();" >
                                                <option value="">-- Select --</option>
                                                <option <?php if($es_enquiryList['eq_paymode']=='cash' && !$_POST) { echo "selected='selected'"; }elseif($eq_paymode=='cash'){echo "selected='selected'";} ?> value ="cash">Cash</option>
                                                <option <?php if($es_enquiryList['eq_paymode']=='cheque'&& !$_POST) { echo "selected='selected'"; }elseif($eq_paymode=='cheque'){echo "selected='selected'";} ?> value ="cheque">Cheque</option>
                                                <option <?php if($es_enquiryList['eq_paymode']=='DD'&& !$_POST) { echo "selected='selected'"; }elseif($eq_paymode=='DD'){echo "selected='selected'";} ?> value ="DD">DD</option>
                                              </select><font color="#FF0000"><b>*</b></font></td>
                                   		    </tr>
											<tr>
											<td height="25" align="left" valign="middle" class="narmal">&nbsp;&nbsp;Voucher&nbsp;Type</td>
											<td align="center"></td>
											<td class="narmal"><select name="vocturetypesel" style="width:150px;">
											<option value="">-- Select --</option>
											  <?php 
											$voucherlistarr = voucher_finance();
											krsort($voucherlistarr);
											foreach($voucherlistarr as $eachvoucher) {	?>
											  <option value="<?php echo $eachvoucher['es_voucherid']; ?>" <?php 
											 if($vouch_det['es_voucherid']==$eachvoucher['es_voucherid'] && !$_POST){  echo "selected='selected'";}elseif ($vocturetypesel==$eachvoucher['es_voucherid']){  echo "selected='selected'"; }?> ><?php echo $eachvoucher['voucher_type']; ?> ( <?php echo $eachvoucher['voucher_mode']; ?> )</option>
											  <?php } ?>
											</select><font color="#FF0000"><b>*</b></font></td>
										    </tr>
                                            <tr>
												<td height="25" align="left" valign="middle" class="narmal">&nbsp;&nbsp;Ledger&nbsp;Type</td>
												<td align="center"></td>
												<td class="narmal"><select name="es_ledger" style="width:150px;">
												<option value="">-- Select --</option>
												  <?php 									$ledgerlistarr = ledger_finance();
																							foreach($ledgerlistarr as $eachledger) { 
																							?>
												  <option value="<?php echo $eachledger['lg_name']; ?>" <?php 
												  if($voucher_det['es_particulars']==$eachledger['lg_name'] && !$_POST){echo "selected='selected'";}
												  elseif($es_ledger==$eachledger['lg_name']) { echo 'selected'; } ?>><?php echo $eachledger['lg_name']; ?> </option>
												  <?php } ?>
												</select><font color="#FF0000"><b>*</b></font></td>
											</tr>
											<tr align="left" valign="middle">
                                       		  <td colspan="3"><div  id="patiddivdisp"  style="display:none;" >
																<table  border="0" cellspacing="0" class="tbl_grid" width="100%" cellpadding="3">
																						
																	<tr>
																		<td align="left" class="bgcolor_02" colspan="3">Bank Details </td>
																	</tr>
																	
																	<tr>
																		<td align="left"   width="22%" class="narmal" >Bank Name </td>
																		<td align="center"  width="4%">:</td>
																		<td align="left"  width="74%"><input type="text" name="es_bank_name" value="<?php echo $es_bank_name;?>" /></td>
																	</tr>
																	<tr>
																		<td align="left"  class="narmal"> Account Number</td>
																		<td align="center">:</td>
																		<td align="left" ><input type="text" name="es_bankacc" value="<?php echo $es_bankacc;?>" /></td>
																	</tr>
																	<tr>
																		<td align="left" class="narmal">Cheque / DD Number </td>
																		<td align="center">:</td>
																		<td align="left"><input type="text" name="es_checkno" value="<?php echo $es_checkno;?>" /></td>
																	</tr>
																	<tr>
																		<td align="left" class="narmal">Teller Number </td>
																		<td align="center">:</td>
																		<td align="left"><input type="text" name="es_teller_number" value="<?php echo $es_teller_number;?>" /></td>
																	</tr>
																	<tr>
																		<td align="left" class="narmal">Pin </td>
																		<td align="center">:</td>
																		<td align="left"><input type="text" name="es_bank_pin" value="<?php echo $es_bank_pin;?>" /></td>
																	</tr>
																</table>	
											  </div></td>
                                   		    </tr>
											
											
											  <tr>
												  <td align="left" valign="middle" class="narmal">&nbsp;&nbsp;Amount Paid</td>
												  <td align="left" valign="top" class="narmal"></td>
												  <td align="left" valign="top" class="narmal"><input type="text" name="eq_amountpaid" value="<?php //echo $es_enquiryList['eq_amountpaid']; ?>" />
											      <font color="#FF0000"><b>*</b></font></td>
                                   		    </tr>
											<tr>
												  <td align="left" valign="middle" class="narmal">&nbsp;&nbsp;Application No</td>
												  <td align="left" valign="top" class="narmal"></td>
												  <td align="left" valign="top" class="narmal"><input type="text" name="eq_application_no" value="<?php //echo $es_enquiryList['eq_application_no']; ?>" /></td>
                                   		    </tr>
                                       								
                                    </table><?php */?>								
								</td>
							</tr>
						</table>
						
						 </td>
					 </tr>
					
													 
    		    </table></form>
							    </td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td height="10" align="left" valign="top"></td>
                        </tr>
                        <tr>
                          <td align="left" valign="top"></td>
                        </tr>                        
                    </table></td>
              </tr>
          </table></td>
         <td width="1" class="bgcolor_02"></td>		  
  </tr>
    <tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>
</table>
<?php } ?>

<?php if($action=='list_enquiry'){ ?>
<script type="text/javascript">
function newWindowOpen(href)
{
    window.open(href,null, 'width=700,height=700,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');
}
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
  </tr>
	<tr>
		<td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Enquiry List</span></td>
  </tr>
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td  align="left" valign="top">
           
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr><td align="left" valign="top">&nbsp;</td></tr>
                
                <tr><td align="left" valign="top">&nbsp;</td></tr>
				<tr>
					<td height="50" align="left" valign="top">
						<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
							<tr>
								<td height="23" align="left" valign="top">
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td align="left" valign="middle" class="admin"><?php 
 

	//Fetching all enquiries
?>
	<!--Fetching User List-->
    <form  action="" name="fee_search" method="post">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr><td align="center" >
				<table width="100%" border="0">
				  
				  
				  <tr>
					<td>
					<table width="100%" border="0">
					  <tr>
						<td width="18%" align="left" valign="middle">From</td>
						<td width="3%" align="left" valign="middle">:</td>
						<td width="32%" align="left" valign="middle"><?php echo $html_obj->draw_inputfield('dc1','','','readonly="readonly" size="10"');?><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fStartPop(document.fee_search.dc1,document.fee_search.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a></td>
						<td width="6%" align="left" valign="middle">To</td>
						<td width="1%" align="left" valign="middle">:</td>
						<td width="40%" align="left" valign="middle"><?php echo $html_obj->draw_inputfield('dc2','','','readonly="readonly" size="10"');?><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fEndPop(document.fee_search.dc1,document.fee_search.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a></td>
					  </tr>
					  <iframe width=132 height=142 name="gToday:contrast:agenda.js" id="gToday:contrast:agenda.js" src="<?php echo JS_PATH ?>/DateRange/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">	</iframe>
					  <tr>
						<td align="left" valign="middle">Enquiry No</td>
						<td align="left" valign="middle">:&nbsp;ES</td>
						<td align="left" valign="middle"><?php echo $html_obj->draw_inputfield('search_id','','','');?></td>
						<td colspan="3" align="left" valign="middle"><input type="submit" value="go" name="submit" class="bgcolor_02" style="width:75px;" /></td>
						</tr>
					</table>

					</td>
				  </tr>
				  <tr>
					<td align="center"></td>
				  </tr>
				 				</table>
           
  
  
  
  
</td></tr>
  <tr><td align="center" height="10" ></td></tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
    <tr class="bgcolor_02">
       <td width="13%" height="25"  align="center" class="admin">Enq No</td>

	  <td width="29%" height="25" align="left" valign="middle" class="admin">&nbsp;Applicant Name</td>
	 <td width="16%" height="25" class="admin" align="center">Date</td>
	 <td width="42%" height="25" class="admin" align="center">Action </td>
   </tr>
<?php 	
	$rownum = 1;
	
	if (count($es_enquiryList)>0){
	foreach ($es_enquiryList as $eachrecord){
	$zibracolor = ($rownum%2==0)?"even":"odd";
	
?>			
	<tr class="<?php echo $zibracolor;?>">	 
		<td class="narmal" align="center">ES<?php echo $id=$eachrecord['es_enquiryid']; ?></td>
		<td align="left" valign="middle" class="narmal"><?php echo $eachrecord['eq_wardname']; ?><?php /*?>&nbsp;&nbsp;<?php echo $eachrecord['eq_name']; ?>&nbsp;&nbsp;<?php echo $eachrecord['eq_mothername']; ?><?php */?></td>
		<td class="narmal" align="center"><?php echo displaydate($eachrecord['eq_createdon']); ?></td>
		
		<td class="narmal" align="center">
		<?php if (in_array('3_2', $admin_permissions)){?>
		<a href="<?php echo buildurl(array('pid'=>2, 'action'=>'registration', 'uid'=>$eachrecord['es_enquiryid']));?>&disptype=formpurchase" class="video_link"> View </a>  <?php }if (in_array('3_3', $admin_permissions)){?>
		<a href="?pid=2&action=registration&uid=<?php echo $eachrecord['es_enquiryid']; ?>&disptype=studentmarks" class="video_link"></a> <?php }
		
		if (in_array('4_p', $admin_permissions)){?>
		<?php if($eachrecord['es_preadmissionid']<1){?><a href="?pid=5&action=view&uid=<?php echo $eachrecord['es_enquiryid'];?>" class="video_link"><span style="color:#FF0000; font-weight:bold; size:14px;"></span></a><?php }else{?><span style="color:#000000; font-weight:bold; size:14px;"></span><?php }}?>
		</td>
	</tr>
<?php
$rownum++; 
}
?>
    <tr>
		<td colspan="4" align="center"><?php paginateexte($start, $q_limit, $no_rows, "action=list_enquiry&column_name=".$orderby."&asds_order=".$asds_order.$PageUrl);  ?>	</td>
	</tr>
	<tr>
         <td height="1" colspan="6" ></td>
     </tr>
     <tr>
	     <td  colspan="4"class="narmal" align="right">
		 
		 <?php if(in_array('3_5',$admin_permissions)){?>

 <input name="Submit" type="button" onclick="newWindowOpen ('?pid=2&action=printenquirylist&start=<?php echo $start?><?php echo $PageUrl?>');" class="bgcolor_02" value="Print" style="cursor:pointer;"/>
		


<?php } ?>
		 
		 </td>
	 </tr>
<?php

	}else{

		echo '<tr><td colspan="4" align="center" class="narmal">No records found </td></tr>';
}
?>
         
     
</table></td>
  </tr>
</table></form>
							

<?php 
			
	 //End of Fetching User List 
?>							    </td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td height="10" align="left" valign="top"></td>
                        </tr>
                        <tr>
                          <td align="left" valign="top"></td>
                        </tr>                        
                    </table></td>
              </tr>
          </table></td>
         <td width="1" class="bgcolor_02"></td>		  
  </tr>
    <tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>
</table>
<?php } ?>
<?php if ($action=='printenquirylist') {
     $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_enquiry','Front Office','Admitted Students [Enquiry]','','Print','".$_SERVER['REMOTE_ADDR']."',NOW())";
     $log_insert_exe=mysql_query($log_insert_sql); 
 ?>

<table width="100%" border="0" cellpadding="1" cellspacing="1" ><br />
<br />
	   <tr align="center">
	       <td colspan="3" height="30" align="center" class="bgcolor_02"><span class="admin" >Enquiry List</span></td>
  </tr>
  
  <tr align="center">
	       <td colspan="3" align="center" height="10"></td>
  </tr>
        <tr class="bgcolor_02">
           <td width="13%" height="25"  align="center" class="admin">Enq No</td>
			<td width="68%" height="25" align="left" valign="middle" class="admin">&nbsp;Applicant&nbsp;Name</td>
			<td width="19%" height="25" class="admin" align="center">Date</td>
	  </tr>
	  <?php 	
	$rownum = 1;
	
	if (count($es_enquiryList)>0){
	foreach ($es_enquiryList as $eachrecord){
	$zibracolor = ($rownum%2==0)?"even":"odd";
	
?>	
		
	  <tr class="<?php echo $zibracolor;?>">
	  	 
		<td class="narmal" align="center">ES<?php echo $id=$eachrecord['es_enquiryid']; ?></td>
		<td align="left" valign="middle" class="narmal"><?php echo $eachrecord['eq_wardname']." ".$eachrecord['eq_name']." ".$eachrecord['eq_mothername']; ?></td>
		<td class="narmal" align="center"><?php echo displaydate($eachrecord['eq_createdon']); ?></td>
				
	  </tr>
<?php
$rownum++;	
}
?>
									
<?php

	}else{

		echo '<tr><td colspan="4" align="center" class="narmal">No records found</td></tr>';
}
?>
</table>
<?PHP }?>



<?php if ($action=='print_enquiry') {

     $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_enquiry','Front Office','Admitted Students [Enquiry]','','Print','".$_SERVER['REMOTE_ADDR']."',NOW())";
     $log_insert_exe=mysql_query($log_insert_sql); 
	 
	 $online_sql="select * from es_enquiry  where es_enquiryid=".$enqid;
		                                    $online_row=$db->getRow($online_sql);
									
		$online_sql1="select * from es_voucherentry where es_voucherentryid=".$online_row['es_voucherentryid'];
	       $online_row1=$db->getRow($online_sql1);									
 ?>

<table width="100%" border="0" cellpadding="1" cellspacing="1" ><br />
<br />
	   <tr align="center">
	       <td colspan="3" height="30" align="center" class="bgcolor_02"><span class="admin" >  Payment Receipt</span></td></tr>

<tr><td colspan="3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="18%"> Receipt Number:</td>
   
    <td width="82%"><?php echo $online_row['es_voucherentryid']; ?></td>
  </tr>
  <tr>
    <td>Applicant Name:</td>
   
    <td><?php echo $online_row['eq_wardname']; ?></td>
  </tr>
  <tr>
    <td>Reference Number:</td>
   
    <td>ES<?php echo $online_row['es_enquiryid']; ?></td>
  </tr>
  
  
</table>
</td></tr>
<tr ><td  ><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr class="bgcolor_02">
    <td height="30" align="left" valign="middle"width="14%">&nbsp;P Mode</td>
    <td width="14%" align="left" valign="middle">Paid</td>
    <td width="13%" align="left" valign="middle">Bank</td>
    <td width="17%" align="left" valign="middle">Acct #</td>
    <td width="23%" align="left" valign="middle">Cheque / DD #</td>
    <td width="11%" align="left" valign="middle">Teller #</td>
    <td width="8%" align="left" valign="middle">Pin</td>
  </tr>
  <tr class="<?php echo $zibracolor;?>">
    <td>&nbsp;<?php echo $online_row['eq_paymode']; ?></td>
    <td>Rs<?php echo $online_row['eq_amountpaid']; ?></td>
    <td align="left" valign="middle"><?php if($online_row1['es_bank_name']!='') { echo $online_row1['es_bank_name']; } else { echo "---"; } ?></td>
    <td align="left" valign="middle"><?php  if($online_row1['es_bankacc']!='') { echo $online_row1['es_bankacc']; } else { echo "---"; }?></td>
    <td align="left" valign="middle"><?php  if($online_row1['es_checkno']!='') { echo $online_row1['es_checkno'];} else { echo "---"; } ?></td>
    <td align="left" valign="middle"><?php if( $online_row1['es_teller_number']!='0') {  echo $online_row1['es_teller_number']; } else { echo "---"; }?></td>
    <td align="left" valign="middle"><?php  if($online_row1['es_bank_pin']!='0') { echo $online_row1['es_bank_pin'];} else { echo "---"; } ?></td>
  </tr>
</table></td>
</tr>
</table>
<?PHP }?>
