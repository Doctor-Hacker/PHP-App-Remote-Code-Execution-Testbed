<?php 
/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}

//if ($action=='addassignment') { ?>
<script type="text/javascript">
function popup(url) {
		 var width  = 430;
		 var height = 200;
		 var left   = (screen.width  - width)/2;
		 var top    = (screen.height - height)/2;
		 var params = 'width='+width+', height='+height;
		 params += ', top='+top+', left='+left;
		 params += ', directories=no';
		 params += ', location=no';
		 params += ', menubar=no';
		 params += ', resizable=no';
		 params += ', scrollbars=no';
		 params += ', status=no';
		 params += ', toolbar=no';
		 newwin=window.open(url,'windowname5', params);
		 if (window.focus) {
			 newwin.focus()
		 }
	 return false;
}
</script>
<script type="text/javascript">
function newWindowOpen(href)
{
    window.open(href,null, 'width=700,height=400,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');
}
</script>
<?php if($action=='addassignment' || $action=='edit'){

?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<form method="POST" name="addassignment_form" action="" enctype="multipart/form-data">
	<tr>
         <td height="3" colspan="3"></td>
	 </tr>
	<tr>
		<td height="25" colspan="3" class="bgcolor_02">
			<table width="100%" height="25" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td class="admin">&nbsp;&nbsp; Assignment</td>
	  			</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td width="595" align="left" valign="top">
		
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr><td align="right" valign="top">&nbsp;</td></tr>
				<tr><td align="right" valign="top"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font>
			          <br /><br /></td></tr>
			    <tr>
 			        <td align="left" valign="middle">
			               <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                   <td width="436" height="25" align="left" valign="middle" class="narmal">&nbsp;Select Class</td>
                                <td width="16" align="left" valign="middle">:</td>
                           <td width="580" height="25" align="left" valign="middle"><?php if($action=='addassignment'){ ?>
				     <select name="as_class" onchange="JavaScript:document.addassignment_form.submit();" >
									   <option value="">-Select-</option>
									   <?php foreach($getclasslist as $eachrecord) { ?>
									   <option value="<?php echo $eachrecord[es_classesid];?>" <?php echo ($eachrecord[es_classesid]==	$as_class)?                                       "selected":""?>  ><?php echo $eachrecord[es_classname];?></option><?php } ?>
									   </select>
									   <?php }?>
									   <?php if($action=='edit'){ ?>
		            <input name="as_class" type="text" id="as_class" value="<?php echo classname($es_assignmentlist[0]->as_class); ?>" readonly/> 
									   <?php }?>
									   &nbsp;<span class="narmal">
									   <?php if (isset($error)&&$error!=""){echo '<div class="error_message">' . $error_class. '</div>';}?>
									   <?php if($action=='addassignment'){ ?>
									   <font color="#FF0000"><b>*</b></font>
									   <?php } ?></span>
								</td>
				                <td width="53" align="left" valign="top" class="narmal">&nbsp;</td>
					  	        <td width="210" align="left" valign="top">&nbsp;</td>
                                   
                             </tr>
							  <tr align="left" valign="middle">
							       <td width="436" height="25" class="narmal">&nbsp;Marks</td>
						        <td>:</td>
							       <td class="narmal">
							        <input type="text" name="as_marks" id="as_marks" size="5" value="<?php if($action == 'edit')
									   {echo ($es_assignmentlist[0]->as_marks);} else {  if(isset($Submit)&& $Submit=='Submit') { echo $as_marks;}}                                        ?>" />
							        <font color="#FF0000"><strong>*</strong></font></td>
							  <td colspan="2"></td>
							</tr>
							 
							  <tr align="left" valign="middle">
							       <td width="436" height="25" class="narmal">&nbsp;Subject </td>
						        <td>:</td>
							       <td><?php if($action=='addassignment'){ ?>
					                    <select name="as_suject" >
                                        <option value="" >Select</option>
						                <?php if(count($es_subjectList) > 0 ){
					                    foreach ($es_subjectList as $eachrecord){ ?>
					                    <option value="<?php echo $eachrecord->es_subjectId;?>" <?php echo ($eachrecord->es_subjectId==$as_suject)                                        ?"selected":""?> ><?php echo $eachrecord->es_subjectname;?></option>
					                    <?php    } }?>
										
						                
                                        </select>
										<?php }?>
										<?php if($action=='edit'){ ?>
		  <input name="as_suject" type="text" id="as_suject" value="<?php echo subjectname($es_assignmentlist[0]->as_suject); ?>" readonly/> 
									   <?php }?>
									   <?php if($action=='addassignment'){ ?>	
									   <span class="narmal"><font color="#FF0000"><b>*</b></font></span>
					                   <?php } ?>
				                </td>
								<td colspan="2"></td>
							</tr>
							
							<tr align="left" valign="middle">
							       <td width="436" height="25" class="narmal">&nbsp;Assignment </td>
					          <td>:</td>
							       <td>
							         <input name="as_name" type="text" id="as_name" 
								   value="<?php if($action == 'edit'){echo $es_assignmentlist[0]->as_name; } 
								   else {  
								   if((isset($Submit)&& $Submit=='Submit')||(isset($update)&& $update=='update')) 
								   {echo $as_name;
								   }} ?>" />
                                   <span class="narmal"><font color="#FF0000"><b>*</b></font></span>
						      </td>
							  <td colspan="2"></td>
							</tr>
							
							
							<tr align="left" valign="middle">
							     <td  height="25"class="narmal">&nbsp;Submission Date</td>
							     <td>:</td>
							     <td>
								        <table width="100%" border="0" cellspacing="0" cellpadding="0">
							                <tr>
                                                <td  align="left"><table width="100%" border="0"><tr>
												<?php if ($action=="addassignment"){?>
    <td width="23%" align="left" valign="middle"><input name="as_lastdate"  value="<?php if(isset($Submit)&& $Submit=='Submit') { echo  $as_lastdate;}?>" size="14" /> </td><?php } ?>
	
	<?php if ($action=="edit"){?><td width="24%" align="left" valign="middle">
    <input name="as_lastdate"  id="as_lastdate" class="plain" size="15" 
							                         value="<?php echo formatDBDateTOCalender($es_assignmentlist[0]->as_lastdate); ?>" readonly /> </td>
													 <?php } ?>
                        <td width="10%" align="left" valign="middle" class="narmal">
                        	<a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.addassignment_form.as_lastdate);return false;" ><img name="popcal" align="absmiddle" src="<?php echo JS_PATH ?>/DateTime/calbtn.gif" width="34" height="22" border="0" alt="" /></a>
                            <iframe width=188 height=166 name="gToday:datetime:agenda.js:gfPop:plugins_time.js" id="gToday:datetime:agenda.js:gfPop:plugins_time.js" src="<?php echo JS_PATH ?>/DateTime/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe>
                            
                            </td>
