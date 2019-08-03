<?php
/**
* Only Admin users can view the pages
*/

if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}

/**
*   ***********For Offerletter Format *****************
*/
?>
<script language="javascript">
	function goto_URL(object)
	{
	
	window.location.href = object.options[object.selectedIndex].value;
	}
	</script>
	<script type="text/javascript">

					function fun()
					{ 
						 if(document.form1.txt_post.value==""){
							alert("Select Department");		
							return false;
						}
						if(document.form1.txt_deptname.value=="select"){
							alert("Select Post");		
							return false;
						}
						else
						{
						return true;
						}	   
					}
	 		</script>	
<script language="javascript">
	function SelectChkbox()
            {
                
				var oInputs = document.getElementsByTagName('input');
                 
				  if(document.getElementById("checkall").checked == true) {
                  	    var ischked = true;
						
                  }else{
                        var ischked = false;
                  }
                  for ( i = 0; i < oInputs.length; i++ )
                  {
                  // loop through and find <input type="checkbox"/>
                        if (oInputs[i].type == 'checkbox')
                        {
                           
						      var chk_box = oInputs[i].id;
							  
                              document.getElementById(chk_box).checked = ischked;
                        }
                  }
                  activatePermission();
            }
			

</script>


<?php

if ($action=='offerletter'){
?>

<?php  include("includes/js/fckeditor/fckeditor.php") ;?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <form action="" method="post">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<strong>Offer Letter Format</strong>
				</td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td  align="left" valign="top">
				  <table width="100%" border="0" cellspacing="5" cellpadding="0">				
					   <tr>
						  
						  <td align="left" valign="top" class="narmal">
						                                <?php $sBasePath = $_SERVER['PHP_SELF'] ;
															  $sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "?pid" ) ) ;
															  $sBasePath = $sBasePath."includes/js/fckeditor/";
															  $oFCKeditor = new FCKeditor('blogDesc') ;
															  $oFCKeditor->BasePath	= $sBasePath ;
															  $oFCKeditor->Height = 500;
															  $oFCKeditor->Width = 600;
															  $oFCKeditor->Value		= html_entity_decode($es_offerletter->ofr_message) ;
															  $oFCKeditor->Create() ;
														?>	  
						 </td>
						</tr>                  
						<tr>
						  
						  <td align="center" valign="top" class="narmal"><input name="Offerupdate" type="submit" class="bgcolor_02" value="Update Offer Letter" style="cursor:pointer;"/>
							  <input name="back" type="submit" class="bgcolor_02" value="Cancel" style="cursor:pointer;" />
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
<?php
}
	
/**
*   ***********For Add/Edit Candidate*****************
*/
			
