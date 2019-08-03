<script>
function url_redirect(id)
{
window.location.href = object.options[object.selectedIndex].value;
}
function goto_URL(object)
{
window.location.href = object.options[object.selectedIndex].value;
}
function goto_URL1(object)
{
//alert("hi");
window.location.href = object.options[object.selectedIndex].value;
}
</script>

<?php 
/*
*Start of Create Examination a particular staff can create Exam for his class only
*/	
if ($action=="createxam"){
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
  </tr>
	<tr>
		<td height="25" colspan="3" class="bgcolor_02" align="center"><table width="95%"><tr class="bgcolor_02"><td align="left">Create Examination</td><td  align="right" valign="top" >Class Teacher for:<?php echo $classname; ?></td></tr></table></td>
	</tr>
	<form action="<?php echo buildurl(array("pid"=>57));?>" method="POST" name="examination">
	<input type="hidden" name="action" value="<?php echo $action?>" >
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td colspan="2" align="right" valign="top"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font><br /></td>
			</tr>
			<tr>
				<td width="18%" height="25" align="left" valign="middle" class="narmal">&nbsp;Exam Name&nbsp;</td>
			  <td width="82%" height="25" align="left" valign="middle"><select name="examname" style="width:190px;">
					 <option value="" >Select Exam</option>
<?php 

	if (count($exam_data)>0){
		foreach($exam_data as $exm){
?>
<option value="<?php echo $exm['es_examid']; ?>"   <?php echo ($exm['es_examid']==$examname)?"selected":""?> ><?php echo $exm['es_examname']; ?></option>
<?php
		}
	}
?>				</select>
			  <font color="#FF0000">*</font></td>
			</tr>
			<tr>
				<td height="25" align="left" valign="middle" class="narmal">&nbsp;Academic&nbsp;Year&nbsp;</td>
			  <td height="25" align="left" valign="middle"><select name="academicyear" style="width:190px;">
					 <option value="" >Select Year</option>
<?php 

	if(count($school_details_res)>0) {	
		foreach ($school_details_res as $school){
?>
		<option value="<?php echo $school['fi_ac_startdate'].$school['fi_ac_enddate']; ?>"   <?php echo ($school['fi_ac_startdate'].$school['fi_ac_enddate']==$academicyear)?"selected":""?> ><?php echo displaydate($school['fi_ac_startdate'])." To ".displaydate($school['fi_ac_enddate']); ?></option>
<?php
		}
	}
?>				</select>
			  <font color="#FF0000">*</font></td>
			</tr>
			<tr>
				<td height="25" align="left" valign="middle" class="narmal">&nbsp;</td>
				<td height="25" align="left" valign="middle" class="narmal"><input name="exam_next" type="submit" class="bgcolor_02" value="Next" style="cursor:pointer" />
			  <input name="Submit2" type="reset" class="bgcolor_02" value="Reset" style="cursor:pointer" /></td>
			</tr>
			</table>
		</td>
		<td width="1" class="bgcolor_02"></td>
	</tr>
	</form>
	<tr><td height="1" colspan="3" class="bgcolor_02"></td>
	</tr>
</table>
<?php }?>
<?php if($action=='exportexam'){?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
  </tr>
	<tr>
		<td height="25" colspan="3" class="bgcolor_02" align="center"><table width="95%"><tr class="bgcolor_02"><td align="left">Export Examination</td><td  align="right" valign="top" >Class Teacher for:<?php echo $classname; ?></td></tr></table></td>
	</tr>
	<form action="<?php echo buildurl(array("pid"=>57));?>" method="POST" name="examination">
	<input type="hidden" name="action" value="<?php echo $action?>" >
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td colspan="2" align="right" valign="top"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font><br /></td>
			</tr>
			<tr>
				<td width="18%" height="25" align="left" valign="middle" class="narmal">&nbsp;Exam Name&nbsp;</td>
			  <td width="82%" height="25" align="left" valign="middle"><select name="examname" style="width:190px;">
					 <option value="" >Select Exam</option>
<?php 

	if (count($exam_data)>0){
		foreach($exam_data as $exm){
?>
<option value="<?php echo $exm['es_examid']; ?>"   <?php echo ($exm['es_examid']==$examname)?"selected":""?> ><?php echo $exm['es_examname']; ?></option>
<?php
		}
	}
?>				</select>
			  <font color="#FF0000">*</font></td>
			</tr>
			<tr>
				<td height="25" align="left" valign="middle" class="narmal">&nbsp;Academic&nbsp;Year&nbsp;</td>
			  <td height="25" align="left" valign="middle"><select name="academicyear" style="width:190px;">
					 <option value="" >Select Year</option>
<?php 

	if(count($school_details_res)>0) {	
		foreach ($school_details_res as $school){
?>
		<option value="<?php echo $school['fi_ac_startdate'].$school['fi_ac_enddate']; ?>"   <?php echo ($school['fi_ac_startdate'].$school['fi_ac_enddate']==$academicyear)?"selected":""?> ><?php echo displaydate($school['fi_ac_startdate'])." To ".displaydate($school['fi_ac_enddate']); ?></option>
<?php
		}
	}
?>				</select>
			  <font color="#FF0000">*</font></td>
			</tr>
			<tr>
				<td height="25" align="left" valign="middle" class="narmal">&nbsp;</td>
				<td height="25" align="left" valign="middle" class="narmal"><input name="exportcreateexam" type="submit" class="bgcolor_02" value="Export" style="cursor:pointer"  /></td>
			</tr>
			</table>
		</td>
		<td width="1" class="bgcolor_02"></td>
	</tr>
	</form>
	<tr><td height="1" colspan="3" class="bgcolor_02"></td>
	</tr>
</table>
<?php }?>
<?php

