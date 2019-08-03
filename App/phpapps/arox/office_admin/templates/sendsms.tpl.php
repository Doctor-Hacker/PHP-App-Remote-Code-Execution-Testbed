<?php
/**
* Only Admin users can view the pages
*/
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


function checkavailableslots(){
			examdate = document.sendmailtostudents.sms_date.value;
	   		if(examdate==""){
				alert("Please Select Date");

			}else{

			url="?pid=55&action=checkavailablestudents&eq_createdon="+examdate
			url=url+"&sid="+Math.random();
			xmlHttp=GetXmlHttpObject(paperavailable);
			xmlHttp.open("GET", url, true);
			xmlHttp.send(null);
			}
		}

		function paperavailable()
		{
			if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
			{
				document.getElementById("slotajaxinfo").innerHTML=xmlHttp.responseText
			}
		}


</script>
<?php if($action=='smstoadmin'){?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Send SMS to Administrators</span></td>
              </tr>
               <tr>
                <td width="1px" class="bgcolor_02" ></td>
                <td height="25" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font><br /></td>
                 <td width="1px" class="bgcolor_02" ></td></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02" height="100"></td>
                <td align="center" valign="top"><br />
				    <form name="" action="" method="post">
					<table width="96%" height="52%" border="0" cellpadding="3px" cellspacing="0">
					<tr>
					<td width="18%" class="narmal"  align="left">Name / Username</td>
					<td width="2%" align="center"><strong> :</strong></td>
					<td width="80%" height="30" align="left">
					<?php echo $html_obj->draw_selectfield('admin_phoneno[]',$alladmins_arr,'','multiple="multiple" size="5"');?><font color="#FF0000">&nbsp;*</font><div class="normal">Use Ctrl + Mouse click for multi selection</div></td>
					</tr>

					<tr>
					<td width="18%" valign="top" class="narmal"  align="left"> Message </td>
					<td width="2%" valign="top"  align="center"><strong> :</strong></td>
					<td width="80%" height="30" valign="top"  align="left"><?php echo $html_obj->draw_textarea('message','','rows="5"');?><font color="#FF0000">&nbsp;*</font></td>
					</tr>
					<tr>
					<td width="18%" valign="top" ></td>
					<td width="2%" valign="top"  align="center"></td>
					<td width="80%" height="30" valign="middle" align="left"><input type="submit" name="submit_staff" value="Send" class="bgcolor_02" style="padding-left:10px;padding-right:10px;cursor:pointer;" /></td>
					</tr>

					</table>
					</form>
				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>

              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
              </tr>
</table>
<?php }

if($action=='smstostaff')
{?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Send SMS to Staff</span></td>
              </tr>
               <tr>
                <td width="1px" class="bgcolor_02" ></td>
                <td height="25" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font><br /></td>
                 <td width="1px" class="bgcolor_02" ></td></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02" height="100"></td>
                <td align="center" valign="top"><br />
				    <form name="" action="" method="post">
					<table width="96%" height="52%" border="0" cellpadding="3px" cellspacing="0">

					<tr>
					<td width="18%" class="narmal"  align="left">Name </td>
					<td width="2%" align="center"><strong> :</strong></td>
					<td width="80%" height="30" align="left">

					<?php echo $html_obj->draw_multiple_selectfield('st_prmobno[]',$staff_list,$st_prmobno,'size="5"');?><font color="#FF0000">&nbsp;*</font><div class="normal">Use Ctrl + Mouse click for multi selection</div></td>
					</tr>

					<tr>
					<td width="18%" valign="top" class="narmal"  align="left"> Message </td>
					<td width="2%" valign="top"  align="center"><strong> :</strong></td>
					<td width="80%" height="30" valign="top"  align="left"><?php echo $html_obj->draw_textarea('message','','rows="5"');?><font color="#FF0000">&nbsp;*</font></td>
					</tr>
					<tr>
					<td width="18%" valign="top" ></td>
					<td width="2%" valign="top"  align="center"></td>
					<td width="80%" valign="middle" align="left" height="30"><input type="submit" name="submit_staff" value="Send" class="bgcolor_02" style="padding-left:10px;padding-right:10px;cursor:pointer;" /></td>
					</tr>

					</table>
					</form>
				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>

              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
              </tr>
</table>
<?php }

