<?php 
	/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}

	if($action == 'manageclasses')
	{ ?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
 <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span id="internal-source-marker_0.33314255660257786">Groups / Classes / Subjects</span></td>
  </tr>	
			  <tr>
                <td width="1px" class="bgcolor_02" ></td>
                <td height="5" align="right"></td>
                 <td width="1px" class="bgcolor_02" ></td></td>
              </tr>	
              
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Create Groups</span></td>
              </tr>			  
              <tr>
                <td width="2" class="bgcolor_02"></td>
                <td align="center" valign="top"><br />
                <form method="post" name="managegroups" action="" >
				<table width="100%" border="0" cellpadding="0" cellspacing="0">                
                            <tr height="25" class="bgcolor_02">
                              <td width="10%" align="left" class="admin">Sr.No</td>							   
                              <td width="20%" align="left" class="admin">Group Name </td>                              						  
                              <td width="20%" align="left" class="admin">Action</td>
                            </tr>
							<?php
							$rownum = 0;
							
							if (is_array($obj_grouplistarr) && count($obj_grouplistarr) > 0) {
							 foreach ($obj_grouplistarr as $eachrecord){
							 $rownum++;
							  ?>
							<tr height="25">
							
							<?php if (isset($gid) && $gid == $eachrecord->es_groupsId ) {?>
							
							
                              <td align="left" width="10%" class="narmal"><?php echo $rownum; ?></td>
							  <td align="left" width="20%" class="narmal"><?php echo '<input type="text" name="gr_name" value="'.$eachrecord->es_groupname.'">'; ?></td>
							  <td align="left" width="20%">
                              
         <table width="25%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><a href="javascript:AddRow1()" title="Add"><img src="images/add_16.png" border="0" /></a></td>
    <td>&nbsp;</td>
    <td><a href="javascript:del_group(<?php echo $eachrecord->es_groupsId; ?>)" title="Delete"><img src="images/b_drop.png" border="0" /></a>	</td>
    <td>&nbsp;</td>
    <td>
	<input type="image" src="images/save_16.png"  name="editGroup" value="Update" onClick="return confirm('Are you sure you want to save Group ?')">	</td>
  </tr>
</table></td>
                  		
						<?php }
						else { ?>
						     <td align="left" width="10%" class="narmal"><?php echo $rownum; ?></td>
							  <td align="left" width="20%" class="narmal"><?php echo $eachrecord->es_groupname; ?>
                
                              </td>
							  <td align="left" width="20%">
                              <table width="25%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" valign="top" ><?php if(in_array('2_3',$admin_permissions)){?><a href="javascript:AddRow1()" title="Add"><img src="images/add_16.png" border="0" /></a><?php }?></td>
    <td align="left" valign="top" ><?php if(in_array('2_5',$admin_permissions)){?>&nbsp;<a href="javascript:del_group(<?php echo $eachrecord->es_groupsId; ?>)" title="Delete"><img src="images/b_drop.png" border="0" /></a>      <?php }?></td>
    <td  align="left" valign="top"> <?php if(in_array('2_4',$admin_permissions)){?>&nbsp;<a href="<?php echo buildurl(array('pid'=>20,'action'=>'manageclasses','gid'=>$eachrecord->es_groupsId)); ?>" title="Edit Group" ><?php echo editIcon(); ?> </a><?php }?>			</td>
  </tr>
</table>
					  
							  </td>
						<?php } ?>
						</tr>
							
							<?php
							
							 }
							 
							 }
							 ?>
                        
						 
						<tr height="25">
                              <td align="left" width="10%" class="narmal"><?php echo $rownum+1; ?></td>
						  <td align="left" width="20%"><input name="groupname[]" type="text" size="15" /></td>
							  <td align="left" width="20%"><!--<a href="#" title="Up"><img src="images/uparrow.jpg" border="0" width="20" height="20" /></a>&nbsp;<a href="#" title="Down"><img src="images/downarrow.jpg" border="0" width="20" height="20" /></a>&nbsp;-->
					<?php if(in_array('2_3',$admin_permissions)){?><a href="javascript:AddRow1()" title="Add"><img src="images/add_16.png" border="0" /></a>&nbsp;
					<?php if(in_array('2_5',$admin_permissions)){?><a href="javascript:DelRow1()" title="Delete"><img src="images/b_drop.png" border="0" /></a><?php }?>
					<?php }?>							  </td>
                  		</tr>
						<tr>
							<td colspan="4" align="center"><table id="addgrolis" width="100%" border="0" cellspacing="0" cellpadding="0">
													</table></td></tr>
							<tr height="32"><td colspan="4" align="center">
							<?php if(in_array('2_3',$admin_permissions)){?><input class="bgcolor_02" type="submit" name="savegroups" value="Save" />&nbsp;<input class="bgcolor_02" type="reset" name="reset" value="Reset" /><?php }?>
							</td></tr>                           
			    </table>	
                </form>
               	
				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
  </tr>
</table>
	
<!-- By Someone -->


<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin"><a name="cls">Create School</a></span></td>
              </tr>	
			  	  
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="center" valign="top"><br />
                <form action="" method="post" >
                  <table width="100%" border="0" cellpadding="0" cellspacing="0"><tr height="30"><td colspan="4" align="center"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr height="25" class="bgcolor_02">
                      <td width="10%" align="left" class="admin">&nbsp;Sr.No</td>
                      <td width="30%" align="left" class="admin">School</td>
                      <td width="30%" align="left" class="admin">Group</td>
                      <td width="30%" align="left" class="admin">Action</td>
                    </tr>
                    <?php
							 if (is_array($obj_schoollistarr) && count($obj_schoollistarr) > 0) {
							 $rownumsch = 0;
							 foreach ($obj_schoollistarr as $eachrecord)
							 {
							 $rownumsch++;
							  ?>
                    <tr height="25">
                      <?php if (isset($cg) && $cg == $eachrecord->school_id )
					   { ?>
                      <td align="left" width="10%" class="narmal"><?php echo $rownumsch; ?></td>
                      <td align="left" width="30%" class="narmal"><?php echo '<input type="text" size="7" name="school_name" value="'.$eachrecord->school_name.'" >'; ?></td>
                      <td align="left" width="30%" class="narmal"><select name="school_type">
                      <?php 
							  
							  if (is_array($obj_grouplistarr) && count($obj_grouplistarr) > 0) { 
							  foreach ($obj_grouplistarr as $eachrecord1)
							  {
							   ?>
                          <option value="<?php echo $eachrecord1->es_groupsId; ?> <?php if($cg == $eachrecord->es_classesId) { echo 'selected'; }  ?>"><?php echo $eachrecord1->es_groupname; ?></option>
                          <?php }   ?>
                      </select></td>
                      <td align="left" width="30%">
                      
                      <table width="36%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td><a href="javascript:AddRow()" title="Add"><img src="images/add_16.png" border="0" /></a></td>
                            <td><a href="javascript:del_school(<?php echo $eachrecord->school_id; ?>)" title="Delete"><img src="images/b_drop.png" border="0" /></a></td>
                            <td><input type="image" src="images/save_16.png" name="editSch" value="Update"  onclick="return confirm('Are you sure you want to  save School?')"/></td>
                          </tr>
                        </table>
                          <!--<a href="#" title="Up"><img src="images/uparrow.jpg" border="0" width="20" height="20" /></a>&nbsp;<a href="#" title="Down"><img src="images/downarrow.jpg" border="0" width="20" height="20" /></a>&nbsp;--></td>
                      <?php }} else { ?>
                      <td align="left" width="10%" class="narmal"><?php echo $rownumsch; ?></td>
                      <td align="left" width="30%" class="narmal"><?php echo $eachrecord->school_name; ?></td>
                      <td align="left" width="30%" class="narmal"><?php $groupdetails = get_groupname($eachrecord->group_id);
							  echo $groupdetails['es_groupname']; ?>                      </td>
                      <td align="left" width="30%"><!--<a href="#" title="Up"><img src="images/uparrow.jpg" border="0" width="20" height="20" /></a>&nbsp;<a href="#" title="Down"><img src="images/downarrow.jpg" border="0" width="20" height="20" /></a>&nbsp;-->
                      
                      
                      <table width="36%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>    <?php if(in_array('2_6',$admin_permissions)){?>
                        <a href="javascript:AddRow()" title="Add"><img src="images/add_16.png" border="0" /></a>
                        <?php }?></td>
       <td><?php if(in_array('2_8',$admin_permissions)){?>
                       <?php /*?>   <a href="javascript:del_class(<?php echo $eachrecord->es_classesId; ?>)" title="Delete"><img src="images/b_drop.png" border="0" /></a><?php */?>
                          <!--<a href="<?php //echo buildurl(array('pid'=>20, 'action'=>'manageclasses', 'sid'=>$eachrecord->school_id)); ?>" title="Delete" ><img src="images/b_drop.png" border="0" /></a>-->
						  <a href="javascript:del_school(<?php echo $eachrecord->school_id; ?>)" title="Delete"><img src="images/b_drop.png" border="0" /></a>
                        <?php }?>
                        
                       <?php /*?> <a href="?pid=20&action=deleteclass&cid=<?php echo $eachrecord->es_classesId; ?>" onClick="return confirm('Are you sure you want to delete ?')"  title="Delete"><img src="images/b_drop.png" border="0" /></a>
                        <?php }?><?php */?>                        </td>
          <td> <?php if(in_array('2_7',$admin_permissions)){?>
                        <a href="<?php echo buildurl(array('pid'=>20, 'action'=>'manageclasses', 'cg'=>$eachrecord->school_id)); ?>" title="Edit Class" ><?php echo editIcon(); ?></a></td>
  </tr>
</table>

                         
                        <?php }?>                      </td>
                      <?php } ?>
                    </tr>
                    <?php
							
							 }
							 }
							 ?>
                    <tr height="25">
                      <td align="left" width="10%" class="narmal"><?php echo $rownumsch+1; ?></td>
                      <td align="left" width="30%"><input name="schoolname[]" type="text" size="15" /></td>
                      <td align="left" width="30%"><select name="schooltype[]">
                          <?php 
							  if (is_array($obj_grouplistarr) && count($obj_grouplistarr) > 0) { 
							  foreach ($obj_grouplistarr as $eachrecord){ ?>
                          <option value="<?php echo $eachrecord->es_groupsId; ?>"><?php echo $eachrecord->es_groupname; ?></option>
                          <?php } }?>
                      </select></td>
                      <td align="left" width="30%"><!--<a href="#" title="Up"><img src="images/uparrow.jpg" border="0" width="20" height="20" /></a>&nbsp;<a href="#" title="Down"><img src="images/downarrow.jpg" border="0" width="20" height="20" /></a>&nbsp;-->
                          <?php if(in_array('2_6',$admin_permissions)){?>
                        <a href="javascript:myAddRow()" title="Add"><img src="images/add_16.png" border="0" /></a>&nbsp;
                          <?php if(in_array('2_8',$admin_permissions)){?>
                        <a href="javascript:myDelRow()" title="Delete"><img src="images/b_drop.png" border="0" /></a>
                        <?php }?>
                          <?php }?>                      </td>
                    </tr>
                    <tr>
                      <td colspan="4" align="left"><table id="uplimg1" width="100%" border="0" cellspacing="0" cellpadding="0">
                      </table></td>
                    </tr>
                    <tr height="30">
                      <td colspan="4" align="center"><?php if(in_array('2_6',$admin_permissions)){?>
                          <input class="bgcolor_02" type="submit" name="saveschool" value="Save" />
                        &nbsp;
                        <input class="bgcolor_02" type="reset" name="reset2" value="Reset" />
                        <?php }?>                      </td>
                    </tr>
                  </table></td></tr>
                </table>	
                  </form>					
				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
  </tr>
