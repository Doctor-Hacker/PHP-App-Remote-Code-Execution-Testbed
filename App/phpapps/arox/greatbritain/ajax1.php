<?php
$txt1="";
require "conn.php";
switch($_GET["sel"])
{
	
	case "course1":
	$qyr="select distinct(fld_subject) from tbl_caste where fld_course='".$_GET['id_course']."' order by fld_course ";
	   $resyr=mysql_query($qyr);
	   $txt1="<select name=\"sub\" id=\"sub\" onchange=\"showsub('ip',this.value,document.getElementById('course').value,document.getElementById('div_sub'),'Loading Course')\">
       <option value=\"\" selected=\"selected\">Select any one</option>";
	   
	   while($retyr=mysql_fetch_array($resyr))
	   {
			$txt1.="<option value='".$retyr['fld_subject']."'>".$retyr['fld_subject']."</option>";   
	   }
	   echo $txt1;
		break;
	case "subdtl":
$query="select fld_fcid from tbl_faccourse where fld_course='".$_GET['id_course']."' and fld_subject='".$_GET['id_subject']."'";
		$res=mysql_query($query);
		$ret=mysql_fetch_array($res);
		
		echo $txt1;
		break;
	
	}


?>