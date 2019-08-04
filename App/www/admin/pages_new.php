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
/* Set the blank variables */
$title_error = '';
$linkText_error = '';
$err = '';
/* Set the mode to form */
$mode = 'form';
/* Check if the form has been submitted */
if (isset($_POST['Submit'])) {
	$submitted = 'y';
	$sub_type = 'local';
	$sub_title = $_POST['title'];
	$sub_linkText = $_POST['linkText'];
	$sub_menu = $_POST['menu'];
	$sub_pageContent = $_POST['pageContent'];
	$sub_metaKeywords = $_POST['metaKeywords'];
	$sub_metaDescription = $_POST['metaDescription'];
	$sub_extension = $_POST['extension'];
	$sub_extPosition = $_POST['extPosition'];
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
	/* Load the pages data from the database and check the linktext value agains that of the form */
	$menuUsed = $bdd->query('SELECT linkText FROM pages');
	while ($menuData = $menuUsed->fetch()) {
		if ($sub_linkText == $menuData['linkText']) {
			$linkText_error = '<span class="error">The \'Link Text\' field must be unique. \'' . $sub_linkText . '\' is in use with another page.</span>';
			$err = '1';
		}
	}
    $menuUsed->CloseCursor();
	/* If there are no errors submit the form */
	if ($err == '') {
		/* submit the form */
		$insertPage = "INSERT INTO pages (type,title,linkText,menu,pageContent,metaKeywords,metaDescription,extension,extPosition,sort) VALUES(:type,:title,:linkText,:menu,:pageContent,:metaKeywords,:metaDescription,:extension,:extPosition,:sort)";
		$queryPage = $bdd->prepare($insertPage);
		$queryPage->execute(array(':type'=>$sub_type,
								  ':title'=>$sub_title,
								  ':linkText'=>$sub_linkText,
								  ':menu'=>$sub_menu,
								  ':pageContent'=>$sub_pageContent,
								  ':metaKeywords'=>$sub_metaKeywords,
								  ':metaDescription'=>$sub_metaDescription,
								  ':extension'=>$sub_extension,
								  ':extPosition'=>$sub_extPosition,
								  ':sort'=>$sub_sort));
        $queryPage->CloseCursor();
		/* Change the mode to created */
		$mode = 'created';
	}
}
/* If the mode is set to form */
if ($mode=='form') {
	/* If there is an error, display it */
	if ($err == '1') {
		echo "<span class='error'>There are errors within the form data, please check the details entered and resubmit the form.</span><br /><br />";
	}
	?>
	<form method="post">
		<label>Page Title</label><span class='error'>*</span> <?php echo $title_error; ?><br />
		<input type="text" name="title" class="form" <?php if($submitted=='y') { echo "value='" . $sub_title . "' "; } ?>/><br><br>
		<label>Link Text</label><span class='error'>*</span> <?php echo $linkText_error; ?><br />
		<input type="text" name="linkText" class="form" <?php if($submitted=='y') { echo "value='" . $sub_linkText . "' "; } ?>/><br><br>
		<label>Page Content</label><br>
		<textarea id="elrte" name="pageContent" style="width:100%"><?php if($submitted=='y') { echo $sub_pageContent; } ?></textarea><br><br>
		<label>Meta Keywords</label><br />
		<textarea name="metaKeywords" class="form" style="width:864px; height: 60px;"><?php if($submitted=='y') { echo $sub_metaKeywords; } ?></textarea><br><br>
		<label>Meta Description</label><br />
		<textarea name="metaDescription" class="form" style="width:864px; height: 60px;"><?php if($submitted=='y') { echo $sub_metaDescription; } ?></textarea><br><br>
		<label>Position in menu</label><br />
		<select name="menu" class="form">
			<option value="Top"<?php if (($submitted=='y') && ($sub_menu=='Top')) { echo ' selected'; } ?>>Top</option>
			<option value=""<?php if (($submitted=='y') && ($sub_menu=='')) { echo ' selected'; } ?>>Hidden</option>
			<?php
			$menuOptions = $bdd->query('SELECT linkText FROM pages WHERE menu = \'top\' ORDER BY sort');
			while ($data = $menuOptions->fetch())
			{
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
		</select><br><br>
		<label>Extension</label><br>
		<select name="extension" class="form">
			<option value="" <?php if(($submitted=='y') && ($sub_extension == '')) { echo ' selected'; } ?>>None</option>
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
						}
						echo '>' . str_replace('_', ' ', ucfirst($extName)) . '</option>';
					}
			    }
			}
			?>
		</select><br><br>
		<label>Extension Position</label><br>
		<select name="extPosition" class="form">
			<option value="above"<?php if(($submitted=='y') && ($sub_extPosition == 'above')) { echo ' selected'; } ?>>Above page content</option>
			<option value="below"<?php if(($submitted=='y') && ($sub_extPosition == 'below')) { echo ' selected'; } ?>>Below page content</option>
		</select><br><br>
		<label>Sort Order</label><br />
		<select name="sort" class="form">
			<option name="1"<?php if(($submitted=='y') && ($sub_sort == '1')) { echo ' selected'; } ?>>1</option>
			<option name="2"<?php if(($submitted=='y') && ($sub_sort == '2')) { echo ' selected'; } ?>>2</option>
			<option name="3"<?php if(($submitted=='y') && ($sub_sort == '3')) { echo ' selected'; } ?>>3</option>
			<option name="4"<?php if(($submitted=='y') && ($sub_sort == '4')) { echo ' selected'; } ?>>4</option>
			<option name="5"<?php if(($submitted=='y') && ($sub_sort == '5')) { echo ' selected'; } ?>>5</option>
			<option name="6"<?php if(($submitted=='y') && ($sub_sort == '6')) { echo ' selected'; } ?>>6</option>
			<option name="7"<?php if(($submitted=='y') && ($sub_sort == '7')) { echo ' selected'; } ?>>7</option>
			<option name="8"<?php if(($submitted=='y') && ($sub_sort == '8')) { echo ' selected'; } ?>>8</option>
			<option name="9"<?php if(($submitted=='y') && ($sub_sort == '9')) { echo ' selected'; } ?>>9</option>
			<option name="10"<?php if(($submitted=='y') && ($sub_sort == '10')) { echo ' selected'; } ?>>10</option>
		</select><br><br>
		<button name="Submit" value="submit" type="submit" class="formbutton">Create Page</button>
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
/* If the mode is set to created show a message to say that the page has been created */
if ($mode == 'created') {
	$sub_linkText_ = str_replace(' ','_',$sub_linkText);
	echo "The page '$sub_linkText' was successfully entered into the database.<br />";
	echo "<br>";
	echo "Would you like to <a href='pages_new.php'>create another page</a> or <a href='pages_edit.php?page=$sub_linkText_'>edit the page '$sub_linkText'</a>?";
}
echo '<br>';
require('includes/foot.php'); ?>