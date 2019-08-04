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
/* Check to see if a sub extension is set */
if(isset($_GET['ext']) && isset($_GET['sub'])) {
	/* Set the extension filename and load it */
    $extension = 'extensions/'.$_GET['ext'] . '.' . $_GET['sub'] . '.sub.php';
	include($extension);
/* Check to see if a top extension is set */
} elseif(isset($_GET['ext']) && isset($_GET['top'])) {
	/* Set the extension filename and load it */
	$extension = 'extensions/'.$_GET['ext'] . '.top.php';
	include($extension);
/* If no extension is set show a list of extension files */
} else {
	/* Set the extension directory */
	$dir = 'extensions/';
	echo '<ul>';
	/* Check that the directory is valid */
	if (is_dir($dir)) {
		/* Open the directory */
	    if ($top = opendir($dir)) {
	        while (($topFile = readdir($top)) !== false) {
	        	/* Check the last 8 characters of the filename for a match of .top.php */
	        	if (substr($topFile, -8) == '.top.php') {
	        		/* Create the list entry for the file */
	        		echo "<li class-'has-subs'>";
	        		$fullLength = strlen($topFile);
					$nameLength = $fullLength - 8;
	    	        echo "<a href='?ext=" . substr($topFile, 0, -8) . "&top'>" . ucfirst(str_replace('_', ' ', substr($topFile, 0, -8))) . "</a>";
					/* integer starts at 0 before counting */
				    $i = 0;
					/* Check to see if the .top.php extension file has any .sub.php files */
				    if ($countSubs = opendir($dir)) {
				        while (($file = readdir($countSubs)) !== false){
				            if (substr($file, -8) == '.sub.php' && substr($file, 0, $nameLength) == substr($topFile, 0, -8)) {
				                $i++;
							}
				        }
				    }
					/* If there are .sub.php files to be listed create a new list underneath */
				    if ($i != '0') {
						echo "<ul>";
						/* Open the directory */
					    if ($sub = opendir($dir)) {
					        while (($subFile = readdir($sub)) !== false) {
					        	/* Check the last 8 characters of the filename for a match of .sub.php */
					        	if (substr($subFile, -8) == '.sub.php' && substr($subFile, 0, $nameLength) == substr($topFile, 0, -8)) {
					        		$nameLength1 = $nameLength + 1;
					    	        echo "<li class='has-subs'><a href='?ext=".substr($topFile, 0, -8)."&sub=".substr($subFile, $nameLength1, -8)."'>" . ucfirst(str_replace('_', ' ', substr($subFile, $nameLength1, -8))) . "</a></li>";
								}
					        }
					        closedir($sub);
					    }
						/* Close the UL */
						echo "</ul>";
					}
					/* Close the list */
					echo "</li>";
				}
	        }
	        closedir($top);
	    }
	}
	/* Close the UL */
	echo '</ul>';
}
require('includes/foot.php'); ?>