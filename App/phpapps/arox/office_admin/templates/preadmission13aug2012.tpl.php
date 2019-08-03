<?php

/**
* Only Admin users can view the pages
*/

if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}


/**
* ***********Pre admission for Students*****************************
*/


?>

<script language="javascript">
function set_focus() {
   document.preadmission.pre_hobbies.focus()
   return true
}

function isblank(s) {
  var len=s.length
  var i
  for(i=0;i<len;++i) {
    if (s.charAt(i) != " " ) return false
        }
    return true
}
function validatestid() {


 if(document.preadmission.pre_hobbies.value.length<4) {
   alert("Student Id cannot be left blank.");
     document.preadmission.pre_hobbies.focus();
   return false;
}}
function validate1stid() {
   if(document.preadmission.pre_hobbies1.value.length<2) {
   alert("Student Id cannot be left blank.");
     document.preadmission.pre_hobbies1.focus();
   return false;
}}
function validate2stid() {
 if(document.preadmission.pre_hobbies2.value.length<3) {
   alert("Student Id cannot be left blank.");
     document.preadmission.pre_hobbies2.focus();
   return false;
}
}

function go_back() {
        parent.history.back()
}
function go_forward() {
        parent.history.forward()
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
		</script>
<script type="text/javascript">
function getsubjects(countryid,selval)
		{   
		    
			url="?pid=55&action=getrooms&bid="+countryid+"&selval="+selval;
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
		<script>
 
function checkAge()
{

if(document.getElementById('pre_dateofbirth').value!='')
{


myDOB = document.getElementById('pre_dateofbirth').value.split('/');

myDate = myDOB[0];
myMonth= myDOB[1];
myYear = myDOB[2];

var age;
var now = new Date();
var todayDate = now.getDate();
var todayMonth = now.getMonth();
var todayYear = now.getFullYear();
if(todayYear < myYear)
{
alert('Eneter Valid Date');
return false;
}
else
{
if(myMonth > todayMonth+1)
{
age=todayYear-myYear-1;

month=12-myMonth+todayMonth+1;
}
else
{

age=todayYear-myYear;

month=todayMonth-myMonth+1;
}

document.getElementById('pre_age').value=age+'.'+month;

}
}
}

 </script>
<?php $max_std = $db->getone("SELECT COUNT(*) FROM es_preadmission");
	if($max_std==0){$reg_No = 1;}else{$reg_No = 1+$max_std;}
?>
<style type="text/css">
<!--
.style1 {
	color: #FF0000;
	font-weight: bold;
}
-->
</style>

<form method="post" name="preadmission" action="" enctype="multipart/form-data" >
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <!--DWLayoutTable-->
	<tr>
         <td width="4" height="3"></td>
         <td width="1206"></td>
         <td width="4"></td>
	</tr>
	<tr>
	    <td height="25" colspan="3" class="bgcolor_02"><span class="admin">&nbsp;&nbsp;Pre Admission</span></td>
	</tr>
	
	
	<tr>
		<td height="1604">&nbsp;</td>
        <td  valign="top">
			 <table width="100%" border="0" cellspacing="0" cellpadding="0">
			   <!--DWLayoutTable-->
			<?php if($action=='view') { ?>
			 <tr>
	    <td height="19" colspan="2" class="narmal"><span class="style1">Note: </span>To opt a different subject please click select class towards the field Class >> now select the class and the subject.</td>
	</tr><?php } ?>
				<tr>			
				   <td height="1377" colspan="2" align="right" valign="top">						
						 <table width="100%" border="0" cellspacing="0" cellpadding="0">
						   <!--DWLayoutTable-->
							<tr>
								<td width="23" height="30" align="left">&nbsp;</td>
                                <td align="left" width="139" class="narmal">Unique Id </td>
                                <td width="77">&nbsp;</td> 
								<td width="20" align="left" valign="top" class="narmal">:</td> 
								<td width="292" align="left" valign="top" class="narmal"><strong>
								  <?php
                                    $max_id=$db->getRow("SELECT MAX(es_preadmissionid) as max_id FROM es_preadmission");
									echo $max_id['max_id']+1;
									?>
								</strong></td>
							  <td width="77">&nbsp;</td>
						      <td width="580" align="right" class="narmal"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font></td>
						      <td width="4">&nbsp;</td>
						   </tr>
                            <tr>
								<td height="389" align="left">&nbsp;</td>
			    <td colspan="7" align="left" class="narmal"><table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <!--DWLayoutTable-->
                                  <tr>
                                   
                                    <td width="258" rowspan="2" align="left">Tittle</td>
                                    <td width="22" rowspan="2" align="left">:</td>
                                    <td width="544" rowspan="2" align="left" valign="top"><?php
								if(isset($pre_serialno) && $pre_serialno=="Mr" || isset($es_enquiryList[0]->eq_tittle) && $es_enquiryList[0]->eq_tittle=="Mr") 
								{$sel_gend_m= "selected='selected'"; }else{$sel_gend_m="";}
								if(isset($pre_serialno) && $pre_serialno=="Miss" || isset($es_enquiryList[0]->eq_tittle) && $es_enquiryList[0]->eq_tittle=='Miss') 
								{$sel_gend_miss = "selected='selected'";}else{$sel_gend_miss = ""; }
								/*?>if(isset($pre_serialno) && $pre_serialno=="Mrs" || isset($es_enquiryList[0]->eq_tittle) && $es_enquiryList[0]->eq_tittle=='Mrs') 
								{$sel_gend_mrs = "selected='selected'";}else{$sel_gend_mrs = ""; }<?php */	?>
                                      <select name="pre_serialno"  id="pre_serialno" style="width:120px;">
                                        <option value="" >Select Tittle </option>
                                        <option  value="Mr" <?php echo $sel_gend_m; ?> >Mast.</option>
                                        <option  value="Miss" <?php echo $sel_gend_miss; ?>>Miss</option>
										<?php /*?> <option  value="Mrs" <?php echo $sel_gend_mrs; ?>>Mrs</option><?php */?>
                                      </select>
                                    <font color="#FF0000"><b>*</b></font></td>
									 <td width="11" height="8"></td>
                                     <td width="350"></td>
                                  </tr>
                                  <tr>
                                    <td height="22"></td>
                                    <td rowspan="14" valign="top"></div>
    
                                      <table style="padding:20px;" class="regAlumni">
                                        <!--<form name="photoUpload" method="post" action="sub_stud_temp_photo.php" enctype="multipart/form-data" onSubmit="return validatePhoto()">-->
                                        <?php $query="select * from es_preadmission";
$res=mysql_query($query);
$ret=mysql_fetch_array($res);

?>
                                        
                                        <tr>
                                          <td align="right">
                                            <?php if(isset($_GET['filesuccess'])){?>			
                                            
                                            <img src="../images/student_photos/<?php echo $ret['pre_image'];?>" id="" style="border:solid 1px lightgray" width="120" height="120" alt="Recent Photo" />			
                                            <?php } else{?>			
                                            <img src="images/nophoto.jpg" id="photoBrowser" style="border:solid 1px lightgray" width="120" height="120" alt="Recent Photo" />
                                            
                                          <?php }?>			</td>	
	  </tr>
                                        <tr>
                                          <td align="right">
                                            <input type="file" name="pre_image" id="pre_image" />
                                          <!--<br/><br/>
			<input type="submit" name="photoUploadSubmit" value="Upload Photo" id="photoUploadSubmit" />	-->		</td>
	  </tr>	
                                        <!--</form>-->
                                      </table></td>
                                  </tr>
                                   <tr>
                                    <td height="30" align="left">Full&nbsp;Name of the Student </td>
                                    <td align="left">:</td>
                                    <td align="left"><input name="pre_fathersoccupation" type="text" size="15" value="<?php if (isset($es_enquiryList[0]->eq_name)) {	echo $es_enquiryList[0]->eq_name;}else{echo $pre_fathersoccupation; } ?>"/></td>
                                   
                                     <td>&nbsp;</td>
                                  </tr>
								  <tr><td height="30" align="left" valign="top">Gender</td>
                                    <td align="left" valign="top">:</td>
                                    <td align="left" valign="top"><?php
								if(isset($pre_gender) && $pre_gender=="male" || isset($es_enquiryList[0]->eq_sex) && $es_enquiryList[0]->eq_sex=="male") 
								{$sel_gend_m= "selected='selected'"; }else{$sel_gend_m="";}
								if(isset($pre_gender) && $pre_gender=="female" || isset($es_enquiryList[0]->eq_sex) && $es_enquiryList[0]->eq_sex=='female') 
								{$sel_gend_fm = "selected='selected'";}else{$sel_gend_fm = ""; }
								?>
                                      <select name="pre_gender"  id="pre_gender" style="width:120px;">
                                        <option value="" >Select Gender </option>
                                        <option  value="male" <?php echo $sel_gend_m; ?> >Male</option>
                                        <option  value="female" <?php echo $sel_gend_fm; ?>>Female</option>
                                      </select>
                                      <font color="#FF0000"><b>*</b></font></td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  
								    
                                  <tr>
                                    <td height="30" align="left">Date Of Birth</td>
                                    <td align="left">:</td>
                                    <td align="left"><table width="83%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td width="30%"><input name="pre_dateofbirth" type="text" id="pre_dateofbirth" size="10" value="<?php if (isset($es_enquiryList[0]->eq_dob)) {	echo func_date_conversion("Y-m-d","d/m/Y",$es_enquiryList[0]->eq_dob);}else{echo $pre_dateofbirth; } ?>" readonly="readonly" /></td>
                                        <td width="70%"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.preadmission.pre_dateofbirth);return false;" ><img src="<?php echo JS_PATH ?>/WeekPicker/calbtn.gif" alt="Calender" name="popcal" width="34" height="22" border="0" align="absmiddle" id="popcal" /></a><font color="#FF0000"><b>&nbsp;*</b></font></td>
                                      </tr>
                                    </table></td>
                                    <td>&nbsp;</td>
                                  </tr>
								  
								   <tr>
                                    <td height="30" align="left">Age</td>
                                    <td align="left">:</td>
                                    <td align="left"><table border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td><input name="pre_age" id='pre_age' type="text" size="15" value="<?php echo $pre_age;?>" onfocus='Javascript:checkAge();' readonly="readonly"/>
										(<span id="internal-source-marker_0.1335878380918223">Click to display </span>Age in years &amp; months)</td>
                                        <td></td>
                                      </tr>
                                    </table></td>
                                    <td>&nbsp;</td>
                                  </tr>
								  
										  
								  
								   
								  
								 
								  
								 
								 
								 								  
								  
                                 <?php /*?> <tr>
                                   <font color="#FF0000"><b>*</b></font></td>
                                    <td align="left">Subjects</td>
                                    <td align="left">:</td>
                                    <td align="left">
									<?php if(isset($pre_class) && $pre_class>=1){ ?>
									<select name="scat_id" >
                                      <option value="">Select Subject</option>
                                   <?php 
									
									if(isset($pre_class) && $pre_class>=1){
									
									$sub_cat_arr = $db->getrows("SELECT * FROM subjects_cat WHERE classid='".$pre_class."'");
									}
									
									
									if(count($sub_cat_arr)>0){
									foreach($sub_cat_arr  as $each){
									?>
                                    <option value="<?php echo $each['scat_id'];?>" <?php 
									if($scat_id==$each['scat_id']){echo "selected='selected'";}?>><?php echo $each['scat_name']; ?></option>
                                    <?php
									}
									}
									
									
									?>
                                    </select><?php } elseif($es_enquiryList[0]->scat_id!='')  {?><?php ?><input type="text" name="scat_id" value="<?php 
									$online_sql="select * from subjects_cat where scat_id	=".$es_enquiryList[0]->scat_id;
 $online_row=$db->getRow($online_sql);
									
									
									if($online_row['scat_name']!='') { echo $online_row['scat_name'];} else { echo "---";}?>" readonly="readonly" style="width:110px;"/> <?php } ?> 	<font color="#FF0000"><b>*</b></font></td>
                                  </tr><?php */?>
								 
								 
								 
								 
								 <?php /*?> <tr>
                                   <?php /*?> <td height="30" align="left">Branch</td>
                                    <td align="left">:</td>
                                    <td align="left"><input name="es_branch" type="text" id="es_branch" size="15" value="<?php echo $es_branch;?>"  />
                                    <font color="#FF0000"><b>*</b></font></td>
                                  </tr>
								  <tr>									
									<td class="narmal" align="left" height="30">Level</td>
									<td>:</td>
									<td><select name="pre_contactname2" id="pre_contactname2" style="width:150px;"/>
									<option value="" >Select Level </option>
									<option value="PG"<?php if($pre_contactname2=="PG") {	echo "selected";} ?> >PG
									</option>
									<option value="UG"<?php if($pre_contactname2=="UG") {	echo "selected";} ?> >UG
									</option>
									
									</select>
									</td>
							   </tr> <?php */?>
							   <tr>
                                    <td height="22" align="left">Nationality</td>
                                    <td align="left">:</td>
                                    <td align="left">
				<input type="text" name="es_home"  size="15" value="<?php echo $es_home;?>"/></td>
                                    <td>&nbsp;</td>
                                    <td width="4">&nbsp;</td>
					  </tr>
							   <tr>
                                    <td height="30" align="left">Caste Category </td>
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
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                      </tr>
								  
								  <tr>
                                    <td height="22" align="left">Caste</td>
                                    <td align="left">:</td>
                                    <td align="left">
				<input type="text" name="es_home"  size="15" value="<?php echo $es_home;?>"/></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
								  </tr>
							   <tr>
                                    <td height="30" align="left">Mother Tongue </td>
                                    <td align="left">:</td>
                                    <td align="left"><input name="pre_fathersoccupation" type="text" size="15" value="<?php if (isset($es_enquiryList[0]->eq_name)) {	echo $es_enquiryList[0]->eq_name;}else{echo $pre_fathersoccupation; } ?>"/></td>
                                   
                                     <td>&nbsp;</td>
                      </tr>
					  <tr>
                                    <td height="30" align="left">Full&nbsp;Name of the Student </td>
                                    <td align="left">:</td>
                                    <td align="left"><input name="pre_fathersoccupation" type="text" size="15" value="<?php if (isset($es_enquiryList[0]->eq_name)) {	echo $es_enquiryList[0]->eq_name;}else{echo $pre_fathersoccupation; } ?>"/></td>
                                   
                                     <td>&nbsp;</td>
                      </tr>
								   <tr>
                                   
                                    <td height="22" align="left" valign="top">E-mail</td>
                                    <td align="left" valign="top">:</td>
                                    <td align="left" valign="top"><input name="pre_emailid" type="text" size="15" value="<?php if (isset($es_enquiryList[0]->eq_emailid) && $es_enquiryList[0]->eq_emailid!=''){echo $es_enquiryList[0]->eq_emailid; } else { echo $pre_emailid;  } ?>" /></td>
                                  </tr>
								  
								  
                                  <tr>
                                    <td height="30" align="left">User  Name </td>
                                    <td align="left">:</td>
                                    <td align="left"><input name="pre_student_username" type="text" id="pre_student_username" size="15" value="<?php echo $pre_student_username; ?>"  />
                                    <font color="#FF0000"><b>*</b></font></td>
                                    <td>&nbsp;</td>
                                  </tr>
									<tr>
                                    <td height="22" align="left">Password </td>
                                    <td align="left">:</td>
                                    <td align="left"><input name="pre_student_password" type="password" id="pre_student_password"   size="15"  />
                                      <font color="#FF0000"><b>*</b></font></td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  
								 <!-- <tr>
								  <td align="left" height="30">Home</td>
                                    <td align="left">:</td>
                                    <td align="left"><input name="es_home" id='es_home' type="text" size="15" value="<?php //echo $es_home;?>" />
                                   </td>
                                  </tr>-->
								 <!-- <tr>-->
								  <?php /*?><td align="left" height="30">Hostel</td>
                                    <td align="left">:</td>
                                    <td align="left">
								
									<input type="checkbox" name="es_home" value="YES" <?php if($es_home=="YES"){?> checked="checked"<?php }?> />
									
								                                   </td>
                                  </tr>
								   <tr>
								  <td align="left" height="30">Building</td>
                                    <td align="left">:</td>
                                    <td align="left">
																	
								<select name="es_buldname" onChange="getsubjects(this.value,'');" ><option value="">-- Select --</option>
			<?php foreach($getbuldinglist as $eachrecord) { ?>
			<option value="<?php echo $eachrecord['es_hostelbuldid'];?>"<?php echo ($eachrecord['es_hostelbuldid'] ==$es_buldname)?"selected":""?>><?php echo $eachrecord['buld_name'];?></option>
			<?php } ?>
			</select>
                                   </td>
                                  </tr>
								   <tr>
								  <td align="left" height="30">Room</td>
                                    <td align="left">:</td>
                                     <td width="317" class="narmal" id="subjectselectbox"><select name="es_hostelroomid" id="s_submodule" style="width:150px;">
             <option value="">-- Select --</option>
			        
           </select></td><?php */?>
                                  <!--</tr>-->
								  <?php //if($es_buldname!=""){
					
					 ?>
<!--<script type="text/javascript">-->
<!--getsubjects('<?php //echo $es_buldname; ?>','<?php //echo $es_hostelroomid;?>');-->
<!--</script>-->
<?php //} ?>	
		   
                                </table></td>
							</tr>
							 
							 
                              <tr>
								<td align="left" height="10" colspan="3"></td>
								<td align="left"></td>
								<td align="left"></td>
								<td align="left"></td>
								<td align="left"></td>
								<td align="left"></td>
                              </tr>
							 
                             <tr>
								<td height="23" class="bgcolor_02" align="left" valign="middle" colspan="8"><span class="admin">&nbsp;Father Details </span></td>
                             </tr>
                                
                              <tr>
								<td height="144" align="left" valign="middle"></td>
                                <td colspan="7" align="left" valign="middle" class="narmal"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <!--DWLayoutTable-->
                                  
                                  <tr>
                                    <td width="242" height="30" align="left"><span class="narmal">Name </span></td>
                                    <td width="25" align="left">:</td>
                                    <?php 
									$city1=$es_enquiryList[0]->eq_city ;
									?>
                                    <td width="314" align="left"><input name="pre_city1" type="text" size="15" value="<?php if(isset($es_enquiryList[0]->eq_city) && $city1!=''  ){ echo $es_enquiryList[0]->eq_city; } else { echo $pre_city1; } ?>" /></td>
                                    <td width="203" align="left"><span class="narmal">Date of Birth </span></td>
                                    <td width="12" align="left">:</td>
                                    <td width="393" align="left"><input name="pre_state1" size="15" type="text" value="<?php if(isset($es_enquiryList[0]->eq_state) && $es_enquiryList[0]->eq_state!=''){ echo $es_enquiryList[0]->eq_state; } else { echo $pre_state1; } ?>" /></td>
                                  </tr>
								  
                                  <tr>
                                    <td height="30" align="left"><span class="narmal">Qualifications</span></td>
                                    <td align="left">:</td>
                                    <td align="left"><input name="pre_country1" type="text" size="15" value="<?php if (isset($es_enquiryList[0]->eq_countryid) && $es_enquiryList[0]->eq_countryid!='') {	echo $es_enquiryList[0]->eq_countryid;}else{echo $pre_country1; } ?>" /></td>
                                    <td align="left"><span class="narmal">Occupation</span></td>
                                    <td align="left">:</td>
                                    <td align="left"><input name="pre_pincode1" type="text" size="15" value="<?php if (isset($es_enquiryList[0]->eq_zip) && $es_enquiryList[0]->eq_zip!='') {	echo $es_enquiryList[0]->eq_zip;}else{echo $pre_pincode1; } ?>" /></td>
                                  </tr>
                                  <tr>
                                    <td height="40" align="left" valign="top"><span class="narmal">Office Address</span></td>
                                    <td align="left" valign="top">:</td>
                                    <td rowspan="2" align="left" valign="top"><textarea name="pre_address1" type="text" size="15"><?php 
								if (isset($es_enquiryList[0]->eq_address) && $es_enquiryList[0]->eq_address!=''){
								echo htmlentities($es_enquiryList[0]->eq_address);
								}else{ 
								echo htmlentities($pre_address1);
								} ?>
                                    </textarea>                                      <font color="#FF0000"><b>*</b></font></td>
                                  <td rowspan="2" valign="middle">Office Phone / Mobile </td>
                                    <td rowspan="2" valign="middle">:</td>
                                    <td rowspan="2" valign="middle"><input name="pre_pincode1" type="text" size="15" value="<?php if (isset($es_enquiryList[0]->eq_zip) && $es_enquiryList[0]->eq_zip!='') {	echo $es_enquiryList[0]->eq_zip;}else{echo $pre_pincode1; } ?>" /></td>
                                  </tr>
                                  <tr>
                                    <td height="1"></td>
                                    <td></td>
                                  </tr>
								  <tr>
                                   
                                    <td height="22" align="left" valign="top">E-mail</td>
                                    <td align="left" valign="top">:</td>
                                    <td align="left" valign="top"><input name="pre_emailid" type="text" size="15" value="<?php if (isset($es_enquiryList[0]->eq_emailid) && $es_enquiryList[0]->eq_emailid!=''){echo $es_enquiryList[0]->eq_emailid; } else { echo $pre_emailid;  } ?>" /></td>
                                    <td colspan="3" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                  </tr>
								  
                                  <tr>
                                    <td height="19"></td>
                                    <td></td>
                                    <td></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  
                                  
                                </table></td>
                           </tr>
							 
							  <tr>
								 <td height="23" class="bgcolor_02" align="left" valign="middle" colspan="8"><span class="admin">&nbsp;Mother Details </span></td>
							  </tr>
							  
							  <tr>
								<td height="110" align="left">&nbsp;</td>
								<td colspan="7" align="left" class="narmal"><table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <!--DWLayoutTable-->
                                  
                                  <tr>
                                    <td width="246" height="30" align="left"><span class="narmal">Name </span></td>
                                    <td width="23" align="left">:</td>
                                    <?php 
									$city1=$es_enquiryList[0]->eq_city ;
									?>
                                    <td width="302" align="left"><input name="pre_city1" type="text" size="15" value="<?php if(isset($es_enquiryList[0]->eq_city) && $city1!=''  ){ echo $es_enquiryList[0]->eq_city; } else { echo $pre_city1; } ?>" /></td>
                                    <td width="200" align="left"><span class="narmal">Date of Birth </span></td>
                                    <td width="18" align="left">:</td>
                                    <td width="400" align="left" valign="top"><input name="pre_state1" size="15" type="text" value="<?php if(isset($es_enquiryList[0]->eq_state) && $es_enquiryList[0]->eq_state!=''){ echo $es_enquiryList[0]->eq_state; } else { echo $pre_state1; } ?>" /></td>
                                  </tr>
								  
                                  <tr>
                                    <td height="30" align="left"><span class="narmal">Qualifications</span></td>
                                    <td align="left">:</td>
                                    <td align="left"><input name="pre_country1" type="text" size="15" value="<?php if (isset($es_enquiryList[0]->eq_countryid) && $es_enquiryList[0]->eq_countryid!='') {	echo $es_enquiryList[0]->eq_countryid;}else{echo $pre_country1; } ?>" /></td>
                                    <td align="left"><span class="narmal">Occupation</span></td>
                                    <td align="left">:</td>
                                    <td align="left" valign="top"><input name="pre_pincode1" type="text" size="15" value="<?php if (isset($es_enquiryList[0]->eq_zip) && $es_enquiryList[0]->eq_zip!='') {	echo $es_enquiryList[0]->eq_zip;}else{echo $pre_pincode1; } ?>" /></td>
                                  </tr>
                                  <tr>
                                    <td height="41" align="left" valign="top"><span class="narmal">Office Address</span></td>
                                    <td align="left" valign="top">:</td>
                                    <td rowspan="2" align="left" valign="top"><textarea name="pre_address1" type="text" size="15"><?php 
								if (isset($es_enquiryList[0]->eq_address) && $es_enquiryList[0]->eq_address!=''){
								echo htmlentities($es_enquiryList[0]->eq_address);
								}else{ 
								echo htmlentities($pre_address1);
								} ?>
                                    </textarea>                                      <font color="#FF0000"><b>*</b></font></td>
                                  <td rowspan="2" valign="middle">Office Phone / Mobile </td>
                                    <td rowspan="2" valign="middle">:</td>
                                    <td rowspan="2" valign="middle"><input name="pre_pincode1" type="text" size="15" value="<?php if (isset($es_enquiryList[0]->eq_zip) && $es_enquiryList[0]->eq_zip!='') {	echo $es_enquiryList[0]->eq_zip;}else{echo $pre_pincode1; } ?>" /></td>
                                  </tr>
								  <tr>
                                    <td height="1"></td>
                                    <td></td>
                                  </tr>
								  <tr>
                                   
                                    <td height="22" align="left" valign="top">E-mail</td>
                                    <td align="left" valign="top">:</td>
                                    <td align="left" valign="top"><input name="pre_emailid" type="text" size="15" value="<?php if (isset($es_enquiryList[0]->eq_emailid) && $es_enquiryList[0]->eq_emailid!=''){echo $es_enquiryList[0]->eq_emailid; } else { echo $pre_emailid;  } ?>" /></td>
                                    <td colspan="3" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                  </tr>
                                </table></td>
						   </tr>
						   <tr>
								 <td height="23" class="bgcolor_02" align="left" valign="middle" colspan="8"><span class="admin">&nbsp;Parents Residencial  Details </span></td>
						   </tr>
							  
							  <tr>
								<td height="110" align="left">&nbsp;</td>
								<td colspan="7" align="left" class="narmal"><table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <!--DWLayoutTable-->
                                  
                                  <tr>
                                    <td width="255" height="30" align="left"><span class="narmal">Residencial Address </span></td>
                                    <td width="23" align="left">:</td>
                                    <?php 
									$city1=$es_enquiryList[0]->eq_city ;
									?>
                                    <td width="293" align="left"><textarea name="pre_address1" type="text" size="15"><?php 
								if (isset($es_enquiryList[0]->eq_address) && $es_enquiryList[0]->eq_address!=''){
								echo htmlentities($es_enquiryList[0]->eq_address);
								}else{ 
								echo htmlentities($pre_address1);
								} ?>
                                    </textarea></td>
                                    <td width="200" align="left"><span class="narmal">Residencial Phone </span></td>
                                    <td width="18" align="left">:</td>
                                    <td width="400" align="left" valign="top"><input name="pre_state1" size="15" type="text" value="<?php if(isset($es_enquiryList[0]->eq_state) && $es_enquiryList[0]->eq_state!=''){ echo $es_enquiryList[0]->eq_state; } else { echo $pre_state1; } ?>" /></td>
                                  </tr>
								  
                                  <tr>
                                    <td height="30" align="left">Residencial Phone </td>
                                    <td align="left">:</td>
                                    <td align="left"><input name="pre_country1" type="text" size="15" value="<?php if (isset($es_enquiryList[0]->eq_countryid) && $es_enquiryList[0]->eq_countryid!='') {	echo $es_enquiryList[0]->eq_countryid;}else{echo $pre_country1; } ?>" /></td>
                                    <td align="left"><span class="narmal">Occupation</span></td>
                                    <td align="left">:</td>
                                    <td align="left" valign="top"><input name="pre_pincode1" type="text" size="15" value="<?php if (isset($es_enquiryList[0]->eq_zip) && $es_enquiryList[0]->eq_zip!='') {	echo $es_enquiryList[0]->eq_zip;}else{echo $pre_pincode1; } ?>" /></td>
                                  </tr>
                                  <tr>
                                    <td height="41" align="left" valign="top"><span class="narmal">Annual Income Fathers: Rs. </span></td>
                                    <td align="left" valign="top">:</td>
                                    <td rowspan="2" align="left" valign="top"><textarea name="pre_address1" type="text" size="15"><?php 
								if (isset($es_enquiryList[0]->eq_address) && $es_enquiryList[0]->eq_address!=''){
								echo htmlentities($es_enquiryList[0]->eq_address);
								}else{ 
								echo htmlentities($pre_address1);
								} ?>
                                    </textarea>                                      <font color="#FF0000"><b>*</b></font></td>
                                  <td rowspan="2" valign="middle">Mothgers: Rs. </td>
                                    <td rowspan="2" valign="middle">:</td>
                                    <td rowspan="2" valign="middle"><input name="pre_pincode1" type="text" size="15" value="<?php if (isset($es_enquiryList[0]->eq_zip) && $es_enquiryList[0]->eq_zip!='') {	echo $es_enquiryList[0]->eq_zip;}else{echo $pre_pincode1; } ?>" /></td>
                                  </tr>
								  <tr>
                                    <td height="1"></td>
                                    <td></td>
                                  </tr>
								  <tr>
                                   
                                    <td height="22" align="left" valign="top">E-mail</td>
                                    <td align="left" valign="top">:</td>
                                    <td align="left" valign="top"><input name="pre_emailid" type="text" size="15" value="<?php if (isset($es_enquiryList[0]->eq_emailid) && $es_enquiryList[0]->eq_emailid!=''){echo $es_enquiryList[0]->eq_emailid; } else { echo $pre_emailid;  } ?>" /></td>
                                    <td colspan="3" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                  </tr>
                                </table></td>
						   </tr>
						   <tr>
								 <td height="23" class="bgcolor_02" align="left" valign="middle" colspan="8"><span class="admin">&nbsp;Guardian   Details </span></td>
						   </tr>
							  
							  <tr>
								<td height="110" align="left">&nbsp;</td>
								<td colspan="7" align="left" class="narmal"><table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <!--DWLayoutTable-->
                                  
                                  <tr>
                                    <td width="246" height="30" align="left"><span class="narmal">Name </span></td>
                                    <td width="23" align="left">:</td>
                                    <?php 
									$city1=$es_enquiryList[0]->eq_city ;
									?>
                                    <td width="302" align="left"><input name="pre_country1" type="text" size="15" value="<?php if (isset($es_enquiryList[0]->eq_countryid) && $es_enquiryList[0]->eq_countryid!='') {	echo $es_enquiryList[0]->eq_countryid;}else{echo $pre_country1; } ?>" /></td>
                                    <td width="200" align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td width="18" align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td width="400" align="left" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                  </tr>
								  
                                  <tr>
                                    <td height="30" align="left">Qualifications </td>
                                    <td align="left">:</td>
                                    <td align="left"><input name="pre_country1" type="text" size="15" value="<?php if (isset($es_enquiryList[0]->eq_countryid) && $es_enquiryList[0]->eq_countryid!='') {	echo $es_enquiryList[0]->eq_countryid;}else{echo $pre_country1; } ?>" /></td>
                                    <td align="left"><span class="narmal">Occupation</span></td>
                                    <td align="left">:</td>
                                    <td align="left" valign="top"><input name="pre_pincode1" type="text" size="15" value="<?php if (isset($es_enquiryList[0]->eq_zip) && $es_enquiryList[0]->eq_zip!='') {	echo $es_enquiryList[0]->eq_zip;}else{echo $pre_pincode1; } ?>" /></td>
                                  </tr>
                                  <tr>
                                    <td height="19" align="left" valign="top"><span class="narmal">Office Phone </span></td>
                                    <td align="left" valign="top">:</td>
                                    <td rowspan="2" align="left" valign="top"><input name="pre_country1" type="text" size="15" value="<?php if (isset($es_enquiryList[0]->eq_countryid) && $es_enquiryList[0]->eq_countryid!='') {	echo $es_enquiryList[0]->eq_countryid;}else{echo $pre_country1; } ?>" /></td>
                                  <td rowspan="2" valign="middle">Residence Phone / Mobile </td>
                                    <td rowspan="2" valign="middle">:</td>
                                    <td rowspan="2" valign="middle"><input name="pre_pincode1" type="text" size="15" value="<?php if (isset($es_enquiryList[0]->eq_zip) && $es_enquiryList[0]->eq_zip!='') {	echo $es_enquiryList[0]->eq_zip;}else{echo $pre_pincode1; } ?>" /></td>
                                  </tr>
								  <tr>
                                    <td height="2"></td>
                                    <td></td>
                                  </tr>
								  <tr>
                                   
                                    <td height="22" align="left" valign="top">E-mail</td>
                                    <td align="left" valign="top">:</td>
                                    <td align="left" valign="top"><input name="pre_emailid2" type="text" size="15" value="<?php if (isset($es_enquiryList[0]->eq_emailid) && $es_enquiryList[0]->eq_emailid!=''){echo $es_enquiryList[0]->eq_emailid; } else { echo $pre_emailid;  } ?>" /></td>
                                    <td colspan="3" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                  </tr>
								  <tr>
                                   
                                    <td height="35" align="left" valign="top">Residencial Address </td>
                                    <td align="left" valign="top">:</td>
                                    <td align="left" valign="top"><textarea name="pre_address1" type="text" size="15"><?php 
								if (isset($es_enquiryList[0]->eq_address) && $es_enquiryList[0]->eq_address!=''){
								echo htmlentities($es_enquiryList[0]->eq_address);
								}else{ 
								echo htmlentities($pre_address1);
								} ?>
                                    </textarea></td>
                                    <td colspan="3" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                  </tr>
                                </table></td>
						   </tr>
							  <tr><td align="left" height="4" colspan="3"></td>
							    <td align="left"></td>
							    <td align="left"></td>
							    <td align="left"></td>
							    <td align="left"></td>
							    <td align="left"></td>
							  </tr>
							  <tr>
								 <td align="left" height="23" colspan="8" valign="middle" class="bgcolor_02" >&nbsp;&nbsp;<span class="admin">Details of siblings, if any, of the student </span></td>
							  </tr>
							  <tr>
								<td height="10" align="left" valign="top"></td>
								<td></td>
							    <td></td>
							    <td></td>
							    <td></td>
							    <td></td>
							    <td></td>
							    <td></td>
							  </tr>
							  <tr>
							    <td height="82" align="left" valign="top"></td>
							    <td colspan="7" align="left" valign="top" class="narmal"><table width="100%" border="0" cellspacing="0" cellpadding="0">
							      <!--DWLayoutTable-->
                                  <tr>
                                    <td height="30" align="left"><table width="87%" border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
                                      <tr>
                                        <td width="33%" height="25" bgcolor="#DFDFDF"><div align="center"><strong>Name</strong></div></td>
                                        <td width="9%" bgcolor="#DFDFDF"><div align="center"><strong>Age</strong></div></td>
                                        <td width="40%" bgcolor="#DFDFDF"><div align="center"><strong>Institution Studying In </strong></div></td>
                                        <td width="18%" bgcolor="#DFDFDF"><div align="center"><strong>Standard</strong></div></td>
                                      </tr>
                                      <tr>
                                        <td height="24">&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                      </tr>
                                      <tr>
                                        <td height="22">&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                      </tr>
                                    </table></td>
                                  </tr>
                                 
                                </table></td>
							  </tr>
							  
							  <tr>
								<td height="30" align="left" valign="top">&nbsp;</td>
								<td align="left" valign="top" class="narmal" colspan="7"><table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <!--DWLayoutTable-->
                                  <tr>
                                    <td width="326" height="30" align="left" valign="top">Blood Group </td>
                                    <td width="17" align="left" valign="top">:</td>
                                    <td width="302" align="left" valign="top"><input name="pre_contactname1" type="text" size="15" value="<?php echo $pre_contactname1;?>" /></td>
                                    <td width="544" align="left">&nbsp;</td>
                                  </tr>
								  <tr>
                                    <td height="45" align="left" valign="top">Does The Student Have A Major Alignment/ Allergy That The School Should Know About </td>
                                    <td align="left" valign="top">:</td>
                                    <td align="left" valign="top"><textarea name="pre_address1" type="text" size="15"><?php 
								if (isset($es_enquiryList[0]->eq_address) && $es_enquiryList[0]->eq_address!=''){
								echo htmlentities($es_enquiryList[0]->eq_address);
								}else{ 
								echo htmlentities($pre_address1);
								} ?>
                                    </textarea></td>
                                    <td>&nbsp;</td>
								  </tr>
								  <tr>
                                    <td height="57" colspan="4" align="left" valign="top">ENCLOSURES (without which this application will not be accepted)<br />
                                      The following documents (recently attested photocopies) must be produced along with the filled applicattion : A) Birth Certificate B) A copy of the latest progress report certified by the school in which the student last studied ) (if applicable) </td>
                                  </tr>
								  <tr>
                                    <td height="47" align="left" valign="top">ANY SPECIAL INFORMATION THE APPLICANT MAY WISH TO MENTION </td>
                                    <td align="left" valign="top">:</td>
                                    <td valign="top"><textarea name="pre_address1" type="text" size="15"><?php 
								if (isset($es_enquiryList[0]->eq_address) && $es_enquiryList[0]->eq_address!=''){
								echo htmlentities($es_enquiryList[0]->eq_address);
								}else{ 
								echo htmlentities($pre_address1);
								} ?>
                                    </textarea></td>
                                    <td align="left" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
								  </tr>
								  
                                 
                                </table></td>
							  </tr>
						 </table>					 <table width="100%" border="0" cellspacing="0" cellpadding="0">
						   <!--DWLayoutTable-->
						   <tr>
						     <td height="22" class="bgcolor_02" align="left" valign="middle" colspan="8"><span class="admin">&nbsp;DECLARATION</span></td>
						     </tr>
				       </table></td>
			   </tr>
				<tr>
				  <td width="24" height="18"></td>
				  <td width="1182"></td>
			   </tr>
				<tr>
				  <td height="207">&nbsp;</td>
	              <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <!--DWLayoutTable-->
                                  <tr>
                                    <td width="56" height="30" align="left" valign="top">I, </td>
                                    <td width="180" align="left" valign="top"><input name="pre_contactname1" type="text" size="15" value="<?php echo $pre_contactname1;?>" /></td>
                                    <td colspan="5" align="left" valign="top"> have the authority to admit my child into this school </td>
                                    <td width="9"></td>
                                  </tr>
								  <tr>
                                    <td height="26" colspan="7" align="left" valign="top">I, undertake to bring any fact, which may make this representation untrue in the future to the immediate notice of the school. </td>
                                    <td></td>
								  </tr>
								  <tr>
								    <td height="57" colspan="7" align="left" valign="top">I declare that the statements given in this application are correct and if found otherwise, I shall abide by the decision of the management. I agree to abide by the rules and regulations and fee schedule of the school. </td>
                                    <td></td>
				    </tr>
								  <tr>
								    <td height="22" colspan="3" align="left" valign="top">Date </td>
                                    <td width="14" align="left" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td width="288" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td width="297">&nbsp;</td>
								    <td width="242" align="left" valign="top">Signature of Parent / Guardian </td>
								    <td></td>
				    </tr>
								  <tr>
								    <td height="19" colspan="3" valign="top">For The Use Of The School Office Only </td>
								    <td colspan="4" valign="top"><input name="pre_country1" type="text" size="15" value="<?php if (isset($es_enquiryList[0]->eq_countryid) && $es_enquiryList[0]->eq_countryid!='') {	echo $es_enquiryList[0]->eq_countryid;}else{echo $pre_country1; } ?>" /></td>
								    <td></td>
				    </tr>
								  <tr>
								    <td height="25">&nbsp;</td>
								    <td>&nbsp;</td>
								    <td width="96">&nbsp;</td>
								    <td>&nbsp;</td>
								    <td>&nbsp;</td>
								    <td>&nbsp;</td>
								    <td>&nbsp;</td>
								    <td></td>
				    </tr>
								  <tr>
								    <td height="25" colspan="3" valign="top">Principal</td>
								    <td></td>
								    <td></td>
								    <td></td>
								    <td valign="top">Chairperson</td>
								    <td></td>
				    </tr>
								  <tr>
								    <td height="3"></td>
								    <td></td>
								    <td></td>
								    <td></td>
								    <td></td>
								    <td></td>
								    <td></td>
								    <td></td>
				    </tr>
								  
								  
								  
								  
								  
                                 
                  </table></td>
			    </tr>
			                          </table></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
	  <td height="47">&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
    </tr>
