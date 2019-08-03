<?php
include ('../../includes/constants.inc.php');
include ('../includes/functions.inc.php');
$link = mysql_connect(DB_SERVER, DB_SERVER_USERNAME, DB_SERVER_PASSWORD) or die('Could not connect: ' . mysql_error());
mysql_select_db(DB_DATABASE) or die('Could not select database');

$log_insert_sql="SELECT * FROM es_userlogs WHERE record_id=".$_GET['record_id']." AND table_name='".$_GET['table_name']."'";
$log_insert_exe=mysql_query($log_insert_sql);
$log_insert_row=mysql_fetch_array($log_insert_exe);


?>
<table width="100%" cellpadding="3" cellspacing="1" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px; color:#FFFFFF" bgcolor="#666666">
<tr align="left">
   <td>Slno</td>
   <td>User Name</td>
   <td>Action</td>
   <td>Date Time</td>
</tr>
<?php $i=1;while($log_insert_row=mysql_fetch_array($log_insert_exe)){?>
<tr bgcolor="#FFFFFF" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px; color:#666666">
   <td><?php echo $i; ?></td>
   <td>
   <?php
   $user_sql="SELECT admin_username FROM es_admins WHERE es_adminsid=".$log_insert_row['user_id'];
   $user_exe=mysql_query($user_sql);
   $user_row=mysql_fetch_array($user_exe);
   echo $user_row['admin_username'];
   ?></td>
   <td><?php echo $log_insert_row['action']; ?></td>
   <td><?php echo func_date_conversion("Y-m-d H:i:s","d/m/Y H:i:s",$log_insert_row['posted_on']); ?></td>
</tr>
<?php $i++;} ?>
</table>