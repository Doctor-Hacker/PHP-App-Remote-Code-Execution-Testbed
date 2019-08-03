<?php 
// View Profile
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
   
    <td align="left" style="padding-left:5px;" class="admin">My Profile</td>
    <td align="right">&nbsp;</td>
    <td> <a href="?pid=16&amp;action=editprofile&amp;sid=<?php echo $eachrecord['es_preadmissionid'];?>&amp;clid=<?php if($sm_class!=''){echo $sm_class;}else{echo $clid;}?>&amp;secid=<?php if($sm_section!=''){echo $sm_section;}else {echo $secid;}?>" >
                               <?php if (in_array('5_1', $admin_permissions)){ ?><?php
							    $session_year    = $_SESSION['eschools']['es_finance_masterid'];
							   if($ac_year == $session_year ){?>
                               <!--<input name="Submit2" type="submit" class="bgcolor_02" value="View/Edit" style="cursor:pointer"/>--><span class="bgcolor_02" style="width:50px;padding:2px; text-decoration:none;"  >Edit</span><?php }}?></a>&nbsp;&nbsp;&nbsp;</td>
  </tr>
</table>
</td>
	  </tr>
	  <tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="center" valign="top">		
		<table width="100%" border="0" cellspacing="0" cellpadding="0">		
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
            
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td width="1203" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                       <tr>
                        <td width="6%">&nbsp;</td>
                        <td width="20%" class="narmal"> Staff Id</td>
                        <td width="0%">:</td>
                        <td width="43%" class="narmal"><?php echo $staffdetails['es_staffid']; ?></td>                 		
                        <td width="31%" colspan="4"  align="center" ></td>
                      </tr>
					  <tr>
                        <td width="6%">&nbsp;</td>
                        <td width="20%" class="narmal"> First&nbsp;Name </td>
                        <td width="0%">:</td>
                        <td width="43%" class="narmal"><?php echo $staffdetails['st_firstname']; ?></td>                 		<td width="31%" colspan="4" rowspan="10" align="center" ><?php 
							if($staffdetails['image']!="") { 
						echo displayimage("../office_admin/images/staff/" .$staffdetails['image'], "127");  } 
						else
						{
						echo displayimage("../office_admin/images/staff/userphoto.gif", "127"); 
						}
						?>
						</td>
											
                      </tr> 				  
                      <tr>
                        <td>&nbsp;</td>
                        <td class="narmal">Last&nbsp;Name </td>
                        <td>:</td>
                        <td class="narmal"><?php echo $staffdetails['st_lastname']; ?></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td class="narmal">Gender</td>
                        <td>:</td>
                        <td class="narmal"><?php echo $staffdetails['st_gender']; ?></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td class="narmal">Date Of Birth </td>
                        <td>:</td>
                        <td class="narmal"><?php echo displaydate($staffdetails['st_dob']); ?></td>
                      </tr>
					     <tr>
                        <td>&nbsp;</td>
                        <td class="narmal">Department</td>
                        <td>:</td>
                        <td class="narmal"><?php echo deptname($staffdetails['st_department']); ?></td>
                      </tr>	
                      <tr>
                        <td>&nbsp;</td>
                        <td class="narmal">Post</td>
                        <td>:</td>
                        <td class="narmal"><?php echo postname($staffdetails['st_post']); ?></td>
                      </tr>	
					<?php if($staff_TYPE =='teaching'){?>			   
					 <tr>
                        <td>&nbsp;</td>
                        <td class="narmal">Primary Subject </td>
                        <td>:</td>
                         <td class="narmal"><?php echo subjectname($staffdetails['st_subject']); ?></td>
                      </tr>
					 <?php /*?>  <tr>
                        <td>&nbsp;</td>
                        <td class="narmal">Secondary Subject </td>
                        <td>:</td>
                         <td class="narmal"><?php  echo ($staffdetails['st_primarysubject']); ?></td>
                      </tr><?php */?>
					  <?php }?>
					  <tr> 
                      <tr>
                        <td valign="top">&nbsp;</td>
                        <td valign="top" class="narmal">Email</td>
                        <td valign="top">:</td>
                        <td colspan="4" valign="top" class="narmal"><?php echo $staffdetails['st_email']; ?></td>
                      </tr>
					  <tr>
                        <td valign="top">&nbsp;</td>
                        <td valign="top" class="narmal">Basic Salary</td>
                        <td valign="top">:</td>
                        <td colspan="4" valign="top" class="narmal"><?php echo $_SESSION['eschools']['currency'].number_format($staffdetails['st_basic'], 2, '.', ''); ; ?></td>
                      </tr>
                      <tr>
                        <td valign="top">&nbsp;</td>
                        <td valign="top" class="narmal">Date Of Joining</td>
                        <td valign="top">:</td>
                        <td colspan="4" valign="top" class="narmal"><?php if($staffdetails['st_dateofjoining']!="---") { echo displaydate($staffdetails['st_dateofjoining']); } else { echo "---"; } ?></td>
                      </tr>
					 
					 <tr>
                        <td valign="top">&nbsp;</td>
                        <td valign="top" class="narmal">Blood Group</td>
                        <td valign="top">:</td>
                        <td colspan="4" valign="top" class="narmal"><?php echo $staffdetails['st_bloodgroup']; ?></td>
                      </tr>
					  <tr height="1" class="bgcolor_02">
                        <td colspan="8"> </td>
					 </tr>                      
                      
                      <tr>
                        <td colspan="8"><table width="100%" border="1" cellspacing="0" cellpadding="0" class="tbl_grid">
                        <tr>
                              <td width="5%" height="20" class="bgcolor_02"><strong>&nbsp;S No </strong></td>
                              <td width="22%" align="center" class="bgcolor_02"><strong>&nbsp;&nbsp;&nbsp;Exam Passed </strong></td>
                            <td width="15%" align="center" class="bgcolor_02"><strong>&nbsp;&nbsp;Marks Obtained </strong></td>
							<td width="28%" align="center" class="bgcolor_02"><strong>&nbsp;&nbsp;Board / University </strong></td>
                            <td width="30%" align="center" class="bgcolor_02"><strong>&nbsp;&nbsp;Year</strong></td>
                          </tr>
                            <tr>
                              <td class="narmal">1</td>
                              <td align="center" class="narmal"><?php echo $staffdetails['st_examp1']; ?></td>
                              <td align="center" class="narmal"><?php echo $staffdetails['st_marks1']; ?></td>
							   <td align="center" class="narmal"><?php echo $staffdetails['st_borduniversity1']; ?></td>
                              <td align="center" class="narmal"><?php echo $staffdetails['st_year1']; ?></td>
                          </tr>
                            <tr>
                              <td class="narmal">2</td>
                              <td align="center" class="narmal"><?php echo $staffdetails['st_examp2']; ?></td>
							   <td align="center" class="narmal"><?php echo $staffdetails['st_marks2']; ?></td>
                              <td align="center" class="narmal"><?php echo $staffdetails['st_borduniversity2']; ?></td>
                              <td align="center" class="narmal"><?php echo $staffdetails['st_year2']; ?></td>
                          </tr>
                            <tr>
                             <td class="narmal">3</td>
                             <td align="center" class="narmal"><?php echo $staffdetails['st_examp3']; ?></td>
							  <td align="center" class="narmal"><?php echo $staffdetails['st_marks3']; ?></td>
                             <td align="center" class="narmal"><?php echo $staffdetails['st_borduniversity1']; ?></td>
                             <td align="center" class="narmal"><?php echo $staffdetails['st_year3']; ?></td>
                          </tr>
                            <tr>
                              <td colspan="5" class="narmal">&nbsp;</td>
                            </tr>
                        </table></td>
                      </tr>
                     
                      <tr>                       
                        <td colspan="8">
						<table width="100%" border="1" cellspacing="0" cellpadding="0" class="tbl_grid">
                          <tr>
                            <td width="7%" height="20" class="bgcolor_02"><strong>&nbsp;S No </strong></td>
                            <td width="31%" align="center" class="bgcolor_02"><strong>&nbsp;&nbsp;Institution</strong></td>
                            <td width="35%" align="center" class="bgcolor_02"><strong>&nbsp;&nbsp;&nbsp;Position</strong></td>
                            <td width="27%" align="center" class="bgcolor_02"><strong>Period</strong></td>
                          </tr>
                          <tr>
                            <td class="narmal">1</td>
                            <td align="center" class="narmal"><?php echo $staffdetails['st_insititute1']; ?></td>
                            <td align="center" class="narmal"><?php echo $staffdetails['st_position1']; ?></td>
                            <td align="center" class="narmal"><?php echo $staffdetails['st_period1']; ?></td>
                          </tr>
                          <tr>
                            <td class="narmal">2</td>
                            <td align="center" class="narmal"><?php echo $staffdetails['st_insititute2']; ?></td>
                            <td align="center" class="narmal"><?php echo $staffdetails['st_position2']; ?></td>
                            <td align="center" class="narmal"><?php echo $staffdetails['st_period2']; ?></td>
                          </tr>
                          <tr>
                            <td class="narmal">3</td>
                            <td align="center" class="narmal"><?php echo $staffdetails['st_insititute3']; ?></td>
                            <td align="center" class="narmal"><?php echo $staffdetails['st_position3']; ?></td>
                            <td align="center" class="narmal"><?php echo $staffdetails['st_period3']; ?></td>
                          </tr>
                          <tr>
                            <td colspan="4" class="narmal">&nbsp;</td>
                          </tr>
                        </table></td>
                      </tr>
                      <tr>
                         <td colspan="8" valign="top" >
						 <table width="100%" border="0" cellspacing="3" cellpadding="0" class="tbl_grid">
                            <tr>
                              <td height="25" colspan="7" class="bgcolor_02"><strong>&nbsp;&nbsp;Present Address</strong></td>
                            </tr>
                            <tr>
                              <td width="4%">&nbsp;</td>
                              <td width="17%" align="left"  class="narmal">Addres</td>
                              <td width="4%" align="left">:</td>
                              <td width="22%" align="left"  class="narmal"><?php echo $staffdetails['st_pradress']; ?></td>
                              <td width="17%" align="left">&nbsp;</td>
                              <td width="2%" align="left">&nbsp;</td>
                              <td width="34%" align="left">&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                              <td align="left"  class="narmal">City</td>
                              <td align="left">:</td>
                              <td align="left"><span class="narmal"><?php echo $staffdetails['st_prcity']; ?></span></td>
                              <td  class="narmal" align="left">State</td>
                              <td align="left">:</td>
                              <td align="left"><span class="narmal"><?php echo $staffdetails['st_prstate']; ?></span></td>
                            </tr>
                           
                            <tr>
                              <td>&nbsp;</td>
                              <td align="left"  class="narmal">Country&nbsp;</td>
                              <td align="left">:</td>
                              <td align="left"><span class="narmal"><?php echo $staffdetails['st_prcountry']; ?></span></td>
                              <td  class="narmal" align="left">Post Code</td>
                              <td align="left">:</td>
                              <td align="left"><span class="narmal"><?php echo $staffdetails['st_prpincode']; ?></span></td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                              <td align="left"  class="narmal">Phone No </td>
                              <td align="left">:</td>
                              <td align="left"><span class="narmal"><?php echo $staffdetails['st_prphonecode']; ?></span></td>
                              <td  class="narmal" align="left">Mobile </td>
                              <td align="left">:</td>
                              <td align="left"><span class="narmal"><?php echo $staffdetails['st_prmobno']; ?></span></td>
                            </tr>
                            <tr>
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
                        <td colspan="8" valign="top">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td height="25" colspan="7" class="bgcolor_02"><strong>&nbsp;&nbsp;<span class="admin">Permanent</span> Address</strong></td>
                            </tr>
                            <tr>
                              <td width="4%">&nbsp;</td>
                              <td width="17%" align="left"  class="narmal">Addres</td>
                              <td width="4%" align="left">:</td>
                              <td width="22%" align="left" class="narmal"><?php echo $staffdetails['st_peadress']; ?></td>
                              <td width="17%" align="left" class="narmal">&nbsp;</td>
                              <td width="2%" align="left" class="narmal">&nbsp;</td>
                              <td width="34%" align="left" class="narmal">&nbsp;</td>
                            </tr>
                            <tr>
                              <td class="narmal">&nbsp;</td>
                              <td align="left"  class="narmal">City</td>
                              <td align="left" class="narmal">:</td>
                              <td align="left" class="narmal"><?php echo $staffdetails['st_pecity']; ?></td>
                              <td  class="narmal" align="left">State</td>
                              <td align="left" class="narmal">:</td>
                              <td align="left" class="narmal"><?php echo $staffdetails['st_pestate']; ?></td>
                            </tr>
                        
                            <tr>
                              <td  class="narmal">&nbsp;</td>
                              <td align="left"  class="narmal">Country</td>
                              <td align="left" class="narmal">:</td>
                              <td align="left" class="narmal"><?php echo $staffdetails['st_pecountry']; ?></td>
                              <td  class="narmal" align="left">Post Code</td>
                              <td align="left" class="narmal" >:</td>
                              <td align="left" class="narmal" ><?php echo $staffdetails['st_pepincode']; ?></td>
                            </tr>
                            <tr>
                              <td  class="narmal">&nbsp;</td>
                              <td align="left"  class="narmal">Phone No </td>
                              <td align="left" class="narmal">:</td>
                              <td align="left" class="narmal"><?php echo $staffdetails['st_pephoneno']; ?></td>
                              <td  class="narmal" align="left">Mobile</td>
                              <td align="left" class="narmal" >:</td>
                              <td align="left" class="narmal" ><?php echo $staffdetails['st_pemobileno']; ?></td>
                            </tr>
                            <tr>
                              <td class="narmal">&nbsp;</td>
                              <td class="narmal">&nbsp;</td>
                              <td class="narmal">&nbsp;</td>
                              <td class="narmal">&nbsp;</td>
                              <td class="narmal">&nbsp;</td>
                              <td class="narmal">&nbsp;</td>
                              <td class="narmal">&nbsp;</td>
                            </tr>
							 <tr height="1" class="bgcolor_02">
                              <td colspan="7">							  </td>
						    </tr>
                           
                        </table></td>
                      </tr>
                      <tr>                       
                        <td colspan="8" valign="top"><table width="100%" border="1" cellspacing="0" cellpadding="0" class="tbl_grid" align="center">
                    <tr>
                              <td width="7%" height="20" align="left" class="bgcolor_02"><strong>&nbsp;S No </strong></td>
                              <td width="38%" align="center" class="bgcolor_02">
							  <strong>Reference</strong></td>
                            <td width="20%" align="center" class="bgcolor_02"><strong>&nbsp;&nbsp;Designation </strong></td>
                            <td width="20%" align="center" class="bgcolor_02"><strong>&nbsp;&nbsp;Institute</strong></td>
                            <td width="15%" align="center" class="bgcolor_02">&nbsp;<strong>E-mail</strong> </td>
                          </tr>
                            <tr>
                     <td class="narmal">1</td>
                     <td align="center" class="narmal"><?php echo $staffdetails['st_refposname1']; ?></td>
                     <td align="center" class="narmal"><?php echo $staffdetails['st_refdesignation1']; ?></td>
                     <td align="center" class="narmal"><?php echo $staffdetails['st_refinsititute1']; ?></td>
                     <td align="center" class="narmal"><?php echo $staffdetails['st_refemail1']; ?></td>
                          </tr>
                            <tr>
                         <td class="narmal">2</td>
                         <td align="center" class="narmal"><?php echo $staffdetails['st_refposname2']; ?></td>
                         <td align="center" class="narmal"><?php echo $staffdetails['st_refdesignation2']; ?></td>
                         <td align="center" class="narmal"><?php echo $staffdetails['st_refinsititute2']; ?></td>
                         <td align="center" class="narmal"><?php echo $staffdetails['st_refemail2']; ?></td>
                          </tr>
                            <tr>
                           <td class="narmal">3</td>
                           <td align="center" class="narmal"><?php echo $staffdetails['st_refposname3']; ?></td>
                           <td align="center" class="narmal"><?php echo $staffdetails['st_refdesignation3']; ?></td>
                           <td align="center" class="narmal"><?php echo $staffdetails['st_refinsititute3']; ?></td>
                           <td align="center" class="narmal"><?php echo $staffdetails['st_refemail3']; ?></td>
                          </tr>
                            <tr>
                              <td colspan="5" ></td>
                            </tr>
                        </table></td>
                      </tr>					 
                      <tr>
                        <td valign="top">&nbsp;</td>
                        <td colspan="6" align="center" valign="top" class="narmal">&nbsp;</td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">&nbsp;</td>
                  </tr>
                </table></td>
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
// End of View Profile	