<td width="43%" align="left" valign="middle"><span class="narmal"><font color="#FF0000"><b>*</b></font></span></td>
  </tr>
  
</table>   </td><td width="43%" valign="middle"><?php if (isset($error)&&$error!=""){echo '<div class="error_message">' .                                                                  $error_date. '</div>';	}?>
                                                                  
												   </td>
                                          </tr>
		                           </table>
                              </td>
							  <td colspan="2"></td>
                             </tr>
							
   			                 <tr align="left" valign="middle">
								  <td width="436" height="25"class="narmal">&nbsp;Upload Document</td>
							   <td>:</td>
								  <td width="580"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
								  <td width="38%"><input name="txt_file" type="file" id="txt_file" />
							    </td>
								  <td width="62%" class="narmal"><input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
								    <font color="#FF0000"><b>&nbsp;*</b></font>
							    <input type="hidden" name="prev" value="<?php echo $es_assignmentlist[0]->as_description; ?>" /></td>
                                 </tr>
                              </table>
                     </td>
					 <td colspan="2"></td>
                </tr>
              </table>
		          </td>
		        </tr>
				<tr>
                    <td align="left" valign="top">
						<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
							<tr>
								<td></td>
								<td align="left" valign="top"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :</font>  Please do not upload .docx files
			        </td></tr>
							 <tr>
							     <td colspan="2" align="left" valign="top">&nbsp;</td>
							 </tr>
                             <tr>
                                 <td width="28%" height="25" align="center" valign="top">&nbsp;</td>
                                 <td width="72%" align="left" valign="top">
									<?php if ($action=="edit"){?>
									<?php if(in_array('7_2',$admin_permissions)){?><input name="update" type="submit" class="bgcolor_02" value="update" style="cursor:pointer;"/><?php }?>
									
									
									
									<?php } 
									if ($action=="addassignment"){?>
									
									
									<?php if(in_array('7_1',$admin_permissions)){?><input name="Submit" type="submit" class="bgcolor_02" value="Submit" style="cursor:pointer;"/><?php }?>
									   &nbsp;&nbsp;
									   
									   
									   
									<?php }?>
									
                                 </td>
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
  </form>
</table>
<?php 
				  }
