<?php
/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
include("includes/js/fckeditor/fckeditor.php") ;
?>

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
<script type="text/javascript">
var gblvar7 = 1;
function AddRow7() //This function will add extra row to provide another file
{

var prevrow = document.getElementById("uplimg7");
var tmpvar = gblvar7;
var newrow = prevrow.insertRow(prevrow.rows.length);
newrow.id = newrow.uniqueID; // give row its own ID

var newcell; // an inserted row has no cells, so insert the cells
newcell = newrow.insertCell(0);
newcell.id = newcell.uniqueID;
newcell.innerHTML = "<table width='100%' border='0' cellspacing='0' cellpadding='0'><TR height='25'><td align='left' ><input name='newimage[]' type='file'><input type='hidden' name='filecount[]' value='1' ></TD></TR></table>";

gblvar7 = tmpvar + 1;
}

function DelRow7() //This function will delete the last row
{
if(gblvar7 == 1)
return;

var prevrowas = document.getElementById("uplimg7");
//alert(gblvar);
prevrowas.deleteRow(prevrowas.rows.length-1);
gblvar7 = gblvar7 - 1;
}
</script>

<?php if($action=='mailtoadmin'){?>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Compose  Message to Administrators</span></td>
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
					<?php if($type!="reply"){ ?>
					<tr>
					<td width="18%" class="narmal"  align="left">Name / Username</td>
					<td width="2%" align="center"><strong> :</strong></td>
					<td width="80%" height="30" align="left"><?php echo $html_obj->draw_selectfield('es_adminsid[]',$alladmins_arr,'','multiple="multiple" size="5"');?><font color="#FF0000">&nbsp;*</font><div class="normal">Use Ctrl + Mouse click for multi selection</div></td>
					</tr>
					
					<?php } else{?>
<?php echo $html_obj->draw_hiddenfield('es_messagesid',$es_messagesid);?>
<?php echo $html_obj->draw_hiddenfield('es_adminsid[0]',$copyid);?>
<?php echo $html_obj->draw_hiddenfield('copyid',$copyid);?>

<?php  $adm_info=$db->getrow("select admin_fname,admin_lname, admin_username from es_admins where es_adminsid=".$copyid);?>
<tr>
					<td width="18%" valign="top" class="narmal"  align="left"> Name / Username </td>
					<td width="2%" valign="top"  align="center"><strong> :</strong></td>
					<td width="80%" height="30" valign="top" align="left"><?php echo $adm_info['admin_fname'].'';?></td>
					</tr>
<?php

 }?>
					<tr>
					<td width="18%" valign="top" class="narmal"  align="left"> Subject </td>
					<td width="2%" valign="top"  align="center"><strong> :</strong></td>
					<td width="80%" height="30" valign="top" align="left"><?php echo $html_obj->draw_inputfield('subject',$subject,'','class="input_field"');?><font color="#FF0000">&nbsp;*</font></td>
					</tr>
					<tr>
					<td width="18%" valign="top" class="narmal"  align="left"> Message </td>
					<td width="2%" valign="top"  align="center"><strong> :</strong></td>
					<td width="80%" height="30" valign="top"  align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="26%"><?php 
$sBasePath = $_SERVER['PHP_SELF'] ;
$sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "?pid" ) ) ;
$sBasePath = $sBasePath."includes/js/fckeditor/";
$oFCKeditor = new FCKeditor('message') ;
$oFCKeditor->BasePath	= $sBasePath ;
$oFCKeditor->Height	= 150;
$oFCKeditor->Width	= 300;
$oFCKeditor->ToolbarSet	= "Smalleditor";
$oFCKeditor->Value	= $message;
$oFCKeditor->Create() ;
?><?php //echo $html_obj->draw_textarea('message','','rows="10"');?></td>
                          <td width="74%" align="left" valign="bottom"><font color="#FF0000">&nbsp;*</font></td>
                        </tr>
                      </table></td>
					</tr>
					
					  <tr>

