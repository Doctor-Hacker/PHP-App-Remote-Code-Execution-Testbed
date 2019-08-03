<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo META_TITLE; ?></title>
<link href="images/css.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="top"><table width="100%" border="0" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0">
      <tr>
        <td colspan="2" align="center" valign="top"><img src="images/1211.gif" width="980" height="192" /></td>
      </tr>
      <tr>
        <td height="25" colspan="2">&nbsp;</td>
        </tr>
		<?php if($_GET['emsg']=='error') { ?>
		 <tr>
        <td colspan="2" align="center"><strong style="color:#D90000;">* Invalid User</strong></td>
        </tr>
		<?php } ?>
		<?php if($_GET['emsg']=='logout') { ?>
		 <tr>
        <td colspan="2" align="center"><strong style="color:#D90000;">* You are Logged Out</strong></td>
        </tr>
		<?php } ?>
		
      <tr>
        <td width="63%" align="left" valign="middle" style=" padding-left:20px;" class="main_text" ><table width="572" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="center" valign="top"><img src="images/emis_07.gif" width="572" height="18" /></td>
          </tr>
          <tr>
            <td height="227" align="left" valign="top" background="images/emis_10.gif"><p  style="padding-left:40px; padding-top:15px;"><strong>Welcome to EMIS</strong></p>
              <p align="justify" style="padding-right:40px; padding-left:40px;">Educational Management Information System is a comprehensive web-based School Management Software. It is designed for better interaction between management, teachers, students and parents. This management software efficiently handles all the requirements for managing school easily and efficiently.
                EMIS ia a revolutionary approach which helps the school to manage his daily stuff within few clicks. Avoid lots of burdens, develop a process for management, produce the desired results on time and help the administrator in analyzing the growth of their school.</p></td>
          </tr>
          <tr>
            <td align="center" valign="top"><img src="images/emis_12.gif" width="572" height="21" /></td>
          </tr>
        </table>        
          <p >&nbsp;</p></td>
        <td width="37%" align="left" valign="top"><table width="316" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="363" height="376" align="center" valign="top" class="login_backgroung"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <form action="?pid=1" method="post">
              <tr>
                <td>&nbsp;</td>
                <td height="163" colspan="2">&nbsp;</td>
              </tr>
              <tr>
                <td align="center"class="text_text"  style="padding-left:22px;">User Name </td>
                <td width="4%" align="left" class="text_text">:</td>
                <td width="44%" height="25" align="left" class="text_text"><input name="username" type="text" size="12" /></td>
              </tr>
              <tr>
                <td align="center" class="text_text" style="padding-left:22px;">Password</td>
                <td align="left" class="text_text">:</td>
                <td height="25" align="left" class="text_text"><input name="password" type="password" size="12" /></td>
              </tr>
              <tr>
                <td align="center" valign="middle" class="text_text" style="padding-left:35px;">Student</td>
                <td height="20" align="left" class="text_text">:</td>
                <td height="20" align="left" class="text_text">
                  <input name="user_type" type="radio" value="student" checked/></td>
              </tr>
              <tr>
                <td align="center"  style="padding-left:35px;"><span class="text_text">Teacher</span></td>
                <td height="20" align="left" class="text_text">:</td>
                <td height="20" align="left" class="text_text">
                  <input name="user_type" type="radio" value="staff" /></td>
              </tr>
              <tr>
                <td width="52%">&nbsp;</td>
                <td height="30">&nbsp;</td>
                <td height="30"><input type="image" src="images/buttion.gif" width="69" height="33" border="0" name="login_sbmt" /></td>
              </tr>
              <tr>
                <td colspan="3" align="center" valign="top">&nbsp;</td>
              </tr>
			  </form>
            </table></td>
          </tr>
		 </table></td>
      </tr>
      <tr>
        <td height="10" colspan="2">&nbsp;</td>
        </tr>
      <tr>
        <td height="16" colspan="2" align="right" class="buttiom_back" style="padding-right:30px;">powered by www.microsolutionsnigeria.com/emis </td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>

