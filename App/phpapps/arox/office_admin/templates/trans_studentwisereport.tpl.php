
<?php
if($action=="studentreport"){
?>			
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="3" colspan="3"></td>
</tr>
<tr>
<td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Student Wise Report</strong></td>
</tr>
<tr>
<td width="1" class="bgcolor_02" ></td>
<td align="left" height="4" ></td>
<td width="1" class="bgcolor_02" ></td>
</tr>
<tr>
<td width="1" class="bgcolor_02"></td>
<td align="left" valign="top">

				
<table width="100%" border="0">
  <tr>
<td align="right"><?php if (in_array("14_19", $admin_permissions)) {?>
<?php 
$url='';
if(isset($es_classesid) && $es_classesid != ''){
$url.="&es_classesid=".$es_classesid;
}
/*if(isset($section_id) && $section_id != ''){
$url.="&section_id=".$section_id;
}*/
?>
<a href="?pid=88&action=exportreport<?php echo $url; ?>" class="bgcolor_02" style="padding:2px; text-decoration:none;">Export List</a>
<?php }?></td>
  </tr>
  <tr>
    <td><form action="" method="post">
	<table width="100%" border="0">
  <tr>
  <td width="5%" align="left" valign="middle">Class</td>
    <td width="22%" align="left" valign="middle"><select name="es_classesid">
						<option value="">Select Class</option>
						<?php
						$class_sql = "SELECT * FROM es_classes ORDER BY es_classesid ASC";
						$class_exe = mysql_query($class_sql);
						while($class_row = mysql_fetch_array($class_exe)){
						?>
						<option value="<?php echo $class_row['es_classesid']; ?>" <?php if( $class_row['es_classesid']==$_POST['es_classesid'] ){?>selected="selected"<?php }?>><?php echo $class_row['es_classname']; ?></option>
						<?php }?>
						
			    </select></td>
    <td width="6%" align="left" valign="middle"><?php /*?>Section<?php */?></td>
    <td width="27%" align="left" valign="middle"><?php /*?><select name="section_id">
						<option value="">Select Section</option>
						<?php
						$sect_sql = "SELECT * FROM es_sections";
						$sect_exe = mysql_query($sect_sql);
						while($sect_row = mysql_fetch_array($sect_exe)){
						?>
						<option value="<?php echo $sect_row['section_id']; ?>" <?php if($sect_row['section_id']==$_POST['section_id'] ){?>selected="selected"<?php }?>><?php echo $sect_row['section_name']; ?></option>
						<?php }?>
						
			    </select><?php */?></td>
    <td width="7%" align="left" valign="middle">&nbsp;</td>
    <td width="17%" align="left" valign="middle">&nbsp;</td>
    <td width="16%" align="left" valign="middle"><input type="submit" name="search_staff" value="Search" class="bgcolor_02" style="cursor:pointer;" /></td>
  </tr>
</table></form></td>
  </tr>
  <tr>
    <td>
	<table width="100%" border="0" cellpadding="1" cellspacing="1" bordercolor="#CCCCCC">
	<tr>
	<td colspan="9">
	<table width="100%" border="0" cellpadding="1" cellspacing="1" bordercolor="#CCCCCC" >
  <tr>
    <td width="1%" align="left" class="narmal">&nbsp;</td>
    <td width="6%" align="left" class="narmal"><strong>Class</strong></td>
    <td width="1%" align="left" class="narmal"><strong>:</strong></td>
    <td width="9%" align="left" class="narmal">
	<?php echo $res['es_classname'];  ?></td>
    <td width="5%" align="left" class="narmal"><strong><?php /*?>Section<?php */?></strong></td>
    <td width="1%" align="left" class="narmal"><strong><?php /*?>:<?php */?></strong></td>
    <td width="14%" align="left" class="narmal">
<?php /*?>	<?php echo ucfirst($sect_res['section_name']); ?><?php */?></td>
    <td width="13%" align="left" class="narmal"><strong>Academic&nbsp;Session</strong></td>
    <td width="1%" align="left" class="narmal"><strong>:</strong></td>
    <td width="24%" align="left" class="narmal">
	<?php echo func_date_conversion('Y-m-d','d-m-Y',$finance_res['fi_startdate']).' To '.func_date_conversion('Y-m-d','d-m-Y',$finance_res['fi_enddate']);
	?>	</td>
    <td width="12%" align="left" class="narmal"><strong>Class&nbsp;Incharge</strong></td>
    <td width="0%" align="left" class="narmal"><strong>:</strong></td>
    <td width="13%" align="left" class="narmal"><?php echo ucfirst($incharge_res['st_firstname']).'&nbsp;'.$incharge_res['st_lastname']; ?></td>
  </tr>
</table>

	</tr>
	
				  <tr  class="bgcolor_02">
					<td width="5%" height="23" align="center"><strong>Roll No </strong></td>
					<td width="8%" height="23" align="center"><strong>Reg.No</strong></td>
					<td width="16%" align="center"><strong>Name<br />
					</strong></td>
					<td width="15%" align="center"><strong>Father Name </strong></td>   
					<td width="15%" align="center"><strong>Route</strong></td>
                    <td width="13%" align="center"><strong>Mobile No </strong></td>
                    <td width="13%" align="center"><strong>Board</strong></td>
                    <td width="5%" align="center"><strong>Vehicle No </strong></td>
                    <td width="10%" align="center"><strong>TPT Fee </strong></td>
				  </tr>
				  <?php if(count($query_row) > 0 ){ ?>
				  <?php	
				   
                  			
					$rw = 1;
					$slno = $start+1;
					$total_amount=0;
					foreach ($query_row as $query)
						 {  
						 
							if($rw%2==0)
								$rowclass = "even";
								else
								$rowclass = "odd";
					   $query2="SELECT * FROM es_sections_student WHERE student_id = '". $query['es_preadmissionid']."' ";
					$result2=mysql_query($query2);
					$row2=mysql_fetch_array($result2);
					
               ?>
				  <tr class="<?php echo $rowclass;?>">
					<td align="center"><?php echo $row2['roll_no'];?></td>
					<td align="center"><?php echo $query['es_preadmissionid']; ?></td>
					<td align="center"><?php echo $query['pre_name']; ?></td>
					<td align="center"><?php echo $query['pre_fathername']; ?></td>				
					<td align="center"><?php
					  $board_sql = "SELECT * FROM es_translist WHERE id=".$query['route_Via']." AND status='Active'";
				  $board_row =$db->getRow($board_sql);
					 echo $board_row['route_title']; ?><br />(<?php echo $query['route_title']; ?>)</td>
                    <td align="center"><?php echo $query['pre_mobile1']; ?></td>
                    <td align="center"><?php  echo $query['board_title'];?></td>
                    <td align="center"><?php echo $query['tr_vehicle_no']; ?></td>
                    <td align="center"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format( $query['amount'], 2, '.', ''); ?></td>
				  </tr>
				  <?php
				  $total_amount+=$query['amount'];           
				  $rw++;
				  $slno++;	   
				  } ?>
				   <tr>
					<td colspan="6" align="center"></td>
					<td colspan="2" align="right"> <strong>TPT Fee Total</strong></td>
					<td align="center"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format( $total_amount, 2, '.', ''); ?></td>
				  </tr>
				  <tr>
					<td colspan="9" align="center"><?php paginateexte($start, $q_limit, $query1_num, "action=".$action.$page_URL ) ?>    </td>
				  </tr>
				  <?php } 
											
							  else {
							   echo "<tr>";
							   echo "<td align='center' class='narmal' colspan='7'>No records found</td>";
							   echo "</tr>";
						} 
										
										
										
				  ?>
				</table></td>
  </tr>
</table>

</td>
<td width="1" class="bgcolor_02"></td>
</tr>
<tr>
<td height="1" colspan="3" class="bgcolor_02"></td>
</tr>
<tr>
<td height="1" colspan="3" align="right"><br />
<?php 
$url='';
if(isset($es_classesid) && $es_classesid != ''){
$url.="&es_classesid=".$es_classesid;
}
/*if(isset($section_id) && $section_id != ''){
$url.="&section_id=".$section_id;
}*/
?>
<input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=88&action=print_student_wise<?php echo $url; ?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  />
</td>
</tr>
</table>
<?php }?>
<?php 
// This is for Printing purpose of Students Report
if($action == 'print_student_wise') { ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="3" colspan="3"></td>
</tr>
<tr>
<td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;Transport Availing Students</strong></td>
</tr>
<tr>
<td width="1" class="bgcolor_02" ></td>
<td align="left" height="4" ></td>
<td width="1" class="bgcolor_02" ></td>
</tr>
<tr>
<td width="1" class="bgcolor_02"></td>
<td align="left" valign="top">

				
<table width="100%" border="0">
  
  <tr>
    <td>
	<table width="100%" border="0" cellpadding="1" cellspacing="1" bordercolor="#CCCCCC">
	<tr>
	<td colspan="9">
	<table width="100%" border="0" cellpadding="1" cellspacing="1" bordercolor="#CCCCCC" >
  <tr>
    <td width="1%" align="left" class="narmal">&nbsp;</td>
    <td width="6%" align="left" class="narmal"><strong>Class</strong></td>
    <td width="1%" align="left" class="narmal"><strong>:</strong></td>
    <td width="4%" align="left" class="narmal">
	<?php echo $res['es_classname'];  ?></td>
    <td width="6%" align="left" class="narmal"><strong><?php /*?>Section<?php */?></strong></td>
    <td width="1%" align="left" class="narmal"><strong><?php /*?>:<?php */?></strong></td>
    <td width="14%" align="left" class="narmal">
	<?php /*?><?php echo ucfirst($sect_res['section_name']); ?><?php */?></td>
    <td width="10%" align="left" class="narmal"><strong>Academic&nbsp;Session</strong></td>
    <td width="1%" align="left" class="narmal"><strong>:</strong></td>
    <td width="37%" align="left" class="narmal">
	<?php echo func_date_conversion('Y-m-d','d-m-Y',$finance_res['fi_startdate']).' To '.func_date_conversion('Y-m-d','d-m-Y',$finance_res['fi_enddate']);
	?>	</td>
    <td width="8%" align="left" class="narmal"><strong>Class&nbsp;Incharge</strong></td>
    <td width="1%" align="left" class="narmal"><strong>:</strong></td>
    <td width="10%" align="left" class="narmal"><?php echo ucfirst($incharge_res['st_firstname']).'&nbsp;'.$incharge_res['st_lastname']; ?></td>
  </tr>
</table>

	</tr>
	
				  <tr  class="bgcolor_02">
					<td width="5%" height="23" align="center"><strong>Roll No </strong></td>
					<td width="8%" height="23" align="center"><strong>Reg.No</strong></td>
					<td width="16%" align="center"><strong>Name<br />
					</strong></td>
					<td width="15%" align="center"><strong>Father Name </strong></td>   
					<td width="15%" align="center"><strong>Route</strong></td>
                    <td width="13%" align="center"><strong>Mobile No </strong></td>
                    <td width="13%" align="center"><strong>Board
                    </strong></td>
                    <td width="5%" align="center"><strong>Vehicle No </strong></td>
                    <td width="10%" align="center"><strong>TPT Fee </strong></td>
				  </tr>
				  <?php if(count($query_row) > 0 ){ ?>
				  <?php						
					$rw = 1;
					$slno = $start+1;
					$total_amount=0;
					foreach ($query_row as $query)
						 {  
							if($rw%2==0)
								$rowclass = "even";
								else
								$rowclass = "odd";
								$query2="SELECT * FROM es_sections_student WHERE student_id = '". $query['es_preadmissionid']."' ";
					$result2=mysql_query($query2);
					$row2=mysql_fetch_array($result2);
					?>
				  <tr class="<?php echo $rowclass;?>">
					<td align="center"><?php echo  $row2['roll_no'];?></td>
					<td align="center"><?php echo $query['es_preadmissionid']; ?></td>
					<td align="center"><?php echo $query['pre_name']; ?></td>
					<td align="center"><?php echo $query['pre_fathername']; ?></td>				
					<td align="center"><?php
					  $board_sql = "SELECT * FROM es_translist WHERE id=".$query['route_Via']." AND status='Active'";
				  $board_row =$db->getRow($board_sql);
					 echo $board_row['route_title']; ?><br />(<?php echo $query['route_title']; ?>)</td>
                    <td align="center"><?php echo $query['pre_mobile1']; ?></td>
                    <td align="center"><?php  echo $query['board_title'];?></td>
                    <td align="center"><?php echo $query['tr_vehicle_no']; ?></td>
                    <td align="center"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format( $query['amount'], 2, '.', ''); ?></td>
				  </tr>
				  <?php
				  $total_amount+=$query['amount'];           
				  $rw++;
				  $slno++;	   
				  } ?>
				   <tr>
					<td colspan="6" align="center"></td>
					<td colspan="2" align="right"> <strong>TPT Fee Total</strong></td>
					<td align="center"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format( $total_amount, 2, '.', ''); ?></td>
				  </tr>
				  
				  <?php } 
											
							  else {
							   echo "<tr>";
							   echo "<td align='center' class='narmal' colspan='7'>No records found</td>";
							   echo "</tr>";
						} 
										
										
										
				  ?>
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
<?php } ?>

