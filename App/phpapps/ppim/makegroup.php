<?php
$newline = "\r\n";	
if (isset($_POST["submit"]))
{
   $groupname = stripslashes($_POST["groupname"]);
   $folder = 'links/'.$groupname;
   mkdir($folder,0777);
   header('Location: links.php');
   exit();
}
if (isset($_GET["mode"]))
{
 if ($_GET["mode"]=="dellink")
 {
  	$group = stripslashes($_GET["group"]);
	$name = stripslashes($_GET["name"]);
	$filename = "links/".$group."/" . $name .".link";
	unlink($filename);
	$loc = "Location: links.php?group=$group";
	header($loc);
	exit();
	
 }
 if ($_GET["mode"]=="delgroup")
 {
  if (isset($_GET["group"]))
  {
  	$group= stripslashes($_GET["group"]);
	$group = "links/".$group;
	if (rmdir($group))
	{
	   header('Location: links.php');
   	   exit();
	}
	else
	{
	   print '<script>
			 history.back();
	   		 alert("Group must be empty to be deleted!");
			</script>;';
	}
			 
  }
 }
}
if (isset($_POST["linksubmit"]))
{
   $groupname = stripslashes($_POST["groupname"]);
   $truename = stripslashes($_POST["linkname"]);
   $name = '"'.$truename.'";';
   $url = '"'.$_POST["linkurl"].'";';
   require("specialchars.php");
   if (isset($_POST["linkdescription"]))
   {
   	  $description = specialchars($_POST['linkdescription']);
	  $description= '"'.$description.'";';
   }
   else
   {
   	  $description = '"";';
   }
   $line1 = '<?php'. $newline;
   $line2 = '$url='.$url.$newline;
   $line3 = '$name='.$name.$newline;
   $line4 = '$description='.$description.$newline;
   $line5 = '?>';
   
   $out2file = $line1.$line2.$line3.$line4.$line5;
   
   $filename="links/".$groupname ."/".$truename.".link";
   $gp = fopen($filename,'w');
   fwrite($gp, $out2file);
   fclose($gp);
   $loc = "Location: links.php?group=".$groupname;
   header($loc);
   exit();
}
   

?>
