<?php
if($action=="addvehicle" || $action=="editvehicle"){
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="3" colspan="3"></td>
</tr>
<tr>
<td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Add/Edit Vehicle </strong></td>
</tr>
<tr>
<td width="1" class="bgcolor_02" ></td>
<td align="left" height="4" ></td>
<td width="1" class="bgcolor_02" ></td>
</tr>
<tr>
<td width="1" class="bgcolor_02"></td>
<td align="left" valign="top">		
				<form action="" method="post" name="vehicle_add" >
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
				<td width="27%" align="left" class="narmal">Transport Type</td>
					<td width="39%" align="left"  class="narmal">					
					<select name="tr_transport_type" id="tr_transport_type">
			  <option value="">--Select--</option>
			  <option value="bus" <?php if($tr_transport_type=="bus" || $vehicle_row['tr_transport_type']=="bus") {
					echo "selected";
					}					
					?> >Bus</option>
			  <option value="Car(Manual)" <?php if($tr_transport_type=="Car(Manual)"  || $vehicle_row['tr_transport_type']=="Car(Manual)") {
					echo "selected";
					}					
					?> >Car(Manual)</option>
			  <option value="Car(Auto)" <?php if($tr_transport_type=="Car(Auto)"  || $vehicle_row['tr_transport_type']=="Car(Auto)") {
					echo "selected";
					}					
					?> >Car(Auto)</option>
			  <option value="minibus" <?php if($tr_transport_type=="minibus"  || $vehicle_row['tr_transport_type']=="minibus") {
					echo "selected";
					}					
					?> >Minibus</option>
			  <option value="van" <?php if($tr_transport_type=="van"  || $vehicle_row['tr_transport_type']=="van") {
					echo "selected";
					}					
					 ?> >Van</option>
			  <option value="coach" <?php if($tr_transport_type=="coach"  || $vehicle_row['tr_transport_type']=="coach") {
					echo "selected";
					}					
					?> >Coach</option>
			  <option value="other" <?php if($tr_transport_type=="other"  || $vehicle_row['tr_transport_type']=="other") {
					echo "selected";
					}					
					?> >Other</option>
		  </select>
					  <font color="#FF0000">*</font></td>
					<td width="7%" align="left">&nbsp;</td>
					<td colspan="2" align="left">&nbsp;</td>
					<td width="1%">&nbsp;</td>
					<td width="2%">&nbsp;</td>
				  </tr>
					<tr>
				<td width="27%" align="left" class="narmal">Transport Name</td>
					<td width="39%" align="left"  class="narmal"><input name="tr_transport_name" type="text" size="16" value="<?php echo $tr_transport_name; ?><?php if(!isset($tr_transport_name)){echo $vehicle_row['tr_transport_name'];} ?>" />
					  <font color="#FF0000">*</font></td>
					<td width="7%" align="left">&nbsp;</td>
					<td colspan="2" align="left">&nbsp;</td>
					<td width="1%">&nbsp;</td>
					<td width="2%">&nbsp;</td>
				  </tr>
				  <tr>
				<td width="27%" align="left" class="narmal">Vehicle Reg. #</td>
					<td width="39%" align="left"  class="narmal"><input name="tr_vehicle_no" type="text" size="16" value="<?php echo $tr_vehicle_no; ?><?php if(!isset($tr_vehicle_no)){echo $vehicle_row['tr_vehicle_no'];} ?>" />
					  <font color="#FF0000">*</font></td>
					<td width="7%" align="left">&nbsp;</td>
					<td colspan="2" align="left">&nbsp;</td>
					<td width="1%">&nbsp;</td>
					<td width="2%">&nbsp;</td>
				  </tr>
				  <tr>
				<td width="27%" align="left" class="narmal">Number Of Passengers</td>
					<td width="39%" align="left"  class="narmal"><input name="tr_seating_capacity" type="text" size="16" value="<?php echo $tr_seating_capacity; ?><?php if(!isset($tr_seating_capacity)){echo $vehicle_row['tr_seating_capacity'];} ?>" />
					  <font color="#FF0000">*</font></td>
					<td width="7%" align="left">&nbsp;</td>
					<td colspan="2" align="left">&nbsp;</td>
					<td width="1%">&nbsp;</td>
					<td width="2%">&nbsp;</td>
				  </tr>
				  <tr>
				<td width="27%" align="left" class="narmal">Date Of Purchase</td>
					<td width="39%" align="left"  class="narmal"><input name="tr_purchase_date" type="text" size="16" value="<?php echo $tr_purchase_date; ?><?php if(!isset($tr_purchase_date)){echo func_date_conversion('Y-m-d', 'd/m/Y', $vehicle_row['tr_purchase_date']);} ?>" readonly="readonly" />
					  <a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.vehicle_add.tr_purchase_date);return false;" ><img name="popcal" align="absmiddle" src="<?php echo JS_PATH ?>/WeekPicker/calbtn.gif" width="34" height="22" border="0" alt=""></a>
					  <iframe width=199 height=178 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="<?php echo JS_PATH ?>/WeekPicker/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe><font color="#FF0000">*</font></td>
					<td width="7%" align="left">&nbsp;</td>
					<td colspan="2" align="left">&nbsp;</td>
					<td width="1%">&nbsp;</td>
					<td width="2%">&nbsp;</td>
				  </tr>
				  <tr>
				<td width="27%" align="left" class="narmal">Insurance Date</td>
					<td width="39%" align="left"  class="narmal"><input name="tr_insurance_date" type="text" size="16" value="<?php echo $tr_insurance_date; ?><?php if(!isset($tr_insurance_date)){echo func_date_conversion('Y-m-d', 'd/m/Y', $vehicle_row['tr_insurance_date']);} ?>" readonly="readonly" />
					<a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.vehicle_add.tr_insurance_date);return false;" ><img name="popcal" align="absmiddle" src="<?php echo JS_PATH ?>/WeekPicker/calbtn.gif" width="34" height="22" border="0" alt=""></a>
					<font color="#FF0000">*</font></td>
					<td width="7%" align="left">&nbsp;</td>
					<td colspan="2" align="left">&nbsp;</td>
					<td width="1%">&nbsp;</td>
					<td width="2%">&nbsp;</td>
				  </tr>
				  <tr>
				<td width="27%" align="left" class="narmal">Insurance Renewal Date</td>
					<td width="39%" align="left"  class="narmal"><input name="tr_ins_renewal_date" type="text" size="16" value="<?php echo $tr_ins_renewal_date; ?><?php if(!isset($tr_ins_renewal_date)){echo func_date_conversion('Y-m-d', 'd/m/Y', $vehicle_row['tr_ins_renewal_date']);} ?>" readonly="readonly" />
					<a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.vehicle_add.tr_ins_renewal_date);return false;" ><img name="popcal" align="absmiddle" src="<?php echo JS_PATH ?>/WeekPicker/calbtn.gif" width="34" height="22" border="0" alt=""></a>
					<font color="#FF0000">*</font></td>
					<td width="7%" align="left">&nbsp;</td>
					<td colspan="2" align="left">&nbsp;</td>
					<td width="1%">&nbsp;</td>
					<td width="2%">&nbsp;</td>
				  </tr>
				  <tr>
					<td align="left" class="narmal">&nbsp;</td>
					<td align="left" class="narmal">
					<?php if($action=="addvehicle"){?>
					  <input name="addvehicle" type="submit" class="bgcolor_02" value="Add Vehicle" />
					<?php }else{?>
					  <input name="updatevehicle" type="submit" class="bgcolor_02" value="Update Vehicle" />
					<?php }?>					</td>
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
if($action=="vehiclelist"){
?>			
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="3" colspan="3"></td>
</tr>
<tr>
<td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Vehicle List</strong></td>
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
<?php if (in_array("14_7", $admin_permissions)) {?><a href="?pid=77&action=addvehicle" class="bgcolor_02" style="text-decoration:none; padding:2px;">Add Vehicle</a></p><?php }?>
				<table width="100%" border="0" cellpadding="1" cellspacing="1" bordercolor="#CCCCCC">
				  <tr class="bgcolor_02">
					<td width="5%" height="23" align="center"><strong>S No</strong></td>
					<td width="28%" height="23" align="center"><strong>Vehicle Reg</strong></td>
					<td width="36%" align="center"><strong>Transport Type</strong></td>
					<td width="14%" align="center"><strong>Capacity</strong></td>   
					<td width="17%" align="center"><strong>Action</strong></td>
				  </tr>
				  <?php if(count($vehicle_row) > 0 ){ ?>
				  <?php						
					$rw = 1;
					$slno = $start+1;
					foreach ($vehicle_row as $vehicle)
						 {  
							if($rw%2==0)
								$rowclass = "even";
								else
								$rowclass = "odd";
								
					$query_sql="SELECT * FROM es_trans_vehicle_allocation_to_board WHERE status='Active' AND vehicle_id=".$vehicle['es_transportid'];
					$query_exe=mysql_query($query_sql);
					$query_num=mysql_num_rows($query_exe);
					?>
				  <tr class="<?php echo $rowclass;?>">
					<td align="center"><?php echo $slno;?></td>
					<td align="center"><?php echo $vehicle['tr_vehicle_no']; ?></td>
					<td align="center"><?php echo ucfirst($vehicle['tr_transport_type']); ?></td>
					<td align="center"><?php echo ucfirst($vehicle['tr_seating_capacity']); ?></td>    
					<td align="center">
					<?php if (in_array("14_8", $admin_permissions)) {?>
                    <a title="Edit Vehicles" href="?pid=77&action=editvehicle&id=<?php echo $vehicle['es_transportid'];?>"><?php echo editIcon(); ?></a>&nbsp;
        <?php }else{ echo "-"; }?> 
               
					<?php if($query_num==0){?>
                     <?php if (in_array("14_3", $admin_permissions)) {?> 
                    <a title="Delete Vehicles" href="?pid=77&action=deletevehicle&id=<?php echo $vehicle['es_transportid'];?>" onclick="return confirm('Do you want to delete this record');"><?php echo deleteIcon(); ?></a>&nbsp;
					<?php }}?>
					<!--<a title="View Vehicles" href="" ><?php echo viewIcon(); ?></a> -->
					</td>
				  </tr>
				  <?php           
				  $rw++;
				  $slno++;	   
				  } ?>
				  <tr>
					<td colspan="6" align="center"><?php paginateexte($start, $q_limit, $no_rows, "action=vehiclelist") ?>    </td>
				  </tr>
				   <tr>
					<td colspan="6" align="center"> <?php if (in_array("14_103", $admin_permissions)) {?><input type="button" style="cursor:pointer;" value="Print Vechile List" onclick="window.open('?pid=77&action=print_vechilelist&start=<?php echo $start;?>',null,'width=700,height=500,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /><?php }?></td>
				  </tr>
				  <?php } 
											
							  else {
							   echo "<tr>";
							   echo "<td align='center' class='narmal' colspan='7'>No records found</td>";
							   echo "</tr>";
						} 
										
										
										
				  ?>
				</table>
</td>
<td width="1" class="bgcolor_02"></td>
</tr>
<tr>
<td height="1" colspan="3" class="bgcolor_02"></td>
</tr>
</table>
<?php }?>
<?php if($action=='print_vechilelist'){
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	       VALUES('".$_SESSION['eschools']['admin_id']."','es_trans_vehicle','Transport','Vehicle List','','Print','".$_SERVER['REMOTE_ADDR']."',NOW())";
     $log_insert_exe=mysql_query($log_insert_sql);
?> 
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="3" colspan="3"></td>
</tr>
<tr>
<td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Vehicle List</strong></td>
</tr>
<tr>
<td width="1" class="bgcolor_02" ></td>
<td align="left" height="4" ></td>
<td width="1" class="bgcolor_02" ></td>
</tr>
<tr>
<td width="1" class="bgcolor_02"></td>
<td align="left" valign="top">

				<table width="100%" border="0" cellpadding="1" cellspacing="1" bordercolor="#CCCCCC">
				  <tr class="bgcolor_02">
					<td width="5%" height="23" align="center"><strong>S No</strong></td>
					<td width="28%" height="23" align="center"><strong>Vehicle Reg</strong></td>
					<td width="36%" align="center"><strong>Transport Type</strong></td>
					<td width="14%" align="center"><strong>Capacity</strong></td>   
					
				  </tr>
				  <?php if(count($vehicle_row) > 0 ){ ?>
				  <?php						
					$rw = 1;
					$slno = $start+1;
					foreach ($vehicle_row as $vehicle)
						 {  
							if($rw%2==0)
								$rowclass = "even";
								else
								$rowclass = "odd";
								
					$query_sql="SELECT * FROM es_trans_vehicle_allocation_to_board WHERE status='Active' AND vehicle_id=".$vehicle['es_transportid'];
					$query_exe=mysql_query($query_sql);
					$query_num=mysql_num_rows($query_exe);
					?>
				  <tr class="<?php echo $rowclass;?>">
					<td align="center"><?php echo $slno;?></td>
					<td align="center"><?php echo $vehicle['tr_vehicle_no']; ?></td>
					<td align="center"><?php echo ucfirst($vehicle['tr_transport_type']); ?></td>
					<td align="center"><?php echo ucfirst($vehicle['tr_seating_capacity']); ?></td>    
					</tr>
				  <?php           
				  $rw++;
				  $slno++;	   
				  } ?>
				  
				  <?php } 
											
							  else {
							   echo "<tr>";
							   echo "<td align='center' class='narmal' colspan='4'>No records found</td>";
							   echo "</tr>";
						} 
										
										
										
				  ?>
				</table>
</td>
<td width="1" class="bgcolor_02"></td>
</tr>
<tr>
<td height="1" colspan="3" class="bgcolor_02"></td>
</tr>
</table>
<?php }?>