<?php
/**
* Only Admin users can view the pages
*/
checkuserinlogin();?>
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
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Compose Message</span></td>
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
					<?php /*?><tr>
					<td width="18%" class="narmal"  align="left">Name / Username</td>
					<td width="2%" align="center"><strong> :</strong></td>
					<td width="80%" height="30" align="left"><?php echo $html_obj->draw_selectfield('es_adminsid[]',$alladmins_arr,'','multiple="multiple" size="5"');?><font color="#FF0000">&nbsp;*</font><div class="normal">Use Ctrl + Mouse click for multi selection</div></td>
					<td  align="left">&nbsp;</td>
					</tr><?php */?>
					<tr>
					<td width="18%" valign="top" class="narmal"  align="left"> Subject </td>
					<td width="2%" valign="top"  align="center"><strong> :</strong></td>
					<td width="80%" height="30" valign="top" align="left"><?php echo $html_obj->draw_inputfield('subject',$subject,'','class="input_field"');?><font color="#FF0000">&nbsp;*</font></td>
					<td  align="left">&nbsp;</td>
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
				  <tr><td colspan="3">&nbsp;</td></tr>
					<tr>
					<td width="18%" valign="top" ></td>
					<td width="2%" valign="top"  align="center"></td>
					<td width="80%" height="30" valign="middle" align="left"><input type="submit" name="submit_staff" value="Send" class="bgcolor_02"/></td>
					<td  align="left">&nbsp;</td>
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
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Send Message to Staff</span></td>
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
					<td width="80%" height="30" align="left"><?php echo $html_obj->draw_selectfield('es_staffid[]',$staff_list,'','multiple="multiple" size="5"');?><font color="#FF0000">&nbsp;*</font><div class="normal">Use Ctrl + Mouse click for multi selection</div></td>
					<td  align="left">&nbsp;</td>
					</tr>
					<tr>
					
					<td width="18%" valign="top" class="narmal"  align="left"> Subject </td>
					<td width="2%" valign="top"  align="center"><strong> :</strong></td>
					<td width="80%" height="30" valign="top" align="left"><?php echo $html_obj->draw_inputfield('subject',$subject,'','class="input_field"');?><font color="#FF0000">&nbsp;*</font></td>
					<td  align="left">&nbsp;</td>
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
					<td width="80%" valign="middle" align="left" height="30"><input type="submit" name="submit_staff" value="Send" class="bgcolor_02" /></td>
					<td  align="left">&nbsp;</td>
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
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Send Message to Student(s)</span></td>
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
					<td width="18%" class="narmal"  align="left"> Class </td>
					<td width="1%" align="center" class="narmal"><strong> :</strong></td>
					<td width="81%" height="30" align="left"><?php echo $html_obj->draw_selectfield('es_classesid',$class_list,'','onchange="JavaScript:document.sendmailtostudents.submit();"');?> <font color="#FF0000">&nbsp;*</font></td>
					
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
					
					<tr>
					<td width="18%" valign="top" class="narmal"  align="left"> Subject </td>
					<td width="1%" valign="top"  align="center" class="narmal"><strong> :</strong></td>
					<td width="81%" height="30"valign="top"  align="left"><?php echo $html_obj->draw_inputfield('subject',$subject,'','class="input_field"');?><font color="#FF0000">&nbsp;*</font></td>
					</tr>
					<tr>
					<td width="18%" valign="top" class="narmal"  align="left"> Message </td>
					<td width="1%" valign="top"  align="center"><strong> :</strong></td>
					<td width="81%" height="30" valign="top"  align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="26%"><?php echo $html_obj->draw_textarea('message','','rows="10"');?></td>
                          <td width="74%" align="left" valign="bottom"><font color="#FF0000">&nbsp;*</font></td>
                        </tr>
                      </table></td>
					</tr>
					<tr>
					<td width="18%" valign="top" ></td>
					<td width="1%" valign="top" align="center"></td>
					<td width="81%" height="30" valign="middle" align="left"><input type="submit" name="submit_student" value="Send" class="bgcolor_02"/></td>
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
		<form action="" method="post" name="fee_search">
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
					<td width="20%"   align="left" valign="middle">&nbsp;&nbsp;From<br />[Person Type]</td>
					<td width="25%" align="left" valign="middle">&nbsp;&nbsp;Subject</td>
					<td width="38%"   align="left" valign="middle">&nbsp;&nbsp;Messgae </td>
					<td width="13%"  align="left">&nbsp;&nbsp;Received&nbsp;On</td>
					<td width="4%"   align="center">&nbsp;&nbsp;Action</td>
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
					<td height="26" align="left" valign="middle"><strong>&nbsp;&nbsp;<?php echo  ucwords($from_name)."[".$each_message['from_type']."]";?></strong></td>
					<td align="left" valign="middle" class="narmal">&nbsp;&nbsp;<?php $spchar = array('<p>','</p>');echo ucfirst(substr(str_replace($spchar,'',$each_message['subject']), 0,15))."..";?></td>
					<td align="left" valign="middle" class="narmal"><a href="?pid=27&action=fullmessage&es_messagesid=<?php echo $each_message['es_messagesid']; ?>" target="_blank" onclick="window.open(this.href, this.target,'height=500px,width=700px'); return false" style="text-decoration:none;" class="narmal" title="Click on Message to view full message"><?php $spchar = array('<p>','</p>');echo ucfirst(substr(str_replace($spchar,'',$each_message['message']), 0,30))."..";?></a></td>					
					<td align="left" valign="middle" class="narmal">&nbsp;&nbsp;<?php echo func_date_conversion("Y-m-d","d-m-Y",$each_message['created_on']);?></td>
					<td align="left" valign="middle" class="narmal">&nbsp;&nbsp;<strong><a href="?pid=27&action=delete&es_messagesid=<?php echo $each_message['es_messagesid']; ?>&start=<?php echo $start;?>" onClick="return confirm('Are you sure you want to delete ?')" title="Delete" class="narmal"><img src="images/b_drop.png" border="0" /></a></strong></td>
				</tr>   
			                  
