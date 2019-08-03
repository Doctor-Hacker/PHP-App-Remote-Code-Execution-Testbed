<?php 
	/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
include("includes/js/fckeditor/fckeditor.php") ;
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
			url="?pid=55&action=classwisesubjects&cid="+countryid+"&selval="+selval;
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
<?php 
if($action == 'list') { ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
            
     
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp; Booklet</td>
              </tr>	
               <tr>
                <td width="1px" class="bgcolor_02" ></td>
                <td height="25" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font><br /></td>
                 <td width="1px" class="bgcolor_02" ></td></td>
              </tr>		
              <tr>
                <td width="1px" class="bgcolor_02" ></td>
                <td height="25" align="right">
				<?php if(in_array('8_10',$admin_permissions)){?>
				<form action="?pid=61"  method="post">
				

<input type="submit" class="bgcolor_02" name="addbookletnew" value="Add Booklet" />&nbsp;</form>

<?php }?>
				
				</td>
                 <td width="1px" class="bgcolor_02" ></td></td>
              </tr>			  
              
			 
              
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="center" valign="top">
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
              <td><form method="post" name="addun" action="?pid=61&action=list">
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
                          </select><font color="#FF0000">&nbsp;*</font>
                         
                          </td>
                  </tr>
                             <tr height="25" >
                               <td width="7%" align="left" class="narmal">&nbsp;</td>
                               <td width="15%" align="left" class="narmal">Subject</td>
                              <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="77%" align="left" class="narmal" id="subject2selectbox"><select name="subjectid"  ><option value="">- Select -</option></select><font color="#FF0000">&nbsp;*</font> <?php if($classesid!=""){ ?>
                              <script type="text/javascript">
							  getallsubjects('<?php echo $classesid; ?>','<?php echo $subjectid; ?>')
							  </script>
                              
                              
                              <?php } ?></td>
                  </tr>
                             
							
							<tr height="25">
							  <td align="left" width="7%" class="narmal"></td>
							  <td align="left" width="15%" class="narmal"></td>
                             
							 
							
							  <td align="left" width="1%" class="narmal"></td>
							  <td align="left" width="77%" class="narmal"><input name="searchunit" type="submit" class="bgcolor_02" value="Search" /></td>
			      </tr>			
                  </table>						
                  </form>
              </td>
              </tr>
                </table>
                <br />
                  <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr height="25" class="bgcolor_02">
                      <td width="8%" align="left" class="admin">&nbsp;S.No</td>
                      <td width="18%" align="left" class="admin">Class</td>
                      <td width="18%" align="left" class="admin">Subject</td>
                      <td width="22%" align="left" class="admin">Title</td>
					  <td width="17%" align="left" class="admin">Created By</td>
                      <td width="17%" align="left" class="admin">Action&nbsp;</td>
                    </tr>
                    <?php if(count($unitsarr)>0){
					$irow=0;
					foreach($unitsarr as $eachrecord){
					$irow++;
					 ?>
                    <tr height="25">
                      <td align="left" width="8%" class="narmal">&nbsp;<?php echo $irow; ?></td>
                      <td align="left" width="18%" class="narmal"><?php echo $eachrecord['es_classname']; ?></td>
                      <td align="left" width="18%" class="narmal"><?php echo $eachrecord['es_subjectname']; ?></td>
                      <td align="left" width="22%" class="narmal"><?php echo $eachrecord['book_name']; ?></td>
					  <td align="left" width="17%" class="narmal"><?php
				if($eachrecord['user_type']!=""){
				      if($eachrecord['user_type']=='staff'){
					   $staff_arr =  get_staffdetails($eachrecord['user_id']);
					   $from_name = $staff_arr['st_firstname'].' '.$staff_arr['st_lastname'];
					  }
					  if($eachrecord['user_type']==='admin'){
					   $admin_arr = $db->getrow("select * from es_admins where es_adminsid=".$eachrecord['user_id']);
					   $from_name = $admin_arr['admin_fname'];
					  }
				 echo  $from_name; ?><br />
				      [<?php echo $eachrecord['user_type'];?>]<?php }?></td>
                      <td align="left" width="17%" class="narmal">
					  
					  <?php if(in_array('8_11',$admin_permissions)){?>


 <a href="?pid=61&action=edit&bookletid=<?php echo $eachrecord['booklet_id']; ?>&es_classesid=<?php echo $eachrecord['es_classesid']; ?>&es_subjectid=<?php echo $eachrecord['es_subjectid']; ?>" ><img src="images/b_edit.png" border="0" title="Edit" alt="Edit"  /></a>&nbsp;
					 
<?php }?>
					  
					  
					  
					  
					  <?php if(in_array('8_18',$admin_permissions)){?>

 <a href="?pid=61&action=viewbooklet&bookletid=<?php echo $eachrecord['booklet_id']; ?>&classesid=<?php echo $eachrecord['es_classesid']; ?>&subjectid=<?php echo $eachrecord['es_subjectid']; ?>" ><img src="images/b_browse.png" border="0" title="View" alt="View"  /></a>&nbsp;
					

<?php }?>
					  
					 <?php if(in_array('8_12',$admin_permissions)){?>


  <a href="?pid=61&action=deletebooklet&bookletid=<?php echo $eachrecord['booklet_id']; ?>&classesid=<?php echo $eachrecord['es_classesid']; ?>&subjectid=<?php echo $eachrecord['es_subjectid']; ?>" onClick="return confirm('Are you sure you want to  delete ?')"><img src="images/b_drop.png" border="0" title="Delete" alt="Delete"  /></a>&nbsp;<?php }?>
  <?php if (in_array("8_106", $admin_permissions)) {?>  
  <a href="javascript: void(0)" onclick="window.open('?pid=61&action=print_view&bookletid=<?php echo $eachrecord['booklet_id']; ?>&classesid=<?php echo $eachrecord['es_classesid']; ?>&subjectid=<?php echo $eachrecord['es_subjectid']; ?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');" ><img src="images/print_16.png" border="0" title="Print " alt="Print " /></a> 	<?php } ?> </td>
 				    </tr>  
					
			<tr>
				<td colspan="6" align="center" class="adminfont">&nbsp;</td>
			</tr>      
                    
					<?php } ?>
					<?php if (in_array("8_105", $admin_permissions)) {?>  
					<tr>
				<td colspan="6" align="center" class="adminfont"><input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=61&action=print_list&searchunit=Submit&classesid=<?php echo $classesid; ?>&subjectid=<?php echo $subjectid;?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /></td>
			</tr>   
			<?php } ?>
					
					<?php } else { ?> 
					 <tr height="25">
                      <td align="center" colspan="6">No Records Found</td>
                    </tr>
                    
                    <?php } ?>
                </table></td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
  </tr>
</table>
<?php } ?>
<?php 
if($action == 'add') { ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;Booklet Management</td>
              </tr>	
              <tr>
                <td width="1px" class="bgcolor_02" ></td>
                <td height="25" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font><br /></td>
                 <td width="1px" class="bgcolor_02" ></td></td>
              </tr>				  
              
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="center" valign="top"><br />
                <form method="post" name="addun" action="" enctype="multipart/form-data">
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
                              <td width="86%" align="left" class="narmal" id="subjectselectbox"><select name="es_subjectid"  ><option value="">- Select -</option></select><font color="#FF0000">&nbsp;*</font> <?php if( $es_classesid!=""){ ?>
							<script type="text/javascript">
							getsubjects('<?php echo $es_classesid; ?>','<?php echo $es_subjectid; ?>');
							</script>
							<?php } ?>	
							  
							  </td>
                  </tr>
                             <tr height="25" >
                               <td width="13%" align="left" class="narmal"> Title </td>
                               <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="86%" align="left" class="narmal"><input type="text" name="book_name" value="<?php echo $book_name; ?>" /><font color="#FF0000">&nbsp;*</font></td>
                  </tr>
				   <tr height="25" >
                               <td width="13%" align="left" class="narmal">Upload&nbsp;File</td>
                     <td width="1%" align="left" class="narmal">&nbsp;</td>							   
                     <td width="86%" align="left" class="narmal"><?php echo $html_obj->draw_inputfield('book_file','','file',''); ?>&nbsp;(OR)<font color="#FF0000">&nbsp;*</font><br />(Note : Valid format pdf,doc,docx)</td>
                  </tr>
				  
				   <tr height="25" >
				     <td align="left" class="narmal">Enter&nbsp;Notes</td>
				     <td align="left" class="narmal">&nbsp;</td>
				     <td align="left" class="narmal">&nbsp;</td>
			      </tr>
				   <tr height="25" >
                               <td colspan="3" align="left" class="narmal"><?php $sBasePath = $_SERVER['PHP_SELF'] ;
																			  $sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "?pid" ) ) ;
																			  $sBasePath = $sBasePath."includes/js/fckeditor/";
																			  $oFCKeditor = new FCKeditor('book_desc') ;
																			  $oFCKeditor->BasePath	= $sBasePath ;
																			  $oFCKeditor->Height	= 300;
																			  $oFCKeditor->Value	= $book_desc;
																			  $oFCKeditor->Create() ;
																		?></td>
                  </tr>
							
							<tr height="25">
							  <td align="left" width="13%" class="narmal"></td>
                             
							 
							
							  <td align="left" width="1%" class="narmal"></td>
							  <td align="left" width="86%" class="narmal"><input type="submit" class="bgcolor_02" name="addbooklet" value="Add" /></td>
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
              </tr>			  
