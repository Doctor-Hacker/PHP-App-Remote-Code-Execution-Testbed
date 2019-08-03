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
<script type="text/javascript">
/************ Checking Browsers ***********/
		function GetXmlHttpObject(handler)
		{
			var objXmlHttp=null
		
			if (navigator.userAgent.indexOf("Opera")>=0)
			{
				alert("This Site doesn't work in Opera")
				return
			}
			if (navigator.userAgent.indexOf("MSIE")>=0)
			{
				var strName="Msxml2.XMLHTTP"
				if (navigator.appVersion.indexOf("MSIE 5.5")>=0)
				{
					strName="Microsoft.XMLHTTP"
				}
				try
				{
					objXmlHttp=new ActiveXObject(strName)
					objXmlHttp.onreadystatechange=handler
					return objXmlHttp
				}
				catch(e)
				{
					alert("Error. Scripting for ActiveX might be disabled")
					return
				}
			}
			if (navigator.userAgent.indexOf("Mozilla")>=0)
			{
				objXmlHttp=new XMLHttpRequest()
				objXmlHttp.onload=handler
				objXmlHttp.onerror=handler
				return objXmlHttp
			}
		}

/** Completed checking Browser.. **/
/************ Get List of Districts ***********/
		function stdents_func(es_classesid,selval)
		{   
			url="?pid=55&action=inventory_reports&class_id="+es_classesid+"&selval="+selval;
			
			url=url+"&sid="+Math.random();
			xmlHttp=GetXmlHttpObject(classess);
			xmlHttp.open("GET", url, true);
			xmlHttp.send(null);
		}
		function classess()
		{
			if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
			{
				document.getElementById("students").innerHTML=xmlHttp.responseText
			}
		}
		
		
function stdents_info(student_id)
		{   
			url="?pid=55&action=students_information&stu_id="+student_id;
			
			url=url+"&sid="+Math.random();
			xmlHttp1=GetXmlHttpObject(classess1);
			xmlHttp1.open("GET", url, true);
			xmlHttp1.send(null);
		}
		function classess1()
		{
			if (xmlHttp1.readyState==4 || xmlHttp1.readyState=="complete")
			{
				document.getElementById("stu_inf").innerHTML=xmlHttp1.responseText
			}
		}

</script>
<form method="post" action="" enctype="multipart/form-data">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="3" colspan="5"></td>
</tr>
<tr>
<td height="25" colspan="5" class="bgcolor_02"><span class="admin">&nbsp;Stationary </span></td>
</tr>
<tr>
<td class="bgcolor_02" width="1px"></td>
<td valign="top" align="left" colspan="2" width="70%">
<table width="100%" border="0" cellpadding="0" cellspacing="1">
<tr>
<td width="40%" align="left">
<table border="0" cellpadding="0" cellspacing="0">
<?php 
for($i=0; $i < $category_count;){
?>
<tr>
<?php for($j=0; $j<2;$j++){ if($i < $category_count) { ?>
<td width="38%" valign="top">
<table border="0" cellpadding="1" cellspacing="0" width="250" height="120">
<tr>
<td width="250"  height="25" class="bgcolor_02" align="center" colspan="3"><?php echo $category_list[$i]['in_category_name']; ?></td>
</tr>
<tr valign="top">
<td class="bgcolor_02" width="1"></td>
<td align="left">
<table border="0" cellpadding="0" cellspacing="1" width="250" >
<tr>
<td width="37"><strong>Select</strong></td>
<td width="109"><strong>Item&nbsp;Name(Qty&nbsp;Avl)</strong></td>
<td width="80" align="center"><strong>Price</strong></td>
<td width="53" align="center"><strong>Pcs</strong></td>
</tr>
<?php 
$items_sql="SELECT es_in_item_masterid, in_item_name,cost,in_qty_available FROM es_in_item_master WHERE in_qty_available>0 AND status='active' AND in_category_id=".$category_list[$i]['es_in_categoryid'];
$item_res=$db->getRows($items_sql);
$items_count=count($item_res);
if($items_count == 0){ ?>
<tr>
<td colspan="4" align="center" class="narmal" style="color:#FF0000; "> No Records Found </td>
</tr>
<?php
}
foreach($item_res as $item) {
?>
<tr><td align="center"><input type="checkbox" name="cat<?php echo $i; ?>_select[]" value="<?php echo $item['es_in_item_masterid']; ?>" 
<?php if(is_array($_POST['cat'.$i.'_select']) && in_array($item['es_in_item_masterid'],$_POST['cat'.$i.'_select'])){?> checked="checked" <?php } ?>></td>
<td><?php echo $item['in_item_name'].'('.$item['in_qty_available'].')'; ?></td><td align="center"><?php echo $item['cost']; ?><input type="hidden" name="cat<?php echo $i; ?>_cost[<?php echo $item['es_in_item_masterid']; ?>]" value="<?php echo $item['cost']; ?>" /></td><td align="center"><input name="cat<?php echo $i; ?>_pcs[<?php echo $item['es_in_item_masterid']; ?>]" type="text" size="5" maxlength="5" value='<?php echo $_POST['cat'.$i.'_pcs'][$item['es_in_item_masterid']] ;?>' ></td>
</tr>
<?php } ?>
</table>
</td>
<td class="bgcolor_02" width="1"></td>
</tr>
<tr>
<td class="bgcolor_02" height="1" colspan="3"></td>
</tr>
</table>
</td>
<?php if($j == 0) { ?>
<td width="2%" align="center" style=" color:#FFFFFF; ">&nbsp;</td>
<?php } ?>
<?php $i++; } }  ?></tr>
<tr height="5"><td>&nbsp;</td></tr><?php } ?>

