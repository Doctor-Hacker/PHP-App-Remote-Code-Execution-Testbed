<?php 
/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}

?>
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

<?php
// fine Master
	if($action=='addfine')
	{
			        if(count($fine_master_det)>=1){
					$fine_amount = $fine_master_det['fine_amount'];
				    $fine_type = $fine_master_det['fine_type'];
				    $es_fine_masterid = $fine_master_det['es_fine_masterid'];
			        }
	
?>	
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
         <td height="3" colspan="3"></td>
	 </tr>
	  <tr>
		<td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span id="internal-source-marker_0.5963001342130408">Late Fee Fine</span></td>
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
		<form action="" method="post" name="allowenceform">
		  <table width="90%" border="0" cellspacing="2" cellpadding="2">
		   <tr>
			<td width="35%" align="left" class="adminfont">Fine Amount</td>
			<td width="1%" align="left">:</td>
    <td width="64%" align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td align="left" width="26%"><input name="fine_amount" type="text" size="6" maxlength="8" value="<?php echo round($fine_amount,2); ?>" />&nbsp;<font color="#FF0000"><b>*</b></font></td>
					<td align="left" width="74%"><?php /*?><select name="fine_type" />
			<option <?php if($fine_type =='Percentage')echo "selected='selected'";?> value="Percentage">Percentage</option>
			<option <?php if($fine_type=='Amount')echo "selected='selected'";?> value="Amount">Amount</option>			
			</select><?php */?></td>
			    </tr>
				</table>
			</td>
		  </tr>
		  <tr>
		    <td colspan="3" class="adminfont" align="center">
			<input type="hidden" name="fmid" value="<?php echo $es_fine_masterid;?>"  />
			<?php if(in_array('2_18',$admin_permissions)){?><input type="submit" name="save_fine" value="Submit" class="bgcolor_02" style="cursor:pointer;"/>&nbsp;<input type="reset" name="reset" value="Reset" class="bgcolor_02" style="cursor:pointer;"/><?php }?>
			&nbsp;</td>
		  </tr>
		  <tr>
		    <td colspan="3" class="adminfont" align="center">&nbsp;</td>
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
// End of fine Master	
?>
<?php
// fine Master
	if($action=='add_lastdate')
	{
?>	
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
         <td height="3" colspan="3"></td>
	 </tr>
	  <tr>
		<td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Fee Due Date </span></td>
	  </tr>
	  
      <tr>
		<td width="1" class="bgcolor_02"></td>
		<td   class="narmal" align="right"><br />
        </td>
        <td width="1" class="bgcolor_02"></td>
      </tr>
	  <tr>
		<td width="1" class="bgcolor_02"></td>
		<td   class="narmal" align="right">
        </td>
        <td width="1" class="bgcolor_02"></td>
      </tr>
	  <tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="left" valign="top">
		<table width="100%" border="0">
		
		  <tr>
			<td>
			
	<form action="index.php?pid=79&action=add_lastdate" method="post" name="add_lastdate">		
	<table width="100%" border="0">
	
 
  <tr>
    <td>&nbsp;</td>
    <td align="right" valign="middle">Academic Year</td>
    <td>:</td>
    <td align="left" valign="baseline"><select name="pre_year" style="width:180px;">
						<?php  foreach($school_details_res as $each_record) { ?>
						<option value="<?php echo $each_record['es_finance_masterid']; ?>" <?php if ($each_record['es_finance_masterid']==$pre_year) {                echo "selected"; }?>><?php echo displaydate($each_record['fi_startdate'])." To ".displaydate($each_record['fi_enddate']); ?>						</option>
				<?php } ?>
				</select>	</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right" valign="middle"></td>
    <td></td>
    <td align="left" valign="baseline">
	<?php if(in_array('2_19',$admin_permissions)){?><input type="submit" name="search_fee" value="submit" class="bgcolor_02" /><?php }?>
	</td>
    <td>&nbsp;</td>
    <td></td>
  </tr>
</table>
</form>
</td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
		  </tr>
          <?php if(isset($pre_year) && $pre_year>=1){?>
		  <tr>
			<td align="center">
				<form action="?pid=79&action=add_lastdate&search_fee=submit<?php echo $PageUrl;?>" method="post" name="allowenceform">
		        <table width="60%" border="0" cellspacing="2" cellpadding="2">
		     <tr class="bgcolor_02" height="25">
			<td align="left" valign="middle" class="adminfont">Month</td>
			<td align="left" valign="middle" class="adminfont">Last Date</td>
		  </tr>
          
          
					<?php 
					
					
					for($i=0;$i<12;$i++){ 
					$st= $i+1; 
					$newa ='ins_last_date'.$i;
					$hiden ='inst_id'.$i;
					
					
					$last_dateqry = "SELECT * FROM es_fee_inst_last_date WHERE es_finance_masterid=".$pre_year." AND instalment_no=".$st."";
					$last_date_det = $db->getrow($last_dateqry);
					
					
					?>
					<input type="hidden" name="<?php echo $hiden;?>" value="<?php echo $last_date_det['inst_id'];?>"  />
					  <tr class="even">
					    <td width="35%"> <?php echo $month_arr[$st];?> </td>
						<td width="65%"><input type="text" name="<?php echo $newa; ?>" 
                        value="<?php if(isset($_POST[$newa]) && $_POST[$newa]!="" && $_POST[$newa]!='ins_last_date'.$i){echo $_POST[$newa];}
						if($last_date_det['last_date']!='0000-00-00'){echo func_date_conversion("Y-m-d","d/m/Y",$last_date_det['last_date']);}?>" size="10" /><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.allowenceform.ins_last_date<?php echo $i; ?>);return false;" ><img src="<?php echo JS_PATH ?>/WeekPicker/calbtn.gif" alt="Calender" name="popcal" width="34" height="22" border="0" align="absmiddle" id="popcal" /></a></td>
					  </tr>
					  <?php }?>
					
		 
		  
			
		 
          
		
		  <tr>
		    <td colspan="3" class="adminfont" align="center">
			<input type="hidden" name="pre_year" value="<?php echo $pre_year;?>"  />
			<input type="submit" name="save_fine" value="Submit" class="bgcolor_02" style="cursor:pointer;"/>&nbsp;<!--<input type="reset" name="reset" value="Reset" class="bgcolor_02" style="cursor:pointer;"/>-->&nbsp;</td>
		  </tr>
          <?php }?>
		  <tr>
		    <td colspan="3" class="adminfont" align="center">&nbsp;</td>
	      </tr>		 
		</table>
		        </form>
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
	<iframe width=199 height=178 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="<?php echo JS_PATH ?>/WeekPicker/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">										</iframe>
<?php
	}		
// End of providing last dates	
?>
<?php
// Add other fine 
	if($action=='add_otherfines')
	{
?>	
<script language = "Javascript">
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
                  //activatePermission();
            }
			

</script>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
         <td height="3" colspan="3"></td>
	 </tr>
	  <tr>
		<td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Add Misc. Fine to Students</span></td>
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
                <td align="right" valign="middle">Fine Type</td>
                <td>:</td>
                <td align="left" valign="middle"><?php echo $html_obj->draw_inputfield('fine_name','','','');?>&nbsp;<font color="#FF0000" size="2"><b>*</b></font></td>
                <td>&nbsp;</td>
                <td></td>
              </tr>
			  <tr>
                <td>&nbsp;</td>
                <td align="right" valign="middle">Amount</td>
                <td>:</td>
                <td align="left" valign="middle">
				
				
				<?php echo $html_obj->draw_inputfield('fine_amount','','','');?>&nbsp;<font color="#FF0000" size="2"><b>*</b></font></td>
                <td>&nbsp;</td>
                <td></td>
              </tr>	
			  <tr>
                <td>&nbsp;</td>
                <td align="right" valign="middle">Date</td>
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
									echo $eachrecord['pre_name'].'<br>  ('. $gender." ".ucfirst($eachrecord['pre_fathername']).')';?>	
                                    
                          <br />Reg id:<?php echo $eachrecord['es_preadmissionid'];?><br />Roll No:<?php 
		$online_sql="select * from es_sections_student where student_id=".$eachrecord['es_preadmissionid'];
	                                    $online_row=$db->getRow($online_sql);
														
					echo $online_row['roll_no'];?>                                    </td>
								  </tr>
								</table>                            </td>
							  <?php $i++;}}?>
							</tr>
						</table>				</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td colspan="3" align="center"><?php if(in_array('6_14',$admin_permissions)){?>

	              <input type="submit" name="add_otherfee_submit" value="submit" class="bgcolor_02" />	              <?php }?>
	              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
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
		<td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Misc. Fine charged Students</span></td>
	  </tr>
	   <tr height="25">
			    <td class="bgcolor_02" ></td>
                <td  valign="middle" class="narmal" align="right">
				<form action="index.php?pid=79&action=view_list" name="fee_search" method="post">
				<table width="100%" border="0">
				  <tr>
					<td>
					<table width="100%" border="0">
					  <tr>
						<td align="left" valign="middle">Fine Charged From</td>
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
						<td align="left" valign="middle">Fine Type</td>
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
					<td align="left" height="25">             	<ul><b><u>NOTE:</u></b>
				<li>Students who are displayed in Red are Transferred Students.</li>
				
			</ul></td>
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
    <td align="center" valign="middle">S.No</td>
    <td align="center" valign="middle">Student Name<br />
      [Registration No]</td>
    <td align="center" valign="middle">Class</td>
    <td align="center" valign="middle">Fine Type</td>
	<td align="center" valign="middle">Date</td>
	<td align="center" valign="middle">Fine Charged</td>
    <td align="center" valign="middle">Fine Paid</td>
	<td align="center" valign="middle">Paid On</td>
    <td align="center" valign="middle">Fine waived</td>
    <td align="center" valign="middle">Action</td>
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
    <td height="15" align="left" valign="middle">&nbsp;<?php 
	
			$online_sql="select * from es_sections_student where student_id=".$eachrecord['es_preadmissionid'];
	                                    $online_row=$db->getRow($online_sql);
					 echo ucfirst($eachrecord['pre_name']) ."<br>[ ".$eachrecord['es_preadmissionid']." ]"; ?>/[<?php  echo $online_row['roll_no']; ?> ]
		  </td>
        <?php }else{
		?>
        <td height="15" align="left" valign="middle" bgcolor="#FF0000">&nbsp;<?php 
	
			$online_sql="select * from es_sections_student where student_id=".$eachrecord['es_preadmissionid'];
	                                    $online_row=$db->getRow($online_sql);
					 echo ucfirst($eachrecord['pre_name']) ."<br>[ ".$eachrecord['es_preadmissionid']." ]"; ?>/[<?php  echo $online_row['roll_no']; ?> ]					 </td>
        <?php }?>   
    
    
    
