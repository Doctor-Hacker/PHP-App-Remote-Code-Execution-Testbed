<?php 

/**
* Only Admin users can view the pages
*/

if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}

/**
*   View all Requirements
*/

	if ($action=='post_vacancy'){ 
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<script type="text/javascript">

			function fun(){
				if(document.staff.dc1.value=="" && document.staff.dc2.value==""){
					alert("Enter Start Date");
					//document.staff.dc1.focus();
					return false;
				}
				if(document.staff.dc2.value==""){
					alert("Enter End Date");
					//document.staff.dc1.focus();
					return false;
				}
				else
				{
				return true;
				}
			}
		</script>
	<tr>
         <td height="3" colspan="3"></td>
	 </tr>
    <tr>
		<td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;Post Vacancy </strong></td>
	</tr>
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="center" valign="top">		
		  <table width="100%" border="0" cellspacing="0" cellpadding="0">
		      <tr>
		      <td height="30" align="right" valign="top">		
		        <table width="100%">
	          <form name="staff" action="" method="post" >
		          <tr>
				    <td height="25" colspan="5" align="right" >
			               <font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font>	</td>
                    </tr> 
			      <tr>
				     <td colspan="2">
						 <table width="100%" border="0" cellspacing="0" cellpadding="0">
							  <tr>
								<td width="31%" class="narmal">Start&nbsp;Date:</td>
								<td width="29%"><input class="plain" name="dc1" value="<?php if (isset($dc1)) {
																													echo $dc1; } ?>" size="12" onFocus="this.blur()" readonly>	</td>
								<td width="10%"><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fStartPop(document.staff.dc1,document.staff.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt=""></a></td>
							    <td width="30%" align="left"><font color="#FF0000">&nbsp;*</font></td>
						   </tr>
						 </table> </td>
				   <td colspan="2">
				        <table width="83%" border="0" cellspacing="0" cellpadding="0">
						  <tr>
							<td width="33%" class="narmal">End&nbsp;Date:</td>
							<td width="24%"><input class="plain" name="dc2" value="<?php if (isset($dc2)) {
																													echo $dc2;} ?>" size="12" onFocus="this.blur()" readonly> </td>
							<td width="8%"><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fEndPop(document.staff.dc1,document.staff.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt=""></a></td>
						    <td width="35%" align="left"><font color="#FF0000">&nbsp;*</font></td>
						  </tr>
					    </table></td>
					<td width="350"><input type="submit" name="Search1" value="Search" class="bgcolor_02" style="cursor:pointer;"  onclick="return fun();"/></td>
		        </tr>
							
				<tr>
			      <td width="197">&nbsp;</td>
			      <td width="176" align="right">&nbsp;</td>
			      <td width="40" align="left">&nbsp;</td>
			      <td width="508">&nbsp;</td>
                  <?php if (in_array("9_1", $admin_permissions)) {?>
			      <td width="350"><input name="addnew" type="submit" class="bgcolor_02"  style="cursor:pointer;" value="Add Post" /></td>
                  <?php }?>
                                  </tr>
								
				<tr>
					<td colspan="10" align="center" class="narmal"></td>
				 </tr>
		      <?php if($no_rows =='0'){?>
                  <tr>
                    <td align="center" colspan="5" valign="top" class="narmal" ><?php if($_GET['updatesucess']=="*1" ) { echo "Updated Successfully"; }?> <?php if($_GET['insertsucess']=="*2" ) { echo "Inserted Successfully"; }?> <?php  if($nill!="") echo $nill; ?></td>
                  </tr>
				  <?php }?>
         </form>
        </table>
			<iframe width=132 height=142 name="gToday:contrast:agenda.js" id="gToday:contrast:agenda.js" src="<?php echo JS_PATH ?>/DateRange/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
			</iframe>
				</td>
                  </tr>
                  <tr >
                    <td align="left" valign="top" >
					<?php if($no_rows !='0'){
					
					?>
					     <table width="100%" border="1" align="center" cellpadding="1" cellspacing="0" class="tbl_grid">
									<tr class="bgcolor_02">
										<td width="8%"  height="25"align="center"  class="admin">S.No</td>
									  <td width="16%"  align="center" class="admin" >Department</td>
                                      <td  align="center" class="admin" colspan="2">Post</td>
											<!--<td width="11%"  align="center" class="admin">Qualification</td>
											<td width="11%"  align="center" class="admin">Experience</td>-->
									  <td  align="center" class="admin" colspan="2">Posted On</td>
									  <td width="16%"  align="center" class="admin">Positions</td>
									  <td width="16%"  align="center" class="admin">Action</td>
                           </tr>
                      					  
<?php	
	$rownum =1;
	if($nill=='') { 	 
	for ($i=0, $count = sizeof($es_enquiryList); $i<$count ; $i++) {
		$bagclass = ($rownum%2==0)?"even":"odd";
?>		
									 <tr class="<?php echo $bagclass;?>">
										<td align="center" class="narmal"><?php echo $rownum; ?></td>
										<td class="narmal" ><?php echo deptname($es_enquiryList[$i]->es_depatname); ?></td>
										<td class="narmal" colspan="2"><?php echo  postname($es_enquiryList[$i]->es_post); ?></td>
										<?php /*?><td align="center" class="narmal"><?php echo $es_enquiryList[$i]->es_qualification; ?></td>
										<td align="center" class="narmal"><?php echo $es_enquiryList[$i]->es_experience; ?></td><?php */?>
										<td class="narmal" align="center" colspan="2"><?php echo displaydate($es_enquiryList[$i]->es_date_posteddate); ?></td>
										<td class="narmal"align="center"><?php echo $es_enquiryList[$i]->es_noofpositions; ?></td>
										<td class="narmal" align="center">
                                        <?php if (in_array("9_19", $admin_permissions)) { ?>
                                        <a href="?pid=9&action=view_post_vacancy&sid=<?php echo $es_enquiryList[$i]->es_requirementId;?>"><img src="images/b_edit.png" width="16" height="16" border="0" /></a>&nbsp;
                                        <?php }else{ echo "-"; }?>                                       
                                        <?php if (in_array("9_17", $admin_permissions)) {?>
<a href="?pid=9&action=edit&sid=<?php echo $es_enquiryList[$i]->es_requirementId;?>"><img src="images/b_browse.png" width="16" height="16" border="0" /></a>&nbsp;
                                         <?php }?>
                                         <?php if (in_array("9_18", $admin_permissions)) {?>
<a href="?pid=9&action=delete&sid=<?php echo $es_enquiryList[$i]->es_requirementId;?>" onclick="return confirm('<?php echo SM_CONFIRM_DELETE_MESSAGE;?>');">
<img src="images/b_drop.png" width="16" height="16" border="0" /></a>

<?php }?>
										</td>
									</tr>
<?php $rownum++;					   
  }
?>
									  <tr>
										<td colspan="8" align="center"><?php paginateexte($start, $q_limit, $no_rows, "&action=post_vacancy&action1=search&column_name=".$orderby."&asds_order=".$asds_order) ?></td>
									  </tr>
<?php
}
?>
					  			  
					     </table>
					  
					  <?php }?> 
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
			
/**
*   ***********For Registration , View and Edit *****************
*/
			
	if($action=='registration' || $action=='view_post_vacancy' || $action=='edit' || $action=='view1'){
?>
	<script language="javascript">
	
		 function goto_URL(object) {
			  window.location.href = object.options[object.selectedIndex].value;
		}
		
	</script>
	
<table width="100%" border="0" cellspacing="0" cellpadding="0">
     <form action="" method="post" name="requirement">
	<tr>
         <td height="3" colspan="3"></td>
	 </tr>
    <tr>
		<td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;Post Vacancy </strong></td>
    </tr>
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td  align="left" valign="top">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr><td align="left" valign="top">&nbsp;</td></tr>
				<tr>                
					<td align="left" valign="top">
						<table width="100%" border="0" cellspacing="3" cellpadding="0">
							<tr><td width="1%" align="right" class="narmal">&nbsp;</td>
							  <td width="25%" align="left" class="narmal">Department Name</td>
								<td width="4%" align="center">:</td>
							    <td width="31%">
									<?php if($action=='' || $action=='registration' || $action=='view1') { 
									  if ($action=='view_post_vacancy') {
									  $result='view1';
									  } 
									  if($action=='view1') {
									      $result='view1';
										  } 
										  if($action=='registration'){
										  $result='registration';
										  } ?>
											<select name="txt_post"txt_deptname onchange="goto_URL(this.form.txt_post);" style="width:150px;">
										<option value="">-Select-</option>
										<?php foreach($getdeptlist as $eachrecord) { ?>
										<option value="?pid=9&action=<?php echo $result;  ?>&st_department=<?php echo $eachrecord[es_departmentsid];?>&sid=<?php echo $sid; ?>" <?php echo ($eachrecord[es_departmentsid]==$st_department)?"selected":""?>  ><?php echo $eachrecord[es_deptname];?></option>
										<?php } ?></select><?php 	if (isset($error_post)&&$error_post!=""){echo'<div class="error_message">' . $error_post . '</div>';	}?><?php }else if($action=='edit'){ echo deptname($es_enquiryList[0]->es_depatname); }?>
										<?php if($action=='view_post_vacancy' ){ ?>
										<input name="txt_post" type="text" size="20" value="<?php echo deptname($es_enquiryList[0]->es_depatname); ?>" readonly/>
										<?php } ?>
										<?php if($action=='' || $action=='registration' || $action=='view1' ){ ?>
										<font color="#FF0000"><b>*</b></font>
										<?php } ?>								  </td>
								<td width="39%">&nbsp;</td></tr>													
							<tr>
								<td align="right" class="narmal">&nbsp;</td>
								<td align="left" class="narmal">Post</td>
								<td align="center">:</td>
							  <td>
								<?php if($action=='' || $action=='registration'|| $action=='view1') { ?>	
								<select name="txt_deptname" style="width:150px;">
												<?php if($action == 'edit') { ?>
									<option value="<?php  echo $eachrecord->es_post;?>" selected="selected"><?php echo ($eachrecord->es_post);?></option> <?php } ?>						
									<option value="" >-Select-</option>
                                  <?php if(count($es_postList) > 0 ){
									 foreach ($es_postList as $eachrecord){ ?>
                                  <option value="<?php echo $eachrecord->es_deptpostsId;?>" <?php echo ($eachrecord->es_deptpostsId==$st_postaplied)?"selected":""?>  ><?php echo $eachrecord->es_postname;?></option>
                                  <?php    } }?>
                               </select>
									<?php 	if (isset($error_deptname)&&$error_deptname!=""){echo 
									'<div class="error_message">' . $error_deptname . '</div>';	}?><?php }else if($action=='edit'){ echo postname($es_enquiryList[0]->es_post); }?>
								<?php  ?>
								<?php if($action=='view_post_vacancy' ){ ?>
								<input name="txt_deptname" type="text" size="20" value="<?php echo postname($es_enquiryList[0]->es_post); ?>" readonly/>
								<?php } ?>	
								<?php if($action=='' || $action=='registration' || $action=='view1'){ ?>
								<font color="#FF0000"><b>*</b></font>
								<?php }?>							 </td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td align="right" class="narmal">&nbsp;</td>
								<td align="left" class="narmal">Qualification</td>
								<td align="center">:</td>
								<td>
								<?php if($action=='view_post_vacancy' || $action=='registration' ||$action=='view1') { ?>	
								<input type="text" name="txt_qulification" id="txt_qulification" value="<?php echo $es_enquiryList[0]->es_qualification; ?><?php if (isset($txt_qulification)&&$txt_qulification !="" ){echo $_POST['txt_qulification'];}else{	echo "";}  ?>"/><?php 	if (isset($error_qulification)&&$error_qulification!=""){echo '<div class="error_message">' . $error_qulification . '</div>';	}?><?php }else{ echo $es_enquiryList[0]->es_qualification; }?></td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td align="right" class="narmal">&nbsp;</td>
								<td align="left" class="narmal">Experience</td>
								<td align="center">:</td>
								<td>
								
<?php if($action=='view_post_vacancy' || $action=='registration' ||$action=='view1') { ?>
								
								<input type="text" name="txt_experience" id="txt_experience" value="<?php echo $es_enquiryList[0]->es_experience; ?><?php if (isset($txt_experience)&&$txt_experience !="" ){echo $_POST['txt_experience'];}else{	echo "";}  ?>"><?php 	if (isset($error_experience)&&$error_experience!=""){echo '<div class="error_message">' . $error_experience . '</div>';	}?><?php }else{ echo $es_enquiryList[0]->es_experience; }?></td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td align="right" class="narmal">&nbsp;&nbsp; </td>
								<td align="left" class="narmal">Posting Date</td>
								<td align="center">:</td>
								<td>
<?php if($action=='view_post_vacancy' || $action=='registration' ||$action=='view1') { ?>

							<table width="29%" border="0" cellspacing="0" cellpadding="0">
							   <tr>
								  <td width="17%"><input type="text" name="txt_postingdate" id="txt_postingdate" value="<?php if (isset($es_enquiryList[0]->es_date_posteddate)) {echo formatDBDateTOCalender($es_enquiryList[0]->es_date_posteddate); } if (isset($txt_postingdate) && $txt_postingdate !="" ){echo $_POST['txt_postingdate'];}  ?>"  onchange="return registrationvalid()" readonly /></td>
								  <td width="83%"><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.requirement.txt_postingdate);return false;" ><img name="popcal" align="absmiddle" src="<?php echo JS_PATH ?>/WeekPicker/calbtn.gif" width="34" height="22" border="0" alt=""></a></td>
                                </tr>
                             </table>
								<iframe width=199 height=178 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="<?php echo JS_PATH ?>/WeekPicker/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">								</iframe><?php 	if (isset($error_dtae)&&$error_dtae!=""){echo '<div class="error_message">' . $error_dtae . '</div>';	}?><?php }else{ echo displaydate ($es_enquiryList[0]->es_date_posteddate); }?></td></tr>
                               <tr>
								<td align="right" class="narmal">&nbsp;&nbsp; </td>
								<td align="left" class="narmal">No of Positions</td>
								<td align="center">:</td>
								<td>
<?php if($action=='view_post_vacancy' || $action=='registration' ||$action=='view1') { ?>
								<input type="text" name="txt_nopos" id="txt_nopos" value="<?php echo $es_enquiryList[0]->es_noofpositions; ?><?php if (isset($txt_nopos)&&$txt_nopos !="" ){echo $_POST['txt_nopos'];}else{	echo "";}  ?>" /><?php 	if (isset($error_nopos)&&$error_nopos!=""){echo '<div class="error_message">' . $error_nopos . '</div>';	}?><?php }else{ echo $es_enquiryList[0]->es_noofpositions; }?></td>
								<td>&nbsp;</td>
							</tr>							
							<tr>
								<td align="right" class="narmal">&nbsp;</td>
								<td align="left" class="narmal">&nbsp;</td>
								<td align="center">&nbsp;</td>
								<td><?php if($action=="registration" ){?><input name="submit" type="submit" class="bgcolor_02" value="Submit" style="cursor:pointer;"/><?php } else if($action=="view_post_vacancy" || $action=='view1') {?> <input name="update1" type="submit" class="bgcolor_02" value="update" style="cursor:pointer;" /><?php }?> <input type="submit" name="back1" id="back1" value="back"  onClick="history.go(-1)" class="bgcolor_02" style="cursor:pointer;"/></td>
								<td>&nbsp;</td>
							</tr>
						</table>
				  </td>
				</tr>
				<tr><td align="left" valign="top">&nbsp;</td></tr>
			</table>
	  </td>
		<td width="1" class="bgcolor_02"></td>
	</tr>
	<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>
</form>
</table>

<?php
}

