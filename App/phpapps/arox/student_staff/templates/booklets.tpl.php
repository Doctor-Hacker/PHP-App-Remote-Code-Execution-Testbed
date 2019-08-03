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
<?php if($action == "bookletlist") {
?>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;Booklet </strong></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="4" cellpadding="0">
                  <tr>
                    <td align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr height="25" class="bgcolor_02">
                      <td width="7%" align="left" class="admin">S.No</td>
                      <td width="28%" align="left" class="admin">Subject  </td>
                      
                      <td width="29%" align="left" class="admin">Book Name</td>
					  <td width="20%" align="left" class="admin">Created By</td>
                      <td width="16%" align="left" class="admin">Action</td>
                    </tr>
                    <?php if($no_rows>0){
					$irow=0;
					foreach($tutorials_det as $eachrecord){
					$irow++;
					if(in_array($eachrecord['es_subjectid'],$subject_id_array))
						{
					 ?>
                    <tr height="25">
                      <td align="left" width="7%" class="narmal"><?php echo $irow; ?></td>
                      <td align="left" width="28%" class="narmal"><?php echo $eachrecord['es_subjectname']; ?></td>
                      
                      <td align="left" width="29%" class="narmal"><?php echo ucwords($eachrecord['book_name']); ?></td>
					  <td align="left" width="20%" class="narmal"><?php 
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
                      <td align="left" width="16%" class="narmal">
					  <a href="?pid=35&action=viewbooklet&blid=<?php echo $eachrecord['booklet_id']; ?>" ><img src="images/b_browse.png" border="0" title="View" alt="View" /></a> &nbsp;&nbsp;<a href="javascript: void(0)" onclick="popup_letter('?pid=35&action=print_view&blid=<?php echo $eachrecord['booklet_id']; ?><?php echo $PageUrl;?>')" ><img src="images/print_16.png" border="0" title="Print " alt="Print " /></a></td>
                    </tr>       
                    
					<?php }}?>
					<tr height="25">
                      <td align="cnter" colspan="5"><?php  paginateexte($start, $q_limit, $no_rows,'action=bookletlist')?></td>
                      
                    </tr>  
					<tr height="25">
                      <td align="center" colspan="6" class="narmal"><input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=35&action=print_list<?php echo $PageUrl;?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /></td>
                    </tr> 
					<?php
					
					 } else { ?> 
					 <tr height="25">
                      <td align="center" colspan="5" class="narmal">No Records Found</td>
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
<?php } if($action == "viewbooklet" || $action=='print_view') {?>	
<table width="100%" border="0" cellspacing="0" cellpadding="0">

				 
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>	<tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Booklet </span></td>
              </tr>	
              
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="center" valign="top"><table width="95%"  border="0" cellpadding="2" cellspacing="0">
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
                               <td width="13%" align="left" class="narmal"> Title </td>
                               <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="86%" align="left" valign="middle" class="narmal"><?php echo $viewtutorial['book_name']; ?></td>
                  </tr>
				   <?php if($viewtutorial['book_desc']!=""){ ?>
				  <tr height="25" >
                               <td width="13%" align="left" class="narmal">Description</td>
                               <td width="1%" align="left" class="narmal">:</td>							   
                               <td width="86%" align="left" valign="middle" class="narmal"><?php echo $viewtutorial['book_desc']; ?></td>
				  </tr><?php } 
				 
				  
				  if($viewtutorial['book_file']!=""){ ?>
				  	   <tr height="25" >
                               <td width="13%" align="left" class="narmal">File&nbsp;Download</td>
                              <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="86%" align="left" class="narmal"><a href="?pid=35&downloadfile=<?php echo $viewtutorial['book_file']; ?>" title="Download"><?php echo RemoveDateFromFilename($viewtutorial['book_file']);?></a>
</td>
                  </tr>
				  <?php }?>
				  <tr height="25" >
                               <td width="13%" align="left" class="narmal">Created By</td>
                               <td width="1%" align="left" class="narmal">:</td>							   
                               <td width="86%" align="left" valign="middle" class="narmal"><?php echo $username; ?> (<?php echo $viewtutorial['user_type']; ?>)</td>
				  </tr>
				  <?php if($action=='viewbooklet'){?>
				   <tr height="25" >
                               <td width="13%" align="left" class="narmal">&nbsp;</td>
                               <td width="1%" align="left" class="narmal">&nbsp;</td>							   
                               <td width="86%" align="left" class="narmal"><input name="" type="button" value="Back"  onclick="javascript:history.go(-1);" style="cursor:pointer;" class="bgcolor_02"/></td>
				  </tr>
				  <?php }?>
				 
									
                  </table>
                
				</td>
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
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Booklet </strong></td>
              </tr>
			  <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top"><br />
				<p align="left"><b>Class :</b><?php 
				 	$single_tutorial_class = "SELECT *
	                  FROM es_classes  WHERE  es_classesid ='".$student_det['pre_class']."'" ;
					$viewtutorial = $db->getrow($single_tutorial_class);
				echo $viewtutorial['es_classname'];?></p>
				<table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr height="25" class="bgcolor_02">
                      <td width="10%" align="left" class="admin">S.No</td>
                      <td width="38%" align="left" class="admin">Subject  </td>
                      
                      <td width="34%" align="left" class="admin">Book Name</td>
					  <td width="34%" align="left" class="admin">Created By</td>
                      
                    </tr>
                    <?php if($no_rows>0){
					$irow=0;
					foreach($tutorials_det as $eachrecord){
					$irow++;
					if(in_array($eachrecord['es_subjectid'],$subject_id_array))
						{
					 ?>
                    <tr height="25">
                      <td align="left" width="10%" class="narmal"><?php echo $irow; ?></td>
                      <td align="left" width="38%" class="narmal"><?php echo $eachrecord['es_subjectname']; ?></td>
                      
                      <td align="left" width="34%" class="narmal"><?php echo ucwords($eachrecord['book_name']); ?></td>
                      <td align="left" width="18%" class="narmal"><?php 
					  if($eachrecord['user_type']=='staff'){
					   $staff_arr =  get_staffdetails($eachrecord['user_id']);
					   $from_name = $staff_arr['st_firstname'].' '.$staff_arr['st_lastname'];
					  }
					  if($eachrecord['user_type']=='admin'){
					   $admin_arr = $db->getrow("select * from es_admins where es_adminsid=".$eachrecord['user_id']);
					   $from_name = $admin_arr['admin_fname'];
					  }
					  echo $from_name; ?><br />[ <?php echo $eachrecord['user_type']; ?> ]</td>
                    </tr>       
                    
					<?php } }?>
					<tr height="25">
                      <td align="cnter" colspan="4"><?php  paginateexte($start, $q_limit, $no_rows,'action=bookletlist')?></td>
                      
                    </tr>   
					<?php
					
					 } else { ?> 
					 <tr height="25">
                      <td align="center" colspan="4" class="narmal">No Records Found</td>
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