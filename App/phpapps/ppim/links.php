<?php require("templates/header.html"); ?>
<script>
function delcheck()
{
 	if (confirm("Do you want to delete this group?"))
	{
	   return true;
	}
	else
	{
	   return false;
	}
}
function dellinkcheck()
{
 	if (confirm("Do you want to delete this link?"))
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
$folders = array();
$search_dir = 'links/';
$dp = opendir($search_dir);
while ($item = readdir($dp))
{
 if (substr($item,0,1) != '.')
 {
  //print "<a href=$item>$item</a> <br>";
  $files[] = $item;
 }

}
sort($files);
print '<div id="groups">';
print '<h2>Groups</h2>';
for ($i = 0; $i < count($files); $i++)
{
 print '<a href="links.php?group='."$files[$i]".'">'."$files[$i]".'</a><br />';
}
print '<br /><a href="newgroup.php">New Group</a>';
print '</div>';
?>
	 </div>

<!-- ***************** Right Side  ***************** -->  
	 <div id="frame_right">
<?php
error_reporting(0);
if (isset($_GET["group"]))
{
   $groupname = stripslashes($_GET["group"]);
   print '<div id="groupname"><h3>'."$groupname".'</h3><a href="makegroup.php?mode=delgroup&group='."$groupname".'" onclick="return delcheck();">Delete Group</a></div>';
   $group = $groupname . "/";
}
else
{
   $group = "";
}
$path = "links/" . $group;
$pattern = $path . "*.link";
 foreach(glob($pattern) as $link_files)
 {
  $links[] = basename($link_files);
 }
 if (!empty($links))
 {
  for ($i=0; $i<count($links); $i++)
  {
   $name = ereg_replace(".link", "",$links[$i]);
   $req = $path. "$links[$i]";
   require($req);
   if (isset($_GET["mode"]))
   {
   	  if ($_GET["mode"] == "del")
	  {
	   	 print '<a href="makegroup.php?mode=dellink&group='."$groupname".'&name='."$name".'" onclick="return dellinkcheck()">[DEL]</a> ';
	  }
   }
   print '<a href="http://'."$url".'">'."$name".'</a>';
   if ($description!="")
   {
   	  print' - '."$description";
   }
   print '<br />';
  }
}
if ($group !="")
{
   print '<br /><a href="newlink.php?group='."$groupname".'">New Link</a>';
   print '<br /><a href="links.php?mode=del&group='."$groupname".'">Del Link</a>';
}
?>				  
	 </div>  
</div>
</div>
<div id="frame_bottom">
</div>
<?php require('templates/footer.html');?>