/**
* Fetching all Assignments
*/	
if($action=='view' || $action=='delete'){		
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0"  >
	<tr><td height="6" align="left" valign="top" colspan="3"></td></tr>
	<tr class="bgcolor_02">
	<td height="25" colspan="3" class="admin">&nbsp;&nbsp;View Assignment</td></tr>
	<tr>
		<td align="center" valign="middle" colspan="3">
			<form action="?pid=4&action=view" method="post" name="viewassignment">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tbl_grid">
		    
			<tr><td height="25" colspan="9" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font></td>
			</tr>
			<tr>
				<td width="148" align="left" valign="middle" class="narmal">&nbsp;Select&nbsp;Class</td>
				<td width="21" align="left" valign="top">&nbsp;</td>
				<td width="201" height="25" align="left" valign="top"><select name="as_class">
					<option value="">-Select-</option>
					<?php foreach($getclasslist as $eachrecord) { ?>
					<option value="<?php echo $eachrecord[es_classesid];?>" <?php echo ($eachrecord[es_classesid]==	$as_class)?"selected":""?>  >                    <?php echo $eachrecord[es_classname];?></option>
					<?php } ?>
					</select><font color="#FF0000"><b>*</b></font>				</td>
				<td width="21" align="left" valign="top">&nbsp;</td>
				<td class="narmal" colspan="2" align="right" valign="top">
				   <select name="pre_year">
                   <?php 
				   foreach($school_details_res as $each_record) { ?>
                   <option value="<?php echo $each_record['es_finance_masterid']; ?>" <?php if($each_record['es_finance_masterid']==$pre_year) {                echo "selected"; }?>><?php echo displaydate($each_record['fi_ac_startdate'])." To ".displaydate($each_record['fi_ac_enddate']); ?>                   </option>
                   <?php } ?>
                   </select>			  </td>
				 <td width="230" height="25" align="left" valign="top"><label>
					<!--<select name="as_sec" id="as_sec">
						<option value="" >.....Select.....</option>
						<option value ="A" <?php //if ($as_sec=='A'){echo "selected"; }?>>A</option>
						<option value="B" <?php //if ($as_sec=='B'){echo "selected"; }?>>B</option>
						<option value="C" <?php //if ($as_sec=='C'){echo "selected"; }?>>C</option>
						<option value="D" <?php //if ($as_sec=='D'){echo "selected"; }?>>D</option>
					</select>--></label></td>
			  <td width="116">&nbsp;</td>
			  <td width="331" valign="middle" align="center"><input name="submit" type="submit" class="bgcolor_02" value="search"  style="cursor:pointer;"/></td>
			</tr>
		    
		</table> </form>
			</br>
		    <table width="100%" border="1" cellspacing="0" cellpadding="3" class="tbl_grid" align="center">
			<?php 
			$rownum = 1;
			if(count($assignment_det)>0	){
			?>
		    <tr class="bgcolor_02">
				<td width="12%" height="25" align="center" valign="middle" class="admin">Subject</td>
			   <td width="12%" height="25"  align="center" valign="middle" class="admin">Assignment</td>
			   <td width="14%" height="25" align="center" valign="middle" class="admin">Date</td> 
			   <td width="14%" height="25" align="center" valign="middle" class="admin">Last&nbsp;date </td>
			   <td width="9%" height="25" align="center" valign="middle" class="admin">Total&nbsp;Marks </td>
			   <td width="18%" height="25" align="center" valign="middle" class="admin">Created By<br />
			   [ Person Type] </td>
			   <td width="21%" height="25" align="center" valign="middle" class="admin">Action </td>
			</tr>
					<?php 
					
					foreach ($assignment_det as $eachrecord){
					$zibracolor = ($rownum%2==0)?"even":"odd";
					?>				
			<tr class="<?php echo $zibracolor;?>">
				<td align="center" valign="middle" class="narmal"><?php echo subjectname($eachrecord['as_suject']); ?></td>
			  <td align="center" valign="middle" class="narmal"><?php echo $eachrecord['as_name']; ?></td>
			  <td align="center" valign="middle" class="narmal"><?php echo displaydate ($eachrecord['as_createdon']); ?></td>
              <td align="center" valign="middle" class="narmal"><?php echo displaydate ($eachrecord['as_lastdate']); ?></td>
			  <td align="center" valign="middle" class="narmal"><?php echo  $eachrecord['as_marks']; ?></td>
			  <td align="center" valign="middle" class="narmal"><?php
				if($eachrecord['person_type']!=""){
				      if($eachrecord['person_type']=='staff'){
					   $staff_arr =  get_staffdetails($eachrecord['created_by']);
					   $from_name = $staff_arr['st_firstname'].' '.$staff_arr['st_lastname'];
					  }
					  if($eachrecord['person_type']==='admin'){
					   $admin_arr = $db->getrow("select * from es_admins where es_adminsid=".$eachrecord['created_by']);
					   $from_name = $admin_arr['admin_fname'];
					  }
				 echo  $from_name; ?><br />
		      [<?php echo $eachrecord['person_type'];?>]<?php }?></td>
			  <td align="center" valign="middle">
				
				<?php if(in_array('7_4',$admin_permissions)){?>	<a title="view" href="javascript: void(0)" 
onclick="window.open('?pid=12&uid=<?php echo $eachrecord["es_assignmentid"]; ?>','windowname1', 
'width=430, height=300'); return false;"><?php echo viewIcon(); ?></a>&nbsp;
				<?php }?>
				
			
<?php if(in_array('7_2',$admin_permissions)){?><a title ="edit" href="index.php?pid=4&action=edit&es_assid=<?php echo $eachrecord['es_assignmentid']; ?>">
<?php echo editIcon(); ?></a>&nbsp;<?php }?>

<?php if(in_array('7_3',$admin_permissions)){?><a title="Delete" onClick="return confirm('Are you sure you want to  delete ?')" href="index.php?pid=4&action=delete&es_assid=<?php echo $eachrecord['es_assignmentid']; ?>"><?php echo deleteIcon(); ?></a><?php }?></td>
			</tr> 
				<?php
				$rownum++;
				}?>
			<tr>
				<td colspan="7" align="center" class="adminfont">
						
						
						
						 <?php 
						 	// pagination
						  paginateexte($start, $q_limit, $no_rows, "action=view&column_name=".$orderby."&as_class=".$as_class."&submit=".$submit."&pre_year=".$pre_year); ?>			</td>
			</tr>
			<?php if (in_array("7_5", $admin_permissions)) {?>
			<tr>
				<td colspan="7" align="center" class="adminfont">
			<input name="Submit" type="button" onclick="newWindowOpen ('?pid=4&action=print_assignment<?php  echo $adminlisturl;?>&start=<?php echo $start;?>');" class="bgcolor_02" value="Print" style="cursor:pointer;"/></td>
			</tr>
			     <?php }}  if(isset($no_rows) && $no_rows==0) { ?>
		 	
		    <tr>
			    <td colspan="7" align="center" class="narmal"> No Records Found </td>
		    </tr>
			<tr>
				<td colspan="7" height='20' ></td>
			</tr>
		   <?php } ?>
	   </table>
	   
	 </td>
	
	</tr>
	