<td>&nbsp;</td>
<td>&nbsp;</td>
<td align="left"><table id="uplimg7" width="100%" border="0" cellpadding="0" cellspacing="0">
</table>
</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td align="left"><input name="button" type="button" onclick="AddRow7()" value="Attach File" class="bgcolor_02" style="padding-left:10px;padding-right:10px;cursor:pointer;"/>
&nbsp;&nbsp;&nbsp;
<input name="button2" type="button" onclick="DelRow7()" value="Delete File" class="bgcolor_02" style="padding-left:10px;padding-right:10px;cursor:pointer;"/></td>
</tr>
				  <tr><td colspan="3" align="right"><span class="narmal">Note : Please do not upload .docx files</span></td>
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
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Compose Message to Staff</span></td>
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
					<?php if($type!="reply"){ ?>
					
					<tr>
					<td width="18%" class="narmal"  align="left">Department</td>
					<td width="2%" align="center"><strong> :</strong></td>
					<td width="80%" height="30" align="left">
					<select name="st_department" onChange="getsubjects(this.value,'');" style=" width:150px;">
							<option value="">-Select-</option>
							<?php foreach($getdeptlist as $eachrecord1) {  ?>
							<option value="<?php echo $eachrecord1["es_departmentsid"];?>" <?php if(isset($st_department) && $st_department==$eachrecord1["es_departmentsid"]){ echo "selected='selected'";}?>  ><?php echo $eachrecord1["es_deptname"];?></option>
						<?php } ?>
						</select>&nbsp;<font color="#FF0000"><b>*</b></font></td>
					</tr>
					<tr>
					<td width="18%" class="narmal"  align="left">Post</td>
					<td width="2%" align="center"><strong> :</strong></td>
					<td width="80%" height="30" align="left" id="subjectselectbox"><select name="es_deptpostsid" style=" width:150px;">
                              <option value="">- Select -</option></select>&nbsp;<font color="#FF0000">&nbsp;*</font></td>
					</tr>
					<tr>
					<td width="18%" class="narmal"  align="left">
					<?php if($st_department!=""){
					
					 ?>
<script type="text/javascript">
getsubjects('<?php echo $st_department; ?>','<?php echo $es_deptpostsid;?>');
</script>
<?php } ?>
					Name / Username</td>
					<td width="2%" align="center"><strong> :</strong></td>
					<td width="80%" height="30" align="left" id="subject2selectbox"><select multiple="multiple" size="5" style=" width:150px;"></select>&nbsp;<font color="#FF0000">&nbsp;*</font><div class="normal">Use Ctrl + Mouse click for multi selection</div></td>
					</tr>
<?php if($es_deptpostsid!=""){ ?>
<script type="text/javascript">
getallsubjects('<?php echo $es_deptpostsid; ?>','<?php echo $st_department; ?>')
</script>
<?php } ?>
<?php } else{?>
<?php echo $html_obj->draw_hiddenfield('es_messagesid',$es_messagesid);?>
<?php echo $html_obj->draw_hiddenfield('st_department',$st_department);?>
<?php echo $html_obj->draw_hiddenfield('es_deptpostsid',$es_deptpostsid);?>
<?php echo $html_obj->draw_hiddenfield('es_staffid[0]',$copyid);?>
<?php echo $html_obj->draw_hiddenfield('copyid',$copyid);?>
<?php  $staff_info=$db->getrow("select st_firstname, st_lastname, st_username, es_staffid  from es_staff where es_staffid=".$copyid);?>

<tr>
					<td width="18%" valign="top" class="narmal"  align="left"> Name / Username </td>
					<td width="2%" valign="top"  align="center"><strong> :</strong></td>
					<td width="80%" height="30" valign="top" align="left"><?php echo $staff_info['st_firstname'].' '.$staff_info['st_lastname'].'  &lt;'. $staff_info['es_staffid'] . '&gt;';?></td>
					</tr>
<?php

 }?>

					<tr>
					<td width="18%" valign="top" class="narmal"  align="left"> Subject </td>
					<td width="2%" valign="top"  align="center"><strong> :</strong></td>
					<td width="80%" height="30" valign="top" align="left"><?php echo $html_obj->draw_inputfield('subject',$subject,'','class="input_field"');?><font color="#FF0000">&nbsp;*</font></td>
					</tr>
					<tr>
					<td width="18%" valign="top" class="narmal"  align="left"> Message </td>
					<td width="2%" valign="top"  align="center"><strong> :</strong></td>
					<td width="80%" height="30" valign="top"  align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="26%"><?php 
$sBasePath = $_SERVER['PHP_SELF'] ;
$sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "?pid" ) ) ;
$sBasePath = $sBasePath."includes/js/fckeditor/";
$oFCKeditor = new FCKeditor('message') ;
$oFCKeditor->BasePath	= $sBasePath ;
$oFCKeditor->Height	= 150;
$oFCKeditor->Width	= 300;
$oFCKeditor->ToolbarSet	= "Smalleditor";
$oFCKeditor->Value	= $message;
$oFCKeditor->Create() ;
?><?php //echo $html_obj->draw_textarea('message','','rows="10"');?></td>
                          <td width="74%" align="left" valign="bottom"><font color="#FF0000">&nbsp;*</font></td>
                        </tr>
                      </table></td>
					</tr>
					 <tr>