if($action=='applicant_enquiries' || $action=='editcandidate'){

?>
<form  method="post" name="viewstaff"  action="" enctype="multipart/form-data">
	
 <script type="text/javascript">
	
	function getfieldvalues(){
		if (document.getElementById('sameaddress1').checked){
			//alert("checked");
			document.viewstaff.pre_address.value=document.viewstaff.st_address.value;
			document.viewstaff.st_pecity.value=document.viewstaff.st_city.value;
			document.viewstaff.st_pepin.value=document.viewstaff.st_pincode.value;
			document.viewstaff.st_pephone.value=document.viewstaff.st_phone.value;
			document.viewstaff.st_pestate.value=document.viewstaff.st_state.value;
			document.viewstaff.st_pemobno.value=document.viewstaff.st_mobile.value;
			document.viewstaff.st_pecountry.value=document.viewstaff.st_country.value;
		}else{
			document.viewstaff.pre_address.value="";
			document.viewstaff.st_pecity.value="";
			document.viewstaff.st_pepin.value="";
			document.viewstaff.st_pephone.value="";
			document.viewstaff.st_pestate.value="";
			document.viewstaff.st_pemobno.value="";
			document.viewstaff.st_pecountry.value="";
		}
  }
 </script>
	
<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
         <td height="3" colspan="3"></td>
	 </tr>
           <tr>
              <td height="25" colspan="3" class="bgcolor_02"><strong class="admin">&nbsp;Applicant Enquiry</strong>  </td>
            </tr>			  
             <tr>
               <td width="1" class="bgcolor_02"></td>
                <td  align="left" valign="top">
				       <table width="100%" border="0" cellspacing="0" cellpadding="0">
                           <tr>
                              <td align="left" valign="top">
				                     <table width="100%" border="0" cellspacing="3" cellpadding="3">
					                     <tr>
                		                       <td height="25" colspan="6" align="right" >
			                                    	<font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font>												</td>
                                          </tr>                      
                                           <tr>
												 <td width="5%">&nbsp;</td>
												 <td width="19%" class="narmal">First&nbsp;Name </td>
												 <td width="5%">:</td>
												 <td width="71%"><input type="text" name="st_fname" id="st_fname" value="<?php  if(isset($st_fname)&&$st_fname!=''){echo $st_fname ;}else { echo $eachrecord1->st_firstname;}?>" />&nbsp;<font color="#FF0000"><b>*</b></font></td>
	              						   </tr>
											<tr>
												<td>&nbsp;</td>
												<td class="narmal">Last&nbsp;Name </td>
												<td>:</td>
												 <td><input type="text" name="st_lname" id="st_lname" value="<?php if(isset($st_lname)&&$st_lname!='') {echo $st_lname ; } 
						else { echo $eachrecord1->st_lastname;}?>"/></td>
											</tr>
											 <tr>
												 <td>&nbsp;</td>
												<td class="narmal">Gender</td>
												 <td>:</td>
												<td><?php  if(isset($st_gender)&&$st_gender!='') { $st_gender; } else { $st_gender=$eachrecord1->st_gender; }?>
											<select name="st_gender" style="width:148px">
												<option value="" <?php echo ($st_gender=='')?"selected":""?>>Select</option>
												<option value="male" <?php echo ($st_gender=='male')?"selected":""?>>Male</option>
												<option value="female" <?php echo ($st_gender=='female')?"selected":""?>>Female</option>
											</select>&nbsp;<font color="#FF0000"><b>*</b></font>
												</td>
											</tr>
											 <tr>
												 <td>&nbsp;</td>
												 <td class="narmal">Date Of Birth </td>
												 <td>:</td>
												 <td>
														<table width="29%" border="0" cellspacing="0" cellpadding="0">
																 <tr>
																	 <td width="17%"><input name="st_dob"  value="<?php if(isset($st_dob)&&$st_dob !="" ){echo $st_dob;}elseif($eachrecord1->st_dob!=''){echo formatDBDateTOCalender($eachrecord1->st_dob);} ?>" type="text"size="14" onchange="return registrationvalid()"  id="st_doj" readonly /></td>
																	<td width="83%"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.viewstaff.st_dob);return false;" ><img name="popcal" align="absmiddle" src="<?php echo JS_PATH ?>/WeekPicker/calbtn.gif" width="34" height="22" border="0" alt="" /></a>
																	</td>
																	<td>&nbsp;<font color="#FF0000"><b>*</b></font>
																	</td>
																</tr>
															</table>
                    
                    <iframe width=199 height=178 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="<?php echo JS_PATH ?>/WeekPicker/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"> </iframe>						                             </td>
                                               </tr>
                                      <?php /*?>         
                                               <?php echo $eachrecord1->st_department;
											   echo $st_department;
											   ?>
                                         <?php */?>
											   <tr>
													<td width="5%">&nbsp;</td>
													<td width="19%" class="narmal">Department</td>
													<td width="5%">:</td>
													 <td width="71%">
													 <?php 
											
											if(isset($st_department) && $st_department!='')
											{
											$st_department=$st_department;
											}
											else
											{
											 $st_department=$eachrecord1->st_department;
											}
											?> <select name="st_department"  onchange="JavaScript:document.viewstaff.submit();" style="width:150px;">
												<option value="">-Select-</option>
												<?php foreach($getdeptlist as $eachrecord) { 
												?>
                     <option value="<?php echo $eachrecord[es_departmentsid];?>" <?php if($eachrecord['es_departmentsid']==$st_department){?> selected="selected" <?php } ?> ><?php echo $eachrecord[es_deptname];} ?></option>
												
											</select>&nbsp;<font color="#FF0000"><b>*</b></font>
					                             </td>
                                                 
                                            
                                                 	<?php /*?> <td width="71%">
													 <?php if($action!='editcandidate') { ?>
													 <select name="st_department"  onchange="JavaScript:document.viewstaff.submit();" style="width:150px;">
												<option value="">-Select-</option>
												<?php foreach($getdeptlist as $eachrecord) { 
												?>
												<option value="<?php echo $eachrecord[es_departmentsid];?>" <?php  echo ($eachrecord[es_departmentsid]==$st_department)?"selected":"" ?>  ><?php echo $eachrecord[es_deptname];} ?></option>
												
											</select>
											<?php } else { ?> 	 <select name="st_department"  onchange="JavaScript:document.viewstaff.submit();" style="width:150px;">
												<option value="">-Select-</option>
												<?php foreach($getdeptlist as $eachrecord) { 
												?>
												<option value="<?php echo $eachrecord[es_departmentsid];?>" <?php if(isset($st_department) && $eachrecord[es_departmentsid]== $eachrecord1->st_department){?> selected="selected"<?php }else{echo $eachrecord[es_departmentsid];} ?>  ><?php echo $eachrecord[es_deptname];} ?></option>
												
											</select><?php } ?>&nbsp;<font color="#FF0000"><b>*</b></font>
					                             </td><?php */?>
                                                 
												</tr>
					
											
										 <tr>
											<td valign="top"></td>
											<td valign="top" class="narmal">Class</td>
											<td valign="top">:</td>
											<td colspan="4" valign="top">
                                            
                                            <select name="st_class"  onchange="JavaScript:document.viewstaff.submit();"  style="width:150px;">
											<option value="">-Select-</option>
												<?php foreach($getclasslist as $eachrecord) { ?>
												<option value="<?php echo $eachrecord[es_classesid];?>" <?php if(isset($st_class)) { echo ($eachrecord[es_classesid]==$st_class)?"selected":""; } else { echo ($eachrecord1->st_class== $eachrecord[es_classesid])?"selected":"" ;}?>  ><?php echo $eachrecord[es_classname];?></option>
												<?php } ?>
											</select>	
						
                        				<?php /*?><?php if($action!='editcandidate') { ?>
											<select name="st_class"  onchange="JavaScript:document.viewstaff.submit();"  style="width:150px;">
											<option value="">-Select-</option>
												<?php foreach($getclasslist as $eachrecord) { ?>
												<option value="<?php echo $eachrecord[es_classesid];?>" <?php  echo ($eachrecord[es_classesid]==$st_class)?"selected":"";   ?>  ><?php echo $eachrecord[es_classname];?></option>
												<?php } ?>
											</select>	
                                            <?php }else{?>
												<select name="st_class"  onchange="JavaScript:document.viewstaff.submit();"  style="width:150px;">
											<option value="">-Select-</option>
												<?php foreach($getclasslist as $eachrecord) { ?>
												<option value="<?php echo $eachrecord[es_classesid];?>" <?php  echo ($eachrecord[es_classesid]==$eachrecord1->$st_class)?"selected":"";   ?>  ><?php echo $eachrecord[es_classname];?></option>
												<?php } ?>
											</select>	
										<?php	}?>			<?php */?>
                                        
				<?php /*?>		 <?php if($action!='editcandidate') { ?>
													 <select name="st_class"  onchange="JavaScript:document.viewstaff.submit();" style="width:150px;">
												<option value="">-Select-</option>
												<?php foreach($getdeptlist as $eachrecord) { 
												?>
												<option value="<?php echo $eachrecord[es_classesid];?>" <?php  echo ($eachrecord[es_classesid]==$st_class)?"selected":"" ?>  ><?php echo $eachrecord[es_classname];} ?></option>
												
											</select>
											<?php } else { ?> 	 <select name="st_class"  onchange="JavaScript:document.viewstaff.submit();" style="width:150px;">
												<option value="">-Select-</option>
												<?php foreach($getdeptlist as $eachrecord) { 
												?>
												<option value="<?php echo $eachrecord[es_classesid];?>" <?php  echo ($eachrecord[es_classesid]== $eachrecord1->st_class)?"selected":"" ?>  ><?php echo $eachrecord[es_classname];} ?></option>
												
											</select><?php }?><?php */?>
										 </td>
									    </tr>
										<tr>
                                           					  
												<td>&nbsp;</td>
												<td class="narmal">Post Applied For</td>
												<td>:</td>
												<td>
                                               
                                                <select name="st_postaplied"   style="width:150px;"  >
											   <option value="" >Select</option>
											   <?php if(count($es_postList) > 0 ){
											   foreach ($es_postList as $eachrecord){ ?>
											   <option value="<?php echo $eachrecord->es_deptpostsId;?>" <?php 
											    if(isset($st_postaplied) && $eachrecord->es_deptpostsId==$st_postaplied){?>selected="selected"<?php }elseif($eachrecord->es_deptpostsId==$eachrecord1->st_post){?> selected="selected" <?php } ?>  ><?php echo $eachrecord->es_postname;?></option>
											   <?php    } }?>
											   </select>&nbsp;<font color="#FF0000"><b>*</b></font>
											 </td>
											</tr> 
										<tr>
											<td valign="top"></td>
											<td valign="top" class="narmal">Primary Subject </td>
											<td valign="top">:</td>
											<td colspan="4" valign="top">
									  <select name="st_subject" style="width:150px;" >
									  <option value="Select">-Select-</option>
									 <?php 					 
									  if(count($es_subjectList) > 0 ){
									  								
									   foreach ($es_subjectList as $eachrecord){
									   						  	 				   																						
									  ?>  							   
									   <option value="<?php echo $eachrecord->es_subjectId;?>" <?php if(isset($st_subject)) { echo ($eachrecord->es_subjectId==$st_subject)?"selected":"";}else { echo ($eachrecord1->st_primarysubject==$eachrecord->es_subjectId)? "selected":"" ;} ?>  ><?php echo $eachrecord->es_subjectname;?></option>
									   <?php    } }?>
									   </select>  						   					  
									  
											</td>
										 </tr> 
					 
										  <tr>
											<td>&nbsp;</td>
											<td class="narmal">Secondary Subject</td>
											<td>:</td>
											
											<td><input type="text" name="st_secsub" id="st_secsub" value="<?php if(isset($st_secsub)&&$st_secsub!='') {echo $st_secsub ; } else { echo $eachrecord1->st_mobilenocomunication;}?>"/></td>
										  </tr>
						 
										  <tr>
											<td valign="top">&nbsp;</td>
											<td valign="top" class="narmal">Email</td>
											<td valign="top">:</td>
											
											<td colspan="4" valign="top"><input type="text" name="st_email" id="st_email" value="<?php if(isset($st_email)&&$st_email!='') {echo $st_email ; } else { echo $eachrecord1->st_email;}?>"/>&nbsp;<font color="#FF0000"><b>*</b></font></td>
										  </tr>                    
										  <tr>                        
											<td colspan="7"  class="bgcolor_02" align="left" valign="middle" >&nbsp;&nbsp;<span class="admin" >Qualification</span></td>
										  </tr>
										  <tr>
                        
										  <td colspan="7"   align="left" valign="middle" ></td>
									    </tr>
									    <tr>
										  <td>&nbsp;</td>
										  <td colspan="6" align="center" class="narmal"><table width="60%" border="1" cellspacing="0" cellpadding="0" class="tbl_grid">
										 <tr class="bgcolor_02">
											  <td width="7%" height="20" align="center" class="admin">&nbsp;S No </td>
											  <td width="31%" align="center" class="admin">&nbsp;&nbsp;&nbsp;Exam Passed </td>
											  <td width="31%" align="center" class="admin">&nbsp;&nbsp;&nbsp;Marks Obtained</td>
											  <td width="35%" align="center" class="admin">&nbsp;&nbsp;Board / University </td>
											  <td width="27%" align="center" class="admin">&nbsp;&nbsp;Year</td>
										  </tr>
											<tr>
											  <td align="center" class="narmal"><input name="st_sno1" type="text" id="st_sno1" size="5"  value="1"/></td>
										      <td class="narmal"><input name="st_pass1" type="text" id="st_pass1"  value="<?php 
											  if(isset($eachrecord1->st_examp1) && $st_pass1=="" ){
											  echo $eachrecord1->st_examp1;}else{echo $st_pass1;}?>"/></td>
											  <td class="narmal"><input name="st_marks1" type="text" id="st_marks1"  value="<?php 
											  if(isset($eachrecord1->st_marks1) && $st_marks1=="" ){
											  echo $eachrecord1->st_marks1;}else{echo $st_marks1;}?>"/></td>
										      <td class="narmal"><input name="st_board1" type="text" id="st_board1" value="<?php  
											  if(isset($eachrecord1->st_borduniversity1) && $st_board1==""){
											  echo $eachrecord1->st_borduniversity1;}else{echo $st_board1;}?>" /></td>
											  <td class="narmal"><input name="st_year1" type="text" id="st_year1" value="<?php  
											  if(isset($eachrecord1->st_year1) && $st_year1==""){
											  echo $eachrecord1->st_year1;}else{echo $st_year1;}?>" /></td>
										    </tr>
										  <tr>
										    <td align="center" class="narmal"><input name="st_sno2" type="text" id="st_sno2" size="5"  value="2"/></td>
											  <td class="narmal"><input name="st_pass2" type="text" id="st_pass2"  value="<?php  
											  if(isset($eachrecord1->st_examp2) && $st_pass2=="" ){
											  echo $eachrecord1->st_examp2;}else{echo $st_pass2;}?>"/></td>
											  <td class="narmal"><input name="st_marks2" type="text" id="st_marks2"  value="<?php 
											  if(isset($eachrecord1->st_marks2) && $st_marks2=="" ){
											  echo $eachrecord1->st_marks2;}else{echo $st_marks2;}?>"/></td>
											  <td class="narmal"><input name="st_board2" type="text" id="st_board2"value="<?php 
											  if(isset($eachrecord1->st_borduniversity2) && $st_board2==""){
											  echo $eachrecord1->st_borduniversity2;}else{echo $st_board2;}?>" /></td>
											 <td class="narmal"><input name="st_year2" type="text" id="st_year2" value="<?php 
											  if(isset($eachrecord1->st_year2) && $st_year2==""){
											  echo $eachrecord1->st_year2;}else{echo $st_year2;}?>"/></td>
										 </tr>
										<tr>
										  <td align="center" class="narmal"><input name="st_sno3" type="text" id="st_sno3" size="5"  value="3"/></td>
										  <td class="narmal"><input name="st_pass3" type="text" id="st_pass3" value="<?php  
										  if(isset($eachrecord1->st_examp3) && $st_pass3=="" ){
											  echo $eachrecord1->st_examp3;}else{echo $st_pass3;}?>"/></td>
											  <td class="narmal"><input name="st_marks3" type="text" id="st_marks3"  value="<?php 
											  if(isset($eachrecord1->st_marks3) && $st_marks3=="" ){
											  echo $eachrecord1->st_marks3;}else{echo $st_marks3;}?>"/></td>
									      <td class="narmal"><input name="st_board3" type="text" id="st_board3" value="<?php 
										   if(isset($eachrecord1->st_borduniversity3) && $st_board3==""){
											  echo $eachrecord1->st_borduniversity3;}else{echo $st_board3;} ?>"/></td>
										 <td class="narmal"><input name="st_year3" type="text" id="st_year3" value="<?php 
										  if(isset($eachrecord1->st_year3) && $st_year3==""){
											  echo $eachrecord1->st_year3;}else{echo $st_year3;}?>"/>										 </td>
										</tr>
                                      </table> 
							     </td>
                         </tr>
                      <tr>                        
                        <td colspan="7"  class="bgcolor_02" align="left" valign="middle" >&nbsp;&nbsp;<span class="admin" >Experience</span></td>        
                      </tr>
                      <tr height="3">                     
                        <td colspan="11" ></td>                 
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td colspan="7" align="center">
						  <table width="60%" border="1" cellspacing="0" cellpadding="0" class="tbl_grid">
                            <tr class="bgcolor_02">
                              <td width="7%" height="20" align="center"  class="admin">&nbsp;S No </td>
                              <td width="31%" align="center"  class="admin">&nbsp;&nbsp;Institution</td>
                              <td width="35%" align="center"  class="admin">&nbsp;&nbsp;&nbsp;Position</td>
                              <td width="27%" align="center"  class="admin">Period</td>
                            </tr>
                            <tr>
                              <td align="center" class="narmal"><input name="st_sno4" type="text" id="st_sno4" size="5"  value="1"/></td>
                              <td class="narmal"><input name="st_inst1" type="text" id="st_inst1"  value="<?php 
							  if(isset($eachrecord1->st_insititute1) && $st_inst1==""){
							  echo $eachrecord1->st_insititute1;}else{echo $st_inst1;}?>"/></td>
                              <td class="narmal"><input name="st_position1" type="text" id="st_position1" value="<?php 
							  if(isset($eachrecord1->st_position1) && $st_position1=="" ){
							  echo $eachrecord1->st_position1;} else{echo $st_position1;}?>" /></td>
                              <td class="narmal"><input name="st_period1" type="text" id="st_period1" value="<?php
							  if(isset($eachrecord1->st_period1) && $st_period1==""){
							   echo $eachrecord1->st_period1;}else{echo $st_period1;}?>"/></td>
                            </tr>
                            <tr>
                              <td align="center" class="narmal"><input name="st_sno5" type="text" id="st_sno5" size="5"  value="2"/></td>
                              <td class="narmal"><input name="st_inst2" type="text" id="st_inst2"  value="<?php 
							  
							  if(isset($eachrecord1->st_insititute2) && $st_inst2==""){
							  echo $eachrecord1->st_insititute2;}else{echo $st_inst2;}?>" /></td>
                              <td class="narmal"><input name="st_position2" type="text" id="st_position2"  value="<?php  
							  if(isset($eachrecord1->st_position2) && $st_position2=="" ){
							  echo $eachrecord1->st_position2;} else{echo $st_position2;}?>" /></td>
                              <td class="narmal"><input name="st_period2" type="text" id="st_period2"  value="<?php  
							  if(isset($eachrecord1->st_period2) && $st_period2==""){
							   echo $eachrecord1->st_period2;}else{echo $st_period2;}?>" /></td>
                            </tr>
                            <tr>
                              <td align="center" class="narmal"><input name="st_sno6" type="text" id="st_sno6" size="5" value="3" /></td>
                              <td class="narmal"><input name="st_inst3" type="text" id="st_inst3"  value="<?php  
							  if(isset($eachrecord1->st_insititute3) && $st_inst3==""){
							  echo $eachrecord1->st_insititute3;}else{echo $st_inst3;}?>"/></td>
                              <td class="narmal"><input name="st_position3" type="text" id="st_position3" value="<?php 
							  if(isset($eachrecord1->st_position3) && $st_position3=="" ){
							  echo $eachrecord1->st_position3;} else{echo $st_position3;}?>"/></td>
                              <td class="narmal"><input name="st_period3" type="text" id="st_period3" value="<?php  
							  if(isset($eachrecord1->st_period3) && $st_period3==""){
							   echo $eachrecord1->st_period3;}else{echo $st_period3;}?>" /></td>
                            </tr>
                        </table></td>
                      </tr>
					  <tr height="3">                     
                        <td colspan="11" ></td>            
                      </tr>
					   <tr>
                        
                        <td colspan="7"  class="bgcolor_02" align="left" valign="middle" >&nbsp;&nbsp;<span class="admin" >Present Address</span></td>                     
                       
					  </tr>
                      <tr>
                        <td valign="top"> </td>
                        <td colspan="6" valign="top" class="narmal"><table width="100%" border="0" cellspacing="3" cellpadding="0">
                            
                            <tr>
                              
                              <td width="20%" align="left" class="narmal">Address</td>
                              <td width="2%" align="left">:</td>
                              <td width="20%" align="left"><textarea name="st_address" id="st_address"><?php 
							  if(isset($eachrecord1->st_pradress) && $st_address==""){
							  echo $eachrecord1->st_pradress;}else{echo $st_address;}?></textarea></td>
                              <td width="17%" align="left">&nbsp;</td>
                              <td width="28%" align="left">&nbsp;</td>
                              <td width="9%">&nbsp;</td>
                              <td width="4%">&nbsp;</td>
                            </tr>
                            <tr>
                              
                              <td align="left" class="narmal">City</td>
                              <td align="left">:</td>
                              <td align="left"><input name="st_city" type="text" id="st_city" size="15"  value="<?php 
							  if(isset($eachrecord1->st_prcity) && $st_city==""){
							  echo $eachrecord1->st_prcity;}else{echo $st_city;}?>"/></td>
                              <td align="left" class="narmal">State:</td>
                              <td align="left"><input name="st_state" type="text" id="st_state" size="15" value="<?php 
							  if(isset($eachrecord1->st_prstate) && $st_state==""){
							  echo $eachrecord1->st_prstate;}else{echo $st_state;}?>" /></td>
                              <td class="narmal">&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td align="left">Country</td>
                              <td align="left">:</td>
                              <td align="left"><input name="st_country" type="text" id="st_country" size="15"  value="<?php
							  if(isset($eachrecord1->st_prcountry) && $st_country==""){
							   echo $eachrecord1->st_prcountry;}else{echo $st_country;}?>"/></td>
                              <td align="left">Post Code:</td>
                              <td align="left"><input name="st_pincode" type="text" id="st_pincode" size="15" value="<?php 
							  if(isset($eachrecord1->st_prpincode) && $st_pincode==""){
							   echo $eachrecord1->st_prpincode;}else{echo $st_pincode;}?>" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              
                              <td align="left" class="narmal" >Phone </td>
                              <td align="left">:</td>
                              <td align="left"><input name="st_phone" type="text" id="st_phone" size="15" value="<?php  
							  if(isset($eachrecord1->st_prphonecode) && $st_phone==""){
							  echo  $eachrecord1->st_prphonecode;}else{echo $st_phone;}?>"/></td>
                              <td align="left" class="narmal">Mobile&nbsp;:</td>
                              <td align="left"><input name="st_mobile" type="text" id="st_mobile" size="15"  value="<?php 
							  if(isset($eachrecord1->st_prmobno) && $st_mobile==""){
							  echo  $eachrecord1->st_prmobno;}else{echo $st_mobile;}?>" />
                              &nbsp;<font color="#FF0000"><b>*</b></font></td>
                              <td class="narmal">&nbsp;</td>
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
                              <td width="0%">&nbsp;</td>
                            </tr>
                        </table></td>
                      </tr>
					   <tr height="3">                     
                        <td colspan="11" ></td>            
                      </tr>
					   <tr>                        
                        <td colspan="7"  class="bgcolor_02" align="left" valign="middle" >&nbsp;&nbsp;<span class="admin" >Permanent Address</span>
						<span class="admin">             
								<input type="checkbox" name="sameaddress1" id="sameaddress1" value="0" onclick="javascript:getfieldvalues()" />Same as Above </span>
						</td>                       
					  </tr>
                      <tr>
                        <td valign="top">&nbsp;</td>
                        <td colspan="6" valign="top" class="narmal"><table width="100%" border="0" cellspacing="3" cellpadding="0">
                        <tr>
                              <td width="2%">&nbsp;</td>
                              <td width="18%" align="left" class="narmal">Address</td>
                              <td width="2%" align="left">:</td>
                              <td width="20%" align="left">							  
								<textarea name="pre_address"><?php 
								if(isset($eachrecord1->st_peadress) && $pre_address=="" ){
								echo $eachrecord1->st_peadress;}else{echo $pre_address;}?></textarea></td>							
						
                              <td width="17%" align="left">&nbsp;</td>
                              <td width="28%" align="left">&nbsp;</td>
                              <td width="4%">&nbsp;</td>
                              <td width="9%">&nbsp;</td>
                          </tr>
                            <tr>
                              <td>&nbsp;</td>
                              <td align="left" class="narmal">City </td>
                              <td align="left">:</td>
                              <td align="left"><input name="st_pecity" type="text" id="st_pecity" size="15"  value="<?php  
							  if(isset($eachrecord1->st_prcity) && $st_pecity==""){echo $eachrecord1->st_prcity;}else{echo $st_pecity ;}?>"/></td>
							  
                              <td align="left" class="narmal">State</td>
                              <td align="left"><input name="st_pestate" type="text" id="st_pestate" size="15" value="<?php  
							  if(isset($eachrecord1->st_prstate) && $st_pestate==""){echo $eachrecord1->st_prstate;}else{echo $st_pestate ;}?>" /></td>
							  
                              <td class="narmal">&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                              <td align="left">Country</td>
                              <td align="left">&nbsp;</td>
                              <td align="left"><input name="st_pecountry" type="text" id="st_pecountry" size="15" value="<?php 
							  if(isset($eachrecord1->st_prcountry) && $st_pecountry==""){ echo $eachrecord1->st_prcountry;}else{ echo $st_pecountry ;}?>" /></td>
                              <td align="left">Post Code</td>
                              <td align="left"><input name="st_pepin" type="text" id="st_pepin" size="15" value="<?php  
							  if(isset($eachrecord1->st_prpincode) && $st_pepin==""){echo $eachrecord1->st_prpincode;}else{echo $st_pepin ;}
							 ?>"/></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                              <td align="left" class="narmal">Phone </td>
                              <td align="left">:</td>
                              <td align="left">
							  <input name="st_pephone" type="text" id="st_pephone" size="15" value="<?php 
							  if(isset($eachrecord1->st_prphonecode) && $st_pephone=="" ){echo $eachrecord1->st_prphonecode;}else{echo $st_pephone ;}?>" /></td>
							  
                              <td align="left" class="narmal">Mobile&nbsp;</td>
                              <td align="left"><input name="st_pemobno" type="text" id="st_pemobno" size="15" value="<?php
							  if(isset($eachrecord1->st_prmobno) && $st_pemobno==""){echo $eachrecord1->st_prmobno;}else{echo $st_pemobno;}?>" /></td>
                              <td class="narmal">&nbsp;</td>
                              <td>&nbsp;</td>							
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                              <td align="left">&nbsp;</td>
                              <td align="left">&nbsp;</td>
                              <td align="left">&nbsp;</td>
                              <td align="left">&nbsp;</td>
                              <td align="left">&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>                           
                        </table></td>
                      </tr>
					   <tr height="3">                     
                        <td colspan="11" ></td>            
                      </tr>
					   <tr>                        
                        <td colspan="7"  class="bgcolor_02" align="left" valign="middle" >&nbsp;&nbsp;<span class="admin" >Reference</span></td>                
                       
					  </tr>
                      <tr>
                        <td valign="top">&nbsp;</td>
                        <td colspan="6" valign="top" class="narmal" align="center"><br />
						
						<table width="80%" border="1" cellspacing="0" cellpadding="0" class="tbl_grid">
                        <tr class="bgcolor_02">
                              <td width="7%" height="20" align="center"  class="admin">&nbsp;S No </td>
                              <td width="38%" align="center"  class="admin">Reference&nbsp;</td>
                              <td width="20%" align="center"  class="admin">&nbsp;&nbsp;Designation </td>
                              <td width="20%" align="center"  class="admin">&nbsp;&nbsp;Institute</td>

                              <td width="15%" align="center"  class="admin">&nbsp;E-mail </td>
                          </tr>
                            <tr>
                     <td align="center" class="narmal"><input name="st_sno7" type="text" id="st_sno7" size="5"  value="1"/></td>
                     <td align="center" class="narmal"><input name="st_refname1" type="text" id="st_refname1" size="15" value="<?php 
					 if(isset($eachrecord1->st_refposname1) && $st_refname1==""){echo $eachrecord1->st_refposname1;}else{echo $st_refname1;}?>" /></td>
                     <td align="center" class="narmal"><input name="st_desg1" type="text" id="st_desg1" size="15" value="<?php 
					 if(isset($eachrecord1->st_refdesignation1) && $st_desg1==""){echo $eachrecord1->st_refdesignation1;}else{echo $st_desg1;}?>" /></td>
                     <td align="center" class="narmal"><input name="st_inst4" type="text" id="st_inst4" size="15" value="<?php 
					 if(isset($eachrecord1->st_refinsititute1) && $st_inst4==""){ echo $eachrecord1->st_refinsititute1;}else{echo $st_inst4;}?>" /></td>
                     <td align="center" class="narmal"><input name="st_email1" type="text" id="st_email1" size="15" value="<?php 
					 if(isset($eachrecord1->st_refemail1) && $st_email1==""){echo $eachrecord1->st_refemail1;}else{echo $st_email1;}?>" /></td>
                          </tr>
                            <tr>
                         <td align="center" class="narmal"><input name="st_sno8" type="text" id="st_sno8" size="5" value="2" /></td>
                      <td align="center" class="narmal"><input name="st_refname2" type="text" id="st_refname2" size="15" value="<?php 
					  if(isset($eachrecord1->st_refposname2) && $st_refname2==""){echo $eachrecord1->st_refposname2;}else{echo $st_refname2;}?>" /></td>
                      <td align="center" class="narmal"><input name="st_desg2" type="text" id="st_desg2" size="15"  value="<?php 
					   if(isset($eachrecord1->st_refdesignation2) && $st_desg2==""){echo $eachrecord1->st_refdesignation2;}else{echo $st_desg2;}?>"/></td>
                       <td align="center" class="narmal"><input name="st_inst5" type="text" id="st_inst5" size="15" value="<?php 
					    if(isset($eachrecord1->st_refinsititute2) && $st_inst5==""){ echo $eachrecord1->st_refinsititute2;}else{echo $st_inst5;}?>" /></td>
                       <td align="center" class="narmal"><input name="st_email2" type="text" id="st_email22" size="15"  value="<?php 
					    if(isset($eachrecord1->st_refemail2) && $st_email2==""){echo $eachrecord1->st_refemail2;}else{echo $st_email2;}?>"/></td>
                          </tr>
                            <tr>
                           <td align="center" class="narmal"><input name="st_sno9" type="text" id="st_sno9" size="5"  value="3"/></td>
                       <td align="center" class="narmal"><input name="st_refname3" type="text" id="st_refname3" size="15" value="<?php 
					   if(isset($eachrecord1->st_refposname3) && $st_refname3==""){echo $eachrecord1->st_refposname3;}else{echo $st_refname3;}?>"/></td>
                       <td align="center" class="narmal"><input name="st_desg3" type="text" id="st_desg3" size="15"  value="<?php 
					    if(isset($eachrecord1->st_refdesignation3) && $st_desg3==""){echo $eachrecord1->st_refdesignation3;}else{echo $st_desg3;}?>"/></td>
                       <td align="center" class="narmal"><input name="st_inst6" type="text" id="st_inst6" size="15" value="<?php 
					    if(isset($eachrecord1->st_refinsititute3) && $st_inst6==""){ echo $eachrecord1->st_refinsititute3;}else{echo $st_inst6;}?>" /></td>
                        <td align="center" class="narmal"><input name="st_email3" type="text" id="st_email3" size="15"  value="<?php 
						if(isset($eachrecord1->st_refemail3) && $st_email3==""){echo $eachrecord1->st_refemail3;}else{echo $st_email3;}?>"/></td>
                          </tr>
                        </table></td>
                      </tr>					  
                      <tr>
                        <td valign="top">&nbsp;</td>
                        <td colspan="6" align="center" valign="top" class="narmal">
						<?php
						if($action=='applicant_enquiries')
						{
						?><?php if (in_array("9_3", $admin_permissions)) {?>
				<input name="candidateading" type="submit" class="bgcolor_02" value="Add candidate" style="cursor:pointer;"/>
                <?php }?>
							<?php
							}
							else
							{
							?>	
				<input name="candidateupdate" type="submit" class="bgcolor_02" value="update candidate" style="cursor:pointer;" />
							<?php } ?></td>
                      </tr>
                    </table>				 
					</td>
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
</form>
<?php


