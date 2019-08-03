<script language="javascript">
function newWindowOpen(href)
{
    window.open(href,null, 'width=900,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');
}
</script>
<?php 
	if ($action == 'slip') {
/*
*Start of Attendance Slips Web Page
*/
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Attendance Slips </span></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="left" valign="top" class="narmal">&nbsp;&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="left" valign="top"><table width="100%" border="0" cellspacing="5" cellpadding="0">
                      <tr></tr>
                      <tr>
                        <td align="left" valign="top"><table width="100%" border="1" cellspacing="0" cellpadding="0">
                            <tr>
                              <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="5">
                                  <tr>
                                    <td colspan="10" align="left" valign="top"></td>
                                  </tr>
                                  <tr>
                                    <td width="32%" align="left" valign="middle" class="narmal">&nbsp;S. No </td>
                                    <td colspan="2" align="left" valign="top" class="narmal">&nbsp;</td>
                                    <td align="left" valign="bottom" class="narmal">Date</td>
                                    <td align="left" valign="top" class="narmal">&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td align="left" valign="middle" class="narmal">&nbsp;Teacher Name </td>
                                    <td colspan="4" align="left" valign="top" class="narmal">&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td align="left" valign="middle" class="narmal">&nbsp;Subject </td>
                                    <td colspan="4" align="left" valign="top" class="narmal">&nbsp;</td>
                                  </tr>
								  <tr>
                                    <td align="left" valign="middle" class="narmal">&nbsp;Class </td>
                                    <td colspan="4" align="left" valign="top" class="narmal">&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td align="left" valign="middle" class="narmal">&nbsp;Period </td>
                                    <td width="4%" align="left" valign="top" class="narmal">From</td>
                                    <td width="13%" align="left" valign="top" class="narmal">&nbsp;</td>
                                    <td width="17%" align="left" valign="top" class="narmal">To</td>
                                    <td width="34%" align="left" valign="top" class="narmal">&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td align="left" valign="middle" class="narmal">&nbsp;Absentees&nbsp;Registration&nbsp;Number</td>
                                     <td colspan="4" align="left" valign="top" class="narmal">&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td align="left" valign="middle" class="narmal">&nbsp;</td>
                                    <td colspan="3" align="left" valign="top" class="narmal">&nbsp;</td>
                                    <td align="left" valign="top" class="narmal">&nbsp;</td>
                                  </tr>
                              </table></td>
                            </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td align="left" valign="top"><table width="100%" border="1" cellspacing="0" cellpadding="0">
                            <tr>
                              <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="5">
                                <tr>
                                  <td colspan="10" align="left" valign="top"></td>
                                </tr>
                                <tr>
                                  <td width="32%" align="left" valign="middle" class="narmal">&nbsp;S. No </td>
                                  <td colspan="2" align="left" valign="top" class="narmal">&nbsp;</td>
                                  <td align="left" valign="bottom" class="narmal">Date</td>
                                  <td align="left" valign="top" class="narmal">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td align="left" valign="middle" class="narmal">&nbsp;Teacher Name </td>
                                  <td colspan="4" align="left" valign="top" class="narmal">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td align="left" valign="middle" class="narmal">&nbsp;Subject </td>
                                  <td colspan="4" align="left" valign="top" class="narmal">&nbsp;</td>
                                </tr>
								<tr>
                                    <td align="left" valign="middle" class="narmal">&nbsp;Class </td>
                                    <td colspan="4" align="left" valign="top" class="narmal">&nbsp;</td>
                                  </tr>
                                <tr>
                                  <td align="left" valign="middle" class="narmal">&nbsp;Period </td>
                                  <td width="3%" align="left" valign="top" class="narmal">From</td>
                                  <td width="14%" align="left" valign="top" class="narmal">&nbsp;</td>
                                  <td width="5%" align="left" valign="top" class="narmal">To</td>
                                  <td width="46%" align="left" valign="top" class="narmal">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td align="left" valign="middle" class="narmal">&nbsp;Absentees&nbsp;Registration&nbsp;Number</td>
                                  <td colspan="4" align="left" valign="top" class="narmal">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td align="left" valign="middle" class="narmal">&nbsp;</td>
                                  <td colspan="3" align="left" valign="top" class="narmal">&nbsp;</td>
                                  <td align="left" valign="top" class="narmal">&nbsp;</td>
                                </tr>
                              </table></td>
                            </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td align="left" valign="top"><table width="100%" border="1" cellspacing="0" cellpadding="0">
                            <tr>
                              <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="5">
                                <tr>
                                  <td colspan="10" align="left" valign="top"></td>
                                </tr>
                                <tr>
                                  <td width="32%" align="left" valign="middle" class="narmal">&nbsp;S. No </td>
                                  <td colspan="2" align="left" valign="top" class="narmal">&nbsp;</td>
                                  <td align="left" valign="bottom" class="narmal">Date</td>
                                  <td align="left" valign="top" class="narmal">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td align="left" valign="middle" class="narmal">&nbsp;Teacher Name </td>
                                  <td colspan="4" align="left" valign="top" class="narmal">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td align="left" valign="middle" class="narmal">&nbsp;Subject </td>
                                  <td colspan="4" align="left" valign="top" class="narmal">&nbsp;</td>
                                </tr>
								<tr>
                                    <td align="left" valign="middle" class="narmal">&nbsp;Class </td>
                                    <td colspan="4" align="left" valign="top" class="narmal">&nbsp;</td>
                                  </tr>
                                <tr>
                                  <td align="left" valign="middle" class="narmal">&nbsp;Period </td>
                                  <td width="3%" align="left" valign="top" class="narmal">From</td>
                                  <td width="14%" align="left" valign="top" class="narmal">&nbsp;</td>
                                  <td width="5%" align="left" valign="top" class="narmal">To</td>
                                  <td width="46%" align="left" valign="top" class="narmal">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td align="left" valign="middle" class="narmal">&nbsp;Absentees&nbsp;Registration&nbsp;Number</td>
                                  <td colspan="4" align="left" valign="top" class="narmal">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td align="left" valign="middle" class="narmal">&nbsp;</td>
                                  <td colspan="3" align="left" valign="top" class="narmal">&nbsp;</td>
                                  <td align="left" valign="top" class="narmal">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td align="left" valign="middle" class="narmal">&nbsp;</td>
                                  <td colspan="3" align="left" valign="top" class="narmal">&nbsp;</td>
                                  <td align="left" valign="top" class="narmal">&nbsp;</td>
                                </tr>
                             
							  </table></td>
                            </tr>
							
							
							
                        </table></td>
                      </tr>
                   
				    <tr>
                        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="5">
                                <tr>
                                  <td colspan="10" align="left" valign="top"></td>
                                </tr>
                             
                                <tr>
                                  <td width="11%" align="left" valign="middle" class="narmal">&nbsp;</td>
                                  <td colspan="3" align="left" valign="top" class="narmal">&nbsp;</td>
                                  <td width="12%" align="left" valign="top" class="narmal">&nbsp;</td>
                                </tr>
                              
							   <tr>
                        <td class="narmal">&nbsp;</td>
                        <td width="4%" class="narmal">&nbsp;</td>
                        <td width="35%" class="narmal" align="right"><input name="Submit22" type="button" onclick="newWindowOpen ('?pid=56&action=printslip');" class="bgcolor_02" style="cursor:pointer;" value="Print" /></td>
                        <td width="38%" align="center" class="narmal">&nbsp;</td>
                      </tr>
							  
							  </table></td>
                            </tr>
                        </table></td>
                      </tr>
				   
				   
				   
				   
				    </table></td>
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
/*
*End of Attendance Slips Web Page
*/	
if($action=='printslip') { 
/*
*Start of Attendance Slips Print Web Page
*/
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
           
		   
			  <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Attendance Slips</span></td>
              </tr>
               <tr>
			<td class="bgcolor_02" width="1"/>
			<td valign="top" align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="left" valign="top"></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top"><table width="100%" border="0" cellspacing="5" cellpadding="0">
                      <tr></tr>
                      <tr>
                        <td align="left" valign="top"><table width="100%" border="1" cellspacing="0" cellpadding="0">
                            <tr>
                              <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="5">
                                  <tr>
                                    <td colspan="10" align="left" valign="top"></td>
                                  </tr>
                                  <tr>
                                    <td width="46%" align="left" valign="middle" class="narmal">&nbsp;S. No </td>
                                    <td colspan="2" align="left" valign="top" class="narmal">&nbsp;</td>
                                    <td align="left" valign="bottom" class="narmal">Date</td>
                                    <td align="left" valign="top" class="narmal">&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td align="left" valign="middle" class="narmal">&nbsp;Teacher Name </td>
                                    <td colspan="4" align="left" valign="top" class="narmal">&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td align="left" valign="middle" class="narmal">&nbsp;Subject </td>
                                    <td colspan="4" align="left" valign="top" class="narmal">&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td align="left" valign="middle" class="narmal">&nbsp;Period </td>
                                    <td width="7%" align="left" valign="top" class="narmal">From</td>
                                    <td width="7%" align="left" valign="top" class="narmal">&nbsp;</td>
                                    <td width="9%" align="left" valign="top" class="narmal">To</td>
                                    <td width="31%" align="left" valign="top" class="narmal">&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td align="left" valign="middle" class="narmal">&nbsp;Absentees&nbsp;Registration&nbsp;Number</td>
                                    <td colspan="4" align="left" valign="top" class="narmal">&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td align="left" valign="middle" class="narmal">&nbsp;</td>
                                    <td colspan="3" align="left" valign="top" class="narmal">&nbsp;</td>
                                    <td align="left" valign="top" class="narmal">&nbsp;</td>
                                  </tr>
								  <tr>
                                    <td align="left" valign="middle" class="narmal">&nbsp;</td>
                                    <td colspan="3" align="left" valign="top" class="narmal">&nbsp;</td>
                                    <td align="left" valign="top" class="narmal">&nbsp;</td>
                                  </tr>
								  <tr>
                                    <td align="left" valign="middle" class="narmal">&nbsp;</td>
                                    <td colspan="3" align="left" valign="top" class="narmal">&nbsp;</td>
                                    <td align="left" valign="top" class="narmal">&nbsp;</td>
                                  </tr>
								  <tr>
                                  <td align="left" valign="middle" class="narmal">&nbsp;</td>
                                  <td colspan="3" align="left" valign="top" class="narmal">&nbsp;</td>
                                  <td align="left" valign="top" class="narmal">&nbsp;</td>
                                </tr>
								 <tr>
                                    <td align="left" valign="middle" class="narmal">&nbsp;</td>
                                    <td colspan="3" align="left" valign="top" class="narmal">&nbsp;</td>
                                    <td align="left" valign="top" class="narmal">&nbsp;</td>
                                  </tr>
								  
                              </table></td>
                            </tr>
                        </table></td>
                      </tr>
					  <tr>
							  <td align="left" valign="middle" class="narmal">&nbsp;</td>
							  <td colspan="3" align="left" valign="top" class="narmal">&nbsp;</td>
							  <td align="left" valign="top" class="narmal">&nbsp;</td>
						</tr>
						<tr>
								<td align="left" valign="middle" class="narmal">&nbsp;</td>
								<td colspan="3" align="left" valign="top" class="narmal">&nbsp;</td>
								<td align="left" valign="top" class="narmal">&nbsp;</td>
						</tr>
							 
                      <tr>
                        <td align="left" valign="top"><table width="100%" border="1" cellspacing="0" cellpadding="0">
                            <tr>
                              <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="5">
                                <tr>
                                  <td colspan="10" align="left" valign="top"></td>
                                </tr>
                                <tr>
                                  <td width="46%" align="left" valign="middle" class="narmal">&nbsp;S. No </td>
                                  <td colspan="2" align="left" valign="top" class="narmal">&nbsp;</td>
                                  <td align="left" valign="bottom" class="narmal">Date</td>
                                  <td align="left" valign="top" class="narmal">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td align="left" valign="middle" class="narmal">&nbsp;Teacher Name </td>
                                  <td colspan="4" align="left" valign="top" class="narmal">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td align="left" valign="middle" class="narmal">&nbsp;Subject </td>
                                  <td colspan="4" align="left" valign="top" class="narmal">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td align="left" valign="middle" class="narmal">&nbsp;Period </td>
                                  <td width="4%" align="left" valign="top" class="narmal">From</td>
                                  <td width="7%" align="left" valign="top" class="narmal">&nbsp;</td>
                                  <td width="15%" align="left" valign="top" class="narmal">To</td>
                                  <td width="28%" align="left" valign="top" class="narmal">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td align="left" valign="middle" class="narmal">&nbsp;Absentees&nbsp;Registration&nbsp;Number</td>
                                  <td colspan="4" align="left" valign="top" class="narmal">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td align="left" valign="middle" class="narmal">&nbsp;</td>
                                  <td colspan="3" align="left" valign="top" class="narmal">&nbsp;</td>
                                  <td align="left" valign="top" class="narmal">&nbsp;</td>
                                </tr>
								 <tr>
                                    <td align="left" valign="middle" class="narmal">&nbsp;</td>
                                    <td colspan="3" align="left" valign="top" class="narmal">&nbsp;</td>
                                    <td align="left" valign="top" class="narmal">&nbsp;</td>
                                  </tr>
								  <tr>
                                    <td align="left" valign="middle" class="narmal">&nbsp;</td>
                                    <td colspan="3" align="left" valign="top" class="narmal">&nbsp;</td>
                                    <td align="left" valign="top" class="narmal">&nbsp;</td>
                                  </tr>
								  <tr>
                                  <td align="left" valign="middle" class="narmal">&nbsp;</td>
                                  <td colspan="3" align="left" valign="top" class="narmal">&nbsp;</td>
                                  <td align="left" valign="top" class="narmal">&nbsp;</td>
                                </tr>
								 <tr>
                                    <td align="left" valign="middle" class="narmal">&nbsp;</td>
                                    <td colspan="3" align="left" valign="top" class="narmal">&nbsp;</td>
                                    <td align="left" valign="top" class="narmal">&nbsp;</td>
                                  </tr>
								  
                              </table></td>
                            </tr>
                        </table></td>
                      </tr>
          				 </table></td>
					  </tr>
                   </table></td>
			<td class="bgcolor_02" width="1"/>
	 </tr>
              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
                </tr>
            </table>
<?php }

/*
*End of Attendance Slips Print Page
*/	

/*
*Start of Enter Students Attendance Web Page
*/

 if($action=='stud_attend' ){
 ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
	 </tr>
	<tr>
		<td height="25" colspan="3" class="bgcolor_02">&nbsp;<span class="admin">Students Attendance</span></td>
	 </tr>
<form name="attend_stud" action="" method="post" >
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="left" valign="top">
			<table width="100%" border="0" cellspacing="4" cellpadding="0">
		    	<tr>
			    	<td align="left" valign="top">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							
			<tr>
                <td height="25" align="right" colspan="6"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font><br /></td>
                 
              </tr>	
			  				<tr>
								<td width="14%" align="left" class="narmal">&nbsp;Class</td>
							  <td width="31%" align="left" class="narmal"><select name="at_std_class" onchange="JavaScript:document.attend_stud.submit();">
								<option value="" >Select Class </option>
										<?php 
										$staff_det = get_staffdetails($_SESSION['eschools']['user_id']);
										
										$classlist = $db->getrows("SELECT * FROM es_classes WHERE es_classesid='".$staff_det['st_class']."'");
										foreach($classlist as $indclass) {
										?>
										<option value="<?php echo $indclass['es_classesid']; ?>" <?php echo ($indclass['es_classesid']==$at_std_class)?"selected":""?> ><?php echo $indclass['es_classname']; ?></option>
				<?php } ?>
								</select>
							    <a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fStartPop(document.attend_stud_report.dc1,document.attend_stud_report.dc2);return false;" ></a><font color="#FF0000">*</font></td>
							  <td colspan="2" class="narmal">&nbsp;</td>
								<td width="27%" class="narmal">&nbsp;</td>
			  </tr>
				  			<tr>
								<td align="left" class="narmal">&nbsp;Date</td>
							  <td align="left" class="narmal">
								<table width="100%" border="0">
  <tr>
    <td width="32%" align="left" valign="middle"><input name="at_attendance_date"  id="at_attendance_date"  readonly class="plain" size="15" value="<?php
														  if (isset($at_attendance_date)){ 
																 echo $_POST['at_attendance_date'];
															}elseif (isset($getmaintenance->at_attendance_date)){
																
																	echo $getmaintenance->at_attendance_date;
															} 
													
													?>"/></td>
    <td width="13%" align="left" valign="middle"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.attend_stud.at_attendance_date);return false;" ><img name="popcal" align="absmiddle" src="<?php echo JS_PATH ?>/DateTime/calbtn.gif" width="34" height="22" border="0" alt="" /></a>
	<iframe width=188 height=166 name="gToday:datetime:agenda.js:gfPop:plugins_time.js" id="gToday:datetime:agenda.js:gfPop:plugins_time.js" src="<?php echo JS_PATH ?>/DateTime/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe>
	</td>
    <td width="55%" align="left"><font color="#FF0000">*</font></td>
  </tr>
</table>

								
								
							  
								 
								 </td>
							  <td colspan="2" class="narmal">&nbsp;</td>
								<td class="narmal">&nbsp;</td>
				  </tr>
			
							<tr>
								<td width="21%" class="narmal"></td>
								<td width="29%" class="error_message"><?php 
												if (isset($error_attendance_date)&&$error_attendance_date!=""){
													  echo $error_attendance_date;
												}
										  ?></td>
								<td colspan="4" class="error_message">&nbsp;</td>
		  </tr>
			 </table>
		</td>
	</tr>
	<tr>
	  <td height="25" align="left" valign="middle"><table width="100%" border="0" bordercolor="#CCCCCC" cellpadding="0" cellspacing="0">
<?php if(isset($at_std_class) && $at_std_class!="") {?>
<?php if (is_array($studentnamelist)) { ?>
		  <tr class="bgcolor_02">
			<td align="center"><span class="admin">S.No </span></td>
			<td  height="25" align="center" valign="middle"><span class="admin">Registration&nbsp;#</span></td>
			<td  height="25" align="center"><span class="admin">Student Name </span></td>
			<td  align="center"><span class="admin">Attendance</span></td>
			<td  align="center"><span class="admin">Remarks</span></td>
			</tr>
<?php						
$rw = 1;
$slno = $start+1;
foreach ($studentnamelist as $student)
{
if($rw%2==0)
$rowclass = "even";
else
$rowclass = "odd";
$selval = $rw-1;
?>

		  <tr class="<?php echo $rowclass;?>">
			<td align="center"><?php echo $slno;?></td>
			<td align="center" valign="middle">SM<input name="at_reg_no[]" type="hidden" value="<?php echo $student['es_preadmissionid']; ?>" size="2" /><?php echo $student['es_preadmissionid']; ?></td>
			<td align="center" valign="middle"><?php  echo $student['pre_name']; ?><input type="hidden" name="at_stud_name[]" value="<?php  echo $student['pre_name']; ?>" size="15"  /></td>
			<td align="center" valign="middle"><span class="narmal">
			 <select name="at_attendance[]"><option value="P" <?php if($at_attendance[$selval]=='P'){ echo 'selected="selected"'; } ?>>P</option><option value="A" <?php if($at_attendance[$selval]=='A'){ echo 'selected="selected"'; } ?>>A</option></select>
&nbsp;                        </span><?php 
						if (isset($error_attendance)&&$error_attendance!=""){
							  echo $error_attendance;
						}
				  ?></td>
										  
			<td><input name="at_remarks[]" type="text" size="14" value="<?php echo $at_remarks[$selval]; ?>" /></td>
			</tr>
		 <?php 
		  $rw++;
		  $slno++;
	
		 } 
		?>
	
		  </table>
		  <table width="100%" height="32" border="0">
			<tr>
			  <td align="center" valign="middle"><input name="stud_attend_Submit" type="submit" class="bgcolor_02" style="cursor:pointer;"  value="Submit" />
&nbsp;
<input name="reset" type="submit" class="bgcolor_02" style="cursor:pointer;" value="Reset" /></td>
			</tr>
			 <tr><td><font color="#FF0000">*</font>P = Present &nbsp;&nbsp;&nbsp;<font color="#FF0000">*</font>A = Absent</td></tr>
		  <?php 
		   } 
			
			  else { ?>
			  <tr >
			   <td align='center' class="narmal">No records found</td>
			  </tr>
					<?php } 					  
		  
		  }
	?>
		  </table>
		  
		  
		  </td>
	  </tr>
	    	</table>
		</td>
		<td width="1" class="bgcolor_02"></td>
   </tr>
</form>
	<tr>
		<td height="1" colspan="3" class="bgcolor_02"></td>
	</tr>
</table>
<?php  }
/*
*End of Enter Students Attendance Web Page
*/ 

