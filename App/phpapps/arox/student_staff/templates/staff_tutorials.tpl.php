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
/* Adding chapters actions */
		function getsubjects(countryid,selval)
		{   
			url="?pid=38&action=classwisesubjects_units&cid="+countryid+"&selval="+selval;
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
		function getunits(countryid,selval)
		{   
			url="?pid=38&action=classwiseunitsone&es_subjectid="+countryid+"&selval="+selval;
			url=url+"&sid="+Math.random();
			xmlHttp1=GetXmlHttpObject(countryChangedunits);
			xmlHttp1.open("GET", url, true);
			xmlHttp1.send(null);
		}
		function countryChangedunits()
		{
			if (xmlHttp1.readyState==4 || xmlHttp1.readyState=="complete")
			{
				document.getElementById("unitselectbox").innerHTML=xmlHttp1.responseText
			}
		}
		
		
		
		function getchapters(unit_id,selval)
		{   
			url="?pid=38&action=unitwisechapters&unit_id="+unit_id+"&selval="+selval;
			url=url+"&sid="+Math.random();
			xmlHttp5=GetXmlHttpObject(countryChangedchapters);
			xmlHttp5.open("GET", url, true);
			xmlHttp5.send(null);
		}
		function countryChangedchapters()
		{
			if (xmlHttp5.readyState==4 || xmlHttp5.readyState=="complete")
			{
				document.getElementById("chapterselectbox").innerHTML=xmlHttp5.responseText
			}
		}
		
		
		
	<!--Addin chapter actions compleated-->
		
	
	<!-- Search chapters -->
	
	function getallsubjects(countryid,getselected)
		{   
			
			url="?pid=38&action=classwisesubjectstwo&cid="+countryid+"&selval="+getselected;
			url=url+"&sid="+Math.random();
			xmlHttp3=GetXmlHttpObject(countryChangedtwo);
			xmlHttp3.open("GET", url, true);
			xmlHttp3.send(null);
		}
		
		function countryChangedtwo()
		{
			if (xmlHttp3.readyState==4 || xmlHttp3.readyState=="complete")
			{
				document.getElementById("subject2selectbox").innerHTML=xmlHttp3.responseText
			}
		}
	
		function getunits2(subjectid,selval)
		{   
			url="?pid=38&action=classwiseunits2&subjectid="+subjectid+"&selval="+selval;
			url=url+"&sid="+Math.random();
			xmlHttp4=GetXmlHttpObject(countryChangedunits2);
			xmlHttp4.open("GET", url, true);
			xmlHttp4.send(null);
		}
		function countryChangedunits2()
		{
			if (xmlHttp4.readyState==4 || xmlHttp4.readyState=="complete")
			{
				document.getElementById("unitselectbox2").innerHTML=xmlHttp4.responseText
			}
		}
		
		function getchapterstwo(unit_id,selval)
		{   
			url="?pid=38&action=chpaters2&unit_id="+unit_id+"&selval="+selval;
			url=url+"&sid="+Math.random();
			xmlHttp7=GetXmlHttpObject(countryChangedunits3);
			xmlHttp7.open("GET", url, true);
			xmlHttp7.send(null);
		}
		function countryChangedunits3()
		{
			if (xmlHttp7.readyState==4 || xmlHttp7.readyState=="complete")
			{
				document.getElementById("chapterselectbox2").innerHTML=xmlHttp7.responseText
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
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Tutorial Management</span></td>
              </tr>	
               <tr>
					    <td  class="bgcolor_02"></td>
                <td height="5"   ></td>
				 <td  class="bgcolor_02"></td>
              </tr>		  
			   <tr>
			   <td  class="bgcolor_02"></td>
			  <td align="right" valign="top"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font>
			          <br /></td>
					  <td  class="bgcolor_02"></td>
					  </tr>	
					   <tr>
					    <td  class="bgcolor_02"></td>
                <td height="5"   ></td>
				 <td  class="bgcolor_02"></td>
              </tr>		  
             
			  	<tr>
				 <td  class="bgcolor_02"></td>
                <td height="10" align="right"><form action="?pid=36"  method="post"><input type="submit" class="bgcolor_02" name="addtutorial" value="Add Tutorial" />&nbsp;</form></td>
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
                          </select><font color="#FF0000"><b>*</b></font>
                         
                          </td>
                  </tr>
                             <tr height="25" >
                               <td width="7%" align="left" class="narmal">&nbsp;</td>
                               <td width="15%" align="left" class="narmal">Subject</td>
                              <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="77%" align="left" class="narmal" id="subject2selectbox"><select name="subjectid"  ><option value="">- Select -</option></select> <font color="#FF0000"><b>*</b></font></td>
                  </tr>
				  <?php if($classesid!=""){ ?>
                              <script type="text/javascript">
							  getallsubjects('<?php echo $classesid; ?>','<?php echo $subjectid; ?>')
							  </script>
                              
                              
                              <?php } ?>
				 		 <tr height="25" >
                               <td width="7%" align="left" class="narmal">&nbsp;</td>
                               <td width="15%" align="left" class="narmal">Unit </td>
                           <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="77%" align="left" class="narmal" id="unitselectbox2"><select name="unit_id"><option value="">- Select -</option></select> 
							  <?php if($subjectid!=""){ ?>
                              <script type="text/javascript">
							  getunits2('<?php echo $subjectid; ?>','<?php echo $unit_id; ?>')
							  </script>
							  <?php }?><font color="#FF0000"><b>*</b></font></td>
							 
                  </tr>
				  
				   <tr height="25" >
                               <td width="7%" align="left" class="narmal">&nbsp;</td>
                               <td width="15%" align="left" class="narmal">Chapter&nbsp;</td>
                     <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="77%" align="left" class="narmal" id="chapterselectbox2"><select name="chapter_id" ><option value="">- Select -</option></select> <?php if($unit_id!=""){ ?>
                              <script type="text/javascript">
							  getchapterstwo('<?php echo $unit_id; ?>','<?php echo $chapter_id; ?>')
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
                      <td width="7%" align="left" class="admin">&nbsp;S.No</td>
                      <td width="15%" align="left" class="admin">Unit </td>
                      <td width="17%" align="left" class="admin">Chapter</td>
                      <td width="23%" align="left" class="admin">Tutorial</td>
					  <td width="19%" align="left" class="admin">Created By</td>
                      <td width="19%" align="center" class="admin">Action</td>
                    </tr>
                    <?php if(count($unitsarr)>0){
					$irow=0;
					foreach($unitsarr as $eachrecord){
					$irow++;
					 ?>
                    <tr height="25">
                      <td align="left" width="7%" class="narmal">&nbsp;<?php echo $irow; ?></td>
                      <td align="left" width="15%" class="narmal"><?php echo $eachrecord['unit_name']; ?></td>
                      <td align="left" width="17%" class="narmal"><?php echo $eachrecord['chapter_name']; ?></td>
                      <td align="left" width="23%" class="narmal"><?php echo $eachrecord['title']; ?></td>
					  <td align="left" width="19%" class="narmal"><?php 
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
                      <td align="center" width="19%" class="narmal">
                       <a href="?pid=36&action=createnew&tutid=<?php echo $eachrecord['tut_id']; ?>&classesid=<?php echo $eachrecord['es_classesid']; ?>&subjectid=<?php echo $eachrecord['es_subjectid']; ?>&unit_id=<?php echo $eachrecord['unit_id']; ?>&chapter_id=<?php echo $eachrecord['chapter_id']; ?>" ><img src="images/add_16.png" border="0" title="Create a copy" alt="Create New" /></a>&nbsp;<?php /*?><a href="?pid=36&action=edit&tutid=<?php echo $eachrecord['tut_id']; ?>&classesid=<?php echo $eachrecord['es_classesid']; ?>&subjectid=<?php echo $eachrecord['es_subjectid']; ?>&unit_id=<?php echo $eachrecord['unit_id']; ?>&chapter_id=<?php echo $eachrecord['chapter_id']; ?>" ><img src="images/b_edit.png" border="0" title="Edit" alt="Edit" /></a><?php */?>
					  <a href="?pid=36&action=viewtutorial&tutid=<?php echo $eachrecord['tut_id']; ?>&classesid=<?php echo $eachrecord['es_classesid']; ?>&subjectid=<?php echo $eachrecord['es_subjectid']; ?>&unit_id=<?php echo $eachrecord['unit_id']; ?>&chapter_id=<?php echo $eachrecord['chapter_id']; ?>" ><img src="images/b_browse.png" border="0" title="View" alt="View" /></a>&nbsp;
					  
					  <?php /*?><a href="?pid=60&action=deletetutorial&tutid=<?php echo $eachrecord['tut_id']; ?>&classesid=<?php echo $eachrecord['es_classesid']; ?>&subjectid=<?php echo $eachrecord['es_subjectid']; ?>&unit_id=<?php echo $eachrecord['unit_id']; ?>&chapter_id=<?php echo $eachrecord['chapter_id']; ?>" onClick="return confirm('Are you sure you want to delete ?')"><img src="images/b_drop.png" border="0" title="Delete" alt="Delete" /></a><?php */?>
					  &nbsp;&nbsp;<a href="javascript: void(0)" onclick="popup_letter('?pid=36&action=print_view&tutid=<?php echo $eachrecord['tut_id']; ?><?php echo $PageUrl;?>')" ><img src="images/print_16.png" border="0" title="Print " alt="Print" /></a>	 </td>
                    </tr>       
                    
					<?php } ?>
					 <tr height="25">
                      <td align="center" colspan="6" class="narmal"><input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=36&action=print_list<?php echo $PageUrl;?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /></td>
                    </tr>
                    
					
					<?php } else { ?> 
					 <tr height="25">
                      <td align="center" colspan="6" class="narmal">No Records Found</td>
                    </tr>
                    
                    <?php }  ?>
                </table>
				
				</td>
                <td width="1" class="bgcolor_02">
				</td>
              </tr>
			   <tr>
                <td height="1" colspan="3" class="bgcolor_02"  ></td>
              </tr>	
			  
   
</table>

<?php } ?>

<?php if($action == 'add'  || $action=='createnew') { ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">

				 
              <tr>
         <td height="2" colspan="3"></td>
	 </tr>	
               	  
               <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Tutorial Management</span></td>
              </tr>	
			  <tr>
			   <td  class="bgcolor_02"></td>
			  <td align="right" valign="top"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font>
			          <br /></td>
					  <td  class="bgcolor_02"></td>
					  </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="center" valign="top"><br />
                <form method="post" name="addun" action="" enctype="multipart/form-data">
				<table width="90%" border="0" cellpadding="2" cellspacing="0">
                            <tr height="25" >
                              <td width="13%" align="left" class="narmal">Class</td>
                              <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="86%" align="left" class="narmal">
							  <select name="es_classesid" onchange="getsubjects(this.value,'')">
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
                              <td width="86%" align="left" class="narmal" id="subjectselectbox">
							  
							  <select name="es_subjectid"><option value="">- Select -</option></select><font color="#FF0000"><b>*</b></font> </td>
                  </tr>
                             <tr height="25" >
                               <td width="13%" align="left" class="narmal"> <?php if($es_classesid!=""){ ?>
							<script type="text/javascript">
							getsubjects('<?php echo $es_classesid; ?>','<?php echo $es_subjectid; ?>');
							</script>
							<?php } ?>							Unit </td>
                              <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="86%" align="left" class="narmal" id="unitselectbox"><select name="unit_id" ><option value="">- Select -</option></select>
							  <?php if($es_subjectid!=""){ ?>
							<script type="text/javascript">
							getunits('<?php echo $es_subjectid; ?>','<?php echo $unit_id; ?>');
							</script>
							<?php } ?><font color="#FF0000"><b>*</b></font></td>
                  </tr>
				   
				  <tr height="25" >
                               <td width="13%" align="left" class="narmal">Chapter&nbsp;</td>
                    <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="86%" align="left" class="narmal" id="chapterselectbox"><select name="chapter_id" ><option value="">- Select -</option></select><font color="#FF0000"><b>*</b></font></td>
                  </tr>
				  <?php if($unit_id!=""){ ?>
							<script type="text/javascript">
							getchapters('<?php echo $unit_id; ?>','<?php echo $chapter_id; ?>');
							</script>
							<?php } ?>
							
							
							 <tr height="25" >
                               <td width="13%" align="left" class="narmal">Title</td>
                              <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="86%" align="left" class="narmal" ><?php echo $html_obj->draw_inputfield('title',$rs_editphoto['title']); ?><font color="#FF0000"><b>*</b></font></td>
                  </tr>
				  
				   <tr height="25" >
                               <td width="13%" align="left" class="narmal"> File</td>
                              <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="86%" align="left" class="narmal"><?php echo $html_obj->draw_inputfield('file_path','','file',''); ?><font color="#FF0000"><b>*</b></font></td>
                  </tr>
                  <?php if($action=='createnew' && $viewtutorial['file_path']!=""){?>
                  <tr height="25" >
                               <td width="13%" align="left" class="narmal"></td>
                              <td width="1%" align="left" class="narmal"></td>							   
                              <td width="86%" align="left" class="narmal"><a href="?pid=36&downloadfile=<?php echo $viewtutorial['file_path']; ?>" class="video_link" title="Download"><?php echo RemoveDateFromFilename($viewtutorial['file_path']);?></a><input type="checkbox" name="old_file"  value="YES" checked="checked"/>
							  
							  </td>
                  </tr>
                  <?php }?>
				  
				  <tr height="25" >
				     <td align="left" class="narmal">Introduction&nbsp;&&nbsp;Objective</td>
				     <td align="left" class="narmal">&nbsp;</td>
				     <td align="left" class="narmal">&nbsp;</td>
			      </tr>
				   <tr height="25" >
                               <td colspan="3" align="left" class="narmal"><?php $sBasePath = $_SERVER['PHP_SELF'] ;
																			  $sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "?pid" ) ) ;
																			  $sBasePath = $sBasePath."includes/js/fckeditor/";
																			  $oFCKeditor = new FCKeditor('tut_desc') ;
																			  $oFCKeditor->BasePath	= $sBasePath ;
																			  $oFCKeditor->Height	= 300;
																			  $oFCKeditor->Width	= 550;
																			  $oFCKeditor->Value	= $tut_desc;
																			  $oFCKeditor->Create() ;
																		?></td>
                  </tr>
				  
				    <tr height="25" >
				     <td align="left" class="narmal">Lesson</td>
				     <td align="left" class="narmal">&nbsp;</td>
				     <td align="left" class="narmal">&nbsp;</td>
			      </tr>
				   <tr height="25" >
                               <td colspan="3" align="left" class="narmal"><?php $sBasePath = $_SERVER['PHP_SELF'] ;
																			  $sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "?pid" ) ) ;
																			  $sBasePath = $sBasePath."includes/js/fckeditor/";
																			  $oFCKeditor1 = new FCKeditor('lesson') ;
																			  $oFCKeditor1->BasePath	= $sBasePath ;
																			  $oFCKeditor1->Height	= 300;
																			   $oFCKeditor1->Width	= 550;
																			  $oFCKeditor1->Value	= $lesson;
																			  $oFCKeditor1->Create() ;
																		?></td>
                  </tr>
				  
				    <tr height="25" >
				     <td align="left" class="narmal">Summary</td>
				     <td align="left" class="narmal">&nbsp;</td>
				     <td align="left" class="narmal">&nbsp;</td>
			      </tr>
				   <tr height="25" >
                               <td colspan="3" align="left" class="narmal"><?php $sBasePath = $_SERVER['PHP_SELF'] ;
																			  $sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "?pid" ) ) ;
																			  $sBasePath = $sBasePath."includes/js/fckeditor/";
																			  $oFCKeditor2 = new FCKeditor('summary') ;
																			  $oFCKeditor2->BasePath	= $sBasePath ;
																			  $oFCKeditor2->Height	= 300;
																			   $oFCKeditor2->Width	= 550;
																			  $oFCKeditor2->Value	= $summary;
																			  $oFCKeditor2->Create() ;
																		?></td>
                  </tr>
							<tr height="25">
							  <td align="left" width="13%" class="narmal"></td>
                             
							 
							
							  <td align="left" width="1%" class="narmal"></td>
							  <td align="left" width="86%" class="narmal"><input type="submit" class="bgcolor_02" name="addchapter" value="Add" /></td>
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
<?php if($action == 'edit' ) { ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">

				 
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>	<tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;&nbsp;<span class="admin">Tutorial Management</span></td>
              </tr>	
               <tr>
                <td width="1px" class="bgcolor_02" ></td>
                <td align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font><br /></td>
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
                              <td width="86%" align="left" class="narmal">
							  <select name="es_classesid" onchange="getsubjects(this.value,'')">
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
                              <td width="86%" align="left" class="narmal" id="subjectselectbox">
							  
							  <select name="es_subjectid"><option value="">- Select -</option></select><font color="#FF0000">&nbsp;*</font>						  </td>
                  </tr>
                             <tr height="25" >
                               <td width="13%" align="left" class="narmal"> <?php if($es_classesid!=""){ ?>
							<script type="text/javascript">
							getsubjects('<?php echo $es_classesid; ?>','<?php echo $es_subjectid; ?>');
							</script>
							<?php } ?>							Unit </td>
                              <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="86%" align="left" class="narmal" id="unitselectbox"><select name="unit_id" ><option value="">- Select -</option></select><font color="#FF0000">&nbsp;*</font>
							  <?php if($es_subjectid!=""){ ?>
							<script type="text/javascript">
							getunits('<?php echo $es_subjectid; ?>','<?php echo $unit_id; ?>');
							</script>
							<?php } ?>							  </td>
                  </tr>
				   
				  <tr height="25" >
                               <td width="13%" align="left" class="narmal">Chapter&nbsp;</td>
                    <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="86%" align="left" class="narmal" id="chapterselectbox"><select name="chapter_id" ><option value="">- Select -</option></select><font color="#FF0000">&nbsp;*</font></td>
                  </tr>
				  <?php if($unit_id!=""){ ?>
							<script type="text/javascript">
							getchapters('<?php echo $unit_id; ?>','<?php echo $chapter_id; ?>');
							</script>
							<?php } ?>
							
							
							 <tr height="25" >
                               <td width="13%" align="left" class="narmal">Title</td>
                              <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="86%" align="left" class="narmal" ><?php echo $html_obj->draw_inputfield('title'); ?><font color="#FF0000">&nbsp;*</font></td>
                  </tr>
				  
				  
                   <tr height="25" >
                               <td width="13%" align="left" class="narmal">Upload File</td>
                              <td width="1%" align="left" class="narmal"></td>							   
                              <td width="86%" align="left" class="narmal"><?php echo $html_obj->draw_inputfield('file_path','','file',''); ?>&nbsp;(OR)<font color="#FF0000">&nbsp;*</font><br />(Note : Valid format pdf,doc,docx)</td>
                  </tr>
				 
                  <tr height="25" >
                               <td width="13%" align="left" class="narmal"></td>
                              <td width="1%" align="left" class="narmal"></td>							   
                              <td width="86%" align="left" class="narmal"><a href="?pid=60&downloadfile=<?php echo $old_file; ?>" class="video_link" title="Download"><?php echo RemoveDateFromFilename($old_file);?></a><input type="hidden" name="old_file"  value="<?php echo $old_file; ?>"/>
							  
							  </td>
                  </tr>
                  
				   <tr height="25" >
				     <td align="left" class="narmal">Introduction&nbsp;&&nbsp;Objective</td>
				     <td align="left" class="narmal">&nbsp;</td>
				     <td align="left" class="narmal">&nbsp;</td>
			      </tr>
				   <tr height="25" >
                               <td colspan="3" align="left" class="narmal"><?php $sBasePath = $_SERVER['PHP_SELF'] ;
																			  $sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "?pid" ) ) ;
																			  $sBasePath = $sBasePath."includes/js/fckeditor/";
																			  $oFCKeditor = new FCKeditor('tut_desc') ;
																			  $oFCKeditor->BasePath	= $sBasePath ;
																			  $oFCKeditor->Height	= 300;
																			  $oFCKeditor->Width	= 550;
																			  $oFCKeditor->Value	= $tut_desc;
																			  $oFCKeditor->Create() ;
																		?></td>
                  </tr>
				  
				    <tr height="25" >
				     <td align="left" class="narmal">Lesson</td>
				     <td align="left" class="narmal">&nbsp;</td>
				     <td align="left" class="narmal">&nbsp;</td>
			      </tr>
				   <tr height="25" >
                               <td colspan="3" align="left" class="narmal"><?php $sBasePath = $_SERVER['PHP_SELF'] ;
																			  $sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "?pid" ) ) ;
																			  $sBasePath = $sBasePath."includes/js/fckeditor/";
																			  $oFCKeditor1 = new FCKeditor('lesson') ;
																			  $oFCKeditor1->BasePath	= $sBasePath ;
																			  $oFCKeditor1->Height	= 300;
																			   $oFCKeditor1->Width	= 550;
																			  $oFCKeditor1->Value	= $lesson;
																			  $oFCKeditor1->Create() ;
																		?></td>
                  </tr>
				  
				    <tr height="25" >
				     <td align="left" class="narmal">Summary</td>
				     <td align="left" class="narmal">&nbsp;</td>
				     <td align="left" class="narmal">&nbsp;</td>
			      </tr>
				   <tr height="25" >
                               <td colspan="3" align="left" class="narmal"><?php $sBasePath = $_SERVER['PHP_SELF'] ;
																			  $sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "?pid" ) ) ;
																			  $sBasePath = $sBasePath."includes/js/fckeditor/";
																			  $oFCKeditor2 = new FCKeditor('summary') ;
																			  $oFCKeditor2->BasePath	= $sBasePath ;
																			  $oFCKeditor2->Height	= 300;
																			   $oFCKeditor2->Width	= 550;
																			  $oFCKeditor2->Value	= $summary;
																			  $oFCKeditor2->Create() ;
																		?></td>
                  </tr>
							<tr height="25">
							  <td align="left" width="13%" class="narmal"></td>
                             
							 
							
							  <td align="left" width="1%" class="narmal"></td>
							  <td align="left" width="86%" class="narmal"><input type="submit" class="bgcolor_02" name="updatetutorial" value="Update" /></td>
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

