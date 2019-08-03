<?php 
/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}

?>


<?php
// Add other fine 
	if($action=='add_examfee')
	{
?>	
<script type="text/javascript">
	function SelectChkbox()
            {
                
				var oInputs = document.getElementsByTagName('input');
                 
				  if(document.getElementById("checkall").checked == true) {
                  	    var ischked = true;
						
                  }else{
                        var ischked = false;
                  }
                  for ( i = 0; i < oInputs.length; i++ )
                  {
                  // loop through and find <input type="checkbox"/>
                        if (oInputs[i].type == 'checkbox')
                        {
                           
						      var chk_box = oInputs[i].id;
							  
                              document.getElementById(chk_box).checked = ischked;
                        }
                  }
                //  activatePermission();
            }
			

</script><title>adfasdfasdfasdf</title>

	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
         <td height="3" colspan="3"></td>
	 </tr>
	  <tr>
		<td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Add Exam fee </span></td>
	  </tr>
	  
      <tr>
		<td width="1" class="bgcolor_02"></td>
		<td   class="narmal" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font><br />
        </td>
        <td width="1" class="bgcolor_02"></td>
      </tr>
	  <tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="left" valign="top">
		<table width="100%" border="0">
		  <tr>
			<td>
				<form action="" method="post" name="add_otherfine">		
                <table width="100%" border="0">
			 <tr>
                <td>&nbsp;</td>
                <td align="right" valign="middle">Exam Name</td>
                <td>:</td>
                <td align="left" valign="middle"><?php echo $html_obj->draw_inputfield('fine_name','','','');?>&nbsp;<font color="#FF0000" size="2"><b>*</b></font></td>
                <td>&nbsp;</td>
                <td></td>
              </tr>
			  <tr>
                <td>&nbsp;</td>
                <td align="right" valign="middle">Amount</td>
                <td>:</td>
                <td align="left" valign="middle"><?php echo $html_obj->draw_inputfield('fine_amount','','','');?>&nbsp;<font color="#FF0000" size="2"><b>*</b></font></td>
                <td>&nbsp;</td>
                <td></td>
              </tr>	
			  <tr>
                <td>&nbsp;</td>
                <td align="right" valign="middle">Exam Date</td>
                <td>:</td>
                <td align="left" valign="middle"><?php echo $html_obj->draw_inputfield('exam_dt','','','');?>&nbsp;<a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.add_otherfine.exam_dt);return false;" ><img src="<?php echo JS_PATH ?>/WeekPicker/calbtn.gif" alt="Calender" name="popcal" width="34" height="22" border="0" align="absmiddle" id="popcal" /></a><font color="#FF0000"><b>&nbsp;*</b></font></td>
                <td>&nbsp;</td>
                <td></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td align="right" valign="middle">Fee to be charged on</td>
                <td>:</td>
                <td align="left" valign="middle"><?php echo $html_obj->draw_inputfield('created_on','','','');?>&nbsp;<a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.add_otherfine.created_on);return false;" ><img src="<?php echo JS_PATH ?>/WeekPicker/calbtn.gif" alt="Calender" name="popcal" width="34" height="22" border="0" align="absmiddle" id="popcal" /></a><font color="#FF0000"><b>&nbsp;*</b></font><iframe width=199 height=178 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="<?php echo JS_PATH ?>/WeekPicker/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">										</iframe></td>
                <td>&nbsp;</td>
                <td></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td align="right" valign="middle">Class</td>
                <td>:</td>
                <td align="left" valign="middle"><?php echo $html_obj->draw_selectfield('es_classesid',$classes_arr,'','style="width:180px;" onchange="JavaScript:document.add_otherfine.submit();"');?>&nbsp;<font color="#FF0000" size="2"><b>*</b></font></td>
                <td>&nbsp;</td>
                <td></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td align="right" valign="middle" colspan="5"></td>
              </tr>
			  <?php if(isset($es_classesid) && $es_classesid!="" && count($allstudents)>0){
			  /*$es_preadmissionid = array();
			  $vl_arr  = array();
			  array_print( $es_preadmissionid);
			  $vl_arr = array_values($es_preadmissionid);
			  array_print($vl_arr);*/
			  ?>
			   <tr>
                <td>&nbsp;</td>
                <td align="left" valign="middle" colspan="5">&nbsp;&nbsp;<input type="checkbox" name="checkall" id="checkall" onclick="SelectChkbox();" /><b> CHECK / UNCHECK </b></td>
              </tr>
			  
			  <tr>
                <td>&nbsp;</td>
                <td align="right" valign="middle" colspan="5">
						<table width="100%" border="0">
						  <tr>
						  <?php if(count($allstudents)>0){
								  		$i=0;
										$id_arr = array();
										
										if(count($es_preadmissionid)>=1){
										$id_arr = array_values($es_preadmissionid);
										}
										
								  		foreach($allstudents as $eachrecord){
										if($i%2==0){echo "</tr><tr>";}
										
								  ?>
							<td><table width="100%" border="0">
								  <tr>
								  
									<td width="15%" align="left" valign="top"><input type="checkbox" name="es_preadmissionid[<?php echo $i;?>]"  id='es_preadmissionid[<?php echo $i;?>]' value="<?php echo $eachrecord['es_preadmissionid'];?>" <?php if(is_array($id_arr) && in_array($i, $id_arr)== TRUE){echo "checked='checked'";}?> /></td>
									<td width="85%" align="left" valign="top"><?php 
									if($eachrecord['pre_gender']=='male'){$gender="S/O";}
									if($eachrecord['pre_gender']=='female'){$gender="D/O";}
									echo $eachrecord['pre_name'].'<br>  ('. $gender." ".ucfirst($eachrecord['pre_fathername']).')';?><br />
									Reg No:<?php echo $eachrecord['es_preadmissionid'];?><br />
									Roll No:<?php 
		$online_sql="select * from es_sections_student where student_id=".$eachrecord['es_preadmissionid'];
	                                    $online_row=$db->getRow($online_sql);
														
					echo $online_row['roll_no'];?></td>
									
								  </tr>
								</table>
                            </td>
							  <?php $i++;}}?>
							</tr>
						</table>

				
				</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td></td>
                <td></td>
                <td align="left" valign="middle"><?php if(in_array('6_14',$admin_permissions)){?>

	<input type="submit" name="add_otherfee_submit" value="submit" class="bgcolor_02" /><?php }?></td>
				
			    <td>&nbsp;</td>
                <td></td>
              </tr>
			  <?php }elseif(isset($es_classesid) && count($allstudents)<=0){?>
			  <tr>
                <td colspan="6" class="narmal" align="center"> No Records Found</td>
              </tr>
			  <?php }?>
            </table>
                </form>
            </td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
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
// End of other fine 	
?>
<?php
// List other fine 
	if($action=='view_list')
	{
?>	

	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
         <td height="3" colspan="3"></td>
	 </tr>
	  <tr>
		<td height="25" colspan="3" class="bgcolor_02">Exam Fee Collection </td>
	  </tr>
	   <tr height="25">
			    <td class="bgcolor_02" ></td>
                <td  valign="middle" class="narmal" align="right">
				<form action="index.php?pid=105&action=view_list" name="fee_search" method="post">
				<table width="100%" border="0">
				  <tr>
					<td>
					<table width="100%" border="0">
					  <tr>
						<td align="left" valign="middle">Fee Charged From</td>
						<td align="left" valign="middle">:</td>
						<td align="left" valign="middle"><?php echo $html_obj->draw_inputfield('dc1','','','readonly="readonly" size="10"');?><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fStartPop(document.fee_search.dc1,document.fee_search.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a></td>
						<td align="left" valign="middle">To</td>
						<td align="left" valign="middle">:</td>
						<td align="left" valign="middle"><?php echo $html_obj->draw_inputfield('dc2','','','readonly="readonly" size="10"');?><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fEndPop(document.fee_search.dc1,document.fee_search.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a></td>
					  </tr>
					  <iframe width=132 height=142 name="gToday:contrast:agenda.js" id="gToday:contrast:agenda.js" src="<?php echo JS_PATH ?>/DateRange/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
	</iframe>
					  <tr>
						<td align="left" valign="middle">Registration No</td>
						<td align="left" valign="middle">:</td>
						<td align="left" valign="middle"><?php echo $html_obj->draw_inputfield('es_preadmissionid','','','');?></td>
						<td align="left" valign="middle">Exam Name</td>
						<td align="left" valign="middle">:</td>
						<td align="left" valign="middle"><?php echo $html_obj->draw_inputfield('fine_name','','','');?></td>
					  </tr>
					</table>

					</td>
				  </tr>
				  <tr>
					<td align="center"><input type="submit" name="search_all_otherfines" value="Search" class="bgcolor_02" style="cursor:pointer" /></td>
				  </tr>
				  <tr>
					<td align="left" height="25">              
                    	<b>NOTE:</b>
				Students who are displayed in Red are Transferred Students.
                    
                    </td>
				  </tr>
				</table>
                </form>
				</td>
				<td class="bgcolor_02"></td>
        </tr>
		<tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="left" valign="top">
		
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr class="bgcolor_02" height="25">
    <td width="8%" align="center" valign="middle">S.No</td>
    <td width="16%" align="left" valign="middle">Student</td>
    <td width="17%" align="left" valign="middle">Exam Info </td>
  
	<td width="11%" align="left" valign="middle">Fee  Charged</td>
    <td width="10%" align="center" valign="middle">Fee Paid</td>
	<td width="13%" align="center" valign="middle">Paid On</td>
    <td width="6%" align="center" valign="middle">Fee waived</td>
    <td width="11%" align="center" valign="middle">Action</td>
  </tr>
  <?php						
		 if(count($fine_charged_det)>=1){
         $slno = $start+1;
		 $rw =1;
		 $fine_amount_total =0;
		 $paid_amount_total =0;
		 $deduction_allowed_total =0;
foreach ($fine_charged_det as $eachrecord)
      {
	if($slno%2==0)
		$rowclass = "even";
		else
		$rowclass = "odd";
		
		
?>       
  <tr class="<?php echo $rowclass;?>">
    <td height="15" align="center" valign="middle">&nbsp;<?php echo $slno;?></td>
  <?php
    $query_trasfor="SELECT * FROM es_preadmission WHERE  es_preadmissionid ='".$eachrecord['es_preadmissionid']."' AND status ='inactive'";
	$trans=sqlnumber($query_trasfor);
	if($trans==0){
	?>
    <td height="15" align="left" valign="middle"><?php 
	
			$online_sql="select * from es_sections_student where student_id=".$eachrecord['es_preadmissionid'];
	                                    $online_row=$db->getRow($online_sql);
					 echo ucfirst($eachrecord['pre_name']);?><br/>Reg No - <?php echo $eachrecord['es_preadmissionid']; ?><br/>Roll No - <?php  echo $online_row['roll_no']; ?> 
		  </td>
        <?php }else{
		?>
        <td height="15" align="left" valign="middle" style="color:#FF0000; font-weight:bold;"><?php 
	
			$online_sql="select * from es_sections_student where student_id=".$eachrecord['es_preadmissionid'];
	                                    $online_row=$db->getRow($online_sql);
					 echo ucfirst($eachrecord['pre_name']);?><br/>Reg No - <?php echo $eachrecord['es_preadmissionid']; ?><br/>Roll No - <?php  echo $online_row['roll_no']; ?> 				 </td>
        <?php }?>              
                     
    <td height="15" align="left" valign="middle">Class - <?php echo classname($eachrecord['pre_class']); ?><br />
      Exam - <?php echo ucfirst($eachrecord['fine_name']); ?><br />Date - <?php if($eachrecord['created_on']!='0000-00-00'){echo func_date_conversion("Y-m-d","d/m/Y",$eachrecord['created_on']);} ?></td>


    <td height="15" align="left" valign="middle"><?php if($eachrecord['fine_amount']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['fine_amount'], 2, '.', '');}  ?>
      
      </td>
    <td height="15" align="center" valign="middle">&nbsp;<?php if($eachrecord['paid_amount']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['paid_amount'], 2, '.', '');}else{echo '---';}  ?></td>
	  <td height="15" align="center" valign="middle">&nbsp;<?php if($eachrecord['paid_on']!='0000-00-00'){echo func_date_conversion("Y-m-d","d/m/Y",$eachrecord['paid_on']);}else{echo '---';} ?></td>
    <td height="15" align="center" valign="middle">&nbsp;<?php if($eachrecord['deduction_allowed']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['deduction_allowed'], 2, '.', '');}else{echo '---';}?></td>
    <td width="8%" height="15" align="center" valign="middle">
	<?php if(in_array('6_15',$admin_permissions)){?>
<a href="?pid=105&action=view_student_details&sid=<?php echo $eachrecord['es_preadmissionid']; ?>&ofid=<?php echo $eachrecord['exam_fee_id']; ?>&start=<?php echo $start;?>" ><img src="images/b_browse.png" border="0" title="View" alt="View" /></a><?php }?>	</td>
  </tr>
  <?php $slno++;
         $fine_amount_total +=$eachrecord['fine_amount'];
		 $paid_amount_total +=$eachrecord['paid_amount'];
		 $deduction_allowed_total +=$eachrecord['deduction_allowed'];
  
  }?>
  <tr><td colspan="10" align="center" valign="middle"><?php paginateexte($start, $q_limit, $no_rows, 'action='.$action.$PageUrl);?></td>
  </tr>
  <tr><td colspan="10" height="30">
  <table width="100%" border="0">
  <tr>
    <td width="13%" height="25" align="left" valign="middle">Total</td>
    <td width="1%" height="25" align="left" valign="middle">:</td>
    <td width="86%" height="25" align="left" valign="middle"><?php if($fine_amount_total>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($fine_amount_total, 2, '.', '');}  ?></td>
  </tr>
  <tr>
    <td height="25" align="left" valign="middle">Fee Paid</td>
    <td height="25" align="left" valign="middle">:</td>
    <td height="25" align="left" valign="middle"><?php if($paid_amount_total>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($paid_amount_total, 2, '.', '');}  ?></td>
  </tr>
  <tr>
    <td height="25" align="left" valign="middle">Remaining</td>
    <td height="25" align="left" valign="middle">:</td>
    <td height="25" align="left" valign="middle"><?php 
	$remaining = $fine_amount_total-$paid_amount_total;
	
	if($remaining>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($remaining, 2, '.', '');}  ?></td>
  </tr>
  <tr>
    <td height="25" align="left" valign="middle">Fee Waived</td>
    <td height="25" align="left" valign="middle">:</td>
    <td height="25" align="left" valign="middle"><?php if($deduction_allowed_total>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($deduction_allowed_total, 2, '.', '');} else { echo "---";} ?></td>
  </tr>
  <tr>
    <td height="25" align="left" valign="middle">Balance</td>
    <td height="25" align="left" valign="middle">:</td>
    <td height="25" align="left" valign="middle"><font color="#FF0000"><b>
      <?php 
	$Balance = $remaining-$deduction_allowed_total;
	
	if($Balance>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($Balance, 2, '.', '');}else{echo "---";}  ?></b></font></td>
  </tr>
  <tr>
    <td height="25" align="left" valign="middle">&nbsp;</td>
    <td height="25" align="left" valign="middle">&nbsp;</td>
    <td height="25" align="left" valign="middle">
    <input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=105&action=print_list&start=<?php echo $start.$PageUrl; ?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  />
    
    
<?php /*?>	<?php if(in_array('6_16',$admin_permissions)){?>
<a href="javascript: void(0)" onclick="popup_letter('?pid=105&action=print_list<?php echo $PageUrl;?>')" ><img src="images/print_16.png" border="0" title="Print Recipt" alt="Print Recipt" /></a><?php }?><?php */?>	</td>
  </tr>
</table>
  
  </td></tr>
  
  
  <?php }else{?>
  <tr><td colspan="10" align="center" height="25" class="error_message"> No Records Found</td></tr>
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

<?php
// List other fine 
	if($action=='view_student_details')
	{
?>	

	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
         <td height="3" colspan="3"></td>
	 </tr>
	  <tr>
		<td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Exam Fee Collection</span></td>
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
			<tr><td colspan="8" align="left">
			<table width="100%" border="0">
  <tr>
    <td width="24%" height="25" align="left" valign="middle" class="admin">Registration Number</td>
    <td width="1%" height="25" align="left" valign="middle" class="admin">:</td>
    <td width="75%" height="25" align="left" valign="middle"><?php echo $sid;?></td>
  </tr>
 
  
   <tr>
    <td height="25" align="left" valign="middle" class="admin">Student Name</td>
    <td height="25" align="left" valign="middle" class="admin">:</td>
    <td height="25" align="left" valign="middle"><?php 
	$DET = get_studentdetails($sid);
	echo ucwords($DET['pre_name']);?></td>
  </tr>
  
  <tr>
    <td height="25" align="left" valign="middle" class="admin">Class</td>
    <td height="25" align="left" valign="middle" class="admin">:</td>
    <td height="25" align="left" valign="middle"><?php 
	
	echo ucwords(classname($DET['pre_class']));?></td>
  </tr>
   <tr>
    <td height="25" align="left" valign="middle" class="admin">Status</td>
    <td height="25" align="left" valign="middle" class="admin">:</td>
    <td height="25" align="left" valign="middle"><?php 
	$DET = get_studentdetails($sid);
	if($DET['status']!='inactive') {
	echo "Active"; } else { echo "Transferred";}?></td>
  </tr>
   <!--<tr>
    <td height="25" align="left" valign="middle" class="admin">Roll No.</td>
    <td height="25" align="left" valign="middle" class="admin">:</td>
    <td height="25" align="left" valign="middle">
	 <?php 
	 //$DET = get_studentdetails($sid);
		//$online_sql="select * from es_sections_student where student_id=". $DET['es_preadmissionid'];
	                                    //$online_row=$db->getRow($online_sql);
					  //echo $online_row['roll_no']; ?>	</td>
  </tr>-->
</table>

			</td></tr>
  <tr class="bgcolor_02" height="25">
    <td align="left" valign="middle">S.No</td>
    <td align="left" valign="middle">Exam Name</td>
    <td align="left" valign="middle">Charged On</td>
    <td align="left" valign="middle">Fee Amount</td>
    <td align="left" valign="middle">Fee Paid</td>
	<td align="left" valign="middle">Paid On</td>
    <td align="left" valign="middle">Fee waived</td>
    <td align="left" valign="middle">Action</td>
  </tr>
  <?php						
		
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
    <td height="15" align="left" valign="middle">&nbsp;<?php if($eachrecord['fine_amount']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['fine_amount'], 2, '.', '');}  else {echo "---";} ?></td>
    <td height="15" align="left" valign="middle">&nbsp;<?php if($eachrecord['paid_amount']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['paid_amount'], 2, '.', '');}  else {echo "---";} ?></td>
	   <td height="15" align="left" valign="middle">&nbsp;<?php if($eachrecord['paid_on']!='0000-00-00'){echo func_date_conversion("Y-m-d","d/m/Y",$eachrecord['paid_on']); } else {echo "---";}?></td>
    <td height="15" align="left" valign="middle">&nbsp;<?php if($eachrecord['deduction_allowed']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['deduction_allowed'], 2, '.', '');} else {echo "---";}?></td>
    <td height="15" align="left" valign="middle">
	<?php if( $eachrecord['balance']!=0){?>
					  <a href="?pid=105&action=payamount&ofid=<?php echo $eachrecord['exam_fee_id']; ?>" ><img src="images/pay_balance_16.png" border="0" title="Pay Amount" alt="Pay Amount" /></a>&nbsp;
					  <?php }if( $eachrecord['balance']==0){?>
					 
					  <a href="javascript: void(0)" onclick="popup_letter('?pid=105&action=receipt&ofid=<?php echo $eachrecord['exam_fee_id']; ?>')" ><img src="images/print_16.png" border="0" title="Print Recipt" alt="Print Recipt" /></a>&nbsp;&nbsp;<a href="javascript: void(0)" onclick="popup_letter('?pid=105&action=receiptpayment&ofid=<?php echo $eachrecord['exam_fee_id']; ?>')" ><img src="images/b_browse.png" border="0" title="Print Payment Recipt" alt="Print Payment Recipt" /></a><a href="javascript: void(0)" onclick="popup_letter('?pid=105&action=receiptpayment&ofid=<?php echo $eachrecord['exam_fee_id']; ?>')" ></a><?php }?>	</td>
  </tr>
  <?php  $slno++;
         $tot_fine_amount +=$eachrecord['fine_amount'];
		 $tot_paid_amount +=$eachrecord['paid_amount'];
		 $tot_deduction_allowed +=$eachrecord['deduction_allowed'];
  
  }?>
  <tr height="25">
    <td></td>
    <td></td>
    <td>&nbsp;<b>Total:</b></td>
    <td>&nbsp;<?php if($tot_fine_amount>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($tot_fine_amount, 2, '.', '');}  else {echo "---";} ?></td>
    <td>&nbsp;<?php if($tot_paid_amount>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($tot_paid_amount, 2, '.', '');}  else {echo "---";} ?></td>
	<td></td>
    <td>&nbsp;<?php if($tot_deduction_allowed>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($tot_deduction_allowed, 2, '.', '');}  else {echo "---";} ?></td>
    <td></td>
  </tr>
   <tr height="25">
    <td colspan="8">
	<table width="100%" border="0">
  <tr>
    <td width="13%" align="left" valign="middle">Total</td>
    <td width="1%" align="left" valign="middle">:</td>
    <td width="86%" align="left" valign="middle"><?php if($tot_fine_amount>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($tot_fine_amount, 2, '.', '');} else {echo "---";}  ?></td>
  </tr>
  <tr>
    <td align="left" valign="middle">Fee Paid</td>
    <td align="left" valign="middle">:</td>
    <td align="left" valign="middle"><?php if($tot_paid_amount>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($tot_paid_amount, 2, '.', '');}  else {echo "---";} ?></td>
  </tr>
  <tr>
    <td align="left" valign="middle">Remaining</td>
    <td align="left" valign="middle">:</td>
    <td align="left" valign="middle"><?php 
	$remaining = $tot_fine_amount-$tot_paid_amount;
	
	if($remaining>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($remaining, 2, '.', '');}  else {echo "---";} ?></td>
  </tr>
  <tr>
    <td align="left" valign="middle">Fee Waived</td>
    <td align="left" valign="middle">:</td>
    <td align="left" valign="middle"><?php if($tot_deduction_allowed>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($tot_deduction_allowed, 2, '.', '');} else {echo "---";}  ?></td>
  </tr>
  <tr>
    <td align="left" valign="middle">Balance</td>
    <td align="left" valign="middle">:</td>
    <td align="left" valign="middle"><font color="#FF0000"><b>
      <?php 
	$Balance = $remaining-$tot_deduction_allowed;
	
	if($Balance>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($Balance, 2, '.', '');}else{echo "---";}  ?></b></font></td>
  </tr>
  <tr>
    <td align="left" valign="middle">&nbsp;</td>
    <td align="left" valign="middle">&nbsp;</td>
    <td align="left" valign="middle"><a href="javascript: void(0)" onclick="popup_letter('?pid=105&action=print_student_details&sid=<?php echo $sid; ?>')" ><img src="images/print_16.png" border="0" title="Print Recipt" alt="Print Recipt" /></a></td>
  </tr>