<?php /*?>    
    <td height="15" align="left" valign="middle">&nbsp;<?php echo ucfirst($eachrecord['pre_name']) ."<br>[ ".$eachrecord['es_preadmissionid']." ]"; ?></td><?php */?>
    <td height="15" align="left" valign="middle">&nbsp;<?php echo classname($eachrecord['pre_class']); ?></td>
	<td height="15" align="left" valign="middle">&nbsp;<?php echo ucfirst($eachrecord['fine_name']); ?></td>
	<td height="15" align="left" valign="middle">&nbsp;<?php if($eachrecord['created_on']!='0000-00-00'){echo func_date_conversion("Y-m-d","d/m/Y",$eachrecord['created_on']);} ?></td>
    <td height="15" align="left" valign="middle">&nbsp;
   
      <?php if($eachrecord['fine_amount']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['fine_amount'], 2, '.', '');}  ?></td>
    <td height="15" align="left" valign="middle">&nbsp;
      <?php if($eachrecord['paid_amount']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['paid_amount'], 2, '.', '');}else{echo '---';}  ?></td>
	  <td height="15" align="left" valign="middle">&nbsp;<?php if($eachrecord['paid_on']!='0000-00-00'){echo func_date_conversion("Y-m-d","d/m/Y",$eachrecord['paid_on']);} else{echo '---';}?></td>
    <td height="15" align="left" valign="middle">&nbsp;
      <?php if($eachrecord['deduction_allowed']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['deduction_allowed'], 2, '.', '');}else{echo '---';}?></td>
    <td height="15" align="left" valign="middle">
	<?php if(in_array('6_15',$admin_permissions)){?>
<a href="?pid=79&action=view_student_details&sid=<?php echo $eachrecord['es_preadmissionid']; ?>&ofid=<?php echo $eachrecord['otherfine_id']; ?>&start=<?php echo $start;?>" ><img src="images/b_browse.png" border="0" title="View" alt="View" /></a><?php }?>
	</td>
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
    <td width="86%" height="25" align="left" valign="middle"><?php if($fine_amount_total>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($fine_amount_total, 2, '.', '');}else{echo '---';}  ?></td>
  </tr>
  <tr>
    <td height="25" align="left" valign="middle">Fine Paid</td>
    <td height="25" align="left" valign="middle">:</td>
    <td height="25" align="left" valign="middle"><?php if($paid_amount_total>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($paid_amount_total, 2, '.', '');}else{echo '---';}  ?></td>
  </tr>
  <tr>
    <td height="25" align="left" valign="middle">Remaining</td>
    <td height="25" align="left" valign="middle">:</td>
    <td height="25" align="left" valign="middle"><?php 
	$remaining = $fine_amount_total-$paid_amount_total;
	
	if($remaining>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($remaining, 2, '.', '');}else{echo '---';}  ?></td>
  </tr>
  <tr>
    <td height="25" align="left" valign="middle">Fine Waived</td>
    <td height="25" align="left" valign="middle">:</td>
    <td height="25" align="left" valign="middle"><?php if($deduction_allowed_total>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($deduction_allowed_total, 2, '.', '');}else{echo '---';}  ?></td>
  </tr>
  <tr>
    <td height="25" align="left" valign="middle">Balance</td>
    <td height="25" align="left" valign="middle">:</td>
    <td height="25" align="left" valign="middle"><font color="#FF0000"><b>
      <?php 
	$Balance = $remaining-$deduction_allowed_total;
	
	if($Balance>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($Balance, 2, '.', '');}else{echo "---";}  ?>
    </b></font></td>
  </tr>
  <tr>
    <td height="25" align="left" valign="middle">&nbsp;</td>
    <td height="25" align="left" valign="middle">&nbsp;</td>
    <td height="25" align="left" valign="middle">
	<?php if(in_array('6_16',$admin_permissions)){?>
<a href="javascript: void(0)" onclick="popup_letter('?pid=79&action=print_list<?php echo $PageUrl;?>')" ><img src="images/print_16.png" border="0" title="Print Recipt" alt="Print Recipt" /></a><?php }?>	</td>
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
	echo "Active"; } else { echo "Transfered";}?></td>
  </tr>
