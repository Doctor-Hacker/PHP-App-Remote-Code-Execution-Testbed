<?php 
	/**
* Only Admin users can view the pages
*/
checkuserinlogin();
	if($action == 'gallerylist'  || $actionedit=='edit') { ?>
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
              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
  </tr>
               		  
               <tr>
                <td colspan="3" class="bgcolor_02"></td>
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
					  <table width="100%" border="0">
  <tr>
    <td align="center" valign="middle"><?php echo "<b>".ucwords($eachphoto['title'])."</b>"; ?></td>
  </tr>
  <tr>
    <td align="center" valign="middle"><object width="520" height="400">
<param name="movie" value="<?php echo $eachphoto['image_path']; ?>" />
</param>
<param name="wmode" value="transparent" />
</param>
<embed src="<?php echo $eachphoto['image_path']; ?>" type="application/x-shockwave-flash" wmode="transparent" width="520" height="400"></embed>
</object></td>
  </tr>
</table>

					  
					  
					
</td> </tr>
					
					 <?php }?>
					  <tr height="25">
                      <td align="center" class="narmal" ><?php paginateexte($start, $q_limit, $no_rows, "action=gallerylist&actionedit=edit&column_name=".$orderby) ?>	</td>
                    </tr>
					<?php }else {?>
					  <tr height="25">
                      <td align="center" class="narmal">No Records Found</td>
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
