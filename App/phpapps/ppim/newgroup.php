<?php require("templates/header.html"); ?>
<script>
var isNS4 = (navigator.appName=="Netscape")?1:0;
function CheckChars(keycode)
{
	if (keycode == 38 || keycode==34||keycode==92||keycode==47)
	{
		alert ("You can not use that character. Characters & \" / \\ are not allowed in this field. ");
		return false;
	}
	else
	{
		return true;
	}
}
function checkvalues() 
{
		 var f= document.group.groupname;
		 var text = f.value;
		 if (text == null || text.lenght==0 || text == "")
		 {
		 	alert ("You must provide a Group Name or Cancel!");
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
	 <br />
	 <form name="group" onsubmit="return checkvalues();" action="makegroup.php" method="post">
	 <h3>Group Name:<input type="text" name="groupname" size="30" onKeypress="if(!isNS4){return CheckChars(event.keyCode);}else{return CheckChars(event.which);}" /></h3>
	 <h3><input type="submit" name="submit" value="Make Group" />
	 <input type="button" value="Cancel" onclick="history.back()" /></h3>
	 </form>
					  
	 </div>  
</div>
</div>
<div id="frame_bottom">
</div>
<?php require('templates/footer.html');?>