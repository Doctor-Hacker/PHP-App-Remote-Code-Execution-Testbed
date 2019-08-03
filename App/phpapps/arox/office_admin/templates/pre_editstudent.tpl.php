<script type="text/javascript">
<!--function newWindowOpen(href){
    window.open(href,null, 'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=no,left=140,top=30');
	
}
--></script>
<?php
//$home_image  = str_replace("css", "", $_SESSION['eschools']['user_theme']);
/**
* ********Displaying the students with respect to class and reg.number*******
*/
?>
<?php /*?><script type="text/javascript">

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
<?php */?><?php

/**
* ********End of Printing the students with respect to class and reg.number*******
*/


?>
<?php

/**
* ********Student Editing*****************************
*/
			
if($action=="editstudent")
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
<script type="text/javascript">

function newWindowOpen(href)
{
    window.open(href,null, 'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=no,left=140,top=30');
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
				//document.getElementById("subjectselectbox").innerHTML=xmlHttp.responseText
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
		
<script type="text/javaScript">
  function enf(){
	  document.getElementById("Update").style.display = "none";
	  window.print();
	  //window.close();
	 }

  </script>  
  			
<form method="post" name="preadmission" action="" enctype="multipart/form-data">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <!--DWLayoutTable-->
        <tr>
           <td height="6" colspan="3" class="error_message" align="center"></td>
    </tr>
        
         <tr>
            <td height="25" colspan="3" class="bgcolor_02"><a href="#" class="admin"> &nbsp;&nbsp;Pre Admission</a></td>
    </tr>
           
          <tr>
             <td width="1" class="bgcolor_02"></td>
             <td width="956" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font></td>
             <td width="1" class="bgcolor_02"></td>
          </tr> 
          <tr>
             <td class="bgcolor_02"></td>
             <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
               <!--DWLayoutTable-->
			   
			   
			   <tr>
                   <td width="41" height="30">&nbsp;</td>
                   <td width="190" align="left"><span class="narmal">Serial Number</span></td>
                 <td width="9" align="left">:</td>
                   <td width="252" align="left"> 
				<input name="pre_number" type="text" size="15" value="<?php echo $eachrecord1['pre_number']; ?>" readonly="readonly"/>  					 
               	</td>		
									  
									  
                   <td width="226" align="left"><span class="narmal"></span></td>
                   <td colspan="3" align="left">:</td>
                   <td colspan="2" align="left">
                   
                                </td>
                   <td width="14">&nbsp;</td>
               </tr>
			 
			   
			   
			   
			 <tr>
                   <td width="41" height="30">&nbsp;</td>
                   <td width="190" align="left"><span class="narmal">Title</span></td>
                 <td width="9" align="left">:</td>
                   <td width="252" align="left"> 
									   
									  <?php
								if(isset($pre_serialno) && $pre_serialno=="Mr" || isset($eachrecord1['pre_serialno']) && $eachrecord1['pre_serialno']=="Mr") 
								{$sel_gend_mr= "selected='selected'"; }else{$sel_gend_mr = ""; }
								if(isset($pre_serialno) && $pre_serialno=="Miss" || isset($eachrecord1['pre_serialno']) && $eachrecord1['pre_serialno']=='Miss') 
								{$sel_gend_miss = "selected='selected'";}else{$sel_gend_miss = ""; }
	    if(isset($pre_serialno) && $pre_serialno=="Mrs" || isset($eachrecord1['pre_serialno']) && $eachrecord1['pre_serialno']=="Mrs") 
								{$sel_gend_mrs = "selected='selected'";}else{$sel_gend_mrs = ""; }
								?>
                                      <select name="pre_serialno"  id="pre_serialno" style="width:120px;">
                                        <option value="" >Select Tittle</option>
                                        <option  value="Mr" <?php echo $sel_gend_mr; ?>>Mr</option>
                                        <option  value="Miss" <?php echo $sel_gend_miss; ?>>Miss</option>
										<option  value="Mrs" <?php echo $sel_gend_mrs; ?>>Mrs</option>
               </select>	</td>		
									  
									  
                   <td width="226" align="left"><span class="narmal">First Name</span></td>
                   <td colspan="3" align="left">:</td>
                   <td colspan="2" align="left">
                   
               <input name="pre_name" type="text" size="15" value="<?php echo $eachrecord1['pre_name']; ?>"  />                 </td>
                   <td width="14">&nbsp;</td>
               </tr>
			 
               <tr>
                   <td height="30">&nbsp;</td>
                   <td align="left"><span class="narmal">Middle Name </span></td>
                 <td align="left">:</td>
                   <td align="left"><input name="middle_name" type="text" size="15" value="<?php echo htmlentities($eachrecord1['middle_name']); ?>" /></td>
                   <td align="left"><span class="narmal">Last Name</span></td>
                   <td colspan="3" align="left">:</td>
                   <td colspan="2" align="left">
                   
                  <input name="pre_current_acadamicname" type="text" size="15" value="<?php if($eachrecord1['pre_current_acadamicname']!='') {echo $eachrecord1['pre_current_acadamicname']; } else { echo $pre_current_acadamicname;} ?>" />                 </td>
                   <td>&nbsp;</td>
               </tr>
			   
			   <?php
			   $query="SELECT * FROM es_preadmission";
			   $result=mysql_query($query) or die("Data Extraction Not Possible");
		       //$numrows=mysql_num_rows($result);
		       $ret=mysql_fetch_array($result);
			   
			   
			   ?>
                 <tr>
                   <td height="30">&nbsp;</td>
                   <td align="left"><span class="narmal">Gender </span></td>
                   <td align="left">:</td>
                   <td align="left">
				   <?php
						   
						  
								if(isset($pre_gender) && $pre_gender=="male" || isset($eachrecord1['pre_gender']) && $eachrecord1['pre_gender']=="male") 
								{$sel_gend_m= "selected='selected'"; }else{$sel_gend_m="";}
								if(isset($pre_gender) && $pre_gender=="female" || isset($eachrecord1['pre_gender']) && $eachrecord1['pre_gender']=='female') 
								{$sel_gend_fm = "selected='selected'";}else{$sel_gend_fm = ""; }
								?>
                                      <select name="pre_gender"  id="pre_gender" style="width:120px;">
                                        <option value="" >Select Gender </option>
                                        <option  value="male" <?php echo $sel_gend_m; ?> >Male</option>
                                        <option  value="female" <?php echo $sel_gend_fm; ?>>Female</option>
                                      </select></td>
                   <td align="left"><span class="narmal">Academic From</span></td>
                   <td colspan="3" align="left">:</td>
                   <td colspan="2" align="left"><input name="pre_fromdate" type="text" size="15" value="<?php echo formatDBDateTOCalender($eachrecord1['pre_fromdate']);?>" readonly/><font color="#FF0000">&nbsp;*</font></td>
                   <td>&nbsp;</td>
               </tr>
                 <tr>
                   <td height="30">&nbsp;</td>
                   <td align="left"><span class="narmal">Class</span></td>
                   <td align="left">:</td>
                   <td align="left"><select name="pre_class" style="width:120px;" onchange="this.form.submit()">
                     <option value="">Select Class</option>
                     <?php 
								$classlist = getallClasses();
								foreach($classlist as $indclass) {
					if($es_enquiryList[0]->pre_class == $indclass['pre_class'] || $indclass['pre_class']==$pre_class) { 
								$sel_cl = "selected='selected'"; }else { $sel_cl  ="";}
								?>
                     <option <?php echo $sel_cl; ?> value="<?php echo $indclass['pre_class']; ?>" ><?php echo $indclass['es_classname']; ?></option>
                     <?php } ?>
                   </select>				   </td>
				   
                   <td align="left"><span class="narmal">Academic To </span></td>
                   <td colspan="3" align="left">:</td>
                   <td colspan="2" align="left"><input name="pre_todate" type="text" size="15" value="<?php echo formatDBDateTOCalender($eachrecord1['pre_todate']);?>" readonly /><font color="#FF0000">&nbsp;*</font></td>
                   <td>&nbsp;</td>
               </tr>
			   <tr>
                   <td height="27"></td>
                                    
                   <td align="left"><span class="narmal">Username</span></td>
                   <td align="left">:</td>
                   <td align="left"><input name="pre_student_username" type="text" id="pre_student_username" size="15" value="<?php echo $eachrecord1['pre_student_username']; ?>"   /><font color="#FF0000">&nbsp;*</font></td>
                   <td rowspan="2" align="left" valign="top"><span class="narmal">Password</span></td>
                   <td colspan="3" rowspan="2" align="left" valign="top">:</td>
                   <td colspan="2" rowspan="2" align="left" valign="top"><input name="pre_student_password" type="text" id="pre_student_password"   size="15" value="<?php echo $eachrecord1['pre_student_password']; ?>"  />                     <font color="#FF0000">&nbsp;*</font></td>
                   <td>&nbsp;</td>
               </tr>
			   
			   
			    <tr>
                   <td height="2"></td>
                   <td rowspan="2" align="left"><span class="narmal">Admission Date</span></td>
                   <td rowspan="2" align="left">:</td>
                   <td rowspan="2" align="left"><input name="admission_date" type="text" id="admission_date" size="10" value="<?php  if($eachrecord1['admission_date']!=0000-00-00) {
									if(!isset($admission_date)){$admission_date = func_date_conversion("Y-m-d","d/m/Y",$eachrecord1['admission_date']);echo $admission_date; }} else { echo "---";}
									 ?>" readonly="readonly" /><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.preadmission.admission_date);return false;" ><img src="<?php echo JS_PATH ?>/WeekPicker/calbtn.gif" alt="Calender" name="popcal" width="34" height="22" border="0" align="absmiddle" id="popcal" /></a></td>
                   <td></td>
               </tr>
			   
			   
			   
			    <tr>
			      <td height="27"></td>
			      <td align="left" valign="top">Nationality</td>
                  <td colspan="3" align="left" valign="top">:</td>
                  <td colspan="2" rowspan="2" align="left" valign="top"><input type="text" name="test1"  size="15" value="<?php echo $eachrecord1['test1'];?>"/></td>
                  <td>&nbsp;</td>
               </tr>   
              
                   
               								  
																  
								  <?php /*?><tr>
								  <td></td>
								  <td  height="30" align="left">Programme </td>
								  <td align="left">:</td>						
								  <td align="left">
				                  <select name="pre_class" style="width:130px;" onchange="JavaScript:document.preadmission.submit();">
									<option value="all" >All</option>
									<?php if (count($c_groups)>0){ foreach($c_groups as $eachgroup){ ?>
									<option value="<?php echo $eachgroup['es_groupsid']; ?>"  <?php echo ($eachgroup['es_groupsid']==$pre_class)?"selected":""?> ><?php echo $eachgroup['es_groupname']; ?></option>
									<?php }	} ?>
								</select></td>
					           </tr><?php */?>
							   
							   
							   
							   
                                  <tr><td height="3"></td>
                   <td rowspan="2" align="left"><span class="narmal">Date&nbsp;Of&nbsp;Birth</span></td>
                   <td rowspan="2" align="left">:</td>
                   <td rowspan="2" align="left"><table width="83%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                       
                                        <td>
                                        
                                        <a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.preadmission.pre_dateofbirth);return false;" ></a><iframe width=199 height=178 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="<?php echo JS_PATH ?>/WeekPicker/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">										</iframe>										</td>
                                      </tr>
                     </table></a>
					  <input name="pre_dateofbirth" type="text" id="pre_dateofbirth" size="10" value="<?php echo formatDBDateTOCalender($eachrecord1['pre_dateofbirth']); ?>" readonly="readonly" />
                     <a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.preadmission.pre_dateofbirth);return false;" ><img src="<?php echo JS_PATH ?>/WeekPicker/calbtn.gif" alt="Calender" name="popcal" width="34" height="22" border="0" align="absmiddle" id="popcal" /></a></td>
					 
					 
					 
					 <td rowspan="2" align="left" valign="top">Religion</td>
                                    <td colspan="3" rowspan="2" align="left" valign="top">:</td>
                                    <td></td>
               </tr>
                                  <tr>
                                    <td height="29"></td>
                                    <td colspan="2" align="left" valign="top"><input type="text" name="test2"  size="15" value="<?php echo $eachrecord1['test2'];?>"/></td>
                                    <td></td>
                                  </tr>
                                  
                                  
			   
              
               
                 <tr>
                   <td height="28">&nbsp;</td>
                   <td align="left">Caste</td>
                   <td align="left">:</td>
                   <td align="left"><?php /*?>  <select name="caste_id">
                                   
                                    <?php 
									$caste_arr = $db->getrows("SELECT caste FROM es_caste");
									if(count($caste_arr)>0){
									foreach($caste_arr  as $each){
									?>
                                    <option value="<?php echo $each['caste_id'];?>" <?php if($caste_id==$each['caste_id']){echo "selected='selected'";}?>><?php echo $each['caste']; ?></option>
                                    <?php
									}
									}
									?>
                                    </select>
									<?php */?>
                     <!--<select name="select">
                       <option value="">-- Select --</option>
                       <?php 
									/*$trplaces_arr = $db->getrows("SELECT * FROM es_caste");
									if(!isset($caste_id)){$caste_id=$eachrecord1['caste_id'];}
									if(count($trplaces_arr)>0){
									foreach($trplaces_arr  as $each){*/
									?>
                       <option value="<?php /*echo $each['caste_id'];?>" <?php if($caste_id==$each['caste_id']){echo "selected='selected'";}?>><?php echo ucwords($each['caste']);*/ ?></option>
                       <?php
									/*}
									}*/
									?>
                     </select>-->
					 
					 <select name="caste_id">
                                        <option value="">-- Select --</option>
                                        <?php 
									$trplaces_arr = $db->getrows("SELECT * FROM es_caste");
									if(!isset($caste_id)){$caste_id=$eachrecord1['caste_id'];}
									if(count($trplaces_arr)>0){
									foreach($trplaces_arr  as $each){
									?>
                                        <option value="<?php echo $each['caste_id'];?>" <?php if($caste_id==$each['caste_id']){echo "selected='selected'";}?>><?php echo ucwords($each['caste']); ?></option>
                                        <?php
									}
									}
									?>
                                      </select>
					 
					 </td>
                   <td align="left" valign="top">Sub Caste </td>
				   <td width="3" align="left" valign="top">:</td>
                   <td width="6">&nbsp;</td>
                   <td width="4">&nbsp;</td>
                   <td colspan="2" align="left" valign="top"><input type="text" name="test3"  size="15" value="<?php echo $eachrecord1['test3'];?>"/></td>
                   <td>&nbsp;</td>
                   <?php /*?> <td align="left"><span class="narmal">Branch</span></td>
                   <td align="left">:</td>
                   <td align="left"><input name="es_branch" type="text" id="es_branch" size="15" value="<?php echo htmlentities($eachrecord1['es_branch']); ?>"  /></td><?php */?>
               </tr>
                 <tr>
                   <td height="30"></td>
                   <td align="left">Mother Tongue</td>
                   <td align="left">:</td>
                   <td align="left"><input name="pre_alerge" type="text" size="15"  value="<?php  if($eachrecord1['pre_alerge']!='') { echo $eachrecord1['pre_alerge']; } else { echo $pre_alerge;}?>"/></td>
                   <td align="left" valign="top">Previous School Attended</td>
                                    <td colspan="2" align="left" valign="top">:</td>
                                    <td>&nbsp;</td>
                                    <td colspan="2" align="left" valign="top"><input type="text" name="es_home"  size="15" value="<?php echo $eachrecord1['es_home'];?>"/></td>
                   <td></td>
               </tr>
                 
                 
                 
			   
			   
			   
			   
			   
			   
                <tr>                <td height="28"></td>
                                    <td align="left" valign="top">Medium</td>
                                    <td align="left" valign="top">:</td>
                                    <td align="left" valign="top"><input type="text" name="pre_weight"  size="15" value="<?php echo $eachrecord1['pre_weight'];?>"/></td>
                                    <td align="left" valign="top">Class In Which Was Studying </td>
                                    <td colspan="2" align="left" valign="top">:</td>
                                    <td>&nbsp;</td>
                                    <td colspan="2" align="left" valign="top"><input type="text" name="pre_hobbies"  size="15" value="<?php echo $eachrecord1['pre_hobbies'];?>"/></td>
                                    <td></td>
               </tr>


                                    <tr>                
									<td height="38"></td>
                                    <td align="left" valign="top">Blood Group </td>
                                    <td align="left" valign="top">:</td>
                                    <td align="left" valign="top"><input name="pre_blood_group" type="text" size="15" value="<?php                                    echo $eachrecord1['pre_blood_group'];  ?>"  /></td>
									<td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td width="80">&nbsp;</td>
                                    <td width="150">&nbsp;</td>
                                    <td>&nbsp;</td>
                                    </tr>
									
									

                 <tr>
                   <td height="30"></td>
                   <td align="left"><span class="narmal">Photo </span></td>
                   <td align="left">:</td>
                   <td align="left" valign="top"><input name="pre_image" type="file" />
                   <input type="hidden" name="photo" value="<?php echo $eachrecord1['pre_image']; ?>"  /></td>
                   <td colspan="5" rowspan="4" align="left" valign="top"><img src="images/student_photos/<?php echo  $eachrecord1['pre_image'];?>" width="127" height="105" border="0"/></td>
                   <td>&nbsp;</td>
                   <td></td>
               </tr>
                 
                 <tr>
                   <td height="29">&nbsp;</td>
                   <td align="left">Date Of Leaving That School</td>
                   <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                   <td align="left"><input type="text" name="pre_dateofbirth1"  size="15" value="<?php echo $eachrecord1['pre_weight'];?>"/></td>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
               </tr>
			   
			   
                 <tr><td height="33"></td>
			<td align="left">Transfer Certificate is enclosed </td>
                                    <td align="left">:</td>
                                    <td align="left"><input type="text" name="es_econbackward"  size="15" value="<?php echo $eachrecord1['es_econbackward'];?>"/></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
               </tr>
								  
								  <tr>
                                  <td height="38">&nbsp;</td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
					              </tr>
								
             </table></td>
             <td class="bgcolor_02"></td>
          </tr>          
          <tr>
            <td height="25" colspan="3" class="bgcolor_02"><span class="admin"> &nbsp;&nbsp;Present Address</span></td>
          </tr>
          <tr>
             <td class="bgcolor_02"></td>
             <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="21%" height="50" align="left"><span class="narmal">Residential Address</span></td>
                 <td width="1%" align="left">:</td>
                 <td colspan="4" align="left"><textarea name="pre_address1" type="text" size="15"><?php echo $eachrecord1['pre_address1']; ?></textarea><font color="#FF0000">&nbsp;*</font></td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td height="30" align="left">Area</td>
                 <td align="left">:</td>
                 <td width="30%" align="left"><input name="pre_country1" type="text" size="15" value="<?php  if($eachrecord1['pre_country1']!='') {echo $eachrecord1['pre_country1']; } else { echo $pre_country1; }?>" /></td>
                 <td width="23%" align="left"><span class="narmal">City</span></td>
                 <td width="1%" align="left">:</td>
                 <td width="23%" align="left"><input name="pre_city1" type="text" size="15" value="<?php if($eachrecord1['pre_city1']!='') {echo $eachrecord1['pre_city1'];} else { echo $pre_city1; } ?>" /></td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td height="30" align="left"><span class="narmal">State</span></td>
                 <td align="left">:</td>
                 <td align="left"><input name="pre_state1" type="text" id="pre_state1" value="<?php  if($eachrecord1['pre_state1']!='') {echo $eachrecord1['pre_state1']; } else { echo $pre_state1; }?>" size="15" /></td>
                 <td align="left"><span class="narmal">Pin Code</span></td>
                 <td align="left">:</td>
                 <td align="left"><input name="pre_pincode1" type="text" size="15" value="<?php  if($eachrecord1['pre_pincode1']!='') {echo $eachrecord1['pre_pincode1']; } else { echo $pre_pincode1; }?>" /></td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td height="30" align="left"><span class="narmal">Home Landline Ph. no.</span></td>
                 <td align="left">:</td>
                 <td align="left"><input name="pre_phno1" type="text" size="15" value="<?php  if($eachrecord1['pre_phno1']!='') {echo $eachrecord1['pre_phno1'];} else { echo $pre_phno1; } ?>" /></td>
                 <td align="left"><span class="narmal">SMS Mobile No. </span></td>
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
             <td class="bgcolor_02"></td>
          </tr>  
          <tr>
            <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Permanent  Address</span><span class="admin">             
					<input type="checkbox" name="sameaddress" id="sameaddress" value="0" onClick="javascript:getfieldvalues()" />
				Same as Above </span></td>
          </tr>
          <tr>
             <td class="bgcolor_02"></td>
             <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="21%" height="50" align="left"><span class="narmal">Addres</span></td>
                 <td width="1%" align="left">:</td>
                 <td colspan="4" align="left"><textarea name="pre_address"><?php if($eachrecord1['pre_address']!='') { echo $eachrecord1['pre_address'];} else {echo $pre_address;} ?></textarea></td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td height="30" align="left">Area</td>
                 <td align="left">:</td>
                 <td width="30%" align="left"><input name="pre_country" type="text" size="15"  value="<?php  if($eachrecord1['pre_country']!='') { echo $eachrecord1['pre_country'];} else {echo $pre_country;} ?>"/></td>
                 <td width="23%" align="left"><span class="narmal">City</span></td>
                 <td width="1%" align="left">:</td>
                 <td width="23%" align="left"><input name="pre_city" type="text" size="15"  value="<?php  if($eachrecord1['pre_city']!='') { echo $eachrecord1['pre_city']; } else {echo $pre_city;}?>"/></td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td height="30" align="left">State</td>
                 <td align="left">:</td>
                 <td align="left"><input name="pre_state" type="text" size="15"  value="<?php  if($eachrecord1['pre_state']!='') { echo $eachrecord1['pre_state'];} else {echo $pre_state;} ?>"/></td>
                 <td align="left"><span class="narmal">Pin Code </span></td>
                 <td align="left">:</td>
                 <td align="left"><input name="pre_pincode" type="text" size="15" value="<?php  if($eachrecord1['pre_pincode']!='') { echo $eachrecord1['pre_pincode']; } else {echo $pre_pincode;}?>" /></td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td height="30" align="left">Home Landline Ph. no.</td>
                 <td align="left">:</td>
                 <td align="left"><input name="pre_phno" type="text" size="15"  value="<?php  if($eachrecord1['pre_phno']!='') { echo $eachrecord1['pre_phno'];} else {echo $pre_phno;} ?>"/></td>
                 <td align="left">SMS Mobile No. </td>
                 <td align="left">:</td>
                 <td align="left"><input name="pre_mobile" type="text" size="15"  value="<?php  if($eachrecord1['pre_mobile']!='') { echo $eachrecord1['pre_mobile']; } else {echo $pre_mobile;}?>"/></td>
               </tr>
               
             </table></td>
             <td class="bgcolor_02"></td>
          </tr>  
          <tr>
            <td height="25" colspan="3" class="bgcolor_02"><span class="admin"> &nbsp;&nbsp;Father's Details</span></td>
          </tr>
          <tr>
             <td class="bgcolor_02"></td>
             <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="21%" height="30" align="left">Father Name(Full)</td>
                 <td width="1%" align="left">:</td>
                 <td width="30%" align="left"><input name="pre_fathername" type="text" size="15" value="<?php  if($eachrecord1['pre_fathername']!='') { echo $eachrecord1['pre_fathername'];} else {echo $pre_fathername;} ?>" /></td>
                 <td width="23%" align="left">Educational Qualification</td>
                 <td width="1%" align="left">:</td>
                 <td width="23%" align="left"><input name="pre_contactname1" type="text" size="15" value="<?php  if($eachrecord1['pre_contactname1']!='') { echo $eachrecord1['pre_contactname1'];} else {echo $pre_contactname1;} ?>" /></td>
               </tr>
			   <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="21%" height="30" align="left">Age</td>
                 <td width="1%" align="left">:</td>
                 <td width="30%" align="left"><input name="pre_prev_acadamicname" type="text" size="15" value="<?php  if($eachrecord1['pre_prev_acadamicname']!='') { echo $eachrecord1['pre_prev_acadamicname'];} else {echo $pre_prev_acadamicname;} ?>" /></td>
                 <td width="23%" align="left">Official Phone</td>
                 <td width="1%" align="left">:</td>
                 <td width="23%" align="left"><input name="pre_contactno1" type="text" size="15" value="<?php  if($eachrecord1['pre_contactno1']!='') { echo $eachrecord1['pre_contactno1'];} else {echo $pre_contactno1;} ?>" /></td>
               </tr>
			   <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="21%" height="30" align="left">Occupation &amp; Designation</td>
                 <td width="1%" align="left">:</td>
                 <td width="30%" align="left"><input name="pre_fathersoccupation" type="text" size="15" value="<?php  if($eachrecord1['pre_fathersoccupation']!='') { echo $eachrecord1['pre_fathersoccupation'];} else {echo $pre_fathersoccupation;} ?>" /></td>
                 <td width="23%" align="left">Department</td>
                 <td width="1%" align="left">:</td>
                 <td width="23%" align="left"><input name="pre_prev_class" type="text" size="15" value="<?php  if($eachrecord1['pre_prev_class']!='') { echo $eachrecord1['pre_prev_class'];} else {echo $pre_prev_class;} ?>" /></td>
               </tr>
			   <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="21%" height="30" align="left">Office Address</td>
                 <td width="1%" align="left">:</td>
                 <td width="30%" align="left"><textarea cols="20" rows="2" name="pre_prev_university"><?php echo $eachrecord1['pre_prev_university'];?></textarea></td>
                 <td width="23%" align="left">Monthly Income </td>
                 <td width="1%" align="left">:</td>
                 <td width="23%" align="left"><input name="pre_prev_percentage" type="text" size="15" value="<?php  if($eachrecord1['pre_prev_percentage']!='') { echo $eachrecord1['pre_prev_percentage'];} else {echo $pre_prev_percentage;} ?>" /></td>
               </tr>
               
             </table></td>
             <td class="bgcolor_02"></td>
          </tr>  
		    <tr>
            <td height="25" colspan="3" class="bgcolor_02"><span class="admin"> &nbsp;&nbsp;Mother's Details</span></td>
          </tr>
          <tr>
             <td class="bgcolor_02"></td>
             <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="21%" height="30" align="left">Mother Name(full)</td>
                 <td width="1%" align="left">:</td>
                 <td width="30%" align="left"><input name="pre_mothername" type="text" size="15" value="<?php  if($eachrecord1['pre_mothername']!='') { echo $eachrecord1['pre_mothername'];} else {echo $pre_mothername;} ?>" /></td>
                 <td width="23%" align="left">Educational Qualification</td>
                 <td width="1%" align="left">:</td>
                 <td width="23%" align="left"><input name="pre_contactname2" type="text" size="15" value="<?php  if($eachrecord1['pre_contactname2']!='') { echo $eachrecord1['pre_contactname2'];} else {echo $pre_contactname2;} ?>" /></td>
               </tr>
			   <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="21%" height="30" align="left">Age</td>
                 <td width="1%" align="left">:</td>
                 <td width="30%" align="left"><input name="pre_prev_tcno" type="text" size="15" value="<?php  if($eachrecord1['pre_prev_tcno']!='') { echo $eachrecord1['pre_prev_tcno'];} else {echo $pre_prev_tcno;} ?>" /></td>
                 <td width="23%" align="left">Official Phone</td>
                 <td width="1%" align="left">:</td>
                 <td width="23%" align="left"><input name="pre_contactno2" type="text" size="15" value="<?php  if($eachrecord1['pre_contactno2']!='') { echo $eachrecord1['pre_contactno2'];} else {echo $pre_contactno2;} ?>" /></td>
               </tr>
			   <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="21%" height="30" align="left">Occupation &amp; Designation</td>
                 <td width="1%" align="left">:</td>
                 <td width="30%" align="left"><input name="pre_motheroccupation" type="text" size="15" value="<?php  if($eachrecord1['pre_motheroccupation']!='') { echo $eachrecord1['pre_motheroccupation'];} else {echo $pre_motheroccupation;} ?>" /></td>
                 <td width="23%" align="left">Department</td>
                 <td width="1%" align="left">:</td>
                 <td width="23%" align="left"><input name="pre_current_class1" type="text" size="15" value="<?php  if($eachrecord1['pre_current_class1']!='') { echo $eachrecord1['pre_current_class1'];} else {echo $pre_current_class1;} ?>" /></td>
               </tr>
			   <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="21%" height="30" align="left">Office Address</td>
                 <td width="1%" align="left">:</td>
                 <td width="30%" align="left"><textarea cols="20" rows="2" name="pre_current_percentage1"><?php echo $eachrecord1['pre_current_percentage1'];?></textarea></td>
                 <td width="23%" align="left">Monthly Income </td>
                 <td width="1%" align="left">:</td>
                 <td width="23%" align="left"><input name="pre_current_result1" type="text" size="15" value="<?php  if($eachrecord1['pre_current_result1']!='') { echo $eachrecord1['pre_current_result1'];} else {echo $pre_current_result1;} ?>" /></td>
               </tr>
               
             </table></td>
             <td class="bgcolor_02"></td>
          </tr>  
		    <tr>
            <td height="25" colspan="3" class="bgcolor_02">&nbsp;<span class="admin">Guardian's Details </span></td>
          </tr>
          <tr>
             <td class="bgcolor_02"></td>
             <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="21%" height="30" align="left">Name Of Gaurdian</td>
                 <td width="1%" align="left">:</td>
                 <td width="30%" align="left"><input name="pre_current_class2" type="text" size="15" value="<?php  if($eachrecord1['pre_current_class2']!='') { echo $eachrecord1['pre_current_class2'];} else {echo $pre_current_class2;} ?>" /></td>
                 <td width="23%" align="left">Office Phone </td>
                 <td width="1%" align="left">:</td>
                 <td width="23%" align="left"><input name="pre_resno" type="text" size="15" value="<?php  if($eachrecord1['pre_resno']!='') { echo $eachrecord1['pre_resno'];} else {echo $pre_resno;} ?>" /></td>
               </tr>
			   <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="21%" height="30" align="left">Residential Address Of Gaurdian </td>
                 <td width="1%" align="left">:</td>
                 <td width="30%" align="left"><textarea cols="20" rows="2" name="pre_current_percentage2"><?php echo $eachrecord1['pre_current_percentage2'];?></textarea></td>
                 <td width="23%" align="left">Residence phone </td>
                 <td width="1%" align="left">:</td>
                 <td width="23%" align="left"><input name="pre_resno1" type="text" size="15" value="<?php  if($eachrecord1['pre_resno1']!='') { echo $eachrecord1['pre_resno1'];} else {echo $pre_resno1;} ?>" /></td>
               </tr>
			   <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="21%" height="30" align="left"><span class="narmal">Any Relationship with Hiigher Personality </span></td>
                 <td width="1%" align="left">:</td>
                 <td width="30%" align="left"><input name="pre_current_result2" type="text" size="15" value="<?php  if($eachrecord1['pre_current_result2']!='') { echo $eachrecord1['pre_current_result2'];} else {echo $pre_current_result2;} ?>" /></td>
                 <td width="23%" align="left"><span class="narmal">Health Problem If Any </span></td>
                 <td width="1%" align="left">:</td>
                 <td width="23%" align="left"><input name="pre_current_class3" type="text" size="15" value="<?php  if($eachrecord1['pre_current_class3']!='') { echo $eachrecord1['pre_current_class3'];} else {echo $pre_current_class3;} ?>" /></td>
               </tr>
			   <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="21%" height="30" align="left"><span class="narmal">Extra Curricular Interest</span></td>
                 <td width="1%" align="left">:</td>
                 <td width="30%" align="left"><input name="pre_current_percentage3" type="text" size="15" value="<?php  if($eachrecord1['pre_current_percentage3']!='') { echo $eachrecord1['pre_current_percentage3'];} else {echo $pre_current_percentage3;} ?>" /></td>
                 <td width="23%" align="left">&nbsp;</td>
                 <td width="1%" align="left">&nbsp;</td>
                 <td width="23%" align="left">&nbsp;</td>
			   </tr>
               
             </table></td>
             <td class="bgcolor_02"></td>
          </tr>  
		  
          
          <tr>
             <td class="bgcolor_02"></td>
             <td></td>
             <td class="bgcolor_02"></td>
          </tr>  
          <tr>
            <td height="25" colspan="3" class="bgcolor_02"><table width="100%" border="0" cellpadding="0" cellspacing="0" >
              <!--DWLayoutTable-->
               <tr class="bgcolor_02" height="22">
                 
				 <td height="25" colspan="3" class="bgcolor_02">&nbsp;<span class="admin">Class Of Your Other Children In This School </span></td>
              </tr></table></td>
          </tr>
          <tr>
             <td class="bgcolor_02"></td>
             <td><table width="100%" border="0" cellpadding="3" cellspacing="0">
               <!--DWLayoutTable-->
											 
													<tr>
														<td height="25" colspan="4" align="center" valign="top"><strong>1st Child Admi. No. </strong></td>
														<td colspan="4" align="center" valign="top"><strong>2nd Child Admi. No.</strong></td>
														<td width="215" align="center" valign="top"><strong>3rd Child Admi. No.</strong></td>
													</tr>
													
								<tr>
														<td height="28" colspan="4" align="center" valign="top">
												<input type="text" name="pre_current_result3" value="<?php  if($eachrecord1['pre_current_result3']!='') { echo $eachrecord1['pre_current_result3']; } else {echo $pre_current_result3;}?>"/>								  </td>
														<td colspan="4" align="center" valign="top">
                                                        
														<input type="text" name="pre_physical_status" value="<?php  if($eachrecord1['pre_physical_status']!='') { echo $eachrecord1['pre_physical_status']; } else {echo $pre_physical_status;}?>" />														</td>
														<td align="center" valign="top">
														<input type="text" name="pre_special_care" value="<?php  if($eachrecord1['pre_special_care']!='') { echo $eachrecord1['pre_special_care']; } else {echo $pre_special_care;}?>" />													  </td>
			   </tr>					
													<tr>
														<td height="28" colspan="2" align="center" valign="top">Date of Leaving </td>
														<td width="5" align="center" valign="top">:</td>
														<td colspan="2" align="center" valign="top">
                                                        
														  <input type="text" name="admission_date1" value="<?php  if($eachrecord1['admission_date1']!='') { echo $eachrecord1['admission_date1']; } else {echo $admission_date1;}?>"/>														</td>
														<td width="279" align="center" valign="top">Class from which left </td>
														<td width="5" align="center" valign="top">:</td>
														<td colspan="2" align="center" valign="top">
														  <input type="text" name="pre_emailid" value="<?php  if($eachrecord1['pre_emailid']!='') { echo $eachrecord1['pre_emailid']; } else {echo $pre_emailid;}?>" />													  </td>
													</tr>
													<tr>
								 <td height="25" colspan="9" valign="top" class="bgcolor_02">&nbsp;<span class="admin">Ex-Student Information</span></td>
						      </tr>
							  <tr>
								<td width="6" height="72"></td>
								<td colspan="8" align="left" valign="top" class="narmal"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td width="17%" height="30" align="left">Qualification </td>
                                    <td width="2%" align="left">:</td>
                                    <td width="30%" align="left"><input name="ann_income" type="text" size="15" value="<?php echo $eachrecord1['ann_income'];?>" /></td>
                                    <td width="17%" align="left">Achievements</td>
                                    <td width="2%" align="left">:</td>
                                    <td width="32%" align="left"><input type="text" name= "fee_concession"  size="15" value="<?php echo $eachrecord1['fee_concession'];?>"/>                                      &nbsp;</td>
                                  </tr>
								  <tr>
                                    <td width="17%" height="30" align="left">Occupation</td>
                                    <td width="2%" align="left">:</td>
                                    <td width="30%" align="left"><input name="pre_sec" type="text" size="15" value="<?php echo $eachrecord1['pre_sec'];?>" /></td>
                                    <td width="17%" align="left">Department &amp; Designation</td>
                                    <td width="2%" align="left">:</td>
                                    <td width="32%" align="left"><input name="admission_status" type="text" size="15" value="<?php echo $eachrecord1['admission_status'];?>" />                                      &nbsp;</td>
                                  </tr>
                                 
                                </table></td>
							  </tr>
							  <tr>
							    <td height="10"></td>
							    <td width="196"></td>
							    <td></td>
							    <td width="105"></td>
							    <td width="110"></td>
							    <td></td>
							    <td></td>
							    <td width="1"></td>
							    <td></td>
		       </tr>
							  		
													<?php /*?><tr>
														<td align="center" valign="top">
												<input type="text" name="pre_physical_details" value="<?php  if($eachrecord1['pre_physical_details']!='') { echo $eachrecord1['pre_physical_details']; } else {echo $pre_physical_details;}?>"/>										
													  </td>
														<td align="center" valign="top">
                                                        
														<input type="text" name="pre_height" value="<?php  if($eachrecord1['pre_height']!='') { echo $eachrecord1['pre_height']; } else {echo $pre_height;}?>"/>														</td>
														<td align="center" valign="top">
														<input type="text" name="pre_weight" value="<?php  if($eachrecord1['pre_weight']!='') { echo $eachrecord1['pre_weight']; } else {echo $pre_weight;}?>" />													  </td>
													</tr>		
													<tr>
														<td align="center" valign="top">
												<input type="text" name="pre_alerge" value="<?php  if($eachrecord1['pre_alerge']!='') { echo $eachrecord1['pre_alerge']; } else {echo $pre_alerge;}?>"/>										
													  </td>
														<td align="center" valign="top">
                                                        
														<input type="text" name="pre_physical_status" value="<?php  if($eachrecord1['pre_physical_status']!='') { echo $eachrecord1['pre_physical_status']; } else {echo $pre_physical_status;}?>"/>														</td>
														<td align="center" valign="top">
														<input type="text" name="pre_special_care" value="<?php  if($eachrecord1['pre_special_care']!='') { echo $eachrecord1['pre_special_care']; } else {echo $pre_special_care;}?>" />													  </td>
													</tr>	<?php */?>	
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
													
										  </table></td>
             <td class="bgcolor_02"></td>
          </tr>
         
          <tr>
            <td height="25" colspan="3" class="bgcolor_02"><span class="admin"> &nbsp;&nbsp;TRANSPORT</span></td>
          </tr>
          <tr>
             <td class="bgcolor_02"></td>
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
                                                       <td><span id="internal-source-marker_0.1335878380918223">Pick-up Point</span></td>
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
                                    </select>                                    </td>
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
                   <option label="<?php echo $route_row['route_title']." -(".$new_word.")"; ?>">
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
                   </option>
                   <?php }?>
                   </select>                 </td>
               </tr>  
			   
			   <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="28%" height="30" align="left">Other Transport </td>
                 <td width="2%" align="left">:</td>
                 <td width="69%" align="left">
                 		 
                         <input type="text" name="pre_physical_details" value="<?php echo $eachrecord1['pre_physical_details'];?>" /></td>
               </tr>
                <tr>
                                                       <td width="1%">&nbsp;</td>
                                                       <td><span id="internal-source-marker_0.1335878380918223">Other Transport Description </span></td>
                  <td>:</td>
                                                       <td><textarea cols="25" rows="5" name="pre_height"><?php echo $eachrecord1['pre_height'];?></textarea>                        </td>
               </tr>
			   
			   
			
			             
             </table></td>
             <td class="bgcolor_02"></td>
          </tr>
          <tr>
             <td class="bgcolor_02"></td>
             <td align="center" height="40px"><input name="update" type="submit" class="bgcolor_02" value="Update" style="cursor:pointer" />&nbsp;<?php /*?><input name="Submit" type="button" class="bgcolor_02" style="cursor:pointer" onClick="newWindowOpen ('?pid=21&amp;action=printstudent&amp;print_class=<?php echo $eachrecord1['pre_class']; ?><?php echo $studentUrl;?>');" value="Print Registration Form"/><?php */?></td>
             <td class="bgcolor_02"></td>
          </tr>  