<?php  if($action=="viewtutorial" || $action=='print_view'){?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">

				 
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>	<tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Tutorial Management</span></td>
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
                              <td width="13%" height="27" align="left" class="narmal">Unit&nbsp; </td>
                              <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="86%" align="left" valign="middle" class="narmal"><?php echo $viewtutorial['unit_name']; ?></td>
                  </tr>
				  
                             <tr height="25" >
                               <td width="13%" align="left" class="narmal" height="27">Chapter&nbsp; </td>
                               <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="86%" align="left" valign="middle" class="narmal"><?php echo $viewtutorial['chapter_name']; ?></td>
                  </tr>
                             <tr height="25" >
                               <td width="13%" align="left" class="narmal" height="27"> Title </td>
                               <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="86%" align="left" valign="middle" class="narmal"><?php echo $viewtutorial['title']; ?></td>
                  </tr>
				   <?php if($viewtutorial['tut_desc']!=""){ ?>
				  <tr height="25" >
                               <td width="13%" align="left" class="narmal" height="27">Introduction&nbsp;&&nbsp;Objective</td>
                               <td width="1%" align="left" class="narmal">:</td>							   
                               <td width="86%" align="left" valign="middle" class="narmal"><?php echo $viewtutorial['tut_desc']; ?></td>
				  </tr>
				   <?php } if($viewtutorial['lesson']!=""){ ?>
				  <tr height="25" >
                               <td width="13%" align="left" class="narmal" height="27">Lesson</td>
                               <td width="1%" align="left" class="narmal">:</td>							   
                               <td width="86%" align="left" valign="middle" class="narmal"><?php echo $viewtutorial['lesson']; ?></td>
				  </tr>
				  
				   <?php  } if($viewtutorial['summary']!=""){ ?>
				  <tr height="25" >
                               <td width="13%" align="left" class="narmal" height="27">Summary</td>
                               <td width="1%" align="left" class="narmal">:</td>							   
                               <td width="86%" align="left" valign="middle" class="narmal"><?php echo $viewtutorial['summary']; ?></td>
				  </tr>
				  <?php } if($viewtutorial['file_path']!=""){ ?>
				  	   <tr height="25" >
                               <td width="13%" align="left" class="narmal" height="27">File&nbsp;Download</td>
                              <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="86%" align="left" class="narmal"><a href="?pid=36&downloadfile=<?php echo $viewtutorial['file_path']; ?>" title="Download" class="video_link"><?php echo RemoveDateFromFilename($viewtutorial['file_path']);?></a>
</td>
                  </tr>
				  <?php }?>
                   <tr height="25" >
                               <td width="13%" align="left" class="narmal" height="27">Added By</td>
                               <td width="1%" align="left" class="narmal">:</td>							   
                     <td width="86%" align="left" class="narmal"><?php echo $username; ?> (<?php echo $viewtutorial['user_type']; ?>)</td>
                  </tr>
				  <?php if($action=='viewtutorial'){?>
				   <tr height="25" >
                               <td width="13%" align="left" class="narmal">&nbsp;</td>
                               <td width="1%" align="left" class="narmal">&nbsp;</td>							   
                               <td width="86%" align="left" class="narmal"><a href="?pid=36&action=list&tutid=<?php echo $tutid; ?>&classesid=<?php echo $classesid ;?>&subjectid=<?php echo $subjectid;?>&unit_id=<?php echo $unit_id;?>&chapter_id=<?php echo $chapter_id; ?>&searchunit=<?php echo "Submit";?>" class="bgcolor_02" style="padding:3px; text-decoration:none;"> Back</a></td>
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
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Tutorials</strong></td>
              </tr>
			  <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top"><br />
				<p align="left"><b>Class :</b><?php echo classname($classesid);?></p>
				<table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr height="25" class="bgcolor_02">
                      <td width="9%" align="left" class="admin">&nbsp;S.No</td>
					  <td width="16%" align="left" class="admin">&nbsp;Subject Name</td>
                      <td width="20%" align="left" class="admin">Unit Name </td>
                      <td width="21%" align="left" class="admin">Chapter</td>
                      <td width="17%" align="left" class="admin">Tutorial</td>
					  <td width="17%" align="left" class="admin">Created By</td>
                      
                    </tr>
                    <?php if(count($unitsarr)>0){
					$irow=0;
					foreach($unitsarr as $eachrecord){
					$irow++;
					 ?>
                    <tr height="25">
                      <td align="left" width="9%" class="narmal">&nbsp;<?php echo $irow; ?></td>
					  <td align="left" width="16%" class="narmal"><?php echo subjectname($eachrecord['es_subjectid']); ?></td>
                      <td align="left" width="20%" class="narmal"><?php echo $eachrecord['unit_name']; ?></td>
                      <td align="left" width="21%" class="narmal"><?php echo $eachrecord['chapter_name']; ?></td>
                      <td align="left" width="17%" class="narmal"><?php echo $eachrecord['title']; ?></td>
					  <td align="left" width="17%" class="narmal"><?php 
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
                      
                    </tr>       
                    
					<?php } ?>
					                   
					
					<?php } else { ?> 
					 <tr height="25">
                      <td align="center" colspan="5" class="narmal">No Records Found</td>
                    </tr>
                    
                    <?php }  ?>
                </table>

				</td>
				
                <td width="1" class="bgcolor_02"></td>
              </tr>
              
                <td height="1" colspan="3" class="bgcolor_02"></td>
                </tr>
            </table>
<?php }?>