<?php 
//This is for Drivers Copy
if($action == 'driver_copy'){ ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="3" colspan="3"></td>
</tr>
<tr>
<td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Student Wise Report(Driver Copy)</strong></td>
</tr>
<tr>
<td width="1" class="bgcolor_02" ></td>
<td align="left" height="4" ></td>
<td width="1" class="bgcolor_02" ></td>
</tr>
<tr>
<td width="1" class="bgcolor_02"></td>
<td align="left" valign="top">

				
<table width="100%" border="0">
  <tr>
<td align="right"><?php if (in_array("14_19", $admin_permissions)) {?>
<?php 
$url='';
if(isset($es_staffid) && $es_staffid != ''){
$url.="&es_staffid=".$es_staffid;
}
if(isset($routes_id) && $routes_id != ''){
$url.="&routes_id=".$routes_id;
}
?>
<a href="?pid=88&action=exportdriver_report<?php echo $url; ?>" class="bgcolor_02" style="padding:2px; text-decoration:none;">Export List</a>
<?php }?></td>
  </tr>
  <tr>
    <td><form action="" method="post">
	<table width="100%" border="0">
  <tr>
  <td width="5%" align="left" valign="middle">Board</td>
    <td width="22%" align="left" valign="middle"><select name="routes_id">
						<option value="">Select Board</option>
						<?php
						$route_sql = "SELECT * FROM es_trans_route ORDER BY id ASC";
						$route_exe = mysql_query($route_sql);
						
						
						
						while($route_row = mysql_fetch_array($route_exe)){
						$route_sql1 = "SELECT * FROM es_trans_board where id=".$route_row['id'];
						$route_exe1= $db->getRow($route_sql1);
						
						?>
						<option value="<?php echo $route_exe1['id']; ?>" <?php if( $route_exe1['id']==$_POST['routes_id'] ){?>selected="selected"<?php }?>><?php echo $route_row['route_title']; ?>(<?php echo $route_exe1['board_title']; ?>)</option>
						<?php }?>
						
			    </select></td>
    <td width="6%" align="left" valign="middle">Driver</td>
    <td width="27%" align="left" valign="middle"><select name="es_staffid">
						<option value="">Select Section</option>
						<?php
						$driver_sql = "SELECT ES.es_staffid, ES.st_firstname, ES.st_lastname  FROM es_trans_driver_details ETDD, es_staff ES WHERE ES.es_staffid=ETDD.driver_id ";
						$driver_exe = mysql_query($driver_sql);
						while($driver_row = mysql_fetch_array($driver_exe)){
						?>
						<option value="<?php echo $driver_row['es_staffid']; ?>" <?php if($driver_row['es_staffid']==$_POST['es_staffid'] ){?>selected="selected"<?php }?>><?php echo $driver_row['st_firstname'].$driver_row['st_lastname']; ?></option>
						<?php }?>
						
			    </select></td>
    <td width="7%" align="left" valign="middle">&nbsp;</td>
    <td width="17%" align="left" valign="middle">&nbsp;</td>
    <td width="16%" align="left" valign="middle"><input type="submit" name="search_staff" value="Search" class="bgcolor_02" style="cursor:pointer;" /></td>
  </tr>
</table></form></td>
  </tr>
  <tr>
    <td>
	<table width="100%" border="0" cellpadding="1" cellspacing="1" bordercolor="#CCCCCC">
	<tr>
	<td colspan="9">
	<table width="100%" border="0" cellpadding="1" cellspacing="1" bordercolor="#CCCCCC" >
  <tr>
    <td width="6%" align="left" class="narmal"><strong>Board</strong></td>
    <td width="1%" align="left" class="narmal"><strong>:</strong></td>
    <td width="26%" align="left" class="narmal">
	<?php
	if($routes_id!=''){
	$routes_sql1="SELECT * FROM es_trans_board WHERE id=".$routes_id;
$routes_res1=$db->getRow($routes_sql1);

	$online_sql="select * from es_trans_route where id=".$routes_res1['route_id'];
 $online_row=$db->getRow($online_sql);
?>(<?php echo ($online_row['route_title']); ?>)<?php

	echo ($routes_res['board_title']);}  ?></td>
    <td width="6%" align="left" class="narmal"><strong>Vehicle&nbsp;No</strong></td>
    <td width="1%" align="left" class="narmal"><strong>:</strong></td>
    <td width="6%" align="left" class="narmal">
	<?php echo ucfirst($bus_res['tr_vehicle_no']); ?></td>
    <td width="10%" align="left" class="narmal"><strong>Driver</strong></td>
    <td width="1%" align="left" class="narmal"><strong>:</strong></td>
    <td width="8%" align="left" class="narmal"><?php echo ucfirst($driver_res['st_firstname']).$driver_res['st_lastname']; ?></td>
    <td width="10%" align="left" class="narmal"><strong>Academic&nbsp;Session</strong></td>
    <td width="1%" align="left" class="narmal">:</td>
    <td width="24%" align="left" class="narmal"><?php echo func_date_conversion('Y-m-d','d-m-Y',$finance_res['fi_startdate']).' To '.func_date_conversion('Y-m-d','d-m-Y',$finance_res['fi_enddate']);
	?></td>
    </tr>
</table>	</tr>
	
				  <tr  class="bgcolor_02">
					
					<td width="8%" height="23" align="center"><strong>Reg.No</strong></td>
					<td width="18%" align="center"><strong>Name<br />
					</strong></td>
					<td width="17%" align="center"><strong>Father Name </strong></td>   
					<td width="14%" align="center"><strong>From<br />(Place)</strong></td>
                    <td width="13%" align="center"><strong>Mobile No </strong></td>
                    <td width="10%" align="center"><strong>TPT Fee </strong></td>
                    <td colspan="3" align="center"><strong>Photo</strong></td>
                  </tr>
				  <?php if(count($query_row) > 0 ){ ?>
				  <?php						
					$rw = 1;
					$slno = $start+1;
					$total_amount=0;
					foreach ($query_row as $query)
						 {  
							if($rw%2==0)
								$rowclass = "even";
								else
								$rowclass = "odd";
					?>
				  <tr class="<?php echo $rowclass;?>">
				
					<td align="center"><?php echo $query['es_preadmissionid']; ?></td>
					<td align="center"><?php echo $query['pre_name']; ?></td>
					<td align="center"><?php echo $query['pre_fathername']; ?></td>				
					<td align="center"><?php
					 $board_sql = "SELECT * FROM es_translist WHERE id=".$query['route_Via']." AND status='Active'";
				  $board_row =$db->getRow($board_sql);
					 echo $board_row['route_title'];
					  ?>(<?php echo $query['route_title']; ?>)(<?php echo $query['board_title'];?>)</td>
                    <td align="center"><?php echo $query['pre_mobile1']; ?></td>
                    <td align="center"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format( $query['amount'], 2, '.', ''); ?></td>
                    <td colspan="3" align="center"><img src="images/student_photos/<?php echo $query['pre_image']; ?>" width="50" height="50" border="0"/ alt="Student"></td>
                  </tr>
				  <?php
				  $total_amount+=$query['amount'];           
				  $rw++;
				  $slno++;	   
				  } ?>
				   <tr>
					<td colspan="6" align="right"><strong>TPT&nbsp;Fee&nbsp;Total</strong></td>
					<td colspan="3" align="left"> <?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format( $total_amount, 2, '.', ''); ?></td>
					
				  </tr>
				  <tr>
					<td colspan="9" align="center"><?php paginateexte($start, $q_limit, $query1_num, "action=".$action.$page_URL ) ?>    </td>
				  </tr>
				  <?php } 
											
							  else {
							   echo "<tr>";
							   echo "<td align='center' class='narmal' colspan='7'>No records found</td>";
							   echo "</tr>";
						} 
										
										
										
				  ?>
				</table></td>
  </tr>
</table>

</td>
<td width="1" class="bgcolor_02"></td>
</tr>
<tr>
<td height="1" colspan="3" class="bgcolor_02"></td>
</tr>
<tr>
<td height="1" colspan="3" align="right"><br />
<?php 
$url='';
if(isset($es_staffid) && $es_staffid != ''){
$url.="&es_staffid=".$es_staffid;
}
if(isset($routes_id) && $routes_id != ''){
$url.="&routes_id=".$routes_id;
}
?>
<input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=88&action=print_driver_report<?php echo $url; ?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  />
</td>
</tr>
</table>
<?php } ?>
<?php if($action == 'print_driver_report') { ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="3" colspan="3"></td>
</tr>
<tr>
<td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Student Wise Report(Driver Copy)</strong></td>
</tr>
<tr>
<td width="1" class="bgcolor_02" ></td>
<td align="left" height="4" ></td>
<td width="1" class="bgcolor_02" ></td>
</tr>
<tr>
<td width="1" class="bgcolor_02"></td>
<td align="left" valign="top">

				
<table width="100%" border="0">
  
  <tr>
    <td><form action="" method="post">
	<table width="100%" border="0">
  
</table></form></td>
  </tr>
  <tr>
    <td>
	<table width="100%" border="0" cellpadding="1" cellspacing="1" bordercolor="#CCCCCC">
	<tr>
	<td colspan="9">
	<table width="100%" border="0" cellpadding="1" cellspacing="1" bordercolor="#CCCCCC" >
  <tr>
    <td width="6%" align="left" class="narmal"><strong>Board</strong></td>
    <td width="1%" align="left" class="narmal"><strong>:</strong></td>
    <td width="5%" align="left" class="narmal">
	<?php echo $routes_res['board_title'];  ?></td>
    <td width="6%" align="left" class="narmal"><strong>Vehicle&nbsp;No</strong></td>
    <td width="1%" align="left" class="narmal"><strong>:</strong></td>
    <td width="14%" align="left" class="narmal">
	<?php echo ucfirst($bus_res['tr_vehicle_no']); ?></td>
    <td width="5%" align="left" class="narmal"><strong>Driver</strong></td>
    <td width="1%" align="left" class="narmal"><strong>:</strong></td>
    <td width="12%" align="left" class="narmal"><?php echo ucfirst($driver_res['st_firstname']).$driver_res['st_lastname']; ?></td>
    <td width="14%" align="left" class="narmal"><strong>Academic&nbsp;Session</strong></td>
    <td width="1%" align="left" class="narmal">:</td>
    <td width="34%" align="left" class="narmal"><?php echo func_date_conversion('Y-m-d','d-m-Y',$finance_res['fi_startdate']).' To '.func_date_conversion('Y-m-d','d-m-Y',$finance_res['fi_enddate']);
	?></td>
    </tr>
</table>	</tr>
	
				  <tr  class="bgcolor_02">
				
					<td width="8%" height="23" align="center"><strong>Reg.No</strong></td>
					<td width="18%" align="center"><strong>Name<br />
					</strong></td>
					<td width="17%" align="center"><strong>Father Name </strong></td>   
					<td width="14%" align="center"><strong>From<br />(Place)</strong></td>
                    <td width="13%" align="center"><strong>Mobile No </strong></td>
                    <td width="10%" align="center"><strong>TPT Fee </strong></td>
                    <td colspan="2" align="center"><strong>Photo</strong></td>
                  </tr>
				  <?php if(count($query_row) > 0 ){ ?>
				  <?php						
					$rw = 1;
					$slno = $start+1;
					$total_amount=0;
					foreach ($query_row as $query)
						 {  
							if($rw%2==0)
								$rowclass = "even";
								else
								$rowclass = "odd";
					?>
				  <tr class="<?php echo $rowclass;?>">
				
					<td align="center"><?php echo $query['es_preadmissionid']; ?></td>
					<td align="center"><?php echo $query['pre_name']; ?></td>
					<td align="center"><?php echo $query['pre_fathername']; ?></td>				
					<td align="center"><?php
					  $board_sql = "SELECT * FROM es_translist WHERE id=".$query['route_Via']." AND status='Active'";
				  $board_row =$db->getRow($board_sql);
					 echo $board_row['route_title'];
					 ?><br />
				    (<?php echo $query['route_title']; ?>)</td>
                    <td align="center"><?php echo $query['pre_mobile1']; ?></td>
                    <td align="center"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format( $query['amount'], 2, '.', ''); ?></td>
                    <td colspan="2" align="center"><img src="images/student_photos/<?php echo $query['pre_image']; ?>" width="50" height="50" border="0"/ alt="Student"></td>
                  </tr>
				  <?php
				  $total_amount+=$query['amount'];           
				  $rw++;
				  $slno++;	   
				  } ?>
				   <tr>
					<td colspan="5" align="right"><strong>TPT&nbsp;Fee&nbsp;Total</strong></td>
					<td colspan="2" align="left"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format( $total_amount, 2, '.', ''); ?></td>
					<td width="10%" align="center"></td>
				  </tr>
				  
				  <?php } 
											
							  else {
							   echo "<tr>";
							   echo "<td align='center' class='narmal' colspan='7'>No records found</td>";
							   echo "</tr>";
						} 
										
										
										
				  ?>
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
<?php } ?>