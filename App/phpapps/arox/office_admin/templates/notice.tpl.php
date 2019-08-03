<?php

if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}

include("includes/js/fckeditor/fckeditor.php") ;?>
<script language="javascript" type="text/javascript">
	
	function fileBrowserCallBack(field_name, url, type, win) {
		// This is where you insert your custom filebrowser logic
		alert("Filebrowser callback: field_name: " + field_name + ", url: " + url + ", type: " + type);

		// Insert new URL, this would normaly be done in a popup
		win.document.forms[0].elements[field_name].value = "someurl.htm";
	}
	
	function del_notice(noticeid){
		if (confirm("Are you sure you want to delete?")){
			document.location.href = '?pid=37&action=deletenotice&nid='+noticeid;
		}
	}

	<?php /*?>function validatenotice(){
		
		var titletext  = document.getElementById("t_title");
		var subjectext = document.getElementById("t_subject");

		if (titletext.value==""){
			alert("Please enter title");
			return false
		}

		if (subjectext.value==""){
			alert("Please enter subject");
			return false;
		}
		if (blogDesc.value==""){
			alert("Please enter notice");
			return false;
		}
		
		
		
		
		
		return true;
	}<?php */?>
	
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
<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
	 </tr>
	<tr>
	  <td height="25" colspan="3" class="bgcolor_02">&nbsp; Notice Board </td>
	</tr>
	<tr>
		<td  width="1" class="bgcolor_02"></td>
		<td align="right" style="padding:5px;">
<form action="" method="post" >
	<input type="hidden" name="action" value="addnotice" >
	<?php if (in_array("31_1", $admin_permissions)) {?><a href=" ?pid=37&action=addnotice"><input type="submit" name="addnotice" id="addnotice" value="add Notice" class="bgcolor_02" style="font-size:13px;cursor:pointer; height:20px;"  title="Add new Notice"></a><?php }?>
</form>
		</td>
		<td  width="1" class="bgcolor_02"></td>
	</tr>
	<tr>
		<td  width="1" class="bgcolor_02"></td>
		<td  align="center" valign="top">
			<table width="100%" border="1" cellpadding="0" cellspacing="0" class="tbl_grid">
				<tr class="bgcolor_02">
					<td width="7%" height="25" align="center">S No</td>
					<td width="13%" height="25" align="center">Added On</td>
					<td width="57%" align="center">Title </td>
				<?php /*?>	<td width="32%" align="center">Subject </td><?php */?>
					<td width="23%" align="center">Action</td>
				</tr>
