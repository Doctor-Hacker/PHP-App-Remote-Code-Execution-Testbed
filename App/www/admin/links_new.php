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
$submitted = 'n';
$linkText_error = '';
$url_error = '';
$err = '';
$mode = 'form';
/* Check if the form has been submitted */
if (isset($_POST['Submit'])) {
	$submitted = 'y';
	$sub_type = 'external';
	$sub_linkText = $_POST['linkText'];
	$sub_menu = $_POST['menu'];
	$sub_url = $_POST['url'];
	$sub_destination = $_POST['destination'];
	$sub_sort = $_POST['sort'];
	/* PHP validation
	/* Make sure linktext has been filled in */
	if (trim($sub_linkText) == '') {
		$linkText_error = '<span class="error">This field is required.</span>';
		$err = '1';
	}
	/* Make sure linktext contains no illegal charicters */
	if (!preg_match ('/^[A-Za-z0-9 -]{0,30}$/i', trim($sub_linkText))) {
		$linkText_error = '<span class="error">This field may only contain Letters, Numbers, Spaces or Hyphen (-) and must be no longer than 30 charictars.</span>';
		$err = '1';
	}
	/* Load the pages data from the database and check the linktext value agains that of the form to aviod duplicates */
	$menuUsed = $bdd->query('SELECT linkText FROM pages');
	while ($menuData = $menuUsed->fetch()) {
		if ($sub_linkText == $menuData['linkText']) {
			/* If the linkText is in use display an error */
			$linkText_error = '<span class="error">The \'Link Text\' field must be unique. \'' . $sub_linkText . '\' is in use with another page.</span>';
			$err = '1';
		}
	}
    $menuUsed->CloseCursor();
	/* Check the URL appears valid */
	if (!preg_match('%^((https?://)|(www\.))([a-z0-9-].?)+(:[0-9]+)?(/.*)?$%i', $sub_url)) {
		$url_error = '<span class="error">Please enter a valid URL starting with \'http://\' or \'https://\'</span>';
		$err = '1';
	}
	/* If there are no errors submit the form */
	if ($err == '') {
		/* submit the form */
		$insertLink = "INSERT INTO pages (type,linkText,menu,externalURL,destination,sort) VALUES(:type,:linkText,:menu,:externalURL,:destination,:sort)";
		$queryLink = $bdd->prepare($insertLink);
		$queryLink->execute(array(':type'=>$sub_type,
								  ':linkText'=>$sub_linkText,
								  ':menu'=>$sub_menu,
								  ':externalURL'=>$sub_url,
								  ':destination'=>$sub_destination,
								  ':sort'=>$sub_sort));
		/* Set the mode to created */
		$mode = 'created';
        $queryLink->CloseCursor();
	}
}
/* If the mode is set to form */
if ($mode=='form') {
	/* If there are any erros to display, show the error message */
	if ($err == '1') {
		echo "<span class='error'>There are errors within the form data, please check the details entered and resubmit the form.</span><br /><br />";
	}
?>
	<form method="post">
		<label>Link Text</label><span class='error'>*</span> <?php echo $linkText_error; ?><br />
		<input type="text" id="linkText" name="linkText" class="form" <?php if($submitted=='y') { echo "value='" . $sub_linkText . "' "; } ?> /><br><br>
		<label>URL</label><span class='error'>*</span> <?php echo $url_error; ?><br />
		<input type="url" id="url" name="url" class="form" <?php if($submitted=='y') { echo "value='" . $sub_url . "' "; } ?> /><br><br>
		<label>Destination</label><br />
		<select id="destination" name="destination" class="form">
			<option value="_self"<?php if (($submitted=='y') && ($sub_destination=='_self')) { echo ' selected'; } ?>>Open in same window</option>
			<option value="_blank"<?php if (($submitted=='y') && ($sub_destination=='_blank')) { echo ' selected'; } ?>>Open in new tab/window</option>
		</select><br><br>
		<label>Position in menu</label><br />
		<select name="menu" class="form">
			<option value="Top"<?php if (($submitted=='y') && ($sub_menu=='Top')) { echo ' selected'; } ?>>Top</option>
			<option value=""<?php if (($submitted=='y') && ($sub_menu=='')) { echo ' selected'; } ?>>Hidden</option>
		<?php
		$menuOptions = $bdd->query('SELECT linkText FROM pages WHERE menu = \'top\' ORDER BY sort');
		while ($data = $menuOptions->fetch()) {
			$link_ = str_replace(' ', '_', $data['linkText']);
			echo "<option value='" . $data['linkText'] . "'";
			if (($submitted=='y') && ($sub_menu==$data['linkText']))
			{
				echo ' selected';
			}
			echo ">-- " . $data['linkText'] . "</option>";
		}
		$menuOptions->closeCursor();   
		?>
		</select><br /><br />
		<label>Sort Order</label><br />
		<select id="sort" name="sort" class="form">
			<option id="1"<?php if (($submitted=='y') && ($sub_sort=='1')) { echo ' selected'; } ?>>1</option>
			<option id="2"<?php if (($submitted=='y') && ($sub_sort=='2')) { echo ' selected'; } ?>>2</option>
			<option id="3"<?php if (($submitted=='y') && ($sub_sort=='3')) { echo ' selected'; } ?>>3</option>
			<option id="4"<?php if (($submitted=='y') && ($sub_sort=='4')) { echo ' selected'; } ?>>4</option>
			<option id="5"<?php if (($submitted=='y') && ($sub_sort=='5')) { echo ' selected'; } ?>>5</option>
			<option id="6"<?php if (($submitted=='y') && ($sub_sort=='6')) { echo ' selected'; } ?>>6</option>
			<option id="7"<?php if (($submitted=='y') && ($sub_sort=='7')) { echo ' selected'; } ?>>7</option>
			<option id="8"<?php if (($submitted=='y') && ($sub_sort=='8')) { echo ' selected'; } ?>>8</option>
			<option id="9"<?php if (($submitted=='y') && ($sub_sort=='9')) { echo ' selected'; } ?>>9</option>
			<option id="10"<?php if (($submitted=='y') && ($sub_sort=='10')) { echo ' selected'; } ?>>10</option>
		</select><br><br>
		<button name="Submit" value="Submit" type="Submit" class="formbutton">Create Link</button>
	</form>
<?php
}
/* If the mode is set to created */
if ($mode=='created') {
	$sub_linkText_ = str_replace(' ', '_', $sub_linKText);
	/* Show a message to say that the link has been submitted */
	echo "The link '$sub_linkText' was successfully entered into the database.<br />";
	echo "<br>";
	echo "Would you like to <a href='links_new.php'>create another link</a> or <a href='links_edit.php?link=$sub_linkText_'>edit the link '$sub_linkText'</a>?";
}
?>
<br />
<?php require('includes/foot.php'); ?>