/**
*   ***********For Search Applicants *****************
*/

}

	if($action=='search_applicants')
	{
	?>
	<script language="javascript">
	function goto_URL(object)
	{
	
	window.location.href = object.options[object.selectedIndex].value;
	}
	</script>
	<script type="text/javascript">

					function fun()
					{ 
						 if(document.form1.txt_post.value==""){
							alert("Select Department");		
							return false;
						}
						if(document.form1.txt_deptname.value=="select"){
							alert("Select Post");		
							return false;
						}
						else
						{
						return true;
						}	   
					}
	 		</script>	
<script language = "Javascript">
		<!-- 
		/**
		 * DHTML check all/clear all links script. Courtesy of SmartWebby.com (http://www.smartwebby.com/dhtml/)
		 */
		
		var form='form1' //Give the form name here
		
		function SetChecked(val,chkName) {
		dml=document.forms[form];
		len = dml.elements.length;
		var i=0;
		for( i=0 ; i<len ; i++) {
		if (dml.elements[i].name==chkName) {
		dml.elements[i].checked=val;
		}
		}
		}
		
		function ValidateForm(dml,chkName){
		len = dml.elements.length;
		var i=0;
		for( i=0 ; i<len ; i++) {
		if ((dml.elements[i].name==chkName) && (dml.elements[i].checked==1)) return true
		}
		alert("Please select at least one record to be deleted")
		return false;
		}
		// -->

</script>
<form action="" method="post" name="form1" id="form1">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;Search Applicants</td>
              </tr>			  
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td  align="left" valign="top">
				
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				
				 <tr >
                <td height="25" colspan="3" > </td>
                </tr> 
                  <tr>
                    <td align="left" valign="top" ></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">
					
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="15%" align="left" class="narmal">Department:</td>
                        <td width="26%" align="left" class="narmal">
						<select name="txt_post" onchange="goto_URL(this.form.txt_post);" style="width:120px;">
                         <option value="?pid=23&action=search_applicants">Select </option>
                          <?php foreach($getdeptlist as $eachrecord) { ?>
                          <option value="?pid=23&amp;action=search_applicants&amp;st_department=<?php echo $eachrecord[es_departmentsid];?>"<?php echo ($eachrecord[es_departmentsid]==$st_department)?"selected":""?>><?php echo $eachrecord[es_deptname];?></option>
                          <?php } ?>
                        </select></td>
                        <td width="4%" align="left"><span class="narmal">Post:</span></td>
                                            
                        <td width="39%" align="left"><select name="txt_deptname" style="width:180px;">
                          <option value="" >Select</option>
                          <?php if(count($es_postList) > 0 ){
					   foreach ($es_postList as $eachrecord){ ?>
                          <option value="<?php echo $eachrecord->es_deptpostsId;?>" <?php echo ($eachrecord->es_deptpostsId==$txt_deptname)?"selected":""?>  ><?php echo $eachrecord->es_postname;?></option>
                          <?php    } }?>
                        </select></td>
                        <td width="16%" align="left" class="narmal"><input name="selectionserch" type="submit" class="bgcolor_02" value="Search" style="cursor:pointer;" /></td>
						
                      </tr>
					  <tr><td>&nbsp;</td></tr>
					  <tr><td>&nbsp;</td></tr>
                    </table>
				
					</td>
                  </tr>
				  <?php
				  if(isset($selectionserch)&&($selectionserch!='')||isset($emailnotification) || ($action1=='serchselect') || $action=='search_applicants')
				  {
				  		
					?>
					<tr><td>&nbsp;</td></tr>
										
					<tr><td class="narmal" align="center"><?php if($no_rows1==0) echo $nill1 ; ?></td></tr>
					<tr><td class="success_message" align="center"><?php if(isset($mesage)) echo $mesage ; ?></td></tr>
					<?php
				  if($no_rows1!=0)
				  {				  	
				  ?>
				  <tr>
                    <td height="40" align="center" valign="middle" class="narmal">Note: Select the check box to send a interview email Notification  </td>
                  </tr>
                  <!--<tr>
                    <td height="40" align="left" valign="middle" class="adminfont"><a href="javascript:SetChecked(1,'checkbox[]')" class="header_link">&nbsp;&nbsp;Check All</a>/<a href="javascript:SetChecked(0,'checkbox[]')" class="header_link">UnCheck</a> </td>
                  </tr>-->
                  <tr>
                    <td align="center" valign="top"><table width="98%" border="0" cellspacing="0" cellpadding="1" class="tbl_grid">
                      <tr class="bgcolor_02">
                        <td width="6%" class="adminfont">&nbsp;</td>
                        <td width="7%"  class="admin" align="center">S No </td>
                        <td width="14%"  class="admin" align="center">Name</td>
                        <td width="18%"  class="admin" align="center">Department<br />Post Applied</td>
                       
                        <td width="21%"  class="admin"  align="center">Primary Subject</td>
                        <td width="22%"  class="admin" align="center">Secondary Subject</td>
                        <td width="12%"  class="admin" align="center">Action</td>
                      </tr>
					  
					  <?php
					  $rownum = 1;	
				foreach ($es_candiadteList as $eachrecord1){
				$online_sql="select * from es_candidate where es_candidateid=".$eachrecord1->es_candidateId;
 $online_row=$db->getRow($online_sql);
				if($online_row['st_emailsend']!='1')
				{
				
				
				$zibracolor = ($rownum%2==0)?"even":"odd";				  
				  ?>
				  	  
                      <tr class="<?php echo $zibracolor;?>">
                        <td><span class="adminfont">
						<?php //if(($eachrecord1->staff_status=="" || $eachrecord1->staff_status=="notadded") && $eachrecord1->es_staffid < 1 ){?>
                          <input type="checkbox" name='checkbox[]' id='checkbox' checked="checked" value="<?php echo $eachrecord1->es_candidateId; ?>" />
						  <?php //}elseif($eachrecord1->staff_status=="notadded"  && $eachrecord1->es_staffid >= 1){echo "Pending";}elseif($eachrecord1->staff_status=="addedtostaff" && $eachrecord1->es_staffid >= 1){echo "Recruited";}?>
                        </span></td>
                        <td class="narmal" align="center"><?php echo $rownum ; ?></td>
                        <td class="narmal" align="center"><?php echo ucwords($eachrecord1->st_firstname.' '.$eachrecord1->st_lastname); ?></td>
                        <td class="narmal" align="center"><?php echo deptname($eachrecord1->st_department); ?><br />[<?php echo postname($eachrecord1->st_post); ?>]
						</td>
                    <td class="narmal" align="center"><?php echo subjectname($eachrecord1->st_primarysubject); ?>                         </td>
                        <td class="narmal" align="center"><?php echo $eachrecord1->st_mobilenocomunication; ?>
						</td>
                        <td class="narmal" align="center"><?php if (in_array("9_5", $admin_permissions)) {?><a href=" ?pid=23&action=editcandidate&sid=<?php echo $eachrecord1->es_candidateId;?>&st_department=<?php echo $st_department;?>&primarysub=<?php echo $txt_deptname;?>&secondrysub=<?php echo $secondrysub;?>"><img src="images/b_edit.png" width="16" height="16" hspace="2"  border="0"/></a>&nbsp;<?php }else{ echo "-"; }?><?php if (in_array("9_6", $admin_permissions)) {?><a href=" ?pid=23&action=dropcandiadte&sid=<?php echo $eachrecord1->es_candidateId;?>"onclick="return confirm('<?php echo SM_CONFIRM_DELETE_MESSAGE;?>');" ><img src="images/b_drop.png" width="16" height="16" hspace="2" border="0"/></a><?php } ?></td>
                      </tr>
                        <?php
						$rownum++;

						} ?>
						
						
						<?php
						
						
						}
						?>  
					     
                     
                    </table>
					
					</td>
                  </tr>
                  <tr>
                    <td height="40" align="center" valign="middle"><span class="narmal">
					<input type='hidden' name='st_postaplied12' value="<?php echo $st_postaplied12 ; ?>" >
					<input type='hidden' name='primarysub' value="<?php echo $primarysub ; ?>" >
					<input type='hidden' name='secondrysub' value="<?php echo $secondrysub; ?>" >
					<input type='hidden' name='rowcount' value="<?php echo $no_rows1 ; ?>" >
             <input name="emailnotification" type="submit" class="bgcolor_02" value="Email Notification" style="cursor:pointer;"/>&nbsp;&nbsp;&nbsp;
			 
			  <?php if (in_array("9_101", $admin_permissions)) {?><input name="Submit" type="button" onclick="newWindowOpen ('?pid=23&action=print_applicants<?php  echo $adminlisturl;?>');" class="bgcolor_02" value="Print" style="cursor:pointer;"/><?php }?>
             
                    </span></td>
                  </tr>
			<?php
			  }
			  }
			  ?>
			  
                </table>
                </td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
			 
			  <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
              </tr>
</table> 
</form> 
				 
		 
	 
<?php
}
?>
<script type="text/javascript">
function newWindowOpen(href)
{
    window.open(href,null, 'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');
}
</script>

<?php if($action=='print_applicants'){
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_candidate','HRD','Search Applicants','','Print','".$_SERVER['REMOTE_ADDR']."',NOW())";
     $log_insert_exe=mysql_query($log_insert_sql);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="2" class="bgcolor_02">&nbsp;Applicants List </td>
              </tr>
			  
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td  align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
				
				<tr>
				  <td colspan="8" align="center" >&nbsp;</td>
				  </tr>
                  
				 
				  <tr>
				  <td colspan="8" align="center" >&nbsp;</td>
				  </tr>
				  <tr>
				  <td colspan="8" align="center" class="narmal"><?php if($nill!="") echo $nill ; ?></td>
				  </tr>
				  
				  <?php if($no_rows1!=0){?>
                  <tr>
                    <td colspan="8" align="left" valign="top">
					<table width="98%" border="0" cellspacing="0" cellpadding="1" class="tbl_grid">
                      <tr class="bgcolor_02">
                        
                        <td width="7%"  class="admin" align="center">S No </td>
                        <td width="14%"  class="admin" align="center">Name</td>
                        <td width="18%"  class="admin" align="center">Department<br />Post Applied</td>
                       
                        <td width="21%"  class="admin"  align="center">Primary Subject</td>
                        <td width="22%"  class="admin" align="center">Secondary Subject</td>
                        
                      </tr>
					  
					  <?php
					  $rownum = 1;	
				foreach ($es_candiadteList as $eachrecord1){
				$online_sql="select * from es_candidate where es_candidateid=".$eachrecord1->es_candidateId;
 $online_row=$db->getRow($online_sql);
				if($online_row['st_emailsend']!='1')
				{
				
				
				$zibracolor = ($rownum%2==0)?"even":"odd";				  
				  ?>
				  	  
                      <tr class="<?php echo $zibracolor;?>">
                        
                        <td class="narmal" align="center"><?php echo $rownum ; ?></td>
                        <td class="narmal" align="center"><?php echo ucwords($eachrecord1->st_firstname.' '.$eachrecord1->st_lastname); ?></td>
                        <td class="narmal" align="center"><?php echo deptname($eachrecord1->st_department); ?><br />[<?php echo postname($eachrecord1->st_post); ?>]
						</td>
                    <td class="narmal" align="center"><?php echo subjectname($eachrecord1->st_primarysubject); ?>                         </td>
                        <td class="narmal" align="center"><?php echo $eachrecord1->st_mobilenocomunication; ?>
						</td>
                        
                      </tr>
                        <?php
						$rownum++;

						}}
						?>              
                     
                    </table></td>
                  </tr>
				  <?php } ?>
				  
                         
                </table></td>
                <td width="1" class="bgcolor_02"></td>
              </tr>              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
            </tr>
   </table>
<?php }?>	
			
<?php
	
/**
*   ***********For Short Listed Candidate Email Format *****************
*/
		
	if($action=='shortlistedformat')
	{
	?>
	<?php  include("includes/js/fckeditor/fckeditor.php") ;?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<form name="form1" action="" method="post">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Short Listed Candidate Email Format</strong>
				</td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td width="" align="left" valign="top"><table width="100%" border="0" cellspacing="5" cellpadding="0">
                  <tr>
                    
                    <td align="left" valign="top" class="narmal">
					                                    <?php $sBasePath = $_SERVER['PHP_SELF'] ;
															  $sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "?pid" ) ) ;
															  $sBasePath = $sBasePath."includes/js/fckeditor/";
															  $oFCKeditor = new FCKeditor('blogDesc') ;
															  $oFCKeditor->BasePath	= $sBasePath ;
															  $oFCKeditor->Height = 500;
															  $oFCKeditor->Width = 600;
															  $oFCKeditor->Value		= html_entity_decode($emailview->stl_message) ;
															  $oFCKeditor->Create() ;
														?>
					</td>
                  </tr>
                  
                  <tr>
                    
                    <td align="center" valign="top" class="narmal"><input name="updateemail" type="submit" class="bgcolor_02" value="Update Email" style="cursor:pointer;"/>
                     <input name="back" type="submit" class="bgcolor_02" value="Cancel" style="cursor:pointer;"/>    </td>
                  </tr>
                  
                </table></td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
              </tr>
  </form>
 </table>			
<?php
}
?>		
<?PHP

/**
*   ***********For Short Listed Candidate Email Format View*****************
*/
	

if($action=='shortlistedformatview'|| $action=='letter_formats')
{
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Short Listed Candidate Email Format</strong></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="left" valign="top">&nbsp;</td>
                  </tr>
                      <tr>
                    <td align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                      <tr class="bgcolor_02">
                        <td width="4%" class="admin" align="center">S.No</td>
                        <td width="10%" class="admin" align="center">Mail Format</td>
						 <td width="10%" class="admin" align="center">Edit Format</td>
                      </tr>
				 <?php
					  $rownum = 1;	
				foreach ($emailview as $emailview1){
				$zibracolor = ($rownum%2==0)?"even":"odd";	
				$message=$emailview1->stl_message ;			  
				  ?>
                      <tr class="<?php echo $zibracolor; ?>">
                        <td align="center"><?php echo $rownum ; ?></td>
                        <td align="center"><?php echo substr(strip_tags($message),0,40)."..." ;?> </td>
					    <td align="center"><?php if (in_array("9_11", $admin_permissions)) {?><a href=" ?pid=23&action=shortlistedformat&sid=<?php echo $emailview1->es_shortlistedId; ?>"><img src="images/b_edit.png"width="16" height="16" hspace="2"  border="0" /></a><?php }else{ echo "-"; }?></td>
                      </tr>
                     <?php
					$rownum++;  }
					  ?>
                    </table></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">&nbsp;</td>
                  </tr>
                </table></td>
                <td width="1" class="bgcolor_02"></td>
            </tr>              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02">
				</td>
  </tr>
 </table>
<?php }?>

<?php
/**
*   ***********For Offerletter View *****************
*/
	

