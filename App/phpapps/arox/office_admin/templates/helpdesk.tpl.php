<script type="text/JavaScript">
function validatecls(){
	if (document.getElementById('classid_t').value ==""){
			alert("Please Select Class");
			return false;
		}
}

function newWindowOpen(href){
	
    window.open(href,null, 'width=900,height=900,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');
}

function selectone(start){
	var f = document.paystudentfee;
	var eCount = f.elements.length;
	var count = 0;
	for(i = 1; i < eCount; i++){
		if(f.elements[i].type == "checkbox" && f.elements[i].checked == true){
			count = 1;
		}
	}

	if(count == 0){
		alert("Please select atleast one fee.");
		return false;
	}
	else{
		return true;
	}
}

</script>
<?php 
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}

if ($action == 'view') { 
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
	 </tr>
	<tr><td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Help Desk</span></td></tr>
    <tr>
                <td width="1px" class="bgcolor_02" ></td>
                <td height="25" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font><br /></td>
                 <td width="1px" class="bgcolor_02" ></td></td>
              </tr>		
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td  align="left" valign="top">
			<form method="post" action="" name="fetchstudent">
			<div><div >&nbsp;</div>
				<span align="left"  >&nbsp;&nbsp;Student Registration No :</span>
				<input type="text" name="studentid"  value="<?php if(isset($studentid)){echo $studentid;} ?>" /><font color="#FF0000">&nbsp;*</font>&nbsp;<select name="ac_year" style="width:180px;">
                         <option value="" >Select Academic Year</option>
                         <?php  foreach($school_details_res as $each_record) { ?>
                         <option value="<?php echo $each_record['es_finance_masterid']; ?>" <?php if ($each_record['es_finance_masterid']==$ac_year) { echo "selected='selected'"; }?>><?php echo displaydate($each_record['fi_ac_startdate'])." To ".displaydate($each_record['fi_ac_enddate']); ?> </option>
                         <?php } ?>
                     </select><font color="#FF0000">&nbsp;*</font>&nbsp;
				<input type="submit" name="getstudetails" value="Go" class="bgcolor_02" style="padding-left:10px;padding-right:10px;cursor:pointer;"/></div>
			</form>
		</td>
		<td width="1" class="bgcolor_02"></td>
	</tr>
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td height="10" >&nbsp;</td>
		<td width="1" class="bgcolor_02"></td>
	</tr>
	<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>
</table>
<?php

	if (is_array($studetails) && count($studetails)>0 ) { 
?>
<form method="post" action="" name="paystudentfee">
<table width="100%" border="0" cellspacing="2" cellpadding="0" align="center">
   <tr><td colspan="3" height="1" class="bgcolor_02"><td></tr>
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="center" valign="top" style="padding-bottom:10px;">

<table width="100%" border="0" cellspacing="2" cellpadding="0" align="center">
	<tr>
	<td align="left" class="narmal" width="20%">Student Name  </td>
	<td align="left" class="narmal" width="0%">:</td>
	<td align="left" class="narmal" width="30%"><?php echo $studetails['pre_name']; ?></td>
	<td align="left" class="narmal" width="50%" rowspan="7"><?php if($studetails['pre_image']!=""){echo displayimage("images/student_photos/".$studetails['pre_image'], "127"); } ?></td>
	</tr>
	<tr>
		<td align="left" class="narmal" width="20%">User Name </td>
		<td align="left" class="narmal" width="0%">:</td>
		<td align="left" class="narmal" width="30%"><?php echo $studetails['pre_student_username']; ?></td>						
	</tr>
	<tr>
		<td align="left" class="narmal">Registration No</td>
		<td align="left" class="narmal">:</td>
		<td align="left" class="narmal"><?php echo $studetails['es_preadmissionid']; ?></td>
	</tr>
	<tr>
		<td align="left" class="narmal">Class</td>
		<td align="left" class="narmal">:</td>
		<td align="left" class="narmal"><?php  echo classname($prev_class); ?></td>
	</tr>
    <!--<tr>
					<td align="left" class="narmal">Roll No</td>
					<td align="left" class="narmal">:</td>
					<td align="left" class="narmal"><?php //echo $section_det['roll_no']; ?></td>
				</tr>-->
                <!--<tr>
					<td align="left" class="narmal">Section</td>
					<td align="left" class="narmal">:</td>
					<td align="left" class="narmal"><?php //echo $section_det['section_name']; ?></td>
				</tr>-->
	<!--<tr>
		<td align="left" class="narmal">E-mail</td>
		<td align="left" class="narmal">:</td>
		<td align="left" class="narmal"><?php //echo $studetails['pre_emailid']; ?></td>
	</tr>-->
	<tr>
		<td align="left" class="narmal">Father/Guardian&nbsp;Name </td>
		<td align="left" class="narmal">:</td>
		<td align="left" class="narmal"><?php echo $studetails['pre_fathername']; ?></td>
	</tr>
	<tr>
		<td align="left" class="narmal">Address</td>
		<td align="left" class="narmal">:</td>
		<td align="left" class="narmal"><?php echo $studetails['pre_address1']; ?></td>
	</tr>
	<tr>
		<td align="left" class="narmal">Mobile Number</td>
		<td align="left" class="narmal">:</td>
		<td align="left" class="narmal"><?php echo $studetails['pre_mobile1']; ?></td>
		<td align="left" class="narmal">&nbsp;</td>
	</tr>
	
	<tr>
		<td align="left" class="narmal">Status</td>
		<td align="left" class="narmal">:</td>
		<td align="left" class="narmal"><?php
		$online_sql="select * from es_preadmission where es_preadmissionid=".$studetails['es_preadmissionid'];
 $online_row=$db->getRow($online_sql);
		if($online_row['status']!='inactive'){ echo "---";} else { ?><span style="color:#FF0000"><?php echo"Transfered"; } ?>
		</td>
		<td align="left" class="narmal">&nbsp;</td>
	</tr>
	<tr>
		<td align="left" class="narmal">&nbsp;</td>
		<td align="left" class="narmal">&nbsp;</td>
		<td align="left" class="narmal">&nbsp;</td>
		<td align="left" class="narmal">&nbsp;</td>
	</tr>					 
</table>

<table width="100%" border="1" cellspacing="0" cellpadding="0" class="tbl_grid">
	<tr>
		<td align="left" class="bgcolor_02" height="25" colspan="7">&nbsp;Fee Details</td>
	</tr>
    <tr>
		<td align="left"  height="5" colspan="7"></td>
	</tr>
	<tr class="bgcolor_02" height="25">
		<td align="center" class="admin" width="6%">&nbsp;S No</td>                            
		<td align="center" class="admin" width="20%">Particulars</td>
		<td align="center" class="admin" width="17%">Amount</td>
		<td align="center" class="admin" width="19%">Installments</td>
		<td align="center" class="admin" width="17%"> Paid </td>
		<td align="center" class="admin" width="17%"> Waived </td>
		<td align="center" class="admin" width="21%"> Installments Paid </td> 
	</tr>
<?php 
	if($ac_year != $current_yearid ){
	 $getfeelistsql = "SELECT * FROM `es_feemaster` WHERE `fee_class`='".$prev_class."' 
					  AND fee_fromdate = '" . $from_finance . "' AND fee_todate = '" . $to_finance . "'";
	}else{
	$getfeelistsql = "SELECT * FROM `es_feemaster` WHERE `fee_class`='".$prev_class."' 
					  AND fee_fromdate = '" . $from_finance . "' AND fee_todate = '" . $to_finance . "'"; 
	}
	$getfeelist = getamultiassoc($getfeelistsql);
	if (count($getfeelist)>0){
		$i = 1;
		$feetotamt  = 0;
		$feeamtleft = 0;
		$waivedfee = 0;
		foreach($getfeelist as $eachfeedet){
			$feetotamt = $feetotamt+$eachfeedet['fee_amount'];
?>
				<tr>
					<td align="left" class="narmal">&nbsp;<?php echo $i++; ?></td>
					<td align="left" class="narmal"><?php echo $eachfeedet['fee_particular'];?></td>
					<td align="left" class="narmal"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachfeedet['fee_amount'], 2, '.', '');?></td>
					<td align="left" class="narmal"><?php echo $eachfeedet['fee_instalments'];?></td>
					<td align="left" class="narmal">
			<?php
			if($pre_year != $current_yearid ){
			   $getfeepaidamt = "SELECT SUM(feeamount),SUM(fee_waived) FROM `es_feepaid` WHERE `studentid`=" . $studetails['es_preadmissionid'] . "                                              AND `particularid`=" . $eachfeedet['es_feemasterid'] . " AND `class`='" . $prev_class . "'";
			  }else{
				$getfeepaidamt = "SELECT SUM(feeamount),SUM(fee_waived) FROM `es_feepaid` WHERE `studentid`=" . $studetails['es_preadmissionid'] . "                                        AND `particularid`=" . $eachfeedet['es_feemasterid'] . " AND `class`='" . $studetails['pre_class'] . "'";
				}
				$amttotpaid = getarrayassoc($getfeepaidamt);					
				echo $_SESSION['eschools']['currency']."&nbsp;".number_format($amttotpaid['SUM(feeamount)'], 2, '.', '');
				$feeamtleft=$feeamtleft+$amttotpaid['SUM(feeamount)'];
			?>
					</td>
					<td  align="left" class="narmal"><?php if($amttotpaid['SUM(fee_waived)']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($amttotpaid['SUM(fee_waived)'], 2, '.', '');
						$waivedfee += $amttotpaid['SUM(fee_waived)'];
						}else{echo "---";}?> </td>
					<td align="left" class="narmal">
			<?php
					if($pre_year != $current_yearid ){
					  $getfeepaidlist = "SELECT * FROM `es_feepaid` WHERE `studentid`=".$studetails['es_preadmissionid']." 
					  AND `particularid`=".$eachfeedet['es_feemasterid']." AND `class`='".$prev_class."' 
					  AND fi_fromdate = '" .$from_finance. "' AND fi_todate = '".$to_finance."'";
				}else{
					 $getfeepaidlist = "SELECT * FROM `es_feepaid` WHERE `studentid`=".$studetails['es_preadmissionid']." 
					 AND `particularid`=".$eachfeedet['es_feemasterid']." AND `class`='".$studetails['pre_class']."' 
					 AND fi_fromdate = '" .$from_finance. "' AND fi_todate = '".$to_finance."'";
				}
				$noofinstpaid = sqlnumber($getfeepaidlist);
				echo $noofinstpaid;
				
				?></td>
				</tr>
<?php } ?>
	<tr>
		<td colspan="6" align="right" class="narmal">Total Fees :</td>
		
		<td align="right" class="adminfont"> <?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($feetotamt, 2, '.', ''); ?></td>
	</tr>
	<tr>
		<td colspan="6" align="right" class="narmal">Amount Paid Till Now :</td>
		<td align="right" class="adminfont"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($feeamtleft, 2, '.', ''); ?></td>
	</tr>
	
	
	<tr>
					<td colspan="6" align="right" class="narmal">Balance :</td>
					<td align="right" class="adminfont"><?php
										
					 echo $_SESSION['eschools']['currency']."&nbsp;".number_format($feetotamt-$feeamtleft, 2, '.', ''); ?></td>
				</tr>
				<tr>
					<td colspan="6" align="right" class="narmal">Amount Waived Till Now :</td>
					<td align="right" class="adminfont"><?php					
					 if($waivedfee>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($waivedfee, 2, '.', ''); }else{echo "---";}?></td>
				</tr>
				<tr>
					<td colspan="6" align="right" class="narmal">Amount To be Paid :</td>
					<td align="right" class="adminfont"><?php
					$assadsf = $feetotamt-$feeamtleft;
					$bal = 	$assadsf -$waivedfee;	
							
					 echo $_SESSION['eschools']['currency']."&nbsp;".number_format($bal, 2, '.', '');?></td>
				</tr>
	
			  <?php } else { ?>
	<tr><td colspan="6" align="center" class="narmal">No Fees for this Class</td></tr>
			  <?php }  ?>						   
</table>
<br />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
         <td height="3" colspan="3"></td>
	 </tr>
	  <tr>
		<td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Misc. Fine Details </span></td>
	  </tr>
	   <tr height="25">
			    <td class="bgcolor_02" ></td>
                  				<td  valign="middle" class="narmal" align="right"></td>
								 <td class="bgcolor_02"></td>
          					 </tr
	  ><tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="left" valign="top">
		
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
			<tr><td colspan="7" align="left"></td></tr>
  <tr class="bgcolor_02" height="25">
    <td align="left" valign="middle">S.No</td>
    <td align="left" valign="middle">Fine Type</td>
    <td align="left" valign="middle">Charged On</td>
    <td align="left" valign="middle">Fine Amount</td>
    <td align="left" valign="middle">Fine Paid</td>
    <td align="left" valign="middle" >Fine waived</td>
    
  </tr>
  <?php						
		if(count($studentwise_det)>=1){
         $slno = $start+1;
		 $rw =1;
		 $tot_fine_amount =0;
		 $tot_paid_amount =0;
		 $tot_deduction_allowed =0;
foreach ($studentwise_det as $eachrecord)
      {
	if($slno%2==0)
		$rowclass = "even";
		else
		$rowclass = "odd";
		
		
?>       
  <tr class="<?php echo $rowclass;?>">
    <td height="15" align="left" valign="middle">&nbsp;<?php echo $slno;?></td>
    <td height="15" align="left" valign="middle">&nbsp;<?php echo ucfirst($eachrecord['fine_name']); ?></td>
    <td height="15" align="left" valign="middle">&nbsp;<?php echo func_date_conversion("Y-m-d","d/m/Y",$eachrecord['created_on']); ?></td>
    <td height="15" align="left" valign="middle">&nbsp;
      <?php if($eachrecord['fine_amount']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['fine_amount'], 2, '.', '');}  ?></td>
    <td height="15" align="left" valign="middle">&nbsp;
      <?php if($eachrecord['paid_amount']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['paid_amount'], 2, '.', '');}  ?></td>
    <td height="15" align="left" valign="middle" >&nbsp;
      <?php if($eachrecord['deduction_allowed']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['deduction_allowed'], 2, '.', '');}?></td>
    
  </tr>
  <?php  $slno++;
         $tot_fine_amount +=$eachrecord['fine_amount'];
		 $tot_paid_amount +=$eachrecord['paid_amount'];
		 $tot_deduction_allowed +=$eachrecord['deduction_allowed'];
  
  }?>
  <tr height="25">
    <td></td>
    <td></td>
    <td><b>Total:</b></td>
    <td><?php if($tot_fine_amount>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($tot_fine_amount, 2, '.', '');}  ?></td>
    <td><?php if($tot_paid_amount>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($tot_paid_amount, 2, '.', '');}  ?></td>
    <td><?php if($tot_deduction_allowed>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($tot_deduction_allowed, 2, '.', '');}  ?></td>
    
  </tr>
   <tr height="25">
    <td colspan="6">
	<table width="100%" border="0">
  <tr>
    <td width="13%" align="left" valign="middle">Total</td>
    <td width="1%" align="left" valign="middle">:</td>
    <td width="86%" align="left" valign="middle"><?php if($tot_fine_amount>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($tot_fine_amount, 2, '.', '');}  ?></td>
  </tr>
  <tr>
    <td align="left" valign="middle">Fine Paid</td>
    <td align="left" valign="middle">:</td>
    <td align="left" valign="middle"><?php if($tot_paid_amount>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($tot_paid_amount, 2, '.', '');}  ?></td>
  </tr>
  <tr>
    <td align="left" valign="middle">Remaining</td>
    <td align="left" valign="middle">:</td>
    <td align="left" valign="middle"><?php 
	$remaining = $tot_fine_amount-$tot_paid_amount;
	
	if($remaining>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($remaining, 2, '.', '');}  ?></td>
  </tr>
  <tr>
    <td align="left" valign="middle">Fine Waived</td>
    <td align="left" valign="middle">:</td>
    <td align="left" valign="middle"><?php if($tot_deduction_allowed>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($tot_deduction_allowed, 2, '.', '');}  ?></td>
  </tr>
  <tr>
    <td align="left" valign="middle">Balance</td>
    <td align="left" valign="middle">:</td>
    <td align="left" valign="middle"><font color="#FF0000"><b>
      <?php 
	$Balance = $remaining-$tot_deduction_allowed;
	
	if($Balance>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($Balance, 2, '.', '');}else{echo "---";}  ?></b></font></td>
  </tr>
  </table>

	
	</td>
   
  </tr>
  <?php }else{?>
  <tr><td colspan="6" align="center" class="narmal"> No Records Found</td></tr>
  <?php }?>
   <tr height="5">
    <td colspan="6" align="center"></td>
   
  </tr>
  
  
