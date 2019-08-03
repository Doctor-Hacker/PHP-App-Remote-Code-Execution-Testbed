<?php 
	/**
* Only Admin users can view the pages
*/


if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
	?>
   

<?php if($action == 'asignincharge') { ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">

				<tr>
         <td height="3" colspan="3"></td>
	 </tr>	
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Assign Incharge For Class</span></td>
              </tr>
               <tr>
                <td width="1px" class="bgcolor_02" ></td>
                <td height="25" align="center">Please assign a faculty towards a Class to receive Messages from Student.</td>
                 <td width="1px" class="bgcolor_02" ></td></td>
              </tr>
              <tr>
                <td width="1px" class="bgcolor_02" ></td>
                <td height="25" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font><br /></td>
                 <td width="1px" class="bgcolor_02" ></td></td>
              </tr>
               <tr>
                <td width="1px" class="bgcolor_02" ></td>
                <td align="right" height="25"><form action=""  method="post">
				<table width="100%" border="0">
  <tr>
    <td width="7%" align="left" valign="middle">&nbsp;</td>
    <td width="9%" align="left" valign="middle" class="narmal">Class</td>
	<td width="1%" align="left" valign="middle" class="narmal">:</td>
    <td width="60%" align="left" valign="middle"><?php echo $html_obj->draw_selectfield('es_classesid',$classes_arr,'','style=" width:150px;"');?>&nbsp;<font color="#FF0000">&nbsp;*</font></td>
    
   
    <td width="23%" align="left" valign="middle">	</td>
  </tr>
   <tr>
    <td width="7%" align="left" valign="middle">&nbsp;</td>
    <td width="9%" align="left" valign="middle" class="narmal">Faculty</td>
	<td width="1%" align="left" valign="middle" class="narmal">:</td>
    <td width="60%" align="left" valign="middle"><?php echo $html_obj->draw_selectfield('es_staffid',$staff_arr,'','');?>&nbsp;<font color="#FF0000">&nbsp;*</font></td>
    
    
    <td width="23%" align="left" valign="middle">
	<?php if(in_array('10_9',$admin_permissions)){?>
	<input type="submit" name="asignstaff" value="submit" class="bgcolor_02" /><?php }?>
	
	</td>
  </tr>
</table>

				</form></td>
                 <td width="1px" class="bgcolor_02" ></td></td>
              </tr>	         		  
             
			  	
			   		  
             
			   
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td  align="center" valign="top">
                
               <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr height="25" class="bgcolor_02">
                      <td width="11%" align="left" class="admin">&nbsp;S.No</td>
                      <td width="35%" align="left" class="admin">Class  </td>
                      <td width="33%" align="left" class="admin">Incharge</td>
                      <td width="21%" align="left" class="admin">Action&nbsp;</td>
                    </tr>
                    <?php if(count($incharges_det)>0){
					$irow=0;
					foreach($incharges_det as $eachrecord){
					$irow++;
					 ?>
                    <tr height="25">
                      <td align="left" width="11%" class="narmal">&nbsp;<?php echo $irow; ?></td>
                      <td align="left" width="35%" class="narmal"><?php echo classname($eachrecord['es_classesid']); ?></td>
                      <td align="left" width="33%" class="narmal"><?php 
					  $staff_det = get_staffdetails($eachrecord['es_staffid']);
					  echo $staff_det['st_firstname'].' '.$staff_det['st_lastname'].'&nbsp;&lt;'. $staff_det['st_username'] . '&gt;';
					    ?></td>
                     <td align="left" width="21%" class="narmal">
					 
					 <?php if(in_array('10_10',$admin_permissions)){?><a href="?pid=64&action=delete&incharge_id=<?php echo $eachrecord['incharge_id'] ?>" onclick="return confirm('Are you sure you want to  delete ?')"><img src="images/b_drop.png" border="0" title="Delete" alt="Delete" /></a><?php }?>
					 
					 </td>
                    </tr>       
                    
					<?php } ?>
					 <?php if (in_array("10_12", $admin_permissions)) {?>
					<tr>
					<td colspan="4" align="center" class="adminfont"><input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=64&action=print_list',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /></td>
			</tr>
			  <?php }  ?>   
			<tr>
				<td colspan="4" align="center" class="adminfont">&nbsp;</td>
			</tr>      
					
					<?php } else { ?> 
					 <tr height="25">
                      <td align="center" colspan="4">No Records Found</td>
                    </tr>
                    
                    <?php }  ?>
                </table>
                  
				
				</td>
                <td width="1" class="bgcolor_02">
				</td>
              </tr>
			   <tr>
                <td height="1" colspan="3" class="bgcolor_02"  ></td>
              </tr>	
			  
   
</table>
<?php } ?>

