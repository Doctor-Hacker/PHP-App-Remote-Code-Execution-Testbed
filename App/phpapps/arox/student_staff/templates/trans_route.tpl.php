<?php
if($action=="addroute" || $action=="editroute"){
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="3" colspan="3"></td>
</tr>
<tr>
<td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Add/Edit Route</strong></td>
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
					<td align="left" class="narmal">Route </td>
					<td align="left"><span class="narmal">
					 <select name='route_via' style=" width:255px;" >
                   
						 <?php 
					   
						$country_query="SELECT * FROM es_translist where status!='Delete'";
						$country_row = $db->getRows($country_query);	
						foreach($country_row  as  $country_name){
						
						?>
                     <option value='<?php echo $country_name['id'];?>'  <?php if( $country_name['id']==$route_row['route_Via']){ echo "selected"; }?>><?php echo ucfirst($country_name['route_title']);?></option>
                     <?php }   ?>
                   </select>
				   
				   
					<?php /*?>  <input name="route_via" type="text" size="16" value="<?php if(!isset($route_via)){ echo $route_row['route_Via'];}else{echo $route_via;}?>" /><?php */?>
					 </td>
					<td align="left"><span class="narmal"> </span></td>
					<td colspan="2" align="left">      </td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
					<tr>
				<td width="12%" align="left" class="narmal">Route Title </td>
					<td width="76%" align="left"  class="narmal"><input name="routetitle" type="text" size="16" value="<?php if(!isset($routetitle)){ echo $route_row['route_title'];}else{echo $routetitle;}?>" />
					  <font color="#FF0000">*</font></td>
					<td width="1%" align="left">&nbsp;</td>
					<td colspan="2" align="left">&nbsp;</td>
					<td width="1%">&nbsp;</td>
					<td width="2%">&nbsp;</td>
				  </tr>
				
				  <tr>
					<td align="left" class="narmal">Amount</td>
					<td align="left"><span class="narmal">
					  <input name="amount" type="text" size="16" value="<?php if(!isset($amount)){ echo $route_row['amount'];}else{echo $amount;}?>" />
					  <font color="#FF0000">*</font></span></td>
					<td align="left"><span class="narmal"> </span></td>
					<td colspan="2" align="left">      </td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td align="left" class="narmal">&nbsp;</td>
					<td align="left" class="narmal">
					<?php if($action=="addroute"){?>
					  <input name="addroute" type="submit" class="bgcolor_02" value="Add Route" />
					<?php }else{?>
					  <input name="updateroute" type="submit" class="bgcolor_02" value="Update Route" />
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
if($action=="routelist"){
?>			
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="3" colspan="3"></td>
</tr>
<tr>
<td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Route List</strong></td>
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
<?php if (in_array("14_1", $admin_permissions)) {?><a href="?pid=75&action=addroute" class="bgcolor_02" style="text-decoration:none; padding:2px;">Add Route</a>
<?php }?>
</p>
				<table width="100%" border="0" cellpadding="1" cellspacing="1" bordercolor="#CCCCCC">
				  <tr  class="bgcolor_02">
					<td width="15%" height="23" align="center"><strong>S No</strong></td>
					<td width="27%" align="center"><strong>Route </strong></td> 
					<td width="26%" align="center"><strong>Route Title </strong></td>
					<td width="18%" align="center"><strong>Amount</strong></td> 
					<td width="14%" align="center"><strong>Action</strong></td>
				</tr>
				  <?php if(count($route_row) > 0 ){ ?>
				  <?php						
					$rw = 1;
					$slno = $start+1;
					foreach ($route_row as $route)
						 {  
							if($rw%2==0)
								$rowclass = "even";
								else
								$rowclass = "odd";
					?>
				  <tr class="<?php echo $rowclass;?>">
					<td align="center"><?php echo $slno;?></td>
					<td align="left">
					 <?php 
						$country_query="SELECT * FROM es_translist where id=".$route['route_Via'];
						$country_row = $db->getRow($country_query);	
						?>
					<?php echo ucfirst($country_row['route_title']); ?>						</td> 
					<td align="left"><?php echo ucfirst($route['route_title']); ?></td>
					
					<td align="center"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format( $route['amount'], 2, '.', ''); ?></td>    
					<td align="center">
                    <?php if (in_array("14_2", $admin_permissions)) {?>
                   
					<a title="Edit route" href="?pid=75&action=editroute&id=<?php echo $route['id'];?>"><?php echo editIcon(); ?></a>&nbsp;
                    
                    <?php }else{ echo "-"; }?>
                    <?php
					 $count_query_sql="SELECT * FROM es_trans_board WHERE route_id=".$route['id'];
					$count_query_exe=mysql_query($count_query_sql);
					$count_query_num=mysql_num_rows($count_query_exe);
					if($count_query_num==0){?>
                    
                     <?php if (in_array("14_3", $admin_permissions)) {?>
                     
					<a title="Delete route" href="?pid=75&action=deleteroute&id=<?php echo $route['id'];?>" onclick="return confirm('Do you want to delete this record');"><?php echo deleteIcon(); ?></a>&nbsp;
                    
					<?php }}?>
                    <!--<a title="View Vehicles" href="" ><?php echo viewIcon(); ?></a> -->
					</td>
				  </tr>
				  <?php           
				  $rw++;
				  $slno++;	   
				  } ?>
				  <tr>
					<td colspan="6" align="center"><?php paginateexte($start, $q_limit, $no_rows, "action=routelist") ?></td>
				  </tr>
				  <tr>
					<td colspan="6" align="center"> <?php if (in_array("14_101", $admin_permissions)) {?><input type="button" style="cursor:pointer;" value="Print Route List" onclick="window.open('?pid=75&action=print_routelist&start=<?php echo $start;?>',null,'width=700,height=500,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /><?php }?></td>
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
<?php if($action=='print_routelist'){

$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	       VALUES('".$_SESSION['eschools']['admin_id']."','es_trans_route','Transport','Route List','','Print','".$_SERVER['REMOTE_ADDR']."',NOW())";
     $log_insert_exe=mysql_query($log_insert_sql);
?> 
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="3" colspan="3"></td>
</tr>
<tr>
<td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Route List</strong></td>
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
					<td width="12%" height="23" align="center"><strong>S No</strong></td>
					<td width="31%" align="center"><strong>Route</strong></td>  
					<td width="38%" align="center"><strong>Route Title </strong></td>
					<td width="19%" align="center"><strong>Amount</strong></td> 
					
				</tr>
				  <?php if(count($route_row) > 0 ){ ?>
				  <?php						
					$rw = 1;
					$slno = $start+1;
					foreach ($route_row as $route)
						 {  
							if($rw%2==0)
								$rowclass = "even";
								else
								$rowclass = "odd";
					?>
				  <tr class="<?php echo $rowclass;?>">
					<td align="center"><?php echo $slno;?></td>
					<td align="left"> <?php 
					   
						$country_query="SELECT * FROM es_translist where id=".$route['route_Via'];
						$country_row = $db->getRow($country_query);	
				
						
						?>
					<?php echo ucfirst($country_row['route_title']); ?></td>  
					<td align="left"><?php echo ucfirst($route['route_title']); ?></td>
					  
					<td align="center"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format( $route['amount'], 2, '.', ''); ?></td>   
					
				  </tr>
				  <?php           
				  $rw++;
				  $slno++;	   
				  } ?>
				  
				 
				  <?php } 
											
							  else {
							   echo "<tr>";
							   echo "<td align='center' class='narmal' colspan='3'>No records found</td>";
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


<?php 
if($action=="routelist1"){
?>			
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="3" colspan="3"></td>
</tr>
<tr>
<td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Route </strong></td>
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
<?php if (in_array("14_1", $admin_permissions)) {?><a href="?pid=75&action=addroute1" class="bgcolor_02" style="text-decoration:none; padding:2px;">Add Route</a>
<?php }?>
</p>
				<table width="100%" border="0" cellpadding="1" cellspacing="1" bordercolor="#CCCCCC">
				  <tr  class="bgcolor_02">
					<td width="21%" height="23" align="center"><strong>S No</strong></td>
					<td width="45%" align="center"><strong>Route Title </strong></td>
				
					<td width="34%" align="center"><strong>Action</strong></td>
				</tr>
				  <?php if(count($route_row) > 0 ){ ?>
				  <?php						
					$rw = 1;
					$slno = $start+1;
					foreach ($route_row as $route)
						 {  
							if($rw%2==0)
								$rowclass = "even";
								else
								$rowclass = "odd";
					?>
				  <tr class="<?php echo $rowclass;?>">
					<td align="center"><?php echo $slno;?></td>
					<td align="left"><?php echo ucfirst($route['route_title']); ?></td>
						<td align="center">
                    <?php if (in_array("14_2", $admin_permissions)) {?>
                   
					<a title="Edit route" href="?pid=75&action=editroute1&id=<?php echo $route['id'];?>"><?php echo editIcon(); ?></a>&nbsp;
                    
                    <?php }else{ echo "-"; }?>
                    <?php
					$count_query_sql="SELECT * FROM es_trans_board WHERE route_id=".$route['id'];
					$count_query_exe=mysql_query($count_query_sql);
					$count_query_num=mysql_num_rows($count_query_exe);
					if($count_query_num==0){?>
                    
                     <?php if (in_array("14_3", $admin_permissions)) {?>
                     
					<a title="Delete route" href="?pid=75&action=deleteroute1&id=<?php echo $route['id'];?>" onclick="return confirm('Do you want to delete this record');"><?php echo deleteIcon(); ?></a>&nbsp;
                    
					<?php }}?>
                    <!--<a title="View Vehicles" href="" ><?php echo viewIcon(); ?></a> -->
					</td>
				  </tr>
				  <?php           
				  $rw++;
				  $slno++;	   
				  } ?>
				  <tr>
					<td colspan="6" align="center"><?php paginateexte($start, $q_limit, $no_rows, "action=routelist1") ?></td>
				  </tr>
				  <tr>
					<td colspan="6" align="center"> <?php if (in_array("14_101", $admin_permissions)) {?><input type="button" style="cursor:pointer;" value="Print Route List" onclick="window.open('?pid=75&action=print_routelist1&start=<?php echo $start;?>',null,'width=700,height=500,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /><?php }?></td>
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
<?php }
if($action=='print_routelist1'){

$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	       VALUES('".$_SESSION['eschools']['admin_id']."','es_trans_route','Transport','Route List','','Print','".$_SERVER['REMOTE_ADDR']."',NOW())";
     $log_insert_exe=mysql_query($log_insert_sql);
?> 
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="3" colspan="3"></td>
</tr>
<tr>
<td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Route List</strong></td>
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
					<td width="27%" height="23" align="center"><strong>S No</strong></td>
					<td width="73%" align="center"><strong>Route Title </strong></td>
						
				</tr>
				  <?php if(count($route_row) > 0 ){ ?>
				  <?php						
					$rw = 1;
					$slno = $start+1;
					foreach ($route_row as $route)
						 {  
							if($rw%2==0)
								$rowclass = "even";
								else
								$rowclass = "odd";
					?>
				  <tr class="<?php echo $rowclass;?>">
					<td align="center"><?php echo $slno;?></td>
					<td align="left"><?php echo ucfirst($route['route_title']); ?></td>
					 
				  </tr>
				  <?php           
				  $rw++;
				  $slno++;	   
				  } ?>
				  
				 
				  <?php } 
											
							  else {
							   echo "<tr>";
							   echo "<td align='center' class='narmal' colspan='3'>No records found</td>";
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
<?php }
if($action=="addroute1" || $action=="editroute1"){
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="3" colspan="3"></td>
</tr>
<tr>
<td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Add/Edit Route</strong></td>
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
				<td width="12%" align="left" class="narmal">Route Title </td>
					<td width="76%" align="left"  class="narmal"><input name="routetitle" type="text" size="16" value="<?php if(!isset($routetitle)){ echo $route_row['route_title'];}else{echo $routetitle;}?>" />
					  <font color="#FF0000">*</font></td>
					<td width="1%" align="left">&nbsp;</td>
					<td colspan="2" align="left">&nbsp;</td>
					<td width="1%">&nbsp;</td>
					<td width="2%">&nbsp;</td>
				  </tr>
				
			
				  <tr>
					<td align="left" class="narmal">&nbsp;</td>
					<td align="left" class="narmal">
					<?php if($action=="addroute1"){?>
					  <input name="addroute" type="submit" class="bgcolor_02" value="Add Route" />
					<?php }else{?>
					  <input name="updateroute" type="submit" class="bgcolor_02" value="Update Route" />
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
<?php }
?>