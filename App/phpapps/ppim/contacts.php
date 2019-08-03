<?php require("templates/header.html"); ?>
<script>
function delcheck()
{
 	if (confirm("Do you want to delete this contact?"))
	{
	   return true;
	}
	else
	{
	   return false;
	}
}
</script>

<?php require("templates/menu.html"); ?>
<div id="frame_middle">
	 <div id="frame_top_line">
	 </div>
	 <div id="frame_left">
<!-- ***************** Left Side  ***************** -->  
<?php
error_reporting(0);
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
   print '<div id="side_photo"><a href="contacts.php?name='. 
   		 "$contacts[$i]" . 
		 '">
   		 <div id="personal_photo_side">';
		 if ($photo != "")
		 {
		  	print '<img height="40" width="40" src="contacts/'."$photo".'">';
		 }
		 print '</div><br />
   		 '."$name".'</a></div>';
  }
 }
?>
 <a href="editcontact.php?name=newcontact"><img id="addcontact" border="0" src="images/plus.gif"> New Contact</a>
	 </div>

<!-- ***************** Right Side  ***************** -->  
	 <div id="frame_right">
	 <div id="contact">
<?php
if (isset($_GET["name"]))
{
   $req = "contacts/". stripslashes($_GET["name"]);
   require($req);
   print '<div id="personal_photo">';
   if ($photo != "")
   {
   	  print '<img height="128" width="128" src="contacts/'."$photo".'">';
   }
   print '</div>';
   print "<h1>$firstname $lastname</h1>";
   if ($nickname != "")
   {
   	print "<h3><b>$nickname</b></h3>";
   }
   if ($email != "" || $email2 != "" || $phone_home != "" || $phone_cell != "" || $phone_work != "")
   {
   	  print "<h2>Contact Information</h2>";
   }
   if ($email != "")
   {
   	print "<h3>E-mail Address: ";
	print '<a href="email.php?name='."$email".'">'."$email".'</a></h3>';
   }
   if ($email2 != "")
   {
   	print "<h3>Alt E-mail Address: ";
	print '<a href="email.php?name='."$email2".'">'."$email2".'</a></h3>';
   }
   if ($phone_home != "")
   {
   	print "<h3>Home Phone: $phone_home</h3>";
   }
   if ($phone_cell != "")
   {
   	print "<h3>Cell Phone: $phone_cell</h3>";
   }
   if ($phone_work != "")
   {
   	print "<h3>Work Phone: $phone_work</h3>";
   }

   print "<br />";
   if ($website != "" || $address_st != "" || $address_city_st != "" || $notes !="")
   {
   	  print "<h2>Additional Information</h2>";
   }
   if ($website != "")
   {
   	  print '<h3>Website: <a href="http://'.$website.'">'."$website".'</a></h3>';
   }

   if ($address_st != "")
   {
   	  print "<h3>Address: $address_st</h3>";
   }
   if ($address_city_st != "")
   {
   	  print "<h3>$address_city_st</h3>";
   }
   print "<br />";
   if ($notes !="")
   {
      print "<h3> Notes: $notes</h3>";
   }
   print "<br />";
   $name = stripslashes($_GET["name"]);
   print '<p>';
   print '<a href="editcontact.php?name='."$name".'">Edit Contact</a>&nbsp;&nbsp;&nbsp;';
   print '<a href="savecontact.php?mode=del&name='."$name".'" onclick="return delcheck()">Delete Contact</a>';
   print '</p>';
}

?>
	 </div>	  
	 </div>  
</div>
</div>
<div id="frame_bottom">
</div>
<?php require('templates/footer.html');?>