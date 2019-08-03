<?php 
	/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
if($action == 'department') { ?>
	<form name="addexams" method="post" action="">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Add&nbsp;Department</span></td>
              </tr>			  
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td  align="center" valign="top"><br />
				<table width="100%" border="0" cellpadding="0" cellspacing="0">
				            <tr height="25" class="bgcolor_02">
                              <td width="30%" align="left" class="admin">&nbsp;S.No</td>							   
                              <td width="35%" align="left" class="admin">Department Name
							  </td>
                              <td width="35%" align="left" class="admin">Action</td>
                            </tr>
							<?php
							 $rownumcla = 0;
							 foreach ($alldeptlist as $eachrecord){ 
							 $rownumcla++;
							 ?>
							 					 
							<tr height="25">
                             <?php if (isset($eid) && $eid == $eachrecord->es_departmentsId) { ?>
						
							  <td align="left" class="narmal"><?php echo $rownumcla; ?></td>
							  <td align="left" class="narmal"><?php echo '<input type="text" name="edit_dept" value="'.$eachrecord->es_deptname.'">'; ?></td>
                              <td align="left">
							  <?php if(in_array('10_1',$admin_permissions)){?><a href="javascript:AddRow()" title="Add"><img src="images/add_16.png" border="0" /></a>&nbsp;<?php }?>
<?php /*?><a href="javascript:del_dept(<?php echo $eachrecord->es_departmentsId; ?>)" title="Delete"><img src="images/b_drop.png" border="0" /></a><?php */?>&nbsp;
<?php if(in_array('10_2',$admin_permissions)){?><input type="image" src="images/save_16.png" name="editdept" value="Update" /><?php }?>


                  				
							<?php } 
								else { 
							?>
						
							  <td align="left" class="narmal"><?php echo $rownumcla; ?></td>
							  <td align="left" class="narmal"><?php echo $eachrecord->es_deptname; ?></td>
                              <td align="left">
							 
							  <?php if(in_array('10_1',$admin_permissions)){?><a href="javascript:AddRow()" title="Add"><img src="images/add_16.png" border="0" /></a>&nbsp;<?php }?>
							  <?php  if ($eachrecord->es_departmentsId!=13){ ?>
							  <?php if(in_array('10_3',$admin_permissions)){?> <a href="javascript:del_dept(<?php echo $eachrecord->es_departmentsId; ?>)" title="Delete"><img src="images/b_drop.png" border="0" /></a><?php }?>
							  <?php if(in_array('10_2',$admin_permissions)){?><a href="<?php echo buildurl(array('pid'=>49, 'action'=>'department', 'eid'=>$eachrecord->es_departmentsId ));?>" title="Edit Exam"><?php echo editIcon();?></a><?php }?>
							 </td>
							  <?php }}?>		
						
						</tr>
							
							<?php
							
							 }?>
                          <tr height="25">
                              <td align="left" class="narmal"><?php echo $rownumcla+1; ?></td>
							  <td align="left"><input name="deptname[]" type="text" size="15" /></td>
                              <td align="left"><!--<a href="#" title="Up"><img src="images/uparrow.jpg" border="0" width="20" height="20" /></a>&nbsp;<a href="#" title="Down"><img src="images/downarrow.jpg" border="0" width="20" height="20" /></a>&nbsp;-->
							  <?php if(in_array('10_1',$admin_permissions)){?><a href="javascript:AddRow()" title="Add"><img src="images/add_16.png" border="0" /></a>&nbsp;
							  <?php if(in_array('10_3',$admin_permissions)){?><a href="javascript:DelRow()" title="Delete"><img src="images/b_drop.png" border="0" /></a><?php }?>
							  <?php }?>
							  
							  </td>
                  </tr>
							<tr>
								<td colspan="3" align="left"><table id="uplimg" width="100%" border="0" cellspacing="0" cellpadding="0"></table>
								</td>
							</tr>
							<tr height="30"><td colspan="3" align="center">
							<?php if(in_array('10_1',$admin_permissions)){?><input class="bgcolor_02" type="submit" name="save" value="Save" /><?php }?>
			&nbsp;<input class="bgcolor_02" type="reset" name="reset" value="Reset" /></td></tr>                           
                  </table>						
				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
          </tr>
      </table></form>			
			<?php } ?>		
			