</table>






<!-- end of someone -->	
	
	
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
		
		function funSchool(id)
		{   
			if(id=="")
			{
				alert("Plz Select Group");
				return false;
			}else
			{
			url="?pid=55&action=getschoolbyid&grpid="+id;
			xmlHttp=GetXmlHttpObject(funHandle);
			xmlHttp.open("GET", url, true);
			xmlHttp.send(null);
			}
		}
		
		function funHandle()
		{
			if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
			{
				document.getElementById("schooldiv").innerHTML=xmlHttp.responseText
				//alert(xmlHttp.responseText);
				
			}
		
		}
	</script>
			

<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin"><a name="cls">Create Class</a></span></td>
              </tr>	
			  	  
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="center" valign="top"><br />
                <form action="" method="post" >
                  <table width="100%" border="0" cellpadding="0" cellspacing="0"><tr height="30"><td colspan="3" align="center"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr height="25" class="bgcolor_02">
                      <td width="20%" align="left" class="admin">&nbsp;Sr.No</td>
                      <td width="20%" align="left" class="admin">Class</td>
					  <td width="20%" align="left" class="admin">Group</td>
                      <td width="20%" align="left" class="admin">School</td>
                      <td width="20%" align="left" class="admin">Action</td>
                    </tr>
                    <?php
							 if (is_array($obj_classlistarr) && count($obj_classlistarr) > 0) 
							 {
							   $rownumcla = 0;
							   foreach ($obj_classlistarr as $eachrecord)
							   {
							       $rownumcla++;
							  ?>
							  
							  
                    <tr height="40">
                      <?php if (isset($clid) && $clid == $eachrecord->es_classesId  ) 
					  { ?>
                      <td align="left" width="10%" class="narmal"><?php echo $rownumcla; ?></td>
					  
                      <td align="left" width="30%" class="narmal"><?php echo '<input type="text" size="7" name="class_name" value="'.$eachrecord->es_classname.'" >'; ?></td>
					  <td align="left" width="30%"><select name="group_type" onchange='submit();'>
					  <option value="">select</option>
                          <?php 
							  if (is_array($obj_grouplistarr) && count($obj_grouplistarr) > 0)
							   { 
							  		foreach ($obj_grouplistarr as $eachrecord)
									{ ?>
                          				<option value="<?php echo $eachrecord->es_groupsId; ?>"><?php echo $eachrecord->es_groupname; ?></option>
                          <?php } }?>
                      </select></td>
                      <td align="left" width="30%" class="narmal"><select name="school_type">
                      <?php 
							  
							  if (is_array($obj_schoollistarr1) && count($obj_schoollistarr1) > 0) 
							  { 
							  	foreach ($obj_schoollistarr1 as $eachrecord1)
								{
							  
							   ?>
                          <option value="<?php echo $eachrecord1->school_id; ?> <?php if($cg == $eachrecord1->es_classesId) { echo 'selected'; }  ?>"><?php echo $eachrecord1->school_name; ?></option>
                          <?php }   ?>
                      </select></td>
                      <td align="left" width="30%">
                      
                      <table width="36%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td><a href="javascript:AddRow()" title="Add"><img src="images/add_16.png" border="0" /></a></td>
                            <td><a href="javascript:del_class(<?php echo $eachrecord->es_classesId; ?>)" title="Delete"><img src="images/b_drop.png" border="0" /></a></td>
                            <td><input type="image" src="images/save_16.png" name="editClass" value="Update"  onclick="return confirm('Are you sure you want to  save Class?')"/></td>
                          </tr>
                        </table>
                          <!--<a href="#" title="Up"><img src="images/uparrow.jpg" border="0" width="20" height="20" /></a>&nbsp;<a href="#" title="Down"><img src="images/downarrow.jpg" border="0" width="20" height="20" /></a>&nbsp;--></td>
                      <?php }
					  } 
					  else 
					  { ?>
                      <td align="left" width="10%" class="narmal"><?php echo $rownumcla; ?></td>
                      <td align="left" width="30%" class="narmal"><?php echo $eachrecord->es_classname; ?></td>
					  <td align="left" width="30%" class="narmal"><?php $groupdetails = get_groupname($eachrecord->es_groupId);
							  echo $groupdetails['es_groupname']; ?>  
							  
                      <td align="left" width="30%" class="narmal"><?php $groupdetails = get_schoolname($eachrecord->es_schoolId);
							  echo $groupdetails['school_name']; ?>                      </td>
                      <td align="left" width="30%"><!--<a href="#" title="Up"><img src="images/uparrow.jpg" border="0" width="20" height="20" /></a>&nbsp;<a href="#" title="Down"><img src="images/downarrow.jpg" border="0" width="20" height="20" /></a>&nbsp;-->
                      
                      
                      <table width="36%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>    <?php if(in_array('2_6',$admin_permissions)){?>
                        <a href="javascript:AddRow()" title="Add"><img src="images/add_16.png" border="0" /></a>
                        <?php }?></td>
       <td><?php if(in_array('2_8',$admin_permissions)){?>
                       <?php /*?>   <a href="javascript:del_class(<?php echo $eachrecord->es_classesId; ?>)" title="Delete"><img src="images/b_drop.png" border="0" /></a><?php */?>
                          <a href="<?php echo buildurl(array('pid'=>20, 'action'=>'manageclasses', 'cg'=>$eachrecord->es_classesId)); ?>" title="Delete" ><img src="images/b_drop.png" border="0" /></a>
                        <?php }?>
                        
                       <?php /*?> <a href="?pid=20&action=deleteclass&cid=<?php echo $eachrecord->es_classesId; ?>" onClick="return confirm('Are you sure you want to delete ?')"  title="Delete"><img src="images/b_drop.png" border="0" /></a>
                        <?php }?><?php */?>                        </td>
          <td> <?php if(in_array('2_7',$admin_permissions)){?>
                        <a href="<?php echo buildurl(array('pid'=>20, 'action'=>'manageclasses', 'clid'=>$eachrecord->es_classesId)); ?>" title="Edit Class" ><?php echo editIcon(); ?></a></td>
  </tr>
</table>

                         
                        <?php }?>                      </td>
                      <?php } ?>
                    </tr>
                    <?php
							
							 }
							 }
							 ?>
							 
							 
							 
                    <tr height="25">
                      <td align="left" width="10%" class="narmal"><?php echo $rownumcla+1; ?></td>
					  
                      <td align="left" width="30%"><input name="classname[]" type="text" size="15" /></td>
					  
					  <td align="left" width="30%"><select name="grouptype[]" onchange="funSchool(this.value);">
					  <option value="">select</option>
                          <?php 
							  if (is_array($obj_grouplistarr) && count($obj_grouplistarr) > 0) { 
							  foreach ($obj_grouplistarr as $eachrecord){ ?>
                          <option value="<?php echo $eachrecord->es_groupsId; ?>"><?php echo $eachrecord->es_groupname; ?></option>
                          <?php } }?>
                      </select></td>
					  
                      <td align="left" width="30%" id="schooldiv"><select name="schooltype[]" >
                          
                      </select></td>
					  
                      <td align="left" width="30%"><!--<a href="#" title="Up"><img src="images/uparrow.jpg" border="0" width="20" height="20" /></a>&nbsp;<a href="#" title="Down"><img src="images/downarrow.jpg" border="0" width="20" height="20" /></a>&nbsp;-->
                          <?php if(in_array('2_6',$admin_permissions)){?>
                        <a href="javascript:AddRow()" title="Add"><img src="images/add_16.png" border="0" /></a>&nbsp;
                          <?php if(in_array('2_8',$admin_permissions)){?>
                        <a href="javascript:DelRow()" title="Delete"><img src="images/b_drop.png" border="0" /></a>
                        <?php }?>
                          <?php }?>                      </td>
                    </tr>
                    <tr>
                      <td colspan="4" align="left"><table id="uplimg" width="100%" border="0" cellspacing="0" cellpadding="0">
                      </table></td>
                    </tr>
                    <tr height="30">
                      <td colspan="4" align="center"><?php if(in_array('2_6',$admin_permissions)){?>
                          <input class="bgcolor_02" type="submit" name="save" value="Save" />
                        &nbsp;
                        <input class="bgcolor_02" type="reset" name="reset2" value="Reset" />
                        <?php }?>                      </td>
                    </tr>
                  </table></td></tr>
                </table>	
                  </form>					
				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
  </tr>