<td>&nbsp;</td>
<td>&nbsp;</td>
<td align="left"><table id="uplimg7" width="100%" border="0" cellpadding="0" cellspacing="0">
</table>
</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td align="left"><input name="button" type="button" onclick="AddRow7()" value="Attach File" class="bgcolor_02" style="padding-left:10px;padding-right:10px;cursor:pointer;"/>
&nbsp;&nbsp;&nbsp;
<input name="button2" type="button" onclick="DelRow7()" value="Delete File" class="bgcolor_02" style="padding-left:10px;padding-right:10px;cursor:pointer;"/></td>
</tr>
				  <tr>
				    <td colspan="3"  class="narmal" align="right">Note : Please do not upload .docx files</td>
				  </tr>
					<tr>
					<td width="18%" valign="top" ></td>
					<td width="2%" valign="top"  align="center"></td>
					<td width="80%" valign="middle" align="left" height="30"><input type="submit" name="submit_staff" value="Send" class="bgcolor_02" style="padding-left:10px;padding-right:10px;cursor:pointer;" /></td>
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
<?php } if($action=='mailtostudents'){?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">COMPOSE  Message to Students</span></td>
              </tr>			  
              <tr>
                <td width="1px" class="bgcolor_02" ></td>
                <td height="25" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font><br /></td>
                 <td width="1px" class="bgcolor_02" ></td></td>
              </tr>	
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td  align="center" valign="top"><br />

				    <form name="sendmailtostudents" action="" method="post" enctype="multipart/form-data">
					<table width="96%" height="52%" border="0" cellpadding="3px" cellspacing="0">
					<?php if($type!="reply"){ ?>
					<tr>
					<td width="18%" class="narmal"  align="left"> Class </td>
					<td width="1%" align="center" class="narmal"><strong> :</strong></td>
					<td width="81%" height="30" align="left"><?php echo $html_obj->draw_selectfield('es_classesid',$class_list,'','onchange="JavaScript:document.sendmailtostudents.submit();"');?><font color="#FF0000">&nbsp;*</font></td>
					</tr>
					<tr>
					<td height="30" class="narmal"  align="left"> Student</td>
					<td width="1%" align="center" class="narmal"><strong> :</strong></td>
					<td  align="left" >
					<?php echo $html_obj->draw_multiple_selectfield('es_preadmissionid[]',$students_list,$es_preadmissionid,'size="5"');?>
					
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
					<?php } else{?>
<?php echo $html_obj->draw_hiddenfield('es_classesid',$es_classesid);?>
<?php echo $html_obj->draw_hiddenfield('es_preadmissionid[0]',$copyid);?>
<?php echo $html_obj->draw_hiddenfield('es_messagesid',$es_messagesid);?>
<?php echo $html_obj->draw_hiddenfield('copyid',$copyid);?>
<?php   $student_info=$db->getrow("select pre_student_username,pre_name from es_preadmission where es_preadmissionid=".$copyid);
?>
<tr>
					<td width="18%" valign="top" class="narmal"  align="left"> Name / Username </td>
					<td width="2%" valign="top"  align="center"><strong> :</strong></td>
					<td width="80%" height="30" valign="top" align="left"><?php echo $student_info['pre_name']. '&nbsp;&lt;'.$student_info['pre_student_username'].'&gt;'; ?></td>
					</tr>
<?php
 }?>
					<tr>
					<td width="18%" valign="top" class="narmal"  align="left"> Subject </td>
					<td width="1%" valign="top"  align="center" class="narmal"><strong> :</strong></td>
					<td width="81%" height="30"valign="top"  align="left"><?php echo $html_obj->draw_inputfield('subject',$subject,'','class="input_field"');?><font color="#FF0000">&nbsp;*</font></td>
					</tr>
					<tr>
					<td width="18%" valign="top" class="narmal"  align="left"> Message </td>
					<td width="1%" valign="top"  align="center"><strong> :</strong></td>
					<td width="81%" valign="top"  align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td ><?php 
$sBasePath = $_SERVER['PHP_SELF'] ;
$sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "?pid" ) ) ;
$sBasePath = $sBasePath."includes/js/fckeditor/";
$oFCKeditor = new FCKeditor('message') ;
$oFCKeditor->BasePath	= $sBasePath ;
$oFCKeditor->Height	= 150;
$oFCKeditor->Width	= 300;
$oFCKeditor->ToolbarSet	= "Smalleditor";
$oFCKeditor->Value	= $message;
$oFCKeditor->Create() ;
?><?php //echo $html_obj->draw_textarea('message','','rows="10"');?></td>
                          <td width="74%" align="left" valign="bottom"><font color="#FF0000">&nbsp;*</font></td>
                        </tr>
                      </table></td>
					</tr>
					 <tr>

