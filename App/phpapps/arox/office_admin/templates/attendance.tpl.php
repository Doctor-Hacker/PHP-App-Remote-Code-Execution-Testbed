  <script language="javascript">
function newWindowOpen(href)
{
    window.open(href, null,'width=900,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');
	

}
</script>
<?php 
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
		header('location: ./?pid=1&unauth=0');
		exit;
	}
	if ($action == 'slip') {
/*
*Start of Attendance Slips Web Page
*/	

?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="22" align="center" valign="top" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:17px; color:#000000; text-decoration:underline; padding:8px; font-weight:bold;">This Feature Available at  Full Version at <a href="http://www.arox.in" target="_blank">www.arox.in</a></td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
</table>
<?php } 
/*
*End of Attendance Slips Web Page
*/	
if($action=='printslip') { 

$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','','ATTENDANCE','ATTENDANCE SLIPS','".$es_assid."','Print Attendance Slips ','".$_SERVER['REMOTE_ADDR']."',NOW())";
$log_insert_exe=mysql_query($log_insert_sql);




/*
*Start of Attendance Slips Print Page
*/	
?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="22" align="center" valign="top" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:17px; color:#000000; text-decoration:underline; padding:8px; font-weight:bold;">This Feature Available at  Full Version at <a href="http://www.arox.in" target="_blank">www.arox.in</a></td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
</table>
<?php }

/*
*End of Attendance Slips Print Page
*/	
 