if ($action=="createxam_next"){
/*
*After clicking next button u will see the details
*/
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
  </tr>
	<tr>
		<td height="25" colspan="3" class="bgcolor_02"><table width="95%"><tr class="bgcolor_02"><td align="left">Create Examination</td><td  align="right" valign="top" >Class Teacher for:<?php echo $classname; ?></td></tr></table></td>
	</tr>
	<form action="" method="POST" name="examination_next" enctype="multipart/form-data">
	<input type="hidden" name="action" value="<?php echo $action?>" >
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="left" valign="top">
			<table width="100%" border="0" cellspacing="0" cellpadding="2">
				
				<tr>
					<td colspan="7" height="30" align="right" valign="middle"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  All filelds are mandatory </font></td>
			  </tr>
				<tr class="bgcolor_02">
					<td align="center" valign="middle" width="4%" class="admin">S&nbsp;No.</td>
				  <td align="center" valign="middle" width="13%" class="admin">Subjects</td>
					<td align="center" valign="middle" width="34%" class="admin">Exam Date</td>
					<td align="center" valign="middle" width="12%" class="admin">Duration (hr)</td>
					<td align="center" valign="middle" width="13%" class="admin">Total Marks</td>
					<td align="center" valign="middle" width="13%" class="admin">Pass Marks</td>
					<td align="center" valign="middle" width="11%" class="admin">Upload</td>
				</tr>
			<?php
				if(count($subjects_data) > 0) {
					$cn = 1;
					$ar = 0;
					foreach ($subjects_data as $sub) {
						$subid = $sub['es_subjectid'];
						$vardt = "exam_date_".$ar;
						if($_POST[$vardt]!="") {
							$v_dt = $_POST[$vardt];
						} else if($arrSubDetails[$subid]['exam_date']!="") {
							$tmpdate = strtotime($arrSubDetails[$subid]['exam_date']);
							$v_dt = date("m/d/Y h:i A",$tmpdate);
						} else {
							$v_dt = "";
						}
			?>
						<tr>
							<td align="center" valign="middle" class="narmal"><?php echo $cn;?></td>
							<td align="center" valign="middle" class="narmal">
								<?php echo $sub['es_subjectname']; ?>
								<input type="hidden" name="subject_id[]" value="<?php echo $sub['es_subjectid']; ?>">
								<input type="hidden" name="exam_detailsid[]" value="<?php if($arrSubDetails[$subid]['es_exam_detailsid']!="") echo $arrSubDetails[$subid]['es_exam_detailsid']; ?>">
							</td>
							<td align="center" valign="middle" class="narmal">
								<input class="plain" name="<?php echo $vardt;?>" id="<?php echo $vardt;?>" value="<?php echo ($v_dt!="")?formatDBDateTOCalender($v_dt):""; ?>" size="11" readonly ><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.examination_next.<?php echo $vardt;?>);return false;" ><img name="popcal" align="absmiddle" src="<?php echo JS_PATH ?>/DateTime/calbtn.gif" width="34" height="22" border="0" alt=""></a>
							</td>
							<td align="center" valign="middle" class="narmal">
								<select name="exam_duration[<?php echo $ar;?>]">
									<option value="">Select</option>
									<option value="0:15" <?php if ($exam_duration[$ar]=="0:15") echo "selected"; else if($arrSubDetails[$subid]['exam_duration'] =="0:15") echo "selected"; else echo "";?>>0:15</option>
									<option value="0:30" <?php if ($exam_duration[$ar]=="0:30") echo "selected"; else if($arrSubDetails[$subid]['exam_duration'] =="0:30") echo "selected"; else echo "";?>>0:30</option>
									<option value="0:45" <?php if ($exam_duration[$ar]=="0:45") echo "selected"; else if($arrSubDetails[$subid]['exam_duration'] =="0:45") echo "selected"; else echo "";?>>0:45</option>
									<option value="1:00" <?php if ($exam_duration[$ar]=="1:00") echo "selected"; else if($arrSubDetails[$subid]['exam_duration'] =="1:00") echo "selected"; else echo "";?>>1:00</option>
									<option value="1:15" <?php if ($exam_duration[$ar]=="1:15") echo "selected"; else if($arrSubDetails[$subid]['exam_duration'] =="1:15") echo "selected"; else echo "";?>>1:15</option>
									<option value="1:30" <?php if ($exam_duration[$ar]=="1:30") echo "selected"; else if($arrSubDetails[$subid]['exam_duration'] =="1:30") echo "selected"; else echo "";?>>1:30</option>
									<option value="1:45" <?php if ($exam_duration[$ar]=="1:45") echo "selected"; else if($arrSubDetails[$subid]['exam_duration'] =="1:45") echo "selected"; else echo "";?>>1:45</option>
									<option value="2:00" <?php if ($exam_duration[$ar]=="2:00") echo "selected"; else if($arrSubDetails[$subid]['exam_duration'] =="2:00") echo "selected"; else echo "";?>>2:00</option>
									<option value="2:15" <?php if ($exam_duration[$ar]=="2:15") echo "selected"; else if($arrSubDetails[$subid]['exam_duration'] =="2:15") echo "selected"; else echo "";?>>2:15</option>
									<option value="2:30" <?php if ($exam_duration[$ar]=="2:30") echo "selected"; else if($arrSubDetails[$subid]['exam_duration'] =="2:30") echo "selected"; else echo "";?>>2:30</option>
									<option value="2:45" <?php if ($exam_duration[$ar]=="2:45") echo "selected"; else if($arrSubDetails[$subid]['exam_duration'] =="2:45") echo "selected"; else echo "";?>>2:45</option>
									<option value="3:00" <?php if ($exam_duration[$ar]=="3:00") echo "selected"; else if($arrSubDetails[$subid]['exam_duration'] =="3:00") echo "selected"; else echo "";?>>3:00</option>
									<option value="3:15" <?php if ($exam_duration[$ar]=="3:15") echo "selected"; else if($arrSubDetails[$subid]['exam_duration'] =="3:15") echo "selected"; else echo "";?>>3:15</option>
									<option value="3:30" <?php if ($exam_duration[$ar]=="3:30") echo "selected"; else if($arrSubDetails[$subid]['exam_duration'] =="3:30") echo "selected"; else echo "";?>>3:30</option>
									<option value="3:45" <?php if ($exam_duration[$ar]=="3:45") echo "selected"; else if($arrSubDetails[$subid]['exam_duration'] =="3:45") echo "selected"; else echo "";?>>3:45</option>
									<option value="4:00" <?php if ($exam_duration[$ar]=="4:00") echo "selected"; else if($arrSubDetails[$subid]['exam_duration'] =="4:00") echo "selected"; else echo "";?>>4:00</option>
									<option value="4:15" <?php if ($exam_duration[$ar]=="4:15") echo "selected"; else if($arrSubDetails[$subid]['exam_duration'] =="4:15") echo "selected"; else echo "";?>>4:15</option>
									<option value="4:30" <?php if ($exam_duration[$ar]=="4:30") echo "selected"; else if($arrSubDetails[$subid]['exam_duration'] =="4:30") echo "selected"; else echo "";?>>4:30</option>
									<option value="4:45" <?php if ($exam_duration[$ar]=="4:45") echo "selected"; else if($arrSubDetails[$subid]['exam_duration'] =="4:45") echo "selected"; else echo "";?>>4:45</option>
									<option value="5:00" <?php if ($exam_duration[$ar]=="5:00") echo "selected"; else if($arrSubDetails[$subid]['exam_duration'] =="5:00") echo "selected"; else echo "";?>>5:00</option>
								</select>
							</td>
							<td align="center" valign="middle" class="narmal"><input type="text" name="total_marks[<?php echo $ar;?>]" value="<?php if ($total_marks[$ar]!="") echo $total_marks[$ar]; else if($arrSubDetails[$subid]['total_marks'] !="") echo $arrSubDetails[$subid]['total_marks']; else echo "";?>" size="3" maxlength="5"></td>
							<td align="center" valign="middle" class="narmal"><input type="text" name="pass_marks[<?php echo $ar;?>]" value="<?php if ($pass_marks[$ar]!="") echo $pass_marks[$ar]; else if($arrSubDetails[$subid]['pass_marks'] !="") echo $arrSubDetails[$subid]['pass_marks']; else echo "";?>" size="3" maxlength="5"></td>
							<td align="center" valign="middle" class="narmal"><?php if ($arrSubDetails[$subid]['upload_exam_paper']=="") { ?> <input type="file" name="upload_exam_paper[<?php echo $ar;?>]" size="7" /><?php } else  { ?>
                             <input type="hidden" name="old_exam_file[<?php echo $ar;?>]" value="<?php echo $arrSubDetails[$subid]['upload_exam_paper'];?>" />
                            <a href="../office_admin/documents/<?php echo $arrSubDetails[$subid]['upload_exam_paper'];?>"><img src="images/download.png" alt="download" border="0"/></a><?php } ?></td>
						</tr>
			<?php
						$cn++;
						$ar++;
					}
			?>
					<tr>
						<td colspan="6" align="center" valign="top">
							<input name="exam_submit" type="submit" class="bgcolor_02" value="Submit" style="cursor:pointer" />
							<input name="resetexam" type="reset" class="bgcolor_02" value="Reset" style="cursor:pointer" />
						</td>
					</tr>
			<?php
				}
			?>
			</table>
		</td>
		<td width="1" class="bgcolor_02"></td>
	</tr>
	<iframe width=188 height=166 name="gToday:datetime:agenda.js:gfPop:plugins_time.js" id="gToday:datetime:agenda.js:gfPop:plugins_time.js" src="<?php echo JS_PATH ?>/DateTime/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe>
	</form>
	<tr><td height="1" colspan="3" class="bgcolor_02"></td>
	</tr>