</table>
<?php } ?>


<?php 
if($action == 'edit') { ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">Booklet Management</td>
              </tr>	
              <tr>
                <td width="1px" class="bgcolor_02" ></td>
                <td height="25" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font><br /></td>
                 <td width="1px" class="bgcolor_02" ></td></td>
              </tr>				  
              
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="center" valign="top"><br />
                <form method="post" name="addun" action="" enctype="multipart/form-data">
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
                              <td width="86%" align="left" class="narmal" id="subjectselectbox"><select name="es_subjectid"  ><option value="">- Select -</option></select><font color="#FF0000">&nbsp;*</font> <?php if( $es_classesid!=""){ ?>
							<script type="text/javascript">
							getsubjects('<?php echo $es_classesid; ?>','<?php echo $es_subjectid; ?>');
							</script>
							<?php } ?>	
							  
							  </td>
                  </tr>
                             <tr height="25" >
                               <td width="13%" align="left" class="narmal"> Title </td>
                               <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="86%" align="left" class="narmal"><input type="text" name="book_name" value="<?php echo $book_name; ?>" /><font color="#FF0000">&nbsp;*</font></td>
                  </tr>
				   <tr height="25" >
                               <td width="13%" align="left" class="narmal">Upload&nbsp;File</td>
                     <td width="1%" align="left" class="narmal">&nbsp;</td>							   
                     <td width="86%" align="left" class="narmal"><?php echo $html_obj->draw_inputfield('book_file','','file',''); ?>&nbsp;(OR)<font color="#FF0000">&nbsp;*</font><br />(Note : Valid format pdf,doc)</td>
                  </tr>
				   <tr height="25" >
                               <td width="13%" align="left" class="narmal"></td>
                     <td width="1%" align="left" class="narmal">&nbsp;</td>							   
                     <td width="86%" align="left" class="narmal"> <a href="?pid=61&downloadfile=<?php echo $old_file; ?>" class="video_link" title="Download"><?php echo RemoveDateFromFilename($old_file);?></a><input type="hidden" name="old_file"  value="<?php echo $old_file; ?>"/></td>
                  </tr>
				  
				 
				  
				   <tr height="25" >
				     <td align="left" class="narmal">Enter&nbsp;Notes</td>
				     <td align="left" class="narmal">&nbsp;</td>
				     <td align="left" class="narmal">&nbsp;</td>
			      </tr>
				   <tr height="25" >
                               <td colspan="3" align="left" class="narmal"><?php $sBasePath = $_SERVER['PHP_SELF'] ;
																			  $sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "?pid" ) ) ;
																			  $sBasePath = $sBasePath."includes/js/fckeditor/";
																			  $oFCKeditor = new FCKeditor('book_desc') ;
																			  $oFCKeditor->BasePath	= $sBasePath ;
																			  $oFCKeditor->Height	= 300;
																			  $oFCKeditor->Value	= $book_desc;
																			  $oFCKeditor->Create() ;
																		?></td>
                  </tr>
							
							<tr height="25">
							  <td align="left" width="13%" class="narmal"></td>
                             
							 
							
							  <td align="left" width="1%" class="narmal"></td>
							  <td align="left" width="86%" class="narmal"><input type="submit" class="bgcolor_02" name="updatebooklet" value="Update" /></td>
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
              </tr>			  
