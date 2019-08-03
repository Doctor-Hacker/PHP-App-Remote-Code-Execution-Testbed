<?php 

/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
	if($action == 'addtransport' || $action == 'edit_vehicles' ||$action=='view_vehicles') {
?>
<script language="javascript">
function newWindowOpen(href)
{
    window.open(href,null, 'width=900,height=900,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');
}
</script>

			
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
	 </tr>
	<tr>
		<td height="25" colspan="3" class="bgcolor_02">&nbsp;<strong> Transport</strong></td>
  </tr>
  

	<?php 
		if (isset($viewvehicles) && count($viewvehicles)>0 && $action == 'addtransport' ||$action=='view_vehicles') {
	?>
      
      
      
      <tr>
			<td class="bgcolor_02" width="1"/>
			<td valign="top" align="left">
					<table width="100%" border="0" cellspacing="3" cellpadding="0">
				  <tr>
							<td width="26%" align="left" class="narmal">Transport Type</td>
						  <td width="4%" align="left">:</td>
						  <td width="31%" align="left"><?php echo $viewvehicles->tr_transport_type;?></td>
						  <td width="39%">&nbsp;</td>
						</tr>
						<tr>
							<td width="26%" align="left" class="narmal">Transport Name</td>
						  <td width="4%" align="left">:</td>
						  <td width="31%" align="left"><?php echo $viewvehicles->tr_transport_name;?>							</td>
						  <td width="39%">&nbsp;</td>
						</tr>
						<tr>
							<td width="26%" align="left" class="narmal">Transport #</td>
						  <td width="4%" align="left">:</td>
						  <td width="31%" align="left"><?php echo $viewvehicles->tr_transport_no;?>							</td>
						  <td width="39%">&nbsp;</td>
						</tr>
						<tr>
							<td width="26%" align="left" class="narmal">Vehicle Reg. #</td>
						  <td width="4%" align="left">:</td>
						  <td width="31%" align="left"><?php echo $viewvehicles->tr_vehicle_no;?>							</td>
						  <td width="39%">&nbsp;</td>
						</tr>
						<tr>
							<td width="26%" align="left" class="narmal">Number Of Passengers</td>
						  <td width="4%" align="left">:</td>
						  <td width="31%" align="left"><?php echo $viewvehicles->tr_seating_capacity;?>							</td>
						  <td width="39%">&nbsp;</td>
						</tr>
						<tr>
							<td width="26%" align="left" class="narmal">Route</td>
						  <td width="4%" align="left">:</td>
						  <td width="31%" align="left"><?php echo $viewvehicles->tr_route;?>							</td>
						  <td width="39%">&nbsp;</td>
						</tr>
						<tr>
							<td width="26%" align="left" class="narmal">From</td>
						  <td width="4%" align="left">:</td>
						  <td width="31%" align="left"><?php echo $viewvehicles->tr_route_from;?>							</td>
						  <td width="39%">&nbsp;</td>
						</tr>
						<tr>
							<td width="26%" align="left" class="narmal">To</td>
						  <td width="4%" align="left">:</td>
						  <td width="31%" align="left"><?php echo $viewvehicles->tr_route_to;?>							</td>
						  <td width="39%">&nbsp;</td>
						</tr>
						<tr>
							<td width="26%" align="left" class="narmal">Via</td>
						  <td width="4%" align="left">:</td>
						  <td width="31%" align="left"><?php echo $viewvehicles->tr_route_via;?>							</td>
						  <td width="39%">&nbsp;</td>
						</tr>
						<tr>
							<td width="26%" align="left" class="narmal">Date Of Purchase</td>
						  <td width="4%" align="left">:</td>
						  <td width="31%" align="left"><?php echo displayDate($viewvehicles->tr_purchase_date);?>							</td>
						  <td width="39%">&nbsp;</td>
						</tr>
						<tr>
							<td width="26%" align="left" class="narmal">Insurance Date</td>
						  <td width="4%" align="left">:</td>
						  <td width="31%" align="left"><?php echo displayDate($viewvehicles->tr_insurance_date);?>							</td>
						  <td width="39%">&nbsp;</td>
						</tr>
						<tr>
							<td width="26%" align="left" class="narmal">Insurance Renewal Date</td>
						  <td width="4%" align="left">:</td>
						  <td width="31%" align="left"><?php echo displayDate($viewvehicles->tr_ins_renewal_date);?>							</td>
						  <td width="39%">&nbsp;</td>
						</tr>
						
						<tr>
							<td align="right" class="narmal">&nbsp;</td>
							<td align="center">&nbsp;</td>
							<td><input type="submit" name="back" onclick="javascript:history.go(-1);" id="back" value="back" class="bgcolor_02"/></td>
							<td>&nbsp;</td>
						</tr>
					</table>
		</td>
			<td class="bgcolor_02" width="1"/></td>
		</tr>
		

<?php 
	} else{

	?>
               <tr>
			<td class="bgcolor_02" width="1"/></td>
            <td class="narmal" align="left"><strong>Note :</strong><ul>
		<li>T TYPE => Transport Type</li>
        <li>T NAME => Transport Name</li></ul></td>
            <td class="bgcolor_02" width="1"/></td>
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
<td width="12%" align="left" class="narmal">Transport&nbsp;Type</td>
    <td width="54%" align="left"  class="narmal"><select name="tr_transport_type" id="tr_transport_type">
			  <option value="">--Select--</option>
			  <option value="bus" <?php if($getvehicles->tr_transport_type=="bus") {
					echo "selected";
					}
					elseif ($tr_transport_type == "bus") {
					echo "selected";
					}
					?> >Bus</option>
			  <option value="Car(Manual)" <?php if($getvehicles->tr_transport_type=="Car(Manual)") {
					echo "selected";
					}
					elseif ($tr_transport_type == "Car(Manual)") {
					echo "selected";
					}
					?> >Car(Manual)</option>
			  <option value="Car(Auto)" <?php if($getvehicles->tr_transport_type=="Car(Auto)") {
					echo "selected";
					}
					elseif ($tr_transport_type == "Car(Auto)") {
					echo "selected";
					}
					?> >Car(Auto)</option>
			  <option value="minibus" <?php if($getvehicles->tr_transport_type=="minibus") {
					echo "selected";
					}
					elseif ($tr_transport_type == "minibus") {
					echo "selected";
					}
					?> >Minibus</option>
			  <option value="van" <?php if($getvehicles->tr_transport_type=="van") {
					echo "selected";
					}
					elseif ($tr_transport_type == "van") {
					echo "selected";
					}
					 ?> >Van</option>
			  <option value="coach" <?php if($getvehicles->tr_transport_type=="coach") {
					echo "selected";
					}
					elseif ($tr_transport_type == "coach") {
					echo "selected";
					}
					?> >Coach</option>
			  <option value="other" <?php if($getvehicles->tr_transport_type=="other") {
					echo "selected";
					}
					elseif ($tr_transport_type == "other") {
					echo "selected";
					}
					?> >Other</option>
		  </select><font color="#FF0000">*</font></td>
    <td width="7%" align="left">&nbsp;</td>
    <td colspan="2" align="left">&nbsp;</td>
    <td width="1%">&nbsp;</td>
    <td width="2%">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" class="narmal">Transport Name</td>
    <td align="left"><span class="narmal">
      <input name="tr_transport_name" type="text" size="16" value="<?php
													  if (isset($tr_transport_name)){ 
															 echo stripslashes($_POST['tr_transport_name']);
														}elseif (isset($getvehicles->tr_transport_name)){
															
																echo $getvehicles->tr_transport_name;
														} 
												
												?>" />
    </span></td>
    <td align="left"><span class="narmal"> </span></td>
    <td colspan="2" align="left">      </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="left" class="narmal">Purchased On</td>
    <td align="left" class="narmal"><input class="plain" name="tr_purchase_date" id="tr_purchase_date" readonly="readonly"  size="16" value="<?php
													  if (isset($tr_purchase_date)){ 
															 echo $_POST['tr_purchase_date'];
														}elseif (isset($getvehicles->tr_purchase_date)){
															
																echo formatDBDateTOCalender($getvehicles->tr_purchase_date);
														} 
												
												?>"><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.transport_add.tr_purchase_date);return false;" ><img name="popcal" align="absmiddle" src="<?php echo JS_PATH ?>/WeekPicker/calbtn.gif" width="34" height="22" border="0" alt=""></a><iframe width=199 height=178 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="<?php echo JS_PATH ?>/WeekPicker/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe></td>
    <td align="left">&nbsp;</td>
    <td colspan="2" align="left">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="left" class="narmal">Transport # </td>
    <td align="left"><input name="tr_transport_no" type="text" size="16" value="<?php
													  if (isset($tr_transport_no)){ 
															 echo $_POST['tr_transport_no'];
														}elseif (isset($getvehicles->tr_transport_no)){
															
																echo $getvehicles->tr_transport_no;
														} 
												
												?>" /><font color="#FF0000">*</font></td>
    <td align="left">&nbsp;</td>
    <td colspan="2" align="left">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="left"  class="narmal">Vehicle Reg. #</td>
    <td align="left" class="narmal"><input name="tr_vehicle_no" type="text" size="16" value="<?php
													  if (isset($tr_vehicle_no)){ 
															 echo $_POST['tr_vehicle_no'];
														}elseif (isset($getvehicles->tr_vehicle_no)){
															
																echo $getvehicles->tr_vehicle_no;
														} 
												
												?>" /><font color="#FF0000">*</font></td>
    <td align="left">&nbsp;</td>
    <td colspan="2" align="left">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="left"  class="narmal">Insurance Date</td>
    <td align="left"  class="narmal"><input name="tr_insurance_date"  id="tr_insurance_date" class="plain" readonly="readonly" size="16" value="<?php
													  if (isset($tr_insurance_date)){ 
															 echo $_POST['tr_insurance_date'];
														}elseif (isset($getvehicles->tr_insurance_date)){
															
																echo formatDBDateTOCalender($getvehicles->tr_insurance_date);
														} 
												
												?>" /><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.transport_add.tr_insurance_date);return false;" ><img name="popcal" align="absmiddle" src="<?php echo JS_PATH ?>/WeekPicker/calbtn.gif" width="34" height="22" border="0" alt=""></a></td>
    <td align="left"></td>
    <td colspan="2" align="left"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="left"  class="narmal">Renewal&nbsp;Date</td>
    <td align="left"  class="narmal"><input class="plain" name="tr_ins_renewal_date" id="tr_ins_renewal_date" readonly="readonly" size="16" value="<?php
													  if (isset($tr_ins_renewal_date)){ 
															 echo $_POST['tr_ins_renewal_date'];
														}elseif (isset($getvehicles->tr_ins_renewal_date)){
															echo formatDBDateTOCalender($getvehicles->tr_ins_renewal_date);
														} 
												
												?>"><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.transport_add.tr_ins_renewal_date);return false;" ><img name="popcal" align="absmiddle" src="<?php echo JS_PATH ?>/WeekPicker/calbtn.gif" width="34" height="22" border="0" alt=""></a><font color="#FF0000">*</font></td>
    <td align="left">&nbsp;</td>
    <td colspan="2" align="left">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="left"  class="narmal">No.of&nbsp;Passengers</td>
    <td align="left"  class="narmal"><input name="tr_seating_capacity" type="text" size="16" value="<?php
													  if (isset($tr_seating_capacity)){ 
															 echo $_POST['tr_seating_capacity'];
														}elseif (isset($getvehicles->tr_seating_capacity)){
															
																echo $getvehicles->tr_seating_capacity;
														} 
												
												?>" /></td>
    <td align="left">&nbsp;</td>
    <td colspan="2" align="left">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="left"  class="narmal">Route</td>
    <td colspan="4" align="left"  class="narmal"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="40%" align="left"><input name="tr_route" type="text" size="16" value="<?php
													  if (isset($tr_route)){ 
															 echo $_POST['tr_route'];
														}elseif (isset($getvehicles->tr_route)){
															
																echo $getvehicles->tr_route;
														} 
												
												?>" />
          <font color="#FF0000">*</font></td>
        <td width="4%" align="left">From</td>
        <td width="17%" align="left"><input name="tr_route_from" type="text" size="5" value="<?php
													  if (isset($tr_route_from)){ 
															 echo $_POST['tr_route_from'];
														}elseif (isset($getvehicles->tr_route_from)){
															
																echo $getvehicles->tr_route_from;
														} 
												
												?>" /></td>
        <td width="4%" align="left">To</td>
        <td width="16%" align="left"><input name="tr_route_to" type="text" size="5" value="<?php
													  if (isset($tr_route_to)){ 
															 echo $_POST['tr_route_to'];
														}elseif (isset($getvehicles->tr_route_to)){
															
																echo $getvehicles->tr_route_to;
														} 
												
												?>" /></td>
        <td width="3%" align="left">Via</td>
        <td width="16%" align="left"><input name="tr_route_via" type="text" size="5" value="<?php
													  if (isset($tr_route_via)){ 
															 echo $_POST['tr_route_via'];
														}elseif (isset($getvehicles->tr_route_via)){
															
																echo $getvehicles->tr_route_via;
														} 
												
												?>" /></td>
      </tr>
    </table></td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="left"><span class="narmal">
      <input type="hidden" name="edit_id" value="<?php echo $getvehicles->es_transportId;?>">
	  <input name="addtrSubmit" type="submit" class="bgcolor_02" value="Submit" />
      
      <input name="reset"  type="reset" class="bgcolor_02"   value="Reset" />
    </span></td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>		 
   <tr>
						   <td height="38" colspan="7" class="narmal"><table width="100%" border="0" cellpadding="1" cellspacing="1" bordercolor="#CCCCCC">
							
						   <tr  class="bgcolor_02">
								<td width="8%" height="23" align="center"><strong>S No</strong></td>
								<td width="10%" align="center"><strong>T&nbsp;Type</strong></td>							 
								<td width="14%" align="center"><strong>T&nbsp;Name</strong></td>
								<td width="15%" align="center"><strong>Route</strong></td>
								<td width="14%" align="center"><strong>Transport&nbsp;#</strong></td>
								<td width="18%" align="center"><strong>Registration #</strong></td>
								<td width="21%" align="center"><strong>Action</strong></td>
						     </tr>
                              <?php if(count($addTransportList) > 0 ){ ?>
								<?php						
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
								<td align="center"><?php echo ucfirst($es_transport->tr_transport_type); ?></td>
								<td align="center"><?php echo $es_transport->tr_transport_name; ?></td>
								<td align="center"><?php echo $es_transport->tr_route; ?></td>
								<td align="center"><?php echo $es_transport->tr_transport_no; ?></td>
								<td align="center"><?php echo $es_transport->tr_vehicle_no; ?></td>
								<td align="center">
								<a title="Edit Vehicles" href="<?php echo buildurl(array('pid'=>11, 'action'=>'edit_vehicles', 'uid'=>$es_transport->es_transportId));?>#editvehicles"><?php echo editIcon(); ?></a>&nbsp;
								<a title="Delete Vehicles" href="<?php  echo buildurl(array('pid'=>11, 'action'=>'delete_vehicles', 'uid'=>$es_transport->es_transportId));?>#deletevehicles" onClick="return confirm('<?php echo SM_CONFIRM_DELETE_MESSAGE;?>');"><?php echo deleteIcon(); ?></a>&nbsp;
								<a title="View Vehicles" href="<?php  echo buildurl(array('pid'=>11, 'action'=>'view_vehicles', 'es_particulars'=>$es_transport->es_transportId, 'uid'=>$es_transport->es_transportId));?>#viewvehicles" ><?php echo viewIcon(); ?></a></td>
							  </tr>
									
					  
					   <?php           $rw++;
									   $slno++;
									   
									   } ?> 
					   
						   
									   <tr>
											<td colspan="6" align="center"><?php paginateexte($start, $q_limit, $no_rows, "action=".$action."&column_name=".$orderby."&asds_order=".$asds_order) ?>											</td>
									   </tr>
										  <?php /*?><tr><td align="right"colspan="10"><input type="button" value="Print" name="transport_print" class="bgcolor_02" onclick="newWindowOpen('pid=11&action=transport_print')"  /></td></tr> <?php */?>
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
				</form>
				
				
				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
<?php } ?>			  
			   <tr>
					<td height="1" colspan="3" class="bgcolor_02"></td>
			   </tr>
		  
		    </table>
			
<?php } ?>


