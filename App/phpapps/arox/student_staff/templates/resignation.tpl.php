<?php if ($action == 'res_format') { ?>
<script type="text/javascript">

function newWindowOpen(href)
{
    window.open(href,null, 'width=900,height=900,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');
	

}
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Resignation Letter</strong></td>
              </tr>
			  <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="left" valign="top">&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="left" valign="top"><table width="99%" border="0" cellpadding="0" cellspacing="0">
                      
					   <?php
					  $rownum = 1;	
				foreach ($resignation as $eachresignation){
				$zibracolor = ($rownum%2==0)?"even":"odd";	
				$message=$eachresignation->res_letter ;			  
				  ?><title>Untitled Document</title>
                      <tr >
                        <td width="10%" align="left" valign="middle"></td>
					    <td width="10%" align="right"><a href=" ?pid=25&action=res_format_edit&sid=<?php echo $eachresignation->es_resignationId; ?>"><img src="images/b_edit.png"width="16" height="16" hspace="2"  border="0" /></a>&nbsp;<a href="javascript: void(0)" onclick="newWindowOpen ('?pid=25&action=print_resignation');"><img src="images/print_16.png" border="0" /></a>&nbsp;</td>
                      </tr>
                      <tr >
                        <td align="left" colspan="2" valign="left" style="padding-left:5px;" ><?php echo $message;?> </td>
					   
                      </tr>
                     <?php
					$rownum++;  }
					  ?>
                    </table></td>
                  </tr>				                
                </table></td>
				
                <td width="1" class="bgcolor_02"></td>
              </tr>
              
                <td height="1" colspan="3" class="bgcolor_02"></td>
                </tr>
            </table>
<?php } ?>
<?php if ($action == 'res_format_edit') { ?>
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
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Resignation Letter</strong></td>
              </tr>
			  <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="center" valign="top"><table width="100%" border="0" cellspacing="3" cellpadding="0">
                  <tr>
                   
                    <td align="center" valign="top" class="narmal"><textarea name="blogDesc" id="blogDesc" rows="20" cols="70" class="style3"><?php echo $message; ?></textarea></td>
                  </tr>
                  
                  <tr>
                    
                    <td align="center" valign="top" class="narmal"><input name="update_resignation" type="submit" class="bgcolor_02" value="Update" />
                      </td>
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
<?php if ($action == 'res_letter') { ?>
		<?php echo "sdfasdvfsdfsd" ?>;
<?php } ?>
		
	<?php if ($action == 'print_resignation') { ?>
			 <table width="100%" border="0">
  <tr>
    <td colspan="2" align="center"><strong>Resignation Letter</strong></td>
    </tr>
	<tr>
    <td align="left" colspan="1"><p><?php echo "Date:".$date; ?> </p>
      <p><?php echo $name; ?></p>
      <p> <?php echo $address; ?></p>
      <p><?php echo $state; ?></p>
      <p><?php echo $city; ?> </p>
      <p><?php echo $zip; ?> </p>
      </td>
    </tr>
	
 	<tr>
    <td colspan="2"><?php echo $message; ?> </td>
    </tr>
   </table>
	
	<?php } ?>