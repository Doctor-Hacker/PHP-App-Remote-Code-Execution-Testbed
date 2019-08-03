<?php 
	/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
	 ?>
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
			url="?pid=55&action=classwisesubjects&cid="+countryid+"&selval="+selval;;
			url=url+"&sid="+Math.random();
			xmlHttp=GetXmlHttpObject(countryChanged);
			xmlHttp.open("GET", url, true);
			xmlHttp.send(null);
		}
		function countryChanged()
		{
			if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
			{
				document.getElementById("subjectselectbox").innerHTML=xmlHttp.responseText
			}
		}
		
		function getallsubjects(countryid,getselected)
		{   
			
			url="?pid=55&action=classwisesubjects2&cid="+countryid+"&selval="+getselected;
			url=url+"&sid="+Math.random();
			xmlHttp=GetXmlHttpObject(countryChanged2);
			xmlHttp.open("GET", url, true);
			xmlHttp.send(null);
		}
		function countryChanged2()
		{
			if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
			{
				document.getElementById("subject2selectbox").innerHTML=xmlHttp.responseText
			}
		}
	
	
	
</script>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
	 <?php if($action == 'updateunits' || $action=="addunit"){?>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Unit Management</span></td>
              </tr>	
               <tr>
                <td width="1px" class="bgcolor_02" ></td>
                <td height="25" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font><br /></td>
                 <td width="1px" class="bgcolor_02" ></td></td>
              </tr>			  
               
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="center" valign="top"><br />
                <form method="post" name="addun" action="">
				<table width="90%" border="0" cellpadding="2" cellspacing="0">
                            <tr height="25" >
                              <td width="13%" align="left" class="narmal">Class</td>
                              <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="86%" align="left" class="narmal"><select name="es_classesid" onchange="getsubjects(this.value,'')">
                              <option value="">- Select -</option>
							  <?php 
							  if (is_array($classlistarr) && count($classlistarr) > 0) { 
							  foreach ($classlistarr as $eachrecord){ ?>
                            <option <?php if($eachrecord['es_classesid']==$es_classesid){ ?> selected="selected" <?php } ?> value="<?php echo $eachrecord['es_classesid']; ?>"><?php echo $eachrecord['es_classname']; ?></option>                            
							<?php } }?>							
                          </select><font color="#FF0000">&nbsp;*</font></td>
                  </tr>
                             <tr height="25" >
                               <td width="13%" align="left" class="narmal">Subject</td>
                              <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="86%" align="left" class="narmal" id="subjectselectbox"><select name="es_subjectid"  ><option value="">- Select -</option></select>
                                <font color="#FF0000">*</font>
							  <?php if( $es_classesid!=""){ ?>
							<script type="text/javascript">
							getsubjects('<?php echo $es_classesid; ?>','<?php echo $es_subjectid; ?>');
							</script>
							<?php } ?>	
							  </td>
                  </tr>
                             <tr height="25" >
                               <td width="13%" align="left" class="narmal">Unit </td>
                               <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="86%" align="left" class="narmal"><input type="text" name="unit_name" value="<?php if(!$_POST){echo $editunits['unit_name'];}else{echo $unit_name;} ?>" />
                               <font color="#FF0000">*</font></td>
                  </tr>
							
							<tr height="25">
							  <td align="left" width="13%" class="narmal"></td>
                             
							 
							
							  <td align="left" width="1%" class="narmal"></td>
							  <td align="left" width="86%" class="narmal">
							  
							  <?php if($action!="updateunits"){?>
							  <input type="submit" class="bgcolor_02" name="addunit" value="Add" />
							  <?php } else{?> 
							  
							  <?php if(in_array('8_2',$admin_permissions)){?><?php }?>
							  
							  
							   <input type="submit" class="bgcolor_02" name="updateunit" value="Update" /><?php }?>
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
  <?php } if($action=="list"){?>
               <tr>
                <td height="5" colspan="3"  ></td>
              </tr>			  
               <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Units</span></td>
              </tr>	
			     <tr>
                <td width="1px" class="bgcolor_02" ></td>
                <td height="10" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font><br /></td>
                 <td width="1px" class="bgcolor_02" ></td></td>
              </tr>	
               <tr>
                <td width="1px" class="bgcolor_02" ></td>
                <td align="right" height="25"><form action="?pid=51"  method="post">
				  <?php if(in_array('8_1',$admin_permissions)){?>
						<input type="submit" class="bgcolor_02" name="addunitslist" value="Add Unit" />&nbsp;</form>
							  <?php }?>
				
				
				
				</td>
                 <td width="1px" class="bgcolor_02" ></td></td>
              </tr>	
              
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="center" valign="top">
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
              <td><form method="post" name="addun" action="">
				<table width="90%" border="0" cellpadding="2" cellspacing="0">
                            <tr height="25" >
                              <td width="7%" align="left" class="narmal">&nbsp;</td>
                              <td width="15%" align="left" class="narmal">Class</td>
                              <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="77%" align="left" class="narmal"><select name="classesid" onchange="getallsubjects(this.value,'')">
                              <option value="">- Select -</option>
							  <?php 
							  if (is_array($classlistarr) && count($classlistarr) > 0) { 
							  foreach ($classlistarr as $eachrecord){ ?>
                            <option <?php if($eachrecord['es_classesid']==$classesid){ ?> selected="selected" <?php } ?> value="<?php echo $eachrecord['es_classesid']; ?>"><?php echo $eachrecord['es_classname']; ?></option>                            
							<?php } }?>							
                          </select><font color="#FF0000">&nbsp;*</font></td>
                  </tr>
                             <tr height="25" >
                               <td width="7%" align="left" class="narmal">&nbsp;</td>
                               <td width="15%" align="left" class="narmal">Subject</td>
                              <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="77%" align="left" class="narmal" id="subject2selectbox"><select name="subjectid"  ><option value="">- Select -</option></select><font color="#FF0000">&nbsp;*</font> 
                                <?php if($classesid!=""){ ?>
                              <script type="text/javascript">
							  getallsubjects('<?php echo $classesid; ?>','<?php echo $subjectid; ?>')
							  </script>
                              
                              
                              <?php } ?></td>
                  </tr>
                             
							
							<tr height="25">
							  <td align="left" width="7%" class="narmal"></td>
							  <td align="left" width="15%" class="narmal"></td>
                             
							 
							
							  <td align="left" width="1%" class="narmal"></td>
							  <td align="left" width="77%" class="narmal">
							  
						
							<input type="submit" class="bgcolor_02" name="searchunit" value="Search" />
							
							  </td>
			      </tr>			
                  </table>						
                  </form>
              </td>
              </tr>
                </table>
                <br />
                  <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr height="25" class="bgcolor_02">
                      <td width="10%" align="left" class="admin">&nbsp;S.No</td>
                      <td width="30%" align="left" class="admin">Class</td>
                      <td width="30%" align="left" class="admin">Subject</td>
                      <td width="30%" align="left" class="admin">Unit</td>
                      <td width="30%" align="left" class="admin">Action&nbsp;</td>
                    </tr>
                    <?php if(count($unitsarr)>0){
					$irow=0;
					foreach($unitsarr as $eachrecord){
					$irow++;
					 ?>
                    <tr height="25">
                      <td align="left" width="10%" class="narmal">&nbsp;<?php echo $irow; ?></td>
                      <td align="left" width="30%" class="narmal"><?php echo $eachrecord['es_classname']; ?></td>
                      <td align="left" width="30%" class="narmal"><?php echo $eachrecord['es_subjectname']; ?></td>
                      <td align="left" width="30%" class="narmal"><?php echo $eachrecord['unit_name']; ?></td>
                      <td align="left" width="30%" class="narmal"><a href="?pid=51&action=updateunits&uid=<?php echo $eachrecord['unit_id']; ?>&es_classesid=<?php echo $eachrecord['es_classesid']; ?>&es_subjectid=<?php echo $eachrecord['es_subjectid']; ?>" >
					  
					  <?php if(in_array('8_2',$admin_permissions)){?> <img src="images/b_edit.png" border="0" /></a>&nbsp;<?php }?>
					  
					    <?php if(in_array('8_3',$admin_permissions)){?> <a href="?pid=51&action=deleteunit&uid=<?php echo $eachrecord['unit_id']; ?>&classesid=<?php echo $eachrecord['es_classesid']; ?>&subjectid=<?php echo $eachrecord['es_subjectid']; ?>" onclick="javascript: return confirm('Are you sure you want to Delete?');" ><img src="images/b_drop.png" border="0" /></a>&nbsp;<?php }?>
					  
					  
					</td>
                    </tr>
					
			<tr>
				<td colspan="5" align="center" class="adminfont">&nbsp;</td>
			</tr>      
                    
					<?php } ?>
					<?php if (in_array("8_101", $admin_permissions)) {?> 
					<tr>
				<td colspan="5" align="center" class="adminfont"><input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=51&action=print_list&searchunit=Submit&classesid=<?php echo $classesid; ?>&subjectid=<?php echo $subjectid;?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /></td>
			</tr>  
			<?php }?> 
					
					<?php } else { ?> 
					 <tr height="25">
                      <td align="center" colspan="5">No Records Found</td>
                    </tr>
                    
                    <?php } ?>
                </table></td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
			  <?php }?>
			  <?php if($action=='print_list'){
			   $log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_units','Tutorials','Add Units','','Print','".$_SERVER['REMOTE_ADDR']."',NOW())";
     $log_insert_exe=mysql_query($log_insert_sql);
			  ?>
			  <tr>
                
                <td align="center" valign="top" colspan="3">
                
                <br />
                  <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr height="25" class="bgcolor_02">
                      <td width="10%" align="left" class="admin">&nbsp;S.No</td>
                      <td width="30%" align="left" class="admin">Class</td>
                      <td width="30%" align="left" class="admin">Subject</td>
                      <td width="30%" align="left" class="admin">Unit</td>
                      
                    </tr>
                    <?php if(count($unitsarr)>0){
					$irow=0;
					foreach($unitsarr as $eachrecord){
					$irow++;
					 ?>
                    <tr height="25">
                      <td align="left" width="10%" class="narmal">&nbsp;<?php echo $irow; ?></td>
                      <td align="left" width="30%" class="narmal"><?php echo $eachrecord['es_classname']; ?></td>
                      <td align="left" width="30%" class="narmal"><?php echo $eachrecord['es_subjectname']; ?></td>
                      <td align="left" width="30%" class="narmal"><?php echo $eachrecord['unit_name']; ?></td>
                     </tr> 
					
                    
					<?php } } else { ?> 
					 <tr height="25">
                      <td align="center" colspan="5">No Records Found</td>
                    </tr>
                    
                    <?php } ?>
                </table></td>
                
              </tr>
			  <?php }?>
              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
  </tr>
</table>
			

			
						
			
