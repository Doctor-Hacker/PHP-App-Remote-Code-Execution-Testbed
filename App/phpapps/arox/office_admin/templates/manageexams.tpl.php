<?php 
	/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
?>
<?php /*?><script type="application/javascript">
function fun1()
{

	if(document.addexams.examname.value=='')
	{
		alert('adfasfasfasfsdssd');
		document.addexams.examname.focus();
		return false;
	}
	
}
</script><?php */?>


<?php /*?>

<script type="text/javascript">
function fun1()
{
var chks = document.getElementsByName('examname[]');
var hasChecked = false;
for (var i = 0; i < chks.length; i++)
{
if (chks[i].checked)
{
hasChecked = true;
break;
}
}
if (!hasChecked)
{
alert("Please select at least one.");
chks[0].focus();
return false;
}
return true;
}
</script>
<?php */?>
<?php 
if($action == 'manageexams') { ?>

	<form name="addexams" method="post" action="" >
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
        
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Add&nbsp;Exams</span></td>
              </tr>			  
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="center" valign="top"><br />
				<table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <tr  class="bgcolor_02">
                              <td width="30%" height="25" align="left" class="admin">&nbsp;S.No</td>							   
                              <td width="35%" align="left" class="admin">Exam Name</td>
                              <td width="35%" align="left" class="admin">Action</td>
                            </tr>
							<?php
							 $rownumcla = 0;
							 foreach ($allexamlist as $eachrecord){ 
							 $rownumcla++;
							 ?>
							<tr >
                             <?php if (isset($eid) && $eid == $eachrecord->es_examId) { ?>
							 
							  <td align="left" height="25" class="narmal">&nbsp;<?php echo $rownumcla; ?></td>
							  <td align="left" class="narmal"><?php echo '<input type="text" name="edit_class" value="'.$eachrecord->es_examname.'">'; ?></td>
                              <td align="left">
                              
                              <table width="32%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><a href="javascript:AddRow()" title="Add"><img src="images/add_16.png" border="0" /></a></td>
    <td>&nbsp;</td>
    <td><a href="javascript:del_exam(<?php echo $eachrecord->es_examId; ?>)" title="Delete"><img src="images/b_drop.png" border="0" /></a></td>
    <td>&nbsp;</td>
    <td><input type="image" src="images/save_16.png" name="editExam" value="Update" /></td>
  </tr>
</table></td>  				
							<?php } 
								else { 
							?>
						
								<td align="left" class="narmal">&nbsp;<?php echo $rownumcla; ?></td>
							  <td align="left" class="narmal"><?php echo $eachrecord->es_examname; ?></td>
                              <td align="left">
							  <table width="34%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php if(in_array('2_12',$admin_permissions)){?><a href="javascript:AddRow()" title="Add"><img src="images/add_16.png" border="0" /></a><?php }?></td>
    <td> <?php if(in_array('2_14',$admin_permissions)){?><a href="javascript:del_exam(<?php echo $eachrecord->es_examId; ?>)" title="Delete"><img src="images/b_drop.png" border="0" /></a><?php }?></td>
    <td>  <?php if(in_array('2_13',$admin_permissions)){?><a href="<?php echo buildurl(array('pid'=>47, 'action'=>'manageexams', 'eid'=>$eachrecord->es_examId ));?>" title="Edit Exam"><?php echo editIcon();?></a><?php }?></td>
  </tr>
</table>
							  </td>
							  <?php } ?>
						
						
						
						</tr>
							
							<?php
							
							 }?>
                          <tr >
                              <td align="left" height="25" class="narmal">&nbsp;<?php echo $rownumcla+1; ?></td>
							  <td align="left"><input name="examname[]" type="text" size="15" /></td>
                              <td align="left"><!--<a href="#" title="Up"><img src="images/uparrow.jpg" border="0" width="20" height="20" /></a>&nbsp;<a href="#" title="Down"><img src="images/downarrow.jpg" border="0" width="20" height="20" /></a>&nbsp;-->
							  <?php if(in_array('2_12',$admin_permissions)){?><a href="javascript:AddRow()" title="Add"><img src="images/add_16.png" border="0" /></a>&nbsp;
							  <?php if(in_array('2_14',$admin_permissions)){?> <a href="javascript:DelRow()" title="Delete"><img src="images/b_drop.png" border="0" /></a><?php }?>
							 <?php }?>
							  </td>
                            </tr>
							<tr>
								<td colspan="3" align="left"><table id="uplimg" width="100%" border="0" cellspacing="0" cellpadding="0"></table>
								</td>
							</tr>
							<tr ><td colspan="3" height="30" align="center">
							<?php if(in_array('2_12',$admin_permissions)){?><input class="bgcolor_02" type="submit" name="save" value="Save" />&nbsp;<input class="bgcolor_02" type="reset" name="reset" value="Reset" /><?php }?>
							</td></tr>   
                            </table>
                          					
				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
                </tr></table>
                </form>
			
			
			<?php } ?>
<script type="text/javascript" language="javascript1.5">
	var gblvar = 1;
	// for adding classes
	function AddRow() //This function will add extra row to provide another file
	 {
	  var prevrow = document.getElementById("uplimg");
	  var newrowiddd = parseInt(prevrow.rows.length) + 1 + <?php echo $rownumcla+1; ?>;
	  var tmpvar = gblvar;
	  var newrow = prevrow.insertRow(prevrow.rows.length);
	  newrow.id = newrow.uniqueID; // give row its own ID
	  
	  var newcell; // an inserted row has no cells, so insert the cells
	  newcell = newrow.insertCell(0);
	  newcell.id = newcell.uniqueID;
	  newcell.innerHTML = "<table width='100%' border='0' cellpadding='0' cellspacing='0'><tr height='25'><td align='left' class='narmal' width='30%'>&nbsp;"+ newrowiddd +"</td><td align='left' width='35%'><input name='examname[]' type='text' size='15' /></td><td align='left' width='35%'><a href='javascript:AddRow()' title='Add'><img src='images/add_16.png' border='0' /></a>&nbsp;<a href='javascript:DelRow()' title='Delete'><img src='images/b_drop.png' border='0' /></a></td></tr></table>";
	  
	  gblvar = tmpvar + 1;
	  }
	
	function DelRow() //This function will delete the last row
	{
		if(gblvar == 1)
			return;
		var prevrow = document.getElementById("uplimg");
		prevrow.deleteRow(prevrow.rows.length-1);
		gblvar = gblvar - 1;
	}

	function del_exam(adminid){
		if(confirm("Are you sure you want to delete Exam?")){
			document.location.href = '?pid=47&action=deleteexam&eid='+adminid;
		}
	}
	
</script>