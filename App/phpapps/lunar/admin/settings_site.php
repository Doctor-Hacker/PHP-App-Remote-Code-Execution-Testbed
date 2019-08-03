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
/* Check if the user has access to view this page */
if ($access=='0') {
	$submitted = 'n';
	/* Set the blank variables */
	$linkText_error = '';
	$url_error = '';
	$err = '';
	/* Set the mode to form */
	$mode = 'form';
	/* Check if the form has been submitted */
	if (isset($_POST['submit'])) {
		$submitted='y';
		/* Set the form variables */
		$id='1';
		$sub_name=$_POST['name'];
		$sub_url=$_POST['url'];
		$sub_folder=$_POST['folder'];
		$sub_stats=$_POST['stats'];
		$sub_seo=$_POST['seo'];
		$sub_timeZone=$_POST['timeZone'];
        $sub_users=$_POST['users'];
		/* Check that the site name has been entered */
		if (trim($sub_name) == '') {
			$name_error = '<span class="error">This field is required.</span>';
			$err = '1';
		}
		/* Check that the site URL has been entered */
		if (trim($sub_url) == '') {
			$url_error = '<span class="error">This field is required.</span>';
			$err = '1';
		}
		/* Check that the admin folder has been entered */
		if (trim($sub_folder) == '') {
			$folder_error = '<span class="error">This field is required.</span>';
			$err = '1values';
		}
		/* If there are no errors submit the form */
		if ($err == '') {
			/* submit the form */
			$updateSettings = "UPDATE settings SET siteName=?, siteURL=?, adminFolder=?, timeZone=?, users=?, stats=?, seo=? WHERE id=?";
			$querySettings = $bdd->prepare($updateSettings);
			$querySettings->execute(array($sub_name, $sub_url, $sub_folder, $sub_timeZone, $sub_users, $sub_stats, $sub_seo, $id));	
            $querySettings->CloseCursor();		/* submit the form */
			/* Show a message stating that the settings have been updated */
			echo "<div class='notification'><strong>The settings have been updated in the database.</strong></div>";
			echo "<br>";
		}
	}
	/* If there are errors show the error message */
	if ($err == '1') {
		echo "<span class='error'>There are errors within the form data, please check the details entered and resubmit the form.</span><br /><br />";
	}
	/* Load the settings from the database to pre-fill in the form */
	$settings = $bdd->query('SELECT * FROM settings WHERE id = \'1\'');
	while ($settings = $settings->fetch()) {
    	/* Generate a timezone list */
    	function tz_list() {
    		$zones_array = array();
    		$timestamp = time();
    		foreach(timezone_identifiers_list() as $key => $zone) {
    			date_default_timezone_set($zone);
    			$zones_array[$key]['zone'] = $zone;
    		}
    		return $zones_array;
    	}
?>
	<form method="post">
		<label>Website Name:</label><span class='error'>*</span> <?php echo $name_error; ?><br />
		<input type="text" id="name" name="name" class="form" value="<?php if($submitted=='y') { echo $sub_name; } else { echo $settings['siteName' ]; } ?>" /><br><br>
		<label>Website URL:</label><span class='error'>*</span> <?php echo $url_error; ?><br />
		<input type="text" id="url" name="url" class="form" value="<?php if($submitted=='y') { echo $sub_url; } else { echo $settings['siteURL']; } ?>" /><br><br>
		<label>Admin Folder:</label><span class='error'>*</span> <?php echo $folder_error; ?><br />
		<input type="text" id="folder" name="folder" class="form" value="<?php if($submitted=='y') { echo $sub_folder; } else { echo $settings['adminFolder']; } ?>" /><br><br>
		<label>Time Zone</label><br>
		<select name="timeZone" class="form">
			<?php foreach(tz_list() as $t) { ?>
				<option value="<?php print $t['zone'] ?>" <?php if(($submitted=='y') && ($sub_timeZone == $t['zone'])) { echo ' selected'; } elseif($settings['timeZone'] == $t['zone']) { echo ' selected'; } ?>>
					<?php print $t['zone'] ?>
				</option>
			<?php } ?>
		</select><br><br>
        <label>Enable User Accounts</label><br>
        <select name="users" class="form">
            <option value="1"<?php if(($submitted=='y') && ($sub_users == '1')) { echo ' selected'; } elseif($settings['users'] == '1') { echo ' selected'; } ?>>Enabled</option>
            <option value="0"<?php if(($submitted=='y') && ($sub_users == '0')) { echo ' selected'; } elseif($settings['users'] == '0') { echo ' selected'; } ?>>Disabled</option>
        </select><br><br>
        <label>Website Stats</label><br>
        <select name="stats" class="form">
            <option value="1"<?php if(($submitted=='y') && ($sub_stats == '1')) { echo ' selected'; } elseif($settings['stats'] == '1') { echo ' selected'; } ?>>Enabled</option>
            <option value="0"<?php if(($submitted=='y') && ($sub_stats == '0')) { echo ' selected'; } elseif($settings['stats'] == '0') { echo ' selected'; } ?>>Disabled</option>
        </select><br><br>
		<label>SEO URL's</label><br>
		<select name="seo" class="form">
			<option value="1"<?php if(($submitted=='y') && ($sub_seo == '1')) { echo ' selected'; } elseif($settings['seo'] == '1') { echo ' selected'; } ?>>Enabled (May not work on all servers)</option>
			<option value="0"<?php if(($submitted=='y') && ($sub_seo == '0')) { echo ' selected'; } elseif($settings['seo'] == '0') { echo ' selected'; } ?>>Disabled</option>
		</select><br><br>
		<button name="submit" value="submit" type="submit" class="formbutton">Update</button>
	</form>
	<br>
<?php
	}
    $settings->CloseCursor();
} else {
	echo "<div style='text-align: center'><span style='color: red; font-size: 22px;'>Only a 'Super user' can access this section.</span></div>";
}
require('includes/foot.php'); ?>