<?php 
	/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
	if($action == 'manageclasses') { ?>


<form name="addgroups" method="post" action="">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Manage Departments</span></td>
              </tr>			  
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td width="954" align="center" valign="top"><br />
				<table width="90%" border="0" cellpadding="0" cellspacing="0">
                            <tr height="25" class="bgcolor_02">
                              <td width="20%" align="center" class="admin">S.No</td>							   
                              <td width="40%" align="center" class="admin">Department Name </td>                              						  
                              <td width="40%" align="center" class="admin">Action</td>
                            </tr>
							<?php
							$rownum = 1;
							 foreach ($obj_grouplistarr as $eachrecord){ ?>
							<tr height="25">
                              <td align="center" width="20%" class="narmal"><?php echo $rownum ?></td>
							  <td align="center" width="40%" class="narmal"><?php echo $eachrecord->es_deapartmentanme ; ?></td>
							  <td align="center" width="40%"><!--<a href="#" title="Up"><img src="images/uparrow.jpg" border="0" width="20" height="20" /></a>&nbsp;<a href="#" title="Down"><img src="images/downarrow.jpg" border="0" width="20" height="20" /></a>&nbsp;--><a href="javascript:AddRow1()" title="Add"><img src="images/add_16.png" border="0" /></a>&nbsp;<a href="javascript:del_group(<?php echo $eachrecord->es_deapartmentId; ?>)" title="Delete"><img src="images/b_drop.png" border="0" /></a></td>
                  		</tr>
							
							<?php
							$rownum++;
							 }?>
                        <tr height="25">
                              <td align="center" width="10%" class="narmal"><?php echo $rownum ?></td>
							  <td align="center" width="30%">&nbsp;<input name="groupname[]" type="text" size="15" /></td>
							  <td align="center" width="30%"><!--<a href="#" title="Up"><img src="images/uparrow.jpg" border="0" width="20" height="20" /></a>&nbsp;<a href="#" title="Down"><img src="images/downarrow.jpg" border="0" width="20" height="20" /></a>&nbsp;--><a href="javascript:AddRow1()" title="Add"><img src="images/add_16.png" border="0" /></a>&nbsp;<a href="javascript:DelRow1()" title="Delete"><img src="images/b_drop.png" border="0" /></a></td>
                  		</tr>
						
						
						
						
							<tr>
							<td colspan="4" align="center"><table id="addgrolis" width="100%" border="0" cellspacing="0" cellpadding="0">
													</table></td></tr>
							<tr height="30"><td colspan="4" align="center"><input class="bgcolor_02" type="submit" name="savegroups" value="Save Departments" /><input class="bgcolor_02" type="reset" name="reset" value="Reset" /></td></tr>                           
                  </table>						
				</td>
                <td width="5" class="bgcolor_02"></td>
              </tr>
              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
                </tr>
            </table></form>
			
			
<form name="addclasses" method="post" action="">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Manage Posts</span></td>
              </tr>			  
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="center" valign="top"><br />
				<table width="90%" border="0" cellpadding="0" cellspacing="0">
                            <tr height="25" class="bgcolor_02">
                              <td width="10%" align="center" class="admin">S.No</td>							   
                              <td width="30%" align="center" class="admin">Posts</td>
                              <td width="30%" align="center" class="admin">Department</td>							  
                              <td width="30%" align="center" class="admin">Action</td>
                            </tr>
							<?php
							$rownumcla = 1;
							 foreach ($obj_classlistarr as $eachrecord){ ?>
							<tr height="25">
                              <td align="center" width="10%" class="narmal"><?php echo $rownumcla ?></td>
							  <td align="center" width="30%" class="narmal"><?php echo $eachrecord->es_postname ; ?></td>
                              <td align="center" width="30%" class="narmal"><?php echo $eachrecord->es_deapartmentname ; ?></td>
                              <td align="center" width="30%"><!--<a href="#" title="Up"><img src="images/uparrow.jpg" border="0" width="20" height="20" /></a>&nbsp;<a href="#" title="Down"><img src="images/downarrow.jpg" border="0" width="20" height="20" /></a>&nbsp;--><a href="javascript:AddRow()" title="Add"><img src="images/add_16.png" border="0" /></a>&nbsp;<a href="javascript:del_class(<?php echo $eachrecord->es_classesId; ?>)" title="Delete"><img src="images/b_drop.png" border="0" /></a></td>
                  		</tr>
							
							<?php
							$rownumcla++;
							 }?>
                          <tr height="25">
                              <td align="center" width="10%" class="narmal"><?php echo $rownumcla ?></td>
							  <td align="center" width="30%">&nbsp;<input name="classname[]" type="text" size="15" /></td>
                              <td align="center" width="30%"><select name="classtype[]">
							  <?php foreach ($obj_grouplistarr as $eachrecord){ ?>
                            <option value="<?php echo $eachrecord->es_deapartmentId; ?>"><?php echo $eachrecord->es_deapartmentanme; ?></option>                            
							<?php } ?>							
                          </select></td>
                              <td align="center" width="30%"><!--<a href="#" title="Up"><img src="images/uparrow.jpg" border="0" width="20" height="20" /></a>&nbsp;<a href="#" title="Down"><img src="images/downarrow.jpg" border="0" width="20" height="20" /></a>&nbsp;--><a href="javascript:AddRow()" title="Add"><img src="images/add_16.png" border="0" /></a>&nbsp;<a href="javascript:DelRow()" title="Delete"><img src="images/b_drop.png" border="0" /></a></td>
                            </tr>
							<tr>
							<td colspan="4" align="center"><table id="uplimg" width="100%" border="0" cellspacing="0" cellpadding="0">
													</table></td></tr>
							<tr height="30"><td colspan="4" align="center"><input class="bgcolor_02" type="submit" name="save" value="Save" /><input class="bgcolor_02" type="reset" name="reset" value="Reset" /></td></tr>                           
                          </table>						
				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
                </tr>
            </table></form>
			
	
			
						
			<?php } ?>