<td>&nbsp;</td>
<td>&nbsp;</td>
<td align="left"><table id="uplimg7" width="100%" border="0" cellpadding="0" cellspacing="0">
</table>
</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td align="left"><input name="button" type="button" onclick="AddRow7()" value="Attach File" class="bgcolor_02" style="padding-left:10px;padding-right:10px;cursor:pointer;"/>
&nbsp;&nbsp;&nbsp;
<input name="button2" type="button" onclick="DelRow7()" value="Delete File" class="bgcolor_02" style="padding-left:10px;padding-right:10px;cursor:pointer;"/></td>
</tr>
				  <tr><td colspan="3" align="right"><span class="narmal">Note : Please do not upload .docx files</span></td>
				  </tr>
					<tr>
					<td width="18%" valign="top" ></td>
					<td width="1%" valign="top" align="center"></td>
					<td width="81%" height="30" valign="top" align="left"><input type="submit" name="submit_student" value="Send" class="bgcolor_02" style="padding-left:10px;padding-right:10px;cursor:pointer;"/></td>
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
<?php } if($action=="mails_received"){?>
<script type="text/javascript">
function newWindowOpen(href){
    window.open(href,null, 'width=700,height=400,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');
}
</script>
<?php if(count($sel_messages)>0){?>  
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr><td colspan="3" height="6"></td></tr>
	<tr>
	  <td height="25" colspan="3" class="bgcolor_02">&nbsp;Messages Inbox/Received</td>
	</tr>
	<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td>
		<form action="?pid=50&action=mails_received" method="post" name="fee_search" >
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr><td><table width="100%">
				  <tr>
						<td align="left" valign="middle">From</td>
						<td align="left" valign="middle">:</td>
						<td align="left" valign="middle"><?php echo $html_obj->draw_inputfield('dc1','','','readonly="readonly" size="10"');?><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fStartPop(document.fee_search.dc1,document.fee_search.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a></td>
						<td align="left" valign="middle">To</td>
						<td align="left" valign="middle">:</td>
						<td align="left" valign="middle"><?php echo $html_obj->draw_inputfield('dc2','','','readonly="readonly" size="10"');?><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fEndPop(document.fee_search.dc1,document.fee_search.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a></td>
					  </tr>
					  <iframe width=132 height=142 name="gToday:contrast:agenda.js" id="gToday:contrast:agenda.js" src="<?php echo JS_PATH ?>/DateRange/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
	</iframe>
	</table></td></tr>
				<tr><td align="center" class="narmal"><strong >Search :</strong><?php echo $html_obj->draw_inputfield('keyword',$keyword,'','class="input_field"');?>&nbsp;&nbsp;<input type="submit" class="bgcolor_02" name="search" value="GO" /></td></tr>
				<tr><td height="10" colspan="3"></td></tr>
				
			</table>
			</form>	
		</td>
		<td width="1"class="bgcolor_02" ></td>
	</tr>
	<tr>
		<td height="19" width="1" class="bgcolor_02"></td>
		<td>&nbsp;</td>
		<td width="1" class="bgcolor_02"></td>
	</tr>					
	<tr><td width="1" class="bgcolor_02"></td>
	  <td  align="center" valign="top" >	
			<table width="98%" border="0" cellspacing="0" cellpadding="0" class="tbl_grid">
				<tr class="bgcolor_02">
					<td width="16%"   align="left" valign="middle">&nbsp;&nbsp;From</td>
					<td width="9%"   align="left" valign="middle">&nbsp;&nbsp;Person Type</td>
					<td width="27%" align="left" valign="middle">&nbsp;&nbsp;Subject</td>
					<td width="17%"   align="left" valign="middle">&nbsp;&nbsp;Messgae </td>
					<td width="12%"  align="left">&nbsp;&nbsp;Receved&nbsp;On</td>
					<td width="19%"   align="center" valign="middle">&nbsp;&nbsp;Action</td>
				</tr>
		<?php
				     foreach($sel_messages as $each_message){
					 if($each_message['from_type']=='student'){
					  $studentdet_arr = get_studentdetails($each_message['from_id']);
					  $from_name = $studentdet_arr['pre_name'];
					 }
					  if($each_message['from_type']=='staff'){
					   $staff_arr =  get_staffdetails($each_message['from_id']);
					   $from_name = $staff_arr['st_firstname'].' '.$staff_arr['st_lastname'];
					  }
					  if($each_message['from_type']=='admin'){
					   $admin_arr = $db->getrow("select * from es_admins where es_adminsid=".$each_message['from_id']);
					   $from_name = $admin_arr['admin_fname'];
					  }
				?>
				<tr>
					<td height="26" align="left" valign="middle"><strong>&nbsp;&nbsp;<?php echo  ucwords($from_name);?></strong></td>
					<td height="26" align="left" valign="middle"><strong>&nbsp;&nbsp;<?php echo  $each_message['from_type'];?></strong></td>
					<td align="left" valign="middle" class="narmal">&nbsp;&nbsp;<?php echo ucwords($each_message['subject']);?></td>
					<td align="left" valign="middle" class="narmal"><a href="?pid=50&action=fullmessage&es_messagesid=<?php echo $each_message['es_messagesid']; ?>" target="_blank" onclick="window.open(this.href, this.target,'height=500px,width=700px'); return false" style="text-decoration:none;" class="narmal" title="Click here to view full Message"><?php $spchar = array('<p>','</p>');echo ucfirst(substr(str_replace($spchar,'',$each_message['message']), 0,50))."..";?></a></td>					
					<td align="left" valign="middle" class="narmal">&nbsp;&nbsp;<?php echo func_date_conversion("Y-m-d H:i:S","d-m-Y H:i:s",$each_message['created_on']);?></td>
					<td align="center" valign="middle" class="narmal">
					
					<?php if(in_array('20_1',$admin_permissions)){?>
&nbsp;<?php if($each_message['replay_status']=='notreplied'){?><strong>
	<a href="?pid=50&action=replay&es_messagesid=<?php echo $each_message['es_messagesid']; ?>"  title="Reply" class="narmal">Reply</a></strong>
					
					
					<?php } else{ echo "Replied";}?>&nbsp;<strong>

<?php }?>
				
			<?php if(in_array('20_5',$admin_permissions)){?>

<a href="?pid=50&action=delete&es_messagesid=<?php echo $each_message['es_messagesid']; ?>" onClick="return confirm('Are you sure you want to delete ?')" title="Delete" class="narmal"><img src="images/b_drop.png" border="0" /></a></strong>

<?php }?>		
					
					
					</td>
				</tr>   
			                  
<?php 
	}
 ?>
				<tr>
					<td height="26" align="center" valign="middle" colspan="6"><?php paginateexte($start, $q_limit, $no_records, "&action=mails_received".$PageUrl);?></td>
				</tr> 
				<tr height="25">
                   <td align="right" colspan="6" style="padding-right:5px;"><?php if (in_array("20_101", $admin_permissions)) {?><input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=50&action=print_not_list&start=<?php echo $start.$PageUrl; ?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /><?php }?></td>                   
                </tr>
				<tr>
					<td colspan="6" align="center" valign="middle" class="normal">&nbsp;</td>                           
				</tr>
			</table>
		
        </td>
		<td width="1" class="bgcolor_02"></td>
	</tr>
	<tr><td width="1" class="bgcolor_02"></td><td height="20" >&nbsp;</td><td width="1" class="bgcolor_02"></td></tr>
	<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>
</table>
<?php }else{?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr><td colspan="3" height="6"></td></tr>
	<tr>
	  <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;Messages Inbox/Received</td>
	</tr>
	<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>
	
	<tr>
		<td height="19" width="1" class="bgcolor_02"></td>
		<td>&nbsp;</td>
		<td width="1" class="bgcolor_02"></td>
	</tr>					
	<tr><td width="1" class="bgcolor_02"></td>
	  <td  align="center" valign="top" >	
     
			No Message Found
		
        </td>
		<td width="1" class="bgcolor_02"></td>
	</tr>
	<tr><td width="1" class="bgcolor_02"></td><td height="20" >&nbsp;</td><td width="1" class="bgcolor_02"></td></tr>
	<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>
</table>
<?php }?>
<?php }?>
<?php if($action=="fullmessage"){


if($details_message['from_type']=='student'){
					  $studentdet_arr = get_studentdetails($details_message['from_id']);
					  $from_name = $studentdet_arr['pre_name']. "&nbsp;(".ucfirst($details_message['from_type']).")";
					  $cl_dep = classname($studentdet_arr['pre_class']);
					  $lable = "Class";
					 }
					  if($details_message['from_type']=='staff'){
					   $staff_arr =  get_staffdetails($details_message['from_id']);
					   $from_name = $staff_arr['st_firstname'].' '.$staff_arr['st_lastname']. "&nbsp;(".ucfirst($details_message['from_type']).")";
					   
					   $cl_dep = deptname($staff_arr['st_department'])."&nbsp;[ ".postname($staff_arr['st_post'])." ]";
					   $lable = "Department / Post";
					  }
					  if($details_message['from_type']=='admin'){
					   $admin_arr = $db->getrow("select * from es_admins where es_adminsid=".$details_message['from_id']);
					   $from_name = $admin_arr['admin_fname']."&nbsp;(".ucfirst($details_message['from_type']).")";
					  $cl_dep ="";
					  $lable = "";
					  }
					

?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr><td colspan="3" height="6"><strong>Message</strong></td></tr>
		<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>
	<tr>
		<td height="19" width="1" class="bgcolor_02"></td>
		<td>&nbsp;</td>
		<td width="1" class="bgcolor_02"></td>
	</tr>					
	<tr><td width="1" class="bgcolor_02"></td>
	  <td  align="center" valign="top"><table width="96%" border="0" cellspacing="3" cellpadding="2">
  <tr>
    <td width="16%" class="normal">From</td>
    <td width="1%" class="normal">:</td>
    <td width="83%" align="left" valign="middle"><?php echo ucfirst($from_name); ?></td>
  </tr>
   <?php if($lable!=""){?>
  <tr>
    <td width="16%" class="normal"><?php echo $lable;?></td>
    <td width="1%" class="normal">:</td>
    <td width="83%" align="left" valign="middle"><?php echo $cl_dep; ?></td>
  </tr>
  <?php }?>
   <tr>
    <td class="normal">Subject</td>
    <td class="normal">:</td>
    <td align="left" valign="middle"><?php echo ucfirst($details_message['subject']); ?></td>
  </tr>
   <tr>
    <td class="normal" valign="top">Message</td>
    <td class="normal" valign="top">:</td>
    <td align="left" valign="top" class="normal"><?php echo $details_message['message']; ?></td>
  </tr>
   <?php  $sql_doc="select * from es_message_documents where es_messagesid =".$details_message['es_messagesid'] ;
  $document_details=$db->getRows($sql_doc);
  
  if(count($document_details)>0){?>
  <tr>
    <td align="left" valign="top" class="normal"></td>
    <td class="normal" valign="top"></td>
    <td align="left" valign="top" class="normal">Download</td>
  </tr>
  <?php
  foreach($document_details as $eachdoc){
  ?>
  
   <tr>
    <td align="left" valign="top" class="normal"></td>
    <td class="normal" valign="top"></td>
    <td align="left" valign="top" class="normal"><a href="images/messagedoc/<?php echo $eachdoc['message_doc']; ?>" class="video_link" title="Download"><?php echo $eachdoc['message_doc'];?></a></td>
  </tr>
  <?php } }?>
   <tr>
    <td  class="normal">Recieved On</td>
    <td class="normal">:</td>
    <td align="left" valign="middle"><?php echo func_date_conversion("Y-m-d H:i:S","d-m-Y H:i:s",$details_message['created_on']);?></td>
  </tr>
  <tr>
    <td colspan="3"  class="normal">&nbsp;</td>
  </tr>
</table>
      </td>
		<td width="1" class="bgcolor_02"></td>
	</tr>
	<tr><td width="1" class="bgcolor_02"></td><td height="20" >&nbsp;</td><td width="1" class="bgcolor_02"></td></tr>
	<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>
</table>
<?php }?>
<?php if($action=="sentmails"){
if(count($sel_messages)>0){
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr><td colspan="3" height="6"></td></tr>
	<tr>
	  <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;Sent Messages </td>
	</tr>
	<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td>
		<form action="?pid=50&action=sentmails" method="post" name="fee_search" >
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
					
				 <tr><td><table width="100%">
				  <tr>
						<td align="left" valign="middle">From</td>
						<td align="left" valign="middle">:</td>
						<td align="left" valign="middle"><?php echo $html_obj->draw_inputfield('dc1','','','readonly="readonly" size="10"');?><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fStartPop(document.fee_search.dc1,document.fee_search.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a></td>
						<td align="left" valign="middle">To</td>
						<td align="left" valign="middle">:</td>
						<td align="left" valign="middle"><?php echo $html_obj->draw_inputfield('dc2','','','readonly="readonly" size="10"');?><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fEndPop(document.fee_search.dc1,document.fee_search.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a></td>
					  </tr>
					  <iframe width=132 height=142 name="gToday:contrast:agenda.js" id="gToday:contrast:agenda.js" src="<?php echo JS_PATH ?>/DateRange/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
	</iframe>
	</table></td></tr>
				<tr><td align="center" class="narmal"><strong >Search :</strong><?php echo $html_obj->draw_inputfield('keyword',$keyword,'','class="input_field"');?>&nbsp;&nbsp;<input type="submit" class="bgcolor_02" name="search" value="GO" /></td></tr>
				<tr><td height="10" colspan="3"></td></tr>
				
			</table>
			</form>	
		</td>
		<td width="1"class="bgcolor_02" ></td>
	</tr>
	<tr>
		<td height="19" width="1" class="bgcolor_02"></td>
		<td>&nbsp;</td>
		<td width="1" class="bgcolor_02"></td>
	</tr>					
	<tr><td width="1" class="bgcolor_02"></td>
	  <td  align="center" valign="top" >	
     
			<table width="98%" border="0" cellspacing="0" cellpadding="0" class="tbl_grid">
			
			
				<tr class="bgcolor_02">
					<td width="20%"   align="left" valign="middle">&nbsp;&nbsp;To<br />[ Person Type]</td>
					<td width="25%" align="left" valign="middle">&nbsp;&nbsp;Subject</td>
					<td width="38%"   align="left" valign="middle">&nbsp;&nbsp;Messgae </td>
					<td width="13%"  align="left">&nbsp;&nbsp;Sended&nbsp;On</td>
					<td width="4%"   align="center">&nbsp;&nbsp;Action</td>
				</tr>
		<?php
				     foreach($sel_messages as $each_message){
					 if($each_message['to_type']=='student'){
					  $studentdet_arr = get_studentdetails($each_message['to_id']);
					     $to_name = $studentdet_arr['pre_name']. "&nbsp;(".ucfirst($studentdet_arr['es_preadmissionid']).")";
					 
					 }
					  if($each_message['to_type']=='staff'){
					   $staff_arr =  get_staffdetails($each_message['to_id']);
					       $to_name = $staff_arr['st_firstname']. "&nbsp;(".ucfirst($staff_arr['es_staffid']).")";
					 
									  }
					  if($each_message['to_type']=='admin'){
					   $admin_arr = $db->getrow("select * from es_admins where es_adminsid=".$each_message['to_id']);
					 
					   $to_name = $admin_arr['admin_fname'];
					  }
				?>
				<tr>
					<td height="26" align="left" valign="middle"><strong>&nbsp;<?php echo $to_name;?><br />[ <?php echo $each_message['to_type'];?> ]</strong></td>
					<td align="left" valign="middle" class="narmal">&nbsp;&nbsp;<?php echo ucwords($each_message['subject']);?></td>
					<td align="left" valign="middle" class="narmal"><a href="?pid=50&action=fullmessage_sent&es_messagesid=<?php echo $each_message['es_messagesid']; ?>" target="_blank" onclick="window.open(this.href, this.target,'height=500px,width=700px'); return false" style="text-decoration:none;" class="narmal" title="Click here to view full Message"><?php $spchar = array('<p>','</p>');echo ucfirst(substr(str_replace($spchar,'',$each_message['message']), 0,50))."..";?></a></td>					
					<td align="left" valign="middle" class="narmal">&nbsp;&nbsp;<?php echo func_date_conversion("Y-m-d H:i:S","d-m-Y H:i:s",$each_message['created_on']);?></td>
					
					<td align="center" valign="middle" class="narmal">
					<?php if(in_array('12_6',$admin_permissions)){?>
					
						&nbsp;&nbsp;<strong><a href="?pid=50&action=deletesent&es_messagesid=<?php echo $each_message['es_messagesid']; ?>&start=<?php echo $start;?>" onClick="return confirm('Are you sure you want to delete ?')" title="Delete" class="narmal"><img src="images/b_drop.png" border="0" /></a></strong>
					<?php } ?>
					
					
					
					</td>
				</tr>   
			                  
<?php 
	}
 ?>
				<tr>
					<td height="26" align="center" valign="middle" colspan="5"><?php paginateexte($start, $q_limit, $no_records, "action=sentmails".$PageUrl);?></td>
				</tr>
				<tr height="25">
                   <td align="right" colspan="5" style="padding-right:5px;"><?php if (in_array("20_102", $admin_permissions)) {?><input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=50&action=print_reply_list&start=<?php echo $start.$PageUrl; ?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /><?php }?></td>                   
                </tr> 
				<tr>
					<td colspan="5" align="center" valign="middle" class="normal">&nbsp;</td>                           
				</tr>
			</table>
		
        </td>
		<td width="1" class="bgcolor_02"></td>
	</tr>
	<tr><td width="1" class="bgcolor_02"></td><td height="20" >&nbsp;</td><td width="1" class="bgcolor_02"></td></tr>
	<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>
</table>
<?php } else {?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr><td colspan="3" height="6"></td></tr>
	<tr>
	  <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;Sent Messages </td>
	</tr>
	<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>
	
	<tr>
		<td height="19" width="1" class="bgcolor_02"></td>
		<td>&nbsp;</td>
		<td width="1" class="bgcolor_02"></td>
	</tr>					
	<tr><td width="1" class="bgcolor_02"></td>
	  <td  align="center" valign="top">No Message Found</td>
		<td width="1" class="bgcolor_02"></td>
	</tr>
	<tr><td width="1" class="bgcolor_02"></td><td height="20" >&nbsp;</td><td width="1" class="bgcolor_02"></td></tr>
	<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>
</table>
<?php } }?>
<?php if($action=="fullmessage_sent"){
if($details_message['to_type']=='student'){
					  $studentdet_arr = get_studentdetails($details_message['to_id']);
					  $to_name = $studentdet_arr['pre_name']. '&nbsp;&lt;'.$studentdet_arr['es_preadmissionid'].'&gt;'."&nbsp;(".ucfirst($details_message['to_type']).")";
					  $cl_dep = classname($studentdet_arr['pre_class']);
					  $lable = "Class";
					 }
					  if($details_message['to_type']=='staff'){
					   $staff_arr =  get_staffdetails($details_message['to_id']);
					   $to_name = $staff_arr['st_firstname'].' '.$staff_arr['st_lastname']. '&nbsp;&lt;'.$staff_arr['es_staffid'].'&gt;'."&nbsp;(".ucfirst($details_message['to_type']).")";
					   $cl_dep = deptname($staff_arr['st_department'])."&nbsp;[ ".postname($staff_arr['st_post'])." ]";
					   $lable = "Department / Post";
					  }
					  if($details_message['to_type']=='admin'){
					   $admin_arr = $db->getrow("select * from es_admins where es_adminsid=".$details_message['to_id']);
					   $to_name = $admin_arr['admin_fname']. "&nbsp;(".ucfirst($details_message['to_type']).")";
					  $cl_dep ="";
					  $lable = "";
					  }
					

?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr><td colspan="3" height="6"><strong>Sent Mail</strong></td></tr>
		<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>
	<tr>
		<td height="19" width="1" class="bgcolor_02"></td>
		<td>&nbsp;</td>
		<td width="1" class="bgcolor_02"></td>
	</tr>					
	<tr><td width="1" class="bgcolor_02"></td>
	  <td  align="center" valign="top"><table width="96%" border="0" cellspacing="3" cellpadding="2">
  <tr>
    <td width="16%" class="normal"> To</td>
    <td width="1%" class="normal">:</td>
    <td width="83%" align="left" valign="middle"><?php echo ucfirst($to_name); ?></td>
  </tr>
  <?php if($lable!=""){?>
  <tr>
    <td width="16%" class="normal"><?php echo $lable;?></td>
    <td width="1%" class="normal">:</td>
    <td width="83%" align="left" valign="middle"><?php echo $cl_dep; ?></td>
  </tr>
  <?php }?>
   <tr>
    <td class="normal">Subject</td>
    <td class="normal">:</td>
    <td align="left" valign="middle"><?php echo ucfirst($details_message['subject']); ?></td>
  </tr>
   <tr>
    <td class="normal" valign="top">Message</td>
    <td class="normal" valign="top">:</td>
    <td align="left" valign="top" class="normal"><?php echo $details_message['message']; ?></td>
  </tr>
   <?php  $sql_doc="select * from es_message_documents where es_messagesid =".$details_message['es_messagesid'] ;
  $document_details=$db->getRows($sql_doc);
  
  if(count($document_details)>0){?>
  <tr>
    <td align="left" valign="top" class="normal"></td>
    <td class="normal" valign="top"></td>
    <td align="left" valign="top" class="normal">Download</td>
  </tr><?php
  foreach($document_details as $eachdoc){
  ?>
  
   <tr>
    <td align="left" valign="top" class="normal"></td>
    <td class="normal" valign="top"></td>
    <td align="left" valign="top" class="normal"><a href="images/messagedoc/<?php echo $eachdoc['message_doc']; ?>" class="video_link" title="Download"><?php echo $eachdoc['message_doc'];?></a></td>
  </tr>
  <?php } }?>
   <tr>
    <td  class="normal">Sent On</td>
    <td class="normal">:</td>
    <td align="left" valign="middle"><?php echo func_date_conversion("Y-m-d H:i:S","d-m-Y H:i:s",$details_message['created_on']);?></td>
  </tr>
 </table>
      </td>
		<td width="1" class="bgcolor_02"></td>
	</tr>
	<tr><td width="1" class="bgcolor_02"></td><td height="20" >&nbsp;</td><td width="1" class="bgcolor_02"></td></tr>
	<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>
</table>
<?php }?>
<?php if($action == 'print_not_list'){
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	       VALUES('".$_SESSION['eschools']['admin_id']."','es_messages','Message','Messages','','Print Inbox','".$_SERVER['REMOTE_ADDR']."',NOW())";
     $log_insert_exe=mysql_query($log_insert_sql);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;MESSAGES INBOX / RECEIVED</strong></td>
              </tr>
			  <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top">
				<table width="100%" border="0">
  <tr>
    <td><table width="100%" border="0">
  <tr>
    <td width="21%" class="admin">Admin.Id</td>
    <td width="42%">:&nbsp;<?php echo $_SESSION['eschools']['admin_id'];?></td>
    <td width="17%" class="admin">Admin Name</td>
    <td width="20%">:&nbsp;<?php 
	$admin_name = $db->getrow("select * from es_admins where es_adminsid=".$_SESSION['eschools']['admin_id']);
					   echo $admin_name['admin_fname'];
	?></td>
  </tr>
  
</table>
</td>
  </tr>
  <tr>
    <td><table width="98%" border="0" cellspacing="0" cellpadding="0" class="tbl_grid">
			
			
				<tr class="bgcolor_02">
					<td width="20%"   align="left" valign="middle">&nbsp;&nbsp;From<br />[Person Type]</td>
					<td width="25%" align="left" valign="middle">&nbsp;&nbsp;Subject</td>
					<td width="30%"   align="left" valign="middle">&nbsp;&nbsp;Messgae </td>
					<td width="13%"  align="left">&nbsp;&nbsp;Received&nbsp;On</td>
					
				</tr>
		<?php
				     foreach($sel_messages as $each_message){
					 if($each_message['from_type']=='student'){
					  $studentdet_arr = get_studentdetails($each_message['from_id']);
					  $from_name = $studentdet_arr['pre_name'];
					 }
					  if($each_message['from_type']=='staff'){
					   $staff_arr =  get_staffdetails($each_message['from_id']);
					   $from_name = $staff_arr['st_firstname'].' '.$staff_arr['st_lastname'];
					  }
					  if($each_message['from_type']=='admin'){
					   $admin_arr = $db->getrow("select * from es_admins where es_adminsid=".$each_message['from_id']);
					   $from_name = $admin_arr['admin_fname'];
					  }
				?>
				<tr>
					<td height="26" align="left" valign="middle"><strong>&nbsp;&nbsp;<?php echo  ucwords($from_name);?>[<?php echo $each_message['from_type']; ?>]</strong></td>
					<td align="left" valign="middle" class="narmal">&nbsp;&nbsp;<?php echo ucfirst(substr(str_replace($spchar,'',$each_message['subject']), 0,15))."";
?>
					
					</td>
					<td align="left" valign="middle" class="narmal"><?php $spchar = array('<p>','</p>');echo ucfirst(substr(str_replace($spchar,'',$each_message['message']), 0,30))."..";?></td>					
					<td align="left" valign="middle" class="narmal">&nbsp;&nbsp;<?php echo func_date_conversion("Y-m-d ","d-m-Y ",$each_message['created_on']);?></td>
					
				</tr>   
			                  
<?php 
	}
 ?>
				
				
			</table></td>
  </tr>
</table>

				</td>
				
                <td width="1" class="bgcolor_02"></td>
              </tr>
              
                <td height="1" colspan="3" class="bgcolor_02"></td>
                </tr>
            </table>
<?php }?>
<?php if($action == 'print_reply_list'){
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	       VALUES('".$_SESSION['eschools']['admin_id']."','es_messages','Message','Messages','','Print Sent Messages','".$_SERVER['REMOTE_ADDR']."',NOW())";
     $log_insert_exe=mysql_query($log_insert_sql);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Sent Messages</strong></td>
              </tr>
			  <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top">
				<table width="100%" border="0">
  <tr>
    <td><table width="100%" border="0">
  <tr>
    <td width="21%" class="admin">Admin.Id</td>
    <td width="42%">:&nbsp;<?php echo $_SESSION['eschools']['admin_id'];?></td>
    <td width="17%" class="admin">Admin Name</td>
    <td width="20%">:&nbsp;<?php 
	$admin_name = $db->getrow("select * from es_admins where es_adminsid=".$_SESSION['eschools']['admin_id']);
					   echo $admin_name['admin_fname'];
	?></td>
  </tr>
  
</table>
</td>
  </tr>
  <tr>
    <td><table width="98%" border="0" cellspacing="0" cellpadding="0" class="tbl_grid">
			
			
				<tr class="bgcolor_02">
					<td width="20%"   align="left" valign="middle">&nbsp;&nbsp;To<br />[Person Type]</td>
					<td width="25%" align="left" valign="middle">&nbsp;&nbsp;Subject</td>
					<td width="30%"   align="left" valign="middle">&nbsp;&nbsp;Messgae </td>
					<td width="13%"  align="left">&nbsp;&nbsp;Sended&nbsp;On</td>
					
				</tr>
		<?php
				     foreach($sel_messages as $each_message){
					 if($each_message['to_type']=='student'){
					  $studentdet_arr = get_studentdetails($each_message['to_id']);
					  $from_name = $studentdet_arr['pre_name'].' '.$each_message['to_id'];
					 }
					  if($each_message['to_type']=='staff'){
					   $staff_arr =  get_staffdetails($each_message['to_id']);
					   $from_name = $staff_arr['st_firstname'].' '.$staff_arr['st_lastname'].' '.$each_message['to_id'];
					  }
					  if($each_message['to_type']=='admin'){
					   $admin_arr = $db->getrow("select * from es_admins where es_adminsid=".$each_message['to_id']);
					   $from_name = $admin_arr['admin_fname'];
					  }
				?>
				<tr>
					<td height="26" align="left" valign="middle"><strong>&nbsp;&nbsp;<?php echo  ucwords($from_name);?>[<?php echo $each_message['to_type']; ?>]</strong></td>
					<td align="left" valign="middle" class="narmal">&nbsp;&nbsp;<?php echo ucfirst(substr(str_replace($spchar,'',$each_message['subject']), 0,15))."";
?>
					
					</td>
					<td align="left" valign="middle" class="narmal">
					<?php $spchar = array('<p>','</p>');echo ucfirst(substr(str_replace($spchar,'',$each_message['message']), 0,30))."..";?></td>					
					<td align="left" valign="middle" class="narmal">&nbsp;&nbsp;<?php echo func_date_conversion("Y-m-d ","d-m-Y ",$each_message['created_on']);?></td>
					
				</tr>   
			                  
<?php 
	}
 ?>
				
				
			</table></td>
  </tr>
</table>

				</td>
				
                <td width="1" class="bgcolor_02"></td>
              </tr>
              
                <td height="1" colspan="3" class="bgcolor_02"></td>
                </tr>
            </table>
<?php }?>