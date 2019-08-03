<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="description" content="School Management <?php 	echo $meta_description ;?>	" />
<meta name="keywords" content="School Management  <?php echo $meta_keywords; ?> " />
<title><?php echo $_SESSION['eschools']['schoolname'];//"CENTRAL PROVINCIAL SCHOOL"; ?> :  <?php if (isset($arr_pages[$pid]['title'])) echo $arr_pages[$pid]['title']; ?></title>

<style type="text/css">
@font-face
{
font-family: Belwec;
src: url('includes/fonts/Belwec.ttf');
}
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
	/*font-family: Verdana, Arial, Helvetica, sans-serif;*/
	font-family:Belwec;
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
<!--<body onload="window.print(); window.close();">-->
<body onload="window.print();" class="body_pop">
<table width="645" border="1" align="center" class="tbl_grid">
  <tr>
    <td width="635"><table width="100%" border="0">
      <tr>
        <td width="6%" align="left" valign="top">&nbsp;</td>
        <td width="22%" align="left" valign="top"><?php if($_SESSION['eschools']['schoollogo']!=""){ echo displayimage("images/school_logo/".$_SESSION['eschools']['schoollogo'], "140"); } ?></td>
        <td width="72%" colspan="2" align="left" valign="top"><table width="100%" border="0">
          <tr>
            <td width="11%" align="left" valign="top"></td>
            <td width="89%" align="left" valign="top"><span class="style1"><?php echo $_SESSION['eschools']['schoolname']; ?></span></td>
          </tr>
          <tr>
            <td align="left" valign="middle"><span class="style5"></td>
            <td align="center" valign="middle"><span class="style5">Sunrise Convent</span></td>
          </tr>
        </table></td>
        </tr>
      
      <tr>
        <td height="93" colspan="4">
<?php
			/***
			*	Desired page come to here
			*/
				include(TEMPLATES_PATH . DS . $arr_pages[$pid]['view'] . ".php");
			?>
          
          <table width="100%" border="0" cellspacing="0">
            <tr>
              <td width="2%" align="left" valign="top" bgcolor="#D3EDEA">
<br /></td>
              <td width="65%" align="left" valign="bottom" bgcolor="#D3EDEA" class="style3"><br />
              <?php 
				$sel_schools = "SELECT fi_address, fi_email, fi_phoneno, fi_website  FROM `es_finance_master`  ORDER BY `es_finance_masterid` DESC LIMIT 0 , 1 "; 
				$school_det = getarrayassoc($sel_schools);
			    ?>
				 <address><?php echo $school_det['fi_address'];?><br> 
				 <br>Phone</b>: <?php echo $school_det['fi_phoneno'];?><br>
				 <b>Email </b>: <?php echo $school_det['fi_email'];?><br>
				 <b>Web </b>: <?php echo $school_det['fi_website'];?><br>
				 </address>
				 </td>
              <td width="33%" align="left" valign="bottom" bgcolor="#D3EDEA" class="style3">&nbsp;</td>
            </tr>
          </table></td>
        </tr>
     </table></td>
  </tr>
</table>
</body>
</html>
