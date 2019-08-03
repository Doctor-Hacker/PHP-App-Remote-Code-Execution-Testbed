<?php

if($action=='getallname')
{
?>
<select name="allname" multiple="multiple" id="allname" style="overflow:visible">
<?php
	while($row = mysql_fetch_assoc($rs))
	{
?>
<option><?php echo $row['pre_name']." ".$row['middle_name']." ".$row['pre_lastname']?></option>
<?php		
	}
?>
</select>
<?php
}
?>
<?php
if($action=='getschoolbyid')
{
?>
<select name="schooltype[]" >
                          <?php 
							  if (is_array($obj_schoollistarr) && count($obj_schoollistarr) > 0) { 
							  foreach ($obj_schoollistarr as $eachrecord){ ?>
                          <option value="<?php echo $eachrecord->school_id; ?>"><?php echo $eachrecord->school_name; ?></option>
                          <?php } }?>
</select>
<?php
}
?>


<?php

if($action=='getschool')
{
?>
<select name="schoolname" style="width:200px">
                              <option value="">select school</option>
							  <?php 
							  if (is_array($schlistarr) && count($schlistarr) > 0) { 
							  foreach ($schlistarr as $eachrecord){ ?>
                            <option value="<?php echo $eachrecord['school_id']; ?>" ><?php echo $eachrecord['school_name']; ?></option>                            
							<?php } }?>							
                          </select>

<?php
}
// Unit Management
if($action == 'classwisesubjects') { ?>
   <select name="es_subjectid">
                              <option value="">- Select -</option>
							  <?php 
							  if (is_array($classlistarr) && count($classlistarr) > 0) { 
							  foreach ($classlistarr as $eachrecord){ ?>
                            <option value="<?php echo $eachrecord['es_subjectid']; ?>" <?php if($selval==$eachrecord['es_subjectid']){ ?> selected="selected" <?php } ?>><?php echo $eachrecord['es_subjectname']; ?></option>                            
							<?php } }?>							
                          </select><font color="#FF0000">&nbsp;*</font>			
			<?php } ?>
			
<?php
// Unit Management
 if($action == 'classwisesubjects2') { ?>
   <select name="subjectid" >
                              <option value="">- Select -</option>
							  <?php 
							  if (is_array($classlistarr) && count($classlistarr) > 0) { 
							  foreach ($classlistarr as $eachrecord){ ?>
                            <option value="<?php echo $eachrecord['es_subjectid']; ?>" <?php if($selval==$eachrecord['es_subjectid']) { ?> selected="selected" <?php } ?>><?php echo $eachrecord['es_subjectname']; ?></option>                            
							<?php } }?>							
                          </select><font color="#FF0000">&nbsp;*</font>			
			<?php }?>
			
			
			
			

<?php 
/********************************************* these are adding chapters actions **************************************************/
	if($action == 'classwisesubjects_units') { ?>
   <select name="es_subjectid" onchange="getunits(this.value,'')">
                              <option value="">- Select -</option>
							  <?php 
							  if (is_array($classlistarr) && count($classlistarr) > 0) { 
							  foreach ($classlistarr as $eachrecord){ ?>
                            <option value="<?php echo $eachrecord['es_subjectid']; ?>" <?php if($selval==$eachrecord['es_subjectid']){ ?> selected="selected" <?php } ?>><?php echo $eachrecord['es_subjectname']; ?></option>                            
							<?php } }?>							
                          </select><font color="#FF0000">&nbsp;*</font>			
						
			<?php } ?>
			
			<?php if($action == 'classwiseunits') { ?>
   
<select name="unit_id"><option value="">- Select -</option>
							  <?php 
							  if (is_array($unitslistarr) && count($unitslistarr) > 0) { 
							  foreach ($unitslistarr as $eachrecord){ ?>
                            <option value="<?php echo $eachrecord['unit_id']; ?>" <?php if($selval==$eachrecord['unit_id']) { ?> selected="selected" <?php } ?>><?php echo $eachrecord['unit_name']; ?></option>                            
							<?php } }?>							
                          </select><font color="#FF0000">&nbsp;*</font>			
						
			<?php } ?>
		
		
		<?php 
		// serching chapters actions
		if($action == 'classwisesubjectstwo') { ?>
   <select name="subjectid" onchange="getunits2(this.value,'')">
                              <option value="">- Select -</option>
							  <?php 
							  if (is_array($classlistarr) && count($classlistarr) > 0) { 
							  foreach ($classlistarr as $eachrecord){ ?>
                            <option value="<?php echo $eachrecord['es_subjectid']; ?>" <?php if($selval==$eachrecord['es_subjectid']) { ?> selected="selected" <?php } ?>><?php echo $eachrecord['es_subjectname']; ?></option>                            
							<?php } }?>							
                          </select><font color="#FF0000">&nbsp;*</font>			
			<?php }?>