if($action=='offerletterview' || $action=='letter_formats')
{
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Offer Letter Format</strong>
				</td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td  align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="left" valign="top">&nbsp;</td>
                  </tr>
                      <tr>
                    <td align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                      <tr class="bgcolor_02">
                        <td width="4%" class="admin" align="center">S.No</td>
                        <td width="10%" class="admin" align="center">Offer Format</td>
						 <td width="10%" class="admin" align="center">Edit Format</td>
                      </tr>
				<?php
					  $rownum = 1;	
				foreach($offerview as $offerview1){
				$zibracolor = ($rownum%2==0)?"even":"odd";	
				$message=$offerview1->ofr_message;			  
				  ?>
                      <tr class="<?php echo $zibracolor; ?>">
                        <td align="center"><?php echo $rownum ; ?></td>
                        <td align="center"><?php echo substr(strip_tags($message),0,20)."..."; ?> </td>
					    <td align="center"><?php if (in_array("9_11", $admin_permissions)) {?>
<a href=" ?pid=23&action=offerletter&sid=<?php echo $offerview1->es_offerletterId; ?>"><img src="images/b_edit.png"width="16" height="16" hspace="2"  border="0" /></a><?php }else{ echo "-"; }?></td>
                      </tr>
                     <?php
					$rownum++;  }
					  ?>
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
</form>
<?php
}
?>

<?php

/**
*   ***********For Offerletter Generation *****************
*/
	
		if($action=='offerlettergenration')
		{
		?>
		<script type="text/javascript">
function popup_letter(url) {
		 var width  = 800;
		 var height = 600;
		 var left   = (screen.width  - width)/2;
		 var top    = (screen.height - height)/2;
		 var params = 'width='+width+', height='+height;
		 params += ', top='+top+', left='+left;
		 params += ', directories=no';
		 params += ', location=no';
		 params += ', menubar=no';
		 params += ', resizable=no';
		 params += ', scrollbars=yes';
		 params += ', status=no';
		 params += ', toolbar=no';
		 newwin=window.open(url,'windowname5', params);
		 if (window.focus) {
			 newwin.focus()
		 }
	 return false;
}
</script><script language = "Javascript">
		<!-- 
			
		var form='form1' //Give the form name here
		
		function SetChecked(val,chkName) {
		
		dml=document.form[form];
		len = dml.elements.length;
		var i=0;
		for( i=0 ; i<len ; i++) {
		if (dml.elements[i].name==chkName) {
		dml.elements[i].checked=val;
		}
		}
		}
		
		function ValidateForm(dml,chkName){
		len = dml.elements.length;
		var i=0;
		for( i=0 ; i<len ; i++) {
		if ((dml.elements[i].name==chkName) && (dml.elements[i].checked==1)) return true
		}
		alert("Please select at least one record to be deleted")
		return false;
		}
		// -->

</script>	

		<?php /*?><script language="javascript">
		function goto_URL(object)
		{
		
		window.location.href = object.options[object.selectedIndex].value;
		}
		</script><?php */?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02" align="left">&nbsp;Generate Offer Letter</td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"> </td>
                <td align="left" valign="top">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td colspan="3" align="left" valign="top">&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="3" align="left" valign="top">
									<table width="95%" border="0" cellspacing="0" cellpadding="0">
										<form action="" method="post" name="form">
                      <tr>
					     <td width="18%" align="right" class="narmal">Department:</td>
				        <td width="13%" class="narmal"><select name="txt_deptname"onchange="goto_URL(this.form.txt_deptname);" style="width:120px;">
                          <option value="?pid=23&amp;action=offerlettergenration">-Select-</option>
                          <?php foreach($getdeptlist as $eachrecord) { ?>
                          <option value="?pid=23&amp;action=offerlettergenration&amp;st_department=<?php echo $eachrecord[es_departmentsid];?>"<?php echo ($eachrecord[es_departmentsid]==$st_department)?"selected":""?>><?php echo $eachrecord[es_deptname];?></option>
                          <?php } ?>
                        </select></td>
                        <td width="3%"><span class="narmal">Post:</span></td>
                                            
                        <td width="9%"><select name="txt_post" style="width:120px;">
                          <option value="" >Select</option>
                          <?php if(count($es_postList) > 0 ){
					   foreach ($es_postList as $eachrecord){ ?>
                          <option value="<?php echo $eachrecord->es_deptpostsId;?>" <?php echo ($eachrecord->es_deptpostsId==$txt_post)?"selected":""?>  ><?php echo $eachrecord->es_postname;?></option>
                          <?php    } }?>
                        </select></td>
                        <td width="7%"><span class="narmal">Employee&nbsp;Id:&nbsp;</span></td>
                        <td width="25%"><input type="text" name="candidatename" id="candidatename" size="4" value="<?php if(isset($candidatename) && $candidatename!='') echo $candidatename;?>" /></td>
                        <td width="25%" class="narmal">
						
						<input name="serchofferletter" type="submit" class="bgcolor_02" value="Search" style="cursor:pointer;"/>
						</td>
                      </tr>
					  <tr>
                    <td align="left" valign="top">&nbsp;</td>
                  </tr>
					  </form>
                    </table>
					
					</td>
                  </tr>
				  <?php
				  if(isset($serchofferletter))
				  {?>
				   <form action="<?php echo buildurl(array('pid'=>23,'action'=>'printing'));?>" method="post" name="">
				  <?php
				  if($no_rows2!=0)
				  {				  
				  ?>
				 
                  <tr>
                    <td height="40" align="left" valign="middle" class="adminfont" colspan="3"  style="padding-left:20px;"><input type="checkbox" name="checkall"  onclick="SelectChkbox();"  id="checkall"/></td>
                  </tr>
                  <tr>
                    <td colspan="3" align="left" valign="top"><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" class="tbl_grid">
                      <tr class="bgcolor_02">
                        <td width="7%" align="left" class="admin">&nbsp;</td>
                        <td width="9%" align="left" class="admin">S No</td>
                        <td width="22%" height="25" align="left" class="admin">Candidate&nbsp;Name</td>                       
                        <td width="24%" align="left" class="admin">Post</td>
                        <td width="19%" align="left" class="admin">Status</td>
                        <td width="19%" align="left" class="admin">Action</td>
                        <!--<td width="17%" class="admin"><strong> &nbsp;Remarks</strong></td>-->
                      </tr>
					  <?php
					   $rownum = 1;	
				foreach ($es_staffingList as $eachrecord2){
				$zibracolor = ($rownum%2==0)?"even":"odd";	
					  ?>
					  
                      <tr class="<?php echo $zibracolor;?>">
                        <td align="left"><input type="checkbox" name='checkbox[]' id='chk_box[<?php echo $rownum;?>]' value="<?php echo $eachrecord2->es_staffId; ?>" /></td>
                        <td height="25" align="left" class="narmal"><?php echo  $rownum ; ?></td>
                        <td align="left" class="narmal"><?php echo ucwords($eachrecord2->st_firstname.' '.$eachrecord2->st_lastname); ?></td>
                        <td align="left" class="narmal"><?php echo postname($eachrecord2->st_post); ?></td>
                        <td align="left" class="narmal"><?php
						$online_sql="select * from es_staff where es_staffid=".$eachrecord2->es_staffId;
 $online_row=$db->getRow($online_sql);
						
						if($online_row['st_emailsend']!='1'){echo "Letter Not Sent"; }	else {echo " Offer Letter Sent"; }
						
						?></td>
                        <td align="left" class="narmal">
  <a href="javascript: void(0)" onclick="popup_letter('?pid=23&action=printofferletter&st_department=<?php echo $st_department; ?>&sid=<?php echo $eachrecord2->es_staffId; ?>')" title="Print Offer Letter">
<a href="javascript: void(0)" onclick="popup_letter('?pid=23&action=printofferletter&st_department= <?php echo $st_department; ?>&sid=<?php echo $eachrecord2->es_staffId; ?>')" title="Print Offer Letter"><img src="images/print_16.png" border="0" /></a></td>
                      </tr>
					  <?php
					  $rownum ++ ;}
					  ?>
                    </table></td>
                  </tr>
                  <tr>
                    <td width="35%" height="25" align="right" valign="top" class="narmal">
					<input type="hidden" name="st_department" value="<?php echo $st_department; ?>" />
					
					<input type="hidden" name="count" value="<?php echo $no_rows2; ?> " />
                    </td>
                    <td width="18%" align="right" valign="top"><span class="narmal">
                     
                      <?php if (in_array("9_23", $admin_permissions)) {?>
  <input name="smail" type="submit" class="bgcolor_02" value="Send mail"  style="cursor:pointer;"/><?php }else{ echo "-"; }?>
                      
                    </span></td>
                    <td width="47%" align="left" valign="top">
                   <?php /*?>  <?php if (in_array("9_24", $admin_permissions)) {?>
 <input name="accepcted" type="submit" class="bgcolor_02" value="Accepted" style="cursor:pointer;"/><?php }else{ echo "-"; }?>
                    </span><span class="narmal">
                      <?php if (in_array("9_25", $admin_permissions)) {?>
<input name="notaccepcted" type="submit" class="bgcolor_02" value="Not Accepted" style="cursor:pointer;"/><?php }else{ echo "-"; }?>
                    </span><?php */?>
					<span class="narmal">
                      <?php if (in_array("9_33", $admin_permissions)) {?>
					<input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=23&action=print_list_offerletter&serchofferletter=Search&st_department=<?php echo $st_department; ?>&txt_post=<?php echo $txt_post;?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /><?php }?></span>
					</td>
					
                  </tr>
				  </form>
 <?php
				   
  }
  }
  ?>

   </table></td>
                <td width="1"  class="bgcolor_02"></td>
              </tr>			 
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
              </tr>
			  
 </table>
				
			
<?php
}
?>

<?php  if($action=="print_list_offerletter"){
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_staff','HRD','Generate Offer Letter','','Print','".$_SERVER['REMOTE_ADDR']."',NOW())";
     $log_insert_exe=mysql_query($log_insert_sql);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">

				 
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>	
               <tr>
                <td height="5" colspan="3"  ></td>
              </tr>			  
               <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Applicants List</span></td>
              </tr>	
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="center" valign="top"><br />
				
				<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" class="tbl_grid">
                      <tr class="bgcolor_02">
                        
                        <td width="9%" align="left" class="admin">S No</td>
                        <td width="22%" height="25" align="left" class="admin">Candidate&nbsp;Name</td>                       
                        <td width="24%" align="left" class="admin">Post</td>
                        <td width="19%" align="left" class="admin">Status</td>
                        
                      </tr>
					  <?php
					   $rownum = 1;	
				foreach ($es_staffingList as $eachrecord2){
				$zibracolor = ($rownum%2==0)?"even":"odd";	
					  ?>
					  
                      <tr class="<?php echo $zibracolor;?>">
                        <td height="25" align="left" class="narmal"><?php echo  $rownum ; ?></td>
                        <td align="left" class="narmal"><?php echo ucwords($eachrecord2->st_firstname.' '.$eachrecord2->st_lastname); ?></td>
                        <td align="left" class="narmal"><?php echo postname($eachrecord2->st_post); ?></td>
                        <td align="left" class="narmal"><?php
						$online_sql="select * from es_staff where es_staffid=".$eachrecord2->es_staffId;
 $online_row=$db->getRow($online_sql);
						
						if($online_row['st_emailsend']!='1'){echo "Letter Not Sent"; }	else {echo "Letter Sent"; }
						
						?></td>
                        
                      </tr>
					  <?php
					  $rownum ++ ;}
					  ?>
                    </table>
                
				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
             
               
              
              
  		     <tr><td colspan="3" class="bgcolor_02" height="1"></td></tr>
			  
			  
   
</table>

<?php } ?>

<?php

/**
*   ***********For T.C Generation *****************
*/
	

if($action=='tcgenaration')
{
?>
<?php  include("includes/js/fckeditor/fckeditor.php") ;?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<form action="" method="post">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<strong>Termination  Format</strong>
				</td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>

                <td  align="left" valign="top">
				<table width="100%" border="0" cellspacing="5" cellpadding="0">
				
                  <tr>
                    
                    <td align="center" valign="top" class="narmal">
					                                    <?php $sBasePath = $_SERVER['PHP_SELF'] ;
															  $sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "?pid" ) ) ;
															  $sBasePath = $sBasePath."includes/js/fckeditor/";
															  $oFCKeditor = new FCKeditor('blogDesc') ;
															  $oFCKeditor->BasePath	= $sBasePath ;
															  $oFCKeditor->Height = 300;
															  $oFCKeditor->Width = 600;
															  $oFCKeditor->Value		= html_entity_decode($es_tcmaster->tcm_description) ;
															  $oFCKeditor->Create() ;
														?>
					</td>
                  </tr>
                  
                  <tr>
                   
                    <td align="center" valign="top" class="narmal"><input name="tcupdate" type="submit" class="bgcolor_02" value="update Termination" style="cursor:pointer;"/>
                    <input name="back" type="submit" class="bgcolor_02" value="Cancel" style="cursor:pointer;"/>
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
<?php
}
?>

<?php
/**
*   ***********For T.C View *****************
*/
	

if($action=='tcview' || $action=='letter_formats')
{
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Termination Format</strong>
				</td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td  align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="left" valign="top">&nbsp;</td>
                  </tr>
				  	<tr>
				  <td>&nbsp;</td>
				  </tr>
                      <tr>
                    <td align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                      <tr class="bgcolor_02">
                        <td width="4%" class="admin" align="center">S.No</td>
                        <td width="10%" class="admin" align="center">Termination Format</td>
						 <td width="10%" class="admin" align="center">Edit Format</td>
                      </tr>
				 <?php
					  $rownum = 1;	
				foreach($tcview as $tcviewr){
				$zibracolor = ($rownum%2==0)?"even":"odd";	
				$message=$tcviewr->tcm_description;			  
				  ?>
                      <tr class="<?php echo $zibracolor; ?>">
                        <td align="center"><?php echo $rownum ; ?></td>
                        <td align="center"><?php echo substr(strip_tags($message),0,20)."..."; ?> </td>
					    <td align="center"><?php if (in_array("9_11", $admin_permissions)) {?>


<a href=" ?pid=23&action=tcgenaration&sid=<?php echo $rownum ; ?>"><img src="images/b_edit.png"width="16" height="16" hspace="2"  border="0" /></a>



<?php }else{ echo "-"; }?></td>
                      </tr>
                     <?php
					$rownum++;  }
					  ?>
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
</form>
<?php
}
?>

<?php
/**
*   *********** T.C  Format for Student *****************
*/
	
if($action=='tcgenarationforstudent')
{
?>
<?php  include("includes/js/fckeditor/fckeditor.php") ;?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<form action="" method="post">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<strong>Tc Format</strong></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td  align="left" valign="top"><table width="100%" border="0" cellspacing="5" cellpadding="0">
				
                  <tr>
                    
                    <td align="center" valign="top" class="narmal">
					                                    <?php $sBasePath = $_SERVER['PHP_SELF'] ;
															  $sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "?pid" ) ) ;
															  $sBasePath = $sBasePath."includes/js/fckeditor/";
															  $oFCKeditor = new FCKeditor('blogDesc') ;
															  $oFCKeditor->BasePath	= $sBasePath ;
															  $oFCKeditor->Height = 500;
															  $oFCKeditor->Width = 600;
															  $oFCKeditor->Value		= html_entity_decode($es_tcstudent->tcm_description) ;
															  $oFCKeditor->Create() ;
														?>
					</td>
                  </tr>
                  
                  <tr>
                   
                    <td align="center" valign="top" class="narmal">
					  <input name="tcupdatestudent" type="submit" class="bgcolor_02" value="Update Tc" style="cursor:pointer;"/>
                      <input name="back" type="submit" class="bgcolor_02" value="Cancel" style="cursor:pointer;"/>                  </td>
                  </tr>
                  
                </table></td>
                <td width="1" class="bgcolor_02"></td>

              </tr>
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
              </tr>
  </form>
 </table>
<?php
}
?>

<?php
/**
*   *********** T.C View for Student *****************
*/
	
/*if($action=='tcviewstudent' || $action=='letter_formats')
{
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Tc Format</strong></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td  align="left" valign="top">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="left" valign="top">&nbsp;</td>
                  </tr>
				  <tr>
				  <td>&nbsp;</td>
				  </tr>
                      <tr>
                    <td align="left" valign="top">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                      <tr class="bgcolor_02">
                        <td width="4%" class="admin" align="center">S.No</td>
                        <td width="10%" class="admin" align="center">TC Format</td>
						 <td width="10%" class="admin" align="center">Edit Format</td>
                      </tr>
				  <?php
				$rownum = 1;	
				foreach($tcviews as $tcviews1){
				$zibracolor = ($rownum%2==0)?"even":"odd";	
				$message=$tcviews1->tcm_description;			  
				  ?>
                      <tr class="<?php echo $zibracolor; ?>">
                        <td align="center"><?php echo $rownum ; ?></td>
                        <td align="center"><?php echo substr(strip_tags($message),0,20)."...";?></td>
					    <td align="center"><?php if (in_array("9_11", $admin_permissions)) {?>


<a href=" ?pid=23&action=tcgenarationforstudent&sid=<?php echo $tcviews1->es_tcstudentId; ?>"><img src="images/b_edit.png"width="16" height="16" hspace="2"  border="0" /></a>



<?php }else{ echo "-"; }?>
						</td>
                      </tr>
                     <?php
					$rownum++;  }
					  ?>
                    </table></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">&nbsp;</td>
                  </tr>
                </table>
                </td>
                <td width="1" class="bgcolor_02"></td>
              </tr>              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
  				</tr>
 </table>
</form>
<?php
}*/
?>

