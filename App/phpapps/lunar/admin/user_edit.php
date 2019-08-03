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
 
if(isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header('Location: user_create.php');
}
require('includes/head.php');
if ($access=='0') {
	$submitted = 'n';
	$linkText_error = '';
	$url_error = '';
	$err = '';
	$mode = 'form';
	/* Check if the form has been submitted */
	if (isset($_POST['reset'])) {
		$submitted='y';
		$sub_password1=$_POST['password1'];
		$sub_password2=$_POST['password2'];
        if(trim($sub_password1) == '') {
            $password_error='<span class="error">This field is required.</span>';
            $err='1';
        }
		if($sub_password1!=$sub_password2) {
			$password_error='<span class="error">The password fields do not match</span>';
			$err='1';
		} else {
			$newPassword=sha1($sub_password1);
		}
		if ($err == '') {
			/* submit the form */
			$updateUser = "UPDATE users SET password=? WHERE id=?";
			$queryUser = $bdd->prepare($updateUser);
			$queryUser->execute(array($newPassword, $id));			/* submit the form */
			$queryUser->CloseCursor();
			$mode = 'updated';
			$subject = $siteName . ' - Account details';
			$headers = 'From: Lunar CMS<noreply@lunarcms.com>' . "\r\n";
    		$headers .= "Content-type: text/html; charset=\"UTF-8\"; format=flowed \r\n";
    		$headers .= "Mime-Version: 1.0 \r\n"; 
    		$headers .= "Content-Transfer-Encoding: quoted-printable \r\n";
			$message = "The password on your account with " . $siteName . " has been reset by the super user.<br><br>The new details are as follow:<br><br>Name: " . $sub_name . "<br>User name: " . $sub_email . "<br>Password: " . $sub_password1 . "<br><br>You may log-in to the admin panel at: <a href='" . $lunarURL . $adminFolder . "'>" . $lunarURL . $adminFolder . "</a><br><br>Regards<br>" . $siteName . " admin";
			mail($sub_email, $subject, $message, $headers);
			$mode = 'reset';
		}
	}
	if (isset($_POST['update'])) {
		$submitted = 'y';
		$sub_name = $_POST['name'];
		$sub_email = $_POST['email'];
		$sub_password = $_POST['password'];
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
        if (!filter_var($sub_email, FILTER_VALIDATE_EMAIL)) {
            $email_error = '<span class="error">Please enter a valid email address.</span>';
            $err = '1';
        }
		$getEmail = $bdd->prepare("SELECT email FROM users WHERE id = :id");
		$getEmail->bindParam(':id', $id);
		$getEmail->execute();
		while ($originalEmail = $getEmail->fetch()) {
				if ($originalEmail['email'] != $sub_email) {
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
			}
		}
        $getEmail->CloseCursor();
		if ($err == '') {
			/* submit the form */
			$updateUser = "UPDATE users SET access=?, name=?, email=?, password=? WHERE id=?";
			$queryUser = $bdd->prepare($updateUser);
			$queryUser->execute(array($sub_access, $sub_name, $sub_email, $sub_password, $id));			/* submit the form */
			$queryUser->CloseCursor();
			$mode = 'updated';
			
			$subject = $siteName . ' - Account details';
			$headers = 'From: Lunar CMS<noreply@lunarcms.com>' . "\r\n";
    		$headers .= "Content-type: text/html; charset=\"UTF-8\"; format=flowed \r\n";
    		$headers .= "Mime-Version: 1.0 \r\n"; 
    		$headers .= "Content-Transfer-Encoding: quoted-printable \r\n";
			$message = "Your account with " . $siteName . " has been modified by the super user.<br><br>The new details are as follow:<br><br>Name: " . $sub_name . "<br>User name: " . $sub_email . "<br>Password: (Unaltered)<br><br>You may log-in to the admin panel at: <a href='" . $lunarURL . $adminFolder . "'>" . $lunarURL . $adminFolder . "</a><br><br>Regards<br>" . $siteName . " admin";
			mail($sub_email, $subject, $message, $headers);
			$mode = 'updated';
		}
	}
	if ($mode=='form') {
		if ($err == '1') {
			echo "<span class='error'>There are errors within the form data, please check the details entered and resubmit the form.</span><br /><br />";
		}
		$userDetails = $bdd->prepare("SELECT * FROM users WHERE id = :id");
		$userDetails->bindParam(':id', $id);
		$userDetails->execute();
		while ($userDetails = $userDetails->fetch())
		{
		?>
			<form method="post">
				<label>Name:</label><span class='error'>*</span> <?php echo $name_error; ?><br />
				<input type="text" id="name" name="name" class="form" value="<?php if($submitted=='y') { echo $sub_name; } else { echo $userDetails['name']; } ?>" /><br><br>
				<label>E-mail:</label><span class='error'>*</span> <?php echo $email_error; ?><br />
				<input type="email" id="email" name="email" class="form" value="<?php if($submitted=='y') { echo $sub_email; } else { echo $userDetails['email']; } ?>" /><br><br>
				<input type="hidden" id="password" name="password" value="<?php echo $userDetails['password']; ?>" />
				<?php
				if ($userDetails['access'] != '0') {
				?>
				<label>Access Level:</label><br>
                <select class="form" name="access">
                    <option value="2"<?php if(($submitted=='y') && ($sub_access == '2')) { echo " selected"; } elseif($userDetails['access']=='2') { echo " selected"; } ?>>Website only</option>
                    <option value="1"<?php if(($submitted=='y') && ($sub_access == '1')) { echo " selected"; } elseif($userDetails['access']=='1') { echo " selected"; } ?>>Admin</option>
                </select><br>
                <br>
                <?php 
                } else {
                    echo '<input type="hidden" name="access" value="0" />';
                }
                ?>
                
				<button name="update" value="update" type="submit" class="formbutton">Update Details</button>
				</form><br><br>
				<form method="post">
				<input type="hidden" id="name" name="name" value="<?php echo $userDetails['name']; ?>" />
				<input type="hidden" id="email" name="email" value="<?php echo $userDetails['email']; ?>" />
				<label>Password:</label><span class='error'>*</span> <?php echo $password_error; ?><br />
				<input type="password" id="password1" name="password1" class="form" value="<?php if($submitted=='y') { echo $sub_password1; } ?>" /><br><br>
				<label>Confirm Password:</label><span class='error'>*</span><br />
				<input type="password" id="password2" name="password2" class="form" value="<?php if($submitted=='y') { echo $sub_password1; } ?>" /><br><br>
				<button name="reset" value="reset" type="submit" class="formbutton">Reset Password</button>
			</form>
			<br>
<?php
		}
        $userDetails->CloseCursor();
	}
	if ($mode=='updated') {
		echo "The user account for '$sub_name' using the email address '$sub_email' has been updated, an email has been sent to the user detailing the changes.<br />";
		echo "<br>";
		echo "Would you like to <a href='user_create.php'>create another user account</a>?";
	}
	if ($mode=='reset'){
		echo "$sub_name's password has been reset, an email has been sent to the user detailing the changes.<br />";
		echo "<br>";
		echo "Would you like to <a href='user_create.php'>create another user account</a>?";
	}
} else {
	echo "<div style='text-align: center'><span style='color: red; font-size: 22px;'>Only a 'Super user' can access this section.</span></div>";
}
require('includes/foot.php'); ?>