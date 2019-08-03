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

/** Completed checking Browser.. **/
/************ Get List of Districts ***********/
		function getsubjects(countryid,selval)
		{   
		    
			url="?pid=55&action=getstaff_payslip&es_departmentsid="+countryid+"&selval="+selval;
			url=url+"&sid="+Math.random();
			
			xmlHttp1=GetXmlHttpObject(countryChanged);
			xmlHttp1.open("GET", url, true);
			xmlHttp1.send(null);
		}
		function countryChanged()
		{
			if (xmlHttp1.readyState==4 || xmlHttp1.readyState=="complete")
			{
				document.getElementById("subjectselectbox").innerHTML=xmlHttp1.responseText
			}
		}
		
		function getallsubjects(countryid,getselected)
		{   
			
			url="?pid=55&action=getstaff_payslip&cid="+countryid+"&selval="+getselected;
			url=url+"&sid="+Math.random();
			xmlHttp=GetXmlHttpObject(countryChanged2);
			xmlHttp.open("GET", url, true);
			xmlHttp.send(null);
		}
		function countryChanged2()
		{
			if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
			{
				document.getElementById("subject2selectbox").innerHTML=xmlHttp.responseText
			}
		}
	
	
	
</script>
<?php 
/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
// Issueloan Details 
if ($action=='issueloan'){	
?>
<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
  </tr>
	<tr><td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Issue Loan</span></td></tr>
	  <tr>
	  
		<td width="1" class="bgcolor_02"></td>
		<td align="center" valign="top">
		
		<form method="post" action="" name="createloanform">
		<table width="95%" border="0" cellspacing="2" cellpadding="0">
		<tr><td colspan="7" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font></td></tr>
		 <tr>
			<td colspan="7" ><span class="style1">Note: </span>Please Issue one loan in a particular month</td>
		  </tr>
		  <tr>
			<td width="28%">&nbsp;</td>
			<td width="1%">&nbsp;</td>
			<td width="22%">&nbsp;</td>
			<td width="1%">&nbsp;</td>
			<td width="10%">&nbsp;</td>
			<td width="1%">&nbsp;</td>
			<td width="37%">&nbsp;</td>
		  </tr>
		  <tr>
		    <td align="left" class="adminfont">Select Employee </td>
		    <td align="left">:</td>
		    <td align="left" colspan="5">
			<select name="selectempnum" onchange="JavaScript:document.createloanform.submit();">
			<option value="">-Select-</option>
			<?php foreach($getstafflist as $eachstaff) { ?>
			<option <?php if($selectempnum==$eachstaff[es_staffid]) { echo "selected='selected'"; } ?> value="<?php echo $eachstaff[es_staffid] ;?>"><?php echo $eachstaff[st_firstname]." ".$eachstaff[st_lastname] ;?>[<?php echo $eachstaff[es_staffid];?>]</option>
			<?php } ?>
			</select>&nbsp;<font color="#FF0000"><b>*</b></font></td>
	      </tr>
		  <?php if(isset($selectempnum) && $selectempnum!="")
			{?>
		  <tr>
		    <td align="left"  class="narmal">Employee ID</td>
		    <td align="left">:</td>
		    <td align="left" class="narmal"><?php echo $dispstaffdetails['es_staffid'];?></td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>
		  <tr>
		    <td align="left"  class="narmal">Employee Name </td>
		    <td align="left">:</td>
		    <td align="left" class="narmal"><?php echo $dispstaffdetails['st_firstname']." ".$dispstaffdetails['st_lastname'];?></td>
		    <td align="left">&nbsp;</td>
		    <td align="left"  class="narmal">Department</td>
		    <td align="left">:</td>
		    <td align="left"><span class="narmal"><?php echo deptname($dispstaffdetails['st_department']);?></span></td>
	      </tr>
		  <tr>
		    <td align="left"  class="narmal">Post</td>
		    <td align="left">:</td>
		    <td align="left" class="narmal"><?php echo postname($dispstaffdetails[st_post]);?></td>
		    <td align="left">&nbsp;</td>
		    <td align="left" class="narmal">E-mail</td>
		    <td align="left">:</td>
		    <td align="left" class="narmal"><?php echo $dispstaffdetails[st_email];?></td>
	      </tr>
		  <tr>
		    <td align="left" class="narmal">Basic Salary </td>
		    <td align="left">:</td>
		    <td align="left" class="narmal"><?php echo $_SESSION['eschools']['currency'] ?>&nbsp;<?php echo number_format($dispstaffdetails['st_basic'], 2, '.', '');?><input type="hidden" name="basicsalary" value="<?php echo $dispstaffdetails['st_basic'];?>" /></td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>
		  <tr>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>
		 <tr>
		    <td align="left" class="adminfont">Select Loan Type </td>
		    <td align="left">:</td>
		    <td align="left" colspan="5" class="narmal"><select name="selectloantype" onchange="JavaScript:document.createloanform.submit();">
			<option value="">-Select-</option>
			<?php foreach($disploandetails as $eachloan) { ?>
			<option <?php if($dispcompdetails['es_loanmasterid']==$eachloan[es_loanmasterid]) { ?>selected="selected"<?php } ?> value="<?php echo $eachloan[es_loanmasterid];?>"><?php echo $eachloan[loan_name];?></option>
			<?php } ?>			
			</select>&nbsp;<font color="#FF0000"><b>*</b></font></td>
	      </tr>
		  <?php 

			
		  if(isset($selectloantype) && $selectloantype!='')
			{
			$noofloanstakenbyhim = "SELECT * FROM `es_issueloan` WHERE `es_staffid`=".$dispstaffdetails['es_staffid']." AND `es_loanmasterid`='".$dispcompdetails['es_loanmasterid']."' AND loan_instalments<noofinstalmentscompleted ";
			if(sqlnumber($noofloanstakenbyhim)==0){
		  ?>
		  <tr>
		    <td align="left" class="narmal">Type</td>
		    <td align="left">:</td>
		    <td align="left" class="narmal"><?php echo $dispcompdetails['loan_type']; ?></td>
			<input type="hidden" name="checkloantype" value="<?php echo $dispcompdetails['loan_type']; ?>" >
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>
		  <tr>
		    <td align="left" class="narmal">Max Limit </td>
		    <td align="left">:</td>
		    <td align="left" class="narmal"><?php echo $_SESSION['eschools']['currency']?>&nbsp;<?php echo number_format($dispcompdetails['loan_maxlimit'], 2, '.', ''); ?><input type="hidden" name="loanmaxlimit" value="<?php echo $dispcompdetails['loan_maxlimit']; ?>" /></td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>
		  <tr>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>
		  <tr>
		    <td align="left" class="narmal">Loan Amount</td>
		    <td align="left">:</td>
		    <td colspan="5" align="left" class="narmal"><?php echo $_SESSION['eschools']['currency'];?> <input type="text" name="loantotamount" /><font color="#FF0000"><b>*</b></font></td>
	      </tr>
		  
		  <?php  if ($dispcompdetails['loan_type']=="Refundable"){?>
		  <tr>
		    <td align="left" class="narmal">Interest Rate </td>
		    <td align="left">:</td>
		    <td align="left" colspan="5" class="narmal"><?php echo $dispcompdetails['loan_intrestrate']; ?><input type="hidden" name="loanintrestrate" value="<?php echo $dispcompdetails['loan_intrestrate']; ?>" />
	        %</td>
	      </tr>
		  <tr>
		    <td align="left" class="narmal">No of Installment's</td>
		    <td align="left">:</td>
		    <td colspan="5" align="left" class="narmal"><input type="text" name="totnoofinstalments" /><font color="#FF0000"><b>*</b></font></td>
	      </tr>
		   <tr>
		    <td align="left" class="narmal">Date of Joining</td>
		    <td align="left">:</td>
		    <td align="left" class="narmal"><?php if($dispstaffdetails['st_dateofjoining']!=""){echo func_date_conversion("Y-m-d","d-m-Y",$dispstaffdetails['st_dateofjoining']);}?></td>
		    <td align="left" colspan="4"></td>
	      </tr>
		  
		  <tr>
		    <td align="left" class="narmal">Deduction  starts from</td>
		    <td align="left">:</td>
		    <td align="left" colspan="5" class="narmal"><input  name="dedmonth" value="<?php echo $dedmonth ?>"  type="text"size="14" onchange="return registrationvalid()"  id="dedmonth" readonly/>
		    <a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.createloanform.dedmonth);return false;" ><img name="popcal" align="absmiddle" src="<?php echo JS_PATH ?>/WeekPicker/calbtn.gif" width="34" height="22" border="0" alt="" /></a>&nbsp;
		    <iframe width=132 height=142 name="gToday:contrast:agenda.js" id="gToday:contrast:agenda.js" src="<?php echo JS_PATH ?>/DateRange/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe><font color="#FF0000"><b>*</b></font></td>
	      </tr>
		   <tr>
		    <td colspan="2" align="left" class="narmal"></td>
		    <td align="left" colspan="5" class="narmal"> <font  color="#FF0000">[Please select future date to deduct EMI from Salary.]</font></td>
	      </tr>
		  <tr>
		    <td align="left" class="narmal">Deduction Amount</td>
		    <td align="left">:</td>
		    <td align="left" colspan="5" class="narmal"><input readonly type="text" name="deductionamt" /><font color="#FF0000"><b>*</b></font>
	        (Per month) 
            <input type="button" name="generate" value="Generate" class="bgcolor_02" onclick="javascript:generatevalue()" style="cursor:pointer;"/></td>
	      </tr>
		    <tr>
		    <td colspan="2" align="left" class="narmal"></td>
		    <td align="left" colspan="5" class="narmal">Total Amount = Loan Amount + ((Loan Amount x Interest Rate) / 100)
<br />Deduction Amount = (Total Amount / Installment)</td>
	      </tr>
		  
		  
		  <?php }?>
		  
		  <tr>
		   
		  
		    <td colspan="7" align="left">		
		     <table width="534" >
					 
                  <tr>
					<td  align="left" class="narmal" colspan="2">Voucher&nbsp;Type&nbsp;:</td>
					<td width="317" colspan="3"  align="left" class="narmal">
						<select name="vocturetypesel" style="width:130px;">
						<option value="">--Select--</option>
						<?php 
						$voucherlistarr = voucher_finance();
						krsort($voucherlistarr);
						foreach($voucherlistarr as $eachvoucher) {	?>
						<option value="<?php echo $eachvoucher['es_voucherid']; ?>" <?php if ($vocturetypesel==$eachvoucher['es_voucherid']){                        echo 'selected'; } ?> ><?php echo $eachvoucher['voucher_type'];                        ?> ( <?php echo $eachvoucher['voucher_mode']; ?> )</option>   
						<?php } ?></select>	<font color="#FF0000"><b>*</b></font>				</td>
				</tr>
				<tr>
					<td align="left" class="narmal" colspan="2">Ledger&nbsp;Type&nbsp;: </td>
					<td align="left" colspan="3" class="narmal">
					    <select name="es_ledger" style="width:130px;">
						<option value="">--Select--</option>
						<?php 
						$ledgerlistarr = ledger_finance();
						foreach($ledgerlistarr as $eachledger) { 
						?>
						<option value="<?php echo $eachledger['lg_name']; ?>" <?php if($es_ledger==$eachledger['lg_name']) { echo 'selected'; } elseif($eachledger['lg_name']=='Staff Salary'){echo 'selected';} ?>><?php echo $eachledger['lg_name']; ?>						                        </option>
						<?php } ?>
						</select>  <font color="#FF0000"><b>*</b></font></td>
				</tr>
				
				
				
				<tr>
<script type="text/javascript" >
function showAvatar()
		{
			var ch = document.createloanform.es_paymentmode.value;
			if (ch=='cash' || ch==''){
				document.getElementById("patiddivdisp").style.display="none";
			}else{
			document.getElementById("patiddivdisp").style.display="block";
			}
		}		  
</script>
					<td align="left" class="narmal" colspan="2">Payment&nbsp;Mode&nbsp;:</td>
					<td align="left" class="narmal" colspan="3"> 
					   <select name="es_paymentmode" onchange="Javascript:showAvatar();" style="width:130px;">
					   <option value="">--Select--</option>
					   <option value="cash" <?php if($es_paymentmode=='cash') { echo "selected='selected'"; } ?>>Cash</option>
					   <option value="cheque" <?php if($es_paymentmode=='cheque') { echo "selected='selected'"; } ?>>Cheque</option>
					   <option value="dd" <?php if($es_paymentmode=='DD') { echo "selected='selected'"; } ?>>DD</option>                        
					   </select> <font color="#FF0000"><b>*</b></font></td>
				</tr>
				<tr>
					<td colspan="5" align="center">		
						<div  id="patiddivdisp" style="display:none;" >
						<table  border="1" cellspacing="0" class="tbl_grid" width="100%" cellpadding="3">
						    					
							<tr>
								<td align="left" class="bgcolor_02" colspan="3">Bank Details </td>
							</tr>
							
							<tr>
								<td align="left"   width="48%" class="narmal" >Bank Name </td>
								<td align="center"  width="4%">:</td>
								<td align="left"  width="48%"><input type="text" name="es_bank_name" value="<?php echo $es_bank_name;?>" /></td>
							</tr>
							<tr>
								<td align="left"  class="narmal"> Account Number</td>
								<td align="center">:</td>
								<td align="left" ><input type="text" name="es_bankacc" value="<?php echo $es_bankacc;?>" /><font color="#FF0000">                                <b>*</b></font></td>
							</tr>
							<tr>
								<td align="left" class="narmal">Cheque / DD Number </td>
								<td align="center">:</td>
								<td align="left"><input type="text" name="es_checkno" value="<?php echo $es_checkno;?>" /><font color="#FF0000">                                <b>*</b></font></td>
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
						</div>					</td>
				</tr>
				<tr>
					<td align="left" class="narmal" colspan="2">Narration</td>
					<td align="left" colspan="3"><textarea name="es_narration" rows="3" cols="50"></textarea></td>
				</tr>
				<?php if($es_paymentmode!="" && $es_paymentmode!="cash"){ ?><script type="text/javascript">showAvatar();</script><?php } ?>
				<tr>
					<td align="left" class="narmal" colspan="2"></td>
					<td align="left" colspan="3"></td>
				</tr>
			  </table>			  </td>
		  </tr>
		  
		  <tr>
		    <td colspan="7" align="center">
			<?php if(in_array('11_19',$admin_permissions)){?>

	<input type="submit" name="saveallowance" value="Save" class="bgcolor_02" style="cursor:pointer;"/>
			<input type="reset" name="reset" value="Reset" class="bgcolor_02" style="cursor:pointer;"/>
			<!--<input type="button" name="back" value="Back" onclick="javascript:history.back();" class="bgcolor_02" style="cursor:pointer;" />-->

<?php }?>			</td>
	      </tr>
		  <?php }
		  else
		  {
		  echo "<span class='error_message'>This Type of Loan is Issued to this Employee previously</span>"; 
		  } } } ?>
		  <tr>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
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
<?php	
	}
// End of Issue Loan


// Employee Details
	if($action=='employeedetails')
	{	
?>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
         <td height="3" colspan="3"></td>
	 </tr>
		<tr>
		    <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Employee/Details</span></td>
		</tr>
		<tr>
		    <td width="1" class="bgcolor_02"></td>
		    <td align="center" valign="top">
		    Content
		    </td>		
		    <td width="1" class="bgcolor_02"></td>
		</tr>	  
		<tr>
		    <td height="1" colspan="3" class="bgcolor_02"></td>
		</tr>
	</table>
<?php	
	}