<?php
/**
*   *********** Print Offer Letter *****************
*/
	
if ($action == 'printofferletter'){
echo $print_message;
}
?>





<?php

/**
*   *********** Issuing T.C to Staff *****************
*/
		
	if($action=='issuetcstaff'){
	
	?>
    <script type="text/javascript">
function popup_letter(url) {
		 var width  = 700;
		 var height = 500;
		 var left   = (screen.width  - width)/2;
		 var top    = (screen.height - height)/2;
		 var params = 'width='+width+', height='+height;
		 params += ', top='+top+', left='+left;
		 params += ', directories=no';
		 params += ', location=no';
		 params += ', menubar=no';
		 params += ', resizable=no';
		 params += ', scrollbars=yes';
		 params += ', status=no';
		 params += ', toolbar=no';
		 newwin=window.open(url,'windowname5', params);
		 if (window.focus) {
			 newwin.focus()
		 }
	 return false;
}

              </script>
	<script language="javascript">
	function goto_URL(object)
	{
	window.location.href = object.options[object.selectedIndex].value;
	}
	</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;<span id="internal-source-marker_0.435698680255756">Resignation / Termination</span></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top">
				
				
				<table width="100%" border="0" cellspacing="4" cellpadding="0">
                  <tr>
                    <td align="left" valign="top" height="25"><b>NOTE:</b> When you click on print button a auto generated email will sent to staff with termination letter format</td>
                  </tr>
				  <form action="" method="post" name="form" >
                  <tr>
                    <td align="left" valign="top">
					
					<table width="95%" border="0" cellspacing="0" cellpadding="0">
												
                      <tr>
					     <td width="18%" align="right" class="narmal">Department:</td>
				        <td width="13%" class="narmal"><select name="txt_deptname"onchange="goto_URL(this.form.txt_deptname);" style="width:120px;" >
                          <option value="?pid=23&action=issuetcstaff">-Select-</option>
						 
                          <?php foreach($getdeptlist as $eachrecord) { ?>
                          <option value="?pid=23&amp;action=issuetcstaff&amp;st_department=<?php echo $eachrecord[es_departmentsid];?>"<?php echo ($eachrecord[es_departmentsid]==$st_department)?"selected":""?>><?php echo $eachrecord[es_deptname];?></option>
                          <?php } ?>
                        </select></td>
                        <td width="3%"><span class="narmal">&nbsp;&nbsp;Post:</span> </td>
                                            
                        <td width="9%"><select name="txt_post" style="width:120px;">
                          <option value="" >Select</option>
                          <?php if(count($es_postList) > 0 ){
					   foreach ($es_postList as $eachrecord){ ?>
                          <option value="<?php echo $eachrecord->es_deptpostsId;?>" <?php echo ($eachrecord->es_deptpostsId==$txt_post)?"selected":""?>  ><?php echo $eachrecord->es_postname;?></option>
                          <?php    } }?>
                        </select></td>
                        <td width="7%"><span class="narmal">&nbsp;&nbsp;Employee&nbsp;Id:&nbsp;</span></td>
                        <td width="25%"><input type="text" name="candidatename" id="candidatename" size="4" value="<?php if(isset($candidatename) && $candidatename!='') echo $candidatename;?>" /></td>
                        <td width="25%" class="narmal">
						
						<input name="serchtcstaff" type="submit" class="bgcolor_02" value="Search" style="cursor:pointer;"/>             </td>
                      </tr>
					  <tr>
                    <td align="left" valign="top">&nbsp;</td>
                  </tr>					 
                    </table>
				</td>
			   </tr>
			  	</form>
				  <?php
				if(isset($serchtcstaff)){
				
				  if($no_rows3=='0')
				  {
				  ?>
				  <tr><td class="narmal" align="center"><?php echo $nill1; ?></td></tr>
				  <?php
				  }
				  
				if($no_rows3!=0)
				  {				  
				  ?>
				
				<form action="" method="post" name="tcform">
                  
				    <tr>
                    <td align="left" valign="top">
					<table width="100%" border="0" cellspacing="0" cellpadding="1" class="tbl_grid">
                      <tr>
                       
                        <td width="5%" class="bgcolor_02" align="center"><strong>&nbsp;&nbsp;S No </strong></td>
                        <td width="9%" align="center" class="bgcolor_02"><strong>Emp Id </strong></td>
                        <td width="25%" align="center" class="bgcolor_02"><strong> Name </strong></td>
						 <td width="26%" align="center" class="bgcolor_02"><strong> Department<br />
					    [Post] </strong></td>
                        <td width="14%" align="center" class="bgcolor_02"><strong> &nbsp;Date of joining </strong></td>
                        <td width="8%" align="center" class="bgcolor_02"><strong> &nbsp;Status</strong></td>
						<td width="13%" align="center" class="bgcolor_02"><strong>&nbsp;Action</strong></td>
                      </tr>
				 <?php
					   $rownum = $start+1;	
					   if (is_array($es_staffingtcList)){
					   
							foreach ($es_staffingtcList as $eachrecord3){
							$zibracolor = ($rownum%2==0)?"even":"odd";	
				  ?>
                      <tr>
                     
                        <td class="narmal" align="center"><?php echo  $rownum ; ?></td>
                        <td align="center" class="narmal"><?php echo $eachrecord3->es_staffId; ?></td>
                        <td class="narmal"><?php echo ucwords($eachrecord3->st_firstname.' '.$eachrecord3->st_lastname); ?></td>
                       <td align="center" class="narmal"><?php echo deptname($eachrecord3->st_department);  ?><br />[<?php echo postname($eachrecord3->st_post);?>]</td>
                        <td align="center" class="narmal"><?php echo formatDBDateTOCalender($eachrecord3->st_dateofjoining); ?></td>
                        <td align="center" class="narmal"><?php if($eachrecord3->tcstatus=='issued'){echo "Terminated"; }elseif($eachrecord3->tcstatus=='resigned'){echo "Resigned"; } else {echo "---";} ?></td>
					    <td align="center" class="narmal">
						 <table width="100%">
                        <tr><td><?php
						if($eachrecord3->tcstatus=='notissued' )
						{
						 if(in_array('9_13',$admin_permissions)){?>
						  
			   <script type="text/javascript">
function popup_letter(url) {
		 var width  = 700;
		 var height = 500;
		 var left   = (screen.width  - width)/2;
		 var top    = (screen.height - height)/2;
		 var params = 'width='+width+', height='+height;
		 params += ', top='+top+', left='+left;
		 params += ', directories=no';
		 params += ', location=no';
		 params += ', menubar=no';
		 params += ', resizable=no';
		 params += ', scrollbars=yes';
		 params += ', status=no';
		 params += ', toolbar=no';
		 newwin=window.open(url,'windowname5', params);
		 if (window.focus) {
			 newwin.focus()
		 }
	 return false;
}

              </script>

						  <a href="javascript: void(0)" onclick="popup_letter('?pid=23&action=printtctostaff&sid=<?php echo $eachrecord3->es_staffId; ?>')">
						 
						 <img src="images/terminate.jpg" src="images/terminate.jpg" border="0" /><?php }} else { echo "---"; }?></a></td></tr>
                        
                           <tr><td> <?php
						if($eachrecord3->tcstatus=='notissued' )
						{
						 if(in_array('9_13',$admin_permissions)){?>
                     <a href="?pid=23&action=resigned&sid=<?php echo $eachrecord3->es_staffId; ?>"> <img src="images/resigned.jpg" border="0" /></a><?php }}?><br /></td></tr>
                           <tr>
                           
           
                           
                             <td><a href="javascript: void(0)" onclick="popup_letter('index.php?pid=23&action=expe&sid=<?php echo $eachrecord3->es_staffId; ?>')"><img src="images/ec.jpg" border="0"   /></a></td>
                           </tr>
                        </table>
						
						</td>
                      </tr>
						 <?php
						   $rownum++;}
						 ?>
						 <tr>
					<td height="26" align="center" valign="middle" colspan="7"><?php paginateexte($start, $q_limit, $no_rows3, "&action=issuetcstaff".$PageUrl);?></td>
				</tr>
				<tr>
					<td height="26" align="right" valign="middle" colspan="7"><?php if(in_array('9_27',$admin_permissions)){?><input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=23&action=print_list_staff_terminated&serchtcstaff=Search&start=<?php echo $start; ?>&st_department=<?php echo $st_department; ?>&candidatename=<?php echo $candidatename; ?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /><?php }?></td>
				</tr>
                    
                    </table></td>
                  </tr>
                  <tr>
                    <td height="25" align="center" valign="top">&nbsp;</td>
                  </tr>
				  </form>
					<?php
					}
					}
					}else{
					 echo '';
					}
					?>
                </table></td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
              <tr>
			  
                <td height="1" colspan="3" class="bgcolor_02"></td>
              </tr>
   </table>
		<script language = "Javascript">
						
			var form='tcform' //Give the form name here
			
			function SetChecked(val,chkName) {
			dml=document.forms[form];
			len = dml.elements.length;
			var i=0;
			for( i=0 ; i<len ; i++) {
			if (dml.elements[i].name==chkName) {
			dml.elements[i].checked=val;
			}
			}
			}
			
			function ValidateForm(dml,chkName){
			len = dml.elements.length;
			var i=0;
			for( i=0 ; i<len ; i++) {
			if ((dml.elements[i].name==chkName) && (dml.elements[i].checked==1)) return true
			}
			alert("Please select at least one record to be deleted")
			return false;
			}		
			
		</script>			
<?php			
}
?>

<?php  if($action=="print_list_staff_terminated"){
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_staff','HRD','Staff Termination','','Print','".$_SERVER['REMOTE_ADDR']."',NOW())";
     $log_insert_exe=mysql_query($log_insert_sql);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">

				 
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>	
               <tr>
                <td height="5" colspan="3"  ></td>
              </tr>			  
               <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Termination Letter Status of Staff</span></td>
              </tr>	
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="center" valign="top"><br />
				
				<table width="100%" border="0" cellspacing="0" cellpadding="1" class="tbl_grid">
                      <tr>
                       
                        <td width="5%" class="bgcolor_02" align="center"><strong>&nbsp;&nbsp;S No </strong></td>
                        <td width="9%" align="center" class="bgcolor_02"><strong>Emp Id </strong></td>
                        <td width="25%" align="center" class="bgcolor_02"><strong> Name </strong></td>
						 <td width="26%" align="center" class="bgcolor_02"><strong> Department<br />
					    [Post] </strong></td>
                        <td width="14%" align="center" class="bgcolor_02"><strong> &nbsp;Date of joining </strong></td>
                        <td width="11%" align="center" class="bgcolor_02"><strong> &nbsp;Status</strong></td>
						
                      </tr>
				 <?php
					   $rownum = $start+1;	
					   if (is_array($es_staffingtcList)){
					   
							foreach ($es_staffingtcList as $eachrecord3){
							$zibracolor = ($rownum%2==0)?"even":"odd";	
							if($eachrecord3->st_department==$_GET['st_department']|| $eachrecord3->es_staffId==$_GET['candidatename']){
							
					
				  ?>
                      <tr>
                     
                        <td class="narmal" align="center"><?php echo  $rownum ; ?></td>
                        <td align="center" class="narmal"><?php echo $eachrecord3->es_staffId; ?></td>
                        <td class="narmal"><?php echo ucwords($eachrecord3->st_firstname.' '.$eachrecord3->st_lastname); ?></td>
                       <td align="center" class="narmal"><?php echo deptname($eachrecord3->st_department);  ?><br />[<?php echo postname($eachrecord3->st_post);?>]</td>
                        <td align="center" class="narmal"><?php echo formatDBDateTOCalender($eachrecord3->st_dateofjoining); ?></td>
                        <td align="center" class="narmal"><?php if($eachrecord3->tcstatus=='issued'){echo "Terminated"; }elseif($eachrecord3->tcstatus=='resigned'){echo "Resigned"; } else {echo "---";} ?></td>
					    </tr>
						 <?php
						   $rownum++;}}}
						 ?>
						 </table>
                
				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
             
               
              
              
  		     <tr><td colspan="3" class="bgcolor_02" height="1"></td></tr>
			  
			  
   
</table>

<?php } ?>

<?php

/**
*   *********** Issuing T.C to Student *****************
*/
	