</table>
			
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin"><a name="subj">Create Subjects</a></span></td>
              </tr>			  
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                              <td height="10" colspan="3"></td>
                            </tr>
                            <tr>
                              <td colspan="3" ><form name="addsubject" method="post" action=""><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="2%">&nbsp;</td>
    <td align="left" width="20%" ><b>Choose Class : </b></td>
    <td align="left" width="78%"><select name="sub_class" id="sub_class" onchange="javascript:document.addsubject.submit();">
                              		<option value=''>Select Class</option>
                              		<?php
                              			foreach ($obj_classlistarr as $eachrecord)
                              			{
                              				if($sub_class == $eachrecord->es_classesId) {
                              					$sel = "selected";
                              				} else {
                              					$sel = "";
                              				}
                              				echo "<option value='$eachrecord->es_classesId' $sel>$eachrecord->es_classname</option>";
                              			}
                              		?>
                              	</select>
                                
                                
                                
               <?php /*?>                 <select name="class_type">
                          <?php 
							  
							  if (is_array($obj_grouplistarr) && count($obj_grouplistarr) > 0) { 
							  foreach ($obj_grouplistarr as $eachrecord){
							  
							
							   ?>
                          <option value="<?php echo $eachrecord->es_groupsId; ?> <?php if($cg == $eachrecord->es_classesId) { echo 'selected'; }  ?>"><?php echo $eachrecord->es_groupname; ?></option>
                          <?php }   ?>
                      </select><?php */?>
                             </td>
  </tr>
