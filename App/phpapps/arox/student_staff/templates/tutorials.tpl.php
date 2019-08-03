<script type="text/javascript">
function popup_letter(url) {
		 var width  = 700;
		 var height = 500;
		 var left   = (screen.width  - width)/2;
		 var top    = (screen.height - height)/2;
		 var params = 'width='+width+', height='+height;
		 params += ', top='+top+', left='+left;
		 params += ', directories=no';
		 params += ', location=no';
		 params += ', menubar=no';
		 params += ', resizable=no';
		 params += ', scrollbars=yes';
		 params += ', status=no';
		 params += ', toolbar=no';
		 newwin=window.open(url,'windowname5', params);
		 if (window.focus) {
			 newwin.focus()
		 }
	 return false;
}

</script>
<?php 
if($action == "tutorialslist") {
?>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;Tutorial</strong></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td height="25"  class="narmal"><ul>
                  <li>Note : To take test  click View icon</li>
                </ul></td>
                <td width="1" class="bgcolor_02"></td>
  </tr>
<tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="4" cellpadding="0">
                  <tr>
                    <td align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr height="25" class="bgcolor_02">
                      <td width="8%" align="center" valign="middle" class="admin">S.No</td>
					  <td width="16%" align="left" valign="middle" class="admin">Subject</td>
                      <td width="10%" align="left" valign="middle" class="admin">Unit </td>
                      <td width="17%" align="left" valign="middle" class="admin">Chapter</td>
                      <td width="18%" align="left" valign="middle" class="admin">Tutorial</td>
					  <td width="17%" align="left" valign="middle" class="admin">Created By</td>
                      <td width="14%" align="center" valign="middle" class="admin">Action</td>
                    </tr>
                    <?php if($no_rows>0){
					$irow=0;
					foreach($tutorials_det as $eachrecord){
					$irow++;
					//if(in_array($eachrecord['es_subjectid'],$subject_id_array))
//						{
					 ?>
                    <tr height="25">
                      <td width="8%" align="center" valign="middle" class="narmal"><?php echo $irow; ?></td>
					  <td width="16%" align="left" valign="middle" class="narmal"><?php echo $eachrecord['es_subjectname']; ?></td>
                      <td width="10%" align="left" valign="middle" class="narmal"><?php echo $eachrecord['unit_name']; ?></td>
                      <td width="17%" align="left" valign="middle" class="narmal"><?php echo $eachrecord['chapter_name']; ?></td>
                      <td width="18%" align="left" valign="middle" class="narmal"><?php echo $eachrecord['title']; ?></td>
					   <td width="17%" align="left" valign="middle" class="narmal"><?php 
					  if($eachrecord['user_type']=='staff'){
					   $staff_arr =  get_staffdetails($eachrecord['user_id']);
					   $from_name = $staff_arr['st_firstname'].' '.$staff_arr['st_lastname'];
					  }
					  if($eachrecord['user_type']=='admin'){
					   $admin_arr = $db->getrow("select * from es_admins where es_adminsid=".$eachrecord['user_id']);
					   $from_name = $admin_arr['admin_fname'];
					  }
					  echo $from_name; ?><br />
				      [ <?php echo $eachrecord['user_type']; ?> ]</td>
                      <td width="14%" align="center" valign="middle" class="narmal">
					  <a href="?pid=34&action=viewtutorial&tutid=<?php echo $eachrecord['tut_id']; ?>" ><img src="images/b_browse.png" border="0" title="View" alt="View"  /></a> &nbsp;&nbsp;<a href="javascript: void(0)" onclick="popup_letter('?pid=34&action=print_view&tutid=<?php echo $eachrecord['tut_id']; ?><?php echo $PageUrl;?>')" ><img src="images/print_16.png" border="0" title="Print " alt="Print " /></a></td>
                    </tr>       
                    
					<?php } //}?>
					<tr height="25">
                      <td align="cnter" colspan="7"><?php  paginateexte($start, $q_limit, $no_rows,'action=tutorialslist')?></td>
                      
                    </tr>
					<tr height="25">
                      <td align="right" colspan="7" class="narmal"><input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=34&action=print_list<?php echo $PageUrl;?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /></td>
                    </tr>   
					<?php
					
					 } else { ?> 
					 <tr>
                      <td height="30" align="center" colspan="7" class="narmal">No Records Found</td>
                    </tr>
                    
                    <?php }  ?>
                </table></td>
                  </tr>
                  <tr>
                       <td height="25" align="left" valign="middle">&nbsp;</td>
                  </tr>
                </table></td>
				<td width="1" class="bgcolor_02"></td>
              </tr>
			  
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
              </tr>
            </table>
<?php } if($action == "viewtutorial" || $action=='print_view') {?>	
<table width="100%" border="0" cellspacing="0" cellpadding="0">

				 
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>		  
               <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Tutorial </span></td>
              </tr>	
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="center" valign="top"><form method="post" action="" name="tutorial"><table width="95%"  border="0" cellpadding="2" cellspacing="0">
				<tr height="25" >
                              <td width="13%" height="27" align="left" class="narmal">Class&nbsp; </td>
                              <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="86%" align="left" valign="middle" class="narmal"><?php echo $viewtutorial['es_classname']; ?></td>
                  </tr>
				   
				<tr height="25" >
                              <td width="13%" height="27" align="left" class="narmal">Subject&nbsp; </td>
                  <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="86%" align="left" valign="middle" class="narmal"><?php echo $viewtutorial['es_subjectname']; ?></td>
                  </tr>
				  <tr height="25" >
                              <td width="13%" height="27" align="left" class="narmal">Unit&nbsp; </td>
                    <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="86%" align="left" valign="middle" class="narmal"><?php echo $viewtutorial['unit_name']; ?></td>
                  </tr>
				  
                             <tr height="25" >
                               <td width="13%" align="left" class="narmal" height="27">Chapter&nbsp; </td>
                               <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="86%" align="left" valign="middle" class="narmal"><?php echo $viewtutorial['chapter_name']; ?></td>
                  </tr>
                    <tr height="25">
                               <td width="13%" align="left" class="narmal" height="27"> Title </td>
                               <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="86%" align="left" valign="middle" class="narmal"><?php echo $viewtutorial['title']; ?></td>
                  </tr>
				   <?php if($viewtutorial['tut_desc']!=""){ ?>
				  <tr height="25" >
                               <td width="13%" align="left" class="narmal" height="27">Introduction&nbsp;&&nbsp;Objective</td>
                               <td width="1%" align="left" class="narmal">:</td>							   
                               <td width="86%" align="left" valign="middle" class="narmal"><?php echo $viewtutorial['tut_desc']; ?></td>
				  </tr>
				   <?php } if($viewtutorial['lesson']!=""){ ?>
				  <tr height="25" >
                               <td width="13%" align="left" class="narmal" height="27">Lesson</td>
                               <td width="1%" align="left" class="narmal">:</td>							   
                               <td width="86%" align="left" valign="middle" class="narmal"><?php echo $viewtutorial['lesson']; ?></td>
				  </tr>
				   <?php } if($viewtutorial['summary']!=""){ ?>
				  <tr height="25" >
                               <td width="13%" align="left" class="narmal" height="27">Summary</td>
                               <td width="1%" align="left" class="narmal">:</td>							   
                               <td width="86%" align="left" valign="middle" class="narmal"><?php echo $viewtutorial['summary']; ?></td>
				  </tr>
				  <?php } if($viewtutorial['file_path']!=""){ ?>
				  	   <tr height="25" >
                               <td width="13%" align="left" class="narmal" height="27">File&nbsp;Download</td>
                              <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="86%" align="left" class="narmal"><a href="?pid=34&downloadfile=<?php echo $viewtutorial['file_path']; ?>" title="Download"><?php echo RemoveDateFromFilename($viewtutorial['file_path']);?></a>
</td>
                  </tr>
				  <tr height="25" >
                               <td width="13%" align="left" class="narmal" height="27">Added By</td>
                               <td width="1%" align="left" class="narmal">:</td>							   
                     <td width="86%" align="left" class="narmal"><?php echo $username; ?> (<?php echo $viewtutorial['user_type']; ?>)</td>
                  </tr>
				  <?php }?>
				  <?php if($action == "viewtutorial" ){?>
				   <tr height="25" >
                               <td width="13%" align="left" class="narmal">&nbsp;</td>
                               <td width="1%" align="left" class="narmal">&nbsp;</td>							   
                               <td width="86%" align="left" class="narmal"><input name="" type="button" value="Back"  onclick="javascript:history.go(-1);" style="cursor:pointer;" class="bgcolor_02"/>&nbsp;&nbsp;<?php 						   
							   
							   if($questioncount>0){ ?><input name="check_your_progress" type="submit" value="Check Your Progress" style="cursor:pointer;" class="bgcolor_02"/><?php } else {  ?><input type="button" name="noquestions" value="Check Your Progress (DISABLED)" style="background-color: #CCCCCC; border:0 none; color:#000000; font-family:Tahoma; font-size:12px; font-weight:bold; text-transform:uppercase;" /><? } ?></td>
				  </tr>
				  <?php }?>
				 
									
                  </table></form>	</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>      
  		     <tr><td colspan="3" class="bgcolor_02" height="1"></td></tr>   
</table>
<?php }?>		
<?php if($action == 'print_list'){?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Tutorials</strong></td>
              </tr>
			  <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top"><br />
				<p align="left"><b>Class :</b><?php echo classname($student_det['pre_class']);?></p>
				<table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr height="25" class="bgcolor_02">
                      <td width="11%" align="center" valign="middle" class="admin">S.No</td>
					  <td width="12%" align="left" class="admin">Subject</td>
                      <td width="14%" align="left" class="admin">Unit </td>
                      <td width="18%" align="left" class="admin">Chapter</td>
                      <td width="22%" align="left" class="admin">Tutorial</td>
					  <td width="23%" align="left" class="admin">Created By</td>
                      
                    </tr>
                    <?php if($no_rows>0){
					$irow=0;
					foreach($tutorials_det as $eachrecord){
					$irow++;
					if(in_array($eachrecord['es_subjectid'],$subject_id_array))
						{
					 ?>
                    <tr height="25">
                      <td width="11%" align="center" valign="middle" class="narmal"><?php echo $irow; ?></td>
					  <td align="left" width="12%" class="narmal"><?php echo $eachrecord['es_subjectname']; ?></td>
                      <td align="left" width="14%" class="narmal"><?php echo $eachrecord['unit_name']; ?></td>
                      <td align="left" width="18%" class="narmal"><?php echo $eachrecord['chapter_name']; ?></td>
                      <td align="left" width="22%" class="narmal"><?php echo $eachrecord['title']; ?></td>
					   <td align="left" width="23%" class="narmal"><?php 
					  if($eachrecord['user_type']=='staff'){
					   $staff_arr =  get_staffdetails($eachrecord['user_id']);
					   $from_name = $staff_arr['st_firstname'].' '.$staff_arr['st_lastname'];
					  }
					  if($eachrecord['user_type']=='admin'){
					   $admin_arr = $db->getrow("select * from es_admins where es_adminsid=".$eachrecord['user_id']);
					   $from_name = $admin_arr['admin_fname'];
					  }
					  echo $from_name; ?><br />
				      [ <?php echo $eachrecord['user_type']; ?> ]</td>
                      
                    </tr>       
                    
					<?php }}?>
				
					<?php
					
					 } else { ?> 
					 <tr>
                      <td height="30" align="center" colspan="6" class="narmal">No Records Found</td>
                    </tr>
                    
                    <?php }  ?>
                </table>

				</td>
				
                <td width="1" class="bgcolor_02"></td>
              </tr>
              
                <td height="1" colspan="3" class="bgcolor_02"></td>
                </tr>
            </table>
<?php }?>