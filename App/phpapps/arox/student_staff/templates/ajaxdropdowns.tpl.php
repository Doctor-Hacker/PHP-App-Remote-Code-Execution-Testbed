<?php 
// Unit Management
if($action == 'classwisesubjects') { ?>
   <select name="es_subjectid">
                              <option value="">- Select -</option>
							  <?php 
							  if (is_array($classlistarr) && count($classlistarr) > 0) { 
							  foreach ($classlistarr as $eachrecord){ ?>
                            <option value="<?php echo $eachrecord['es_subjectid']; ?>" <?php if($selval==$eachrecord['es_subjectid']){ ?> selected="selected" <?php } ?>><?php echo $eachrecord['es_subjectname']; ?></option>                            
							<?php } }?>							
                          </select>	<font color="#FF0000"><b>*</b></font>		
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
                          </select><font color="#FF0000"><b>*</b></font>			
			<?php }
			
 if($action == 'classwisesubjects3') { ?>
   <select name="subjectid" onchange="getunits2(this.value)">
                              <option value="">- Select -</option>
							  <?php 
							  if (is_array($classlistarr) && count($classlistarr) > 0) { 
							  foreach ($classlistarr as $eachrecord){ ?>
                            <option value="<?php echo $eachrecord['es_subjectid']; ?>" <?php if($selval==$eachrecord['es_subjectid']) { ?> selected="selected" <?php } ?>><?php echo $eachrecord['es_subjectname']; ?></option>                            
							<?php } }?>							
                          </select><font color="#FF0000"><b>*</b></font>			
			<?php }
			?>
			
			
			
			

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
                          </select>	<font color="#FF0000"><b>*</b></font>		
						
			<?php } ?>
			
			<?php if($action == 'classwiseunits') { ?>
   
<select name="unit_id"><option value="">- Select -</option>
							  <?php 
							  if (is_array($unitslistarr) && count($unitslistarr) > 0) { 
							  foreach ($unitslistarr as $eachrecord){ ?>
                            <option value="<?php echo $eachrecord['unit_id']; ?>" <?php if($selval==$eachrecord['unit_id']) { ?> selected="selected" <?php } ?>><?php echo $eachrecord['unit_name']; ?></option>                            
							<?php } }?>							
                          </select>			
						
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
                          </select><font color="#FF0000"><b>*</b></font>			
			<?php }?>
<?php if($action == 'classwiseunits2') { ?>
   <select name="unit_id" onchange="getchapterstwo(this.value,'')">
                              <option value="">- Select -</option>
							  <?php 
							  if (is_array($unitslistarr) && count($unitslistarr) > 0) { 
							  foreach ($unitslistarr as $eachrecord){ ?>
                            <option value="<?php echo $eachrecord['unit_id']; ?>" <?php if($selval==$eachrecord['unit_id']) { ?> selected="selected" <?php } ?>><?php echo $eachrecord['unit_name']; ?></option>                            
							<?php } }?>							
                          </select><font color="#FF0000"><b>*</b></font>			
						
			<?php } ?>
			
			
			
			
			
			<?php if($action == 'classwiseunitsone') { ?>
   
<select name="unit_id" onchange="getchapters(this.value,'')"><option value="">- Select -</option>
							  <?php 
							  if (is_array($unitslistarr) && count($unitslistarr) > 0) { 
							  foreach ($unitslistarr as $eachrecord){ ?>
                            <option value="<?php echo $eachrecord['unit_id']; ?>" <?php if($selval==$eachrecord['unit_id']) { ?> selected="selected" <?php } ?>><?php echo $eachrecord['unit_name']; ?></option>                            
							<?php } }?>							
                          </select>	<font color="#FF0000"><b>*</b></font>		
						
			<?php } ?>
			
			
			<?php if($action == 'unitwisechapters') { ?>
   <select name="chapter_id" >
                              <option value="">- Select -</option>
							  <?php 
							  if (is_array($chapterlistarr) && count($chapterlistarr) > 0) { 
							  foreach ($chapterlistarr as $eachrecord){ ?>
                            <option value="<?php echo $eachrecord['chapter_id']; ?>" <?php if($selval==$eachrecord['chapter_id']) { ?> selected="selected" <?php } ?>><?php echo $eachrecord['chapter_name']; ?></option>                            
							<?php } }?>							
                          </select><font color="#FF0000"><b>*</b></font>			
						
			<?php } ?>
			
			<?php if($action == 'chpaters2') { ?>
   <select name="chapter_id" >
                              <option value="">- Select -</option>
							  <?php 
							  if (is_array($chapterlistarr) && count($chapterlistarr) > 0) { 
							  foreach ($chapterlistarr as $eachrecord){ ?>
                            <option value="<?php echo $eachrecord['chapter_id']; ?>" <?php if($selval==$eachrecord['chapter_id']) { ?> selected="selected" <?php } ?>><?php echo $eachrecord['chapter_name']; ?></option>                            
							<?php } }?>							
                          </select><font color="#FF0000"><b>*</b></font>			
						
			<?php } ?>
<?php 			
			
/********************************************* these are get posts by department wise **************************************************/	
if($action=='getposts'){?>		
	<select name="es_deptpostsid"  onchange="getallsubjects(this.value,'')" style=" width:150px;">
                              <option value="">- Select -</option>
							  <?php 
							  if (is_array($post_arr) && count($post_arr) > 0) { 
							  foreach ($post_arr as $eachrecord){ ?>
                            <option value="<?php echo $eachrecord['es_deptpostsid']; ?>" <?php if($selval==$eachrecord['es_deptpostsid']) { ?> selected="selected" <?php } ?>><?php echo $eachrecord['es_postname']; ?></option>                            
							<?php } }?>							
                          </select>&nbsp;<font color="#FF0000">&nbsp;*</font>	
						  <?php }?>
<?php if($action=='getstaff'){?>						  
	
		<select name="es_staffid[]"  multiple="multiple" size="5" style=" width:150px;">
                             
							  <?php 
							  if (is_array($staff_arr) && count($staff_arr) > 0) { 
							  foreach ($staff_arr as $eachrecord){ ?>
                            <option value="<?php echo $eachrecord['es_staffid']; ?>" ><?php echo $eachrecord['st_firstname'].' '.$eachrecord['st_lastname'].'  &lt;'. $eachrecord['st_username'] . '&gt;'; ?></option>                            
							<?php } }?>							
                          </select>&nbsp;<font color="#FF0000">&nbsp;*</font>	
			<?php }?>		
			
			<?php if($action=="subbookacts"){ ?>			
	<select name="subbookcatid"  style=" width:150px;">
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
			
			
		
			
