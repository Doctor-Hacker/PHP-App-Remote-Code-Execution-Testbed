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



</script>
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

function popup_letter2(url) {
		 var width  = 700;
		 var height = 600;
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
<script>
function cal(amount_fine)
{
//alert(amount_fine);
var q=0;
	for(p=0;p<document.getElementsByTagName("input").length;p++)
	{
		if(document.getElementsByTagName("input")[p].type == "checkbox")
		{
		q++;
		}
	}
var sub_total=0;
var fine_total=0;
for(i=0;i<q;i++)
{
m="chek_"+i;
if(document.getElementById(m).checked == true)
{
a='amount_'+i;

value1=document.getElementById(a).value;

if(isNaN(value1))
{
value1=0;
document.getElementById(a).value='';
document.getElementById(m).checked=false;
}
if(amount_fine-1>=i)
{

ab ='fine_'+i;
var value2=document.getElementById(ab).value;
if(isNaN(value2) || value2=='')
{
value2=0;
document.getElementById(ab).value='';
}
var fine_total=parseFloat(fine_total)+parseFloat(value2);
}

var sub_total=parseFloat(sub_total)+parseFloat(value1);
}

}
var total=parseFloat(sub_total)+parseFloat(fine_total);
document.getElementById('fee_total').innerHTML = total;
//alert('Total selected Amount is Rs: '+total);
}
</script>
<?php 
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}

if ($action == 'payfee') { 

?>
<style type="text/css">
<!--
.style2 {
	color: #FF0000;
	font-weight: bold;
}
.red { font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#FF0000;}
.style3 {font-family: "Times New Roman", Times, serif}
-->
</style>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
  </tr>
	<tr><td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Pay Fee</span></td></tr>
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="left" valign="top">
			<form method="post" action="" name="fetchstudent">
			<div><div >&nbsp;</div>
				<span align="left"  >&nbsp;&nbsp;Student ID :</span>
				<span  class="narmal"><?php echo $_SESSION['eschools']['student_prefix'];?>&nbsp;<input type="text" name="studentid"  value="<?php echo $studetails['es_preadmissionid']; ?>" /></span>&nbsp;<select name="pre_year">
						<?php  foreach($school_details_res as $each_record) { ?>
						<option value="<?php echo $each_record['es_finance_masterid']; ?>" <?php if ($each_record['es_finance_masterid']==$pre_year) { echo "selected"; }?>><?php echo displaydate($each_record['fi_startdate'])." To ".displaydate($each_record['fi_enddate']); ?>						                        </option>
						<?php } ?>
						</select>	&nbsp;
				<input type="hidden" name="std_count" value="<?php echo count($school_details_res ); ?>"	 />	
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
//echo 'sfsf'.$studentid;
	if ($getstudetails=="Go" && isset($studetails) ) { 
	
	
?>
<form method="post" action="" name="paystudentfee">

<table width="100%" border="0" cellspacing="2" cellpadding="0" align="center">
   <tr><td colspan="3" height="1" class="bgcolor_02"><td></tr>
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td>
			<table width="100%" border="0" cellspacing="2" cellpadding="0" align="center">
				<tr>
				<td align="left" class="narmal" width="20%">Student Name  </td>
				<td align="left" class="narmal" width="0%">:</td>
				<td align="left" class="narmal" width="30%"><?php echo $studetails['pre_name']; ?></td>
				<td align="left" class="narmal" width="50%" rowspan="12"><?php if($studetails['pre_image']!=""){echo displayimage("images/student_photos/".$studetails['pre_image'], "127"); } ?></td>
				</tr>
				<tr>
					<td align="left" class="narmal" width="20%">User Name </td>
					<td align="left" class="narmal" width="0%">:</td>
					<td align="left" class="narmal" width="30%"><?php echo $studetails['pre_student_username']; ?></td>						
				</tr>
                <tr>
					<td align="left" class="narmal" width="20%">Tution Fee Concession </td>
					<td align="left" class="narmal" width="0%">:</td>
					<td align="left" class="narmal" border=1 width="30%"><?php if($studetails['fee_concession']!=''){?><table width="40%" border="0" cellspacing="0" cellpadding="0">
					  <tr><td bgcolor="#FFFFFF"> <span class="style2">
			          <?php  echo $_SESSION['eschools']['currency']."&nbsp;".$studetails['fee_concession'];?>
					  </span></td>
					  </tr></table><?php }else{echo 'no concession';} ?>
                    <input type="hidden" name="fee_concession" value="<?php echo $studetails['fee_concession'];?>"  />
                  </td>						
				</tr>
				<tr>
					<td align="left" class="narmal">Registration No</td>
					<td align="left" class="narmal">:</td>
					<td align="left" class="narmal"><?php echo $_SESSION['eschools']['student_prefix'];?><?php echo $studetails['es_preadmissionid']; ?><input type="hidden" name="student_id" value="<?php echo $studetails['es_preadmissionid']; ?>"   /></td>
				</tr>
				<tr>
					<td align="left" class="narmal">Class</td>
					<td align="left" class="narmal">:</td>
					<td align="left" class="narmal"><?php echo classname($prev_class); ?>
					 <input type="hidden" name="stuclass" value="<?php echo $prev_class;?>" /></td>
				</tr>
                 <tr>
					<td align="left" class="narmal">Roll No</td>
					<td align="left" class="narmal">:</td>
					<td align="left" class="narmal"><?php echo $section_det['roll_no']; ?></td>
				</tr>
                <tr>
					<td align="left" class="narmal">Section</td>
					<td align="left" class="narmal">:</td>
					<td align="left" class="narmal"><?php echo $section_det['section_name']; ?></td>
				</tr>
				<tr>
					<td align="left" class="narmal">E-mail</td>
					<td align="left" class="narmal">:</td>
					<td align="left" class="narmal"><?php echo $studetails['pre_emailid']; ?></td>
				</tr>
				<tr>
					<td align="left" class="narmal">Father/GuardianName </td>
					<td align="left" class="narmal">:</td>
					<td align="left" class="narmal"><?php echo $studetails['pre_fathername']; ?></td>
				</tr>
				<?php 
				
				$sql_fepaid_new = "SELECT * FROM es_feepaid_new WHERE es_preadmissionid='".$studetails['es_preadmissionid']."' AND financemaster_id='".$_SESSION['eschools']['es_finance_masterid']."' ORDER BY fid DESC LIMIT 0,1";
				$newfepaid_det = $db->getrow($sql_fepaid_new);
				
				$fine_instal_dates = "SELECT * FROM es_fee_inst_last_date ";	
				$fine_inst_ls_dt = $db->getrows($fine_instal_dates);
					foreach($fine_inst_ls_dt as $each){
						$last_dt_arr[$each['instalment_no']] =$each['last_date']; 
					}
				
		?>
        
                	
<tr>
					<td align="left" class="narmal">Last Paid Date</td>
					<td align="left" class="narmal">:</td>
					<td align="left" class="narmal"><?php if($newfepaid_det['paid_on']!="" && $newfepaid_det['paid_on']!="0000-00-00"){ echo func_date_conversion("Y-m-d","d/m/Y",$newfepaid_det['paid_on']);}else{echo "---";} ?></td>
			  </tr>
				<tr>
					<td align="left" class="narmal"><span id="internal-source-marker_0.08468187621509426">Status </span></td>
				  <td align="left" class="narmal">:</td>
					<td align="left" class="narmal"><?php if($studetails['status']=='inactive'){echo Transferred;}else{echo '---';} ?></td>
				  <td align="left" class="narmal">&nbsp;</td>
				</tr>
                
                	<tr>
					<td align="left" class="narmal">&nbsp;</td>
					<td align="left" class="narmal">&nbsp;</td>
					<td align="left" class="narmal">&nbsp;</td>
					<td align="left" class="narmal">&nbsp;</td>
				</tr>	
                
                					 
			</table>
            
<table width="98%" border="1" align="center" cellpadding="0" cellspacing="0" class="tbl_grid">
<tr>
					<td align="left" class="adminfont" colspan="7">&nbsp;Fee Details for Class : <?php echo classname($prev_class); ?> </td>
				</tr>
				<tr class="bgcolor_02" height="25">
					<td align="center" class="admin" width="14%">&nbsp;S No</td>                            
				  <td align="center" class="admin" width="40%">Particulars</td>
				  <td align="center" class="admin" width="17%">Total</td>
				  <td align="center" class="admin" width="29%">  Fee Type</td>
		  </tr>
          
          <?php  $studetails['fee_concession'];	?>
<?php 
			      $getfeelistsql = "SELECT * FROM `es_feemaster` WHERE `fee_class`='".$prev_class."' 
				                  AND fee_fromdate = '" . $from_finance . "' AND fee_todate = '" . $to_finance . "'";
				$getfeelist = getamultiassoc($getfeelistsql);
				//array_print($getfeelist);
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
                                    <td align="right" class="narmal"><?php
									//echo $studetails['fee_concession']; 
									if(trim($eachfeedet['fee_particular'])=='TUITION')
									{
									 $feeamt=$_SESSION['eschools']['currency']."&nbsp;".number_format(($eachfeedet['fee_amount']-$studetails['fee_concession']), 2, '.', '');
									}
									elseif(trim($eachfeedet['fee_particular'])!='TUITION')
									{
									 $feeamt=$_SESSION['eschools']['currency']."&nbsp;".number_format($eachfeedet['fee_amount'], 2, '.', '');
									}
									
									echo $feeamt;
									?></td>
								<td align="center" class="narmal"><?php if($eachfeedet['fee_instalments']==12){echo "Monthly";}elseif($eachfeedet['fee_instalments']==1){echo "Yearly";}?></td>
							</tr>
		  <?php } } else { ?>
				<tr>
				  <td colspan="4" align="center" class="narmal">No Fees for this Class</td>
				</tr>
						  <?php }  ?>	
                          					   
      </table><br />
			<script type="text/JavaScript">
				function showpay(){
					document.getElementById('balance').style.display = "none";
					document.getElementById('pay').style.display = "block";
					document.getElementById('paybutton').style.display = "block";
				
					//document.getElementById('printfree').style.display = "none";
					
				}

			</script>
            
            
		  <div id="paybutton" style="display:none">
      
		    <table width="98%" border="1" align="center" cellpadding="0" cellspacing="0" class="tbl_grid" >
              <tr>
                <td align="left" class="adminfont" colspan="3">&nbsp;Pay Monthly Fee </td>
                <td align="left" class="admin">Date : <?php echo date("d/m/Y");?></td>
              </tr>
              <tr class="bgcolor_02" height="25">
                <td align="left" class="admin" width="6%">&nbsp;S&nbsp;No</td>
                <td align="left" class="admin" width="48%">&nbsp;Particulars</td>
                <td align="left" class="admin" width="18%">&nbsp;Amount</td>
                <td align="left" class="admin" width="28%">&nbsp;Fine</td>
              </tr>
              <?php
			  
			  if(is_array($newfepaid_det) && $newfepaid_det['paid_on']!=""){
			  $sql_fees_assigned = "SELECT * FROM `es_feemaster` WHERE `fee_class`='".$prev_class."' 
				                  AND fee_fromdate = '" . $from_finance . "' AND fee_todate = '" . $to_finance . "'  ";
			  }else{
			 $sql_fees_assigned = "SELECT * FROM `es_feemaster` WHERE `fee_class`='".$prev_class."' 
				                  AND fee_fromdate = '" . $from_finance . "' AND fee_todate = '" . $to_finance . "'";
				
			  }
			  $allfees_det = $db->getrows($sql_fees_assigned);
				$total_amount = 0;
				if (count($allfees_det)>0){
				
				
					$i = 0;
					$caf = 0;
					$flip_month_arr = array_flip($month_arr);
					foreach($allfees_det as $eachfeedet){//get student paid list
					 
							 $feepaid_records = $db->getone("SELECT COUNT(*) FROM es_feepaid_new WHERE es_preadmissionid='".$studetails['es_preadmissionid']."' AND financemaster_id='".$pre_year."' ");
							
						//	echo $j="SELECT COUNT(*) FROM es_feepaid_new WHERE es_preadmissionid='".$studetails['es_preadmissionid']."' AND financemaster_id='".$pre_year."' ";
				
				        if($feepaid_records ==0){
						
								if($eachfeedet['fee_instalments']==12){
									if($eachfeedet['fee_particular']=='TUITION'){
									
									$inst_amt_1 = (($eachfeedet['fee_amount']-$studetails['fee_concession'])/$eachfeedet['fee_instalments']);
									
									}else{
									 $inst_amt_1 = ($eachfeedet['fee_amount'])/($eachfeedet['fee_instalments']);
									}
									//echo $inst_amt = round($inst_amt_1);
								$inst_amt = number_format($inst_amt_1, 2, '.', '');
									
									
									$amttopayfee = $inst_amt*$flip_month_arr[date('F')];
									}else{
									 $amttopayfee =  $eachfeedet['fee_amount'];
								}	
						}else{
						
						$getfeepaidlist = "SELECT * FROM `es_feepaid` WHERE `studentid`=".$studetails['es_preadmissionid']." 
							      AND `particularid`=".$eachfeedet['es_feemasterid']." AND `class`='".$prev_class."' 
							      AND fi_fromdate = '" .$from_finance. "' AND fi_todate = '".$to_finance."'";
							$noofinstpaid = sqlnumber($getfeepaidlist);	
					    if($eachfeedet['fee_instalments']==12 && $noofinstpaid<12 ){
									if($eachfeedet['fee_particular']=='TUITION'){
									$amttopayfee_inst_1 = (($eachfeedet['fee_amount']-$studetails['fee_concession'])/$eachfeedet['fee_instalments']);
									}else{
									$amttopayfee_inst_1 = $eachfeedet['fee_amount']/$eachfeedet['fee_instalments'];
									}
									
									
								//echo	$amttopayfee_inst = round($amttopayfee_inst_1 );
								
								$amttopayfee_inst = number_format($amttopayfee_inst_1, 2, '.', '');
									
									$inst_to_pay = $flip_month_arr[date('F')] - $noofinstpaid;
									$amttopayfee = $amttopayfee_inst*$inst_to_pay ;
							//
						}else{
						//	$amttopayfee = "";
						}
							
							
						
						}
					
				
					if($amttopayfee>=1){
				
			?>
              <tr>
                <td align="left" class="narmal"><?php echo $i+1; ?></td>
                <td align="left" class="narmal"><?php echo $eachfeedet['fee_particular'];?>
                    <input type="hidden" name="selfeetypecheck[1][]" value="<?php echo $i; ?>" />
                    <input type="hidden" name="feepartuclars[]" value="<?php echo $eachfeedet['fee_particular'];?>" />
                    <input type="hidden" name="feepartuclarid[]" value="<?php echo $eachfeedet['es_feemasterid'];?>" />  
                    <input type="hidden" name="fee_instalments[]" value="<?php echo $eachfeedet['fee_instalments'];?>" />
              <?php 
                      if($feepaid_records ==0){
								
								if($eachfeedet['fee_instalments']==12){
									if($eachfeedet['fee_particular']=='TUITION'){
									$inst_amt_1 = (($eachfeedet['fee_amount']-$studetails['fee_concession'])/$eachfeedet['fee_instalments']);
									}else{
									$inst_amt_1 = $eachfeedet['fee_amount']/$eachfeedet['fee_instalments'];
									}
									echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;['.$inst_amt.' X '.$flip_month_arr[date('F')].']';
									}
						}else{
						
						
					    if($eachfeedet['fee_instalments']==12 && $noofinstpaid<12 ){
								if($eachfeedet['fee_particular']=='TUITION'){
									$amttopayfee_inst_1 = (($eachfeedet['fee_amount']-$studetails['fee_concession'])/$eachfeedet['fee_instalments']);
									}else{
									$amttopayfee_inst_1 = $eachfeedet['fee_amount']/$eachfeedet['fee_instalments'];
									}
									
									echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;['.$amttopayfee_inst.' X '.$inst_to_pay.']';
							
						}
							
							
				
						}
						
						
/*					 $feepaid_records = "SELECT balance FROM es_feepaid_new WHERE es_preadmissionid='".$studetails['es_preadmissionid']."' ORDER BY fid DESC ";
						
						$res=$db->get($feepaid_records);
						echo $res['balance'];*/
								
						?>                </td>
                <td align="right" class="narmal"><?php echo $_SESSION['eschools']['currency'].'&nbsp;'.number_format($amttopayfee, 2, '.', '');?>
                  <input type="hidden" name="feeamountpaid[]" value="<?php if($amttopayfee>0 ){echo ceil($amttopayfee);}?>" />
                <input type="hidden" name="es_installment[]" value="<?php echo $noofinstpaid+1;?>" >                </td>
                <td><?php
				
				 
			$query=" SELECT * FROM es_feepaid WHERE particularid ='".$eachfeedet['es_feemasterid']."' AND studentid = '".$studetails['es_preadmissionid']."' ORDER BY es_installment DESC ";
			
			$res=mysql_query($query);
			$row=mysql_fetch_array($res);
			$intment_no= $row['es_installment']+1;
			 $count=sqlnumber($query);
			if($count==0)
			{
			
			 $query1="SELECT * FROM `es_fee_inst_last_date` WHERE es_finance_masterid = '".$_SESSION['eschools']['es_finance_masterid']."' AND instalment_no =1 ";
			$res1=mysql_query($query1);
			$row1=mysql_fetch_array($res1);
		 $lastdate=$row1['last_date'];
			 $row1['instalment_no'];
			 
				$finecharged ="";
				$fine_master_det = $db->getrow("SELECT * FROM es_fine_master ORDER BY es_fine_masterid LIMIT 0,1");

					if($lastdate<date("Y-m-d")){
					
					 $diff_day_arr =date_diff($lastdate,date("Y-m-d"));
					echo $days =  $diff_day_arr['days'];
					echo 'days X'.$fine_master_det['fine_amount'].' = ';
					
				$finecharged = $days*$fine_master_det['fine_amount'];
				echo $finecharged;
				$total_amount +=$finecharged;
				}else{/*
				$inst_no = $noofinstpaid+1;
				$next_due_dt = $last_dt_arr[$inst_no];
					if($next_due_dt<date("Y-m-d")){
						$diff_day_arr =date_diff($next_due_dt,date("Y-m-d"));
					echo $days =  $diff_day_arr['days'];
					echo 'X'.$fine_master_det['fine_amount'].' = ';
					
				$finecharged = $days*$fine_master_det['fine_amount'];
				echo $finecharged;
				$total_amount +=$finecharged;
					
					}
				
				*/}
			
			}
			else
			{
		 $query1="SELECT * FROM `es_fee_inst_last_date` WHERE es_finance_masterid = '".$_SESSION['eschools']['es_finance_masterid']."' AND instalment_no ='".$intment_no."' ";
			$res1=mysql_query($query1);
			$row1=mysql_fetch_array($res1);
			$lastdate=$row1['last_date'];
			
			$row1['instalment_no'];
			 
				$finecharged ="";
				$fine_master_det = $db->getrow("SELECT * FROM es_fine_master ORDER BY es_fine_masterid LIMIT 0,1");

					if($lastdate<date("Y-m-d")){
					
					 $diff_day_arr =date_diff($lastdate,date("Y-m-d"));
					echo $days =  $diff_day_arr['days'];
					echo 'days X'.$fine_master_det['fine_amount'].' = ';
					
				$finecharged = $days*$fine_master_det['fine_amount'];
				echo $finecharged;
				$total_amount +=$finecharged;
				}else{
				/*$inst_no = $noofinstpaid+1;
				$next_due_dt = $last_dt_arr[$inst_no];
					if($next_due_dt<date("Y-m-d")){
						$diff_day_arr =date_diff($next_due_dt,date("Y-m-d"));
					echo $days =  $diff_day_arr['days'];
					echo 'X'.$fine_master_det['fine_amount'].' = ';
					
				$finecharged = $days*$fine_master_det['fine_amount'];
				echo $finecharged;
				$total_amount +=$finecharged;
					
					}*/
				
				}
			}
			
				
			/*?>	$finecharged ="";
				 if($eachfeedet['fee_particular']=='TUITION'){
				
				 
				$fine_master_det = $db->getrow("SELECT * FROM es_fine_master ORDER BY es_fine_masterid LIMIT 0,1");
				
				
				//if($newfepaid_det['paid_on']=="" && $fine_inst_ls_dt['last_date'] < date("Y-m-d")){}
				//$last_dt_arr[1]>=date("Y-m-d")$flip_month_arr[date('F')] 
				//echo $each['last_date'];
				if($feepaid_records ==0 && $last_dt_arr[1]<date("Y-m-d")){
					
					 $diff_day_arr =date_diff($last_dt_arr[1],date("Y-m-d"));
					echo $days =  $diff_day_arr['days'];
					echo 'days X'.$fine_master_det['fine_amount'].' = ';
					
				$finecharged = $days*$fine_master_det['fine_amount'];
				echo $finecharged;
				$total_amount +=$finecharged;
				}else{
				$inst_no = $noofinstpaid+1;
				$next_due_dt = $last_dt_arr[$inst_no];
					if($next_due_dt<date("Y-m-d")){
						$diff_day_arr =date_diff($next_due_dt,date("Y-m-d"));
					echo $days =  $diff_day_arr['days'];
					echo 'X'.$fine_master_det['fine_amount'].' = ';
					
				$finecharged = $days*$fine_master_det['fine_amount'];
				echo $finecharged;
				$total_amount +=$finecharged;
					
					}
				
				}?><?php */?>
                
		
               <input type="hidden" name="finecharged[]" value="<?php if($finecharged >0){echo $finecharged;} ?>" size="10"  />    </td>
              </tr>
              <?php
			 $i++;
			 $total_amount +=$amttopayfee;
			  }
			}
			$caf=$i;
					
		$sel_studentwise_rec = "SELECT * FROM es_other_fine_dettails WHERE es_preadmissionid=".$studentid." AND balance>0";
	$otherfine_det = $db->getrows($sel_studentwise_rec);
	if(count($otherfine_det)>=1){
	echo "<tr><td colspan='3' class='admin' align='left'>&nbsp;Pay Misc.Fines</td></tr>";
	$mis =0;
	foreach($otherfine_det as $each){
	
			?>
              <input type="hidden" name="misc_actual[]" value="<?php echo $each['fine_amount'];?>"  />
              <input type="hidden" name="otherfine_id[]" value="<?php echo $each['otherfine_id'];?>" />
              <input type="hidden" name="fine_name[]" value="<?php echo $each['fine_name'];?>" />
              <input type="hidden" name="selfeetypecheck[2][]" value="<?php echo $i; ?>" />
              <tr>
                <td align="left" class="narmal">&nbsp;<?php echo $i+1; ?></td>
                <td><?php echo strtoupper($each['fine_name']);?></td>
                <td align="right" class="narmal"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($each['fine_amount'], 2, '.', '');?></td>
                <td class="narmal">&nbsp;</td>
              </tr>
              
              <?php 
			 $mis++;
			$i++;
			$total_amount +=$each['fine_amount'];
			}}
			if(is_array($selfeetypecheck[3])){
							$check_arr_tpt = array_values($selfeetypecheck[3]);
							}
			
			$pay_sql="select * from es_trans_payment_history where studentid=".$studentid." AND amount_paid='0' AND deduction='0' and created_on BETWEEN '".$from_acad."' AND '".$to_acad."'";
					$transport_det = $db->getrows($pay_sql);
					if(count($transport_det)>=1){
					echo "<tr><td colspan='3' class='admin' align='left'>&nbsp;Pay TPT FEE</td></tr>";
					$tpt=0;
					foreach($transport_det as $each){
			?>
              <input type="hidden" name="tptfee_actual[]" value="<?php echo $each['pay_amount'];?>" />
              <input type="hidden" name="tptfeeid[]" value="<?php echo $each['id'];?>" />
              <input type="hidden" name="due_month[]" value="<?php echo func_date_conversion("Y-m-d","d/m/Y",$each['due_month']);?>" />
              <input type="hidden" name="selfeetypecheck[3][]" value="<?php echo $i; ?>" />
              <tr>
                <td align="left" class="narmal">&nbsp;<?php echo $i+1; ?></td>
                <td><?php echo "TPT FEE for ".func_date_conversion("Y-m-d","d/m/Y",$each['due_month']);?></td>
                <td width="18%" align="right" class="narmal"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($each['pay_amount'], 2, '.', '');?></td>
                <td class="narmal">&nbsp;</td>
              </tr>
              
              <?php 
			$tpt++;
			$i++;
			$total_amount +=$each['pay_amount'];
			 }}
			if(is_array($selfeetypecheck[4])){
							$check_arr_sal = array_values($selfeetypecheck[4]);
							}
			
			  $sql_st_sale="SELECT * FROM  es_stationary_payment  WHERE student_id= ".$studentid." AND pay_status='Pending'";
			$st_sale_row = $db->getRows($sql_st_sale);
			if(count($st_sale_row )>=1){
			echo "<tr><td colspan='3' class='admin' align='left'>&nbsp;Pay SALE</td></tr>";
			$sal=0;
					foreach($st_sale_row as $each){
			?>
              <input type="hidden" name="st_sale_actual[]" value="<?php echo $each['total_amount'];?>" />
              <input type="hidden" name="st_pay_id[]" value="<?php echo $each['st_pay_id'];?>" />
              <input type="hidden" name="invoice_no[]" value="<?php echo $each['invoice_no'];?>" />
              <input type="hidden" name="selfeetypecheck[4][]" value="<?php echo $i; ?>" />
              <tr>
                <td align="left" class="narmal">&nbsp;<?php echo $i+1; ?></td>
                <td><?php echo "SALE INV.NO:".$each['invoice_no'];?></td>
                <td align="right" class="narmal"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($each['total_amount'], 2, '.', '');?></td>
                <td class="narmal">&nbsp;</td>
              </tr>
              <?php
			$sal++;
			 $i++; 
			 $total_amount +=$each['total_amount'];
			 }}
			
			if(is_array($selfeetypecheck[5])){
							$check_arr_lfp = array_values($selfeetypecheck[5]);
							}
			$libfine_det = $db->getrows("SELECT * FROM es_libbookfinedet WHERE es_libbooksid=".$studentid." AND es_libbookfine > 0 AND es_type='student'  and es_libbookdate  BETWEEN '" . $from_acad . "' AND '" . $to_acad . "' AND paid_on = '0000-00-00' " );
			
					if(count($libfine_det)>=1){
					echo "<tr><td colspan='3' class='admin' align='left'>&nbsp;Pay LIB. FINE</td></tr>";
					$lfp=0;
					foreach($libfine_det as $each){
			?>
              <input type="hidden" name="book_fine_actual[]" value="<?php echo $each['es_libbookfine'];?>" />
              <input type="hidden" name="es_libbookfinedetid[]" value="<?php echo $each['es_libbookfinedetid'];?>" />
              <input type="hidden" name="lfp[]" value="<?php echo $i+1;?>" />
              <input type="hidden" name="selfeetypecheck[5][]" value="<?php echo $i; ?>" />
              <tr>
                <td align="left" class="narmal">&nbsp;<?php echo $i+1; ?></td>
                <td><?php echo "LIB. FINE"; ?></td>
                <td align="right" class="narmal"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($each['es_libbookfine'], 2, '.', '');?></td>
                <td class="narmal">&nbsp;</td>
              </tr>
              
              <?php 
			$i++;
			$total_amount +=$each['es_libbookfine'];
			} }
			if(is_array($selfeetypecheck[6])){
							$check_arr_hcp = array_values($selfeetypecheck[6]);
							}
			$hostelamount_det = $db->getrows("SELECT * FROM es_hostel_charges WHERE es_personid=".$studentid." AND es_persontype ='student' AND balance > 0 AND created_on BETWEEN '" . $from_acad . "' AND '" . $to_acad . "'");
			if(count($hostelamount_det)>0){
			echo "<tr><td colspan='3' class='admin' align='left'>&nbsp;Pay HOSTEL FEE</td></tr>";
			$hcp=0;
			foreach($hostelamount_det  as $each){
			?>
              <input type="hidden" name="hostel_fee_actual[]" value="<?php echo $each['room_rate'];?>" />
              <input type="hidden" name="es_hostel_charges_id[]" value="<?php echo $each['es_hostel_charges_id'];?>" />
              <input type="hidden" name="es_hostel_month[]" value="<?php echo func_date_conversion("Y-m-d","d/m/Y",$each['due_month']);?>" />
              <input type="hidden" name="selfeetypecheck[6][]" value="<?php echo $i; ?>" />
              <tr>
                <td align="left" class="narmal">&nbsp;<?php echo $i+1; ?></td>
                <td><?php echo "HOSTEL".func_date_conversion("Y-m-d","d/m/Y",$each['due_month']);?></td>
                <td align="right" class="narmal"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($each['room_rate'], 2, '.', '');?></td>
                <td></td>
              </tr>
              <?php $i++;
			  $total_amount +=$each['room_rate'];
			   }}
			
			$sel_qry = "SELECT *  FROM es_old_balances  WHERE studentid = ".$studentid." AND balance > 0  ";
					$oldbal_det = $db->getrow($sel_qry);
					
					if($oldbal_det>=1){
					echo "<tr><td colspan='3' class='admin' align='left'>&nbsp;Pay OLD BALANCE</td></tr>";
			?>
              <input type="hidden" name="old_bal_actual" value="<?php echo $oldbal_det['balance'];?>" />
              <input type="hidden" name="ob_id" value="<?php echo $oldbal_det['ob_id'];?>" />
              <input type="hidden" name="selfeetypecheck[7]" value="<?php echo $i; ?>" />
              <tr>
                <td align="left" class="narmal">&nbsp;<?php echo $i+1; ?></td>
                <td><?php echo "OLD BALANCE";?></td>
                <td align="right" class="narmal"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($oldbal_det['balance'], 2, '.', '');?></td>
                <td></td>
              </tr>
              <?php $i++;
			  $total_amount +=$oldbal_det['balance'];
			  }
			  
			 $sel_qry_exmfee = "SELECT *  FROM es_examfee  WHERE es_preadmissionid = ".$studentid." AND balance > 0 AND created_on <= '".date('Y-m-d')."'  ";
					$exam_fee = $db->getrows($sel_qry_exmfee);
					
					 
					if(count($exam_fee)>=1){
					foreach($exam_fee as $each){
					echo "<tr><td colspan='3' class='admin' align='left'>&nbsp;Pay EXAM FEE</td></tr>";
			?>
               <input type="hidden" name="exam_fee[]" value="<?php echo $each['fine_amount'];?>"  />
              <input type="hidden" name="exam_fee_id[]" value="<?php echo $each['exam_fee_id'];?>" />
              <input type="hidden" name="fine_name[]" value="<?php echo $each['fine_name'];?>" />
              <input type="hidden" name="selfeetypecheck[8][]" value="<?php echo $i; ?>" />
              <tr>
                <td align="left" class="narmal">&nbsp;<?php echo $i+1; ?></td>
                <td><?php echo strtoupper($each['fine_name']);?></td>
                <td align="right" class="narmal"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($each['fine_amount'], 2, '.', '');?></td>
                <td></td>
              </tr>
             
              <?php $i++;
			  $total_amount +=$each['fine_amount'];
			  }}
			  
		/*	echo  $sql_prev_month_bal = "SELECT balance  FROM es_feepaid_new  WHERE es_preadmissionid = ".$studentid." AND financemaster_id='".$pre_year."' AND balance > 0 ORDER BY fid DESC ";*/
		
			 $sql_prev_month_bal = "SELECT balance FROM es_feepaid_new  WHERE es_preadmissionid = ".$studentid." AND financemaster_id='".$pre_year."' ORDER BY fid DESC LIMIT 0,1";
					$prev_month_bal = $db->getone($sql_prev_month_bal);
	
					if($prev_month_bal>=1){
					echo "<tr><td colspan='3' class='admin' align='left'>&nbsp;Pay PREVIOUS BALANCE</td></tr>";
			?>
              <input type="hidden" name="prev_month_balance" value="<?php echo $prev_month_bal;?>" />
              

         
              <tr>
                <td align="left" class="narmal">&nbsp;<?php echo $i+1; ?></td>
                <td><?php echo "PREVIOUS BALANCE";?></td>
                <td align="right" class="narmal"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($prev_month_bal, 2, '.', '');?></td>
                <td></td>
              </tr>
              <?php $i++;
			  $total_amount +=$prev_month_bal;
			  }?>
              <tr>
                <td align="right" ></td>
                <td align="left" class="admin">Total</td>
                <td class='admin' align='right'><?php if($total_amount>=1){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($total_amount, 2, '.', '');}else{echo "No Due"; } ?><input type="hidden" name="total_amount" value="<?php echo $total_amount;?>" /></td>
                <td></td>
              </tr>
              <?php if($total_amount>=1){?>
              <tr>
                <td align="right" ></td>
                <td align="left" class="admin">Amount Paid</td>
                <td class='admin' align='right'><input type="text" value="<?php echo $cash_paid;?>" name="cash_paid" size="10" /></td>
                <td></td>
              </tr>
              <?php }?>
              <!-- start Voucher information -->
              <script type="text/javascript" >
				function showAvatar(){
					var ch = document.paystudentfee.es_paymentmode.value;
					if (ch=='cash' || ch==''){
						document.getElementById("patiddivdisp").style.display="none";
					}else{
						document.getElementById("patiddivdisp").style.display="inline";
					}
				}		  
			</script>
              <tr>
                <td height="25" colspan="4" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Voucher Entry</span></td>
              </tr>
              <tr>
                <td></td>
                <td  align="left" class="narmal" >Voucher Type</td>
                <td  align="left" class="narmal" colspan="2" ><select name="vocturetypesel" >
                    <option value="">-- Select --</option>
                    <?php 
				
				$voucherlistarr = voucher_finance();
				krsort($voucherlistarr);
				foreach($voucherlistarr as $eachvoucher) {	?>
                    <option value="<?php echo $eachvoucher['es_voucherid']; ?>" <?php echo ($vocturetypesel==$eachvoucher['es_voucherid'])?'selected':""?> ><?php echo $eachvoucher['voucher_type']; ?> ( <?php echo $eachvoucher['voucher_mode']; ?> )</option>
                    <?php } ?>
                  </select>
                    <font color="#FF0000"><b>*</b></font></td>
              </tr>
              <tr>
                <td></td>
                <td align="left" class="narmal" >Ledger Type </td>
                <td align="left" class="narmal" colspan="2"><select name="es_ledger" >
                    <option value="">-- Select --</option>
                    <?php 
				
				$ledgerlistarr = ledger_finance();
				foreach($ledgerlistarr as $eachledger) { 
			?>
                    <option value="<?php echo $eachledger['lg_name']; ?>" <?php if($es_ledger==$eachledger['lg_name']) { echo"selected='selected'"; }elseif($eachledger['lg_name']=='fees'){echo 'selected';} ?>><?php echo $eachledger['lg_name']; ?></option>
                    <?php } ?>
                  </select>
                    <font color="#FF0000"><b>*</b></font></td>
              </tr>
              <tr>
                <td></td>
                <td align="left" class="narmal" >Payment&nbsp;Mode</td>
                <td align="left" class="narmal" colspan="2"><select name="es_paymentmode" onchange="Javascript:showAvatar();">
                    <option value="">-- Select --</option>
                    <option value="cash" <?php if($es_paymentmode=='cash'){echo "selected='selected'";}?>>Cash</option>
                    <option value="cheque" <?php if($es_paymentmode=='cheque'){echo "selected='selected'";}?>>Cheque</option>
                    <option value="dd" <?php if($es_paymentmode=='dd'){echo "selected='selected'";}?>>DD</option>
                  </select>
                    <font color="#FF0000"><b>*</b></font></td>
              </tr>
              <tr>
                <td colspan="4"><table width="100%" border="1" cellspacing="0" cellpadding="4"  id="patiddivdisp" style=" <?php if(isset($es_paymentmode)&&$es_paymentmode!="cash"){ echo 'display:block;';}else{echo 'display:none;';}?>" class="tbl_grid" >
                    <tr>
                      <td align="left" class="bgcolor_02" colspan="3">Bank Details </td>
                    </tr>
                    <tr>
                      <td width="361" align="left" class="narmal" >Bank Name </td>
                      <td align="left">:</td>
                      <td width="776" align="left"><input type="text" name="es_bank_name" value="<?php echo $es_bank_name;?>" /></td>
                    </tr>
                    <tr>
                      <td align="left"  class="narmal"> Account Number</td>
                      <td width="25" align="left">:</td>
                      <td align="left" ><input type="text" name="es_bankacc" value="<?php echo $es_bankacc;?>" /></td>
                    </tr>
                    <tr>
                      <td align="left" class="narmal">Cheque / DD Number </td>
                      <td align="left">:</td>
                      <td align="left"><input type="text" name="es_checkno" value="<?php echo $es_checkno;?>" /></td>
                    </tr>
                    <tr>
                      <td align="left" class="narmal">Teller Number </td>
                      <td align="left">:</td>
                      <td align="left"><input type="text" name="es_teller_number" value="<?php echo $es_teller_number;?>" /></td>
                    </tr>
                    <tr>
                      <td align="left" class="narmal">Pin </td>
                      <td align="left">:</td>
                      <td align="left"><input type="text" name="es_bank_pin" value="<?php echo $es_bank_pin;?>" /></td>
                    </tr>
                </table></td>
              </tr>
              <tr>
                <td></td>
                <td align="left" class="narmal">Notes</td>
                <td align="left" class="narmal" colspan="2"><textarea name="es_narration" rows="3" cols="20"><?php echo $es_narration;?></textarea></td>
              </tr>
              <!-- end of voucher information -->
              <?php } else { ?>
              <tr>
                <td colspan="4" align="center" class="narmal">No Fees for this Class</td>
              </tr>
              <?php }  ?>
              <tr>
                <td colspan="4" align="left" class="narmal"></td>
              </tr>
            </table>
		  </div>	
            
<table width="60%" border="0" cellspacing="0" cellpadding="0">	 
				<tr><td align="right" class="narmal" colspan="4">&nbsp;</td></tr>
				<tr>
				  <td align="center" class="narmal">
				  <input name="pre_year" type="hidden" value="<?php echo $pre_year; ?>" />
                  
                  <?php  displaydate($each_record['fi_startdate'])." To ".displaydate($each_record['fi_enddate']); 
				  
				   $query11="SELECT * FROM es_finance_master WHERE es_finance_masterid='".$pre_year."'";
				  $date_res=mysql_query($query11);
				  $date_row=mysql_fetch_array($date_res);
				displaydate($date_row['fi_startdate']);
				 displaydate($date_row['fi_enddate']);
				 
				/* echo $date_row['fi_startdate'];
				 echo $date_row['fi_enddate'];
			
			if($date_row['fi_startdate']<= date("Y-m-d")){//echo 'adfsd';
			}
			
				if(date("Y-m-d")<=$date_row['fi_enddate']){echo 'adfsd';}*/
			

	
				/*if(displaydate($date_row['fi_startdate'])<= date("d/m/Y") && date("d/m/Y")<=displaydate($date_row['fi_enddate']))
				{
					echo 'adfasdfasdfasdf';
				}
				else
				{
					echo 'hi';
				}*/
				  ?>
                  
				  <?php
				
				  $due_amt_r = (int)$feetotamt-(int)$feeamtleft;
				  	
				   if($total_amount!=0 && $date_row['fi_startdate']<= date("Y-m-d") && date("Y-m-d")<=$date_row['fi_enddate'] )
				   //if($total_amount!=0 )
				   { ?>
				  <input type="button" value="Pay balance Fee"  name="balance" id="balance" style="cursor:pointer;" onclick="JavaScript:showpay();"  class="bgcolor_02" />
				  <?php  } ?></td>
				  <td width="0%"  align="left">
			
			        <input type="hidden" name="getstudetails" value="Go" />
                    <input type="hidden" name="studentid" value="<?php echo $studentid;?>" />
                    <input type="hidden" name="prev_class" value="<?php echo $prev_class;?>" />
                     <input type="hidden" name="pre_year" value="<?php echo $pre_year;?>" />
                    
			<?php if(in_array('6_3',$admin_permissions) && $total_amount!=0){?>


<input type="submit" name="Submitpayform" value="Pay Fee" class="bgcolor_02" id="pay" style="display:none;cursor:pointer;"  />	
<?php }?>			  </td>
					<td  align="center" class="narmal"> 
					
					<?php if(in_array('6_6',$admin_permissions)){?>

 <?php /*?><input type="button" style="display:block;cursor:pointer;" id="printfeedet_t" name="printcompletefeedet" value="Print Complete fee Paid details" onclick="window.open('?pid=40&action=printcompletefeedet&sid=<?php echo $studetails['es_preadmissionid']; ?>&pre_year=<?php echo $pre_year;?>',null,'width=800,height=700,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /><?php */?>
				

<?php }?>
					   <!-- window.open(href,null, 'width=900,height=900,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30') -->				  </td>
				  <td width="1%"></td>
					<td align="center">					</td>	  </tr>
			  
				<tr>
					<td align="left" class="narmal">&nbsp;</td>
					<td align="left" class="narmal">&nbsp;</td>
					<td align="left" class="narmal">&nbsp;</td>
					<td align="left" class="narmal">&nbsp;</td>
				</tr>					
	  </table>        </td>
		<td width="1" class="bgcolor_02"></td>
	</tr>
	<tr><td colspan="3" height="1" class="bgcolor_02"><td></tr>
</table>
</form>
<?php 
	
	}
}
?>
<script language="javascript" type="text/javascript">
function selectone(){


         var el = document.getElementsByName('selfeetypecheck[]');
		 		
  				 FCD = document.getElementsByName('finecharged[]');
				 FP = document.getElementsByName('finepaid[]');
				 FD = document.getElementsByName('finededucted[]');
				
                 var count = 0; 
				 
				 
				
  for(i=0;i<el.length;i++){
  				FCD1 = FCD[i].value;
				 FP1  =  FP[i].value;
				 FD1  =  FD[i].value;
				 if(el[i].checked){
				 count = 1;
				 if(FCD1!=""){
						 TOT = 0;
						 TOT = Number(FP1)+Number(FD1);
						 if(FCD1!=TOT){
							alert("Fine charged should be equal to finepaid+deduction allowed");
							return false;
						 }
					 }else{
					  continue;
					 }
               }
			   
			   
  }
  
  if(count==0){
  alert("Please check at least one !");
  return false;
  }else{
		return true;
	}
  
 }