</table></form></td>
                            </tr>
                            </table></td>
    </tr>
    <tr>
    <td> <blockquote>
      <form action="" method="post" >
        <table width="100%" cellpadding="0" cellspacing="0" >
          
          <tr>
            <td height="10" colspan="3"></td>
                              </tr>
          <?php
							if($sub_class != "")
							{
						
						?>
          
          <tr height="25" class="bgcolor_02">
            <td width="20%" align="left" valign="middle" class="admin">&nbsp;S.No</td>							   
                    <td width="40%" align="left" valign="middle" class="admin">Subject Name </td>                              						  
                    <td width="40%" align="left" valign="middle" class="admin">Action</td>
                              </tr>
          <?php
							$rownum = 1;
							if(count($obj_subjectlistarr) > 0)
							{ 
							foreach ($obj_subjectlistarr as $eachrecord){ ?>
          <tr height="25">
            
            <?php if (isset($scid) && $scid == $eachrecord->es_subjectId )  { ?>
            
            <td width="20%" align="left" valign="middle" class="narmal"><?php echo $rownum ?></td>
			        <td width="40%" align="left" valign="middle" class="narmal"><?php echo '<input type="text" name="sub_edit" size="7" value="'.$eachrecord->es_subjectname.'">'; ?></td>
			        <td width="40%" align="left" valign="middle">
                    
                    <table width="45%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="23%" align="left" valign="top"><a href="javascript:AddRow2()" title="Add"><img src="images/add_16.png" border="0" /></a></td>
    <td width="22%" align="left" valign="top"><a href="javascript:del_subject(<?php echo $eachrecord->es_subjectId; ?>)" title="Delete"><img src="images/b_drop.png" border="0" /></a></td>
    <td width="55%" align="left" valign="top"><input type="image" value="Update" alt="Update" src="images/save_16.png" name="editSubject" onClick="return confirm('Are you sure you want to save Subject ?')" /></td>
  </tr>


</table>
	</td>
							      
				    <?php } else { ?>
            
            <td width="20%" align="left" valign="middle" class="narmal"><?php echo $rownum ?></td>
			        <td width="40%" align="left" valign="middle" class="narmal"><?php echo $eachrecord->es_subjectname; ?></td>
			        <td width="40%" align="left" valign="middle">
                    <table width="30%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="20%" align="left" valign="top" > <?php if(in_array('2_9',$admin_permissions)){?><a href="javascript:AddRow2()" title="Add"><img src="images/add_16.png" border="0" /></a><?php }?></td>
    <td width="20%" align="left" valign="top"><?php if(in_array('2_11',$admin_permissions)){?>
      <a href="javascript:del_subject(<?php echo $eachrecord->es_subjectId; ?>)" title="Delete"><img src="images/b_drop.png" border="0" /></a><a href="javascript:del_subject(<?php echo $eachrecord->es_subjectId; ?>)" title="Delete"></a><?php }?></td>
    <td width="20%" align="left" valign="top"><?php if(in_array('2_10',$admin_permissions)){?><a href="<?php echo buildurl(array('pid'=>20,'action'=>'manageclasses','scid'=>$eachrecord->es_subjectId,'sub_class'=>$sub_class)); ?>"   title="EditSubject"><?php echo editIcon();?></a><?php }?>	</td>
  </tr>
</table>

       	            </td>
    
				     <?php } ?>
            </tr>
          
          <?php
							$rownum++;
							 }
							}?>
          
          <tr height="25">
            <td width="10%" align="left" valign="middle" class="narmal"><?php echo $rownum; ?></td>
				        <td width="30%" align="left" valign="middle"><input name="subject[]" type="text" size="15" /></td>
				        <td width="30%" align="left" valign="middle">
                        
                        <table width="48%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="22%" align="left" valign="top"><?php if(in_array('2_9',$admin_permissions)){?><a href="javascript:AddRow2()" title="Add"><img src="images/add_16.png" border="0" /></a></td>
    <td width="78%" align="left" valign="top"> <?php if(in_array('2_11',$admin_permissions)){?><a href="javascript:DelRow2()" title="Delete"><img src="images/b_drop.png" border="0" /></a><?php }?></td>
    
  </tr>

</table>

				         
			            <?php }?>			            </td>
               		      </tr>
          
          
          
          
          <tr>
            
            <td colspan="4" align="left" valign="middle"><table id="addsub" width="100%" border="0" cellspacing="0" cellpadding="0">
              </table></td></tr>
          <tr height="30"><td colspan="4" align="left" valign="middle"><input type="hidden" name="sub_class"value="<?php if($sub_class!=""){echo $sub_class;}?>"/>
            <?php if(in_array('2_9',$admin_permissions)){?><input class="bgcolor_02" type="submit" name="savesubject" value="Save" />&nbsp;<input class="bgcolor_02" type="reset" name="reset" value="Reset" /><?php }?>
            </td>
							</tr>
          
          <?php } ?>
          </table>
      </form>
    </blockquote></td>
  </tr>
