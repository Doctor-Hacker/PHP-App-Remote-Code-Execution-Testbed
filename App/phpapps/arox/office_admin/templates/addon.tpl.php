<?php
if($action=='addnew' || $action=='edit') { ?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
	 </tr>
	<tr>
		<td height="25" colspan="3" class="bgcolor_02">&nbsp;Helpful Links </td>
  </tr>
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td  align="left" valign="top">
           
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr><td align="left" valign="top">&nbsp;</td></tr>
                
               
				<tr>
					<td height="50" align="left" valign="top">
						<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
							<tr>
                          <td height="10" align="left" valign="top">
						  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
							<tr>
								<td height="23" align="left" valign="top">
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td align="left" valign="middle" class="admin">
											<form action=""  method="POST" enctype="multipart/form-data">
											<table width="100%" border="0" cellspacing="0" cellpadding="0">								
													<tr>
														<td>
															<table width="91%" border="0" cellspacing="3" cellpadding="0">
															
																<tr>
																  <td align="left" class="narmal">&nbsp;&nbsp;Title</td>
																  <td align="left" class="narmal"><input type="text" value="<?php echo $title; ?>" name="title" />
																  &nbsp;<font color="#FF0000"><b>*</b></font></td>
																  <td>&nbsp;</td>
															  </tr>
																<tr>
																  <td align="left" class="narmal">&nbsp;&nbsp;Link</td>
																  <td align="left" class="narmal"><input type="text" name="link" value="<?php echo $link; ?>"  size='30'/>&nbsp;<font color="#FF0000"><b>*</b></font></td>
																  <td>&nbsp;</td>
															  </tr>
																<tr>
																	<td width="35%" align="left" class="narmal">&nbsp;&nbsp;Image</td>
																	<td width="37%" align="left" class="narmal"><input type="file" name="image"  />
																  <td rowspan='2' valign="top" align="center">
																  <?php
																  if($action=='edit' && $image1!=''){
																  ?>
																  <img src='images/link_images/<?php echo $image1;?>' height="50px" width="50px"  /><br /><a href=' ?pid=93&action=delete_image&addon_id=<?php echo $addon_id;?>&start=<?php echo $start; ?>' style="text-decoration:none; color: #000000; padding:2px;">&nbsp;Delete&nbsp;</a>
																  <input type="hidden" name="hidden_image" value="<?php echo $image1; ?>" />
																  
																  <?php } ?>
																  </td>
																</tr>
																<tr>
																  <td align="left" class="narmal">&nbsp;&nbsp;Permissions</td>
																  <td align="left" class="narmal">
																  <div>
																  <input type='checkbox' name='v_admin' value='Y' <?php if($v_admin=='Y'){?> checked="checked"<?php } ?>/>&nbsp;Admin&nbsp;&nbsp;</div><div><input type='checkbox' name='v_staff' value='Y' <?php if($v_staff=='Y'){?> checked="checked"<?php } ?>/>&nbsp;Teaching Staff&nbsp;&nbsp;</div><div><input type='checkbox' name='v_n_staff' value='Y' <?php if($v_n_staff=='Y'){?> checked="checked"<?php } ?>/>&nbsp;Non-Teaching Staff&nbsp;&nbsp;</div><div>
																  <input type='checkbox' name='v_student' value='Y' <?php if($v_student=='Y'){?> checked="checked"<?php } ?>/>&nbsp;Student</div></td>
																 
															  </tr>			
															</table>
													  </td>
													</tr>
													
					<tr>
					   <td height="43" align="center"><br />
					  <input type="hidden" name="hidden_id" value="<?php echo $addon_id; ?>" />
					   <input name="submit_addon" type="submit" class="bgcolor_02" value="Submit" style="cursor:pointer;"/>&nbsp;
					  
					 
					   <input name="reset3" type="reset" class="bgcolor_02" value="Reset" style="cursor:pointer;"/>
					  </td>
					 </tr>									 
    		    </table></form>
							    </td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td height="10" align="left" valign="top"></td>
                        </tr>
                        <tr>
                          <td align="left" valign="top"></td>
                        </tr>                        
                    </table>
						  </td>
                        </tr>
                        <tr>
                          <td align="left" valign="top"></td>
                        </tr>                        
                    </table></td>
                  </tr>
                </table></td>
         <td width="1" class="bgcolor_02"></td>		  
     </tr>
    <tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>
</table>

<?php }
if($action=='list')
{
 ?>
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
	 </tr>
	<tr>
		<td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;Helpful Links</td>
  </tr>
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td  align="left" valign="top">
           
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr><td align="left" valign="top">&nbsp;</td></tr>
                
               
				<tr>
					<td height="50" align="left" valign="top">
						<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
							<tr>
                          <td height="10" align="left" valign="top">
						  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
							<tr>
								<td height="23" align="left" valign="top">
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td align="left" valign="middle" class="admin">
											
										<table width="100%" border="0" cellspacing="0" cellpadding="0">								
													<tr class="bgcolor_02" height="25">
														<td width="14%" align="center">S.No</td>
														<td width="42%" align="center">Title</td>
														<td width="33%" align="center">Link</td>
														<td width="11%" align="center">Action</td>
													</tr>
												<?php if(count($list_addon)>0)
												{ 
												$i=1;
												foreach($list_addon as $each_addon){
												$class=($i%2==0)?'even':'odd';
												?>	
												<tr class="<?php echo $class;?>" height="25">
												<?php
												//$trim_array=array('http://','https://');
												 $link=trim($each_addon['link'],'http://');
												?>
														<td align="center"><?php echo $i;?></td>
														<td align="center" valign="middle">
														<?php echo strtoupper($each_addon['title']); ?>
														</td><td align="center"><a href='http://<?php echo $each_addon['link'];?>' target="_blank" style="text-decoration:none; color: #000000">
														<?php if($each_addon['image']!=''){?>
                                                        <img src='images/link_images/<?php echo $each_addon['image']; ?>' width="30px" height="30px" border="0" title="<?php echo $each_addon['title']; ?>"  ail="<?php echo $link;?>" />
                                                        <?php } else {
														echo $each_addon['title']; 
														} ?>
                                                        </a></td>
														<td>
														<?php if(in_array('35_2',$admin_permissions)){?>
<a href="?pid=93&action=edit&addon_id=<?php echo $each_addon['addon_id']; ?>&start=<?php echo $start;?>" ><img src="images/b_edit.png" border="0" title="Edit" alt="Edit"  /></a>&nbsp;&nbsp;
					


<?php }?>
					
			<?php if(in_array('35_3',$admin_permissions)){?>

<a href="?pid=93&action=delete&addon_id=<?php echo $each_addon['addon_id']; ?>&start=<?php echo $start;?>" onClick="return confirm('Are you sure you want to  delete ?')"><img src="images/b_drop.png" border="0" title="Delete" alt="Delete"  /></a>
					

<?php }?>		
					
				
														</td>
											  </tr>
													<?php $i++;} ?>
													<tr><td colspan="4" align="center"><?php paginateexte($start, $q_limit, $num_rows, "&action=list");?></td></tr>
													<?php }else{ ?>
													<tr><td colspan="4" align="center">No Records Found</td></tr>
													<?php }?>	 
    		    </table>	
							    </td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td height="10" align="left" valign="top"></td>
                        </tr>
                        <tr>
                          <td align="left" valign="top"></td>
                        </tr>                        
                    </table>
						  </td>
                        </tr>
                        <tr>
                          <td align="left" valign="top"></td>
                        </tr>                        
                    </table></td>
                  </tr>
                </table></td>
         <td width="1" class="bgcolor_02"></td>		  
     </tr>
    <tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>
</table>
 <?php } ?>