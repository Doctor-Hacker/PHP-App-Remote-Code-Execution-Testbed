<?php
/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
header('location: ./?pid=1&unauth=0');
	exit;
}
?>
<script type="text/javascript" src="includes/js/tiny_mce.js"></script>
<script type="text/javascript">
tinyMCE.init({
mode : "textareas",
theme : "advanced",
 
theme_advanced_buttons1 : "bold,italic,underline,separator,strikethrough,justifyleft,justifycenter,justifyright,justifyfull,bullist,numlist,undo,redo,link,unlink",
theme_advanced_buttons2 : "",
theme_advanced_buttons3 : "",
theme_advanced_toolbar_location : "top",
theme_advanced_toolbar_align : "left",
theme_advanced_statusbar_location : "bottom",
tab_focus : ':prev,:next'
});

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
		
		
	
	
	
</script>
 
<?php if($action=='mailtoadmin'){?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
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
				    <form name="" action="" method="post">
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
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">ID Card for  Staff/Faculty</span></td>
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
					<td width="21%" class="narmal"  align="left">Department</td>
					<td width="1%" align="center"><strong> :</strong></td>
					<td height="30" colspan="4" align="left"><select name="st_department" onChange="getsubjects(this.value,'');" style=" width:150px;">
							<option value="">-Select-</option>
							<?php foreach($getdeptlist as $eachrecord1) {  ?>
							<option value="<?php echo $eachrecord1["es_departmentsid"];?>" <?php if(isset($st_department) && $st_department==$eachrecord1["es_departmentsid"]){ echo "selected='selected'";}?>  ><?php echo $eachrecord1["es_deptname"];?></option>
						<?php } ?>
						</select>&nbsp;<font color="#FF0000"><b>*</b></font></td>
					</tr>
					<tr>
					<td width="21%" class="narmal"  align="left">Post</td>
					<td width="1%" align="center"><strong> :</strong></td>
					<td height="30" colspan="4" align="left" id="subjectselectbox"><select name="es_deptpostsid" style=" width:150px;">
                              <option value="">- Select -</option></select>&nbsp;<font color="#FF0000">&nbsp;*</font></td>
					</tr>

					

					
<?php if($es_deptpostsid!=""){  ?>
<script type="text/javascript">
getsubjects('<?php echo $es_deptpostsid; ?>','<?php echo $st_department; ?>')
</script>
<?php } ?>
					
					
					<tr>
					<td width="21%" valign="top" ></td>
					<td width="1%" valign="top"  align="center"></td>
					<td height="30" colspan="4" align="left" valign="middle"><input type="submit" name="submit_staff" value="Submit" class="bgcolor_02" style="padding-left:10px;padding-right:10px;cursor:pointer;" /></td>
					</tr>
					
				
					
					</table>	
					</form>					
				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
			  
              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02">    <?php if(isset($submit_staff) && $submit_staff!=""){	if(count($errormessage)==0){ ?>
			  <table width="98%" height="52%" border="0" cellpadding="3px" cellspacing="0">
              <tr>
                <td height="2"  class="bgcolor_02"><table width="101%" border="1" cellspacing="0" cellpadding="1" class="tbl_grid" align="center">
                      <tr class="bgcolor_02" align="center">
                        <td width="5%" height="20" class="admin" align="center">
			             S.No</td>
                        <td width="13%" class="admin" align="center">
								 ID</td>
                        <td width="21%" class="admin" align="center">
						Name</td>
                        <td width="15%" class="admin" align="center">
						Post</td>
                        <td width="12%" class="admin" align="center">
						Dept</td>
						 <td width="12%" class="admin" align="center">
						Status</td>
                  </tr>		  
					  
					<?php $rownum = 1;	
							foreach($issuedidcard as $eachrecord1){
							$zibracolor = ($rownum%2==0)?"even":"odd";?>
                      <tr class="<?php echo $zibracolor;?>">
                        <td align="center" class="narmal"><?php echo $rownum ; ?></td>
                        <td align="center" class="narmal"><?php echo $eachrecord1['es_staffid']; ?></td>
                        <td align="center" class="narmal"><?php echo $eachrecord1['st_firstname']; ?></td>
							<td align="center" class="narmal"><?php echo $eachrecord1['es_postname']; ?></td>
                        <td align="center" class="narmal"><?php echo $eachrecord1['es_deptname']; ?></td>
                        <td align="center" class="narmal"><a href="?pid=73&action=mailtostaff&status=<?php echo $eachrecord1['id_card_status'];  ?>&id=<?php echo $eachrecord1['es_staffid']; ?>&es_deptpostsid=<?php echo $es_deptpostsid; ?>&st_department=<?php echo $st_department; ?>&submit_staff=<?php echo $submit_staff; ?> " style="text-decoration:none;" ><?php echo ucfirst($eachrecord1['id_card_status']); ?></a></td>
                     
					  </tr>
                      <?php $rownum++;} }?>
					    
                      </table></td>
              </tr>
			  </table>
			  <?php } ?></td>
              </tr>
