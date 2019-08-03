<?php
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}

/**
* ********Displaying the students with respect to class and reg.number*******
*/

if ($action=='serchclass'){
?>
<script type="text/javascript">
function newWindowOpen(href){
    window.open(href,null, 'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');
}
</script>
<script type="text/javascript">

	function fun()
	{ 
		 if(document.serchstudent.sm_class.value == "all"){
			alert("Select Class");		
			return false;
		}
		
		if(document.serchstudent.ac_year.value == "select"){
			alert("Select Academic year");		
			return false;
		}
		else
		{
		return true;
		}	   
	}
</script>
<script>
function logs(MyWin,user_id,table_name,record_id,action)
    {
	winpopup=window.open(MyWin+'?user_id='+user_id+'&table_name='+table_name+'&record_id='+record_id+'&action='+action,table_name+user_id,'height=222,width=555,menubar=no,scrollbars=yes,status=no,toolbar=no,sereenX=100,screenY=0,left=100,top=0,class=text');	
	winpopup.moveTo(111,25);
	}
</script>	
	
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<form action="?pid=21&action=serchclass" method="post" name="serchstudent">
	 <tr>
         <td height="3" colspan="3"></td>
	 </tr>
	 <tr><td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;Search Student Record</td></tr>
	  <tr>
		 <td width="1" class="bgcolor_02"></td>
		 <td  align="left" valign="top"><table width="100%" border="0" cellspacing="4" cellpadding="0">
           <tr>
             <td align="left" valign="top"><table width="100%" border="0" cellspacing="5" cellpadding="0">
               </table>
                 <table width="100%" border="0" cellspacing="5" cellpadding="0">
                   <tr>
                     <td height="25" colspan="6" align="right" ><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font> </td>
                   </tr>
                   <tr>
                     <td width="27%" class="narmal">&nbsp;Class</td>
                     <td width="37%" align="left" class="narmal">
				   <select name="<?php if(isset($back)){echo $sm_class = $clid;}else{ echo 'sm_class';}?>" style="width:180px;" onchange="JavaScript:document.all.submit();">
                         <option value="all" >Select</option>
                       <?php 
					     if (count($allClasses)>0){
					      foreach($allClasses as $eachClass){
					   ?>
                         <option value="<?php echo $eachClass['es_classesid']; ?>"  <?php echo ($eachClass['es_classesid']==$sm_class)?"selected":""?>><?php echo $eachClass['es_classname']; ?></option>
                         <?php }} ?>
                     </select> <font color="#FF0000">*</font></td>
                     <td width="13%" class="narmal">Registration&nbsp;No </td>
                     <td colspan="2" align="left" class="narmal"><?php echo $_SESSION['eschools']['student_prefix'];?>
                       <input type="text" name="sm_section" id="sm_section" value="<?php if(isset($sm_section) && $sm_section!=''){echo $sm_section;}if(isset($back)) echo $secid; ?>" size="5" /></td>
                   </tr>
                   <tr>
                     <td width="27%" align="left" class="narmal">&nbsp;Academic Year </td>
                   <td align="left" class="narmal"><select name="ac_year" style="width:180px;">
                         <option value="select" >Select Academic Year</option>
                         <?php  foreach($school_details_res as $each_record) { ?>
                         <option value="<?php echo $each_record['es_finance_masterid']; ?>" <?php if ($each_record['es_finance_masterid']==$ac_year) { echo "selected"; }?>><?php echo displaydate($each_record['fi_ac_startdate'])." To ".displaydate($each_record['fi_ac_enddate']); ?> </option>
                         <?php } ?>
                     </select> <font color="#FF0000">*</font></td>
                     <td width="13%" class="narmal">Status</td>
                     <td width="23%" align="left" class="narmal"><select name="examstatus" style="width:180px;">
                            <option value="">Select Status</option>
							<option value="newadmission" <?php if ($examstatus=='newadmission') { echo "selected='selected'"; }?>>New Admission</option>
							<option value="promoted" <?php if ($examstatus=='promoted') { echo "selected='selected'"; }?>>Promoted</option>
							<option value="pass" <?php if ($examstatus=='pass') { echo "selected='selected'"; }?>>Pass</option>
							<option value="fail" <?php if ($examstatus=='fail') { echo "selected='selected'"; }?>>Fail</option>
							<option value="resultawaiting" <?php if ($examstatus=='resultawaiting') { echo "selected='selected'"; }?>>Result Awaiting</option>
							<option value="inactive" <?php if ($examstatus=='inactive') { echo "selected='selected'"; }?>>Transferred</option>
							
							</select>
						 </td>
                   </tr> 
				   <tr>
                     <td width="27%" align="left" class="narmal"> </td>
                   <td align="left" class="narmal"></td>
                     <td width="13%" class="narmal"></td>
                     <td width="23%" align="left" class="narmal"><input name="Search" type="submit" class="bgcolor_02" value="Search" onclick="return fun();" style="cursor:pointer"/></td>
                   </tr>
				                    
                   <tr>
                     <td colspan="6" height="18"  align="center"></td>
                   </tr>                   
				    <?php 
				     if($nill1!="" && isset($Search)){ ?>
                   <tr>
                     <td colspan="6" height="18" class="narmal" align="center">*<?php  echo $nill1; ?>! </td>
                   </tr>
                   <?php } ?>
				   
                   <tr>
                     <td colspan="6" height="10" class="narmal">
				   <?php
				   
				      $i=$start;
					  if(count($es_studentList) > 0){						
				      	foreach ($es_studentList as $eachrecord){
						$i++;		
					
									?>
                         <table width="100%" border="1" class="tbl_grid" cellpadding="2">
                           <tr>
                             <td width="26%" rowspan="5" align="center" valign="middle"><img src="images/student_photos/<?php echo $eachrecord['pre_image']; ?>"  width="127" height="105" /> </td>
                             <td width="29%" height="23" class="narmal">Registration No </td>
                             <td width="45%" class="narmal"><?php echo $_SESSION['eschools']['student_prefix'];?><?php echo $eachrecord['es_preadmissionid'];?></td>
                           </tr>
                           <tr>
                             <td height="23" class="narmal">Applicant Name</td>
                             <td class="narmal"><?php echo $eachrecord['pre_name'];?></td>
                           </tr>
                           <tr>
                             <td height="23" class="narmal">Father's Name </td>
                             <td class="narmal"><?php echo $eachrecord['pre_fathername'];?></td>
                           </tr>
                           <tr>
                             <td height="23" class="narmal">Date of Birth </td>
                             <td class="narmal"><?php if ($ac_year != $id){	
							 echo displaydate($eachrecord['pre_dateofbirth']);
							 }else echo displaydate($eachrecord['pre_dateofbirth']);							
							?></td>
                           </tr>
                           <tr>
                             <td height="23" class="narmal"> Class </td>
                             <td class="narmal"><?php  echo classname($eachrecord['pre_class']);?></td>
                           </tr>
                           <tr>
                           			<td colspan="3">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td width="6%" class="narmal">&nbsp;</td>
                                        <td width="18%" class="narmal">User Name</td>
                                        <td width="1%" class="narmal">:</td>
                                        <td width="21%" class="narmal"><?php echo $eachrecord['pre_student_username'];?></td>
                                        <td width="8%" class="narmal">Password</td>
                                        <td width="1%" class="narmal">:</td>
                                        <td width="45%" class="narmal"><?php echo $eachrecord['pre_student_password'];?></td>
                                      </tr>
                                    </table>
                                   </td>
                           </tr>
						   
						    <?php /*?><tr>
                           			<td colspan="3">
									
					                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td width="6%" class="narmal">&nbsp;</td>
                                        <td width="18%" class="narmal">Admission status</td>
                                        <td width="1%" class="narmal">:</td>
                                        <td width="21%" class="narmal"><?php if($eachrecord['det_adm_status']=='newadmission'){echo "New Admission";} if($eachrecord['det_adm_status']=='promoted'){echo "Promoted";} ?></td>
                                        <td width="8%" class="narmal">Result</td>
                                        <td width="1%" class="narmal">:</td>
                                        <td width="45%" class="narmal"><?php if($eachrecord['admdetailstatus']!=""){
										if($eachrecord['admdetailstatus']=="pass"){echo "Pass";}
										if($eachrecord['admdetailstatus']=="fail"){echo "Fail";}
										if($eachrecord['admdetailstatus']=="resultawaiting"){echo "Result Awaiting";}
										if($eachrecord['admdetailstatus']=="inactive"){echo "Transferred";}
										}?></td>
                                      </tr>
                                    </table>
                                   </td>
                           </tr><?php */?>
                           
                           <tr>
                             <td height="23" colspan="3" align="right" valign="bottom"  class="narmal" style="padding:5px"><a href="?pid=21&amp;action=editstudent&amp;sid=<?php echo $eachrecord['es_preadmissionid'];
							 					 
							 ?>&amp;clid=<?php if($sm_class!=''){echo $sm_class;}else{echo $clid;}?>&amp;secid=<?php if($sm_section!=''){echo $sm_section;}else {echo $secid;}?>" >
                               <?php if (in_array('5_1', $admin_permissions)){ ?><?php
							    $session_year    = $_SESSION['eschools']['es_finance_masterid'];
							   if($ac_year == $session_year ){?>
                               <!--<input name="Submit2" type="submit" class="bgcolor_02" value="View/Edit" style="cursor:pointer"/>--><span class="bgcolor_02" style="width:50px;padding:2px; text-decoration:none;"  >Edit</span><?php }}?></a>&nbsp;&nbsp;&nbsp;
							 </td>
                           </tr>
                           
                         </table>
                     <?php }} ?></td>
                   </tr>
                 </table>
          <table width="100%" border="0">
                   <tr>
				  <?php if(isset($ac_year)){
				  if($es_studentList >0){
				  ?>
				   
                     <td height="15" colspan="3" align="center">
					 <?php 	
								 
					  paginateexte($start, $q_limit, $no_rows,"&action=$action&sm_class=$sm_class&sm_section=$sm_section&ac_year=$ac_year&examstatus=$examstatus"); ?> </td>
					 
					 <?php }} ?>
                   </tr>
                   <tr>
				    <?php if(isset($ac_year)){?>
                     <td align="right" valign="middle"><div>
					 <?php if(in_array('5_3',$admin_permissions)){?><input name="Submit2" type="button" onclick="newWindowOpen ('?pid=21&amp;action=printsearchclass<?php echo $searchurl;?>');" class="bgcolor_02" value="Print" style="cursor:pointer"/><?php }?>
                       
                     </div></td>
				  <?php } ?>
                   </tr>
               </table></td>
           </tr>
         </table></td>
		<td width="1" class="bgcolor_02"></td>
	  </tr>	  
	  <tr>
		<td height="1" colspan="3" class="bgcolor_02"></td>
	  </tr>
	</form>
</table>

<?php
 }
