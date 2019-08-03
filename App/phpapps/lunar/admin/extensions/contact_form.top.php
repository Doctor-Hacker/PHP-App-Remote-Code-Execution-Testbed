<?php
/* 
 * Lunar CMS 3.0 Beta
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
$submitted = 'n';
$mode = 'form';
$email_error = '';
$subject_error = '';
$sent_error = '';
$error_error = '';
$err = '';
if(isset($_POST['submit'])) {
	$submitted = 'y';
	$sub_email = $_POST['email'];
	$sub_subject = $_POST['subject'];
	$sub_sent = $_POST['sent'];
	$sub_error = $_POST['error'];
	if (trim($sub_subject) == '') {
		$subject_error = '<span class="error">This field is required.</span>';
		$err = '1';
	} 
	if (trim($sub_sent) == '') {
		$sent_error = '<span class="error">This field is required.</span>';
		$err = '1';
	} 
	if (trim($sub_error) == '') {
		$error_error = '<span class="error">This field is required.</span>';
		$err = '1';
	}
	if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$sub_email)) {
		$email_error = '<span class="error">Please enter a valid email address.</span>';
		$err = '1';
	}
	if (trim($sub_email) == '') {
		$email_error = '<span class="error">This field is required.</span>';
		$err = '1';
	}
	if ($err == '') {
		/* submit the form */
		$updateContact = "UPDATE contact_form SET email=?, subject=?, sent=?, error=? WHERE id='1'";
		$queryContact = $bdd->prepare($updateContact);
		$queryContact->execute(array($sub_email, $sub_subject, $sub_sent, $sub_error));			/* submit the form */
		$mode = 'created';
	}
}
if($mode == 'form') {
	$contactForm = $bdd->query('SELECT email, subject, sent, error FROM contact_form WHERE id = \'1\'');
	while ($data = $contactForm->fetch())
	{
		$email = $data['email'];
		$subject = $data['subject'];
		$sent = $data['sent'];
		$error = $data['error'];
	}
	?>
	<form method="post">
		<label>E-mail Address:</label><span class='error'>*</span> <?php echo $email_error; ?><br />
		<input type="text" id="email" name="email" class="form" value="<?php if($submitted == 'y') {echo $sub_email; } else { echo $email; } ?>" /><br><br>
		<label>Subject:</label><span class='error'>*</span> <?php echo $subject_error; ?><br />
		<input type="text" id="subject" name="subject" class="form" value="<?php if($submitted == 'y') {echo $sub_subject; } else { echo $subject; } ?>" /><br><br>
		<label>Sent Message:</label><span class='error'>*</span> <?php echo $sent_error; ?><br>
		<textarea name="sent" class="elrte"><?php if($submitted == 'y') {echo $sub_sent; } else { echo $sent; } ?></textarea><br><br>
		<label>Error Message:</label><span class='error'>*</span> <?php echo $error_error; ?><br>
		<textarea name="error" class="elrte"><?php if($submitted == 'y') {echo $sub_error; } else { echo $error; } ?></textarea><br><br>
		<button name="submit" value="submit" type="submit" class="formbutton">Update</button>
	</form>
	<br>
	<script>
		$().ready(function() {
			$('.elrte').elrte({
				toolbar  : 'complete',
				fmOpen : function(callback) {
					$('<div/>').dialogelfinder({
						url : 'includes/elfinder/php/connector.php', // connector URL (REQUIRED)
						// lang: 'ru', // elFinder language (OPTIONAL)
						commandsOptions: {
							getfile: {
								oncomplete: 'destroy' // destroy elFinder after file selection
							}
						},
						getFileCallback: callback // pass callback to editor
					});
				}
			});
		});
	</script>
<?php
} elseif($mode == 'created') {
	echo "The contact form details have been updated, it is advised that you send a test message from your website to ensure these settings are working as desired.";
	echo "<br><br><a href='?ext=contact_form&top'>Click here to go back</a>";
}
?>