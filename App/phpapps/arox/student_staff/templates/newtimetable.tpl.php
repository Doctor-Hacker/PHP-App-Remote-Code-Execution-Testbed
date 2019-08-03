<table width="100%" border="0"  cellspacing="0" cellpadding="0">
	
	<tr class="bgcolor_02">
		<td height="25" colspan="3">&nbsp;&nbsp;Time Table</td>
	</tr>		
	<tr>
		<td width="1px"  class="bgcolor_02"></td>
		<td align="center" width='100%'><br>
	<?php if($action=='time_table' || $action=='print_time_table'){?>
		
		
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
		{
		if($_SESSION['eschools']['login_type']=='student' && $student_class==$each_class['es_classesid']){?>
		<tr style="background-color: #CCCCCC; color:#FF0000; font-weight:bold;">
		<?php }else{?>
		<tr>
		<?php } ?>
		<td> <?php echo $each_class['es_classname'];?></td>
		<?php
		for($i=1;$i<=8;$i++)
		{
		?>
		<td align="center" width='10%'>
		<?php if($i!=5){
		if($_SESSION['eschools']['user_id']==$staff_selected[$each_class['es_classesid']][$i] && $_SESSION['eschools']['login_type']=='staff')
		{
		?>
		<b style="color:#FF0000;">
		<?php
		}
		echo $subject_name[$subject_selected[$each_class['es_classesid']][$i]].'<br>';
		echo $staff_name[$staff_selected[$each_class['es_classesid']][$i]]; 
		if($_SESSION['eschools']['user_id']==$staff_selected[$each_class['es_classesid']][$i])
		{
		echo '</b>';
		}?>
		
		<?php }
		?>
		</td>
		
		<?php } ?> 
		</tr>
		<?php }
		
		}
		?>
		<?php if($action!='print_time_table'){?>
		<tr><td colspan='9' align="center" style='padding:3px;' >
		<input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=50&action=print_time_table',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  />
		</td> </tr>
		<?php } ?>
		</table>
		
		
		<?php } ?>
		</td>
		
<td width="1px"  class="bgcolor_02"></td>
</tr>
<tr class="bgcolor_02">
		<td height="1" colspan="3"></td>
	</tr>
	</table>