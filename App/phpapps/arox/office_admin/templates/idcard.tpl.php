<?php
/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
header('location: ./?pid=1&unauth=0');
	exit;
}
?>

<script type="text/javascript">
function popup_letter(url) {
		 var width  = 700;
		 var height = 700;
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
		}
	
	
	
</script>

<?php if($action=='mailtoadmin'){?><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">ID Card  for Other Employees </span></td>
              </tr>	
              <tr>
                <td width="1px" class="bgcolor_02" ></td>
                <td height="25" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font><br /></td>
                 <td width="1px" class="bgcolor_02" ></td></td>
              </tr>			  
              <tr>
                <td width="1" class="bgcolor_02" height="100"></td>
                <td align="center" valign="top"><br />
				    <form name="" action="" method="post" enctype="multipart/form-data">
					<table width="96%" height="52%" border="0" cellpadding="3px" cellspacing="0">
					<tr>
					<td width="18%" class="narmal"  align="left">Name / Username</td>
					<td width="2%" align="center"><strong> :</strong></td>
					<td width="80%" height="30" align="left"><?php echo $html_obj->draw_selectfield('es_adminsid[]',$alladmins_arr,'','multiple="multiple" size="5"');?><font color="#FF0000">&nbsp;*</font><div class="normal">Use Ctrl + Mouse click for multi selection</div></td>
					</tr>
					<tr>
                      <td height="30"  align="left" valign="top" class="narmal"> ID Card Format <font color="#FF0000">&nbsp;</font></td>
					  <td height="30"  align="left" valign="top" class="narmal">:</td>
					  <td  height="30"  align="left" valign="top" class="narmal"><input type="radio" name="usertype" value="horizontal" checked="checked" />
					    &nbsp;Horizontal &nbsp;&nbsp;&nbsp;
                        <input type="radio" name="usertype" value="vertical">
					    &nbsp;Vertical</td>
					  </tr>
					<tr>
					<td width="18%" valign="top" class="narmal"  align="left"> Message </td>
					<td width="2%" valign="top"  align="center"><strong> :</strong></td>
					<td width="80%" height="30" valign="top"  align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="26%"><?php echo $html_obj->draw_textarea('message','','rows="10"');?></td>
                          <td width="74%" align="left" valign="bottom"><font color="#FF0000">&nbsp;*</font></td>
                        </tr>
                      </table></td>
					</tr>
					<tr>
					<td width="18%" valign="top" ></td>
					<td width="2%" valign="top"  align="center"></td>
					<td width="80%" height="30" valign="middle" align="left"><input type="submit" name="submit_staff" value="Send" class="bgcolor_02" style="padding-left:10px;padding-right:10px;cursor:pointer;" /></td>
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
<?php } if($action=='mailtostaff'){?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Staff ID Card</span></td>
              </tr>
              <tr>
                <td width="1px" class="bgcolor_02" ></td>
                <td height="25" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font><br /></td>
                 <td width="1px" class="bgcolor_02" ></td></td>
              </tr>				  
              <tr>
                <td width="1" class="bgcolor_02" height="100"></td>
                <td align="center" valign="top">				    <form name="" action="" method="post">
					<table width="96%" height="52%" border="0" cellpadding="3px" cellspacing="0">
					<tr>
					<td width="21%" class="narmal"  align="left">Department</td>
					<td width="1%" align="center"><strong> :</strong></td>
					<td height="30" colspan="4" align="left" class="narmal"><select name="st_department" onChange="getsubjects(this.value,'');" style=" width:150px;"  class="narmal">
							<option value="">-Select-</option>
							<?php foreach($getdeptlist as $eachrecord1) {  ?>
							<option value="<?php echo $eachrecord1["es_departmentsid"];?>" <?php if(isset($st_department) && $st_department==$eachrecord1["es_departmentsid"]){ echo "selected='selected'";}?>  ><?php echo $eachrecord1["es_deptname"];?></option>
						<?php } ?>
						</select>&nbsp;<font color="#FF0000">*</font></td>
					</tr>

					<tr>
					<td width="21%" class="narmal"  align="left">Post</td>
					<td width="1%" align="center"><strong> :</strong></td>
					<td height="30" colspan="4" align="left" id="subjectselectbox"><select name="es_deptpostsid" style=" width:150px;"  class="narmal">
                              <option value="">- Select -</option></select>&nbsp;<font color="#FF0000">*</font></td>
					</tr>

					<tr>
					<td width="21%" class="narmal"  align="left">
					<?php if($st_department!=""){
					
					 ?>
<script type="text/javascript">
getsubjects('<?php echo $st_department; ?>','<?php echo $es_deptpostsid;?>');
</script>
<?php } ?>
					Name </td>
					<td width="1%" align="center"><strong> :</strong></td>
					<td height="30" colspan="4" align="left" id="subject2selectbox"><select multiple="multiple" size="5" style=" width:150px;"></select>&nbsp;<font color="#FF0000">*</font><div class="normal">Use Ctrl + Mouse click for multi selection</div></td>
					</tr>
<?php if($es_deptpostsid!=""){ ?>
<script type="text/javascript">
getallsubjects('<?php echo $es_deptpostsid; ?>','<?php echo $st_department; ?>')
</script>
<?php } ?>
					<tr>
					<td height="30"  align="left" valign="top" class="narmal"> ID Card Format <font color="#FF0000">&nbsp;</font></td>
					<td height="30"  align="left" valign="top" class="narmal">:</td>
					<td width="78%"  height="30"  align="left" valign="top" class="narmal"><input type="radio" name="formattype" value="horizontal" checked="checked">&nbsp;Horizontal &nbsp;&nbsp;&nbsp;
					<input type="radio" name="formattype" value="vertical" <?php if($formattype=='vertical'){echo "checked='checked'";} ?>  />&nbsp;Vertical</td>
					
					</tr>
					
					<tr>
					<td width="21%" valign="top" ></td>
					<td width="1%" valign="top"  align="center"></td>
					<td height="30" colspan="4" align="left" valign="middle">
					<?php if(in_array('32_1',$admin_permissions)){?><input type="submit" name="submit_staff" value="Submit" class="bgcolor_02" style="padding-left:10px;padding-right:10px;cursor:pointer; height:20px;" /><?php }?>
					</td>
					</tr>
					<?php if($formattype=='horizontal' && count($es_staffid)>=1){
					
					for($i=0;$i<count($es_staffid);$i++)
					{ $sql="select * from es_staff s,es_departments d where s.st_department=d.es_departmentsid and s.es_staffid=".$es_staffid[$i];
						$result=$db->getrow($sql);
						//$db->update("es_staff","selstatus='issued'",'es_staffid='.$es_staffid[$i]);
						$image="select * from es_idcard_image";
						$cardimage=$db->getrow($image);
					?>
					
		<tr>
					<td  colspan="3" align="center" valign="top" >
					  <table width="280" height="200" border="1" style="background-image:url('images/idcard_images/<?php echo $cardimage['horizontal_image']; ?>'); background-repeat:no-repeat;">
                        <tr>
                          <td colspan="2"  align="center" valign="top" style="border:none" class="narmal"><strong><?php echo $compdetails_school['fi_schoolname'] ;  ?></strong></td>
                        </tr>
                        <tr>
                          <td width="22%" style="border:none"><img height="70" border="0" width="70" src="./images/staff/<?php echo $result['image']; ?>"/></td>
                          <td width="78%"  style="border:none; padding-left:5px;"><table width="100%" border="0">
                            <tr>
                              <td align="left" valign="middle"><span style="border:none"><?php echo $result['st_firstname']."&nbsp;".$result['st_lastname']; ?></span></td>
                            </tr>
                          
                            <tr>
                              <td align="left" valign="middle"><span style="border:none"><?php echo postname($result['st_post']); ?></span></td>
                            </tr>
                            <tr>
                              <td  align="left" valign="middle"><span style="border:none"><?php echo $result['es_staffid'];  ?></span></td>
                            </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td colspan="2" align="right" valign="middle" style="border:none" class="narmal"><strong>Issuing Authority</strong></td>
                        </tr>
                      </table></td>
					</tr>
					
					
	
					<tr>
					<td colspan="3" valign="top" align="center" >&nbsp;</td>
					</tr>
					<?php }?>
					<tr>
					<td colspan="3" valign="top" align="right" style="padding-right:10px;"> 
					
					
					<?php if (in_array("32_4", $admin_permissions)) {?>
                    
                   &nbsp; <a href="javascript: void(0)" onclick="popup_letter('?pid=72&action=print_staff_hid&idstr=<?php echo $idstr;?>')" style="text-decoration:none; padding:3px;" class="bgcolor_02" >Print</a><?php }?></td>
					</tr>
					
					<?php }?>
					<?php if($formattype=='vertical' && count($es_staffid)>=1){
					
					for($i=0;$i<count($es_staffid);$i++)
					{ $sql="select * from es_staff s,es_departments d where s.st_department=d.es_departmentsid and s.es_staffid=".$es_staffid[$i];
						$result=$db->getrow($sql);
						//array_print($result);
						//$db->update("es_staff","selstatus='issued'",'es_staffid='.$es_staffid[$i]);
						$image="select * from es_idcard_image";
						$cardimage=$db->getrow($image);
					?>
					
					<tr>
					<td  colspan="3" align="center" valign="top" >
					  <table width="190" height="270" border="1" cellspacing="0" cellpadding="0" style="background-image:url('images/idcard_images/<?php echo $cardimage['vertical_image']; ?>'); background-repeat:no-repeat;">
                        <tr>
                          <td style="border:none" height="30px" valign="middle" align="center"><strong><?php echo $compdetails_school['fi_schoolname'] ; ?></strong></td>
                        </tr>
                        <tr>
                          <td  style=" border:none; padding-top:20px;"  align="center" colspan="3" valign="top"><table width="190" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center"><img height="85" border="0" width="85" src="./images/staff/<?php echo $result['image']; ?>"/></td>
  </tr>
       <tr>
				
						  <td   align="center" valign="top" style="border:none">&nbsp;</td>
					
					  </tr>
  <tr>
    <td align="center"><span style="border:none"><?php echo $result['st_firstname']."&nbsp;".$result['st_lastname']; ?></span></td>
  </tr>
  <tr>
    <td align="center"><span style="border:none"><?php echo postname($result['st_post']); ?></span></td>
  </tr>
  <tr>
    <td align="center"><span style="border:none"><?php echo $result['es_staffid'];  ?></span></td>
  </tr>
  
     <tr>
                          <td colspan="3" align="right" valign="bottom" style="border:none; padding-right:5px;" height="60"><strong>Issuing Authority</strong></td>
                        </tr>
</table>
</td>
                        </tr>	  
                     
                      </table></td>
					</tr>
					
				<?php }?>
					<tr>
					<td colspan="3" valign="top" align="right" style="padding-right:10px;">				
					<?php if (in_array("32_4", $admin_permissions)) {?>
                    
                     <a href="javascript: void(0)" onclick="popup_letter('?pid=72&action=print_staff_vid&idstr=<?php echo $idstr;?>')" style="text-decoration:none; padding:3px;" class="bgcolor_02" >Print</a><?php }?>
</td>
					</tr>
					
					<?php }?>
					</table>
					
					</form>						
				</td>
                <td width="1" class="bgcolor_02"></td>
  </tr>
              
              <tr>
                <td height="2" colspan="3" class="bgcolor_02"></td>
              </tr>
</table>
<?php } if($action=='mailtostudents'){?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Student ID Card </span></td>
              </tr>			  
              <tr>
                <td width="1px" class="bgcolor_02" ></td>
                <td height="25" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font><br /></td>
                 <td width="1px" class="bgcolor_02" ></td></td>
              </tr>	
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td  align="center" valign="top"><br />
				    <form name="sendmailtostudents" action="" method="post">
					<table width="96%" height="52%" border="0" cellpadding="3px" cellspacing="0" >
					
					<tr>
					<td width="24%" class="narmal"  align="left">Class</td>
					<td width="1%" align="center" class="narmal"><strong> :</strong></td>
					<td width="75%" height="30" align="left"><?php echo $html_obj->draw_selectfield('es_classesid',$class_list,'','onchange="JavaScript:document.sendmailtostudents.submit();" style=" width:150px;" class="narmal"');?><font color="#FF0000">&nbsp;*</font></td>
					</tr>
					<tr>
					<td height="30" class="narmal"  align="left"> Student [Registration #] </td>
                    <?php //print_r($students_list);  ?>
					<td width="1%" align="center" class="narmal"><strong> :</strong></td>
					<td  align="left" class="narmal">
					<?php echo $html_obj->draw_multiple_selectfield('es_preadmissionid[]',$students_list,$es_preadmissionid,'size="5" style=" width:150px;"class="narmal"');?>
					
					<?php /*?><select name="es_preadmissionid[]" style="width:250px;" multiple="multiple" size="5">
						<option value="" >Select Student</option>
						
						<?php 
						if (count($allstudents)>0){
						 if($es_preadmissionid == "all"){$sel = 'selected';}else{$sel="";}
						
						foreach($allstudents as $eachstd){
						?>
						
						<option value="<?php echo $eachstd['es_preadmissionid']; ?>"   <?php echo ($eachstd['es_preadmissionid']==$es_preadmissionid)?"selected":""?> ><?php echo $eachstd['pre_name']. '&nbsp;&lt;'.$eachstd['pre_student_username'].'&gt;'; ?></option>
						<?php
						}
						}
						?></select><?php */?><font color="#FF0000">&nbsp;*</font><div class="normal">Use Ctrl + Mouse click for multi selection</div></td>
					</tr>
					
					<tr>
                      <td height="30"  align="left" valign="top" class="narmal"> ID Card Format <font color="#FF0000">&nbsp;</font></td>
					  <td height="30"  align="left" valign="top" class="narmal">:</td>
					  <td  height="30"  align="left" valign="top" class="narmal"><input type="radio" name="s_format" value="horizontal" checked="checked" />
					    &nbsp;Horizontal &nbsp;&nbsp;&nbsp;
                        <input type="radio" name="s_format" value="vertical" <?php if($s_format=='vertical'){echo "checked='checked'";} ?>>
					    &nbsp;Vertical</td>
					  </tr>
					
					<tr>
					<td width="24%" valign="top" ></td>
					<td width="1%" valign="top" align="center"></td>
					<td width="75%" height="30" valign="top" align="left">
					<?php if(in_array('32_2',$admin_permissions)){?>
					<input type="submit" name="submit_student" value="Submit" class="bgcolor_02" style="padding-left:10px;padding-right:10px;cursor:pointer; height:20px;"/><?php }?>
					</td>
					</tr>
					
					<?php 
					if($s_format=='horizontal'){ 
					 if(count($errormessage)==0 && isset($submit_student)){
					
					for($i=0;$i<count($es_preadmissionid);$i++)
					{ 
						 $sql_stud="select * from es_preadmission as p,es_classes as c where p.pre_class=c.es_classesid and p.es_preadmissionid=".$es_preadmissionid[$i];
						
						$result=$db->getrow($sql_stud);
						$image="select * from es_idcard_image";
						$cardimage=$db->getrow($image);
						
					?>
					
					
					
					<tr>
					<td height="125" colspan="3" align="center" valign="top" >
					<table width="280" height="200" border="1" style="background-image:url('images/idcard_images/<?php echo $cardimage['horizontal_image']; ?>'); background-repeat:no-repeat;">
                        <tr>
                          <td colspan="2"  align="center" valign="top" style="border:none" class="narmal"><strong><?php echo $compdetails_school['fi_schoolname'] ;  ?></strong></td>
                        </tr>
                        <tr>
                          <td width="22%" style="border:none"><img height="70" border="0" width="70" src="./images/student_photos/<?php echo $result['pre_image']; ?>"/></td>
                          <td width="78%"  style="border:none; padding-left:5px;"><table width="100%" border="0">
                            <tr>
                              <td align="left" valign="middle"><span style="border:none"><?php echo $result['pre_name']; ?></span></td>
                            </tr>
                          
                            <tr>
                              <td align="left" valign="middle"><span style="border:none">Class-<?php echo $result['es_classname']; ?></span></td>
                            </tr>
                            <tr>
                              <td  align="left" valign="middle"><span style="border:none">Reg Id-<?php echo $result['es_preadmissionid'];  ?></span></td>
                            </tr>
							 <tr>
                              <td  align="left" valign="middle"><span style="border:none">Roll No.-<?php
							  $online_sql="select * from es_sections_student where student_id=".$result['es_preadmissionid'];
	                                    $online_row=$db->getRow($online_sql);
									if($online_row['roll_no']!=''){ echo $online_row['roll_no'];} else { echo "---";}   ?></span></td>
                            </tr>
							   <tr>
                              <td  align="left" valign="middle"><span style="border:none">DOB:<?php echo func_date_conversion("Y-m-d","d/m/Y",$result['pre_dateofbirth']); ?></span></td>
                            </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td colspan="2" align="right" valign="middle" style="border:none" class="narmal"><strong>Issuing Authority</strong></td>
                        </tr>
                      </table>
					
					
					</td>
					</tr>
					<tr>
					<td colspan="3" valign="top" align="center" >&nbsp;					</td>
					</tr>
					<?php }?>
					<tr>
					<td colspan="3" valign="top" align="right" style="padding-right:10px;"> 
					<?php if(in_array('32_5',$admin_permissions)){?>
                    
                    <a href="javascript: void(0)" onclick="popup_letter('?pid=72&action=print_student_hid&idstr=<?php echo $idstr;?>')" style="text-decoration:none; padding:3px;" class="bgcolor_02" >Print</a><?php }?>

             
					</td>
					</tr>
					<?php
					
					 } ?>
					
					
				<?php } ?>	
				<?php 
					if($s_format=='vertical'){ 
					 if(count($errormessage)==0){
					
					for($i=0;$i<count($es_preadmissionid);$i++)
					{ 
						 $sql_stud="select * from es_preadmission as p,es_classes as c where p.pre_class=c.es_classesid and p.es_preadmissionid=".$es_preadmissionid[$i];
						
						$result=$db->getrow($sql_stud);
						$image="select * from es_idcard_image";
						$cardimage=$db->getrow($image);
						
					?>
					
					
					
					<tr>
					<td height="200" colspan="3" align="center" valign="top" >
					<table width="190" height="270" border="1" cellspacing="0" cellpadding="0" style="background-image:url('images/idcard_images/<?php echo $cardimage['vertical_image']; ?>'); background-repeat:no-repeat;">
                        <tr>
                          <td style="border:none" height="30px" valign="middle" align="center"><strong><?php echo $compdetails_school['fi_schoolname'] ; ?></strong></td>
                        </tr>
                        <tr>
                          <td  style=" border:none; padding-top:20px;"  align="center" colspan="3" valign="top"><table width="190" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center"><img height="85" border="0" width="85" src="./images/student_photos/<?php echo $result['pre_image']; ?>"/></td>
  </tr>
       <tr>
				
						  <td   align="center" valign="top" style="border:none">&nbsp;</td>
					
					  </tr>
  <tr>
    <td align="center"><span style="border:none"><?php echo $result['pre_name']; ?></span></td>
  </tr>
  <tr>
    <td align="center"><span style="border:none">Class-<?php echo $result['es_classname']; ?></span></td>
  </tr>
  <tr>
    <td align="center"><span style="border:none">Reg No.-<?php echo $result['es_preadmissionid'];  ?></span></td>
  </tr>
    <tr>
    <td align="center"><span style="border:none">Roll No.-<?php 	
							  $online_sql="select * from es_sections_student where student_id=".$result['es_preadmissionid'];
	                                    $online_row=$db->getRow($online_sql);
									
									
									if($online_row['roll_no']!=''){ echo $online_row['roll_no'];} else { echo "---";}   ?></span></td>
  </tr>
  
  
  <tr>
    <td align="center"><span style="border:none">DOB:<?php echo func_date_conversion("Y-m-d","d/m/Y",$result['pre_dateofbirth']); ?></span></td>
  </tr>
  
     <tr>
                          <td colspan="3" align="right" valign="bottom" style="border:none; padding-right:5px;" height="60"><strong>Issuing Authority</strong></td>
                        </tr>
</table>
</td>
                        </tr>	  
                     
                      </table>
					</td>
					</tr>
					<tr>
					<td colspan="3" valign="top" align="center" >&nbsp;</td>
					</tr>
				<?php } ?>
				<tr>
					<td colspan="3" valign="top" align="right" style="padding-right:10px;"> 
					
					
					
					<?php if(in_array('32_5',$admin_permissions)){?>
                    
                    
                    
                    <a href="javascript: void(0)" onclick="popup_letter('?pid=72&action=print_student_vid&idstr=<?php echo $idstr;?>')" style="text-decoration:none; padding:3px;" class="bgcolor_02" >Print</a><?php }?>

                    
					</td>
					</tr>
				<?php
				
				}?>
				
					<?php } ?>
					
					</table>
					
					</form>						
				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
              
              <tr>
                <td height="2" colspan="3" class="bgcolor_02"></td>
  </tr>
</table>
<?php } if($action=='addimage'){?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp; Id Card <span class="admin"> Image </span></td>
              </tr>			  
              <tr>
                <td width="1px" rowspan="4" class="bgcolor_02" ></td>
                <td height="12" align="right" valign="top"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font><br /></td>
                 <td width="1px" rowspan="4" align="right" valign="top" class="bgcolor_02" ></td>
                 <td rowspan="4"></td>
              </tr>
              <tr>
                <td ></td>
              </tr>
              <tr>
                <td height="25">&nbsp;Towards horizontal  upload an image of dimensions 358 X 183 px for better clarity </td>
              </tr>
              <tr>
                <td height="25">&nbsp;Towards vertical upload an image of dimensions 183 X 358 px for better clarity </td>
              </tr>
			  	
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td  align="center" valign="top">
				    <form action="" method="post" enctype="multipart/form-data">
					<table width="100%" height="52%" border="0" cellpadding="3px" cellspacing="0">
					 <tr>
                <td height="15"></td>
              </tr>
					<tr>
                      <td height="30"  align="left" valign="middle" class="narmal">&nbsp;Horizontal Image</td>
					  <td height="30"  align="left" valign="middle" class="narmal">:</td>
					  <td width="31%"  height="30"  align="left" valign="middle" class="narmal"><input  type="file" name="horizontalimage"  /><font color="#FF0000">&nbsp;*</font> 
				 	  </td>
					  <td width="48%"  align="left" valign="middle" class="narmal"> <?php if($image_det['horizontal_image']!=""){?>
					  <img src="images/idcard_images/<?php echo $image_det['horizontal_image']; ?>" width="50" height="50" border="0" />&nbsp;<?php /*?><a href="?pid=72&action=delete_image&id=<?php echo $image_det['id'];?>&type=horizantal">Delete</a><?php */?>
					  <?php }?></td>
					</tr>
					  <tr>
                      <td height="30"  align="left" valign="middle" class="narmal">&nbsp;Vertical Image</td>
					  <td height="30"  align="left" valign="middle" class="narmal">:</td>
					  <td  height="30"  align="left" valign="middle" class="narmal"><input name="verticalimage" type="file" /><font color="#FF0000">&nbsp;*</font>
					    </td>
					  <td  height="30"  align="left" valign="middle" class="narmal">	  <?php if($image_det['vertical_image']!=""){?>
					  <img src="images/idcard_images/<?php echo $image_det['vertical_image']; ?>" height="50" width="50" border="0" />&nbsp;<?php /*?><a href="?pid=72&action=delete_image&id=<?php echo $image_det['id'];?>&type=vertical">Delete</a><?php */?>
					  <?php }?>		</td>
					  </tr>
					
					<tr>
					<td width="19%" valign="top" ></td>
					<td width="2%" valign="top" align="center"></td>
					<td height="30" colspan="2" align="left" valign="top">
					<?php if(in_array('32_3',$admin_permissions)){?>
					<input type="submit" name="submit_image" value="Submit" class="bgcolor_02" style="padding-left:10px;padding-right:10px;cursor:pointer; height:20px;"/><?php }?>					</td>
					</tr>
					</table>
					</form>				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
  </tr>
</table>
<?php } ?>
<?php if($action=='print_staff_hid'){

	if(isset($idstr) && $idstr!=""){
	$es_staffid=explode("@@@",$idstr);
	
	}
		$image="select * from es_idcard_image";
		$cardimage=$db->getrow($image);
		
		
					for($i=0;$i<count($es_staffid);$i++)
					{ $sql="select * from es_staff s,es_departments d where s.st_department=d.es_departmentsid and s.es_staffid=".$es_staffid[$i];
						$result=$db->getrow($sql);
						
						$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_idcard_image','IDCARD','STAFF','".$es_staffid[$i]."',' PRINT HORIZONTAL IMAGE','".$_SERVER['REMOTE_ADDR']."',NOW())";
    $log_insert_exe=mysql_query($log_insert_sql);
						//$db->update("es_staff","selstatus='issued'",'es_staffid='.$es_staffid[$i]);
						
					?>
<style type="text/css">
.bg{
background-image: url(images/idcard_images/<?php echo $cardimage['horizontal_image']; ?>); background-repeat:no-repeat;
border:#000000 solid 1px;
}
.id_header{
font-family:Verdana, Arial, Helvetica, sans-serif;
font-size:9px;
}
</style>
<table width="100%" >
	                <tr>
					<td height="125" colspan="3" align="center" valign="top" ><?php /*?><table width="42%"  height="125"  border="1" class="bg">
                      <tr >
                        <td height="34" style="border:none" valign="top"><img width="30" height="30" src="images/school_logo/<?php echo $compdetails_school['fi_school_logo']; 
					
					?>"/></td>
                        <td style="border:none">&nbsp;</td>
                        <td align="center" valign="top" style="border:none"><table width="200" border="0">
                            <tr>
                              <td width="35%" height="20" align="center" class="narmal" style="border:none"><?php echo $compdetails_school['fi_schoolname'] ."<br />". $compdetails_school['fi_address'] ."<br />".$compdetails_school['fi_email']."<br />".$compdetails_school['fi_website'];
							  ?></td>
                            </tr>
                           
                           
                        </table></td>
                        <td width="35%" style="border:none" rowspan="5"><img height="70" border="0" width="70" src="./images/staff/<?php echo $result['image']; ?>"/></td>
                      </tr>
                      <tr >
                        <td width="33%" align="left" valign="middle" class="narmal" style="border:none"><b>Name</b></td>
                        <td width="2%" align="left" valign="middle" style="border:none">:</td>
                        <td width="30%" align="left" valign="middle" class="narmal" style="border:none"><?php echo $result['st_firstname']."&nbsp;".$result['st_lastname']; ?></td>
                      </tr>
                      <tr>
                        <td align="left" valign="middle" class="narmal" style="border:none"><b>Department</b></td>
                        <td align="left" valign="middle" style="border:none">:</td>
                        <td align="left" valign="middle" class="narmal" style="border:none"><?php echo $result['es_deptname']; ?></td>
                      </tr>
                      <tr>
                        <td align="left" valign="middle" class="narmal" style="border:none"><b>Emp&nbsp;ID </b></td>
                        <td align="left" valign="middle" style="border:none">:</td>
                        <td align="left" valign="middle" class="narmal" style="border:none"><?php echo $result['es_staffid'];  ?></td>
                      </tr>
					  <tr>
                        <td align="left" valign="middle" class="narmal" style="border:none"><b>Valid Upto</b></td>
                        <td align="left" valign="middle" style="border:none">:</td>
                        <td align="left" valign="middle" class="narmal" style="border:none"><?php echo func_date_conversion("Y-m-d","d/m/Y",$_SESSION['eschools']['to_acad']); ?></td>
                      </tr>
                      
					  <tr>
                        <td height="5" style="border:none" align="left"></td>
                        <td style="border:none" colspan="3" align="right" class="narmal"><strong>Issuing Authority</strong></td>
                      
                      </tr>
                    </table>
					<table border="0" width="50%" height="190" class="bg" cellpadding="0" cellspacing="0">
   <tr>
    <td colspan="2">
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="24%" height="32"><img width="25" height="30" src="images/school_logo/<?php echo $compdetails_school['fi_school_logo']; 

?>"/></td>
    <td width="60%" class="id_header"><?php echo $compdetails_school['fi_schoolname'] ."<br />". $compdetails_school['fi_address'] ."<br />".$compdetails_school['fi_email']."<br />".$compdetails_school['fi_website'];
  ?></td>
    <td width="16%">&nbsp;</td>
  </tr>
</table>

	</td>
    
  </tr>
  <tr>
    <td width="190">
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr >
<td width="33%" align="left" valign="middle" class="id_header">&nbsp;Name</td>
<td width="2%" align="left" valign="middle" class="id_header">:</td>
<td width="30%" align="left" valign="middle" class="id_header"><?php echo ucwords($result['st_firstname']."&nbsp;".$result['st_lastname']); ?></td>
</tr>
<tr>
<td align="left" valign="middle" class="id_header">&nbsp;Department</td>
<td align="left" valign="middle" class="id_header">:</td>
<td align="left" valign="middle" class="id_header"><?php echo $result['es_deptname']; ?></td>
</tr>
<tr>
<td align="left" valign="middle" class="id_header">&nbsp;Post</td>
<td align="left" valign="middle" class="id_header">:</td>
<td align="left" valign="middle" class="id_header"><?php echo postname($result['st_post']); ?></td>
</tr>
<tr>
<td align="left" valign="middle" class="id_header">&nbsp;Emp&nbsp;ID </td>
<td align="left" valign="middle" class="id_header">:EMP</td>
<td align="left" valign="middle" class="id_header"><?php echo $result['es_staffid'];  ?></td>
</tr>

</table>

	</td>
    <td width="165" align="center" valign="top"><img height="50" border="0" width="50" src="./images/staff/<?php echo $result['image']; ?>"/></td>
  </tr>
  <tr>
    <td height="10">&nbsp;</td>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    
    <td align="right" colspan="2"><strong>Issuing Authority&nbsp;</strong></td>
  </tr>
</table><?php */?>
<table width="280" height="200" border="1" style="background-image:url('images/idcard_images/<?php echo $cardimage['horizontal_image']; ?>'); background-repeat:no-repeat;">
                        <tr>
                          <td colspan="2"  align="center" valign="top" style="border:none" class="narmal"><strong><?php echo $compdetails_school['fi_schoolname'] ;  ?></strong></td>
                        </tr>
                        <tr>
                          <td width="22%" style="border:none"><img height="70" border="0" width="70" src="./images/staff/<?php echo $result['image']; ?>"/></td>
                          <td width="78%"  style="border:none; padding-left:5px;"><table width="100%" border="0">
                            <tr>
                              <td align="left" valign="middle"><span style="border:none"><?php echo $result['st_firstname']."&nbsp;".$result['st_lastname']; ?></span></td>
                            </tr>
                         
                            <tr>
                              <td align="left" valign="middle"><span style="border:none"><?php echo postname($result['st_post']); ?></span></td>
                            </tr>
                            <tr>
                              <td  align="left" valign="middle"><span style="border:none"><?php echo $result['es_staffid'];  ?></span></td>
                            </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td colspan="2" align="right" valign="middle" style="border:none" class="narmal"><strong>Issuing Authority</strong></td>
                        </tr>
                      </table>
					</td>
					</tr>
					<tr>
					<td colspan="3" valign="top" align="center" >&nbsp;					</td>
					</tr>
					<?php }?>
					<tr><td colspan="3" align="center"><input type="button" id="printbutton" value="&nbsp;Print" class="bgcolor_02" onclick="return printing();"/></td></tr>
</table>
<?php }?>


				
<?php if($action=='print_staff_vid'){
if(isset($idstr) && $idstr!=""){
$es_staffid=explode("@@@",$idstr);

}
for($i=0;$i<count($es_staffid);$i++)
{ $sql="select * from es_staff s,es_departments d where s.st_department=d.es_departmentsid and s.es_staffid=".$es_staffid[$i];
$result=$db->getrow($sql);
//$db->update("es_staff","selstatus='issued'",'es_staffid='.$es_staffid[$i]);
$image="select * from es_idcard_image";
$cardimage=$db->getrow($image);
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_idcard_image','IDCARD','STAFF','".$es_staffid[$i]."','PRINT VERTICAL IMAGE','".$_SERVER['REMOTE_ADDR']."',NOW())";
    $log_insert_exe=mysql_query($log_insert_sql);
?>	
<style type="text/css">
.bg{
background-image: url(images/idcard_images/<?php echo $cardimage['vertical_image']; ?>); background-repeat:no-repeat;
border:#000000 solid 1px;
}
</style>
<table width="100%">
<tr>
<td height="200" colspan="3" align="center" valign="top" ><?php /*?><table width="200"  height="420"  border="1" class="bg">
<tr >
<td height="43" style="border:none" valign="top" align="left"><img width="43" height="43" src="images/school_logo/<?php echo $compdetails_school['fi_school_logo']; 

?>"/></td>
<td style="border:none">&nbsp;</td>
<td align="left" valign="top" style="border:none"><table width="100%"  border="0">
<tr><td width="35%" align="left" valign="middle" class="narmal" style="border:none">
<?php echo $compdetails_school['fi_schoolname'] ;
?></td>
</tr>
<tr><td width="35%" align="left" valign="middle" class="narmal" style="border:none">
<?php echo $compdetails_school['fi_address'];
?></td>
</tr>
<tr><td width="35%" align="left" valign="middle" class="narmal" style="border:none">
<?php echo $compdetails_school['fi_website'];
?></td>
</tr>
</table></td>
</tr>
<tr>
<td style="border:none"  align="center" colspan="3" valign="top" height="80"><img height="85" border="0" width="85" src="./images/staff/<?php echo $result['image']; ?>"/></td>

</tr>

<tr>
<td width="25%"  align="left" valign="middle" style="border:none">Name</td>
<td width="3%"  align="left" valign="middle" style="border:none">:</td>
<td width="72%"  align="left" valign="middle" style="border:none"><?php echo $result['st_firstname']."&nbsp;".$result['st_lastname']; ?></td>

</tr>
<tr>
<td width="25%"  align="left" valign="middle" style="border:none">Department</td>
<td width="3%"  align="left" valign="middle" style="border:none">:</td>
<td width="72%"  align="left" valign="middle" style="border:none"><?php echo $result['es_deptname']; ?></td>

</tr>
<tr>
<td width="25%"  align="left" valign="middle" style="border:none">Post</td>
<td width="3%"  align="left" valign="middle" style="border:none">:</td>
<td width="72%"  align="left" valign="middle" style="border:none"><?php echo postname($result['st_post']); ?></td>

</tr>
<tr>
<td width="25%"  align="left" valign="middle" style="border:none">Emp&nbsp;ID</td>
<td width="3%"  align="left" valign="middle" style="border:none">:</td>
<td width="72%"  align="left" valign="middle" style="border:none">EMP<?php echo $result['es_staffid'];  ?></td>

</tr>
<?php /*?><tr>
<td width="25%"  align="left" valign="middle" style="border:none">Valid Upto </td>
<td width="3%"  align="left" valign="middle" style="border:none">:</td>
<td width="72%"  align="left" valign="middle" style="border:none"><?php echo func_date_conversion("Y-m-d","d/m/Y",$_SESSION['eschools']['to_acad']); ?></td>

</tr><?php ?>
  <tr>
<td  align="right" valign="middle" style="border:none" colspan="3" height=""></td>

</tr>
					<tr>
<td  align="right" valign="middle" style="border:none" colspan="3"><strong>Issuing Authority </strong></td>

</tr>

</table><?php */?><table width="190" height="270" border="1" cellspacing="0" cellpadding="0" style="background-image:url('images/idcard_images/<?php echo $cardimage['vertical_image']; ?>'); background-repeat:no-repeat;">
                        <tr>
                          <td style="border:none" height="30px" valign="middle" align="center"><strong><?php echo $compdetails_school['fi_schoolname'] ; ?></strong></td>
                        </tr>
                        <tr>
                          <td  style=" border:none; padding-top:20px;"  align="center" colspan="3" valign="top"><table width="190" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center"><img height="85" border="0" width="85" src="./images/staff/<?php echo $result['image']; ?>"/></td>
  </tr>
       <tr>
				
						  <td   align="center" valign="top" style="border:none">&nbsp;</td>
					
					  </tr>
  <tr>
    <td align="center"><span style="border:none"><?php echo $result['st_firstname']."&nbsp;".$result['st_lastname']; ?></span></td>
  </tr>
  <tr>
    <td align="center"><span style="border:none"><?php echo postname($result['st_post']); ?></span></td>
  </tr>
  <tr>
    <td align="center"><span style="border:none"><?php echo $result['es_staffid'];  ?></span></td>
  </tr>
  
     <tr>
                          <td colspan="3" align="right" valign="bottom" style="border:none; padding-right:5px;" height="60"><strong>Issuing Authority</strong></td>
                        </tr>
</table>
</td>
                        </tr>	  
                     
                      </table></td>
</tr>
<tr>
<td colspan="3" valign="top" align="center" >&nbsp;</td>
</tr>
<?php }?>
<tr><td colspan="3" align="center">

<input type="button" id="printbutton" value="&nbsp;Print" class="bgcolor_02" onclick="return printing();"/>

</tr>
</table>
<?php }?>

	
<?php if($action=='print_student_hid'){

if(isset($idstr) && $idstr!=""){
$es_preadmissionid=explode("@@@",$idstr);

}

$image1="select * from es_idcard_image";
$cardimage=$db->getrow($image1);
for($i=0;$i<count($es_preadmissionid);$i++)
{ 
$sql_stud="select * from es_preadmission as p,es_classes as c where p.pre_class=c.es_classesid and p.es_preadmissionid=".$es_preadmissionid[$i];

$result=$db->getrow($sql_stud);
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_idcard_image','IDCARD','STUDENT','".$es_preadmissionid[$i]."','PRINT HORIZONTAL IMAGE','".$_SERVER['REMOTE_ADDR']."',NOW())";
    $log_insert_exe=mysql_query($log_insert_sql);


?>	
<style type="text/css">
.bg{
background-image: url(images/idcard_images/<?php echo $cardimage['horizontal_image']; ?>); background-repeat:no-repeat;
border:#000000 solid 1px;}
.id_header{
font-family:Verdana, Arial, Helvetica, sans-serif;
font-size:9px;
}

</style>
<table width="100%">
<tr>
<td height="100" colspan="3" align="center" valign="top" >
<table width="280" height="200" border="1" style="background-image:url('images/idcard_images/<?php echo $cardimage['horizontal_image']; ?>'); background-repeat:no-repeat;">
                        <tr>
                          <td colspan="2"  align="center" valign="top" style="border:none" class="narmal"><strong><?php echo $compdetails_school['fi_schoolname'] ;  ?></strong></td>
                        </tr>
                        <tr>
                          <td width="22%" style="border:none"><img height="70" border="0" width="70" src="./images/student_photos/<?php echo $result['pre_image']; ?>"/></td>
                          <td width="78%"  style="border:none; padding-left:5px;"><table width="100%" border="0">
                            <tr>
                              <td align="left" valign="middle"><span style="border:none"><?php echo $result['pre_name']; ?></span></td>
                            </tr>
                          
                            <tr>
                              <td align="left" valign="middle"><span style="border:none">Class-<?php echo $result['es_classname']; ?></span></td>
                            </tr>
                            <tr>
                              <td  align="left" valign="middle"><span style="border:none">Reg No.-<?php echo $result['es_preadmissionid'];  ?></span></td>
                            </tr>
							 <tr>
                              <td  align="left" valign="middle"><span style="border:none">Roll No.-<?php 	
							  $online_sql="select * from es_sections_student where student_id=".$result['es_preadmissionid'];
	                                    $online_row=$db->getRow($online_sql);
									
									
									if($online_row['roll_no']!=''){ echo $online_row['roll_no'];} else { echo "---";}   ?></span></td>
                            </tr>
							   <tr>
                              <td  align="left" valign="middle"><span style="border:none">DOB:<?php echo func_date_conversion("Y-m-d","d/m/Y",$result['pre_dateofbirth']); ?></span></td>
                            </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td colspan="2" align="right" valign="middle" style="border:none" class="narmal"><strong>Issuing Authority</strong></td>
                        </tr>
                      </table>
<?php /*?><table border="0" width="50%" height="200" class="bg" cellpadding="0" cellspacing="0">
   <tr>
    <td colspan="2">
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="24%" height="32"><img width="25" height="30" src="images/school_logo/<?php echo $compdetails_school['fi_school_logo']; 

?>"/></td>
    <td width="60%" class="id_header"><?php echo $compdetails_school['fi_schoolname'] ."<br />". $compdetails_school['fi_address'] ."<br />".$compdetails_school['fi_email']."<br />".$compdetails_school['fi_website'];
  ?></td>
    <td width="16%">&nbsp;</td>
  </tr>
</table>

	</td>
    
  </tr>
  <tr>
    <td width="195">
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr >
<td width="33%" align="left" valign="middle" class="id_header">&nbsp;Name</td>
<td width="2%" align="left" valign="middle" class="id_header">:</td>
<td width="30%" align="left" valign="middle" class="id_header"><?php echo $result['pre_name']; ?></td>
</tr>
<tr>
<td align="left" valign="middle" class="id_header">&nbsp;Class</td>
<td align="left" valign="middle" class="id_header">:</td>
<td align="left" valign="middle" class="id_header"><?php echo $result['es_classname']; ?></td>
</tr>
<tr>
<td align="left" valign="middle" class="id_header">&nbsp;Student&nbsp;ID </td>
<td align="left" valign="middle" class="id_header">:</td>
<td align="left" valign="middle" class="id_header">SM<?php echo $result['es_preadmissionid'];  ?></td>
</tr>
<tr>
<td height="10" align="left" valign="middle" class="id_header">&nbsp;D.O.B</td>
<td align="left" valign="middle" class="id_header">:</td>
<td align="left" valign="middle" class="id_header"><?php echo func_date_conversion("Y-m-d","d/m/Y",$result['pre_dateofbirth']); ?></td>
</tr>
</table>

	</td>
    <td width="100" align="center" valign="top"><img height="50" border="0" width="50" src="./images/student_photos/<?php echo $result['pre_image']; ?>"/></td>
  </tr>
  <tr>
    <td height="10">&nbsp;</td>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>

    <td align="right" colspan="2"><strong>Issuing Authority&nbsp;</strong></td>
  </tr>
</table><?php */?>
</td>
</tr>	
<tr>
<td colspan="3" valign="top" align="center" >&nbsp;					</td>
</tr>
<?php } ?>
<tr><td colspan="3" align="center">
<input type="button" id="printbutton" value="&nbsp;Print" class="bgcolor_02" onclick="return printing();"/>
</tr>
</table>
<?php }?>
	
<?php if($action=='print_student_vid'){
	if(isset($idstr) && $idstr!=""){
	$es_preadmissionid=explode("@@@",$idstr);
	}
	                    $image="select * from es_idcard_image";
						$cardimage=$db->getrow($image);
					
	?>
<style type="text/css">
.bg{
background-image: url(images/idcard_images/<?php echo $cardimage['vertical_image']; ?>); background-repeat:no-repeat;
border:#000000 solid 1px;
}
</style>
	
<table width="100%">
		<?php
		for($i=0;$i<count($es_preadmissionid);$i++){ 
				 $sql_stud="select * from es_preadmission as p,es_classes as c where p.pre_class=c.es_classesid and p.es_preadmissionid=".$es_preadmissionid[$i];
						
						$result=$db->getrow($sql_stud);
						$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_idcard_image','IDCARD','STUDENT','".$es_preadmissionid[$i]."','PRINT VERTICAL IMAGE','".$_SERVER['REMOTE_ADDR']."',NOW())";
    $log_insert_exe=mysql_query($log_insert_sql);	
						
						?>

						
						<tr>
					     <td height="200" colspan="3" align="center" valign="top" ><?php /*?><table width="200"  height="350"  border="1" class="bg">
                      <tr >
                        <td height="43" style="border:none" valign="top" align="left"><img width="43" height="43" src="images/school_logo/<?php echo $compdetails_school['fi_school_logo']; 
					
					?>"/></td>
                        <td style="border:none">&nbsp;</td>
                        <td align="left" valign="top" style="border:none"><table width="100%"  border="0">
                        <tr><td width="35%" align="left" valign="middle" class="narmal" style="border:none">
						<?php echo $compdetails_school['fi_schoolname'] ;
							  ?></td>
                        </tr>
						 <tr><td width="35%" align="left" valign="middle" class="narmal" style="border:none">
						<?php echo $compdetails_school['fi_address'];
							  ?></td>
                        </tr>
						 <tr><td width="35%" align="left" valign="middle" class="narmal" style="border:none">
						<?php echo $compdetails_school['fi_website'];
							  ?></td>
                        </tr>
                        </table></td>
                      </tr>
                      <tr>
					  <td style="border:none"  align="center" colspan="3" valign="top" height="80"><img height="85" border="0" width="85" src="./images/student_photos/<?php echo $result['pre_image']; ?>"/></td>
					
					  </tr>
					  
					   <tr>
					  <td width="25%"  align="left" valign="middle" style="border:none">Name</td>
					    <td width="3%"  align="left" valign="middle" style="border:none">:</td>
						  <td width="72%"  align="left" valign="middle" style="border:none"><?php echo $result['pre_name']; ?></td>
					
					  </tr>
					  <tr>
					  <td width="25%"  align="left" valign="middle" style="border:none">Class</td>
					    <td width="3%"  align="left" valign="middle" style="border:none">:</td>
						  <td width="72%"  align="left" valign="middle" style="border:none"><?php echo $result['es_classname']; ?></td>
					
					  </tr>
					   <tr>
					  <td width="25%"  align="left" valign="middle" style="border:none">Student&nbsp;ID</td>
					    <td width="3%"  align="left" valign="middle" style="border:none">:</td>
						  <td width="72%"  align="left" valign="middle" style="border:none">SM<?php echo $result['es_preadmissionid'];  ?></td>
					
					  </tr>
					   <tr>
					  <td width="25%"  align="left" valign="middle" style="border:none">D.O.B.</td>
					    <td width="3%"  align="left" valign="middle" style="border:none">:</td>
						  <td width="72%"  align="left" valign="middle" style="border:none"><?php echo func_date_conversion("Y-m-d","d/m/Y",$result['pre_dateofbirth']); ?></td>
					
					  </tr>
					  <tr>
<td  align="right" valign="middle" style="border:none" colspan="3" height=""></td>

</tr>
					<tr>
<td  align="right" valign="middle" style="border:none" colspan="3"><strong>Issuing Authority </strong></td>

</tr>

                      
                    </table><?php */?><table width="190" height="270" border="1" cellspacing="0" cellpadding="0" style="background-image:url('images/idcard_images/<?php echo $cardimage['vertical_image']; ?>'); background-repeat:no-repeat;">
                        <tr>
                          <td style="border:none" height="30px" valign="middle" align="center"><strong><?php echo $compdetails_school['fi_schoolname'] ; ?></strong></td>
                        </tr>
                        <tr>
                          <td  style=" border:none; padding-top:20px;"  align="center" colspan="3" valign="top"><table width="190" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center"><img height="85" border="0" width="85" src="./images/student_photos/<?php echo $result['pre_image']; ?>"/></td>
  </tr>
       <tr>
				
						  <td   align="center" valign="top" style="border:none">&nbsp;</td>
					
					  </tr>
  <tr>
    <td align="center"><span style="border:none"><?php echo $result['pre_name']; ?></span></td>
  </tr>
  <tr>
    <td align="center"><span style="border:none">Class-<?php echo $result['es_classname']; ?></span></td>
  </tr>
  <tr>
    <td align="center"><span style="border:none">Reg No.-<?php echo $result['es_preadmissionid'];  ?></span></td>
  </tr>
  
  <tr>
    <td align="center"><span style="border:none">Roll No.-<?php 	
							  $online_sql="select * from es_sections_student where student_id=".$result['es_preadmissionid'];
	                                    $online_row=$db->getRow($online_sql);
									
									
								if($online_row['roll_no']!=''){ echo $online_row['roll_no'];} else { echo "---";}   ?></span></td>
  </tr>
  
  
  
  <tr>
    <td align="center"><span style="border:none">DOB:<?php echo func_date_conversion("Y-m-d","d/m/Y",$result['pre_dateofbirth']); ?></span></td>
  </tr>
  
     <tr>
                          <td colspan="3" align="right" valign="bottom" style="border:none; padding-right:5px;" height="60"><strong>Issuing Authority</strong></td>
                        </tr>
</table>
</td>
                        </tr>	  
                     
                      </table></td>
					   </tr>
					<tr>
					<td colspan="3" valign="top" align="center" >&nbsp;</td>
					</tr>
				<?php } ?>
				<tr><td colspan="3" align="center">
                <input type="button" id="printbutton" value="&nbsp;Print" class="bgcolor_02" onclick="return printing();"/>
</td></tr>
</table>

<?php } ?>
<script type="text/javaScript">
  function printing(){
	  document.getElementById("printbutton").style.display = "none";
	  window.print();
	  window.close();
	 }

  </script>	
