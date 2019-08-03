<?php
$password = file('password.dat');

function print_login()
{
   print '<form action="login.php?login=1" method="post">'."\n";
   print 'Enter Password: <input type="password" name="password" />'."\n";
   print '<input type="submit" name="login_submit" value="Login" />'."\n";
   print '</form>';
}
function checkid()
{
   global $password;
   if (isset($_POST['password']))
   {
   	  $pass = $_POST['password'];
	  if (crypt($pass,$password[0]) == $password[0])
	  {
	   	 $_SESSION['loggedin'] = 1;
	   	 print '<script>';
 		 print 'location.replace("index.php")';
 		 print '</script>';	  }
	  else
	  {
	     print 'Login Failed!<br />';
		 print_login();
	  }
  }
}


if (!isset($_SESSION['loggedin']))
{
   if (isset($_POST['login_submit']))
   {
   	  checkid();
   }
   else
   {
   	  print_login();
   }
}

?>