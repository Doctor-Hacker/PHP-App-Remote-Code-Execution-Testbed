<?php
if($action=="allotteddriverlist" || $action=='print_driver_vechle'){
if($action=='print_driver_vechle'){$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	       VALUES('".$_SESSION['eschools']['admin_id']."','es_trans_driver_allocation_to_vehicle','Transport','Allot Driver to Vehicle','','Print','".$_SERVER['REMOTE_ADDR']."',NOW())";
     $log_insert_exe=mysql_query($log_insert_sql);}		
?>			
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="25" colspan="3" class="bgcolor_02"><strong>Allot Driver to Vehicle</strong></td>
</tr>
<tr>
<tr>
<td width="1" class="bgcolor_02" ></td>
<td height="111" align="left" valign="top" >


<table width="100%" border="0" cellpadding="1" cellspacing="1" bordercolor="#CCCCCC">
				  <tr  class="bgcolor_02">
					<td width="12%" height="23" align="center"><strong>S No</strong></td>
					<td width="28%" align="center"><strong>Vehicle No</strong></td>
					<td width="36%" align="center"><strong>Driver</strong></td>  
					 <?php if($action!='print_driver_vechle'){?>     
					<td width="24%" align="center"><strong>Action</strong></td>
					 <?php }?>
				  </tr>
				  <?php
				  $vehicle_sql = "SELECT * FROM es_trans_vehicle WHERE status!='Delete'";
				  $vehicle_row =$db->getRows($vehicle_sql);
				  
				  if(count($vehicle_row) > 0 ){ ?>
				  <?php						
					$rw = 1;
					$slno = $start+1;
					foreach ($vehicle_row as $vehicle)
						 {  
							if($rw%2==0)
								$rowclass = "even";
								else
								$rowclass = "odd";
					?>
				  <tr class="<?php echo $rowclass;?>">
					<td align="center"><?php echo $slno;?></td>
					
					<td align="center"><?php echo $vehicle['tr_vehicle_no']; ?></td>
					<td align="center">
					<?php 
					$vehicle1_sql = "SELECT * FROM  es_trans_driver_allocation_to_vehicle WHERE vehicle_id=".$vehicle['es_transportid']." ORDER BY `id` DESC LIMIT 0 , 1";
					$vehicle1_row =$db->getRow($vehicle1_sql);
					if($vehicle1_row['vehicle_id']!=""){
					$vehicle1_sql = "SELECT * FROM es_trans_driver_details WHERE id=".$vehicle1_row['driver_id'];
					$vehicle1_row =$db->getRow($vehicle1_sql);
					echo $vehicle1_row['driver_name']; 
					}
					?><br />EMP ID-<?php echo  $vehicle1_row['id'];?>
                    </td>
					  <?php if($action!='print_driver_vechle'){?>    
					<td align="center">
                     <?php if (in_array("14_12", $admin_permissions)) {?>
					<a title="Edit" href="?pid=82&action=editallotment&vehicleid=<?php echo $vehicle['es_transportid'];?>"><?php echo editIcon(); ?></a>&nbsp;	
                     <?php }else{ echo "-"; }?> 					
					</td>
					  <?php }?>
				  </tr>
				  <?php           
				  $rw++;
				  $slno++;	   
				  } ?>
				  <?php if($action!='print_driver_vechle'){?>
				  <tr>
					<td colspan="4" align="center"><?php if (in_array("14_106", $admin_permissions)) {?><input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=82&action=print_driver_vechle',null,'width=700,height=500,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /><?php }?></td>
				  </tr>
				  <?php }} 
											
							  else {
							   echo "<tr>";
							   echo "<td align='center' class='narmal' colspan='7'>No records found</td>";
							   echo "</tr>";
						} 
										
										
										
				  ?>
				</table>




</td>
<td width="1" class="bgcolor_02" ></td>
</tr>
<tr>
<td height="1" colspan="3" class="bgcolor_02"></td>
</tr>
</table>
<?php }?>
<?php
if($action=="editallotment"){?>
<form action="" name="editform" method="post">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="3" colspan="4"></td>
</tr>
<tr>
<td height="25" colspan="4" class="bgcolor_02"><strong>&nbsp;&nbsp;Allot Driver to Vehicle</strong></td>
</tr>
<tr>
<td width="1" class="bgcolor_02" ></td>
<td height="4" colspan="2" align="left" ></td>
<td width="1" class="bgcolor_02" ></td>
</tr>
<tr>
<td width="1" class="bgcolor_02" ></td>
<td width="103" align="left" valign="top" >&nbsp;</td>
<td align="left" valign="top" >&nbsp;</td>
<td width="1" class="bgcolor_02" ></td>
</tr>
<tr>
<td width="1" class="bgcolor_02" ></td>
<td align="left" valign="top" height="25">&nbsp;Vehicle :  
</td>
<td align="left" valign="top" height="25"><?php echo $vehicle_array[$vehicleid]; ?>
  <input type="hidden" name="vehicleid" value="<?php echo $vehicleid; ?>" /></td>
<td width="1" class="bgcolor_02" ></td>
</tr>
<tr>
<td width="1" class="bgcolor_02" ></td>
<td align="left" valign="top" >&nbsp;Driver :  </td>
<td align="left" valign="top" >
<?php
//$staff_sql="SELECT * FROM es_staff S,es_trans_driver_details DD WHERE DD.id=S.es_staffid AND S.st_post='16' AND S.st_department='13' AND S.tcstatus!='issued'";
$staff_sql="SELECT * FROM es_trans_driver_details DD";
$staff_row=$db->getRows($staff_sql);
//print_r($vehicle_row);
?>
<select name="allotestaff">
<option value="">-Select Driver-</option>
<?php

foreach($staff_row as $staff){?>
<option value="<?php echo $staff['id']; ?>" <?php if($staff['id']==$allotestaff){?> selected="selected"<?php }?>><?php echo $staff['driver_name']; ?></option>
<?php }?>
</select>
</td>
<td width="1" class="bgcolor_02" ></td>
</tr>
<tr>
<tr>
<td width="1" class="bgcolor_02" ></td>
<td width="103" align="left" valign="top" >&nbsp;</td>
<td align="left" valign="top" >&nbsp;</td>
<td width="1" class="bgcolor_02" ></td>
</tr>
<tr>
<td width="1" class="bgcolor_02" ></td>
<td width="103" align="left" valign="top" >&nbsp;</td>
<td align="left" valign="top" ><input type="submit" name="updatevehicle" class="bgcolor_02" value="Update" /></td>
<td width="1" class="bgcolor_02" ></td>
</tr>
<tr>
<td width="1" class="bgcolor_02" ></td>
<td width="103" align="left" valign="top" >&nbsp;</td>
<td align="left" valign="top" >&nbsp;</td>
<td width="1" class="bgcolor_02" ></td>
</tr>
<tr>
  <td width="1" class="bgcolor_02"></td>
<td colspan="2" align="left" valign="top">

</td>
<td width="1" class="bgcolor_02"></td>
</tr>
<tr>
<td height="1" colspan="4" class="bgcolor_02"></td>
</tr>
</table>
</form>
<?php }?>
