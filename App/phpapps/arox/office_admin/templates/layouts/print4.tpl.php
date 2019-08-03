<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="description" content="School Management <?php 	echo $meta_description ;?>	" />
<meta name="keywords" content="School Management  <?php echo $meta_keywords; ?> " />
<title> <?php echo $_SESSION['eschools']['schoolname'];//"CENTRAL PROVINCIAL SCHOOL"; ?> :  <?php if (isset($arr_pages[$pid]['title'])) echo $arr_pages[$pid]['title']; ?></title>
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
.border1{
border-bottom:#000000;
border-top:#000000;
}
.admin {
	font-family: tahoma;
	font-size: 14px;
	font-weight: bold;
	color: #333333;
	text-decoration: none;
}
.bgcolor_2{
	background-color: #CCCCCC;
	color:#333333;
	text-align:left;
	font-weight:normal;
	font-family: Tahoma;
	font-size: 12px;
	text-decoration: none;
}
</style>
<?php
 //include CSS files
$setting_css = $_SESSION['eschools']['user_theme'];
if (in_array($setting_css, $arr_css)) {
  	echo '<link href="includes/css/'.$setting_css.'" rel="stylesheet" type="text/css" />';
  }else{
  	echo '<link href="includes/css/blue.css" rel="stylesheet" type="text/css" />';
  }
 
?>
</head>
<body class="body_pop"  >
<?php
$sch_det = $db->getRow("SELECT * FROM es_finance_master WHERE es_finance_masterid=(SELECT MAX(es_finance_masterid) FROM es_finance_master)");
?>
<table width="645" border="0" align="center" class="tb2_grid">
  
     
      <tr>
        <td align="right" valign="top"><table width="100%" border="0">
          <tr>
            <td align="center" valign="top" ><span class="style1"><?php echo strtoupper($_SESSION['eschools']['schoolname']); ?><!--"CENTRAL PROVINCIAL SCHOOL"--></span></td>
          </tr>
           <tr>
            <td align="center" valign="top" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:14px;" ><strong><?php echo $db->getOne("SELECT fi_address FROM es_finance_master WHERE es_finance_masterid=(SELECT MAX(es_finance_masterid) FROM es_finance_master)"); ?><!-- Rameshwari near Banarjee Lay-Out,--></strong></td>
          </tr>
           <tr>
            <td align="center" valign="top" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:14px;"  ><strong>Phone No.: <?php echo $sch_det['fi_phoneno']; ?><!--NIT Garden, Suyog Nagar, Nagpur, MH, India--></strong></td>
          </tr>
         
        </table>        
      </tr>
      <tr>
        <td height="93" colspan="3">
          <?php
			/***
			*	Desired page come to here
			*/
				include(TEMPLATES_PATH . DS . $arr_pages[$pid]['view'] . ".php");
			?>
		  </td>
        </tr>
		
		<tr>
				<td colspan="10" align="right"><input type="button" id="printbutton" value="&nbsp;Print" onclick="return printing();" class="bgcolor_02"  /></td>
		</tr>
		
     </table></td>
  </tr>
  <script type="text/javaScript">
  function printing(){
	  document.getElementById("printbutton").style.display = "none";
	  window.print();
	  window.close();
	 }

  </script>
  				
</table>
</body>
</html>
