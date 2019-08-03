<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Contacts</title>

<link rel="stylesheet" href="style.css" media="screen" title="default" /> 
<link rel="alternate stylesheet" href="slate_style.css" media="screen" title="Slate" />
<link rel="alternate stylesheet" href="templates/enhanced.css" media="screen" title="Enhanced" />
<script type="text/javascript" src="styleswitcher.js"></script>
</head>
<body>
<?php require("templates/menu.html"); ?>
<div id="frame_middle">
	 <div id="frame_top_line">
	 </div>
	 <div id="frame_left">
<!-- ***************** Left Side  ***************** -->  
	
 	 </div>

<!-- ***************** Right Side  ***************** -->  
	 <div id="frame_right">

<?php
	 if (isset($_POST["submitsetup"]))
	 {
   	  	mkdir("contacts",0777);
   		mkdir("links",0777);
   		mkdir("notes",0777);
   		mkdir("upload",0777);
   		mkdir("email",0777);
   		mkdir("events",0777);
		if (isset($_POST['usepassword'])&& isset($_POST['password']))
		{
   		   $gp = fopen("password.dat",'w');
   		   $out2file = crypt($_POST['password']);
   		   fwrite($gp, $out2file);
   		   fclose($gp);
		}
		print 'Setup Complete, please delete the setup.php file.<br/>';
		print '<br /><a href="index.php">Start pPIM</a>';
	}
	else
	{
	 	print 'Setup pPIM<br />';
		print 'IMPORTANT: Be sure you have given full permissions to the folder you uploaded pPIM into before running setup.<br /><br />';
		print '	 If you would like to password protect access to pPIM please enter a password then check the password protect box.<br /><br />';
		print '<form action=setup.php method="post">';
		print 'Password: <input type="password" name="password"><br />';
		print 'Password Proctect pPIM <input type="checkbox" name="usepassword" /><br />';
		print '<input type="submit" name="submitsetup" value="Run Setup"/>';
		print '</form>';
	}
?>
	 </div>  
</div>
</div>
<div id="frame_bottom">
</div>
<?php require('templates/footer.html');?>