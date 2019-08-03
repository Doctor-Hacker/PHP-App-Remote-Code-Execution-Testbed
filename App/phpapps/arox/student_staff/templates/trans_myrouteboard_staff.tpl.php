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

<?php if ($action == 'mydetails') { 

?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;My Transport Details</strong></td>
              </tr>
			  <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top"><table width="100%" border="0" cellpadding="1" cellspacing="1" bordercolor="#CCCCCC">
				  <tr  class="bgcolor_02">
					
					<td width="19%" height="22" align="center"><strong>Type of the vehicle</strong></td>
                    <td width="23%" align="center"><strong>Registration No. Of Vehicle</strong></td>
                    <td width="21%" align="center"><strong>Route</strong></td>
                    <td width="21%" align="center"><strong>Name of the Driver</strong></td>
                    
				  </tr>
				  <?php if(is_array($query) && count($query) > 0 ){ ?>
				  
				  <tr height="30">
					<td align="center"><?php echo $query['tr_transport_type'];?></td>
                    <td align="center"><?php echo $query['tr_vehicle_no'];?></td>
                    <td align="center"><?php  echo $query['route_title']."(".$query['board_title'].")";?></td>
                    <td align="center">
                    <?php $vehicle_row=$db->getrow("SELECT * FROM  es_staff WHERE es_staffid=".$query['driver_id']);
                    echo $vehicle_row['st_firstname']." ".$vehicle_row['st_lastname'];
					?><br />[<?php echo $vehicle_row['es_staffid'] ?>]
                    </td>
                   
				  </tr>
				  <tr height="25">
                   <td align="right" colspan="5" style="padding-right:5px;"><input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=46&action=print_tr_details&start=<?php echo $start.$PageUrl; ?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /></td>                   
                </tr>
				  <?php           
				  }
				   else {
				   echo "<tr>";
				   echo "<td align='center' class='narmal' colspan='5'>No records found</td>";
				   echo "</tr>";
				  } 
				  ?>
				</table></td>
				
                <td width="1" class="bgcolor_02"></td>
              </tr>
              
                <td height="1" colspan="3" class="bgcolor_02"></td>
                </tr>
            </table>



<?php } ?>

<?php if($action == 'print_tr_details'){?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;My Transport Details</strong></td>
              </tr>
			  <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top">
				<table width="100%" border="0">
  <tr>
    <td><table width="100%" border="0">
  <tr>
    <td width="21%" class="admin">Emp.Id</td>
    <td width="42%">:&nbsp;<?php echo $_SESSION['eschools']['user_id'];?></td>
    <td width="17%" class="admin">Staff Name</td>
    <td width="20%">:&nbsp;<?php echo $query['st_firstname']." ".$query['st_lastname'];?></td>
  </tr>
  
</table>
</td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellpadding="1" cellspacing="1" bordercolor="#CCCCCC">
				  <tr  class="bgcolor_02">
					
					<td width="19%" height="22" align="center"><strong>Type of the vehicle</strong></td>
                    <td width="23%" align="center"><strong>Registration No. Of Vehicle</strong></td>
                    <td width="21%" align="center"><strong>Route</strong></td>
                    <td width="21%" align="center"><strong>Name of the Driver</strong></td>
                    
				  </tr>
				  <?php if(is_array($query) && count($query) > 0 ){ ?>
				  <tr height="30">
					<td align="center"><?php echo $query['tr_transport_type'];?></td>
                    <td align="center"><?php echo $query['tr_vehicle_no'];?></td>
                    <td align="center"><?php  echo $query['route_title']."(".$query['board_title'].")";?></td>
                    <td align="center">
                    <?php $vehicle_row=$db->getrow("SELECT * FROM  es_staff WHERE es_staffid=".$query['driver_id']);
                    echo $vehicle_row['st_firstname']." ".$vehicle_row['st_lastname'];
					?><br />[<?php echo $vehicle_row['es_staffid'] ?>]
                    </td>
                    </tr>
				 <?php           
			
				  }
											
							  else {
							   echo "<tr>";
							   echo "<td align='center' class='narmal' colspan='5'>No records found</td>";
							   echo "</tr>";
						} 
										
										
										
				  ?>
				</table></td>
  </tr>
</table>

				</td>
				
                <td width="1" class="bgcolor_02"></td>
              </tr>
              
                <td height="1" colspan="3" class="bgcolor_02"></td>
                </tr>
            </table>
<?php }?>