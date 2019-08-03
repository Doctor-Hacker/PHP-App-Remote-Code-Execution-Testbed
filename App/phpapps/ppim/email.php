<?php require("templates/header.html"); ?>
<script>
function loadto(to)
{
  		 document.email.to.value= to;
}
function checkvalues()
{
	 var to= document.email.to.value;
	 var from= document.email.from.value;
	 var subj= document.email.subject.value;
	 var msg = document.email.message.value;
	 if (to == "" || from == "" || subj == "" || msg == "")
	 {
	  		alert ("Please fill in all fields");
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
	print '<br /><a href="newmailbox.php">New Mailbox</a><br />';

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
<?php
 if (isset($_GET["name"]))
	 {
	  $to = $_GET["name"];
	 }
	 else
	 {
	  $to="";
	 }
	 print'<form name="email" onsubmit="return checkvalues();" action="sendmail.php" method="post">';
	 print '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To:&nbsp;<input type="text" name="to" size="24" value="'.$to.'"/>';
	 print '&nbsp;&nbsp;From: <input type="text" size="24" name="from"/><br /><br />
	 Subject: <input type="text" size="60" name="subject"/><br /><br />
	 Message<br />
	 <textarea name="message" rows="15" cols="60"></textarea>
	 <input type="submit" name="submitemail" value="Send">
	 </form>';
?>
	 </div>  
</div>
</div>
<div id="frame_bottom">
</div>
<?php require('templates/footer.html');?>