<?php if($action == 'list') { ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr> <td height="3" colspan="3"></td> </tr>
              <tr> <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Manage Email Content</span></td> </tr>			  
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td  align="center" valign="top"><br />
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr> <td colspan="4" align="right" >&nbsp;</td>  </tr>
                <tr class="bgcolor_02" height="25">
                    <td>S.No.</td>
                    <td>Title</td>
                    <td>Subject</td>
                    <td>Action</td>
                </tr>
  <?php 
			$rownum = $start;
			if ($no_records>0) { //array_print($leavemaster_det);
			foreach ($sel_exams_det as $eachrecord){
			$zibracolor = ($rownum%2==0)?"even":"odd";
			$rownum++;
			
			?>
  <tr class="<?php echo $zibracolor;?>">
    <td  class="narmal"><?php echo $rownum; ?></td>
    <td  class="narmal"><?php echo $sel_exm_bld['exam_id']; ?></td>
    <td  class="narmal"><?php echo classname($sel_exm_bld['course_id']); ?></td>
    <td><img src="images/b_edit.png" border="0" width="16" height="16" alt="Edit" title="Edit"/></td>
  </tr>
  <?php  } ?>
			<tr>
			<td colspan="4" align="center" class="narmal"><?php paginateexte($start, $q_limit, $no_records, "action=list");?></td>
			</tr>
			<?php
			} else { ?>
			<tr><td colspan="4" align="center" class="narmal">No records Found</td></tr>
			<?php } ?>
</table>
			   
				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
  </tr>
</table>
<?php } ?>
<?php  if($action=="print_list"){
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_incharge','Staff','Asign Incharge','','Print','".$_SERVER['REMOTE_ADDR']."',NOW())";
     $log_insert_exe=mysql_query($log_insert_sql);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">

				 
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>	
               <tr>
                <td height="5" colspan="3"  ></td>
              </tr>			  
               <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Class Incharges List </span></td>
              </tr>	
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="center" valign="top"><br />
				
				<table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr height="25" class="bgcolor_02">
                      <td width="11%" align="left" class="admin">&nbsp;S.No</td>
                      <td width="35%" align="left" class="admin">Class  </td>
                      <td width="33%" align="left" class="admin">Incharge</td>
                     
                    </tr>
                    <?php if(count($incharges_det)>0){
					$irow=0;
					foreach($incharges_det as $eachrecord){
					$irow++;
					 ?>
                    <tr height="25">
                      <td align="left" width="11%" class="narmal">&nbsp;<?php echo $irow; ?></td>
                      <td align="left" width="35%" class="narmal"><?php echo classname($eachrecord['es_classesid']); ?></td>
                      <td align="left" width="33%" class="narmal"><?php 
					  $staff_det = get_staffdetails($eachrecord['es_staffid']);
					  echo $staff_det['st_firstname'].' '.$staff_det['st_lastname'].'&nbsp;&lt;'. $staff_det['st_username'] . '&gt;';
					    ?></td>
                     
                    </tr>       
                    
					<?php } } else { ?> 
					 <tr height="25">
                      <td align="center" colspan="4">No Records Found</td>
                    </tr>
                    
                    <?php }  ?>
                </table>
                
				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
             
               
              
              
  		     <tr><td colspan="3" class="bgcolor_02" height="1"></td></tr>
			  
			  
   
</table>

<?php } ?>
			

			
						
			
