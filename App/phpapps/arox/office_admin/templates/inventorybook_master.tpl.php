<?php 
/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
header('location: ./?pid=1&unauth=0');
exit;
}
if($action == 'addinventory' || $action == 'edit_inventory' ||$action=='view_inventory') {
?>
<script type="text/javascript">

function newWindowOpen (href) {

window.open(href,null,  'width=900,height=900,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');
}
</script> 

<table width="100%" border="0" cellspacing="0" cellpadding="0">

<tr>
<td height="3" colspan="3"></td>
</tr>
<tr>
<td height="25" colspan="3" class="bgcolor_02"><span class="admin">&nbsp;Create Inventory Type </span></td>
</tr>


<?php 
if (isset($viewinventory) && count($viewinventory)>0 && $action == 'addinventory' ||$action=='view_inventory') {
?>
<tr>
<td class="bgcolor_02" width="1"></td>
<td valign="top" align="left">
<table width="100%" border="0" cellspacing="3" cellpadding="0">

<tr>
<td width="26%" align="left" class="narmal">Inventory Type</td>
<td width="4%" align="left">:</td>
<td width="31%" align="left"><?php echo $viewinventory->fld_bookinventoryname;?>							</td>
<td width="39%">&nbsp;</td>
</tr>
<tr>
<td width="26%" align="left" class="narmal">Short Name</td>
<td width="4%" align="left">:</td>
<td width="31%" align="left"><?php echo $viewinventory->fld_shortname;?>							</td>
<td width="39%">&nbsp;</td>
</tr>
<tr>
<td width="26%" align="left" class="narmal">Description</td>
<td width="4%" align="left">:</td>
<td width="31%" align="left"><?php echo $viewinventory->fld_description;?>							</td>
<td width="39%">&nbsp;</td>
</tr>
<tr>
<td align="right" class="narmal">&nbsp;</td>
<td align="center">&nbsp;</td>
<td><input type="submit" name="back" onclick="javascript:history.go(-1);" id="back" value="back" class="bgcolor_02"/></td>
<td>&nbsp;</td>
</tr>
</table>
</td>
<td class="bgcolor_02" width="1"></td>
</tr>


<?php 
} else{

?>
<tr>
<td width="1" class="bgcolor_02"></td>
<td align="left" valign="top">
<table width="100%" border="0" cellspacing="0" cellpadding="0">

<tr>
<td height="10"><form name="Inventory_Master" action="" method="post"><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td colspan="3" height="20" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font></td>
</tr>
<tr>
<td width="30%" align="left" class="narmal">&nbsp;&nbsp;Inventory Type</td>
<td width="70%" colspan="2" align="left">
<select name="" >
<option value="1">Consumable </option>
<option value="2">Non-consumable </option>
</select>
<?php /*?><input type="text" name="in_inventory_name"  
value="<?php
if (isset($getinventory->in_inventory_name)){

echo htmlentities($getinventory->in_inventory_name);
}else{ 
echo stripslashes($_POST['in_inventory_name']);
} 
?>"	/><?php */?>
<span class="error_message">*</span> </td>
</tr>
<tr>
<td height="15" align="left"></td>
<td colspan="2" align="left" class="error_message"><?php 
if (isset($error_inventory_type)&&$error_inventory_type!=""){
echo $error_inventory_type;
}
?>
</td>
</tr>
<tr>
<td align="left" class="narmal">&nbsp; Short Name </td>
<td colspan="2" align="left"><input type="text" name="fld_shortname" value="<?php
if (isset($getinventory->fld_shortname)){

echo htmlentities($getinventory->fld_shortname);
}else{ 
echo stripslashes($_POST['fld_shortname']);
} 
?>" />
<span class="error_message">*</span> </td>
</tr>
<tr>
<td height="15" align="left"></td>
<td colspan="2" align="left" class="error_message"><?php 
if (isset($error_short_name)&&$error_short_name!=""){
echo $error_short_name;
}
?>
</td>
</tr>
<tr>
<td align="left" class="narmal">&nbsp; Description </td>
<td colspan="2" align="left"><textarea name="fld_description" cols="16"><?php
if (isset($getinventory->fld_description)){

echo $getinventory->fld_description;
}else{ 
echo $_POST['fld_description'];
} 
?>
</textarea>
<span class="error_message">*</span> </td>
</tr>
<tr>
<td height="15" align="left"></td>
<td colspan="2" align="left" class="error_message"><?php 
if (isset($error_description)&&$error_description!=""){
echo $error_description;
}
?>
</td>
</tr>
<tr>
<td align="left" class="narmal">&nbsp;&nbsp;</td>
<td colspan="2" align="left"><input type="hidden" name="edit_id" value="<?php echo $getinventory->es_in_bookinventoryId;?>" />
<input name="inventorysubmit" type="submit" class="bgcolor_02" value="Submit" />
</td>
</tr>

</table></form></td>
</tr>    
<tr>
<td></td>
</tr>
<tr>
<td><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="20" colspan="5" class="narmal">&nbsp;&nbsp;</td>
</tr>
<tr>
<td height="20" colspan="5" class="narmal"><table width="100%" border="0" cellpadding="1" cellspacing="1" bordercolor="#CCCCCC">
<tr  class="bgcolor_02">
<td width="10%" height="25" align="center" valign="middle" class="admin" >S.No</td>
<td width="20%" align="left" valign="middle" class="admin">Inventory Type </td>
<td width="16%" align="center" class="admin">Short Name </td>
<td width="26%" align="left" valign="middle" class="admin">Description</td>
<td width="13%" align="center" valign="middle" class="admin">&nbsp;Action</td>
</tr>
<?php	
if(count($inventoryList) > 0 ){					
$rw = 1;
$slno = $start+1;

foreach ($inventoryList as $es_bookinventory)
{  
if($rw%2==0)
$rowclass = "even";
else
$rowclass = "odd";


?>

<tr class="<?php echo $rowclass;?>">
<td align="center" valign="middle" class="narmal"><?php echo $slno;?></td>
<td align="left" valign="middle" class="narmal"><?php echo $es_bookinventory->fld_bookinventoryname; ?></td>
<td align="center" class="narmal"><?php echo $es_bookinventory->fld_shortname; ?> </td>
<td align="left" valign="middle" class="narmal"><?php echo $es_bookinventory->	fld_description; ?> </td>
<td align="center" valign="middle" ><?php if (in_array("13_2", $admin_permissions)) {?>

<a title="Edit Inventory" href="<?php echo buildurl(array('pid'=>132, 'action'=>'edit_inventory', 'uid'=>$es_bookinventory->es_in_bookinventoryId));?>#editinventory"><?php echo editIcon(); ?></a>&nbsp;
<?php }else{ echo "-"; }?>
<?php if (in_array("13_3", $admin_permissions)) {?>
<a title="Delete Inventory" href="<?php  echo buildurl(array('pid'=>132, 'action'=>'delete', 'uid'=>$es_bookinventory->es_in_bookinventoryId));?>#deleteinventory" onclick="return confirm('<?php echo SM_CONFIRM_DELETE_MESSAGE;?>');"><?php echo deleteIcon(); ?></a>
<?php }else{ echo "-"; }?>
<!--<a title="View Inventory" href="<?php  //echo buildurl(array('pid'=>7, 'action'=>'view_inventory', 'uid'=>$es_inventory->es_inventoryId));?>#viewinventory" ><?php echo viewIcon(); ?></a>--> </td>

</tr>
<?php 
$rw++;
$slno++;

}
?>
<tr>
<td colspan="5" align="center"><?php paginateexte($start, $q_limit, $no_rows, "action=".$action."&column_name=".$orderby."&asds_order=".$asds_order) ?></td>
</tr>
<tr>
<?php if (in_array("13_17", $admin_permissions)) {?>
<td align="right" colspan="5"><input type="button"  name="print_inventory" value="Print" class="bgcolor_02"onclick="newWindowOpen('?pid=132&action=inventory_print')"></td><?php }?>
</tr>
<?php
}	

else {
echo "<tr >";
echo "<td align='center' colspan='5' class='narmal'>No Records Found</td>";
echo "</tr>";
} 
?>
</table></td>
</tr>
</table></td>
</tr>
</table>

</td>
<td width="1" class="bgcolor_02"></td>
</tr>
<?php } ?>
<tr>
<td height="1" colspan="3" class="bgcolor_02"></td>
</tr>
</table>
<?php  } ?>
<?php if ($action  == 'inventory_print') {


?>

<table width="100%" border="0" cellpadding="0" cellspacing="0" widht="100%" >					
<tr  class="bgcolor_02">
<td width="10%" height="25" align="center" class="admin" >S.No</td>
<td width="20%" align="center" class="admin">Inventory Type</td>
<td width="16%" align="center" class="admin">Short Name</td>
<td width="26%" align="center" class="admin">Description</td>
</tr>
<?php						
$rw = 1;
$slno = $start+1;

foreach ($inventoryListPrint as $es_bookinventory)
{  
if($rw%2==0)
$rowclass = "even";
else
$rowclass = "odd";
?>
<tr class="<?php echo $rowclass;?>">
<td align="center" class="narmal"><?php echo $slno;?></td>
<td align="center" class="narmal"><?php echo $es_bookinventory->fld_bookinventoryname; ?></td>
<td align="center" class="narmal"><?php echo $es_bookinventory->fld_shortname; ?> </td>
<td align="center" class="narmal"><?php echo $es_bookinventory->fld_description; ?> </td>	

</tr>
<?php 
$rw++;
$slno++;

}
?>

</table>

<?php } ?>

<?php if( $action == 'addcategory'|| $action == 'edit_category' ||$action=='view_category' ) { ?>
<script type="text/javascript">
function newWindowOpen(href) {
window.open(href, null, 'width=900,height=900,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');
}
</script>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="3" colspan="3"></td>
</tr>
<tr>
<td height="25" colspan="3" class="bgcolor_02">&nbsp;Product <span class="admin">Category </span></a></td>
</tr>

<?php 
if (isset($viewcategory) && count($viewcategory)>0 && $action == 'addcategory' ||$action=='view_category') {
?>

<tr>
<td class="bgcolor_02" width="1"/>
<td valign="top" align="left">


<table width="100%" border="0" cellspacing="3" cellpadding="0">

<tr>
<td width="26%" align="left" class="narmal">Category Name</td>
<td width="4%" align="center">:</td>
<td width="31%"><?php echo $viewcategory->fld_categoryname;?>
</td>
<td width="39%">&nbsp;</td>
</tr>
<tr>
<td width="26%" align="left" class="narmal">Description</td>
<td width="4%" align="center">:</td>
<td width="31%"><?php echo $viewcategory->fld_description;?>
</td>
<td width="39%">&nbsp;</td>
</tr>
<tr>
<td align="right" class="narmal">&nbsp;</td>
<td align="center">&nbsp;</td>
<td><input type="submit" name="back" onclick="javascript:history.go(-1);" id="back" value="back" class="bgcolor_02"/></td>
<td>&nbsp;</td>
</tr>
</table>
</td>
<td class="bgcolor_02" width="1"/>
</tr>


<?php 
} else{

?>

<tr>
<td width="1" class="bgcolor_02"></td>
<td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="10"></td>
</tr>

<tr>
<td align="right" valign="middle">

<font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font>

<table width="100%" border="0" cellspacing="3" cellpadding="0">
<form method="post" action="" /> 
<tr>
<td  width="30%" align="left" class="narmal">&nbsp; Category Name </td>
<td width="70%" colspan="2" align="left"><input type="text" name="fld_categoryname"  value="<?php
if (isset($getcategory->fld_categoryname)){

echo htmlentities($getcategory->fld_categoryname);
}else{ 
echo stripslashes($_POST['fld_categoryname']);
} 
?>"	/> <span class="error_message">*</span></td>
</tr>
<tr>
<td width="30%" align="left" class="narmal">&nbsp; Description </td>
<td width="70%" colspan="2" align="left"><textarea name="fld_description" cols="16"><?php
if (isset($getcategory->fld_description)){

echo $getcategory->fld_description;
}else{ 
echo $_POST['fld_description'];
} 
?></textarea><span class="error_message">*</span></td>
</tr>
<tr>
<td align="left" class="narmal">&nbsp;&nbsp;</td>
<td colspan="2" align="left">
<input type="hidden" name="edit_id" value="<?php echo $getcategory->es_in_bookcategoryId;?>" />
<input name="categorysubmit" type="submit" class="bgcolor_02" value="Submit" /></td>
</tr>
<tr>
<td height="20" colspan="3" class="narmal">&nbsp;&nbsp;</td>
</tr>
</form>
</table></td>
</tr>



<tr>
<td valign="top"><table width="100%" border="0" cellpadding="1" cellspacing="1" bordercolor="#CCCCCC">
<?php if(count($categoryList) > 0 ){ ?>
<tr  class="bgcolor_02">
<td width="10%" height="23" align="center" valign="middle" class="admin">S No</td>
<td width="24%" align="left" valign="middle" class="admin">Category</td>

<td width="30%" align="left" valign="middle" class="admin">Description</td>

<td width="20%" align="center" valign="middle" class="admin">Action</td>
</tr>
<?php						
$rw = 1;
$slno = $start+1;
foreach ($categoryList as $es_bookcategory)
{  
if($rw%2==0)
$rowclass = "even";
else
$rowclass = "odd";


?>

<tr class="<?php echo $rowclass;?>">
<td align="center" valign="middle" class="narmal"><?php echo $slno;?></td>
<td align="left" valign="middle" class="narmal"><?php echo $es_bookcategory->fld_categoryname; ?></td>
<td align="left" valign="middle" class="narmal"><?php echo $es_bookcategory->fld_description; ?></td>

<td align="center" valign="middle">
<?php if (in_array("13_5", $admin_permissions)) {?>
<a title="Edit Category" href="<?php echo buildurl(array('pid'=>132, 'action'=>'edit_category', 'uid'=>$es_bookcategory->es_in_bookcategoryId));?>#editcategory"><?php echo editIcon(); ?></a>&nbsp;
<?php }else{ echo "-"; }?>
<?php if (in_array("13_6", $admin_permissions)) {?>

<a title="Delete Category" href="<?php  echo buildurl(array('pid'=>132, 'action'=>'delete_category', 'uid'=>$es_bookcategory->es_in_bookcategoryId));?>#deletecategory" onclick="return confirm('<?php echo SM_CONFIRM_DELETE_MESSAGE;?>');"><?php echo deleteIcon(); ?></a>
<?php }else{ echo "-"; }?>
<!-- <a title="View Category" href="<?php  //echo buildurl(array('pid'=>7, 'action'=>'view_category', 'uid'=>$es_in_category->es_in_categoryId));?>#viewcategory" ><?php echo viewIcon(); ?></a>--></td>
</tr>


<?php           $rw++;
$slno++;

} ?> 


<tr>
<td colspan="6" align="center"><?php paginateexte($start, $q_limit, $no_rows, "action=".$action."&column_name=".$orderby."&asds_order=".$asds_order) ?>

</td>
</tr>
<tr>
<?php if (in_array("13_18", $admin_permissions)) {?><td colspan="10" align="right"><input type="button" name="print_category" class="bgcolor_02"value="Print" onclick="newWindowOpen('?pid=132&action=inv_category_print')" /></td><?php }?>
</tr>
<?php } 

else {
echo "<tr class='bgcolor_02'>";
echo "<td align='center'>No records found</td>";
echo "</tr>";
} 

?>
</table></td>
</tr>
</table>
<?php } ?>
</td>
<td width="1" class="bgcolor_02"></td>
</tr>
<tr>
<td height="1" colspan="3" class="bgcolor_02"></td>
</tr>
</table>


<?php } ?>

