<?php 
/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
	
//Start of Visitors Records.
if($action == 'vehicle' || $action == 'edit_vehicle' ||$action=='view_vehicle') {
 ?>
<script language="javascript">
function newWindowOpen(href)
{
    window.open(href,null, 'width=700,height=500,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');
	

}
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02" ><a href="#" class="admin">&nbsp;Visitors Record </a></td>
              </tr>
              <?php 
					if (isset($viewvehicles) && count($viewvehicles)>0 && $action == 'vehicle' ||$action=='view_vehicle') { ?>
      <tr>
			<td class="bgcolor_02" width="1"/>
			<td valign="top" align="left">
					<table width="100%" border="0" cellspacing="3" cellpadding="0">
						<tr>
							<td width="26%" align="right" class="narmal">Visitors Name</td>
							<td width="4%" align="center">:</td>
							<td width="31%"><?php echo $viewvehicles->sec_name;?>
							</td>
							<td width="39%">&nbsp;</td>
						</tr>
						<tr>
							<td width="26%" align="right" class="narmal">Contact Person</td>
							<td width="4%" align="center">:</td>
							<td width="31%"><?php echo $viewvehicles->sec_contact_person;?>
							</td>
							<td width="39%">&nbsp;</td>
						</tr>
						<tr>
							<td width="26%" align="right" class="narmal">Address</td>
							<td width="4%" align="center">:</td>
							<td width="31%"><?php echo $viewvehicles->sec_address;?>
							</td>
							<td width="39%">&nbsp;</td>
						</tr>
						<tr>
							<td width="26%" align="right" class="narmal">Purpose</td>
							<td width="4%" align="center">:</td>
							<td width="31%"><?php echo $viewvehicles->sec_purpose;?>
							</td>
							<td width="39%">&nbsp;</td>
						</tr>
						<tr>
							<td width="26%" align="right" class="narmal">Time in</td>
							<td width="4%" align="center">:</td>
							<td width="31%"><?php echo displayDateAndTime($viewvehicles->sec_time_in);?>
							</td>
							<td width="39%">&nbsp;</td>
						</tr>
						<tr>
							<td width="26%" align="right" class="narmal">Time out</td>
							<td width="4%" align="center">:</td>
							<td width="31%"><?php if($viewvehicles->sec_time_out!='0000-00-00 00:00:00'){echo displayDateAndTime($viewvehicles->sec_time_out);}else{ echo '----';};?>
							</td>
							<td width="39%">&nbsp;</td>
						</tr>
						<tr>
							<td width="26%" align="right" class="narmal">Mode of Appointment</td>
							<td width="4%" align="center">:</td>
							<td width="31%"><?php echo $viewvehicles->sec_mode_app;?>
							</td>
							<td width="39%">&nbsp;</td>
						</tr>
						<tr>
							<td width="26%" align="right" class="narmal">Colour of Vehicle</td>
							<td width="4%" align="center">:</td>
							<td width="31%"><?php echo $viewvehicles->sec_colour;?>
							</td>
							<td width="39%">&nbsp;</td>
						</tr>
						<tr>
							<td width="26%" align="right" class="narmal">Make of Vehicle</td>
							<td width="4%" align="center">:</td>
							<td width="31%"><?php echo $viewvehicles->sec_make_vehicle;?>
							</td>
							<td width="39%">&nbsp;</td>
						</tr>
						<tr>
							<td width="26%" align="right" class="narmal">Registration Number</td>
							<td width="4%" align="center">:</td>
							<td width="31%"><?php echo $viewvehicles->sec_vehicle_no;?>
							</td>
							<td width="39%">&nbsp;</td>
						</tr>
						<tr>
							<td width="26%" align="right" class="narmal">Phone</td>
							<td width="4%" align="center">:</td>
							<td width="31%"><?php echo $viewvehicles->sec_phone;?>
							</td>
							<td width="39%">&nbsp;</td>
						</tr>
						<tr>
							<td width="26%" align="right" class="narmal">Mobile</td>
							<td width="4%" align="center">:</td>
							<td width="31%"><?php echo $viewvehicles->sec_mobile;?>
							</td>
							<td width="39%">&nbsp;</td>
						</tr>
						<tr>
							<td width="26%" align="right" class="narmal">Remarks</td>
							<td width="4%" align="center">:</td>
							<td width="31%"><?php echo $viewvehicles->sec_remarks;?>
							</td>
							<td width="39%">&nbsp;</td>
						</tr>
						<tr>
							<td align="right" height="40" class="narmal">&nbsp;</td>
							<td align="center">&nbsp;</td>
							<td align="left" valign="middle">
							<a href="?pid=26&action=vehicle&start=<?php echo $start; ?>" class="bgcolor_02" style="text-decoration:none; padding:3px">Back</a>
							</td>
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
                <td align="left" valign="top"><?php if (in_array("28_1", $admin_permissions)) {?><table width="100%" border="0" cellspacing="3" cellpadding="0">
                  <form action="" method="post" name="security_vehicle" >
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
                    <td colspan="4">&nbsp;</td>
                    </tr>
                  <tr>
                    <td width="22%" class="narmal">Visitors Name </td>
                    <td class="narmal"><input name="sec_name" type="text" size="12" value="<?php
										          if (isset($sec_name)){ 
														 echo stripslashes($_POST['sec_name']);
													}elseif (isset($getvehicles->sec_name)){
														
															echo htmlentities($getvehicles->sec_name);
													} 

											
											?>" />
                         <font color="#FF0000">*</font></td>
                    <td width="22%" class="narmal"><p>To Meet </p></td>
                    <td width="27%" class="narmal"><input name="sec_contact_person" type="text" size="12" value="<?php
										          if (isset($sec_contact_person)){ 
														 echo stripslashes($_POST['sec_contact_person']);
													}elseif (isset($getvehicles->sec_contact_person)){
														
															echo htmlentities($getvehicles->sec_contact_person);
													} 
											
											?>" />
                         <font color="#FF0000">*</font></td>
                  </tr>
                  <tr>
                    <td width="15%" >&nbsp;</td>
                    <td align="left" class="error_message"><?php if (isset($error_name)&&$error_name!=""){
                                          echo $error_name;
                                    }
                              ?></td>
                    <td >&nbsp;</td>
                    <td align="left" class="error_message"><?php if (isset($error_contact_person)&&$error_contact_person!=""){
                                          echo $error_contact_person;
                                    }
                              ?></td>
				  </tr>
				  <tr>
                    <td class="narmal">Address</td>
                    <td width="29%" class="narmal"><textarea name="sec_address" cols="12"><?php
										          if (isset($sec_address)){ 
														 echo stripslashes($_POST['sec_address']);
													}elseif (isset($getvehicles->sec_address)){
														
															echo htmlentities($getvehicles->sec_address);
													} 
											
											?></textarea>
                         <font color="#FF0000">*</font></td>
                    <td class="narmal">Purpose</td>
                    <td class="narmal"><textarea name="sec_purpose" cols="12"><?php
										          if (isset($sec_purpose)){ 
														 echo stripslashes($_POST['sec_purpose']);
													}elseif (isset($getvehicles->sec_purpose)){
														
															echo htmlentities($getvehicles->sec_purpose);
													} 
											
											?></textarea></td>
                  </tr>
                  <tr>
                    <td width="15%" >&nbsp;</td>
                    <td align="left" class="error_message"><?php if (isset($error_address)&&$error_address!=""){
                                          echo $error_address;
                                    }
                              ?></td>
                    <td >&nbsp;</td>
                    <td >&nbsp;</td>
				  </tr>
				  
				  <tr>
                    <td class="narmal">Time in</td>
                    <td class="narmal"><input class="plain" name="sec_time_in" type="text" size="12" id="sec_time_in" readonly value="<?php
										          if (isset($sec_time_in)){ 
														 echo $_POST['sec_time_in'];
													}elseif (isset($getvehicles->sec_time_in)){
														
															echo formatDBDateTOCalender($getvehicles->sec_time_in,"d/m/Y H:i:s");
													} 
											
											?>"><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.security_vehicle.sec_time_in);return false;" ><img name="popcal" align="absmiddle" src="<?php echo JS_PATH ?>/DateTime/calbtn.gif" width="34" height="22" border="0" alt=""></a>
											<iframe width=188 height=166 name="gToday:datetime:agenda.js:gfPop:plugins_time.js" id="gToday:datetime:agenda.js:gfPop:plugins_time.js" src="<?php echo JS_PATH ?>/DateTime/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe><font color="#FF0000">*</font></td>
                    <td class="narmal">Time out </td>
               
				    <td class="narmal"><input class="plain" name="sec_time_out" type="text" size="12" id="sec_time_out" readonly value="<?php
										          if (isset($sec_time_out)){ 
														 echo $_POST['sec_time_out'];
													}elseif (isset($getvehicles->sec_time_out)){
														
															if ($es_security->sec_time_out != "1970-01-01 00:00:00" && $es_security->sec_time_out != "0000-00-00 00:00:00") { echo formatDBDateTOCalender($getvehicles->sec_time_out,"d/m/Y H:i:s"); }
													} 
											
											?>">
                    <a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.security_vehicle.sec_time_out);return false;" ><img name="popcal" align="absmiddle" src="<?php echo JS_PATH ?>/DateTime/calbtn.gif" width="34" height="22" border="0" alt=""></a></td>
                 
				  </tr>
                  <tr>
                    <td width="15%" >&nbsp;</td>
                    <td align="left" class="error_message"><?php if (isset($error_time_in)&&$error_time_in!=""){
                                          echo $error_time_in;
                                    }
                              ?></td>
                    <td >&nbsp;</td>
                    <td align="left" class="error_message"><?php if (isset($error_time_out)&&$error_time_out!=""){
                                          							 echo $error_time_out;
                                    							 }
															?></td>
				  </tr>
				  <tr>
                    <td class="narmal"><strong class="narmal">Mode&nbsp;of&nbsp;Appointment</strong></td>
                     
                    <td class="narmal"><input name="sec_mode_app" type="text" size="12" value="<?php
										          if (isset($sec_mode_app)){ 
														 echo stripslashes($_POST['sec_mode_app']);
													}elseif (isset($getvehicles->sec_mode_app)){
														
															echo htmlentities($getvehicles->sec_mode_app);
													} 
											
											?>" /></td>
                    <td class="narmal">Remarks</td>
                    <td class="narmal"><input name="sec_remarks" type="text" size="12" value="<?php
										          if (isset($sec_remarks)){ 
														 echo stripslashes($_POST['sec_remarks']);
													}elseif (isset($getvehicles->sec_remarks)){
														
															echo htmlentities($getvehicles->sec_remarks);
													} 
											
											?>" /></td>
                    </tr>
                 <tr>
                    <td width="15%" >&nbsp;</td>
                    <td >&nbsp;</td>
                    <td >&nbsp;</td>
                    <td >&nbsp;</td>
				  </tr>
				  
				  <tr>
                    <td class="narmal">Vehicle&nbsp;Registration </td>
                    <td class="narmal"><input name="sec_vehicle_no" type="text" size="12" value="<?php
										          if (isset($sec_vehicle_no)){ 
														 echo stripslashes($_POST['sec_vehicle_no']);
													}elseif (isset($getvehicles->sec_vehicle_no)){
														
															echo htmlentities($getvehicles->sec_vehicle_no);
													} 
											
											?>" /></td>
                    <td class="narmal">Make&nbsp;of&nbsp;Vehicle</td>
                    <td class="narmal"><input name="sec_make_vehicle" type="text" size="12" value="<?php
										          if (isset($sec_make_vehicle)){ 
														 echo stripslashes($_POST['sec_make_vehicle']);
													}elseif (isset($getvehicles->sec_make_vehicle)){
														
															echo htmlentities($getvehicles->sec_make_vehicle);
													} 
											
											?>" /></td>
                  </tr>
				 
				 <tr>
                    <td width="15%" >&nbsp;</td>
                    <td align="left" class="error_message"><?php if (isset($error_vehicle_no)&&$error_vehicle_no!=""){
                                          echo $error_vehicle_no;
                                    }
                              ?></td>
                    <td >&nbsp;</td>
                    <td >&nbsp;</td>
				  </tr>
				  <tr>
                    <td class="narmal">Vehicle Color</td>
                    <td class="narmal"><input name="sec_colour" type="text" size="12" value="<?php
										          if (isset($sec_colour)){ 
														 echo stripslashes($_POST['sec_colour']);
													}elseif (isset($getvehicles->sec_colour)){
														
															echo htmlentities($getvehicles->sec_colour);
													} 
											
											?>" />
                     </td>
					  <td >Phone Number</td>
                    <td ><input name="sec_phone" type="text" size="12" value="<?php
										          if (isset($sec_phone) && $sec_phone!=''){ 
														 echo stripslashes($_POST['phone']);
													}elseif (isset($getvehicles->sec_phone)){
														
															echo htmlentities($getvehicles->sec_phone);
													} 
											
											?>" /> <font color="#FF0000">*</font></td>
                 </tr>
				 
				  <tr>
                    <td width="15%" >&nbsp;</td>
                    <td align="left" class="error_message"><?php if (isset($error_phone_no)&&$error_phone_no!=""){
                                          echo $error_phone_no;
                                    }
                              ?></td>
                    <td >&nbsp;</td>
                    <td >&nbsp;</td>
				  </tr>
				 <tr>
                    <td class="narmal">Mobile</td>
                    <td class="narmal"><input name="sec_mobile" type="text" size="12" value="<?php
										          if (isset($sec_mobile)){ 
														 echo stripslashes($_POST['sec_mobile']);
													}elseif (isset($getvehicles->sec_mobile)){
														
															echo htmlentities($getvehicles->sec_mobile);
													} ?>" />
                     </td>
					  <td ></td>
                    <td ></td>
                 </tr>
				  <tr>
                    <td colspan="4" class="narmal">&nbsp;</td>
                    </tr>
                  <tr>
                    <td colspan="4" align="center" valign="middle" class="narmal"><input type="hidden" name="edit_id" value="<?php echo $getvehicles->es_securityId;?>"><input name="vehicleSubmit" type="submit" class="bgcolor_02" value="Submit" style="cursor:pointer" />
                      &nbsp;
                      <input  type="reset" class="bgcolor_02" value="Reset" style="cursor:pointer" /></td>
                    </tr>
                  <tr>
                       <td colspan="4" align="center" valign="middle" class="narmal">&nbsp;</td>
                  </tr>
                  <tr>
                       <td colspan="4" align="center" valign="middle" class="narmal">&nbsp;</td>
                  </tr>
               </form>
			    </table><?php }?>
                  <table width="100%" border="0" cellspacing="1" cellpadding="1">
                    <tr class="bgcolor_02">
                      <td width="3%" height="25" align="center" ><strong>S.No</strong></td>
                      <td width="8%" align="center"> <strong>Visitors&nbsp;Name</strong></td>
                      <td width="9%" align="center"><strong>Contact&nbsp;Person </strong></td>
                      <td width="6%" align="center"><strong>Reg&nbsp;No </strong></td>
                      <td width="15%" align="center"><strong>Time&nbsp;in</strong></td>
                      <td width="14%" align="center"><strong>Time&nbsp;out </strong></td>
					  <td width="12%" align="center"><strong>Phone&nbsp;Number</strong></td>
                      <td width="16%" align="center"><strong>Remarks</strong></td>
                      <td width="17%" align="center"><strong>Action</strong></td>
                    </tr>
                    <?php	
						if(is_array($vehicleList) && count($vehicleList) > 0 ){					
							$rw = 1;
							$slno = $start+1;
							foreach ($vehicleList as $es_security)
							{  
									if($rw%2==0)
										$rowclass = "even";
										else
										$rowclass = "odd";
                            ?>
					<tr class="<?php echo $rowclass;?>">
                      <td align="center"><?php echo $slno;?></td>
                      <td align="center"><?php echo $es_security->sec_name; ?></td>
                      <td align="center"><?php echo $es_security->sec_contact_person; ?></td>
					  <td align="center"><?php echo $es_security->sec_vehicle_no; ?></td>
                      <td align="center"><?php echo displayDateAndTime($es_security->sec_time_in); ?></td>
                      <td align="center"><?php if ($es_security->sec_time_out != "0000-00-00 00:00:00" ) { echo displayDateAndTime($es_security->sec_time_out);  }else{ echo '---';}?></td>  <td align="center"><?php echo $es_security->sec_phone; ?></td>
                      <td align="center"><?php echo $es_security->sec_remarks; ?></td>
                      <td align="center">
					  
					  <?php if (in_array("28_2", $admin_permissions)) {?><a title="Edit vehicles" href="<?php echo buildurl(array('pid'=>26, 'action'=>'edit_vehicle', 'uid'=>$es_security->es_securityId,'start'=>$start));?>#editvehicles"><?php echo editIcon(); ?></a><?php }else{ echo "-"; }?>&nbsp;<?php if (in_array("28_3", $admin_permissions)) {?><a title="Delete vehicles" href="<?php  echo buildurl(array('pid'=>26, 'action'=>'delete_vehicle', 'uid'=>$es_security->es_securityId,'start'=>$start));?>#deletevehicles" onclick="return confirm('<?php echo SM_CONFIRM_DELETE_MESSAGE;?>');"><?php echo deleteIcon(); ?></a><?php }else{ echo "-"; }?>&nbsp;
                                  <?php if (in_array("28_4", $admin_permissions)) {?><a title="View vehicles" href="<?php  echo buildurl(array('pid'=>26, 'action'=>'view_vehicle', 'uid'=>$es_security->es_securityId,'start'=>$start));?>#viewvehicles" ><?php echo viewIcon(); ?></a><?php }else{ echo "-"; }?>&nbsp;<?php if (in_array("28_5", $admin_permissions)) {?><a href="javascript: void(0)" onclick="newWindowOpen('?pid=26&action=securitySlip&es_securityid=<?php echo $es_security->es_securityId; ?>')" title=" "><img src="images/print_16.png" border="0" /></a><?php }else{ echo "-"; }?></td>
                          
                    </tr>
						   <?php           $rw++;
                                   $slno++;
								   
								   } ?> 
                   
                          
                                   <tr>
                                        <td colspan="9" align="center"><?php paginateexte($start, $q_limit, $no_rows, "action=".$action."&column_name=".$orderby."&asds_order=".$asds_order) ?>
										
										</td>
                                   </tr>
                    <?php } 
                    	
                          else {
					       echo "<tr>";
					       echo "<td colspan='9' height='30' align='center' valign='middle' class='narmal'>No records found</td>";
						   echo "</tr>";
					} 
               ?>
                    
               
				  </table>
				  <?php } ?>
				  
				  </td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
                </tr> 
				
				 <tr>
                <td height="1" colspan="3">&nbsp;</td>
                </tr>
				
				<tr>
                <td height="1" colspan="3" align="right" valign="middle" ><?php
				if(count($vehicleList) > 0 ){
				 if (in_array("28_5", $admin_permissions)) {?><?php if($action!='view_vehicle'){?><a href="javascript: void(0)" onclick="newWindowOpen('?pid=26&action=allsecurity&start=<?php echo $start;?>')" class="bgcolor_02" style="padding:3px; text-decoration:none;">Print</a><?php }}?><?php }?></td>
                </tr>
				
				
            </table>
			
	 <?php } ?>		
			