</table>
<?php
}
/*
*From Here Student Marks can be entered
*/	
	if ($action=="marksentry"){
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr>
  	<td width="1" ></td> 
  	<td height="19" ></td> 
	<td width="1" ></td>
  </tr>
  <tr>
  	<td width="1" class="bgcolor_02"></td>
  	<td height="25"  class="bgcolor_02"><table width="95%"><tr class="bgcolor_02">
  	      <td align="left">Subjectwise marks entry</td><td  align="right" valign="top" >Class Teacher for:<?php echo $classname; ?></td></tr></table></td>
	<td width="1" class="bgcolor_02"></td>
  </tr>
	
  <tr>
  	<td width="1" ></td>
  	<td align="left" valign="top">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		
		<tr>
				<td colspan="8" align="center">
				<form name="exammarkentry" action="" method="POST">
					<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tbl_grid">
					
						
						<tr>
							<td colspan="7">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
				<td  align="right" valign="middle" colspan="3" height="25"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font><br /></td>
			</tr>
									<tr>
									  <td width="11%" align="right" class="narmal">&nbsp;</td>
										<td width="14%" height="25" align="left" class="narmal">Exam Name&nbsp;</td>
									  <td width="75%" align="left" valign="middle"><select name="examname" style="width:190px;">
											 <option value="" >Select Exam</option>
						<?php 
						
							if (count($exam_data)>0){
								foreach($exam_data as $exm){
						?>
						<option value="<?php echo $exm['es_examid']; ?>"   <?php echo ($exm['es_examid']==$examname)?"selected":""?> ><?php echo $exm['es_examname']; ?></option>
						<?php
								}
							}
						?>				</select>
									  <font color="#FF0000">*</font></td>
									</tr>
									<tr>
									  <td class="narmal" align="right">&nbsp;</td>
										<td height="25" align="left" valign="middle" class="narmal">Academic&nbsp;Year&nbsp;</td>
									  <td align="left" valign="middle"><select name="academicyear" style="width:190px;">
											 <option value="" >Select Year</option>
<?php 

	if(count($school_details_res)>0) {	
		foreach ($school_details_res as $school){
?>
		<option value="<?php echo $school['fi_ac_startdate'].$school['fi_ac_enddate']; ?>"   <?php echo ($school['fi_ac_startdate'].$school['fi_ac_enddate']==$academicyear)?"selected":""?> ><?php echo displaydate($school['fi_ac_startdate'])." To ".displaydate($school['fi_ac_enddate']); ?></option>
<?php
		}
	}
?>				</select>
									  <font color="#FF0000">*</font></td>
									</tr>
									<tr>
									  <td align="left" valign="top" class="narmal">&nbsp;</td>
										<td align="left" valign="top" class="narmal">&nbsp;</td>
										<td height="40" align="left" valign="middle" class="narmal"><input name="exam_search" type="submit" class="bgcolor_02" value="Search" style="cursor:pointer" />
									  <input name="Submit2" type="reset" class="bgcolor_02" value="Reset" style="cursor:pointer"/></td>
									</tr>
								</table>
							</td>
						</tr>
					<?php 
						if (isset($examdetails) && count($examdetails) > 0){
					?>
						<tr class="bgcolor_02">
							<td width="5%" align="center" height="20" class="admin">SNo</td>
							<td width="15%" align="center" class="admin">Subject</td>
							<td width="10%" align="center" class="admin">Total Marks</td>
							<td width="10%" align="center" class="admin">Pass Marks</td>
							<td width="25%" align="center" class="admin">Exam Date</td>
							<td width="10%" align="center" class="admin">Duration</td>
							<td width="25%" align="center" class="admin">Action</td>
						</tr>
					<?php
					  $i = 0;
						foreach($examdetails as $eachexam){
							 $i++;
						?>
							<tr>
								<td height="20" align="center" class="narmal"><?php echo $i; ?></td>
								<td align="center" class="narmal"><?php echo $eachexam['es_subjectname'];?></td>
								<td align="center" class="narmal"><?php echo $eachexam['total_marks'];?></td>
								<td align="center" class="narmal"><?php echo $eachexam['pass_marks'];?></td>
								<td align="center" class="narmal"><?php echo displayDateAndTime($eachexam['exam_date'],'d/m/Y H:i:s');?></td>
								<td align="center" class="narmal"><?php echo $eachexam['exam_duration'];?></td>
								<td align="center" class="narmal">
									<a href="?pid=57&action=entermarks&edmark=<?php echo $eachexam['es_exam_detailsid'];?>&classes_id=<?php echo $classes_id;?>&subject_sud_total=<?php echo $eachexam['total_marks'];?>&academicyear=<?php echo $academicyear;?>&ed=<?php echo $eachexam['exam_date'];?>&examname=<?php echo $examname; ?>" class="video_link">Enter Marks</a><?php /*?> /<br><a href="?pid=17&action=uploadmarks&edmark=<?php echo $eachexam['es_exam_detailsid'];?>&classes_id=<?php echo $classes_id;?>"><b>Upload Marks</b></a>
								<?php */?></td>
					
				  			</tr>
			  <?php 	}
					} else if($exam_search == "Search" && count($examdetails) == 0 && $examname!="") {?>
						<tr>
								<td height='20' align='center' colspan='7' class='narmal'><b>No recors found</b></td>
					  </tr>
							
					<?php }   
			  
			  ?>
			  			
           			</table>
				  </form>
		  </td>
 		  </tr>
	</table>
	<td width="1" class=""></td>
  </tr>
	
	
	
</table>
  
<?php 
	  }
?>
<?php 
if ($action=="uploadmarks"){
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" >
	<tr>
	  	<td height="19" ></td> 
	</tr>
	<tr>
	  	<td valign="top">
	  		<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tbl_grid">
	  			<tr>
	  				<td>
	  					<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  						<tr>
							  	<td height="25"  class="bgcolor_02"><span class="admin">&nbsp;&nbsp;Upload Marks</span></td>
							</tr>
							<tr>
							  	<td align="left" valign="top">
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
								  		<tr><td>&nbsp;</td></tr>
								  		<tr>
											<td align="center">
												<form name="uploadmarks" method="post" action="" enctype="multipart/form-data">
												<table width="100%" border="0" cellspacing="0" cellpadding="3" >
												<?php
													if(count($class_students) > 0) {
														$disabled = "disabled";
												?>
														<tr>
															<td align="center" height="20"><b>Marks for this subject has been already uploaded or entered.<br>If you want to update the marks then please <a href="?pid=36&action=entermarks&edmark=<?php echo $edmark;?>&classes_id=<?php echo $classes_id;?>"><b>CLICK HERE</b></a>.</b></td>
														</tr>
												<?php
													} else {
														$disabled = "";
													}
												?>
													<tr>
														<td align="left" height="20">Please upload the Marks as a document of Excel Stylesheet ( .xls file ).<br>You can <a href="?pid=36&action=downloadsample" class="narmal"><b>download the sample document here</b></a>.</td>
													</tr>
													<tr><td align="left" height="20">&nbsp;</td></tr>
													<tr>
														<td align="center" height="20">
															<input type="file" name="upldmrk" id="upldmrk" size="50" value="" <?php echo $disabled;?>>
														</td>
													</tr>
													<tr>
														<td align="center" height="20">
															<input type="hidden" name="edmark" value="<?php echo $edmark;?>">
															<input type="submit" name="upload_std_marks" style="cursor:pointer" id="upload_std_marks" class="bgcolor_02" value="Submit" <?php echo $disabled;?>>
															<input type="button" name="resetstd_marks" style="cursor:pointer" class="bgcolor_02" value="Back" onclick="javascript:history.go(-1);">
														</td>
													</tr>
												</table>
												</form>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td> 
	</tr>
</table>  
<?php 
}
?>