</table>

		</td>
		<td width="1" class="bgcolor_02"></td>
	  </tr>	  
	  <tr>
		<td height="1" colspan="3" class="bgcolor_02"></td>
	  </tr>
	</table>
<br />
<table width="100%" border="0" cellspacing="0" cellpadding="0">

<tr><td height="25" colspan="3" align="left" class="bgcolor_02">&nbsp;&nbsp;Books Pending</td>
</tr>

<tr>
<td width="1" class="bgcolor_02"></td>
<td  align="center" valign="top" style="padding-bottom:10px;"><br />
<table width="95%" cellspacing="0" cellpadding="0" border="1" class="tbl_grid">

<tr class="bgcolor_02" height="25">
<td width="8%" align="left" class="admin">S No</td>
<td width="" align="left" class="admin">Title</td>
<td width="20%" align="center" class="admin">Issued On</td>
</tr>
<?php 
$rownum = 0;
if (count($bookissue_det)>0) { 
foreach ($bookissue_det as $each_book){
$zibracolor = ($rownum%2==0)?"even":"odd";
$rownum++;
?>	
<tr >
<td align="left" class="narmal"><?php echo $rownum; ?></td>
<td align="left" class="narmal"><?php echo ucwords(bookname($each_book['bki_bookid'])); ?></td>

<td align="center" class="narmal"><?php echo func_date_conversion("Y-m-d","d-m-Y",$each_book['issuedate']); ?>	</td>
</tr>
<?php  }
} else { ?>
<tr>
  <td colspan="3" align="center" class="narmal">No records found </td>
</tr>
<?php } ?>		 