</table>	</td>
  </tr>
   <tr height="25">
    <td colspan="8" align="center"><a href="index.php?pid=105&action=view_list&start=<?php echo $start;?>" class="bgcolor_02" style="padding:4px; text-decoration:none;">Back to Search</a></td>
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
// End of List	
?>
<?php if($action=='payamount') { 

//array_print($_GET);
?>
<script type="text/javascript" >
	function showAvatar()
			{
		
				var ch = document.de_allocate_room_form.eq_paymode.value;
				if (ch=='cash'){
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
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Pay Exam fee </strong></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top">
				        <form action="" method="post" name="de_allocate_room_form">
						<table width="100%" cellpadding="0" cellspacing="0">
							
							<tr>
							    <td height="25" align="center" valign="middle" colspan="4">

									<table width="100%" cellpadding="3" cellspacing="3">
										<tr class="admin">
										        <td width="5%" align="center" valign="middle"></td>
												<td width="33%" align="center" valign="middle">Due Amount</td>
												<td width="4%" align="center" valign="middle"></td>
												<td width="32%" align="center" valign="middle"> Amount</td>
												<td width="2%" align="center" valign="middle"></td>
												<td width="21%" align="center" valign="middle">Deduction</td>
												<td width="3%"></td>
										</tr>
										<tr>
										        <td  align="center" valign="middle"></td>
												<td align="center" valign="middle" class="admin"><font color="#FF0000"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($payamount_details['fine_amount'], 2, '.', '');?></font></td><td align="center" valign="middle"></td>
										  <td align="center" valign="middle"><input type="text" name="amount_paid" value="<?php echo $amount_paid;?>"  /></td><td align="center" valign="middle"></td>
										  <td align="center" valign="middle"><input type="text" name="deduction_allowed" value="<?php echo $deduction_allowed;?>"  /></td><td></td>
										</tr>
								  </table>
								</td>
							</tr>
							<tr>
							    <td width="15%" height="25" align="left" valign="middle"></td>
								<td width="19%" height="25" align="left" valign="middle"  class="admin" >Amount In words</td>
								<td width="1%" align="left" valign="middle" class="admin">:</td>
							  <td width="65%" align="left" valign="middle"><textarea name="remarks"><?php echo stripslashes($remarks); ?></textarea></td>
							</tr>
							<tr>
							    <td height="25" align="center" valign="middle" colspan="4">
									<table width="100%" border="0" cellspacing="3" cellpadding="0" >
											
											<tr>
                                       		  <td width="15%" align="left" valign="middle" class="admin">&nbsp;&nbsp;</td>
                                       		  <td width="19%" align="left" valign="bottom" class="admin">Payment Mode</td>
                                       		  <td width="3%" align="left" valign="top" class="admin">:</td>
                                       		  <td width="63%" align="left" valign="middle" class="admin"><select name="eq_paymode" style="width:150px;" onchange="Javascript:showAvatar();" >
											  <option value="">-- Select --</option>
                                               
                                                <option <?php if($eq_paymode=='cash') { echo "selected='selected'"; } ?> value ="cash">Cash</option>
                                                <option <?php if($eq_paymode=='cheque') { echo "selected='selected'"; } ?> value ="cheque">Cheque</option>
                                                <option <?php if($eq_paymode=='DD') { echo "selected='selected'"; } ?> value ="DD">DD</option>
                                              </select>&nbsp;<font color="#FF0000" size="2"><b>*</b></font></td>
                                   		    </tr>
											<tr>
											<td height="25" class="admin">&nbsp;</td>
											<td height="25" align="left" valign="bottom" class="admin">Voucher&nbsp;Type</td>
											<td align="left" class="admin">:</td>
											<td align="left" valign="middle" class="narmal"><select name="vocturetypesel" style="width:150px;">
											<option value="">-- Select --</option>
											  <?php 
																						$voucherlistarr = voucher_finance();
																						krsort($voucherlistarr);
																						foreach($voucherlistarr as $eachvoucher) {	?>
											  <option value="<?php echo $eachvoucher['es_voucherid']; ?>" <?php if ($vocturetypesel==$eachvoucher['es_voucherid']){  
											   echo 'selected'; }?> ><?php echo $eachvoucher['voucher_type'];                        ?> ( <?php echo $eachvoucher['voucher_mode']; ?> )</option>
											  <?php } ?>
											</select>&nbsp;<font color="#FF0000" size="2"><b>*</b></font></td>
										    </tr>
                                            <tr>
												<td height="25" class="narmal">&nbsp;</td>
												<td height="25" align="left" valign="bottom" class="admin">Ledger&nbsp;Type</td>
												<td align="left" class="admin">:</td>
												<td align="left" valign="middle" class="narmal"><select name="es_ledger" style="width:150px;">
												<option value="">-- Select --</option>
												  <?php 
																							$ledgerlistarr = ledger_finance();
																							foreach($ledgerlistarr as $eachledger) { 
																							?>
												  <option value="<?php echo $eachledger['lg_name']; ?>" <?php if($es_ledger==$eachledger['lg_name']) { echo                        'selected'; } elseif($eachledger['lg_name']=='Staff Salary'){echo 'selected';} ?>><?php echo $eachledger['lg_name']; ?> </option>
												  <?php } ?>
											  </select>&nbsp;<font color="#FF0000" size="2"><b>*</b></font></td>
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
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin"></td>
								<td align="left" valign="middle" class="admin"></td>
								<td align="left" valign="middle">
								<input type="hidden" name="dueamount" value="<?php echo $payamount_details['fine_amount'];?>" />
								<input type="submit" name="receive_amount" value="Pay Amount" class="bgcolor_02" /></td>
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
<?php } ?>
<?php if($action=='receipt') { 
//array_print($_GET);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Exam fee Receipt</strong></td>
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
											<td width="73%" align="left" valign="middle"><?php echo $payamount_details['exam_fee_id']?></td>
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
											 if($online_row['status']!='inactive') { echo "---"; } else { echo "Transferred";}
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
								<td align="left" valign="middle">Exam Name</td>
								<td height="25" align="left" valign="middle">Fee Amount</td>
								<td align="left" valign="middle">Fee Waived</td>
								<td align="left" valign="middle">Amount Received</td>
							  </tr>
							  <tr>
								<td align="left" valign="middle"><?php 
								if($payamount_details['created_on']!='0000-00-00'){$charged_on = func_date_conversion("Y-m-d","d/m/Y",$payamount_details['created_on']);}
								echo ucwords($payamount_details['fine_name'])."<br>( ".$charged_on." )"; ?></td>
								<td height="25" align="left" valign="middle"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($payamount_details['fine_amount'], 2, '.', '');?></td>
								<td align="left" valign="middle"><?php if($payamount_details['deduction_allowed']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($payamount_details['deduction_allowed'], 2, '.', ''); } else {echo "---";}?></td>
								<td align="left" valign="middle"><?php if($payamount_details['paid_amount']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($payamount_details['paid_amount'], 2, '.', '');}?></td>
							  </tr>
							</table>
                      </td>
					  </tr>
					  <tr>
						<td><table width="100%" border="0">
							  <tr>
								<td align="left" valign="middle"><b>Rupees : </b><?php if($payamount_details['remarks']!='') {echo $payamount_details['remarks']; }else {echo "---";}?></td>
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
											<td width="73%" align="left" valign="middle"><?php echo $payamount_details['exam_fee_id']?></td>
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
											 if($online_row['status']!='inactive') { echo "---"; } else { echo "Transferred";}
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
								<td align="left" valign="middle">Bank Name</td>
								<td align="left" valign="middle">Bank Account</td>
								<td align="left" valign="middle">Payment Mode</td>
								<td height="25" align="left" valign="middle">Fee Amount</td>
								<td align="left" valign="middle">Check No. </td>
								<td align="left" valign="middle">Teller No.</td>
								<td align="left" valign="middle">Pin No. </td>
							  </tr>
							  <tr>
								<td align="left" valign="middle"><?php 
								$voucher = "SELECT * FROM es_voucherentry  where es_voucherentryid =".$payamount_details['voucherid'];
 $voucher_res=$db->getRow($voucher);
if( $voucher_res['es_bank_name']!=''){echo $voucher_res['es_bank_name'];} else { echo "--"; } ?></td>
	<td height="25" align="left" valign="middle"><?php if( $voucher_res['es_bankacc']!=''){echo $voucher_res['es_bankacc']; } else { echo "--"; }  ?></td>
	<td align="left" valign="middle"><?php if( $voucher_res['es_paymentmode']!=''){echo $voucher_res['es_paymentmode'];}else { echo "--"; } ?></td>
									<td align="left" valign="middle">RS<?php if( $voucher_res['es_amount']!=''){echo $voucher_res['es_amount']; }else { echo "--"; } ?>.00</td>
								<td align="left" valign="middle"><?php if( $voucher_res['es_checkno']!=''){echo $voucher_res['es_checkno']; }else { echo "--"; }  ?></td>
								<td align="left" valign="middle"><?php if( $voucher_res['es_teller_number']!=''){echo $voucher_res['es_teller_number']; }else { echo "--"; }  ?></td>
									<td align="left" valign="middle"><?php if( $voucher_res['es_bank_pin']!=''){echo $voucher_res['es_bank_pin']; } else { echo "--"; }  ?></td>
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
<?php
// List other fine 
	if($action=='print_student_details')
	{
?>	

	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
         <td height="3" colspan="3"></td>
	 </tr>
	  <tr>
		<td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Exam fee Details </span></td>
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
			<tr><td colspan="7" align="left">
			<table width="100%" border="0">
  <tr>
    <td width="24%" height="25" align="left" valign="middle" class="admin">Registration Number</td>
    <td width="1%" height="25" align="left" valign="middle" class="admin">:</td>
    <td width="75%" height="25" align="left" valign="middle"><?php echo $sid;?></td>
  </tr>
  <tr>
    <td height="25" align="left" valign="middle" class="admin">Student Name</td>
    <td height="25" align="left" valign="middle" class="admin">:</td>
    <td height="25" align="left" valign="middle"><?php 
	$DET = get_studentdetails($sid);
	echo ucwords($DET['pre_name']);?></td>
  </tr>
  <tr>
    <td height="25" align="left" valign="middle" class="admin">Class</td>
    <td height="25" align="left" valign="middle" class="admin">:</td>
    <td height="25" align="left" valign="middle"><?php 
	
	echo ucwords(classname($DET['pre_class']));?></td>
  </tr>
  
  <tr>
    <td height="25" align="left" valign="middle" class="admin">Status</td>
    <td height="25" align="left" valign="middle" class="admin">:</td>
    <td height="25" align="left" valign="middle"> <?php 
	$DET = get_studentdetails($sid);
	if($DET['status']!='inactive') {
	echo "---"; } else { echo "Transferred";}?></td>
  </tr>
 
</table>

			</td></tr>
  <tr class="bgcolor_02" height="25">
    <td align="left" valign="middle">S.No</td>
    <td height="25" align="left" valign="middle">Exam Name</td>
    <td height="25" align="left" valign="middle">Charged On</td>
    <td align="left" valign="middle">Fee Amount</td>
    <td align="left" valign="middle">Fee Paid</td>
	<td align="left" valign="middle">Paid On</td>
    <td align="left" valign="middle">Fee waived</td>
   
  </tr>
  <?php						
		
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
    <td height="25" align="left" valign="middle">&nbsp;<?php echo ucfirst($eachrecord['fine_name']); ?></td>
    <td height="25" align="left" valign="middle">&nbsp;<?php echo func_date_conversion("Y-m-d","d/m/Y",$eachrecord['created_on']); ?></td>
    <td height="15" align="left" valign="middle">&nbsp;<?php if($eachrecord['fine_amount']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['fine_amount'], 2, '.', '');} else{ echo "---"; }?></td>
    <td height="15" align="left" valign="middle">&nbsp;<?php if($eachrecord['paid_amount']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['paid_amount'], 2, '.', '');}   else{ echo "---"; }?></td>
	  <td height="15" align="left" valign="middle">&nbsp;<?php if($eachrecord['paid_on']!='0000-00-00'){echo func_date_conversion("Y-m-d","d/m/Y",$eachrecord['paid_on']); } else{ echo ""; }?></td>
    <td height="15" align="left" valign="middle">&nbsp;<?php if($eachrecord['deduction_allowed']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['deduction_allowed'], 2, '.', '');} else{ echo "---"; }?></td>
   
  </tr>
  <?php  $slno++;
         $tot_fine_amount +=$eachrecord['fine_amount'];
		 $tot_paid_amount +=$eachrecord['paid_amount'];
		 $tot_deduction_allowed +=$eachrecord['deduction_allowed'];
  
  }?>
  <tr height="25">
    <td align="left" valign="middle"></td>
    <td align="left" valign="middle"></td>
    <td align="left" valign="middle">&nbsp;<b>Total:</b></td>
    <td align="left" valign="middle">&nbsp;<?php if($tot_fine_amount>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($tot_fine_amount, 2, '.', '');} else{ echo "---"; }?></td>
    <td align="left" valign="middle">&nbsp;<?php if($tot_paid_amount>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($tot_paid_amount, 2, '.', '');} else{ echo "---"; }  ?></td>
	 <td align="left" valign="middle"></td>
    <td align="left" valign="middle">&nbsp;<?php if($tot_deduction_allowed>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($tot_deduction_allowed, 2, '.', '');} else{ echo "---"; }  ?></td>
   
  </tr>
   <tr height="25">
    <td colspan="7">
	<table width="100%" border="0">
  <tr>
    <td width="13%" height="25" align="left" valign="middle">Total</td>
    <td width="1%" height="25" align="left" valign="middle">:</td>
    <td width="86%" height="25" align="left" valign="middle"><?php if($tot_fine_amount>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($tot_fine_amount, 2, '.', '');} else{ echo "---"; }?></td>
  </tr>
  <tr>
    <td height="25" align="left" valign="middle">Fee Paid</td>
    <td height="25" align="left" valign="middle">:</td>
    <td height="25" align="left" valign="middle"><?php if($tot_paid_amount>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($tot_paid_amount, 2, '.', '');} else{ echo "---"; }  ?></td>
  </tr>
  <tr>
    <td height="25" align="left" valign="middle">Remaining</td>
    <td height="25" align="left" valign="middle">:</td>
    <td height="25" align="left" valign="middle"><?php 
	
	 $remaining = $tot_fine_amount-$tot_paid_amount;
	
	if($remaining>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($remaining, 2, '.', '');} else{ echo "---"; }?></td>
  </tr>
  <tr>
    <td height="25" align="left" valign="middle">Fee Waived</td>
    <td height="25" align="left" valign="middle">:</td>
    <td height="25" align="left" valign="middle"><?php if($tot_deduction_allowed>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($tot_deduction_allowed, 2, '.', '');} else{ echo "---"; } ?></td>
  </tr>
  <tr>
    <td height="25" align="left" valign="middle">Balance</td>
    <td height="25" align="left" valign="middle">:</td>
    <td height="25" align="left" valign="middle"><font color="#FF0000"><b>
      <?php 
	$Balance = $remaining-$tot_deduction_allowed;
	
	if($Balance>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($Balance, 2, '.', '');}else{echo "---";}  ?></b></font></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td height="25"></td>
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
	