<?php if ($action == 'inv_category_print') { ?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" >
<tr  class="bgcolor_02">
<td width="10%" height="23" align="center" class="admin">S No</td>
<td width="24%" align="left" class="admin">Category</td>
<td width="30%" align="left" class="admin">Description</td>
</tr>
<?php						
$rw = 1;
$slno = $start+1;
foreach ($categoryListPrint as $es_bookcategory)
{  
if($rw%2==0)
$rowclass = "even";
else
$rowclass = "odd";


?>

<tr class="<?php echo $rowclass;?>">
<td align="center" class="narmal"><?php echo $slno;?></td>
<td align="left" class="narmal"><?php echo $es_bookcategory->fld_categoryname; ?></td>
<td align="left" class="narmal"><?php echo $es_bookcategory->fld_description; ?></td>

</tr>
<?php          
$rw++;
$slno++;

} ?> 
</table>				


<?php } ?>
<?php if($action == 'additem' || $action=='edit_item' || $action=='view_item') {  ?>
<script type="text/javascript">
function newWindowOpen(href) {
window.open(href, null, 'width=900,height=900,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');
}
</script>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="3" colspan="3"></td>
</tr>
<tr>
<td height="25" colspan="3" class="bgcolor_02">&nbsp;Item </a></td>
</tr>
<?php 
if (isset($viewitem) && count($viewitem)>0 && $action == 'additem' ||$action=='view_item') {

?>
<tr>
<td class="bgcolor_02" width="1"/>
<td valign="top" align="left">
<table width="100%" border="0" cellspacing="3" cellpadding="0">
<tr>
<td width="26%" align="left" class="narmal">Item Code </td>
<td width="4%" align="left">:</td>
<td width="31%" align="left"><?php echo $es_itembook_master->fld_item_code;?>							</td>
<td width="39%">&nbsp;</td>
</tr>
<tr>
<td width="26%" align="left" class="narmal">Item Name</td>
<td width="4%" align="left">:</td>
<td width="31%" align="left"><?php echo $es_itembook_master->fld_item_name;?>							</td>
<td width="39%">&nbsp;</td>
</tr>

<tr>
<td width="26%" align="left" class="narmal">Inventory Type</td>
<td width="4%" align="left">:</td>
<td width="31%" align="left"><?php echo $inventory_type_arr[$es_itembook_master->fld_inventory_id];?>						</td>
<td width="39%">&nbsp;</td>
</tr>
<tr>
<td width="26%" align="left" class="narmal">Category</td>
<td width="4%" align="left">:</td>
<td width="31%" align="left"><?php echo $category_name['fld_categoryname'];?>							</td>
<td width="39%">&nbsp;</td>
</tr>
<tr>
<td width="26%" align="left" class="narmal">Units</td>
<td width="4%" align="left">:</td>
<td width="31%" align="left"><?php echo $es_itembook_master->fld_units;?>							</td>
<td width="39%">&nbsp;</td>
</tr>
<tr>
<td width="26%" align="left" class="narmal">Remarks</td>
<td width="4%" align="left">:</td>
<td width="31%" align="left"><?php echo $es_itembook_master->fld_cost;?>							</td>
<td width="39%">&nbsp;</td>
</tr>
<tr>
<td width="26%" align="left" class="narmal">Qty in hand </td>
<td width="4%" align="left">:</td>
<td width="31%" align="left"><?php echo $es_itembook_master->fld_qty_available;?>							</td>
<td width="39%">&nbsp;</td>
</tr>
<tr>
<td width="26%" align="left" class="narmal">Re-order </td>
<td width="4%" align="left">:</td>
<td width="31%" align="left"><?php echo $es_itembook_master->fld_reorder_level;?>							</td>
<td width="39%">&nbsp;</td>
</tr>
<tr>
<td align="left" class="narmal">&nbsp;</td>
<td align="left">&nbsp;</td>
<td align="left"><input type="button" name="back" onclick="javascript:history.go(-1);" id="back" value="back" class="bgcolor_02"/></td>
<td>&nbsp;</td>
</tr>
</table>
</td>
<td class="bgcolor_02" width="1"/>
</tr>      

<?php } 


else{ 

?>     


<tr>
<td width="1" class="bgcolor_02"></td>
<td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="20" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font></td>
</tr>

<tr>
<td valign="top"><table width="100%" border="0" cellspacing="5" cellpadding="0">
<form action ="" method = "post"/> 

<tr>
<td width="30%" align="left" class="narmal">&nbsp;&nbsp;Item Code.</td>
<td colspan="2" align="left"><input type="text" name="fld_item_code" value="<?php
if (isset($getitem->fld_item_code)){

echo htmlentities($getitem->fld_item_code);
}else{ 
echo stripslashes($_POST['fld_item_code']);
} 
?>" />
<span class="error_message">*</span></td>
</tr>
<tr>
<td align="left" class="narmal">&nbsp; Item Name </td>
<td colspan="2" align="left"><input type="text" name="fld_item_name" value="<?php
if (isset($getitem->fld_item_name)){

echo htmlentities($getitem->fld_item_name);
}else{ 
echo stripslashes($_POST['fld_item_name']);
} 
?>" />
<span class="error_message">*</span>
</td>
</tr>
<?php /*?><tr>
<td align="left" class="narmal">&nbsp; Publication </td>
<td colspan="2" align="left"><input type="text" name="fld_publication" value="<?php
if (isset($getitem->fld_publication)){

echo htmlentities($getitem->fld_publication);
}else{ 
echo stripslashes($_POST['fld_publication']);
} 
?>" />
<span class="error_message">*</span>
</td>
</tr><?php */?>


<tr>
<td align="left" class="narmal">&nbsp; Inventory Type </td>
<td colspan="2" align="left">

<?php
if (isset($getitem->fld_inventory_id)){

$fld_inventory_id=$getitem->fld_inventory_id;
}else{ 
$fld_inventory_id=$_POST['fld_inventory_id'];
} 
?>
<select name="fld_inventory_id" >
<option value="">Select Inventory</option>
<option value="1" <?php if($fld_inventory_id==1){?> selected="selected" <?php } ?>>Consumable</option>
<option value="2"  <?php if($fld_inventory_id==2){?> selected="selected" <?php } ?>>Non-consumable</option>
</select><?php /*?><select name="in_inventory_id"  >
<option value="">Select Inventory</option>
<?php
if (count($inventoryList)>0) { 
foreach($inventoryList as $es_inventory) {

?>		  
<option value="<?php echo $es_inventory->es_inventoryId; ?>"
<?php if($es_inventory->es_inventoryId == $in_inventory_id) {
echo "selected";
}elseif($getitem->in_inventory_id == $es_inventory->es_inventoryId) {
echo "selected";
} ?> ><?php echo $es_inventory->in_inventory_name; ?></option>

<?php   } 
}
?>
</select><?php */?> <span class="error_message">*</span></td></tr>
<tr>
<td align="left" class="narmal">&nbsp; Category </td>
<td colspan="2" align="left"><select name="fld_category_id">
<option value="">Select Category</option>
<?php
if (count($categoryList)>0){		
foreach($categoryList as $es_bookcategory){ 
?>                                <option value="<?php  echo $es_bookcategory->es_in_bookcategoryId; ?>" 
<?php if ($_POST['fld_category_id']==$es_bookcategory->es_in_bookcategoryId){ 
echo "selected";
}elseif ($getitem->fld_category_id==$es_bookcategory->es_in_bookcategoryId){echo "Selected";
} 
?> ><?php echo $es_bookcategory->fld_categoryname; ?></option>
<?php 


}
}		  

?>										
</select> <span class="error_message">*</span></td></tr>
<tr>
<td align="left" class="narmal">&nbsp; Units </td>
<td colspan="2" align="left"><input type="text" name="fld_units" value="<?php
if (isset($getitem->fld_units)){
echo $getitem->fld_units;
}else{ 
echo $_POST['fld_units'];
} 
?>" /> <span class="error_message">*</span></td>
</tr>
<tr>
<td align="left" class="narmal"> &nbsp;Remarks </td>
<td colspan="2" align="left">
<textarea name="cost" cols="16" rows=""></textarea>
<?php /*?><input type="text" name="cost" value="<?php
if (isset($getitem->cost)){
echo $getitem->cost;
}else{ 
echo $_POST['cost'];
} 
?>" /><?php */?> </td>
</tr>
<tr>
<td align="left" class="narmal">&nbsp; Qty in hand </td>
<td colspan="2" align="left"><input type="text" name="fld_qty_available" value="<?php
if (isset($getitem->fld_qty_available)){

echo $getitem->fld_qty_available;
}else{ 
echo $_POST['fld_qty_available'];
} 
?>" /> <span class="error_message">*</span></td>
</tr>
<tr>
<td align="left" class="narmal">&nbsp; Re-order level </td>
<td colspan="2" align="left"><input type="text" name="fld_reorder_level" value="<?php
if (isset($getitem->fld_reorder_level)){

echo $getitem->fld_reorder_level;
}else{ 
echo $_POST['fld_reorder_level'];
} 
?>" /> </td>
</tr>
<tr>
<td align="left" class="narmal">&nbsp;</td>

<td colspan="2" align="left"><input type="hidden" name="edit_id" value="<?php echo $getitem->fld_in_item_masterId;?>">
<input name="itemSubmit" type="submit" class="bgcolor_02" value="Submit" /></td>
</tr>

</form>
</table></td>
</tr>
<tr>
<td valign="top"><table width="100%" border="0" cellpadding="1" cellspacing="1" bordercolor="#CCCCCC">

<tr class="bgcolor_02">
<td width="9%" height="23"  align="center" valign="middle" class="admin">S.No</td>
<td width="18%" align="left" valign="middle" class="admin">Item&nbsp;Name</td>
<td width="12%" align="center" valign="middle" class="admin">Item&nbsp;Code</td>
<td width="20%" align="center" class="admin">Inventory Type</td>
<td width="15%" align="center" class="admin">&nbsp;Qty&nbsp;in&nbsp;hand</td>
<td width="13%" align="center" class="admin">Re-order&nbsp;level</td>

<td width="13%" align="center" class="admin">Action</td>
</tr>
<?php if(count($itemList) > 0 ){ ?>
<?php						
$rw = 1;
$slno = $start+1;
foreach ($itemList as $itl)
{  

if($rw%2==0)
$rowclass = "even";
else
$rowclass = "odd"; 
?>

<tr class="<?php echo $rowclass;?>">
<td align="center" valign="middle" class="narmal"><?php echo $slno;?></td>
<td align="left" valign="middle" class="narmal"><?php echo stripslashes($itl['fld_item_name']); ?></td>
<td align="center" valign="middle" class="narmal"><?php echo $itl['fld_item_code']; ?></td>
<td align="center" class="narmal"><?php echo $inventory_type_arr[$itl['fld_inventory_id']]; ?></td>
<td align="center" class="narmal"><?php echo $itl['fld_qty_available']; ?></td>
<td align="center" class="narmal"><?php echo $itl['fld_reorder_level']; ?></td>
<td align="center" class="narmal">
<?php if (in_array("13_8", $admin_permissions)) {?>
<a title="Edit Item" href="<?php echo buildurl(array('pid'=>132, 'action'=>'edit_item', 'uid'=>$itl['fld_item_masterid']));?>#editinventory"><?php echo editIcon(); ?></a>&nbsp;
<?php }else{ echo "-"; }?>
<?php if (in_array("13_9", $admin_permissions)) {?>
<a title="Delete Item" href="<?php  echo buildurl(array('pid'=>132, 'action'=>'delete_item', 'uid'=>$itl['fld_item_masterid']));?>#deleteinventory" onclick="return confirm('<?php echo SM_CONFIRM_DELETE_MESSAGE;?>');"><?php echo deleteIcon(); ?></a>&nbsp;
<?php }else{ echo "-"; }?>
<?php if (in_array("13_19", $admin_permissions)) {?>
<a title="View Item" href="<?php  echo buildurl(array('pid'=>132, 'action'=>'view_item', 'uid'=>$itl['fld_item_masterid']));?>#viewinventory" ><?php echo viewIcon(); ?></a>
<?php }else{ echo "-"; }?>
</td>
</tr>

<?php 
$rw++;
$slno++;


} ?> 


<tr>
<td colspan="7" align="center"><?php paginateexte($start, $q_limit, $no_rows, "action=".$action."&column_name=".$orderby."&asds_order=".$asds_order) ?></td>
</tr>
<tr>
<?php if (in_array("13_20", $admin_permissions)) {?><td align="right" colspan="7"><input type="button" value="Print" class="bgcolor_02" onclick="newWindowOpen('?pid=132&action=item_print');"  /></td>
<?php }?>
</tr>	
<?php } 

else {
echo "<tr class='bgcolor_02'>";
echo "<td align='center' colspan='7'>No records found</td>";
echo "</tr>";
} 



?>
</table></td>
</tr>
</table>

<?php } ?>

</td>
<td width="1" class="bgcolor_02"></td>
</tr>
<tr>
<td height="1" colspan="3" class="bgcolor_02"></td>
</tr>
</table> 
<?php } ?>       

<?php if ( $action == "item_print" ) { ?>
<table border="0" cellpadding="0" cellspacing="0" >
<tr class="bgcolor_02">
<td width="10%" height="23"  align="center" class="admin">S.No</td>
<td width="17%" align="left" class="admin">Item&nbsp;Name</td>
<td width="8%" align="center" class="admin">Item&nbsp;Code</td>
<td width="22%" align="center" class="admin">Inventory&nbsp;Type</td>
<td width="12%" align="center" class="admin">&nbsp;Qty&nbsp;In&nbsp;hand</td>
<td width="12%" align="center" class="admin">Re-Order level </td>

</tr>
<?php						
$rw = 1;
$slno = $start+1;
foreach ($itemListPrint as $itl)
{  

if($rw%2==0)
$rowclass = "even";
else
$rowclass = "odd"; 
?>
<tr class="<?php echo $rowclass;?>">
<td align="center" class="narmal"><?php echo $slno;?></td>
<td align="left" class="narmal"><?php echo $itl['fld_item_name']; ?></td>
<td align="center" class="narmal"><?php echo $itl['fld_item_code']; ?></td>
<td align="center" class="narmal"><?php echo $inventory_type_arr[$itl['fld_inventory_id']];?></td>
<td height="25" align="center" class="narmal"><?php echo $itl['fld_qty_available']; ?></td>
<td align="center" class="narmal"><?php echo $itl['fld_reorder_level']; ?></td>
</tr>
<?php 
$rw++;
$slno++;


} ?> 
</table>        

<?php } ?>

<?php  if($action == 'addsupply' || $action == 'edit_supply' ||$action=='view_supply' ) {?>
<script type="text/javascript">
function newWindowOpen(href) {
window.open(href, null, 'width=900,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30' );
}
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="3" colspan="3"></td>
</tr>
<tr>
<td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Supplier</span></a></td>
</tr>
<?php 
if (isset($viewsupply) && count($viewsupply)>0 && $action == 'addsupply' ||$action=='view_supply') {
?>

<tr>
<td class="bgcolor_02" width="1"/>
<td valign="top" align="left">
<table width="100%" border="0" cellspacing="3" cellpadding="0">

<tr>
<td width="26%" align="left" class="narmal">Supplier Name</td>
<td width="4%" align="left">:</td>
<td width="31%" align="left"><?php echo $viewsupply->fld_name;?>							</td>
<td width="39%">&nbsp;</td>
</tr>
<tr>
<td width="26%" align="left" class="narmal">Publication</td>
<td width="4%" align="left">:</td>
<td width="31%" align="left"><?php echo $viewsupply->fld_publication;?>							</td>
<td width="39%">&nbsp;</td>
</tr>
<tr>
<td width="26%" align="left" class="narmal">Address</td>
<td width="4%" align="left">:</td>
<td width="31%" align="left"><?php echo $viewsupply->fld_address;?>							</td>
<td width="39%">&nbsp;</td>
</tr>
<tr>
<td width="26%" align="left" class="narmal">City</td>
<td width="4%" align="left">:</td>
<td width="31%" align="left"><?php echo $viewsupply->fld_city;?>							</td>
<td width="39%">&nbsp;</td>
</tr>
<tr>
<td width="26%" align="left" class="narmal">State</td>
<td width="4%" align="left">:</td>
<td width="31%" align="left"><?php echo $viewsupply->fld_state;?>							</td>
<td width="39%">&nbsp;</td>
</tr>
<tr>
<td width="26%" align="left" class="narmal">Country</td>
<td width="4%" align="left">:</td>
<td width="31%" align="left"><?php echo $viewsupply->fld_country;?>							</td>
<td width="39%">&nbsp;</td>
</tr>
<tr>
<td width="26%" align="left" class="narmal">Office No</td>
<td width="4%" align="left">:</td>
<td width="31%" align="left"><?php echo $viewsupply->fld_office_no;?>							</td>
<td width="39%">&nbsp;</td>
</tr>
<tr>
<td width="26%" align="left" class="narmal"> Mobile No</td>
<td width="4%" align="left">:</td>
<td width="31%" align="left"><?php echo $viewsupply->fld_mobile_no;?>							</td>
<td width="39%">&nbsp;</td>
</tr>
<tr>
<td width="26%" align="left" class="narmal">Email</td>
<td width="4%" align="left">:</td>
<td width="31%" align="left"><?php echo $viewsupply->fld_email;?>							</td>
<td width="39%">&nbsp;</td>
</tr>
<tr>
<td width="26%" align="left" class="narmal">Fax</td>
<td width="4%" align="left">:</td>
<td width="31%" align="left"><?php echo $viewsupply->fld_fax;?>							</td>
<td width="39%">&nbsp;</td>
</tr>
<tr>
<td width="26%" align="left" class="narmal">Description</td>
<td width="4%" align="left">:</td>
<td width="31%" align="left"><?php echo $viewsupply->fld_description;?>							</td>
<td width="39%">&nbsp;</td>
</tr>

<tr>
<td align="left" class="narmal">&nbsp;</td>
<td align="left">&nbsp;</td>
<td align="left"><input type="submit" name="back" onclick="javascript:history.go(-1);" id="back" value="back" class="bgcolor_02"/></td>
<td>&nbsp;</td>
</tr>
</table>
</td>
<td class="bgcolor_02" width="1"/>
</tr>


<?php 
} else{

?>


<tr>
<td width="1" class="bgcolor_02"></td>
<td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="20" align="right" valign="middle"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font></td>
</tr>

<tr>
<td><table width="100%" border="0" cellspacing="5" cellpadding="0">
<form action="" method="post" >
<tr>
<td width="30%" align="left" class="narmal">&nbsp;&nbsp;Supplier Name </td>
<td colspan="2" align="left"><input type="text" name="fld_name" value="<?php
if (isset($fld_name)){ 
echo stripslashes($_POST['fld_name']);
}else if (isset($getsupply->fld_name)){
echo htmlentities($getsupply->fld_name);
} 

?>" /><span class="error_message">*</span></td>
</tr>
<tr>
<td align="left" class="narmal">&nbsp; Address </td>
<td colspan="2" align="left"><textarea name="fld_address" cols="16"><?php
if (isset($fld_address)){ 
echo stripslashes($_POST['fld_address']);
}elseif (isset($getsupply->fld_address)){

echo htmlentities($getsupply->fld_address);
} 

?></textarea><span class="error_message">*</span></td>
</tr>
<?php /*?><tr>
<td align="left" class="narmal">&nbsp; Publication </td>
<td colspan="2" align="left">
<input type="text" name="fld_publication" value="<?php
if (isset($fld_publication)){ 
echo stripslashes($_POST['fld_publication']);
}else if (isset($getsupply->fld_publication)){
echo htmlentities($getsupply->fld_publication);
} 

?>" />

<span class="error_message">*</span></td>
</tr><?php */?>

<tr>
<td align="left" class="narmal">&nbsp; City </td>
<td colspan="2" align="left"><input type="text" name="fld_city"  value="<?php
if (isset($fld_city)){ 
echo stripslashes($_POST['fld_city']);
}elseif (isset($getsupply->fld_city)){

echo htmlentities($getsupply->fld_city);
} 

?>" /></td>
</tr>
<tr>
<td align="left" class="narmal">&nbsp; State </td>
<td colspan="2" align="left"><input type="text" name="fld_state" value="<?php
if (isset($fld_state)){ 
echo stripslashes($_POST['fld_state']);
}elseif (isset($getsupply->fld_state)){

echo htmlentities($getsupply->fld_state);
} 

?>" /></td>
</tr>
<tr>
<td align="left" class="narmal">&nbsp; Country </td>
<td colspan="2" align="left"><input type="text" name="fld_country" value="<?php
if (isset($fld_country)){ 
echo stripslashes($_POST['fld_country']);
}elseif (isset($getsupply->fld_country)){

echo htmlentities($getsupply->fld_country);
} 

?>" /></td>
</tr>
<tr>
<td align="left" class="narmal">&nbsp; Office No </td>
<td colspan="2" align="left"><input type="text" name="fld_office_no" value="<?php
if(isset($fld_office_no)) { 
echo stripslashes($_POST['fld_office_no']);
} elseif(isset($getsupply->fld_office_no)){

echo htmlentities($getsupply->fld_office_no);
}

?>" /><span class="error_message">*</span></td>
</tr>
<tr>
<td align="left" class="narmal">&nbsp; Mobile No </td>
<td colspan="2" align="left"><input type="text" name="fld_mobile_no" value="<?php
if (isset($fld_mobile_no)){ 
echo stripslashes($_POST['fld_mobile_no']);
}elseif (isset($getsupply->fld_mobile_no)){

echo htmlentities($getsupply->fld_mobile_no);
} 

?>" /></td>
</tr>
<tr>
<td align="left" class="narmal">&nbsp; Email </td>
<td colspan="2" align="left"><input type="text" name="fld_email" value="<?php
if (isset($fld_email)){ 
echo stripslashes($_POST['fld_email']);
}elseif (isset($getsupply->fld_email)){

echo htmlentities($getsupply->fld_email);
} 

?>" /></td>
</tr>
<tr>
<td align="left" class="narmal">&nbsp; Fax </td>
<td colspan="2" align="left"><input type="text" name="fld_fax" value="<?php
if (isset($fld_fax)){ 
echo stripslashes($_POST['fld_fax']);
}elseif (isset($getsupply->fld_fax)){

echo htmlentities($getsupply->fld_fax);
} 

?>" /></td>
</tr>

<tr>
<td align="left" class="narmal">&nbsp; Description </td>
<td colspan="2" align="left"><textarea name="fld_description" cols="16"><?php
if (isset($fld_description)){ 
echo stripslashes($_POST['fld_description']);
}elseif (isset($getsupply->fld_description)){

echo htmlentities($getsupply->fld_description);
} 

?></textarea></td>
</tr>       
<tr>
<td align="left" class="narmal">&nbsp;</td>
<td colspan="2" align="left">
<input type="hidden" name="edit_id" value="<?php echo $getsupply->fld_in_supplier_masterId;?>" />
<input name="supplysubmit" type="submit" value="Submit" class="bgcolor_02" /></td>
</tr>
</form>
<td colspan="2"></td>

</table></td>
</tr>


<tr>
<td valign="top"><table width="100%" border="0" cellpadding="1" cellspacing="1" bordercolor="#CCCCCC">
<?php if(count($supplyList) > 0 ){ ?>
<tr class="bgcolor_02">
<td width="10%" height="25" align="center" valign="middle" class="admin">S.No</td>
<td width="18%"  align="left" valign="middle" class="admin" >Supplier&nbsp;Name</td>
<td width="24%"  align="left" valign="middle" class="admin">Address</td>
<td width="22%"  align="center" valign="middle" class="admin">Contact</td>
<td width="15%"  align="center" valign="middle"  class="admin">Action</td>
</tr>
<?php						
$rw = 1;
$slno = $start+1;
foreach ($supplyList as $es_booksupplier_master)
{  
if($rw%2==0)
$rowclass = "even";
else
$rowclass = "odd";
?>

<tr class="<?php echo $rowclass;?>">
<td align="center" valign="middle" class="narmal"><?php echo $slno;?></td>
<td align="left" valign="middle" class="narmal"><?php echo $es_booksupplier_master->fld_name; ?></td>
<td align="left" valign="middle" class="narmal"><?php echo $es_booksupplier_master->fld_address; ?><br />
  <?php echo $es_booksupplier_master->fld_city; ?>, <?php echo $es_booksupplier_master->fld_state; ?>, <?php echo $es_booksupplier_master->fld_country; ?></td> 

<td align="left" valign="middle" class="narmal"><?php	if($es_booksupplier_master->fld_email!=""){ ?>

Email:<a href="mailto:<?php echo $es_booksupplier_master->fld_email; ?>"><?php echo $es_booksupplier_master->fld_email; ?></a><br />
<?php } ?>
Office No:<?php echo $es_booksupplier_master->fld_office_no; ?><br/> 
<?php	if($es_booksupplier_master->fld_mobile_no!=""){ ?>
Mobile No:<?php echo $es_booksupplier_master->fld_mobile_no; ?><br/>
<?php } ?> 
<?php	if($es_booksupplier_master->fld_fax!=""){ ?>
Fax:<?php echo $es_booksupplier_master->fld_fax; ?>
<?php } ?>
</td>
<td align="center" valign="middle" class="narmal">
<?php if (in_array("13_11", $admin_permissions)) {?>
<a title="Edit Supply" href="<?php echo buildurl(array('pid'=>132, 'action'=>'edit_supply', 'uid'=>$es_booksupplier_master->fld_in_supplier_masterId));?>#editsupply"><?php echo editIcon(); ?></a>&nbsp;
<?php }else{ echo "-"; }?>
<?php if (in_array("13_12", $admin_permissions)) {?>
<a title="Delete Supply" href="<?php  echo buildurl(array('pid'=>132, 'action'=>'delete_supply', 'uid'=>$es_booksupplier_master->fld_in_supplier_masterId));?>#deletecategory" onclick="return confirm('<?php echo SM_CONFIRM_DELETE_MESSAGE;?>');"><?php echo deleteIcon(); ?></a>&nbsp;
<?php }else{ echo "-"; }?>
<?php if (in_array("13_21", $admin_permissions)) {?>
<a title="View Supply" href="<?php  echo buildurl(array('pid'=>132, 'action'=>'view_supply', 'uid'=>$es_booksupplier_master->fld_in_supplier_masterId));?>#viewcategory" ><?php echo viewIcon(); ?></a>
<?php }else{ echo "-"; }?></td>
</tr>

<?php 

$rw++;
$slno++;


} ?> 


<tr>
<td colspan="6" align="center"><?php paginateexte($start, $q_limit, $no_rows, "action=".$action."&column_name=".$orderby."&asds_order=".$asds_order) ?>

</td>
</tr>
<tr>

<?php if (in_array("13_22", $admin_permissions)) {?>
<td  colspan="7" align="right"><input type="button" value="Print" class="bgcolor_02" onclick="newWindowOpen('?pid=132&action=supplier_print')"  /></td><?php }?>
</tr>		
<?php } 

else {
echo "<tr class='bgcolor_02'>";
echo "<td align='center'>No records found</td>";
echo "</tr>";
} 



?>
</table></td>
</tr>




</table>

<?php } ?>
</td>
<td width="1" class="bgcolor_02"></td>
</tr>
<tr>
<td height="1" colspan="3" class="bgcolor_02"></td>
</tr>
</table>    

<?php } ?>
<?php if ($action == 'supplier_print') { ?>
<tr>

<td align="center" colspan="3">
<table width="776" border="0" cellpadding="0" cellspacing="0">
<tr class="bgcolor_02">
<td width="14%" height="25" align="center" valign="middle" class="admin">S.No</td>
<td width="31%"  align="left" valign="middle" class="admin" >Supplier&nbsp;Name</td>
<td width="28%"  align="left" valign="middle" class="admin">Address</td>
<td width="27%"  align="left" valign="middle" class="admin">Contact</td>
</tr>
<?php						
$rw = 1;
$slno = $start+1;
foreach ($supplyListPrint as $es_booksupplier_master)
{  
if($rw%2==0)
$rowclass = "even";
else
$rowclass = "odd";
?>

<tr class="<?php echo $rowclass;?>">
<td align="center" valign="middle" class="narmal"><?php echo $slno;?></td>
<td align="left" valign="middle" class="narmal"><?php echo $es_booksupplier_master->fld_name; ?></td>
<td align="left" valign="middle" class="narmal"><?php echo $es_booksupplier_master->fld_address; ?><br />
  <?php echo $es_booksupplier_master->fld_city; ?>, <?php echo $es_booksupplier_master->fld_state; ?>, <?php echo $es_booksupplier_master->fld_country; ?></td> 

<td align="left" valign="middle" class="narmal"><?php	if($es_booksupplier_master->fld_email!=""){ ?>

Email:<?php echo $es_booksupplier_master->fld_email; ?><br />
<?php } ?>
Office No:<?php echo $es_booksupplier_master->fld_office_no; ?><br/> 
<?php	if($es_booksupplier_master->fld_mobile_no!=""){ ?>
Mobile No:<?php echo $es_booksupplier_master->fld_mobile_no; ?><br/>
<?php } ?> 
<?php	if($es_booksupplier_master->fld_fax!=""){ ?>
Fax:<?php echo $es_booksupplier_master->fld_fax; ?>
<?php } ?>
</td>

</tr>

<?php 

$rw++;
$slno++;


} ?> 
</table> 
</td>
</tr>  

<?php } ?>