</table>
<?php } ?>
<?php  if($action=="viewbooklet" || $action=='print_view'){
if($action=='print_view'){$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_booklets','Tutorials','Add Booklets','','Print','".$_SERVER['REMOTE_ADDR']."',NOW())";
     $log_insert_exe=mysql_query($log_insert_sql);}
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="3" colspan="3"  ></td>
              </tr>			  
               <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp; Booklet</td>
              </tr>	
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="center" valign="top"><table width="95%"  border="0" cellpadding="2" cellspacing="0">
				
				   <tr height="25" >
                              <td width="13%" height="27" align="left" class="narmal">Class&nbsp; </td>
                              <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="86%" align="left" valign="middle" class="narmal"><?php echo classname($classesid); ?></td>
                  </tr>
				   <tr height="25" >
                              <td width="13%" height="27" align="left" class="narmal">Subject&nbsp; </td>
                              <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="86%" align="left" valign="middle" class="narmal"><?php echo subjectname($subjectid); ?></td>
                  </tr>
                            <tr height="25" >
                              <td width="13%" height="27" align="left" class="narmal">Booklet&nbsp;Name </td>
                              <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="86%" align="left" valign="middle" class="narmal"><?php echo $viewbooklet['book_name']; ?></td>
                  </tr>
				  
                           
                           
				   <?php if($viewbooklet['book_desc']!=""){ ?>
				  <tr height="25" >
                               <td width="13%" align="left" class="narmal">Notes</td>
                               <td width="1%" align="left" class="narmal">:</td>							   
                               <td width="86%" align="left" valign="middle" class="narmal"><?php echo $viewbooklet['book_desc']; ?></td>
				  </tr><?php } if($viewbooklet['book_file']!=""){ ?>
				  	   <tr height="25" >
                               <td width="13%" align="left" class="narmal">File&nbsp;Download</td>
                              <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="86%" align="left" class="narmal"><a href="?pid=61&downloadfile=<?php echo $viewbooklet['book_file']; ?>" title="Download"><?php echo RemoveDateFromFilename($viewbooklet['book_file']);?></a></td>
                  </tr>
				  <?php }?>
                  <tr height="25" >
                              <td width="13%" height="27" align="left" class="narmal">Added By</td>
                              <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="86%" align="left" valign="middle" class="narmal"><?php echo $username; ?> (<?php echo $viewbooklet['user_type']; ?>)</td>
                  </tr>
				   <?php if($action=='viewbooklet'){?>
				   <tr height="25" >
                               <td width="13%" align="left" class="narmal">&nbsp;</td>
                               <td width="1%" align="left" class="narmal">&nbsp;</td>							   
                               <td width="86%" align="left" class="narmal"><a href="?pid=61&action=list&classesid=<?php echo $classesid;?>&subjectid=<?php echo $subjectid;?>&searchunit=<?php echo "Submit"?>" class="bgcolor_02" style="padding:3px; text-decoration:none;">Back</a></td>
				  </tr>
				  <?php }?>
				 
									
                  </table>
                
				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
             
               
              
              
  		     <tr><td colspan="3" class="bgcolor_02" height="1"></td></tr>
			  
			  
   
</table>

<?php } ?>

