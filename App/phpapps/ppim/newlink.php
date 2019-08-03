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
		 var f= document.newlink.linkname;
		 var g= document.newlink.linkurl;
		 var name = f.value;
		 var url = g.value;
		 if (name == null || name.lenght==0 || name == "")
		 {
		 	alert ("You must provide a Link Name or Cancel!");
			return false;
		 }
		 else
		 {
		  	 if (url == null || url.lenght==0 || url == "")
		 	 {
		 	  	alert ("You must provide a Link URL or Cancel!");
				return false;
		 	 }
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
	 <div id="contact">
	 <br />
	 <?php
	 if (isset($_GET["group"]))
	 {
   	  	$groupname = stripslashes($_GET["group"]);
		print '<h2>'."$groupname".'</h2><br />';
	 }
	 else
	 {
   	  	$groupname = "";
     }
	 print '
	 <form name="newlink" onsubmit="return checkvalues();" action="makegroup.php" method="post">
	 <h3>Link Name:<input type="text" name="linkname" size="30"  onKeypress="if(!isNS4){return CheckChars(event.keyCode);}else{return CheckChars(event.which);}"/></h3>
 	 <h3>Link URL: http://<input type="text" name="linkurl" size="30" /></h3>
 	 <h3>Link Description:<input type="text" name="linkdescription" size="30" /></h3>';
	 print '<input type="hidden" name="groupname" value="'.stripslashes($groupname).'"/>
	 <h3><input type="submit" name="linksubmit" value="Make Link" />
	 <input type="button" value="Cancel" onclick="history.back()" /></h3>
	 </form>';
	 ?>
	 </div>				  
	 </div>  
</div>
</div>
<div id="frame_bottom">
</div>
<?php require('templates/footer.html');?>