if($action=='smstostudents'){?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Send SMS to Students</span></td>
              </tr>
               <tr>
                <td width="1px" class="bgcolor_02" ></td>
                <td height="25" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font><br /></td>
                 <td width="1px" class="bgcolor_02" ></td></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td  align="center" valign="top"><br />
				    <form name="sendmailtostudents" action="" method="post">
					<table width="96%" height="52%" border="0" cellpadding="3px" cellspacing="0">

					<tr>
					<td width="18%" class="narmal"  align="left"> Class </td>
					<td width="1%" align="center" class="narmal"><strong> :</strong></td>
					<td width="81%" height="30" align="left"><?php echo $html_obj->draw_selectfield('es_classesid',$class_list,'','onchange="JavaScript:document.sendmailtostudents.submit();"');?><font color="#FF0000">&nbsp;*</font></td>
					</tr>
					<tr>
					<td height="30" class="narmal"  align="left"> Student</td>
					<td width="1%" align="center" class="narmal"><strong> :</strong></td>
					<td  align="left">
					<?php echo $html_obj->draw_multiple_selectfield('pre_mobile1[]',$students_list,$pre_mobile1,'size="5"');?><font color="#FF0000">&nbsp;*</font><div class="normal">Use Ctrl + Mouse click for multi selection</div></td>
					</tr>
					<tr>
					<td width="18%" valign="top" class="narmal"  align="left"> Message </td>
					<td width="1%" valign="top"  align="center"><strong> :</strong></td>
					<td width="81%" height="30" valign="top"  align="left"><?php echo $html_obj->draw_textarea('message','','rows="5"');?><font color="#FF0000">&nbsp;*</font></td>
					</tr>
					<tr>
					<td width="18%" valign="top" ></td>
					<td width="1%" valign="top" align="center"></td>
					<td width="81%" height="30" valign="top" align="left">
					<input type="submit" name="submit_student" value="Send" class="bgcolor_02" style="padding-left:10px;padding-right:10px;cursor:pointer;"/></td>
					</tr>
					</table>
					</form>
				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
  </tr>
</table>
<?php }?>
<?php

if($action=='balance'){?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Check Balance</span></td>
              </tr>
               <tr>
                <td width="1px" class="bgcolor_02" ></td>
                <td height="25" align="right"><br /></td>
                 <td width="1px" class="bgcolor_02" ></td></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td  align="left" valign="top">&nbsp;<?php
				 $ch = curl_init();
 curl_setopt($ch,CURLOPT_URL,  "http://api.mVaayoo.com/mvaayooapi/MessageCompose?user=himalyanpublicschool@rediffmail.com:526845&senderID=HIMALYAN&receipientno=9418143473&msgtxt=This is Test message&state=4 ");
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, "user=himalyanpublicschool@rediffmail.com&senderID=HIMALYAN&receipientno=9418143473&msgtxt=This is Test message");
 //curl_setopt($ch, CURLOPT_POSTFIELDS, "user=$user&senderID=$senderID&receipientno=$receipientno&cid=$cid&msgtxt=$msgtxt");
  $buffer = curl_exec($ch);
  	echo $buffer;

/*if(empty ($buffer))
{ echo " buffer is empty "; }
else
{ echo $buffer; }

	$request_result =  curl_exec($ch);
					echo $request_result;*/

curl_close($ch);

