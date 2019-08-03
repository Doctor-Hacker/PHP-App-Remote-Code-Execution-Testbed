<?php 
	/**
* Only Admin users can view the pages
*/
checkuserinlogin();  
	if($action == 'holidayslist'){ ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Holidays  </span></td>
  </tr>	
              		  
              
              
           
               		  
               <tr>
               <td width="1" class="bgcolor_02">
                <td height="35"><table width="120" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><a href="?pid=29&action=holidayslist&year=<?php echo $year-1;?>" title="Previous Year <?php echo $year-1;?>"><img src="images/arrow-previous.png" border="0" /></a></td>
    <td><b><?php echo $year; ?></b></td>
    <td><a href="?pid=29&action=holidayslist&year=<?php echo $year+1;?>" title="Next Year <?php echo $year+1;?>" ><img src="images/arrow-next.png" border="0" /></a></td>
  </tr>
</table></td>
			<td width="1" class="bgcolor_02">
  </tr>	
               <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Holidays  for <?php echo $year; ?></span></td>
  </tr>	
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top">
                               
                
                  <table width="100%" border="0" cellpadding="0" cellspacing="0">
                   <!-- <tr height="25" class="bgcolor_02">
                      <td width="15%" align="left" class="admin">S.No</td>
                      <td width="55%" align="left" class="admin">Title</td>
                      <td width="30%" align="left" class="admin"> Date </td>
                     
					
                    </tr>-->
                <?php
            $rownum = $start;
            if ($no_rows>= 1) {
            foreach ($rs_photos as $eachdate){
            $rownum++;
          
            ?>  
                    <tr height="25">
                      <td align="left" valign="middle" class="narmal"><?php echo $rownum; ?></td>
                      <td align="left" valign="middle" class="narmal"><?php echo $eachdate['title']; ?></td>
                      <td align="left" valign="middle" class="narmal"><?php $holiday=formatDBDateTOCalender($eachdate['holiday_date'],"d/m/Y");
					   echo $holiday;
					   ?></td>
					    
                    </tr>
					 <?php }?>
					 <tr height="25">
                   <td align="right" colspan="3" style="padding-right:5px;"><input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=29&action=print_holidays&year=<?php echo $year;?>&start=<?php echo $start;?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /></td>                   
                </tr>
					 
					<?php }else {?>
					  <tr height="30">
                      <td align="center" class="narmal" colspan="3">No Records Found</td>
                    </tr>
					<?php }?>
                  </table>
			    </td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
  </tr>
  
 
</table>
						<?php } ?>
<?php if($action == 'print_holidays'){?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Holidays  for <?php echo $year; ?></strong></td>
              </tr>
			  <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top">
				<table width="100%" border="0" cellpadding="0" cellspacing="0">
                
                <?php
            $rownum = $start;
            if ($no_rows>= 1) {
            foreach ($rs_photos as $eachdate){
            $rownum++;
          
            ?>  
                    <tr height="25">
                      <td align="left" valign="middle" class="narmal"><?php echo $rownum; ?></td>
                      <td align="left" valign="middle" class="narmal"><?php echo $eachdate['title']; ?></td>
                      <td align="left" valign="middle" class="narmal"><?php $holiday=formatDBDateTOCalender($eachdate['holiday_date'],"d/m/Y");
					   echo $holiday;
					   ?></td>
					    
                    </tr>
					 <?php }?>
										 
					<?php }else {?>
					  <tr height="30">
                      <td align="center" class="narmal" colspan="3">No Records Found</td>
                    </tr>
					<?php }?>
                  </table>

				</td>
				
                <td width="1" class="bgcolor_02"></td>
              </tr>
              
                <td height="1" colspan="3" class="bgcolor_02"></td>
                </tr>
            </table>
<?php }?>
