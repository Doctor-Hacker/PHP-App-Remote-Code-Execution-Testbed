<script type="text/javascript">

function newWindowOpen(href){
    window.open(href,null, 'width=900,height=900,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');
}
</script>
<?php 
/*
*Start of Time Table Web Page
*/
if ($action=='viewtimetable'){
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td height="15"></td>
	</tr>
	<tr>
		<td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Time Table</span></td>
    </tr>
	<tr>
        <td class="bgcolor_02" width="1"/></td>
        <td valign="top" align="center">
            <table width="100%" border="0" cellspacing="4" cellpadding="0">
                <tr>
                    <td height="25"  valign="middle">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr >
                            <td width="21%" align="left" class="adminfont" >&nbsp; Start Time</td>
                          <td width="4%" align="left" class="narmal" >&nbsp;</td>
                    <td width="40%" align="left" class="narmal" ><?php echo $timetabledetails[0]->es_startfrom; ?> Am </td>
                      <td width="35%" height="19" align="left" class="narmal" > Number of Periods : <?php echo $timetabledetails[0]->es_endto; ?> </td>
                        </tr>
                        <tr>
                            <td align="left" class="adminfont" >&nbsp;Break Timings</td>
                          <td align="left" class="narmal">&nbsp;</td>
                          <td align="left" class="narmal"><?php echo $timetabledetails[0]->es_breakfrom; ?> Min</td>
                          <td height="19" align="left" class="narmal" > After  <?php echo $timetabledetails[0]->es_breakto; ?> Period(s) </td>
                        </tr>
                        <tr>
                            <td align="left" class="adminfont" >&nbsp;Lunch Timings</td>
                          <td align="left" class="narmal">&nbsp;</td>
                          <td align="left" class="narmal"><?php echo $timetabledetails[0]->es_lunchfrom; ?> Min </td>
                          <td height="19" align="left" class="narmal"> After  <?php echo $timetabledetails[0]->es_lunchto; ?> Period(s)</td>
                        </tr>
                        <tr align="left" >
                            <td class="adminfont" >&nbsp;Period Duration</td>
                          <td width="4%" class="narmal" > </td>				  
                          <td height="19" class="narmal"><?php echo $timetabledetails[0]->es_duration; ?> Min </td>
                        </tr>
                        <tr>
                            <td class="adminfont" >&nbsp;</td>
                            <td height="19" colspan="3" class="narmal">&nbsp;</td>
                        </tr>
                        </table>
    <?php 
        
    if (isset($es_class) && $es_class!=""){ 
    $school_start_time = $timetabledetails[0]->es_startfrom; 
    $number_of_periods = $timetabledetails[0]->es_endto;
    $break = $timetabledetails[0]->es_breakfrom;
    $break_position = $timetabledetails[0]->es_breakto;
    $lunch = $timetabledetails[0]->es_lunchfrom; 
    $lunch_position = $timetabledetails[0]->es_lunchto;
    $period_duration = $timetabledetails[0]->es_duration; 
    
    $dd = date("d");
    $mm = date("m");
    $yy = date("Y");
      
    $peried_1 = explode(":", $school_start_time);
    $h	= $peried_1[0];
    $m = $peried_1[1];
    /*int mktime  ([ int $hour  [, int $minute  [, int $second  [, int $month  [, int $day  [, int $year  [, int $is_dst  ]]]]]]] )*/
    
    $peried_1e = date("H:i", mktime($h, $m+$period_duration, 0,  $mm, $dd, $yy));
    
    if ($break_position==1){
    $peried_2 = explode(":", $peried_1e);
    $h = $peried_2[0];
    $m = $peried_2[1];	
    $peried_2s = date("H:i", mktime($h,$m+$break,0,$mm, $dd, $yy));		  
    $peried_2e = date("H:i", mktime($h,$m+$break+$period_duration,0,$mm,$dd,$yy));					
    
    }else{					
    $peried_2 = explode(":", $peried_1e);
    $h = $peried_2[0];
    $m = $peried_2[1];
    $peried_2s = $peried_1e;			  
    $peried_2e = date("H:i", mktime($h,$m+$period_duration,0,$mm,$dd,$yy));										
    }
    if ($break_position==2 || $lunch_position==2){
    $peried_3 = explode(":", $peried_2e);
    $h = $peried_3[0];
    $m = $peried_3[1];
    if($break_position==2) {$b=$break;}
    if($lunch_position==2) {$b=$lunch;}
    $peried_3s =date("H:i", mktime($h,$m+$b,0,$mm, $dd, $yy));		  
    $peried_3e = date("H:i", mktime($h,$m+$b+$period_duration,0,$mm,$dd,$yy));					
    }else{					
    $peried_3 = explode(":", $peried_2e);
    $h = $peried_3[0];
    $m = $peried_3[1];
    $peried_3s =	$peried_2e;			  
    $peried_3e = date("H:i", mktime($h,$m+$period_duration,0,$mm,$dd, $yy));						
    
    }if ($break_position==3 || $lunch_position==3){
    $peried_4 = explode(":", $peried_3e);
    $h = $peried_4[0];
    $m = $peried_4[1];
    if($break_position==3) {$b=$break;}
    if($lunch_position==3) {$b=$lunch;}
    $peried_4s =date("H:i", mktime($h,$m+$b,0,$mm, $dd, $yy));		  
    $peried_4e = date("H:i", mktime($h,$m+$b+$period_duration,0,$mm,$dd,$yy));					
    }else{					
    $peried_4 = explode(":", $peried_3e);
    $h = $peried_4[0];
    $m = $peried_4[1];
    $peried_4s =	$peried_3e;			  
    $peried_4e=date("H:i", mktime($h,$m+$period_duration,0,$mm,$dd,$yy));						
    }
    
    if ($break_position==4 || $lunch_position==4) {
    $peried_5 = explode(":", $peried_4e);
    $h = $peried_5[0];
    $m = $peried_5[1];
    if($break_position==4) {$b=$break;}
    if($lunch_position==4) {$b=$lunch;}
    $peried_5s =date("H:i", mktime($h,$m+$b,0,$mm, $dd, $yy));		  
    $peried_5e = date("H:i", mktime($h,$m+$b+$period_duration,0,$mm,$dd,$yy));					
    
    }else{					
    $peried_5 = explode(":", $peried_4e);
    $h = $peried_5[0];
    $m = $peried_5[1];
    $peried_5s =	$peried_4e;			  
    $peried_5e=date("H:i", mktime($h,$m+$period_duration,0,$mm,$dd,$yy));						
    }
    if ($break_position==5 || $lunch_position==5){
    $peried_6 = explode(":", $peried_5e);
    $h = $peried_6[0];
    $m = $peried_6[1];
    if($break_position==5) {$b=$break;}
    if($lunch_position==5) {$b=$lunch;}
    $peried_6s =date("H:i", mktime($h,$m+$b,0,$mm, $dd, $yy));		  
    $peried_6e = date("H:i", mktime($h,$m+$b+$period_duration,0,$mm,$dd, $yy));					
    }else{					
    $peried_6 = explode(":", $peried_5e);
    $h = $peried_6[0];
    $m = $peried_6[1];
    $peried_6s =	$peried_5e;			  
    $peried_6e=date("H:i", mktime($h,$m+$period_duration,0,$mm,$dd,$yy));						
    }
    if ($break_position==6 || $lunch_position==6){
    $peried_7 = explode(":", $peried_6e);
    $h = $peried_7[0];
    $m = $peried_7[1];
    if($break_position==6) {$b=$break;}
    if($lunch_position==6) {$b=$lunch;}
    $peried_7s =date("H:i", mktime($h,$m+$b,0,$mm, $dd, $yy));		  
    $peried_7e = date("H:i", mktime($h,$m+$b+$period_duration,0,$mm, $dd, $yy));					
    }else{					
    $peried_7 = explode(":", $peried_6e);
    $h = $peried_7[0];
    $m = $peried_7[1];
    $peried_7s =	$peried_6e;			  
    $peried_7e=date("H:i", mktime($h,$m+$period_duration,0,$mm, $dd, $yy));						
    } 
    if ($break_position==7 || $lunch_position==7) {
    $peried_8 = explode(":", $peried_7e);
    $h = $peried_8[0];
    $m = $peried_8[1];
    if($break_position==7) {$b=$break;}
    if($lunch_position==7) {$b=$lunch;}
    $peried_8s =date("H:i", mktime($h,$m+$b,0,$mm, $dd, $yy));		  
    $peried_8e = date("H:i", mktime($h,$m+$b+$period_duration,0,$mm, $dd, $yy));					
    
    }else{					
    
    $peried_8 = explode(":", $peried_7e);
    $h = $peried_8[0];
    $m = $peried_8[1];
    $peried_8s =	$peried_7e;			  
    $peried_8e=date("H:i", mktime($h,$m+$period_duration,0,$mm, $dd, $yy));						
    }
    if ($break_position==8 || $lunch_position==8){
    
    $peried_9 = explode(":", $peried_8e);
    $h = $peried_9[0];
    $m = $peried_9[1];
    if($break_position==8) {$b=$break;}
    if($lunch_position==8) {$b=$lunch;}
    $peried_9s =date("H:i", mktime($h,$m+$b,0,$mm, $dd, $yy));		  
    $peried_9e = date("H:i", mktime($h,$m+$b+$period_duration,0,$mm, $dd, $yy));					
    
    }else{					
    $peried_9 = explode(":", $peried_8e);
    $h = $peried_9[0];
    $m = $peried_9[1];
    $peried_9s =	$peried_8e;			  
    $peried_9e=date("H:i", mktime($h,$m+$period_duration,0,$mm, $dd, $yy));						
    }
        
    ?>
    <table width="100%"   cellpadding="0" cellspacing="0"  border="1" class="tbl_grid">
        <tr  class="bgcolor_02"><?php $ttimage = str_replace("css", "", $_SESSION['eschools']['user_theme']);?>
                <td width="6%" align="center"><img src="images/tt_<?php echo $ttimage;?>jpg" border="0"></td>
                    <td width="10%" height="23" align="center"><strong>1 <br/>
                    <?php 
                    $school_start_time_1=explode(":",$school_start_time); 
                    print $school_start_time_1['0'].":".$school_start_time_1['1'];
                    echo " To  <br>".$peried_1e;
                    ?>
                     </strong></td>
                     
                     <?php if($break_position==1) { ?><td width="13%" rowspan="7"align="center"><strong>B1</strong></td> <?php } ?>
                    <?php if($lunch_position==1) { ?><td width="13%" rowspan="7"align="center"><strong>B2</strong></td> <?php } ?>
                    
                    <td width="10%"align="center"><strong>2 <br/> <?php print $peried_2s." To  <br>".$peried_2e; ?></strong></td>
                    
                    <?php if($break_position==2) { ?><td width="13%" rowspan="7"align="center"><strong>B1</strong></td> <?php } ?>
                    <?php if($lunch_position==2) { ?><td width="13%" rowspan="7"align="center"><strong>B2</strong></td> <?php } ?>
                      
                      <td width="10%" align="center"><strong>3 <br/> <?php print $peried_3s." To  <br>".$peried_3e; ?></strong></td>
                      
                      <?php if($break_position==3) { ?><td width="13%" rowspan="7"align="center"><strong>B1</strong></td> <?php } ?>
                    <?php if($lunch_position==3) { ?><td width="13%" rowspan="7"align="center"><strong>B2</strong></td> <?php } ?>
                    
                    <td width="10%" align="center"><strong>4 <br/><?php print $peried_4s." To  <br>".$peried_4e; ?></strong></td>
                    
                    <?php if($break_position==4) { ?><td width="13%" rowspan="7"align="center"><strong>B1</strong></td> <?php } ?>
                    <?php if($lunch_position==4) { ?><td width="13%" rowspan="7"align="center"><strong>B2</strong></td> <?php } ?>
                    
                    <td width="10%"align="center"><strong>5 <br/> <?php print $peried_5s." To  <br>".$peried_5e; ?></strong></td>
                    
                    <?php if($break_position==5) { ?><td width="13%" rowspan="7"align="center"><strong>B1</strong></td> <?php } ?>
                    <?php if($lunch_position==5) { ?><td width="13%" rowspan="7"align="center"><strong>B2</strong></td> <?php } ?>
                    
                         <?php if($number_of_periods >= 6) { ?> <td width="10%"align="center"><strong>6 <br/> <?php print $peried_6s." To  <br>".$peried_6e; ?></strong></td><?php } ?>
                        
                        <?php if($break_position==6) { ?><td width="13%" rowspan="7"align="center"><strong>B1</strong></td> <?php } ?>
                    <?php if($lunch_position==6) { ?><td width="13%" rowspan="7"align="center"><strong>B2</strong></td> <?php } ?>
                    
                             <?php if($number_of_periods >= 7) { ?> <td width="10%"align="center"><strong>7 <br/> <?php print $peried_7s." To  <br>".$peried_7e; ?></strong></td><?php } ?>
                            
                            <?php if($break_position==7) { ?><td width="13%" rowspan="7"align="center"><strong>B1</strong></td> <?php } ?>
                            <?php if($lunch_position==7) { ?><td width="13%" rowspan="7"align="center"><strong>B2</strong></td> <?php } ?>
                    
                    
                                  <?php if($number_of_periods >= 8) { ?>   <td width="10%"align="center"><strong>8 <br/> <?php print $peried_8s." To  <br>".$peried_8e; ?></strong></td><?php } ?>
                                
                                <?php if($break_position==8) { ?><td width="13%" rowspan="7"align="center"><strong>B1</strong></td> <?php } ?>
                    <?php if($lunch_position==8) { ?><td width="13%" rowspan="7"align="center"><strong>B2</strong></td> <?php } ?>
                          <?php if($number_of_periods >= 9) { ?>
                                    <td width="10%"align="center"><strong>9 <br/>  <?php print $peried_9s." To  <br>".$peried_9e; ?></strong></td><?php } ?>
                  
                 
                  
                  </tr>
    <tr>
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
        <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_m4]; ?></td>
        <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_m5]; ?></td>
        <?php if($number_of_periods >= 6) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_m6]; ?></td><?php } ?>
        <?php if($number_of_periods >= 7) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_m7]; ?></td><?php } ?>
        <?php if($number_of_periods >= 8) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_m8]; ?></td><?php } ?>
        <?php if($number_of_periods >= 9) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_m9]; ?></td><?php } ?>
                    
    </tr>
    <tr>
        <td height="42" class="bgcolor_02" >&nbsp;&nbsp;<strong>Tue</strong></td>
        <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_t1]; ?></td>
        <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_t2]; ?></td>
        <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_t3]; ?></td>
        <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_t4]; ?></td>
        <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_t5]; ?></td>
        <?php if($number_of_periods >= 6) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_t6]; ?></td><?php } ?>
        <?php if($number_of_periods >= 7) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_t7]; ?></td><?php } ?>
        <?php if($number_of_periods >= 8) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_t8]; ?></td><?php } ?>
        <?php if($number_of_periods >= 9) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_t9]; ?></td><?php } ?>
    </tr>
    <tr>
        <td height="42" class="bgcolor_02" >&nbsp;&nbsp;<strong>Wed</strong></td>
        <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_w1]; ?></td>
        <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_w2]; ?></td>
        <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_w3]; ?></td>
        <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_w4]; ?></td>
        <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_w5]; ?></td>
        <?php if($number_of_periods >= 6) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_w6]; ?></td><?php } ?>
        <?php if($number_of_periods >= 7) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_w7]; ?></td><?php } ?>
        <?php if($number_of_periods >= 8) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_w8]; ?></td><?php } ?>
        <?php if($number_of_periods >= 9) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_w9]; ?></td><?php } ?>
    </tr>
    <tr>
        <td height="42" class="bgcolor_02" >&nbsp;&nbsp;<strong>Thurs</strong></td>
        <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_th1]; ?></td>
        <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_th2]; ?></td>
        <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_th3]; ?></td>
        <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_th4]; ?></td>
        <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_th5]; ?></td>
        <?php if($number_of_periods >= 6) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_th6]; ?></td><?php } ?>
        <?php if($number_of_periods >= 7) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_th7]; ?></td><?php } ?>
        <?php if($number_of_periods >= 8) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_th8]; ?></td><?php } ?>
        <?php if($number_of_periods >= 9) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_th9]; ?></td><?php } ?>
    </tr>
    <tr>
        <td height="42" class="bgcolor_02" >&nbsp;&nbsp;<strong>Fri</strong></td>
        <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_f1]; ?></td>
        <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_f2]; ?></td>
        <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_f3]; ?></td>
        <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_f4]; ?></td>
        <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_f5]; ?></td>
        <?php if($number_of_periods >= 6) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_f6]; ?></td><?php } ?>
        <?php if($number_of_periods >= 7) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_f7]; ?></td><?php } ?>
        <?php if($number_of_periods >= 8) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_f8]; ?></td><?php } ?>
        <?php if($number_of_periods >= 9) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_f9]; ?></td><?php } ?>
    </tr>
    <tr>
        <td height="42" class="bgcolor_02" >&nbsp;&nbsp;<strong>Sat</strong></td>
        <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_s1]; ?></td>
        <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_s2]; ?></td>
        <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_s3]; ?></td>
        <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_s4]; ?></td>
        <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_s5]; ?></td>
        <?php if($number_of_periods >= 6) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_s6]; ?></td><?php } ?>
        <?php if($number_of_periods >= 7) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_s7]; ?></td><?php } ?>
        <?php if($number_of_periods >= 8) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_s8]; ?></td><?php } ?>
        <?php if($number_of_periods >= 9) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_s9]; ?></td><?php } ?>
    </tr>
    </table>	 
    </td>
      </tr>
	  
	  <tr align="center">
                    <td align="center" valign="top" > 	
                     
                      <p class="narmal">
  <?php 
 
  if(isset($es_class) && $es_class!=''){ ?>
 
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
                          <td class="narmal" align="center"><?php echo $subject_array[$eachrecord->es_subject];?></td>
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
     <tr>
<td width="35%" class="narmal" align="right"><input name="Submit" type="button" style="cursor:pointer" onclick="newWindowOpen ('?pid=13&action=printtimetable');" class="bgcolor_02" value="Print" /></td></tr> 
    </table>
        </td>
        <td class="bgcolor_02" width="1"/></td>
	</tr>
	
	<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>	
</table>

<?php	
	}

 }
