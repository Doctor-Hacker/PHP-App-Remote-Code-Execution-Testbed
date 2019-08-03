<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;View All Routes/Boards</strong></td>
</tr>
<tr>
<td width="1" class="bgcolor_02" ></td>
<td height="4" align="left">
<?php
$route_sql = "SELECT * FROM es_translist WHERE status!='Delete'";
$route_row =$db->getRows($route_sql);
foreach($route_row as $route){
	echo "<br><b>&nbsp;".ucfirst($route['route_title'])."</b>";
?>

<table width="100%" border="0" cellpadding="1" cellspacing="1" bordercolor="#CCCCCC">
				  <tr  class="bgcolor_02">
					<td width="5%" height="23" align="center"><strong>S No</strong></td>
					
					<td width="36%" align="center"><strong>Board</strong></td>
					<td width="14%" align="center"><strong>Vehicle No</strong></td> 
					<?php if($action!='print_board_vechle'){?>  
					<td width="17%" align="center"><strong>Driver</strong></td>
					<?php }?>
				  </tr>
				  <?php
				  $board_sql = "SELECT * FROM es_trans_board WHERE route_id=".$route['id']." AND status='Active'";
				  $board_row =$db->getRows($board_sql);
				  
				  if(count($board_row) > 0 ){ ?>
				  <?php						
					$rw = 1;
					$slno = $start+1;
					foreach ($board_row as $board)
						 {  
							if($rw%2==0)
								$rowclass = "even";
								else
								$rowclass = "odd";
					?>
				  <tr class="<?php echo $rowclass;?>">
					<td align="center"><?php echo $slno;?></td>
				
					<td align="center"><?php echo $board['board_title']; ?></td>
					
					<td align="center">
					<?php 
					$vehicle_sql = "SELECT * FROM  es_trans_vehicle_allocation_to_board WHERE board_id=".$board['id']." ORDER BY `id` DESC LIMIT 0 , 1";
					$vehicle_row =$db->getRow($vehicle_sql);
					if($vehicle_row['vehicle_id']!=""){
					$vehicle1_sql = "SELECT * FROM es_trans_vehicle WHERE es_transportid=".$vehicle_row['vehicle_id'];
					$vehicle1_row =$db->getRow($vehicle1_sql);
					echo $vehicle1_row['tr_vehicle_no']; 
					}
					?>
                    </td>    
				
					<td align="center">	<?php 
					if($vehicle_row['vehicle_id']!=""){
					$vehicle1_sql = "SELECT * FROM es_trans_vehicle WHERE es_transportid=".$vehicle_row['vehicle_id'];
					$vehicle1_row =$db->getRow($vehicle1_sql);
					
					$vehicle1_sql = "SELECT * FROM  es_trans_driver_allocation_to_vehicle WHERE vehicle_id=".$vehicle1_row['es_transportid']." ORDER BY `id` DESC LIMIT 0 , 1";
					$vehicle1_row =$db->getRow($vehicle1_sql);
					if($vehicle1_row['vehicle_id']!=""){
					$vehicle1_sql = "SELECT * FROM es_staff WHERE es_staffid=".$vehicle1_row['driver_id'];
					$vehicle1_row =$db->getRow($vehicle1_sql);
					echo $vehicle1_row['st_firstname']." ".$vehicle1_row['st_lastname']; 
					}}
					?><br />EMP ID-<?php echo  $vehicle1_row['es_staffid'];?></td>
			
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
                
<?php }?>
<?php if($action!='print_board_vechle' && count($route_row) > 0 ){?>
				  <p align="center"><?php if (in_array("14_105", $admin_permissions)) {?><input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=80&action=print_board_vechle',null,'width=700,height=500,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /><?php }?></p>
				  <?php }?>
</td>
<td width="1" class="bgcolor_02" ></td>
</tr>
<tr>
<td height="1" colspan="3" class="bgcolor_02"></td>
</tr>
</table>