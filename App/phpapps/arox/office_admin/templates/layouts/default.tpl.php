<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $_SESSION['eschools']['schoolname'];//"CENTRAL PROVINCIAL SCHOOL"; ?></title>
<link href="includes/css/default_style.css" rel="stylesheet" type="text/css" />
<?php
 //include CSS files
$setting_css = $_SESSION['eschools']['user_theme'];
if (in_array($setting_css,$arr_css)) {
  	echo '<link href="includes/css/'.$setting_css.'" rel="stylesheet" type="text/css" />';
  }else{
  	echo '<link href="includes/css/pink.css" rel="stylesheet" type="text/css" />';
  }
 
?>
</head>

<body class="body_pop">
<table width="974" border="1" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td width="974" height="768" valign="top" class="bg1banner">&nbsp;</td>
  </tr>
</table>
</body>
</html>
