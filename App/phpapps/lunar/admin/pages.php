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
/* Check if a page is to be deleted, if so display a confirmation message */
if (isset($_GET["del"])) {
	$del_ = $_GET['del'];
	$del = str_replace('_', ' ', $del_);
    echo "<div class='notification'><strong>Are you sure you want to permenantly delete '$del'? <a href='pages_delete.php?page=$del_'>Click here to confirm</a>.</strong></div>";    
	echo "<br>";
}
/* Check if a page is to be set as the home page */
if (isset($_GET["setHome"])) {
	$setHome = $_GET['setHome'];
	$updateHompage = "UPDATE settings SET homepage=? WHERE id='1'";
	$queryHomepage = $bdd->prepare($updateHompage);
	$queryHomepage->execute(array($setHome));			/* submit the form */
	$queryHomepage->CloseCursor();
    echo "<div class='notification'><strong>'$setHome' has been set to the homepage.</strong></div>";    
	echo "<br>";
	$queryHomepage->closeCursor();
	$settings = $bdd->query('SELECT homepage FROM settings WHERE id = 1');
	while ($sitesettings = $settings->fetch())
	{
		$homepage = $sitesettings['homepage'];
	}
	$settings->closeCursor();
}
/* If a page has been deleted show a confirmation message */
if (isset($_GET["gone"])) {
	$del_ = $_GET['gone'];
	$del = str_replace('_', ' ', $del_);
    echo "<div class='notification'><strong>'$del' has been permenantly deleted.</strong></div>";    
	echo "<br>";
}
?>
<strong><a href="pages_new.php">Create a new page</a></strong><br /><br />
<table width="100%" cellspacing='0' cellpadding='3px'>
	<tr>
		<td>&nbsp;</td>
		<td>Page/Link</td>
		<td>Extension</td>
		<td>Sort Order</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td width="25px">&nbsp;</td>
	</tr>
	<?php
	/* Set the table row background color */
	$color="#cce0ff";
	/* Load the page information from the database where the page is in the top of the menu */
	$answer = $bdd->query('SELECT type, linkText, extension, externalURL, sort FROM pages WHERE menu = \'top\' ORDER BY sort, linkText');
	while ($data = $answer->fetch()) {
		$link_ = str_replace(' ', '_', $data['linkText']);
		/* Start a new table row for each page */
		echo "<tr bgcolor='$color'>";
		echo "<td>";
		/* Check if the page is a local page or an external link, then display the relevant icon */
		if ($data['type'] == 'local') {
		  	echo "<img src='img/page.png' alt='Page' title='Local page' />";
	  	} elseif ($data['type'] == 'external') {
	  		echo "<img src='img/link.png' alt='External' title='External link' />";
	  	}
	  	echo "</td>";
	  	echo "<td>";
		/* Show the linkText */
	  	echo $data['linkText'];
	  	echo "</td>";
	  	echo "<td>";
		/* Check if the page has an extension */
	  	if ($data['extension'] == '') {
	  		echo "--";
		} else {
	  		echo str_replace('_', ' ', ucfirst($data['extension']));
	  	}
	  	echo "</td>";
	  	echo "<td>" . $data['sort'] . "</td>";
		/* Check if the page is the homepage, if so show the home icon, if not show a link to set the page to the homepage */
		if($data['linkText'] == $homepage) {
			echo "<td><img src='img/home.png' title='Home Page' /></td>";
		} else {
			/* Check if the page is local or external, so an external page can't be set to home */
			if ($data['type'] == 'local') {
				echo "<td><a href='pages.php?setHome=" . $data['linkText'] . "'><img src='img/use.png' title='Set " . $data['linkText'] . " to your homepage.' /></a></td>";
	  		} elseif ($data['type'] == 'external') {
				echo "<td></a></td>";
	  		}
		}
		/* Check if the page is local or external, then show an edit page or edit link */
		if ($data['type']=='local') {
			echo "<td><a href='pages_edit.php?page=" . $link_ . "'><img src='img/edit.png' alt='Edit' title='Edit page' /></a></td>";
		} elseif ($data['type']=='external') {
			echo "<td><a href='links_edit.php?link=" . $link_ . "'><img src='img/edit.png' alt='Edit' title='Edit link' /></a></td>";
		}
		/* Check if the page is the homepage, if not show a link to delete the page */
		if($data['linkText'] == $homepage) {
			echo "<td></td>";
		} else {
			echo "<td><a href='pages.php?del=" . $link_ . "'><img src='img/delete.png' alt='Delete' title='Delete page' /></a></td>";
		}
		/* Close the table row */
		echo "</tr>";
		/* Load the page information from the database where the menu position is below the above page */
		$answer2 = $bdd->prepare('SELECT type, linkText, extension, externalURL, sort FROM pages WHERE menu = ? ORDER BY sort, linkText');
  		$answer2->execute(array($data['linkText']));
  		while ($data2 = $answer2->fetch()) {
  			/* Alternate the table row background color */
			if ($color=="#cce0ff") {
				$color="#FFFFFF";
			} else {
				$color="#cce0ff";
			}
			$link_ = str_replace(' ', '_', $data2['linkText']);
			/* Start a new table row for each sub page */
			echo "<tr bgcolor='$color'>";
			echo "<td>";
			/* Check if the page is local or external, then display the relevant icon */
			if ($data2['type'] == 'local') {
			  	echo "<img src='img/page.png' alt='Page' title='Local page' />";
		  	} elseif ($data2['type'] == 'external') {
		  		echo "<img src='img/link.png' alt='External' title='External link' />";
		  	}
		  	echo "</td>";
		  	echo "<td>";
			/* Show the page name with a '--' before to show that it is a sub */
	  		echo '-- ' . $data2['linkText'];
		  	echo "</td>";
		  	echo "<td>";
			/* Show the extension that is associated to the page */
		  	if ($data2['extension'] == '') {
		  		echo "--";
			} else {
		  		echo str_replace('_', ' ', ucfirst($data2['extension']));
		  	}
		  	echo "</td>";
		  	echo "<td>" . $data2['sort'] . "</td>";
			/* Check if the page is the homepage, if so show the home icon, if not show a link to set it to the homepage */
			if($data2['linkText'] == $homepage) {
				echo "<td><img src='img/home.png' title='Home Page' /></td>";
			} else {
				/* Check if the page is local or external, if the page is local show a link to set it to the homepage */
				if ($data2['type']=='local') {
					echo "<td><a href='pages.php?setHome=" . $data2['linkText'] . "'><img src='img/use.png' title='Set " . $data2['linkText'] . " to your homepage.' /></a></td>";
				} elseif ($data2['type']=='external') {
					echo "<td></td>";
				}
			}
			/* Check if the page is local or external, then show the relevant link to edit it */
			if ($data2['type']=='local') {
				echo "<td><a href='pages_edit.php?page=" . $link_ . "'><img src='img/edit.png' alt='Edit' title='Edit page' /></a></td>";
			} elseif ($data2['type']=='external') {
				echo "<td><a href='links_edit.php?link=" . $link_ . "'><img src='img/edit.png' alt='Edit' title='Edit link' /></a></td>";
			}
			/* Check if the page is the homepage, if not show a link to delete it */
			if($data2['linkText'] == $homepage) {
				echo "<td></td>";
			} else {
				echo "<td><a href='pages.php?del=" . $link_ . "'><img src='img/delete.png' alt='Delete' title='Delete page' /></a></td>";
			}
			/* Close the table row */
			echo "</tr>";
  		}
  		/* Close the sub page db connection */
		$answer2->closeCursor();
		/* Alternate the table row background color */
		if ($color=="#cce0ff") {
			$color="#FFFFFF";
		} else {
			$color="#cce0ff";
		}
	}
	/* Close the top level page db connection */
    $answer = $bdd->query('SELECT type, linkText, extension, externalURL, sort FROM pages WHERE menu = \'\' ORDER BY sort, linkText');
    while ($data = $answer->fetch()) {
        $link_ = str_replace(' ', '_', $data['linkText']);
        /* Start a new table row for each page */
        echo "<tr bgcolor='$color'>";
        echo "<td>";
        /* Check if the page is a local page or an external link, then display the relevant icon */
        if ($data['type'] == 'local') {
            echo "<img src='img/page.png' alt='Page' title='Local page' />";
        } elseif ($data['type'] == 'external') {
            echo "<img src='img/link.png' alt='External' title='External link' />";
        }
        echo "</td>";
        echo "<td>";
        /* Show the linkText */
        echo $data['linkText'] . ' <sup>(Hidden)</sup>';
        echo "</td>";
        echo "<td>";
        /* Check if the page has an extension */
        if ($data['extension'] == '') {
            echo "--";
        } else {
            echo str_replace('_', ' ', ucfirst($data['extension']));
        }
        echo "</td>";
        echo "<td>" . $data['sort'] . "</td>";
        /* Check if the page is the homepage, if so show the home icon, if not show a link to set the page to the homepage */
        if($data['linkText'] == $homepage) {
            echo "<td><img src='img/home.png' title='Home Page' /></td>";
        } else {
            /* Check if the page is local or external, so an external page can't be set to home */
            if ($data['type'] == 'local') {
                echo "<td><a href='pages.php?setHome=" . $data['linkText'] . "'><img src='img/use.png' title='Set " . $data['linkText'] . " to your homepage.' /></a></td>";
            } elseif ($data['type'] == 'external') {
                echo "<td></a></td>";
            }
        }
        /* Check if the page is local or external, then show an edit page or edit link */
        if ($data['type']=='local') {
            echo "<td><a href='pages_edit.php?page=" . $link_ . "'><img src='img/edit.png' alt='Edit' title='Edit page' /></a></td>";
        } elseif ($data['type']=='external') {
            echo "<td><a href='links_edit.php?link=" . $link_ . "'><img src='img/edit.png' alt='Edit' title='Edit link' /></a></td>";
        }
        /* Check if the page is the homepage, if not show a link to delete the page */
        if($data['linkText'] == $homepage) {
            echo "<td></td>";
        } else {
            echo "<td><a href='pages.php?del=" . $link_ . "'><img src='img/delete.png' alt='Delete' title='Delete page' /></a></td>";
        }
        /* Close the table row */
        echo "</tr>";
        /* Load the page information from the database where the menu position is below the above page */
        $answer2 = $bdd->prepare('SELECT type, linkText, extension, externalURL, sort FROM pages WHERE menu = ? ORDER BY sort, linkText');
        $answer2->execute(array($data['linkText']));
        while ($data2 = $answer2->fetch()) {
            /* Alternate the table row background color */
            if ($color=="#cce0ff") {
                $color="#FFFFFF";
            } else {
                $color="#cce0ff";
            }
            $link_ = str_replace(' ', '_', $data2['linkText']);
            /* Start a new table row for each sub page */
            echo "<tr bgcolor='$color'>";
            echo "<td>";
            /* Check if the page is local or external, then display the relevant icon */
            if ($data2['type'] == 'local') {
                echo "<img src='img/page.png' alt='Page' title='Local page' />";
            } elseif ($data2['type'] == 'external') {
                echo "<img src='img/link.png' alt='External' title='External link' />";
            }
            echo "</td>";
            echo "<td>";
            /* Show the page name with a '--' before to show that it is a sub */
            echo '-- ' . $data2['linkText'] . ' <sup>(Hidden)</sup>';
            echo "</td>";
            echo "<td>";
            /* Show the extension that is associated to the page */
            if ($data2['extension'] == '') {
                echo "--";
            } else {
                echo str_replace('_', ' ', ucfirst($data2['extension']));
            }
            echo "</td>";
            echo "<td>" . $data2['sort'] . "</td>";
            /* Check if the page is the homepage, if so show the home icon, if not show a link to set it to the homepage */
            if($data2['linkText'] == $homepage) {
                echo "<td><img src='img/home.png' title='Home Page' /></td>";
            } else {
                /* Check if the page is local or external, if the page is local show a link to set it to the homepage */
                if ($data2['type']=='local') {
                    echo "<td><a href='pages.php?setHome=" . $data2['linkText'] . "'><img src='img/use.png' title='Set " . $data2['linkText'] . " to your homepage.' /></a></td>";
                } elseif ($data2['type']=='external') {
                    echo "<td></td>";
                }
            }
            /* Check if the page is local or external, then show the relevant link to edit it */
            if ($data2['type']=='local') {
                echo "<td><a href='pages_edit.php?page=" . $link_ . "'><img src='img/edit.png' alt='Edit' title='Edit page' /></a></td>";
            } elseif ($data2['type']=='external') {
                echo "<td><a href='links_edit.php?link=" . $link_ . "'><img src='img/edit.png' alt='Edit' title='Edit link' /></a></td>";
            }
            /* Check if the page is the homepage, if not show a link to delete it */
            if($data2['linkText'] == $homepage) {
                echo "<td></td>";
            } else {
                echo "<td><a href='pages.php?del=" . $link_ . "'><img src='img/delete.png' alt='Delete' title='Delete page' /></a></td>";
            }
            /* Close the table row */
            echo "</tr>";
        }
        /* Close the sub page db connection */
        $answer2->closeCursor();
        /* Alternate the table row background color */
        if ($color=="#cce0ff") {
            $color="#FFFFFF";
        } else {
            $color="#cce0ff";
        }
    };
	?>
</table>
<?php require('includes/foot.php'); ?>