</table>
</td>

<td width="1" class="bgcolor_02"></td>
</tr>	  
<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>

</table>
<br />
<table width="100%" border="0" cellspacing="0" cellpadding="0">

<tr>
  <td height="25" colspan="3" align="left" class="bgcolor_02">&nbsp;&nbsp;Library Pending Fine</td>
</tr>

<tr>
<td width="1" class="bgcolor_02"></td>
<td  align="center" valign="top" style="padding-bottom:10px;"><br />
<table width="95%" cellspacing="0" cellpadding="0" border="1" class="tbl_grid">

<tr class="bgcolor_02" height="25">
<td width="3%" align="left" valign="top" class="admin">S No</td>
<td width="14%" align="left" valign="top" class="admin">Accession No.</td>
<td width="7%" align="left" valign="top" class="admin">Title</td>

<td width="13%" align="center" valign="top" class="admin">Received On</td>
<td width="10%" align="center" valign="top" class="admin"> Amount</td>

<td width="10%" align="center" valign="top" class="admin">Fine Paid</td>
<td width="13%" align="center" valign="top" class="admin">Fine Waived </td>
<td width="11%" align="center" valign="top" class="admin">Paid On</td>
<td width="19%" align="center" valign="top" class="admin">Returned On</td>


</tr>
<?php 
$rownum = 0;
if (count($libfine_det)>0) {
$finetotamt  = 0;
$fineddt=0;
$finepaidt=0;
foreach ($libfine_det as $each_fine){
$finetotamt = $finetotamt+$each_fine['es_libbookfine'];
$rownum++;
$qery="select * from es_bookissue where es_bookissueid=".$each_fine['es_libbookbwid'];
$bname=$db->getrow($qery);
//echo $each_fine['es_libbookbwid'];
?>	
<tr >
<td align="left" class="narmal"><?php echo $rownum; ?></td>
<td align="left" class="narmal"><?php echo $bname['bki_bookid']; ?></td>
<td align="left" class="narmal"><?php echo ucwords(bookname($bname['bki_bookid'])); ?></td>


<td align="center" class="narmal"><?php echo func_date_conversion("Y-m-d","d-m-Y",$each_fine['es_libbookdate']); ?>	</td>
<td align="center" class="narmal"><?php echo $_SESSION['eschools']['currency'].number_format($each_fine['es_libbookfine'], 2, '.', ''); ?>	</td>


<td align="left" class="narmal"><?php echo  $_SESSION['eschools']['currency'].number_format($each_fine['fine_paid'], 2, '.', ''); 
$finepaidt+=$each_fine['fine_paid'];

?>	</td>
<td align="left" class="narmal"><?php echo  $_SESSION['eschools']['currency'].number_format($each_fine['fine_deducted'], 2, '.', '');
$fineddt+=$each_fine['fine_deducted'];



?>	</td>
<td align="center" class="narmal"><?php if($each_fine['paid_on']!="" && $each_fine['paid_on']!='0000-00-00'){echo func_date_conversion("Y-m-d","d-m-Y",$each_fine['paid_on']);} ?>	</td>
<td align="center" class="narmal"><?php if($each_fine['returnedon']!="" && $each_fine['returnedon']!='0000-00-00'){echo func_date_conversion("Y-m-d","d-m-Y",$each_fine['returnedon']);} ?>	</td>
</tr>
<?php  }?>
<tr><td colspan="4" align="right"> Total Amount</td>
<td align="center" class="adminfont"><?php echo $_SESSION['eschools']['currency'].number_format($finetotamt, 2, '.', '');?></td>
<td align="left" class="adminfont"><?php echo $_SESSION['eschools']['currency'].number_format($finepaidt, 2, '.', '');?></td>
<td align="left" class="adminfont" colspan="2"><?php echo $_SESSION['eschools']['currency'].number_format($fineddt, 2, '.', '');?></td>
<td></td>
</tr>
<?php
} else { ?>
<tr>
  <td colspan="9" align="center" class="narmal">No records found </td>
</tr>
<?php } ?>		 

