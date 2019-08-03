<?php
/**
* Only Admin users can view the pages
*/
checkuserinlogin();?>
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
<?php if($action=='view_room_details') { ?>		

<form action="" method="post">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02" align="left"><strong>&nbsp;&nbsp;Hostel  Record</strong></td>
              </tr>
			
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top"><?php /*?><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="88%"><table width="100%" border="0" cellspacing="5" cellpadding="0">
                      <tr>
                        <td align="left" valign="top" class="narmal"><strong>Reg No</strong></td>
					
                        <td align="left" valign="top" class="narmal"><?php echo $rommallotdetails['es_personid']; ?></td>
                        <td width="17%" align="left" valign="top" class="narmal"><strong>Room Type</strong></td>
                        <td width="26%" align="left" valign="top" class="narmal"><?php echo $room_details['room_type'];?></td>
                       
                      </tr>
                      <tr>
                        <td width="26%" align="left" valign="top" class="narmal"><strong>Name</strong> </td>
                        <td width="22%" align="left" valign="top" class="narmal"><?php if($rommallotdetails['es_persontype'] == 'student')
					  {  echo $stud_details['pre_name']; } if($rommallotdetails['es_persontype'] == 'staff')
					  { echo $staff_details['st_firstname']." ".$staff_details['st_lastname'] ;}?></td>
                        <td width="17%" align="left" valign="top" class="narmal"><strong>Room No</strong></td>
                        <td width="26%" align="left" valign="top" class="narmal"><?php echo $room_details['room_no'];?></td>
                       
                      </tr>
                      <tr>
                        <td height="24" align="left" valign="top" class="narmal"><strong>Person type </strong></td>
                        <td align="left" valign="top" class="narmal"><?php echo $rommallotdetails['es_persontype']; ?> </td>
                        
                        <td width="17%" align="left" valign="top"><strong><?php if($rommallotdetails['es_persontype'] == 'student')
					  {  echo "Class"; }   if($rommallotdetails['es_persontype'] == 'staff')
					  { echo "Department";}?></strong></td>
						 <td width="26%" align="left" valign="top"><?php if($rommallotdetails['es_persontype'] == 'student')
					  {  echo classname($stud_details['pre_class']); }   if($rommallotdetails['es_persontype'] == 'staff')
					  { echo deptname($staff_details['st_department']);}?></td>
					
                      </tr>
                   
				      <tr>
                        <td height="40" colspan="5" align="left" valign="middle" class="adminfont">&nbsp;&nbsp;<strong>Item Issued </strong></td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td><table width="100%" border="0" cellspacing="0" cellpadding="0" bordercolor="#CCCCCC">
                        <tr height="25" class="bgcolor_02">
                          <td width="7%" height="20" class="bgcolor_02"><strong>&nbsp;S No </strong></td>
                          <td width="24%" class="bgcolor_02"><strong>&nbsp;&nbsp;Item Code </strong></td>
                          <td width="32%" class="bgcolor_02"><strong>&nbsp;Item Name </strong></td>
                          <td width="16%" class="bgcolor_02"><strong>&nbsp;&nbsp;Qty</strong></td>
                          <td width="21%" class="bgcolor_02"><strong>&nbsp;&nbsp;Date of Issue </strong></td>
                        </tr>
						<?php 
						$i=0;
						foreach($es_roomDetails as $eachrecord) { ?>
                        <tr>
                          <td class="narmal"><?php echo ++$i;?></td>
                          <td class="narmal"><?php echo $eachrecord['h_item_code'];?></td>
                          <td class="narmal"><?php echo $eachrecord['h_item_name'];?></td>
                          <td class="narmal"><?php echo $eachrecord['hostelperson_itemqty'];?></td>
                          <td class="narmal"><?php echo displaydate($eachrecord['hostelperson_itemissued']);?></td>
                        </tr>
						<?php } ?>                       
                    </table></td>
                  </tr>
                  <tr>
                    <td height="40"><span class="adminfont">&nbsp;&nbsp;<strong>Health Record </strong> </span></td>
                  </tr>
                  <tr>
                    <td><table width="100%" border="0" cellspacing="0" cellpadding="0" bordercolor="#CCCCCC">
                        <tr class="bgcolor_02">
						  <td width="8%" height="20" class="bgcolor_02"><strong>&nbsp;S No </strong></td>
                          <td width="23%" height="20" class="bgcolor_02"><strong>&nbsp;&nbsp;Problem Defiction </strong></td>
                          <td width="25%" class="bgcolor_02"><strong> &nbsp;&nbsp;Ref Doctor </strong></td>
                          <td width="20%" class="bgcolor_02"><strong>&nbsp;Prescription </strong></td>
						  <td width="24%" class="bgcolor_02"><strong>&nbsp;CreatedOn </strong></td>
                        </tr>
						
						<?php 
						$i=0;
						foreach($es_roomDetail as $eachrecord) { ?>
                        <tr>
						        <td class="narmal"><?php echo ++$i;?></td>
                          <td class="narmal"><?php echo $eachrecord->health_problem;?></td>
                          <td class="narmal"><?php echo $eachrecord->health_doctorname;?></td>
                          <td class="narmal"><?php echo $eachrecord->health_prescription;?></td>
						     <td class="narmal"><?php echo displaydate($eachrecord->es_createdon);?></td>
                        </tr>
                  
							<?php  } ?>  
                    </table></td>
                  </tr>
				  <tr>
				  <td>&nbsp; </td>
				  </tr>
				 </table><?php */?>
				 <br />
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
                     <tr height="25" class="bgcolor_02">
					 		<td align="center" valign="middle">S.No</td>
							<td align="center" valign="middle">Building Name</td>
					        <td align="center" valign="middle">Room Type</td>
							<td align="center" valign="middle">Room Number</td>
							<td align="center" valign="middle">Allotted On</td>
							<td align="center" valign="middle">De Allocated On</td>
							<td align="center" valign="middle">Action</td>
					 
					 </tr> 
					 <?php if(count($room_allotdet)>0){
					$irow=$start;
					$total_room_rate = 0;
					$total_deduction = 0;
					$total_amount_paid =0;
					foreach($room_allotdet as $eachrecord){
					$irow++;
					if($irow%2==0)
						$rowclass = "even";
						else
						$rowclass = "odd";
					
					 ?>
                    <tr height="25" class="<?php echo $rowclass;?>">
                      <td width="3%" align="center" valign="middle" class="narmal">&nbsp;<?php echo $irow; ?></td>
                   
                      <td width="11%" align="center" valign="middle" class="narmal"><?php echo $eachrecord['buidingname']; ?></td>
					  <td width="7%" align="center" valign="middle" class="narmal"><?php echo $eachrecord['room_type']; ?></td>
					  <td width="7%" align="center" valign="middle" class="narmal"><?php echo $eachrecord['room_no'];?></td>
					  
					  <td width="15%" align="center" valign="middle" class="narmal"><?php if($eachrecord['alloted_date']!='0000-00-00'){echo func_date_conversion("Y-m-d","d/m/Y",$eachrecord['alloted_date']);}?></td>
					  <td width="13%" align="center" valign="middle" class="narmal"><?php if($eachrecord['dealloted_date']!='0000-00-00'){echo func_date_conversion("Y-m-d","d/m/Y",$eachrecord['dealloted_date']);}?></td>
					  
                      <td width="10%" align="center" valign="middle" class="narmal">
                      <a href="javascript: void(0)" onclick="popup_letter('?pid=47&action=person_allotment_details&chgid=<?php echo $eachrecord['es_roomallotmentid'].$PageUrl; ?>')" ><img src="images/print_16.png" border="0" title="Print Recipt" alt="Print Recipt" /></a></td>
                    </tr>       
                    
					<?php 
					
					}?>
					
					
					<tr height="25">
                      <td align="center" colspan="7"><input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=47&action=print_list&start=<?php echo $start.$PageUrl; ?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /></td>
                    </tr>
					<tr height="25">
                      <td align="right" colspan="7" style="padding:10px"></td>
                    </tr>
					
					<?php  } else { ?> 
					 <tr height="25">
                      <td align="center" colspan="7">No Records Found</td>
                    </tr>
                    
                    <?php }  ?>
				</table>
				 
				 </td>
                <td width="1" class="bgcolor_02"></td>
              </tr>              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
    </tr>
  </table>
</form>
<?php } ?>
<?php if($action=='print_list') { 
$std_det =get_studentdetails($_SESSION['eschools']['user_id']);
?>		

<form action="" method="post">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02" align="left"><strong>&nbsp;&nbsp;Hostel  Record</strong></td>
              </tr>
			  <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top">
				 <br />
				 <table width="100%" border="0">
  <tr>
		<td width="9%" align="left" class="adminfont" >Class:</td>
	    <td width="35%" class="narmal" align="left" >&nbsp;&nbsp;&nbsp;<?php echo classname($std_det['pre_class']);?></td>
		<td width="31%" align="right" class="adminfont">Father&nbsp;Name&nbsp;: </td>
		<td width="25%" class="narmal" align="left"><?php echo $std_det['pre_fathername']; ?></td>
		
	</tr>
	<tr>
		<td width="9%" align="left" class="adminfont" >Reg.No.:</td>
	    <td width="35%" class="narmal" align="left" >&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['eschools']['user_id']; ?></td>
		<td width="31%" align="right" class="adminfont">Student&nbsp;Name&nbsp;:</td>
		<td width="25%" class="narmal" align="left"><?php echo $std_det['pre_name']; ?></td>
	</tr>
  
</table>

				 
				 </td>
                <td width="1" class="bgcolor_02"></td>
              </tr>  
			
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top">
				 <br />
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
                     <tr height="25" class="bgcolor_02">
					 		<td align="center" valign="middle">S.No</td>
							<td align="center" valign="middle">Building Name</td>
					        <td align="center" valign="middle">Room Type</td>
							<td align="center" valign="middle">Room Number</td>
							<td align="center" valign="middle">Allotted On</td>
							<td align="center" valign="middle">De Allocated On</td>
							
					 
					 </tr> 
					 <?php if(count($room_allotdet)>0){
					$irow=$start;
					$total_room_rate = 0;
					$total_deduction = 0;
					$total_amount_paid =0;
					foreach($room_allotdet as $eachrecord){
					$irow++;
					if($irow%2==0)
						$rowclass = "even";
						else
						$rowclass = "odd";
					
					 ?>
                    <tr height="25" class="<?php echo $rowclass;?>">
                      <td width="3%" align="center" valign="middle" class="narmal">&nbsp;<?php echo $irow; ?></td>
                   
                      <td width="11%" align="center" valign="middle" class="narmal"><?php echo $eachrecord['buidingname']; ?></td>
					  <td width="7%" align="center" valign="middle" class="narmal"><?php echo $eachrecord['room_type']; ?></td>
					  <td width="7%" align="center" valign="middle" class="narmal"><?php echo $eachrecord['room_no'];?></td>
					  
					  <td width="15%" align="center" valign="middle" class="narmal"><?php if($eachrecord['alloted_date']!='0000-00-00'){echo func_date_conversion("Y-m-d","d/m/Y",$eachrecord['alloted_date']);}?></td>
					  <td width="13%" align="center" valign="middle" class="narmal"><?php if($eachrecord['dealloted_date']!='0000-00-00'){echo func_date_conversion("Y-m-d","d/m/Y",$eachrecord['dealloted_date']);}?></td>
					  
                      
                    </tr>       
                    
					<?php 
					
					}?>
					
					
					<tr height="25">
                      <td align="right" colspan="7" style="padding:10px"></td>
                    </tr>
					
					<?php  } else { ?> 
					 <tr height="25">
                      <td align="center" colspan="7">No Records Found</td>
                    </tr>
                    
                    <?php }  ?>
				</table>
				 
				 </td>
                <td width="1" class="bgcolor_02"></td>
              </tr>              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
    </tr>
  </table>
</form>
<?php } ?>
<?php if($action=='person_allotment_details') { 
//array_print($_GET);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;View Hostel Charges</strong></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top">
				        <form action="" method="post" name="de_allocate_room_form">
						<table width="100%" cellpadding="0" cellspacing="0">
							<tr>
							    <td width="15%" height="25" align="left" valign="middle"></td>
								<td width="20%" height="25" align="left" valign="middle" class="admin">Buidling Name</td>
								<td width="2%" align="left" valign="middle" class="admin">:</td>
								<td width="63%" align="left" valign="middle"><?php echo ucwords($payamount_details['buidingname']);?></td>
							</tr>
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin">Room Type</td>
								<td align="left" valign="middle" class="admin">:</td>
								<td align="left" valign="middle"><?php echo ucwords($payamount_details['room_type']);?></td>
							</tr>
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin">Room No</td>
								<td align="left" valign="middle" class="admin">:</td>
								<td align="left" valign="middle"><?php echo $payamount_details['room_no'];?></td>
							</tr>
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin">Person Type</td>
								<td align="left" valign="middle" class="admin">:</td>
								<td align="left" valign="middle"><?php echo ucfirst($payamount_details['es_persontype']);?></td>
							</tr>
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin">Registration No</td>
								<td align="left" valign="middle">:</td>
								<td align="left" valign="middle"><?php echo $payamount_details['es_personid'];?></td>
							</tr>
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin">Person Name</td>
								<td align="left" valign="middle" class="admin">:</td>
								<td align="left" valign="middle"><?php  if($payamount_details['es_persontype'] == 'student')
					  { 
					    $stud_details = get_studentdetails($payamount_details['es_personid']);
					  echo ucwords($stud_details['pre_name']);}
					   if($payamount_details['es_persontype'] == 'staff')
					  {
					   $staff_details = get_staffdetails($payamount_details['es_personid']);
					  echo ucwords($staff_details['st_firstname']." ".$staff_details['st_lastname']);}
					  ?></td>
							</tr>
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin">Allocated On</td>
								<td align="left" valign="middle" class="admin">:</td>
							  <td align="left" valign="middle"><?php 
							  
							  echo func_date_conversion("Y-m-d","d/m/Y",$payamount_details['alloted_date']);?></td>
							</tr>
							<?php if($payamount_details['dealloted_date']!="" && $payamount_details['dealloted_date']!='0000-00-00'){?>
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin">De-allocated On</td>
								<td align="left" valign="middle" class="admin">:</td>
							  <td align="left" valign="middle"><?php 
							 
							  
							  echo func_date_conversion("Y-m-d","d/m/Y",$payamount_details['dealloted_date']);?></td>
							</tr>
							<?php }?>
							
							<tr>
                             <td height="40" colspan="4" align="left" valign="middle" class="adminfont">&nbsp;&nbsp;<strong>Item Issued </strong></td>
                           </tr>
						   <tr>
                             <td height="40" colspan="4" align="left" valign="middle">
							 		<table width="100%" border="0" cellspacing="0" cellpadding="0" bordercolor="#CCCCCC">
                        <tr height="25" class="bgcolor_02">
                          <td width="9%" height="20" class="bgcolor_02"><strong>&nbsp;S No </strong></td>
                          <td width="18%" class="bgcolor_02"><strong>&nbsp;&nbsp;Item Code </strong></td>
                          <td width="22%" class="bgcolor_02"><strong>&nbsp;Item Name </strong></td>
                          <td width="14%" class="bgcolor_02"><strong>&nbsp;&nbsp;Qty</strong></td>
                          <td width="19%" class="bgcolor_02"><strong>&nbsp;&nbsp;Date of Issue </strong></td>
						   <td width="18%" class="bgcolor_02"><strong>&nbsp;&nbsp;Returned On </strong></td>
                        </tr>
						<?php 
						if(count($es_roomDetails)>=1){
						$i=0;
						foreach($es_roomDetails as $eachrecord) { ?>
                        <tr>
                          <td class="narmal"><?php echo ++$i;?></td>
                          <td class="narmal"><?php echo $eachrecord['h_item_code'];?></td>
                          <td class="narmal"><?php echo $eachrecord['h_item_name'];?></td>
                          <td class="narmal"><?php echo $eachrecord['hostelperson_itemqty'];?></td>
                          <td class="narmal"><?php echo displaydate($eachrecord['hostelperson_itemissued']);?></td>
						  <td class="narmal"><?php if($eachrecord['return_on']!='0000-00-00'){echo func_date_conversion("Y-m-d","d/m/Y",$eachrecord['return_on']);}?></td>
                        </tr>
						<?php } }else{?>
						<tr><td colspan="6" align="center" class="admin">No Items Issued</td></tr>
						<?php }?>                       
                    </table>
							 </td>
                           </tr>
						   <tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin"></td>
								<td align="left" valign="middle" class="admin"></td>
								
								<td align="left" valign="middle"></td>
							</tr>
						   <tr>
                             <td height="40" colspan="4" align="left" valign="middle" class="adminfont">&nbsp;&nbsp;<strong>Payment Details</strong></td>
                           </tr>
						   <tr>
                             <td height="40" colspan="4" align="left" valign="middle">
							 		<table width="100%" border="0" cellspacing="0" cellpadding="0" bordercolor="#CCCCCC">
                        <tr height="25" class="bgcolor_02">
                          <td width="9%" height="20" class="bgcolor_02"><strong>&nbsp;S No </strong></td>
                          <td width="15%" class="bgcolor_02"><strong>&nbsp;&nbsp;Month</strong></td>
                          <td width="22%" class="bgcolor_02"><strong>&nbsp;Bill Amount </strong></td>
                          <td width="18%" class="bgcolor_02"><strong>Paid Amount </strong></td>
                          <td width="19%" class="bgcolor_02"><strong>&nbsp;Waived Amount</strong></td>
						   <td width="17%" class="bgcolor_02"><strong>&nbsp;&nbsp;Paid On </strong></td>
                        </tr>
						<?php 
						if(count($payment_det)>=1){
						$i=0;
						foreach($payment_det as $eachrecord) { ?>
                        <tr>
                          <td class="narmal"><?php echo ++$i;?></td>
                          <td class="narmal"><?php echo func_date_conversion("Y-m-d","d/m/Y",$eachrecord['due_month']);?></td>
                          <td class="narmal"><?php if($eachrecord['room_rate']>=1){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['room_rate'], 2, '.', '');}?></td>
                          <td class="narmal"><?php if($eachrecord['amount_paid']>=1){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['amount_paid'], 2, '.', '');}else { echo "---";} ?></td>
                          <td class="narmal"><?php if($eachrecord['deduction']>=1){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['deduction'], 2, '.', '');}else { echo "---";}?></td>
						  <td class="narmal"><?php if($eachrecord['paid_on']!='0000-00-00'){echo func_date_conversion("Y-m-d","d/m/Y",$eachrecord['paid_on']);}else { echo "---";}?></td>
                        </tr>
						<?php } }else{?>
						<tr><td colspan="6" align="center" class="admin">No Records Found</td></tr>
						<?php }?>                       
                    </table>
							 </td>
                           </tr>
							
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin"></td>
								<td align="left" valign="middle" class="admin"></td>
								
								<td align="left" valign="middle"></td>
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
<?php if($action=='viewdetails'){?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><span class="admin">&nbsp;<strong>Hostel Charges Details</strong></span></td>
              </tr>
			   <tr>
			    <td class="bgcolor_02" ></td>
                  				<td  valign="middle" class="narmal" align="right"></td>
								 <td class="bgcolor_02"></td>
          					 </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="4" cellpadding="0">
                <?php /*?>  <tr>
                    <td align="left" valign="top"><table width="100%" border="0" cellspacing="3" cellpadding="0">
                     <form action="?pid=47&action=viewdetails" method="post" name="prepare_bill" id="prepare_bill" >
					  <tr>								  
                         <td width="23%" class="narmal">Select Building</td>
						 <td>:</td>
                         <td width="77%" class="narmal"><select name="es_buldname" ><option value="">-- Select --</option>
			<?php foreach($getbuldinglist as $eachrecord) { ?>
			<option value="<?php echo $eachrecord['es_hostelbuldid'];?>"<?php echo ($eachrecord['es_hostelbuldid'] ==$es_buldname)?"selected":""?>><?php echo $eachrecord['buld_name'];?></option>
			<?php } ?>
			</select></td>
                      </tr>
					  <tr class="narmal">
			
			<td align="left" class="narmal" width="23%">Select Year            </td>
			<td>:</td>
			<td align="left" class="narmal" width="77%"><select name="selyear" style="width:100px;">
			  <option value="">-- Select --</option>
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
			
		  </tr>	
		   <tr>								  
                         <td align="left" class="narmal" width="23%">Select Month</td>
						 <td>:</td>
			<td align="left" class="narmal" width="77%"><select name="selmonth" style="width:100px;">
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
                      </tr>
					  
					  <tr>								  
                         <td>Payment Status</td>
						 <td>:</td>
					     <td><select name="balance" style="width:100px;">
						 <option value="">-- Select --</option>
						<option value="paid" <?php if($balance=='paid') { echo "selected='selected'"; } ?>>Paid</option>
						<option value="unpaid" <?php if($balance=='unpaid') { echo "selected='selected'"; } ?>>Unpaid</option>
						</select></td>                    
                      </tr>	
					  			
				     <tr>								  
                         <td>&nbsp;</td>
					     <td>&nbsp;</td> 
						   <td>&nbsp;</td> 
						                    
                      </tr>				  
				     <tr>				
					  <td align="right"></td>
					    <td>&nbsp;</td> 
					     <td align="left">&nbsp;<input type="submit" name="search_hostel_charges" value="Search" class="bgcolor_02" />&nbsp;&nbsp;&nbsp;&nbsp;<input name="export_hostel_charges" style="cursor:pointer"   type="submit" class="bgcolor_02" value="Export to Excel Sheet" /></td>
				    </tr>
					<tr>
					     <td>&nbsp;</td>
						 <td>&nbsp;</td>
						   <td>&nbsp;</td> 
					</tr>
					</form> 
				</table></td>
                  </tr><?php */?>
				   <tr>
                    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                     <tr height="25" class="bgcolor_02">
					 		<td align="center" valign="middle">S.No</td>
							<td align="center" valign="middle">Building Name</td>
							<td align="center" valign="middle">Room Type/<br />Number</td>
							<td align="center" valign="middle">Month</td>
							<td align="center" valign="middle">Bill Amount</td>
							<td align="center" valign="middle">Waived</td>
							<td align="center" valign="middle">Paid Amount</td>
							<td align="center" valign="middle">Action</td>
					 
					 </tr> 
					 <?php if(count($charges_details)>0){
					$irow=$start;
					$total_room_rate = 0;
					$total_deduction = 0;
					$total_amount_paid =0;
					foreach($charges_details as $eachrecord){
					$irow++;
					if($irow%2==0)
						$rowclass = "even";
						else
						$rowclass = "odd";
					
					 ?>
                    <tr height="25" class="<?php echo $rowclass;?>">
                      <td width="4%" align="left" valign="top" class="narmal">&nbsp;<?php echo $irow; ?></td>
                   
                      <td width="15%" align="left" valign="top" class="narmal"><?php echo $eachrecord['buidingname']; ?></td>
                      <td width="13%" align="left" valign="top" class="narmal"><?php echo $eachrecord['room_type'].'<br>'.$eachrecord['room_no']; ?></td>
					  
					  <td width="10%" align="left" valign="top" class="narmal"><?php if($eachrecord['due_month']!='0000-00-00'){echo func_date_conversion("Y-m-d","d/m/Y",$eachrecord['due_month']); }?></td>
					  <td width="14%" align="right" valign="top" class="narmal"><?php if($eachrecord['room_rate']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['room_rate'], 2, '.', '');}?></td>
					  <td width="13%" align="right" valign="top" class="narmal"><?php if($eachrecord['deduction']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['deduction'], 2, '.', '');}?></td>
					  <td width="19%" align="right" valign="top" class="narmal"><?php if($eachrecord['amount_paid']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['amount_paid'], 2, '.', '');}?></td>
                      <td width="12%" align="left" valign="top" class="narmal">
                       
					
