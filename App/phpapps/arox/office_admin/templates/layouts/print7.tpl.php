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
	font-size: 18px;
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
<table width="645" border="0" align="center" class="tb2_grid">
  
     
      <tr>
        <td align="right" valign="top"><table width="100%" border="0">
          <tr>
            <td width="8%" rowspan="4" align="center" valign="top" ><?php if($_SESSION['eschools']['schoollogo']!=""){ echo displayimage("images/school_logo/".$_SESSION['eschools']['schoollogo'], "50"); } ?>&nbsp;</td>
            <td width="92%" align="center" valign="top" ><span class="style1"><?php
			 
				$sel_schools = "SELECT fi_address, fi_email, fi_phoneno, fi_website  FROM `es_finance_master`  ORDER BY `es_finance_masterid` DESC LIMIT 0 , 1"; 
				$school_det = getarrayassoc($sel_schools);
			   echo stripslashes($_SESSION['eschools']['schoolname']);
			 ?></span></td>
          </tr>
          <tr>
            <td align="center" valign="top" ><strong><?php echo $school_det['fi_address'];?> Ph. <?php echo $school_det['fi_phoneno'];?></strong></td>
          </tr>
          
          <tr>
            <td align="center" valign="top" ></td>
          </tr>
          <tr>
            <td align="center" valign="top" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:16px;" >Experience&nbsp;Certificate </td>
          </tr>
           <tr>
            <td height="20" colspan="2" align="center" valign="top" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:16px;" ><strong><?php echo $school_det['fi_endclass'];?></strong></td>
          </tr>
        
        </table>        
      </tr>
      <tr>
        <td  colspan="3">
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
