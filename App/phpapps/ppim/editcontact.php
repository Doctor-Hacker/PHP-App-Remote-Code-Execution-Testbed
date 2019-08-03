<?php require("templates/header.html"); ?>
<script>
var isNS4 = (navigator.appName=="Netscape")?1:0;
function CheckChars(keycode)
{
	if (keycode == 38 || keycode==34|| keycode==92|| keycode==47)
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
		 var f= document.contactinfo.display_name;
		 var text = f.value;
		 if (text == null || text.lenght==0 || text == "")
		 {
		 	alert ("You must provide a Display Name!");
			return false;
		 }
}
function OpenUpload()
{
 		window.open("uploadphoto.php" , "Upload" , "width=500, height=350" );
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
/*$files = array();
$folders = array();
$search_dir = 'contacts/';
$dp = opendir($search_dir);
while ($item = readdir($dp))
{
 if (substr($item,0,1) != '.')
 {
  //print "<a href=$item>$item</a> <br>";
  if (is_dir($item))
  {
   $folders[] = $item;
  }
  else
  {
    $files[] = $item;
  }
 }

}
sort($files);
sort($folders);

for ($i = 0; $i < count($files); $i++)
{
 print '<a href="contacts.php?name='."$files[$i]".'">'."$files[$i]".'</a><br />';
}*/
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
   $contact = stripslashes($_GET["name"]);
   if ($contact != "newcontact")
   {
   	  $req = "contacts/". $contact;
   	  require($req);
      $dspname = ereg_replace(".contact", "",$contact);
   	  $firstname=ereg_replace('"', '&quot;',$firstname);
   	  $lastname=ereg_replace('"', '&quot;',$lastname);
   	  $nickname=ereg_replace('"', '&quot;',$nickname);
   	  $email=ereg_replace('"', '&quot;',$email);
   	  $email2=ereg_replace('"', '&quot;',$email2);
   	  $phone_home=ereg_replace('"', '&quot;',$phone_home);
   	  $phone_cell=ereg_replace('"', '&quot;',$phone_cell);
   	  $phone_work=ereg_replace('"', '&quot;',$phone_work);
   	  $website=ereg_replace('"', '&quot;',$website);
   	  $address_st=ereg_replace('"', '&quot;',$address_st);
   	  $address_city_st=ereg_replace('"', '&quot;',$address_city_st);
   }
   else
   {
   	  $photo = "";
   	  $firstname="";
   	  $lastname="";
   	  $nickname="";
   	  $email="";
   	  $email2="";
   	  $phone_home="";
   	  $phone_cell="";
   	  $phone_work="";
   	  $website="";
   	  $address_st="";
   	  $address_city_st="";
   	  $notes="";
	  $dspname="";
	  $req="newcontact";
   }
   print '<div id="personal_photo">';
   if ($photo != "")
   {
   	  print '<img height="128" width="128" src="contacts/'."$photo".'">';
   }
   print '</div>';
   print '<form ENCTYPE="multipart/form-data" name="contactinfo" onsubmit="return checkvalues()" action="savecontact.php" method="post">';
   print '<p><b>Display Name:</b> <input type="text" name="display_name" value="'.$dspname.'" onKeypress="if(!isNS4){return CheckChars(event.keyCode);}else{return CheckChars(event.which);}"/></p>';
   print '<p>Photo: <input type="text" name="photo" value="'.$photo.'"/></p>';
   print '<p><a href="javascript:OpenUpload();" >Change/Upload Photo</a></p>';
   //print '<p>File:<INPUT TYPE="FILE" NAME="userfile" ></p>';
   print '<br />';
   print '<p>First Name: <input type="text" name="first_name" value="'.$firstname.'"/></p>';
   print '<p>Last Name: <input type="text" name="last_name" value="'.$lastname.'"/></p>';
   print '<p>Nickname: <input type="text" name="nickname" value="'.$nickname.'"/></p>';
   print '<br />';
   print "<h2>Contact Information</h2>";
   print '<p>E-mail Address: <input type="text" size="30" name="email" value="'.$email.'"/></p>';

   print '<p>Alt E-mail Address: <input type="text" size="30" name="email2" value="'.$email2.'"/></p>';
   print '<p>Home Phone: <input type="text" size="30" name="phone_home" value="'.$phone_home.'"/></p>';
   print '<p>Cell Phone: <input type="text" size="30" name="phone_cell" value="'.$phone_cell.'"/></p>';
   print '<p>Work Phone: <input type="text" size="30" name="phone_work" value="'.$phone_work.'"/></p>';
   
   print "<br />";
   print "<h2>Additional Information</h2>";
   print '<p>Website: http://<input type="text" size="30" name="website" value="'.$website.'"/></p>';
   print '<p>Address: <input type="text" size="30" name="address_st" value="'.$address_st.'"/></p>';
   print '<p>City, State Zip: <input type="text" size="30" name="address_city_st" value="'.$address_city_st.'"/></p>';
   print "<br />";
   print '<p> Notes: <textarea cols="30" rows="4" name="notes">'.$notes.'</textarea>';
   print '<input type="hidden" name="old_display_name" value="'.$req.'"/>';
//   print '<input type="hidden" name="photo" value="'.$photo.'"/>';
   print '<input type="submit" name="submit" value="Save"/>';
   print '<input type="reset" name="reset" value="Reset"/>';
   print '<input type="button" name="cancel" value="Cancel" onclick="history.back();"/>';
   print '</form>';
   
   $name = $_GET["name"];

}

?>
	 </div>		  
	 </div>  
</div>
</div>
<div id="frame_bottom">
</div>
<?php require('templates/footer.html');?>