if($action=='issuetcforstudent')
{
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;<span id="internal-source-marker_0.052443267584382114">Student Transfer</span></td>
  </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="4" cellpadding="0">
                  <tr>
                    <td align="left" valign="top">&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">
					<form action="" method="post">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="17%" class="narmal"><div align="right">Class&nbsp;:</div></td>
                        <td width="28%" class="narmal"><select name="cl_class" id="cl_class" style="width:130px;">
                            <option value="" >All</option>
						<?php 

							if (count($allClasses)>0){
								foreach($allClasses as $eachClass){
						?>
<option value="<?php echo $eachClass['es_classesid']; ?>"<?php echo ($eachClass['es_classesid']==$cl_class)?"selected":""?>><?php echo $eachClass['es_classname']; ?></option>
<?php
		}
	}
?> </select>
              </td>                   
                      
                        <td width="55%" class="narmal"><input name="tcstudent" type="submit" class="bgcolor_02" value="Search" style="cursor:pointer;"/> </td>
                      </tr>
                    </table>
					</form>
					</td>
                  </tr>
				   <?php
				  if(isset($tcstudent))
				  {
				  ?>
				  <form action="" method="post" name="tcform1">				  
				  
				   <tr>
                        <td  align="center" class="narmal"><?php if($no_rows11==0) echo $nill1; ?> </td>
                  </tr>
				  <?php
				  if($no_rows11!=0)
				  {
				  ?>
				        <tr>
                        <td height="40" align="left" valign="middle" class="adminfont">&nbsp;</td>
                  </tr>
				  <?php }
				  ?>
				 
                  <tr>
                    <td align="left" valign="top"><table width="100%" align="center" cellpadding="0" cellspacing="0" class="tbl_grid">
					 <?php
				  if($no_rows11!=0)
				  {
				  ?>	
                  
               <?php /*?>      <tr>
                        <td colspan="6" ><strong>&nbsp;</strong></td>
                        <td width="13%"><strong>&nbsp;&nbsp;<span class="style2"></span></strong></td>
                      </tr>
                  			      
                      <tr>
                        <td colspan="6" ><strong>&nbsp;</strong></td>
                        <td width="13%"><strong>&nbsp;&nbsp;<a href="?pid=98&action=add" class="bgcolor_02" style="padding:5px; text-decoration:none;">Add New</a><span class="style2"></span></strong></td>
                      </tr>
                      
                        <tr>
                        <td colspan="6" ><strong>&nbsp;</strong></td>
                        <td width="13%"><strong>&nbsp;&nbsp;<span class="style2"></span></strong></td>
                      </tr><?php */?>

                      
                      
                      <tr>
                        <td width="9%" align="center" valign="middle" height="30" class="bgcolor_02"><strong>S No</strong></td>
                        <td width="10%" align="center" valign="middle" class="bgcolor_02"><strong><span class="bgcolor_02">Reg #</span></strong></td>
						<td width="14%" align="left" valign="middle" class="bgcolor_02"><strong>&nbsp;<span class="bgcolor_02">Class</span></strong></td>
                        <td width="22%" align="left" valign="middle" class="bgcolor_02"><strong>&nbsp;Name</strong></td>
                        <td width="19%" align="left" valign="middle" class="bgcolor_02"><strong>&nbsp;Fathers Name<span class="style2"></span></strong></td>
                        <td width="11%" align="center" valign="middle" class="bgcolor_02"><strong>Status<span class="style2"></span></strong></td>
						<td width="15%" align="center" valign="middle" class="bgcolor_02"><strong>Action<span class="style2"></span></strong></td>
                      </tr>
						 <?php
						  $rownum = 1;	
						   foreach ($es_studentList as $eachrecord){
						   $zibracolor = ($rownum%2==0)?"even":"odd";
						   ?>
                      <tr class="<?php echo $zibracolor;?>">
                        
                        <td align="center" valign="middle" class="narmal"><?php echo $rownum; ?></td>
                        <td align="center" valign="middle" class="narmal"><?php echo $eachrecord['es_preadmissionid'] ; ?></td>
					    <td align="left" valign="middle" class="narmal"><?php echo classname($eachrecord['pre_class']) ; ?></td>
                        <td align="left" valign="middle" class="narmal"><?php echo $eachrecord['pre_name']; ?></td>
                        <td align="left" valign="middle" class="narmal"><?php echo $eachrecord['pre_fathername']; ?></td>
						
						<?php   $query="SELECT status FROM es_transferstudent WHERE sno = ".$eachrecord['es_preadmissionid'];
								$res=mysql_query($query);
								$row=mysql_fetch_array($res);
							?>
                        <td align="center" valign="middle" class="narmal"><?php if ($row['status'] == 'Active' ) { echo "Issued"; } else { echo "Not Issued";}   ?>			</td>
						<?php if (in_array("9_12", $admin_permissions)) {?><td align="center" valign="middle" class="narmal">
						
						
						<a href="?pid=98&action=edit&id=<?php echo $eachrecord['es_preadmissionid']; ?>" ><img src="images/b_edit.png" border="0" title="Edit" alt="Edit" /></a>
						<input name="printtcstudent" type="button" class="bgcolor_02" onclick="newWindowOpen ('?pid=23&action=printtctostudent&sid=<?php echo $eachrecord['es_preadmissionid']; ?>');"  value="Print" style="cursor:pointer;"/> 
						
				
						
			
						
						 <?php }?></td>
                      </tr>
						<?php
						$rownum++; }?>
						<tr>
				<td colspan="7" align="center" class="adminfont"><?php if (in_array("9_26", $admin_permissions)) {?><input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=23&action=print_list_tcissued_student&tcstudent=Search&cl_class=<?php echo $cl_class; ?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /><?php }?></td>
			</tr>   
			<tr>
				<td colspan="7" align="center" class="adminfont">&nbsp;</td>
			</tr>    
						
						<?php }?>
                    </table></td>
                  </tr>
                  <tr>
                    <td height="25" align="center" valign="top"></td>
                    </tr>
				  </form>
					<?php
					}
					?>
                </table></td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
              </tr>
 </table>
 <?php } ?>
 
 <?php  if($action=="print_list_tcissued_student"){
 $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_preadmission','Student','Student Transfer','','Print','".$_SERVER['REMOTE_ADDR']."',NOW())";
     $log_insert_exe=mysql_query($log_insert_sql);
 ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">

				 
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>	
               <tr>
                <td height="5" colspan="3"  ></td>
              </tr>			  
               <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">TC Issued Students List </span></td>
              </tr>	
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="center" valign="top"><br />
				
				<table width="100%" align="center" cellpadding="0" cellspacing="0" class="tbl_grid">
					 <?php
				  if($no_rows11!=0)
				  {
				  ?>				      
                      <tr>
                        <td width="11%" height="30" align="center" valign="middle" class="bgcolor_02"><strong>S No </strong></td>
                        <td width="13%" align="center" valign="middle" class="bgcolor_02"><strong><span class="bgcolor_02">Reg #</span></strong></td>
						<td width="16%" align="left" valign="middle" class="bgcolor_02"><strong>&nbsp;<span class="bgcolor_02">Class</span></strong></td>
                        <td width="25%" align="left" valign="middle" class="bgcolor_02"><strong>&nbsp;Name</strong></td>
                        <td width="24%" align="left" valign="middle" class="bgcolor_02"><strong>&nbsp;Fathers Name<span class="style2"></span></strong></td>
                        <td width="11%" align="center" valign="middle" class="bgcolor_02"><strong>Status<span class="style2"></span></strong></td>
						
                      </tr>
						 <?php
						  $rownum = 1;	
						   foreach ($es_studentList as $eachrecord){
						   $zibracolor = ($rownum%2==0)?"even":"odd";
						   ?>
                      <tr class="<?php echo $zibracolor;?>">
                        
                        <td align="center" valign="middle" class="narmal"><?php echo $rownum; ?></td>
                        <td align="center" valign="middle" class="narmal"><?php echo $eachrecord['es_preadmissionid'] ; ?></td>
						 <td align="left" valign="middle" class="narmal"><?php echo classname($eachrecord['pre_class']) ; ?></td>
                        <td align="left" valign="middle" class="narmal"><?php echo $eachrecord['pre_name']; ?></td>
                        <td align="left" valign="middle" class="narmal"><?php echo $eachrecord['pre_fathername']; ?></td>
						
						
							<?php   $query="SELECT status FROM es_transferstudent WHERE sno = ".$eachrecord['es_preadmissionid'];
								$res=mysql_query($query);
								$row=mysql_fetch_array($res);
							?>
                        <td align="center" valign="middle" class="narmal"><?php if ($row['status'] == 'Active' ) { echo "Issued"; } else { echo "Not Issued";}   ?>	
						
						
						<?php //if ($eachrecord['status'] == 'inactive' ) { echo "Issued"; } else { echo "Not Issued";}   ?>	</td>
                  </tr>
						<?php
						$rownum++; }?>
						<tr>
				
						
						<?php }?>
                  </table>
                
				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
             
               
              
              
  		     <tr><td colspan="3" class="bgcolor_02" height="1"></td></tr>
			  
			  
   
</table>

<?php } ?>
<script type="text/javascript">

function newWindowOpen(href){
    window.open(href,null, 'width=900,height=900,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');
}
</script>
		<script language = "Javascript">
				
		var form='tcform1' //Give the form name here
		
		function SetChecked(val,chkName) {
		dml=document.forms[form];
		len = dml.elements.length;
		var i=0;
		for( i=0 ; i<len ; i++) {
		if (dml.elements[i].name==chkName) {
		dml.elements[i].checked=val;
		}
		}
		}
		
		function ValidateForm(dml,chkName){
		len = dml.elements.length;
		var i=0;
		for( i=0 ; i<len ; i++) {
		if ((dml.elements[i].name==chkName) && (dml.elements[i].checked==1)) return true
		}
		alert("Please select at least one record to be deleted")
		return false;
		}	
		
		</script>
<?php if($action=='printtctostaff'){?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">

	<tr>
         <td height="3" colspan="3"></td>
	 </tr>
	 <?php 	 
	 $db->update('es_staff',"tcstatus='issued'", 'es_staffid ='. $sid);
	 mysql_query("UPDATE es_trans_board_allocation_to_student SET status='Inactive' WHERE student_staff_id=".$sid." AND type='staff'");
	 $staff_arr = get_staffdetails($sid);
	 
	        $tcmaster_dat = $db->getrow("SELECT * FROM es_tcmaster WHERE es_tcmasterid=1");
			$randomstring=$tcmaster_dat['tcm_description']; 
			 $to  = $staff_arr['st_email']; 
			 $subject = "TERMINATION LETTER";
			 
			 if (strtoupper(substr(PHP_OS,0,3)=='WIN')) {
						$eol="\r\n";
					} elseif (strtoupper(substr(PHP_OS,0,3)=='MAC')) {
						$eol="\r";
					} else {
						$eol="\n";
					}
					
					$now = date("YmdHis");
				# Common Headers
					 $headers ="From:".$admintestmail['fi_email'].$eol;
					$headers .= 'Reply-To: '.ADMINTESTMAIL.$eol;
					$headers .= 'Return-Path: '.ADMINTESTMAIL.$eol; // these two to set reply address
					$headers .= "Message-ID: <".$now." - ".$_SERVER['SERVER_NAME'].">".$eol;
					$headers .= "X-Mailer: ".$_SESSION['eschools']['schoolname'].$eol; // These two to help avoid spam-filters, replace FIN Infocom according to your project.
				# Boundary for marking the split & Multitype Headers
					$mime_boundary=md5(time());
					$headers .= 'MIME-Version: 1.0'.$eol;
					$headers .= "Content-Type: text/html; boundary=\"".$mime_boundary."\"".$eol;
			 
	 $emailmessage = '<table width="100%" border="0"><tr><td width="635" height="100"><table width="100%" border="0">
				<tr>
        			<td height="93" align="right" valign="top"><table width="100%" border="0">
          		
         		<tr>
            		<td align="right" valign="middle"><span class="style5">&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
          		</tr>
        		</table>          <h4 class="style2">&nbsp;</h4></td>
     			</tr>
				<tr>
					<td colspan="3" align="center" height="10"><strong>TERMINATION LETTER</strong></td></tr><tr>
				</tr>
				<tr>
    <td width="9%" align="left" class="narmal" colspan="2">Staff&nbsp;Name:</td>
    <td width="91%" align="left" class="narmal"><b>'. ucwords($staff_arr['st_firstname'].' '.$staff_arr['st_lastname']).'</b></td>
  </tr>
  <tr>
    <td align="left" class="narmal" colspan="2">Department: </td>
    <td align="left" class="narmal"><b>'. ucwords(deptname($staff_arr['st_department'])).'</b></td>
  </tr>
   <tr>
    <td align="left" class="narmal" colspan="2">Post: </td>
    <td align="left" class="narmal"><b>'. ucwords(postname($staff_arr['st_post'])).'</b></td>
  </tr>
   <tr>
    <td align="left" class="narmal" colspan="2">Date: </td>
    <td align="left" class="narmal"><b>'. date("d-m-Y").'</b></td>
  </tr>
				
				<tr>
					<td colspan="3" height="690" >' . $randomstring . '
					</td>
				</tr>
				<tr><td colspan="3"></td></tr>
		   </table>';
		
		   @mail($to, $subject, $emailmessage, $headers); 
	 
	 
	  ?>
	 <tr>
         <td height="3" colspan="3">
		 <table width="100%" border="0">
  <tr>
    <td width="9%" align="left" class="narmal">Staff&nbsp;Name:</td>
    <td width="91%" align="left" class="narmal"><b><?php echo  ucwords($staff_arr['st_firstname'].' '.$staff_arr['st_lastname']);?></b></td>
  </tr>
  <tr>
    <td align="left" class="narmal">Department: </td>
    <td align="left" class="narmal"><b><?php echo  ucwords(deptname($staff_arr['st_department']));?></b></td>
  </tr>
   <tr>
    <td align="left" class="narmal">Post: </td>
    <td align="left" class="narmal"><b><?php echo  ucwords(postname($staff_arr['st_post']));?></b></td>
  </tr>
   <tr>
    <td align="left" class="narmal">Date: </td>
    <td align="left" class="narmal"><b><?php echo  date("d-m-Y");?></b></td>
  </tr>
</table>
 </td>
	 </tr>	
	 
	 <?php ?>
             
               
  	           
              
			   
              <tr>
                <td width="1" class=""></td>
                <td  align="justify" valign="top"><?php 
				
				$staff_termination =$es_tcmaster ->GetList(array(array("es_tcmasterid", ">", 0)) );
				foreach ($staff_termination as $emailview1){
				echo $randomstring=$emailview1->tcm_description;
				}
				?></td>
                <td width="1" class="">
				</td>
              </tr>
			  	
			  
   
</table>
<?php }?>

		
<?php