</table>
</td>

<td width="1" class="bgcolor_02"></td>
</tr>	  
<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>

</table>
<br />

<table width="100%" border="0" cellspacing="0" cellpadding="0">

<tr><td height="25" colspan="3" align="left" class="bgcolor_02">&nbsp;&nbsp;Hostel Details</td>
</tr>
<?php 

   $sql_qry = "SELECT * , B.buld_name as buidingname , R.room_rate as dueamount FROM  es_hostelbuld B , es_hostelroom R , es_roomallotment RA 
	WHERE RA.es_personid =".$studentid." AND RA.es_persontype='student' 
	AND RA.es_hostelroomid = R.es_hostelroomid
	AND B.es_hostelbuldid  = R.es_hostelbuldid
	AND RA.alloted_date BETWEEN '".$from_acad."' AND '".$to_acad."' order by RA.alloted_date DESC limit 0,1";
	$payamount_details = $db->getrow($sql_qry);
	$sqlnm=sqlnumber($payamount_details);
	if($sqlnm>0){
	$sql_per="select es_personid from es_roomallotment where es_roomallotmentid=".$payamount_details['es_roomallotmentid']." and es_persontype='student' and alloted_date BETWEEN '".$from_acad."' AND '".$to_acad."' order by alloted_date DESC limit 0,1";

	$par_details = $db->getrow($sql_per);
	$par_con=sqlnumber($par_details);
	}
?>
<tr>
<td width="1" class="bgcolor_02"></td>
<td  align="center" valign="top" style="padding-bottom:10px;"><br />
<table width="95%" cellspacing="0" cellpadding="0" border="1" class="tbl_grid">

<tr class="bgcolor_02" height="25">
<td width="34%" align="left" class="admin">Building&nbsp;Name</td>
<td width="23%" align="left" class="admin">Room&nbsp;Type</td>

<td width="10%" align="center" class="admin">Room&nbsp;No</td>
<?php /*?><td width="18%" align="center" class="admin">Room&nbsp;Partner</td><?php */?>
<td width="15%" align="center" class="admin">Monthly&nbsp;Rent</td>

</tr>

<tr >
<td align="left" class="narmal"><?php echo ucwords($payamount_details['buidingname']);?></td>
<td align="left" class="narmal"><?php echo ucwords($payamount_details['room_type']);?></td>
<td align="center" class="narmal"><?php echo $payamount_details['room_no'];?></td>

