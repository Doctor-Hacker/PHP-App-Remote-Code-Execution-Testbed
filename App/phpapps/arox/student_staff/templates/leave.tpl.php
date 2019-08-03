
	<?php if ($action == 'Leave') {
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Staff Annual Leaves </span></td>
              </tr>
			    
			
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="left" valign="top"></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr><td align="right" height="25" style="padding:10px;">&nbsp; <b>Leaves Balance : <?php 
					 $sql_gettotalleaves = "SELECT SUM(lev_leavescount) as total FROM  es_leavemaster WHERE lev_post=".$es_post." AND lev_from_date BETWEEN '".$from_acad."' and '".$to_acad."'  AND  lev_to_date  BETWEEN '".$from_acad."' and '".$to_acad."' "; 
					    $total_leaves = $db->getrow($sql_gettotalleaves);
						
					    $sss_qry = "SELECT COUNT(*) FROM  es_attend_staff WHERE at_staff_id='".$staffId."' AND (at_staff_attend = 'L' OR at_staff_attend = 'A')  AND (at_staff_remarks != 'Paid' OR at_staff_remarks = '') AND at_staff_date BETWEEN '".$from_acad."' AND '".$to_acad."'";
						$staff_used = $db->getone($sss_qry);
						
					     $balance = $total_leaves['total'] - $staff_used;
						 if($balance>0){echo $balance;}else{echo "0";}
					  
					  ?></b></td></tr>
					  
                      <tr>
                        <td align="left" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                                    <td colspan="6" align="left" valign="top"></td>
                                  </tr>
                                  <tr class="bgcolor_02">
                                   <td width="8%" align="center" class="admin" height="25">S No</td>
			                       <td width="21%" align="center" class="admin">Department</td>
			                       <td width="26%" align="center" class="admin">Post</td>
			<td width="25%" align="center" class="admin">Holiday Type </td>
			<td width="20%"  align="center"class="admin">Days</td>
			
		  </tr>
		  <?php 
		  //echo count($leavemaster_det);
			$rownum = $start+1;
			if(count($leavemaster_det)>0) {
			foreach ($leavemaster_det as $eachrecord){
			$zibracolor = ($rownum%2==0)?"even":"odd";
			?>	
		  <tr class="<?php echo $zibracolor;?>">
			<td align="center" class="narmal"><?php echo $rownum; ?></td>
			<td align="center" class="narmal"><?php echo deptname($eachrecord['lev_dept']); ?></td>
			<td align="center" class="narmal"><?php echo ucwords(strtolower(postname($eachrecord['lev_post']))); ?></td>
			<td align="center" class="narmal"><?php echo $eachrecord['lev_type']; ?></td>
			<td align="center" class="narmal"><?php echo $eachrecord['lev_leavescount']; ?></td>
		  </tr>
		  <?php 
		  $rownum++;
		  } ?>
		   <tr>
			<td colspan="6" align="center" class="narmal"><?php paginateexte($start, $q_limit, $no_rows, "&action=Leave");?></td>
		  </tr>
		  <?php
		   } else { ?>
		   <tr>
			<td colspan="6" align="center" class="narmal">No records found</td>
		  </tr>
		  <?php } ?>		 
		  <tr>                                </tr>
                        </table></td>
                      </tr>
			  <tr>
                <td height="25" colspan="5">&nbsp;&nbsp;</td>
              </tr>  
					 
                      <tr>
                        <td align="left" valign="top"></td>
                      </tr>
                      <tr>
                        <td align="left" valign="top"></td>
                      </tr>
                   
				    <tr>
                        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="5">
                                <tr>
                                  <td colspan="5" align="left" valign="top"></td>
                                </tr>
                             
                             
                              
					  
							  </table></td>
                            </tr>
                        </table></td>
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

<?php }?>

<?php 

