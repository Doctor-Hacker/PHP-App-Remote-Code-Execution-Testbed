<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>
<?php
if($action=='print')
{
$from = substr($academicyear,0,10);
	    $to = substr($academicyear,10,20);
$from = func_date_conversion("Y-m-d","d/m/Y",substr($academicyear,0,10));
	$to   = func_date_conversion("Y-m-d","d/m/Y",substr($academicyear,10,20));
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td colspan="3" class="bgcolor_02" height="25">&nbsp;&nbsp;RANKS&nbsp;</td></tr>
<tr><td class="bgcolor_02" width="1"></td><td>
<table width="100%" border="0" cellspacing="0" cellpadding="5">
              <tr>
         <td height="25" align='left'>
		<strong> CLASS&nbsp;:&nbsp;</strong><?php echo classname($classid);?>
		 
		 </td>
		 <td height="10" align='center'>
		<strong> Academic&nbsp;Session&nbsp;:&nbsp;</strong><?php echo $from." TO ".$to; ?>
		 
		 </td>
		 <td height="10" align='right'>
		 <strong>Ate&nbsp;:&nbsp;</strong><?php echo date('d-m-Y');?>
		 
		 </td>
	 </tr>
 <tr>
	 <td colspan="3" width='100%' align="center">
	<table width="100%">
	<tr class="bgcolor_02"><td width="13%">Roll NO</td>
	<td width="10%">Reg No</td>
	<td width="30%">Name</td>
	<?php
	if(is_array($subject_array))
	{
	foreach($subject_array as $each_subject)
	{
	?>
	<td width="9%">
	<?php echo ucfirst($each_subject['es_subjectname']);?>	</td>
	<?php } } ?><td width="12%">Total</td>
	<td width="13%">%age</td>
	<td width="13%">Rank</td>
	</tr>
	
	<?php
if(is_array($exam_mark))
{
	if(is_array($array_student))
	{
	$i=0;
	foreach($array_student as $k=>$v)
	{
	$class='odd';
	if($i%2==0)
	{
	$class='even';
	}
	?>
	<tr class='<?php echo $class; ?>'>
	<td><?php echo $array_rool[$k]; ?></td><td><?php echo $k; ?></td>
	
	<td>
	<?php echo $v;?>
	</td>
	<?php
	if(is_array($subject_array))
	{
	foreach($subject_array as $each_subject)
	{
	
	?>
	<td>
	<?php
	if(is_array($each_get_array[$k]['get_marks']))
	{
	echo $each_get_array[$k]['get_marks'][$each_subject['es_subjectid']];
	}
	?>
	</td>
	
	<?php
	}
	}?>
	<td>
	<?php
	if(is_array($each_get_array[$k]))
	{
	//array_print($each_get_array[$k]['get_marks']);
	echo array_sum($each_get_array[$k]['get_marks']);
	}
	?>
	</td>
	<td>
	<?php
	if(is_array($each_subject_array) && is_array($each_get_array[$k]['get_marks']))
	{
	 $x=array_sum($each_get_array[$k]['get_marks'])/array_sum($each_subject_array[$k])*100;
	echo round($x,2).'%';
	}
	?>
	
	</td>
	<td>
	<?php
	if(is_array($each_get_array[$k]['get_marks'])&& is_array($results))
	{
	echo $results[array_sum($each_get_array[$k]['get_marks'])]+1;
	}
	?>
	</td>
	</tr>
	<?php
	
	
	
	$i++;
	}
	}
}	
?>
	
	
	</table>
	 </td> 
	 </tr>
	 </table>
	 </td><td class="bgcolor_02" width="1"></td></tr>
	 <tr><td colspan="3" height='1px' class="bgcolor_02"></td></tr></table>
<?php } 
else
{
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td colspan="3" class="bgcolor_02" height="25">&nbsp;&nbsp;RANKS&nbsp;</td></tr>
<tr><td class="bgcolor_02" width="1"></td><td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
	
	 <tr>
         <td  colspan="3" align='center' width="100%">
		 <form action='' method='post'>
		 CLASS&nbsp;&nbsp;:
		 <select name='classid'>
	 <option value=''> Select </option>
	 <?php
	 $class_array=$db->getRows('SELECT * FROM es_classes ORDER BY es_classesid');
	 if(is_array($class_array) && count($class_array)>0)
	 {
	 foreach($class_array as $each_class)
	 {
	 ?>
	 <option value='<?php echo $each_class['es_classesid'];?>' <?php if($classid==$each_class['es_classesid']){?> selected="selected"<?php }?>> <?php echo ucfirst($each_class['es_classname']); ?> </option>
	 <?php } }?>
	 </select>
		 <span class="style1">*</span>&nbsp;&nbsp;&nbsp;EXAM:&nbsp;&nbsp;
	 
	     <select name='exam_id'>
	 <option value=''> Select </option>
	 <?php
	 $exam_array=$db->getRows('SELECT * FROM es_exam ORDER BY es_examid');
	 if(is_array($exam_array) && count($exam_array)>0)
	 {
	 foreach($exam_array as $each_exam)
	 {
	 ?>
	 <option value='<?php echo $each_exam['es_examid'];?>' <?php if($exam_id==$each_exam['es_examid']){?> selected="selected"<?php }?>> <?php echo ucfirst($each_exam['es_examname']); ?> </option>
	 <?php } }?>
	 </select>
	     <span class="style1">*</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Academic&nbsp;Session&nbsp;:&nbsp;<select name="academicyear" style="width:190px;">
					 <option value="" >Select Year</option>
<?php 

	if(count($school_details_res)>0) {	
		foreach ($school_details_res as $school){
?>
		<option value="<?php echo $school['fi_ac_startdate'].$school['fi_ac_enddate']; ?>"   <?php echo ($school['fi_ac_startdate'].$school['fi_ac_enddate']==$academicyear)?"selected":""?> ><?php echo displaydate($school['fi_ac_startdate'])." To ".displaydate($school['fi_ac_enddate']); ?></option>
<?php
		}
	}
?>				</select>
	     <input type='submit' name='search_record' value="Submit" class='bgcolor_02'/>
		 </form>
		 </td>
	 </tr>
	 
	 <tr>
	 <td colspan="3" width='100%' align="center">
	<table width="100%">
	<tr class="bgcolor_02"><td width="13%">Roll NO</td>
	<td width="10%">Reg No</td>
	<td width="30%">Name</td>
	<?php
	if(is_array($subject_array))
	{
	foreach($subject_array as $each_subject)
	{
	?>
	<td width="9%">
	<?php echo ucfirst($each_subject['es_subjectname']);?>	</td>
	<?php } } ?><td width="12%">Total</td>
	<td width="13%">%age</td>
	<td width="13%">Rank</td>
	</tr>
	
	<?php
if(is_array($exam_mark))
{
	if(is_array($array_student))
	{
	$i=0;
	foreach($array_student as $k=>$v)
	{
	$class='odd';
	if($i%2==0)
	{
	$class='even';
	}
	?>
	<tr class='<?php echo $class; ?>'>
	<td><?php echo $array_rool[$k]; ?></td><td><?php echo $k; ?></td>
	
	<td>
	<?php echo $v;?>
	</td>
	<?php
	if(is_array($subject_array))
	{
	foreach($subject_array as $each_subject)
	{
	
	?>
	<td>
	<?php
	if(is_array($each_get_array[$k]['get_marks']))
	{
	echo $each_get_array[$k]['get_marks'][$each_subject['es_subjectid']];
	}
	?>
	</td>
	
	<?php
	}
	}?>
	<td>
	<?php
	if(is_array($each_get_array[$k]['get_marks']))
	{
	echo array_sum($each_get_array[$k]['get_marks']);
	}
	?>
	</td>
	<td>
	<?php
	if(is_array($each_subject_array) && is_array($each_get_array[$k]['get_marks']))
	{
	$round=array_sum($each_get_array[$k]['get_marks'])/array_sum($each_subject_array[$k])*100;
	echo round($round,2).'%';
	}
	?>
	
	</td>
	<td>
	<?php
	
	if(is_array($each_get_array[$k]['get_marks'])&& is_array($results))
	{
	echo $results[array_sum($each_get_array[$k]['get_marks'])]+1;
	}
	?>
	</td>
	</tr>
	<?php
	$i++;
	}
	}
}	
?>
<?php 
if(count($student_marks)>0)
{?>
	<tr>
	<td colspan="<?php echo count($subject_array)+6; ?>" align="right" style="padding:10px;">
	<input name="submit" type="button" onclick="newWindowOpen('?pid=100&action=print<?php echo $pageurl; ?>');" class="bgcolor_02" value="Print" style="cursor:pointer;"/>
	</td>
	</tr>
	<?php } ?>
	</table>
	 </td> 
	 </tr>
	 </table>
	 </td><td class="bgcolor_02" width="1"></td></tr>
	 <tr><td colspan="3" height='1px' class="bgcolor_02"></td></tr></table>
<?php } ?>

<script type="text/javascript">
function newWindowOpen(href)
{
    window.open(href,null, 'width=700,height=700,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');
}
</script>