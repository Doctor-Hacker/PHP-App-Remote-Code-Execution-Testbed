<?php
if($action=="addboard" || $action=="editboard"){
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="3" colspan="3"></td>
</tr>
<tr>
<td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Add/Edit Board </strong></td>
</tr>
<tr>
<td width="1" class="bgcolor_02" ></td>
<td align="left" height="4" ></td>
<td width="1" class="bgcolor_02" ></td>
</tr>
<tr>
<td width="1" class="bgcolor_02"></td>
<td align="left" valign="top">		
				<form action="" method="post" name="transport_add" >
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
if($action=="boardlist"){
?>			
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="3" colspan="3"></td>
</tr>
<tr>
<td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Board List</strong></td>
</tr>
<tr>
<td width="1" class="bgcolor_02" ></td>
<td align="left" height="4" ></td>
<td width="1" class="bgcolor_02" ></td>
</tr>
<tr>
<td width="1" class="bgcolor_02"></td>
<td align="left" valign="top">
<p align="right"></p>
<table width="100%" border="0" cellpadding="3px" cellspacing="0">
  <tr>
    <td align="right"><?php if (in_array("14_4", $admin_permissions)) {?>
<a href="?pid=76&action=addboard" class="bgcolor_02" style="text-decoration:none; padding:2px;">Add Board</a>
<?php }?></td>
  </tr>
  <tr>
    <td><form method="post" action=""><table width="100%" border="0">
  <tr>
    <td width="19%" align="right">Route Title </td>
    <td width="5%">: </td>
    <td width="18%" align="left"><select name="route_id">
						<option value="">Select Route</option>
						<?php
						$route_sql = "SELECT * FROM es_trans_route WHERE status!='Delete'";
						$route_exe = mysql_query($route_sql);
						while($route_row = mysql_fetch_array($route_exe)){
						
						$route_sql1 = "SELECT * FROM es_trans_board where id=".$route_row['id'];
						$route_exe1= $db->getRow($route_sql1);
						?>
						<option value="<?php echo $route_row['id']; ?>" <?php if( ($route_row['id']==$_POST['route_id']) || ($route_row['id']==$board_row['route_id']) ){?>selected="selected"<?php }?>><?php echo $route_row['route_title']; ?><?php echo $route_row['route_title']; ?>()</option>
						<?php }?>
						
				  </select></td>
    <td width="0%">&nbsp;</td>
    <td width="58%" align="left"><input type="submit" value="Search" name="search_route" class="bgcolor_02" style="cursor:pointer;" /></td>
  </tr>
</table></form>
</td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellpadding="1" cellspacing="1" bordercolor="#CCCCCC">
				  <tr  class="bgcolor_02">
					<td width="5%" height="23" align="center"><strong>S No</strong></td>
					<td width="31%" align="center"><strong>Route</strong></td>
					<td width="28%" height="23" align="center"><strong>Route Title </strong></td>
					<td width="38%" align="center"><strong>Board Title </strong></td>
					<td width="12%" align="center"><strong>Board Capacity</strong></td>   
					<td width="17%" align="center"><strong>Action</strong></td>
				  </tr>
				  <?php if(count($board_row) > 0 ){ ?>
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
					<td><?php
					
						$country_query="SELECT * FROM es_trans_route where status!='Delete' and id=".$board['route_id'];
						$country_row = $db->getRow($country_query);	
						
					$country_query1="SELECT * FROM es_translist where status!='Delete' and id=".$country_row['route_Via'];
						$country_row1 = $db->getRow($country_query1);		
					
						 echo $country_row1['route_title']; 
						 ?></td>
					<td align="left"><?php
					
						$country_query="SELECT * FROM es_trans_route where status!='Delete' and id=".$board['route_id'];
						$country_row = $db->getRow($country_query);	
						
						
					
						 echo $country_row['route_title']; 
						 ?></td>
					<td align="left"><?php echo ucfirst($board['board_title']); ?></td>
					<td align="center"><?php echo ucfirst($board['capacity']); ?></td>    
					<td align="center">
                    
                    <?php if (in_array("14_5", $admin_permissions)) {?>
                    
					<a title="Edit board" href="?pid=76&action=editboard&id=<?php echo $board['id'];?>"><?php echo editIcon(); ?></a>&nbsp;
                    
                    <?php }else{ echo "-"; }?>
                    
					<?php if (in_array("14_6", $admin_permissions)) {?>
                    
                    <a title="Delete board" href="?pid=76&action=deleteboard&id=<?php echo $board['id'];?>" onclick="return confirm('Do you want to delete this record');"><?php echo deleteIcon(); ?></a>&nbsp;
                    <?php }?>
                  
					<!--<a title="View Vehicles" href="" ><?php echo viewIcon(); ?></a> -->
					</td>
				  </tr>
				  <?php           
				  $rw++;
				  $slno++;	   
				  } ?>
				  <tr>
					<td colspan="6" align="center"><?php paginateexte($start, $q_limit, $no_rows, "action=boardlist".$page_Url) ?>    </td>
				  </tr>
				  <tr>
					<td colspan="6" align="center"><?php if (in_array("14_102", $admin_permissions)) {?> <input type="button" style="cursor:pointer;" value="Print Board List" onclick="window.open('?pid=76&action=print_boardlist&start=<?php echo $start.$page_Url;?>',null,'width=700,height=500,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /><?php }?></td>
				  </tr>
				  <?php } 
											
							  else {
							   echo "<tr>";
							   echo "<td align='center' class='narmal' colspan='7'>No records found</td>";
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
<?php if($action=='print_boardlist'){
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	       VALUES('".$_SESSION['eschools']['admin_id']."','es_trans_board','Transport','Board List','','Print','".$_SERVER['REMOTE_ADDR']."',NOW())";
     $log_insert_exe=mysql_query($log_insert_sql);
?> 
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="3" colspan="3"></td>
</tr>
<tr>
<td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Board List</strong></td>
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
				  <tr  class="bgcolor_02">
					<td width="5%" height="23" align="center"><strong>S No</strong></td>
					<td width="28%" height="23" align="center"><strong>Route</strong></td>
					<td width="28%" height="23" align="center"><strong>Route Title</strong></td>
					<td width="36%" align="center"><strong>Board Title </strong></td>
					<td width="14%" align="center"><strong>Board Capacity</strong></td>   
					
				  </tr>
				  <?php if(count($board_row) > 0 ){ ?>
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
					<td><?php
					
						$country_query="SELECT * FROM es_trans_route where status!='Delete' and id=".$board['route_id'];
						$country_row = $db->getRow($country_query);	
						
					$country_query1="SELECT * FROM es_translist where status!='Delete' and id=".$country_row['route_Via'];
						$country_row1 = $db->getRow($country_query1);		
					
						 echo $country_row1['route_title']; 
						 ?></td>
					<td align="left"><?php
					
						$country_query="SELECT * FROM es_trans_route where status!='Delete' and id=".$board['route_id'];
						$country_row = $db->getRow($country_query);	
						
						
					
						 echo $country_row['route_title']; 
						 ?></td>
					<td align="center"><?php echo ucfirst($board['board_title']); ?></td>
					<td align="center"><?php echo ucfirst($board['capacity']); ?></td>    
					
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
