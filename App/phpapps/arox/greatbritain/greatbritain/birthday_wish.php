<?
include "../includes/config.php";
$studname=$_GET['name'];
$sdob=$_GET['dob'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>School</title>
</head>

<body>
<table width="944" border="0" cellpadding="0" cellspacing="0" frame="box">
  <!--DWLayoutTable-->
  <tr>
    <td width="221" height="29">&nbsp;</td>
    <td width="197">&nbsp;</td>
    <td width="55">&nbsp;</td>
    <td width="226">&nbsp;</td>
    <td width="52" valign="top"><a href="" onClick="window.print();window.location.href='birthday_wish.php'"><img src="../images/printButton.png" border="0" alt="Print..." title="Print ..." /></a></td>
    <td width="67" valign="top"><a href="birthdate.php?mode=search"><b>Back</b></a></td>
    <td width="126">&nbsp;</td>
  </tr>
  <tr>
    <td height="186">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td height="31">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td valign="top"><?=ucwords(strtolower($studname));?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="19">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="29">&nbsp;</td>
    <td valign="top"><?php echo $sdob;?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="198">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