<form name="addpost" method="post" action="">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Add&nbsp;Post</span></td>
              </tr>			  
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="center" valign="top"><br />
                  <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="10" colspan="3"></td>
                    </tr>
                    <tr>
                      <td height="10" colspan="3">&nbsp;<b>Choose Department : </b>
                          <select name="sub_post" id="sub_post" onchange="javascript:document.addpost.submit();">
                            <option value=''>Select Department</option>
                            <?php
                              			foreach ($alldeptlist as $eachrecord)
                              			{
                              				if($sub_post == $eachrecord->es_departmentsId) {
                              					$sel = "selected";
                              				} else {
                              					$sel = "";
                              				}
                              				echo "<option value='$eachrecord->es_departmentsId' $sel>$eachrecord->es_deptname</option>";
                              			}
                              		?>
                          </select>                      </td>
                    </tr>
                    <tr>
                      <td height="20" colspan="3"></td>
                    </tr>
                    <?php
							if($sub_post != "")
							{
						?>
                    <tr height="25" class="bgcolor_02">
                      <td width="20%" align="left" class="admin">&nbsp;S.No</td>
                      <td width="40%" align="left" class="admin">Post&nbsp;Name </td>
                      <td width="40%" align="left" class="admin">Action</td>
                    </tr>
                    <?php
							$rownum = 1;
							if(count($obj_postlisttlistarr) > 0)
							{ 
							foreach ($obj_postlisttlistarr as $eachrecord){ ?>
                    <tr height="25">
                      <?php if (isset($scid) && $scid == $eachrecord->es_deptpostsId  )  { ?>
                      <td align="left" width="20%" class="narmal">&nbsp;<?php echo $rownum ?></td>
                      <td align="left" width="40%" class="narmal"><?php echo '<input type="text" name="sub_edit" size="7" value="'.$eachrecord->es_postname.'">'; ?></td>
                <td align="left" width="40%"><?php if(in_array('10_4',$admin_permissions)){?><a href="javascript:AddRow2()" title="Add"><img src="images/add_16.png" border="0" /></a>&nbsp;<?php }?>
				<?php if(in_array('10_6',$admin_permissions)){?><a href="javascript:del_post(<?php echo $eachrecord->es_deptpostsId ; ?>)" title="Delete"><img src="images/b_drop.png" border="0" /></a>&nbsp;<?php }?>
				<?php if(in_array('10_5',$admin_permissions)){?><input type="image" value="Update" alt="Update" src="images/save_16.png" name="editpost" /><?php }?>                  </td>
                      <?php } else { ?>
                      <td align="left" width="20%" class="narmal">&nbsp;<?php echo $rownum ?></td>
                      <td align="left" width="40%" class="narmal"><?php echo $eachrecord->es_postname; ?></td>
                      <td align="left" width="40%">
					  <?php if(in_array('10_4',$admin_permissions)){?><a href="javascript:AddRow2()" title="Add"><img src="images/add_16.png" border="0" /></a>&nbsp;<?php }?>
					  <?php if($eachrecord->es_deptpostsId!=16){ ?>
					  <?php if(in_array('10_6',$admin_permissions)){?> <a href="javascript:del_post(<?php echo $eachrecord->es_deptpostsId ; ?>)" title="Delete"><img src="images/b_drop.png" border="0" /></a>&nbsp;<?php }?>
					  
					  <?php if(in_array('10_5',$admin_permissions)){?><a href="<?php echo buildurl(array('pid'=>49,'action'=>'department','scid'=>$eachrecord->es_deptpostsId,'sub_post'=>$sub_post)); ?>"   title="editpost"><?php echo editIcon();?></a><?php }?>
					 <?php }}?></td>
                    </tr>
                    <?php
							$rownum++;
							 }
							}?>
                    <tr height="25">
                      <td align="left" width="10%" class="narmal">&nbsp;<?php echo $rownum; ?></td>
                      <td align="left" width="30%"><input name="post[]" type="text" size="15" /></td>
                      <td align="left" width="30%">
					  <?php if(in_array('10_4',$admin_permissions)){?><a href="javascript:AddRow2()" title="Add"><img src="images/add_16.png" border="0" /></a>&nbsp;<?php }?>
					  <?php if(in_array('10_6',$admin_permissions)){?><a href="javascript:DelRow2()" title="Delete"><img src="images/b_drop.png" border="0" /></a><?php }?>					  </td>
                    </tr>
                    <tr>
                      <td colspan="4" align="left"><table id="addpostss" width="100%" border="0" cellspacing="0" cellpadding="0">
                      </table></td>
                    </tr>
                    <tr height="30">
                      <td colspan="4" align="center">
					  <?php if(in_array('10_4',$admin_permissions)){?><input class="bgcolor_02" type="submit" name="savepost" value="Save" />
                        <?php }?>&nbsp;
<input class="bgcolor_02" type="reset" name="reset2" value="Reset" /></td></tr>
                    <?php } ?>
                  </table></td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
    </tr>
            </table>
			