/**
*   ***********End of Registration , View and Edit *****************
*/

if ($action=='list_classifieds'){ 

/**
*   *********** View all Requirements **************
*/

?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;Classifieds </strong></td>
              </tr>
			  
             <tr>
                <td width="1" class="bgcolor_02"></td>
                <td  align="left" valign="top">
				
				<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                   
                   	<tr>
                    <td height="30" align="right" valign="top">
			<script type="text/javascript">

					function fun()
					{ 
						 if(document.staff.dc1.value==""){
							alert("Enter Start Date");		
							return false;
						}
						if(document.staff.dc2.value==""){
							alert("Enter End Date");		
							return false;
						}
						else
						{
						return true;
						}	   
					}
	 		</script>	
					<form name="staff" action="" method="post" >
					  <table width="100%">
					  <tr>
				         <td height="25" align="right" colspan="2">
			               <font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font>	</td>
                      </tr> 
						<tr>
					  <td width="40%" align="left"><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
  								<tr>
								<td width="13%">Start&nbsp;Date:</td>
								<td width="12%"><input class="plain" name="dc1"  size="12" onFocus="this.blur()" readonly value="<?php if(isset($dc1)&&$dc1!='') echo $dc1; ?>"></td>
								<td width="75%"><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fStartPop(document.staff.dc1,document.staff.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt=""></a>&nbsp;<font color="#FF0000">*</font></td>
							  </tr>
							</table></td>
							  
					    <td width="60%"><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
							  <tr>
								<td width="14%">End&nbsp;Date:</td>
								<td width="12%"><input class="plain" name="dc2"  size="12" onFocus="this.blur()" readonly value="<?php if(isset($dc2)&&$dc2!='') echo $dc2; ?>"></td>
								<td width="14%"><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fEndPop(document.staff.dc1,document.staff.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt=""></a>&nbsp;<font color="#FF0000">*</font>
								<iframe width=132 height=142 name="gToday:contrast:agenda.js" id="gToday:contrast:agenda.js" src="<?php echo JS_PATH ?>/DateRange/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe>								</td>
							    <td width="60%" align="right">
						        <input type="submit" name="Search" value="Search" class="bgcolor_02" OnClick="return fun();" style="cursor:pointer;"/> </td>
							  </tr>
							</table></td>
						</tr>
							<tr>
							  <td colspan="2" align="right"></td>
							  <td width="0%"></td>							  
				        </tr>
							<tr>
                            <?php if (in_array("9_2", $admin_permissions)) {?>
							  <td colspan="2" align="right"><input name="addclassified" type="submit" class="bgcolor_02" value="Add Classified" style="cursor:pointer;" /></td>
                              <?php }else{ echo "-"; }?>
							  
					    </tr>
						<tr>
							  <td colspan="2" align="right"></td>
							  <td></td>							  
					       </tr>
						   <?php if($no_rows =='0'){?>
						   <tr>
                    <td align="center" colspan="3" valign="top" class="narmal" ><?php if($_GET['updatesucess']=="*1" ) { echo "Updated Successfully"; }?> <?php if($_GET['insertsucess']=="*2" ) { echo "Inserted Successfully"; }?> <?php  if($nill!="") echo $nill; ?>					</td>
                  </tr>
				  <?php }?>							
				     </table>				  
		             </form>
				</td>
                  </tr>
					<tr>
						<td align="left" valign="top">
						
						<?php if($no_rows !='0'){?>
						<table width="100%" border="1" cellspacing="0" cellpadding="1" class="tbl_grid" align="center">
						  <tr class="bgcolor_02">
							<td width="5%" class="admin" align="center">S.No</td>
							<td width="20%" class="admin" align="center">Name</td>
							<td width="25%" class="admin" align="center">Type Of Ad</td>
							<td width="17%" class="admin" align="center">Posted Date</td>
							 <td width="16%" class="admin" align="center">Email</td>
							<td width="16%" class="admin" align="center">Action</td>
						  </tr>
				   <?php 
					$rownum = 1;	
					foreach ($es_clsifiedsList as $eachrecord){
					$zibracolor = ($rownum%2==0)?"even":"odd";
				   ?>
						 
					<tr class="<?php echo $zibracolor;?>" >
							<td align="center" class="narmal"><?php echo $rownum ; ?></td>
							<td align="center" class="narmal"><?php echo $eachrecord->cfs_name; ?></td>
							<td align="center" class="narmal"><?php echo $eachrecord->cfs_modeofadds; ?></td>
							<td align="center" class="narmal"><?php if($eachrecord->cfs_posteddate!=""){echo displaydate($eachrecord->cfs_posteddate); }?></td>
							<td align="center" class="narmal">
							<a href="javascript:void(0)" onclick="window.open('templates/sendaemail.php?sid=<?php echo $eachrecord->es_classifiedsId; ?>&action=mail','windowname1','width=630, height=400,scrollbars=yes'); return false;">Email</a></td>
							<td align="center" class="narmal"><?php if (in_array("9_20", $admin_permissions)) {?>
<a href=" ?pid=9&action=edit_classifieds&sid=<?php echo $eachrecord->es_classifiedsId;?>">
							<img src="images/b_edit.png" width="16" height="16" border="0" /></a>&nbsp;<?php }else{ echo "-"; }?><?php if (in_array("9_21", $admin_permissions)) {?><a href=" ?pid=9&action=view_classifieds&sid=<?php echo $eachrecord->es_classifiedsId;?>"><img src="images/b_browse.png" width="16" height="16" border="0" /></a>&nbsp;<?php }?><?php if (in_array("9_22", $admin_permissions)) {?>
<a href=" ?pid=9&action=delete_classifieds&sid=<?php echo $eachrecord->es_classifiedsId;?>" onclick="return confirm('<?php echo SM_CONFIRM_DELETE_MESSAGE;?>');"><img src="images/b_drop.png" width="16" height="16" border="0" /></a><?php }?>
					      </td>
						  
					</tr>
						  
					<?php
					$rownum++;
					}?>	  
						</table>
						
						<?php
						}
						?>
						
						</td>
				  </tr>
				  
					<tr>
						<td colspan="3" align="center">
							<?php paginateexte($start, $q_limit, $no_rows, "&action=list_classifieds&action1=search&column_name=".$orderby."&asds_order=".$asds_order) ?>
						</td>
				  </tr>		  
				    <tr>
                    <td align="left" valign="top">&nbsp;</td>
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

<?php

/**
*   ***********For Classifieds Registration , View and Edit *****************
*/
 
if($action=='classifieds_registration' || $action=='view_classifieds' || $action=='edit_classifieds' || $action=='mail'){

?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <form action="" method="post" name="classifieds">
	 
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp; Classified</strong></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td  align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="left" valign="top">&nbsp;</td>
                  </tr>
                  
                  <tr>
                    <td align="left" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="3" >
<?php
	 if ($action=='view_classifieds' || $action=='edit_classifieds' || $action=='mail') {
	     foreach ($es_clsifiedsList1 as $eachrecord1){
			 $name=$eachrecord1->cfs_name;
			 $moade=$eachrecord1->cfs_modeofadds;
			 $dateof=$eachrecord1->cfs_posteddate;
			 $desc=$eachrecord1->cfs_details;
	  	}
	 }
?>               <?php if( $action!='view_classifieds') { ?>
                <tr>
				    <td height="25" colspan="5" align="right" >
                           <font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font>
                    </td>
                </tr>
				<?php } ?>
				
					  <tr>
                        <td width="1%" align="right" class="naramal">&nbsp;</td>
                        <td width="24%" align="left" class="naramal">Name</td>
                        <td width="0%" align="center">:</td>
                        <td width="41%">
<?php if($action=='edit_classifieds' || $action=='classifieds_registration') { ?>		
						<input type="text" name="cfs_name" id="cfs_name" value="<?php if(isset($name) && $cfs_name==""){echo  $name; }?><?php if (isset($cfs_name)&& $cfs_name !="" ){echo $_POST['cfs_name'];}
						else{	echo "";}  ?>"  /><font color="#FF0000"><b>*</b></font>
						 <?php if (isset($ecfs_name)&&$ecfs_name!=""){echo '<div class="error_message">' . $ecfs_name . '</div>';	}?><?php }else{ echo  $name; }?></td>
                        <td width="34%">&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="right" class="naramal">&nbsp;</td>
                        <td align="left" class="naramal">Type&nbsp;Of&nbsp;Ad</td>
                        <td align="center">:</td>
						<td>
						<?php if($action=='edit_classifieds' || $action=='classifieds_registration') { ?>	
                        <input type="text" name="cfs_modeofads" id="cfs_modeofads" value="<?php if(isset($moade) && $cfs_modeofads==""){echo $moade; }?><?php if (isset($cfs_modeofads)&&$cfs_modeofads !="" ){echo $_POST['cfs_modeofads'];}else{	echo "";}  ?>" /><font color="#FF0000"><b>*</b></font>
						<?php if (isset($ecfs_modeofads)&&$ecfs_modeofads!=""){echo '<div class="error_message">' . $ecfs_modeofads . '</div>';	}?><?php }else{ echo $moade; }?></td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="right" class="naramal">&nbsp;</td>
                        <td align="left" class="naramal">Posted&nbsp;Date</td>
                        <td align="center">:</td>
                        <td>
	           			<?php if($action=='edit_classifieds' || $action=='classifieds_registration') { ?>	
						<table width="29%" border="0" cellspacing="0" cellpadding="0"><tr>
						<td width="17%"><input type="text" name="cfs_poteddate" id="cfs_poteddate" onchange="return registrationvalid()" readonly="" value="<?php if (isset($dateof) && $cfs_poteddate=="" ) { echo  formatDBDateTOCalender($dateof); } if (isset($cfs_poteddate)&&$cfs_poteddate !="" ){echo $_POST['cfs_poteddate'];}else{echo "";}  ?>"/></td>
						
					 <td width="83%"><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.classifieds.cfs_poteddate);return false;" ><img name="popcal" align="absmiddle" src="<?php echo JS_PATH ?>/WeekPicker/calbtn.gif" width="34"	height="22" border="0" alt=""></a></td>
                   </tr>				   
                </table>
						<iframe width=199 height=178 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="<?php echo JS_PATH ?>/WeekPicker/ipopeng.htm"     	scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">						</iframe><?php if (isset($ecfs_poteddate)&&$ecfs_poteddate!=""){echo '<div class="error_message">' . $ecfs_poteddate . '</div>';	}?><?php }else{ echo displaydate($dateof); }?></td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="right" valign="top" class="naramal">&nbsp;</td>
                        <td align="left" valign="top" class="naramal">Details</td>
                        <td align="center" valign="top">:</td>
                        <td><?php 
							
							if ($action=='edit_classifieds' || $action=='classifieds_registration') { 
								echo htmlEditor( $sName = 'blogDesc', $iH = '300', $iW = '450', $desc );
						?>
                        <?php //echo  $desc; ?></textarea>
						<?php if (isset($ecfs_desc)&& $ecfs_desc!=""){echo '<div class="error_message">' . $ecfs_desc . '</div>';	}?><?php }else{ echo  $desc; }?></td>
						<td>&nbsp;</td>
                      </tr>
					   <tr>
                        <td colspan="2" align="right" class="naramal">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                       <td><?php if($action=="classifieds_registration" ){?><input name="submit" type="submit" class="bgcolor_02" value="Submit" style="cursor:pointer;"/><?php } else if($action=="edit_classifieds" ) {?> <input name="update" type="submit" class="bgcolor_02" value="update" style="cursor:pointer;" /><?php }?> <input type="submit" name="back" id="back" value="back"  onClick="history.go(-1)" class="bgcolor_02" style="cursor:pointer;"/></td>
                        <td>&nbsp;</td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">&nbsp;</td>
                  </tr>
                </table>
				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
            </tr>
	  </form>	
</table>
<?php
}
?>		
	