<?php 
if ($action=="entermarks"){ ;
?>
	
	<table width="100%" border="0" cellspacing="0" cellpadding="0" >
		<tr>
		  	<td height="19" ></td> 
		</tr>
		<tr>
		  	<td valign="top">
		  		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		  			<tr>
		  				<td>
		  					<table width="100%" border="0" cellspacing="0" cellpadding="0">
		  						<tr>
								  	<td height="25"  class="bgcolor_02"><span class="admin">&nbsp;&nbsp;Enter Marks</span></td>
								</tr>
								<tr>
								  	<td align="left" valign="top">
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
									  		<tr>
												<td colspan="8" align="center">
													<table width="100%" border="1" cellspacing="0" cellpadding="0" class="tbl_grid">
													<form name=" " method="post" >
													<tr><td height="20" colspan="7" align="left" valign="middle">
													<table width="100%" border="0">
  <tr>
    <td width="3%" align="left" valign="middle">&nbsp;</td>
    <td width="17%" align="left" valign="middle" class="admin">Group</td>
    <td width="1%" align="left" valign="middle" class="admin"> : </td>
    <td width="79%" align="left" valign="middle"><?php $g_sql="SELECT es_groupname,es_groupsid FROM es_groups";
		$g_exe=mysql_query($g_sql);		
		while($g_row=mysql_fetch_array($g_exe)){ $groupnamearray[$g_row['es_groupsid']]=$g_row['es_groupname'];} echo $groupnamearray[$groups_id];?></td>
  </tr>
  <tr>
    <td align="left" valign="middle">&nbsp;</td>
    <td align="left" valign="middle" class="admin">Class</td>
    <td align="left" valign="middle" class="admin">:</td>
    <td align="left" valign="middle"><?php $c_sql="SELECT es_classname,es_classesid FROM es_classes";
		$c_exe=mysql_query($c_sql);		
		while($c_row=mysql_fetch_array($c_exe)){ $classnamearray[$c_row['es_classesid']]=$c_row['es_classname'];} echo $classnamearray[$classes_id];?></td>
  </tr>
  <tr>
    <td align="left" valign="middle">&nbsp;</td>
    <td align="left" valign="middle" class="admin">Exam Name</td>
    <td align="left" valign="middle" class="admin">:</td>
    <td align="left" valign="middle"><?php $e_sql="SELECT es_examname,es_examid FROM es_exam";
		$e_exe=mysql_query($e_sql);		
		while($e_row=mysql_fetch_array($e_exe)){ $examname_array[$e_row['es_examid']]=$e_row['es_examname'];}echo $examname_array[$examname];?></td>
  </tr>
  <tr>
    <td align="left" valign="middle">&nbsp;</td>
    <td align="left" valign="middle" class="admin">Exam Date</td>
    <td align="left" valign="middle" class="admin">:</td>
    <td align="left" valign="middle"><?php echo func_date_conversion("Y-m-d h:i:s","d/m/Y H:i",$ed);?></td>
  </tr>
  <tr>
    <td align="left" valign="middle">&nbsp;</td>
    <td align="left" valign="middle" class="admin">Academic Year</td>
    <td align="left" valign="middle" class="admin">:</td>
    <td align="left" valign="middle"><?php
	$from = func_date_conversion("Y-m-d","d/m/Y",substr($academicyear,0,10));
	$to   = func_date_conversion("Y-m-d","d/m/Y",substr($academicyear,10,20));
	
	 echo $from ." - ".$to;?></td>
  </tr>
  <tr>
    <td align="left" valign="middle">&nbsp;</td>
    <td align="left" valign="middle" class="admin">Subject</td>
    <td align="left" valign="middle" class="admin">:</td>
    <td align="left" valign="middle"><?php 
	$sub_det_qry = "SELECT sub.es_subjectname FROM es_subject sub, es_exam_details edtl WHERE  edtl.es_exam_detailsid ='".$edmark."' AND edtl.subject_id = sub.es_subjectid";
		$sub_name = $db->getone($sub_det_qry );
	    echo $sub_name;?></td>
  </tr>
</table>

													</td></tr>
														
		
		
		
												<?php
													if(count($class_students)>0)
													{
												?>
														<tr class="bgcolor_02">
															<td height="20" width="20%" align="center">S&nbsp;No</td>
															<td height="20" width="25%" align="center">Registration #</td>
														  <td height="20" width="35%" align="center">Student Name</td>
															<td height="20" width="20%" align="center">Marks Obtained</td>
														</tr>
												<?php
														$in=0;
														$n = 1;
														foreach ($class_students as $stud)
														{
														$mrks_std = 0;
														$sel_stud_marks = "SELECT * FROM es_marks WHERE es_examdetailsid='".$edmark."' AND es_marksstudentid = '".$stud['student_id']."'";
														$std_mrks_det = $db->getrow($sel_stud_marks);
														
				
														
														
												?>
															<tr>
																<td height="25" align="center"><?php echo $n;?></td>
																<td align="center">
																	<input type="hidden" name="student_id[]" value="<?php echo $stud['student_id'];?>">
																	<input type="hidden" name="student_marksid[]" value="<?php if(isset($std_mrks_det['es_marksid']) && $std_mrks_det['es_marksid']!="") echo $std_mrks_det['es_marksid'];?>">
																	<input type="hidden" name="subject_sud_total" value="<?php echo $subject_sud_total;?>">
																	<?php echo "SM".$stud['student_id'];?></td>
																<td align="center"><?php echo ucfirst($stud['student_name']);?></td>
																<td align="center">
																<?php if($action=="entermarks"){ ?>
																<input type="text" name="stud_marks[]" value="<?php if($std_mrks_det['es_marksobtined']!="" && !$_POST) {echo $std_mrks_det['es_marksobtined']; }else{ echo $stud_marks[$in];} ?>" size="8">
																<?php } else{ if($std_mrks_det['es_marksobtined']!="") echo $std_mrks_det['es_marksobtined']; }?></td>
															</tr>
												<?php
														$n++;
														$in++;
														}
													}
												?>
														<tr>
															<td height="40" colspan="4" valign="middle" align="center" class="narmal">
																<?php if($action=="entermarks"){?>
																<input name="submit_marks" type="submit" class="bgcolor_02" value="Submit" style="cursor:pointer" />
															    <?php }?>
															
															</td>
														</tr>
														
													</form>
												</table>
											</td>
										</tr>
									</table>
								</td>
						  </tr>
		  				</table>
	  				</td>
	  			</tr>
	  		</table>
	  	</td> 
	</tr>
</table>
  
<?php 
	  }
