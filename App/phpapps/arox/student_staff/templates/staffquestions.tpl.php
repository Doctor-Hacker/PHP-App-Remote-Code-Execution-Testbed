<?php 
	/**
* Only Admin users can view the pages
*/
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
<?php if($action == 'list') { ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">

				<tr>
         <td height="3" colspan="3"></td>
	 </tr>	
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Question Bank Management</span></td>
              </tr>
               <tr>
                <td width="1px" class="bgcolor_02" ></td>
                <td height="25" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font><br /></td>
                 <td width="1px" class="bgcolor_02" ></td></td>
              </tr>
               <tr>
                <td width="1px" class="bgcolor_02" ></td>
                <td align="right" height="25"><form action="?pid=39"  method="post"><input type="submit" class="bgcolor_02" name="addtutorial" value="Add Question" />&nbsp;</form></td>
                 <td width="1px" class="bgcolor_02" ></td></td>
              </tr>	         		  
             
			  	
			   		  
               <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;<span class="admin">Questions</span><span class="admin"> List</span></td>
              </tr>
			   
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td  align="center" valign="top">
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
                              <td width="77%" align="left" class="narmal" id="subject2selectbox"><select name="subjectid"  ><option value="">- Select -</option></select><font color="#FF0000">&nbsp;*</font> </td>
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
                              <td width="77%" align="left" class="narmal" id="unitselectbox2"><select name="unit_id"><option value="">- Select -</option></select><font color="#FF0000">&nbsp;*</font>
							  <?php if($subjectid!=""){ ?>
                              <script type="text/javascript">
							  getunits2('<?php echo $subjectid; ?>','<?php echo $unit_id; ?>')
							  </script>
							  <?php }?>
							  </td>
							 
                  </tr>
				  
				   <tr height="25" >
                               <td width="7%" align="left" class="narmal">&nbsp;</td>
                               <td width="15%" align="left" class="narmal">Chapter&nbsp;</td>
                     <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="77%" align="left" class="narmal" id="chapterselectbox2"><select name="chapter_id" ><option value="">- Select -</option></select><font color="#FF0000">&nbsp;*</font> 
							  
							   <?php if($unit_id!=""){ ?>
                              <script type="text/javascript">
							  getchapterstwo('<?php echo $unit_id; ?>','<?php echo $chapter_id; ?>')
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
                      <td width="6%" align="left" class="admin">&nbsp;S.No</td>
                      <td width="19%" align="left" class="admin">Unit  </td>
                      <td width="19%" align="left" class="admin">Chapter</td>
                      <td width="21%" align="left" class="admin">Question</td>
					  <td width="19%" align="left" class="admin">Created By</td>
                      <td width="16%" align="left" class="admin">Action&nbsp;</td>
                    </tr>
                    <?php if(count($unitsarr)>0){
					$irow=0;
					foreach($unitsarr as $eachrecord){
					$irow++;
					 ?>
                    <tr height="25">
                      <td align="left" width="6%" class="narmal">&nbsp;<?php echo $irow; ?></td>
                      <td align="left" width="19%" class="narmal"><?php echo $eachrecord['unit_name']; ?></td>
                      <td align="left" width="19%" class="narmal"><?php echo $eachrecord['chapter_name']; ?></td>
                      <td align="left" width="21%" class="narmal"><?php echo $eachrecord['question']; ?></td>
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
                      <td align="left" width="16%" class="narmal"><?php /*?><a href="?pid=39&action=edit&tutid=<?php echo $eachrecord['q_id']; ?>&es_classesid=<?php echo $eachrecord['es_classesid']; ?>&es_subjectid=<?php echo $eachrecord['es_subjectid']; ?>&unit_id=<?php echo $eachrecord['unit_id']; ?>&chapter_id=<?php echo $eachrecord['chapter_id']; ?>" ><img src="images/b_edit.png" border="0" title="Edit" alt="Edit" /></a><?php */?>&nbsp;
					  <a href="?pid=39&action=viewtutorial&tutid=<?php echo $eachrecord['q_id']; ?>&classesid=<?php echo $eachrecord['es_classesid']; ?>&subjectid=<?php echo $eachrecord['es_subjectid']; ?>&unit_id=<?php echo $eachrecord['unit_id']; ?>&chapter_id=<?php echo $eachrecord['chapter_id']; ?>" ><img src="images/b_browse.png" border="0" title="View" alt="View" /></a>&nbsp;&nbsp;<a href="javascript: void(0)" onclick="popup_letter('?pid=39&action=print_view&tutid=<?php echo $eachrecord['q_id']; ?>&classesid=<?php echo $eachrecord['es_classesid']; ?>&subjectid=<?php echo $eachrecord['es_subjectid']; ?>&unit_id=<?php echo $eachrecord['unit_id']; ?>&chapter_id=<?php echo $eachrecord['chapter_id']; ?>')" ><img src="images/print_16.png" border="0" title="Print " alt="Print" /></a>
					  
					  <?php /*?><a href="?pid=39&action=deletetutorial&tutid=<?php echo $eachrecord['q_id']; ?>&classesid=<?php echo $eachrecord['es_classesid']; ?>&subjectid=<?php echo $eachrecord['es_subjectid']; ?>&unit_id=<?php echo $eachrecord['unit_id']; ?>&chapter_id=<?php echo $eachrecord['chapter_id']; ?>" onClick="return confirm('Are you sure you want to delete ?')"><img src="images/b_drop.png" border="0" title="Delete" alt="Delete" /></a><?php */?></td>
                    </tr>       
                    
					<?php }?>
					<tr height="25">
                      <td align="center" colspan="6" class="narmal"><input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=39&action=print_list<?php echo $PageUrl;?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /></td>
                    </tr>
					<?php  } else { ?> 
					 <tr height="25">
                      <td align="center" colspan="5" class="narmal">No Records Found</td>
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

<?php if($action == 'add' || $action=="edit") { ?>
<script type="text/javascript">
function showtable(){
	if(document.getElementById("feed_dis_1").checked) {
		document.getElementById("feedback").style.display = "block";
	}
	else {
		document.getElementById("feedback").style.display = "none";
	}
}
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">

				 
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>	<tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Add Question</span></td>
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
                               <td width="13%" align="left" class="narmal">Question</td>
                              <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="86%" align="left" class="narmal" ><?php echo $html_obj->draw_textarea('question',$rs_editphoto['question']); ?><font color="#FF0000">&nbsp;*</font></td>
                  </tr>
				  
				  <tr height="25" >
                               <td width="13%" align="left" class="narmal">A)</td>
                              <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="86%" align="left" class="narmal" ><?php echo $html_obj->draw_textarea('choice_1',$rs_editphoto['choice_1']); ?><font color="#FF0000">&nbsp;*</font></td>
                  </tr>
				  <tr height="25" >
                               <td width="13%" align="left" class="narmal">B)</td>
                              <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="86%" align="left" class="narmal" ><?php echo $html_obj->draw_textarea('choice_2',$rs_editphoto['choice_2']); ?><font color="#FF0000">&nbsp;*</font></td>
                  </tr>
				  <tr height="25" >
                               <td width="13%" align="left" class="narmal">C)</td>
                              <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="86%" align="left" class="narmal" ><?php echo $html_obj->draw_textarea('choice_3',$rs_editphoto['choice_3']); ?><font color="#FF0000">&nbsp;*</font></td>
                  </tr>
				  <tr height="25" >
                               <td width="13%" align="left" class="narmal">D)</td>
                              <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="86%" align="left" class="narmal" ><?php echo $html_obj->draw_textarea('choice_4',$rs_editphoto['choice_4']); ?><font color="#FF0000">&nbsp;*</font></td>
                  </tr>
				  <tr height="25" >
                               <td width="13%" align="left" class="narmal">Correct&nbsp;Answer</td>
                               <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="86%" align="left" class="narmal" >
							  <table width="100%" border="0">
							  <?php 
							   if(!isset($answer) && $answer=="" || $answer=='D'){$d = "checked='checked'";}
							   if(isset($answer) && $answer=='A'){$a = "checked='checked'";}
							   if(isset($answer) && $answer=='B'){$b = "checked='checked'";}
							   if(isset($answer) && $answer=='C'){$c = "checked='checked'";}
							  ?>
  <tr>
    <td>A&nbsp;<?php echo $html_obj->draw_radiobutton('answer','A','',$a); ?></td>
    <td>B&nbsp;<?php echo $html_obj->draw_radiobutton('answer','B','',$b); ?></td>
    <td>C&nbsp;<?php echo $html_obj->draw_radiobutton('answer','C','',$c); ?></td>
    <td>D&nbsp;<?php echo $html_obj->draw_radiobutton('answer','D','',$d); ?>&nbsp;<font color="#FF0000">&nbsp;*</font></td>
  </tr>
