<?php require("templates/header.html"); ?>
<?php
global $msg;
$msg="";
	 if (isset($_POST["submitupload"]))
	 {
   	  	$realname = $_FILES['userfile']['name'];
   	 	if (copy($_FILES['userfile']['tmp_name'], "upload/".$realname))
   	 	{
   	  	    $msg= "File:$realname uploaded successfully<br /><br />";
	 	}
  	 	else
   	 	{
   	 	 	$msg= "Problem with upload!, Trying giving the file a different name or using a smaller file.<br /><br />";
   	 	}
	 }
	 if (isset($_GET["mode"]))
	 {
	  	if ($_GET["mode"] == "delfile")
		{
		   $file = $_GET["file"];
		   $filename = "upload/".$file;
	       chmod($filename, 0777);
		   unlink($filename);
		   print '<script>';
 		   print 'location.replace("upload.php")';
 		   print '</script>';
		}
     }
?>


<script>
function delcheck()
{
 	if (confirm("Do you want to delete this file?"))
	{
	   return true;
	}
	else
	{
	   return false;
	}
}
</script>
</head>
<body>
<?php require("templates/menu.html"); ?>
<div id="frame_middle">
	 <div id="frame_top_line">
	 </div>
	 <div id="frame_left">
<!-- ***************** Left Side  ***************** -->  
<?php
$files = array();
$search_dir = 'upload/';
$dp = opendir($search_dir);
while ($item = readdir($dp))
{
 if (substr($item,0,1) != '.')
 {
   $files[] = $item;
 }

}
sort($files);

for ($i = 0; $i < count($files); $i++)
{
 if (isset($_GET["mode"]))
 {
  	if ($_GET["mode"] == "del")
	{
	   print '<a href="upload.php?mode=delfile&file='."$files[$i]".'" onclick="return delcheck();">[DEL]</a> ';
	}
 }
 print '<a href="upload/'."$files[$i]".'">'."$files[$i]".'</a><br />';
}
?>
<br /><a href="upload.php?mode=del">Delete File</a>

	 </div>

<!-- ***************** Right Side  ***************** -->  
	 <div id="frame_right">
	 <?php
	 global $msg;
	 print "$msg";
	 ?>
	  <form ENCTYPE="multipart/form-data" action="upload.php" method="post">
	  Upload File<br />
	  <INPUT TYPE="FILE" size="45" NAME="userfile" >
	  <br />
	  <input type="submit" name="submitupload" value="Upload" />
	  </form>				  
	 </div>  
</div>
</div>
<div id="frame_bottom">
</div>
<?php require('templates/footer.html');?>