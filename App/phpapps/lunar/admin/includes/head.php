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
require '../includes/configure.php';
require 'includes/session.php';
/* Get the website settings */
$settings = $bdd->query('SELECT * FROM settings WHERE id = 1');
while ($sitesettings = $settings->fetch())
{
	$homepage = $sitesettings['homepage'];
	$template = $sitesettings['template'];
	$siteName = $sitesettings['siteName'];
	$siteURL = $sitesettings['siteURL'];
	$adminFolder = $sitesettings['adminFolder'];
	$timeZone = $sitesettings['timeZone'];
}
$settings->closeCursor();
date_default_timezone_set($timeZone);
?>
<!DOCTYPE HTML>
<head>
<title>LunarCMS - Administration Panel</title>
<link rel="stylesheet" type="text/css" href="includes/admin.css">
    <!-- Lightbox -->
	<link rel="stylesheet" href="../includes/lightbox/css/lightbox.css">
	<script src="../includes/lightbox/js/jquery-1.11.0.min.js"></script>
	<script src="../includes/lightbox/js/lightbox.min.js"></script>
	
    <!-- jQuery and jQuery UI (REQUIRED) -->
	<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.21/themes/smoothness/jquery-ui.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.21/jquery-ui.min.js"></script>

    <!-- elRTE CSS (REQUIRED)-->
    <link rel="stylesheet" type="text/css" href="includes/elrte/css/elrte.min.css">

	<!-- elRTE JS (REQUIRED) -->
    <script src="includes/elrte/js/elrte.min.js"></script>
    
	<!-- elFinder CSS (REQUIRED) -->
    <link rel="stylesheet" type="text/css" href="includes/elfinder/css/elfinder.min.css">
    <link rel="stylesheet" type="text/css" href="includes/elfinder/css/theme.css">
    
	<!-- elFinder JS (REQUIRED) -->
    <script src="includes/elfinder/js/elfinder.min.js"></script></head>

<body>
<?php
$access=$_SESSION['access'];
if ($access=='0') {
	$accLevel='Super User';
} elseif ($access=='1') {
	$accLevel='Admin';
}
?>
<div id="admin-links"><strong>Lunar CMS 3.3</strong><br /><br /><strong><?php echo $_SESSION['user']; ?></strong> (<?php echo $accLevel; ?>) | <a href="logout.php">Logout</a> | <a href="../" target="_blank">View your site</a></div>
<div id="headder">
	<div id="logo"><img src="img/logo.png" /></div>
</div>

	<div id="menu">
<div id='cssmenu'>
<ul>
   <li><a href='index.php'><span>Home</span></a></li>
   <li class='has-sub'><a href='pages.php'><span>Pages</span></a>
      <ul>
         <li class='has-sub'><a href='pages_new.php'><span>New page</span></a>
         </li>
         <li class='has-sub'><a href='links_new.php'><span>External Link</span></a>
         </li>
      </ul>
   </li>
<?php
if ($access=='0') {
?>
   <li class='has-sub'><a href='settings.php'><span>Settings</span></a>
      <ul>
         <li class='has-sub'><a href='user_manage.php'><span>Manage users</span></a>
         	<ul>
               <li><a href='user_create.php'><span>Create user</span></a></li>
         	</ul>
         </li>
         <li class='has-sub'><a href='settings_site.php'><span>Site settings</span></a>
         </li>
         <li class='has-sub'><a href='templates.php'><span>Templates</span></a>
            <ul>
               <li><a href='http://lunarcms.com/browse_templates' target="_blank"><span>Get templates</span></a></li>
            </ul>
         </li>
      </ul>
   </li>
<?php
}
?>
   <li class='has-sub'><a href='tools.php'><span>Tools</span></a>
      <ul>
      	 <?php
      	 if ($access=='1') {
      	 	echo "<li class='has-sub'><a href='change_password.php'><span>Change Password</span></a></li>";
      	 }
		 ?>
         <li class='has-sub'><a href='documentation.php'><span>Documentation</span></a>
            <ul>
               <li><a href='http://lunarcms.com/files/docs/documentation.pdf' download="Documentation"><span>Download PDF</span></a></li>
            </ul>
         </li>
         <?php
         if ($access=='0') {
         	echo "<li class='has-sub'><a href='file_manager.php'><span>File manager</span></a></li>";
		 }
		 ?>
         <li class='has-sub'><a href='bug_report.php'><span>Report a bug</span></a>
         </li>
         <li class='has-sub'><a href='visitor_stats.php'><span>Visitor stats</span></a>
         </li>
      </ul>
   </li>
   <li><a href='extensions.php'><span>Extensions</span></a>
         <ul>
         <?php
         if ($access=='0') {
         	echo "<li><a href='http://lunarcms.com/browse_extensions' target='_blank'><span>Get extensions</span></a></li>";
		 }
		 ?>
<?php
$dir = 'extensions/';
if (is_dir($dir)) {
    if ($top = opendir($dir)) {
        while (($topFile = readdir($top)) !== false) {
        	if (substr($topFile, -8) == '.top.php') {
        		echo "<li>";
        		$fullLength = strlen($topFile);
				$nameLength = $fullLength - 8;
    	        echo "<a href='extensions.php?ext=" . substr($topFile, 0, -8) . "&top'>" . ucfirst(str_replace('_', ' ', substr($topFile, 0, -8))) . "</a>";
				// integer starts at 0 before counting
			    $i = 0; 
			    if ($countSubs = opendir($dir)) {
			        while (($file = readdir($countSubs)) !== false){
			            if (substr($file, -8) == '.sub.php' && substr($file, 0, $nameLength) == substr($topFile, 0, -8)) {
			                $i++;
						}
			        }
			    }
			    // prints out how many were in the directory
			    if ($i != '0') {
					echo "<ul>";
				}
			    if ($sub = opendir($dir)) {
			        while (($subFile = readdir($sub)) !== false) {
			        	if (substr($subFile, -8) == '.sub.php' && substr($subFile, 0, $nameLength) == substr($topFile, 0, -8)) {
			        		$nameLength1 = $nameLength + 1;
			    	        echo "<li><a href='extensions.php?ext=".substr($topFile, 0, -8)."&sub=".substr($subFile, $nameLength1, -8)."'>" . ucfirst(str_replace('_', ' ', substr($subFile, $nameLength1, -8))) . "</a></li>";
						}
			        }
			        closedir($dh);
			    }
			    if ($i != '0') {
					echo "</ul>";
				}
				echo "</li>";
			}
        }
        closedir($dh);
    }
}
?>
      </ul>
   </li>
   <li><a href='http://lunarcms.com/' target="_blank"><span>Lunar CMS</span></a></li>
</ul>
</div>
	</div>
<div id="contentbox">
<?php
$configFile = '../includes/configure.php';
if (is_writable($configFile)) {
   echo '<div class="notification"><strong>The config file is writeable.</strong> This can leave your website vulnerable. To correct this please change the permissions for the file \'/includes/configure.php\' to make it read only (CHMOD 0644). If you are usure of how to do this please contact your web host.</div><br>';
}
$installFile = 'install.php';
if (file_exists($installFile)) {
   echo '<div class="notification"><strong>The install file hasn\'t been removed.</strong> This can leave your website vulnerable. To correct this please delete the file \'/admin/install.php\'. If you are usure of how to do this please contact your web host.</div><br>';
}
?>