<?php /*?><td align="center" class="narmal"><?php if($par_con>0){$stparnem= get_studentdetails($par_details['es_personid']);  echo $stparnem['pre_name'];}else{echo "---";} ?></td><?php */?>
<td align="center" class="narmal"><?php echo $payamount_details['room_rate'];?></td>

</tr>

	 

</table>
</td>

<td width="1" class="bgcolor_02"></td>
</tr>	  
<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>

</table>
<br />
<table width="100%" border="0" cellspacing="0" cellpadding="0">

<tr><td height="25" colspan="3" align="left" class="bgcolor_02">&nbsp;&nbsp;Returned Items in Hostel</td>
</tr>

<tr>
<td width="1" class="bgcolor_02"></td>
<td  align="center" valign="top" style="padding-bottom:10px;"><br />
<table width="95%" cellspacing="0" cellpadding="0" border="1" class="tbl_grid">

<tr class="bgcolor_02" height="25">
<td width="8%" align="left" class="admin">S No</td>
<td width="" align="left" class="admin">Item Name</td>

<td width="20%" align="center" class="admin">Quantity</td>
<td width="20%" align="center" class="admin">Issued On</td>
</tr>
<?php 
$rownum = 0;
if (count($hostelitems_det)>0) {
$finetotamt  = 0;
foreach ($hostelitems_det as $each_item){

$rownum++;
?>	
<tr >
<td align="left" class="narmal"><?php echo $rownum; ?></td>
<td align="left" class="narmal"><?php echo ucwords(hostelitemname($each_item['hostelperson_itemname'])); ?></td>


<td align="center" class="narmal"><?php echo ucwords($each_item['hostelperson_itemqty']); ?></td>
<td align="center" class="narmal"><?php echo func_date_conversion("Y-m-d H:i:s","d-m-Y H:i",$each_item['hostelperson_itemissued']); ?>	</td>
</tr>
<?php  }
} else { ?>
<tr><td colspan="4" align="center" class="narmal"><?php if($roomallot_rows==0){?>*Room not alloted<?php } else{?>No Items Issued <?php }?></td></tr>
<?php } ?>		 

</table>
</td>

<td width="1" class="bgcolor_02"></td>
</tr>	  
<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>

</table>
<br />
<?php if($roomallot_rows>=1){?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">

<tr><td height="25" colspan="3" align="left" class="bgcolor_02">&nbsp;&nbsp;Hostel Amount Due</td>
</tr>

<tr>
<td width="1" class="bgcolor_02"></td>
<td  align="center" valign="top" style="padding-bottom:10px;"><br />
<table width="95%" cellspacing="0" cellpadding="0" border="1" class="tbl_grid">

<tr class="bgcolor_02" height="25">
<td width="8%" align="left" class="admin">S No</td>
<td width="" align="left" class="admin">Month</td>

<td width="20%" align="center" class="admin">Amount</td>

</tr>
<?php 
$rownum = 0;
if (count($hostelamount_det1)>0) {
$finetotamt  = 0;
foreach ($hostelamount_det as $each_amount){

$rownum++;
?>	
<tr >
<td align="left" class="narmal"><?php echo $rownum; ?></td>
<td align="left" class="narmal"><?php echo func_date_conversion("Y-m-d","d-m-Y",$each_amount['due_month']); ?></td>
<td align="center" class="narmal"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($each_amount['room_rate'], 2, '.', '');?></td>
</tr>
<?php  }
} else { ?>
<tr><td colspan="3" align="center" class="narmal">No Dues</td></tr>
<?php } ?>		 

</table>
</td>

<td width="1" class="bgcolor_02"></td>
</tr>	  
<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>

</table>
<br />
<?php }?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">

<tr><td height="25" colspan="3" align="left" class="bgcolor_02">&nbsp;&nbsp;Assignment Details</td>
</tr>

<tr>
<td width="1" class="bgcolor_02"></td>
<td  align="center" valign="top" style="padding-bottom:10px;"><br />
<table width="95%" cellspacing="0" cellpadding="0" border="1" class="tbl_grid">

<tr class="bgcolor_02" height="25">
<td width="8%" align="left" class="admin">S No</td>
<td width="" align="left" class="admin">Subject</td>
<td width="20%" align="center" class="admin">Assignment</td>
<td width="20%" align="center" class="admin">Date</td>
<td width="20%" align="center" class="admin">Last Date</td>
</tr>
<?php 
$rownum = 0;
if (count($assignments_det)>0) {
$finetotamt  = 0;
foreach ($assignments_det as $each_assignment){

$rownum++;
?>	
<tr >
<td align="left" class="narmal"><?php echo $rownum; ?></td>
<td align="left" class="narmal"><?php echo ucwords(subjectname($each_assignment['as_suject'])); ?></td>
<td align="center" class="narmal"><?php echo ucwords($each_assignment['as_name']); ?>	</td>
<td align="center" class="narmal"><?php echo func_date_conversion("Y-m-d","d-m-Y",$each_assignment['as_createdon']); ?></td>
<td align="center" class="narmal"><?php echo func_date_conversion("Y-m-d","d-m-Y",$each_assignment['as_lastdate']); ?></td>

</tr>
<?php  }
} else { ?>
<tr><td colspan="5" align="center" class="narmal">No Assignments Added </td></tr>
<?php } ?>		 

</table>
</td>

<td width="1" class="bgcolor_02"></td>
</tr>	  
<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>

</table>
<br />
<table width="100%" border="0" cellspacing="0" cellpadding="0">

