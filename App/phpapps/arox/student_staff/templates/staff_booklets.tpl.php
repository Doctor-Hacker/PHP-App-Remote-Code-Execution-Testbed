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
			url="?pid=38&action=classwisesubjects&cid="+countryid+"&selval="+selval;
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
			
			url="?pid=38&action=classwisesubjects2&cid="+countryid+"&selval="+getselected;
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
<?php 
include("includes/js/fckeditor/fckeditor.php") ;
if($action == 'list') { ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Booklet  Management</span></td>
              </tr>	
			   <tr>
			   <td  class="bgcolor_02"></td>
			  <td align="right" valign="top"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font>
			          <br /></td>
					  <td  class="bgcolor_02"></td>
					  </tr>
               <tr>
			   <td  class="bgcolor_02"></td>
			  <td align="right" valign="top"></td>
					  <td  class="bgcolor_02"></td>
					  </tr>		  
               <tr>
			    <td  class="bgcolor_02"></td>
                <td height="10" align="right"><form action="?pid=37"  method="post"><input type="submit" class="bgcolor_02" name="addbookletnew" value="Add Booklet" />&nbsp;</form></td>
				 <td  class="bgcolor_02"></td>
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
                          </select><font color="#FF0000"><b>*</b></font></td>
                  </tr>
                             <tr height="25" >
                               <td width="7%" align="left" class="narmal">&nbsp;</td>
                               <td width="15%" align="left" class="narmal">Subject</td>
                              <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="77%" align="left" class="narmal" id="subject2selectbox"><select name="subjectid"  ><option value="">- Select -</option></select> <?php if($classesid!=""){ ?>
                              <script type="text/javascript">
							  getallsubjects('<?php echo $classesid; ?>','<?php echo $subjectid; ?>')
							  </script>
                              
                              
                              <?php } ?><font color="#FF0000"><b>*</b></font></td>
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
                      <td width="6%" align="left" class="admin">S.No</td>
                      <td width="18%" align="left" class="admin">Class</td>
                      <td width="17%" align="left" class="admin">Subject</td>
                      <td width="21%" align="left" class="admin">Title</td>
					    <td width="18%" align="left" class="admin">Created By</td>
                      <td width="20%" align="left" class="admin">Action</td>
                    </tr>
                    <?php if(count($unitsarr)>0){
					$irow=0;
					foreach($unitsarr as $eachrecord){
					$irow++;
					 ?>
                    <tr height="25">
                      <td align="left" width="6%" class="narmal"><?php echo $irow; ?></td>
                      <td align="left" width="18%" class="narmal"><?php echo $eachrecord['es_classname']; ?></td>
                      <td align="left" width="17%" class="narmal"><?php echo $eachrecord['es_subjectname']; ?></td>
                      <td align="left" width="21%" class="narmal"><?php echo $eachrecord['book_name']; ?></td>
					  <td align="left" width="18%" class="narmal"><?php 
					  if($eachrecord['user_type']=='staff'){
					   $staff_arr =  get_staffdetails($eachrecord['user_id']);
					   $from_name = $staff_arr['st_firstname'].' '.$staff_arr['st_lastname'];
					  }
					  if($eachrecord['user_type']=='admin'){
					   $admin_arr = $db->getrow("select * from es_admins where es_adminsid=".$eachrecord['user_id']);
					   $from_name = $admin_arr['admin_fname'];
					  }
					  echo $from_name; ?><br />
				      [ <?php echo $eachrecord['user_type']; ?> ]</td>
                      <td align="left" width="20%" class="narmal"><?php /*?><a href="?pid=37&action=edit&bookletid=<?php echo $eachrecord['booklet_id']; ?>&es_classesid=<?php echo $eachrecord['es_classesid']; ?>&es_subjectid=<?php echo $eachrecord['es_subjectid']; ?>" ><img src="images/b_edit.png" border="0" title="Edit" alt="Edit"  /></a><?php */?>&nbsp;
					  <a href="?pid=37&action=viewbooklet&bookletid=<?php echo $eachrecord['booklet_id']; ?>&classesid=<?php echo $eachrecord['es_classesid']; ?>&subjectid=<?php echo $eachrecord['es_subjectid']; ?>" ><img src="images/b_browse.png" border="0" title="View" alt="View"  /></a> &nbsp;&nbsp;<a href="javascript: void(0)" onclick="popup_letter('?pid=37&action=print_view&bookletid=<?php echo $eachrecord['booklet_id']; ?>&classesid=<?php echo $eachrecord['es_classesid']; ?>&subjectid=<?php echo $eachrecord['es_subjectid']; ?>')" ><img src="images/print_16.png" border="0" title="Print " alt="Print" /></a>
					  <?php /*?><a href="?pid=61&action=deletebooklet&bookletid=<?php echo $eachrecord['booklet_id']; ?>&classesid=<?php echo $eachrecord['es_classesid']; ?>&subjectid=<?php echo $eachrecord['es_subjectid']; ?>" onClick="return confirm('Are you sure you want to delete ?')"><img src="images/b_drop.png" border="0" title="Delete" alt="Delete"  /></a><?php */?></td>
                    </tr>       
                    
					<?php }?>
					<tr height="25">
                      <td align="center" colspan="6" class="narmal"><input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=37&action=print_list<?php echo $PageUrl;?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /></td>
                    </tr>
					<?php  } else { ?> 
					 <tr height="25">
                      <td align="center" colspan="6" class="narmal">No Records Found</td>
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
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Add Booklet </span></td>
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
				<table width="98%" border="0" cellpadding="2" cellspacing="0">
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
                          </select><font color="#FF0000"><b>*</b></font></td>
                  </tr>
                             <tr height="25" >
                               <td width="13%" align="left" class="narmal">Subject</td>
                              <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="86%" align="left" class="narmal" id="subjectselectbox"><select name="es_subjectid"  ><option value="">- Select -</option></select> <?php if( $es_classesid!=""){ ?>
							<script type="text/javascript">
							getsubjects('<?php echo $es_classesid; ?>','<?php echo $es_subjectid; ?>');
							</script>
							<?php } ?>	<font color="#FF0000"><b>*</b></font></td>
                  </tr>
                             <tr height="25" >
                               <td width="13%" align="left" class="narmal"> Title </td>
                               <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="86%" align="left" class="narmal"><input type="text" name="book_name" value="<?php echo $book_name; ?>" /><font color="#FF0000"><b>*</b></font></td>
                  </tr>
				   <tr height="25" >
                               <td width="13%" align="left" class="narmal">File</td>
                              <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="86%" align="left" class="narmal"><?php echo $html_obj->draw_inputfield('book_file','','file',''); ?><font color="#FF0000"><b>*</b></font></td>
                  </tr>
				  <tr height="25" >
                               <td width="13%" align="left" class="narmal"></td>
                              <td width="1%" align="left" class="narmal"></td>							   
                              <td width="86%" align="left" class="narmal">(OR)</td>
                  </tr>
				  
				   <tr height="25" >
				     <td align="left" class="narmal">Description</td>
				     <td align="left" class="narmal">:</td>
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
																		?><font color="#FF0000"><b>*</b></font></td>
                  </tr>
							
							<tr height="25">
							  <td align="left" width="13%" class="narmal"></td>
                             
							 
							
							  <td align="left" width="1%" class="narmal"></td>
							  <td align="left" width="86%" class="narmal"><input type="submit" class="bgcolor_02" name="addbooklet" value="Add Booklet" /></td>
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
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Edit Booklet</span></td>
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

<?php  if($action=="viewbooklet" || $action=='print_view'){?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">

				 
              <tr>
                <td height="3" colspan="3" ></td>
              </tr>
			 		  
               <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">View Booklet </span></td>
              </tr>	
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="center" valign="top"><table width="95%"  border="0" cellpadding="2" cellspacing="0">
				<tr height="25" >
                              <td width="13%" height="27" align="left" class="narmal">Class&nbsp; </td>
                              <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="86%" align="left" valign="middle" class="narmal"><?php echo $viewbooklet['es_classname']; ?></td>
                  </tr>
				<tr height="25" >
                              <td width="13%" height="27" align="left" class="narmal">Subject&nbsp; </td>
                  <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="86%" align="left" valign="middle" class="narmal"><?php echo $viewbooklet['es_subjectname']; ?></td>
                  </tr>
                            <tr height="25" >
                              <td width="13%" height="27" align="left" class="narmal">Title </td>
                              <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="86%" align="left" valign="middle" class="narmal"><?php echo $viewbooklet['book_name']; ?></td>
                  </tr>
				  
                           
                           
				   <?php if($viewbooklet['book_desc']!=""){ ?>
				  <tr height="25" >
                               <td width="13%" align="left" class="narmal">Description</td>
                               <td width="1%" align="left" class="narmal">:</td>							   
                               <td width="86%" align="left" valign="middle" class="narmal"><?php echo $viewbooklet['book_desc']; ?></td>
				  </tr><?php } if($viewbooklet['book_file']!=""){ ?>
				  	   <tr height="25" >
                               <td width="13%" align="left" class="narmal">File&nbsp;Download</td>
                              <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="86%" align="left" class="narmal"><a href="?pid=37&downloadfile=<?php echo $viewbooklet['book_file']; ?>" title="Download"><?php echo RemoveDateFromFilename($viewbooklet['book_file']);?></a></td>
                  </tr>
				  <?php }?>
				   <tr height="25" >
                               <td width="13%" align="left" class="narmal">Added By</td>
                               <td width="1%" align="left" class="narmal">:</td>							   
                               <td width="86%" align="left" class="narmal"><?php echo $username; ?> (<?php echo $viewbooklet['user_type']; ?>)</td>
			      </tr>
				   <?php if($action=='viewbooklet'){?>
                   <tr height="25" >
                               <td width="13%" align="left" class="narmal">&nbsp;</td>
                               <td width="1%" align="left" class="narmal">&nbsp;</td>							   
                               <td width="86%" align="left" class="narmal"><a href="?pid=37&action=list&classesid=<?php echo $classesid;?>&subjectid=<?php echo $subjectid;?>&searchunit=<?php echo "Submit"?>" class="bgcolor_02" style="padding:3px; text-decoration:none;">Back</a></td>
                   </tr>
				   <?php }?>
				 
									
                  </table>
                
				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
             
               
              
              
  		     <tr><td colspan="3" class="bgcolor_02" height="1"></td></tr>
			  
			  
   
</table>

<?php } ?>
<?php if($action == 'print_list'){?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Booklet List</strong></td>
              </tr>
			  <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top"><br />
				
				<table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr height="25" class="bgcolor_02">
                      <td width="10%" align="left" class="admin">S.No</td>
                      <td width="30%" align="left" class="admin">Class</td>
                      <td width="30%" align="left" class="admin">Subject</td>
                      <td width="30%" align="left" class="admin">Title</td>
					  <td width="30%" align="left" class="admin">Created By</td>
                     
                    </tr>
                    <?php if(count($unitsarr)>0){
					$irow=0;
					foreach($unitsarr as $eachrecord){
					$irow++;
					 ?>
                    <tr height="25">
                      <td align="left" width="10%" class="narmal"><?php echo $irow; ?></td>
                      <td align="left" width="30%" class="narmal"><?php echo $eachrecord['es_classname']; ?></td>
                      <td align="left" width="30%" class="narmal"><?php echo $eachrecord['es_subjectname']; ?></td>
                      <td align="left" width="30%" class="narmal"><?php echo $eachrecord['book_name']; ?></td>
					  <td align="left" width="30%" class="narmal"><?php 
					  if($eachrecord['user_type']=='staff'){
					   $staff_arr =  get_staffdetails($eachrecord['user_id']);
					   $from_name = $staff_arr['st_firstname'].' '.$staff_arr['st_lastname'];
					  }
					  if($eachrecord['user_type']=='admin'){
					   $admin_arr = $db->getrow("select * from es_admins where es_adminsid=".$eachrecord['user_id']);
					   $from_name = $admin_arr['admin_fname'];
					  }
					  echo $from_name; ?><br />[ <?php echo $eachrecord['user_type']; ?> ]</td>
                      
                    </tr>       
                    
					<?php } } else { ?> 
					 <tr height="25">
                      <td align="center" colspan="5" class="narmal">No Records Found</td>
                    </tr>
                    
                    <?php } ?>
                </table>

				</td>
				
                <td width="1" class="bgcolor_02"></td>
              </tr>
              
                <td height="1" colspan="3" class="bgcolor_02"></td>
                </tr>
            </table>
<?php }?>