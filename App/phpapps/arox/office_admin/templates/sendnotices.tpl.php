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

<?php if($action=='mailtoadmin'){?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Send Notice to Administrators</span></td>
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
					<table width="96%" height="52%" border="0" cellpadding="0" cellspacing="0">
					
					<?php if($type!="reply"){ ?>
					<tr>
					<td width="18%" class="narmal"  align="left">Name / Username</td>
					<td width="2%" align="center"><strong> :</strong></td>
					<td width="80%" height="30" align="left"><?php echo $html_obj->draw_selectfield('es_adminsid',$alladmins_arr,'','');?><font color="#FF0000">&nbsp;*</font></td>
					</tr>
					
					<?php } else{?>
<?php echo $html_obj->draw_hiddenfield('es_adminsid',$es_adminsid);?>
<?php  $adm_info=$db->getrow("select admin_fname,admin_lname, admin_username from es_admins where es_adminsid=".$es_adminsid);?>
<tr>
					<td width="18%" valign="top" class="narmal"  align="left"> Name / Username </td>
					<td width="2%" valign="top"  align="center"><strong> :</strong></td>
					<td width="80%" height="30" valign="top" align="left"><?php echo $adm_info['admin_fname'].' '.$adm_info['admin_lname'].'  &lt;'. $adm_info['admin_username'] . '&gt;';?></td>
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
					<td width="80%" height="30" valign="top"  align="left"><?php 
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
?><?php //echo $html_obj->draw_textarea('message','','rows="10"');?><font color="#FF0000">&nbsp;*</font></td>
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
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Send Notice to Staff</span></td>
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
					<table width="96%" height="52%" border="0" cellpadding="0" cellspacing="0">
						<?php if($type!="reply"){ ?>
					<tr>
					<td width="18%" class="narmal"  align="left">Name/Emp&nbsp;ID</td>
					<td width="2%" align="center"><strong> :</strong></td>
					<td width="80%" height="30" align="left"><?php echo $html_obj->draw_selectfield('es_staffid',$staff_list,'','');?><font color="#FF0000">&nbsp;*</font></td>
					</tr>
					<?php } else{?>
<?php echo $html_obj->draw_hiddenfield('es_staffid',$es_staffid);?>
<?php  $staff_info=$db->getrow("select st_firstname, st_lastname, st_username  from es_staff where es_staffid=".$es_staffid);?>

<tr>
					<td width="18%" valign="top" class="narmal"  align="left"> Name / Username </td>
					<td width="2%" valign="top"  align="center"><strong> :</strong></td>
					<td width="80%" height="30" valign="top" align="left"><?php echo $staff_info['st_firstname'].' '.$staff_info['st_lastname'].'  &lt;'. $staff_info['st_username'] . '&gt;';?></td>
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
					<td width="80%" height="30" valign="top"  align="left"><?php 
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
?><?php //echo $html_obj->draw_textarea('message','','rows="10"');?><font color="#FF0000">&nbsp;*</font></td>
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
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Send Notice to Students</span></td>
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
					<table width="96%" height="52%" border="0" cellpadding="0" cellspacing="0">
					<?php if($type!="reply"){ ?>
					<tr>
					<td width="18%" class="narmal"  align="left"> Class </td>
					<td width="1%" align="center" class="narmal"><strong> :</strong></td>
					<td width="81%" height="30" align="left"><?php echo $html_obj->draw_selectfield('es_classesid',$class_list,'','onchange="JavaScript:document.sendmailtostudents.submit();"');?><font color="#FF0000">&nbsp;*</font></td>
					</tr>
					<tr>
					<td height="30" class="narmal"  align="left"> Student</td>
					<td width="1%" align="center" class="narmal"><strong> :</strong></td>
					<td  align="left" ><select name="es_preadmissionid" style="width:250px;">
						<option value="" >Select Student</option>
						
						<?php 
						if (count($allstudents)>0){
						 if($es_preadmissionid == "all"){$sel = 'selected';}else{$sel="";}
						echo '<option value="all" '.$sel.'>-- All --</option>';
						foreach($allstudents as $eachstd){
						?>
						
						<option value="<?php echo $eachstd['es_preadmissionid']; ?>"   <?php echo ($eachstd['es_preadmissionid']==$es_preadmissionid)?"selected":""?> ><?php echo $eachstd['pre_name']. '&nbsp;&lt;'.$eachstd['es_preadmissionid'].'&gt;'; ?></option>
						<?php
						}
						}
						?></select> <font color="#FF0000">*</font></td>
					</tr>
					<?php } else{?>
<?php echo $html_obj->draw_hiddenfield('es_classesid',$es_classesid);?>
<?php echo $html_obj->draw_hiddenfield('es_preadmissionid',$es_preadmissionid);?>
<?php   $student_info=$db->getrow("select pre_student_username,pre_name from es_preadmission where es_preadmissionid=".$es_preadmissionid);
?>
<tr>
					<td width="18%" valign="top" class="narmal"  align="left"> Name / Username </td>
					<td width="2%" valign="top"  align="center"><strong> :</strong></td>
					<td width="80%" height="30" valign="top" align="left"><?php echo $student_info['pre_name']. '&nbsp;&lt;'.$student_info['es_preadmissionid'].'&gt;'; ?></td>
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
					<td width="81%" height="30" valign="top"  align="left"><?php 
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
?><?php //echo $html_obj->draw_textarea('message','','rows="10"');?><font color="#FF0000">&nbsp;*</font></td>
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
	  <td height="25" colspan="3" class="bgcolor_02">&nbsp;Received Replies</td>
	</tr>
	<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td>
		<form action="?pid=57&action=mails_received" method="post" name="fee_search">
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
			<tr><td colspan="6" align="right">Note : Click on Message to view full message</td></tr>
				<tr class="bgcolor_02">
					<td width="20%"   align="left" valign="middle">&nbsp;&nbsp;From<br />[Person Type]</td>
					<td width="25%" align="left" valign="middle">&nbsp;&nbsp;Subject</td>
					<td width="30%"   align="left" valign="middle">&nbsp;&nbsp;Messgae </td>
					<td width="10%"  align="left">&nbsp;&nbsp;Received&nbsp;On</td>
					<td width="15%"   align="center" valign="middle">&nbsp;&nbsp;Action</td>
				</tr>
		<?php
				     foreach($sel_messages as $each_message){
					 if($each_message['from_type']=='student'){
					  $studentdet_arr = get_studentdetails($each_message['from_id']);
					  $from_name = $studentdet_arr['pre_name'].'<'.$each_message['from_id'].'>';
					 }
					  if($each_message['from_type']=='staff'){
					   $staff_arr =  get_staffdetails($each_message['from_id']);
					   $from_name = $staff_arr['st_firstname'].'&nbsp;'.$staff_arr['st_lastname'].'<'.$each_message['from_id'].'>';
					  }
					  if($each_message['from_type']=='admin'){
					   $admin_arr = $db->getrow("select * from es_admins where es_adminsid=".$each_message['from_id']);
					   $from_name = $admin_arr['admin_fname'];
					  }
				?>
				<tr>
					<td height="26" align="left" valign="middle"><strong>&nbsp;&nbsp;<?php echo  ucwords($from_name)."<br>[ ".ucfirst($each_message['from_type'])." ]";?></strong></td>
					<td align="left" valign="middle" class="narmal">&nbsp;&nbsp;
					<?php $spchar = array('<p>','</p>');echo ucfirst(substr(str_replace($spchar,'',$each_message['subject']), 0,10))."";?></td>
					<td align="left" valign="middle" class="narmal"><a href="?pid=57&action=fullmessage&es_messagesid=<?php echo $each_message['es_messagesid']; ?>" target="_blank" onclick="window.open(this.href, this.target,'height=500px,width=700px,scrollbars=yes'); return false" style="text-decoration:none;" class="narmal" title="Click here to view full Message"><?php $spchar = array('<p>','</p>');echo ucfirst(substr(str_replace($spchar,'',$each_message['message']), 0,20))."..";?></a></td>					
					<td align="left" valign="middle" class="narmal">&nbsp;&nbsp;<?php echo func_date_conversion("Y-m-d ","d-m-Y ",$each_message['created_on']);?></td>
					<td align="center" valign="middle" class="narmal"><?php /*?>&nbsp;<?php if($each_message['replay_status']=='notreplied'){?><strong><a href="?pid=57&action=replay&es_messagesid=<?php echo $each_message['es_messagesid']; ?>"  title="Reply" class="narmal">Reply</a></strong><?php } else{ echo "Replied";}?><?php */?>&nbsp;<?php if (in_array("22_3", $admin_permissions)) {?><strong><a href="?pid=57&action=delete&es_messagesid=<?php echo $each_message['es_messagesid']; ?>&start=<?php echo $start;?>" onClick="return confirm('Are you sure you want to  delete ?')" title="Delete" class="narmal"><img src="images/b_drop.png" border="0" /></a></strong><?php }else{ echo "-"; }?></td>
				</tr>   
			                  
<?php 
	}
 ?>
				<tr>
					<td height="26" align="center" valign="middle" colspan="5"><?php paginateexte($start, $q_limit, $no_records, "action=mails_received".$PageUrl);?></td>
				</tr> 
				<tr height="25">
                   <td align="right" colspan="5" style="padding-right:5px;"><?php if (in_array("22_5", $admin_permissions)) {?><input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=57&action=print_not_list&start=<?php echo $start.$PageUrl; ?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /><?php }?></td>                   
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
	  <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;Received Replies</td>
	</tr>
	<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>
	
	<tr>
		<td height="19" width="1" class="bgcolor_02"></td>
		<td><form action="?pid=57&action=mails_received" method="post" name="fee_search">
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
			</form></td>
		<td width="1" class="bgcolor_02"></td>
	</tr>					
	<tr><td width="1" class="bgcolor_02"></td>
	  <td  align="center" valign="top" >	
     <table width="98%" border="0" cellspacing="0" cellpadding="0" class="tbl_grid">
			<tr><td colspan="6" align="right">Note : Click on Message to view full message</td></tr>
				<tr class="bgcolor_02">
					<td width="20%"   align="left" valign="middle">&nbsp;&nbsp;From<br />[Person Type]</td>
					<td width="25%" align="left" valign="middle">&nbsp;&nbsp;Subject</td>
					<td width="30%"   align="left" valign="middle">&nbsp;&nbsp;Messgae </td>
					<td width="10%"  align="left">&nbsp;&nbsp;Received&nbsp;On</td>
					<td width="15%"   align="center" valign="middle">&nbsp;&nbsp;Action</td>
				</tr>
				<tr>
					<td colspan="6" align="center" valign="middle" class="normal">No Message Found</td>                           
				</tr>
			</table>
			
		
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
					   $cl_dep = classname($studentdet_arr['pre_class']);
					  $lable = "Class";
					 }
					  if($details_message['from_type']=='staff'){
					   $staff_arr =  get_staffdetails($details_message['from_id']);
					   $from_name = $staff_arr['st_firstname']. '&nbsp;&lt;'.$staff_arr['es_staffid'].'&gt;'."&nbsp;(".ucfirst($details_message['from_type']).")";
					   $cl_dep = deptname($staff_arr['st_department'])."&nbsp;[ ".postname($staff_arr['st_post'])." ]";
					   $lable = "Department / Post";
					  }
					  if($details_message['from_type']=='admin'){
					   $admin_arr = $db->getrow("select * from es_admins where es_adminsid=".$details_message['from_id']);
					   $from_name = $admin_arr['admin_fname']. "&nbsp;(".ucfirst($details_message['from_type']).")";
					  $cl_dep ="";
					  $lable = "";
					  }
					

?>
<?php if($details_message['replied_message_id']!=0){
 $msg_qry ="SELECT * FROM es_notice_messages WHERE es_messagesid=".$details_message['replied_message_id'];
 $from_notice=$db->getrow($msg_qry);

?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr><td colspan="3" height="6"><strong>Notice</strong></td></tr>
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
    <td align="left" valign="middle"><?php echo ucfirst($from_notice['subject']); ?></td>
  </tr>
   <tr>
    <td class="normal" valign="top">Message</td>
    <td class="normal" valign="top">:</td>
    <td align="left" valign="top" class="normal"><?php echo $from_notice['message']; ?></td>
  </tr>
   <tr>
    <td  class="normal">Sent On</td>
    <td class="normal">:</td>
    <td align="left" valign="middle"><?php echo func_date_conversion("Y-m-d ","d-m-Y ",$from_notice['created_on']);?></td>
  </tr>
 </table>
        </td>
		<td width="1" class="bgcolor_02"></td>
	</tr>
	<tr><td width="1" class="bgcolor_02"></td><td height="20" >&nbsp;</td><td width="1" class="bgcolor_02"></td></tr>
	<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>
</table>
<br />
<?php }?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	  <td colspan="3" height="6"><strong>Reply</strong></td>
	</tr>
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
   <tr>
    <td  class="normal">Received On</td>
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
	  <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;Sent Notices  </td>
	</tr>
	<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td>
			
		</td>
		<td width="1"class="bgcolor_02" ></td>
	</tr>
	<tr>
		<td height="19" width="1" class="bgcolor_02"></td>
		<td><form action="?pid=57&action=sentmails" method="post" name="fee_search">
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
			</form></td>
		<td width="1" class="bgcolor_02"></td>
	</tr>					
	<tr><td width="1" class="bgcolor_02"></td>
	  <td  align="center" valign="top" >	
     
			<table width="98%" border="0" cellspacing="0" cellpadding="0" class="tbl_grid">
			<tr><td height="26" align="right" valign="middle" colspan="6">Note : Click on Message to view full message</td></tr>
				<tr class="bgcolor_02">
					<td width="17%"   align="left" valign="middle">&nbsp;&nbsp;To<br />
				  [Person Type]</td>
					<td width="21%" align="left" valign="middle">&nbsp;&nbsp;Subject</td>
					<td width="33%"   align="left" valign="middle">&nbsp;&nbsp;Messgae </td>
					<td width="7%"  align="left">&nbsp;&nbsp;Status</td>
					<td width="15%"  align="left">&nbsp;&nbsp;Sent&nbsp;on</td>
					<td width="7%"   align="center">&nbsp;&nbsp;Action</td>
				</tr>
		<?php
				     foreach($sel_messages as $each_message){
					 if($each_message['to_type']=='student'){
					  $studentdet_arr = get_studentdetails($each_message['to_id']);
					  $to_name = $studentdet_arr['pre_name'].'['.$each_message['to_id'].']';
					 }
					  if($each_message['to_type']=='staff'){
					   $staff_arr =  get_staffdetails($each_message['to_id']);
					   $to_name = $staff_arr['st_firstname'].' '.$staff_arr['st_lastname'].'['.$each_message['to_id'].']';
					  }
					  if($each_message['to_type']=='admin'){
					   $admin_arr = $db->getrow("select * from es_admins where es_adminsid=".$each_message['to_id']);
					   $to_name = $admin_arr['admin_fname'];
					  }
				?>
				<tr>
					<td height="26" align="left" valign="middle"><strong>&nbsp;<?php echo $to_name;?><br />[<?php echo $each_message['to_type']; ?>]</strong></td>
					<td align="left" valign="middle" class="narmal">&nbsp;&nbsp;<?php $spchar = array('<p>','</p>');echo ucfirst(substr(str_replace($spchar,'',$each_message['subject']), 0,10))."";?></td>
					<td align="left" valign="middle" class="narmal"><a href="?pid=57&action=fullmessage_sent&es_messagesid=<?php echo $each_message['es_messagesid']; ?>" target="_blank" onclick="window.open(this.href, this.target,'height=500px,width=700px,scrollbars=yes'); return false" style="text-decoration:none;" class="narmal" title="Click here to view full Message"><?php $spchar = array('<p>','</p>');echo ucfirst(substr(str_replace($spchar,'',$each_message['message']), 0,20))."..";?></a></td>	
					<td align="left" valign="middle" class="narmal">&nbsp;&nbsp;<?php echo $each_message['read_status'];?></td>				
					<td align="left" valign="middle" class="narmal">&nbsp;&nbsp;<?php echo func_date_conversion("Y-m-d ","d-m-Y ",$each_message['created_on']);?></td>
					<td align="center" valign="middle" class="narmal">&nbsp;&nbsp;<?php if (in_array("22_4", $admin_permissions)) {?><strong><a href="?pid=57&action=deletesent&es_messagesid=<?php echo $each_message['es_messagesid']; ?>&start=<?php echo $start;?>" onClick="return confirm('Are you sure you want to  delete ?')" title="Delete" class="narmal"><img src="images/b_drop.png" border="0" /></a></strong><?php }else{ echo "-"; }?></td>
				</tr>   
			                  
<?php 
	}
 ?>
				<tr>
					<td height="26" align="center" valign="middle" colspan="6"><?php paginateexte($start, $q_limit, $no_records, "action=sentmails".$PageUrl);?></td>
				</tr> 
				<tr height="25">
                   <td align="right" colspan="6" style="padding-right:5px;"><?php if (in_array("22_6", $admin_permissions)) {?><input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=57&action=print_reply_list&start=<?php echo $start.$PageUrl; ?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /><?php }?></td>                   
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
<?php } else {?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr><td colspan="3" height="6"></td></tr>
	<tr>
	  <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;Sent Notices </td>
	</tr>
	<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>
	
	<tr>
		<td height="19" width="1" class="bgcolor_02"></td>
		<td><form action="?pid=57&action=sentmails" method="post" name="fee_search">
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
			</form></td>
		<td width="1" class="bgcolor_02"></td>
	</tr>					
	<tr><td width="1" class="bgcolor_02"></td>
	  <td  align="center" valign="top">
	  <table width="98%" border="0" cellspacing="0" cellpadding="0" class="tbl_grid">
	  <tr><td height="26" align="right" valign="middle" colspan="6">Note : Click on Message to view full message</td></tr>
				<tr class="bgcolor_02">
					<td width="17%"   align="left" valign="middle">&nbsp;&nbsp;To<br />
				  [Person Type]</td>
					<td width="21%" align="left" valign="middle">&nbsp;&nbsp;Subject</td>
					<td width="33%"   align="left" valign="middle">&nbsp;&nbsp;Messgae </td>
					<td width="7%"  align="left">&nbsp;&nbsp;Status</td>
					<td width="15%"  align="left">&nbsp;&nbsp;Sent&nbsp;on</td>
					<td width="7%"   align="center">&nbsp;&nbsp;Action</td>
				</tr>
	  <tr><td colspan="6" align="center">No&nbsp;Message&nbsp;Found</td></tr>
	  </table>
	  </td>
	  </td>
		<td width="1" class="bgcolor_02"></td>
	</tr>
	<tr><td width="1" class="bgcolor_02"></td><td height="20" >&nbsp;</td><td width="1" class="bgcolor_02"></td></tr>
	<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>
</table>
<?php } }?>
<?php if($action=="fullmessage_sent"){
if($details_message['to_type']=='student'){
					  $studentdet_arr = get_studentdetails($details_message['to_id']);
					  $to_name = $studentdet_arr['pre_name']. '&nbsp;&lt;'.$details_message['to_id'].'&gt;'."&nbsp;(".ucfirst($details_message['to_type']).")";
					  $cl_dep = classname($studentdet_arr['pre_class']);
					  $lable = "Class";
					 }
					  if($details_message['to_type']=='staff'){
					   $staff_arr =  get_staffdetails($details_message['to_id']);
					   $to_name = $staff_arr['st_firstname'].' '.$staff_arr['st_lastname']. '&nbsp;&lt;'.$details_message['to_id'].'&gt;'."&nbsp;(".ucfirst($details_message['to_type']).")";
					   $cl_dep = deptname($staff_arr['st_department'])."&nbsp;[ ".postname($staff_arr['st_post'])." ]";
					   $lable = "Department / Post";
					  }
					  if($details_message['to_type']=='admin'){
					   $admin_arr = $db->getrow("select * from es_admins where es_adminsid=".$details_message['to_id']);
					   $to_name = $admin_arr['admin_fname']. '&nbsp;&lt;'.$admin_arr['admin_username'].'&gt;'."&nbsp;(".ucfirst($details_message['to_type']).")";
					   $cl_dep ="";
					  $lable = "";
					  }
					

?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr><td colspan="3" height="6"><strong>Notice</strong></td></tr>
		<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>
	<tr>
		<td height="19" width="1" class="bgcolor_02"></td>
		<td>&nbsp;</td>
		<td width="1" class="bgcolor_02"></td>
	</tr>					
	<tr><td width="1" class="bgcolor_02"></td>
	  <td  align="center" valign="top"><table width="96%" border="0" cellspacing="0" cellpadding="0">
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
   <tr>
    <td  class="normal">Sent On</td>
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
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	       VALUES('".$_SESSION['eschools']['admin_id']."','es_notice_messages','Send Notice','Received Replies','','Print Received Notices','".$_SERVER['REMOTE_ADDR']."',NOW())";
     $log_insert_exe=mysql_query($log_insert_sql);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Received Notices</strong></td>
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
					  $from_name = $studentdet_arr['pre_name'].'<'.$each_message['from_id'].'>';

					 }
					  if($each_message['from_type']=='staff'){
					   $staff_arr =  get_staffdetails($each_message['from_id']);
					   $from_name = $staff_arr['st_firstname'].' '.$staff_arr['st_lastname'].'<'.$each_message['from_id'].'>';
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
	       VALUES('".$_SESSION['eschools']['admin_id']."','es_notice_messages','Send Notice','Sent Notices','','Print Replied Notices','".$_SERVER['REMOTE_ADDR']."',NOW())";
     $log_insert_exe=mysql_query($log_insert_sql);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Replied Notices</strong></td>
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
					<td width="13%"  align="left">&nbsp;&nbsp;Sent&nbsp;On</td>
					
				</tr>
		<?php
				     foreach($sel_messages as $each_message){
					 if($each_message['to_type']=='student'){
					  $studentdet_arr = get_studentdetails($each_message['to_id']);
					  $from_name = $studentdet_arr['pre_name'].'['.$each_message['to_id'].']';
					 }
					  if($each_message['to_type']=='staff'){
					   $staff_arr =  get_staffdetails($each_message['to_id']);
					   $from_name = $staff_arr['st_firstname'].' '.$staff_arr['st_lastname'].'['.$each_message['to_id'].']';
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