<?php if($action == 'maintenance' || $action == 'edit_maintenance' || $action=='view_maintenance' || $action=="addnew" || $action=="edit") {
?>			
<script language="javascript">
function newWindowOpen(href)
{
    window.open(href,null, 'width=900,height=900,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');
	

}
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="3" colspan="3"></td>
</tr>
<tr>
<td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Maintenance Details</strong></td>
</tr>
      <?php 
	if ($action=='view_maintenance') {
	?>        
			   <tr>
			<td class="bgcolor_02" width="1"/>
			<td valign="top" align="left">
					<table width="100%" border="0" cellspacing="3" cellpadding="0">

				  <tr>
							<td width="26%" align="left" class="narmal">Registration Number</td>
						  <td width="4%" align="left">:</td>
						  <td width="31%" align="left"><?php echo $viewmaintenance->tr_transportid;?>							</td>
						  <td width="39%">&nbsp;</td>
						</tr>
						<tr>
							<td width="26%" align="left" class="narmal">Maintenance Type</td>
						  <td width="4%" align="left">:</td>
						  <td width="31%" align="left"><?php echo $viewmaintenance->tr_maintenance_type;?>							</td>
						  <td width="39%">&nbsp;</td>
						</tr>
						<tr>
							<td width="26%" align="left" class="narmal">Maintenance Date</td>
						  <td width="4%" align="left">:</td>
						  <td width="31%" align="left"><?php echo displayDate($viewmaintenance->tr_date_of_maintenance);?>							</td>
						  <td width="39%">&nbsp;</td>
						</tr>
						<tr>
							<td width="26%" align="left" class="narmal">Amount Paid</td>
						  <td width="4%" align="left">:</td>
						  <td width="31%" align="left"><?php echo $viewmaintenance->tr_amount_paid;?></td>
						  <td width="39%">&nbsp;</td>
						</tr>
						<tr>
							<td width="26%" align="left" class="narmal">Remarks</td>
						  <td width="4%" align="left">:</td>
						  <td width="31%" align="left"><?php echo $viewmaintenance->tr_remarks;?>							</td>
						  <td width="39%">&nbsp;</td>
						</tr>
						
                         <tr>
							<td align="right" class="narmal">&nbsp;</td>
							<td align="center">&nbsp;</td>
							<td><a href="?pid=11&action=maintenance&start=<?php echo $start;?>" class="bgcolor_02" style="text-decoration:none; padding:3px;">Back</a></td>
							<td>&nbsp;</td>
						</tr>
					</table>
			</td>
			<td class="bgcolor_02" width="1"/>
		</tr>
	<?php 
	} 
	if($action=="addnew" || $action=="edit_maintenance"){ ?>  
	<tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top">
				 <form action="" method="post" name="transport_maintenance">
				<table width="100%" border="0" cellspacing="3" cellpadding="0">
                 
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
                    <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
            <td class="narmal" align="left" colspan="3"><strong>Note :</strong>
			<ul>
		<li>M TYPE => Maintenance Type</li>
        <li>M DATE => Maintenance Date</li>
		</ul> 
		</td>
  </tr>
                  <tr>
                    <td width="22%" height="25" class="narmal">&nbsp;Registration  Number </td>
                    <td width="4%" align="center">:</td>
                    <td width="74%" class="narmal"><select name="vehicle_no" id="vehicle_no" >
						<option value="">Vehicle Registration No</option>
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
				
					</select>
                         <font color="#FF0000">*</font></td>
                 </tr>
                  <tr>
                    <td height="25" class="narmal"><p>&nbsp;Maintenance Type </p></td>
                    <td align="center">:</td>
                    <td class="narmal"><input type="text" name="tr_maintenance_type" value="<?php
										          if (isset($tr_maintenance_type)){ 
														 echo stripslashes($_POST['tr_maintenance_type']);
													}elseif (isset($getmaintenance->tr_maintenance_type)){
														
															echo $getmaintenance->tr_maintenance_type;
													} 
											
											?>" />
                         <font color="#FF0000">*</font></td>
                    </tr>
                    <?php  if (isset($error_maintenance_type)&&$error_maintenance_type!=""){ ?>
                  <tr>
                                        <td height="13"></td>
                                        <td colspan="2" align="left" class="error_message"><?php 
                                   
                                          echo $error_maintenance_type;
                                   
                              ?>                                        </td>
                   </tr>
                   <?php } ?>
				  <tr>
                    <td height="25" class="narmal">&nbsp;Maintenance Date</td>
                     
                    <td align="center">:</td>
                    <td class="narmal"><input name="tr_date_of_maintenance"  id="tr_date_of_maintenance" readonly class="plain" size="20" value="<?php
										          if (isset($tr_date_of_maintenance)){ 
														 echo $_POST['tr_date_of_maintenance'];
													}elseif (isset($getmaintenance->tr_date_of_maintenance)){
														
															echo formatDBDateTOCalender($getmaintenance->tr_date_of_maintenance);
													} 
											
											?>"/>
                      <a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.transport_maintenance.tr_date_of_maintenance);return false;" ><img name="popcal" align="absmiddle" src="<?php echo JS_PATH ?>/WeekPicker/calbtn.gif" width="34" height="22" border="0" alt="" /></a>
                       <iframe width=199 height=178 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="<?php echo JS_PATH ?>/WeekPicker/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe></td>
                  </tr>
				  <tr>
                    <td height="25" class="narmal"> &nbsp;Amount Paid </td>
                     
                    <td align="center">:</td>
                    <td class="narmal"><input type="text" name="tr_amount_paid" value="<?php
										          if (isset($tr_amount_paid)){ 
														 echo $_POST['tr_amount_paid'];
													}elseif (isset($getmaintenance->tr_amount_paid)){
														
															echo $getmaintenance->tr_amount_paid;
													} 
											
											?>" />
                         <font color="#FF0000">*</font></td>
                  </tr>
                  <?php  if (isset($error_amount_paid)&&$error_amount_paid!=""){ ?>
                  <tr>
                                        <td height="13"></td>
                                        <td colspan="2" align="left" class="error_message"><?php 
                                   
                                          echo $error_amount_paid;                              
                              ?>                                        </td>
                   </tr>
                   <?php } ?>
				  <tr>
                    <td class="narmal">&nbsp;Remarks</td>
                    <td align="center">:</td>
                    <td class="narmal"><textarea name="tr_remarks" cols="16"><?php
										          if (isset($tr_remarks)){ 
														 echo $_POST['tr_remarks'];
													}elseif (isset($getmaintenance->tr_remarks)){
														
															echo $getmaintenance->tr_remarks;
													} 
											
											?></textarea>
                         <font color="#FF0000">*</font></td>
                  </tr>
                  <?php 
               if (isset($error_remarks)&&$error_remarks!=""){ ?>
                   <tr>
                                        <td height="13"></td>
                                        <td colspan="2" align="left" class="error_message"><?php echo $error_remarks;
                                    
                              ?>                                        </td>
                   </tr>
                   <?php } ?>
				   <script type="text/javascript" >
										function showAvatar()
												{
											
													var ch = document.transport_maintenance.es_paymentmode.value;
													if (ch=='cash'){
														document.getElementById("patiddivdisp").style.display="none";
													}else{
													document.getElementById("patiddivdisp").style.display="block";
													}
												}		  
										</script>
                  <tr>
                    <td height="25" class="narmal">Voucher&nbsp;Type</td>
                    <td align="center">:</td>
                    <td class="narmal"><select name="vocturetypesel" style="width:130px;">
                      <?php 
																$voucherlistarr = voucher_finance();
																krsort($voucherlistarr);
																foreach($voucherlistarr as $eachvoucher) {	?>
                      <option value="<?php echo $eachvoucher['es_voucherid']; ?>" <?php if ($vocturetypesel==$eachvoucher['es_voucherid']){  
					   echo 'selected'; } elseif($eachvoucher['es_voucherid']==9){ echo 'selected';}?> ><?php echo $eachvoucher['voucher_type'];                        ?> ( <?php echo $eachvoucher['voucher_mode']; ?> )</option>
                      <?php } ?>
                    </select></td>
                  </tr>
                  <tr>
                    <td height="25" class="narmal">Ledger&nbsp;Type</td>
                    <td align="center">:</td>
                    <td class="narmal"><select name="es_ledger" style="width:130px;">
                      <?php 
																$ledgerlistarr = ledger_finance();
																foreach($ledgerlistarr as $eachledger) { 
																?>
                      <option value="<?php echo $eachledger['lg_name']; ?>" <?php if($es_ledger==$eachledger['lg_name']) { echo                        'selected'; } elseif($eachledger['lg_name']=='Staff Salary'){echo 'selected';} ?>><?php echo $eachledger['lg_name']; ?> </option>
                      <?php } ?>
                    </select></td>
                  </tr>
                  <tr>
                    <td height="25" class="narmal">Payment&nbsp;Mode</td>
                    <td align="center">:</td>
                    <td class="narmal"><select name="es_paymentmode" onchange="Javascript:showAvatar();" style="width:130px;">
                      <option value="cash" <?php if($es_paymentmode=="cash"){ echo "selected";}?>>Cash</option>
                      <option value="cheque" <?php if($es_paymentmode=="cheque"){ echo "selected";}?>>Cheque</option>
                      <option value="dd" <?php if($es_paymentmode=="dd"){ echo "selected";}?>>DD</option>
                    </select></td>
                  </tr>
				
				  
                  <tr>
                  <td colspan="3" align="left"><div  id="patiddivdisp"  style="display:none;" >
																<table  border="1" cellspacing="0" class="tbl_grid" width="100%" cellpadding="3">
																						
																	<tr>
																		<td align="left" class="bgcolor_02" colspan="3">Bank Details </td>
																	</tr>
																	
																	<tr>
																		<td align="left"   width="22%" class="narmal" >Bank Name </td>
																		<td align="center"  width="4%">:</td>
																		<td align="left"  width="74%"><input type="text" name="es_bank_name" value="<?php echo $es_bank_name;?>" /></td>
																	</tr>
																	<tr>
																		<td align="left"  class="narmal"> Account Number</td>
																		<td align="center">:</td>
																		<td align="left" ><input type="text" name="es_bankacc" value="<?php echo $es_bankacc;?>" /></td>
																	</tr>
																	<tr>
																		<td align="left" class="narmal">Cheque / DD Number </td>
																		<td align="center">:</td>
																		<td align="left"><input type="text" name="es_checkno" value="<?php echo $es_checkno;?>" /></td>
																	</tr>
																	<tr>
																		<td align="left" class="narmal">Teller Number </td>
																		<td align="center">:</td>
																		<td align="left"><input type="text" name="es_teller_number" value="<?php echo $es_teller_number;?>" /></td>
																	</tr>
																	<tr>
																		<td align="left" class="narmal">Pin </td>
																		<td align="center">:</td>
																		<td align="left"><input type="text" name="es_bank_pin" value="<?php echo $es_bank_pin;?>" /></td>
																	</tr>
																</table>	
																</div></td>
                  </tr>
				
				    <script type="text/javascript">showAvatar();</script>
                  <tr>
                    <td height="25" class="narmal">&nbsp;Notes</td>
                    <td align="center">:</td>
                    <td class="narmal"><textarea name="es_narration" rows="3" cols="30"><?php echo $es_narration;?></textarea></td>
                  </tr>              
				  <tr>
                    <td class="narmal">&nbsp;</td>
                    <td colspan="2" align="left"><input type="hidden" name="edit_id" value="<?php echo $edit_id;?>">
					
					<?php if($action=="addnew"){?>
                      <input name="maintenanceSubmit" type="submit" class="bgcolor_02" value="Submit" />
					  <?php }else{?> <input name="maintenanceSubmit" type="submit" class="bgcolor_02" value="Update" /><?php }?>
                    <input  type="reset" class="bgcolor_02" value="Reset" /></td>
                    </tr>
                          
						    
                  </table>
				    </form>
				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
       <?php } ?>
	   
	 <?php  if($action == 'maintenance'){?>
<tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top">&nbsp;</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
			  <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="right" valign="top"><a href="?pid=11&action=addnew" class="bgcolor_02" style="text-decoration:none; padding:3px;" >Add New</a></td>
                <td width="1" class="bgcolor_02"></td>
              </tr>

	 <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top">&nbsp;</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
			  
			   <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="center" valign="top"><table width="100%" border="0" cellpadding="1" cellspacing="1" bordercolor="#CCCCCC">
                       <tr  class="bgcolor_02">
                            <td width="9%" height="23" align="center"><strong>S&nbsp;No</strong></td>
                            <td width="9%" align="center">Registration&nbsp;#</td>   
                            <td width="13%" align="center"><strong>M Type</strong></td>
							<td width="16%" align="center"><strong>M Date</strong></td>
                         <td width="14%" align="center"><strong>Paid</strong></td>
						 <td width="13%" align="center"><strong>Remarks</strong></td>
						    <td width="26%" align="center"><strong>Action</strong></td>
                          </tr>
                        <?php if(count($maintenanceList) > 0 ){ ?>
                       
<?php						
		 $rw = 1;
		$slno = $start+1;
  foreach ($maintenanceList as $eachmaintenance){  
		if($rw%2==0)
			$rowclass = "even";
			else
			$rowclass = "odd";
	$vehicledet = get_vehiclename($eachmaintenance['tr_transportid']);
?>
                         <tr class="<?php echo $rowclass;?>">
						 
						
                            <td align="center"><?php echo $slno;?></td>
                            <td align="center"><?php echo $eachmaintenance['tr_transportid']; ?></td>
                            <td align="center"><?php echo $eachmaintenance['tr_maintenance_type']; ?></td>
							<td align="center"><?php echo displaydate($eachmaintenance['tr_date_of_maintenance']); ?></td>
                            <td align="center"><?php echo $_SESSION['eschools']['currency']."&nbsp;".$eachmaintenance['tr_amount_paid']; ?></td>
							<td align="center"><?php echo $eachmaintenance['tr_remarks']; ?></td>
                            <td align="center"><a title="Edit Maintenance" href="<?php echo buildurl(array('pid'=>11, 'action'=>'edit_maintenance', 'uid'=>$eachmaintenance['es_transport_maintenanceid'],'start'=>$start));?>#editmaintenance"><?php echo editIcon(); ?></a>&nbsp;<a title="View Maintenance" href="<?php  echo buildurl(array('pid'=>11, 'action'=>'view_maintenance', 'uid'=>$eachmaintenance['es_transport_maintenanceid'],'start'=>$start));?>#viewmaintenance" ><?php echo viewIcon(); ?></a>&nbsp;<a title="Delete Maintenance" href="<?php  echo buildurl(array('pid'=>11, 'action'=>'delete_maintenance', 'uid'=>$eachmaintenance['es_transport_maintenanceid'],'start'=>$start));?>#deletemaintenance" onclick="return confirm('<?php echo SM_CONFIRM_DELETE_MESSAGE;?>');"><?php echo deleteIcon(); ?></a>&nbsp;<a title="Go to ledger" href="<?php  echo buildurl(array('pid'=>25, 'action'=>'ledger', 'es_particulars'=>$eachmaintenance['es_ledger'],'ledgersummerysub'=>'Search'));?>#viewvehicles" ><img src="images/ledger_16.png" border="0"  /></a></td>
                          </tr>
                                
                  
				   <?php           $rw++;
                                   $slno++;
								   
								   } ?> 
                   
                          
                                   <tr>
                                        <td colspan="7" align="center"><?php paginateexte($start, $q_limit, $no_rows, "action=".$action."&column_name=".$orderby."&asds_order=".$asds_order) ?>										</td>
                                   </tr>
                                   <tr><td colspan="7" align="right"><input type="button" name="print_maintenance" value="Print" class="bgcolor_02" onclick="newWindowOpen('?pid=11&action=trans_main_print')"></td></tr>
                    <?php } 
                    	
                          else {
					       echo "<tr>";
					       echo "<td align='center' class='narmal' colspan='7' >No records found</td>";
						   echo "</tr>";
					} ?>
					
                    </table></td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
			  
	
	   
	   <?php }?>
	   
	   
	   
	
	   
	   
	   
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
                </tr>
            </table>

 <?php } ?> 
 

 <?php if ($action == 'trans_main_print') { ?>
 	<table width="100%" border="0" cellpadding="1" cellspacing="1" bordercolor="#CCCCCC">
                        
                       <tr >
                            <td colspan="6" align="left" class="narmal"><strong>Note :</strong><ul>
		<li>M TYPE => Maintenance Type</li>
        <li>M DATE => Maintenance Date</li></ul></td>
						  </tr>
                       <tr  class="bgcolor_02">
                            <td width="9%" height="23" align="center">S&nbsp;No</td>
                            <td width="9%" align="center">Vehicle&nbsp;No</td>   
                            <td width="13%" align="center">M&nbsp;Type</td>
							<td width="16%" align="center">M&nbsp;Date</td>
                            <td width="14%" align="center">Paid</td>
							<td width="13%" align="center">Remarks</td>
						  </tr>
                          <?php if(count($maintenanceList) > 0 ){ ?>
<?php						
		 $rw = 1;
		$slno = $start+1;
  foreach ($maintenanceList as $eachmaintenance){  
		if($rw%2==0)
			$rowclass = "even";
			else
			$rowclass = "odd";
	$vehicledet = get_vehiclename($eachmaintenance['tr_transportid']);
?>
                         <tr class="<?php echo $rowclass;?>">
                            <td align="center"><?php echo $slno;?></td>
                            <td align="center"><?php echo $eachmaintenance['tr_transportid']; ?></td>
                            <td align="center"><?php echo $eachmaintenance['tr_maintenance_type']; ?></td>
							<td align="center"><?php echo displaydate($eachmaintenance['tr_date_of_maintenance']); ?></td>
                            <td align="center"><?php echo $_SESSION['eschools']['currency'].$eachmaintenance['tr_amount_paid']; ?></td>
							<td align="center"><?php echo $eachmaintenance['tr_remarks']; ?></td>
                            </tr>
                                
                  
				   <?php           $rw++;
                                   $slno++;
								   
								   } 
                        }?> 
 	

 	
 <?php } ?>
 <?php if($action == 'viewreport' || $action == 'edit_viewreport' || $action=='view_viewreport') {
 ?>	
 <script language="javascript">
function newWindowOpen(href)
{
    window.open(href,null, 'width=900,height=900,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');
	

}
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;View Report</strong></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02" ></td>
                <td align="left" height="4" ></td>
        <td width="1" class="bgcolor_02" ></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02" ></td>
                <td align="left" > <strong>&nbsp;Note :</strong><ul>
		<li>M TYPE => Maintenance Type</li>
        <li>M DATE => Maintenance Date</li>
        <li>T NAME => Transport Name</li>
        <li>T TYPE => Transport Type</li>
        <li>R #    => Registration Number</li>
        </ul></td>
        <td width="1" class="bgcolor_02" ></td>
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
                                          <td width="113" class="admin">&nbsp;</td>
                                          <td width="231"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                                <td width="44%" class="narmal">From:</td>
                                                <td width="35%"><input class="plain" name="dc1" value="<?php if (isset($from)) {
																													echo $from;
																											 }	 ?>" size="12" onfocus="this.blur()" readonly="readonly" /></td>
                                                <td width="21%"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fStartPop(document.transport_search.dc1,document.transport_search.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a></td>
                                              </tr>
                                          </table></td>
                                         
									 
										  <td width="288"><table width="94%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td width="8%"  class="narmal">To:</td>
                                              <td width="10%"><input class="plain" name="dc2" value="<?php if(isset($to)) {
											  																	echo $to;
											  															   }?>" size="12" onfocus="this.blur()" readonly="readonly" /></td>
                                              <td width="82%"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fEndPop(document.transport_search.dc1,document.transport_search.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a></td>
                                            </tr>
                                          </table></td>
										  <td width="495" ><select name="trans_option">
										  				   <option value="">Maintenance</option>
														   <option value="vehicles" <?php if ($trans_option != "") { echo "selected";}?> >Vehicles</option>
														   </select></td>
										  <td width="56"><input type="submit" name="Search" value="Search" class="bgcolor_02" /></td>
                                          <td width="1">&nbsp;</td>
                                        </tr>
                                      </form>
                                  </table>
								  <iframe width=132 height=142 name="gToday:contrast:agenda.js" id="gToday:contrast:agenda.js" src="<?php echo JS_PATH ?>/DateRange/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe> </td>
                                </tr>
                  <tr>
                    <td class="narmal"><table width="100%" border="0" cellspacing="1" cellpadding="0">
                     <?php if(count($transportList) > 0 || count($transList)>0 ){ ?>
					 
					 		<?php if ($trans_option == "") { ?>
					  <tr class="bgcolor_02">
                        <td width="7%" height="20" align="center" ><strong>S NO </strong></td>
                        <td width="14%" align="center" ><strong>R&nbsp;#</strong></td>
                        <td width="18%" align="center" ><strong>T&nbsp;Name</strong></td>
                        <td width="22%" align="center"><strong>M Type</strong></td>
                        <td width="20%" align="center"><strong>M&nbsp;Date</strong></td>
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
										<td align="center"><?php echo displaydate($transport['tr_date_of_maintenance']); ?></td>
										<td align="center"><?php echo $transport['tr_remarks']; ?></td>
									  </tr>
									  <?php 
										 $rw++;
										 $slno++;

				   
				                } ?> 
                   
                          <tr>
                                        <td colspan="8" align="center"><?php paginateexte($start, $q_limit, $no_rows, "action=".$action."&column_name=".$orderby."&asds_order=".$asds_order.$searchUrl) ?></td>
                                      </tr>
                                      <tr><td colspan="10" align="right"><input type="button" name="print_view" value="Print" class="bgcolor_02" onclick="newWindowOpen('?pid=11&action=trans_report_print')"></td></tr>
						  
                                   
                    <?php 
					
						}
						else { ?>
							<tr class="bgcolor_02">
                        <td width="7%" height="20" align="center" ><strong>S&nbsp;NO</strong></td>
                        <td width="14%" align="center" ><strong>T&nbsp;Type</strong></td>
                        <td width="18%" align="center" ><strong>T&nbsp;Name</strong></td>
                        <td width="22%" align="center"><strong>Route</strong></td>
                        <td width="20%" align="center"><strong>R #</strong></td>
                        <td width="19%" align="center"><strong>Ins&nbsp;Renewal&nbsp;Date</strong></td>
                      </tr>
							  <?php						
											$rw = 1;
											$slno = $start+1;
								
								foreach ($transList as $transport)
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
										<td align="center"><?php echo $transport['tr_route']; ?></td>
										<td align="center"><?php echo $transport['tr_vehicle_no'];?></td>
										<td align="center"><?php echo displaydate($transport['tr_ins_renewal_date']); ?></td>
									  </tr>
									  <?php 
										 $rw++;
										 $slno++;

				   
				                } ?> 
                   
                          <tr>
                                        <td colspan="8" align="center"><?php paginateexte($start, $q_limit, $no_rows, "action=".$action."&trans_option=".$trans_option."&column_name=".$orderby."&asds_order=".$asds_order.$searchUrl) ?></td>
                                      </tr>
                                      <tr><td colspan="10" align="right"><input type="button" name="print_view" value="Print" class="bgcolor_02" onclick="newWindowOpen('?pid=11&action=trans_print')"></td></tr>
				<?php 		}
						    } 
                    	
                          else {
					       echo "<tr class='bgcolor_02'>";
					       echo "<td align='center'><strong>No records found</strong></td>";
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

<?php if ( $action == 'trans_report_print') { ?>
<table width="100%" border="0" cellspacing="1" cellpadding="0">
                     <?php if(count($transportList) > 0 ){ ?>
                     <tr>
                
                <td align="left" colspan="6" > <strong>&nbsp;Note :</strong><ul>
		<li>M TYPE => Maintenance Type</li>
        <li>M DATE => Maintenance Date</li>  
        <li>T NAME => Transport Name</li>    
        <li>R #    => Registration Number</li>
        </ul></td>
        
              </tr>
					  <tr class="bgcolor_02">
                        <td width="7%" height="20" align="center" ><strong>S NO </strong></td>
                        <td width="14%" align="center" ><strong>R #</strong></td>
                        <td width="18%" align="center" ><strong>T Name</strong></td>
                        <td width="22%" align="center"><strong>M&nbsp;Type</strong></td>
                        <td width="20%" align="center"><strong>M&nbsp;Date</strong></td>
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
										<td align="center"><?php echo displaydate($transport['tr_date_of_maintenance']); ?></td>
										<td align="center"><?php echo $transport['tr_remarks']; ?></td>
									  </tr>
									  <?php 
										 $rw++;
										 $slno++;

				   
				                }
                     } ?> 
                   </table>

<?php } ?>

