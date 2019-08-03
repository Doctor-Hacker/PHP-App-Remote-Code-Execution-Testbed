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
.style2 {color: #000000}
-->
</style>

<form method="post" name="preadmission" action="" enctype="multipart/form-data" >
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
	 </tr>
	<tr>
	    <td height="25" colspan="3" class="bgcolor_02"><span class="admin">&nbsp;&nbsp;Pre Admission</span></td>
	</tr>
	
	
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td  valign="top">
			 <table width="99%" border="0" cellspacing="0" cellpadding="0">
			<?php if($action=='view') { ?>
			 <tr>
	    <td class="narmal"><span class="style1">Note: </span>To opt a different subject please click select class towards the field Class >> now select the class and the subject.</td>
	</tr><?php } ?>
				<tr>			
				   <td align="right" valign="top">						
						 <table border="0" cellspacing="0" cellpadding="0">
						   <!--DWLayoutTable-->
							<tr>
								<td height="30" align="left">&nbsp;</td>
                                <td align="left" width="139" class="narmal">Unique Id </td>
                                <td width="9" align="left" class="narmal">:</td> 
								<td width="261" align="left" valign="middle" class="narmal"><strong>
								  <?php
                                    $max_id=$db->getRow("SELECT MAX(es_preadmissionid) as max_id FROM es_preadmission");
									echo $max_id['max_id']+1;
									?>
								</strong></td>
							  <td width="524" align="right" valign="top" class="narmal"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font></td>
						      <td width="5">&nbsp;</td>
						   </tr>
                            <tr>
								<td width="18" height="719" align="left">&nbsp;</td>
			                    <td colspan="5" align="left" class="narmal"><table width="99%" border="0" cellspacing="0" cellpadding="0">
                                  <!--DWLayoutTable-->
                                  <tr>
                                    <td width="155" align="left" height="30">Tittel</td>
                                    <td width="7" align="left">:</td>
                                    <td width="287" align="left" valign="top"><?php
								if(isset($pre_serialno) && $pre_serialno=="Mr" || isset($es_enquiryList[0]->eq_tittle) && $es_enquiryList[0]->eq_tittle=="Mr") 
								{$sel_gend_m= "selected='selected'"; }else{$sel_gend_m="";}
								if(isset($pre_serialno) && $pre_serialno=="Miss" || isset($es_enquiryList[0]->eq_tittle) && $es_enquiryList[0]->eq_tittle=='Miss') 
								{$sel_gend_miss = "selected='selected'";}else{$sel_gend_miss = ""; }
								/*?>if(isset($pre_serialno) && $pre_serialno=="Mrs" || isset($es_enquiryList[0]->eq_tittle) && $es_enquiryList[0]->eq_tittle=='Mrs') 
								{$sel_gend_mrs = "selected='selected'";}else{$sel_gend_mrs = ""; }<?php */	?>
                                        <select name="pre_serialno"  id="pre_serialno" style="width:120px;">
                                          <option value="" >Select Tittle </option>
                                          <option  value="Mr" <?php echo $sel_gend_m; ?> >Mr</option>
                                          <option  value="Miss" <?php echo $sel_gend_miss; ?>>Miss</option>
                                          <?php /*?> <option  value="Mrs" <?php echo $sel_gend_mrs; ?>>Mrs</option><?php */?>
                                        </select>
                                    <font color="#FF0000"><b>*</b></font></td>
                                    <td width="130" align="left">First  Name</td>
                                    <td width="7" align="left">:</td>
                                    <td colspan="2" align="left" valign="top"><input name="pre_name" type="text" size="15" id="pre_name"  value="<?php if (isset($es_enquiryList[0]->eq_wardname)) {	echo $es_enquiryList[0]->eq_wardname;}else{echo $pre_name; } ?>"  />
                                        <input name="uid" type="hidden" value="<?php echo $uid;?>" />
                                        <input name="newpreadmission" type="hidden" value="newpreadmission" />
                                        <font color="#FF0000">*</font></td>
                                    <td width="4">&nbsp;</td>
                                    <td width="4">&nbsp;</td>
                                    <td width="11">&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td height="30" align="left">Middle&nbsp;Name</td>
                                    <td align="left">:</td>
                                    <td align="left"><input name="pre_fathername" type="text" size="15" value="<?php if (isset($es_enquiryList[0]->eq_name)) {	echo $es_enquiryList[0]->eq_name;}else{echo $pre_fathername; } ?>"/></td>
                                    <td align="left">Last Name </td>
                                    <td align="left">:</td>
                                    <td colspan="2" align="left"><input name="pre_motheroccupation" type="text" size="15" value="<?php echo $pre_motheroccupation;?>" />
                                        <font color="#FF0000"><b> *</b></font></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
								   <tr>
                                    <td height="30" align="left">Academic Year</td>
                                    <td align="left">:</td>
                                    <td align="left"><select name="select" style="width:150px;">
                                      <?php  foreach($academic_year as $each_record) {
						         
						 if ($acad_year == $each_record['fi_ac_startdate']." To ".$each_record['fi_ac_enddate']) {  $sel = "selected='selected'"; }else{$sel = "";}
						  ?>
                                      <option  value="<?php  echo $each_record['fi_ac_startdate']." To ".$each_record['fi_ac_enddate']; ?>" <?php echo $sel;?>><?php echo displaydate($each_record['fi_ac_startdate'])." To ".displaydate($each_record['fi_ac_enddate']); ?> </option>
                                      <?php } ?>
                                    </select>
                                      <font color="#FF0000"><b>*</b></font></td>
                                    <td align="left">Gender</td>
                                    <td align="left">:</td>
                                    <td colspan="2" align="left"><?php
								if(isset($pre_gender) && $pre_gender=="male" || isset($es_enquiryList[0]->eq_sex) && $es_enquiryList[0]->eq_sex=="male") 
								{$sel_gend_m= "selected='selected'"; }else{$sel_gend_m="";}
								if(isset($pre_gender) && $pre_gender=="female" || isset($es_enquiryList[0]->eq_sex) && $es_enquiryList[0]->eq_sex=='female') 
								{$sel_gend_fm = "selected='selected'";}else{$sel_gend_fm = ""; }
								?>
                                      <select name="select2"  id="select" style="width:120px;">
                                        <option value="" >Select Gender </option>
                                        <option  value="male" <?php echo $sel_gend_m; ?> >Male</option>
                                        <option  value="female" <?php echo $sel_gend_fm; ?>>Female</option>
                                      </select>
                                      <font color="#FF0000"><b>*</b></font></td>
                                    <td>&nbsp;</td>
							        <td>&nbsp;</td>
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
                                    <td align="left">Age</td>
                                    <td align="left">:</td>
                                    <td colspan="2" align="left"><input name="pre_age2" id='pre_age2' type="text" size="15" value="<?php echo $pre_age;?>" onfocus='Javascript:checkAge();' readonly="readonly"/>
(<span id="internal-source-marker_0.1335878380918223">Click to display </span>Age in years &amp; months)</td>
                                    <td>&nbsp;</td>
							        <td>&nbsp;</td>
							        <td>&nbsp;</td>
							      </tr>
								   <tr>
                                    <td height="30" align="left">Blood Group</td>
                                    <td align="left">:</td>
                                    <td align="left"><input name="pre_fathername" type="text" size="15" value="<?php if (isset($es_enquiryList[0]->eq_name)) {	echo $es_enquiryList[0]->eq_name;}else{echo $pre_fathername; } ?>"/></td>
                                    <td align="left">Admission Date</td>
                                    <td align="left">:</td>
                                    <td colspan="2" align="left"><input name="admission_date" type="text" id="admission_date" size="10" 
									value="<?php if (isset($es_enquiryList[0]->admission_date)) {	echo func_date_conversion("Y-m-d","d/m/Y",$es_enquiryList[0]->admission_date);}else{echo $admission_date; } ?>" readonly="readonly" />
                                      <a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.preadmission.admission_date);return false;" ><img src="<?php echo JS_PATH ?>/WeekPicker/calbtn.gif" alt="Calender" name="popcal" width="34" height="22" border="0" align="absmiddle" id="popcal" /></a></td>
                                    <td>&nbsp;</td>
							        <td>&nbsp;</td>
							        <td>&nbsp;</td>
							      </tr>
								   <tr>
                                    <td height="25" align="left">Nationality</td>
                                    <td align="left">:</td>
                                    <td align="left"><input type="text" name="es_home2"  size="15" value="<?php echo $es_home;?>"/></td>
                                    <td align="left">Religion</td>
                                    <td align="left">:</td>
                                    <td colspan="2" align="left"><input type="text" name="es_home3"  size="15" value="<?php echo $es_home;?>"/></td>
                                    <td>&nbsp;</td>
							        <td>&nbsp;</td>
							        <td>&nbsp;</td>
							      </tr>
                                  <tr>
                                    <td height="29" align="left">Caste</td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td align="left"><select name="select3">
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
                                    <td colspan="3" rowspan="5" valign="top"><table width="434" class="regAlumni" style="padding:20px;">
                                      <!--DWLayoutTable-->
                                        <!--<form name="photoUpload" method="post" action="sub_stud_temp_photo.php" enctype="multipart/form-data" onSubmit="return validatePhoto()">-->
                                        <?php $query="select * from es_preadmission";