</table>
</td>
</tr>
<tr>
<td align="center">

</td>
</tr>
</table>

</td>
<td valign="top">
<table border="0" cellpadding="2" cellspacing="0" width="100%">
<tr height="25">
<td class="narmal">Class</td>
<td>
<select name="class_id" onChange="stdents_func(this.value,''); ">
<option value="">Select Class</option>
<?php
foreach($class_res as $calss) {
?>
<option value="<?php echo $calss['es_classesid']; ?>" <?php if($class_id==$calss['es_classesid']){?> selected="selected" <?php } ?>><?php echo $calss['es_classname']; ?></option>
<?php } ?>
</select><font color="#FF0000">*</font>
</td>
</tr>
<tr>
<td>Select Student</td>
<td id="students">
<select name="student_id" onchange="stdents_info(this.value); ">
<option value="">Select&nbsp;Student</option></select><font color="#FF0000">*</font>
<?php /*?><?php
if(isset($class_id) || $class_id != ''){
$stu_det_sql="SELECT pre_name, es_preadmissionid  FROM es_preadmission WHERE pre_class=".$class_id;
$stu_dets=$db->getRows($stu_det_sql);
foreach($stu_dets as $stu){
?>
<option value="<?php echo $stu['es_preadmissionid']; ?>" <?php if($student_id == $stu['es_preadmissionid']) { ?> selected="selected"<?php } ?> ><?php echo ucfirst($stu['pre_name']); ?></option>
<?php
}
}
?><?php */?>

</td>
</tr>
<tr>
<td align="left">Invoice Number</td>
<td><input name="invioce_no" type="text" value="<?php echo $invioce_no; ?>" size="8"  /><font color="#FF0000">*</font></td>
</tr>
<?php
if(isset($class_id) && $class_id!='')
{
?>
<script>
stdents_func('<?php echo $class_id; ?>','<?php echo $student_id; ?>');
</script>
<?php
}?>
<tr>
<td colspan="2" id="stu_inf">
<table border="0" cellpadding="2" cellspacing="1">
<tr>
<td colspan="2" align="left"><strong>Student Details</strong></td>
</tr>
<tr>
<td>Name</td>
<td><input type="text" name="stu_name" value="<?php echo $stu_name; ?>" readonly="readonly"/></td>
</tr>
<tr>
<td>Class</td>
<td><input type="text" name="stu_name" value="<?php echo $stu_class; ?>" readonly="readonly"/></td>
</tr>
<tr>
<td>Section</td>
<td><input type="text" name="stu_name" value="<?php echo $stu_sect; ?>" readonly="readonly"/></td>
</tr>
<tr>
<td>Roll No</td>
<td><input type="text" name="stu_name" value="<?php echo $stu_roll; ?>" readonly="readonly"/></td>
</tr>
<tr>
<td>Photo</td>
<td></td>
</tr>
</table>
<?php
if(isset($student_id) && $student_id!='')
{
?>
<script>
stdents_info('<?php echo $student_id; ?>');
</script>
<?php
}
?>
</td>
</tr>
<tr>
<td colspan="2">&nbsp;
</td>
</tr>
</table>
</td>
<td class="bgcolor_02" width="1px"></td>
</tr>
<tr>
<td class="bgcolor_02" width="1px"></td>
<td height="3" colspan="3" align="center"><input type="submit" name="submit" value="Submit" alt="submit"  title="submit" class="bgcolor_02"></td>
<td class="bgcolor_02" width="1px"></td>
</tr>
<tr><td class="bgcolor_02" width="1px"></td>
<td colspan="3" height="2px; ">&nbsp;</td>
<td class="bgcolor_02" width="1px"></td>
</tr>
<tr>
<td height="1" colspan="5" class="bgcolor_02"></td>
</tr>

</table>

</form>