<tr><td height="25" colspan="3" align="left" class="bgcolor_02">&nbsp;&nbsp;Acadamic Exam Details</td>
</tr>
<?php 
if(count($exam_data)>0){
foreach($exam_data as $each_exam){
	$examname = $each_exam['es_examid']; 
$exam_qry ="SELECT ae.*, ed.*, m.*, s.*, e.es_examname, std.es_preadmissionid, cl.es_classname FROM es_exam_academic ae, es_exam_details ed,es_subject s, es_marks m, es_exam e, es_preadmission std, es_classes cl WHERE std.es_preadmissionid = '$studentid' AND cl.es_classesid = std.pre_class AND ae.class_id = cl.es_classesid AND ae.exam_id = '$examname' AND ed.academicexam_id = ae.es_exam_academicid AND s.es_subjectid = ed.subject_id AND e.es_examid = ae.exam_id AND m.es_examdetailsid = ed.es_exam_detailsid AND m.es_marksstudentid = '$studentid' AND ae.academic_year = '$from_acad$to_acad' ORDER BY ed.subject_id";
$reportdetails = $db->getRows($exam_qry);

if(count($reportdetails) > 0)
{
$tot_total = 0;
$tot_pass = 0;
$tot_secured = 0;
foreach($reportdetails as $report) {
	$clasid = $report['class_id'];
	$sub_id = $report['subject_id'];
	$subArray[$sub_id]['subject_name'] = $report['es_subjectname'];
	$subArray[$sub_id]['exam_date'] = $report['exam_date'];
	$subArray[$sub_id]['exam_duration'] = $report['exam_duration'];
	$subArray[$sub_id]['total_marks'] = $report['total_marks'];
	$subArray[$sub_id]['pass_marks'] = $report['pass_marks'];
	$subArray[$sub_id]['marks_obtined'] = $report['es_marksobtined'];
	
	$tot_total = $tot_total + $report['total_marks'];
	$tot_pass = $tot_pass + $report['pass_marks'];
	$tot_secured = $tot_secured + $report['es_marksobtined'];
	
}
$sub_data = gettingSubject($clasid);
$percentagemark = ($tot_secured/$tot_total)*100;
}

?>
<tr>
<td width="1" class="bgcolor_02"></td>
<td  align="center" valign="top">
<table width="95%" border="0">
<tr>
<td align="center" class='admin'><?php 
if (count($sub_data) > 0 && count($reportdetails) > 0){echo ucwords($each_exam['es_examname']);}?></td>
</tr>
<tr>
<td align="center" valign="middle">
<table width="100%" border="1" cellspacing="0" cellpadding="1" class="tbl_grid">
			
			
		<?php 
			if (count($sub_data) > 0 && count($reportdetails) > 0){
		?>
				<tr class="bgcolor_02">
					<td width="5%" align="center" height="20" class="admin">S&nbsp;No</td>
					<td width="15%" align="center" class="admin">Subject</td>
					<td width="25%" align="center" class="admin">Exam Date</td>
					<td width="10%" align="center" class="admin">Duration</td>
					<td width="10%" align="center" class="admin">Total&nbsp;Marks</td>
					<td width="19%" align="center" class="admin">Pass Marks</td>
					<td width="16%" align="center" class="admin">Obtained</td>
				</tr>
			<?php
			 
				$slno = 1;
				foreach($sub_data as $sb)
				{
					$sbid = $sb['es_subjectid'];
					if (count($subArray[$sbid]['marks_obtined'])>0) {
					?>
					<tr>
						<td align="center"><?php echo $slno;?></td>
						<td align="center" class="narmal"><?php echo $subArray[$sbid]['subject_name'];?></td>
						<td align="center" class="narmal"><?php echo displayDateAndTime($subArray[$sbid]['exam_date']);?></td>
						<td align="center" class="narmal"><?php echo $subArray[$sbid]['exam_duration'];?></td>
						<td align="center" class="narmal"><?php echo $subArray[$sbid]['total_marks'];?></td>
						<td align="center" class="narmal"><?php echo $subArray[$sbid]['pass_marks'];?></td>
						<td align="center" class="narmal"><?php echo $subArray[$sbid]['marks_obtined'];?></td>
				   </tr>
	  <?php 
					}
					$slno++;
				}
			?>
					<tr>
						<td align="right" colspan="4">Total Marks : </td>
						<td align="center" class="narmal"><?php echo $tot_total;?></td>
						<td align="center" class="narmal"><?php echo $tot_pass;?></td>
						<td align="center" class="narmal"><?php echo $tot_secured;?></td>
				   </tr>
				   <tr>
						<td align="right" colspan="6"><b>Percentage : </b></td>
						<td align="center" class="narmal"><b><?php echo number_format($percentagemark,2,'.','');?>%</b></td>
				   </tr>
				   
			<?php
			} else {
?>
				<tr>
					<td colspan="7" align="center">
						<table width="98%" border="0" cellspacing="0" cellpadding="1" >
							<tr >
								<td align='center' class="narmal">No Records Found</td>		
							</tr>
						</table>
					</td>
				 </tr>
			<?php
				}
			?>
			</table></td>
</tr>
</table></td>
<td width="1" class="bgcolor_02"></td>
</tr>
<?php } }else{?>
<tr>
  <td align="center" class="narmal" colspan="3">No Records Found </td>
</tr>
<?php }?>


<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>

</table>
<br />
<table width="100%" border="0" cellspacing="0" cellpadding="0">

<tr><td height="25" colspan="3" align="left" class="bgcolor_02">&nbsp;&nbsp;Attendence Details</td>
</tr>

<tr>
<td width="1" class="bgcolor_02"></td>
<td  align="center" valign="top"><br />
<table width="95%" cellspacing="0" cellpadding="0" border="0">

<tr>
<td height="25" align="left" valign="middle" style="padding-bottom:10px;">
<table width="100%" cellspacing="0" cellpadding="0" border="1" class="tbl_grid">
<?php 
$from = $from_acad;
$to = $to_acad;
$at_std_wise_class_report = $prev_class;
$at_stdregno = $studentid;
//$workdays = get_workingdays_studentwise1($from,$to,$at_std_wise_class_report,$at_stdregno,$at_std_wise_name);
//$studentwiseReportList = get_StudWise_report($from,$to,$at_std_wise_class_report,$at_stdregno);
$workdays = get_workingdays_studentwise1($from_acad,$to_acad,$prev_class,$studentid,$studetails['pre_name']);
$studentwiseReportList = get_StudWise_report($from_acad,$to_acad,$prev_class,$studentid);

