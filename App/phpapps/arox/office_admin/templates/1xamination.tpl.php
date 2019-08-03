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

function newWindowOpen(href)
{
    window.open(href, null,'width=900,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');
	

}

</script>
<?php 
if ($action=="createxam"){
/*
*Start of Create Examination Web Page
*/	
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
	 </tr>
	<tr>
		<td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;<span class="admin">Create Examination</span> </strong></td>
	</tr>
	<form action="<?php echo buildurl(array("pid"=>36));?>" method="POST" name="examination">
	<input type="hidden" name="action" value="<?php echo $action?>" >
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="left" valign="top"><table width="100%" border="0" cellspacing="5" cellpadding="0">
	  <tr>
				<td colspan="2" align="right" valign="top"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font><br /></td>
			</tr>
			<tr>
				<td width="23%" align="left" class="narmal">Group&nbsp;</td>
	  <td width="77%" align="left"><select name="groups_id" style="width:190px;"   onchange="JavaScript:document.examination.submit();" onblur="JavaScript:document.examination.submit();">
					<option value="" >Select Group</option>
<?php 
	if (count($c_groups)>0){
		foreach($c_groups as $eachgroup){
?>
<option value="<?php echo $eachgroup['es_groupsid']; ?>"  <?php echo ($eachgroup['es_groupsid']==$groups_id)?"selected":""?> ><?php echo $eachgroup['es_groupname']; ?></option>
<?php

		}
	}
?>		 
				  </select>
				  <font color="#FF0000">*</font></td>
		  </tr>
			<tr>
				<td class="narmal" align="left">Class&nbsp;</td>
	     <td align="left"><select name="classes_id" style="width:190px;">
					 <option value="" >Select Class</option>
<?php 

	if (count($class_data)>0){
		foreach($class_data as $eachclass){
?>
<option value="<?php echo $eachclass['es_classesid']; ?>"   <?php echo ($eachclass['es_classesid']==$classes_id)?"selected":""?> ><?php echo $eachclass['es_classname']; ?></option>
<?php
		}
	}
?>				</select>
			  <font color="#FF0000">*</font></td>
		  </tr>
			<tr>
				<td class="narmal" align="left">Exam Name&nbsp;</td>
	     <td align="left"><select name="examname" style="width:190px;">
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
				<td align="left" valign="top" class="narmal">&nbsp;</td>
				<td height="40" align="left" valign="middle" class="narmal"><input name="exam_next" type="submit" class="bgcolor_02" value="Next" style="cursor:pointer" />
				<input name="Submit2" type="reset" class="bgcolor_02" value="Reset" style="cursor:pointer"  /></td>
		  </tr>
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
if ($action=="createxamexport"){
/*
*Start of Create Examination Web Page
*/	
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
	 </tr>
	<tr>
		<td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;<span class="admin">Export Create Examination</span> </strong></td>
	</tr>
	<form action="<?php echo buildurl(array("pid"=>36));?>" method="POST" name="examinationexport">
	<input type="hidden" name="action" value="<?php echo $action?>" >
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="left" valign="top"><table width="100%" border="0" cellspacing="5" cellpadding="0">
	  <tr>
				<td colspan="2" align="right" valign="top"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font><br /></td>
			</tr>
			<tr>
				<td width="23%" align="left" class="narmal">Group&nbsp;</td>
	  <td width="77%" align="left"><select name="groups_id" style="width:190px;"   onchange="JavaScript:document.examinationexport.submit();">
					<option value="" >ALL</option>
<?php 
	if (count($c_groups)>0){
		foreach($c_groups as $eachgroup){
?>
<option value="<?php echo $eachgroup['es_groupsid']; ?>"  <?php echo ($eachgroup['es_groupsid']==$groups_id)?"selected":""?> ><?php echo $eachgroup['es_groupname']; ?></option>
<?php

		}
	}
?>		 
				  </select>
				  <font color="#FF0000">*</font></td>
		  </tr>
			<tr>
				<td class="narmal" align="left">Class&nbsp;</td>
	     <td align="left"><select name="classes_id" style="width:190px;">
					 <option value="" >ALL Class</option>
<?php 

	if (count($class_data)>0){
		foreach($class_data as $eachclass){
?>
<option value="<?php echo $eachclass['es_classesid']; ?>"   <?php echo ($eachclass['es_classesid']==$classes_id)?"selected":""?> ><?php echo $eachclass['es_classname']; ?></option>
<?php
		}
	}
?>				</select>
			  <font color="#FF0000">*</font></td>
		  </tr>
			<tr>
				<td class="narmal" align="left">Exam Name&nbsp;</td>
	     <td align="left"><select name="examname" style="width:190px;">
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
				<td align="left" valign="top" class="narmal">&nbsp;</td>
				<td height="40" align="left" valign="middle" class="narmal"><input name="exportcreateexam" type="submit" class="bgcolor_02" value="Export" style="cursor:pointer"  /></td>
		  </tr>
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
		<td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;<span class="admin">Create Examination</span> </strong></td>
	</tr>
	<form action="" method="POST" name="examination_next" enctype="multipart/form-data">
	<input type="hidden" name="action" value="<?php echo $action?>" >
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="left" valign="top">
			<table width="100%" border="0" cellspacing="0" cellpadding="2">
				
				<tr>
					<td colspan="7" height="30" align="right" valign="middle"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  All filelds are mandatory <br />
			      <b><?php echo $errmsg;?></b></font></td>
			  </tr>
				<tr class="bgcolor_02">
					<td align="center" valign="middle" width="4%" class="admin">S&nbsp;No</td>
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
							<td align="center" valign="middle" class="narmal"><?php if ($arrSubDetails[$subid]['upload_exam_paper']=="") { ?>
	<input type="file" name="upload_exam_paper[<?php echo $ar;?>]" size="7" value"<?php if ($upload_exam_paper[$ar]!="") 
		  echo $upload_exam_paper[$ar]; 
		  else if($arrSubDetails[$subid]['upload_exam_paper'] !="") 
		  			echo $arrSubDetails[$subid]['upload_exam_paper'];
		  			else echo "";?>"/>
					<?php }
					 else  { ?><a href="documents/<?php echo $arrSubDetails[$subid]['upload_exam_paper'];?>"><img src="images/download.png" alt="download" border="0"/></a> &nbsp; <a href="?pid=36&action=delete_paper&exmid=<?php echo $exmid?>&class_id=<?php echo $class_id?>&exam_detailsid=<?php echo $arrSubDetails[$subid]['es_exam_detailsid']; ?>">Delete</a>
					 <input type="hidden" name="old_exam_paper[<?php echo $arrSubDetails[$subid]['es_exam_detailsid']; ?>]" value="<?php echo $arrSubDetails[$subid]['upload_exam_paper'];?>" />
					 <?php } ?></td>
						</tr>
			<?php
						$cn++;
						$ar++;
					}
			?>
					<tr>
						<td colspan="6" align="center" valign="top">
							<input name="exam_submit" type="submit" class="bgcolor_02" value="Submit" style="cursor:pointer"  />
							<input name="resetexam" type="reset" class="bgcolor_02" value="Reset" style="cursor:pointer"  />
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
  	<td height="6" ></td>
	<td width="1" ></td>
	</tr>
  <tr>
  	<td width="1" class="bgcolor_02"></td>
  	<td height="25"  class="bgcolor_02"><span class="admin">&nbsp;&nbsp;Subjectwise MARKS ENTRY</span></td>
	<td width="1" class="bgcolor_02"></td>
	</tr>
  <tr>
  	<td width="1" class="bgcolor_02"></td>
  	<td align="left" valign="top">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  		<tr>
				<td colspan="8" align="center">
					<table width="100%" border="1" cellspacing="0" cellpadding="1" class="tbl_grid">
						<form name="exammarkentry" action="?pid=36&action=marksentry" method="POST">
						<tr>
							<td colspan="7">
								<table width="100%" border="0" cellspacing="0" cellpadding="1">
							  <tr>
										<td width="20%" align="left" class="narmal">Group&nbsp;</td>
				      <td width="80%" align="left"><select name="groups_id" style="width:190px;" onchange="JavaScript:document.exammarkentry.submit();" onblur="JavaScript:document.exammarkentry.submit();">
											<option value="" >Select Group</option>
						<?php 
							if (count($c_groups)>0){
								foreach($c_groups as $eachgroup){
						?>
						<option value="<?php echo $eachgroup['es_groupsid']; ?>"  <?php echo ($eachgroup['es_groupsid']==$groups_id)?"selected":""?> ><?php echo $eachgroup['es_groupname']; ?></option>
						<?php
						
								}
							}
						?>		 
										  </select>
										  <font color="#FF0000">*</font></td>
								  </tr>
									<tr>
										<td class="narmal" align="left">Class&nbsp;</td>
							     <td align="left"><select name="classes_id" style="width:190px;">
											 <option value="" >Select Class</option>
						<?php 
						
							if (count($class_data)>0){
								foreach($class_data as $eachclass){
						?>
						<option value="<?php echo $eachclass['es_classesid']; ?>"   <?php echo ($eachclass['es_classesid']==$classes_id)?"selected":""?> ><?php echo $eachclass['es_classname']; ?></option>
						<?php
								}
							}
						?>				</select>
									  <font color="#FF0000">*</font></td>
								  </tr>
									<tr>
										<td class="narmal" align="left">Exam Name&nbsp;</td>
							     <td align="left"><select name="examname" style="width:190px;">
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
?>			</select>
									  <font color="#FF0000">*</font></td>
								  </tr>
									<tr>
										<td align="left" valign="top" class="narmal">&nbsp;</td>
										<td height="40" valign="middle" class="narmal"><input name="exam_search" type="submit" class="bgcolor_02" value="Search" style="cursor:pointer" />
										<input name="Submit2" type="reset" class="bgcolor_02" value="Reset" style="cursor:pointer"  /></td>
									</tr>
									
								
								</table>
						  </td>
						</tr>
					<?php 
						if (isset($examdetails) && count($examdetails) > 0){
					?>
						<tr class="bgcolor_02">
							<td width="5%" align="center" height="20" class="admin">S&nbsp;No</td>
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
								<td align="center" class="narmal"><?php echo formatDBDateTOCalender($eachexam['exam_date'],'d/m/Y');?></td>
								<td align="center" class="narmal"><?php echo $eachexam['exam_duration'];?></td>
								<td align="center" class="narmal"><a href="?pid=36&action=entermarks&edmark=<?php echo $eachexam['es_exam_detailsid'];?>&classes_id=<?php echo $classes_id;?>&groups_id=<?php echo $groups_id; ?>&examname=<?php echo $examname; ?>&academicyear=<?php echo $academicyear; ?>&subject_sud_total=<?php echo $eachexam['total_marks'];?>&ed=<?php echo $eachexam['exam_date'];?>&enter_subject_id=<?php echo $eachexam['es_subjectid'];?>" class="video_link"><b>Enter Marks</b></a></td>
					
				  			</tr>
			  <?php 	}
					} else if($exam_search == "Search" && count($examdetails) == 0) {
						echo "<tr class='bgcolor_02'>
								<td height='20' align='center' colspan='7' class='narmal'><b>No Data Found for this Search</b></td>
							</tr>
							<tr>
								<td height='20' ></td>
							</tr>";
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
/*
*From Here Student Marks can be entered individually
*/	
	if ($action=="stdmarksentry" || $action=="stdmarksentryprint"){
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr>
  	<td width="1" ></td> 
  	<td height="6" ></td><td width="1" ></td>
	</tr>
  <tr>
  	<td width="1" class="bgcolor_02"></td>
  	<td height="25"  class="bgcolor_02"><span class="admin">&nbsp;&nbsp;Studentwise Marks Entry</span></td>
	<td width="1" class="bgcolor_02"></td>
	</tr>
  <tr>
  	<td width="1" class="bgcolor_02"></td>
  	<td align="left" valign="top">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  		<tr>
				<td colspan="8" align="center">
					<table width="100%" border="1" cellspacing="0" cellpadding="1" class="tbl_grid">
						<form name="stdmarkentry" action="" method="POST">
						<tr>
							<td colspan="5">
							<?php if($action!="stdmarksentryprint"){?>
								<table width="100%" border="0" cellspacing="1" cellpadding="1">
							  <tr>
										<td class="narmal" width="12%" align="left">Class&nbsp;</td>
							     <td width="36%" align="left"><select name="classes_id" style="width:190px;" onchange="JavaScript:document.stdmarkentry.submit();" onblur="JavaScript:document.stdmarkentry.submit();">
											 <option value="" >Select Class</option>
						<?php 
						
							if (count($class_data)>0){
								foreach($class_data as $eachclass){
						?>
						<option value="<?php echo $eachclass['es_classesid']; ?>"   <?php echo ($eachclass['es_classesid']==$classes_id)?"selected":""?> ><?php echo $eachclass['es_classname']; ?></option>
						<?php
								}
							}
						?>				</select>
									  <font color="#FF0000">*</font></td>
									  <td class="narmal" width="17%" align="left">Registration&nbsp;No.&nbsp;SM</td>
							     <td width="35%" align="left"><select name="regd_no" style="width:190px;">
											 <option value="" >Select Student</option>
						<?php 
						
							if (count($allstudents)>0){
								foreach($allstudents as $eachstd){
						?>
						<option value="<?php echo $eachstd['es_preadmissionid']; ?>"   <?php echo ($eachstd['es_preadmissionid']==$regd_no)?"selected":""?> ><?php echo $eachstd['es_preadmissionid']; ?></option>
						<?php
								}
							}
						?>				</select>
									  <font color="#FF0000">*</font></td>
								  </tr>
									<tr>
										<td class="narmal" align="left">Exam&nbsp;Name&nbsp;</td>
							     <td align="left"><select name="examname" style="width:190px;">
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
?></select>
									  <font color="#FF0000">*</font></td>
								  </tr>
									<tr>
										<td align="left" colspan="2" valign="top" class="narmal">&nbsp;</td>
										<td height="40" colspan="2" valign="middle" class="narmal"><input name="search_stdnt" type="submit" class="bgcolor_02" value="Search" style="cursor:pointer" />&nbsp;<input name="Submit2" type="reset" class="bgcolor_02" value="Reset" style="cursor:pointer"  /></td>
									</tr>
									
								
								</table>
							<?php }?>
						  </td>
						</tr>
						<tr>
							<td height="20" colspan="5" align="left" valign="middle">Reg No : <?php echo $allstudent['es_preadmissionid']; 
							if($allstudent['es_preadmissionid']!='')
							{
							$subject_str=$db->getRow("SELECT * FROM es_preadmission EP,es_preadmission_details EPD,subjects_cat SC WHERE EPD.scat_id=SC.scat_id AND  EP.es_preadmissionid=EPD.es_preadmissionid AND EP.pre_class=EPD.pre_class AND EP.es_preadmissionid=".$allstudent['es_preadmissionid']);
			
			if($subject_str['subject_id_array']!=''){
			$subject_id_array=explode('@#@#@',$subject_str['subject_id_array']);
			}
			}
							
							?></td>											
						</tr>
						<tr>
							<td height="20" colspan="5" align="left" valign="middle">Student Name : <?php echo $allstudent['pre_name']; ?></td>											
						</tr>
						<tr>
							<td height="20" colspan="5" align="left" valign="middle">Father Name : <?php echo $allstudent['pre_fathername']; ?></td>											
						</tr>
						<tr>
							<td height="20" colspan="5" align="left" valign="middle">Class : <?php echo $classnamearray[$allstudent['pre_class']]; ?></td>											
						</tr>						
					<?php 
						if (isset($allsubjects) && count($allsubjects) > 0){
					?>
						<tr class="bgcolor_02">
							<td width="10%" align="center" height="20" class="admin">S No</td>							
							<td width="30%" align="center" class="admin">Subject Name</td>
							<td width="15%" align="center" class="admin">Total Marks</td>
							<td width="15%" align="center" class="admin">Pass Marks</td>
							<td width="30%" align="center" class="admin">Marks Obtained</td>
						</tr>
					<?php 
					  $i = 0;
						foreach($allsubjects as $sbj){
							$sb_id = $sbj['es_subjectid'];
							if(in_array($sb_id,$subject_id_array))
							{
							 $i++;
						?>
							<tr>
								<td height="20" align="center" class="narmal"><?php echo $i; ?></td>								
								<td align="center" class="narmal"><?php echo $sbj['es_subjectname'];?></td>								
								<td align="center" class="narmal"><?php echo $arrStudents[$sb_id]['total_marks'];?></td>
								<td align="center" class="narmal"><?php echo $arrStudents[$sb_id]['pass_marks'];?></td>
								<td align="center" class="narmal">
								    <input type="hidden" name="sub_sud_tot[<?php echo $i; ?>]" value="<?php echo $arrStudents[$sb_id]['total_marks']; ?>">
									<input type="hidden" name="exm_dtl[<?php echo $i; ?>]" value="<?php echo $arrStudents[$sb_id]['exm_dtl_id']; ?>">
									<input type="hidden" name="student_marksid[<?php echo $i; ?>]" value="<?php if(isset($arrStudents[$sb_id]['marks_id']) && $arrStudents[$sb_id]['marks_id'] > 0) echo $arrStudents[$sb_id]['marks_id']; ?>">
									<?php if($action!="stdmarksentryprint"){?>
									<input type="text" name="marksobtnd[<?php echo $i; ?>]" value="<?php if(isset($arrStudents[$sb_id]['mark_obtnd']) && $arrStudents[$sb_id]['mark_obtnd'] !="") echo $arrStudents[$sb_id]['mark_obtnd']; ?>" size="10">
									<?php }else{ if(isset($arrStudents[$sb_id]['mark_obtnd']) && $arrStudents[$sb_id]['mark_obtnd']!="") echo $arrStudents[$sb_id]['mark_obtnd'];}?>
								</td>
					
				  			</tr>
			  <?php 	} }
			  ?>
			  				<tr>
								<td height='20' align='center' colspan='5' class='narmal'>
								<?php if($action!="stdmarksentryprint"){?>
									<input type="submit" name="submit_std_mrk" value="Submit Marks" class="bgcolor_02" style="cursor:pointer" >
<script>
function sendprint(MyWin)
    {
	winpopup=window.open(MyWin,'print','height=600,width=800,menubar=no,scrollbars=yes,status=no,toolbar=no,sereenX=100,screenY=0,left=100,top=0,class=text');	
	winpopup.moveTo(111,25);
	}
</script>
									<a href="javascript:sendprint('?pid=36&action=stdmarksentryprint&search_stdnt=Search&classes_id=<?php echo $classes_id; ?>&regd_no=<?php echo $regd_no; ?>&examname=<?php echo $examname; ?>&academicyear=<?php echo $academicyear; ?>')" class="bgcolor_02" style="text-decoration:none; padding:2px;">Print</a>
									<?php }?>
								</td>
							</tr>
			  <?php
					 } else if($exam_search == "Search" && count($examdetails) == 0) {
						echo "<tr class='bgcolor_02'>
								<td height='20' align='center' colspan='5' class='narmal'><b>No Data Found for this Search</b></td>
							</tr>
							<tr>
								<td height='20' ></td>
							</tr>";
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
if ($action=="entermarks" || $action=="entermarksprint"){
?>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" >
		<tr>
		  	<td height="6" ></td></tr>
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
																<a href="?pid=36&action=marksentry&groups_id=<?php echo $groups_id; ?>&classes_id=<?php echo $classes_id; ?>&examname=<?php echo $examname; ?>&academicyear=<?php echo $academicyear; ?>&exam_search=Search" class="bgcolor_02" style="text-decoration:none; padding:2px;">Back</a>																
															
															<script>
															function sendprint(MyWin)
																{
																winpopup=window.open(MyWin,'print1','height=600,width=800,menubar=no,scrollbars=yes,status=no,toolbar=no,sereenX=100,screenY=0,left=100,top=0,class=text');	
																winpopup.moveTo(111,25);
																}
															</script>
															<a href="javascript:sendprint('?pid=36&action=entermarksprint&edmark=<?php echo $edmark; ?>&classes_id=<?php echo $classes_id; ?>&groups_id=<?php echo $groups_id; ?>&examname=<?php echo $examname; ?>&academicyear=<?php echo $academicyear; ?>&ed=<?php echo $ed;?>')" class="bgcolor_02" style="text-decoration:none; padding:2px;">Print</a>
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
if ($action=="uploadmarks"){
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" >
	<tr>
	  	<td height="6" ></td></tr>
	<tr>
	  	<td valign="top">
	  		<table width="100%" border="1" cellspacing="0" cellpadding="0" class="tbl_grid">
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
															<input type="submit" name="upload_std_marks"style="cursor:pointer"  id="upload_std_marks" class="bgcolor_02" value="Submit" <?php echo $disabled;?>>
															<input type="button" name="resetstd_marks" style="cursor:pointer"  class="bgcolor_02" value="Back" onclick="javascript:history.go(-1);">
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
  
  if($action=='genaretemarks')
  {
  ?>
  <form action="" method="post" name="getmarks">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong> &nbsp;&nbsp;&nbsp;Generate </strong></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="36%" align="center"><a href=" ?pid=36&action=report" target="_blank"><img src="images/school.jpg" alt="report" width="150" height="96" border="0" /></a></td>
                        <td width="2%">&nbsp;</td>
                        <td width="42%" align="center"><a href=" ?pid=36&action=report1"target="_blank"><img src="images/school1.jpg" alt="report1" width="150" height="96" border="0" /></a></td>
                      </tr>
                      <tr>
                        <td align="center" class="narmal"><input name="radiobutton" type="radio" value="1" />                          
                          Format1</td>
                        <td class="narmal">&nbsp;</td>
                        <td align="center" class="narmal"><input name="radiobutton" type="radio" value="2" />
                          Format2</td>
                      </tr></table>
                      <table width="100%" border="0" cellspacing="0" cellpadding="0"><tr></tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td><table width="100%" border="0" cellspacing="4" cellpadding="0">
                      <tr>
                        <td width="9%" class="narmal">Class</td>
                        <td width="18%" class="narmal"><select name="classes_id" style="width:190px;">
					 <!--<option value="all" >All</option>-->
<?php 

	if (count($class_data)>0){
		foreach($class_data as $eachclass){
?>
<option value="<?php echo $eachclass->es_classname; ?>"<?php echo ($eachclass->es_classname==$classes_id)?"selected":""?> ><?php echo $eachclass->es_classname; ?></option>
<?php
		}
	}
?>				</select></td>
                        <!--<td width="10%" class="narmal">Section</td>
                        <td width="17%" class="narmal"><input name="textfield2" type="text" size="10" /></td>-->
                        <td width="19%" class="narmal">Name &amp; Exam </td>
                        <td width="16%" class="narmal"><select name="result_serchnameofexam">
						<?php
						foreach ($examname as $examnameresults)
						{
						?>
						<option value="<?php echo $examnameresults->es_examinationsId;?>"><?php echo $examnameresults->examname; ?></option>
						<?php
						}
						?>
						</select></td>
                        <td width="11%" class="narmal"><input name="serchexamresults" type="submit" class="bgcolor_02" value="Search" style="cursor:pointer" /></td>
                      </tr>
                    </table></td>
                  </tr>
				  <?php
				  if(isset($serchexamresults)||$action1=='marksexam')
				  {
				  ?>
				  
                  <tr>
                     <td height="40" align="left" valign="middle" class="adminfont"><a href="javascript:SetChecked(1,'checkbox[]')">Check All</a>/<a href="javascript:SetChecked(0,'checkbox[]')">UnCheck</a> </td>
                  </tr>
                  <tr>
                    <td><table width="100%" border="1" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="4%" class="bgcolor_02">&nbsp;</td>
                        <td width="7%" class="bgcolor_02"><strong>&nbsp;S No </strong></td>
                        <td width="22%" class="bgcolor_02" align="center"><strong>&nbsp;&nbsp;&nbsp;Reg No</strong></td>
                        <td width="24%" class="bgcolor_02"><strong>&nbsp;Student Name </strong></td>
                        <td width="23%" class="bgcolor_02"><strong>&nbsp;Total Marks Obtained </strong></td>
                        <td width="20%" class="bgcolor_02"><strong>&nbsp;&nbsp;Maximum Marks </strong></td>
                      </tr>
					  <?php
					  $rownum=1;
					  foreach($marksoptained as $marksoptaineds)
					  {
					  $sid=$marksoptaineds->es_marksstudentid;
					  $Studentname=$students->Get($sid);
					  $subjectid=$marksoptaineds->es_marksexamid ;					  
					  $subjectname1=$obj_exam->Get($subjectid);
					  ?>
                      <tr>
                        <td><input type="checkbox" name='checkbox[]' id='checkbox' value="<?php echo $marksoptaineds->es_marksId; ?>" /></td>
                        <td align="center"><?php echo $rownum; ?></td>
                        <td align="center">SM_<?php echo $marksoptaineds->es_marksstudentid; ?></td>
                        <td align="center"><?php echo $Studentname->pre_student_username; ?></td>
                        <td align="center"><?php echo $marksoptaineds->es_marksobtined; ?></td>
                        <td align="center"><?php echo $subjectname1->minmarks; ?></td>
                      </tr>
					  <?php
					  $rownum++; }
					  ?>
					  <tr>
<td colspan="6" align="center"><?php paginateexte($start, $q_limit, $no_rows, "&action=genaretemarks&action1=marksexam&classes_id=".$classes_id."&result_serchnameofexam=".$result_serchnameofexam."&asds_order=".$asds_order) ?></td>
				  </tr>
                      
                    </table></td>
                  </tr>
<?php
}
?>
                   <tr>
                    <td height="40" align="center"><input name="Submitprint" type="submit" class="bgcolor_02" value="Print" style="cursor:pointer" />
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
			
	<script language = "Javascript">
<!-- 
/**
 * DHTML check all/clear all links script. Courtesy of SmartWebby.com (http://www.smartwebby.com/dhtml/)
 */

var form='getmarks' //Give the form name here

function SetChecked(val,chkName) {
dml=document.forms[form];
len = dml.elements.length;
var i=0;
for( i=0 ; i<len ; i++) {
if (dml.elements[i].name==chkName) {
dml.elements[i].checked=val;
}
}
}

function ValidateForm(dml,chkName){
len = dml.elements.length;
var i=0;
for( i=0 ; i<len ; i++) {
if ((dml.elements[i].name==chkName) && (dml.elements[i].checked==1)) return true
}
alert("Please select at least one record to be deleted")
return false;
}
// -->

</script>			 		
			
  <?php
  }
  ?>
  <?php
  if($action=='report')
  {
  ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<strong>Report</strong></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td colspan="3" align="left" valign="top"><table width="100%" border="0" cellspacing="3" cellpadding="0">
                      
                      <tr>
                        <td width="4587550%" colspan="5"><table width="100%" border="0" cellspacing="3" cellpadding="0">
                          <tr>
                            <td width="29%" align="right" class="narmal">Class</td>
                            <td width="30%" class="narmal"><input type="text" name="textfield" /></td>
                            <td width="33%" class="narmal"><input name="Submit2" type="submit" class="bgcolor_02" value="Submit" style="cursor:pointer" /></td>
                            <td width="8%">&nbsp;</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td class="narmal">&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                          </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td colspan="5" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td><table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
                              <tr>
                                <td width="8%" height="25" class="bgcolor_02"><strong>&nbsp;&nbsp;S No</strong></td>
                                <td width="14%" class="bgcolor_02">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Name</strong></td>
                                <td width="10%" class="bgcolor_02">&nbsp;&nbsp;&nbsp;&nbsp;<strong>Class</strong></td>
								<td width="12%" class="bgcolor_02">&nbsp; <strong>Phone No  </strong></td>
								<td width="16%" class="bgcolor_02">&nbsp; <strong>Registered</strong></td>
								<td width="17%" class="bgcolor_02">&nbsp;<strong> Test Result </strong>&nbsp;</td>
                                <td width="23%" class="bgcolor_02"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Details </strong></td>
                              </tr>
                              <tr>
                                <td align="center" class="narmal">101</td>
                                <td align="center" class="narmal">xyz</td>
                                <td align="center" class="narmal">XA</td>
                                <td align="center" class="narmal">132132</td>
								 <td align="center" class="narmal">yes</td>
								 <td align="center" class="narmal">qualified</td>
								  <td align="center" class="narmal"> view</td>
                              </tr>
                              <tr>
                                <td class="narmal">&nbsp;</td>
                                <td class="narmal">&nbsp;</td>
                                <td class="narmal">&nbsp;</td>
                                <td class="narmal">&nbsp;</td>
								 <td class="narmal">&nbsp;</td>
								  <td class="narmal">&nbsp;</td>
								   <td class="narmal">&nbsp;</td>
                              </tr>
                              <tr>
                                <td class="narmal">&nbsp;</td>
                                <td class="narmal">&nbsp;</td>
                                <td class="narmal">&nbsp;</td>
                                <td class="narmal">&nbsp;</td>
								 <td class="narmal">&nbsp;</td>
								  <td class="narmal">&nbsp;</td>
								   <td class="narmal">&nbsp;</td>
                              </tr>
								
                            </table></td>
                          </tr>
                          
                        </table></td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td width="9%" align="left" valign="top">&nbsp;</td>
                    <td width="61%" align="left" valign="top">&nbsp;</td>
                    <td width="30%" align="left" valign="top" class="narmal">Total&nbsp;:&nbsp;50</td>
                  </tr>
                </table></td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
    </tr>
</table>
<?php
}
   if ($action=='report1')
{
?>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;Report</strong></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="3" cellpadding="0">
                  <tr>
                    <td colspan="4"><table width="100%" border="0" cellspacing="5" cellpadding="0">
                      <tr>
                        <td width="14%" class="narmal">Reg No </td>
                        <td width="26%" class="narmal"><input type="text" name="textfield" /></td>
                        <td width="14%" class="narmal">Reg Name </td>
                        <td width="27%" class="narmal"><input type="text" name="textfield2" /></td>
                        <td width="19%" class="narmal"><input name="Submit" type="submit" class="bgcolor_02" value="Search" style="cursor:pointer" /></td>
                      </tr>
                    </table></td>
                  </tr>
				  <tr>
                    <td colspan="4" align="center" class="adminfont">School Name </td>
                  </tr>
				  <tr>
                    <td colspan="4" align="center" class="adminfont">(Board of Education) </td>
                  </tr>
				  <tr>
                    <td colspan="4" align="center" class="admin">(Statement of Marks) </td>
                  </tr>
				  <tr>
                    <td width="17%" class="narmal">&nbsp;&nbsp;&nbsp;Class</td>
                    <td width="35%" class="narmal">xxxxxxxxxxxxx</td>
                    <td width="22%" class="narmal">Year</td>
                    <td width="26%" class="narmal">xxxxxxxxx</td>
				  </tr>
				  <tr>
                    <td class="narmal">&nbsp;&nbsp;&nbsp;Name</td>
                    <td class="narmal">xxxxxxxxxxxxxxxxx</td>
                    <td class="narmal">Reg No </td>
                    <td class="narmal">xxxxxxxxxxxx</td>
				  </tr>
                  <tr>
                    <td colspan="4" class="narmal">&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="4" class="narmal"><table width="100%" border="1" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="6%" height="20" class="bgcolor_02"><strong>&nbsp;&nbsp;Code</strong></td>
                        <td width="28%" class="bgcolor_02"><strong>&nbsp;&nbsp;Subject/s</strong></td>
                        <td width="19%" class="bgcolor_02"><strong>&nbsp;Marks Awarded </strong></td>
                        <td width="19%" class="bgcolor_02"><strong>&nbsp;  &nbsp;Passing Minimum</strong></td>
                        <td width="18%" class="bgcolor_02"><strong>&nbsp; Maximum Marks </strong></td>
                        <td width="10%" class="bgcolor_02"><strong> &nbsp; </strong><strong>&nbsp;&nbsp;Result </strong><strong>&nbsp;&nbsp;</strong></td>
                      </tr>
                      <tr>
                        <td height="20">101</td>
                        <td>xxxxx</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td height="20">102</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td height="20">103</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td height="40" colspan="4" align="center" valign="middle" class="narmal"><input name="Submit2" type="submit" class="bgcolor_02" style="cursor:pointer"  value="Print" />
                      <input name="Submit3" type="submit" class="bgcolor_02" style="cursor:pointer"  value=" Cancel" /></td>
                  </tr>
                  <tr>
                    <td colspan="4" align="left" class="narmal">&nbsp;</td>
                  </tr>
                </table></td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
              </tr>
            </table>
<?php
}
if ($action=='classwise' || $action=='classwise1'){
?>
		<form action="" method="post" name="classwise">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Classwise Performation</span></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
                    <td height="10" colspan="7" valign="middle" class="narmal"></td>
                  </tr>
                  <tr>
                    <td width="9%" valign="middle" class="narmal">&nbsp;Class</td>
                    <td width="14%" valign="middle" class="narmal"><select name="classes_id" style="width:190px;"><?php if (count($class_data)>0){foreach($class_data as $eachclass){?><option value="<?php echo $eachclass->es_classname; ?>"<?php echo ($eachclass->es_classname==$classes_id)?"selected":""?> ><?php echo $eachclass->es_classname; ?></option><?php }}?>	</select> </td>
                    <td width="12%" align="left" valign="middle" class="narmal">Exam Name</td>
                    <td width="12%" align="left" valign="middle" class="narmal"><select name="result_serchnameofexam">
						<?php
						foreach ($examname as $examnameresults)
						{
						?>
						<option value="<?php echo $examnameresults->es_examinationsId;?>"<?php echo ($examnameresults->es_examinationsId==$result_serchnameofexam)?"selected":""?>><?php echo $examnameresults->examname; ?></option>
						<?php
						}
						?>
						</select></td>
                    <td width="34%" align="left" valign="middle" class="narmal"><input name="classwiseserch" type="submit" style="cursor:pointer"  class="bgcolor_02" value="Search" /></td>
                  </tr>
				   <?php
				  if(isset($classwiseserch)|| $action=='classwise1')
                   {
				   ?>
				   <?php
				  if($no_rows==0)
				  {
				  ?>
				  <tr>
                    <td colspan="7" class="narmal" align="center">&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="7" class="error_messages" align="center">No Recards Find Your Serch Critiria</td>
                  </tr>
				   <tr>
                    <td colspan="7" class="narmal" align="center">&nbsp;</td>
                  </tr>
				  <?php
				  }
				  ?>	
				   <?php
				  $rownum=1;
					  foreach($studenarr as $marksoptaineds)
					  {
					  $sid=$marksoptaineds['es_marksstudentid'];
					
					  $Studentname=$students->Get($sid);
					  
				  ?>
				  			  
                  <tr>
                    <td colspan="7" class="narmal" align="center">
					<table width="97%" border="1" cellspacing="0" cellpadding="5" class="tbl_grid" >
                      <tr><td width="50%" height="20" align="left" class="adminfont">S No</td>
                      <td width="50%" align="left"><?php echo $rownum; ?></td>
                      </tr>
                        <tr><td width="37%" align="left" class="adminfont">Reg&nbsp;No</td>
                        <td align="left">SM_<?php echo $marksoptaineds['es_marksstudentid']; ?></td>
                        </tr>
                        <tr><td width="37%" align="left"  class="adminfont" >Student&nbsp;Name</td>
                        <td align="left"><?php echo $Studentname->pre_name;  ?></td></tr>
						<?php
						$subjectnames=$marks ->GetList(array(array("es_marksstudentid", "=", $sid ),array("es_marksexamid", "=", $result_serchnameofexam)));
						$sql1="SELECT sum(es_marksobtined) FROM `es_marks` where es_marksstudentid ='".$sid ."' and es_marksexamid ='".$result_serchnameofexam."'";
						
						$totalmarks = $db->getRows($sql1);
						foreach($totalmarks as $totalmarks1)
					  {
					    $totalmarksop=$totalmarks1['sum(es_marksobtined)'];
						}
						
						foreach($subjectnames as $subjectnameslist)
						{
						$subjectid=$subjectnameslist->es_markssubjectid;					  
					  $subjectname1=$subjectname->Get($subjectid);
					  
						?>
                        <tr><td width="37%" align="left"  class="adminfont"><?php echo $subjectname1->es_subjectname; ?></td>
						
                        <td align="left"><?php echo $subjectnameslist->es_marksobtined; ?></td></tr>
						<?php
						}
						?>
                        <!--<tr><td width="37%" align="center">Subject2</td>
                        <td>&nbsp;</td></tr>-->
                        <tr><td width="37%" align="left"  class="adminfont">Total&nbsp;Marks&nbsp;OBT</td>
                        <td align="left"><?php echo $totalmarksop ; ?></td></tr>
                     </table></td>
                  </tr>
				  <tr><td colspan="7" class="narmal"></td></tr>
				  <?php
				 $rownum++; }
				 
				?>
				   <tr>
<td colspan="7" align="center"><?php paginateexte($start, $q_limit, $no_rows, "&action=classwise1&column_name=".$orderby."&asds_order=".$asds_order."&classes_id=".$classes_id."&result_serchnameofexam=".$result_serchnameofexam) ?></td>
				  </tr>
				  <?php
				   }
				  ?>
                  <tr>
                    <td colspan="7" align="center" class="narmal"><input name="Submit2" style="cursor:pointer"  type="submit" class="bgcolor_02" value="Print" onclick="window.print();" />
                       &nbsp;
                       <input name="back" type="submit" class="bgcolor_02" style="cursor:pointer"  value="Cancel" /> &nbsp;</td>
					   
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
			if($action=='yearwise' || $action=='classwisestudent'|| $action=='studentwise')
			{
			?>
			<form action="" name="form" method="post">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong> &nbsp;&nbsp;&nbsp;Yearly Student Record </strong></td>
              </tr>
              <tr>
                
                <td width="100%" align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table width="95%" border="0" cellspacing="3" cellpadding="0">
                      <tr>
                        <td colspan="9">&nbsp;</td>
                      </tr>
                      <tr>
                        <td width="9%" class="adminfont">Class</td>
                        <td width="9%" class="narmal"><select name='sm_class' style="width:130px;" onchange="goto_URL(this.form.sm_class);">
                            <option value="all" >Select</option>
<?php 

	if (count($allClasses)>0){
	
		foreach($allClasses as $eachClass){
?>
<option value=" ?pid=36&action=classwisestudent&sid=<?php echo $eachClass['es_classname']; ?>"  <?php echo ($eachClass['es_classname']==$sid)?"selected":""?>><?php echo $eachClass['es_classname']; ?></option>
<?php

		}
	}
?></select></td>
                        
                        <td width="11%" align="left" class="adminfont">Reg .No </td>
                        <td width="11%" align="left" class="narmal"><select name='studentid' style="width:130px;" onchange="goto_URL(this.form.studentid);">
                            <option value="all" >Select</option>
<?php 

	if (count($classwisestudent)>0){
	
		foreach($classwisestudent as $classwisestudents){
?>
<option value=" ?pid=36&action=studentwise&stid=<?php echo $classwisestudents['es_preadmissionid']; ?>&sid=<?php echo $sid ?>"  <?php echo ($classwisestudents['es_preadmissionid']==$stid)?"selected":""?>>student_<?php echo $classwisestudents['es_preadmissionid']; ?></option>
<?php

		}
	}
?></select></td>
                       <td width="12%" align="left" class="narmal"><input name="resultserch" type="submit" style="cursor:pointer"  class="bgcolor_02" value="Search" /></td>
                      </tr>
					  <?php
					  if(isset($resultserch))
					  {
					  ?>
                      <tr>
                        <td colspan="2" class="adminfont">Reg No </td>
                        <td colspan="7" class="narmal">SM_<?php echo $stid ;?></td>
                      </tr>
                      <tr>
                        <td colspan="2" class="adminfont">Student Name </td>
                        <td colspan="7" class="narmal"><?php echo $name['pre_name'];?></td>
                      </tr>
                      <tr>
                        <td colspan="2" class="adminfont">Class</td>
                        <td colspan="7" class="narmal"><?php echo $sid; ?></td>
                      </tr>
                      
                      <tr>
                        <td height="20" colspan="9" align="center" class="narmal">&nbsp;</td>
                      </tr>
					  <?php
					  }
					  ?>
                    </table></td>
                  </tr>
				  <?php
					  if(isset($resultserch))
					  {
					  ?>
                      <tr>
                  <tr>
                    <td><table width="100%" border="1" cellspacing="0" cellpadding="0">
                      
                        <!--<td width="11%" height="20" class="bgcolor_02"><strong>Subject</strong></td>-->
						
						<?php
						foreach ($examids as $examnameid)
						{
						$year=date(Y);
						$exids=$examnameid['es_marksexamid'];
						$examnames =$obj_exam ->Get($exids);
						?>
						<tr>
						<td width="10%" class="bgcolor_02" colspan="4"><strong><?php  echo $examnames->examname; ?></strong></td>
						</tr>
						<?php
						foreach ($examids as $examnameid)
						{
					 $sqlq1="SELECT * from es_marks where`es_marksexamid`='".$examnameid['es_marksexamid']."' and year='".$year."' and es_marksstudentid='".$stid."'";
                         $resultexamids = $db->getRows($sqlq1);
						foreach ($resultexamids as $resultexamid){
						$id=$resultexamid['es_markssubjectid'];
						 
						  $sqlq2="SELECT count(es_marksobtined) from es_marks where`es_marksexamid`='".$exids."' and es_markssubjectid='". $resultexamid['es_markssubjectid']."' and es_marksstudentid='".$stid."' and year='".$year."'";
						  $results=mysql_query($sqlq2);
						  $resultent=mysql_fetch_array($results);
						
						$sids=$resultexamid['es_markssubjectid'];
						$subjectnames =$subjectname ->Get($sids);
						
			
						?>
	                <td height="20" class="narmal">&nbsp;<?php echo $subjectnames->es_subjectname; ?></td>
	                   
						
						<?php
						if($resultent[0]==1)
						{
						?>
                        <td class="narmal"><?php echo $resultexamid['es_marksobtined'] ?></td>
						<?php
						}
						else
						{
						?>
						<td class="narmal"><?php echo $resultent[0] ?></td>
						<?php
						}
						?>
        				<?php
						}
						}
						}
						?>
						
                      </tr>
                      
                    </table></td>
                  </tr>
				  <?php
				  }
				  ?>
				  
                  <tr>
                    <td height="40" align="center"><span class="narmal">
                      <input name="Submit2" type="submit" class="bgcolor_02" value="Print" style="cursor:pointer"  onclick="window.print();"/>
                      <input name="back" type="submit" class="bgcolor_02" value="Cancel" style="cursor:pointer"  />
                    </span></td>
                  </tr>
                </table></td>
                <td width="6" class="bgcolor_02"></td>
              </tr>
              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
              </tr>
            </table>
			</form>
			
			<?php
			}
/*We will get class wise reports*/
	if($action=='allstudents'){
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
	 </tr>
	<tr><td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;<span class="admin">Reports</span> </strong></td></tr>
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="center" valign="top">
			<form name="examreports" action="?pid=36&action=allstudents" method="POST">
			<table width="100%" border="0" cellspacing="0" cellpadding="1">
	      <tr><td height="25" colspan="3">&nbsp;</td></tr>
				<tr>
				  <td width="3%" align="left" class="narmal">&nbsp;</td>
					<td width="13%" align="left" class="narmal">Class&nbsp;</td>
			  <td width="84%" align="left">
<select name="classes_id" style="width:190px;">
							<option value="" >Select Class</option>
							<?php 
											
									if (count($class_data)>0){
										foreach($class_data as $eachclass){
							?>
							<option value="<?php echo $eachclass['es_classesid']; ?>"   <?php echo ($eachclass['es_classesid']==$classes_id)?"selected":""?> ><?php echo $eachclass['es_classname']; ?></option>
											<?php
													}
												}
						?>				</select>
									  <font color="#FF0000">*</font></td>
			  </tr>
				<tr>
				  <td class="narmal" align="left">&nbsp;</td>
					 <td class="narmal" align="left">Exam Name&nbsp;</td>
		  <td align="left">
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
				   <td class="narmal" align="left">&nbsp;</td>
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
					<td height="40" align="left" valign="middle" class="narmal"><input name="exam_reports" style="cursor:pointer"   type="submit" class="bgcolor_02" value="Show Reports" />
						<input name="Submit2" type="reset" class="bgcolor_02" style="cursor:pointer"  value="Reset" /></td>
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
	
	echo        '<tr class="bgcolor_02">
						 <td width="25%" class="admin" align="center">Student Name</td>
						 <td  width="75%" class="admin">Marks</td>
			         </tr>';
					 	
	if (is_array($disp_report) && count($disp_report)>0){
		
		$loop = 0;
	
		foreach ($disp_report as $eachresult) {
			if ( strlen($eachresult["name"])>0 )
			{
if($loop >= $loopstrt && $loop < $loopend) {
?>
		 			<tr>
						<td width="3%" align="left"><b><?php 
						echo "Name:". ucwords($eachresult["name"])."<br/>";
						echo "Father Name:". ucwords($eachresult["fathername"])."<br/>";
						echo "Registration No:". ucwords($eachresult["regid"])."<br/>"; ?></b></td>
						<td width="97%"><?php 
							 //for subjects display
								 if (is_array($eachresult['subjects'])) { ?>
						  <table width="100%" border="1" cellpadding="0" cellspacing="0" class="tbl_grid">
									   			<tr class="bgcolor_02" >
													<td width="40%" height="23"><b>Subject</b></td>
													<td width="20%" height="23"><b>Max</b></td>
													<td width="20%" height="23"><b>Min</b></td>
													<td width="20%"  height="23"><b>Obtained</b></td>
													<td width="20%"  height="23"><b>Result</b></td>
												</tr>
											<?php  
											
											foreach($eachresult['subjects'] as $eachentity) {
											
											
											?>
												<tr>
													<td width="40%"><?php echo $eachentity['subject_name']; ?></td>
													<td width="20%" ><?php echo $eachentity['total_marks']; ?></td>
													<td width="20%" ><?php echo $eachentity['pass_marks']; ?></td>
													<td width="20%" ><?php echo $eachentity['mark_obtined']; ?></td>
													<td width="20%" ><?php 
													if(is_numeric($eachentity['mark_obtined'])){
													if($eachentity['mark_obtined'] >= $eachentity['pass_marks']){
													 echo "Pass";}else{
													 echo "Fail";}
													 }else{ echo "Fail";}
													 ?></td>
												</tr>
											<?php } ?>
						  </table>
					  <?php } ?></td>
				  </tr>
						<tr class="narmal">
							<td align="right">&nbsp;</td>
							<td>
								<table width="100%" border="1" cellpadding="0" cellspacing="0" class="tbl_grid">
									<tr>
										<td width="35%"><b>Total Marks</b></td>
										<td width="17%" ><?php echo $eachresult["total"]; ?></td>
										<td width="17%" ><?php echo $eachresult["pass_total"]; ?></td>
										<td width="31%" ><?php echo $eachresult["secured_total"]; ?></td>
										
									</tr> 
								</table>
							</td>
						</tr>
						<tr class="narmal"><td align="right" colspan="2"><b>Percentage % &nbsp; : &nbsp;</b><?php echo $eachresult["percentage"]; ?></td></tr>
						<tr ><td align="right" colspan="2"><hr /></td></tr>
<?php			
 				
				}
				$loop++;
			}
 	}
 ?>
	<tr>
		<td colspan="2" align="center"><?php  paginateexte($start, $q_limit, $no_rows, "action=".$action."&classes_id=".$classes_id."&academicyear=".$academicyear."&examname=".$examname); ?>
	</td>
	</tr>
	<tr>
		<td colspan="2" align="right">
		<?php if($start!=""){$pageurl="&start=$start";}?>
		<?php if (in_array("17_101", $admin_permissions)) {?>
		<input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=36&action=print_list_allstudents&classes_id=<?php echo $classes_id;?>&academicyear=<?php echo $academicyear;?>&examname=<?php echo $examname.$pageurl;?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /><?php }?></td>
	</tr>
 <?php
}else if($exam_reports && count($disp_report) == 0 && count($errormessage) == 0) {
						echo "<tr>
								<td height='20' align='center' colspan='7' class='narmal'>No Records Found </td>
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
	
	<?php  if($action=="print_list_allstudents"){
	
	$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	       VALUES('".$_SESSION['eschools']['admin_id']."','es_marks','Examination','Reports','','Print','".$_SERVER['REMOTE_ADDR']."',NOW())";
     $log_insert_exe=mysql_query($log_insert_sql);
	?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">

				 
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>	
               <tr>
                <td height="5" colspan="3"  ></td>
              </tr>			  
               <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Report</span></td>
              </tr>	
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="center" valign="top"><br />
				<table width="100%"><tr><td class="admin">Class</td><td ><?php echo classname($classes_id);?></td>
				                        <td class="admin">ExamName</td><td><?php 
										$sel_exams    = "SELECT * FROM `es_exam` WHERE es_examid=".$examname;
	                                    $exam_det= $db->getrow($sel_exams);
										 echo  $exam_det['es_examname'] ;?></td>
										<td class="admin">Academic Year</td><td><?php 
										$from = substr($academicyear,0,10);
	                                    $to = substr($academicyear,10,20);
										$from_ac_d = func_date_conversion("Y-m-d","d/m/Y",$from );
										$to_ac_d = func_date_conversion("Y-m-d","d/m/Y",$to );
										echo $from_ac_d." - ".$to_ac_d ;?></td>
				</tr></table>
				
				<table width="100%" cellpadding="2" cellspacing="0" border="0">
<?php   
	
	echo        '<tr class="bgcolor_02">
						 <td width="25%" class="admin" align="center">Student Name</td>
						 <td  width="75%" class="admin">Marks</td>
			         </tr>';
					 	
	if (is_array($disp_report) && count($disp_report)>0){
		
		$loop = 0;
	
		foreach ($disp_report as $eachresult) {
			if ( strlen($eachresult["name"])>0 )
			{
if($loop >= $loopstrt && $loop < $loopend) {
?>
		 			<tr>
						<td width="3%" align="left"><b><?php 
						echo "Name:". ucwords($eachresult["name"])."<br/>";
						echo "Father Name:". ucwords($eachresult["fathername"])."<br/>";
						echo "Registration No:". ucwords($eachresult["regid"])."<br/>"; ?></b></td>
						<td width="97%"><?php 
							 //for subjects display
								 if (is_array($eachresult['subjects'])) { ?>
						  <table width="100%" border="1" cellpadding="0" cellspacing="0" class="tbl_grid">
									   			<tr class="bgcolor_02" >
													<td width="40%" height="23"><b>Subject</b></td>
													<td width="20%" height="23"><b>Max</b></td>
													<td width="20%" height="23"><b>Min</b></td>
													<td width="20%"  height="23"><b>Obtained</b></td>
													<td width="20%"  height="23"><b>Result</b></td>
												</tr>
											<?php  
											
											foreach($eachresult['subjects'] as $eachentity) {?>
												<tr>
													<td width="40%"><?php echo $eachentity['subject_name']; ?></td>
													<td width="20%" ><?php echo $eachentity['total_marks']; ?></td>
													<td width="20%" ><?php echo $eachentity['pass_marks']; ?></td>
													<td width="20%" ><?php echo $eachentity['mark_obtined']; ?></td>
													<td width="20%" ><?php 
													if(is_numeric($eachentity['mark_obtined'])){
													if($eachentity['mark_obtined'] >= $eachentity['pass_marks']){
													 echo "Pass";}else{
													 echo "Fail";}
													 }else{ echo "Fail";}
													 ?></td>
												</tr>
											<?php } ?>
						  </table>
					  <?php } ?></td>
				  </tr>
						<tr class="narmal">
							<td align="right">&nbsp;</td>
							<td>
								<table width="100%" border="1" cellpadding="0" cellspacing="0" class="tbl_grid">
									<tr>
										<td width="35%"><b>Total Marks</b></td>
										<td width="17%" ><?php echo $eachresult["total"]; ?></td>
										<td width="17%" ><?php echo $eachresult["pass_total"]; ?></td>
										<td width="31%" ><?php echo $eachresult["secured_total"]; ?></td>
										
									</tr> 
								</table>
							</td>
						</tr>
						<tr class="narmal"><td align="right" colspan="2"><b>Percentage % &nbsp; : &nbsp;</b><?php echo $eachresult["percentage"]; ?></td></tr>
						<tr ><td align="right" colspan="2"><hr /></td></tr>
<?php			
 				
				}
				$loop++;
			}
 	}
 ?>
	
 <?php
}else if($exam_reports && count($disp_report) == 0 && count($errormessage) == 0) {
						echo "<tr>
								<td height='20' align='center' colspan='7' class='narmal'>No Records Found </td>
							</tr>
							<tr>
								<td height='20' ></td>
							</tr>";
					}

?>	
				</table>
                
				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
             
               
              
              
  		     <tr><td colspan="3" class="bgcolor_02" height="1"></td></tr>
			  
			  
   
</table>

<?php } ?>
	
	
	<?php
	
	
/*class wise Grahpical Report of pass and Fail*/	
	if($action=='chatreports'){
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
	 </tr>
	<tr><td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;<span class="admin">Examination Reports</span> </strong></td></tr>
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="left" valign="top">
		  <form name="examreports" action="" method="POST">
			<table width="70%" border="0" cellspacing="0" cellpadding="1">
				<tr><td height="25" colspan="3">&nbsp;</td></tr>
				<tr>
				  <td class="narmal" align="left">&nbsp;</td>
					<td class="narmal" align="left">Class&nbsp;</td>
	  <td>
						<select name="classes_id" style="width:190px;">
							<option value="" >Select Class</option>
							<?php 
											
									if (count($class_data)>0){
										foreach($class_data as $eachclass){
							?>
							<option value="<?php echo $eachclass['es_classesid']; ?>"   <?php echo ($eachclass['es_classesid']==$classes_id)?"selected":""?> ><?php echo $eachclass['es_classname']; ?></option>
											<?php
													}
												}
						?>				</select>
									  <font color="#FF0000">*</font></td>
				</tr>
				<tr>
				  <td class="narmal" align="left">&nbsp;</td>
					 <td class="narmal" align="left">Exam Name&nbsp;</td>
<td>
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
				   <td class="narmal" align="left">&nbsp;</td>
					 <td class="narmal" align="left">Academic&nbsp;Year&nbsp;</td>
<td><select name="academicyear" style="width:190px;">
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
					<td height="40" valign="middle" class="narmal"><input name="exam_reports" type="submit" style="cursor:pointer"  class="bgcolor_02" value="Show Reports" />
						<input name="Submit2" type="reset" class="bgcolor_02" style="cursor:pointer"  value="Reset" /></td>
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
            <?php if($classes_id !="" && $examname!="" && $academicyear!=""){?>
				<table width="100%" cellpadding="2" cellspacing="0" border="0">
					<tr><td height="25"  class="bgcolor_02" align="left"><strong>&nbsp;<span class="admin">Subjectwise Report</span> </strong></td></tr>
					<tr>
						<td align="center">
						<?php
							if($cht_data != "")
							echo InsertChart ( "charts/charts.swf", "charts/charts_library", "charts/visit_chart.php?disp=visit&content=$cht_data", 600, 350 );
						?>
						</td>
					</tr>
					<tr>
						<td align="left" height="20"></td>
					</tr>
                    <tr><td height="25"  class="bgcolor_02" align="left"><strong>&nbsp;<span class="admin">Class Total Report <?php 
								 list($from_year,$from_month,$from_date,$to_month,$to_date) = split('-',$academicyear);
  
								 echo substr($from_date,-6,2)."/".$from_month."/".$from_year." To ".$to_date."/".$to_month."/".substr($from_date,2);
  ?></span> </strong></td></tr>
					<tr>
						<td align="left">
							<b>
								 
  
								<div align="center">Pass : <?php echo $totpass;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fail : <?php echo $totfail;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total :<?php echo $cnt_std;?></div>
							
							</b>
						</td>
					</tr>
					<tr>
						<td align="center">
						<?php
							if($cht_rep_data != "")
							echo InsertChart ( "charts/charts.swf", "charts/charts_library", "charts/visit_chart.php?disp=browser&content=$cht_rep_data", 600, 350 );
						?>
						</td>
					</tr>
					<tr>
						<td align="left" height="20"></td>
					</tr>
				</table>	
                <?php }?>
                		
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
/*School wise Grahpical Report of pass and Fail*/
	if($action=='chatreports_schoolwise'){
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
	 </tr>
	<tr>
	  <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;<span class="admin">School Report</span> </strong></td>
	</tr>
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="left" valign="top">
		  <form name="examreports" action="" method="POST">
			<table width="70%" border="0" cellspacing="0" cellpadding="1">
	      <tr><td height="25" colspan="3">&nbsp;</td></tr>
				
				<tr>
				  <td align="left" valign="middle" class="narmal">&nbsp;</td>
					 <td align="left" valign="middle" class="narmal">Exam Name&nbsp;</td>
		  <td align="left" valign="middle">
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
				   <td align="left" valign="middle" class="narmal">&nbsp;</td>
					 <td align="left" valign="middle" class="narmal">Year&nbsp;</td>
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
?>

							</select>
					  <font color="#FF0000">*</font></td>
			  </tr>
				<tr>
				  <td align="left" valign="top" class="narmal">&nbsp;</td>
					<td align="left" valign="top" class="narmal">&nbsp;</td>
					<td height="40" align="left" valign="middle" class="narmal"><input name="exam_reports" type="submit" class="bgcolor_02" style="cursor:pointer"  value="Show Reports" />
						<input name="Submit2" type="reset" class="bgcolor_02" style="cursor:pointer"  value="Reset" /></td>
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
             <?php if($examname!="" && $academicyear!=""){?>
				<table width="100%" cellpadding="2" cellspacing="0" border="0">
					<tr><td height="25"  class="bgcolor_02" align="left"><strong>&nbsp;<span class="admin">School Total Report <?php 
								 list($from_year,$from_month,$from_date,$to_month,$to_date) = split('-',$academicyear);
  
								 echo substr($from_date,-6,2)."/".$from_month."/".$from_year." To ".$to_date."/".$to_month."/".substr($from_date,2);
  ?></span> </strong></td></tr>
					<tr>
						<td align="left">
							<b>
								 

								<div align="center">Pass : <?php echo $totpass;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fail : <?php echo $totfail;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total :<?php echo $cnt_std;?></div>
							
							</b>
						</td>
					</tr>
					<tr>
						<td align="center">
						<?php
							if($cht_rep_data != "")
							echo InsertChart ( "charts/charts.swf", "charts/charts_library", "charts/visit_chart.php?disp=browser&content=$cht_rep_data", 600, 350 );
						?>
						</td>
					</tr>
					<tr>
						<td align="left" height="20"></td>
					</tr>
				</table>	
                	<?php }?>	
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


<?php
/*We will get student wise Exam reports individually*/		
		if($action=='stud_report'){
		?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr>
  	<td width="1" ></td> 
  	<td height="6" ></td><td width="1" ></td>
	</tr>
  <tr>
  	<td width="1" class="bgcolor_02"></td>
  	<td height="25"  class="bgcolor_02"><span class="admin">&nbsp;&nbsp;Student Reports</span></td>
	<td width="1" class="bgcolor_02"></td>
	</tr>    
  <tr>
  	<td width="1" class="bgcolor_02"></td>
  	<td align="left" class="narmal" height="10" ></td>
		
	<td width="1" class="bgcolor_02"></td>
  </tr>
  <tr>
  	<td width="1" class="bgcolor_02"></td>
  	<td align="left" class="narmal" >Note : You can view individual Student Marks of a class and can print certificate for that student.</td>
		
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
							<td colspan="6">
								<table width="100%" border="0" cellspacing="0" cellpadding="1">
								
						  <tr>
										<td class="narmal" width="20%" align="left">Registration No SM</td>
						    <td width="35%" align="left"><input type="text" name="student_id" value="<?php if(isset($student_id)) { echo $student_id; } ?>" >
										  <font color="#FF0000">*</font>
										</td>
										<td width="45%" align="left"></td>
								  </tr>	
								
									<tr>
										<td class="narmal" align="left">Exam Name&nbsp;</td>
								  <td align="left"><select name="examname" style="width:190px;">
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
										  <font color="#FF0000">*</font>
										</td>
										
										<td height="40" align="left" valign="middle" class="narmal"></td>
									</tr>
									<tr>
										<td class="narmal" align="left">Academic Year</td>
								  <td align="left"><select name="academicyear" style="width:190px;">
											 
						<?php 

	if(count($school_details_res)>0) {	
		foreach ($school_details_res as $school){
?>
		<option value="<?php echo $school['fi_ac_startdate'].$school['fi_ac_enddate']; ?>"   <?php echo ($school['fi_ac_startdate'].$school['fi_ac_enddate']==$academicyear)?"selected":""?> ><?php echo displaydate($school['fi_ac_startdate'])." To ".displaydate($school['fi_ac_enddate']); ?></option>
<?php
		}
	}
?>			</select></td>
										
										<td height="40" align="left" valign="middle" class="narmal">
										
										<input name="exam_marks_search" type="submit" class="bgcolor_02" value="Search" style="cursor:pointer"   />
										</td>
									</tr>
									
								</table>
						  </td>
						</tr>
						<tr>
							<td colspan="6">
								<table width="100%" border="0" cellspacing="0" cellpadding="1">
							  <tr>
										<td class="narmal" width="27%" align="left"><b>Registration Number : </b></td>
							    <td width="73%" align="left" class="narmal"><?php echo $reg_no;?></td>
								  </tr>
									 <tr>
										<td class="narmal" width="27%" align="left"><b> Name : </b></td>
							    <td width="73%" align="left" class="narmal"><?php echo ucwords($std_name);?></td>
									</tr>
									 <tr>
										<td class="narmal" width="27%" align="left"><b>Father Name : </b></td>
							    <td width="73%" align="left" class="narmal"><?php echo ucwords($reportdetails[0]['pre_fathername']);?></td>
									</tr>
									<tr>
										<td class="narmal" align="left"><b>Class : </b></td>
									    <td align="left" class="narmal"><?php echo $class_name;?></td>
									</tr>	
								</table>
						  </td>
						</tr>
                        <tr class="bgcolor_02">
								<td width="10%" align="center" height="20" class="admin">S&nbsp;No</td>
								<td width="32%" align="center" class="admin">Subject</td>
								<td width="20%" align="center" class="admin">Total Marks</td>
								<td width="19%" align="center" class="admin">Pass Marks</td>
								<td width="19%" align="center" class="admin">Marks Obtained</td>
								<td width="19%" align="center" class="admin">Status</td>
							</tr>
					<?php 
						if (count($sub_data) > 0 && count($reportdetails) > 0){
					?>
							
						<?php
						 
							$slno = 1;
							
							foreach($sub_data as $sb)
							{
								
								$sbid = $sb['es_subjectid'];
	                           
								if (count($subArray[$sbid]['marks_obtined'])>0) {
								?>
	                        	
								<tr>
	                                <td align="center"><?php echo $slno;?></td>
									<td align="center" class="narmal"><?php echo $subArray[$sbid]['subject_name'];?></td>
									<td align="center" class="narmal"><?php echo $subArray[$sbid]['total_marks'];?></td>
									<td align="center" class="narmal"><?php echo $subArray[$sbid]['pass_marks'];?></td>
									<td align="center" class="narmal"><?php echo strtoupper($subArray[$sbid]['marks_obtined']);?></td>
									<td align="center" class="narmal"><?php if((int)$subArray[$sbid]['marks_obtined']>=(int)$subArray[$sbid]['pass_marks']){echo "Pass";}else{echo "Fail";}?></td>
						       </tr>
				  <?php 
								}
								$slno++;
				  			
							}
				  		?>
				  				<tr>
	                                <td align="right" colspan="2">Total Marks : </td>
									<td align="center" class="narmal"><?php echo $tot_total;?></td>
									<td align="center" class="narmal"><?php echo $tot_pass;?></td>
									<td align="center" class="narmal"><?php echo $tot_secured;?></td>
									<td align="center" class="narmal"></td>
						       </tr>
						       <tr>
									<td colspan="6" height="40" align="right">
										<table width="98%" border="0" cellspacing="0" cellpadding="1">
											<tr>
				                                <td align="left" width="50%"><b>Status : <?php echo $pass_status;?></b></td>
				                                <td align="right" width="50%"><b>Percentage : <?php echo number_format($percentagemark,2,'.','');?>%</b></td>
									       </tr>
										</table>
									</td>
						 		 </tr>
								 <tr>
				                                <td align="right" colspan="6" ><?php //if($pass_status=='Pass'){?><input type="button" class="bgcolor_02" value="Certificate" style="cursor:pointer" onclick="newWindowOpen('?pid=36&action=stud_certificate<?php echo $cert;?>');"><?php //}?></td>
				                                
									       </tr>
						       
				  		<?php
						} elseif(isset($exam_marks_search) && !is_array($examdetails)) {
	?>
							<tr>
								<td colspan="6" align="center">
									<table width="100%" border="0" cellspacing="0" cellpadding="0" >
										<tr >
											<td align='center'><strong>No Results Found</strong></td>		
										</tr>
									</table>
								</td>
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
			
<?php if ($action == 'stud_certificate') { ?>
<table width="100%" border="0" style="height:465px;letter-spacing:1px">
				 	
	 
				
				<tr>
					<td colspan="3" align="center" height="50"><strong>CERTIFICATE</strong></td></tr><tr>
				</tr>
				<tr>
					<td colspan="3" align="center" height="10"></td></tr><tr>
				</tr>
				<tr>
					<td colspan="3" align="center" height="10">
					<table width="100%" border="0" cellspacing="0" cellpadding="1">
							  <tr>
										<td class="narmal" width="27%" align="left"><b>Registration Number </b></td>
										<td><b>:</b></td>
							            <td width="73%" align="left" class="narmal"><?php echo $student_id;?></td>
								  </tr>
									 <tr>
										<td class="narmal" width="27%" align="left"><b> Name  </b></td>
										<td><b>:</b></td>
							    <td width="73%" align="left" class="narmal"><?php echo ucwords($std_name);?></td>
									</tr>
									 <tr>
										<td class="narmal" width="27%" align="left"><b>Father Name  </b></td>
										<td><b>:</b></td>
							            <td width="73%" align="left" class="narmal"><?php echo ucwords($reportdetails[0]['pre_fathername']);?></td>
									</tr>
									<tr>
										<td class="narmal" align="left"><b>Class </b></td>
										<td><b>:</b></td>
									    <td align="left" class="narmal"><?php echo $class_name;?></td>
									</tr>
									<tr>
										<td class="narmal" align="left"><b>Academic&nbsp;Year </b></td>
										<td><b>:</b></td>
									    <td align="left" class="narmal"><?php 
										$from = substr($academicyear,0,10);
	                                    $to = substr($academicyear,10,20);
										$from_ac_d = func_date_conversion("Y-m-d","d/m/Y",$from );
										$to_ac_d = func_date_conversion("Y-m-d","d/m/Y",$to );
										echo $from_ac_d." - ".$to_ac_d ;?></td>
									</tr>		
								</table>
					</td></tr><tr>
				</tr>
				<tr>
					<td colspan="3" align="center" height="10"></td></tr><tr>
				</tr>
				
				<tr>
					<td colspan="3" height="100" >
					<table cellpadding="0" cellspacing="0">
					<tr class="bgcolor_02">
								<td width="10%" align="center" height="20" class="admin">S&nbsp;No</td>
								<td width="32%" align="center" class="admin">Subject</td>
								<td width="20%" align="center" class="admin">Total Marks</td>
								<td width="19%" align="center" class="admin">Pass Marks</td>
								<td width="19%" align="center" class="admin">Marks Obtained</td>
								<td width="19%" align="center" class="admin">Status</td>
							</tr>
					<?php 
						if (count($sub_data) > 0 && count($reportdetails) > 0){
					?>
							
						<?php
						 
							$slno = 1;
							
							foreach($sub_data as $sb)
							{
								
								$sbid = $sb['es_subjectid'];
	                           
								if (count($subArray[$sbid]['marks_obtined'])>0) {
								?>
	                        	
								<tr>
	                                <td align="center"><?php echo $slno;?></td>
									<td align="center" class="narmal"><?php echo $subArray[$sbid]['subject_name'];?></td>
									<td align="center" class="narmal"><?php echo $subArray[$sbid]['total_marks'];?></td>
									<td align="center" class="narmal"><?php echo $subArray[$sbid]['pass_marks'];?></td>
									<td align="center" class="narmal"><?php echo strtoupper($subArray[$sbid]['marks_obtined']);?></td>
									<td align="center" class="narmal"><?php if((int)$subArray[$sbid]['marks_obtined']>=(int)$subArray[$sbid]['pass_marks']){echo "Pass";}else{echo "Fail";}?></td>
						       </tr>
				  <?php 
								}
								$slno++;
				  			
							}
				  		?>
				  				<tr>
	                                <td align="right" colspan="2">Total Marks : </td>
									<td align="center" class="narmal"><?php echo $tot_total;?></td>
									<td align="center" class="narmal"><?php echo $tot_pass;?></td>
									<td align="center" class="narmal"><?php echo $tot_secured;?></td>
									<td align="center" class="narmal"></td>
						       </tr>
						       <tr>
									<td colspan="6" height="40" align="right">
										<table width="98%" border="0" cellspacing="0" cellpadding="1">
											<tr>
				                                <td align="left" width="50%"><b>Status : <?php echo $pass_status;?></b></td>
				                                <td align="right" width="50%"><b>Percentage : <?php echo number_format($percentagemark,2,'.','');?>%</b></td>
									       </tr>
										</table>
									</td>
						 		 </tr>
								 <?php }?>
					
					</table>
					
					<br />&nbsp;&nbsp;&nbsp;&nbsp;This is to certify <b>&nbsp;<?php echo ucwords($std_name);?></b> has <?php echo $pass_status?>  <?php echo $exam; ?>  Examination of class <?php echo $class_name;?>
					
					</td>
  </tr>
				<tr>
					<td colspan="3"  align="right" height="100" >Principal</td>
				</tr>
				
				<tr><td colspan="3"></td></tr>
		   </table>
<?php } 
	if($action=='allstudentsexport'){
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
	 </tr>
	<tr><td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;<span class="admin">Reports</span> </strong></td></tr>
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="center" valign="top">
			<form name="examreportsexport" action="?pid=36&action=allstudentsexport" method="POST">
			<table width="100%" border="0" cellspacing="0" cellpadding="1">
	      <tr><td height="25" colspan="3">&nbsp;</td></tr>
				<tr>
				  <td width="3%" align="left" class="narmal">&nbsp;</td>
					<td width="13%" align="left" class="narmal">Class&nbsp;</td>
			  <td width="84%" align="left">
<select name="classes_id" style="width:190px;" onchange="JavaScript:document.examreportsexport.submit();">
							<option value="" >Select Class</option>
							<?php 
											
									if (count($class_data)>0){
										foreach($class_data as $eachclass){
							?>
							<option value="<?php echo $eachclass['es_classesid']; ?>"   <?php echo ($eachclass['es_classesid']==$classes_id)?"selected":""?> ><?php echo $eachclass['es_classname']; ?></option>
											<?php
													}
												}
						?>				</select>
									  <font color="#FF0000">*</font></td>
			  </tr>
				<tr>
				  <td class="narmal" align="left">&nbsp;</td>
					 <td class="narmal" align="left">Exam Name&nbsp;</td>
		  <td align="left">
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
				   <td class="narmal" align="left">&nbsp;</td>
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
				   <td class="narmal" align="left">&nbsp;</td>
					 <td class="narmal" align="left">Subject</td>
                <td align="left"><?php if(isset($classes_id) && $classes_id!="") {?>
								<select name="at_std_subject">
								<option value="" >Select Subject</option>
										<?php 
										$classlist = gettingSubject($classes_id);
										foreach($classlist as $indclass) {
										//$sel_time = "SELECT es_timetableid FROM `es_timetable` WHERE es_class=".$at_std_class." ORDER BY es_timetableid DESC LIMIT 0,1";
										//$sel_time_sql =getarrayassoc($sel_time);
																			
										//$sel_group = "SELECT * FROM `es_timetablemaster` WHERE es_class=".$sel_time_sql['es_timetableid']." AND es_subject=".$indclass['es_subjectid'];
										//$sel_group_num =sqlnumber($sel_group);
										//if($sel_group_num!=0){
										?>
										<option value="<?php echo $indclass['es_subjectid']; ?>" ><?php										
										echo $indclass['es_subjectname']; 
										?></option>
										<?php }//} ?>
								</select>
								<?php } else { ?><select name="at_std_subject">
								<option value="" >Select Subject</option>										
								</select><?php } ?></td>
			  </tr>
			  <tr>
				   <td class="narmal" align="left">&nbsp;</td>
					 <td class="narmal" align="left">Reg No </td>
                <td align="left"><input type="text" name="studentr_regno" value="" /></td>
			  </tr>
				<tr>
				  <td align="left" valign="top" class="narmal">&nbsp;</td>
					<td align="left" valign="top" class="narmal">&nbsp;</td>
					<td height="40" align="left" valign="middle" class="narmal"><input name="exam_reports_export" style="cursor:pointer"   type="submit" class="bgcolor_02" value="Export Report" /></td>
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
	}?>		