/**
* print time table
*/
if ($action=='printtimetable'){
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td height="25" colspan="3" class="bgcolor_02" align="center">&nbsp;&nbsp;<span class="admin">Time Table for <?php echo classname($studentdetails['pre_class']); ?></span></td>
	</tr>
    <tr>
        <td class="bgcolor_02" width="1"/></td>
        <td valign="top" align="center">
            <table width="100%" border="0" cellspacing="4" cellpadding="0">
                <tr>
                    <td height="25"  valign="middle">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr >
                            <td width="25%" align="left" class="adminfont" >&nbsp; Start Time</td>
                            <td width="2%" align="left" class="narmal" >&nbsp;</td>
                          <td width="38%" align="left" class="narmal" ><?php echo $timetabledetails[0]->es_startfrom; ?> Am </td>
                          <td width="35%" height="19" align="left" class="narmal" > Number of Periods : <?php echo $timetabledetails[0]->es_endto; ?> </td>
                        </tr>
                        <tr>
                            <td align="left" class="adminfont" >&nbsp;Break Timings</td>
                          <td align="left" class="narmal">&nbsp;</td>
                          <td align="left" class="narmal"><?php echo $timetabledetails[0]->es_breakfrom; ?> Min</td>
                          <td height="19" align="left" class="narmal" > After  <?php echo $timetabledetails[0]->es_breakto; ?> Period(s)</td>
                        </tr>
                        <tr>
                            <td align="left" class="adminfont" >&nbsp;Lunch Timings</td>
                          <td align="left" class="narmal">&nbsp;</td>
                          <td align="left" class="narmal"><?php echo $timetabledetails[0]->es_lunchfrom; ?> Min </td>
                          <td height="19" align="left" class="narmal"> After  <?php echo $timetabledetails[0]->es_lunchto; ?> Period(s)</td>
                        </tr>
                        <tr >
                            <td align="left" class="adminfont" >&nbsp;Period Duration</td>
                            <td width="2%" align="left" class="narmal" > </td>				  
                          <td height="19" align="left" class="narmal"><?php echo $timetabledetails[0]->es_duration; ?> Min </td>
                        </tr>
                        <tr>
                            <td align="left" class="adminfont" >&nbsp;</td>
                          <td height="19" colspan="3" align="left" class="narmal">&nbsp;</td>
                        </tr>
                        </table>
    <?php 
        
    if (isset($es_class) && $es_class!=""){ 
    $school_start_time = $timetabledetails[0]->es_startfrom; 
    $number_of_periods = $timetabledetails[0]->es_endto;
    $break = $timetabledetails[0]->es_breakfrom;
    $break_position = $timetabledetails[0]->es_breakto;
    $lunch = $timetabledetails[0]->es_lunchfrom; 
    $lunch_position = $timetabledetails[0]->es_lunchto;
    $period_duration = $timetabledetails[0]->es_duration; 
    
    $dd = date("d");
    $mm = date("m");
    $yy = date("Y");
      
    $peried_1 = explode(":", $school_start_time);
    $h	= $peried_1[0];
    $m = $peried_1[1];
    /*int mktime  ([ int $hour  [, int $minute  [, int $second  [, int $month  [, int $day  [, int $year  [, int $is_dst  ]]]]]]] )*/
    
    $peried_1e = date("H:i", mktime($h, $m+$period_duration, 0,  $mm, $dd, $yy));
    
    if ($break_position==1){
    $peried_2 = explode(":", $peried_1e);
    $h = $peried_2[0];
    $m = $peried_2[1];	
    $peried_2s = date("H:i", mktime($h,$m+$break,0,$mm, $dd, $yy));		  
    $peried_2e = date("H:i", mktime($h,$m+$break+$period_duration,0,$mm,$dd,$yy));					
    
    }else{					
    $peried_2 = explode(":", $peried_1e);
    $h = $peried_2[0];
    $m = $peried_2[1];
    $peried_2s = $peried_1e;			  
    $peried_2e = date("H:i", mktime($h,$m+$period_duration,0,$mm,$dd,$yy));										
    }
    if ($break_position==2 || $lunch_position==2){
    $peried_3 = explode(":", $peried_2e);
    $h = $peried_3[0];
    $m = $peried_3[1];
    if($break_position==2) {$b=$break;}
    if($lunch_position==2) {$b=$lunch;}
    $peried_3s =date("H:i", mktime($h,$m+$b,0,$mm, $dd, $yy));		  
    $peried_3e = date("H:i", mktime($h,$m+$b+$period_duration,0,$mm,$dd,$yy));					
    }else{					
    $peried_3 = explode(":", $peried_2e);
    $h = $peried_3[0];
    $m = $peried_3[1];
    $peried_3s =	$peried_2e;			  
    $peried_3e = date("H:i", mktime($h,$m+$period_duration,0,$mm,$dd, $yy));						
    
    }if ($break_position==3 || $lunch_position==3){
    $peried_4 = explode(":", $peried_3e);
    $h = $peried_4[0];
    $m = $peried_4[1];
    if($break_position==3) {$b=$break;}
    if($lunch_position==3) {$b=$lunch;}
    $peried_4s =date("H:i", mktime($h,$m+$b,0,$mm, $dd, $yy));		  
    $peried_4e = date("H:i", mktime($h,$m+$b+$period_duration,0,$mm,$dd,$yy));					
    }else{					
    $peried_4 = explode(":", $peried_3e);
    $h = $peried_4[0];
    $m = $peried_4[1];
    $peried_4s =	$peried_3e;			  
    $peried_4e=date("H:i", mktime($h,$m+$period_duration,0,$mm,$dd,$yy));						
    }
    
    if ($break_position==4 || $lunch_position==4) {
    $peried_5 = explode(":", $peried_4e);
    $h = $peried_5[0];
    $m = $peried_5[1];
    if($break_position==4) {$b=$break;}
    if($lunch_position==4) {$b=$lunch;}
    $peried_5s =date("H:i", mktime($h,$m+$b,0,$mm, $dd, $yy));		  
    $peried_5e = date("H:i", mktime($h,$m+$b+$period_duration,0,$mm,$dd,$yy));					
    
    }else{					
    $peried_5 = explode(":", $peried_4e);
    $h = $peried_5[0];
    $m = $peried_5[1];
    $peried_5s =	$peried_4e;			  
    $peried_5e=date("H:i", mktime($h,$m+$period_duration,0,$mm,$dd,$yy));						
    }
    if ($break_position==5 || $lunch_position==5){
    $peried_6 = explode(":", $peried_5e);
    $h = $peried_6[0];
    $m = $peried_6[1];
    if($break_position==5) {$b=$break;}
    if($lunch_position==5) {$b=$lunch;}
    $peried_6s =date("H:i", mktime($h,$m+$b,0,$mm, $dd, $yy));		  
    $peried_6e = date("H:i", mktime($h,$m+$b+$period_duration,0,$mm,$dd, $yy));					
    }else{					
    $peried_6 = explode(":", $peried_5e);
    $h = $peried_6[0];
    $m = $peried_6[1];
    $peried_6s =	$peried_5e;			  
    $peried_6e=date("H:i", mktime($h,$m+$period_duration,0,$mm,$dd,$yy));						
    }
    if ($break_position==6 || $lunch_position==6){
    $peried_7 = explode(":", $peried_6e);
    $h = $peried_7[0];
    $m = $peried_7[1];
    if($break_position==6) {$b=$break;}
    if($lunch_position==6) {$b=$lunch;}
    $peried_7s =date("H:i", mktime($h,$m+$b,0,$mm, $dd, $yy));		  
    $peried_7e = date("H:i", mktime($h,$m+$b+$period_duration,0,$mm, $dd, $yy));					
    }else{					
    $peried_7 = explode(":", $peried_6e);
    $h = $peried_7[0];
    $m = $peried_7[1];
    $peried_7s =	$peried_6e;			  
    $peried_7e=date("H:i", mktime($h,$m+$period_duration,0,$mm, $dd, $yy));						
    } 
    if ($break_position==7 || $lunch_position==7) {
    $peried_8 = explode(":", $peried_7e);
    $h = $peried_8[0];
    $m = $peried_8[1];
    if($break_position==7) {$b=$break;}
    if($lunch_position==7) {$b=$lunch;}
    $peried_8s =date("H:i", mktime($h,$m+$b,0,$mm, $dd, $yy));		  
    $peried_8e = date("H:i", mktime($h,$m+$b+$period_duration,0,$mm, $dd, $yy));					
    
    }else{					
    
    $peried_8 = explode(":", $peried_7e);
    $h = $peried_8[0];
    $m = $peried_8[1];
    $peried_8s =	$peried_7e;			  
    $peried_8e=date("H:i", mktime($h,$m+$period_duration,0,$mm, $dd, $yy));						
    }
    if ($break_position==8 || $lunch_position==8){
    
    $peried_9 = explode(":", $peried_8e);
    $h = $peried_9[0];
    $m = $peried_9[1];
    if($break_position==8) {$b=$break;}
    if($lunch_position==8) {$b=$lunch;}
    $peried_9s =date("H:i", mktime($h,$m+$b,0,$mm, $dd, $yy));		  
    $peried_9e = date("H:i", mktime($h,$m+$b+$period_duration,0,$mm, $dd, $yy));					
    
    }else{					
    $peried_9 = explode(":", $peried_8e);
    $h = $peried_9[0];
    $m = $peried_9[1];
    $peried_9s =	$peried_8e;			  
    $peried_9e=date("H:i", mktime($h,$m+$period_duration,0,$mm, $dd, $yy));						
    }
        
    ?>
    <table width="100%"   cellpadding="0" cellspacing="0"  border="1" class="tbl_grid">
        <tr  class="bgcolor_02"><?php $ttimage = str_replace("css", "", $_SESSION['eschools']['user_theme']);?>
                <td width="6%" align="center"><img src="images/tt_<?php echo $ttimage;?>jpg" border="0"></td>
                    <td width="10%" height="23" align="center"><strong>1 <br/>
                    <?php 
                    $school_start_time_1=explode(":",$school_start_time); 
                    print $school_start_time_1['0'].":".$school_start_time_1['1'];
                    echo " To  <br>".$peried_1e;
                    ?>
                     </strong></td>
                     
                     <?php if($break_position==1) { ?><td width="13%" rowspan="7"align="center"><strong>B1</strong></td> <?php } ?>
                    <?php if($lunch_position==1) { ?><td width="13%" rowspan="7"align="center"><strong>B2</strong></td> <?php } ?>
                    
                    <td width="10%"align="center"><strong>2 <br/> <?php print $peried_2s." To  <br>".$peried_2e; ?></strong></td>
                    
                    <?php if($break_position==2) { ?><td width="13%" rowspan="7"align="center"><strong>B1</strong></td> <?php } ?>
                    <?php if($lunch_position==2) { ?><td width="13%" rowspan="7"align="center"><strong>B2</strong></td> <?php } ?>
                      
                      <td width="10%" align="center"><strong>3 <br/> <?php print $peried_3s." To  <br>".$peried_3e; ?></strong></td>
                      
                      <?php if($break_position==3) { ?><td width="13%" rowspan="7"align="center"><strong>B1</strong></td> <?php } ?>
                    <?php if($lunch_position==3) { ?><td width="13%" rowspan="7"align="center"><strong>B2</strong></td> <?php } ?>
                    
                    <td width="10%" align="center"><strong>4 <br/><?php print $peried_4s." To  <br>".$peried_4e; ?></strong></td>
                    
                    <?php if($break_position==4) { ?><td width="13%" rowspan="7"align="center"><strong>B1</strong></td> <?php } ?>
                    <?php if($lunch_position==4) { ?><td width="13%" rowspan="7"align="center"><strong>B2</strong></td> <?php } ?>
                    
                    <td width="10%"align="center"><strong>5 <br/> <?php print $peried_5s." To  <br>".$peried_5e; ?></strong></td>
                    
                    <?php if($break_position==5) { ?><td width="13%" rowspan="7"align="center"><strong>B1</strong></td> <?php } ?>
                    <?php if($lunch_position==5) { ?><td width="13%" rowspan="7"align="center"><strong>B2</strong></td> <?php } ?>
                    
                         <?php if($number_of_periods >= 6) { ?> <td width="10%"align="center"><strong>6 <br/> <?php print $peried_6s." To  <br>".$peried_6e; ?></strong></td><?php } ?>
                        
                        <?php if($break_position==6) { ?><td width="13%" rowspan="7"align="center"><strong>B1</strong></td> <?php } ?>
                    <?php if($lunch_position==6) { ?><td width="13%" rowspan="7"align="center"><strong>B2</strong></td> <?php } ?>
                    
                             <?php if($number_of_periods >= 7) { ?> <td width="10%"align="center"><strong>7 <br/> <?php print $peried_7s." To  <br>".$peried_7e; ?></strong></td><?php } ?>
                            
                            <?php if($break_position==7) { ?><td width="13%" rowspan="7"align="center"><strong>B1</strong></td> <?php } ?>
                            <?php if($lunch_position==7) { ?><td width="13%" rowspan="7"align="center"><strong>B2</strong></td> <?php } ?>
                    
                    
                                  <?php if($number_of_periods >= 8) { ?>   <td width="10%"align="center"><strong>8 <br/> <?php print $peried_8s." To  <br>".$peried_8e; ?></strong></td><?php } ?>
                                
                                <?php if($break_position==8) { ?><td width="13%" rowspan="7"align="center"><strong>B1</strong></td> <?php } ?>
                    <?php if($lunch_position==8) { ?><td width="13%" rowspan="7"align="center"><strong>B2</strong></td> <?php } ?>
                          <?php if($number_of_periods >= 9) { ?>
                                    <td width="10%"align="center"><strong>9 <br/>  <?php print $peried_9s." To  <br>".$peried_9e; ?></strong></td><?php } ?>
                  
                 
                  
                  </tr>
    <tr>
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
        <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_m4]; ?></td>
        <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_m5]; ?></td>
        <?php if($number_of_periods >= 6) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_m6]; ?></td><?php } ?>
        <?php if($number_of_periods >= 7) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_m7]; ?></td><?php } ?>
        <?php if($number_of_periods >= 8) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_m8]; ?></td><?php } ?>
        <?php if($number_of_periods >= 9) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_m9]; ?></td><?php } ?>
                    
    </tr>
    <tr>
        <td height="42" class="bgcolor_02" >&nbsp;&nbsp;<strong>Tue</strong></td>
        <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_t1]; ?></td>
        <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_t2]; ?></td>
        <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_t3]; ?></td>
        <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_t4]; ?></td>
        <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_t5]; ?></td>
        <?php if($number_of_periods >= 6) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_t6]; ?></td><?php } ?>
        <?php if($number_of_periods >= 7) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_t7]; ?></td><?php } ?>
        <?php if($number_of_periods >= 8) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_t8]; ?></td><?php } ?>
        <?php if($number_of_periods >= 9) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_t9]; ?></td><?php } ?>
    </tr>
    <tr>
        <td height="42" class="bgcolor_02" >&nbsp;&nbsp;<strong>Wed</strong></td>
        <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_w1]; ?></td>
        <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_w2]; ?></td>
        <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_w3]; ?></td>
        <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_w4]; ?></td>
        <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_w5]; ?></td>
        <?php if($number_of_periods >= 6) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_w6]; ?></td><?php } ?>
        <?php if($number_of_periods >= 7) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_w7]; ?></td><?php } ?>
        <?php if($number_of_periods >= 8) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_w8]; ?></td><?php } ?>
        <?php if($number_of_periods >= 9) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_w9]; ?></td><?php } ?>
    </tr>
    <tr>
        <td height="42" class="bgcolor_02" >&nbsp;&nbsp;<strong>Thurs</strong></td>
        <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_th1]; ?></td>
        <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_th2]; ?></td>
        <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_th3]; ?></td>
        <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_th4]; ?></td>
        <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_th5]; ?></td>
        <?php if($number_of_periods >= 6) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_th6]; ?></td><?php } ?>
        <?php if($number_of_periods >= 7) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_th7]; ?></td><?php } ?>
        <?php if($number_of_periods >= 8) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_th8]; ?></td><?php } ?>
        <?php if($number_of_periods >= 9) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_th9]; ?></td><?php } ?>
    </tr>
    <tr>
        <td height="42" class="bgcolor_02" >&nbsp;&nbsp;<strong>Fri</strong></td>
        <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_f1]; ?></td>
        <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_f2]; ?></td>
        <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_f3]; ?></td>
        <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_f4]; ?></td>
        <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_f5]; ?></td>
        <?php if($number_of_periods >= 6) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_f6]; ?></td><?php } ?>
        <?php if($number_of_periods >= 7) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_f7]; ?></td><?php } ?>
            <?php if($number_of_periods >= 8) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_f8]; ?></td><?php } ?>
        <?php if($number_of_periods >= 9) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_f9]; ?></td><?php } ?>
    </tr>
    <tr>
        <td height="42" class="bgcolor_02" >&nbsp;&nbsp;<strong>Sat</strong></td>
        <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_s1]; ?></td>
        <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_s2]; ?></td>
        <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_s3]; ?></td>
        <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_s4]; ?></td>
        <td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_s5]; ?></td>
        <?php if($number_of_periods >= 6) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_s6]; ?></td><?php } ?>
        <?php if($number_of_periods >= 7) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_s7]; ?></td><?php } ?>
        <?php if($number_of_periods >= 8) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_s8]; ?></td><?php } ?>
        <?php if($number_of_periods >= 9) { ?><td align="center" class="narmal"><?php echo $subject_array[$timetabledetails[0]->es_s9]; ?></td><?php } ?>
    </tr>
    </table>	 
    </td>
      </tr>
	   <tr align="center">
                    <td align="center" valign="top" > 	
                     
                      <p class="narmal">
  <?php 
 
  if(isset($es_class) && $es_class!=''){ ?>
 
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
                          <td class="narmal" align="center"><?php echo $subject_array[$eachrecord->es_subject];?></td>
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
     <tr>
       <td width="35%" class="narmal" align="right">&nbsp;</td>
     </tr> 
    </table>
        </td>
        <td class="bgcolor_02" width="1"/></td>
	</tr>
    
    
	  
	<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>
</table>
<?php
						
	}
 }
 ?>