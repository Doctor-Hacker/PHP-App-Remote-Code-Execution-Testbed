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
if (isset($_GET["setTemplate"])) {
	$setTemplate = $_GET['setTemplate'];
	$updateTemplate = "UPDATE settings SET template=? WHERE id='1'";
	$queryTemplate = $bdd->prepare($updateTemplate);
	$queryTemplate->execute(array($setTemplate));			/* submit the form */
	$queryTemplate->CloseCursor();
    echo "<div class='notification'><strong>'$setTemplate' has been set as your default template.</strong></div>";    
	echo "<br>";
	$queryTemplate->closeCursor();
	$settings = $bdd->query('SELECT template FROM settings WHERE id = 1');
	while ($sitesettings = $settings->fetch())
	{
		$template = $sitesettings['template'];
	}
	$settings->closeCursor();
	
	echo "<br>";
}
if ($access=='0') {
	echo '<strong><a href="http://lunarcms.com/browse_templates" target="_blank">Get templates</a></strong><br /><br />';
	echo "<table width='100%' cellspacing='0' cellpadding='3px'>";
	echo "<tr>";
	echo "<td>Template Name</td>";
	echo "<td>Preview</td>";
	echo "<td width=25px;></td>";
	echo "</tr>";
	$color="#ebeff5";
	/* Read the templates folder */
	if ($folder = opendir('../templates')) {
		/* Do not include '.', '..' or 'index.html' */
	    $blacklist = array('.', '..', 'index.html');
	    while (false !== ($templateList = readdir($folder))) {
	        if (!in_array($templateList, $blacklist)) {
	        	echo "<tr>";
				$templateName = ucfirst(str_replace('_', ' ', $templateList));
	            echo "<td bgcolor='$color'>$templateName</td>";
				$image = '../templates/' . $templateList . '/preview.png';
				if (file_exists($image)) {
				    echo "<td bgcolor='$color'><a href='$image' data-lightbox='$templateList'><img src='img/screenshot.png' title='View a screenshot of $templateList' /></a>";
				} else {
				    echo "<td bgcolor='$color'></td>";
				}
				if($templateList == $template) {
					echo "<td bgcolor='$color'><img src='img/tick.png' title='$templateList is the default template.' /></td>";
				} else {
					echo "<td bgcolor='$color'><a href='templates.php?setTemplate=$templateList'><img src='img/use.png' title='Use $templateList as my template' /></a></td>";
				}
				echo "</tr>";
				if ($color=="#ebeff5") {
					$color="#FFFFFF";
				} else {
					$color="#ebeff5";
				}
	        }
	    }
	    closedir($handle);
	}
	echo "</tr>";
	echo "</table>";
} else {
	echo "<div style='text-align: center'><span style='color: red; font-size: 22px;'>Only a 'Super user' can access this section.</span></div>";
}
require('includes/foot.php'); ?>