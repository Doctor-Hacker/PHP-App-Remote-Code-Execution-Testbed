<?php 
	/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
	if($action == 'gallerylist'  || $actionedit=='edit') { ?>
<script src="DWConfiguration/ActiveContent/IncludeFiles/AC_ActiveX.js" type="text/javascript"></script>
<script src="DWConfiguration/ActiveContent/IncludeFiles/AC_RunActiveContent.js" type="text/javascript"></script>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Videos</span></td>
              </tr>	
               <tr>
                <td height="5" colspan="3"  ></td>
              </tr>			  
               <?php if (in_array("26_1", $admin_permissions)) {?><tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Add Video </span></td>
              </tr>	
			  <tr>
                <td width="1px" class="bgcolor_02" ></td>
                <td height="25" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font><br /></td>
                 <td width="1px" class="bgcolor_02" ></td></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="center" valign="top"><br />
				<form method="post" action="" enctype="multipart/form-data">
				<table width="90%" border="0" cellpadding="2" cellspacing="0">
                            <tr height="25" >
                              <td width="10%" align="left" class="narmal">Title</td>							   
                              <td width="30%" align="left" class="narmal"><?php echo $html_obj->draw_inputfield('title',$rs_editphoto['title']); ?><font color="#FF0000">&nbsp;*</font></td>
                            </tr>
							  <tr height="25" >
                              <td width="10%" align="left" class="narmal">Embed Code</td>							   
                              <td width="30%" align="left" class="narmal"><?php echo $html_obj->draw_textarea('image_path',$rs_editphoto['image_path']); ?><font color="#FF0000">&nbsp;*</font></td>
                             </tr>
							
							  <tr height="25" >
                              <td width="10%" align="left" class="narmal">The Embedded code should be like this</td>							   
                              <td width="30%" align="left" class="narmal"><textarea cols="40" rows="10"><object width="560" height="349"><param name="movie" value="http://www.youtube-nocookie.com/v/BvhDmOSveaY?fs=1&amp;hl=en_US"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube-nocookie.com/v/BvhDmOSveaY?fs=1&amp;hl=en_US" type="application/x-shockwave-flash" width="560" height="349" allowscriptaccess="always" allowfullscreen="true"></embed></object></textarea></td>
                             </tr>
							   <tr height="25" >
							   <td></td>
                              <td width="10%" align="left" class="narmal" >Note: Other than the above no other format will be accepted</td>							   
                             
                             </tr>
							 
							<tr height="25">
							  <td align="left" width="10%" class="narmal"></td>
							  <td width="30%" align="left" class="narmal">
							  <?php if($actionedit!="edit"){?>
							  <input type="submit" class="bgcolor_02" name="addphoto" value="Add" />
							  <?php }else {?> <input type="submit" class="bgcolor_02" name="updatephoto" value="Update" /> <?php }?>
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
              </tr>	<?php }?>		  
               <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Videos List</span></td>
              </tr>	
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="center" valign="top"><br />
                  <table width="97%" border="0" cellpadding="0" cellspacing="0">
                   
                <?php
            $rownum = $start;
            if ($no_rows>= 1) {
            foreach ($rs_photos as $eachphoto){
            $rownum++;
          
            ?>  
                    <tr height="25">
                
                     
                      <td width="55%" align="center" valign="middle" class="narmal">
					  <br />
					 
					  <?php //echo $eachphoto['image_path']; ?>
					  
					  <object width="260" height="149"><param name="movie" value="<?php echo $eachphoto['image_path']; ?>"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="<?php echo $eachphoto['image_path']; ?>" type="application/x-shockwave-flash" width="260" height="149" allowscriptaccess="always" allowfullscreen="true"></embed></object>

</td>
                     
					    <td width="45%" align="center" valign="top"><br />
						<table width="300" border="0">
  <tr>
    <td>Title</td>
    <td>:</td>
    <td><?php echo ucwords($eachphoto['title']); ?></td>
  </tr>
  <tr>
    <td>Status</td>
    <td>:</td>
    <td>
	

	<a href="?pid=56&action=updatestatus&id=<?php echo $eachphoto['id'];?>&status=<?php echo $eachphoto['status']; ?>&start=<?php echo $start;?>" style="text-decoration:none" class="categories_text1" title="click&nbsp;here&nbsp;to&nbsp;change&nbsp;status"> <?php echo $eachphoto['status']; ?></a>	



	
	
	</td>
  </tr>
  <tr>
    <td>Action</td>
    <td>:</td>
    <td><?php /*?><a href="?pid=56&action=gallerylist&actionedit=edit&id=<?php echo $eachphoto['id'];?>&status=<?php echo $eachphoto['status']; ?>&start=<?php echo $start;?>"title="Edit"><img src="images/b_edit.png" width="16" height="16" hspace="2"  border="0"/></a><?php */?>&nbsp;<?php if (in_array("26_2", $admin_permissions)) {?><a href="?pid=56&action=delete&id=<?php echo $eachphoto['id'];?>&start=<?php echo $start;?>" title="Delete" onClick="return confirm('Are you sure you want to  delete ?')"><img src="images/b_drop.png" width="16" height="16" hspace="2"  border="0"/></a><?php }else{ echo "-"; }?>	</td>
  </tr>
</table>

						</td>
                    </tr>
					
					 <?php }?>
					  <tr height="25">
                      <td align="center" class="narmal" colspan="2"><?php paginateexte($start, $q_limit, $no_rows, "action=gallerylist&column_name=".$orderby) ?>	</td>
                    </tr>
					<?php }else {?>
					  <tr height="25">
                      <td align="center" class="narmal" colspan="2">No Records Found</td>
                    </tr><?php }?>
                  </table>
				  
			    </td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
  </tr>
  
 
</table>
			

			
						
			<?php } ?>