?>
			
<?php

/**
* ********Printing the students with respect to class and reg.number*******
*/
			
if($action=="printsearchclass")	{?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<form action="" method="post" name="serchstudent">
	  <tr>
         <td height="3" colspan="3"></td>
	 </tr>
	  <tr>
		  <td height="25" colspan="3" class="bgcolor_02" align="center"><span class="admin">&nbsp;Students <?php if($sm_class!="" ) {echo "of class : ".classname("$sm_class"); }?></span></td>
		
	  </tr>
	  <tr>
		  <td class="bgcolor_02" width="1"/> 
		  <td  valign="top" align="left"><table width="100%" border="0" cellspacing="5" cellpadding="0">
			<?php if($nill1!=""){ ?>
				
	   <tr>
		  <td colspan="5" class="bgcolor_02" align="center"><?php  echo $nill1;  ?>
		  </td>
	   </tr>
			<?php } ?>
		<tr>
		  <td colspan="5" height="10" class="narmal" align="left">
				<?php
				$i=$start;
				  if(count(	$es_studentList) > 0){
				    	foreach ($es_studentList as $eachrecord){
						$i++;	
						$status=$db->getRows("select * from es_preadmission_details where es_preadmissionid=".$eachrecord['es_preadmissionid']." 
					                           AND pre_fromdate<='".$from_finance."'");
						            if(count($status)==1){
									$value="New Admitted";
									}else{
									$value="Promoted";
									}			 		
				?>
				<table width="100%" border="1" class="tbl_grid">
                  <tr>
                    <td width="26%" rowspan="5" align="center" valign="middle" ><img src="images/student_photos/<?php  if(isset($sm_section)){ echo $eachrecord['pre_image'];}
					 echo $eachrecord['pre_image']; ?>"  width="127" height="105"/></td>
                    <td width="29%" height="25" class="narmal">Registration No </td>
                    <td width="45%" class="narmal"><?php echo $_SESSION['eschools']['student_prefix'];?><?php echo $eachrecord['es_preadmissionid']; ?></td>
                  </tr>
                  <tr>
                    <td height="25" class="narmal">Applicant Name</td>
                    <td class="narmal">
				<?php echo $eachrecord['pre_name'];?></td>
                  </tr>
                  <tr>
                    <td height="25" class="narmal">Father's Name </td>
                    <td class="narmal"><?php echo $eachrecord['pre_fathername'];?></td>				
                  </tr>
                  <tr>
                    <td height="25" class="narmal">Date of Birth </td>
                    <td class="narmal"><?php echo displaydate($eachrecord['pre_dateofbirth']);	?></td>				
                  </tr>
                  <tr>
                    <td height="25" class="narmal">Class </td>
                    <td class="narmal"><?php echo classname($eachrecord['pre_class']);?></td>
                  </tr>
                  <tr>
                           			<td colspan="3">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td width="6%" class="narmal">&nbsp;</td>
                                        <td width="18%" class="narmal">User Nme</td>
                                        <td width="1%" class="narmal">:</td>
                                        <td width="21%" class="narmal"><?php echo $eachrecord['pre_student_username'];?></td>
                                        <td width="8%" class="narmal">Password</td>
                                        <td width="1%" class="narmal">:</td>
                                        <td width="45%" class="narmal"><?php echo $eachrecord['pre_student_password'];?></td>
                                      </tr>
                                    </table>
                                   </td>
                   </tr>
				    <?php /*?><tr>
                           			<td colspan="3">
									
					                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td width="6%" class="narmal">&nbsp;</td>
                                        <td width="18%" class="narmal">Admission status</td>
                                        <td width="1%" class="narmal">:</td>
                                        <td width="21%" class="narmal"><?php echo $value; ?></td>
                                        <td width="8%" class="narmal">Result</td>
                                        <td width="1%" class="narmal">:</td>
                                        <td width="45%" class="narmal"><?php if($eachrecord['admdetailstatus']!=""){
										echo ucwords($eachrecord['admdetailstatus']);
										}?></td>
                                      </tr>
                                    </table>
                                   </td>
                           </tr><?php */?>
                </table>
			  <?php }} ?>
			</td>
		 </tr>
	</table>
   </td>
		<td class="bgcolor_02" width="1"/>
 </tr>
	  <tr>
     <td height="1" colspan="3" class="bgcolor_02"></td>
     </tr>
	 
</form>
</table>
<?php

/**
* ********End of Printing the students with respect to class and reg.number*******
*/

}
?>	
			
<?php

/**
* ********Student Editing*****************************
*/
			
if($action=="editstudent" && $back=="")
{
 //foreach ($es_studentview as $eachrecord1){
 
?>
<script type="text/javascript">

function newWindowOpen(href)
{
    window.open(href,null, 'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');

}
</script>	
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
			url="?pid=55&action=classwisebatch&cid="+countryid+"&selval="+selval;
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
</script>			
<form method="post" name="preadmission" action="" enctype="multipart/form-data">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
           <td height="6" colspan="3" class="error_message" align="center"></td>
         </tr>
        
         <tr>
            <td height="25" colspan="3" class="bgcolor_02"><a href="#" class="admin"> &nbsp;&nbsp;Pre Admission</a></td>
          </tr>
           
          <tr>
             <td width="1" class="bgcolor_02"></td>
             <td align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font></td>
             <td width="1" class="bgcolor_02"></td>
          </tr> 
          <tr>
             <td width="1" class="bgcolor_02"></td>
             <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                   <td>&nbsp;</td>
                   <td height="30" align="left"><span class="narmal">Applicant Name </span></td>
                 <td align="left">:</td>
                   <td align="left"><input name="pre_name" type="text" size="15" value="<?php echo htmlentities($eachrecord1['pre_name']); ?>"  /><font color="#FF0000">&nbsp;*</font></td>
                   <td align="left"><span class="narmal">Gender</span></td>
                   <td align="left">:</td>
                   <td align="left"><input name="pre_gender" type="text" size="15" value="<?php echo $eachrecord1['pre_gender']; ?>" readonly="readonly"/><font color="#FF0000">&nbsp;*</font></td>
               </tr>
                 <tr>
                   <td>&nbsp;</td>
                   <td height="30" align="left"><span class="narmal">User  Name </span></td>
                   <td align="left">:</td>
                   <td align="left"><input name="pre_student_username" type="text" id="pre_student_username" size="15" value="<?php echo $eachrecord1['pre_student_username']; ?>" readonly="readonly"  /><font color="#FF0000">&nbsp;*</font></td>
                   <td align="left"><span class="narmal">Academic From</span></td>
                   <td align="left">:</td>
                   <td align="left"><input name="pre_fromdate" type="text" size="15" value="<?php echo formatDBDateTOCalender($eachrecord1['pre_fromdate']);?>" readonly/><font color="#FF0000">&nbsp;*</font></td>
               </tr>
                 <tr>
                   <td>&nbsp;</td>
                   <td height="30" align="left"><span class="narmal">E-mail</span></td>
                   <td align="left">:</td>
                   <td align="left"><input name="pre_emailid" type="text" size="15" value="<?php echo $eachrecord1['pre_emailid']; ?>" /></td>
                   <td align="left"><span class="narmal">Academic To </span></td>
                   <td align="left">:</td>
                   <td align="left"><input name="pre_todate" type="text" size="15" value="<?php echo formatDBDateTOCalender($eachrecord1['pre_todate']);?>" readonly /><font color="#FF0000">&nbsp;*</font></td>
               </tr>
                 <tr>
                   <td>&nbsp;</td>
                   <td height="30" align="left"><span class="narmal">Date&nbsp;Of&nbsp;Birth </span></td>
                   <td align="left">:</td>
                   <td align="left"><input name="pre_dateofbirth" type="text" id="pre_dateofbirth" size="15"  value="<?php echo formatDBDateTOCalender($eachrecord1['pre_dateofbirth']); ?>" readonly /></td>
                   <td align="left"><span class="narmal">Age</span></td>
                   <td align="left">:</td>
                   <td align="left"><input name="pre_age" type="text" size="15" value="<?php echo $eachrecord1['pre_age']; ?>" /></td>
               </tr>
                 <tr>
                   <td>&nbsp;</td>
                   <td height="30" align="left"><span class="narmal">Class</span></td>
                   <td align="left">:</td>
                   <td align="left">
				   <input type="hidden" name="pre_class" value="<?php echo $eachrecord1['pre_class']?>" />
				   <input name="" type="text" size="15" value="<?php echo classname($eachrecord1['pre_class']); ?>" readonly />
				   <font color="#FF0000">&nbsp;*</font></td>
                   <td align="left">Subjects</td>
                                    <td align="left">:</td>
                                    <td align="left"><select name="scat_id" onchange="open_sub(this.value);">
                                   
                                    <?php 
									
									
									$sub_cat_arr = $db->getrows("SELECT * FROM subjects_cat WHERE classid='".$eachrecord1['pre_class']."'");
									if(!isset($scat_id)){$scat_id=$pre_admin_details['scat_id'];}
									if(count($sub_cat_arr)>0){
									foreach($sub_cat_arr  as $each){
									
									?>
                                    <option value="<?php echo $each['scat_id'];?>" <?php if($scat_id==$each['scat_id']){echo "selected='selected'";}?>><?php echo $each['scat_name']; ?></option>
                                    <?php
									}
									}
									?>
                                    </select><font color="#FF0000"><b>*</b></font></td>
               </tr>
			   <?php 
			 
			   if($eachrecord1['pre_class']!=""){?>
			   <script type="text/javascript">
			   getsubjects('<?php echo $eachrecord1['pre_class']; ?>','<?php echo $eachrecord1['batch_id'];?>');
			   </script>
			   <?php }?>
              
               
                 <tr>
                   <td>&nbsp;</td>
                   <td height="30" align="left"><span class="narmal">Father's Name </span></td>
                   <td align="left">:</td>
                   <td align="left"><input name="pre_fathername" type="text" size="15" value="<?php echo htmlentities($eachrecord1['pre_fathername']); ?>" /><font color="#FF0000">&nbsp;*</font></td>
                   <td align="left"><span class="narmal">Occupation</span></td>
                   <td align="left">:</td>
                   <td align="left"><input name="pre_fathersoccupation" type="text" size="15" value="<?php echo $eachrecord1['pre_fathersoccupation']; ?>" /></td>
               </tr>
                 <tr>
                   <td>&nbsp;</td>
                   <td height="30" align="left"><span class="narmal">Mother's Name </span></td>
                   <td align="left">:</td>
                   <td align="left"><input name="pre_mothername" type="text" size="15"  value="<?php echo $eachrecord1['pre_mothername']; ?>"/></td>
                   <td align="left"><span class="narmal">Occupation</span></td>
                   <td align="left">:</td>
                   <td align="left"><input name="pre_motheroccupation" type="text" size="15" value="<?php echo $eachrecord1['pre_motheroccupation']; ?>" /></td>
               </tr>
                <tr>                <td>&nbsp;</td>
                                    <td height="30" align="left">Caste</td>
                                    <td align="left">:</td>
                                    <td align="left"><select name="caste_id">
                                   
                                    <?php 
									$caste_arr = $db->getrows("SELECT * FROM es_caste");
									if(count($caste_arr)>0){
									foreach($caste_arr  as $each){
									?>
                                    <option value="<?php echo $each['caste_id'];?>" <?php if($caste_id==$each['caste_id']){echo "selected='selected'";}?>><?php echo $each['caste']; ?></option>
                                    <?php
									}
									}
									?>
                                    </select></td>
                                    <td align="left">Annual Income</td>
                                    <td align="left">:</td>
                                    <td align="left"><input name="ann_income" type="text" size="15" value="<?php 
									if(!isset($ann_income)){$ann_income=$eachrecord1['ann_income'];}
									echo $ann_income;?>" /></td>
                                  </tr>
                                  <tr>
                                  <td>&nbsp;</td>
                                    <td height="30" align="left">Admission Date</td>
                                    <td align="left">:</td>
                                    <td align="left"><input name="admission_date" type="text" id="admission_date" size="10" value="<?php 
									if(!isset($admission_date)){$admission_date = func_date_conversion("Y-m-d","d/m/Y",$eachrecord1['admission_date']);}
									echo $admission_date;  ?>" readonly="readonly" /><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.preadmission.admission_date);return false;" ><img src="<?php echo JS_PATH ?>/WeekPicker/calbtn.gif" alt="Calender" name="popcal" width="34" height="22" border="0" align="absmiddle" id="popcal" /></a></td>
                                    <td align="left">Document deposited</td>
                                    <td align="left">:</td>
                                    <td align="left"><input type="checkbox" name="document_deposited" value="YES" <?php
									if(!isset($document_deposited)){$document_deposited=$eachrecord1['document_deposited'];}
									 if($document_deposited=="YES"){?> checked="checked"<?php }?> /></td>
                                  </tr>
                                  <tr>
                                  <td>&nbsp;</td>
                                    <td height="30" align="left">Fee Concession</td>
                                    <td align="left">:</td>
                                    <td align="left"><input name="fee_concession" type="text" id="admission_date" size="10" value="<?php 
									if(!isset($fee_concession)){$fee_concession = $eachrecord1['fee_concession'];}
									echo $fee_concession;  ?>"  /></td>
                                    <td align="left"></td>
                                    <td align="left"></td>
                                    <td align="left"></td>
                                  </tr>
                 <tr>
                   <td>&nbsp;</td>
                   <td height="30" align="left"><span class="narmal">Photo </span></td>
                   <td align="left">:</td>
                   <td colspan="2" align="left"><input name="pre_image" type="file" />
                     <input type="hidden" name="photo" value="<?php echo $eachrecord1['pre_image']; ?>"  /></td>
                   <td colspan="2" rowspan="3" align="left"><img src="images/student_photos/<?php echo  $eachrecord1['pre_image'];?>" width="127" height="105" border="0"/></td>
               </tr>
                 <tr>
                   <td>&nbsp;</td>
                   <td height="50" align="left"><span class="narmal">Hobbies</span></td>
                   <td align="left">:</td>
                   <td colspan="2" align="left"><textarea name="pre_hobbies" type="text" size="15"><?php echo $eachrecord1['pre_hobbies']; ?></textarea></td>
               </tr>
                 <tr>
                   <td>&nbsp;</td>
                   <td height="50" align="left"><span class="narmal">Remarks </span></td>
                   <td align="left">:</td>
                   <td colspan="2" align="left"><textarea name="test2" type="text" size="15"><?php echo $eachrecord1['test2']; ?></textarea></td>
               </tr>
                
             </table></td>
             <td width="1" class="bgcolor_02"></td>
          </tr>          
          <tr>
            <td height="25" colspan="3" class="bgcolor_02"><span class="admin"> &nbsp;&nbsp;Present Address</span></td>
          </tr>
          <tr>
             <td width="1" class="bgcolor_02"></td>
             <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="21%" height="50" align="left"><span class="narmal">Address</span></td>
                 <td width="1%" align="left">:</td>
                 <td colspan="4" align="left"><textarea name="pre_address1" type="text" size="15"><?php echo $eachrecord1['pre_address1']; ?></textarea><font color="#FF0000">&nbsp;*</font></td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td height="30" align="left"><span class="narmal">City</span></td>
                 <td align="left">:</td>
                 <td width="30%" align="left"><input name="pre_city1" type="text" size="15" value="<?php echo $eachrecord1['pre_city1']; ?>" /></td>
                 <td width="23%" align="left"><span class="narmal">State</span></td>
                 <td width="1%" align="left">:</td>
                 <td width="23%" align="left"><input name="pre_state1" type="text" id="pre_state1" value="<?php echo $eachrecord1['pre_state1']; ?>" size="15" /></td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td height="30" align="left"><span class="narmal">Pin Code </span></td>
                 <td align="left">:</td>
                 <td align="left"><input name="pre_pincode1" type="text" size="15" value="<?php echo $eachrecord1['pre_pincode1']; ?>" /></td>
                 <td align="left"><span class="narmal">Country</span></td>
                 <td align="left">:</td>
                 <td align="left"><input name="pre_country1" type="text" size="15" value="<?php echo $eachrecord1['pre_country1']; ?>" /></td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td height="30" align="left"><span class="narmal">Phone No </span></td>
                 <td align="left">:</td>
                 <td align="left"><input name="pre_phno1" type="text" size="15" value="<?php echo $eachrecord1['pre_phno1']; ?>" /></td>
                 <td align="left"><span class="narmal">Mobile No </span></td>
                 <td align="left">:</td>
                 <td align="left"><input name="pre_mobile1" type="text" size="15"  value="<?php echo $eachrecord1['pre_mobile1']; ?>"/><font color="#FF0000">&nbsp;*</font></td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td align="left">&nbsp;</td>
                 <td align="left">:</td>
                 <td align="left">&nbsp;</td>
                 <td colspan="3" align="left"><span style="color:#FF0000">(All future SMS messages will be sent to this number)</span></td>
               </tr>
             </table></td>
             <td width="1" class="bgcolor_02"></td>
          </tr>  
          <tr>
            <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Permanent  Address</span><span class="admin">             
					<input type="checkbox" name="sameaddress" id="sameaddress" value="0" onclick="javascript:getfieldvalues()" />
				Same as Above </span></td>
          </tr>
          <tr>
             <td width="1" class="bgcolor_02"></td>
             <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="21%" height="50" align="left"><span class="narmal">Addres</span></td>
                 <td width="1%" align="left">:</td>
                 <td colspan="4" align="left"><textarea name="pre_address"><?php echo $eachrecord1['pre_address']; ?></textarea></td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td height="30" align="left"><span class="narmal">City</span></td>
                 <td align="left">:</td>
                 <td width="30%" align="left"><input name="pre_city" type="text" size="15"  value="<?php echo $eachrecord1['pre_city']; ?>"/></td>
                 <td width="23%" align="left"><span class="narmal">State</span></td>
                 <td width="1%" align="left">:</td>
                 <td width="23%" align="left"><input name="pre_state" type="text" size="15"  value="<?php echo $eachrecord1['pre_state']; ?>"/></td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td height="30" align="left"><span class="narmal">Pin Code </span></td>
                 <td align="left">:</td>
                 <td align="left"><input name="pre_pincode" type="text" size="15" value="<?php echo $eachrecord1['pre_pincode']; ?>" /></td>
                 <td align="left"><span class="narmal">Country</span></td>
                 <td align="left">:</td>
                 <td align="left"><input name="pre_country" type="text" size="15"  value="<?php echo $eachrecord1['pre_country']; ?>"/></td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td height="30" align="left"><span class="narmal">Phone No </span></td>
                 <td align="left">:</td>
                 <td align="left"><input name="pre_phno" type="text" size="15"  value="<?php echo $eachrecord1['pre_phno']; ?>"/></td>
                 <td align="left"><span class="narmal">Mobile No </span></td>
                 <td align="left">:</td>
                 <td align="left"><input name="pre_mobile" type="text" size="15"  value="<?php echo $eachrecord1['pre_mobile']; ?>"/></td>
               </tr>
               
             </table></td>
             <td width="1" class="bgcolor_02"></td>
          </tr>  
          <tr>
            <td height="25" colspan="3" class="bgcolor_02"><span class="admin"> &nbsp;&nbsp;Contact Person Details </span></td>
          </tr>
          <tr>
             <td width="1" class="bgcolor_02"></td>
             <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="21%" height="30" align="left"><span class="narmal">Name</span></td>
                 <td width="1%" align="left">:</td>
                 <td width="30%" align="left"><input name="pre_contactname1" type="text" size="15" value="<?php echo $eachrecord1['pre_contactname1']; ?>" /></td>
                 <td width="23%" align="left"><span class="narmal">Contact No </span></td>
                 <td width="1%" align="left">:</td>
                 <td width="23%" align="left"><input name="pre_contactno1" type="text" size="15" value="<?php echo $eachrecord1['pre_contactno1']; ?>" /><font color="#FF0000">&nbsp;*</font></td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td height="30" align="left"><span class="narmal">Name</span></td>
                 <td align="left">:</td>
                 <td align="left"><input name="pre_contactname2" type="text" size="15"  value="<?php echo $eachrecord1['pre_contactname2']; ?>"/></td>
                 <td align="left"><span class="narmal">Contact No </span></td>
                 <td align="left">:</td>
                 <td align="left"><input name="pre_contactno2" type="text" size="15" value="<?php echo $eachrecord1['pre_contactno2']; ?>" /></td>
               </tr>
             </table></td>
             <td width="1" class="bgcolor_02"></td>
          </tr>  
          <tr>
            <td height="25" colspan="3" class="bgcolor_02"><span class="admin"> &nbsp;&nbsp;Student Previous Details</span></td>
          </tr>
          <tr>
             <td width="1" class="bgcolor_02"></td>
             <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="26%" height="30" align="left"><span class="narmal">&nbsp;Previous Academic </span></td>
                 <td width="2%" align="left">:</td>
                 <td width="71%" align="left"><span class="narmal">
                 <input type="text" name="pre_prev_acadamicname" value="<?php echo $eachrecord1['pre_prev_acadamicname']; ?>" />
                 </span></td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td height="30" align="left"><span class="narmal">Class Passed </span></td>
                 <td align="left">:</td>
                 <td align="left"><span class="narmal">
                   <input type="text" name="pre_prev_class" value="<?php echo $eachrecord1['pre_prev_class']; ?>" />
                 </span></td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td height="30" align="left"><span class="narmal">Board/University</span></td>
                 <td align="left">:</td>
                 <td align="left"><span class="narmal">
                   <input type="text" name="pre_prev_university" value="<?php echo $eachrecord1['pre_prev_university']; ?>" />
                   <input type="hidden" name="pre_current_acadamicname" value="<?php echo $eachrecord1['pre_current_acadamicname']; ?>" />
                 </span></td>
               </tr>
               
               <tr>
                 <td>&nbsp;</td>
                 <td>&nbsp;</td>
                 <td>&nbsp;</td>
                 <td>&nbsp;</td>
               </tr>
            </table></td>
             <td width="1" class="bgcolor_02"></td>
          </tr>  
          <tr>
            <td height="25" colspan="3" class="bgcolor_02"><table width="100%" border="0" cellpadding="0" cellspacing="0" >
               <tr class="bgcolor_02" height="22">
                 <td width="33%" height="25" align="center" class="admin">Institution</td>
                 <td width="33%" align="center" class="admin">Pervious %age</td>
                 <td width="34%" align="center"class="admin">Result</td>
              </tr></table></td>
          </tr>
          <tr>
             <td width="1" class="bgcolor_02"></td>
             <td><table width="100%" border="0" cellpadding="0" cellspacing="0" >
               
               <tr>
                 <td height="30" align="center" valign="middle">
                  <select name="pre_current_class1">
                                                        <option value="">-- Select --</option>
                                   
                                    <?php 
									$inst_arr1 = $db->getrows("SELECT * FROM es_institutes");
									if(!isset($pre_current_class1)){$pre_current_class1=$eachrecord1['pre_current_class1'];}
									if(count($inst_arr1)>0){
									foreach($inst_arr1  as $each){
									?>
                                    <option value="<?php echo $each['inst_id'];?>" <?php if($pre_current_class1==$each['inst_id']){echo "selected='selected'";}?>><?php echo ucwords($each['inst_name']); ?></option>
                                    <?php
									}
									}
									?>
                                    </select>
                                </td>
                 <td align="center" valign="middle"><input type="text" name="pre_current_percentage1" value="<?php echo $eachrecord1['pre_current_percentage1']; ?>" />
                 </td>
                 <td align="center" valign="middle"><input type="text" name="pre_current_result1" value="<?php echo $eachrecord1['pre_current_result1']; ?>" />
                 </td>
               </tr>
			   
              <?php /*?> <tr>
                 <td height="30" align="center" valign="middle">
                  <select name="pre_current_class2">
                                                        <option value="">-- Select --</option>
                                   
                                    <?php 
									$inst_arr2 = $db->getrows("SELECT * FROM es_institutes");
									if(!isset($pre_current_class2)){$pre_current_class2=$eachrecord1['pre_current_class2'];}
									if(count($inst_arr2)>0){
									foreach($inst_arr2  as $each){
									?>
                                    <option value="<?php echo $each['inst_id'];?>" <?php if($pre_current_class1==$each['inst_id']){echo "selected='selected'";}?>><?php echo ucwords($each['inst_name']); ?></option>
                                    <?php
									}
									}
									?>
                                    </select>
                  </td>
                 <td align="center" valign="middle"><input type="text" name="pre_current_percentage2" value="<?php echo $eachrecord1['pre_current_percentage2']; ?>" />
                 </td>
                 <td align="center" valign="middle"><input type="text" name="pre_current_result2"  value="<?php echo $eachrecord1['pre_current_result3']; ?>"/>
                 </td>
               </tr>
               <tr>
                 <td height="30" align="center" valign="middle"> <select name="pre_current_class3">
                                                        <option value="">-- Select --</option>
                                   
                                    <?php 
									$inst_arr3 = $db->getrows("SELECT * FROM es_institutes");
									if(!isset($pre_current_class3)){$pre_current_class3=$eachrecord1['pre_current_class3'];}
									if(count($inst_arr3)>0){
									foreach($inst_arr3  as $each){
									?>
                                    <option value="<?php echo $each['inst_id'];?>" <?php if($pre_current_class1==$each['inst_id']){echo "selected='selected'";}?>><?php echo ucwords($each['inst_name']); ?></option>
                                    <?php
									}
									}
									?>
                                    </select></td>
                 <td align="center" valign="middle"><input type="text" name="pre_current_percentage3" value="<?php echo $eachrecord1['pre_current_percentage3']; ?>" />
                 </td>
                 <td align="center" valign="middle"><input type="text" name="pre_current_result3" value="<?php echo $eachrecord1['pre_current_result3']; ?>" />
                 </td>
               </tr>
			   <?php */?>
             </table></td>
             <td width="1" class="bgcolor_02"></td>
          </tr>
          <tr>
            <td height="25" colspan="3" class="bgcolor_02"><span class="admin"> &nbsp;&nbsp;Student Physical Details </span></td>
          </tr>
          <tr>
             <td width="1" class="bgcolor_02"></td>
             <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="28%" height="30" align="left"><span class="narmal">Height</span></td>
                 <td width="2%" align="left">:</td>
                 <td width="69%" align="left"><input type="text" name="pre_height" value="<?php echo htmlentities($eachrecord1['pre_height']); ?>" /></td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td height="30" align="left"><span class="narmal">Weight</span></td>
                 <td align="left">:</td>
                 <td align="left"><input type="text" name="pre_weight" value="<?php echo $eachrecord1['pre_weight']; ?>" /></td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td height="30" align="left"><span class="narmal">Blood Group</span></td>
                 <td align="left">:</td>
                 <td align="left"><input type="text" name="pre_blood_group" value="<?php echo $eachrecord1['pre_blood_group']; ?>" /></td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td height="30" align="left"><span class="narmal">Allergies</span></td>
                 <td align="left">:</td>
                 <td align="left"><input type="text" name="pre_alerge" value="<?php echo $eachrecord1['pre_alerge']; ?>" /></td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td height="30" align="left"><span class="narmal"> Physical  Ability (If Disabled)</span></td>
                 <td align="left">:</td>
                 <td align="left"><input type="text" name="pre_physical_status" value="<?php echo $eachrecord1['pre_physical_status']; ?>" /></td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td height="30" align="left"><span class="narmal">Special Care Requirement </span></td>
                 <td align="left">:</td>
                 <td align="left"><input type="text" name="pre_special_care" value="<?php echo $eachrecord1['pre_special_care']; ?>" /></td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td height="50" align="left"><span class="narmal">Medication Details</span></td>
                 <td align="left">:</td>
                 <td align="left"><textarea name="test1" type="text" size="15"><?php echo $eachrecord1['test1']; ?></textarea></td>
               </tr>
               
             </table></td>
             <td width="1" class="bgcolor_02"></td>
          </tr>  
          
          <tr>
            <td height="25" colspan="3" class="bgcolor_02"><span class="admin"> &nbsp;&nbsp;TRANSPORT</span></td>
          </tr>
          <tr>
             <td width="1" class="bgcolor_02"></td>
             <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="28%" height="30" align="left"> Transport </td>
                 <td width="2%" align="left">:</td>
                 <td width="69%" align="left">
                 		 <?php
						 $allote_sql="SELECT * FROM es_trans_board_allocation_to_student WHERE student_staff_id=".$sid." AND `type`='student' ORDER BY id DESC LIMIT 0,1";
						 $allote_exe=mysql_query($allote_sql);
						 $allote_num=mysql_num_rows($allote_exe);
						 if($allote_num>=1){
							 $allote_row=mysql_fetch_array($allote_exe);
						 }
						 ?>
                         <input type="checkbox" name="transport" value="YES" <?php if(isset($allote_row['status']) && $allote_row['status']=='Active'){?> checked="checked"<?php }?> /></td>
               </tr>
                <tr>
                                                       <td width="1%">&nbsp;</td>
                                                       <td>Place</td>
                                                       <td>:</td>
                                                       <td><select name="tr_place_id">
                                                        <option value="">-- Select --</option>
                                   
                                    <?php 
									$trplaces_arr = $db->getrows("SELECT * FROM es_transport_places");
									if(!isset($tr_place_id)){$tr_place_id=$eachrecord1['tr_place_id'];}
									if(count($trplaces_arr)>0){
									foreach($trplaces_arr  as $each){
									?>
                                    <option value="<?php echo $each['tr_place_id'];?>" <?php if($tr_place_id==$each['tr_place_id']){echo "selected='selected'";}?>><?php echo ucwords($each['place_name']); ?></option>
                                    <?php
									}
									}
									?>
                                    </select> </td>
                                                    </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td height="30" align="left"> Route / Board </td>
                 <td align="left">:</td>
                 <td align="left">
                   <select name="boardid">
                   <option value="">Select Route/Board</option>
                   <?php
                   $route_sql="SELECT * FROM es_trans_route R WHERE R.status!='Delete'";
                   $route_exe=mysql_query($route_sql);
                   while($route_row=mysql_fetch_array($route_exe)){
				   $new_word =substr($route_row['route_Via'], 0, 25);
				   ?>
                   <optgroup label="<?php echo $route_row['route_title']." -(".$new_word.")"; ?>">
                   <?php
                   $board_sql="SELECT * FROM es_trans_board B WHERE B.status!='Delete' AND route_id=".$route_row['id'];
                   $board_exe=mysql_query($board_sql);
                   while($board_row=mysql_fetch_array($board_exe)){
					   $query_sql="SELECT * FROM es_trans_board_allocation_to_student WHERE status='Active' AND board_id=".$board_row['id'];
					   $query_exe=mysql_query($query_sql);
					   $query_num=mysql_num_rows($query_exe);
					   
					   if($query_num<$board_row['capacity'] || $allote_row['board_id']==$board_row['id']){
			   
                       ?>													   
                   <option value="<?php echo $board_row['id']; ?>" <?php if($boardid==$board_row['id'] || $allote_row['board_id']==$board_row['id']){?> selected="selected"<?php }?>><?php echo $board_row['board_title']; ?></option>
                   <?php }}?>
                   </optgroup>
                   <?php }?>
                   </select>
                 </td>
               </tr>             
             </table></td>
             <td width="1" class="bgcolor_02"></td>
          </tr>
          <tr>
             <td width="1" class="bgcolor_02"></td>
             <td align="center" height="40px"><input name="update" type="submit" class="bgcolor_02" value="Update" style="cursor:pointer" />&nbsp;<input name="Submit" type="button" onclick="newWindowOpen ('?pid=21&action=printstudent&print_class=<?php echo $eachrecord1['pre_class']; ?><?php echo $studentUrl;?>');" class="bgcolor_02" value="Print" style="cursor:pointer"/></td>
             <td width="1" class="bgcolor_02"></td>
          </tr>  
          
          
          
              
	  <tr>
		<td height="1" colspan="3" class="bgcolor_02"></td>
	  </tr>
</table>
</form>	
<?php

/**
* ********End of edit Student*********************************
*/
 //}
  } ?>	
		
<?php

/**
* ********Print option for Student*****************************
*/

 if($action=="printstudent")
{
?>	
<style>

body{
margin:0px;
}
.main-border{
border:#666666 1px solid;
}
.right-border{
font-family:Verdana, Arial, Helvetica, sans-serif;
font-size:12px;
color:#333333;
padding-left:10px;
border-right:#999999 1px solid;
border-right-style:dotted;
}

.right-border2{
font-family:Verdana, Arial, Helvetica, sans-serif;
font-size:12px;
color:#333333;
border-right:#999999 1px solid;
border-right-style:dotted;
}

.form-tex1{
font-family:Verdana, Arial, Helvetica, sans-serif;
font-size:11px;
color:#333333;
padding-left:10px;

}

.form-tex5{
font-family:Verdana, Arial, Helvetica, sans-serif;
font-size:12px;
color:#333333;
padding-left:10px;
padding-right:10px;
text-align:justify;
line-height:25px;
border-bottom:#666666 1px solid;
border-bottom-style:dotted;
}


.form-tex2{
font-family:Verdana, Arial, Helvetica, sans-serif;
font-size:12px;
color:#333333;
font-weight:bold;
}


.form-tex3{
font-family:Verdana, Arial, Helvetica, sans-serif;
font-size:12px;
color:#333333;
}

.form-tex4{
font-family:Verdana, Arial, Helvetica, sans-serif;
font-size:10px;
color:#333333;
}


.form-inner-border{
border-bottom:#666666 1px solid;
border-bottom-style:dotted;
}

.sig-border{
border:#333333 1px solid;
}

</style>
<table width="630" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td  align="left" valign="top" class="form-inner-border">
        <table width="630" border="0" cellspacing="0" cellpadding="2">
          <tr>
            <td width="278"  align="left" valign="middle" class="form-tex1">
            CANDIDATE'S NAME
            <br />
            (IN CAPITAL LETTER'S)            </td>
            <td width="24" align="center" valign="middle" class="form-tex2">:</td>
            <td width="328" align="left" valign="middle"><?php echo strtoupper($eachrecord1['pre_name']); ?></td>
          </tr>
          <tr>
            <td align="left" valign="middle" class="form-tex1">FATHER'S NAME</td>
            <td align="center" valign="middle" class="form-tex2">:</td>
            <td align="left" valign="middle"><?php echo strtoupper($eachrecord1['pre_fathername']); ?></td>
          </tr>
          <tr>
            <td  align="left" valign="middle" class="form-tex1">MOTHER'S NAME</td>
            <td align="center" valign="middle" class="form-tex2">:</td>
            <td align="left" valign="middle"><?php echo strtoupper($eachrecord1['pre_mothername']); ?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td align="left" valign="top" class="form-inner-border">
        
        <table width="630" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="295" align="left" valign="middle" class="right-border">
           
              <table width="100%" border="0" cellspacing="5" cellpadding="0">
              <tr>
                <td width="36%"  rowspan="2" align="left" valign="middle">DATE&nbsp;OF&nbsp;BIRTH&nbsp;</td>
                <td width="64%"  align="left" valign="middle" colspan=2>
                
                <?php echo formatDBDateTOCalender($eachrecord1['pre_dateofbirth']); ?> </td>
                
              </tr>
            </table></td>
            <td width="335" align="right" valign="middle" >
            
            <table width="100%" border="0" cellspacing="0" cellpadding="2">
              <tr>
                
                <td width="42%"  align="center" valign="middle" class="right-border">SEX</td>
                <td width="58%" align="center" valign="middle" class="form-tex1">CATEGORY</td>
              </tr>
              <tr>
                <td align="center" valign="middle" class="right-border2">
                <?php echo strtoupper($eachrecord1['pre_gender']); ?></td>
               <td width="58%" align="center" valign="middle" class="form-tex4">
            <?php
			$cat=$db->getRow("SELECT * FROM es_caste WHERE caste_id=".$eachrecord1['caste_id']);
			echo strtoupper($cat['caste']);
			?>
			 </td>
              </tr>
            </table></td>
            </tr>
        </table>        </td>
      </tr>
      <tr>
        <td align="left" valign="top" class="form-inner-border">
        <table width="630" border="0" cellspacing="0" cellpadding="2">
          <tr>
            <td width="202"  rowspan="2" align="left" valign="middle" class="form-tex1">NAME OF PREVIOUS SCHOOL</td>
            <td width="19" rowspan="2" align="center" valign="middle" class="form-tex2">:</td>
            <td width="214" rowspan="2" align="left" valign="middle" class="right-border2"><?php 
			if($eachrecord1['pre_current_class1']!='')
			{
			$cat1=$db->getRow("SELECT * FROM es_institutes WHERE inst_id=".$eachrecord1['pre_current_class1']);
			echo strtoupper($cat1['inst_name']); 
			}
			?>
			
			</td>
            <td width="195"  align="center" valign="middle" class="form-tex1">STATE OF RESIDENCY</td>
          </tr>
          <tr>
            <td align="center" valign="middle" class="form-tex1">
            
            RURAL 
            <input type="radio" name="res" / /> 
            URBAN
            
            <input type="radio" name="res" / />            </td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td  align="left" valign="middle" class="form-inner-border">
		<table width="630" border="0" cellspacing="0" cellpadding="2">
          <tr>
            <td width="460"  align="left" valign="middle">
			<table width="460" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="360"  rowspan="2" align="left" valign="top">
				<table width="360" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="171" align="left" valign="middle" class="form-tex1">PREVIOUS CLASS</td>
                    <td width="10" height="35" align="center" valign="middle" class="form-tex2">:</td>
                    <td width="179" align="left" valign="middle"><span class="narmal"><?php echo $eachrecord1['pre_prev_class']; ?></span></td>
                    </tr>
                  <tr>
                    <td  align="left" valign="middle" class="form-tex1">MEDIUM OF INSTRUCTION</td>
                    <td  align="center" valign="middle" class="form-tex2">:</td>
                    <td align="left" valign="middle">
					<textarea rows="1"></textarea>
					</td>
                    </tr>
                  <tr>
                    <td align="left" valign="middle" class="form-tex1">NAME OF BOARD</td>
                    <td align="center" valign="middle" class="form-tex2">:</td>
                    <td align="left" valign="middle"><span class="narmal"><?php echo $eachrecord1['pre_prev_university']; ?></span></td>
                    </tr>
                  <tr>
                    <td  align="left" valign="middle" class="form-tex1">COMPARTMENT MENTION SUBJECT</td>
                    <td  align="center" valign="middle" class="form-tex2">:</td>
                    <td align="left" valign="middle"><textarea rows="1"></textarea></td>
                    </tr>
                </table></td>
                <td width="100"  align="center" valign="top" class="form-tex1">RESULT</td>
              </tr>
              <tr>
                <td align="center" valign="top" class="form-tex4"><?php echo strtoupper($eachrecord1['pre_current_result1']); ?></td>
              </tr>
            </table></td>
            <td width="170" align="center" valign="middle" class="form-tex1">
           <img src="images/student_photos/<?php echo  $eachrecord1['pre_image'];?>" width="127" height="105" border="1"/></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td  align="left" valign="middle" class="form-inner-border"><table width="630" border="0" cellspacing="0" cellpadding="2">
          <tr>
            <td width="100" align="left" valign="top" class="form-tex1">ADDRESS :</td>
            <td width="230" align="left" valign="top"><?php echo $eachrecord1['pre_address']; ?><br>
              <?php echo $eachrecord1['pre_city1']; ?><br>
            <?php echo $eachrecord1['pre_pincode']; ?></td>
            <td width="300" align="left" valign="middle"><table width="300" border="0" cellspacing="0" cellpadding="2">
              <tr>
                <td width="116"  align="left" valign="top" class="form-tex1">TELEPHONE</td>
                <td width="16" align="center" valign="top" class="form-tex2">:</td>
                <td width="168" align="left" valign="top"><?php echo $eachrecord1['pre_phno']; ?></td>
              </tr>
              <tr>
                <td align="left" valign="top" class="form-tex1">STATE</td>
                <td align="center" valign="top" class="form-tex2">:</td>
                <td align="left" valign="top"><?php echo $eachrecord1['pre_state']; ?></td>
              </tr>
              <tr>
                <td align="left" valign="top" class="form-tex1">NATIONALITY</td>
                <td align="center" valign="top" class="form-tex2">:</td>
                <td align="left" valign="top"><?php echo $eachrecord1['pre_country']; ?></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td  align="left" valign="middle" class="form-inner-border"><table width="630" border="0" cellspacing="0" cellpadding="2">
          <tr>
            <td width="445"  align="left" valign="top">
			
			<table width="445" border="0" cellspacing="0" cellpadding="2">
              <tr>
                <td  colspan="2" align="center" valign="middle" class="form-tex1">SUBJECTS TO BE OPTED</td>
                </tr>
				<?php
				$subs=$db->getRow("SELECT subject_id_array FROM es_preadmission_details EPD,es_preadmission EP,subjects_cat SC WHERE EPD.es_preadmissionid=EP.es_preadmissionid AND EPD.pre_class=EP.pre_class AND SC.scat_id=EPD.scat_id AND EP.es_preadmissionid='".$eachrecord1['es_preadmissionid']."'");
				$subject_list=str_replace('@#@#@',',',$subs['subject_id_array']);
				if($subject_list!='')
				{
				$subjectslist=$db->getRows("SELECT * FROM es_subject WHERE es_subjectid IN(".$subject_list.")");
				$i=0;
				foreach($subjectslist as $each_subject)
				{
				if($i%2==0)
				{
				?>
              <tr>
			  <?php } ?>
                <td width="228"  align="center" valign="middle"><?php echo $each_subject['es_subjectname'];?></td>
             <?php 
			 $i++;
			  if($i%2==0)
				{
				?>
              <tr>
			  <?php } 
			  }
			  }
			  ?>
            </table>
			</td>
            <td width="185" align="center" valign="middle" class="form-tex1">
           <input type="text" size="3" maxlength="5" />% AGE IN  PREVIOUS EXAM
            </td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td  align="left" valign="middle" class="form-tex5" >
        
        <span class="form-tex2">DECLERATION :  </span>
        
        <br />
        
        I <?php echo $eachrecord1['pre_name']; ?> here by admit that all the entries made above are correct of my knowledge and i undertake to fully abide by rules and regulations of the school. 
        In all matters the decision of management committe shall be final and binding upon us.
        
        
        
         </td>
      </tr>
      <tr>
        <td  align="center" valign="middle" class="form-inner-border"><table width="600" border="0" cellspacing="0" cellpadding="2">
        
        
        <tr>
            <td  align="center" valign="middle" class="form-tex3" >Signature of Father / Gardian</td>
            <td>&nbsp;</td>
            <td align="center" valign="middle" class="form-tex3">Students Signature</td>
          </tr>
          <tr>
            <td width="255" class="sig-border">&nbsp;</td>
            <td width="88">&nbsp;</td>
            <td width="257" class="sig-border">&nbsp;</td>
          </tr>
          
        </table></td>
      </tr>
      <tr>
        <td height="200" align="left" valign="middle"><table width="630" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="210" align="left" valign="top" class="right-border2">
            
            
            
            <table width="210" border="0" cellspacing="0" cellpadding="2">
              <tr>
                <td align="center" valign="middle" class="form-tex1">Documents Attached</td>
              </tr>
              <tr>
                <td  align="center" valign="middle"><input type="text"  width="30"/></td>
              </tr>
              <tr>
                <td align="center" valign="middle"><input type="text"  width="30"/></td>
              </tr>
              <tr>
                <td  align="center" valign="middle"><input type="text"  width="30"/></td>
              </tr>
              <tr>
                <td  align="center" valign="middle"><input type="text"  width="30"/></td>
              </tr>
            </table></td>
            <td width="224" align="left" valign="top" class="right-border2">
            
            
            
            <table width="230" border="0" cellspacing="0" cellpadding="2">
              <tr>
                <td height="30" colspan="2" align="center" valign="middle" class="form-tex1">For Office Use Only</td>
                </tr>
              <tr>
                <td width="107"  align="left" valign="middle" class="form-tex1">Admission No:</td>
                <td width="117" align="left" valign="middle"><input type="text" size="6" maxlength="5"  width="20"/></td>
              </tr>
              <tr>
                <td align="left" valign="middle" class="form-tex1">Fee Receipt No:</td>
                <td align="left" valign="middle"><input type="text" size="6" maxlength="5"  width="20"/></td>
              </tr>
              <tr>
                <td  align="left" valign="middle" class="form-tex1">Ammount Deposited:</td>
                <td align="left" valign="middle"><input type="text" size="6" maxlength="5"  width="20"/></td>
              </tr>
              <tr>
                <td height="30" align="left" valign="middle" class="form-tex1">Remarks:</td>
                <td><input type="text" size="6"  width="20"/></td>
              </tr>
              <tr>
                <td  colspan="2" align="center" valign="middle"><table width="200" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td  align="center" valign="middle" class="form-tex1">Cheker's Signature</td>
                  </tr>
                  <tr>
                    <td class="sig-border">&nbsp;</td>
                  </tr>
                </table></td>
                </tr>
            </table></td>
            <td width="196" align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td  align="center" valign="middle" class="form-tex2">Principal Signature With Seal</td>
              </tr>
              <tr>
                <td height="130"  class="sig-border">&nbsp;</td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td align="left" valign="top">&nbsp;</td>
      </tr>
    </table>
</form>
<?php
/**
* ********End of Print option for Student*************************
*/

 }
 ?>
		
		
<?php

/**
* ********Students search with respect to class and reg.number*******
*/
?>
<?php
 if(($action=='classrecards')) {?>
 
 <script type="text/javascript">

					function fun()
					{ 
						 if(document.promotion.sm_class.value==""){
							alert("Select Class");		
							return false;
						}
						if(document.promotion.regnum.value==""){
							alert("Enter Registration Number");		
							return false;
						}
						
						return true;
							   
					}
 
                    
</script>				  
 
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr><td colspan="3" height="6"></td></tr>
	<tr>
	  <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;Update class record</td>
	</tr>
	<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<?php if (isset($error1) && $error1!="") { ?>
							<tr>
								<td height="25" colspan="3" align="center" ><strong>&nbsp;<?php echo $error1; ?></strong></td>
							</tr>
							<?php  }  ?>
				<form name="promotion" action="" method="post">
				<tr>
                  <td height="25" colspan="6" align="right" >
			                <font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font></td>
                 </tr>
				  
				 <tr>
                    <td height="25" colspan="6" align="center" >
			        </td>
                 </tr>
				<tr>
					<td width="10%" class="narmal">&nbsp;&nbsp;Class : </td>
					<td width="28%"  class="narmal"><select name="sm_class" style="width:180px;">
                         <option value="" >Select</option>
                       <?php 
					     if (count($allClasses)>0){
					      foreach($allClasses as $eachClass){
					   ?>
                         <option value="<?php echo $eachClass['es_classesid']; ?>"  <?php echo ($eachClass['es_classesid']==$sm_class)?"selected":""?>><?php echo $eachClass['es_classname']; ?></option>
                         <?php }} ?>
                     </select></td>
					<td width="17%" class="narmal">Registration&nbsp;No&nbsp;: </td>
				  <td width="31%" class="narmal">
				  <input type="text" name="regnum" id="regnum" value="<?php if(isset($regnum)&& $regnum!='') echo $regnum; ?>" size="8" /><font color="#FF0000">*</font></td>
					<td width="14%" class="narmal">
					
					<input name="classserch" type="submit" class="bgcolor_02" value="Search" onclick="return fun();" style="cursor:pointer"/></td>
				</tr>
				<tr><td height="10" colspan="3"></td></tr>
				</form>	
			</table>
		</td>
		<td width="1"class="bgcolor_02" ></td>
	</tr>
	<tr>
		<td height="19" width="1" class="bgcolor_02"></td>
		<td>&nbsp;</td>
		<td width="1" class="bgcolor_02"></td>
	</tr>					
	<tr><td width="1" class="bgcolor_02"></td>
		<td  align="center" valign="top" >	
        <?php if(isset($classserch) && $classserch!=""){ ?>	
			<table width="98%" border="1" cellspacing="0" cellpadding="0" class="tbl_grid">
			<form action="" method="post" name="updatestudents" onsubmit="return validateorder();">
			<input type="hidden" name="sm_class" value="<?php echo $sm_class; ?>" />
				<?php if (is_array($es_studentList)&&count($es_studentList)>0){?>
				<tr class="bgcolor_02">
					<td width="47"  align="center" height="25" >S&nbsp;NO</td>
					<td width="88"  align="center">Reg.&nbsp;No</td>
					<td width="245"  align="center">Name</td>
					<td width="185"  align="center">Class</td>
					<td width="212"  align="center">Academic Year</td>
					<td width="146"  align="center">Result</td>
				</tr>
		<?php
		
			$i = $start;			
			foreach ($es_studentList as $eachrecord){
				$i++ ;
			$zibracolor = ($i%2==0)?"even":"odd";
		?>
				<tr class="<?php echo $zibracolor;?>">
					<td height="26" align="center" valign="middle"><?php echo $i ; ?>
						<input type="hidden" value="<?php echo $eachrecord['es_preadmissionid'] ; ?>" name="updatestudentid[]" />
					</td>
					<td align="center" valign="middle" class="narmal"><?php echo $_SESSION['eschools']['student_prefix'];?><?php echo $eachrecord['es_preadmissionid'] ; ?></td>
					<td align="center" valign="middle" class="narmal"><?php echo $eachrecord['pre_name']; ?></td>
					<td align="center" valign="middle" class="narmal">
					<select name="up_class[]" style="width:100px;" onchange="JavaScript:document.all.submit();">
						<option value="" >Select Class</option>
			      <?php 
				  if (count($allClasses)>0){
					  foreach($allClasses as $eachClass) {?>					  
		<option <?php if($eachrecord['pre_class']==$eachClass['es_classesid']) { echo "selected='selected'"; } ?> value="<?php echo $eachClass['es_classesid']; ?>" > <?php echo $eachClass['es_classname']; ?></option>
				  <?php
	     		     }
					}
				  ?></select> 				
					</td>					
					<td align="center" valign="middle" class="narmal"><select name="ac_year[]" style="width:180px;">
                         <?php  foreach($school_details_res as $each_record) { ?>
                         <option value="<?php echo $each_record['es_finance_masterid'].$each_record['fi_ac_startdate'].$each_record['fi_ac_enddate']; ?>" <?php if ($each_record['es_finance_masterid']==$ac_year) { echo "selected"; }?>><?php echo displaydate($each_record['fi_ac_startdate'])." To ".displaydate($each_record['fi_ac_enddate']); ?> </option>
                         <?php } ?>
                     </select>
					</td>

					<td align="center" valign="middle" class="narmal"><select name="stustatus[]">
					<option value="pass" <?php if($eachrecord['status']=='pass') { echo "selected='selected'"; } ?>>P</option>
					<option value="fail" <?php if($eachrecord['status']=='fail') { echo "selected='selected'"; } ?>>F</option>
					<option value="resultawaiting" <?php if($eachrecord['status']=='resultawaiting') { echo "selected='selected'"; } ?>>R.A</option>
					<option value="inactive" <?php if($eachrecord['status']=='inactive') { echo "selected='selected'"; } ?>>T</option>
					</select>  
					</td>
				</tr>                         
<?php 
	}
 ?>
				<tr>
					<td colspan="6" align="center" valign="middle" >
	              <?php //echo paginateexte($start, $q_limit, $no_rows, "action=$action&sm_class=$sm_class&regnum=$regnum&classserch=$classserch"); ?> 
					</td>                           
				</tr>
				<tr>
				       <?php if(isset($sm_class) && $sm_class!=""){?>
					<td colspan="6" align="center" valign="middle" style="padding-top:10px;padding-bottom:10px;">
					<?php if(in_array('5_2',$admin_permissions)){?><input name="updatestudents" type="submit" class="bgcolor_02" value="Submit" style="cursor:pointer"/><?php }?>
						&nbsp;</td>
						<?php } ?>                           
				</tr>
				<tr>
				  <td colspan="6"><font color="#FF0000">*</font>P = Promoted&nbsp;&nbsp;&nbsp;<font color="#FF0000">*</font>F = Fail &nbsp;&nbsp;&nbsp;<font color="#FF0000">*</font>R.A = Result Awaited
				&nbsp;&nbsp;&nbsp;<font color="#FF0000">*</font>T = Transferred</td>
				</tr>
					
	      <?php }else{
	
	              echo "<tr class='narmal' >
							<td height='20' align='center' colspan='7' >No records found</td>
						</tr>
						";
							
		  } ?>				
				</form>
			</table>
            <?php } ?>
		</td>
		<td width="1" class="bgcolor_02"></td>
	</tr>
	<tr><td width="1" class="bgcolor_02"></td><td height="20" >&nbsp;</td><td width="1" class="bgcolor_02"></td></tr>
	<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>
</table>
<?php } ?>
		
<script type="text/javascript">
	function getfieldvalues(){

		if	(document.getElementById('sameaddress').checked){

			document.preadmission.pre_address.value=document.preadmission.pre_address1.value;
			document.preadmission.pre_city.value=document.preadmission.pre_city1.value;
			document.preadmission.pre_pincode.value=document.preadmission.pre_pincode1.value;
			document.preadmission.pre_phno.value=document.preadmission.pre_phno1.value;
			document.preadmission.pre_state.value=document.preadmission.pre_state1.value;
			document.preadmission.pre_resno.value=document.preadmission.pre_resno1.value;			
			document.preadmission.pre_mobile.value=document.preadmission.pre_mobile1.value;			
			document.preadmission.pre_country.value=document.preadmission.pre_country1.value;
			
		}else{
		
			document.preadmission.pre_address.value="";
			document.preadmission.pre_city.value="";
			document.preadmission.pre_pincode.value="";
			document.preadmission.pre_phno.value="";
			document.preadmission.pre_state.value="";
			document.preadmission.pre_resno.value="";
			document.preadmission.pre_mobile.value="";
			document.preadmission.pre_country.value="";
		}
		}
</script>		
			
<?php

/**
* ********Students search with respect to class and reg.number*******
*/

 if($action=='malefemalestudents') {?>
 
 
                    
		  
 
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr><td colspan="3" height="6"></td></tr>
	<tr>
	  <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;Class wise students</td>
	</tr>
	<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<form name="promotion" action="" method="post">
				 <tr>
                    <td height="25" colspan="6" align="center" >
			        </td>
                 </tr>
				<tr>
					<td width="10%" class="narmal">&nbsp;&nbsp;Class : </td>
					<td width="28%"  class="narmal"><select name="sm_class" style="width:130px;">
                      <option value="all">-- All --</option>
                      <?php 
				  if (count($allClasses)>0){
					  foreach($allClasses as $eachClass) {?>
                      <option value="<?php echo $eachClass['es_classesid']; ?>"
						 <?php echo ($eachClass['es_classesid']==$sm_class)?"selected":""?>> <?php echo $eachClass['es_classname']; ?></option>
                      <?php
				       }
					}
				  ?>
					  </select></td>
					<td width="10%" class="narmal">&nbsp;Academic&nbsp;Year:</td>
				  <td width="38%" class="narmal">
				  <select name="ac_year" style="width:180px;">
                       
                         <?php  foreach($school_details_res as $each_record) { ?>
                         <option value="<?php echo $each_record['es_finance_masterid']; ?>" <?php if ($each_record['es_finance_masterid']==$ac_year) { echo "selected"; }?>><?php echo displaydate($each_record['fi_ac_startdate'])." To ".displaydate($each_record['fi_ac_enddate']); ?> </option>
                         <?php } ?>
                  </select></td>
					<td width="14%" class="narmal">
					
					<input name="searchclasswise" type="submit" class="bgcolor_02" value="Search"  style="cursor:pointer"/></td>
				</tr>
				<tr><td height="10" colspan="3"></td></tr>
				</form>	
			</table>
		</td>
		<td width="1"class="bgcolor_02" ></td>
	</tr>
	<tr>
		<td height="19" width="1" class="bgcolor_02"></td>
		<td>&nbsp;</td>
		<td width="1" class="bgcolor_02"></td>
	</tr>					
	<tr><td width="1" class="bgcolor_02"></td>
	  <td  align="center" valign="top" >	
        <?php if(isset($searchclasswise) && $searchclasswise!=""){ ?>	
			<table width="98%" border="1" cellspacing="0" cellpadding="0" class="tbl_grid">
			
				<?php if (is_array($result_details)&&count($result_details)>0){?>
				<tr class="bgcolor_02">
					<td width="47"  align="center" height="25" >S&nbsp;NO</td>
				
					<td width="245"  align="center">Class</td>
					<td width="185"  align="center">Male Total </td>
					<td width="212"  align="center">Female Total </td>
					<td width="146"  align="center">Total</td>
				</tr>
		<?php
			$malegrandtotal=0;
			$femalegarndtotal=0;
		
			foreach ($result_details as $eachrecord){
				$i++ ;
			
			$zibracolor = ($i%2==0)?"even":"odd";
		?>
				<tr class="<?php echo $zibracolor;?>">
					<td height="26" align="center" valign="middle"><?php echo $i;?></td>
					
					<td align="center" valign="middle" class="narmal"><?php echo $eachrecord['es_classname'];?></td>
					<td align="center" valign="middle" class="narmal"><?php echo $eachrecord['maletotal']; $malegrandtotal+=$eachrecord['maletotal'];?></td>					
					<td align="center" valign="middle" class="narmal"><?php echo $eachrecord['femaletotal']; $femalegarndtotal+=$eachrecord['femaletotal'];
					$subtotal=($eachrecord['maletotal']+$eachrecord['femaletotal']);?></td>

					<td align="center" valign="middle" class="narmal"><?php echo $subtotal;?></td>
				</tr>                         
<?php 
	}
 ?>
				<tr>
					<td height="26" align="center" valign="middle"></td>
					
					<td align="center" valign="middle" class="narmal">Grand Total</td>
					<td align="center" valign="middle" class="narmal"><?php echo $malegrandtotal;?></td>					
					<td align="center" valign="middle" class="narmal"><?php echo $femalegarndtotal;?></td>

					<td align="center" valign="middle" class="narmal"><?php echo ($malegrandtotal+$femalegarndtotal);?></td>
				</tr> 
				
				<tr>
					<td colspan="6" align="center" valign="middle" >&nbsp;</td>                           
				</tr>
							
			<?php }?>
			</table>
			<?php }?>
        </td>
		<td width="1" class="bgcolor_02"></td>
	</tr>
	<tr><td width="1" class="bgcolor_02"></td><td height="20" >&nbsp;</td><td width="1" class="bgcolor_02"></td></tr>
	<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>
</table>
<?php } ?>