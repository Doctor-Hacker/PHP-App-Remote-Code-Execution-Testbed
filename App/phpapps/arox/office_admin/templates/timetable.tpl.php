<?php 
/*
*Start of Time Table Web Page
*/	
if ($action == 'timetable') { ?>
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
					<td align="left" height="20">&nbsp;Class Timetable</td>
				  <td align="center" >Action</td>
				</tr>
<?php
	
	$classlist = getallClasses();
	if(count($classlist)>=1){
	foreach($classlist as $indclass) {
	$count_999 = sqlnumber("SELECT * FROM `es_timetable` WHERE `es_class` = '".$indclass['es_classesid']."'");
	if ($count_999==0){  
		mysql_query("INSERT INTO `es_timetable` (`es_class`) VALUES ('".$indclass['es_classesid']."')");	
	}	
?>
			<tr class="bgclor_02">
				<td align="left">&nbsp;<?php echo $indclass['es_classname']; ?></td>
			  <td align="center" style="padding:20">
<script type="text/JavaScript">
	function timetable<?php print $indclass['es_classesid']; ?>add(){		
		MyWin = "?pid=31&action=edittimetable&es_class=<?php print $indclass['es_classesid']; ?>"; 
		winpopup = window.open(MyWin,'popup<?php print $indclass['es_classesid']; ?>', 'height=701,width=1100,menubar=no,scrollbars=yes,status=no,toolbar=no,sereenX=100,screenY=0,left=100,top=0,class=text');	
		winpopup.moveTo(111,25);
}
</script>
<?php if (in_array("15_1", $admin_permissions)) {?>
						<a title="Edit" href="javascript:timetable<?php print $indclass['es_classesid']; ?>add();"><img src="images/b_edit.png" width="16" height="16" border="0" /></a>&nbsp;&nbsp;&nbsp;
	   <?php }else{ echo "-"; }?>
<script type="text/JavaScript">
function timetable<?php print $indclass['es_classesid']; ?>view()
    {		
	MyWin="?pid=31&action=viewtimetable&es_class=<?php print $indclass['es_classesid']; ?>"; 
	winpopup=window.open(MyWin,'popup<?php print $indclass['es_classesid']; ?>','height=701,width=888,menubar=no,scrollbars=yes,status=no,toolbar=no,sereenX=100,screenY=0,left=100,top=0,class=text');	
	winpopup.moveTo(111,25);
	}
</script>	
<?php if (in_array("15_2", $admin_permissions)) {?>			
						<a title="View" href="javascript:timetable<?php print $indclass['es_classesid']; ?>view();"><img src="images/b_browse.png" width="16" height="16" border="0" /></a>
                        <?php }?>
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
 <?php //if(isset($emsg) && $emsg>0) { ?>
			   <tr><td height="3"></td></tr>
			  <tr>
				<td align="center" height="25" colspan="3" > <?php 
				
				if(is_array($errormessage) && count($errormessage)>=1){
				foreach($errormessage as $eacherrormessage){echo "<a class='success_message'>".$eacherrormessage."</a><br>";}
				}else{echo "<a class='success_message'>".$sucessmessage[$emsg].'</a>';}?></td>
			  </tr>
			  <?php //} ?>
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
				<tr><td colspan="4" align="left" valign="top">&nbsp;</td></tr>
                <tr>
					<td width="31%" align="left" valign="top" class="admin">&nbsp;Class   : <?php echo classname($es_class); ?></td>
					<td width="43%" align="center" valign="top" class="error_msg"><strong><?php if(count($error)){ echo "Faculty is already assigned";} //array_print($error); ?></strong></td>
                    <td width="7%" align="right" valign="top"><span class="error_msg">[<a href="?pid=31&action=edittimetable&es_class=<?php echo $es_class; ?>" class="error_msg" >Reset</a>]</span></td>
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
								<input type="text" name="es_startfrom" value="<?php	echo $school_start_time=$timetabledetails[0]->es_startfrom; ?>" />
												<br />(H : M : S) 
											</td>
										  <td width="20%" class="admin" align="left">Number of Periods</td>
										  <td width="23%" align="left" class="narmal"> <input type="text" name="es_endto" value="<?php	echo $number_of_periods=$timetabledetails[0]->es_endto; ?>" /></td>
									  </tr>
										<tr>
											<td height="30" align="left" class="admin"> Break ( 1 ) </td>
										  <td width="14%" colspan="-3" align="left" class="admin">Time Duration</td>
									  <td width="28%" align="left" class="narmal">
										<input type="text" name="es_breakfrom" value="<?php	echo $break=$timetabledetails[0]->es_breakfrom; ?>"/>Min
											</td>
										  <td width="20%" class="admin" align="left">Break after period</td>
										  <td width="23%" align="left"> <input type="text" name="es_breakto" value="<?php	echo $break_position=$timetabledetails[0]->es_breakto; ?>"/>
											</td>
									  </tr>
										<tr>
						<td align="left" class="admin">Break ( 2 ) </td>
						<td width="14%" colspan="-3" align="left" class="admin">Time Duration</td>
						<td width="28%" align="left" class="narmal">
					  <input type="text" name="es_lunchfrom" value="<?php	echo $lunch=$timetabledetails[0]->es_lunchfrom; ?>"/>Min 						</td>
						<td width="20%" class="admin" align="left">Break after period</td>
					  <td width="23%" align="left"> <input type="text" name="es_lunchto" value="<?php	echo $lunch_position=$timetabledetails[0]->es_lunchto; ?>"/></td>
					</tr>
					  <tr>
						<td colspan="2" align="left" class="admin">Each Period Duration </td>
						<td align="left" class="narmal"><input type="text" name="es_duration" value="<?php	echo $period_duration=$timetabledetails[0]->es_duration; ?>"/>Min </td>
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
					<table width="100%" height="262" border="1" cellpadding="0" cellspacing="0">
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
						
                        <td width="17%" align="center"><strong>4<?php print "<br>".$peried_4s." TO <br>".$peried_4e; ?> </strong></td>
						<?php if($break_position==4) { ?><td width="13%" rowspan="7"align="center"><strong>B1</strong></td> <?php } ?>
						<?php if($lunch_position==4) { ?><td width="13%" rowspan="7"align="center"><strong>B2</strong></td> <?php } ?>
						
                        <td width="14%"align="center"><strong>5<?php print "<br>".$peried_5s." TO <br>".$peried_5e; ?></strong></td>
						<?php if($break_position==5) { ?><td width="13%" rowspan="7"align="center"><strong>B1</strong></td> <?php } ?>
						<?php if($lunch_position==5) { ?><td width="13%" rowspan="7"align="center"><strong>B2</strong></td> <?php } ?>
						
						 
						<td width="14%"align="center"><strong>6<?php print "<br>".$peried_6s." TO <br>".$peried_6e; ?></strong></td>
						<?php if($break_position==6) { ?><td width="13%" rowspan="7"align="center"><strong>B1</strong></td> <?php } ?>
						<?php if($lunch_position==6) { ?><td width="13%" rowspan="7"align="center"><strong>B2</strong></td> <?php } ?>
						
						<td width="14%"align="center"><strong>7<?php print "<br>".$peried_7s." TO <br>".$peried_7e; ?></strong></td>
						<?php if($break_position==7) { ?><td width="13%" rowspan="7"align="center"><strong>B1</strong></td> <?php } ?>
						<?php if($lunch_position==7) { ?><td width="13%" rowspan="7"align="center"><strong>B2</strong></td> <?php } ?>
						
						<td width="14%"align="center"><strong>8<?php print "<br>".$peried_8s." TO <br>".$peried_8e; ?></strong></td>
						<?php if($break_position==8) { ?><td width="13%" rowspan="7"align="center"><strong>B1</strong></td> <?php } ?>
						<?php if($lunch_position==8) { ?><td width="13%" rowspan="7"align="center"><strong>B2</strong></td> <?php } ?>
						
						<td width="14%"align="center"><strong>9<?php print "<br>".$peried_9s." TO <br>".$peried_9e; ?></strong></td>
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
						
					 $class_sql="select S.es_subjectid,S.es_subjectname from es_classes C,es_timetablemaster TM,es_subject S where C.es_classesid=TM.es_class AND TM.es_subject=S.es_subjectid AND TM.es_class='".$es_class."'";
						$classlist = $db->getRows($class_sql);
						//array_print($classlist);
						
						//$classlist=gettingSubject($es_class);
						//echo "<pre>";
						//print_r($classlist);
						?>
						
						<select name="es_m1" style="width:101px;" <?php if(isset($error['es_m1'])){?>class="error_border"<?php }?>>
						<option value=""  > ---Subject --- </option>
                          <?php 
			              //$classlist=gettingSubject($class_id);
			              foreach($classlist as $indclass)
			              { ?>
                          <option <?php if( ($timetabledetails[0]->es_m1 == $indclass['es_subjectid'] && $es_m1=="") || $indclass['es_subjectid'] == $es_m1) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_subjectid'];?>"><?php echo $indclass['es_subjectname'];?></option>
                          <?php } ?>
                        </select>
						</td>
						<td align="center"><select name="es_m2" style="width:101px;" <?php if(isset($error['es_m2'])){?>class="error_border"<?php }?>>
						<option value=""  > ---Subject --- </option>
			<?php 
			//$classlist=gettingSubject($class_id);
			foreach($classlist as $indclass)
			{ ?>
			<option <?php if( ($timetabledetails[0]->es_m2 == $indclass['es_subjectid'] && $es_m2=="") || $indclass['es_subjectid'] == $es_m2) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_subjectid'];?>"><?php echo $indclass['es_subjectname'];?></option>
			<?php } ?>
			</select></td>
			<!--<td width="14%"align="center"><strong>B </strong></td> -->
                        <td align="center"><select name="es_m3" style="width:101px;" <?php if(isset($error['es_m3'])){?>class="error_border"<?php }?>>
						<option value=""  > ---Subject --- </option>
                          <?php 
			//$classlist=gettingSubject($class_id);
			foreach($classlist as $indclass)
			{ ?>
                          <option <?php if( ($timetabledetails[0]->es_m3 == $indclass['es_subjectid'] && $es_m3=="") || $indclass['es_subjectid'] == $es_m3) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_subjectid'];?>"><?php echo $indclass['es_subjectname'];?></option>
                          <?php } ?>
                        </select></td>
                        <td align="center"><select name="es_m4" style="width:101px;" <?php if(isset($error['es_m4'])){?>class="error_border"<?php }?>>
						<option value=""  > ---Subject --- </option>
                          <?php 
			//$classlist=gettingSubject($class_id);
			foreach($classlist as $indclass)
			{ ?>
                          <option <?php if( ($timetabledetails[0]->es_m4 == $indclass['es_subjectid'] && $es_m4=="") || $indclass['es_subjectid'] == $es_m4) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_subjectid'];?>"><?php echo $indclass['es_subjectname'];?></option>
                          <?php } ?>
                        </select></td>
                        <td align="center"><select name="es_m5" style="width:101px;" <?php if(isset($error['es_m5'])){?>class="error_border"<?php }?>>
						<option value=""  > ---Subject --- </option>
                          <?php 
			//$classlist=gettingSubject($class_id);
			foreach($classlist as $indclass)
			{ ?>
                          <option <?php if( ($timetabledetails[0]->es_m5 == $indclass['es_subjectid'] && $es_m5=="") || $indclass['es_subjectid'] == $es_m5) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_subjectid'];?>"><?php echo $indclass['es_subjectname'];?></option>
                          <?php } ?>
                        </select></td>
						<td align="center" valign="middle"><select name="es_m6" style="width:101px;" <?php if(isset($error['es_m6'])){?>class="error_border"<?php }?>>
						<option value=""  > ---Subject --- </option>
                          <?php 
			//$classlist=gettingSubject($class_id);
			foreach($classlist as $indclass)
			{ ?>
                          <option <?php if( ($timetabledetails[0]->es_m6 == $indclass['es_subjectid'] && $es_m6=="") || $indclass['es_subjectid'] == $es_m6) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_subjectid'];?>"><?php echo $indclass['es_subjectname'];?></option>
                          <?php } ?>
                        </select></td>
						              <td align="center" valign="middle"><select name="es_m7" style="width:101px;" <?php if(isset($error['es_m7'])){?>class="error_border"<?php }?>>
						<option value=""  > ---Subject --- </option>
                          <?php 
			//$classlist=gettingSubject($class_id);
			foreach($classlist as $indclass)
			{ ?>
                          <option <?php if( ($timetabledetails[0]->es_m7 == $indclass['es_subjectid'] && $es_m7=="") || $indclass['es_subjectid'] == $es_m7) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_subjectid'];?>"><?php echo $indclass['es_subjectname'];?></option>
                          <?php } ?>
                        </select></td>
						              <td align="center" valign="middle"><select name="es_m8" style="width:101px;" <?php if(isset($error['es_m8'])){?>class="error_border"<?php }?>>
						<option value=""  > ---Subject --- </option>
                                        <?php 
			//$classlist=gettingSubject($class_id);
			foreach($classlist as $indclass)
			{ ?>
                                        <option <?php if( ($timetabledetails[0]->es_m8 == $indclass['es_subjectid'] && $es_m8=="") || $indclass['es_subjectid'] == $es_m8) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_subjectid'];?>"><?php echo $indclass['es_subjectname'];?></option>
                                        <?php } ?>
                                      </select></td>
						              <td align="center" valign="middle"><select name="es_m9" style="width:101px;" <?php if(isset($error['es_m9'])){?>class="error_border"<?php }?>>
						<option value=""  > ---Subject --- </option>>
                                        <?php 
			//$classlist=gettingSubject($class_id);
			foreach($classlist as $indclass)
			{ ?>
                                        <option <?php if( ($timetabledetails[0]->es_m9 == $indclass['es_subjectid'] && $es_m9=="") || $indclass['es_subjectid'] == $es_m9) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_subjectid'];?>"><?php echo $indclass['es_subjectname'];?></option>
                                        <?php } ?>
                                      </select></td>
                      </tr>
                      <tr>
                        <td height="41" class="bgcolor_02"><strong>&nbsp;&nbsp;Tue</strong></td>
                        <td align="center"><select name="es_t1" style="width:101px;" <?php if(isset($error['es_t1'])){?>class="error_border"<?php }?>>
						<option value=""  > ---Subject --- </option>
                          <?php 
			//$classlist=gettingSubject($class_id);
			foreach($classlist as $indclass)
			{ ?>
                          <option <?php if( ($timetabledetails[0]->es_t1 == $indclass['es_subjectid'] && $es_t1=="") || $indclass['es_subjectid'] == $es_t1) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_subjectid'];?>"><?php echo $indclass['es_subjectname'];?></option>
                          <?php } ?>
                        </select></td>
                        <td align="center"><select name="es_t2" style="width:101px;" <?php if(isset($error['es_t2'])){?>class="error_border"<?php }?>>
						<option value=""  > ---Subject --- </option>
                          <?php 
			//$classlist=gettingSubject($class_id);
			foreach($classlist as $indclass)
			{ ?>
                          <option <?php if( ($timetabledetails[0]->es_t2 == $indclass['es_subjectid'] && $es_t2=="") || $indclass['es_subjectid'] == $es_t2) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_subjectid'];?>"><?php echo $indclass['es_subjectname'];?></option>
                          <?php } ?>
                        </select></td>
						<!--<td width="12%"align="center"><strong>R </strong></td> -->
                        <td align="center"><select name="es_t3" style="width:101px;" <?php if(isset($error['es_t3'])){?>class="error_border"<?php }?>>
						<option value=""  > ---Subject --- </option>
                          <?php 
			//$classlist=gettingSubject($class_id);
			foreach($classlist as $indclass)
			{ ?>
                          <option <?php if( ($timetabledetails[0]->es_t3 == $indclass['es_subjectid'] && $es_t3=="") || $indclass['es_subjectid'] == $es_t3) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_subjectid'];?>"><?php echo $indclass['es_subjectname'];?></option>
                          <?php } ?>
                        </select></td>
                        <td align="center"><select name="es_t4" style="width:101px;" <?php if(isset($error['es_t4'])){?>class="error_border"<?php }?>>
						<option value=""  > ---Subject --- </option>
                          <?php 
			//$classlist=gettingSubject($class_id);
			foreach($classlist as $indclass)
			{ ?>
                          <option <?php if( ($timetabledetails[0]->es_t4 == $indclass['es_subjectid'] && $es_t4=="") || $indclass['es_subjectid'] == $es_t4) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_subjectid'];?>"><?php echo $indclass['es_subjectname'];?></option>
                          <?php } ?>
                        </select></td>
                        <td align="center"><select name="es_t5" style="width:101px;" <?php if(isset($error['es_t5'])){?>class="error_border"<?php }?>>
						<option value=""  > ---Subject --- </option>
                          <?php 
			//$classlist=gettingSubject($class_id);
			foreach($classlist as $indclass)
			{ ?>
                          <option <?php if( ($timetabledetails[0]->es_t5 == $indclass['es_subjectid'] && $es_t5=="") || $indclass['es_subjectid'] == $es_t5) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_subjectid'];?>"><?php echo $indclass['es_subjectname'];?></option>
                          <?php } ?>
                        </select></td>
						<td align="center" valign="middle"><select name="es_t6" style="width:101px;" <?php if(isset($error['es_t6'])){?>class="error_border"<?php }?>>
						<option value=""  > ---Subject --- </option>
                          <?php 
			//$classlist=gettingSubject($class_id);
			foreach($classlist as $indclass)
			{ ?>
                          <option <?php if( ($timetabledetails[0]->es_t6 == $indclass['es_subjectid'] && $es_t6=="") || $indclass['es_subjectid'] == $es_t6) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_subjectid'];?>"><?php echo $indclass['es_subjectname'];?></option>
                          <?php } ?>
                        </select></td>
						<td align="center" valign="middle"><select name="es_t7" style="width:101px;" <?php if(isset($error['es_t7'])){?>class="error_border"<?php }?>>
						<option value=""  > ---Subject --- </option>
                          <?php 
			//$classlist=gettingSubject($class_id);
			foreach($classlist as $indclass)
			{ ?>
                          <option <?php if( ($timetabledetails[0]->es_t7 == $indclass['es_subjectid'] && $es_t7=="") || $indclass['es_subjectid'] == $es_t7) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_subjectid'];?>"><?php echo $indclass['es_subjectname'];?></option>
                          <?php } ?>
                        </select></td>
						              <td align="center" valign="middle"><select name="es_t8" style="width:101px;" <?php if(isset($error['es_t8'])){?>class="error_border"<?php }?>>
						<option value=""  > ---Subject --- </option>
                                        <?php 
			//$classlist=gettingSubject($class_id);
			foreach($classlist as $indclass)
			{ ?>
                                        <option <?php if( ($timetabledetails[0]->es_t8 == $indclass['es_subjectid'] && $es_t8=="") || $indclass['es_subjectid'] == $es_t8) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_subjectid'];?>"><?php echo $indclass['es_subjectname'];?></option>
                                        <?php } ?>
                                      </select></td>
						              <td align="center" valign="middle"><select name="es_t9" style="width:101px;" <?php if(isset($error['es_t9'])){?>class="error_border"<?php }?>>
						<option value=""  > ---Subject --- </option>
                                        <?php 
			//$classlist=gettingSubject($class_id);
			foreach($classlist as $indclass)
			{ ?>
                                        <option <?php if( ($timetabledetails[0]->es_t9 == $indclass['es_subjectid'] && $es_t9=="") || $indclass['es_subjectid'] == $es_t9) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_subjectid'];?>"><?php echo $indclass['es_subjectname'];?></option>
                                        <?php } ?>
                                      </select></td>
                      </tr>
                      <tr>
                        <td height="39" class="bgcolor_02"><strong>&nbsp;&nbsp;Wed</strong></td>
                        <td align="center"><select name="es_w1" style="width:101px;" <?php if(isset($error['es_w1'])){?>class="error_border"<?php }?>>
						<option value=""  > ---Subject --- </option>
                          <?php 
			//$classlist=gettingSubject($class_id);
			foreach($classlist as $indclass)
			{ ?>
                          <option <?php if( ($timetabledetails[0]->es_w1 == $indclass['es_subjectid'] && $es_w1=="") || $indclass['es_subjectid'] == $es_w1) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_subjectid'];?>"><?php echo $indclass['es_subjectname'];?></option>
                          <?php } ?>
                        </select></td>
                        <td align="center"><select name="es_w2" style="width:101px;" <?php if(isset($error['es_w2'])){?>class="error_border"<?php }?>>
						<option value=""  > ---Subject --- </option>
                          <?php 
			//$classlist=gettingSubject($class_id);
			foreach($classlist as $indclass)
			{ ?>
                          <option <?php if( ($timetabledetails[0]->es_w2 == $indclass['es_subjectid'] && $es_w2=="") || $indclass['es_subjectid'] == $es_w2) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_subjectid'];?>"><?php echo $indclass['es_subjectname'];?></option>
                          <?php } ?>
                        </select></td>
					<!--<td width="12%"align="center"><strong>E</strong></td> -->
                        <td align="center"><select name="es_w3" style="width:101px;" <?php if(isset($error['es_w3'])){?>class="error_border"<?php }?>>
						<option value=""> ---Subject --- </option>
                          <?php 
			//$classlist=gettingSubject($class_id);
			foreach($classlist as $indclass)
			{ ?>
                          <option <?php if( ($timetabledetails[0]->es_w3 == $indclass['es_subjectid'] && $es_w3=="") || $indclass['es_subjectid'] == $es_w3) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_subjectid'];?>"><?php echo $indclass['es_subjectname'];?></option>
                          <?php } ?>
                        </select></td>
                        <td align="center"><select name="es_w4" style="width:101px;" <?php if(isset($error['es_w4'])){?>class="error_border"<?php }?>>
						<option value=""  > ---Subject --- </option>
                          <?php 
			//$classlist=gettingSubject($class_id);
			foreach($classlist as $indclass)
			{ ?>
                          <option <?php if( ($timetabledetails[0]->es_w4 == $indclass['es_subjectid'] && $es_w4=="") || $indclass['es_subjectid'] == $es_w4) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_subjectid'];?>"><?php echo $indclass['es_subjectname'];?></option>
                          <?php } ?>
						</select></td>
                        <td align="center"><select name="es_w5" style="width:101px;" <?php if(isset($error['es_w5'])){?>class="error_border"<?php }?>>
						<option value=""  > ---Subject --- </option>
                          <?php 
			//$classlist=gettingSubject($class_id);
			foreach($classlist as $indclass)
			{ ?>
                          <option <?php if( ($timetabledetails[0]->es_w5 == $indclass['es_subjectid'] && $es_w5=="") || $indclass['es_subjectid'] == $es_w5) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_subjectid'];?>"><?php echo $indclass['es_subjectname'];?></option>
                          <?php } ?>
                        </select></td>
						<td align="center" valign="middle"><select name="es_w6" style="width:101px;" <?php if(isset($error['es_w6'])){?>class="error_border"<?php }?>>
						<option value=""  > ---Subject --- </option>
                          <?php 
			//$classlist=gettingSubject($class_id);
			foreach($classlist as $indclass)
			{ ?>
                          <option <?php if( ($timetabledetails[0]->es_w6 == $indclass['es_subjectid'] && $es_w6=="") || $indclass['es_subjectid'] == $es_w6) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_subjectid'];?>"><?php echo $indclass['es_subjectname'];?></option>
                          <?php } ?>
                        </select></td>
						<td align="center" valign="middle"><select name="es_w7" style="width:101px;" <?php if(isset($error['es_w7'])){?>class="error_border"<?php }?>>
						<option value=""  > ---Subject --- </option>
                          <?php 
			//$classlist=gettingSubject($class_id);
			foreach($classlist as $indclass)
			{ ?>
                          <option <?php if( ($timetabledetails[0]->es_w7 == $indclass['es_subjectid'] && $es_w7=="") || $indclass['es_subjectid'] == $es_w7) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_subjectid'];?>"><?php echo $indclass['es_subjectname'];?></option>
                          <?php } ?>
                        </select></td>
						              <td align="center" valign="middle"><select name="es_w8" style="width:101px;" <?php if(isset($error['es_w8'])){?>class="error_border"<?php }?>>
						<option value=""  > ---Subject --- </option>
                                        <?php 
			//$classlist=gettingSubject($class_id);
			foreach($classlist as $indclass)
			{ ?>
                                        <option <?php if( ($timetabledetails[0]->es_w8 == $indclass['es_subjectid'] && $es_w8=="") || $indclass['es_subjectid'] == $es_w8) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_subjectid'];?>"><?php echo $indclass['es_subjectname'];?></option>
                                        <?php } ?>
                                      </select></td>
						              <td align="center" valign="middle"><select name="es_w9" style="width:101px;" <?php if(isset($error['es_w9'])){?>class="error_border"<?php }?>>
						<option value=""  > ---Subject --- </option>
                                        <?php 
			//$classlist=gettingSubject($class_id);
			foreach($classlist as $indclass)
			{ ?>
                                        <option <?php if( ($timetabledetails[0]->es_w9 == $indclass['es_subjectid'] && $es_w9=="") || $indclass['es_subjectid'] == $es_w9) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_subjectid'];?>"><?php echo $indclass['es_subjectname'];?></option>
                                        <?php } ?>
                                      </select></td>
                      </tr>
                      <tr>
                        <td height="40" class="bgcolor_02"><strong>&nbsp;&nbsp;Thurs</strong></td>
                        <td align="center"><select name="es_th1" style="width:101px;" <?php if(isset($error['es_th1'])){?>class="error_border"<?php }?>>
						<option value=""  > ---Subject --- </option>
                          <?php 
			//$classlist=gettingSubject($class_id);
			foreach($classlist as $indclass)
			{ ?>
                          <option <?php if( ($timetabledetails[0]->es_th1 == $indclass['es_subjectid'] && $es_th1=="") || $indclass['es_subjectid'] == $es_th1) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_subjectid'];?>"><?php echo $indclass['es_subjectname'];?></option>
                          <?php } ?>
                        </select></td>
                        <td align="center"><select name="es_th2" style="width:101px;" <?php if(isset($error['es_th2'])){?>class="error_border"<?php }?>>
						<option value=""  > ---Subject --- </option>
                          <?php 
			//$classlist=gettingSubject($class_id);
			foreach($classlist as $indclass)
			{ ?>
                          <option <?php if( ($timetabledetails[0]->es_th2 == $indclass['es_subjectid'] && $es_th2=="") || $indclass['es_subjectid'] == $es_th2) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_subjectid'];?>"><?php echo $indclass['es_subjectname'];?></option>
                          <?php } ?>
                        </select></td>
						<!--<td width="12%"align="center"><strong>A</strong></td> -->
                        <td align="center"><select name="es_th3" style="width:101px;" <?php if(isset($error['es_th3'])){?>class="error_border"<?php }?>>
						<option value=""  > ---Subject --- </option>
                          <?php 
			//$classlist=gettingSubject($class_id);
			foreach($classlist as $indclass)
			{ ?>
                          <option <?php if( ($timetabledetails[0]->es_th3 == $indclass['es_subjectid'] && $es_th3=="") || $indclass['es_subjectid'] == $es_th3) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_subjectid'];?>"><?php echo $indclass['es_subjectname'];?></option>
                          <?php } ?>
                        </select></td>
                        <td align="center"><select name="es_th4" style="width:101px;" <?php if(isset($error['es_th4'])){?>class="error_border"<?php }?>>
						<option value=""  > ---Subject --- </option>
                          <?php 
			//$classlist=gettingSubject($class_id);
			foreach($classlist as $indclass)
			{ ?>
                          <option <?php if( ($timetabledetails[0]->es_th4 == $indclass['es_subjectid'] && $es_th4=="") || $indclass['es_subjectid'] == $es_th4) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_subjectid'];?>"><?php echo $indclass['es_subjectname'];?></option>
                          <?php } ?>
                        </select></td>

                        <td align="center"><select name="es_th5" style="width:101px;" <?php if(isset($error['es_th5'])){?>class="error_border"<?php }?>>
						<option value=""  > ---Subject --- </option>
                          <?php 
			//$classlist=gettingSubject($class_id);
			foreach($classlist as $indclass)
			{ ?>
                          <option <?php if( ($timetabledetails[0]->es_th5 == $indclass['es_subjectid'] && $es_th5=="") || $indclass['es_subjectid'] == $es_th5) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_subjectid'];?>"><?php echo $indclass['es_subjectname'];?></option>
                          <?php } ?>
                        </select></td>
						<td align="center" valign="middle"><select name="es_th6" style="width:101px;" <?php if(isset($error['es_th6'])){?>class="error_border"<?php }?>>
						<option value=""  > ---Subject --- </option>
                          <?php 
			//$classlist=gettingSubject($class_id);
			foreach($classlist as $indclass)
			{ ?>
                          <option <?php if( ($timetabledetails[0]->es_th6 == $indclass['es_subjectid'] && $es_th6=="") || $indclass['es_subjectid'] == $es_th6) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_subjectid'];?>"><?php echo $indclass['es_subjectname'];?></option>
                          <?php } ?>
                        </select></td>
						<td align="center" valign="middle"><select name="es_th7" style="width:101px;" <?php if(isset($error['es_th7'])){?>class="error_border"<?php }?>>
						<option value=""  > ---Subject --- </option>
                          <?php 
			//$classlist=gettingSubject($class_id);
			foreach($classlist as $indclass)
			{ ?>
                          <option <?php if( ($timetabledetails[0]->es_th7 == $indclass['es_subjectid'] && $es_th7=="") || $indclass['es_subjectid'] == $es_th7) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_subjectid'];?>"><?php echo $indclass['es_subjectname'];?></option>
                          <?php } ?>
                        </select></td>
						              <td align="center" valign="middle"><select name="es_th8" style="width:101px;" <?php if(isset($error['es_th8'])){?>class="error_border"<?php }?>>
						<option value=""  > ---Subject --- </option>
                                        <?php 
			//$classlist=gettingSubject($class_id);
			foreach($classlist as $indclass)
			{ ?>
                                        <option <?php if( ($timetabledetails[0]->es_th8 == $indclass['es_subjectid'] && $es_th8=="") || $indclass['es_subjectid'] == $es_th8) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_subjectid'];?>"><?php echo $indclass['es_subjectname'];?></option>
                                        <?php } ?>
                                      </select></td>
						              <td align="center" valign="middle"><select name="es_th9" style="width:101px;" <?php if(isset($error['es_th9'])){?>class="error_border"<?php }?>>
						<option value=""  > ---Subject --- </option>
                                        <?php 
			//$classlist=gettingSubject($class_id);
			foreach($classlist as $indclass)
			{ ?>
                                        <option <?php if( ($timetabledetails[0]->es_th9 == $indclass['es_subjectid'] && $es_th9=="") || $indclass['es_subjectid'] == $es_th9) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_subjectid'];?>"><?php echo $indclass['es_subjectname'];?></option>
                                        <?php } ?>
                                      </select></td>
                      </tr>
                      <tr>
                        <td class="bgcolor_02"><strong>&nbsp;&nbsp;Fri</strong></td>
                        <td align="center"><select name="es_f1" style="width:101px;" <?php if(isset($error['es_f1'])){?>class="error_border"<?php }?>>
						<option value=""  > ---Subject --- </option>
                          <?php 
			//$classlist=gettingSubject($class_id);
			foreach($classlist as $indclass)
			{ ?>
                          <option <?php if( ($timetabledetails[0]->es_f1 == $indclass['es_subjectid'] && $es_f1=="") || $indclass['es_subjectid'] == $es_f1) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_subjectid'];?>"><?php echo $indclass['es_subjectname'];?></option>
                          <?php } ?>
                        </select></td>
                        <td align="center"><select name="es_f2" style="width:101px;" <?php if(isset($error['es_f2'])){?>class="error_border"<?php }?>>
						<option value=""  > ---Subject --- </option>
                          <?php 
			//$classlist=gettingSubject($class_id);
			foreach($classlist as $indclass)
			{ ?>
                          <option <?php if( ($timetabledetails[0]->es_f2 == $indclass['es_subjectid'] && $es_f2=="") || $indclass['es_subjectid'] == $es_f2) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_subjectid'];?>"><?php echo $indclass['es_subjectname'];?></option>
                          <?php } ?>
                        </select></td>
						<!--<td width="12%"align="center"><strong>K</strong></td> -->
                        <td align="center"><select name="es_f3" style="width:101px;" <?php if(isset($error['es_f3'])){?>class="error_border"<?php }?>>
						<option value=""  > ---Subject --- </option>
                          <?php 
			//$classlist=gettingSubject($class_id);
			foreach($classlist as $indclass)
			{ ?>
                          <option <?php if( ($timetabledetails[0]->es_f3 == $indclass['es_subjectid'] && $es_f3=="") || $indclass['es_subjectid'] == $es_f3) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_subjectid'];?>"><?php echo $indclass['es_subjectname'];?></option>
                          <?php } ?>
                        </select></td>
                        <td align="center"><select name="es_f4" style="width:101px;" <?php if(isset($error['es_f4'])){?>class="error_border"<?php }?>>
						<option value=""  > ---Subject --- </option>
                          <?php 
			//$classlist=gettingSubject($class_id);
			foreach($classlist as $indclass)
			{ ?>
                          <option <?php if( ($timetabledetails[0]->es_f4 == $indclass['es_subjectid'] && $es_f4=="") || $indclass['es_subjectid'] == $es_f4) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_subjectid'];?>"><?php echo $indclass['es_subjectname'];?></option>
                          <?php } ?>
                        </select></td>
                        <td align="center"><select name="es_f5" style="width:101px;" <?php if(isset($error['es_f5'])){?>class="error_border"<?php }?>>
						<option value=""  > ---Subject --- </option>
                          <?php 
			//$classlist=gettingSubject($class_id);
			foreach($classlist as $indclass)
			{ ?>
                          <option <?php if( ($timetabledetails[0]->es_f5 == $indclass['es_subjectid'] && $es_f5=="") || $indclass['es_subjectid'] == $es_f5) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_subjectid'];?>"><?php echo $indclass['es_subjectname'];?></option>
                          <?php } ?>
                        </select></td>
						<td align="center" valign="middle"><select name="es_f6" style="width:101px;" <?php if(isset($error['es_f6'])){?>class="error_border"<?php }?>>
						<option value=""  > ---Subject --- </option>
                          <?php 
			//$classlist=gettingSubject($class_id);
			foreach($classlist as $indclass)
			{ ?>
                          <option <?php if( ($timetabledetails[0]->es_f6 == $indclass['es_subjectid'] && $es_f6=="") || $indclass['es_subjectid'] == $es_f6) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_subjectid'];?>"><?php echo $indclass['es_subjectname'];?></option>
                          <?php } ?>
                        </select></td>
						<td align="center" valign="middle"><select name="es_f7" style="width:101px;" <?php if(isset($error['es_f7'])){?>class="error_border"<?php }?>>
						<option value=""  > ---Subject --- </option>
                          <?php 
			//$classlist=gettingSubject($class_id);
			foreach($classlist as $indclass)
			{ ?>
                          <option <?php if( ($timetabledetails[0]->es_f7 == $indclass['es_subjectid'] && $es_f7=="") || $indclass['es_subjectid'] == $es_f7) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_subjectid'];?>"><?php echo $indclass['es_subjectname'];?></option>
                          <?php } ?>
                        </select></td>
						              <td align="center" valign="middle"><select name="es_f8" style="width:101px;" <?php if(isset($error['es_f8'])){?>class="error_border"<?php }?>>
						<option value=""  > ---Subject --- </option>
                                        <?php 
			//$classlist=gettingSubject($class_id);
			foreach($classlist as $indclass)
			{ ?>
                                        <option <?php if( ($timetabledetails[0]->es_f8 == $indclass['es_subjectid'] && $es_f8=="") || $indclass['es_subjectid'] == $es_f8) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_subjectid'];?>"><?php echo $indclass['es_subjectname'];?></option>
                                        <?php } ?>
                                      </select></td>
						              <td align="center" valign="middle"><select name="es_f9" style="width:101px;" <?php if(isset($error['es_f9'])){?>class="error_border"<?php }?>>
						<option value=""  > ---Subject --- </option>
                                        <?php 
			//$classlist=gettingSubject($class_id);
			foreach($classlist as $indclass)
			{ ?>
                                        <option <?php if( ($timetabledetails[0]->es_f9 == $indclass['es_subjectid'] && $es_f9=="") || $indclass['es_subjectid'] == $es_f9) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_subjectid'];?>"><?php echo $indclass['es_subjectname'];?></option>
                                        <?php } ?>
                                      </select></td>
                      </tr>
                      <tr>
                        <td height="43" class="bgcolor_02"><strong>&nbsp;&nbsp;Sat</strong></td>
                        <td align="center"><select name="es_s1" style="width:101px;" <?php if(isset($error['es_s1'])){?>class="error_border"<?php }?>>
						<option value=""  > ---Subject --- </option>
                          <?php 
			//$classlist=gettingSubject($class_id);
			foreach($classlist as $indclass)
			{ ?>
                          <option <?php if( ($timetabledetails[0]->es_s1 == $indclass['es_subjectid'] && $es_s1=="") || $indclass['es_subjectid'] == $es_s1) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_subjectid'];?>"><?php echo $indclass['es_subjectname'];?></option>
                          <?php } ?>
                        </select></td>
                        <td align="center"><select name="es_s2" style="width:101px;" <?php if(isset($error['es_s2'])){?>class="error_border"<?php }?>>
						<option value=""  > ---Subject --- </option>
                          <?php 
			//$classlist=gettingSubject($class_id);
			foreach($classlist as $indclass)
			{ ?>
                          <option <?php if( ($timetabledetails[0]->es_s2 == $indclass['es_subjectid'] && $es_s2=="") || $indclass['es_subjectid'] == $es_s2) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_subjectid'];?>"><?php echo $indclass['es_subjectname'];?></option>
                          <?php } ?>
                        </select></td>
						<!--<td width="12%"align="center"></td> -->
                        <td align="center"><select name="es_s3" style="width:101px;" <?php if(isset($error['es_s3'])){?>class="error_border"<?php }?>>
						<option value=""  > ---Subject --- </option>
                          <?php 
			//$classlist=gettingSubject($class_id);
			foreach($classlist as $indclass)
			{ ?>
                          <option <?php if( ($timetabledetails[0]->es_s3 == $indclass['es_subjectid'] && $es_s3=="") || $indclass['es_subjectid'] == $es_s3) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_subjectid'];?>"><?php echo $indclass['es_subjectname'];?></option>
                          <?php } ?>
                        </select></td>
                        <td align="center"><select name="es_s4" style="width:101px;" <?php if(isset($error['es_s4'])){?>class="error_border"<?php }?>>
						<option value=""  > ---Subject --- </option>
                          <?php 
			//$classlist=gettingSubject($class_id);
			foreach($classlist as $indclass)
			{ ?>
                          <option <?php if( ($timetabledetails[0]->es_s4 == $indclass['es_subjectid'] && $es_s4=="") || $indclass['es_subjectid'] == $es_s4) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_subjectid'];?>"><?php echo $indclass['es_subjectname'];?></option>
                          <?php } ?>
                        </select></td>
                        <td align="center"><select name="es_s5" style="width:101px;" <?php if(isset($error['es_s5'])){?>class="error_border"<?php }?>>
						<option value=""  > ---Subject --- </option>
                          <?php 
			//$classlist=gettingSubject($class_id);
			foreach($classlist as $indclass)
			{ ?>
                          <option <?php if( ($timetabledetails[0]->es_s5 == $indclass['es_subjectid'] && $es_s5=="") || $indclass['es_subjectid'] == $es_s5) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_subjectid'];?>"><?php echo $indclass['es_subjectname'];?></option>
                          <?php } ?>
                        </select></td>
						<td align="center" valign="middle"><select name="es_s6" id="es_s6" style="width:101px;" <?php if(isset($error['es_s6'])){?>class="error_border"<?php }?>>
                          <option value=""  > ---Subject --- </option>
                          <?php 
			//$classlist=gettingSubject($class_id);
			foreach($classlist as $indclass)
			{ ?>
                          <option <?php if( ($timetabledetails[0]->es_s6 == $indclass['es_subjectid'] && $es_s6=="") || $indclass['es_subjectid'] == $es_s6) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_subjectid'];?>"><?php echo $indclass['es_subjectname'];?></option>
                          <?php } ?>
                        </select></td>
                        <td align="center" valign="middle"><select name="es_s7" style="width:101px;" <?php if(isset($error['es_s7'])){?>class="error_border"<?php }?>>
						<option value=""  > ---Subject --- </option>
                          <?php 
			//$classlist=gettingSubject($class_id);
			foreach($classlist as $indclass)
			{ ?>
                          <option <?php if( ($timetabledetails[0]->es_s7 == $indclass['es_subjectid'] && $es_s7=="") || $indclass['es_subjectid'] == $es_s7) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_subjectid'];?>"><?php echo $indclass['es_subjectname'];?></option>
                          <?php } ?>
                        </select></td>
						              <td align="center" valign="middle"><select name="es_s8" style="width:101px;" <?php if(isset($error['es_s8'])){?>class="error_border"<?php }?>>
						<option value=""  > ---Subject --- </option>
                                        <?php 
			//$classlist=gettingSubject($class_id);
			foreach($classlist as $indclass)
			{ ?>
                                        <option <?php if( ($timetabledetails[0]->es_s8 == $indclass['es_subjectid'] && $es_s8=="") || $indclass['es_subjectid'] == $es_s8) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_subjectid'];?>"><?php echo $indclass['es_subjectname'];?></option>
                                        <?php } ?>
                                      </select></td>
						              <td align="center" valign="middle"><select name="es_s9" style="width:101px;" <?php if(isset($error['es_s9'])){?>class="error_border"<?php }?>>
						<option value=""  > ---Subject --- </option>
                                        <?php 
			//$classlist=gettingSubject($class_id);
			foreach($classlist as $indclass)
			{ ?>
                                        <option <?php if( ($timetabledetails[0]->es_s9 == $indclass['es_subjectid'] && $es_s9=="") || $indclass['es_subjectid'] == $es_s9) { echo "selected='selected'"; } ?> value="<?php echo $indclass['es_subjectid'];?>"><?php echo $indclass['es_subjectname'];?></option>
                                        <?php } ?>
                                      </select></td>  
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
				  <td colspan="4" align="center" valign="top"> <?php if(isset($es_class) && $es_class!=''){ ?><table width="43%" height="82" border="1" cellpadding="0" cellspacing="0">
                        <tr height="25" class="bgcolor_02">
                   <!--  <td width="7%" height="20" class="bgcolor_02"><strong>&nbsp;S No </strong></td>-->
                            <td width="22%" height="23" align="center"><strong>Subject </strong></td>
                         <td width="22%" height="23" align="center"><strong>Faculty Name</strong></td>
						  <td width="22%" height="23" align="center"><strong>Action </strong></td>
                      
                        </tr>
						<?php 
						$i=0;
						foreach($timetablemasterdetails as $eachrecord) { //print_r($timetablemasterdetails); ?>
                        <tr>
                          <!--<td height="26" class="narmal"><?php //echo ++$i;?></td>-->
                          <td class="narmal" align="center"><?php 
						  $sub_id=$eachrecord->es_subject;
						  $sel_group = "SELECT * FROM `es_subject` WHERE es_subjectid=".$sub_id."";
				$sel_group_sql =getarrayassoc($sel_group);
				echo $sel_group_sql['es_subjectname'];
				?></td>
                          <td class="narmal" align="center">
						  
						  <!--<input name="es_staffid[]" type="text" size="15" value="<?php $st=$eachrecord->es_staffid?>"/> --> <input name="es_mmid[]" type="hidden" size="15" value="<?php echo $eachrecord->es_timetablemasterId?>"/>
						  
						  <?php
						  //print $st;
						  $str=get_staffdetails($st);
						  if($str!="") {
						 foreach ( $str as $key=>$value) { if($key=='st_firstname' || $key=='st_lastname' ) { if($value!="") { print $value." "; } }
						 } } ?>
						  
						  </td>
                           <td class="narmal" align="center"><a title ="Delete" href="?pid=31&action=delete&es_tmid=<?php echo $eachrecord->es_timetablemasterId; ?>&es_class=<?php echo $es_class; ?>" onclick="return confirm('Are you sure you want to  delete ?')"><?php echo deleteIcon(); ?> </a></td>
                        </tr>
						<?php } ?>                       
                    </table>
					
					 <?php } ?>
					 <br />
					 <?php if(isset($es_class) && $es_class!=''){ ?>
					 <table width="43%" border="1" align="center" cellpadding="0" cellspacing="0">				  
				  <tr class="bgcolor_02" height="25">
					<td class="admin" align="center" >S.no</td>
					<td class="admin" align="center">Subject</td>
					<td class="admin" align="center">Faculty Name</td>												
				  </tr>
                  <!--onchange="document.edittimetable.submit(this.value);"-->			  
				  <tr>
					<td align="center" class="narmal" width="11%">1</td>
					<td align="center" class="narmal" width='36%'><select name="es_subject[]" >
                     <option value="" > --- Subject --- </option>
                         <?php                                                              
                                                                    
						$classlist = gettingSubject($es_class);
						foreach($classlist as $indclass) {
						?>
   <option  value="<?php echo $indclass['es_subjectid']; ?>" <?php  if(is_array($es_subject) && in_array($indclass['es_subjectid'] ,$es_subject)) { echo "selected='selected'"; } ?>   ><?php echo $indclass['es_subjectname']; ?></option>
                                                                                      <?php } ?>
                    </select></td>
																						<td align="center" class="narmal">
																						<select name="es_staffidnam[]">
			<option value=""> --- Select --- </option>
			<?php foreach($getstafflist as $eachstaff) { ?>
			<option value="<?php echo $eachstaff[es_staffid];?>"><?php echo $eachstaff[st_firstname]." ".$eachstaff[st_lastname] ;?></option>
			<?php } ?>
			</select></td>
            	  </tr>  				  
				</table>
					 <br />
                     
               
					  </td></tr>
			<?php } ?> 
                  <tr>
                    <td colspan="4" align="center" >
					  <?php if(isset($es_class) && $es_class!='')
{ ?><input name="updatetable" type="submit" class="bgcolor_02" value="Update" style="cursor:pointer" />


                 <?php } ?> 
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
<?php }
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
		<td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;Time Table for <?php echo classname($es_class); ?></strong>
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
                    <?php /*?><td width="35%" align="left" valign="top" class="narmal">&nbsp;Class                    
                      <select name="es_class" onChange="JavaScript:document.edittimetable.submit();">
						<option value="" >Class </option>
						<?php 
						$classlist = getallClasses();
						foreach($classlist as $indclass) {
						?>
						<option  value="<?php echo $indclass['es_classname']; ?>" <?php echo ($indclass['es_classname']==$es_class)?"selected":""?> ><?php echo $indclass['es_classname']; ?></option>
						<?php } ?>
				    </select></td><?php */?>
					  
                
                    <td width="50%" align="left" valign="top" class="narmal"></td>
					
                    <td width="15%" align="left" class="narmal" valign="right"> <?php if(isset($es_class) && $es_class!='')
{ ?> <a href="?pid=31&action=edittimetable" ></a> <?php }?></td>
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
					
					<?php	$school_start_time=$timetabledetails[0]->es_startfrom; ?>
					<?php	$number_of_periods=$timetabledetails[0]->es_endto; ?>
					<?php	$break=$timetabledetails[0]->es_breakfrom; ?>
					<?php	$break_position=$timetabledetails[0]->es_breakto; ?>
					<?php	$lunch=$timetabledetails[0]->es_lunchfrom; ?>

					<?php	$lunch_position=$timetabledetails[0]->es_lunchto; ?>
					<?php	$period_duration=$timetabledetails[0]->es_duration; ?>
					
					
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
				  <?php	$number_of_periods=$timetabledetails[0]->es_endto; ?>
					
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
                    <td align="center" class="narmal">
                    <?php
                    $query_sql="SELECT * FROM es_subject WHERE es_subjectshortname=".$es_class;
                    $query_exe=mysql_query($query_sql);
                    while($query_row=mysql_fetch_array($query_exe)){
                        $subject_array[$query_row['es_subjectid']]=$query_row['es_subjectname'];
                    }
                    echo $subject_array[$timetabledetails[0]->es_m1];
                    ?>
                    </td>
                    <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_m2]; ?></td>
                   
                    <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_m3]; ?></td>
                    <?php if($number_of_periods >= 4) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_m4]; ?></td><?php } ?>
                    <?php if($number_of_periods >= 5) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_m5]; ?></td><?php } ?>
                      
                     <?php if($number_of_periods >= 6) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_m6]; ?></td><?php } ?>
                     <?php if($number_of_periods >= 7) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_m7]; ?></td><?php } ?>
                    <?php if($number_of_periods >= 8) { ?> <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_m8]; ?></td><?php } ?>
                    <?php if($number_of_periods >= 9) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_m9]; ?></td><?php } ?>
                  </tr>
                  <tr>
                    <td height="42" class="bgcolor_02" >&nbsp;&nbsp;<strong>Tue</strong></td>
                    <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_t1]; ?></td>
                    <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_t2]; ?></td>
                       
                    <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_t3]; ?></td>
                    <?php if($number_of_periods >= 4) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_t4]; ?></td><?php } ?>
                    <?php if($number_of_periods >= 5) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_t5]; ?></td><?php } ?>
                       
                    <?php if($number_of_periods >= 6) { ?> <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_t6]; ?></td><?php } ?>
                     <?php if($number_of_periods >= 7) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_t7]; ?></td><?php } ?>
                    <?php if($number_of_periods >= 8) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_t8]; ?></td><?php } ?>
                    <?php if($number_of_periods >= 9) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_t9]; ?></td><?php } ?>
                  </tr>
                  <tr>
                    <td height="42" class="bgcolor_02" >&nbsp;&nbsp;<strong>Wed</strong></td>
                    <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_w1]; ?></td>
                    <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_w2]; ?></td>
                         
                    <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_w3]; ?></td>
                    <?php if($number_of_periods >= 4) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_w4]; ?></td><?php } ?>
                    <?php if($number_of_periods >= 5) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_w5]; ?></td><?php } ?>
                       
                   <?php if($number_of_periods >= 6) { ?> <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_w6]; ?></td><?php } ?>
                     <?php if($number_of_periods >= 7) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_w7]; ?></td><?php } ?>
                  <?php if($number_of_periods >= 8) { ?>  <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_w8]; ?></td><?php } ?>
                    <?php if($number_of_periods >= 9) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_w9]; ?></td><?php } ?>
                  </tr>
                  <tr>
                       <td height="42" class="bgcolor_02" >&nbsp;&nbsp;<strong>Thurs</strong></td>
                    <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_th1]; ?></td>
                    <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_th2]; ?></td>
                    
                    <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_th3]; ?></td>
                    <?php if($number_of_periods >= 4) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_th4]; ?></td><?php } ?>
                    <?php if($number_of_periods >= 5) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_th5]; ?></td><?php } ?>
                       
                    <?php if($number_of_periods >= 6) { ?> <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_th6]; ?></td><?php } ?>
                     <?php if($number_of_periods >= 7) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_th7]; ?></td><?php } ?>
                    <?php if($number_of_periods >= 8) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_th8]; ?></td> <?php } ?>  
                    <?php if($number_of_periods >= 9) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_th9]; ?></td><?php } ?>
                  </tr>
                  <tr>
                      <td height="42" class="bgcolor_02" >&nbsp;&nbsp;<strong>Fri</strong></td>
                    <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_f1]; ?></td>
                    <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_f2]; ?></td>
                    
                    <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_f3]; ?></td>
                    <?php if($number_of_periods >= 4) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_f4]; ?></td><?php } ?>
                    <?php if($number_of_periods >= 5) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_f5]; ?></td><?php } ?>
                      
                    <?php if($number_of_periods >= 6) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_f6]; ?></td><?php } ?>
                     <?php if($number_of_periods >= 7) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_f7]; ?></td><?php } ?>
                   <?php if($number_of_periods >= 8) { ?> <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_f8]; ?></td> <?php } ?>
                    <?php if($number_of_periods >= 9) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_f9]; ?></td><?php } ?>
                  </tr>
                  <tr>
                    <td height="42" class="bgcolor_02" >&nbsp;&nbsp;<strong>Sat</strong></td>
                    <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_s1]; ?></td>
                    <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_s2]; ?></td>
                       
                    <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_s3]; ?></td>
                    <?php if($number_of_periods >= 4) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_s4]; ?></td><?php } ?>
                    <?php if($number_of_periods >= 5) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_s5]; ?></td><?php } ?>
                       
                    <?php if($number_of_periods >= 6) { ?> <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_s6]; ?></td><?php } ?>
                     <?php if($number_of_periods >= 7) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_s7]; ?></td><?php } ?>
                     <?php if($number_of_periods >= 8) { ?> <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_s8]; ?></td> <?php } ?>
                    <?php if($number_of_periods >= 9) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_s9]; ?></td><?php } ?>
                    <?php }?>
        </tr>
                    </table></td>
                  </tr>
		
				  
                  <tr align="center">
                    <td colspan="4" align="center" valign="top" > 	
                     
                      <p class="narmal">
  <?php if(isset($es_class) && $es_class!=''){ ?>
 
                    <!-- <strong>   Break : 10:15 AM to 10:30 AM </strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong> Lunch Break : 12:00 Noon to 1:00 PM </strong></p>-->
                     
                      <table width="43%" height="82" border="1" cellpadding="0" cellspacing="0">
                        <tr height="25" class="bgcolor_02">
                   <!--  <td width="7%" height="20" class="bgcolor_02"><strong>&nbsp;S No </strong></td>-->
                            <td width="22%" height="23" align="center"><strong>Subject </strong></td>
                         <td width="22%" height="23" align="center"><strong>Faculty Name</strong></td>
						  <!--<td width="22%" height="23" align="center"><strong>Action </strong></td>-->
                      
                        </tr>
						<?php 
						$i=0;
						foreach($timetablemasterdetails as $eachrecord) { //print_r($timetablemasterdetails); ?>
                        <tr>
                          <!--<td height="26" class="narmal"><?php //echo ++$i;?></td>-->
                          <td class="narmal" align="center">
						  <?php echo $subject_array[$eachrecord->es_subject];?></td>
                          <td class="narmal" align="center">
						  
						  <!--<input name="es_staffid[]" type="text" size="15" value="<?php $st=$eachrecord->es_staffid?>"/> --> <input name="es_mmid[]" type="hidden" size="15" value="<?php echo $eachrecord->es_timetablemasterId?>"/>
						  
						  <?php
						  //print $st;
						  

						  $str=get_staffdetails($st);
						  if($str!="") {
						 foreach ( $str as $key=>$value) { if($key=='st_firstname' || $key=='st_lastname' ) { if($value!="") { print $value." "; } }
						 } } ?>
						  
						  </td>
                           <?php /*?><td class="narmal" align="center"><a title ="Delete" href="?pid=31&action=delete&es_tmid=<?php echo $eachrecord->es_timetablemasterId; ?>"><?php echo deleteIcon(); ?> </a></td><?php */?>
                        </tr>
						<?php } ?>                       
                    </table> <?php }?></td>
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
<p align="center"><input type="button" id="printbutton" value="&nbsp;Print" class="bgcolor_02" onclick="return printing();"/></p>
</form>
<?php }?>
	
	