<?php if($action == 'addtransport' || $action == 'edit_vehicles' ||$action=='view_vehicles') {
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="4" class="bgcolor_02">&nbsp;&nbsp;<strong> Transport</strong></td>
              </tr>
              <?php 
	if (isset($viewvehicles) && count($viewvehicles)>0 && $action == 'addtransport' ||$action=='view_vehicles') {
	?>
      <tr>
			<td class="bgcolor_02" width="1"/>
			<td valign="top" align="left">
					<table width="100%" border="0" cellspacing="3" cellpadding="0">
				  <tr>
				    <td width="1%" align="left" class="narmal">&nbsp;</td>
							<td width="24%" align="left" class="narmal">Transport Type</td>
						  <td width="1%" align="left">:</td>
						  <td width="41%" align="left"><?php echo $viewvehicles->tr_transport_type;?>							</td>
						  <td width="33%">&nbsp;</td>
						</tr>
						<tr>
						  <td width="1%" align="left" class="narmal">&nbsp;</td>
							<td width="24%" align="left" class="narmal">Transport Name</td>
						  <td width="1%" align="left">:</td>
						  <td width="41%" align="left"><?php echo $viewvehicles->tr_transport_name;?>							</td>
						  <td width="33%">&nbsp;</td>
						</tr>
						<tr>
						  <td width="1%" align="left" class="narmal">&nbsp;</td>
							<td width="24%" align="left" class="narmal">Transport #</td>
						  <td width="1%" align="left">:</td>
						  <td width="41%" align="left"><?php echo $viewvehicles->tr_transport_no;?>							</td>
						  <td width="33%">&nbsp;</td>
						</tr>
						<tr>
						  <td width="1%" align="left" class="narmal">&nbsp;</td>
							<td width="24%" align="left" class="narmal">Vehicle Registration #</td>
						  <td width="1%" align="left">:</td>
						  <td width="41%" align="left"><?php echo $viewvehicles->tr_vehicle_no;?>							</td>
						  <td width="33%">&nbsp;</td>
						</tr>
						<tr>
						  <td width="1%" align="left" class="narmal">&nbsp;</td>
							<td width="24%" align="left" class="narmal">No Of Passengers</td>
						  <td width="1%" align="left">:</td>
						  <td width="41%" align="left"><?php echo $viewvehicles->tr_seating_capacity;?>							</td>
						  <td width="33%">&nbsp;</td>
						</tr>
						<tr>
						  <td width="1%" align="left" class="narmal">&nbsp;</td>
							<td width="24%" align="left" class="narmal">Route</td>
						  <td width="1%" align="left">:</td>
						  <td width="41%" align="left"><?php echo $viewvehicles->tr_route;?>							</td>
						  <td width="33%">&nbsp;</td>
						</tr>
						<tr>
						  <td width="1%" align="left" class="narmal">&nbsp;</td>
							<td width="24%" align="left" class="narmal">From</td>
						  <td width="1%" align="left">:</td>
						  <td width="41%" align="left"><?php echo $viewvehicles->tr_route_from;?>							</td>
						  <td width="33%">&nbsp;</td>
						</tr>
						<tr>
						  <td width="1%" align="left" class="narmal">&nbsp;</td>
							<td width="24%" align="left" class="narmal">To</td>
						  <td width="1%" align="left">:</td>
						  <td width="41%" align="left"><?php echo $viewvehicles->tr_route_to;?>							</td>
						  <td width="33%">&nbsp;</td>
						</tr>
						<tr>
						  <td width="1%" align="left" class="narmal">&nbsp;</td>
							<td width="24%" align="left" class="narmal">Via</td>
						  <td width="1%" align="left">:</td>
						  <td width="41%" align="left"><?php echo $viewvehicles->tr_route_via;?>							</td>
						  <td width="33%">&nbsp;</td>
						</tr>
						
						
						<tr>
						  <td align="left" class="narmal">&nbsp;</td>
							<td align="left" class="narmal">&nbsp;</td>
						  <td align="left">&nbsp;</td>
						  <td align="left"><input type="submit" name="back" style="cursor:pointer" onclick="javascript:history.go(-1);" id="back" value="back" class="bgcolor_02"/></td>
						  <td>&nbsp;</td>
						</tr>
					</table>
		</td>
			<td class="bgcolor_02" width="1"/>
		</tr>
		

<?php 
	} else{

	?>

			  <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="3" cellpadding="0">
                <?php /*?> <form action="" method="post" name="transport_add">
				  <?php  
	
							if (isset($message) && $message!=""){
						?>
							 <tr>
								  <td height="25" colspan="3" align="center" ><strong><?php echo $message; ?></strong></td>
							 </tr>
							 <?php
							}
						?>
                  <tr>
                    <td width="19%" class="narmal">&nbsp;TransportType</td>
                    <td width="0%" align="center">&nbsp;</td>
                    <td colspan="4"><select name="tr_transport_type" id="tr_transport_type">
					<option value="">Select Transport </option>
					<option value="bus" <?php if($getvehicles->tr_transport_type=="bus") {
					echo "selected";
					}?> >bus</option>
					<option value="car" <?php if($getvehicles->tr_transport_type=="car") {
					echo "selected";
					}?> >car</option>
					<option value="geep"<?php if($getvehicles->tr_transport_type=="geep") {
					echo "selected";
					}?> >geep</option>
					<option value="auto" <?php if($getvehicles->tr_transport_type=="auto") {
					echo "selected";
					}?> >auto</option>
					<option value="minibus" <?php if($getvehicles->tr_transport_type=="minibus") {
					echo "selected";
					}?> >minibus</option>
					<option value="van" <?php if($getvehicles->tr_transport_type=="van") {
					echo "selected";
					}?> >van</option>
					<option value="other" <?php if($getvehicles->tr_transport_type=="other") {
					echo "selected";
					}?> >other</option>
					 </select>
					 
					 
					</td>
				  </tr>
                  
				  <tr>
                    <td width="19%" class="narmal"></td>
                    <td width="0%" align="center">&nbsp;</td>
                    <td colspan="4" class="error_message"><?php 
                                    if (isset($error_transport_type)&&$error_transport_type!=""){
                                          echo $error_transport_type;
                                    }
                              ?>
				</td>
				  </tr>
				<tr>
                    <td class="narmal">&nbsp;Transport Name </td>
                    <td align="center">&nbsp;</td>
                    <td width="26%" class="narmal"><input name="tr_transport_name" type="text" size="13" value="<?php
										          if (isset($tr_transport_name)){ 
														 echo $_POST['tr_transport_name'];
													}elseif (isset($getvehicles->tr_transport_name)){
														
															echo $getvehicles->tr_transport_name;
													} 
											
											?>" /></td>
                  
                   <td class="narmal">Date Of Purchase</td>
                    <td colspan="2" class="narmal"><input class="plain" name="tr_purchase_date" id="tr_purchase_date"  size="16" value="<?php
										          if (isset($tr_purchase_date)){ 
														 echo $_POST['tr_purchase_date'];
													}elseif (isset($getvehicles->tr_purchase_date)){
														
															echo $getvehicles->tr_purchase_date;
													} 
											
											?>" >
                    <a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.transport_add.tr_purchase_date);return false;" ><img name="popcal" align="absmiddle" src="<?php echo JS_PATH ?>/DateTime/calbtn.gif" width="34" height="22" border="0" alt=""></a><iframe width=188 height=166 name="gToday:datetime:agenda.js:gfPop:plugins_time.js" id="gToday:datetime:agenda.js:gfPop:plugins_time.js" src="<?php echo JS_PATH ?>/DateTime/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe></td>
				  </tr>
                  
				 <tr>
                    <td width="15%">&nbsp;</td>
                     
                    <td >&nbsp;</td>
                    <td >&nbsp;</td>
                  </tr>
				   <tr>
                    <td class="narmal">&nbsp;Transport No </td>
                    <td align="center">&nbsp;</td>
                    <td class="narmal"><input name="tr_transport_no" type="text" size="13" value="<?php
										          if (isset($tr_transport_no)){ 
														 echo $_POST['tr_transport_no'];
													}elseif (isset($getvehicles->tr_transport_no)){
														
															echo $getvehicles->tr_transport_no;
													} 
											
											?>" /></td>
                   </tr>
				   <tr>
                    <td width="">&nbsp;</td>
                     
                    <td >&nbsp;</td>
                    <td >&nbsp;</td>
                  </tr>
				    <tr>
                                        <td height="13"></td>
                                        <td colspan="2" align="left" class="error_message"><?php 
                                    if (isset($error_transport_no)&&$error_transport_no!=""){
                                          echo $error_transport_no;
                                    }
                              ?>
                                        </td>
                   </tr>
				 
					<tr>
					<td class="narmal">Vehicle No</td>
                    <td align="center">&nbsp;</td>
					<td colspan="2" class="narmal"><input name="tr_vehicle_no" type="text" size="13" value="<?php
										          if (isset($tr_vehicle_no)){ 
														 echo $_POST['tr_vehicle_no'];
													}elseif (isset($getvehicles->tr_vehicle_no)){
														
															echo $getvehicles->tr_vehicle_no;
													} 
											
											?>" /></td>
                  </tr>
                  <tr>
                    <td width="">&nbsp;</td>
                     
                    <td >&nbsp;</td>
                    <td >&nbsp;</td>
                  </tr>
				  <tr>
                    <td class="narmal">Insurance Date</td>
                   
                    <td colspan="2" class="narmal"><input name="tr_insurance_date"  id="tr_insurance_date" class="plain"  size="13" value="<?php
										          if (isset($tr_insurance_date)){ 
														 echo $_POST['tr_insurance_date'];
													}elseif (isset($getvehicles->tr_insurance_date)){
														
															echo $getvehicles->tr_insurance_date;
													} 
											
											?>" />
                      <a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.transport_add.tr_insurance_date);return false;" ><img name="popcal" align="absmiddle" src="<?php echo JS_PATH ?>/DateTime/calbtn.gif" width="34" height="22" border="0" alt="" /></a>
                        </td>
                    <td class="narmal">Insurance Renewal Date </td>
                    <td colspan="2" class="narmal"><input class="plain" name="tr_ins_renewal_date" id="tr_ins_renewal_date"  size="16" value="<?php
										          if (isset($tr_ins_renewal_date)){ 
														 echo $_POST['tr_ins_renewal_date'];
													}elseif (isset($getvehicles->tr_ins_renewal_date)){
														 echo $getvehicles->tr_ins_renewal_date;
													} 
											
											?>" >
                    <a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.transport_add.tr_ins_renewal_date);return false;" ><img name="popcal" align="absmiddle" src="<?php echo JS_PATH ?>/DateTime/calbtn.gif" width="34" height="22" border="0" alt=""></a></td>
                  </tr>
                 <tr>
                    <td width="15%">&nbsp;</td>
                   
                    <td >&nbsp;
                     </td>
                    <td class="narmal">&nbsp; </td>
                    <td align="right" class="error_message"><?php 
                                    if (isset($error_renewal_date)&&$error_renewal_date!=""){
                                          echo $error_renewal_date;
                                    }
                              ?></td>
                  </tr>
                  
				  <tr>
                    <td class="narmal">&nbsp;No Of Passenger </td>
                     
                    <td align="center">&nbsp;</td>
                    <td colspan="5" class="narmal"><input name="tr_seating_capacity" type="text" size="13" value="<?php
										          if (isset($tr_seating_capacity)){ 
														 echo $_POST['tr_seating_capacity'];
													}elseif (isset($getvehicles->tr_seating_capacity)){
														
															echo $getvehicles->tr_seating_capacity;
													} 
											
											?>" /></td>
                  </tr>
                  <tr>
                    <td width="">&nbsp;</td>
                     
                    <td >&nbsp;</td>
                    <td >&nbsp;</td>
                  </tr>
				  <tr>
                    <td class="narmal">&nbsp;Route</td>
                    <td align="center">&nbsp;</td>
                    <td class="narmal"><input name="tr_route" type="text" size="13" value="<?php
										          if (isset($tr_route)){ 
														 echo $_POST['tr_route'];
													}elseif (isset($getvehicles->tr_route)){
														
															echo $getvehicles->tr_route;
													} 
											
											?>" /></td>
                    <td align="left" valign="middle" class="narmal"> From&nbsp;
                         <input name="tr_route_from" type="text" size="5" value="<?php
										          if (isset($tr_route_from)){ 
														 echo $_POST['tr_route_from'];
													}elseif (isset($getvehicles->tr_route_from)){
														
															echo $getvehicles->tr_route_from;
													} 
											
											?>" /></td>
                    <td width="18%" align="left" valign="middle" class="narmal">to&nbsp;
                      <input name="tr_route_to" type="text" size="5" value="<?php
										          if (isset($tr_route_to)){ 
														 echo $_POST['tr_route_to'];
													}elseif (isset($getvehicles->tr_route_to)){
														
															echo $getvehicles->tr_route_to;
													} 
											
											?>" /></td>
                    <td width="24%" align="left" valign="middle" class="narmal">Via                    
                    <input name="tr_route_via" type="text" size="5" value="<?php
										          if (isset($tr_route_via)){ 
														 echo $_POST['tr_route_via'];
													}elseif (isset($getvehicles->tr_route_via)){
														
															echo $getvehicles->tr_route_via;
													} 
											
											?>" /></td>
               
			      </tr>
               
			    <tr>
                    <td width="15" class="narmal">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="left" class="error_message"><?php if (isset($error_route)&&$error_route!=""){
                                          echo $error_route;
                                    }
                              ?></td>
                    <td align="left" valign="middle" class="narmal">&nbsp;</td>
                    <td  align="left" valign="middle" class="narmal">&nbsp;</td>
                    <td  align="left" valign="middle" class="narmal">&nbsp;</td>
                  </tr>
                 
				 <tr>
                    <td height="38" class="narmal">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td colspan="4" class="narmal"><input type="hidden" name="edit_id" value="<?php echo $getvehicles->es_transportId;?>"><input name="addtrSubmit" type="submit" class="bgcolor_02" value="Submit" />
                      <input  type="reset" class="bgcolor_02"   value="Reset" />
                     </form>
					  </td>
                  </tr><?php */?>
                  <tr>
                       <td height="38" colspan="6" class="narmal"><table width="100%" border="0" cellpadding="1" cellspacing="1" bordercolor="#CCCCCC">
                       <tr  class="bgcolor_02">
                            <td width="12%" height="23" align="center"><strong>S No</strong></td>
                            <td width="12%" align="center">Transport&nbsp;Type</td>
                         
                         <td width="18%" align="center"><strong>Route</strong></td>
                            <td width="17%" align="center"><strong>Transport&nbsp;#</strong></td>
							<td width="23%" align="center"><strong>Registration # </strong></td>
					     <td width="18%" align="center"><strong>Action</strong></td>
                          </tr>
                     	    <?php 
							if(count($addTransportList) > 0 ){ 					
                                     $rw = 1;
                                    $slno = $start+1;
                              foreach ($addTransportList as $es_transport)
                                 {  
									if($rw%2==0)
										$rowclass = "even";
										else
										$rowclass = "odd";
                            ?>
                         <tr class="<?php echo $rowclass;?>">
                            <td align="center"><?php echo $slno;?></td>
                            <td align="center"><?php echo $es_transport->tr_transport_type; ?></td>
                            <td align="center"><?php echo $es_transport->tr_route; ?></td>
                            <td align="center"><?php echo $es_transport->tr_transport_no; ?></td>
							<td align="center"><?php echo $es_transport->tr_vehicle_no; ?></td>
                            <td align="center"><?php /*?><a title="Edit Vehicles" href="<?php echo buildurl(array('pid'=>6, 'action'=>'edit_vehicles', 'uid'=>$es_transport->es_transportId));?>#editvehicles"><?php echo editIcon().'-'; ?></a> 
										<a title="Delete Vehicles" href="<?php  echo buildurl(array('pid'=>6, 'action'=>'delete_vehicles', 'uid'=>$es_transport->es_transportId));?>#deletevehicles" onclick="return confirm('<?php echo SM_CONFIRM_DELETE_MESSAGE;?>');"><?php echo deleteIcon().'-'; ?></a><?php */?>
                                  <a title="View Vehicles" href="<?php  echo buildurl(array('pid'=>6, 'action'=>'view_vehicles', 'uid'=>$es_transport->es_transportId));?>#viewvehicles" ><?php echo viewIcon(); ?></a></td>
                          </tr>
                                
                  
				   <?php           $rw++;
                                   $slno++;
								   
								   } ?> 
                   
                          
                                   <tr>
                                        <td colspan="5" align="center"><?php paginateexte($start, $q_limit, $no_rows, "action=".$action."&column_name=".$orderby."&asds_order=".$asds_order) ?>										</td>
                                   </tr>
                    <?php } 
                    	
                          else {
					       echo "<tr >";
					       echo "<td align='center' height='30' class='narmal'>No records found</td>";
						   echo "</tr>";
					} 
                    
                    
                    
                    ?>
                    </table></td>
                       </tr>
          
			    </table>
				<?php } ?>
				
				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
			   <tr>
					<td height="1" colspan="3" class="bgcolor_02"></td>
			   </tr>
		  
		    </table>
			
<?php } ?>
<?php if($action == 'maintenance' || $action == 'edit_maintenance' ||$action=='view_maintenance') {
?>			
			 <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>Maintenance Details</strong></td>
              </tr>
      <?php 
	if (isset($viewmaintenance) && count($viewmaintenance)>0 && $action == 'maintenance' ||$action=='view_maintenance') {
	?>        
			  
			   <tr>
			<td class="bgcolor_02" width="1"/>
			<td valign="top" align="left">
					<table width="100%" border="0" cellspacing="3" cellpadding="0">

						<tr>
							<td width="26%" align="right" class="narmal">Vehicle Number</td>
							<td width="4%" align="center">:</td>
							<td width="31%"><?php echo $viewmaintenance->tr_transportid;?>
							</td>
							<td width="39%">&nbsp;</td>
						</tr>
						<tr>
							<td width="26%" align="right" class="narmal">Maintenance Type</td>
							<td width="4%" align="center">:</td>
							<td width="31%"><?php echo $viewmaintenance->tr_maintenance_type;?>
							</td>
							<td width="39%">&nbsp;</td>
						</tr>
						<tr>
							<td width="26%" align="right" class="narmal">Date of Maintenance</td>
							<td width="4%" align="center">:</td>
							<td width="31%"><?php echo $viewmaintenance->tr_date_of_maintenance;?>
							</td>
							<td width="39%">&nbsp;</td>
						</tr>
						<tr>
							<td width="26%" align="right" class="narmal">Amount Paid</td>
							<td width="4%" align="center">:</td>
							<td width="31%"><?php echo $viewmaintenance->tr_amount_paid;?>
							</td>
							<td width="39%">&nbsp;</td>
						</tr>
						<tr>
							<td width="26%" align="right" class="narmal">Remarks</td>
							<td width="4%" align="center">:</td>
							<td width="31%"><?php echo $viewmaintenance->tr_remarks;?>
							</td>
							<td width="39%">&nbsp;</td>
						</tr>
						
                         <tr>
							<td align="right" class="narmal">&nbsp;</td>
							<td align="center">&nbsp;</td>
							<td><input type="submit" name="back" style="cursor:pointer" onclick="javascript:history.go(-1);" id="back" value="back" class="bgcolor_02"/></td>
							<td>&nbsp;</td>
						</tr>
					</table>
			</td>
			<td class="bgcolor_02" width="1"/>
		</tr>
	<?php 
	
	} 
	
	else {

	?> <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="3" cellpadding="0">
                  <form action="" method="post" name="transport_maintenance">
				   <?php  
	
							if (isset($message) && $message!=""){
						?>
							 <tr>
								  <td height="25" colspan="3" align="center" ><strong><?php echo $message; ?></strong></td>
							 </tr>
							 <?php
							}
						?>
				  
				  <tr>
                    <td colspan="5">&nbsp;</td>
                    </tr>
                  
                  <tr>
                    <td width="23%" class="narmal">&nbsp;Vehicle No </td>
                    <td width="4%" align="center">:</td>
                    <td width="30%" class="narmal"><select name="vehicle_no" id="vehicle_no"  >
						<option value="">Select Vehicle No</option>
<?php
                        if (count($addTransportList)>0){		
							foreach($addTransportList as $es_transport){ 
?>                                <option value="<?php  echo $es_transport->tr_vehicle_no; ?>" 
								   <?php if ($_POST['vehicle_no']==$es_transport->tr_vehicle_no){ 
														 echo "selected";
													}elseif ($getmaintenance->tr_transportid==$es_transport->tr_vehicle_no){echo "Selected";
													} 
									   ?> ><?php echo $es_transport->tr_vehicle_no; ?></option>
								 <?php 
							
							
					          }
					}		  
							
?>
				
					</select></td>
                 </tr>
				 
                  <tr>
                    <td class="narmal"><p>&nbsp;Maintenance Type </p></td>
                    <td align="center">:</td>
                    <td class="narmal"><input type="text" name="tr_maintenance_type" value="<?php
										          if (isset($tr_maintenance_type)){ 
														 echo $_POST['tr_maintenance_type'];
													}elseif (isset($getmaintenance->tr_maintenance_type)){
														
															echo $getmaintenance->tr_maintenance_type;
													} 
											
											?>" /></td>
                    <td colspan="2" class="narmal">&nbsp;</td>
                    </tr>
                 <tr>
                                        <td height="13"></td>
                                        <td colspan="2" align="left" class="error_message"><?php 
                                    if (isset($error_maintenance_type)&&$error_maintenance_type!=""){
                                          echo $error_maintenance_type;
                                    }
                              ?>
                                        </td>
                   </tr>
				  <tr>
                    <td class="narmal">&nbsp;Date of Maintenance </td>
                     
                    <td align="center">:</td>
                    <td colspan="3" class="narmal"><input name="tr_date_of_maintenance"  id="tr_date_of_maintenance" class="plain" size="20" value="<?php
										          if (isset($tr_date_of_maintenance)){ 
														 echo $_POST['tr_date_of_maintenance'];
													}elseif (isset($getmaintenance->tr_date_of_maintenance)){
														
															echo $getmaintenance->tr_date_of_maintenance;
													} 
											
											?>"/>
                      <a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.transport_maintenance.tr_date_of_maintenance);return false;" ><img name="popcal" align="absmiddle" src="<?php echo JS_PATH ?>/DateTime/calbtn.gif" width="34" height="22" border="0" alt="" /></a>
                         <iframe width=188 height=166 name="gToday:datetime:agenda.js:gfPop:plugins_time.js" id="gToday:datetime:agenda.js:gfPop:plugins_time.js" src="<?php echo JS_PATH ?>/DateTime/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe></td>
                  </tr>
				  <tr>
                    <td class="narmal"> &nbsp;Amount Paid </td>
                     
                    <td align="center">:</td>
                    <td colspan="3" class="narmal"><input type="text" name="tr_amount_paid" value="<?php
										          if (isset($tr_amount_paid)){ 
														 echo $_POST['tr_amount_paid'];
													}elseif (isset($getmaintenance->tr_amount_paid)){
														
															echo $getmaintenance->tr_amount_paid;
													} 
											
											?>" /></td>
                  </tr>
                  <tr>
                                        <td height="13"></td>
                                        <td colspan="2" align="left" class="error_message"><?php 
                                    if (isset($error_amount_paid)&&$error_amount_paid!=""){
                                          echo $error_amount_paid;
                                    }
                              ?>
                                        </td>
                   </tr>
				  <tr>
                    <td class="narmal">&nbsp;Remarks</td>
                    <td align="center">&nbsp;</td>
                    <td colspan="3" class="narmal"><textarea name="tr_remarks" cols="16"><?php
										          if (isset($tr_remarks)){ 
														 echo $_POST['tr_remarks'];
													}elseif (isset($getmaintenance->tr_remarks)){
														
															echo $getmaintenance->tr_remarks;
													} 
											
											?></textarea></td>
                  </tr>
                   <tr>
                                        <td height="13"></td>
                                        <td colspan="2" align="left" class="error_message"><?php 
                                    if (isset($error_remarks)&&$error_remarks!=""){
                                          echo $error_remarks;
                                    }
                              ?>
                                        </td>
                   </tr>
				  <tr>
                    <td class="narmal">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td colspan="3" class="narmal"><input type="hidden" name="edit_id" value="<?php echo $getmaintenance->es_transport_maintenanceId;?>"><input name="maintenanceSubmit" type="submit" class="bgcolor_02" value="Submit" style="cursor:pointer" />
                      <input  type="reset" class="bgcolor_02" value="Cancel" style="cursor:pointer" /></td>
                  </tr>
                            </form>
						    <tr>
                       <td height="38" colspan="6" class="narmal"><table width="100%" border="0" cellpadding="1" cellspacing="1" bordercolor="#CCCCCC">
                        <?php if(count($maintenanceList) > 0 ){ ?>
                       <tr  class="bgcolor_02">
                            <td width="10%" height="23" align="center"><strong>S No</strong></td>
                            <td width="10%" align="center">Vehicle&nbsp;No</td>   
                            <td width="15%" align="center"><strong>Maintenance&nbsp;Type</strong></td>
							<td width="16%" align="center"><strong>Date&nbsp;of&nbsp;Maintenance</strong></td>
                            <td width="15%" align="center"><strong>Amount&nbsp;Paid</strong></td>
							<td width="17%" align="center"><strong>Remarks</strong></td>
						    <td width="20%" align="center"><strong>Action</strong></td>
                          </tr>
<?php						
		 $rw = 1;
		$slno = $start+1;
  foreach ($maintenanceList as $es_transport_maintenance){  
		if($rw%2==0)
			$rowclass = "even";
			else
			$rowclass = "odd";
	$vehicledet = get_vehiclename($es_transport_maintenance->tr_transportid);
?>
                         <tr class="<?php echo $rowclass;?>">
                            <td align="center"><?php echo $slno;?></td>
                            <td align="center"><?php echo $es_transport_maintenance->tr_transportid; ?></td>
                            <td align="center"><?php echo $es_transport_maintenance->tr_maintenance_type; ?></td>
							<td align="center"><?php echo displaydate($es_transport_maintenance->tr_date_of_maintenance); ?></td>
                            <td align="center"><?php echo $es_transport_maintenance->tr_amount_paid; ?></td>
							<td align="center"><?php echo $es_transport_maintenance->tr_remarks; ?></td>
                            <td align="center"><a title="Edit Maintenance" href="<?php echo buildurl(array('pid'=>6, 'action'=>'edit_maintenance', 'uid'=>$es_transport_maintenance->es_transport_maintenanceId));?>#editmaintenance"><?php echo editIcon().'-'; ?></a> 
										<a title="Delete Maintenance" href="<?php  echo buildurl(array('pid'=>6, 'action'=>'delete_maintenance', 'uid'=>$es_transport_maintenance->es_transport_maintenanceId));?>#deletemaintenance" onclick="return confirm('<?php echo SM_CONFIRM_DELETE_MESSAGE;?>');"><?php echo deleteIcon().'-'; ?></a>
                                  <a title="View Maintenance" href="<?php  echo buildurl(array('pid'=>6, 'action'=>'view_maintenance', 'uid'=>$es_transport_maintenance->es_transport_maintenanceId));?>#viewmaintenance" ><?php echo viewIcon(); ?></a></td>
                          </tr>
                                
                  
				   <?php           $rw++;
                                   $slno++;
								   
								   } ?> 
                   
                          
                                   <tr>
                                        <td colspan="6" align="center"><?php paginateexte($start, $q_limit, $no_rows, "action=".$action."&column_name=".$orderby."&asds_order=".$asds_order) ?>
										
										</td>
                                   </tr>
                    <?php } 
                    	
                          else {
					       echo "<tr>";
					       echo "<td align='center' class='narmal'>No records found</td>";
						   echo "</tr>";
					} ?>
                    </table>
				    </td>
                    </tr>
                  </table>
					<?php } ?>
				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
                </tr>
            </table>

 <?php } ?> 
 
 <?php if($action == 'viewreport' || $action == 'edit_viewreport' ||$action=='view_viewreport') {
 ?>	
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>ViewReport</strong></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                                  <td><table width="100%">
                                      <form action="" method="post" name="transport_search" id="transport_search" >
                                        <tr>
                                          <td width="136" class="admin">Insurance&nbsp;Renewal&nbsp;Date</td>
                                          <td width="249"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                                <td width="44%" class="narmal">From:</td>
                                                <td width="35%"><input class="plain" name="dc1" value="<?php if (isset($dc1)) {
																													echo $_POST['dc1'];
																											 }	 ?>" size="12" onfocus="this.blur()" readonly="readonly" /></td>
                                                <td width="21%"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fStartPop(document.transport_search.dc1,document.transport_search.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a></td>
                                              </tr>
                                          </table></td>
                                         
									 
										  <td width="782"><table width="94%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td width="8%"  class="narmal">To:</td>
                                              <td width="10%"><input class="plain" name="dc2" value="<?php if(isset($_POST['dc2'])) {
											  																	echo $_POST['dc2'];
											  															   }?>" size="12" onfocus="this.blur()" readonly="readonly" /></td>
                                              <td width="82%"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fEndPop(document.transport_search.dc1,document.transport_search.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a></td>
                                            </tr>
                                          </table></td>
										  <td width="25">&nbsp;</td>
                                      
                                          <td><input type="submit" name="Search2" value="Search" class="bgcolor_02" style="cursor:pointer" /></td>
                                          <td>&nbsp;</td>
                                        </tr>
                                      </form>
                                  </table>
								  <iframe width=132 height=142 name="gToday:contrast:agenda.js" id="gToday:contrast:agenda.js" src="<?php echo JS_PATH ?>/DateRange/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe> </td>
                                </tr>
                  <tr>
                    <td class="narmal"><table width="100%" border="0" cellspacing="1" cellpadding="0">
                     <?php if(count($transportList) > 0 ){ ?>
					  <tr class="bgcolor_02">
                        <td width="7%" height="20" align="center" ><strong>S NO </strong></td>
                        <td width="14%" align="center" ><strong>Vehicle No </strong></td>
                        <td width="18%" align="center" ><strong>Vehicle Name</strong></td>
                        <td width="22%" align="center"><strong>Maintenance</strong></td>
                        <td width="20%" align="center"><strong>Insurance Renewal Date </strong></td>
                        <td width="19%" align="center"><strong>Remarks</strong></td>
                      </tr>
							  <?php						
											$rw = 1;
											$slno = $start+1;
								
								foreach ($transportList as $transport)
								{  
									   
										if($rw%2==0)
											$rowclass = "even";
											else
											$rowclass = "odd"; 
								 ?>
									  <tr class="<?php echo $rowclass;?>">
										<td align="center"><?php echo $slno;?></td>
										<td align="center"><?php echo $transport['tr_vehicle_no']; ?></td>
										<td align="center"><?php echo $transport['tr_transport_name']; ?></td>
										<td align="center"><?php echo $transport['tr_maintenance_type']; ?></td>
										<td align="center"><?php echo displaydate($transport['tr_ins_renewal_date']); ?></td>
										<td align="center"><?php echo $transport['tr_remarks']; ?></td>
									  </tr>
									  <?php 
										 $rw++;
										 $slno++;

				   
				                } ?> 
                   
                          <tr>
                                        <td colspan="8" align="center"><?php paginateexte($start, $q_limit, $no_rows, "action=".$action."&column_name=".$orderby."&asds_order=".$asds_order.$searchUrl) ?></td>
                                      </tr>
						  
                                   
                    <?php } 
                    	
                          else {
					       echo "<tr>";
					       echo "<td align='center' class='narmal'>No records found</td>";
						   echo "</tr>";
					} ?>
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
			
			
			
		<?php } ?>	