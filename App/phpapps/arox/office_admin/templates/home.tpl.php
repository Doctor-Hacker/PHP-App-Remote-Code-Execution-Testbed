<?php
$home_image  = str_replace("css", "", $_SESSION['eschools']['user_theme']);

?>

<?php 
if($action=='birthday_students')
{?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
    	<td height="3" colspan="3"></td>
    </tr>
    
    <tr>
    	<td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;<span id="internal-source-marker_0.052443267584382114">This Month Student's Birthday List</span></strong></td>
    </tr>
    
	<tr>
        <td width="1" class="bgcolor_02"></td>
        <td align="left" valign="top"><br />
			<table width="100%" border="0">
                <tr height="30" class="bgcolor_02">
                    <td width="7%" align="center" valign="middle">&nbsp;S No</td>
                    <td width="26%" align="left" valign="middle">&nbsp;Student Name</td>
                    <td width="11%" align="left" valign="middle">&nbsp;Class</td>
                    <td width="32%" align="left" valign="middle">&nbsp;Father Name</td>
                    <td width="9%" align="center" valign="middle">&nbsp;Reg ID </td>
                    <td width="15%" align="center" valign="middle">&nbsp;DOB</td>
                </tr>
				<?php 
                
                //$students_det = $db->getrows($sql_todaybirth);
                
                
                /*if(count($students_det)>=1){
                $i=0; 
                foreach($students_det as $each)
                {
                //	echo $each['es_preadmissionid'];
                
                list($year, $month) = explode('-', date('Y-n'));
                $date = getdate();
                $year = $date['year'];
                $month = $date['mon'];
                echo substr($each['pre_dateofbirth'],5,2);
                if(substr($each['pre_dateofbirth'],5,2)==$month)
                {
                
                $i++;
                
                ?>
                <tr>
                <td>&nbsp;<?php echo $i;?></td>
                <td>&nbsp;<?php echo ucwords($each['pre_name']);?></td>
                <td>&nbsp;<?php echo classname($each['pre_class']);?></td>
                <td>&nbsp;<?php echo ucwords($each['pre_fathername']);?></td>
                
                </tr>
                
                <?php
                }
                
                
                }
                
                }*/
                //array_print($students_det);


   if(count($students_det)>=1)
   {
		$i=0;
		foreach($students_det as $each)
		{
    		list($year, $month) = explode('-', date('Y-n'));
			$date = getdate();
			$year = $date['year'];
			$month = $date['mon'];
 
			//echo substr($each['pre_dateofbirth'],5,2);

			if(substr($each['pre_dateofbirth'],5,2)==$month)
			{
				$i++;
?>
                <tr>
                    <td align="center" valign="middle">&nbsp;<?php echo $i;?></td>
                    <td align="left" valign="middle">&nbsp;<?php echo ucwords($each['pre_name']);?></td>
                    <td align="left" valign="middle">&nbsp;<?php echo classname($each['pre_class']);?></td>
                    <td align="left" valign="middle">&nbsp;<?php echo ucwords($each['pre_fathername']);?></td>
                    <td align="center" valign="middle">&nbsp;
	 				<?php echo ucwords($each['es_preadmissionid']);
					/*  $section_det1 = "SELECT * FROM es_sections_student SS , es_sections S WHERE SS.student_id='".$each['es_preadmissionid']."' AND SS.course_id='".$each['pre_class']."' AND SS.section_id=S.section_id ";
					//   $section_det=$db->getrows(section_det1);
					$res=mysql_query($section_det1);
					$row=mysql_fetch_array($res);
					echo $row['section_name'];*/
					
					/*?>	 
					if($section_det['section_name']!=""){
					echo ucwords($section_det['section_name']);}else{echo "---";}?></td>
					<td>&nbsp;<?php  if($section_det['roll_no']!=""){
					echo $section_det['roll_no'];}else{echo "---";}?><?php */?></td>

					<td align="center" valign="middle">&nbsp;<?php echo displaydate($each['pre_dateofbirth']);?></td>
     
				</tr>
<?php		}// End of if(substr($each['pre_dateofbirth'],5,2)==$month)
		}// End of foreach($students_det as $each)
	}// End of if(count($students_det)>=1)
	else
	{
?>
        <tr>
        	<td colspan="6" align="center">No Students Found</td>
        </tr>
<?php
	}
?>
</table>

				</td>
				
                <td width="1" class="bgcolor_02"></td>
              </tr>
              
                <td height="1" colspan="3" class="bgcolor_02"></td>
                </tr>
            </table>
<?php
}// End of if($action=='birthday_students')
else
{?>
    <table width="100%" height="400" border="0" cellspacing="0" cellpadding="0"  background="images/home_<?php echo $home_image;?>jpg">
        <tr>
            <td height="30"></td>
        </tr>
        <tr>
            <td align="center" valign="middle" class="admin"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr >
                <td height="20" align="center" valign="middle" class="adminfont" style="font-size:23px;">Welcome</td>
              </tr>
              <tr >
                <td height="20" valign="middle" class="adminfont" align="center" style="font-size:23px;">to</td>
              </tr>
              <tr >
                <td height="20" align="center" valign="middle" class="adminfont" style="font-size:23px; font-family:Belwec;"> <?php echo strtoupper($db->getOne("SELECT fi_schoolname FROM es_finance_master WHERE es_finance_masterid=(SELECT MAX(es_finance_masterid) FROM es_finance_master)")); ?></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
            </table></td>
      </tr>
    </table>
<?php
}?>