<?php  if($action=="print_list"){
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_booklets','Tutorials','Add Booklets','','Print','".$_SERVER['REMOTE_ADDR']."',NOW())";
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
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Booklet </span></td>
              </tr>	
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="center" valign="top"><br />
				
				<table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr height="25" class="bgcolor_02">
                      <td width="8%" align="left" class="admin">&nbsp;S.No</td>
                      <td width="18%" align="left" class="admin">Class</td>
                      <td width="18%" align="left" class="admin">Subject</td>
                      <td width="22%" align="left" class="admin">Title</td>
					  <td width="17%" align="left" class="admin">Created By</td>
                     
                    </tr>
                    <?php if(count($unitsarr)>0){
					$irow=0;
					foreach($unitsarr as $eachrecord){
					$irow++;
					 ?>
                    <tr height="25">
                      <td align="left" width="8%" class="narmal">&nbsp;<?php echo $irow; ?></td>
                      <td align="left" width="18%" class="narmal"><?php echo $eachrecord['es_classname']; ?></td>
                      <td align="left" width="18%" class="narmal"><?php echo $eachrecord['es_subjectname']; ?></td>
                      <td align="left" width="22%" class="narmal"><?php echo $eachrecord['book_name']; ?></td>
					  <td align="left" width="17%" class="narmal"><?php
				if($eachrecord['user_type']!=""){
				      if($eachrecord['user_type']=='staff'){
					   $staff_arr =  get_staffdetails($eachrecord['user_id']);
					   $from_name = $staff_arr['st_firstname'].' '.$staff_arr['st_lastname'];
					  }
					  if($eachrecord['user_type']==='admin'){
					   $admin_arr = $db->getrow("select * from es_admins where es_adminsid=".$eachrecord['user_id']);
					   $from_name = $admin_arr['admin_fname'];
					  }
				 echo  $from_name; ?><br />
				      [<?php echo $eachrecord['user_type'];?>]<?php }?></td>
                      
 				    </tr>  
					
                    
					<?php } } else { ?> 
					 <tr height="25">
                      <td align="center" colspan="5">No Records Found</td>
                    </tr>
                    
                    <?php } ?>
                </table>
                
				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
             
               
              
              
  		     <tr><td colspan="3" class="bgcolor_02" height="1"></td></tr>
			  
			  
   
</table>

<?php } ?>