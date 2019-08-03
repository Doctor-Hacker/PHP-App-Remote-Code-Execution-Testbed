<?php ob_start();
include("../../includes/constants.inc.php");
//include("includes/functions.inc.php");
$connect = mysql_connect(DB_SERVER, DB_SERVER_USERNAME, DB_SERVER_PASSWORD);
mysql_select_db(DB_DATABASE, $connect);

 $letter=$_GET[id];
?>
<table cellpadding="0" cellspacing="0" align="center" bgcolor="#FFFFFF" >
<tr>
<td style="border:1px double black;"><img src=<?php echo $letter; ?> /></td></tr>
</table>


