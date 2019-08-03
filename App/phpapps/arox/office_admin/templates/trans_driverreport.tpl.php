<?php
if($action=="editdriver"){
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="3" colspan="3"></td>
</tr>
<tr>
<td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Add/Edit Driver Details </strong></td>
</tr>
<tr>
<td width="1" class="bgcolor_02" ></td>
<td align="left" height="4" ></td>
<td width="1" class="bgcolor_02" ></td>
</tr>
<tr>
<td width="1" class="bgcolor_02"></td>
<td align="left" valign="top">		
				<form action="" method="post" name="driver_add" enctype="multipart/form-data" >
				<table width="100%" border="0" cellspacing="3" cellpadding="0">	
					<?php  
					if (isset($message) && $message!=""){
					?>
					<tr>
					<td height="25" colspan="7" align="center" ><strong><?php echo $message; ?></strong></td>
					</tr>
					<?php
					}
					?>
					<tr>
				<td width="27%" align="left" class="narmal"> Driver License(DL) </td>
					<td width="39%" align="left"  class="narmal"><input name="driver_license" type="text" size="16" value="<?php echo $driver_license; ?><?php if(!isset($driver_license)){echo $driver_row['driver_license'];} ?>" />
					  <font color="#FF0000">*</font></td>
					<td width="7%" align="left">&nbsp;</td>
					<td colspan="2" align="left">&nbsp;</td>
					<td width="1%">&nbsp;</td>
					<td width="2%">&nbsp;</td>
				  </tr>
				  <tr>
				<td width="27%" align="left" class="narmal"> Issuing Authority </td>
					<td width="39%" align="left"  class="narmal"><input name="driver_issuing_authority" type="text" size="16" value="<?php echo $driver_issuing_authority; ?><?php if(!isset($driver_issuing_authority)){echo $driver_row['issuing_authority'];} ?>" />
					  <font color="#FF0000">*</font></td>
					<td width="7%" align="left">&nbsp;</td>
					<td colspan="2" align="left">&nbsp;</td>
					<td width="1%">&nbsp;</td>
					<td width="2%">&nbsp;</td>
				  </tr>
				  <tr>
				<td width="27%" align="left" class="narmal">&nbsp;DL Valid Upto </td>
					<td width="39%" align="left"  class="narmal"><input name="driver_dl_valid_upto" type="text" size="16" value="<?php echo $driver_dl_valid_upto; ?><?php if(!isset($driver_dl_valid_upto)){echo func_date_conversion('Y-m-d', 'd/m/Y', $driver_row['valid_date']);} ?>" />
                    <a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.driver_add.driver_dl_valid_upto);return false;" ><img name="popcal" align="absmiddle" src="<?php echo JS_PATH ?>/WeekPicker/calbtn.gif" width="34" height="22" border="0" alt=""></a>
					<iframe width=199 height=178 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="<?php echo JS_PATH ?>/WeekPicker/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe><font color="#FF0000">*</font></td>
					<td width="7%" align="left">&nbsp;</td>
					<td colspan="2" align="left">&nbsp;</td>
					<td width="1%">&nbsp;</td>
					<td width="2%">&nbsp;</td>
				  </tr>
				  <tr>
				<td width="27%" align="left" class="narmal"> License Document </td>
					<td width="39%" align="left"  class="narmal">
                    <input name="driver_document" type="file" size="16"/>
					<?php if($driver_row['license_doc']!=""){?><a href="images/dirverdoc/<?php echo $driver_row['license_doc'];?>" target="_blank">View Document</a><?php }?>
				    </td>
					<td width="7%" align="left">&nbsp;</td>
					<td colspan="2" align="left">&nbsp;</td>
					<td width="1%">&nbsp;</td>
					<td width="2%">&nbsp;</td>
				  </tr>
				  <tr>
					<td align="left" class="narmal">&nbsp;</td>
					<td align="left" class="narmal">					
					<input name="updatedriver" type="submit" class="bgcolor_02" value="Update Driver" />
					</td>
					<td align="left">&nbsp;</td>
					<td colspan="2" align="left">&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
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
<?php }?>
<?php
if($action=="driverreport" || $action=="print_driver_wise"){
?>			
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="3" colspan="3"></td>
</tr>
<tr>
<td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Driver Details List</strong></td>
</tr>
<tr>
<td width="1" class="bgcolor_02" ></td>
<td align="left" height="4" ></td>
<td width="1" class="bgcolor_02" ></td>
</tr>
<tr>
<td width="1" class="bgcolor_02"></td>
<td align="left" valign="top">
<p align="right">
<?php if (in_array("14_17", $admin_permissions)) {?>
<!--<a href="?pid=86&action=exportreport" class="bgcolor_02" style="padding:2px; text-decoration:none;">Export List</a>-->
<?php }?></p>
				<table width="100%" border="0" cellpadding="1" cellspacing="1" bordercolor="#CCCCCC">
				  <tr  class="bgcolor_02">
					<td width="3%" height="23" align="center"><strong>S No</strong></td>
					<td width="13%" height="23" align="center"><strong>Driver</strong></td>
					<td width="14%" align="center"><strong>Trasport</strong></td>
					<!--<td width="17%" align="center"><strong>Route (Board)</strong></td>  --> 
					<td width="20%" align="center"><strong>Mobile Number</strong></td>
                    <td width="21%" align="center"><strong>Driving License No /<br />Issuing Authority</strong></td>
                    <td width="12%" align="center"><strong>DL Valid Upto</strong></td>
				  </tr>
				  <?php if(count($driver_row) > 0 ){ ?>
				  <?php						
					$rw = 1;
					$slno = $start+1;
					foreach ($driver_row as $driver)
						 {  
							if($rw%2==0)
								$rowclass = "even";
								else
								$rowclass = "odd";
					?>
				  <tr class="<?php echo $rowclass;?>">
					<td align="center"><?php echo $slno;?></td>
					<td align="center"><?php echo $driver['driver_name']; ?></td>
					<td align="center"><?php echo $driver['tr_transport_name']." => ".$driver['tr_transport_type']." => ".$driver['tr_vehicle_no']; ?></td>
					<?php /*?><td align="center">				
					<?php
					 $vehicle_sql="SELECT * FROM es_trans_vehicle_allocation_to_board WHERE vehicle_id=".$driver['es_transportid']." AND status='Active'";
					$vehicle_exe=mysql_query($vehicle_sql);
					$vehicle_row=mysql_fetch_array($vehicle_exe);
					if($vehicle_row['board_id']!=""){
					 $board_sql="SELECT * FROM es_trans_board WHERE id=".$vehicle_row['board_id'];
					$board_exe=mysql_query($board_sql);
					$board_row=mysql_fetch_array($board_exe);
					
					$route_sql="SELECT * FROM es_trans_route WHERE id=".$board_row['route_id'];
					$route_exe=mysql_query($route_sql);
					$route_row=mysql_fetch_array($route_exe);					
					echo $route_row['route_title']." (".$board_row['board_title'].")";
					}
					?>
                    
                    </td>	<?php */?>			
					<td align="center"><?php echo $driver['diver_mobile'];?></td>
                    <td align="center"><?php echo $driver['driver_license']." / ".$driver['issuing_authority'];?></td>
                    <td align="center"><?php echo func_date_conversion('Y-m-d', 'd/m/Y', $driver['valid_date']);?></td>
				  </tr>
				  <?php           
				  $rw++;
				  $slno++;	   
				  } ?>
				  <tr>
					<td colspan="6" align="center"><?php paginateexte($start, $q_limit, $driver1_num, "action=".$action."&column_name=".$orderby."&asds_order=".$asds_order) ?>    </td>
				  </tr>
				  <?php } 
											
							  else {
							   echo "<tr>";
							   echo "<td align='center' class='narmal' colspan='7'>No records found</td>";
							   echo "</tr>";
						} 
										
										
										
				  ?>
				  <?php if($action!="print_driver_wise"){?>
				  <tr><td align="right" colspan="6">
				  <!--<input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=86&action=print_driver_wise<?php //echo $url; ?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  />-->
				  </td></tr><?php }?>
				</table>
</td>
<td width="1" class="bgcolor_02"></td>
</tr>
<tr>
<td height="1" colspan="3" class="bgcolor_02"></td>
</tr>
</table>
<?php }?>
