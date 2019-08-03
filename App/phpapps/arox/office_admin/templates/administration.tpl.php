<?php 
/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
$admin_permissions_01 = $db->getone("SELECT admin_permissions FROM es_admins WHERE admin_username='".$_SESSION['eschools']['admin_user']."'");
$admin_permissions = explode(",",$admin_permissions_01 );
$edit_mod_top = $db->getRow("SELECT * FROM es_modules_alloted  WHERE id=1");
$moduleslevel_permissions=$edit_mod_top['modules_permissions'];
$top_level_permissions_admin= explode(',', $moduleslevel_permissions);
// Admin List
	if($action=='adminlist')
	{
?>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
	  <tr>
         <td height="3" colspan="3"></td>
	 </tr>
	  <tr>
		<td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Admin List</span></td>
	  </tr>
	  <tr>
		<td width="1" class="bgcolor_02"></td>
		<td  align="center" valign="top">
		<br />		
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr class="bgcolor_02" height="25">
			<td width="9%" align="left" class="admin">S&nbsp;No</td>
			<td width="18%" align="left" class="admin">Name</td>
			<td width="33%" align="left" class="admin">User&nbsp;Name<?php if(isset($_SESSION['eschools']['superadmin_email']) && $_SESSION['eschools']['superadmin_email']!=''){echo " - Password";}?> </td>
			<td width="22%" align="left" class="admin">Email&nbsp;ID</td>
			<td width="18%" align="center" class="admin">Action</td>
		  </tr>
		  <?php 
			$rownum = $start+1;
			if(count($leavemaster_det)>0) {
			foreach ($leavemaster_det as $eachrecord){
			$zibracolor = ($rownum%2==0)?"even":"odd";
			?>	
		  <tr class="<?php echo $zibracolor;?>">
			<td align="left" class="narmal"><?php echo $rownum; ?></td>
			<td align="left" class="narmal"><?php echo $eachrecord->admin_fname." ".$eachrecord->admin_lname; ?></td>
			<td align="left" class="narmal"><?php echo $eachrecord->admin_username; if(isset($_SESSION['eschools']['superadmin_email']) && $_SESSION['eschools']['superadmin_email']!=''){echo " - ".$eachrecord->admin_password;} ?></td>
			<td align="left" class="narmal"><?php echo $eachrecord->admin_email; ?></td>
			<td align="center" class="narmal"><?php if (in_array("1_1", $admin_permissions)) {?><a href="?pid=42&action=edit&elid=<?php echo $eachrecord->es_adminsId; ?>" title="Edit"><img src="images/b_edit.png" border="0" /></a>&nbsp;<?php }else{ echo "-"; }?>
            
            <?php if (in_array("1_2", $admin_permissions)) {?><a href="javascript:del_adminmaster(<?php echo $eachrecord->es_adminsId; ?>)" title="Delete"><img src="images/b_drop.png" border="0" /></a><?php }else{ echo "-"; }?></td>
		  </tr>
		  <?php 
		  $rownum++;
		  } ?>
		   
		   <tr>
			<td colspan="5" align="center" class="narmal"><?php paginateexte($start, $q_limit, $no_rows, "&action=adminlist");?></td>
		  </tr>
		  <?php if (in_array("1_4", $admin_permissions)) {?>
				  <tr>
<td class="narmal" align="right" colspan="5"><input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=42&action=print_adminlist&start=<?php echo $start;?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /></td></tr>
<?php }?>
		  <?php
		   } else { ?>
		   <tr>
			<td colspan="5" align="center" class="narmal">No Administrators Till Now</td>
		  </tr>
		  <?php } ?>		 
		  <tr>
		    <td colspan="5" align="center" class="narmal">&nbsp;</td>
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
// End of Admin List	
// Add Admin
	if($action=='addadmin' || $action=='edit')
	{ ?>
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
                  activatePermission();
            }
	function activatePermission() {

				var oInputs = document.getElementsByTagName('input');
				var dis = "y";
				for ( i = 0; i < oInputs.length; i++ )
				{
					if (oInputs[i].type == 'checkbox')
					{
						var chk_box = oInputs[i].id;
						if(document.getElementById(chk_box).checked)
						{
							document.getElementById("saveallowance").disabled = false;
							dis = "n"
						}
					}
				}
				if(dis=="y") {
					document.getElementById("saveallowance").disabled = true;
					//return false;
				}
			}		
	</script>
    <script> 
function chieldcatids(ele1,ele2) {
//	alert(ele1);
//	alert(ele2);
//	alert(document.getElementById(ele1).checked);
	cntarr = 0;
	var id_array = new Array();
	
	if(ele2 !='') {
		id_array = ele2.split("@");
		cntarr = id_array.length;
	}
	if(ele1==''){
	//alert(cntarr);
	}
	
	if(cntarr > 0) {
		if(document.getElementById(ele1).checked == true) {
			for(i=0;i<cntarr;i++) {
				document.getElementById(id_array[i]).disabled = false;		
			}
		}
		else {
			for(i=0;i<cntarr;i++) {
				document.getElementById(id_array[i]).disabled = true;		
			}
		}
	}
}
</script>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
	 <tr>
         <td height="3" colspan="3"></td>
	 </tr>
	  <tr>
		<td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Add Administrator </span></td>
	  </tr>
	  <tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="right" valign="top">
		<font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font><br />		
		<form action="" method="post" name="allowenceform">
		<table width="100%" border="0" cellspacing="2" cellpadding="2">
		  <tr>
			<td align="left" width="24%" class="adminfont">First Name</td>
			<td align="left" width="1%">:</td>
			<td align="left" width="75%"><input name="admin_fname" type="text" id="admin_fname" value="<?php echo $admin_fname;?><?php echo $admindetails->admin_fname;?>" /><font color="#FF0000">*</font></td>
		  </tr>
		   <tr>
			<td align="left" width="24%" class="adminfont">Last Name</td>
			<td align="left" width="1%">:</td>
			<td align="left" width="75%"><input name="admin_lname" type="text" id="admin_lname" value="<?php echo $admin_lname;?><?php echo $admindetails->admin_lname;?>" /><font color="#FF0000">*</font></td>
		  </tr>
		   <tr>
			<td align="left" width="24%" class="adminfont">User Name</td>
			<td align="left" width="1%">:</td>
			<td align="left" width="75%"><input name="admin_username" type="text" id="admin_username" value="<?php echo $admin_username;?><?php echo $admindetails->admin_username;?>" /><font color="#FF0000">*</font></td>
		  </tr>
          <?php if($action!="edit"){?>
		   <tr>
			<td align="left" width="24%" class="adminfont">Password</td>
			<td align="left" width="1%">:</td>
			<td align="left" width="75%"><input name="admin_password" type="password" id="admin_password" /><font color="#FF0000">*</font></td>
		  </tr>
		   <tr>
			<td align="left" width="24%" class="adminfont">Re-type Password</td>
			<td align="left" width="1%">:</td>
			<td align="left" width="75%"><input name="admin_password2" type="password" id="admin_password2" /><font color="#FF0000">*</font></td>
		  </tr>
          <?php }?>
		   <tr>
			<td align="left" width="24%" class="adminfont">e-mail</td>
			<td align="left" width="1%">:</td>
			<td align="left" width="75%"><input name="admin_email" type="text" id="admin_email" value="<?php echo $admin_email;?><?php echo $admindetails->admin_email;?>" /><font color="#FF0000">*</font></td>
		  </tr>
		  <tr>
			<td align="left" class="adminfont">Phone No </td>
			<td align="left">:</td>
			<td align="left"><input name="admin_phoneno" type="text" id="admin_phoneno" value="<?php echo $admin_phoneno;?><?php echo $admindetails->admin_phoneno;?>" /><font color="#FF0000">*</font></td>
		  </tr>
		  <?php /*?><tr>
			<td align="left" class="adminfont">Admin Level</td>
			<td align="left">:</td>
			<td align="left"><select name="adminlevel"><option value="super" >Super Admin</option><option value="admin" >Admin</option></select></td>
		  </tr><?php */?>
		  <tr>
			<td align="left" class="adminfont">More Details </td>
			<td align="left">:</td>
			<td align="left">
            <input type="hidden" name="adminlevel" value="<?php echo $adminlevel;?>" />
            <textarea name="admin_more" id="admin_more"><?php echo $admin_more;?><?php echo $admindetails->admin_more;?></textarea></td>
		  </tr>
		    <tr height="40">
			<td align="left" class="adminfont">Permissions</td>
			<td></td>
			<td></td>
		  </tr>
		  <tr>
			<td align="left" colspan="3" class="narmal"><table width="101%" border="0" cellspacing="2" cellpadding="2" style="font-family:Verdana, Geneva, sans-serif; font-size:11px;">
			
 <tr class="bgcolor_02">
                <td align="left" width="3%">&nbsp;</td>
                <td align="left" width="3%">&nbsp;</td>
                <td align="left" width="13%">Module</td>
                <td align="left" width="24%">Sub-Module</td>
                <td colspan="4" align="left">&nbsp;</td>
              </tr>              
              <?php if (in_array('1_p', $top_level_permissions_admin) && in_array('1_p',$admin_permissions) ){?>
			  <tr class="even">
                <td width="3%" align="left">1</td>
                <td align="left"><input type="checkbox" name="1_p" id="1_p"  value="1_p" <?php if( (isset($_POST['1_p'])&&$_POST['1_p']=="1_p") || ($action=="edit"&&$per_row['1_p']=="1_p") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> onclick='javascript:chieldcatids("1_p", "1_1@1_2@1_3@1_4");' />                 </td>
                <td width="13%" align="left">Administration</td>
                <td align="left">Admin List </td>
			    <td align="left">
			      <input type="checkbox" name="1_1" id="1_1" value="1_1" <?php if( (isset($_POST['1_1'])&&$_POST['1_1']=="1_1") || ($action=="edit"&&$per_row['1_1']=="1_1") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> 
			      Edit Admin			    </td>
			    <td width="17%" align="left"><input type="checkbox" name="1_2" id="1_2" value="1_2" <?php if( (isset($_POST['1_2'])&&$_POST['1_2']=="1_2") || ($action=="edit"&&$per_row['1_2']=="1_2") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?>/>
			      Delete Admin </td>
			    <td colspan="2" align="left"><input type="checkbox" name="1_4" id="1_4" value="1_4" <?php if( (isset($_POST['1_4'])&&$_POST['1_4']=="1_4") || ($action=="edit"&&$per_row['1_4']=="1_4") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?>/>Print</td>
			  </tr>			 
			  <tr class="even">
			    <td width="3%" align="left">&nbsp;</td>
			    <td align="left">&nbsp;</td>
			    <td width="13%" align="left">&nbsp;</td>
			    <td align="left">Add Admin </td>
			    <td align="left"><input type="checkbox" name="1_3" id="1_3" value="1_3" <?php if( (isset($_POST['1_3'])&&$_POST['1_3']=="1_3") || ($action=="edit"&&$per_row['1_3']=="1_3") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?>/><script type="text/javascript"> 
			chieldcatids("1_p", "1_1@1_2@1_3@1_4");
		</script> 
			      Add Admin </td>
			    <td align="left">&nbsp;</td>
			    <td colspan="2" align="left">&nbsp;</td>
			  </tr>
		
			   <tr><td align="left" colspan="8">&nbsp;</td></tr>            
               <?php } if (in_array('2_p', $top_level_permissions_admin) && in_array('2_p',$admin_permissions) ){ ?>
				 <tr class="even">
                   <td align="left">2</td>
                   <td align="left"><input type="checkbox" name="2_p"  id="2_p"  value="2_p" <?php if( (isset($_POST['2_p'])&&$_POST['2_p']=="2_p") || ($action=="edit"&&$per_row['2_p']=="2_p") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> onclick='javascript:chieldcatids("2_p", "2_1@2_2@2_3@2_4@2_5@2_6@2_7@2_8@2_9@2_10@2_11@2_12@2_13@2_14@2_15@2_18@2_19@2_20");' /></td>
                   <td align="left">SetUp</td>
                   <td align="left">Institute Details</td>
			       <td colspan="2" align="left"><input type="checkbox" name="2_1" value="2_1" id="2_1" <?php if( (isset($_POST['2_1'])&&$_POST['2_1']=="2_1") || ($action=="edit"&&$per_row['2_1']=="2_1") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
		           Add New Finance Year</td>
			       <td colspan="2" align="left"><input type="checkbox" name="2_2" value="2_2" id="2_2" <?php if( (isset($_POST['2_2'])&&$_POST['2_2']=="2_2") || ($action=="edit"&&$per_row['2_2']=="2_2") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
Edit  Financial Year</td>
		        </tr>
				 <tr class="even">
				   <td align="left">&nbsp;</td>
				   <td align="left">&nbsp;</td>
				   <td align="left">&nbsp;</td>
				   <td align="left">Groups/Classes/Subjects</td>
			       <td align="left"><input type="checkbox" name="2_3" value="2_3" id="2_3" <?php if( (isset($_POST['2_3'])&&$_POST['2_3']=="2_3") || ($action=="edit"&&$per_row['2_3']=="2_3") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
		           Add Groups</td>
			       <td align="left"><input type="checkbox" name="2_4" value="2_4" id="2_4" <?php if( (isset($_POST['2_4'])&&$_POST['2_4']=="2_4") || ($action=="edit"&&$per_row['2_4']=="2_4") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
		           Edit Groups</td>
			       <td colspan="2" align="left"><input type="checkbox" name="2_5" value="2_5" id="2_5" <?php if( (isset($_POST['2_5'])&&$_POST['2_5']=="2_5") || ($action=="edit"&&$per_row['2_5']=="2_5") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
		           Delete Group</td>
			    </tr>
				 <tr class="even">
				   <td align="left">&nbsp;</td>
				   <td align="left">&nbsp;</td>
				   <td align="left">&nbsp;</td>
				   <td align="left">&nbsp;</td>
			       <td align="left"><input type="checkbox" name="2_6" value="2_6" id="2_6" <?php if( (isset($_POST['2_6'])&&$_POST['2_6']=="2_6") || ($action=="edit"&&$per_row['2_6']=="2_6") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
		           Add Classes</td>
			       <td align="left"><input type="checkbox" name="2_7" value="2_7" id="2_7" <?php if( (isset($_POST['2_7'])&&$_POST['2_7']=="2_7") || ($action=="edit"&&$per_row['2_7']=="2_7") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
		           Edit Classes</td>
			       <td colspan="2" align="left"><input type="checkbox" name="2_8" value="2_8" id="2_8" <?php if( (isset($_POST['2_8'])&&$_POST['2_8']=="2_8") || ($action=="edit"&&$per_row['2_8']=="2_8") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
		           Delete Calsses</td>
			    </tr>
				 <tr class="even">
				   <td align="left">&nbsp;</td>
				   <td align="left">&nbsp;</td>
				   <td align="left">&nbsp;</td>
				   <td align="left">&nbsp;</td>
			       <td align="left"><input type="checkbox" name="2_9" value="2_9" id="2_9" <?php if( (isset($_POST['2_9'])&&$_POST['2_9']=="2_9") || ($action=="edit"&&$per_row['2_9']=="2_9") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
		           Add subjects</td>
			       <td align="left"><input type="checkbox" name="2_10" value="2_10" id="2_10" <?php if( (isset($_POST['2_10'])&&$_POST['2_10']=="2_10") || ($action=="edit"&&$per_row['2_10']=="2_10") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
		           Edit subjects</td>
			       <td colspan="2" align="left"><input type="checkbox" name="2_11" value="2_11" id="2_11" <?php if( (isset($_POST['2_11'])&&$_POST['2_11']=="2_11") || ($action=="edit"&&$per_row['2_11']=="2_11") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
		           Delete Subjects</td>
			    </tr>
				 <tr class="even">
				   <td align="left">&nbsp;</td>
				   <td align="left">&nbsp;</td>
				   <td align="left">&nbsp;</td>
				   <td align="left">Add Exams</td>
				   <td align="left"><input type="checkbox" name="2_12" value="2_12" id="2_12" <?php if( (isset($_POST['2_12'])&&$_POST['2_12']=="2_12") || ($action=="edit"&&$per_row['2_12']=="2_12") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
			       Add Exams</td>
			       <td align="left"><input type="checkbox" name="2_13" value="2_13" id="2_13" <?php if( (isset($_POST['2_13'])&&$_POST['2_13']=="2_13") || ($action=="edit"&&$per_row['2_13']=="2_13") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
		           Edit Exams</td>
			       <td colspan="2" align="left"><input type="checkbox" name="2_14" value="2_14" id="2_14" <?php if( (isset($_POST['2_14'])&&$_POST['2_14']=="2_14") || ($action=="edit"&&$per_row['2_14']=="2_14") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
		           Delete Exams</td>
			    </tr>
				 <tr class="even">
				   <td align="left">&nbsp;</td>
				   <td align="left">&nbsp;</td>
				   <td align="left">&nbsp;</td>
				   <td align="left">Add Fees </td>
				   <td align="left"><input type="checkbox" name="2_15" value="2_15" id="2_15" <?php if( (isset($_POST['2_15'])&&$_POST['2_15']=="2_15") || ($action=="edit"&&$per_row['2_15']=="2_15") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
			       Add Fees</td>
			       <td align="left"><input type="checkbox" name="2_20" value="2_20" id="2_20" <?php if( (isset($_POST['2_20'])&&$_POST['2_20']=="2_20") || ($action=="edit"&&$per_row['2_20']=="2_20") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> Delete Fees </td>
			       <td colspan="2" align="left">&nbsp;</td>
			    </tr>
				<?php /*?> <tr class="even">
				   <td align="left">&nbsp;</td>
				   <td align="left">&nbsp;</td>
				   <td align="left">&nbsp;</td>
				   <td align="left">Add Id Card Image</td>
				   <td align="left"><input type="checkbox" name="2_16" value="2_16" id="2_16" <?php if( (isset($_POST['2_16'])&&$_POST['2_16']=="2_16") || ($action=="edit"&&$per_row['2_16']=="2_16") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
			       Add Id Card Image</td>
			       <td align="left"><input type="checkbox" name="2_17" value="2_17" id="2_17" <?php if( (isset($_POST['2_17'])&&$_POST['2_17']=="2_17") || ($action=="edit"&&$per_row['2_17']=="2_17") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
		           Edit Id Card Image</td>
			       <td colspan="2" align="left">&nbsp;</td>
			    </tr><?php */?>
				 <tr class="even">
				   <td align="left">&nbsp;</td>
				   <td align="left">&nbsp;</td>
				   <td align="left">&nbsp;</td>
				   <td align="left">Late Fee Fine</td>
				   <td align="left"><input type="checkbox" name="2_18" value="2_18" id="2_18" <?php if( (isset($_POST['2_18'])&&$_POST['2_18']=="2_18") || ($action=="edit"&&$per_row['2_18']=="2_18") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
			       Add / Edit Fine</td>
			       <td align="left">&nbsp;</td>
			       <td colspan="2" align="left">&nbsp;</td>
			    </tr>
				 <tr class="even">
				   <td align="left">&nbsp;</td>
				   <td align="left">&nbsp;</td>
				   <td align="left">&nbsp;</td>
				   <td align="left">Fee Due Date</td>
				   <td colspan="2" align="left"><input type="checkbox" name="2_19" value="2_19" id="2_19" <?php if( (isset($_POST['2_19'])&&$_POST['2_19']=="2_19") || ($action=="edit"&&$per_row['2_19']=="2_19") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                   <script type="text/javascript"> 
			chieldcatids("2_p", "2_1@2_2@2_3@2_4@2_5@2_6@2_7@2_8@2_9@2_10@2_11@2_12@2_13@2_14@2_15@2_18@2_19@2_20");
		</script>
			       Add / Edit Last dates</td>
			       <td colspan="2" align="left">&nbsp;</td>
			    </tr>
				
				
				
				<tr><td align="left" colspan="8">&nbsp;</td></tr>              
			       <?php } if (in_array('3_p', $top_level_permissions_admin) && in_array('3_p',$admin_permissions) ){ ?>
              <tr class="even">
                <td align="left" valign="top">3</td>
                <td align="left"><input type="checkbox" name="3_p" id="3_p"value="3_p" <?php if( (isset($_POST['3_p'])&&$_POST['3_p']=="3_p") || ($action=="edit"&&$per_row['3_p']=="3_p") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> onclick='javascript:chieldcatids("3_p", "3_1@3_2@3_3@3_4@3_5");' />
                    <br />
                    <center>
                  </center></td>
                <td align="left" valign="top">Front Office </td>
                <td height="24" align="left">Enquiry Form</td>
                <td colspan="4" align="left"><input type="checkbox" name="3_1" id="3_1" value="3_1" <?php if( (isset($_POST['3_1'])&&$_POST['3_1']=="3_1") || ($action=="edit"&&$per_row['3_1']=="3_1") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
Add Enquiry Form</td>
              </tr>
              <tr class="even">
                <td align="left" valign="top">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left" valign="top">&nbsp;</td>
                <td align="left">Enquiry List </td>
                <td width="21%" align="left"><input type="checkbox" name="3_2" id="3_2"value="3_2" <?php if( (isset($_POST['3_2'])&&$_POST['3_2']=="3_2") || ($action=="edit"&&$per_row['3_2']=="3_2") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
Registration</td>
                <td align="left"><input type="checkbox" name="3_3" id="3_3"value="3_3" <?php if( (isset($_POST['3_3'])&&$_POST['3_3']=="3_3") || ($action=="edit"&&$per_row['3_3']=="3_3") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                Entrance Test</td>
                <td align="left"><input type="checkbox" name="3_5" id="3_5"value="3_5" <?php if( (isset($_POST['3_5'])&&$_POST['3_5']=="3_5") || ($action=="edit"&&$per_row['3_5']=="3_5") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> Print</td>
                <td align="left">&nbsp;</td>
              </tr>
			  <tr class="even">
                <td align="left" valign="top">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left" valign="top">&nbsp;</td>
                <td align="left">Admitted Students
                  </td>
                <td width="21%" align="left"><input type="checkbox" name="3_4" id="3_4"value="3_4" <?php if( (isset($_POST['3_4'])&&$_POST['3_4']=="3_4") || ($action=="edit"&&$per_row['3_4']=="3_4") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                   Students List				  </td>
                <td colspan="3" align="left">&nbsp;</td>
              </tr>
			<?php /*?>  <tr class="even">
                <td align="left" valign="top">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left" valign="top">&nbsp;</td>
                <td align="left">Admitted Students [Enquiry]
                  <script type="text/javascript"> 
			      </script></td>
                <td width="21%" align="left"><input type="checkbox" name="3_7" id="3_7"value="3_7" <?php if( (isset($_POST['3_7'])&&$_POST['3_7']=="3_7") || ($action=="edit"&&$per_row['3_7']=="3_7") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Admitted Students [Enquiry]
				 </td>
                <td colspan="3" align="left">&nbsp;</td>
              </tr>	  <?php */?>
			  
			  
			  <tr><td align="left" colspan="8">&nbsp;</td></tr>              
				     <?php } if (in_array('4_p', $top_level_permissions_admin)  && in_array('4_p',$admin_permissions)  ){ ?>
              <tr class="even">
                <td align="left">4</td>
                <td align="left"><input type="checkbox" name="4_p" id="4_p" value="4_p" <?php if( (isset($_POST['4_p'])&&$_POST['4_p']=="4_p") || ($action=="edit"&&$per_row['4_p']=="4_p") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /></td>
                <td align="left">Pre Admission</td>
                <td align="left">&nbsp;</td>
                <td colspan="4" align="left">&nbsp;</td>
              </tr>
			  
			  
              <tr><td align="left" colspan="8">&nbsp;</td></tr>
				     <?php } if (in_array('5_p', $top_level_permissions_admin) && in_array('5_p',$admin_permissions) ){ ?>
              <tr class="even">
                <td align="left" valign="top">5</td>
                <td align="left"><input type="checkbox" name="5_p" id="5_p" value="5_p" <?php if( (isset($_POST['5_p'])&&$_POST['5_p']=="5_p") || ($action=="edit"&&$per_row['5_p']=="5_p") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> onclick='javascript:chieldcatids("5_p", "5_1@5_2@5_3@5_5@5_6");' />                </td>
                <td align="left" valign="top">Student</td>
                <td align="left">Search Student Record</td>
                <td align="left"><input type="checkbox" name="5_1" id="5_1"value="5_1" <?php if( (isset($_POST['5_1'])&&$_POST['5_1']=="5_1") || ($action=="edit"&&$per_row['5_1']=="5_1") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
Edit Student Record</td>
                <td align="left"><input type="checkbox" name="5_3" id="5_3"value="5_3" <?php if( (isset($_POST['5_3'])&&$_POST['5_3']=="5_3") || ($action=="edit"&&$per_row['5_3']=="5_3") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />Print</td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
              <tr class="even">
                <td align="left" valign="top">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left" valign="top">&nbsp;</td>
                <td align="left">Update Class Record</td>
                <td colspan="4" align="left"><input type="checkbox" name="5_2" value="5_2" id="5_2" <?php if( (isset($_POST['5_2'])&&$_POST['5_2']=="5_2") || ($action=="edit"&&$per_row['5_2']=="5_2") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
               
                  Promoting Student </td>
              </tr>
			  
			   <tr class="even">
                <td align="left" valign="top">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left" valign="top">&nbsp;</td>
                <td align="left">Student Transfer</td>
                <td colspan="4" align="left"><input type="checkbox" name="5_5" value="5_5" id="5_5" <?php if( (isset($_POST['5_5'])&&$_POST['5_5']=="5_5") || ($action=="edit"&&$per_row['5_5']=="5_5") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                </td>
              </tr>
			  
			  
			   <tr class="even">
                <td align="left" valign="top">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left" valign="top">&nbsp;</td>
                <td align="left">Character Certificate</td>
                <td colspan="4" align="left"><input type="checkbox" name="5_6" value="5_6" id="5_6" <?php if( (isset($_POST['5_6'])&&$_POST['5_6']=="5_6") || ($action=="edit"&&$per_row['5_6']=="5_6") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                <script type="text/javascript"> 
			chieldcatids("5_p", "5_1@5_2@5_3@5_5@5_6");
		</script> </td>
              </tr>
			  
			  
			  <tr><td align="left" colspan="8">&nbsp;</td></tr>              
				     <?php } if (in_array('6_p', $top_level_permissions_admin) && in_array('6_p',$admin_permissions) ){ ?>
            
              <tr class="even">
                <td align="left">6</td>
                <td align="left"><input type="checkbox" name="6_p" id="6_p" value="6_p" <?php if( (isset($_POST['6_p'])&&$_POST['6_p']=="6_p") || ($action=="edit"&&$per_row['6_p']=="6_p") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> onclick='javascript:chieldcatids("6_p");' /></td>
                <td align="left">Fee Payment </td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
            <?php /*?>  <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Pay Fee</td>
                <td align="left"><input type="checkbox" name="6_3" value="6_3" id="6_3" <?php if( (isset($_POST['6_3'])&&$_POST['6_3']=="6_3") || ($action=="edit"&&$per_row['6_3']=="6_3") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Collecting fee</td>
                <td align="left"><input type="checkbox" name="6_6" id="6_6"value="6_6" <?php if( (isset($_POST['6_6'])&&$_POST['6_6']=="6_6") || ($action=="edit"&&$per_row['6_6']=="6_6") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> Print complete fee details</td>
                <td colspan="2" align="left"><input type="checkbox" name="6_7" id="6_7"value="6_7" <?php if( (isset($_POST['6_7'])&&$_POST['6_7']=="6_7") || ($action=="edit"&&$per_row['6_7']=="6_7") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> Print receipt</td>
              </tr>
              <?php /*?><tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Add Other Fine</td>
                <td colspan="4" align="left"><input type="checkbox" name="6_4" value="6_4" id="6_4" <?php if( (isset($_POST['6_4'])&&$_POST['6_4']=="6_4") || ($action=="edit"&&$per_row['6_4']=="6_4") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Add Other fine to students</td>
                </tr>
              <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Pay Fine</td>
                <td align="left"><input type="checkbox" name="6_5" value="6_5" id="6_5" <?php if( (isset($_POST['6_5'])&&$_POST['6_5']=="6_5") || ($action=="edit"&&$per_row['6_5']=="6_5") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                Pay Fine</td>
                <td align="left">&nbsp;</td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr><?php ?> 
			  <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Paid Fee List</td>
                <td align="left"><input type="checkbox" name="6_8" value="6_8" id="6_8" <?php if( (isset($_POST['6_8'])&&$_POST['6_8']=="6_8") || ($action=="edit"&&$per_row['6_8']=="6_8") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                Print</td>
                <td align="left">&nbsp;</td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
			  <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Paid Fee [Category]</td>
                <td align="left"><input type="checkbox" name="6_9" value="6_9" id="6_9" <?php if( (isset($_POST['6_9'])&&$_POST['6_9']=="6_9") || ($action=="edit"&&$per_row['6_9']=="6_9") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                Print</td>
                <td align="left">&nbsp;</td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
			  <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Paid Fee [Class wise]</td>
                <td align="left"><input type="checkbox" name="6_10" value="6_10" id="6_10" <?php if( (isset($_POST['6_10'])&&$_POST['6_10']=="6_10") || ($action=="edit"&&$per_row['6_10']=="6_10") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                Print</td>
                <td align="left">&nbsp;</td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
			  <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Category Wise Details</td>
                <td align="left"><input type="checkbox" name="6_11" value="6_11" id="6_11" <?php if( (isset($_POST['6_11'])&&$_POST['6_11']=="6_11") || ($action=="edit"&&$per_row['6_11']=="6_11") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                Print</td>
                <td align="left">&nbsp;</td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
			  <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Outstanding Fees </td>
                <td align="left"><input type="checkbox" name="6_12" value="6_12" id="6_12" <?php if( (isset($_POST['6_12'])&&$_POST['6_12']=="6_12") || ($action=="edit"&&$per_row['6_12']=="6_12") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                Print</td>
                <td align="left">&nbsp;</td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
			  <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Installment Fines</td>
                <td align="left"><input type="checkbox" name="6_13" value="6_13" id="6_13" <?php if( (isset($_POST['6_13'])&&$_POST['6_13']=="6_13") || ($action=="edit"&&$per_row['6_13']=="6_13") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                Print</td>
                <td align="left">&nbsp;</td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
			  <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Add Misc. Fine</td>
                <td align="left"><input type="checkbox" name="6_14" value="6_14" id="6_14" <?php if( (isset($_POST['6_14'])&&$_POST['6_14']=="6_14") || ($action=="edit"&&$per_row['6_14']=="6_14") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                Add </td>
                <td align="left">&nbsp;</td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
			  
			    <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Exam Fee Collection</td>
                <td align="left"><input type="checkbox" name="6_20" value="6_20" id="6_20" <?php if( (isset($_POST['6_20'])&&$_POST['6_20']=="6_20") || ($action=="edit"&&$per_row['6_20']=="6_20") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                 </td>
                <td align="left">&nbsp;</td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr><strong></strong>
			  <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">View Misc. Fine</td>
                <td align="left"><input type="checkbox" name="6_15" value="6_15" id="6_15" <?php if( (isset($_POST['6_15'])&&$_POST['6_15']=="6_15") || ($action=="edit"&&$per_row['6_15']=="6_15") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                View</td>
                <td align="left"><input type="checkbox" name="6_16" value="6_16" id="6_16" <?php if( (isset($_POST['6_16'])&&$_POST['6_16']=="6_16") || ($action=="edit"&&$per_row['6_16']=="6_16") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> List Print 
				<script type="text/javascript"> 
			chieldcatids("6_p", "6_1@6_2@6_3@6_6@6_7@6_8@6_9@6_10@6_11@6_12@6_13@6_14@6_15@6_16@6_20");
		</script></td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr><?php */?>
			  <tr><td align="left" colspan="8">&nbsp;</td></tr>
			            
				     <?php } if (in_array('7_p', $top_level_permissions_admin) && in_array('7_p',$admin_permissions) ){ ?>
              <tr class="even">
                <td align="left">7</td>
                <td align="left"><input type="checkbox" name="7_p" id="7_p" value="7_p" <?php if( (isset($_POST['7_p'])&&$_POST['7_p']=="7_p") || ($action=="edit"&&$per_row['7_p']=="7_p") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> onclick='javascript:chieldcatids("7_p", "7_1@7_2@7_3@7_4@7_5");' /></td>
                <td align="left">Assignment</td>
                <td align="left">Add Assignment</td>
                <td align="left"><input type="checkbox" name="7_1" value="7_1" id="7_1" <?php if( (isset($_POST['7_1'])&&$_POST['7_1']=="7_1") || ($action=="edit"&&$per_row['7_1']=="7_1") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Add Assignment</td>
                <td align="left">&nbsp;</td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
              <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">View Assignment</td>
                <td align="left"><input type="checkbox" name="7_2" value="7_2" id="7_2" <?php if( (isset($_POST['7_2'])&&$_POST['7_2']=="7_2") || ($action=="edit"&&$per_row['7_2']=="7_2") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Edit Assignment</td>
                <td align="left"><input type="checkbox" name="7_3" value="7_3" id="7_3" <?php if( (isset($_POST['7_3'])&&$_POST['7_3']=="7_3") || ($action=="edit"&&$per_row['7_3']=="7_3") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                
                  Delete Assignment</td>
                <td colspan="2" align="left"><input type="checkbox" name="7_4" value="7_4" id="7_4" <?php if( (isset($_POST['7_4'])&&$_POST['7_4']=="7_4") || ($action=="edit"&&$per_row['7_4']=="7_4") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> View Assignment</td>
              </tr>
			  <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left"></td>
                <td align="left"><input type="checkbox" name="7_5" value="7_5" id="7_5" <?php if( (isset($_POST['7_5'])&&$_POST['7_5']=="7_5") || ($action=="edit"&&$per_row['7_5']=="7_5") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Print</td>
                <td align="left">
                <script type="text/javascript"> 
			chieldcatids("7_p", "7_1@7_2@7_3@7_4@7_5");
		</script>
                 </td>
                <td colspan="2" align="left"></td>
              </tr>
			  <tr><td align="left" colspan="8">&nbsp;</td></tr>            
				     <?php }if (in_array('8_p', $top_level_permissions_admin) && in_array('8_p',$admin_permissions) ){ ?>
				
				<tr class="even">
                <td align="left">8</td>
                <td align="left"><input type="checkbox" name="8_p" id="8_p" value="8_p" <?php if( (isset($_POST['8_p'])&&$_POST['8_p']=="8_p") || ($action=="edit"&&$per_row['8_p']=="8_p") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> onclick='javascript:chieldcatids("8_p", "8_1@8_2@8_3@8_4@8_5@8_6@8_7@8_8@8_9@8_10@8_11@8_12@8_13@8_14@8_15@8_16@8_17@8_18@8_19@8_101@8_102@8_103@8_104@8_105@8_106@8_107@8_108");' /></td>
                <td align="left">Tutorials</td>
                <td align="left">Add Units</td>
				<td align="left"><input type="checkbox" name="8_1" value="8_1" id="8_1" <?php if( (isset($_POST['8_1'])&&$_POST['8_1']=="8_1") || ($action=="edit"&&$per_row['8_1']=="8_1") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
				  Add Units</td>
				<td align="left"><input type="checkbox" name="8_2" value="8_2" id="8_2" <?php if( (isset($_POST['8_2'])&&$_POST['8_2']=="8_2") || ($action=="edit"&&$per_row['8_2']=="8_2") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
				  Edit Units</td>
				<td  align="left"><input type="checkbox" name="8_3" value="8_3" id="8_3" <?php if( (isset($_POST['8_3'])&&$_POST['8_3']=="8_3") || ($action=="edit"&&$per_row['8_3']=="8_3") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
				  Delete </td>
				  <td  align="left"><input type="checkbox" name="8_101" value="8_101" id="8_101" <?php if( (isset($_POST['8_101'])&&$_POST['8_101']=="8_101") || ($action=="edit"&&$per_row['8_101']=="8_101") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
				  Print </td>
				</tr>
				<tr class="even">
				  <td align="left">&nbsp;</td>
				  <td align="left">&nbsp;</td>
				  <td align="left">&nbsp;</td>
				  <td align="left">Add Chapter</td>
				  <td align="left"><input type="checkbox" name="8_4" value="8_4" id="8_4" <?php if( (isset($_POST['8_4'])&&$_POST['8_4']=="8_4") || ($action=="edit"&&$per_row['8_4']=="8_4") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
			      Add Chapter</td>
				  <td align="left"><input type="checkbox" name="8_5" value="8_5" id="8_5" <?php if( (isset($_POST['8_5'])&&$_POST['8_5']=="8_5") || ($action=="edit"&&$per_row['8_5']=="8_5") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
			      Edit Chapter</td>
				  <td align="left"><input type="checkbox" name="8_6" value="8_6" id="8_6" <?php if( (isset($_POST['8_6'])&&$_POST['8_6']=="8_6") || ($action=="edit"&&$per_row['8_6']=="8_6") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
			      Delete </td>
			      <td align="left"><input type="checkbox" name="8_16" value="8_16" id="8_16" <?php if( (isset($_POST['8_16'])&&$_POST['8_16']=="8_16") || ($action=="edit"&&$per_row['8_16']=="8_16") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> 
			        Add copy</td>
				</tr>
				<tr class="even">
				  <td align="left">&nbsp;</td>
				  <td align="left">&nbsp;</td>
				  <td align="left">&nbsp;</td>
				  <td align="left">&nbsp;</td>
				  <td align="left"><input type="checkbox" name="8_102" value="8_102" id="8_102" <?php if( (isset($_POST['8_102'])&&$_POST['8_102']=="8_102") || ($action=="edit"&&$per_row['8_102']=="8_102") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
			      Print</td>
				  <td align="left">&nbsp;</td>
				  <td align="left">&nbsp;</td>
				  <td align="left">&nbsp;</td>
				</tr>
				<tr class="even">
				  <td align="left">&nbsp;</td>
				  <td align="left">&nbsp;</td>
				  <td align="left">&nbsp;</td>
				  <td align="left">Add Tutorial</td>
				  <td align="left"><input type="checkbox" name="8_7" value="8_7" id="8_7" <?php if( (isset($_POST['8_7'])&&$_POST['8_7']=="8_7") || ($action=="edit"&&$per_row['8_7']=="8_7") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
			      Add Tutorial</td>
				  <td align="left"><input type="checkbox" name="8_8" value="8_8" id="8_8" <?php if( (isset($_POST['8_8'])&&$_POST['8_8']=="8_8") || ($action=="edit"&&$per_row['8_8']=="8_8") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
			      Edit Tutorial</td>
				  <td width="11%" align="left"><input type="checkbox" name="8_9" value="8_9" id="8_9" <?php if( (isset($_POST['8_9'])&&$_POST['8_9']=="8_9") || ($action=="edit"&&$per_row['8_9']=="8_9") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
			      Delete </td>
			      <td width="8%" align="left"><input type="checkbox" name="8_17" value="8_17" id="8_17" <?php if( (isset($_POST['8_17'])&&$_POST['8_17']=="8_17") || ($action=="edit"&&$per_row['8_17']=="8_17") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> View</td>
				</tr>
				<tr class="even">
				  <td align="left">&nbsp;</td>
				  <td align="left">&nbsp;</td>
				  <td align="left">&nbsp;</td>
				  <td align="left">&nbsp;</td>
				  <td align="left"><input type="checkbox" name="8_103" value="8_103" id="8_103" <?php if( (isset($_POST['8_103'])&&$_POST['8_103']=="8_103") || ($action=="edit"&&$per_row['8_103']=="8_103") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
			      Print List</td>
				  <td align="left"><input type="checkbox" name="8_104" value="8_104" id="8_104" <?php if( (isset($_POST['8_104'])&&$_POST['8_104']=="8_104") || ($action=="edit"&&$per_row['8_104']=="8_104") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
			      Print Individual</td>
				  <td align="left">&nbsp;</td>
				  <td align="left">&nbsp;</td>
				</tr>
				<tr class="even">
				  <td align="left">&nbsp;</td>
				  <td align="left">&nbsp;</td>
				  <td align="left">&nbsp;</td>
				  <td align="left">Add Booklet</td>
				  <td align="left"><input type="checkbox" name="8_10" value="8_10" id="8_10" <?php if( (isset($_POST['8_10'])&&$_POST['8_10']=="8_10") || ($action=="edit"&&$per_row['8_10']=="8_10") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
			      Add Booklet</td>
				  <td align="left"><input type="checkbox" name="8_11" value="8_11" id="8_11" <?php if( (isset($_POST['8_11'])&&$_POST['8_11']=="8_11") || ($action=="edit"&&$per_row['8_11']=="8_11") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
			      Edit Booklet</td>
				  <td align="left"><input type="checkbox" name="8_12" value="8_12" id="8_12" <?php if( (isset($_POST['8_12'])&&$_POST['8_12']=="8_12") || ($action=="edit"&&$per_row['8_12']=="8_12") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
			      Delete </td>
			      <td align="left"><input type="checkbox" name="8_18" value="8_18" id="8_18" <?php if( (isset($_POST['8_18'])&&$_POST['8_18']=="8_18") || ($action=="edit"&&$per_row['8_18']=="8_18") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> View</td>
				</tr>
				<tr class="even">
				  <td align="left">&nbsp;</td>
				  <td align="left">&nbsp;</td>
				  <td align="left">&nbsp;</td>
				  <td align="left">&nbsp;</td>
				  <td align="left"><input type="checkbox" name="8_105" value="8_105" id="8_105" <?php if( (isset($_POST['8_105'])&&$_POST['8_105']=="8_105") || ($action=="edit"&&$per_row['8_105']=="8_105") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
			      Print List</td>
				  <td align="left"><input type="checkbox" name="8_106" value="8_106" id="8_106" <?php if( (isset($_POST['8_106'])&&$_POST['8_106']=="8_106") || ($action=="edit"&&$per_row['8_106']=="8_106") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
			      Print Individual</td>
				  <td align="left">&nbsp;</td>
				  <td align="left">&nbsp;</td>
				</tr>
				<tr class="even">
				  <td align="left">&nbsp;</td>
				  <td align="left">&nbsp;</td>
				  <td align="left">&nbsp;</td>
				  <td align="left">Question Bank</td>
				  <td align="left"><input type="checkbox" name="8_13" value="8_13" id="8_13" <?php if( (isset($_POST['8_13'])&&$_POST['8_13']=="8_13") || ($action=="edit"&&$per_row['8_13']=="8_13") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
			      Add Bank</td>
				  <td align="left"><input type="checkbox" name="8_14" value="8_14" id="8_14" <?php if( (isset($_POST['8_14'])&&$_POST['8_14']=="8_14") || ($action=="edit"&&$per_row['8_14']=="8_14") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
			      Edit Bank</td>
				  <td align="left"><input type="checkbox" name="8_15" value="8_15" id="8_15" <?php if( (isset($_POST['8_15'])&&$_POST['8_15']=="8_15") || ($action=="edit"&&$per_row['8_15']=="8_15") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Delete</td>
			      <td align="left"><input type="checkbox" name="8_19" value="8_19" id="8_19" <?php if( (isset($_POST['8_19'])&&$_POST['8_19']=="8_19") || ($action=="edit"&&$per_row['8_19']=="8_19") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />View
				  </td>
				</tr>
				<tr class="even">
				  <td align="left">&nbsp;</td>
				  <td align="left">&nbsp;</td>
				  <td align="left">&nbsp;</td>
				  <td align="left">&nbsp;</td>
				  <td align="left"><input type="checkbox" name="8_107" value="8_107" id="8_107" <?php if( (isset($_POST['8_107'])&&$_POST['8_107']=="8_107") || ($action=="edit"&&$per_row['8_107']=="8_107") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
			      Print List</td>
				  <td align="left"><input type="checkbox" name="8_108" value="8_108" id="8_108" <?php if( (isset($_POST['8_108'])&&$_POST['8_108']=="8_108") || ($action=="edit"&&$per_row['8_108']=="8_108") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
			      Print Individual</td>
				  <td align="left">&nbsp;</td>
				  <td align="left">&nbsp;<script type="text/javascript"> 
			chieldcatids("8_p", "8_1@8_2@8_3@8_4@8_5@8_6@8_7@8_8@8_9@8_10@8_11@8_12@8_13@8_14@8_15@8_16@8_17@8_18@8_19@8_101@8_102@8_103@8_104@8_105@8_106@8_107@8_108");
		</script></td>
				</tr>
				<tr><td align="left" colspan="8">&nbsp;</td></tr>             
				     <?php } if (in_array('9_p', $top_level_permissions_admin) && in_array('9_p',$admin_permissions) ){ ?>
				<tr class="even">
                <td align="left">9</td>
                <td align="left"><input type="checkbox" name="9_p" id="9_p" value="9_p" <?php if( (isset($_POST['9_p'])&&$_POST['9_p']=="9_p") || ($action=="edit"&&$per_row['9_p']=="9_p") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> onclick='javascript:chieldcatids("9_p", "9_1@9_2@9_3@9_4@9_5@9_6@9_7@9_8@9_11@9_13@9_14@9_15@9_16@9_17@9_18@9_19@9_20@9_21@9_22@9_23@9_24@9_25@9_27@9_29@9_30@9_31@9_32@9_33@9_101@9_102@9_103");' /></td>

                <td align="left">HRD</td>
                <td align="left">Post Vacancy</td>
				<td align="left"><input type="checkbox" name="9_1" value="9_1" id="9_1" <?php if( (isset($_POST['9_1'])&&$_POST['9_1']=="9_1") || ($action=="edit"&&$per_row['9_1']=="9_1") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
				  Add Vacancy</td>
				<td align="left"><input type="checkbox" name="9_17" value="9_17" id="9_17" <?php if( (isset($_POST['9_17'])&&$_POST['9_17']=="9_17") || ($action=="edit"&&$per_row['9_17']=="9_17") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> Edit </td>
				<td align="left"><input type="checkbox" name="9_18" value="9_18" id="9_18" <?php if( (isset($_POST['9_18'])&&$_POST['9_18']=="9_18") || ($action=="edit"&&$per_row['9_18']=="9_18") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> 
				  Delete </td>
				<td align="left"> <input type="checkbox" name="9_19" value="9_19" id="9_19" <?php if( (isset($_POST['9_19'])&&$_POST['9_19']=="9_19") || ($action=="edit"&&$per_row['9_19']=="9_19") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
View</td>
				</tr>
				<tr class="even">
				  <td align="left">&nbsp;</td>
				  <td align="left">&nbsp;</td>
				  <td align="left">&nbsp;</td>
				  <td align="left">Classifieds</td>
				  <td align="left"><input type="checkbox" name="9_2" value="9_2" id="9_2" <?php if( (isset($_POST['9_2'])&&$_POST['9_2']=="9_2") || ($action=="edit"&&$per_row['9_2']=="9_2") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
			      Add Classified</td>
			      <td align="left"><input type="checkbox" name="9_20" value="9_20" id="9_20" <?php if( (isset($_POST['9_20'])&&$_POST['9_20']=="9_20") || ($action=="edit"&&$per_row['9_20']=="9_20") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> 
		          Edit </td>
			      <td align="left"><input type="checkbox" name="9_21" value="9_21" id="9_21" <?php if( (isset($_POST['9_21'])&&$_POST['9_21']=="9_21") || ($action=="edit"&&$per_row['9_21']=="9_21") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> 
		          Delete </td>
			      <td align="left"><input type="checkbox" name="9_22" value="9_22" id="9_22" <?php if( (isset($_POST['9_22'])&&$_POST['9_22']=="9_22") || ($action=="edit"&&$per_row['9_22']=="9_22") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> 
		          View</td>
				</tr>
				<tr class="even">
				  <td align="left">&nbsp;</td>
				  <td align="left">&nbsp;</td>
				  <td align="left">&nbsp;</td>
				  <td align="left">Applicant Enquiry</td>
				  <td colspan="4" align="left"><input type="checkbox" name="9_3" value="9_3" id="9_3" <?php if( (isset($_POST['9_3'])&&$_POST['9_3']=="9_3") || ($action=="edit"&&$per_row['9_3']=="9_3") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
			      Add Applicant Enquiry</td>
			    </tr>
				<tr class="even">
				  <td align="left">&nbsp;</td>
				  <td align="left">&nbsp;</td>
				  <td align="left">&nbsp;</td>
				  <td align="left">Search Applicants</td>
				  <td align="left"><input type="checkbox" name="9_4" value="9_4" id="9_4" <?php if( (isset($_POST['9_4'])&&$_POST['9_4']=="9_4") || ($action=="edit"&&$per_row['9_4']=="9_4") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
			      Send Emailnotification</td>
				  <td align="left"><input type="checkbox" name="9_5" value="9_5" id="9_5" <?php if( (isset($_POST['9_5'])&&$_POST['9_5']=="9_5") || ($action=="edit"&&$per_row['9_5']=="9_5") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
			      Edit Applicant</td>
				  <td colspan="2" align="left"><input type="checkbox" name="9_6" value="9_6" id="9_6" <?php if( (isset($_POST['9_6'])&&$_POST['9_6']=="9_6") || ($action=="edit"&&$per_row['9_6']=="9_6") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
			      Delete Applicant</td>
			    </tr>
				<tr class="even">
				  <td align="left">&nbsp;</td>
				  <td align="left">&nbsp;</td>
				  <td align="left">&nbsp;</td>
				  <td align="left"></td>
				  <td align="left"><input type="checkbox" name="9_101" value="9_101" id="9_101" <?php if( (isset($_POST['9_101'])&&$_POST['9_101']=="9_101") || ($action=="edit"&&$per_row['9_101']=="9_101") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
			      Print</td>
				  <td align="left"></td>
				  <td colspan="2" align="left"></td>
			    </tr>
				<tr class="even">
				  <td align="left">&nbsp;</td>
				  <td align="left">&nbsp;</td>
				  <td align="left">&nbsp;</td>
				  <td align="left">Take Interview</td>
				  <td colspan="2" align="left"><input type="checkbox" name="9_7" value="9_7" id="9_7" <?php if( (isset($_POST['9_7'])&&$_POST['9_7']=="9_7") || ($action=="edit"&&$per_row['9_7']=="9_7") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
			      Select/notselected/onhold</td>
				  <td colspan="2" align="left"><input type="checkbox" name="9_102" value="9_102" id="9_102" <?php if( (isset($_POST['9_102'])&&$_POST['9_102']=="9_102") || ($action=="edit"&&$per_row['9_102']=="9_102") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
			      Print</td>
			    </tr>
				<tr class="even">
				  <td align="left">&nbsp;</td>
				  <td align="left">&nbsp;</td>
				  <td align="left">&nbsp;</td>
				  <td align="left">Applicants</td>
				  <td colspan="3" align="left"><input type="checkbox" name="9_8" value="9_8" id="9_8" <?php if( (isset($_POST['9_8'])&&$_POST['9_8']=="9_8") || ($action=="edit"&&$per_row['9_8']=="9_8") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
			      List	if selected in Take Interview then add to staff</td>
				  <td  align="left"><input type="checkbox" name="9_103" value="9_103" id="9_103" <?php if( (isset($_POST['9_103'])&&$_POST['9_103']=="9_103") || ($action=="edit"&&$per_row['9_103']=="9_103") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
			      Print</td>
			    </tr>
				<tr class="even">
				  <td align="left">&nbsp;</td>
				  <td align="left">&nbsp;</td>
				  <td align="left">&nbsp;</td>
				  <td align="left">Generate Offerletter</td>
				  <td align="left"><input type="checkbox" name="9_24" value="9_24" id="9_24" <?php if( (isset($_POST['9_24'])&&$_POST['9_24']=="9_24") || ($action=="edit"&&$per_row['9_24']=="9_24") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> Accepted</td>
			      <td align="left"><input type="checkbox" name="9_25" value="9_25" id="9_25" <?php if( (isset($_POST['9_25'])&&$_POST['9_25']=="9_25") || ($action=="edit"&&$per_row['9_25']=="9_25") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> 
		          Not Accepted</td>
			      <td align="left"><input type="checkbox" name="9_33" value="9_33" id="9_33" <?php if( (isset($_POST['9_33'])&&$_POST['9_33']=="9_33") || ($action=="edit"&&$per_row['9_33']=="9_33") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> Print</td>
			      <td align="left"><input type="checkbox" name="9_23" value="9_23" id="9_23" <?php if( (isset($_POST['9_23'])&&$_POST['9_23']=="9_23") || ($action=="edit"&&$per_row['9_23']=="9_23") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> Email</td>
				</tr>
				
				<tr class="even">
				  <td align="left">&nbsp;</td>
				  <td align="left">&nbsp;</td>
				  <td align="left">&nbsp;</td>
				  <td align="left">Letter Formats </td>
				  <td colspan="4" align="left"><input type="checkbox" name="9_11" value="9_11" id="9_11" <?php if( (isset($_POST['9_11'])&&$_POST['9_11']=="9_11") || ($action=="edit"&&$per_row['9_11']=="9_11") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
			      Edit pre defined letter formats</td>
			    </tr>
				<?php /*?><tr class="even">
				  <td align="left">&nbsp;</td>
				  <td align="left">&nbsp;</td>
				  <td align="left">&nbsp;</td>
				  <td align="left">Student Transfer</td>
				  <td colspan="2" align="left"><input type="checkbox" name="9_12" value="9_12" id="9_12" <?php if( (isset($_POST['9_12'])&&$_POST['9_12']=="9_12") || ($action=="edit"&&$per_row['9_12']=="9_12") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
			      take print of transferred student</td>
			      <td align="left"><input type="checkbox" name="9_26" value="9_26" id="9_26" <?php if( (isset($_POST['9_26'])&&$_POST['9_26']=="9_26") || ($action=="edit"&&$per_row['9_26']=="9_26") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> 
		          Print</td>
			      <td align="left">&nbsp;</td>
				</tr><?php */?>
				<tr class="even">
				  <td align="left">&nbsp;</td>
				  <td align="left">&nbsp;</td>
				  <td align="left">&nbsp;</td>
				  <td align="left">Resignation/Termination</td>
				  <td colspan="2" align="left"><input type="checkbox" name="9_13" value="9_13" id="9_13" <?php if( (isset($_POST['9_13'])&&$_POST['9_13']=="9_13") || ($action=="edit"&&$per_row['9_13']=="9_13") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
			      if take print of termination letter automatically staff will be terminated</td>
			      <td align="left"><input type="checkbox" name="9_27" value="9_27" id="9_27" <?php if( (isset($_POST['9_27'])&&$_POST['9_27']=="9_27") || ($action=="edit"&&$per_row['9_27']=="9_27") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> 
		          Print</td>
			      <td align="left">&nbsp;</td>
				</tr>
				<tr class="even">
				  <td align="left">&nbsp;</td>
				  <td align="left">&nbsp;</td>
				  <td align="left">&nbsp;</td>
				  <td align="left">Other letter Formats</td>
				  <td align="left"><input type="checkbox" name="9_14" value="9_14" id="9_14" <?php if( (isset($_POST['9_14'])&&$_POST['9_14']=="9_14") || ($action=="edit"&&$per_row['9_14']=="9_14") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
			      Create new letter formats</td>
			      <td align="left"><input type="checkbox" name="9_29" value="9_29" id="9_29" <?php if( (isset($_POST['9_29'])&&$_POST['9_29']=="9_29") || ($action=="edit"&&$per_row['9_29']=="9_29") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> 
		          Add </td>
			      <td align="left"><input type="checkbox" name="9_30" value="9_30" id="9_30" <?php if( (isset($_POST['9_30'])&&$_POST['9_30']=="9_30") || ($action=="edit"&&$per_row['9_30']=="9_30") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> 
		          Edit </td>
			      <td align="left"><input type="checkbox" name="9_31" value="9_31" id="9_31" <?php if( (isset($_POST['9_31'])&&$_POST['9_31']=="9_31") || ($action=="edit"&&$per_row['9_31']=="9_31") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> 
		          Delete</td>
				</tr>
				<tr class="even">
				  <td align="left">&nbsp;</td>
				  <td align="left">&nbsp;</td>
				  <td align="left">&nbsp;</td>
				  <td align="left">Send Formats</td>
				  <td colspan="4" align="left"><input type="checkbox" name="9_15" value="9_15" id="9_15" <?php if( (isset($_POST['9_15'])&&$_POST['9_15']=="9_15") || ($action=="edit"&&$per_row['9_15']=="9_15") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
			      Send new letterformats to staff via email</td>
			    </tr>
				<tr class="even">
				  <td align="left">&nbsp;</td>
				  <td align="left">&nbsp;</td>
				  <td align="left">&nbsp;</td>
				  <td align="left">Print Formats</td>
				  <td colspan="2" align="left"><input type="checkbox" name="9_16" value="9_16" id="9_16" <?php if( (isset($_POST['9_16'])&&$_POST['9_16']=="9_16") || ($action=="edit"&&$per_row['9_16']=="9_16") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Staff wise take print of new letter formats</td>
			      <td align="left"><input type="checkbox" name="9_32" value="9_32" id="9_32" <?php if( (isset($_POST['9_32'])&&$_POST['9_32']=="9_32") || ($action=="edit"&&$per_row['9_32']=="9_32") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> 
			      Print
				  </td>
			      <td align="left">&nbsp;</td>
				</tr>
				<tr><td align="left" colspan="8">&nbsp;</td></tr>
				<script type="text/javascript"> 
			chieldcatids("9_p", "9_1@9_2@9_3@9_4@9_5@9_6@9_7@9_8@9_11@9_13@9_14@9_15@9_16@9_17@9_18@9_19@9_20@9_21@9_22@9_23@9_24@9_25@9_27@9_29@9_30@9_31@9_32@9_33@9_101@9_102@9_103");
		</script>              
				     <?php } if (in_array('10_p', $top_level_permissions_admin) && in_array('10_p',$admin_permissions) ){ ?>
              <tr class="even">
                <td align="left" valign="top">10</td>
                <td align="left"><input type="checkbox" name="10_p" id="10_p" value="10_p" <?php if( (isset($_POST['10_p'])&&$_POST['10_p']=="10_p") || ($action=="edit"&&$per_row['10_p']=="10_p") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> onclick='javascript:chieldcatids("10_p", "10_1@10_2@10_3@10_4@10_5@10_6@10_7@10_8@10_9@10_10@10_11@10_12");' />
                    <br />
                    <center>
                  </center></td>
                <td align="left" valign="top">Staff</td>
                <td align="left">Add Department</td>
                <td align="left"><input type="checkbox" name="10_1" value="10_1" id="10_1" <?php if( (isset($_POST['10_1'])&&$_POST['10_1']=="10_1") || ($action=="edit"&&$per_row['10_1']=="10_1") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Add Department</td>
                <td align="left"><input type="checkbox" name="10_2" value="10_2" id="10_2" <?php if( (isset($_POST['10_2'])&&$_POST['10_2']=="10_2") || ($action=="edit"&&$per_row['10_2']=="10_2") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Edit Department</td>
                <td colspan="2" align="left"><input type="checkbox" name="10_3" value="10_3" id="10_3" <?php if( (isset($_POST['10_3'])&&$_POST['10_3']=="10_3") || ($action=="edit"&&$per_row['10_3']=="10_3") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Delete Department</td>
              </tr>
              <tr class="even">
                <td align="left" valign="top">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left" valign="top">&nbsp;</td>
                <td align="left">Add Post</td>
                <td align="left"><input type="checkbox" name="10_4" id="10_4"value="10_4" <?php if( (isset($_POST['10_4'])&&$_POST['10_4']=="10_4") || ($action=="edit"&&$per_row['10_4']=="10_4") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
Add Post</td>
                <td align="left"><input type="checkbox" name="10_5" id="10_5"value="10_5" <?php if( (isset($_POST['10_5'])&&$_POST['10_5']=="10_5") || ($action=="edit"&&$per_row['10_5']=="10_5") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
Edit Post</td>
                <td colspan="2" align="left"><input type="checkbox" name="10_6" id="10_6"value="10_6" <?php if( (isset($_POST['10_6'])&&$_POST['10_6']=="10_6") || ($action=="edit"&&$per_row['10_6']=="10_6") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
Delete Post</td>
              </tr>
              <tr class="even">
                <td align="left" valign="top">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left" valign="top">&nbsp;</td>
                <td align="left">Add Staff</td>
                <td align="left"><input type="checkbox" name="10_7" value="10_7" id="10_7" <?php if( (isset($_POST['10_7'])&&$_POST['10_7']=="10_7") || ($action=="edit"&&$per_row['10_7']=="10_7") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
Add Staff</td>
                <td align="left">&nbsp;</td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
              <tr class="even">
                <td align="left" valign="top">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left" valign="top">&nbsp;</td>
                <td align="left">View Staff</td>
                <td align="left"><input type="checkbox" name="10_8" value="10_8" id="10_8" <?php if( (isset($_POST['10_8'])&&$_POST['10_8']=="10_8") || ($action=="edit"&&$per_row['10_8']=="10_8") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Edit Staff</td>
                <td align="left"><input type="checkbox" name="10_11" value="10_11" id="10_11" <?php if( (isset($_POST['10_11'])&&$_POST['10_11']=="10_11") || ($action=="edit"&&$per_row['10_11']=="10_11") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Print </td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
              <tr class="even">
                <td align="left" valign="top">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left" valign="top">&nbsp;</td>
                <td align="left">Assign In charge</td>
                <td align="left"><input type="checkbox" name="10_9" value="10_9" id="10_9" <?php if( (isset($_POST['10_9'])&&$_POST['10_9']=="10_9") || ($action=="edit"&&$per_row['10_9']=="10_9") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Assign In charge</td>
                <td align="left"><input type="checkbox" name="10_10" value="10_10" id="10_10" <?php if( (isset($_POST['10_10'])&&$_POST['10_10']=="10_10") || ($action=="edit"&&$per_row['10_10']=="10_10") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                
                  Delete In charge</td>
                <td colspan="2" align="left"><input type="checkbox" name="10_12" value="10_12" id="10_12" <?php if( (isset($_POST['10_12'])&&$_POST['10_12']=="10_12") || ($action=="edit"&&$per_row['10_12']=="10_12") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                
                  Print<script type="text/javascript"> 
			chieldcatids("10_p", "10_1@10_2@10_3@10_4@10_5@10_6@10_7@10_8@10_9@10_10@10_11@10_12");
		</script></td>
              </tr>
			  <tr><td align="left" colspan="8">&nbsp;</td></tr>         
				     <?php } if (in_array('11_p', $top_level_permissions_admin) && in_array('11_p',$admin_permissions) ){?>
              <tr class="even">
                <td align="left">11</td>
                <td align="left"><input type="checkbox" name="11_p" id="11_p" value="11_p" <?php if( (isset($_POST['11_p'])&&$_POST['11_p']=="11_p") || ($action=="edit"&&$per_row['11_p']=="11_p") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> onclick='javascript:chieldcatids("11_p", "11_1@11_2@11_3@11_4@11_5@11_6@11_7@11_8@11_9@11_10@11_11@11_12@11_13@11_14@11_15@11_16@11_17@11_18@11_19@11_20@11_21@11_22@11_23@11_101@11_102@11_103@11_104");' /></td>
                <td align="left">Payroll</td>
                <td align="left">Create Annual leave</td>
                <td align="left"><input type="checkbox" name="11_1" value="11_1" id="11_1" <?php if( (isset($_POST['11_1'])&&$_POST['11_1']=="11_1") || ($action=="edit"&&$per_row['11_1']=="11_1") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Add </td>
                <td align="left"><input type="checkbox" name="11_2" value="11_2" id="11_2" <?php if( (isset($_POST['11_2'])&&$_POST['11_2']=="11_2") || ($action=="edit"&&$per_row['11_2']=="11_2") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Edit </td>
                <td colspan="2" align="left"><input type="checkbox" name="11_3" value="11_3" id="11_3" <?php if( (isset($_POST['11_3'])&&$_POST['11_3']=="11_3") || ($action=="edit"&&$per_row['11_3']=="11_3") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Delete </td>
              </tr>
              <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Create Allowance Type</td>
                <td align="left"><input type="checkbox" name="11_4" value="11_4" id="11_4" <?php if( (isset($_POST['11_4'])&&$_POST['11_4']=="11_4") || ($action=="edit"&&$per_row['11_4']=="11_4") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Add </td>
                <td align="left"><input type="checkbox" name="11_5" value="11_5" id="11_5" <?php if( (isset($_POST['11_5'])&&$_POST['11_5']=="11_5") || ($action=="edit"&&$per_row['11_5']=="11_5") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Edit </td>
                <td colspan="2" align="left"><input type="checkbox" name="11_6" value="11_6" id="11_6" <?php if( (isset($_POST['11_6'])&&$_POST['11_6']=="11_6") || ($action=="edit"&&$per_row['11_6']=="11_6") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Delete </td>
              </tr>
              <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Create Deduction Type</td>
                <td align="left"><input type="checkbox" name="11_7" value="11_7" id="11_7" <?php if( (isset($_POST['11_7'])&&$_POST['11_7']=="11_7") || ($action=="edit"&&$per_row['11_7']=="11_7") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Add </td>
                <td align="left"><input type="checkbox" name="11_8" value="11_8" id="11_8" <?php if( (isset($_POST['11_8'])&&$_POST['11_8']=="11_8") || ($action=="edit"&&$per_row['11_8']=="11_8") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Edit </td>
                <td colspan="2" align="left"><input type="checkbox" name="11_9" value="11_9" id="11_9" <?php if( (isset($_POST['11_9'])&&$_POST['11_9']=="11_9") || ($action=="edit"&&$per_row['11_9']=="11_9") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Delete </td>
              </tr>
              <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Create a Loan</td>
                <td align="left"><input type="checkbox" name="11_10" value="11_10" id="11_10" <?php if( (isset($_POST['11_10'])&&$_POST['11_10']=="11_10") || ($action=="edit"&&$per_row['11_10']=="11_10") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Add </td>
                <td align="left"><input type="checkbox" name="11_11" value="11_11" id="11_11" <?php if( (isset($_POST['11_11'])&&$_POST['11_11']=="11_11") || ($action=="edit"&&$per_row['11_11']=="11_11") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Edit </td>
                <td colspan="2" align="left"><input type="checkbox" name="11_12" value="11_12" id="11_12" <?php if( (isset($_POST['11_12'])&&$_POST['11_12']=="11_12") || ($action=="edit"&&$per_row['11_12']=="11_12") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Delete </td>
              </tr>
              <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Create a Tax</td>
                <td align="left"><input type="checkbox" name="11_13" value="11_13" id="11_13" <?php if( (isset($_POST['11_13'])&&$_POST['11_13']=="11_13") || ($action=="edit"&&$per_row['11_13']=="11_13") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Add </td>
                <td align="left"><input type="checkbox" name="11_14" value="11_14" id="11_14" <?php if( (isset($_POST['11_14'])&&$_POST['11_14']=="11_14") || ($action=="edit"&&$per_row['11_14']=="11_14") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Edit </td>
                <td colspan="2" align="left"><input type="checkbox" name="11_15" value="11_15" id="11_15" <?php if( (isset($_POST['11_15'])&&$_POST['11_15']=="11_15") || ($action=="edit"&&$per_row['11_15']=="11_15") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> 
                Delete </td>
              </tr>
              <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Create PF</td>
                <td align="left"><input type="checkbox" name="11_16" value="11_16" id="11_16" <?php if( (isset($_POST['11_16'])&&$_POST['11_16']=="11_16") || ($action=="edit"&&$per_row['11_16']=="11_16") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Add </td>
                <td align="left"><input type="checkbox" name="11_17" value="11_17" id="11_17" <?php if( (isset($_POST['11_17'])&&$_POST['11_17']=="11_17") || ($action=="edit"&&$per_row['11_17']=="11_17") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Edit </td>
                <td colspan="2" align="left"><input type="checkbox" name="11_18" value="11_18" id="11_18" <?php if( (isset($_POST['11_18'])&&$_POST['11_18']=="11_18") || ($action=="edit"&&$per_row['11_18']=="11_18") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Delete </td>
              </tr>
              <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Issue loan</td>
                <td align="left"><input type="checkbox" name="11_19" value="11_19" id="11_19" <?php if( (isset($_POST['11_19'])&&$_POST['11_19']=="11_19") || ($action=="edit"&&$per_row['11_19']=="11_19") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Issuing Loan</td>
                <td align="left">&nbsp;</td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
              <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Loan Issues List</td>
                <td align="left"><input type="checkbox" name="11_20" value="11_20" id="11_20" <?php if( (isset($_POST['11_20'])&&$_POST['11_20']=="11_20") || ($action=="edit"&&$per_row['11_20']=="11_20") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Pay Amount</td>
                <td align="left"><input type="checkbox" name="11_21" value="11_21" id="11_21" <?php if( (isset($_POST['11_21'])&&$_POST['11_21']=="11_21") || ($action=="edit"&&$per_row['11_21']=="11_21") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Edit Loan</td>
                <td colspan="2" align="left"><input type="checkbox" name="11_23" value="11_23" id="11_23" <?php if( (isset($_POST['11_23'])&&$_POST['11_23']=="11_23") || ($action=="edit"&&$per_row['11_23']=="11_23") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> 
                  View</td>
              </tr>
			  <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left"></td>
                <td align="left"><input type="checkbox" name="11_101" value="11_101" id="11_101" <?php if( (isset($_POST['11_101'])&&$_POST['11_101']=="11_101") || ($action=="edit"&&$per_row['11_101']=="11_101") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Print List</td>
                <td align="left"><input type="checkbox" name="11_102" value="11_102" id="11_102" <?php if( (isset($_POST['11_102'])&&$_POST['11_102']=="11_102") || ($action=="edit"&&$per_row['11_102']=="11_102") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                 Print Individual</td>
                <td colspan="2" align="left"></td>
              </tr>
              <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Employee Payslip</td>
                <td align="left"><input type="checkbox" name="11_22" value="11_22" id="11_22" <?php if( (isset($_POST['11_22'])&&$_POST['11_22']=="11_22") || ($action=="edit"&&$per_row['11_22']=="11_22") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                                
                  Generate Payslip</td>
                <td align="left">&nbsp;</td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
			  <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Payslip List</td>
                <td align="left"><input type="checkbox" name="11_103" value="11_103" id="11_103" <?php if( (isset($_POST['11_103'])&&$_POST['11_103']=="11_103") || ($action=="edit"&&$per_row['11_103']=="11_103") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                               
                  Payslip List</td>
                <td align="left"><input type="checkbox" name="11_104" value="11_104" id="11_104" <?php if( (isset($_POST['11_104'])&&$_POST['11_104']=="11_104") || ($action=="edit"&&$per_row['11_104']=="11_104") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                               
                  Print List</td>
                <td colspan="2" align="left">&nbsp;<script type="text/javascript"> 
			chieldcatids("11_p", "11_1@11_2@11_3@11_4@11_5@11_6@11_7@11_8@11_9@11_10@11_11@11_12@11_13@11_14@11_15@11_16@11_17@11_18@11_19@11_20@11_21@11_22@11_23@11_101@11_102@11_103@11_104");
		</script> </td>
              </tr>
			  <tr><td align="left" colspan="8">&nbsp;</td></tr>         
				     <?php } if (in_array('12_p', $top_level_permissions_admin) && in_array('12_p',$admin_permissions) ){ ?>
              <tr class="even">
                <td width="3%" align="left">12</td>
                <td align="left"><input type="checkbox" name="12_p" id="12_p" value="12_p" <?php if( (isset($_POST['12_p'])&&$_POST['12_p']=="12_p") || ($action=="edit"&&$per_row['12_p']=="12_p") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> onclick='javascript:chieldcatids("12_p", "12_1@12_2@12_3@12_4@12_5@12_6@12_7@12_8@12_9@12_10@12_11@12_12");' /></td>
                <td align="left">Accounting </td>
                <td align="left">Create Account Groups</td>
                <td align="left"><input type="checkbox" name="12_1" value="12_1" id="12_1" <?php if( (isset($_POST['12_1'])&&$_POST['12_1']=="12_1") || ($action=="edit"&&$per_row['12_1']=="12_1") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Add</td>
                <td align="left"><input type="checkbox" name="12_2" value="12_2" id="12_2" <?php if( (isset($_POST['12_2'])&&$_POST['12_2']=="12_2") || ($action=="edit"&&$per_row['12_2']=="12_2") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />                
                  Delete </td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
              <tr class="even">
                <td width="3%" align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Create Account Ledger</td>
                <td align="left"><input type="checkbox" name="12_3" value="12_3" id="12_3" <?php if( (isset($_POST['12_3'])&&$_POST['12_3']=="12_3") || ($action=="edit"&&$per_row['12_3']=="12_3") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Add</td>
                <td align="left"><input type="checkbox" name="12_4" value="12_4" id="12_4" <?php if( (isset($_POST['12_4'])&&$_POST['12_4']=="12_4") || ($action=="edit"&&$per_row['12_4']=="12_4") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Edit </td>
                <td align="left"><input type="checkbox" name="12_5" value="12_5" id="12_5" <?php if( (isset($_POST['12_5'])&&$_POST['12_5']=="12_5") || ($action=="edit"&&$per_row['12_5']=="12_5") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Delete </td>
                <td align="left"><input type="checkbox" name="12_11" value="12_11" id="12_11" <?php if( (isset($_POST['12_11'])&&$_POST['12_11']=="12_11") || ($action=="edit"&&$per_row['12_11']=="12_11") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> Print</td>
              </tr>
              <tr class="even">
                <td width="3%" align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Manage Voucher</td>
                <td align="left"><input type="checkbox" name="12_6" value="12_6" id="12_6" <?php if( (isset($_POST['12_6'])&&$_POST['12_6']=="12_6") || ($action=="edit"&&$per_row['12_6']=="12_6") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Edit </td>
                <td align="left">&nbsp;</td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
              <tr class="even">
                <td width="3%" align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Voucher Entry</td>
                <td align="left"><input type="checkbox" name="12_7" value="12_7" id="12_7" <?php if( (isset($_POST['12_7'])&&$_POST['12_7']=="12_7") || ($action=="edit"&&$per_row['12_7']=="12_7") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Add</td>
                <td align="left">&nbsp;</td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
              <tr class="even">
                <td width="3%" align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Voucher List</td>
                <td align="left"><input type="checkbox" name="12_8" value="12_8" id="12_8" <?php if( (isset($_POST['12_8'])&&$_POST['12_8']=="12_8") || ($action=="edit"&&$per_row['12_8']=="12_8") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                
                  Edit  Voucher</td>
                <td align="left"><input type="checkbox" name="12_12" value="12_12" id="12_12" <?php if( (isset($_POST['12_12'])&&$_POST['12_12']=="12_12") || ($action=="edit"&&$per_row['12_12']=="12_12") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> Delete</td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
			  <tr class="even">
                <td width="3%" align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Balance sheet</td>
                <td align="left"><input type="checkbox" name="12_9" value="12_9" id="12_9" <?php if( (isset($_POST['12_9'])&&$_POST['12_9']=="12_9") || ($action=="edit"&&$per_row['12_9']=="12_9") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                
                  Print  </td>
                <td align="left">&nbsp;</td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
			  <tr class="even">
                <td width="3%" align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Ledger summary</td>
                <td align="left"><input type="checkbox" name="12_10" value="12_10" id="12_10" <?php if( (isset($_POST['12_10'])&&$_POST['12_10']=="12_10") || ($action=="edit"&&$per_row['12_10']=="12_10") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                <script type="text/javascript"> 
			chieldcatids("12_p", "12_1@12_2@12_3@12_4@12_5@12_6@12_7@12_8@12_9@12_10@12_11@12_12");
		</script>
                Print</td>
                <td align="left">&nbsp;</td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
			  <tr><td align="left" colspan="8">&nbsp;</td></tr>          
				     <?php }if (in_array('13_p', $top_level_permissions_admin)&& in_array('13_p',$admin_permissions) ){ ?>
              <tr class="even">
                <td align="left">13</td>
                <td align="left">
							
				<input type="checkbox" name="13_p" id="13_p" value="13_p" <?php if( (isset($_POST['13_p'])&&$_POST['13_p']=="13_p") || ($action=="edit"&&$per_row['13_p']=="13_p") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?>  onclick='javascript:chieldcatids("13_p", "13_1@13_2@13_3@13_4@13_5@13_6@13_7@13_8@13_9@13_10@13_11@13_12@13_13@13_14@13_15@13_16@13_17@13_18@13_19@13_20@13_21@13_22@13_23@13_101@13_102@13_103@13_104@13_105@13_106@13_108");' /></td>
                <td width="13%" align="left">Inventory</td>
                <td align="left">Create Inventory Type</td>
                <td align="left"><input type="checkbox" name="13_1" value="13_1" id="13_1" <?php if( (isset($_POST['13_1'])&&$_POST['13_1']=="13_1") || ($action=="edit"&&$per_row['13_1']=="13_1") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Add </td>
                <td align="left"><input type="checkbox" name="13_2" value="13_2" id="13_2" <?php if( (isset($_POST['13_2'])&&$_POST['13_2']=="13_2") || ($action=="edit"&&$per_row['13_2']=="13_2") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Edit </td>
                <td align="left"><input type="checkbox" name="13_3" value="13_3" id="13_3" <?php if( (isset($_POST['13_3'])&&$_POST['13_3']=="13_3") || ($action=="edit"&&$per_row['13_3']=="13_3") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Delete </td>
                <td align="left"><input type="checkbox" name="13_17" value="13_17" id="13_17" <?php if( (isset($_POST['13_17'])&&$_POST['13_17']=="13_17") || ($action=="edit"&&$per_row['13_17']=="13_17") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
Print</td>
              </tr>			  
              <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td width="13%" align="left">&nbsp;</td>
                <td align="left">Add Product Category</td>
                <td align="left"><input type="checkbox" name="13_4" value="13_4" id="13_4" <?php if( (isset($_POST['13_4'])&&$_POST['13_4']=="13_4") || ($action=="edit"&&$per_row['13_4']=="13_4") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Add </td>
                <td align="left"><input type="checkbox" name="13_5" value="13_5" id="13_5" <?php if( (isset($_POST['13_5'])&&$_POST['13_5']=="13_5") || ($action=="edit"&&$per_row['13_5']=="13_5") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Edit </td>
                <td align="left"><input type="checkbox" name="13_6" value="13_6" id="13_6" <?php if( (isset($_POST['13_6'])&&$_POST['13_6']=="13_6") || ($action=="edit"&&$per_row['13_6']=="13_6") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Delete </td>
                <td align="left"><input type="checkbox" name="13_18" value="13_18" id="13_18" <?php if( (isset($_POST['13_18'])&&$_POST['13_18']=="13_18") || ($action=="edit"&&$per_row['13_18']=="13_18") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> 
                  Print</td>
              </tr>
              <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td width="13%" align="left">&nbsp;</td>
                <td align="left">Add Item</td>
                <td align="left"><input type="checkbox" name="13_7" value="13_7" id="13_7" <?php if( (isset($_POST['13_7'])&&$_POST['13_7']=="13_7") || ($action=="edit"&&$per_row['13_7']=="13_7") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Add </td>
                <td align="left"><input type="checkbox" name="13_8" value="13_8" id="13_8" <?php if( (isset($_POST['13_8'])&&$_POST['13_8']=="13_8") || ($action=="edit"&&$per_row['13_8']=="13_8") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Edit </td>
                <td colspan="2" align="left"><input type="checkbox" name="13_9" value="13_9" id="13_9" <?php if( (isset($_POST['13_9'])&&$_POST['13_9']=="13_9") || ($action=="edit"&&$per_row['13_9']=="13_9") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Delete </td>
              </tr>
			  <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td width="13%" align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left"><input type="checkbox" name="13_19" value="13_19" id="13_19" <?php if( (isset($_POST['13_19'])&&$_POST['13_19']=="13_19") || ($action=="edit"&&$per_row['13_19']=="13_19") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                View</td>
                <td align="left"><input type="checkbox" name="13_20" value="13_20" id="13_20" <?php if( (isset($_POST['13_20'])&&$_POST['13_20']=="13_20") || ($action=="edit"&&$per_row['13_20']=="13_20") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                Print</td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
              <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td width="13%" align="left">&nbsp;</td>
                <td align="left">Add Supplier</td>
                <td align="left"><input type="checkbox" name="13_10" value="13_10" id="13_10" <?php if( (isset($_POST['13_10'])&&$_POST['13_10']=="13_10") || ($action=="edit"&&$per_row['13_10']=="13_10") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Add </td>
                <td align="left"><input type="checkbox" name="13_11" value="13_11" id="13_11" <?php if( (isset($_POST['13_11'])&&$_POST['13_11']=="13_11") || ($action=="edit"&&$per_row['13_11']=="13_11") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Edit </td>
                <td colspan="2" align="left"><input type="checkbox" name="13_12" value="13_12" id="13_12" <?php if( (isset($_POST['13_12'])&&$_POST['13_12']=="13_12") || ($action=="edit"&&$per_row['13_12']=="13_12") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Delete </td>
              </tr>
			  <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td width="13%" align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left"><input type="checkbox" name="13_21" value="13_21" id="13_21" <?php if( (isset($_POST['13_21'])&&$_POST['13_21']=="13_21") || ($action=="edit"&&$per_row['13_21']=="13_21") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                View</td>
                <td align="left"><input type="checkbox" name="13_22" value="13_22" id="13_22" <?php if( (isset($_POST['13_22'])&&$_POST['13_22']=="13_22") || ($action=="edit"&&$per_row['13_22']=="13_22") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                Print</td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
              <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td width="13%" align="left">&nbsp;</td>
                <td align="left">Purchase Order</td>
                <td align="left"><input type="checkbox" name="13_13" value="13_13" id="13_13" <?php if( (isset($_POST['13_13'])&&$_POST['13_13']=="13_13") || ($action=="edit"&&$per_row['13_13']=="13_13") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Add </td>
                <td align="left">&nbsp;</td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
              <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td width="13%" align="left">&nbsp;</td>
                <td align="left">Goods Receipt Note</td>
                <td align="left"><input type="checkbox" name="13_14" value="13_14" id="13_14" <?php if( (isset($_POST['13_14'])&&$_POST['13_14']=="13_14") || ($action=="edit"&&$per_row['13_14']=="13_14") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Goods receipt</td>
                <td align="left">&nbsp;</td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
              <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td width="13%" align="left">&nbsp;</td>
                <td align="left">Goods Issue Note</td>
                <td align="left"><input type="checkbox" name="13_15" value="13_15" id="13_15" <?php if( (isset($_POST['13_15'])&&$_POST['13_15']=="13_15") || ($action=="edit"&&$per_row['13_15']=="13_15") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Goods issue</td>
                <td align="left">&nbsp;</td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
              <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td width="13%" align="left">&nbsp;</td>
                <td align="left">Issue Return Note</td>
                <td colspan="2" align="left"><input type="checkbox" name="13_16" value="13_16" id="13_16" <?php if( (isset($_POST['13_16'])&&$_POST['13_16']=="13_16") || ($action=="edit"&&$per_row['13_16']=="13_16") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                Return Issued Goods</td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
			  
			     <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td width="13%" align="left">&nbsp;</td>
                <td align="left">Stationary Sales Invoice</td>
                <td colspan="2" align="left"><input type="checkbox" name="13_108" value="13_108" id="13_108" <?php if( (isset($_POST['13_108'])&&$_POST['13_108']=="13_108") || ($action=="edit"&&$per_row['13_108']=="13_108") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                Return Issued Goods</td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
			  
			  
			  
			  <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td width="13%" align="left">&nbsp;</td>
                <td align="left">Inventory Reports</td>
                <td align="left"><input type="checkbox" name="13_23" value="13_23" id="13_23" <?php if( (isset($_POST['13_23'])&&$_POST['13_23']=="13_23") || ($action=="edit"&&$per_row['13_23']=="13_23") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                
                View</td>
                <td align="left"><input type="checkbox" name="13_101" value="13_101" id="13_101" <?php if( (isset($_POST['13_101'])&&$_POST['13_101']=="13_101") || ($action=="edit"&&$per_row['13_101']=="13_101") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                
                Edit</td>
                <td  align="left"><input type="checkbox" name="13_102" value="13_102" id="13_102" <?php if( (isset($_POST['13_102'])&&$_POST['13_102']=="13_102") || ($action=="edit"&&$per_row['13_102']=="13_102") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                
                Compare</td>
				 <td  align="left"><input type="checkbox" name="13_103" value="13_103" id="13_103" <?php if( (isset($_POST['13_103'])&&$_POST['13_103']=="13_103") || ($action=="edit"&&$per_row['13_103']=="13_103") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                
                Print List</td>
              </tr>
			  <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td width="13%" align="left">&nbsp;</td>
                <td align="left"></td>
                <td align="left"><input type="checkbox" name="13_104" value="13_104" id="13_104" <?php if( (isset($_POST['13_104'])&&$_POST['13_104']=="13_104") || ($action=="edit"&&$per_row['13_104']=="13_104") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                
                 Print Issued Details</td>
				 <td  align="left"><input type="checkbox" name="13_106" value="13_106" id="13_106" <?php if( (isset($_POST['13_106'])&&$_POST['13_106']=="13_106") || ($action=="edit"&&$per_row['13_106']=="13_106") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                
                Print View</td>
                
                <td  align="left" colspan="2"><input type="checkbox" name="13_105" value="13_105" id="13_105" <?php if( (isset($_POST['13_105'])&&$_POST['13_105']=="13_105") || ($action=="edit"&&$per_row['13_105']=="13_105") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
             
                Print Return Details</td>
				 
              </tr>
			  
			  
			  
			  <tr><td align="left" colspan="8">&nbsp;</td></tr>     
				     <?php } if (in_array('14_p', $top_level_permissions_admin) && in_array('14_p',$admin_permissions) ){ ?>
              <tr class="even">
                <td align="left">14</td>
                <td align="left"><input type="checkbox" name="14_p" id="14_p" value="14_p" <?php if( (isset($_POST['14_p'])&&$_POST['14_p']=="14_p") || ($action=="edit"&&$per_row['14_p']=="14_p") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> onclick='javascript:chieldcatids("14_p", "14_1@14_2@14_3@14_4@14_5@14_6@14_7@14_8@14_9@14_10@14_11@14_12@14_13@14_14@14_15@14_16@14_17@14_18@14_19@14_20@14_21@14_101@14_102@14_103@14_104@14_105@14_106@14_107");' /></td>
                <td align="left"> Transport</td>
                <td align="left">Route List </td>
                <td align="left"><input type="checkbox" name="14_1" value="14_1" id="14_1" <?php if( (isset($_POST['14_1'])&&$_POST['14_1']=="14_1") || ($action=="edit"&&$per_row['14_1']=="14_1") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Add </td>
                <td align="left"><input type="checkbox" name="14_2" value="14_2" id="14_2" <?php if( (isset($_POST['14_2'])&&$_POST['14_2']=="14_2") || ($action=="edit"&&$per_row['14_2']=="14_2") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Edit </td>
                <td align="left"><input type="checkbox" name="14_3" value="14_3" id="14_3" <?php if( (isset($_POST['14_3'])&&$_POST['14_3']=="14_3") || ($action=="edit"&&$per_row['14_3']=="14_3") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Delete</td>
				  <td align="left"><input type="checkbox" name="14_101" value="14_101" id="14_101" <?php if( (isset($_POST['14_101'])&&$_POST['14_101']=="14_101") || ($action=="edit"&&$per_row['14_101']=="14_101") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Print</td>
              </tr>
              <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Board List </td>
                <td align="left"><input type="checkbox" name="14_4" value="14_4" id="14_4" <?php if( (isset($_POST['14_4'])&&$_POST['14_4']=="14_4") || ($action=="edit"&&$per_row['14_4']=="14_4") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Add </td>
                <td align="left"><input type="checkbox" name="14_5" value="14_5" id="14_5" <?php if( (isset($_POST['14_5'])&&$_POST['14_5']=="14_5") || ($action=="edit"&&$per_row['14_5']=="14_5") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Edit </td>
                <td align="left"><input type="checkbox" name="14_6" value="14_6" id="14_6" <?php if( (isset($_POST['14_6'])&&$_POST['14_6']=="14_6") || ($action=="edit"&&$per_row['14_6']=="14_6") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Delete</td>
				  <td align="left"><input type="checkbox" name="14_102" value="14_102" id="14_102" <?php if( (isset($_POST['14_102'])&&$_POST['14_102']=="14_102") || ($action=="edit"&&$per_row['14_102']=="14_102") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Print</td>
              </tr>
              <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Vehicle List</td>
                <td align="left"><input type="checkbox" name="14_7" value="14_7" id="14_7" <?php if( (isset($_POST['14_7'])&&$_POST['14_7']=="14_7") || ($action=="edit"&&$per_row['14_7']=="14_7") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Add </td>
                <td align="left"><input type="checkbox" name="14_8" value="14_8" id="14_8" <?php if( (isset($_POST['14_8'])&&$_POST['14_8']=="14_8") || ($action=="edit"&&$per_row['14_8']=="14_8") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Edit </td>
                <td align="left"><input type="checkbox" name="14_9" value="14_9" id="14_9" <?php if( (isset($_POST['14_9'])&&$_POST['14_9']=="14_9") || ($action=="edit"&&$per_row['14_9']=="14_9") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Delete</td>
				  <td align="left"><input type="checkbox" name="14_103" value="14_103" id="14_103" <?php if( (isset($_POST['14_103'])&&$_POST['14_103']=="14_103") || ($action=="edit"&&$per_row['14_103']=="14_103") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Print</td>
              </tr>
              <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Drivers List </td>
                <td align="left"><input type="checkbox" name="14_10" value="14_10" id="14_10" <?php if( (isset($_POST['14_10'])&&$_POST['14_10']=="14_10") || ($action=="edit"&&$per_row['14_10']=="14_10") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Edit DL details</td>
                <td align="left"><input type="checkbox" name="14_21" value="14_21" id="14_21" <?php if( (isset($_POST['14_21'])&&$_POST['14_21']=="14_21") || ($action=="edit"&&$per_row['14_21']=="14_21") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> View</td>
                <td align="left" colspan="2"><input type="checkbox" name="14_104" value="14_104" id="14_104" <?php if( (isset($_POST['14_104'])&&$_POST['14_104']=="14_104") || ($action=="edit"&&$per_row['14_104']=="14_104") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Print</td>
              </tr>
              <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Allot Vehicle to Board</td>
                <td align="left"><input type="checkbox" name="14_11" value="14_11" id="14_11" <?php if( (isset($_POST['14_11'])&&$_POST['14_11']=="14_11") || ($action=="edit"&&$per_row['14_11']=="14_11") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Edit Allot</td>
                <td align="left"><input type="checkbox" name="14_105" value="14_105" id="14_105" <?php if( (isset($_POST['14_105'])&&$_POST['14_105']=="14_105") || ($action=="edit"&&$per_row['14_105']=="14_105") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Print</td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
              <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Allot Driver to Vehicle</td>
                <td align="left"><input type="checkbox" name="14_12" value="14_12" id="14_12" <?php if( (isset($_POST['14_12'])&&$_POST['14_12']=="14_12") || ($action=="edit"&&$per_row['14_12']=="14_12") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Edit Allot</td>
                <td align="left"><input type="checkbox" name="14_106" value="14_106" id="14_106" <?php if( (isset($_POST['14_106'])&&$_POST['14_106']=="14_106") || ($action=="edit"&&$per_row['14_106']=="14_106") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Print</td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
              <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Prepare Transport Bills</td>
                <td colspan="2" align="left"><input type="checkbox" name="14_13" value="14_13" id="14_13" <?php if( (isset($_POST['14_13'])&&$_POST['14_13']=="14_13") || ($action=="edit"&&$per_row['14_13']=="14_13") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Prepare Transport Bills</td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
              <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">View Transport Bills</td>
                <td align="left"><input type="checkbox" name="14_14" value="14_14" id="14_14" <?php if( (isset($_POST['14_14'])&&$_POST['14_14']=="14_14") || ($action=="edit"&&$per_row['14_14']=="14_14") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Export</td>
                <td colspan="3" align="left"><input type="checkbox" name="14_15" value="14_15" id="14_15" <?php if( (isset($_POST['14_15'])&&$_POST['14_15']=="14_15") || ($action=="edit"&&$per_row['14_15']=="14_15") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Receive payment</td>
                </tr>
              <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Maintenance Details</td>
                <td align="left"><input type="checkbox" name="14_16" value="14_16" id="14_16" <?php if( (isset($_POST['14_16'])&&$_POST['14_16']=="14_16") || ($action=="edit"&&$per_row['14_16']=="14_16") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                Add </td>
                <td align="left"><input type="checkbox" name="14_107" value="14_107" id="14_107" <?php if( (isset($_POST['14_107'])&&$_POST['14_107']=="14_107") || ($action=="edit"&&$per_row['14_107']=="14_107") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Print</td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
			  <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Driver Report</td>
                <td align="left"><input type="checkbox" name="14_17" value="14_17" id="14_17" <?php if( (isset($_POST['14_16'])&&$_POST['14_16']=="14_16") || ($action=="edit"&&$per_row['14_16']=="14_16") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                Export</td>
                <td align="left">&nbsp;</td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
			  <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Vehicle Report</td>
                <td align="left"><input type="checkbox" name="14_18" value="14_18" id="14_18" <?php if( (isset($_POST['14_16'])&&$_POST['14_16']=="14_16") || ($action=="edit"&&$per_row['14_16']=="14_16") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                Export</td>
                <td align="left">&nbsp;</td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
			  <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Student Wise Report</td>
                <td align="left"><input type="checkbox" name="14_19" value="14_19" id="14_19" <?php if( (isset($_POST['14_16'])&&$_POST['14_16']=="14_16") || ($action=="edit"&&$per_row['14_16']=="14_16") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                Export</td>
                <td align="left">&nbsp;</td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
			  <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Staff Wise Report</td>
                <td align="left"><input type="checkbox" name="14_20" value="14_20" id="14_20" <?php if( (isset($_POST['14_16'])&&$_POST['14_16']=="14_16") || ($action=="edit"&&$per_row['14_16']=="14_16") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                <script type="text/javascript"> 
			chieldcatids("14_p", "14_1@14_2@14_3@14_4@14_5@14_6@14_7@14_8@14_9@14_10@14_11@14_12@14_13@14_14@14_15@14_16@14_17@14_18@14_19@14_20@14_21@14_101@14_102@14_103@14_104@14_105@14_106@14_107");
		</script>
                Export</td>
                <td align="left">&nbsp;</td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
			  <tr><td align="left" colspan="8">&nbsp;</td></tr>			             
				     <?php } if (in_array('15_p', $top_level_permissions_admin) && in_array('15_p',$admin_permissions) ){ ?>
              <tr class="even">
                <td align="left">15</td>
                <td align="left"><input type="checkbox" name="15_p" id="15_p" value="15_p" <?php if( (isset($_POST['15_p'])&&$_POST['15_p']=="15_p") || ($action=="edit"&&$per_row['15_p']=="15_p") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> onclick='javascript:chieldcatids("15_p", "15_1@15_2@15_3");' /></td>
                <td align="left">Time Table</td>
                <td align="left">Class wise timetables</td>
                <td align="left"><input type="checkbox" name="15_1" value="15_1" id="15_1" <?php if( (isset($_POST['15_1'])&&$_POST['15_1']=="15_1") || ($action=="edit"&&$per_row['15_1']=="15_1") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                Edit</td>
                <td align="left"><input type="checkbox" name="15_2" value="15_2" id="15_2" <?php if( (isset($_POST['15_2'])&&$_POST['15_2']=="15_2") || ($action=="edit"&&$per_row['15_2']=="15_2") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> 
                  View</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr class="even"><td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Staff Timetable</td>
                <td align="left"><input type="checkbox" name="15_3" value="15_3" id="15_3" <?php if( (isset($_POST['15_3'])&&$_POST['15_3']=="15_3") || ($action=="edit"&&$per_row['15_3']=="15_3") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> View
				<script type="text/javascript"> 
			chieldcatids("15_p", "15_1@15_2@15_3");
		</script></td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
              </tr>
			  <tr><td align="left" colspan="8">&nbsp;</td></tr>
				     <?php } if (in_array('16_p', $top_level_permissions_admin) && in_array('16_p',$admin_permissions) ){ ?>
              <tr class="even">			  
                <td align="left">16</td>
                <td align="left"><input type="checkbox" name="16_p" id="16_p" value="16_p" <?php if( (isset($_POST['16_p'])&&$_POST['16_p']=="16_p") || ($action=="edit"&&$per_row['16_p']=="16_p") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> onclick='javascript:chieldcatids("16_p", "16_1@16_2@16_3@16_4@16_5@16_6@16_7@16_8@16_10@16_11@16_12@16_13@16_14@16_15@16_17@16_18@16_20@16_21@16_22@16_23@16_24@16_25@16_26@16_27@16_28@16_29@16_101@16_102@16_103@16_104@16_105@16_106@16_107");' /></td>
                <td align="left"> Library</td>
                <td align="left">Category</td>
                <td align="left"><input type="checkbox" name="16_1" value="16_1" id="16_1" <?php if( (isset($_POST['16_1'])&&$_POST['16_1']=="16_1") || ($action=="edit"&&$per_row['16_1']=="16_1") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Add </td>
                <td align="left"><input type="checkbox" name="16_2" value="16_2" id="16_2" <?php if( (isset($_POST['16_2'])&&$_POST['16_2']=="16_2") || ($action=="edit"&&$per_row['16_2']=="16_2") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Edit </td>
                <td align="left"><input type="checkbox" name="16_3" value="16_3" id="16_3" <?php if( (isset($_POST['16_3'])&&$_POST['16_3']=="16_3") || ($action=="edit"&&$per_row['16_3']=="16_3") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Delete </td>
				  <td align="left"><input type="checkbox" name="16_101" value="16_101" id="16_101" <?php if( (isset($_POST['16_101'])&&$_POST['16_101']=="16_101") || ($action=="edit"&&$per_row['16_101']=="16_101") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Print </td>
              </tr>
              <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Sub Category</td>
                <td align="left"><input type="checkbox" name="16_4" value="16_4" id="16_4" <?php if( (isset($_POST['16_4'])&&$_POST['16_4']=="16_4") || ($action=="edit"&&$per_row['16_4']=="16_4") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Add </td>
                <td align="left"><input type="checkbox" name="16_5" value="16_5" id="16_5" <?php if( (isset($_POST['16_5'])&&$_POST['16_5']=="16_5") || ($action=="edit"&&$per_row['16_5']=="16_5") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Edit </td>
                <td align="left"><input type="checkbox" name="16_6" value="16_6" id="16_6" <?php if( (isset($_POST['16_6'])&&$_POST['16_6']=="16_6") || ($action=="edit"&&$per_row['16_6']=="16_6") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Delete </td>
				  <td align="left"><input type="checkbox" name="16_102" value="16_102" id="16_102" <?php if( (isset($_POST['16_102'])&&$_POST['16_102']=="16_102") || ($action=="edit"&&$per_row['16_102']=="16_102") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Print </td>
              </tr>
              <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Library fine</td>
                <td align="left"><input type="checkbox" name="16_7" value="16_7" id="16_7" <?php if( (isset($_POST['16_7'])&&$_POST['16_7']=="16_7") || ($action=="edit"&&$per_row['16_7']=="16_7") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Add </td>
                <td align="left"><input type="checkbox" name="16_8" value="16_8" id="16_8" <?php if( (isset($_POST['16_8'])&&$_POST['16_8']=="16_8") || ($action=="edit"&&$per_row['16_8']=="16_8") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Edit </td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
              <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Publisher/Supplier</td>
                <td align="left"><input type="checkbox" name="16_10" value="16_10" id="16_10" <?php if( (isset($_POST['16_10'])&&$_POST['16_10']=="16_10") || ($action=="edit"&&$per_row['16_10']=="16_10") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Add </td>
                <td align="left"><input type="checkbox" name="16_11" value="16_11" id="16_11" <?php if( (isset($_POST['16_11'])&&$_POST['16_11']=="16_11") || ($action=="edit"&&$per_row['16_11']=="16_11") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Edit </td>
                <td  align="left"><input type="checkbox" name="16_12" value="16_12" id="16_12" <?php if( (isset($_POST['16_12'])&&$_POST['16_12']=="16_12") || ($action=="edit"&&$per_row['16_12']=="16_12") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Delete </td>
				  <td align="left"><input type="checkbox" name="16_103" value="16_103" id="16_103" <?php if( (isset($_POST['16_103'])&&$_POST['16_103']=="16_103") || ($action=="edit"&&$per_row['16_103']=="16_103") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Print </td>
              </tr>
              <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Books</td>
                <td align="left"><input type="checkbox" name="16_13" value="16_13" id="16_13" <?php if( (isset($_POST['16_13'])&&$_POST['16_13']=="16_13") || ($action=="edit"&&$per_row['16_13']=="16_13") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Add </td>
                <td align="left"><input type="checkbox" name="16_14" value="16_14" id="16_14" <?php if( (isset($_POST['16_14'])&&$_POST['16_14']=="16_14") || ($action=="edit"&&$per_row['16_14']=="16_14") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Edit </td>
                <td colspan="2" align="left"><input type="checkbox" name="16_15" value="16_15" id="16_15" <?php if( (isset($_POST['16_15'])&&$_POST['16_15']=="16_15") || ($action=="edit"&&$per_row['16_15']=="16_15") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Delete </td>
              </tr>
              <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Issue/Return Books(students)</td>
                <td align="left"><input type="checkbox" name="16_17" value="16_17" id="16_17" <?php if( (isset($_POST['16_17'])&&$_POST['16_17']=="16_17") || ($action=="edit"&&$per_row['16_17']=="16_17") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
Issue </td>
                <td align="left"><input type="checkbox" name="16_18" value="16_18" id="16_18" <?php if( (isset($_POST['16_18'])&&$_POST['16_18']=="16_18") || ($action=="edit"&&$per_row['16_18']=="16_18") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
Return</td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
              <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Issue/Return Books(staff)</td>
                <td align="left"><input type="checkbox" name="16_20" value="16_20" id="16_20" <?php if( (isset($_POST['16_20'])&&$_POST['16_20']=="16_20") || ($action=="edit"&&$per_row['16_20']=="16_20") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
Issue </td>
                <td align="left"><input type="checkbox" name="16_21" value="16_21" id="16_21" <?php if( (isset($_POST['16_21'])&&$_POST['16_21']=="16_21") || ($action=="edit"&&$per_row['16_21']=="16_21") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
Return</td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
              <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">All Books</td>
                <td align="left"><input type="checkbox" name="16_24" value="16_24" id="16_24" <?php if( (isset($_POST['16_24'])&&$_POST['16_24']=="16_24") || ($action=="edit"&&$per_row['16_24']=="16_24") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  View</td>
                <td align="left"><input type="checkbox" name="16_104" value="16_104" id="16_104" <?php if( (isset($_POST['16_104'])&&$_POST['16_104']=="16_104") || ($action=="edit"&&$per_row['16_104']=="16_104") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Print </td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
			  <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Book Availability</td>
                <td align="left"><input type="checkbox" name="16_105" value="16_105" id="16_105" <?php if( (isset($_POST['16_105'])&&$_POST['16_105']=="16_105") || ($action=="edit"&&$per_row['16_105']=="16_105") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                
                Print</td>
                <td align="left">
                   </td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
			  <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Student Report</td>
                <td align="left"><input type="checkbox" name="16_22" value="16_22" id="16_22" <?php if( (isset($_POST['16_22'])&&$_POST['16_22']=="16_22") || ($action=="edit"&&$per_row['16_22']=="16_22") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Add Payment</td>
                <td align="left"><input type="checkbox" name="16_25" value="16_25" id="16_25" <?php if( (isset($_POST['16_25'])&&$_POST['16_25']=="16_25") || ($action=="edit"&&$per_row['16_25']=="16_25") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> 
                Print</td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
              <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Staff Report</td>
                <td align="left"><input type="checkbox" name="16_23" value="16_23" id="16_23" <?php if( (isset($_POST['16_23'])&&$_POST['16_23']=="16_23") || ($action=="edit"&&$per_row['16_23']=="16_23") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                Add Payment</td>
                <td align="left"><input type="checkbox" name="16_26" value="16_26" id="16_26" <?php if( (isset($_POST['16_26'])&&$_POST['16_26']=="16_26") || ($action=="edit"&&$per_row['16_26']=="16_26") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> 
                  Print</td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
			  <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Books Issued Students</td>
                <td align="left"><input type="checkbox" name="16_106" value="16_106" id="16_106" <?php if( (isset($_POST['16_106'])&&$_POST['16_106']=="16_106") || ($action=="edit"&&$per_row['16_106']=="16_106") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> Print</td>
                <td align="left">
                   </td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
			  <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Books Issued Staff</td>
                <td align="left"><input type="checkbox" name="16_107" value="16_107" id="16_107" <?php if( (isset($_POST['16_107'])&&$_POST['16_107']=="16_107") || ($action=="edit"&&$per_row['16_107']=="16_107") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />Print</td>
                <td align="left">
                   </td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
			  <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">All Fines</td>
                <td align="left"><input type="checkbox" name="16_27" value="16_27" id="16_27" <?php if( (isset($_POST['16_27'])&&$_POST['16_27']=="16_27") || ($action=="edit"&&$per_row['16_27']=="16_27") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                View</td>
                <td align="left"><input type="checkbox" name="16_28" value="16_28" id="16_28" <?php if( (isset($_POST['16_28'])&&$_POST['16_28']=="16_28") || ($action=="edit"&&$per_row['16_28']=="16_28") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> 
                  Print</td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
			  <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Book Analysis</td>
                <td align="left"><input type="checkbox" name="16_29" value="16_29" id="16_29" <?php if( (isset($_POST['16_29'])&&$_POST['16_29']=="16_29") || ($action=="edit"&&$per_row['16_29']=="16_29") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                
                Print</td>
                <td align="left"> <script type="text/javascript"> 
			chieldcatids("16_p", "16_1@16_2@16_3@16_4@16_5@16_6@16_7@16_8@16_10@16_11@16_12@16_13@16_14@16_15@16_17@16_18@16_20@16_21@16_22@16_23@16_24@16_25@16_26@16_27@16_28@16_29@16_101@16_102@16_103@16_104@16_105@16_106@16_107");
		</script></td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
			  
			  <tr><td align="left" colspan="8">&nbsp;</td></tr> 
				     <?php } if (in_array('17_p', $top_level_permissions_admin) && in_array('17_p',$admin_permissions) ){ ?>
              <tr class="even">
                <td align="left">17</td>
                <td align="left"><input type="checkbox" name="17_p" id="17_p" value="17_p" <?php if( (isset($_POST['17_p'])&&$_POST['17_p']=="17_p") || ($action=="edit"&&$per_row['17_p']=="17_p") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> onclick='javascript:chieldcatids("17_p", "17_1@17_2@17_3@17_4@17_5@17_6@17_7@17_8@17_9@17_101");' /></td>
                <td align="left">Examination</td>
                <td align="left">Create Exam</td>
                <td colspan="4" align="left"><input type="checkbox" name="17_1" value="17_1" id="17_1" <?php if( (isset($_POST['17_1'])&&$_POST['17_1']=="17_1") || ($action=="edit"&&$per_row['17_1']=="17_1") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> 
                  Add/Edit</td>
              </tr>
              <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Export Exam</td>
                <td colspan="4" align="left"><input type="checkbox" name="17_6" value="17_6" id="17_6" <?php if( (isset($_POST['17_6'])&&$_POST['17_6']=="17_6") || ($action=="edit"&&$per_row['17_6']=="17_6") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Export</td>
              </tr>
			  <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Subject wise Marks</td>
                <td colspan="4" align="left"><input type="checkbox" name="17_2" value="17_2" id="17_2" <?php if( (isset($_POST['17_2'])&&$_POST['17_2']=="17_2") || ($action=="edit"&&$per_row['17_2']=="17_2") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Add/Edit</td>
              </tr>
              <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Student wise Marks</td>
                <td colspan="4" align="left"><input type="checkbox" name="17_3" value="17_3" id="17_3" <?php if( (isset($_POST['17_3'])&&$_POST['17_3']=="17_3") || ($action=="edit"&&$per_row['17_3']=="17_3") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                Add/Edit</td>
              </tr>
			  <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Reports </td>
                <td colspan="4" align="left"><input type="checkbox" name="17_101" value="17_101" id="17_101" <?php if( (isset($_POST['17_101'])&&$_POST['17_101']=="17_101") || ($action=="edit"&&$per_row['17_101']=="17_101") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                Print</td>
              </tr>
			  <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Reports Export</td>
                <td colspan="4" align="left"><input type="checkbox" name="17_4" value="17_4" id="17_4" <?php if( (isset($_POST['17_4'])&&$_POST['17_4']=="17_4") || ($action=="edit"&&$per_row['17_4']=="17_4") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                Export</td>
              </tr>
			  <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Student Reports</td>
                <td colspan="4" align="left"><input type="checkbox" name="17_5" value="17_5" id="17_5" <?php if( (isset($_POST['17_5'])&&$_POST['17_5']=="17_5") || ($action=="edit"&&$per_row['17_5']=="17_5") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                Print</td>
              </tr>
			  <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Student Reports</td>
                <td colspan="4" align="left"><input type="checkbox" name="17_7" value="17_7" id="17_7" <?php if( (isset($_POST['17_7'])&&$_POST['17_7']=="17_7") || ($action=="edit"&&$per_row['17_7']=="17_7") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                Report</td>
              </tr>
			  <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Student Reports</td>
                <td colspan="4" align="left"><input type="checkbox" name="17_8" value="17_8" id="17_8" <?php if( (isset($_POST['17_8'])&&$_POST['17_8']=="17_8") || ($action=="edit"&&$per_row['17_8']=="17_8") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                Examination Report</td>
              </tr>
			  <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Institute Report</td>
                <td colspan="4" align="left"><input type="checkbox" name="17_9" value="17_9" id="17_9" <?php if( (isset($_POST['17_9'])&&$_POST['17_9']=="17_9") || ($action=="edit"&&$per_row['17_9']=="17_9") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                <script type="text/javascript"> 
			chieldcatids("17_p", "17_1@17_2@17_3@17_4@17_5@17_6@17_7@17_8@17_9@17_101");
		</script>
                  Print</td>
              </tr>
			  <tr><td align="left" colspan="8">&nbsp;</td></tr>            
				     <?php } if (in_array('18_p', $top_level_permissions_admin) && in_array('18_p',$admin_permissions) ){ ?>
              <tr class="even">
                <td align="left">18</td>
                <td align="left"><input type="checkbox" name="18_p" id="18_p" value="18_p" <?php if( (isset($_POST['18_p'])&&$_POST['18_p']=="18_p") || ($action=="edit"&&$per_row['18_p']=="18_p") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> onclick='javascript:chieldcatids("18_p", "18_1@18_2@18_3@18_4@18_5@18_6@18_7@18_8@18_9@18_10@18_11@18_12");' /></td>
                <td align="left">Attendance</td>
                <td align="left">Attendance slip</td>
                <td colspan="4" align="left"><input type="checkbox" name="18_5" value="18_5" id="18_5" <?php if( (isset($_POST['18_5'])&&$_POST['18_5']=="18_5") || ($action=="edit"&&$per_row['18_5']=="18_5") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Print</td>
              </tr>
			  <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Student Attendance</td>
                <td colspan="4" align="left"><input type="checkbox" name="18_1" value="18_1" id="18_1" <?php if( (isset($_POST['18_1'])&&$_POST['18_1']=="18_1") || ($action=="edit"&&$per_row['18_1']=="18_1") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Attendance taking</td>
              </tr>
              <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Edit Student Attendance</td>
                <td colspan="4" align="left"><input type="checkbox" name="18_2" value="18_2" id="18_2" <?php if( (isset($_POST['18_2'])&&$_POST['18_2']=="18_2") || ($action=="edit"&&$per_row['18_2']=="18_2") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Edit Attendance</td>
              </tr>
              <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Staff Attendance</td>
                <td colspan="4" align="left"><input type="checkbox" name="18_3" value="18_3" id="18_3" <?php if( (isset($_POST['18_3'])&&$_POST['18_3']=="18_3") || ($action=="edit"&&$per_row['18_3']=="18_3") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Attendance taking</td>
              </tr>
              <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Edit Staff Attendance</td>
                <td colspan="4" align="left"><input type="checkbox" name="18_4" value="18_4" id="18_4" <?php if( (isset($_POST['18_4'])&&$_POST['18_4']=="18_4") || ($action=="edit"&&$per_row['18_4']=="18_4") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                Edit Attendance</td>
              </tr>
			  <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Student Report</td>
                <td colspan="4" align="left"><input type="checkbox" name="18_6" value="18_6" id="18_6" <?php if( (isset($_POST['18_6'])&&$_POST['18_6']=="18_6") || ($action=="edit"&&$per_row['18_6']=="18_6") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                Print</td>
              </tr>
			  <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Class Report</td>
                <td colspan="2" align="left"><input type="checkbox" name="18_7" value="18_7" id="18_7" <?php if( (isset($_POST['18_7'])&&$_POST['18_7']=="18_7") || ($action=="edit"&&$per_row['18_7']=="18_7") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  View when they are absent</td>
                <td align="left"><input type="checkbox" name="18_8" value="18_8" id="18_8" <?php if( (isset($_POST['18_8'])&&$_POST['18_8']=="18_8") || ($action=="edit"&&$per_row['18_8']=="18_8") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> 
                  Print</td>
                <td align="left">&nbsp;</td>
			  </tr>
			  <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Employee report</td>
                <td colspan="2" align="left"><input type="checkbox" name="18_9" value="18_9" id="18_9" <?php if( (isset($_POST['18_9'])&&$_POST['18_9']=="18_9") || ($action=="edit"&&$per_row['18_9']=="18_9") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                View when they are absent</td>
                <td align="left"><input type="checkbox" name="18_10" value="18_10" id="18_10" <?php if( (isset($_POST['18_10'])&&$_POST['18_10']=="18_10") || ($action=="edit"&&$per_row['18_10']=="18_10") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> 
                  Print</td>
                <td align="left">&nbsp;</td>
			  </tr>
			  <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Staff Report</td>
                <td colspan="2" align="left"><input type="checkbox" name="18_11" value="18_11" id="18_11" <?php if( (isset($_POST['18_11'])&&$_POST['18_11']=="18_11") || ($action=="edit"&&$per_row['18_11']=="18_11") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                View when they are absent</td>
                <td align="left"><input type="checkbox" name="18_12" value="18_12" id="18_12" <?php if( (isset($_POST['18_12'])&&$_POST['18_12']=="18_12") || ($action=="edit"&&$per_row['18_12']=="18_12") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> 
                Print
				<script type="text/javascript"> 
			chieldcatids("18_p", "18_1@18_2@18_3@18_4@18_5@18_6@18_7@18_8@18_9@18_10@18_11@18_12");
		</script></td>
                <td align="left">&nbsp;</td>
			  </tr>
			  <tr><td align="left" colspan="8">&nbsp;</td></tr>  
			    <?php } if (in_array('19_p', $top_level_permissions_admin) && in_array('19_p',$admin_permissions) ){ ?>
              <tr class="even">
                <td align="left">19</td>
                <td align="left"><input type="checkbox" name="19_p" id="19_p" value="19_p" <?php if( (isset($_POST['19_p'])&&$_POST['19_p']=="19_p") || ($action=="edit"&&$per_row['19_p']=="19_p") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> onclick='javascript:chieldcatids("19_p", "19_1@19_2@19_3@19_4@19_5@19_6@19_7@19_8@19_9@19_10@19_11@19_12@19_13@19_14@19_15@19_16@19_17@19_18@19_101@19_102");' /></td>
                <td align="left">Hostel</td>
                <td align="left">Add Building</td>
                <td align="left"><input type="checkbox" name="19_1" value="19_1" id="19_1" <?php if( (isset($_POST['19_1'])&&$_POST['19_1']=="19_1") || ($action=="edit"&&$per_row['19_1']=="19_1") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Add </td>
                <td align="left"><input type="checkbox" name="19_2" value="19_2" id="19_2" <?php if( (isset($_POST['19_2'])&&$_POST['19_2']=="19_2") || ($action=="edit"&&$per_row['19_2']=="19_2") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Edit </td>
                <td colspan="2" align="left"><input type="checkbox" name="19_3" value="19_3" id="19_3" <?php if( (isset($_POST['19_3'])&&$_POST['19_3']=="19_3") || ($action=="edit"&&$per_row['19_3']=="19_3") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Delete </td>
              </tr>
              <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Add Room</td>
                <td align="left"><input type="checkbox" name="19_4" value="19_4" id="19_4" <?php if( (isset($_POST['19_4'])&&$_POST['19_4']=="19_4") || ($action=="edit"&&$per_row['19_4']=="19_4") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Add </td>
                <td align="left"><input type="checkbox" name="19_5" value="19_5" id="19_5" <?php if( (isset($_POST['19_5'])&&$_POST['19_5']=="19_5") || ($action=="edit"&&$per_row['19_5']=="19_5") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Edit </td>
                <td colspan="2" align="left"><input type="checkbox" name="19_6" value="19_6" id="19_6" <?php if( (isset($_POST['19_6'])&&$_POST['19_6']=="19_6") || ($action=="edit"&&$per_row['19_6']=="19_6") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Delete </td>
              </tr>
			  <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Rooms Availability </td>
                <td align="left"><input type="checkbox" name="19_11" value="19_11" id="19_11" <?php if( (isset($_POST['19_11'])&&$_POST['19_11']=="19_11") || ($action=="edit"&&$per_row['19_11']=="19_11") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                Print</td>
                <td align="left">&nbsp;</td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
              <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Room Allocation</td>
                <td align="left"><input type="checkbox" name="19_7" value="19_7" id="19_7" <?php if( (isset($_POST['19_7'])&&$_POST['19_7']=="19_7") || ($action=="edit"&&$per_row['19_7']=="19_7") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Room Allocation (Add)</td>
                <td align="left"><input type="checkbox" name="19_12" value="19_12" id="19_12" <?php if( (isset($_POST['19_12'])&&$_POST['19_12']=="19_12") || ($action=="edit"&&$per_row['19_12']=="19_12") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> 
                  Issue Item</td>
                <td align="left"><input type="checkbox" name="19_13" value="19_13" id="19_13" <?php if( (isset($_POST['19_13'])&&$_POST['19_13']=="19_13") || ($action=="edit"&&$per_row['19_13']=="19_13") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> 
                  Health Record</td>
                <td align="left"><input type="checkbox" name="19_14" value="19_14" id="19_14" <?php if( (isset($_POST['19_14'])&&$_POST['19_14']=="19_14") || ($action=="edit"&&$per_row['19_14']=="19_14") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> 
                  Deallocate</td>
              </tr>
			  <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left"><input type="checkbox" name="19_15" value="19_15" id="19_15" <?php if( (isset($_POST['19_15'])&&$_POST['19_15']=="19_15") || ($action=="edit"&&$per_row['19_15']=="19_15") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Report</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Hostel Persons</td>
                <td align="left"><input type="checkbox" name="19_101" value="19_101" id="19_101" <?php if( (isset($_POST['19_101'])&&$_POST['19_101']=="19_101") || ($action=="edit"&&$per_row['19_101']=="19_101") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Individual Print</td>
                <td align="left"><input type="checkbox" name="19_102" value="19_102" id="19_102" <?php if( (isset($_POST['19_102'])&&$_POST['19_102']=="19_102") || ($action=="edit"&&$per_row['19_102']=="19_102") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> 
                  Print List</td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
			  <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Collect Items</td>
                <td align="left"><input type="checkbox" name="19_8" value="19_8" id="19_8" <?php if( (isset($_POST['19_8'])&&$_POST['19_8']=="19_8") || ($action=="edit"&&$per_row['19_8']=="19_8") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Collect Items(Return)</td>
                <td align="left"><input type="checkbox" name="19_16" value="19_16" id="19_16" <?php if( (isset($_POST['19_16'])&&$_POST['19_16']=="19_16") || ($action=="edit"&&$per_row['19_16']=="19_16") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> 
                  View</td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
              <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Prepare Bill</td>
                <td align="left"><input type="checkbox" name="19_9" value="19_9" id="19_9" <?php if( (isset($_POST['19_9'])&&$_POST['19_9']=="19_9") || ($action=="edit"&&$per_row['19_9']=="19_9") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Prepare Bill</td>
                <td align="left">&nbsp;</td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
              <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">View Details</td>
                <td align="left"><input type="checkbox" name="19_10" value="19_10" id="19_10" <?php if( (isset($_POST['19_10'])&&$_POST['19_10']=="19_10") || ($action=="edit"&&$per_row['19_10']=="19_10") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />                
				Pay Amount</td>
                <td align="left"><input type="checkbox" name="19_17" value="19_17" id="19_17" <?php if( (isset($_POST['19_17'])&&$_POST['19_17']=="19_17") || ($action=="edit"&&$per_row['19_17']=="19_17") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> 
                View</td>
                <td colspan="2" align="left"><input type="checkbox" name="19_18" value="19_18" id="19_18" <?php if( (isset($_POST['19_18'])&&$_POST['19_18']=="19_18") || ($action=="edit"&&$per_row['19_18']=="19_18") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> 
                  Print
				    <script type="text/javascript"> 
			chieldcatids("19_p", "19_1@19_2@19_3@19_4@19_5@19_6@19_7@19_8@19_9@19_10@19_11@19_12@19_13@19_14@19_15@19_16@19_17@19_18@19_101@19_102");
		</script></td>
              </tr>
              <tr><td align="left" colspan="8">&nbsp;</td></tr>    
				     <?php }if (in_array('20_p', $top_level_permissions_admin) && in_array('20_p',$admin_permissions) ){ ?>
              <tr class="even">
                <td align="left">20</td>
                <td align="left">
				<input type="checkbox" name="20_p" id="20_p" value="20_p" <?php if( (isset($_POST['20_p'])&&$_POST['20_p']=="20_p") || ($action=="edit"&&$per_row['20_p']=="20_p") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> onclick='javascript:chieldcatids("20_p", "20_1@20_2@20_3@20_4@20_5@20_6@20_101@20_102");' />
				</td>
                <td align="left">Message</td>
                <td align="left">Messages</td>
                <td align="left"><input type="checkbox" name="20_1" value="20_1" id="20_1" <?php if( (isset($_POST['20_1'])&&$_POST['20_1']=="20_1") || ($action=="edit"&&$per_row['20_1']=="20_1") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Reply</td>
                <td align="left"><input type="checkbox" name="20_5" value="20_5" id="20_5" <?php if( (isset($_POST['20_5'])&&$_POST['20_5']=="20_5") || ($action=="edit"&&$per_row['20_5']=="20_5") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> 
                  Delete</td>
                <td colspan="2" align="left"><input type="checkbox" name="20_101" value="20_101" id="20_101" <?php if( (isset($_POST['20_101'])&&$_POST['20_101']=="20_101") || ($action=="edit"&&$per_row['20_101']=="20_101") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> 
                  Print</td>
              </tr>
              
			  <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">To Admin</td>
                <td align="left"><input type="checkbox" name="20_2" value="20_2" id="20_2" <?php if( (isset($_POST['20_2'])&&$_POST['20_2']=="20_2") || ($action=="edit"&&$per_row['20_2']=="20_2") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Compose message</td>
                <td align="left">&nbsp;</td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
			  <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Sent Mails </td>
                <td align="left"><input type="checkbox" name="20_6" value="20_6" id="20_6" <?php if( (isset($_POST['20_6'])&&$_POST['20_6']=="20_6") || ($action=="edit"&&$per_row['20_6']=="20_6") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Delete</td>
                <td align="left"><input type="checkbox" name="20_102" value="20_102" id="20_102" <?php if( (isset($_POST['20_102'])&&$_POST['20_102']=="20_102") || ($action=="edit"&&$per_row['20_102']=="20_102") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> 
                  Print</td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
              <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">To Staff</td>
                <td align="left"><input type="checkbox" name="20_3" value="20_3" id="20_3" <?php if( (isset($_POST['20_3'])&&$_POST['20_3']=="20_3") || ($action=="edit"&&$per_row['20_3']=="20_3") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Compose message</td>
                <td align="left">&nbsp;</td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
              <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">To Students</td>
                <td align="left"><input type="checkbox" name="20_4" value="20_4" id="20_4" <?php if( (isset($_POST['20_4'])&&$_POST['20_4']=="20_4") || ($action=="edit"&&$per_row['20_4']=="20_4") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
           
                  Compose message</td>
                <td align="left">&nbsp;</td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
			  
			  <tr><td align="left" colspan="8">&nbsp;</td></tr>         
		     <?php } if (in_array('21_p', $top_level_permissions_admin) && in_array('21_p',$admin_permissions)){ ?>
              <tr class="even">
                <td align="left">21</td>
                <td align="left"><input type="checkbox" name="21_p" id="21_p" value="21_p" <?php if( (isset($_POST['21_p'])&&$_POST['21_p']=="21_p") || ($action=="edit"&&$per_row['21_p']=="21_p") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> onclick='javascript:chieldcatids("21_p", "21_1@21_2@21_3");' /></td>
                <td align="left">SMS</td>
                <td align="left">To Staff</td>
                <td align="left"><input type="checkbox" name="21_1" value="21_1" id="21_1" <?php if( (isset($_POST['21_1'])&&$_POST['21_1']=="21_1") || ($action=="edit"&&$per_row['21_1']=="21_1") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Send SMS</td>
                <td align="left">&nbsp;</td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
              <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">To Students</td>
                <td align="left"><input type="checkbox" name="21_2" value="21_2" id="21_2" <?php if( (isset($_POST['21_2'])&&$_POST['21_2']=="21_2") || ($action=="edit"&&$per_row['21_2']=="21_2") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Send SMS</td>
                <td align="left">&nbsp;</td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
              <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Enquiry List</td>
                <td align="left"><input type="checkbox" name="21_3" value="21_3" id="21_3" <?php if( (isset($_POST['21_3'])&&$_POST['21_3']=="21_3") || ($action=="edit"&&$per_row['21_3']=="21_3") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                <script type="text/javascript"> 
			chieldcatids("21_p", "21_1@21_2@21_3");
		</script>
                  Send SMS</td>
                <td align="left">&nbsp;</td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
			  <tr><td align="left" colspan="8">&nbsp;</td></tr>
				     <?php } if (in_array('22_p', $top_level_permissions_admin) && in_array('22_p',$admin_permissions) ){ ?>
              <tr class="even">
                <td align="left">22</td>
                <td align="left"><input type="checkbox" name="22_p" id="22_p" value="22_p" <?php if( (isset($_POST['22_p'])&&$_POST['22_p']=="22_p") || ($action=="edit"&&$per_row['22_p']=="22_p") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> onclick='javascript:chieldcatids("22_p", "22_1@22_2@22_3@22_4@22_5@22_6");' /></td>
                <td align="left">Send Notice</td>
                <td align="left">To Staff</td>
                <td align="left"><input type="checkbox" name="22_1" value="22_1" id="22_1" <?php if( (isset($_POST['22_1'])&&$_POST['22_1']=="22_1") || ($action=="edit"&&$per_row['22_1']=="22_1") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Send Notice</td>
                <td align="left">&nbsp;</td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
              <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">To Students</td>
                <td align="left"><input type="checkbox" name="22_2" value="22_2" id="22_2" <?php if( (isset($_POST['22_2'])&&$_POST['22_2']=="22_2") || ($action=="edit"&&$per_row['22_2']=="22_2") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Send Notice</td>
                <td align="left">&nbsp;</td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
              <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Received Replies</td>
                <td align="left"><input type="checkbox" name="22_3" value="22_3" id="22_3" <?php if( (isset($_POST['22_3'])&&$_POST['22_3']=="22_3") || ($action=="edit"&&$per_row['22_3']=="22_3") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                Delete</td>
                <td align="left"><input type="checkbox" name="22_5" value="22_5" id="22_5" <?php if( (isset($_POST['22_5'])&&$_POST['22_5']=="22_5") || ($action=="edit"&&$per_row['22_5']=="22_5") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> 
                  Print</td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
			  <tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">Sent Notices</td>
                <td align="left"><input type="checkbox" name="22_4" value="22_4" id="22_4" <?php if( (isset($_POST['22_4'])&&$_POST['22_4']=="22_4") || ($action=="edit"&&$per_row['22_4']=="22_4") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
               
                  Delete</td>
                <td align="left"><input type="checkbox" name="22_6" value="22_6" id="22_6" <?php if( (isset($_POST['22_6'])&&$_POST['22_6']=="22_6") || ($action=="edit"&&$per_row['22_6']=="22_6") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> 
                  Print <script type="text/javascript"> 
			chieldcatids("22_p", "22_1@22_2@22_3@22_4@22_5@22_6");
		</script></td>
                <td colspan="2" align="left">&nbsp;</td>
              </tr>
			  <tr><td align="left" colspan="8">&nbsp;</td></tr>
				     <?php }if (in_array('23_p', $top_level_permissions_admin) && in_array('23_p',$admin_permissions) ){ ?>
              <tr class="even">
                <td align="left">23</td>
                <td align="left"><input type="checkbox" name="23_p" id="23_p" value="23_p" <?php if( (isset($_POST['23_p'])&&$_POST['23_p']=="23_p") || ($action=="edit"&&$per_row['23_p']=="23_p") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /></td>
                <td align="left">Help Desk</td>
                <td align="left">&nbsp;</td>
                <td colspan="4" align="left">&nbsp;</td>
              </tr>
              <tr><td align="left" colspan="8">&nbsp;</td></tr>
				     <?php } if (in_array('24_p', $top_level_permissions_admin) && in_array('24_p',$admin_permissions) ){ ?>   
			 <tr class="even">
                <td align="left">24</td>
                <td align="left"><input type="checkbox" name="24_p" id="24_p" value="24_p" <?php if( (isset($_POST['24_p'])&&$_POST['24_p']=="24_p") || ($action=="edit"&&$per_row['24_p']=="24_p") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> onclick='javascript:chieldcatids("24_p", "24_1@24_2@24_3@24_4");' /></td>
                <td align="left">Todays Thought</td>
                <td align="left">&nbsp;</td>
                <td align="left"><input type="checkbox" name="24_1" value="24_1" id="24_1" <?php if( (isset($_POST['24_1'])&&$_POST['24_1']=="24_1") || ($action=="edit"&&$per_row['24_1']=="24_1") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Add</td>
                <td align="left"><input type="checkbox" name="24_2" value="24_2" id="24_2" <?php if( (isset($_POST['24_2'])&&$_POST['24_2']=="24_2") || ($action=="edit"&&$per_row['24_2']=="24_2") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Edit </td>
                <td align="left"><input type="checkbox" name="24_3" value="24_3" id="24_3" <?php if( (isset($_POST['24_3'])&&$_POST['24_3']=="24_3") || ($action=="edit"&&$per_row['24_3']=="24_3") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                
                  Delete </td>
				  <td align="left"><input type="checkbox" name="24_4" value="24_4" id="24_4" <?php if( (isset($_POST['24_4'])&&$_POST['24_4']=="24_4") || ($action=="edit"&&$per_row['24_4']=="24_4") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                <script type="text/javascript"> 
			chieldcatids("24_p", "24_1@24_2@24_3@24_4");
		</script>
                  Print </td>
			 </tr>
			 <tr><td align="left" colspan="8">&nbsp;</td></tr>
				   <?php } if (in_array('25_p', $top_level_permissions_admin) && in_array('25_p',$admin_permissions) ){ ?>
			<tr class="even">
                <td align="left">25</td>
                <td align="left"><input type="checkbox" name="25_p" id="25_p" value="25_p" <?php if( (isset($_POST['25_p'])&&$_POST['25_p']=="25_p") || ($action=="edit"&&$per_row['25_p']=="25_p") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> onclick='javascript:chieldcatids("25_p", "25_1@25_2@25_3@25_4@25_5@25_6@25_7@25_8");' /></td>
                <td align="left">Photo Album</td>
                <td align="left">Add Album</td>
                <td align="left"><input type="checkbox" name="25_1" value="25_1" id="25_1" <?php if( (isset($_POST['25_1'])&&$_POST['25_1']=="25_1") || ($action=="edit"&&$per_row['25_1']=="25_1") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Add </td>
                <td align="left"><input type="checkbox" name="25_2" value="25_2" id="25_2" <?php if( (isset($_POST['25_2'])&&$_POST['25_2']=="25_2") || ($action=="edit"&&$per_row['25_2']=="25_2") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Delete </td>
                <td align="left"><input type="checkbox" name="25_5" value="25_5" id="25_5" <?php if( (isset($_POST['25_5'])&&$_POST['25_5']=="25_5") || ($action=="edit"&&$per_row['25_5']=="25_5") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> View</td>
				<td align="left"><input type="checkbox" name="25_6" value="25_6" id="25_6" <?php if( (isset($_POST['25_6'])&&$_POST['25_6']=="25_6") || ($action=="edit"&&$per_row['25_6']=="25_6") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> Print</td>
			</tr>
			<tr class="even">
			  <td align="left">&nbsp;</td>
			  <td align="left">&nbsp;</td>
			  <td align="left">&nbsp;</td>
			  <td align="left">Add Photo</td>
			  <td align="left"><input type="checkbox" name="25_3" value="25_3" id="25_3" <?php if( (isset($_POST['25_3'])&&$_POST['25_3']=="25_3") || ($action=="edit"&&$per_row['25_3']=="25_3") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
			    Add </td>
			  <td align="left"><input type="checkbox" name="25_4" value="25_4" id="25_4" <?php if( (isset($_POST['25_4'])&&$_POST['25_4']=="25_4") || ($action=="edit"&&$per_row['25_4']=="25_4") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />              

			    Delete </td>
			  <td align="left"><input type="checkbox" name="25_7" value="25_7" id="25_7" <?php if( (isset($_POST['25_7'])&&$_POST['25_7']=="25_7") || ($action=="edit"&&$per_row['25_7']=="25_7") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> Print</td>
			  <td align="left"><input type="checkbox" name="25_8" value="25_8" id="25_8" <?php if( (isset($_POST['25_8'])&&$_POST['25_8']=="25_8") || ($action=="edit"&&$per_row['25_8']=="25_8") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> Individual Print<script type="text/javascript"> 
			chieldcatids("25_p", "25_1@25_2@25_3@25_4@25_5@25_6@25_7@25_8");
		</script></td>
			  </tr>
			  <tr><td align="left" colspan="8">&nbsp;</td></tr>   
				     <?php } if (in_array('26_p', $top_level_permissions_admin) && in_array('26_p',$admin_permissions) ){ ?>
			<tr class="even">
                <td align="left">26</td>
                <td align="left"><input type="checkbox" name="26_p" id="26_p" value="26_p" <?php if( (isset($_POST['26_p'])&&$_POST['26_p']=="26_p") || ($action=="edit"&&$per_row['26_p']=="26_p") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> onclick='javascript:chieldcatids("26_p", "26_1@26_2");' /></td>
                <td align="left">Videos</td>
                <td align="left">&nbsp;</td>
                <td align="left"><input type="checkbox" name="26_1" value="26_1" id="26_1" <?php if( (isset($_POST['26_1'])&&$_POST['26_1']=="26_1") || ($action=="edit"&&$per_row['26_1']=="26_1") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Add</td>
                <td align="left"><input type="checkbox" name="26_2" value="26_2" id="26_2" <?php if( (isset($_POST['26_2'])&&$_POST['26_2']=="26_2") || ($action=="edit"&&$per_row['26_2']=="26_2") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                <script type="text/javascript"> 
			chieldcatids("26_p", "26_1@26_2");
		</script>
                  Delete </td>
                <td colspan="2" align="left">&nbsp;</td>
			</tr>
			<tr><td align="left" colspan="8">&nbsp;</td></tr>    
				     <?php } if (in_array('27_p', $top_level_permissions_admin) && in_array('27_p',$admin_permissions) ){?>
			<tr class="even">
                <td align="left">27</td>
                <td align="left"><input type="checkbox" name="27_p" id="27_p" value="27_p" <?php if( (isset($_POST['27_p'])&&$_POST['27_p']=="27_p") || ($action=="edit"&&$per_row['27_p']=="27_p") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> onclick='javascript:chieldcatids("27_p", "27_1@27_2@27_3");' /></td>
                <td align="left">Holidays</td>
                <td align="left">&nbsp;</td>
                <td align="left"><input type="checkbox" name="27_1" value="27_1" id="27_1" <?php if( (isset($_POST['27_1'])&&$_POST['27_1']=="27_1") || ($action=="edit"&&$per_row['27_1']=="27_1") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Add Holidays</td>
                <td align="left"><input type="checkbox" name="27_2" value="27_2" id="27_2" <?php if( (isset($_POST['27_2'])&&$_POST['27_2']=="27_2") || ($action=="edit"&&$per_row['27_2']=="27_2") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                
                  Delete Holidays</td>
                <td colspan="2" align="left"><input type="checkbox" name="27_3" value="27_3" id="27_3" <?php if( (isset($_POST['27_3'])&&$_POST['27_3']=="27_3") || ($action=="edit"&&$per_row['27_3']=="27_3") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />Print<script type="text/javascript"> 
			chieldcatids("27_p", "27_1@27_2@27_3");
		</script></td>
			</tr>
			<tr><td align="left" colspan="8">&nbsp;</td></tr>   
				     <?php }if (in_array('28_p', $top_level_permissions_admin) && in_array('28_p',$admin_permissions)){ ?>
			<tr class="even">
                <td align="left">28</td>
                <td align="left"><input type="checkbox" name="28_p" id="28_p" value="28_p" <?php if( (isset($_POST['28_p'])&&$_POST['28_p']=="28_p") || ($action=="edit"&&$per_row['28_p']=="28_p") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> onclick='javascript:chieldcatids("28_p", "28_1@28_2@28_3@28_4@28_5");' /></td>
                <td align="left">Security</td>
                <td align="left">Visitors Record</td>
                <td align="left"><input type="checkbox" name="28_1" value="28_1" id="28_1" <?php if( (isset($_POST['28_1'])&&$_POST['28_1']=="28_1") || ($action=="edit"&&$per_row['28_1']=="28_1") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Add</td>
                <td align="left"><input type="checkbox" name="28_2" value="28_2" id="28_2" <?php if( (isset($_POST['28_2'])&&$_POST['28_2']=="28_2") || ($action=="edit"&&$per_row['28_2']=="28_2") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Edit</td>
                <td colspan="2" align="left"><input type="checkbox" name="28_3" value="28_3" id="28_3" <?php if( (isset($_POST['28_3'])&&$_POST['28_3']=="28_3") || ($action=="edit"&&$per_row['28_3']=="28_3") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                Delete </td>
			</tr> 
			<tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left"><input type="checkbox" name="28_4" value="28_4" id="28_4" <?php if( (isset($_POST['28_4'])&&$_POST['28_4']=="28_4") || ($action=="edit"&&$per_row['28_4']=="28_4") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  View</td>
                <td align="left"><input type="checkbox" name="28_5" value="28_5" id="28_5" <?php if( (isset($_POST['28_5'])&&$_POST['28_5']=="28_5") || ($action=="edit"&&$per_row['28_5']=="28_5") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Print
				  <script type="text/javascript"> 
			chieldcatids("28_p", "28_1@28_2@28_3@28_4@28_5");
		</script></td>
                <td colspan="2" align="left">&nbsp;</td>
			</tr>	   
			<tr><td align="left" colspan="8">&nbsp;</td></tr>   
				     <?php } if (in_array('29_p', $top_level_permissions_admin) && in_array('29_p',$admin_permissions) ){ ?>
			<tr class="even">
                <td align="left">29</td>
                <td align="left"><input type="checkbox" name="29_p" id="29_p" value="29_p" <?php if( (isset($_POST['29_p'])&&$_POST['29_p']=="29_p") || ($action=="edit"&&$per_row['29_p']=="29_p") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> onclick='javascript:chieldcatids("29_p", "29_1@29_2");' /></td>
                <td align="left">Backup</td>
                <td align="left">Export</td>
                <td colspan="4" align="left"><input type="checkbox" name="29_1" value="29_1" id="29_1" <?php if( (isset($_POST['29_1'])&&$_POST['29_1']=="29_1") || ($action=="edit"&&$per_row['29_1']=="29_1") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Exporting Database</td>
			</tr>
			<tr class="even">
			  <td align="left">&nbsp;</td>
			  <td align="left">&nbsp;</td>
			  <td align="left">&nbsp;</td>
			  <td align="left">Import</td>
			  <td colspan="4" align="left"><input type="checkbox" name="29_2" value="29_2" id="29_2" <?php if( (isset($_POST['29_2'])&&$_POST['29_2']=="29_2") || ($action=="edit"&&$per_row['29_2']=="29_2") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
              <script type="text/javascript"> 
			chieldcatids("29_p", "29_1@29_2");
		</script>
			    Importing Database</td>
			  </tr>
			  <tr><td align="left" colspan="8">&nbsp;</td></tr>     
				     <?php } if (in_array('30_p', $top_level_permissions_admin) && in_array('30_p',$admin_permissions) ){ ?>
			<tr class="even">
                <td align="left">30</td>
                <td align="left"><input type="checkbox" name="30_p" id="30_p" value="30_p" <?php if( (isset($_POST['30_p'])&&$_POST['30_p']=="30_p") || ($action=="edit"&&$per_row['30_p']=="30_p") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> onclick='javascript:chieldcatids("30_p", "30_1@30_2@30_3@30_4@30_5@30_6@30_7@30_8");' /></td>
                <td align="left">Knowledge Base</td>
                <td align="left">Create Category</td>
                <td align="left"><input type="checkbox" name="30_1" value="30_1" id="30_1" <?php if( (isset($_POST['30_1'])&&$_POST['30_1']=="30_1") || ($action=="edit"&&$per_row['30_1']=="30_1") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Add Category</td>
                <td align="left"><input type="checkbox" name="30_2" value="30_2" id="30_2" <?php if( (isset($_POST['30_2'])&&$_POST['30_2']=="30_2") || ($action=="edit"&&$per_row['30_2']=="30_2") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Edit Category</td>
                <td align="left" colspan="2"><input type="checkbox" name="30_3" value="30_3" id="30_3" <?php if( (isset($_POST['30_3'])&&$_POST['30_3']=="30_3") || ($action=="edit"&&$per_row['30_3']=="30_3") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />                
                  Delete Category</td>
				  
			</tr>
			<tr class="even">
			  <td align="left">&nbsp;</td>
			  <td align="left">&nbsp;</td>
			  <td align="left">&nbsp;</td>
			  <td align="left">&nbsp;</td>
			  <td align="left" colspan="2"><input type="checkbox" name="30_4" value="30_4" id="30_4" <?php if( (isset($_POST['30_4'])&&$_POST['30_4']=="30_4") || ($action=="edit"&&$per_row['30_4']=="30_4") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
			  Add Articles to Category</td>
			  <td align="left" colspan="2"><input type="checkbox" name="30_5" value="30_5" id="30_5" <?php if( (isset($_POST['30_5'])&&$_POST['30_5']=="30_5") || ($action=="edit"&&$per_row['30_5']=="30_5") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> View Category
			 </td>
			  
			</tr>
			<tr class="even">
			  <td align="left">&nbsp;</td>
			  <td align="left">&nbsp;</td>
			  <td align="left">&nbsp;</td>
			  <td align="left">&nbsp;</td>
			  <td align="left" ><input type="checkbox" name="30_6" value="30_6" id="30_6" <?php if( (isset($_POST['30_6'])&&$_POST['30_6']=="30_6") || ($action=="edit"&&$per_row['30_6']=="30_6") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />                
                  
			  Print Category</td>
			  <td align="left" ><input type="checkbox" name="30_7" value="30_7" id="30_7" <?php if( (isset($_POST['30_7'])&&$_POST['30_7']=="30_7") || ($action=="edit"&&$per_row['30_7']=="30_7") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> Print Article
			 </td>
		<td align="left" colspan="2" ><input type="checkbox" name="30_8" value="30_8" id="30_8" <?php if( (isset($_POST['30_8'])&&$_POST['30_8']=="30_8") || ($action=="edit"&&$per_row['30_8']=="30_8") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> Print Individual
			  <script type="text/javascript"> 
			chieldcatids("30_p", "30_1@30_2@30_3@30_4@30_5@30_6@30_7@30_8");
		</script></td>
			  
			</tr>
			<tr><td align="left" colspan="8">&nbsp;</td></tr>         
				     <?php } if (in_array('31_p', $top_level_permissions_admin) && in_array('31_p',$admin_permissions) ){?>
			<tr class="even">
                <td align="left">31</td>
                <td align="left"><input type="checkbox" name="31_p" id="31_p" value="31_p" <?php if( (isset($_POST['31_p'])&&$_POST['31_p']=="31_p") || ($action=="edit"&&$per_row['31_p']=="31_p") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> onclick='javascript:chieldcatids("31_p", "31_1@31_2@31_3@31_4@31_5");' /></td>
                <td align="left">Notice Board</td>
                <td align="left">&nbsp;</td>
                <td align="left"><input type="checkbox" name="31_1" value="31_1" id="31_1" <?php if( (isset($_POST['31_1'])&&$_POST['31_1']=="31_1") || ($action=="edit"&&$per_row['31_1']=="31_1") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Add </td>
                <td align="left"><input type="checkbox" name="31_2" value="31_2" id="31_2" <?php if( (isset($_POST['31_2'])&&$_POST['31_2']=="31_2") || ($action=="edit"&&$per_row['31_2']=="31_2") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Edit </td>
                <td colspan="2" align="left"><input type="checkbox" name="31_3" value="31_3" id="31_3" <?php if( (isset($_POST['31_3'])&&$_POST['31_3']=="31_3") || ($action=="edit"&&$per_row['31_3']=="31_3") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                                 Delete </td>
			</tr>
			<tr class="even">
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left">&nbsp;</td>
                <td align="left"><input type="checkbox" name="31_5" value="31_5" id="31_5" <?php if( (isset($_POST['31_5'])&&$_POST['31_5']=="31_5") || ($action=="edit"&&$per_row['31_5']=="31_5") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Print List </td>
                <td align="left"><input type="checkbox" name="31_4" value="31_4" id="31_4" <?php if( (isset($_POST['31_4'])&&$_POST['31_4']=="31_4") || ($action=="edit"&&$per_row['31_4']=="31_4") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Print Individual </td>
                <td colspan="2" align="left">
                <script type="text/javascript"> 
			chieldcatids("31_p", "31_1@31_2@31_3@31_4@31_5");
		</script>
                   </td>
			</tr>
			<tr><td align="left" colspan="8">&nbsp;</td></tr>
				     <?php } if (in_array('32_p', $top_level_permissions_admin) && in_array('32_p',$admin_permissions) ){ ?>
			          <tr class="even">
                <td align="left">32</td>
                <td align="left"><input type="checkbox" name="32_p" id="32_p" value="32_p" <?php if( (isset($_POST['32_p'])&&$_POST['32_p']=="32_p") || ($action=="edit"&&$per_row['32_p']=="32_p") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> onclick='javascript:chieldcatids("32_p", "32_1@32_2@32_3@32_4@32_5");' /></td>
                <td align="left">ID Card </td>
                <td align="left">ID image</td>
                <td align="left"><input type="checkbox" name="32_3" value="32_3" id="32_3" <?php if( (isset($_POST['32_3'])&&$_POST['32_3']=="32_3") || ($action=="edit"&&$per_row['32_3']=="32_3") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
Add</td>
                <td align="left">&nbsp;</td>
                <td colspan="2" align="left">&nbsp;</td>
                </tr>
				<tr class="even">
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="left">To Staff</td>
                <td align="left"><input type="checkbox" name="32_1" value="32_1" id="32_1" <?php if( (isset($_POST['32_1'])&&$_POST['32_1']=="32_1") || ($action=="edit"&&$per_row['32_1']=="32_1") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Id card generate</td>
                <td align="left"><input type="checkbox" name="32_4" value="32_4" id="32_4" <?php if( (isset($_POST['32_4'])&&$_POST['32_4']=="32_4") || ($action=="edit"&&$per_row['32_4']=="32_4") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> 
                  Print</td>
                <td colspan="2" align="left">&nbsp;</td>
                </tr>
			          <tr class="even">
			            <td align="left">&nbsp;</td>
			            <td align="left">&nbsp;</td>
			            <td align="left">&nbsp;</td>
			            <td align="left">To Students</td>
			            <td align="left"><input type="checkbox" name="32_2" value="32_2" id="32_2" <?php if( (isset($_POST['32_2'])&&$_POST['32_2']=="32_2") || ($action=="edit"&&$per_row['32_2']=="32_2") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                        Id card generate</td>
			            <td align="left"><input type="checkbox" name="32_5" value="32_5" id="32_5" <?php if( (isset($_POST['32_5'])&&$_POST['32_5']=="32_5") || ($action=="edit"&&$per_row['32_5']=="32_5") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> /> 
			              Print
						    <script type="text/javascript"> 
			chieldcatids("32_p", "32_1@32_2@32_3@32_4@32_5");
		</script></td>
			            <td colspan="2" align="left">&nbsp;</td>
                </tr>
				<tr><td align="left" colspan="8">&nbsp;</td></tr>
			          <?php /*?><tr><td colspan="7" align="left">&nbsp;</td></tr>	<?php */?>	                         
                     <?php } if (in_array('33_p', $top_level_permissions_admin) && in_array('33_p',$admin_permissions) ){ ?>
			          <tr class="even">
                <td align="left">33</td>
                <td align="left"><input type="checkbox" name="33_p" id="33_p" value="33_p" <?php if( (isset($_POST['33_p'])&&$_POST['33_p']=="33_p") || ($action=="edit"&&$per_row['33_p']=="33_p") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> onclick='javascript:chieldcatids("33_p", "33_1@33_2@33_3@33_4@33_5@33_6@33_7@33_8");' /></td>
                <td align="left">Back Office</td>
                <td align="left">Add Dispatch Group</td>
                <td align="left"><input type="checkbox" name="33_1" value="33_1" id="33_1" <?php if( (isset($_POST['33_1'])&&$_POST['33_1']=="33_1") || ($action=="edit"&&$per_row['33_1']=="33_1") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Add</td>
                <td align="left"><input type="checkbox" name="33_2" value="33_2" id="33_2" <?php if( (isset($_POST['33_2'])&&$_POST['33_2']=="33_2") || ($action=="edit"&&$per_row['33_2']=="33_2") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Edit </td>
                <td  align="left"><input type="checkbox" name="33_3" value="33_3" id="33_3" <?php if( (isset($_POST['33_3'])&&$_POST['33_3']=="33_3") || ($action=="edit"&&$per_row['33_3']=="33_3") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Delete</td>
				  <td  align="left"><input type="checkbox" name="33_8" value="33_8" id="33_8" <?php if( (isset($_POST['33_8'])&&$_POST['33_8']=="33_8") || ($action=="edit"&&$per_row['33_8']=="33_8") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Print</td>
                </tr>
			          <tr class="even">
			            <td align="left">&nbsp;</td>
			            <td align="left">&nbsp;</td>
			            <td align="left">&nbsp;</td>
			            <td align="left">Inward Dispatch Entry</td>
			            <td align="left"><input type="checkbox" name="33_4" value="33_4" id="33_4" <?php if( (isset($_POST['33_4'])&&$_POST['33_4']=="33_4") || ($action=="edit"&&$per_row['33_4']=="33_4") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
		                Add</td>
			            <td align="left">&nbsp;</td>
			            <td colspan="2" align="left">&nbsp;</td>
                </tr>
			          <tr class="even">
			            <td align="left">&nbsp;</td>
			            <td align="left">&nbsp;</td>
			            <td align="left">&nbsp;</td>
			            <td align="left">Outward Dispatch Entry</td>
			            <td align="left"><input type="checkbox" name="33_5" value="33_5" id="33_5" <?php if( (isset($_POST['33_5'])&&$_POST['33_5']=="33_5") || ($action=="edit"&&$per_row['33_5']=="33_5") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
		                Add </td>
			            <td align="left">&nbsp;</td>
			            <td colspan="2" align="left">&nbsp;</td>
                </tr>
			          <tr class="even">
			            <td align="left">&nbsp;</td>
			            <td align="left">&nbsp;</td>
			            <td align="left">&nbsp;</td>
			            <td align="left">Manage Letters 	Reply</td>
			            <td align="left"><input type="checkbox" name="33_6" value="33_6" id="33_6" <?php if( (isset($_POST['33_6'])&&$_POST['33_6']=="33_6") || ($action=="edit"&&$per_row['33_6']=="33_6") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
		                Edit </td>
			            <td align="left"><input type="checkbox" name="33_7" value="33_7" id="33_7" <?php if( (isset($_POST['33_7'])&&$_POST['33_7']=="33_7") || ($action=="edit"&&$per_row['33_7']=="33_7") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                        <script type="text/javascript"> 
			chieldcatids("33_p", "33_1@33_2@33_3@33_4@33_5@33_6@33_7@33_8");
		</script>
		                Delete</td>
			            <td colspan="2" align="left">&nbsp;</td>
                </tr>
				<tr><td align="left" colspan="8">&nbsp;</td></tr>
                    <?php }  ?>
					 
					 <?php if (in_array('34_p', $top_level_permissions_admin) && in_array('34_p',$admin_permissions) ){?>
			          <tr class="even">
                <td align="left">34</td>
                <td align="left"><input type="checkbox" name="34_p" id="34_p" value="34_p" <?php if( (isset($_POST['33_p'])&&$_POST['33_p']=="33_p") || ($action=="edit"&&$per_row['33_p']=="33_p") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> onclick='javascript:chieldcatids("34_p", "34_1@34_2");' /></td>
                <td align="left">Roll Management </td>
                <td align="left">&nbsp;</td>
                <td align="left"><input type="checkbox" name="34_1" value="34_1" id="34_1" <?php if( (isset($_POST['34_1'])&&$_POST['34_1']=="34_1") || ($action=="edit"&&$per_row['34_1']=="34_1") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                View</td>
                <td align="left"><input type="checkbox" name="34_2" value="34_2" id="34_2" <?php if( (isset($_POST['34_2'])&&$_POST['34_2']=="34_2") || ($action=="edit"&&$per_row['34_2']=="34_2") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Export
				  <script type="text/javascript"> 
			chieldcatids("34_p", "34_1@34_2");
		</script></td>
                <td colspan="2" align="left">&nbsp;</td>
                </tr>
				<tr><td align="left" colspan="8">&nbsp;</td></tr>
                
				     <?php }  ?>
					 <?php if (in_array('35_p', $top_level_permissions_admin) && in_array('35_p',$admin_permissions) ){?>
			          <tr class="even">
                <td align="left">35</td>
                <td align="left"><input type="checkbox" name="35_p" id="35_p" value="35_p" <?php if( (isset($_POST['35_p'])&&$_POST['35_p']=="35_p") || ($action=="edit"&&$per_row['35_p']=="35_p") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> onclick='javascript:chieldcatids("35_p", "35_1@35_2@35_3");' /></td>
                <td align="left">Helpful Links</td>
                <td align="left">Add New Link</td>
                <td align="left"><input type="checkbox" name="35_1" value="35_1" id="35_1" <?php if( (isset($_POST['35_1'])&&$_POST['35_1']=="35_1") || ($action=="edit"&&$per_row['35_1']=="35_1") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                Add</td>
                <td align="left"></td>
                <td colspan="2" align="left">&nbsp;</td>
                </tr>
				<tr class="even">
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left">View Links</td>
                <td align="left"><input type="checkbox" name="35_2" value="35_2" id="35_2" <?php if( (isset($_POST['35_2'])&&$_POST['35_2']=="35_2") || ($action=="edit"&&$per_row['35_2']=="35_2") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                Edit</td>
                <td align="left"><input type="checkbox" name="35_3" value="35_3" id="35_3" <?php if( (isset($_POST['35_3'])&&$_POST['35_3']=="35_3") || ($action=="edit"&&$per_row['35_3']=="35_3") || ($action=="addadmin"&&!isset($_POST['saveallowance'])) ){?>checked="checked"<?php }?> />
                  Delete
				  <script type="text/javascript"> 
			chieldcatids("35_p", "35_1@35_2@35_3");
		</script></td>
                <td colspan="2" align="left">&nbsp;</td>
                </tr>
				<tr><td align="left" colspan="8">&nbsp;</td></tr>
                
			  <?php } ?>
			
			
			</table></td>
		  </tr>
		  <tr class="even">
		    <td colspan="3" class="admin" align="center"><input type="submit" name="saveallowance" id="saveallowance" value="Submit" style="cursor:pointer" class="bgcolor_02" />&nbsp;<input type="reset" name="reset" value="Reset" class="bgcolor_02" style="cursor:pointer" />&nbsp;<input type="button" name="back" value="Back" onclick="javascript:history.back();" class="bgcolor_02" style="cursor:pointer" /></td>
	      </tr>
		  <tr>
		    <td colspan="3" class="admin" align="center">&nbsp;</td>
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
// Add Admin


	if($action=='print_adminlist'){
	$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_admins','Administration','Print','','Print','".$_SERVER['REMOTE_ADDR']."',NOW())";
     $log_insert_exe=mysql_query($log_insert_sql);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
	  <tr>
         <td height="3" colspan="3"></td>
	 </tr>
	  <tr>
		<td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Admin List</span></td>
	  </tr>
	  <tr>
		<td width="1" class="bgcolor_02"></td>
		<td  align="center" valign="top">
		<br />		
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr class="bgcolor_02" height="25">
			<td width="9%" align="left" class="admin">S&nbsp;No</td>
			<td width="18%" align="left" class="admin">Name</td>
			<td width="33%" align="left" class="admin">User&nbsp;Name<?php if(isset($_SESSION['eschools']['superadmin_email']) && $_SESSION['eschools']['superadmin_email']!=''){echo " - Password";}?> </td>
			<td width="22%" align="left" class="admin">Email&nbsp;ID</td>
			
		  </tr>
		  <?php 
			$rownum = $start+1;
			if(count($leavemaster_det)>0) {
			foreach ($leavemaster_det as $eachrecord){
			$zibracolor = ($rownum%2==0)?"even":"odd";
			?>	
		  <tr class="<?php echo $zibracolor;?>">
			<td align="left" class="narmal"><?php echo $rownum; ?></td>
			<td align="left" class="narmal"><?php echo $eachrecord->admin_fname." ".$eachrecord->admin_lname; ?></td>
			<td align="left" class="narmal"><?php echo $eachrecord->admin_username; if(isset($_SESSION['eschools']['superadmin_email']) && $_SESSION['eschools']['superadmin_email']!=''){echo " - ".$eachrecord->admin_password;} ?></td>
			<td align="left" class="narmal"><?php echo $eachrecord->admin_email; ?></td>
			
		  </tr>
		  <?php 
		  $rownum++;
		  } 
		   }  ?>
		   
			 
		  <tr>
		    <td colspan="5" align="center" class="narmal">&nbsp;</td>
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
<script type="text/javascript">
	function del_adminmaster(adminid){
	if(confirm("Are you sure you want to  delete ?")){
		document.location.href = '?pid=42&action=deleteadmin&lid='+adminid;
	}
	}
</script>