</table></td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
    </tr>
            </table>
			
		
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
	  newcell.innerHTML = "<table width='100%' border='0' cellpadding='0' cellspacing='0'><tr height='25'><td align='left' class='narmal' width='10%'>"+ newrowiddd +"</td><td align='left' width='30%'><input name='classname[]' type='text' size='15' /></td><td align='left' width='30%'><select name='' onchange='funSchool(this.value)'><option>select</option><?php if (is_array($obj_grouplistarr) && count($obj_grouplistarr) > 0) { foreach ($obj_grouplistarr as $eachrecord){ ?><option value='<?php echo $eachrecord->es_groupsId; ?>'><?php echo $eachrecord->es_groupname; ?></option><?php } }?></select></td><td align='left' width='30%'><select name='schooltype[]' id='schooldiv'></select></td><td align='left' width='30%' colspan='2'><a href='javascript:AddRow()' title='Add'><img src='images/add_16.png' border='0' /></a>&nbsp;<a href=javascript:del_class(<?php echo $eachrecord->es_classesId?>)' title='Delete'><img src='images/b_drop.png' border='0' /></a></td></tr></table>";
	  
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
	
	
	<!-- By Someone -->
	
	
	function myAddRow() //This function will add extra row to provide another file
	 {
	  var prevrow = document.getElementById("uplimg1");
	  var newrowiddd = parseInt(prevrow.rows.length) + 1 + <?php echo $rownumsch+1; ?>;
	  var tmpvar = gblvar;
	  var newrow = prevrow.insertRow(prevrow.rows.length);
	  newrow.id = newrow.uniqueID; // give row its own ID
	  
	  var newcell; // an inserted row has no cells, so insert the cells
	  newcell = newrow.insertCell(0);
	  newcell.id = newcell.uniqueID;
	  newcell.innerHTML = "<table width='100%' border='0' cellpadding='0' cellspacing='0'><tr height='25'><td align='left' class='narmal' width='10%'>"+ newrowiddd +"</td><td align='left' width='30%'><input name='schoolname[]' type='text' size='15' /></td><td align='left' width='30%'><select name='schooltype[]'><?php foreach ($obj_grouplistarr as $eachrecord){ echo "<option value='".$eachrecord->es_groupsId."'>".$eachrecord->es_groupname."</option>"; } ?></select></td><td align='left' width='30%' colspan='2'><a href='javascript:myAddRow()' title='Add'><img src='images/add_16.png' border='0' /></a>&nbsp;<a href=javascript:del_class(<?php echo $eachrecord->es_classesId?>)' title='Delete'><img src='images/b_drop.png' border='0' /></a></td></tr></table>";
	  
	  gblvar = tmpvar + 1;
	  }

	function myDelRow() //This function will delete the last row
	{
		if(gblvar == 1)
			return;
		var prevrow = document.getElementById("uplimg1");
		prevrow.deleteRow(prevrow.rows.length-1);
		gblvar = gblvar - 1;
	}
	
	
	<!-- end of someone-->