</table>

			</td></tr>
  <tr class="bgcolor_02" height="25">
    <td align="left" valign="middle">S.No</td>
    <td align="left" valign="middle">Fine Type</td>
    <td align="left" valign="middle">Charged On</td>
    <td align="left" valign="middle">Fine Amount</td>
    <td align="left" valign="middle">Fine Paid</td>
	<td align="left" valign="middle">Paid On</td>
    <td align="left" valign="middle">Fine waived</td>
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
    <td height="15" align="left" valign="middle">&nbsp;
      <?php if($eachrecord['fine_amount']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['fine_amount'], 2, '.', '');}  ?></td>
    <td height="15" align="left" valign="middle">&nbsp;
      <?php if($eachrecord['paid_amount']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['paid_amount'], 2, '.', '');}else{echo '---';}  ?></td>
	   <td height="15" align="left" valign="middle">&nbsp;<?php if($eachrecord['paid_on']!='0000-00-00'){echo func_date_conversion("Y-m-d","d/m/Y",$eachrecord['paid_on']); }else{echo '---';}?></td>
    <td height="15" align="left" valign="middle">&nbsp;
      <?php if($eachrecord['deduction_allowed']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['deduction_allowed'], 2, '.', '');}else{echo '---';}?></td>
    <td height="15" align="left" valign="middle">
	<?php if( $eachrecord['balance']!=0){?>
					  <a href="?pid=79&action=payamount&ofid=<?php echo $eachrecord['otherfine_id']; ?>" ><img src="images/pay_balance_16.png" border="0" title="Pay Amount" alt="Pay Amount" /></a>&nbsp;
					  <?php }if( $eachrecord['balance']==0){?>
					 
					  <a href="javascript: void(0)" onclick="popup_letter('?pid=79&action=receipt&ofid=<?php echo $eachrecord['otherfine_id']; ?>')" ><img src="images/print_16.png" border="0" title="Print Recipt" alt="Print Recipt" /></a>
	
					 &nbsp;&nbsp;<a href="javascript: void(0)" onclick="popup_letter('?pid=79&action=receiptpayment&ofid=<?php echo $eachrecord['otherfine_id']; ?>')" ><img src="images/b_browse.png" border="0" title="Print Payment Recipt" alt="Print Payment Recipt" /></a><a href="javascript: void(0)" onclick="popup_letter('?pid=105&action=receiptpayment&ofid=<?php echo $eachrecord['exam_fee_id']; ?>')" ></a>
					  <?php }?>
					  
	</td>
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
	<td></td>
    <td><?php if($tot_deduction_allowed>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($tot_deduction_allowed, 2, '.', '');}  ?></td>
    <td></td>
  </tr>
   <tr height="25">
    <td colspan="8">
	<table width="100%" border="0">
  <tr>
    <td width="13%" align="left" valign="middle">Total</td>
    <td width="1%" align="left" valign="middle">:</td>
    <td width="86%" align="left" valign="middle"><?php if($tot_fine_amount>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($tot_fine_amount, 2, '.', '');}else{echo '---';}  ?></td>
  </tr>
  <tr>
    <td align="left" valign="middle">Fine Paid</td>
    <td align="left" valign="middle">:</td>
    <td align="left" valign="middle"><?php if($tot_paid_amount>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($tot_paid_amount, 2, '.', '');} else{echo '---';} ?></td>
  </tr>
  <tr>
    <td align="left" valign="middle">Remaining</td>
    <td align="left" valign="middle">:</td>
    <td align="left" valign="middle"><?php 
	$remaining = $tot_fine_amount-$tot_paid_amount;
	
	if($remaining>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($remaining, 2, '.', '');} else{echo '---';} ?></td>
  </tr>
  <tr>
    <td align="left" valign="middle">Fine Waived</td>
    <td align="left" valign="middle">:</td>
    <td align="left" valign="middle"><?php if($tot_deduction_allowed>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($tot_deduction_allowed, 2, '.', '');}else{echo '---';}  ?></td>
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
    <td align="left" valign="middle"><a href="javascript: void(0)" onclick="popup_letter('?pid=79&action=print_student_details&sid=<?php echo $sid; ?>')" ><img src="images/print_16.png" border="0" title="Print Recipt" alt="Print Recipt" /></a></td>
  </tr>
