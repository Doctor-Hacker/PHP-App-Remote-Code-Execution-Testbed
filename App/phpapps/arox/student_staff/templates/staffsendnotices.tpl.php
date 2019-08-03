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
<?php if($action=='replyto'){?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Send Reply</span></td>
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
					<tr>
					<td width="18%" class="narmal"  align="left">Name / Username</td>
					<td width="2%" align="center"><strong> :</strong></td>
					<td width="80%" height="30" align="left"><?php echo $from_name;?> </td>
					</tr>
					<tr>
					<td width="18%" valign="top" class="narmal"  align="left"> Subject </td>
					<td width="2%" valign="top"  align="center"><strong> :</strong></td>
					<td width="80%" height="30" valign="top" align="left"><?php echo $html_obj->draw_inputfield('subject',$subject,'','class="input_field"');?><font color="#FF0000">&nbsp;*</font></td>
					</tr>
					<tr>
					<td width="18%" valign="top" class="narmal"  align="left"> Message </td>
					<td width="2%" valign="top"  align="center"><strong> :</strong></td>
					<td width="80%" height="30" valign="top"  align="left"><table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php echo $html_obj->draw_textarea('message','','rows="10"');?></td>
    <td valign="bottom"><font color="#FF0000">&nbsp;*</font></td>
  </tr>
</table></td>
					</tr>
					<tr>
					<td width="18%" align="left" valign="top" ></td>
					<td width="2%" valign="top"  align="center"></td>
					<td width="80%" height="30" valign="middle" align="left">
					<input type="hidden" name="usertype" value="<?php echo $usertype;?>" />
					<input type="hidden" name="es_adminsid" value="<?php echo $notice_det['from_id'];?>" />
					<input type="submit" name="submit_staff" class="bgcolor_02" value="Send"/></td>
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
<?php  } if($action=="mails_received"){?>

<?php if(count($sel_messages)>0){?>  
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr><td colspan="3" height="6"></td></tr>
	<tr>
	  <td height="25" colspan="3" class="bgcolor_02">&nbsp;Received Notices</td>
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
			
			<tr>
                   <td align="right" colspan="5" style="padding-right:5px;">Note : Click on Message to view full message</td>                   
                </tr>
				<tr class="bgcolor_02">
					<td width="20%"   align="left" valign="middle">&nbsp;&nbsp;From<br />[Person Type]</td>
					<td width="25%" align="left" valign="middle">&nbsp;&nbsp;Subject</td>
					<td width="30%"   align="left" valign="middle">&nbsp;&nbsp;Messgae </td>
					<td width="13%"  align="left">&nbsp;&nbsp;Received&nbsp;On</td>
					<td width="12%"   align="center">&nbsp;&nbsp;Action</td>
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
					<td align="left" valign="middle" class="narmal"><a href="?pid=31&action=fullmessage&es_messagesid=<?php echo $each_message['es_messagesid']; ?>" target="_blank" onclick="window.open(this.href, this.target,'height=500px,width=700px'); return false" style="text-decoration:none;" class="narmal" title="Click here to view full Message"><?php $spchar = array('<p>','</p>');echo ucfirst(substr(str_replace($spchar,'',$each_message['message']), 0,30))."..";?></a></td>					
					<td align="left" valign="middle" class="narmal">&nbsp;&nbsp;<?php echo func_date_conversion("Y-m-d ","d-m-Y ",$each_message['created_on']);?></td>
					<td align="center" valign="middle" class="narmal"><?php if($each_message['replay_status']=='notreplied'){?><strong><a href="?pid=31&action=replay&es_messagesid=<?php echo $each_message['es_messagesid']; ?>"  title="Reply" class="narmal">Reply</a></strong><?php } /*else { echo "Replied";}*/?>&nbsp;&nbsp;<strong><a href="?pid=31&action=delete&es_messagesid=<?php echo $each_message['es_messagesid']; ?>&start=<?php echo $start;?>" onClick="return confirm('Are you sure you want to delete ?')" title="Delete" class="narmal"><img src="images/b_drop.png" border="0" /></a></strong></td>
				</tr>   
			                  
<?php 
	}
 ?>
				<tr>
					<td height="26" align="center" valign="middle" colspan="5"><?php paginateexte($start, $q_limit, $no_records, "action=mails_received".$PageUrl);?></td>
				</tr> 
				<tr height="25">
                   <td align="right" colspan="5" style="padding-right:5px;"><input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=31&action=print_not_list&start=<?php echo $start.$PageUrl; ?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /></td>                   
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
	  <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;Notice</td>
	</tr>
	<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>
	
	<tr>
		<td height="19" width="1" class="bgcolor_02"></td>
		<td><form action="" method="post" name="fee_search">
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
			
			<tr>
                   <td align="right" colspan="5" style="padding-right:5px;">Note : Click on Message to view full message</td>                   
                </tr>
				<tr class="bgcolor_02">
					<td width="20%"   align="left" valign="middle">&nbsp;&nbsp;From<br />[Person Type]</td>
					<td width="25%" align="left" valign="middle">&nbsp;&nbsp;Subject</td>
					<td width="30%"   align="left" valign="middle">&nbsp;&nbsp;Messgae </td>
					<td width="13%"  align="left">&nbsp;&nbsp;Received&nbsp;On</td>
					<td width="12%"   align="center">&nbsp;&nbsp;Action</td>
				</tr>
<tr>
                   <td align="center" colspan="5" style="padding-right:5px;">
	  No Records Found
	  </td></tr></table>
		
        </td>
		<td width="1" class="bgcolor_02"></td>
	</tr>
	<tr><td width="1" class="bgcolor_02"></td><td height="20" >&nbsp;</td><td width="1" class="bgcolor_02"></td></tr>
	<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>
</table>
<?php }?>
<?php }?>
<?php if($action == 'print_not_list'){?>
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
    <td width="21%" class="admin">Emp.Id</td>
    <td width="42%">:&nbsp;<?php echo $_SESSION['eschools']['user_id'];?></td>
    <td width="17%" class="admin">Staff Name</td>
    <td width="20%">:&nbsp;<?php 
	$query = get_staffdetails($_SESSION['eschools']['user_id']);
	echo $query['st_firstname']." ".$query['st_lastname'];?></td>
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

<?php if($action=="fullmessage"){


if($details_message['from_type']=='student'){
					  $studentdet_arr = get_studentdetails($details_message['from_id']);
					  $from_name = $studentdet_arr['pre_name']. ''."&nbsp;(".ucfirst($details_message['from_type']).")";
					 }
					  if($details_message['from_type']=='staff'){
					   $staff_arr =  get_staffdetails($details_message['from_id']);
					   $from_name = $staff_arr['st_firstname'].''."&nbsp;(".ucfirst($details_message['from_type']).")";
					  }
					  if($details_message['from_type']=='admin'){
					   $admin_arr = $db->getrow("select * from es_admins where es_adminsid=".$details_message['from_id']);
					   $from_name = $admin_arr['admin_fname1']. "&nbsp;(".ucfirst($details_message['from_type']).")";
					  
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
	  <td  align="center" valign="top"><table width="96%" border="0" cellspacing="3" cellpadding="2">
  <tr>
    <td width="16%" class="normal">From</td>
    <td width="1%" class="normal">:</td>
    <td width="83%" align="left" valign="middle"><?php echo ucfirst($from_name); ?>[<?php echo $details_message['from_type'];?>]</td>
  </tr>
   <tr>
    <td class="normal">Subject</td>
    <td class="normal">:</td>
    <td align="left" valign="middle"><?php echo ucfirst($details_message['subject']); ?></td>
  </tr>
   <tr>
    <td class="normal" valign="top">Message</td>
    <td class="normal" valign="top">:</td>
    <td align="left" valign="middle" class="normal"><?php echo $details_message['message']; ?></td>
  </tr>
   <tr>
    <td  class="normal">Receved On</td>
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
	  <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;Replied Notices </td>
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
					<td width="38%"   align="left" valign="middle">&nbsp;&nbsp;Messgae </td>
					<td width="13%"  align="left">&nbsp;&nbsp;Sent&nbsp;On</td>
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
					<td height="26" align="left" valign="middle"><strong>&nbsp;<?php echo  $to_name;?>[<?php echo $each_message['to_type'];?>]</strong></td>
					<td align="left" valign="middle" class="narmal">&nbsp;&nbsp;<?php echo ucfirst(substr(str_replace($spchar,'',$each_message['subject']), 0,15))."";
					?></td>
					<td align="left" valign="middle" class="narmal"><a href="?pid=31&action=fullmessage_sent&es_messagesid=<?php echo $each_message['es_messagesid']; ?>" target="_blank" onclick="window.open(this.href, this.target,'height=500px,width=700px'); return false" style="text-decoration:none;" class="narmal" title="Click here to view full Message"><?php $spchar = array('<p>','</p>');echo ucfirst(substr(str_replace($spchar,'',$each_message['message']), 0,50))."..";?></a></td>					
					<td align="left" valign="middle" class="narmal">&nbsp;&nbsp;<?php echo func_date_conversion("Y-m-d ","d-m-Y ",$each_message['created_on']);?></td>
					<td align="center" valign="middle" class="narmal">&nbsp;&nbsp;<strong><a href="?pid=31&action=deletesent&es_messagesid=<?php echo $each_message['es_messagesid']; ?>&start=<?php echo $start;?>" onClick="return confirm('Are you sure you want to delete ?')" title="Delete" class="narmal"><img src="images/b_drop.png" border="0" /></a></strong></td>
				</tr>   
			                  
<?php 
	}
 ?>
				<tr>
					<td height="26" align="center" valign="middle" colspan="5"><?php paginateexte($start, $q_limit, $no_records, "action=sentmails".$PageUrl);?></td>
				</tr> 
				<tr height="25">
                   <td align="right" colspan="5" style="padding-right:5px;"><input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=31&action=print_reply_list&start=<?php echo $start.$PageUrl; ?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /></td>                   
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
<?php } else{?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr><td colspan="3" height="6"></td></tr>
	<tr>
	  <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;Notice</td>
	</tr>
	<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>
	
	<tr>
		<td height="19" width="1" class="bgcolor_02"></td>
		<td><form action="" method="post" name="fee_search">
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
			
			<tr>
                   <td align="right" colspan="5" style="padding-right:5px;">Note : Click on Message to view full message</td>                   
                </tr>
				<tr class="bgcolor_02">
					<td width="20%"   align="left" valign="middle">&nbsp;&nbsp;From<br />[Person Type]</td>
					<td width="25%" align="left" valign="middle">&nbsp;&nbsp;Subject</td>
					<td width="30%"   align="left" valign="middle">&nbsp;&nbsp;Messgae </td>
					<td width="13%"  align="left">&nbsp;&nbsp;Received&nbsp;On</td>
					<td width="12%"   align="center">&nbsp;&nbsp;Action</td>
				</tr>
<tr>
                   <td align="center" colspan="5" style="padding-right:5px;">
	  No Records Found
	  </td></tr></table>
	  
	  </td>
		<td width="1" class="bgcolor_02"></td>
	</tr>
	<tr><td width="1" class="bgcolor_02"></td><td height="20" >&nbsp;</td><td width="1" class="bgcolor_02"></td></tr>
	<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>
</table>
<?php }}?>
<?php if($action == 'print_reply_list'){?>
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
    <td width="21%" class="admin">Emp.Id</td>
    <td width="42%">:&nbsp;<?php echo $_SESSION['eschools']['user_id'];?></td>
    <td width="17%" class="admin">Staff Name</td>
    <td width="20%">:&nbsp;<?php 
	$query = get_staffdetails($_SESSION['eschools']['user_id']);
	echo $query['st_firstname']." ".$query['st_lastname'];?></td>
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
<?php if($action=="fullmessage_sent"){


if($details_message['to_type']=='student'){
					  $studentdet_arr = get_studentdetails($details_message['to_id']);
					  $to_name = $studentdet_arr['pre_name']. "&nbsp;(".ucfirst($details_message['to_type']).")";
					 }
					  if($details_message['to_type']=='staff'){
					   $staff_arr =  get_staffdetails($details_message['to_id']);
					   $to_name = $staff_arr['st_firstname'].' '."&nbsp;(".ucfirst($details_message['to_type']).")";
					  }
					  if($details_message['to_type']=='admin'){
					   $admin_arr = $db->getrow("select * from es_admins where es_adminsid=".$details_message['to_id']);
					   $to_name = $admin_arr['admin_fname']. "&nbsp;(".ucfirst($details_message['to_type']).")";
					  
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
    <td width="16%" class="normal"> From</td>
    <td width="1%" class="normal">:</td>
    <td width="83%" align="left" valign="middle"><?php echo ucfirst($to_name); ?></td>
  </tr>
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
	<tr><td colspan="3" height="6"><strong>Reply</strong></td></tr>
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