/*Examination Shedule  will be displayed for his class.*/
	
   if ($action=="examlistforstaff"){
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
  </tr>
	<tr>
		<td height="25" colspan="3" class="bgcolor_02"><table width="95%"><tr class="bgcolor_02">
		      <td align="left">&nbsp;&nbsp;View Exam</td><td  align="right" valign="top" >Class Teacher for:<?php echo $classname; ?></td></tr></table></td>
	</tr>
	<form action="" method="POST" name="examination">
	<input type="hidden" name="action" value="<?php echo $action?>" >
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
				<td colspan="2" align="right" valign="top"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font><br /></td>
			</tr>
			<tr>
				<td class="narmal" align="left">Exam Name&nbsp;</td>
	     <td height="25" align="left" valign="middle"><select name="examname" style="width:190px;">
					 <option value="" >Select Exam</option>
<?php 

	if (count($exam_data)>0){
		foreach($exam_data as $exm){
?>
<option value="<?php echo $exm['es_examid']; ?>"   <?php echo ($exm['es_examid']==$examname)?"selected":""?> ><?php echo $exm['es_examname']; ?></option>
<?php
		}
	}
?>				</select>
			  <font color="#FF0000">*</font></td>
			</tr>
			<tr>
				<td class="narmal" align="left">Academic&nbsp;Year&nbsp;</td>
	     <td height="25" align="left" valign="middle"><select name="academicyear" style="width:190px;">
					 <option value="" >Select Year</option>
<?php 

	if(count($school_details_res)>0) {	
		foreach ($school_details_res as $school){
?>
		<option value="<?php echo $school['fi_ac_startdate'].$school['fi_ac_enddate']; ?>"   <?php echo ($school['fi_ac_startdate'].$school['fi_ac_enddate']==$academicyear)?"selected":""?> ><?php echo displaydate($school['fi_ac_startdate'])." To ".displaydate($school['fi_ac_enddate']); ?></option>
<?php
		}
	}
?>					</select>
			  <font color="#FF0000">*</font></td>
			</tr>
			<tr>
				<td align="left" valign="top" class="narmal">&nbsp;</td>
				<td height="40" align="left" valign="middle" class="narmal"><input name="exam_details" type="submit" class="bgcolor_02" value="Submit" style="cursor:pointer"  />
				<input name="Submit2" type="reset" class="bgcolor_02" value="Reset" style="cursor:pointer" /></td>
		  </tr>
			
<?php 	if(is_array($examDetailsList) && count($examDetailsList)>0) { ?>

	<tr>
		<td colspan="2">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td colspan="4" align="center">
						<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tbl_grid">
							<tr>
								<td width="4%" height="20" class="bgcolor_02"><strong>&nbsp;<span class="admin">S&nbsp;No </span></strong></td>
								<td width="12%" class="bgcolor_02"><strong>&nbsp;<span class="admin">Subject</span></strong></td>
								<td width="12%" class="bgcolor_02"><strong>&nbsp;<span class="admin">Exam&nbsp;Date</span></strong></td>
								<td width="12%" class="bgcolor_02"><strong>&nbsp;<span class="admin">Exam&nbsp;Duration</span></strong></td>
								<td width="13%" class="bgcolor_02"><strong>&nbsp;&nbsp;<span class="admin">Max&nbsp;Marks</span></strong></td>
								<td width="17%" class="bgcolor_02"><strong>&nbsp;&nbsp;<span class="admin">Min&nbsp;Marks</span> </strong></td>	
                                <td width="17%" class="bgcolor_02"><strong>&nbsp;&nbsp;<span class="admin">Download</span> </strong></td>			
							</tr>
						<?php						
	                                     $rw = 1;
	                                    $slno = $start+1;
	                              foreach ($examDetailsList as $eachdetails)
	                                 {  
										if($rw%2==0)
											$rowclass = "even";
											else
											$rowclass = "odd";
											$sub = $eachdetails['subject_id'];	
										$subject = "SELECT `es_subjectname`  FROM `es_subject` WHERE `es_subjectid`= '$sub'";
										$subjectName = getarrayassoc($subject);
	                            ?>
	                         <tr class="<?php echo $rowclass;?>">
	                            <td  height="20" align="center" class="narmal"><?php echo $slno;?></td>
								<td align="center" class="narmal"><?php echo $subjectName['es_subjectname'];?></td>
								<td align="center" class="narmal"><?php echo func_date_conversion("Y-m-d H:i:s","d/m/Y",$eachdetails['exam_date']);?></td>
								<td align="center" class="narmal"><?php echo $eachdetails['exam_duration'];?></td>
								<td align="center" class="narmal"><?php echo $eachdetails['total_marks'];?></td>
								<td align="center" class="narmal"><?php echo $eachdetails['pass_marks'];?></td>
                                <td align="center" class="narmal"><a href="../office_admin/documents/<?php echo $eachdetails['upload_exam_paper'];?>"><img src="images/download.png" alt="download" border="0"/></a></td>
							</tr>
							<?php           $rw++;
	                                   $slno++;
									   
									   } ?> 
		
				  			
							<tr><td height="20" colspan="6">&nbsp;</td></tr>
	           			</table>
					</td>
	 		    </tr>
			</table>
		</td>
	</tr>
			
		
<?php }

	elseif(isset($exam_details) && !is_array($examDetailsList) && count($errormessage)==0) {
	?>
			<tr>
				<td colspan="7" align="center">
					<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tbl_grid">
						<tr>
							<td align='center' class="narmal">No records found</td>		
						</tr>
					</table>
				</td>
 		  </tr>
<?php
	}
?>	
		
		
		
		
		
		
		</table>
	  </td>
		<td width="1" class="bgcolor_02"></td>
	</tr>
	</form>
	<tr><td height="1" colspan="3" class="bgcolor_02"></td>
	</tr>
</table>
<?php 
	  }
/*
*From Here Student Marks can be entered individually
*/

	if ($action=="stdmarksentry"){
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr>
  	<td width="1"></td> 
  	<td height="3" ></td> 
	<td width="1" ></td>
  </tr>
  <tr>
  	<td width="1" class="bgcolor_02"></td>
  	<td height="25" class="bgcolor_02"><table width="100%"><tr class="bgcolor_02">
  	<td height="25" align="left" valign="middle" class="bgcolor_02">Studentwise marks entry</td>
  	<td  align="right" valign="top" class="bgcolor_02">Class Teacher for:<?php echo $classname; ?></td></tr>
		</table></td>
	<td width="1" class="bgcolor_02"></td>
  </tr>
	
	
	
  <tr>
  	<td width="1" class=""></td>
  	<td align="left" valign="top">
		<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tbl_grid">
		<tr>
				<td colspan="8" align="right" valign="top"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font><br /></td>
		  </tr>
	  		<tr>
				<td colspan="8" align="center">
				<form name="stdmarkentry" action="" method="POST">
					<table width="100%" border="0" cellspacing="0" cellpadding="0" >
						
						<tr>
							<td colspan="5">
								<table width="100%" border="0" cellspacing="0" cellpadding="1">
									
						     <tr>
										 <td class="narmal" width="15%" align="left">Registration&nbsp;#</td>
							     <td width="35%" height="25" align="left" valign="middle"><select name="regd_no" style="width:190px;">
											 <option value="" >Select Student</option>
						<?php 
						
							if (count($allstudents)>0){
								foreach($allstudents as $eachstd){
						?>
						<option value="<?php echo $eachstd['es_preadmissionid']; ?>"   <?php echo ($eachstd['es_preadmissionid']==$regd_no)?"selected":""?> >SM<?php echo $eachstd['es_preadmissionid']; ?></option>
						<?php
								}
							}
						?>				</select>
									  <font color="#FF0000">*</font></td>
									 
								  </tr>
									<tr>
										<td class="narmal" align="left">Exam Name&nbsp;</td>
							     <td height="25" align="left"><select name="examname" style="width:190px;">
											 <option value="" >Select Exam</option>
						<?php 
						
							if (count($exam_data)>0){
								foreach($exam_data as $exm){
						?>
						<option value="<?php echo $exm['es_examid']; ?>"   <?php echo ($exm['es_examid']==$examname)?"selected":""?> ><?php echo $exm['es_examname']; ?></option>
						<?php
								}
							}
						?>				</select>
									  <font color="#FF0000">*</font></td>
									  <td class="narmal" align="left">Year&nbsp;</td>
							     <td align="left"><select name="academicyear" style="width:190px;">
											 <option value="" >Select Year</option>
						<?php 

	if(count($school_details_res)>0) {	
		foreach ($school_details_res as $school){
?>
		<option value="<?php echo $school['fi_ac_startdate'].$school['fi_ac_enddate']; ?>"   <?php echo ($school['fi_ac_startdate'].$school['fi_ac_enddate']==$academicyear)?"selected":""?> ><?php echo displaydate($school['fi_ac_startdate'])." To ".displaydate($school['fi_ac_enddate']); ?></option>
<?php
		}
	}
?>				</select>
									  <font color="#FF0000">*</font></td>
								  </tr>
									<tr>
										<td align="left" colspan="2" valign="top" class="narmal">&nbsp;</td>
										<td height="40" colspan="2" valign="middle" class="narmal"><input name="search_stdnt" type="submit" class="bgcolor_02" value="Search" style="cursor:pointer" />
										<input name="Submit2" type="reset" class="bgcolor_02" value="Reset" style="cursor:pointer"  /></td>
									</tr>
									
								
								</table>
						  </td>
						</tr>
					<?php 
						if (isset($allsubjects) && count($allsubjects) > 0){
					?>
						<tr class="bgcolor_02">
							<td width="10%" align="center" height="20" class="admin">S&nbsp;No.</td>
						  <td width="30%" align="center" class="admin">Subject Name</td>
							<td width="15%" align="center" class="admin">Total Marks</td>
							<td width="15%" align="center" class="admin">Pass Marks</td>
							<td width="30%" align="center" class="admin">Marks Obtained</td>
						</tr>
					<?php
					  $i = 0;
						foreach($allsubjects as $sbj){
							$sb_id = $sbj['es_subjectid'];
							 $i++;
							
						?>
							<tr>
								<td height="20" align="center" class="narmal"><?php echo $i; ?></td>
								<td align="center" class="narmal"><?php echo $sbj['es_subjectname'];?></td>
								<td align="center" class="narmal"><?php echo $arrStudents[$sb_id]['total_marks'];?></td>
								<td align="center" class="narmal"><?php echo $arrStudents[$sb_id]['pass_marks'];?></td>
								<td align="center" class="narmal">
									<input type="hidden" name="exm_dtl[<?php echo $i; ?>]" value="<?php echo $arrStudents[$sb_id]['exm_dtl_id']; ?>">
									<input type="hidden" name="sub_sud_tot[<?php echo $i; ?>]" value="<?php echo $arrStudents[$sb_id]['total_marks']; ?>">
									<input type="hidden" name="student_marksid[<?php echo $i; ?>]" value="<?php if(isset($arrStudents[$sb_id]['marks_id']) && $arrStudents[$sb_id]['marks_id'] > 0) echo $arrStudents[$sb_id]['marks_id']; ?>">
									<input type="text" name="marksobtnd[<?php echo $i; ?>]" value="<?php if(isset($arrStudents[$sb_id]['mark_obtnd']) && $arrStudents[$sb_id]['mark_obtnd']!="") {echo $arrStudents[$sb_id]['mark_obtnd']; }?>" size="10">
								</td>
					
				  			</tr>
			  <?php 	}
			  ?>
			  				<tr>
								<td height='20' align='center' colspan='5' class='narmal'>
									<input type="submit" name="submit_std_mrk" value="Submit Marks" class="bgcolor_02" style="cursor:pointer" >
								</td>
							</tr>
			  <?php
					} else if($exam_search == "Search" && count($examdetails) == 0) {
						echo "<tr>
								<td height='20' align='center' colspan='5' class='narmal'>No records found</td>
							</tr>
							<tr>
								<td height='20' ></td>
							</tr>";
					}
			  
			  ?>
			  			
           			</table>
				  </form>
			  </td>
 		  </tr>
	</table>
	<td width="1" class=""></td>
  </tr>
	
	
	
</table>
  
<?php 
	  }