</script>	
<?php
/*
* print report on paid fee
*/
	if ($action == 'printrepot') {
	 
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
  </tr>
	<tr>
		<td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Fee Payment</span></td>
	</tr>
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="left" valign="top">	
			<table width="95%" border="0" cellspacing="2" cellpadding="0" align="center">
				<tr>
					<td align="left" class="narmal">Receipt No</td>
					<td align="left" class="narmal">:</td>
					<td align="left" class="narmal"><?php echo $receptnumber['es_installment'];  ?><strong></td>
					<td align="left" class="narmal">&nbsp;</td>
				</tr>	
				<tr>
					<td align="left" class="narmal" width="31%">Student Name </td>
					<td align="left" class="narmal" width="1%">:</td>
					<td align="left" class="narmal" width="27%"><?php echo $studetails['pre_name']; ?></td>
					<td align="left" class="narmal" width="41%" rowspan="7"><?php if(isset($studetails['pre_image']) && $studetails['pre_image']!='')
					{echo displayimage("images/student_photos/".$studetails['pre_image'], "127");} ?></td>
				</tr>
				<tr>
					<td align="left" class="narmal" width="31%">User Name </td>
					<td align="left" class="narmal" width="1%">:</td>
					<td align="left" class="narmal" width="27%"><?php echo $studetails['pre_student_username']; ?></td>	
				</tr>
				<tr>
					<td align="left" class="narmal">Registration No</td>
					<td align="left" class="narmal">:</td>
					<td align="left" class="narmal"><?php echo $_SESSION['eschools']['student_prefix'];?><?php echo $studetails['es_preadmissionid']; ?><input type="hidden" name="student_id" value="<?php echo $studetails['es_preadmissionid']; ?>"   /></td>
				</tr>
				<tr>
					<td align="left" class="narmal">Class</td>
					<td align="left" class="narmal">:</td>
					<td align="left" class="narmal"><?php if($pre_year != $current_yearid ){ echo classname($prev_class);}else{
					 echo classname($studetails['pre_class']);} ?>
					<input type="hidden" name="stuclass" value="<?php if($pre_year != $current_yearid ){ echo classname($prev_class);}else{
					 echo classname($studetails['pre_class']);} ?>" /></td>
				</tr>
                <tr>
					<td align="left" class="narmal">Roll No</td>
					<td align="left" class="narmal">:</td>
					<td align="left" class="narmal"><?php echo $section_det['roll_no']; ?></td>
				</tr>
                <tr>
					<td align="left" class="narmal">Section</td>
					<td align="left" class="narmal">:</td>
					<td align="left" class="narmal"><?php echo $section_det['section_name']; ?></td>
				</tr>
				<tr>
					<td align="left" class="narmal">E-mail</td>
					<td align="left" class="narmal">:</td>
					<td align="left" class="narmal"><?php echo $studetails['pre_emailid']; ?></td>
				</tr>
				<tr>
					<td align="left" class="narmal">Father/Guardian Name </td>
					<td align="left" class="narmal">:</td>
					<td align="left" class="narmal"><?php echo $studetails['pre_fathername']; ?></td>
				</tr>
				<tr>
					<td align="left" class="narmal">Address</td>
					<td align="left" class="narmal">:</td>
					<td align="left" class="narmal"><?php echo $studetails['pre_address1']; ?></td>
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
					<td align="left" class="adminfont" colspan="7">&nbsp;Fee Details for Class : <?php if($pre_year != $current_yearid ){ echo classname($prev_class);}else{
					 echo classname($studetails['pre_class']);}  ?></td>
				</tr>
				<tr class="bgcolor_02" height="25">
					<td align="center" class="admin" width="6%">&nbsp;S&nbsp;No</td>                            
					<td align="center" class="admin" width="20%">Particulars</td>
					<td align="center" class="admin" width="17%">Total Amount</td>
					<td align="center" class="admin" width="19%"> Fee Type</td>
				  <td align="center" class="admin" width="17%">Amount Paid </td>
				  <td align="center" class="admin" width="17%"> Waived </td>
					<td align="center" class="admin" width="21%">Fee Paid upto </td>                           
				</tr>
<?php
	

	if (count($getfeelist)>0){
		$i = 1;
		$feetotamt 	= 0;
		$feeamtleft = 0;
		foreach ($getfeelist as $eachfeedet) {
			$feetotamt = $feetotamt + $eachfeedet['fee_amount'];
?>
				<tr>
					<td align="left" class="narmal">&nbsp;<?php echo $i++; ?></td>
					<td align="left" class="narmal"><?php echo $eachfeedet['fee_particular'];?></td>
					<td align="left" class="narmal"><?php echo $_SESSION['eschools']['currency']." ".number_format($eachfeedet['fee_amount'], 2, '.', '');;?></td>
					<td align="left" class="narmal"><?php if($eachfeedet['fee_instalments']==12){echo "Monthly";}else{echo "Yearly";}?></td>
					<td align="left" class="narmal">
					<?php
					    if($pre_year != $current_yearid ){
				           $getfeepaidamt = "SELECT SUM(feeamount), SUM(fee_waived) FROM `es_feepaid` WHERE `studentid`=" . $studetails['es_preadmissionid'] . "                                              AND `particularid`=" . $eachfeedet['es_feemasterid'] . " AND `class`='" . $prev_class . "'";
                          }else{
							$getfeepaidamt = "SELECT SUM(feeamount), SUM(fee_waived) FROM `es_feepaid` WHERE `studentid`=" . $studetails['es_preadmissionid'] . "                                        AND `particularid`=" . $eachfeedet['es_feemasterid'] . " AND `class`='" . $studetails['pre_class'] . "'";
							}
							$amttotpaid = getarrayassoc($getfeepaidamt);					
							echo $_SESSION['eschools']['currency']." ".number_format($amttotpaid['SUM(feeamount)'], 2, '.', '');
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
							if($eachfeedet['fee_instalments']==12){echo $month_arr[$noofinstpaid];}else{echo"---";}
					?>
					</td>
				</tr>
				<?php } ?>
				<tr>
					<td colspan="6" align="right" class="narmal">Total Amount to be paid :</td>
					<td align="right" class="adminfont"> <?php echo $_SESSION['eschools']['currency'].number_format($feetotamt, 2, '.', ''); ?></td>
				</tr>
				<tr>
					<td colspan="6" align="right" class="narmal">Amount Paid Till Now :</td>
					<td align="right" class="adminfont"><?php echo $_SESSION['eschools']['currency'].number_format($feeamtleft, 2, '.', ''); ?></td>
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
				<tr><td colspan="7" align="center" class="narmal">No Fees for this Class</td></tr>
				<?php }  ?>						   
		  </table>
		</td>
		<td width="1" class="bgcolor_02"></td>
    </tr>
	<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>
</table>
<?php
						
	}
	?>

	<?php 
 /**
 * FEE paid LIST 
 */
