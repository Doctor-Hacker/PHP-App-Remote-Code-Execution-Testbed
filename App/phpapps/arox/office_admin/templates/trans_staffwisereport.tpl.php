<?php
if($action=="staffreport"){
?>			
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="3" colspan="3"></td>
</tr>
<tr>
<td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Staff Wise Report</strong></td>
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
</p>
				
				<table width="100%" border="0">
  <tr>
    <td align="right"><?php if (in_array("14_20", $admin_permissions)) {?><a href="?pid=89&action=exportreport" class="bgcolor_02" style="padding:2px; text-decoration:none;">Export List</a>
<?php }?></td>
  </tr>
  <tr>
    <td>
	<form action="" method="post">
	<table width="100%" border="0">
  <tr>
    <?php /*?><td width="8%" align="left" valign="middle">Vechle No</td>
    <td width="26%" align="left" valign="middle"><select name="es_transportid">
						<option value="">Select Vehicle</option>
						<?php
						$vechile_sql = "SELECT * FROM es_trans_vehicle WHERE status!='Delete'";
						$vechile_exe = mysql_query($vechile_sql);
						while($vechile_row = mysql_fetch_array($vechile_exe)){
						?>
						<option value="<?php echo $vechile_row['es_transportid']; ?>" <?php if( $vechile_row['es_transportid']==$_POST['es_transportid'] ){?>selected="selected"<?php }?>><?php echo $vechile_row['tr_vehicle_no']; ?></option>
						<?php }?>
						
			    </select></td><?php */?>
    <td width="5%" align="left" valign="middle">Route</td>
    <td width="25%" align="left" valign="middle"><select name="route_id">
						<option value="">Select Route</option>
						<?php
						$route_sql = "SELECT * FROM es_trans_route WHERE status!='Delete'";
						$route_exe = mysql_query($route_sql);
						while($route_row = mysql_fetch_array($route_exe)){
						$online_sql="select * from es_trans_board where route_id=".$route_row['id'];
 $online_row=$db->getRow($online_sql);
						?>
						<option value="<?php echo $route_row['id']; ?>" <?php if( $route_row['id']==$_POST['route_id']){?>selected="selected"<?php }?>><?php echo $route_row['route_title']; ?>(<?php echo $online_row['board_title']; ?>)</option>
						<?php }?>
						
			    </select></td>
    <td width="36%" align="left" valign="middle"><input type="submit" name="search_staff" value="Search" class="bgcolor_02" style="cursor:pointer;" /></td>
  </tr>
</table></form>
</td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellpadding="1" cellspacing="1" bordercolor="#CCCCCC">
				  <tr  class="bgcolor_02">
					<td width="2%" height="23" align="center"><strong>S No</strong></td>
					<td width="10%" height="23" align="center"><strong>EMP ID</strong></td>
					<td width="11%" align="center"><strong>Name of the staff</strong></td>
					<td width="7%" align="center"><strong>Department</strong></td>   
					<td width="13%" align="center"><strong>Post</strong></td>
                    <td width="14%" align="center"><strong>Type of Vehicle</strong></td>
                    <td width="17%" align="center"><strong>Reg.No. of the Vehicle</strong></td>
                    <td width="16%" align="center"><strong>Route</strong></td>
                    <td width="10%" align="center"><strong>Name of the Driver</strong></td>
				  </tr>
				  <?php if(count($query_row) > 0 ){ ?>
				  <?php						
					$rw = 1;
					$slno = $start+1;
					foreach ($query_row as $query)
						 {  
							if($rw%2==0)
								$rowclass = "even";
								else
								$rowclass = "odd";
					?>
				  <tr class="<?php echo $rowclass;?>">
					<td align="center"><?php echo $slno;?></td>
					<td align="center"><?php echo $query['es_staffid']; ?></td>
					<td align="center"><?php echo $query['st_firstname']." ".$query['st_lastname']; ?></td>
					<td align="center"><?php echo $department_array[$query['st_department']];?></td>
                    <td align="center"><?php echo $post_array[$query['st_post']];?></td>				
					<td align="center"><?php echo $query['tr_transport_type'];?></td>
                    <td align="center"><?php echo $query['tr_vehicle_no'];?></td>
                    <td align="center">
					<?php $online_sql="select * from es_translist where id=".$query['route_Via'];
 $online_row=$db->getRow($online_sql); 
  echo $online_row['route_title'];?><br />
					
					<?php  echo $query['route_title']."(".$query['board_title'].")";?><br />
					</td>
                    <td align="center"><?php
					$vehicle_row=$db->getrow("SELECT * FROM  es_staff WHERE es_staffid=".$query['driver_id']);
                    echo $vehicle_row['st_firstname']." ".$vehicle_row['st_lastname'];
					?><br />[<?php  echo $vehicle_row['es_staffid']?>]</td>                    
				  </tr>
				  <?php           
				  $rw++;
				  $slno++;	   
				  } ?>
				  <tr>
					<td colspan="9" align="center"><?php paginateexte($start, $q_limit, $query1_num, "action=".$action.$page_URL ) ?>    </td>
				  </tr>
				  <?php } 
											
							  else {
							   echo "<tr>";
							   echo "<td align='center' class='narmal' colspan='9'>No records found</td>";
							   echo "</tr>";
						} 
										
										
										
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
<?php }?>
