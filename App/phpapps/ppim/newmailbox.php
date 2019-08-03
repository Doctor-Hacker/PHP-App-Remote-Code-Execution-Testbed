<?php require("templates/header.html"); ?>
<script>
function checkvalues() 
{
		 var a = document.newemail.filename.value;
		 var b = document.newemail.mailserver.value;
		 var c = document.newemail.username.value;
		 var d = document.newemail.password.value;
		 if (a == "" || b == "" || c == "" || d == "" )
		 {
		 	alert ("You must fill in all fields!");
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
	error_reporting(0);
	print '<div id="groups">';
	print "<h2>Mail Boxes</h2>";
	$pattern = "email/" . "*.email";
 	foreach(glob($pattern) as $email_files)
 	{
  	 	$mailboxes[] = basename($email_files);
 	}
 	if (!empty($mailboxes))
 	{
  	   for ($i=0; $i<count($mailboxes); $i++)
  	   {
   	   	   $name = ereg_replace(".email", "",$mailboxes[$i]);
		   print '<a href="email2.php?mailbox='."$mailboxes[$i]".'">'."$name".'</a><br />';	// CHANGE ME!!
   		   //$req = "mailboxes/". "$contacts[$i]";
   		   //require($req);
	   }
 	}

	print "<br /><br /><h2>Contacts</h2>";

	$pattern = "contacts/" . "*.contact";
 	foreach(glob($pattern) as $contact_files)
 	{
  	 	$contacts[] = basename($contact_files);
 	}
 	if (!empty($contacts))
 	{
  	   for ($i=0; $i<count($contacts); $i++)
  	   {
   	   	   $name = ereg_replace(".contact", "",$contacts[$i]);
   		   $req = "contacts/". "$contacts[$i]";
   		   require($req);
		   if ($email !="")
		   {
   		   	  print '<a href="javascript:'."loadto('"."$email"."')".';"> 
   		 			 '."$name".'</a><br />';
		   }
  		}
 	}
	print '</div>';
	?>

	 </div>


<!-- ***************** Right Side  ***************** -->  
	 <div id="frame_right">
	 <div id="contact">
	 <br />
	<?php
	if (isset($_GET['mailbox']))
	{
		$mailbox = $_GET['mailbox'];
		$req = "email/" . $mailbox;
		require($req);
		$name = ereg_replace(".email","",$mailbox);
	}
	else
	{
		$name = "";
		$mailserver = "";
		$username ="";
		$password ="";
	}
	print '
	 <form name="newemail" onsubmit="return checkvalues();" action="makemailbox.php" method="post">
	 <h3>Mailbox Name:<input type="text" name="filename" size="30" value="'."$name".'" /></h3>
	 <h3>Mail Server:<input type="text" name="mailserver" size="30" value="'."$mailserver".'" /></h3>
	 <h3>Username:<input type="text" name="username" size="30" value="'."$username".'" /></h3>
	 <h3>Password:<input type="password" name="password" size="30" value="'."$password".'" /></h3>
	<input type="hidden" name="oldfile" value="'."$mailbox".'">
	 <h3><input type="submit" name="submit" value="Save Settings" />
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