</table>
</form>	
<?php

/**
* ********End of edit Student*********************************
*/
 //}
  //} ?>	
		
<?php

/**
* ********Print option for Student*****************************
*/

 if($action=="printstudent")
{
?>	

<table width="630" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td  align="left" valign="top" class="form-inner-border">
        <table width="630" border="0" cellspacing="0" cellpadding="2">
          <tr>
          <tr>
            <td  align="left" valign="middle" class="form-tex1">
          TODAY'S DATE        </td>
            <td align="center" valign="middle" class="form-tex2">:</td>
            <td align="left" valign="middle"><?php echo date("d-m-Y")  ?></td>
          </tr>
          
          
            <td width="278"  align="left" valign="middle" class="form-tex1">
         CLASS        </td>
            <td width="24" align="center" valign="middle" class="form-tex2">:</td>
            <td width="328" align="left" valign="middle"><?php 
			$online_sql="select * from es_classes where es_classesid=".$eachrecord1['pre_class'];
	                                    $online_row=$db->getRow($online_sql);
			echo ($online_row['es_classname']); ?></td>
          </tr>
          
          
          
          <tr>
            <td  align="left" valign="middle" class="form-tex1">
            CANDIDATE'S NAME
            <br />
            (IN CAPITAL LETTER'S)            </td>
            <td align="center" valign="middle" class="form-tex2">:</td>
            <td align="left" valign="middle"><?php echo strtoupper($eachrecord1['pre_name']); ?></td>
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
                    <td align="left" valign="middle"> <input type="text" size="3" maxlength="4" />&nbsp;<textarea rows="1"></textarea></td>
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
            <td width="300" rowspan="2" align="left" valign="middle"><table width="300" border="0" cellspacing="0" cellpadding="2">
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
                <td align="left" valign="top" class="form-tex1">COUNTRY</td>
                <td align="center" valign="top" class="form-tex2">:</td>
                <td align="left" valign="top"><?php echo $eachrecord1['pre_country']; ?></td>
              </tr>
                 <tr>
                <td align="left" valign="top" class="form-tex1">Nationality</td>
                <td align="center" valign="top" class="form-tex2">:</td>
                <td align="left" valign="top">  <input type="text" size="4" maxlength="8" /></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td align="left" valign="top" class="form-tex1">Income</td>
            <td width="230" align="left" valign="top"><?php echo $eachrecord1['ann_income']; ?></td>
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
        <td  align="left" valign="middle"  >
        
        <span class="form-tex2">DECLARATION :  </span>
        
        <br />
        
        I <?php echo $eachrecord1['pre_name']; ?> here by admit that all the entries made above are correct of my knowledge and i undertake to fully abide by rules and regulations of the school. 
        In all matters the decision of management committe shall be final and binding upon us.
        
        
        
        </td>
      </tr>
      <tr>
        <td  align="center" valign="middle" class="form-inner-border"><table width="600" border="0" cellspacing="0" cellpadding="2">
        
        
        <tr>
            <td  align="center" valign="middle" class="form-tex3" >Signature of Father / Guardian</td>
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
                <td  align="left" valign="middle" class="form-tex1">Amount Deposited:</td>
                <td align="left" valign="middle"><input type="text" size="6" maxlength="5"  width="20"/></td>
              </tr>
              <tr>
                <td height="30" align="left" valign="middle" class="form-tex1">Remarks:</td>
                <td><input type="text" size="6"  width="20"/></td>
              </tr>
              <tr>
                <td  colspan="2" align="center" valign="middle"><table width="200" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td  align="center" valign="middle" class="form-tex1">Checker's Signature</td>
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
				  <td width="32%"  class="narmal"><select name="sm_class" style="width:180px;">
                         <option value="" >Select</option>
                       <?php 
					     if (count($allClasses)>0){
					      foreach($allClasses as $eachClass){
					   ?>
                         <option value="<?php echo $eachClass['es_classesid']; ?>"  <?php echo ($eachClass['es_classesid']==$sm_class)?"selected":""?>><?php echo $eachClass['es_classname']; ?></option>
                         <?php }} ?>
                     </select>
				     <font color="#FF0000">*</font></td>
					<td width="15%" class="narmal">Registration&nbsp;No&nbsp;: </td>
				  <td width="29%" class="narmal">
				  <input type="text" name="regnum" id="regnum" value="<?php if(isset($regnum)&& $regnum!='') echo $regnum; ?>" size="8" /><font color="#FF0000">*</font></td>
					<td width="14%" class="narmal">
					
					<input name="classserch" type="submit" class="bgcolor_02" value="Search" style="cursor:pointer"/></td>
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
        <?php if(isset($es_studentList) && $es_studentList!=""){ ?>	
			<table width="98%" border="1" cellspacing="0" cellpadding="0" class="tbl_grid">
			<form action="" method="post" name="updatestudents" >
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
					<select name="up_class[]" style="width:100px;" >
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
					<?php if(in_array('5_2',$admin_permissions)){?>
					<input name="updatestudents" type="submit" class="bgcolor_02" value="Submit" style="cursor:pointer" />
					
					<?php }?></td>
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
		if (document.getElementById('sameaddress').checked){
	//alert("checked");
			document.preadmission.pre_address.value=document.preadmission.pre_address1.value;
			document.preadmission.pre_city.value=document.preadmission.pre_city1.value;
			document.preadmission.pre_pincode.value=document.preadmission.pre_pincode1.value;
			document.preadmission.pre_phno.value=document.preadmission.pre_phno1.value;			
			document.preadmission.pre_state.value=document.preadmission.pre_state1.value;
			
document.preadmission.pre_country.value=document.preadmission.pre_country1.value;
			document.preadmission.pre_mobile.value=document.preadmission.pre_mobile1.value;
			
		}else{
			document.preadmission.pre_address.value="";
			document.preadmission.pre_city.value="";
			document.preadmission.pre_pincode.value="";
			document.preadmission.pre_phno.value="";			document.preadmission.pre_state.value="";
			
	document.preadmission.pre_country.value="";
			document.preadmission.pre_mobile.value="";
		
		
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
					<td width="185"  align="center"> Total Males </td>
					<td width="212"  align="center"> Total Females </td>
					<td width="146"  align="center">Total Strength</td>
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
<?php } 

 if($action=='studentlist2') {?>
		  
 
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr><td colspan="4" height="6"></td></tr>
	<tr>
	  <td height="25" colspan="4" class="bgcolor_02">&nbsp;&nbsp;Students List</td>
	</tr>
	<tr><td height="1" colspan="4" class="bgcolor_02"></td></tr>
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td>
		<form name="promotion" action="" method="post">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		
				 <tr>
                    <td height="20" colspan="6" align="center" ></td>
                 </tr>
				<tr>
					<td width="14%" align="left" valign="middle" class="narmal">&nbsp;&nbsp;Class:</td>
					<td width="28%" align="left" valign="middle"  class="narmal"><select name="sm_class" style="width:110px;">
                      <option value="all">-- Select --</option>
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
				  
				  <?php 
				  $get_section="SELECT * FROM `es_sections`";
				  $get_rows=$db->getrows($get_section)
				  
				  ?>
				  <td width="14%" align="left" valign="middle" class="narmal">&nbsp;Section:</td>
				  <td width="28%" align="left" valign="middle" class="narmal"><select name="section" style="width:100px;">
				  <option value="">-- Select --</option>
                       
                         <?php  foreach($get_rows as $each_record) { ?>
                         <option value="<?php echo $each_record['section_id']; ?>" <?php if ($each_record['section_id']==$section) { echo "selected"; }?>><?php echo $each_record['section_name']; ?> </option>

                         <?php } ?>
                  </select></td>
				  <td width="16%" align="left" valign="middle" class="narmal">&nbsp;&nbsp; <input name="searchstudentlist" type="submit" class="bgcolor_02" value="Search"  style="cursor:pointer; height:22px;"/></td>
				  <td></td>
				</tr>
				<tr><td height="10" colspan="6"></td></tr>
				
	  </table>
	  </form>	
	  </td>
	  <td></td>
		<td width="1" class="bgcolor_02" ></td>
	</tr>
	<tr>
		<td height="19" width="1" class="bgcolor_02"></td>
		<td colspan="2">&nbsp;
		<?php 
		if(isset($searchstudentlist) && $searchstudentlist!=""){ 

		if(is_array($result_details)&&count($result_details)>0){
		?>
		 Academic Year :  <?php   if($result_details[0]['pre_fromdate']!=''){echo displayDate($result_details[0]['pre_fromdate']);}?> To <?php if($result_details[0]['pre_fromdate']!=''){ echo displayDate($result_details[0]['pre_todate']);}}}?>		  </td>
		<td width="1" class="bgcolor_02"></td>
	</tr>
	
	<tr>
		<td height="19" width="1" class="bgcolor_02"></td>
		<td> &nbsp;
		<?php 
	
		if(isset($searchstudentlist) && $searchstudentlist!=""){ 
		if(is_array($result_details)&&count($result_details)>0){
		?>
		Class : <?php echo classname($result_details[0]['pre_class']); }}?> </td>
		<td align="right">
		<?php if(isset($searchstudentlist) && $searchstudentlist!=""){
		if(is_array($result_details)&&count($result_details)>0){
		 ?>
		<a href="" class="bgcolor_02" style="padding:2px; text-decoration:none;">Export List</a> 
		 <?php }}?>
		 &nbsp;
		</td>
		<td width="1" class="bgcolor_02"></td>
	</tr>						
	<tr><td width="1" class="bgcolor_02"></td>
	  <td colspan="2"  align="center" valign="top" style="padding-top:8px;">	
        <?php if(isset($searchstudentlist) && $searchstudentlist!=""){ ?>	
			<table width="98%" border="1" cellspacing="0" cellpadding="0" class="tbl_grid">
			
				<?php if (is_array($result_details)&&count($result_details)>0){?>
				<tr class="bgcolor_02">
					<td width="66"  align="center" height="25" >S&nbsp;NO</td>
				
					<td width="122"  align="center">Roll No </td>
					<td width="99"  align="center">Section</td>
					<td width="93"  align="center">Reg.No</td>
					<td width="228"  align="left">Name</td>
					<td width="205"  align="left"> &nbsp;Father Name </td>
					<td width="205"  align="left">&nbsp;Mother Name </td>
					<td width="150"  align="left">&nbsp;Mobile No </td>
				</tr>
		<?php
			$malegrandtotal=0;
			$femalegarndtotal=0;
			
			//array_print($result_details);
		
			foreach ($result_details as $eachrecord){
				$i++ ;
			
			$zibracolor = ($i%2==0)?"even":"odd";
		?>
		
		<?php 		
/*		   $get_sec= "SELECT * FROM `es_sections_student` WHERE student_id = '".$eachrecord['es_preadmissionid']."' ";
		  $res_sec=mysql_query($get_sec);
		  $row_sec=mysql_fetch_array($res_sec);
		  $get_rollno=$row_sec['roll_no'];
		   $get_sec=$row_sec['section_student_id'];
		   */
		    $eachrecord['roll_no'];
		  $eachrecord['section_id'];
		   
		  $get_sec1= "SELECT * FROM `es_sections` WHERE section_id = '".$eachrecord['section_id']."'";
		  $res_sec1=mysql_query($get_sec1);
		  $row_sec1=mysql_fetch_array($res_sec1);
		   $get_sec1=$row_sec1['section_name'];
		
		?>
				<tr class="<?php echo $zibracolor;?>">
					<td height="26" align="center" valign="middle"><?php echo $i;?></td>
					
					<td align="center" valign="middle" class="narmal"><?php if($eachrecord['roll_no']!=''){echo $eachrecord['roll_no'];}else{echo '---';}?></td>
					<td align="center" valign="middle" class="narmal"><?php if($get_sec1!=''){echo $get_sec1;}else{echo '---';}?></td>
					<td align="center" valign="middle" class="narmal"><?php echo $eachrecord['es_preadmissionid']; ?></td>					
					<td align="left" valign="middle" class="narmal"><?php echo $eachrecord['pre_name']; ?></td>
					<td align="left" valign="middle" class="narmal"><?php echo $eachrecord['pre_fathername']; ?></td>

					<td align="left" valign="middle" class="narmal"><?php if($eachrecord['pre_mothername']!=''){echo $eachrecord['pre_mothername'];}else{echo '---';} ?></td>
					<td align="left" valign="middle" class="narmal"><?php echo $eachrecord['pre_mobile1'];?></td>
				</tr>                         
<?php 
	}
 ?>	
				<tr>
					<td colspan="9" align="center" valign="middle" >&nbsp;</td>                           
				</tr>
							
			<?php }
			
			else
			{
			?>
			<tr>
					<td height="26" colspan="9" align="center" valign="middle">No Records Found</td>
			</tr>
			
			<?php }
			?>
		</table>
			<?php }?>      </td>
		<td width="1" class="bgcolor_02"></td>
	</tr>
	<tr><td width="1"class="bgcolor_02" ></td><td height="20" colspan="2" >&nbsp;</td><td width="1"class="bgcolor_02"></td>
	</tr>
	<tr><td height="1" colspan="4"class="bgcolor_02" ></td></tr>
</table>
<?php } 

?>

<?php

/**
* ********Student View Profile*****************************
*/
			
if($action=="viewprofile" && $back=="")
{
 //foreach ($es_studentview as $eachrecord1){
 
?>



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
				//document.getElementById("subjectselectbox").innerHTML=xmlHttp.responseText
			}
		}
</script>			
<form method="post" name="preadmission" action="" enctype="multipart/form-data">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <!--DWLayoutTable-->
        <tr>
           <td height="6" colspan="3" class="error_message" align="center"></td>
    </tr>
        
         <tr>
            <td height="25" colspan="3" class="bgcolor_02"><a href="#" class="admin"> &nbsp;&nbsp;Pre Admission</a></td>
    </tr>
           
          <tr>
             <td width="1" class="bgcolor_02"></td>
             <td width="956" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font></td>
             <td width="1" class="bgcolor_02"></td>
          </tr> 
          <tr>
             <td class="bgcolor_02"></td>
             <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
               <!--DWLayoutTable-->
			 <tr>
                   <td>&nbsp;</td>
                   <td height="30" align="left"><span class="narmal">Tittle</span></td>
                 <td align="left">:</td>
                   <td align="left"> 
									   
									  <?php
								if(isset($pre_serialno) && $pre_serialno=="Mr" || isset($eachrecord1['pre_serialno']) && $eachrecord1['pre_serialno']=="Mr") 
								{$sel_gend_mr= "selected='selected'"; }else{$sel_gend_mr = ""; }
								if(isset($pre_serialno) && $pre_serialno=="Miss" || isset($eachrecord1['pre_serialno']) && $eachrecord1['pre_serialno']=='Miss') 
								{$sel_gend_miss = "selected='selected'";}else{$sel_gend_miss = ""; }
	    if(isset($pre_serialno) && $pre_serialno=="Mrs" || isset($eachrecord1['pre_serialno']) && $eachrecord1['pre_serialno']=="Mrs") 
								{$sel_gend_mrs = "selected='selected'";}else{$sel_gend_mrs = ""; }
								?>
                                      <select name="pre_serialno"  id="pre_serialno" style="width:120px;">
                                        <option value="" >Select Tittle</option>
                                        <option  value="Mr" <?php echo $sel_gend_mr; ?> >Mr</option>
                                        <option  value="Miss" <?php echo $sel_gend_miss; ?>>Miss</option>
										<option  value="Mrs" <?php echo $sel_gend_mrs; ?>>Mrs</option>
                                      </select>	</td>		
									  
									  
                   <td align="left"><span class="narmal">First Name</span></td>
                   <td align="left">:</td>
                   <td align="left">
                   
                  <?php echo htmlentities($eachrecord1['pre_name']); ?>               </td>
               </tr>
			 
               <tr>
                   <td>&nbsp;</td>
                   <td height="30" align="left"><span class="narmal">Middle Name </span></td>
                 <td align="left">:</td>
                   <td align="left"><?php echo htmlentities($eachrecord1['pre_fathername']); ?></td>
                   <td align="left"><span class="narmal">Last Name</span></td>
                   <td align="left">:</td>
                   <td align="left">
                   
                 <?php if($eachrecord1['pre_fathersoccupation']!='') {echo $eachrecord1['pre_fathersoccupation']; } else { echo $pre_fathersoccupation;} ?>                </td>
               </tr>
			   
			   <?php
			   $query="SELECT * FROM es_preadmission";
			   $result=mysql_query($query) or die("Data Extraction Not Possible");
		       //$numrows=mysql_num_rows($result);
		       $ret=mysql_fetch_array($result);
			   
			   
			   ?>
                 <tr>
                   <td>&nbsp;</td>
                   <td height="30" align="left"><span class="narmal">Gender </span></td>
                   <td align="left">:</td>
                   <td align="left">
				   <?php
						   
						  
								if(isset($pre_gender) && $pre_gender=="male" || isset($eachrecord1['pre_gender']) && $eachrecord1['pre_gender']=="male") 
								{$sel_gend_m= "selected='selected'"; }else{$sel_gend_m="";}
								if(isset($pre_gender) && $pre_gender=="female" || isset($eachrecord1['pre_gender']) && $eachrecord1['pre_gender']=='female') 
								{$sel_gend_fm = "selected='selected'";}else{$sel_gend_fm = ""; }
								?>
                                      <select name="pre_gender"  id="pre_gender" style="width:120px;">
                                        <option value="" >Select Gender </option>
                                        <option  value="male" <?php echo $sel_gend_m; ?> >Male</option>
                                        <option  value="female" <?php echo $sel_gend_fm; ?>>Female</option>
                                      </select></td>
                   <td align="left"><span class="narmal">Academic From</span></td>
                   <td align="left">:</td>
                   <td align="left"><?php echo formatDBDateTOCalender($eachrecord1['pre_fromdate']);?></td>
               </tr>
                 <tr>
                   <td>&nbsp;</td>
                   <td height="30" align="left"><span class="narmal">Admission Date</span></td>
                   <td align="left">:</td>
                   <td align="left"><?php  if($eachrecord1['admission_date']!=0000-00-00) {
									if(!isset($admission_date)){$admission_date = func_date_conversion("Y-m-d","d/m/Y",$eachrecord1['admission_date']);echo $admission_date; }} else { echo "---";}
									 ?><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.preadmission.admission_date);return false;" ></a></td>
                   <td align="left"><span class="narmal">Academic To </span></td>
                   <td align="left">:</td>
                   <td align="left"><?php echo formatDBDateTOCalender($eachrecord1['pre_todate']);?></td>
               </tr>
                 <tr>
                   <td>&nbsp;</td>
                   <td height="30" align="left"><span class="narmal">Date&nbsp;Of&nbsp;Birth </span></td>
                   <td align="left">:</td>
                   <td align="left">
                   
                   <table width="83%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td width="30%"><?php echo formatDBDateTOCalender($eachrecord1['pre_dateofbirth']); ?></td>
                                        <td width="70%">
                                        
                                        <a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.preadmission.pre_dateofbirth);return false;" ></a><iframe width=199 height=178 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="<?php echo JS_PATH ?>/WeekPicker/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">										</iframe></td>
                                      </tr>
                     </table>
                   
                   
               <?php /*?>    
                   <input name="pre_dateofbirth" type="text" id="pre_dateofbirth" size="15"  value="<?php echo formatDBDateTOCalender($eachrecord1['pre_dateofbirth']); ?>" readonly />
<iframe width=199 height=178 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="<?php echo JS_PATH ?>/WeekPicker/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">										</iframe><?php */?></td>
                   <td align="left"><span class="narmal">Programme</span></td>
                   <td align="left">:</td>
                   <td align="left">
                   
                   <select name="es_program" onChange="" 
				                         style="width:150px;" >
								<option value="">-Select-</option>
									<?php foreach($getgrplist as $eachrecord) { ?>
									<option value="<?php echo $eachrecord[es_groupsid];?>" <?php echo ($eachrecord[es_groupsid]==	$st_department)?"selected":""?>  ><?php echo $eachrecord[es_groupname];?></option>
					           <?php } ?>
		             </select>                   </td>
               </tr>
			   
			  
			   
                 <tr>
                   <td>&nbsp;</td>
                   <td height="30" align="left"><span class="narmal">Class</span></td>
                   <td align="left">:</td>
                   <td align="left">
				  <?php
								if(isset($pre_class) && $pre_class=="1st Sem" || isset($eachrecord1['pre_class']) && $eachrecord1['pre_class']=="1st Sem") 
								{$sel_gend_fsem= "selected='selected'"; }else{$sel_gend_fsem="";}
								if(isset($pre_class) && $pre_class=="3rd Sem" || isset($eachrecord1['pre_class']) && $eachrecord1['pre_class']=='3rd Sem') 
								{$sel_gend_tsem = "selected='selected'";}else{$sel_gend_tsem = ""; }
				
								?>
                                      <select name="pre_class"  id="pre_class" style="width:120px;">
                                        <option value="" >Select Level</option>
                                        <option  value="1st Sem" <?php echo $sel_gend_fsem; ?> >1st Sem</option>
                                        <option  value="3rd Sem" <?php echo $sel_gend_tsem; ?>>3rd Sem</option>
                                      </select>				   </td>
                   <td align="left"><span class="narmal">Level</span></td>
                                    <td align="left">:</td>
                                    <td align="left">
									<?php
								if(isset($pre_contactname2) && $pre_contactname2=="PG" || isset($eachrecord1['pre_contactname2']) && $eachrecord1['pre_contactname2']=="PG") 
								{$sel_gend_pg= "selected='selected'"; }else{$sel_gend_pg="";}
								if(isset($pre_contactname2) && $pre_contactname2=="UG" || isset($eachrecord1['pre_contactname2']) && $eachrecord1['pre_contactname2']=='UG') 
								{$sel_gend_ug = "selected='selected'";}else{$sel_gend_ug = ""; }
				if(isset($pre_contactname2) && $pre_contactname2=="Diploma" || isset($eachrecord1['pre_contactname2']) && $eachrecord1['pre_contactname2']=='Diploma') 
								{$sel_gend_diploma = "selected='selected'";}else{$sel_gend_diploma = ""; }
								?>
                                      <select name="pre_contactname2"  id="pre_contactname2" style="width:120px;">
                                        <option value="" >Select Level</option>
                                        <option  value="PG" <?php echo $sel_gend_pg; ?> >PG</option>
                                        <option  value="UG" <?php echo $sel_gend_ug; ?>>UG</option>
										<option  value="Diploma" <?php echo $sel_gend_diploma; ?>>Diploma</option>
                                      </select>									                                   </td>
               </tr>
			   
              
               
                 <tr>
                   <td>&nbsp;</td>
                   <td height="30" align="left"><span class="narmal">Father's Name </span></td>
                   <td align="left">:</td>
                   <td align="left"><?php echo htmlentities($eachrecord1['pre_fathername']); ?></td>
                   <td align="left"><span class="narmal">Branch</span></td>
                   <td align="left">:</td>
                   <td align="left"><?php echo htmlentities($eachrecord1['es_branch']); ?></td>
               </tr>
                 <tr>
                   <td>&nbsp;</td>
                   <td height="30" align="left"><span class="narmal">Mother's Name </span></td>
                   <td align="left">:</td>
                   <td align="left"><?php  if($eachrecord1['pre_mothername']!='') { echo $eachrecord1['pre_mothername']; } else { echo $pre_mothername;}?></td>
                   <td align="left"><span class="narmal">Email</span></td>
                   <td align="left">:</td>
                   <td align="left"><?php echo $eachrecord1['pre_emailid']; ?></td>
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
                                    <td align="left">Document Deposited</td>
                                    <td align="left">:</td>
                                    <td align="left">
									<input type="checkbox" name="document_deposited" value="YES" <?php
									if(!isset($document_deposited)){$document_deposited=$eachrecord1['document_deposited'];}
									 if($document_deposited=="YES"){?> checked="checked"<?php }?> /></td>
               </tr>
                                  <tr>
                                  <td>&nbsp;</td>
                                    <td height="30" align="left">Religion</td>
                                    <td align="left">:</td>
                                    <td align="left"><?php 
									if(!isset($pre_contactno2)){$pre_contactno2 = $eachrecord1['pre_contactno2'];}
									echo $pre_contactno2;  ?></td>
                                    <td align="left">Tuition Fee Concession</td>
                                    <td align="left">:</td>
                                    <td align="left"><?php 
									if(!isset($fee_concession)){$fee_concession = $eachrecord1['fee_concession'];}
									echo $fee_concession;  ?></td>
                                  </tr>
                                  <tr>
                                  <td>&nbsp;</td>
                                    <td height="30" align="left">Old Balance </td>
                                    <td align="left">:</td>
                                    <td align="left">
									<?php 
									if(!isset($ann_income)){$ann_income = $eachrecord1['ann_income'];}
									echo $ann_income;  ?>									</td>
                                    <td align="left">Enrollment No.</td>
                                    <td align="left">:</td>
                                    <td align="left"><?php 
									if(!isset($pre_age)){$pre_age = $eachrecord1['pre_age'];}
									echo $pre_age;  ?></td>
                                  </tr>
                 <tr>
                   <td>&nbsp;</td>
                   <td height="30" align="left"><span class="narmal">Photo </span></td>
                   <td align="left">:</td>
                   <td colspan="2" align="left"><input name="pre_image" type="file" />
                     <?php echo $eachrecord1['pre_image']; ?></td>
                   <td colspan="2" rowspan="3" align="left"><img src="images/student_photos/<?php echo  $eachrecord1['pre_image'];?>" width="127" height="105" border="0"/></td>
               </tr>
                 <?php /*?><tr>
                   <td>&nbsp;</td>
                   <td height="50" align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                   <td align="left">:</td>
                   <td colspan="2" align="left"><input name="pre_hobbies" type="text" size="4" value="<?php 
									if(!isset($pre_hobbies)){$pre_hobbies = $eachrecord1['pre_hobbies'];}
									echo $pre_hobbies;  ?>"  />&nbsp;&nbsp;<input name="pre_hobbies1" type="text" size="3" value="<?php 
									if(!isset($pre_hobbies1)){$pre_hobbies1 = $eachrecord1['pre_hobbies1'];}
									echo $pre_hobbies1;  ?>"  />&nbsp;&nbsp;<input name="pre_hobbies2" type="text" size="3" value="<?php 
									if(!isset($pre_hobbies2)){$pre_hobbies2 = $eachrecord1['pre_hobbies2'];}
									echo $pre_hobbies2;  ?>"  /></td>
               </tr><?php */?>
                 <tr>
                   <td>&nbsp;</td>
                   <td height="50" align="left"><span class="narmal">University Roll No.</span></td>
                   <td align="left">:</td>
                   <td colspan="2" align="left"><?php if($eachrecord1['test2']!='') { echo $eachrecord1['test2']; } else { echo $test2;}  ?></td>
               </tr>
                 <tr>
                                  <td>&nbsp;</td>
                                    <td height="30" align="left">Residence</td>
                                    <td align="left">:</td>
                                    <td align="left">
									<?php if(isset($es_home) && $es_home=="Home" || isset($eachrecord1['es_home']) && $eachrecord1['es_home']=="Home") 
								{$sel_gend_Home= "selected='selected'"; }else{$sel_gend_home="";}
								if(isset($es_home) && $es_home=="Hostel" || isset($eachrecord1['es_home']) && $eachrecord1['es_home']=='Hostel') 
								{$sel_gend_Hostel = "selected='selected'";}else{$sel_gend_Hostel = ""; }
				
								?>
                                      <select name="es_home"  id="es_home" style="width:120px;">
                                        <option value="" >Select Type</option>
                                        <option  value="Home" <?php echo $sel_gend_yes; ?> >Home</option>
                                        <option  value="Hostel" <?php echo $sel_gend_no; ?>>Hostel</option>
                                      </select>										</td>
                                    <td align="left">Reserve Category</td>
                                    <td align="left">:</td>
                                    <td align="left"><?php
								if(isset($es_rcat) && $es_rcat=="Yes" || isset($eachrecord1['es_rcat']) && $eachrecord1['es_rcat']=="Yes") 
								{$sel_gend_yes= "selected='selected'"; }else{$sel_gend_yes="";}
								if(isset($es_rcat) && $es_rcat=="No" || isset($eachrecord1['es_rcat']) && $eachrecord1['es_rcat']=='No') 
								{$sel_gend_no = "selected='selected'";}else{$sel_gend_no = ""; }
				
								?>
                                      <select name="es_rcat"  id="es_rcat" style="width:120px;">
                                        <option value="" >Select Level</option>
                                        <option  value="Yes" <?php echo $sel_gend_yes; ?> >Yes</option>
                                        <option  value="No" <?php echo $sel_gend_no; ?>>No</option>
                                      </select></td>
               </tr>
								  
								  <tr>
                                  <td>&nbsp;</td>
                                    <td height="30" align="left">Is Physically Handicapped</td>
                                    <td align="left">:</td>
                                    <td align="left">
									<?php if(isset($es_phandcaped) && $es_phandcaped=="Yes" || isset($eachrecord1['es_phandcaped']) && $eachrecord1['es_phandcaped']=="Yes") 
								{$sel_gend_yes= "selected='selected'"; }else{$sel_gend_yes="";}
								if(isset($es_phandcaped) && $es_phandcaped=="No" || isset($eachrecord1['es_phandcaped']) && $eachrecord1['es_phandcaped']=='No') 
								{$sel_gend_no = "selected='selected'";}else{$sel_gend_no = ""; }
				
								?>
                                      <select name="es_phandcaped"  id="es_phandcaped" style="width:120px;">
                                        <option value="" >Select Type</option>
                                        <option  value="Yes" <?php echo $sel_gend_yes; ?> >Yes</option>
                                        <option  value="No" <?php echo $sel_gend_no; ?>>No</option>
                                      </select>									</td>
                                    <td align="left">Econ Backward</td>
                                    <td align="left">:</td>
                                    <td align="left"><?php
								if(isset($es_econbackward) && $es_econbackward=="Yes" || isset($eachrecord1['es_econbackward']) && $eachrecord1['es_econbackward']=="Yes") 
								{$sel_gend_yes= "selected='selected'"; }else{$sel_gend_yes="";}
								if(isset($es_econbackward) && $es_econbackward=="No" || isset($eachrecord1['es_econbackward']) && $eachrecord1['es_econbackward']=='No') 
								{$sel_gend_no = "selected='selected'";}else{$sel_gend_no = ""; }
				
								?>
                                      <select name="es_econbackward"  id="es_econbackward" style="width:120px;">
                                        <option value="" >Select Type</option>
                                        <option  value="Yes" <?php echo $sel_gend_yes; ?> >Yes</option>
                                        <option  value="No" <?php echo $sel_gend_no; ?>>No</option>
                                      </select></td>
                                  </tr>
								  
								   <tr>
                                  <td>&nbsp;</td>
                                    <td height="30" align="left">Room</td>
                                    <td align="left">:</td>
                                    <td align="left">
										<select name="pre_room"  id="pre_room" style="width:120px;">
                                        <option value="" >Select Type</option>
                                        <option  value="Yes" <?php echo $sel_gend_yes; ?> >Yes</option>
                                        <option  value="No" <?php echo $sel_gend_no; ?>>No</option>
                                    </select>							</td>
									
									<?php
									//$query="select * from es_preadmission";