if($action == 'stud_report') {
/*
*Start of Student Wise Report Attendance Web Page
*/
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><span class="admin">&nbsp;Student Report</span></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="4" cellpadding="0">
				<tr>
                <td height="25" align="right" colspan="3"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font><br /></td>
                 
              </tr>	
                  <tr>
                    <td align="left" valign="top"><table width="100%" border="0" cellspacing="3" cellpadding="0">
                     <form action="" method="post" name="student_report" id="student_report" >
					  <tr>
					    <td align="left" valign="middle" class="narmal">Class</td>
                        <td align="left" valign="middle" class="narmal"><select name="at_std_wise_class_report" onchange="JavaScript:document.student_report.submit();">
                          <option value="" >Select Class </option>
                          <?php 
						$staff_det = get_staffdetails($_SESSION['eschools']['user_id']);
										
						$classlist = $db->getrows("SELECT * FROM es_classes WHERE es_classesid='".$staff_det['st_class']."'");
						foreach($classlist as $indclass) {
						?>
                          <option value="<?php echo $indclass['es_classesid']; ?>"<?php echo ($indclass['es_classesid']==$at_std_wise_class_report)?"selected":""?> ><?php echo $indclass['es_classname']; ?></option>
                          <?php } ?>
                        </select>
                          <font color="#FF0000">*</font></td>
                        <td align="left" valign="middle" class="narmal">&nbsp;</td>
                      </tr>
                      <tr>
                        <td width="281" align="left" valign="middle" class="narmal">Registration No </td>
                        <td width="281" align="left" valign="middle" class="narmal">SM<select name="at_stdregno" onchange="JavaScript:document.student_report.submit();">
                          <option value="" >Select</option>
                          <?php 
						foreach($stud_regno as $each_regno) {
						?>
                          <option value="<?php echo $each_regno['es_preadmissionid']; ?>" <?php echo ($each_regno['es_preadmissionid']==$at_stdregno)?"selected":""?>><?php echo $each_regno['es_preadmissionid']; ?></option>
                          <?php } ?>
                        </select>
                          <font color="#FF0000">*</font></td>
                        <td width="301" align="left" valign="middle" class="narmal">&nbsp;</td>

					</tr>
	
					<tr>
					  <td width="281" align="left" valign="middle"><span class="narmal">From</span></td>
					<td width="281" align="left" valign="middle"><table width="97%" border="0" cellspacing="0" cellpadding="0">
						  <tr>
							
							<td width="10%" valign="middle">
							<table width="100%" border="0">
  <tr>
    <td align="left" valign="middle"><input class="plain" name="dc1"  value="<?php
										          if (isset($dc1)){ 
														 echo $_POST['dc1'];
														 }
														 ?>"
														 
														  size="12" onfocus="this.blur()" readonly="readonly" /></td>
    <td align="left" valign="middle"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fStartPop(document.student_report.dc1,document.student_report.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a></td>
    <td align="left" valign="middle"><font color="#FF0000">*</font></td>
  </tr>
</table>

							</td>
							<td width="82%"></td>
						  </tr>
					  </table></td>
					 <td width="301" align="left" valign="middle"><table width="94%" border="0" cellspacing="0" cellpadding="0">
						<tr>
						  <td width="8%"  class="narmal">To</td>
						  <td width="10%" valign="middle">
						  
						  <table width="100%" border="0">
  <tr>
    <td align="left" valign="middle"><input class="plain" name="dc2" value="<?php
										          if (isset($dc2)){ 
														 echo $_POST['dc2'];
														 }
														 ?>" size="12" onfocus="this.blur()" readonly="readonly" /></td>
    <td align="left" valign="middle"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fEndPop(document.student_report.dc1,document.student_report.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a></td>
    <td align="left" valign="middle"><font color="#FF0000">*</font></td>
  </tr>
</table>

						  </td>
						  <td width="82%"></td>
						</tr>
					  </table></td>
					
					</tr>
					
					<tr>
					 <?php 
if (is_array($stud_name) && count($stud_name)>0) {

foreach($stud_name as $each_name) {
?>
             			<td align="left" valign="middle" class="narmal">Student&nbsp;Name&nbsp;</td>
                        <td width="498" align="left" valign="middle" class="narmal"><?php echo $each_name['pre_name']; ?></td>
						
<?php 
}
}
?>
						 <td align="left" valign="middle">&nbsp;</td>
					</tr>
					<tr><td align="left" valign="middle">&nbsp;</td>
					<td align="left" valign="middle"><input type="submit" name="student_report_submit" value="Search" style="cursor:pointer;" class="bgcolor_02" /></td>
					<td align="left" valign="middle"></td>
					</tr>
					</form> 
				<iframe width=132 height=142 name="gToday:contrast:agenda.js" id="gToday:contrast:agenda.js" src="<?php echo JS_PATH ?>/DateRange/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe></table></td>
                  </tr>
                  <tr>
                    <td height="25" align="left" valign="middle"><table width="100%"  border="0">
<?php 
$workdays = get_workingdays_studentwise1($from,$to,$at_std_wise_class_report,$at_stdregno);


if (is_array($studentwiseReportList) && $cnt_rec_atnd > 0 && $workdays!=0 ) { ?>

					  <tr class="bgcolor_02" height="23">
                        
                        <td width="33%" align="center"><span class="admin">School Working Days</span></td>
                        <td width="26%" align="center"><span class="admin">&nbsp;Present days</span></td>
						<td width="23%" align="center"><span class="admin">&nbsp;Absent days</span></td>
                        <td width="16%" align="center"><span class="admin">&nbsp;%</span></td>
                      </tr>
<?php						
		 
		 $presentdays = get_presentdays_studentwise($from,$to,$at_std_wise_class_report,$at_stdregno);
		 $rw = 1;
         $slno = $start+1;
foreach ($studentwiseReportList as $student)
      {
	if($rw%2==0)
		$rowclass = "even";
		else
		$rowclass = "odd";
		$absent = $workdays-$presentdays;
		
	
?>                      <tr class="<?php echo $rowclass;?>">
                        
                <td align="center" class="narmal"><?php echo $workdays;?></td>
                        <td align="center" class="narmal"><?php echo $presentdays;?></td>
						<td align="center" class="narmal"><?php echo $absent;?><?php if($absent!= 0) { ?>&nbsp;<a href="javascript:void(0)" onclick="window.open('?pid=56&action=class_report_absent_date&at_std_wise_class_report=<?php echo $at_std_wise_class_report;?>&caid=<?php echo $at_stdregno."&from=$from&to=$to" ;?>',null,'width=600,height=400,left=50,top=30,scrollbars=yes,menubar=yes');"><?php echo viewIcon();?></a><?php } ?></td>
                        <?php if($workdays!="") { 
						$percent = ($presentdays/$workdays) * 100; ?>
						<td align="center" class="narmal"><?php echo sprintf("%01.2f",$percent)."%";?></td>
                        <?php 
						}
						else {
						?>
						<td width="2%" align="center" class="narmal"><?php echo "0%"; ?></td>
		<?php } ?>
						</tr>
<?php                  
					  $rw++;
                      $slno++;
				 }
?>
					  </table>
                      <table width="100%" height="33" border="0">
                        <tr>
                          <td align="center" valign="middle">&nbsp;<input name="Submit22" type="button" onclick="newWindowOpen ('?pid=56&action=print_stud_report<?php echo $studurl;?>');" class="bgcolor_02" style="cursor:pointer;"  value="Print" /></td>
</tr>
<?php 
}

	
	 elseif(isset($cnt_rec_atnd ) && $cnt_rec_atnd == 0 ) {?>
						<tr>
								<td align='center' colspan='7' class='narmal'>No records found</td>
							</tr>
							<tr>
								<td  ></td>
							</tr>
					<?php }

					 
?>
					  </table></td>
                  </tr>
                </table></td>
				<td width="1" class="bgcolor_02"></td>
              </tr>
			  
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
              </tr>
            </table>
<?php }
/*
*End of Student Wise Report Attendance Web Page
*/
/*
*Start of Student Wise Report Attendance Print Page
*/
 if ($action == 'print_stud_report') { ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
		<td height="19" colspan="4"></td>
	</tr>
	<tr>
		<td height="25" colspan="4" class="bgcolor_02" align="left"><span class="admin">&nbsp;Student Report</span></td>
  </tr>
	<tr>
		<td colspan="4">&nbsp;</td>
	</tr>
	<tr>
		<td width="6%" align="left" class="adminfont" >Class:</td>
	  <td width="57%" class="narmal" align="left" >&nbsp;&nbsp;&nbsp;<?php echo $className['es_classname'];?></td>
<?php 
if (is_array($stud_name) && count($stud_name)>0) {

	foreach($stud_name as $each_name) {
?>
		<td width="13%" align="left" class="adminfont">Student&nbsp;Name&nbsp;: </td>
		<td width="24%" class="narmal" align="left"><?php echo $each_name['pre_name']; ?></td>
						
<?php 
}
}
?>
  </tr>
	<tr>
		<td colspan="4" align="left">&nbsp;</td>
  </tr>
    <?php if(isset($from)) { ?>
	<tr>
		<td align="left" class="adminfont">From:</td>
	  <td align="left" class="narmal">&nbsp;&nbsp;&nbsp;<?php echo displaydate($from);?></td>
	  <td class="adminfont"align="left">To:</td>
		<td class="narmal" align="left"><?php echo displaydate($to);?></td>
	</tr>
	<?php } ?>
	<tr>
    	<td  colspan="4"><table width="100%" border="0" cellspacing="4" cellpadding="0">
			<tr>
				<td align="left" valign="top"></td>
			</tr>
                  <tr>
                    <td height="25" align="left" valign="middle"><table width="100%" height="81" border="0">
<?php 
$workdays = get_workingdays_studentwise1($from,$to,$at_std_wise_class_report,$at_stdregno,$at_std_wise_name);


if (is_array($studentwiseReportList)&& count($studentwiseReportList)>0 && $workdays!=0 ) { ?>

					  <tr class="bgcolor_02">
                        <td width="7%" height="18" align="center" class="admin"><span class="admin">S.No</span></td>
                        <td width="24%" align="center" class="admin"><span class="admin">School&nbsp;Working&nbsp;Days</span></td>
                        <td width="19%" align="center" class="admin"><span class="admin">&nbsp;Present days</span></td>
						<td width="25%" align="center" class="admin"><span class="admin">&nbsp;Absent days</span></td>
                        <td width="23%" align="center" class="admin"><span class="admin">&nbsp;%</span></td>
                      </tr>
<?php						
		 
		 $presentdays = get_presentdays_studentwise($from,$to,$at_std_wise_class_report,$at_stdregno,$at_std_wise_name);
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
				 
?>
					  </table></td>
                  </tr>
                </table></td>
    
    </tr>
	
</table>

<?php } 
/*
*End of Student Wise Report Attendance Print Page
*/
/*Start of students classwise Page */

if($action == 'class_report') { ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
	 </tr>
	<tr>
		<td height="25" colspan="3" align="left" class="bgcolor_02">&nbsp;<span class="admin">Class Report</span></td>
  </tr>
    <tr>
					<td width="1" class="bgcolor_02"></td>
					<td align="left" valign="top"><table width="100%" border="0" cellspacing="4" cellpadding="0">
					<tr>
                <td height="25" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font><br /></td>
                 
              </tr>	
					  <tr>
						<td align="left" valign="top"><table width="100%" border="0" cellspacing="5" cellpadding="0">
						  <form action="" method="post" name="attend_stud_report" >
						<tr>
						   		<td align="left" class="narmal">Class</td>
						  <td align="left" class="narmal"><select name="at_std_class_report" >
							<option value="" >Select Class </option>
							<?php 
							$staff_det = get_staffdetails($_SESSION['eschools']['user_id']);
							$classlist = $db->getrows("SELECT * FROM es_classes WHERE es_classesid='".$staff_det['st_class']."'");
							foreach($classlist as $indclass) {
							?>
							<option value="<?php echo $indclass['es_classesid']; ?>" <?php echo ($indclass['es_classesid']==$at_std_class_report)?"selected":""?> ><?php echo $indclass['es_classname']; ?></option>
							<?php } ?>
							</select>&nbsp;<font color="#FF0000">*</font></td>
						  <td align="left" class="narmal">Academic Year</td>
				 	     <td align="left" class="narmal"><select name="pre_year">
							 <?php 
							 foreach($school_details_res as $each_record) { ?>
							
							<option value="<?php echo $each_record['es_finance_masterid']; ?>" <?php if($each_record['es_finance_masterid']==$pre_year) { echo "selected"; }?>><?php echo displaydate($each_record['fi_ac_startdate'])." To ".displaydate($each_record['fi_ac_enddate']); ?></option>
							
							 <?php } ?>
							</select>
								</td>
						  <td align="left" class="narmal"><input type="submit" name="school_year" class="bgcolor_02" style="cursor:pointer;"  value="Submit"/></td>
						 </tr>
						  
						
						   <?php /*?><tr>
						   		<td align="left" class="narmal">From</td>
						    <td align="left" class="narmal">
							  <table width="100%" border="0">
  <tr>
    <td width="27%"  align="left" valign="middle"><input class="plain" name="dc1"  value="<?php
													  if (isset($dc1)){ 
															 echo $_POST['dc1'];
															 }
															 ?>"
															 
															  size="12" onfocus="this.blur()" readonly="readonly" /></td>
    <td width="13%"  align="left" valign="middle"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fStartPop(document.attend_stud_report.dc1,document.attend_stud_report.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a></td>
    <td width="60%" align="left" valign="middle"><font color="#FF0000">*</font></td>
  </tr>
</table>

								
								</td>
							 <td align="left" class="narmal">To</td>
					 	    <td align="left" class="narmal">
							  <table width="100%" border="0">
  <tr>
    <td width="26%" align="left" valign="middle"><input class="plain" name="dc2" value="<?php
													  if (isset($dc2)){ 
															 echo $_POST['dc2'];
															 }
															 ?>" size="12" onfocus="this.blur()" readonly="readonly" /></td>
    <td width="13%" align="left" valign="middle"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fEndPop(document.attend_stud_report.dc1,document.attend_stud_report.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a></td>
    <td width="61%" align="left" valign="middle"><font color="#FF0000">*</font></td>
  </tr>
</table>

								
								
								</td>
							 <td align="left" class="narmal"><input type="submit" name="class_student_report_submit" value="Search" style="cursor:pointer;" class="bgcolor_02" /></td>
								</tr><?php */?>
					   </form>
					   <iframe width=132 height=142 name="gToday:contrast:agenda.js" id="gToday:contrast:agenda.js" src="<?php echo JS_PATH ?>/DateRange/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
	</iframe>
						</table></td>
					  </tr>
					  <tr>
						<td height="25" align="left" valign="middle"><table width="100%" border="0" cellspacing="1">
	<?php if(isset($at_std_class_report) && $at_std_class_report!="") {?>
	<?php if(is_array($studentReportList) && count($studentReportList)>0 && $class_student_report_submit == "") { ?>
	
						  <tr class="bgcolor_02">
							<td width="6%" height="26" align="center"><span class="admin">S.No</span></td>
							<td width="7%" align="center"><span class="admin">Reg&nbsp;#</span></td>
							<td width="11%" align="center"><span class="admin">Student Name </span></td>
							<td width="28%" align="center"><span class="admin">School Working  Days</span></td>
							<td width="13%" align="center"><span class="admin">&nbsp;Present days</span></td>
							<td width="17%" align="center"><span class="admin">&nbsp;Absent days</span></td>
							<td width="18%" align="center"><span class="admin">&nbsp;%</span></td>
						  </tr>
	<?php						
			 
			 $rw = 1;
			 $slno = $start+1;
			 
	foreach ($studentReportList as $studentreport)
		{
		if($rw%2==0)
			$rowclass = "even";
			else
			$rowclass = "odd";
			$reg = $studentreport['at_reg_no'];
			$workdaysdd = getarrayassoc("SELECT COUNT(`at_attendance_date`) FROM `es_attend_student` WHERE `at_attendance_date` BETWEEN  '$from_acad' AND  '$to_acad' AND `at_std_class`='$at_std_class_report' AND `at_reg_no`='$reg'");
	
			$presentdays =  sqlnumber("SELECT * FROM `es_attend_student` WHERE `at_attendance_date` BETWEEN  '$from_acad' AND  '$to_acad' AND `at_attendance` = 'P' AND `at_reg_no` = '$reg' AND `at_std_class` = '$at_std_class_report' ");
			
			$absent = $workdaysdd['COUNT(`at_attendance_date`)'] - $presentdays;
			
			
		
	?>		             <tr class="<?php echo $rowclass;?>">
							<td align="center" class="narmal"><?php echo $slno;?></td>
							<td align="center" class="narmal">SM<?php echo $studentreport['at_reg_no']; ?></td>
							<td align="center" class="narmal"><?php echo $studentreport['at_stud_name']; ?></td>
							<td align="center" valign="middle"><?php echo $workdaysdd['COUNT(`at_attendance_date`)'];?></td>
							<td align="center" class="narmal"><?php echo $presentdays;?></td>
							<td align="center" class="narmal"><?php echo $absent;?><?php if($absent!= 0) { ?>&nbsp;<a href="javascript:void(0)" onclick="window.open('?pid=56&action=class_report_absent&at_std_class_report=<?php echo $at_std_class_report;?>&caid=<?php echo $studentreport['at_reg_no']."&cadf=$from_acad&cadt=$to_acad" ;?>',null,'width=600,height=400,left=50,top=30,scrollbars=yes,menubar=yes');"><?php echo viewIcon();?></a><?php } ?></td>
						   <?php $percent = ($presentdays/$workdaysdd['COUNT(`at_attendance_date`)']) * 100; ?>
							<td align="center" class="narmal"><?php echo sprintf("%01.2f",$percent)."%";?></td>
							</tr>
	<?php 
			$rw++;
			$slno++;
			} ?>
			 <tr>
				 <td align="center" colspan="7"><input type="button" value="Print" onclick="newWindowOpen ('?pid=56&action=print_class_report<?php echo $printpassurl;?>');" style="cursor:pointer;" class="bgcolor_02"/></td>
				 
			</tr>   
				
	<?php			        	
	 }  
	 
	  elseif($studentReportList == "") {?>
		<tr>
		  <td align='center' colspan="7" valign="middle" class='narmal'>No records found</td>
		</tr>
		<?php } 
	
	if(is_array($studentReportList_date) && count($studentReportList_date)>0 && $class_student_report_submit != "") {
	 ?>
			<tr class="bgcolor_02">
							<td width="6%" height="26" align="center"><span class="admin">S.No</span></td>
				<td width="7%" align="center"><span class="admin">Reg&nbsp;#</span></td>
				<td width="11%" align="center"><span class="admin">Student</span></td>
				<td width="28%" align="center"><span class="admin">School Working Days</span></td>
				<td width="13%" align="center"><span class="admin">&nbsp;Present days</span></td>
				<td width="17%" align="center"><span class="admin">&nbsp;Absent days</span></td>
							<td width="18%" align="center"><span class="admin">&nbsp;%</span></td>
						  </tr>
<?php						
$rw = 1;
$slno = $start+1;

foreach ($studentReportList_date as $studentreport)
{
if($rw%2==0)
$rowclass = "even";
else
$rowclass = "odd";
$reg = $studentreport['at_reg_no'];
$workdays_date = "SELECT COUNT(`at_attendance_date`) FROM `es_attend_student` WHERE `at_attendance_date`  BETWEEN '$from' AND '$to'  AND `at_std_class`='$at_std_class_report' AND `at_reg_no`='$reg'";
$workdaysdd_date =  getarrayassoc($workdays_date);

$present_date = "SELECT COUNT(`at_attendance_date`) FROM `es_attend_student` WHERE  `at_attendance_date`  BETWEEN '$from' AND '$to'  AND `at_attendance` = 'P' AND `at_reg_no` = '$reg' AND `at_std_class` = '$at_std_class_report' ";
$presentdays_date =  getarrayassoc($present_date);

$absent = $workdaysdd_date['COUNT(`at_attendance_date`)'] - $presentdays_date['COUNT(`at_attendance_date`)'];
?>		             <tr class="<?php echo $rowclass;?>">
							<td align="center" class="narmal"><?php echo $slno;?></td>
							<td align="center" class="narmal">SM<?php echo $studentreport['at_reg_no']; ?></td>
							<td align="center" class="narmal"><?php echo $studentreport['at_stud_name']; ?></td>
							<td align="center" valign="middle" class="narmal"><?php echo $workdaysdd_date['COUNT(`at_attendance_date`)'];?></td>
							<td align="center" class="narmal"><?php echo $presentdays_date['COUNT(`at_attendance_date`)'];?></td>
							<td align="center" class="narmal"><?php echo $absent;?><?php if($absent!= 0) { ?>&nbsp;<a href="javascript:void(0)" onclick="window.open('?pid=56&action=class_report_absent_date&at_std_wise_class_report=<?php echo $at_std_wise_class_report;?>&caid=<?php echo $studentreport['at_reg_no']."&from=$from&to=$to" ;?>',null,'width=600,height=400,left=50,top=30,scrollbars=yes,menubar=yes');"><?php echo viewIcon();?></a><?php } ?></td>
						   <?php $percent = ($presentdays_date['COUNT(`at_attendance_date`)']/$workdaysdd_date['COUNT(`at_attendance_date`)']) * 100; ?>
							<td align="center" class="narmal"><?php echo sprintf("%01.2f",$percent)."%";?></td>
							</tr>
	<?php 
			$rw++;
			$slno++;
			} ?>
		
		<tr>
		
		<td align="center" colspan="7"> <input type="button" value="Print" onclick="newWindowOpen ('?pid=56&action=print_class_report<?php echo $printpassurl;?>');" style="cursor:pointer;" class="bgcolor_02"/></td>
		
		</tr>
		
	<?php	} 
	elseif ($studentReportList_date=="") {
		   ?>
		  <tr>
		<td align='center' colspan="7" valign="middle" class='narmal'><!--No records found --></td>
		   </tr>
	
	<?php }	
		
	}		
	?> 
						  </table>
						  </td>
					  </tr>
			 
					</table></td>
					<td width="1" class="bgcolor_02"></td>
    </tr>
	<tr>
		<td height="1" colspan="3" class="bgcolor_02"></td>
	</tr>
</table>
<?php } 
/*Start of students classwise Print Page */

 if ($action == 'print_class_report') { ?>
<table width="98%" border="0" cellspacing="0" cellpadding="0">
<tr>
		<td height="19" colspan="4"></td>
	  </tr>
	  <tr>
		<td height="25" colspan="4" class="bgcolor_02" align="left">&nbsp;<span class="admin">Class Report</span></td>
  </tr>
	  <tr>
	 <td width="4%">&nbsp;</td>
	 </tr>
	 <tr>
		<td align="left" class="adminfont" >Class:</td>
	   <td width="79%" colspan="3" align="left" class="naramal">&nbsp;&nbsp;&nbsp;<?php echo $className['es_classname'];?></td>
  </tr>
	<tr>
			<td colspan="4" align="left">&nbsp;</td>
  </tr>
  <?php if(isset($from)) { ?>
   <tr>
	<td align="left" class="adminfont">From:</td>
	<td align="left" class="naramal">&nbsp;&nbsp;&nbsp;<?php echo displaydate($from);?></td>
	<td width="2%"align="left" class="adminfont">&nbsp;&nbsp;&nbsp;To:</td>
	<td width="15%" align="left" class="naramal">&nbsp;&nbsp;&nbsp;<?php echo displaydate($to);?></td>
  </tr>
  <?php } ?>
  <tr>
		<td align="left" valign="top" colspan="4"><table width="100%" border="0" cellspacing="4" cellpadding="0">
  <tr>
  		<td height="25" align="left" valign="middle" colspan="4"><table width="100%" border="0" cellspacing="1">
<?php if(isset($at_std_class_report) && $at_std_class_report!="" ) {?>
<?php if(is_array($studentReportList) && count($studentReportList)>0 && $from =="") { ?>

  <tr class="bgcolor_02">
	<td width="8%" height="26" align="center"><span class="admin">S.No</span></td>
	<td width="10%" align="center"><span class="admin">Reg&nbsp;#</span></td>
	<td width="22%" align="center"><span class="admin">Student&nbsp;Name </span></td>
	<td width="20%" align="center"><span class="admin">School&nbsp;Working &nbsp;Days</span></td>
	<td width="21%" align="center"><span class="admin">Present&nbsp;days</span></td>
	 <td width="21%" align="center"><span class="admin">Absent&nbsp;days</span></td>
	<td width="19%" align="center"><span class="admin">%</span></td>
  </tr>
<?php						
		 
		 $rw = 1;
         $slno = $start+1;
		 
foreach ($studentReportList as $studentreport)
      {
	if($rw%2==0)
		$rowclass = "even";
		else
		$rowclass = "odd";
		$reg = $studentreport['at_reg_no'];
		$workdaysdd = getarrayassoc("SELECT COUNT(`at_attendance_date`) FROM `es_attend_student` WHERE `at_attendance_date` BETWEEN  '$pcf' AND  '$pct' AND `at_std_class`='$at_std_class_report' AND `at_reg_no`='$reg'");
	    $presentdays =  sqlnumber("SELECT * FROM `es_attend_student` WHERE `at_attendance_date` BETWEEN  '$pcf' AND  '$pct' AND `at_attendance` = 'P' AND `at_reg_no` = '$reg' AND `at_std_class` = '$at_std_class_report' ");
		
	
?>		             
	<tr class="<?php echo $rowclass;?>">
		<td align="center" class="narmal"><?php echo $slno;?></td>
		<td align="center" class="narmal">SM<?php echo $studentreport['at_reg_no']; ?></td>
		<td align="center" class="narmal"><?php echo $studentreport['at_stud_name']; ?></td>
		<td align="center" valign="middle" class="narmal"><?php echo $workdaysdd['COUNT(`at_attendance_date`)'];?></td>
		<td align="center" class="narmal"><?php echo $presentdays;?></td>
		<td align="center" class="narmal"><?php echo $workdaysdd['COUNT(`at_attendance_date`)'] - $presentdays;?></td>
	   <?php $percent = ($presentdays/$workdaysdd['COUNT(`at_attendance_date`)']) * 100; ?>
		<td align="center" class="narmal"><?php echo sprintf("%01.2f",$percent)."%";?></td>
	</tr>
<?php 
		$rw++;
        $slno++;
		} ?>
		<tr>
		     <td align="center">&nbsp;</td>
			 <td align="center">&nbsp;</td>
			 <td align="center">&nbsp;</td>
			 
		</tr>
 <?php                   	
 }  
 }
  

if(is_array($studentReportList_date) && count($studentReportList_date)>0  && $from!="" && $to!="") {
 
 ?>
	    <tr class="bgcolor_02">
			<td width="8%" height="26" align="center"><span class="admin">S.No</span></td>
			<td width="10%" align="center"><span class="admin">Registration&nbsp;#</span></td>
			<td width="22%" align="center"><span class="admin">Student&nbsp;Name </span></td>
			<td width="20%" align="center"><span class="admin">School&nbsp;Working&nbsp; Days</span></td>
			<td width="21%" align="center"><span class="admin">Present&nbsp;days</span></td>
			<td width="21%" align="center"><span class="admin">Absent&nbsp;days</span></td>
			<td width="19%" align="center"><span class="admin">%</span></td>
        </tr>
<?php						
		 
		 $rw = 1;
         $slno = $start+1;
		 
foreach ($studentReportList_date as $studentreport)
      {
	if($rw%2==0)
		$rowclass = "even";
		else
		$rowclass = "odd";
		$reg = $studentreport['at_reg_no'];
		$workdays_date = "SELECT COUNT(`at_attendance_date`) FROM `es_attend_student` WHERE `at_attendance_date`  BETWEEN '$from' AND '$to'  AND `at_std_class`='$at_std_class_report' AND `at_reg_no`='$reg'";
	$workdaysdd_date =  getarrayassoc($workdays_date);
	
	$present_date = "SELECT COUNT(`at_attendance_date`) FROM `es_attend_student` WHERE  `at_attendance_date`  BETWEEN '$from' AND '$to'  AND `at_attendance` = 'P' AND `at_reg_no` = '$reg' AND `at_std_class` = '$at_std_class_report' ";
	$presentdays_date =  getarrayassoc($present_date);
?>		             <tr class="<?php echo $rowclass;?>">
                        <td align="center" class="narmal"><?php echo $slno;?></td>
                        <td align="center" class="narmal">SM<?php echo $studentreport['at_reg_no']; ?></td>
                        <td align="center" class="narmal"><?php echo $studentreport['at_stud_name']; ?></td>
                        <td align="center" valign="middle"><?php echo $workdaysdd_date['COUNT(`at_attendance_date`)'];?></td>
                        <td align="center" class="narmal"><?php echo $presentdays_date['COUNT(`at_attendance_date`)'];?></td>
						<td align="center" class="narmal"><?php echo $workdaysdd_date['COUNT(`at_attendance_date`)'] - $presentdays_date['COUNT(`at_attendance_date`)'];?></td>
                       <?php $percent = ($presentdays_date['COUNT(`at_attendance_date`)']/$workdaysdd_date['COUNT(`at_attendance_date`)']) * 100; ?>
						<td align="center" class="narmal"><?php echo sprintf("%01.2f",$percent)."%";?></td>
                        </tr>
<?php 
		$rw++;
        $slno++;
		} ?>
	<tr>
		     <td align="center">&nbsp;</td>
			 <td align="center">&nbsp;</td>
			 <td align="center">&nbsp;</td>
			 
			 
		</tr>
<?php		
	} 
	
		
?> 
                      </table>
                      </td>
                  </tr>
</table>
		</td>
				
   </tr>
</table>

		
<?php } 
/*Start of students Absentees  classwise Print Page */
if ($action == 'class_report_absent') { ?>
<table width="100%" height="81" border="0">
				<tr >
                        <td height="20" align="left" colspan="6" class="bgcolor_02"><span class="admin">&nbsp;Absentee&nbsp;Record</span></td>
				</tr>
                <tr >
                        <td width="18%" height="18" align="right"><span class="admin">Class</span></td>
                        <td width="23%" align="left"><span class="narmal">:<?php echo classname($at_std_class_report); ?></span></td>
                        <td width="30%" align="right"><span class="admin">Reg.No</span></td>
						 <td width="30%" align="left"><span class="narmal">:<?php echo $caid; ?></span></td>
						<td height="10" align="left" colspan="2" ></td>
				</tr>	
					
<?php if (is_array($class_absenties)&& count($class_absenties)>0 ) { 
?>
<tr class="bgcolor_02">
	<td width="18%" height="18" align="center"><span class="admin">S.No</span></td>
	<td width="23%" align="center"><span class="admin">Student Name</span></td>
	<td width="30%" align="center"><span class="admin">Absent Date</span></td>
	<td width="30%" align="center"><span class="admin">Remarks</span></td>
	<td width="30%" align="center"><span class="admin">Day</span></td>
	<td width="29%" align="center"><span class="admin">week</span></td>
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
		<td align="center" class="narmal"><?php echo $eachabsent['at_stud_name'];?></td>
		<td align="center" class="narmal"><?php echo displayDate($eachabsent['at_attendance_date']);?></td>
		<td align="center" class="narmal"><?php echo $eachabsent['at_staff_remarks']; ?></td>
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
	<tr><td align="right" height="50" colspan="8"><input type="button" class="bgcolor_02" value="print" onclick="window.print();" style="cursor:pointer;"></td></tr>
	 </table>
<?php } 
/*End of students Absentees  classwise Print Page */
/*Start of students Absentees  classwise Print Datewise Page */
if ($action == 'class_report_absent_date') { ?>
			<table width="100%" height="81" border="0">
				<tr >
                        <td height="20" align="left" colspan="6" class="bgcolor_02"><span class="admin">&nbsp;Absentee&nbsp;Record</span></td>
				</tr>
                <tr >
                        <td width="18%" height="18" align="right"><span class="admin">Class</span></td>
                        <td width="23%" align="left"><span class="narmal">:<?php echo classname($at_std_wise_class_report); ?></span></td>
                        <td width="30%" align="right"><span class="admin">Reg.No</span></td>
						 <td width="30%" align="left"><span class="narmal">:<?php echo $caid; ?></span></td>
						<td height="10" align="left" colspan="2" ></td>
				</tr>		
					
<?php if (is_array($class_absenties)&& count($class_absenties)>0 ) { 
?>
					  <tr class="bgcolor_02">
                        <td width="18%" height="18" align="center"><span class="admin">S.No</span></td>
                        <td width="23%" align="center"><span class="admin">Student Name</span></td>
                        <td width="30%" align="center"><span class="admin">Absent Date</span></td>
						 <td width="30%" align="center"><span class="admin">Remarks</span></td>
						 <td width="30%" align="center"><span class="admin">Day</span></td>
                        <td width="29%" align="center"><span class="admin">week</span></td>
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
?>                      <tr class="<?php echo $rowclass;?>">
                        <td align="center" class="narmal"><?php echo $slno;?></td>
                        <td align="center" class="narmal"><?php echo $eachabsent['at_stud_name'];?></td>
                        <td align="center" class="narmal"><?php echo displayDate($eachabsent['at_attendance_date']);?></td>
						<td align="center" class="narmal"><?php echo stripslashes($eachabsent['at_remarks']); ?></td>
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
					<tr><td align="right" height="50" colspan="8"><input type="button" class="bgcolor_02" value="print"onclick="window.print();" style="cursor:pointer;"></td></tr>
					  </table>

            
<?php } 
/*End of students Absentees  classwise Print Datewise Page */
/*End of students Attendance classwise Web Page */
/*Start of staff Attendance Web Page */

if($action == 'staff_report') { ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
	 </tr>
	<tr>
		<td height="25" colspan="3" class="bgcolor_02">&nbsp;<strong>My Attendance Record </strong></td>
	</tr>
	<tr>
	<td width="1" class="bgcolor_02"></td>
                <td height="25" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font><br /></td>
				<td width="1" class="bgcolor_02"></td>
                 
              </tr>	
    <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="4" cellpadding="0">
                  <tr>
                    <td align="left" valign="top"><table width="100%" border="0" cellspacing="5" cellpadding="0">
                      <form action="" method="post" name="attend_staff_report" >
		             <tr>
                        <td class="narmal">From</td>
                       <td class="narmal"><table width="100%" border="0">
  <tr>
    <td width="22%" align="left" valign="middle"><input class="plain" name="dc1"  value="<?php
										          if (isset($dc1)){ 
														 echo $_POST['dc1'];
														 }
														 ?>"
														 
														  size="12" onfocus="this.blur()" readonly="readonly" /></td>
    <td width="12%" align="left" valign="middle"> <a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fStartPop(document.attend_staff_report.dc1,document.attend_staff_report.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fStartPop(document.attend_stud_report.dc1,document.attend_stud_report.dc2);return false;" ></a></td>
    <td width="66%" align="left" valign="middle"><font color="#FF0000">*</font></td>
  </tr>
</table>

					   
					  </td>
                        <td  class="narmal">To</td>
                       <td  class="narmal">
					   <table width="100%" border="0">
  <tr>
    <td width="22%" align="left" valign="middle"><input class="plain" name="dc2" value="<?php
										          if (isset($dc2)){ 
														 echo $_POST['dc2'];
														 }
														 ?>" size="12" onfocus="this.blur()" readonly="readonly" /></td>
    <td width="13%" align="left" valign="middle"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fEndPop(document.attend_staff_report.dc1,document.attend_staff_report.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fStartPop(document.attend_stud_report.dc1,document.attend_stud_report.dc2);return false;" ></a></td>
    <td width="65%" align="left" valign="middle"> <font color="#FF0000">*</font></td>
  </tr>
</table>

					   
					   
					  </td>
                     <td  class="narmal" align="left"><input type="submit" name="attend_staff_report_date_submit" value="Search" style="cursor:pointer;"  class="bgcolor_02" /></td>
					
					  </tr>
             
                     
             
                      <tr>
                        <td height="10" colspan="4" class="narmal"></td>
                        </tr>
                      </form>
					   <iframe width=132 height=142 name="gToday:contrast:agenda.js" id="gToday:contrast:agenda.js" src="<?php echo JS_PATH ?>/DateRange/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>
					  </table></td>
                  </tr>
                  <tr>
                    <td height="25" align="left" valign="middle"><table width="100%"  border="0">
                    

<?php  if(is_array($staffReportList) && count($staffReportList)>0 && $workdays_staff['COUNT(`at_staff_date`)']!=0 && $attend_staff_report_date_submit == "") { ?>					  
					 <tr class="bgcolor_02">
                        
                       <td width="33%" align="center"><span class="admin">School Working Days</span></td>
                       <td width="19%" align="center"><span class="admin">Present days</span></td>
					   <td width="26%" align="center"><span class="admin">Absent days</span></td>
                       <td width="13%" align="center"><span class="admin">&nbsp;%</span></td>
                      </tr>
<?php						
		 
		 $rw = 1;
         $slno = $start+1;
foreach ($staffReportList as $staffreport)
      {
	if($rw%2==0)
		$rowclass = "even";
		else
		$rowclass = "odd";
		$absent = $workdays_staff['COUNT(`at_staff_date`)'] - $presentdays_staff['COUNT(`at_staff_date`)'];
		
?>		
					  <tr class="<?php echo $rowclass;?>" height="23">
                        
                        <td align="center" ><?php echo $workdays_staff['COUNT(`at_staff_date`)'];?></td>
                        <td align="center"><?php echo $presentdays_staff['COUNT(`at_staff_date`)'];?></td>
						<td align="center" class="narmal"><?php echo $absent;?><?php if($absent!= 0) { ?>&nbsp;<a href="javascript:void(0)" onclick="window.open('?pid=56&action=staff_report_absent&caid=<?php echo $staffreport['at_staff_id'];?>',null,'width=600,height=400,left=50,top=30,scrollbars=yes,menubar=yes');"><?php echo viewIcon();?></a><?php } ?></td>
                        <?php if($workdays_staff['COUNT(`at_staff_date`)']!="") { 
						$percent_staff = ($presentdays_staff['COUNT(`at_staff_date`)']/$workdays_staff['COUNT(`at_staff_date`)']) * 100; ?>
						<td align="center"><?php echo sprintf("%01.2f",$percent_staff)."%";?></td>
                        <?php 
						}
						else {
						?>
						<td width="0%" align="center">&nbsp;</td>
						<?php } ?>
					 </tr>
<?php 
		$rw++;
        $slno++;
		} 
                    	
}
else {
		if(!isset($attend_staff_report_date_submit) && $workdays_staff['COUNT(`at_staff_date`)'] ==0 && $dc1!="")
		{ ?>
		       <tr>
			  <td align='center' class="narmal" colspan="5">No records found</td>
			   </tr>
       <?php }
}
if(is_array($staffReportList_date) && count($staffReportList_date)>0 && $workdays_staff_date['COUNT(*)']!=0 && $attend_staff_report_date_submit != "") { ?>
	    <tr class="bgcolor_02" height="23">
                      
                 <td width="33%" align="center"><span class="admin">School Working Days</span></td>
                <td width="19%" align="center"><span class="admin">Present days</span></td>
				<td width="26%" align="center"><span class="admin">Absent days</span></td>
                <td width="13%" align="center"><span class="admin">&nbsp;%</span></td>
                      </tr>
<?php						
		
		 $rw = 1;
         $slno = $start+1;
foreach ($staffReportList_date as $staffreport)
      {
	if($rw%2==0)
		$rowclass = "even";
		else
		$rowclass = "odd";
		$absent = $workdays_staff_date['COUNT(*)'] - $presentdays_staff_date['COUNT(*)'];
		
?>		
					  <tr class="<?php echo $rowclass;?>">
                        <td align="center" ><?php echo $workdays_staff_date['COUNT(*)'];?></td>
                        <td align="center"><?php echo $presentdays_staff_date['COUNT(*)'];?></td>
						<td align="center" class="narmal"><?php echo $absent;?><?php if($absent!= 0) { ?>&nbsp;<a href="javascript:void(0)" onclick="window.open('?pid=56&action=staff_report_absent_date&caid=<?php echo $staffreport['at_staff_id']."&from=$from&to=$to";?>',null,'width=600,height=400,left=50,top=30,scrollbars=yes,menubar=yes');"><?php echo viewIcon();?></a><?php } ?></td>
                        <?php if($workdays_staff_date['COUNT(*)']!=0) { 
						$percent_staff = ($presentdays_staff_date['COUNT(*)']/$workdays_staff_date['COUNT(*)']) * 100; ?>
						<td align="center"><?php echo sprintf("%01.2f",$percent_staff)."%";?></td>
                        <?php 
						}
						else {
						?>
						<td align="center">&nbsp;</td>
						<?php } ?>
					 </tr>
<?php 
		$rw++;
        $slno++;
		} 
}
else {
		if(isset($attend_staff_report_date_submit) && $workdays_staff_date['COUNT(*)']==0 && $dc1!="")
		{
		       ?><tr>
			<td align='center' class="narmal" colspan="5">No records found</td>
			   </tr>
			   <?php 
       }
}


?> 
               
                      </table>
                      </td>
                  </tr>
                </table></td>
				<td width="1" class="bgcolor_02"></td>
              </tr>
	<tr>
		<td height="1" colspan="3" class="bgcolor_02"></td>
	</tr>
</table>
<?php 	} 
if ($action == 'staff_report_absent') { ?>
<table width="100%" height="81" border="0">
				<tr >
                        <td height="20" align="left" class="bgcolor_02" colspan="5"><span class="admin">My Absence&nbsp;Report</span></td>
				</tr>
				<tr><td colspan="5">
				<table width="100%">
				<?php $staff_arr = get_staffdetails($caid);?>
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
				</tr>	
					
<?php if (is_array($staff_absenties)&& count($staff_absenties)>0 ) { 
?>
					  <tr class="bgcolor_02">
                        
                       
                        <td width="16%" align="center"><span class="admin">Absent Date</span></td>
                         <td width="15%" align="center"><span class="admin">Remarks</span></td>
						 <td width="22%" align="center"><span class="admin">Day</span></td>
						  <td width="28%" align="center"><span class="admin">Absent/Leave</span></td>
                        <td width="19%" align="center"><span class="admin">week</span></td>
                      </tr>
<?php						
		 $rw = 1;
         $slno = $start+1;
foreach ($staff_absenties as $eachabsent)
      {
	if($rw%2==0)
		$rowclass = "even";
		else
		$rowclass = "odd";
		$day1	  = get_day($eachabsent['at_staff_date']);
		
	$week = DatabaseFormat($eachabsent['at_staff_date'], 'd');
		
	
	
?>                      <tr class="<?php echo $rowclass;?>">
                        
                        
                        <td align="center" class="narmal"><?php echo displayDate($eachabsent['at_staff_date']);?></td>
                        <td align="center" class="narmal"><?php echo stripslashes($eachabsent['at_staff_remarks']);?></td>
						<td align="center" class="narmal"><?php echo  DatabaseFormat($eachabsent['at_staff_date'], 'l');?></td>
						<td align="center" class="narmal"><?php if ($eachabsent['at_staff_attend'] == "A") { echo "Absent"; } elseif ($eachabsent['at_staff_attend'] == "L") { echo "Leave";}elseif ($eachabsent['at_staff_attend'] == "H") { echo "Half Day Leave";}?></td>
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
<?php }
if ($action == 'staff_report_absent_date') { ?>
<table width="100%" height="81" border="0">
				<tr >
                        <td height="20" align="left"><span class="admin">Absentees&nbsp;Record</span></td>
				</tr>	
				<tr><td colspan="5">
				<table width="100%">
				<?php $staff_arr = get_staffdetails($caid);?>
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
				</tr>		
					
<?php if (is_array($staff_absenties)&& count($staff_absenties)>0 ) { 
?>
					  <tr class="bgcolor_02">
                        <td width="18%" height="18" align="center"><span class="admin">S.No</span></td>
                        <td width="23%" align="center"><span class="admin">Staff Name</span></td>
                        <td width="30%" align="center"><span class="admin">Absent Date</span></td>
						<td width="27%" align="center"><span class="admin">Absent/Leave</span></td>
						 <td width="30%" align="center"><span class="admin">Day</span></td>
                        <td width="29%" align="center"><span class="admin">week</span></td>
                      </tr>
<?php						
		 $rw = 1;
         $slno = $start+1;
foreach ($staff_absenties as $eachabsent)
      {
	if($rw%2==0)
		$rowclass = "even";
		else
		$rowclass = "odd";
		$day1	  = get_day($eachabsent['at_staff_date']);
		
	$week = DatabaseFormat($eachabsent['at_staff_date'], 'd');
		
	
	
?>                      <tr class="<?php echo $rowclass;?>">
                        <td align="center" class="narmal"><?php echo $slno;?></td>
                        <td align="center" class="narmal"><?php echo $eachabsent['at_staff_name'];?></td>
                        <td align="center" class="narmal"><?php echo displayDate($eachabsent['at_staff_date']);?></td>
						<td align="center" class="narmal"><?php if ($eachabsent['at_staff_attend'] == "A") { echo "Absent"; } elseif ($eachabsent['at_staff_attend'] == "L") { echo "Leave";}elseif ($eachabsent['at_staff_attend'] == "H") { echo "Half Day Leave";}?></td>
						<td align="center" class="narmal"><?php echo  DatabaseFormat($eachabsent['at_staff_date'], 'l');?></td>
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
<?php } ?>