</table>
<?php } if($action=='mailtostudents'){?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">ID Card for Students</span></td>
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
					<table width="96%" height="52%" border="0" cellpadding="3px" cellspacing="0">
					
					<tr>
					<td width="18%" class="narmal"  align="left">Class</td>
					<td width="1%" align="center" class="narmal"><strong> :</strong></td>
					<td width="81%" height="30" align="left"><?php echo $html_obj->draw_selectfield('es_classesid',$class_list,'','style=" width:150px;"');?><font color="#FF0000">&nbsp;*</font></td>
					</tr>
				
					<tr>
					<td width="18%" valign="top" ></td>
					<td width="1%" valign="top" align="center"></td>
					<td width="81%" height="30" valign="top" align="left"><input type="submit" name="submit_student" value="Submit" class="bgcolor_02" style="padding-left:10px;padding-right:10px;cursor:pointer;"/></td>
					
					</tr>
					
					</table>
					</form>						
				</td>
                <td width="1" class="bgcolor_02" ></td>
              </tr> 
			  <tr><td colspan="3" class="bgcolor_02"><tr>
                <td height="1" colspan="3" class="bgcolor_02">    <?php if(isset($submit_student) && $submit_student!=""){ if(count($errormessage)==0){if(count($issuedstudentcard)>0){?>
			  <table width="98%" height="52%" border="0" cellpadding="3px" cellspacing="0">
              <tr>
                <td height="2"  class="bgcolor_02"><table width="101%" border="1" cellspacing="0" cellpadding="1" class="tbl_grid" align="center">
                      <tr class="bgcolor_02" align="center">
                        <td width="5%" height="20" class="admin" align="center">
			             S.No</td>
                        <td width="13%" class="admin" align="center">
								 ID</td>
                        <td width="21%" class="admin" align="center">
						Name</td>
                        <td width="15%" class="admin" align="center">
						Class</td>
                      
						 <td width="12%" class="admin" align="center">
						Status</td>
                  </tr>		  
					  
					<?php $rownum = 1;	
							foreach($issuedstudentcard as $eachrecord1){
							$zibracolor = ($rownum%2==0)?"even":"odd";?>
                      <tr class="<?php echo $zibracolor;?>">
                        <td align="center" class="narmal"><?php echo $rownum ; ?></td>
                        <td align="center" class="narmal"><?php echo $eachrecord1['es_preadmissionid']; ?></td>
                        <td align="center" class="narmal"><?php echo $eachrecord1['pre_student_username']; ?></td>
							<td align="center" class="narmal"><?php echo $eachrecord1['es_classname']; ?></td>
                        
                        <td align="center" class="narmal"><a href="?pid=73&action=mailtostudents&studentstatus=<?php echo $eachrecord1['id_card_status'];  ?>&id=<?php echo $eachrecord1['es_preadmissionid']; ?>&submit_student=<?php echo $submit_student; ?>&es_classesid=<?php echo $es_classesid;?> " style="text-decoration:none;" ><?php echo ucfirst($eachrecord1['id_card_status']); ?></a></td>
                     
					  </tr>
                      <?php $rownum++;} ?>
					    
                      </table></td>
              </tr>
			  </table>
			  <?php } else{ ?> 			  <table width="98%" height="52%" border="0" cellpadding="3px" cellspacing="0">
 <tr>
                <td height="2"  class="bgcolor_02"><table width="101%" border="1" cellspacing="0" cellpadding="1" class="tbl_grid" align="center">
                      <tr class="bgcolor_02" align="center">
                        <td  colspan="5" height="20" class="admin" align="center">
			             No Record Found</td>
                       
                  </tr>		 </table></td></tr></table><?php } }} ?></td>
              </tr></td></tr>
			 
              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
  </tr>
</table>
<?php } ?>