$url = "http://api.mVaayoo.com/mvaayooapi/MessageCompose?user=himalyanpublicschool@rediffmail.com:526845&senderID=HIMALYAN&receipientno=9418143473&msgtxt=This is Test message&state=4 ";
					$curl = curl_init();
					curl_setopt ($curl, CURLOPT_URL, $url);
					curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1);
					$request_result = curl_exec ($curl);
					echo $request_result;
					curl_close ($curl);


				 /*   if(function_exists('curl_init')){

					$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,  "http://api.mVaayoo.com/mvaayooapi/MessageCompose?user=".MOBILE_USERNAME."&Password=".MOBILE_PASSWORD);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
$buffer = curl_exec($ch);
if(empty ($buffer))
{ echo " buffer is empty "; }
else
{ echo $buffer; }
curl_close($ch);


				/*	$url = "http://122.166.5.17/desk2web/CreditCheck.aspx?Username=".MOBILE_USERNAME."&Password=".MOBILE_PASSWORD;
					$curl = curl_init();
					curl_setopt ($curl, CURLOPT_URL, $url);
					curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1);
					$request_result = curl_exec ($curl);
					echo $request_result;
					curl_close ($curl);
					}*/
				 ?>
				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
  </tr>
</table>
<?php }?>
<?php

if($action=='enquirylist'){?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Send SMS to Enquiry List</span></td>
              </tr>
               <tr>
                <td width="1px" class="bgcolor_02" ></td>
                <td height="25" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font><br /></td>
                 <td width="1px" class="bgcolor_02" ></td></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td  align="center" valign="top"><br />
				    <form name="sendmailtostudents" action="" method="post">
					<table width="96%" height="52%" border="0" cellpadding="3px" cellspacing="0">
					<tr>
					<td width="18%" class="narmal"  align="left">Date</td>
					<td width="1%" align="center" class="narmal"><strong> :</strong></td>
					<td width="81%" height="30" align="left"><input name="sms_date"  id="sms_date"  readonly class="plain" size="15" value="<?php echo $_POST['sms_date'];?>"/>
							  <a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.sendmailtostudents.sms_date);return false;" ><img name="popcal" align="absmiddle" src="<?php echo JS_PATH ?>/DateTime/calbtn.gif" width="34" height="22" border="0" alt="" /></a>
								 <iframe width=188 height=166 name="gToday:datetime:agenda.js:gfPop:plugins_time.js" id="gToday:datetime:agenda.js:gfPop:plugins_time.js" src="<?php echo JS_PATH ?>/DateTime/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe><a href="javascript:checkavailableslots()" class="video_link">Get Enquiry List</a></td>
					</tr>
                    <?php if(isset($sms_date) && $sms_date!=""){?>
                    <script type="text/javascript" language="javascript">
					checkavailableslots();
					</script>
                    <?php }?>
					<tr>
					<td width="18%" class="narmal"  align="left">Students</td>
					<td width="1%" align="center" class="narmal"><strong> :</strong></td>
					<td width="81%" height="30" align="left" id="slotajaxinfo"><?php echo $html_obj->draw_multiple_selectfield('pre_mobile1[]',$students_arr,'',' size=5 style=" width:150px;"');?><font color="#FF0000">&nbsp;*</font><div class="normal">Use Ctrl + Mouse click for multi selection</div></td>
					</tr>
					<tr>
					<td width="18%" valign="top" class="narmal"  align="left"> Message </td>
					<td width="1%" valign="top"  align="center"><strong> :</strong></td>
					<td width="81%" height="30" valign="top"  align="left"><?php echo $html_obj->draw_textarea('message','','rows="5"');?><font color="#FF0000">&nbsp;*</font></td>
					</tr>
					<tr>
					<td width="18%" valign="top" ></td>
					<td width="1%" valign="top" align="center"></td>
					<td width="81%" height="30" valign="top" align="left">
					<input type="submit" name="submit_student" value="Send" class="bgcolor_02" style="padding-left:10px;padding-right:10px;cursor:pointer;"/></td>
					</tr>
					</table>
					</form>
				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
  </tr>
</table>
<?php }?>