if($action=='stud_attend' ){

/*
*Start of Enter Students Attendance Web Page
*/

?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
  </tr>
	<tr>
		<td height="25" colspan="3" class="bgcolor_02"><span class="admin">&nbsp;Students Attendance</span></td>
  </tr>
     <tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="right" valign="top">
		<font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font><br />		
		<td width="1" class="bgcolor_02"></td>
  </tr>
<form name="attend_stud" action="" method="post" >
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="left" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
		  <tr>
		    <td width="22" align="center" valign="top" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:17px; color:#000000; text-decoration:underline; padding:8px; font-weight:bold;">This Feature Available at  Full Version at <a href="http://www.arox.in" target="_blank">www.arox.in</a></td>
	      </tr>
		  <tr>
		    <td align="left" valign="top">&nbsp;</td>
	      </tr>
	    </table></td>
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
/*
*Start of Enter Staff Attendance Web Page
*/
if($action=='staff_attend' ){
?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="22" align="center" valign="top" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:17px; color:#000000; text-decoration:underline; padding:8px; font-weight:bold;">This Feature Available at  Full Version at <a href="http://www.arox.in" target="_blank">www.arox.in</a></td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
</table>
<?php  } 
/*
*End of Enter Staff Attendance Web Page
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
                <td align="left" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="22" align="center" valign="top" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:17px; color:#000000; text-decoration:underline; padding:8px; font-weight:bold;">This Feature Available at  Full Version at <a href="http://www.arox.in" target="_blank">www.arox.in</a></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">&nbsp;</td>
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
		<td height="25" colspan="4" class="bgcolor_02" align="center"><span class="admin">&nbsp;Student Report</span></td>
	</tr>
	<tr>
		<td colspan="4">&nbsp;</td>
	</tr>
	<tr>
		<td width="7%" class="adminfont" >Class:</td>
		<td width="56%" class="narmal" align="left" >&nbsp;&nbsp;&nbsp;<?php echo $className['es_classname'];?></td>
<?php 
if (is_array($stud_name) && count($stud_name)>0) {

	foreach($stud_name as $each_name) {
?>
		<td width="13%" align="left" class="adminfont">Student&nbsp;Name&nbsp;: </td>
		<td width="24%" class="narmal" align="left"><?php echo $each_name['pre_name']; ?>&nbsp;(<?php echo $each_name['es_preadmissionid']; ?>)</td>
						
<?php 
}
}
?>
  </tr>
	<tr>
		<td colspan="4">&nbsp;</td>
	</tr>
    <?php if(isset($from)) { ?>
	<tr>
		<td class="adminfont">From:</td>
		<td class="narmal">&nbsp;&nbsp;&nbsp;<?php echo displaydate($from);?></td>
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
<td height="25" align="left" valign="middle">
<table width="100%"  border="0">
<?php 
$workdays = get_workingdays_studentwise1($from,$to,$at_std_wise_class_report,$at_stdregno,$at_std_wise_name);


if (is_array($studentwiseReportList)&& count($studentwiseReportList)>0 && $workdays!=0 ) { ?>

<tr class="bgcolor_02">
<?php /*?><td width="7%" height="18" align="center" class="admin"><span class="admin">S.No</span></td><?php */?>
<td width="24%" align="center" height="25" class="admin"><span class="admin">School&nbsp;Working&nbsp;Days</span></td>
<td width="19%" align="center" class="admin"><span class="admin">&nbsp;Present days</span></td>
<td width="25%" align="center" class="admin"><span class="admin">&nbsp;Absent days</span></td>
<td width="23%" align="center" class="admin"><span class="admin">&nbsp;Attendance&nbsp;%</span></td>
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
<?php /*?><td align="center" class="narmal"><?php echo $slno;?></td><?php */?>
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
		<td height="25" colspan="3" class="bgcolor_02">&nbsp;<span class="admin">Class Report</span></td>
	</tr>
     <tr>
		<td width="1" class="bgcolor_02"></td>
        <td height="20" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font></td>
        <td width="1" class="bgcolor_02"></td>
	</tr>
	<tr>
	<td width="1" class="bgcolor_02"></td>
		<td height="3" colspan="3"></td>
		<td width="1" class="bgcolor_02"></td>
	</tr>
	<tr>
		<td height="25" colspan="3" class="bgcolor_02">&nbsp;<span class="admin">Academic Year</span></td>
	</tr>
	<tr>
	<td width="1" class="bgcolor_02"></td>
		<td  colspan="3"></td>
		<td width="1" class="bgcolor_02"></td>
	</tr>	
    <tr>
					<td width="1" class="bgcolor_02"></td>
					<td align="left" valign="top">

				<form action="" method="post" name="attend_stud_report" >

					<table width="100%" border="0" cellspacing="0" cellpadding="0">
				
					  <tr>
						<td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">

						<tr>
						   		<td align="left" valign="middle" class="narmal">Class</td>
							<td align="left" valign="middle" class="narmal"><select name="at_std_class_report" >
							<option value="" >Select Class </option>
							<?php 
							$classlist = getallClasses();
							foreach($classlist as $indclass) {
							?>
							<option value="<?php echo $indclass['es_classesid']; ?>" <?php echo ($indclass['es_classesid']==$at_std_class_report)?"selected":""?> ><?php echo $indclass['es_classname']; ?></option>
							<?php } ?>
							</select>
					      <font color="#FF0000">*</font>							  </td>
								<td align="right" valign="middle" class="narmal">Academic Year&nbsp;</td>
							 	<td align="left" valign="middle" class="narmal"><select name="pre_year">
							 <?php 
							 foreach($school_details_res as $each_record) { ?>
							
							<option value="<?php echo $each_record['es_finance_masterid']; ?>" <?php if($each_record['es_finance_masterid']==$pre_year) { echo "selected"; }?>><?php echo displaydate($each_record['fi_ac_startdate'])." To ".displaydate($each_record['fi_ac_enddate']); ?></option>
							
							 <?php } ?>
						  </select></td>
						<td align="left" valign="middle" class="narmal">
						<input type="submit" name="school_year" class="bgcolor_02" style="cursor:pointer;" value="Submit"/></td>
			    </tr>
			<tr>
		<td height="3" colspan="5">&nbsp;</td>
	</tr>			
	<tr>
		<td height="25" colspan="5" class="bgcolor_02">&nbsp;Date Range</td>
	</tr>
	<tr>
		<td height="3" colspan="5"></td>
	</tr>		
						   <tr>
						   		<td align="left" valign="middle" class="narmal">From</td>
							 <td align="left" valign="middle" class="narmal"><input class="plain" name="dc1"  value="<?php
													  if (isset($dc1)){ 
															 echo $_POST['dc1'];
															 }
															 ?>"
															 
															  size="12" onfocus="this.blur()" readonly /><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fStartPop(document.attend_stud_report.dc1,document.attend_stud_report.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a><font color="#FF0000">*</font>							 </td>
								<td align="right" valign="middle" class="narmal">To&nbsp;</td>
						 	 <td align="left" valign="middle" class="narmal"><input class="plain" name="dc2" value="<?php
													  if (isset($dc2)){ 
															 echo $_POST['dc2'];
															 }
															 ?>" size="12" onfocus="this.blur()" readonly /><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fEndPop(document.attend_stud_report.dc1,document.attend_stud_report.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a><font color="#FF0000">*</font>							 </td>
								<td align="left" valign="middle" class="narmal"><input type="submit" name="class_student_report_submit" value="Search" style="cursor:pointer;" class="bgcolor_02" /></td>
				</tr>
					   
     <tr>
		<td height="5" colspan="5"></td>
	</tr>
					   <iframe width=132 height=142 name="gToday:contrast:agenda.js" id="gToday:contrast:agenda.js" src="<?php echo JS_PATH ?>/DateRange/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
	</iframe>
						</table></td>
					  </tr>
					  <tr>
						<td height="25" align="left" valign="middle"><table width="100%" border="0" cellspacing="1">
                        
	<?php if(isset($at_std_class_report) && $at_std_class_report!="") {?>
    
     <tr class="bgcolor_02">
							<?php /*?><td width="8%" height="26" align="center"><span class="admin">S.No</span></td><?php */?>
							<td width="10%" height="25px" align="center"><span class="admin">Reg&nbsp;#</span></td>
							<td width="22%" align="left"><span class="admin">&nbsp;Student Name </span></td>
							<td width="20%" align="center"><span class="admin">School Working  Days</span></td>
							<td width="21%" align="center"><span class="admin">&nbsp;Present days</span></td>
							<td width="21%" align="center"><span class="admin">&nbsp;Absent days</span></td>
							<td width="19%" align="center"><span class="admin">Attendance&nbsp;%</span></td>
						  </tr>
	<?php if(is_array($studentReportList) && count($studentReportList)>0 && $class_student_report_submit == "") { ?>
	
						 
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
						<?php /*?>	<td align="center" class="narmal"><?php echo $slno;?></td><?php */?>
							<td align="center" class="narmal"><?php echo $studentreport['at_reg_no']; ?></td>
							<td align="left" class="narmal">&nbsp;<?php echo $studentreport['at_stud_name']; ?></td>
							<td align="center" valign="middle"><?php echo $workdaysdd['COUNT(`at_attendance_date`)'];?></td>
							<td align="center" class="narmal"><?php echo $presentdays;?></td>
							<td align="center" class="narmal"><?php echo $absent;?><?php if($absent!= 0) { ?>&nbsp;
							<?php if(in_array('18_7',$admin_permissions)){?><a href="javascript:void(0)" onclick="window.open('?pid=27&action=class_report_absent&classid=<?php echo $at_std_class_report;?>&caid=<?php echo $studentreport['at_reg_no']."&cadf=$from_acad&cadt=$to_acad" ;?>',null,'width=600,height=400,left=50,top=30,scrollbars=yes,menubar=yes');"><?php echo viewIcon();?></a><?php }?>
<?php } ?></td>
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
				 <td> 
				 <?php if(in_array('18_8',$admin_permissions)){?><input type="button" value="Print" onclick="newWindowOpen ('?pid=27&action=print_class_report<?php echo $printpassurl;?>');" style="cursor:pointer; height:20px;" class="bgcolor_02"/><?php }?>
				 
				 </td>
			</tr>   
				
	<?php			        	
	 }  
	 
	  elseif($studentReportList == ""&& $class_student_report_submit == "") {
		   echo "<tr>";
		   echo "<td align='center' class='narmal' colspan='7'>No records found</td>";
		   echo "</tr>";
		} 
	
	if(is_array($studentReportList_date) && count($studentReportList_date)>0 && $class_student_report_submit != "") {
	 ?>
			<!--<tr class="bgcolor_02">
							<td width="8%" height="26" align="center"><span class="admin">S.No</span></td>
							<td width="10%" align="center"><span class="admin">Registration&nbsp;No</span></td>
							<td width="22%" align="center"><span class="admin">Student Name </span></td>
							<td width="20%" align="center"><span class="admin">School Working Days</span></td>
							<td width="21%" align="center"><span class="admin">&nbsp;Present days</span></td>
							<td width="21%" align="center"><span class="admin">&nbsp;Absent days</span></td>
							<td width="19%" align="center"><span class="admin">Attendance&nbsp;%</span></td>
						  </tr>-->
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
						<?php /*?>	<td align="center" class="narmal"><?php echo $slno;?></td><?php */?>
							<td align="center" class="narmal"><?php echo $studentreport['at_reg_no']; ?></td>
							<td align="center" class="narmal"><?php echo $studentreport['at_stud_name']; ?></td>
							<td align="center" valign="middle" class="narmal"><?php echo $workdaysdd_date['COUNT(`at_attendance_date`)'];?></td>
							<td align="center" class="narmal"><?php echo $presentdays_date['COUNT(`at_attendance_date`)'];?></td>
							<td align="center" class="narmal"><?php echo $absent;?><?php if($absent!= 0) { ?>&nbsp;<?php if(in_array('18_7',$admin_permissions)){?><a href="javascript:void(0)" onclick="window.open('?pid=27&action=class_report_absent_date&classid=<?php echo $at_std_class_report;?>&caid=<?php echo $studentreport['at_reg_no']."&from=$from&to=$to" ;?>',null,'width=600,height=400,left=50,top=30,scrollbars=yes,menubar=yes');"><?php echo viewIcon();?></a><?php } ?><?php } ?></td>
						   <?php $percent = ($presentdays_date['COUNT(`at_attendance_date`)']/$workdaysdd_date['COUNT(`at_attendance_date`)']) * 100; ?>
							<td align="center" class="narmal"><?php echo sprintf("%01.2f",$percent)."%";?></td>
							</tr>
	<?php 
			$rw++;
			$slno++;
			} ?>
		
		<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td > <?php if(in_array('18_8',$admin_permissions)){?><input type="button" value="Print" onclick="newWindowOpen ('?pid=27&action=print_class_report<?php echo $printpassurl;?>');" style="cursor:pointer; height:20px;" class="bgcolor_02"/><?php }?>
		
		</td></tr>
		
	<?php	} 
	elseif ($studentReportList_date=="" && $class_student_report_submit != "") {
		   
		   echo "<tr>";
		   echo "<td align='center' class='narmal' colspan='7'>No records found</td>";
		   echo "</tr>";
	
	}	
		
	}		
	?> 
						  </table>
					    </td>
					  </tr>
			 
					</table></form></td>
					<td width="1" class="bgcolor_02"></td>
    </tr>
	<tr>
		<td height="1" colspan="3" class="bgcolor_02"></td>
	</tr>
</table>
<?php } 
/*Start of students classwise Print Page */

 if ($action == 'print_class_report') { ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td height="19" colspan="4"></td>
	  </tr>
	  <tr>
		<td height="25" colspan="4" class="bgcolor_02" align="center">&nbsp;<span class="admin">Class Report</span></td>
	  </tr>
	  <tr>
	 <td width="4%">&nbsp;</td>
	 </tr>
	 <tr>
		<td class="adminfont" >Class:</td>
		<td width="79%" class="naramal" >&nbsp;&nbsp;&nbsp;<?php echo $className['es_classname'];?></td>
	 </tr>
	<tr>
			<td>&nbsp;</td>
	</tr>
  <?php if(isset($from)) { ?>
   <tr>
	<td class="adminfont">From</td>
	<td class="naramal">&nbsp;&nbsp;&nbsp;<?php echo displaydate($from);?></td>
	<td width="2%"align="left" class="adminfont">&nbsp;&nbsp;&nbsp;To</td>
	<td width="15%" class="naramal">&nbsp;&nbsp;&nbsp;<?php echo displaydate($to);?></td>
  </tr>
  <?php } ?>
  <tr>
		<td align="left" valign="top" colspan="4"><table width="100%" border="0" cellspacing="4" cellpadding="0">
  <tr>
  		<td height="25" align="left" valign="middle" colspan="4"><table width="100%" border="0" cellspacing="1">
<?php if(isset($at_std_class_report) && $at_std_class_report!="" ) {?>
<?php if(is_array($studentReportList) && count($studentReportList)>0 && $from =="") { ?>

  <tr class="bgcolor_02">
	<td width="11%" height="25" align="center"><span class="admin">S No</span></td>
	<td width="12%" align="center"><span class="admin">Reg #</span></td>
	<td width="23%" align="left"><span class="admin">Student Name </span></td>
	<td width="21%" align="center"><span class="admin">School Working Days</span></td>
	<td width="9%" align="center"><span class="admin">Present days</span></td>
	 <td width="6%" align="center"><span class="admin">Absent days</span></td>
	<td width="18%" align="center"><span class="admin">Attendance%</span></td>
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
		<td align="center" class="narmal"><?php echo $studentreport['at_reg_no']; ?></td>
		<td align="left" class="narmal"><?php echo $studentreport['at_stud_name']; ?></td>
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
			<td width="11%" height="25" align="center"><span class="admin">S No</span></td>
			<td width="12%" align="center"><span class="admin">Reg # </span></td>
			<td width="23%" align="left"><span class="admin">Student&nbsp;Name </span></td>
			<td width="21%" align="center"><span class="admin">School&nbsp;Working&nbsp; Days</span></td>
			<td width="9%" align="center"><span class="admin">Present&nbsp;days</span></td>
			<td width="6%" align="center"><span class="admin">Absent&nbsp;days</span></td>
			<td width="18%" align="center"><span class="admin">Attendance%</span></td>
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
                        <td align="center" class="narmal"><?php echo $studentreport['at_reg_no']; ?></td>
                        <td align="left" class="narmal"><?php echo $studentreport['at_stud_name']; ?></td>
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
	 <td height="25" align="left" class="bgcolor_02" colspan="6">&nbsp;Absentee&nbsp;Record</td>
	</tr>	
	<tr>
		<td height="20" align="left" colspan="6"><table width="100%" border="0">
  <tr>
    <td width="6%" align="left"><span class="admin">&nbsp;Class</span></td>
    <td width="3%" align="center">:</td>
    <td width="16%" align="left"><?php echo classname($classid);?></td>
    <td width="30%" align="left"><span class="admin">Registration Number</span></td>
    <td width="2%" align="center">:</td>
    <td width="43%" align="left"><?php echo $caid;?></td>
  </tr>
</table>
</td>
	</tr>	
					
<?php if (is_array($class_absenties)&& count($class_absenties)>0 ) { 
?>
<tr class="bgcolor_02">
	<td width="7%" height="25" align="center"><span class="admin">S No</span></td>
	<td width="18%" align="left"><span class="admin">Student Name</span></td>
	<td width="16%" align="center"><span class="admin">Absent On </span></td>
	<td width="12%" align="left"><span class="admin">Day</span></td>
	<td width="29%" align="left"><span class="admin">Remarks</span></td>
	<td width="18%" align="center"><span class="admin">week</span></td>
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
		<td height="20" align="left" class="narmal"><?php echo $eachabsent['at_stud_name'];?></td>
		<td align="center" class="narmal"><?php echo displayDate($eachabsent['at_attendance_date']);?></td>
		<td align="left" class="narmal"><?php echo  DatabaseFormat($eachabsent['at_attendance_date'], 'l');?></td>
		<td align="left" class="narmal"><?php echo $eachabsent['at_remarks'];?></td>
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
	<tr><td align="right" height="50" colspan="7"><input type="button" class="bgcolor_02" value="print" style="cursor:pointer; height:20px;" onclick="window.print();"></td></tr>
</table>
<?php } 
/*End of students Absentees  classwise Print Page */

/*Start of students Absentees  classwise Print Datewise Page */
if ($action == 'class_report_absent_date') { ?>
<table width="100%" height="81" border="0">
	<tr class="bgcolor_02">
		<td height="20" align="left" colspan="6"><span class="admin">&nbsp;Absentee&nbsp;Record</span></td>
	</tr>	
	<tr>
		<td height="20" align="left" colspan="6"><table width="100%" border="0">
  <tr>
    <td width="6%" align="left"><span class="admin">&nbsp;Class</span></td>
    <td width="3%" align="center">:</td>
    <td width="16%" align="left"><?php echo classname($classid);?></td>
    <td width="30%" align="left"><span class="admin">Registration Number</span></td>
    <td width="2%" align="center">:</td>
    <td width="43%" align="left"><?php echo $caid;?></td>
  </tr>
</table>
</td>
	</tr>	
					
<?php if (is_array($class_absenties)&& count($class_absenties)>0 ) { 
?>
	<tr class="bgcolor_02">
		<td width="7%" height="25" align="center"><span class="admin">S No</span></td>
		<td width="18%" align="left"><span class="admin">Student Name</span></td>
		<td width="14%" align="center"><span class="admin">Absent On</span></td>
        <td width="30%" align="left"><span class="admin">Remarks</span></td>
		<td width="13%" align="left"><span class="admin">Day</span></td>
		<td width="18%" align="center"><span class="admin">week</span></td>
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
		<td height="20" align="left" class="narmal"><?php echo $eachabsent['at_stud_name'];?></td>
		<td align="center" class="narmal"><?php echo displayDate($eachabsent['at_attendance_date']);?></td>
        <td align="left" class="narmal"><?php echo  stripslashes($eachabsent['at_remarks']);?></td>
		<td align="left" class="narmal"><?php echo  DatabaseFormat($eachabsent['at_attendance_date'], 'l');?></td>
        
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
	<tr><td align="right" height="50" colspan="7"><input type="button" class="bgcolor_02" value="print" style="cursor:pointer; height:20px;" onclick="window.print();"></td></tr>
</table>

            
<?php } 
/*End of students Absentees  classwise Print Datewise Page */
/*End of students Attendance classwise Web Page */
/*Start of Staff wise  Attendance  Web Page */ 
?>
<?php if ($action == 'staff_wise_report' ) { ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
  </tr>
	<tr>
		<td height="25" colspan="3" class="bgcolor_02"><span class="admin">&nbsp;<span class="admin">Employee Report</span></span></td>
	</tr>
    <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="4" cellpadding="0">
                  <tr>
                    <td align="left" valign="top">
					<form action="" method="post" name="staffwise_report" id="staffwise_report" >
					<table width="100%" border="0" cellspacing="3" cellpadding="0">
                     
					  <tr>
					    <td height="25" align="left" valign="middle" class="narmal">Department</td>
                        <td align="left" valign="middle" class="narmal"><select name="at_staffwise_dept" style="width:152px;" onchange="JavaScript:document.staffwise_report.submit();" >
                          <option value="">-Select-</option>
                          <?php foreach($getdeptlist as $eachrecord) { ?>
                          <option value="<?php echo $eachrecord['es_departmentsid'];?>" <?php echo ($eachrecord['es_departmentsid']==		 							$at_staffwise_dept)?"selected":""?>  ><?php echo $eachrecord['es_deptname'];?></option>
                          <?php } ?>
                        </select>
                        <font color="#FF0000">*</font></td>
                        <td width="619" align="left" valign="middle" class="narmal">&nbsp;</td>
                      </tr>
                      <tr>
                        <td width="222" height="25" align="left" valign="middle" class="narmal">Employee Id</td>
                        <td width="351" align="left" valign="middle" class="narmal"><select name="at_staffid" style="width:124px;" onchange="JavaScript:document.staffwise_report.submit();">
                          <option value="" >Select</option>
                          <?php 
						foreach($res_staffid as $each_staffid) {
						?>
                          <option value="<?php echo $each_staffid['es_staffid']; ?>" <?php echo ($each_staffid['es_staffid']==$at_staffid)?"selected":""?>><?php echo $each_staffid['es_staffid']; ?></option>
                          <?php } ?>
                        </select>
                        <font color="#FF0000">*</font></td>
                        
<td align="left" valign="middle">&nbsp;</td>
                      </tr>
				<tr>
				  <td height="25" align="left" valign="middle" ><span class="narmal">From</span></td>
					<td align="left" valign="middle" ><table width="94%" border="0" cellspacing="0" cellpadding="0">
						  <tr>
							
							<td width="10%"><input class="plain" name="dc1"  value="<?php
										          if (isset($dc1)){ 
														 echo $_POST['dc1'];
														 }
														 ?>"
														 
														  size="16" onfocus="this.blur()" readonly /></td>
							<td width="82%"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fStartPop(document.staffwise_report.dc1,document.staffwise_report.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a>&nbsp;<font color="#FF0000">*</font></td>
							<td width="8%" class="narmal"></td>
						  </tr>
				  </table></td>
					 <td align="left" valign="middle" ></td>
					</tr>
					<tr>
					  <td height="25" align="left" valign="middle">To</td>
					  <td align="left" valign="middle" class="narmal"><table  border="0" cellspacing="0" cellpadding="0">
						<tr>						  
						  <td ><input class="plain" name="dc2" value="<?php
										          if (isset($dc2)){ 
														 echo $_POST['dc2'];
														 }
														 ?>" size="16" onfocus="this.blur()" readonly /></td>
						  <td width="82%"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fEndPop(document.staffwise_report.dc1,document.staffwise_report.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a><font color="#FF0000">*</font></td>
						</tr>
				  </table></td>
					  <td align="left" valign="middle">&nbsp;</td>
					  </tr>
					<tr>
					 
					  <?php 
if (is_array($res_staff_name) && count($res_staff_name)>0) {
foreach($res_staff_name as $each_name) {
?>
             			 <td height="25" align="left" valign="middle">Employee Name</td>
                        <td width="351" align="left" valign="middle" class="narmal"><?php echo $each_name['st_firstname']."&nbsp;".$each_name['st_lastname']; ?></td>
						<?php }}?>
					     <td align="left" valign="middle">&nbsp;</td>
					</tr>
					<tr>
					  <td height="30" align="left" valign="middle">&nbsp;</td>
				      <td align="left" valign="middle"><input type="submit" name="staffwise_report_submit" value="Search" style="cursor:pointer; height:20px;" class="bgcolor_02" /></td>
						 <td align="left" valign="middle">&nbsp;</td>
					</tr>
					
				<iframe width=132 height=142 name="gToday:contrast:agenda.js" id="gToday:contrast:agenda.js" src="<?php echo JS_PATH ?>/DateRange/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe></table>
				</form> 
				</td>
                  </tr>
                  <tr>
                    <td height="25" align="left" valign="middle"><table width="100%"  border="0">
                     <?php if($staffwise_report_submit == 'Search' && count($errormessage)==0){ ?>
                     <tr class="bgcolor_02">
                       <?php /*?> <td width="18%" height="18" align="center"><span class="admin">S.No</span></td><?php */?>
                        <td width="25%" height="25" align="center"><span class="admin">School Working Days</span></td>
                        <td width="22%" align="center"><span class="admin">Present Days</span></td>
						<td width="30%" align="center"><span class="admin">Absent/Leave </span></td>
                        <td width="21%" align="center"><span class="admin">Attendance&nbsp;%</span></td>
                      </tr>
                     <?php } ?>
                     
                     
<?php if (is_array($Staffwise_report)&& $cnt_rec_atnd > 0 && $workdays!=0) { ?>

					 
<?php						
		 $rw = 1;
         $slno = $start+1;
foreach ($Staffwise_report as $eachstaff)
      {
	if($rw%2==0)
		$rowclass = "even";
		else
		$rowclass = "odd";
		
		$absent = $workdays - $presentdays;
		
	
?>                    <tr class="<?php echo $rowclass;?>">
                     <?php /*?>   <td align="center" class="narmal"><?php echo $slno;?></td><?php */?>
                        <td align="center" class="narmal"><?php echo $workdays;?></td>
                        <td align="center" class="narmal"><?php echo $presentdays;?></td>
						<td align="center"  class="narmal"><?php echo $absent;?><?php if($absent!= 0) {  ?>&nbsp;
						<?php if(in_array('18_9',$admin_permissions)){?><a href="javascript:void(0)" onclick="window.open('?pid=27&action=staff_report_absent_date&caid=<?php echo $at_staffid."&from=$from&to=$to";?>',null,'width=600,height=400,left=50,top=30,scrollbars=yes,menubar=yes');"><?php echo viewIcon();?></a><?php }?>
						
						
						 <?php } ?></td>
                        <?php if($workdays!="") { 
						$percent = ($presentdays/$workdays) * 100; ?>
						<td align="center" class="narmal"><?php echo sprintf("%01.2f",$percent)."%";?></td>
                        <?php 
						}
						else {
						?>
						<td width="2%" align="center" class="narmal"><?php echo "0%"; ?></td>
						<?php 
						
						$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."',' es_attend_staff','ATTENDANCE','EMPLOYEE REPORT','".$es_departmentsid."','PRINT STAFF REPORT','".$_SERVER['REMOTE_ADDR']."',NOW())";
$log_insert_exe=mysql_query($log_insert_sql);
						
						
						} ?>
						</tr>
<?php                  
					  $rw++;
                      $slno++;
				 }
?>
					  </table>
                      <table width="100%" height="33" border="0">
                        <tr>
                          <td align="center" valign="middle">
						  <?php if(in_array('18_10',$admin_permissions)){?> <input name="Submit25" type="button" onClick="newWindowOpen('?pid=27&action=print_staffwise_report<?php echo $staffwiseurl;?>');" class="bgcolor_02" style="cursor:pointer; height:20px;" value="Print" /><?php }?>
						  
						 </td>
</tr>
<?php 
}
 elseif($cnt_rec_atnd == 0  && $staffwise_report_submit == 'Search' && count($errormessage)==0) {
						echo "<tr ><td  align='center' colspan='7' class='narmal'>No records found</td></tr><tr><td  ></td>	</tr>";
				
				
				
				
					}
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
/*Start of Staff wise  Attendance  Print Page */ 
if ($action == 'print_staffwise_report' ) { ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td height="19" colspan="4"></td>
	</tr>
	<tr>
		<td height="25" colspan="4" class="bgcolor_02" align="center"><span class="admin">&nbsp;<span class="admin">Staff Report</span></span></td>
	</tr>
	<tr>
		<td width="77">&nbsp;</td>
	</tr>
	<tr><?php 
				if (is_array($res_staff_name) && count($res_staff_name)>0) {
				foreach($res_staff_name as $each_name) {
			?>
			<td align="left" class="adminfont" >Department:</td>
			<td width="706" align="left"  class="naramal" >&nbsp;&nbsp;&nbsp;<?php echo deptname($at_staffwise_dept);?>&nbsp;&nbsp;&nbsp;<span class="admin">Post &nbsp;:&nbsp;</span><?php echo postname($at_staffwise_dept); ?> &nbsp;&nbsp;&nbsp;<span class="admin">Emp Id &nbsp;:&nbsp;</span><?php echo  $each_name['es_staffid']; ?></td>
			
			<td width="263" align="right" class="adminfont">Employee Name&nbsp;:&nbsp;</td>
			<td width="168" align="left"  class="naramal"><?php echo $each_name['st_firstname']."&nbsp;".$each_name['st_lastname']; ?></td>
			<?php 
			
 $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."',' es_attend_staff','ATTENDANCE','EMPLOYEE REPORT','".at_stdregno."','PRINT STAFF REPORT','".$_SERVER['REMOTE_ADDR']."',NOW())";
$log_insert_exe=mysql_query($log_insert_sql);


			}
			}
			?>
			
  </tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
	<?php if(isset($from)) { ?>
			<td align="right" class="adminfont">From&nbsp;:&nbsp;</td>
			<td align="left" class="naramal"><?php echo displaydate($from);?></td>
			<td class="adminfont"align="right">&nbsp;&nbsp;&nbsp;To&nbsp;:</td>
			<td class="naramal">&nbsp;&nbsp;<?php echo displaydate($to);?></td>
	<?php } ?>
	</tr>
	<tr>
           		<td align="left" valign="top" colspan="4"><table width="100%" height="100%" border="0">
					<?php if (is_array($Staffwise_report)&& count($Staffwise_report)>0 && $workdays!=0) { ?>
					  <tr class="bgcolor_02">
						<?php /*?><td width="18%" height="18" align="center"><span class="admin">S.No</span></td><?php */?>
						<td width="26%" height="25" align="center"><span class="admin">School&nbsp;Working&nbsp;Days</span></td>
						<td width="18%" align="center"><span class="admin">Present&nbsp;Days</span></td>
						 <td width="29%" align="center"><span class="admin">Absent/Leave </span></td>
						 <td width="25%" align="center"><span class="admin">Attendance&nbsp;%</span></td>
					  </tr>
						<?php						
								 $rw = 1;
								 $slno = $start+1;
						foreach ($Staffwise_report as $eachstaff)
							  {
							if($rw%2==0)
								$rowclass = "even";
								else
								$rowclass = "odd";
								
							
						?>
						<tr class="<?php echo $rowclass;?>">
                       <?php /*?> <td align="center" class="narmal"><?php echo $slno;?></td><?php */?>
                        <td align="center" class="narmal"><?php echo $workdays;?></td>
                        <td align="center" class="narmal"><?php echo $presentdays;?></td>
						<td align="center" class="narmal"><?php echo $workdays - $presentdays;?></td>
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
						}
						?>
					  </table>
                      
			   </td>
  </tr>	 
</table>

<?php }
/*Start of Staff Attendance  Page */ 
if($action == 'staff_report') { ?>
<form action="" method="post" name="attend_staff_report" >
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
    </tr>
	<tr>
		<td height="25" colspan="3" class="bgcolor_02">&nbsp;<span class="admin">Staff  Report </span></td>
	</tr>    
    
    <tr>
		<td width="1" class="bgcolor_02"></td>
        <td height="20" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font></td>
        <td width="1" class="bgcolor_02"></td>
	</tr>
    <tr>
		<td width="1" class="bgcolor_02"></td>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">

						<tr class="bgcolor_02">
						  <td height="25" colspan="4" class="admin">&nbsp;&nbsp;Academic Year</td>
	      </tr>
						<tr>
						   		<td width="15%" height="30" class="narmal">Department</td>
							<td width="32%" class="narmal"><select name="at_staff_dept1" >
						<option value="">-Select-</option>
							<?php foreach($getdeptlist as $eachrecord) { ?>
							<option value="<?php echo $eachrecord['es_departmentsid'];?>" <?php echo ($eachrecord['es_departmentsid']==		 							$at_staff_dept1)?"selected":""?>  ><?php echo $eachrecord['es_deptname'];?></option>
			<?php } ?>
			</select> <font color="#FF0000">*</font></td>
								<td width="17%" class="narmal">Academic&nbsp;Year</td>
           <td width="36%" class="narmal"><select name="pre_year">
							 <?php 
							 foreach($school_details_res as $each_record) { ?>
							
							<option value="<?php echo $each_record['es_finance_masterid']; ?>" <?php if($each_record['es_finance_masterid']==$pre_year) { echo "selected"; }?>><?php echo displaydate($each_record['fi_ac_startdate'])." To ".displaydate($each_record['fi_ac_enddate']); ?></option>
							
							 <?php } ?>
							</select>								</td>
		  </tr>
						<tr>
						  <td height="30" class="narmal">&nbsp;</td>
						  <td class="narmal"><input type="submit" name="school_year2" class="bgcolor_02" style="cursor:pointer;" value="Submit"/></td>
						  <td class="narmal">&nbsp;</td>
						  <td class="narmal">&nbsp;</td>
			    </tr>
</table></td>
        <td width="1" class="bgcolor_02"></td>
	</tr>
     <tr>
		<td height="1" class="bgcolor_02" colspan="3" ></td>
	</tr>   
    
     <tr>
		<td width="1" class="bgcolor_02"></td>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">

						 <tr class="bgcolor_02">
						   <td colspan="4" class="admin" height="25">&nbsp;&nbsp;Date Range</td>
	      </tr>
						 <tr>
						   		<td width="16%" height="30" class="narmal">From</td>
						   <td width="31%" class="narmal"><input class="plain" name="dc1"  value="<?php
										          if (isset($dc1)){ 
														 echo $_POST['dc1'];
														 }
														 ?>"
														 
														  size="12" onfocus="this.blur()" readonly /><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fStartPop(document.attend_staff_report.dc1,document.attend_staff_report.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a><font color="#FF0000">*</font></td>
						   <td width="3%" class="narmal">To</td>
					 	   <td width="50%" class="narmal"><input class="plain" name="dc2" value="<?php
										          if (isset($dc2)){ 
														 echo $_POST['dc2'];
														 }
														 ?>" size="12" onfocus="this.blur()" readonly /><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fEndPop(document.attend_staff_report.dc1,document.attend_staff_report.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a><font color="#FF0000">*</font></td>
		  </tr>
						 <tr>
						   <td height="30" class="narmal">&nbsp;</td>
						   <td class="narmal"><input type="submit" name="attend_staff_report_date_submit" value="Search" style="cursor:pointer;" class="bgcolor_02" /></td>
						   <td class="narmal">&nbsp;</td>
						   <td class="narmal">&nbsp;</td>
			    </tr>

<iframe width=132 height=142 name="gToday:contrast:agenda.js" id="gToday:contrast:agenda.js" src="<?php echo JS_PATH ?>/DateRange/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe>
</table></td>
        <td width="1" class="bgcolor_02"></td>
	</tr>
     <tr>
		<td height="1" class="bgcolor_02" colspan="3" ></td>
	</tr>
    
    <tr>
		<td width="1" class="bgcolor_02" height="25"></td>
         <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  
                  <tr>
                    <td height="25" align="left" valign="middle"><table width="100%" height="80" border="0">
                    
<?php if(isset($at_staff_dept1) && $at_staff_dept1!="") {?>
<?php  if(is_array($staffReportList) && count($staffReportList)>0 &&  !isset($attend_staff_report_date_submit)) { ?>					  
					  <tr class="bgcolor_02">
                        <!--<td width="8%" height="24" align="center"><span class="admin">S.No</span></td>-->
                        <td width="12%" align="center"><span class="admin">Emp ID</span></td>
                        <td width="19%" align="left"><span class="admin">Emp Name</span></td>
						<td width="15%" align="left"><span class="admin">Post</span></td>
                        <td width="17%" height="25" align="center"><span class="admin">School Working Days</span></td>
                        <td width="9%" align="center"><span class="admin">Present days</span></td>
						<td width="12%" align="center"><span class="admin">Absent Leave</span></td>
                        <td width="15%" align="center"><span class="admin"> Attendance%</span></td>
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
		$name = $staffreport['at_staff_id'];
		$workdays_staff = getarrayassoc("SELECT  COUNT(`at_staff_date`) FROM `es_attend_staff` WHERE `at_staff_date` BETWEEN  '$from_acad' AND  '$to_acad' AND `at_staff_dept`='$at_staff_dept1' AND `at_staff_id` = '$name' ");
		
		$presentdays_staff = getarrayassoc("SELECT COUNT(`at_staff_date`) FROM `es_attend_staff` WHERE `at_staff_date` BETWEEN  '$from_acad' AND  '$to_acad' AND `at_staff_attend` = 'P' AND `at_staff_id` = '$name' AND `at_staff_dept` = '$at_staff_dept1'");
		
		
		$absent = $workdays_staff['COUNT(`at_staff_date`)'] - $presentdays_staff['COUNT(`at_staff_date`)'];
		//$staff_det = get_staffdetails($staffreport['at_staff_id']);
		
?>		
					  <tr class="<?php echo $rowclass;?>">
                       <?php /*?> <td align="center" class="narmal"><?php echo $slno;?></td><?php */?>
                        <td align="center" class="narmal"><?php echo $staffreport['at_staff_id']; ?></td>
                        <td align="left" class="narmal"><?php echo $staffreport['at_staff_name']; ?></td>
						 <td align="left" class="narmal"><?php echo postname($staffreport['at_staff_desig']); ?></td>
                        <td align="center" class="narmal"><?php echo $workdays_staff['COUNT(`at_staff_date`)'];?></td>
                        <td align="center" class="narmal"><?php echo $presentdays_staff['COUNT(`at_staff_date`)'];?></td>
						<td align="center" class="narmal"><?php echo $absent;?><?php if($absent!= 0) { ?>&nbsp;
						<?php if(in_array('18_11',$admin_permissions)){?><a href="javascript:void(0)" onclick="window.open('?pid=27&action=staff_report_absent&caid=<?php echo $staffreport['at_staff_id'];?>&sabf=<?php echo $from_acad; ?>&sabt=<?php echo $to_acad; ?>',null,'width=600,height=400,left=50,top=30,scrollbars=yes,menubar=yes');"><?php echo viewIcon();?></a><?php }?>
						
						
						<?php } ?></td>
                        <?php if($workdays_staff['COUNT(`at_staff_date`)']!="") { 
						$percent_staff = ($presentdays_staff['COUNT(`at_staff_date`)']/$workdays_staff['COUNT(`at_staff_date`)']) * 100; ?>
						<td align="center" class="narmal"><?php echo sprintf("%01.2f",$percent_staff)."%";?></td>
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
		} ?>
		<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>
		<?php if(in_array('18_12',$admin_permissions)){?><input type="button" onclick="newWindowOpen('?pid=27&action=print_staff_report<?php echo $staffurl;?>');" value="Print" style="cursor:pointer; height:20px;" class="bgcolor_02"/><?php }?>
		
		</td>
		</tr>
 <?php                   	
 }
 else {
		if(!isset($attend_staff_report_date_submit) && $workdays_staff['COUNT(`at_staff_date`)']==0)
		{
		       echo "<tr>";
			   echo "<td align='center'>No records found</td>";
			   echo "</tr>";
       }
}
  


}
if(is_array($staffReportList_date) && count($staffReportList_date)>0 && isset($attend_staff_report_date_submit)) { ?>
	     <tr class="bgcolor_02">
                        <!--<td width="10%" height="24" align="center"><span class="admin">S.No</span></td>-->
                        <td width="12%" align="center"><span class="admin">Emp ID </span></td>
                        <td width="19%" align="left"><span class="admin">Emp Name </span></td>
						<td width="15%" height="25" align="left"><span class="admin">Post</span></td>
                        <td width="17%" align="center"><span class="admin">School Working Days</span></td>
                        <td width="9%" align="center"><span class="admin">Present days</span></td>
						<td width="12%" align="center"><span class="admin">Absent Leave</span></td>
                        <td width="15%" align="center"><span class="admin"> Attendance&nbsp;%</span></td>
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
		$name = $staffreport['at_staff_id'];
		 
		
		$workdays_date = "SELECT  COUNT(`at_staff_date`) FROM `es_attend_staff` WHERE `at_staff_date`  BETWEEN '$from' AND '$to' AND `at_staff_dept`='$at_staff_dept1' AND `at_staff_id` = '$name' ";
	 $workdays_staff_date =  getarrayassoc($workdays_date);
	 //array_print( $workdays_staff_date);
	
	$present_date = "SELECT COUNT(`at_staff_date`) FROM `es_attend_staff` WHERE `at_staff_date`  BETWEEN '$from' AND '$to' AND `at_staff_attend` = 'P' AND `at_staff_id` = '$name' AND `at_staff_dept` = '$at_staff_dept1' ";
	$presentdays_staff_date =  getarrayassoc($present_date);
	$absent = $workdays_staff_date['COUNT(`at_staff_date`)'] - $presentdays_staff_date['COUNT(`at_staff_date`)'];
		
?>		
					  <tr class="<?php echo $rowclass;?>">
                       <?php /*?> <td align="center" class="narmal"><?php echo $slno;?></td><?php */?>
                        <td align="center" class="narmal"><?php echo $staffreport['at_staff_id']; ?></td>
                        <td align="left" class="narmal"><?php echo $staffreport['at_staff_name']; ?></td>
						<td align="left" class="narmal"><?php echo postname($staffreport['at_staff_desig']); ?></td>
                        <td align="center" class="narmal"><?php echo $workdays_staff_date['COUNT(`at_staff_date`)'];?></td>
                        <td align="center" class="narmal"><?php echo $presentdays_staff_date['COUNT(`at_staff_date`)'];?></td>
						<td align="center" class="narmal"><?php echo $absent;?><?php if($absent!= 0) { ?>&nbsp;
						<?php if(in_array('18_11',$admin_permissions)){?><a href="javascript:void(0)" onclick="window.open('?pid=27&action=staff_report_absent_date&caid=<?php echo $staffreport['at_staff_id']."&from=$from&to=$to";?>',null,'width=600,height=400,left=50,top=30,scrollbars=yes,menubar=yes');"><?php echo viewIcon();?></a><?php }?>
<?php } ?></td>
                        <?php if($workdays_staff_date['COUNT(`at_staff_date`)']!="") { 
						$percent_staff = ($presentdays_staff_date['COUNT(`at_staff_date`)']/$workdays_staff_date['COUNT(`at_staff_date`)']) * 100; ?>
						<td align="center" class="narmal"><?php echo sprintf("%01.2f",$percent_staff)."%";?></td>
                        <?php 
						}
						else {
						?>
						<td width="1%" align="center">&nbsp;</td>
						<?php } ?>
					 </tr>
<?php 
		$rw++;
        $slno++;
		} 
	
	?>
		<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td><?php if(in_array('18_12',$admin_permissions)){?><input type="button" onclick="newWindowOpen('?pid=27&action=print_staff_report<?php echo $staffurl;?>');" value="Print" style="cursor:pointer; height:20px;" class="bgcolor_02"/><?php }?>
</td>
		</tr>
 <?php    
	
	}
else {
		if(isset($attend_staff_report_date_submit) && $workdays_staff_date['COUNT(`at_staff_date`)']==0)
		{
		       echo "<tr >";
			   echo "<td align='center' class='narmal'>No records found</td>";
			   echo "</tr>";
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
</form>
<?php 	} 
/*Start of Staff Attendance  Print Page */ 
if ($action == 'print_staff_report') { 


$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."',' es_attend_staff','ATTENDANCE','FACULTY REPORT','".$at_staff_dept."','PRINT FACULTY REPORT','".$_SERVER['REMOTE_ADDR']."',NOW())";
$log_insert_exe=mysql_query($log_insert_sql);




?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
  </tr>
	<tr>
		<td height="25" colspan="3" class="bgcolor_02" align="center">&nbsp;<span class="admin">Staff  Report </span></td>
	</tr>
	<tr>
		<td width="6%">&nbsp;</td>
	</tr>
	<tr>
		<td align="left" class="adminfont" >Department:</td>
		<td align="left"  class="naramal" >&nbsp;<?php echo deptname($at_staff_dept1);?></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
	<?php if(isset($from)) { ?>
	<tr>
		<td valign="top" colspan="4"><table>
		<tr>
		<td width="6%" class="adminfont">From:</td>
		<td width="70%" class="naramal">&nbsp;&nbsp;&nbsp;<?php echo displaydate($from);?></td>
		<td width="6%"class="adminfont">&nbsp;&nbsp;&nbsp;To:</td>
		<td width="18%" class="naramal" align="left">&nbsp;&nbsp;&nbsp;<?php echo displaydate($to);?></td>
	</tr>
		</table>
	  </td>
  </tr>
		<?php } ?>
	<tr>
		<td align="left" valign="top" colspan="4">
		<table width="100%" height="80" border="0">
		<?php  if(isset($at_staff_dept1) && $at_staff_dept1!="") {?>
		<?php  if(is_array($staffReportList) && count($staffReportList)>0 && $from=="") { ?>					  
		<tr class="bgcolor_02">
		<!--<td width="8%" height="24" align="center"><span class="admin">S.No</span></td>-->
		<td width="10%" align="center"><span class="admin">&nbsp;Emp&nbsp;ID </span></td>
		<td width="19%" align="left"><span class="admin">&nbsp;Emp&nbsp;Name </span></td>
		<td width="17%" align="left"><span class="admin">&nbsp;Post</span></td>
		<td width="19%" align="center"><span class="admin">School Working Days</span></td>
		<td width="12%" align="center"><span class="admin">Present Days </span></td>
		<td width="10%" align="center"><span class="admin">Absent Leave</span></td>
		<td width="13%" align="center"><span class="admin">&nbsp;Attendance&nbsp;%</span></td>
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
	$name = $staffreport['at_staff_id'];
	$workdays_staff = getarrayassoc("SELECT  COUNT(`at_staff_date`) FROM `es_attend_staff` WHERE `at_staff_date` BETWEEN  '$psf' AND  '$pst' AND `at_staff_dept`='$at_staff_dept1' AND `at_staff_id` = '$name' ");
	$presentdays_staff = getarrayassoc("SELECT COUNT(`at_staff_date`) FROM `es_attend_staff` WHERE `at_staff_date` BETWEEN  '$psf' AND  '$pst
	' AND `at_staff_attend` = 'P' AND `at_staff_id` = '$name' AND `at_staff_dept` = '$at_staff_dept1'");
		
?>		
	<tr class="<?php echo $rowclass;?>">
		<?php /*?><td align="center" class="narmal"><?php echo $slno;?></td><?php */?>
		<td align="center" class="narmal"><?php echo $staffreport['at_staff_id']; ?></td>
		<td align="left" class="narmal"><?php echo $staffreport['at_staff_name']; ?></td>
		<td align="left" class="narmal"><?php echo postname($staffreport['at_staff_desig']); ?></td>
		<td align="center" class="narmal"><?php echo $workdays_staff['COUNT(`at_staff_date`)'];?></td>
		<td align="center"><?php echo $presentdays_staff['COUNT(`at_staff_date`)'];?></td>
		<td align="center" class="narmal"><?php echo $workdays_staff['COUNT(`at_staff_date`)'] - $presentdays_staff['COUNT(`at_staff_date`)'];?></td>
		<?php if($workdays_staff['COUNT(`at_staff_date`)']!="") { 
		$percent_staff = ($presentdays_staff['COUNT(`at_staff_date`)']/$workdays_staff['COUNT(`at_staff_date`)']) * 100; ?>
		<td align="center" class="narmal"><?php echo sprintf("%01.2f",$percent_staff)."%";?></td>
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
		} ?>
		<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		
		</tr>
 <?php                   	
 }
 }
?> 
<?php                   
if(is_array($staffReportList_date) && count($staffReportList_date)>0 && $from!="") { ?>
	    
		 <tr class="bgcolor_02">
                       <!-- <td width="8%" height="24" align="center"><span class="admin">S.No</span></td>-->
                        <td width="10%" align="center"><span class="admin">Emp ID </span></td>
                        <td width="19%" align="left"><span class="admin">Emp Name </span></td>
						<td width="17%" align="left"><span class="admin">Post</span></td>
                        <td width="19%" align="center"><span class="admin">School Working Days</span></td>
                        <td width="12%" align="center"><span class="admin">Present Days</span></td>
                        <td width="10%" align="center"><span class="admin">Absent Leave</span></td>
						<td width="13%" align="center"><span class="admin"> Attendance&nbsp;%</span></td>
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
		$name = $staffreport['at_staff_id'];
		 
		
		$workdays_date = "SELECT  COUNT(`at_staff_date`) FROM `es_attend_staff` WHERE `at_staff_date`  BETWEEN '$from' AND '$to' AND `at_staff_dept`='$at_staff_dept1' AND `at_staff_id` = '$name' ";
	 $workdays_staff_date =  getarrayassoc($workdays_date);
	
	$present_date = "SELECT COUNT(`at_staff_date`) FROM `es_attend_staff` WHERE `at_staff_date`  BETWEEN '$from' AND '$to' AND `at_staff_attend` = 'P' AND `at_staff_id` = '$name' AND `at_staff_dept` = '$at_staff_dept1' ";
	$presentdays_staff_date =  getarrayassoc($present_date);
		
?>		
					  <tr class="<?php echo $rowclass;?>">
                       <?php /*?> <td align="center" class="narmal"><?php echo $slno;?></td><?php */?>
                        <td align="center" class="narmal"><?php echo $staffreport['at_staff_id']; ?></td>
                        <td align="left" class="narmal"><?php echo $staffreport['at_staff_name']; ?></td>
						<td align="left" class="narmal"><?php echo postname($staffreport['at_staff_desig']); ?></td>
                        <td align="center"  class="narmal"><?php echo $workdays_staff_date['COUNT(`at_staff_date`)'];?></td>
                        <td align="center" class="narmal"><?php echo $presentdays_staff_date['COUNT(`at_staff_date`)'];?></td>
						<td align="center" class="narmal"><?php echo $workdays_staff_date['COUNT(`at_staff_date`)'] - $presentdays_staff_date['COUNT(`at_staff_date`)'];?></td>
                        <?php if($workdays_staff_date['COUNT(`at_staff_date`)']!="") { 
						$percent_staff = ($presentdays_staff_date['COUNT(`at_staff_date`)']/$workdays_staff_date['COUNT(`at_staff_date`)']) * 100; ?>
						<td align="center" class="narmal"><?php echo sprintf("%01.2f",$percent_staff)."%";?></td>
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
		} ?>
		<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		
		</tr>
 <?php    

	}

?>
 </table>
</td>
</tr>
</table>
<?php } 
/*Start of Staff Attendance  Absentees Print Page */ 
if ($action == 'staff_report_absent' || $action == 'staff_report_absent_date') { 
$staff_det = get_staffdetails($caid);
?>




			<table width="100%" height="81" border="0">
				<tr class="bgcolor_02" >
				  <td height="20" align="center" colspan="10" ><span class="admin">Absentee&nbsp;Record</span></td>
			  </tr>
			  <tr >
				  <td height="20" align="center" colspan="10" ></td>
			  </tr>
				<tr >
                        <td height="20" align="center" colspan="10" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="7%" align="left"><span class="admin">EMP ID</span></td>
                            <td width="42%" height="25" align="left"><span class="narmal">:<?php echo ($staff_det['es_staffid']);  ?></span></td>
                            <td width="21%" align="left"><span class="admin">Name</span></td>
                            <td width="30%" align="left"><span class="narmal">:&nbsp;<?php echo ($staff_det['st_firstname']);  ?></span></td>
                          </tr>
						   <tr>
                           
                            <td width="7%" align="left"><span class="admin">Department</span></td>
                            <td width="42%" height="25" align="left"><span class="narmal">:&nbsp;<?php echo deptname($staff_det['st_department']);  ?></span></td>
                            <td width="21%" align="left"><span class="admin">Post</span></td>
                            <td width="30%" align="left"><span class="narmal">:&nbsp;<?php echo postname($staff_det['st_post'] ); ?></span></td>
                          </tr>
                        </table></td>
				</tr>	
             
          
                
                	
                
                
                	
					
<?php if (is_array($staff_absenties)&& count($staff_absenties)>0 ) { 
?>
					  <tr class="bgcolor_02">
                        <td width="9%" height="18" align="center"><span class="admin">S No</span></td>
                       
                        <td width="25%" align="center"><span class="admin">Absent/Leave On </span></td>
						 <td width="10%" height="25" align="center"><span class="admin">Type</span></td>
						 <td width="11%" align="left"><span class="admin">Day</span></td>
						 <td width="38%" align="left"><span class="admin">Remarks</span></td>
                        <td width="7%" align="center"><span class="admin">week</span></td>
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
                       
                        <td align="center" class="narmal"><?php echo displayDate($eachabsent['at_staff_date']);?></td>
						<td align="center" class="narmal"><?php if ($eachabsent['at_staff_attend'] == "A") { echo "Absent"; } elseif ($eachabsent['at_staff_attend'] == "L") { echo "Leave";}elseif ($eachabsent['at_staff_attend'] == "H") { echo "Half Day Leave";}?></td>
						<td align="left" class="narmal"><?php echo  DatabaseFormat($eachabsent['at_staff_date'], 'l');?></td>
						<td align="left" class="narmal"><?php echo $eachabsent['at_staff_remarks'];?></td>
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
					  <tr><td align="right" height="50"colspan="7"><input type="button" class="bgcolor_02" value="print" style="cursor:pointer; height:20px;" onclick="window.print();"></td></tr>
</table>

            
<?php } ?>

<?php if($action=='edit_stud_attendence' ){

/*
*Start of Edit Students Attendance Web Page
*/

?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
  </tr>
	<tr>
		<td height="25" colspan="3" class="bgcolor_02"><span class="admin">&nbsp;Edit Student Attendance </span></td>
  </tr>
     <tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="right" valign="top">
		<font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2" style="font-size:12px";>Note :  * denotes mandatory&nbsp;</font><br />		
		<td width="1" class="bgcolor_02"></td>
  </tr>
<form name="attend_stud" action="" method="post" >
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="left" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
		  <tr>
		    <td width="22" align="center" valign="top" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:17px; color:#000000; text-decoration:underline; padding:8px; font-weight:bold;">This Feature Available at  Full Version at <a href="http://www.arox.in" target="_blank">www.arox.in</a></td>
	      </tr>
		  <tr>
		    <td align="left" valign="top">&nbsp;</td>
	      </tr>
	    </table></td>
		<td width="1" class="bgcolor_02"></td>
   </tr>
</form>
	<tr>
		<td height="1" colspan="3" class="bgcolor_02"></td>
	</tr>
</table>
<?php  } ?>
<?php if($action=='edit_staff_attendence'){?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
  </tr>
	<tr>
		<td height="25" colspan="3" class="bgcolor_02"><span class="admin">&nbsp;Edit Staff Attendance  </span></td>
	</tr>
     <tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="right" valign="top">
		<font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font><br />		
		<td width="1" class="bgcolor_02"></td>
  </tr>
<form name="attend_staff" action="" method="post" >
	<?php if (isset($error1) && $error1!="") { ?>
					         
	 <tr>
		<td height="25" colspan="3" align="center" ><strong><?php echo $error1; ?></strong></td>
	 </tr>
	<?php  }  ?>
	<?php if (isset($error2) && $error2!="") { ?>
					         
	 <tr>
		<td height="25" colspan="3" align="center" ><strong><?php echo $error2; ?></strong></td>
	 </tr>
	<?php  }  ?>
	  <tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="left" valign="top"><table width="100%" border="0" cellspacing="4" cellpadding="0">
		   <tr>
			<td align="left" valign="top"><table width="100%" border="0" cellspacing="3" cellpadding="0">
	  <tr>
				<td width="7%" class="narmal">&nbsp;Department</td>
				<td width="35%" align="left" valign="middle" class="narmal"><select name="at_staff_dept" onchange="JavaScript:document.attend_staff.submit();" >
                  <option value="">-Select-</option>
                  <?php foreach($getdeptlist as $eachrecord) { ?>
                  <option value="<?php echo $eachrecord['es_departmentsid'];?>" <?php echo ($eachrecord['es_departmentsid']==	$at_staff_dept)?"selected":""?>  ><?php echo $eachrecord['es_deptname'];?></option>
                  <?php } ?>
                </select><span><font color="#FF0000">&nbsp;*</font></span></td>
				
				<td width="11%" align="left" valign="middle" class="narmal">&nbsp;Date</td>
				<td width="8%" align="left" valign="middle" class="narmal"><input name="at_staff_date"  id="at_staff_date" readonly  class="plain" size="15" value="<?php
										  if (isset($at_staff_date)){ 
												 echo $_POST['at_staff_date'];
											}elseif (isset($getmaintenance->at_staff_date)){


												
													echo $getmaintenance->at_staff_date;
											} 
									
									?>"/></td>
				<td width="39%" align="left" valign="middle" class="narmal">
			  <a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.attend_staff.at_staff_date);return false;" ><img name="popcal" align="absmiddle" src="<?php echo JS_PATH ?>/DateTime/calbtn.gif" width="34" height="22" border="0" alt="" /></a>
				 <iframe width=188 height=166 name="gToday:datetime:agenda.js:gfPop:plugins_time.js" id="gToday:datetime:agenda.js:gfPop:plugins_time.js" src="<?php echo JS_PATH ?>/DateTime/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe>
				 <font color="#FF0000">*</font></td>
			  </tr>
				<tr>
					<td width="7%" class="narmal"></td>
				    <td width="35%" class="error_message">&nbsp;</td>
			      <td width="11%" class="error_message">&nbsp;</td>
					<td width="8%" class="error_message">&nbsp;</td>
				  <td colspan="5" class="error_message"><?php 
									if (isset($error_staff_date)&&$error_staff_date!=""){
										  echo $error_staff_date;
									}
							  ?></td>
		    </tr>
			<tr>
								
								<td class="error_message" colspan="5" align="center"><input type="submit" style="cursor:pointer; height:20px;" value="View Attendance" name="staff_editattend_Submit" class="bgcolor_02" /></td>
							  
		  </tr>
			</table>
			</td>
		  </tr>
		<tr>
			<td height="25" align="left" valign="middle">
				<table width="100%" border="0" cellspacing="1">
<?php if(isset($at_staff_dept) && $at_staff_dept!="") { ?>
<?php if(count($attendance_num)>=1) { ?> 
			 
			  <tr class="bgcolor_02">
				<td width="8%" align = "center">S No</td>
				<td width="15%" align = "center">Emp ID </td>
				<td width="24%" align = "center">Emp Name </td>
				<td width="12%" align = "center">Designation</td>
				<td width="26%" align = "center">Attendance</td>
				<td width="15%" align = "center">Remarks</td>
			  </tr>
<?php						
$rw = 1;
$slno = $start+1;
foreach ($staffdept as $eachdep)
{
if($rw%2==0)
$rowclass = "even";
else
$rowclass = "odd";
$staffid = $eachdep['es_staffid'];		
$staff = get_staffdetails($staffid);

?>
			
			  <tr class="<?php echo $rowclass;?>">
				<td align = "center" class="narmal"><?php echo $slno;?></td>
				<td align = "center" class="narmal" ><input name="at_staff_id[]" type="hidden" value="<?php echo $eachdep['es_staffid'];?>" size="2" /><?php echo "ES".$eachdep['es_staffid'];?></td>
				<td align = "left" class="narmal"><input name="at_staff_name[]" type="hidden" value="<?php echo $eachdep['st_firstname']."&nbsp;".$eachdep['st_lastname'];?>" size="2" /><?php echo $eachdep['st_firstname']."&nbsp;".$eachdep['st_lastname'];?></td>
				<td align="left" valign="middle" class="narmal"><input name="at_staff_desig[]" type="hidden" value="<?php echo $eachdep['st_post'];?>" size="2" /><?php echo postname($eachdep['st_post']);?></td>
				<td align="center" class="narmal">
				<?php 
				 $attendance1 = "SELECT * FROM `es_attend_staff` WHERE at_staff_dept='".$at_staff_dept."' AND at_staff_date='".$at_attendance_date1."' AND at_staff_id='".$staff['es_staffid']."'";
			 $attendance_num1 =sqlnumber($attendance1);
			 $attendance_row1 =getarrayassoc($attendance1);
			 print $attendance_row1['at_staff_attend'];
				 ?>
				<select name="at_staff_attend<?php echo $staff['es_staffid']; ?>"><option value="P">P</option><option value="A">A</option></select></td>
				<td>
					<select name="at_staff_remarks[]" >
				  <option  value="" >Select Remarks</option>
				  <option  value="Paid" >Paid Leave</option>

 <option  value="Unpaid" >Unpaid Leave</option>
</select>
<?php /*?><input type="text" name='at_staff_remarks<?php echo $staff['es_staffid']; ?>'  value='<?php echo $attendance_row1['at_staff_remarks']; ?>'/><?php */?>
</td>
			  </tr>
			 <input type="hidden" name="es_post"  value="<?php echo $staff['st_post']; ?>" />
		   <?php 
			  $rw++;
			  $slno++;
		   } ?>
			  </table>
			  <table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
				  <td height="32" align="center" valign="middle">
				  <?php if(in_array('18_4',$admin_permissions)){?><input name="staff_updateattend_Submit" type="submit" style="cursor:pointer;" class="bgcolor_02" value="Submit" />
&nbsp;<?php }?>
				  
<input name="reset" type="reset" class="bgcolor_02" style="cursor:pointer;" value="Reset" /></td>
				</tr>
			   <tr>
			     <td><font color="#FF0000">*</font>P = Present &nbsp;&nbsp;&nbsp;<font color="#FF0000">*</font>A = Absent&nbsp;&nbsp;&nbsp;<font color="#FF0000">*</font>Unpaid Leave=Salary will deducted for all Unpaid leaves <font color="#FF0000"> &nbsp;*</font>Paid Leave=Salary will not be deducted for Paid leaves</td>
			   </tr>
			  <?php
				 }
			   else {
			   if(isset($staff_editattend_Submit))
			   {
				   echo "<tr>";
				   echo "<td class='narmal' align='center'>No records found</td>";
				   echo "</tr>";
				   }
			} 					   
			   } ?>
			  </table></td>
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
<?php }?>

<?php
if($action == "descriptive_notes")
{?>
	<style>
    	#dn_outertable
		{
			width:100%;
			border: 1px solid rgb(128, 160, 198);
			border-collapse:collapse;
			margin-top: 5px;
		}
		#dn_outertable #dn_student_search_tr
		{
			height: 50px;
		}
		#dn_outertable table
		{
			width:100%;
		}
		#dn_descriptive_note_table [type=text]
		{
			width:80%;
		}
    </style>
	<table id="dn_outertable">
    	<tr>
        	<td class="bgcolor_02" style="padding:3px 0px 3px 5px;">DESCRIPTIVE NOTES</td>
        </tr>
        <tr>
        	<td>
            	<!-------------------------------------- Student record search table ----------------------------------->
            	<table>
                	<tr id="dn_student_search_tr"><form name="dn_student_search_form" method="post">
                        <td width="30%" align="center">Student Registration ID: </td>
                        <td width="30%"><input type="text" name="dn_reg_no" value="<?php if(isset($reg_no))echo $reg_no; ?>" /></td>
                        <td align="left"><input type="submit" name="dn_search_student" value="GO" class="bgcolor_02" /></td></form>
                    </tr>
                </table>
                <!---------------------------------- End of student record search table -------------------------------->
                
                
                <!------------------------------------ Descriptive notes view table ------------------------------------>
                <?php
                		if(count($errormessage) == 0 && (isset($dn_search_student) || isset($dn_save)))
						{?>
                        	<form method="post">
                        	<table width="100%" style="margin:20px 0px; border-spacing:10px;">
                                <tr>
                                    <td style="font-weight:bold;">Registration No.</td>
                                    <td style="font-weight:bold;">:</td>
                                    <td><?php echo $reg_no; ?></td>
                                    <td style="font-weight:bold;" rowspan="2">Date</td>
                                    <td style="font-weight:bold;" rowspan="2">:</td>
                                    <td rowspan="2"><?php echo date("d/m/Y"); ?></td>
                                </tr>
                                <tr>
                                    <td style="font-weight:bold;">Student Name</td>
                                    <td style="font-weight:bold;">:</td>
                                    <td><?php echo $student_info['pre_serialno']." ".$student_info['pre_name']." ".$student_info['middle_name']." ".$student_info['pre_lastname']; ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </table>
                        
                        	<table border="1" bordercolor="#80A0C6" id="dn_descriptive_note_table" style="border-collapse:collapse; margin-bottom:20px;">
                            	<tr align="center" height="30px" class="bgcolor_02">
                                	<th colspan="2">Class</th>
                                	<th>Attendance</th>
                                	<th>Special Progress</th>
                                	<th>Need to Improve</th>
                                </tr>
                       <?php   	$loop = 0;
					   			foreach($preadmission_details as $pre_details)
                                {
									$dn_class = $db->getOne("SELECT es_classname FROM es_classes WHERE es_classesid=".$pre_details['pre_class']);
                                    
									$dn_sem_1_start	= $pre_details['pre_fromdate'];
                                    $dn_sem_1_end	= date("Y-m-d", strtotime("+6 month", strtotime($dn_sem_1_start)));
									
									$dn_sem_2_start	= $dn_sem_1_end;
									$dn_sem_2_end	= $pre_details['pre_todate'];
                                    
									$att_sem_1		= $db->getRows("SELECT * FROM `es_attend_student` WHERE `at_attendance_date` >= '".$dn_sem_1_start."' AND `at_attendance_date` <= '".$dn_sem_1_end."' AND `at_reg_no`=".$reg_no);
									$att_sem_2		= $db->getRows("SELECT * FROM `es_attend_student` WHERE `at_attendance_date` > '".$dn_sem_2_start."' AND `at_attendance_date` <= '".$dn_sem_2_end."' AND `at_reg_no`=".$reg_no);
                                    
                                    
									$present_days_sem_1 = 0;
                                    foreach($att_sem_1 as $a)
                                    {
                                        if($a['at_attendance'] == "P")
                                            $present_days_sem_1++;
                                    }
									$precent_attendance_sem_1 = round(($present_days_sem_1/count($att_sem_1))*100);
									
									$present_days_sem_2 = 0;
                                    foreach($att_sem_2 as $a)
                                    {
                                        if($a['at_attendance'] == "P")
                                            $present_days_sem_2++;
                                    }
                                    $precent_attendance_sem_2 = round(($present_days_sem_2/count($att_sem_2))*100);
						?>			<tr align="center">
                                        <td align="center" rowspan="2"><?php echo $dn_class; ?></td>
                                        <td>1<sup>st</sup> term</td>
                                        <td><?php echo $precent_attendance_sem_1."%"; ?></td>
                                        <td><textarea name="sem_progress[]"><?php
                                            	if(isset($sem_progress))
												{
													echo $sem_progress[$loop/2];
												}
												if(!empty($es_descr_notes))
												{
													echo $es_descr_notes[$loop/2]['special_progress'];
												} ?></textarea></td>
                                        <td><textarea name="sem_improvement[]"><?php
                                            	if(isset($sem_improvement))
												{
													echo $sem_improvement[$loop/2];
												}
												if(!empty($es_descr_notes))
												{
													echo $es_descr_notes[$loop/2]['need_to_improve'];
												} ?></textarea></td>
                                    </tr>
                                    <tr align="center">
                                        <td>2<sup>nd</sup> term</td>
                                        <td><?php echo $precent_attendance_sem_2."%"; ?></td>
                                        <td><textarea name="sem_progress[]"><?php
                                            	if(isset($sem_progress))
												{
													echo $sem_progress[($loop/2)+1];
												}
												if(!empty($es_descr_notes))
												{
													echo $es_descr_notes[($loop/2)+1]['special_progress'];
												} ?></textarea></td>
                                        <td><textarea name="sem_improvement[]"><?php
                                            	if(isset($sem_improvement))
												{
													echo $sem_improvement[($loop/2)+1];
												}
												if(!empty($es_descr_notes))
												{
													echo $es_descr_notes[($loop/2)+1]['need_to_improve'];
												}
												$loop+=3; ?></textarea></td>
                                    </tr>
                                    <input type="hidden" name="dn_classesid[]" value="<?php echo $pre_details['pre_class']; ?>" />
                                    <input type="hidden" name="dn_reg_no_tbl" value="<?php echo $reg_no; ?>" />
                            
                        <?php	$loop++;
								}	//End of foreach($preadmission_details as $pre_details) ?>
                            </table>
                            <div style="width:100%; text-align:center; padding-bottom:20px;">
                            	<input type="submit" class="bgcolor_02" name="dn_save" value="Save" />
                            	<input type="button" class="bgcolor_02" name="dn_print" value="Print" onclick="window.open('?pid=27&action=print_descriptive_notes&dn_reg_no=<?php echo $reg_no; ?>&dn_search_student=GO',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');" />
                            </div>
                            </form>
				<?php	}	// End of if(isset($dn_search_student) && count($errormessage) == 0)
				?>
                <!--------------------------------- End of descriptive notes view table -------------------------------->
            </td>
        </tr>
    </table>
<?php
}
?>
<?php

if($action == "print_descriptive_notes")
{?>
	<div class="bgcolor_02" style="width: 100%; padding: 5px 0px 5px 10px;">DESCRIPTIVE NOTES</div>
	<table width="100%" style="margin:20px 0px; border-spacing:10px;">
		<tr>
			<td style="font-weight:bold;">Registration No.</td>
			<td style="font-weight:bold;">:</td>
			<td><?php echo $reg_no; ?></td>
			<td style="font-weight:bold;" rowspan="2">Date</td>
			<td style="font-weight:bold;" rowspan="2">:</td>
			<td rowspan="2"><?php echo date("d/m/Y"); ?></td>
		</tr>
		<tr>
			<td style="font-weight:bold;">Student Name</td>
			<td style="font-weight:bold;">:</td>
			<td><?php echo $student_info['pre_serialno']." ".$student_info['pre_name']." ".$student_info['middle_name']." ".$student_info['pre_lastname']; ?></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
	</table>
    
    <table border="1" width="100%" bordercolor="#80A0C6" id="dn_descriptive_note_table" style="border-collapse:collapse; margin-bottom:20px;">
                            	<tr align="center" height="30px" class="bgcolor_02">
                                	<th colspan="2">Class</th>
                                	<th>Attendance</th>
                                	<th>Special Progress</th>
                                	<th>Need to Improve</th>
                                </tr>
                       <?php   	$loop = 0;
					   			foreach($preadmission_details as $pre_details)
                                {
									$dn_class = $db->getOne("SELECT es_classname FROM es_classes WHERE es_classesid=".$pre_details['pre_class']);
                                    
									$dn_sem_1_start	= $pre_details['pre_fromdate'];
                                    $dn_sem_1_end	= date("Y-m-d", strtotime("+6 month", strtotime($dn_sem_1_start)));
									
									$dn_sem_2_start	= $dn_sem_1_end;
									$dn_sem_2_end	= $pre_details['pre_todate'];
                                    
									$att_sem_1		= $db->getRows("SELECT * FROM `es_attend_student` WHERE `at_attendance_date` >= '".$dn_sem_1_start."' AND `at_attendance_date` <= '".$dn_sem_1_end."' AND `at_reg_no`=".$reg_no);
									$att_sem_2		= $db->getRows("SELECT * FROM `es_attend_student` WHERE `at_attendance_date` > '".$dn_sem_2_start."' AND `at_attendance_date` <= '".$dn_sem_2_end."' AND `at_reg_no`=".$reg_no);
                                    
                                    
									$present_days_sem_1 = 0;
                                    foreach($att_sem_1 as $a)
                                    {
                                        if($a['at_attendance'] == "P")
                                            $present_days_sem_1++;
                                    }
									$precent_attendance_sem_1 = round(($present_days_sem_1/count($att_sem_1))*100);
									
									$present_days_sem_2 = 0;
                                    foreach($att_sem_2 as $a)
                                    {
                                        if($a['at_attendance'] == "P")
                                            $present_days_sem_2++;
                                    }
                                    $precent_attendance_sem_2 = round(($present_days_sem_2/count($att_sem_2))*100);
						?>			<tr align="center">
                                        <td align="center" rowspan="2"><?php echo $dn_class; ?></td>
                                        <td>1<sup>st</sup> term</td>
                                        <td><?php echo $precent_attendance_sem_1."%"; ?></td>
                                        <td><?php
                                            	if(isset($sem_progress))
												{
													echo $sem_progress[$loop/2];
												}
												if(!empty($es_descr_notes))
												{
													echo $es_descr_notes[$loop/2]['special_progress'];
												} ?></td>
                                        <td><?php
                                            	if(isset($sem_improvement))
												{
													echo $sem_improvement[$loop/2];
												}
												if(!empty($es_descr_notes))
												{
													echo $es_descr_notes[$loop/2]['need_to_improve'];
												} ?></td>
                                    </tr>
                                    <tr align="center">
                                        <td>2<sup>nd</sup> term</td>
                                        <td><?php echo $precent_attendance_sem_2."%"; ?></td>
                                        <td><?php
                                            	if(isset($sem_progress))
												{
													echo $sem_progress[($loop/2)+1];
												}
												if(!empty($es_descr_notes))
												{
													echo $es_descr_notes[($loop/2)+1]['special_progress'];
												} ?></td>
                                        <td><?php
                                            	if(isset($sem_improvement))
												{
													echo $sem_improvement[($loop/2)+1];
												}
												if(!empty($es_descr_notes))
												{
													echo $es_descr_notes[($loop/2)+1]['need_to_improve'];
												}
												$loop+=3; ?></td>
                                    </tr>
                                    <input type="hidden" name="dn_classesid[]" value="<?php echo $pre_details['pre_class']; ?>" />
                                    <input type="hidden" name="dn_reg_no_tbl" value="<?php echo $reg_no; ?>" />
                            
                        <?php	$loop++;
								}	//End of foreach($preadmission_details as $pre_details) ?>
                            </table>
    
<?php
}

?>