if($action=='printtctostudent'){?>

<?php /*?>	<table width="100%" border="0" cellspacing="0" cellpadding="0">

	<tr>
         <td height="3" colspan="3"></td>
	 </tr>
	 <?php 
	 
	 $std_arr = get_studentdetails($sid);
	 
	  ?>
	 <tr>
         <td height="3" colspan="3">
		 <table width="100%" border="0">
  <tr>
    <td width="9%" align="left" class="narmal">Student&nbsp;Name:</td>
    <td width="91%" align="left" class="narmal"><b><?php echo  ucwords($std_arr['pre_name']);?></b></td>
  </tr>
  <tr>
    <td align="left" class="narmal">Class: </td>
    <td align="left" class="narmal"><b><?php echo  ucwords(classname($std_arr['pre_class']));?></b></td>
  </tr>
   <tr>
    <td align="left" class="narmal">Date: </td>
    <td align="left" class="narmal"><b><?php echo  date("d-m-Y");?></b></td>
  </tr>
</table>
 </td>
	 </tr>	
	 
	 <?php ?>
             
               
  	           
              
			   
              <tr>
                <td width="1" class=""></td>
                <td  align="justify" valign="top"><?php 
				
				$emailview =$es_tcstudent ->GetList(array(array("es_tcstudentid", ">", 0)) );
				foreach ($emailview as $emailview1){
				echo $randomstring=$emailview1->tcm_description;
				}
				?></td>
                <td width="1" class="">
				</td>
              </tr>
			  	
			  
   
</table><?php */?>



<table width="100%" border="0" cellspacing="0" cellpadding="0">
     <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" align="center" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">
                 Transfer Certificate Applied Student<br>
				 (Affiliated to H.P.B.S.E Dharamshala Affiliation Code - 17076)
				 </span></td>
  </tr>	
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td  align="center" valign="top">

                 
				   <table width="96%" height="52%" border="0" cellpadding="3px" cellspacing="0">

                     <tr><td colspan="4"></td></tr><tr>
                       <td colspan="2"  align="left" class="narmal">S.No. <?php echo	$sem_det1['id'];?></td>
					<td width="1%" align="center">&nbsp;</td>
					<td width="49%" height="30" align="right">
					
			Admission No. <?php echo	$sem_det['es_preadmissionid'];?></td>
					</tr>
					<tr>
					  <td width="3%" class="narmal"  align="center">1.</td>
					<td width="47%" class="narmal"  align="left">Name of Pupil </td>
					<td width="1%" align="center"><strong> :</strong></td>
					<td width="49%" height="30" align="left" >
				<?php echo	$sem_det['pre_name'];?>  </td>
					</tr>
                 
                    <tr>
                      <td valign="top" class="narmal"  align="center">2.</td>
                      <td valign="top" class="narmal"  align="left"> Name of Father  </td>
                      <td valign="top"  align="center"><strong> :</strong></td>
                      <td height="30" valign="top" align="left"><?php echo	$sem_det['pre_fathername'];?> </td>
                    </tr>
                    <tr>
                      <td valign="top" class="narmal"  align="center">3.</td>
                      <td valign="top" class="narmal"  align="left">Nationality</td>
                      <td valign="top"  align="center"><strong> :</strong></td>
                      <td height="30" valign="top" align="left"><?php echo	$sem_det1['nationality'];?></td>
                    </tr>
                    <tr>
                      <td valign="top" class="narmal"  align="center">4.</td>
                      <td valign="top" class="narmal"  align="left"> Whether the Pupil belongs to scheduled caste or schedule tribe?</td>
                      <td valign="top"  align="center"><strong> :</strong></td>
                      <td height="30" valign="top" align="left"><?php if($sem_det1['sc']!=''){echo	$sem_det1['sc'];}else{echo '---';}?></td>
                    </tr>
                    <tr>
                      <td width="3%" valign="top" class="narmal"  align="center">5.</td>
					  <td valign="top" class="narmal"  align="left">Date Of birth according to Admission Register </td>
					  <td valign="top"  align="center"><strong> :</strong></td>
					  <td height="30" valign="top" align="left"><?php echo	displaydate($sem_det['pre_dateofbirth']);?></td>
                    </tr>
                    
					<tr>
					  <td width="3%" valign="top" class="narmal"  align="center">6.</td>
					<td width="47%" valign="top" class="narmal"  align="left">Class in which the pupil Last Studied/ is studying </td>
					<td width="1%" valign="top"  align="center"><strong>:</strong></td>
					<td width="49%" height="30" valign="top" align="left">
                      <?php 
										$student_detclass=$db->getRow("SELECT * FROM es_classes WHERE es_classesid='".$sem_det1['class_name']."'");
									
										?>
                                        <?php echo ucwords($student_detclass['es_classname']); ?>&nbsp;<?php if($candidate_det['section']!=""){echo "&nbsp;,&nbsp;".ucwords($candidate_det['section']);} ?></strong>
                    
                    
                    </td>
					</tr>
				<?php /*?>	<tr>
					<td width="35%" valign="top" class="narmal"  align="left"> Mother Name</td>
					<td width="1%" valign="top"  align="center"><strong> :</strong></td>
					<td width="64%" height="30" valign="top" align="left"><?php echo $html_obj->draw_inputfield('mother_name','','','class="input_field"');?><font color="#FF0000">*</font></td>
					</tr><?php */?>
						
                        
                        <tr>
                          <td width="3%" valign="top" class="narmal"  align="center">7.</td>
					      <td valign="top" class="narmal"  align="left">Subject Studied, starting in each compulsory or Elective, According to NCERT Syllabus, Hindi ,English,Gen Science,Social Study</td>
					      <td valign="top"  align="center"><strong> :</strong></td>
					      <td height="30" valign="top" align="left"><?php echo	$sem_det1['subject'];?></td>
                     </tr>
                    
                    
                    
                    <tr>
                      <td width="3%" valign="top" class="narmal"  align="center">8.</td>
					  <td valign="top" class="narmal"  align="left">Date of Promotion to the Class in</td>
					  <td valign="top"  align="center"><strong> :</strong></td>
					  <td height="30" valign="top" align="left"><?php
					  if($sem_det1['dobp']!="0000-00-00"){ echo func_date_conversion("Y-m-d","d-m-Y",ucwords($sem_det1['dobp']));}else{echo "0000-00-00";} 
					  
					  
					   ?></td>
                    </tr>
                    	<tr>
                    	  <td width="3%" valign="top" class="narmal"  align="center">9.</td>
					      <td valign="top" class="narmal"  align="left">Month upto which fees has been paid</td>
					      <td valign="top"  align="center"><strong> :</strong></td>
					      <td height="30" valign="top" align="left"><?php echo	$sem_det1['monthfeepay'];
						 
						  ?>&nbsp;-<?php echo	$sem_det1['exam_date']; ?></td>
                   	 </tr>
                    	<tr>
                    	  <td width="3%" valign="top" class="narmal"  align="center">10.</td>
					      <td valign="top" class="narmal"  align="left">Whether the pupil was in receipt of any fees concession?<br/>
If so, state the nature of concession.</td>
					      <td valign="top"  align="center"><strong> :</strong></td>
					      <td height="30" valign="top" align="left"><?php echo	$sem_det1['feecons'];?></td>
                   	 </tr>
		
                    
                    <tr>
                      <td width="3%" valign="top" class="narmal"  align="center">11.</td>
					  <td valign="top" class="narmal"  align="left">Date of Pupil's last attendance at the school</td>
					  <td valign="top"  align="center"><strong> :</strong></td>
					  <td height="30" valign="top" align="left"><?php if($sem_det1['doblast']!=''){echo displaydate($sem_det1['doblast']);}  ?></td>
                    </tr>
                    
                    
                    
                    <tr>
                      <td width="3%" valign="top" class="narmal"  align="center">12.</td>
					  <td valign="top" class="narmal"  align="left">Date on which he/she struck off the rolls of the school</td>
					  <td valign="top"  align="center"><strong> :</strong></td>
					  <td height="30" valign="top" align="left"><?php if($sem_det1['datestuck']!=''){ echo displaydate($sem_det1['datestuck']);}  ?></td>
                    </tr>
                    
                    
                    
                    <tr>
                      <td width="3%" valign="top" class="narmal"  align="center">13.</td>
					  <td valign="top" class="narmal"  align="left">Attandance during the period</td>
					  <td valign="top"  align="center"><strong> :</strong></td>
					  <td height="30" valign="top" align="left"><?php echo	$sem_det1['attendance'];?></td>
                    </tr>
                    
                    
                    
                    <tr>
                      <td width="3%" valign="top" class="narmal"  align="center">14.</td>
					  <td valign="top" class="narmal"  align="left">Date of issue of this certificate</td>
					  <td valign="top"  align="center"><strong> :</strong></td>
					  <td height="30" valign="top" align="left"><?php if($sem_det1['sissuecetrti']!=''){echo displaydate($sem_det1['sissuecetrti']);}  ?></td>
                    </tr>
                    
                    
                    <tr>
                      <td width="3%" valign="top" class="narmal"  align="center">15.</td>
					  <td valign="top" class="narmal"  align="left">Reasons for leaving the school</td>
					  <td valign="top"  align="center"><strong> :</strong></td>
					  <td height="30" valign="top" align="left"><?php echo	$sem_det1['rls'];?></td>
                    </tr>
                    
                    
                    <tr>
                      <td width="3%" valign="top" class="narmal"  align="center">16.</td>
					  <td valign="top" class="narmal"  align="left">Whether NCC Cadet/Boys Scout/Girl Guide? </td>
					  <td valign="top"  align="center"><strong> :</strong></td>
					  <td height="30" valign="top" align="left"><?php if($sem_det1['ncc']!=''){ echo	$sem_det1['ncc'];}else{echo '---';}
					 ?></td>
                    </tr>
                    
                    
                    <tr>
                      <td width="3%" valign="top" class="narmal"  align="center">17.</td>
					  <td width="47%" valign="top" class="narmal"  align="left">Games played and other co-curricular activities in which pupil usually took part with degree or proficiency attained.</td>
					  <td width="1%" valign="top"  align="center"><strong> :</strong></td>
					  <td width="49%" height="30" valign="top" align="left"><?php 
					  if($sem_det1['games']!=''){ echo	$sem_det1['games'];}else{echo '---';}
					 ?></td>
                    </tr>
                    
                    
                         <tr>
                           <td width="3%" valign="top" class="narmal"  align="center">18.</td>
					       <td width="47%" valign="top" class="narmal"  align="left">Conduct</td>
					       <td width="1%" valign="top"  align="center"><strong> :</strong></td>
					       <td width="49%" height="30" valign="top" align="left"><?php if($sem_det1['conduct']!=''){ echo	$sem_det1['conduct'];}else{echo '---';}?></td>
                     </tr>     <tr>
					<td width="3%" valign="top" class="narmal"  align="center">19.</td>
					<td valign="top" class="narmal"  align="left">Annual Charges for the year.</td>
					<td valign="top"  align="center"><strong> :</strong></td>
					<td height="30" valign="top" align="left"><?php if($sem_det1['acharge']!=''){ echo	$sem_det1['acharge'];}else{echo '---';}?></td>
                     </tr>          
                    
					 <tr>
					   <td colspan="2" align="left" valign="top" >&nbsp;</td>
					   <td valign="top"  align="left"></td>
					   <td height="30" valign="top" align="left"></td>
				     </tr>
					 <tr>
					  <td colspan="2" align="left" valign="top" >
				       Date:<?php echo date('d/m/Y')?> </td>
					<td width="1%" valign="top"  align="left"></td>
					<td width="49%" height="30" valign="top" align="left">				</td>
					</tr>
					</table>	
		
				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
              
  <tr>
    <td height="1" colspan="3" class="bgcolor_02"></td>
  </tr>
</table>


<?php
}
/**
*   ***********For Taking Interview *****************
*/ 
	if($action == 'take_interview')
	{
	
	?>
	<script language="javascript">
	function goto_URL(object)
	{
	
	window.location.href = object.options[object.selectedIndex].value;
	}
	</script>
	<script type="text/javascript">

					function fun()
					{ 
						 if(document.form.txt_deptname.value==""){
							alert("Select Department");		
							return false;
						}
						if(document.form.txt_post.value=="select"){
							alert("Select Post");		
							return false;
						}
						else
						{
						return true;
						}	   
					}
	 		</script>	
<table width="100%" border="0" cellspacing="0" cellpadding="0">
 <form  action="" method="post" name="form">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;Take Interview</td>
              </tr>			   
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="left" valign="top" ></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">			
					
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
					  <tr>
                		  <td height="20" colspan="6" align="right" >
			              			</td>
                        </tr>
                      <tr>
                        <td width="1%" class="narmal">&nbsp;</td>
                        <td width="9%" align="left" class="narmal">Department:</td>
                        <td width="22%" align="left">
                          <select name="txt_deptname" onchange="goto_URL(this.form.txt_deptname);" style="width:120px;">
                            <option value="?pid=23&amp;action=take_interview">-Select-</option>
                            <?php foreach($getdeptlist as $eachrecord) { ?>
                            <option value="?pid=23&amp;action=take_interview&amp;st_department=<?php echo $eachrecord[es_departmentsid];?>"<?php echo ($eachrecord[es_departmentsid]==$st_department)?"selected":""?>><?php echo $eachrecord[es_deptname];?></option>
                            <?php } ?>
                        </select></td>
                        <td width="3%" align="left" class="narmal">Post:</td>
						<td width="12%"><select name="txt_post" style="width:120px;">
                          <option value="select" >Select</option>
                          <?php if(count($es_postList) > 0 ){
					   foreach ($es_postList as $eachrecord){ ?>
                          <option value="<?php echo $eachrecord->es_deptpostsId;?>" <?php echo ($eachrecord->es_deptpostsId==$txt_post)?"selected":""?>  ><?php echo $eachrecord->es_postname;?></option>
                          <?php    } }?>
                        </select></td>
                        <td width="33%" class="narmal" style="display:none">Secondary&nbsp;Subject</td>
						<td width="3%"><input type="hidden" name="secondrysub" id="secondrysub" size="10" value="<?php if(isset($secondrysub)) echo $secondrysub; ?>"/></td>
                        <td width="17%" class="narmal"><input name="serchinterviewcandidate" type="submit" class="bgcolor_02" value="Search" style="cursor:pointer;" /></td>
                      </tr>
					  <tr><td>&nbsp;</td></tr>
					  <tr><td>&nbsp;</td></tr>
                    </table>					
					</td>
                  </tr>
				  <?php
				  if(isset($serchinterviewcandidate)&&($serchinterviewcandidate!='')||isset($emailnotification) || ($action1=='serchselect') || $action=='take_interview')
				  {				  		
					?>
					<tr><td>&nbsp;</td></tr>
					<tr><td class="narmal" align="center"><?php if($no_rows1==0) echo $nill1 ; ?></td>
					</tr>
					<?php
				  if($no_rows1!=0)
				  {
		  	
				  ?>
                 <tr>
                    <td height="40" align="left" valign="middle" class="adminfont" style="display:none"><a href="javascript:SetChecked(1,'checkbox[]')" class="header_link">&nbsp;&nbsp;Check All</a>/<a href="javascript:SetChecked(0,'checkbox[]')" class="header_link">UnCheck</a>                   </td>
                  </tr>
                  <tr>
                    <td align="center" valign="top">
					<table width="96%" border="0" cellspacing="0" cellpadding="0" class="tbl_grid">
                      <tr class="bgcolor_02">                       
                        <td width="8%"  class="admin" align="center">S No </td>
                        <td width="12%" class="admin" align="center">Name</td>
                        <td width="14%"  class="admin" align="center">Post Applied</td>                       
                        <td width="15%"  class="admin"  align="center">Primary Subject</td>
                        <td width="20%"  class="admin" align="center">Secondary Subject</td>
                        <td width="34%"  class="admin" align="center" colspan="1">Action</td>
                      </tr>
					  
				<?php
					  $rownum = 1;	
					 
				foreach ($es_candiadteList as $eachrecord1){
				
				$online_sql="select * from es_candidate where es_candidateid=".$eachrecord1->es_candidateId;
 $online_row=$db->getRow($online_sql);

 $online_sql1="select * from es_staff where hrdsid =".$eachrecord1->es_candidateId;
 $online_row1=$db->getRow($online_sql1);

 

if($online_row1['hrdsid']!=$online_row['es_candidateid'])
{
				if($online_row['st_emailsend']=='1' && $online_row['status']!='notattend' )
				{
				
				$zibracolor = ($rownum%2==0)?"even":"odd";
								  
				?>
				 
                      <tr class="<?php echo $zibracolor;?>">
					  
                        <td class="narmal" align="center"><?php echo $rownum ; ?></td>
                        <td class="narmal" align="center"><?php echo ucwords($eachrecord1->st_firstname.' '.$eachrecord1->st_lastname); ?></td>
                        <td class="narmal" align="center"><?php echo postname($eachrecord1->st_postaplied); ?>
						</td>
                        <td class="narmal" align="center">
						<?php echo subjectname($eachrecord1->st_primarysubject); ?></td>
                        <td class="narmal" align="center"><?php echo $eachrecord1->st_mobilenocomunication; ?>
						</td>
                        <td class="narmal" align="center" colspan="1"><a href=" ?pid=15&action=interview_registration&sid=<?php echo $eachrecord1->es_candidateId;?>&st_postaplied12=<?php echo $st_postaplied12;?>" class="video_link">Interview&nbsp;Attended</a>
						<a href=" ?pid=15&action=interview_registration1&sid=<?php echo $eachrecord1->es_candidateId;?>" class="video_link">Interview&nbsp;Not&nbsp;Attended</a>
											
                      </tr>
                        <?php
						$rownum++;

						}}}
						?>
						<tr><td colspan="6" align="center"><?php if (in_array("9_102", $admin_permissions)) {?><input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=23&action=print_takeinterview_list',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /><?php }?></td></tr>              
                     
                    </table></td>
                  </tr>
                  <tr>
                    <td height="40" align="center" valign="middle"><span class="narmal">
					<input type='hidden' name='st_postaplied12' value="<?php echo $st_postaplied12 ; ?>" >
					<input type='hidden' name='primarysub' value="<?php echo $primarysub ; ?>" >
					<input type='hidden' name='secondrysub' value="<?php echo $secondrysub; ?>" >
					<input type='hidden' name='rowcount' value="<?php echo $no_rows1 ; ?>" >
                      <!--<input name="emailnotification" type="submit" class="bgcolor_02" value="Email Notfication" />
                      <input name="back" type="submit" class="bgcolor_02" value="Cancel" />-->
                    </span></td>
                  </tr>
				  
			<?php
			  }
			  }
			  ?>
		
                </table></td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
			 
			  <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
              </tr>
			  
	 </form>
 </table>
<?php
}
?>	
<?php  if($action=="print_takeinterview_list"){
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_candidate','HRD','Take Interview','','Print','".$_SERVER['REMOTE_ADDR']."',NOW())";
     $log_insert_exe=mysql_query($log_insert_sql);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">

				 
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>	
               <tr>
                <td height="5" colspan="3"  ></td>
              </tr>			  
               <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Candidates (Email send for Interview)</span></td>
              </tr>	
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="center" valign="top"><br />
				
				<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tbl_grid">
                      <tr class="bgcolor_02" height="25">                       
                        <td width="13%"  class="admin" align="center">S No </td>
                        <td width="21%" class="admin" align="center">Name</td>
                        <td width="22%"  class="admin" align="center">Post Applied</td>                       
                        <td width="25%"  class="admin"  align="center">Primary Subject</td>
                        <td width="19%"  class="admin" align="center">Secondary Subject</td>
                        
                      </tr>
					  
				<?php
					  $rownum = 1;	
				foreach ($es_candiadteList as $eachrecord1){
				$zibracolor = ($rownum%2==0)?"even":"odd";	
					
				$online_sql="select * from es_candidate where es_candidateid=".$eachrecord1->es_candidateId;
 $online_row=$db->getRow($online_sql);

  $online_sql1="select * from es_staff where hrdsid =".$eachrecord1->es_candidateId;
 $online_row1=$db->getRow($online_sql1);

 

if($online_row1['hrdsid']!=$online_row['es_candidateid'])
{

				if($online_row['st_emailsend']=='1' && $online_row['status']!='notattend' )
				{			  
				?>
				 
                      <tr class="<?php echo $zibracolor;?>">
					  
                        <td class="narmal" align="center"><?php echo $rownum ; ?></td>
                        <td class="narmal" align="center"><?php echo ucwords($eachrecord1->st_firstname.' '.$eachrecord1->st_lastname); ?></td>
                        <td class="narmal" align="center"><?php echo postname($eachrecord1->st_postaplied); ?>
						</td>
                        <td class="narmal" align="center">
						<?php echo subjectname($eachrecord1->st_primarysubject); ?></td>
                        <td class="narmal" align="center"><?php echo $eachrecord1->st_mobilenocomunication; ?>
						</td>
                        
											
                      </tr>
                        <?php
						$rownum++;

						}}}
						?>              
                     
                    </table>
                
				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
             
              
              
              
  		     <tr><td colspan="3" class="bgcolor_02" height="1"></td></tr>
			  
			  
   
</table>

<?php } ?>  	


<?PHP

/**
*   ***********Letters View*****************
*/
	

if($action=='letterslist')
{
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Other Letters Format</strong></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="left" valign="top">&nbsp;</td>
                  </tr>
				   <tr>
                    <td align="right" valign="top" style="padding-right:5px;"><?php if(in_array('9_14',$admin_permissions)){?><a href="?pid=23&action=addformat" class="bgcolor_02" style="text-decoration:none;">Add New</a><?php }?></td>
                  </tr>
				  <tr>
                    <td align="left" valign="top">&nbsp;</td>
                  </tr>
                      <tr>
                    <td align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                      <tr class="bgcolor_02">
                        <td width="4%" class="admin" align="center">S.No</td>
                        <td width="10%" class="admin" align="center">Letter Title</td>
						<td width="10%" class="admin" align="center">Letter Message</td>
						 <td width="10%" class="admin" align="center">Action</td>
						 
                      </tr>
				 <?php
				 if(count($letter_details)>0){
					  $rownum = 1;	
				foreach ($letter_details as $eachletter){
				$zibracolor = ($rownum%2==0)?"even":"odd";	
				$message=$eachletter['letter_desc'] ;			  
				  ?>
                      <tr class="<?php echo $zibracolor; ?>">
                        <td align="center"><?php echo $rownum ; ?></td>
						   <td align="center"><?php echo $eachletter['letter_title'] ; ?></td>
                        <td align="center"><?php echo substr(strip_tags($message),0,40)."..." ;?> </td>
					    <td align="center">
                        <?php if (in_array("9_30", $admin_permissions)) {?>

                        <a href=" ?pid=23&action=editformat&letter_id=<?php echo $eachletter['letter_id']; ?>"><img src="images/b_edit.png"width="16" height="16" hspace="2"  border="0" /></a>&nbsp;
                        <?php }else{ echo "-"; }?>
                        <?php if (in_array("9_31", $admin_permissions)) {?>

                        <a href=" ?pid=23&action=deleteletter&letter_id=<?php echo $eachletter['letter_id']; ?>&start=<?php echo $start;?>"onClick="return confirm('Are you sure you want to  delete ?')"><img src="images/b_drop.png"width="16" height="16" hspace="2"  border="0" /></a><?php }else{ echo "-"; }?></td>
                      </tr>
                     <?php
					$rownum++; 
					 }
					  
		   ?>
		   <tr>
			<td colspan="4" align="center" class="narmal"><?php paginateexte($start, $q_limit, $no_rows, "&action=letterslist");?></td>
		  </tr>
		  <?php
		   } else { ?>
		   <tr>
			<td colspan="4" align="center" class="narmal">No Records Found</td>
		  </tr>
		  <?php } ?>
                    </table></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">&nbsp;</td>
                  </tr>
                </table></td>
                <td width="1" class="bgcolor_02"></td>
            </tr>              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02">
				</td>
  </tr>
 </table>
<?php }?>

<?php 
if($action=='addformat' || $action== "editformat")
	{
	?>
	<?php  include("includes/js/fckeditor/fckeditor.php") ;?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<form name="form1" action="" method="post">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">
				<strong><?php if($action=="addformat"){echo "Add Letter Format";}else{echo "Edit Letter Format";}?></strong>
				</td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td width="" align="left" valign="top"><table width="100%" border="0" cellspacing="5" cellpadding="0">
				 <tr>
                    <td>Title :</td>
                    <td align="left" valign="top" class="narmal">
					<?php if(isset($letter_title) || $letter_title!=""){
					$letter_title=$letter_title;
					}else{
					$letter_title=$edit_format['letter_title'];
					}
					?>
					       <input type="text" name="letter_title" id="letter_title" value="<?php  echo $letter_title ;?>"  size="80"/>&nbsp;<font color="#FF0000"><b>*</b></font>                             
					</td>
                  </tr>
				   <tr>
                    <td colspan="2">Description :</td>
                    
                  </tr>
                  <tr>
                    
                    <td align="left" valign="top" class="narmal" colspan="2">
					                                    <?php
													 if(isset($letter_desc) || $letter_desc!=""){
					$letter_desc=$letter_desc;
					}else{
					$letter_desc=$edit_format['letter_desc'];
					}
					
														
														$sBasePath = $_SERVER['PHP_SELF'] ;
															  $sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "?pid" ) ) ;
															  $sBasePath = $sBasePath."includes/js/fckeditor/";
															  $oFCKeditor = new FCKeditor('letter_desc') ;
															  $oFCKeditor->BasePath	= $sBasePath ;
															  $oFCKeditor->Height = 500;
															  $oFCKeditor->Width = 600;
															  $oFCKeditor->Value		= stripslashes($letter_desc) ;
															  $oFCKeditor->Create() ;
														?>
					</td>
                  </tr>
                  
                  <tr>
                    
                    <td align="center" valign="top" class="narmal" colspan="2">
					<?php if($action=="editformat"){?>
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
    <td colspan="3" align="center" valign="middle">Note: Update before Printing</td>
    
  </tr>
  <tr>
    <td width="45%">&nbsp;</td>
    <td width="7%"><input name="editformats" type="submit" class="bgcolor_02" value="Update" style="cursor:pointer;"/></td>
    <td width="48%"><script type="text/javascript">
	
function popup_format(url) {

		 var width  = 800;
		 var height = 600;
		 var left   = (screen.width  - width)/2;
		 var top    = (screen.height - height)/2;
		 var params = 'width='+width+', height='+height;
		 params += ', top='+top+', left='+left;
		 params += ', directories=no';
		 params += ', location=no';
		 params += ', menubar=no';
		 params += ', resizable=no';
		 params += ', scrollbars=yes';
		 params += ', status=no';
		 params += ', toolbar=no';
		 
		 alert('afasdfasd');
		 newwin1=window.open(url,'windowname10', params);
		 if (window.focus) {
			 newwin1.focus()
		 }
	 return false;
}
</script><a href="javascript: void(0)" onclick="popup_format('?pid=23&action=printletterformat123&letter_id=<?php echo $letter_id; ?>')" title="Print Offer Letter"><img src="images/print_16.png" border="0" /></a>  </td>
  </tr>
</table>

				
					
					<?php } else{?>
					<input name="addformats" type="submit" class="bgcolor_02" value="Add Format" style="cursor:pointer;"/>
					<?php }?>
					
					
                       </td>
                  </tr>
                  
                </table></td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
              </tr>
  </form>
 </table>			
