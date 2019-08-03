
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
	 </tr>
	<tr>
		<td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;Helpful Links </td>
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
                                                        <img src='../office_admin/images/link_images/<?php echo $each_addon['image']; ?>' width="30px" height="30px" border="0" title="<?php echo $each_addon['title']; ?>"  ail="<?php echo $link;?>" />
                                                        <?php } else {
														echo $each_addon['title']; 
														} ?>
                                                        </a></td>
														
											  </tr>
													<?php $i++;} ?>
													<tr><td colspan="3" align="center"><?php paginateexte($start, $q_limit, $num_rows, " ");?></td></tr>
													<?php }else{ ?>
													<tr><td colspan="3" align="center">No Records Found</td></tr>
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
