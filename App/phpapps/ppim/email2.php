<?php require("templates/header.html"); ?>
<script>
function delcheck()
{
 	if (confirm("Do you want to delete this mailbox?"))
	{
	   return true;
	}
	else
	{
	   return false;
	}
}
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
<style>
#msgfrom {
}
#msgdate {
	float: right;
	text-align: right;
}
#msgsubject {
	margin-left: 20px;
}
</style>
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
   		   	  print '<a href="email.php?name='."$email".'"> 
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
if (isset($_GET['mailbox']))
{
	$emailfile = $_GET['mailbox'];
   	$name = ereg_replace(".email", "",$emailfile);
	$req = "email/" . $emailfile;
	require($req);
	$mailserver = "{" . $mailserver . ":110/pop3}INBOX";
	print '<a href="newmailbox.php?mailbox='."$emailfile" . '">Edit Mailbox</a>';
	print '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
	print '<a href="makemailbox.php?mode=del&mailbox='."$emailfile".'" onclick="return delcheck();">Del Mailbox</a>';
	print '<hr />';
	
	$mbox = imap_open ($mailserver, $username, $password);
	if (!$mbox)
	{
		print "Connection Failed!<br />Check Settings.";
	}
	for ($i = 1; $i <= imap_num_msg($mbox); $i++)
	{
	
		$msgheader=imap_header($mbox,$i);
		$from = $msgheader->from;
		foreach ($from as $id => $object) 
		{
			$fromname = $object->personal;
			$fromaddress = $object->mailbox . "@" . $object->host;
		}
		if ($fromname != "")
		{
			$msgfrom[$i] = $fromname . "&#60;" . $fromaddress . "&#62;";
		}
		else
		{
			$msgfrom[$i] = $fromaddress;
		}
		//$msgfrom[$i] = $msgheader->fromaddress;
		$msgto[$i] = $msgheader->toaddress;
		$msgdate[$i] = $msgheader->Date;
		$msgsubject[$i]=$msgheader->Subject;
		$msgbody[$i]= strip_tags(imap_body($mbox,$i));
	}
	imap_close($mbox);
	
	if  (empty($_GET['msg']))
	{
		for ($i =1; $i<=sizeof($msgfrom); $i++)
		{
			print '<a id="msgdate">'."$msgdate[$i]\n" .
			'<a id="msgfrom">' ."$msgfrom[$i]".
			'<br /><a id="msgsubject" href="email2.php?msg='."$i".'&mailbox='."$emailfile".'">'		// CHANGE ME!!
			." $msgsubject[$i]";
			print '<hr />';
				
		}
		if (sizeof($msgfrom) < 1)
		{
			 if ($mbox)
			{
				print "No Messages";
			}
		}
	
	}
	else
	{
		$msgid = $_GET['msg'];
		if (isset($_GET['del']))
		{
			$mbox = imap_open ($mailserver, $username, $password);
			imap_delete($mbox, $msgid);
			imap_expunge($mbox);
			imap_close($mbox);
			print '<script>window.location="email2.php?mailbox='."$emailfile" .'";</script>';		// CHANGE ME!!
		}
		else
		{
			print '<a href="email2.php?mailbox='."$emailfile".'">Inbox</a>';		// CHANGE ME!!!
			print '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			print '<a href="email.php?name=' . "$msgfrom[$msgid]" . '">Reply</a>';
			print '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			print '<a href="email2.php?del=1&msg='."$msgid".'&mailbox='."$emailfile".'">Delete</a>';	// CHANGE ME!!
			imap_delete($mbox, $msgid);
			print '<br />';
			print "To: $msgto[$msgid]<br />";
			print "From: $msgfrom[$msgid]<br />";
			print "Subject: $msgsubject[$msgid]<br />";
			print "Date: $msgdate[$msgid]<br />";
			print "<hr />";
			print nl2br($msgbody[$msgid]) . "<br />";
			print '<br />
			<hr />
			<a href="	email2.php?mailbox='."$emailfile".'">Back to Inbox</a>';		// CHANGE ME!!!
		}
	}
}
?>
	 </div>  
</div>
</div>
<div id="frame_bottom">
</div>
<?php require('templates/footer.html');?>