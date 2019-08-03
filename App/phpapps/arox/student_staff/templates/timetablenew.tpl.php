<?php 
/*
*Start of Time Table Web Page
*/	if ($action == 'timetable') { ?>
<table width="100%" border="0"  cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
	 </tr>
	<tr class="bgcolor_02">
		<td height="25" colspan="3">&nbsp;&nbsp;Time Table</td>
	</tr>		
	<tr>
		<td height="25" width="1"  class="bgcolor_02"></td>
		<td>&nbsp;&nbsp;</td>
		<td width="1" class="bgcolor_02"></td>
	</tr>
	<tr>
		<td width="1"  class="bgcolor_02"></td>
		<td align="center">
			<table  width="100%"  cellpadding="2" cellspacing="0" border="1"    class="tbl_grid" >
				<tr class="bgcolor_02">
					<td width="62%" height="20" align="left">&nbsp;Class Timetable</td>
				  <td width="38%" align="center" >Action</td>
				</tr>
<?php
	
	$classlist = getallClasses();
	if(count($classlist)>=1){
	foreach($classlist as $indclass) {
	$count_999 = sqlnumber("SELECT * FROM `es_timetable_staff` WHERE `es_class` = '".$indclass['es_classesid']."'");
	if ($count_999==0){ 
	 
		mysql_query("INSERT INTO `es_timetable_staff` (`es_class`) VALUES ('".$indclass['es_classesid']."')");	
			
	}
	$count_998 = sqlnumber("SELECT * FROM `es_timetable_subject` WHERE `es_class` = '".$indclass['es_classesid']."'");
	if ($count_998==0){  
		mysql_query("INSERT INTO `es_timetable_subject` (`es_class`) VALUES ('".$indclass['es_classesid']."')");	
	}	
?>
			<tr class="bgclor_02">
				<td align="left">&nbsp;<?php echo $indclass['es_classname']; ?></td>
			  <td align="center" style="padding:20">
<script type="text/JavaScript">
	function timetable<?php print $indclass['es_classesid']; ?>add(){		
		MyWin = "?pid=52&action=edittimetable&es_class=<?php print $indclass['es_classesid']; ?>"; 
		winpopup = window.open(MyWin,'popup<?php print $indclass['es_classesid']; ?>', 'height=701,width=1100,menubar=no,scrollbars=yes,status=no,toolbar=no,sereenX=100,screenY=0,left=100,top=0,class=text');	
		winpopup.moveTo(111,25);
}
</script>
<?php /*?>
						<a title="Edit" href="javascript:timetable<?php print $indclass['es_classesid']; ?>add();"><img src="images/b_edit.png" width="16" height="16" border="0" /></a>&nbsp;&nbsp;&nbsp;<?php */?>
	 
<script type="text/JavaScript">
function timetable<?php print $indclass['es_classesid']; ?>view()
    {		
	MyWin="?pid=52&action=viewtimetable&es_class=<?php print $indclass['es_classesid']; ?>"; 
	winpopup=window.open(MyWin,'popup<?php print $indclass['es_classesid']; ?>','height=701,width=888,menubar=no,scrollbars=yes,status=no,toolbar=no,sereenX=100,screenY=0,left=100,top=0,class=text');	
	winpopup.moveTo(111,25);
	}
</script>	
		
						<a title="View" href="javascript:timetable<?php print $indclass['es_classesid']; ?>view();"><img src="images/b_browse.png" width="16" height="16" border="0" /></a>
                 
					</td>
				</tr>

	<?php } } ?>	
			</table>
		</td> 
		<td width="1"  class="bgcolor_02"></td>
	</tr>
	<tr>
		<td height="1" class="bgcolor_02" colspan="3"></td>
	</tr>
</table>
<?php 
} 
/*
*Start of Edit Table Web Page
*/
if ($action=='edittimetable'|| $action=='delete') { 
?>
<form action="" method="post" name="edittimetable">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
 
    <tr>
         <td height="3" colspan="3"></td>
	 </tr>
	<tr>
	  <td height="25" colspan="3" class="bgcolor_02"><span class="admin">&nbsp;Time Table</span></td>
	</tr>
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td width="100%" align="left" valign="top">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				
                <tr>
					<td width="14%" height="25px" align="left" valign="bottom" class="admin">&nbsp;&nbsp;Class   : <?php echo classname($es_class); ?></td>
					<td width="60%" align="center" valign="top" class="error_msg"><strong><?php 
				
				if(is_array($errormessage) && count($errormessage)>=1){
				foreach($errormessage as $eacherrormessage){echo "<a class='success_message'>".$eacherrormessage."</a><br>";}
				}else{echo "<a class='success_message'>".$sucessmessage[$emsg].'</a>';}?></strong></td>
                    <td width="26%" align="right" valign="top"><span class="error_msg">[<a href="?pid=54&action=edittimetable&es_class=<?php echo $es_class; ?>" class="error_msg" >Reset</a>]</span></td>
                </tr>
				<tr>
					<td colspan="4" align="left" valign="top">
						<table width="100%" border="0" cellspacing="4" cellpadding="0">							
							<?php if(isset($es_class) && $es_class!=""){ ?>
							
							<tr>
								<td height="25" align="left" valign="middle">
									<table width="85%" height="154" border="0" cellpadding="0" cellspacing="3">
						  <tr>
											<td align="left" class="admin">Timings </td>
										  <td width="14%" colspan="-3" align="left" class="admin">Start Time</td>
									  <td width="28%" align="left" class="narmal">
								<input type="text" name="es_startfrom" value="<?php	echo $school_start_time=$subject_det['es_startfrom']; ?>" />
												<br />(H : M : S) 
											</td>
										  <td width="20%" class="admin" align="left">Number of Periods</td>
										  <td width="23%" align="left" class="narmal"> <input type="text" name="es_endto" value="<?php	echo $number_of_periods=$subject_det['es_endto']; ?>" /></td>
									  </tr>
										<tr>
											<td height="30" align="left" class="admin"> Break ( 1 ) </td>
										  <td width="14%" colspan="-3" align="left" class="admin">Time Duration</td>
									  <td width="28%" align="left" class="narmal">
										<input type="text" name="es_breakfrom" value="<?php	echo $break=$subject_det['es_breakfrom']; ?>"/>Min
											</td>
										  <td width="20%" class="admin" align="left">Break after period</td>
										  <td width="23%" align="left"> 
                                          <input type="text" name="es_breakto" value="<?php	echo $break_position=$subject_det['es_breakto']; ?>"/>
											</td>
									  </tr>
										<tr>
						<td align="left" class="admin">Break ( 2 ) </td>
						<td width="14%" colspan="-3" align="left" class="admin">Time Duration</td>
						<td width="28%" align="left" class="narmal">
					  <input type="text" name="es_lunchfrom" value="<?php	echo $lunch=$subject_det['es_lunchfrom']; ?>"/>Min 						</td>
						<td width="20%" class="admin" align="left">Break after period</td>
					  <td width="23%" align="left"> 
                      <input type="text" name="es_lunchto" value="<?php	echo $lunch_position=$subject_det['es_lunchto']; ?>"/></td>
					</tr>
					  <tr>
						<td colspan="2" align="left" class="admin">Each Period Duration </td>
						<td align="left" class="narmal">
                        <input type="text" name="es_duration" value="<?php	echo $period_duration=$subject_det['es_duration']; ?>"/>Min </td>
					  </tr>
				  </table>
<?php

	$dd = date("d");
	$mm = date("m");
	$yy = date("Y");
	$peried_1 = explode(":", $school_start_time);
	$h = $peried_1[0];
	$m = $peried_1[1];				  
	$peried_1e = date("H:i", mktime($h,$m+$period_duration,0,$dd,$mm,$yy));
	if ($break_position==1){
		$peried_2 = explode(":", $peried_1e);
		$h = $peried_2[0];
		$m = $peried_2[1];	
		$peried_2s =date("H:i", mktime($h,$m+$break,0,$dd,$mm,$yy));		  
		$peried_2e = date("H:i", mktime($h,$m+$break+$period_duration,0,$dd,$mm,$yy));					
	}else{					
		$peried_2 = explode(":", $peried_1e);
		$h = $peried_2[0];
		$m = $peried_2[1];
		$peried_2s =	$peried_1e;			  
		$peried_2e=date("H:i", mktime($h,$m+$period_duration,0,$dd,$mm,$yy));										
	}
	if ($break_position==2 || $lunch_position==2){
		$peried_3 = explode(":", $peried_2e);
		$h = $peried_3[0];
		$m = $peried_3[1];
		if($break_position==2) {$b=$break;}
		if($lunch_position==2) {$b=$lunch;}
		$peried_3s =date("H:i", mktime($h,$m+$b,0,$dd,$mm,$yy));		  
		$peried_3e = date("H:i", mktime($h,$m+$b+$period_duration,0,$dd,$mm,$yy));					
	}else{					
		$peried_3 = explode(":", $peried_2e);
		$h = $peried_3[0];
		$m = $peried_3[1];
		$peried_3s =	$peried_2e;			  
		$peried_3e=date("H:i", mktime($h,$m+$period_duration,0,$dd,$mm,$yy));						
	}
	if ($break_position==3 || $lunch_position==3){
		$peried_4 = explode(":", $peried_3e);
		$h = $peried_4[0];
		$m = $peried_4[1];
		if($break_position==3) {$b=$break;}
		if($lunch_position==3) {$b=$lunch;}
		$peried_4s =date("H:i", mktime($h,$m+$b,0,$dd,$mm,$yy));		  
		$peried_4e = date("H:i", mktime($h,$m+$b+$period_duration,0,$dd,$mm,$yy));					
	}else{					
		$peried_4 = explode(":", $peried_3e);
		$h = $peried_4[0];
		$m = $peried_4[1];
		$peried_4s =	$peried_3e;			  
		$peried_4e=date("H:i", mktime($h,$m+$period_duration,0,$dd,$mm,$yy));						
	}
	if ($break_position==4 || $lunch_position==4){
		$peried_5 = explode(":", $peried_4e);
		$h = $peried_5[0];
		$m = $peried_5[1];
		if($break_position==4) {$b=$break;}
		if($lunch_position==4) {$b=$lunch;}
		$peried_5s =date("H:i", mktime($h,$m+$b,0,$dd,$mm,$yy));		  
		$peried_5e = date("H:i", mktime($h,$m+$b+$period_duration,0,$dd,$mm,$yy));					
	}else{					
		$peried_5 = explode(":", $peried_4e);
		$h = $peried_5[0];
		$m = $peried_5[1];
		$peried_5s =	$peried_4e;			  
		$peried_5e=date("H:i", mktime($h,$m+$period_duration,0,$dd,$mm,$yy));						
	}
	if ($break_position==5 || $lunch_position==5){
	$peried_6 = explode(":", $peried_5e);
	$h = $peried_6[0];
	$m = $peried_6[1];
	if($break_position==5) {$b=$break;}
	if($lunch_position==5) {$b=$lunch;}
	$peried_6s =date("H:i", mktime($h,$m+$b,0,$dd,$mm,$yy));		  
	$peried_6e = date("H:i", mktime($h,$m+$b+$period_duration,0,$dd,$mm,$yy));					
	}
	else
	{					
	$peried_6 = explode(":", $peried_5e);
	$h = $peried_6[0];
	$m = $peried_6[1];
	$peried_6s =	$peried_5e;			  
	$peried_6e=date("H:i", mktime($h,$m+$period_duration,0,$dd,$mm,$yy));						
	}

	if($break_position==6 || $lunch_position==6)
	{
	$peried_7 = explode(":", $peried_6e);
	$h = $peried_7[0];
	$m = $peried_7[1];
	if($break_position==6) {$b=$break;}
	if($lunch_position==6) {$b=$lunch;}
	$peried_7s =date("H:i", mktime($h,$m+$b,0,$dd,$mm,$yy));		  
	$peried_7e = date("H:i", mktime($h,$m+$b+$period_duration,0,$dd,$mm,$yy));					
	}
	else
	{					
	$peried_7 = explode(":", $peried_6e);
	$h = $peried_7[0];
	$m = $peried_7[1];
	$peried_7s =	$peried_6e;			  
	$peried_7e=date("H:i", mktime($h,$m+$period_duration,0,$dd,$mm,$yy));						
	}

	if($break_position==7 || $lunch_position==7)
	{
	$peried_8 = explode(":", $peried_7e);
	$h = $peried_8[0];
	$m = $peried_8[1];
	if($break_position==7) {$b=$break;}
	if($lunch_position==7) {$b=$lunch;}
	$peried_8s =date("H:i", mktime($h,$m+$b,0,$dd,$mm,$yy));		  
	$peried_8e = date("H:i", mktime($h,$m+$b+$period_duration,0,$dd,$mm,$yy));					
	}
	else
	{					
	$peried_8 = explode(":", $peried_7e);
	$h = $peried_8[0];
	$m = $peried_8[1];
	$peried_8s =	$peried_7e;			  
	$peried_8e=date("H:i", mktime($h,$m+$period_duration,0,$dd,$mm,$yy));						
	}

	if($break_position==8 || $lunch_position==8)
	{
	$peried_9 = explode(":", $peried_8e);
	$h = $peried_9[0];
	$m = $peried_9[1];
	if($break_position==8) {$b=$break;}
	if($lunch_position==8) {$b=$lunch;}
	$peried_9s =date("H:i", mktime($h,$m+$b,0,$dd,$mm,$yy));		  
	$peried_9e = date("H:i", mktime($h,$m+$b+$period_duration,0,$dd,$mm,$yy));					
	}
	else
	{					
	$peried_9 = explode(":", $peried_8e);
	$h = $peried_9[0];
	$m = $peried_9[1];
	$peried_9s =	$peried_8e;			  
	$peried_9e=date("H:i", mktime($h,$m+$period_duration,0,$dd,$mm,$yy));						
	}
?>					
					<table width="100%" height="262" border="1" cellpadding="5" cellspacing="0">
                      <tr  class="bgcolor_02"><?php $ttimage = str_replace("css", "", $_SESSION['eschools']['user_theme']);?>
                        <td width="19%" align="center"><img src="images/tt_<?php echo $ttimage;?>jpg" border="0"></td>
                        <td width="12%" height="23" align="center"><strong>1<br />
						<?php 
						$school_start_time_1=explode(":",$school_start_time); 
						print $school_start_time_1['0']." : ".$school_start_time_1['1'];
						echo " TO <br> ".$peried_1e;
						?> </strong></td>
						<?php if($break_position==1) { ?><td width="13%" rowspan="7"align="center"><strong>B1</strong></td> <?php } ?>
						<?php if($lunch_position==1) { ?><td width="13%" rowspan="7"align="center"><strong>B2</strong></td> <?php } ?>
						
                        <td width="13%"align="center"><strong>2<?php print "<br>".$peried_2s." TO <br>".$peried_2e; ?></strong></td>
						<?php if($break_position==2) { ?><td width="13%" rowspan="7"align="center"><strong>B1</strong></td> <?php } ?>
						<?php if($lunch_position==2) { ?><td width="13%" rowspan="7"align="center"><strong>B2</strong></td> <?php } ?>
						
						 <!--<td width="13%"align="center"><strong> ---- </strong></td> -->
                        <td width="15%" align="center"><strong>3<?php print "<br>".$peried_3s." TO <br>".$peried_3e; ?></strong></td>
						<?php if($break_position==3) { ?><td width="13%" rowspan="7"align="center"><strong>B1</strong></td> <?php } ?>
						<?php if($lunch_position==3) { ?><td width="13%" rowspan="7"align="center"><strong>B2</strong></td> <?php } ?>
						
                        <?php if($number_of_periods >= 4) { ?><td width="17%" align="center"><strong>4<?php print "<br>".$peried_4s." TO <br>".$peried_4e; ?> </strong></td><?php }?>
						<?php if($break_position==4) { ?><td width="13%" rowspan="7"align="center"><strong>B1</strong></td> <?php } ?>
						<?php if($lunch_position==4) { ?><td width="13%" rowspan="7"align="center"><strong>B2</strong></td> <?php } ?>
						
                        <?php if($number_of_periods >= 5) { ?><td width="14%"align="center"><strong>5<?php print "<br>".$peried_5s." TO <br>".$peried_5e; ?></strong></td><?php }?>
						<?php if($break_position==5) { ?><td width="13%" rowspan="7"align="center"><strong>B1</strong></td> <?php } ?>
						<?php if($lunch_position==5) { ?><td width="13%" rowspan="7"align="center"><strong>B2</strong></td> <?php } ?>
						
						 
						<?php if($number_of_periods >= 6) { ?><td width="14%"align="center"><strong>6<?php print "<br>".$peried_6s." TO <br>".$peried_6e; ?></strong></td><?php }?>
						<?php if($break_position==6) { ?><td width="13%" rowspan="7"align="center"><strong>B1</strong></td> <?php } ?>
						<?php if($lunch_position==6) { ?><td width="13%" rowspan="7"align="center"><strong>B2</strong></td> <?php } ?>
						
						<?php if($number_of_periods >= 7) { ?><td width="14%"align="center"><strong>7<?php print "<br>".$peried_7s." TO <br>".$peried_7e; ?></strong></td><?php }?>
						<?php if($break_position==7) { ?><td width="13%" rowspan="7"align="center"><strong>B1</strong></td> <?php } ?>
						<?php if($lunch_position==7) { ?><td width="13%" rowspan="7"align="center"><strong>B2</strong></td> <?php } ?>
						
						<?php if($number_of_periods >= 8) { ?><td width="14%"align="center"><strong>8<?php print "<br>".$peried_8s." TO <br>".$peried_8e; ?></strong></td><?php }?>
						<?php if($break_position==8) { ?><td width="13%" rowspan="7"align="center"><strong>B1</strong></td> <?php } ?>
						<?php if($lunch_position==8) { ?><td width="13%" rowspan="7"align="center"><strong>B2</strong></td> <?php } ?>
						
						<?php if($number_of_periods >= 9) { ?><td width="14%"align="center"><strong>9<?php print "<br>".$peried_9s." TO <br>".$peried_9e; ?></strong></td><?php }?>
						<?php if($break_position==9) { ?><td width="13%" rowspan="7"align="center"><strong>B1</strong></td> <?php } ?>
						<?php if($lunch_position==9) { ?><td width="13%" rowspan="7"align="center"><strong>B2</strong></td> <?php } ?>
						
                      </tr>
					  
                      <tr >
                        <td height="42" class="bgcolor_02" >&nbsp;&nbsp;<strong>Mon </strong></td>
                        <td align="center">
						
						<?php 
						/*$class_sql="select * from es_classes where es_classesid='".$es_class."'";
						$class_exe=mysql_query($class_sql);
						$class_row=mysql_fetch_array($class_exe);
						$class_id=$class_row['es_classesid'];*/
						
					  $class_sql="(
SELECT `es_subjectname`,es_subjectid
FROM es_subject
WHERE `es_subjectshortname` =".$es_class."
)
UNION (

SELECT `subjectname`,ts_id
FROM es_timetable_subjects
WHERE classid =".$es_class."
)";
						$classlist = $db->getRows($class_sql);
					
						if(count($classlist)>=1){
						$subjects_arr[] ="--Subject--";
							foreach($classlist as $each){
							$subjects_arr[$each['es_subjectid']] = strtolower($each['es_subjectname']);
							}
						}
						
						if(!$_POST){
						$es_m1 = $subject_det['es_m1']; $es_m1f = $staff_det['es_m1'];
						$es_m2 = $subject_det['es_m2']; $es_m2f = $staff_det['es_m2'];
						$es_m3 = $subject_det['es_m3']; $es_m3f = $staff_det['es_m3'];
						$es_m4 = $subject_det['es_m4']; $es_m4f = $staff_det['es_m4'];
						$es_m5 = $subject_det['es_m5']; $es_m5f = $staff_det['es_m5'];
						$es_m6 = $subject_det['es_m6']; $es_m6f = $staff_det['es_m6'];
						$es_m7 = $subject_det['es_m7']; $es_m7f = $staff_det['es_m7'];
						$es_m8 = $subject_det['es_m8']; $es_m8f = $staff_det['es_m8'];
						$es_m9 = $subject_det['es_m9']; $es_m9f = $staff_det['es_m9'];
						
						$es_t1 = $subject_det['es_t1']; $es_t1f = $staff_det['es_t1'];
						$es_t2 = $subject_det['es_t2']; $es_t2f = $staff_det['es_t2'];
						$es_t3 = $subject_det['es_t3']; $es_t3f = $staff_det['es_t3'];
						$es_t4 = $subject_det['es_t4']; $es_t4f = $staff_det['es_t4'];
						$es_t5 = $subject_det['es_t5']; $es_t5f = $staff_det['es_t5'];
						$es_t6 = $subject_det['es_t6']; $es_t6f = $staff_det['es_t6'];
						$es_t7 = $subject_det['es_t7']; $es_t7f = $staff_det['es_t7'];
						$es_t8 = $subject_det['es_t8']; $es_t8f = $staff_det['es_t8'];
						$es_t9 = $subject_det['es_t9']; $es_t9f = $staff_det['es_t9'];
						
						
						$es_w1 = $subject_det['es_w1']; $es_w1f = $staff_det['es_w1'];
						$es_w2 = $subject_det['es_w2']; $es_w2f = $staff_det['es_w2'];
						$es_w3 = $subject_det['es_w3']; $es_w3f = $staff_det['es_w3'];
						$es_w4 = $subject_det['es_w4']; $es_w4f = $staff_det['es_w4'];
						$es_w5 = $subject_det['es_w5']; $es_w5f = $staff_det['es_w5'];
						$es_w6 = $subject_det['es_w6']; $es_w6f = $staff_det['es_w6'];
						$es_w7 = $subject_det['es_w7']; $es_w7f = $staff_det['es_w7'];
						$es_w8 = $subject_det['es_w8']; $es_w8f = $staff_det['es_w8'];
						$es_w9 = $subject_det['es_w9']; $es_w9f = $staff_det['es_w9'];
						
						
						$es_th1 = $subject_det['es_th1']; $es_th1f = $staff_det['es_th1'];
						$es_th2 = $subject_det['es_th2']; $es_th2f = $staff_det['es_th2'];
						$es_th3 = $subject_det['es_th3']; $es_th3f = $staff_det['es_th3'];
						$es_th4 = $subject_det['es_th4']; $es_th4f = $staff_det['es_th4'];
						$es_th5 = $subject_det['es_th5']; $es_th5f = $staff_det['es_th5'];
						$es_th6 = $subject_det['es_th6']; $es_th6f = $staff_det['es_th6'];
						$es_th7 = $subject_det['es_th7']; $es_th7f = $staff_det['es_th7'];
						$es_th8 = $subject_det['es_th8']; $es_th8f = $staff_det['es_th8'];
						$es_th9 = $subject_det['es_th9']; $es_th9f = $staff_det['es_th9'];
						
						$es_f1 = $subject_det['es_f1']; $es_f1f = $staff_det['es_f1'];
						$es_f2 = $subject_det['es_f2']; $es_f2f = $staff_det['es_f2'];
						$es_f3 = $subject_det['es_f3']; $es_f3f = $staff_det['es_f3'];
						$es_f4 = $subject_det['es_f4']; $es_f4f = $staff_det['es_f4'];
						$es_f5 = $subject_det['es_f5']; $es_f5f = $staff_det['es_f5'];
						$es_f6 = $subject_det['es_f6']; $es_f6f = $staff_det['es_f6'];
						$es_f7 = $subject_det['es_f7']; $es_f7f = $staff_det['es_f7'];
						$es_f8 = $subject_det['es_f8']; $es_f8f = $staff_det['es_f8'];
						$es_f9 = $subject_det['es_f9']; $es_f9f = $staff_det['es_f9'];
						
						
						$es_s1 = $subject_det['es_s1']; $es_s1f = $staff_det['es_s1'];
						$es_s2 = $subject_det['es_s2']; $es_s2f = $staff_det['es_s2'];
						$es_s3 = $subject_det['es_s3']; $es_s3f = $staff_det['es_s3'];
						$es_s4 = $subject_det['es_s4']; $es_s4f = $staff_det['es_s4'];
						$es_s5 = $subject_det['es_s5']; $es_s5f = $staff_det['es_s5'];
						$es_s6 = $subject_det['es_s6']; $es_s6f = $staff_det['es_s6'];
						$es_s7 = $subject_det['es_s7']; $es_s7f = $staff_det['es_s7'];
						$es_s8 = $subject_det['es_s8']; $es_s8f = $staff_det['es_s8'];
						$es_s9 = $subject_det['es_s9']; $es_s9f = $staff_det['es_s9'];
						
						
						}
						
							      echo $html_obj->draw_selectfield('es_m1',$subjects_arr,'','style="width:101px;"'); 
									$m1_staff_arr = showstaff($es_class,"es_m1");
								
							      echo $html_obj->draw_selectfield('es_m1f',$m1_staff_arr,'','style="width:101px;"');
						     ?>
                        
						</td>
						<td align="center">
                        <?php 
							      echo $html_obj->draw_selectfield('es_m2',$subjects_arr,'','style="width:101px;"'); 
									$m2_staff_arr = showstaff($es_class,"es_m2");
							      echo $html_obj->draw_selectfield('es_m2f',$m2_staff_arr,'','style="width:101px;"');
						     ?>
            
            </td>
			<!--<td width="14%"align="center"><strong>B </strong></td> -->
                        <td align="center">
                        <?php 
							      echo $html_obj->draw_selectfield('es_m3',$subjects_arr,'','style="width:101px;"'); 
									$m3_staff_arr = showstaff($es_class,"es_m3");
							      echo $html_obj->draw_selectfield('es_m3f',$m3_staff_arr,'','style="width:101px;"');
						     ?>
                        </td>
                       <?php if($number_of_periods >= 4) { ?> <td align="center">
                        <?php 
							      echo $html_obj->draw_selectfield('es_m4',$subjects_arr,'','style="width:101px;"'); 
									$m4_staff_arr = showstaff($es_class,"es_m4");
							      echo $html_obj->draw_selectfield('es_m4f',$m4_staff_arr,'','style="width:101px;"');
						     ?>
                        </td><?php }?>
                        <?php if($number_of_periods >= 5) { ?><td align="center">
                        <?php 
							      echo $html_obj->draw_selectfield('es_m5',$subjects_arr,'','style="width:101px;"'); 
									$m5_staff_arr = showstaff($es_class,"es_m5");
							      echo $html_obj->draw_selectfield('es_m5f',$m5_staff_arr,'','style="width:101px;"');
						     ?>
                        
                        </td><?php }?>
                        <?php if($number_of_periods >= 6) { ?>
						<td align="center" valign="middle">
                        
                        <?php 
							      echo $html_obj->draw_selectfield('es_m6',$subjects_arr,'','style="width:101px;"'); 
									$m6_staff_arr = showstaff($es_class,"es_m6");
							      echo $html_obj->draw_selectfield('es_m6f',$m6_staff_arr,'','style="width:101px;"');
						     ?>
                        
                        </td><?php }?>
                        <?php if($number_of_periods >= 7) { ?><td align="center" valign="middle">
                        <?php 
							      echo $html_obj->draw_selectfield('es_m7',$subjects_arr,'','style="width:101px;"'); 
									$m7_staff_arr = showstaff($es_class,"es_m7");
							      echo $html_obj->draw_selectfield('es_m7f',$m7_staff_arr,'','style="width:101px;"');
						     ?>
                        
                        </td><?php }?>
                        <?php if($number_of_periods >= 8) { ?><td align="center" valign="middle">
                        <?php 
							      echo $html_obj->draw_selectfield('es_m8',$subjects_arr,'','style="width:101px;"'); 
									$m8_staff_arr = showstaff($es_class,"es_m8");
							      echo $html_obj->draw_selectfield('es_m8f',$m8_staff_arr,'','style="width:101px;"');
						     ?>
                                      
                                      </td><?php }?>
                        <?php if($number_of_periods >= 9) { ?><td align="center" valign="middle">
                             <?php 
							      echo $html_obj->draw_selectfield('es_m9',$subjects_arr,'','style="width:101px;"'); 
									$m9_staff_arr = showstaff($es_class,"es_m9");
							      echo $html_obj->draw_selectfield('es_m9f',$m9_staff_arr,'','style="width:101px;"');
						     ?>         
                             </td><?php }?>
                      </tr>
                      <tr>
                        <td height="41" class="bgcolor_02"><strong>&nbsp;&nbsp;Tue</strong></td>
                        <td align="center">
                        <?php echo $html_obj->draw_selectfield('es_t1',$subjects_arr,'','style="width:101px;"'); 
									$t1_staff_arr = showstaff($es_class,"es_t1");
							  echo $html_obj->draw_selectfield('es_t1f',$t1_staff_arr,'','style="width:101px;"');
						?>
                        </td>
                        <td align="center">
                        <?php echo $html_obj->draw_selectfield('es_t2',$subjects_arr,'','style="width:101px;"'); 
									$t2_staff_arr = showstaff($es_class,"es_t2");
							  echo $html_obj->draw_selectfield('es_t2f',$t2_staff_arr,'','style="width:101px;"');
						?>
                        </td>
						
                        <td align="center">
                         <?php echo $html_obj->draw_selectfield('es_t3',$subjects_arr,'','style="width:101px;"'); 
									$t3_staff_arr = showstaff($es_class,"es_t3");
							  echo $html_obj->draw_selectfield('es_t3f',$t3_staff_arr,'','style="width:101px;"');
						?>
                        </td>
                         <?php if($number_of_periods >= 4) { ?><td align="center">
                         <?php echo $html_obj->draw_selectfield('es_t4',$subjects_arr,'','style="width:101px;"'); 
									$t4_staff_arr = showstaff($es_class,"es_t4");
							  echo $html_obj->draw_selectfield('es_t4f',$t4_staff_arr,'','style="width:101px;"');
						?>
                        </td><?php }?>
                        <?php if($number_of_periods >= 5) { ?><td align="center">
                        <?php echo $html_obj->draw_selectfield('es_t5',$subjects_arr,'','style="width:101px;"'); 
									$t5_staff_arr = showstaff($es_class,"es_t5");
							  echo $html_obj->draw_selectfield('es_t5f',$t5_staff_arr,'','style="width:101px;"');
						?>
                       </td><?php }?>
                        <?php if($number_of_periods >= 6) { ?><td align="center" valign="middle">
                        <?php echo $html_obj->draw_selectfield('es_t6',$subjects_arr,'','style="width:101px;"'); 
									$t6_staff_arr = showstaff($es_class,"es_t6");
							  echo $html_obj->draw_selectfield('es_t6f',$t6_staff_arr,'','style="width:101px;"');
						?>
                        </td><?php }?>
                        <?php if($number_of_periods >= 7) { ?><td align="center" valign="middle">
                        <?php echo $html_obj->draw_selectfield('es_t7',$subjects_arr,'','style="width:101px;"'); 
									$t7_staff_arr = showstaff($es_class,"es_t7");
							  echo $html_obj->draw_selectfield('es_t7f',$t7_staff_arr,'','style="width:101px;"');
						?>
                        </td><?php }?>
                        <?php if($number_of_periods >= 8) { ?><td align="center" valign="middle">
                        <?php echo $html_obj->draw_selectfield('es_t8',$subjects_arr,'','style="width:101px;"'); 
                              $t8_staff_arr = showstaff($es_class,"es_t8");
                             echo $html_obj->draw_selectfield('es_t8f',$t8_staff_arr,'','style="width:101px;"');
                        ?>
                        </td><?php }?>
                        <?php if($number_of_periods >= 9) { ?><td align="center" valign="middle">
                        <?php echo $html_obj->draw_selectfield('es_t9',$subjects_arr,'','style="width:101px;"'); 
                              $t9_staff_arr = showstaff($es_class,"es_t9");
                             echo $html_obj->draw_selectfield('es_t9f',$t9_staff_arr,'','style="width:101px;"');
                        ?>
                        </td><?php }?>
                      </tr>
                      <tr>
                        <td height="39" class="bgcolor_02"><strong>&nbsp;&nbsp;Wed</strong></td>
                        <td align="center">
                        <?php echo $html_obj->draw_selectfield('es_w1',$subjects_arr,'','style="width:101px;"'); 
                              $w1_staff_arr = showstaff($es_class,"es_w1");
                              echo $html_obj->draw_selectfield('es_w1f',$w1_staff_arr,'','style="width:101px;"');
                        ?>
                        </td>
                        <td align="center">
                        <?php echo $html_obj->draw_selectfield('es_w2',$subjects_arr,'','style="width:101px;"'); 
                              $w2_staff_arr = showstaff($es_class,"es_w2");
                              echo $html_obj->draw_selectfield('es_w2f',$w2_staff_arr,'','style="width:101px;"');
                        ?>
                        </td>
					<!--<td width="12%"align="center"><strong>E</strong></td> -->
                        <td align="center">
                        <?php echo $html_obj->draw_selectfield('es_w3',$subjects_arr,'','style="width:101px;"'); 
                              $w3_staff_arr = showstaff($es_class,"es_w3");
                              echo $html_obj->draw_selectfield('es_w3f',$w3_staff_arr,'','style="width:101px;"');
                        ?>
                        </td>
                       
                        <?php if($number_of_periods >= 4) { ?><td align="center">
                        <?php echo $html_obj->draw_selectfield('es_w4',$subjects_arr,'','style="width:101px;"'); 
                              $w4_staff_arr = showstaff($es_class,"es_w4");
                              echo $html_obj->draw_selectfield('es_w4f',$w4_staff_arr,'','style="width:101px;"');
                        ?>
                        </td><?php }?>
                        <?php if($number_of_periods >= 5) { ?><td align="center">
                        <?php echo $html_obj->draw_selectfield('es_w5',$subjects_arr,'','style="width:101px;"'); 
                              $w5_staff_arr = showstaff($es_class,"es_w5");
                              echo $html_obj->draw_selectfield('es_w5f',$w5_staff_arr,'','style="width:101px;"');
                        ?>
                        </td><?php }?>
                        <?php if($number_of_periods >= 6) { ?><td align="center" valign="middle">
                        <?php echo $html_obj->draw_selectfield('es_w6',$subjects_arr,'','style="width:101px;"'); 
                              $w6_staff_arr = showstaff($es_class,"es_w6");
                              echo $html_obj->draw_selectfield('es_w6f',$w6_staff_arr,'','style="width:101px;"');
                        ?>
                        </td><?php }?>
                        <?php if($number_of_periods >= 7) { ?><td align="center" valign="middle">
                        <?php echo $html_obj->draw_selectfield('es_w7',$subjects_arr,'','style="width:101px;"'); 
                              $w7_staff_arr = showstaff($es_class,"es_w7");
                              echo $html_obj->draw_selectfield('es_w7f',$w7_staff_arr,'','style="width:101px;"');
                        ?>
                        </td><?php }?>
                        <?php if($number_of_periods >= 8) { ?><td align="center" valign="middle">
                        <?php echo $html_obj->draw_selectfield('es_w8',$subjects_arr,'','style="width:101px;"'); 
                              $w8_staff_arr = showstaff($es_class,"es_w8");
                              echo $html_obj->draw_selectfield('es_w8f',$w8_staff_arr,'','style="width:101px;"');
                        ?>
                        </td><?php }?>
                        <?php if($number_of_periods >= 9) { ?><td align="center" valign="middle">
                        <?php echo $html_obj->draw_selectfield('es_w9',$subjects_arr,'','style="width:101px;"'); 
                              $w9_staff_arr = showstaff($es_class,"es_w9");
                              echo $html_obj->draw_selectfield('es_w9f',$w9_staff_arr,'','style="width:101px;"');
                        ?>
                        </td><?php }?>
                        
                      </tr>
                      <tr>
                        <td height="40" class="bgcolor_02"><strong>&nbsp;&nbsp;Thurs</strong></td>
                        <td align="center">
                         <?php echo $html_obj->draw_selectfield('es_th1',$subjects_arr,'','style="width:101px;"'); 
                              $th1_staff_arr = showstaff($es_class,"es_th1");
                              echo $html_obj->draw_selectfield('es_th1f',$th1_staff_arr,'','style="width:101px;"');
                        ?>
                        </td>
                        <td align="center">
                        <?php echo $html_obj->draw_selectfield('es_th2',$subjects_arr,'','style="width:101px;"'); 
                              $th2_staff_arr = showstaff($es_class,"es_th2");
                              echo $html_obj->draw_selectfield('es_th2f',$th2_staff_arr,'','style="width:101px;"');
                        ?>
                        </td>
						<td align="center">
                        <?php echo $html_obj->draw_selectfield('es_th3',$subjects_arr,'','style="width:101px;"'); 
                              $th3_staff_arr = showstaff($es_class,"es_th3");
                              echo $html_obj->draw_selectfield('es_th3f',$th3_staff_arr,'','style="width:101px;"');
                        ?>
                        </td>
                       <?php if($number_of_periods >= 4) { ?> <td align="center">
                        <?php echo $html_obj->draw_selectfield('es_th4',$subjects_arr,'','style="width:101px;"'); 
                              $th4_staff_arr = showstaff($es_class,"es_th4");
                              echo $html_obj->draw_selectfield('es_th4f',$th4_staff_arr,'','style="width:101px;"');
                        ?>
                        </td><?php }?>
                        <?php if($number_of_periods >= 5) { ?><td align="center">
                        <?php echo $html_obj->draw_selectfield('es_th5',$subjects_arr,'','style="width:101px;"'); 
                              $th5_staff_arr = showstaff($es_class,"es_th5");
                              echo $html_obj->draw_selectfield('es_th5f',$th5_staff_arr,'','style="width:101px;"');
                        ?>
                        </td><?php }?>
                        <?php if($number_of_periods >= 6) { ?><td align="center" valign="middle">
                        <?php echo $html_obj->draw_selectfield('es_th6',$subjects_arr,'','style="width:101px;"'); 
                              $th6_staff_arr = showstaff($es_class,"es_th6");
                              echo $html_obj->draw_selectfield('es_th6f',$th6_staff_arr,'','style="width:101px;"');
                        ?>
                        </td><?php }?>
                        <?php if($number_of_periods >= 7) { ?><td align="center" valign="middle">
                        <?php echo $html_obj->draw_selectfield('es_th7',$subjects_arr,'','style="width:101px;"'); 
                              $th7_staff_arr = showstaff($es_class,"es_th7");
                              echo $html_obj->draw_selectfield('es_th7f',$th7_staff_arr,'','style="width:101px;"');
                        ?>
                        </td><?php }?>
                        <?php if($number_of_periods >= 8) { ?><td align="center" valign="middle">
                        <?php echo $html_obj->draw_selectfield('es_th8',$subjects_arr,'','style="width:101px;"'); 
                              $th8_staff_arr = showstaff($es_class,"es_th8");
                              echo $html_obj->draw_selectfield('es_th8f',$th8_staff_arr,'','style="width:101px;"');
                        ?>
                        </td><?php }?>
                        <?php if($number_of_periods >= 9) { ?><td align="center" valign="middle">
                        <?php echo $html_obj->draw_selectfield('es_th9',$subjects_arr,'','style="width:101px;"'); 
                              $th9_staff_arr = showstaff($es_class,"es_th9");
                              echo $html_obj->draw_selectfield('es_th9f',$th9_staff_arr,'','style="width:101px;"');
                        ?>
                        </td><?php }?>
                        
                      </tr>
                      <tr>
                        <td class="bgcolor_02"><strong>&nbsp;&nbsp;Fri</strong></td>
                        <td align="center">
                        <?php echo $html_obj->draw_selectfield('es_f1',$subjects_arr,'','style="width:101px;"'); 
                              $f1_staff_arr = showstaff($es_class,"es_f1");
                              echo $html_obj->draw_selectfield('es_f1f',$f1_staff_arr,'','style="width:101px;"');
                        ?>
                        </td>
                        <td align="center">
                        <?php echo $html_obj->draw_selectfield('es_f2',$subjects_arr,'','style="width:101px;"'); 
                              $f2_staff_arr = showstaff($es_class,"es_f2");
                              echo $html_obj->draw_selectfield('es_f2f',$f2_staff_arr,'','style="width:101px;"');
                        ?>
                        </td>
						<td align="center">
                        <?php echo $html_obj->draw_selectfield('es_f3',$subjects_arr,'','style="width:101px;"'); 
                              $f3_staff_arr = showstaff($es_class,"es_f3");
                              echo $html_obj->draw_selectfield('es_f3f',$f3_staff_arr,'','style="width:101px;"');
                        ?>
                        </td>
                        <?php if($number_of_periods >= 4) { ?><td align="center">
                        <?php echo $html_obj->draw_selectfield('es_f4',$subjects_arr,'','style="width:101px;"'); 
                              $f4_staff_arr = showstaff($es_class,"es_f4");
                              echo $html_obj->draw_selectfield('es_f4f',$f4_staff_arr,'','style="width:101px;"');
                        ?>
                        </td><?php }?>
                        <?php if($number_of_periods >= 5) { ?><td align="center">
                        <?php echo $html_obj->draw_selectfield('es_f5',$subjects_arr,'','style="width:101px;"'); 
                              $f5_staff_arr = showstaff($es_class,"es_f5");
                              echo $html_obj->draw_selectfield('es_f5f',$f5_staff_arr,'','style="width:101px;"');
                        ?>
                        </td><?php }?>
                        <?php if($number_of_periods >= 6) { ?><td align="center" valign="middle">
                        <?php echo $html_obj->draw_selectfield('es_f6',$subjects_arr,'','style="width:101px;"'); 
                              $f6_staff_arr = showstaff($es_class,"es_f6");
                              echo $html_obj->draw_selectfield('es_f6f',$f6_staff_arr,'','style="width:101px;"');
                        ?>
                        </td><?php }?>
                        <?php if($number_of_periods >= 7) { ?><td align="center" valign="middle">
                        <?php echo $html_obj->draw_selectfield('es_f7',$subjects_arr,'','style="width:101px;"'); 
                              $f7_staff_arr = showstaff($es_class,"es_f7");
                              echo $html_obj->draw_selectfield('es_f7f',$f7_staff_arr,'','style="width:101px;"');
                        ?>
                        </td><?php }?>
                        <?php if($number_of_periods >= 8) { ?><td align="center" valign="middle">
                        <?php echo $html_obj->draw_selectfield('es_f8',$subjects_arr,'','style="width:101px;"'); 
                              $f8_staff_arr = showstaff($es_class,"es_f8");
                              echo $html_obj->draw_selectfield('es_f8f',$f8_staff_arr,'','style="width:101px;"');
                        ?>
                        </td><?php }?>
                        <?php if($number_of_periods >= 9) { ?><td align="center" valign="middle">
                        <?php echo $html_obj->draw_selectfield('es_f9',$subjects_arr,'','style="width:101px;"'); 
                              $f9_staff_arr = showstaff($es_class,"es_f9");
                              echo $html_obj->draw_selectfield('es_f9f',$f9_staff_arr,'','style="width:101px;"');
                        ?>
                        </td><?php }?>
                       
                      </tr>
                      <tr>
                        <td height="43" class="bgcolor_02"><strong>&nbsp;&nbsp;Sat</strong></td>
                        <td align="center">
                        <?php echo $html_obj->draw_selectfield('es_s1',$subjects_arr,'','style="width:101px;"'); 
                              $s1_staff_arr = showstaff($es_class,"es_s1");
                              echo $html_obj->draw_selectfield('es_s1f',$s1_staff_arr,'','style="width:101px;"');
                        ?>
                        </td>
                        <td align="center">
                        <?php echo $html_obj->draw_selectfield('es_s2',$subjects_arr,'','style="width:101px;"'); 
                              $s2_staff_arr = showstaff($es_class,"es_s2");
                              echo $html_obj->draw_selectfield('es_s2f',$s2_staff_arr,'','style="width:101px;"');
                        ?>
                        </td>
						<td align="center">
                        <?php echo $html_obj->draw_selectfield('es_s3',$subjects_arr,'','style="width:101px;"'); 
                              $s3_staff_arr = showstaff($es_class,"es_s3");
                              echo $html_obj->draw_selectfield('es_s3f',$s3_staff_arr,'','style="width:101px;"');
                        ?>
                        </td>
                         <?php if($number_of_periods >= 4) { ?><td align="center">
                        <?php echo $html_obj->draw_selectfield('es_s4',$subjects_arr,'','style="width:101px;"'); 
                              $s4_staff_arr = showstaff($es_class,"es_s4");
                              echo $html_obj->draw_selectfield('es_s4f',$s4_staff_arr,'','style="width:101px;"');
                        ?>
                        </td><?php }?>
                        <?php if($number_of_periods >= 5) { ?><td align="center">
                        <?php echo $html_obj->draw_selectfield('es_s5',$subjects_arr,'','style="width:101px;"'); 
                              $s5_staff_arr = showstaff($es_class,"es_s5");
                              echo $html_obj->draw_selectfield('es_s5f',$s5_staff_arr,'','style="width:101px;"');
                        ?>
                        </td><?php }?>
                        <?php if($number_of_periods >= 6) { ?><td align="center" valign="middle">
                        <?php echo $html_obj->draw_selectfield('es_s6',$subjects_arr,'','style="width:101px;"'); 
                              $s6_staff_arr = showstaff($es_class,"es_s6");
                              echo $html_obj->draw_selectfield('es_s6f',$s6_staff_arr,'','style="width:101px;"');
                        ?>
                        </td><?php }?>
                        <?php if($number_of_periods >= 7) { ?><td align="center" valign="middle">
                        <?php echo $html_obj->draw_selectfield('es_s7',$subjects_arr,'','style="width:101px;"'); 
                              $s7_staff_arr = showstaff($es_class,"es_s7");
                              echo $html_obj->draw_selectfield('es_s7f',$s7_staff_arr,'','style="width:101px;"');
                        ?>
                        </td><?php }?>
                        <?php if($number_of_periods >= 8) { ?><td align="center" valign="middle">
                        <?php echo $html_obj->draw_selectfield('es_s8',$subjects_arr,'','style="width:101px;"'); 
                              $s8_staff_arr = showstaff($es_class,"es_s8");
                              echo $html_obj->draw_selectfield('es_s8f',$s8_staff_arr,'','style="width:101px;"');
                        ?>
                        </td><?php }?>
                        <?php if($number_of_periods >= 9) { ?><td align="center" valign="middle">
                        <?php echo $html_obj->draw_selectfield('es_s9',$subjects_arr,'','style="width:101px;"'); 
                              $s9_staff_arr = showstaff($es_class,"es_s9");
                              echo $html_obj->draw_selectfield('es_s9f',$s9_staff_arr,'','style="width:101px;"');
                        ?>
                       </td> <?php }?>
                        
						<?php  } ?> 
            </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle"></td>
                  </tr>
                </table>
                     </td>
                  </tr>
                  <tr>
				  <td colspan="4" align="center" valign="top"> 
                  <!--Staff and Subject display-->
                 
                 <!--Staff and Subject display End-->
					  </td>
                      </tr>
                      
				    <tr>
                    <td colspan="4" align="center" ><br />
					  <?php if(isset($es_class) && $es_class!='')
{ ?><input name="updatetable" type="submit" class="bgcolor_02" value="Update" style="cursor:pointer" />


                 <?php  }?> 
