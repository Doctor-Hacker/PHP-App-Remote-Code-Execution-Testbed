<script type="text/javascript">
/************ Checking Browsers ***********/
		function GetXmlHttpObject(handler)
		{
			var objXmlHttp=null
		
			if (navigator.userAgent.indexOf("Opera")>=0)
			{
				alert("This Site doesn't work in Opera")
				return
			}
			if (navigator.userAgent.indexOf("MSIE")>=0)
			{
				var strName="Msxml2.XMLHTTP"
				if (navigator.appVersion.indexOf("MSIE 5.5")>=0)
				{
					strName="Microsoft.XMLHTTP"
				}
				try
				{
					objXmlHttp=new ActiveXObject(strName)
					objXmlHttp.onreadystatechange=handler
					return objXmlHttp
				}
				catch(e)
				{
					alert("Error. Scripting for ActiveX might be disabled")
					return
				}
			}
			if (navigator.userAgent.indexOf("Mozilla")>=0)
			{
				objXmlHttp=new XMLHttpRequest()
				objXmlHttp.onload=handler
				objXmlHttp.onerror=handler
				return objXmlHttp
			}
		}

/** Completed checking Browser.. **/
/************ Get List of Districts ***********/
		function getsubjects(countryid,selval)
		{   
		    
			url="?pid=55&action=getsubmodules&module="+countryid+"&selval="+selval;
			url=url+"&sid="+Math.random();
			
			xmlHttp1=GetXmlHttpObject(countryChanged);
			xmlHttp1.open("GET", url, true);
			xmlHttp1.send(null);
		}
		function countryChanged()
		{
			if (xmlHttp1.readyState==4 || xmlHttp1.readyState=="complete")
			{
				document.getElementById("subjectselectbox").innerHTML=xmlHttp1.responseText
			}
		}
		
		
	
	
	