<?php if($action == 'classwiseunits2') { ?>
   <select name="unit_id" onchange="getchapterstwo(this.value,'')">
                              <option value="">- Select -</option>
							  <?php 
							  if (is_array($unitslistarr) && count($unitslistarr) > 0) { 
							  foreach ($unitslistarr as $eachrecord){ ?>
                            <option value="<?php echo $eachrecord['unit_id']; ?>" <?php if($selval==$eachrecord['unit_id']) { ?> selected="selected" <?php } ?>><?php echo $eachrecord['unit_name']; ?></option>                            
							<?php } }?>							
                          </select><font color="#FF0000">&nbsp;*</font>			
						
			<?php } ?>
			
	<?php if($action == 'classwiseunits3') { ?>
   <select name="unit_id" >
                              <option value="">- Select -</option>
							  <?php 
							  if (is_array($unitslistarr) && count($unitslistarr) > 0) { 
							  foreach ($unitslistarr as $eachrecord){ ?>
                            <option value="<?php echo $eachrecord['unit_id']; ?>" <?php if($selval==$eachrecord['unit_id']) { ?> selected="selected" <?php } ?>><?php echo $eachrecord['unit_name']; ?></option>                            
							<?php } }?>							
                          </select><font color="#FF0000">&nbsp;*</font>			
						
			<?php } ?>		
			
			
			
			<?php if($action == 'classwiseunitsone') { ?>
   
<select name="unit_id" onchange="getchapters(this.value,'')"><option value="">- Select -</option>
							  <?php 
							  if (is_array($unitslistarr) && count($unitslistarr) > 0) { 
							  foreach ($unitslistarr as $eachrecord){ ?>
                            <option value="<?php echo $eachrecord['unit_id']; ?>" <?php if($selval==$eachrecord['unit_id']) { ?> selected="selected" <?php } ?>><?php echo $eachrecord['unit_name']; ?></option>                            
							<?php } }?>							
                          </select><font color="#FF0000">&nbsp;*</font>			
						
			<?php } ?>
			
			
			<?php if($action == 'unitwisechapters') { ?>
   <select name="chapter_id" >
                              <option value="">- Select -</option>
							  <?php 
							  if (is_array($chapterlistarr) && count($chapterlistarr) > 0) { 
							  foreach ($chapterlistarr as $eachrecord){ ?>
                            <option value="<?php echo $eachrecord['chapter_id']; ?>" <?php if($selval==$eachrecord['chapter_id']) { ?> selected="selected" <?php } ?>><?php echo $eachrecord['chapter_name']; ?></option>                            
							<?php } }?>							
                          </select><font color="#FF0000">&nbsp;*</font>			
						
			<?php } ?>
			
			<?php if($action == 'chpaters2') { ?>
   <select name="chapter_id" >
                              <option value="">- Select -</option>
							  <?php 
							  if (is_array($chapterlistarr) && count($chapterlistarr) > 0) { 
							  foreach ($chapterlistarr as $eachrecord){ ?>
                            <option value="<?php echo $eachrecord['chapter_id']; ?>" <?php if($selval==$eachrecord['chapter_id']) { ?> selected="selected" <?php } ?>><?php echo $eachrecord['chapter_name']; ?></option>                            
							<?php } }?>							
                          </select><font color="#FF0000">&nbsp;*</font>		
						
			<?php } ?>
