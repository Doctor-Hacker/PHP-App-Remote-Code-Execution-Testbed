<?php 
// View Profile
	if($action=='viewsalary' || $action=='print_salarylist')
	{
?>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
         <td height="3" colspan="3"></td>
	 </tr>
	  <tr>
		<td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">My Salary</span></td>
	  </tr>
          
	  <tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="center" valign="top">
		<?php if($action!='print_salarylist'){?>
		<form id="form1" name="form1" method="post" action="">
		<table width="100%" border="0" cellspacing="0" cellpadding="0" >
	  <tr>
			    <td width="0%">&nbsp;</td>
				<td width="17%">&nbsp;</td>
				<td width="1%">&nbsp;</td>
				<td width="14%">&nbsp;</td>
			<td width="5%">&nbsp;</td>
		  </tr>
			  <tr>
			    <td class="admin">&nbsp;</td>
				<td align="left" class="adminfont">Select Year </td>
				<td align="left">:</td>
				<td align="left"><select name="selectyear">				
				  <?php for($i=2008;$i<2030;$i++)
				  {
					  if($selectyear==$i && $Submit=='Submit')
					  {
					  echo "<option value='".$i."' selected='selected'>".$i."</option>";
					  }
					  else
					  {
					  echo "<option value='".$i."'>".$i."</option>";
					  }
				  }
				  ?>                  
                </select></td>
				<td align="left" class="narmal" width="5%">Month</td>
			<td align="left" class="narmal" width="12%"><select name="selmonth" >
			  <option value="">-- Select --</option>
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
            </select></td>
				<td width="51%" align="left"><input type="submit" name="Submit" value="Submit" class="bgcolor_02" /></td>
		  </tr>			 
		  </table>
		</form>	
		<?php }else{?>
		<table width="100%">
				<?php $staff_arr = get_staffdetails($_SESSION['eschools']['user_id']);?>
                 <tr >
                        <td width="11%" height="18" align="right"><span class="admin">Department</span></td>
                        <td width="26%" align="left"><span class="narmal">:<?php echo deptname($staff_arr['st_department']); ?></span></td>
                        <td width="6%" align="right"><span class="admin">Post</span></td>
						 <td width="29%" align="left"><span class="narmal">:<?php echo postname($staff_arr['st_post']); ?></span></td>
						 <td width="7%" align="right"><span class="admin">Name</span></td>
						 <td width="21%" align="left"><span class="narmal">:<?php echo $staff_arr['st_firstname'].'&nbsp;'.$staff_arr['st_lastname']; ?></span></td>
				</tr>
				</table>	

		<?php }?>
		<br />
		<?php if($Submit=='Submit' || $action=='print_salarylist') 
		{ ?>
		<table width="100%" border="1" cellspacing="0" cellpadding="0" class="tbl_grid">
		  <tr class="bgcolor_02" height="25">
			<td width="9%" class="admin">&nbsp;S.No</td>
			<td width="14%" class="admin">Month</td>
			<td width="16%" class="admin">Basic </td>
			<td width="21%" class="admin"> Allowance</td>
			<td width="20%" class="admin">Deductions </td>
			<td width="20%" class="admin">Net Salary </td>
		  </tr>
		  <?php if(count($paysallist)>0) {
		  $i=1; 
		  $tot=0;
		  foreach($paysallist as $eachrecord)
		  {
		  ?> 
		  <tr>
			<td class="narmal"><?php echo $i++; ?></td>
			<td class="narmal"><?php echo DatabaseFormat($eachrecord['pay_month'],"F"); ?></td>
			<td align="left" class="narmal"><?php echo number_format($eachrecord['basic_salary'], 2, '.', ''); ?></td>
			<td align="left" class="narmal"><?php echo number_format($eachrecord['tot_allowance'], 2, '.', ''); ?></td>
			<td align="left" class="narmal"><?php echo number_format($eachrecord['tot_deductions'], 2, '.', ''); ?></td>
			<td align="left" class="narmal"><?php echo number_format($eachrecord['net_salary'], 2, '.', ''); ?></td>
		  </tr>
		  <?php
		  $tot = $tot+$eachrecord['net_salary'];
		   } ?>
		   <tr height="28">
			<td colspan="4" class="narmal"></td>
			<td align="right" class="narmal"><strong>Total :</strong></td>
			<td align="left" class="narmal"><strong><?php echo number_format($tot, 2, '.', ''); ?></strong></td>
		  </tr>
		   <?php } else { ?>
		  <tr>
			<td colspan="6" align="center" class="narmal"> No Records Found </td>
		  </tr>
		   <?php } ?>
		   <tr>
			<td colspan="6" align="center" class="narmal"></td>
		  </tr>
		  <?php if($action!='print_salarylist'){?>
		   <tr>
			<td colspan="6" align="center" class="narmal"><input name="Submit" type="button" onclick="newWindowOpen ('?pid=20&action=print_salarylist<?php  echo $adminlisturl;?>');" class="bgcolor_02" value="Print" style="cursor:pointer;"/></td>
		  </tr>
		  <?php }?>
		   
		</table>
	<?php } ?>		</td>
		<td width="1" class="bgcolor_02"></td>
	  </tr>	  
	  <tr>
		<td height="1" colspan="3" class="bgcolor_02"></td>
	  </tr>
	</table>
<?php	
	}
