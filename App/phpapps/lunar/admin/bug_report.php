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

/* Load the head */
require('includes/head.php');
/* Form not submitted */
$submitted = 'n';
/* Check if the form has been submitted */
if (isset($_POST['submit'])) {
	/* Set the variables from the post data */
	$submitted = 'y';
	$sub_name = $_POST['name'];
	$sub_email = $_POST['email'];
	$sub_siteName = $_POST['siteName'];
	$sub_url = $_POST['url'];
	$sub_phpVersion = $_POST['phpVersion'];
	$sub_mysqlVersion = $_POST['mysqlVersion'];
	$sub_description = $_POST['description'];
	$sub_description = nl2br($sub_description);
	$to = 'support@lunarcms.com';
	/* Send the bug report email */
	$subject = $siteName . ' - Bug report';
	$headers = 'From: Lunar CMS<noreply@lunarcms.com>' . "\r\n";
	$headers .= "Content-type: text/html; charset=\"UTF-8\"; format=flowed \r\n";
	$headers .= "Mime-Version: 1.0 \r\n"; 
	$headers .= "Content-Transfer-Encoding: quoted-printable \r\n";
	$message = "Name: $sub_name<br>Email: $sub_email<br>Site Name: $sub_siteName<br>URL: $sub_url<br>PHP Version: $sub_phpVersion<br>MySQL Version: $sub_mysqlVersion<br><br><strong>Report</strong><br>$sub_description";
	if(mail($to, $subject, $message, $headers)) {		
		/* After the bug report has been sent display a message */
	    echo "<div class='notification'><strong>Your bug report has been sent, we will endevour to look into the issue you are experiencing.</strong></div>";
	} else {
	    echo "<div class='notification'><strong>There was an error sending your bug report, please submit the information via <a href='http://lunarcms.com/Contact.html'>http://lunarcms.com/Contact.html</a>.</strong></div>";
	}
}
?>
<form method="post">
	<label>Name</label><br />
	<input type="text" id="name" name="name" class="form" value="<?php echo $_SESSION['user']; ?>" readonly /><br><br>
	<label>E-mail address</label> <sup>(if you wish to have a response please)</sup><br />
	<input type="text" id="email" name="email" class="form" value="" /><br><br>
	<label>Site name</label><br />
	<input type="text" id="siteName" name="siteName" class="form" value="<?php echo $siteName; ?>" readonly /><br><br>
	<label>URL</label><br />
	<input type="text" id="url" name="url" class="form" value="<?php echo $siteURL; ?>" readonly /><br><br>
	<label>PHP version</label><br />
	<input type="text" id="phpVersion" name="phpVersion" class="form" value="<?php echo phpversion(); ?>" readonly /><br><br>
	<label>MySQL version</label><br />
	<input type="text" id="mysqlVersion" name="mysqlVersion" class="form" value="<?php echo mysql_get_client_info(); ?>" readonly /><br><br>
	<lable>Description of bug</lable><br>
	<textarea class="form" name="description" style="width:864px; height: 100px;"></textarea>
	<button name="submit" value="submit" type="Submit" class="formbutton">Submit Bug</button>
</form>
<?php require('includes/foot.php'); ?>