<?php
if($action=="adddriver" || $action=="editdriver"){
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
if($action=="viewdriver"){
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="3" colspan="3"></td>
</tr>
<tr>
<td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;Driver Details </strong></td>
</tr>
<tr>
<td width="1" class="bgcolor_02" ></td>
<td align="left" height="4" ></td>
<td width="1" class="bgcolor_02" ></td>
</tr>
<tr>
<td width="1" class="bgcolor_02"></td>
<td align="left" valign="top">
				<table width="100%" border="0" cellspacing="3" cellpadding="0">		
				<tr>			
				<td width="27%" align="left" class="narmal"> Driver Name </td>
					<td width="39%" align="left"  class="narmal"><?php echo $driverdetails_row12['driver_name'];?>
					</td>
					<td width="7%" align="left">&nbsp;</td>
					<td colspan="2" align="left">&nbsp;</td>
					<td width="1%">&nbsp;</td>
					<td width="2%">&nbsp;</td>
				  </tr>
				  <tr>
				  <tr>			
				<td width="27%" align="left" class="narmal"> Driver Adds </td>
					<td width="39%" align="left"  class="narmal"><?php echo $driverdetails_row12['driver_addrs'];?>
					</td>
					<td width="7%" align="left">&nbsp;</td>
					<td colspan="2" align="left">&nbsp;</td>
					<td width="1%">&nbsp;</td>
					<td width="2%">&nbsp;</td>
				  </tr><tr>			
				<td width="27%" align="left" class="narmal"> Mobile No. </td>
					<td width="39%" align="left"  class="narmal"><?php echo $driverdetails_row12['diver_mobile'];?>
					</td>
					<td width="7%" align="left">&nbsp;</td>
					<td colspan="2" align="left">&nbsp;</td>
					<td width="1%">&nbsp;</td>
					<td width="2%">&nbsp;</td>
				  </tr>
				<tr>			
				<td width="27%" align="left" class="narmal"> Driver License(DL) </td>
					<td width="39%" align="left"  class="narmal"><?php echo $driverdetails_row12['driver_license'];?>
					</td>
					<td width="7%" align="left">&nbsp;</td>
					<td colspan="2" align="left">&nbsp;</td>
					<td width="1%">&nbsp;</td>
					<td width="2%">&nbsp;</td>
				  </tr>
				  <tr>
				<td width="27%" align="left" class="narmal"> Issuing Authority </td>
					<td width="39%" align="left"  class="narmal"><?php echo $driverdetails_row12['issuing_authority']; ?>
					</td>
					<td width="7%" align="left">&nbsp;</td>
					<td colspan="2" align="left">&nbsp;</td>
					<td width="1%">&nbsp;</td>
					<td width="2%">&nbsp;</td>
				  </tr>
				  <tr>
				<td width="27%" align="left" class="narmal">DL Valid Upto </td>
					<td width="39%" align="left"  class="narmal"><?php echo func_date_conversion('Y-m-d', 'd/m/Y', $driverdetails_row12['valid_date']);?>                
					</td>
					<td width="7%" align="left">&nbsp;</td>
					<td colspan="2" align="left">&nbsp;</td>
					<td width="1%">&nbsp;</td>
					<td width="2%">&nbsp;</td>
				  </tr>
				  <tr>
				<td width="27%" align="left" class="narmal"> License Document </td>
					<td width="39%" align="left"  class="narmal">
							<?php
							$allowed = array('gif','jpeg','jpg','png');						
							$fl_ext = fileextension($driver_row['license_doc']);
							if(in_array($fl_ext, $allowed)){$target = "target='_blank'";}else{$target="";}
							?>                  
					<?php if($driver_row['license_doc']!=""){?><a href="images/dirverdoc/<?php echo $driver_row['license_doc'];?>" <?php echo $target;?>>View Document</a><?php }else{ echo "Not available";}?>
				    </td>
					<td width="7%" align="left">&nbsp;</td>
					<td colspan="2" align="left">&nbsp;</td>
					<td width="1%">&nbsp;</td>
					<td width="2%">&nbsp;</td>
				  </tr>
                  <tr>
				<td width="27%" align="left" class="narmal">&nbsp;</td>
					<td width="39%" align="left"  class="narmal"><a href="javascript:history.go(-1);" class="bgcolor_02" style="padding:2px; text-decoration:none;">Back</a></td>
					<td width="7%" align="left">&nbsp;</td>
					<td colspan="2" align="left">&nbsp;</td>
					<td width="1%">&nbsp;</td>
					<td width="2%">&nbsp;</td>
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
<?php
if($action=="driverlist"){
?>			
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="3" colspan="3"></td>
</tr>
<tr>
<td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Driver List</strong></td>
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

<tr>
<td width="1" class="bgcolor_02" ></td>
<td align="left" height="4" ></td>
<td width="1" class="bgcolor_02" ></td>
</tr>
<tr>
<td width="1" class="bgcolor_02"> </td>
<td align="left" valign="top">
<?php if (in_array("14_7", $admin_permissions)) {?><a href="?pid=81&action=adddriver" class="bgcolor_02" style="text-decoration:none; padding:2px;">Add Driver</a></p>
<?php } ?>
				<table width="100%" border="0" cellpadding="1" cellspacing="1" bordercolor="#CCCCCC">
				  <tr  class="bgcolor_02">
					<td width="5%" height="23" align="center"><strong>S No</strong></td>
					<td width="28%" height="23" align="center"><strong>Driver</strong></td>
					<td width="36%" align="center"><strong>Driver License(DL)</strong></td>
					<td width="14%" align="center"><strong>Issuing Authority</strong></td>   
					<td width="17%" align="center"><strong>Action</strong></td>
				  </tr>
				  <?php if(count($driver_row) > 0 ){  ?>
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
					<td align="center">
                    <?php
                    $driverdetails_sql="SELECT * FROM es_trans_driver_details WHERE id=".$driver['id'];
					$driverdetails_exe=mysql_query($driverdetails_sql);
					$driverdetails_row=mysql_fetch_array($driverdetails_exe);
					echo $driverdetails_row['driver_license'];
					?>
                    </td>
					<td align="center"><?php echo $driverdetails_row['issuing_authority'];?></td>    
					<td align="center">
					<?php if(in_array("14_10", $admin_permissions)){
                    if($driver['status']=="Active" ){?>
					<a title="Edit Vehicles" href="?pid=81&action=editdriver&id=<?php echo $driver['id'];?>"><?php echo editIcon(); ?></a>&nbsp;
                    <?php }elseif($driver['status']=="issued") { echo "Terminated";} elseif($driver['status']=="resigned") { echo "Resigned";}}
					
					if(in_array("14_10", $admin_permissions)){
					if($driver['status']=="Active" ||$driver['status']=="resigned")
					{?>					
					<a title="View Vehicles" href="?pid=81&action=viewdriver&id=<?php echo $driver['id'];?>"><?php echo viewIcon(); ?></a>
					<a title="Delete Vehicles" onclick="if(confirm('Are you sure want to delete')){return true} else {return false}" href="?pid=81&action=deletedriver&id=<?php echo $driver['id'];?>"><img src="images/b_drop.png" border="0" /></a>
                    <?php }}?>
					</td>
				  </tr>
				  <?php           
				  $rw++;
				  $slno++;	   
				  } ?>
				  <tr>
					<td colspan="6" align="center"><?php paginateexte($start, $q_limit, $no_rows, "action=driverlist") ?>    </td>
				  </tr>
				  <tr>
					<td colspan="6" align="center"> <?php if (in_array("14_104", $admin_permissions)) {?><input type="button" style="cursor:pointer;" value="Print Drivers List" onclick="window.open('?pid=81&action=print_driverlist&start=<?php echo $start;?>',null,'width=700,height=500,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /><?php }?></td>
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
<?php if($action=='print_driverlist'){
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	       VALUES('".$_SESSION['eschools']['admin_id']."','es_staff','Transport','Drivers List','','Print','".$_SERVER['REMOTE_ADDR']."',NOW())";
     $log_insert_exe=mysql_query($log_insert_sql);
?> 
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="3" colspan="3"></td>
</tr>
<tr>
<td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Drivers List</strong></td>
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
					<td width="28%" height="23" align="center"><strong>Driver</strong></td>
					<td width="36%" align="center"><strong>Driver License(DL)</strong></td>
					<td width="14%" align="center"><strong>Issuing Authority</strong></td>   
					<td width="17%" align="center"><strong>Status</strong></td>
				  </tr>
				  <?php
				 if(count($driver_row) > 0 ){ echo 'ab';?>
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
					<td align="center">
                    <?php
                   $driverdetails_sql="SELECT * FROM es_trans_driver_details WHERE id=".$driver['id'];
					$driverdetails_exe=mysql_query($driverdetails_sql);
					$driverdetails_row=mysql_fetch_array($driverdetails_exe);
					echo $driverdetails_row['driver_license'];
					?>
                    </td>
					<td align="center"><?php echo $driverdetails_row['issuing_authority'];?></td>    
					<td align="center">
					<?php 
					 if($driver['tcstatus']=="issued"){echo "Terminated";}elseif($driver['tcstatus']=="resigned"){echo "Resigned";} else {echo "Working";}?></td>
				  </tr>
				  <?php           
				  $rw++;
				  $slno++;	   
				  } ?>
				 
				  <?php } 
											
							  else {
							   echo "<tr>";
							   echo "<td align='center' class='narmal' colspan='5'>No records found</td>";
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