$res=mysql_query($query);
$ret=mysql_fetch_array($res);

?>
                                        <tr>
                                          <td height="145" colspan="2" align="left" valign="top"><?php if(isset($_GET['filesuccess'])){?>
                                              <img src="../images/student_photos/<?php echo $ret['pre_image'];?>" id="" style="border:solid 1px lightgray" width="120" height="120" alt="Recent Photo" />
                                              <?php } else{?>
                                              <img src="images/nophoto.jpg" id="photoBrowser" style="border:solid 1px lightgray" width="120" height="120" alt="Recent Photo" />
                                            <?php }?>                                          </td>
                                        </tr>
                                        <tr>
                                          <td width="422" align="left"><input type="file" name="pre_image" id="pre_image" />
                                              <!--<br/><br/>
			<input type="submit" name="photoUploadSubmit" value="Upload Photo" id="photoUploadSubmit" />	-->                                          </td>
                                          <td width="0"></td>
                                        </tr>
										
                                        <!--</form>-->
                                    </table></td>
                                  <td width="4">&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td height="32" align="left" >Mother Tongue</td>
                                    <td align="left" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td align="left" ><input type="text" name="es_home4"  size="15" value="<?php echo $es_home;?>"/></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td height="33" align="left">Class</td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td align="left"><select name="pre_class" style="width:120px;" onchange="this.form.submit()">
                                      <option value="">Select Class</option>
                                      <?php 
								$classlist = getallClasses();
								foreach($classlist as $indclass) {
								if($es_enquiryList[0]->pre_class == $indclass['es_classesid'] || $indclass['es_classesid']==$pre_class) { 
								$sel_cl = "selected='selected'"; }else { $sel_cl  ="";}
								?>
                                      <option <?php echo $sel_cl; ?> value="<?php echo $indclass['es_classesid']; ?>" ><?php echo $indclass['es_classname']; ?></option>
                                      <?php } ?>
                                    </select>