<?php /*?>/*es_hostel_charges_id es_personid*/ ?>

  <a href="?pid=47&action=view_allotment_details&chgid=<?php echo $eachrecord['es_hostel_charges_id']; ?>&start=<?php echo $start.$PageUrl;?>" ><img src="images/b_browse.png" border="0" title="View" alt="View" /></a>&nbsp;
 <?php if( $eachrecord['balance']==0){?><a href="javascript: void(0)" onclick="popup_letter('?pid=47&action=receipt&chgid=<?php echo $eachrecord['es_hostel_charges_id']; ?>&start=<?php echo $start.$PageUrl;?>')" ><img src="images/print_16.png" border="0" title="Print Recipt" alt="Print Recipt" /></a><?php }?>			  </td>
                    </tr>       
                    
					<?php 
					$total_room_rate += $eachrecord['room_rate'];
					$total_deduction += $eachrecord['deduction'];
					$total_amount_paid +=$eachrecord['amount_paid'];
					}?>
					<tr height="25" class="admin">
					 		<td align="center" valign="middle"></td>
							
							<td align="center" valign="middle"></td>
							<td align="center" valign="middle">Total</td>
							
							<td align="center" valign="middle"></td>
					  <td align="right" valign="middle"><?php if($total_room_rate>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($total_room_rate, 2, '.', '');}?></td>
					  <td align="right" valign="middle"><?php if($total_deduction>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($total_deduction, 2, '.', '');}?></td>
					  <td align="right" valign="middle"><?php if($total_amount_paid>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($total_amount_paid, 2, '.', '');}?></td>
							<td align="left" valign="middle"></td>
					 
					 </tr>
					
					<tr height="25">
                      <td align="center" colspan="10"><?php paginateexte($start, $q_limit, $no_rows, 'action='.$action.$PageUrl);?></td>
                    </tr>
					<tr height="25">
                      <td align="right" colspan="10" style="padding:10px"></td>
                    </tr>
					
					<?php  } else { ?> 
					 <tr height="25">
                      <td align="center" colspan="10">No Records Found</td>
                    </tr>
                    
                    <?php }  ?>
				</table></td>
                  </tr>
				  
				
                </table></td>
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
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Hostel Charges Receipt</strong></td>
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
											<td width="73%" align="left" valign="middle"><?php echo $payamount_details['es_hostel_charges_id']?></td>
										  </tr>
										  <tr>
											
											<td width="25%" height="25" align="left" valign="middle" class="admin">Buidling&nbsp;Name</td>
											<td width="2%" align="left" valign="middle" class="admin">:</td>
											<td width="73%" align="left" valign="middle"><?php echo ucwords($payamount_details['buidingname']);?></td>
										  </tr>
										  <tr>
										
											<td height="25" align="left" valign="middle" class="admin">Room&nbsp;No</td>
											<td align="left" valign="middle" class="admin">:</td>
											<td align="left" valign="middle"><?php echo $payamount_details['room_no'];?></td>
										</tr>
										<tr>
											
											<td height="25" align="left" valign="middle" class="admin">Room&nbsp;Type</td>
											<td align="left" valign="middle" class="admin">:</td>
											<td align="left" valign="middle"><?php echo ucwords($payamount_details['room_type']);?></td>
										</tr>
										</table></td>
									<td><table width="100%" border="0">
										  <tr>
												
												<td width="25%" height="25" align="left" valign="middle" class="admin">Receipt&nbsp;Date</td>
												<td width="2%" align="left" valign="middle" class="admin">:</td>
												<td width="73%" align="left" valign="middle"><?php if($payamount_details['paid_on']!='0000-00-00'){echo func_date_conversion("Y-m-d","d/m/Y",$payamount_details['paid_on']);}?></td>
										  </tr>
										  <tr>
												
												<td width="25%" height="25" align="left" valign="middle" class="admin">Person&nbsp;Type</td>
												<td width="2%" align="left" valign="middle" class="admin">:</td>
												<td width="73%" align="left" valign="middle"><?php echo ucfirst($payamount_details['es_persontype']);?></td>
										  </tr>
										  <tr>
											
											<td height="25" align="left" valign="middle" class="admin">Registration&nbsp;No</td>
											<td align="left" valign="middle">:</td>
											<td align="left" valign="middle"><?php echo $payamount_details['es_personid'];?></td>
										</tr>
										<tr>
											
											<td height="25" align="left" valign="middle" class="admin">Person&nbsp;Name</td>
											<td align="left" valign="middle" class="admin">:</td>
											<td align="left" valign="middle"><?php  if($payamount_details['es_persontype'] == 'student')
											  { 
												$stud_details = get_studentdetails($payamount_details['es_personid']);
											  echo ucwords($stud_details['pre_name']);}
											   if($payamount_details['es_persontype'] == 'staff')
											  {
											   $staff_details = get_staffdetails($payamount_details['es_personid']);
											  echo ucwords($staff_details['st_firstname']." ".$staff_details['st_lastname']);}
											  ?></td>
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
								<td align="left"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($payamount_details['dueamount'], 2, '.', '');?></td>
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
<?php if($action=='view_allotment_details') { 
//array_print($_GET);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;View Hostel Charges</strong></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top">
				        <form action="" method="post" name="de_allocate_room_form">
						<table width="100%" cellpadding="0" cellspacing="0">
							<tr>
							    <td width="15%" height="25" align="left" valign="middle"></td>
								<td width="20%" height="25" align="left" valign="middle" class="admin">Buidling Name</td>
								<td width="2%" align="left" valign="middle" class="admin">:</td>
								<td width="63%" align="left" valign="middle"><?php echo ucwords($payamount_details['buidingname']);?></td>
							</tr>
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin">Room Type</td>
								<td align="left" valign="middle" class="admin">:</td>
								<td align="left" valign="middle"><?php echo ucwords($payamount_details['room_type']);?></td>
							</tr>
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin">Room No</td>
								<td align="left" valign="middle" class="admin">:</td>
								<td align="left" valign="middle"><?php echo $payamount_details['room_no'];?></td>
							</tr>
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin">Person Type</td>
								<td align="left" valign="middle" class="admin">:</td>
								<td align="left" valign="middle"><?php echo ucfirst($payamount_details['es_persontype']);?></td>
							</tr>
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin">Registration No</td>
								<td align="left" valign="middle">:</td>
								<td align="left" valign="middle"><?php echo $payamount_details['es_personid'];?></td>
							</tr>
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin">Person Name</td>
								<td align="left" valign="middle" class="admin">:</td>
								<td align="left" valign="middle"><?php  if($payamount_details['es_persontype'] == 'student')
					  { 
					    $stud_details = get_studentdetails($payamount_details['es_personid']);
					  echo ucwords($stud_details['pre_name']);}
					   if($payamount_details['es_persontype'] == 'staff')
					  {
					   $staff_details = get_staffdetails($payamount_details['es_personid']);
					  echo ucwords($staff_details['st_firstname']." ".$staff_details['st_lastname']);}
					  ?></td>
							</tr>
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin">Allocated On</td>
								<td align="left" valign="middle" class="admin">:</td>
							  <td align="left" valign="middle"><?php 
							  
							  echo func_date_conversion("Y-m-d","d/m/Y",$payamount_details['alloted_date']);?></td>
							</tr>
							<?php if($payamount_details['dealloted_date']!="" && $payamount_details['dealloted_date']!='0000-00-00'){?>
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin">De-allocated On</td>
								<td align="left" valign="middle" class="admin">:</td>
							  <td align="left" valign="middle"><?php 
							 
							  
							  echo func_date_conversion("Y-m-d","d/m/Y",$payamount_details['dealloted_date']);?></td>
							</tr>
							<?php }?>
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin">Amount Due</td>
								<td align="left" valign="middle" class="admin">:</td>
								<td align="left" valign="middle"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($payamount_details['dueamount'], 2, '.', '');?></td>
							</tr>
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin">Paid Amount </td>
								<td align="left" valign="middle" class="admin">:</td>
								<td align="left" valign="middle"><?php if($payamount_details['amount_paid']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($payamount_details['amount_paid'], 2, '.', '');}else{echo "---";}?></td>
							</tr>
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin">Waived Amount </td>
								<td align="left" valign="middle" class="admin">:</td>
								<td align="left" valign="middle"><?php if($payamount_details['deduction']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($payamount_details['deduction'], 2, '.', '');}else{echo "---";}?></td>
							</tr>
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin">Balance</td>
								<td align="left" valign="middle" class="admin">:</td>
								<td align="left" valign="middle"><font color="#FF0000"><?php if($payamount_details['balance']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($payamount_details['balance'], 2, '.', '');}else{echo "---";}?></font></td>
							</tr>
							<tr>
                             <td height="40" colspan="4" align="left" valign="middle" class="adminfont">&nbsp;&nbsp;<strong>Item Issued </strong></td>
                           </tr>
						   <tr>
                             <td height="40" colspan="4" align="left" valign="middle">
							 		<table width="100%" border="0" cellspacing="0" cellpadding="0" bordercolor="#CCCCCC">
                        <tr height="25" class="bgcolor_02">
                          <td width="5%" height="20" class="bgcolor_02"><strong>&nbsp;S No </strong></td>
                          <td width="19%" class="bgcolor_02"><strong>&nbsp;&nbsp;Item Code </strong></td>
                          <td width="21%" class="bgcolor_02"><strong>&nbsp;Item Name </strong></td>
                          <td width="11%" class="bgcolor_02"><strong>&nbsp;&nbsp;Qty</strong></td>
                          <td width="18%" class="bgcolor_02"><strong>&nbsp;&nbsp;Date of Issue </strong></td>
						   <td width="26%" class="bgcolor_02"><strong>&nbsp;&nbsp;Returned On </strong></td>
                        </tr>
						<?php 
						if(count($es_roomDetails)>=1){
						$i=0;
						foreach($es_roomDetails as $eachrecord) { ?>
                        <tr>
                          <td class="narmal"><?php echo ++$i;?></td>
                          <td class="narmal"><?php echo $eachrecord['h_item_code'];?></td>
                          <td class="narmal"><?php echo $eachrecord['h_item_name'];?></td>
                          <td class="narmal"><?php echo $eachrecord['hostelperson_itemqty'];?></td>
                          <td class="narmal"><?php echo displaydate($eachrecord['hostelperson_itemissued']);?></td>
						  <td class="narmal"><?php if($eachrecord['return_on']!='0000-00-00'){echo func_date_conversion("Y-m-d","d/m/Y",$eachrecord['return_on']);}?></td>
                        </tr>
						<?php } }else{?>
						<tr><td colspan="6" align="center" class="admin">No Items Issued</td></tr>
						<?php }?>                       
                    </table>
							 </td>
                           </tr>
							
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin"></td>
								<td align="left" valign="middle" class="admin"></td>
								
								<td align="left" valign="middle"><a href="?pid=47&action=viewdetails&start=<?php echo $start.$PageUrl;?>" class="bgcolor_02" style="padding:3px; text-decoration:none;">Back</a></td>
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
