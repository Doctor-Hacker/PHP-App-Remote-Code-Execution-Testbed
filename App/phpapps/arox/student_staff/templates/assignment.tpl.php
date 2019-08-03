
<?php
//Session checking for the page 
if (!isset($_SESSION['eschools']['user_id'])||$_SESSION['eschools']['user_id']=="" ) {
	header("Location:../");  
	exit();
}  
?>
<script type="text/javascript">
function popup(url) {
		 var width  = 430;
		 var height = 300;
		 var left   = (screen.width  - width)/2;
		 var top    = (screen.height - height)/2;
		 var params = 'width='+width+', height='+height;
		 params += ', top='+top+', left='+left;
		 params += ', directories=no';
		 params += ', location=no';
		 params += ', menubar=no';
		 params += ', resizable=no';
		 params += ', scrollbars=no';
		 params += ', status=no';
		 params += ', toolbar=no';
		 newwin=window.open(url,'windowname5', params);
		 if (window.focus) {
			 newwin.focus()
		 }
	 return false;
}
</script>
<?php if($action=='myassignment'){?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<form action="" method="post">
	<input type="hidden" name="action" value="exportdatabase">
	<tr>
         <td height="3" colspan="3"></td>
	 </tr>
	<tr>
		<td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;Assignment</td>
	</tr>
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td  align="left" valign="top">
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="5">
				<tr>
					<td>
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
	                         <tr><td   height="15">&nbsp; </td></tr>
<?php    
 if ($action=="myassignment"){
?>
	                         <tr><td valign="top" align="center" >
			                  <table width="100%" border="0" cellspacing="0" cellpadding="2" class="tbl_grid">
		                           <tr class="bgcolor_02">
										<td width="15%" height="25"  align="center" class="admin">Subject</td>
										<td width="15%" height="25"  align="center" class="admin">Assignment</td>
										<td width="16%" height="25" class="admin" align="center"> Date</td>                                   
										<td width="21%" height="25" class="admin" align="center">Last&nbsp;date</td>
										<td width="20%" height="25" class="admin" align="center">Total Marks</td>
										<td width="13%" height="25" class="admin" align="center">Document</td>
		                       		</tr>
<?php 
				$rownum = 1;
			if (is_array($assignment_det) && count($assignment_det) > 0) {	
				foreach ($assignment_det as $eachrecord){
					    $zibracolor = ($rownum%2==0)?"even":"odd";
						if(in_array($eachrecord['as_suject'],$subject_id_array))
						{
?>				
			                   <tr class="<?php echo $zibracolor;?>">
			                              <td align="center" class="narmal"><?php echo subjectname($eachrecord['as_suject']); ?></td>
				                          <td align="center" class="narmal"><?php echo $eachrecord['as_name']; ?></td>
				
			
				                          <td align="center" class="narmal"><?php echo displaydate($eachrecord['as_createdon']); ?></td>
				                          <td align="center" class="narmal"><?php echo displaydate($eachrecord['as_lastdate']); ?></td>
					                     <td align="center" class="narmal"><?php echo ($eachrecord['as_marks']); ?></td>
				                         <td align="center">
				<a title="download" href="assignments/<?php  echo $eachrecord['as_description']; ?>"><img src="images/download.png" border="0" /></a>
				
				                         </td>
		                      </tr> 
<?php
					$rownum++;
					}
				}
	?>
			                    <tr>
				                         <td colspan="6" align="center">
											<?php 
                                            // pagination	 start, q_limit ,no_rows, column_name
                                            paginateexte($start, $q_limit, $no_rows, "&action=myassignment&column_name=" . $orderby . "&asds_order=" . $asds_order);
                                            ?>
				                         </td>
			                  </tr>
							  <tr>
				<td colspan="6" align="center" class="adminfont">
			<input name="Submit" type="button" onclick="window.open('?pid=12&action=print_assignment<?php  echo $adminlisturl;?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');" class="bgcolor_02" value="Print" style="cursor:pointer;"/></td>
			</tr>
                              
<?php 
		 }else{
	    		echo '<tr><td colspan="6" align="center" valign="middle" height="30" class="narmal">No records found</td></tr>';
	}
?>
				                         
							</table>
                         </td>
                     </tr>
<?php 
} 
// view assignment 
?>

         </table>
		            </td>
	             </tr>
             </table>
	    </td>
	    <td width="1" class="bgcolor_02"></td>
    </tr>
    <tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>
  </form>
</table>
<?php }?>
<?php 