<?php
if($action=="add_order")
{
?>

<script type="text/javascript">
function onSelection(id, val)
{
var code_id = "item_code["+id+"]";
var name_id = "item_name["+id+"]";
document.getElementById(code_id).value = val;
document.getElementById(name_id).value = val;
}
function validateorder(cn)
{
var i=cn;
if(document.getElementById("order_date").value=="") {
alert("Please Select Order Date");
return false;
}
else if(document.getElementById("fld_booksupplier").value=="")
{
alert("Please Select Supplier Name");
document.getElementById("fld_booksupplier").focus();
return false;
}
for ( idno=1; idno<=i; idno++ )
{
var cdid = "item_code["+idno+"]";
var nmid = "item_name["+idno+"]";
var qtyid = "quantity["+idno+"]";
if(document.getElementById(cdid).value=="" || document.getElementById(nmid).value=="") {
alert("Please Select Item");
document.getElementById(nmid).focus();
return false;
}
else if(document.getElementById(qtyid).value == "") {
alert("Please Enter Quantity");
document.getElementById(qtyid).focus();
return false;
}
else if(!document.getElementById(qtyid).value.match(/^((\d+(\.\d*)?)|((\d*\.)?\d+))$/) || document.getElementById(qtyid).value==0)
{
alert("Invalid Quantity Format");
document.getElementById(qtyid).focus();
return false;
}

}
}
var i = 1;
function changeIt(totrow){
for ( idno=1; idno<=i; idno++ )
{
var cdid = "item_code["+idno+"]";
var nmid = "item_name["+idno+"]";
var qtyid = "quantity["+idno+"]";
if(document.getElementById(cdid).value=="" || document.getElementById(nmid).value=="") {
alert("Please Select Item");
document.getElementById(nmid).focus();
return false;
}
else if(document.getElementById(qtyid).value == "") {
alert("Please Enter Quantity");
document.getElementById(qtyid).focus();
return false;
}
else if(!document.getElementById(qtyid).value.match(/^((\d+(\.\d*)?)|((\d*\.)?\d+))$/))
{
alert("Invalid Quantity Format");
document.getElementById(qtyid).focus();
return false;
}
else if(parseInt(document.getElementById(qtyid).value)==0 )
{
alert("Please Enter Quantity >0");
document.getElementById(qtyid).focus();
return (false);
}
}
var ele_length = eval("document.inv_orders.elements.length");
ele_id_array = new Array(ele_length);
ele_val_array = new Array(ele_length);

for ( k=0; k<ele_length; k++ )
{
ele_id_array[k] = document.inv_orders.elements[k].id;
ele_val_array[k] = document.inv_orders.elements[k].value;
}
if(totrow > i)
{
i = totrow;
i++;
//alert("if"+i);
} else {
++i;
//alert("eee"+i);
}

document.getElementById("my_div").innerHTML = document.getElementById("my_div").innerHTML +"<table width='100%' border='0' cellpadding='0' cellspacing='0' bordercolor='#CCCCCC'><tr><td width='10%' align='center'>"+i+"</td><td width='30%' align='center'><select name='item_code["+i+"]' id='item_code["+i+"]' style='width:100%;' onchange='onSelection("+i+",this.value)' onblur='onSelection("+i+",this.value)'><option value=''>.....Select Item Code.....</option><?php
foreach($in_itemsList as $item){
echo "<option value='$item->fld_in_item_masterId'>$item->fld_item_code</option>";
}
?></select></td><td width='30%' align='center'><select name='item_name["+i+"]' id='item_name["+i+"]' style='width:100%;' onchange='onSelection("+i+",this.value)' onblur='onSelection("+i+",this.value)'><option value=''>.....Select Item Name.....</option><?php 
foreach($in_itemsList as $item)
{
echo "<option value='$item->fld_in_item_masterId'>$item->fld_item_name</option>";
}
?></select></td><td width='30%' align='center'><input name='quantity["+i+"]' id='quantity["+i+"]' value='' style='width:97%;' /></td></tr></table>";



var len_v = ele_val_array.length;
for ( n=0; n<len_v; n++ )
{
var dyn_id = ele_id_array[n];
var dyn_val = ele_val_array[n];
document.getElementById(dyn_id).value = dyn_val;
}

}
function DeleteRow(delrw)
{
var ele_length = eval("document.inv_orders.elements.length");
ele_id_array = new Array(ele_length);
ele_val_array = new Array(ele_length);

for ( k=0; k<ele_length; k++ )
{
ele_id_array[k] = document.inv_orders.elements[k].id;
ele_val_array[k] = document.inv_orders.elements[k].value;
}

var j = --i;
if(i<delrw)
i = delrw-1;


document.getElementById("my_div").innerHTML = "";

if(i < delrw) {
alert("You can not delete more Rows.");
return false;
}

if(i>=delrw)
{
i=delrw;
while(i<=j)
{
document.getElementById("my_div").innerHTML = document.getElementById("my_div").innerHTML +"<table width='100%' border='0' cellpadding='0' cellspacing='0' bordercolor='#CCCCCC'><tr><td width='10%' align='center'>"+i+"</td><td width='30%' align='center'><select name='item_code["+i+"]' id='item_code["+i+"]' style='width:100%;' onchange='onSelection("+i+",this.value)' onblur='onSelection("+i+",this.value)'><option value=''>.....Select Item Code.....</option><?php
foreach($in_itemsList as $item)
{
echo "<option value='$item->fld_in_item_masterId'>$item->fld_item_code</option>";
}
?></select></td><td width='30%' align='center'><select name='item_name["+i+"]' id='item_name["+i+"]' style='width:100%;' onchange='onSelection("+i+",this.value)' onblur='onSelection("+i+",this.value)'><option value=''>.....Select Item Name.....</option><?php
foreach($in_itemsList as $item)
{
echo "<option value='$item->fld_in_item_masterId'>$item->fld_item_name</option>";
}
?></select></td><td width='30%' align='center'><input name='quantity["+i+"]' id='quantity["+i+"]' value='' style='width:97%;' /></td></tr></table>";

if(i==j)
{
break;
}
else {
i++;
}
}
}

var len_v = ele_val_array.length - 6;
for ( n=0; n<len_v; n++ )
{
var dyn_id = ele_id_array[n];
var dyn_val = ele_val_array[n];
document.getElementById(dyn_id).value = dyn_val;
}
}


function newWindowOpen (href) {

window.open(href,null,  'width=900,height=900,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');
}

</script>
<style type="text/css">
.plain {height:20px; vertical-align:middle;}
</style>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="3" colspan="3"></td>
</tr>
<!--<tr>
<td  colspan="7" align="right"><input type="button" value="Print" class="bgcolor_02" onclick="newWindowOpen('?pid=7&action=supplier_print')"  /></td>
</tr>-->
<tr>
<td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Purchase Order</span></a></td>
</tr>
<tr>
<td width="1" class="bgcolor_02"></td>
<td align="left" valign="top">
<form name="inv_orders" action="" method="post" >
<table width="100%" border="0" cellspacing="0" cellpadding="1">
<tr>
<td height="35" colspan="2"><p class="admin">&nbsp;&nbsp;Order Details</p></td>
</tr>
<tr>
<td colspan="2" align="center" valign="top" >
<table width="98%" border="0" cellspacing="3" cellpadding="0">
<tr>
<td width="19%" class="narmal" align="left" >Order No </td>
<td width="81%" class="narmal" align="left"><b><?php echo $nextOrder;?></b></td>
</tr>
<!--
<tr>
<td class="narmal">Order Date </td>
<td class="narmal"><input class="plain" name="order_date" id="order_date" value="" size="19"></td>
</tr>
-->
<tr>
<td align="left" class="narmal">Order Date &amp; Time</td>
<td align="left" class="narmal"><input class="plain" name="order_date" readonly id="order_date" value="" size="19"><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.inv_orders.order_date);return false;" ><img name="popcal" align="absmiddle" src="<?php echo JS_PATH ?>/DateTime/calbtn.gif" width="34" height="22" border="0" alt=""></a><iframe width=188 height=166 name="gToday:datetime:agenda.js:gfPop:plugins_time.js" id="gToday:datetime:agenda.js:gfPop:plugins_time.js" src="<?php echo JS_PATH ?>/DateTime/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>
<font color="#FF0000">*</font></td>
</tr>
<tr>
<td align="left" class="narmal">Supplier Name</td>
<td align="left" class="narmal">
<select name="fld_booksupplier" id="fld_booksupplier">
<option value="">.........select..........</option>
<?php
foreach($in_supplierList as $sup){
echo "<option value='$sup->fld_in_supplier_masterId'>$sup->fld_name</option>";
}
?>
</select>
<font color="#FF0000">*</font>                                                                  </td>
</tr>
</table>
</td>
</tr>
<tr>
<td colspan="2">&nbsp;</td>
</tr>
<tr>
<td colspan="2">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="100%" height="20" colspan="3" class="admin">&nbsp;&nbsp;Purchase Order List</td>
</tr>
<tr>
<td height="20" colspan="3" class="narmal">
<table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
<tr class="bgcolor_02">
<td width="10%"  height="20" align="center" class="admin">S.No</td>
<td width="30%" align="center" class="admin">Item Code</td>
<td width="30%" align="center" class="admin">Item Name</td>
<td width="30%" align="center" class="admin">Quantity</td>
</tr>
<?php
$cn = 1;