//for adding groups////
	function AddRow1() //This function will add extra row to provide another file
	 {
	  var prevrow = document.getElementById("addgrolis");
	  var newrowiddd = parseInt(prevrow.rows.length) + 1 + <?php echo $rownum+1; ?>;
	  var tmpvar = gblvar;
	  var newrow = prevrow.insertRow(prevrow.rows.length);
	  newrow.id = newrow.uniqueID; // give row its own ID
	  
	  var newcell; // an inserted row has no cells, so insert the cells
	  newcell = newrow.insertCell(0);
	  newcell.id = newcell.uniqueID;
	  newcell.innerHTML = "<table width='100%' border='0' cellpadding='0' cellspacing='0'><tr height='25'><td align='left' class='narmal' width='20%'>"+ newrowiddd +"</td><td align='left' width='40%'><input name='groupname[]' type='text' size='15' /></td><td align='left' width='40%'><a href='javascript:AddRow1()' title='Add'><img src='images/add_16.png' border='0' /></a>&nbsp;<a href='javascript:DelRow1()' title='Delete'><img src='images/b_drop.png' border='0' /></a></td></tr></table>";
	  
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
	  newcell.innerHTML = "<table width='100%' border='0' cellpadding='0' cellspacing='0'><tr height='25'><td align='left' class='narmal' width='20%'>"+ newrowiddd +"</td><td align='left' width='40%'><input name='subject[]' type='text' size='15' /></td><td align='left' width='40%'><a href='javascript:AddRow2()' title='Add'><img src='images/add_16.png' border='0' /></a>&nbsp;<a href='javascript:DelRow2()' title='Delete'><img src='images/b_drop.png' border='0' /></a></td></tr></table>";
	  
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
	if(confirm(" Are you sure you want to delete Group?")){
		document.location.href = '?pid=20&action=deletegroup&gid='+adminid;
	}
	}
	function del_class(adminid){
	if(confirm("Are you sure you want to delete Class?")){
		document.location.href = '?pid=20&action=deleteclass&cid='+adminid;
	}
	}
	
	function del_school(adminid){
	if(confirm("Are you sure you want to delete School?")){
		document.location.href = '?pid=20&action=deleteschool&cid='+adminid;
	}
	}
	
		function del_subject(adminid){
	if(confirm("Are you sure you want to delete Subject?")){
		document.location.href = '?pid=20&action=deletesubject&sid='+adminid;
	}
	}
