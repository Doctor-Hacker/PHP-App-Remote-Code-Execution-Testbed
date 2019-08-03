<?php

?>
<script language="javascript" type="text/javascript">
	
	function fileBrowserCallBack(field_name, url, type, win) {
		// This is where you insert your custom filebrowser logic
		alert("Filebrowser callback: field_name: " + field_name + ", url: " + url + ", type: " + type);

		// Insert new URL, this would normaly be done in a popup
		win.document.forms[0].elements[field_name].value = "someurl.htm";
	}
	
	function del_notice(noticeid){
		if (confirm("Are you sure want to delete?")){
			document.location.href = '?pid=37&action=deletenotice&nid='+noticeid;
		}
	}

	function validatenotice(){
		
		var titletext  = document.getElementById("t_title");
		var subjectext = document.getElementById("t_subject");

		if (titletext.value==""){
			alert("Please enter the Title");
			return false
		}

		if (subjectext.value==""){
			alert("Please enter the Subject");
			return false;
		}
		return true;
	}
	
</script>
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
<?php 
//Manage Notice Starts Here
if ($action=="noticeboard"){

?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
	 </tr>
	<tr>
	  <td height="25" colspan="3" class="bgcolor_02">&nbsp; Notice Board </td>
	</tr>
	<tr>
		<td  width="1" class="bgcolor_02"></td>
		<td align="right" style="padding:10px;">

		</td>
		<td  width="1" class="bgcolor_02"></td>
	</tr>
	<tr>
		<td  width="1" class="bgcolor_02"></td>
		<td  align="center" valign="top">
			<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tbl_grid">
				<tr class="bgcolor_02">
					<td width="16%" height="28" align="center">Date</td>
					<td width="62%" align="left">Title </td>
										<td width="22%" align="center">Action</td>
				</tr>
<?php
	
	$rownum = 1;	
	if (count($notice_det)>0) {
	foreach ($notice_det as $eachrecord){
		$zibracolor = ($rownum%2==0)?"even":"odd";	
		$message    = $eachrecord->es_message;			  
				  
?>
                    
				<tr class="<?php echo $zibracolor; ?>">
					<td height="27" align="center"><?php echo displayDate($eachrecord->es_date); ?></td>
					<td align="left" valign="middle"><?php echo $eachrecord->es_title; ?> </td>
										<td align="center"><a href=" ?pid=33&action=viewnotice&nid=<?php echo $eachrecord->es_noticeId; ?>"><img src="images/b_browse.png"width="16" height="16" hspace="2"  border="0" /></a>&nbsp;&nbsp;<a href="javascript: void(0)" onclick="popup_letter('?pid=33&action=print&nid=<?php echo $eachrecord->es_noticeId;?>')" ><img src="images/print_16.png" border="0" title="Print " alt="Print " /></a>
					</td>
				</tr>
<?php
					
	$rownum++; 
	}
	
?>
				<tr>
					<td height="27" colspan="4" align="center">
<?php 
// pagination	
paginateexte($start, $q_limit, $no_rows, "action=noticeboard&column_name=" . $orderby );
?>					</td>
				</tr>
				<tr height="25">
                   <td align="right" colspan="4" style="padding-right:5px;"><input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=33&action=print_notices&start=<?php echo $start; ?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /></td>                   
                </tr>
				<?php } else {?>
				<tr>
					<td height="30" colspan="4" align="center" class="narmal">No Records Found</td>
				</tr>
				<?php } ?>
		  </table>
		</td>
		<td width="1" class="bgcolor_02"></td>
	</tr>
    <tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>
</table>

<?php
}

/**
* Adding new notice
*/

 
if ($action=='viewnotice'  || $action=='print'){
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
	 </tr>
	<tr>
	  <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;Notice </strong></td>
	</tr>
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td  align="left" valign="top">
			<table width="95%"  border="0" cellpadding="0" cellspacing="0">
	 		
				<tr><td colspan="4" align="left" valign="top"></td></tr>
				<tr>
					<td width="5%" height="25"  align="left" valign="top" class="narmal">&nbsp;</td>
					<td width="8%"  align="left" valign="middle" class="narmal">&nbsp;&nbsp;&nbsp;Title</td>
					<td width="1%"  align="left" valign="middle" class="narmal">:</td>
					<td width="86%" height="25"  align="left" valign="middle" ><?php echo $notice_det[0]->es_title; ?></td>
				</tr>
								<tr>
					<td height="25"  align="left" valign="top" class="narmal">&nbsp;</td>
					<td height="25"  align="left" valign="middle" class="narmal">&nbsp;&nbsp;&nbsp;Notice</td>
					<td  align="left" valign="middle" class="narmal">:</td>
					<td  align="left" valign="middle" ><?php echo $notice_det[0]->es_message ;?></td>
				</tr>
				<?php if($action=='viewnotice'){?>
				<tr>
					<td colspan="4" align="center" valign="top" class="narmal">
					<input  type="button" class="bgcolor_02" value="Back" style="padding:5px;" onclick="javascript:history.go(-1)"/></td>
				</tr>
				<?php }?>
			</table>
		</td>
		<td width="1" class="bgcolor_02"></td>
	</tr>
	<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>
</table>
<?php 
}
?>
		
<?php if($action == 'print_notices'){?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp; Notice</strong></td>
              </tr>
			  <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top"><br />
				<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tbl_grid">
				<tr class="bgcolor_02">
					<td width="42%" height="28" align="left" valign="middle">&nbsp;&nbsp;&nbsp;&nbsp;Date</td>
					<td width="58%" align="left">Title </td>
										
				</tr>
<?php
	
	$rownum = 1;	
	if (count($notice_det)>0) {
	foreach ($notice_det as $eachrecord){
		$zibracolor = ($rownum%2==0)?"even":"odd";	
		$message    = $eachrecord->es_message;			  
				  
?>
                    
				<tr class="<?php echo $zibracolor; ?>">
					<td height="27" align="left" valign="middle">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo displayDate($eachrecord->es_date); ?></td>
					<td align="left" valign="middle"><?php echo $eachrecord->es_title; ?> </td>
										
				</tr>
<?php
					
	$rownum++; 
	}
	
?>
				
				<?php } else {?>
				<tr>
					<td height="30" colspan="3" align="center" class="narmal">No Records Found</td>
				</tr>
				<?php } ?>
			</table>

				</td>
				
                <td width="1" class="bgcolor_02"></td>
              </tr>
              
                <td height="1" colspan="3" class="bgcolor_02"></td>
                </tr>
            </table>
<?php }?>
		