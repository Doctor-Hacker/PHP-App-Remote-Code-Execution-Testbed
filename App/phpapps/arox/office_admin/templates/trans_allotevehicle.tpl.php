<?php
if($action=="allottedlist" || $action=='print_board_vechle'){
if($action=='print_board_vechle'){$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	       VALUES('".$_SESSION['eschools']['admin_id']."','es_trans_vehicle_allocation_to_board','Transport','Allot Vehicle to Board','','Print','".$_SERVER['REMOTE_ADDR']."',NOW())";
     $log_insert_exe=mysql_query($log_insert_sql);}	
?>			
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;Allot Vehicle to Board</strong></td>
</tr>
<tr>
<td width="1" class="bgcolor_02" ></td>
<td height="4" align="left">
<?php
$route_sql = "SELECT * FROM es_trans_route WHERE status!='Delete'";
$route_row =$db->getRows($route_sql);

foreach($route_row as $route){
$route_sql1 = "SELECT * FROM es_translist WHERE status!='Delete' and id=".$route['route_Via'];
$route_row1 =$db->getRow($route_sql1);
?><?php echo "<br><b>&nbsp;".ucfirst($route_row1['route_title'])."";?>&nbsp;>>><?php 	echo "<b>&nbsp;".ucfirst($route['route_title'])."</b>";
?>

<table width="100%" border="0" cellpadding="1" cellspacing="1" bordercolor="#CCCCCC">
				  <tr  class="bgcolor_02">
					<td width="5%" height="23" align="center"><strong>S No</strong></td>
					
					<td width="36%" align="center"><strong>Board</strong></td>
					<td width="14%" align="center"><strong>Vehicle No</strong></td> 
					<?php if($action!='print_board_vechle'){?>  
					<td width="17%" align="center"><strong>Action</strong></td>
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
					<?php if($action!='print_board_vechle'){?>
					<td align="center">
                    <?php if (in_array("14_11", $admin_permissions)) {?>
					<a title="Edit Fee" href="?pid=80&action=editallotment&boardid=<?php echo $board['id'];?>"><?php echo editIcon(); ?></a>&nbsp;	
                    <?php }else{ echo "-"; }?> 				
					</td>
					<?php }?>
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
<?php }?>
<?php
if($action=="editallotment"){?>
<form action="" name="editform" method="post">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="3" colspan="4"></td>
</tr>
<tr>
<td height="25" colspan="4" class="bgcolor_02"><strong>&nbsp;&nbsp;Allot Vehicle to Board</strong></td>
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
<td align="left" valign="top" height="25">&nbsp;Board :  
</td>
<td align="left" valign="top" height="25">
<?php
echo $board_array[$boardid];
$query_sql="SELECT * FROM es_trans_board WHERE id=".$boardid;
$query_exe=mysql_query($query_sql);
$query_row=mysql_fetch_array($query_exe);
 $query1_sql="SELECT * FROM es_trans_route WHERE id=".$query_row['route_id'];
$query1_exe=mysql_query($query1_sql);
$query1_row=mysql_fetch_array($query1_exe);
echo " (".$query1_row['route_title']." )";
?>
 <input type="hidden" name="boardid" value="<?php echo $boardid; ?>" /></td>
<td width="1" class="bgcolor_02" ></td>
</tr>
<tr>
<td width="1" class="bgcolor_02" ></td>
<td align="left" valign="top" >&nbsp;Vehicle :  </td>
<td align="left" valign="top" >
<?php
$vehicle_sql="SELECT * FROM es_trans_vehicle WHERE status='Active'";
$vehicle_row=$db->getRows($vehicle_sql);
//print_r($vehicle_row);
?>
<select name="allotevehicle">
<?php
foreach($vehicle_row as $vehicle){?>
<option value="<?php echo $vehicle['es_transportid']; ?>" <?php if($vehicle_edit_row['vehicle_id']==$vehicle['es_transportid']){?> selected="selected"<?php }?>><?php echo $vehicle['tr_vehicle_no']; ?></option>
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
<td align="left" valign="top" ><input type="submit" name="updateboard" class="bgcolor_02" value="Update" /></td>
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