?>	  

<?php	  
	  if($action=="performence")
	  {
  ?>
  <form action="" method="post" name="marksview">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Classwise Performation </strong></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td colspan="7">&nbsp;</td>
                  </tr>
                  <tr>
                    <td width="9%" class="admin">&nbsp;Class</td>
                    <td width="12%" class="narmal"><select name="classes_id" style="width:110px;">
					 <option value="Select" >Select</option>
<?php 

	if (count($class_data)>0){
		foreach($class_data as $eachclass){
?>
<option value="<?php echo $eachclass->es_classname; ?>"<?php echo ($eachclass->es_classname==$classes_id)?"selected":""?> ><?php echo $eachclass->es_classname; ?></option>
<?php
		}
	}
?>				</select></td>
                    <td width="12%" align="left" class="admin">Exam&nbsp;Name</td>
                    <td width="12%" align="left" class="narmal"><select name="result_serchnameofexam" style="width:100px;">
					 <option value="Select" >Select</option>
						<?php
						foreach ($examname as $examnameresults)
						{
						?>
						<option value="<?php echo $examnameresults->es_examinationsId;?>"<?php echo ($examnameresults->es_examinationsId==$result_serchnameofexam)?"selected":""?>><?php echo $examnameresults->examname; ?></option>
						<?php
						}
						?>
						</select></td>
						 <td width="12%" align="left" class="admin">Subject&nbsp;Name</td>
                    <td width="12%" align="left" class="narmal"><select name="subjectnames" style="width:100px;">
					 <option value="Select" >Select</option>
						<?php
						foreach ($subjects as $subjectsresult)
						{
						?>
						<option value="<?php echo $subjectsresult->es_subjectId;?>"<?php echo ($subjectsresult->es_subjectId==$subjectnames)?"selected":""?>><?php echo $subjectsresult->es_subjectname; ?></option>
						<?php
						}
						?>
						</select></td>
                    <td width="34%" align="left" class="narmal"><input name="sperfarmance" type="submit" class="bgcolor_02" value="Search" style="cursor:pointer" /></td>
                  </tr>
                  <tr>
                    <td colspan="7" class="narmal">&nbsp;</td>
                  </tr>
				  
                  <tr>
                    <td colspan="7" class="narmal">
					<?php
				  if(isset($sperfarmance))
				  {
				  ?>
					<table width="100%" border="1" cellspacing="0" cellpadding="1" class="tbl_grid">
					<?php
					if($no_rows=='0')
					{
					?>
					<tr><td colspan="4" align="center" class="error_messages"><?php echo $nill1 ; ?></td></tr>
					<?php
					}
					else
					{
					?>
                      <tr>
                        <td width="6%" height="20" class="bgcolor_02" align="center"><div align="center"><strong>&nbsp;SNo </strong></div></td>
                        <td width="13%" class="bgcolor_02" align="center"><div align="center"><strong>&nbsp;Student Name </strong></div></td>
                        <td width="20%" class="bgcolor_02" align="center"><div align="center"><strong>&nbsp;&nbsp;Subject Name </strong></div></td>
                        <td width="13%" class="bgcolor_02" align="center"><div align="center"><strong>&nbsp;Subject Marks</strong></div></td>
                        
                     </tr>
					  <?php
					  if (isset($marksoptained)&&is_array($marksoptained))
						  {
					  $rownum=1;
					  foreach($marksoptained as $marksoptaineds)
					  {
					  $stdid=$marksoptaineds->es_marksstudentid;
					  $Studentname=$students->Get($stdid);
					  $subjectid=$marksoptaineds->es_markssubjectid ;					  
					  $subjectname1=$subjectname->Get($subjectid);
					   $zibracolor = ($rownum%2==0)?"even":"odd";	
					  ?>
                          <tr class="<?php echo $zibracolor; ?>">
                        <td height="20" align="center"><?php echo $rownum; ?></td>
                        <td align="center"><?php echo $Studentname->pre_name; ?></td>
                        <td align="center"><?php echo $subjectname1->es_subjectname; ?></td>
                        <td align="center"><?php echo $marksoptaineds->es_marksobtined;  ?></td>
                        
                      </tr>
					  <?php
					  $rownum++;}
					  }
					  }
					  ?>                     
                    </table>
					<?php
					}
					
					?>					
					</td>
                  </tr>
                  <tr>
                    <td colspan="7" align="center" class="narmal"><!--<input name="Submit2" type="submit" class="bgcolor_02" value="   Print" />-->
                      <input name="back" type="submit" class="bgcolor_02" value="Cancel" style="cursor:pointer" /></td>
                  </tr>
                </table></td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
    </tr>
				
    </table>
</form>
			
			<?php
			}
			?>
			
		<?php
		/*Fetching his Particular Exam report in Student side*/
		if($action=='classwise'){
		?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr>
  	<td width="1" ></td> 
  	<td height="19" ></td> 
	<td width="1" ></td>
  </tr>
  <tr>
  	<td width="1" class="bgcolor_02"></td>
  	<td height="25"  class="bgcolor_02"><span class="admin">&nbsp;&nbsp;My Results</span></td>
	<td width="1" class="bgcolor_02"></td>
  </tr>
  <tr>
  	<td width="1" class="bgcolor_02"></td>
  	<td height="25" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font></td>
	<td width="1" class="bgcolor_02"></td>
  </tr>
  
  
  <tr>
  	<td width="1" class="bgcolor_02"></td>
  	<td align="left" valign="top">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  		<tr>
				<td colspan="8" align="center">
					<table width="100%" border="1" cellspacing="0" cellpadding="1" class="tbl_grid">
						<form name="exammarkentry" action="" method="POST">
						<tr>
							<td colspan="8">
								<table width="100%" border="0" cellspacing="0" cellpadding="1">
									
									<tr>
										<td class="narmal" width="8%" align="left">&nbsp;Exam&nbsp;&nbsp;</td>
<td width="42%" align="left"><select name="examname" style="width:190px;">
											<option value="" >Select Exam</option>
							<?php 
							
								if (count($exam_data)>0){
									foreach($exam_data as $exm){
							?>
							<option value="<?php echo $exm['es_examid']; ?>"   <?php echo ($exm['es_examid']==$examname)?"selected":""?> ><?php echo $exm['es_examname']; ?></option>
							<?php
									}
								}
							?>				</select>
										  <font color="#FF0000">*</font>										</td>
									  <td height="40" width="50%" align="left" valign="middle" class="narmal"><input name="exam_marks_search" type="submit" class="bgcolor_02" value="Search" style="cursor:pointer" />										</td>
									</tr>
								</table>							</td>
						</tr>
					<?php 
						if (count($sub_data) > 0 && count($reportdetails) > 0){
					?>
							<tr class="bgcolor_02">
								<td width="5%" align="center" height="20" class="admin">SNo</td>
								<td width="15%" align="center" class="admin">Subject</td>
								<td width="25%" align="center" class="admin">Exam Date</td>
								<td width="10%" align="center" class="admin">Duration</td>
							    <td width="10%" align="center" class="admin">Total</td>
								<td width="19%" align="center" class="admin">Pass Marks</td>
								<td width="16%" align="center" class="admin">Marks&nbsp;Obtained</td>
								<td width="16%" align="center" class="admin">Status</td>
							</tr>
						<?php
						 
							$slno = 1;
							foreach($sub_data as $sb)
							{
							if(in_array($sb['es_subjectid'],$subject_id_array))
						{
								$sbid = $sb['es_subjectid'];
	                            if (count($subArray[$sbid]['marks_obtined'])>0) {
								?>
	                        	<tr>
	                                <td align="center"><?php echo $slno;?></td>
									<td align="center" class="narmal"><?php echo $subArray[$sbid]['subject_name'];?></td>
									<td align="center" class="narmal"><?php echo func_date_conversion("Y-m-d H:i:s","d/m/Y",$subArray[$sbid]['exam_date']);?></td>
									<td align="center" class="narmal"><?php echo $subArray[$sbid]['exam_duration'];?></td>
									<td align="center" class="narmal"><?php echo $subArray[$sbid]['total_marks'];?></td>
									<td align="center" class="narmal"><?php echo $subArray[$sbid]['pass_marks'];?></td>
									<td align="center" class="narmal"><?php echo $subArray[$sbid]['marks_obtined'];?></td>
									<td align="center" class="narmal"><?php 
									if($subArray[$sbid]['marks_obtined']>=$subArray[$sbid]['pass_marks']){echo "Pass";}else{echo "Fail";}
									?></td>
						       </tr>
				  <?php 
								}
								$slno++;
				  			} }
				  		?>
				  				<tr>
	                                <td align="right" colspan="4"><strong>Total Marks : </strong></td>
								  <td align="center" class="narmal"><strong><?php echo $tot_total;?></strong></td>
								  <td align="center" class="narmal"><strong><?php echo $tot_pass;?></strong></td>
								  <td align="center" class="narmal"><strong><?php echo $tot_secured;?></strong></td>
								  <td></td>
				          </tr>
						       <tr>
	                                <td align="right" colspan="6"><strong>Percentage : </strong></td>
								 <td align="center" class="narmal"><strong><?php echo number_format($percentagemark,2,'.','');?>%</strong></td>
								 <td></td>
				          </tr>
							   <tr>
							   		<td align="right" colspan="8"><input type="button" class="bgcolor_02" style="cursor:pointer" value="Print" onclick="open_win('?pid=57&action=mark_print<?php echo $printUrl;?>',900,900)" /></td>
							  </tr>		
							   
				  		<?php
						} elseif(isset($exam_marks_search) && !is_array($examdetails) && count($errormessage)==0) {
	?>
							<tr>
								<td colspan="7" align="center">
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
										<tr class='narmal'>
											<td align='center'>No Results Found</td>		
										</tr>
									</table>								</td>
				 		  </tr>
						<?php
							}
						?>
			  			</form>
   			  </table></td>
 		  </tr>

 



	</table>
	<td width="1" class="bgcolor_02"></td>
  </tr>
	
	
	
</table>
			<?php
			}
			?>	