<?php
if($action == "smstoall")
{
?>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">SMS to All</span></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02" height="100"></td>
                <td align="center" valign="top"><br />
				    <!--------------------------------------Main content goes here-------------------------------------->
                    <form method="post" action="">
                    <table cellspacing="20px">
                    	<tr>
                        	<td>
                            	<textarea name="a_text" placeholder="Type your message here" style="width: 250px; height:100px;"><?php if(isset($a_text))echo $a_text; ?></textarea>
                            </td>
                        </tr>
                        <tr>
                        	<td>
                            	<input type="submit" class="bgcolor_02" value="Send to all" name="sendtoall" onClick="this.value='Sending...'">
                            </td>
                        </tr>
                    </table>
                    </form>
                    <!-----------------------------------End of main content goes here---------------------------------->
				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>

              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
              </tr>
</table>
<?php
}
?>
<?php if($action=='smssetup'){?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
             <?php
$smsdetails = mysql_fetch_array(mysql_query("SELECT * FROM tbl_sms_setup"));
?>
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td rowspan="4" valign="middle" class="bgcolor_02" width="1"></td>
    <td height="25" valign="middle" class="bgcolor_02">SMS SETUP</td>
    <td rowspan="4" valign="middle" class="bgcolor_02" width="1"></td>
  </tr>
  <tr>
    <td valign="top"><?php
    if(isset($_POST['submit'])){
	$api = $_POST['api'];
	$authkey = $_POST['authkey'];
    $uid = $_POST['userid'];
	$pass = $_POST['password'];
	$sid = $_POST['senderid'];
	$route = $_POST['route'];

     		if($api ==''){
			echo "API Link Cannot be Blank";
     }else if($authkey ==''){
			echo "AuthKey cannot be Blank";
     }else if($uid ==''){
			echo "Userid Cannot be Blank";
            }else if($pass ==''){
			echo "Password cannot be Blank";
			}else if($sid ==''){
			echo "Senderid cannot be Blank";
			}else if($route ==''){
			echo "Route cannot be Blank";
			}else{
				$chkrow = mysql_num_rows(mysql_query("SELECT * FROM tbl_sms_setup"));
				if($chkrow !=0){
				mysql_query("UPDATE tbl_sms_setup SET apilink='$api', authkey='$authkey', userid='$uid',password='$pass',senderid='$sid',route='$route'");
				echo "SMS Details Updated Successfully";
				}else{
				mysql_query("INSERT INTO tbl_sms_setup (apilink,authkey,userid,password,senderid,route) VALUES ('$api','$authkey','$uid','$pass','$sid','$route')");
				echo "SMS Details Added Successfully";
				}
			}

	}
	?></td>
  </tr>
  <tr>
    <td valign="top"><form name="sms_setup" method="post" action="">
      <table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">
        <tr>
          <td valign="top">API Link : </td>
          <td valign="top"><input type="text" name="api" id="api" value="<?php echo "$smsdetails[apilink]";?>"></td>
        </tr>
        <tr>
          <td valign="top">Auth. Key : </td>
          <td valign="top"><input type="password" name="authkey" id="authkey" value="<?php echo "$smsdetails[authkey]";?>"></td>
        </tr>
        <tr>
          <td valign="top">Userid : </td>
          <td valign="top"><input type="text" name="userid" id="userid" value="<?php echo "$smsdetails[userid]";?>"></td>
        </tr>
        <tr>
          <td valign="top">Password : </td>
          <td valign="top"><input type="password" name="password" id="password" value="<?php echo "$smsdetails[password]";?>"></td>
        </tr>
        <tr>
          <td valign="top">Sender Id : </td>
          <td valign="top"><input type="text"  name="senderid" id="senderid" value="<?php echo "$smsdetails[senderid]";?>"></td>
        </tr>
        <tr>
          <td valign="top">Route : </td>
          <td valign="top"><input type="text" name="route" id="route" value="<?php echo "$smsdetails[route]";?>"></td>
        </tr>
        <tr>
          <td valign="top">&nbsp;</td>
          <td valign="top"><input type="submit" name="submit" id="submit" value="Submit"></td>
        </tr>
      </table>
    </form></td>
  </tr>
  <tr>
    <td valign="top" class="bgcolor_02" height="1"></td>
  </tr>
</table>
</td>
  </tr>
</table>
<?php }?>