</table>
                            </td>
                  </tr>
				   <tr height="25" >
                               <td width="13%" align="left" class="narmal" colspan="3">Display Feedback Details to Students&nbsp;:</td>
                              						   
                                                </tr>
				  <tr height="25" >
                               <td width="13%" align="left" class="narmal"></td>
                               <td width="1%" align="left" class="narmal"></td>							   
                              <td width="86%" align="left" class="narmal" >
							  <table width="50%" border="0">
							  <?php 
							   if((!isset($feed_dis) || $feed_dis=="") || $feed_dis=='No'){$a = "checked='checked'";$b = "";}
							   if(isset($feed_dis) && $feed_dis=='Yes'){$b = "checked='checked'";$a = "";}
							  
							  ?>
							  <tr>
								<td><input type="radio" name="feed_dis" id="feed_dis_1" value="Yes" <?php echo $b;?> onclick="showtable();" />&nbsp;Yes</td>
								<td><input type="radio" name="feed_dis" id="feed_dis_2" value="No" <?php echo $a;?> onclick="showtable();" />&nbsp;No</td>
							  </tr>
							  <?php if($feed_dis=="Yes"){?>
							  <script>showtable();</script>
							  <?php }?>
							</table>
                            </td>
                  </tr>
				  <tr><td colspan="3">
				  <div id="feedback" style="display:<?php if($a!="") echo "none"; else "block"; ?>;">
				  <table border="0" width="100%" >
				   <tr height="25" >
                     <td width="35%" align="left" class="narmal">Feedback for Correct answer</td>
                              <td width="2%" align="left" class="narmal">:</td>							   
                              <td width="63%" align="left" class="narmal" ><?php echo $html_obj->draw_textarea('correct_ans',$rs_editphoto['correct_ans']); ?></td>
                  </tr>
				  <tr height="25" >
                               <td width="35%" align="left" class="narmal">Feedback for Wrong answer</td>
                              <td width="2%" align="left" class="narmal">:</td>							   
                              <td width="63%" align="left" class="narmal" ><?php echo $html_obj->draw_textarea('wrong_ans',$rs_editphoto['wrong_ans']); ?></td>
                  </tr>
				  </table>
				  </div>
				  <script language="javascript" type="text/javascript">
				  	showtable();
				  </script>
				  </td>
				  </tr>
				  
				  
                  
				   
							<tr height="25">
							  <td align="left" width="13%" class="narmal"></td>
                             
							 
							
							  <td align="left" width="1%" class="narmal"></td>
							  <td align="left" width="86%" class="narmal">
							  
							  <?php if($action=="add"){?>
							  <input type="submit" class="bgcolor_02" name="addchapter" value="Add" />
							  <?php }else{?>  <input type="submit" class="bgcolor_02" name="updatequestion" value="Update" /><?php }?>
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
               <tr>
                <td height="5" colspan="3"  ></td>
              </tr>	             
              
              
             
   
