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

/* Create the menu list */

if(basename(__FILE__) == basename($_SERVER['PHP_SELF'])){
    header("Location: ../");
}
?>
<div id="cssmenu">
	<ul>
		<?php
		/* Query the database for pages with a menu position of top */
		$answer = $bdd->query('SELECT type, linkText, externalURL, destination FROM pages WHERE menu = \'top\' ORDER BY sort, linkText');
			while ($data = $answer->fetch())
			{
				$countSub = $bdd->prepare("SELECT * FROM pages WHERE menu = :page");
				$countSub->bindParam(':page', $data['linkText']);
				$countSub->execute();
				$subs = $countSub->rowCount();
				/* Set the mode to form */
				/* Replace '_' with ' ' from the page name */
				$link_ = str_replace(' ', '_', $data['linkText']);
				/* If the page is a local page */
				if ($data['type']=='local') {
					/* Check if SEO URL's are enabled */
					if ($seo == '1') {
						if ($subs == '0') {
							/* Create the menu entry */
							echo "<li ><a href='$link_.html'><span>" . $data['linkText'] . "</span></a>";
						} else {
							echo "<li class='has-sub'><a href='$link_.html'><span>" . $data['linkText'] . "</span></a>";
						}
					/* If SEO URL's are disabled */
					} else {
						if ($subs == '0') {
							/* Create the menu entry */
							echo "<li ><a href='?page=$link_'><span>" . $data['linkText'] . "</span></a>";
						} else {
							echo "<li class='has-sub'><a href='?page=$link_'><span>" . $data['linkText'] . "</span></a>";
						}
						/* Create the menu entry */
					}
				/* If the page is an external link */
				} elseif ($data['type'=='external']) {
					if ($subs == '0') {
						/* Create the menu entry */
						echo "<li><a href='" . $data['externalURL'] . "' target='" . $data['destination'] . "'><span>" . $data['linkText'] . "</span></a>";
					} else {
						echo "<li class='has-sub'><a href='" . $data['externalURL'] . "' target='" . $data['destination'] . "'><span>" . $data['linkText'] . "</span></a>";
					}
				}
				echo "<ul>";
				/* Query the database for pages with a menu position below the page listed above */
				$answer2 = $bdd->prepare('SELECT type, linkText, externalURL, destination FROM pages WHERE menu = ? ORDER BY sort, linkText');
				$answer2->execute(array($data['linkText']));
				while ($data2 = $answer2->fetch())
				{
					$countSub = $bdd->prepare("SELECT * FROM pages WHERE menu = :page");
					$countSub->bindParam(':page', $data2['linkText']);
					$countSub->execute();
					$subs = $countSub->rowCount();					/* Replace '_' with ' ' from the page name */
					$sub_ = str_replace(' ', '_', $data2['linkText']);
					/* If the page is a local page */
					if ($data2['type']=='local') {
						/* Check if SEO URL's are enabled */
						if ($seo == '1') {
							if ($subs == '0') {
								/* Create the menu entry */
								echo "<li ><a href='$sub_.html'><span>" . $data2['linkText'] . "</span></a>";
							} else {
								echo "<li class='has-sub'><a href='$sub_.html'><span>" . $data2['linkText'] . "</span></a>";
							}
						/* If SEO URL's are disabled */
						} else {
							if ($subs == '0') {
								/* Create the menu entry */
								echo "<li ><a href='?page=$sub_'><span>" . $data2['linkText'] . "</span></a>";
							} else {
								echo "<li class='has-sub'><a href='?page=$sub_'><span>" . $data2['linkText'] . "</span></a>";
							}
						}
					/* If the page is an external link */
					} elseif ($data2['type'=='external']) {
						if ($subs == '0') {
							/* Create the menu entry */
							echo "<li ><a href='" . $data2['externalURL'] . "' target='" . $data2['destination'] . "'><span>" . $data2['linkText'] . "</span></a>";
						} else {
							echo "<li class='has-sub'><a href='" . $data2['externalURL'] . "' target='" . $data2['destination'] . "'><span>" . $data2['linkText'] . "</span></a>";
						}
					}
				}
				echo "</ul>";
				echo "</li>";
				/* Close the database connection for the sub menu */
				$answer2->closeCursor();
			}
			/* Close the database connection for the top menu */
			$answer->closeCursor();
            if ($users == '1') {
                if ($sessionUser == '') {
                    if ($seo == '1') {
                        echo "<li class='has-sub'><a>Accounts</a>";
                        echo "<ul><li><a href='!Accounts-login.html'>Log in</li>";
                        echo "<li><a href='!Accounts-register.html'>Register</a></li></ul>";
                        echo "</li>";
                    } else {
                        echo "<li class='has-sub'><a>Accounts</a>";
                        echo "<ul><li><a href='?page=!Accounts&mode=login'>Login</li>";
                        echo "<li><a href='?page=!Accounts&mode=register'>Register</a></li></ul>";
                        echo "</li>";
                    }
                } else {
                    if ($seo == '1') {
                        echo "<li class='has-sub'><a href='!Accounts-my_account.html'>My Account</a>";
                        echo "<ul><li><a href='!Accounts-logout.html'>Log out</a></li></ul>";
                        echo "</li>";
                    } else {
                        echo "<li class='has-sub'><a href='?page=!Accounts&mode=my_account'>My Account</a>";
                        echo "<ul><li><a href='?page=!Accounts&mode=logout'>Log out</a></li></ul>";
                        echo "</li>";
                    } 
                }
            }
		?>
	</ul>
</div>