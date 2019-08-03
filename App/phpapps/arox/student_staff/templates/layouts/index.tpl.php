<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="description" content="EIMS <?php 	echo $meta_description ;?>	" />
<meta name="keywords" content="EIMS  <?php echo $meta_keywords; ?> " />
<title> <?php echo META_TITLE; ?> : <?php if (isset($arr_pages[$pid]['title'])) echo $arr_pages[$pid]['title']; ?></title>
<?php
 //include CSS files
$setting_css = $_SESSION['eschools']['user_theme'];
if (in_array($setting_css,$arr_css)) {
  	echo '<link href="includes/css/'.$setting_css.'" rel="stylesheet" type="text/css" />';	
  }else{
  	echo '<link href="includes/css/blue.css" rel="stylesheet" type="text/css" />';
  }
  //include JS files
  foreach ($arr_scripts as $eachscript) {
  	echo '<script type="text/JavaScript" src="includes/js/' . $eachscript . '"></script>' . "\n";
  }
  include (INCLUDES_PATH . DS . 'htmleditor.php');
?>

<script type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script type="text/javascript" src="./highslide/highslide-with-gallery.js"></script>

<link rel="stylesheet" type="text/css" href="./highslide/highslide.css" />
</head>
<body class="body_class"><script type="text/javascript" src="includes/js/wz_tooltip.js"></script>		
<table width="1030" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="8" class="rec1">&nbsp;</td>
    <td width="1013" align="center" valign="top" class="rec2"><?php
/***
*  Including of header Images
*/
	include(TEMPLATES_PATH . DS . 'header_theme.tpl.php');

?></td>
    <td width="9" class="rec3">&nbsp;</td>
  </tr>
  <tr>
    <td height="104" class="rec4">&nbsp;</td>
    <td align="left" valign="top" class="rec5"><?php
/***
*  Including of header Images
*/
	include(TEMPLATES_PATH . DS . 'header.tpl.php');

?></td>
    <td class="rec6">&nbsp;</td>
  </tr>
  <tr>
    <td height="460" class="rec7">&nbsp;</td>
    <td align="center" valign="top" class="workbg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center" valign="top"><?php
/***
*  Including of header Images
*/
	include(TEMPLATES_PATH . DS . 'header_menu.tpl.php');

?></td>
      </tr>
      <tr>
        <td align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="20%" align="left" valign="top">
            	<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
                	<tr>
                      <td width="2%" class="bb1" height="13"></td>
                      <td width="96%" class="bb2" height="13"></td>
                      <td width="2%" class="bb3" height="13"></td>
                    </tr>
  					<tr>
                      <td class="bb4">&nbsp;</td>
                      <td align="left" valign="top" class="bb5">
					  
								<?php include(TEMPLATES_PATH . DS . 'leftmenu.tpl.php'); ?>
                        	
                        </td>
                      <td class="bb6">&nbsp;</td>
                    </tr>
                  <tr>
                      <td height="15" class="bb7" >&nbsp;</td>
                      <td class="bb8">&nbsp;</td>
                      <td class="bb9">&nbsp;</td>
                    </tr>
</table>


</td>
            <td width="63%" align="left" valign="top" class="work_midleareapadding"><table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <?php if(isset($emsg) && $emsg>0) { ?>
			  <tr><td height="3"></td></tr>
			  <tr>
				<td align="center" height="25" class="success_message">* <?php echo $sucessmessage[$emsg];?></td>
			  </tr>
			  <?php } 
			  if(count($errormessage)>0)
				{
					echo "<tr><td><br /></td></tr>";
					foreach($errormessage as $eacherrormessage)

					{ ?>
					<tr>
					<td align="left" height="20" class="error_messages">&nbsp;* <?php echo $eacherrormessage;?></td>
					</tr>
					<tr>
					<td align="center" height="2"></td>
					</tr>						
					<?php }
				}
			  ?>
			  <tr>
				<td><?php
			/***
			*	Desired page come to here
			*/
				include(TEMPLATES_PATH . DS . $arr_pages[$pid]['view'] . ".php");
			?></td>
            </tr>
            </table></td>
            <td width="17%" align="left" valign="top"><?php
/***
*Including of Left menu
*/
	include(TEMPLATES_PATH . DS . 'rightmenu.tpl.php');

?></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
    <td class="rec6">&nbsp;</td>
  </tr>
  <tr>
    <td class="rec8">&nbsp;</td>
    <td class="rec9"><?php

	include(TEMPLATES_PATH . DS . 'footer.tpl.php');
?></td>
    <td class="rec10">&nbsp;</td>
  </tr>
</table>
</body>
</html>