<?php
	
	$rownum = 1;	
	if (count($notice_det)>0) {
	foreach ($notice_det as $eachrecord){
		$zibracolor = ($rownum%2==0)?"even":"odd";	
		$message    = $eachrecord->es_message;			  
				  
?>
                    
				<tr class="<?php echo $zibracolor; ?>">
				<td align="center" height="25"><?php echo $rownum; ?></td>
					<td align="center" height="25"><?php echo displayDate($eachrecord->es_date); ?></td>
					<td align="left">&nbsp;<?php echo $eachrecord->es_title; ?> </td>
				<?php /*?>	<td align="left"><?php echo $eachrecord->es_subject;  ?> </td><?php */?>
					<td align="center"><?php if (in_array("31_2", $admin_permissions)) {?><a href=" ?pid=37&action=editnotice&nid=<?php echo $eachrecord->es_noticeId; ?>"><img src="images/b_edit.png"width="16" height="16" hspace="2"  border="0" /></a><?php }else{ echo "-"; }?>
					<?php if (in_array("31_3", $admin_permissions)) {?><a href="javascript:del_notice(<?php echo $eachrecord->es_noticeId; ?>)" title="Delete"><img src="images/b_drop.png" border="0" /></a><?php }else{ echo "-"; }?>&nbsp;&nbsp; <?php if (in_array("31_4", $admin_permissions)) {?><a href="javascript: void(0)" onclick="popup_letter('?pid=37&action=print&nid=<?php echo $eachrecord->es_noticeId;?>')" ><img src="images/print_16.png" border="0" title="Print" alt="Print" /></a><?php }?></td>
				</tr>
<?php
					
	$rownum++; 
	}
	
?>
				<tr>
					<td colspan="4" align="center" height="25">
<?php 
// pagination	
paginateexte($start, $q_limit, $no_rows, "action=noticeboard&column_name=" . $orderby );
?>
					</td>
				</tr>
				<?php /*?><tr height="25">
                   <td align="right" colspan="4" style="padding-right:5px;"><?php if (in_array("31_5", $admin_permissions)) {?><input type="button" style="cursor:pointer; height:20px;" value="Print" onclick="window.open('?pid=37&action=print_notices&start=<?php echo $start; ?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /><?php }?></td>                   
                </tr><?php */?>
				<?php } 
				else { ?>
				<tr>
					<td colspan="4" align="center" height="25" style="color:#FF0000"> <?php echo" No records found"; ?> </td></tr>
				
				<?php }?>
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
if ($action=='addnotice'){
?>
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
	 </tr>
	<tr>
	  <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;Add Notice</td>
	</tr>
	
	<tr>
    
    
		<td width="1" class="bgcolor_02"></td>
		<td  align="left" valign="top">
			<table width="100%"  border="0" cellpadding="0" cellspacing="0">
				<form action="" method="post">
                
                	<tr>
					<td align="right" valign="top" style="padding:5px" colspan="2"><span style="color:#FF0000">Note : * denotes mandatory 	
			        </span></td>
				</tr>
                
                
                
                
                
				<tr height="40">
					<td align="left" valign="top" class="narmal">&nbsp;Title</td>
				  <td align="left" valign="top">&nbsp;<input type="text" name="title" size="70" id="title"  /><span style="color:#FF0000">*</span>			</td>
				</tr>
				<?php /*?><tr height="40"> 
					<td align="left" valign="top" class="narmal" >&nbsp;Subject</td>
					<td align="left" valign="top">&nbsp;<input name="subject" type="text" size="70" id="subject"  />
					<span style="color:#FF0000">*</span>
					</td>
				</tr><?php */?>
				<tr height="40">
					<td align="left" valign="top" class="narmal" >&nbsp;Notice</td>
					<td align="left" valign="top" >&nbsp;<?php $sBasePath = $_SERVER['PHP_SELF'] ;
																			  $sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "?pid" ) ) ;
																			  $sBasePath = $sBasePath."includes/js/fckeditor/";
																			   
																			  $oFCKeditor = new FCKeditor('blogDesc') ;
																			   
																			  $oFCKeditor->BasePath	= $sBasePath ;
																			  $oFCKeditor->Width	= 550;
																			  $oFCKeditor->Value	= html_entity_decode($ContentData['blogDesc']) ;
																			  $oFCKeditor->Create() ;
																		?>
                                                                        <span style="color:#FF0000">*</span>
                                                                        
                                                                        </td>
				</tr>
				<tr>
					
					<td colspan="2"  align="center"><input name="Submit" type="submit" class="bgcolor_02" value="Submit" style="font-size:13px;cursor:pointer; height:20px;"  /></td>
			   </tr>
			  </form>
			   <tr><td height="10" colspan="2"></td></tr>
		  </table>			
		</td>
		<td width="1" class="bgcolor_02"></td>
	</tr>
    <tr><td height="2" colspan="3" class="bgcolor_02"></td></tr>
</table>
<?php 
}
 
if ($action=='editnotice'){
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td  colspan="3" ></td>
	 </tr>
	<tr><td height="25" colspan="3" class="bgcolor_02">&nbsp;Edit Notice </td></tr>
	<tr>
    <tr><td  colspan="3" ></td></tr>
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td  align="left" valign="top">
			<table width="95%"  border="0" cellpadding="0" cellspacing="0">
	 			<form action="" method="post">
				<tr height="40"><td colspan="2" align="left" valign="top"></td></tr>
				<tr  height="40" >
					<td  align="left" valign="top" class="narmal" >&nbsp;Title</td>
					<td  align="left" valign="top"   >&nbsp;<input type="text" name="title" value="<?php echo $notice_det[0]->es_title ?>"/ size="80">&nbsp;<span style="color:#FF0000">*</span>
					</td>
				</tr>
			<?php /*?>	<tr height="40">
					<td width="16%" align="left" valign="top" class="narmal"  >&nbsp;Subject</td>
					<td width="84%" align="left" valign="top" >&nbsp;<input type="text" name="subject" size="80"  value="<?php echo $notice_det[0]->es_subject ?>"/>&nbsp;<span style="color:#FF0000">*</span></td>
				</tr><?php */?>
				<tr height="40">
					<td  align="left" valign="top" class="narmal" >&nbsp;Notice</td>
					<td  align="left" valign="top"   >&nbsp;<?php $sBasePath = $_SERVER['PHP_SELF'] ;
															  $sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "?pid" ) ) ;
															  $sBasePath = $sBasePath."includes/js/fckeditor/";
															   
															  $oFCKeditor = new FCKeditor('blogDesc') ;
															  $oFCKeditor->BasePath	= $sBasePath ;
															  $oFCKeditor->Width	= 550;
															  $oFCKeditor->Value		= html_entity_decode($notice_det[0]->es_message) ;
															  $oFCKeditor->Create() ;
														?>&nbsp;<span style="color:#FF0000">*</span>	
					</td>
				</tr>
				
				<tr>
					<td colspan="2" align="center" valign="top" class="narmal">
					<input name="update" type="submit" class="bgcolor_02" value="update" style="font-size:13px;cursor:pointer; height:20px;"/></td>
				</tr>
				</form>
			</table>
		</td>
		<td width="1" class="bgcolor_02"></td>
	</tr>
	<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>
