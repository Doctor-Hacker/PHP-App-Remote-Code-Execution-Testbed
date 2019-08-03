<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="description" content="School Management <?php 	echo $meta_description ;?>	" />
<meta name="keywords" content="School Management  <?php echo $meta_keywords; ?> " />
<title> <?php echo META_TITLE; ?> :  <?php if (isset($arr_pages[$pid]['title'])) echo $arr_pages[$pid]['title']; ?></title>

<style type="text/css">
.narmal {
	font-family: tahoma;	
	padding:2px;
	font-size: 14px;
	font-weight: normal;
	text-decoration: none;
	color: #000000;
}
.admin {
	font-family: tahoma;
	font-size: 14px;
	font-weight: bold;
	color: #333333;
	text-decoration: none;
}
txt_01 {
font-family:verdaba;
font-size:14px;
font-weight:400;
}
.style1 {
	font-size: 22px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
}
.style2 {font-family: Verdana, Arial, Helvetica, sans-serif}
.style3 {
	font-size: 11px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.style4 {
	font-size: 12px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight:bold;
}
.style5 {font-family: Verdana, Arial, Helvetica, sans-serif; font-weight: bold; }
.border1{
border-bottom:#000000;
border-top:#000000;
}
</style>
</head>
<!--<body onload="window.print(); window.close();">-->
<body onload="window.print();">
<table width="645" border="1" align="center">
  <tr>
    <td width="635"><table width="100%" border="0">
      <tr>
        <td width="6%" align="left" valign="top">&nbsp;</td>
        <td width="22%" align="left" valign="top"></td>
        <td width="72%" colspan="2" align="left" valign="top"></td>
        </tr>
      
      <tr>
        <td height="93" colspan="4">
<?php
			/***
			*	Desired page come to here
			*/
				include(TEMPLATES_PATH . DS . $arr_pages[$pid]['view'] . ".php");
			?>
          
          </td>
        </tr>
     </table></td>
  </tr>
</table>
</body>
</html>