// End of View Profile	
?>
<script type="text/javascript">
function newWindowOpen(href)
{
    window.open(href,null, 'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');
}
</script>

<?php
// Employee Pay slip List
	if($action=='loanissueslist' || $action=='print_list')
	{	

?>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
         <td height="3" colspan="3"></td>
	 </tr>
	  <tr>
		<td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Issue Loan List</span></td>
	  </tr>
	   <tr>
         <td height="3" colspan="3"></td>
	 </tr>
	 <?php if($action=='print_list'){?>
	 <tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="center" valign="top">
		<table width="100%">
				<?php $staff_arr = get_staffdetails($_SESSION['eschools']['user_id']);?>
                 <tr >
                        <td width="11%" height="18" align="right"><span class="admin">Department</span></td>
                        <td width="26%" align="left"><span class="narmal">:<?php echo deptname($staff_arr['st_department']); ?></span></td>
                        <td width="6%" align="right"><span class="admin">Post</span></td>
						 <td width="29%" align="left"><span class="narmal">:<?php echo postname($staff_arr['st_post']); ?></span></td>
						 <td width="7%" align="right"><span class="admin">Name</span></td>
						 <td width="21%" align="left"><span class="narmal">:<?php echo $staff_arr['st_firstname'].'&nbsp;'.$staff_arr['st_lastname']; ?></span></td>
				</tr>
				</table>
		</td>		
		<td width="1" class="bgcolor_02"></td>
	  </tr>	
	  <?php }?> 
	 
	 
	  <tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="center" valign="top">
		<table width="100%" border="1"  cellspacing="0" cellpadding="0" class="tbl_grid">
		  <tr class="bgcolor_02" height="25">
			<td width="4%" align="center" valign="top" >&nbsp;S.No</td>
			<td width="10%" align="center" valign="top" >Emp-Id</td>
			<td width="10%" align="center" valign="top" >Emp-Name</td>
				<td width="11%" align="center" valign="top" >Department</td>
				<td width="11%" align="center" valign="top" >Loan Date</td>
			<td width="14%" align="center" valign="top" >Loan&nbsp;Amount<br />
		    (installments)</td>
			<td width="10%" align="center" valign="top" >Interest </td>
			<td width="16%" align="center" valign="top" >Paid&nbsp;Amount<br />
		    (installments completed) </td>
			<td width="11%" align="center" valign="top" >Balance</td>
		<?php if($action!='print_list'){?>
			<td width="14%" align="center" valign="top" >Action </td>
			<?php }?>
		  </tr>
		  <?php 
		// array_print($issueslist);
		  if($no_rows>0) {
		  $i=1; 
		  $totloan=0;
		   $paidamount=0;
		   $balanam=0;
		   $intamt_t =0;  
		  foreach($issueslist as $eachrecord)
		  {
		  $totalamountwithintrest=($eachrecord['dud_amount']*$eachrecord['loan_instalments']);
		 $stafname= get_staffdetails($eachrecord['es_staffid'])
		  ?> 
		  <tr>
			<td class="narmal"><?php echo $i++; ?></td>
			<td class="narmal"><?php echo $eachrecord['es_staffid'];?></td>
			<td class="narmal"><?php echo $stafname['st_firstname'].'&nbsp;'.$stafname['st_lastname'];?></td>
				<td class="narmal"><?php echo deptname($stafname['st_department']);?></td>
				<td class="narmal"><?php echo func_date_conversion("Y-m-d","d/m/Y",$eachrecord['created_on']);?></td>
			<td class="narmal"><?php echo  $_SESSION['eschools']['currency'].'&nbsp;'.$eachrecord['loan_amount']."(".$eachrecord['loan_instalments'].")";
			
			$totloan+=$eachrecord['loan_amount'];
			?></td>
			<td class="narmal"><?php 
			$intamt = ($eachrecord['loan_amount']*$eachrecord['loan_intrestrate'])/100;
			echo $_SESSION['eschools']['currency'].'&nbsp;'.number_format($intamt, 2, '.', '').'&nbsp;'." [".$eachrecord['loan_intrestrate']."]%"; $intamt_t +=$intamt;?></td>
			<td class="narmal"><?php echo $_SESSION['eschools']['currency'].'&nbsp;'.number_format($eachrecord['amountpaidtillnow'], 2, '.', '')."(".$eachrecord['noofinstalmentscompleted'].")";
			$paidamount+=$eachrecord['amountpaidtillnow'];
			?></td>
			<td align="right" valign="middle" class="narmal"><?php 
			
			
			$balance=($totalamountwithintrest-$eachrecord['amountpaidtillnow']); 
 echo $_SESSION['eschools']['currency'].'&nbsp;'.number_format($balance, 2, '.', ''); 
 
 $balanam+=$balance;
	?></td>
	<?php if($action!='print_list'){?>
			<td align="left" valign="middle" class="adminfont">&nbsp;
	<a href="?pid=20&action=viewloan&es_issueloanid=<?php echo $eachrecord['es_issueloanid'];?>&start=<?php echo $start;?>" title="View"><img src="images/b_browse.png" width="16" height="16" hspace="2"  border="0"/></a></td><?php }?>
		  </tr>
		  <?php
			

		   } ?>
		   <tr height="30"><td colspan="5" align="right" valign="middle"><b>Total:</b></td>
		   <td><?php echo  $_SESSION['eschools']['currency'].'&nbsp;'.number_format($totloan, 2, '.', '');?></td>
		   <td align="left" valign="middle"><?php echo  $_SESSION['eschools']['currency'].'&nbsp;'.number_format($intamt_t, 2, '.', '');?></td>
		   <td><?php echo  $_SESSION['eschools']['currency'].'&nbsp;'.number_format($paidamount, 2, '.', '');?></td>
		   <td ><?php echo $_SESSION['eschools']['currency'].'&nbsp;'.number_format($balanam, 2, '.', '') ;?></td><td width="0%"></td>
		   </tr>
		   <tr><td colspan="10" height="30">&nbsp;</td></tr>
		   <tr height="28">
			<td colspan="2" align="left" valign="middle" class="narmal">Loan&nbsp;Amount:</td>

			<td align="left" valign="middle" class="adminfont" colspan="2"><?php echo  $_SESSION['eschools']['currency'].'&nbsp;'.number_format($totloan, 2, '.', '');?></td>
			 <td colspan="6" class="narmal"></td>
		  </tr>
		   <tr height="28">
			<td colspan="2" align="left" valign="middle" class="narmal">Interest&nbsp;Amount:</td>

			<td align="left" valign="middle" class="adminfont" colspan="2"><?php echo  $_SESSION['eschools']['currency'].'&nbsp;'.number_format($intamt_t, 2, '.', '');?></td>
			 <td colspan="6" class="narmal"></td>
		  </tr>
		  <tr height="28">
			<td colspan="2" align="left" valign="middle" class="narmal">Total&nbsp;Amount:</td>

			<td align="left" valign="middle" class="adminfont" colspan="2"><?php $tot_am=($intamt_t+$totloan); echo  $_SESSION['eschools']['currency'].'&nbsp;'.number_format($tot_am, 2, '.', '');?></td>
			 <td colspan="6" class="narmal"></td>
		  </tr>
		  <tr height="28">
			<td colspan="2" align="left" valign="middle" class="narmal">Paid&nbsp;Amount :</td>

			<td align="left" valign="middle" class="adminfont" colspan="2"><?php echo  $_SESSION['eschools']['currency'].'&nbsp;'.number_format($paidamount, 2, '.', '');?></td>
		<td colspan="6" class="narmal"></td>
		  </tr>
		  <tr height="28">
		<td colspan="2" align="left" valign="middle" class="narmal">Balance :</td>

			<td align="left" valign="middle" class="adminfont" colspan="2"><?php echo $_SESSION['eschools']['currency'].'&nbsp;'.number_format($balanam, 2, '.', '') ;?></td>
				<td colspan="6" class="narmal"></td>
		  </tr>
		  <tr height="28">
			<td colspan="10" class="narmal" align="center"><?php paginateexte($start, $q_limit, $no_rows, 'action='.$action);  ?></td>
		  </tr>
		  <?php if($action!='print_list'){?>
		  <tr height="28">
			<td colspan="10" class="narmal" align="center"><input name="Submit" type="button" onclick="newWindowOpen ('?pid=20&action=print_list<?php  echo $adminlisturl;?>');" class="bgcolor_02" value="Print" style="cursor:pointer;"/></td>
		  </tr>
		   <?php }} else { ?>
		  <tr>
			<td colspan="10" align="center" class="narmal"> No Records Found </td>
		  </tr>
		   <?php } ?>
		  <tr>
			<td colspan="10">&nbsp;</td>
		  </tr>
		</table>
		</td>		
		<td width="1" class="bgcolor_02"></td>
	  </tr>	  
	  <tr>
		<td height="1" colspan="3" class="bgcolor_02"></td>
	  </tr>
	</table>
<?php	
	}?>
	<?php
	