<?php if($action == 'securitySlip') {

?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
             <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="style5">&nbsp;&nbsp;<strong>Security Gate Pass</strong></td>
              </tr>
              <tr>
                <td width="1" ></td>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="3" cellpadding="0">
                  <tr>
                    <td colspan="4">&nbsp;</td>
                    </tr>
                
	 <tr>
                    <td width="23%" class="admin">Visitor Name </td>
                    <td width="22%" class="narmal">: <?php echo $eachslip['sec_name']; ?></td>
                    <td width="23%" class="admin">Make&nbsp;of&nbsp;Vehicle</td>
                    <td width="30%" class="narmal">: <?php echo $eachslip['sec_make_vehicle']; ?></td>
                  </tr>
                  <tr>
                   <td width="25%" class="admin"><p>Contact Person</p></td>
                    <td width="30%" class="narmal">: <?php echo $eachslip['sec_contact_person']; ?></td>
                    <td  width="25%"  class="admin">Mode&nbsp;of&nbsp;Appointment</td>
                    <td width="30%" class="narmal">: <?php echo $eachslip['sec_mode_app']; ?></td>
				</tr>
                  <tr>
                    <td width="23%" class="admin">Purpose</td>
                    <td width="30%"class="narmal">: <?php echo $eachslip['sec_purpose']; ?></td>
                    <td  width="25%"  class="admin">Colour&nbsp;of&nbsp;Vehicle</td>
                    <td width="30%" class="narmal">: <?php echo $eachslip['sec_colour']; ?></td>
				  </tr>
                  <tr>
				    <td width="23%" class="admin">Address</td>
                    <td width="30%"class="narmal">: <?php echo $eachslip['sec_address']; ?></td>
					<td  width="25%"  class="admin">Registration&nbsp;Number</td>
				    <td width="30%" class="narmal">: <?php echo $eachslip['sec_vehicle_no']; ?></td>
			      </tr>
				   <tr>
                    <td width="23%" class="admin">Time&nbsp;in</td>
                    <td width="30%"class="narmal">: <?php echo displayDateAndTime($eachslip['sec_time_in']); ?></td>
                     <td width="23%" class="admin">Time&nbsp;out</td>
                    <td width="30%"class="narmal">: <?php if($eachslip['sec_time_out']!="" &&  $eachslip['sec_time_out']!="0000-00-00 00:00:00"){echo displayDateAndTime($eachslip['sec_time_out']); }else{echo "---";}?></td>
                  </tr>
				   <tr>
                    <td width="23%" class="admin">Phone</td>
                    <td width="30%"class="narmal">: <?php echo $eachslip['sec_phone']; ?></td>
                     <td width="23%" class="admin">Mobile</td>
                    <td width="30%"class="narmal">: <?php echo $eachslip['sec_mobile']; ?></td>
                  </tr>
				  
				  
				   <tr>
                    <td width="23%" class="admin">Remarks</td>
                    <td width="30%"class="narmal">: <?php echo $eachslip['sec_remarks']; ?></td>
                     <td width="23%" class="admin"></td>
                    <td width="30%"class="narmal"> </td>
                  </tr>
				  <tr><td>&nbsp;</td></tr>
                 
                </table>
                </td>
                <td width="1"></td>
              </tr>
              
              <tr>
                <td height="1" colspan="3" ></td>
                </tr>
            </table>
<?php } ?>	