if (is_array($studentwiseReportList)&& count($studentwiseReportList)>0 && $workdays!=0 ) { ?>

<tr class="bgcolor_02">
<td width="7%" height="18" align="center" class="admin"><span class="admin">S&nbsp;No</span></td>
<td width="24%" align="center" class="admin"><span class="admin">Working&nbsp;Days</span></td>
<td width="19%" align="center" class="admin"><span class="admin">&nbsp;Present days</span></td>
<td width="25%" align="center" class="admin"><span class="admin">&nbsp;Absent days</span></td>
<td width="23%" align="center" class="admin"><span class="admin">&nbsp;Attendance&nbsp;%</span></td>
</tr>
<?php						

//$presentdays = get_presentdays_studentwise($from,$to,$at_std_wise_class_report,$at_stdregno,$at_std_wise_name);
$presentdays = get_presentdays_studentwise($from_acad,$to_acad,$prev_class,$studentid,$studetails['pre_name']);
$rw = 1;
$slno = $start+1;
foreach ($studentwiseReportList as $student)
{
if($rw%2==0)
$rowclass = "even";
else
$rowclass = "odd";


?>                      <tr class="<?php echo $rowclass;?>">
<td align="center" class="narmal"><?php echo $slno;?></td>
<td align="center" class="narmal"><?php echo $workdays;?></td>
<td align="center" class="narmal"><?php echo $presentdays;?></td>
<td align="center" class="narmal"><?php echo $workdays-$presentdays;?></td>
<?php if($workdays!="" && $workdays>=1) { 
$percent = ($presentdays/$workdays) * 100; ?>
<td align="center" class="narmal"><?php echo sprintf("%01.2f",$percent)."%";?></td>
<?php 
}
else {
?>
<td width="2%" align="center"><?php echo "0%"; ?></td>
<?php } ?>
</tr>
<?php                  
$rw++;
$slno++;
}
?>
</table>
<table width="100%" height="33" border="0">
<?php 
}

if($workdays==0){

?>
<tr>
  <td align="center" class="narmal">No Records Found </td>
</tr>
<?php }?>
</table></td>
</tr>		 

</table><br />
</td>

<td width="1" class="bgcolor_02"></td>
</tr>	  
<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>

</table>
<br />
<?php if($workdays-$presentdays>0){?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">

<tr><td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;Absent day Details</td></tr>

<tr>
<td width="1" class="bgcolor_02"></td>
<td  align="center" valign="top" style="padding-bottom:10px;"><br />
<table width="95%" cellspacing="0" cellpadding="0" border="1" class="tbl_grid">

<?php 
$sel_absent = "SELECT * FROM `es_attend_student`  WHERE `at_attendance_date`  BETWEEN '$from_acad' AND '$to_acad' AND `at_attendance` = 'A' AND `at_reg_no` = '$studentid' ORDER BY `at_attendance_date` DESC ";
$class_absenties = getamultiassoc($sel_absent); 

if (is_array($class_absenties)&& count($class_absenties)>0 ) { 
?>
<tr class="bgcolor_02">
<td width="20%" height="18" align="center"><span class="admin">S&nbsp;No</span></td>

<td width="30%" align="center"><span class="admin">Absent Date</span></td>
<td width="30%" align="center"><span class="admin">Day</span></td>
<td width="20%" align="center"><span class="admin">week</span></td>
</tr>
<?php						
$rw = 1;
$slno = $start+1;
foreach ($class_absenties as $eachabsent)
{
if($rw%2==0)
$rowclass = "even";
else
$rowclass = "odd";
$day1	  = get_day($eachabsent['at_attendance_date']);
$week = DatabaseFormat($eachabsent['at_attendance_date'], 'd');
?>                      
<tr class="<?php echo $rowclass;?>">
<td align="center" class="narmal"><?php echo $slno;?></td>

<td align="center" class="narmal"><?php echo displayDate($eachabsent['at_attendance_date']);?></td>
<td align="center" class="narmal"><?php echo  DatabaseFormat($eachabsent['at_attendance_date'], 'l');?></td>
<td align="center" class="narmal"><?php if ($week <= 7 ) {
echo "1";
} elseif ($week <= 14 ) {
echo "2";
}elseif ($week <= 21 ) {
echo "3";
}else {
echo "4";
} ?></td>
</tr>
<?php                  
$rw++;
$slno++;
}
}
?>		 

</table>
</td>

<td width="1" class="bgcolor_02"></td>
</tr>	  
<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>

</table>
<br />
<?php }?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">

<tr><td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;Notice Details</td></tr>

<tr>
<td width="1" class="bgcolor_02"></td>
<td  align="center" valign="top" style="padding-bottom:10px;"><br />

	<table width="95%" cellspacing="0" cellpadding="0" border="1" class="tbl_grid">


<tr class="bgcolor_02">
<td width="20%" height="18" align="center"><span class="admin">S&nbsp;No</span></td>


<td width="30%" align="center"><span class="admin">Number of Received Notices</span></td>
<td width="20%" align="center"><span class="admin">Replied Notices</span></td>
</tr>
                     
<tr class="even">
<td align="center" class="narmal"><?php echo "1";?></td>
<td align="center" class="narmal"><?php  if($no_records>0){?><?php echo $no_records; ?><?php }else{echo "----";}?></td>

<td align="center" class="narmal"><?php  if(count($noticereplies_det)>0){?><?php echo count($noticereplies_det); ?><?php }else{echo "----";}?></td>

</tr>
	 

</table>
	
	
	
</td>

<td width="1" class="bgcolor_02"></td>
</tr>	  
<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>

</table>

<br />
<table width="100%" border="0" cellspacing="0" cellpadding="0">

<tr><td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;Messages</td></tr>

<tr>
<td width="1" class="bgcolor_02"></td>
<td  align="center" valign="top" style="padding-bottom:10px;"><br />

	<table width="95%" cellspacing="0" cellpadding="0" border="1" class="tbl_grid">
<?php
$qe="select pre_class from es_preadmission_details where es_preadmissionid=$studentid  AND pre_fromdate = '" . $from_acad . "' AND  pre_todate = '" . $to_acad . "'";

$clid=$db->getRow($qe);
$pre_class_id=$clid['pre_class'];

$qe_incharg="select es_staffid from es_incharge where es_classesid=$pre_class_id";
$inid=$db->getRow($qe_incharg);
if($inid['es_staffid']>=1){
 $st="select st_firstname,st_lastname from es_staff where es_staffid=".$inid['es_staffid'];
$stfname=$db->getRow($st);
}


?>

<tr class="bgcolor_02">
<td width="20%" height="18" align="center"><span class="admin">S&nbsp;No</span></td>

<td width="20%" height="18" align="center"><span class="admin">Incharge</span></td>

