<script type="text/javascript">
function popup_letter(url) {
		 var width  = 700;
		 var height = 500;
		 var left   = (screen.width  - width)/2;
		 var top    = (screen.height - height)/2;
		 var params = 'width='+width+', height='+height;
		 params += ', top='+top+', left='+left;
		 params += ', directories=no';
		 params += ', location=no';
		 params += ', menubar=no';
		 params += ', resizable=no';
		 params += ', scrollbars=yes';
		 params += ', status=no';
		 params += ', toolbar=no';
		 newwin=window.open(url,'windowname5', params);
		 if (window.focus) {
			 newwin.focus()
		 }
	 return false;
}

</script>
<?php
if($action=="viewtransportbill"){
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="3" colspan="3"></td>
</tr>
<tr>
<td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;View Transport Bills</strong></td>
</tr>
<tr>
<td width="1" class="bgcolor_02" ></td>
<td align="left" height="4" ></td>
<td width="1" class="bgcolor_02" ></td>
</tr>
<tr>
<td width="1" class="bgcolor_02"></td>
<td align="left" valign="top">		
				<form action="" method="post" name="preparetransportbill_form" >
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
				<td width="18%" align="left" class="narmal">Group</td>
					<td width="48%" align="left"  class="narmal">
                    <select name="selgroup" onchange="JavaScript:document.preparetransportbill_form.submit();">
                    <option value="">Select Group</option>
                    <?php
					$group_sql="select * from es_groups";
					$group_exe=mysql_query($group_sql);
					while($group_row=mysql_fetch_array($group_exe)){
					?>
					  <option <?php if($selgroup==$group_row['es_groupsid']) { echo "selected='selected'"; } ?> value="<?php echo $group_row['es_groupsid']; ?>"><?php echo $group_row['es_groupname']; ?></option>
					<?php }?>
					  </select></td>
					<td width="7%" align="left">&nbsp;</td>
					<td colspan="2" align="left">&nbsp;</td>
					<td width="1%">&nbsp;</td>
					<td width="2%">&nbsp;</td>
				  </tr>
                    <tr>
				<td width="18%" align="left" class="narmal">Class</td>
					<td width="48%" align="left"  class="narmal">
                    <select name="selclass">
					  <option value="">Select Class</option>
                      <?php
					  if($selgroup!=""){
					  $class_sql="select * from es_classes WHERE es_groupid=".$selgroup;
					  $class_exe=mysql_query($class_sql);
					  while($class_row=mysql_fetch_array($class_exe)){
					  ?>
					  <option <?php if($selclass==$class_row['es_classesid']) { echo "selected='selected'"; } ?> value="<?php echo $class_row['es_classesid']; ?>"><?php echo $class_row['es_classname']; ?></option>
					  <?php }}?>
					  </select></td>
					<td width="7%" align="left">&nbsp;</td>
					<td colspan="2" align="left">&nbsp;</td>
					<td width="1%">&nbsp;</td>
					<td width="2%">&nbsp;</td>
				  </tr>
					<tr>
				<td width="18%" align="left" class="narmal">Select Year </td>
					<td width="48%" align="left"  class="narmal"><select name="selyear">
                      <option value="">-Year-</option>
					  <option <?php if($selyear==2006) { echo "selected='selected'"; } ?> value="2006">2006</option>
					  <option <?php if($selyear==2007) { echo "selected='selected'"; } ?> value="2007">2007</option>
					  <option <?php if($selyear==2008) { echo "selected='selected'"; } ?> value="2008">2008</option>
					  <option <?php if($selyear==2009) { echo "selected='selected'"; } ?> value="2009">2009</option>
					  <option <?php if($selyear==2010) { echo "selected='selected'"; } ?> value="2010">2010</option>
					  <option <?php if($selyear==2011) { echo "selected='selected'"; } ?> value="2011">2011</option>
					  <option <?php if($selyear==2012) { echo "selected='selected'"; } ?> value="2012">2012</option>
					  <option <?php if($selyear==2013) { echo "selected='selected'"; } ?> value="2013">2013</option>
					  <option <?php if($selyear==2014) { echo "selected='selected'"; } ?> value="2014">2014</option>
					  <option <?php if($selyear==2015) { echo "selected='selected'"; } ?> value="2015">2015</option>
					  <option <?php if($selyear==2016) { echo "selected='selected'"; } ?> value="2016">2016</option>
					  <option <?php if($selyear==2017) { echo "selected='selected'"; } ?> value="2017">2017</option>
					  <option <?php if($selyear==2018) { echo "selected='selected'"; } ?> value="2018">2018</option>
                      <option <?php if($selyear==2019) { echo "selected='selected'"; } ?> value="2019">2019</option>
                      <option <?php if($selyear==2020) { echo "selected='selected'"; } ?> value="2020">2020</option>
                      <option <?php if($selyear==2021) { echo "selected='selected'"; } ?> value="2021">2021</option>
                      <option <?php if($selyear==2022) { echo "selected='selected'"; } ?> value="2022">2022</option>
                      <option <?php if($selyear==2023) { echo "selected='selected'"; } ?> value="2023">2023</option>
                      <option <?php if($selyear==2024) { echo "selected='selected'"; } ?> value="2024">2024</option>
                      <option <?php if($selyear==2025) { echo "selected='selected'"; } ?> value="2025">2025</option>
                      <option <?php if($selyear==2026) { echo "selected='selected'"; } ?> value="2018">2018</option>
                      <option <?php if($selyear==2027) { echo "selected='selected'"; } ?> value="2027">2027</option>
                      <option <?php if($selyear==2028) { echo "selected='selected'"; } ?> value="2028">2028</option>
                      <option <?php if($selyear==2029) { echo "selected='selected'"; } ?> value="2029">2029</option>
                      <option <?php if($selyear==2030) { echo "selected='selected'"; } ?> value="2030">2030</option>
                      <option <?php if($selyear==2031) { echo "selected='selected'"; } ?> value="2031">2031</option>
                      <option <?php if($selyear==2032) { echo "selected='selected'"; } ?> value="2032">2032</option>
                      <option <?php if($selyear==2033) { echo "selected='selected'"; } ?> value="2033">2033</option>
                      <option <?php if($selyear==2034) { echo "selected='selected'"; } ?> value="2034">2034</option>
                      <option <?php if($selyear==2035) { echo "selected='selected'"; } ?> value="2035">2035</option>
                      <option <?php if($selyear==2036) { echo "selected='selected'"; } ?> value="2036">2036</option>
                      <option <?php if($selyear==2037) { echo "selected='selected'"; } ?> value="2037">2037</option>                      
                      <option <?php if($selyear==2038) { echo "selected='selected'"; } ?> value="2038">2038</option>
                      <option <?php if($selyear==2039) { echo "selected='selected'"; } ?> value="2039">2039</option>
                      <option <?php if($selyear==2040) { echo "selected='selected'"; } ?> value="2040">2040</option>
                      <option <?php if($selyear==2041) { echo "selected='selected'"; } ?> value="2041">2041</option>
                      <option <?php if($selyear==2042) { echo "selected='selected'"; } ?> value="2042">2042</option>
                      <option <?php if($selyear==2043) { echo "selected='selected'"; } ?> value="2043">2043</option>
                      <option <?php if($selyear==2044) { echo "selected='selected'"; } ?> value="2044">2044</option>
                      <option <?php if($selyear==2045) { echo "selected='selected'"; } ?> value="2045">2045</option>
                      <option <?php if($selyear==2046) { echo "selected='selected'"; } ?> value="2046">2046</option>
                      <option <?php if($selyear==2047) { echo "selected='selected'"; } ?> value="2047">2047</option>
                      <option <?php if($selyear==2048) { echo "selected='selected'"; } ?> value="2048">2048</option>
                      <option <?php if($selyear==2049) { echo "selected='selected'"; } ?> value="2049">2049</option>
                      <option <?php if($selyear==2050) { echo "selected='selected'"; } ?> value="2050">2050</option>
                      
					  </select></td>
					<td width="7%" align="left">&nbsp;</td>
					<td colspan="2" align="left">&nbsp;</td>
					<td width="1%">&nbsp;</td>
					<td width="2%">&nbsp;</td>
				  </tr>
				  <tr>
					<td align="left" class="narmal">Select Month</td>
					<td align="left"><span class="narmal">
					  <select name="selmonth" >
                        <option value="">-Month-</option>
					    <option <?php if($selmonth=='01') { echo "selected='selected'"; } ?> value="01">January</option>
					    <option <?php if($selmonth=='02') { echo "selected='selected'"; } ?> value="02">Febuary</option>
					    <option <?php if($selmonth=='03') { echo "selected='selected'"; } ?> value="03">March</option>
					    <option <?php if($selmonth=='04') { echo "selected='selected'"; } ?> value="04">April</option>
					    <option <?php if($selmonth=='05') { echo "selected='selected'"; } ?> value="05">May</option>
					    <option <?php if($selmonth=='06') { echo "selected='selected'"; } ?> value="06">June</option>
					    <option <?php if($selmonth=='07') { echo "selected='selected'"; } ?> value="07">July</option>
					    <option <?php if($selmonth=='08') { echo "selected='selected'"; } ?> value="08">August</option>
					    <option <?php if($selmonth=='09') { echo "selected='selected'"; } ?> value="09">September</option>
					    <option <?php if($selmonth=='10') { echo "selected='selected'"; } ?> value="10">October</option>
					    <option <?php if($selmonth=='11') { echo "selected='selected'"; } ?> value="11">November</option>
					    <option <?php if($selmonth=='12') { echo "selected='selected'"; } ?> value="12">December</option>
				    </select>
					</span></td>
					<td align="left"><span class="narmal"> </span></td>
					<td colspan="2" align="left">      </td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
                  <?php /*?><tr>
					<td align="left" class="narmal">Payment Status</td>
					<td align="left"><span class="narmal">
					  <select name="payment_status" >
					    <option value="">-Select-</option>
					    <option <?php if($payment_status=='Paid') { echo "selected='selected'"; } ?> value="Paid">Paid</option>
					    <option <?php if($payment_status=='Unpaid') { echo "selected='selected'"; } ?> value="Unpaid">Unpaid</option>					    
				    </select>
					</span></td>
					<td align="left"><span class="narmal"> </span></td>
					<td colspan="2" align="left">      </td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr><?php */?>
                  <tr>
					<td align="left" class="narmal">Registration No.</td>
					<td align="left"><span class="narmal"><input type="text" name="registration_no" value="<?php echo $registration_no; ?>" />
					</span></td>
					<td align="left"><span class="narmal"> </span></td>
					<td colspan="2" align="left">      </td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td align="left" class="narmal">&nbsp;</td>
					<td align="left" class="narmal">					
					  <input name="viewbill" type="submit" class="bgcolor_02" value="Search" />
                      <?php if (in_array("14_14", $admin_permissions)) {?><input name="exportbill" type="submit" class="bgcolor_02" value="Export List" /><?php }?>				
					</td>
					<td align="left">&nbsp;</td>
					<td colspan="2" align="left">&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>		 
				  </table>
				</form>
                
                <table width="100%" cellpadding="0" cellspacing="0">
                <tr class="bgcolor_02" height="25">
                   <td width="3%" align="left">S.NO</td>
				   <td width="5%" align="left">Reg No.</td>
				     <!--<td width="5%" align="left">Roll No.</td>-->
                   <td width="6%" align="left">Student</td>
				   <td width="6%" align="left">Class</td>
				   <td width="14%" align="left">Father Name</td>
                   <td width="13%" align="center">Month</td>
                   <td width="10%" align="right">Bill Amount</td>
                   <td width="10%" align="right">Waived</td>
                   <td width="10%" align="right">Paid Amount</td>
                   <td width="18%" align="center">Action</td>
                </tr>
                <?php
                $i=1;
                
					$rw = 1;
					$slno = $start+1;
					$total_room_rate = 0;
					$total_deduction = 0;
					$total_amount_paid =0;
					if(count($student_row)>0){
					foreach($student_row as $student)					
						 {  
							if($rw%2==0)
								$rowclass = "even";
								else
								$rowclass = "odd";
                ?>
                <tr class="<?php echo $rowclass;?>" height="25">
                   <td align="left"><?php echo $slno; ?></td>
				   <td align="left"><?php echo $student['es_preadmissionid']; ?></td>
				      <!--<td align="left"><?php 
											 //$online_sql="select * from es_sections_student where student_id=".$student['es_preadmissionid'];
 //$online_row=$db->getRow($online_sql);
											
											//if($online_row['roll_no']!=''){ echo ucwords($online_row['roll_no']);} else { echo "---";}?></td>-->
                   <td align="left"><?php if($student['status']!='inactive') { echo $student['pre_name'];} else {?><span style="color:#FF0000"><?php echo $student['pre_name'];} ?></span></td>
				   <td align="left"><?php echo classname($student['pre_class']); ?></td>
				   <td align="left"><?php echo $student['pre_fathername']; ?></td>
                   <td align="center"><?php echo func_date_conversion('Y-m-d', 'd/m/Y', $student['due_month']); ?></td>
                   <td align="right"><?php echo number_format($student['pay_amount'], 2, '.', ''); ?></td>
                   <td align="right"><?php echo number_format($student['deduction'], 2, '.', ''); ?></td>
                   <td align="right"><?php echo number_format($student['amount_paid'], 2, '.', ''); ?></td>
                   <td align="center">
                   <?php
				   if($student['pay_status']=="paid"){?><a href="javascript: void(0)" onclick="popup_letter('?pid=84&action=receipt&chgid=<?php echo $student['id']; ?>&start=<?php echo $start.$PageUrl;?>')" ><img src="images/print_16.png" border="0" title="Print Recipt" alt="Print Recipt" /></a>&nbsp;&nbsp;
				   
				   <a href="javascript: void(0)" onclick="popup_letter('?pid=84&action=receiptpayment&chgid=<?php echo $student['id']; ?>&start=<?php echo $start.$PageUrl;?>')" ><img src="images/print_16.png" border="0" title="Print Voucher Entry" alt="Print Voucher Entry" /></a>
				   
				   
				   <?php }else{?>
                   <?php if (in_array("14_15", $admin_permissions)) {?>
                   <a href="?pid=84&action=payamount&chgid=<?php echo $student['id']; ?>&start=<?php echo $start.$PageUrl;?>" >
                   <img src="images/pay_balance_16.png" border="0" title="Pay Amount" alt="Pay Amount" />
                   </a><?php }}?>
                   </td>
                </tr>
                <?php
				    $slno++;
				    $total_room_rate += $student['pay_amount'];
					$total_deduction += $student['deduction'];
					$total_amount_paid +=$student['amount_paid'];
                }
                ?>
				<tr height="25">
                   <td colspan="7" align="right"><b>Total :</b> </td> 
				   <td align="right"><?php if($total_room_rate>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($total_room_rate, 2, '.', '');}?></td>  
				   <td align="right"><?php if($total_deduction>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($total_deduction, 2, '.', '');}?></td>  
				   <td align="right"><?php if($total_amount_paid>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($total_amount_paid, 2, '.', '');}?></td>    
				   <td></td>                
                </tr>
                <tr height="25">
                   <td align="center" colspan="10"><?php
				   
				   
				   paginateexte($start, $q_limit, $no_rows, "action=".$action.$PageUrl);
				   ?></td>                   
                </tr>
				<tr height="25">
                   <td align="right" colspan="10" style="padding-right:5px;"><input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=84&action=print_tr_bills&start=<?php echo $start.$PageUrl; ?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /></td>                   
                </tr>
				<?php }else{?>
				<tr height="25">
                   <td align="center" colspan="10" >No Records Found</td>                   
                </tr>
				<?php }?>
				
                </table>
</td>
<td width="1" class="bgcolor_02"></td>
</tr>
</td>
<td width="1" class="bgcolor_02"></td>
</tr>
<tr>
<td height="1" colspan="3" class="bgcolor_02"></td>
</tr>
</table>
<?php }?>
<?php if($action=='print_tr_bills'){?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="3" colspan="3"></td>
</tr>
<tr>
<td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Transport Bills</strong></td>
</tr>

<tr>
<td width="1" class="bgcolor_02"></td>
<td align="left" valign="top"><br />

				<table width="100%" cellpadding="0" cellspacing="0">
                <tr class="bgcolor_02" height="25">
                   <td width="5%" align="left">S.NO</td>
				   <td width="8%" align="left">Reg No.</td>
				    <!--<td width="8%" align="left">Roll No.</td>-->
                   <td width="15%" align="left">Student</td>
				   <td width="9%" align="left">Class</td>
				   <td width="15%" align="left">Father Name</td>
                   <td width="11%" align="center">Month</td>
                   <td width="12%" align="right">Bill Amount</td>
                   <td width="13%" align="right">Waived</td>
                   <td width="12%" align="right">Paid Amount</td>
                  
                </tr>
                <?php
                $i=1;
                
					$rw = 1;
					$slno = $start+1;
					$total_room_rate = 0;
					$total_deduction = 0;
					$total_amount_paid =0;
					if(count($student_row)>0){
					foreach($student_row as $student)					
						 {  
							if($rw%2==0)
								$rowclass = "even";
								else
								$rowclass = "odd";
                ?>
                <tr class="<?php echo $rowclass;?>" height="25">
                   <td align="left"><?php echo $slno; ?></td>
				   <td align="left"><?php echo $student['es_preadmissionid']; ?></td>
				    <!--<td align="left">
					
					<?php 
											 //$online_sql="select * from es_sections_student where student_id=".$student['es_preadmissionid'];
 //$online_row=$db->getRow($online_sql);
											
											//if($online_row['roll_no']!=''){ echo ucwords($online_row['roll_no']);} else { echo "---";}?>
					</td>-->
                   <td align="left"><?php echo $student['pre_name']; ?></td>
				   <td align="left"><?php echo classname($student['pre_class']); ?></td>
				   <td align="left"><?php echo $student['pre_fathername']; ?></td>
                   <td align="center"><?php echo func_date_conversion('Y-m-d', 'd/m/Y', $student['due_month']); ?></td>
                   <td align="right"><?php echo number_format($student['pay_amount'], 2, '.', ''); ?></td>
                   <td align="right"><?php echo number_format($student['deduction'], 2, '.', ''); ?></td>
                   <td align="right"><?php echo number_format($student['amount_paid'], 2, '.', ''); ?></td>
                   </tr>
                <?php
				    $slno++;
				    $total_room_rate += $student['pay_amount'];
					$total_deduction += $student['deduction'];
					$total_amount_paid +=$student['amount_paid'];
                }}
                ?>
				<tr height="25">
                   <td colspan="7" align="right"><b>Total :</b> </td> 
				   <td align="right"><?php if($total_room_rate>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($total_room_rate, 2, '.', '');}?></td>  
				   <td align="right"><?php if($total_deduction>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($total_deduction, 2, '.', '');}?></td>  
				   <td align="right"><?php if($total_amount_paid>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($total_amount_paid, 2, '.', '');}?></td>    
			                
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
<?php if($action=='receipt') { 

// insert logs
		//$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_hostel_charges','HOSTEL','View Details','".$chgid."','RECEIPT PRINT','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	//$log_insert_exe=mysql_query($log_insert_sql);
//array_print($_GET);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Transport Charges Receipt</strong></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top">
				   <table width="100%" border="0">
					  <tr>
						<td>
								<table width="100%" border="0">
								  <tr>
									<td width="50%"><table width="100%" border="0">
										  <tr>
											
											<td width="25%" height="25" align="left" valign="middle" class="admin">Receipt&nbsp;No</td>
											<td width="2%" align="left" valign="middle" class="admin">:</td>
											<td width="73%" align="left" valign="middle"><?php echo $payamount_details['id']?></td>
										  </tr>
										  <tr>
											
											<td width="25%" height="25" align="left" valign="middle" class="admin">Route</td>
											<td width="2%" align="left" valign="middle" class="admin">:</td>
											<td width="73%" align="left" valign="middle"><?php echo $payamount_details['route_title'];?></td>
										  </tr>
										  <tr>
										
											<td height="25" align="left" valign="middle" class="admin">Board Title</td>
											<td align="left" valign="middle" class="admin">:</td>
											<td align="left" valign="middle"><?php echo $payamount_details['board_title'];?></td>
										</tr>
										<tr>
											
											<td height="25" align="left" valign="middle" class="admin">Vehicle&nbsp;No</td>
											<td align="left" valign="middle" class="admin">:</td>
											<td align="left" valign="middle"><?php echo $payamount_details['tr_vehicle_no'];?></td>
										</tr>
										<tr>
											
											<td height="25" align="left" valign="middle" class="admin">Vehicle&nbsp;Type</td>
											<td align="left" valign="middle" class="admin">:</td>
											<td align="left" valign="middle"><?php echo ucwords($payamount_details['tr_transport_type']);?></td>
										</tr>
											<!--<tr>
											
											<td height="25" align="left" valign="middle" class="admin">Roll No.</td>
											<td align="left" valign="middle" class="admin">:</td>
											<td align="left" valign="middle"><?php 
											 //$online_sql="select * from es_sections_student where student_id=".$payamount_details['studentid'];
 //$online_row=$db->getRow($online_sql);
											
											//if($online_row['roll_no']!=''){ echo ucwords($online_row['roll_no']);} else { echo "---";}?></td>
										</tr>-->
										
										</table></td>
									<td><table width="100%" border="0">
										  <tr>
												
												<td width="25%" height="25" align="left" valign="middle" class="admin">Receipt&nbsp;Date</td>
												<td width="2%" align="left" valign="middle" class="admin">:</td>
												<td width="73%" align="left" valign="middle"><?php if($payamount_details['paid_on']!='0000-00-00'){echo func_date_conversion("Y-m-d","d/m/Y",$payamount_details['paid_on']);}?></td>
										  </tr>
										  <tr>
												
												<td width="25%" height="25" align="left" valign="middle" class="admin">Driver Name</td>
												<td width="2%" align="left" valign="middle" class="admin">:</td>
												<td width="73%" align="left" valign="middle"><?php 
												$vehicle_row=$db->getrow("SELECT * FROM  es_staff WHERE es_staffid=".$payamount_details['driver_id']);
                    echo $vehicle_row['st_firstname']." ".$vehicle_row['st_lastname'];?></td>
										  </tr>
										  <tr>
											
											<td height="25" align="left" valign="middle" class="admin">Registration&nbsp;No</td>
											<td align="left" valign="middle">:</td>
											<td align="left" valign="middle"><?php echo $payamount_details['studentid'];?></td>
										</tr>
										<tr>
											
											<td height="25" align="left" valign="middle" class="admin">Student&nbsp;Name</td>
											<td align="left" valign="middle" class="admin">:</td>
											<td align="left" valign="middle"><?php echo $payamount_details['pre_name']; ?></td>
										</tr>
										<tr>
											
											<td height="25" align="left" valign="middle" class="admin">Father Name</td>
											<td align="left" valign="middle" class="admin">:</td>
											<td align="left" valign="middle"><?php echo $payamount_details['pre_fathername']; ?> </td>
										</tr>
										</table></td>	
									
								  </tr>
								</table>

						</td>
					  </tr>
					  <tr>
						<td><table width="100%" border="0">
							  <tr class="admin">
								<td align="left">Due for the Month</td>
								<td align="left">Due Amount</td>
								<td align="left">Amount Waived</td>
								<td align="left">Amount Received</td>
							  </tr>
							  <tr>
								<td align="left"><?php if($payamount_details['due_month']!='0000-00-00'){echo func_date_conversion("Y-m-d","d/m/Y",$payamount_details['due_month']);} ?></td>
								<td align="left"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($payamount_details['pay_amount'], 2, '.', '');?></td>
								<td align="left"><?php if($payamount_details['deduction']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($payamount_details['deduction'], 2, '.', '');}?></td>
								<td align="left"><?php if($payamount_details['amount_paid']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($payamount_details['amount_paid'], 2, '.', '');}?></td>
							  </tr>
							</table>
                      </td>
					  </tr>
					  <tr>
						<td><table width="100%" border="0">
							  <tr>
								<td align="left" valign="middle"><b>Rupees : </b><?php echo $payamount_details['remarks'];?> </td>
							  </tr>
							</table>
						</td>
					  </tr>
					  <tr>
						<td><table width="100%" border="0">
							  <tr>
								<td align="right" valign="middle" class="admin">Authorised Signature</td>
							  </tr>
							  <tr>
								<td>&nbsp;</td>
							  </tr>
							  <tr>
								<td>&nbsp;</td>
							  </tr>
							</table>
						</td>
					  </tr>
					</table>
				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
    </tr>
  </table>
<?php } 
if($action=='receiptpayment') { 

// insert logs
		//$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_hostel_charges','HOSTEL','View Details','".$chgid."','RECEIPT PRINT','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	//$log_insert_exe=mysql_query($log_insert_sql);
//array_print($_GET);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Transport Charges Voucher Receipt</strong></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top">
				   <table width="100%" border="0">
					  <tr>
						<td>
								<table width="100%" border="0">
								  <tr>
									<td width="50%"><table width="100%" border="0">
										  <tr>
											
											<td width="25%" height="25" align="left" valign="middle" class="admin">Receipt&nbsp;No</td>
											<td width="2%" align="left" valign="middle" class="admin">:</td>
											<td width="73%" align="left" valign="middle"><?php echo $payamount_details['id']?></td>
										  </tr>
										  <tr>
											
											<td width="25%" height="25" align="left" valign="middle" class="admin">Route</td>
											<td width="2%" align="left" valign="middle" class="admin">:</td>
											<td width="73%" align="left" valign="middle"><?php echo $payamount_details['route_title'];?></td>
										  </tr>
										  <tr>
										
											<td height="25" align="left" valign="middle" class="admin">Board Title</td>
											<td align="left" valign="middle" class="admin">:</td>
											<td align="left" valign="middle"><?php echo $payamount_details['board_title'];?></td>
										</tr>
										<tr>
											
											<td height="25" align="left" valign="middle" class="admin">Vehicle&nbsp;No</td>
											<td align="left" valign="middle" class="admin">:</td>
											<td align="left" valign="middle"><?php echo $payamount_details['tr_vehicle_no'];?></td>
										</tr>
										<tr>
											
											<td height="25" align="left" valign="middle" class="admin">Vehicle&nbsp;Type</td>
											<td align="left" valign="middle" class="admin">:</td>
											<td align="left" valign="middle"><?php echo ucwords($payamount_details['tr_transport_type']);?></td>
										</tr>
											<!--<tr>
											
											<td height="25" align="left" valign="middle" class="admin">Roll No.</td>
											<td align="left" valign="middle" class="admin">:</td>
											<td align="left" valign="middle"><?php 
											 //$online_sql="select * from es_sections_student where student_id=".$payamount_details['studentid'];
 //$online_row=$db->getRow($online_sql);
											
											//if($online_row['roll_no']!=''){ echo ucwords($online_row['roll_no']);} else { echo "---";}?></td>
										</tr>-->
										
										</table></td>
									<td><table width="100%" border="0">
										  <tr>
												
												<td width="25%" height="25" align="left" valign="middle" class="admin">Receipt&nbsp;Date</td>
												<td width="2%" align="left" valign="middle" class="admin">:</td>
												<td width="73%" align="left" valign="middle"><?php if($payamount_details['paid_on']!='0000-00-00'){echo func_date_conversion("Y-m-d","d/m/Y",$payamount_details['paid_on']);}?></td>
										  </tr>
										  <tr>
												
												<td width="25%" height="25" align="left" valign="middle" class="admin">Driver Name</td>
												<td width="2%" align="left" valign="middle" class="admin">:</td>
												<td width="73%" align="left" valign="middle"><?php 
												$vehicle_row=$db->getrow("SELECT * FROM  es_staff WHERE es_staffid=".$payamount_details['driver_id']);
                    echo $vehicle_row['st_firstname']." ".$vehicle_row['st_lastname'];?></td>
										  </tr>
										  <tr>
											
											<td height="25" align="left" valign="middle" class="admin">Registration&nbsp;No</td>
											<td align="left" valign="middle">:</td>
											<td align="left" valign="middle"><?php echo $payamount_details['studentid'];?></td>
										</tr>
										<tr>
											
											<td height="25" align="left" valign="middle" class="admin">Student&nbsp;Name</td>
											<td align="left" valign="middle" class="admin">:</td>
											<td align="left" valign="middle"><?php echo $payamount_details['pre_name']; ?></td>
										</tr>
										<tr>
											
											<td height="25" align="left" valign="middle" class="admin">Father Name</td>
											<td align="left" valign="middle" class="admin">:</td>
											<td align="left" valign="middle"><?php echo $payamount_details['pre_fathername']; ?> </td>
										</tr>
										</table></td>	
									
								  </tr>
								</table>

						</td>
					  </tr>
					  <tr>
						<td><table width="100%" border="0">
							  <tr class="admin">
								<td align="left">Payment Mode</td>
								<td align="left">Amount</td>
								<td align="left">Bank Name</td>
								<td align="left">Bank Account</td>
								<td align="left">Check No.</td>
								<td align="left">Tailer No.</td>
								<td align="left">Pin No.</td>
							  </tr>
							  <?php
							
							 // $payamount_details['voucherid']
							 
							  $online_sql="select * from es_voucherentry where es_voucherentryid=".$payamount_details['voucherid'];
 $online_row=$db->getRow($online_sql);

 ?>
							  <tr>
								<td align="left"><?php if($online_row['es_paymentmode']!='') {echo $online_row['es_paymentmode']; } else { echo "---";} ?></td>
								<td align="left"><?php if($online_row['es_amount']!='') {?>Rs <?php echo $online_row['es_amount']; ?>.00<?php }else { echo "---";} ?></td>
								<td align="left"><?php if($online_row['es_bank_name']!='') {echo $online_row['es_bank_name']; } else { echo "---";} ?></td>
								<td align="left"><?php if($online_row['es_bankacc']!='') {echo $online_row['es_bankacc']; } else { echo "---";} ?></td>
								<td align="left"><?php if($online_row['es_checkno']!='') {echo $online_row['es_checkno']; } else { echo "---";} ?></td>
								<td align="left"><?php if($online_row['es_teller_number']!='') {echo $online_row['es_teller_number']; } else { echo "---";} ?></td>
								<td align="left"><?php if($online_row['es_bank_pin']!='') {echo $online_row['es_bank_pin']; } else { echo "---";} ?></td>
						
							  </tr>
							</table>
                      </td>
					  </tr>
					 
					
					</table>
				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
    </tr>
  </table>
<?php }

?>
<?php
if($action=="payamount"){
?>
<script type="text/javascript" >
	function showAvatar()
			{
		
				var ch = document.de_allocate_room_form.eq_paymode.value;
				if (ch=='cash' ||ch==''){
					document.getElementById("patiddivdisp").style.display="none";
				}else{
				document.getElementById("patiddivdisp").style.display="block";
				}
			}		  
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="3" colspan="3"></td>
</tr>
<tr>
<td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Pay Transport Charges</strong></td>
</tr>
<tr>
<td width="1" class="bgcolor_02" ></td>
<td align="left" height="4" ></td>
<td width="1" class="bgcolor_02" ></td>
</tr>
<tr>
<td width="1" class="bgcolor_02"></td>
<td align="left" valign="top">		
				
				<form action="" method="post" name="de_allocate_room_form">
                <table width="100%" border="0" cellspacing="3" cellpadding="4">	
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
				<td width="24%" align="left" class="admin">Registration No.</td>
					<td width="27%" align="left"  class="narmal"><?php echo $student_row['studentid']; ?></td>
					<td width="22%" align="left">&nbsp;</td>
					<td colspan="2" align="left">&nbsp;</td>
					<td width="1%">&nbsp;</td>
					<td width="2%">&nbsp;</td>
				  </tr>
                    <tr>
				<td width="24%" align="left" class="admin">Student Name</td>
					<td width="27%" align="left"  class="narmal"><?php echo $student_row['pre_name']; ?></td>
					<td width="22%" align="left">&nbsp;</td>
					<td colspan="2" align="left">&nbsp;</td>
					<td width="1%">&nbsp;</td>
					<td width="2%">&nbsp;</td>
				  </tr>
				  
				  
				    <!--<tr>
				<td width="24%" align="left" class="admin">Roll Number</td>
					<td width="27%" align="left"  class="narmal"><?php 
											 //$online_sql="select * from es_sections_student where student_id=".$student_row['studentid'];
 //$online_row=$db->getRow($online_sql);
											
											//if($online_row['roll_no']!=''){ echo ucwords($online_row['roll_no']);} else { echo "---";}?></td>
					<td width="22%" align="left">&nbsp;</td>
					<td colspan="2" align="left">&nbsp;</td>
					<td width="1%">&nbsp;</td>
					<td width="2%">&nbsp;</td>
				  </tr>-->
				  
					<tr>
				<td width="24%" align="left" class="admin">Class</td>
					<td width="27%" align="left"  class="narmal"><?php echo $class_array[$student_row['pre_class']]; ?></td>
					<td width="22%" align="left">&nbsp;</td>
					<td colspan="2" align="left">&nbsp;</td>
					<td width="1%">&nbsp;</td>
					<td width="2%">&nbsp;</td>
				  </tr>
				  <tr>
				<td width="24%" align="left" class="admin">Father Name</td>
					<td width="27%" align="left"  class="narmal"><?php echo $student_row['pre_fathername']; ?></td>
					<td width="22%" align="left">&nbsp;</td>
					<td colspan="2" align="left">&nbsp;</td>
					<td width="1%">&nbsp;</td>
					<td width="2%">&nbsp;</td>
				  </tr>
				  <tr>
					<td align="left" class="admin">Due Month</td>
					<td align="left"><span class="narmal"><?php echo func_date_conversion('Y-m-d', 'd/m/Y', $student_row['due_month']); ?></span></td>
					<td align="left"><span class="narmal"> </span></td>
					<td colspan="2" align="left">      </td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
                  <tr>
					<td align="left" class="narmal">&nbsp;</td>
					<td align="left">&nbsp;</td>
					<td align="left"><span class="narmal"> </span></td>
					<td colspan="2" align="left">      </td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
                  <tr>
					<td align="left" class="admin">Due Amount </td>
					<td align="left" class="admin">Amount Received </td>
					<td align="left"><span class="admin"> Waived Amount </span></td>
					<td colspan="2" align="left">      </td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td align="left" class="admin"><font color="#FF0000"><b>RS <?php echo $student_row['pay_amount']; ?></b></font></td>
					<td align="left" class="narmal"><input type="text" name="amount_paid" value="<?php echo $amount_paid; ?>" /></td>
					<td align="left"><span class="narmal">
					  <input type="text" name="deduction" value="<?php echo $deduction; ?>" />
					</span></td>
					<td colspan="2" align="left">&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
                  <tr>					
					<td align="left" class="narmal" colspan="6">
                    
                    						<table width="100%" border="0" cellspacing="3" cellpadding="0">											
											<tr>
                                       		  <td width="15%" align="left" valign="middle" class="admin">&nbsp;&nbsp;</td>
                                       		  <td width="19%" align="left" valign="middle" class="admin">Payment Mode</td>
                                       		  <td width="3%" align="left" valign="top" class="admin">:</td>
                                       		  <td width="63%" align="left" valign="top" class="admin"><select name="eq_paymode" style="width:150px;" onchange="Javascript:showAvatar();" >
                                                <option value=""> - Select - </option>
												<option <?php if($eq_paymode=='cash') { echo "selected='selected'"; } ?> value ="cash">Cash</option>
                                                <option <?php if($eq_paymode=='cheque') { echo "selected='selected'"; } ?> value ="cheque">Cheque</option>
                                                <option <?php if($eq_paymode=='DD') { echo "selected='selected'"; } ?> value ="DD">DD</option>
                                              </select><font color="#FF0000">*</font></td>
                                   		    </tr>
											<tr>
											<td height="25" class="admin">&nbsp;</td>
											<td height="25" class="admin">Voucher&nbsp;Type</td>
											<td align="left" class="admin">:</td>
											<td class="narmal"><select name="vocturetypesel" style="width:150px;">
											<option value=""> - Select - </option>
											  <?php 
																						$voucherlistarr = voucher_finance();
																						krsort($voucherlistarr);
																						foreach($voucherlistarr as $eachvoucher) {	?>
											  <option value="<?php echo $eachvoucher['es_voucherid']; ?>" <?php if ($vocturetypesel==$eachvoucher['es_voucherid']){  
											   echo 'selected'; }?> ><?php echo $eachvoucher['voucher_type'];                        ?> ( <?php echo $eachvoucher['voucher_mode']; ?> )</option>
											  <?php } ?>
											</select><font color="#FF0000">*</font></td>
										    </tr>
                                            <tr>
												<td height="25" class="narmal">&nbsp;</td>
												<td height="25" class="admin">Ledger&nbsp;Type</td>
												<td align="left" class="admin">:</td>
												<td class="narmal"><select name="es_ledger" style="width:150px;"><option value=""> - Select - </option>
												  <?php 
																							$ledgerlistarr = ledger_finance();
																							foreach($ledgerlistarr as $eachledger) { 
																							?>
												  <option value="<?php echo $eachledger['lg_name']; ?>" <?php if($es_ledger==$eachledger['lg_name']) { echo                        'selected'; } elseif($eachledger['lg_name']=='Staff Salary'){echo 'selected';} ?>><?php echo $eachledger['lg_name']; ?> </option>
												  <?php } ?>
												</select><font color="#FF0000">*</font></td>
											</tr>
											<tr>
                                       		  <td align="left" valign="middle" colspan="4"><div  id="patiddivdisp"  style="display:none;" >
																<table  border="1" cellspacing="0" class="tbl_grid" width="100%" cellpadding="3">
																						
																	<tr>
																		<td align="left" class="bgcolor_02" colspan="3">Bank Details </td>
																	</tr>
																	
																	<tr>
																		<td align="left"   width="22%" class="admin" >Bank Name </td>
																		<td align="center"  width="4%" class="admin">:</td>
																		<td align="left"  width="74%"><input type="text" name="es_bank_name" value="<?php echo $es_bank_name;?>" /></td>
																	</tr>
																	<tr>
																		<td align="left" class="admin"> Account Number</td>
																		<td align="center" class="admin">:</td>
																		<td align="left" ><input type="text" name="es_bankacc" value="<?php echo $es_bankacc;?>" /></td>
																	</tr>
																	<tr>
																		<td align="left" class="admin">Cheque / DD Number </td>
																		<td align="center" class="admin">:</td>
																		<td align="left"><input type="text" name="es_checkno" value="<?php echo $es_checkno;?>" /></td>
																	</tr>
																	<tr>
																		<td align="left" class="admin">Teller Number </td>
																		<td align="center" class="admin">:</td>
																		<td align="left"><input type="text" name="es_teller_number" value="<?php echo $es_teller_number;?>" /></td>
																	</tr>
																	<tr>
																		<td align="left" class="admin">Pin </td>
																		<td align="center" class="admin">:</td>
																		<td align="left"><input type="text" name="es_bank_pin" value="<?php echo $es_bank_pin;?>" /></td>
																	</tr>
																</table>	
																</div></td>
                                   		    </tr>
											</table>
                    
                    </td>						
				  </tr>
				  <tr>
				    <td align="left" class="admin">&nbsp;</td>
				    <td align="left" class="narmal"><input type="hidden" name="dueamount" value="<?php echo $student_row['pay_amount'];?>" /><input type="submit" name="receive_amount" value="Pay Amount" class="bgcolor_02" /></td>
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
</td>
<td width="1" class="bgcolor_02"></td>
</tr>
<tr>
<td height="1" colspan="3" class="bgcolor_02"></td>
</tr>
</table>
<?php }?>