if ($action == 'Leave') {
?>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Leave Letter</span></td>
              </tr>
			    
			
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td colspan="5" align="left" valign="top"></td>
                                </tr>
                                
                      <tr>
                    <td align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
					   <?php
					  $rownum = 1;	
				foreach($leaveletter_det as $eachrecord){
				$zibracolor = ($rownum%2==0)?"even":"odd";	
				$message=$eachrecord->leave_msg ;			  
				  ?>
                      <tr>
                        <td width="10%" height="25" align="left" class="narmal"> </td>			
						
					    <td width="10%" align="right" class="narmal"><a href=" ?pid=24&action=leaveletter_edit&sid=<?php echo $eachrecord->es_leaveleterId ; ?>"><img src="images/b_edit.png"width="16" height="16" hspace="2"  border="0" /></a>&nbsp;<a href="javascript: void(0)" onclick="newWindowOpen ('?pid=24&action=printleaveletter');"><img src="images/print_16.png" border="0" /></a>&nbsp;</td>
                      </tr>
                      <tr>
                        <td height="25" colspan="2" align="left" class="narmal"><?php echo $message;  ?> </td>			
						
					   
                      </tr>
                     <?php
					$rownum++;  }
					  ?>
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
<p>
  <script type="text/javascript">

function newWindowOpen(href)
{
    window.open(href,null, 'width=800,height=500,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');
	

}
</script>
  
  <?php }?>

<?php if ($action == 'leaveletter_edit') { ?>

<link href="includes/css/dateselector.css" rel="stylesheet" type="text/css">
<script language="JavaScript" src="./includes/scripts/datepicker/popup_lib.js"></script>
<script language="JavaScript" src="./includes/scripts/datepicker/dateselector.js"></script>
<script language="JavaScript" src="./includes/scripts/datepicker/colourselector.js"></script>
<script language="javascript" type="text/javascript" src="./includes/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript" src="./includes/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
	tinyMCE.init({
		mode : "textareas",
		theme : "advanced",
		plugins : "table,iespell,contextmenu,directionality",
		theme_advanced_buttons1_add_before : "",
		theme_advanced_buttons1_add : "fontselect,fontsizeselect",
		theme_advanced_buttons2_add : "forecolor,backcolor",
		theme_advanced_buttons2_add_before: "",		
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		content_css : "example_word.css",
	    plugi2n_insertdate_dateFormat : "%Y-%m-%d",
	    plugi2n_insertdate_timeFormat : "%H:%M:%S",
		external_link_list_url : "example_link_list.js",
		external_image_list_url : "example_image_list.js",
		media_external_list_url : "example_media_list.js",
		file_browser_callback : "fileBrowserCallBack",
		paste_use_dialog : false,
		theme_advanced_resizing : true,
		theme_advanced_resize_horizontal : false,
		theme_advanced_link_targets : "_something=My somthing;_something2=My somthing2;_something3=My somthing3;",
		paste_auto_cleanup_on_paste : true,
		paste_convert_headers_to_strong : false,
		paste_strip_class_attributes : "all",
		paste_remove_spans : false,
		paste_remove_styles : false			
	});

	function fileBrowserCallBack(field_name, url, type, win) {
		// This is where you insert your custom filebrowser logic
		alert("Filebrowser callback: field_name: " + field_name + ", url: " + url + ", type: " + type);

		// Insert new URL, this would normaly be done in a popup
		win.document.forms[0].elements[field_name].value = "someurl.htm";
	}
</script>



<table width="100%" border="0" cellspacing="0" cellpadding="0">
<form action="" method="post">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Leave Letter</strong></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="center" valign="top"><table width="100%" border="0" cellspacing="5" cellpadding="0">
                  <tr>
                   
                    <td align="center" valign="top" class="narmal">
					<textarea name="blogDesc" id="blogDesc" rows="20" cols="70" class="style3"><?php echo $message; ?></textarea></td>
                  </tr>
                  
                  <tr>
                   
                    <td align="center" valign="top" class="narmal"><input name="update_leaveleter" type="submit" class="bgcolor_02" value="Update" />
                      <input type="button" name="back" value="Back" onclick="javascript:history.back();" class="bgcolor_02" /></td>
                  </tr>
                  
                </table></td>
                <td width="1" class="bgcolor_02"></td>
              </tr>

              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
              </tr>
			  </form>
            </table>
			
<?php } ?>


	<?php if ($action == 'printleaveletter') { ?>
			 <table width="100%" border="0">
  <tr>
    <td colspan="2" align="center">Leave Letter</td>
    </tr>
	  <tr>
    <td colspan="2" align="center">&nbsp;</td>
    </tr>
	<tr>
    <td align="left" class="narmal">
	    
      <p><?php  echo $name; ?></p>
      <p> <?php echo $address; ?></p>
      <p><?php   echo $state; ?></p>
      <p><?php   echo $city; ?> </p>
      <p><?php  echo $zip; ?> </p>
      </td>
    </tr>
	
 	<tr>
    <td colspan="2" class="narmal"><?php echo $message; ?></td>
    </tr>
   </table>
	
	<?php } ?>
	