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
 
/* Check if a link has been set */
if(isset($_GET['link'])) {
	/* Set the variables */
    $editLink = $_GET['link'];
	$editLink = str_replace('_', ' ', $editLink);
} else {
	/* If no link has been set, redirect the user to links_new.php */
    header('Location: links_new.php');
}
/* Load the head.php file */
require('includes/head.php'); 
/* Check if the link you are editing has sub pages */
$countSub = $bdd->prepare("SELECT * FROM pages WHERE menu = :editLink");
$countSub->bindParam(':editLink', $editLink);
$countSub->execute();
$subs = $countSub->rowCount();
$countSub->CloseCursor();
/* Set the mode to form */
$mode = 'form';
$submitted = 'n';
$url_error = '';
$linkText_error = '';
$err = '';
$mode = 'form';
/* Check if the form has been submitted */
if (isset($_POST['Submit'])) {
	$submitted = 'y';
	$sub_type = 'external';
	/* Set the variables from the form data */
	$sub_type = 'external';
	$sub_linkText = $_POST['linkText'];
	$sub_menu = $_POST['menu'];
	$sub_url = $_POST['url'];
	$sub_destination = $_POST['destination'];
	$sub_sort = $_POST['sort'];
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
	/* If the linkText has been changed, check it agains the database for duplicates */
	if ($sub_linkText!=$editLink) {
		$menuUsed = $bdd->query('SELECT linkText FROM pages');
		while ($menuData = $menuUsed->fetch())
		{
			if ($sub_linkText == $menuData['linkText']) {
				$linkText_error = '<span class="error">The \'Link Text\' field must be unique. \'' . $sub_linkText . '\' is in use with another page.</span>';
				$err = '1';
			}
		}
        $menuUsed->CloseCursor();
	}
	/* Check that the URL follows the formation of a valid URL */
	if (!preg_match('%^((https?://)|(www\.))([a-z0-9-].?)+(:[0-9]+)?(/.*)?$%i', $sub_url)) {
		$url_error = '<span class="error">Please enter a valid URL starting with \'http://\' or \'https://\'</span>';
		$err = '1';
	}
	/* If there are no errors, submit the form */
	if ($err == '') {
		/* submit the form */
		$updateLink = "UPDATE pages SET type=?, linkText=?, menu=?, externalURL=?, destination=?, sort=? WHERE linkText=?";
		$queryLink = $bdd->prepare($updateLink);
		$queryLink->execute(array($sub_type,$sub_linkText,$sub_menu,$sub_url,$sub_destination,$sub_sort,$editLink));
		/* If the page has sub pages, remove them from the sub menu, changing them to hidden */
		if ($subs != '0') {
			$updateSubs = "UPDATE pages SET menu=? WHERE menu=?";
			$updateSubs = $bdd->prepare($updateSubs);
			$updateSubs->execute(array($sub_linkText, $editLink));			/* submit the form */
			$updateSubs->CloseCursor();
		}
        $queryLink->CloseCursor();
		$sub_linkText_ = str_replace(' ','_',$sub_linkText);
		/* Set the mode to created */
		$mode = 'created';
	}
}
/* If the mode is set to form */
if ($mode=='form') {
	/* Get the details of the link to update */
	$dbLink = $bdd->prepare("SELECT * FROM pages WHERE linkText = :editLink");
	$dbLink->bindParam(':editLink', $editLink);
	$dbLink->execute();
	$count = $dbLink->rowCount();
	/* Check if a page was returned */
	if ($count==1) {
		while ($data = $dbLink->fetch()) {
			/* If there is an error, display it */
			if ($err == '1') {
				echo "<span class='error'>There are errors within the form data, please check the details entered and resubmit the form.</span><br /><br />";
			}
			?>
			<form method="post">
				<label>Link Text</label><span class='error'>*</span> <?php echo $linkText_error; ?><br />
				<input type="text" id="linkText" name="linkText" class="form" value="<?php if($submitted=='y') { echo $sub_linkText; } else { echo $data['linkText']; } ?>" /><br><br>
				<label>URL</label><span class='error'>*</span> <?php echo $url_error; ?><br />
				<input type="url" id="url" name="url" class="form" value="<?php if($submitted=='y') { echo $sub_url; } else { echo $data['externalURL']; } ?>" /><br><br>
				<label>Destination</label><br />
				<select id="destination" name="destination" class="form">
					<option value="_self"<?php if (($submitted=='y') && ($sub_destination=='_self')) { echo ' selected'; } elseif (($submitted=='n') && ($data['destination'] == '_self')) { echo ' selected'; } ?>>Open in same window</option>
					<option value="_blank"<?php if (($submitted=='y') && ($sub_destination=='_blank')) { echo ' selected'; } elseif (($submitted=='n') && ($data['destination'] == '_blank')) { echo ' selected'; }?>>Open in new tab/window</option>
				</select><br><br>
				<label>Position in menu</label><br />
				<select name="menu" class="form">
					<option value="Top"<?php if (($submitted=='y') && ($sub_menu=='Top')) { echo ' selected'; }  elseif (($submitted=='n') && ($data['menu'] == 'Top')) { echo ' selected'; } ?>>Top</option>
					<option value=""<?php if (($submitted=='y') && ($sub_menu=='')) { echo ' selected'; }  elseif (($submitted=='n') && ($data['menu'] == '')) { echo ' selected'; } ?>>Hidden</option>
					<?php
					$menuOptions = $bdd->query('SELECT linkText FROM pages WHERE menu = \'top\' ORDER BY sort');
					while ($data2 = $menuOptions->fetch()) {
						if ($data2['linkText'] != $editLink) {
							$link_ = str_replace(' ', '_', $data2['linkText']);
							echo "<option value='" . $data2['linkText'] . "'";
							if (($submitted=='y') && ($sub_menu==$data2['linkText'])) {
								echo ' selected';
							}  elseif (($submitted=='n') && ($data['menu'] == $data2['linkText'])) {
								 echo ' selected'; 
							}
							echo ">-- " . $data2['linkText'] . "</option>";
						}
					}
					$menuOptions->closeCursor();   
					?>
				</select><br /><br />
				<label>Sort Order</label><br />
				<select id="sort" name="sort" class="form">
					<option id="1"<?php if (($submitted=='y') && ($sub_sort=='1')) { echo ' selected'; } elseif (($submitted=='n') && ($data['sort'] == '1')) { echo ' selected'; } ?>>1</option>
					<option id="2"<?php if (($submitted=='y') && ($sub_sort=='2')) { echo ' selected'; } elseif (($submitted=='n') && ($data['sort'] == '2')) { echo ' selected'; } ?>>2</option>
					<option id="3"<?php if (($submitted=='y') && ($sub_sort=='3')) { echo ' selected'; } elseif (($submitted=='n') && ($data['sort'] == '3')) { echo ' selected'; } ?>>3</option>
					<option id="4"<?php if (($submitted=='y') && ($sub_sort=='4')) { echo ' selected'; } elseif (($submitted=='n') && ($data['sort'] == '4')) { echo ' selected'; } ?>>4</option>
					<option id="5"<?php if (($submitted=='y') && ($sub_sort=='5')) { echo ' selected'; } elseif (($submitted=='n') && ($data['sort'] == '5')) { echo ' selected'; } ?>>5</option>
					<option id="6"<?php if (($submitted=='y') && ($sub_sort=='6')) { echo ' selected'; } elseif (($submitted=='n') && ($data['sort'] == '6')) { echo ' selected'; } ?>>6</option>
					<option id="7"<?php if (($submitted=='y') && ($sub_sort=='7')) { echo ' selected'; } elseif (($submitted=='n') && ($data['sort'] == '7')) { echo ' selected'; } ?>>7</option>
					<option id="8"<?php if (($submitted=='y') && ($sub_sort=='8')) { echo ' selected'; } elseif (($submitted=='n') && ($data['sort'] == '8')) { echo ' selected'; } ?>>8</option>
					<option id="9"<?php if (($submitted=='y') && ($sub_sort=='9')) { echo ' selected'; } elseif (($submitted=='n') && ($data['sort'] == '9')) { echo ' selected'; } ?>>9</option>
					<option id="10"<?php if (($submitted=='y') && ($sub_sort=='10')) { echo ' selected'; } elseif (($submitted=='n') && ($data['sort'] == '10')) { echo ' selected'; } ?>>10</option>
				</select><br><br>
				<button name="Submit" value="Submit" type="Submit" class="formbutton">Update Link</button>
			</form>
		<?php
		}
	}
    $dbLink->CloseCursor();
/* If the mode is set to created */
} elseif ($mode == 'created') {
	/* Show a message saying that the page was updated */
	echo "The link '$sub_linkText' was successfully updated in the database.<br />";
	echo "<br>";
	echo "Would you like to <a href='links_new.php'>create another link</a> or <a href='links_edit.php?link=$sub_linkText_'>make further changes to $sub_linkText</a>?";
/* If the page could not be found show an error */
} else {
	echo "We could not find the page you wanted to edit.";
}  
require('includes/foot.php'); ?>