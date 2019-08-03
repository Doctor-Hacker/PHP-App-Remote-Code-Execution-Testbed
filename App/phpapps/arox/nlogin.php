<?php
 ini_set( 'error_reporting', E_ALL ^ E_NOTICE );
 ini_set( 'display_errors', '0' );
include_once("common.php");
registerglobal('college_id','username','password','usertype','Login_x','Login_y','emsg','location_id');
$html_obj = new html_form();



$colleges_arr1[0] = " -- Select -- ";

if(isset($Login_x) || isset($Login_y) ){

	if($username==""){$error['username']="Enter User Name";}
	if($password==""){$error['password']="Enter Password";}
	
	if(count($error)==0){
		
		
		if($usertype=='student'){	
		
		
		    $sel_user = "SELECT * FROM es_preadmission WHERE pre_student_username='".$username."' AND pre_student_password='".$password."' AND status!='inactive'";
			
			
			$std_records = sqlnumber($sel_user);
			if($std_records>0){
				$student_info = getarrayassoc($sel_user);				
				
				if (is_array( $student_info) && count( $student_info) > 0){
					    $_SESSION['eschools']['user_school']  = $college_id;
						$_SESSION['eschools']['user_name']  = $student_info['pre_student_username']; 
						 $_SESSION['eschools']['user_id']    = $student_info['es_preadmissionid'];
						$_SESSION['eschools']['login_type'] = $usertype;
						$_SESSION['eschools']['user_theme'] = $student_info['es_user_theme'];
						$finance_info = getarrayassoc("SELECT * FROM es_finance_master ORDER BY es_finance_masterid DESC LIMIT 0,1");
						$_SESSION['eschools']['currency']   = $finance_info['fi_symbol'];
						$_SESSION['eschools']['schoollogo'] = $finance_info['fi_school_logo'];
						$_SESSION['eschools']['schoolname'] = $finance_info['fi_schoolname'];
						
						$_SESSION['eschools']['from_acad']      = $finance_info['fi_ac_startdate'];
			            $_SESSION['eschools']['to_acad']        = $finance_info['fi_ac_enddate'];
			            $_SESSION['eschools']['from_finance']   = $finance_info['fi_startdate'];
			            $_SESSION['eschools']['to_finance']     = $finance_info['fi_enddate'];
						header("location:student_staff/index.php?pid=59&action=leftmenu");
				}
			}else{
			    $username="";
				$password="";
				header("location:?emsg=15");
				exit;
			}
		}
		if($usertype=='staff'){
			$sel_user = "SELECT * FROM es_staff WHERE st_username='".$username."' AND st_password='".$password."' AND status='added' AND selstatus='accepted' AND tcstatus='notissued'";
			$staff_records = sqlnumber($sel_user);
			if($staff_records>0){
				$staff_info = getarrayassoc($sel_user);
				
				if (is_array( $staff_info) && count( $staff_info) > 0){
					$_SESSION['eschools']['user_school']    = $college_id;
					$_SESSION['eschools']['user_name']      = $staff_info['st_username'];
					$_SESSION['eschools']['user_id']        = $staff_info['es_staffid'];
					$_SESSION['eschools']['st_postaplied']  = $staff_info['st_post'];
					$_SESSION['eschools']['login_type']     = $usertype;
					$_SESSION['eschools']['user_theme']     = $staff_info['st_theme'];
					
					$finance_info = getarrayassoc("SELECT * FROM es_finance_master ORDER BY es_finance_masterid DESC LIMIT 0,1");
					
					$_SESSION['eschools']['currency']   = $finance_info['fi_symbol'];
					$_SESSION['eschools']['schoollogo'] = $finance_info['fi_school_logo'];
					$_SESSION['eschools']['schoolname'] = $finance_info['fi_schoolname'];
					$_SESSION['eschools']['from_acad']      = $finance_info['fi_ac_startdate'];
			        $_SESSION['eschools']['to_acad']        = $finance_info['fi_ac_enddate'];
			        $_SESSION['eschools']['from_finance']   = $finance_info['fi_startdate'];
			        $_SESSION['eschools']['to_finance']     = $finance_info['fi_enddate'];
					header("location:student_staff/index.php?pid=59&action=leftmenu");
				   }
					
			}else{
			    $username="";
				$password="";
				header("location:?emsg=15");
				exit;
			}
		}
		if($usertype=='admin'){
			$sel_admin = "SELECT * FROM es_admins WHERE admin_username='".$username."' AND admin_password='".$password."'";
			$admin_records = sqlnumber($sel_admin);
			if($admin_records>0){
				$admin_info = getarrayassoc($sel_admin);
				
				if (is_array( $admin_info) && count( $admin_info) > 0){
					
					$_SESSION['eschools']['user_school']= $college_id;
					$_SESSION['eschools']['admin_user'] = $admin_info['admin_username'];			
					$_SESSION['eschools']['admin_id']   = $admin_info['es_adminsid'];
					$_SESSION['eschools']['user_type']  = $usertype;
					if($admin_info['user_type']=='super')
					{
					$_SESSION['eschools']['superadmin_email'] = $admin_info['admin_email'];
					}
					$_SESSION['eschools']['user_theme'] = $admin_info['user_theme'];
					
					$compdetails=getarrayassoc("SELECT *FROM `es_finance_master`  ORDER BY `es_finance_masterid` DESC LIMIT 0 , 1");
					$_SESSION['eschools']['currency']       = $compdetails['fi_symbol'];
					$_SESSION['eschools']['schoollogo']     = $compdetails['fi_school_logo'];
					$_SESSION['eschools']['schoolname'] 	= stripslashes($compdetails['fi_schoolname']);
					$_SESSION['eschools']['from_acad']      = $compdetails['fi_ac_startdate'];
					$_SESSION['eschools']['to_acad']        = $compdetails['fi_ac_enddate'];
					$_SESSION['eschools']['from_finance']   = $compdetails['fi_startdate'];
					$_SESSION['eschools']['to_finance']     = $compdetails['fi_enddate'];
					$_SESSION['eschools']['es_finance_masterid']  = $compdetails['es_finance_masterid'];
					
					
					/*array_print($_SESSION);
					exit;*/
					
					header("location:office_admin/?pid=134");
				   }
					
			}else{
			    $username="";
				$password="";				header("location:?emsg=15");
				exit;
			}
		}
	}
}