<?php if($action == 'allsecurity') {
if (!isset($start) ){
			$start = 0;
		}
	  
	$no_rows = count($es_security->GetList(array(array("es_securityid", ">", 0),array("status", "=", "active"),array("sec_vehicle_no", "!=", "novehicle")) ));
	
		$orderby_array = array('orb1'=>'es_securityid', 'orb2'=>'tr_transport_type', 'orb3'=>'in_short_name');
		
		if (isset($column_name)&& array_key_exists($column_name, $orderby_array)) {
			$orderby = $orderby_array[$column_name];
		}else{
			$orderby = "es_securityid";
			
			$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_security','SECURITY','VISITOR RECORDS ','".$es_securityid."','PRINT VISITOR RECORDS','".$_SERVER['REMOTE_ADDR']."',NOW())";
$log_insert_exe=mysql_query($log_insert_sql);
  

		}
		if (isset($asds_order) && $asds_order=='ASC'){
			$order = true;
		}else{
			$order = false;
		}
		$q_limit = 15;
	
	$vehicleList = $es_security->GetList(array(array("status", "=", "active"),array("es_securityid", ">", "0"),array("sec_vehicle_no", "!=", "novehicle")), $orderby, $order,  "$start , $q_limit" );
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
             <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="style5">&nbsp;&nbsp;<strong>Security</strong></td>
              </tr>
              <tr>
                <td width="1" ></td>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="1">
                    <tr class="bgcolor_02">
                      <td width="3%" height="25" align="center" ><strong>S.No</strong></td>
                      <td width="8%" align="center"> <strong>Visitors&nbsp;Name</strong></td>
                      <td width="9%" align="center"><strong>Contact&nbsp;Person </strong></td>
                      <td width="6%" align="center"><strong>Reg&nbsp;No </strong></td>
                      <td width="18%" align="center"><strong>Time&nbsp;in</strong></td>
                      <td width="17%" align="center"><strong>Time&nbsp;out </strong></td>
					  <td width="8%" align="center"><strong>Phone&nbsp;Number</strong></td>
                      <td width="14%" align="center"><strong>Remarks</strong></td>
   
                    </tr>
                    <?php	
						if(is_array($vehicleList) && count($vehicleList) > 0 ){					
							$rw = 1;
							$slno = $start+1;
							foreach ($vehicleList as $es_security)
							{  
									if($rw%2==0)
										$rowclass = "even";
										else
										$rowclass = "odd";
                            ?>
					<tr class="<?php echo $rowclass;?>">
                      <td align="center"><?php echo $slno;?></td>
                      <td align="center"><?php echo $es_security->sec_name; ?></td>
                      <td align="center"><?php echo $es_security->sec_contact_person; ?></td>
					  <td align="center"><?php echo $es_security->sec_vehicle_no; ?></td>
                      <td align="center"><?php echo displayDateAndTime($es_security->sec_time_in); ?></td>
                      <td align="center"><?php if ($es_security->sec_time_out != "0000-00-00 00:00:00" ) { echo displayDateAndTime($es_security->sec_time_out);  }?></td>  
					  <td align="center"><?php echo $es_security->sec_phone; ?></td>
                      <td align="center"><?php echo $es_security->sec_remarks; ?></td>
                      
                          
                    </tr>
						   <?php           $rw++;
                                   $slno++;
								   
								   } ?> 
                   
                          
                                  
                    <?php } 
                    	
                          else {
					       echo "<tr>";
					       echo "<td colspan='9' height='30' align='center' valign='middle' class='narmal'>No records found</td>";
						   echo "</tr>";
					} 
               ?>
                    
               
				  </table>
                 </td>
                <td width="1"></td>
              </tr>
			  
              
             
            </table>
<?php } ?>