</table>
	</td>
  </tr>
   <tr height="25">
    <td colspan="8" align="center"><a href="index.php?pid=79&action=view_list&start=<?php echo $start;?>" class="bgcolor_02" style="padding:4px; text-decoration:none;">Back to Search</a></td>
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
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Pay Fine </strong></td>
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
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Fine Charges Receipt</strong></td>
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
											<td width="73%" align="left" valign="middle"><?php echo $payamount_details['otherfine_id']?></td>
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
										</table></td>	
									
								  </tr>
								</table>

						</td>
					  </tr>
					  <tr>
						<td><table width="100%" border="0">
							  <tr class="admin">
								<td align="left">Fine Type</td>
								<td height="25" align="left">Fine Amount</td>
								<td align="left">Fine Waived</td>
								<td align="left">Amount Received</td>
							  </tr>
							  <tr>
								<td align="left"><?php 
								if($payamount_details['created_on']!='0000-00-00'){$charged_on = func_date_conversion("Y-m-d","d/m/Y",$payamount_details['created_on']);}
								echo ucwords($payamount_details['fine_name'])."<br>( ".$charged_on." )"; ?></td>
								<td height="25" align="left"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($payamount_details['fine_amount'], 2, '.', '');?></td>
								<td align="left"><?php if($payamount_details['deduction_allowed']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($payamount_details['deduction_allowed'], 2, '.', '');}?></td>
								<td align="left"><?php if($payamount_details['paid_amount']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($payamount_details['paid_amount'], 2, '.', '');}?></td>
							  </tr>
							</table>
                      </td>
					  </tr>
					  <tr>
						<td><table width="100%" border="0">
							  <tr>
								<td align="left" valign="middle"><b>Rupees : </b><?php echo $payamount_details['remarks'];?></td>
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
		<td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Other Fine Details </span></td>
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
</table>

			</td></tr>
  <tr class="bgcolor_02" height="25">
    <td align="left" valign="middle">S.No</td>
    <td height="25" align="left" valign="middle">Fine Type</td>
    <td height="25" align="left" valign="middle">Charged On</td>
    <td align="left" valign="middle">Fine Amount</td>
    <td align="left" valign="middle">Fine Paid</td>
	<td align="left" valign="middle">Paid On</td>
    <td align="left" valign="middle">Fine waived</td>
   
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
    <td height="15" align="left" valign="middle">&nbsp;
      <?php if($eachrecord['fine_amount']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['fine_amount'], 2, '.', '');}  ?></td>
    <td height="15" align="left" valign="middle">&nbsp;
      <?php if($eachrecord['paid_amount']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['paid_amount'], 2, '.', '');}  ?></td>
	  <td height="15" align="left" valign="middle">&nbsp;<?php if($eachrecord['paid_on']!='0000-00-00'){echo func_date_conversion("Y-m-d","d/m/Y",$eachrecord['paid_on']); }?></td>
    <td height="15" align="left" valign="middle">&nbsp;
      <?php if($eachrecord['deduction_allowed']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['deduction_allowed'], 2, '.', '');}?></td>
   
  </tr>
  <?php  $slno++;
         $tot_fine_amount +=$eachrecord['fine_amount'];
		 $tot_paid_amount +=$eachrecord['paid_amount'];
		 $tot_deduction_allowed +=$eachrecord['deduction_allowed'];
  
  }?>
  <tr height="25">
    <td align="left" valign="middle"></td>
    <td align="left" valign="middle"></td>
    <td align="left" valign="middle"><b>Total:</b></td>
    <td align="left" valign="middle"><?php if($tot_fine_amount>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($tot_fine_amount, 2, '.', '');}  ?></td>
    <td align="left" valign="middle"><?php if($tot_paid_amount>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($tot_paid_amount, 2, '.', '');}  ?></td>
	 <td align="left" valign="middle"></td>
    <td align="left" valign="middle"><?php if($tot_deduction_allowed>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($tot_deduction_allowed, 2, '.', '');}  ?></td>
   
  </tr>
   <tr height="25">
    <td colspan="7">
	<table width="100%" border="0">
  <tr>
    <td width="13%" height="25" align="left" valign="middle">Total</td>
    <td width="1%" height="25" align="left" valign="middle">:</td>
    <td width="86%" height="25" align="left" valign="middle"><?php if($tot_fine_amount>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($tot_fine_amount, 2, '.', '');}  ?></td>
  </tr>
  <tr>
    <td height="25" align="left" valign="middle">Fine Paid</td>
    <td height="25" align="left" valign="middle">:</td>
    <td height="25" align="left" valign="middle"><?php if($tot_paid_amount>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($tot_paid_amount, 2, '.', '');}  ?></td>
  </tr>
  <tr>
    <td height="25" align="left" valign="middle">Remaining</td>
    <td height="25" align="left" valign="middle">:</td>
    <td height="25" align="left" valign="middle"><?php 
	$remaining = $tot_fine_amount-$tot_paid_amount;
	
	if($remaining>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($remaining, 2, '.', '');}  ?></td>
  </tr>
  <tr>
    <td height="25" align="left" valign="middle">Fine Waived</td>
    <td height="25" align="left" valign="middle">:</td>
    <td height="25" align="left" valign="middle"><?php if($tot_deduction_allowed>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($tot_deduction_allowed, 2, '.', '');}  ?></td>
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
		<td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Other Fine charged Students</span></td>
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
    <td width="4%" align="center" valign="middle">S.No</td>
    <td width="13%" align="center" valign="middle">Student Name<br />
      [Registration No]</td>
    <td width="7%" align="center" valign="middle">Class</td>
    <td width="7%" align="center" valign="middle">Fine Type</td>
	<td width="10%" align="center" valign="middle">Date</td>
	<td width="15%" align="center" valign="middle">Fine Charged</td>
    <td width="12%" align="center" valign="middle">Fine Paid</td>
	<td width="11%" align="center" valign="middle">Paid On</td>
    <td width="21%" align="center" valign="middle" colspan="2">Fine waived</td>
    
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
    <td height="15" align="left" valign="middle">&nbsp;<?php 
	
			$online_sql="select * from es_sections_student where student_id=".$eachrecord['es_preadmissionid'];
	                                    $online_row=$db->getRow($online_sql);
					 echo ucfirst($eachrecord['pre_name']) ."<br>[ ".$eachrecord['es_preadmissionid']." ]"; ?>/[<?php  echo $online_row['roll_no']; ?> ]
		  </td>
        <?php }else{
		?>
        <td height="15" align="left" valign="middle" bgcolor="#FF0000">&nbsp;<?php 
	
			$online_sql="select * from es_sections_student where student_id=".$eachrecord['es_preadmissionid'];
	                                    $online_row=$db->getRow($online_sql);
					 echo ucfirst($eachrecord['pre_name']) ."<br>[ ".$eachrecord['es_preadmissionid']." ]"; ?>/[<?php  echo $online_row['roll_no']; ?> ]					 </td>
        <?php }?>   
        
        
   <?php /*?> <td height="15" align="left" valign="middle">&nbsp;<?php echo ucfirst($eachrecord['pre_name']) ."<br>[ ".$eachrecord['es_preadmissionid']." ]"; ?></td><?php */?>
    <td height="15" align="left" valign="middle">&nbsp;<?php echo classname($eachrecord['pre_class']); ?></td>
	<td height="15" align="left" valign="middle">&nbsp;<?php echo ucfirst($eachrecord['fine_name']); ?></td>
	<td height="15" align="left" valign="middle">&nbsp;<?php if($eachrecord['created_on']!='0000-00-00'){echo func_date_conversion("Y-m-d","d/m/Y",$eachrecord['created_on']);} ?></td>
    <td height="15" align="left" valign="middle">&nbsp;
      <?php if($eachrecord['fine_amount']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['fine_amount'], 2, '.', '');}  ?></td>
    <td height="15" align="left" valign="middle">&nbsp;
      <?php if($eachrecord['paid_amount']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['paid_amount'], 2, '.', '');}else{echo '---';}  ?></td>
	  <td height="15" align="left" valign="middle">&nbsp;<?php if($eachrecord['paid_on']!='0000-00-00'){echo func_date_conversion("Y-m-d","d/m/Y",$eachrecord['paid_on']);}else{echo '---';}?></td>
    <td height="15" align="left" valign="middle" colspan="2">&nbsp;
      <?php if($eachrecord['deduction_allowed']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['deduction_allowed'], 2, '.', '');}else{echo '---';}?></td>
    
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
    <td width="86%" height="25" align="left" valign="middle"><?php if($fine_amount_total>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($fine_amount_total, 2, '.', '');} else{echo '---';} ?></td>
  </tr>
  <tr>
    <td height="25" align="left" valign="middle">Fine Paid</td>
    <td height="25" align="left" valign="middle">:</td>
    <td height="25" align="left" valign="middle"><?php if($paid_amount_total>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($paid_amount_total, 2, '.', '');} else{echo '---';} ?></td>
  </tr>
  <tr>
    <td height="25" align="left" valign="middle">Remaining</td>
    <td height="25" align="left" valign="middle">:</td>
    <td height="25" align="left" valign="middle"><?php 
	$remaining = $fine_amount_total-$paid_amount_total;
	
	if($remaining>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($remaining, 2, '.', '');}else{echo '---';}  ?></td>
  </tr>
  <tr>
    <td height="25" align="left" valign="middle">Fine Waived</td>
    <td height="25" align="left" valign="middle">:</td>
    <td height="25" align="left" valign="middle"><?php if($deduction_allowed_total>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($deduction_allowed_total, 2, '.', '');}else{echo '---';}  ?></td>
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
<?php
// List other fine 
	if($action=='view_oldbalances')
	{
?>	

	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
         <td height="3" colspan="3"></td>
	 </tr>
	  <tr>
		<td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">View Old Balances</span></td>
	  </tr>
	   <tr height="25">
			    <td class="bgcolor_02" ></td>
                <td  valign="middle" class="narmal" align="right">
				<form action="index.php?pid=79&action=view_oldbalances" name="fee_search" method="post">
				<table width="100%" border="0">
				  <tr>
					<td>
					<table width="100%" border="0">
					   <tr>
						<td align="left" valign="middle">Registration No</td>
						<td align="left" valign="middle">:</td>
						<td align="left" valign="middle"><?php echo $html_obj->draw_inputfield('sid','','','');?></td>
						<td align="left" valign="middle">Amount</td>
						<td align="left" valign="middle">:</td>
						<td align="left" valign="middle"><select name="symbol"><option value=">" <?php if($symbol=='>'){echo "selected='selected'";}?>>&gt;</option><option value="=" <?php if($symbol=='='){echo "selected='selected'";}?>>=</option><option value="<" <?php if($symbol=='<'){echo "selected='selected'";}?>>&lt;</option></select>&nbsp;<?php echo $html_obj->draw_inputfield('old_balance','','','');?></td>
					  </tr>
                      
					</table>

					</td>
				  </tr>
				  <tr>
					<td align="center"><input type="submit" name="search_oldbal" value="Search" class="bgcolor_02" style="cursor:pointer" /></td>
				  </tr>
				  <tr>
					<td align="center" height="25"></td>
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
    <td width="5%" align="left" valign="middle">S.No</td>
    <td width="24%" align="left" valign="middle">Student Name<br />
      [Registration No]</td>
    <td width="10%" align="left" valign="middle">Class</td>
   
	<td width="13%" align="left" valign="middle">Old Balance</td>
    <td width="14%" align="left" valign="middle">Paid Amount</td>
	
    <td width="16%" align="left" valign="middle">Waived</td>
    <td width="11%" align="left" valign="middle">Balance</td>
    <td width="7%" align="left" valign="middle">Action</td>
  </tr>
  <?php						
		 if(count($oldbalances_det)>0){
         $slno = $start+1;
		 $rw =1;
		 $fine_amount_total =0;
		 $paid_amount_total =0;
		 $deduction_allowed_total =0;
		 $paid_det['SUM(paid_amount)'] = 0;
		 $paid_det['SUM(waived_amount)'] = 0;
foreach ($oldbalances_det as $eachrecord)
      {
	if($slno%2==0)
		$rowclass = "even";
		else
		$rowclass = "odd";
		 
		$paid_det = $db->getrow("SELECT SUM(paid_amount) , SUM(waived_amount) FROM es_old_balances_paid  WHERE ob_id ='".$eachrecord['ob_id']."'");
		
?>       
  <tr class="<?php echo $rowclass;?>">
    <td height="15" align="left" valign="middle">&nbsp;<?php echo $slno;?></td>
    <td height="15" align="left" valign="middle">&nbsp;<?php echo ucfirst($eachrecord['pre_name']) ."&nbsp;[ ".$eachrecord['studentid']." ]"; ?></td>
    <td height="15" align="left" valign="middle">&nbsp;<?php echo classname($eachrecord['pre_class']); ?></td>

    <td height="15" align="left" valign="middle">&nbsp;
      <?php if($eachrecord['old_balance']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['old_balance'], 2, '.', '');}  ?></td>
    <td height="15" align="left" valign="middle">&nbsp;
      <?php 
	
	  if($paid_det['SUM(paid_amount)']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($paid_det['SUM(paid_amount)'], 2, '.', '');}  ?></td>
	  
    <td height="15" align="left" valign="middle">&nbsp;
      <?php if($paid_det['SUM(waived_amount)']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($paid_det['SUM(waived_amount)'], 2, '.', '');}?></td>
   
   <td height="15" align="left" valign="middle">&nbsp; <?php if($eachrecord['balance']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['balance'], 2, '.', '');}else{echo "---";}?></td>
    <td height="15" align="left" valign="middle">
	
<a href="?pid=79&action=view_old_det&sid=<?php echo $eachrecord['studentid']; ?>&ofid=<?php echo $eachrecord['ob_id']; ?>&start=<?php echo $start;?>" ><img src="images/b_browse.png" border="0" title="View" alt="View" /></a>
<?php if( $eachrecord['balance']>0){?>
					  <a href="?pid=79&action=pay_oldbalance&ofid=<?php echo $eachrecord['ob_id']; ?>" ><img src="images/pay_balance_16.png" border="0" title="Pay Amount" alt="Pay Amount" /></a>&nbsp;
					  <?php }?>
					 
					  
	</td>
  </tr>
  <?php $slno++;
         $fine_amount_total +=$eachrecord['old_balance'];
		 $paid_amount_total +=$paid_det['SUM(paid_amount)'];
		 $deduction_allowed_total +=$paid_det['SUM(waived_amount)'];
  
  }?>
  <tr><td colspan="8" align="center" valign="middle"><?php paginateexte($start, $q_limit, $no_rows, 'action='.$action.$PageUrl);?></td>
  </tr>
  <tr><td colspan="8" height="30">
  <table width="100%" border="0">
  <tr>
    <td width="13%" height="25" align="left" valign="middle">Total</td>
    <td width="1%" height="25" align="left" valign="middle">:</td>
    <td width="86%" height="25" align="left" valign="middle"><?php if($fine_amount_total>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($fine_amount_total, 2, '.', '');}  ?></td>
  </tr>
  <tr>
    <td height="25" align="left" valign="middle">Old Balance Paid</td>
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
    <td height="25" align="left" valign="middle">Waived Amount</td>
    <td height="25" align="left" valign="middle">:</td>
    <td height="25" align="left" valign="middle"><?php if($deduction_allowed_total>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($deduction_allowed_total, 2, '.', '');}  ?></td>
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
	