<td width="20%" align="center"><span class="admin">Receved Messages</span></td>
<td width="30%" align="center"><span class="admin">Number of sent Messages</span></td>
</tr>
                     
<tr class="even">
<td align="center" class="narmal"><?php echo "1";?></td>
<td align="center" class="narmal"><?php  if($stfname['st_firstname']!="" || $stfname['st_lastname']!=""){echo ucwords($stfname['st_firstname'] ."".$stfname['st_lastname']);}else{echo "---";}?></td>
<td align="center" class="narmal"><?php  if($no_records_messages>0){?><?php echo $no_records_messages; ?><?php }else{echo "----";}?></td>

<td align="center" class="narmal"><?php  if(count($noticereplies_det_messages)>0){?><?php echo count($noticereplies_det_messages); ?><?php }else{echo "----";}?></td>

</tr>
	 

</table>
	
	
	
</td>

<td width="1" class="bgcolor_02"></td>
</tr>	  
<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>

</table>
<br />

<table width="100%" border="0" cellspacing="0" cellpadding="0">

<tr>
  <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;Transport Unpaid Fee Details </td>
</tr>

<tr>
<td width="1" class="bgcolor_02"></td>
<td  align="center" valign="top" style="padding-bottom:10px;"><br />

	<table width="95%" cellspacing="0" cellpadding="2" border="1" class="tbl_grid">
<?php
$query_sql="select * from es_trans_board_allocation_to_student where student_staff_id=".$studentid." AND status='Active' and created_on BETWEEN '".$from_acad."' AND '".$to_acad."' ";
$query_exe=mysql_query($query_sql);
$query_row=mysql_fetch_array($query_exe);
if($query_row['board_id']!=""){
$board_sql="select * from es_trans_board where id=".$query_row['board_id'] ." and created_on BETWEEN '".$from_acad."' AND '".$to_acad."'";
$board_exe=mysql_query($board_sql);
$board_row=mysql_fetch_array($board_exe);

$route_sql="select * from es_trans_route where id=".$board_row['route_id']." and created_on BETWEEN '".$from_acad."' AND '".$to_acad."'";
$route_exe=mysql_query($route_sql);
$route_row=mysql_fetch_array($route_exe);
}

$pay_sql="select * from es_trans_payment_history where studentid=".$studentid." AND amount_paid='0' AND deduction='0' and created_on BETWEEN '".$from_acad."' AND '".$to_acad."'";
$pay_exe=mysql_query($pay_sql);
$pay_num=mysql_num_rows($pay_exe);

 $trans="select board_id from es_trans_board_allocation_to_student where student_staff_id=".$studentid." and type='student' and status='Active' and created_on BETWEEN '".$from_acad."' AND '".$to_acad."' order by id Desc";
$trn_tp=$db->getrow($trans);



$bdid=$trn_tp['board_id'];
if($bdid>0 && $bdid!=""){

 $transss="select vehicle_id from es_trans_vehicle_allocation_to_board where board_id=".$bdid." AND status='Active' and created_on BETWEEN '".$from_acad."' AND '".$to_acad."' order by id Desc";
$trnss_tp=$db->getrow($transss);




if($trnss_tp['vehicle_id']>0 && $trnss_tp['vehicle_id']!=""){
 $tran_dts="select tr_transport_type,tr_vehicle_no from es_trans_vehicle where es_transportid=".$trnss_tp['vehicle_id']." AND status='Active' order by es_transportid Desc";
$tran_tp_details=$db->getrow($tran_dts);


// to get driver id of this vechile

$dret="select driver_id  from es_trans_driver_allocation_to_vehicle where vehicle_id =".$trnss_tp['vehicle_id']." AND status='Active'  and created_on BETWEEN '".$from_acad."' AND '".$to_acad."' order by id Desc";
$driverid_details=$db->getrow($dret);
}

}





if($query_row['board_id']!=""){
?>
<tr>
<td align="left" colspan="4"><span class="admin">Route : <?php echo $route_row['route_title']; ?></span></td>
</tr>
<tr>
<td align="left" colspan="4"><span class="admin">Board : <?php echo $board_row['board_title']; ?></span></td>
</tr>
<tr>
<td align="left" colspan="4"><span class="admin">Type of Transport : <?php echo $tran_tp_details['tr_transport_type']; ?></span></td>
</tr>
<tr>
<td align="left" colspan="4"><span class="admin">Vehicle Reg. No: <?php echo $tran_tp_details['tr_vehicle_no']; ?></span></td>
</tr>
<tr>
<td align="left" colspan="4"><span class="admin">Name of the Driver: <?php $diver_det=get_staffdetails($driverid_details['driver_id']);


echo $diver_det['st_firstname']."".$diver_det['st_lastname']; ?></span></td>
</tr>
<tr>
<td align="left" colspan="4"><span class="admin">Contact No. of Driver: <?php echo $diver_det['st_pemobileno']; ?></span></td>
</tr>
<?php }?>
<?php if($pay_num!=0){?>
<tr class="narmal">
<td width="8%" align="center"><span class="admin">Sl no</span></td>
<td width="35%" align="center"><span class="admin">Month</span></td>
<td width="33%" align="center"><span class="admin">Amount Due </span></td>
<td width="24%" align="center"><span class="admin">Created on</span></td>
</tr>
<?php $i=1;while($pay_row=mysql_fetch_array($pay_exe)){?>
<tr class="narmal">
<td width="8%" align="center"><?php echo $i;$i++;?></td>
<td width="35%" align="center"><?php echo func_date_conversion('Y-m-d', 'd/m/Y', $pay_row['due_month']);?></td>
<td width="33%" align="center"><?php echo $pay_row['pay_amount'];?> Rs</td>
<td width="24%" align="center"><?php echo func_date_conversion('Y-m-d', 'd/m/Y', $pay_row['created_on']);?></td>
</tr>
<?php }}?>
</table>
	
	
	
</td>

<td width="1" class="bgcolor_02"></td>
</tr>	  
<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>

</table>
			
		
		</td>
		<td width="1" class="bgcolor_02"></td>
	</tr>
	<tr><td colspan="3" height="1" class="bgcolor_02"><td></tr>
</table>
</form>
<?php 
	
	}
}

?>


 