<?php if ($action == 'mark_print') { 
$std_det = $db->getrow("SELECT * FROM es_preadmission WHERE es_preadmissionid=".$student_id);
?>
<table width="100%" border="0">
  <tr>
    <td>
	<table width="100%">
	<tr>
		<td width="9%" align="left" class="adminfont" >Class:</td>
	    <td width="35%" class="narmal" align="left" >&nbsp;&nbsp;&nbsp;<?php echo classname($std_det['pre_class']);?></td>
		<td width="31%" align="right" class="adminfont">Father&nbsp;Name&nbsp;: </td>
		<td width="25%" class="narmal" align="left"><?php echo $std_det['pre_fathername']; ?></td>
	</tr>
	<tr>
		<td width="9%" align="left" class="adminfont" >Reg.No.:</td>
	    <td width="35%" class="narmal" align="left" >&nbsp;&nbsp;&nbsp;<?php echo $student_id; ?></td>
		<td width="31%" align="right" class="adminfont">Student&nbsp;Name&nbsp;:</td>
		<td width="25%" class="narmal" align="left"><?php echo $std_det['pre_name']; ?></td>
	</tr>
		</table>
	</td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="0" >  
				<?php 
						if (count($sub_data) > 0 && count($reportdetails) > 0){
					?>
							<tr class="bgcolor_02">
								<td width="5%" align="center" height="25" class="admin">&nbsp;S&nbsp;No</td>
								<td width="15%" align="center" class="admin">Subject</td>
								<td width="25%" align="center" class="admin">Exam Date</td>
								<td width="10%" align="center" class="admin">Duration</td>
								<td width="10%" align="center" class="admin">Total&nbsp;</td>
								<td width="19%" align="center" class="admin">Pass Marks</td>
								<td width="16%" align="center" class="admin">Marks&nbsp;Obtained&nbsp;</td>
								<td width="16%" align="center" class="admin">Status</td>
							</tr>
						<?php
						 
							$slno = 1;
							foreach($sub_data as $sb)
							{
							if(in_array($sb['es_subjectid'],$subject_id_array))
						{
								$sbid = $sb['es_subjectid'];
								if($subArray[$sbid]['subject_name']!=''){
	                            ?>
	                        	<tr>
	                                <td align="center"><?php echo $slno;?></td>
									<td align="center" class="narmal"><?php echo $subArray[$sbid]['subject_name'];?></td>
									<td align="center" class="narmal"><?php echo func_date_conversion("Y-m-d H:i:s","d/m/Y",$subArray[$sbid]['exam_date']);?></td>
									<td align="center" class="narmal"><?php echo $subArray[$sbid]['exam_duration'];?></td>
									<td align="center" class="narmal"><?php echo $subArray[$sbid]['total_marks'];?></td>
									<td align="center" class="narmal"><?php echo $subArray[$sbid]['pass_marks'];?></td>
									<td align="center" class="narmal"><?php echo $subArray[$sbid]['marks_obtined'];?></td>
									<td align="center" class="narmal"><?php 
									if($subArray[$sbid]['marks_obtined']>=$subArray[$sbid]['pass_marks']){echo "Pass";}else{echo "Fail";}
									?></td
						       ></tr>
				  <?php }
								$slno++;
				  			} }
				  		?>
				  				<tr>
	                                <td align="right" colspan="4"><strong>Total Marks : </strong></td>
								  <td align="center" class="narmal"><strong><?php echo $tot_total;?></strong></td>
								  <td align="center" class="narmal"><strong><?php echo $tot_pass;?></strong></td>
								  <td align="center" class="narmal"><strong><?php echo $tot_secured;?></strong></td>
								    <td></td>
								  
		          </tr>
						       <tr>
	                                <td align="right" colspan="6"><b>Percentage : </b></td>
									<td align="center" class="narmal"><b><?php echo number_format($percentagemark,2,'.','');?>%</b></td>
									  <td></td>
						       </tr>
</table></td>
  </tr>
</table>

				
		

<?php } }
					
					
/*
Performance of the students for his class will come here.
*/			
	if($action=='allstudents'){
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
  </tr>
	<tr>
	     <td height="25" colspan="3" class="bgcolor_02"><table width="95%"><tr class="bgcolor_02"><td align="left">&nbsp;&nbsp;Students Performance</td><td  align="right" valign="top" >Class Teacher for:<?php echo $classname; ?></td></tr></table></td>
	</tr>
	<tr>
  <td width="1" class="bgcolor_02"></td>
         <td height="35" align="right" valign="middle"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font><br /></td>
		 <td width="1" class="bgcolor_02"></td>
  </tr>
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="left" valign="middle">
			<form name="examreports" action="" method="POST">
			<table width="70%" border="0" cellspacing="0" cellpadding="1">
			
		    <tr>
				  <td width="2%" align="right" class="narmal">&nbsp;</td>
				  <td width="33%" align="left" class="narmal">Exam Name&nbsp;</td>
		  <td width="65%" align="left">
<select name="examname" style="width:190px;">
								 <option value="" >Select Exam</option>
								<?php 
								
									if (count($exam_data)>0){
										foreach($exam_data as $exm){
								?>
								<option value="<?php echo $exm['es_examid']; ?>"   <?php echo ($exm['es_examid']==$examname)?"selected":""?> ><?php echo $exm['es_examname']; ?></option>
								<?php
										}
									}
								?>
					   </select>
						  <font color="#FF0000">*</font>					 </td>
			  </tr>
				 <tr>
				   <td class="narmal" align="right">&nbsp;</td>
					 <td class="narmal" align="left">Academic&nbsp;Year&nbsp;</td>
					 <td align="left"><select name="academicyear" style="width:190px;">
							 <option value="" >Select Year</option>
<?php 
	if(count($school_details_res)>0) {	
		foreach ($school_details_res as $school){
?>
		<option value="<?php echo $school['fi_ac_startdate'].$school['fi_ac_enddate']; ?>"   <?php echo ($school['fi_ac_startdate'].$school['fi_ac_enddate']==$academicyear)?"selected":""?> ><?php echo displaydate($school['fi_ac_startdate'])." To ".displaydate($school['fi_ac_enddate']); ?></option>
<?php
		}
	}
?>	
							</select>
					  <font color="#FF0000">*</font></td>
			  </tr>
				<tr>
				  <td align="left" valign="top" class="narmal">&nbsp;</td>
					<td align="left" valign="top" class="narmal">&nbsp;</td>
					<td height="40" align="left" valign="middle" class="narmal"><input name="exam_reports" type="submit" class="bgcolor_02" value="Show Reports" style="cursor:pointer" />	<input name="Submit2" type="reset" class="bgcolor_02" value="Reset" style="cursor:pointer"  /></td>
			  </tr>
			  </table>
		  </form>
	  </td>
			<td width="1" class="bgcolor_02"></td>
  </tr>
  
		<!--  Result of the  search  start -->
		<tr>
			<td width="1" class="bgcolor_02"></td>
			<!--  Result of the  search  Diplay table start -->
			<td align="center">
				<table width="100%" cellpadding="2" cellspacing="0" border="0">
<?php   
	if (is_array($disp_report)&& count($disp_report)>0 && count($errormessage)==0){
		echo        '<tr class="bgcolor_02">
						 <td width="20%" class="admin">Student Name</td>
						 <td  width="80%" class="admin">Marks</td>
			         </tr>';				
		$loop= 0;
		foreach ($disp_report as $eachresult) {
			if ( strlen($eachresult["name"])>0 ){
			if($loop >= $loopstrt && $loop < $loopend) {
?>
		 			<tr>
						<td width="18%"><b><?php 
						echo "Name:". ucwords($eachresult["name"])."<br/>";
						echo "Father Name:". ucwords($eachresult["fathername"])."<br/>";
						echo "Registration No:". ucwords($eachresult["regid"])."<br/>"; ?></b></td>
				    <td width="82%"><?php  //for subjects display
					//array_print($eachresult['subjects'] );
								 if (is_array($eachresult['subjects'])) {
									   ?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tbl_grid">
									   			<tr class="bgcolor_02" >
													<td width="25%" height="23" align="left" valign="middle"><b>&nbsp;Subject</b></td>
												  <td width="31%" height="23" align="left" valign="middle"><b>Max</b></td>
													<td width="24%" height="23" align="left" valign="middle"><b>Min</b></td>
													<td width="20%"  height="23" align="left" valign="middle"><b>Obtained</b></td>
													<td width="20%"  height="23" align="left" valign="middle"><b>Result</b></td>
												</tr>
											<?php 
											
									
											 foreach($eachresult['subjects'] as $eachentity){
											
											 ?>
												<tr>
													<td width="25%" align="left" valign="middle">&nbsp;<?php echo $eachentity['subject_name']."<br>";  
													//echo "gdgj". $eachentity['subject_id']; ?></td>
												  <td width="31%" align="left" valign="middle" ><?php echo $eachentity['total_marks']; ?></td>
													<td width="24%" align="left" valign="middle" ><?php echo $eachentity['pass_marks']; ?></td>
													<td width="20%" align="left" valign="middle" ><?php echo $eachentity['mark_obtined']; ?></td>
													<td width="20%" align="left" valign="middle" ><?php 
													if(is_numeric($eachentity['mark_obtined'])){
													if($eachentity['mark_obtined'] >= $eachentity['pass_marks']){
													 echo "Pass";}else{
													 echo "Fail";}
													 }else{ echo "Fail";}
													 ?></td>
												</tr>
													
											<?php } 
											?>
						  </table>&nbsp;<?php
							} 
						?></td>
				  </tr>
						<tr class="narmal">
							<td align="right">&nbsp;</td>
							<td>
								<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tbl_grid">
									<tr>
										<td width="23%" align="left" valign="middle"><b>&nbsp;Total Marks</b></td>
									  <td width="25%" align="left" valign="middle" ><?php echo $eachresult["total"]; ?></td>
										<td width="20%" align="left" valign="middle" ><?php echo $eachresult["pass_total"]; ?></td>
										<td width="11%" align="left" valign="middle" ><?php echo $eachresult["secured_total"]; ?></td>
										<td width="21%" align="left" valign="middle" ></td>
									</tr> 
							  </table>
							</td>
						</tr>
						<tr class="narmal"><td align="right" colspan="2"><b>Percentage % &nbsp; : &nbsp;</b><?php echo $eachresult["percentage"]; ?></td></tr>
						<tr class="narmal"><td align="right" colspan="2"><hr></td></tr>
<?php	
		}
		$loop++;		
 		}   
 	
	}
 ?>
<tr>
		<td colspan="2" align="center"><?php  echo paginateexte($start, $q_limit, $no_rows, "action=".$action."&classes_id=".$classes_id."&academicyear=".$academicyear."&examname=".$examname); ?>
	</td>
	</tr>
<?php } else if($exam_reports == "Show Reports" && count($disp_report) == 0) {
						echo "<tr>
								<td height='20' align='center' colspan='5' class='narmal'>No records found</td>
							</tr>
							<tr>
								<td height='20' ></td>
							</tr>";
					}
?>	
				</table>			
			</td>
			<!--  Result of the  search  Diplay table ends -->
			<td width="1" class="bgcolor_02"></td>
		<tr>	
		<!--  Result of the  search end -->
		<tr>
			<td height="1" colspan="3" class="bgcolor_02"></td>
		</tr>
</table>




<?php
	}
