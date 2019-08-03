<?php

?><script type="text/javascript">
function redirect(value)
{
window.location='?pid=94&page=subject&action=list&class='+value;
}
</script>
<?php if($page=='caste') { ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td colspan="3" class="bgcolor_02" height="25">&nbsp;&nbsp;Caste Categories</td></tr>
<tr><td class="bgcolor_02" width="1"></td><td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
	 
	 <tr>
	 <td colspan="3" width='100%' align="center">
	 <form action='' method='post'>
	 <table>
	 <tr>
	 <td>
	 <input type='text' name='caste' value='<?php echo $caste; ?>'  />&nbsp;
	 <?php if($action!='edit'){ ?>
	 
	 <input type='submit' name='addcaste' value='Submit' class="bgcolor_02"/>
	 <?php } else {?>
	 <input type='submit' name='addcaste' value='Update' class="bgcolor_02"/>
	 <?php } ?>
	 </td>
	 </tr>
	 </table>
	 </form>
	 </td> 
	 </tr>
	 
	 <tr>
	 <td colspan="3">
	 <table width="100%">
	 <tr class="bgcolor_02" height="25">
	 <td width="7%" class='admin'>&nbsp;S.No</td>
	 <td width="58%" class='admin'>&nbsp;caste</td>
	 <td width="18%" class='admin'>&nbsp;Created On</td>
	 <td width="17%" align="center" class='admin'>Action</td>
	 </tr>
	 <?php if(is_array($caste_array) && count($caste_array)>0){
	 $i=1;
	 foreach($caste_array as $each_caste)
	 {
	 $class=($i%2==0)?'even':'odd';
	 ?>
	 <tr  class="<?php echo $class;?>">
	 <td><?php echo $i; ?></td><td><?php echo ucfirst($each_caste['caste']);?></td><td><?php echo date('d/m/Y',strtotime($each_caste['created_on']));?></td><td align="center" valign="middle">
	 <a href="?pid=94&action=edit&caste_id=<?php echo $each_caste['caste_id']; ?>&page=caste"><img src="images/b_edit.png" border="0" /></a>&nbsp;
	 <?php
	// echo "SELECT COUNT(*) FROM es_preadmission WHERE caste_id=".$each_caste['caste_id'];
	 $count_student=$db->getOne("SELECT COUNT(*) FROM es_preadmission WHERE caste_id=".$each_caste['caste_id']);
	 if($count_student==0)
	 {
	 ?>
     
 <?php /*?>    <?php if(in_array('2_5',$admin_permissions)){?>&nbsp;<a href="javascript:del_group(<?php echo $each_caste['caste_id'];  ?>)" title="Delete"><img src="images/b_drop.png" border="0" /></a><?php }?><?php */?>
 <?php /*?>    
     <A HREF="javascript:myfunction()">Click Here</A> <?php */?>
     
	 <a href=" ?pid=94&action=delete&caste_id=<?php echo $each_caste['caste_id']; ?>&page=caste" onClick="return confirm(' Are you sure you want to delete Caste?')"><img src="images/b_drop.png" border="0" /></a>&nbsp;
	 <?php } else { ?>
	<img src="images/b_drop.png" border="0" onclick='Javascript:alert("Sorry! It has some data");'/>
	 <?php } ?>
	 </td>
	 </tr>
	 <?php $i++; }} else {?>
		<tr>
	 <td colspan="4" align='center' style="font-size:12px; color:#FF0000; font-weight:bold;"> No Records Found</td>
	 </tr>
	 <?php } ?>
	 </table>
	  </td>
	 </tr>
	 
	 </table>
	 </td><td class="bgcolor_02" width="1"></td></tr>
	 <tr><td colspan="3" height='1px' class="bgcolor_02"></td></tr></table>
	 <?php } ?>
