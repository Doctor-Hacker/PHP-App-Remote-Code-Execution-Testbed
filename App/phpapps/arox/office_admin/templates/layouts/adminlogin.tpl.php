<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Control Panel</title>
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	}
.narmaltext {
	font-family: tahoma;
	font-size:10px;
	font-weight: normal;
	text-decoration: none;
	color: #000000;
}
.error_message{
	font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	text-decoration:normal;
	font-weight: bold;
	color:#FF3333;
}
.sub_text{
	font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	text-decoration:normal;
	font-weight: bold;
	color:#333333;
}
.style1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
}
.style3 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; }
.style4 {
	color: #FF0000;
	font-weight: bold;
}
</style>
</head>

<body>
<form action="" method="post" name="adminlogin">
<table width="970" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="550" align="left" valign="top" background="images/11.jpg"><table width="970" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="151">&nbsp;</td>
        <td width="312" height="228">&nbsp;</td>
        <td width="507">&nbsp;</td>
      </tr>
      <tr>
        <td width="151">&nbsp;</td>
        <td height="253" valign="top"><table width="100%" border="0" cellspacing="5" cellpadding="0">
          <tr>
            <td height="50" colspan="3">&nbsp;</td>
            </tr>
           <?php if($_GET['unauth']=="0") { ?>
       <tr>
        <td height="40" colspan="4" align="center" class="style3 style4">* Un-Authorised Access</td>
        </tr>
		<?php } ?>
		  <tr>
            <td width="34%" height="30"  class="sub_text">User Name</td>
            <td width="3%">:</td>
            <td width="63%" align="left"><input name="username" type="text" size="13" /><?php 
	if (isset($error_admin_name)&&$error_admin_name!=""){
		echo '<div class="error_message">' . $error_admin_name . '</div>';
		}
?></td>
          </tr>
          <tr>
            <td height="30"  class="sub_text">Password</td>
            <td>:</td>
            <td align="left"><input name="password" type="password"  size="13" /><?php 
	if (isset($error_admin_password)&&$error_admin_password!=""){
		echo '<div class="error_message">' . $error_admin_password . '</div>';
		}
?></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td height="30" align="left" valign="bottom"><input type="image" src="images/submit.jpg" name="Submit"  alt = "Submit"/></td>
          </tr>
        </table></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
<p>&nbsp;</p>
</form>
</body>
</html>