if ($action=='viewloan' || $action=='print_loan'){	
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
  </tr>
	<tr><td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">View Details</span></td></tr>
	  <tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="center" valign="top">
	
		<table width="95%" border="0" cellspacing="2" cellpadding="0">
		
		  <tr>
			<td width="22%">&nbsp;</td>
			<td width="1%">&nbsp;</td>
			<td width="25%">&nbsp;</td>
			<td width="1%">&nbsp;</td>
			<td width="13%">&nbsp;</td>
			<td width="1%">&nbsp;</td>
			<td width="37%">&nbsp;</td>
		  </tr>
		 <?php $staffdetail= get_staffdetails($viewloandetails['es_staffid']);?>
		
		  <tr>
		    <td align="left"  class="narmal">Employee ID</td>
		    <td align="left">:</td>
		    <td align="left" class="narmal"><?php echo $viewloandetails['es_staffid']; ?></td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>
		  <tr>
		    <td align="left"  class="narmal">Employee Name </td>
		    <td align="left">:</td>
		    <td align="left" class="narmal"><?php echo $staffdetail['st_firstname']; ?></td>
		    <td align="left">&nbsp;</td>
		    <td align="left"  class="narmal">Department</td>
		    <td align="left">:</td>
		    <td align="left"><span class="narmal"><?php echo deptname($staffdetail['st_department']);?></span></td>
	      </tr>
		  <tr>
		    <td align="left"  class="narmal">Post</td>
		    <td align="left">:</td>
		    <td align="left" class="narmal"><?php echo postname($staffdetail[st_post]);?></td>
		    <td align="left">&nbsp;</td>
		    <td align="left" class="narmal">E-mail</td>
		    <td align="left">:</td>
		    <td align="left" class="narmal"><?php echo $staffdetail['st_email']; ?></td>
	      </tr>
		  <tr>
		    <td align="left" class="narmal">Basic Salary </td>
		    <td align="left">:</td>
		    <td align="left" class="narmal"><?php echo $_SESSION['eschools']['currency'].number_format($staffdetail['st_basic'], 2, '.', '');?></td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>
		  
		  <tr>
		    <td align="left" class="adminfont"> Loan Type </td>
		    <td align="left">:</td>
		    <td align="left" colspan="5"><?php echo ucfirst($viewloandetails['loan_name']); ?></td>
	      </tr>
		 
		  <tr>
		    <td align="left" class="narmal">Type</td>
		    <td align="left">:</td>
		    <td align="left" class="narmal"><?php echo $viewloandetails['loan_type']; ?></td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>
		  <tr>
		    <td align="left" class="narmal">Max Limit </td>
		    <td align="left">:</td>
		    <td align="left" class="narmal"><?php echo $viewloandetails['loan_maxlimit']; ?></td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>
		  
		  <tr>
		    <td align="left" class="narmal">Loan Amount</td>
		    <td align="left">:</td>
		    <td align="left"><?php echo $viewloandetails['loan_amount']; ?></td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>
		 
		  
		 
		  <tr>
		    <td align="left" class="narmal">Interest Rate </td>
		    <td align="left">:</td>
		    <td align="left" colspan="5" class="narmal"><?php echo $viewloandetails['loan_intrestrate']; ?> %</td>
	      </tr>
		  <tr>
		    <td align="left" class="admin">Paid Installaments </td>
		    <td align="left">:</td>
		    <td align="left" colspan="5" class="narmal"></td>
	      </tr>
		  <tr>
		    
		    <td align="left" colspan="7" class="narmal"><table width="96%" border="0" cellspacing="0" cellpadding="0">
              <tr  class="bgcolor_02">
                <td width="15%" class="narmal">SN0</td>
                <td width="18%" class="narmal">Amount</td>
                <td width="27%" align="center" valign="middle" class="narmal"><strong>Issued On</strong></td>
                <td width="40%" align="center" valign="middle" class="narmal"><strong>Paid Date</strong></td>
              </tr>
              <?php 
  $i=1;
  $tot=0;
  $bal=0;
  $totalamountwithintrest=($viewloandetails['dud_amount']*$viewloandetails['loan_instalments']);
  
  $sel_loanpayment="select * from  es_loanpayment where es_issueloanid=".$viewloandetails['es_issueloanid'];
  
  
 $lp_de= $db->getRows($sel_loanpayment);
  if(count($lp_de)>0){
  foreach($lp_de as $eachpay){
    $online_sql="select * from es_issueloan where es_issueloanid=".$eachpay['es_issueloanid'];
 $online_row=$db->getRow($online_sql);
 
 ?>
              <tr>
                <td class="narmal"><?php echo $i; ?></td>
                <td class="narmal"><?php  echo $_SESSION['eschools']['currency']. number_format($eachpay['inst_amount'], 2, '.', ''); ?></td>
                <td align="center" valign="middle" class="narmal"><?php echo func_date_conversion("Y-m-d","d/m/Y",$online_row['created_on']);?></td>
                <td align="center" valign="middle" class="narmal"><?php echo func_date_conversion("Y-m-d","d/m/Y",$eachpay['onmonth']);?></td>
              </tr>
              <?php $tot+=$eachpay['inst_amount'];$i++;}
  }
  ?>
              <tr>
                <td colspan="4">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="4"  align="left"><table width="96%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="18%" align="left" valign="middle"><strong>Amount Paid</strong></td>
                      <td width="0%" align="left" valign="middle">:</td>
                      <td width="82%" align="left" valign="middle"><?php echo $_SESSION['eschools']['currency'].number_format($tot,2, '.', '');?></td>
                    </tr>
                    <tr>
                      <td align="left" valign="middle"><strong>Balance</strong></td>
                      <td align="left" valign="middle">:</td>
                      <td align="left" valign="middle"><strong><font color="#AA1731">
                        <?php 
	$bal=($totalamountwithintrest-$tot);echo $_SESSION['eschools']['currency'].number_format($bal,2, '.', '');?>
                      </font></strong></td>
                    </tr>
                </table></td>
              </tr>
            </table></td>
		  </tr>
		  <?php if($action!='print_loan'){?>
		  <tr>
		    <td align="left" class="admin" height="30"></td>
		    <td align="left"></td>
			<td align="left"></td>
		    <td align="left" colspan="4" class="narmal" valign="middle"><a href="?pid=20&action=loanissueslist&start=<?php echo $start;?>" class="bgcolor_02" style="text-decoration:none; padding:3px;">Back</a>&nbsp;&nbsp;<input name="Submit" type="button" onclick="newWindowOpen ('?pid=20&action=print_loan&es_issueloanid=<?php  echo $es_issueloanid;?>');" class="bgcolor_02" value="Print" style="cursor:pointer;"/></td>
	      </tr>
		  <?php }?>
		</table>
	
		</td>		
		<td width="1" class="bgcolor_02"></td>
	  </tr>	  
	  <tr>
		<td height="1" colspan="3" class="bgcolor_02"></td>
  </tr>
</table>
<?php	
	}
?>
	