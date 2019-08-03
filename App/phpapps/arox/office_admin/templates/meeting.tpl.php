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
	<tr>
         <td height="3" colspan="3"></td>
	 </tr>
	<tr>
	    <td height="25" colspan="3" class="bgcolor_02"><span class="admin">&nbsp;&nbsp; Meeting :- </span></td>
	</tr>
	
	
	<tr>
		<td width="1" class="bgcolor_02"></td>
	  <td  valign="top">
			 <table width="100%" border="0" cellspacing="0" cellpadding="0">
			<?php if($action=='view') { ?>
			 <tr>
	   
	</tr><?php } ?>
				<tr>			
				   <td align="right" valign="top">						
						 <table width="100%" border="0" cellspacing="0" cellpadding="0">
						   <!--DWLayoutTable-->
							
                            <tr>
								<td width="10" height="101" align="left">&nbsp;</td>
			    <td width="963" align="left" class="narmal"><table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <!--DWLayoutTable-->
                                  <tr>
                                    <td width="43%" height="34" align="left">Meetings Of School Committee: </td>
                                    <td width="1%" align="left">:</td>
                                    <td width="56%" align="left"><table width="17%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td width="11%"><input name="pre_dateofbirth" type="text" id="pre_dateofbirth" size="10" value="<?php if (isset($es_enquiryList[0]->eq_dob)) {	echo func_date_conversion("Y-m-d","d/m/Y",$es_enquiryList[0]->eq_dob);}else{echo $pre_dateofbirth; } ?>" readonly="readonly" /></td>
                                        <td width="89%"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.preadmission.pre_dateofbirth);return false;" ><img src="<?php echo JS_PATH ?>/WeekPicker/calbtn.gif" alt="Calender" name="popcal" width="34" height="22" border="0" align="absmiddle" id="popcal" /></a><font color="#FF0000"><b>&nbsp;</b></font></td>
                                      </tr>
                                    </table></td>
                                  </tr>
								   <tr>
                                    <td height="30" align="left">Meetings Of Academic Council: </td>
                                    <td align="left">:</td>
                                    <td align="left"><table border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td><input name="admission_date2" type="text" id="admission_date2" size="10" 
									value="<?php if (isset($es_enquiryList[0]->admission_date2)) {	echo func_date_conversion("Y-m-d","d/m/Y",$es_enquiryList[0]->admission_date2);}else{echo $admission_date2; } ?>" readonly="readonly" /></td>
                                        <td><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.preadmission.admission_date2);return false;" ><img src="<?php echo JS_PATH ?>/WeekPicker/calbtn.gif" alt="Calender" name="popcal" width="34" height="22" border="0" align="absmiddle" id="popcal" /></a></td>
                                      </tr>
                                    </table></td>
                                  </tr>
								  
								 
								  <tr>
                                    
                                    <td height="30" align="left">Meetings Of Parent-Teachers' Association: </td>
                                    <td align="left">:</td>
                                    <td align="left"><input name="admission_date" type="text" id="admission_date" size="10" 
									value="<?php if (isset($es_enquiryList[0]->admission_date)) {	echo func_date_conversion("Y-m-d","d/m/Y",$es_enquiryList[0]->admission_date);}else{echo $admission_date; } ?>" readonly="readonly" />
                                    <a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.preadmission.admission_date);return false;" ><img src="<?php echo JS_PATH ?>/WeekPicker/calbtn.gif" alt="Calender" name="popcal" width="34" height="22" border="0" align="absmiddle" id="popcal" /></a></td>
                                  </tr>
                                 
		   
                                </table></td>
							</tr>
							 
							 
                              <tr>
								<td align="left" height="99" colspan="2"></td></tr>
							 
							
						</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td align="left" valign="top">
																	</td>
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
														<td align="center"><input name="Submit" type="submit" class="bgcolor_02" value="Submit" style="cursor:pointer;"/></td>
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