</td>
                  </tr>
			
                  <tr>
                    <td colspan="4" align="center" ><br />
					  
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
<?php 
}
/*
*Start of View Table Web Page
*/
if($action == 'viewtimetable') { ?>
<form action="" method="post" name="edittimetable">
<table border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
	 </tr>
	<tr>
		<td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;Time Table for Class - <?php echo classname($es_class); ?></strong>
          <script type="text/javaScript">
  function printing(){
	  document.getElementById("printbutton").style.display = "none";
	  window.print();
	  //window.close();
	 }

  </script>
        </td>
	</tr>
    <tr>
                <td width="1" class="bgcolor_02"></td>
                <td width="956" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td colspan="4" align="left" valign="top">&nbsp;</td>
                  </tr>
                  <tr>
                   
					  
                
                    <td width="50%" align="left" valign="top" class="narmal"></td>
					
                    <td width="15%" align="left" class="narmal" valign="right"> <?php if(isset($es_class) && $es_class!='')
{ ?> <a href="?pid=54&action=edittimetable" ></a> <?php }?></td>
                  </tr> 
			
				  
                  <tr>
                    <td colspan="5" align="left" valign="top">
					
					
					<table width="100%" border="0" cellspacing="4" cellpadding="0">
                  <tr>
                    <td align="left" valign="top"><table width="100%" border="0" cellspacing="5" cellpadding="0">
                      <tr>
                        
						
                      </tr>
                      
                    </table></td>
                  </tr>
				  
 <?php if(isset($es_class) && $es_class!=""){ ?>
                  <tr>
                    <td height="25" align="left" valign="middle">
					
					<?php	$school_start_time=$view_timetable['es_startfrom']; ?>
					<?php	$number_of_periods=$view_timetable['es_endto']; ?>
					<?php	$break=$view_timetable['es_breakfrom']; ?>
					<?php	$break_position=$view_timetable['es_breakto']; ?>
					<?php	$lunch=$view_timetable['es_lunchfrom']; ?>

					<?php	$lunch_position=$view_timetable['es_lunchto']; ?>
					<?php	$period_duration=$view_timetable['es_duration']; ?>
					
					
					<?php
				  $dd=date("d");
				  $mm=date("m");
				  $yy=date("Y");
				  
				  $peried_1 = explode(":", $school_start_time);
                  $h = $peried_1[0];
                  $m = $peried_1[1];				  
				  $peried_1e=date("H:i", mktime($h,$m+$period_duration,0,$dd,$mm,$yy));
				  
				  if($break_position==1)
				    {
					$peried_2 = explode(":", $peried_1e);
                    $h = $peried_2[0];
                    $m = $peried_2[1];	
					$peried_2s =date("H:i", mktime($h,$m+$break,0,$dd,$mm,$yy));		  
				    $peried_2e = date("H:i", mktime($h,$m+$break+$period_duration,0,$dd,$mm,$yy));					
					}
				  else
				    {					
					$peried_2 = explode(":", $peried_1e);
                    $h = $peried_2[0];
                    $m = $peried_2[1];
					$peried_2s =	$peried_1e;			  
				    $peried_2e=date("H:i", mktime($h,$m+$period_duration,0,$dd,$mm,$yy));										
					}
					
				  if($break_position==2 || $lunch_position==2)
				    {
					$peried_3 = explode(":", $peried_2e);
                    $h = $peried_3[0];
                    $m = $peried_3[1];
					if($break_position==2) {$b=$break;}
					if($lunch_position==2) {$b=$lunch;}
					$peried_3s =date("H:i", mktime($h,$m+$b,0,$dd,$mm,$yy));		  
				    $peried_3e = date("H:i", mktime($h,$m+$b+$period_duration,0,$dd,$mm,$yy));					
					}
				  else
				    {					
					$peried_3 = explode(":", $peried_2e);
                    $h = $peried_3[0];
                    $m = $peried_3[1];
					$peried_3s =	$peried_2e;			  
				    $peried_3e=date("H:i", mktime($h,$m+$period_duration,0,$dd,$mm,$yy));						
					}
					
				  if($break_position==3 || $lunch_position==3)
				    {
					$peried_4 = explode(":", $peried_3e);
                    $h = $peried_4[0];
                    $m = $peried_4[1];
					if($break_position==3) {$b=$break;}
					if($lunch_position==3) {$b=$lunch;}
					$peried_4s =date("H:i", mktime($h,$m+$b,0,$dd,$mm,$yy));		  
				    $peried_4e = date("H:i", mktime($h,$m+$b+$period_duration,0,$dd,$mm,$yy));					
					}
				  else
				    {					
					$peried_4 = explode(":", $peried_3e);
                    $h = $peried_4[0];
                    $m = $peried_4[1];
					$peried_4s =	$peried_3e;			  
				    $peried_4e=date("H:i", mktime($h,$m+$period_duration,0,$dd,$mm,$yy));						
					}
					
				  if($break_position==4 || $lunch_position==4)
				    {
					$peried_5 = explode(":", $peried_4e);
                    $h = $peried_5[0];
                    $m = $peried_5[1];
					if($break_position==4) {$b=$break;}
					if($lunch_position==4) {$b=$lunch;}
					$peried_5s =date("H:i", mktime($h,$m+$b,0,$dd,$mm,$yy));		  
				    $peried_5e = date("H:i", mktime($h,$m+$b+$period_duration,0,$dd,$mm,$yy));					
					}
				  else
				    {					
					$peried_5 = explode(":", $peried_4e);
                    $h = $peried_5[0];
                    $m = $peried_5[1];
					$peried_5s =	$peried_4e;			  
				    $peried_5e=date("H:i", mktime($h,$m+$period_duration,0,$dd,$mm,$yy));						
					}
					
				 if($break_position==5 || $lunch_position==5)
				    {
					$peried_6 = explode(":", $peried_5e);
                    $h = $peried_6[0];
                    $m = $peried_6[1];
					if($break_position==5) {$b=$break;}
					if($lunch_position==5) {$b=$lunch;}
					$peried_6s =date("H:i", mktime($h,$m+$b,0,$dd,$mm,$yy));		  
				    $peried_6e = date("H:i", mktime($h,$m+$b+$period_duration,0,$dd,$mm,$yy));					
					}
				  else
				    {					
					$peried_6 = explode(":", $peried_5e);
                    $h = $peried_6[0];
                    $m = $peried_6[1];
					$peried_6s =	$peried_5e;			  
				    $peried_6e=date("H:i", mktime($h,$m+$period_duration,0,$dd,$mm,$yy));						
					}
					
				  if($break_position==6 || $lunch_position==6)
				    {
					$peried_7 = explode(":", $peried_6e);
                    $h = $peried_7[0];
                    $m = $peried_7[1];
					if($break_position==6) {$b=$break;}
					if($lunch_position==6) {$b=$lunch;}
					$peried_7s =date("H:i", mktime($h,$m+$b,0,$dd,$mm,$yy));		  
				    $peried_7e = date("H:i", mktime($h,$m+$b+$period_duration,0,$dd,$mm,$yy));					
					}
				  else
				    {					
					$peried_7 = explode(":", $peried_6e);
                    $h = $peried_7[0];
                    $m = $peried_7[1];
					$peried_7s =	$peried_6e;			  
				    $peried_7e=date("H:i", mktime($h,$m+$period_duration,0,$dd,$mm,$yy));						
					}
					
				  if($break_position==7 || $lunch_position==7)
				    {
					$peried_8 = explode(":", $peried_7e);
                    $h = $peried_8[0];
                    $m = $peried_8[1];
					if($break_position==7) {$b=$break;}
					if($lunch_position==7) {$b=$lunch;}
					$peried_8s =date("H:i", mktime($h,$m+$b,0,$dd,$mm,$yy));		  
				    $peried_8e = date("H:i", mktime($h,$m+$b+$period_duration,0,$dd,$mm,$yy));					
					}
				  else
				    {					
					$peried_8 = explode(":", $peried_7e);
                    $h = $peried_8[0];
                    $m = $peried_8[1];
					$peried_8s =	$peried_7e;			  
				    $peried_8e=date("H:i", mktime($h,$m+$period_duration,0,$dd,$mm,$yy));						
					}
					
				  if($break_position==8 || $lunch_position==8)
				    {
					$peried_9 = explode(":", $peried_8e);
                    $h = $peried_9[0];
                    $m = $peried_9[1];
					if($break_position==8) {$b=$break;}
					if($lunch_position==8) {$b=$lunch;}
					$peried_9s =date("H:i", mktime($h,$m+$b,0,$dd,$mm,$yy));		  
				    $peried_9e = date("H:i", mktime($h,$m+$b+$period_duration,0,$dd,$mm,$yy));					
					}
				  else
				    {					
					$peried_9 = explode(":", $peried_8e);
                    $h = $peried_9[0];
                    $m = $peried_9[1];
					$peried_9s =	$peried_8e;			  
				    $peried_9e=date("H:i", mktime($h,$m+$period_duration,0,$dd,$mm,$yy));						
					}
					
				  ?>
				  <table width="100%" height="300" border="1" cellpadding="0" cellspacing="0">
                      <tr  class="bgcolor_02">
                        <td width="6%" align="center"><?php $ttimage = str_replace("css", "", $_SESSION['eschools']['user_theme']);?><img src="images/tt_<?php echo $ttimage;?>jpg" border="0"></td>
                        <td width="8%" height="23" align="center"><strong>1<?php 
						$school_start_time_1=explode(":",$school_start_time); 
						print "<br/>".$school_start_time_1['0']." : ".$school_start_time_1['1'];
						echo " TO <br> ".$peried_1e;
						?>
						 </strong></td>
						 
						 <?php if($break_position==1) { ?><td width="13%" rowspan="7"align="center"><strong>B1</strong></td> <?php } ?>
						<?php if($lunch_position==1) { ?><td width="13%" rowspan="7"align="center"><strong>B2</strong></td> <?php } ?>
						
                        <td width="10%"align="center"><strong>2<?php print "<br>".$peried_2s." TO <br>".$peried_2e; ?></strong></td>
						
						<?php if($break_position==2) { ?><td width="13%" rowspan="7"align="center"><strong>B1</strong></td> <?php } ?>
						<?php if($lunch_position==2) { ?><td width="13%" rowspan="7"align="center"><strong>B2</strong></td> <?php } ?>
						  
                          <td width="8%" align="center"><strong>3<?php print "<br>".$peried_3s." TO <br>".$peried_3e; ?></strong></td>
						  
						  <?php if($break_position==3) { ?><td width="13%" rowspan="7"align="center"><strong>B1</strong></td> <?php } ?>
						<?php if($lunch_position==3) { ?><td width="13%" rowspan="7"align="center"><strong>B2</strong></td> <?php } ?>
						<?php if($number_of_periods >= 4) { ?>
                        <td width="9%" align="center"><strong>4<?php print "<br>".$peried_4s." TO <br>".$peried_4e; ?></strong></td>
							<?php } ?>
						<?php if($break_position==4) { ?><td width="13%" rowspan="7"align="center"><strong>B1</strong></td> <?php } ?>
						<?php if($lunch_position==4) { ?><td width="13%" rowspan="7"align="center"><strong>B2</strong></td> <?php } ?>
						<?php if($number_of_periods >= 5) { ?>
                        <td width="10%"align="center"><strong>5<?php print "<br>".$peried_5s." TO <br>".$peried_5e; ?></strong></td>
							<?php } ?>
						<?php if($break_position==5) { ?><td width="13%" rowspan="7"align="center"><strong>B1</strong></td> <?php } ?>
						<?php if($lunch_position==5) { ?><td width="13%" rowspan="7"align="center"><strong>B2</strong></td> <?php } ?>
								<?php if($number_of_periods >= 6) { ?>
						    <td width="9%"align="center"><strong>6<?php print "<br>".$peried_6s." TO <br>".$peried_6e; ?></strong></td>
							<?php } ?>
							<?php if($break_position==6) { ?><td width="13%" rowspan="7"align="center"><strong>B1</strong></td> <?php } ?>
						    <?php if($lunch_position==6) { ?><td width="13%" rowspan="7"align="center"><strong>B2</strong></td> <?php } ?>
								<?php if($number_of_periods >= 7) { ?>
							    <td width="9%"align="center"><strong>7<?php print "<br>".$peried_7s." TO <br>".$peried_7e; ?></strong></td>
								<?php } ?>
								<?php if($break_position==7) { ?><td width="13%" rowspan="7"align="center"><strong>B1</strong></td> <?php } ?>
						        <?php if($lunch_position==7) { ?><td width="13%" rowspan="7"align="center"><strong>B2</strong></td> <?php } ?>
						
									<?php if($number_of_periods >= 8) { ?>
								    <td width="10%"align="center"><strong>8<?php print "<br>".$peried_8s." TO <br>".$peried_8e; ?></strong></td>
									<?php } ?>
									
									<?php if($break_position==8) { ?><td width="13%" rowspan="7"align="center"><strong>B1</strong></td> <?php } ?>
						<?php if($lunch_position==8) { ?><td width="13%" rowspan="7"align="center"><strong>B2</strong></td> <?php } ?>
						
									    <?php	//echo $number_of_periods=$timetabledetails[0]->es_endto; ?>
										
										<?php if($number_of_periods >= 9) { ?>
										<td width="9%"align="center"><strong>9<?php print "<br>".$peried_9s." TO <br>".$peried_9e; ?></strong></td>
										<?php } ?>
                      </tr>
					  
                  <tr >
                    <td height="42" class="bgcolor_02" >&nbsp;&nbsp;<strong>Mon</strong></td>
                    <td align="center" class="narmal"><?php  echo $subject_array[$view_timetable['es_m1']]."<br>".$staff_arr[$view_timetable['es_m1f']];?></td>
                    <td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_m2']]."<br>".$staff_arr[$view_timetable['es_m2f']]; ?></td>
                    <td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_m3']]."<br>".$staff_arr[$view_timetable['es_m3f']]; ?></td>
                    <?php if($number_of_periods >= 4) { ?><td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_m4']]."<br>".$staff_arr[$view_timetable['es_m4f']]; ?></td><?php } ?>
                    <?php if($number_of_periods >= 5) { ?><td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_m5']]."<br>".$staff_arr[$view_timetable['es_m5f']]; ?></td><?php } ?>
                      
                     <?php if($number_of_periods >= 6) { ?><td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_m6']]."<br>".$staff_arr[$view_timetable['es_m6f']]; ?></td><?php } ?>
                     <?php if($number_of_periods >= 7) { ?><td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_m7']]."<br>".$staff_arr[$view_timetable['es_m7f']]; ?></td><?php } ?>
                    <?php if($number_of_periods >= 8) { ?> <td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_m8']]."<br>".$staff_arr[$view_timetable['es_m8f']]; ?></td><?php } ?>
                    <?php if($number_of_periods >= 9) { ?><td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_m9']]."<br>".$staff_arr[$view_timetable['es_m9f']]; ?></td><?php } ?>
                  </tr>
                  <tr>
                    <td height="42" class="bgcolor_02" >&nbsp;&nbsp;<strong>Tue</strong></td>
                    <td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_t1']]."<br>".$staff_arr[$view_timetable['es_t1f']]; ?></td>
                    <td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_t2']]."<br>".$staff_arr[$view_timetable['es_t2f']]; ?></td>
                    <td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_t3']]."<br>".$staff_arr[$view_timetable['es_t3f']]; ?></td>
                    <?php if($number_of_periods >= 4) { ?><td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_t4']]."<br>".$staff_arr[$view_timetable['es_t4f']]; ?></td><?php } ?>
                    <?php if($number_of_periods >= 5) { ?><td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_t5']]."<br>".$staff_arr[$view_timetable['es_t5f']]; ?></td><?php } ?>
                       
                    <?php if($number_of_periods >= 6) { ?> <td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_t6']]."<br>".$staff_arr[$view_timetable['es_t6f']]; ?></td><?php } ?>
                     <?php if($number_of_periods >= 7) { ?><td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_t7f']]."<br>".$staff_arr[$view_timetable['es_t7f']]; ?></td><?php } ?>
                    <?php if($number_of_periods >= 8) { ?><td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_t8']]."<br>".$staff_arr[$view_timetable['es_t8f']]; ?></td><?php } ?>
                    <?php if($number_of_periods >= 9) { ?><td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_t9']]."<br>".$staff_arr[$view_timetable['es_t9f']]; ?></td><?php } ?>
                  </tr>
                  <tr>
                    <td height="42" class="bgcolor_02" >&nbsp;&nbsp;<strong>Wed</strong></td>
                    <td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_w1']]."<br>".$staff_arr[$view_timetable['es_w1f']]; ?></td>
                    <td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_w2']]."<br>".$staff_arr[$view_timetable['es_w2f']]; ?></td>
                         
                    <td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_w3']]."<br>".$staff_arr[$view_timetable['es_w3f']]; ?></td>
                    <?php if($number_of_periods >= 4) { ?><td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_w4']]."<br>".$staff_arr[$view_timetable['es_w4f']]; ?></td><?php } ?>
                    <?php if($number_of_periods >= 5) { ?><td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_w5']]."<br>".$staff_arr[$view_timetable['es_w5f']]; ?></td><?php } ?>
                       
                   <?php if($number_of_periods >= 6) { ?> <td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_w6']]."<br>".$staff_arr[$view_timetable['es_w6f']]; ?></td><?php } ?>
                     <?php if($number_of_periods >= 7) { ?><td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_w7']]."<br>".$staff_arr[$view_timetable['es_w7f']]; ?></td><?php } ?>
                  <?php if($number_of_periods >= 8) { ?>  <td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_w8']]."<br>".$staff_arr[$view_timetable['es_w8f']]; ?></td><?php } ?>
                    <?php if($number_of_periods >= 9) { ?><td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_w9']]."<br>".$staff_arr[$view_timetable['es_w9f']]; ?></td><?php } ?>
                  </tr>
                  <tr>
                       <td height="42" class="bgcolor_02" >&nbsp;&nbsp;<strong>Thurs</strong></td>
                    <td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_th1']]."<br>".$staff_arr[$view_timetable['es_th1f']]; ?></td>
                    <td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_th2']]."<br>".$staff_arr[$view_timetable['es_th2f']]; ?></td>
                    
                    <td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_th3']]."<br>".$staff_arr[$view_timetable['es_th3f']]; ?></td>
                    <?php if($number_of_periods >= 4) { ?><td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_th4']]."<br>".$staff_arr[$view_timetable['es_th4f']]; ?></td><?php } ?>
                    <?php if($number_of_periods >= 5) { ?><td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_th5']]."<br>".$staff_arr[$view_timetable['es_th5f']]; ?></td><?php } ?>
                       
                    <?php if($number_of_periods >= 6) { ?> <td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_th6']]."<br>".$staff_arr[$view_timetable['es_th6f']]; ?></td><?php } ?>
                     <?php if($number_of_periods >= 7) { ?><td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_th7']]."<br>".$staff_arr[$view_timetable['es_th7f']]; ?></td><?php } ?>
                    <?php if($number_of_periods >= 8) { ?><td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_th8']]."<br>".$staff_arr[$view_timetable['es_th8f']]; ?></td> <?php } ?>  
                    <?php if($number_of_periods >= 9) { ?><td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_th9']]."<br>".$staff_arr[$view_timetable['es_th9f']]; ?></td><?php } ?>
                  </tr>
                  <tr>
                      <td height="42" class="bgcolor_02" >&nbsp;&nbsp;<strong>Fri</strong></td>
                    <td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_f1']]."<br>".$staff_arr[$view_timetable['es_f1f']]; ?></td>
                    <td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_f2']]."<br>".$staff_arr[$view_timetable['es_f2f']]; ?></td>
                    
                    <td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_f3']]."<br>".$staff_arr[$view_timetable['es_f3f']]; ?></td>
                    <?php if($number_of_periods >= 4) { ?><td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_f4']]."<br>".$staff_arr[$view_timetable['es_f4f']]; ?></td><?php } ?>
                    <?php if($number_of_periods >= 5) { ?><td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_f5']]."<br>".$staff_arr[$view_timetable['es_f5f']]; ?></td><?php } ?>
                      
                    <?php if($number_of_periods >= 6) { ?><td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_f6']]."<br>".$staff_arr[$view_timetable['es_f6f']]; ?></td><?php } ?>
                     <?php if($number_of_periods >= 7) { ?><td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_f7']]."<br>".$staff_arr[$view_timetable['es_f7f']]; ?></td><?php } ?>
                   <?php if($number_of_periods >= 8) { ?> <td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_f8']]."<br>".$staff_arr[$view_timetable['es_f8f']]; ?></td> <?php } ?>
                    <?php if($number_of_periods >= 9) { ?><td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_f9']]."<br>".$staff_arr[$view_timetable['es_f9f']]; ?></td><?php } ?>
                  </tr>
                  <tr>
                    <td height="42" class="bgcolor_02" >&nbsp;&nbsp;<strong>Sat</strong></td>
                    <td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_s1']]."<br>".$staff_arr[$view_timetable['es_s1f']]; ?></td>
                    <td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_s2']]."<br>".$staff_arr[$view_timetable['es_s2f']]; ?></td>
                    <td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_s3']]."<br>".$staff_arr[$view_timetable['es_s3f']]; ?></td>
                    <?php if($number_of_periods >= 4) { ?><td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_s4']]."<br>".$staff_arr[$view_timetable['es_s4f']]; ?></td><?php } ?>
                    <?php if($number_of_periods >= 5) { ?><td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_s5']]."<br>".$staff_arr[$view_timetable['es_s5f']]; ?></td><?php } ?>
                       
                    <?php if($number_of_periods >= 6) { ?> <td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_s6']]."<br>".$staff_arr[$view_timetable['es_s6f']]; ?></td><?php } ?>
                     <?php if($number_of_periods >= 7) { ?><td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_s7']]."<br>".$staff_arr[$view_timetable['es_s7f']]; ?></td><?php } ?>
                     <?php if($number_of_periods >= 8) { ?> <td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_s8']]."<br>".$staff_arr[$view_timetable['es_s8f']]; ?></td> <?php } ?>
                    <?php if($number_of_periods >= 9) { ?><td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_s9']]."<br>".$staff_arr[$view_timetable['es_s9f']]; ?></td><?php } ?>
                    <?php }?>
        </tr>
                    </table></td>
                  </tr>
		
				  
                 
                </table>
                    </td>
                  </tr>
			
                  <tr>
                    <td colspan="4" align="center" >
		 
</td>
                  </tr>
				
                </table></td>
                <td width="4" class="bgcolor_02"></td>
              </tr>
  	<tr>
		<td height="1" colspan="3" class="bgcolor_02"></td>
	</tr>
</table>
<p align="center"><input type="button" id="printbutton" value="&nbsp;Print" class="bgcolor_02" style="height:20px; cursor:pointer;" onclick="return printing();"/></p>
</form>
<?php }

if($action == 'viewtimetable1' || $action == 'viewtimetableprint_time_table'  ) { ?>

<form action="" method="post" name="edittimetable">
<table border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
	 </tr>
	
    <tr>
                <td width="1" class="bgcolor_02"></td>
                <td width="956" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td colspan="4" align="left" valign="top">&nbsp;</td>
                  </tr>
                  <tr>
                   
					  
                
                    <td width="50%" align="left" valign="top" class="narmal"></td>
					
                    <td width="15%" align="left" class="narmal" valign="right"> <?php if(isset($es_class) && $es_class!='')
{ ?> <a href="?pid=54&action=edittimetable" ></a> <?php }?></td>
                  </tr> 
			
				  
                  <tr>
                    <td colspan="5" align="left" valign="top">
					
					
					<table width="100%" border="0" cellspacing="4" cellpadding="0">
                  <tr>
                    <td align="left" valign="top"><table width="100%" border="0" cellspacing="5" cellpadding="0">
                      <tr>
                        
						
                      </tr>
                      
                    </table></td>
                  </tr>
				  
 <?php  ?>
                  <tr>
                    <td height="25" align="left" valign="middle">
					
					<?php	$school_start_time=$view_timetable['es_startfrom']; ?>
					<?php	$number_of_periods=$view_timetable['es_endto']; ?>
					<?php	$break=$view_timetable['es_breakfrom']; ?>
					<?php	$break_position=$view_timetable['es_breakto']; ?>
					<?php	$lunch=$view_timetable['es_lunchfrom']; ?>

					<?php	$lunch_position=$view_timetable['es_lunchto']; ?>
					<?php	$period_duration=$view_timetable['es_duration']; ?>
					
					
					<?php
				  $dd=date("d");
				  $mm=date("m");
				  $yy=date("Y");
				  
				  $peried_1 = explode(":", $school_start_time);
                  $h = $peried_1[0];
                  $m = $peried_1[1];				  
				  $peried_1e=date("H:i", mktime($h,$m+$period_duration,0,$dd,$mm,$yy));
				  
				  if($break_position==1)
				    {
					$peried_2 = explode(":", $peried_1e);
                    $h = $peried_2[0];
                    $m = $peried_2[1];	
					$peried_2s =date("H:i", mktime($h,$m+$break,0,$dd,$mm,$yy));		  
				    $peried_2e = date("H:i", mktime($h,$m+$break+$period_duration,0,$dd,$mm,$yy));					
					}
				  else
				    {					
					$peried_2 = explode(":", $peried_1e);
                    $h = $peried_2[0];
                    $m = $peried_2[1];
					$peried_2s =	$peried_1e;			  
				    $peried_2e=date("H:i", mktime($h,$m+$period_duration,0,$dd,$mm,$yy));										
					}
					
				  if($break_position==2 || $lunch_position==2)
				    {
					$peried_3 = explode(":", $peried_2e);
                    $h = $peried_3[0];
                    $m = $peried_3[1];
					if($break_position==2) {$b=$break;}
					if($lunch_position==2) {$b=$lunch;}
					$peried_3s =date("H:i", mktime($h,$m+$b,0,$dd,$mm,$yy));		  
				    $peried_3e = date("H:i", mktime($h,$m+$b+$period_duration,0,$dd,$mm,$yy));					
					}
				  else
				    {					
					$peried_3 = explode(":", $peried_2e);
                    $h = $peried_3[0];
                    $m = $peried_3[1];
					$peried_3s =	$peried_2e;			  
				    $peried_3e=date("H:i", mktime($h,$m+$period_duration,0,$dd,$mm,$yy));						
					}
					
				  if($break_position==3 || $lunch_position==3)
				    {
					$peried_4 = explode(":", $peried_3e);
                    $h = $peried_4[0];
                    $m = $peried_4[1];
					if($break_position==3) {$b=$break;}
					if($lunch_position==3) {$b=$lunch;}
					$peried_4s =date("H:i", mktime($h,$m+$b,0,$dd,$mm,$yy));		  
				    $peried_4e = date("H:i", mktime($h,$m+$b+$period_duration,0,$dd,$mm,$yy));					
					}
				  else
				    {					
					$peried_4 = explode(":", $peried_3e);
                    $h = $peried_4[0];
                    $m = $peried_4[1];
					$peried_4s =	$peried_3e;			  
				    $peried_4e=date("H:i", mktime($h,$m+$period_duration,0,$dd,$mm,$yy));						
					}
					
				  if($break_position==4 || $lunch_position==4)
				    {
					$peried_5 = explode(":", $peried_4e);
                    $h = $peried_5[0];
                    $m = $peried_5[1];
					if($break_position==4) {$b=$break;}
					if($lunch_position==4) {$b=$lunch;}
					$peried_5s =date("H:i", mktime($h,$m+$b,0,$dd,$mm,$yy));		  
				    $peried_5e = date("H:i", mktime($h,$m+$b+$period_duration,0,$dd,$mm,$yy));					
					}
				  else
				    {					
					$peried_5 = explode(":", $peried_4e);
                    $h = $peried_5[0];
                    $m = $peried_5[1];
					$peried_5s =	$peried_4e;			  
				    $peried_5e=date("H:i", mktime($h,$m+$period_duration,0,$dd,$mm,$yy));						
					}
					
				 if($break_position==5 || $lunch_position==5)
				    {
					$peried_6 = explode(":", $peried_5e);
                    $h = $peried_6[0];
                    $m = $peried_6[1];
					if($break_position==5) {$b=$break;}
					if($lunch_position==5) {$b=$lunch;}
					$peried_6s =date("H:i", mktime($h,$m+$b,0,$dd,$mm,$yy));		  
				    $peried_6e = date("H:i", mktime($h,$m+$b+$period_duration,0,$dd,$mm,$yy));					
					}
				  else
				    {					
					$peried_6 = explode(":", $peried_5e);
                    $h = $peried_6[0];
                    $m = $peried_6[1];
					$peried_6s =	$peried_5e;			  
				    $peried_6e=date("H:i", mktime($h,$m+$period_duration,0,$dd,$mm,$yy));						
					}
					
				  if($break_position==6 || $lunch_position==6)
				    {
					$peried_7 = explode(":", $peried_6e);
                    $h = $peried_7[0];
                    $m = $peried_7[1];
					if($break_position==6) {$b=$break;}
					if($lunch_position==6) {$b=$lunch;}
					$peried_7s =date("H:i", mktime($h,$m+$b,0,$dd,$mm,$yy));		  
				    $peried_7e = date("H:i", mktime($h,$m+$b+$period_duration,0,$dd,$mm,$yy));					
					}
				  else
				    {					
					$peried_7 = explode(":", $peried_6e);
                    $h = $peried_7[0];
                    $m = $peried_7[1];
					$peried_7s =	$peried_6e;			  
				    $peried_7e=date("H:i", mktime($h,$m+$period_duration,0,$dd,$mm,$yy));						
					}
					
				  if($break_position==7 || $lunch_position==7)
				    {
					$peried_8 = explode(":", $peried_7e);
                    $h = $peried_8[0];
                    $m = $peried_8[1];
					if($break_position==7) {$b=$break;}
					if($lunch_position==7) {$b=$lunch;}
					$peried_8s =date("H:i", mktime($h,$m+$b,0,$dd,$mm,$yy));		  
				    $peried_8e = date("H:i", mktime($h,$m+$b+$period_duration,0,$dd,$mm,$yy));					
					}
				  else
				    {					
					$peried_8 = explode(":", $peried_7e);
                    $h = $peried_8[0];
                    $m = $peried_8[1];
					$peried_8s =	$peried_7e;			  
				    $peried_8e=date("H:i", mktime($h,$m+$period_duration,0,$dd,$mm,$yy));						
					}
					
				  if($break_position==8 || $lunch_position==8)
				    {
					$peried_9 = explode(":", $peried_8e);
                    $h = $peried_9[0];
                    $m = $peried_9[1];
					if($break_position==8) {$b=$break;}
					if($lunch_position==8) {$b=$lunch;}
					$peried_9s =date("H:i", mktime($h,$m+$b,0,$dd,$mm,$yy));		  
				    $peried_9e = date("H:i", mktime($h,$m+$b+$period_duration,0,$dd,$mm,$yy));					
					}
				  else
				    {					
					$peried_9 = explode(":", $peried_8e);
                    $h = $peried_9[0];
                    $m = $peried_9[1];
					$peried_9s =	$peried_8e;			  
				    $peried_9e=date("H:i", mktime($h,$m+$period_duration,0,$dd,$mm,$yy));						
					}
					
				  ?>
				  <table width="100%" height="300" border="1" cellpadding="0" cellspacing="0">
                      <tr  class="bgcolor_02">
                        <td width="6%" align="center"><?php $ttimage = str_replace("css", "", $_SESSION['eschools']['user_theme']);?><img src="images/tt_<?php echo $ttimage;?>jpg" border="0"></td>
                        <td width="8%" height="23" align="center"><strong>1<?php 
						$school_start_time_1=explode(":",$school_start_time); 
						print "<br/>".$school_start_time_1['0']." : ".$school_start_time_1['1'];
						echo " TO <br> ".$peried_1e;
						?>
						 </strong></td>
						 
						 <?php if($break_position==1) { ?><td width="13%" rowspan="7"align="center"><strong>B1</strong></td> <?php } ?>
						<?php if($lunch_position==1) { ?><td width="13%" rowspan="7"align="center"><strong>B2</strong></td> <?php } ?>
						
                        <td width="10%"align="center"><strong>2<?php print "<br>".$peried_2s." TO <br>".$peried_2e; ?></strong></td>
						
						<?php if($break_position==2) { ?><td width="13%" rowspan="7"align="center"><strong>B1</strong></td> <?php } ?>
						<?php if($lunch_position==2) { ?><td width="13%" rowspan="7"align="center"><strong>B2</strong></td> <?php } ?>
						  
                          <td width="8%" align="center"><strong>3<?php print "<br>".$peried_3s." TO <br>".$peried_3e; ?></strong></td>
						  
						  <?php if($break_position==3) { ?><td width="13%" rowspan="7"align="center"><strong>B1</strong></td> <?php } ?>
						<?php if($lunch_position==3) { ?><td width="13%" rowspan="7"align="center"><strong>B2</strong></td> <?php } ?>
						<?php if($number_of_periods >= 4) { ?>
                        <td width="9%" align="center"><strong>4<?php print "<br>".$peried_4s." TO <br>".$peried_4e; ?></strong></td>
							<?php } ?>
						<?php if($break_position==4) { ?><td width="13%" rowspan="7"align="center"><strong>B1</strong></td> <?php } ?>
						<?php if($lunch_position==4) { ?><td width="13%" rowspan="7"align="center"><strong>B2</strong></td> <?php } ?>
						<?php if($number_of_periods >= 5) { ?>
                        <td width="10%"align="center"><strong>5<?php print "<br>".$peried_5s." TO <br>".$peried_5e; ?></strong></td>
							<?php } ?>
						<?php if($break_position==5) { ?><td width="13%" rowspan="7"align="center"><strong>B1</strong></td> <?php } ?>
						<?php if($lunch_position==5) { ?><td width="13%" rowspan="7"align="center"><strong>B2</strong></td> <?php } ?>
								<?php if($number_of_periods >= 6) { ?>
						    <td width="9%"align="center"><strong>6<?php print "<br>".$peried_6s." TO <br>".$peried_6e; ?></strong></td>
							<?php } ?>
							<?php if($break_position==6) { ?><td width="13%" rowspan="7"align="center"><strong>B1</strong></td> <?php } ?>
						    <?php if($lunch_position==6) { ?><td width="13%" rowspan="7"align="center"><strong>B2</strong></td> <?php } ?>
								<?php if($number_of_periods >= 7) { ?>
							    <td width="9%"align="center"><strong>7<?php print "<br>".$peried_7s." TO <br>".$peried_7e; ?></strong></td>
								<?php } ?>
								<?php if($break_position==7) { ?><td width="13%" rowspan="7"align="center"><strong>B1</strong></td> <?php } ?>
						        <?php if($lunch_position==7) { ?><td width="13%" rowspan="7"align="center"><strong>B2</strong></td> <?php } ?>
						
									<?php if($number_of_periods >= 8) { ?>
								    <td width="10%"align="center"><strong>8<?php print "<br>".$peried_8s." TO <br>".$peried_8e; ?></strong></td>
									<?php } ?>
									
									<?php if($break_position==8) { ?><td width="13%" rowspan="7"align="center"><strong>B1</strong></td> <?php } ?>
						<?php if($lunch_position==8) { ?><td width="13%" rowspan="7"align="center"><strong>B2</strong></td> <?php } ?>
						
									    <?php	//echo $number_of_periods=$timetabledetails[0]->es_endto; ?>
										
										<?php if($number_of_periods >= 9) { ?>
										<td width="9%"align="center"><strong>9<?php print "<br>".$peried_9s." TO <br>".$peried_9e; ?></strong></td>
										<?php } ?>
                      </tr>
					  
                  <tr >
                    <td height="42" class="bgcolor_02" >&nbsp;&nbsp;<strong>Mon</strong></td>
                    <td align="center" class="narmal"><?php  echo $subject_array[$view_timetable['es_m1']]."<br>".$staff_arr[$view_timetable['es_m1f']];?></td>
                    <td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_m2']]."<br>".$staff_arr[$view_timetable['es_m2f']]; ?></td>
                    <td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_m3']]."<br>".$staff_arr[$view_timetable['es_m3f']]; ?></td>
                    <?php if($number_of_periods >= 4) { ?><td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_m4']]."<br>".$staff_arr[$view_timetable['es_m4f']]; ?></td><?php } ?>
                    <?php if($number_of_periods >= 5) { ?><td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_m5']]."<br>".$staff_arr[$view_timetable['es_m5f']]; ?></td><?php } ?>
                      
                     <?php if($number_of_periods >= 6) { ?><td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_m6']]."<br>".$staff_arr[$view_timetable['es_m6f']]; ?></td><?php } ?>
                     <?php if($number_of_periods >= 7) { ?><td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_m7']]."<br>".$staff_arr[$view_timetable['es_m7f']]; ?></td><?php } ?>
                    <?php if($number_of_periods >= 8) { ?> <td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_m8']]."<br>".$staff_arr[$view_timetable['es_m8f']]; ?></td><?php } ?>
                    <?php if($number_of_periods >= 9) { ?><td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_m9']]."<br>".$staff_arr[$view_timetable['es_m9f']]; ?></td><?php } ?>
                  </tr>
                  <tr>
                    <td height="42" class="bgcolor_02" >&nbsp;&nbsp;<strong>Tue</strong></td>
                    <td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_t1']]."<br>".$staff_arr[$view_timetable['es_t1f']]; ?></td>
                    <td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_t2']]."<br>".$staff_arr[$view_timetable['es_t2f']]; ?></td>
                    <td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_t3']]."<br>".$staff_arr[$view_timetable['es_t3f']]; ?></td>
                    <?php if($number_of_periods >= 4) { ?><td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_t4']]."<br>".$staff_arr[$view_timetable['es_t4f']]; ?></td><?php } ?>
                    <?php if($number_of_periods >= 5) { ?><td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_t5']]."<br>".$staff_arr[$view_timetable['es_t5f']]; ?></td><?php } ?>
                       
                    <?php if($number_of_periods >= 6) { ?> <td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_t6']]."<br>".$staff_arr[$view_timetable['es_t6f']]; ?></td><?php } ?>
                     <?php if($number_of_periods >= 7) { ?><td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_t7f']]."<br>".$staff_arr[$view_timetable['es_t7f']]; ?></td><?php } ?>
                    <?php if($number_of_periods >= 8) { ?><td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_t8']]."<br>".$staff_arr[$view_timetable['es_t8f']]; ?></td><?php } ?>
                    <?php if($number_of_periods >= 9) { ?><td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_t9']]."<br>".$staff_arr[$view_timetable['es_t9f']]; ?></td><?php } ?>
                  </tr>
                  <tr>
                    <td height="42" class="bgcolor_02" >&nbsp;&nbsp;<strong>Wed</strong></td>
                    <td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_w1']]."<br>".$staff_arr[$view_timetable['es_w1f']]; ?></td>
                    <td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_w2']]."<br>".$staff_arr[$view_timetable['es_w2f']]; ?></td>
                         
                    <td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_w3']]."<br>".$staff_arr[$view_timetable['es_w3f']]; ?></td>
                    <?php if($number_of_periods >= 4) { ?><td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_w4']]."<br>".$staff_arr[$view_timetable['es_w4f']]; ?></td><?php } ?>
                    <?php if($number_of_periods >= 5) { ?><td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_w5']]."<br>".$staff_arr[$view_timetable['es_w5f']]; ?></td><?php } ?>
                       
                   <?php if($number_of_periods >= 6) { ?> <td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_w6']]."<br>".$staff_arr[$view_timetable['es_w6f']]; ?></td><?php } ?>
                     <?php if($number_of_periods >= 7) { ?><td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_w7']]."<br>".$staff_arr[$view_timetable['es_w7f']]; ?></td><?php } ?>
                  <?php if($number_of_periods >= 8) { ?>  <td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_w8']]."<br>".$staff_arr[$view_timetable['es_w8f']]; ?></td><?php } ?>
                    <?php if($number_of_periods >= 9) { ?><td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_w9']]."<br>".$staff_arr[$view_timetable['es_w9f']]; ?></td><?php } ?>
                  </tr>
                  <tr>
                       <td height="42" class="bgcolor_02" >&nbsp;&nbsp;<strong>Thurs</strong></td>
                    <td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_th1']]."<br>".$staff_arr[$view_timetable['es_th1f']]; ?></td>
                    <td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_th2']]."<br>".$staff_arr[$view_timetable['es_th2f']]; ?></td>
                    
                    <td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_th3']]."<br>".$staff_arr[$view_timetable['es_th3f']]; ?></td>
                    <?php if($number_of_periods >= 4) { ?><td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_th4']]."<br>".$staff_arr[$view_timetable['es_th4f']]; ?></td><?php } ?>
                    <?php if($number_of_periods >= 5) { ?><td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_th5']]."<br>".$staff_arr[$view_timetable['es_th5f']]; ?></td><?php } ?>
                       
                    <?php if($number_of_periods >= 6) { ?> <td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_th6']]."<br>".$staff_arr[$view_timetable['es_th6f']]; ?></td><?php } ?>
                     <?php if($number_of_periods >= 7) { ?><td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_th7']]."<br>".$staff_arr[$view_timetable['es_th7f']]; ?></td><?php } ?>
                    <?php if($number_of_periods >= 8) { ?><td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_th8']]."<br>".$staff_arr[$view_timetable['es_th8f']]; ?></td> <?php } ?>  
                    <?php if($number_of_periods >= 9) { ?><td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_th9']]."<br>".$staff_arr[$view_timetable['es_th9f']]; ?></td><?php } ?>
                  </tr>
                  <tr>
                      <td height="42" class="bgcolor_02" >&nbsp;&nbsp;<strong>Fri</strong></td>
                    <td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_f1']]."<br>".$staff_arr[$view_timetable['es_f1f']]; ?></td>
                    <td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_f2']]."<br>".$staff_arr[$view_timetable['es_f2f']]; ?></td>
                    
                    <td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_f3']]."<br>".$staff_arr[$view_timetable['es_f3f']]; ?></td>
                    <?php if($number_of_periods >= 4) { ?><td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_f4']]."<br>".$staff_arr[$view_timetable['es_f4f']]; ?></td><?php } ?>
                    <?php if($number_of_periods >= 5) { ?><td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_f5']]."<br>".$staff_arr[$view_timetable['es_f5f']]; ?></td><?php } ?>
                      
                    <?php if($number_of_periods >= 6) { ?><td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_f6']]."<br>".$staff_arr[$view_timetable['es_f6f']]; ?></td><?php } ?>
                     <?php if($number_of_periods >= 7) { ?><td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_f7']]."<br>".$staff_arr[$view_timetable['es_f7f']]; ?></td><?php } ?>
                   <?php if($number_of_periods >= 8) { ?> <td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_f8']]."<br>".$staff_arr[$view_timetable['es_f8f']]; ?></td> <?php } ?>
                    <?php if($number_of_periods >= 9) { ?><td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_f9']]."<br>".$staff_arr[$view_timetable['es_f9f']]; ?></td><?php } ?>
                  </tr>
                  <tr>
                    <td height="42" class="bgcolor_02" >&nbsp;&nbsp;<strong>Sat</strong></td>
                    <td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_s1']]."<br>".$staff_arr[$view_timetable['es_s1f']]; ?></td>
                    <td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_s2']]."<br>".$staff_arr[$view_timetable['es_s2f']]; ?></td>
                    <td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_s3']]."<br>".$staff_arr[$view_timetable['es_s3f']]; ?></td>
                    <?php if($number_of_periods >= 4) { ?><td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_s4']]."<br>".$staff_arr[$view_timetable['es_s4f']]; ?></td><?php } ?>
                    <?php if($number_of_periods >= 5) { ?><td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_s5']]."<br>".$staff_arr[$view_timetable['es_s5f']]; ?></td><?php } ?>
                       
                    <?php if($number_of_periods >= 6) { ?> <td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_s6']]."<br>".$staff_arr[$view_timetable['es_s6f']]; ?></td><?php } ?>
                     <?php if($number_of_periods >= 7) { ?><td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_s7']]."<br>".$staff_arr[$view_timetable['es_s7f']]; ?></td><?php } ?>
                     <?php if($number_of_periods >= 8) { ?> <td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_s8']]."<br>".$staff_arr[$view_timetable['es_s8f']]; ?></td> <?php } ?>
                    <?php if($number_of_periods >= 9) { ?><td align="center" class="narmal"><?php echo $subject_array[$view_timetable['es_s9']]."<br>".$staff_arr[$view_timetable['es_s9f']]; ?></td><?php } ?>
                    <?php ?>
        </tr>
                    </table></td>
                  </tr>
		
				  
                 
                </table>
                    </td>
                  </tr>
			
                  <tr>
                    <td colspan="4" align="center" >
		 
</td>
                  </tr>
				
                </table></td>
                <td width="4" class="bgcolor_02"></td>
              </tr>
  	<tr>
		<td height="1" colspan="3" class="bgcolor_02"></td>
	</tr>
</table>
<?php if($action!='viewtimetableprint_time_table'){?>
		<tr><td colspan='9' align="center" style='padding:3px;' >
		<input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=52&action=viewtimetableprint_time_table',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  />
		</td> </tr>
		<?php } ?>
		
		
		
</form>
<?php }

?>
	