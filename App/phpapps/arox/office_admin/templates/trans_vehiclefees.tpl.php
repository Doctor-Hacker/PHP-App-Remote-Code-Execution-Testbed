<?php
if($action=="vehiclefees"){	
?>			
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="3" colspan="4"></td>
</tr>
<tr>
<td height="25" colspan="4" class="bgcolor_02"><strong>&nbsp;&nbsp;Vehicle Fees</strong></td>
</tr>
<tr>
<td width="1" class="bgcolor_02" ></td>
<td height="4" colspan="2" align="left" ></td>
<td width="1" class="bgcolor_02" ></td>
</tr>
<tr>
<td width="1" class="bgcolor_02" ></td>
<td height="55" align="left" valign="middle" >
<form action="" method="post">&nbsp;Financial Year : 
<select name="financial_year">
<option value="">Select Financial Year</option>
<?php
$finance_sql = "SELECT * FROM es_finance_master ORDER BY es_finance_masterid DESC";
$finance_exe = mysql_query($finance_sql);
while($finance_row = mysql_fetch_array($finance_exe)){?>
<option value="<?php echo $finance_row['es_finance_masterid']; ?>" <?php if($fyear_row['es_finance_masterid']==$finance_row['es_finance_masterid'] || $finance_row['es_finance_masterid']==$financial_year){?> selected="selected"<?php }?>><?php echo func_date_conversion('Y-m-d', 'd/m/Y', $finance_row['fi_startdate'])." - ".func_date_conversion('Y-m-d', 'd/m/Y', $finance_row['fi_enddate']); ?></option>
<?php }?>
</select>
<input type="submit" name="submitfinance" value="Submit" class="bgcolor_02" />
</form>
</td>
<td width="159" align="left" valign="top" >&nbsp;</td>
<td width="1" class="bgcolor_02" ></td>
</tr>
<tr>
<td width="1" class="bgcolor_02" ></td>
<td height="111" colspan="2" align="left" valign="top" >

<?php
$group_sql = "SELECT * FROM es_groups";
$group_row =$db->getRows($group_sql);
foreach($group_row as $group){
	echo "<br><b>".$group['es_groupname']."</b>";
?>

<table width="100%" border="0" cellpadding="1" cellspacing="1" bordercolor="#CCCCCC">
				  <tr  class="bgcolor_02">
					<td width="5%" height="23" align="center"><strong>S No</strong></td>
					<?php /*?><td width="28%" height="23" align="center"><strong>Group</strong></td><?php */?>
					<td width="36%" align="center"><strong>Class</strong></td>
					<td width="14%" align="center"><strong>Fee Amount</strong></td>   
					<td width="17%" align="center"><strong>Action</strong></td>
				  </tr>
				  <?php
				  $fee_sql = "SELECT * FROM es_classes WHERE es_groupid=".$group['es_groupsid'];
				  $fee_row =$db->getRows($fee_sql);
				  
				  if(count($fee_row) > 0 ){ ?>
				  <?php						
					$rw = 1;
					$slno = $start+1;
					foreach ($fee_row as $fee)
						 {  
							if($rw%2==0)
								$rowclass = "even";
								else
								$rowclass = "odd";
					?>
				  <tr class="<?php echo $rowclass;?>">
					<td align="center"><?php echo $slno;?></td>
					<?php /*?><td align="center"><?php echo $fee['class_id']; ?></td><?php */?>
					<td align="center"><?php echo $fee['es_classname']; ?></td>
					<td align="center">
					<?php 
					$fee2_sql = "SELECT * FROM es_trans_fee_details WHERE financial_year=".$financial_year_new." AND class_id=".$fee['es_classesid'];
					$fee2_row =$db->getRow($fee2_sql);
					echo $fee2_row['amount']; 
					?>
                    </td>    
					<td align="center">
                    <?php if($fyear_row['es_finance_masterid']==$financial_year_new){?>
					<a title="Edit Fee" href="?pid=78&action=editfee&classid=<?php echo $fee['es_classesid'];?>&financial_year=<?php echo $financial_year_new; ?>"><?php echo editIcon(); ?></a>&nbsp;
                    <?php }else{ echo "-";}?>					
					</td>
				  </tr>
				  <?php           
				  $rw++;
				  $slno++;	   
				  } ?>
				  <tr>
					<td colspan="6" align="center"><?php //paginateexte($start, $q_limit, $fee_num, "action=".$action."&column_name=".$orderby."&asds_order=".$asds_order) ?>    </td>
				  </tr>
				  <?php } 
											
							  else {
							   echo "<tr>";
							   echo "<td align='center' class='narmal' colspan='7'>No records found</td>";
							   echo "</tr>";
						} 
										
										
										
				  ?>
				</table>
                
<?php }?>



</td>
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
<?php }?>
<?php
if($action=="editfee"){?>
<form action="" name="editform" method="post">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="3" colspan="5"></td>
</tr>
<tr>
<td height="25" colspan="5" class="bgcolor_02"><strong>&nbsp;&nbsp;Add Vehicle Fees</strong></td>
</tr>
<tr>
<td width="1" class="bgcolor_02" ></td>
<td width="83"></td>
<td height="5" colspan="2" align="left" ></td>
<td width="3" class="bgcolor_02" ></td>
</tr>
<tr>
<td width="1" class="bgcolor_02" ></td>
<td width="83"></td>
<td align="left" valign="top" height="25">Financial Year :  
</td>
<td width="959" height="25" align="left" valign="top"><?php echo func_date_conversion('Y-m-d', 'd/m/Y', substr($finance_array[$financial_year],'0','10'))." - ".func_date_conversion('Y-m-d', 'd/m/Y', substr($finance_array[$financial_year],'13','10')); ?>
  <input type="hidden" name="fee_financial_year" value="<?php echo $financial_year; ?>" /></td>
<td width="3" class="bgcolor_02" ></td>
</tr>
<tr>
<td width="1" class="bgcolor_02" ></td>
<td width="83"></td>
<td align="left" valign="top" height="25">Class  :  </td>
<td align="left" valign="top" height="25"><?php echo $class_array[$classid]; ?>
  <input type="hidden" name="fee_class" value="<?php echo $classid; ?>" /></td>
<td width="3" class="bgcolor_02" ></td>
</tr>
<tr>
<td width="1" class="bgcolor_02" ></td>
<td width="83"></td>
<td align="left" valign="top" >Amount :  </td>
<td align="left" valign="top" ><input type="text" name="fee_amount" value="<?php echo $fee_edit_row['amount']; ?>" /></td>
<td width="3" class="bgcolor_02" ></td>
</tr>
<tr>
<tr>
<td width="1" class="bgcolor_02" ></td>
<td width="83"></td>
<td width="185" align="left" valign="top" >&nbsp;</td>
<td align="left" valign="top" ></td>
<td width="3" class="bgcolor_02" ></td>
</tr>
<tr>
<td width="1" class="bgcolor_02" ></td>
<td width="83"></td>
<td width="185" align="left" valign="top" >&nbsp;</td>
<td align="left" valign="top" ><input type="submit" name="updatefee" value="Update" class="bgcolor_02" /></td>
<td width="3" class="bgcolor_02" ></td>
</tr>
<tr>
<td width="1" class="bgcolor_02" ></td>
<td width="83"></td>
<td width="185" align="left" valign="top" >&nbsp;</td>
<td align="left" valign="top" ></td>
<td width="3" class="bgcolor_02" ></td>
</tr>
<tr>
  <td width="1" class="bgcolor_02"></td>
  <td width="83"></td>
<td colspan="2" align="left" valign="top">

</td>
<td width="3" class="bgcolor_02"></td>
</tr>
<tr>
<td height="1" colspan="5" class="bgcolor_02"></td>
</tr>
</table>
</form>
<?php }?>
