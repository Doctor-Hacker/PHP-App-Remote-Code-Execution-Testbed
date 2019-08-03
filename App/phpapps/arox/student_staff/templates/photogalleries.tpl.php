<?php 
	/**
* Only Admin users can view the pages
*/
include("includes/js/fckeditor/fckeditor.php") ;

	?>

<?php if($action == 'albumlist') { ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">

				<tr>
         <td height="3" colspan="3"></td>
	 </tr>	
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;Photo Album  <span class="admin"></span></td>
  </tr>
               <tr>
                <td width="1px" class="bgcolor_02" ></td>
                <td height="25" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">&nbsp;</font><br /></td>
                 <td width="1px" class="bgcolor_02" ></td></td>
              </tr>
                       		  
                <tr>
                <td width="1" class="bgcolor_02"></td>
                <td  align="center" valign="top">
               
                  <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr height="25" class="bgcolor_02">
                      <td width="11%" align="left" class="admin">&nbsp;S.No</td>
                      <td width="29%" align="left" valign="middle" class="admin">Title</td>
                      <td width="30%" align="center" class="admin">Number of Photos </td>
                      
                      <td width="30%" align="center" class="admin">Action&nbsp;</td>
                    </tr>
                    <?php if($no_albums>0){
					$irow=0;
					foreach($rs_all_albums as $eachrecord){
					$irow++;
					 ?>
                    <tr height="25">
                      <td align="left" width="11%" class="narmal">&nbsp;<?php echo $irow; ?></td>
                      <td width="29%" align="left" valign="middle" class="narmal"><?php echo $eachrecord['title']; ?></td>
                      <td width="30%" align="center" valign="middle" class="narmal"><?php $sql="select * from es_photogallery where pid=".$eachrecord['id'];
					  $nophotos=$db->getRows($sql);
					  echo count($nophotos);
					   ?></td>
                  
                      <td align="center" width="30%" class="narmal">
					 
					  <table width="200" border="0" align="center">
  <tr>
    <td width="95" align="right" valign="middle"><?php if(count($nophotos)>0){?><a href="?pid=41&action=gallerylist&apid=<?php echo $eachrecord['id'];?>&starttwo=<?php echo $start;?>"><img src="images/b_browse.png" border="0" title="View" alt="View" /></a><?php }?></td>
    <td width="95" align="left" valign="middle">&nbsp;</td>
  </tr>
</table>

					 
					  </td>
                    </tr>       
                    
					<?php }?>
					 <tr height="25">
                      <td align="center" class="narmal" colspan="5"><?php paginateexte($start, $q_limit, $no_albums, "action=albumlist&column_name=".$orderby) ?>	</td>
                    </tr>
					<tr height="25">
                      <td align="right" class="narmal" colspan="5"><input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=41&action=print_album&start=<?php echo $start; ?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /></td>
                    </tr>
					<?php  } else { ?> 
					 <tr height="25">
                      <td align="center" colspan="5" class="narmal">No Records Found</td>
                    </tr>
                    
                    <?php }  ?>
                </table>
				
				</td>
                <td width="1" class="bgcolor_02">
				</td>
              </tr>
			   <tr>
                <td height="1" colspan="3" class="bgcolor_02"  ></td>
              </tr>	
			  
   
</table>

<?php } ?>

<?php if($action == 'add' || $action=="edit") { ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">

				 
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>	<tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Photo Album </span></td>
              </tr>	
               <tr>
                <td width="1px" class="bgcolor_02" ></td>
                <td align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font><br /></td>
                 <td width="1px" class="bgcolor_02" ></td></td>
              </tr>		  
               <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Add Photo </span></td>
              </tr>	
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="center" valign="top"><br />
              <form method="post" action="" enctype="multipart/form-data">
				<table width="90%" border="0" cellpadding="2" cellspacing="0">
                            <tr height="25" >
                              <td width="10%" align="left" class="narmal">Album</td>							   
                              <td width="30%" align="left" class="narmal"><?php echo $html_obj->draw_selectfield('apid',$albmarray,'$apid'); ?><font color="#FF0000">&nbsp;*</font>
							  </td>
                            </tr>
                            <tr height="25" >
                              <td width="10%" align="left" class="narmal">Title</td>							   
                              <td width="30%" align="left" class="narmal"><?php echo $html_obj->draw_inputfield('title',$rs_editphoto['title']); ?><font color="#FF0000">&nbsp;*</font></td>
                            </tr>
							<?php if($actionedit=="edit"){?>
                             <tr height="25" >
                              <td width="10%" align="left" class="narmal">Image</td>							   
                              <td width="30%" align="left" class="narmal"><?php  echo displayimage("images/student_photos/".$rs_editphoto['image_path'], "150"); ?></td>
							  <?php echo $html_obj->draw_hiddenfield('hiddenimage',$rs_editphoto['image_path']); ?>
                            </tr>
							<?php }?>
                             <tr height="25" >
                              <td width="10%" align="left" class="narmal">Image</td>							   
                              <td width="30%" align="left" class="narmal"><?php echo $html_obj->draw_inputfield('image_path','','file',''); ?><font color="#FF0000">&nbsp;*</font></td>
                             </tr>
							<tr height="25">
							  <td align="left" width="10%" class="narmal"></td>
							  <td align="left" width="30%" class="narmal">
							  <?php if($actionedit!="edit"){?>
							  <input type="submit" class="bgcolor_02" name="addphoto" value="Add" />
							  <?php }else {?>  <input type="submit" class="bgcolor_02" name="updatephoto" value="Update" /> <?php }?>
							  &nbsp;<input type="submit" class="bgcolor_02" name="back" value="Back To Albums List" />
							  </td>
					    </tr>			
                  </table>	
				  </form>		
				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
  </tr>
               <tr>
                <td height="5" colspan="3"  ></td>
              </tr>	             
              
              
             
   
</table>
<?php } ?>

