<iframe width=132 height=142 name="gToday:contrast:agenda.js" id="gToday:contrast:agenda.js" src="<?php echo JS_PATH ?>/DateRange/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe>
<?php /*?><iframe width=132 height=142 name="gToday:contrast:agenda.js" id="gToday:contrast:agenda.js" src="<?php echo JS_PATH ?>/DateRange/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe>
<iframe width=132 height=142 name="gToday:contrast:agenda.js" id="gToday:contrast:agenda.js" src="<?php echo JS_PATH ?>/DateRange/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe>
<iframe width=132 height=142 name="gToday:contrast:agenda.js" id="gToday:contrast:agenda.js" src="<?php echo JS_PATH ?>/DateRange/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe><?php */?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<?php if($action=='dispatchcategory' || $action=='dispatchcategoryedit'){ ?>

<tr>
<td><table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
	 </tr>
	<tr>
	  <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Add Dispatch Group </span></td>
	</tr>
	  <tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="center" valign="top">
		<form method="post" action="" name="dispatchcategoryform">
		<table width="95%" border="0" cellspacing="2" cellpadding="0">
		<tr><td colspan="7" align="right"></td></tr>
		  <tr>
			<td width="26%">&nbsp;</td>
			<td width="1%">&nbsp;</td>
			<td width="19%">&nbsp;</td>
			<td width="2%">&nbsp;</td>
			<td width="24%">&nbsp;</td>
			<td width="1%">&nbsp;</td>
			<td width="27%">&nbsp;</td>
		  </tr>
		  <tr>
		    <td align="left" class="narmal"><span class="admin">Dispatch Group <font color="#FF0000">*</font></span></td>
		    <td align="left">:</td>
		    <td align="left" colspan="5"><span class="error_msg">
		      <input type="text" name="dispatchcategory" id="dispatchcategory" value="<?php echo $category_row['dispatch_category']; ?>" />
		    </span></td>
	      </tr>
		  
		  <tr>
		    <td align="left"  class="narmal">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left" class="narmal">
		<?php if(in_array('33_1',$admin_permissions)){?>
<input type="submit" name="submit" id="submit" value="submit" class="bgcolor_02" />



<?php } ?>	
			</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>
		  <tr>
		    <td align="left"  class="narmal">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left" class="narmal">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    </tr>
		  <tr>
		    <td colspan="7" align="left"  class="narmal">
			
			
			<table width="100%" cellpadding="3" cellspacing="0" class="tbl_grid">
			<tr class="bgcolor_02">
			   <td>Slno</td>
			   <td><span class="admin">Group</span> Name</td>
			   <td>Action</td>
			</tr>
			<?php
			$i=1;
			while($cat_row = mysql_fetch_array($cat_exe)){
			?>
			<tr bgcolor="#FFFFFF">
			   <td><?php echo $i; $i++;?></td>
			   <td><?php echo $cat_row['dispatch_category']; ?></td>
			   <td>			   
			   <?php if (in_array("33_2", $admin_permissions)) {?><a href="?pid=74&action=dispatchcategoryedit&id=<?php echo $cat_row['id']; ?>"><?php echo editIcon(); ?></a><?php }else{ echo "-"; }?>&nbsp;&nbsp;&nbsp;
			   <?php if (in_array("33_3", $admin_permissions)) {?><a href="?pid=74&action=dispatchcategorydelete&id=<?php echo $cat_row['id']; ?>" onclick="javascript:return confirm('Do you want to delete this record')"><?php echo deleteIcon(); ?></a><?php }else{ echo "-"; }?>
			   </td>
			</tr>
			<?php } ?>
			<tr >
			   <td colspan="3" align="right"><?php 
			   if(is_array($cat_row) && count($cat_row)>=1){
			   if (in_array("33_8", $admin_permissions)) {?><input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=74&action=print_list_groupname',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /><?php }}?></td>
			</tr>
			
			</table>
			
			
			
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
</table>
</td>
</tr>

<?php }?>
<?php  if($action=="print_list_groupname"){
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	       VALUES('".$_SESSION['eschools']['admin_id']."','es_dispatch','Back Office','Add Dispatch Group','','Print','".$_SERVER['REMOTE_ADDR']."',NOW())";
     $log_insert_exe=mysql_query($log_insert_sql);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">

				 
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>	
               <tr>
                <td height="5" colspan="3"  ></td>
              </tr>			  
               <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Dispatch Groups List </span></td>
              </tr>	
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="center" valign="top"><br />
				
				<table width="100%" cellpadding="3" cellspacing="0" class="tbl_grid">
			<tr class="bgcolor_02">
			   <td>Slno</td>
			   <td><span class="admin">Group</span> Name</td>
			  
			</tr>
			<?php
			$i=1;
			while($cat_row = mysql_fetch_array($cat_exe)){
			?>
			<tr bgcolor="#FFFFFF">
			   <td><?php echo $i; $i++;?></td>
			   <td><?php echo $cat_row['dispatch_category']; ?></td>
			   
			</tr>
			<?php } ?>
			</table>
                
				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
             
               
              
              
  		     <tr><td colspan="3" class="bgcolor_02" height="1"></td></tr>
			  
			  
   
</table>

<?php } ?>
<?php if($action=='incomingletters' || $action=='dispatchletteredit'){ ?>

<tr>
<td><table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
	 </tr>
	<tr>
	  <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;Add / Edit Inward D<span class="admin">ispatch Entry </span></td>
	</tr>
	  <tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="center" valign="top">
		<form method="post" action="" name="incominglettersform" enctype="multipart/form-data">
		<table width="95%" border="0" cellspacing="2" cellpadding="0">
		<tr><td colspan="6" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font></td></tr>
		  <tr>
			<td colspan="2">&nbsp;</td>
			<td width="0%">&nbsp;</td>
			<td width="55%">&nbsp;</td>
			<td width="1%">&nbsp;</td>
			<td width="22%">&nbsp;</td>
		  </tr>
		  <tr>
		    <td colspan="2" align="left" class="narmal">Group<font color="#FF0000">*</font></td>
		    <td align="left">:</td>		    
			<td align="left" colspan="3" class="narmal">
				<?php
				if($group!='')
				{
				$entry_row['dispatchgroup']=$group;
				}
				?>	
			<select name="group" style="width:150px;">
			<option value="">Select</option>
			<?php
			$category_sql = "SELECT * FROM `es_dispatch` WHERE `status`!='Delete'";
			$category_exe = mysql_query($category_sql);
			while($category_row = mysql_fetch_array($category_exe)){
			?>
			<option value="<?php echo $category_row['id']; ?>" <?php if($entry_row['dispatchgroup']==$category_row['id']){?> selected="selected" <?php } ?> ><?php echo $category_row['dispatch_category']; ?></option>
			<?php } ?>
			</select>			</td>
	      </tr>
		  
		  <tr>
		    <td colspan="2" align="left"  class="narmal">Date<font color="#FF0000">*</font></td>
		    <td align="left">:</td>
		    <td align="left" class="narmal"><?php 
		
				if($dispatchdate!='')
				{
				$entry_row['dateofdispatch']=func_date_conversion('d/m/Y','Y-m-d',$dispatchdate);
				}
				
			$dispatchdate_new=func_date_conversion('Y-m-d', 'd/m/Y',$entry_row['dateofdispatch']);?>
			<input type="text" name="dispatchdate" id="dispatchdate" value="<?php echo $dispatchdate_new;?>" readonly/>
			<a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fStartPop(document.incominglettersform.dispatchdate,document.incominglettersform.dispatchdate);return false;" >											
			<img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a>
			</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>
		  <tr>
		    <td width="15%" align="left"  class="narmal">Received&nbsp;from  </td>
		    <td width="7%" align="right"  class="narmal">(Company<font color="#FF0000">*</font>)</td>
		    <td align="left">:</td>
		    <td align="left" class="narmal">
			<?php
			if($company!='')
				{
				$entry_row['received_company']=$company;
				}?>
			<input type="text" name="company" id="company" value="<?php echo $entry_row['received_company']; ?>"/> 
		      (Location/Address<font color="#FF0000">*</font>)</td>
		    <td align="left">:</td>
		    <td align="left"><span class="narmal">
			<?php
			if($address!='')
				{
				$entry_row['received_address']=$address;
				}?>
		      <textarea name="address" cols="14" id="address"><?php echo $entry_row['received_address']; ?></textarea>
		    </span></td>
	      </tr>
		  <tr>
		    <td colspan="2" align="left"  class="narmal">Subject<font color="#FF0000">*</font></td>
		    <td align="left">:</td>
		    <td align="left" class="narmal">
			<?php
			if($subject!='')
				{
				$entry_row['subject']=$subject;
				}?>
			<input type="text" name="subject" id="subject" value="<?php echo $entry_row['subject']; ?>" style="width:300px" /></td>
		    <td align="left"></td>
		    <td align="left" class="narmal"></td>
	      </tr>
		  <tr>
		    <td colspan="2" align="left" class="narmal">Particulars<font color="#FF0000">*</font></td>
		    <td align="left">:</td>
		    <td align="left" class="narmal">
			<?php
			if($partculars!='')
				{
				$entry_row['partculars']=$partculars;
				}?>
			<textarea name="partculars" id="partculars"><?php echo $entry_row['partculars']; ?></textarea></td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>
		  <tr>
		    <td colspan="2" align="left">Reference<font color="#FF0000">*</font></td>
		    <td align="left">:</td>
		    <td align="left"><span class="narmal">
			<?php
			if($referenceno!='')
				{
				$entry_row['reference_no']=$referenceno;
				}?>
		      <input type="text" name="referenceno" id="referenceno" value="<?php echo $entry_row['reference_no']; ?>" />
		    </span></td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>
		  <tr>
		    <td colspan="2" align="left">Received Through </td>
		    <td align="left">:</td>
		    <td align="left"><span class="narmal">	
			<?php
			if($in_receivedthrough!='')
				{
				$entry_row['in_receivedthrough']=$in_receivedthrough;
				}?>		
			<select name="in_receivedthrough">
			<?php
			foreach($in_receivedthrough_array as $key=>$value){?>
			  <option value="<?php echo $key; ?>" <?php if($entry_row['in_receivedthrough']==$key) {?> selected="selected"<?php }?>><?php echo $value; ?></option>
			<?php }?>
			</select>		 
		    </span></td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>
		   <tr>
		    <td colspan="2" align="left">Courier Company Name</td>
		    <td align="left">:</td>
		    <td align="left"><span class="narmal">
			<?php
			if($courrier_name!='')
				{
				$entry_row['courrier_name']=$courrier_name;
				}?>	
		      <input type="text" name="courrier_name" id="courrier_name" value="<?php echo $entry_row['courrier_name']; ?>"/>
		    </span></td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>
		  <tr>
		    <td colspan="2" align="left">Consignment No </td>
		    <td align="left">:</td>
		    <td align="left"><span class="narmal">
			<?php
			if($consignment_no!='')
				{
				$entry_row['consignment_no']=$consignment_no;
				}?>	
		      <input type="text" name="consignment_no" id="consignment_no" value="<?php echo $entry_row['consignment_no']; ?>" />
		    </span></td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>
		  <tr>
		    <td colspan="2" align="left">Received By<font color="#FF0000">*</font></td>
		    <td align="left">:</td>
		    <td align="left"><span class="narmal">
			<?php
			if($recivedby!='')
				{
				$entry_row['recived_by']=$recivedby;
				}?>	
		      <input type="text" name="recivedby" id="recivedby" value="<?php echo $entry_row['recived_by']; ?>" />
		    </span></td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>
		  <tr>
		    <td colspan="2" align="left">Submitted To<font color="#FF0000">*</font></td>
		    <td align="left">:</td>
		    <td align="left"><span class="narmal">
			<?php
			if($submitedto!='')
				{
				$entry_row['submited_to']=$submitedto;
				}?>	
		      <input type="text" name="submitedto" id="submitedto" value="<?php echo $entry_row['submited_to']; ?>" />
		    </span></td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>
		  <tr>
		    <td colspan="2" align="left">Upload File</td>
		    <td align="left">:</td>
		    <td align="left"><span class="narmal">
			
		      <input type="file" name="uploadfile" id="uploadfile" />
		    <?php if($entry_row['upload_file']!=""){?><a href="<?php echo $entry_row['upload_file']; ?>" target="_blank">View</a><?php }?>
			</span></td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>
		  <tr>
		    <td colspan="2" align="left">Type</td>
		    <td align="left">:</td>
		    <td align="left"><span class="narmal">
			<?php
			if($type!='')
				{
				$entry_row['type']=$type;
				}?>	
		      <select name="type">
			  	<option value="File" <?php if($entry_row['type']=="File"){?> selected="selected" <?php } ?>>File</option>
				<option value="Reply" <?php if($entry_row['type']=="Reply"){?> selected="selected" <?php } ?>>Reply</option>
			  </select>
		    </span></td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>
		  <tr>
		    <td colspan="2" align="left">Status</td>
		    <td align="left">:</td>
		    <td align="left"><span class="narmal">
			<?php
			if($status!='')
				{
				$entry_row['latter_status']=$status;
				}?>	
		      <select name="status">
                <option value="Open" <?php if($entry_row['latter_status']=="Open"){?> selected="selected" <?php } ?>>Open</option>
                <option value="Closed" <?php if($entry_row['latter_status']=="Closed"){?> selected="selected" <?php } ?>>Closed</option>
              </select>
		    </span></td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>
		  <tr>
		    <td colspan="2" align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left"><span class="narmal">
		      <input type="submit" name="submit" id="submit" value="submit" class="bgcolor_02" />
		    </span></td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>
		 
		      
		
		  
		  <tr>
		    <td colspan="2">&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
	      </tr>		  
		</table>
		</form>
		</td>		
		<td width="1" class="bgcolor_02"></td>
	  </tr>	  
	  <tr>
		<td height="1" colspan="3" class="bgcolor_02"></td>
  </tr>
</table>
</td>
</tr>

<?php }?>
<?php if($action=='outletters' || $action=='outwarddispatchletteredit'){ ?>

<tr>
<td><table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
	 </tr>
	<tr>
	  <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;Add / Edit Outward D<span class="admin">ispatch Entry </span></td>
	</tr>
	  <tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="center" valign="top">
		<form method="post" action="" name="outlettersform" enctype="multipart/form-data">
		<table width="95%" border="0" cellspacing="2" cellpadding="0">
		<tr><td colspan="6" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font></td></tr>
		  <tr>
		    <td colspan="2" align="left" class="narmal">Group<font color="#FF0000">*</font></td>
		    <td align="left">:</td>		    
			<td align="left" colspan="3" class="narmal"><?php
				if($group!='')
				{
				$entry_row['dispatchgroup']=$group;
				}
				?>	
			<select name="group" style="width:150px;">
			<option value="">Select</option>
			<?php
			$category_sql = "SELECT * FROM `es_dispatch` WHERE `status`!='Delete'";
			$category_exe = mysql_query($category_sql);
			while($category_row = mysql_fetch_array($category_exe)){
			?>
			<option value="<?php echo $category_row['id']; ?>" <?php if($entry_row['dispatchgroup']==$category_row['id']){?> selected="selected" <?php } ?> ><?php echo $category_row['dispatch_category']; ?></option>
			<?php } ?>
			</select>			</td>
	      </tr>
		  
		  <tr>
		    <td colspan="2" align="left"  class="narmal">Date<font color="#FF0000">*</font></td>
		    <td align="left">:</td>
		    <td align="left" class="narmal"><?php 
		
				if($dispatchdate!='')
				{
				$entry_row['dateofdispatch']=func_date_conversion('d/m/Y','Y-m-d',$dispatchdate);
				}
				
			$dispatchdate_new=func_date_conversion('Y-m-d', 'd/m/Y',$entry_row['dateofdispatch']);?>
		      <input type="text" name="dispatchdate" id="dispatchdate" value="<?php echo $dispatchdate_new;?>" readonly/>
			<a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fStartPop(document.outlettersform.dispatchdate,document.outlettersform.dispatchdate);return false;" >											
			<img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a>
			</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>
		  <tr>
		    <td colspan="2" align="left">Sender<font color="#FF0000">*</font></td>
		    <td align="left">:</td>
		    <td align="left"><span class="narmal">
			<?php
				if($out_sender!='')
				{
				$entry_row['out_sender']=$out_sender;
				}
				?>	
		      <input type="text" name="out_sender" id="out_sender" value="<?php echo $entry_row['out_sender']; ?><?php if($p_latter_id!=""){echo $dispath_row['recived_by'];}?>" />
		    </span></td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>
		  <tr>
		    <td width="15%" align="left"  class="narmal">Send</td>
		    <td width="7%" align="right"  class="narmal">(To<font color="#FF0000">*</font>)</td>
		    <td align="left">:</td>
		    <td align="left" class="narmal">
			<?php
				if($out_to!='')
				{
				$entry_row['out_to']=$out_to;
				}
				?>	
			<input type="text" name="out_to" id="out_to" value="<?php echo $entry_row['out_to']; ?><?php if($p_latter_id!=""){echo $dispath_row['received_company'];}?>"/> 
		      (Location/Address<font color="#FF0000">*</font>)</td>
		    <td align="left">:</td>
		    <td align="left"><span class="narmal">
			<?php
				if($out_address!='')
				{
				$entry_row['out_address']=$out_address;
				}
				?>	
		      <textarea name="out_address" cols="14" id="out_address"><?php echo $entry_row['out_address']; ?><?php if($p_latter_id!=""){echo $dispath_row['received_address'];}?></textarea>
		    </span></td>
	      </tr>
		  <tr>
		    <td colspan="2" align="left"  class="narmal">Subject<font color="#FF0000">*</font></td>
		    <td align="left">:</td>
		    <td align="left" class="narmal">
			<?php
				if($subject!='')
				{
				$entry_row['subject']=$subject;
				}
				?>	
			<input type="text" name="subject" id="subject" value="<?php echo $entry_row['subject']; ?>" style="width:300px" /></td>
		    <td align="left"></td>
		    <td align="left" class="narmal"></td>
	      </tr>
		  <tr>
		    <td colspan="2" align="left" class="narmal">Particulars<font color="#FF0000">*</font></td>
		    <td align="left">:</td>
		    <td align="left" class="narmal">
			<?php
				if($partculars!='')
				{
				$entry_row['partculars']=$partculars;
				}
				?>	
			<textarea name="partculars" id="partculars"><?php echo $entry_row['partculars']; ?></textarea></td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>
		  <tr>
		    <td colspan="2" align="left">Reference<font color="#FF0000">*</font></td>
		    <td align="left">:</td>
		    <td align="left"><span class="narmal">
			<?php
				if($referenceno!='')
				{
				$entry_row['reference_no']=$referenceno;
				}
				?>	
		      <input type="text" name="referenceno" id="referenceno" value="<?php echo $entry_row['reference_no']; ?><?php if($p_latter_id!=""){echo $dispath_row['reference_no'];}?>" <?php if($p_latter_id!=""){?>readonly="true"<?php }?> />
		    </span></td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>
		  <tr>
		    <td colspan="2" align="left">Sent Through </td>
		    <td align="left">:</td>
		    <td align="left"><span class="narmal">	
			<?php
				if($out_sentthrough!='')
				{
				$entry_row['out_sentthrough']=$out_sentthrough;
				}
				?>			
			<select name="out_sentthrough">
			<?php
			foreach($in_sendthrough_array as $key=>$value){?>
			  <option value="<?php echo $key; ?>" <?php if($entry_row['out_sentthrough']==$key) {?> selected="selected"<?php }?>><?php echo $value; ?></option>
			<?php }?>
			</select>		 
		    </span></td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>
		  <tr>
		    <td colspan="2" align="left">Courier Company Name</td>
		    <td align="left">:</td>
		    <td align="left"><span class="narmal">
			<?php
				if($courrier_name!='')
				{
				$entry_row['courrier_name']=$courrier_name;
				}
				?>	
		      <input type="text" name="courrier_name" id="courrier_name" value="<?php echo $entry_row['courrier_name']; ?>"/>
		    </span></td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>
		  <tr>
		    <td colspan="2" align="left">Consignment No </td>
		    <td align="left">:</td>
		    <td align="left"><span class="narmal">
			<?php
				if($consignment_no!='')
				{
				$entry_row['consignment_no']=$consignment_no;
				}
				?>	
		      <input type="text" name="consignment_no" id="consignment_no" value="<?php echo $entry_row['consignment_no']; ?>" />
		    </span></td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>
		  <tr>
		    <td colspan="2" align="left">Upload File</td>
		    <td align="left">:</td>
		    <td align="left"><span class="narmal">
		      <input type="file" name="uploadfile" id="uploadfile" />
		    <?php if($entry_row['upload_file']!=""){?><a href="<?php echo $entry_row['upload_file']; ?>" target="_blank">View</a><?php }?>
			</span></td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>
		  <tr>
		    <td colspan="2" align="left">Type</td>
		    <td align="left">:</td>
		    <td align="left"><span class="narmal">
			<?php
				if($dispatch_type!='')
				{
				$entry_row['dispatch_type']=$dispatch_type;
				}
				?>	
		      <select name="dispatch_type">
			  	<option value="Sent" <?php if($entry_row['dispatch_type']=="Sent"){?> selected="selected" <?php } ?>>Sent</option>
				<option value="Expect Reply" <?php if($entry_row['dispatch_type']=="Expect Reply"){?> selected="selected" <?php } ?>>Expect Reply</option>
			  </select>
		    </span></td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>
		  <tr>
		    <td colspan="2" align="left">Status</td>
		    <td align="left">:</td>
		    <td align="left"><span class="narmal">
			<?php
				if($status!='')
				{
				$entry_row['latter_status']=$status;
				}
				?>	
		      <select name="status">
                <option value="Open" <?php if($entry_row['latter_status']=="Open"){?> selected="selected" <?php } ?>>Open</option>
                <option value="Closed" <?php if($entry_row['latter_status']=="Closed"){?> selected="selected" <?php } ?>>Closed</option>
              </select>
		    </span></td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>
		  <tr>
		    <td colspan="2" align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left"><span class="narmal">
		      <input type="submit" name="submit" id="submit" value="submit" class="bgcolor_02" />
		    </span></td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>
		 
		      
		
		  
		  <tr>
		    <td colspan="2">&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
	      </tr>		  
		</table>
		</form>
		</td>		
		<td width="1" class="bgcolor_02"></td>
	  </tr>	  
	  <tr>
		<td height="1" colspan="3" class="bgcolor_02"></td>
  </tr>
</table>
</td>
</tr>

<?php }?>
<?php if($action=='manageletters'){ ?>
<tr>
<td>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
	 </tr>
	<tr>
	  <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;Manage Dispatch<span class="admin"> Letters</span></td>
	</tr>
	  <tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="center" valign="top">
		
		<br />
		<form action="" method="post" name="search_dispatch">
		<table width="100%" cellpadding="0" cellspacing="3">
		<tr>
		   <td width="13%" height="26" align="left">From</td>
		   <td width="1%">:</td>
		   <td width="27%" align="left"><input name="s_from" type="text" id="s_from" style="width:100px;" value="<?php echo $s_from; ?>" />
           <a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fStartPop(document.search_dispatch.s_from,document.search_dispatch.s_to);return false;" >
           <img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a>  
		   
			
			</td>
		   <td width="13%" align="left">To</td>
		   <td width="1%">:</td>
		   <td width="45%" align="left"><input name="s_to" type="text" id="s_to" style="width:100px;" value="<?php echo $s_to; ?>" />
		   <a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fEndPop(document.search_dispatch.s_from,document.search_dispatch.s_to);return false;" >											
			<img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a></td>
		</tr>
		<tr>
		   <td align="left">Reference</td>
		   <td>:</td>
		   <td align="left"><input name="s_reference" type="text" id="s_reference" value="<?php echo $s_reference;?>" /></td>
		   <td align="left">Dispatch Type </td>
		   <td>:</td>
		   <td align="left">
		   <select name="d_letter_types" id="d_letter_types" style="width:150px;">
             <option value="">All</option>
			 <option value="inward" <?php if($d_letter_types=="inward"){?> selected="selected" <?php }?>>Inward</option>
             <option value="outward" <?php if($d_letter_types=="outward"){?> selected="selected" <?php }?>>Outward</option>
           </select></td>
		</tr>
		<tr>
		   <td align="left">Subject</td>
		   <td>:</td>
		   <td align="left"><input name="s_subject" type="text" id="s_subject" value="<?php echo $s_subject;?>" /></td>
		   <td align="left"><span class="narmal">Particulars</span></td>
		   <td>:</td>
		   <td align="left"><input name="s_particulars" type="text" id="s_particulars" value="<?php echo $s_particulars;?>"/></td>
		</tr>
		<tr>
		   <td align="left">Group</td>
		   <td>:</td>
		   <td align="left">		   
		   <select name="s_group" id="s_group" style="width:150px;">
			<option value="">Select</option>
			<?php
			$category_sql = "SELECT * FROM `es_dispatch` WHERE `status`!='Delete'";
			$category_exe = mysql_query($category_sql);
			while($category_row = mysql_fetch_array($category_exe)){
			?>
			<option value="<?php echo $category_row['id']; ?>" <?php if($category_row['id']==$s_group){?> selected="selected" <?php } ?> ><?php echo $category_row['dispatch_category']; ?></option>
			<?php } ?>
			</select>
		   </td>
		   <td align="left">Status</td>
		   <td>:</td>
		   <td align="left">
		   <select name="s_staus" style="width:150px;">
		   	<option value="" >All</option>
			<option value="Open" <?php if($s_staus=="Open"){?> selected="selected" <?php }?>>Open</option>
			<option value="Closed" <?php if($s_staus=="Closed"){?> selected="selected" <?php }?>>Closed</option>
		   </select>
		</td>
		</tr>
		<tr>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td><input type="submit" name="Search" value="Search" class="bgcolor_02" />
		  <input type="submit" name="export" value="export" class="bgcolor_02" /></td>
		  </tr>
		</table>
		</form>
	

		
		
		
	      <br /><br />
		  <table width="100%" cellpadding="3" cellspacing="0" class="tbl_grid" bordercolor="#CCCCCC" border="1">
            <tr class="bgcolor_02">
              <td width="3%">Slno</td>
              <td width="19%"><span class="admin">Group</span> Name</td>
              <td width="10%">Dispatch&nbsp;Type </td>
              <td width="5%">Date</td>
              <td width="12%">Reference</td>
              <td width="16%">Status</td>
			    <td width="13%">Information</td>
              <td width="22%">Action</td>
            </tr>
            <?php
			$i=1;
			if($_GET['start']==""){$start=0;} else {$start=$_GET['start'];}			
			while($entry_row = mysql_fetch_array($entry_exe)){
			?>
            <tr bgcolor="#FFFFFF">
              <td><?php echo $i; $i++;?></td>
              <td><?php echo ucfirst($dispat_group[$entry_row['dispatchgroup']]); ?></td>
              <td><?php echo ucfirst($entry_row['d_letter_types']); ?></td>
              <td>
			  <p><?php $dispatchdate_new=func_date_conversion('Y-m-d', 'd/m/Y', $entry_row['dateofdispatch']); echo $dispatchdate_new; ?></p></td>
                <td>
			  <p><b>(<?php echo $entry_row['reference_no']; ?>)</b></p></td>
              <td><?php echo ucfirst($entry_row['latter_status']); ?><br />
			  <?php echo ucfirst($entry_row['dispatch_type']);?>		  	  
			  </td>
			 <td><?php echo $entry_row['out_sender'];?><br /><?php echo $entry_row['received_company'];?></td>
              <td><a href="?pid=74&action=dispatchletterview&start=<?php echo $start; ?>&id=<?php echo $entry_row['id']; ?>"><img src="images/b_browse.png" border="0" /></a>&nbsp;&nbsp;&nbsp; 
			  
			  <?php if (in_array("33_6", $admin_permissions)) {?>
			  <?php if($entry_row['d_letter_types']=="outward"){?>
			  <a href="?pid=74&action=outwarddispatchletteredit&id=<?php echo $entry_row['id']; ?>"><img src="images/b_edit.png" border="0" /></a>&nbsp;&nbsp;&nbsp; 
			  <?php }else{?>
			  <a href="?pid=74&action=dispatchletteredit&id=<?php echo $entry_row['id']; ?>"><img src="images/b_edit.png" border="0" /></a>&nbsp;&nbsp;&nbsp; 
			  <?php }}?>
			  
			  <?php if (in_array("33_7", $admin_permissions)) {?>
			  <a href="?pid=74&action=dispatchletterdelete&id=<?php echo $entry_row['id']; ?>" onclick="javascript:return confirm('Do you want to delete this record')"><img src="images/b_drop.png" border="0" /></a> 
			  
			  <?php }?>
			  </td>
            </tr>
            <?php } ?>
			<tr>
				<td colspan="8" align="center"><?php paginateexte($start, $q_limit, $entry1_num, "action=manageletters") ?></td>
			</tr>
          </table>
		  
		  
		  
		  
	
		</td>		
		<td width="1" class="bgcolor_02"></td>
	  </tr>	  
	  <tr>
		<td height="1" colspan="3" class="bgcolor_02"></td>
  </tr>
</table>
</td>
</tr>
<?php } ?>


<?php if($action=='dispatchletterview'){ ?>

<tr>
<td><table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
	 </tr>
	<tr>
	  <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Letter Details </span></td>
	</tr>
	  <tr>
		<td width="1" class="bgcolor_02"></td>
		<td align="center" valign="top">
	
		<table width="95%" border="0" cellspacing="7" cellpadding="0">
		  <tr>
		    <td colspan="2" align="left" class="narmal">Dispatch Type</td>
		    <td align="left">:</td>		    
			<td align="left" colspan="3" class="narmal">
			<?php echo ucfirst($entry_row['d_letter_types']); ?>
			<?php if($entry_row['d_letter_types']=="outward"){?>
			(<?php echo $entry_row['outward_dispatch_type']; ?>)
			<?php } ?>			
			</td>
	      </tr>		  
		  <tr>
		    <td colspan="2" align="left" class="narmal">Group</td>
		    <td align="left">:</td>		    
			<td align="left" colspan="3" class="narmal"><?php echo ucfirst($dispat_group[$entry_row['dispatchgroup']]); ?></td>
	      </tr>	  
		  <tr>
		    <td colspan="2" align="left"  class="narmal">Date</td>
		    <td align="left">:</td>
		    <td width="39%" align="left" class="narmal"><?php $dispatchdate_new=func_date_conversion('Y-m-d', 'd/m/Y', $entry_row['dateofdispatch']); echo $dispatchdate_new; ?></td>
		    <td width="2%" align="left">&nbsp;</td>
		    <td width="37%" align="left">&nbsp;</td>
	      </tr>
		  <?php if($entry_row['d_letter_types']=="outward"){?>
		  <tr>
		    <td colspan="2" align="left"  class="narmal">Sender</td>
		    <td align="left">:</td>
		    <td width="39%" align="left" class="narmal"><?php echo ucfirst($entry_row['out_sender']); ?></td>
		    <td width="2%" align="left">&nbsp;</td>
		    <td width="37%" align="left">&nbsp;</td>
	      </tr>
		  <?php }?>
		  <?php if($entry_row['d_letter_types']=="inward"){?>
		  <tr>
		    <td width="15%" align="left"  class="narmal">Received&nbsp;from  </td>
		    <td width="7%" align="right"  class="narmal">(Company)</td>
		    <td align="left">:</td>
		    <td align="left" class="narmal"><?php echo $entry_row['received_company']; ?></td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>		  
		  <tr>
		    <td width="15%" align="left"  class="narmal">&nbsp;</td>
		    <td width="7%" align="right"  class="narmal">(Location)</td>
		    <td align="left">:</td>
		    <td align="left" class="narmal"><?php echo $entry_row['received_address']; ?></td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>
		  <?php }?>	
		  <?php if($entry_row['d_letter_types']=="outward"){?>
		  <tr>
		    <td width="15%" align="left"  class="narmal">Send&nbsp;To</td>
		    <td width="7%" align="right"  class="narmal">(Company)</td>
		    <td align="left">:</td>
		    <td align="left" class="narmal"><?php echo $entry_row['out_to']; ?></td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>		  
		  <tr>
		    <td width="15%" align="left"  class="narmal">&nbsp;</td>
		    <td width="7%" align="right"  class="narmal">(Location)</td>
		    <td align="left">:</td>
		    <td align="left" class="narmal"><?php echo $entry_row['out_address']; ?></td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>
		  <?php }?>		  
		  <tr>
		    <td colspan="2" align="left"  class="narmal">Subject</td>
		    <td align="left">:</td>
		    <td align="left" class="narmal"><?php echo $entry_row['subject']; ?></td>
		    <td align="left"></td>
		    <td align="left" class="narmal"></td>
	      </tr>
		  <tr>
		    <td colspan="2" align="left" class="narmal">Particulars</td>
		    <td align="left">:</td>
		    <td align="left" class="narmal"><?php echo $entry_row['partculars']; ?></td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>
		  <tr>
		    <td colspan="2" align="left">Reference</td>
		    <td align="left">:</td>
		    <td align="left"><span class="narmal"><?php echo $entry_row['reference_no']; ?></span></td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>
		  <?php if($entry_row['d_letter_types']=="inward"){?>
		  <tr>
		    <td colspan="2" align="left">Received Through </td>
		    <td align="left">:</td>
		    <td align="left"><span class="narmal"><?php echo $in_receivedthrough_array[$entry_row['in_receivedthrough']]; ?></span></td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>
		  <?php }?>
		  <tr>
		    <td colspan="2" align="left">Consignment No </td>
		    <td align="left">:</td>
		    <td align="left"><span class="narmal"><?php echo $entry_row['consignment_no']; ?></span></td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>
		  <?php if($entry_row['d_letter_types']=="inward"){?>
		  <tr>
		    <td colspan="2" align="left">Recived By</td>
		    <td align="left">:</td>
		    <td align="left"><span class="narmal"><?php echo $entry_row['recived_by']; ?></span></td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>
		  <?php }?>
		  <?php if($entry_row['d_letter_types']=="outward"){?>
		  <tr>
		    <td colspan="2" align="left">Sent Through</td>
		    <td align="left">:</td>
		    <td align="left"><span class="narmal"><?php echo $in_sendthrough_array[$entry_row['out_sentthrough']]; ?></span></td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>	
		  <?php }?>	
		  <?php if($entry_row['d_letter_types']=="inward"){?>
		  <tr>
		    <td colspan="2" align="left">Submitted To</td>
		    <td align="left">:</td>
		    <td align="left"><span class="narmal"><?php echo $entry_row['submited_to']; ?></span></td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>	
		  <?php }?>	 
		 <?php if($entry_row['upload_file']!=""){?>
		  <tr>
		    <td colspan="2" align="left">Upload File</td>
		    <td align="left">:</td>
		    <td align="left"><span class="narmal"><a href="<?php echo $entry_row['upload_file']; ?>" target="_blank">View</a></span></td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>
		  <?php }?>
		  <?php if($entry_row['d_letter_types']=="inward"){?>
		  <tr>
		    <td colspan="2" align="left">Type</td>
		    <td align="left">:</td>
		    <td align="left"><span class="narmal"><?php echo $entry_row['type']; ?></span></td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>
		  <?php }?>
		  <tr>
		    <td colspan="2" align="left">Courier Company Name</td>
		    <td align="left">:</td>
		    <td align="left"><span class="narmal"><?php echo $entry_row['courrier_name']; ?></span></td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>
		  <?php if($entry_row['d_letter_types']=="outward"){?>
		  <tr>
		    <td colspan="2" align="left">Type</td>
		    <td align="left">:</td>
		    <td align="left"><span class="narmal"><?php echo $entry_row['dispatch_type']; ?></span></td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>
		  <?php }?>
		  <tr>
		    <td colspan="2" align="left">Status</td>
		    <td align="left">:</td>
		    <td align="left"><span class="narmal"><?php echo $entry_row['latter_status']; ?></span></td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>		  
		  <tr>
		    <td colspan="2" align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
		    <td align="left">&nbsp;</td>
	      </tr>
		 
		      
		
		  
		  <tr>
		    <td colspan="2">&nbsp;</td>
		    <td>&nbsp;</td>
		    <td align="left"><span class="narmal"> <a href="?pid=74&amp;start=<?php echo $start; ?>&amp;action=manageletters" class="bgcolor_02" style="text-decoration:none; padding:3px;">Back</a> </span></td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
	      </tr>		  
		</table>
	
		</td>		
		<td width="1" class="bgcolor_02"></td>
	  </tr>	  
	  <tr>
		<td height="1" colspan="3" class="bgcolor_02"></td>
  </tr>
</table>
</td>
</tr>

<?php }?>

</table>