</table>

<?php } ?>

<?php  if($action=="viewtutorial" || $action=='print_view'){?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">

				 
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>			  
               <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">View Question</span></td>
              </tr>	
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="center" valign="top"><table width="95%"  border="0" cellpadding="2" cellspacing="0">
				
				  <tr height="25" >
                              <td width="35%" height="27" align="left" class="narmal">Class&nbsp; </td>
                              <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="64%" align="left" valign="middle" class="narmal"><?php echo classname($viewtutorial['es_classesid']); ?></td>
                  </tr>
				  <tr height="25" >
                              <td width="35%" height="27" align="left" class="narmal">Subject&nbsp; </td>
                              <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="64%" align="left" valign="middle" class="narmal"><?php echo subjectname($viewtutorial['es_subjectid']); ?></td>
                  </tr>
                            <tr height="25" >
                              <td width="35%" height="27" align="left" class="narmal">Unit&nbsp; </td>
                              <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="64%" align="left" valign="middle" class="narmal"><?php echo $viewtutorial['unit_name']; ?></td>
                  </tr>
				  
                             <tr height="25" >
                               <td width="35%" align="left" class="narmal">Chapter&nbsp; </td>
                               <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="64%" align="left" valign="middle" class="narmal"><?php echo $viewtutorial['chapter_name']; ?></td>
                  </tr>
                             <tr height="25" >
                               <td width="35%" align="left" class="narmal"> Question </td>
                               <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="64%" align="left" valign="middle" class="narmal"><?php echo $viewtutorial['question']; ?></td>
                  </tr>
				  <tr height="25" >
                               <td width="35%" align="left" class="narmal">A)</td>
                               <td width="1%" align="left" class="narmal">:</td>							   
                               <td width="64%" align="left" valign="middle" class="narmal"><?php echo $viewtutorial['choice_1']; ?></td>
				  </tr>
				   <tr height="25" >
                               <td width="35%" align="left" class="narmal">B)</td>
                               <td width="1%" align="left" class="narmal">:</td>							   
                               <td width="64%" align="left" valign="middle" class="narmal"><?php echo $viewtutorial['choice_2']; ?></td>
				  </tr>
				   <tr height="25" >
                               <td width="35%" align="left" class="narmal">C)</td>
                               <td width="1%" align="left" class="narmal">:</td>							   
                               <td width="64%" align="left" valign="middle" class="narmal"><?php echo $viewtutorial['choice_3']; ?></td>
				  </tr>
				   <tr height="25" >
                               <td width="35%" align="left" class="narmal">D)</td>
                               <td width="1%" align="left" class="narmal">:</td>							   
                               <td width="64%" align="left" valign="middle" class="narmal"><?php echo $viewtutorial['choice_4']; ?></td>
				  </tr>
				    <tr height="25" >
                               <td width="35%" align="left" class="narmal">Correct Answer</td>
                               <td width="1%" align="left" class="narmal">:</td>							   
                               <td width="64%" align="left" valign="middle" class="narmal"><?php echo $viewtutorial['answer']; ?></td>
				  </tr>
				   <tr height="25" >
                               <td width="35%" align="left" class="narmal">Display Feedback</td>
                     <td width="1%" align="left" class="narmal">:</td>							   
                               <td width="64%" align="left" valign="middle" class="narmal"><?php echo $viewtutorial['feed_dis']; ?></td>
				  </tr>
				    <tr height="25" >
                               <td width="35%" align="left" class="narmal">Feedback for Correct&nbsp;Answer</td>
                               <td width="1%" align="left" class="narmal">:</td>							   
                               <td width="64%" align="left" valign="middle" class="narmal"><?php echo $viewtutorial['correct_ans']; ?></td>
				  </tr>
				    <tr height="25" >
                               <td width="35%" align="left" class="narmal">Feedback for Wrong&nbsp;Answer</td>
                               <td width="1%" align="left" class="narmal">:</td>							   
                               <td width="64%" align="left" valign="middle" class="narmal"><?php echo $viewtutorial['wrong_ans']; ?></td>
				  </tr>
				  <tr height="25" >
                              <td width="35%" height="27" align="left" class="narmal">Added By</td>
                  <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="64%" align="left" valign="middle" class="narmal"><?php echo $username; ?> (<?php echo $viewtutorial['user_type']; ?>)</td>
                  </tr>
				  <?php  if($action=="viewtutorial"){?>
					<tr height="25" >
                               <td width="35%" align="left" class="narmal">&nbsp;</td>
                               <td width="1%" align="left" class="narmal">&nbsp;</td>							   
                      <td width="64%" align="left" class="narmal"><a href="?pid=39&action=list&tutid=<?php echo $tutid;?>&classesid=<?php echo $classesid;?>&subjectid=<?php echo $subjectid; ?>&unit_id=<?php echo $unit_id;?>&chapter_id=<?php echo $chapter_id;?>&searchunit=Submit" class="bgcolor_02" style="text-decoration:none; padding:3px;"> Back</a></td>
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
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Questions List</strong></td>
              </tr>
			  <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top"><br />
				<p align="left"><b>Class :</b><?php echo classname($classesid);?></p>
				<table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr height="25" class="bgcolor_02">
                      <td width="7%" align="left" class="admin">&nbsp;S.No</td>
					  <td width="16%" align="left" class="admin">Subject Name </td>
                      <td width="18%" align="left" class="admin">Unit Name </td>
                      <td width="20%" align="left" class="admin">Chapter</td>
                      <td width="22%" align="left" class="admin">Question</td>
					   <td width="17%" align="left" class="admin">Created By</td>
                     
                    </tr>
                    <?php if(count($unitsarr)>0){
					$irow=0;
					foreach($unitsarr as $eachrecord){
					$irow++;
					 ?>
                    <tr height="25">
                      <td align="left" width="7%" class="narmal">&nbsp;<?php echo $irow; ?></td>
                      <td align="left" width="16%" class="narmal"><?php echo subjectname($eachrecord['es_subjectid']); ?></td>
					  <td align="left" width="18%" class="narmal"><?php echo $eachrecord['unit_name']; ?></td>
                      <td align="left" width="20%" class="narmal"><?php echo $eachrecord['chapter_name']; ?></td>
                      <td align="left" width="22%" class="narmal"><?php echo $eachrecord['question']; ?></td>
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
                    
					<?php }?>
					
					<?php  } else { ?> 
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

			
						
			