if ($action=='feepaidlist'|| $action=='feepaidlistreport'){ ?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
  </tr>
	<tr class="bgcolor_02">
		<td height="25" colspan="3" align="left" style="padding-left:20px;">Paid Fee List <?php if($pre_class!="ALL") { echo " for Class : ".classname($pre_class); } ?></td>
	</tr>
	<?php if ($action=='feepaidlist'){ ?>
	<tr><td width="1" class="bgcolor_02"></td>
		<td align="right" ><?php echo "GRAND TOTAL &nbsp;:&nbsp;<b>" . $_SESSION['eschools']['currency']."&nbsp;" . sprintf("%1.02f",schoolfees($from_finance,$to_finance)) . "</b>"; ?></td>
		<td width="1" class="bgcolor_02"></td>
	</tr>
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="left" class="narmal">
			<ul><b><u>NOTE:</u></b>
				<li>By selecting <B>ALL</B> the entire Institute fee paid details will be displayed.</li>
				<li><b>FROM</b> and <b>To</b> dates search will display fee paid details between these dates</li>
				<li><b>SUB TOTAL</b> => will display Page wise Total</li>
                <li><b>GRAND TOTAL</b> => will display till date fee payment which is received</li> 
			</ul>
	  </td>
		<td width="1" class="bgcolor_02"></td>
	</tr>
	<tr class="bgcolor_02"><td height="1" colspan="3"></td></tr>
	<tr>
		
		<td  align="center" valign="top" colspan="3">
		<form action="?pid=40&action=feepaidlist" method="post" name="fee_search" id="transport_search" >
        <table width="100%" border="0" cellspacing="5" cellpadding="0">

						<tr>
						   		<td class="narmal">Class</td>
							    <td class="narmal"><select name="pre_class" id="classid_t">
										<option value="ALL">ALL</option>
                    	<?php 
							$classlist = getallClasses();
							foreach($classlist as $indclass) {
						?>
										<option <?php if($indclass['es_classesid']==$pre_class) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_classesid']; ?>"><?php echo $indclass['es_classname']; ?></option>
                        <?php } ?>
								  </select>		
						  </td>
								<td class="narmal">Financial Year</td>
							 	<td class="narmal"><select name="pre_year">
						<?php  foreach($school_details_res as $each_record) { ?>
						<option value="<?php echo $each_record['es_finance_masterid']; ?>" <?php if ($each_record['es_finance_masterid']==$pre_year) { echo "selected"; }?>><?php echo displaydate($each_record['fi_startdate'])." To ".displaydate($each_record['fi_enddate']); ?>						                        </option>
						<?php } ?>
						</select>	
								</td>
								<td class="narmal"><input type="submit" name="school_year" class="bgcolor_02" style="cursor:pointer;" value="Submit"/></td>
		  </tr>
						  
						
						   <tr>
						   		<td class="narmal">From</td>
								<td class="narmal"><input class="plain" name="dc1"  value="<?php
													  if (isset($dc1)){ 
															 echo $_POST['dc1'];
															 }
															 ?>"
															 
															  size="12" onfocus="this.blur()" readonly="readonly" /><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fStartPop(document.fee_search.dc1,document.fee_search.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" />
								</td>
								<td class="narmal">To</td>
							 	<td class="narmal"><input class="plain" name="dc2" value="<?php
													  if (isset($dc2)){ 
															 echo $_POST['dc2'];
															 }
															 ?>" size="12" onfocus="this.blur()" readonly="readonly" /><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fEndPop(document.fee_search.dc1,document.fee_search.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a>
								</td>
								<td class="narmal">
							<input type="hidden" name="action" value="feepaidlist">
							<input type="submit" name="Search" value="Search" style="cursor:pointer;" class="bgcolor_02" />                                 </td>
		  </tr>
					  
					   
		  </table> <iframe width=132 height=142 name="gToday:contrast:agenda.js" id="gToday:contrast:agenda.js" src="<?php echo JS_PATH ?>/DateRange/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
	</iframe></form>
						 
		</td>
	</tr>	<!-- END search -->
		
		<?php }?>
	<tr>
		<td width="1" ></td>
		<td>
			<table width="100%" border="1" cellspacing="0" cellpadding="0" class="tbl_grid">
			
				<tr><td height="25" colspan="5">&nbsp;</td></tr>
				<tr class="bgcolor_02" height="25">
					<td width="10%" class="admin">&nbsp;S.No</td>
					<td width="30%" class="admin" align="center">Registration&nbsp;No</td>
					<td width="30%" class="admin" align="center">Name</td>
					<td width="30%" class="admin" align="center">Waived</td>
					<td width="30%" class="admin" align="center">Paid&nbsp;Amount</td>
				</tr>
<?php

	if (count($paid_feedet)>0) {
		$subtotal = 0;
		$waivedtotal = 0;
		$i   = $start; 
		
		foreach ($paid_feedet as $eachrecord){
			$subtotal += $eachrecord['sumamt'];
			$waivedtotal += $eachrecord['waidamt'];
			
?> 
				<tr>
					<td class="narmal" align="center"><?php echo ++$i; ?></td>
					<td class="narmal" align="center"><?php echo $_SESSION['eschools']['student_prefix'];?><?php echo $eachrecord['studentid']; ?></td>
					<td class="narmal" align="left">&nbsp;<?php echo $eachrecord['pre_name']; ?></td>
					<td class="narmal" align="right"><?php if($eachrecord['waidamt']>0){echo $_SESSION['eschools']['currency'].'&nbsp;'.number_format($eachrecord['waidamt'], 2, '.', '');}else{echo "---";} ?></td>
					<td class="narmal" align="right"><?php echo $_SESSION['eschools']['currency'].'&nbsp;'.number_format($eachrecord['sumamt'], 2, '.', ''); ?></td>
				</tr>
 <?php
		}
?>		  
				<tr><td colspan="5">&nbsp;</td></tr>
				<tr><td colspan="2">&nbsp;</td><td  align="right" class="bgcolor_02">Sub Total </td><td  class="bgcolor_02" align="right" height="25"><?php if($waivedtotal>0){echo $_SESSION['eschools']['currency'].'&nbsp;'.number_format($waivedtotal, 2, '.', '');}else{echo "---";}?></td><td  class="bgcolor_02" align="right" height="25"><?php echo $_SESSION['eschools']['currency'].'&nbsp;'.number_format($subtotal, 2, '.', '');?></td></tr>
				<tr>
					<td colspan="5" class="narmal" align="center">
					<?php 
							 
							
							if(isset($pre_class) && $pre_class!=''){
							paginateexte($start, $q_limit, $no_rows, 'action='.$action.'&pre_class='.$pre_class.'&dc1='.$dc1.'&dc2='.$dc2);
							}elseif (isset($school_year) && $school_year=="Submit"){
							paginateexte($start, $q_limit, $no_rows, 'action='.$action.'&pre_year='.$pre_year);
							}else{ 
							paginateexte($start, $q_limit, $no_rows, 'action='.$action);
							}
                   ?>
					</td>
				</tr>
				
				<?php } else { ?>
				
				<tr>
				<td colspan="5" align="center" class="narmal"> No Records Found </td></tr>
		   <?php } ?>
				
				<?php 
				if (count($paid_feedet)>0) {
				if ($action=='feepaidlist'){ ?>
				<tr>
					<td colspan="5" align="right" height="25"><br>
					<?php if(in_array('6_8',$admin_permissions)){?>
<input name="submit" type="submit" onClick="newWindowOpen('?pid=40&action=feepaidlistreport<?php echo $feespaidurl;?>');" class="bgcolor_02"  value="print"  style="padding:2px;cursor:pointer;"/><?php }?>
					&nbsp;</td>
				</tr> <?php } }?>
			</table>
		</td>		
		<td width="1" ></td>
	</tr>	  
	
</table>

<?php 
	 
 }


/**
* Out standing fees list
*/
	if ($action == 'outstandingfees'||$action == 'outstandingfeesreport' || $action=='print_each_outstanding'){ 
		$res = getarrayassoc('select fi_ac_startdate from `es_finance_master`  ORDER BY `es_finance_masterid` DESC LIMIT 0 , 1');
		$req_month =date_parse($res['fi_ac_startdate']);
		
		if ($req_month['year'] == date('Y')) {
			 $req_installement = date('m') - $req_month['month'] + 1;
		} else {
		   	$req_installement = (12 - $req_month['month']) + date('m')+ 1;
		}
	
	?>
			<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
			<tr>
         <td height="3" colspan="3"></td>
	 </tr>
			<tr  class="bgcolor_02" >
				<td height="25" colspan="3" class="admin" align="left" style="padding-left:20px;">Outstanding Fees <?php if ($pre_class!="ALL"){ echo "&nbsp;&nbsp;for class &nbsp;:&nbsp;".classname($pre_class);} ?> </td>
			</tr>
			<?php  if ($action=='outstandingfees'){ ?>
			<tr><td width="1" class="bgcolor_02"></td>
				<td align="right" ><?php echo "GRAND TOTAL &nbsp;:&nbsp;<b>".$_SESSION['eschools']['currency'].sprintf("%1.02f", schoolfees($from_finance,$to_finance)) . "</b>"; ?></td>
				<td width="1" class="bgcolor_02"></td>
			</tr>
			<tr><td width="1" class="bgcolor_02"></td>
				<td align="left" class="narmal">
					<ul><b><u>NOTE:</u></b>
						<li>By selecting <b>ALL</b> the entire school outstanding fee details will be displayed.</li>
						<li><b>GRAND TOTAL</b> => will display till date fee payment which is received</li>
						<li>IN =&gt; Installments</li>
			  </ul></td>
				<td width="1" class="bgcolor_02"></td>
			</tr>
			<tr><td height="1" class="bgcolor_02" colspan="3"></td></tr>
			
			<tr>
				<td width="1" class="bgcolor_02"></td>
				<td>
				<table width="100%">
					<form action="?pid=40&action=outstandingfees" method="post" name="transport_search" id="transport_search" >
						<tr>
							<td width="40" class="narmal">Class: </td>
							<td >
							<select name="pre_class" id="classid_t">
								<option value="ALL">ALL</option>
								<?php 
									$classlist = getallClasses();
									foreach($classlist as $indclass) {
								?>
								<option <?php if($indclass['es_classesid']==$pre_class) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_classesid']; ?>"><?php echo $indclass['es_classname']; ?></option>
								<?php } ?>
							 </select>
						  </td>
							 <td >&nbsp;</td>
							
							<td >
						<select name="pre_year">
						<?php  foreach($school_details_res as $each_record) { ?>
						<option value="<?php echo $each_record['es_finance_masterid']; ?>" <?php if ($each_record['es_finance_masterid']==$pre_year) { echo "selected"; }?>><?php echo displaydate($each_record['fi_startdate'])." To ".displaydate($each_record['fi_enddate']); ?>						                        </option>
						<?php } ?>
						</select></td>
							<td >&nbsp;</td>
							<input type="hidden" name="action" value="outstandingfees">
							<td ><input type="submit" name="Search" value="Search" class="bgcolor_02" onclick="return validatecls();"  style="cursor:pointer;padding:5px;"/></td>
						</tr>
				  </form>
				  </table>
			  <td width="1" class="bgcolor_02"></td>
			</tr>	<!-- END search -->
			<?php } ?>
			<tr>
				<td width="1" class="bgcolor_02"></td>
				<td align="center" valign="top">
<?php if($Search!="") { ?>
					 <table width="100%" border="1" cellspacing="0" cellpadding="0" class="tbl_grid">
						
						<tr class="bgcolor_02" height="1">
							<td colspan="7" align="center"> </td>                            
						</tr>
			<?php
			$fee_stud = 0;
			
			if (is_array($students_data)){
			
				
				foreach ($students_data as $eachstudent){
				 
				
			   $getfeelistsql = "SELECT * FROM `es_feemaster` WHERE `fee_class`= '" . $eachstudent['pre_class'] . "' 
				                                               AND fee_fromdate = '" . $from_finance . "' 
															   AND fee_todate   = '" . $to_finance . "'";
															  
					$getfeelist = getamultiassoc($getfeelistsql);
					
					if (count($getfeelist)>0){
						
						$i = 1;
						$feetotamt 	= 0;
						$feeamtleft = 0;
						$tot_waived = 0;
						foreach ($getfeelist as $eachfeedet) {
						
							$existance = getarrayassoc("SELECT MAX(`es_installment`) FROM `es_feepaid` 
							WHERE `studentid`=" . $eachstudent['es_preadmissionid'] . " 
							AND `particularid`=" . $eachfeedet['es_feemasterid'] . " 
							AND `class`='" . $eachstudent['pre_class'] . "' 
							AND fi_fromdate = '" . $from_finance . "' 
							AND fi_todate   = '" . $to_finance . "' ");
							foreach ($existance as $eachexistance) {
								
							if( $pre_year!=$current_yearid){
							$sql_query = "SELECT SUM(fee_instalments) FROM `es_feemaster` 
							                                   WHERE `fee_class`= '" . $eachstudent['pre_class'] . "' 
				                                               AND fee_fromdate = '" . $from_finance . "' 
															   AND fee_todate   = '" . $to_finance . "' GROUP BY fee_particular";
							$records = getamultiassoc($sql_query);
							foreach($records as $each_fee){
							
							$res_installement = $each_fee['SUM(fee_instalments)'];
							}
							
							}else{ 
						
							$res_installement = 0;
						
							if ($eachfeedet['fee_instalments'] <= 6) {
								if ($eachfeedet['fee_instalments'] <= 4) {
								$res_installement=$req_installement/3;
								}else {
								$res_installement=$req_installement/2;
								}
							}
							else {
									$res_installement =$req_installement;
							}
							}
							
							//echo "date".$res_installement."<br />";
							
							if ($eachexistance < $res_installement && $eachfeedet['fee_instalments']!=$eachexistance) { 
								
								
								$feetotamt = $feetotamt + $eachfeedet['fee_amount'];
								
							       
								 
									 	if ($tmp_std != $eachstudent['es_preadmissionid']){
											$fee_stud++;				
										  	$tmp_std  = $eachstudent['es_preadmissionid'];
									
									 $name_sel= "SELECT `pre_name`,pre_fathername FROM `es_preadmission` 
									             WHERE `es_preadmissionid` = '".$eachstudent['es_preadmissionid']."'"; 
									$name = getarrayassoc($name_sel);
									$section_det = $db->getrow("SELECT * FROM es_sections_student SS , es_sections S WHERE 	SS.student_id='".$eachstudent['es_preadmissionid']."' AND SS.course_id='".$eachstudent['pre_class']."' AND SS.section_id=S.section_id ");
									
									 echo '<tr>
													<td colspan="7" align="left"><table><tr><td><b>Name : </b></td> 
													<td>'.$name['pre_name'].'</td></tr>
													<tr><td><b>Registration No : </b></td><td>'.$eachstudent['es_preadmissionid'].'</td>
													</tr>
													<tr><td><b>Father : </b></td><td>'.$eachstudent['pre_fathername'].'</td>
													</tr>
													<tr><td><b>Class : </b></td><td>'.classname($eachstudent['pre_class']).'</td>
													</tr>
													<tr><td><b>Roll No. : </b></td><td>'.$section_det['roll_no'].'</td>
													</tr>
													<tr><td><b>Section : </b></td><td>'.$section_det['section_name'].'</td>
													</tr>
													<tr><td><b>Date : </b></td><td>'.date("d/m/Y").'</td>
													</tr>
													</table>
												</tr>
												<tr class="bgcolor_02" height="25">
							<td align="center" class="admin" width="6%">&nbsp;S&nbsp;No</td>                            
							<td align="center" class="admin" width="20%">Particulars</td>
							<td align="center" class="admin" width="17%">Amount</td>
							<td align="center" class="admin" width="19%">IN</td>
							<td align="center" class="admin" width="17%">Paid</td>
							<td align="center" class="admin" width="17%">Waived</td>
							<td align="center" class="admin" width="21%">IN&nbsp;Paid </td>                           
						</tr>
								';
											
								      }
									 
									 
								
			?>
            
						
				    <tr>
							<td width="6%" align="left" class="narmal">&nbsp;<?php echo $i++; ?></td>
							<td width="20%" align="left" class="narmal"><?php echo $eachfeedet['fee_particular'];?></td>
							<td width="17%" align="left" class="narmal"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachfeedet['fee_amount'], 2, '.', '');;?></td>
							<td width="19%" align="left" class="narmal"><?php echo $eachfeedet['fee_instalments'];?></td>
							<td width="17%" align="left" class="narmal">
							<?php
								$getfeepaidamt = "SELECT SUM(feeamount) ,SUM(fee_waived) FROM `es_feepaid` WHERE `studentid`=".$eachstudent['es_preadmissionid']." AND  `particularid`=" . $eachfeedet['es_feemasterid'] . " AND `class`='" . $eachstudent['pre_class'] . "'  $datecondition";
			
								$amttotpaid = getarrayassoc($getfeepaidamt);					
								echo $_SESSION['eschools']['currency']."&nbsp;".number_format($amttotpaid['SUM(feeamount)'], 2, '.', '');
								
								$feeamtleft = $feeamtleft + $amttotpaid['SUM(feeamount)'];
							?></td>
							<td width="17%" align="left" class="narmal">
							<?php
							if($amttotpaid['SUM(fee_waived)']>0){
								echo $_SESSION['eschools']['currency']."&nbsp;".number_format($amttotpaid['SUM(fee_waived)'], 2, '.', '');
								}else{echo "---";}
								$tot_waived = $tot_waived + $amttotpaid['SUM(fee_waived)'];
							?></td>
							<td width="21%" align="left" class="narmal"><?php
							$getfeepaidlist = "SELECT * FROM `es_feepaid` WHERE `studentid`=" . $eachstudent['es_preadmissionid'] . " AND `particularid`=" . $eachfeedet['es_feemasterid'] . " AND `class`='" . $eachstudent['pre_class'] . "'  $datecondition";
							$noofinstpaid = sqlnumber($getfeepaidlist);
							echo $noofinstpaid; ?></td>
						</tr>
					<?php 
					
					
					 }
							
							}
							
						
					 }?> 
					 <?php if ($feetotamt!="") { ?>
					 <tr>
							<td height="24" colspan="6" align="right" class="narmal">Total Amount to be paid :</td>
							<td align="right" class="adminfont"> <?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($feetotamt, 2, '.', ''); ?></td>
					   </tr>
						<tr>
							<td height="24" colspan="6" align="right" class="narmal">Amount Paid Till Now :</td>
							<td align="right" class="adminfont"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($feeamtleft, 2, '.', ''); ?></td>
						</tr>
						<tr>
							<td height="24" colspan="6" align="right" class="narmal">Balance :</td>
							<td align="right" class="adminfont"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($feetotamt-$feeamtleft, 2, '.', ''); ?></td>
						</tr>
						<tr>
							<td height="24" colspan="6" align="right" class="narmal">Amount Waived Till Now :</td>
							<td align="right" class="adminfont"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($tot_waived, 2, '.', ''); ?></td>
						</tr>
						<tr>
							<td height="24" colspan="6" align="right" class="narmal">Amount To be Paid  :</td>
							<td align="right" class="adminfont"><?php
							$bal = ($feetotamt-$feeamtleft)-$tot_waived;
							 echo $_SESSION['eschools']['currency']."&nbsp;".number_format($bal, 2, '.', ''); ?></td>
						</tr>
						<tr>
							<td colspan="7" align="right" height="1" class="bgcolor_02"></td>
						</tr>
						<?php if ($action=='outstandingfees'){ ?>
						<tr>
							<td colspan="7" align="right" height="1" style=" padding:5px;"> <input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=40&action=print_each_outstanding&studentid=<?php echo $eachstudent['es_preadmissionid']."&pre_year=".$pre_year.'&pre_class='.$pre_class.'&Search='.$Search; ?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /> </td>
						</tr>
					 
					 <?php
					 }
					  }  }
						 else { 
							   if ($rep_class !=$eachstudent['pre_class']) {
										$rep_class= $eachstudent['pre_class']
						 ?>
						
						<tr>
						  <td colspan="7" align="center" class="narmal"> No Fees Details for Class <?php echo classname($eachstudent['pre_class']);?></td>
						</tr>
			<?php 
								}
						
						}	
			
					}?>
					
					<tr><td colspan="7" align="center" class="narmal">
				<?php 
				
				 if ($action=='outstandingfees'){	//echo $fee_stud;			
				paginateexte($start, $q_limit, $no_records, 'action='.$action."&pre_year=".$pre_year.'&pre_class='.$pre_class.'&Search='.$Search); 
					}		
				?>
				<td></tr>
			   <?php
						}
				if ($eachexistance < $res_installement && $eachfeedet['fee_instalments']!=$eachexistance) { 
			  if ($action=='outstandingfees'){ ?>
			<tr>
			  <td colspan="7" align="right" style="padding:5px;"><br/>
			  <?php if(in_array('6_12',$admin_permissions)){?>
<input name="submit2" type="submit" onclick="newWindowOpen('?pid=40&action=outstandingfeesreport<?php echo $outstandingfeesUrl;?>&pre_year=<?php echo $pre_year;?>');" class="bgcolor_02" value="print"  style="cursor:pointer;padding:5px;"/><?php }?>
		      </td>
			</tr>
			<?php
			}
			}?>					   
					</table> 
                    <?php } ?>
			  </td>				
				<td width="1" class="bgcolor_02"></td>
			</tr>
			<tr><td colspan="3" height="1" class="bgcolor_02"></td></tr>
			</table>
	<?php 
	}

/*****************************
PRABHAKAR STARTED CODING HERE 
******************************/

 if ($action=="fee_list") {
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr>
         <td height="3" colspan="3"></td>
  </tr>
	<tr class="bgcolor_02" >
	  <td height="25" colspan="3" align="left">Institute Fees Records</td>
	</tr>
	<tr><td width="1"  colspan="3">&nbsp;</td></tr>
	<tr>
		<td align="right" colspan="3"><?php if (count($schoolgrandfee_data)>0) echo number_format($schoolgrandfee_data['sumamt'], 2, '.', ''); ?></td>
		
	</tr>
	<!-- search start -->
	<tr>
		<td width="1" colspan="3">
			<table width="100%">
			<form action="?pid=40&action=feepaidlist" method="post" name="transport_search" id="transport_search" >
            	<tr>
                	<td width="40" class="narmal">Class: </td>
					<td width="41">
					<select name="pre_class" id="classid_t">
						<option value="">Select</option>
                    	<?php 
							$classlist = getallClasses();
							foreach($classlist as $indclass) {
						?>
						<option <?php if($indclass['es_classesid']==$pre_class) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_classesid']; ?>"><?php echo $indclass['es_classname']; ?></option>
                        <?php } ?>
                     </select>
                  </td>
                     <td >
                     	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                        	<tr>
                            	<td width="44%" class="narmal">From:</td>
                                <td width="35%"><input class="plain" name="dc1" value="<?php if (isset($dc1)&&$dc1!=""){ echo $dc1;} ?>" size="12" onfocus="this.blur()" readonly="readonly" /></td>
                                 <td width="21%"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fStartPop(document.transport_search.dc1,document.transport_search.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a>
                                 </td>
							</tr>
                        </table>
                    </td>
                    <td >
                    	<table width="39%" border="0" cellspacing="0" cellpadding="0">
                        	<tr>
                            	<td width="8%"  class="narmal">To:</td>
                                <td width="10%"><input class="plain" name="dc2" value="<?php if (isset($dc2)&&$dc2!=""){ echo $dc2; }?>" size="12" onfocus="this.blur()" readonly="readonly" />
                                </td>
                                <td width="82%"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fEndPop(document.transport_search.dc1,document.transport_search.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a>
                                </td>
                          </tr>
                        </table>
					</td>
					<td width="17">&nbsp;</td>
					<input type="hidden" name="action" value="outstandingfees">
                    <td ><input type="submit" name="Search" value="Search" class="bgcolor_02" onclick="return validatecls();"/></td>
                   	<td width="1">&nbsp;</td>
				</tr>
              </form>
            </table>
<iframe width=132 height=142 name="gToday:contrast:agenda.js" id="gToday:contrast:agenda.js" src="<?php echo JS_PATH ?>/DateRange/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe><br />
		</td>
	</tr>	<!-- END search -->
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td  align="center" valign="top">
			<table width="100%" border="1" cellspacing="0" cellpadding="2" class="tbl_grid">
				<tr class="bgcolor_02" >
					<td class="admin" height="20">S.No</td>
					<td class="admin" align="center">NAME</td>
					<td class="admin" align="center">FEE&nbsp;TYPE</td>
					<td class="admin" align="center">PAID&nbsp;DATE</td>
					<td class="admin" align="center">PAID</td>
				</tr>
<?php 
	if (is_array($class_fees)){
		$i = 1;
	    foreach ($class_fees as $innerdata){
	    	 	echo '<tr><td colspan="5">'.$i.'';
				foreach($innerdata as $eachclsfees){
					echo '<table width="100%" cellpadding="0" cellspacing="0" border="1" class="tbl_grid"><tr>
							<td  class="narmal">' . $i . '</td>
							<td class="narmal">' . $eachclsfees["pre_student_username"]. '</td>
							<td  class="narmal">'.$eachclsfees["particulartname"]. '</td>
							<td  class="narmal">' .$eachclsfees['es_classname']. '</td>
							<td  class="narmal">' . $_SESSION['eschools']['currency']. "&nbsp;". number_format($eachclsfees['feeamount'], 2, '.', '') .'</td>
						</tr></table>';
					$i++;
					unset($tatalamount);
					unset($balanceamt);
				} 
				echo '</td></tr>';
		}
	?>
	<tr>
		<td colspan="5" align="right">
			<input name="submit" type="submit" onClick="newWindowOpen('?pid=40&action=outstandingfeesreport<?php echo $feesoutstandingUrl;?>');" class="bgcolor_02" value="print" />
		</td>
	</tr>
<?php
	}
?>		</td></tr>
			</table>
		</td>				
		<td width="1" class="bgcolor_02"></td>
	</tr>
</table>	
<?php

}
/**
* printing the complete fee details
*/
if ($action=="printcompletefeedet"){ 
	if (is_array($fees_banksdata)&&count($fees_banksdata)>0){
	?>
<table width="100%" border="1" cellspacing="0" cellpadding="0" class="tbl_grid">
<tr>
	<td colspan="9">
		<ol><b>Notes</b>
		  <li>IN =>Installment Number</li>
		  <li>VT =&gt; Voucher Type</li>
		</ol>	</td>
</tr>
<tr>
	<td colspan="9">
		<table width="100%" border="0" cellspacing="0" cellpadding="2" >
		<tr>
			<td></td>
			<td></td>
			<td width="592" rowspan="10" align="center"><?php echo displayimage("images/student_photos/".$stdentdata['pre_image'],'127');?></td>
		</tr>
		<tr>
			<td align="left" width="276">&nbsp;&nbsp;<b>Registration&nbsp;Number :</b> </td>
			<td align="left" width="321"><?php echo $_SESSION['eschools']['student_prefix'];?><?php echo $stdentdata['es_preadmissionid'];?></td>
			<td width="91"></td>
		</tr>
		<tr>
			<td align="left">&nbsp;&nbsp;<b>Name : </b></td>
			<td align="left"><?php echo $stdentdata['pre_name'];?></td>
			<td></td>
		</tr>
		
		<tr>
			<td align="left">&nbsp;&nbsp;<b>Class : </b></td>
			<td align="left"><?php echo classname($stdentdata['pre_class']);?></td>
			<td></td>
		</tr>
		<tr>
			<td align="left">&nbsp;&nbsp;<b>Date Of Birth : </b></td>
			<td align="left"><?php echo displaydate($stdentdata['pre_dateofbirth']);?></td>
			<td></td>
		</tr>
		<tr>
			<td align="left">&nbsp;&nbsp;<b>Father/Guardian Name : </b></td>
			<td align="left"><?php echo $stdentdata['pre_fathername'];?></td>
			<td></td>
		</tr>
		<tr>
			<td align="left">&nbsp;&nbsp;<b>Academic Year : </b></td>
			<td align="left"><?php echo $fees_banksdata[0]['academicyear']; ?></td>
			<td></td>
		</tr>
		<tr>
			<td height="20"></td>
			<td>&nbsp;</td>
			<td></td>
		</tr>
		</TABLE>	</td>
</tr>	
<tr class="bgcolor_02">
	<td align="left">Paid&nbsp;On<br />[Last Date]</td>
	<td width="10" height="25" align="left">Particulars</td>
	<td align="left">Fee&nbsp;Paid </td>
	<td align="left">Fee Waived </td>
	<td align="left">Fine</td>
	<td align="left">Fine&nbsp;Paid </td>
	<td align="left">Fine Waived </td>
	<td align="left">VT</td>
	<td width="5" align="left">IN&nbsp;</td>
  </tr>
<?php 
$total_fee =0;
$total_fee_waived =0;
$total_fine = 0;
$total_fine_paid = 0;
$total_fine_waived = 0;

foreach($fees_banksdata as $eachfees_banks){ 

	 $sel_voutherbalances = "SELECT * FROM `es_voucherentry` WHERE `es_receiptno` = 'student".$eachfees_banks['es_feepaidid']."' AND `es_receiptdate`='" . $eachfees_banks['date'] . "'";

$voutherbalances_data = getarrayassoc( $sel_voutherbalances );

$actual_fine = "";
$paid_fine = "";
$waived_fine = "";
$lastdate ="";
//echo "SELECT * FROM es_fine_charged_collected WHERE es_installment=".$eachfees_banks['es_installment']." AND es_feemasterid=".$eachfees_banks['particularid'];
$fcc_det = $db->getrow("SELECT * FROM es_fine_charged_collected WHERE es_feemasterid=".$eachfees_banks['particularid']." AND  studentid=".$stdentdata['es_preadmissionid']);  	
if(is_array($fcc_det) && count($fcc_det)>=1){
$actual_fine = $fcc_det['fine_amount'];
$paid_fine = $fcc_det['amount_paid'];
$waived_fine = $fcc_det['deduction_allowed'];
}
$last_date = $db->getone("SELECT last_date FROM es_fee_inst_last_date WHERE  instalment_no=".$eachfees_banks['es_installment']." ");
if($last_date!="" && $last_date!='0000-00-00'){
$lastdate = "<br>[".func_date_conversion("Y-m-d","d/m/Y",$last_date)."]";
}

//array_print($voutherbalances_data);
	?>
<tr>
	<td align="center" valign="middle"><?php echo displaydate($eachfees_banks['date']); echo $lastdate;  ?></td>
	<td align="center" valign="middle"><?php echo $eachfees_banks['particulartname']; ?></td>
	<td align="right" valign="middle"><?php echo number_format($eachfees_banks['feeamount'], 2, '.', ''); ?></td>
	<td align="right" valign="middle"><?php echo number_format($eachfees_banks['fee_waived'], 2, '.', ''); ?></td>
	<td align="right" valign="middle"><?php  echo number_format($actual_fine, 2, '.', ''); ?></td> 
	 <td align="right" valign="middle"><?php echo number_format($paid_fine, 2, '.', ''); ?></td> 
	 <td align="right" valign="middle"><?php echo number_format($waived_fine, 2, '.', ''); ?></td> 
	<td align="center" valign="middle"><?php echo $voutherbalances_data['es_vouchermode']; ?></td>
	<td align="center" valign="middle"><?php echo $eachfees_banks['es_installment']; ?></td>
  </tr>
  
<?php 

$total_fee +=$eachfees_banks['feeamount'];
$total_fee_waived +=$eachfees_banks['fee_waived'];
$total_fine += $actual_fine;
$total_fine_paid += $paid_fine;
$total_fine_waived += $waived_fine;
	unset($voutherbalances_data);
}?>
<tr>
	<td></td>
	<td><b>Total : </b></td>
	<td align="right" valign="middle"><b><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($total_fee, 2, '.', ''); ?></b></td>
	<td align="right" valign="middle"><b><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($total_fee_waived, 2, '.', ''); ?></b></td>
	<td align="right" valign="middle"><b><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($total_fine, 2, '.', ''); ?></b></td> 
	 <td align="right" valign="middle"><b><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($total_fine_paid, 2, '.', ''); ?></b></td> 
	 <td align="right" valign="middle"><b><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($total_fine_waived, 2, '.', ''); ?></b></td> 
	<td></td>
	<td></td>
  </tr>
</table>	
<?php
}else{echo "No records available";}
}



if ($action == 'categorywisefee') { ?>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
  </tr>
	<tr> 
		<td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Category Wise Fee Paid / Pending</span></td>
	</tr>
	
    <tr>
	    <td height="1" colspan="3" >
			<table width="100%" border="1" cellspacing="0" cellpadding="3" class="tbl_grid">
			<form action="" name="categoryfee" method="post">
				<tr >  
				
				
						   <td  height="35" colspan="2" align="left" valign="middle" class="admin">&nbsp;Select Fee Category</td>
				
				           <td  height="35" colspan="5" align="left" valign="middle" class="narmal"><select name="feecategories"  style="width:150px;">
                             <option value=""> --Select Fee Type-- </option>
                             <?php  foreach($fees_cat_det as $eachfee){ ?>
                             <option value="<?php echo $eachfee['fee_particular']; ?>" <?php if($feecategories==$eachfee['fee_particular']){ ?> selected                           ="selected"                        <?php } ?> >
                             <?php    echo $eachfee['fee_particular']; ?>
                             </option>
                             <?php } ?>
                           </select><font color="#FF0000">*</font></td>
	            </tr> 
				<tr><td colspan="7">
				
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="30%" >
                     	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                        	<tr>
                            	<td width="32%" class="narmal">From:</td>
                                <td width="12%"><input class="plain" name="dc1" value="<?php if (isset($dc1)&&$dc1!=""){ echo $dc1;} ?>" size="12" onfocus="this.blur()" readonly="readonly" /></td>
                                 <td width="56%"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fStartPop(document.categoryfee.dc1,document.categoryfee.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a>                                 </td>
							</tr>
                      </table>
                    </td>
                    <td width="70%" >
                    	<table width="54%" border="0" cellspacing="0" cellpadding="0">
                        	<tr>
                            	<td width="8%"  class="narmal">To:</td>
                                <td width="10%"><input class="plain" name="dc2" value="<?php if (isset($dc2)&&$dc2!=""){ echo $dc2; }?>" size="12" onfocus="this.blur()" readonly="readonly" />
                                </td>
                                <td width="82%"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fEndPop(document.categoryfee.dc1,document.categoryfee.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a>
                                </td>
								<iframe width=132 height=142 name="gToday:contrast:agenda.js" id="gToday:contrast:agenda.js" src="<?php echo JS_PATH ?>/DateRange/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>
                          </tr>
                      </table>
					</td>
  </tr>
 </table>
               </td></tr>
				<tr>
							<td align="left" class="admin" colspan="2">&nbsp;Financial&nbsp;Year</td>
							
							<td align="left" class="narmal" colspan="3">
								<select name="pre_year">
								<?php  foreach($school_details_res as $each_record) { ?>
								<option value="<?php echo $each_record['es_finance_masterid']; ?>" <?php  if ($each_record['es_finance_masterid']==$pre_year) { echo "selected"; }?>><?php echo displaydate($each_record['fi_startdate'])." To ".displaydate($each_record['fi_enddate']); ?>						                        </option>
								<?php } ?>
								</select>							</td>
							<td align="center" class="adminfont"  colspan="2">
							<input type="submit" name="fee_school_year" class="bgcolor_02" value="Submit" style="cursor:pointer;"/>							</td>
				</tr>
				
				
				
				<?php 
				if($fee_school_year!=""){
				if(isset($fee_school_year) && $no_rows==0){ echo '<tr>
						<td colspan="7" align="center" class="bgcolor_02"> No Records Found </td></tr>';} else{  ?>   
				<tr>
							<th colspan="7" class="admin" align="left">Fee Type : <?php if(isset($feecategories) && $feecategories!=" "){echo $feecategories; }  ?></th>
				</tr>   
					<tr class="bgcolor_02">
							<td class="admin">S.No</td>
							<td class="admin">Class </td>
							<td class="admin">Fee</td>
					  <td class="admin">#&nbsp;Students</td>
					  <td class="admin">Total Fee</td>
					  <td class="admin">Paid Fee</td>
					  <td class="admin">Outstanding</td>
				</tr>
					 
				<tr>
							<?php 
							$i = 1;
							$tot = 0;  
							$tot_fee = 0;
							$tot_paid = 0;
							$tot_balance = 0;
							if (is_array($fee_exe_det)&&count($fee_exe_det)>=1){
							foreach($fee_exe_det as $each_fee){
							?>
							<td class="narmal"><?php echo $i; $i++; ?></td>
							<td class="narmal"><?php echo classname($each_fee['es_classesid']); ?></td>
							<td class="narmal"><?php echo $_SESSION['eschools']['currency']."&nbsp;".$each_fee['fee_amount']; ?></td>
							<td align="center" class="narmal"><?php echo $each_fee['students']; ?></td>
							<td class="narmal"><?php
							 $totalfee =  $each_fee['fee_amount'] * $each_fee['students']; 
							 echo $_SESSION['eschools']['currency']."&nbsp;".number_format($totalfee ,2,'.','');?>							 </td>
							<td>
								<?php 
								$paidfee =0;
								if(count($tfee_exe_det)>0){
								
								  foreach($tfee_exe_det as $each_paidfee){	
								
								     if($each_fee['es_classesid']==$each_paidfee['class']){ 
								         $paidfee = $each_paidfee['amount'];
								
								         echo $_SESSION['eschools']['currency']."&nbsp;".number_format($paidfee  ,2,'.','');
								     }									
								  }
							    }
								?>							</td>
						   <td class="narmal">
						   <?php 
						  
						     $outstandingfee = $totalfee - $paidfee ; 
							 
						     echo $_SESSION['eschools']['currency']."&nbsp;".number_format($outstandingfee ,2,'.','');
							 
						   ?>						   </td>
				</tr>
						<?php  $tot = $tot+$each_fee['fee_amount'];
							   $tot_fee = $tot_fee+$totalfee;
							   $tot_paid = $tot_paid+$paidfee;
							   $tot_balance = $tot_balance+$outstandingfee;
							   } 
							   }
						?>
				<tr>
							<th colspan="2" class="narmal"><strong> TOTAL</strong></th>
				  <th align="left" class="narmal"><strong><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($tot ,2,'.',''); ?></strong></th>
				  <th align="left">&nbsp;</th>
				  <th align="left" class="narmal"><strong><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($tot_fee ,2,'.','');?></strong></th>
				  <th align="left" class="narmal"><strong><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($tot_paid ,2,'.','');?></strong></th>
				  <th align="left" class="narmal"><strong><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($tot_balance ,2,'.','');?></strong></th>
		    </tr>
				<tr> 
							<td align="right" colspan="7">	
							<?php if(in_array('6_11',$admin_permissions)){?>
<input type="button" value="Print" class="bgcolor_02" onclick="window.open('?pid=40&action=print_categorywisefee&feecategories=<?php echo $feecategories;?>&pre_year=<?php echo $pre_year;?>&fee_school_year=<?php echo $fee_school_year.$pageUrl;?>',null,'width=700,height=600,left=140,right=40,menubar=yes,scrollbars=yes');"/>	<?php }?>	
										</td>	
				</tr>      <?php } }?>
			  </form>
			</table>
      </td>
  </tr>
</table>
<?php
}
// print  categorywisefee item for fee list

if ($action == 'print_categorywisefee') { ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
</tr>
	<tr> 
		<td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Category Wise Fee Paid / Pending</span></td></tr>
	<tr>
		<td width="1" class="bgcolor_02"></td>
		
<table width="100%" border="1" cellspacing="0" cellpadding="3" class="tbl_grid">
	<tr>
	<th colspan="7" align="left">Fee Type : <?php echo strtoupper($feecategories);?> </th>
	</tr>   
	<tr>
	<th colspan="7" align="center"><?php if($dc1!=""){echo "From&nbsp;:&nbsp;".$dc1;} if($dc2!=""){echo "&nbsp;To&nbsp;:&nbsp;".$dc2;}?> </th>
	</tr>  
    <tr class="bgcolor_02">
		<td align="left">S.No</td>
	    <td align="left">Class</td>
    
        <td align="left">Fee </td>
	<td align="left">#&nbsp;Students</td>
    <td align="left">Total Fee</td>
    <td align="left">Paid Fee</td>
    <td align="left">Outstanding</td>
  </tr>
  <tr>
 <?php 
		
	$i = 1;
	$tot = 0;  
	$tot_fee = 0;
	$tot_paid = 0;
	$tot_balance = 0;
	
	if (is_array($fee_exe_det)&&count($fee_exe_det)>=1){
		foreach($fee_exe_det as $each_fee){
		$paidfee = 0;
		  ?>
    <td align="left"><?php echo $i; $i++; ?></td>
    <td align="left"><?php echo classname($each_fee['es_classesid']); ?></td>
	<td align="left"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($each_fee['fee_amount'],2,'.',''); ?></td>
    <td align="left"><?php echo $each_fee['students']; ?></td>
    <td align="left"><?php 
	
			$totalfee =  $each_fee['fee_amount']*$each_fee['students'];
			echo $_SESSION['eschools']['currency']."&nbsp;".number_format($totalfee ,2,'.','');
			?>
	 </td>
	 <?php ?>
    <td align="left">
	
	<?php if(count($tfee_exe_det)>0){
	foreach($tfee_exe_det as $each_paidfee){		
	if ( $each_fee['es_classesid']== $each_paidfee['class']){
			$paidfee = (float)$each_paidfee['amount'];
			echo $_SESSION['eschools']['currency']."&nbsp;".number_format($paidfee  ,2,'.','');
			} } }?>
	</td>
	
	
    <td align="left"><?php 
	   $outstandingfee = $totalfee - $paidfee ;
	   echo $_SESSION['eschools']['currency']."&nbsp;".number_format($outstandingfee ,2,'.','');
	 ?></td>
  </tr>
  <?php  $tot = $tot+$each_fee['fee_amount'];
         $tot_fee = $tot_fee+$totalfee;
         $tot_paid = (float)$tot_paid+(float)$paidfee;
         $tot_balance = $tot_balance+$outstandingfee;
  
      } 
	  }
	  
	  ?>
   <tr>
    <th colspan="2" > TOTAL</th>
    <th align="left"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($tot ,2,'.',''); ?></th>
	<th align="left">&nbsp;</th>
    <th align="left"><?php
	      
		  
		  echo $_SESSION['eschools']['currency']."&nbsp;".number_format($tot_fee ,2,'.','');
		    ?></th>
    <th align="left"><?php
	       
		  
		  
		  echo $_SESSION['eschools']['currency']."&nbsp;".number_format($tot_paid ,2,'.','');
		   ?></th>
    <th align="left"><?php
	       
		  
		  echo $_SESSION['eschools']['currency']."&nbsp;".number_format($tot_balance ,2,'.','');
		   ?></th>
  </tr>
  										
  
</table>



		



  <?php 
       }
  ?>
 
 
 <?php 
if ($action == 'fee_paid_list' || $action=="fee_paid_listprint") { ?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<?php if ($action == 'fee_paid_list' ){ ?>
	<tr>
         <td height="3" colspan="3"></td>
    </tr>
	<tr> 
		<td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Category Wise Fee Paid</span></td>
	</tr>
	<?php }?>
    <tr>
	    <td height="1" colspan="3" >
			<table width="100%" border="1" cellspacing="0" cellpadding="3" class="tbl_grid">
			<form action="" name="feesearch" method="post">
			<?php if($action!="fee_paid_listprint"){?>
				<tr >  
				
				
						   <td  height="35" colspan="3" align="left" valign="middle" class="admin">&nbsp;Select Fee Category</td>
				
				           <td  height="35" colspan="7" align="left" valign="middle" class="narmal"><select name="feecategories"  style="width:150px;">
							 <option value="all">- - All- - </option>
                             <?php  foreach($fees_cat_det as $eachfee){ ?>
                             <option value="<?php echo $eachfee['fee_particular']; ?>" <?php if($feecategories==$eachfee['fee_particular']){ ?> selected                           ="selected"                        <?php } ?> >
                             <?php    echo $eachfee['fee_particular']; ?>
                             </option>
                             <?php } ?>
                           </select></td>
	            </tr> 
<tr><td colspan="10"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="30%" >
                     	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                        	<tr>
                            	<td width="32%" class="narmal">From:</td>
                                <td width="12%"><input class="plain" name="dc1" value="<?php if (isset($dc1)&&$dc1!=""){ echo $dc1;} ?>" size="12" onfocus="this.blur()" readonly="readonly" /></td>
                                 <td width="56%"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fStartPop(document.feesearch.dc1,document.feesearch.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a>                                 </td>
							</tr>
                      </table>
                    </td>
                    <td width="70%" >
                    	<table width="54%" border="0" cellspacing="0" cellpadding="0">
                        	<tr>
                            	<td width="8%"  class="narmal">To:</td>
                                <td width="10%"><input class="plain" name="dc2" value="<?php if (isset($dc2)&&$dc2!=""){ echo $dc2; }?>" size="12" onfocus="this.blur()" readonly="readonly" />
                                </td>
                                <td width="82%"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fEndPop(document.feesearch.dc1,document.feesearch.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a>
                                </td>
								<iframe width=132 height=142 name="gToday:contrast:agenda.js" id="gToday:contrast:agenda.js" src="<?php echo JS_PATH ?>/DateRange/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>
                          </tr>
                      </table>
					</td>
  </tr>
 </table>
</td></tr>
	<tr>
							<td align="left" class="admin" colspan="3">&nbsp;Financial&nbsp;Year</td>
							
							<td align="left" class="narmal" colspan="3">
								<select name="pre_year">
								<?php  foreach($school_details_res as $each_record) { ?>
								<option value="<?php echo $each_record['es_finance_masterid']; ?>" <?php  if ($each_record['es_finance_masterid']==$pre_year) { echo "selected"; }?>><?php echo displaydate($each_record['fi_startdate'])." To ".displaydate($each_record['fi_enddate']); ?>						                        </option>
								<?php } ?>
								</select>							</td>
							<td align="center" class="adminfont"  colspan="4">
							<input type="submit" name="fee_school_year" class="bgcolor_02" value="Submit" style="cursor:pointer;"/>							</td>
			  </tr>
		<?php }?>
				
				
				<?php 
				if($fee_school_year!="" && count($errormessage)==0){
				if(isset($fee_school_year) && $no_rows==0){ echo '<tr>
						<td colspan="10" align="center" class="bgcolor_02"> No Records Found </td></tr>';} else{  ?> 
				<?php if($action!="fee_paid_listprint"){?>  
				<tr>
							<th colspan="10" class="admin" align="left">&nbsp;</th>
				</tr> 
				
				<?php }if($action=="fee_paid_listprint"){?> 
				<tr>
	<th colspan="10" align="center"><?php if($dc1!=""){echo "From&nbsp;:&nbsp;".$dc1;} if($dc2!=""){echo "&nbsp;To&nbsp;:&nbsp;".$dc2;}?> </th>
	</tr> 
	<?php }?> 
					<tr class="bgcolor_02">
							<td width="3%" class="admin">S.No</td>
							<td width="8%" class="admin">Date</td>
							<td width="20%" class="admin">Reg.No </td>
							<td width="17%" class="admin">Student's&nbsp;Name </td>
					        <td width="10%" class="admin">Father's&nbsp;Name </td>
					        <td width="5%" class="admin">Class</td>
						  <td width="10%" class="admin">Mode&nbsp;of&nbsp;Payment </td>
						  <td width="7%" class="admin">Receipt&nbsp;No </td>
						  <td width="10%" class="admin">Amount Received </td>
						  <td width="10%" class="admin">Waived Amount  </td>
				</tr>
					 <?php $i = 1; 
					 $ronum=1;
					 $prev="";
					// array_print($fee_exe_det);
					 //$new_array=array_count_values($fee_exe_det);
					  foreach($fee_exe_det as $eachval){
					  $arrval[]=$eachval['particulartname'];
					  }
					    // array_print($arrval);
					 	$new_array=array_count_values($arrval);
						//array_print($new_array);
						$grandtotal=0;
						$cashtotal=0;
						$chequetotal=0;
						
					 foreach($fee_exe_det as $eachfee){ 
					 $zibracolor = ($ronum%2==0)?"even":"odd";
					?> 
					<?php if($prev!=$eachfee['particulartname']) {
					$i=1;
					$total=0;
					$total_waived=0;
					?>
		  <tr>
							<td class="narmal" colspan="10"><b><?php echo $eachfee['particulartname']; ?></b></td>
			  </tr>
				<?php }?>
			
				
				
		  <tr class="<?php echo $zibracolor;?>">
							
							<td class="narmal"><?php echo $i;?></td>
							<td class="narmal"><?php echo func_date_conversion("Y-m-d","d/m/Y",$eachfee['date']);?></td>
							<td class="narmal"><?php echo $eachfee['es_preadmissionid'];?></td>
							<td class="narmal"><?php echo $eachfee['pre_name'];?></td>
							<td align="center" class="narmal"><?php echo $eachfee['pre_fathername'];?></td>
							<td class="narmal"><?php echo $eachfee['es_classname'];?></td>
							<td><?php echo $eachfee['es_paymentmode'];?></td>
						   <td class="narmal"><?php echo $rest = substr($eachfee['es_receiptno'], 7); ?></td>
						   <td class="narmal"><?php  echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachfee['feeamount'], 2, '.', '');
						   $total+=$eachfee['feeamount'];
						  ++$i; 
					 $ronum++;  
					 $prev=$eachfee['particulartname'];
					  if($eachfee['es_paymentmode']=="cash"){
				 $cashtotal+=$eachfee['feeamount'];
				 
				 }else{
				 $chequetotal+=$eachfee['feeamount'];
				 
				 }
				 
						   
						   ?> </td>
						   <td class="narmal"><?php  echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachfee['fee_waived'], 2, '.', '');
						   $total_waived+=$eachfee['fee_waived'];
						   ?> </td>
			  </tr>
		
			     <?php if($new_array[$eachfee['particulartname']]==($i-1)){
				
				 $grandtotal+=$total;
				 $grandtotal_waived+=$total_waived;
				 ?>
				
				 <tr><td colspan="8" class="narmal" align="right"><b>SUB-TOTAL</b></td>
							<td   class="narmal" align="left"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($total, 2, '.', '');?></td>
							<td   class="narmal" align="left"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($total_waived, 2, '.', '');?></td>
				</tr>
				
					<?php }
	
					 }?><tr><td class="narmal"  colspan="8" align="right" ><b>GRAND&nbsp;TOTAL</b></td>
							<td   class="narmal" align="left" ><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($grandtotal, 2, '.', '');?></td>
							<td   class="narmal" align="left" ><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($grandtotal_waived, 2, '.', '');?></td>
				
				
				<tr><td class="narmal" align="left" colspan="3"><b>CASH&nbsp;COLLECTION</b></td>
							<td   class="narmal" align="left" colspan="7"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($cashtotal, 2, '.', '');?></td>
								
							
				</tr>
				
				
				<tr><td  class="narmal" align="left" colspan="3"><b>CHEQUE&nbsp;COLLECTION</b></td>
							<td   class="narmal" align="left" colspan="7"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($chequetotal, 2, '.', '');?></td>
							
				</tr>
				
				<tr><td class="narmal" align="left" colspan="3"><b>GRAND&nbsp;TOTAL</b></td>
							<td   class="narmal" align="left" colspan="7"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($grandtotal, 2, '.', '');?></td>
							
							
				</tr>
				<tr><td class="narmal" align="left" colspan="3"><b>GRAND&nbsp;TOTAL&nbsp;WAIVED&nbsp;AMOUNT</b></td>
							<td   class="narmal" align="left" colspan="7"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($grandtotal_waived, 2, '.', '');?></td>
							
							
				</tr>
				<?php if($action!="fee_paid_listprint"){?>
				<tr> 
				  <td align="right" colspan="10">
				  <?php if(in_array('6_9',$admin_permissions)){?>
 <input name="submit2" type="button" onclick="newWindowOpen('?pid=40&action=fee_paid_listprint<?php echo $prinfeeturl;?>');" class="bgcolor_02" value="print"  style="cursor:pointer;padding:5px;"/><?php }?>
				  </td>	
				</tr>      <?php } } }?>
			  </form>
			</table>
      </td>
    </tr>
</table>

<?php } ?>



<?php 
if ($action == 'classwisepayment_list' || $action == 'classwisepayment_listprint') { ?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
 <?php if($action!='classwisepayment_listprint'){?>
	<tr>
         <td height="3" colspan="3"></td>
    </tr>
	
	<tr> 
		<td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Class Wise Fee Paid</span></td>
	</tr>
	<?php }?>
	
    <tr>
	    <td height="1" colspan="3" >
			<table width="100%" border="1" cellspacing="0" cellpadding="3" class="tbl_grid">
			<form action="" name="feesearch" method="post">
			<?php if($action!='classwisepayment_listprint'){?>
				<tr >  
				
				
						   <td  height="35" colspan="3" align="left" valign="middle" class="admin">&nbsp;Select Class</td>
				
				           <td  height="35" colspan="8" align="left" valign="middle" class="narmal"><select name="pre_class" id="classid_t">
										<option value="all">ALL</option>
                    	<?php 
							$classlist = getallClasses();
							foreach($classlist as $indclass) {
						?>
										<option <?php if($indclass['es_classesid']==$pre_class) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_classesid']; ?>"><?php echo $indclass['es_classname']; ?></option>
                        <?php } ?>
								  </select>		
				  </td>
	            </tr> 
				<tr><td colspan="11"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="30%" >
                     	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                        	<tr>
                            	<td width="32%" class="narmal">From:</td>
                                <td width="12%"><input class="plain" name="dc1" value="<?php if (isset($dc1)&&$dc1!=""){ echo $dc1;} ?>" size="12" onfocus="this.blur()" readonly="readonly" /></td>
                                 <td width="56%"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fStartPop(document.feesearch.dc1,document.feesearch.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a>                                 </td>
							</tr>
                      </table>
                    </td>
                    <td width="70%" >
                    	<table width="54%" border="0" cellspacing="0" cellpadding="0">
                        	<tr>
                            	<td width="8%"  class="narmal">To:</td>
                                <td width="10%"><input class="plain" name="dc2" value="<?php if (isset($dc2)&&$dc2!=""){ echo $dc2; }?>" size="12" onfocus="this.blur()" readonly="readonly" />
                                </td>
                                <td width="82%"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fEndPop(document.feesearch.dc1,document.feesearch.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a>
                                </td>
								<iframe width=132 height=142 name="gToday:contrast:agenda.js" id="gToday:contrast:agenda.js" src="<?php echo JS_PATH ?>/DateRange/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>
                          </tr>
                      </table>
					</td>
  </tr>
 </table>
</td></tr>
	<tr>
							<td align="left" class="admin" colspan="3">&nbsp;Financial&nbsp;Year</td>
							
							<td align="left" class="narmal" colspan="3">
								<select name="pre_year">
								<?php  foreach($school_details_res as $each_record) { ?>
								<option value="<?php echo $each_record['es_finance_masterid']; ?>" <?php  if ($each_record['es_finance_masterid']==$pre_year) { echo "selected"; }?>><?php echo displaydate($each_record['fi_startdate'])." To ".displaydate($each_record['fi_enddate']); ?>						                        </option>
								<?php } ?>
								</select>							</td>
							<td align="center" class="adminfont"  colspan="5">
							<input type="submit" name="fee_school_year" class="bgcolor_02" value="Submit" style="cursor:pointer;"/>							</td>
			  </tr>
				<?php }?>
				
				
				<?php 
			
				if($fee_school_year!="" && count($errormessage)==0){
				if(isset($fee_school_year) && $no_rows==0){ echo '<tr>
						<td colspan="11" align="center" class="bgcolor_02"> No Records Found </td></tr>';} else{  ?> 
						<?php if($action!='classwisepayment_listprint'){?>  
						
				<tr>
							<th colspan="11" class="admin" align="left">&nbsp;</th>
				</tr>  
				<?php }if($action=="classwisepayment_listprint"){?> 
				<tr>
	<th colspan="11" align="center"><?php if($dc1!=""){echo "From&nbsp;:&nbsp;".$dc1;} if($dc2!=""){echo "&nbsp;To&nbsp;:&nbsp;".$dc2;}?> </th>
	</tr> 
	<?php }?>
				
					<tr class="bgcolor_02">
							<td width="3%" class="admin">S.No</td>
							<td width="3%"  class="admin">Date</td>
							<td width="21%"  class="admin">Reg.No </td>
							<td width="13%"  class="admin">Student's&nbsp;Name </td>
					        <td width="13%"  class="admin">Father's&nbsp;Name </td>
					        <td width="5%" class="admin">Class</td>
							  <td width="6%"  class="admin">Category </td>
					  <td width="7%"  class="admin">Mode&nbsp;of Payment </td>
					  <td width="8%"  class="admin">Receipt&nbsp;No </td>
					  <td width="11%"  class="admin">Amount Received </td>
					   <td width="10%"  class="admin">Waived Amount </td>
				</tr>
					 <?php $i = 1; 
					 $ronum=1;
					 $prev="";
					// array_print($fee_exe_det);
					 //$new_array=array_count_values($fee_exe_det);
					  foreach($fee_exe_det as $eachval){
					  $arrval[]=$eachval['particulartname'];
					  }
					 // array_print($arrval);
					 	$new_array=array_count_values($arrval);
						//array_print($new_array);
						$grandtotal=0;
						$cashtotal=0;
						$chequetotal=0;
					 foreach($fee_exe_det as $eachfee){ 
					$zibracolor = ($ronum%2==0)?"even":"odd";
					
					?> 
					
			
				
				
		  <tr class="<?php echo $zibracolor;?>">
							
							<td class="narmal"><?php echo $i;?></td>
							<td class="narmal"><?php echo func_date_conversion("Y-m-d","d/m/Y",$eachfee['date']);?></td>
							<td class="narmal"><?php echo $eachfee['es_preadmissionid'];?></td>
							<td class="narmal"><?php echo $eachfee['pre_name'];?></td>
							<td align="center" class="narmal"><?php echo $eachfee['pre_fathername'];?></td>
							<td class="narmal"><?php echo $eachfee['es_classname'];?></td>
							<td><?php echo $eachfee['particulartname'];?></td>
							<td><?php echo $eachfee['es_paymentmode'];?></td>
						   <td class="narmal"><?php echo $rest = substr($eachfee['es_receiptno'], 7); ?></td>
						   <td class="narmal"><?php  echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachfee['feeamount'], 2, '.', '');
						   $total+=$eachfee['feeamount'];
						  ++$i; 
					 $ronum++;  
					 $prev=$eachfee['particulartname'];
					  if($eachfee['es_paymentmode']=="cash"){
				 $cashtotal+=$eachfee['feeamount'];
				 
				 }else{
				 $chequetotal+=$eachfee['feeamount'];
				 
				 }
				
						   
						   ?> </td>
						   <td class="narmal"><?php  echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachfee['fee_waived'], 2, '.', '');
						   $total_waived+=$eachfee['fee_waived'];
						  
				
						   
						   ?> </td>
			  </tr>
		
					<?php
	
					 }
					 
					 $grandtotal=$chequetotal+$cashtotal;
					// $grandtotal_waived+=$total_waived;
					 ?>
					 
					 
					 <tr><td class="narmal"  colspan="9" align="right" ><b>GRAND&nbsp;TOTAL</b></td>
							<td   class="narmal" align="left" ><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($grandtotal, 2, '.', '');?></td>
							<td   class="narmal" align="left" ><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($total_waived, 2, '.', '');?></td>
							
							
				
				
				<tr><td class="narmal" align="left" colspan="3"><b>CASH&nbsp;COLLECTION</b></td>
							<td   class="narmal" align="left" colspan="8"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($cashtotal, 2, '.', '');?></td>
								
							
				</tr>
				
				
				<tr><td  class="narmal" align="left" colspan="3"><b>CHEQUE&nbsp;COLLECTION</b></td>
							<td   class="narmal" align="left" colspan="8"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($chequetotal, 2, '.', '');?></td>
							
				</tr>
				
				<tr><td class="narmal" align="left" colspan="3"><b>GRAND&nbsp;TOTAL</b></td>
							<td   class="narmal" align="left" colspan="8"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($grandtotal, 2, '.', '');?></td>
							
							
				</tr>
				<tr><td class="narmal" align="left" colspan="3"><b>GRAND&nbsp;TOTAL&nbsp;WAIVED&nbsp;AMOUNT</b></td>
							<td   class="narmal" align="left" colspan="8"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($total_waived, 2, '.', '');?></td>
							
							
				</tr>
				<?php if($action!="classwisepayment_listprint"){?>
				<tr> 
				  <td align="right" colspan="11">
<?php if(in_array('6_10',$admin_permissions)){?>
 <input name="submit2" type="button" onclick="newWindowOpen('?pid=40&action=classwisepayment_listprint<?php echo $printurl;?>');" class="bgcolor_02" value="print"  style="cursor:pointer;padding:5px;"/>	<?php }?>
		     </td>
		
				</tr>      <?php } } }?>
			  </form>
			</table>
      </td>
    </tr>
</table>

<?php } ?>
<?php 
if ($action == 'installment_fines') { ?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
         <td height="3" colspan="3"></td>
	 </tr>
	  <tr>
		<td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Installment Fines charged</span></td>
	  </tr>
	   <tr height="25">
			    <td width="1" class="bgcolor_02" ></td>
                <td  valign="middle" class="narmal" align="right">
				<form action="?pid=40&action=installment_fines" name="fee_search" method="post">
				<table width="100%" border="0">
				  
				  
				  <tr>
					<td>
					<table width="100%" border="0">
					  <tr>
						<td>Fine Received From</td>
						<td>:</td>
						<td><?php echo $html_obj->draw_inputfield('dc1','','','readonly="readonly" size="10"');?><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fStartPop(document.fee_search.dc1,document.fee_search.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a></td>
						<td>To</td>
						<td>:</td>
						<td><?php echo $html_obj->draw_inputfield('dc2','','','readonly="readonly" size="10"');?><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fEndPop(document.fee_search.dc1,document.fee_search.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a></td>
					  </tr>
					  <iframe width=132 height=142 name="gToday:contrast:agenda.js" id="gToday:contrast:agenda.js" src="<?php echo JS_PATH ?>/DateRange/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
	</iframe>
					  <tr>
						<td>Registration No</td>
						<td>:</td>
						<td><?php echo $html_obj->draw_inputfield('es_preadmissionid','','','');?></td>
						<td></td>
						<td></td>
						<td></td>
					  </tr>
					</table>

					</td>
				  </tr>
				  <tr>
					<td align="center"><input type="submit" name="search_all_otherfines" value="Search" class="bgcolor_02" style="cursor:pointer" /></td>
				  </tr>
				  <tr>
					<td align="center" height="25"></td>
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
<br />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
		
		<tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="left" valign="top">
		
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr class="bgcolor_02" height="25">
    <td>S.No</td>
    <td>Student Name<br />[Registration No]</td>
    <td>Class</td>
	<td>Date</td>
    <td>Fine Charged</td>
    <td>Fine Paid</td>
    <td>Fine waived</td>
    <td></td>
  </tr>
  <?php						
		 if(count($fine_charged_details)>=1){
         $slno = $start+1;
		 $rw =1;
		 $fine_amount_total =0;
		 $amount_paid_total =0;
		 $deduction_allowed_total =0;
foreach ($fine_charged_details as $eachrecord)
      {
	if($slno%2==0)
		$rowclass = "even";
		else
		$rowclass = "odd";
		//$qq_rr = "SELECT SUM(fine_amount) , SUM(amount_paid) , SUM(deduction_allowed) FROM  es_fine_charged_collected WHERE studentid=".$eachrecord['studentid']."";
	    //$paid_unpaid_det = $db->getrow($qq_rr);
		
?>       
  <tr class="<?php echo $rowclass;?>">
    <td height="15" align="left" valign="middle">&nbsp;<?php echo $slno;?></td>
    <td height="15" align="left" valign="middle">&nbsp;<?php echo ucfirst($eachrecord['pre_name']) ."<br>[ ".$eachrecord['es_preadmissionid']." ]"; ?></td>
    <td height="15" align="left" valign="middle">&nbsp;<?php echo classname($eachrecord['class']); ?></td>
	<td height="15" align="left" valign="middle">&nbsp;<?php echo func_date_conversion("Y-m-d","d/m/Y",$eachrecord['date']); ?></td>
    <td height="15" align="left" valign="middle">&nbsp;
      <?php if($eachrecord['fine_amount']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['fine_amount'], 2, '.', '');}  ?></td>
    <td height="15" align="left" valign="middle">&nbsp;
      <?php if($eachrecord['amount_paid']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['amount_paid'], 2, '.', '');}  ?></td>
    <td height="15" align="left" valign="middle">&nbsp;
      <?php if($eachrecord['deduction_allowed']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['deduction_allowed'], 2, '.', '');}else{echo '---';}?></td>
    <td height="15" align="left" valign="middle"><?php /*?><input type="image" src="images/b_browse.png" border="0" title="View" alt="View" onclick="window.open('?pid=40&action=printcompletefeedet&sid=<?php echo $eachrecord['es_preadmissionid']; ?>',null,'width=800,height=700,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"/><?php */?></td>
  </tr>
  <?php $slno++;
  		$fine_amount_total +=$eachrecord['fine_amount'];
        $amount_paid_total +=$eachrecord['amount_paid'];
		$deduction_allowed_total +=$eachrecord['deduction_allowed'];
  
  }?>
  <tr><td colspan="7"><?php paginateexte($start, $q_limit, $no_rows, 'action='.$action.$PageUrl);?></td></tr>
  <tr><td colspan="7" height="30">
  <table width="100%" border="0">
  
  <tr>
    <td height="25" align="left" valign="middle">Fine Paid</td>
    <td height="25" align="left" valign="middle">:</td>
    <td height="25" align="left" valign="middle"><?php if($amount_paid_total>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($amount_paid_total, 2, '.', '');}  ?></td>
  </tr>
 
  <tr>
    <td height="25" align="left" valign="middle">Fine Waived</td>
    <td height="25" align="left" valign="middle">:</td>
    <td height="25" align="left" valign="middle"><?php if($deduction_allowed_total>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($deduction_allowed_total, 2, '.', '');}  ?></td>
  </tr>
  <tr>
    <td width="13%" height="25" align="left" valign="middle">Total</td>
    <td width="1%" height="25" align="left" valign="middle">:</td>
    <td width="86%" height="25" align="left" valign="middle"><?php if($fine_amount_total>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($fine_amount_total, 2, '.', '');}  ?></td>
  </tr>
  <tr>
    <td height="25" align="left" valign="middle">&nbsp;</td>
    <td height="25" align="left" valign="middle">&nbsp;</td>
    <td height="25" align="left" valign="middle">
	<?php if(in_array('6_13',$admin_permissions)){?>
 <a href="javascript: void(0)" onclick="popup_letter('?pid=40&action=print_list<?php echo $PageUrl;?>')" ><img src="images/print_16.png" border="0" title="Print Recipt" alt="Print Recipt" /></a><?php }?>
	
	</td>
  </tr>
</table>
  
  </td></tr>
  
  
  <?php }else{?>
  <tr><td colspan="7" align="center" height="25" class="error_message"> No Records Found</td></tr>
  <?php }?>
  
</table>

		</td>
		<td width="1" class="bgcolor_02"></td>
	  </tr>	  
	  <tr>
		<td height="1" colspan="3" class="bgcolor_02"></td>
	  </tr>
	</table>

<?php } ?>

<?php
// List other fine 
	if($action=='print_list')
	{
?>	

	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
         <td height="3" colspan="3"></td>
	 </tr>
	  <tr>
		<td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Installment Fines charged </span></td>
	  </tr>
	   <tr height="25">
			    <td class="bgcolor_02" ></td>
                  				<td  valign="middle" class="narmal" align="center"><?php if(isset($dc1)){echo "From  : ".$dc1;}?>&nbsp;&nbsp;<?php if(isset($dc1)){echo "To  : ".$dc2;}?></td>
								 <td class="bgcolor_02"></td>
	  </tr
	  ><tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="left" valign="top">
		
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr class="bgcolor_02" height="25">
    <td>S.No</td>
    <td>Student Name<br />[Registration No]</td>
    <td>Class</td>
	<td>Date</td>
    <td>Fine Charged</td>
    <td>Fine Paid</td>
    <td>Fine waived</td>
    <td></td>
  </tr>
  <?php						
		 if(count($fine_charged_details)>=1){
         $slno = $start+1;
		 $rw =1;
		 $fine_amount_total =0;
		 $amount_paid_total =0;
		 $deduction_allowed_total =0;
foreach ($fine_charged_details as $eachrecord)
      {
	if($slno%2==0)
		$rowclass = "even";
		else
		$rowclass = "odd";
		
		
?>       
  <tr class="<?php echo $rowclass;?>">
    <td height="15" align="left" valign="middle">&nbsp;<?php echo $slno;?></td>
    <td height="15" align="left" valign="middle">&nbsp;<?php echo ucfirst($eachrecord['pre_name']) ."<br>[ ".$eachrecord['es_preadmissionid']." ]"; ?></td>
    <td height="15" align="left" valign="middle">&nbsp;<?php echo classname($eachrecord['class']); ?></td>
	<td height="15" align="left" valign="middle">&nbsp;<?php echo func_date_conversion("Y-m-d","d/m/Y",$eachrecord['date']); ?></td>
    <td height="15" align="left" valign="middle">&nbsp;
      <?php if($eachrecord['fine_amount']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['fine_amount'], 2, '.', '');}  ?></td>
    <td height="15" align="left" valign="middle">&nbsp;
      <?php if($eachrecord['amount_paid']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['amount_paid'], 2, '.', '');}  ?></td>
    <td height="15" align="left" valign="middle">&nbsp;
      <?php if($eachrecord['deduction_allowed']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['deduction_allowed'], 2, '.', '');}else{echo '---';}?></td>
    <td height="15" align="left" valign="middle"><?php /*?><input type="image" src="images/b_browse.png" border="0" title="View" alt="View" onclick="window.open('?pid=40&action=printcompletefeedet&sid=<?php echo $eachrecord['es_preadmissionid']; ?>',null,'width=800,height=700,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"/><?php */?></td>
  </tr>
  <?php $slno++;
  		$fine_amount_total +=$eachrecord['fine_amount'];
        $amount_paid_total +=$eachrecord['amount_paid'];
		$deduction_allowed_total +=$eachrecord['deduction_allowed'];
  
  }?>
  <tr><td colspan="7"><?php paginateexte($start, $q_limit, $no_rows, 'action='.$action.$PageUrl);?></td></tr>
  <tr><td colspan="7" height="30">
  <table width="100%" border="0">
  
  <tr>
    <td height="25" align="left" valign="middle">Fine Paid</td>
    <td height="25" align="left" valign="middle">:</td>
    <td height="25" align="left" valign="middle"><?php if($amount_paid_total>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($amount_paid_total, 2, '.', '');}  ?></td>
  </tr>
 
  <tr>
    <td height="25" align="left" valign="middle">Fine Waived</td>
    <td height="25" align="left" valign="middle">:</td>
    <td height="25" align="left" valign="middle"><?php if($deduction_allowed_total>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($deduction_allowed_total, 2, '.', '');}  ?></td>
  </tr>
  <tr>
    <td width="13%" height="25" align="left" valign="middle">Total</td>
    <td width="1%" height="25" align="left" valign="middle">:</td>
    <td width="86%" height="25" align="left" valign="middle"><?php if($fine_amount_total>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($fine_amount_total, 2, '.', '');}  ?></td>
  </tr>
  
</table>
  
  </td></tr>
  
  
  <?php }else{?>
  <tr><td colspan="7" align="center" height="25" class="error_message"> No Records Found</td></tr>
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
// End of List	
?>
<?php if($action=='receipt_list'){?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
  </tr>
	<tr><td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Student Receipts List</span></td></tr>
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="left" valign="top">
        <table width="100%">
  <tr>
    <td><form method="post" action="" name="fetchstudent">
			<div><div >&nbsp;</div>
				<span align="left"  >&nbsp;&nbsp;Student Registration No :</span>
				<span  class="narmal"><?php echo $_SESSION['eschools']['student_prefix'];?>&nbsp;<input type="text" name="studentid"  value="<?php echo $studentid; ?>" /></span>&nbsp;<select name="pre_year">
						<?php  foreach($school_details_res as $each_record) { ?>
						<option value="<?php echo $each_record['es_finance_masterid']; ?>" <?php if ($each_record['es_finance_masterid']==$pre_year) { echo "selected"; }?>><?php echo displaydate($each_record['fi_startdate'])." To ".displaydate($each_record['fi_enddate']); ?>						                        </option>
						<?php } ?>
						</select>	&nbsp;
				<input type="hidden" name="std_count" value="<?php echo count($school_details_res ); ?>"	 />	
				<input type="submit" name="get_student_receipts" value="Go" class="bgcolor_02" style="padding-left:10px;padding-right:10px;cursor:pointer;"/></div>
			</form></td>
  </tr>
  <?php if(isset($get_student_receipts) && count($errormessage)==0){?>
  <tr>
    <td>
    <table width="100%">
  <tr height="25" class="bgcolor_02">
    <td>S.No.</td>
    <td>Date</td>
    <td>Receipt Number</td>
    <td>Amount</td>
    <td>Action</td>
  </tr>
  <?php 
  if(count($std_rcpt_det)>=1){
  $i=0;
$prev_dt_arr = array();
  	foreach($std_rcpt_det as $each){
	$i++;
	$totalamount = $each['SUM(feeamount)'];
	
	if(is_array($prev_dt_arr) && !in_array($each['date'],array_values($prev_dt_arr))){
	
	$receipt_det[0]['date'] = $each['date'];
	        $sql_ins_fime="SELECT SUM(amount_paid) FROM es_fine_charged_collected FCC, es_feemaster FM   WHERE FCC.studentid= ".$studentid." AND FCC.date='".$receipt_det[0]['date']."' AND FCC.es_feemasterid = FM.es_feemasterid AND FCC.amount_paid>=1";
			$installmentfine_row = $db->getone($sql_ins_fime);
	        if($installmentfine_row>=1){$totalamount += $installmentfine_row;}
			
			$sel_studentwise_rec = "SELECT SUM(paid_amount) FROM es_other_fine_dettails WHERE es_preadmissionid=".$studentid." AND paid_on='".$receipt_det[0]['date']."'";
			$misc_det = $db->getone($sel_studentwise_rec);
			if($misc_det>=1){$totalamount += $misc_det;}
			
			$sql_tr="SELECT SUM(amount_paid) FROM es_trans_payment_history  WHERE studentid= ".$studentid." AND paid_on='".$receipt_det[0]['date']."'";
			$tr_row = $db->getone($sql_tr);
			if($tr_row>=1){$totalamount += $tr_row;}
			
			$sql_stationary="SELECT SUM(paid_amount) FROM es_stationary_payment  WHERE student_id= ".$studentid." AND paid_date='".$receipt_det[0]['date']."'";
			$stationary_row = $db->getone($sql_stationary);
			if($stationary_row>=1){$totalamount += $stationary_row;}
			$sql_libfine="SELECT SUM(fine_paid) FROM es_libbookfinedet  WHERE es_libbooksid= ".$studentid." AND es_type='student' AND paid_on='".$receipt_det[0]['date']."'";
			$lib_row = $db->getone($sql_libfine);
			if($lib_row>=1){$totalamount += $lib_row;}
			
			$sql_hostel="SELECT SUM(amount_paid) FROM es_hostel_charges  WHERE es_personid= ".$studentid." AND es_persontype='student' AND paid_on='".$receipt_det[0]['date']."'";
			$hostel_row = $db->getone($sql_hostel);
			if($hostel_row>=1){$totalamount += $hostel_row;}
			
			$sql_oldbalpaid = "SELECT SUM(OBP.paid_amount) FROM es_old_balances OB , es_old_balances_paid OBP WHERE OB.studentid = ".$studentid." AND OB.ob_id = OBP.ob_id  AND OBP.paid_on = '".$receipt_det[0]['date']."' AND OBP.paid_amount > 0";
			$balance_row = $db->getone($sql_oldbalpaid);
			
			if($balance_row>=1){$totalamount += $balance_row;}
			}
  ?>
  <tr>
    <td><?php echo $i;?></td>
    <td><?php echo func_date_conversion("Y-m-d","d/m/Y",$each['paid_on']);?></td>
    <td><?php echo 'HRC'.$each['fid']; ?></td>
    <td><?php if($each['paid']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($each['paid'], 2, '.', '');}  ?></td>
   
    <td>
   
    <a href="javascript: void(0)" onclick="popup_letter('?pid=40&action=print_each_receipt&studentid=<?php echo $studentid;?>&pre_year=<?php echo $pre_year;?>&rid=<?php  echo $each['fid'] ; ?>')" ><img src="images/print_16.png" border="0" title="Print Recipt" alt="Print Recipt" /></a>
  &nbsp;&nbsp;<a href="javascript: void(0)" onclick="popup_letter('?pid=40&action=receiptpayment&ofid=<?php echo $each['fid']; ?>')" ><img src="images/b_browse.png" border="0" title="Print Payment Recipt" alt="Print Payment Recipt" /></a>
    <a href="javascript: void(0)" onclick="popup_letter2('?pid=40&action=print_each_receipt2&studentid=<?php echo $studentid;?>&pre_year=<?php echo $pre_year;?>&rid=<?php  echo $each['fid'] ; ?>')" ><img src="images/010236-045-0.jpg" border="0" title="Print Recipt" alt="Print Recipt" width="25" height="20" /></a>
    </td>
    
    
  </tr>
  <?php 
  $prev_dt_arr[$each['comments']] = $each['date'];
  }
  //print_r( $prev_dt_arr);
  ?>
  <tr><td colspan="5" align="right" style=" padding-right:20px;"><input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=40&action=print_all_receipts&start=<?php echo $start.$PageUrl; ?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /></td></tr>
  <?php }else{?>
  <tr><td colspan="5" align="center"><b>No Records Found</b></td></tr>
  <?php }?>
</table>

    
    </td>
  </tr>
  <?php }?>
</table>

			
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
<?php }?>
<?php if($action=='print_each_receipt'){?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
  </tr>
	<tr><td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Receipt</span></td></tr>
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="left" valign="top">
        <table width="100%">
  <tr>
    <td><table width="95%" border="0" cellspacing="2" cellpadding="0" align="center">
				<tr>
					<td align="left" class="narmal">Date</td>
					<td align="left" class="narmal">:</td>
					<td align="left" class="narmal"><?php echo func_date_conversion("Y-m-d","d/m/Y",$receipt_det['paid_on']);  ?></td>
					<td align="left" class="narmal">&nbsp;</td>
				</tr>	
                <tr>
					<td align="left" class="narmal">Receipt No</td>
					<td align="left" class="narmal">:</td>
					<td align="left" class="narmal"><?php echo 'HRC'.$rid;  ?></td>
					<td align="left" class="narmal">&nbsp;</td>
				</tr>
				<tr>
					<td align="left" class="narmal" width="31%">Student Name </td>
					<td align="left" class="narmal" width="1%">:</td>
					<td align="left" class="narmal" width="27%"><?php echo $studetails['pre_name']; ?></td>
					<td align="left" class="narmal" width="41%" rowspan="11"><?php if(isset($studetails['pre_image']) && $studetails['pre_image']!='')
					{echo displayimage("images/student_photos/".$studetails['pre_image'], "127");} ?></td>
				</tr>
				<tr>
					<td align="left" class="narmal" width="31%">User Name </td>
					<td align="left" class="narmal" width="1%">:</td>
					<td align="left" class="narmal" width="27%"><?php echo $studetails['pre_student_username']; ?></td>	
				</tr>
				<tr>
					<td align="left" class="narmal">Registration No</td>
					<td align="left" class="narmal">:</td>
					<td align="left" class="narmal"><?php echo $_SESSION['eschools']['student_prefix'];?><?php echo $studetails['es_preadmissionid']; ?></td>
				</tr>
               <tr>
					<td align="left" class="narmal">Class</td>
					<td align="left" class="narmal">:</td>
					<td align="left" class="narmal"><?php  echo classname($prev_class); ?></td>
				</tr>
                 <tr>
					<td align="left" class="narmal">Roll No</td>
					<td align="left" class="narmal">:</td>
					<td align="left" class="narmal"><?php echo $section_det['roll_no']; ?></td>
				</tr>
                <tr>
					<td align="left" class="narmal">Section</td>
					<td align="left" class="narmal">:</td>
					<td align="left" class="narmal"><?php echo $section_det['section_name']; ?></td>
				</tr>
				<tr>
					<td align="left" class="narmal">E-mail</td>
					<td align="left" class="narmal">:</td>
					<td align="left" class="narmal"><?php echo $studetails['pre_emailid']; ?></td>
				</tr>
				<tr>
					<td align="left" class="narmal">Father/Guardian Name </td>
					<td align="left" class="narmal">:</td>
					<td align="left" class="narmal"><?php echo $studetails['pre_fathername']; ?></td>
				</tr>
				<tr>
					<td align="left" class="narmal">Address</td>
					<td align="left" class="narmal">:</td>
					<td align="left" class="narmal"><?php echo $studetails['pre_address1']; ?></td>
				</tr>
                <tr>
					<td align="left" class="narmal">Academic Session</td>
					<td align="left" class="narmal">:</td>
					<td align="left" class="narmal"><?php echo func_date_conversion("Y-m-d","d/m/Y",$from_acad)." - ".func_date_conversion("Y-m-d","d/m/Y",$to_acad); ?></td>
				</tr>
				
							 
			</table></td>
  </tr>
  <tr>
    <td><table width="100%" border="1" cellspacing="0" cellpadding="0" class="tbl_grid">
			  
		    <tr class="bgcolor_02" height="25">
					<td width="33%" align="center" valign="middle" class="admin">&nbsp;S.No.</td>                            
				  <td width="37%" align="center" valign="middle" class="admin">Particulars</td>
				  <td width="30%" align="center" valign="middle" class="admin">Amount</td>
				</tr>
<?php
	if ( count($fee_det)>0){
		$i = 1;
	foreach($fee_det as $each){
	
		$feetotamt 	= 0;
?>
			<tr height="25">
					<td width="33%" align="center" valign="middle" class="admin">&nbsp;<?php echo $i; ?></td>                            
					<td width="37%" align="left" valign="middle" class="admin">&nbsp;<?php echo strtoupper($each['particulars']);  ?></td>
				  <td width="30%" align="right" valign="middle" class="admin"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($each['amount'], 2, '.', ''); ?></td>
				</tr>
                <?php 	$i++;} }?>	
               
				

				
									   
		  </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="1" cellspacing="0" cellpadding="0" class="tbl_grid">
			  
		    <tr class="bgcolor_02" height="25">
					<td width="33%" align="center" valign="middle" class="admin">&nbsp;Total Amount</td>                            
				  <td width="37%" align="center" valign="middle" class="admin">Paid Amount</td>
				  <td width="30%" align="center" valign="middle" class="admin">Balance</td>
				</tr>
<?php
	if (is_array($receipt_det) && count($receipt_det)>0){
		$i = 1;
		$feetotamt 	= 0;
?>
			<tr height="25">
					<td width="33%" align="center" valign="middle" class="admin">&nbsp;<?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($receipt_det['total_amount'], 2, '.', ''); ?></td>                            
					<td width="37%" align="center" valign="middle" class="admin"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($receipt_det['paid'], 2, '.', '');  ?></td>
				  <td width="30%" align="center" valign="middle" class="admin"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($receipt_det['balance'], 2, '.', ''); ?></td>
				</tr>	
<?php /*?>                <tr height="25">
					<td align="left"  colspan="3" class="admin">Received</td>
				</tr>	<?php */?>
                <tr height="25">
					<td align="left"  colspan="3"></td>
				</tr>
                <tr height="25">
					<td align="right"  colspan="3" style="padding-right:25px;" class="admin">Authorised Signatory</td>
				</tr>
				
<?php } ?>
				
									   
		  </table></td>
  </tr>
 
</table>

		
	  	
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
<?php }?>



<?php if($action=='print_all_receipts'){?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
  </tr>
	<tr><td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Student Payment History</span></td></tr>
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="left" valign="top">
        <table width="100%">
  <tr>
    <td><table width="95%" border="0" cellspacing="2" cellpadding="0" align="center">
				<tr>
					<td align="left" class="narmal">Date</td>
					<td align="left" class="narmal">:</td>
					<td align="left" class="narmal"><?php echo date("d/m/Y");  ?></td>
					<td align="left" class="narmal">&nbsp;</td>
				</tr>	
               
				<tr>
					<td align="left" class="narmal" width="31%">Student Name </td>
					<td align="left" class="narmal" width="1%">:</td>
					<td align="left" class="narmal" width="27%"><?php echo $studetails['pre_name']; ?></td>
					<td align="left" class="narmal" width="41%" rowspan="11"><?php if(isset($studetails['pre_image']) && $studetails['pre_image']!='')
					{echo displayimage("images/student_photos/".$studetails['pre_image'], "127");} ?></td>
				</tr>
				<tr>
					<td align="left" class="narmal" width="31%">User Name </td>
					<td align="left" class="narmal" width="1%">:</td>
					<td align="left" class="narmal" width="27%"><?php echo $studetails['pre_student_username']; ?></td>	
				</tr>
				<tr>
					<td align="left" class="narmal">Registration No</td>
					<td align="left" class="narmal">:</td>
					<td align="left" class="narmal"><?php echo $_SESSION['eschools']['student_prefix'];?><?php echo $studetails['es_preadmissionid']; ?></td>
				</tr>
               <tr>
					<td align="left" class="narmal">Class</td>
					<td align="left" class="narmal">:</td>
					<td align="left" class="narmal"><?php  echo classname($prev_class); ?></td>
				</tr>
                 <tr>
					<td align="left" class="narmal">Roll No</td>
					<td align="left" class="narmal">:</td>
					<td align="left" class="narmal"><?php echo $section_det['roll_no']; ?></td>
				</tr>
                <tr>
					<td align="left" class="narmal">Section</td>
					<td align="left" class="narmal">:</td>
					<td align="left" class="narmal"><?php echo $section_det['section_name']; ?></td>
				</tr>
				<tr>
					<td align="left" class="narmal">E-mail</td>
					<td align="left" class="narmal">:</td>
					<td align="left" class="narmal"><?php echo $studetails['pre_emailid']; ?></td>
				</tr>
				<tr>
					<td align="left" class="narmal">Father/Guardian Name </td>
					<td align="left" class="narmal">:</td>
					<td align="left" class="narmal"><?php echo $studetails['pre_fathername']; ?></td>
				</tr>
				<tr>
					<td align="left" class="narmal">Address</td>
					<td align="left" class="narmal">:</td>
					<td align="left" class="narmal"><?php echo $studetails['pre_address1']; ?></td>
				</tr>
                <tr>
					<td align="left" class="narmal">Academic Session</td>
					<td align="left" class="narmal">:</td>
					<td align="left" class="narmal"><?php echo func_date_conversion("Y-m-d","d/m/Y",$from_acad)." - ".func_date_conversion("Y-m-d","d/m/Y",$to_acad); ?></td>
				</tr>
				
							 
			</table></td>
  </tr>
  <tr>
    <td><table width="100%">
  <tr height="25" class="bgcolor_02">
    <td width="12%" align="center">S.No.</td>
    <td width="24%" align="center">Date</td>
    <td width="29%" align="center">Receipt Number</td>
    <td width="35%" align="center">Amount</td>
  </tr>
  <?php 
  if(count($std_rcpt_det)>=1){
  //array_print($std_rcpt_det);
  $i=0;
  $grandtotal ="";
$prev_dt_arr = array();
  	foreach($std_rcpt_det as $each){
	$i++;
	$totalamount = $each['SUM(feeamount)'];
	
	
  ?>
  <tr>
    <td align="center"><?php echo $i;?></td>
    <td align="center"><?php echo func_date_conversion("Y-m-d","d/m/Y",$each['paid_on']);?></td>
    <td align="center"><?php echo 'HRC'.$each['fid']; ?></td>
    <td align="right"  style="padding-right:20px;"><?php if($each['paid']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($each['paid'], 2, '.', '');}  ?></td>
  </tr>
  <?php
    $prev_dt_arr[$each['comments']] = $each['date'];
  
   $grandtotal += $each['paid']; }?>
 <tr>
   <td colspan="3" align="right"><b>Grand Total :</b></td>
    <td  align="right" style="padding-right:20px;"><b><?php if($grandtotal>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($grandtotal, 2, '.', '');}  ?></b></td>
  </tr>
  <?php }?>
 
</table></td>
  </tr>
 
</table>

		
	  	
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
<?php }?>
<style>
.fee_card{font-family:Verdana, Arial, Helvetica, sans-serif;
font-size:9px;
}
</style>
<?php if($action=='fee_card' || $action=='print_fee_card'){?>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
  </tr>
	<tr><td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Student Monthly Fee Card</span></td></tr>
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="left" valign="top">
        <table width="100%">
        <?php
       if( $action!='print_fee_card'){?>
  <tr>
    <td><form method="post" action="" name="fetchstudent">
			<div><div >&nbsp;</div>
				<span align="left"  >&nbsp;&nbsp;Student Registration No :</span>
				<span  class="narmal"><?php echo $_SESSION['eschools']['student_prefix'];?>&nbsp;
				<input type="text" name="studentid"  value="<?php echo $studentid; ?>" />
				</span>&nbsp;
			<select name="pre_year">
						<?php  foreach($school_details_res as $each_record) { ?>
						<option value="<?php echo $each_record['es_finance_masterid']; ?>" <?php if ($each_record['es_finance_masterid']==$pre_year) { echo "selected"; }?>><?php echo displaydate($each_record['fi_startdate'])." To ".displaydate($each_record['fi_enddate']); ?>						                        </option>
						<?php } ?>
						</select>	&nbsp;
				<input type="hidden" name="std_count" value="<?php echo count($school_details_res ); ?>"	 />	
				<input type="submit" name="get_fee_card" value="Go" class="bgcolor_02" style="padding-left:10px;padding-right:10px;cursor:pointer;"/></div>
			</form></td>
  </tr>
  
  <?php
  }?>

  <tr>
    <td>
       </td>
  </tr>
  
  <?php
 if(isset($get_fee_card) && count($errormessage)==0 || $action=='print_fee_card'){
  ?>
  <tr>
    <td>
    <table width="100%">
  <tr>
    <td><table width="100%" border="0">
								  <tr>
									<td width="50%"><table width="100%" border="0">
										  <tr>
											
											<td width="25%" height="25" align="left" valign="middle" class="admin">Registration&nbsp;No</td>
											<td width="2%" align="left" valign="middle" class="admin">:</td>
											<td width="73%" align="left" valign="middle"><?php echo $studentid;?></td>
										  </tr>
										  <tr>
											<td height="25" align="left" valign="middle" class="admin">Roll&nbsp;No / Section</td>
											<td align="left" valign="middle" class="admin">:</td>
											<td align="left" valign="middle"><?php echo $section_det['roll_no'];?><?php if($section_det['section_name']!=""){echo " / ".$section_det['section_name'];}?></td>
										</tr>
										<tr>
											<td height="25" align="left" valign="middle" class="admin">Class</td>
											<td align="left" valign="middle" class="admin">:</td>
											<td align="left" valign="middle"><?php echo classname($prev_class);?></td>
										</tr>
										<tr>
										  <td height="25" align="left" valign="middle" class="admin">Status</td>
										  <td align="left" valign="middle" class="admin">:</td>
										  <td align="left" valign="middle"><?php  if($stud_details['status']=='inactive'){ echo 'Transferred';}else{echo '---';} ?></td>
									  </tr>
								    </table></td>
									<td><table width="100%" border="0">
										  <tr>
												
												<td width="25%" height="25" align="left" valign="middle" class="admin">Date</td>
												<td width="2%" align="left" valign="middle" class="admin">:</td>
												<td width="73%" align="left" valign="middle"><?php echo date("d/m/Y");?></td>
										  </tr>
										 
										<tr>
											<td height="25" align="left" valign="middle" class="admin">Student&nbsp;Name</td>
											<td align="left" valign="middle" class="admin">:</td>
											<td align="left" valign="middle"><?php   echo ucwords($stud_details['pre_name']); ?></td>
										</tr>
										<tr>
											<td height="25" align="left" valign="middle" class="admin">Father&nbsp;Name</td>
											<td align="left" valign="middle" class="admin">:</td>
											<td align="left" valign="middle"><?php   echo ucwords($stud_details['pre_fathername']); ?></td>
										</tr>
										</table></td>	
								  </tr>
								</table></td>
  </tr>
  <tr>
    <td><table width="100%" cellpadding="0" cellspacing="0" border="1" class="tbl_grid" >
  <tr class="fee_card" height="25">
    <td >&nbsp;Month/<br />Particulars</td>
     <?php 
	 
	if(count($getfeelist)>=1){

	foreach($getfeelist as $each){?>
    <td width="5%">&nbsp;<?php echo ucfirst(strtolower($each['fee_particular']));?></td>
    <?php }}?>
    <td >&nbsp;Fee Fine</td>
    <td >&nbsp;Misc.Fine</td>
    <td >&nbsp;Tpt fee</td>
    <td >&nbsp;Sale</td>
    <td >&nbsp;Lib.Fine</td>
    <td >&nbsp;Hostel Fee</td>
    <td >&nbsp;Exam fee</td>
    <td >&nbsp;Old Balance</td>
    <td align="center">Last&nbsp;month<br /> Balance</td>
    <td align="center">Total</td>
    <td align="center">Paid</td>
   <td align="center">Balance</td>
    <?php /*?><td align="center">Date </td><?php */?>
   </tr>
  <?php 
   $tfee=(($each['fee_amount'])-($stud_details['fee_concession']))/12;
   $tutionfee=number_format($tfee,2,'.','');
  $ins_fine_tot = 0;
  $mis_fine_tot = 0;
  $tr_charges_tot = 0;
  $st_sale_tot = 0;
  $lib_fine_tot = 0;
  $hostel_charges_tot = 0;
  $examfee_tot = 0;
  $olb_bal_tot = 0;
  $this_month_total_tot =0;
  $paid_tot =0;
  $waid_tot =0;
  for($i=0;$i<count($month_arr);$i++){
  $sr = $i+1;
  
  ?>
  <tr class="fee_card" height="25">
    <td><?php echo $month_arr[$sr];?>,<?php if($sr<10){$year_card = $yr_arr[0];}else{$year_card = $yr_arr[0]+1;} echo $year_card; ?></td>
    <?php 
	 
	if(count($getfeelist)>=1){

	 $month_total = 0;
	 
	
	 
	foreach($getfeelist as $each){?>
    
    <td align="right"><?php if($each['fee_particular']=='TUITION'){$amount = $tutionfee; echo $amount;}else{$amount = $fullfeemaster_arr[$year_card][$month_arr[$sr]][$each['fee_particular']]; echo $amount;}?></td>
    


     <?php $month_total += $amount;}}?>
     
     
        <?php 	
		 $paid_arr[$year_card][$month_arr[$sr]];
		$ins_fine_paid_arr[$year_card][$month_arr[$sr]];
		$misc_paid_arr[$year_card][$month_arr[$sr]];
		$trans_paid_arr[$year_card][$month_arr[$sr]];
		$libfine_paid_arr[$year_card][$month_arr[$sr]];
		$hostel_paid_arr[$year_card][$month_arr[$sr]];
		

		
	 //$paid_arr[$each['YEAR( created_on )']][$each['MONTHNAME( created_on )']] ?>
    <td align="right"><?php echo $ins_fine_arr[$year_card][$month_arr[$sr]];?></td>
    <td align="right"><?php echo $misc_arr[$year_card][$month_arr[$sr]];?></td>
    <td align="right"><?php echo $trans_arr[$year_card][$month_arr[$sr]];?></td>
    <td align="right"><?php echo $station_arr[$year_card][$month_arr[$sr]];?></td>
    <td align="right"><?php echo $libfine_arr[$year_card][$month_arr[$sr]];?></td>
    <td align="right"><?php echo $hostel_arr[$year_card][$month_arr[$sr]];?></td>
    <td align="right"><?php echo $examfee_arr[$year_card][$month_arr[$sr]];?></td>
    <td align="right"><?php echo $oldbal_arr[$year_card][$month_arr[$sr]];?></td>
    <td align="right"><?php if($balance_amt>0){echo number_format($balance_amt,2,'.','');}?></td>
    
    <td align="right"><?php
	

	$this_month_total = $month_total+$ins_fine_arr[$year_card][$month_arr[$sr]]+$misc_arr[$year_card][$month_arr[$sr]]+$trans_arr[$year_card][$month_arr[$sr]]+$station_arr[$year_card][$month_arr[$sr]]+$libfine_arr[$year_card][$month_arr[$sr]]+$hostel_arr[$year_card][$month_arr[$sr]]+$examfee_arr[$year_card][$month_arr[$sr]]+$oldbal_arr[$year_card][$month_arr[$sr]]+$balance_amt;
	echo number_format($this_month_total,2,'.','');?></td>
     <td align="right"><?php if($newfee_arr_paid[$year_card][$month_arr[$sr]]>0 || $paid_arr[$year_card][$month_arr[$sr]]>0 
		||	$misc_paid_arr[$year_card][$month_arr[$sr]]>0
	||	$trans_paid_arr[$year_card][$month_arr[$sr]]>0
	||	$libfine_paid_arr[$year_card][$month_arr[$sr]]>0
	||	$hostel_paid_arr[$year_card][$month_arr[$sr]]>0
	||	$oldbal_paid_arr[$year_card][$month_arr[$sr]]>0
	|| $station_paid_arr[$year_card][$month_arr[$sr]]>0
	  )
	  
	 
	 {
	
	}
	
	 $paidamt1=$newfee_arr_paid[$year_card][$month_arr[$sr]]
	 +$paid_arr[$year_card][$month_arr[$sr]] 
	+	$misc_paid_arr[$year_card][$month_arr[$sr]]
	+	$trans_paid_arr[$year_card][$month_arr[$sr]]
	+	$libfine_paid_arr[$year_card][$month_arr[$sr]]
	+	$hostel_paid_arr[$year_card][$month_arr[$sr]]
	+	$oldbal_paid_arr[$year_card][$month_arr[$sr]]
	+ $station_paid_arr[$year_card][$month_arr[$sr]]
	;
	
	 echo $padi12=number_format($paidamt1,2,'.','');
	
	
	 ?></td>
    
    <td align="right"><?php
	
	
	/* 
	$balance_amt = $this_month_total - ($newfee_arr_paid[$year_card][$month_arr[$sr]]- $paid_wave_arr[$year_card][$month_arr[$sr]]
	- $paid_arr[$year_card][$month_arr[$sr]]
	
	-	$misc_paid_arr[$year_card][$month_arr[$sr]]- $misc_wave_arr[$year_card][$month_arr[$sr]]
	-	$trans_paid_arr[$year_card][$month_arr[$sr]]
	-	$libfine_paid_arr[$year_card][$month_arr[$sr]]
	-	$hostel_paid_arr[$year_card][$month_arr[$sr]]
	-	$oldbal_paid_arr[$year_card][$month_arr[$sr]]
	-$trans_wave_arr[$year_card][$month_arr[$sr]]
     -    $libfine_wave_arr[$year_card][$month_arr[$sr]]
      -  $hostel_wave_arr[$year_card][$month_arr[$sr]]
     -   $oldbal_wave_arr[$year_card][$month_arr[$sr]])
	;*/
	

	$balance_amt = $this_month_total -( $paidamt1+$paid_wave_arr[$year_card][$month_arr[$sr]]
	+$trans_wave_arr[$year_card][$month_arr[$sr]]
	+$libfine_wave_arr[$year_card][$month_arr[$sr]]
	+$hostel_wave_arr[$year_card][$month_arr[$sr]]
	+$oldbal_wave_arr[$year_card][$month_arr[$sr]]
	+ $misc_wave_arr[$year_card][$month_arr[$sr]]
	);
	echo number_format($balance_amt,2,'.','');
	 
	$waived= ($paid_wave_arr[$year_card][$month_arr[$sr]]
	+$trans_wave_arr[$year_card][$month_arr[$sr]]
	+$libfine_wave_arr[$year_card][$month_arr[$sr]]
	+$hostel_wave_arr[$year_card][$month_arr[$sr]]
	+$oldbal_wave_arr[$year_card][$month_arr[$sr]]
	+ $misc_wave_arr[$year_card][$month_arr[$sr]]);
	echo '<br>';
	
	
		echo '<br>';
	echo '[';
	?> <span style="color:#FF0000"><?php echo ''.number_format($waived,2,'.','').'</span>';
	echo ']';
	
	

	?></td>
   <?php /*?> <td align="right">&nbsp;</td><?php */?>
  </tr>
  <?php 
  $ins_fine_tot += $ins_fine_arr[$year_card][$month_arr[$sr]];
  $mis_fine_tot += $misc_arr[$year_card][$month_arr[$sr]];
  $tr_charges_tot += $trans_arr[$year_card][$month_arr[$sr]];
  $st_sale_tot += $station_arr[$year_card][$month_arr[$sr]];
  $lib_fine_tot += $libfine_arr[$year_card][$month_arr[$sr]];
  $hostel_charges_tot += $hostel_arr[$year_card][$month_arr[$sr]];
  $examfee_tot += $examfee_arr[$year_card][$month_arr[$sr]];
  $olb_bal_tot += $oldbal_arr[$year_card][$month_arr[$sr]];
  
 /* $paid_tot += $newfee_arr_paid[$year_card][$month_arr[$sr]];*/
  $paid_tot += $newfee_arr_paid[$year_card][$month_arr[$sr]]+$paid_arr[$year_card][$month_arr[$sr]]
	
	+	$misc_paid_arr[$year_card][$month_arr[$sr]]
	+	$trans_paid_arr[$year_card][$month_arr[$sr]]
	+	$libfine_paid_arr[$year_card][$month_arr[$sr]]
	+	$hostel_paid_arr[$year_card][$month_arr[$sr]]
	+	$oldbal_paid_arr[$year_card][$month_arr[$sr]];
  
 
  }?>
 <tr height="25">
 	<td></td>
    <?php 
	
	
//   $tutionfee=number_format($tfee,2,'.','');
	 
	if(count($getfeelist)>=1){
	foreach($getfeelist as $each){?>
    <td align="right"><?php if($each['fee_particular']=='TUITION'){$amount_tt = $each['fee_amount']-(12*$stud_details['fee_concession']);
	$tfee1=(($each['fee_amount'])-($stud_details['fee_concession']));
	echo number_format($tfee1,2,'.','')	 ;
	}else{
	
	
	echo number_format(($each['fee_amount']), 2, '.', '');
	//echo $each['fee_amount'];
	}?></td>
     <?php }}?>
    <td align="right"><?php echo number_format($ins_fine_tot, 2, '.', '');?></td>
    <td align="right"><?php echo number_format($mis_fine_tot, 2, '.', '');?></td>
    <td align="right"><?php echo number_format($tr_charges_tot, 2, '.', '');?></td>
    <td align="right"><?php echo number_format($st_sale_tot, 2, '.', '');?></td>
    <td align="right"><?php echo number_format($lib_fine_tot, 2, '.', '');?></td>
    <td align="right"><?php echo number_format($hostel_charges_tot, 2, '.', '');?></td>
    <td align="right"><?php echo number_format($examfee_tot, 2, '.', '');?></td>
    <td align="right"><?php echo number_format($olb_bal_tot, 2, '.', '');?></td>
    <td align="right"></td>
    <td align="right"></td>
    <td align="right"><?php /*?>	$trans_wave_arr[$year_card][$month_arr[$sr]]
        $libfine_wave_arr[$year_card][$month_arr[$sr]]
        $libfine_wave_arr[$year_card][$month_arr[$sr]]
        $hostel_wave_arr[$year_card][$month_arr[$sr]]
        $oldbal_wave_arr[$year_card][$month_arr[$sr]]<?php */?>      <?php echo number_format($paid_tot, 2, '.', '');
	
	//$paid_tot;?></td>
    
    <td align="right"></td>
   <?php /*?> <td align="right"></td><?php */?>
 </tr>
 <?php //if($this_month_total_tot>0)
 if($action!='print_fee_card'){?>
  <tr><td class="narmal" colspan="<?php $no_col = count($getfeelist)+14; echo $no_col;?>" align="right" style="padding-right:20px;"><input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=40&action=print_fee_card<?php echo $PageUrl; ?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /></td></tr><?php }?>
 
  
  
</table></td>
  </tr>
</table>    </td>
  </tr>
  <?php 
  }?>
</table>

			
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

<?php }?>
<?php if($action=='print_fee_card1'){?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
  </tr>
	<tr><td height="25" colspan="3" align="center">&nbsp;&nbsp;<span class="admin"><u>Student Monthly Fee Card</u></span></td></tr>
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="left" valign="top">
        <table width="100%">
  <tr>
    <td><table width="100%" border="0">
								  <tr>
									<td width="50%"><table width="100%" border="0">
										  <tr>
											
											<td width="25%" height="25" align="left" valign="middle" class="admin">Registration&nbsp;No</td>
											<td width="2%" align="left" valign="middle" class="admin">:</td>
											<td width="73%" align="left" valign="middle"><?php echo $studentid;?></td>
										  </tr>
										  <tr>
											<td height="25" align="left" valign="middle" class="admin">Roll&nbsp;No / Section</td>
											<td align="left" valign="middle"  class="admin">:</td>
											<td align="left" valign="middle"><?php echo $section_det['roll_no'];?><?php if($section_det['section_name']!=""){echo " / ".$section_det['section_name'];}?></td>
										</tr>
										<tr>
											<td height="25" align="left" valign="middle" class="admin">Class</td>
											<td align="left" valign="middle"  class="admin">:</td>
											<td align="left" valign="middle"><?php echo classname($prev_class);?></td>
										</tr>
										<tr>
										  <td height="25" align="left" valign="middle" class="admin">Status</td>
										  <td align="left" valign="middle"  class="admin">:</td>
										  <td align="left" valign="middle">
<?php  if($stud_details['status']=='inactive'){ echo 'Transferred';}else{echo '---';} ?></td>
									  </tr>
								    </table></td>
									<td><table width="100%" border="0">
										  <tr>
												
												<td width="25%" height="25" align="left" valign="middle" class="admin">Date</td>
												<td width="2%" align="left" valign="middle" class="admin">:</td>
												<td width="73%" align="left" valign="middle"><?php echo date("d/m/Y");?></td>
										  </tr>
										 
										<tr>
											<td height="25" align="left" valign="middle" class="admin">Student&nbsp;Name</td>
											<td align="left" valign="middle" class="admin">:</td>
											<td align="left" valign="middle"><?php   echo ucwords($stud_details['pre_name']); ?></td>
										</tr>
										<tr>
											<td height="25" align="left" valign="middle" class="admin">Father&nbsp;Name</td>
											<td align="left" valign="middle" class="admin">:</td>
											<td align="left" valign="middle"><?php   echo ucwords($stud_details['pre_fathername']); ?></td>
										</tr>
										</table></td>	
									
								  </tr>
								</table></td>
  </tr>
  <tr>
    <td><table width="100%" cellpadding="0" cellspacing="0" border="1" class="tbl_grid" >
  <tr class="fee_card" height="25">
    <td >&nbsp;Month/<br />Particulars</td>
     <?php 
	 
	if(count($getfeelist)>=1){
	foreach($getfeelist as $each){?>
    <td width="5%">&nbsp;<?php echo ucfirst(strtolower($each['fee_particular']));?></td>
    <?php }}?>
    <td >&nbsp;Fee Fine</td>
    <td >&nbsp;Misc.Fine</td>
    <td >&nbsp;Tpt fee</td>
    <td >&nbsp;Sale</td>
    <td >&nbsp;Lib.Fine</td>
    <td >&nbsp;Hostel Fee</td>
    <td >&nbsp;Exam Fee</td>
    <td >&nbsp;Old Balance</td>
    <td align="center">Last&nbsp;month<br />Balance</td>
    <td align="center">Total</td>
    <td align="center">Paid</td>
    <td align="center">Balance</td>
    <td align="center">Date & Sig.</td>
   
    
  </tr>
  <?php 
  
   $tfee=(($each['fee_amount'])-($stud_details['fee_concession']))/12;
   $tutionfee=number_format($tfee,2,'.','');
  $ins_fine_tot = 0;
  $mis_fine_tot = 0;
  $tr_charges_tot = 0;
  $st_sale_tot = 0;
  $lib_fine_tot = 0;
  $hostel_charges_tot = 0;
  $examfee_tot = 0;
  $olb_bal_tot = 0;
  $this_month_total_tot =0;
  $paid_tot =0;
  $waid_tot =0;
  for($i=0;$i<count($month_arr);$i++){
  $sr = $i+1;
  
  ?>
  <tr class="fee_card" height="25">
    <td><?php echo $month_arr[$sr];?>,<?php if($sr<10){$year_card = $yr_arr[0];}else{$year_card = $yr_arr[0]+1;} echo $year_card; ?></td>
    <?php 
	 
	if(count($getfeelist)>=1){
	 $month_total = 0;
	 
	foreach($getfeelist as $each){?>
    <td align="right">
	<?php /*?><?php if($each['fee_particular']=='TUITION'){$amount = $fullfeemaster_arr[$year_card][$month_arr[$sr]][$each['fee_particular']]-$stud_details['fee_concession']; echo $amount;}else{$amount = $fullfeemaster_arr[$year_card][$month_arr[$sr]][$each['fee_particular']]; echo $amount;}?><?php */?>
    <?php if($each['fee_particular']=='TUITION'){$amount = $tutionfee; echo $amount;}else{$amount = $fullfeemaster_arr[$year_card][$month_arr[$sr]][$each['fee_particular']]; echo $amount;}?>
    </td>
     <?php $month_total += $amount;}}?>
    <td align="right"><?php echo $ins_fine_arr[$year_card][$month_arr[$sr]];?></td>
    <td align="right"><?php echo $misc_arr[$year_card][$month_arr[$sr]];?></td>
    <td align="right"><?php echo $trans_arr[$year_card][$month_arr[$sr]];?></td>
    <td align="right"><?php echo $station_arr[$year_card][$month_arr[$sr]];?></td>
    <td align="right"><?php echo $libfine_arr[$year_card][$month_arr[$sr]];?></td>
    <td align="right"><?php echo $hostel_arr[$year_card][$month_arr[$sr]];?></td>
    <td align="right"><?php echo $examfee_arr[$year_card][$month_arr[$sr]];?></td>
    <td align="right"><?php echo $oldbal_arr[$year_card][$month_arr[$sr]];?></td>
    <td align="right"><?php if($balance_amt>0){echo $balance_amt;}?></td>
    
    <td align="right"><?php 
	$this_month_total = $month_total+$ins_fine_arr[$year_card][$month_arr[$sr]]+$misc_arr[$year_card][$month_arr[$sr]]+$trans_arr[$year_card][$month_arr[$sr]]+$station_arr[$year_card][$month_arr[$sr]]+$libfine_arr[$year_card][$month_arr[$sr]]+$hostel_arr[$year_card][$month_arr[$sr]]+$examfee_arr[$year_card][$month_arr[$sr]]+$oldbal_arr[$year_card][$month_arr[$sr]]+$balance_amt;
	echo $this_month_total;?></td>
     <td align="right">
     
      <?php if($newfee_arr_paid[$year_card][$month_arr[$sr]]>0 || $paid_arr[$year_card][$month_arr[$sr]]>0 
	 || $ins_fine_paid_arr[$year_card][$month_arr[$sr]]>0
	||	$misc_paid_arr[$year_card][$month_arr[$sr]]>0
	||	$trans_paid_arr[$year_card][$month_arr[$sr]]>0
	||	$libfine_paid_arr[$year_card][$month_arr[$sr]]>0
	||	$hostel_paid_arr[$year_card][$month_arr[$sr]]>0
	||	$oldbal_paid_arr[$year_card][$month_arr[$sr]]>0
	  )
	 
	 {  /*$paidamt=$newfee_arr_paid[$year_card][$month_arr[$sr]]+$paid_arr[$year_card][$month_arr[$sr]]
	 +$ins_fine_paid_arr[$year_card][$month_arr[$sr]]
	+	$misc_paid_arr[$year_card][$month_arr[$sr]]
	+	$trans_paid_arr[$year_card][$month_arr[$sr]]
	+	$libfine_paid_arr[$year_card][$month_arr[$sr]]
	+	$hostel_paid_arr[$year_card][$month_arr[$sr]]
	+	$oldbal_paid_arr[$year_card][$month_arr[$sr]]
	 ;
	 echo number_format($paidamt,2,'.','');*/
	 } 
	 
	 $paidamt1=$newfee_arr_paid[$year_card][$month_arr[$sr]]
	 +$paid_arr[$year_card][$month_arr[$sr]] 
	+	$misc_paid_arr[$year_card][$month_arr[$sr]]
	+	$trans_paid_arr[$year_card][$month_arr[$sr]]
	+	$libfine_paid_arr[$year_card][$month_arr[$sr]]
	+	$hostel_paid_arr[$year_card][$month_arr[$sr]]
	+	$oldbal_paid_arr[$year_card][$month_arr[$sr]]
	+ $station_paid_arr[$year_card][$month_arr[$sr]]
	;
	
	 echo $padi12=number_format($paidamt1,2,'.','');
	 
	 ?>

	<?php /*?> <?php if($newfee_arr_paid[$year_card][$month_arr[$sr]]>0){ echo $newfee_arr_paid[$year_card][$month_arr[$sr]];} ?><?php */?>
     </td>
    
    <td align="right">
	<?php /*?><?php 
	$balance_amt = $this_month_total - $newfee_arr_paid[$year_card][$month_arr[$sr]];	echo $balance_amt;?><?php */?>
    <?php 
	
	
	$balance_amt = $this_month_total -( $paidamt1+$paid_wave_arr[$year_card][$month_arr[$sr]]
	+$trans_wave_arr[$year_card][$month_arr[$sr]]
	+$libfine_wave_arr[$year_card][$month_arr[$sr]]
	+$hostel_wave_arr[$year_card][$month_arr[$sr]]
	+$oldbal_wave_arr[$year_card][$month_arr[$sr]]
	+ $misc_wave_arr[$year_card][$month_arr[$sr]]
	)
	;
	
	?>
    </td>
    <td align="right">&nbsp;</td>
    
  </tr>
  <?php /*?><?php 
  $ins_fine_tot += $ins_fine_arr[$year_card][$month_arr[$sr]];
  $mis_fine_tot += $misc_arr[$year_card][$month_arr[$sr]];
  $tr_charges_tot += $trans_arr[$year_card][$month_arr[$sr]];
  $st_sale_tot += $station_arr[$year_card][$month_arr[$sr]];
  $lib_fine_tot += $libfine_arr[$year_card][$month_arr[$sr]];
  $hostel_charges_tot += $hostel_arr[$year_card][$month_arr[$sr]];
  $examfee_tot += $examfee_arr[$year_card][$month_arr[$sr]];
  $olb_bal_tot += $oldbal_arr[$year_card][$month_arr[$sr]];
  
  $paid_tot += $newfee_arr_paid[$year_card][$month_arr[$sr]];
  
 
  }?><?php */?>
  <?php 
  $ins_fine_tot += $ins_fine_arr[$year_card][$month_arr[$sr]];
  $mis_fine_tot += $misc_arr[$year_card][$month_arr[$sr]];
  $tr_charges_tot += $trans_arr[$year_card][$month_arr[$sr]];
  $st_sale_tot += $station_arr[$year_card][$month_arr[$sr]];
  $lib_fine_tot += $libfine_arr[$year_card][$month_arr[$sr]];
  $hostel_charges_tot += $hostel_arr[$year_card][$month_arr[$sr]];
  $examfee_tot += $examfee_arr[$year_card][$month_arr[$sr]];
  $olb_bal_tot += $oldbal_arr[$year_card][$month_arr[$sr]];
  
 /* $paid_tot += $newfee_arr_paid[$year_card][$month_arr[$sr]];*/
  $paid_tot += $newfee_arr_paid[$year_card][$month_arr[$sr]]+$paid_arr[$year_card][$month_arr[$sr]]
	 +$ins_fine_paid_arr[$year_card][$month_arr[$sr]]
	+	$misc_paid_arr[$year_card][$month_arr[$sr]]
	+	$trans_paid_arr[$year_card][$month_arr[$sr]]
	+	$libfine_paid_arr[$year_card][$month_arr[$sr]]
	+	$hostel_paid_arr[$year_card][$month_arr[$sr]]
	+	$oldbal_paid_arr[$year_card][$month_arr[$sr]];
  
 
  }?>
 
 	<tr height="25">
 	<td></td>
    <?php 
	 
	if(count($getfeelist)>=1){
	foreach($getfeelist as $each){?>
    <td align="right"><?php if($each['fee_particular']=='TUITION'){$amount_tt = $each['fee_amount']-(12*$stud_details['fee_concession']);
	echo $amount_tt ;
	}else{echo $each['fee_amount'];}?></td>
     <?php }}?>
    <td align="right"><?php echo $ins_fine_tot;?></td>
    <td align="right"><?php echo $mis_fine_tot;?></td>
    <td align="right"><?php echo $tr_charges_tot;?></td>
    <td align="right"><?php echo $st_sale_tot;?></td>
    <td align="right"><?php echo $lib_fine_tot;?></td>
    <td align="right"><?php echo $hostel_charges_tot;?></td>
    <td align="right"><?php echo $examfee_tot;?></td>
    <td align="right"><?php echo $olb_bal_tot;?></td>
    <td align="right"></td>
    <td align="right"></td>
    <td align="right"><?php echo $paid_tot;?></td>
    
    <td align="right"></td>
    <td align="right"></td>
 </tr>

  
</table></td>
  </tr>
</table>

			
		</td>
		<td width="1" class="bgcolor_02"></td>
	</tr>
	
</table>

<?php }?>
<?php if($action=='classwise_fee_card'){?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
  </tr>
	<tr><td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Class wise Students Fee status</span></td></tr>
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="left" valign="top">
        <table width="100%">
  <tr>
    <td><form method="post" action="" name="fetchstudent">
			<div><div >&nbsp;</div>
				<span align="left"  >&nbsp;&nbsp;Class :</span>
				<span  class="narmal"><?php echo $_SESSION['eschools']['student_prefix'];?>&nbsp;<select name="pre_class">
										<option value="">-- Select Class --</option>
                    	<?php 
							$classlist = getallClasses();
							foreach($classlist as $indclass) {
						?>
										<option <?php if($indclass['es_classesid']==$pre_class) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_classesid']; ?>"><?php echo $indclass['es_classname']; ?></option>
                        <?php } ?>
								  </select>	&nbsp;<select name="pre_year">
						<?php  foreach($school_details_res as $each_record) { ?>
						<option value="<?php echo $each_record['es_finance_masterid']; ?>" <?php if ($each_record['es_finance_masterid']==$pre_year) { echo "selected"; }?>><?php echo displaydate($each_record['fi_startdate'])." To ".displaydate($each_record['fi_enddate']); ?>						                        </option>
						<?php } ?>
						</select>&nbsp;
				
				<input type="submit" name="submit_fee_status" value="submit" class="bgcolor_02" style="padding-left:10px;padding-right:10px;cursor:pointer;"/></div>
			</form></td>
  </tr>
  <?php if(isset($submit_fee_status) ){?>
  <tr>
  <td>
                	<ul><b><u>NOTE:</u></b>
				<li>Students who are displayed in Red are Transferred Students.</li>
				
			</ul>
  </td>
  </tr>
  
  
  <tr>
    <td>
    <table width="100%" cellpadding="0" cellspacing="0" border="1" class="tbl_grid" >
  <tr class="fee_card" height="25">
 
    <td align="center">&nbsp;Name</td>
    <?php 
	 
	foreach($fee_det as $eachfee){?>
    <td align="center">&nbsp;<?php echo ucfirst(strtolower($eachfee['fee_particular']));?></td>
    <?php }?>
    
    <td align="center">&nbsp;Misc. Fine</td>
    <td align="center">&nbsp;Tpt fee</td>
    <td align="center">&nbsp;Sale</td>
    <td align="center">&nbsp;Lib. Fine</td>
    <td align="center">&nbsp;Hostel Fee</td>
    <td align="center">&nbsp;Exam Fee</td>
    <td align="center">&nbsp;Fee Fine</td>
    <td align="center">&nbsp;Old Balance</td>
    <td align="center">&nbsp;Total Fee</td>
    <td align="center">&nbsp;Fee Paid</td>
    <td align="center">&nbsp;Balance</td>
  </tr>
  <?php if(count($all_students_class)>=1){
   $ins_fine_tot = 0;
  $mis_fine_tot = 0;
  $tr_charges_tot = 0;
  $st_sale_tot = 0;
  $lib_fine_tot = 0;
  $hostel_charges_tot = 0;
  $examfee_tot = 0;
  $olb_bal_tot = 0;
  $this_month_total_tot =0;
  $paid_tot =0;
  $waid_tot =0;
  foreach($all_students_class as $each_student){
  ?>
  <tr class="fee_card" height="60">
  
  <?php  
     $query_trasfor="SELECT * FROM es_preadmission WHERE  es_preadmissionid ='".$each_student['es_preadmissionid']."' AND status ='inactive'";
	$trans=sqlnumber($query_trasfor);
	if($trans==0){
?>
    <td align="left">&nbsp;Name:<?php echo $each_student['pre_name'];?><br />
   &nbsp;Reg No.:<strong><?php echo $each_student['es_preadmissionid'];?></strong><br />
   &nbsp;Roll No.:<?php echo $each_student['roll_no'];?><br />
    &nbsp;Section:<?php echo $each_student['section_name'];?>
    </td>
    <?php }else{?>
     <td align="center" bgcolor="#FF0000" >&nbsp;Name:<?php echo $each_student['pre_name'];?><br />
   &nbsp;Reg No.:<strong><?php echo $each_student['es_preadmissionid'];?></strong><br />
   &nbsp;Roll No.:<?php echo $each_student['roll_no'];?><br />
    &nbsp;Section:<?php echo $each_student['section_name'];?></td>
    <?php }?>
  
   
    <?php 
	$month_total = 0;
	
	
	
	foreach($fee_det as $eachfee){
	
	?>
    
    
    <td align="center">&nbsp;<?php 
	if($eachfee['fee_particular']=='TUITION'){$amount_tt = $eachfee['fee_amount']-($each_student['fee_concession']);
	echo number_format($amount_tt,2,'.','') ;
	}else{ $amount_tt = $eachfee['fee_amount']; echo number_format($amount_tt,2,'.','') ;}?></td>
    <?php
 $month_total += $amount_tt;
	 }
	
	
	 ?>
    <td align="center">&nbsp;<?php echo $misc_topay[$each_student['es_preadmissionid']];?></td>
    <td align="center">&nbsp;<?php echo $tr_topay[$each_student['es_preadmissionid']];?></td>
    <td align="center">&nbsp;<?php echo $stationary_topay[$each_student['es_preadmissionid']];?></td>
    <td align="center">&nbsp;<?php echo $lib_topay[$each_student['es_preadmissionid']];?></td>
    <td align="center">&nbsp;<?php echo $hostel_topay[$each_student['es_preadmissionid']];?></td>
    <td align="center">&nbsp;<?php echo $examfee_topay[$each_student['es_preadmissionid']];?></td>
    <td align="center">&nbsp;<?php echo $installmentfine_topay[$each_student['es_preadmissionid']];?></td>
    <td align="center">&nbsp;<?php echo $balance_topay[$each_student['es_preadmissionid']];?></td>
 
    <td align="center">&nbsp;<?php $all_fees_topay_amt =  $month_total+$misc_topay[$each_student['es_preadmissionid']]+$tr_topay[$each_student['es_preadmissionid']]+$stationary_topay[$each_student['es_preadmissionid']]+$lib_topay[$each_student['es_preadmissionid']]+$hostel_topay[$each_student['es_preadmissionid']]+$examfee_topay[$each_student['es_preadmissionid']]+$installmentfine_topay[$each_student['es_preadmissionid']]+$balance_topay[$each_student['es_preadmissionid']];
	if($all_fees_topay_amt>0){ echo number_format($all_fees_topay_amt,2,'.','');}?></td>
   
   <?php 
   
    $misc_paid[$each_student['es_preadmissionid']];
 
	 $student_paid[$each_student['es_preadmissionid']];
	 $installmentfine_paid[$each_student['es_preadmissionid']];
	 $tr_paid[$each_student['es_preadmissionid']];
		 $stationary_paid[$each_student['es_preadmissionid']] ;
	 $hostel_paid[$each_student['es_preadmissionid']];
	
	
	/*echo $misc_waived[$each_student['es_preadmissionid']]
	$tr_waived[$each_student['es_preadmissionid']]
$stationary_waived[$each_student['es_preadmissionid']]
$lib_waived[$each_student['es_preadmissionid']]
$hostel_waived[$each_student['es_preadmissionid']]
$examfee_waived[$each_student['es_preadmissionid']]
$installmentfine_waived[$each_student['es_preadmissionid']]
$balance_waived[$each_student['es_preadmissionid']]*/
/*$tr_waived
$stationary_waived
$lib_waived
$hostel_waived
$examfee_waived
$installmentfine_waived
$balance_waived
*/
	/*$installmentfine_paid[$each_student['es_preadmissionid']] +
	$misc_paid[$each_student['es_preadmissionid']] +
	$tr_paid[$each_student['es_preadmissionid']] +
	$stationary_paid[$each_student['es_preadmissionid']] +
	$lib_paid[$each_student['es_preadmissionid']] +
	$hostel_paid[$each_student['es_preadmissionid']] +
	$examfee_paid[$each_student['es_preadmissionid']] +
	$balance_paid[$each_student['es_preadmissionid']] );*/
       $misc_paid[$each['es_preadmissionid']];?>
    <td align="right">&nbsp;<?php 
	if(//$installmentfine_paid[$each_student['es_preadmissionid']]>0 ||
	$misc_paid[$each_student['es_preadmissionid']]>0 ||
	$tr_paid[$each_student['es_preadmissionid']]>0 ||
	$stationary_paid[$each_student['es_preadmissionid']]>0 ||
	$lib_paid[$each_student['es_preadmissionid']]>0 ||
	$hostel_paid[$each_student['es_preadmissionid']]>0 ||
	$examfee_paid[$each_student['es_preadmissionid']]>0 ||
	$balance_paid[$each_student['es_preadmissionid']]||
	$student_paid[$each_student['es_preadmissionid']]>0)
/*	
	
	if($student_paid[$each_student['es_preadmissionid']]>0)*/
	
	
	{ 
	
	//$student_paid[$each_student['es_preadmissionid']]
	$paid= $student_paid[$each_student['es_preadmissionid']]//+$installmentfine_paid[$each_student['es_preadmissionid']]+
	+ $misc_paid[$each_student['es_preadmissionid']] +
	$tr_paid[$each_student['es_preadmissionid']] +
	$stationary_paid[$each_student['es_preadmissionid']] +
	$lib_paid[$each_student['es_preadmissionid']] +
	$hostel_paid[$each_student['es_preadmissionid']] +
	$examfee_paid[$each_student['es_preadmissionid']] +
	$balance_paid[$each_student['es_preadmissionid']];
	echo number_format($paid,2,'.','');
	 }
	
		
	/* 
	 if($student_paid[$each_student['es_preadmissionid']]>0){echo "Fee&nbsp;".$student_paid[$each_student['es_preadmissionid']]."<br>";}
	 if($misc_paid[$each_student['es_preadmissionid']]>0){echo "Misc&nbsp;".$misc_paid[$each_student['es_preadmissionid']]."<br>";}
	 if($tr_paid[$each_student['es_preadmissionid']]>0){echo "Tpt&nbsp;".$tr_paid[$each_student['es_preadmissionid']]."<br>";}
	 if($stationary_paid[$each_student['es_preadmissionid']]>0){echo "Sale&nbsp;".$stationary_paid[$each_student['es_preadmissionid']]."<br>";}
	 if($lib_paid[$each_student['es_preadmissionid']]>0){echo "Lib&nbsp;".$lib_paid[$each_student['es_preadmissionid']]."<br>";}
	 if($hostel_paid[$each_student['es_preadmissionid']]>0){echo "Host&nbsp;".$hostel_paid[$each_student['es_preadmissionid']]."<br>";}
	 if($installmentfine_paid[$each_student['es_preadmissionid']]>0){echo "Fine&nbsp;".$installmentfine_paid[$each_student['es_preadmissionid']]."<br>";}
	 if($balance_paid[$each_student['es_preadmissionid']]>0){echo "old&nbsp;".$$balance_paid[$each_student['es_preadmissionid']]."<br>";}
	 
	$all_fees_paid_amt = $student_paid[$each_student['es_preadmissionid']]+$misc_paid[$each_student['es_preadmissionid']]+$tr_paid[$each_student['es_preadmissionid']]+$stationary_paid[$each_student['es_preadmissionid']]+$lib_paid[$each_student['es_preadmissionid']]+$hostel_paid[$each_student['es_preadmissionid']]+$installmentfine_paid[$each_student['es_preadmissionid']]+$balance_paid[$each_student['es_preadmissionid']];
	if($all_fees_paid_amt>0){ echo "Total&nbsp;".$all_fees_paid_amt;}*/?></td>
    
    
    <td align="center">&nbsp;<?php
	 $installmentfine_topay[$each_student['es_preadmissionid']];
	 $balance_amt =	$all_fees_topay_amt -
	($student_paid[$each_student['es_preadmissionid']]+
	//$installmentfine_paid[$each_student['es_preadmissionid']] +
	$misc_paid[$each_student['es_preadmissionid']] +
	$tr_paid[$each_student['es_preadmissionid']] +
	$stationary_paid[$each_student['es_preadmissionid']] +
	$lib_paid[$each_student['es_preadmissionid']] +
	$hostel_paid[$each_student['es_preadmissionid']] +
	$examfee_paid[$each_student['es_preadmissionid']] +
	$balance_paid[$each_student['es_preadmissionid']]+
	$misc_waived[$each_student['es_preadmissionid']]+
	$tr_waived[$each_student['es_preadmissionid']]+
	$stationary_waived[$each_student['es_preadmissionid']]+
	$lib_waived[$each_student['es_preadmissionid']]+
	$hostel_waived[$each_student['es_preadmissionid']]+
	$examfee_waived[$each_student['es_preadmissionid']]+
	$installmentfine_waived[$each_student['es_preadmissionid']]+
	$balance_waived[$each_student['es_preadmissionid']]
	 );
	echo number_format($balance_amt,2,'.','');
	
	$waived=($misc_waived[$each_student['es_preadmissionid']]+
	$tr_waived[$each_student['es_preadmissionid']]+
	$stationary_waived[$each_student['es_preadmissionid']]+
	$lib_waived[$each_student['es_preadmissionid']]+
	$hostel_waived[$each_student['es_preadmissionid']]+
	$examfee_waived[$each_student['es_preadmissionid']]+
	$installmentfine_waived[$each_student['es_preadmissionid']]+
	$balance_waived[$each_student['es_preadmissionid']]	);
	
	echo '<br>';
	echo '[';
	?> <span style="color:#FF0000"><?php echo ''.number_format($waived,2,'.','').'</span>';
	echo ']';
	
	?>
    
    </td>
  </tr>
  <?php 
  $ins_fine_tot += $installmentfine_topay[$each_student['es_preadmissionid']];
  $mis_fine_tot +=  $misc_topay[$each_student['es_preadmissionid']];
  $tr_charges_tot += $tr_topay[$each_student['es_preadmissionid']];
  $st_sale_tot += $stationary_topay[$each_student['es_preadmissionid']];
  $lib_fine_tot += $lib_topay[$each_student['es_preadmissionid']];
  $hostel_charges_tot += $hostel_topay[$each_student['es_preadmissionid']];
  $olb_bal_tot += $balance_topay[$each_student['es_preadmissionid']];
  $this_month_total_tot += $this_month_total;
  $paid_tot += $all_fees_paid_amt;
  $waid_tot += $all_fees_waived_amt;
  
  }?>
  <tr><td class="narmal" colspan="<?php $no_col = count($fee_det)+16; echo $no_col;?>" align="right" style="padding-left:20px;"><input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=40&action=print_classwise_fee_card<?php echo $PageUrl; ?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /></td></tr>
  <?php }else{?>
  	<tr><td class="narmal" colspan="<?php $no_col = count($fee_det)+16; echo $no_col;?>" align="center"> No Records Found</td></tr>
    <?php }?>
  
</table>

    


    
    </td>
  </tr>
  <?php }?>
</table>

			
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

<?php }?>
<?php if($action=='print_classwise_fee_card'){?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
  </tr>
	<tr><td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Class wise Students Fee status</span></td></tr>
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="left" valign="top">
        <table width="100%">
  <tr><td align="left" class="admin">CLASS : <?php echo classname($pre_class);?></td></tr>
  <?php if(isset($submit_fee_status) ){?>
  <tr>
    <td>
    <table width="100%" cellpadding="0" cellspacing="0" border="1" class="tbl_grid" >
  <tr class="fee_card" height="25">
   
    <td align="center">&nbsp;Name</td>
    <?php 
	 
	foreach($fee_det as $eachfee){?>
    <td align="center">&nbsp;<?php echo ucfirst(strtolower($eachfee['fee_particular']));?></td>
    <?php }?>
    
    <td align="center">&nbsp;Misc. Fine</td>
    <td align="center">&nbsp;Tpt fee</td>
    <td align="center">&nbsp;Sale</td>
    <td align="center">&nbsp;Lib. Fine</td>
    <td align="center">&nbsp;Hostel Fee</td>
    <td align="center">&nbsp;Exam Fee</td>
    <td align="center">&nbsp;Fee Fine</td>
    <td align="center">&nbsp;Old Balance</td>
    <td align="center">&nbsp;Total Fee</td>
    
    <td align="center">&nbsp;Fee Paid</td>
    <td align="center">&nbsp;Balance</td>
    
  </tr>
  <?php if(count($all_students_class)>=1){
   $ins_fine_tot = 0;
  $mis_fine_tot = 0;
  $tr_charges_tot = 0;
  $st_sale_tot = 0;
  $lib_fine_tot = 0;
  $hostel_charges_tot = 0;
  $examfee_tot = 0;
  $olb_bal_tot = 0;
  $this_month_total_tot =0;
  $paid_tot =0;
  $waid_tot =0;
  foreach($all_students_class as $each_student){
  ?>
  <tr class="fee_card" height="60">
   
    
     <?php  
     $query_trasfor="SELECT * FROM es_preadmission WHERE  es_preadmissionid ='".$each_student['es_preadmissionid']."' AND status ='inactive'";
	$trans=sqlnumber($query_trasfor);
	if($trans==0){
?>

    <td align="left">&nbsp;Name:<?php echo $each_student['pre_name'];?><br />
   &nbsp;Reg No.:<strong><?php echo $each_student['es_preadmissionid'];?></strong><br />
   &nbsp;Roll No.:<?php echo $each_student['roll_no'];?><br />
    &nbsp;Section:<?php echo $each_student['section_name'];?></td>
   <?php }else{?>
    <td align="center" bgcolor="#FF0000">&nbsp;Name:<?php echo $each_student['pre_name'];?><br />
   &nbsp;Reg No.:<strong><?php echo $each_student['es_preadmissionid'];?></strong><br />
   &nbsp;Roll No.:<?php echo $each_student['roll_no'];?><br />
    &nbsp;Section:<?php echo $each_student['section_name'];?></td>
    <?php }?>
   
   
    <?php 
	$month_total = 0;
	foreach($fee_det as $eachfee){?>
    <td align="center">&nbsp;<?php 
	if($eachfee['fee_particular']=='TUITION'){$amount_tt = $eachfee['fee_amount']-($each_student['fee_concession']);
	 echo number_format($amount_tt,2,'.','');
	}else{ $amount_tt = $eachfee['fee_amount'];  echo number_format($amount_tt,2,'.','');}?></td>
    <?php
	 $month_total += $amount_tt;
	 }?>
    <td align="center">&nbsp;<?php echo $misc_topay[$each_student['es_preadmissionid']];?></td>
    <td align="center">&nbsp;<?php echo $tr_topay[$each_student['es_preadmissionid']];?></td>
    <td align="center">&nbsp;<?php echo $stationary_topay[$each_student['es_preadmissionid']];?></td>
    <td align="center">&nbsp;<?php echo $lib_topay[$each_student['es_preadmissionid']];?></td>
    <td align="center">&nbsp;<?php echo $hostel_topay[$each_student['es_preadmissionid']];?></td>
    <td align="center">&nbsp;<?php echo $examfee_topay[$each_student['es_preadmissionid']];?></td>
    <td align="center">&nbsp;<?php echo $installmentfine_topay[$each_student['es_preadmissionid']];?></td>
    <td align="center">&nbsp;<?php echo $balance_topay[$each_student['es_preadmissionid']];?></td>
       <td align="center">&nbsp;<?php $all_fees_topay_amt =  $month_total+$misc_topay[$each_student['es_preadmissionid']]+$tr_topay[$each_student['es_preadmissionid']]+$stationary_topay[$each_student['es_preadmissionid']]+$lib_topay[$each_student['es_preadmissionid']]+$hostel_topay[$each_student['es_preadmissionid']]+$examfee_topay[$each_student['es_preadmissionid']]+$installmentfine_topay[$each_student['es_preadmissionid']]+$balance_topay[$each_student['es_preadmissionid']];
	if($all_fees_topay_amt>0){ echo number_format($all_fees_topay_amt,2,'.','');}?></td>
      <td align="right">&nbsp;<?php 
	if(//$installmentfine_paid[$each_student['es_preadmissionid']]>0 ||
	$misc_paid[$each_student['es_preadmissionid']]>0 ||
	$tr_paid[$each_student['es_preadmissionid']]>0 ||
	$stationary_paid[$each_student['es_preadmissionid']]>0 ||
	$lib_paid[$each_student['es_preadmissionid']]>0 ||
	$hostel_paid[$each_student['es_preadmissionid']]>0 ||
	$examfee_paid[$each_student['es_preadmissionid']]>0 ||
	$balance_paid[$each_student['es_preadmissionid']]||
	$student_paid[$each_student['es_preadmissionid']]>0)
/*	
	
	if($student_paid[$each_student['es_preadmissionid']]>0)*/
	
	
	{ 
	
	//$student_paid[$each_student['es_preadmissionid']]
	$paid= $student_paid[$each_student['es_preadmissionid']]+//$installmentfine_paid[$each_student['es_preadmissionid']]+
	 $misc_paid[$each_student['es_preadmissionid']] +
	$tr_paid[$each_student['es_preadmissionid']] +
	$stationary_paid[$each_student['es_preadmissionid']] +
	$lib_paid[$each_student['es_preadmissionid']] +
	$hostel_paid[$each_student['es_preadmissionid']] +
	$examfee_paid[$each_student['es_preadmissionid']] +
	$balance_paid[$each_student['es_preadmissionid']];
	echo number_format($paid,2,'.','');
	 }
?></td>
   
    <td align="center">&nbsp;<?php
	 $installmentfine_topay[$each_student['es_preadmissionid']];
	 $balance_amt =	$all_fees_topay_amt -
	($student_paid[$each_student['es_preadmissionid']]+
	//$installmentfine_paid[$each_student['es_preadmissionid']] +
	+$misc_paid[$each_student['es_preadmissionid']] +
	$tr_paid[$each_student['es_preadmissionid']] +
	$stationary_paid[$each_student['es_preadmissionid']] +
	$lib_paid[$each_student['es_preadmissionid']] +
	$hostel_paid[$each_student['es_preadmissionid']] +
	$examfee_paid[$each_student['es_preadmissionid']] +
	$balance_paid[$each_student['es_preadmissionid']]+
	$misc_waived[$each_student['es_preadmissionid']]+
	$tr_waived[$each_student['es_preadmissionid']]+
	$stationary_waived[$each_student['es_preadmissionid']]+
	$lib_waived[$each_student['es_preadmissionid']]+
	$hostel_waived[$each_student['es_preadmissionid']]+
	$examfee_waived[$each_student['es_preadmissionid']]+
	$installmentfine_waived[$each_student['es_preadmissionid']]+
	$balance_waived[$each_student['es_preadmissionid']]
	 );
	echo number_format($balance_amt,2,'.','');
	
		$waived=($misc_waived[$each_student['es_preadmissionid']]+
	$tr_waived[$each_student['es_preadmissionid']]+
	$stationary_waived[$each_student['es_preadmissionid']]+
	$lib_waived[$each_student['es_preadmissionid']]+
	$hostel_waived[$each_student['es_preadmissionid']]+
	$examfee_waived[$each_student['es_preadmissionid']]+
	$installmentfine_waived[$each_student['es_preadmissionid']]+
	$balance_waived[$each_student['es_preadmissionid']]	);
	
	echo '<br>';
	echo '[';
	?> <span style="color:#FF0000"><?php echo ''.number_format($waived,2,'.','').'</span>';
	echo ']';
	
	?></td>
    
  </tr>
  <?php 
  $ins_fine_tot += $installmentfine_topay[$each_student['es_preadmissionid']];
  $mis_fine_tot +=  $misc_topay[$each_student['es_preadmissionid']];
  $tr_charges_tot += $tr_topay[$each_student['es_preadmissionid']];
  $st_sale_tot += $stationary_topay[$each_student['es_preadmissionid']];
  $lib_fine_tot += $lib_topay[$each_student['es_preadmissionid']];
  $hostel_charges_tot += $hostel_topay[$each_student['es_preadmissionid']];
  $olb_bal_tot += $balance_topay[$each_student['es_preadmissionid']];
  $this_month_total_tot += $this_month_total;
  $paid_tot += $all_fees_paid_amt;
  $waid_tot += $all_fees_waived_amt;
  
  }?>
  
  <?php }else{?>
  	<tr><td class="narmal" colspan="<?php $no_col = count($fee_det)+14; echo $no_col;?>" align="center"> No Records Found</td></tr>
    <?php }?>
  
</table>

    


    
    </td>
  </tr>
  <?php }?>
</table>

			
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

<?php }?>







<?php if($action=='receiptpayment') { 
//array_print($_GET);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Exam fee Voucher Receipt</strong></td>
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
											<td width="73%" align="left" valign="middle"><?php echo $payamount_details['fid']?></td>
										  </tr>
										  <tr>
											<td height="25" align="left" valign="middle" class="admin">Registration&nbsp;No</td>
											<td align="left" valign="middle">:</td>
											<td align="left" valign="middle"><?php echo $payamount_details['es_preadmissionid'];
											$stud_details = get_studentdetails($payamount_details['es_preadmissionid']);
											?></td>
										</tr>
										<tr>
											<td height="25" align="left" valign="middle" class="admin">Class</td>
											<td align="left" valign="middle">:</td>
											<td align="left" valign="middle"><?php echo classname($stud_details['pre_class']);?></td>
										</tr>
											  <tr>
											<td height="25" align="left" valign="middle" class="admin">Status</td>
											<td align="left" valign="middle">:</td>
											<td align="left" valign="middle"><?php 
											$online_sql="select * from es_preadmission  where es_preadmissionid=".$payamount_details['es_preadmissionid'];
 $online_row=$db->getRow($online_sql);
											 if($online_row['status']!='inactive') { echo "---"; } else { echo "Transfered";}
											?></td>
										</tr>
										  </table></td>
									<td><table width="100%" border="0">
										  <tr>
												
												<td width="25%" height="25" align="left" valign="middle" class="admin">Receipt&nbsp;Date</td>
												<td width="2%" align="left" valign="middle" class="admin">:</td>
												<td width="73%" align="left" valign="middle"><?php if($payamount_details['paid_on']!='0000-00-00'){echo func_date_conversion("Y-m-d","d/m/Y",$payamount_details['paid_on']);}?></td>
										  </tr>
										 
										<tr>
											<td height="25" align="left" valign="middle" class="admin">Person&nbsp;Name</td>
											<td align="left" valign="middle" class="admin">:</td>
											<td align="left" valign="middle"><?php   echo ucwords($stud_details['pre_name']); ?></td>
										</tr>
										<tr>
											<td height="25" align="left" valign="middle" class="admin">Father&nbsp;Name</td>
											<td align="left" valign="middle" class="admin">:</td>
											<td align="left" valign="middle"><?php   echo ucwords($stud_details['pre_fathername']); ?></td>
										</tr>
										<tr>
											<td height="25" align="left" valign="middle" class="admin">Roll No.</td>
											<td align="left" valign="middle" class="admin">:</td>
											<td align="left" valign="middle"> <?php 
	 $DET = get_studentdetails($sid);
		$online_sql="select * from es_sections_student where student_id=". $stud_details['es_preadmissionid'];
	                                    $online_row=$db->getRow($online_sql);
					  echo $online_row['roll_no']; ?> 
					  </td>
										</tr>		
										
										</table></td>	
									
								  </tr>
								</table>

						</td>
					  </tr>
					  <tr>
						<td><table width="100%" border="0">
							  <tr class="admin">
								<td align="left">Bank Name</td>
								<td align="left">Bank Account</td>
								<td align="left">Payment Mode</td>
								<td height="25" align="left">Fee Amount</td>
								<td align="left">Check no.</td>
								<td align="left">Teller No.</td>
								<td align="left">bank Pin</td>
							  </tr>
							  <tr>
								<td align="left"><?php 
								$voucher = "SELECT * FROM es_voucherentry  where es_voucherentryid =".$payamount_details['voucherid'];
 $voucher_res=$db->getRow($voucher);
if( $voucher_res['es_bank_name']!=''){echo $voucher_res['es_bank_name'];} else { echo "--"; } ?></td>
	<td height="25" align="left"><?php if( $voucher_res['es_bankacc']!=''){echo $voucher_res['es_bankacc']; } else { echo "--"; }  ?></td>
	<td align="left"><?php if( $voucher_res['es_paymentmode']!=''){echo $voucher_res['es_paymentmode'];}else { echo "--"; } ?></td>
									<td align="left">RS<?php if( $voucher_res['es_amount']!=''){echo $voucher_res['es_amount']; }else { echo "--"; } ?>.00</td>
								<td align="left"><?php if( $voucher_res['es_checkno']!=''){echo $voucher_res['es_checkno']; }else { echo "--"; }  ?></td>
								<td align="left"><?php if( $voucher_res['es_teller_number']!=''){echo $voucher_res['es_teller_number']; }else { echo "--"; }  ?></td>
									<td align="left"><?php if( $voucher_res['es_bank_pin']!=''){echo $voucher_res['es_bank_pin']; } else { echo "--"; }  ?></td>
							  </tr>
							</table>
                      </td>
					  </tr>
					  <tr>
					
					
					</table>
				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
    </tr>
  </table>
<?php } ?>



<?php if($action=='print_each_receipt3'){?>
<table width="50%" border="0"  cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
  </tr>
	
	<tr>
		<td width="1" ></td>
		<td align="left" valign="top">
        <table width="50%">
  <tr>
    <td><table width="70%" border="1" cellspacing="2" class="tb2_grid" cellpadding="0" align="center">
    
      <tr>
					<td align="left" class="narmal">Himalyan Public Sr. School
Nagrota Bagwan (H.P)</td>
					<td align="left" class="narmal">:</td>
					<td align="left" class="narmal"><?php echo 'HRC'.$rid;  ?></td>
					
		    </tr>
				<?php /*?><tr>
					<td align="left" class="narmal">Date</td>
					<td align="left" class="narmal">:</td>
					<td align="left" class="narmal"><?php echo func_date_conversion("Y-m-d","d/m/Y",$receipt_det['paid_on']);  ?></td>
					<td align="left" class="narmal">&nbsp;</td>
				</tr>	<?php */?>
                <tr>
					<td align="left" class="narmal">Receipt&nbsp;No</td>
				  <td align="left" class="narmal">:</td>
					<td align="left" class="narmal"><?php echo 'HRC'.$rid;  ?></td>
					
				</tr>
				<tr>
					<td align="left" class="narmal" width="48%">Student </td>
				  <td align="left" class="narmal" width="3%">:</td>
				  <td align="left" class="narmal" width="49%"><?php echo $studetails['pre_name']; ?></td>
					
			  </tr>
			<?php /*?>	<tr>
					<td align="left" class="narmal" width="31%">User Name </td>
					<td align="left" class="narmal" width="1%">:</td>
					<td align="left" class="narmal" width="27%"><?php echo $studetails['pre_student_username']; ?></td>	
				</tr><?php */?>
				<tr>
					<td align="left" class="narmal">Reg No</td>
					<td align="left" class="narmal">:</td>
					<td align="left" class="narmal"><?php echo $_SESSION['eschools']['student_prefix'];?><?php echo $studetails['es_preadmissionid']; ?></td>
				</tr>
               <tr>
					<td align="left" class="narmal">Class</td>
					<td align="left" class="narmal">:</td>
					<td align="left" class="narmal"><?php  echo classname($prev_class); ?></td>
			  </tr>
                
                <?php
	if ( count($fee_det)>0){
		$i = 1;
	foreach($fee_det as $each){
	
		$feetotamt 	= 0;
?>

                <?php 	$i++;} }?>	
               
<?php
	if (is_array($receipt_det) && count($receipt_det)>0){
		$i = 1;
		$feetotamt 	= 0;
?>
			                         
			      
                <tr>
					<td align="left" class="narmal">Fee Paid</td>
					<td align="left" class="narmal">:</td>
					<td align="left" class="narmal"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($receipt_det['paid'], 2, '.', '');  ?></td>
				</tr>
                
                 <tr>
					<td align="left" class="narmal">Balance</td>
					<td align="left" class="narmal">:</td>
					<td align="left" class="narmal"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($receipt_det['balance'], 2, '.', ''); ?></td>
				</tr>
                <?php /*?> <tr>
					<td align="left" class="narmal">Roll No</td>
					<td align="left" class="narmal">:</td>
					<td align="left" class="narmal"><?php echo $section_det['roll_no']; ?></td>
				</tr>
                <tr>
					<td align="left" class="narmal">Section</td>
					<td align="left" class="narmal">:</td>
					<td align="left" class="narmal"><?php echo $section_det['section_name']; ?></td>
				</tr>
				<tr>
					<td align="left" class="narmal">E-mail</td>
					<td align="left" class="narmal">:</td>
					<td align="left" class="narmal"><?php echo $studetails['pre_emailid']; ?></td>
				</tr>
				<tr>
					<td align="left" class="narmal">Father/Guardian Name </td>
					<td align="left" class="narmal">:</td>
					<td align="left" class="narmal"><?php echo $studetails['pre_fathername']; ?></td>
				</tr>
				<tr>
					<td align="left" class="narmal">Address</td>
					<td align="left" class="narmal">:</td>
					<td align="left" class="narmal"><?php echo $studetails['pre_address1']; ?></td>
				</tr>
                <tr>
					<td align="left" class="narmal">Academic Session</td>
					<td align="left" class="narmal">:</td>
					<td align="left" class="narmal"><?php echo func_date_conversion("Y-m-d","d/m/Y",$from_acad)." - ".func_date_conversion("Y-m-d","d/m/Y",$to_acad); ?></td>
				</tr><?php */?>
				<?php } ?>
							 
			</table></td>
  </tr>


	<tr><td height="1" colspan="3"></td></tr>
</table>
<?php }?>

<style type="text/css">
.narmal2 {
	font-family: tahoma;
	padding:3px;
	font-size: 15px;
	font-weight: normal;
	text-decoration: none;
	color: #000000;
}
</style>

<?php if($action=='print_each_receipt2'){?>
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"  style="border:#000000 solid 6px;">
	<tr>
         <td height="3" colspan="3"></td>
  </tr>
	<tr>
	<?php /*?><font style="font-size:18px;">
<?php */?>	  <td height="80" colspan="3" align="center" valign="middle" style="border-bottom:#000000 solid 6px; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:18px; font-weight:bold;">Tulas Institute<br />The Engineering & Management College<br />
Dhoolkot, PO-Selaqui, Chakrata Road,<br />
Dehradun-248197<br />
Email :- tula@tulas.co.in<br>
Contact:- 0135-2699300, 2699309</P></td>
	</tr>
	<tr>
		<td width="1"></td>
		<td align="left" valign="top">
        <table width="100%">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td colspan="2" align="center" valign="top" style="padding-right:25px;"></td>
      </tr>
      
      <tr>
        <td colspan="2" align="left" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="3">
          <tr>
            <td width="46%" align="left" valign="middle" class="narmal2">Date</td>
            <td width="2%" align="left" valign="middle" class="narmal2">:</td>
            <td width="52%" align="left" valign="middle" class="narmal2"><?php echo func_date_conversion("Y-m-d","d/m/Y",$receipt_det['paid_on']);  ?></td>
          </tr>
          <tr>
            <td align="left" valign="middle" class="narmal2">Student Name</td>
            <td align="left" valign="middle" class="narmal2">:</td>
            <td align="left" valign="middle" class="narmal2"><?php echo $studetails['pre_name']; ?></td>
          </tr>
          <tr>
            <td align="left" valign="middle" class="narmal2">Registration No</td>
            <td align="left" valign="middle" class="narmal2">:</td>
            <td align="left" valign="middle" class="narmal2"><?php echo $_SESSION['eschools']['student_prefix'];?><?php echo $studetails['es_preadmissionid']; ?></td>
          </tr>
          <tr>
            <td align="left" valign="middle" class="narmal2">Class</td>
            <td align="left" valign="middle" class="narmal2">:</td>
            <td align="left" valign="middle" class="narmal2"><?php  echo classname($prev_class); ?></td>
          </tr>
          <tr>
            <td align="left" valign="middle" class="narmal2">Section</td>
            <td align="left" valign="middle" class="narmal2">:</td>
            <td align="left" valign="middle" class="narmal2"><?php if($section_det['section_name']!=''){ echo $section_det['section_name'];}else{ echo '---';} ?></td>
          </tr>
          <tr>
            <td align="left" valign="middle" class="narmal2">Roll No</td>
            <td align="left" valign="middle" class="narmal2">:</td>
            <td align="left" valign="middle" class="narmal2"><?php echo $section_det['roll_no']; ?></td>
          </tr>
          <tr>
            <td align="left" valign="middle" class="narmal2">Receipt No</td>
            <td align="left" valign="middle" class="narmal2">:</td>
            <td align="left" valign="middle" class="narmal2"><?php echo 'HRC'.$rid;  ?></td>
          </tr>
          
          
          
          
        </table></td>
      </tr>
      <tr>
        <td height="2" colspan="2" align="left" valign="top" style="border-top:#000000 solid 6px;"></td>
      </tr>
      <tr>
        <td colspan="2" align="left" valign="top">
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="3">
          <tr>
            <td width="46%" align="left" valign="middle" class="narmal2">Total Amount</td>
            <td width="2%" align="left" valign="middle" class="narmal2">:</td>
            <td width="52%" align="left" valign="middle" class="narmal2"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($receipt_det['total_amount'], 2, '.', ''); ?></td>
          </tr>
          <tr>
            <td align="left" valign="middle" class="narmal2"  style="padding-bottom:8px;">Paid Amount</td>
            <td align="left" valign="middle" class="narmal2"  style="padding-bottom:8px;">:</td>
            <td align="left" valign="middle" class="narmal2" style="padding-bottom:8px;"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($receipt_det['paid'], 2, '.', '');  ?></td>
          </tr>
          <?php /*?><tr>
            <td align="left" valign="middle" class="narmal2">Balance</td>
            <td align="left" valign="middle" class="narmal2">:</td>
            <td align="left" valign="middle" class="narmal2"><b><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($receipt_det['balance'], 2, '.', ''); ?></b></td>
          </tr><?php */?>
        </table></td>
      </tr>
      
      <tr>
        <td colspan="2" valign="middle"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="3" style="border-top:#000000 solid 6px;">
		<tr><td colspan="3" height="8"></td></tr><tr>
            <td width="46%" height="14" align="left" valign="middle" class="narmal2"><b>Balance</b></td>
            <td width="2%" align="left" valign="middle" class="narmal2"><b>:</b></td>
            <td width="52%" align="left" valign="middle" class="narmal2"><b><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($receipt_det['balance'], 2, '.', ''); ?></b></td>
          </tr></table></td>
       
      </tr>
      <tr>
        <td colspan="2" align="left" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="3" style="border-top:#000000 solid 6px;"><tr><td height="20"></td></tr><tr><td align="right" valign="top" class="narmal2" style="padding-right:25px;">Signature&nbsp;&nbsp;</td></tr></table></td>
       
      </tr>
    </table></td>
  </tr>
</table>

		
	  	
		</td>
		<td width="1"></td>
	</tr>
    
    
	<tr>
		<td width="1"></td>
		<td height="10"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="3" style="border-top:#000000 solid 6px;">
          
          <tr>
            <td align="left" height="50" valign="middle" class="narmal2">Please pay fees before due date (10TH of each month) to avoid late fee fine.</td>
            </tr>
          
          
          
          
        </table></td>
		<td width="1"></td>
	</tr>
	<tr><td height="1" colspan="3"></td></tr>
</table>
<?php }?>