if ($action=="viewassignment"){
?>	<table >
	        <tr> 
		         <td> <h3>Assignment Detailss</h3> 
		<style>
		.text{
		       padding-left:10px;
			   }
		</style>           
						<table width="100%"  border="0" cellpadding="0" cellspacing="0" class="text">
							<tr>
								<td width="16%" > Name </td>
								<td width="6%" align="center">:</td>
								<td width="78%" height="30" align="left"><?php  echo $viewassignment_det['as_name']; ?></td>
							</tr>
							<tr>
								<td width="16%" >Created date</td>
								<td width="6%" align="center">:</td>
								<td width="78%" height="30" align="left"><?php  echo displaydate($viewassignment_det['as_createdon']); ?></td>
							</tr>
							<tr>
								<td> Last date</td>
								<td width="6%" align="center">:</td>
								<td height="30" align="left" ><?php echo displaydate($viewassignment_det['as_lastdate']); ?></td>
							</tr>
							<tr>
								<td> Marks</td>
								<td width="6%" align="center">:</td>
								<td height="30" align="left" ><?php echo $viewassignment_det['as_marks']; ?></td>
							</tr>
					
							<tr>
								<td  colspan="3" align="right" > <input name="Close"  onclick="javascript:window.close();" type="button" value="close"  /></td>
							</tr>
						</table>
		        </td>
	        </tr>
			</table>
<?php 
}
?>
<?php if($action=='print_assignment'){?>
<table width="100%" border="0" cellspacing="0" cellpadding="3" class="tbl_grid" align="center">
			<?php 
			$rownum = 1;
			if(count($assignment_det)>0	){
			?>
			 <tr class="bgcolor_02">
			    <td width="16%" height="25" class="admin" align="center">Class</td>
				<td width="16%" height="25" class="admin" align="center">Subject</td>
				<td width="15%" height="25"  align="center" class="admin">Assignment</td>
				<td width="15%" height="25" class="admin" align="center">Date</td> 
				<td width="18%" height="25" class="admin" align="center">Last&nbsp;date </td>
				<td width="14%" height="25" class="admin" align="center">Total&nbsp;Marks </td>
				
			</tr>
					<?php 
					
					foreach ($assignment_det as $eachrecord){
					$zibracolor = ($rownum%2==0)?"even":"odd";
					?>				
			<tr class="<?php echo $zibracolor;?>">
			<td align="center" class="narmal"><?php echo classname($eachrecord['as_class']); ?></td>
				<td align="center" class="narmal"><?php echo subjectname($eachrecord['as_suject']); ?></td>
				<td align="center" class="narmal"><?php echo $eachrecord['as_name']; ?></td>
				<td align="center" class="narmal"><?php echo displaydate ($eachrecord['as_createdon']); ?></td>
                <td align="center" class="narmal"><?php echo displaydate ($eachrecord['as_lastdate']); ?></td>
                <td align="center" class="narmal"><?php echo  $eachrecord['as_marks']; ?></td>
				
			</tr> 
				<?php
				$rownum++;
				}?>
			
			     <?php }  if(isset($no_rows) && $no_rows==0) { ?>
		 	
		    <tr>
			    <td colspan="5" align="center" class="narmal"> No Records Found </td>
		    </tr>
			<tr>
				<td colspan="5" height='20' ></td>
			</tr>
		   <?php } ?>
	   </table>
<?php }?>