include("includes/seoheader.php");		
?>
<body class="login">
<script type="text/javascript">
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

function getallcolleges(countryid,getselected)
		{   
			
			url="admin/getajaxdata_front.php?cid="+countryid+"&selval="+getselected;
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
</script>
<table width="1002" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="top"><table width="1002" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="6" align="left" valign="bottom"><img src="images/m1.gif" alt="" width="6" height="10" /></td>
        <td width="990" class="ww2">&nbsp;</td>
        <td width="6" align="right" valign="bottom"><img src="images/m3.gif" alt="" width="6" height="10" /></td>
      </tr>
      <tr>
        <td height="489" class="cc4">&nbsp;</td>
        <td align="left" valign="top" class="bb_mid"><table width="100%" height="482" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td height="118" align="left" valign="top"><table width="100%" height="118" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="62%" height="118" align="center" valign="top" style="padding-left:25px;"><table width="100%" height="92" border="0" align="left" cellpadding="0" cellspacing="0"></td>
                      <tr>
                      <td width="77%" height="92"colspan="1" align="left"><?php if($college_header_info['fi_school_logo']!=""){ echo thumbimage("office_admin/images/school_logo/".$college_header_info['fi_school_logo'],'100'); } ?> </td>
					  
                        <td width="10%" height="92" align="left" colspan="1" align="left"></td>
						
						</tr>
						<tr>
					
                        <td width="77%" height="92" align="left" class="school_header_font"><?php if($college_header_info['fi_schoolname']!=""){ echo $college_header_info['fi_schoolname']; } ?></td>
							<td width="77%" height="92" align="right" class="school_header_font">
							
                      </tr>
                  </table></td>
                  <td width="38%" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td height="67">&nbsp;</td>
                      </tr>
                      <tr>
                        <td height="43" align="right" valign="bottom"><?php include_once("includes/topmenu.php");?></td>
                      </tr>
                  </table></td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td height="328" align="left" valign="top" style="padding-top:20px;">
            
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td height="35" class="heading"><span class="heading3">Login</span><span class="heading4"></span></td>
                </tr>
                <tr>
                  <td height="6" align="left" valign="top"><img src="images/line2.gif" alt="" width="596" height="1" /></td>
                </tr>
                <tr>
                  <td height="308" align="center" valign="top" style="background:#FFFFFF"><table width="850" height="336" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="598" height="336" align="left" valign="top" class="loginbg"><table width="100%" height="294" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="6%" height="33">&nbsp;</td>
                          <td width="94%" align="left" valign="middle" height="33"><table width="500" border="0">
  <tr>
    <td width="350" align="center" valign="top" class="success_message"><?php if(isset($emsg) && $emsg!=""){echo $sucessmessage[$emsg];}?></td>
  </tr>
  
   <tr>
    <td width="320" align="center" valign="top" class="success_message"></td>
  </tr>
</table>

						  
						  </td>
                        </tr>
                        <tr>
                          <td height="220">&nbsp;</td>
                          <td align="left" valign="top">
                           <form action="" method="post">
                          <table width="400" height="234" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                              <td height="21" align="left" valign="middle" class="t1">&nbsp;</td>
                              <td height="21" align="left" valign="middle" class="t1">&nbsp;</td>
                              <td class="dot">&nbsp;</td>
                              <td align="left" valign="middle">&nbsp;</td>
                            </tr>
                            <tr>
                              <td width="52" height="21" align="left" valign="middle" class="t1">&nbsp;</td>
                              <td width="105" height="21" align="left" valign="middle" class="t1">User Name</td>
							  </tr>
							  <tr>
                              <td width="4" class="dot"></td>
                              <td width="229" align="left" valign="middle"><label>
                               <?php echo $html_obj->draw_inputfield('username',$username,'','class="txtbx"');?>
                              </label></td>
                            </tr>
                            <tr>
							 
                              <td  height="10"align="left" valign="middle" class="t1">&nbsp;</td>
							  
							 <td align="right" valign="middle" class="t3"><?php echo $error['username'];?></td>
                              <td  height="10" align="left" valign="middle" class="t1">&nbsp;</td>
                              <!--<td class="dot">&nbsp;</td>-->
							  
							  
                             
                            </tr>
                            <tr>
                              <td height="26" align="left" valign="middle" class="t1">&nbsp;</td>
                              <td height="26" align="left" valign="middle" class="t1">Password</td>
							  </tr>
							  <tr>
                              <td class="dot"></td>
                              <td align="left" valign="middle"><?php echo $html_obj->draw_inputfield('password','','password','class="txtbx"');?></td>
							  
                            </tr>
                            <tr>
							
                              <td  height="10"  align="left" valign="middle" class="t1">&nbsp;</td>
							  <td align="right" valign="middle" class="t3"><?php echo $error['password'];?></td>
							  <td  height="10" colspan="2" align="right" valign="middle" class="t1">&nbsp;</td>
                             <!-- <td class="dot">&nbsp;</td>-->
                              
                            </tr>
                            <tr>
                              <td colspan="10" align="center" height="20" class="dot"><table width="232"  border="0" cellpadding="0" cellspacing="4">
                                  <tr>
                                  <td width="45" class="t1" align="right">Admin</td>
                                    <td width="20" align="center"><input type="radio" name="usertype" value="admin" checked="checked"></td>
                                    <td width="47" class="t1" align="right">Student</td>
                                    <td width="20" align="center"><input type="radio" name="usertype" value="student" <?php if($usertype=='student'){echo"checked='checked'";}?>></td>
                                    <td width="40" class="t1" align="right">Staff</td>
                                    <td width="20" align="center"><input type="radio" name="usertype" value="staff" <?php if($usertype=='staff'){echo"checked='checked'";}?>></td>
                                    
                                  </tr>
                              </table></td>
                           <!-- </tr>
                            
                            <tr>
                              <td height="15" colspan="3" class="t1">&nbsp;</td>-->
                              <td class="dot"><input type="image" src="images/login2.gif" name="Login" alt="Login" title="Login" width="55" height="25" /></td>
                            </tr>
                            
                            <tr>
                              <td height="24" colspan="4" align="left" valign="top">&nbsp;</td>
                            </tr>
                          </table>
                          </form>
                          </td>
                        </tr>
                      </table></td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td align="center" valign="top"><?php include_once("includes/footer.php");?></td>
                </tr>
            </table>
            
          
            
            
          
            
            </td>
          </tr>
        </table>
          <!-- //////////////////////////////////////////////////////Here Start on to header inside////////////////////////////--></td>
        <td class="cc6">&nbsp;</td>
      </tr>
      <tr>
        <td align="left" valign="top"><img src="images/m7.gif" alt="" width="6" height="13" /></td>
        <td class="ww8">&nbsp;</td>
        <td align="right" valign="top"><img src="images/m9.gif" alt="" width="6" height="13" /></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
