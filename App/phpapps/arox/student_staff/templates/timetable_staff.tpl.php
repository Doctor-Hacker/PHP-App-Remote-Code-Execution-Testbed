<?php 
/*
*Start of Time Table Web Page
*/	
if ($action == 'timetable') { ?>
<script language="javascript">
	function goto_URL(object)
	{
	
	window.location.href = object.options[object.selectedIndex].value;
	}
	</script>
<table width="100%" border="0"  cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
	 </tr>
	<tr class="bgcolor_02">
		<td height="25" colspan="3">&nbsp;Staff Time Table</td>
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
			<tr>
			<td colspan="2">
			<form method="post" name="form1" id="form1">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="15%" align="left" class="narmal">Department:</td>
                        <td width="26%" align="left" class="narmal">
						<select name="txt_post" onchange="goto_URL(this.form.txt_post);" style="width:120px;">
                          <option value="">-Select-</option>
                          <?php foreach($getdeptlist as $eachrecord) { ?>
                          <option value="?pid=45&action=timetable&st_department=<?php echo $eachrecord[es_departmentsid];?>"<?php echo ($eachrecord[es_departmentsid]==$st_department)?"selected":""?>><?php echo $eachrecord[es_deptname];?></option>
                          <?php } ?>
                        </select></td>
                        <td width="4%" align="left"><span class="narmal">Post:</span></td>
                                            
                        <td width="39%" align="left"><select name="txt_deptname" style="width:180px;">
                          <option value="" >Select</option>
                          <?php if(count($es_postList) > 0 ){
					   foreach ($es_postList as $eachrecord){ ?>
                          <option value="<?php echo $eachrecord->es_deptpostsId;?>" <?php echo ($eachrecord->es_deptpostsId==$txt_deptname)?"selected":""?>  ><?php echo $eachrecord->es_postname;?></option>
                          <?php    } }?>
                        </select></td>
                        <td width="16%" align="left" class="narmal"><input name="selectionserch" type="submit" class="bgcolor_02" value="Search" style="cursor:pointer;" /></td>
						
                      </tr>
					  <tr><td>&nbsp;</td></tr>
					  <tr><td>&nbsp;</td></tr>
                    </table>
					</form>
			</td>
			</tr>
				<tr class="bgcolor_02">
					<td align="left" height="20">&nbsp;Staff Timetable</td>
				  <td align="center" >Action</td>
				</tr>
<?php
	
	///$classlist = getallClasses();
	foreach($getstafflist as $eachstaff) {		
?>
			<tr class="bgclor_02">
				<td align="left">&nbsp;<?php echo $eachstaff[st_firstname]." ".$eachstaff[st_lastname]; ?></td>
			  <td align="center" style="padding:20">
              	   
<script type="text/JavaScript">
function timetable<?php print $eachstaff['es_staffid']; ?>view()
    {		
	MyWin="?pid=45&action=viewtimetable&es_class=<?php print $eachstaff['es_staffid']; ?>"; 
	winpopup=window.open(MyWin,'popup<?php print $eachstaff['es_staffid']; ?>','height=501,width=888,menubar=no,scrollbars=yes,status=no,toolbar=no,sereenX=100,screenY=0,left=100,top=0,class=text');	
	winpopup.moveTo(111,25);
	}
</script>				
						<a title="View" href="javascript:timetable<?php print $eachstaff['es_staffid']; ?>view();"><img src="images/b_browse.png" width="16" height="16" border="0" /></a>
					</td>
				</tr>

	<?php } ?>	
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
*Start of View Table Web Page
*/
if($action == 'viewtimetable') { ?>
<form action="" method="post" name="edittimetable">
<table border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
	 </tr>
	<tr>
		<td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;Time Table for 
		<?php
        $staff_query_sql = "SELECT `es_staffid`,`st_firstname`,`st_lastname` FROM `es_staff` WHERE teach_nonteach='teaching' AND status='added' AND selstatus='accepted' AND tcstatus='notissued' AND es_staffid=".$es_class;
		$staff_query_exe = mysql_query($staff_query_sql);
		$staff_query_row = mysql_fetch_array($staff_query_exe);
		echo $staff_query_row['st_firstname']." ".$staff_query_row['st_lastname'];
		//echo classname($es_class);
		?>
        </strong>
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
					
                    <td width="15%" align="left" class="narmal" valign="right"></td>
                  </tr> 
			
				  
                  <tr>
                    <td colspan="5" align="left" valign="top">
					
					
					<table width="100%" border="0" cellspacing="4" cellpadding="0">
                  <tr>
                    <td align="left" valign="top"></td>
                  </tr>
				  
 <?php if(isset($es_class) && $es_class!=""){ ?>
                  <tr>
                    <td height="25" align="left" valign="middle">
					
					
				  
					
					<table width="100%" height="300" border="1" cellpadding="0" cellspacing="0">
                      <tr  class="bgcolor_02">
                        <td width="6%" align="center"><?php $ttimage = str_replace("css", "", $_SESSION['eschools']['user_theme']);?><img src="images/tt_<?php echo $ttimage;?>jpg" border="0"></td>
                        <td width="8%" height="23" align="center"><strong>1
					    </strong></td>
						 
			
						
                        <td width="10%"align="center"><strong>2</strong></td>
						
				
						  
                          <td width="8%" align="center"><strong>3</strong></td>
						  
					
						
                        <td width="9%" align="center"><strong>4</strong></td>
						
					
						
                        <td width="10%"align="center"><strong>5</strong></td>
						
						
								
						    <td width="9%"align="center"><strong>6</strong></td>
							
						
							
							    <td width="9%"align="center"><strong>7</strong></td>
							
						
						
							
								    <td width="10%"align="center"><strong>8</strong></td>
							
									
									
						
								
										<td width="9%"align="center"><strong>9</strong></td>
									
                      </tr>
					  
                      <tr >
                        <td height="42" class="bgcolor_02" >&nbsp;&nbsp;<strong>Mon</strong></td>
                        <td align="center" class="narmal">
						<?php
						 $query_sql="SELECT TM.es_class FROM es_timetable T,es_timetablemaster TM,es_staff S WHERE 
						
						S.es_staffid=TM.es_staffid AND T.es_m1=TM.es_subject AND TM.es_staffid=".$es_class;
						
						$query_row =$db->getRows($query_sql);
						print $classes_array[$query_row[0][es_class]];
						//array_print($query_row);						
						?>
                        </td>
                        <td align="center" class="narmal">
						<?php
						$query_sql="SELECT TM.es_class FROM es_timetable T,es_timetablemaster TM,es_staff S WHERE 
						
						S.es_staffid=TM.es_staffid AND T.es_m2=TM.es_subject AND TM.es_staffid=".$es_class;
						
						$query_row =$db->getRows($query_sql);
						print $classes_array[$query_row[0][es_class]];
						//array_print($query_row);						
						?></td>
					   
                        <td align="center" class="narmal">
                        <?php
						$query_sql="SELECT TM.es_class FROM es_timetable T,es_timetablemaster TM,es_staff S WHERE 
						
						S.es_staffid=TM.es_staffid AND T.es_m3=TM.es_subject AND TM.es_staffid=".$es_class;
						
						$query_row =$db->getRows($query_sql);
						print $classes_array[$query_row[0][es_class]];
						//array_print($query_row);						
						?>
                        </td>
                        <td align="center" class="narmal"><?php
						$query_sql="SELECT TM.es_class FROM es_timetable T,es_timetablemaster TM,es_staff S WHERE 
						
						S.es_staffid=TM.es_staffid AND T.es_m4=TM.es_subject AND TM.es_staffid=".$es_class;
						
						$query_row =$db->getRows($query_sql);
						print $classes_array[$query_row[0][es_class]];
						//array_print($query_row);						
						?></td>
                        <td align="center" class="narmal"><?php
						$query_sql="SELECT TM.es_class FROM es_timetable T,es_timetablemaster TM,es_staff S WHERE 
						
						S.es_staffid=TM.es_staffid AND T.es_m5=TM.es_subject AND TM.es_staffid=".$es_class;
						
						$query_row =$db->getRows($query_sql);
						print $classes_array[$query_row[0][es_class]];
						//array_print($query_row);						
						?></td>
						  
                         <td align="center" class="narmal"><?php
						$query_sql="SELECT TM.es_class FROM es_timetable T,es_timetablemaster TM,es_staff S WHERE 
						
						S.es_staffid=TM.es_staffid AND T.es_m6=TM.es_subject AND TM.es_staffid=".$es_class;
						
						$query_row =$db->getRows($query_sql);
						print $classes_array[$query_row[0][es_class]];
						//array_print($query_row);						
						?></td>
						<td align="center" class="narmal"><?php
						$query_sql="SELECT TM.es_class FROM es_timetable T,es_timetablemaster TM,es_staff S WHERE 
						
						S.es_staffid=TM.es_staffid AND T.es_m7=TM.es_subject AND TM.es_staffid=".$es_class;
						
						$query_row =$db->getRows($query_sql);
						print $classes_array[$query_row[0][es_class]];
						//array_print($query_row);						
						?></td>
		                <td align="center" class="narmal"><?php
						$query_sql="SELECT TM.es_class FROM es_timetable T,es_timetablemaster TM,es_staff S WHERE 
						
						S.es_staffid=TM.es_staffid AND T.es_m8=TM.es_subject AND TM.es_staffid=".$es_class;
						
						$query_row =$db->getRows($query_sql);
						print $classes_array[$query_row[0][es_class]];
						//array_print($query_row);						
						?></td>
						<td align="center" class="narmal"><?php
						$query_sql="SELECT TM.es_class FROM es_timetable T,es_timetablemaster TM,es_staff S WHERE 
						
						S.es_staffid=TM.es_staffid AND T.es_m9=TM.es_subject AND TM.es_staffid=".$es_class;
						
						$query_row =$db->getRows($query_sql);
						print $classes_array[$query_row[0][es_class]];
						//array_print($query_row);						
						?></td>
                      </tr>
                      <tr>
                        <td height="42" class="bgcolor_02" >&nbsp;&nbsp;<strong>Tue</strong></td>
                        <td align="center" class="narmal"><?php
						$query_sql="SELECT TM.es_class FROM es_timetable T,es_timetablemaster TM,es_staff S WHERE 
						
						S.es_staffid=TM.es_staffid AND T.es_t1=TM.es_subject AND TM.es_staffid=".$es_class;
						
						$query_row =$db->getRows($query_sql);
						print $classes_array[$query_row[0][es_class]];
						//array_print($query_row);						
						?></td>
                        <td align="center" class="narmal"><?php
						$query_sql="SELECT TM.es_class FROM es_timetable T,es_timetablemaster TM,es_staff S WHERE 
						
						S.es_staffid=TM.es_staffid AND T.es_t2=TM.es_subject AND TM.es_staffid=".$es_class;
						
						$query_row =$db->getRows($query_sql);
						print $classes_array[$query_row[0][es_class]];
						//array_print($query_row);						
						?></td>
						   
                        <td align="center" class="narmal"><?php
						$query_sql="SELECT TM.es_class FROM es_timetable T,es_timetablemaster TM,es_staff S WHERE 
						
						S.es_staffid=TM.es_staffid AND T.es_t3=TM.es_subject AND TM.es_staffid=".$es_class;
						
						$query_row =$db->getRows($query_sql);
						print $classes_array[$query_row[0][es_class]];
						//array_print($query_row);						
						?></td>
                        <td align="center" class="narmal"><?php
						$query_sql="SELECT TM.es_class FROM es_timetable T,es_timetablemaster TM,es_staff S WHERE 
						
						S.es_staffid=TM.es_staffid AND T.es_t4=TM.es_subject AND TM.es_staffid=".$es_class;
						
						$query_row =$db->getRows($query_sql);
						print $classes_array[$query_row[0][es_class]];
						//array_print($query_row);						
						?></td>
                        <td align="center" class="narmal"><?php
						$query_sql="SELECT TM.es_class FROM es_timetable T,es_timetablemaster TM,es_staff S WHERE 
						
						S.es_staffid=TM.es_staffid AND T.es_t5=TM.es_subject AND TM.es_staffid=".$es_class;
						
						$query_row =$db->getRows($query_sql);
						print $classes_array[$query_row[0][es_class]];
						//array_print($query_row);						
						?></td>
						   
                        <td align="center" class="narmal"><?php
						$query_sql="SELECT TM.es_class FROM es_timetable T,es_timetablemaster TM,es_staff S WHERE 
						
						S.es_staffid=TM.es_staffid AND T.es_t6=TM.es_subject AND TM.es_staffid=".$es_class;
						
						$query_row =$db->getRows($query_sql);
						print $classes_array[$query_row[0][es_class]];
						//array_print($query_row);						
						?></td>
						<td align="center" class="narmal"><?php
						$query_sql="SELECT TM.es_class FROM es_timetable T,es_timetablemaster TM,es_staff S WHERE 
						
						S.es_staffid=TM.es_staffid AND T.es_t7=TM.es_subject AND TM.es_staffid=".$es_class;
						
						$query_row =$db->getRows($query_sql);
						print $classes_array[$query_row[0][es_class]];
						//array_print($query_row);						
						?></td>
		                <td align="center" class="narmal"><?php
						$query_sql="SELECT TM.es_class FROM es_timetable T,es_timetablemaster TM,es_staff S WHERE 
						
						S.es_staffid=TM.es_staffid AND T.es_t8=TM.es_subject AND TM.es_staffid=".$es_class;
						
						$query_row =$db->getRows($query_sql);
						print $classes_array[$query_row[0][es_class]];
						//array_print($query_row);						
						?></td>
						<td align="center" class="narmal"><?php
						$query_sql="SELECT TM.es_class FROM es_timetable T,es_timetablemaster TM,es_staff S WHERE 
						
						S.es_staffid=TM.es_staffid AND T.es_t9=TM.es_subject AND TM.es_staffid=".$es_class;
						
						$query_row =$db->getRows($query_sql);
						print $classes_array[$query_row[0][es_class]];
						//array_print($query_row);						
						?></td>
                      </tr>
                      <tr>
                        <td height="42" class="bgcolor_02" >&nbsp;&nbsp;<strong>Wed</strong></td>
                        <td align="center" class="narmal"><?php
						$query_sql="SELECT TM.es_class FROM es_timetable T,es_timetablemaster TM,es_staff S WHERE 
						
						S.es_staffid=TM.es_staffid AND T.es_w1=TM.es_subject AND TM.es_staffid=".$es_class;
						
						$query_row =$db->getRows($query_sql);
						print $classes_array[$query_row[0][es_class]];
						//array_print($query_row);						
						?></td>
                        <td align="center" class="narmal"><?php
						$query_sql="SELECT TM.es_class FROM es_timetable T,es_timetablemaster TM,es_staff S WHERE 
						
						S.es_staffid=TM.es_staffid AND T.es_w2=TM.es_subject AND TM.es_staffid=".$es_class;
						
						$query_row =$db->getRows($query_sql);
						print $classes_array[$query_row[0][es_class]];
						//array_print($query_row);						
						?></td>
						     
                        <td align="center" class="narmal"><?php
						$query_sql="SELECT TM.es_class FROM es_timetable T,es_timetablemaster TM,es_staff S WHERE 
						
						S.es_staffid=TM.es_staffid AND T.es_w3=TM.es_subject AND TM.es_staffid=".$es_class;
						
						$query_row =$db->getRows($query_sql);
						print $classes_array[$query_row[0][es_class]];
						//array_print($query_row);						
						?></td>
                        <td align="center" class="narmal"><?php
						$query_sql="SELECT TM.es_class FROM es_timetable T,es_timetablemaster TM,es_staff S WHERE 
						
						S.es_staffid=TM.es_staffid AND T.es_w4=TM.es_subject AND TM.es_staffid=".$es_class;
						
						$query_row =$db->getRows($query_sql);
						print $classes_array[$query_row[0][es_class]];
						//array_print($query_row);						
						?></td>
                        <td align="center" class="narmal"><?php
						$query_sql="SELECT TM.es_class FROM es_timetable T,es_timetablemaster TM,es_staff S WHERE 
						
						S.es_staffid=TM.es_staffid AND T.es_w5=TM.es_subject AND TM.es_staffid=".$es_class;
						
						$query_row =$db->getRows($query_sql);
						print $classes_array[$query_row[0][es_class]];
						//array_print($query_row);						
						?></td>
						   
                        <td align="center" class="narmal"><?php
						$query_sql="SELECT TM.es_class FROM es_timetable T,es_timetablemaster TM,es_staff S WHERE 
						
						S.es_staffid=TM.es_staffid AND T.es_w6=TM.es_subject AND TM.es_staffid=".$es_class;
						
						$query_row =$db->getRows($query_sql);
						print $classes_array[$query_row[0][es_class]];
						//array_print($query_row);						
						?></td>
						<td align="center" class="narmal"><?php
						$query_sql="SELECT TM.es_class FROM es_timetable T,es_timetablemaster TM,es_staff S WHERE 
						
						S.es_staffid=TM.es_staffid AND T.es_w7=TM.es_subject AND TM.es_staffid=".$es_class;
						
						$query_row =$db->getRows($query_sql);
						print $classes_array[$query_row[0][es_class]];
						//array_print($query_row);						
						?></td>
		                <td align="center" class="narmal"><?php
						$query_sql="SELECT TM.es_class FROM es_timetable T,es_timetablemaster TM,es_staff S WHERE 
						
						S.es_staffid=TM.es_staffid AND T.es_w8=TM.es_subject AND TM.es_staffid=".$es_class;
						
						$query_row =$db->getRows($query_sql);
						print $classes_array[$query_row[0][es_class]];
						//array_print($query_row);						
						?></td>
						<td align="center" class="narmal"><?php
						$query_sql="SELECT TM.es_class FROM es_timetable T,es_timetablemaster TM,es_staff S WHERE 
						
						S.es_staffid=TM.es_staffid AND T.es_w9=TM.es_subject AND TM.es_staffid=".$es_class;
						
						$query_row =$db->getRows($query_sql);
						print $classes_array[$query_row[0][es_class]];
						//array_print($query_row);						
						?></td>
                      </tr>
                      <tr>
                           <td height="42" class="bgcolor_02" >&nbsp;&nbsp;<strong>Thurs</strong></td>
                        <td align="center" class="narmal"><?php
						$query_sql="SELECT TM.es_class FROM es_timetable T,es_timetablemaster TM,es_staff S WHERE 
						
						S.es_staffid=TM.es_staffid AND T.es_th1=TM.es_subject AND TM.es_staffid=".$es_class;
						
						$query_row =$db->getRows($query_sql);
						print $classes_array[$query_row[0][es_class]];
						//array_print($query_row);						
						?></td>
                        <td align="center" class="narmal"><?php
						$query_sql="SELECT TM.es_class FROM es_timetable T,es_timetablemaster TM,es_staff S WHERE 
						
						S.es_staffid=TM.es_staffid AND T.es_th2=TM.es_subject AND TM.es_staffid=".$es_class;
						
						$query_row =$db->getRows($query_sql);
						print $classes_array[$query_row[0][es_class]];
						//array_print($query_row);						
						?></td>
						
                        <td align="center" class="narmal"><?php
						$query_sql="SELECT TM.es_class FROM es_timetable T,es_timetablemaster TM,es_staff S WHERE 
						
						S.es_staffid=TM.es_staffid AND T.es_th3=TM.es_subject AND TM.es_staffid=".$es_class;
						
						$query_row =$db->getRows($query_sql);
						print $classes_array[$query_row[0][es_class]];
						//array_print($query_row);						
						?></td>
                        <td align="center" class="narmal"><?php
						$query_sql="SELECT TM.es_class FROM es_timetable T,es_timetablemaster TM,es_staff S WHERE 
						
						S.es_staffid=TM.es_staffid AND T.es_th4=TM.es_subject AND TM.es_staffid=".$es_class;
						
						$query_row =$db->getRows($query_sql);
						print $classes_array[$query_row[0][es_class]];
						//array_print($query_row);						
						?></td>
                        <td align="center" class="narmal"><?php
						$query_sql="SELECT TM.es_class FROM es_timetable T,es_timetablemaster TM,es_staff S WHERE 
						
						S.es_staffid=TM.es_staffid AND T.es_th5=TM.es_subject AND TM.es_staffid=".$es_class;
						
						$query_row =$db->getRows($query_sql);
						print $classes_array[$query_row[0][es_class]];
						//array_print($query_row);						
						?></td>
						   
                        <td align="center" class="narmal"><?php
						$query_sql="SELECT TM.es_class FROM es_timetable T,es_timetablemaster TM,es_staff S WHERE 
						
						S.es_staffid=TM.es_staffid AND T.es_th6=TM.es_subject AND TM.es_staffid=".$es_class;
						
						$query_row =$db->getRows($query_sql);
						print $classes_array[$query_row[0][es_class]];
						//array_print($query_row);						
						?></td>
						<td align="center" class="narmal"><?php
						$query_sql="SELECT TM.es_class FROM es_timetable T,es_timetablemaster TM,es_staff S WHERE 
						
						S.es_staffid=TM.es_staffid AND T.es_th7=TM.es_subject AND TM.es_staffid=".$es_class;
						
						$query_row =$db->getRows($query_sql);
						print $classes_array[$query_row[0][es_class]];
						//array_print($query_row);						
						?></td>
		                <td align="center" class="narmal"><?php
						$query_sql="SELECT TM.es_class FROM es_timetable T,es_timetablemaster TM,es_staff S WHERE 
						
						S.es_staffid=TM.es_staffid AND T.es_th8=TM.es_subject AND TM.es_staffid=".$es_class;
						
						$query_row =$db->getRows($query_sql);
						print $classes_array[$query_row[0][es_class]];
						//array_print($query_row);						
						?></td> 
						<td align="center" class="narmal"><?php
						$query_sql="SELECT TM.es_class FROM es_timetable T,es_timetablemaster TM,es_staff S WHERE 
						
						S.es_staffid=TM.es_staffid AND T.es_th9=TM.es_subject AND TM.es_staffid=".$es_class;
						
						$query_row =$db->getRows($query_sql);
						print $classes_array[$query_row[0][es_class]];
						//array_print($query_row);						
						?></td>
                      </tr>
                      <tr>
                          <td height="42" class="bgcolor_02" >&nbsp;&nbsp;<strong>Fri</strong></td>
                        <td align="center" class="narmal"><?php
						$query_sql="SELECT TM.es_class FROM es_timetable T,es_timetablemaster TM,es_staff S WHERE 
						
						S.es_staffid=TM.es_staffid AND T.es_f1=TM.es_subject AND TM.es_staffid=".$es_class;
						
						$query_row =$db->getRows($query_sql);
						print $classes_array[$query_row[0][es_class]];
						//array_print($query_row);						
						?></td>
                        <td align="center" class="narmal"><?php
						$query_sql="SELECT TM.es_class FROM es_timetable T,es_timetablemaster TM,es_staff S WHERE 
						
						S.es_staffid=TM.es_staffid AND T.es_f2=TM.es_subject AND TM.es_staffid=".$es_class;
						
						$query_row =$db->getRows($query_sql);
						print $classes_array[$query_row[0][es_class]];
						//array_print($query_row);						
						?></td>
						
                        <td align="center" class="narmal"><?php
						$query_sql="SELECT TM.es_class FROM es_timetable T,es_timetablemaster TM,es_staff S WHERE 
						
						S.es_staffid=TM.es_staffid AND T.es_f3=TM.es_subject AND TM.es_staffid=".$es_class;
						
						$query_row =$db->getRows($query_sql);
						print $classes_array[$query_row[0][es_class]];
						//array_print($query_row);						
						?></td>
                        <td align="center" class="narmal"><?php
						$query_sql="SELECT TM.es_class FROM es_timetable T,es_timetablemaster TM,es_staff S WHERE 
						
						S.es_staffid=TM.es_staffid AND T.es_f4=TM.es_subject AND TM.es_staffid=".$es_class;
						
						$query_row =$db->getRows($query_sql);
						print $classes_array[$query_row[0][es_class]];
						//array_print($query_row);						
						?></td>
                        <td align="center" class="narmal"><?php
						$query_sql="SELECT TM.es_class FROM es_timetable T,es_timetablemaster TM,es_staff S WHERE 
						
						S.es_staffid=TM.es_staffid AND T.es_f5=TM.es_subject AND TM.es_staffid=".$es_class;
						
						$query_row =$db->getRows($query_sql);
						print $classes_array[$query_row[0][es_class]];
						//array_print($query_row);						
						?></td>
						  
                        <td align="center" class="narmal"><?php
						$query_sql="SELECT TM.es_class FROM es_timetable T,es_timetablemaster TM,es_staff S WHERE 
						
						S.es_staffid=TM.es_staffid AND T.es_f6=TM.es_subject AND TM.es_staffid=".$es_class;
						
						$query_row =$db->getRows($query_sql);
						print $classes_array[$query_row[0][es_class]];
						//array_print($query_row);						
						?></td>
						<td align="center" class="narmal"><?php
						$query_sql="SELECT TM.es_class FROM es_timetable T,es_timetablemaster TM,es_staff S WHERE 
						
						S.es_staffid=TM.es_staffid AND T.es_f7=TM.es_subject AND TM.es_staffid=".$es_class;
						
						$query_row =$db->getRows($query_sql);
						print $classes_array[$query_row[0][es_class]];
						//array_print($query_row);						
						?></td>
		                <td align="center" class="narmal"><?php
						$query_sql="SELECT TM.es_class FROM es_timetable T,es_timetablemaster TM,es_staff S WHERE 
						
						S.es_staffid=TM.es_staffid AND T.es_f8=TM.es_subject AND TM.es_staffid=".$es_class;
						
						$query_row =$db->getRows($query_sql);
						print $classes_array[$query_row[0][es_class]];
						//array_print($query_row);						
						?></td>
						<td align="center" class="narmal"><?php
						$query_sql="SELECT TM.es_class FROM es_timetable T,es_timetablemaster TM,es_staff S WHERE 
						
						S.es_staffid=TM.es_staffid AND T.es_f9=TM.es_subject AND TM.es_staffid=".$es_class;
						
						$query_row =$db->getRows($query_sql);
						print $classes_array[$query_row[0][es_class]];
						//array_print($query_row);						
						?></td>
                      </tr>
                      <tr>
                        <td height="42" class="bgcolor_02" >&nbsp;&nbsp;<strong>Sat</strong></td>
                        <td align="center" class="narmal"><?php
						$query_sql="SELECT TM.es_class FROM es_timetable T,es_timetablemaster TM,es_staff S WHERE 
						
						S.es_staffid=TM.es_staffid AND T.es_s1=TM.es_subject AND TM.es_staffid=".$es_class;
						
						$query_row =$db->getRows($query_sql);
						print $classes_array[$query_row[0][es_class]];
						//array_print($query_row);						
						?></td>
                        <td align="center" class="narmal"><?php
						$query_sql="SELECT TM.es_class FROM es_timetable T,es_timetablemaster TM,es_staff S WHERE 
						
						S.es_staffid=TM.es_staffid AND T.es_s2=TM.es_subject AND TM.es_staffid=".$es_class;
						
						$query_row =$db->getRows($query_sql);
						print $classes_array[$query_row[0][es_class]];
						//array_print($query_row);						
						?></td>
						   
                        <td align="center" class="narmal"><?php
						$query_sql="SELECT TM.es_class FROM es_timetable T,es_timetablemaster TM,es_staff S WHERE 
						
						S.es_staffid=TM.es_staffid AND T.es_s3=TM.es_subject AND TM.es_staffid=".$es_class;
						
						$query_row =$db->getRows($query_sql);
						print $classes_array[$query_row[0][es_class]];
						//array_print($query_row);						
						?></td>
                        <td align="center" class="narmal"><?php
						$query_sql="SELECT TM.es_class FROM es_timetable T,es_timetablemaster TM,es_staff S WHERE 
						
						S.es_staffid=TM.es_staffid AND T.es_s4=TM.es_subject AND TM.es_staffid=".$es_class;
						
						$query_row =$db->getRows($query_sql);
						print $classes_array[$query_row[0][es_class]];
						//array_print($query_row);						
						?></td>
                        <td align="center" class="narmal"><?php
						$query_sql="SELECT TM.es_class FROM es_timetable T,es_timetablemaster TM,es_staff S WHERE 
						
						S.es_staffid=TM.es_staffid AND T.es_s5=TM.es_subject AND TM.es_staffid=".$es_class;
						
						$query_row =$db->getRows($query_sql);
						print $classes_array[$query_row[0][es_class]];
						//array_print($query_row);						
						?></td>
						   
                        <td align="center" class="narmal"><?php
						$query_sql="SELECT TM.es_class FROM es_timetable T,es_timetablemaster TM,es_staff S WHERE 
						
						S.es_staffid=TM.es_staffid AND T.es_s6=TM.es_subject AND TM.es_staffid=".$es_class;
						
						$query_row =$db->getRows($query_sql);
						print $classes_array[$query_row[0][es_class]];
						//array_print($query_row);						
						?></td>
						<td align="center" class="narmal"><?php
						$query_sql="SELECT TM.es_class FROM es_timetable T,es_timetablemaster TM,es_staff S WHERE 
						
						S.es_staffid=TM.es_staffid AND T.es_s7=TM.es_subject AND TM.es_staffid=".$es_class;
						
						$query_row =$db->getRows($query_sql);
						print $classes_array[$query_row[0][es_class]];
						//array_print($query_row);						
						?></td>
		                <td align="center" class="narmal"><?php
						$query_sql="SELECT TM.es_class FROM es_timetable T,es_timetablemaster TM,es_staff S WHERE 
						
						S.es_staffid=TM.es_staffid AND T.es_s8=TM.es_subject AND TM.es_staffid=".$es_class;
						
						$query_row =$db->getRows($query_sql);
						print $classes_array[$query_row[0][es_class]];
						//array_print($query_row);						
						?></td>
						<td align="center" class="narmal"><?php
						$query_sql="SELECT TM.es_class FROM es_timetable T,es_timetablemaster TM,es_staff S WHERE 
						
						S.es_staffid=TM.es_staffid AND T.es_s9=TM.es_subject AND TM.es_staffid=".$es_class;
						
						$query_row =$db->getRows($query_sql);
						print $classes_array[$query_row[0][es_class]];
						//array_print($query_row);						
						?></td>
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
<p align="center"><input type="button" id="printbutton" value="&nbsp;Print" onclick="return printing();" class="bgcolor_02"/></p>
</form>
<?php }?>
	
	