</table>
</form>


<script type="text/javascript">
	function getfieldvalues(){
		if (document.getElementById('sameaddress').checked){
	//alert("checked");
			document.preadmission.pre_address.value=document.preadmission.pre_address1.value;
			document.preadmission.pre_city.value=document.preadmission.pre_city1.value;
			document.preadmission.pre_pincode.value=document.preadmission.pre_pincode1.value;
			document.preadmission.pre_phno.value=document.preadmission.pre_phno1.value;			document.preadmission.pre_state.value=document.preadmission.pre_state1.value;
			

			document.preadmission.pre_mobile.value=document.preadmission.pre_mobile1.value;
			document.preadmission.pre_country.value=document.preadmission.pre_country1.value;
		}else{
			document.preadmission.pre_address.value="";
			document.preadmission.pre_city.value="";
			document.preadmission.pre_pincode.value="";
			document.preadmission.pre_phno.value="";			document.preadmission.pre_state.value="";
			

			document.preadmission.pre_mobile.value="";
			document.preadmission.pre_country.value="";
		}
  }
  function open_sub(val){
   popup_letter('?pid=94&action=display_sub&scat_id='+val);
  }
 
</script>
<script type="text/javascript">
function popup_letter(url) {
		 var width  = 500;
		 var height = 300;
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

<iframe width=199 height=178 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="<?php echo JS_PATH ?>/WeekPicker/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">										</iframe>