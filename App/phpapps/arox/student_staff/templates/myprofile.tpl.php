<?php 
// Leave Master
	if($action=='viewprofile')
	{
?>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
         <td height="3" colspan="3"></td>
	 </tr>
	  <tr>
		<td height="25" colspan="3" class="bgcolor_02"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    
    <td class="admin" align="left" style="padding-left:5px;">My Profile</td>
    <td align="right">&nbsp;</td>
    
  </tr>
</table>
</td>
	  </tr>
	  <tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="center" valign="top">		
		<form action="" method="post">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="19" class="error_message" align="center"></td>
                </tr>             
              <tr>
                
                <td align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
					
					      
                      <tr>
                        <td class="narmal">&nbsp;</td>
                        <td align="left" class="narmal" >Student Id </td>
                        <td align="left" class="narmal">:</td>
                        <td  colspan="5" align="left" class="narmal"><?php echo $studentdetails['es_preadmissionid']; ?></td>
                      </tr>
                      <tr>
                        <td class="narmal" width="5%">&nbsp;</td>
                        <td align="left" class="narmal" >Name </td>
                        <td width="1%" align="left" class="narmal">:</td>
                        <td  colspan="5" align="left" class="narmal"><?php  if( $studentdetails['pre_name']!='') {echo $studentdetails['pre_name']; } else { echo"--";} ?></td>												
                       </tr>
					  <tr>
					    <td class="narmal" >&nbsp;</td>
					    <td align="left" class="narmal" >Gender</td>
					    <td align="left" class="narmal">:</td>
					    <td  colspan="5" align="left" class="narmal"><?php if( $studentdetails['pre_gender']!='') { echo strtoupper($studentdetails['pre_gender']);} else { echo"--";} ?></td>
				      </tr>
					  <tr>
                        <td class="narmal" >&nbsp;</td>
                        <td align="left" class="narmal" >User  Name </td>
                        <td align="left" class="narmal">:</td>
						
                        <td  colspan="5" align="left" class="narmal"><?php if( $studentdetails['pre_student_username']!='') { echo $studentdetails['pre_student_username']; } else { echo"--";}?></td>
					  </tr>
					   <!--<tr>
                        <td class="narmal" >&nbsp;</td>
						<td width="23%" align="left" class="narmal" >E-mail</td>
						<td align="left" class="narmal" >:</td>
                        <td colspan="2" align="left" class="narmal" ><?php //if( $studentdetails['pre_emailid']!='') { echo $studentdetails['pre_emailid'];} else { echo"--";} ?></td>
						<td  colspan="3" rowspan="11" align="left" class="narmal"><?php //if($studentdetails['pre_image']!="") { 
						//echo displayimage("../office_admin/images/student_photos/".$studentdetails['pre_image'], "127");  } ?></td>
                      </tr>-->
                      <tr>
                        <td class="narmal" >&nbsp;</td>
                        <td align="left" class="narmal" >Date&nbsp;Of&nbsp;Birth </td>
                        <td align="left" class="narmal" >:</td>
                        <td  colspan="2" align="left" class="narmal" ><?php if( $studentdetails['pre_dateofbirth']!='') { echo displaydate($studentdetails['pre_dateofbirth']); } else { echo"--";}?></td>
					  </tr>
                      <!--<tr>
                        <td class="narmal" >&nbsp;</td>
                        <td align="left" class="narmal" >Age</td>
                        <td align="left" class="narmal" >:</td>
                        <td  colspan="2" align="left" class="narmal"><?php //if( $studentdetails['pre_age']!='') { echo $studentdetails['pre_age']; } else { echo"--";}?></td>
                      </tr>-->
                      <tr>
                        <td class="narmal" >&nbsp;</td>
                        <td align="left" class="narmal" >Class</td>
                        <td align="left" class="narmal" >:</td>
                        <td  colspan="2" align="left" class="narmal"><?php if( $studentdetails['pre_class']!='') { echo classname($studentdetails['pre_class']); } else { echo"--";}?></td>
                      </tr>
                      <!--<tr>
                        <td class="narmal" >&nbsp;</td>
                        <td align="left" class="narmal" >Section</td>
                        <td align="left" class="narmal" >:</td>
                        <td  colspan="2" align="left" class="narmal">
							<?php 
						//$sec_arr= $db->getRow("SELECT * FROM es_sections_student where student_id='".$studentdetails['es_preadmissionid']."'");
						//$sec_arrq= $db->getRow("SELECT * FROM es_sections where section_id='".$sec_arr['section_id']."'");
						
					 ?>
						
						
						<?php if( $sec_arrq['section_name']!='') {  echo $sec_arrq['section_name'];} else { echo"--";} ?></td>
                      </tr>-->
                       <!--<tr>
                        <td class="narmal" >&nbsp;</td>
                        <td align="left" class="narmal" >Roll Number </td>
                        <td align="left" class="narmal" >:</td>
                        <td  colspan="2" align="left" class="narmal"><?php //if( $sec_arr['roll_no']!='') {  echo $sec_arr['roll_no']; } else { echo"--";}?></td>
                      </tr>-->
                      
                      
                      <tr>
                        <td class="narmal" >&nbsp;</td>
                        <td align="left" class="narmal" >Father/Guardian Name </td>
                        <td align="left" class="narmal" >:</td>
                        <td  colspan="2" align="left" class="narmal"><?php if( $studentdetails['pre_fathername']!='') { echo $studentdetails['pre_fathername'];} else { echo"--";} ?></td>
                      </tr>
                      <tr>
                        <td class="narmal">&nbsp;</td>
                        <td align="left" class="narmal" >Occupation</td>
                        <td align="left" class="narmal">:</td>
                        <td colspan="2" align="left" class="narmal"><?php if( $studentdetails['pre_fathersoccupation']!='') { echo $studentdetails['pre_fathersoccupation']; } else { echo"--";}?></td>
                      </tr>                     
                      <tr>
                        <td class="narmal">&nbsp;</td>
                        <td align="left" class="narmal" >Mother's Name </td>
                        <td align="left" class="narmal">:</td>
                        <td colspan="2" align="left" class="narmal"><?php  if( $studentdetails['pre_mothername']!='') {echo $studentdetails['pre_mothername'];} else { echo"--";} ?></td>
                      </tr>
                      
					   <tr>
                        <td class="narmal">&nbsp;</td>
                        <td align="left" class="narmal" >Occupation</td>
                        <td align="left" class="narmal">:</td>
                        <td colspan="2" align="left" class="narmal"><?php if( $studentdetails['pre_motheroccupation']!='') { echo $studentdetails['pre_motheroccupation'];} else { echo"--";} ?></td>
                      </tr>
                      
                      
                      
                      <tr>
						<td align="left">&nbsp;</td>
						<td align="left" class="narmal">Caste </td>
						<td align="left" class="narmal">:</td>
						<td align="left" colspan="5">
						<?php 
						$caste_arr= $db->getRow("SELECT * FROM es_caste where caste_id='".$studentdetails['caste_id']."'");
					 ?>
						<?php if($caste_arr['caste']!='') {echo $caste_arr['caste']; } else { echo"--";}?></td>
					</tr>  
                    
                    
                    <!--<tr>
						<td align="left">&nbsp;</td>
						<td align="left" class="narmal">Annual Income </td>
						<td align="left" class="narmal">:</td>
						<td align="left" colspan="5"><?php //if($studentdetails['ann_income']!='') { echo $studentdetails['ann_income']; } else { echo"--";}?></td>
					</tr>-->  
                    
                    
                    <tr>
						<td align="left">&nbsp;</td>
						<td align="left" class="narmal">Admission Date </td>
						<td align="left" class="narmal">:</td>
						<td align="left" colspan="5">
						<?php  /*if($studentdetails['admission_date']!="0000-00-00"){ echo func_date_conversion("Y-m-d","d-m-Y",$studentdetails['admission_date']);}else{echo "0000-00-00";} */ ?>
						<?php if( $studentdetails['admission_date']!='') { echo displaydate($studentdetails['admission_date']); } else { echo"--";}?>
		</td>
					</tr>  
                    
                    
                    <!--<tr>
						<td align="left">&nbsp;</td>
						<td align="left" class="narmal">Document deposited </td>
						<td align="left" class="narmal">:</td>
						<td align="left" colspan="5"><?php  //if( $studentdetails['document_deposited']!='') {echo $studentdetails['document_deposited']; } else { echo"--";}?></td>
					</tr>-->  
                       <!--<tr>
						<td align="left">&nbsp;</td>
						<td align="left" class="narmal">Fee Concession</td>
						<td align="left" class="narmal">:</td>
						<td align="left" colspan="5"><?php  //if( $studentdetails['fee_concession']!='') {echo $studentdetails['fee_concession']; } else { echo"--";}?></td>
					</tr>  -->
                    
                    
                    
					   <tr>
                        <td class="narmal">&nbsp;</td>
                        <td align="left" class="narmal" >Academic From</td>
                        <td align="left" class="narmal">:</td>
                        <td colspan="2" align="left" class="narmal"><?php  if( $studentdetails['pre_fromdate']!='') {echo displaydate($studentdetails['pre_fromdate']); } else { echo"--";} ?></td>
                      </tr>
					   <tr>
                        <td class="narmal">&nbsp;</td>
                        <td align="left" class="narmal" >Academic To </td>
                        <td align="left" class="narmal">:</td>
                        <td colspan="2" align="left" class="narmal"><?php echo displaydate($studentdetails['pre_todate']); ?></td>
                      </tr>
					   
                      <tr>
						<td align="left">&nbsp;</td>
						<td align="left" class="narmal">Class In Which Was Studying </td>
						<td align="left" class="narmal">:</td>
						<td align="left" colspan="5"><?php  if( $studentdetails['pre_hobbies']!='') {echo $studentdetails['pre_hobbies'];} else { echo"--";} ?></td>
					  </tr>  
						<tr>
						<td align="left">&nbsp;</td>
						<td align="left" class="narmal">Religion</td>
						<td align="left" class="narmal">:</td>
						<td align="left" colspan="5"><?php  if( $studentdetails['test2']!='') {echo $studentdetails['test2']; } else { echo"--";}?></td>
					</tr>  
          
					  <tr>
                        <td class="narmal" height="10" colspan="8"></td>
                      </tr>
                      <tr>
                        <td height="10" colspan="8"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td height="23"  align="left" valign="middle" class="bgcolor_02">&nbsp;&nbsp;<span class="admin" >Present Address Details</span></td>
                          </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td class="narmal">&nbsp;</td>
                        <td align="left" class="narmal" >Address</td>
                        <td align="left" class="narmal">:</td>
                        <td colspan="5" align="left" class="narmal"><?php  if( $studentdetails['pre_address1']!='') {echo $studentdetails['pre_address1'];} else { echo"--";} ?></td>
                      </tr>
                      <tr>
                        <td class="narmal">&nbsp;</td>
                        <td align="left" class="narmal" >City</td>
                        <td align="left" class="narmal">:</td>
                        <td colspan="2" align="left" class="narmal"><?php  if( $studentdetails['pre_city1']!='') {echo $studentdetails['pre_city1']; } else { echo"--";}?></td>
                        <td width="4%" align="left" class="narmal">&nbsp;</td>
                        <td width="14%" align="left" class="narmal"  >State&nbsp;:</td>
                        <td width="21%" align="left" class="narmal"><?php  if( $studentdetails['pre_state1']!='') {echo $studentdetails['pre_state1'];} else { echo"--";} ?></td>
                      </tr>
                 
					  
					  <tr>
                        <td class="narmal">&nbsp;</td>
                        <td align="left" class="narmal" >  	Area&nbsp;</td>
                        <td align="left" class="narmal">:</td>
                        <td colspan="2" align="left" class="narmal"><?php  if( $studentdetails['pre_country1']!='') {echo $studentdetails['pre_country1'];} else { echo"--";} ?></td>
                        <td align="left" class="narmal">&nbsp;</td>
                        <td align="left" class="narmal" >Pin Code :</td>
                        <td align="left" class="narmal"><?php  if( $studentdetails['pre_pincode']!='') {echo $studentdetails['pre_pincode']; } else { echo"--";}?></td>
                      </tr>
                      <tr>
                        <td class="narmal">&nbsp;</td>
                        <td align="left" class="narmal" >Phone No </td>
                        <td align="left" class="narmal">:</td>
                        <td colspan="2" align="left" class="narmal"><?php  if( $studentdetails['pre_phno1']!='') {echo $studentdetails['pre_phno1']; } else { echo"--";}?><span >&nbsp;</span></td>
                        <td align="left" class="narmal">&nbsp;</td>
                        <td align="left" class="narmal" >Mobile&nbsp;No&nbsp;:</td>
                        <td align="left" class="narmal"><?php  if( $studentdetails['pre_mobile1']!='') {echo $studentdetails['pre_mobile1']; } else { echo"--";}?></td>
                      </tr>
                      <tr>
                        <td class="narmal" height="10" colspan="8"></td>
                      </tr>
                      <tr>
                        <td height="23" colspan="8" align="left" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Permanent&nbsp;Address</span></td>
                      </tr>
                      <tr>
                        <td class="narmal">&nbsp;</td>
                        <td align="left" class="narmal" >Addres</td>
                        <td align="left" class="narmal">:</td>
                        <td colspan="5" align="left" class="narmal"><?php  if( $studentdetails['pre_address']!='') {echo $studentdetails['pre_address']; } else { echo"--";}?></td>
                      </tr>
                     <tr>
                        <td class="narmal">&nbsp;</td>
                        <td align="left" class="narmal" >City</td>
                        <td align="left" class="narmal">:</td>
                        <td colspan="2" align="left" class="narmal"><?php  if( $studentdetails['pre_city']!='') {echo $studentdetails['pre_city'];} else { echo"--";} ?><span >&nbsp;</span></td>
                        <td width="4%" align="left" class="narmal">&nbsp;</td>
                        <td width="14%" align="left" class="narmal" >State: </td>
                        <td width="21%" align="left" class="narmal"><?php  if( $studentdetails['pre_state']!='') {echo $studentdetails['pre_state'];} else { echo"--";} ?></td>
                      </tr>
                   
                      <tr>
                        <td class="narmal">&nbsp;</td>
                        <td align="left" class="narmal" >Area&nbsp;</td>
                        <td align="left" class="narmal">:</td>
                        <td colspan="2" align="left" class="narmal"><?php  if( $studentdetails['pre_country1']!='') {echo $studentdetails['pre_country1']; } else { echo"--";}?></td>
                        <td align="left" class="narmal">&nbsp;</td>
                        <td align="left" class="narmal" >Pin Code :</td>
                        <td align="left" class="narmal"><?php  if( $studentdetails['pre_pincode1']!='') {echo $studentdetails['pre_pincode1']; } else { echo"--";}?></td>
                      </tr>
					           <tr>
                        <td class="narmal">&nbsp;</td>
                        <td align="left" class="narmal" >Phone&nbsp;No</td>
                        <td align="left" class="narmal">:</td>
                        <td colspan="2" align="left" class="narmal"><?php  if( $studentdetails['pre_phno']!='') {echo $studentdetails['pre_phno']; } else { echo"--";}?></td>
                        <td align="left" class="narmal">&nbsp;</td>
                        <td align="left" class="narmal">Mobile No&nbsp;: </td>
                        <td align="left" class="narmal"><?php if( $studentdetails['pre_mobile']!='') { echo $studentdetails['pre_mobile']; } else { echo"--";}?></td>
                      </tr>
                      <tr>
                        <td class="narmal" height="10" colspan="8"></td>
                      </tr>
                      <tr>
                        <td height="23" colspan="8" align="left" valign="middle" class="bgcolor_02" >&nbsp;&nbsp;<span class="admin">Contact Person Details</span></td>
                      </tr>
                      <tr>
                        <td class="narmal" valign="top">&nbsp;</td>
                        <td align="left" valign="top" class="narmal" >Father Educational Qualification :</td>
                        <td align="left" valign="top" class="narmal">:</td>
                        <td colspan="2" align="left" valign="top" class="narmal"><?php  if( $studentdetails['pre_contactname1']!='') {echo $studentdetails['pre_contactname1']; } else { echo"--";}?></td>
                        <td class="narmal" valign="top" align="left">&nbsp;</td>
                        <td align="left" valign="top" class="narmal">Father Official Phone:</td>
                        <td align="left" valign="top" class="narmal"><?php  if( $studentdetails['pre_contactno1']!='') {echo $studentdetails['pre_contactno1']; } else { echo"--";}?></td>
                      </tr>
                      <tr>
                        <td class="narmal" valign="top">&nbsp;</td>
                        <td align="left" valign="top" class="narmal" >Mother Educational Qualification :</td>
                        <td align="left" valign="top" class="narmal">:</td>
                        <td colspan="2" align="left" valign="top" class="narmal"><?php  if( $studentdetails['pre_contactname2']!='') { echo $studentdetails['pre_contactname2']; } else { echo"--";}?></td>
                        <td class="narmal" valign="top" align="left">&nbsp;</td>
                        <td align="left" valign="top" class="narmal">Mther Official Phone:</td>
                        <td align="left" valign="top" class="narmal"><?php  if( $studentdetails['pre_contactno2']!='') {echo $studentdetails['pre_contactno2']; } else { echo"--";}?></td>
                      </tr>
                      <tr>
                        <td class="narmal" valign="top">&nbsp;</td>
                        <td class="narmal" valign="top" >&nbsp;</td>
                        <td class="narmal" valign="top">&nbsp;</td>
                        <td width="2%" valign="top" class="narmal">&nbsp;</td>
                        <td width="30%" valign="top" class="narmal">&nbsp;</td>
                        <td class="narmal" valign="top">&nbsp;</td>
                        <td class="narmal" valign="top">&nbsp;</td>
                        <td class="narmal" valign="top">&nbsp;</td>
                      </tr>
                      </table>
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <!--<tr>
                        <td height="23" colspan="9" align="left" valign="middle" class="bgcolor_02" >&nbsp;&nbsp;<a href="#" class="admin">Student Previous Details</a></td>
                        </tr>-->
                              <!--<tr>
                                <td width="5%" align="left" class="narmal" >&nbsp;</td>
                                <td colspan="5" align="left" class="narmal" >&nbsp;Previous Qualification </td>
                                <td width="1%" align="left" class="narmal">:</td>
                                <td width="71%" align="left" class="narmal"><?php  //if( $studentdetails['pre_prev_acadamicname']!='') {echo $studentdetails['pre_prev_acadamicname'];} else { echo"--";} ?></td>
                              </tr>
                              <tr>
                                <td align="left" class="narmal" >&nbsp;</td>
                                <td colspan="5" align="left" class="narmal" >&nbsp;Final Results</td>
                                <td align="left" class="narmal">:</td>
                                <td align="left" class="narmal"><?php  //if( $studentdetails['pre_prev_class']!='') {echo $studentdetails['pre_prev_class']; } else { echo"--";}?></td>
                              </tr>
                              <tr>
                                <td align="left" class="narmal" >&nbsp;</td>
                                <td colspan="5" align="left" class="narmal" >&nbsp;Board/University</td>
                                <td align="left" class="narmal">:</td>
                                <td align="left" class="narmal"><?php  //if( $studentdetails['pre_prev_university']!='') {echo $studentdetails['pre_prev_university'];} else { echo"--";} ?></td>
                              </tr>
                            
                              <tr>-->
                                <td colspan="8">&nbsp;</td>
                              </tr>
                              <!--<tr>
                                <td colspan="8" align="center" valign="top"><table width="90%" border="1" cellpadding="0" cellspacing="0" class="tbl_grid">
                                    <tr class="bgcolor_02" height="22">
                                      <td width="26%" align="center" class="admin">Institution</td>
                                      <td width="44%" align="center" class="admin">Ceritificate Gained</td>
                                      <td width="30%" align="center"class="admin">Result</td>
                                    </tr>
                                    <tr>-->
                                      <!--<td align="center" valign="top" class="narmal">&nbsp;
									  	<?php 
						//$inst_arr= $db->getRow("SELECT * FROM es_institutes where inst_id='".$studentdetails['pre_current_class1']."'");
					 ?>	  <?php //if( $inst_arr['inst_name']!=''){ echo $inst_arr['inst_name'];} else { echo"--";} ?></td>
                                      <td class="narmal" align="center" valign="top">&nbsp;<?php //if( $studentdetails['pre_current_percentage1']!='') {echo $studentdetails['pre_current_percentage1'];} else { echo"--";} ?></td>
                                      <td align="center" valign="top" class="narmal">&nbsp;<?php //if( $studentdetails['pre_current_result1']!='') {echo $studentdetails['pre_current_result1']; } else { echo"--";}?></td>
                                    </tr>-->
                                    
                                </table></td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td class="narmal" height="20" align="left" valign="top"></td>
                        </tr>
					  </table></td>
                  </tr>
                  <tr>
                    <td class="narmal" height="150" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td height="25" class="bgcolor_02"><a class="admin">&nbsp;Student Physical Details </a></td>
                      </tr>
                      <tr>
                        
                        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td align="left" valign="top"><table width="100%" border="0" cellspacing="3" cellpadding="0">
                                  <tr>
                                    <td colspan="8">&nbsp;</td>
                                  </tr>
                              
                                  <tr>
                                    <td width="4%" align="left" class="narmal" >&nbsp;</td>
                                    <td colspan="5" align="left" class="narmal" >&nbsp;<!--Height--></td>
                                    <td width="1%" align="left" class="narmal"><!--:--></td>
                                    <td width="64%" align="left" class="narmal"><?php //if( $studentdetails['pre_height']!='') {echo htmlentities($studentdetails['pre_height']); } else { echo"--";}?></td>
                                  </tr>
                                  <!--<tr>
                                    <td align="left" class="narmal" >&nbsp;</td>
                                    <td colspan="5" align="left" class="narmal" >&nbsp;Weight</td>
                                    <td align="left" class="narmal">:</td>
                                    <td align="left" class="narmal"><?php if( $studentdetails['pre_weight']!='') {echo $studentdetails['pre_weight']; } else { echo"--";}?></td>
                                  </tr>-->
								  <tr>
								    <td align="left" class="narmal" >&nbsp;</td>
                                    <td colspan="5" align="left" class="narmal" >&nbsp;Blood Group</td>
                                    <td align="left" class="narmal">:</td>
                                    <td align="left" class="narmal"><?php if( $studentdetails['pre_blood_group']!='') { echo $studentdetails['pre_blood_group'];} else { echo"--";} ?></td>
                                  </tr>
                                <tr>
                                  <td align="left" class="narmal" >&nbsp;</td>
                                    <td colspan="5" align="left" class="narmal" >&nbsp;Mother Tongue</td>
                                    <td align="left" class="narmal">:</td>
                                  <td align="left" class="narmal"><?php if( $studentdetails['pre_alerge']!='') { echo $studentdetails['pre_alerge']; } else { echo"--";}?></td>
                                </tr>
                                  <!--<tr>
                                    <td align="left" class="narmal" >&nbsp;</td>
                                    <td colspan="5" align="left" class="narmal" >&nbsp;Physical Ability(If Disabled)</td>
                                    <td align="left" class="narmal">:</td>
                                    <td align="left" class="narmal"><?php //if( $studentdetails['pre_physical_status']!='') {echo $studentdetails['pre_physical_status']; } else { echo"--";}?></td>
                                  </tr>
                                <tr>
                                  <td align="left" class="narmal" >&nbsp;</td>
                                    <td colspan="5" align="left" class="narmal" >&nbsp;Special Care Requirements </td>
                                    <td align="left" class="narmal">:</td>
                                  <td align="left" class="narmal"><?php //if( $studentdetails['pre_special_care']!='') { echo $studentdetails['pre_special_care'];} else { echo"--";} ?></td>
                                </tr>-->
								    <tr>
								      <td align="left" class="narmal">&nbsp;</td>
                                    <td align="left" colspan="5" class="narmal">&nbsp;Nationality</td>
														<td align="left">:</td>
														<td align="left"><?php if( $studentdetails['test1']!='') {echo $studentdetails['test1']; } else { echo"--";}?></td>
                                </tr>
                                  <tr>
                                    <td class="narmal" colspan="8"></td>
                                  </tr>
                                  <tr>
                                    <td colspan="8" align="center">&nbsp;</td>
                                  </tr>
                              </table></td>
                            </tr>
                        </table></td>

                        
                      </tr>                     
                    </table></td>
                  </tr>
                </table></td>                
             </tr>              
              
            </table>
		</form>		
		</td>
		<td width="1" class="bgcolor_02"></td>
	  </tr>	  
	  <tr>
		<td height="1" colspan="3" class="bgcolor_02"></td>
		</tr>
	</table>
<?php	
	}
// End of Leave Master	
?>
	