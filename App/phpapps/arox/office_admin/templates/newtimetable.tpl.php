<table width="100%" border="0"  cellspacing="0" cellpadding="0">
	
	<tr class="bgcolor_02">
		<td height="25" colspan="3">&nbsp;&nbsp;Time Table</td>
	</tr>		
	<tr>
		<td width="1px"  class="bgcolor_02"></td>
		<td align="center" width='100%'><br>
		<?php 
		if($action=='addtmimes')
		{
		?>
		<form name='' action='' method='post' >
		<table align='center' width='90%' cellpadding="3" border="0">
		<tr class="bgcolor_02">
		<td width="30%" align="center">Period</td>
		<td width="70%" align="center">Duration
		</td>
		</tr>
		<tr>
		<td align="center"><strong>I</strong></td>
		<td align="center">
		From:&nbsp;
		<input type='text' name="f1"  value='<?=$_POST['f1']?>' size='5'/>
		&nbsp;&nbsp;&nbsp;To:&nbsp;&nbsp;
		<input type='text' name="t1"  value='<?=$_POST['t1']?>' size='5'/>
		</td></tr>
		<tr>
		<td align="center"><strong>II</strong></td>
		<td align="center">From:&nbsp;
          <input type='text' name="f2"  value='<?=$_POST['f2']?>' size='5'/>
&nbsp;&nbsp;&nbsp;To:&nbsp;&nbsp;
<input type='text' name="t2"  value='<?=$_POST['t2']?>' size='5'/></td></tr>
		<tr>
		  <td align="center"><strong>III</strong></td>
		  <td align="center">From:&nbsp;
            <input type='text' name="f3"  value='<?=$_POST['f3']?>' size='5'/>
&nbsp;&nbsp;&nbsp;To:&nbsp;&nbsp;
<input type='text' name="t3"  value='<?=$_POST['t3']?>' size='5'/></td>
		  </tr>
		<tr>
		  <td align="center"><strong>IV</strong></td>
		  <td align="center">From:&nbsp;
            <input type='text' name="f4"  value='<?=$_POST['f4']?>' size='5'/>
&nbsp;&nbsp;&nbsp;To:&nbsp;&nbsp;
<input type='text' name="t4"  value='<?=$_POST['t4']?>' size='5'/></td>
		  </tr>
		<tr>
		  <td align="center"><strong>Break(V)</strong></td>
		  <td align="center">From:&nbsp;
            <input type='text' name="f5"  value='<?=$_POST['f5']?>' size='5'/>
&nbsp;&nbsp;&nbsp;To:&nbsp;&nbsp;
<input type='text' name="t5"  value='<?=$_POST['t5']?>' size='5'/></td>
		  </tr>
		<tr>
		  <td align="center"><strong>VI</strong></td>
		  <td align="center">From:&nbsp;
            <input type='text' name="f6"  value='<?=$_POST['f6']?>' size='5'/>
&nbsp;&nbsp;&nbsp;To:&nbsp;&nbsp;
<input type='text' name="t6"  value='<?=$_POST['t6']?>' size='5'/></td>
		  </tr>
		<tr>
		  <td align="center"><strong>VII</strong></td>
		  <td align="center">From:&nbsp;
            <input type='text' name="f7"  value='<?=$_POST['f7']?>' size='5'/>
&nbsp;&nbsp;&nbsp;To:&nbsp;&nbsp;
<input type='text' name="t7"  value='<?=$_POST['t7']?>' size='5'/></td>
		  </tr>
		<tr>
		  <td align="center"><strong>VIII</strong></td>
		  <td align="center">From:&nbsp;
            <input type='text' name="f8"  value='<?=$_POST['f8']?>' size='5'/>
&nbsp;&nbsp;&nbsp;To:&nbsp;&nbsp;
<input type='text' name="t8"  value='<?=$_POST['t8']?>' size='5'/></td>
	     </tr>
		   <td>&nbsp;</td>
		  <td><input type='submit' name='submit_time' value='Submit' class='bgcolor_02'/></td>
		  </tr>
		</table>
		</form>
		<?php } ?>
		<?php if($action=='timetable'){?>
		<form name='' action='' method='post'>
		<table width="100%" cellspacing="0" cellpadding="2px" border="1" class='tbl_grid'>
		<tr class="bgcolor_02"> 
		<td align="left">CLASS<br>PERIOD</td>
		<?php
		for($i=1;$i<=8;$i++)
		{
		?>
		<td align="center">
		<?php if($i==5){
		echo "BREAK<br>".$durations[$i];
		}
		else
		{
		echo $i."<br>".$durations[$i];
		}
		?>
		</td>
		<?php }
		?>
		</tr>
		<?php 
		if(is_array($class_array))
		{
		foreach($class_array as $each_class)
		
		{?>
		<tr>
		<td> <strong><?php echo $each_class['es_classname'];?></strong></td>
		<?php
		for($i=1;$i<=8;$i++)
		{
		?>
		<td align="center">
		<?php if($i!=5){?>
		<select name='subject_selected[<?=$each_class['es_classesid']?>][<?=$i?>]' style="width:100px;">
		<option value=''>Subject</option>
		<?php 
		foreach($subject[$each_class['es_classesid']] as $k=>$v)
		{
		?>
		<option value='<?=$k?>' <?php if($k==$subject_selected[$each_class['es_classesid']][$i]){?> selected="selected"<?php }?>><?=$v?></option>
		<?php } ?>
		</select><br>
		<select name='staff_selected[<?=$each_class['es_classesid']?>][<?=$i?>]' style="width:100px;">
		<option value=''>Teacher</option>
		<?php 
		foreach($staff_array as $each_staff)
		{
		?>
		<option value='<?=$each_staff['es_staffid'];?>' <?php if($each_staff['es_staffid']==$staff_selected[$each_class['es_classesid']][$i]){?> selected="selected"<?php }?>><?=$each_staff['st_firstname']?>&nbsp;<?=$each_staff['st_lastname']?></option>
		<?php } ?>
		</select>
		
		<?php
		}?>
		</td>
		<?php }
		?>
		</tr>
		<?php } ?>
		<tr>
		  <td><strong>Free&nbsp;Staff</strong></td> 
		  <?php for($i=1;$i<=8;$i++){?>
		<td>
		<?php if($i!=5){
		if(count($final_free_staff[$i])>0)
		{
		foreach($final_free_staff[$i] as $k)
		{
		echo ucfirst($k).'<br/>';
		
		}}else {
		
		foreach($staff_name as $k)
		{
		echo ucfirst($k).'<br/>';
		
		}
		 }?>
		</td>
		
		<?php } ?>
		<?php } ?>
		</tr>
		<tr><td colspan='9' align="center" style='padding:3px;' ><input type='submit' name='submit_time_table' value='Submit' class='bgcolor_02' />&nbsp;&nbsp;&nbsp;
		<input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=104&action=print_time_table',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  />
		</td> </tr>
		<?php }?>
		
		</table>
		</form>
		
		<?php } ?>
		
		<?php if($action=='print_time_table'){?>
		
		
		<table width="100%" cellspacing="0" cellpadding="2px" border="1" class='tbl_grid'>
		<tr class="bgcolor_02"> 
		<td>CLASS<br>PERIOD</td>
		<?php
		for($i=1;$i<=8;$i++)
		{
		
		
		?>
		<td align="center">
		<?php if($i==5){
		echo "BREAK<br>".$durations[$i];
		}
		else
		{
		echo $i."<br>".$durations[$i];
		}
		?>
		</td>
		<?php 
		
		}
		?>
		</tr>
		<?php 
		if(is_array($class_array))
		{
		foreach($class_array as $each_class)
		
		{?>
		<tr>
		<td> <?php echo $each_class['es_classname'];?></td>
		<?php
		for($i=1;$i<=8;$i++)
		{
		?>
		<td align="center" width='10%'>
		<?php if($i!=5){
		echo $subject_name[$subject_selected[$each_class['es_classesid']][$i]].'<br>';
		echo $staff_name[$staff_selected[$each_class['es_classesid']][$i]]; ?>
		
		
		<?php }
		?>
		</td>
		
		<?php } ?> 
		</tr>
		<?php }
		
		}
		?>
		
		</table>
		
		
		<?php } ?>
        
        <?php if($action=='staff_wise' || $action=='print_staff'){
        if($action!='print_staff'){?>
		<form action='' name='' method='post'>
        <table width="100%" align="center">
        <tr><td align="center" valign="top">
        <select name='staff_id' >
        <option value="">Select</option>
        <?php
		if(is_array($staff_name))
		{
		foreach($staff_name as $k=>$v)
		{?>
        <option value="<?php echo $k; ?>" <?php if($k==$staff_id){?> selected="selected"<?php } ?>><?php echo $v; ?></option>
        <?php } } ?>
        </select>&nbsp;&nbsp;<input type="submit" value="Submit" name='staff_time' class='bgcolor_02'/>
        </td></tr>
        </table>
        </form>
        <?php } else{
        $staff_deta=get_staffdetails($staff_id);
        ?>
        <table width="100%">
        <tr><td width="71" class="adminfont">Staff&nbsp;ID</td>
			<td width="125" align="left"  class="naramal"><strong><?php echo $staff_id; ?></strong></td>
			<td width="74" class="adminfont" >Department:</td>
			<td width="267" align="left"  class="naramal" >&nbsp;&nbsp;&nbsp;<strong><?php echo deptname($staff_deta['st_department']);?></strong></td>
			<td width="92"><span class="admin">Post &nbsp;:&nbsp;</span></td>
			<td width="253"><strong><?php echo postname($staff_deta['st_post']); ?></strong></td>
		  <td width="109" class="adminfont">Staff&nbsp;Name&nbsp;:&nbsp;</td>
			<td width="185" align="left"  class="naramal"><strong><?php echo $staff_deta['st_firstname']."&nbsp;".$staff_deta['st_lastname']; ?></strong></td>
       	  </tr></table>
			<?php 

			}
			?>
	
        <?php if(isset($staff_id) && isset($staff_time) && $staff_id!='')
		{?>
		<table width="100%" cellspacing="0" cellpadding="2px" border="1" class='tbl_grid'>
		<tr class="bgcolor_02"> 
		<td>CLASS<br>PERIOD</td>
		<?php
		for($i=1;$i<=8;$i++)
		{
		
		
		?>
		<td align="center">
		<?php if($i==5){
		echo "BREAK<br>".$durations[$i];
		}
		else
		{
		echo $i."<br>".$durations[$i];
		}
		?>
		</td>
		<?php 
		
		}
		?>
		</tr>
		<?php 
		if(is_array($class_array))
		{
		foreach($class_array as $each_class)
		
		{?>
		<tr>
		<td align="center"> <?php echo $each_class['es_classname'];?></td>
		<?php
		for($i=1;$i<=8;$i++)
		{
		?>
		<td align="center" width='10%'>
		<?php if($i!=5){
		echo '<b>'.$subject_name[$subject_selected[$each_class['es_classesid']][$i]].'<br>';
		echo ucfirst($staff_name[$staff_selected[$each_class['es_classesid']][$i]]).'</b>'; ?>
		
		
		<?php }
		?>
		</td>
		
		<?php } ?> 
		</tr>
		<?php }
		if($action!='print_staff'){?>
		<tr><td colspan='9' align="center" style='padding:3px;' >
		<input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=104&action=print_staff&staff_id=<?php echo $staff_id; ?>&staff_time=<?php echo $staff_time; ?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  />
		</td> </tr>
		<?php
		}
        }
		?>
		
		</table>
		
		<?php } ?>
		<?php } ?>
		</td>
		
<td width="1px"  class="bgcolor_02"></td>
</tr>
<tr class="bgcolor_02">
		<td height="1" colspan="3"></td>
  </tr>
	</table>