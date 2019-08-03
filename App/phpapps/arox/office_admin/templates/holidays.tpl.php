<?php 
	/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
	if($action == 'holidayslist'  || $actionedit=='edit') { ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Holidays  </span></td>
              </tr>	
               <tr>
                <td height="5" colspan="3"  ></td>
              </tr>			  
               <?php if (in_array("27_1", $admin_permissions)) {?><tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Add Holiday </span></td>
              </tr>	
			   <tr>
                <td width="1px" class="bgcolor_02" ></td>
                <td height="25" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font><br /></td>
                 <td width="1px" class="bgcolor_02" ></td></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="center" valign="top"><br />
				<form method="post" action="" enctype="multipart/form-data" name="holiday">
				<table width="100%" border="0" cellpadding="2" cellspacing="0">
                            <tr height="25" >
                              <td width="10%" align="left" class="narmal">&nbsp;Title</td>							   
                              <td width="30%" align="left" class="narmal"><?php echo $html_obj->draw_inputfield('title',$rs_editphoto['title']); ?><font color="#FF0000">&nbsp;*</font></td>
                            </tr>
							  <tr height="25" >
                              <td width="10%" align="left" class="narmal">&nbsp;Holiday Date </td>							   
                              <td width="30%" align="left" class="narmal"><input name="holiday_date" type="text" id="holiday_date" size="20" value="<?php echo $holiday_date; ?>" readonly />
							  <a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.holiday.holiday_date);return false;" ><img name="popcal" align="absmiddle" src="<?php echo JS_PATH ?>/WeekPicker/calbtn.gif" width="34" height="22" border="0" alt=""></a><font color="#FF0000"><b>*</b></font></td>
                             <iframe width=199 height=178 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="<?php echo JS_PATH ?>/WeekPicker/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
								</iframe>
							 </tr>
							<tr height="25">
							  <td align="left" width="10%" class="narmal"></td>
							  <td align="left" width="30%" class="narmal">
							  <?php if($actionedit!="edit"){?>
							  <input type="submit" style="font-size:13px;cursor:pointer; height:20px;" class="bgcolor_02" name="addphoto" value="Add" />
							  <?php }else {?> <input type="submit" class="bgcolor_02" name="updatephoto" value="Update" /> <?php }?>
							  </td>
					    </tr>			
                  </table>
				  </form>						
				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
  </tr>
               <tr>
                <td height="5" colspan="3"  ></td>
              </tr><?php }?>		  
               <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Holidays List for <?php echo $year; ?></span></td>
              </tr>	
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top">
               <table width="120" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><a href="?pid=58&action=holidayslist&year=<?php echo $year-1;?>" title="Previous Year <?php echo $year-1;?>"><img src="images/arrow-previous.png" border="0" /></a></td>
    <td><b><?php echo $year; ?></b></td>
    <td><a href="?pid=58&action=holidayslist&year=<?php echo $year+1;?>" title="Next Year <?php echo $year+1;?>" ><img src="images/arrow-next.png" border="0" /></a></td>
  </tr>
</table>           
                
                  <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr height="25" class="bgcolor_02">
                      <td width="7%" align="left" class="admin">&nbsp;S No</td>
                      <td width="32%" align="left" class="admin">Title</td>
                      <td width="24%" align="center" class="admin">Holiday Date </td>
                     
					  <td width="18%" align="center" valign="middle" class="admin">Action&nbsp;</td>
                    </tr>
                <?php
            $rownum = $start;
            if ($no_rows>= 1) {
            foreach ($rs_photos as $eachdate){
            $rownum++;
          
            ?>  
                    <tr height="25">
                      <td width="7%" align="left" valign="middle" class="narmal">&nbsp;<?php echo $rownum; ?></td>
                      <td width="32%" align="left" valign="middle" class="narmal"><?php echo $eachdate['title']; ?></td>
                      <td width="24%" align="center" valign="middle" class="narmal"><?php $holiday=formatDBDateTOCalender($eachdate['holiday_date'],"d/m/Y");
					   echo $holiday;
					   ?></td>
					    <td width="18%" align="center" valign="middle">
						<?php if (in_array("27_2", $admin_permissions)) {?><a href="?pid=58&action=delete&id=<?php echo $eachdate['id'];?>&start=<?php echo $start;?>" title="Delete" onClick="return confirm('Are you sure you want to delete ?')">
						<img src="images/b_drop.png" width="16" height="16" hspace="2"  border="0"/></a><?php }else{ echo "-"; }?>
						</td>
                    </tr>
					 <?php }?>
					 <tr height="25">
                   <td align="right" colspan="4" style="padding-right:5px;"><?php if (in_array("27_3", $admin_permissions)) {?><input type="button" style="cursor:pointer; height:20px;" value="Print" onclick="window.open('?pid=58&action=print_holidays&year=<?php echo $year;?>&start=<?php echo $start;?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /><?php }?></td>                   
                </tr>
					  
					<?php }else {?>
					  <tr height="25">
                      <td align="center" class="narmal" colspan="4">No Records Found</td>
                    </tr><?php }?>
                  </table>
			    </td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
  </tr>
  
 
</table>
						<?php } ?>
<?php if($action == 'print_holidays'){
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	       VALUES('".$_SESSION['eschools']['admin_id']."','es_holidays','Holidays','','','Print','".$_SERVER['REMOTE_ADDR']."',NOW())";
     $log_insert_exe=mysql_query($log_insert_sql);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Holidays  for <?php echo $year; ?></strong></td>
              </tr>
			  <tr>
                <td height="20" colspan="3"></td>
              </tr>
			  <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top">
				<table width="100%" border="0" cellpadding="0" cellspacing="0">
                
              
			<tr height="25" class="bgcolor_02">
                      <td width="8%" align="center" class="admin">&nbsp;S No</td>
                      <td width="70%" align="left" class="admin">&nbsp;Title</td>
                      <td width="22%" align="left" class="admin">Holiday Date </td>
                  </tr>
				    <?php
            $rownum = $start;
            if ($no_rows>= 1) {
            foreach ($rs_photos as $eachdate){
            $rownum++;
          
            ?>  
                    <tr height="25">
                      <td align="center" valign="middle" class="narmal"><?php echo $rownum; ?></td>
                      <td align="left" valign="middle" class="narmal">&nbsp;<?php echo $eachdate['title']; ?></td>
                      <td align="left" valign="middle" class="narmal"><?php $holiday=formatDBDateTOCalender($eachdate['holiday_date'],"d/m/Y");
					   echo $holiday;
					   ?></td>
					    
                    </tr>
					 <?php }?>
										 
					<?php }else {?>
					  <tr height="30">
                      <td align="center" class="narmal" colspan="3">No Records Found</td>
                    </tr>
					<?php }?>
                  </table>

				</td>
				
                <td width="1" class="bgcolor_02"></td>
              </tr>
              
                <td height="1" colspan="3" class="bgcolor_02"></td>
                </tr>
            </table>
<?php }?>