</script>
<?php
if($action=="report"){
?>			
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="3" colspan="3"></td>
</tr>
<tr>
<td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Role Management</strong></td>
</tr>
<tr>
<td width="1" class="bgcolor_02" ></td>
<td align="left" height="4" ></td>
<td width="1" class="bgcolor_02" ></td>
</tr>
<tr>
<td width="1" class="bgcolor_02"></td>
<td align="left" valign="top">
<iframe width=132 height=142 name="gToday:contrast:agenda.js" id="gToday:contrast:agenda.js" src="<?php echo JS_PATH ?>/DateRange/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe>
<form action="" method="post" name="search_dispatch">
		<table width="100%" cellpadding="0" cellspacing="3">
		<tr>
		   <td width="13%" height="26" align="left">From</td>
		   <td width="1%">:</td>
		   <td width="27%" align="left"><input name="s_from" type="text" id="s_from" style="width:100px;" value="<?php echo $s_from; ?>" />
           <a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fStartPop(document.search_dispatch.s_from,document.search_dispatch.s_to);return false;" >
           <img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a>			</td>
		   <td width="13%" align="left">To</td>
		   <td width="1%">:</td>
		   <td width="45%" align="left"><input name="s_to" type="text" id="s_to" style="width:100px;" value="<?php echo $s_to; ?>" />
		   <a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fEndPop(document.search_dispatch.s_from,document.search_dispatch.s_to);return false;" >											
			<img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a></td>
		</tr>
		<tr>
		   <td align="left">Module</td>
		   <td>:</td>
		   <td align="left"><select name="s_module" id="s_module" style="width:150px;" onChange="getsubjects(this.value,'');" >
             <option value="">-All Modules-</option>
			 <?php
			 $module_sql="SELECT DISTINCT module FROM es_userlogs ORDER BY module";
			 $module_exe=mysql_query($module_sql);
			 while($module_row=mysql_fetch_array($module_exe)){if($module_row['module']!=""){
			 ?>
             <option value="<?php echo $module_row['module']; ?>" <?php if($s_module==$module_row['module']){?> selected="selected"<?php }?>><?php echo ucfirst(strtolower($module_row['module'])); ?></option>
			 <?php }}?>         
           </select></td>
		   <td align="left">Sub Module </td>
		   <td>:</td>
		   <td align="left" id="subjectselectbox">
		   <select name="s_submodule" id="s_submodule" style="width:150px;">
             <option value="">-All Sub Modules-</option>
			        
           </select></td>
		</tr>
		<?php if($s_module!=""){
					
					 ?>
<script type="text/javascript">
getsubjects('<?php echo $s_module; ?>','<?php echo $s_submodule;?>');
</script>
<?php } ?>
		<tr>
		   <td align="left">Action</td>
		   <td>:</td>
		   <td align="left"><input name="s_action" type="text" id="s_action" value="<?php echo $s_action;?>" /></td>
		   <td align="left">&nbsp;</td>
		   <td>&nbsp;</td>
		   <td align="left"><input type="submit" name="Search" value="Search" class="bgcolor_02" />
             <?php if (in_array("34_2", $admin_permissions)) {?><input type="submit" name="export" value="export" class="bgcolor_02" /><?php }?></td>
		</tr>
		<tr>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  </tr>
		</table>
	  </form>


				<table width="100%" border="0" cellpadding="1" cellspacing="1" bordercolor="#CCCCCC">
				  <tr  class="bgcolor_02">
					<td width="3%" height="23" align="center"><strong>S No</strong></td>
					<td width="13%" height="23" align="center"><strong>Admin</strong></td>
					<td width="14%" align="center"><strong>Module</strong></td>
					<td width="17%" align="center"><strong>Sub-Module</strong></td>   
					<td width="20%" align="center"><strong>Action</strong></td>
                    <td width="21%" align="center"><strong>IP Address/Date/Time</strong></td>                                    
				  </tr>
				  <?php if(count($driver_row) > 0 ){ ?>
				  <?php						
					$rw = 1;
					$slno = $start+1;
					foreach ($driver_row as $driver)
						 {  
							if($rw%2==0)
								$rowclass = "even";
								else
								$rowclass = "odd";
					?>
				  <tr class="<?php echo $rowclass;?>">
					<td align="center"><?php echo $slno;?></td>
					<td align="center">
					<?php 
					$user_sql="SELECT * FROM es_admins WHERE es_adminsid=".$driver['user_id'];
					$user_exe=mysql_query($user_sql);
					$user_row=mysql_fetch_array($user_exe);
					echo $user_row['admin_username']; 
					?>
					</td>
					<td align="center"><?php echo ucfirst(strtolower($driver['module'])); ?></td>
					<td align="center"><?php echo ucfirst(strtolower($driver['submodule']));?></td>				
					<td align="center">
                    <?php					
                    echo ucfirst(strtolower($driver['action']));
					?>
                    </td>
                    <td align="center"><?php echo $driver['ipaddress']." <br> ".func_date_conversion('Y-m-d H:i:s', 'd/m/Y H:i:s', $driver['posted_on']);?></td>                                  
				  </tr>
				  <?php           
				  $rw++;
				  $slno++;	   
				  } ?>
				  <tr>
					<td colspan="6" align="center"><?php paginateexte($start, $q_limit, $driver1_num, "action=".$action."&s_from=".$s_from."&s_to=".$s_to."&s_module=".$s_module."&s_submodule=".$s_submodule."&s_action=".$s_action."&Search=".$Search) ?>    </td>
				  </tr>
				  <?php } 
											
							  else {
							   echo "<tr>";
							   echo "<td align='center' class='narmal' colspan='7'>No records found</td>";
							   echo "</tr>";
						} 
										
										
										
				  ?>
				</table>
</td>
<td width="1" class="bgcolor_02"></td>
</tr>
<tr>
<td height="1" colspan="3" class="bgcolor_02"></td>
</tr>
</table>
<?php }?>