<?php 
	}
 ?>
				<tr>
					<td height="26" align="center" valign="middle" colspan="5"><?php paginateexte($start, $q_limit, $no_records, "action=mails_received".$PageUrl);?></td>
				</tr> 
				<tr height="25">
                   <td align="right" colspan="5" style="padding-right:5px;"><input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=27&action=print_not_list&start=<?php echo $start.$PageUrl; ?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /></td>                   
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
     
			No records found
		
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
					  $from_name = $studentdet_arr['pre_name']. '&nbsp;&lt;'.$studentdet_arr['es_preadmissionid'].'&gt;'."&nbsp;(".ucfirst($details_message['from_type']).")";
					 }
					  if($details_message['from_type']=='staff'){
					   $staff_arr =  get_staffdetails($details_message['from_id']);
					   $from_name = $staff_arr['st_firstname'].' '.$staff_arr['st_lastname']. '&nbsp;&lt;'.$staff_arr['es_staffid'].'&gt;'."&nbsp;(".ucfirst($details_message['from_type']).")";
					  }
					  if($details_message['from_type']=='admin'){
					   $admin_arr = $db->getrow("select * from es_admins where es_adminsid=".$details_message['from_id']);
					   $from_name = $admin_arr['admin_fname']. '&nbsp;&lt;'.$admin_arr['admin_username'].'&gt;'."&nbsp;(".ucfirst($details_message['from_type']).")";
					  
					  }
					

