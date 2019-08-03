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
				<td width="18%" align="left" class="narmal">Route</td>
					<td width="48%" align="left"  class="narmal">					
					<select name="route_id">
						<option value="">Select Route</option>
						<?php
						$route_sql = "SELECT * FROM es_translist WHERE status!='Delete'";
						$route_exe = mysql_query($route_sql);
						while($route_row = mysql_fetch_array($route_exe)){
						?>
						<option value="<?php echo $route_row['id']; ?>" <?php if( ($route_row['id']==$_POST['route_id']) || ($route_row['id']==$board_row['route_id']) ){?>selected="selected"<?php }?>><?php echo $route_row['route_title']; ?></option>
						<?php }?>
						
					</select>
					  <font color="#FF0000">*</font></td>
					<td width="7%" align="left">&nbsp;</td>
					<td colspan="2" align="left">&nbsp;</td>
					<td width="1%">&nbsp;</td>
					<td width="2%">&nbsp;</td>
				  </tr>
					<tr>
				<td width="18%" align="left" class="narmal">Board Title </td>
					<td width="48%" align="left"  class="narmal"><input name="boardtitle" type="text" size="16" value="<?php echo $boardtitle; ?><?php if(!isset($boardtitle)){echo $board_row['board_title'];} ?>" />
					  <font color="#FF0000">*</font></td>
					<td width="7%" align="left">&nbsp;</td>
					<td colspan="2" align="left">&nbsp;</td>
					<td width="1%">&nbsp;</td>
					<td width="2%">&nbsp;</td>
				  </tr>
                  
                    <tr>
					<td align="left" class="narmal">Amount</td>
					<td align="left"><span class="narmal">
					  <input name="amount" type="text" size="16" value="<?php if(!isset($amount)){ echo $board_row['amount'];}else{echo $amount;}?>" />
					  <font color="#FF0000">*</font></span></td>
					<td align="left"><span class="narmal"> </span></td>
					<td colspan="2" align="left">      </td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
                  
				  <tr>
					<td align="left" class="narmal">Board Capacity </td>
					<td align="left"><span class="narmal">
					  <input name="board_capacity" type="text" size="16" value="<?php echo $board_capacity; ?><?php if(!isset($board_capacity)){echo $board_row['capacity'];} ?>" />
					  <font color="#FF0000">*</font></span></td>
					<td align="left"><span class="narmal"> </span></td>
					<td colspan="2" align="left">      </td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td align="left" class="narmal">&nbsp;</td>
					<td align="left" class="narmal">
					<?php if($action=="addboard"){?>
					  <input name="addboard" type="submit" class="bgcolor_02" value="Add Board" />
					<?php }else{?>
					  <input name="updateboard" type="submit" class="bgcolor_02" value="Update Board" />
					<?php }?>
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
    <td width="19%" align="right">Route </td>
    <td width="5%">: </td>
    <td width="18%" align="left"><select name="route_id">
						<option value="">Select Route</option>
						<?php
						$route_sql = "SELECT * FROM es_translist WHERE status!='Delete'";
						$route_exe = mysql_query($route_sql);
						while($route_row = mysql_fetch_array($route_exe)){
						?>
						<option value="<?php echo $route_row['id']; ?>" <?php if( ($route_row['id']==$_POST['route_id']) || ($route_row['id']==$board_row['route_id']) ){?>selected="selected"<?php }?>><?php echo $route_row['route_title']; ?></option>
						<?php }?>
						
				  </select></td>
    <td width="0%">&nbsp;</td>
    <td width="58%" align="left"><input type="submit" value="Sarch" name="search_route" class="bgcolor_02" style="cursor:pointer;" /></td>
  </tr>
</table></form>
</td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellpadding="1" cellspacing="1" bordercolor="#CCCCCC">
				  <tr  class="bgcolor_02">
					<td width="5%" height="23" align="center"><strong>S No</strong></td>
					<td width="28%" height="23" align="center"><strong>Route</strong></td>
					<td width="36%" align="center"><strong>Board Title </strong></td>
					<td width="14%" align="center"><strong>Board Capacity</strong></td>   
					<td width="17%" align="center"><strong>Amount</strong></td>
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
					<td align="center"><?php  $query=mysql_query("SELECT * FROM es_translist WHERE status!='Delete' AND id = '".$board['route_id']."'");
													$row=mysql_fetch_array($query);
												echo	$row['route_title']; ?></td>
					<td align="center"><?php echo ucfirst($board['board_title']); ?></td>
					<td align="center"><?php echo ucfirst($board['capacity']); ?></td>    
					<td align="center"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format( $board['amount'], 2, '.', ''); ?></td>
					<td align="center">
                    
                    <?php if (in_array("14_5", $admin_permissions)) {?>
                    
					<a title="Edit board" href="?pid=76&action=editboard&id=<?php echo $board['id'];?>"><?php echo editIcon(); ?></a>&nbsp;
                    
                    <?php }else{ echo "-"; }?>
                    
					<?php if (in_array("14_6", $admin_permissions)) {?>
                    
                    <a title="Delete board" href="?pid=76&action=deleteboard&id=<?php echo $board['id'];?>" onclick="return confirm('Do you want to delete this record');"><?php echo deleteIcon(); ?></a>&nbsp;
                    <?php }?>
                  
					<!--<a title="View Vehicles" href="" ><?php echo viewIcon(); ?></a> -->					</td>
				  </tr>
				  <?php           
				  $rw++;
				  $slno++;	   
				  } ?>
				  <tr>
					<td colspan="7" align="center"><?php paginateexte($start, $q_limit, $no_rows, "action=boardlist".$page_Url) ?>    </td>
				  </tr>
				  <tr>
					<td colspan="7" align="center"><?php if (in_array("14_102", $admin_permissions)) {?> <input type="button" style="cursor:pointer;" value="Print Board List" onclick="window.open('?pid=76&action=print_boardlist&start=<?php echo $start.$page_Url;?>',null,'width=700,height=500,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /><?php }?></td>
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
					<td align="center"><?php echo $route_array[$board['route_id']]; ?></td>
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