</table>
<?php 
}
?>
<?php if ($action=='print'){
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	       VALUES('".$_SESSION['eschools']['admin_id']."','es_notice','Notice Board','','','Print','".$_SERVER['REMOTE_ADDR']."',NOW())";
     $log_insert_exe=mysql_query($log_insert_sql);
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
					<td height="25"  align="left" valign="top" class="narmal">&nbsp;</td>
					<td height="25"  align="left" valign="middle" class="narmal">&nbsp;Added On</td>
					<td  align="center" valign="middle" class="narmal">:</td>
					<td  align="left" valign="middle" ><?php echo displayDate( $notice_det[0]->es_date); ?> </td>
				</tr>
				<tr>
					<td width="1%" height="25"  align="left" valign="top" class="narmal">&nbsp;</td>
					<td width="12%"  align="left" valign="middle" class="narmal">&nbsp;Title</td>
					<td width="3%"  align="center" valign="middle" class="narmal">:</td>
					<td width="84%" height="25"  align="left" valign="middle" ><?php echo $notice_det[0]->es_title; ?></td>
				</tr>
				<?php /*?><tr>
					<td  height="25" align="left" valign="top" class="narmal">&nbsp;</td>
					<td height="25"  align="left" valign="middle" class="narmal">&nbsp;Subject</td>
					<td align="center" valign="middle" class="narmal">:</td>
					<td height="25"  align="left" valign="middle" ><?php echo $notice_det[0]->es_subject ;?></td>
				</tr><?php */?>
				<tr>
					<td height="25"  align="left" valign="top" class="narmal">&nbsp;</td>
					<td height="25"  align="left" valign="middle" class="narmal">&nbsp;Notice</td>
					<td  align="center" valign="middle" class="narmal">:</td>
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
		
<?php if($action == 'print_notices'){
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	       VALUES('".$_SESSION['eschools']['admin_id']."','es_notice','Notice Board','','','Print','".$_SERVER['REMOTE_ADDR']."',NOW())";
     $log_insert_exe=mysql_query($log_insert_sql);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;Notice Board</strong></td>
              </tr>
			  <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top"><br />
				<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tbl_grid">
				<tr class="bgcolor_02">
				<td width="7%" height="28" align="center">S No</td>
					<td width="33%" height="28" align="center">Added On</td>
					<td width="30%" align="left">Title </td>
				<?php /*?>	<td width="30%" align="left">Subject </td><?php */?>
					
				</tr>
<?php
	
	$rownum = 1;	
	if (count($notice_det)>0) {
	foreach ($notice_det as $eachrecord){
		$zibracolor = ($rownum%2==0)?"even":"odd";	
		$message    = $eachrecord->es_message;			  
				  
?>
                    
				<tr class="<?php echo $zibracolor; ?>">
					<td height="27" align="center"><?php echo $rownum ; ?></td>
					<td height="27" align="center"><?php echo displayDate($eachrecord->es_date); ?></td>
					<td align="left" valign="middle"><?php echo $eachrecord->es_title; ?> </td>
				<?php /*?>	<td align="left" valign="middle"><?php echo $eachrecord->es_subject;  ?> </td><?php */?>
					
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
		
		