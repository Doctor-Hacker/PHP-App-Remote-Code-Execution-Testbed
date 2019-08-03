<?php
/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
//echo $sss = base64_decode("Y2hhbmdl");
?>
<?php if($action == 'print') { ?>Academic Year: <?php echo func_date_conversion('Y-m-d','d-m-Y',$academic_det['fi_startdate']).' To '.func_date_conversion('Y-m-d','d-m-Y',$academic_det['fi_enddate']); } ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="3" colspan="3"></td>
</tr>
<tr>
<td height="25" colspan="3" class="bgcolor_02"><span class="admin">&nbsp;Stationary </span></td>
</tr>
<tr>
<td class="bgcolor_02" width="1px"></td>
<td>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
<td width="12%" align="left"><b>Student&nbsp;Name</b>&nbsp;:
&nbsp;<?php echo $stu_inf_res['pre_name']; ?>
<?php if($action == 'print') { ?>
<td width="11%" align="left"><strong>Reg.No</strong>:</td>
<td width="20%" align="left"><?php echo $_SESSION['student']; ?></td>
<td width="12%" align="left"><strong>Section</strong>:</td>
<td width="25%" align="left"><?php echo ucfirst($stu_inf_res['SECTION']); ?></td>
<?php } ?>
<td width="14%" align="right"><b>Class</b>&nbsp;:</td>
<td width="6%" align="left">&nbsp;<?php echo $stu_inf_res['CLASS']; ?></td>
</tr>
</table>
</td>
<td class="bgcolor_02" width="1px"></td>
</tr>
<tr>
<td class="bgcolor_02" width="1px"></td>
<td>
<form method="post" action="" enctype="multipart/form-data">
<table width="100%" cellpadding="5">
<tr class="bgcolor_02" height="25">
<td>S.No</td><td>Item</td><td>Quantity</td><td>Price</td><td>Total</td>
</tr>
<?php
$i=0;
if(is_array($_SESSION['quantity']))
{
foreach($_SESSION['quantity'] as $k=>$v)
{
$i++;
$class=($i%2==0)?'even':'odd';
?>
<tr class='<?php echo $class; ?>'>
<td><?php echo $i;?></td>
<td><?php echo $items_array[$k];?></td>
<td><?php echo $v;?></td>
<td><?php echo $_SESSION['each_cost'][$k];?></td>
<td><?php echo $_SESSION['total'][$k];?></td>
</tr>
<?php 
} 
?>
<tr class="bgcolor_02" ><td colspan="4" align="right"><strong>Grand Total</strong>:</td>
<td align="left" style="padding:5px;"><?php echo array_sum($_SESSION['total']); ?></td></tr>
<?php if($action!='print' && isset($_SESSION['quantity'])) {
?>
<tr><td colspan="5" align="right" style="padding:5px;"><input type="submit" name="Save" value="Save/Print" title="Save" alt="Save" class="bgcolor_02" />&nbsp;</td></tr><?php } ?>
<?php
}
?>
</table>
</form>
</td>
<td class="bgcolor_02" width="1px"></td>
</tr>
<tr>
<td class="bgcolor_02" height="1px" colspan="3"></td>
</tr>
</table>
<?php if(isset($emsg) && $emsg == 1) { ?>
<script type="text/javascript">
window.open('?pid=101&action=print',null, 'width=700,height=700,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');
<?php } ?>
</script>
<?php if($action == 'print') {
unset($_SESSION['quantity']);
unset($_SESSION['invoice_no']);
unset($_SESSION['student']);
unset($_SESSION['total']);
} ?>
