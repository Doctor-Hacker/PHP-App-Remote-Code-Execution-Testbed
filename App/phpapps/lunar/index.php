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

/* Include the config file */
include ('includes/configure.php');
/* Check if secure is set, if not redirect to the install script */
if(!isset($secure)) {
	
}
/* Check to see if a user session exists */
$sessionUser = '';
session_start();
if(isset($_SESSION['secure'])) {
    if($_SESSION['secure'] == $secure) {
        if(isset($_SESSION['user'])) {
            $sessionUser = $_SESSION['user'];
        }
    }
}
/* Get the website settings from the database */
$settings = $bdd->query('SELECT homepage, template, siteName, siteURL, timeZone, users, stats, seo FROM settings WHERE id = 1');
while ($sitesettings = $settings->fetch())
{
	$homepage = $sitesettings['homepage'];
	$template = $sitesettings['template'];
	$siteName = $sitesettings['siteName'];
    $lunarURL = $sitesettings['siteURL'];
	$timeZone = $sitesettings['timeZone'];
    $users = $sitesettings['users'];
	$stats = $sitesettings['stats'];
	$seo = $sitesettings['seo'];
}
$settings->CloseCursor();
/* Set the time zone */
date_default_timezone_set($timeZone);
if($stats=='1') {
	include('includes/stats.php');
}
/* Close the settings connection */
/* Check if a page has been set */
if(isset($_GET['page'])) {
    $page = $_GET['page'];
	$page = str_replace('_', ' ', $page);
} else {
	/* If no page has been set, use the homepage */
	$page = $homepage;
}
/* If the page isn't accounts then load the page content */
if ($page != '!Accounts') {
    /* Set not found to 1, then if a page is found reset it to 0 */
    $notFound='1';
    $dbPage = $bdd->prepare("SELECT * FROM pages WHERE linkText = :Page LIMIT 1");
    $dbPage->bindParam(':Page', $page);
    $dbPage->execute();
    /* Count the number of rows returned, the answer should be 1 if a page is found or 0 if no page is found */
    $count = $dbPage->rowCount();
    if ($count==1) {
    	/* Set not found to 0 as a page was found */
    	$notFound='0';
    	while ($pageData = $dbPage->fetch())
    	{
    		/* If 1 page was found set the variables */
    		$title=$pageData['title'];
    		$linkText=$pageData['linkText'];
    		$pageContent=$pageData['pageContent'];
    		$metaKeywords=$pageData['metaKeywords'];
    		$metaDescription=$pageData['metaDescription'];
    		$extension=$pageData['extension'];
    		$extPosition=$pageData['extPosition'];
    	}
    }
    $dbPage->CloseCursor();
} else {
    $title = $siteName . ': Accounts';
    $linkText = '';
    $pageContent = '';
    $metaKeywords = '';
    $metaDescription = '';
    $extension = '';
    $extPosition = '';
    $notFound='0';
}
?>
<!-- Lightbox -->
<link rel="stylesheet" href="../includes/lightbox/css/lightbox.css">
<script src="../includes/lightbox/js/jquery-1.11.0.min.js"></script>
<script src="../includes/lightbox/js/lightbox.min.js"></script>
<script type="text/javascript" src="includes/nicedit/nicEdit.js"></script>
<script type="text/javascript">
//<![CDATA[
bkLib.onDomLoaded(function() {
    nicEditors.editors.push(
        new nicEditor().panelInstance(
            document.getElementById('nicedit')
        )
    );
});
//]]>
</script>
<?php
/* Check to see if the template exists */
$error = '0';
/* Set the file to search for the head of the template */
$head = 'templates/' . $template . '/head.php';
if (!file_exists($head)) {
	/* If the head.php file doesn't exists create an error */
    $error='1';
}
/* Set the file to search for the foot of the template */
$foot = 'templates/' . $template . '/foot.php';
if (!file_exists($foot)) {
	/* If the foot.php file doesn't exists create an error */
    $error='1';
}
/* If there was an error loading the template, display an error */
if ($error=='1') {
	echo 'There was an error loading the template';
} else {
	/* If there was no error with the template, load the head.php file */
	include("templates/$template/head.php");
	/* If notFound = 0, i.e. a page was found start loading the page */
	if ($page != '!Accounts') {
        if($notFound=='0') {
    		/* If the page to be loaded has an extension set in the above position, load the extension */
    		if(($extension != '') && ($extPosition == 'above')) {
    			$extName = 'extensions/' . $extension . '.ext.php';
    			include($extName);
    		}
            /* Echo the page content */
            echo $pageContent; 
    
    		/* If the page to be loaded has an extension set in the above position, load the extension */
    		if(($extension != '') && ($extPosition == 'below')) {
    			$extName = 'extensions/' . $extension . '.ext.php';
    			include($extName);
    		}
    	} else {
    		/* If no page was found display an error */
    		echo '<span style="color: red; font-size:22px;">Page not found</span>';
    	}
    } else {
        include('includes/accounts.php');
    }
	/* load the foot.php file from the template */
	include("templates/$template/foot.php");
}
?>