<?php if ( $action == 'trans_print') {?>
<table width="100%" border="0" cellspacing="1" cellpadding="0">
<tr>
                
                <td align="left" colspan="6" > <strong>&nbsp;Note :</strong><ul>		
        <li>T NAME => Transport Name</li>
        <li>T TYPE => Transport Type</li>
        <li>R #    => Registration Number</li>
        </ul></td>
        
              </tr>
					 <tr class="bgcolor_02">
                        <td width="4%" height="20" align="center" ><strong>S&nbsp;NO</strong></td>
                        <td width="20%" align="center" ><strong>T&nbsp;Type</strong></td>
                       <td width="19%" align="center" ><strong>T&nbsp;Name</strong></td>
                       <td width="18%" align="center"><strong>Route</strong></td>
                        <td width="20%" align="center"><strong>R&nbsp;#</strong></td>
                       <td width="19%" align="center"><strong>Ins&nbsp;Renewal&nbsp;Date</strong></td>
                      </tr>
							  <?php						
											$rw = 1;
											$slno = $start+1;
								
								foreach ($transList as $transport)
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
										<td align="center"><?php echo $transport['tr_route']; ?></td>
										<td align="center"><?php echo $transport['tr_vehicle_no'];?></td>
										<td align="center"><?php echo displaydate($transport['tr_ins_renewal_date']); ?></td>
									  </tr>
									  <?php 
										 $rw++;
										 $slno++;

				   
				                } ?> 
								</table>


