<?php

if (isset($_POST['submit_password']))
{
   $pass = "";
   $confirm = "";
   if(isset($_POST['password']))
   {
   		$pass = $_POST['password'];
   }
   if(isset($_POST['confirm']))
   {
   		$confirm = $_POST['confirm'];
   }
   if ($pass != "" && $confirm != "")
   {
   	  if ($pass == $confirm)
	  {
	  	   $gp = fopen("password.dat",'w');
   		   $out2file = crypt($pass);
   		   fwrite($gp, $out2file);
   		   fclose($gp);
	  	   print '<script>
   		   alert("Password has been changed");
		   window.close();
		   </script>';
	  }
	  else
	  {
	  	   print '<script>
   		   alert("Password does not match Confirmation, change aborted");
		   window.close();
		   </script>';
	  }
	}
print '<script>
	   window.close();
	   </script>';
}

if (isset($_POST['del_password']))
{
   unlink("password.dat");
   print '<script>
   alert("Password has been removed");
   window.close();
   </script>';
}
if (isset($_POST['cancel']))
{
	   print '<script>
		   window.close();
		   </script>';
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Set Password</title>
<style>
body {
	 margin: 0px;
}
</style>
<body>
<form action="changepassword.php" method="post">
<table>
<tr>
	<td>Password</td>
	<td><input type="password" name="password" size="40" /></td>
</tr>
<tr>
	<td>Confirm</td>
	<td><input type="password" name="confirm" size="40" /></td>
</tr>
</table>
	<input type="submit" name="submit_password" value="Change Password" />
	<input type="submit" name="del_password" value="Delete Password" />
	<input type="submit" name="cancel" value="Cancel" />
</form>

</body>
</html>