&nbsp;<font color="#FF0000"><b>*</b></font></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td height="38" align="left">User  Name </td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td align="left"><input name="pre_student_username" type="text" id="pre_student_username" size="15" value="<?php echo $pre_student_username; ?>">
                                      <font color="#FF0000"><b>*</b></font></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td rowspan="2" align="left">Password </td>
                                    <td rowspan="2" align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td rowspan="2" align="left"><input name="pre_student_password" type="password" id="pre_student_password"   size="15">
                                      <font color="#FF0000"><b>*</b></font></td>
                                    <td height="44"></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                  </tr>
                                  <tr>
                                    <td height="1"></td>
                                    <td></td>
                                    <td width="317"></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
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
                                  
                                  
                                  <tr>                                  </tr>
                                 
                                  <tr>
                                    <td height="30" align="left">Father's&nbsp;Name</td>
                                    <td align="left">:</td>
                                    <td align="left"><input name="pre_fathername2" type="text" size="15"  value="<?php echo $pre_fathername;?>"/>
                                      <font color="#FF0000"><b>*</b></font></td>
                                    <td align="left">Date Of Birth</td>
                                    <td align="left">:</td>
                                    <td colspan="2" align="left"><table width="83%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td width="30%"><input name="pre_dateofbirth1" type="text" id="pre_dateofbirth1" size="10" value="<?php if (isset($es_enquiryList[0]->eq_dob)) {	echo func_date_conversion("Y-m-d","d/m/Y",$es_enquiryList[0]->eq_dob);}else{echo $pre_dateofbirth1; } ?>" readonly="readonly" /></td>
                                        <td width="70%"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.preadmission.pre_dateofbirth1);return false;" ><img src="<?php echo JS_PATH ?>/WeekPicker/calbtn.gif" alt="Calender" name="popcal" width="34" height="22" border="0" align="absmiddle" id="popcal" /></a><font color="#FF0000"><b>&nbsp;*</b></font></td>
                                      </tr>
                                    </table></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
								  <tr>
                                    <td height="30" align="left">Qualifications</td>
                                    <td align="left">:</td>
                                    <td align="left"><input type="text" name="es_home5"  size="15" value="<?php echo $es_home;?>"/></td>
                                    <td align="left">Occupation, Organisation &amp; Office Address </td>
                                    <td align="left">:</td>
                                    <td colspan="2" align="left"><input type="text" name="es_home7"  size="15" value="<?php echo $es_home;?>"/></td>
                                    <td>&nbsp;</td>
								    <td>&nbsp;</td>
								    <td>&nbsp;</td>
								  </tr>
								  
								   <tr>
                                    <td height="30" align="left">Office phone </td>
                                    <td align="left">:</td>
                                    <td align="left"><input name="pre_phno12" type="text" size="15" value="<?php 
								if (isset($es_enquiryList[0]->eq_phno) && $es_enquiryList[0]->eq_phno!=''){echo $es_enquiryList[0]->eq_phno;
									}else{echo $pre_phno1;} ?>" /></td>
                                    <td align="left">Mobile </td>
                                    <td align="left">:</td>
                                    <td colspan="2" align="left"><input name="pre_mobile12" type="text" size="15" value="<?php 
								if (isset($es_enquiryList[0]->eq_mobile) && $es_enquiryList[0]->eq_mobile!=''){echo $es_enquiryList[0]->eq_mobile;
									}else{echo $pre_mobile1;}?>"/>
                                        <font color="#FF0000"><b>*</b></font></td>
                                    <td>&nbsp;</td>
							        <td>&nbsp;</td>
							        <td>&nbsp;</td>
							      </tr>
								  <tr>
                                    <td height="32" align="left">E-mail</td>
                                    <td align="left">:</td>
                                    <td align="left"><input type="text" name="es_home6"  size="15" value="<?php echo $es_home;?>"/></td>
                                    <td align="left">Annual Income </td>
                                    <td align="left">:</td>
                                    <td colspan="2" align="left"><input name="pre_mobile12" type="text" size="15" value="<?php 
								if (isset($es_enquiryList[0]->eq_mobile) && $es_enquiryList[0]->eq_mobile!=''){echo $es_enquiryList[0]->eq_mobile;
									}else{echo $pre_mobile1;}?>"/>
                                        <span class="style2">Rs</span></td>
                                    <td>&nbsp;</td>
								    <td>&nbsp;</td>
								    <td>&nbsp;</td>
								  </tr>
								  <tr>
                                    <td height="45" align="left">Mother's&nbsp;Name</td>
                                    <td align="left">:</td>
                                    <td align="left"><input name="pre_mothername" type="text" size="15" value="<?php if (isset($es_enquiryList[0]->eq_mothername) && $es_enquiryList[0]->eq_mothername!='') {echo $es_enquiryList[0]->eq_mothername;}else{echo $pre_mothername; } ?>"/></td>
                                    <td align="left">Date Of Birth</td>
                                    <td align="left">:</td>
                                    <td colspan="2" align="left"><table width="83%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td width="30%"><input name="pre_dateofbirth2" type="text" id="pre_dateofbirth2" size="10" value="<?php if (isset($es_enquiryList[0]->eq_dob)) {	echo func_date_conversion("Y-m-d","d/m/Y",$es_enquiryList[0]->eq_dob);}else{echo $pre_dateofbirth2; } ?>" readonly="readonly" /></td>
                                        <td width="70%"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.preadmission.pre_dateofbirth2);return false;" ><img src="<?php echo JS_PATH ?>/WeekPicker/calbtn.gif" alt="Calender" name="popcal" width="34" height="22" border="0" align="absmiddle" id="popcal" /></a><font color="#FF0000"><b>&nbsp;*</b></font></td>
                                      </tr>
                                    </table></td>
                                    <td>&nbsp;</td>
								    <td>&nbsp;</td>
								    <td>&nbsp;</td>
								  </tr>
								  <tr>
                                    <td height="30" align="left">Qualifications</td>
                                    <td align="left">:</td>
                                    <td align="left"><input type="text" name="es_home52"  size="15" value="<?php echo $es_home;?>"/></td>
                                    <td align="left">Occupation, Organisation &amp; Office Address </td>
                                    <td align="left">:</td>
                                    <td colspan="2" align="left"><input type="text" name="es_home72"  size="15" value="<?php echo $es_home;?>"/></td>
                                    <td>&nbsp;</td>
								    <td>&nbsp;</td>
								    <td>&nbsp;</td>
								  </tr>
								  <tr>
                                    <td height="30" align="left">Office phone </td>
                                    <td align="left">:</td>
                                    <td align="left"><input name="pre_phno12" type="text" size="15" value="<?php 
								if (isset($es_enquiryList[0]->eq_phno) && $es_enquiryList[0]->eq_phno!=''){echo $es_enquiryList[0]->eq_phno;
									}else{echo $pre_phno1;} ?>" /></td>
                                    <td align="left">Mobile </td>
                                    <td align="left">:</td>
                                    <td colspan="2" align="left"><input name="pre_mobile12" type="text" size="15" value="<?php 
								if (isset($es_enquiryList[0]->eq_mobile) && $es_enquiryList[0]->eq_mobile!=''){echo $es_enquiryList[0]->eq_mobile;
									}else{echo $pre_mobile1;}?>"/>
                                        <font color="#FF0000"><b>*</b></font></td>
                                    <td>&nbsp;</td>
								    <td>&nbsp;</td>
								    <td>&nbsp;</td>
								  </tr>
								  <tr>
                                    <td height="30" align="left">E-mail</td>
                                    <td align="left">:</td>
                                    <td align="left"><input type="text" name="es_home62"  size="15" value="<?php echo $es_home;?>"/></td>
                                    <td align="left">Annual Income </td>
                                    <td align="left">:</td>
                                    <td colspan="2" align="left"><input name="pre_mobile12" type="text" size="15" value="<?php 
								if (isset($es_enquiryList[0]->eq_mobile) && $es_enquiryList[0]->eq_mobile!=''){echo $es_enquiryList[0]->eq_mobile;
									}else{echo $pre_mobile1;}?>"/>
                                    <span class="style2">Rs</span></td>
                                    <td>&nbsp;</td>
								    <td>&nbsp;</td>
								    <td>&nbsp;</td>
								  </tr>
								  
								  
								  
                                  <tr>
                                    <td height="30" align="left">E-mail</td>
                                    <td align="left">:</td>
                                    <td align="left"><input type="text" name="es_home"  size="15" value="<?php echo $es_home;?>"/></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <?php /*?><tr>
                                    <td height="22" align="left">Old Balance</td>
                                    <td align="left">:</td>
                                    <td align="left"><input type="text" name="ann_income" value="<?php echo $ann_income;?>" /></td>
                                  </tr><?php */?>
                                  <tr>
                                    <td align="left" height="38">Student Id</td>
                                    <td align="left">:</td>
                                    <td align="left"><input name="pre_hobbies" id='pre_hobbies' type="text" size="15" value="<?php echo $pre_hobbies;?>" maxlength="4"  />
                                      &nbsp;<font color="#FF0000"><b>*</b></font> </td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>

                                  <?php /*?>  <tr>
                                    <td height="30" align="left">Name</td>
                                    <td align="left">:</td>
                                    <td align="left"><input name="pre_contactname2" type="text" size="15" value="<?php echo $pre_contactname2;?>"/></td>
                                   
                                  </tr><?php */?>
                                  
                                  <tr>
                                    <td align="left" height="30">Have a Major Ailment </td>
                                    <td align="left">:</td>
                                    <td align="left"><select name="es_phandcaped" id="es_phandcaped" style="width:150px;"/>
                                    
                                        <option value="" >Select Type</option>
                                        <option value="Yes"<?php if($es_phandcaped=="Yes") {	echo "selected";} ?> >Yes </option>
                                        <option value="No"<?php if($es_phandcaped=="No") {	echo "selected";} ?> >No </option>                                    </td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td align="left" height="30">Any Allergy </td>
                                    <td align="left">:</td>
                                    <td align="left"><select name="es_econbackward" id="es_econbackward" style="width:150px;"/>
                                    
                                        <option value="" >Select Type</option>
                                        <option value="Yes"<?php if($es_econbackward=="Yes") {	echo "selected";} ?> >Yes </option>
                                        <option value="No"<?php if($es_econbackward=="No") {	echo "selected";} ?> >No </option>                                    </td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
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
								<td align="left" height="10" colspan="5"></td>
							    <td align="left"></td>
                              </tr>
							 
                             <tr>
								<td height="23" class="bgcolor_02" align="left" valign="middle" colspan="6"><span class="admin">&nbsp;Present Address</span></td></tr>
                                
                              <tr>
								<td height="159" align="left" valign="middle"></td>
                                <td align="left" valign="middle" colspan="5" class="narmal"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td width="16%" height="50" align="left"><span class="narmal">Residential Address</span></td>
                                    <td width="1%" align="left">:</td>
                                    <td colspan="4" align="left"><textarea name="pre_address1" type="text" size="15"><?php 
								if (isset($es_enquiryList[0]->eq_address) && $es_enquiryList[0]->eq_address!=''){
								echo htmlentities($es_enquiryList[0]->eq_address);
								}else{ 
								echo htmlentities($pre_address1);
								} ?></textarea><font color="#FF0000"><b>*</b></font></td>
                                  </tr>
                                  <tr>
                                    <td height="30" align="left"><span class="narmal">City</span></td>
                                    <td align="left">:</td>
                                    <?php 
									$city1=$es_enquiryList[0]->eq_city ;
									?>
                                    <td width="32%" align="left"><input name="pre_city1" type="text" size="15" value="<?php if(isset($es_enquiryList[0]->eq_city) && $city1!=''  ){ echo $es_enquiryList[0]->eq_city; } else { echo $pre_city1; } ?>" /></td>
                                    <td width="17%" align="left"><span class="narmal">State</span></td>
                                    <td width="1%" align="left">:</td>
                                    <td width="33%" align="left"><input name="pre_state1" size="15" type="text" value="<?php if(isset($es_enquiryList[0]->eq_state) && $es_enquiryList[0]->eq_state!=''){ echo $es_enquiryList[0]->eq_state; } else { echo $pre_state1; } ?>" /></td>
                                  </tr>
                                  <tr>
                                    <td height="30" align="left"><span class="narmal">Country</span></td>
                                    <td align="left">:</td>
                                    <td align="left"><input name="pre_country1" type="text" size="15" value="<?php if (isset($es_enquiryList[0]->eq_countryid) && $es_enquiryList[0]->eq_countryid!='') {	echo $es_enquiryList[0]->eq_countryid;}else{echo $pre_country1; } ?>" /></td>
                                    <td align="left"><span class="narmal">Post Code</span></td>
                                    <td align="left">:</td>
                                    <td align="left"><input name="pre_pincode1" type="text" size="15" value="<?php if (isset($es_enquiryList[0]->eq_zip) && $es_enquiryList[0]->eq_zip!='') {	echo $es_enquiryList[0]->eq_zip;}else{echo $pre_pincode1; } ?>" /></td>
                                  </tr>
                                  <tr>
                                    <td height="30" align="left"><span class="narmal">Residence Phone </span></td>
                                    <td align="left">:</td>
                                    <td align="left"><input name="pre_phno1" type="text" size="15" value="<?php 
								if (isset($es_enquiryList[0]->eq_phno) && $es_enquiryList[0]->eq_phno!=''){echo $es_enquiryList[0]->eq_phno;
									}else{echo $pre_phno1;} ?>" /></td>
                                    <td align="left"><span class="narmal">Mobile </span></td>
                                    <td align="left">:</td>
                                    <td align="left"><span class="narmal">
                                      <input name="pre_mobile1" type="text" size="15" value="<?php 
								if (isset($es_enquiryList[0]->eq_mobile) && $es_enquiryList[0]->eq_mobile!=''){echo $es_enquiryList[0]->eq_mobile;
									}else{echo $pre_mobile1;}?>"/>
                                    <font color="#FF0000"><b>*</b></font></span></td>
                                  </tr>
                                  <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td colspan="3"><span style="color:#FF0000">(All future SMS messages will be sent to this number)</span></td>
                                  </tr>
                                </table></td>
                           </tr>
							 <tr>
								 <td align="left" height="10" colspan="5"></td>
							     <td align="left"></td>
							 </tr>
							  <tr>
								 <td align="left" height="23" colspan="6" class="bgcolor_02"><span class="admin">&nbsp;Permanent  Address <input type="checkbox" name="sameaddress" id="sameaddress" value="0" onclick="javascript:getfieldvalues()" />Same as Above </span></td>
							  </tr>
							  
							  <tr>
								<td height="140" align="left">&nbsp;</td>
								<td colspan="5" align="left" class="narmal"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td width="17%" height="50" align="left">Address</td>
                                    <td width="1%" align="left">:</td>
                                    <td colspan="4" align="left"><textarea name="pre_address"><?php echo $pre_address; ?></textarea></td>
                                  </tr>
                                  <tr>
                                    <td height="30" align="left">City</td>
                                    <td align="left">:</td>
                                    <td width="31%" align="left"><input name="pre_city" type="text" size="15" value="<?php echo $pre_city;?>"/></td>
                                    <td width="17%" align="left">State</td>
                                    <td width="1%" align="left">:</td>
                                    <td width="33%" align="left"><input name="pre_state" type="text" size="15" value="<?php echo $pre_state;?>"/></td>
                                  </tr>
                                  <tr>
                                    <td height="30" align="left">Country</td>
                                    <td align="left">:</td>
                                    <td align="left"><input name="pre_country" type="text" size="15" value="<?php echo $pre_country;?>" /></td>
                                    <td align="left">Post Code</td>
                                    <td align="left">:</td>
                                    <td align="left"><input name="pre_pincode" type="text" size="15" value="<?php echo $pre_pincode;?>"/></td>
                                  </tr>
                                  <tr>
                                    <td height="30" align="left">Residance Phone </td>
                                    <td align="left">:</td>
                                    <td align="left"><input name="pre_phno" type="text" size="15" value="<?php echo $pre_phno;?>" /></td>
                                    <td align="left">Mobile </td>
                                    <td align="left">:</td>
                                    <td align="left"><input name="pre_mobile" type="text" size="15" value="<?php echo $pre_mobile;?>" /></td>
                                  </tr>
                                </table></td>
						   </tr>
							  <tr><td align="left" height="10" colspan="5"></td>
						        <td align="left"></td>
							  </tr>
							  <tr>
								 <td align="left" height="23" colspan="6" valign="middle" class="bgcolor_02" >&nbsp;&nbsp;<span class="admin">Guardian's Details </span></td>
							  </tr>
							  <tr>
								<td height="126" align="left" valign="top">&nbsp;</td>
								<td align="left" valign="top" class="narmal" colspan="5"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td width="7%" height="30" align="left">Name</td>
                                    <td width="9%" align="left">:</td>
                                    <td width="31%" align="left"><input name="pre_contactname1" type="text" size="15" value="<?php echo $pre_contactname1;?>" /></td>
                                    <td width="16%" align="left">Qualification</td>
                                    <td width="1%" align="left">:</td>
                                    <td width="32%" align="left"><input type="text" name="es_home522"  size="15" value="<?php echo $es_home;?>"/>                                      &nbsp;</td>
                                  </tr>
								  <tr>
                                    <td width="7%" height="30" align="left">Occupation</td>
                                    <td width="9%" align="left">:</td>
                                    <td width="31%" align="left"><input name="pre_contactname1" type="text" size="15" value="<?php echo $pre_contactname1;?>" /></td>
                                    <td width="16%" align="left">Office Phone </td>
                                    <td width="1%" align="left">:</td>
                                    <td width="32%" align="left"><input name="pre_contactno1" type="text" size="15" value="<?php 
								if (isset($es_enquiryList[0]->eq_phno) && $es_enquiryList[0]->eq_phno!=''){echo $es_enquiryList[0]->eq_phno;
									}else{echo $pre_contactno1;} ?>"/>
                                    &nbsp;</td>
                                  </tr>
								  <tr>
                                    <td width="7%" height="30" align="left">Mobile</td>
                                    <td width="9%" align="left">:</td>
                                    <td width="31%" align="left"><input name="pre_contactname1" type="text" size="15" value="<?php echo $pre_contactname1;?>" /></td>
                                    <td width="16%" align="left">E-mail</td>
                                    <td width="1%" align="left">:</td>
                                    <td width="32%" align="left"><input name="pre_contactno1" type="text" size="15" value="<?php 
								if (isset($es_enquiryList[0]->eq_phno) && $es_enquiryList[0]->eq_phno!=''){echo $es_enquiryList[0]->eq_phno;
									}else{echo $pre_contactno1;} ?>"/>
                                    &nbsp;</td>
                                  </tr>
								  <tr>
                                    <td width="7%" height="30" align="left">Address</td>
                                    <td width="9%" align="left">:</td>
                                    <td width="31%" align="left"><textarea name="textarea"><?php echo $pre_address; ?></textarea></td>
                                    <td width="16%" align="left">Residence phone </td>
                                    <td width="1%" align="left">:</td>
                                    <td width="32%" align="left"><input name="pre_contactno1" type="text" size="15" value="<?php 
								if (isset($es_enquiryList[0]->eq_phno) && $es_enquiryList[0]->eq_phno!=''){echo $es_enquiryList[0]->eq_phno;
									}else{echo $pre_contactno1;} ?>"/>
                                    &nbsp;</td>
                                  </tr>
                                 
                                </table></td>
							  </tr>
					 </table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td align="left" valign="top">
									<table width="100%" border="0" cellspacing="0" cellpadding="3" >
										<?php /*?><tr>
											<td align="left" height="23" colspan="8" valign="middle" class="bgcolor_02" >&nbsp;&nbsp;<span class="admin">Student Previous Details</span></td>
										</tr>
										<tr>
											<td align="left" colspan="5" class="narmal">&nbsp;&nbsp;&nbsp;Previous Qualification</td>
											<td align="left" width="1%" class="narmal">:</td>
											<td align="left" width="69%"><span class="narmal">
                                            <input name="pre_prev_acadamicname" type="text" value="<?php if (isset($es_enquiryList[0]->eq_prv_acdmic) && $es_enquiryList[0]->eq_prv_acdmic!='') {	echo $es_enquiryList[0]->eq_prv_acdmic;}else{echo $pre_prev_acadamicname; } ?>"/>
											</span></td>
										</tr>
										<tr>
											<td align="left" colspan="5" class="narmal">&nbsp;&nbsp;&nbsp;Final Results</td>
											<td align="left" class="narmal">:</td>
											<td align="left"><span class="narmal">
											  <input type="text" name="pre_prev_class" value="<?php echo $pre_prev_class;?>"/>
											</span></td>
										</tr>
										<tr>
											<td align="left" colspan="5" class="narmal">&nbsp;&nbsp;&nbsp;Board/University</td>
											<td align="left" class="narmal">:</td>
											<td align="left"><input type="text" name="pre_prev_university" value="<?php echo $pre_prev_university;?>" />
											  <input type="hidden" name="pre_current_acadamicname" value="<?php echo $pre_current_acadamicname;?>" /></td>
									  </tr><?php */?>
										
										<input type="hidden" name="pre_prev_tcno" value="<?php echo $pre_prev_tcno;?>" />
										
										<tr>
										  <td align="left" colspan="7">&nbsp;</td>
										</tr>
										<tr >
											<td colspan="7" align="center" ><table width="100%" border="0" cellpadding="0" cellspacing="0">
											  <tr>
												<td align="left" height="23" colspan="6" valign="middle" class="bgcolor_02" >&nbsp;&nbsp;