</table>
<?php } ?>
<?php if($action=='print_assignment'){
     $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_assignment','Assignment','View Assignment','','Print','".$_SERVER['REMOTE_ADDR']."',NOW())";
     $log_insert_exe=mysql_query($log_insert_sql);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="3" class="tbl_grid" align="center">
			<?php 
			$rownum = 1;
			if(count($assignment_det)>0	){
			?>
			 <tr class="bgcolor_02">
				<td width="16%" height="25" class="admin" align="center">Class</td>
				<td width="16%" height="25" class="admin" align="center">Subject</td>
				<td width="15%" height="25"  align="center" class="admin">Assignment</td>
				<td width="15%" height="25" class="admin" align="center">Date</td> 
				<td width="18%" height="25" class="admin" align="center">Last&nbsp;date </td>
				<td width="14%" height="25" class="admin" align="center">Total&nbsp;Marks </td>
				<td width="18%" height="25" class="admin" align="center">Created By<br />
			   [ Person Type] </td>
				
			</tr>
					<?php 
					
					foreach ($assignment_det as $eachrecord){
					$zibracolor = ($rownum%2==0)?"even":"odd";
					?>				
			<tr class="<?php echo $zibracolor;?>">
				<td align="center" class="narmal"><?php echo classname($as_class); ?></td>
				<td align="center" class="narmal"><?php echo subjectname($eachrecord['as_suject']); ?></td>
				<td align="center" class="narmal"><?php echo $eachrecord['as_name']; ?></td>
				<td align="center" class="narmal"><?php echo displaydate ($eachrecord['as_createdon']); ?></td>
                <td align="center" class="narmal"><?php echo displaydate ($eachrecord['as_lastdate']); ?></td>
                <td align="center" class="narmal"><?php echo  $eachrecord['as_marks']; ?></td>
				<td align="center" class="narmal"><?php
				if($eachrecord['person_type']!=""){
				      if($eachrecord['person_type']=='staff'){
					   $staff_arr =  get_staffdetails($eachrecord['created_by']);
					   $from_name = $staff_arr['st_firstname'].' '.$staff_arr['st_lastname'];
					  }
					  if($eachrecord['person_type']==='admin'){
					   $admin_arr = $db->getrow("select * from es_admins where es_adminsid=".$eachrecord['created_by']);
					   $from_name = $admin_arr['admin_fname'];
					  }
				 echo  $from_name; ?><br />[<?php echo $eachrecord['person_type'];?>]<?php }?></td>
				
			</tr> 
				<?php
				$rownum++;
				}?>
			
			     <?php }  if(isset($no_rows) && $no_rows==0) { ?>
		 	
		    <tr>
			    <td colspan="6" align="center" class="narmal"> No Records Found </td>
		    </tr>
			<tr>
				<td colspan="6" height='20' ></td>
			</tr>
		   <?php } ?>
	   </table>
<?php }?>
