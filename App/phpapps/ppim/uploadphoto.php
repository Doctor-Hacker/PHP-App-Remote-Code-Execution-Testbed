<?php
function print_page()
{
print '
	  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	  "http://www.w3.org/TR/xhtml1-transitional.dtd">
	  <html xmlns="http://www.w3.org/1999/xhtml">
	  <head>
	  <title>Upload Photo</title>
	  <style>
	  body {
	  	 margin-left: 75px;
	  	 background-color: rgb(215,222,242);
		 color: rgb(81,110,202);
	  }
	  img {
		 border: 1px rgb(81,110,202) solid;
	  }
	  #warning {
	  	color: rgb(255,0,0);
	  }
	  p {
  	  	margin: 0;
	  }
	  </style>
	  <form ENCTYPE="multipart/form-data" action="uploadphoto.php" method="post">
	  <img src="images/default1.jpg" height="50" width="50">
	  <input type="submit" name="default1" value="Use Default Male"/>
	  <br />
	  <br />
	  <img src="images/default2.jpg" height="50" width="50">
	  <input type="submit" name="default2" value="Use Default Female"/>
	  <br />
	  <br />
	  <p>Upload Your Own Picture</p>
	  <div id="warning">If picture is not square distortion will occur!</div>
	  <INPUT TYPE="FILE" size="35" NAME="userfile" >
	  <br />
	  <input type="submit" name="upload" value="Upload Photo" />
	  <input type="button" name="cancel" value="Cancel" onclick="window.close();"/>
	  </form>';
}

if (empty($_POST["default1"]) && empty($_POST["default2"]) && empty($_POST["upload"]))
{
   	print_page();
}
if (isset($_POST["default1"]))
{
   print '<script>
   		 window.opener.document.contactinfo.photo.value="../images/default1.jpg";
		 alert("Photo changed to default male. You must save the contact information for the changes to take place");
		 window.close();
		 </script>';
}
if (isset($_POST["default2"]))
{
   print '<script>
   		 window.opener.document.contactinfo.photo.value="../images/default2.jpg";
 		 alert("Photo changed to default female. You must save the contact information for the changes to take place");
		 window.close();
		 </script>';
}
if (isset($_POST["upload"]))
{
   $realname = $_FILES['userfile']['name'];
   if (copy($_FILES['userfile']['tmp_name'], "contacts/".$realname))
   {
   	  print '<script>';
	  print 'window.opener.document.contactinfo.photo.value="'.$realname.'";
		 	alert("Photo uploaded successfully. You must save the contact information for the changes to take place");
			window.close();
		 	</script>';
   }
   else
   {
   print '<script>
   		 alert("Problem with upload!, Trying giving the file a different name or using a smaller file.");';
   print_page();
   }
}


?>