<?php } ?>
<?php if($action=="allotdriver"){?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Allot Driver</strong></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02" ></td>
                <td align="left" height="4" ></td>
        <td width="1" class="bgcolor_02" ></td>
              </tr>
             
             
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top">
			 <form action="" method="post" name="allotdriverd" enctype="multipart/form-data">
				<table width="100%" border="0" cellspacing="3" cellpadding="0">
                 
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
                    <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
            <td class="narmal" align="left" colspan="3">
		</td>
  </tr>
  
  <script type="text/javascript">
/************ Checking Browsers ***********/
		function GetXmlHttpObject(handler)
		{
			var objXmlHttp=null
		
			if (navigator.userAgent.indexOf("Opera")>=0)
			{
				alert("This Site doesn't work in Opera")
				return
			}
			if (navigator.userAgent.indexOf("MSIE")>=0)
			{
				var strName="Msxml2.XMLHTTP"
				if (navigator.appVersion.indexOf("MSIE 5.5")>=0)
				{
					strName="Microsoft.XMLHTTP"
				}
				try
				{
					objXmlHttp=new ActiveXObject(strName)
					objXmlHttp.onreadystatechange=handler
					return objXmlHttp
				}
				catch(e)
				{
					alert("Error. Scripting for ActiveX might be disabled")
					return
				}
			}
			if (navigator.userAgent.indexOf("Mozilla")>=0)
			{
				objXmlHttp=new XMLHttpRequest()
				objXmlHttp.onload=handler
				objXmlHttp.onerror=handler
				return objXmlHttp
			}
		}
		
		function getstaff(st){ 

			url="?pid=55&action=dirveravilable&staff_id="+st
			url=url+"&sid="+Math.random();
			xmlHttpu=GetXmlHttpObject(ajuseravailable);
			xmlHttpu.open("GET", url, true);
			xmlHttpu.send(null);
		}
		function ajuseravailable()
		{
			if (xmlHttpu.readyState==4 || xmlHttpu.readyState=="complete")
			{
	var str = xmlHttpu.responseText;
	String.prototype.trim = function() { return this.replace(/^\s+|\s+$/, ''); };
	str = str.trim();
	if(str == 'nodata'){
					document.getElementById("driver_license").value="";
					document.getElementById("issuing_authority").value="";
					document.getElementById("valid_date").value="";
			document.getElementById("licensety_doc").innerHTML="";
				} else{
					var substras = str.substring(1);
					splitarray = substras.split("###");
					
					document.getElementById("driver_license").value=splitarray[0];
					document.getElementById("issuing_authority").value=splitarray[1];
					document.getElementById("valid_date").value=splitarray[2];
					document.getElementById("licensety_doc").innerHTML=splitarray[3];		
			}}
		}
		</script>
                  <tr>
                    <td width="22%" height="25" class="narmal">Driver Name</td>
                    <td width="4%" align="center">:</td>
                    <td width="74%" class="narmal"><select name="es_staffid" onChange="getstaff(this.value);" style="width:150px;">
                              <option value="">- Select -</option>
							  <?php 
							  if (is_array($nonteach_array) && count($nonteach_array) > 0) { 
							  foreach ($nonteach_array as $eachrecord){ ?>
                            <option <?php if($eachrecord['es_staffid']==$es_staffid){ ?> selected="selected" <?php } ?> value="<?php echo $eachrecord['es_staffid']; ?>"><?php echo  ucwords($eachrecord['st_firstname']." ".$eachrecord['st_lastname'])." "."(".$eachrecord['es_postname'].")"; ?></option>                            
							<?php } }?>							
                          </select><font color="#FF0000">*</font></td>
                 </tr>
                  <tr>
                    <td height="25" class="narmal">&nbsp;Vehicle</td>
                    <td align="center">:</td>
                    <td class="narmal"><?php echo $html_obj->draw_selectfield('es_transportid',$trans_array,'','class="input_field"');?>	
                         <font color="#FF0000">*</font></td>
                    </tr>
				  <tr>
                    <td height="25" class="narmal">Driver License(DL)</td>
                     
                    <td align="center">:</td>
                    <td class="narmal"><?php echo $html_obj->draw_inputfield('driver_license',$driver_license,'','class="input_field"');?>			</td>
                  </tr>
				  <tr>
                    <td height="25" class="narmal"> Issuing Authority </td>
                     
                    <td align="center">:</td>
                    <td class="narmal"><?php echo $html_obj->draw_inputfield('issuing_authority',$issuing_authority,'','class="input_field"');?>
                         <font color="#FF0000">*</font></td>
                  </tr>
                  
                 
             
				  <tr>
                    <td class="narmal">&nbsp;DL Valid Upto</td>
                    <td align="center">:</td>
                    <td class="narmal"><input name="valid_date"  id="valid_date" readonly class="plain" size="20" value="<?php echo $valid_date;
								?>"/>
                     <a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.allotdriverd.valid_date);return false;" ><img name="popcal" align="absmiddle" src="<?php echo JS_PATH ?>/WeekPicker/calbtn.gif" width="34" height="22" border="0" alt=""></a>
                          <iframe width=199 height=178 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="<?php echo JS_PATH ?>/WeekPicker/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe>
                         <font color="#FF0000">*</font></td>
                  </tr>
                <?php if($_POST){?><?php }?>
									
                  <tr>
                    <td height="25" class="narmal">License Document</td>
                    <td align="center">:</td>
                    <td class="narmal"><input type="file" name="license_doc" /><font color="#FF0000">&nbsp;*</font><div id="licensety_doc"></div></td>
                  </tr>
				 <?php if(isset($es_staffid) && $es_staffid!=""){ ?><script type="text/javascript">getstaff('<?php echo $es_staffid; ?>');</script><?php } ?>
				   <tr>
                    <td class="narmal">&nbsp;Allot Date</td>
                    <td align="center">:</td>
                    <td class="narmal"><input name="driver_alloted_date"  id="driver_alloted_date" readonly class="plain" size="20" value="<?php echo $driver_alloted_date;
								?>"/>
                     <a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.allotdriverd.driver_alloted_date);return false;" ><img name="popcal" align="absmiddle" src="<?php echo JS_PATH ?>/WeekPicker/calbtn.gif" width="34" height="22" border="0" alt=""></a>
                          <iframe width=199 height=178 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="<?php echo JS_PATH ?>/WeekPicker/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe>
                         <font color="#FF0000">*</font></td>
                  </tr>
				  
				  
                    <tr>
                    <td class="narmal">&nbsp;</td>
                    <td colspan="2" align="left">
					<?php if($action=="allotdriver"){?>
                      <input name="allotvehicle" type="submit" class="bgcolor_02" value="Submit" />
					  <?php }else{?> <input name="updateallocation" type="submit" class="bgcolor_02" value="Update" /><?php }?>
                    <input  type="reset" class="bgcolor_02" value="Reset" /></td>
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
