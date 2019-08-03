<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
  <td colspan="3" class="bgcolor_02" height="25">&nbsp;&nbsp;CLASS SECTIONS</td>
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
	 <td class="narmal">Class Section&nbsp;:&nbsp;
	 </td>
	 <td>
	 <input type='text' name='section_name' value='<?php echo $section_name; ?>'  />&nbsp;
	 <?php if($action!='edit'){ ?>
	 
	 <input type='submit' name='addsection' value='Submit' class="bgcolor_02"/>
	 <?php } else {?>
	 <input type='submit' name='addsection' value='Update' class="bgcolor_02"/>
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
	 <td width="58%" class='admin'>&nbsp;Section</td>
	 <td width="18%" class='admin'>&nbsp;Created On</td>
	 <td width="17%" align="center" class='admin'>Action</td>
	 </tr>
	 <?php if(is_array($sections_array) && count($sections_array)>0){
	 $i=1;
	 foreach($sections_array as $each_section)
	 {
	 $class=($i%2==0)?'even':'odd';
	 ?>
	 <tr  class="<?php echo $class;?>">
	 <td>&nbsp;<?php echo $i; ?></td><td>&nbsp;<?php echo ucfirst($each_section['section_name']);?></td><td>&nbsp;<?php echo func_date_conversion('Y-m-d','d-m-Y',$each_section['created_on']);?></td><td align="center" valign="middle">
 
     
	 <a href="?pid=97&action=edit&section_id=<?php echo $each_section['section_id']; ?>"><img src="images/b_edit.png" border="0" /></a>&nbsp;
	 <?php
	// echo "SELECT COUNT(*) FROM es_preadmission WHERE caste_id=".$each_caste['caste_id'];
	 $count_student=$db->getOne("SELECT COUNT(*) FROM es_sections_student WHERE section_id=".$each_section['section_id']);
	 if($count_student==0)
	 {
	 ?>
        
         
         
	 <a href=" ?pid=97&action=delete&section_id=<?php echo $each_section['section_id']; ?>" onClick="return confirm('Are you sure you want to delete Section?')"><img src="images/b_drop.png" border="0" /></a>&nbsp;
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
     