<?php if($action == 'addalbum') { ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">

				 
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>	<tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Photo Album </span></td>
              </tr>	
               <tr>
                <td width="1px" class="bgcolor_02" ></td>
                <td align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font><br /></td>
                 <td width="1px" class="bgcolor_02" ></td></td>
              </tr>		  
               <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Add Album</span></td>
              </tr>	
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="center" valign="top"><br />
              <form method="post" action="" enctype="multipart/form-data">
				<table width="90%" border="0" cellpadding="2" cellspacing="0">
                          
                            <tr height="25" >
                              <td width="10%" align="left" class="narmal">Title</td>							   
                              <td width="30%" align="left" class="narmal"><?php echo $html_obj->draw_inputfield('title'); ?><font color="#FF0000">&nbsp;*</font>
</td>
                            </tr>
							 
							<tr height="25">
							  <td align="left" width="10%" class="narmal"></td>
							  <td align="left" width="30%" class="narmal">
							 
							  <input type="submit" class="bgcolor_02" name="addalbum" value="Add" />&nbsp;<input type="submit" class="bgcolor_02" name="back" value="Back To Albums List" />
							 
							  </td>
					    </tr>			
                  </table>	
				  </form>		
				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
  </tr>
               <tr>
                <td height="5" colspan="3"  ></td>
              </tr>	             
              
              
             
   
</table>
<?php } if($action == 'gallerylist'){?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">

              <tr>
         <td height="3" colspan="3"></td>
	 </tr>	<tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;<span class="admin"><?php echo $albumname['title'].'&nbsp;Album';?></span></td>
              </tr>	
			  
			  <tr>
                <td width="1px" class="bgcolor_02"  height="3"></td>
                <td align="right">&nbsp;</td>
                 <td width="1px" class="bgcolor_02" ></td></td>
              </tr>	
               <tr>
                <td width="1px" class="bgcolor_02" ></td>
                <td align="right" height="25"><form action=""  method="post">&nbsp;<input type="hidden" class="bgcolor_02" name="starttwo" value="<?php echo $starttwo; ?>" />&nbsp;<input type="submit" class="bgcolor_02" name="backtoalbum" value="Back To Albums List" />&nbsp;</form></td>
                 <td width="1px" class="bgcolor_02" ></td></td>
              </tr>  
               <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;Photos <span class="admin"></span></td>
              </tr>	
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="center" valign="top"><br />
             	
				  
				      <div class="highslide-gallery" style="padding-top:3px;">
             <table width="97%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                  
                <?php
				
            $rownum = 0;
            if ($no_photos>= 1) {
			//array_print($photo_arr);
			
			for($i=0;$i<count($photo_arr);$i++){
		   if($rownum%3 == 0){
		   echo "</tr><tr>";
		   }
          
            ?>  
            
            <td align="center">
            <table width="150" border="0" cellspacing="0" cellpadding="2" class="narmal">
    
  <tr>
    <td colspan="2" align="center"><b><?php echo $photo_arr[$i]['title']; ?></b></td>
    </tr>
  <tr>
    <td colspan="2" align="center">   
	<a id="thumb2" href="../office_admin/images/student_photos/<?php echo $photo_arr[$i]['image_path'];?>" style="cursor: pointer;" onclick="return hs.expand(this,	{ slideshowGroup: 9} )" class="header_link">
<b><?php echo displayimage("../office_admin/images/student_photos/".$photo_arr[$i]['image_path'], "150"); ?></b>
</a>
<br /><input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=41&action=print_photo_single&apid=<?php echo $apid; ?>&starttwo=<?php echo $starttwo;?>&id=<?php echo $photo_arr[$i]['id'] ?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  />
<div class="highslide-caption">
	<?php echo $photo_arr[$i]['title'];?>
</div>
	</td>
    </tr>
  
  <tr>
    <td align="center">&nbsp;</td>
    <td align="right"></td>
  </tr>
</table>

         </td>
                   
                    
                    
					
					 <?php
					  $rownum++;
					  }?>
					  <tr height="25">
                      <td align="center" class="narmal" colspan="5"><?php paginateexte($start, $q_limit, $no_photos, "action=gallerylist&column_name=".$orderby."&apid=".$apid."&starttwo=".$starttwo) ?>	</td>
                    </tr>
					<tr height="25">
                      <td align="right" class="narmal" colspan="5"><input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=41&action=print_photo&apid=<?php echo $apid; ?>&starttwo=<?php echo $starttwo;?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /></td>
                    </tr>
					<?php }else {?>
					  <tr height="25">
                      <td align="center" class="narmal" colspan="5">No Records Found</td>
                    </tr><?php }?>

                  </table>	
                  </div>
				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
  </tr>
               <tr>
                <td height="5" colspan="3"  ></td>
              </tr>	             
              
              
             
   
</table>
<?php } ?>
<?php if($action == 'print_photo'){?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;PHOTO ALBUM</strong></td>
              </tr>
			  <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top"><br />
				<table width="97%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                  
                <?php
				
            $rownum = 0;
            if ($no_photos>= 1) {
			
			
			for($i=0;$i<count($photo_arr);$i++){
		   if($rownum%3 == 0){
		   echo "</tr><tr>";
		   }
          
            ?>  
            
            <td align="center">
            <table width="150" border="0" cellspacing="0" cellpadding="2" class="narmal">
    
  <tr>
    <td colspan="2" align="center"><b><?php echo $photo_arr[$i]['title']; ?></b></td>
    </tr>
  <tr>
    <td colspan="2" align="center">   
	<a id="thumb2" href="../office_admin/images/student_photos/<?php echo $photo_arr[$i]['image_path'];?>" style="cursor: pointer;" onclick="return hs.expand(this,	{ slideshowGroup: 9} )" class="header_link">
<b><?php echo displayimage("../office_admin/images/student_photos/".$photo_arr[$i]['image_path'], "150"); ?></b>
</a>

	</td>
    </tr>
  
  <tr>
    <td align="center">&nbsp;</td>
    <td align="right"></td>
  </tr>
</table>

         </td>
                   
                    
                    
					
					 <?php
					  $rownum++;
					  }?>
					  <tr height="25">
                      <td align="center" class="narmal" colspan="5"><?php paginateexte($start, $q_limit, $no_photos, "action=gallerylist&column_name=".$orderby."&apid=".$apid."&starttwo=".$starttwo) ?>	</td>
                    </tr>
					
					<?php }else {?>
					  <tr height="25">
                      <td align="center" class="narmal" colspan="5">No Records Found</td>
                    </tr><?php }?>

                  </table>

				</td>
				
                <td width="1" class="bgcolor_02"></td>
              </tr>
              
                <td height="1" colspan="3" class="bgcolor_02"></td>
                </tr>
            </table>
<?php }?>
<?php if($action == 'print_album'){?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp; Photo Album</strong></td>
              </tr>
			  <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top"><br />
				<table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr height="25" class="bgcolor_02">
                      <td width="11%" align="left" class="admin">&nbsp;S.No</td>
                      <td width="29%" align="left" valign="middle" class="admin">Title</td>
                      <td width="30%" align="center" class="admin">Number of Photos </td>
                      
                     
                    </tr>
                    <?php if($no_albums>0){
					$irow=0;
					foreach($rs_all_albums as $eachrecord){
					$irow++;
					 ?>
                    <tr height="25">
                      <td align="left" width="11%" class="narmal">&nbsp;<?php echo $irow; ?></td>
                      <td width="29%" align="left" valign="middle" class="narmal"><?php echo $eachrecord['title']; ?></td>
                      <td width="30%" align="center" valign="middle" class="narmal"><?php $sql="select * from es_photogallery where pid=".$eachrecord['id'];
					  $nophotos=$db->getRows($sql);
					  echo count($nophotos);
					   ?></td>
                  
                    </tr>       
                    
					<?php }?>
					 
					<?php  } else { ?> 
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
<?php if($action == 'print_photo_single'){?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;PHOTO ALBUM</strong></td>
              </tr>
			  <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="center" valign="middle" style="padding:3px;"><br />
				<img src="../office_admin/images/student_photos/<?php echo $photo_det['image_path'];?>"  />
				

				</td>
				
                <td width="1" class="bgcolor_02"></td>
              </tr>
              
                <td height="1" colspan="3" class="bgcolor_02"></td>
                </tr>
            </table>
<?php }?>


			
						
			