</form>	
<script type="text/javascript" >
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
	  newcell.innerHTML = "<table width='100%' border='0' cellpadding='0' cellspacing='0'><tr height='25'><td align='left' class='narmal' width='30%'>"+ newrowiddd +"</td><td align='left' width='35%'><input name='deptname[]' type='text' size='15' /></td><td align='left' width='35%'><a href='javascript:AddRow()' title='Add'><img src='images/add_16.png' border='0' /></a>&nbsp;<a href='javascript:DelRow()' title='Delete'><img src='images/b_drop.png' border='0' /></a></td></tr></table>";
	  
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

	function del_dept(adminid){
		if(confirm("Are you sure you want to  delete?")){
			document.location.href = '?pid=49&action=deletedept&eid='+adminid;
		}
	}
	<?php if($sub_post!=""){ ?>
	function AddRow2() //This function will add extra row to provide another file
	 {
	  var prevrow = document.getElementById("addpostss");
	  var newrowiddd = parseInt(prevrow.rows.length) + 1 + <?php echo $rownum; ?>;
	  var tmpvar = gblvar;
	  var newrow = prevrow.insertRow(prevrow.rows.length);
	  newrow.id = newrow.uniqueID; // give row its own ID
	  
	  var newcell; // an inserted row has no cells, so insert the cells
	  newcell = newrow.insertCell(0);
	  newcell.id = newcell.uniqueID;
	  newcell.innerHTML = "<table width='100%' border='0' cellpadding='0' cellspacing='0'><tr height='25'><td align='left' class='narmal' width='20%'>&nbsp;"+ newrowiddd +"</td><td align='left' width='40%'><input name='post[]' type='text' size='15' /></td><td align='left' width='40%'><a href='javascript:AddRow2()' title='Add'><img src='images/add_16.png' border='0' /></a>&nbsp;<a href='javascript:DelRow2()' title='Delete'><img src='images/b_drop.png' border='0' /></a></td></tr></table>";
	  
	  gblvar = tmpvar + 1;
	  }
	
	function DelRow2() //This function will delete the last row
	{
		if(gblvar == 1)
			return;
		var prevrow = document.getElementById("addpostss");
		prevrow.deleteRow(prevrow.rows.length-1);
		gblvar = gblvar - 1;
	}
	<?php } ?>
	function del_post(adminid){
		if(confirm("Are you sure you want to  delete this Post?")){
			document.location.href = '?pid=49&action=deletepost&scid='+adminid;
		}
	}
	
	
</script>
