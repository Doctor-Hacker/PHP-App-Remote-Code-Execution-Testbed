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

<?php if ($action == 'mydetails') { 

?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;My Transport Details</strong></td>
              </tr>
			  <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top"><table width="100%" border="0" cellpadding="1" cellspacing="1" bordercolor="#CCCCCC">
				  <tr  class="bgcolor_02">
					
					<td width="19%" height="22" align="center"><strong>Type&nbsp;of&nbsp;the&nbsp;vehicle</strong></td>
                    <td width="23%" align="center"><strong>Registration&nbsp;No.&nbsp;Of&nbsp;Vehicle</strong></td>
                    <td width="21%" align="center"><strong>Route</strong></td>
                    <td width="21%" align="center"><strong>Name&nbsp;of&nbsp;the&nbsp;Driver</strong></td>
                    <td width="16%" align="center"><strong>Monthly&nbsp;Charges</strong></td>
				  </tr>
				  <?php if(is_array($query) && count($query) > 0 ){ ?>
				  
				  <tr height="30">
					<td align="center"><?php echo $query['tr_transport_type'];?></td>
                    <td align="center"><?php echo $query['tr_vehicle_no'];?></td>
                    <td align="center"><?php  echo $query['route_title']."(".$query['board_title'].")";?></td>
                    <td align="center">
                    <?php $vehicle_row=$db->getrow("SELECT * FROM  es_staff WHERE es_staffid=".$query['driver_id']);
                    echo $vehicle_row['st_firstname']." ".$vehicle_row['st_lastname'];
					?>
                    </td>
                    <td align="center">
                    <?php 
					echo $_SESSION['eschools']['currency']."&nbsp;".number_format($query['amount'], 2, '.', '');
					
					
					?>                    
                    </td>
				  </tr>
				  <tr height="25">
                   <td align="right" colspan="5" style="padding-right:5px;"><input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=42&action=print_tr_details&start=<?php echo $start.$PageUrl; ?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /></td>                   
                </tr>
				  <?php           
				  }
				   else {
				   echo "<tr>";
				   echo "<td align='center' class='narmal' colspan='5'>No records found</td>";
				   echo "</tr>";
				  } 
				  ?>
				</table></td>
				
                <td width="1" class="bgcolor_02"></td>
              </tr>
              
                <td height="1" colspan="3" class="bgcolor_02"></td>
                </tr>
            </table>
<br />

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="3" colspan="3"></td>
</tr>
<tr>
<td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;View My Transport Bills</strong></td>
</tr>
<tr>
<td width="1" class="bgcolor_02" ></td>
<td align="left" height="4" ></td>
<td width="1" class="bgcolor_02" ></td>
</tr>
<tr>
<td width="1" class="bgcolor_02"></td>
<td align="left" valign="top">		
				
                
                <table width="100%" cellpadding="0" cellspacing="0">
                <tr class="bgcolor_02" height="25">
                   <td width="8%" align="center" valign="middle">S.NO</td>
				   <td width="20%" align="center">Month</td>
                   <td width="20%" align="right">Bill Amount</td>
                   <td width="20%" align="right">Waived</td>
                   <td width="20%" align="right">Paid Amount</td>
                   <td width="22%" align="center">Action</td>
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
                   <td align="center" valign="middle"><?php echo $slno; ?></td>
				   <td align="center"><?php echo func_date_conversion('Y-m-d', 'd/m/Y', $student['due_month']); ?></td>
                   <td align="right"><?php echo number_format($student['pay_amount'], 2, '.', ''); ?></td>
                   <td align="right"><?php echo number_format($student['deduction'], 2, '.', ''); ?></td>
                   <td align="right"><?php echo number_format($student['amount_paid'], 2, '.', ''); ?></td>
                   <td align="center">
                   <?php
				   if($student['pay_status']=="paid"){?><a href="javascript: void(0)" onclick="popup_letter('?pid=42&action=receipt&chgid=<?php echo $student['histid']; ?>&start=<?php echo $start.$PageUrl;?>')" ><img src="images/print_16.png" border="0" title="Print Recipt" alt="Print Recipt" /></a><?php }else{?>
				   Not Paid
                   <?php }?>
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
                   <td colspan="2" align="right"><b>Total :</b> </td> 
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
                   <td align="right" colspan="6" style="padding-right:5px;"><input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=42&action=print_tr_bills&start=<?php echo $start.$PageUrl; ?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /></td>                   
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
<?php } if ($action == 'print_tr_bills'){?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="3" colspan="3"></td>
</tr>
<tr>
<td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;View My Transport Bills</strong></td>
</tr>
<tr>
<td width="1" class="bgcolor_02" ></td>
<td align="left" height="4" ></td>
<td width="1" class="bgcolor_02" ></td>
</tr>
<tr>
<td width="1" class="bgcolor_02"></td>
<td align="left" valign="top">		
				<table width="100%" border="0">
  <tr>
    <td><table width="100%" border="0">
  <tr>
    <td width="21%" class="admin">Reg.No</td>
    <td width="42%">:&nbsp;<?php echo $_SESSION['eschools']['user_id'];?></td>
    <td width="17%" class="admin">Class</td>
    <td width="20%">:&nbsp;<?php echo classname($query['pre_class']);?></td>
  </tr>
  <tr>
    <td class="admin">Student Name</td>
    <td>:&nbsp;<?php echo $query['pre_name'];?></td>
    <td class="admin">Father Name</td>
    <td>:&nbsp;<?php echo $query['pre_fathername'];?></td>
  </tr>
</table>
</td>
  </tr>
  <tr>
    <td><table width="100%" cellpadding="0" cellspacing="0">
                <tr class="bgcolor_02" height="25">
                   <td width="4%" align="center">S.NO</td>
				   <td width="10%" align="center">Month</td>
                   <td width="10%" align="right">Bill Amount</td>
                   <td width="10%" align="right">Waived</td>
                   <td width="10%" align="right">Paid Amount</td>
                   
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
                   <td align="center"><?php echo $slno; ?></td>
				   <td align="center"><?php echo func_date_conversion('Y-m-d', 'd/m/Y', $student['due_month']); ?></td>
                   <td align="right"><?php echo number_format($student['pay_amount'], 2, '.', ''); ?></td>
                   <td align="right"><?php echo number_format($student['deduction'], 2, '.', ''); ?></td>
                   <td align="right">
				   
				   <?php echo number_format($student['amount_paid'], 2, '.', ''); ?></td>
                  
                </tr>
                <?php
				    $slno++;
				    $total_room_rate += $student['pay_amount'];
					$total_deduction += $student['deduction'];
					$total_amount_paid +=$student['amount_paid'];
                }
                ?>
				<tr height="25">
                   <td colspan="2" align="right"><b>Total :</b> </td> 
				   <td align="right"><?php if($total_room_rate>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($total_room_rate, 2, '.', '');}?></td>  
				   <td align="right"><?php if($total_deduction>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($total_deduction, 2, '.', '');}?></td>  
				   <td align="right"><?php if($total_amount_paid>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($total_amount_paid, 2, '.', '');}?></td>    
				         
                </tr>
                
				<?php }else{?>
				<tr height="25">
                   <td align="center" colspan="10" >No Records Found</td>                   
                </tr>
				<?php }?>
				
      </table></td>
  </tr>
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
<?php if($action=='receipt') { 
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
<?php } ?>
<?php if($action == 'print_tr_details'){?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;My Transport Details</strong></td>
              </tr>
			  <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top">
				<table width="100%" border="0">
  <tr>
    <td><table width="100%" border="0">
  <tr>
    <td width="21%" class="admin">Reg.No</td>
    <td width="42%">:&nbsp;<?php echo $_SESSION['eschools']['user_id'];?></td>
    <td width="17%" class="admin">Class</td>
    <td width="20%">:&nbsp;<?php echo classname($query['pre_class']);?></td>
  </tr>
  <tr>
    <td class="admin">Student Name</td>
    <td>:&nbsp;<?php echo $query['pre_name'];?></td>
    <td class="admin">Father Name</td>
    <td>:&nbsp;<?php echo $query['pre_fathername'];?></td>
  </tr>
</table>
</td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellpadding="1" cellspacing="1" bordercolor="#CCCCCC">
				  <tr  class="bgcolor_02">
					
					<td width="19%" height="22" align="center"><strong>Type of the vehicle</strong></td>
                    <td width="23%" align="center"><strong>Registration No. Of Vehicle</strong></td>
                    <td width="21%" align="center"><strong>Route</strong></td>
                    <td width="21%" align="center"><strong>Name of the Driver</strong></td>
                    <td width="16%" align="center"><strong>Monthly Charges</strong></td>
				  </tr>
				  <?php if(is_array($query) && count($query) > 0 ){ ?>
				  <tr height="30">
					<td align="center"><?php echo $query['tr_transport_type'];?></td>
                    <td align="center"><?php echo $query['tr_vehicle_no'];?></td>
                    <td align="center"><?php  echo $query['route_title']."(".$query['board_title'].")";?></td>
                    <td align="center">
                    <?php $vehicle_row=$db->getrow("SELECT * FROM  es_staff WHERE es_staffid=".$query['driver_id']);
                    echo $vehicle_row['st_firstname']." ".$vehicle_row['st_lastname'];
					?>
                    </td>
                    <td align="center">
                    <?php
					if($query['pre_class']!=""){						
					$finance_master_sql="SELECT * FROM es_finance_master WHERE fi_startdate='".$query['pre_fromdate']."' AND fi_enddate='".$query['pre_todate']."'";
					$finance_master_exe=mysql_query($finance_master_sql);
					$finance_master_row=mysql_fetch_array($finance_master_exe);						
					if($finance_master_row['es_finance_masterid']!=""){
					$fee_sql="SELECT * FROM es_trans_fee_details WHERE class_id=".$query['pre_class']." AND financial_year='".$finance_master_row['es_finance_masterid']."'";
					$fee_exe=mysql_query($fee_sql);
					$fee_row=mysql_fetch_array($fee_exe);					
					}
                    echo $fee_row['amount'];
					}
					?>      <?php 
					echo $_SESSION['eschools']['currency']."&nbsp;".number_format($query['amount'], 2, '.', '');
					
					
					?>              
                    </td>
					
				  </tr>
				 
				  <?php           
			
				  }
											
							  else {
							   echo "<tr>";
							   echo "<td align='center' class='narmal' colspan='5'>No records found</td>";
							   echo "</tr>";
						} 
										
										
										
				  ?>
				</table></td>
  </tr>
</table>

				</td>
				
                <td width="1" class="bgcolor_02"></td>
              </tr>
              
                <td height="1" colspan="3" class="bgcolor_02"></td>
                </tr>
            </table>
<?php }?>