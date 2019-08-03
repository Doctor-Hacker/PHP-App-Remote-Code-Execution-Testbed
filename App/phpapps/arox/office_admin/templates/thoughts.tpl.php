<?php 
/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
// Leave Master

	
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
	 </tr>
	<tr>
	  <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;Today's Thought</td>
	</tr>
	<tr>
                <td width="1px" class="bgcolor_02" ></td>
                <td height="25" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font><br /></td>
                 <td width="1px" class="bgcolor_02" ></td></td>
              </tr>
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="center" valign="top">		
		<form action="" method="post" name="leavemaster">
				<table width="90%" border="0" cellspacing="2" cellpadding="2">
					
					
				  
					 <tr>
						<td align="left" class="adminfont">Add Thought</td>
						<td align="left">:</td>
						<td align="left">
						<textarea name="message" cols="50" rows="5"><?php if(isset($tip_id) && $tip_id!=""){echo $message_edt; }?></textarea><font color="#FF0000">&nbsp;*</font></td>
					 </tr>
					
				<tr>
					<td colspan="3" class="adminfont" align="center">
					<?php if(isset($tip_id)){?>
						<input type="submit" name="Update" value="Update" class="bgcolor_02" style="cursor:pointer; height:20px;"/>&nbsp;
						<?php }else{?>
						<input type="submit" name="Submit" value="Submit" class="bgcolor_02" style="cursor:pointer; height:20px;"/>&nbsp;
						<?php }?>					</td>
				</tr>
				 <tr>
					   <td colspan="3" align="left" class="narmal"><strong>Note:</strong>  Quotes & proverbs added will be displayed dynamically on the right panel </td>
			      </tr>
				<tr><td colspan="3" class="adminfont" align="center"></td></tr>		 
			</table>
		</form>
	
		</td>	
		<td width="1" class="bgcolor_02"></td>
	</tr>	  
	<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>
</table>


<?php /*?><table width="100%" border="0" cellspacing="2" cellpadding="0">
	
	<tr>
	  <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;TODAYS Thought</td>
	</tr>
	
	<tr>
		<td width="1%" class="bgcolor_02"></td>
		<td  align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
					
				<tr><td colspan="3" class="adminfont" align="center"><?php 
				if(isset($todaystip) && $todaystip!=""){ echo ucfirst($todaystip);}else
				{echo "No Thoughts Added";}?></td></tr>	 
					
				
				
			</table>
		
		</td>	
		<td width="1%" class="bgcolor_02"></td>
	</tr>	  
	<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>
</table><?php */?>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
	 </tr>
	<?php /*?><tr>
	  <td height="25" colspan="3" class="bgcolor_02">&nbsp; Thought List</td>
	</tr>
	<?php */?>
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="center" valign="top">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			
			<tr class="bgcolor_02" height="25">
			<td width="8%" align="center" class="admin">S No</td>
			<td width="" align="left" class="admin">Thought</td>
			
			
			<td width="20%" align="center" class="admin">Action</td>
			</tr>
			<?php 
			$rownum = $start;
			if ($no_rows>0) { //array_print($leavemaster_det);
			foreach ($tips_det as $each_tip){
			$zibracolor = ($rownum%2==0)?"even":"odd";
			$rownum++;
			?>	
			<tr class="<?php echo $zibracolor;?>">
			<td align="center" class="narmal"><?php echo $rownum; ?></td>
			<td align="left" class="narmal"><?php echo ucfirst($each_tip['message']); ?></td>
			<td align="center" class="narmal">
			<?php /*?><?php if( $todays_tip['tip_id'] == $each_tip['tip_id']){ $image = "bulb_green.png";}else{$image = "tips.png";}?>
			<a href="?pid=52&action=update&tip_id=<?php echo $each_tip['tip_id']; ?>&start=<?php echo $start;?>" title="Make it as Tip of the Day"><img src="images/<?php echo $image?>" border="0" width="22" height="20" /></a><?php */?>&nbsp;		
			<a href="?pid=52&action=edit&tip_id=<?php echo $each_tip['tip_id'];?>&start=<?php echo $start;?>" title="Edit"><img src="images/b_edit.png" border="0" width="16" height="16"/></a>&nbsp;
			<a href="?pid=52&action=delete&tip_id=<?php echo $each_tip['tip_id']; ?>&start=<?php echo $start;?>" title="Delete" onClick="return confirm('Are you sure you want to delete ?')"><img src="images/b_drop.png" border="0" width="16" height="16"/></a>&nbsp;
			
			</td>
			</tr>
			<?php  } ?>
			<tr>
			<td colspan="3" align="center" class="narmal"><?php paginateexte($start, $q_limit, $no_rows, "action=tip_day");?></td>
			</tr>
			<?php
			} else { ?>
			<tr><td colspan="3" align="center" class="narmal">No Thought Added</td></tr>
			<?php } ?>		 
			
			</table>
   </td>	
		<td width="1" class="bgcolor_02"></td>
	</tr>	  
	<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>
</table>			