<?php if($page=='int') { ?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
  <td colspan="3" class="bgcolor_02" height="25">&nbsp;&nbsp;OTHER INSTITUTES</td>
</tr>
<tr><td class="bgcolor_02" width="1"></td><td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
	 
	 <tr>
	 <td colspan="3" width='100%' align="center">
	 <form action='' method='post'>
	 <table>
	 <tr>
	 <td>
	 <input type='text' name='inst_name' value='<?php echo $inst_name; ?>'  />&nbsp;
	 <?php if($action!='edit'){ ?>
	 
	 <input type='submit' name='addcaste' value='Submit' class="bgcolor_02"/>
	 <?php } else {?>
	 <input type='submit' name='addcaste' value='Update' class="bgcolor_02"/>
	 <?php } ?>
	 </td>
	 </tr>
	 </table>
	 </form>
	 </td> 
	 </tr>
	 
	 <tr>
	 <td colspan="3">
	 <table width="100%">
	 <tr class="bgcolor_02" height="25">
	 <td width="7%" class='admin'>&nbsp;S.No</td>
	 <td width="58%" class='admin'>&nbsp;Institue</td>
	 <td width="18%" class='admin'>&nbsp;Created On</td>
	 <td width="17%" align="center" class='admin'>Action</td>
	 </tr>
	 <?php if(is_array($caste_array) && count($caste_array)>0){
	 $i=$start+1;
	 if(count($caste_array)>0) {
	 foreach($caste_array as $each_caste)
	 {
	 $class=($i%2==0)?'even':'odd';
	 ?>
	 <tr  class="<?php echo $class;?>">
	 <td><?php echo $i; ?></td><td><?php echo ucfirst($each_caste['inst_name']);?></td><td><?php echo func_date_conversion('Y-m-d','d/m/Y',$each_caste['created_on']);?></td><td align="center" valign="middle">
	 <a href="?pid=94&action=edit&inst_id=<?php echo $each_caste['inst_id']; ?>&page=int"><img src="images/b_edit.png" border="0" /></a>&nbsp;
	 <?php
	// echo "SELECT COUNT(*) FROM es_preadmission WHERE caste_id=".$each_caste['caste_id'];
	 $count_student=$db->getOne("SELECT COUNT(*) FROM es_preadmission WHERE pre_current_class1=".$each_caste['inst_id']." OR pre_current_class2=".$each_caste['inst_id']." OR pre_current_class3=".$each_caste['inst_id']);
	 if($count_student==0)
	 {
	 ?>
	 <a href=" ?pid=94&action=delete&inst_id=<?php echo $each_caste['inst_id']; ?>&page=int" onClick="return confirm('Are you sure you want to delete Institute?')"><img src="images/b_drop.png" border="0" /></a>&nbsp;
	 <?php } else { ?>
	<img src="images/b_drop.png" border="0" onclick='Javascript:alert("Sorry! It has some data");'/>
	 <?php } ?>
	 </td>
	 </tr>
	 <?php $i++; }}?>
	  <tr>
			<td colspan="5" align="center" class="narmal"><?php  paginateexte($start, $q_limit, $no_rows, "page=int");?></td>
		  </tr>
	 <?php } else {?>
		<tr>
	 <td colspan="4" align='center' style="font-size:12px; color:#FF0000; font-weight:bold;"> No Records Found</td>
	 </tr>
	 <?php } ?>
	 </table>
	  </td>
	 </tr>
	 
	 </table>
	 </td><td class="bgcolor_02" width="1"></td></tr>
	 <tr><td colspan="3" height='1px' class="bgcolor_02"></td></tr></table>
	 
<?php } ?>

<?php if($page=='transport') { ?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td colspan="3" class="bgcolor_02" height="25">&nbsp;&nbsp;<span id="internal-source-marker_0.1335878380918223">Student Pick-up Point </span></td>
</tr>
<tr><td class="bgcolor_02" width="1"></td><td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
	 
	 <tr>
	 <td colspan="3" width='100%' align="center">
	 <form action='' method='post'>
	 <table>
	 <tr>
	 <td>
	 <input type='text' name='place_name' value='<?php echo $place_name; ?>'  />&nbsp;
	 <?php if($action!='edit'){ ?>
	 
	 <input type='submit' name='addcaste' value='Submit' class="bgcolor_02"/>
	 <?php } else {?>
	 <input type='submit' name='addcaste' value='Update' class="bgcolor_02"/>
	 <?php } ?>
	 </td>
	 </tr>
	 </table>
	 </form>
	 </td> 
	 </tr>
	 
	 <tr>
	 <td colspan="3">
	 <table width="100%">
	 <tr class="bgcolor_02" height="25">
	 <td width="7%" class='admin'>&nbsp;S.No</td>
	 <td width="58%" class='admin'>&nbsp;<span id="internal-source-marker_0.1335878380918223">Pick-up Point</span></td>
	 <td width="18%" class='admin'>&nbsp;Created On</td>
	 <td width="17%" align="center" class='admin'>Action</td>
	 </tr>
	 <?php if(is_array($caste_array) && count($caste_array)>0){
	 $i=1;
	 foreach($caste_array as $each_caste)
	 {
	 $class=($i%2==0)?'even':'odd';
	 ?>
	 <tr  class="<?php echo $class;?>">
	 <td><?php echo $i; ?></td><td><?php echo ucfirst($each_caste['place_name']);?></td><td><?php echo func_date_conversion('Y-m-d','d/m/Y',$each_caste['created_on']);?></td><td align="center" valign="middle">
	 <a href="?pid=94&action=edit&tr_place_id=<?php echo $each_caste['tr_place_id']; ?>&page=transport"><img src="images/b_edit.png" border="0" /></a>&nbsp;
	 <?php
	// echo "SELECT COUNT(*) FROM es_preadmission WHERE caste_id=".$each_caste['caste_id'];
	 $count_student=$db->getOne("SELECT COUNT(*) FROM es_preadmission WHERE tr_place_id=".$each_caste['tr_place_id']);
	 if($count_student==0)
	 {
	 ?>
	 <a href=" ?pid=94&action=delete&tr_place_id=<?php echo $each_caste['tr_place_id']; ?>&page=transport" onclick='Javascript:alert("Are you sure you want to delete Pick-up point?");'><img src="images/b_drop.png" border="0" /></a>&nbsp;
	 <?php } else { ?>
	<img src="images/b_drop.png" border="0" onclick='Javascript:alert("Sorry! It has some data");'/>
	 <?php } ?>
	 </td>
	 </tr>
	 <?php $i++; }} else {?>
		<tr>
	 <td colspan="4" align='center' style="font-size:12px; color:#FF0000; font-weight:bold;"> No Records Found</td>
	 </tr>
	 <?php } ?>
	 </table>
	  </td>
	 </tr>
	 
	 </table>
	 </td><td class="bgcolor_02" width="1"></td></tr>
	 <tr><td colspan="3" height='1px' class="bgcolor_02"></td></tr></table>
	 
<?php } ?>