<?php
	}		
// End of List	
?>
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
		<td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Exam fee charged Students</span></td>
	  </tr>
	   <tr height="25">
			    <td class="bgcolor_02" ></td>
				<td  valign="middle" class="narmal" align="center"><?php if(isset($dc1)){echo "From  : ".$dc1;}?>&nbsp;&nbsp;<?php if(isset($dc1)){echo "To  : ".$dc2;}?></td>
				 <td class="bgcolor_02"></td>
			 </tr>
		<tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="left" valign="top">
		
			<table width="100%" border="0" cellpadding="0" cellspacing="1">
  <tr class="bgcolor_02" height="25">
    <td width="6%" align="center" valign="middle">S.No</td>
    <td width="19%" align="center" valign="middle">Student</td>
    <td width="17%" align="center" valign="middle">Exam Info </td>
    
	<td width="19%" align="center" valign="middle">Fee Charged</td>
    <td width="11%" align="center" valign="middle">Fee Paid</td>
	<td width="10%" align="center" valign="middle">Paid On</td>
    <td align="center" valign="middle" colspan="2">Fee waived</td>
  </tr>
  <?php						
		 if(count($fine_charged_det)>=1){
         $slno = $start+1;
		 $rw =1;
		 $fine_amount_total =0;
		 $paid_amount_total =0;
		 $deduction_allowed_total =0;
foreach ($fine_charged_det as $eachrecord)
      {
	if($slno%2==0)
		$rowclass = "even";
		else
		$rowclass = "odd";
		
		
?>       
  <tr class="<?php echo $rowclass;?>">
    <td height="15" align="left" valign="middle">&nbsp;<?php echo $slno;?></td>
    <?php
       $query_trasfor="SELECT * FROM es_preadmission WHERE  es_preadmissionid ='".$eachrecord['es_preadmissionid']."' AND status ='inactive'";
	$trans=sqlnumber($query_trasfor);
	if($trans==0){
	?>

    <td height="15" align="left" valign="middle"><?php $online_sql="select * from es_sections_student where student_id=".$eachrecord['es_preadmissionid'];
	                                    $online_row=$db->getRow($online_sql);
					 echo ucfirst($eachrecord['pre_name']);?>
      <br/>
      Reg No - <?php echo $eachrecord['es_preadmissionid']; ?><br/>
      Roll No -
      <?php  echo $online_row['roll_no']; ?></td>
                <?php }else{
				?> 
                
    <td height="15" align="left" valign="middle" ><span style="color:#FF0000; font-weight:bold;">
      <?php 
	
			$online_sql="select * from es_sections_student where student_id=".$eachrecord['es_preadmissionid'];
	                                    $online_row=$db->getRow($online_sql);
					 echo ucfirst($eachrecord['pre_name']);?>
      <br/>
      Reg No - <?php echo $eachrecord['es_preadmissionid']; ?><br/>
      Roll No -
      <?php  echo $online_row['roll_no']; ?>
    </span></td>    
          <?php }?>           
                     
                     
                     
                     
    <td height="15" align="left" valign="middle">Class - <?php echo classname($eachrecord['pre_class']); ?><br />
Exam - <?php echo ucfirst($eachrecord['fine_name']); ?><br />
Date -
<?php if($eachrecord['created_on']!='0000-00-00'){echo func_date_conversion("Y-m-d","d/m/Y",$eachrecord['created_on']);} ?></td>

    <td height="15" align="left" valign="middle">&nbsp;
      <?php if($eachrecord['fine_amount']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['fine_amount'], 2, '.', '');} else { echo "---";}   ?></td>
    <td height="15" align="left" valign="middle">&nbsp;
      <?php if($eachrecord['paid_amount']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['paid_amount'], 2, '.', '');} else { echo "---";}  ?></td>
	  <td width="7%" height="15" align="left" valign="middle">&nbsp;<?php if($eachrecord['paid_on']!='0000-00-00'){echo func_date_conversion("Y-m-d","d/m/Y",$eachrecord['paid_on']);}  else { echo "---";} ?></td>
    <td width="11%" height="15" colspan="2" align="left" valign="middle">&nbsp;
      <?php if($eachrecord['deduction_allowed']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['deduction_allowed'], 2, '.', '');} else { echo "---";} ?></td>
  </tr>
  <?php $slno++;
         $fine_amount_total +=$eachrecord['fine_amount'];
		 $paid_amount_total +=$eachrecord['paid_amount'];
		 $deduction_allowed_total +=$eachrecord['deduction_allowed'];
  
  }?>
  <tr><td colspan="10" align="center" valign="middle"><?php paginateexte($start, $q_limit, $no_rows, 'action='.$action.$PageUrl);?></td>
  </tr>
  <tr><td colspan="10" height="30">
  <table width="100%" border="0">
  <tr>
    <td width="13%" height="25" align="left" valign="middle">Total</td>
    <td width="1%" height="25" align="left" valign="middle">:</td>
    <td width="86%" height="25" align="left" valign="middle"><?php if($fine_amount_total>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($fine_amount_total, 2, '.', '');}  else { echo "---";}  ?></td>
  </tr>
  <tr>
    <td height="25" align="left" valign="middle">Fee Paid</td>
    <td height="25" align="left" valign="middle">:</td>
    <td height="25" align="left" valign="middle"><?php if($paid_amount_total>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($paid_amount_total, 2, '.', '');}  else { echo "---";}  ?></td>
  </tr>
  <tr>
    <td height="25" align="left" valign="middle">Remaining</td>
    <td height="25" align="left" valign="middle">:</td>
    <td height="25" align="left" valign="middle"><?php 
	$remaining = $fine_amount_total-$paid_amount_total;
	
	if($remaining>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($remaining, 2, '.', '');}  else { echo "---";}  ?></td>
  </tr>
  <tr>
    <td height="25" align="left" valign="middle">Fee Waived</td>
    <td height="25" align="left" valign="middle">:</td>
    <td height="25" align="left" valign="middle"><?php if($deduction_allowed_total>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($deduction_allowed_total, 2, '.', '');} else { echo "---";}   ?></td>
  </tr>
  <tr>
    <td height="25" align="left" valign="middle">Balance</td>
    <td height="25" align="left" valign="middle">:</td>
    <td height="25" align="left" valign="middle"><font color="#FF0000"><b>
      <?php 
	$Balance = $remaining-$deduction_allowed_total;
	
	if($Balance>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($Balance, 2, '.', '');}else{echo "---";}  ?></b></font></td>
  </tr>
</table>
  
  </td></tr>
  
  
  <?php }else{?>
  <tr><td colspan="10" align="center" height="25" class="error_message"> No Records Found</td></tr>
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