// Edit Profile
	if($action=='editprofile' && $back=="")
	{
?>
<script type="text/javascript">
function newWindowOpen(href)
{
    window.open(href,null, 'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');

}
</script>	
<script type="text/javascript">
/************ Checking Browsers ***********/
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

/** Completed checking Browser.. **/
/************ Get List of Districts ***********/
		function getsubjects(countryid,selval)
		{   
			url="?pid=16&action=classwisebatch&cid="+countryid+"&selval="+selval;
			url=url+"&sid="+Math.random();
			xmlHttp=GetXmlHttpObject(countryChanged);
			xmlHttp.open("GET", url, true);
			xmlHttp.send(null);
		}
		function countryChanged()
		{
			if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
			{
				//document.getElementById("subjectselectbox").innerHTML=xmlHttp.responseText
			}
		}
</script>			
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
         <td height="3" colspan="3"></td>
	 </tr>
	  <tr>
		<td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">My Profile</span></td>
	  </tr>
	  <tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="center" valign="top">
		<form method="post" action="" name="updateprofile" enctype="multipart/form-data">		
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
                       <tr>
                        <td width="6%">&nbsp;</td>
                        <td align="left" width="20%" class="narmal"> Staff Id</td>
                        <td align="left" width="1%">:</td>
                        <td align="left" width="47%" class="narmal">ST<?php echo $staffdetails['es_staffid']; ?></td>
                       
				<td width="26%" colspan="4"  align="center" ></td>
                      </tr>
					  <tr>
                        <td align="left" width="6%">&nbsp;</td>
                        <td align="left" width="20%" class="narmal"> First&nbsp;Name </td>
                        <td align="left" width="1%">:</td>
                        <td align="left" width="47%" class="narmal"><input type="text" name="st_firstname" value="<?php echo $staffdetails['st_firstname']; ?>" /></td>
                       
				<td width="26%" colspan="4" rowspan="10" align="center" ><?php if($staffdetails['image']!="") { 
						echo displayimage($staffdetails['image'], "140"); } ?><input type="hidden" value="<?php echo $staffdetails['image']; ?>" name="image" /></td>
                      </tr>
                      <tr>
                        <td align="left">&nbsp;</td>
                        <td align="left" class="narmal">Last&nbsp;Name </td>
                        <td align="left">:</td>
                        <td align="left" class="narmal"><input type="text" name="st_lastname" value="<?php echo $staffdetails['st_lastname']; ?>" /></td>
                      </tr>
                      <tr>
                        <td align="left">&nbsp;</td>
                        <td align="left" class="narmal">Gender</td>
                        <td align="left">:</td>
                        <td align="left" class="narmal"><?php echo $staffdetails['st_gender']; ?></td>
                      </tr>
                      <tr>
                        <td align="left">&nbsp;</td>
                        <td align="left" class="narmal">Date Of Birth </td>
                        <td align="left">:</td>
                        <td align="left" class="narmal"><input type="text" name="st_dob" value="<?php echo $staffdetails['st_dob']; ?>"  /></td>
                      </tr>
                      <tr>
                        <td align="left">&nbsp;</td>
                        <td align="left" class="narmal">Post Applied For </td>
                        <td align="left">:</td>
                        <td align="left" class="narmal"><?php echo $staffdetails['st_postaplied']; ?></td>
                      </tr>	
					   <tr>
                        <td align="left">&nbsp;</td>
                        <td align="left" class="narmal">User Name</td>
                        <td align="left">:</td>
                        <td align="left" class="narmal"><input type="text" name="st_username" value="<?php echo $staffdetails['st_username']; ?>"  /></td>
                      </tr>	
					  <?php 
					  $psubjects = explode(",", $staffdetails['st_primarysubject']);
					  ?>				   
					 <tr>
                        <td align="left">&nbsp;</td>
                        <td align="left" class="narmal">Primary Subject </td>
                        <td align="left">:</td>
                        <td align="left" class="narmal"><input type="text" name="st_primarysubject1" value="<?php echo $psubjects[0]; ?>"  /></td>
                      </tr>
					  <tr>
                        <td align="left">&nbsp;</td>
                        <td align="left" class="narmal">Secondary Subject</td>
                        <td align="left">:</td>
                        <td align="left" class="narmal"><input type="text" name="st_primarysubject2" value="<?php echo $psubjects[1]; ?>"  /></td>
                      </tr>
                      
                      <tr>
                        <td align="left">&nbsp;</td>
                        <td align="left" class="narmal">fathers/Husband Name </td>
                        <td align="left">:</td>
                        <td align="left" class="narmal"><input type="text" name="st_fatherhusname" value="<?php echo $staffdetails['st_fatherhusname']; ?>"  /></td>
                      </tr>
                      <tr>
                        <td align="left">&nbsp;</td>
                        <td align="left" class="narmal">No Of Daughters </td>
                        <td align="left">:</td>
                        <td align="left" class="narmal"><input type="text" name="st_noofdughters" value="<?php echo $staffdetails['st_noofdughters']; ?>"  /></td>
                      </tr>
                      <tr>
                        <td align="left">&nbsp;</td>
                        <td align="left" class="narmal">No Of Sons </td>
                        <td align="left">:</td>
                        <td align="left" colspan="4" class="narmal"><input type="text" name="st_noofsons" value="<?php echo $staffdetails['st_noofsons']; ?>"  /></td>
                      </tr>					 
                      <tr>
                        <td align="left" valign="top">&nbsp;</td>
                        <td align="left" valign="top" class="narmal">Email</td>
                        <td align="left" valign="top">:</td>
                        <td align="left" colspan="4" valign="top" class="narmal"><input type="text" name="st_email" value="<?php echo $staffdetails['st_email']; ?>"  /></td>
                      </tr>
					  <tr>
                        <td align="left" valign="top">&nbsp;</td>
                        <td align="left" valign="top" class="narmal">Photo</td>
                        <td align="left" valign="top">:</td>
                        <td align="left" colspan="4" valign="top" class="narmal"><input type="file" name="st_newimage" /></td>
                      </tr>
					  <tr height="1" class="bgcolor_02">
                              <td align="left" colspan="8">							  </td>
						    </tr>                     
                      <tr>
                        <td align="left">&nbsp;</td>
                        <td align="left" class="narmal"><strong>Qualification</strong></td>
                        <td align="left">&nbsp;</td>
                        <td align="left" colspan="4">&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="left" colspan="8"><table width="100%" border="1" cellspacing="0" cellpadding="0" class="tbl_grid">
                        <tr>
                              <td align="left" width="7%" height="20" class="bgcolor_02"><strong>&nbsp;S No </strong></td>
                              <td align="center" width="31%" class="bgcolor_02"><strong>&nbsp;&nbsp;&nbsp;Exam Passed </strong></td>
                              <td align="center" width="35%" class="bgcolor_02"><strong>&nbsp;&nbsp;Board / University </strong></td>
                              <td align="center" width="27%" class="bgcolor_02"><strong>&nbsp;&nbsp;Year</strong></td>
                          </tr>
                            <tr>
                              <td align="left" class="narmal">1</td>
                              <td align="left" class="narmal"><?php echo $staffdetails['st_examp1']; ?></td>
                              <td align="left" class="narmal"><?php echo $staffdetails['st_borduniversity1']; ?></td>
                              <td align="left" class="narmal"><?php echo $staffdetails['st_year1']; ?></td>
                            </tr>
                            <tr>
                              <td align="left" class="narmal">2</td>
                              <td align="left" class="narmal"><?php echo $staffdetails['st_examp2']; ?></td>
                              <td align="left" class="narmal"><?php echo $staffdetails['st_borduniversity2']; ?></td>
                              <td align="left" class="narmal"><?php echo $staffdetails['st_year2']; ?></td>
                            </tr>
                            <tr>
                             <td align="left" class="narmal">3</td>
                             <td align="left" class="narmal"><?php echo $staffdetails['st_examp3']; ?></td>
                             <td align="left" class="narmal"><?php echo $staffdetails['st_borduniversity1']; ?></td>
                             <td align="left" class="narmal"><?php echo $staffdetails['st_year3']; ?></td>
                            </tr>
                            <tr>
                              <td align="left" colspan="4" class="narmal">&nbsp;</td>
                            </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td align="left">&nbsp;</td>
                        <td align="left" class="narmal"><strong>Experience</strong></td>
                        <td align="left">:</td>
                        <td align="left" colspan="4">&nbsp;</td>
                      </tr>
                      <tr>
                       
                        <td align="left" colspan="8"><table width="100%" border="1" cellspacing="0" cellpadding="0" class="tbl_grid">
                          <tr>
                            <td align="left" width="7%" height="20" class="bgcolor_02"><strong>&nbsp;S No </strong></td>
                            <td align="center" width="31%" class="bgcolor_02"><strong>&nbsp;&nbsp;Institution</strong></td>
                            <td align="center" width="35%" class="bgcolor_02"><strong>&nbsp;&nbsp;&nbsp;Position</strong></td>
                            <td align="center" width="27%" class="bgcolor_02"><strong>Period</strong></td>
                          </tr>
                          <tr>
                            <td align="left" class="narmal">1</td>
                            <td align="left" class="narmal"><?php echo $staffdetails['st_insititute1']; ?></td>
                            <td align="left" class="narmal"><?php echo $staffdetails['st_position1']; ?></td>
                            <td align="left" class="narmal"><?php echo $staffdetails['st_period1']; ?></td>
                          </tr>
                          <tr>
                            <td align="left" class="narmal">2</td>
                            <td align="left" class="narmal"><?php echo $staffdetails['st_insititute2']; ?></td>
                            <td align="left" class="narmal"><?php echo $staffdetails['st_position2']; ?></td>
                            <td align="left" class="narmal"><?php echo $staffdetails['st_period2']; ?></td>
                          </tr>
                          <tr>
                            <td align="left" class="narmal">3</td>
                            <td align="left" class="narmal"><?php echo $staffdetails['st_insititute3']; ?></td>
                            <td align="left" class="narmal"><?php echo $staffdetails['st_position3']; ?></td>
                            <td align="left" class="narmal"><?php echo $staffdetails['st_period3']; ?></td>
                          </tr>
                          <tr>
                            <td align="left" colspan="4" class="narmal">&nbsp;</td>
                          </tr>
                        </table></td>
                      </tr>
                      <tr>
                         <td align="left" colspan="8" valign="top" ><table width="100%" border="0" cellspacing="3" cellpadding="0" class="tbl_grid">
                            <tr>
                              <td align="left" height="25" colspan="8" class="bgcolor_02"><strong>&nbsp;&nbsp;Present Address</strong></td>
                            </tr>
                            <tr>
                              <td align="left" width="2%">&nbsp;</td>
                              <td align="left" width="19%"  class="narmal">Addres</td>
                              <td align="left" width="2%">:</td>
                              <td align="left" width="15%"  class="narmal"><input type="text" name="st_pradress" value="<?php echo $staffdetails['st_pradress']; ?>"  /></td>
                              <td align="left" width="9%">&nbsp;</td>
                              <td align="left" width="20%">&nbsp;</td>
                              <td align="left" width="18%">&nbsp;</td>
                              <td align="left" width="15%">&nbsp;</td>
                            </tr>
                            <tr>
                              <td align="left">&nbsp;</td>
                              <td align="left"  class="narmal">City</td>
                              <td align="left">:</td>
                              <td align="left"><span class="narmal"><input type="text" name="st_prcity" value="<?php echo $staffdetails['st_prcity']; ?>"  /></span></td>
                              <td align="left"  class="narmal">State&nbsp;:</td>
                              <td align="left"><span class="narmal"><input type="text" name="st_prstate" value="<?php echo $staffdetails['st_prstate']; ?>"  /></span></td>
                              <td align="left"  class="narmal">Country&nbsp;:</td>
                              <td align="left"><span class="narmal"><input type="text" name="st_prcountry" value="<?php echo $staffdetails['st_prcountry']; ?>"  /></span></td>
                            </tr>
                            <tr>
                              <td align="left">&nbsp;</td>
                              <td align="left"  class="narmal">Post Code </td>
                              <td align="left">:</td>
                              <td align="left" colspan="5"><span class="narmal"><input type="text" name="st_prpincode" value="<?php echo $staffdetails['st_prpincode']; ?>"  /></span></td>
                            </tr>
                            <tr>
                              <td align="left">&nbsp;</td>
                              <td align="left"  class="narmal">Phone No </td>
                              <td align="left">:</td>
                              <td align="left"><span class="narmal"><input type="text" name="st_prphonecode" value="<?php echo $staffdetails['st_prphonecode']; ?>"  /></span></td>
                              <td align="left"  class="narmal">Resi&nbsp;No&nbsp;: </td>
                              <td align="left"><span class="narmal"><input type="text" name="st_prresino" value="<?php echo $staffdetails['st_prresino']; ?>"  /></span></td>
                              <td align="left"  class="narmal">Mob No : </td>
                              <td align="left"><span class="narmal"><input type="text" name="st_prmobno" value="<?php echo $staffdetails['st_prmobno']; ?>"  /></span></td>
                            </tr>
                            <tr>
                              <td align="left">&nbsp;</td>
                              <td align="left">&nbsp;</td>
                              <td align="left">&nbsp;</td>
                              <td align="left">&nbsp;</td>
                              <td align="left">&nbsp;</td>
                              <td align="left">&nbsp;</td>
                              <td align="left">&nbsp;</td>
                              <td align="left">&nbsp;</td>
                            </tr>
                        </table></td>
                      </tr>
                      <tr>                        
                        <td align="left" colspan="8" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td align="left" height="25" colspan="8" class="bgcolor_02"><strong>&nbsp;&nbsp;<span class="admin">Permanent</span> Address</strong></td>
                            </tr>
                            <tr>
                              <td align="left" width="2%">&nbsp;</td>
                              <td align="left" width="19%"  class="narmal">Addres</td>
                              <td align="left" width="2%">:</td>
                              <td align="left" class="narmal" width="15%"><input type="text" name="st_peadress" value="<?php echo $staffdetails['st_peadress']; ?>"  /></td>
                              <td align="left" class="narmal" width="8%">&nbsp;</td>
                              <td align="left" class="narmal" width="21%">&nbsp;</td>
                              <td align="left" class="narmal" width="18%">&nbsp;</td>
                              <td align="left" class="narmal" width="15%">&nbsp;</td>
                            </tr>
                            <tr>
                              <td align="left" class="narmal">&nbsp;</td>
                              <td align="left"  class="narmal">City</td>
                              <td align="left" class="narmal">:</td>
                              <td align="left" class="narmal"><input type="text" name="st_pecity" value="<?php echo $staffdetails['st_pecity']; ?>"  /></td>
                              <td align="left"  class="narmal">State&nbsp;:</td>
                              <td align="left" class="narmal"><input type="text" name="st_pestate" value="<?php echo $staffdetails['st_pestate']; ?>"  /></td>
                              <td align="left"  class="narmal">Country&nbsp;: </td>
                              <td align="left" class="narmal"><input type="text" name="st_pecountry" value="<?php echo $staffdetails['st_pecountry']; ?>"  /></td>
                            </tr>
                            <tr>
                              <td align="left" class="narmal">&nbsp;</td>
                              <td align="left"  class="narmal">Post Code </td>
                              <td align="left" class="narmal">:</td>
                              <td align="left" class="narmal" colspan="5"><input type="text" name="st_pepincode" value="<?php echo $staffdetails['st_pepincode']; ?>"  /></td>
                            </tr>
                            <tr>
                              <td align="left"  class="narmal">&nbsp;</td>
                              <td align="left"  class="narmal">Phone No </td>
                              <td align="left" class="narmal">:</td>
                              <td align="left" class="narmal"><input type="text" name="st_pephoneno" value="<?php echo $staffdetails['st_pephoneno']; ?>"  /></td>
                              <td align="left"  class="narmal">Resi&nbsp;No&nbsp;: </td>
                              <td align="left" class="narmal" ><input type="text" name="st_peresino" value="<?php echo $staffdetails['st_peresino']; ?>"  /></td>
                              <td align="left"  class="narmal">Mob No : </td>
                              <td align="left" class="narmal"><input type="text" name="st_pemobileno" value="<?php echo $staffdetails['st_pemobileno']; ?>"  /></td>
                            </tr>
                            <tr>
                              <td align="left" class="narmal">&nbsp;</td>
                              <td align="left" class="narmal">&nbsp;</td>
                              <td align="left" class="narmal">&nbsp;</td>
                              <td align="left" class="narmal">&nbsp;</td>
                              <td align="left" class="narmal">&nbsp;</td>
                              <td align="left" class="narmal">&nbsp;</td>
                              <td align="left" class="narmal">&nbsp;</td>
                              <td align="left" class="narmal">&nbsp;</td>
                            </tr>
							 <tr height="1" class="bgcolor_02">
                              <td align="left" colspan="8">							  </td>
						    </tr>
                            <tr>
                              <td align="left" height="25" colspan="8"><strong>&nbsp;&nbsp;<span class="admin">Reference Person's</span> </strong></td>
						    </tr>
                        </table></td>
                      </tr>
                      <tr>                       
                        <td align="left" colspan="8" valign="top"><table width="100%" border="1" cellspacing="0" cellpadding="0" class="tbl_grid" align="center">
                        <tr>
                              <td align="left" width="7%" height="20" class="bgcolor_02"><strong>&nbsp;S No </strong></td>
                              <td align="center" width="38%" class="bgcolor_02"><strong>Reference&nbsp;</strong></td>
                          <td align="center" width="20%" class="bgcolor_02"><strong>&nbsp;&nbsp;Designation </strong></td>
                              <td align="center" width="20%" class="bgcolor_02"><strong>&nbsp;&nbsp;Institute</strong></td>
                              <td align="center" width="15%" class="bgcolor_02">&nbsp;<strong>E-mail</strong> </td>
                          </tr>
                            <tr>
                     <td align="left" class="narmal">1</td>
                     <td align="left" class="narmal"><input type="text" name="st_refposname1" value="<?php echo $staffdetails['st_refposname1']; ?>"  /></td>
                     <td align="left" class="narmal"><input type="text" name="st_refdesignation1" value="<?php echo $staffdetails['st_refdesignation1']; ?>"  /></td>
                     <td align="left" class="narmal"><input type="text" name="st_refinsititute1" value="<?php echo $staffdetails['st_refinsititute1']; ?>"  /></td>
                     <td align="left" class="narmal"><input type="text" name="st_refemail1" value="<?php echo $staffdetails['st_refemail1']; ?>"  /></td>
                            </tr>
                            <tr>
                         <td align="left" class="narmal">2</td>
                         <td align="left" class="narmal"><input type="text" name="st_refposname2" value="<?php echo $staffdetails['st_refposname2']; ?>"  /></td>
                         <td align="left" class="narmal"><input type="text" name="st_refdesignation2" value="<?php echo $staffdetails['st_refdesignation2']; ?>"  /></td>
                         <td align="left" class="narmal"><input type="text" name="st_refinsititute2" value="<?php echo $staffdetails['st_refinsititute2']; ?>"  /></td>
                         <td align="left" class="narmal"><input type="text" name="st_refemail2" value="<?php echo $staffdetails['st_refemail2']; ?>"  /></td>
                            </tr>
                            <tr>
                           <td align="left" class="narmal">3</td>
                           <td align="left" class="narmal"><input type="text" name="st_refposname3" value="<?php echo $staffdetails['st_refposname3']; ?>"  /></td>
                           <td align="left" class="narmal"><input type="text" name="st_refdesignation3" value="<?php echo $staffdetails['st_refdesignation3']; ?>"  /></td>
                           <td align="left" class="narmal"><input type="text" name="st_refinsititute3" value="<?php echo $staffdetails['st_refinsititute3']; ?>"  /></td>
                           <td align="left" class="narmal"><input type="text" name="st_refemail3" value="<?php echo $staffdetails['st_refemail3']; ?>"  /></td>
                            </tr>
                            <tr>
                              <td align="left" colspan="5" ></td>
                            </tr>
                        </table></td>
                      </tr>					 
                      <tr>
                        <td align="left" valign="top">&nbsp;</td>
                        <td colspan="6" align="center" valign="top" class="narmal">&nbsp;</td>
                      </tr>
                      <!--<tr>
                        <td colspan="7" valign="top" align="center"><input type="submit" name="submit" value="Update" class="bgcolor_02" style="cursor:pointer" /><input type="reset" name="reset" value="Reset" class="bgcolor_02" /></td>
                      </tr>-->
					  <tr>
                        <td colspan="7" valign="top" align="center"><input name="update" type="submit" class="bgcolor_02" value="Update" style="cursor:pointer" />&nbsp;<input name="Submit" type="button" class="bgcolor_02" style="cursor:pointer" onclick="newWindowOpen ('?pid=16&amp;action=printstudent&amp;print_class=<?php echo $eachrecord1['pre_class']; ?><?php echo $studentUrl;?>');" value="Print Registration Form"/></td>
                      </tr>
					 
                    </table></form>
		</td>
		<td width="1" class="bgcolor_02"></td>
	  </tr>	  
	  <tr>
		<td height="1" colspan="3" class="bgcolor_02"></td>
		</tr>
	</table>
	
<?php	
	}
// End of Edit Profile
?>
	
	