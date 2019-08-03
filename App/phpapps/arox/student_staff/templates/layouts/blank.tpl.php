<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="description" content="School Management <?php 	echo $meta_description ;?>	" />
<meta name="keywords" content="School Management  <?php echo $meta_keywords; ?> " />
<title> <?php echo META_TITLE; ?> :  <?php if (isset($arr_pages[$pid]['title'])) echo $arr_pages[$pid]['title']; ?></title>
<?php $setting_css = $_SESSION['eschools']['user_theme'];
if (in_array($setting_css,$arr_css)) {
  	echo '<link href="includes/css/'.$setting_css.'" rel="stylesheet" type="text/css" />';
  } ?>
</head>
<body class="body_pop" >
<?php
/***
*	Desired page come to here
*/
	include(TEMPLATES_PATH . DS . $arr_pages[$pid]['view'] . ".php");
?>
</body>
</html>
