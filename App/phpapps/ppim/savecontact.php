<?php
require("specialchars.php");
$newline = "\r\n";		
 
if (isset($_POST["submit"]))
{
   if (isset($_POST["photo"]))
   {
   	  $photo = specialchars($_POST['photo']);
	  $photo = '"'.$photo.'";';
   }
   else
   {
     $photo = '"";';
   }

   if (isset($_POST["first_name"]))
   {
   	  $first_name = specialchars($_POST['first_name']);
	  $first_name = '"'.$first_name.'";';
   }
   else
   {
     $first_name = '"";';
   }

   if (isset($_POST["last_name"]))
   {
   	  $last_name = specialchars($_POST['last_name']);
   	  $last_name = '"'.$last_name.'";';
   }
   else
   {
     $last_name = '"";';
   }

   if (isset($_POST["nickname"]))
   {
   	  $nickname = specialchars($_POST['nickname']);
   	  $nickname = '"'.$nickname.'";';
   }
   else
   {
     $nickname = '"";';
   }

   if (isset($_POST["email"]))
   {
   	  $email = specialchars($_POST['email']);
   	  $email = '"'.$email.'";';
   }
   else
   {
     $email = '"";';
   }

   if (isset($_POST["email2"]))
   {
   	  $email2 = specialchars($_POST['email2']);
   	  $email2 = '"'.$email2.'";';
   }
   else
   {
     $email2 = '"";';
   }

   if (isset($_POST["phone_home"]))
   {
   	  $phone_home = specialchars($_POST['phone_home']);
   	  $phone_home = '"'.$phone_home.'";';
   }
   else
   {
     $phone_home = '"";';
   }

   if (isset($_POST["phone_cell"]))
   {
   	  $phone_cell = specialchars($_POST['phone_cell']);
   	  $phone_cell = '"'.$phone_cell.'";';
   }
   else
   {
     $phone_cell = '"";';
   }

   if (isset($_POST["phone_work"]))
   {
   	  $phone_work = specialchars($_POST['phone_work']);
   	  $phone_work = '"'.$phone_work.'";';
   }
   else
   {
     $phone_work = '"";';
   }

   if (isset($_POST["website"]))
   {
   	  $website = specialchars($_POST['website']);
   	  $website = '"'.$website.'";';
   }
   else
   {
     $website = '"";';
   }

   if (isset($_POST["address_st"]))
   {
   	  $address_st = specialchars($_POST['address_st']);
   	  $address_st = '"'.$address_st.'";';
   }
   else
   {
     $address_st = '"";';
   }
   if (isset($_POST["address_city_st"]))
   {
   	  $address_city_st = specialchars($_POST['address_city_st']);
   	  $address_city_st = '"'.$address_city_st.'";';
   }
   else
   {
     $address_city_st = '"";';
   }

   if (isset($_POST["notes"]))
   {
   	  $notes = specialchars($_POST['notes']);
   	  $notes = '"'.$notes.'";';
   }
   else
   {
     $notes = '"";';
   }

   /*$realname = $_FILES['userfile']['name'];
   copy($_FILES['userfile']['tmp_name'], "contacts/".$realname);
   if ($realname != "")
   {
   	$photo = '"'.$realname.'";';
   }*/
   $display_name = stripslashes($_POST['display_name']);
   $old_display_name = stripslashes($_POST["old_display_name"]);

   $line1= '<?php' . $newline;
   $line2= '$photo='.$photo . $newline;
   $line3 = '// Name' . $newline;
   $line4 = '$firstname='.$first_name . $newline;
   $line5 = '$lastname='.$last_name . $newline;
   $line6 = '$nickname='.$nickname . $newline;
   $line7 = '// Contact' . $newline;
   $line8 = '$email='.$email . $newline;
   $line9 = '$email2='.$email2 . $newline;
   $line10= '$phone_home='.$phone_home . $newline;
   $line11= '$phone_cell='.$phone_cell . $newline;
   $line12= '$phone_work='.$phone_work . $newline;
   $line13= '// Additional Info' . $newline;
   $line14= '$website='.$website . $newline;
   $line15= '$address_st='.$address_st . $newline;
   $line16= '$address_city_st='.$address_city_st . $newline;
   $line17= '$notes='.$notes . $newline;
   $line18= '?>';
   //print "$photo $first_name $last_name $nickname $email $email2 $phone_home $phone_cell $phone_work $website $address_st $address_city_st $notes $display_name $old_display_name";
/*
   print "$line1" . '<br />';
   print "$line2" . '<br />';
   print "$line3" . '<br />';
   print "$line4" . '<br />';
   print "$line5" . '<br />';
   print "$line6" . '<br />';
   print "$line7" . '<br />';
   print "$line8" . '<br />';
   print "$line9" . '<br />';
   print "$line10" . '<br />';
   print "$line11" . '<br />';
   print "$line12" . '<br />';
   print "$line13" . '<br />';
   print "$line14" . '<br />';
   print "$line15" . '<br />';
   print "$line16" . '<br />';
   print "$line17" . '<br />';
*/
   if ($old_display_name != "newcontact")
   {
   	  chmod($old_display_name, 0777);
   	  unlink($old_display_name);
   }
   $filename = "contacts/".$display_name.'.contact';
   $gp = fopen($filename,'w');
   $out2file = $line1 . $line2 . $line3 . $line4 . $line5 . $line6 . $line7 . $line8 . $line9 . $line10 . $line11 . $line12 . $line13 . $line14 . $line15 . $line16 . $line17 . $line18;
   fwrite($gp, $out2file);
   fclose($gp);
   $loc = "Location: contacts.php?name=".$display_name.'.contact';
   header($loc);
   exit();

}
else
{
 	if (empty($_GET["mode"]))
	{
	 	header('Location: contacts.php');
		exit();
	}
}

if (isset($_GET["mode"]))
{
	$name = stripslashes($_GET["name"]);
	$contact = "contacts/".$name;
  	unlink($contact);
}
header('Location: contacts.php');
exit();
  
?>