<?php 			
			
/********************************************* these are get posts by department wise **************************************************/	
if($action=='deppost'){?>		
		<?php if($action=='interview_registration' ){ ?>
						
						<select name="st_posts" >
                       <option value="select" >Select</option>
                       <?php if(count($es_postList) > 0 ){
					   foreach ($es_postList as $eachrecord){ ?>
					   <option value="<?php echo $eachrecord->es_deptpostsId;?>" <?php echo ($eachrecord->es_deptpostsId==$eachrecord1->st_post)?"selected":""?>  ><?php echo $eachrecord->es_postname;?></option>
					   <?php    } } ?>
                        </select>
					    <?php }?>
							 <?php if($action=='nonselectedlist' ){ ?>
							<input name="st_posts" type="text" id="st_posts" value="<?php if($st_posts!=''){ echo $st_posts;} if(isset($eachrecord3->st_post)&&$eachrecord3->st_post!='') echo postname($eachrecord3->st_post);?>" readonly />
						<?php } ?>
						  
	if($action=='postwise'){?>		
	<select name="txt_post" style="width:120px;">
                          <option value="select" >Select</option>
                          <?php if(count($es_postList) > 0 ){
					   foreach ($es_postList as $eachrecord){ ?>
                          <option value="<?php echo $eachrecord->es_deptpostsId;?>" <?php echo ($eachrecord->es_deptpostsId==$txt_post)?"selected":""?>  ><?php echo $eachrecord->es_postname;?></option>
                          <?php    } }?>
                        </select>&nbsp;<font color="#FF0000">&nbsp;*</font>	
						  <?php }?>		
						  
						  <?php 			
			
/********************************************* these are get posts by department wise **************************************************/	
if($action=='getposts'){?>		
	<select name="es_deptpostsid"  onchange="getallsubjects(this.value,'')" style=" width:150px;" class="narmal">
                              <option value="">- Select -</option>
							  <?php 
							  if (is_array($post_arr) && count($post_arr) > 0) { 
							  foreach ($post_arr as $eachrecord){ ?>
                            <option value="<?php echo $eachrecord['es_deptpostsid']; ?>" <?php if($selval==$eachrecord['es_deptpostsid']) { ?> selected="selected" <?php } ?>><?php echo $eachrecord['es_postname']; ?></option>                            
<?php } }?>							
                          </select>&nbsp;<font color="#FF0000">&nbsp;*</font>	
						  <?php }?>			  
<?php 			
			
/********************************************* these are get posts by department wise **************************************************/	
if($action=='payslip_posts'){?>		
	<select name="es_deptpostsid"  onchange="getallsubjects(this.value,'')" style=" width:150px;" class="narmal">
                              <option value="">- Select -</option>
							  <option value="all">- All -</option>
							  <?php 
							  if (is_array($post_arr) && count($post_arr) > 0) { 
							  foreach ($post_arr as $eachrecord){ ?>
                            <option value="<?php echo $eachrecord['es_deptpostsid']; ?>" <?php if($selval==$eachrecord['es_deptpostsid']) { ?> selected="selected" <?php } ?>><?php echo $eachrecord['es_postname']; ?></option>                            
<?php } }?>							
                          </select>&nbsp;<font color="#FF0000">&nbsp;*</font>	
						  <?php }?>
<?php if($action=='getstaff'){ ?>						  
	
		<select name="es_staffid[]"  multiple="multiple" size="5" style=" width:150px;" class="narmal">
		
                             
							  <?php 
							  if (is_array($staff_arr) && count($staff_arr) > 0) { 
							  foreach ($staff_arr as $eachrecord){ ?>
                            <option value="<?php echo $eachrecord['es_staffid']; ?>"><?php echo $eachrecord['st_firstname'].' '.$eachrecord['st_lastname'].'  &lt;'. $eachrecord['es_staffid'] . '&gt;'; ?></option>                            
							<?php } }?>							
                          </select>&nbsp;<font color="#FF0000">&nbsp;*</font>	
			<?php }?>
<?php if($action=='getstaff_payslip'){ ?>						  
	
		<select name="selempid"  style=" width:200px;" class="narmal">
		<option value="">- Select -</option>
		
                             
							  <?php 
							  if (is_array($staff_arr) && count($staff_arr) > 0) { 
							  foreach ($staff_arr as $eachrecord){ ?>
                            <option value="<?php echo $eachrecord['es_staffid']; ?>" <?php if($selval==$eachrecord['es_staffid']) { ?> selected="selected" <?php } ?>><?php echo $eachrecord['st_firstname'].' '.$eachrecord['st_lastname'].'  &lt;'. $eachrecord['es_staffid'] . '&gt;'; ?></option>                            
							<?php } }?>							
                          </select>&nbsp;<font color="#FF0000">&nbsp;*</font>	
			<?php }?>
			
<?php if($action=="checkavailablestudents"){?>			
		
	<select name="pre_mobile1[]"  multiple="multiple" size="5" style=" width:150px;">
                             
							  <?php 
							  if (is_array($es_enquiryList) && count($es_enquiryList) > 0) { 
							  foreach ($es_enquiryList as $eachrecord){ ?>
                            <option value="<?php echo $eachrecord['eq_mobile']; ?>" ><?php echo $eachrecord['eq_wardname']; ?></option>                            
							<?php } }else{?>
                            <option value=""> No Records Found</option>		
                            <?php }?>					
                          </select>
			<?php }?>		
			<?php if($action=="subbookacts"){ ?>			
	<select name="subbookcatid"  style=" width:150px;">
<option value="">- Select -</option>

							  <?php 
							   if($cid!=""){
							  if (is_array($es_sublist) && count($es_sublist) > 0) { 
							  foreach ($es_sublist as $eachrecord){ ?>
                            <option value="<?php echo $eachrecord['es_subcategoryid']; ?>" ><?php echo $eachrecord['subcat_scatname']; ?></option>                            
							<?php } }}else{?>
                            <option value=""> No Records Found</option>		
                            <?php }?>					
                          </select>
			<?php }?>
			<?php if($action=="getsubmodules"){ ?>			
	<select name="s_submodule"  >
							  <?php 
							  if (is_array($submodule_list) && count($submodule_list) > 0) { ?>
							  <option value="">-All Sub Modules-</option>
							  <?php foreach ($submodule_list as $eachrecord){ ?>
                            <option value="<?php echo $eachrecord['submodule']; ?>" <?php if($selval==$eachrecord['submodule']) { ?> selected="selected" <?php } ?> ><?php echo ucfirst(strtolower($eachrecord['submodule'])); ?></option>                            
							<?php } }else{?>
                            <option value=""> No Records Found</option>		
                            <?php }?>					
                          </select>
			<?php }?>
<?php if($action=="getrooms"){ ?>			
	<select name="es_hostelroomid"  >
							  <?php 
							  if (is_array($submodule_list) && count($submodule_list) > 0) { ?>
							  <option value="">-- Select --</option>
							  <?php foreach ($submodule_list as $eachrecord){ ?>
                            <option value="<?php echo $eachrecord['es_hostelroomid']; ?>" <?php if($selval==$eachrecord['es_hostelroomid']) { ?> selected="selected" <?php } ?> ><?php echo ucfirst(strtolower($eachrecord['room_no'])); ?></option>                            
							<?php } }else{?>
                            <option value=""> No Rooms Found</option>		
                            <?php }?>					
                          </select>
			<?php }?>	


<?php if($action=="assign_section"){ ?>			
	<table width="100%" border="0">
						<tr>
						<td colspan="8">&nbsp;</td>
				      </tr>
					   <tr class="bgcolor_02 admin" height="25">
						<td align="center" valign="middle">S.No</td>
						<td width="24%" align="center" valign="middle">Reg No </td>
						<td width="22%" align="left" valign="middle">Student Name </td>
						
						<td width="19%" align="center" valign="middle">Roll No </td>
						
					    <td width="19%" align="center" valign="middle">Select Section </td>
					  </tr>
				 	<?php if(count($all_sem_det)>0){
					$irow=$start;
					foreach($all_sem_det as $eachrecord){
					$irow++;
					 ?>
					  
					  <tr>
						<td align="center" valign="middle">&nbsp;<?php echo $irow; ?></td>
						<td align="center" valign="middle">&nbsp;<?php echo $eachrecord['es_preadmissionid']; ?><input type="hidden" value="<?php echo $eachrecord['es_preadmissionid']; ?>" name="sudent_id[]" /></td>
						<td align="left" valign="middle">&nbsp;<?php echo $eachrecord['pre_name']; ?></td>
							<td align="center" valign="middle"><input type="text" name="roll_no[]" class="input_field" value="<?php echo $eachrecord['ROLL_NO']; ?>" /></td>
					        <td align="center" valign="middle" >
							<select name="section_id[]" class="input_field" style="width:120px; " >
							<option value="">Select Section</option>
							<?php foreach($sect_det as $sect) { ?>
							<option value="<?php echo $sect['section_id']; ?>" <?php if($eachrecord['SECTION'] == $sect['section_id']) { ?> selected="selected" <?php } ?> ><?php echo ucfirst($sect['section_name']); ?></option>
							<?php } ?>
							</select>
							</td>
					  </tr>
					    <?php }?>
					  <tr>
						<td colspan="8"  align="center"><input type="submit" name="submit" value="Submit" class="bgcolor_02" />&nbsp;&nbsp;<input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=96&action=print_sectionwise&es_classesid=<?php echo $id; ?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /></td>
					  </tr>
					  <?php }else{?>
					  <tr>
						<td colspan="8" class="admin" align="center">No Records Found</td>
					  </tr>
					  <?php }?>
					</table>
<?php }?>	

<?php if($action == 'inventory_reports') { ?>
<select name="student_id" onchange="stdents_info(this.value); ">
<option value="">Select&nbsp;Student</option>

<?php
if(count($stu_det)>0)
{
foreach($stu_det as $stu) { ?>
<option value="<?php echo $stu['es_preadmissionid']; ?>" <?php if($selval==$stu['es_preadmissionid']) { ?> selected="selected" <?php } ?>><?php echo ucfirst($stu['pre_name']).'(Reg:'.$stu['es_preadmissionid'].')'.'(Roll:'.$stu['ROLL_NO'].')'; ?></option>
<?php } 
}
?>
</select><font color="#FF0000">*</font>
<?php } ?>

<?php if($action == 'students_information' && is_array($student_inf_det)){?>
<table border="0" cellpadding="2" cellspacing="1">
<tr>
<td colspan="2" align="left"><strong>Student Details</strong></td>
</tr>
<tr>
<td>Name</td>
<td><input type="text" name="stu_name" value="<?php echo $student_inf_det['pre_name']; ?>" readonly="readonly"/></td>
</tr>
<tr>
<td>Class</td>
<td><input type="text" name="stu_name" value="<?php echo $student_inf_det['es_classname']; ?>" readonly="readonly"/></td>
</tr>
<tr>
<td>Section</td>
<td><input type="text" name="stu_name" value="<?php echo $student_inf_det['SECTION']; ?>" readonly="readonly"/></td>
</tr>
<tr>
<td>Roll No</td>
<td><input type="text" name="stu_name" value="<?php echo $student_inf_det['roll_no']; ?>" readonly="readonly"/></td>
</tr>
<tr>
<td>Photo</td>
<td><img src="images/student_photos/<?php echo $student_inf_det['pre_image']; ?>" width="80" height="80" border="0" /></td>
</tr>
</table>
<?php } ?>