<span class="admin">Details of siblings, if any, of the student </span></td>

											  </tr>
                                        <tr  >
											<td colspan="7" align="center" valign="top">
												<table width="100%" border="0" cellpadding="3" cellspacing="0">
											 
													<tr>
													  <td align="center" valign="top"><strong>Name</strong></td>
													  <td align="center" valign="top"><strong>Age</strong></td>
														<td align="center" valign="top"><strong>Institution Studying In</strong> </td>
														<td align="center" valign="top"><strong>Standard</strong></td>
													</tr>
													
								<tr>
														<td align="center" valign="top">
												<input type="text" name="pre_current_class2" value="<?php echo htmlentities($pre_current_class2);?>"/>
										
								  </td>
								  <td align="center" valign="top">
												<input type="text" name="pre_current_class2" value="<?php echo htmlentities($pre_current_class2);?>"/>
										
								  </td>
														<td align="center" valign="top">
                                                        
														<input type="text" name="pre_current_percentage2" value="<?php echo $pre_current_percentage2;?>" />														</td>
														<td align="center" valign="top">
														<input type="text" name="pre_current_result2" value="<?php echo $pre_current_result2;?>" />													  </td>
												  </tr>					
													<tr>
														<td align="center" valign="top">
												<input type="text" name="pre_current_class3" value="<?php echo $pre_current_class3;?>" />										
													  </td>
													  <td align="center" valign="top">
												<input type="text" name="pre_current_class3" value="<?php echo $pre_current_class3;?>" />										
													  </td>
														<td align="center" valign="top">
                                                        
														<input type="text" name="pre_current_percentage3" value="<?php echo $pre_current_percentage3;?>"/>														</td>
														<td align="center" valign="top">
														<input type="text" name="pre_current_result3" value="<?php echo $pre_current_result3;?>" />													  </td>
													</tr>		
													<?php /*?><tr>
														<td align="center" valign="top">
								<input type="text" name="pre_physical_details" value="<?php echo $pre_physical_details;?>"/>										
                                                       																	  </td>
														<td align="center" valign="top">
                                                        
									<input type="text" name="pre_height" value="<?php echo $pre_height;?>"/>														</td>
														<td align="center" valign="top">
														<input type="text" name="pre_weight" value="<?php echo $pre_weight;?>" />													  </td>
													</tr>		
													<tr>
														<td align="center" valign="top">
												<input type="text" name="pre_alerge" value="<?php echo $pre_alerge;?>"/>										
                                                       																	  </td>
														<td align="center" valign="top">
                                                        
														<input type="text" name="pre_physical_status" value="<?php echo $pre_physical_status;?>"/>														</td>
														<td align="center" valign="top">
														<input type="text" name="pre_special_care" value="<?php echo $pre_special_care;?>" />													  </td>
													</tr>		<?php */?>
													<?php /*?><tr>
														<td align="center" valign="top">
                                                        <select name="pre_current_class2">
                                                        <option value="">-- Select --</option>
                                   
                                    <?php 
									$inst_arr2 = $db->getrows("SELECT * FROM es_institutes");
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
														<td align="center" valign="top">
														<input type="text" name="pre_current_percentage2" value="<?php echo $pre_current_percentage2;?>"/>														</td>
														<td align="center" valign="top">
														<input type="text" name="pre_current_result2" value="<?php echo $pre_current_result2;?>"/>													  </td>
													</tr>
													<tr>
														<td align="center" valign="top">
                                                        <select name="pre_current_class3">
                                                        <option value="">-- Select --</option>
                                   
                                    <?php 
									$inst_arr3 = $db->getrows("SELECT * FROM es_institutes");
									if(count($inst_arr3)>0){
									foreach($inst_arr3  as $each){
									?>
                                    <option value="<?php echo $each['inst_id'];?>" <?php if($pre_current_class1==$each['inst_id']){echo "selected='selected'";}?>><?php echo ucwords($each['inst_name']); ?></option>
                                    <?php
									}
									}
									?>
                                    </select>
																											  </td>
														<td align="center" valign="top">
														<input type="text" name="pre_current_percentage3" value="<?php echo $pre_current_percentage3;?>"/>														</td>
														<td align="center" valign="top">
														<input type="text" name="pre_current_result3" value="<?php echo $pre_current_result3;?>" />													  </td>
													</tr><?php */?>
													
													
										  </table>										  </td>
										</tr>
							  </table>								</td>
							</tr>
					 </table>
				  </td>
			   </tr>
				<tr>
					<td height="150" align="left" valign="top">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							
							<tr>
								
								<td align="left" valign="top">
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td align="left" valign="top" class="narmal">
												<table width="100%" border="0" cellspacing="3" cellpadding="0">
													<tr><td align="left" colspan="7">&nbsp;</td></tr>
					  
													
													
													<tr><td align="left" colspan="7" class="bgcolor_02" height="25"><span class="admin">&nbsp;TRANSPORT</span></td></tr>
                                                    <tr><td align="left" colspan="7">
                                                    
                                                    <table width="100%" cellpadding="3" cellspacing="0">
                                                    <tr>
                                                       <td width="30%">School Bus Transport</td>
                                                       <td width="2%">:</td>
                                                      <td width="68%"><input type="checkbox" name="transport" value="YES" <?php if($transport=="YES"){?> checked="checked"<?php }?> /></td>
                                                    </tr>
                                                    <tr>
                                                       <td><span id="internal-source-marker_0.1335878380918223">Pick-up Point</span></td>
                                                       <td>:</td>
                                                       <td><select name="tr_place_id">
                                                        <option value="">-- Select --</option>
                                   
                                    <?php 
									$trplaces_arr = $db->getrows("SELECT * FROM es_transport_places");
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
                                                       <td>Route / Board</td>
                                                       <td>:</td>
                                                       <td>
                                                       <select name="boardid">
                                                       <option value="">Select Route/Board</option>
                                                       <?php
													   $route_sql="SELECT * FROM es_trans_route R WHERE R.status!='Delete'";
													   $route_exe=mysql_query($route_sql);
													   while($route_row=mysql_fetch_array($route_exe)){
													   $new_word =substr($route_row['route_Via'], 0, 25);
													   
													   ?>
                                                       <option label="<?php echo $route_row['route_title']." -(".$new_word.")"; ?>">
                                                       <?php
													   $board_sql="SELECT * FROM es_trans_board B WHERE B.status!='Delete' AND route_id=".$route_row['id'];
													   $board_exe=mysql_query($board_sql);
													   while($board_row=mysql_fetch_array($board_exe)){
														   
														   $query_sql="SELECT * FROM es_trans_board_allocation_to_student WHERE status='Active' AND board_id=".$board_row['id'];
														   $query_exe=mysql_query($query_sql);
														   $query_num=mysql_num_rows($query_exe);
														   
														   if($query_num<$board_row['capacity']){
														   
														   ?>													   
                                                       <option value="<?php echo $board_row['id']; ?>" <?php if($boardid==$board_row['id']){?> selected="selected"<?php }?>><?php echo $board_row['board_title']; ?></option>
                                                       <?php }}?>
                                                       </option>
                                                       <?php }?>
                                                       </select>                                                       
                                                       </td>
                                                    </tr> 
                                                      <tr>
                                                       <td>Other Transport</td>
                                                       <td>:</td>
                                                       <td><input type="text" name="pre_physical_details" value="<?php echo $pre_physical_details;?>"/></td>
                                                    </tr>
                                                    <tr>
                                                       <td><span id="internal-source-marker_0.1335878380918223">Other Transport Description </span></td>
                                                       <td>:</td>
                                                       <td><textarea cols="25" rows="5" name="pre_height"><?php echo $pre_height;?></textarea> </td>
                                                    </tr>   
                                                    
                                                                                                     
                                                    </table>
                                                    
                                                    </td>
                                                    
                                                    
                                                    </tr>
                                                    <tr><td align="left" colspan="7">&nbsp;</td></tr>
													<tr>
														<td  colspan="7" align="center"><input name="Submit" type="submit" class="bgcolor_02" value="Submit" style="cursor:pointer;"/></td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
								</td>
								
							</tr>
                            
                            
							
							
						</table>
					</td>
				</tr>
		  </table>
		</td>
		<td align="left" width="1" class="bgcolor_02"></td>
	</tr>
	<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>
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