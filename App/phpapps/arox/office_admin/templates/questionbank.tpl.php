<?php 
	/**
* Only Admin users can view the pages
*/
include("includes/js/fckeditor/fckeditor.php") ;

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
/* Adding chapters actions */
		function getsubjects(countryid,selval)
		{   
			url="?pid=55&action=classwisesubjects_units&cid="+countryid+"&selval="+selval;
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
			url="?pid=55&action=classwiseunitsone&es_subjectid="+countryid+"&selval="+selval;
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
			url="?pid=55&action=unitwisechapters&unit_id="+unit_id+"&selval="+selval;
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
			
			url="?pid=55&action=classwisesubjectstwo&cid="+countryid+"&selval="+getselected;
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
			url="?pid=55&action=classwiseunits2&subjectid="+subjectid+"&selval="+selval;
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
			url="?pid=55&action=chpaters2&unit_id="+unit_id+"&selval="+selval;
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
<?php  if($action == 'list') { ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">

				<tr>
         <td height="3" colspan="3"></td>
	 </tr>	
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Question Bank </span></td>
              </tr>
               <tr>
                <td width="1px" class="bgcolor_02" ></td>
                <td height="25" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font><br /></td>
                 <td width="1px" class="bgcolor_02" ></td></td>
              </tr>
               <tr>
                <td width="1px" class="bgcolor_02" ></td>
                <td align="right" height="25">
				<?php if(in_array('8_13',$admin_permissions)){?>
				<form action="?pid=63"  method="post">
				<input type="submit" class="bgcolor_02" name="addtutorial" value="Add Question" />&nbsp;</form>

<?php }?>
				
				
				</td>
                 <td width="1px" class="bgcolor_02" ></td></td>
              </tr>	         		  
             
			  	
			  
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td  align="center" valign="top">
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
              <td><form method="post" name="addun" action="?pid=63&action=list">
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
							  <td align="left" width="77%" class="narmal"><input type="submit" class="bgcolor_02" name="searchunit" value="Submit" /></td>
			      </tr>			
                </table>						
                  </form>
              </td>
              </tr>
                </table>
                <br />
                  <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr height="25" class="bgcolor_02">
                      <td width="9%" align="center" valign="middle" class="admin">&nbsp;S.No</td>
                      <td width="13%" align="left" valign="middle" class="admin">Unit  </td>
                      <td width="12%" align="left" valign="middle" class="admin">Chapter</td>
                      <td width="35%" align="left" valign="middle" class="admin">Question</td>
					  <td width="14%" align="left" valign="middle" class="admin">Created By</td>
                      <td width="17%" align="center" valign="middle" class="admin">Action&nbsp;</td>
                    </tr>
                    <?php if(count($unitsarr)>0){
					$irow=0;
					foreach($unitsarr as $eachrecord){
					$irow++;
					 ?>
                    <tr height="25">
                      <td width="9%" align="center" valign="middle" class="narmal">&nbsp;<?php echo $irow; ?></td>
                      <td width="13%" align="left" valign="middle" class="narmal"><?php echo $eachrecord['unit_name']; ?></td>
                      <td width="12%" align="left" valign="middle" class="narmal"><?php echo $eachrecord['chapter_name']; ?></td>
                      <td width="35%" align="left" valign="middle" class="narmal"><?php echo $eachrecord['question']; ?></td>
					  <td width="14%" align="left" valign="middle" class="narmal"><?php
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
                      <td width="17%" align="center" valign="middle" class="narmal">
					  <?php if(in_array('8_14',$admin_permissions)){?>

 <a href="?pid=63&action=edit&tutid=<?php echo $eachrecord['q_id']; ?>&es_classesid=<?php echo $eachrecord['es_classesid']; ?>&es_subjectid=<?php echo $eachrecord['es_subjectid']; ?>&unit_id=<?php echo $eachrecord['unit_id']; ?>&chapter_id=<?php echo $eachrecord['chapter_id']; ?>" ><img src="images/b_edit.png" border="0" title="Edit" alt="Edit" /></a>&nbsp;
					 

<?php }?>
					  <?php if(in_array('8_19',$admin_permissions)){?>

 <a href="?pid=63&action=viewtutorial&tutid=<?php echo $eachrecord['q_id']; ?>&classesid=<?php echo $eachrecord['es_classesid']; ?>&subjectid=<?php echo $eachrecord['es_subjectid']; ?>&unit_id=<?php echo $eachrecord['unit_id']; ?>&chapter_id=<?php echo $eachrecord['chapter_id']; ?>" ><img src="images/b_browse.png" border="0" title="View" alt="View" /></a>&nbsp;
					 

<?php }?>
					  
					  <?php if(in_array('8_15',$admin_permissions)){?>

  <a href="?pid=63&action=deletetutorial&tutid=<?php echo $eachrecord['q_id']; ?>&classesid=<?php echo $eachrecord['es_classesid']; ?>&subjectid=<?php echo $eachrecord['es_subjectid']; ?>&unit_id=<?php echo $eachrecord['unit_id']; ?>&chapter_id=<?php echo $eachrecord['chapter_id']; ?>" onClick="return confirm('Are you sure you want to  delete ?')"><img src="images/b_drop.png" border="0" title="Delete" alt="Delete" /></a><?php }?>
  &nbsp;
<?php if (in_array("8_108", $admin_permissions)) {?> 
<a href="javascript: void(0)" onclick="window.open('?pid=63&action=print_view&tutid=<?php echo $eachrecord['q_id']; ?>&classesid=<?php echo $eachrecord['es_classesid']; ?>&subjectid=<?php echo $eachrecord['es_subjectid']; ?>&unit_id=<?php echo $eachrecord['unit_id']; ?>&chapter_id=<?php echo $eachrecord['chapter_id']; ?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');" ><img src="images/print_16.png" border="0" title="Print " alt="Print " /></a> <?php }  ?>  </td>
                   


				    </tr> 
					
			<tr>
				<td colspan="6" align="center" class="adminfont">&nbsp;</td>
			</tr>          
                    
					<?php }?>
					<?php if (in_array("8_107", $admin_permissions)) {?>    
					 <tr>
				<td colspan="6" align="center" class="adminfont"><input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=63&action=print_list&searchunit=Submit&classesid=<?php echo $classesid; ?>&subjectid=<?php echo $subjectid;?>&unit_id=<?php echo $unit_id;?>&chapter_id=<?php echo $chapter_id;?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /></td>
			</tr>    <?php }  ?>
					
					<?php } else { ?> 
					 <tr height="25">
                      <td align="center" colspan="6">No Records Found</td>
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
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;&nbsp;<span class="admin">Question Bank </span></td>
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
							<?php } ?>Unit </td>
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

<?php  if($action=="viewtutorial"  || $action=='print_view'){
if($action=='print_view'){
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_questionbank','Tutorials','Add Questions','','Print','".$_SERVER['REMOTE_ADDR']."',NOW())";
     $log_insert_exe=mysql_query($log_insert_sql);}
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">

				 
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>			  
               <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">&nbsp;Question Bank </span></td>
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
                              <td width="32%" height="27" align="left" class="narmal">Unit&nbsp; </td>
                              <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="67%" align="left" valign="middle" class="narmal"><?php echo $viewtutorial['unit_name']; ?></td>
                  </tr>
				  
                             <tr height="25" >
                               <td width="32%" align="left" class="narmal">Chapter&nbsp; </td>
                               <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="67%" align="left" valign="middle" class="narmal"><?php echo $viewtutorial['chapter_name']; ?></td>
                  </tr>
                             <tr height="25" >
                               <td width="32%" align="left" class="narmal"> Question </td>
                               <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="67%" align="left" valign="middle" class="narmal"><?php echo $viewtutorial['question']; ?></td>
                  </tr>
				  <tr height="25" >
                               <td width="32%" align="left" class="narmal">A)</td>
                               <td width="1%" align="left" class="narmal">:</td>							   
                               <td width="67%" align="left" valign="middle" class="narmal"><?php echo $viewtutorial['choice_1']; ?></td>
				  </tr>
				   <tr height="25" >
                               <td width="32%" align="left" class="narmal">B)</td>
                               <td width="1%" align="left" class="narmal">:</td>							   
                               <td width="67%" align="left" valign="middle" class="narmal"><?php echo $viewtutorial['choice_2']; ?></td>
				  </tr>
				   <tr height="25" >
                               <td width="32%" align="left" class="narmal">C)</td>
                               <td width="1%" align="left" class="narmal">:</td>							   
                               <td width="67%" align="left" valign="middle" class="narmal"><?php echo $viewtutorial['choice_3']; ?></td>
				  </tr>
				   <tr height="25" >
                               <td width="32%" align="left" class="narmal">D)</td>
                               <td width="1%" align="left" class="narmal">:</td>							   
                               <td width="67%" align="left" valign="middle" class="narmal"><?php echo $viewtutorial['choice_4']; ?></td>
				  </tr>
				    <tr height="25" >
                               <td width="32%" align="left" class="narmal">Correct&nbsp;Answer</td>
                               <td width="1%" align="left" class="narmal">:</td>							   
                               <td width="67%" align="left" valign="middle" class="narmal"><?php echo $viewtutorial['answer']; ?></td>
				  </tr>
				    <tr height="25" >
                               <td width="32%" align="left" class="narmal">Feedback Display</td>
                               <td width="1%" align="left" class="narmal">:</td>							   
                               <td width="67%" align="left" valign="middle" class="narmal"><?php echo $viewtutorial['feed_dis']; ?></td>
				  </tr>
				    <tr height="25" >
                               <td width="32%" align="left" class="narmal">Feedback for Correct&nbsp;Answer</td>
                               <td width="1%" align="left" class="narmal">:</td>							   
                               <td width="67%" align="left" valign="middle" class="narmal"><?php echo $viewtutorial['correct_ans']; ?></td>
				  </tr>
				    <tr height="25" >
                               <td width="32%" align="left" class="narmal">Feedback for Wrong&nbsp;Answer</td>
                               <td width="1%" align="left" class="narmal">:</td>							   
                               <td width="67%" align="left" valign="middle" class="narmal"><?php echo $viewtutorial['wrong_ans']; ?></td>
				  </tr>
				  <tr height="25" >
                              <td width="32%" height="27" align="left" class="narmal">Added By</td>
                  <td width="1%" align="left" class="narmal">:</td>							   
                              <td width="67%" align="left" valign="middle" class="narmal"><?php echo $username; ?> (<?php echo $viewtutorial['user_type']; ?>)</td>
                  </tr>
				  <?php if($action=='viewtutorial'){?>
					<tr height="25" >
                               <td width="32%" align="left" class="narmal">&nbsp;</td>
                               <td width="1%" align="left" class="narmal">&nbsp;</td>							   
                      <td width="67%" align="left" class="narmal"><a href="?pid=63&action=list&tutid=<?php echo $tutid;?>&classesid=<?php echo $classesid;?>&subjectid=<?php echo $subjectid; ?>&unit_id=<?php echo $unit_id;?>&chapter_id=<?php echo $chapter_id;?>&searchunit=Submit" class="bgcolor_02" style="text-decoration:none; padding:3px;"> Back</a></td>
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
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_questionbank','Tutorials','Add Questions','','Print','".$_SERVER['REMOTE_ADDR']."',NOW())";
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
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;<span class="admin">Question Bank </span></td>
              </tr>	
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="center" valign="top"><br />
				<table width="100%">
				<tr><td width="12%" class="admin">Class</td>
				<td width="1%" class="admin">:</td>
				<td width="38%"><?php echo classname($classesid);?></td>
				<td width="29%" align="right" class="admin">Subject</td>
				<td width="1%" class="admin">:</td>
				<td width="19%"><?php echo subjectname($subjectid);?></td>
				</tr>
				</table>
				<table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr height="25" class="bgcolor_02">
                      <td width="5%" align="left" class="admin">&nbsp;S.No</td>
                      <td width="17%" align="left" class="admin">Unit  </td>
                      <td width="18%" align="left" class="admin">Chapter</td>
                      <td width="22%" align="left" class="admin">Question</td>
					  <td width="21%" align="left" class="admin">Created By</td>
                     
                    </tr>
                    <?php if(count($unitsarr)>0){
					$irow=0;
					foreach($unitsarr as $eachrecord){
					$irow++;
					 ?>
                    <tr height="25">
                      <td align="left" width="5%" class="narmal">&nbsp;<?php echo $irow; ?></td>
                      <td align="left" width="17%" class="narmal"><?php echo $eachrecord['unit_name']; ?></td>
                      <td align="left" width="18%" class="narmal"><?php echo $eachrecord['chapter_name']; ?></td>
                      <td align="left" width="22%" class="narmal"><?php echo $eachrecord['question']; ?></td>
					  <td align="left" width="21%" class="narmal"><?php
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
                      <td align="center" colspan="6">No Records Found</td>
                    </tr>
                    
                    <?php }  ?>
                </table>
                
				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
             
               
              
              
  		     <tr><td colspan="3" class="bgcolor_02" height="1"></td></tr>
			  
			  
   
</table>

<?php } ?>			

			
						
			
