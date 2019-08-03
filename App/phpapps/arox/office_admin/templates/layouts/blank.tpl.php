<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="description" content="EIMS <?php 	echo $meta_description ;?>	" />
<meta name="keywords" content="EIMS  <?php echo $meta_keywords; ?> " />
<title> <?php echo $_SESSION['eschools']['schoolname'];//"CENTRAL PROVINCIAL SCHOOL"; ?> :  <?php if (isset($arr_pages[$pid]['title'])) echo $arr_pages[$pid]['title']; ?></title>
<?php
 //include CSS files
$setting_css = $_SESSION['eschools']['user_theme'];
if (in_array($setting_css,$arr_css)) {
  	echo '<link href="includes/css/'.$setting_css.'" rel="stylesheet" type="text/css" />';
  }else{
  	echo '<link href="includes/css/blue.css" rel="stylesheet" type="text/css" />';
  }
 
?>
</head>
<body class="body_pop" >
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="even">
  <tr>
    <td><?php
/***
*	Desired page come to here
*/
	include(TEMPLATES_PATH . DS . $arr_pages[$pid]['view'] . ".php");
?></td>
  </tr>
  <tr><td align="right" style="padding-right:20px;"><input type="button" value="Close Window" class="bgcolor_02" style="cursor:pointer" onclick="window.close()" /></td></tr>
</table>
</body>
</html>
