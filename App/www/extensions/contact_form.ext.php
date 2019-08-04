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

if(basename(__FILE__) == basename($_SERVER['PHP_SELF'])){
    header("Location: ../");
}
session_start();
/* Set blank variables */
$submitted = 'n';
$mode = 'form';
$email_error = '';
$security_error = '';
$subject_error = '';
$message_error = '';
$err = '';
/* If the form has been submitted */
if(isset($_POST['submit'])) {
	/* Get the contact details from the database */
	$contactForm = $bdd->query('SELECT email, subject, sent, error FROM contact_form WHERE id = \'1\'');
	while ($data = $contactForm->fetch())
	{
		/* Set the variables */
		$email = $data['email'];
		$subject = $data['subject'];
		$sent = $data['sent'];
		$error = $data['error'];
	}
    $contactForm->CloseCursor();
	/* Set submitted to y as the form has been submitted */
	$submitted = 'y';
	/* Create the variables from the post data */
	$sub_email = $_POST['email'];
	$sub_subject = $_POST['subject'];
	$sub_message = $_POST['sent'];
	$sub_security = $_POST['security'];
	/* Check the security image */
   if( $_SESSION['security_code'] != $sub_security && !empty($_SESSION['security_code'] ) ) {
		$security_error = '<span class="error">The security codes did not match.</span>';
		$err = '1';
	}
	/* If the subject field is empty create an error */
	if (trim($sub_subject) == '') {
		$subject_error = '<span class="error">This field is required.</span>';
		$err = '1';
	} 
	/* If the message field is empty create an error */
	if (trim($sub_message) == '') {
		$message_error = '<span class="error">This field is required.</span>';
		$err = '1';
	}
	/* If the email field doesn't contain a valid email address create an error */
	if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$sub_email)) {
		$email_error = '<span class="error">Please enter a valid email address.</span>';
		$err = '1';
	}
	if (trim($sub_email) == '') {
		$email_error = '<span class="error">This field is required.</span>';
		$err = '1';
	}
	/* If there are no errors */
	if ($err == '') {
		/* Set the variables for sending the email */
		$to      = $email;
		$subject = $subject . ' - ' . $sub_subject;
		$message = $sub_message;
		$headers = "From: $sub_email\r\n" .
		    "Reply-To: $sub_email\r\n" .
		    'X-Mailer: PHP/' . phpversion();
		/* Send the email using an if clause */
		if(mail($to, $subject, $message, $headers)) {
			/* If the email has been sent set the mail message to the sent message */
			$mailMessage = $sent;
		} else {
			/* If the email didn't send set the mail message to the error message */
			$mailMessage = $error;
		}
		/* As the form has been submitted set the mode to submitted */
		$mode = 'submitted';
	}
	unset($_SESSION['security_code']);
}
/* If the mode is set to form show the contact form */
if($mode == 'form') {
?>
	<div style="width:400px; margin:auto">
		<form method="post">
			<label>E-mail Address:</label><span class="error">*</span> <?php echo $email_error; ?><br />
			<input type="text" id="email" name="email" class="form" value="<?php if($submitted == 'y') { echo $sub_email; } ?>" /><br><br>
			<label>Subject:</label><span class="error">*</span> <?php echo $subject_error; ?><br />
			<input type="text" id="subject" name="subject" class="form" value="<?php if($submitted == 'y') { echo $sub_subject; } ?>" /><br><br>
			<label>Message:</label><span class="error">*</span> <?php echo $message_error; ?><br>
			<textarea class="form" name="sent" rows="10"><?php if($submitted == 'y') { echo $sub_message; } ?></textarea><br><br>
			<label>Security Code:</label><span class="error">*</span> <?php echo $security_error; ?><br />
			<img src="includes/CaptchaSecurityImages.php?width=100&height=40&characters=5" /><br /><input id="security" name="security" type="text" class="form" /><br />
			<button name="submit" value="submit" type="submit" class="formbutton">Send Message</button>
		</form>
	</div>
	<br>
<?php
/* If the mode is set to submitted */
} elseif($mode == 'submitted') {
	/* Show the mail message */
	echo $mailMessage;
}
?>