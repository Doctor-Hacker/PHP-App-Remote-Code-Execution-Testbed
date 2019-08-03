<?php
/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}

/**
* *************Enquiry form for student to admit into class*************************
*/

?>
<form method="post" name="newenquiry" action="" >

<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
         <td height="3" colspan="3"></td>
	 </tr>
    <tr>
        <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Enquiry Form  </span></td>
    </tr>
	<tr>
                <td width="1px" class="bgcolor_02" ></td>
                <td height="25" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font><br /></td>
                 <td width="1px" class="bgcolor_02" ></td></td>
              </tr>
    <tr>
        <td width="1" class="bgcolor_02"></td>
        <td align="left" valign="top">
		  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                
                <tr>
                    <td height="450" align="left" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                 <tr>
                     <td height="23" align="left" valign="top">
					     <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                 <td align="left" valign="middle" class="admin">
                                   <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                         <td height="25" class="bgcolor_02">									 
										 &nbsp;&nbsp;<span class="admin">Applicant Details</span></td>
                                      </tr>
                                   </table>								 </td>
                              </tr>
                         </table>					</td>
                 </tr>
                 <tr>
                     <td height="10" align="left" valign="top"></td>
                 </tr>
                 <tr>
                     <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                 <tr>
                     <td align="left" valign="top">
				    	
					     	<table width="100%" border="0" cellspacing="3" cellpadding="0">
                               <tr>
                                 <td height="28" align="left" class="narmal">&nbsp;&nbsp;Applicant Name</td>
                                 <td align="left"><input name="eq_wardname" type="text" id="eq_wardname" value="<?php echo $eq_wardname; ?>" /><?php 	if (isset($error)&&$error!=""){echo 
                           '<div class="error_message">' . $error_wardname. '</div>';	}?>
                           <font color="#FF0000">*</font><input name="newapplicant" type="hidden" value="newapplicant" /></td>
                                 <td align="center"class="narmal">&nbsp;</td>
                                 <td align="center" valign="top">&nbsp;</td>
                               </tr>
                               <tr>
                                 <td align="left" class="narmal"> &nbsp;&nbsp;Gender</td>
                                 <td align="left"><select name="eq_sex" style="width:150px;">
                                 
                                
                                 
                                 		<?php  if($eq_sex=='female'){?>
                                 
                                   <option value="male" >Male</option>
                                   <option value="female" selected="selected" >Female</option>
                                   <?php }else{?>
                                   <option value="male"  selected="selected">Male</option>
                                   <option value="female">Female</option>
                                   <?php }?>
                                 </select></td>
                                 <td align="center"class="narmal">&nbsp;</td>
                                 <td align="center" valign="top">&nbsp;</td>
                               </tr>
                               <tr>
							      <td width="227" align="left" class="narmal">&nbsp;&nbsp;Father / Guardian Name</td>								
							      <td width="253" align="left">
							     <input type="text" name="eq_name"  id="eq_name" value="<?php echo $eq_name;?>" />                                   <font color="#FF0000">*</font></td>
			                       <td width="426" align="center"class="narmal">&nbsp;</td>
							       <td width="33" align="center" valign="top">&nbsp;</td>
							   </tr>
                               <tr>
                                 <td align="left" class="narmal">&nbsp; Mother Name</td>
                                 <td height="25" align="left"><input type="text" name="eq_mothername"  id="eq_name2" value="<?php echo $eq_mothername;?>" /></td>
                                 <td>&nbsp;</td>
                                 <td>&nbsp;</td>
                               </tr>
                               <tr>
                                  <td align="left"><span class="narmal">&nbsp;&nbsp;Address</span></td>
                                  <td height="25" align="left"><textarea name="eq_address" id="eq_address"><?php echo $eq_address;?></textarea><?php 	if (isset($error)&&$error!=""){echo '<div class="error_message">' . $error_address. '</div>';}?><font color="#FF0000">*</font></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                               </tr>
                               <tr>
                                  <td align="left"><span class="narmal">&nbsp;&nbsp;City</span></td>
                                  <td height="25" align="left"><input name="eq_city" type="text" id="eq_city" value="<?php echo $eq_city; ?>" /></td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                               </tr>
                               <tr>
                                  <td align="left"><span class="narmal">&nbsp;&nbsp;State</span></td>
                                 <td height="25" align="left"><input name="eq_state" type="text" id="eq_state" value="<?php echo $eq_state; ?>" /></td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                               </tr>
                               <tr>
                                 <td align="left" class="narmal">&nbsp;&nbsp;Country</td>
                                 <td height="25" align="left"><input name="eq_countryid" type="text" id="eq_countryid"  value="<?php echo $eq_countryid; ?>" /></td>
                                 <td>&nbsp;</td>
                                 <td>&nbsp;</td>
                               </tr>
                               <tr>
                                  <td align="left"><span class="narmal">&nbsp;&nbsp;Email ID </span></td>
                                  <td height="25" align="left"><input name="eq_emailid" type="text" id="eq_emailid"  value="<?php echo $eq_emailid; ?>" />
                                  <input name="eq_newregistration" type="hidden" value="eq_newregistration" /></td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                               </tr>
                               <tr>
                                  <td align="left"><span class="narmal">&nbsp;&nbsp;Postal Code</span></td>
                                  <td height="25" align="left"><input name="eq_zip" type="text" id="eq_zip"  value="<?php echo $eq_zip; ?>" /></td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                               </tr>
                               <tr>
                                 <td align="left" class="narmal">&nbsp;&nbsp;Date of Birth</td>
                                 <td height="25" align="left"><input name="eq_dob" type="text" id="eq_dob" size="10" value="<?php if (isset($es_enquiryList[0]->eq_dob)) {	echo $es_enquiryList[0]->eq_dob;}else{echo $eq_dob; } ?>" readonly="readonly" /><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.newenquiry.eq_dob);return false;" ><img src="<?php echo JS_PATH ?>/WeekPicker/calbtn.gif" alt="Calender" name="popcal" width="34" height="22" border="0" align="absmiddle" id="popcal" /></a><iframe width=199 height=178 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="<?php echo JS_PATH ?>/WeekPicker/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe>
                                   <font color="#FF0000">*</font></td>
                                 <td>&nbsp;</td>
                                 <td>&nbsp;</td>
                               </tr>
                               <tr>
                                 <td align="left"><span class="narmal">&nbsp; Phone No </span></td>
                                 <td height="25" align="left"><input name="eq_phno" type="text" id="eq_phno" value="<?php echo $eq_phno; ?>" /></td>
                                 <td>&nbsp;</td>
                                 <td>&nbsp;</td>
                               </tr>
                               <tr>
                                 <td align="left"><span class="narmal">&nbsp;&nbsp;Mobile  No</span></td>
                                 <td height="25" align="left"><input name="eq_mobile" type="text" id="eq_mobile" value="<?php echo $eq_mobile; ?>" />
                                 <font color="#FF0000">*</font></td>
                                 <td>&nbsp;</td>
                                 <td>&nbsp;</td>
                               </tr>
                               <tr>
                                 <td align="left">&nbsp;</td>
                                 <td height="25" colspan="2" align="left"><span style="color:#FF0000">(All future SMS messages will be sent to this number)</span></td>
                                 <td>&nbsp;</td>
                               </tr>
                        </table></td>
                                </tr>
                          </table>					 </td>
                    </tr>
                    <tr>
                        <td height="25" align="left" valign="middle"><span class="admin">&nbsp;</span>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                               <tr class="bgcolor_02">
                                 <td height="25" class="admin">&nbsp;&nbsp;Admission Details</td>
                               </tr>
                            </table>						</td>
                     </tr>
                     <tr>
                         <td height="10" align="left" valign="top"></td>
                     </tr>
                     <tr>
                         <td align="left" valign="top"><table width="100%" border="0" cellspacing="3" cellpadding="0">
                     <tr>
                         <td width="24%"><span class="narmal">&nbsp;&nbsp;Class&nbsp;to&nbsp;be&nbsp;Admitted </span></td>
                         <td width="28%" height="25"><?php /*?><select name="eq_class" style="width:150px;" onchange="this.form.submit()">
						<?php 
						$classlist = getallClasses();
						foreach($classlist as $indclass) {
						?>
						<option <?php if($eq_class==$indclass['es_classesid']) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_classesid']; ?>"><?php echo $indclass['es_classname']; ?></option>
						<?php } ?>
						</select>	<?php */?>
                           <select name="pre_class" style="width:120px;" onchange="this.form.submit()">
                             <option value="">Select Class</option>
                             <?php 
								$classlist = getallClasses();
								foreach($classlist as $indclass) {
								if($es_enquiryList[0]->eq_class == $indclass['es_classesid'] || $indclass['es_classesid']==$pre_class) { 
								$sel_cl = "selected='selected'"; }else { $sel_cl  ="";}
								?>
                             <option <?php echo $sel_cl; ?> value="<?php echo $indclass['es_classesid']; ?>" ><?php echo $indclass['es_classname']; ?></option>
                             <?php } ?>
                           </select></td>
                        <td width="8%">&nbsp;</td>
                        <td width="40%">&nbsp;</td>
                     </tr>
                  <?php /*?> <tr>
                         <td width="24%"><span class="narmal">&nbsp;&nbsp;Subject </span></td>
                         <td width="28%" height="25">
						  
                     <select name="scat_id" >
                                      <option value="">Select Subject</option>
                                    <?php 
									if(isset($pre_class) && $pre_class>=1){
									
									$sub_cat_arr = $db->getrows("SELECT * FROM subjects_cat WHERE classid='".$pre_class."'");
									}
									if(count($sub_cat_arr)>0){
									foreach($sub_cat_arr  as $each){
									?>
                                    <option value="<?php echo $each['scat_id'];?>" <?php if($scat_id==$each['scat_id']){echo "selected='selected'";}?>><?php echo $each['scat_name']; ?></option>
                                    <?php
									}
									}
									?>
                                    </select>					</td>
                        <td width="8%">&nbsp;</td>
                        <td width="40%">&nbsp;</td>
                     </tr>   <?php */?>
                   
                     <tr>
                         <td align="left" class="narmal">&nbsp;&nbsp;Previous Academics</td>
                         <td height="25"><input name="eq_prv_acdmic" type="text" id="eq_prv_acdmic" value="<?php echo $eq_prv_acdmic; ?>" /></td>
                         <td>&nbsp;</td>
                         <td>&nbsp;</td>
                     </tr>
                     
                    </table>			      </td>
                </tr>
                <tr>
                  <td height="23" align="left" valign="middle"><span class="admin">&nbsp; </span>
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                           <td height="25" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Referral Details </span></td>
                        </tr>
                      </table>				  </td>
                </tr>
                <tr>
                    <td height="10" align="left" valign="top"></td>
                </tr>
				<tr>
                    <td height="23" align="left" valign="top">
					 <table width="100%" border="0" cellspacing="3" cellpadding="0">
                         <tr>
                             <td width="24%"><span class="narmal">&nbsp;&nbsp;Reference Type </span></td>
                             <td width="35%" height="25">
							 <select name="eq_reftype" id="eq_reftype">
                                <option value="">.....Select.....</option>
                                <option value="Personal Reference" <?php if($eq_reftype == 'Personal Reference'){ echo "selected"; } ?>>Personal Reference</option>
                                <option value="News Paper" <?php if($eq_reftype == 'News Paper'){ echo "selected"; } ?>>News Paper</option>
                                <option value="Media Ads" <?php if($eq_reftype == 'Media Ads'){ echo "selected"; } ?>>Media Ads</option>
                                <option value="Hoardings" <?php if($eq_reftype == 'Hoardings'){ echo "selected"; } ?>>Hoardings</option>
                              </select>                              </td>
                              <td width="10%">&nbsp;</td>
                              <td width="31%">&nbsp;</td>
                         </tr>
                         <tr>
                             <td><span class="narmal">&nbsp;&nbsp;Reference  Name </span></td>
                              <td height="25"><input name="eq_refname" type="text" id="eq_refname" value="<?php echo $eq_refname; ?>" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                         </tr>
                         <tr>
                             <td><span class="narmal">&nbsp;&nbsp;Details</span></td>
                              <td height="25"><textarea name="eq_description" id="eq_description"><?php echo $eq_description; ?></textarea></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                         </tr>
                         <tr>
                             <td>&nbsp;</td>
                             <td height="25">&nbsp;</td>
                             <td>&nbsp;</td>
                             <td>&nbsp;</td>
                         </tr>
                      </table>					</td>
                  </tr>						              
                  <tr>
                      <td height="25" align="center" valign="top"><input name="Submit" type="submit" class="bgcolor_02" value="Submit" style="cursor:pointer;"/>
                          &nbsp;&nbsp;                                       
                          <input name="Submit2" type="reset" class="bgcolor_02" value="Reset" style="cursor:pointer;"/>
                          <!--&nbsp;&nbsp;<input name="Submit3" type="button" onClick="history.go(-1)" class="bgcolor_02" value="Back" style="cursor:pointer;"/>-->
                          &nbsp;&nbsp;</td>
                  </tr>
                  <tr>
                     <td height="10" align="left" valign="middle">
					     <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          </table>					 </td>
                  </tr>
                </table>			</td>
           </tr>
         </table></td>
             <td width="1" class="bgcolor_02"></td>
         </tr>              
         <tr>
             <td height="1" colspan="3" class="bgcolor_02"></td>
         </tr>
</table>
</form>