<?php
}
?>	
<?php if($action=="sendlettertostaff"){?>

<script type="text/javascript">
function GetXmlHttpObject(handler)
		{
			var objXmlHttp=null
		
			if (navigator.userAgent.indexOf("Opera")>=0)
			{
				alert("This Site doesn't work in Opera")
				return
			}
			if (navigator.userAgent.indexOf("MSIE")>=0)
			{
				var strName="Msxml2.XMLHTTP"
				if (navigator.appVersion.indexOf("MSIE 5.5")>=0)
				{
					strName="Microsoft.XMLHTTP"
				}
				try
				{
					objXmlHttp=new ActiveXObject(strName)
					objXmlHttp.onreadystatechange=handler
					return objXmlHttp
				}
				catch(e)
				{
					alert("Error. Scripting for ActiveX might be disabled")
					return
				}
			}
			if (navigator.userAgent.indexOf("Mozilla")>=0)
			{
				objXmlHttp=new XMLHttpRequest()
				objXmlHttp.onload=handler
				objXmlHttp.onerror=handler
				return objXmlHttp
			}
		}




function getsubjects(countryid,selval)
		{   
			url="?pid=55&action=getposts&es_departmentsid="+countryid+"&selval="+selval;
			url=url+"&sid="+Math.random();
			xmlHttp1=GetXmlHttpObject(countryChanged);
			xmlHttp1.open("GET", url, true);
			xmlHttp1.send(null);
		}
		function countryChanged()
		{
			if (xmlHttp1.readyState==4 || xmlHttp1.readyState=="complete")
			{
				document.getElementById("subjectselectbox").innerHTML=xmlHttp1.responseText
			}
		}
	function getallsubjects(countryid,getselected)
		{   
			url="?pid=55&action=getstaff&cid="+countryid+"&selval="+getselected;
			url=url+"&sid="+Math.random();
			xmlHttp=GetXmlHttpObject(countryChanged2);
			xmlHttp.open("GET", url, true);
			xmlHttp.send(null);
		}
		function countryChanged2()
		{
			if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
			{
				document.getElementById("subject2selectbox").innerHTML=xmlHttp.responseText
			}
		}</script>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span id="internal-source-marker_0.435698680255756">Send Letter </span></td>
              </tr>
              <tr>
                <td width="1px" class="bgcolor_02" ></td>
                <td height="25" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font><br /></td>
                 <td width="1px" class="bgcolor_02" ></td></td>
              </tr>				  
              <tr>
                <td width="1" class="bgcolor_02" height="100"></td>
                <td align="center" valign="top"><br />
				    <form name="" action="" method="post">
					<table width="96%" height="52%" border="0" cellpadding="3px" cellspacing="0">
					<tr>
					<td width="22%" class="narmal"  align="left">Department</td>
					<td width="1%" align="center"><strong> :</strong></td>
					<td width="77%" height="30" align="left"><select name="st_department" onChange="getsubjects(this.value,'');" style=" width:150px;">
							<option value="">-Select-</option>
							<?php foreach($getdeptlist as $eachrecord1) {  ?>
							<option value="<?php echo $eachrecord1["es_departmentsid"];?>" <?php if(isset($st_department) && $st_department==$eachrecord1["es_departmentsid"]){ echo "selected='selected'";}?>  ><?php echo $eachrecord1["es_deptname"];?></option>
						<?php } ?>
					  </select>&nbsp;<font color="#FF0000"><b>*</b></font></td>
					</tr>

					<tr>
					<td width="22%" class="narmal"  align="left">Post</td>
					<td width="1%" align="center"><strong> :</strong></td>
					<td width="77%" height="30" align="left" id="subjectselectbox"><select name="es_deptpostsid" style=" width:150px;">
                      <option value="">- Select -</option></select>&nbsp;<font color="#FF0000">&nbsp;*</font></td>
					</tr>

					<tr>
					<td width="22%" class="narmal"  align="left">
					<?php if($st_department!=""){
					
					 ?>
<script type="text/javascript">
getsubjects('<?php echo $st_department; ?>','<?php echo $es_deptpostsid;?>');
</script>
<?php } ?>
					Name / Username</td>
					<td width="1%" align="center"><strong> :</strong></td>
					<td width="77%" height="30" align="left" id="subject2selectbox"><select multiple="multiple" size="5" style=" width:150px;"></select>&nbsp;<font color="#FF0000">&nbsp;*</font><div class="normal">Use Ctrl + Mouse click for multi selection</div></td>
					</tr>
<?php if($es_deptpostsid!=""){ ?>
<script type="text/javascript">
getallsubjects('<?php echo $es_deptpostsid; ?>','<?php echo $st_department; ?>')
</script>
<?php } ?>
					<tr>
					<td width="22%" valign="top" class="narmal"  align="left"> Subject </td>
					<td width="1%" valign="top"  align="center"><strong> :</strong></td>
					<td width="77%" height="30" valign="top" align="left"><?php echo $html_obj->draw_inputfield('subject',$subject,'','class="input_field"');?><font color="#FF0000">&nbsp;*</font></td>
					</tr>
					<tr>
					<td width="22%" valign="top" class="narmal"  align="left">Select Letter Format </td>
					<td width="1%" valign="top"  align="center"><strong> :</strong></td>
					<td width="77%" height="30" valign="top"  align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="26%"><?php echo $html_obj->draw_selectfield('letter_title',$otherletters_for,'','class="input_field"');?></td>
                          <td width="74%" align="left" valign="bottom"><font color="#FF0000">&nbsp;*</font></td>
                        </tr>
                      </table></td>
					</tr>
					<tr>

					<td width="22%" valign="top" ></td>
					<td width="1%" valign="top"  align="center"></td>
					<td width="77%" valign="middle" align="left" height="30"><?php if(in_array('9_15',$admin_permissions)){?>
					  <input type="submit" name="submit_staff" value="Send Email" class="bgcolor_02" style="padding-left:10px;padding-right:10px;cursor:pointer;" /><?php }?></td>
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
<?php } ?>

		 
				
<?php if ($action == 'printletterformat123') { ?>
<?php echo $print_message; ?>
<?php } ?>



<?php

/**
*   ***********For Offerletter Generation *****************
*/
	
		if($action=='otherlettergeneration')
		{
		?>
		<script language="javascript">
		function goto_URL(object)
		{
		
		window.location.href = object.options[object.selectedIndex].value;
		}
		</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02" align="left">&nbsp;<span id="internal-source-marker_0.435698680255756">Print Letter </span></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"> </td>
                <td align="left" valign="top">
				
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
                 
				    <tr>
                		                       <td height="25" colspan="3" align="right" >
			                                    	<font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font>												</td>
                                          </tr>       
                  <tr>
                    <td colspan="3" align="left" valign="top">
									<table width="95%" border="0" cellspacing="0" cellpadding="0">
										<form action="" method="post" name="form">
                      <tr>
					     <td width="18%" align="right" class="narmal">Department:</td>
				        <td width="13%" class="narmal"><select name="txt_deptname"onchange="goto_URL(this.form.txt_deptname);" style="width:120px;">
                          <option value="?pid=23&action=otherlettergeneration">-Select-</option>
                          <?php foreach($getdeptlist as $eachrecord) { ?>
                          <option value="?pid=23&amp;action=otherlettergeneration&amp;st_department=<?php echo $eachrecord[es_departmentsid];?>"<?php echo ($eachrecord[es_departmentsid]==$st_department)?"selected":""?>><?php echo $eachrecord[es_deptname];?></option>
                          <?php } ?>
                        </select></td>
                        <td width="3%"><span class="narmal">Post:</span></td>
                                            
                        <td width="18%"><select name="txt_post" style="width:120px;">
                          <option value="" >Select</option>
                          <?php if(count($es_postList) > 0 ){
					   foreach ($es_postList as $eachrecord){ ?>
                          <option value="<?php echo $eachrecord->es_deptpostsId;?>" <?php echo ($eachrecord->es_deptpostsId==$txt_post)?"selected":""?>  ><?php echo $eachrecord->es_postname;?></option>
                          <?php    } }?>
                        </select><font color="#FF0000">*</font></td>
                        <td width="6%"><span class="narmal">Letter&nbsp;:&nbsp;</span></td>
                        <td width="24%"><?php echo $html_obj->draw_selectfield('letter_title',$otherletters_for,'','class="input_field"');?><font color="#FF0000">*</font></td>
                        <td width="18%" class="narmal">
						
						<input name="searchotherletter" type="submit" class="bgcolor_02" value="Submit" style="cursor:pointer;"/>
						</td>
                      </tr>
					  <tr>
                    <td align="left" valign="top">&nbsp;</td>
                  </tr>
					  </form>
                    </table>
					
					</td>
                  </tr>
				  <?php
				  if(isset($searchotherletter))
				  {
				  if($no_rows2!=0)
				  {				  
				  ?>
				  <form action="<?php echo buildurl(array('pid'=>23,'action'=>'printing'));?>" method="post" name="form1">
                  <tr>
                     <td height="40" align="left" valign="middle" class="adminfont" colspan="3">                    </td>
                  </tr>
                  <tr>
                    <td colspan="3" align="left" valign="top"><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" class="tbl_grid">
                      <tr class="bgcolor_02">
                       
                        <td width="9%" align="left" class="admin">S No</td>
						 <td width="9%" align="left" class="admin">Emp Id</td>
                        <td width="22%" height="25" align="left" class="admin">Candidate&nbsp;Name</td>                       
                      
                        <td width="19%" align="left" class="admin">Action</td>
                        <!--<td width="17%" class="admin"><strong> &nbsp;Remarks</strong></td>-->
                      </tr>
					  <?php
					   $rownum = 1;	
				foreach ($es_staffingList as $eachrecord2){
				$zibracolor = ($rownum%2==0)?"even":"odd";	
	 $online_sql="select * from es_staff where es_staffid=".$eachrecord2->es_staffId;
 $online_row=$db->getRow($online_sql);
 if($online_row['st_mail']!='')
 {
					  ?>
					  
                      <tr class="<?php echo $zibracolor;?>">
                        
                        <td height="25" align="left" class="narmal"><?php echo  $rownum ; ?></td>
						 <td align="left" class="narmal"><?php echo ucwords($eachrecord2->es_staffId); ?></td>
                        <td align="left" class="narmal"><?php echo ucwords($eachrecord2->st_firstname.' '.$eachrecord2->st_lastname); ?></td>
                     
                        <td align="left" class="narmal"><script type="text/javascript">
function popup_letter(url) {
		 var width  = 800;
		 var height = 600;
		 var left   = (screen.width  - width)/2;
		 var top    = (screen.height - height)/2;
		 var params = 'width='+width+', height='+height;
		 params += ', top='+top+', left='+left;
		 params += ', directories=no';
		 params += ', location=no';
		 params += ', menubar=no';
		 params += ', resizable=no';
		 params += ', scrollbars=yes';
		 params += ', status=no';
		 params += ', toolbar=no';
		 newwin=window.open(url,'windowname5', params);
		 if (window.focus) {
			 newwin.focus()
		 }
	 return false;
}
</script>
<?php if(in_array('9_16',$admin_permissions)){?><a href="javascript: void(0)" onclick="popup_letter('?pid=23&action=printotherletterformats&st_department=<?php echo $st_department; ?>&sid=<?php echo $eachrecord2->es_staffId; ?>&letter_title=<?php echo $letter_title;?>&es_deptpostsid=<?php echo $txt_post; ?>')" title="Print Offer Letter"><img src="images/print_16.png" border="0" /></a><?php }?>
</td>
                      </tr>
					  <?php
					  $rownum ++ ;}}
					  ?>
                    </table></td>
                  </tr>
                 
				  </form>
 <?php
				   
  }
  }
  ?>
   </table></td>
                <td width="1"  class="bgcolor_02"></td>
              </tr>			 
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
              </tr>
			  
 </table>
	
<?php
}
?>
<?php if ($action == 'printotherletterformats') { ?>
<?php echo $print_message; ?>
<?php } ?>
<?php
if($action=='expe')
{?>
<p ><h3 style="text-align:center"> Employee Certificate</h3></p>
<p>This is certified that <?php echo $staff_row['st_firstname'];?>&nbsp;<?php echo $staff_row['st_lastname'];?> <?php if( $staff_row['st_gender']=='Male' || $staff_row['st_gender']=='male' ) { echo "S/O";} else { echo "D/O";}?> Mr. <input type='text'  />&nbsp;<?php echo $staff_row['st_pradress']; ?>had been worked as <?php
$online_sql="select * from es_deptposts where es_deptpostsid=".$staff_row['st_post'];
 $online_row=$db->getRow($online_sql); echo $online_row['es_postname'];?> in this school from <?php echo displaydate($staff_row['intdate']);?> to <?php echo ($staff_row['terminationdate']);?>.<?php if( $staff_row['st_gender']=='Male' || $staff_row['st_gender']=='male' ) { echo "He";} else { echo "She";}?> is very hardworking  & dedicated employee.</p>
 I wish <?php echo ($staff_row['terminationdate']);?>.<?php if( $staff_row['st_gender']=='Male' || $staff_row['st_gender']=='male' ) { echo "He";} else { echo "She";}?> all success in life.

<?php
}
?>
	