?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr><td colspan="3" height="6"></td></tr>
		<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>
	<tr>
		<td height="19" width="1" class="bgcolor_02"></td>
		<td>&nbsp;</td>
		<td width="1" class="bgcolor_02"></td>
	</tr>					
	<tr><td width="1" class="bgcolor_02"></td>
	  <td  align="center" valign="top"><table width="96%" border="0" cellspacing="3" cellpadding="2">
  <tr>
    <td width="16%" align="left" valign="middle" class="normal">From</td>
    <td width="1%" class="normal">:</td>
    <td width="83%" align="left" valign="middle"><?php echo ucfirst($from_name); ?></td>
  </tr>
   <tr>
    <td align="left" valign="middle" class="normal">Subject</td>
    <td class="normal">:</td>
    <td align="left" valign="middle"><?php echo ucfirst($details_message['subject']); ?></td>
  </tr>
   <tr>
    <td align="left" valign="top" class="normal">Message</td>
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
    <td align="left" valign="top" class="normal"><a href="../office_admin/images/messagedoc/<?php echo $eachdoc['message_doc']; ?>" class="video_link" title="Download"><?php echo $eachdoc['message_doc'];?></a></td>
  </tr>
  <?php } }?>
  
   <tr>
    <td align="left" valign="middle"  class="normal">Received On</td>
    <td class="normal">:</td>
    <td align="left" valign="middle"><?php echo func_date_conversion("Y-m-d ","d-m-Y ",$details_message['created_on']);?></td>
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
		<form action="" method="post" name="fee_search">
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
					<td width="20%"   align="left" valign="middle">&nbsp;&nbsp;To<br />[Person Type]</td>
					<td width="25%" align="left" valign="middle">&nbsp;&nbsp;Subject</td>
					<td width="36%"   align="left" valign="middle">&nbsp;&nbsp;Messgae </td>
					<td width="15%"  align="left">&nbsp;&nbsp;Sent On</td>
					<td width="4%"   align="center">&nbsp;&nbsp;Action</td>
				</tr>
		<?php
				     foreach($sel_messages as $each_message){
					 if($each_message['to_type']=='student'){
					  $studentdet_arr = get_studentdetails($each_message['to_id']);
					  $to_name = $studentdet_arr['pre_name'];
					 }
					  if($each_message['to_type']=='staff'){
					   $staff_arr =  get_staffdetails($each_message['to_id']);
					   $to_name = $staff_arr['st_firstname'].' '.$staff_arr['st_lastname'];
					  }
					  if($each_message['to_type']=='admin'){
					   $admin_arr = $db->getrow("select * from es_admins where es_adminsid=".$each_message['to_id']);
					   $to_name = $admin_arr['admin_fname'];
					  }
				?>
				<tr>
					<td height="26" align="left" valign="middle"><strong>&nbsp;<?php echo $to_name."[".$each_message['to_type']."]";?></strong></td>
					<td align="left" valign="middle" class="narmal">&nbsp;&nbsp;
					<?php echo ucfirst(substr(str_replace($spchar,'',$each_message['subject']), 0,15))."..";?>
					
					
					
					</td>
					<td align="left" valign="middle" class="narmal"><a href="?pid=27&action=fullmessage_sent&es_messagesid=<?php echo $each_message['es_messagesid']; ?>" target="_blank" onclick="window.open(this.href, this.target,'height=500px,width=700px'); return false" style="text-decoration:none;" class="narmal" title="Click on Message to view full message"><?php $spchar = array('<p>','</p>');echo ucfirst(substr(str_replace($spchar,'',$each_message['message']), 0,30))."..";?></a></td>					
					<td align="left" valign="middle" class="narmal">&nbsp;&nbsp;<?php echo func_date_conversion("Y-m-d ","d-m-Y ",$each_message['created_on']);?></td>
					<td align="left" valign="middle" class="narmal">&nbsp;&nbsp;<strong><a href="?pid=27&action=deletesent&es_messagesid=<?php echo $each_message['es_messagesid']; ?>&start=<?php echo $start;?>" onClick="return confirm('Are you sure you want to delete ?')" title="Delete" class="narmal"><img src="images/b_drop.png" border="0" /></a></strong></td>
				</tr>   
			                  
<?php 
	}
 ?>
				<tr>
					<td height="26" align="center" valign="middle" colspan="5"><?php paginateexte($start, $q_limit, $no_records, "action=sentmails".$PageUrl);?></td>
				</tr> 
				<tr height="25">
                   <td align="right" colspan="6" style="padding-right:5px;"><input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=27&action=print_reply_list&start=<?php echo $start.$PageUrl; ?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /></td>                   
                </tr>
			</table>
		
        </td>
		<td width="1" class="bgcolor_02"></td>
	</tr>
	<tr><td width="1" class="bgcolor_02"></td><td height="20" >&nbsp;</td><td width="1" class="bgcolor_02"></td></tr>
	<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>