<?php if($page=='subject') { ?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td colspan="3" class="bgcolor_02" height="25">&nbsp;&nbsp;<span id="internal-source-marker_0.5963001342130408">Subjects Categorization</span> </td>
</tr>
<tr><td class="bgcolor_02" width="1"></td><td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
	 
	 <tr>
	 <td colspan="3" width='100%' align="center">
	 <?php if($action=='add' || $action=='edit') {?>
	 <form action="" method='post'>
	 <table>
	 <tr>
	 <td></td><td>Class</td><td>:</td><td align="left">
	 <?php 
	
	
	 if($action!='edit'){ ?>
	 <select name='classid' onchange='this.form.submit();'>
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
	 </select><?php } else { 
	$sub_det1=$db->getRow('SELECT * FROM es_classes  WHERE es_classesid='.$sub_det['classid']);
	 echo ucfirst($sub_det1['es_classname']);?> 
	
	 <input type='hidden' value='<?php echo $sub_det['classid']; ?>' name='classid' />
	 <?php } ?>
	 </td><td></td>
	 </tr>
	 <tr><td></td><td>Subjects</td><td>:</td>
	
	 <td>
	<table width="100%">
	 <?php
	 if(isset($classid) && $classid!='')
	 {
	 $subject_array=$db->getRows('SELECT * FROM es_subject WHERE es_subjectshortname='.$classid);
	 if(count($subject_array)>0)
	 {
	 foreach($subject_array as $each_subject)
	 {
	 ?> <tr>
	<td width="17%">
	 <input type='checkbox' name='subject_id_array[]' value='<?php echo $each_subject['es_subjectid'] ;?>' <?php if(isset($subject_id_array) && in_array($each_subject['es_subjectid'],$subject_id_array)){?> checked="checked"<?php } ?>/></td>
	<td width="83%" align="left"><?php echo  ($each_subject['es_subjectname']);?></td>
	 </tr> <?php }} } ?></table>
	 </td><td></td></tr>
	 <tr><td></td><td>Category Name</td><td>:</td><td><input type='text' name='scat_name' value='<?php echo $scat_name; ?>' /></td><td></td></tr>
	 <tr><td colspan="3"></td><td>
	 <?php
	 if($action=='add')
	 {
	 ?>
	 <input type='submit' name='subject_cat' value='Submit' class="bgcolor_02"/>
	 <?php } if($action=='edit'){ ?>
	 <input type='submit' name='subject_cat' value='Update' class="bgcolor_02"/>
	 <?php } ?>
	 
	 </td><tr>
	 </table>
	 </form>
	 <?php } ?>
	 </td> 
	 </tr>
	 
	 <tr>
	 <td colspan="3">
	 <?php if($action=='list'){?>
	
	 <table width="100%"> 
	 <tr><td colspan='4' align='center'>
	  <form action='?pid=94&page=subject&action=list' name='clsass'>
	 CLASS&nbsp;:&nbsp;&nbsp;
	 <select name='class' onchange="redirect(this.value);">
	 <?php
	 $class_list=$db->getRows("SELECT * FROM es_classes ORDER BY es_classesid");
	 foreach($class_list as $each_list)
	 {
	 ?>
	 <option value='<?php echo $each_list['es_classesid']; ?>' <?php if($each_list['es_classesid']==$class){?> selected="selected"<?php }?>><?php echo $each_list['es_classname'];?></option>
	 <?php } ?>
	 </select>
	 </form>
	 </td><td align="right" style="padding-right:5px;"><a href=" ?pid=94&action=add&page=subject" class='bgcolor_02' style="padding:2px; text-decoration:none;"> Add New</a></td>
	 </tr>
	 <tr class="bgcolor_02" height="25">
	 <td width="7%" class='admin'>&nbsp;S.No</td>
	 <td width="17%" class='admin'>Class</td>
	 <td width="33%" class='admin'>Category</td>
	 <td width="31%" align="center" class='admin'>Subject</td>
	 <td width="12%" align="center" class='admin'>Action</td>
	 </tr>
	 <?php if(is_array($list_cat) && count($list_cat)>0){
	 $j=1;
	 foreach($list_cat as $each_list)
	 {
	 $class=($j%2==0)?'even':'odd';
	 ?>
	 <tr  class="<?php echo $class;?>">
	 <td><?php echo $j; ?></td><td style="padding-left:10px;"><?php echo ucfirst($each_list['es_classname']);?></td><td style="padding-left:5px;"><?php echo ucfirst($each_list['scat_name']);?></td>
	 <td align="left" style="padding-left:5px;">
	 <?php
	 if($each_list['subject_id_array']!='')
	 {
	 $subjects_list=explode('@#@#@',$each_list['subject_id_array']);
	 }
	 if(is_array($subjects_list))
	 {
	 $i=1;
	 foreach($subjects_list as $k=>$v)
	 {
	 $sub=$db->getRow("SELECT es_subjectname FROM es_subject WHERE es_subjectid=".$v);
	 ?>
	 <p>
	 <?php
	 echo $i.')'.ucfirst($sub['es_subjectname']);
	 ?></p>
	 <?php
	 $i++;
	 }
	 }
	 ?>	 </td>
	 <td align="center" valign="middle">
	 <a href="?pid=94&action=edit&scat_id=<?php echo $each_list['scat_id']; ?>&page=subject"><img src="images/b_edit.png" border="0" /></a>&nbsp;
	 <?php

	 $count_student=$db->getOne("SELECT COUNT(*) FROM es_preadmission_details WHERE scat_id=".$each_list['scat_id']);
	 if($count_student==0)
	 {
	 ?>
	 <a href=" ?pid=94&action=delete&scat_id=<?php echo $each_list['scat_id']; ?>&page=subject" onClick="return confirm('Are you sure you want to delete Category?')"><img src="images/b_drop.png" border="0" /></a>&nbsp;
	 <?php } else { ?>
	<img src="images/b_drop.png" border="0" onclick='Javascript:alert("Sorry! It has some data");'/>
	 <?php } ?>
	 </td>
	 </tr>
	 <?php $j++; }} else {?>
		<tr>
	 <td colspan="5" align='center' style="font-size:12px; color:#FF0000; font-weight:bold;"> No Records Found</td>
	 </tr>
	 <?php } ?>
	 </table>
	
	 <?php } ?>
	  </td>
	 </tr>
	 
	 </table>
	 </td><td class="bgcolor_02" width="1"></td></tr>
	 <tr><td colspan="3" height='1px' class="bgcolor_02"></td></tr></table>
	 
<?php } ?>
<?php if($action=='display_sub'){?>
<table >
  <tr>
   <td align="left" valign="middle">
	 <?php
	 $sub_det=$db->getRow('SELECT * FROM subjects_cat SC WHERE SC.scat_id='.$scat_id);
	 echo "<b>CATEGORY NAME :</b> ".$sub_det['scat_name'].'<br><b>SUBJECTS : </b><br>';
	 if($sub_det['subject_id_array']!='')
	 {
	 $subjects_list=explode('@#@#@',$sub_det['subject_id_array']);
	 }
	 if(is_array($subjects_list))
	 {
	 $i=1;
	 foreach($subjects_list as $k=>$v)
	 {
	 $sub=$db->getRow("SELECT es_subjectname FROM es_subject WHERE es_subjectid=".$v);
	 echo $i.')'.ucfirst($sub['es_subjectname']).'<br />';
	 $i++;
	 }
	 }
	 ?>	 </td>
  </tr>
</table>


<?php }?>