//									$res=mysql_query($query);
//									$ret=mysql_fetch_array($res);
//									$preid=$ret['es_preadmissionid'];
									
									 $query1="select * from es_preadmission where es_preadmissionid=".$sid;
									$res1=mysql_query($query1);
									//$numrows=mysql_num_rows($res);
									$ret1=mysql_fetch_array($res1);
									$i=0;
									//$cid=mysql_result($res1,$i,'es_preadmissionid');
									$buld=mysql_result($res1,$i,'pre_building');
									
									?>
									
                                    <td align="left">Building</td>
                                    <td align="left">:</td>
                                    <td align="left">
									  
									<select name="pre_building">
      <option value="">Select Building</option>
	  <?php
		 $res_cat=mysql_query("select es_hostelbuldid from es_hostelbuld order by pre_building");
		  //echo res_cat;
		  while($ret_cat=mysql_fetch_row($res_cat))
		  {
			  if($ret_cat[0]==$buld)
			  	echo "<option value=\"$ret_cat[0]\" selected> $ret_cat[0]</option>";
			  else
			  	echo "<option value=\"$ret_cat[0]\"> $ret_cat[0]</option>";
		  }
		  
		  ?>
	      </select>									  </td>
                                  </tr>
								  
								  
             </table></td>
             <td class="bgcolor_02"></td>
          </tr>          
          <tr>
            <td height="25" colspan="3" class="bgcolor_02"><span class="admin"> &nbsp;&nbsp;Present Address</span></td>
          </tr>
          <tr>
             <td class="bgcolor_02"></td>
             <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="21%" height="50" align="left"><span class="narmal">Address</span></td>
                 <td width="1%" align="left">:</td>
                 <td colspan="4" align="left"><?php echo $eachrecord1['pre_address1']; ?></td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td height="30" align="left"><span class="narmal">City</span></td>
                 <td align="left">:</td>
                 <td width="30%" align="left"><?php if($eachrecord1['pre_city1']!='') {echo $eachrecord1['pre_city1'];} else { echo $pre_city1; } ?></td>
                 <td width="23%" align="left"><span class="narmal">State</span></td>
                 <td width="1%" align="left">:</td>
                 <td width="23%" align="left"><?php  if($eachrecord1['pre_state1']!='') {echo $eachrecord1['pre_state1']; } else { echo $pre_state1; }?></td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td height="30" align="left"><span class="narmal">Pin Code </span></td>
                 <td align="left">:</td>
                 <td align="left"><?php  if($eachrecord1['pre_pincode1']!='') {echo $eachrecord1['pre_pincode1']; } else { echo $pre_pincode1; }?></td>
                 <td align="left"><span class="narmal">Country</span></td>
                 <td align="left">:</td>
                 <td align="left"><?php  if($eachrecord1['pre_country1']!='') {echo $eachrecord1['pre_country1']; } else { echo $pre_country1; }?></td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td height="30" align="left"><span class="narmal">Phone No </span></td>
                 <td align="left">:</td>
                 <td align="left"><?php  if($eachrecord1['pre_phno1']!='') {echo $eachrecord1['pre_phno1'];} else { echo $pre_phno1; } ?></td>
                 <td align="left"><span class="narmal">Mobile No </span></td>
                 <td align="left">:</td>
                 <td align="left"><?php echo $eachrecord1['pre_mobile1']; ?></td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td align="left">&nbsp;</td>
                 <td align="left">:</td>
                 <td align="left">&nbsp;</td>
                 <td colspan="3" align="left"><span style="color:#FF0000">(All future SMS messages will be sent to this number)</span></td>
               </tr>
             </table></td>
             <td class="bgcolor_02"></td>
          </tr>  
          <tr>
            <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Permanent  Address</span><span class="admin">             
					<input type="checkbox" name="sameaddress" id="sameaddress" value="0" onClick="javascript:getfieldvalues()" />
				Same as Above </span></td>
          </tr>
          <tr>
             <td class="bgcolor_02"></td>
             <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="21%" height="50" align="left"><span class="narmal">Addres</span></td>
                 <td width="1%" align="left">:</td>
                 <td colspan="4" align="left"><?php if($eachrecord1['pre_address']!='') { echo $eachrecord1['pre_address'];} else {echo $pre_address;} ?></td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td height="30" align="left"><span class="narmal">City</span></td>
                 <td align="left">:</td>
                 <td width="30%" align="left"><?php  if($eachrecord1['pre_city']!='') { echo $eachrecord1['pre_city']; } else {echo $pre_city;}?></td>
                 <td width="23%" align="left"><span class="narmal">State</span></td>
                 <td width="1%" align="left">:</td>
                 <td width="23%" align="left"><?php  if($eachrecord1['pre_state']!='') { echo $eachrecord1['pre_state'];} else {echo $pre_state;} ?></td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td height="30" align="left"><span class="narmal">Pin Code </span></td>
                 <td align="left">:</td>
                 <td align="left"><?php  if($eachrecord1['pre_pincode']!='') { echo $eachrecord1['pre_pincode']; } else {echo $pre_pincode;}?></td>
                 <td align="left"><span class="narmal">Country</span></td>
                 <td align="left">:</td>
                 <td align="left"><?php  if($eachrecord1['pre_country']!='') { echo $eachrecord1['pre_country'];} else {echo $pre_country;} ?></td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td height="30" align="left"><span class="narmal">Phone No </span></td>
                 <td align="left">:</td>
                 <td align="left"><?php  if($eachrecord1['pre_phno']!='') { echo $eachrecord1['pre_phno'];} else {echo $pre_phno;} ?></td>
                 <td align="left"><span class="narmal">Mobile No </span></td>
                 <td align="left">:</td>
                 <td align="left"><?php  if($eachrecord1['pre_mobile']!='') { echo $eachrecord1['pre_mobile']; } else {echo $pre_mobile;}?></td>
               </tr>
               
             </table></td>
             <td class="bgcolor_02"></td>
          </tr>  
          <tr>
            <td height="25" colspan="3" class="bgcolor_02"><span class="admin"> &nbsp;&nbsp;Contact Person Details </span></td>
          </tr>
          <tr>
             <td class="bgcolor_02"></td>
             <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                 <td width="1%">&nbsp;</td>
                 <td width="21%" height="30" align="left"><span class="narmal">Name</span></td>
                 <td width="1%" align="left">:</td>
                 <td width="30%" align="left"><?php  if($eachrecord1['pre_contactname1']!='') { echo $eachrecord1['pre_contactname1'];} else {echo $pre_contactname1;} ?></td>
                 <td width="23%" align="left"><span class="narmal">Contact No </span></td>
                 <td width="1%" align="left">:</td>
                 <td width="23%" align="left"><?php  if($eachrecord1['pre_contactno1']!='') { echo $eachrecord1['pre_contactno1'];} else {echo $pre_contactno1;} ?></td>
               </tr>
               
             </table></td>
             <td class="bgcolor_02"></td>
          </tr>  
          
          <tr>
             <td class="bgcolor_02"></td>
             <td></td>
             <td class="bgcolor_02"></td>
          </tr>  
          <tr>
            <td height="25" colspan="3" class="bgcolor_02"><table width="100%" border="0" cellpadding="0" cellspacing="0" >
               <tr class="bgcolor_02" height="22">
                 <td width="33%" height="25" align="center" class="admin">Institution</td>
                 <td width="33%" align="center" class="admin">Percentage</td>
                 <td width="34%" align="center"class="admin">Result</td>
              </tr></table></td>
          </tr>
          <tr>
             <td class="bgcolor_02"></td>
             <td><table width="100%" border="0" cellpadding="3" cellspacing="0">
											 
													<tr>
														<td align="center" valign="top">
												<?php  if($eachrecord1['pre_current_class1']!='') { echo $eachrecord1['pre_current_class1']; } else {echo $pre_current_class1;}?>													  </td>
														<td align="center" valign="top">
                                                        
														<?php  if($eachrecord1['pre_current_percentage1']!='') { echo $eachrecord1['pre_current_percentage1']; } else {echo $pre_current_percentage1;}?>														</td>
														<td align="center" valign="top">
			   <?php  if($eachrecord1['pre_current_result1']!='') { echo $eachrecord1['pre_current_result1']; } else {echo $pre_current_result1;}?>													  </td>
													</tr>
													
								<tr>
														<td align="center" valign="top">
												<?php  if($eachrecord1['pre_current_class2']!='') { echo $eachrecord1['pre_current_class2']; } else {echo $pre_current_class2;}?>								  </td>
														<td align="center" valign="top">
                                                        
														<?php  if($eachrecord1['pre_current_percentage2']!='') { echo $eachrecord1['pre_current_percentage2']; } else {echo $pre_current_percentage2;}?>														</td>
														<td align="center" valign="top">
														<?php  if($eachrecord1['pre_current_result2']!='') { echo $eachrecord1['pre_current_result2']; } else {echo $pre_current_result2;}?>												  </td>
			   </tr>					
													<tr>
														<td align="center" valign="top">
												 <?php  if($eachrecord1['pre_current_class3']!='') { echo $eachrecord1['pre_current_class3']; } else {echo $pre_current_class3;}?>												  </td>
														<td align="center" valign="top">
                                                        
														<?php  if($eachrecord1['pre_current_percentage3']!='') { echo $eachrecord1['pre_current_percentage3']; } else {echo $pre_current_percentage3;}?>														</td>
														<td align="center" valign="top">
														<?php  if($eachrecord1['pre_current_result3']!='') { echo $eachrecord1['pre_current_result3']; } else {echo $pre_current_result3;}?>													  </td>
													</tr>		
													<tr>
														<td align="center" valign="top">
												<?php  if($eachrecord1['pre_physical_details']!='') { echo $eachrecord1['pre_physical_details']; } else {echo $pre_physical_details;}?>													  </td>
														<td align="center" valign="top">
                                                        
														<?php  if($eachrecord1['pre_height']!='') { echo $eachrecord1['pre_height']; } else {echo $pre_height;}?>														</td>
														<td align="center" valign="top">
														<?php  if($eachrecord1['pre_weight']!='') { echo $eachrecord1['pre_weight']; } else {echo $pre_weight;}?>													  </td>
													</tr>		
													<tr>
														<td align="center" valign="top">
												<?php  if($eachrecord1['pre_alerge']!='') { echo $eachrecord1['pre_alerge']; } else {echo $pre_alerge;}?>													  </td>
														<td align="center" valign="top">
                                                        
														<?php  if($eachrecord1['pre_physical_status']!='') { echo $eachrecord1['pre_physical_status']; } else {echo $pre_physical_status;}?>														</td>
														<td align="center" valign="top">
														<?php  if($eachrecord1['pre_special_care']!='') { echo $eachrecord1['pre_special_care']; } else {echo $pre_special_care;}?>												  </td>
													</tr>		
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
													
													<tr>
													  <td colspan="3" align="center" valign="top" height="10px"></td>
												  </tr>
										  </table></td>
             <td class="bgcolor_02"></td>
          </tr>
         
          <tr>
            <td height="25" colspan="3" class="bgcolor_02"><span class="admin"> &nbsp;&nbsp;TRANSPORT</span></td>
          </tr>
          <tr>
             <td class="bgcolor_02"></td>
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
                                                       <td><span id="internal-source-marker_0.1335878380918223">Pick-up Point</span></td>
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
                                    </select>                                    </td>
               </tr>
               <tr>
                 <td>&nbsp;</td>
                 <td height="30" align="left"> Route / Board </td>
                 <td align="left">:</td>
                 <td align="left">
           <?php /*?>      <?php
				 $allote_row['board_id'];
				 $board_row['id'];
				  $route_sql="SELECT * FROM es_trans_route R WHERE R.status!='Delete'";
                   $route_exe=mysql_query($route_sql);
                   while($route_row=mysql_fetch_array($route_exe)){
                   $board_sql="SELECT * FROM es_trans_board B WHERE B.status!='Delete' AND route_id=".$route_row['id'];
                   $board_exe=mysql_query($board_sql);
                   while($board_row=mysql_fetch_array($board_exe)){
					    $query_sql="SELECT * FROM es_trans_board_allocation_to_student WHERE status='Active' AND student_staff_id=".$sid;
					   $query_exe=mysql_query($query_sql);
					   $query_num=mysql_num_rows($query_exe);
					   
					  $ww=mysql_fetch_array($query_exe);
				
					   if($query_num<$board_row['capacity'] || $allote_row['board_id']==$board_row['id'])
					   			{
					   
					   					 $board_row['board_title']; 
										  $allote_row['board_id'];
										 echo $board_row['id'];
										 }
					   }}
                 ?><?php */?>
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
                   </select>                 </td>
               </tr>             
             </table></td>
             <td class="bgcolor_02"></td>
          </tr>
          <tr>
             <td class="bgcolor_02"></td>
            <td height="40px">&nbsp;</td>
             <td class="bgcolor_02"></td>
          </tr>  
</table>
<?php

/**
* ********End of View Student Profile*********************************
*/
 //}
  } ?>	
</form>	
