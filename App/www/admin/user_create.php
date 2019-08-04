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
 
/* Load the head.php file */
require('includes/head.php');
/* Check the user has access to this page */
if ($access=='0') {
	$submitted = 'n';
	$linkText_error = '';
	$url_error = '';
	$err = '';
	$mode = 'form';
	/* Check if the form has been submitted */
	if (isset($_POST['Submit'])) {
		$submitted = 'y';
		$sub_name = $_POST['name'];
		$sub_email = $_POST['email'];
		$sub_password1 = $_POST['password1'];
		$sub_password2 = $_POST['password2'];
		$sub_access = $_POST['access'];
		/* PHP validation
		/* Make sure a name has been entered */
        if (trim($sub_name) == '') {
            $name_error = '<span class="error">This field is required.</span>';
            $err = '1';
        }
        if (trim($sub_email) == '') {
            $email_error = '<span class="error">This field is required.</span>';
            $err = '1';
        }
        if (trim($sub_password1) == '') {
            $password_error = '<span class="error">This field is required.</span>';
            $err = '1';
        }
        if (!filter_var($sub_email, FILTER_VALIDATE_EMAIL)) {
            $email_error = '<span class="error">Please enter a valid email address.</span>';
            $err = '1';
        }
		/* Load the user data from the database and check the email value agains that of the form */
		$emailUsed = $bdd->query('SELECT email FROM users');
		while ($emailData = $emailUsed->fetch())
		{
			if ($sub_email == $emailData['email']) {
				$email_error = '<span class="error">The E-mail address: \'' . $sub_email . '\' is in use with another acount.</span>';
				$err = '1';
			}
		}
        $emailUsed->CloseCursor();
		if ($sub_password1 != $sub_password2) {
			$password_error = '<span class="error">The password fields do not match.</span>';
			$err = '1';
		} else {
			$password = sha1($sub_password1);
		}
		if ($err == '') {
			/* submit the form */
			$insertUser = "INSERT INTO users (access,name,email,password) VALUES(:access,:name,:email,:password)";
			$queryUser = $bdd->prepare($insertUser);
			$queryUser->execute(array(':access'=>$sub_access,
									  ':name'=>$sub_name,
									  ':email'=>$sub_email,
									  ':password'=>$password));
            $queryUser->CloseCursor();
			$subject = $siteName . ' - Account details';
			$headers = 'From: Lunar CMS<noreply@lunarcms.com>' . "\r\n";
    		$headers .= "Content-type: text/html; charset=\"UTF-8\"; format=flowed \r\n";
    		$headers .= "Mime-Version: 1.0 \r\n"; 
    		$headers .= "Content-Transfer-Encoding: quoted-printable \r\n";
			$message = "An admin account has been created for you with " . $siteName . "<br><br>The details are as follow:<br><br>Name: " . $sub_name . "<br>User name: " . $sub_email . "<br>Password: " . $sub_password1 . "<br><br>You may log-in to the admin panel at: <a href='" . $lunarURL . $adminFolder . "'>" . $lunarURL . $adminFolder . "</a><br><br>Regards<br>" . $siteName . " admin";
			mail($sub_email, $subject, $message, $headers);
			$mode = 'created';
		}
	}
	if ($mode=='form') {
		if ($err == '1') {
			echo "<span class='error'>There are errors within the form data, please check the details entered and resubmit the form.</span><br /><br />";
		}
	?>
		<form method="post">
		<label>Name:</label><span class='error'>*</span> <?php echo $name_error; ?><br />
		<input type="text" id="name" name="name" class="form" <?php if($submitted=='y') { echo "value='" . $sub_name . "' "; } ?> /><br><br>
		<label>E-mail:</label><span class='error'>*</span> <?php echo $email_error; ?><br />
		<input type="text" id="email" name="email" class="form" <?php if($submitted=='y') { echo "value='" . $sub_email . "' "; } ?> /><br><br>
		<label>Password:</label><span class='error'>*</span> <?php echo $password_error; ?><br />
		<input type="password" id="password1" name="password1" class="form" <?php if($submitted=='y') { echo "value='" . $sub_password1 . "' "; } ?> /><br><br>
		<label>Confirm Password:</label><span class='error'>*</span><br />
		<input type="password" id="password2" name="password2" class="form" <?php if($submitted=='y') { echo "value='" . $sub_password2 . "' "; } ?> /><br><br>
        <label>Access Level:</label><br>
        <select class="form" name="access">
            <option value="2"<?php if(($submitted=='y') && ($sub_access == '2')) { echo " selected"; } ?>>Website only</option>
            <option value="1"<?php if(($submitted=='y') && ($sub_access == '1')) { echo " selected"; } ?>>Admin</option>
        </select><br>
        <br>
		<button name="Submit" value="submit" type="submit" class="formbutton">Create User</button>
		</form>
	<?php
	}
	if ($mode=='created') {
		echo "A user account has been created for '$sub_name' using the email address '$sub_email', an email has been sent to the new user containing their account details.<br />";
		echo "<br>";
		echo "Would you like to <a href='user_create.php'>create another user account</a>?";
	}
} else {
	echo "<div style='text-align: center'><span style='color: red; font-size: 22px;'>Only a 'Super user' can access this section.</span></div>";
}
require('includes/foot.php'); ?>