<a href="javascript: void(0)" onclick="popup_letter('?pid=79&action=print_oldbalancelist<?php echo $PageUrl;?>')" ><img src="images/print_16.png" border="0" title="Print Recipt" alt="Print Recipt" /></a>
	</td>
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
	if($action=='print_oldbalancelist')
	{
?>	
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
         <td height="3" colspan="3"></td>
	 </tr>
	  <tr>
		<td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Old Balances List</span></td>
	  </tr>
	   
		<tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="left" valign="top">
		<br />
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr class="bgcolor_02" height="25">
    <td width="5%" align="left" valign="middle">S.No</td>
    <td width="24%" align="left" valign="middle">Student Name<br />
      [Registration No]</td>
    <td width="10%" align="left" valign="middle">Class</td>
   
	<td width="13%" align="left" valign="middle">Old Balance</td>
    <td width="14%" align="left" valign="middle">Paid Amount</td>
	
    <td width="16%" align="left" valign="middle">Waived</td>
    <td width="11%" align="left" valign="middle">Balance</td>
    
  </tr>
  <?php						
		 if(count($oldbalances_det)>0){
         $slno = $start+1;
		 $rw =1;
		 $fine_amount_total =0;
		 $paid_amount_total =0;
		 $deduction_allowed_total =0;
		 $paid_det['SUM(paid_amount)'] = 0;
		 $paid_det['SUM(waived_amount)'] = 0;
foreach ($oldbalances_det as $eachrecord)
      {
	if($slno%2==0)
		$rowclass = "even";
		else
		$rowclass = "odd";
		 
		$paid_det = $db->getrow("SELECT SUM(paid_amount) , SUM(waived_amount) FROM es_old_balances_paid  WHERE ob_id ='".$eachrecord['ob_id']."'");
		
?>       
  <tr class="<?php echo $rowclass;?>">
    <td height="15" align="left" valign="middle">&nbsp;<?php echo $slno;?></td>
    <td height="15" align="left" valign="middle">&nbsp;<?php echo ucfirst($eachrecord['pre_name']) ."&nbsp;[ ".$eachrecord['studentid']." ]"; ?></td>
    <td height="15" align="left" valign="middle">&nbsp;<?php echo classname($eachrecord['pre_class']); ?></td>

    <td height="15" align="left" valign="middle">&nbsp;
      <?php if($eachrecord['old_balance']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['old_balance'], 2, '.', '');}  ?></td>
    <td height="15" align="left" valign="middle">&nbsp;
      <?php 
	
	  if($paid_det['SUM(paid_amount)']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($paid_det['SUM(paid_amount)'], 2, '.', '');}  ?></td>
	  
    <td height="15" align="left" valign="middle">&nbsp;
      <?php if($paid_det['SUM(waived_amount)']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($paid_det['SUM(waived_amount)'], 2, '.', '');}?></td>
   
   <td height="15" align="left" valign="middle">&nbsp; <?php if($eachrecord['balance']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['balance'], 2, '.', '');}else{echo "---";}?></td>
   
  </tr>
  <?php $slno++;
         $fine_amount_total +=$eachrecord['old_balance'];
		 $paid_amount_total +=$paid_det['SUM(paid_amount)'];
		 $deduction_allowed_total +=$paid_det['SUM(waived_amount)'];
  
  }?>
  <tr><td colspan="8" align="center" valign="middle"><?php paginateexte($start, $q_limit, $no_rows, 'action='.$action.$PageUrl);?></td>
  </tr>
  <tr><td colspan="8" height="30">
  <table width="100%" border="0">
  <tr>
    <td width="13%" height="25" align="left" valign="middle">Total</td>
    <td width="1%" height="25" align="left" valign="middle">:</td>
    <td width="86%" height="25" align="left" valign="middle"><?php if($fine_amount_total>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($fine_amount_total, 2, '.', '');}  ?></td>
  </tr>
  <tr>
    <td height="25" align="left" valign="middle">Old Balance Paid</td>
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
    <td height="25" align="left" valign="middle">Waived Amount</td>
    <td height="25" align="left" valign="middle">:</td>
    <td height="25" align="left" valign="middle"><?php if($deduction_allowed_total>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($deduction_allowed_total, 2, '.', '');}  ?></td>
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
if($action=='pay_oldbalance') { 
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Pay Old Balance</strong></td>
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
												<td align="center" valign="middle" class="admin"><font color="#FF0000"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format( ceil($balance_det['balance']), 2, '.', '');?></font></td><td align="center" valign="middle"></td>
										  <td align="center" valign="middle"><input type="text" name="paid_amount" value="<?php echo $paid_amount;?>"  /></td><td align="center" valign="middle"></td>
										  <td align="center" valign="middle"><input type="text" name="waived_amount" value="<?php echo $waived_amount;?>"  /></td><td></td>
										</tr>
								  </table>
								</td>
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
								<td align="center" valign="middle">
								<input type="hidden" name="balance" value="<?php echo ceil($balance_det['balance']);?>" />
								<input type="submit" name="submit_old_balance" value="Pay Amount" class="bgcolor_02" /></td>
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
<?php 
if($action=='view_old_det') { 
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;View Paid Details</strong></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="middle" >
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
</table>

			</td></tr>
  <tr class="bgcolor_02" height="25">
    <td align="left" valign="middle">&nbsp;Date</td>
    <td align="left" valign="middle">&nbsp;Amount Paid</td>
    <td align="left" valign="middle">&nbsp;Waived Amount</td>
    <td align="left" valign="middle">&nbsp;Action</td>
  </tr>
  <?php						
		if($no_rows>0){
         $slno = $start+1;
		 $rw =1;
		 $tot_fine_amount =0;
		 $tot_paid_amount =0;
		 $tot_deduction_allowed =0;
foreach ($oldbal_paid_det as $eachrecord)
      {
	if($slno%2==0)
		$rowclass = "even";
		else
		$rowclass = "odd";
		
		
?>       
  <tr class="<?php echo $rowclass;?>">
    <td height="15" align="left" valign="middle">&nbsp;<?php if($eachrecord['paid_on']!='0000-00-00'){echo func_date_conversion("Y-m-d","d/m/Y",$eachrecord['paid_on']); }?></td>
    
    <td height="15" align="left" valign="middle">&nbsp;
      <?php if($eachrecord['paid_amount']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['paid_amount'], 2, '.', '');}  ?></td>
    <td height="15" align="left" valign="middle">&nbsp;
      <?php if($eachrecord['waived_amount']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['waived_amount'], 2, '.', '');}  ?></td>
	  
    <td height="15" align="left" valign="middle">&nbsp;<a href="javascript: void(0)" onclick="popup_letter('?pid=79&action=receipt_oldbal&obpid=<?php echo $eachrecord['obp_id']; ?>&sid=<?php echo $sid;?>')" ><img src="images/print_16.png" border="0" title="Print Recipt" alt="Print Recipt" /></a></td>
  </tr>
  <?php  $slno++;
         $tot_fine_amount +=$eachrecord['fine_amount'];
		 $tot_paid_amount +=$eachrecord['paid_amount'];
		 $tot_deduction_allowed +=$eachrecord['waived_amount'];
  
  }?>
  <tr height="25">
    <td>&nbsp;<b>Total:</b></td>
    <td>&nbsp;<?php if($tot_paid_amount>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($tot_paid_amount, 2, '.', '');}  ?></td>
	
    <td>&nbsp;<?php if($tot_deduction_allowed>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($tot_deduction_allowed, 2, '.', '');}  ?></td>
    <td></td>
  </tr>
   <tr height="25">
    <td colspan="8">
	<table width="100%" border="0">
  <tr>
    <td width="19%" align="left" valign="middle">Total</td>
    <td width="1%" align="left" valign="middle">:</td>
    <td width="80%" align="left" valign="middle"><?php 
	if($old_bal['old_balance']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($old_bal['old_balance'], 2, '.', '');}  ?></td>
  </tr>
  <tr>
    <td align="left" valign="middle">Amount Paid</td>
    <td align="left" valign="middle">:</td>
    <td align="left" valign="middle"><?php if($tot_paid_amount>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($tot_paid_amount, 2, '.', '');}  ?></td>
  </tr>
  <tr>
    <td align="left" valign="middle">Remaining</td>
    <td align="left" valign="middle">:</td>
    <td align="left" valign="middle"><?php 
	$remaining = $old_bal['old_balance']-$tot_paid_amount;
	
	if($remaining>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($remaining, 2, '.', '');}  ?></td>
  </tr>
  <tr>
    <td align="left" valign="middle">Waived Amount</td>
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
  <tr>
    <td align="left" valign="middle">&nbsp;</td>
    <td align="left" valign="middle">&nbsp;</td>
    <td align="left" valign="middle"><a href="javascript: void(0)" onclick="popup_letter('?pid=79&action=print_view_old_det&ofid=<?php echo $ofid; ?>&sid=<?php echo $sid;?>')" ><img src="images/print_16.png" border="0" title="Print Recipt" alt="Print Recipt" /></a></td>
  </tr>
</table>
	</td>
  </tr>
  
  <?php }else{?>
  <tr><td colspan="4" align="center"> No Records Found </td></tr>
  <?php }?>
   
  
