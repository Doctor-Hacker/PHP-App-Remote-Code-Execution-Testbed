<?php
$sid=$_GET['sid'];
include "../includes/config.php";
$query="DELETE FROM es_preadmission WHERE es_preadmissionid=".$sid;
$result=mysql_query($query) or die("Record Deletion Not Possible!");
$num=mysql_affected_rows();
$msg="$num Record Deleted Succeessfully";
header('location:search_student.php?msg='.$msg.'&mode='.search);
?>