<?php 

//Start of View Report
if($action == 'report') {
 ?>			
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>View Report</strong></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="center" valign="middle" height="50">
                                  <table width="90%" cellpadding="0" cellspacing="0" border="0">
                                      <form action="" method="post" name="transport_search" id="transport_search" >
                                        <tr>
                                          <td width="136" class="admin">Time In </td>
                                          <td width="249"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                             <td width="44%" class="narmal">From:</td>
                                                <td width="35%"><input class="plain" name="dc1" value="<?php if (isset($from) && $from!= "") {
																											  	  echo func_date_conversion("Y-m-d","d/m/Y",$from);
																											  }?>" size="12" onfocus="this.blur()" readonly="readonly" /></td>
                                                <td width="21%"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fStartPop(document.transport_search.dc1,document.transport_search.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a></td>
                                              </tr>
                                          </table></td>
                                         
									 
										  <td width="782"><table width="94%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td width="20%"  class="narmal">To:</td>
                                              <td width="10%"><input class="plain" name="dc2" value="<?php if (isset($to) && $to!="") {
											  																   echo func_date_conversion("Y-m-d","d/m/Y",$to);
																											}
											  														 ?>" size="12" onfocus="this.blur()" readonly="readonly" /></td>
                                              <td width="70%"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fEndPop(document.transport_search.dc1,document.transport_search.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a></td>
                                            </tr>
                                          </table></td>
										  <td width="25">&nbsp;</td>
                                      
                                          <td><input type="submit" name="Search2" value="Search" class="bgcolor_02" style="cursor:pointer" /></td>
                                          <td>&nbsp;</td>
                                        </tr>
                                      </form>
                                  </table>
								  <iframe width=132 height=142 name="gToday:contrast:agenda.js" id="gToday:contrast:agenda.js" src="<?php echo JS_PATH ?>/DateRange/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe> 
				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="middle" height="50">
                 <table width="100%" border="0" cellspacing="1" cellpadding="1">
                    <tr class="bgcolor_02">
                      <td width="6%" height="25" align="center" ><strong>S.No</strong></td>
                      <td width="13%" align="center"> <strong>Visitor Name</strong></td>
                      <td width="13%" align="center"><strong>Contact Person </strong></td>
                      <td width="18%" align="center"><strong>Reg&nbsp;No</strong></td>
                      <td width="21%" align="center"><strong>Time in</strong></td>
                     <td width="14%" align="center"><strong>Time out </strong></td>
					 
					    <td width="14%" align="center"><strong>Phone Number</strong></td>
					
                      <td width="15%" align="center"><strong>Remarks</strong></td>
                     
                    </tr>
						<?php 
							if(count($vehicleList) > 0 ){			
                            $rw = 1;
                            $slno = $start+1;
                              foreach ($vehicleList as $es_security)
                                 {  
									if($rw%2==0)
										$rowclass = "even";
										else
										$rowclass = "odd";
                            ?>
					<tr class="<?php echo $rowclass;?>">
                      <td align="center"><?php echo $slno;?></td>
                      <td align="center"><?php echo $es_security['sec_name']; ?></td>
                      <td align="center"><?php echo $es_security['sec_contact_person']; ?></td>
					  <td align="center"><?php echo $es_security['sec_vehicle_no']; ?></td>
                      <td align="center"><?php 
					  							if (isset($es_security['sec_time_in']) && $es_security['sec_time_in']!="1970-01-01 00:00:00" ) {
													echo displayDateAndTime($es_security['sec_time_in']);
													
												} ?></td>
                      <td align="center"><?php 
					  							if (isset($es_security['sec_time_out']) && $es_security['sec_time_out']!="0000-00-00 00:00:00") { 
													
													echo displayDateAndTime($es_security['sec_time_out']);
													
												} ?></td>
                 <td align="center"><?php echo $es_security['sec_phone']; ?></td>
				 
				      <td align="center"><?php echo $es_security['sec_remarks']; ?></td>
                      
                          
                    </tr>
						   <?php           $rw++;
                                   $slno++;
								   
								   } ?> 
                   
                          
                                   <tr>
                                        <td colspan="7" align="center"><?php paginateexte($start, $q_limit, $no_rows, "action=".$action."&column_name=".$orderby."&asds_order=".$asds_order.$PageUrl) ?>
										
										</td>
                                   </tr>
                    <?php } 
                    	
                          else {
					       echo "<tr>";
					       echo "<td colspan='8' align='center' height='50' class='narmal' valign='middle'>No records found</td>";
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
			
	 <?php } ?>						