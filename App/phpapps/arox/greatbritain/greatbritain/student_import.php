<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>School</title>
<?
require "../includes/config.php";
//session_start();
//include "session_check.php";
//$memid=$_SESSION['memid'];

require_once('classes/tc_calendar.php');
?>
<script language="javascript" src="calendar.js"></script>
<style type="text/css">

<!--
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
	color: #D58309;
}
a:active {
	text-decoration: none;
}
.text{
vertical-align:top;
}
-->
</style>

<link rel="stylesheet" type="text/css" href="sdmenu/sdmenu.css" />
	<script type="text/javascript" src="sdmenu/sdmenu.js">
		/***********************************************
		* Slashdot Menu script- By DimX
		* Submitted to Dynamic Drive DHTML code library: http://www.dynamicdrive.com
		* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
		***********************************************/
	</script>
	<script type="text/javascript">
	// <![CDATA[
	var myMenu;
	window.onload = function() {
		myMenu = new SDMenu("my_menu");
		myMenu.init();
	};
	// ]]>
	</script>
</head>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0"  marginheight="0" marginwidth="0">

<table bgcolor="#000000" width="100%"  border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="1%" height="577">&nbsp;</td>
    <td width="775" valign="top"><table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" align="center">
      <!--DWLayoutTable-->
      <tr>
        <td height="71" colspan="4" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
          <!--DWLayoutTable-->
         <tr>
            <td><?php include "../header.php";?></td>
              <td></td>
          </tr>
          <tr>
            <td height="1"><img src="file:///D|/spacer.gif" alt="" width="1" height="1" /></td>
                <td></td>
                <td><img src="file:///D|/spacer.gif" alt="" width="3" height="1" /></td>
              </tr>
          </table></td>
        </tr>
      
      <tr>
        <td width="9" height="4"></td>
        <td width="116" rowspan="2" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
          <!--DWLayoutTable-->
          <tr>
              <td rowspan="7" valign="top"><?php include "leftmenu.php";?></td>
            </tr>
        </table>        </td>
        <td width="1073"></td>
        <td width="12"></td>
      </tr>
      <tr>
        <td height="476"></td>
        <td valign="top"><table style="border:thick 1px solid #8FA819;" width="100%" align="center">
          <form action="upload_fille.php" method="post" name="form1" id="form1" enctype="multipart/form-data">
            <!--DWLayoutTable-->
            <tr>
              <td width="10"></td>
                  <td colspan="2" align="left"><i><b>Import Student Admission File </b></i>
                  <hr /></td>
                  <td width="777">&nbsp;</td>
                </tr>
            
            <tr>
              <td width="10" height="36">&nbsp;</td>
                  <td width="104">&nbsp;</td>
                  <td width="152" valign="top">Select Excel File :</td>
                  <td width="777"><input type="file"  size="20" id="txtdocname" name="txtdocname"  class="button" value=""  /></td>
                </tr>
            <tr >
              <td width="10" height="26">&nbsp;</td>
                  <td>&nbsp;</td>
                  <td valign="top">&nbsp;&nbsp;</td>
                  <td width="777"><label>
                    <input type="submit" id="btnsubmit" name="btnsubmit" value="Submit" />
                  </label></td>
                </tr>
            <tr>
              <td height="50"></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
            </form>
        </table></td>
        <td></td>
      </tr>
      
      <tr>
        <td height="53" colspan="4" valign="bottom" bgcolor="#B6E9FA"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#00B6DE">
          <!--DWLayoutTable-->
          
          <tr>
            <td width="745" height="35" valign="middle" bgcolor="#279AEB"><div align="center" class="style17">Design &amp; Developed by Hubcity Softwares Pvt. Ltd. </div></td>
              </tr>
          
          </table></td>
        </tr>
      

    </table></td>
    <td width="1%">&nbsp;</td>
  </tr>
</table>
</body>
</html>
