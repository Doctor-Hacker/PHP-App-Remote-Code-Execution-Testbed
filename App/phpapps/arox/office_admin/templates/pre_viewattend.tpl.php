<?php 
//if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
//		header('location: ./?pid=1&unauth=0');
//		exit;
//	}
//	
	$studid = $_GET['sid'];
	//$studid = $_SESSION['eschools']['admin_user'];
	if($action == 'stud_report') {
/*Start of student Attendance Page */
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
	 </tr>
	<tr>
		<td height="25" colspan="3" class="bgcolor_02"><span class="admin">&nbsp;My Attendance Record </span></td>
  </tr>
    <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="4" cellpadding="0">
                	<tr>
                        <td height="20" align="right" valign="middle"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font></td>
                </tr>
                <tr>
                    <td align="left" valign="top">
                    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <form action="" method="post" name="attend_staff_report" >
                                <tr>
                                    <td width="10%" height="30" align="left" valign="middle" class="narmal">From</td>
                                    <td width="7%" align="left" valign="middle" class="narmal"><input class="plain" name="dc1"  value="<?php if (isset($dc1)){ echo $_POST['dc1'];} ?>" size="12" onfocus="this.blur()" readonly="readonly" /></td>
                                    <td width="4%" align="left" valign="middle" class="narmal"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fStartPop(document.attend_staff_report.dc1,document.attend_staff_report.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a></td>
                                    <td width="24%" align="left" valign="middle" class="narmal"><font color="#FF0000">*</font></td>
                                    <td width="6%" align="left" valign="middle"  class="narmal">To</td>
                                    <td width="7%" align="left" valign="middle"  class="narmal"><input class="plain" name="dc2" value="<?php if (isset($dc2)){  echo $_POST['dc2'];} ?>" size="12" onfocus="this.blur()" readonly="readonly" /></td>
                                    <td width="4%" align="left" valign="middle"  class="narmal"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fEndPop(document.attend_staff_report.dc1,document.attend_staff_report.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a></td>
                                    <td width="22%" align="left" valign="middle"  class="narmal"><font color="#FF0000">*</font></td>
                                  <td width="16%" align="left" valign="middle"  class="narmal"><input type="submit" name="class_student_report_submit" value="Search" style="cursor:pointer;" class="bgcolor_02" /></td>
                                </tr>
                            </form>
					   <iframe width=132 height=142 name="gToday:contrast:agenda.js" id="gToday:contrast:agenda.js" src="<?php echo JS_PATH ?>/DateRange/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>
					  </table></td>
                  </tr>
                  <tr>
                    <td height="25" align="left" valign="middle"><table width="100%" border="0" cellspacing="4" cellpadding="0">
                 
                  <tr> 
                    <td height="25" align="left" valign="middle"><table width="100%"  border="0">
<?php 
if(is_array($studentwiseReportList_date) && count($studentwiseReportList_date)>0 &&  $workdays_date!=0 ) {?>
	    		<tr class="bgcolor_02">
                      <td width="18%" height="18" align="center"><span class="admin">S.No</span></td>
					    <td width="18%" height="18" align="center"><span class="admin">Subjects</span></td>
                        <td width="27%" height="25px" align="center"><span class="admin">Total Lecture</span></td>
                        <td width="25%" align="center"><span class="admin">&nbsp;Attended</span></td>
						<td width="18%" align="center"><span class="admin">&nbsp;Not Attended</span></td>
                        <td width="28%" align="center"><span class="admin">Attendance&nbsp;%</span></td>
                      </tr>
<?php						
		$studid = $_GET['sid'];
		 $rw = 1;
         $slno = $start+1;
foreach ($studentwiseReportList_date as $student)
      {
	if($rw%2==0)
		$rowclass = "even";
		else
		$rowclass = "odd";
		$absent =  $workdays_date - $presentdays_date;
						 $i = 0;
					  foreach($allsubjects as $sbj){

					  $sb_id[i] = $sbj['es_subjectid'];
					  $q[i]=mysql_query("SELECT *  FROM `es_attend_student`  WHERE  `at_attendance_date`  BETWEEN '$from' AND '$to' AND `at_reg_no`='$studid' AND `at_std_subject`='$sb_id[i]'");
					  $work[i]=mysql_num_rows($q[i]);
					  $q2[i]=mysql_query("SELECT *  FROM `es_attend_student` WHERE `at_attendance_date`  BETWEEN '$from' AND '$to'  AND `at_reg_no`='$studid' AND `at_attendance`='P' AND `at_std_subject`='$sb_id[i]'");
					   $present[i]=mysql_num_rows($q2[i]);
					   $abs[i] = $work[i]-$present[i];
					  $i++;
                    
?>                      <tr class="<?php echo $rowclass;?>">
<td align="center" class="narmal"><?php echo $i;?></td>
					   <td align="center" class="narmal"><?php echo $sbj['es_subjectname'];?></td>
                       <td align="center" class="narmal"><?php echo $work[i];?></td>
                        <td align="center" class="narmal"><?php echo $present[i];?></td>
						<td align="center" class="narmal"><?php echo $abs[i];?><?php if($abs[i]!= 0) { ?>&nbsp;<a href="javascript:void(0)" onclick="window.open('?pid=109&action=class_report_absent_date&caid=<?php echo $studid."&from=$from&to=$to" ;?>',null,'width=600,height=400,left=50,top=30,scrollbars=yes,menubar=yes');"><?php echo viewIcon();?></a><?php } ?></td>
                        <?php if($work[i]!= 0) { 
						
						$per[i] = (($present[i] / $work[i]) * 100);
						//echo $per[i];
						 ?>
						<td align="center" class="narmal"><?php echo sprintf("%01.2f",$per[i])."%";?></td>
                        <?php 
						}
						else {
						?>
						<td width="2%" align="center" class="narmal"><?php echo "0%"; ?></td>
						<?php } }?>
						</tr>
<?php                  
					  $rw++;
                      $slno++;
				 }
?>
					  </table>
                      <table width="100%" height="33" border="0">
					  <tr>
                          <td align="center" valign="middle">&nbsp;<input name="Submit22" type="button" onclick="window.open('?pid=109&action=print_stud_report<?php echo $studurl;?>&caid=<?php echo $studid;?>',null,'width=700,height=400,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');" class="bgcolor_02" style="cursor:pointer;"  value="Print" /></td>
</tr>
                 
<?php 	} 
else {
	  if(isset($class_student_report_submit) && $class_student_report_submit!="" && count($errormessage)==0 )	 
		{
		       echo "<tr >";
			   echo "<td height='30' align='center' class='narmal'>No records found</td>";
			   echo "</tr>";
       }
	}

?>	

					  </table></td>
                  </tr>
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
?>

<?php 
$studid = $_GET['caid'];
/*Start of student Attendance Absentees Datewise Page */
if ($action == 'class_report_absent_date') { 
$std_det = $db->getrow("SELECT * FROM es_preadmission WHERE es_preadmissionid=".$studid);
?>
<table width="100%" height="81" border="0">
	<tr >
	  <td height="20" align="left" colspan="4" class="bgcolor_02"><span class="admin">&nbsp;My Absence Report</span></td>
  </tr>	
  <tr >
		<td height="10" align="left" colspan="4" ></td>
  </tr>
  <tr>
		<td width="9%" align="left" class="adminfont" >Class:</td>
	    <td width="35%" class="narmal" align="left" >&nbsp;&nbsp;&nbsp;<?php echo classname($std_det['pre_class']);?></td>
		<td width="31%" align="right" class="adminfont">Father&nbsp;Name&nbsp;: </td>
		<td width="25%" class="narmal" align="left"><?php echo $std_det['pre_fathername']; ?></td>
		
	</tr>
	<tr>
		<td width="9%" align="left" class="adminfont" >Reg.No.:</td>
	    <td width="35%" class="narmal" align="left" >&nbsp;&nbsp;&nbsp;<?php echo $studid; ?></td>
		<td width="31%" align="right" class="adminfont">Student&nbsp;Name&nbsp;:</td>
		<td width="25%" class="narmal" align="left"><?php echo $std_det['pre_name']; ?></td>
	</tr>
   
					
<?php if (is_array($class_absenties)&& count($class_absenties)>0 ) { 
?>
	<tr class="bgcolor_02">
		<td width="15%" height="18" align="center"><span class="admin">Absent Date</span></td>
	  <td width="29%" align="center"><span class="admin">Remarks</span></td>
		<td width="27%" align="center"><span class="admin">Day</span></td>
		<td width="29%" align="center"><span class="admin">Week</span></td>
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
                        <td align="center" class="narmal"><?php echo displayDate($eachabsent['at_attendance_date']);?></td>
						<td align="center" class="narmal"><?php echo stripslashes($eachabsent['at_remarks']);?></td>
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
<tr><td align="right" height="50" colspan="4"><input type="button" class="bgcolor_02" value="print"onclick="window.print();" style="cursor:pointer;"></td></tr>
</table>
<?php } ?>
<?php 
 $studid = $_GET['sid'];
 if ($action == 'print_stud_report') {
 $std_det = $db->getrow("SELECT * FROM es_preadmission WHERE es_preadmissionid=".$studid);

  ?>
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
		<td colspan="4" align="left">
		<table width="100%">
		<tr>
		<td width="9%" align="left" class="adminfont" >Class:</td>
	    <td width="35%" class="narmal" align="left" >&nbsp;&nbsp;&nbsp;<?php echo classname($std_det['pre_class']);?></td>
		<td width="31%" align="right" class="adminfont">Father&nbsp;Name&nbsp;: </td>
		<td width="25%" class="narmal" align="left"><?php echo $std_det['pre_fathername']; ?></td>
	</tr>
	<tr>
		<td width="9%" align="left" class="adminfont" >Reg.No.:</td>
	    <td width="35%" class="narmal" align="left" >&nbsp;&nbsp;&nbsp;<?php echo $studid; ?></td>
		<td width="31%" align="right" class="adminfont">Student&nbsp;Name&nbsp;:</td>
		<td width="25%" class="narmal" align="left"><?php echo $std_det['pre_name']; ?></td>
	</tr>
		</table>
		</td>
  </tr>
	<tr>
		<td colspan="4" align="left">&nbsp;</td>
  </tr>
 
    
	<tr>
		<td width="9%" align="left" class="adminfont">From:</td>
	  <td width="35%" align="left" class="narmal">&nbsp;&nbsp;&nbsp;<?php echo $dc1;?></td>
	  <td width="31%"align="right" class="adminfont">To:</td>
		<td width="25%" align="left" class="narmal"><?php echo $dc2;?></td>
	</tr>

	<tr>

    	<td  colspan="4"><table width="100%" border="0" cellspacing="4" cellpadding="0">
			<tr>
				<td align="left" valign="top"></td>
			</tr>
                  <tr>
                    <td height="25" align="left" valign="middle"><table width="100%"  border="0">
<?php 
if(is_array($studentwiseReportList_date) && count($studentwiseReportList_date)>0 &&  $workdays_date!=0 ) {?>
	    		  <tr class="bgcolor_02">
                      <td width="18%" height="18" align="center"><span class="admin">S.No</span></td>
					    <td width="18%" height="18" align="center"><span class="admin">Subjects</span></td>
                        <td width="27%" height="25px" align="center"><span class="admin">Total Lecture</span></td>
                        <td width="25%" align="center"><span class="admin">&nbsp;Attended</span></td>
						<td width="18%" align="center"><span class="admin">&nbsp;Not Attended</span></td>
                        <td width="28%" align="center"><span class="admin">Attendance&nbsp;%</span></td>
                      </tr>
<?php						
		
		 $rw = 1;
         $slno = $start+1;
foreach ($studentwiseReportList_date as $student)
      {
	if($rw%2==0)
		$rowclass = "even";
		else
		$rowclass = "odd";
		$absent =  $workdays_date - $presentdays_date;
	 $i = 0;
					  foreach($allsubjects as $sbj){
					    //checkuserinlogin();
//$studid = $_SESSION['eschools']['admin_user'];
$studid = $_GET['sid'];
					  $sb_id[i] = $sbj['es_subjectid'];
					$q[i]=mysql_query("SELECT *  FROM `es_attend_student`  WHERE  `at_attendance_date`  BETWEEN '$from' AND '$to' AND `at_reg_no`='$studid' AND `at_std_subject`='$sb_id[i]'");
					  $work[i]=mysql_num_rows($q[i]);
					   $q2[i]=mysql_query("SELECT *  FROM `es_attend_student` WHERE `at_attendance_date`  BETWEEN '$from' AND '$to'  AND `at_reg_no`='$studid' AND `at_attendance`='P' AND `at_std_subject`='$sb_id[i]'");
					   $present[i]=mysql_num_rows($q2[i]);
					   $abs[i] = $work[i]-$present[i];
					  $i++;

?>                      <tr class="<?php echo $rowclass;?>">
<td align="center" class="narmal"><?php echo $i;?></td>
					   <td align="center" class="narmal"><?php echo $sbj['es_subjectname'];?></td>
                       <td align="center" class="narmal"><?php echo $work[i];?></td>
                        <td align="center" class="narmal"><?php echo $present[i];?></td>
						<td align="center" class="narmal"><?php echo $abs[i];?><?php if($abs[i]!= 0) { ?>&nbsp;<a href="javascript:void(0)" onclick="window.open('?pid=109&action=class_report_absent_date&caid=<?php echo $studid."&from=$from&to=$to" ;?>',null,'width=600,height=400,left=50,top=30,scrollbars=yes,menubar=yes');"><?php echo viewIcon();?></a><?php } ?></td>
                        <?php if($work[i]!= 0) { 
						$per[i] = (($present[i]/$work[i]) * 100); ?>
						<td align="center" class="narmal"><?php echo sprintf("%01.2f",$per[i])."%";?></td>
                        <?php 
						}
						else {
						?>
						<td width="2%" align="center" class="narmal"><?php echo "0%"; ?></td>
						<?php } }?>
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

?>