</table>
<?php } else{?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr><td colspan="3" height="6"></td></tr>
	<tr>
	  <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;Sent Messages</td>
	</tr>
	<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>
	
	<tr>
		<td height="19" width="1" class="bgcolor_02"></td>
		<td>&nbsp;</td>
		<td width="1" class="bgcolor_02"></td>
	</tr>					
	<tr><td width="1" class="bgcolor_02"></td>
	  <td  align="center" valign="top" >	
     
			No records found
		
        </td>
		<td width="1" class="bgcolor_02"></td>
	</tr>
	<tr><td width="1" class="bgcolor_02"></td><td height="20" >&nbsp;</td><td width="1" class="bgcolor_02"></td></tr>
	<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>
</table>
<?php }}?>
<?php if($action=="fullmessage_sent"){


if($details_message['to_type']=='student'){
					  $studentdet_arr = get_studentdetails($details_message['to_id']);
					  $to_name = $studentdet_arr['pre_name']. '&nbsp;&lt;'.$studentdet_arr['pre_student_username'].'&gt;'."&nbsp;(".ucfirst($details_message['to_type']).")";
					 }
					  if($details_message['to_type']=='staff'){
					   $staff_arr =  get_staffdetails($details_message['to_id']);
					   $to_name = $staff_arr['st_firstname'].' '.$staff_arr['st_lastname']. '&nbsp;&lt;'.$staff_arr['st_username'].'&gt;'."&nbsp;(".ucfirst($details_message['to_type']).")";
					  }
					  if($details_message['to_type']=='admin'){
					   $admin_arr = $db->getrow("select * from es_admins where es_adminsid=".$details_message['to_id']);
					   $to_name = $admin_arr['admin_fname']. '&nbsp;&lt;'.$admin_arr['admin_username'].'&gt;'."&nbsp;(".ucfirst($details_message['to_type']).")";
					  
					  }
					

?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr><td colspan="3" height="6"></td></tr>
		<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>
	<tr>
		<td height="19" width="1" class="bgcolor_02"></td>
		<td>&nbsp;</td>
		<td width="1" class="bgcolor_02"></td>
	</tr>					
	<tr><td width="1" class="bgcolor_02"></td>
	  <td  align="center" valign="top"><table width="96%" border="0" cellspacing="3" cellpadding="2">
  <tr>
    <td width="16%" align="left" valign="middle" class="normal"> To</td>
    <td width="1%" class="normal">:</td>
    <td width="83%" align="left" valign="middle"><?php echo ucfirst($to_name); ?></td>
  </tr>
  <tr>
    <td width="16%" align="left" valign="middle" class="normal"> Department</td>
    <td width="1%" class="normal">:</td>
    <td width="83%" align="left" valign="middle"><?php echo deptname( $staff_arr['st_department']); ?></td>
  </tr>
  <tr>
    <td width="16%" align="left" valign="middle" class="normal">Post</td>
    <td width="1%" class="normal">:</td>
    <td width="83%" align="left" valign="middle"><?php echo postname( $staff_arr['st_post']);?></td>
  </tr>
   <tr>
    <td align="left" valign="middle" class="normal">Subject</td>
    <td class="normal">:</td>
    <td align="left" valign="middle"><?php echo ucfirst($details_message['subject']); ?></td>
  </tr>
   <tr>
    <td align="left" valign="top" class="normal">Message</td>
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
    <td align="left" valign="top" class="normal"><a href="../office_admin/images/messagedoc/<?php echo $eachdoc['message_doc']; ?>" class="video_link" title="Download"><?php echo $eachdoc['message_doc'];?></a></td>
  </tr>
  <?php } }?>
   <tr>
    <td align="left" valign="middle"  class="normal">Sent On</td>
    <td class="normal">:</td>
    <td align="left" valign="middle"><?php echo func_date_conversion("Y-m-d ","d-m-Y ",$details_message['created_on']);?></td>
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
$studid = $_SESSION['eschools']['user_id'];
$std_det = $db->getrow("SELECT * FROM es_preadmission WHERE es_preadmissionid=".$studid);
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
		<td width="9%" align="left" class="adminfont" >Class:</td>
	    <td width="35%" class="narmal" align="left" >&nbsp;&nbsp;&nbsp;<?php echo classname($std_det['pre_class']);?></td>
		<td width="31%" align="right" class="adminfont">Father&nbsp;Name&nbsp;: </td>
		<td width="25%" class="narmal" align="left"><?php echo $std_det['pre_fathername']; ?></td>
		
	</tr>
	<tr>
		<td width="9%" align="left" class="adminfont" >Reg.No.:</td>
	    <td width="35%" class="narmal" align="left" >&nbsp;&nbsp;&nbsp;<?php echo $studid; ?></td>
		<td width="31%" align="right" class="adminfont">Student&nbsp;Name&nbsp;:</td>
		<td width="25%" class="narmal" align="left"><?php echo $std_det['pre_name']; ?></td>
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
$studid = $_SESSION['eschools']['user_id'];
$std_det = $db->getrow("SELECT * FROM es_preadmission WHERE es_preadmissionid=".$studid);
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
		<td width="9%" align="left" class="adminfont" >Class:</td>
	    <td width="35%" class="narmal" align="left" >&nbsp;&nbsp;&nbsp;<?php echo classname($std_det['pre_class']);?></td>
		<td width="31%" align="right" class="adminfont">Father&nbsp;Name&nbsp;: </td>
		<td width="25%" class="narmal" align="left"><?php echo $std_det['pre_fathername']; ?></td>
		
	</tr>
	<tr>
		<td width="9%" align="left" class="adminfont" >Reg.No.:</td>
	    <td width="35%" class="narmal" align="left" >&nbsp;&nbsp;&nbsp;<?php echo $studid; ?></td>
		<td width="31%" align="right" class="adminfont">Student&nbsp;Name&nbsp;:</td>
		<td width="25%" class="narmal" align="left"><?php echo $std_det['pre_name']; ?></td>
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
					<td width="13%"  align="left">&nbsp;&nbsp;Sent On</td>
					
				</tr>
		<?php
				     foreach($sel_messages as $each_message){
					 if($each_message['to_type']=='student'){
					  $studentdet_arr = get_studentdetails($each_message['to_id']);
					  $from_name = $studentdet_arr['pre_name'];
					 }
					  if($each_message['to_type']=='staff'){
					   $staff_arr =  get_staffdetails($each_message['to_id']);
					   $from_name = $staff_arr['st_firstname'].' '.$staff_arr['st_lastname'];
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
