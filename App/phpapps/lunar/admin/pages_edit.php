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
 
/* Check if a page has been set */
if(isset($_GET['page'])) {
	/* Set the variables */
    $editPage = $_GET['page'];
	$editPage = str_replace('_', ' ', $editPage);
} else {
	/* If no page has been set, redirect the user to page_new.php */
    header('Location: pages_new.php');
}
/* Load the head.php file */
require('includes/head.php'); 
/* Check if the page you are editing has sub pages */
$countSub = $bdd->prepare("SELECT * FROM pages WHERE menu = :editPage");
$countSub->bindParam(':editPage', $editPage);
$countSub->execute();
$subs = $countSub->rowCount();
$countSub->CloseCursor();
/* Set the mode to form */
$mode = 'form';
$submitted = 'n';
$title_error = '';
$linkText_error = '';
$err = '';
$mode = 'form';
/* Check if the form has been submitted */
if (isset($_POST['Submit'])) {
	$submitted = 'y';
	$sub_type = 'local';
	/* Set the variables from the form data */
	$sub_title = $_POST['title'];
	$sub_linkText = $_POST['linkText'];
	$sub_menu = $_POST['menu'];
	$sub_pageContent = $_POST['pageContent'];
	$sub_metaKeywords = $_POST['metaKeywords'];
	$sub_metaDescription = $_POST['metaDescription'];
	$sub_extension = $_POST['extension'];
	$sub_extPosition = $_POST['extPosition'];
	$sub_oldLinkText = $_POST['oldLinkText'];
	$sub_sort = $_POST['sort'];
	/* PHP validation
	Make sure pagename has been filled in */
	if (trim($sub_title) == '') {
		$title_error = '<span class="error">This field is required.</span>';
		$err = '1';
	} 
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
	if ($sub_linkText!=$editPage) {
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
	/* If there are no errors, submit the form */
	if ($err == '') {
		/* submit the form */
		$updatePage = "UPDATE pages SET type=?, title=?, linkText=?, menu=?, pageContent=?, metaKeywords=?, metaDescription=?, extension=?, extPosition=?, sort=? WHERE linkText=?";
		$queryPage = $bdd->prepare($updatePage);
		$queryPage->execute(array($sub_type,$sub_title,$sub_linkText,$sub_menu,$sub_pageContent,$sub_metaKeywords,$sub_metaDescription,$sub_extension,$sub_extPosition,$sub_sort,$editPage));			/* submit the form */
		/* If the page has sub pages, remove them from the sub menu, changing them to hidden */
		if ($subs != '0') {
			$updateSubs = "UPDATE pages SET menu=? WHERE menu=?";
			$updateSubs = $bdd->prepare($updateSubs);
			$updateSubs->execute(array($sub_linkText, $editPage));			/* submit the form */
		}
        $queryPage->CloseCursor();
		$sub_linkText_ = str_replace(' ','_',$sub_linkText);
        /* Get the linkText of the homepage */
        $settings = $bdd->query('SELECT homepage FROM settings WHERE id = 1');
        while ($sitesettings = $settings->fetch())
        {
            $homepage = $sitesettings['homepage'];
        }
        $settings->CloseCursor();
        /* Check if the page you are editing is the homepage or not */
        if ($editPage == $homepage) {
            /* If the page is set as the homepage, update the homepage in the site settings */
            $updateHome = "UPDATE settings SET homepage=? WHERE id = 1";
            $queryHome = $bdd->prepare($updateHome);
            $queryHome->execute(array($sub_linkText));           /* submit the form */
        }
        /* Set the mode to created */
		$mode = 'created';
	}
}
/* If the mode is set to form */
if ($mode=='form') {
	/* Load the page details from the database */
	$dbPage = $bdd->prepare("SELECT * FROM pages WHERE linkText = :editPage");
	$dbPage->bindParam(':editPage', $editPage);
	$dbPage->execute();
	$count = $dbPage->rowCount();
	/* Check if a page was returned */
	if ($count==1) {
		while ($data = $dbPage->fetch()) {
			/* If there is an error, display it */
			if ($err == '1') {
				echo "<span class='error'>There are errors within the form data, please check the details entered and resubmit the form.</span><br /><br />";
			}
			?>
			<form method="post">
				<label>Page Title</label><span class='error'>*</span> <?php echo $title_error; ?><br />
				<input type="text" name="title" class="form" value="<?php if($submitted=='y') { echo $sub_title; } else  { echo $data['title']; }?>" /><br><br>
				<label>Link Text</label><span class='error'>*</span> <?php echo $linkText_error; ?><br />
				<input type="text" name="linkText" class="form" value="<?php if($submitted=='y') { echo $sub_linkText; } else { echo $data['linkText']; } ?>" /><br><br>
				<label>Page Content</label><br>
				<textarea id="elrte" name="pageContent" style="width:100%"><?php if($submitted=='y') { echo $sub_pageContent; } else { echo $data['pageContent']; } ?></textarea><br><br>
				<label>Meta Keywords</label><br />
				<textarea name="metaKeywords" class="form" style="width:864px; height: 60px;"><?php if($submitted=='y') { echo $sub_metaKeywords; } else { echo $data['metaKeywords']; } ?></textarea><br><br>
				<label>Meta Description</label><br />
				<textarea name="metaDescription" class="form" style="width:864px; height: 60px;"><?php if($submitted=='y') { echo $sub_metaDescription; } else { echo $data['metaDescription']; }?></textarea><br><br>
				<label>Position in menu</label><br />
				<select name="menu" class="form">
					<option value="Top"<?php if (($submitted=='y') && ($sub_menu=='Top')) { echo ' selected'; } elseif ($data['menu']=='Top') { echo ' selected'; } ?>>Top</option>
					<option value=""<?php if (($submitted=='y') && ($sub_menu=='')) { echo ' selected'; } elseif ($data['menu']=='') { echo ' selected'; } ?>>Hidden</option>
					<?php
					$menuOptions = $bdd->query('SELECT linkText FROM pages WHERE menu = \'top\' ORDER BY sort');
					while ($menuData = $menuOptions->fetch()) {
						/* Check that the pages to list don't include the page you are editing */
						if ($menuData['linkText'] != $editPage) {
							$link_ = str_replace(' ', '_', $menuData['linkText']);
							echo "<option value='" . $menuData['linkText'] . "'";
							if (($submitted=='y') && ($sub_menu==$menuData['linkText']))
							{
								echo ' selected';
							} elseif ($data['menu']==$menuData['linkText']) {
								echo ' selected';
							}
							echo ">-- " . $menuData['linkText'] . "</option>";
						}
					}
					$menuOptions->closeCursor();   
					?>
				</select><br><br>
				<label>Extension</label><br>
				<select name="extension" class="form">
					<option value="" <?php if(($submitted=='y') && ($sub_extension == '')) { echo ' selected'; } elseif ($data['extension']=='') { echo ' selected'; } ?>>None</option>
					<?php
					$dir = '../extensions/';
					if ($ext = opendir($dir)) {
					    while (($file = readdir($ext)) !== false){
					        if (substr($file, -8) == '.ext.php') {
					        	$extName = substr($file, 0, -8);
					            echo '<option value="' . $extName . '" ';
								if(($submitted=='y') && ($sub_extension == $extName)) 
								{
									echo ' selected';
								} elseif ($data['extension']==$extName) 
								{
									echo ' selected';
								}
								echo '>' . str_replace('_', ' ', ucfirst($extName)) . '</option>';
							}
					    }
					}
					?>
				</select><?php echo $sub_extension; ?><br><br>
				<label>Extension Position</label><br>
				<select name="extPosition" class="form">
					<option value="above"<?php if(($submitted=='y') && ($sub_extPosition == 'above')) { echo ' selected'; } elseif ($data['extPosition']=='above') { echo ' selected'; } ?>>Above page content</option>
					<option value="below"<?php if(($submitted=='y') && ($sub_extPosition == 'below')) { echo ' selected'; } elseif ($data['extPosition']=='below') { echo ' selected'; } ?>>Below page content</option>
				</select><br><br>
				<label>Sort Order</label><br />
				<select name="sort" class="form">
					<option name="1"<?php if(($submitted=='y') && ($sub_sort == '1')) { echo ' selected'; } elseif ($data['sort']=='1') { echo ' selected'; } ?>>1</option>
					<option name="2"<?php if(($submitted=='y') && ($sub_sort == '2')) { echo ' selected'; } elseif ($data['sort']=='2') { echo ' selected'; } ?>>2</option>
					<option name="3"<?php if(($submitted=='y') && ($sub_sort == '3')) { echo ' selected'; } elseif ($data['sort']=='3') { echo ' selected'; } ?>>3</option>
					<option name="4"<?php if(($submitted=='y') && ($sub_sort == '4')) { echo ' selected'; } elseif ($data['sort']=='4') { echo ' selected'; } ?>>4</option>
					<option name="5"<?php if(($submitted=='y') && ($sub_sort == '5')) { echo ' selected'; } elseif ($data['sort']=='5') { echo ' selected'; } ?>>5</option>
					<option name="6"<?php if(($submitted=='y') && ($sub_sort == '6')) { echo ' selected'; } elseif ($data['sort']=='6') { echo ' selected'; } ?>>6</option>
					<option name="7"<?php if(($submitted=='y') && ($sub_sort == '7')) { echo ' selected'; } elseif ($data['sort']=='7') { echo ' selected'; } ?>>7</option>
					<option name="8"<?php if(($submitted=='y') && ($sub_sort == '8')) { echo ' selected'; } elseif ($data['sort']=='8') { echo ' selected'; } ?>>8</option>
					<option name="9"<?php if(($submitted=='y') && ($sub_sort == '9')) { echo ' selected'; } elseif ($data['sort']=='9') { echo ' selected'; } ?>>9</option>
					<option name="10"<?php if(($submitted=='y') && ($sub_sort == '10')) { echo ' selected'; } elseif ($data['sort']=='10') { echo ' selected'; } ?>>10</option>
				</select><br><br>
				<button name="Submit" value="submit" type="submit" class="formbutton">Update Page</button>			
			</form>
			<script>
			$().ready(function() {
			  $('#elrte').elrte({
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
		}
	}
    $dbPage->CloseCursor();
/* If the mode is set to created */
} elseif ($mode == 'created') {
	/* Show a message saying that the page was updated */
	echo "The page '$sub_linkText' was successfully updated in the database.<br />";
	echo "<br>";
	echo "Would you like to <a href='pages_new.php'>create another page</a> or <a href='pages_edit.php?page=$sub_linkText_'>make further changes to $sub_linkText</a>?";
/* If the page could not be found show an error */
} else {
	echo "We could not find the page you wanted to edit.";
}
require('includes/foot.php'); ?>