//End of Employee Details
// Employee wise pay slip Details
	if($action=='employeewisepayslip')
	{	
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
         <td height="3" colspan="3"></td>
	 </tr>
	  <tr>
		<td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Employee Payslip</span></td>
	  </tr>
	  <tr>
		<td width="1" class="bgcolor_02"></td>
		<td width="1212" align="center" valign="top">
		<form method="post" action="" name="searchemp">
		<table width="95%" border="0" cellspacing="2" cellpadding="0">
		<tr class="narmal">
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
	      </tr>
		  <tr class="narmal">
			<td align="left" class="narmal" width="18%">Pay Slip for </td>
			<td align="left" class="narmal" width="3%">Year            </td>
			<td align="left" class="narmal" width="24%"><select name="selyear">
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
            </select></td>
			<td align="left" class="narmal" width="5%">Month</td>
			<td align="left" class="narmal" width="50%"><select name="selmonth" >
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
		  </tr>
		  <tr class="narmal">
		    <td align="left" class="narmal">Department&nbsp;:</td>
		    <td align="left" class="narmal" colspan="2">
					<select name="st_department" onChange="getsubjects(this.value,'');" style=" width:150px;">
							<option value="">-Select-</option>
							<?php foreach($getdeptlist as $eachrecord1) {  ?>
							<option value="<?php echo $eachrecord1["es_departmentsid"];?>" <?php if(isset($st_department) && $st_department==$eachrecord1["es_departmentsid"]){ echo "selected='selected'";}?>  ><?php echo $eachrecord1["es_deptname"];?></option>
						<?php } ?>
			  </select>&nbsp;<font color="#FF0000"><b>*</b></font></font>			</td>
		    <td align="left" class="narmal">&nbsp;</td>
		    <td align="left" class="narmal">&nbsp;</td>
	      </tr>
		  
		  <tr class="narmal">
		    <td align="left" class="narmal">Employee&nbsp;Name&nbsp;:</td>
		    <td align="left" class="narmal" colspan="4" id="subjectselectbox"><select name="selempid" style=" width:200px;"><option value="">- Select -</option></select>&nbsp;<font color="#FF0000">&nbsp;*</font></td>
			<?php if($st_department!=""){
					
					 ?>
<script type="text/javascript">
getsubjects('<?php echo $st_department; ?>','<?php echo $selempid;?>');
</script>
<?php } ?>
		    
	      </tr>
		  <tr><td colspan="6" align="left">
		     <table width="524" >
					 
                  <tr>
					<td  align="left" class="narmal" colspan="2">Voucher Type&nbsp;:</td>
					<td width="317" colspan="3"  align="left" class="narmal">
						<select name="vocturetypesel" style="width:130px;">
						<option value="">--Select--</option>
						<?php 
						$voucherlistarr = voucher_finance();
						krsort($voucherlistarr);
						foreach($voucherlistarr as $eachvoucher) {	?>
						<option value="<?php echo $eachvoucher['es_voucherid']; ?>" <?php if ($vocturetypesel==$eachvoucher['es_voucherid']){                        echo 'selected'; } ?> ><?php echo $eachvoucher['voucher_type'];                        ?> ( <?php echo $eachvoucher['voucher_mode']; ?> )</option>   
						<?php } ?></select>
						<font color="#FF0000">*</font> </td>
				</tr>
				<tr>
					<td align="left" class="narmal" colspan="2">Ledger Type&nbsp;: </td>
				  <td align="left" colspan="3">
					 
					   
					    <select name="es_ledger" style="width:130px;">
                          <option value="">--Select--</option>
                          <?php 
						$ledgerlistarr = ledger_finance();
						foreach($ledgerlistarr as $eachledger) { 
						?>
                          <option value="<?php echo $eachledger['lg_name']; ?>" <?php if($es_ledger==$eachledger['lg_name']) { echo 'selected'; } elseif($eachledger['lg_name']=='Staff Salary'){echo 'selected';} ?>><?php echo $eachledger['lg_name']; ?> </option>
                          <?php } ?>
                        </select>
			      <font color="#FF0000">*</font></td>
				</tr>
				<tr>
<script type="text/javascript" >
function showAvatar()
		{
			var ch = document.searchemp.es_paymentmode.value;
			if (ch=='cash'|| ch==''){
				document.getElementById("patiddivdisp").style.display="none";
			}else{
			document.getElementById("patiddivdisp").style.display="block";
			}
		}		  
</script>
					<td align="left" class="narmal" colspan="2">Payment&nbsp;Mode&nbsp;:</td>
				  <td align="left" class="narmal" colspan="3"> 
					<?php 
		if( $selempid!="" && count($errormessage)==0 )
		{ 
		?>
		
					   <select name="es_paymentmode" onchange="Javascript:showAvatar();" style="width:130px;" disabled="disabled">
                         <option value="">--Select--</option>
                         <option value="cash" <?php if($es_paymentmode=='cash') { echo "selected='selected'"; } ?>>Cash</option>
                         <option value="cheque" <?php if($es_paymentmode=='cheque') { echo "selected='selected'"; } ?>>Cheque</option>
                         <option value="dd" <?php if($es_paymentmode=='DD') { echo "selected='selected'"; } ?>>DD</option>
                       </select>
		<?php } else {?> <select name="es_paymentmode" onchange="Javascript:showAvatar();" style="width:130px;" >
                         <option value="">--Select--</option>
                         <option value="cash" <?php if($es_paymentmode=='cash') { echo "selected='selected'"; } ?>>Cash</option>
                         <option value="cheque" <?php if($es_paymentmode=='cheque') { echo "selected='selected'"; } ?>>Cheque</option>
                         <option value="dd" <?php if($es_paymentmode=='DD') { echo "selected='selected'"; } ?>>DD</option>
                       </select><?php } ?>
		
					   <font color="#FF0000">*</font></td>
				</tr>
				<tr>
					<td colspan="5" align="center">	
								<?php 
		if( $selempid!="" && $es_paymentmode!='cash'  && count($errormessage)==0  )
		{ 
		?> 

						<table  border="1" cellspacing="0" class="tbl_grid" width="100%" cellpadding="3">
						    					
							<tr>
								<td align="left" class="bgcolor_02" colspan="3">Bank Details </td>
							</tr>
							
							<tr>
								<td align="left"   width="48%" class="narmal" >Bank Name </td>
								<td align="center"  width="4%">:</td> 
								<td align="left"  width="48%"><input type="text" name="es_bank_name" value="<?php echo $es_bank_name;?>" disabled="disabled" /></td>
							</tr>
							<tr>
								<td align="left"  class="narmal">Account Number</td>
								<td align="center">:</td>
								<td align="left" ><input type="text" name="es_bankacc" value="<?php echo $es_bankacc;?>" disabled="disabled"  /><font color="#FF0000">                                <b>*</b></font></td>
							</tr>
							<tr>
								<td align="left" class="narmal">Cheque / DD Number </td>
								<td align="center">:</td>
								<td align="left"><input type="text" name="es_checkno" value="<?php echo $es_checkno;?>" disabled="disabled"  /><font color="#FF0000">                                <b>*</b></font></td>
							</tr>
							<tr>
								<td align="left" class="narmal">Teller Number </td>
								<td align="center">:</td>
								<td align="left"><input type="text" name="es_teller_number" value="<?php echo $es_teller_number;?>" disabled="disabled"  /></td>
							</tr>
							<tr>
								<td align="left" class="narmal">Pin </td>
								<td align="center">:</td>
								<td align="left"><input type="text" name="es_bank_pin" value="<?php echo $es_bank_pin;?>" disabled="disabled"  /></td>
							</tr>
						</table>	
						
		<?php } else { ?>
						<div  id="patiddivdisp" style="display:none;" >
						<table  border="1" cellspacing="0" class="tbl_grid" width="100%" cellpadding="3">
						    					
							<tr>
								<td align="left" class="bgcolor_02" colspan="3">Bank Details </td>
							</tr>
							
							<tr>
								<td align="left"   width="48%" class="narmal" >Bank Name </td>
								<td align="center"  width="4%">:</td>
								<td align="left"  width="48%"><input type="text" name="es_bank_name" value="<?php echo $es_bank_name;?>" /></td>
							</tr>
							<tr>
								<td align="left"  class="narmal">Account Number</td>
								<td align="center">:</td>
								<td align="left" ><input type="text" name="es_bankacc" value="<?php echo $es_bankacc;?>" /><font color="#FF0000">                                <b>*</b></font></td>
							</tr>
							<tr>
								<td align="left" class="narmal">Cheque / DD Number </td>
								<td align="center">:</td>
								<td align="left"><input type="text" name="es_checkno" value="<?php echo $es_checkno;?>" /><font color="#FF0000">                                <b>*</b></font></td>
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
						</div>		
						<?php } ?>			</td>
				</tr>
									<?php 
		if( $selempid!="" && count($errormessage)==0 )
		{ 
		?> <tr>
					<td align="left" class="narmal" colspan="2">Narration</td>
					<td align="left" colspan="3"><textarea name="es_narration" rows="3" cols="50"><?php echo $es_narration;  ?></textarea></td>
				</tr>
				
				<?php } else { ?>
				<tr>
					<td align="left" class="narmal" colspan="2">Narration</td>
					<td align="left" colspan="3"><textarea name="es_narration" rows="3" cols="50"></textarea></td>
				</tr>
				<?php } ?>
			  </table>
			  </td>
		  </tr>
		  			<?php 
		if( $selempid!="" && count($errormessage)==0 )
		{  } else {
		?>
		  <tr>
	        <td  colspan="5" align="center">
			<?php if(in_array('11_22',$admin_permissions)){?><input type="submit" name="searchuser" value="Submit" class="bgcolor_02" style="cursor:pointer"/><?php }?>
		    </td>
		  </tr>
		  <?php } ?>
		</table>
		</form>
		<?php 
		if($searchuser=='Submit' && $selempid!="" && count($errormessage)==0)
		{ 
		?>
		<table width="95%" border="0" cellspacing="2" cellpadding="0">
		  <tr>
			<td align="left" class="narmal" width="19%">Employee Id </td>
			<td align="left" class="narmal" width="1%">:</td>
			<td align="left" class="narmal" width="28%"><?php echo $staffdetails[es_staffid]; ?></td>
			<td width="52%" rowspan="6" align="left" class="narmal">
			   <?php if($staffdetails['image']=="") { 
			  
			   ?>
			   <img src="/office_admin/templates/images/student_photos/userphoto.gif" /> 
			   <?php } else {
			    $image = "images/staff/". $staffdetails['image'];
			    echo displayimage($image, "135" ); } ?>			</td>
		  </tr>
		  <tr>
		    <td align="left" class="narmal">Employee&nbsp;Name </td>
		    <td align="left" class="narmal">:</td>
		    <td align="left" class="narmal"><?php echo $staffdetails[st_firstname]." ".$staffdetails[st_lastname]; ?></td>
	      </tr>
		  <tr>
		    <td align="left" class="narmal">Basic Salary </td>
		    <td align="left" class="narmal">:</td>
		    <td align="left" class="adminfont">
			  <?php echo $_SESSION['eschools']['currency']?>&nbsp;<?php echo number_format($staffdetails[st_basic], 2, '.', ''); ?>			</td>
	      </tr>
		  <tr>
		    <td align="left" class="narmal">Date of Joining </td>
		    <td align="left" class="narmal">:</td>
		    <td align="left" class="narmal"><?php echo displaydate($staffdetails[st_dateofjoining]); ?></td>
	      </tr>
		  <tr>
		    <td align="left" class="narmal">Pay Slip for the month of</td>
		    <td align="left" class="narmal">:</td>
		    <td align="left" class="narmal"><?php echo date('F',mktime(0, 0, 0, $selmonth, 1, 2000))." ".$selyear; ?></td>
	      </tr>
		  <tr>
		    <td align="left" class="narmal">Department</td>
		    <td align="left" class="narmal">:</td>
		    <td align="left" class="narmal"><?php echo deptname($staffdetails[st_department]); ?></td>
	      </tr>
		  <tr>
		    <td align="left" class="narmal">Post</td>
		    <td align="left" class="narmal">:</td>
		    <td align="left" class="narmal"><?php echo postname($staffdetails[st_post]); ?></td>
	      </tr>
		  <tr>
		    <td align="left" class="narmal">&nbsp;</td>
		    <td align="left" class="narmal">&nbsp;</td>
		    <td align="left" class="narmal">&nbsp;</td>
		    <td align="left" class="narmal">&nbsp;</td>
	      </tr>
		</table>
		<br />		 
		<table width="100%" border="1" cellspacing="0" cellpadding="0" class="tbl_grid">
		  <tr>
		    <td height="35" colspan="3" align="left" class="adminfont">&nbsp;&nbsp;Allowance</td>
	      </tr>
		  <tr class="bgcolor_02" height="22">
		    <td width="6%" align="left" class="admin">&nbsp;S.No</td>
			<td width="65%" height="25" align="left" class="admin">Allowance Type</td>
			<td width="29%" align="left" class="admin">Amount</td>			
		  </tr>
		  <?php 
		  $tot_allowances = 0;
		  $tot_deductions = 0;	
		  $individualtot = 0;	  
		  $getallalwdetails = getamultiassoc("SELECT * FROM `es_allowencemaster` WHERE `alw_post` = '".$staffdetails[st_post]."' 
		                                                           AND '".$selyear."-".$selmonth."-01' BETWEEN `alw_fromdate` AND `alw_todate`");
		  if(count($getallalwdetails)>0)
		  {
		  $i=1;
		  foreach($getallalwdetails as $eachalowance)
		  {
		  ?>
		  <tr>
		    <td align="left" class="narmal">&nbsp;<?php echo $i; ?></td>
		    <td align="left" class="narmal"><?php echo $eachalowance[alw_type]; ?></td>
		    <td align="left" class="adminfont"><?php
			if($eachalowance['alw_amt_type']=='Percentage')
			{
			$balance = ($staffdetails[st_basic]*$eachalowance[alw_amount])/100;
			echo $_SESSION['eschools']['currency'].number_format($balance, 2, '.', '');
			$tot_allowances = $tot_allowances+$balance;
			$individualtot = $individualtot+$balance;
			}
			else
			{			
			 echo $_SESSION['eschools']['currency'].number_format($eachalowance[alw_amount], 2, '.', '');
			 $tot_allowances = $tot_allowances+$eachalowance[alw_amount];
			 $individualtot = $individualtot+$eachalowance[alw_amount];
			 }			
			 ?></td>		   
	      </tr>
		  <?php
		  $i++;
		   }?>
		     <tr>
		    <td align="left" class="narmal"></td>
		    <td align="right" class="narmal">Total : &nbsp;</td>
		    <td align="left" class="adminfont"><?php echo $_SESSION['eschools']['currency'].number_format($individualtot, 2, '.', '');
			$individualtot = 0;
			?></td>		   
	      </tr>
		    <?php }else { ?>		  
		  <tr>
		    <td colspan="3" align="center" class="narmal">No Allowance</td>
	      </tr>		  
		  <?php } ?>
		  <tr>
		    <td colspan="3" align="center" ></td>
	      </tr>
		</table>		
			<br />		 
		<table width="100%" border="1" cellspacing="0" cellpadding="0" class="tbl_grid">
		  <tr>
		    <td height="35" colspan="3" align="left" class="adminfont">&nbsp;&nbsp;Deduction's</td>
	      </tr>
		  <tr class="bgcolor_02" height="22">
		    <td width="6%" align="left" class="admin">&nbsp;S.No</td>
			<td width="65%" height="25" align="left" class="admin">Deduction Type</td>
			<td width="29%" align="left" class="admin"> Amount</td>			
		  </tr>
		  <?php 
			  $getallalwdetails2 = getamultiassoc("SELECT * FROM `es_deductionmaster` WHERE `ded_post`='".$staffdetails[st_post]."' 
			                                            AND '". $selyear."-".$selmonth."-01' BETWEEN `ded_fromdate` AND `ded_todate`");
			  if(count($getallalwdetails2)>0)
			  {
			  $i=1;
			  foreach($getallalwdetails2 as $eachalowance)
			  {
		  ?>
		  <tr>
		    <td align="left" class="narmal">&nbsp;<?php echo $i; ?></td>
		    <td align="left" class="narmal"><?php echo $eachalowance[ded_type]; ?></td>
		    <td align="left" class="adminfont"><font color="#AA1731">-<?php
			if($eachalowance['ded_amt_type']=='Percentage')
			{
			$balance = ($staffdetails[st_basic]*$eachalowance[ded_amount])/100;
			echo $_SESSION['eschools']['currency'].number_format($balance, 2, '.', '');
			$tot_deductions = $tot_deductions+$balance;
			$individualtot = $individualtot+$balance;
			} 
			else
			{	
			 echo $_SESSION['eschools']['currency'].number_format($eachalowance[ded_amount], 2, '.', '');
			 $tot_deductions = $tot_deductions+$eachalowance[ded_amount];
			 $individualtot = $individualtot+$eachalowance[ded_amount];
			 } ?></font></td>		   
	      </tr>
		  <?php
		  $i++;
		   }?>
		     <tr>
		    <td align="left" class="narmal"></td>
		    <td align="right" class="narmal">Total : &nbsp;</td>
		    <td align="left" class="adminfont"><font color="#AA1731">-<?php echo $_SESSION['eschools']['currency'].number_format($individualtot, 								            2, '.', '');
			$individualtot = 0;
			?></font></td>		   
	      </tr>
		    <?php }else { ?>		  
		  <tr>
		    <td colspan="3" align="center" class="narmal">No Deduction's</td>
	      </tr>		  
		  <?php } ?>
		  <tr>
		    <td colspan="3" align="center" ></td>
	      </tr>
		</table>
		<br />
		<table width="100%" border="1" cellspacing="0" cellpadding="0" class="tbl_grid">
		  <tr>
		    <td height="35" colspan="3" align="left" class="adminfont">&nbsp;&nbsp;Tax </td>
	      </tr>
		  <tr class="bgcolor_02" height="22">
		    <td width="6%" align="left" class="admin">&nbsp;S.No</td>
			<td width="65%" height="25" align="left" class="admin">Tax Type</td>
			<td width="29%" align="left" class="admin"> Amount</td>			
		  </tr>
		  <?php 
	
		 $getalltaxes = getamultiassoc("SELECT * FROM `es_taxmaster` 
		                      WHERE '".$staffdetails['st_basic']."' <= `tax_to` AND '".$staffdetails['st_basic']."' >=`tax_from`  
		                      AND '". $selyear."-".$selmonth."-01' BETWEEN `tax_from_date` AND `tax_to_date`");
		   if(count($getalltaxes)>0)
		   {
		   $i=1;
		  foreach($getalltaxes as $eachalowance)
		  {
		  ?>
		  <tr>
		    <td align="left" class="narmal">&nbsp;<?php echo $i; ?></td>
		    <td align="left" class="narmal"><?php echo $eachalowance[tax_name]; ?></td>
		    <td align="left" class="adminfont"><font color="#AA1731">-<font color="#AA1731"><?php
			if($eachalowance['tax_percentage_type']=='percentage')
			{
			$balance = ($staffdetails[st_basic]*$eachalowance[tax_rate])/100;
			echo $_SESSION['eschools']['currency'].number_format($balance, 2, '.', '');
			$tot_deductions = $tot_deductions+$balance;
			$individualtot = $individualtot+$balance;
			}
			else
			{	
			 echo $_SESSION['eschools']['currency'].number_format($eachalowance[tax_rate], 2, '.', '');
			 $tot_deductions = $tot_deductions+$eachalowance[tax_rate];
			 $individualtot = $individualtot+$eachalowance[tax_rate];
			 } ?></font></font></td>		   
	      </tr>
		  <?php
		  $i++;
		   } ?>
		     <tr>
		    <td align="left" class="narmal"></td>
		    <td align="right" class="narmal">Total : &nbsp;</td>
		    <td align="left" class="adminfont"><font color="#AA1731">-<?php echo $_SESSION['eschools']['currency'].number_format($individualtot,            2, '.', '');
			$individualtot = 0;
			?></font></td>		   
	      </tr>
		    <?php }else { ?>		  
		  <tr>
		    <td colspan="3" align="center" class="narmal"> No Deductions's</td>
	      </tr>		 
		  <?php } ?>
		   <tr>
		    <td colspan="3" align="center" ></td>
	      </tr>		   
		</table>
		<br />
				<table width="100%" border="1" cellspacing="0" cellpadding="0" class="tbl_grid">
		  <tr>
		    <td height="35" colspan="5" align="left" class="adminfont">&nbsp;&nbsp;Loan </td>
	      </tr>
		  <tr class="bgcolor_02" height="22">
		    <td width="6%" align="left" class="admin">&nbsp;S.No</td>
			<td width="24%" height="25" align="left" class="admin">Loan Type</td>
			<td width="19%" align="left" class="admin">Loan Amount </td>
			<td width="22%" align="left" class="admin"># Installments Left </td>
			<td width="29%" align="left" class="admin"> Amount</td>			
		  </tr>
		  <?php 		  
			$exearr= "SELECT * FROM  es_loanmaster loan ,es_issueloan isue WHERE loan.es_loanmasterid = isue.es_loanmasterid AND isue.es_staffid            = ".$staffdetails['es_staffid']." AND loan.loan_type='Refundable' and isue.noofinstalmentscompleted<isue.loan_instalments 
			and   isue.deductionmonth<='".date('Y-m-d')."'";

		   $getallloandetails = getamultiassoc($exearr);
		   
		   if(count($getallloandetails)>0)
		   {
		   $i=1;
		   foreach($getallloandetails as $eachalowance)
		   {
		   $ded=0;
		   $loandetailsarr = "SELECT * FROM `es_loanmaster` WHERE `es_loanmasterid`=".$eachalowance[es_loanmasterid];
		   $loandetails = getarrayassoc($loandetailsarr);
		   //Updating Table for loans
		   if($selyear."-".$selmonth."-01"<date('Y-m-d'))
			 {
				$enterpaysql = "SELECT * FROM `es_payslipdetails` WHERE `pay_month`='".$selyear."-".$selmonth."-01' AND `staff_id`=".$selempid."                AND `es_issueloanid`=".$loandetails[es_loanmasterid];
				if(sqlnumber($enterpaysql)==0)
				{					
				$presentamt = $eachalowance[dud_amount]+$eachalowance[amountpaidtillnow];	
				$presentinst = 	$eachalowance[noofinstalmentscompleted]+1;
				
						$obj_loanpayment = new es_loanpayment();
						$obj_loanpayment->es_issueloanid = $eachalowance[es_issueloanid];
						$obj_loanpayment->inst_amount = $eachalowance[dud_amount];
						$obj_loanpayment->onmonth = $selyear."-".$selmonth."-01";
						
				 $ded=1;		
				}
			}	
			
		  ?>
		  <tr>
		    <td align="left" class="narmal">&nbsp;<?php echo $i; ?></td>
		    <td align="left" class="narmal"><?php echo $loandetails[loan_name]; ?></td>
		    <td align="left" class="narmal"><?php echo $eachalowance[loan_amount]; ?></td>
		    <td align="left" class="narmal"><?php echo $eachalowance[loan_instalments]-$eachalowance[noofinstalmentscompleted]-$ded; ?></td>
		    <td align="left" class="adminfont"><font color="#AA1731">-<font color="#AA1731"><?php echo $_SESSION['eschools']['currency'].             number_format($eachalowance[dud_amount], 2, '.', '');
			 $tot_deductions = $tot_deductions+$eachalowance[dud_amount];
			 $individualtot = $individualtot+$eachalowance[dud_amount];
			 ?></font></font>
			</td>		   
	      </tr>
		  <?php
		  $i++;
		   } ?>
		  <tr>
		    <td align="left" class="narmal"></td>
		    <td align="right" class="narmal">&nbsp;</td>
		    <td align="right" class="narmal">&nbsp;</td>
		    <td align="right" class="narmal">Total : &nbsp;</td>
		    <td align="left" class="adminfont"><font color="#AA1731">-<?php echo $_SESSION['eschools']['currency'].number_format($individualtot,             2, '.', '');
			 $individualtot = 0;
			 ?></font>
			</td>		   
	      </tr>
		    <?php }else { ?>		  
		  <tr>
		    <td colspan="5" align="center" class="narmal"> No Loan</td>
	      </tr>		 
		  <?php } ?>
		   <tr>
		    <td colspan="5" align="center" ></td>
	      </tr>		   
		</table>
		<br />
		<table width="100%" border="1" cellspacing="0" cellpadding="0" class="tbl_grid">
		  <tr>
		    <td height="35" colspan="3" align="left" class="adminfont">&nbsp;&nbsp;PF </td>
	      </tr>
		  <tr class="bgcolor_02" height="22">
		    <td width="6%" align="left" class="admin">&nbsp;S.No</td>
			<td width="65%" height="25" align="left" class="admin">PF Deduction Type </td>
			<td width="29%" align="left" class="admin"> Amount</td>			
		  </tr>
			<?php 
			$getallpfdetails = getamultiassoc("SELECT * FROM `es_pfmaster` 
			                      WHERE `pf_post`='".$staffdetails[st_post]."'  AND `pf_dept`='". $staffdetails[st_department]."'
								  AND '". $selyear."-".$selmonth."-01' BETWEEN `pf_from_date` AND `pf_to_date`");      
			if(count($getallpfdetails)>0)
			{
			$i=1;
			foreach($getallpfdetails as $eachalowance)
			{
			
			?>
		  <tr>
		    <td align="left" class="narmal">&nbsp;<?php echo $i; ?></td>
		    <td align="left" class="narmal"><?php echo $eachalowance[pf_empconttype]; ?></td>
		    <td align="left" class="adminfont"><font color="#AA1731">-<?php
				if($eachalowance['pf_empconttype']=='Percentage')
				{
				$balance = ($staffdetails[st_basic]*$eachalowance[pf_empcont])/100;
				echo $_SESSION['eschools']['currency'].number_format($balance, 2, '.', '');
				$tot_deductions = $tot_deductions+$balance;
				$individualtot = $individualtot+$balance;
				} 
				else
				{	
				 echo $_SESSION['eschools']['currency'].number_format($eachalowance[pf_empcont], 2, '.', '');
				 $tot_deductions = $tot_deductions+$eachalowance[pf_empcont];
				 $individualtot = $individualtot+$eachalowance[pf_empcont];
			     } ?></font>
		    </td>		   
	      </tr>
		  <?php
		  $i++;
		   }?>
		  <tr>
		    <td align="left" class="narmal"></td>
		    <td align="right" class="narmal">Total : &nbsp;</td>
		    <td align="left" class="adminfont"><font color="#AA1731">-<?php echo $_SESSION['eschools']['currency'].number_format($individualtot,              2, '.', '');
			  $individualtot = 0;
			  ?></font>
			</td>		   
	      </tr>
		    <?php }else { ?>		  
		  <tr>
		    <td colspan="3" align="center" class="narmal"> No Deduction's</td>
	      </tr>		  
		   <?php } ?>
		  <tr>
		    <td colspan="3" align="center" ></td>
	      </tr>
		</table>
		<br />
	
		
		
		<table width="100%" border="1" cellspacing="0" cellpadding="0" class="tbl_grid">
		  <tr>
		    <td height="35" colspan="6" align="left" class="adminfont">Leaves</td>
	      </tr>
		  <tr class="bgcolor_02" height="22">
		    <td width="6%" rowspan="2" align="left" class="admin">&nbsp;S.No</td>
			<td height="12" colspan="4" align="left" class="admin">Leave Information For this month </td>
			<td width="28%" rowspan="2" align="left" class="admin"> Amount</td>			
		  </tr>
		  <tr class="bgcolor_02" height="22">
		    <td width="10%" height="13" align="left" class="admin">Paid Leave </td>
	        <td width="11%" align="left" class="admin">Unpaid Leave </td>
	        <td width="22%" align="left" class="admin"> Total  Leaves </td>
		    <td width="23%" align="left" class="admin">Leave Deduction </td>
		  </tr>
		  
		  <?php 		
		  $sql_gettotalleaves = "SELECT SUM(lev_leavescount) as total FROM  es_leavemaster WHERE lev_post=".$staffdetails[st_post]." AND  lev_to_date  BETWEEN '".$from_finance."' AND '".$to_finance."'  "; 
		     $total_leaves = $db->getrow($sql_gettotalleaves);
						
						 $sss_qry11 = "SELECT SUM(balance) as bal FROM `es_payslipdetails` WHERE `staff_id` =".$selempid." AND `pay_month` BETWEEN '".$from_finance."' AND '".$to_finance."'  "; 
						$staff_used11 = $db->getrow($sss_qry11);
						
						
						
	 $sss_qry = "SELECT COUNT(*) FROM `es_attend_staff` WHERE `at_staff_id` =".$selempid." AND `at_staff_date` BETWEEN '".$from_finance."' AND '".$to_finance."' AND `at_staff_attend`='A' AND (at_staff_remarks='Unpaid' )  "; 
						$staff_used = $db->getone($sss_qry);
						
			  $sss_qry1 = "SELECT * FROM `es_payslipdetails` WHERE `staff_id` =".$selempid." AND `pay_month` BETWEEN '".$from_finance."' AND '".$to_finance."'  "; 
						$staff_used1 = $db->getrow($sss_qry1);			     
				
		  $exearr = "SELECT COUNT(*) FROM `es_attend_staff` WHERE `at_staff_id` =".$selempid." AND `at_staff_date` BETWEEN '".$from_finance."' AND '".$selyear."-".$selmonth."-31 ' AND `at_staff_attend`='A' AND at_staff_remarks='Unpaid'  "; 
		  
		   $sss_qry1 = "SELECT COUNT(*) FROM `es_attend_staff` WHERE `at_staff_id` =".$selempid." AND `at_staff_date` BETWEEN '".$selyear."-".$selmonth."-1 ' AND '".$selyear."-".$selmonth."-31 ' AND `at_staff_attend`='A' AND (at_staff_remarks='Unpaid' )  "; 
						$staff_used1 = $db->getone($sss_qry1);
						
		   $sss_qry2 = "SELECT COUNT(*) FROM `es_attend_staff` WHERE `at_staff_id` =".$selempid." AND `at_staff_date` BETWEEN '".$selyear."-".$selmonth."-1 ' AND '".$selyear."-".$selmonth."-31 ' AND `at_staff_attend`='A' AND (at_staff_remarks='Paid' )  "; 
						$staff_used2 = $db->getone($sss_qry2);
						
		 $sss_qry3 = "SELECT COUNT(*) FROM `es_attend_staff` WHERE `at_staff_id` =".$selempid." AND `at_staff_date` BETWEEN '".$from_finance."' AND '".$to_finance."' AND `at_staff_attend`='A'   "; 
						$staff_used3 = $db->getone($sss_qry3);  
						
						 $sss_qry4 = "SELECT COUNT(*) FROM `es_attend_staff` WHERE `at_staff_id` =".$selempid." AND `at_staff_date` BETWEEN '".$from_finance."' AND '".$to_finance."' AND `at_staff_attend`='A'  AND (at_staff_remarks='Unpaid' )  "; 
						$staff_used4 = $db->getone($sss_qry4);
		  
		  $dividedby['01'] = "31";
		  $dividedby['02'] = "28";
		  $dividedby['03'] = "31";
		  $dividedby['04'] = "30";
		  $dividedby['05'] = "31";
		  $dividedby['06'] = "30";
		  $dividedby['07'] = "31";
		  $dividedby['08'] = "31";
		  $dividedby['09'] = "30";
		  $dividedby['10'] = "31";
		  $dividedby['11'] = "30";
		  $dividedby['12'] = "31";
		  $getall_leave_det = getamultiassoc($exearr);
		   if(count($getall_leave_det)>0)
		   {
		   $i=1;
		  foreach($getall_leave_det as $eachalowance)
		  {
		  ?>
		  <tr>
		    <td align="left" class="narmal">&nbsp;<?php echo $i; ?></td>
		    <td align="left" class="narmal"><?php echo $staff_used2; ?></td>
		    <td align="left" class="narmal"><?php echo $staff_used1; ?></td>
		    <td align="left" class="narmal"><?php echo $staff_used3; ?></td>
		    <td align="left" class="narmal"><?php  
		
				
			   if($staff_used>$total_leaves['total'])
				{
										   
						   
			   $balance =  $staff_used4- $staff_used11['bal']-$total_leaves['total'];
			  echo  $balance; } else { echo $balance=0; }//echo displaydate($eachalowance[at_staff_date]);  ?></td>
		    <td align="left" class="adminfont"><font color="#AA1731">-<font color="#AA1731">
				<?php
				
				//echo $perdaysal = $staffdetails[st_basic]/$mondays;
				//echo $mondays;
				if($staff_used>$total_leaves['total'])
				{
				$a=	($balance*$staffdetails[st_basic])/30	;
				echo $_SESSION['eschools']['currency'].number_format(-$a, 2, '.', '');
				
				}
				/*$mondays = $dividedby[$selmonth];	
				if($eachalowance['at_staff_attend']!='H'){		
				$perdaysal = $staffdetails[st_basic]/$mondays;
				}else{
				$perdaysal_h = $staffdetails[st_basic]/$mondays;
				$perdaysal = $perdaysal_h/2;
				}
				echo $_SESSION['eschools']['currency'].number_format($perdaysal, 2, '.', '');*/
				$tot_deductions = $tot_deductions+$a;
				$individualtot = $individualtot+$a;
				 ?></font></font>		    </td>		   
	      </tr>
		  <?php
		  $i++;
		   } ?>
		  <tr>
		    <td align="left" class="narmal"></td>
		    <td colspan="4" align="right" class="narmal">Total : &nbsp;</td>
		    <td align="left" class="adminfont"><font color="#AA1731">-<?php echo $_SESSION['eschools']['currency'].number_format($individualtot, 2, '.', '');
			$individualtot = 0;
			?></font></td>		   
	      </tr>
		    <?php }else { ?>		  
		  <tr>
		    <td colspan="6" align="center" class="narmal"> No Leave's</td>
	      </tr>		 
		  <?php } ?>
		   <tr>
		    <td colspan="6" align="center" ></td>
	      </tr>		   
		</table>
		<br />
		
		
		<?php /*?><table width="100%" border="1" cellspacing="0" cellpadding="0" class="tbl_grid">
		  <tr>
		    <td height="35" colspan="3" align="left" class="adminfont">&nbsp;&nbsp;Overtime Attendance </td>
	      </tr>
		  <tr class="bgcolor_02" height="22">
		    <td width="6%" align="left" class="admin">&nbsp;S.No</td>
			<td width="66%" height="25" align="left" class="admin">OT On</td>
			<td width="28%" align="left" class="admin">Amount</td>			
		  </tr>
		  <?php 		  
		 $exearr = "SELECT * FROM `es_attend_staff` WHERE `at_staff_id` =".$selempid." AND `at_staff_date` BETWEEN '".$selyear."-".$selmonth."-01       00:00:00' AND '".$selyear."-".$selmonth."-31 12:12:12' AND `at_staff_attend`='D'"; 
		  
		  $dividedby['01'] = "31";
		  $dividedby['02'] = "28";
		  $dividedby['03'] = "31";
		  $dividedby['04'] = "30";
		  $dividedby['05'] = "31";
		  $dividedby['06'] = "30";
		  $dividedby['07'] = "31";
		  $dividedby['08'] = "31";
		  $dividedby['09'] = "30";
		  $dividedby['10'] = "31";
		  $dividedby['11'] = "30";
		  $dividedby['12'] = "31";
		  $getall_extra_ot = getamultiassoc($exearr);
		   if(count($getall_extra_ot)>0)
		   {
		   $i=1;
		  foreach($getall_extra_ot as $eachalowance)
		  {
		  ?>
		  <tr>
		    <td align="left" class="narmal">&nbsp;<?php echo $i; ?></td>
		    <td align="left" class="narmal">
			   <?php echo displaydate($eachalowance[at_staff_date]);  ?>
			</td>
		    <td align="left" class="adminfont">
				<?php 
				$mondays = $dividedby[$selmonth];			
				$perdaysal = $staffdetails[st_basic]/$mondays;
				echo $_SESSION['eschools']['currency'].number_format($perdaysal, 2, '.', '');
				/*$tot_deductions = $tot_deductions+$perdaysal;
				$individualtot = $individualtot+$perdaysal;
				$individualtot = $individualtot+$perdaysal;
			    $tot_allowances = $tot_allowances+$perdaysal;
			 
				 ?></font></font>
		    </td>		   
	      </tr>
		  <?php
		  $i++;
		   } ?>
		  <tr>
		    <td align="left" class="narmal"></td>
		    <td align="right" class="narmal">Total : &nbsp;</td>
		    <td align="left" class="adminfont"><?php echo $_SESSION['eschools']['currency'].number_format($individualtot, 2, '.', '');
			$individualtot = 0;
			?></font></td>		   
	      </tr>
		    <?php }else { ?>		  
		  <tr>
		    <td colspan="3" align="center" class="narmal"> No Leave's</td>
	      </tr>		 
		  <?php } ?>
		   <tr>
		    <td colspan="3" align="center" ></td>
	      </tr>		   
		</table><?php */?>
		<br />
		<table width="85%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td width="11%">&nbsp;</td>
			<td width="66%">&nbsp;</td>
			<td width="23%">&nbsp;</td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
			<td class="adminfont" align="right">Basic Salary :&nbsp;</td>
			<td align="right" class="adminfont">
			   <?php echo $_SESSION['eschools']['currency']?>&nbsp;<?php echo number_format($staffdetails[st_basic], 2, '.', ''); ?>
		    </td>
		  </tr>
		  <tr>
		    <td>&nbsp;</td>
		    <td class="adminfont" align="right">Total Allowance :&nbsp;</td>
		    <td align="right" class="adminfont">+<?php echo $_SESSION['eschools']['currency']?>&nbsp;<?php echo number_format($tot_allowances, 2, '.', ''); ?></td>
	      </tr>
		  <tr>
		    <td>&nbsp;</td>
		    <td class="adminfont" align="right">Total Deductions :&nbsp;</td>
		    <td align="right" class="adminfont"><font color="#AA1731">-<?php echo $_SESSION['eschools']['currency']?>&nbsp;<?php echo number_format($tot_deductions              , 2, '.', ''); ?></font>
			</td>
	      </tr>
		  <tr>
		    <td>&nbsp;</td>
		    <td class="admin" align="right"></td>
		    <td align="right" class="adminfont"><hr style="background-color:#000000;"/></td>
	      </tr>
		  <tr>
		    <td>&nbsp;</td>
		    <td class="adminfont" align="right">Net Salary :&nbsp;</td>
		    <td align="right" class="adminfont"><?php 
			$netsal = ($staffdetails[st_basic]+$tot_allowances)-$tot_deductions;
			echo $_SESSION['eschools']['currency']?>&nbsp;<?php echo number_format($netsal, 2, '.', ''); ?></td>
	      </tr>
		  <tr>
		    <td>&nbsp;</td>
		    <td class="adminfont" align="right"></td>
		    <td align="right" class="adminfont"><hr style="background-color:#000000;"/></td>
	      </tr>
		  <tr>
		    <td>&nbsp;</td>
		    <td class="adminfont" align="center">
			  <?php if(in_array('11_22',$admin_permissions)){?>


 <input name="printSubmit" type="button" onclick="newWindowOpen ('?pid=35&action=printpayslip&selyear=<?php echo $selyear;?>&selmonth=<?php echo $selmonth;?>&selempid=<?php echo $selempid; ?>');" class="bgcolor_02" value="Print" style="cursor:pointer;"/>
			
<?php }?>
			  
			  
		    </td>
		    <td align="left" class="adminfont">&nbsp;</td>
	      </tr>
		  <tr>
		    <td>&nbsp;</td>
		    <td class="adminfont" align="center">&nbsp;</td>
		    <td align="left" class="admin">&nbsp;</td>
	      </tr>
		</table>

		<?php
			if(isset($date_difference) && $date_difference >0 ){
				$enterpaysql = "SELECT * FROM `es_payslipdetails` WHERE `pay_month`='".$selyear."-".$selmonth."-01' AND `staff_id`=".$selempid;
				if(sqlnumber($enterpaysql)==0){
				 $obj_voucherentry = new es_voucherentry();
						 $vocturedetails = voucherid_finance($vocturetypesel);
						 $obj_voucherentry->es_vouchertype = $vocturedetails['voucher_type'];
						 $obj_voucherentry->es_receiptno   = "staff".$receptid;
						 $obj_voucherentry->es_paymentmode = $es_paymentmode;
						 $obj_voucherentry->es_bankacc	   = $es_bankacc;
						 $obj_voucherentry->es_particulars = $es_ledger;
						 $obj_voucherentry->es_amount	   = $netsal;
			
						 $obj_voucherentry->es_bank_pin      = $es_bank_pin;
						 $obj_voucherentry->es_bank_name     = $es_bank_name;
						 $obj_voucherentry->es_teller_number = $es_teller_number;
			
						 $obj_voucherentry->es_narration   = $es_narration;
						 $obj_voucherentry->es_vouchermode = $vocturedetails['voucher_mode'];
						 $obj_voucherentry->es_checkno     = $es_checkno;
						 $obj_voucherentry->es_receiptdate = date('Y-m-d H:i:s');
						 $obj_voucherentry->ve_fromfinance = $selyear."-".$selmonth."-01";
						 $obj_voucherentry->ve_tofinance   = $selyear."-".$selmonth."-01";
						 
						$a= $obj_voucherentry->Save();
						 
						 
						  
						 $obj_payslipmaster = new es_payslipdetails();
						 $obj_payslipmaster->staff_id = $selempid; 
						 $obj_payslipmaster->pay_month = $selyear."-".$selmonth."-01";
						 $obj_payslipmaster->basic_salary = $staffdetails[st_basic];
						 $obj_payslipmaster->tot_allowance = $tot_allowances;
						 $obj_payslipmaster->tot_deductions = $tot_deductions;
						 $obj_payslipmaster->net_salary = $netsal;	
						  $obj_payslipmaster->voucherid = $a;
						   $obj_payslipmaster->leavedays = $total_leaves['total'];
						   $obj_payslipmaster->totalleave = $staff_used4;
						 
			
					$obj_payslipmaster->balance = $balance;	
						//voucher generation
						
				$sel_paidin_amount = "SELECT 
				sum(CASE es_vouchermode WHEN 'paidin' THEN es_amount ELSE 0 END)AS paidintotal,
				sum(CASE es_vouchermode WHEN 'paidout' THEN es_amount ELSE 0 END)AS paidouttotal
				FROM es_voucherentry"; 
				
				$sel_amount_exe = getarrayassoc($sel_paidin_amount);
				$paidintotal=$sel_amount_exe['paidintotal'];
				$paidouttotal=$sel_amount_exe['paidouttotal'];
				$diffamount = $paidintotal - $paidouttotal;
				//if ($diffamount>=$netsal){
				 ///Updating Table for loans
				 if(count($getallloandetails)>0){
				  foreach($getallloandetails as $eachalowance)
		   {
		          $db->update('es_issueloan', "amountpaidtillnow ='" . $presentamt . "', noofinstalmentscompleted ='" . $presentinst . "'",                  'es_issueloanid =' . $eachalowance['es_issueloanid']);
				   $obj_loanpayment->Save();
				   }
				   }
				   //array_print($obj_payslipmaster);
				   
					$inid=$obj_payslipmaster->Save();
					
					
					$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_payslipdetails','PAYROLL','EMPLOYEE PAYSLIP','".$inid."','PAYSLIP','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);
					
					
					
					// Send SMS						 
					if($dispstaffdetails['st_prmobno']!="" && function_exists('curl_init')){
						 $url = "http://122.166.5.17/desk2web/SendSMS.aspx?UserName=".MOBILE_USERNAME."&password=".MOBILE_PASSWORD."&MobileNo=".$dispstaffdetails['st_prmobno']."&SenderID=".MOBILE_SENDER_ID."&CDMAHeader=".CDMA_HEADER."&Message=Pay%20Slip%20generated%20for%20the%20month%20of%20".date("M",mktime(0,0,0,$selmonth,1,2009))."%20".$selyear."%20-%20EIMS&isFlash=false";
						$curl = curl_init();
						curl_setopt ($curl, CURLOPT_URL, $url);
						curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1);
						$request_result = curl_exec ($curl);
						echo $request_result;
						curl_close ($curl);
					 }
					
					$receptid = mysql_insert_id();	
						 
						/* $obj_voucherentry = new es_voucherentry();
						 $vocturedetails = voucherid_finance($vocturetypesel);
						 $obj_voucherentry->es_vouchertype = $vocturedetails['voucher_type'];
						 $obj_voucherentry->es_receiptno   = "staff".$receptid;
						 $obj_voucherentry->es_paymentmode = $es_paymentmode;
						 $obj_voucherentry->es_bankacc	   = $es_bankacc;
						 $obj_voucherentry->es_particulars = $es_ledger;
						 $obj_voucherentry->es_amount	   = $netsal;
			
			
						 $obj_voucherentry->es_bank_pin      = $es_bank_pin;
						 $obj_voucherentry->es_bank_name     = $es_bank_name;
						 $obj_voucherentry->es_teller_number = $es_teller_number;
			
						 $obj_voucherentry->es_narration   = $es_narration;
						 $obj_voucherentry->es_vouchermode = $vocturedetails['voucher_mode'];
						 $obj_voucherentry->es_checkno     = $es_checkno;
						 $obj_voucherentry->es_receiptdate = date('Y-m-d H:i:s');
						 $obj_voucherentry->ve_fromfinance = $selyear."-".$selmonth."-01";
						 $obj_voucherentry->ve_tofinance   = $selyear."-".$selmonth."-01";
						 
						$a= $obj_voucherentry->Save();*/
						 
						 
						 
						
						 //}else{
						 ?>
						 <!--<script type="text/javascript">
                         alert("Sufficient Funds are not available");
                         </script>--><?php
						 //};
						
								
				}else{
				
				$errormessage['payslip']="Payslip Already generated";
				}
			}		
		 }	?>
		</td>		
		<td width="3" class="bgcolor_02"></td>
	  </tr>	  
	  <tr>
		<td height="1" colspan="3" class="bgcolor_02"></td>
  </tr>
</table>
<?php	
	}
//End of Employee wise pay slip

// Year wise pay slip
	if($action=='yearwisepayslip')
	{	
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
         <td height="3" colspan="3"></td>
	 </tr>
	  <tr>
		<td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Year wise pay slip</span></td>
	  </tr>
	  <tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="center" valign="top">
		Content
		</td>
		<td width="1" class="bgcolor_02"></td>
	  </tr>	  
	  <tr>
		<td height="1" colspan="3" class="bgcolor_02"></td>
  </tr>
</table>
<?php	
	}
//End of Year wise pay slip

// Employee Pay slip List
	if($action=='paysliplist'|| $school_year=='Submit')
	{	
?>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
         <td height="3" colspan="3"></td>
	 </tr>
	  <tr>
		<td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Employee Payslip List</span></td>
	  </tr>
	  <tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="center" valign="top">
		<br />
		<table width="100%" border="0" class="">
		<form action="" method="post">
		 <tr><td colspan="3">&nbsp;</td></tr>
  <tr>
    <td width="48%" align="right" valign="middle" class="narmal">Academic Year</td>
	<td width="4%" class="narmal">
	<select name="pre_year">
	<?php  foreach($school_details_res as $each_record) { ?>
	
	<option value="<?php echo $each_record['es_finance_masterid']; ?>" <?php if($each_record['es_finance_masterid']==$pre_year) { echo "selected"; }?>><?php echo displaydate($each_record['fi_startdate'])." To ".displaydate($each_record['fi_enddate']); ?>
	</option>
	
	<?php } ?>
	</select>
	</td>
	<td width="48%" align="left" class="narmal" style="padding-right:5px;"><input type="submit" name="school_year" class="bgcolor_02" value="Submit" style="cursor:pointer;"/></td>
  </tr>
  <tr><td colspan="3">&nbsp;</td></tr></form>
</table>

		<table width="100%" border="1"  cellspacing="0" cellpadding="0" class="tbl_grid">
		  <tr class="bgcolor_02" height="25">
			<td width="9%" >&nbsp;S.No</td>
			<td width="13%" >Emp ID</td>
			<td width="14%" >Month</td>
			<td width="13%" >Basic Salary </td>
			<td width="21%" >Total &nbsp;Deduction's </td>
			<td width="20%" >Total Allowance</td>
			<td width="20%" >Net Salary </td>
		  </tr>
		  <?php 
		  
		  
		
		 
		  if(count($paysallist)>0) {
		  $i=$start+1; 
		  $tot=0;
		  foreach($paysallist as $eachrecord)
		  {
		  ?> 
		  <tr>
			<td class="narmal"><?php echo $i++; ?></td>
			<td class="narmal">ID-<?php echo $eachrecord['staff_id']; ?><br/><?php echo $eachrecord['st_firstname'].'&nbsp;'.$eachrecord['st_lastname']; ?><br/>Dept-<?php echo deptname($eachrecord['st_department']); ?></td>
			
			<td class="narmal"><?php echo DatabaseFormat($eachrecord['pay_month'],"F-Y"); ?></td>
			<td class="narmal"><?php echo $_SESSION['eschools']['currency'].'&nbsp;'.number_format($eachrecord['basic_salary'], 2, '.', ''); ?></td>
			<td class="narmal"><?php echo $_SESSION['eschools']['currency'].'&nbsp;'.number_format(($eachrecord['tot_deductions']), 2, '.', ''); ?></td>
			<td class="narmal"><?php echo $_SESSION['eschools']['currency'].'&nbsp;'.number_format(($eachrecord['tot_allowance']), 2, '.', ''); ?></td>
			<td class="adminfont"><?php echo $_SESSION['eschools']['currency'].'&nbsp;'.number_format(($eachrecord['net_salary']), 2, '.', ''); ?></td>
		  </tr>
		  <?php
		  $tot = $tot+($eachrecord['net_salary']);
		   } ?>
		   <tr height="28">
			<td colspan="5" class="narmal"></td>
			<td class="adminfont">Total :</td>
			<td class="adminfont"><?php echo $_SESSION['eschools']['currency'].'&nbsp;'.number_format(($tot), 2, '.', ''); ?></td>
		  </tr>
		  <tr height="28">
			<td colspan="9" class="narmal" align="center"><?php paginateexte($start, $q_limit, $no_rows, 'action='.$action);  ?></td>
		  </tr>
		  <tr height="28">
			<td colspan="9" class="narmal" align="center"><?php if (in_array("11_104", $admin_permissions)) {?><input name="Submit" type="button" onclick="newWindowOpen ('?pid=35&action=print_pslip_list<?php  echo $adminlisturl;?>');" class="bgcolor_02" value="Print" style="cursor:pointer;"/><?php }?></td>
		  </tr>
		  
		   <?php } else { ?>
		  <tr>
			<td colspan="9" align="center" class="narmal"> No Records Found </td>
		  </tr>
		   <?php } ?>
		  <tr>
			<td colspan="9">&nbsp;</td>
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
	}
// Employee Pay slip List
?>
<script type="text/javascript">
function newWindowOpen(href)
{
    window.open(href,null, 'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');
}
</script>

<?php if($action=='print_pslip_list'){
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_payslipdetails','Payroll','Payslip List','','Print','".$_SERVER['REMOTE_ADDR']."',NOW())";
     $log_insert_exe=mysql_query($log_insert_sql);
?>
<table width="100%" border="1"  cellspacing="0" cellpadding="0" class="tbl_grid">
		  <tr class="bgcolor_02" height="25">
			<td width="9%" >&nbsp;S.No</td>
			<td width="13%" >Employee-Id</td>
			<td width="18%" >Emp-Name</td>
			<td width="18%" >Department</td>
			<td width="14%" >Month</td>
			<td width="13%" >Basic Salary </td>
			<td width="21%" >Total &nbsp;Deduction's </td>
			<td width="20%" >Total Allowance</td>
			<td width="20%" >Net Salary </td>
		  </tr>
		  <?php 
		  
		  
		
		 
		  if(count($paysallist)>0) {
		  $i=$start+1; 
		  $tot=0;
		  foreach($paysallist as $eachrecord)
		  {
		  ?> 
		  <tr>
			<td class="narmal"><?php echo $i++; ?></td>
			<td class="narmal"><?php echo $eachrecord['staff_id']; ?></td>
			<td class="narmal"><?php echo $eachrecord['st_firstname'].'&nbsp;'.$eachrecord['st_lastname']; ?></td>
				<td class="narmal"><?php echo deptname($eachrecord['st_department']); ?></td>
			<td class="narmal"><?php echo DatabaseFormat($eachrecord['pay_month'],"F-Y"); ?></td>
			<td class="narmal"><?php echo $_SESSION['eschools']['currency'].'&nbsp;'.number_format($eachrecord['basic_salary'], 2, '.', ''); ?></td>
			<td class="narmal"><?php echo $_SESSION['eschools']['currency'].'&nbsp;'.number_format(($eachrecord['tot_deductions']), 2, '.', ''); ?></td>
			<td class="narmal"><?php echo $_SESSION['eschools']['currency'].'&nbsp;'.number_format(($eachrecord['tot_allowance']), 2, '.', ''); ?></td>
			<td class="adminfont"><?php echo $_SESSION['eschools']['currency'].'&nbsp;'.number_format(($eachrecord['net_salary']), 2, '.', ''); ?></td>
		  </tr>
		  <?php
		  $tot = $tot+($eachrecord['net_salary']);
		   } ?>
		   <tr height="28">
			<td colspan="7" class="narmal"></td>
			<td class="adminfont">Total :</td>
			<td class="adminfont"><?php echo $_SESSION['eschools']['currency'].'&nbsp;'.number_format(($tot), 2, '.', ''); ?></td>
		  </tr>
		 
		   <?php } else { ?>
		  <tr>
			<td colspan="9" align="center" class="narmal"> No Records Found </td>
		  </tr>
		   <?php } ?>
		  <tr>
			<td colspan="9">&nbsp;</td>
		  </tr>
</table>
<?php }?>
<?php 	
// Employee wise print pay slip Details
	if($action=='printpayslip')
	{	
	
	$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_payslipdetails','PAYROLL','EMPLOYEE PAYSLIP','".$inid."','PAYSLIP PRINT','".$_SERVER['REMOTE_ADDR']."',NOW())";
		
	$log_insert_exe=mysql_query($log_insert_sql);
					
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">	 
	  <tr>
		<td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Employee Payslip</span></td>
	  </tr>
	  <tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="center" valign="top">		
		<table width="95%" border="0" cellspacing="2" cellpadding="0">
		  <tr>
			<td align="left" class="narmal" width="21%">Employee Id </td>
			<td align="left" class="narmal" width="1%">:</td>
			<td align="left" class="narmal" width="52%"><?php echo $staffdetails['es_staffid']; ?></td>
			<td width="26%" rowspan="3" align="left" class="narmal"></td>
		  </tr>
		  <tr>
		    <td align="left" class="narmal">Employee Name </td>
		    <td align="left" class="narmal">:</td>
		    <td align="left" class="narmal"><?php echo $staffdetails['st_firstname']." ".$staffdetails['st_lastname']; ?></td>
	      </tr>
		  <tr>
		    <td align="left" class="narmal">Basic Salary </td>
		    <td align="left" class="narmal">:</td>
		    <td align="left" class="adminfont"><?php echo $_SESSION['eschools']['currency']?>&nbsp;<?php echo number_format($staffdetails['st_basic'], 2, '.', ''); ?></td>
	      </tr>		 
		   <tr>
		    <td align="left" class="narmal">Pay Slip for the month of</td>
		    <td align="left" class="narmal">:</td>
		    <td align="left" class="narmal"><?php echo date('F',mktime(0, 0, 0, $selmonth, 1, 2000))." ".$selyear; ?></td>
	      </tr>
		  <tr>
		    <td align="left" class="narmal">Department</td>
		    <td align="left" class="narmal">:</td>
		    <td align="left" class="narmal"><?php echo deptname($staffdetails['st_department']); ?></td>
	      </tr>
		  <tr>
		    <td align="left" class="narmal">Post</td>
		    <td align="left" class="narmal">:</td>
		    <td align="left" class="narmal"><?php echo postname($staffdetails['st_post']); ?></td>
	      </tr>
		  <tr>
		    <td align="left" class="narmal">&nbsp;</td>
		    <td align="left" class="narmal">&nbsp;</td>
		    <td align="left" class="narmal"><?php //echo dateDiff($staffdetails['st_dateofjoining'],$selyear."-".$selmonth."-01"); ?></td>
		    <td align="left" class="narmal">&nbsp;</td>
	      </tr>
		</table>		 
		<table width="100%" border="1" cellspacing="0" cellpadding="0" class="tbl_grid">
		  <tr>
		    <td height="35" colspan="3" align="left" class="adminfont">&nbsp;&nbsp;Allowance</td>
	      </tr>
		  <tr class="bgcolor_02" height="22">
		    <td width="6%" align="left" class="admin">&nbsp;S.No</td>
			<td width="65%" height="25" align="left" class="admin">Allowance Type</td>
			<td width="29%" align="left" class="admin">Amount</td>			
		  </tr>
		  <?php 
		  $tot_allowances = 0;
		  $tot_deductions = 0;	
		  $individualtot = 0;	  
		  $getallalwdetails = getamultiassoc("SELECT * FROM `es_allowencemaster` WHERE `alw_post` = '".$staffdetails['st_post']."' AND '".$selyear."-".$selmonth."-01' BETWEEN `alw_fromdate` AND `alw_todate`");
		   if(count($getallalwdetails)>0)
		   {
		   $i=1;
		  foreach($getallalwdetails as $eachalowance)
		  {
		  ?>
		  <tr>
		    <td align="left" class="narmal">&nbsp;<?php echo $i; ?></td>
		    <td align="left" class="narmal"><?php echo $eachalowance[alw_type]; ?></td>
		    <td align="left" class="adminfont"><?php
			if($eachalowance['alw_amt_type']=='Percentage')
			{
			$balance = ($staffdetails['st_basic']*$eachalowance['alw_amount'])/100;
			echo $_SESSION['eschools']['currency'].number_format($balance, 2, '.', '');
			$tot_allowances = $tot_allowances+$balance;
			$individualtot = $individualtot+$balance;
			}
			else
			{			
			 echo $_SESSION['eschools']['currency'].number_format($eachalowance['alw_amount'], 2, '.', '');
			 $tot_allowances = $tot_allowances+$eachalowance['alw_amount'];
			 $individualtot = $individualtot+$eachalowance['alw_amount'];
			 }			
			 ?></td>		   
	      </tr>
		  <?php
		  $i++;
		   }?>
		     <tr>
		    <td align="left" class="narmal"></td>
		    <td align="right" class="narmal">Total : &nbsp;</td>
		    <td align="left" class="adminfont"><?php echo $_SESSION['eschools']['currency'].number_format($individualtot, 2, '.', '');
			$individualtot = 0;
			?></td>		   
	      </tr>
		    <?php }else { ?>		  
		  <tr>
		    <td colspan="3" align="center" class="narmal"> No Allowance</td>
	      </tr>		  
		  <?php } ?>		 
		</table>		
			<br />		 
		<table width="100%" border="1" cellspacing="0" cellpadding="0" class="tbl_grid">
		  <tr>
		    <td height="35" colspan="3" align="left" class="adminfont">&nbsp;&nbsp;Deduction's</td>
	      </tr>
		  <tr class="bgcolor_02" height="22">
		    <td width="6%" align="left" class="admin">&nbsp;S.No</td>
			<td width="65%" height="25" align="left" class="admin">Deduction Type</td>
			<td width="29%" align="left" class="admin">Amount</td>			
		  </tr>
		  <?php 
		  $getallalwdetails = getamultiassoc("SELECT * FROM `es_deductionmaster` WHERE `ded_post`='".$staffdetails['st_post']."' AND '".$selyear."-".$selmonth."-01' BETWEEN `ded_fromdate` AND `ded_todate`");
		   if(count($getallalwdetails)>0)
		   {
		   $i=1;
		  foreach($getallalwdetails as $eachalowance)
		  {
		  ?>
		  <tr>
		    <td align="left" class="narmal">&nbsp;<?php echo $i; ?></td>
		    <td align="left" class="narmal"><?php echo $eachalowance['ded_type']; ?></td>
		    <td align="left" class="adminfont"><font color="#AA1731">-<?php
			if($eachalowance['ded_amt_type']=='Percentage')
			{
			$balance = ($staffdetails['st_basic']*$eachalowance['ded_amount'])/100;
			echo $_SESSION['eschools']['currency'].number_format($balance, 2, '.', '');
			$tot_deductions = $tot_deductions+$balance;
			$individualtot = $individualtot+$balance;
			} 
			else
			{	
			 echo $_SESSION['eschools']['currency'].number_format($eachalowance['ded_amount'], 2, '.', '');
			 $tot_deductions = $tot_deductions+$eachalowance['ded_amount'];
			 $individualtot = $individualtot+$eachalowance['ded_amount'];
			 } ?></font></td>		   
	      </tr>
		  <?php
		  $i++;
		   }?>
		     <tr>
		    <td align="left" class="narmal"></td>
		    <td align="right" class="narmal">Total : &nbsp;</td>
		    <td align="left" class="adminfont"><font color="#AA1731">-<?php echo $_SESSION['eschools']['currency'].number_format($individualtot, 2, '.', '');
			$individualtot = 0;
			?></font></td>		   
	      </tr>
		    <?php }else { ?>		  
		  <tr>
		    <td colspan="3" align="center" class="narmal">No Deduction's</td>
	      </tr>		  
		  <?php } ?>		 
		</table>
		<br />
		<table width="100%" border="1" cellspacing="0" cellpadding="0" class="tbl_grid">
		  <tr>
		    <td height="35" colspan="3" align="left" class="adminfont">&nbsp;&nbsp;Tax Deduction's</td>
	      </tr>
		  <tr class="bgcolor_02" height="22">
		    <td width="6%" align="left" class="admin">&nbsp;S.No</td>
			<td width="65%" align="left" class="admin">Tax Type</td>
			<td width="29%" align="left" class="admin">Deduction Amount</td>			
		  </tr>
		  <?php 
							  
		  $getallalwdetails = getamultiassoc("SELECT * FROM `es_taxmaster` 
		                      WHERE '".$staffdetails['st_basic']."' <= `tax_to` AND '".$staffdetails['st_basic']."' >=`tax_from`  
		                      AND '". $selyear."-".$selmonth."-01' BETWEEN `tax_from_date` AND `tax_to_date`");
		   if(count($getallalwdetails)>0)
		   {
		   $i=1;
		  foreach($getallalwdetails as $eachalowance)
		  {
		  ?>
		  <tr>
		    <td align="left" class="narmal">&nbsp;<?php echo $i; ?></td>
		    <td align="left" class="narmal"><?php echo $eachalowance['tax_name']; ?></td>
		    <td align="left" class="adminfont"><font color="#AA1731">-<font color="#AA1731"><?php
			if($eachalowance['tax_percentage_type']=='percentage')
			{
			$balance = ($staffdetails[st_basic]*$eachalowance[tax_rate])/100;
			echo $_SESSION['eschools']['currency'].number_format($balance, 2, '.', '');
			$tot_deductions = $tot_deductions+$balance;
			$individualtot = $individualtot+$balance;
			}
			else
			{	
			 echo $_SESSION['eschools']['currency'].number_format($eachalowance['tax_rate'], 2, '.', '');
			 $tot_deductions = $tot_deductions+$eachalowance['tax_rate'];
			 $individualtot = $individualtot+$eachalowance['tax_rate'];
			 } ?></font></font></td>		   
	      </tr>
		  <?php
		  $i++;
		   } ?>
		     <tr>
		    <td align="left" class="narmal"></td>
		    <td align="right" class="narmal">Total : &nbsp;</td>
		    <td align="left" class="adminfont"><font color="#AA1731">-<?php echo $_SESSION['eschools']['currency'].number_format($individualtot, 2, '.', '');
			$individualtot = 0;
			?></font></td>		   
	      </tr>
		    <?php }else { ?>		  
		  <tr>
		    <td colspan="3" align="center" class="narmal">No Deductions's</td>
	      </tr>		 
		  <?php } ?>		  	   
		</table>
		<br />
			<table width="100%" border="1" cellspacing="0" cellpadding="0" class="tbl_grid">
		  <tr>
		    <td colspan="5" class="adminfont" align="left">&nbsp;&nbsp;Loan Deduction's</td>
	      </tr>
		  <tr class="bgcolor_02" height="22">
		    <td width="6%" align="left" class="admin">&nbsp;S.No</td>
			<td width="24%" align="left" class="admin">Loan Type</td>
			<td width="19%" align="left" class="admin">Loan Amount </td>
			<td width="22%" align="left" class="admin"># Installments Left </td>
			<td width="29%" align="left" class="admin">Deduction Amount</td>			
		  </tr>
		  <?php 		  
		  $exearr = "SELECT * FROM `es_issueloan` WHERE `es_staffid`=".$staffdetails['es_staffid']." and `noofinstalmentscompleted`<=`loan_instalments` and `deductionmonth`<='".date('Y-m-d')."'";
		$getallloandetails = getamultiassoc($exearr); 
		
		   if(count($getallloandetails)>0)
		   {
		   $i=1;
		  foreach($getallloandetails as $eachalowance)
		  {
		  $ded=0;
		  $loandetailsarr = "SELECT * FROM `es_loanmaster` WHERE `es_loanmasterid`=".$eachalowance['es_loanmasterid'];
			$loandetails = getarrayassoc($loandetailsarr);
		  
		  
		  ?>
		  <tr>
		    <td align="left" class="narmal">&nbsp;<?php echo $i; ?></td>
		    <td align="left" class="narmal"><?php echo $loandetails['loan_name']; ?></td>
		    <td align="left" class="narmal"><?php echo $eachalowance['loan_amount']; ?></td>
		    <td align="left" class="narmal"><?php echo $eachalowance['loan_instalments']-$eachalowance['noofinstalmentscompleted']-$ded; ?></td>
		    <td align="left" class="adminfont"><font color="#AA1731">-<font color="#AA1731"><?php echo $_SESSION['eschools']['currency'].number_format($eachalowance['dud_amount'], 2, '.', '');
			 $tot_deductions = $tot_deductions+$eachalowance['dud_amount'];
			 $individualtot = $individualtot+$eachalowance['dud_amount'];
			 ?></font></font></td>		   
	      </tr>
		  <?php
		  $i++;
		   } ?>
		     <tr>
		    <td align="left" class="narmal"></td>
		    <td align="right" class="narmal">&nbsp;</td>
		    <td align="right" class="narmal">&nbsp;</td>
		    <td align="right" class="narmal">Total : &nbsp;</td>
		    <td align="left" class="adminfont"><font color="#AA1731">-<?php echo $_SESSION['eschools']['currency'].number_format($individualtot, 2, '.', '');
			$individualtot = 0;
			?></font></td>		   
	      </tr>
		    <?php }else { ?>		  
		  <tr>
		    <td colspan="5" align="center" class="narmal"> No Loan</td>
	      </tr>		 
		  <?php } ?>		  	   
		</table>	<?php /*?><table width="100%" border="1" cellspacing="0" cellpadding="0" class="tbl_grid">
		  <tr>
		    <td height="35" colspan="5" align="left" class="adminfont">&nbsp;&nbsp;Loan Deduction's</td>
	      </tr>
		  <tr class="bgcolor_02" height="22">
		    <td width="6%" align="left" class="admin">&nbsp;S.No</td>
			<td width="24%" height="25" align="left" class="admin">Loan Type</td>
			<td width="19%" align="left" class="admin">Loan Amount </td>
			<td width="22%" align="left" class="admin"># Installments Left </td>
			<td width="29%" align="left" class="admin">Amount</td>			
		  </tr>
		  <?php 		  
		  $exearr = "SELECT * FROM `es_issueloan` WHERE `es_staffid`=".$staffdetails['es_staffid']." and `noofinstalmentscompleted`<`loan_instalments` and `deductionmonth`<='".date('Y-m-d')."'";
		$getallloandetails = getamultiassoc($exearr); 
		   if(count($getallloandetails)>0)
		   {
		   $i=1;
		  foreach($getallloandetails as $eachalowance)
		  {
		  $ded=0;
		  $loandetailsarr = "SELECT * FROM `es_loanmaster` WHERE `es_loanmasterid`=".$eachalowance['es_loanmasterid'];
			$loandetails = getarrayassoc($loandetailsarr);
		  
		  
		  ?>
		  <tr>
		    <td align="left" class="narmal">&nbsp;<?php echo $i; ?></td>
		    <td align="left" class="narmal"><?php echo $loandetails['loan_name']; ?></td>
		    <td align="left" class="narmal"><?php echo $eachalowance['loan_amount']; ?></td>
		    <td align="left" class="narmal"><?php echo $eachalowance['loan_instalments']-$eachalowance['noofinstalmentscompleted']-$ded; ?></td>
		    <td align="left" class="adminfont"><font color="#AA1731">-<font color="#AA1731"><?php echo $_SESSION['eschools']['currency'].number_format($eachalowance['dud_amount'], 2, '.', '');
			 $tot_deductions = $tot_deductions+$eachalowance['dud_amount'];
			 $individualtot = $individualtot+$eachalowance['dud_amount'];
			 ?></font></font></td>		   
	      </tr>
		  <?php
		  $i++;
		   } ?>
		     <tr>
		    <td align="left" class="narmal"></td>
		    <td align="right" class="narmal">&nbsp;</td>
		    <td align="right" class="narmal">&nbsp;</td>
		    <td align="right" class="narmal">Total : &nbsp;</td>
		    <td align="left" class="adminfont"><font color="#AA1731">-<?php echo $_SESSION['eschools']['currency'].number_format($individualtot, 2, '.', '');
			$individualtot = 0;
			?></font></td>		   
	      </tr>
		    <?php }else { ?>		  
		  <tr>
		    <td colspan="5" align="center" class="narmal"> No Loan</td>
	      </tr>		 
		  <?php } ?>		  	   
		</table><?php */?>
		
			<br />
		<table width="100%" border="1" cellspacing="0" cellpadding="0" class="tbl_grid">
		  <tr>
		    <td colspan="3" class="adminfont" align="left">&nbsp;&nbsp;PF Deduction</td>
	      </tr>
		  <tr class="bgcolor_02" height="22">
		    <td width="6%" align="left" class="admin">&nbsp;S.No</td>
			<td width="65%" align="left" class="admin">PF Deduction </td>
			<td width="29%" align="left" class="admin">Deduction Amount</td>			
		  </tr>
			<?php 
			$getallpfdetails = getamultiassoc("SELECT * FROM `es_pfmaster` 
			                      WHERE `pf_post`='".$staffdetails[st_post]."'  AND `pf_dept`='". $staffdetails[st_department]."'
								  AND '". $selyear."-".$selmonth."-01' BETWEEN `pf_from_date` AND `pf_to_date`");      
			if(count($getallpfdetails)>0)
			{
			$i=1;
			foreach($getallpfdetails as $eachalowance)
			{
			?>
		  <tr>
		    <td align="left" class="narmal">&nbsp;<?php echo $i; ?></td>
		    <td align="left" class="narmal"><?php echo $eachalowance[ded_type]; ?></td>
		    <td align="left" class="adminfont"><font color="#AA1731">-<?php
				if($eachalowance['pf_empconttype']=='Percentage')
				{
				$balance = ($staffdetails[st_basic]*$eachalowance[pf_empcont])/100;
				echo $_SESSION['eschools']['currency'].number_format($balance, 2, '.', '');
				$tot_deductions = $tot_deductions+$balance;
				$individualtot = $individualtot+$balance;
				} 
				else
				{	
				 echo $_SESSION['eschools']['currency'].number_format($eachalowance[pf_empcont], 2, '.', '');
				 $tot_deductions = $tot_deductions+$eachalowance[pf_empcont];
				 $individualtot = $individualtot+$eachalowance[pf_empcont];
			     } ?></font>
		    </td>		   
	      </tr>
		  <?php
		  $i++;
		   }?>
		  <tr>
		    <td align="left" class="narmal"></td>
		    <td align="right" class="narmal">Total : &nbsp;</td>
		    <td align="left" class="adminfont"><font color="#AA1731">-<?php echo $_SESSION['eschools']['currency'].number_format($individualtot,              2, '.', '');
			  $individualtot = 0;
			  ?></font>
			</td>		   
	      </tr>
		    <?php }else { ?>		  
		  <tr>
		    <td colspan="3" align="center" class="narmal"> No Deduction's</td>
	      </tr>		  
		   <?php } ?>
		  <tr>
		    <td colspan="3" align="center" ></td>
	      </tr>
		</table>
		<br />
		<?php /*?><table width="100%" border="1" cellspacing="0" cellpadding="0" class="tbl_grid">
		  <tr>
		    <td height="35" colspan="3" align="left" class="adminfont">&nbsp;&nbsp;PF Deduction</td>
	      </tr>
		  <tr class="bgcolor_02" height="22">
		    <td width="6%" align="left" class="admin">&nbsp;S.No</td>
			<td width="65%" height="25" align="left" class="admin">PF Deduction </td>
			<td width="29%" align="left" class="admin">Amount</td>			
		  </tr>
		  <?php 
		 $getallalwdetails = getamultiassoc("SELECT * FROM `es_pfmaster` WHERE `pf_post`='".$staffdetails['st_post']."'  AND `pf_dept`='".$staffdetails['st_department']."'");      if(count($getallalwdetails)>0)
		   {
		   $i=1;
		  foreach($getallalwdetails as $eachalowance)
		  {
		  ?>
		  <tr>
		    <td align="left" class="narmal">&nbsp;<?php echo $i; ?></td>
		    <td align="left" class="narmal"><?php echo $eachalowance['ded_type']; ?></td>
		    <td align="left" class="adminfont"><font color="#AA1731">-<?php
			if($eachalowance['pf_empconttype']=='Percentage')
			{
			$balance = ($staffdetails[st_basic]*$eachalowance[pf_empcont])/100;
			echo $_SESSION['eschools']['currency'].number_format($balance, 2, '.', '');
			$tot_deductions = $tot_deductions+$balance;
			$individualtot = $individualtot+$balance;
			} 
			else
			{	
			 echo $_SESSION['eschools']['currency'].number_format($eachalowance['pf_empcont'], 2, '.', '');
			 $tot_deductions = $tot_deductions+$eachalowance['ded_amount'];
			 $individualtot = $individualtot+$eachalowance['ded_amount'];
			 } ?></font></td>		   
	      </tr>
		  <?php
		  $i++;
		   }?>
		     <tr>
		    <td align="left" class="narmal"></td>
		    <td align="right" class="narmal">Total : &nbsp;</td>
		    <td align="left" class="adminfont"><font color="#AA1731">-<?php echo $_SESSION['eschools']['currency'].number_format($individualtot, 2, '.', '');
			$individualtot = 0;
			?></font></td>		   
	      </tr>
		    <?php }else { ?>		  
		  <tr>
		    <td colspan="3" align="center" class="narmal"> No Deduction's</td>
	      </tr>		  
		  <?php } ?>
		  <tr>
		    <td colspan="3" align="center" ></td>
	      </tr>
		</table><?php */?>
	
		<table width="100%" border="1" cellspacing="0" cellpadding="0" class="tbl_grid">
		  <tr>
		    <td height="35" colspan="6" align="left" class="adminfont">Leaves</td>
	      </tr>
		  <tr class="bgcolor_02" height="22">
		    <td width="6%" rowspan="2" align="left" class="admin">&nbsp;S.No</td>
			<td height="12" colspan="4" align="left" class="admin">Leave Information For this month </td>
			<td width="28%" rowspan="2" align="left" class="admin"> Amount</td>			
		  </tr>
		  <tr class="bgcolor_02" height="22">
		    <td width="10%" height="13" align="left" class="admin">Paid Leave </td>
	        <td width="11%" align="left" class="admin">Unpaid Leave </td>
	        <td width="22%" align="left" class="admin"> Total  Leaves </td>
		    <td width="23%" align="left" class="admin">Leave Deduction </td>
		  </tr>
		  
		  <?php 		
		  $sql_gettotalleaves = "SELECT SUM(lev_leavescount) as total FROM  es_leavemaster WHERE lev_post=".$staffdetails[st_post]." AND  lev_to_date  BETWEEN '".$from_finance."' AND '".$to_finance."'  "; 
		     $total_leaves = $db->getrow($sql_gettotalleaves);
						
						 $sss_qry11 = "SELECT SUM(balance) as bal FROM `es_payslipdetails` WHERE `staff_id` =".$selempid." AND `pay_month` BETWEEN '".$from_finance."' AND '".$to_finance."'  "; 
						$staff_used11 = $db->getrow($sss_qry11);
						
		 $sss_qry12 = "SELECT * FROM `es_payslipdetails` WHERE `staff_id` =".$selempid." AND `pay_month` BETWEEN '".$from_finance."' AND '".$to_finance."' order by es_payslipdetailsid desc limit 0,1   "; 
						$staff_used12 = $db->getrow($sss_qry12);				
						
				
					
	 $sss_qry = "SELECT COUNT(*) FROM `es_attend_staff` WHERE `at_staff_id` =".$selempid." AND `at_staff_date` BETWEEN '".$from_finance."' AND '".$to_finance."' AND `at_staff_attend`='A' AND (at_staff_remarks='Unpaid' )  "; 
						$staff_used = $db->getone($sss_qry);
						
			  $sss_qry1 = "SELECT * FROM `es_payslipdetails` WHERE `staff_id` =".$selempid." AND `pay_month` BETWEEN '".$from_finance."' AND '".$to_finance."'  "; 
						$staff_used1 = $db->getrow($sss_qry1);			     
				
		  $exearr = "SELECT COUNT(*) FROM `es_attend_staff` WHERE `at_staff_id` =".$selempid." AND `at_staff_date` BETWEEN '".$from_finance."' AND '".$selyear."-".$selmonth."-31 ' AND `at_staff_attend`='A' AND at_staff_remarks='Unpaid'  "; 
		  
		   $sss_qry1 = "SELECT COUNT(*) FROM `es_attend_staff` WHERE `at_staff_id` =".$selempid." AND `at_staff_date` BETWEEN '".$selyear."-".$selmonth."-1 ' AND '".$selyear."-".$selmonth."-31 ' AND `at_staff_attend`='A' AND (at_staff_remarks='Unpaid' )  "; 
						$staff_used1 = $db->getone($sss_qry1);
						
		   $sss_qry2 = "SELECT COUNT(*) FROM `es_attend_staff` WHERE `at_staff_id` =".$selempid." AND `at_staff_date` BETWEEN '".$selyear."-".$selmonth."-1 ' AND '".$selyear."-".$selmonth."-31 ' AND `at_staff_attend`='A' AND (at_staff_remarks='Paid' )  "; 
						$staff_used2 = $db->getone($sss_qry2);
						
		 $sss_qry3 = "SELECT COUNT(*) FROM `es_attend_staff` WHERE `at_staff_id` =".$selempid." AND `at_staff_date` BETWEEN '".$from_finance."' AND '".$to_finance."' AND `at_staff_attend`='A'   "; 
						$staff_used3 = $db->getone($sss_qry3);  
						
						  $sss_qry4 = "SELECT COUNT(*) FROM `es_attend_staff` WHERE `at_staff_id` =".$selempid." AND `at_staff_date` BETWEEN '".$from_finance."' AND '".$to_finance."' AND `at_staff_attend`='A'  AND (at_staff_remarks='Unpaid' )  "; 
						$staff_used4 = $db->getone($sss_qry4);
		  
		  $dividedby['01'] = "31";
		  $dividedby['02'] = "28";
		  $dividedby['03'] = "31";
		  $dividedby['04'] = "30";
		  $dividedby['05'] = "31";
		  $dividedby['06'] = "30";
		  $dividedby['07'] = "31";
		  $dividedby['08'] = "31";
		  $dividedby['09'] = "30";
		  $dividedby['10'] = "31";
		  $dividedby['11'] = "30";
		  $dividedby['12'] = "31";
		  $getall_leave_det = getamultiassoc($exearr);
		   if(count($getall_leave_det)>0)
		   {
		   $i=1;
		  foreach($getall_leave_det as $eachalowance)
		  {
		  ?>
		  <tr>
		    <td align="left" class="narmal">&nbsp;<?php echo $i; ?></td>
		    <td align="left" class="narmal"><?php echo $staff_used2; ?></td>
		    <td align="left" class="narmal"><?php echo $staff_used1; ?></td>
		    <td align="left" class="narmal"><?php echo $staff_used3; ?></td>
		    <td align="left" class="narmal"><?php  
		
			
			   if($staff_used>$total_leaves['total'])
				{
										   
						   
			   $balance =  $staff_used4- $staff_used11['bal']-$total_leaves['total']-$staff_used12['balance'];
			  echo  $balance; } else { echo $balance=0; }//echo displaydate($eachalowance[at_staff_date]);  ?></td>
		    <td align="left" class="adminfont"><font color="#AA1731">-<font color="#AA1731">
				<?php
				
				//echo $perdaysal = $staffdetails[st_basic]/$mondays;
				//echo $mondays;
				if($staff_used>$total_leaves['total'])
				{
				$a=	($balance*$staffdetails[st_basic])/30	;
				echo $_SESSION['eschools']['currency'].number_format(-$a, 2, '.', '');
				
				}
				/*$mondays = $dividedby[$selmonth];	
				if($eachalowance['at_staff_attend']!='H'){		
				$perdaysal = $staffdetails[st_basic]/$mondays;
				}else{
				$perdaysal_h = $staffdetails[st_basic]/$mondays;
				$perdaysal = $perdaysal_h/2;
				}
				echo $_SESSION['eschools']['currency'].number_format($perdaysal, 2, '.', '');*/
				$tot_deductions = ($tot_deductions+$a);
				
				$individualtot1 = $individualtot+$a;
				$individualtot=-($individualtot1);
			
				 ?></font></font>		    </td>		   
	      </tr>
		  <?php
		  $i++;
		   } ?>
		  <tr>
		    <td align="left" class="narmal"></td>
		    <td colspan="4" align="right" class="narmal">Total : &nbsp;</td>
		    <td align="left" class="adminfont"><font color="#AA1731">-<?php echo $_SESSION['eschools']['currency'].number_format($individualtot, 2, '.', '');
			$individualtot = 0;
			?></font></td>		   
	      </tr>
		    <?php }else { ?>		  
		  <tr>
		    <td colspan="6" align="center" class="narmal"> No Leave's</td>
	      </tr>		 
		  <?php } ?>
		   <tr>
		    <td colspan="6" align="center" ></td>
	      </tr>		   
		</table>
		<br />
		
		<?php /*?><table width="100%" border="1" cellspacing="0" cellpadding="0" class="tbl_grid">
		  <tr>
		    <td height="35" colspan="3" align="left" class="adminfont">&nbsp;&nbsp;Overtime Attendance</td>
	      </tr>
		  <tr class="bgcolor_02" height="22">
		    <td width="6%" align="left" class="admin">&nbsp;S.No</td>
			<td width="66%" align="left" class="admin">OT On</td>
			<td width="28%" align="left" class="admin">Amount</td>			
		  </tr>
		  <?php 		  
		 $exearr = "SELECT * FROM `es_attend_staff` WHERE `at_staff_id` =".$selempid." AND `at_staff_date` BETWEEN '".$selyear."-".$selmonth."-01       00:00:00' AND '".$selyear."-".$selmonth."-31 12:12:12' AND `at_staff_attend`='D'"; 
		  
		  $dividedby['01'] = "31";
		  $dividedby['02'] = "28";
		  $dividedby['03'] = "31";
		  $dividedby['04'] = "30";
		  $dividedby['05'] = "31";
		  $dividedby['06'] = "30";
		  $dividedby['07'] = "31";
		  $dividedby['08'] = "31";
		  $dividedby['09'] = "30";
		  $dividedby['10'] = "31";
		  $dividedby['11'] = "30";
		  $dividedby['12'] = "31";
		  $getall_extra_ot = getamultiassoc($exearr);
		   if(count($getall_extra_ot)>0)
		   {
		   $i=1;
		  foreach($getall_extra_ot as $eachalowance)
		  {
		  ?>
		  <tr>
		    <td align="left" class="narmal">&nbsp;<?php echo $i; ?></td>
		    <td align="left" class="narmal">
			   <?php echo displaydate($eachalowance[at_staff_date]);  ?>
			</td>
		    <td align="left" class="adminfont">
				<?php 
				$mondays = $dividedby[$selmonth];			
				$perdaysal = $staffdetails[st_basic]/$mondays;
				echo $_SESSION['eschools']['currency'].number_format($perdaysal, 2, '.', '');
				/*$tot_deductions = $tot_deductions+$perdaysal;
				$individualtot = $individualtot+$perdaysal;
				$individualtot = $individualtot+$perdaysal;
			    $tot_allowances = $tot_allowances+$perdaysal;
			 
				 ?></font></font>
		    </td>		   
	      </tr>
		  <?php
		  $i++;
		   } ?>
		  <tr>
		    <td align="left" class="narmal"></td>
		    <td align="right" class="narmal">Total : &nbsp;</td>
		    <td align="left" class="adminfont"><?php echo $_SESSION['eschools']['currency'].number_format($individualtot, 2, '.', '');
			$individualtot = 0;
			?></font></td>		   
	      </tr>
		    <?php }else { ?>		  
		  <tr>
		    <td colspan="3" align="center" class="narmal"> No Leave's</td>
	      </tr>		 
		  <?php } ?>
		   <tr>
		    <td colspan="3" align="center" ></td>
	      </tr>		   
		</table><?php */?>

		<br />
		<table width="85%" border="0" cellspacing="0" cellpadding="0">		 
		  <tr>
			<td>&nbsp;</td>
			<td class="adminfont" align="right">Basic Salary :&nbsp;</td>
			<td align="right" class="adminfont"><?php echo $_SESSION['eschools']['currency']?>&nbsp;<?php echo number_format($staffdetails['st_basic'], 2, '.', ''); ?></td>
		  </tr>
		  <tr>
		    <td>&nbsp;</td>
		    <td class="adminfont" align="right">Total Allowance :&nbsp;</td>
		    <td align="right" class="adminfont">+<?php echo $_SESSION['eschools']['currency']?>&nbsp;<?php echo number_format($tot_allowances, 2, '.', ''); ?></td>
	      </tr>
		  <tr>
		    <td>&nbsp;</td>
		    <td class="adminfont" align="right">Total Deductions :&nbsp;</td>
		    <td align="right" class="adminfont"><font color="#AA1731">-<?php echo $_SESSION['eschools']['currency']?>&nbsp;<?php echo number_format($tot_deductions, 2, '.', ''); ?></font></td>
	      </tr>		 
		  <tr>
		    <td>&nbsp;</td>
		    <td class="adminfont" align="right">Net Salary :&nbsp;</td>
		    <td align="right" class="adminfont"><b><?php 
			$netsal = ($staffdetails['st_basic']+$tot_allowances)-$tot_deductions;
			echo $_SESSION['eschools']['currency']?>&nbsp;<?php echo number_format($netsal, 2, '.', ''); ?></b></td>
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
	}
//End of print Employee wise pay slip

?>


<?php
// Employee Pay slip List
	if($action=='loanissueslist')
	{	
?>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
         <td height="3" colspan="3"></td>
	 </tr>
	  <tr>
		<td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Loan Issued To</span></td>
	  </tr>
	   <tr>
         <td height="3" colspan="3"></td>
	 </tr>
	  <tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="center" valign="top">
		<table width="100%" border="1"  cellspacing="0" cellpadding="0" class="tbl_grid">
		  <tr class="bgcolor_02" height="25">
			<td width="5%" align="left" valign="middle" >&nbsp;S.No</td>
			<td width="17%" align="left" valign="middle" >E Name</td>
			<td width="10%" align="center" valign="middle" >Issued On</td>
			<td width="15%" align="center" valign="middle" >Loan<br />
		    (Total Inst)</td>
			<td width="10%" align="center" valign="middle" >Interest </td>
			<td width="16%" align="center" valign="middle" >Paid&nbsp;<br />
		    (Inst completed) </td>
			<td width="11%" align="center" valign="middle" >Balance</td>
		
			<td width="16%" align="center" valign="middle" >Action </td>
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
		  <tr >
			<td valign="middle" class="narmal"><?php echo $i++; ?></td>
			<td align="left" valign="middle" class="narmal"><?php if($stafname['tcstatus']=='notissued') { ?><?php  echo $stafname['st_firstname'].'&nbsp;'.$stafname['st_lastname'];?><br/>
			[ID-<?php echo $eachrecord['es_staffid'];?>]<br/>
			Dept-<?php echo deptname($stafname['st_department']);
			}  else { ?><?php  echo $stafname['st_firstname'].'&nbsp;'.$stafname['st_lastname'];?><br/>
			[ID-<?php echo $eachrecord['es_staffid'];?>]<br/>
			Dept-<?php echo deptname($stafname['st_department']);
			 ?> <?php }?></td>
						<td align="center" valign="middle" class="narmal"><?php echo func_date_conversion("Y-m-d","d/m/Y",$eachrecord['created_on']);?></td>
			<td align="left" valign="middle" class="narmal"><?php echo  $_SESSION['eschools']['currency'].'&nbsp;'.$eachrecord['loan_amount']."(".$eachrecord['loan_instalments'].")";
			
			$totloan+=$eachrecord['loan_amount'];
			?></td>
			<td align="left" valign="middle" class="narmal"><?php 
			$intamt = ($eachrecord['loan_amount']*$eachrecord['loan_intrestrate'])/100;
			echo $_SESSION['eschools']['currency'].'&nbsp;'.number_format($intamt, 2, '.', '')." [".$eachrecord['loan_intrestrate']."]%"; $intamt_t +=$intamt;?></td>
			<td align="left" valign="middle" class="narmal"><?php echo $_SESSION['eschools']['currency'].'&nbsp;'.number_format($eachrecord['amountpaidtillnow'], 2, '.', '')."(".$eachrecord['noofinstalmentscompleted'].")";
			$paidamount+=$eachrecord['amountpaidtillnow'];
			?></td>
			<td align="left" valign="middle" class="narmal"><?php 
			
			
			$balance=($totalamountwithintrest-$eachrecord['amountpaidtillnow']); 
 echo $_SESSION['eschools']['currency'].'&nbsp;'.number_format($balance, 2, '.', ''); 
 
 $balanam+=$balance;
	?></td>
			<td align="center" valign="middle">
		<?php if(in_array('11_20',$admin_permissions)){?>

	<a href="?pid=35&action=viewloan&es_issueloanid=<?php echo $eachrecord['es_issueloanid'];?>&start=<?php echo $start;?>" title="View"><img src="images/b_browse.png" width="16" height="16" hspace="2"  border="0"/></a>
			<?php if(number_format($balance, 2, '.', '')>0){ ?><?php }?>
	<?php if(in_array('11_21',$admin_permissions)){?>
<a href="?pid=35&action=payamount&es_issueloanid=<?php echo $eachrecord['es_issueloanid'];?>&start=<?php echo $start;?>&staffid=<?php echo $eachrecord['es_staffid']; ?>" title="Pay Amount"><img src="images/am_pay.gif" width="16" height="16" hspace="2"  border="0"/></a>&nbsp;<?php }  if($eachrecord['amountpaidtillnow']==0){ if(in_array('11_23',$admin_permissions)){?><a href="?pid=35&action=editloan&es_issueloanid=<?php echo $eachrecord['es_issueloanid'];?>&start=<?php echo $start;?>"title="Edit Loan"><img src="images/b_edit.png" width="16" height="16" hspace="2"  border="0"/></a><?php }?>

<a href="?pid=35&action=viewloanpayment&es_issueloanid=<?php echo $eachrecord['es_issueloanid'];?>&start=<?php echo $start;?>" title="View"><img src="images/b_browse.png" width="16" height="16" hspace="2"  border="0"/></a>
<?php }}?>			</td>
		  </tr>
		  <?php
			

		   } ?>
		   <tr height="30"><td colspan="3" align="right" valign="middle"><b>Total:</b></td>
		   <td align="left" valign="middle"><?php echo  $_SESSION['eschools']['currency'].'&nbsp;'.number_format($totloan, 2, '.', '');?></td>
		   <td align="left" valign="middle"><?php echo  $_SESSION['eschools']['currency'].'&nbsp;'.number_format($intamt_t, 2, '.', '');?></td>
		   <td align="left" valign="middle"><?php echo  $_SESSION['eschools']['currency'].'&nbsp;'.number_format($paidamount, 2, '.', '');?></td>
		   <td align="left" valign="middle" ><?php echo $_SESSION['eschools']['currency'].'&nbsp;'.number_format($balanam, 2, '.', '') ;?></td>
		   <td width="16%"></td>
		   </tr>
		   <tr><td colspan="8" height="30">&nbsp;</td></tr>
		   <tr height="28">
			<td colspan="2" align="left" valign="middle" class="narmal">Loan&nbsp;Amount:</td>

			<td align="left" valign="middle" class="adminfont" colspan="2"><?php echo  $_SESSION['eschools']['currency'].'&nbsp;'.number_format($totloan, 2, '.', '');?></td>
			  <td colspan="3" class="narmal"></td>
		  </tr>
		   <tr height="28">
			<td colspan="2" align="left" valign="middle" class="narmal">Interest&nbsp;Amount:</td>

			<td align="left" valign="middle" class="adminfont" colspan="2"><?php echo  $_SESSION['eschools']['currency'].'&nbsp;'.number_format($intamt_t, 2, '.', '');?></td>  <td colspan="3" class="narmal"></td>
		  </tr>
		  <tr height="28">
			<td colspan="2" align="left" valign="middle" class="narmal">Total&nbsp;Amount:</td>

			<td align="left" valign="middle" class="adminfont" colspan="2"><?php $tot_am=($intamt_t+$totloan); echo  $_SESSION['eschools']['currency'].'&nbsp;'.number_format($tot_am, 2, '.', '');?></td>  <td colspan="3" class="narmal"></td>
		  </tr>
		  <tr height="28">
			<td colspan="2" align="left" valign="middle" class="narmal">Paid&nbsp;Amount :</td>

			<td align="left" valign="middle" class="adminfont" colspan="2"><?php echo  $_SESSION['eschools']['currency'].'&nbsp;'.number_format($paidamount, 2, '.', '');?></td>  <td colspan="3" class="narmal"></td>
		  </tr>
		  <tr height="28">
		<td colspan="2" align="left" valign="middle" class="narmal">Balance :</td>

			<td align="left" valign="middle" class="adminfont" colspan="2"><?php echo $_SESSION['eschools']['currency'].'&nbsp;'.number_format($balanam, 2, '.', '') ;?></td>  <td colspan="3" class="narmal"></td>
		  </tr>
		  
		  <tr height="28">
			<td colspan="8" class="narmal" align="center"><?php paginateexte($start, $q_limit, $no_rows, 'action='.$action);  ?></td>
		  </tr>
		  <tr height="28">
			<td colspan="8" class="narmal" align="center"><?php if (in_array("11_101", $admin_permissions)) {?><input name="Submit" type="button" onclick="newWindowOpen ('?pid=35&action=print_loan_list&start=<?php echo $start;?>');" class="bgcolor_02" value="Print" style="cursor:pointer;"/><?php }?></td>
		  </tr>
		   <?php } else { ?>
		  <tr>
			<td colspan="8" align="center" class="narmal"> No Records Found </td>
		  </tr>
		   <?php } ?>
		  <tr>
			<td colspan="8">&nbsp;</td>
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
	<script type="text/javascript">
function newWindowOpen(href)
{
    window.open(href,null, 'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');
}
</script>

<?php
// Employee Pay slip List
	if($action=='print_loan_list')
	{	
	$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_loanissue','Payroll','Loan Issues List','','Print','".$_SERVER['REMOTE_ADDR']."',NOW())";
     $log_insert_exe=mysql_query($log_insert_sql);
?>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
         <td height="3" ></td>
	 </tr>
	  <tr>
		<td height="25" colspan="2" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Loan Issued To</span></td>
	  </tr>
	   <tr>
         <td height="3" ></td>
	 </tr>
	  <tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="center" valign="top">
		<table width="100%" border="1"  cellspacing="0" cellpadding="0" class="tbl_grid">
		  <tr class="bgcolor_02" height="25">
			<td width="7%" align="center" valign="middle" >&nbsp;S.No</td>
		
			<td width="17%" align="left" valign="middle" >E Name</td>
		
			<td width="13%" align="center" valign="middle" >Issued On</td>
			<td width="16%" align="center" valign="middle" >Loan&nbsp;<br />
		    (Total Inst)</td>
			<td width="13%" align="center" valign="middle" >Interest </td>
			<td width="20%" align="center" valign="middle" >Paid&nbsp;<br />
		    (Inst completed) </td>
			<td width="14%" align="center" valign="middle" >Balance</td>
		
			
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
			<td align="center" valign="middle" class="narmal"><?php echo $i++; ?></td>

			<td align="left" valign="middle" class="narmal">
			<?php if($stafname['tcstatus']=='notissued') { ?><?php  echo $stafname['st_firstname'].'&nbsp;'.$stafname['st_lastname'];?><br/>
			[ID-<?php echo $eachrecord['es_staffid'];?>]<br/>
			Dept-<?php echo deptname($stafname['st_department']);
			}  else { ?><?php  echo $stafname['st_firstname'].'&nbsp;'.$stafname['st_lastname'];?><br/>
			[ID-<?php echo $eachrecord['es_staffid'];?>]<br/>
			Dept-<?php echo deptname($stafname['st_department']);
			 ?> <?php }?>
			
			</td>
		
			<td align="center" valign="middle" class="narmal"><?php echo func_date_conversion("Y-m-d","d/m/Y",$eachrecord['created_on']);?></td>
			<td align="left" valign="middle" class="narmal"><?php echo  $_SESSION['eschools']['currency'].'&nbsp;'.$eachrecord['loan_amount']."(".$eachrecord['loan_instalments'].")";
			
			$totloan+=$eachrecord['loan_amount'];
			?></td>
			<td align="left" valign="middle" class="narmal"><?php 
			$intamt = ($eachrecord['loan_amount']*$eachrecord['loan_intrestrate'])/100;
			echo $_SESSION['eschools']['currency'].'&nbsp;'.number_format($intamt, 2, '.', '')." [".$eachrecord['loan_intrestrate']."]%"; $intamt_t +=$intamt;?></td>
			<td align="left" valign="middle" class="narmal"><?php echo $_SESSION['eschools']['currency'].'&nbsp;'.number_format($eachrecord['amountpaidtillnow'], 2, '.', '')."(".$eachrecord['noofinstalmentscompleted'].")";
			$paidamount+=$eachrecord['amountpaidtillnow'];
			?></td>
			<td align="left" valign="middle" class="narmal"><?php 
			
			
			$balance=($totalamountwithintrest-$eachrecord['amountpaidtillnow']); 
 echo $_SESSION['eschools']['currency'].'&nbsp;'.number_format($balance, 2, '.', ''); 
 
 $balanam+=$balance;
	?></td>
			
		  </tr>
		  <?php
			

		   } ?>
		   <tr height="30"><td colspan="3" align="right" valign="middle"><b>Total:</b></td>
		   <td align="left" valign="middle"><?php echo  $_SESSION['eschools']['currency'].'&nbsp;'.number_format($totloan, 2, '.', '');?></td>
		   <td align="left" valign="middle"><?php echo  $_SESSION['eschools']['currency'].'&nbsp;'.number_format($intamt_t, 2, '.', '');?></td>
		   <td align="left" valign="middle"><?php echo  $_SESSION['eschools']['currency'].'&nbsp;'.number_format($paidamount, 2, '.', '');?></td>
		   <td align="left" valign="middle" ><?php echo $_SESSION['eschools']['currency'].'&nbsp;'.number_format($balanam, 2, '.', '') ;?></td>
		   </tr>
		   <tr><td colspan="7" height="30">&nbsp;</td></tr>
		   <tr height="28">
			<td colspan="2" align="left" valign="middle" class="narmal">Loan&nbsp;Amount:</td>

			<td align="left" valign="middle" class="adminfont" colspan="2"><?php echo  $_SESSION['eschools']['currency'].'&nbsp;'.number_format($totloan, 2, '.', '');?></td>
			 <td colspan="3" class="narmal"></td>
		  </tr>
		   <tr height="28">
			<td colspan="2" align="left" valign="middle" class="narmal">Interest&nbsp;Amount:</td>

			<td align="left" valign="middle" class="adminfont" colspan="2"><?php echo  $_SESSION['eschools']['currency'].'&nbsp;'.number_format($intamt_t, 2, '.', '');?></td>
			 <td colspan="3" class="narmal"></td>
		  </tr>
		  <tr height="28">
			<td colspan="2" align="left" valign="middle" class="narmal">Total&nbsp;Amount:</td>

			<td align="left" valign="middle" class="adminfont" colspan="2"><?php $tot_am=($intamt_t+$totloan); echo  $_SESSION['eschools']['currency'].'&nbsp;'.number_format($tot_am, 2, '.', '');?></td>  <td colspan="3" class="narmal"></td>
		  </tr>
		  <tr height="28">
			<td colspan="2" align="left" valign="middle" class="narmal">Paid&nbsp;Amount :</td>

			<td align="left" valign="middle" class="adminfont" colspan="2"><?php echo  $_SESSION['eschools']['currency'].'&nbsp;'.number_format($paidamount, 2, '.', '');?></td>  <td colspan="3" class="narmal"></td>
		  </tr>
		  <tr height="28">
		<td colspan="2" align="left" valign="middle" class="narmal">Balance :</td>

			<td align="left" valign="middle" class="adminfont" colspan="2"><?php echo $_SESSION['eschools']['currency'].'&nbsp;'.number_format($balanam, 2, '.', '') ;?></td>  <td colspan="3" class="narmal"></td>
		  </tr>
		   <?php } else { ?>
		  <tr>
			<td colspan="7" align="center" class="narmal"> No Records Found </td>
		  </tr>
		   <?php } ?>
		  <tr>
			<td colspan="7">&nbsp;</td>
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

	// Edit loan  Details 
if ($action=='editloan'){	
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
  </tr>
	<tr><td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Issue Loan</span></td></tr>
	  <tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="center" valign="top">
		<form method="post" action="" name="createloanform">
		<table width="95%" border="0" cellspacing="2" cellpadding="0">
		<tr><td colspan="7" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">&nbsp;</font></td>
		</tr>
		  <tr>
			<td width="22%">&nbsp;</td>
			<td width="1%">&nbsp;</td>
			<td width="25%">&nbsp;</td>
			<td width="1%">&nbsp;</td>
			<td width="13%">&nbsp;</td>
			<td width="1%">&nbsp;</td>
			<td width="37%">&nbsp;</td>
		  </tr>
		  
		 <?php $staffdetail= get_staffdetails($loandetail['es_staffid']);?>
		
		  <tr>
		    <td align="left"  class="narmal">Employee ID</td>
		    <td align="left">:</td>
		    <td align="left" class="narmal"><?php echo $loandetail['es_staffid']; ?></td>
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
		    <td align="left" class="narmal"><?php echo $_SESSION['eschools']['currency']?>&nbsp;<?php echo number_format($staffdetail['st_basic'], 2, '.', '');?><input type="hidden" name="basicsalary" value="<?php echo $staffdetail['st_basic'];?>" /></td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>
		  <tr>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>
		  <tr>
		    <td align="left" class="adminfont"> Loan Type </td>
		    <td align="left">:</td>
		    <td align="left" colspan="5"><?php echo ucfirst($loandetail['loan_name']); ?></td>
	      </tr>
		 
		<?php /*?>  <tr>
		    <td align="left" class="narmal">Type</td>
		    <td align="left">:</td>
		    <td align="left" class="narmal"><?php echo $loandetail['loan_type']; ?></td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr><?php */?>
		  <tr>
		    <td align="left" class="narmal">Max Limit </td>
		    <td align="left">:</td>
		    <td align="left" class="narmal">Rs&nbsp;<?php echo $loandetail['loan_maxlimit']; ?></td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>
		   <tr>
		    <td height="15" colspan="2" align="left" class="narmal"></td>
		    <td align="left" colspan="5" class="narmal"></td>
	      </tr>
		  <tr>
		    <td align="left" class="narmal">Loan Amount</td>
		    <td align="left">:</td>
		    <td align="left" class="narmal" colspan="3"><?php echo $_SESSION['eschools']['currency'];?> <input type="text" name="loantotamount" value="<?php echo $loantotamount; ?>" /><input type="hidden" name="loanmaxlimit" value="<?php echo $loandetail['loan_maxlimit']; ?>" /><font color="#FF0000"><b>*</b></font></td>
		  
	
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>
		  
		 
		  <tr>
		    <td align="left" class="narmal">Interest Rate </td>
		    <td align="left">:</td>
		    <td align="left" colspan="5" class="narmal"><?php echo $loandetail['loan_intrestrate']; ?><input type="hidden" name="loanintrestrate" value="<?php echo $loandetail['loan_intrestrate']; ?>" />
			
	        %</td>
	      </tr>
		  <tr>
		    <td align="left" class="narmal">No of Installment's</td>
		    <td align="left">:</td>
		    <td align="left" colspan="3" class="narmal"><input type="text" name="totnoofinstalments"  value="<?php echo $totnoofinstalments; ?>"/><font color="#FF0000"><b>*</b></font></td>
		
		  
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>
		  <tr>
		    <td align="left" class="narmal">Deduction starts from</td>
		    <td align="left">:</td>
		    <td align="left" colspan="5" class="narmal"><input  name="dedmonth" value="<?php echo $dedmonth; ?>"  type="text"size="14"  id="dedmonth" readonly/>
		    <a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.createloanform.dedmonth);return false;" ><img name="popcal" align="absmiddle" src="<?php echo JS_PATH ?>/WeekPicker/calbtn.gif" width="34" height="22" border="0" alt="" /></a>&nbsp;<iframe width=132 height=142 name="gToday:contrast:agenda.js" id="gToday:contrast:agenda.js" src="<?php echo JS_PATH ?>/DateRange/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe><font color="#FF0000"><b>*</b></font></td>
	      </tr>
		   <tr>
		    <td colspan="2" align="left" class="narmal"></td>
		    <td align="left" colspan="5" class="narmal"> <font  color="#FF0000">[Please select future date to deduct EMI from Salary.]</font></td>
	      </tr>
		  <tr>
		    <td align="left" class="narmal">Deduction Amount</td>
		    <td align="left">:</td>
		    <td align="left" colspan="5" class="narmal"><input readonly type="text" name="deductionamt" value="<?php echo $deductionamt; ?>" />
	        (Per month) 
            <input type="button" name="generate" value="Generate" class="bgcolor_02" onclick="javascript:generatevalue()" style="cursor:pointer;"/></td>
	      </tr>
		   <tr>
		    <td colspan="2" align="left" class="narmal"></td>
		    <td align="left" colspan="5" class="narmal">Total Amount = Loan Amount + ((Loan Amount x Interest Rate) / 100)
<br />Deduction Amount = (Total Amount / Installment)
</td>
	      </tr>
	<script type="text/javascript" >
function showAvatar()
		{
		
			var ch = document.createloanform.es_paymentmode.value;
			if (ch=='cash' || ch==''){
				document.getElementById("patiddivdisp").style.display="none";
			}else{
			document.getElementById("patiddivdisp").style.display="block";
			}
		}		  
</script>
		  <tr>
		    <td align="left" colspan="7">
			<table width="100%" border="0" cellspacing="0" cellpadding="0" >
											
											<tr>
                                       		 
                                       		  <td width="28%" align="left" valign="middle" class="admin">Payment Mode&nbsp;</td>
                                       		  <td width="2%" align="left" valign="middle">:</td>
                                       		  <td width="70%" align="left" valign="middle" class="admin">
                                              <?php
											$paymentmode=$voch1['es_paymentmode'];
											$vouchermode=$voch1['es_vouchertype'].'('.$voch1['es_vouchermode'].')';
											$ledgertype=$voch1['es_particulars'];
											   ?>
                                               
                                               <input name="es_paymentmode" type="text" value="<?php echo $paymentmode;?>" readonly="readonly" />
                                             <?php /*?> <select name="es_paymentmode" style="width:150px;" onchange="Javascript:showAvatar();" >
                                               <option value="">--Select--</option>
                                                <option <?php if($paymentmode=='cash') { echo "selected='selected'"; } ?> value ="cash">Cash</option>
                                                <option <?php if($paymentmode=='cheque') { echo "selected='selected'"; } ?> value ="cheque">Cheque</option>
                                                <option <?php if($paymentmode=='DD') { echo "selected='selected'"; } ?> value ="DD">DD</option>
                                              </select><font color="#FF0000"><b>*</b></font><?php */?></td>
                                   		    </tr>
											<tr>
									
											<td height="25" align="left" valign="middle" class="admin">Voucher&nbsp;Type</td>
											<td align="left" valign="middle">:</td>
											<td align="left" valign="middle" class="narmal">
                                            
                                             <input name="vocturetypesel" type="text" value="<?php echo $vouchermode;?>" readonly="readonly" />
                                             
                                             
                                         <?php /*?>   <select name="vocturetypesel" style="width:150px;">
											  <option value="">--Select--</option>
											  <?php 
																						$voucherlistarr = voucher_finance();
																						krsort($voucherlistarr);
																						foreach($voucherlistarr as $eachvoucher) {	?>
											  <option value="<?php echo $eachvoucher['es_voucherid']; ?>" <?php if ($vocturetypesel==$eachvoucher['es_voucherid']){  
											   echo 'selected'; } ?> ><?php echo $eachvoucher['voucher_type']; ?> ( <?php echo $eachvoucher['voucher_mode']; ?> )</option>
											  <?php } ?>
											</select><font color="#FF0000"><b>*</b></font><?php */?></td>
										    </tr>
                                            <tr>
												
												<td height="25" align="left" valign="middle" class="admin">Ledger&nbsp;Type</td>
												<td align="left" valign="middle">:</td>
											  <td align="left" valign="middle" class="narmal">
                                             
                                               <input name="es_ledger" type="text" value="<?php echo $ledgertype;?>" readonly="readonly" />
                                              <?php /*?><select name="es_ledger" style="width:150px;">
												  <option value="">--Select--</option>
												  <?php 
																							$ledgerlistarr = ledger_finance();
																							foreach($ledgerlistarr as $eachledger) { 
																							?>
												  <option value="<?php echo $eachledger['lg_name']; ?>" <?php if($es_ledger==$eachledger['lg_name']) { echo                        'selected'; } elseif($eachledger['lg_name']=='Staff Salary'){echo 'selected';} ?>><?php echo $eachledger['lg_name']; ?> </option>
												  <?php } ?>
											  </select><font color="#FF0000"><b>*</b></font><?php */?></td>
											</tr>
											<tr>
                                       		  <td align="left" valign="middle" colspan="4">
											  
											<?php /*?>  <div  id="patiddivdisp" style="display:none;" ><?php */?>
                                                  <?php
											  
											$bankname=$voch1['es_bank_name'];
											$accno=$voch1['es_bankacc'];
											$check_dd_no=$voch1['es_checkno'];
											$tellerno=$voch1['es_teller_number'];
											$pinno=$voch1['es_bank_pin'];
											
											
											   ?>
															
                                                     
                                                     <?php if($paymentmode!='cash'){?>
                                                            
                                                            	<table  border="1" cellspacing="0" class="tbl_grid" width="100%" cellpadding="3">
																						
																	<tr>
																		<td align="left" class="bgcolor_02" colspan="3">Bank Details </td>
																	</tr>
																	
																	<tr>
																		<td align="left"   width="22%" class="admin" >Bank Name </td>
																		<td align="center"  width="4%" class="admin">:</td>
																		<td align="left"  width="74%"><input type="text" readonly="readonly"  name="es_bank_name" value="<?php echo $voch1['es_bank_name'];?>" /></td>
																	</tr>
																	<tr>
																		<td align="left" class="admin"> Account Number</td>
																		<td align="center" class="admin">:</td>
																		<td align="left" ><input type="text" name="es_bankacc" readonly="readonly" value="<?php echo $voch1['es_bankacc'];?>" />  </td>
																	</tr>
																	<tr>
																		<td align="left" class="admin">Cheque / DD Number </td>
																		<td align="center" class="admin">:</td>
																		<td align="left"><input type="text" name="es_checkno" readonly="readonly" value="<?php echo $voch1['es_checkno'];?>" /> </td>
																	</tr>
																	<tr>
																		<td align="left" class="admin">Teller Number </td>
																		<td align="center" class="admin">:</td>
																		<td align="left"><input type="text" name="es_teller_number" readonly="readonly" value="<?php echo $voch1['es_teller_number'];?>" /></td>
																	</tr>
																	<tr>
																		<td align="left" class="admin">Pin </td>
																		<td align="center" class="admin">:</td>
																		<td align="left"><input type="text" name="es_bank_pin" readonly="readonly" value="<?php echo $voch1['es_bank_pin'];?>" /></td>
																	</tr>
																	
																	
																</table>	
                                                         <?php }?>       
                                                                
												<?php /*?></div><?php */?></td>
                                   		    </tr>
											<tr>
					<td align="left" class="narmal" colspan="2">Narration</td>
					<td align="left" colspan="3"><textarea name="es_narration" readonly="readonly" rows="3" cols="50"><?php echo $voch1['es_narration'];?></textarea></td>
				</tr>
			  </table>
			
			</td>
		   
	      </tr>
		  <tr>
		    <td colspan="7" align="center">
			<input type="submit" name="update" value="Save" class="bgcolor_02" style="cursor:pointer;"/>
			
			
			</td>
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
<?php	
	}
?>


<?php
	
if ($action=='viewloan' || $action=='print_loan_details'){
if($action=='print_loan_details'){
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_loanissue','Payroll','Loan Issues List','','Print','".$_SERVER['REMOTE_ADDR']."',NOW())";
     $log_insert_exe=mysql_query($log_insert_sql);
}	
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
		    <td align="left" class="narmal"><?php echo $_SESSION['eschools']['currency']?>&nbsp;<?php echo number_format($staffdetail['st_basic'], 2, '.', '');?></td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>
		  
		  <tr>
		    <td align="left" class="adminfont">Loan Type </td>
		    <td align="left">:</td>
		    <td align="left" colspan="5"><?php echo ucfirst($viewloandetails['loan_name']); ?></td>
	      </tr>
		 
		 <?php /*?> <tr>
		    <td align="left" class="narmal">Type</td>
		    <td align="left">:</td>
		    <td align="left" class="narmal"><?php echo $viewloandetails['loan_type']; ?></td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr><?php */?>
		  <tr>
		    <td align="left" class="narmal">Max Limit </td>
		    <td align="left">:</td>
		    <td align="left" class="narmal">Rs&nbsp;<?php echo $viewloandetails['loan_maxlimit']; ?></td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>
		  
		  <tr>
		    <td align="left" class="narmal">Loan Amount</td>
		    <td align="left">:</td>
		    <td align="left">Rs&nbsp;<?php echo $viewloandetails['loan_amount']; ?></td>
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
		    <td align="left" class="admin">Paid Installments </td>
		    <td align="left">:</td>
		    <td align="left" colspan="5" class="narmal"></td>
	      </tr>
		  <tr>
		    
		    <td align="left" colspan="7" class="narmal"><table width="96%" border="0" cellspacing="0" cellpadding="0">
  <tr  class="bgcolor_02">
    <td width="19%" height="25" align="center" valign="middle" class="narmal"><strong>S N0</strong></td>
    <td width="34%" align="center" valign="middle" class="narmal"><strong>Amount</strong></td>
	 <td width="26%" align="center" valign="middle" class="narmal"><strong>Issued On</strong></td>
    <td width="21%" align="center" valign="middle" class="narmal"><strong>Paid Date</strong></td>
  </tr>
  <?php 

  $i=1;
  $tot=0;
  $bal=0;
  $totalamountwithintrest=($viewloandetails['dud_amount']*$viewloandetails['loan_instalments']);
  
  $sel_loanpayment="select * from  es_loanpayment where   es_issueloanid=".$viewloandetails['es_issueloanid'];
  
  
 $lp_de= $db->getRows($sel_loanpayment);
  if(count($lp_de)>0){
  
  foreach($lp_de as $eachpay){
  $online_sql="select * from es_issueloan where es_issueloanid=".$eachpay['es_issueloanid'];
 $online_row=$db->getRow($online_sql);
  
  ?>
  <tr>
    <td align="center" valign="middle" class="narmal"><?php echo $i; ?></td>
    <td align="center" valign="middle" class="narmal"><?php  echo $_SESSION['eschools']['currency']. number_format($eachpay['inst_amount'], 2, '.', ''); ?></td>
	 <td align="center" valign="middle" class="narmal"><?php echo func_date_conversion("Y-m-d","d/m/Y",$online_row['created_on']);?></td>
	  <td align="center" valign="middle" class="narmal"><?php echo func_date_conversion("Y-m-d","d/m/Y",$eachpay['onmonth']);?></td>
  </tr>
  <?php $tot+=$eachpay['inst_amount'];$i++;}
  
  ?>
  <tr><td colspan="4">&nbsp;</td></tr>
   <tr>
    <td colspan="4"  align="left"><table width="96%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="16%" align="left" valign="middle"><strong>Amount Paid</strong></td>
    <td width="0%" align="left" valign="middle">:</td>
    <td width="84%" align="left" valign="middle"><?php echo $_SESSION['eschools']['currency'].number_format($tot,2, '.', '');?></td>
  </tr>
  <tr>
    <td align="left" valign="middle"><strong>Balance</strong></td>
    <td align="left" valign="middle">:</td>
    <td align="left" valign="middle"><strong><font color="#AA1731">
      <?php 
	$bal=($totalamountwithintrest-$tot);echo $_SESSION['eschools']['currency'].number_format($bal,2, '.', '');?></font></strong></td>
  </tr>
 
</table></td>
    </tr>
   <?php }else{?>
    <tr><td colspan="4" align="center">No Records Found</td></tr>
  <?php }?>
 
 </table>
</td>
	      </tr>
		  <?php if($action=='viewloan'){?>
		  <tr>
		    <td align="left" class="admin" height="30"></td>
		    <td align="left"></td>
			<td align="left"></td>
		    <td align="left" colspan="4" class="narmal" valign="middle"><a href="?pid=35&action=loanissueslist&start=<?php echo $start;?>" class="bgcolor_02" style="text-decoration:none; padding:3px;">Back</a> &nbsp;&nbsp;&nbsp;<?php if (in_array("11_102", $admin_permissions)) {?><input name="Submit" type="button" onclick="newWindowOpen ('?pid=35&action=print_loan_details&es_issueloanid=<?php echo $es_issueloanid;?>&start=<?php echo $start;?>');" class="bgcolor_02" value="Print" style="cursor:pointer;"/><?php }?></td>
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
	
	
	if ($action=='viewloanpayment' ){
if($action=='print_loan_details'){
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_loanissue','Payroll','Loan Issues List','','Print','".$_SERVER['REMOTE_ADDR']."',NOW())";
     $log_insert_exe=mysql_query($log_insert_sql);
}	
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
		    <td align="left" class="narmal"><?php echo $_SESSION['eschools']['currency']?>&nbsp;<?php echo number_format($staffdetail['st_basic'], 2, '.', '');?></td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>
		  
		  <tr>
		    <td align="left" class="adminfont">Loan Type </td>
		    <td align="left">:</td>
		    <td align="left" colspan="5"><?php echo ucfirst($viewloandetails['loan_name']); ?></td>
	      </tr>
		 
		<?php /*?>  <tr>
		    <td align="left" class="narmal">Type</td>
		    <td align="left">:</td>
		    <td align="left" class="narmal"><?php echo $viewloandetails['loan_type']; ?></td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr><?php */?>
		  <tr>
		    <td align="left" class="narmal">Max Limit </td>
		    <td align="left">:</td>
		    <td align="left" class="narmal">Rs&nbsp;<?php echo $viewloandetails['loan_maxlimit']; ?></td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>
		  
		  <tr>
		    <td align="left" class="narmal">Loan Amount</td>
		    <td align="left">:</td>
		    <td align="left">Rs&nbsp;<?php echo $viewloandetails['loan_amount']; ?></td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>
		   <tr>
		    <td align="left" class="narmal">Issued On</td>
		    <td align="left">:</td>
		    <td align="left"><?php if($viewloandetails['created_on']!='0000-00-00'){echo func_date_conversion("Y-m-d","d/m/Y",$viewloandetails['created_on']);} ?></td>
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
		<?php /*?>  <tr>
		    <td align="left" class="admin">Paid Installments </td>
		    <td align="left">:</td>
		    <td align="left" colspan="5" class="narmal"></td>
	      </tr><?php */?>
		  <tr>
		    
		    <td align="left" colspan="7" class="narmal"><table width="96%" border="0" cellspacing="0" cellpadding="0">
  <tr  class="bgcolor_02">
   <td width="16%" align="center" valign="middle" class="narmal"><strong>Payment Mode</strong></td>
       <td width="14%" align="center" valign="middle" class="narmal"><strong>Amount</strong></td>
    <td width="18%" height="25" align="center" valign="middle" class="narmal"><strong>Bank Name</strong></td>

    <td width="21%" align="center" valign="middle" class="narmal"><strong>Bank Account</strong></td>
    <td width="14%" height="25" align="center" valign="middle" class="narmal"><strong>Teller No.</strong></td>
    <td width="17%" align="center" valign="middle" class="narmal"><strong>Pin No</strong></td>

  </tr>
 <?php 
 
 
  $online_sql1="select * from es_issueloan where es_issueloanid=".$viewloandetails['es_issueloanid'];
	                                    $online_row1=$db->getRow($online_sql1);
									
 $online_sql="select * from es_voucherentry where es_voucherentryid=".$online_row1['voucherid'];
	                                    $online_row=$db->getRow($online_sql);
										
 ?>
  <tr>
    <td align="center" valign="middle" class="narmal"><?php if($online_row['es_paymentmode']!='') { echo $online_row['es_paymentmode'];} else { echo "---";} ?></td>
    <td align="center" valign="middle" class="narmal">Rs <?php if($online_row['es_amount']!='') { echo $online_row['es_amount'];} else { echo "---";} ?>.00</td>
	  <td align="center" valign="middle" class="narmal"><?php if($online_row['es_bank_name']!='') { echo $online_row['es_bank_name'];} else { echo "---";} ?></td>
	    <td align="center" valign="middle" class="narmal"><?php if($online_row['es_bankacc']!='') { echo $online_row['es_bankacc'];} else { echo "---";} ?></td>
		  <td align="center" valign="middle" class="narmal"><?php if($online_row['es_teller_number']!='') { echo $online_row['es_teller_number'];} else { echo "---";} ?></td>
		    <td align="center" valign="middle" class="narmal"><?php if($online_row['es_bank_pin']!='') { echo $online_row['es_bank_pin'];} else { echo "---";} ?></td>  </tr>
  
  
</table>
</td>
    <td align="left"></td>
	<td>&nbsp;</td>
  </tr>
  
 
 </table>
</td>
	      </tr>
		  <?php if($action=='viewloan'){?>
		  <tr>
		    <td align="left" class="admin" height="30"></td>
		    <td align="left"></td>
			<td align="left"></td>
		    <td align="left" colspan="4" class="narmal" valign="middle"><a href="?pid=35&action=loanissueslist&start=<?php echo $start;?>" class="bgcolor_02" style="text-decoration:none; padding:3px;">Back</a> &nbsp;&nbsp;&nbsp;<?php if (in_array("11_102", $admin_permissions)) {?><input name="Submit" type="button" onclick="newWindowOpen ('?pid=35&action=print_loan_details&es_issueloanid=<?php echo $es_issueloanid;?>&start=<?php echo $start;?>');" class="bgcolor_02" value="Print" style="cursor:pointer;"/><?php }?></td>
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


<?php
if ($action=='payamount'){	
?>
<form method="post" action="" name="payam">
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
		    <td align="left" class="narmal"><?php echo $_SESSION['eschools']['currency']?>&nbsp;<?php echo number_format($staffdetail['st_basic'], 2, '.', '');?></td>
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
		    <td align="left" class="narmal">Rs&nbsp;<?php echo $viewloandetails['loan_maxlimit']; ?></td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>
		  
		  <tr>
		    <td align="left" class="narmal">Loan Amount</td>
		    <td align="left">:</td>
		    <td align="left" class="narmal">Rs&nbsp;<?php echo $viewloandetails['loan_amount']; ?></td>
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
		    <td align="left" class="admin">Paid Installments </td>
		    <td align="left"></td>
		    <td align="left" colspan="5" class="narmal"></td>
	      </tr>
		  <tr>
		    
		    <td align="left" colspan="7" class="narmal"><table width="96%" border="0" cellspacing="0" cellpadding="0">
  <tr  class="bgcolor_02">
    <td width="34%" height="25" align="center" valign="middle" class="narmal"><strong>S NO</strong></td>
    <td width="43%" align="center" valign="middle" class="narmal"><strong>Amount</strong></td>
    <td width="23%" align="center" valign="middle" class="narmal"><strong>Date</strong></td>
  </tr>
  <?php 
  $i=1;
  $tot=0;
  $bal=0;
  $totalamountwithintrest=($viewloandetails['dud_amount']*$viewloandetails['loan_instalments']);
  $sel_loanpayment="select * from  es_loanpayment where es_issueloanid=".$viewloandetails['es_issueloanid'];
  
  
 $lp_de= $db->getRows($sel_loanpayment);
  if(count($lp_de)>0){
  foreach($lp_de as $eachpay){?>
  <tr>
    <td align="center" valign="middle" class="narmal"><?php echo $i; ?></td>
    <td align="center" valign="middle" class="narmal"><?php  echo $_SESSION['eschools']['currency']. number_format($eachpay['inst_amount'], 2, '.', ''); ?></td>
	  <td align="center" valign="middle" class="narmal"><?php echo func_date_conversion("Y-m-d","d/m/Y",$eachpay['onmonth']);?></td>
  </tr>
  <?php $tot+=$eachpay['inst_amount'];$i++;}}?>
  <tr><td colspan="3">&nbsp;</td></tr>
   <tr>
    <td  align="left"><table width="96%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" valign="middle"><strong>Amount Paid</strong></td>
    <td align="left" valign="middle">:</td>
    <td align="left" valign="middle">&nbsp;<?php echo $_SESSION['eschools']['currency']?>&nbsp;<?php echo number_format($tot,2, '.', '');?></td>
  </tr>
  <tr>
    <td align="left" valign="middle"><strong>Balance</strong></td>
    <td align="left" valign="middle">:</td>
    <td align="left" valign="middle">&nbsp;<strong><font color="#AA1731"><?php 
	$bal=($totalamountwithintrest-$tot);echo $_SESSION['eschools']['currency']?>&nbsp;<?php echo number_format($bal,2, '.', '');?></font></strong></td>
  </tr>
</table>
</td>
    <td align="left"></td>
	<td>&nbsp;</td>
  </tr>
  
 
</table>
</td>
	      </tr>
		  
		  <tr><td colspan="7">&nbsp;</td></tr>
		  
		  <tr><td colspan="7">
		     <table >
					 <tr>
								<td align="left"   width="48%" class="narmal" >Balance&nbsp;Amount </td>
								<td align="center"  width="4%">:</td>
								<td align="left"  width="48%"><input type="text" name="balanceamount" value="<?php echo number_format($bal,2, '.', '');?>"  readonly/>
								<input type="hidden" name="staffid" value="<?php echo $staffid; ?>" />
								
								</td>
				</tr>
                  <tr>
					<td  align="left" class="narmal" colspan="2">Voucher Type&nbsp;:</td>
					<td  align="left" class="narmal" colspan="3">
						<select name="vocturetypesel" style="width:130px;">
						<?php 
						$voucherlistarr = voucher_finance();
						krsort($voucherlistarr);
						foreach($voucherlistarr as $eachvoucher) {	?>
						<option value="<?php echo $eachvoucher['es_voucherid']; ?>" <?php if ($vocturetypesel==$eachvoucher['es_voucherid']){                        echo 'selected'; } elseif($eachvoucher['es_voucherid']==9){ echo 'selected';}?> ><?php echo $eachvoucher['voucher_type'];                        ?> ( <?php echo $eachvoucher['voucher_mode']; ?> )</option>   
						<?php } ?></select>					</td>
				</tr>
				<tr>
					<td align="left" class="narmal" colspan="2">Ledger Type&nbsp;: </td>
					<td align="left" colspan="3">
					    <select name="es_ledger" style="width:130px;">
						<?php 
						$ledgerlistarr = ledger_finance();
						foreach($ledgerlistarr as $eachledger) { 
						?>
						<option value="<?php echo $eachledger['lg_name']; ?>" <?php if($es_ledger==$eachledger['lg_name']) { echo 'selected'; } elseif($eachledger['lg_name']=='Staff Salary'){echo 'selected';} ?>><?php echo $eachledger['lg_name']; ?>						                        </option>
						<?php } ?>
						</select>					
					</td>
				</tr>
				
				
				
				<tr>
<script type="text/javascript" >
function showAvatar()
		{
			var ch = document.payam.es_paymentmode.value;
			if (ch=='cash'){
				document.getElementById("patiddivdisp").style.display="none";
			}else{
			document.getElementById("patiddivdisp").style.display="block";
			}
		}		  
</script>
					<td align="left" class="narmal" colspan="2">Payment mode&nbsp;:</td>
					<td align="left" class="narmal" colspan="3"> 
					   <select name="es_paymentmode" onchange="Javascript:showAvatar();" style="width:130px;">
					   <option value="cash">Cash</option>
					   <option value="cheque">Cheque</option>
					   <option value="dd">DD</option>                        
					   </select>					</td>
				</tr>
				<tr>
					<td colspan="5" align="center">		
						<div  id="patiddivdisp" style="display:none;" >
						<table  border="1" cellspacing="0" class="tbl_grid" width="100%" cellpadding="3">
						    					
							<tr>
								<td align="left" class="bgcolor_02" colspan="3">Bank Details </td>
							</tr>
							
							<tr>
								<td align="left"   width="48%" class="narmal" >Bank Name </td>
								<td align="center"  width="4%">:</td>
								<td align="left"  width="48%"><input type="text" name="es_bank_name" value="<?php echo $es_bank_name;?>" /></td>
							</tr>
							<tr>
								<td align="left"  class="narmal"> Account Number</td>
								<td align="center">:</td>
								<td align="left" ><input type="text" name="es_bankacc" value="<?php echo $es_bankacc;?>" /><font color="#FF0000">                                <b>*</b></font></td>
							</tr>
							<tr>
								<td align="left" class="narmal">Cheque / DD Number </td>
								<td align="center">:</td>
								<td align="left"><input type="text" name="es_checkno" value="<?php echo $es_checkno;?>" /><font color="#FF0000">                                <b>*</b></font></td>
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
						</div>					</td>
				</tr>
				<tr>
					<td align="left" class="narmal" colspan="2">Narration</td>
					<td align="left" colspan="3"><textarea name="es_narration" rows="3" cols="50"></textarea></td>
				</tr>
				<tr>
					<td align="left" class="narmal" colspan="2"></td>
					<td align="left" colspan="3"><?php if($bal!=0) { ?><input type="submit"  name="updatepayamount"  value="Update" class="bgcolor_02" onclick="return confirm('Are you sure you want to Update ?')"/><?php } ?></td>
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
</form>
<?php	
	}
?>



<script type="text/javascript">
function generatevalue()
{
	percent = document.createloanform.loanintrestrate.value;
	maxamount = document.createloanform.loanmaxlimit.value;
	loanamount = document.createloanform.loantotamount.value;
	instalments = document.createloanform.totnoofinstalments.value;
	if(parseFloat(loanamount)>parseFloat(maxamount))
	{
	alert ("Enter Valid Amount You Exeeded The Limit");
	return (false);
	}
	totamt = parseFloat(loanamount)+((parseFloat(loanamount)*parseFloat(percent))/100);
	instalments = parseFloat(totamt)/parseInt(instalments);
	document.createloanform.deductionamt.value=Math.round(instalments*100)/100;
	return(true);
}

function newWindowOpen(href)
{
    window.open(href,null, 'width=700,height=500,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');
	

}
</script>