<table width="100%" height="100" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="45%" align="left" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
   <td width="30">&nbsp;</td>
    <td width="150"><?php if($_SESSION['eschools']['schoollogo']!=""){ echo displayimage("../office_admin/images/school_logo/".$_SESSION['eschools']['schoollogo'], "100"); } ?></td>
    <td style="font-size:18px; font-weight:bold;"><?php echo str_replace(" ","&nbsp;",stripslashes($_SESSION['eschools']['schoolname'])); ?></td>
   
  </tr>
</table>
</td>
        <td width="33%">&nbsp;</td>
        <td width="22%" align="center" valign="middle"><table width="100%" border="0" cellpadding="0" cellspacing="0">
		
  <tr>
   <?php
           
           $header_videos   = "SELECT * FROM  es_videogallery  WHERE  status='Active' ORDER BY  id DESC  LIMIT 0, 2"; 
		   $header_videos_rows  = sqlnumber("select * from es_videogallery where status !='Deleted'");
	      $header_videos_det  = $db->getRows($header_videos );
          
            if ($header_videos_rows>= 1) {
            foreach ($header_videos_det as $each_header_videos){
            $rownum++;
          
            ?>  
    <td width="50%" align="center"><object width="100" height="100"><param name="movie" value="<?php echo $each_header_videos['image_path']; ?>" />
</param>
<param name="wmode" value="transparent" />
</param><embed src="<?php echo $each_header_videos['image_path']; ?>" type="application/x-shockwave-flash" wmode="transparent" width="105" height="90"></embed>
</object></td>
    <?php }} ?>
  </tr>
  <tr>
    <td colspan="2" align="right"><?php if ($header_videos_rows>= 1) {?><a href="?pid=32&action=gallerylist" class="video_link">View More Videos&nbsp;</a><?php }else{echo "Videos to be added";}?></td>
    
  </tr>
</table>
</td>
      </tr>
    </table>