?>

<?php if($action=='student_exportexam'){?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
  </tr>
	<tr>
		<td height="25" colspan="3" class="bgcolor_02" align="center"><table width="95%"><tr class="bgcolor_02"><td align="left">Export Examination</td><td  align="right" valign="top" ></td></tr></table></td>
	</tr>
	<form action="<?php echo buildurl(array("pid"=>57));?>" method="POST" name="examination">
	<input type="hidden" name="action" value="<?php echo $action?>" >
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td colspan="2" align="right" valign="top"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font><br /></td>
			</tr>
			<tr>
				<td width="18%" height="25" align="left" valign="middle" class="narmal">&nbsp;Exam Name&nbsp;</td>
			  <td width="82%" height="25" align="left" valign="middle"><select name="examname" style="width:190px;">
					 <option value="" >Select Exam</option>
<?php 

	if (count($exam_data)>0){
		foreach($exam_data as $exm){
?>
<option value="<?php echo $exm['es_examid']; ?>"   <?php echo ($exm['es_examid']==$examname)?"selected":""?> ><?php echo $exm['es_examname']; ?></option>
<?php
		}
	}
?>				</select>
			  <font color="#FF0000">*</font></td>
			</tr>
			
			<tr>
				<td height="25" align="left" valign="middle" class="narmal">&nbsp;</td>
				<td height="25" align="left" valign="middle" class="narmal"><input name="exportcreateexam_student" type="submit" class="bgcolor_02" value="Export" style="cursor:pointer"  /></td>
			</tr>
			</table>
		</td>
		<td width="1" class="bgcolor_02"></td>
	</tr>
	</form>
	<tr><td height="1" colspan="3" class="bgcolor_02"></td>
	</tr>
</table>
<?php }?>