</table>
<br />
<table width="100%">
  <tr><td colspan="4" align="right" style="padding-right:20px;"> <input type="button" value="Back to Search" onclick="javascript: history.go(-1);" class="bgcolor_02" style="cursor:pointer;" /></td></tr>
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
if($action=='print_view_old_det') { 
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;View Paid Details</strong></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="middle" >
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
</table>

			</td></tr>
  <tr class="bgcolor_02" height="25">
    <td align="left" valign="middle">&nbsp;Date</td>
    <td align="left" valign="middle">&nbsp;Amount Paid</td>
    <td align="left" valign="middle">&nbsp;Waived Amount</td>
   
  </tr>
  <?php						
		if($no_rows>0){
         $slno = $start+1;
		 $rw =1;
		 $tot_fine_amount =0;
		 $tot_paid_amount =0;
		 $tot_deduction_allowed =0;
foreach ($oldbal_paid_det as $eachrecord)
      {
	if($slno%2==0)
		$rowclass = "even";
		else
		$rowclass = "odd";
		
		
?>       
  <tr class="<?php echo $rowclass;?>">
    <td height="15" align="left" valign="middle">&nbsp;<?php if($eachrecord['paid_on']!='0000-00-00'){echo func_date_conversion("Y-m-d","d/m/Y",$eachrecord['paid_on']); }?></td>
    
    <td height="15" align="left" valign="middle">&nbsp;
      <?php if($eachrecord['paid_amount']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['paid_amount'], 2, '.', '');}  ?></td>
    <td height="15" align="left" valign="middle">&nbsp;
      <?php if($eachrecord['waived_amount']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['waived_amount'], 2, '.', '');}  ?></td>
	  
    
  </tr>
  <?php  $slno++;
         $tot_fine_amount +=$eachrecord['fine_amount'];
		 $tot_paid_amount +=$eachrecord['paid_amount'];
		 $tot_deduction_allowed +=$eachrecord['waived_amount'];
  
  }?>
  <tr height="25">
    <td>&nbsp;<b>Total:</b></td>
    <td>&nbsp;<?php if($tot_paid_amount>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($tot_paid_amount, 2, '.', '');}  ?></td>
	
    <td>&nbsp;<?php if($tot_deduction_allowed>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($tot_deduction_allowed, 2, '.', '');}  ?></td>
   
  </tr>
   <tr height="25">
    <td colspan="3">
	<table width="100%" border="0">
  <tr>
    <td width="19%" align="left" valign="middle">Total</td>
    <td width="1%" align="left" valign="middle">:</td>
    <td width="80%" align="left" valign="middle"><?php 
	if($old_bal['old_balance']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($old_bal['old_balance'], 2, '.', '');}  ?></td>
  </tr>
  <tr>
    <td align="left" valign="middle">Amount Paid</td>
    <td align="left" valign="middle">:</td>
    <td align="left" valign="middle"><?php if($tot_paid_amount>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($tot_paid_amount, 2, '.', '');}  ?></td>
  </tr>
  <tr>
    <td align="left" valign="middle">Remaining</td>
    <td align="left" valign="middle">:</td>
    <td align="left" valign="middle"><?php 
	$remaining = $old_bal['old_balance']-$tot_paid_amount;
	
	if($remaining>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($remaining, 2, '.', '');}  ?></td>
  </tr>
  <tr>
    <td align="left" valign="middle">Waived Amount</td>
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
  <tr><td colspan="4" align="center"> No Records Found </td></tr>
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
<?php if($action=='receipt_oldbal') { 
//array_print($_GET);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Receipt for Old Balance</strong></td>
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
											<td width="73%" align="left" valign="middle"><?php echo $obpid;?></td>
										  </tr>
										  <tr>
											<td height="25" align="left" valign="middle" class="admin">Registration&nbsp;No</td>
											<td align="left" valign="middle">:</td>
											<td align="left" valign="middle"><?php echo $sid;
											$stud_details = get_studentdetails( $sid);
											?></td>
										</tr>
										<tr>
											<td height="25" align="left" valign="middle" class="admin">Class</td>
											<td align="left" valign="middle">:</td>
											<td align="left" valign="middle"><?php echo classname($stud_details['pre_class']);?></td>
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
										</table></td>	
									
								  </tr>
								</table>

						</td>
					  </tr>
					  <tr>
						<td><table width="100%" border="0">
							  <tr class="admin">
								<td align="left">Fee Type</td>
								
								<td align="left">Waived Amount</td>
								<td align="left">Amount Received</td>
							  </tr>
							  <tr>
								<td align="left">Old Balance</td>
								<td align="left"><?php if($payamount_details['waived_amount']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($payamount_details['waived_amount'], 2, '.', '');}else{echo "---";}?></td>
								<td align="left"><?php if($payamount_details['paid_amount']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($payamount_details['paid_amount'], 2, '.', '');}else{echo "---";}?></td>
							  </tr>
							</table>
                      </td>
					  </tr>
					  <tr>
						<td><table width="100%" border="0">
							  <tr>
								<td align="left" valign="middle"><b>Rupees : </b><?php echo $payamount_details['remarks'];?></td>
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
											<td width="73%" align="left" valign="middle"><?php echo $payamount_details['otherfine_id']?></td>
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
											 if($online_row['status']!='inactive') { echo "Active"; } else { echo "Transfered";}
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
										<!--<tr>
											<td height="25" align="left" valign="middle" class="admin">Roll No.</td>
											<td align="left" valign="middle" class="admin">:</td>
											<td align="left" valign="middle"> <?php 
	 //$DET = get_studentdetails($sid);
		//$online_sql="select * from es_sections_student where student_id=". $stud_details['es_preadmissionid'];
	                                    //$online_row=$db->getRow($online_sql);
					  //echo $online_row['roll_no']; ?> 
					  </td>
										</tr>-->		
										
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