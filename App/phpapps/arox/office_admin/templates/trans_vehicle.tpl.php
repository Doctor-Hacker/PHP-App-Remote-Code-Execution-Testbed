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
				  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				    <tr>
				      <td width="22" align="center" valign="top" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:17px; color:#000000; text-decoration:underline; padding:8px; font-weight:bold;">This Feature Available at  Full Version at <a href="http://www.arox.in" target="_blank">www.arox.in</a></td>
			        </tr>
				    <tr>
				      <td align="left" valign="top">&nbsp;</td>
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