<script type="text/javascript" language="javascript1.5">
	var gblvar = 1;
	// for adding classes
	function AddRow() //This function will add extra row to provide another file
	 {
	  var prevrow = document.getElementById("uplimg");
	  var newrowiddd = parseInt(prevrow.rows.length) + 1 + <?php echo $rownumcla; ?>;
	  var tmpvar = gblvar;
	  var newrow = prevrow.insertRow(prevrow.rows.length);
	  newrow.id = newrow.uniqueID; // give row its own ID
	  
	  var newcell; // an inserted row has no cells, so insert the cells
	  newcell = newrow.insertCell(0);
	  newcell.id = newcell.uniqueID;
	  newcell.innerHTML = "<table width='100%' border='0' cellpadding='0' cellspacing='0'><tr height='25'><td align='center' class='narmal' width='10%'>"+ newrowiddd +"</td><td align='center' width='30%'><input name='classname[]' type='text' size='15' /></td><td align='center' width='30%'><select name='classtype[]'><?php foreach ($obj_grouplistarr as $eachrecord){ echo "<option value='".$eachrecord->es_groupsId."'>".$eachrecord->es_groupname."</option>"; } ?></select></td><td align='center' width='30%' colspan='2'><a href='javascript:AddRow()' title='Add'><img src='images/add_16.png' border='0' /></a>&nbsp;<a href='javascript:DelRow()' title='Delete'><img src='images/b_drop.png' border='0' /></a></td></tr></table>";
	  
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
//for adding groups////
	function AddRow1() //This function will add extra row to provide another file
	 {
	  var prevrow = document.getElementById("addgrolis");
	  var newrowiddd = parseInt(prevrow.rows.length) + 1 + <?php echo $rownum; ?>;
	  var tmpvar = gblvar;
	  var newrow = prevrow.insertRow(prevrow.rows.length);
	  newrow.id = newrow.uniqueID; // give row its own ID
	  
	  var newcell; // an inserted row has no cells, so insert the cells
	  newcell = newrow.insertCell(0);
	  newcell.id = newcell.uniqueID;
	  newcell.innerHTML = "<table width='100%' border='0' cellpadding='0' cellspacing='0'><tr height='25'><td align='center' class='narmal' width='20%'>"+ newrowiddd +"</td><td align='center' width='40%'><input name='groupname[]' type='text' size='15' /></td><td align='center' width='40%'><a href='javascript:AddRow1()' title='Add'><img src='images/add_16.png' border='0' /></a>&nbsp;<a href='javascript:DelRow1()' title='Delete'><img src='images/b_drop.png' border='0' /></a></td></tr></table>";
	  
	  gblvar = tmpvar + 1;
	  }
	
	
	
	function DelRow1() //This function will delete the last row
	{
		if(gblvar == 1)
			return;
		var prevrow = document.getElementById("addgrolis");
		prevrow.deleteRow(prevrow.rows.length-1);
		gblvar = gblvar - 1;
	}
	
	//for adding subjects//
	
	function AddRow2() //This function will add extra row to provide another file
	 {
	  var prevrow = document.getElementById("addsub");
	  var newrowiddd = parseInt(prevrow.rows.length) + 1 + <?php echo $rownum; ?>;
	  var tmpvar = gblvar;
	  var newrow = prevrow.insertRow(prevrow.rows.length);
	  newrow.id = newrow.uniqueID; // give row its own ID
	  
	  var newcell; // an inserted row has no cells, so insert the cells
	  newcell = newrow.insertCell(0);
	  newcell.id = newcell.uniqueID;
	  newcell.innerHTML = "<table width='100%' border='0' cellpadding='0' cellspacing='0'><tr height='25'><td align='center' class='narmal' width='20%'>"+ newrowiddd +"</td><td align='center' width='40%'><input name='subject[]' type='text' size='15' /></td><td align='center' width='40%'><a href='javascript:AddRow2()' title='Add'><img src='images/add_16.png' border='0' /></a>&nbsp;<a href='javascript:DelRow2()' title='Delete'><img src='images/b_drop.png' border='0' /></a></td></tr></table>";
	  
	  gblvar = tmpvar + 1;
	  }
	
	function DelRow2() //This function will delete the last row
	{
		if(gblvar == 1)
			return;
		var prevrow = document.getElementById("addsub");
		prevrow.deleteRow(prevrow.rows.length-1);
		gblvar = gblvar - 1;
	}
	
	// adding Dept
	
	
	//for adding subjects//
	
	
	
	
	function del_group(adminid){
	if(confirm(" Are you sure you want to  delete Group?")){
		document.location.href = '?pid=45&action=deletegroup&gid='+adminid;
	}
	}
	function del_class(adminid){
	if(confirm(" Are you sure you want to  delete  Class?")){
		document.location.href = '?pid=45&action=deleteclass&cid='+adminid;
	}
	}
	
		function del_subject(adminid){
	if(confirm(" Are you sure you want to  delete Subject?")){
		document.location.href = '?pid=45&action=deletesubject&sid='+adminid;
	}
	}
</script>