if($Ord_itemList!="")
{
foreach($Ord_itemList as $orIt)
{
?>
<tr>
<td align="center"><?php echo $cn;?></td>
<td align="center">
<select name="item_code[<?php echo $cn;?>]" id="item_code[<?php echo $cn;?>]" style="width:100%;" onchange="onSelection('<?php echo $cn;?>',this.value);" onblur="onSelection('<?php echo $cn;?>',this.value);">
<option value="">.....Select Item Code.....</option>
<?php
foreach($in_itemsList as $item)
{
if($item->fld_in_item_masterId == $orIt['fld_item_masterid'])
$sel = "selected";
else
$sel = "";

echo "<option value='$item->fld_in_item_masterId' $sel>$item->fld_item_code</option>";
}
?>
</select>
</td>
<td align="center">
<select name="item_name[<?php echo $cn;?>]" id="item_name[<?php echo $cn;?>]" style="width:100%;" onchange="onSelection('<?php echo $cn;?>',this.value);" onblur="onSelection('<?php echo $cn;?>',this.value);">
<option value="" >.....Select Item Name.....</option>
<?php
foreach($in_itemsList as $item)
{
if($item->fld_item_masterid == $orIt['fld_item_masterid'])
$sel = "selected";
else
$sel = "";

echo "<option value='$item->fld_in_item_masterId' $sel>$item->fld_item_name</option>";
}
?>
</select>

</td>
<td align="center"><input name="quantity[<?php echo $cn;?>]" id="quantity[<?php echo $cn;?>]" value="" style="width:97%;" /></td>
</tr>
<?php
$cn++;
}
}
else
{
?>
<tr>
<td align="center">1</td>
<td align="center" class="admin">


<select name="item_code[1]" id="item_code[1]" style="width:100%;" onchange="onSelection('1',this.value);" onblur="onSelection('1',this.value);">
<option value="">.....Select Item Code.....</option>
<?php
foreach($in_itemsList as $item)
{
echo "<option value='$item->fld_in_item_masterId'>$item->fld_item_code</option>";
}
?>
</select>
</td>
<td align="center" class="admin">
<select name="item_name[1]" id="item_name[1]" style="width:100%;" onchange="onSelection('1',this.value);" onblur="onSelection('1',this.value);">
<option value="">.....Select Item Name.....</option>
<?php
foreach($in_itemsList as $item)
{
echo "<option value='$item->fld_in_item_masterId'>$item->fld_item_name</option>";
}
?>
</select>
<?php
$query="SELECT * FROM es_itembook_master WHERE fld_item_code = '".$item_code[1]."' AND fld_item_name = '".$item_name[1]."'	";
?>
</td>
<td align="center" class="admin"><input name="quantity[1]" id="quantity[1]" value="" style="width:97%;" /></td>
</tr>
<?php } ?>
</table>
<div id="my_div"></div>
</td>
</tr>
<tr>
<td height="20" colspan="3" align="right" valign="middle">
<!--<a href="javascript:void(0);" onClick="changeIt()" class="admin">Add More Row</a>
<a href="javascript:void(0);" onClick="DeleteRow()" class="admin">Delete Last Row</a>-->
<input type="button" name="addrow" id="addrow" class="bgcolor_02" value="Add More Row" onClick="changeIt('<?php echo $cn-1;?>')">&nbsp;&nbsp;
<input type="button" name="deleterow" id="deleterow" class="bgcolor_02" value="Delete Last Row" onClick="DeleteRow('<?php if($Ord_itemList !="") echo $cn; else echo $cn+1;?>')">
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td width="15%" align="right">&nbsp;</td>
<td width="85%" align="left">&nbsp;</td>
</tr>
<tr>
<td colspan="2" align="center" height="40" valign="middle"><input type="submit" name="Submit" id="Submit" class="bgcolor_02" value="Add To Order" onclick="return validateorder('<?php echo $cn;?>');" /></td>
</tr>
</table>
</form>
</td>
<td width="1" class="bgcolor_02"></td>
</tr>
<tr>
<td height="1" colspan="3" class="bgcolor_02"></td>
</tr>
</table>
<?php
}
if($action=="goods_reciept")
{
?>
<script type="text/javascript">

function validatereciept()
{
if(document.getElementById("fld_recdate").value=="") {
alert("Please Select GRN Date");
return false;
}
else if(document.getElementById("fld_booksupplier").value=="")
{
alert("Please Select Supplier Name");
document.getElementById("fld_booksupplier").focus();
return false;
}
else if(document.getElementById("fld_recbillno").value=="")
{
alert("Please SelectBill Number");
document.getElementById("fld_recbillno").focus();
return false;
}
for ( idno=1; idno<=i; idno++ )
{
var cdid = "item_code["+idno+"]";
var nmid = "item_name["+idno+"]";
var qtyid = "quantity["+idno+"]";
var prc = "price["+idno+"]";
if(document.getElementById(cdid).value=="" || document.getElementById(nmid).value=="") {
alert("Please Select Item");
document.getElementById(nmid).focus();
return false;
}
else if(document.getElementById(qtyid).value == "") {
alert("Please Enter Quantity");
document.getElementById(qtyid).focus();
return false;
}
else if(!document.getElementById(qtyid).value.match(/^((\d+(\.\d*)?)|((\d*\.)?\d+))$/))
{
alert("Invalid Quantity Format");
document.getElementById(qtyid).focus();
return false;
}
else if(parseInt(document.getElementById(qtyid).value)==0 )
{
alert("Please Enter Quantity >0");
document.getElementById(qtyid).focus();
return (false);
}
else if(document.getElementById(prc).value == "" || parseInt(document.getElementById(prc).value)<=0 ) {
alert("Please Enter Price");
document.getElementById(prc).focus();
return false;
}
else if(!document.getElementById(prc).value.match(/^((\d+(\.\d*)?)|((\d*\.)?\d+))$/))
{
alert("Invalid Price Format");
document.getElementById(prc).focus();
return false;
}

}
}

function showSupplier(ord,supArr)
{
var ArrSup = new Array();
ArrMix = supArr.split("$");
ArrOrdid = ArrMix[0].split("#");
ArrSupl = ArrMix[1].split("#");
for(qqq=0;qqq<ArrOrdid.length;qqq++)
{
if(ArrOrdid[qqq] == ord)
{
supliernm = ArrSupl[qqq];
}
}
document.getElementById("fld_booksupplier").value = supliernm;
}
function showOrderItems(ord,supArr)
{
if(document.getElementById("es_bookordersid").value != "")
{
document.goods_reciept.submit();
}
}
function onSelection(id, val)
{
alert();
var code_id = "item_code["+id+"]";
var name_id = "item_name["+id+"]";
document.getElementById(code_id).value = val;
document.getElementById(name_id).value = val;
}
function calculateamount(id)
{
if(isNaN(id)) {
if(!document.getElementById(id).value.match(/^((\d+(\.\d*)?)|((\d*\.)?\d+))$/))
{
alert("Invalid Price");
document.getElementById(id).focus();
return false;
}
var loop = document.getElementById("looplength").value;
}
else {
var loop = id;
var tot = 0;
}

//alert(loop);

var tot = 0;
for(z=1;z<=loop;z++)
{
var itm = "item_name["+z+"]";
var qty = "quantity["+z+"]";
var prc = "price["+z+"]";
var amt = "amount["+z+"]";
var quantity = document.getElementById(qty).value;
var price = document.getElementById(prc).value;
if(quantity!="" && quantity!=0 && price!="" && price!=0)
{
var amount = quantity * price;
document.getElementById(amt).value = amount;
tot = tot + amount;
if(document.getElementById(itm).value=="") {
alert("Please Select the Item");
document.getElementById(itm).focus();
}
document.getElementById("fld_totalamount").value = tot;
document.getElementById("total").innerHTML = tot;
}
}
}
var i = 1;
function changeIt(totrow){

var ele_length = eval("document.goods_reciept.elements.length");
ele_id_array = new Array(ele_length);
ele_val_array = new Array(ele_length);

for ( k=0; k<ele_length; k++ )
{
ele_id_array[k] = document.goods_reciept.elements[k].id;
ele_val_array[k] = document.goods_reciept.elements[k].value;
}

if(totrow > i)
{
i = totrow;
i++;
//alert("if"+i);
} else {
++i;
//alert("eee"+i);
}

document.getElementById("my_div").innerHTML = document.getElementById("my_div").innerHTML +"<table width='100%' border='0' cellpadding='0' cellspacing='0' bordercolor='#CCCCCC'><tr><td width='10%' align='center'>"+i+"</td><td width='18%' align='center'><select name='item_code["+i+"]' id='item_code["+i+"]' style='width:100%;' onchange='onSelection("+i+",this.value)' onblur='onSelection("+i+",this.value)'><option value=''>Select Code</option><?php
foreach($in_itemsList as $item){
echo "<option value='$item->fld_in_item_masterId'>$item->fld_item_code</option>";
}
?></select></td><td width='18%' align='center'><select name='item_name["+i+"]' id='item_name["+i+"]' style='width:100%;' onchange='onSelection("+i+",this.value)' onblur='onSelection("+i+",this.value)'><option value=''>Select Name</option><?php 
foreach($in_itemsList as $item)
{
echo "<option value='$item->fld_in_item_masterId'>$item->fld_item_name</option>";
}
?></select></td><td width='18%' align='center'><input name='quantity["+i+"]' id='quantity["+i+"]' value='' style='width:97%;' onblur='calculateamount(this.id);' /></td><td width='18%' align='center'><input name='price["+i+"]' id='price["+i+"]' value='' style='width:97%;' onblur='calculateamount(this.id);' /></td><td width='18%' align='center'><input name='amount["+i+"]' id='amount["+i+"]' value='' style='width:97%;' readonly /></td></tr></table>";



var len_v = ele_val_array.length;
for ( n=0; n<len_v; n++ )
{
var dyn_id = ele_id_array[n];
var dyn_val = ele_val_array[n];
document.getElementById(dyn_id).value = dyn_val;
}

document.getElementById("looplength").value = i;
}
function DeleteRow(delrw)
{
var ele_length = eval("document.goods_reciept.elements.length");
ele_id_array = new Array(ele_length);
ele_val_array = new Array(ele_length);

for ( k=0; k<ele_length; k++ )
{
ele_id_array[k] = document.goods_reciept.elements[k].id;
ele_val_array[k] = document.goods_reciept.elements[k].value;
}

var j = --i;
if(i<delrw)
i = delrw-1;


document.getElementById("my_div").innerHTML = "";

if(i < delrw) {
alert("You can not delete more Rows.");
return false;
}

if(i>=delrw)
{
i=delrw;
while(i<=j)
{

document.getElementById("my_div").innerHTML = document.getElementById("my_div").innerHTML +"<table width='100%' border='0' cellpadding='0' cellspacing='0' bordercolor='#CCCCCC'><tr><td width='10%' align='center'>"+i+"</td><td width='18%' align='center'><select name='item_code["+i+"]' id='item_code["+i+"]' style='width:100%;' onchange='onSelection("+i+",this.value)' onblur='onSelection("+i+",this.value)'><option value=''>.....Select Item Code.....</option><?php
foreach($in_itemsList as $item){
echo "<option value='$item->fld_in_item_masterId'>$item->fld_item_code</option>";
}
?></select></td><td width='18%' align='center'><select name='item_name["+i+"]' id='item_name["+i+"]' style='width:100%;' onchange='onSelection("+i+",this.value)' onblur='onSelection("+i+",this.value)'><option value=''>.....Select Item Name.....</option><?php 
foreach($in_itemsList as $item)
{
echo "<option value='$item->fld_in_item_masterId'>$item->fld_item_name</option>";
}
?></select></td><td width='18%' align='center'><input name='quantity["+i+"]' id='quantity["+i+"]' value='' style='width:97%;' onblur='calculateamount(this.id);' /></td><td width='18%' align='center'><input name='price["+i+"]' id='price["+i+"]' value='' style='width:97%;' onblur='calculateamount(this.id);' /></td><td width='18%' align='center'><input name='amount["+i+"]' id='amount["+i+"]' value='' style='width:97%;' readonly /></td></tr></table>";

if(i==j)
{
break;
}
else {
i++;
}
}
}

var len_v = ele_val_array.length - 10;
for ( n=0; n<len_v; n++ )
{
var dyn_id = ele_id_array[n];
var dyn_val = ele_val_array[n];
document.getElementById(dyn_id).value = dyn_val;
}

calculateamount(j);

}
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="3" colspan="3"></td>
</tr>
<tr>
<td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Goods Receipt Note (GRN)</span></td>
</tr>
<tr>
<td width="1" class="bgcolor_02"></td>
<td align="left" valign="top">
<form name="goods_reciept" action="" method="post" >
<table width="100%" border="0" cellspacing="0" cellpadding="1">
<tr>
<td colspan="2" align="center" valign="top" >
<table width="98%" border="0" cellspacing="3" cellpadding="0">
<tr>
<td width="25%" class="narmal" align="left" >GRN No.</td>
<td width="75%" class="narmal" align="left"><input type="hidden" name="fld_recnote" id="fld_recnote" value="<?php echo $nextGrn;?>" /><?php echo $nextGrn;?></td>
</tr>
<tr>
<td align="left" class="narmal">Order No.</td>
<td align="left" class="narmal">
<select name="es_bookordersid" id="es_bookordersid" onchange="showOrderItems(this.value,'<?php echo $ArrOrdidSupnm;?>')">
<option value="">.........select..........</option>
<?php
foreach($in_OrdersList as $ord){
if($OrdItemList->es_in_bookordersId == $ord->es_in_bookordersId) {
$sel = "selected";
} else {
$sel = "";
}
echo "<option value='$ord->es_in_bookordersId' $sel >$ord->es_in_bookordersId</option>";
}
?>
</select>                                                                  </td>
</tr>
<tr>
<td align="left" class="narmal">Supplier Name</td>
<td align="left" class="narmal">
<select name="fld_booksupplier" id="fld_booksupplier" disabled >
<option value="">.........select..........</option>
<?php
foreach($in_supplierList as $sup){
if($OrdItemList->fld_booksupplier == $sup->fld_in_supplier_masterId) {
$sel = "selected";
} else {
$sel = "";
}
echo "<option value='$sup->fld_in_supplier_masterId' $sel >$sup->fld_name</option>";
}
?>
</select>                                                                  </td>
</tr>
<!--<tr>
<td class="narmal">GRN Date</td>
<td class="narmal"><input type="text" name="in_rec_date" id="in_rec_date" /></td>
</tr>-->
<tr>
<td align="left" class="narmal">GRN Date</td>
<td align="left" class="narmal"><input class="plain" name="in_rec_date" id="in_rec_date" value="" size="19" readonly=""><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.goods_reciept.in_rec_date);return false;" ><img name="popcal" align="absmiddle" src="<?php echo JS_PATH ?>/DateTime/calbtn.gif" width="34" height="22" border="0" alt=""></a><iframe width=188 height=166 name="gToday:datetime:agenda.js:gfPop:plugins_time.js" id="gToday:datetime:agenda.js:gfPop:plugins_time.js" src="<?php echo JS_PATH ?>/DateTime/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>
<font color="#FF0000">*</font></td>
</tr>
<tr>
<td align="left" class="narmal">Bill No.</td>
<td align="left" class="narmal"><input type="text" name="fld_recbillno" id="fld_recbillno" />
<font color="#FF0000">*</font></td>
</tr>
</table>                                                </td>
</tr>
<tr>
<td colspan="2">&nbsp;</td>
</tr>
<?php
if($ItemsPurchased!="")
{
?>
<tr>
<td colspan="2">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="84%" height="20" colspan="3" class="narmal"><span class="admin">Purchase Order List</span></td>
</tr>
<tr>
<td height="20" colspan="3" class="narmal">
<table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
<tr class="bgcolor_02">
<td width="10%"  height="20" align="center" class="admin">S.No</td>
<td width="18%" align="center" class="admin">Item Code</td>
<td width="18%" align="center" class="admin">Item Name</td>
<td width="18%" align="center" class="admin">Quantity</td>
<td width="18%" align="center"class="admin">Price</td>
<td width="18%" align="center" class="admin">Amount</td>
</tr>

<?php
$cn = 1;

foreach($ItemsPurchased as $orIt)
{
?>
<tr>
<td align="center" class="narmal"><?php echo $cn;?></td>
<td align="center" class="narmal"><input type="hidden" name="item_code[<?php echo $cn;?>]" value="<?php echo $orIt['item_code']; ?>" />
<select  id="item_code[<?php echo $cn;?>]" style="width:100%;" onchange="onSelection('<?php echo $cn;?>',this.value);" onblur="onSelection('<?php echo $cn;?>',this.value);" disabled="disabled">
<option value="">Select Code</option>
<?php
foreach($in_itemsList as $item)
{
if($item->fld_item_masterid == $orIt['item_code'])
$sel = "selected";
else
$sel = "";
echo "<option value='$item->fld_in_item_masterId' $sel >$item->fld_item_code</option>";
}
?>
</select>                                                                                                      </td>
<td align="center" class="narmal"><input type="hidden" name="item_name[<?php echo $cn;?>]" value="<?php echo $orIt['item_name']; ?>" />
<select  id="item_name[<?php echo $cn;?>]" style="width:100%;" onchange="onSelection('<?php echo $cn;?>',this.value);" onblur="onSelection('<?php echo $cn;?>',this.value);" disabled="disabled" >
<option value="">Select Name</option>
<?php
foreach($in_itemsList as $item)
{
if($item->fld_item_masterid == $orIt['item_name'])
$sel = "selected";

else
$sel = "";

echo "<option value='$item->fld_in_item_masterId' $sel >$item->fld_item_name</option>";
}
?>
</select>                                                                                                      </td>
<td align="center" class="narmal"><input name="quantity[<?php echo $cn;?>]" id="quantity[<?php echo $cn;?>]" value="<?php if($orIt['item_name']!="") echo $orIt['quantity']; ?>" style="width:97%;" onblur="calculateamount(this.id);" readonly/></td>
<td align="center" class="narmal"><input name="price[<?php echo $cn;?>]" id="price[<?php echo $cn;?>]" value="" style="width:97%;" onblur="calculateamount(this.id);" /></td>
<td align="center" class="narmal"><input name="amount[<?php echo $cn;?>]" id="amount[<?php echo $cn;?>]" value="" style="width:97%;" readonly /></td>
</tr>
<?php
$cn++;
}
?>
</table>
<div id="my_div"></div>                                                                  </td>
</tr>
<tr>
<td height="20" colspan="3" >
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="82%"  height="20" align="right">Total Amount : </td>
<td width="18%" align="center" id="total">0</td>
</tr>
</table>                                                                  </td>
</tr>
<tr>
<td height="20" colspan="3" align="right" class="narmal">
<input type="hidden" name="fld_totalamount" id="fld_totalamount" value="" />

<!--<input type="button" name="addrow" id="addrow" class="bgcolor_02" value="Add More Row" onClick="changeIt(<?php //echo $cn-1;?>)">&nbsp;&nbsp;
<input type="button" name="deleterow" id="deleterow" class="bgcolor_02" value="Delete Last Row" onClick="DeleteRow(<?php //if($ItemsPurchased !="") echo $cn; else echo $cn+1;?>)">-->
<input type="hidden" name="looplength" id="looplength" value="<?php echo $cn-1;?>" />                                                                  </td>
</tr>
</table>                                                </td>
</tr>
<tr>
<td width="15%" align="right">&nbsp;</td>
<td width="85%" align="left">&nbsp;</td>
</tr>
<?php ///// narsimha///////?>
<tr><td colspan="2" align="center">
<table width="90%" border="0" cellpadding="0" cellspacing="0">

<tr>
<td  align="left" class="narmal" colspan="2">Voucher Type&nbsp;:</td>
<td  align="left" class="narmal" colspan="3">
<select name="vocturetypesel" style="width:130px;">
<?php 
$voucherlistarr = voucher_finance();
krsort($voucherlistarr);
foreach($voucherlistarr as $eachvoucher) {	?>
<option value="<?php echo $eachvoucher['es_voucherid']; ?>" <?php if ($vocturetypesel==$eachvoucher['es_voucherid']){                        echo 'selected'; } elseif($eachvoucher['es_voucherid']==9){ echo 'selected';}?> ><?php echo $eachvoucher['voucher_type'];                        ?> ( <?php echo $eachvoucher['voucher_mode']; ?> )</option>   
<?php } ?></select>					</td>
</tr>
<tr>
<td align="left" class="narmal" colspan="2">Ledger Type&nbsp;: </td>
<td align="left" colspan="3">
<select name="es_ledger" style="width:130px;">
<?php 
$ledgerlistarr = ledger_finance();
foreach($ledgerlistarr as $eachledger) { 
?>
<option value="<?php echo $eachledger['lg_name']; ?>" <?php if($es_ledger==$eachledger['lg_name']) { echo                        'selected'; } elseif($eachledger['lg_name']=='Staff Salary'){echo 'selected';} ?>><?php echo $eachledger['lg_name']; ?>						                        </option>
<?php } ?>
</select>															</td>
</tr>
<tr>
<script type="text/javascript" >
function showAvatar()
{
var ch = document.goods_reciept.es_paymentmode.value;
if (ch=='cash'){
document.getElementById("patiddivdisp").style.display="none";
}else{
document.getElementById("patiddivdisp").style.display="block";
}
}		  
</script>
<td align="left" class="narmal" colspan="2">Payment mode&nbsp;:</td>
<td align="left" class="narmal" colspan="3"> 
<select name="es_paymentmode" onchange="Javascript:showAvatar();" style="width:130px;">
<option value="cash">Cash</option>
<option value="cheque">Cheque</option>
<option value="dd">DD</option>                        
</select>					</td>
</tr>
<tr>
<td align="left" colspan="5" height="10"></td>
</tr>
<tr>
<td colspan="5" align="center">		
<div  id="patiddivdisp" style="display:none;" >
<table  border="0" cellspacing="0" class="tbl_grid" width="100%" cellpadding="3">


<tr>
<td align="left" class="bgcolor_02" colspan="3">Bank Details </td>
</tr>

<tr>
<td align="left"   width="48%" class="narmal" >Bank Name </td>
<td align="center"  width="4%">:</td>
<td align="left"  width="48%"><input type="text" name="es_bank_name" value="<?php echo $es_bank_name;?>" /></td>
</tr>
<tr>
<td align="left"  class="narmal"> Account Number</td>
<td align="center">:</td>
<td align="left" ><input type="text" name="es_bankacc" value="<?php echo $es_bankacc;?>" /><font color="#FF0000">                                <b>*</b></font></td>
</tr>
<tr>
<td align="left" class="narmal">Cheque / DD Number </td>
<td align="center">:</td>
<td align="left"><input type="text" name="es_checkno" value="<?php echo $es_checkno;?>" /><font color="#FF0000">                                <b>*</b></font></td>
</tr>
<tr>
<td align="left" class="narmal">Teller Number </td>
<td align="center">:</td>
<td align="left"><input type="text" name="es_teller_number" value="<?php echo $es_teller_number;?>" /></td>
</tr>
<tr>
<td align="left" class="narmal">Pin </td>
<td align="center">:</td>
<td align="left"><input type="text" name="es_bank_pin" value="<?php echo $es_bank_pin;?>" /></td>
</tr>
</table>	
</div>					</td>
</tr>
<tr>
<td align="left" colspan="5" height="10"></td>
</tr>
<tr>
<td align="left" class="narmal" colspan="2">&nbsp;Narration</td>
<td align="left" colspan="3"><textarea name="es_narration" rows="3" cols="50"></textarea></td>
</tr>
<tr>
<td align="left" colspan="5" height="10"></td>
</tr>
</table>
</td>
</tr>
<?php /////end narsimha////?>

<tr>
<td colspan="2" align="center" height="40" valign="middle"><input type="submit" name="Submit" id="Submit" class="bgcolor_02" value="Add Reciept Note" onclick="return validatereciept();"  /></td>
</tr>
<?php } ?>
</table>
</form>
</td>
<td width="1" class="bgcolor_02"></td>
</tr>
<tr>
<td height="1" colspan="3" class="bgcolor_02"></td>
</tr>
</table>
<?php
}
if($action=='stock_details'){
?>
<script type="text/javascript">
function SelectChkbox()
{
var oInputs = document.getElementsByTagName('input');
if(document.getElementById("checkall").checked == true) {
var ischked = true;
}else{
var ischked = false;
}
for ( i = 0; i < oInputs.length; i++ )
{
// loop through and find <input type="checkbox"/>
if (oInputs[i].type == 'checkbox')
{
var chk_box = oInputs[i].id;
document.getElementById(chk_box).checked = ischked;
}
}
activateOrderNow();
}

function activateOrderNow() {
var oInputs = document.getElementsByTagName('input');
var dis = "y";
for ( i = 0; i < oInputs.length; i++ )
{
if (oInputs[i].type == 'checkbox')
{
var chk_box = oInputs[i].id;
if(document.getElementById(chk_box).checked)
{
document.getElementById("OrderNow").disabled = false;
dis = "n"
}
}
}
if(dis=="y") {
document.getElementById("OrderNow").disabled = true;
//return false;
}
}

function validatesearch()
{
if(document.getElementById("selectview").value =="") {
document.getElementById("selectviewerror").innerHTML = "Please Select Report Type";
document.getElementById("selectview").focus();
return false;
}
}
</script>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="3" colspan="3"></td>
</tr>
<tr>
<td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span>Stock Details</span></a></td>
</tr>
<tr>
<td width="1" class="bgcolor_02"></td>
<td  align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="10"></td>
</tr>
<tr>
<td><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td colspan="5" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td>
<form action="" method="post" name="inventory" id="inventory" >

<table width="100%">

<tr>
<td width="136" class="admin">Last&nbsp;Received&nbsp;Date</td>
<td width="249"><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="44%" class="narmal">From:</td>
<td width="35%"><input class="plain" name="dc1" value="<?php
if (isset($dc1)){ 
echo $_POST['dc1'];
}
?>"  size="12" onfocus="this.blur()" readonly="readonly" /></td>
<td width="21%"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fStartPop(document.inventory.dc1,document.inventory.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a></td>
</tr>
</table></td>


<td width="782"><table width="94%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="20%"  class="narmal">To:</td>
<td width="10%"><input class="plain" name="dc2" value="<?php
if (isset($dc2)){ 
echo $_POST['dc2'];
}
?>"size="12" onfocus="this.blur()" readonly="readonly" /></td>
<td width="70%"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fEndPop(document.inventory.dc1,document.inventory.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a></td>
</tr>
</table></td>
<td width="25"><input type="submit" name="Search" value="Search" class="bgcolor_02" onclick="return validatesearch();" 
/></td>
</tr>
<?php /*?><tr>
<td class="admin">Reorder Level </td>
<td><select name="reorder">
<option value="">ALL</option>
<option value="1" <?php if($reorder=="1") echo "selected"; ?> >Below</option>
<option value="2" <?php if($reorder=="2") echo "selected"; ?> >Above</option>
</select></td>
<td></td>
<td>&nbsp;</td>
</tr><?php */?>
</table>
</form>
<iframe width=132 height=142 name="gToday:contrast:agenda.js" id="gToday:contrast:agenda.js" src="<?php echo JS_PATH ?>/DateRange/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe> </td>
</tr>
<tr>
<td><table width="100%" border="0" cellpadding="1" cellspacing="1" bordercolor="#CCCCCC">
<form action="<?php echo "?pid=$pid&action=add_order";?>" method="post" name="orderitems" id="orderitems" >
<tr>
<td height="10" colspan="8"></td>
</tr>
<?php
if(count($in_itemsList) > 0) {
?>
<tr class="bgcolor_02">
<td width="5%"  height="20" align="center"><input type="checkbox" name="checkall" id="checkall" onclick="SelectChkbox();" /></td>
<td width="15%" align="center" class="admin">Item&nbsp;Code</td>
<td width="15%" align="left" class="admin">Item&nbsp;Name</td>
<td width="10%" align="center" class="admin">Units</td>
<td width="13%" align="center" class="admin">Qty&nbsp;in&nbsp;hand</td>
<td width="15%" align="center" class="admin">Last&nbsp;Recv&nbsp;Date</td>
<td width="15%" align="center" class="admin">Last&nbsp;Issue&nbsp;Date</td>
<td width="12%" align="center" class="admin">RE-Order&nbsp;Level</td>
</tr>
<?php
$bg=1;
foreach($in_itemsList as $item)
{
if($bg%2 == 0)
$class = "even";
else  $class = "odd";
?>
<tr class="<?php echo $class;?>">
<td align="center" ><input type="checkbox" name="checkitem[<?php echo $item->fld_in_item_masterId;?>]" id="checkitem[<?php echo $item->fld_item_masterid;?>]" value="<?php echo $item->fld_in_item_masterId;?>" onclick="return activateOrderNow();" /></td>
<td align="center" class="narmal"><?php echo $item->fld_item_code;?></td>
<td align="left" class="narmal"><?php echo $item->fld_item_name;?></td>
<td align="center" class="narmal"><?php echo $item->fld_units;?></td>
<td align="center" class="narmal"<?php if($item->fld_qty_available < $item->fld_reorder_level){?> style="color:#FF0000; font-weight:bold;"<?php } ?>><?php echo $item->fld_qty_available;?></td>
<td align="center" class="narmal"><?php 

if($item->fld_last_recieved_date!='0000-00-00 00:00:00'){echo displaydate($item->fld_last_recieved_date);}?></td>
<td align="center" class="narmal"><?php if($item->fld_last_issued_date!='0000-00-00 00:00:00'){echo displaydate($item->fld_last_issued_date);}?></td>
<td align="center" class="narmal"><?php echo $item->fld_reorder_level;?></td>
</tr>
<?php
$bg++;
}
?>
<tr>
<td colspan="8" align="center"><?php paginateexte($start, $q_limit, $no_rows, "action=".$action."&column_name=".$orderby."&asds_order=".$asds_order.$searchUrl) ?></td>
</tr>

<tr>
<td colspan="8"  align="left" valign="middle" height="30" style="padding-left:5px;"><input type="submit" name="OrderNow" class="bgcolor_02" id="OrderNow" value="Order Now" disabled /></td>
</tr>
<?php
} else {
?>
<tr>
<td colspan="8" align="center" class="narmal">No Records Found</td>
</tr>
<?php
}
?>
</form>
</table></td>
</tr>
</table></td>
</tr>
</table></td>
</tr>
</table></td>
<td width="1" class="bgcolor_02"></td>
</tr>
<tr>
<td height="1" colspan="3" class="bgcolor_02"></td>
</tr>
</table>
<?php
}
if($action=='goods_issue'){
?>
<script type="text/javascript">
function onSelection(id, val)
{
var code_id = "item_code["+id+"]";
var name_id = "item_name["+id+"]";
document.getElementById(code_id).value = val;
document.getElementById(name_id).value = val;
}
function validateorder(cm)
{
var i=cm;
if(document.getElementById("fld_orderdate").value=="") {
alert("Please Select Order Date");
return false;
}
else if(document.getElementById("fld_booksupplier").value=="")
{
alert("Please Select Supplier Name");
document.getElementById("fld_booksupplier").focus();
return false;
}
for ( idno=1; idno<=i; idno++ )
{
var cdid = "item_code["+idno+"]";
var nmid = "item_name["+idno+"]";
var qtyid = "quantity["+idno+"]";
if(document.getElementById(cdid).value=="" || document.getElementById(nmid).value=="") {
alert("Please Select Item");
document.getElementById(nmid).focus();
return false;
}
else if(document.getElementById(qtyid).value == "") {
alert("Please Enter Quantity");
document.getElementById(qtyid).focus();
return false;
}
else if(!document.getElementById(qtyid).value.match(/^((\d+(\.\d*)?)|((\d*\.)?\d+))$/) || document.getElementById(qtyid).value==0)
{
alert("Invalid Quantity Format");
document.getElementById(qtyid).focus();
return false;
}

}
}
var i = 1;
function changeIt(totrow){
for ( idno=1; idno<=i; idno++ )
{
var cdid = "item_code["+idno+"]";
var nmid = "item_name["+idno+"]";
var qtyid = "quantity["+idno+"]";
if(document.getElementById(cdid).value=="" || document.getElementById(nmid).value=="") {
alert("Please Select Item");
document.getElementById(nmid).focus();
return false;
}
else if(document.getElementById(qtyid).value == "") {
alert("Please Enter Quantity");
document.getElementById(qtyid).focus();
return false;
}
else if(!document.getElementById(qtyid).value.match(/^((\d+(\.\d*)?)|((\d*\.)?\d+))$/))
{
alert("Invalid Quantity Format");
document.getElementById(qtyid).focus();
return false;
}
else if(parseInt(document.getElementById(qtyid).value)==0 )
{
alert("Please Enter Quantity >0");
document.getElementById(qtyid).focus();
return (false);
}
}
var ele_length = eval("document.inv_orders.elements.length");
ele_id_array = new Array(ele_length);
ele_val_array = new Array(ele_length);

for ( k=0; k<ele_length; k++ )
{
ele_id_array[k] = document.inv_orders.elements[k].id;
ele_val_array[k] = document.inv_orders.elements[k].value;
}
if(totrow > i)
{
i = totrow;
i++;
//alert("if"+i);
} else {
++i;
//alert("eee"+i);
}

document.getElementById("my_div").innerHTML = document.getElementById("my_div").innerHTML +"<table width='100%' border='0' cellpadding='0' cellspacing='0' bordercolor='#CCCCCC'><tr><td width='10%' align='center'>"+i+"</td><td width='30%' align='center'><select name='item_code["+i+"]' id='item_code["+i+"]' style='width:100%;' onchange='onSelection("+i+",this.value)' onblur='onSelection("+i+",this.value)'><option value=''>.....Select Item Code.....</option><?php
foreach($in_itemsList as $item){
echo "<option value='$item->fld_in_item_masterId'>$item->fld_item_code</option>";
}
?></select></td><td width='30%' align='center'><select name='item_name["+i+"]' id='item_name["+i+"]' style='width:100%;' onchange='onSelection("+i+",this.value)' onblur='onSelection("+i+",this.value)'><option value=''>.....Select Item Name.....</option><?php 
foreach($in_itemsList as $item)
{
echo "<option value='$item->fld_in_item_masterId'>$item->fld_item_name</option>";
}
?></select></td><td width='30%' align='center'><input name='quantity["+i+"]' id='quantity["+i+"]' value='' style='width:97%;' /></td></tr></table>";



var len_v = ele_val_array.length;
for ( n=0; n<len_v; n++ )
{
var dyn_id = ele_id_array[n];
var dyn_val = ele_val_array[n];
document.getElementById(dyn_id).value = dyn_val;
}

}
function DeleteRow(delrw)
{
var ele_length = eval("document.inv_orders.elements.length");
ele_id_array = new Array(ele_length);
ele_val_array = new Array(ele_length);

for ( k=0; k<ele_length; k++ )
{
ele_id_array[k] = document.inv_orders.elements[k].id;
ele_val_array[k] = document.inv_orders.elements[k].value;
}

var j = --i;
if(i<delrw)
i = delrw-1;


document.getElementById("my_div").innerHTML = "";

if(i < delrw) {
alert("You can not delete more Rows.");
return false;
}

if(i>=delrw)
{
i=delrw;
while(i<=j)
{
document.getElementById("my_div").innerHTML = document.getElementById("my_div").innerHTML +"<table width='100%' border='0' cellpadding='0' cellspacing='0' bordercolor='#CCCCCC'><tr><td width='10%' align='center'>"+i+"</td><td width='30%' align='center'><select name='item_code["+i+"]' id='item_code["+i+"]' style='width:100%;' onchange='onSelection("+i+",this.value)' onblur='onSelection("+i+",this.value)'><option value=''>.....Select Item Code.....</option><?php
foreach($in_itemsList as $item)
{
echo "<option value='$item->fld_in_item_masterId'>$item->fld_item_code</option>";
}
?></select></td><td width='30%' align='center'><select name='item_name["+i+"]' id='item_name["+i+"]' style='width:100%;' onchange='onSelection("+i+",this.value)' onblur='onSelection("+i+",this.value)'><option value=''>.....Select Item Name.....</option><?php
foreach($in_itemsList as $item)
{
echo "<option value='$item->fld_in_item_masterId'>$item->fld_item_name</option>";
}
?></select></td><td width='30%' align='center'><input name='quantity["+i+"]' id='quantity["+i+"]' value='' style='width:97%;' /></td></tr></table>";

if(i==j)
{
break;
}
else {
i++;
}
}
}

var len_v = ele_val_array.length - 6;
for ( n=0; n<len_v; n++ )
{
var dyn_id = ele_id_array[n];
var dyn_val = ele_val_array[n];
document.getElementById(dyn_id).value = dyn_val;
}
}


function newWindowOpen (href) {

window.open(href,null,  'width=900,height=900,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');
}

</script>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="3" colspan="3"></td>
</tr>
<tr>
<td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Goods Issue Note (GIN)</span></a></td>
</tr>
<tr>
<td width="1" class="bgcolor_02"></td>
<td align="left" valign="top">
<form name="inv_orders" action="" method="post" >
<table width="100%" border="0" cellspacing="0" cellpadding="1">
<tr>
<td colspan="2" align="center" valign="top" >
<table width="98%" border="0" cellspacing="3" cellpadding="0">
<tr>
<td width="25%" class="narmal" align="left" >GIN No</td>
<td width="75%" class="narmal" align="left"><?php echo $nextGIN;?></td>
</tr>
<!--<tr>
<td class="narmal">GIN Date</td>
<td class="narmal"><input type="text" name="in_issue_date" id="in_issue_date" /></td>
</tr>-->
<tr>
<td align="left" class="narmal">GIN Date</td>
<td align="left" class="narmal"><input class="plain" name="in_issue_date" id="in_issue_date" value="" size="19"><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.inv_orders.in_issue_date);return false;" ><img name="popcal" align="absmiddle" src="<?php echo JS_PATH ?>/DateTime/calbtn.gif" width="34" height="22" border="0" alt=""></a><iframe width=188 height=166 name="gToday:datetime:agenda.js:gfPop:plugins_time.js" id="gToday:datetime:agenda.js:gfPop:plugins_time.js" src="<?php echo JS_PATH ?>/DateTime/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>
<font color="#FF0000">*</font></td>
</tr>
<tr>
<td align="left" class="narmal">Issued to</td>
<td align="left" class="narmal">          <select name="fld_issueto" id="fld_issueto">
    <option>Select ...</option>
                                <?php
		 								$res_cat=mysql_query("select st_firstname from es_staff");
										while($ret_cat=mysql_fetch_array($res_cat))
		  								{
												echo "<option value=\"$ret_cat[0]\"> $ret_cat[0]</option>";
									    }
		  							?>
                            </select>
									<?php //echo $html_obj->draw_selectfield('es_staffid',$staff_arr,'','');?>
								 <!--<input type="text" name="in_issue_to" id="in_issue_to" />-->
<!--<font color="#FF0000">*</font><span> Enter Full Name</span>--></td>
</tr>

<tr>
<td align="left" class="narmal">Remarks</td>
<td align="left" class="narmal">       
								 <input type="text" name="fld_remarks" id="fld_remarks" />
<!--<font color="#FF0000">*</font><span> Enter Full Name</span>--></td>
</tr>
<tr>
<td align="left" class="narmal">Inventory Type</td>
<td align="left" class="narmal">
<select name="es_bookinventoryid" id="es_bookinventoryid">
<option value="">Select Inventory</option>
<option value="1" <?php if($es_bookinventoryid==1){?> selected="selected" <?php } ?>>Consumable</option>
<option value="2"  <?php if($es_bookinventoryid==2){?> selected="selected" <?php } ?>>Non-consumable</option>
</select>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td colspan="2">&nbsp;</td>
</tr>
<tr>
<td colspan="2">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="84%" height="20" colspan="3" class="admin">&nbsp;&nbsp;Issue Items List</td>
</tr>
<tr>
<td height="20" colspan="3" class="narmal">
<table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
<tr class="bgcolor_02">
<td width="10%"  height="20" align="center" class="admin">S.No</td>
<td width="30%" align="center" class="admin">Item Code</td>
<td width="30%" align="center" class="admin">Item Name</td>
<td width="30%" align="center" class="admin">Quantity</td>
</tr>

<?php
$cm = 1;

if($Good_itemList!="")
{
foreach($Good_itemList as $orIt)
{
?>
<tr>
<td align="center"><?php echo $cm;?></td>
<td align="center">
<select name="item_code[<?php echo $cm;?>]" id="item_code[<?php echo $cm;?>]" style="width:100%;" onchange="onSelection('<?php echo $cm;?>',this.value);" onblur="onSelection('<?php echo $cm;?>',this.value);" disabled="disabled">
<option value="">.....Select Item Code.....</option>
<?php
foreach($in_itemsList as $item)
{
if($item->fld_item_masterid == $orIt['fld_item_masterid'])
$sel = "selected";
else
$sel = "";

echo "<option value='$item->fld_in_item_masterId' $sel>$item->	fld_item_code</option>";
}
?>
</select>
</td>
<td align="center">
<select name="item_name[<?php echo $cm;?>]" id="item_name[<?php echo $cm;?>]" style="width:100%;" onchange="onSelection('<?php echo $cm;?>',this.value);" onblur="onSelection('<?php echo $cm;?>',this.value);">
<option value="" >.....Select Item Name.....</option>
<?php
foreach($in_itemsList as $item)
{
if($item->fld_item_masterid == $orIt['fld_item_masterid'])
$sel = "selected";
else
$sel = "";

echo "<option value='$item->fld_in_item_masterId' $sel>$item->fld_item_name</option>";
}
?>
</select>

</td>
<td align="center"><input name="quantity[<?php echo $cm;?>]" id="quantity[<?php echo $cm;?>]" value="" style="width:97%;" /></td>
</tr>
<?php
$cm++;
}
}
else
{
?>

<tr>
<td align="center" >1</td>
<td align="center">
<select name="item_code[1]" id="item_code[1]" style="width:100%;" onchange="onSelection('1',this.value);" onblur="onSelection('1',this.value);">
<option value="">.....Select Item Code.....</option>
<?php
foreach($in_itemsList as $item)
{
	/*if($res['fee_category_id']==$manage_category) { 
											$sel_cl = "selected='selected'"; }else { $sel_cl  ="";}
					<option <?php echo $sel_cl; ?> value="<?php echo $res['fee_category_id'] ?>"><?php echo $res['category_name'];} ?></option>*/
echo "<option value='$item->fld_in_item_masterId'>$item->fld_item_code</option>";
}
?>
</select>
</td>
<td align="center">
<select name="item_name[1]" id="item_name[1]" style="width:100%;" onchange="onSelection('1',this.value);" onblur="onSelection('1',this.value);">
<option value="">.....Select Item Name.....</option>
<?php
foreach($in_itemsList as $item)
{
echo "<option value='$item->fld_in_item_masterId'>$item->fld_item_name</option>";
}
?>
</select>
<?php
$query="SELECT * FROM es_itembook_master WHERE fld_item_code = '".$item_code[1]."' AND fld_item_name = '".$item_name[1]."'	";
?>
</td>
<td align="center"><input name="quantity[1]" id="quantity[1]" value=""  style="width:97%;" /></td>
</tr>
<? } ?>
</table>
<div id="my_div"></div>
</td>
</tr>
<tr>
<td height="20" colspan="3" align="right">
<!--<a href="javascript:void(0);" onClick="changeIt()" class="admin">Add More Row</a>
<a href="javascript:void(0);" onClick="DeleteRow()" class="admin">Delete Last Row</a>
<input type="button" name="addrow" id="addrow" class="bgcolor_02" value="Add More Row" onClick="changeIt('<?php //echo $cn-1;?>')">
-->
<input type="button" name="addrow" id="addrow" class="bgcolor_02" value="Add More Row" onClick="changeIt('<?php echo $cm-1;?>')">&nbsp;&nbsp;
<input type="button" name="deleterow" id="deleterow" class="bgcolor_02" value="Delete Last Row" onClick="DeleteRow('<?php if($Ord_itemList !="") echo $cm; else echo $cm+1;?>')">

<!--DeleteRow('<?php //if($Ord_itemList !="") echo $cn; else echo $cn+1;?>')-->
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td width="15%" align="right">&nbsp;</td>
<td width="85%" align="left">&nbsp;</td>
</tr>
<tr>
<td colspan="2" align="center" valign="middle" height="40"><input type="submit" name="Submit" id="Submit" class="bgcolor_02" value="Issue Goods" onclick="return validateorder()"/></td>
</tr>
</table>
</form>
</td>
<td width="1" class="bgcolor_02"></td>
</tr>
<tr>
<td height="1" colspan="3" class="bgcolor_02"></td>
</tr>
<?php }?>
</table>
<?php
//}

if($action=='return_issue'){
?>
<script type="text/javascript">
function validateissue()
{
var i=10;
if(document.getElementById("return_date").value=="") {
alert("Please Select Reurn Date");
return false;
}

for ( idno=1; idno<=i; idno++ )
{

var qtyid = "quantity["+idno+"]";

var act_id='act_qty'+idno;

if(document.getElementById(qtyid).value == "") {
alert("Please Enter Quantity");
document.getElementById(qtyid).focus();
return false;
}
//alert(document.getElementById(qtyid).value);
if(!document.getElementById(qtyid).value.match(/^((\d+(\.\d*)?)|((\d*\.)?\d+))$/) || document.getElementById(qtyid).value<0)
{
alert("Invalid Quantity Format");
document.getElementById(qtyid).focus();
return false;
}
/*
 if(!document.getElementById(qtyid).value.match(/^((\d+(\.\d*)?)|((\d*\.)?\d+))$/) || document.getElementById(qtyid).value==0)
{
alert("Invalid Quantity Format");
document.getElementById(qtyid).focus();
return false;
}
*/




if(parseInt(document.getElementById(qtyid).value)>parseInt(document.getElementById(act_id).value))
{
alert("Exceeding the actual ordered quantity");
document.getElementById(qtyid).focus();
return false;
}
}
}




function showIssuedItems()
{
if(document.getElementById("es_goodsissueid").value != "")
{
document.return_issue.submit();
}
}
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="3" colspan="3"></td>
</tr>
<tr>
<td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Issue Return Note (IRN)</span></a></td>
</tr>
<tr>
<td width="1" class="bgcolor_02"></td>
<td align="left" valign="top">
<form name="return_issue" action="" method="post" >
<table width="100%" border="0" cellspacing="0" cellpadding="1">
<tr>
<td colspan="2" align="center" valign="top" >
<table width="98%" border="0" cellspacing="3" cellpadding="0">
<tr>
<td align="left" class="narmal">GIN No</td>
<td align="left" class="narmal">
<select name="es_goodsissueid" id="es_goodsissueid" onchange="showIssuedItems();">
<option value="0">.........select..........</option>
<?php
foreach($IssueList as $issue)
{
if($issue->es_in_goodsissueId == $IssueItemsList->es_in_goodsissueId) {
$sel = "selected";
} else {
$sel = "";
}
echo "<option value='$issue->es_in_goodsissueId' $sel >$issue->es_in_goodsissueId</option>";
}
?>
</select>
</td>
</tr>
<tr>
<td align="left" class="narmal">Issued to</td>
<td align="left" class="narmal"><input type="text" name="fld_issueto" id="fld_issueto" value="<?php if($IssueItemsList->fld_issueto!="") echo $IssueItemsList->fld_issueto;?>" readonly /></td>
</tr>
<!--<tr>
<td class="narmal">IRN Date</td>
<td class="narmal"><input type="text" name="return_date" id="return_date" value="" /></td>
</tr>-->
<tr>
<td align="left" class="narmal">IRN Date</td>
<td align="left" class="narmal"><input class="plain" name="return_date" id="return_date" value="" size="19"><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.return_issue.return_date);return false;" ><img name="popcal" align="absmiddle" src="<?php echo JS_PATH ?>/DateTime/calbtn.gif" width="34" height="22" border="0" alt=""></a><iframe width=188 height=166 name="gToday:datetime:agenda.js:gfPop:plugins_time.js" id="gToday:datetime:agenda.js:gfPop:plugins_time.js" src="<?php echo JS_PATH ?>/DateTime/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>
<font color="#FF0000">*</font></td>
</tr>

</table>
</td>
</tr>
<tr>
<td colspan="2">&nbsp;</td>
</tr>
<?php
if($IssuedItems!="")
{
?>
<tr>
<td colspan="2">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="84%" height="20" colspan="3" class="narmal"><span class="admin">&nbsp;&nbsp;Issue Items List</span></td>
</tr>
<tr>
<td height="20" colspan="3" class="narmal">
<table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
<tr class="bgcolor_02">
<td width="10%"  height="20" align="center" class="admin">S.No</td>
<td width="30%" align="center" class="admin">Item Code</td>
<td width="30%" align="left" class="admin">Item Name</td>
<td width="30%" align="center" class="admin">Quantity</td>
</tr>
<?php
$sl = 1;
foreach($IssuedItems as $isitm)
{
?>
<tr>
<td align="center" ><?php echo $sl;?></td>
<td align="center">
<?php
foreach($in_itemsList as $item)
{
if($item->fld_in_item_masterId == $isitm['item_code']) {
?>
<input type="hidden" name="item_code[<?php echo $sl;?>]" id="item_code[<?php echo $sl;?>]" value="<?php echo $item->es_in_item_masterId;?>" ><?php echo $item->fld_item_code;?>
<?php
}
}
?>
</td>
<td align="left">
<?php
foreach($in_itemsList as $item)
{
if($item->fld_in_item_masterId == $isitm['item_code']) {
?>
<input type="hidden" name="item_name[<?php echo $sl;?>]" id="item_name[<?php echo $sl;?>]" value="<?php echo $item->fld_in_item_masterId;?>" ><?php echo $item->fld_item_name;?>
<?php
}
}
?>
</td>
<?php 
if($isitm['quantity']!="") {
$qty = $isitm['quantity'] - $isitm['returned'];
if($qty == 0) {
$read = "readonly";
} else{
$read = "";
}
}
?>
<td align="center"><input type="hidden" id="act_qty<?php echo $sl;?>" name="act_qty<?php echo $sl;?>" value="<?php echo $qty;?>" /><input name="quantity[<?php echo $sl;?>]" id="quantity[<?php echo $sl;?>]" value="<?php echo $qty;?>" <?php echo $read;?> style="width:97%;" /></td>
</tr>
<?php
$sl++;
}
?>
</table>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td width="15%" align="right">&nbsp;</td>
<td width="85%" align="left">&nbsp;</td>
</tr>
<tr>
<td colspan="2"  align="center" valign="middle" height="40"><input type="submit" name="Submit" id="Submit" class="bgcolor_02" value="Return Issued Goods" onclick="return validateissue();"/></td>
</tr>
<?php
}
?>
</table>
</form>
</td>
<td width="1" class="bgcolor_02"></td>
</tr>
<tr>
<td height="1" colspan="3" class="bgcolor_02"></td>
</tr>
</table>
<?php
}
if($action=='inventory_reports' ){
?>
<script type="text/javascript">
function validatesearch()
{
if(document.getElementById("selectview").value =="") {
document.getElementById("selectviewerror").innerHTML = "Please Select Report Type";
document.getElementById("selectview").focus();
return false;
}
}
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="3" colspan="3"></td>
</tr>
<tr>
<td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Inventory Reports</span></a></td>
</tr>
<tr>
<td width="1" class="bgcolor_02"></td>
<td  align="left" valign="top">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="10"></td>
</tr>
<tr>
<td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td colspan="5" valign="top">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<?php
if($selectview!="orditems" && $selectview!="grnitems" && $selectview!="ginitems" && $selectview!="rinitems")
{
?>
<script language="javascript" type="text/javascript">
function display_menu(str){
                    
					if (str=='grnlist'){
						document.getElementById("fld_status").style.display="none";
						document.getElementById("status1").style.display="none";
					}else if(str=='ginlist'){
						document.getElementById("fld_status").style.display="none";
						document.getElementById("status1").style.display="inline";
					}else if(str=='pur_ord'){
					  document.getElementById("fld_status").style.display="inline";
					  document.getElementById("status1").style.display="none";
					}
}
</script>
<tr>
<td height="10"></td>
</tr>
<tr>
<td>
<table width="100%" border="0" cellspacing="0" cellpadding="2">
<form action="?pid=132&action=inventory_reports" method="post" name="inventory" id="inventory" >
<tr>
<td width="35%" align="center">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td class="narmal">Date From : </td>
<td align="right" ><input class="plain" name="dc1" value="<?php if($from!="") {
echo $from;
}?>" size="12" onfocus="this.blur()" readonly="readonly" /></td>
<td align="left" ><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fStartPop(document.inventory.dc1,document.inventory.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a></td>
</tr>
</table>
</td>
<td width="35%" align="center">
<table width="94%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td class="narmal">Date To : </td>
<td align="right"><input class="plain" name="dc2" value="<?php if($to!="") {
echo $to;
}?>" size="12" onfocus="this.blur()" readonly="readonly" /></td>
<td align="left"> <a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fEndPop(document.inventory.dc1,document.inventory.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a></td>
</tr>
</table>
</td>
<td align="center" width="30%" class="narmal">

</td>
</tr>
<tr>
<td id="selectviewerror" class="error_message" colspan="3" height="17" align="right" style="padding-right:10px;"></td>
</tr>
<tr>
<td align="left">&nbsp;&nbsp;<select name="selectview" id="selectview" onchange="display_menu(this.value)">
<option value="">--Select Report Type--</option>
<option value="pur_ord" <?php if($selectview=="pur_ord") {
echo "selected";
}?> >Purchase Order</option>
<option value="grnlist" <?php if($selectview=="grnlist") {
echo "selected";
}?> >Goods Receipt Note</option>
<option value="ginlist" <?php if($selectview=="ginlist") {
echo "selected";
}?> >Goods Issue Note</option>
</select></td>
<td align="left" ><select name="status" id="status" style=" <?php if(isset($selectview) && $selectview=='pur_ord'){echo 'display:block';}else{echo 'display:none';}?>"><option value="">--Select--</option><option value="complete" <?php if($status=="complete") {
echo "selected";
}?>>Completed</option><option value="pending" <?php if($status=="pending") {
echo "selected";
}?>>Pending</option></select>
<select name="status1" id="status1" style=" <?php if(isset($selectview) && $selectview=='ginlist'){echo 'display:block';}else{echo 'display:none';}?>">
<option value="">--Select--</option>
<option value="notreturned" <?php if($status1=="notreturned") {echo "selected";}?>>Not Returned</option>
<option value="partialreturned" <?php if($status1=="partialreturned") {echo "selected";}?>>Partial Returned</option>
<option value="returned" <?php if($status1=="returned") {echo "selected";}?>>Returned</option>
</select>
</td>
<td  align="left" style="padding-right:10px;"><input type="submit" name="Search" value="Search" class="bgcolor_02" onclick="return validatesearch();" /></td>
</tr>
</form>
</table>
<iframe width=132 height=142 name="gToday:contrast:agenda.js" id="gToday:contrast:agenda.js" src="<?php echo JS_PATH ?>/DateRange/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>
</td>
</tr>
<tr>
<td height="20"></td>
</tr>
<?php } ?>
<tr>
<td align="center" valign="top">
<?php
$Page_Url = "&Search=Search";
if($from!=""){$Page_Url .= "&from=$from";}
if($to!=""){$Page_Url .= "&to=$to";}
if($selectview!=""){$Page_Url .= "&selectview=$selectview";}
if(isset($Search_Results))
{
if($selectview=="pur_ord")
{
?>
<table width="100%" border="0" cellpadding="1" cellspacing="1">
<tr>
<td colspan="6" height="20" align="left"><?php echo $Disp_PageHead;?></td>
</tr>
<tr class="bgcolor_02">
<td width="10%"  height="20" align="center" class="admin">S.No</td>
<td width="11%" align="center" class="admin">Order No</td>
<td width="18%" align="center" class="admin">Order Date</td>
<td width="34%" align="left" class="admin">Supplier Name</td>
<td width="13%" align="center" class="admin">Order Status</td>
<!--<td width="13%" align="center" class="admin">Remarks</td>-->
<td width="14%" align="center" class="admin">Action</td>
</tr>
<?php

$rw = 1;
$slno = $start+1;
if(count($Search_Results)>0)
{
foreach($Search_Results as $srchres)
{
if($rw%2==0)
$rowclass = "even";
else
$rowclass = "odd";
?>
<tr class="<?php echo $rowclass;?>">
<td align="center" class="narmal"><?php echo $slno;?></td>
<td align="center" class="narmal"><?php echo $srchres['es_bookordersid'];?></td>
<td align="center" class="narmal"><?php echo displaydate($srchres['fld_orderdate']);?></td>
<td align="left" class="narmal"><?php echo $srchres['fld_name'];?></td>
<td align="center" class="narmal"><?php echo ucfirst($srchres['fld_orderstatus']);?></td>
<?php /*?><td align="center" class="narmal"><?php echo ucfirst($srchres['remarks']);?></td><?php */?>
<td align="center" class="narmal">
<?php if (in_array("13_23", $admin_permissions)) {?>
<a title="View Items" href="<?php  echo buildurl(array('pid'=>$pid, 'action'=>$action, 'selectview'=>'orditems', 'item'=>$srchres['es_bookordersid']));?>" ><?php echo viewIcon(); ?></a>
<?php }?><?php /*?><?php if (in_array("13_101", $admin_permissions)) {?>
<a title="Edit Items" href="?pid=7&action=edit_purchase_order&item=<?php echo $srchres['es_in_ordersid'].$Page_Url; ?>" ><?php echo editIcon(); ?></a><?php }?><?php */?>
&nbsp;<?php

if($srchres['fld_orderstatus']=='complete'){?>
<?php if (in_array("13_102", $admin_permissions)) {?>
<a href="?pid=132&action=purchase_goodsreceipt&item=<?php echo $srchres['es_bookordersid'].$Page_Url; ?>"><img src="images/compare_16.png" border="0" title="Match with Goods Receipt" align="Match with Goods Receipt" /></a><?php }}?>                                                                                                                    </td>
</tr>
<?php
$rw++;
$slno++;
}
?>
<tr>
<td colspan="6" align="center"><?php paginateexte($start, $q_limit, $no_rows, "action=".$action."&column_name=".$orderby."&asds_order=".$asds_order.$searchUrl) ?></td>
</tr>

<tr>
<td colspan="6" align="right"><?php if (in_array("13_103", $admin_permissions)) {?><input type="button" style="display:block;cursor:pointer;" id="printfeedet_t" name="" value="Print Purchase Orders List" onclick="window.open('?pid=132&action=print_purchase_orders<?php echo $searchUrl;?>&item=<?php echo $srchres['es_bookordersid']; ?>&status=<?php echo $status;?>',null,'width=700,height=500,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /><?php }?></td>
</tr>
<?php } ?>
</table>
<?php
}
if($selectview=="grnlist")
{
?>
<table width="100%" border="0" cellpadding="1" cellspacing="1">
<tr>
<td colspan="7" height="20" align="left"><?php echo $Disp_PageHead;?></td>
</tr>
<tr class="bgcolor_02">
<td width="10%"  height="20" align="center" class="admin">S.No</td>
<td width="12%" align="center" class="admin">Order No</td>
<td width="15%" align="center" class="admin">Received Date</td>
<td width="20%" align="left" class="admin">Supplier Name</td>
<td width="20%" align="center" class="admin">Bill No.</td>
<td width="13%" align="center" class="admin">Amount</td>
<td width="13%" align="center" class="admin">Remarks</td>
<td width="10%" align="center" class="admin">Action</td>
</tr>
<?php
$rw = 1;
$slno = $start+1;
if(count($Search_Results)>0)
{
foreach($Search_Results as $srchres)
{
if($rw%2==0)
$rowclass = "even";
else
$rowclass = "odd";
?>
<tr class="<?php echo $rowclass;?>">
<td align="center" class="narmal"><?php echo $slno;?></td>
<td align="center" class="narmal"><?php echo $srchres['es_bookordersid'];?></td>
<td align="center" class="narmal"><?php echo displaydate($srchres['fld_recdate']);?></td>
<td align="left" class="narmal"><?php echo $srchres['fld_name'];?></td>
<td align="center" class="narmal"><?php echo ucfirst($srchres['fld_recbillno']);?></td>
<td align="center" class="narmal"><?php echo $srchres['fld_totalamount'];?></td>
<td align="center" class="narmal"><?php echo $srchres['fld_remarks'];?></td>
<td align="center" class="narmal">
<?php if (in_array("13_23", $admin_permissions)) {?>
<a title="View Items" href="<?php  echo buildurl(array('pid'=>$pid, 'action'=>$action, 'selectview'=>'grnitems', 'item'=>$srchres['es_bookordersid']));?>" ><?php echo viewIcon(); ?></a>
<?php }?><?php /*if (in_array("13_101", $admin_permissions)) {?>
<a title="Edit Items" href="?pid=7&action=edit_goodsreceipt_order&item=<?php echo $srchres['es_in_ordersid'].$Page_Url; ?>" ><?php echo editIcon(); ?></a><?php } */?>
<?php if (in_array("13_102", $admin_permissions)) {?>		   
<a href="?pid=132&action=purchase_goodsreceipt&item=<?php echo $srchres['es_bookordersid'].$Page_Url; ?>"><img src="images/compare_16.png" border="0" title="Match with Goods Receipt" align="Match with Goods Receipt" /></a> <?php }?>
</td>
</tr>
<?php
$rw++;
$slno++;
}
?>
<tr>
<td colspan="7" align="center"><?php paginateexte($start, $q_limit, $no_rows, "action=".$action."&column_name=".$orderby."&asds_order=".$asds_order.$searchUrl) ?></td>
</tr>
<tr>
<td colspan="7" align="right"><?php if (in_array("13_103", $admin_permissions)) {?><input type="button" style="display:block;cursor:pointer;" id="printfeedet_t" name="" value="Print Goods Receipt List" onclick="window.open('?pid=132&action=print_purchase_orders<?php echo $searchUrl;?>',null,'width=700,height=500,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /><?php }?></td>
</tr>
<?php } ?>
</table>
<?php
}
if($selectview=="ginlist")
{
?>
<table width="100%" border="0" cellpadding="1" cellspacing="1">
<tr>
<td colspan="7" height="20" align="left"><?php echo $Disp_PageHead;?></td>
</tr>
<tr class="bgcolor_02">
<td width="10%"  height="20" align="center" class="admin">S.No</td>
<td width="15%" align="center" class="admin">Issued Date</td>
<td width="20%" align="left" class="admin">Issued To</td>
<td width="15%" align="center">Remarks</td>
<td width="10%" align="center" class="admin">Issue Status</td>
<td width="15%" align="center" class="admin">Action</td>
</tr>
<?php
$rw = 1;
$slno = $start+1;
if(count($Search_Results)>0)
{
foreach($Search_Results as $srchres)
{
if($rw%2==0)
$rowclass = "even";
else
$rowclass = "odd";
?>
<tr class="<?php echo $rowclass;?>">
<td align="center" class="narmal"><?php echo $slno;?></td>
<td align="center" class="narmal"><?php echo displaydate($srchres->in_issue_date);?></td>
<td align="left" class="narmal"><?php echo $srchres->in_issue_to;?></td>
 <td align="center"><?php echo $srchres->remarks;?></td>
<td align="center" class="narmal"><?php if($srchres->in_issue_status=='partialreturned'){echo 'Partial&nbsp;Returned';}
if($srchres->in_issue_status=='notreturned'){echo 'Not&nbsp;Returned';}
if($srchres->in_issue_status=='returned'){echo 'Returned';}
?></td>
<td align="center" class="narmal">
<?php if (in_array("13_23", $admin_permissions)) {?>
<a title="View Issued Items" href="<?php  echo buildurl(array('pid'=>$pid, 'action'=>$action, 'selectview'=>'ginitems', 'item'=>$srchres->es_in_goodsissueId));?>" ><?php echo "Issued Items"; //echo viewIcon(); ?></a> / <br />
<a title="View Returned Items" href="<?php  echo buildurl(array('pid'=>$pid, 'action'=>$action, 'selectview'=>'rinitems', 'item'=>$srchres->es_in_goodsissueId));?>" ><?php echo "Returned Items"; //echo viewIcon(); ?></a>
<?php }?>
</td>
</tr>
<?php
$rw++;
$slno++;
}
?>
<tr>
<td colspan="7" align="center"><?php paginateexte($start, $q_limit, $no_rows, "action=".$action."&column_name=".$orderby."&asds_order=".$asds_order.$searchUrl) ?></td>
</tr>
<tr>
<td colspan="6" align="right"><?php if (in_array("13_103", $admin_permissions)) {?><input type="button" style="display:block;cursor:pointer;" id="printfeedet_t" name="" value="Print Goods Issuenote List" onclick="window.open('?pid=132&action=print_purchase_orders<?php echo $searchUrl;?>',null,'width=700,height=500,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /><?php }?></td>
</tr>
<?php } ?>

</table>
<?php
}
if($selectview=="orditems")
{
?>
<table width="100%" border="0" cellpadding="1" cellspacing="1">
<tr>
<td colspan="4" height="20" align="left"><?php echo $Disp_PageHead;?></td>
</tr>
<tr>
<td colspan="4" align="left">
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr>
<td align="left" width="20%">Ordered Date : </td>
<td align="left" width="80%"><?php echo displayDateAndTime($Search_item->fld_orderdate);?></td>
</tr>
<tr>
<td align="left" width="20%">Purchase Order No : </td>
<td align="left" width="80%"><?php echo $item;?></td>
</tr>
<tr>
<td align="left" width="20%">Status : </td>
<td align="left" width="80%"><?php echo $Search_item->fld_orderstatus;?></td>
</tr>
</table>
</td>
</tr>
<tr>
<td colspan="6" height="10"></td>
</tr>
<tr class="bgcolor_02">
<td width="15%"  height="20" align="center" class="admin">S.No</td>
<td width="30%" align="center" class="admin">Item Code</td>
<td width="30%" align="left" class="admin">Item Name</td>
<td width="25%" align="center" class="admin">Quantity</td>
</tr>
<?php
//array_print($Search_Results);
$rw = 1;
if(count($Search_Results)>0)
{
foreach($Search_Results as $srchres)
{
if($rw%2==0)
$rowclass = "even";
else
$rowclass = "odd";
?>
<tr class="<?php echo $rowclass;?>">
<td align="center" class="narmal"><?php echo $rw;?></td>
<td align="center" class="narmal"><?php echo $srchres['fld_item_code'];?></td>
<td align="left" class="narmal"><?php echo $srchres['fld_item_name'];?></td>
<td align="center" class="narmal"><?php echo $srchres['quantity'];?></td>
</tr>
<?php
$rw++;
}
?>
<tr>
<td colspan="4" height="10">
<input type="button" name="backbtn" value="Back" class="bgcolor_02" onclick="javascript:history.go(-1);" style="cursor:pointer;">&nbsp;&nbsp;&nbsp;<?php if (in_array("13_106", $admin_permissions)) {?><input type="button" style="cursor:pointer;" value="Print Details" onclick="window.open('?pid=132&action=print_purchase_orders<?php echo $searchUrl;?>&item=<?php echo $item; ?>',null,'width=700,height=500,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /><?php }?>
</td>
</tr>
<?php } ?>
</table>
<?php
}
if($selectview=="grnitems")
{
?>
<table width="100%" border="0" cellpadding="1" cellspacing="1">
<tr>
<td colspan="6" height="20" align="left"><?php echo $Disp_PageHead;?></td>
</tr>
<tr>
<td colspan="6" align="left">
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr>
<td align="left" width="23%">Ordered Date : </td>
<td align="left" width="77%"><?php echo displayDateAndTime($Search_item->order_date);?></td>
</tr>
<tr>
<td align="left" width="23%">Goods Receipt Note  No : </td>
<td align="left" width="77%"><?php echo $item;?></td>
</tr>
<tr>
<td align="left" width="23%">Received Date : </td>
<td align="left" width="77%"><?php echo displayDateAndTime($Search_item->in_rec_date);?></td>
</tr>
<tr>
<td align="left" width="23%">Status : </td>
<td align="left" width="77%"><?php echo $Search_item->in_ord_status;?></td>
</tr>
</table>
</td>
</tr>
<tr>
<td colspan="6" height="10"></td>
</tr>
<tr class="bgcolor_02">
<td width="10%"  height="20" align="center" class="admin">S.No</td>
<td width="15%" align="center" class="admin" >Item Code</td>
<td width="20%" align="left" class="admin">Item Name</td>
<td width="15%" align="center" class="admin">Quantity</td>
<td width="20%" align="center" class="admin">Price</td>
<td width="20%" align="center" class="admin">Amount</td>
</tr>
<?php
$rw = 1;
if(count($Search_Results)>0)
{
foreach($Search_Results as $srchres)
{
if($rw%2==0)
$rowclass = "even";
else
$rowclass = "odd";
?>
<tr class="<?php echo $rowclass;?>">
<td align="center" class="narmal"><?php echo $rw;?></td>
<td align="center" class="narmal"><?php echo $srchres['fld_item_code'];?></td>
<td align="left" class="narmal"><?php echo $srchres['fld_item_name'];?></td>
<td align="center" class="narmal"><?php echo $srchres['quantity'];?></td>
<td align="center" class="narmal"><?php echo $srchres['price'];?></td>
<td align="center" class="narmal"><?php echo $srchres['amount'];?></td>
</tr>
<?php
$rw++;
}
?>
<tr class="<?php echo $rowclass;?>">
<td colspan="5" height="30" valign="middle" align="right" >Total Amount :</td>
<td valign="middle" align="center" ><?php echo $Search_item->fld_totalamount;?></td>
</tr>
<tr>
<td colspan="6" height="10">
<input type="button" name="backbtn" value="Back" class="bgcolor_02" onclick="javascript:history.go(-1);">&nbsp;&nbsp;&nbsp;<?php if (in_array("13_106", $admin_permissions)) {?><input type="button" style="cursor:pointer;" value="Print Details" onclick="window.open('?pid=132&action=print_purchase_orders<?php echo $searchUrl;?>&item=<?php echo $item; ?>',null,'width=700,height=500,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /><?php }?>																										  </td>
</tr>
<?php } ?>
</table>
<?php
}
if($selectview=="ginitems")
{
?>
<table width="100%" border="0" cellpadding="1" cellspacing="1">
<tr>
<td colspan="7" height="20" align="left"><?php echo $Disp_PageHead;?></td>
</tr>
<tr>
<td colspan="7" align="left">
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr>
<td align="left" width="20%">Issued Date : </td>
<td align="left" width="80%"><?php echo displayDateAndTime($Search_item->fld_issuedate);?></td>
</tr>
<tr>
<td align="left" width="20%">Issue Note No : </td>
<td align="left" width="80%"><?php echo $item;?></td>
</tr>
<tr>
<td align="left" width="20%">Issued To : </td>
<td align="left" width="80%"><?php echo $Search_item->fld_issueto;?></td>
</tr>
<tr>
<td align="left" width="20%">Status : </td>
<td align="left" width="80%"><?php if($Search_item->in_issue_status=='partialreturned'){echo 'Partial&nbsp;Returned';}
if($Search_item->in_issue_status=='notreturned'){echo 'Not&nbsp;Returned';}
if($Search_item->in_issue_status=='returned'){echo 'Returned';}
?></td>
</tr>
</table>
</td>
</tr>
<tr>
<td colspan="7" height="10"></td>
</tr>
<tr class="bgcolor_02">
<td width="10%"  height="20" align="center" class="admin">S.No</td>
<td width="15%" align="center" class="admin">Item Code</td>
<td width="20%" align="left" class="admin">Item Name</td>
<td width="15%" align="center" class="admin">Quantity</td>
<td width="10%" align="center" class="admin">Returned Qty</td>
</tr>
<?php
$rw = 1;
if(count($Search_Results)>0)
{
foreach($Search_Results as $srchres)
{
if($rw%2==0)
$rowclass = "even";
else
$rowclass = "odd";
?>
<tr class="<?php echo $rowclass;?>">
<td align="center" class="narmal"><?php echo $rw;?></td>
<td align="center" class="narmal"><?php echo $srchres['fld_item_code'];?></td>
<td align="left" class="narmal"><?php echo $srchres['fld_item_name'];?></td>
<td align="center" class="narmal"><?php echo $srchres['quantity'];?></td>
<td align="center" class="narmal">
<?php if($srchres['returned'] > 0) {?>
	<a title="View Returned Items" href="<?php  echo buildurl(array('pid'=>$pid, 'action'=>$action, 'selectview'=>'rinitems', 'item'=>$item));?>" ><?php echo $srchres['returned'];?></a>
<?php } else {
	echo $srchres['returned'];
} ?>
</td>
</tr>
<?php
$rw++;
}
?>
<tr>
<td colspan="7" height="10">
<input type="button" name="backbtn" value="Back" class="bgcolor_02" onclick="javascript:history.go(-1);">&nbsp;&nbsp;&nbsp;<?php if (in_array("13_104", $admin_permissions)) {?><input type="button" style="cursor:pointer;" value="Print Details" onclick="window.open('?pid=132&action=print_purchase_orders<?php echo $searchUrl;?>&item=<?php echo $item; ?>',null,'width=700,height=500,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /><?php }?>
</td>
</tr>
<?php } ?>
</table>
<?php
}
if($selectview=="rinitems")
{
?>
<table width="100%" border="0" cellpadding="1" cellspacing="1">
<tr>
<td colspan="4" height="20" align="left"><?php echo $Disp_PageHead;?></td>
</tr>
<tr>
<td colspan="4" align="left">
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr>
<td align="left" width="22%">Issued Date : </td>
<td align="left" width="78%"><?php echo displayDateAndTime($Search_item->fld_issuedate);?></td>
</tr>
<tr>
<td align="left" width="22%">Issue Return Note No : </td>
<td align="left" width="78%"><?php echo $item;?></td>
</tr>
<tr>
<td align="left" width="22%">Issued To : </td>
<td align="left" width="78%"><?php echo $Search_item->fld_issueto;?></td>
</tr>
<tr>
<td align="left" width="22%">Status : </td>
<td align="left" width="78%"><?php echo $Search_item->fld_issuestatus;?></td>
</tr>
</table>
</td>
</tr>
<tr>
<td colspan="4" height="20"></td>
</tr>
<?php
if(count($Search_Results)>0)
{
foreach($Search_Results as $srchres)
{
?>
<tr>
<td colspan="4" align="left">
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr>
	<td align="right" width="20%">Returned Date : </td>
	<td align="left" width="80%"><?php echo displayDateAndTime($srchres['return_date']);?></td>
</tr>
</table>
</td>
</tr>
<tr class="bgcolor_02">
<td width="15%"  height="20" align="center" class="admin">S.No</td>
<td width="30%" align="center" class="admin">Item Code</td>
<td width="30%" align="left" class="admin">Item Name</td>
<td width="25%" align="center" class="admin">Quantity</td>
</tr>
<?php
$srchitem = $srchres['items'];
if($srchitem!="" && count($srchitem) > 0)
{
$rw = 1;
foreach($srchitem as $srcitm)
{
if($rw%2==0)
$rowclass = "even";
else
$rowclass = "odd";
?>
<tr class="<?php echo $rowclass;?>">
<td align="center" class="narmal"><?php echo $rw;?></td>
<td align="center" class="narmal"><?php echo $srcitm['fld_item_code'];?></td>
<td align="left" class="narmal"><?php echo $srcitm['fld_item_name'];?></td>
<td align="center" class="narmal"><?php echo $srcitm['quantity'];?></td>
</tr>
<?php
$rw++;
}
}

}
?>
<tr>
<td colspan="4" height="10">
<input type="button" name="backbtn" value="Back" class="bgcolor_02" onclick="javascript:history.go(-1);">&nbsp;&nbsp;&nbsp;<?php if (in_array("13_105", $admin_permissions)) {?><input type="button" style="cursor:pointer;" value="Print Details" onclick="window.open('?pid=132&action=print_purchase_orders<?php echo $searchUrl;?>&item=<?php echo $item; ?>',null,'width=700,height=500,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /><?php }?>
</td>
</tr>
<?php } ?>
</table>
<?php
}
if(count($Search_Results)<=0) {
echo "<tr >";
echo "<td align='center' valign='top'><strong>No Data Found</strong></td>";
echo "</tr>";
echo "<tr >";
echo "<td align='center' valign='top'>&nbsp;</td>";
echo "</tr>";
echo "<tr height='20'>";
echo "<td align='center' valign='middle'><input type='button' name='backbtn' value='Back' class='bgcolor_02' onclick='javascript:history.go(-1);'></td>";
echo "</tr>";

}
}

?>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td colspan="4" align="center">&nbsp;</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
<td width="1" class="bgcolor_02"></td>
</tr>
<tr>
<td height="1" colspan="3" class="bgcolor_02"></td>
</tr>
</table>

<?php
}
?>
<?php if($action=='print_purchase_orders'){


?>
<table width="100%" border="0">
<tr>
<td>

</td>
</tr>
<tr>
<td><table width="100%">
<tr>
<td align="center" valign="top">
<?php
if(isset($Search_Results))
{
if($selectview=="pur_ord")
{
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
VALUES('".$_SESSION['eschools']['admin_id']."','es_book_orders','INVENTORY','Inventory Reports','','Print Purchase Orders','".$_SERVER['REMOTE_ADDR']."',NOW())";
$log_insert_exe=mysql_query($log_insert_sql);
?>
<table width="100%" border="0" cellpadding="1" cellspacing="1">
<tr>
<td colspan="6" height="20" align="left"><?php echo $Disp_PageHead;?></td>
</tr>
<tr class="bgcolor_02">
<td width="10%"  height="20" align="center" class="admin">S.No</td>
<td width="15%" align="center" class="admin">Order No</td>
<td width="20%" align="center" class="admin">Order Date</td>
<td width="30%" align="left" class="admin">Supplier Name</td>
<td width="15%" align="center" class="admin">Order Status</td>
</tr>
<?php
$rw = 1;
$slno = $start+1;
if(count($Search_Results)>0)
{
foreach($Search_Results as $srchres)
{
if($rw%2==0)
$rowclass = "even";
else
$rowclass = "odd";
?>
<tr class="<?php echo $rowclass;?>">
<td align="center" class="narmal"><?php echo $slno;?></td>
<td align="center" class="narmal"><?php echo $srchres['es_bookordersid'];?></td>
<td align="center" class="narmal"><?php echo displaydate($srchres['fld_orderdate']);?></td>
<td align="left" class="narmal"><?php echo $srchres['fld_name'];?></td>
<td align="center" class="narmal"><?php echo ucfirst($srchres['fld_orderstatus']);?></td>

</tr>
<?php
$rw++;
$slno++;
}
?>



<?php } ?>
</table>
<?php
}
if($selectview=="grnlist")
{
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
VALUES('".$_SESSION['eschools']['admin_id']."','es_book_orders','INVENTORY','Inventory Reports','','Print Goods Receipt Note','".$_SERVER['REMOTE_ADDR']."',NOW())";
$log_insert_exe=mysql_query($log_insert_sql);
?>
<table width="100%" border="0" cellpadding="1" cellspacing="1">
<tr>
<td colspan="7" height="20" align="left"><?php echo $Disp_PageHead;?></td>
</tr>
<tr class="bgcolor_02">
<td width="10%"  height="20" align="center" class="admin">S.No</td>
<td width="12%" align="center" class="admin">Order No</td>
<td width="15%" align="center" class="admin">Received Date</td>
<td width="20%" align="left" class="admin">Supplier Name</td>
<td width="20%" align="center" class="admin">Bill No.</td>
<td width="13%" align="center" class="admin">Amount</td>
<?php /*?><td width="10%" align="center" class="admin">Action</td><?php */?>
</tr>
<?php
$rw = 1;
$slno = $start+1;
if(count($Search_Results)>0)
{
foreach($Search_Results as $srchres)
{
if($rw%2==0)
$rowclass = "even";
else
$rowclass = "odd";
?>
<tr class="<?php echo $rowclass;?>">
<td align="center" class="narmal"><?php echo $slno;?></td>
<td align="center" class="narmal"><?php echo $srchres['es_bookordersid'];?></td>
<td align="center" class="narmal"><?php echo displaydate($srchres['fld_recdate']);?></td>
<td align="left" class="narmal"><?php echo $srchres['fld_name'];?></td>
<td align="center" class="narmal"><?php echo ucfirst($srchres['fld_recbillno']);?></td>
<td align="center" class="narmal"><?php echo $srchres['fld_totalamount'];?></td>
<?php /*?><td align="center" class="narmal">
<?php if (in_array("13_23", $admin_permissions)) {?>
<a title="View Items" href="<?php  echo buildurl(array('pid'=>$pid, 'action'=>$action, 'selectview'=>'grnitems', 'item'=>$srchres['es_in_ordersid']));?>" ><?php echo viewIcon(); ?></a>
<?php }?>
</td><?php */?>
</tr>
<?php
$rw++;
$slno++;
}
?>
<tr>
<td colspan="7" align="center"><?php paginateexte($start, $q_limit, $no_rows, "action=".$action."&column_name=".$orderby."&asds_order=".$asds_order.$searchUrl) ?></td>
</tr>
<?php } ?>
</table>
<?php
}
if($selectview=="ginlist")
{
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
VALUES('".$_SESSION['eschools']['admin_id']."','es_goodsissue','INVENTORY','Inventory Reports','','Print Goods Issue Note','".$_SERVER['REMOTE_ADDR']."',NOW())";
$log_insert_exe=mysql_query($log_insert_sql);
?>
<table width="100%" border="0" cellpadding="1" cellspacing="1">
<tr>
<td colspan="4" height="20" align="left"><?php echo $Disp_PageHead;?></td>
</tr>
<tr class="bgcolor_02">
<td width="17%"  height="20" align="center" class="admin">S.No</td>
<td width="34%" align="center" class="admin">Issued Date</td>
<td width="29%" align="left" class="admin">Issued To</td>
<td width="20%" align="center" class="admin">Issue Status</td>

</tr>
<?php
$rw = 1;
$slno = $start+1;
if(count($Search_Results)>0)
{
foreach($Search_Results as $srchres)
{
if($rw%2==0)
$rowclass = "even";
else
$rowclass = "odd";
?>
<tr class="<?php echo $rowclass;?>">
<td align="center" class="narmal"><?php echo $slno;?></td>
<td align="center" class="narmal"><?php echo displaydate($srchres->fld_issuedate);?></td>
<td align="left" class="narmal"><?php echo $srchres->fld_issueto;?></td>

<td align="center" class="narmal"><?php if($srchres->fld_issuestatus=='partialreturned'){echo 'Partial&nbsp;Returned';}
if($srchres->fld_issuestatus=='notreturned'){echo 'Not&nbsp;Returned';}
if($srchres->fld_issuestatus=='returned'){echo 'Returned';}
?></td>

</tr>
<?php
$rw++;
$slno++;
}
?>
<tr>
<td colspan="4" align="center"><?php paginateexte($start, $q_limit, $no_rows, "action=".$action."&column_name=".$orderby."&asds_order=".$asds_order.$searchUrl) ?></td>
</tr>


<?php } ?>
</table>
<?php
}
if($selectview=="orditems")
{
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
VALUES('".$_SESSION['eschools']['admin_id']."','es_book_orders','INVENTORY','Inventory Reports','','Print Purchase Order Details','".$_SERVER['REMOTE_ADDR']."',NOW())";
$log_insert_exe=mysql_query($log_insert_sql);
?>
<table width="100%" border="0" cellpadding="1" cellspacing="1">
<tr>
<td colspan="4" height="20" align="left"><?php echo $Disp_PageHead;?></td>
</tr>
<tr>
<td colspan="4" align="left">
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr>
<td align="left" width="20%">Ordered Date : </td>
<td align="left" width="80%"><?php echo displayDateAndTime($Search_item->fld_orderdate);?></td>
</tr>
<tr>
<td align="left" width="22%">Purchase Order No : </td>
<td align="left" width="78%"><?php echo $item;?></td>
</tr>
<tr>
<td align="left" width="20%">Status : </td>
<td align="left" width="80%"><?php echo $Search_item->fld_orderstatus;?></td>
</tr>
</table>
</td>
</tr>
<tr>
<td colspan="6" height="10"></td>
</tr>
<tr class="bgcolor_02">
<td width="15%"  height="20" align="center" class="admin">S.No</td>
<td width="30%" align="center" class="admin">Item Code</td>
<td width="30%" align="left" class="admin">Item Name</td>
<td width="25%" align="center" class="admin">Quantity</td>
</tr>
<?php
//array_print($Search_Results);
$rw = 1;
if(count($Search_Results)>0)
{
foreach($Search_Results as $srchres)
{
if($rw%2==0)
$rowclass = "even";
else
$rowclass = "odd";
?>
<tr class="<?php echo $rowclass;?>">
<td align="center" class="narmal"><?php echo $rw;?></td>
<td align="center" class="narmal"><?php echo $srchres['fld_item_code'];?></td>
<td align="left" class="narmal"><?php echo $srchres['fld_item_name'];?></td>
<td align="center" class="narmal"><?php echo $srchres['quantity'];?></td>
</tr>
<?php
$rw++;
}
?>
<tr>
<td colspan="4" height="10">&nbsp;</td>
</tr>
<?php } ?>
</table>
<?php
}
if($selectview=="grnitems")
{
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
VALUES('".$_SESSION['eschools']['admin_id']."','es_book_orders','INVENTORY','Inventory Reports','','Print Goods Receipt Details','".$_SERVER['REMOTE_ADDR']."',NOW())";
$log_insert_exe=mysql_query($log_insert_sql);
?>
<table width="100%" border="0" cellpadding="1" cellspacing="1">
<tr>
<td colspan="6" height="20" align="left"><?php echo $Disp_PageHead;?></td>
</tr>
<tr>
<td colspan="6" align="left">
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr>
<td align="left" width="24%">Ordered Date : </td>
<td align="left" width="76%"><?php echo displayDateAndTime($Search_item->fld_orderdate);?></td>
</tr>
<tr>
<td align="left" width="24%">Goods Receipt Note No : </td>
<td align="left" width="76%"><?php echo $item;?></td>
</tr>
<tr>
<td align="left" width="24%">Received Date : </td>
<td align="left" width="76%"><?php echo displayDateAndTime($Search_item->fld_recdate);?></td>
</tr>
<tr>
<td align="left" width="24%">Status : </td>
<td align="left" width="76%"><?php echo $Search_item->fld_orderstatus;?></td>
</tr>
</table>
</td>
</tr>
<tr>
<td colspan="6" height="10"></td>
</tr>
<tr class="bgcolor_02">
<td width="10%"  height="20" align="center" class="admin">S.No</td>
<td width="15%" align="center" class="admin" >Item Code</td>
<td width="20%" align="left" class="admin">Item Name</td>
<td width="15%" align="center" class="admin">Quantity</td>
<td width="20%" align="center" class="admin">Price</td>
<td width="20%" align="center" class="admin">Amount</td>
</tr>
<?php
$rw = 1;
if(count($Search_Results)>0)
{
foreach($Search_Results as $srchres)
{
if($rw%2==0)
$rowclass = "even";
else
$rowclass = "odd";
?>
<tr class="<?php echo $rowclass;?>">
<td align="center" class="narmal"><?php echo $rw;?></td>
<td align="center" class="narmal"><?php echo $srchres['fld_item_code'];?></td>
<td align="left" class="narmal"><?php echo $srchres['fld_item_name'];?></td>
<td align="center" class="narmal"><?php echo $srchres['quantity'];?></td>
<td align="center" class="narmal"><?php echo $srchres['price'];?></td>
<td align="center" class="narmal"><?php echo $srchres['amount'];?></td>
</tr>
<?php
$rw++;
}
?>
<tr class="<?php echo $rowclass;?>">
<td colspan="5" height="30" valign="middle" align="right" >Total Amount :</td>
<td valign="middle" align="center" ><?php echo $Search_item->fld_totalamount;?></td>
</tr>
<tr>
<td colspan="6" height="10">&nbsp;</td>
</tr>
<?php } ?>
</table>
<?php
}
if($selectview=="ginitems")
{
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
VALUES('".$_SESSION['eschools']['admin_id']."','es_goodsissue','INVENTORY','Inventory Reports','','Print Goods Issue Note','".$_SERVER['REMOTE_ADDR']."',NOW())";
$log_insert_exe=mysql_query($log_insert_sql);
?>
<table width="100%" border="0" cellpadding="1" cellspacing="1">
<tr>
<td colspan="7" height="20" align="left"><?php echo $Disp_PageHead;?></td>
</tr>
<tr>
<td colspan="7" align="left">
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr>
<td align="left" width="20%">Issued Date : </td>
<td align="left" width="80%"><?php echo displayDateAndTime($Search_item->fld_issuedate);?></td>
</tr>
<tr>
<td align="left" width="22%">Issue Note No : </td>
<td align="left" width="78%"><?php echo $item;?></td>
</tr>
<tr>
<td align="left" width="20%">Issued To : </td>
<td align="left" width="80%"><?php echo $Search_item->fld_issueto;?></td>
</tr>
<tr>
<td align="left" width="20%">Status : </td>
<td align="left" width="80%"><?php if($Search_item->fld_issuestatus=='partialreturned'){echo 'Partial&nbsp;Returned';}
if($Search_item->fld_issuestatus=='notreturned'){echo 'Not&nbsp;Returned';}
if($Search_item->fld_issuestatus=='returned'){echo 'Returned';}
?></td>
</tr>
</table>
</td>
</tr>
<tr>
<td colspan="7" height="10"></td>
</tr>
<tr class="bgcolor_02">
<td width="10%"  height="20" align="center" class="admin">S.No</td>
<td width="15%" align="center" class="admin">Item Code</td>
<td width="20%" align="left" class="admin">Item Name</td>
<td width="15%" align="center" class="admin">Quantity</td>
<td width="10%" align="center" class="admin">Returned Qty</td>
</tr>
<?php
$rw = 1;
if(count($Search_Results)>0)
{
foreach($Search_Results as $srchres)
{
if($rw%2==0)
$rowclass = "even";
else
$rowclass = "odd";
?>
<tr class="<?php echo $rowclass;?>">
<td align="center" class="narmal"><?php echo $rw;?></td>
<td align="center" class="narmal"><?php echo $srchres['fld_item_code'];?></td>
<td align="left" class="narmal"><?php echo $srchres['fld_item_name'];?></td>
<td align="center" class="narmal"><?php echo $srchres['quantity'];?></td>
<td align="center" class="narmal">
<?php if($srchres['returned'] > 0) {?>
<a title="View Returned Items" href="<?php  echo buildurl(array('pid'=>$pid, 'action'=>$action, 'selectview'=>'rinitems', 'item'=>$item));?>" ><?php echo $srchres['returned'];?></a>
<?php } else {
echo $srchres['returned'];
} ?>
</td>
</tr>
<?php
$rw++;
}
?>
<tr>
<td colspan="7" height="10">&nbsp;</td>
</tr>
<?php } ?>
</table>
<?php
}
if($selectview=="rinitems")
{
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
VALUES('".$_SESSION['eschools']['admin_id']."','es_goodsissue','INVENTORY','Inventory Reports','','Print Goods Issue Return Note','".$_SERVER['REMOTE_ADDR']."',NOW())";
$log_insert_exe=mysql_query($log_insert_sql);
?>
<table width="100%" border="0" cellpadding="1" cellspacing="1">
<tr>
<td colspan="4" height="20" align="left"><?php echo $Disp_PageHead;?></td>
</tr>
<tr>
<td colspan="4" align="left">
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr>
<td align="left" width="20%">Issued Date : </td>
<td align="left" width="80%"><?php echo displayDateAndTime($Search_item->fld_issuedate);?></td>
</tr>
<tr>
<td align="left" width="22%">Issue Return Note No : </td>
<td align="left" width="78%"><?php echo $item;?></td>
</tr>
<tr>
<td align="left" width="20%">Issued To : </td>
<td align="left" width="80%"><?php echo $Search_item->fld_issueto;?></td>
</tr>
<tr>
<td align="left" width="20%">Status : </td>
<td align="left" width="80%"><?php echo $Search_item->fld_issuestatus;?></td>
</tr>
</table>
</td>
</tr>
<tr>
<td colspan="4" height="20"></td>
</tr>
<?php
if(count($Search_Results)>0)
{
foreach($Search_Results as $srchres)
{
?>
<tr>
<td colspan="4" align="left">
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr>
<td align="right" width="20%">Returned Date : </td>
<td align="left" width="80%"><?php echo displayDateAndTime($srchres['return_date']);?></td>
</tr>
</table>
</td>
</tr>
<tr class="bgcolor_02">
<td width="15%"  height="20" align="center" class="admin">S.No</td>
<td width="30%" align="center" class="admin">Item Code</td>
<td width="30%" align="left" class="admin">Item Name</td>
<td width="25%" align="center" class="admin">Quantity</td>
</tr>
<?php
$srchitem = $srchres['items'];
if($srchitem!="" && count($srchitem) > 0)
{
$rw = 1;
foreach($srchitem as $srcitm)
{
if($rw%2==0)
$rowclass = "even";
else
$rowclass = "odd";
?>
<tr class="<?php echo $rowclass;?>">
<td align="center" class="narmal"><?php echo $rw;?></td>
<td align="center" class="narmal"><?php echo $srcitm['fld_item_code'];?></td>
<td align="left" class="narmal"><?php echo $srcitm['fld_item_name'];?></td>
<td align="center" class="narmal"><?php echo $srcitm['quantity'];?></td>
</tr>
<?php
$rw++;
}
}

}
?>
<tr>
<td colspan="4" height="10">&nbsp;</td>
</tr>
<?php } ?>
</table>
<?php
}
if(count($Search_Results)<=0) {
echo "<tr >";
echo "<td align='center' valign='top'><strong>No Data Found</strong></td>";
echo "</tr>";
echo "<tr >";
echo "<td align='center' valign='top'>&nbsp;</td>";
echo "</tr>";
echo "<tr height='20'>";
echo "<td align='center' valign='middle'><input type='button' name='backbtn' value='Back' class='bgcolor_02' onclick='javascript:history.go(-1);'></td>";
echo "</tr>";

}
}

?>
</td>
</tr>
</table>
</td>
</tr>
</table>


<?php }?>

<?php if($action=='edit_purchase_order'){?>
<script>
function validate()
{
var co=document.getElementsByTagName('input');
for(var i=0;i<co.length;i++)
{
if(co[i].type=='text')
{
if(parseInt(co[i].value)<=0)
{
alert('Enter Valid Number')
return false;
}
}
}
}
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">


<tr>
<td height="3" colspan="3"></td>
</tr>		  
<tr>
<td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Edit Purchase Order </span></td>
</tr>	
<tr>
<td width="1" class="bgcolor_02"></td>
<td align="center" valign="top"><form method="post" action="" onsubmit="return validate()">
<table width="100%" border="0">
<?php if(count($pdetails)>=1){
foreach($pdetails as $eachrecord){

$item_det = $db->getrow("SELECT * FROM ` es_itembook_master` WHERE `fld_item_masterid`=" . $eachrecord['fld_item_name']);

?>
<tr>
<td width="34%" align="right"><?php echo $item_det['fld_item_name'];?>[<?php echo $item_det['fld_item_code'];?>]</td>

<td width="1%">:</td>
<td width="65%"><input type="text" name="item_<?php echo $eachrecord['slno'];?>" value="<?php if(!$_POST){echo $eachrecord['quantity']; }else{echo $_POST['item_'. $eachrecord['slno']];}?>" /></td>
</tr>
<?php }?>

<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input  type="submit" name="update_purchase" value="Update" class="bgcolor_02" style="cursor:pointer;" /></td>
</tr>
<?php }else{?>
<tr>
<td colspan="3" align="center"> No Records Found</td>
</tr>
<?php }?>
</table>

</form>	

</td>
<td width="1" class="bgcolor_02"></td>
</tr>      
<tr><td colspan="3" class="bgcolor_02" height="1"></td></tr>   
</table>
<?php }?>
<?php if($action=='edit_goodsreceipt_order'){?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">


<tr>
<td height="3" colspan="3"></td>
</tr>		  
<tr>
<td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Edit Goods Receipt Note </span></td>
</tr>	
<tr>
<td width="1" class="bgcolor_02"></td>
<td align="center" valign="top"><form method="post" action="">
<table width="100%" border="0">
<?php if(count($pdetails)>=1){
foreach($pdetails as $eachrecord){

$item_det = $db->getrow("SELECT * FROM `es_itembook_master` WHERE `fld_item_masterid`=" . $eachrecord['fld_item_name']);

?>
<tr>
<td width="24%" align="right"><?php echo $item_det['fld_item_name'];?>[<?php echo $item_det['fld_item_code'];?>]</td>

<td width="1%">:</td>
<td width="23%"><input type="text" name="item_<?php echo $eachrecord['slno'];?>" value="<?php if(!$_POST){echo $eachrecord['quantity']; }else{echo $_POST['item_'. $eachrecord['slno']];}?>" size="15" /></td>
<td width="52%"><input type="text" name="price_<?php echo $eachrecord['slno'];?>" value="<?php if(!$_POST){echo $eachrecord['price']; }else{echo $_POST['price_'. $eachrecord['slno']];}?>" size="15" /></td>
</tr>
<?php }?>

<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td colspan="2"><input  type="submit" name="update_goodsreceipt" value="Update" class="bgcolor_02" style="cursor:pointer;" /></td>
</tr>
<?php }else{?>
<tr>
<td colspan="4" align="center"> No Records Found</td>
</tr>
<?php }?>
</table>

</form>	

</td>
<td width="1" class="bgcolor_02"></td>
</tr>      
<tr><td colspan="3" class="bgcolor_02" height="1"></td></tr>   
</table>
<?php }?>
<?php if($action=='purchase_goodsreceipt' || $action=='print_purchase_goodsreceipt'){
if($action=='print_purchase_goodsreceipt'){ 
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
VALUES('".$_SESSION['eschools']['admin_id']."','es_book_orders','INVENTORY','Inventory Reports','','Print Compare','".$_SERVER['REMOTE_ADDR']."',NOW())";
$log_insert_exe=mysql_query($log_insert_sql);}

?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">


<tr>
<td height="3" colspan="3"></td>
</tr>		  
<tr>
<td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Purchase Order and Goods Receipt Details </span></td>
</tr>	
<tr>
<td width="1" class="bgcolor_02"></td>
<td align="center" valign="top">
<table width="100%" border="0" cellpadding="1" cellspacing="1">

<tr>
<td colspan="5" align="left">
<table width="100%" border="0" cellpadding="2" cellspacing="0">
<tr>
<td align="left" width="284">Ordered Date : </td>
<td align="left" width="916"><?php echo func_date_conversion("Y-m-d","d/m/Y",$details['fld_orderdate']);?></td>
</tr>
<tr>
<td align="left" >Purchase Order No : </td>
<td align="left" width="916"><?php echo $item;?></td>
</tr>
<tr>
<td align="left" >Goods Receipt Note No : </td>
<td align="left" width="916"><?php echo $details['fld_recnote'];?></td>
</tr>
<tr>
<td align="left" >Received Date : </td>
<td align="left" width="916"><?php echo func_date_conversion("Y-m-d H:i:s","d/m/Y H:i:s",$details['fld_recdate']);?></td>
</tr>
<tr>
<td align="left" >Supplier Name: </td>
<td align="left" width="916"><?php 
$sname = $db->getone("SELECT in_name FROM es_booksupplier_master WHERE fld_supplier_masterid=".$details['	fld_booksupplier']);
echo ucwords($sname) ;?></td>
</tr>


</table>
</td>
</tr>
<tr>
<td colspan="5" height="10"></td>
</tr>
<tr class="bgcolor_02">
<td width="12%"  height="20" align="center" class="admin">S.No</td>
<td width="15%" align="center" class="admin">Item Code</td>
<td width="28%" align="center" class="admin">Item Name</td>
<td width="19%" align="center" class="admin">Ordered Quantity</td>
<td width="26%" align="center" class="admin">Received Quantity</td>
</tr>
<?php
//array_print($Search_Results);
$rw = 1;
if(count($pdetails )>0)
{
foreach($pdetails  as $eachrecord)
{
if($rw%2==0)
$rowclass = "even";
else
$rowclass = "odd";
$item_det = $db->getrow("SELECT * FROM `es_itembook_master` WHERE `fld_item_masterid`=" . $eachrecord['item_name']);
?>
<tr class="<?php echo $rowclass;?>">
<td align="center" class="narmal"><?php echo $rw;?></td>
<td align="center" class="narmal"><?php echo $item_det['fld_item_code'];?></td>
<td align="center" class="narmal"><?php echo $item_det['fld_item_name'];?></td>
<td align="center" class="narmal"><?php echo $eachrecord['quantity'];?></td>
<td align="center" class="narmal"><?php
if(count($gdetails)>=1){
foreach($gdetails  as $each){
if($each['item_name']==$eachrecord['item_name']){echo $each['quantity'];}
}
}
?></td>
</tr>
<?php
$rw++;
}
}
?>
<?php if($action!='print_purchase_goodsreceipt'){?>
<tr>
<td colspan="5" height="10">
<input type="button" name="backbtn" value="Back" class="bgcolor_02" onclick="javascript:history.go(-1);" style="cursor:pointer;">&nbsp;&nbsp;&nbsp;<input type="button" style="cursor:pointer;" value="Print Details" onclick="window.open('?pid=132&action=print_purchase_goodsreceipt<?php echo $searchUrl;?>&item=<?php echo $item; ?>',null,'width=700,height=500,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  />
</td>
</tr>
<?php }?>

</table>	

</td>
<td width="1" class="bgcolor_02"></td>
</tr>      
<tr><td colspan="3" class="bgcolor_02" height="1"></td></tr>   
</table>
<?php }?>
