<?php
/* 
 * This software is released under the BSD 2-clause (simplified) license.
 * 
 * Copyright (c) 2014, J.Valentine (LunarCMS.com, jv@thevdm.com)
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *
 * 1. Redistributions of source code must retain the above copyright notice, this
 *   list of conditions and the following disclaimer. 
 * 2. Redistributions in binary form must reproduce the above copyright notice,
 *   this list of conditions and the following disclaimer in the documentation
 *   and/or other materials provided with the distribution.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
 * ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 * DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR
 * ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
 * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
 * ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
 * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * The views and conclusions contained in the software and documentation are those
 * of the authors and should not be interpreted as representing official policies, 
 * either expressed or implied, of the FreeBSD Project.
 */

/* Set the error variable to 0 */
$error='0';
/* Check if the form has been submitted */
if (isset($_POST['Submit'])) {
	/* username and password sent from form */
	$email=$_POST['email'];
	$password=sha1($_POST['password']);
	$user=$_POST['username'];
	/* Include the database connection details */
	include('../includes/configure.php');
	/* Get the user details from the database */
	$dbUser = $bdd->query('SELECT id, access, name, email, password FROM users');
	$dbUser->execute();
	while ($data = $dbUser->fetch()) {
	    /* Only allow users with access level 0 or 1 login */
	    if($data['access'] == '0' || $data['access']== '1') {
    		/* Check each user against the login details submitted */
    		if(($email==$data['email']) && ($password==$data['password'])) {
    			/* If the login details match those of a user account, create the sessions */
    			session_start();
    			/* User session */
    			$_SESSION['user'] = $data['name'];
                /* User ID session */
                $_SESSION['uid'] = $data['id'];
    			/* Access session, determines if the user is a 'Super User' or an 'Admin' */
    			$_SESSION['access'] = $data['access'];
    			/* Secure session, unique for each install, this enables multiple installations on the same server */
    			$_SESSION['secure'] = $secure;
    			/* Direct the user to the admin index.php */
    			header('Location: index.php');
    		/* If no user account was found, create an error */
    		} else {
    			$error='1';
    		}
        }
	}
    $dbUser->CloseCursor();
}
?>
<!DOCTYPE HTML>
<head>
	<title>LunarCMS - Administration Panel</title>
	<link rel="stylesheet" type="text/css" href="includes/admin.css">
</head>
<body>
	<div id="headder">
		<div id="logo"><img src="img/logo.png" /></div>
	</div>
	<?php if($error=='1') { ?>
	<div style="text-align: center; color: red;"><span style="font-size: 22px;">There was an error with your log-in details.</span></div>
	<?php } ?>
	<div id="contentbox" style="height:250px; width:350px; position: absolute; top:50%; left:50%; margin-left:-175px; margin-top:-105px;">
		<form method="post">
			<div style="text-align: center;">
				<span style="font-size: 22px;">Log-in to your admin panel<br><br></span>
			</div>
			<label>E-mail:</label><br />
			<input type="text" id="email" name="email" class="form" style="width:336px;" autofocus /><br><br>
			<label>Password:</label><br />
			<input type="password" id="password" name="password" class="form" style="width:336px;" /><br><br>
			<button name="Submit" value="submit" type="submit" class="formbutton">Log-in</button>
		</form>
	</div>
	<div id="footer">Lunar CMS Administration Panel. Copyright &copy; Lunar CMS 2014</div>
</body>