</script>	
						
<?php } if($action=='emailslist'){ ?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Manage Emails</span></td>
              </tr>			  
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="center" valign="top">
                    <form action="?pid=20&action=emailslist" method="post">
                	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="3%">&nbsp;</td>
                        <td width="34%">&nbsp;</td>
                        <td width="2%">&nbsp;</td>
                        <td width="61%" >&nbsp;</td>
                      </tr>
                      <?php if(isset($_SESSION['eschools']['superadmin_email']) && $_SESSION['eschools']['superadmin_email']!=""){?>
                      <tr>
                        <td>&nbsp;</td>
                        <td>Super Admin</td>
                        <td>:</td>
                        <td align="left"><input type="text" name="superadmin" value="<?php if(isset($superadmin) && $superadmin !=""){echo $superadmin; }?>" /></td>
                      </tr>
                      <?php }?>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td >&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>Admin</td>
                        <td>:</td>
                        <td align="left"><input type="text" name="admin" value="<?php if(isset($admin) && $admin !=""){echo $admin; }?>" /></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td >&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>Paypal Merchandise A/C Email ID</td>
                        <td>:</td>
                        <td align="left"><input type="text" name="paypal_email" value="<?php if(isset($paypal_email) && $paypal_email !=""){echo $paypal_email; }?>" /></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td >&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>Student Prefix</td>
                        <td>:</td>
                        <td align="left"><input type="text" name="student_prefix" value="<?php if(isset($student_prefix) && $student_prefix !=""){echo $student_prefix; }?>" /></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td >&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>Slot Prefix</td>
                        <td>:</td>
                        <td align="left"><input type="text" name="slot_prefix" value="<?php if(isset($slot_prefix) && $slot_prefix !=""){echo $slot_prefix; }?>" /></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td >&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td align="left">
                        
                        <input type="hidden" name="hiddenemails" value="<?php echo $emails_det['email_id'];?>" />
                        <input type="submit" name="update_emails" value="Submit" class="bgcolor_02" /></td>
                      </tr>
                      <tr>
                       <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td >&nbsp;</td>
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
<?php }if($action=='htmlcode'){ ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">API for Login</span></td>
              </tr>			  
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="center" valign="top">
                <table width="100%" border="0" cellspacing="0" cellpadding="10px">
                  <tr>
                    <td width="35%">API Code for Login Button </td>
                    <td width="1%">:</td>
                    <td width="64%"><textarea name="htmlcode" rows="4" cols="30" ><?php 	// Automatic calculation for the following K_PATH_URL constant
                    if (isset($_SERVER['HTTP_HOST']) AND (!empty($_SERVER['HTTP_HOST']))) {
                        if(isset($_SERVER['HTTPS']) AND (!empty($_SERVER['HTTPS'])) AND strtolower($_SERVER['HTTPS'])!='off') {
                            $k_path_url = 'https://';
                        } else {
                            $k_path_url = 'http://';
                        }
                        $k_path_url .= $_SERVER['HTTP_HOST'];
                        $k_path_url .= str_replace( '\\', '/', substr($_SERVER['PHP_SELF'], 0, -23));
                        
                        
                    }
                    $path_arr = explode('/', $_SERVER['PHP_SELF']);
                    $cur_foldpath =  count($path_arr)-3;
                    echo '<a href="'.$k_path_url.'"/><img src="'.$k_path_url.'/images/login2.gif" border="0" /></a>';
                    
                     ?></textarea></td>
                  </tr>
                </table>

                    
     
                
                </td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="center" valign="top">
                <table width="100%" border="0" cellspacing="0" cellpadding="10px">
                  <tr>
                    <td width="35%">API Code for Login Form </td>
                    <td width="1%">:</td>
                    <td width="64%"><textarea name="htmlcode" rows="4" cols="30" ><?php 	// Automatic calculation for the following K_PATH_URL constant
	if (isset($_SERVER['HTTP_HOST']) AND (!empty($_SERVER['HTTP_HOST']))) {
		if(isset($_SERVER['HTTPS']) AND (!empty($_SERVER['HTTPS'])) AND strtolower($_SERVER['HTTPS'])!='off') {
			$k_path_url = 'https://';
		} else {
			$k_path_url = 'http://';
		}
		$k_path_url .= $_SERVER['HTTP_HOST'];
		$k_path_url .= str_replace( '\\', '/', substr($_SERVER['PHP_SELF'], 0, -23));
		
		
	}
	$path_arr = explode('/', $_SERVER['PHP_SELF']);
$cur_foldpath =  count($path_arr)-3;
	$k_path_url .="/nlogin.php";
	echo '<iframe src="'.$k_path_url.'" height="200" width="280" scrolling="no" frameborder="0"></iframe>';
	 ?></textarea></td>
                  </tr>
                </table>
                    
     
                
                </td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
    </tr>
            </table>
<?php }?>
<?php  if($action=='managecurrency'){ ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Manage Currency</span></td>
              </tr>			  
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="center" valign="top">
                    <form action="?pid=20&action=managecurrency" method="post">
                	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td height="25" colspan="4" align="center" class="narmal">Note: Please provide the value of Rupees for 1 dollar</td>
                        
                      </tr>
                      <tr>
                        <td width="1%">&nbsp;</td>
                        <td width="38%" height="25" align="right" valign="middle">1USD($)</td>
                        <td width="1%" align="center" valign="middle">=</td>
                        <td width="60%" align="left" valign="middle">Rs
                        <input type="text" name="currency" value="<?php if(isset($currency) && $currency !=""){echo $currency; }?>" />(Rupees)</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td height="25">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td >&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td align="left" valign="middle">
                        <input type="hidden" name="hiddenid" value="<?php echo $currency_det['id'];?>" />
                        <input type="submit" name="update_currency" value="Submit" class="bgcolor_02" /></td>
                      </tr>
                      <tr>
                       <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td >&nbsp;</td>
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
<?php }?>