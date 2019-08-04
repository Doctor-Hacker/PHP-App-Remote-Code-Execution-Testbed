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
/* Check if the month and day are set */
if(isset($_GET['month']) && is_numeric($_GET['month']) && isset($_GET['day']) && is_numeric($_GET['day'])) {
	/* Generate the stats for the chosen day */
	/* set the $_GET values to variables */
	$month = $_GET['month'];
	$day = $_GET['day'];
	/* Get the last 2 digits of the 6 digit month <YYYYMM> to give a 2 digit month number and translate that into the full month name */
	if(substr($month, -2) == '01') {
		$theMonth = 'January';
	}
	if(substr($month, -2) == '02') {
		$theMonth = 'February';
	}
	if(substr($month, -2) == '03') {
		$theMonth = 'March';
	}
	if(substr($month, -2) == '04') {
		$theMonth = 'April';
	}
	if(substr($month, -2) == '05') {
		$theMonth = 'May';
	}
	if(substr($month, -2) == '06') {
		$theMonth = 'June';
	}
	if(substr($month, -2) == '07') {
		$theMonth = 'July';
	}
	if(substr($month, -2) == '08') {
		$theMonth = 'August';
	}
	if(substr($month, -2) == '09') {
		$theMonth = 'September';
	}
	if(substr($month, -2) == '10') {
		$theMonth = 'October';
	}
	if(substr($month, -2) == '11') {
		$theMonth = 'November';
	}
	if(substr($month, -2) == '12') {
		$theMonth = 'December';
	}
	/* Get the total number of rows in the stats table for the specified day */
	$totalHits = $bdd->query("select count(*) from stats WHERE month = $month and day = $day")->fetchColumn();
	/* Check if detailed stats are to be displayed for the browser information */
	if(isset($_GET['detailed']) && ($_GET['detailed']=='browser')) {
		/* Start of browsers detailed day */
		/* Generate the breadcrumb */
		echo '<strong><a href="visitor_stats.php">Stats</a> >> <a href="?month=' . $month . '">' . $theMonth . ' ' . substr($month, 0, -2);
		echo '</a> >> <a href="?month=' . $month . '&day=' . $day . '">' . $day . '</a> >> Browser Information</strong>';
		echo '<br><br>';
		/* Generate the table header */
		echo '<table id="browser" width="100%" cellspacing="0" cellpadding="3px" frame="box" style="border-color: #424242; border-width: 3px;">';
			echo '<tr>';
				echo '<td width="200px">Browser</td>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td width="75px" align="right">Hits</td>';
			echo '<tr>';
			/* Work out the largest number of a given browser */
			$highest = $bdd->query("SELECT MAX(browser_occurs) FROM (SELECT `version`, COUNT(*) AS browser_occurs FROM stats WHERE month = $month AND day = $day GROUP BY `version`) Sub1")->fetchColumn();
			/* Set the background color for the table row */
			$color="#ebeff5";
			/* Query the database for browser information for the requested day */
			$browser = $bdd->query("SELECT browser, version, COUNT( version ) AS counted FROM stats WHERE month = $month AND day = $day GROUP BY version ORDER BY counted DESC");
			while ($statsBrowser = $browser->fetch())	
			{
				/* Set the browserImage to blank incase no image is set */
				$browserImage = '';
				/* For each browser that can be listed from the stats script set the thumbnail image */
				if ($statsBrowser['browser'] == 'Google Chrome') {
					$browserImage = '<img src="img/chrome.png" title="Google Chrome" />';
				}
				if ($statsBrowser['browser'] == 'Internet Explorer') {
					$browserImage = '<img src="img/ie.png" title="Internet Explorer" />';
				}
				if ($statsBrowser['browser'] == 'Mozilla Firefox') {
					$browserImage = '<img src="img/firefox.png" title="Mozilla Firefox" />';
				}
				if ($statsBrowser['browser'] == 'Apple Safari') {
					$browserImage = '<img src="img/safari.png" title="Apple Safari" />';
				}
				if ($statsBrowser['browser'] == 'Opera') {
					$browserImage = '<img src="img/opera.png" title="Opera" />';
				}
				if ($statsBrowser['browser'] == 'Netscape') {
					$browserImage = '<img src="img/netscape.png" title="Netscape" />';
				}
				if ($statsBrowser['browser'] == 'Unknown') {
					$browserImage = '<img src="img/unknown.png" title="Unknown browser" />';
				}
				/* Start a new row for each row returned */
				echo '<tr height="25px">';
					/* Insert the browser image into the first column */
					echo '<td bgcolor="' . $color . '">' . $browserImage . ' ' . $statsBrowser['version'] . '</td>';
					/* Work out the percentage that the browser version has been used */
					$percentage = $statsBrowser['counted'] / $totalHits * 100;
					/* Insert the percentage into the second column */
					echo '<td bgcolor="' . $color . '" align="right" width="50px">' . round($percentage, 1) . '%</td>';
					/* Work out the image percentage for each browser version, this enables the most used browser to give a bar of 100% */
					$imagePercent = $statsBrowser['counted'] / $highest * 100;
					/* Create a div in the third column the width of the required percentage bar */
					echo '<td bgcolor="' . $color . '"><div style="height:25px; width:' . $imagePercent . '%; background:#424242;"></div></td>';
					/* Enter the total number of records for each browser (hits) into the fourth column */
					echo '<td bgcolor="' . $color . '" align="right">' . $statsBrowser['counted'] . '</td>';
					/* Check which color the background is set to, then change it to the alternate color to enable the results to be read with ease */
					if ($color=="#ebeff5") {
						$color="#FFFFFF";
					} else {
						$color="#ebeff5";
					}
				/* Close the table row for each row returned */
				echo '</tr>';
			}
			/* Generate the bottom of the table */
			echo '<tr>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td align="right">Total:</td>';
				echo '<td align="right">' . $totalHits . '</td>';
			echo '</tr>';
		echo '</table>';
		/* End of browsers detailed day*/
	/* Check if detailed stats are to be displayed for the IP information */
	} elseif (isset($_GET['detailed']) && $_GET['detailed']=='ip') {
		/* Start of IP detailed day*/
		/* Generate the breadcrumb */
		echo '<strong><a href="visitor_stats.php">Stats</a> >> <a href="?month=' . $month . '">' . $theMonth . ' ' . substr($month, 0, -2);
		echo '</a> >> <a href="?month=' . $month . '&day=' . $day . '">' . $day . '</a> >> All IP Address\'</strong>';
		echo '<br><br>';
		/* Generate the table headder */
		echo '<table id="ip" width="100%" cellspacing="0" cellpadding="3px" frame="box" style="border-color: #424242; border-width: 3px;">';
			echo '<tr>';
				echo '<td colspan="4" width="150px">IP Address</td>';
				echo '<td width="75px" align="right">Hits</td>';
			echo '</tr>';
			/* Work out the largest number of a given IP */
			$highest = $bdd->query("SELECT MAX(ip_occurs) FROM (SELECT `ip`, COUNT(*) AS ip_occurs FROM stats WHERE month = $month AND day = $day GROUP BY `ip`) Sub1")->fetchColumn();
			/* Set the background color for the table row */
			$color="#ebeff5";
			/* Query the database for IP information for the requested day */
			$ip = $bdd->query("SELECT ip, COUNT( ip ) AS counted FROM stats WHERE month = $month AND day = $day GROUP BY ip ORDER BY counted DESC");
			while ($statsIP = $ip->fetch())	
			{
				/* Start a new row for each row returned */
				echo '<tr height="25px">';
					/* Insert the IP address into the first column */
					echo '<td bgcolor="' . $color . '" width="150px">' . $statsIP['ip'] . '</td>';
					/* Work out the percentage that the IP address has been used */
					$percentage = $statsIP['counted'] / $totalHits * 100;
					/* Insert the percentage into the second column */
					echo '<td bgcolor="' . $color . '" align="right" width="50px">' . round($percentage, 1) . '%</td>';
					/* Work out the image percentage for each Ip address, this enables the most used IP address to give a bar of 100% */
					$imagePercent = $statsIP['counted'] / $highest * 100;
					/* Create a div in the third column the width of the required percentage bar */
					echo '<td bgcolor="' . $color . '"><div style="height:25px; width:' . $imagePercent . '%; background:#424242;"></div></td>';
					/* Insert an image of the country flag into the fourth column using the hostip.info API */
					echo '<td bgcolor="' . $color . '" width="35px"><IMG SRC="http://api.hostip.info/flag.php?ip=' . $statsIP['ip'] . '" title="IP address lookup by HostIP" ALT="IP Address Lookup by HostIP.info" height="25px" width="35px"></td>';
					/* Enter the total number of records for each IP address (hits) into the fifth column */
					echo '<td bgcolor="' . $color . '" align="right">' . $statsIP['counted'] . '</td>';
					/* Check which color the background is set to, then change it to the alternate color to enable the results to be read with ease */
					if ($color=="#ebeff5") {
						$color="#FFFFFF";
					} else {
						$color="#ebeff5";
					}
				/* Close the table row for each row returned */
				echo '</tr>';
			}
			/* Generate the bottom of the table */
			echo '<tr>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td align="right">Total:</td>';
				echo '<td align="right">' . $totalHits . '</td>';
			echo '</tr>';
		echo '</table>';
		/* End of IP */
	} else {
		/* Start of hours */
		/* Generate the breadcrumb */
		echo '<strong><a href="visitor_stats.php">Stats</a> >> <a href="?month=' . $month . '">' . $theMonth . ' ' . substr($month, 0, -2);
		echo '</a> >> ' . $day . '</strong>';
		echo '<br><br>';
		/* Generate the table header */
		echo '<table id="hours" width="100%" cellspacing="0" cellpadding="3px" frame="box" style="border-color: #424242; border-width: 3px;">';
			echo '<tr>';
				echo '<td width="150px">Hour Range</td>';
				echo '<td width="50px"></td>';
				echo '<td></td>';
				echo '<td width="75px" align="right">Hits</td>';
			echo '</tr>';
			/* Work out the largest number of times an hour has been used in the database */
			$highest = $bdd->query("SELECT MAX(hour_occurs) FROM (SELECT `hour`, COUNT(*) AS hour_occurs FROM stats WHERE month = $month AND day = $day GROUP BY `hour`) Sub1")->fetchColumn();
			/* Set the background color for the table row */
			$color="#ebeff5";
			/* Query the database for the hour information for the requested day */
			$hour = $bdd->query("SELECT hour, COUNT( hour ) AS counted FROM stats WHERE month = $month AND day = $day GROUP BY hour ORDER BY hour");
			while ($statsHour = $hour->fetch())	
			{
				/* Set the hour range so instead of displaying '10', '10:00 - 10:59' is displayed */
				if ($statsHour['hour'] == '00') {
					$hourRange = '00:00 - 00:59';
				}
				if ($statsHour['hour'] == '01') {
					$hourRange = '01:00 - 01:59';
				}
				if ($statsHour['hour'] == '02') {
					$hourRange = '02:00 - 02:59';
				}
				if ($statsHour['hour'] == '03') {
					$hourRange = '03:00 - 03:59';
				}
				if ($statsHour['hour'] == '04') {
					$hourRange = '04:00 - 04:59';
				}
				if ($statsHour['hour'] == '05') {
					$hourRange = '05:00 - 05:59';
				}
				if ($statsHour['hour'] == '06') {
					$hourRange = '06:00 - 06:59';
				}
				if ($statsHour['hour'] == '07') {
					$hourRange = '07:00 - 07:59';
				}
				if ($statsHour['hour'] == '08') {
					$hourRange = '08:00 - 08:59';
				}
				if ($statsHour['hour'] == '09') {
					$hourRange = '09:00 - 09:59';
				}
				if ($statsHour['hour'] == '10') {
					$hourRange = '10:00 - 10:59';
				}
				if ($statsHour['hour'] == '11') {
					$hourRange = '11:00 - 1:59';
				}
				if ($statsHour['hour'] == '12') {
					$hourRange = '12:00 - 12:59';
				}
				if ($statsHour['hour'] == '13') {
					$hourRange = '13:00 - 13:59';
				}
				if ($statsHour['hour'] == '14') {
					$hourRange = '14:00 - 14:59';
				}
				if ($statsHour['hour'] == '15') {
					$hourRange = '15:00 - 15:59';
				}
				if ($statsHour['hour'] == '16') {
					$hourRange = '16:00 - 16:59';
				}
				if ($statsHour['hour'] == '17') {
					$hourRange = '17:00 - 17:59';
				}
				if ($statsHour['hour'] == '18') {
					$hourRange = '18:00 - 18:59';
				}
				if ($statsHour['hour'] == '19') {
					$hourRange = '19:00 - 19:59';
				}
				if ($statsHour['hour'] == '20') {
					$hourRange = '20:00 - 20:59';
				}
				if ($statsHour['hour'] == '21') {
					$hourRange = '21:00 - 21:59';
				}
				if ($statsHour['hour'] == '22') {
					$hourRange = '22:00 - 22:59';
				}
				if ($statsHour['hour'] == '23') {
					$hourRange = '23:00 - 23:59';
				}
				/* Start a new row for each row returned */
				echo '<tr height="25px">';
					/* Insert the hour range into the first column */
					echo '<td bgcolor="' . $color . '">' . $hourRange . '</td>';
					/* Work out the percentage that the hour range has been used */
					$percentage = $statsHour['counted'] / $totalHits * 100;
					/* Insert the percentage into the second column */
					echo '<td bgcolor="' . $color . '" align="right">' . round($percentage, 1) . '%</td>';
					/* Work out the image percentage for each hour returned, this enables the most used hour range to give a bar of 100% */
					$imagePercent = $statsHour['counted'] / $highest * 100;
					/* Create a div in the third column the width of the requred percentage bar */
					echo '<td bgcolor="' . $color . '"><div style="height:25px; width:' . $imagePercent . '%; background:#424242;"></div></td>';
					/* Enter the total number of records for each hour range (hits) into the fourth column */
					echo '<td bgcolor="' . $color . '" align="right">' . $statsHour['counted'] . '</td>';
					/* Chek which color the background is set to, then change it to the alternate color to enable the results to be read with ease */
					if ($color=="#ebeff5") {
						$color="#FFFFFF";
					} else {
						$color="#ebeff5";
					}
				/* Close the table row for each result returned */
				echo '</tr>';
			}
			/* Generate the bottom of the table */
			echo '<tr>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td align="right">Total:</td>';
				echo '<td align="right">' . $totalHits . '</td>';
			echo '</tr>';
		echo '</table>';
		/* End of hours */
		echo '<br><br>';
		/* Start of pages */
		echo '<table id="pages" width="100%" cellspacing="0" cellpadding="3px" frame="box" style="border-color: #424242; border-width: 3px;">';
			echo '<tr>';
				echo '<td width="150px">Page</td>';
				echo '<td width="50px"></td>';
				echo '<td></td>';
				echo '<td width="75px" align="right">Hits</td>';
			echo '</tr>';
			/* Work out the largest number of a given page */
			$highest = $bdd->query("SELECT MAX(page_occurs) FROM (SELECT `page`, COUNT(*) AS page_occurs FROM stats WHERE month = $month and day = $day GROUP BY `page`) Sub1")->fetchColumn();
			/* Set the background color for the table row */
			$color="#ebeff5";
			/* Query the database for the page information for the requested day */
			$page = $bdd->query("SELECT page, COUNT( page ) AS counted FROM stats WHERE month = $month and day = $day GROUP BY page ORDER BY counted DESC");
			while ($statsPage = $page->fetch())	
			{
				/* Start a new row for each row returned */
				echo '<tr height="25px">';
					/* Insert the page name i.e '/Home.html' or '?page=Home' into the first column */
					echo '<td bgcolor="' . $color . '">' . $statsPage['page'] . '</td>';
					/* Work out the percentage that the page has been used */
					$percentage = $statsPage['counted'] / $totalHits * 100;
					/* Insert the percentage into the second column */
					echo '<td bgcolor="' . $color . '" align="right">' . round($percentage, 1) . '%</td>';
					/* Work out the image percentage for each page, this enables the most used page to give a bar of 100% */
					$imagePercent = $statsPage['counted'] / $highest * 100;
					/* Create a div in the third coumn the width of the required percentage bar */
					echo '<td bgcolor="' . $color . '"><div style="height:25px; width:' . $imagePercent . '%; background:#424242;"></div></td>';
					/* Enter the total number of records for each page (hits) into the fourth column */
					echo '<td bgcolor="' . $color . '" align="right">' . $statsPage['counted'] . '</td>';
					/* Check which color the background is set to, then change it to the alternate color to enable the results to be read with ease */
					if ($color=="#ebeff5") {
						$color="#FFFFFF";
					} else {
						$color="#ebeff5";
					}
				/* Close the table for each row returned */
				echo '</tr>';
			}
			/* Generate the bottom of the table */
			echo '<tr>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td align="right">Total:</td>';
				echo '<td align="right">' . $totalHits . '</td>';
			echo '</tr>';
		echo '</table>';
		/* End of pages */
		echo '<br><br>';
		/* Start of IP */
		/* Generate the table headers */
		echo '<table id="pages" width="100%" cellspacing="0" cellpadding="3px" frame="box" style="border-color: #424242; border-width: 3px;">';
			echo '<tr>';
				echo '<td colspan="4" width="150px">Top 10 IP Address\' (<a href="?month=' . $month . '&day=' . $day . '&detailed=ip">View all</a>)</td>';
				echo '<td width="75px" align="right">Hits</td>';
			echo '</tr>';
			/* Work out the largest number of a given IP */
			$highest = $bdd->query("SELECT MAX(ip_occurs) FROM (SELECT `ip`, COUNT(*) AS ip_occurs FROM stats WHERE month = $month AND day = $day GROUP BY `ip`) Sub1")->fetchColumn();
			/* Set the background color for the table row */
			$color="#ebeff5";
			/* Query the database for IP information for the requested day, limiting the results to 10 */
			$ip = $bdd->query("SELECT ip, COUNT( ip ) AS counted FROM stats WHERE month = $month AND day = $day GROUP BY ip ORDER BY counted DESC LIMIT 10");
			while ($statsIP = $ip->fetch())	
			{
				/* Start a new row for each row returned */
				echo '<tr height="25px">';
					/* Insert the IP address into the first column */
					echo '<td bgcolor="' . $color . '" width="150px">' . $statsIP['ip'] . '</td>';
					/* Work out the percentage that the IP has been used */
					$percentage = $statsIP['counted'] / $totalHits * 100;
					/* Insert the percentage into the second column */
					echo '<td bgcolor="' . $color . '" align="right" width="50px">' . round($percentage, 1) . '%</td>';
					/* Work out the image percentage for each IP , this enables the most used browser to give a bar of 100% */
					$imagePercent = $statsIP['counted'] / $highest * 100;
					/* Create a div in the third column the width of the required percentage bar */
					echo '<td bgcolor="' . $color . '"><div style="height:25px; width:' . $imagePercent . '%; background:#424242;"></div></td>';
					/* Insert an image of the country flag into the fourth column using the hostip.info API */
					echo '<td bgcolor="' . $color . '" width="35px"><IMG SRC="http://api.hostip.info/flag.php?ip=' . $statsIP['ip'] . '" title="IP address lookup by HostIP" ALT="IP Address Lookup by HostIP.info" height="25px" width="35px"></td>';
					/* Enter the total number of records for each IP (hits) into the fourth column */
					echo '<td bgcolor="' . $color . '" align="right">' . $statsIP['counted'] . '</td>';
					/* Check which color the background is set to, then change it to the alternate color to enable the results to be read with ease */
					if ($color=="#ebeff5") {
						$color="#FFFFFF";
					} else {
						$color="#ebeff5";
					}
				/* Close each table row returned */
				echo '</tr>';
			}
			/* Generate the bottom of the table */
			echo '<tr>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td align="right">Total:</td>';
				echo '<td align="right">' . $totalHits . '</td>';
			echo '</tr>';
		echo '</table>';
		/* End of IP */
		echo '<br><br>';
		/* Create a table with 2 columns to enable half size tables side by side */
		echo '<table width="100%" cellpadding="0" cellspacing="0">';
			echo '<tr valign="top">';
				echo '<td valign="top" width="50%">';
					/* Start of browsers */
					/* Generate the table headers */
					echo '<table id="browsers" width="98%" cellspacing="0" cellpadding="3px" frame="box" style="border-color: #424242; border-width: 3px;">';
						echo '<tr>';
							echo '<td colspan="3">Browser (<a href="?month=' . $month . '&day=' . $day . '&detailed=browser">Detailed information</a>)</td>';
							echo '<td width="75px" align="right">Hits</td>';
						echo '</tr>';
						/* Work out the largest number of a given browser */
						$highest = $bdd->query("SELECT MAX(browser_occurs) FROM (SELECT `browser`, COUNT(*) AS browser_occurs FROM stats WHERE month = $month AND day = $day GROUP BY `browser`) Sub1")->fetchColumn();
						/* Set the background color for the table row */
						$color="#ebeff5";
						/* Query the database for browser information for the requested day */
						$browser = $bdd->query("SELECT browser, COUNT( browser ) AS counted FROM stats WHERE month = $month AND day = $day GROUP BY browser ORDER BY counted DESC");
						while ($statsBrowser = $browser->fetch())	
						{
							/* Set the browserImage to blank incase no image is set */
							$browserImage = '';
							/* For each browser that can be listed from the stats script set the thumnail image */
							if ($statsBrowser['browser'] == 'Google Chrome') {
								$browserImage = '<img src="img/chrome.png" title="Google Chrome" />';
							}
							if ($statsBrowser['browser'] == 'Internet Explorer') {
								$browserImage = '<img src="img/ie.png" title="Internet Explorer" />';
							}
							if ($statsBrowser['browser'] == 'Mozilla Firefox') {
								$browserImage = '<img src="img/firefox.png" title="Mozilla Firefox" />';
							}
							if ($statsBrowser['browser'] == 'Apple Safari') {
								$browserImage = '<img src="img/safari.png" title="Apple Safari" />';
							}
							if ($statsBrowser['browser'] == 'Opera') {
								$browserImage = '<img src="img/opera.png" title="Opera" />';
							}
							if ($statsBrowser['browser'] == 'Netscape') {
								$browserImage = '<img src="img/netscape.png" title="Netscape" />';
							}
							if ($statsBrowser['browser'] == 'Unknown') {
								$browserImage = '<img src="img/unknown.png" title="Unknown browser" />';
							}
							/* Start a new row for each row returned */
							echo '<tr height="25px">';
								/* Insert the browser image into the first column */
								echo '<td bgcolor="' . $color . '" width="25px">' . $browserImage . '</td>';
								/* Work out the percentage that the browser has been used */
								$percentage = $statsBrowser['counted'] / $totalHits * 100;
								/* Insert the percentage into the second column */
								echo '<td bgcolor="' . $color . '" align="right" width="50px">' . round($percentage, 1) . '%</td>';
								/* Work out the image percentage for each browser version, this enables the most used browser to give a bar of 100% */
								$imagePercent = $statsBrowser['counted'] / $highest * 100;
								/* Create a div in the third column the width of the requred percentage bar */
								echo '<td bgcolor="' . $color . '"><div style="height:25px; width:' . $imagePercent . '%; background:#424242;"></div></td>';
								/* Enter the total number of records for each browser (hits) into the fourth column */
								echo '<td bgcolor="' . $color . '" align="right">' . $statsBrowser['counted'] . '</td>';
								/* Check which color the background is set to, then change it to the alternate color to enable the results to be read with ease */
								if ($color=="#ebeff5") {
									$color="#FFFFFF";
								} else {
									$color="#ebeff5";
								}
							/* Close the table row for each row returned */
							echo '</tr>';
						}
						/* Generate the bottom of the table */
						echo '<tr>';
							echo '<td></td>';
							echo '<td></td>';
							echo '<td align="right">Total:</td>';
							echo '<td align="right">' . $totalHits . '</td>';
						echo '</tr>';
					echo '</table>';
					/* End of browsers */
				/* Close the column for the browser table */
				echo '</td>';
				/* Create the column for the OS table */
				echo '<td valign="top" width="50%" align="right">';
					/* Start of OS */
					/* Generate the table headers */
					echo '<table id="pages" width="98%" cellspacing="0" cellpadding="3px" frame="box" style="border-color: #424242; border-width: 3px;">';
						echo '<tr>';
							echo '<td colspan="3">Operating System</td>';
							echo '<td width="75px" align="right">Hits</td>';
						echo '</tr>';
						/* Work out the largest number of a given operating system */
						$highest = $bdd->query("SELECT MAX(os_occurs) FROM (SELECT `os`, COUNT(*) AS os_occurs FROM stats WHERE month = $month AND day = $day GROUP BY `os`) Sub1")->fetchColumn();
						/* Set the color for the table row */
						$color="#ebeff5";
						/* Query the database for the OS row */
						$os = $bdd->query("SELECT os, COUNT( os ) AS counted FROM stats WHERE month = $month AND day = $day GROUP BY os ORDER BY counted DESC");
						while ($statsOS = $os->fetch())	
						{
							/* Set the osImage to blank incase no image is set */
							$osImage = '';
							/* For each OS that can be listed from the stats script set the thumbnail image */
							if ($statsOS['os'] == 'Linux') {
								$osImage = '<img src="img/linux.png" title="Linux Based" />';
							}
							if ($statsOS['os'] == 'Mac') {
								$osImage = '<img src="img/mac.png" title="Apple Mac OS" />';
							}
							if ($statsOS['os'] == 'Windows') {
								$osImage = '<img src="img/windows.png" title="Microsoft Windows" />';
							}
							if ($statsOS['os'] == 'Unknown') {
								$osImage = '<img src="img/unknown.png" title="Unknown Operating System" />';
							}
							/* Start a new row for each returned */
							echo '<tr height="25px">';
								/* Insert the OS image into the first column */
								echo '<td bgcolor="' . $color . '" width="25px">' . $osImage . '</td>';
								/* Work out the percentage that the OS has been used */
								$percentage = $statsOS['counted'] / $totalHits * 100;
								/* Insert the percentage into the second column */
								echo '<td bgcolor="' . $color . '" align="right" width="50px">' . round($percentage, 1) . '%</td>';
								/* Work out the image percentage for each OS, this enables the most used OS to give a bar of 100% */
								$imagePercent = $statsOS['counted'] / $highest * 100;
								/* Create a div in the third column the width of the requred percentage bar */
								echo '<td bgcolor="' . $color . '"><div style="height:25px; width:' . $imagePercent . '%; background:#424242;"></div></td>';
								/* Enter the total number of records for each OS (hits) into the fourth column */
								echo '<td bgcolor="' . $color . '" align="right">' . $statsOS['counted'] . '</td>';
								/* Check which color the background is set to, then change it to the alternate color to enable the results to be read with ease */
								if ($color=="#ebeff5") {
									$color="#FFFFFF";
								} else {
									$color="#ebeff5";
								}
							/* Close the table row for each row returned */
							echo '</tr>';
						}
						/* Generate the bottom of the table */
						echo '<tr>';
							echo '<td></td>';
							echo '<td></td>';
							echo '<td align="right">Total:</td>';
							echo '<td align="right">' . $totalHits . '</td>';
						echo '</tr>';
					echo '</table>';
					/* End of OS */
				/* Close the OS table column */
				echo '</td>';
			/* Close the Browser/OS row */
			echo '</tr>';
		/* Close the OS table */
		echo '</table>';
	}
/* Check if the month is set */
} elseif(isset($_GET['month']) && is_numeric($_GET['month'])) {
	/* Generate the stats for the chosen month */
	/* set the $_GET values to variables */
	$month = $_GET['month'];
	/* Get the last 2 digits of the 6 digit month <YYYYMM> to give a 2 digit month number and translate that into the full month name */
	if(substr($month, -2) == '01') {
		$theMonth = 'January';
	}
	if(substr($month, -2) == '02') {
		$theMonth = 'February';
	}
	if(substr($month, -2) == '03') {
		$theMonth = 'March';
	}
	if(substr($month, -2) == '04') {
		$theMonth = 'April';
	}
	if(substr($month, -2) == '05') {
		$theMonth = 'May';
	}
	if(substr($month, -2) == '06') {
		$theMonth = 'June';
	}
	if(substr($month, -2) == '07') {
		$theMonth = 'July';
	}
	if(substr($month, -2) == '08') {
		$theMonth = 'August';
	}
	if(substr($month, -2) == '09') {
		$theMonth = 'September';
	}
	if(substr($month, -2) == '10') {
		$theMonth = 'October';
	}
	if(substr($month, -2) == '11') {
		$theMonth = 'November';
	}
	if(substr($month, -2) == '12') {
		$theMonth = 'December';
	}
	/* Get the total number of rows in the stats table for the specified month */
	$totalHits = $bdd->query("select count(*) from stats WHERE month = $month")->fetchColumn();
	/* Check if detailed stats are to be displayed for the browser information */
	if(isset($_GET['detailed']) && ($_GET['detailed']=='browser')) {
		/* Start of browsers detailed month */
		/* Generate the breadcrumb */
		echo '<strong><a href="visitor_stats.php">Stats</a> >> <a href="?month=' . $month . '">' . $theMonth . ' ' . substr($month, 0, -2);
		echo '</a> >> Browser Information</strong>';
		echo '<br><br>';
		/* Generate the table header */
		echo '<table id="browser" width="100%" cellspacing="0" cellpadding="3px" frame="box" style="border-color: #424242; border-width: 3px;">';
			echo '<tr>';
				echo '<td width="200px">Browser</td>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td width="75px" align="right">Hits</td>';
			echo '<tr>';
			/* Work out the largest number of a given browser */
			$highest = $bdd->query("SELECT MAX(browser_occurs) FROM (SELECT `version`, COUNT(*) AS browser_occurs FROM stats WHERE month = $month GROUP BY `version`) Sub1")->fetchColumn();
			/* Set the background color for the table row */
			$color="#ebeff5";
			/* Query the database for browser information for the requested month */
			$browser = $bdd->query("SELECT browser, version, COUNT( version ) AS counted FROM stats WHERE month = $month GROUP BY version ORDER BY counted DESC");
			while ($statsBrowser = $browser->fetch())	
			{
				/* Set the browserImage to blank incase no image is set */
				$browserImage = '';
				/* For each browser that can be listed from the stats script set the thumbnail image */
				if ($statsBrowser['browser'] == 'Google Chrome') {
					$browserImage = '<img src="img/chrome.png" title="Google Chrome" />';
				}
				if ($statsBrowser['browser'] == 'Internet Explorer') {
					$browserImage = '<img src="img/ie.png" title="Internet Explorer" />';
				}
				if ($statsBrowser['browser'] == 'Mozilla Firefox') {
					$browserImage = '<img src="img/firefox.png" title="Mozilla Firefox" />';
				}
				if ($statsBrowser['browser'] == 'Apple Safari') {
					$browserImage = '<img src="img/safari.png" title="Apple Safari" />';
				}
				if ($statsBrowser['browser'] == 'Opera') {
					$browserImage = '<img src="img/opera.png" title="Opera" />';
				}
				if ($statsBrowser['browser'] == 'Netscape') {
					$browserImage = '<img src="img/netscape.png" title="Netscape" />';
				}
				if ($statsBrowser['browser'] == 'Unknown') {
					$browserImage = '<img src="img/unknown.png" title="Unknown browser" />';
				}
				/* Start a new row for each row returned */
				echo '<tr height="25px">';
					/* Insert the browser image into the first column */
					echo '<td bgcolor="' . $color . '">' . $browserImage . ' ' . $statsBrowser['version'] . '</td>';
					/* Work out the percentage that the browser version has been used */
					$percentage = $statsBrowser['counted'] / $totalHits * 100;
					/* Insert the percentage into the second column */
					echo '<td bgcolor="' . $color . '" align="right" width="50px">' . round($percentage, 1) . '%</td>';
					/* Work out the image percentage for each browser version, this enables the most used browser to give a bar of 100% */
					$imagePercent = $statsBrowser['counted'] / $highest * 100;
					/* Create a div in the third column the width of the required percentage bar */
					echo '<td bgcolor="' . $color . '"><div style="height:25px; width:' . $imagePercent . '%; background:#424242;"></div></td>';
					/* Enter the total number of records for each browser (hits) into the fourth column */
					echo '<td bgcolor="' . $color . '" align="right">' . $statsBrowser['counted'] . '</td>';
					/* Check which color the background is set to, then change it to the alternate color to enable the results to be read with ease */
					if ($color=="#ebeff5") {
						$color="#FFFFFF";
					} else {
						$color="#ebeff5";
					}
				/* Close the table row for each row returned */
				echo '</tr>';
			}
			/* Generate the bottom of the table */
			echo '<tr>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td align="right">Total:</td>';
				echo '<td align="right">' . $totalHits . '</td>';
			echo '</tr>';
		echo '</table>';
		/* End of browsers detailed month*/
	/* Check if detailed stats are to be displayed for the IP information */
	} elseif (isset($_GET['detailed']) && $_GET['detailed']=='ip') {
		/* Start of IP detailed month*/
		/* Generate the breadcrumb */
		echo '<strong><a href="visitor_stats.php">Stats</a> >> <a href="?month=' . $month . '">' . $theMonth . ' ' . substr($month, 0, -2);
		echo '</a> >> All IP Address\'</strong>';
		echo '<br><br>';
		/* Generate the table headder */
		echo '<table id="ip" width="100%" cellspacing="0" cellpadding="3px" frame="box" style="border-color: #424242; border-width: 3px;">';
			echo '<tr>';
				echo '<td colspan="4" width="150px">IP Address</td>';
				echo '<td width="75px" align="right">Hits</td>';
			echo '</tr>';
			/* Work out the largest number of a given IP */
			$highest = $bdd->query("SELECT MAX(ip_occurs) FROM (SELECT `ip`, COUNT(*) AS ip_occurs FROM stats WHERE month = $month GROUP BY `ip`) Sub1")->fetchColumn();
			/* Set the background color for the table row */
			$color="#ebeff5";
			/* Query the database for IP information for the requested month */
			$ip = $bdd->query("SELECT ip, COUNT( ip ) AS counted FROM stats WHERE month = $month GROUP BY ip ORDER BY counted DESC");
			while ($statsIP = $ip->fetch())	
			{
				/* Start a new row for each row returned */
				echo '<tr height="25px">';
					/* Insert the IP address into the first column */
					echo '<td bgcolor="' . $color . '" width="150px">' . $statsIP['ip'] . '</td>';
					/* Work out the percentage that the IP address has been used */
					$percentage = $statsIP['counted'] / $totalHits * 100;
					/* Insert the percentage into the second column */
					echo '<td bgcolor="' . $color . '" align="right" width="50px">' . round($percentage, 1) . '%</td>';
					/* Work out the image percentage for each Ip address, this enables the most used IP address to give a bar of 100% */
					$imagePercent = $statsIP['counted'] / $highest * 100;
					/* Create a div in the third column the width of the required percentage bar */
					echo '<td bgcolor="' . $color . '"><div style="height:25px; width:' . $imagePercent . '%; background:#424242;"></div></td>';
					/* Insert an image of the country flag into the fourth column using the hostip.info API */
					echo '<td bgcolor="' . $color . '" width="35px"><IMG SRC="http://api.hostip.info/flag.php?ip=' . $statsIP['ip'] . '" title="IP address lookup by HostIP" ALT="IP Address Lookup by HostIP.info" height="25px" width="35px"></td>';
					/* Enter the total number of records for each IP address (hits) into the fifth column */
					echo '<td bgcolor="' . $color . '" align="right">' . $statsIP['counted'] . '</td>';
					/* Check which color the background is set to, then change it to the alternate color to enable the results to be read with ease */
					if ($color=="#ebeff5") {
						$color="#FFFFFF";
					} else {
						$color="#ebeff5";
					}
				/* Close the table row for each row returned */
				echo '</tr>';
			}
			/* Generate the bottom of the table */
			echo '<tr>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td align="right">Total:</td>';
				echo '<td align="right">' . $totalHits . '</td>';
			echo '</tr>';
		echo '</table>';
		/* End of IP */
	} else {
		/* Start of month */
		/* Generate the breadcrumb */
		echo '<strong><a href="visitor_stats.php">Stats</a> >> ' . $theMonth . ' ' . substr($month, 0, -2) . '</strong>';
		echo '<br><br>';
		/* Generate the table header */
		echo '<table id="days" width="100%" cellspacing="0" cellpadding="3px" frame="box" style="border-color: #424242; border-width: 3px;">';
			echo '<tr>';
				echo '<td width="150px">Day</td>';
				echo '<td width="50px"></td>';
				echo '<td></td>';
				echo '<td width="75px" align="right">Hits</td>';
			echo '</tr>';
			/* Work out the largest number of times day has been used in the database */
			$highest = $bdd->query("SELECT MAX(day_occurs) FROM (SELECT `day`, COUNT(*) AS day_occurs FROM stats WHERE month = $month GROUP BY `day`) Sub1")->fetchColumn();
			/* Set the background color for the table row */
			$color="#ebeff5";
			/* Query the database for the hour information for the requested month */
			$day = $bdd->query("SELECT day, COUNT( day ) AS counted FROM stats WHERE month = $month GROUP BY day ORDER BY day DESC");
			while ($statsDay = $day->fetch())	
			{
				/* Start a new row for each row returned */
				echo '<tr height="25px">';
					/* Insert the hour range into the first column */
					echo '<td bgcolor="' . $color . '"><a href="?month=' . $month . '&day=' . $statsDay['day'] . '">' . $statsDay['day'] . '</a></td>';
					/* Work out the percentage that the hour range has been used */
					$percentage = $statsDay['counted'] / $totalHits * 100;
					/* Insert the percentage into the second column */
					echo '<td bgcolor="' . $color . '" align="right">' . round($percentage, 1) . '%</td>';
					/* Work out the image percentage for each hour returned, this enables the most used hour range to give a bar of 100% */
					$imagePercent = $statsDay['counted'] / $highest * 100;
					/* Create a div in the third column the width of the requred percentage bar */
					echo '<td bgcolor="' . $color . '"><div style="height:25px; width:' . $imagePercent . '%; background:#424242;"></div></td>';
					/* Enter the total number of records for each hour range (hits) into the fourth column */
					echo '<td bgcolor="' . $color . '" align="right">' . $statsDay['counted'] . '</td>';
					/* Chek which color the background is set to, then change it to the alternate color to enable the results to be read with ease */
					if ($color=="#ebeff5") {
						$color="#FFFFFF";
					} else {
						$color="#ebeff5";
					}
				/* Close the table row for each result returned */
				echo '</tr>';
			}
			/* Generate the bottom of the table */
			echo '<tr>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td align="right">Total:</td>';
				echo '<td align="right">' . $totalHits . '</td>';
			echo '</tr>';
		echo '</table>';
		/* End of days */
		/* Start of hours */
		echo '<br><br>';
		/* Generate the table header */
		echo '<table id="hours" width="100%" cellspacing="0" cellpadding="3px" frame="box" style="border-color: #424242; border-width: 3px;">';
			echo '<tr>';
				echo '<td width="150px">Hour Range</td>';
				echo '<td width="50px"></td>';
				echo '<td></td>';
				echo '<td width="75px" align="right">Hits</td>';
			echo '</tr>';
			/* Work out the largest number of times an hour has been used in the database */
			$highest = $bdd->query("SELECT MAX(hour_occurs) FROM (SELECT `hour`, COUNT(*) AS hour_occurs FROM stats WHERE month = $month GROUP BY `hour`) Sub1")->fetchColumn();
			/* Set the background color for the table row */
			$color="#ebeff5";
			/* Query the database for the hour information for the requested month */
			$hour = $bdd->query("SELECT hour, COUNT( hour ) AS counted FROM stats WHERE month = $month GROUP BY hour ORDER BY hour");
			while ($statsHour = $hour->fetch())	
			{
				/* Set the hour range so instead of displaying '10', '10:00 - 10:59' is displayed */
				if ($statsHour['hour'] == '00') {
					$hourRange = '00:00 - 00:59';
				}
				if ($statsHour['hour'] == '01') {
					$hourRange = '01:00 - 01:59';
				}
				if ($statsHour['hour'] == '02') {
					$hourRange = '02:00 - 02:59';
				}
				if ($statsHour['hour'] == '03') {
					$hourRange = '03:00 - 03:59';
				}
				if ($statsHour['hour'] == '04') {
					$hourRange = '04:00 - 04:59';
				}
				if ($statsHour['hour'] == '05') {
					$hourRange = '05:00 - 05:59';
				}
				if ($statsHour['hour'] == '06') {
					$hourRange = '06:00 - 06:59';
				}
				if ($statsHour['hour'] == '07') {
					$hourRange = '07:00 - 07:59';
				}
				if ($statsHour['hour'] == '08') {
					$hourRange = '08:00 - 08:59';
				}
				if ($statsHour['hour'] == '09') {
					$hourRange = '09:00 - 09:59';
				}
				if ($statsHour['hour'] == '10') {
					$hourRange = '10:00 - 10:59';
				}
				if ($statsHour['hour'] == '11') {
					$hourRange = '11:00 - 1:59';
				}
				if ($statsHour['hour'] == '12') {
					$hourRange = '12:00 - 12:59';
				}
				if ($statsHour['hour'] == '13') {
					$hourRange = '13:00 - 13:59';
				}
				if ($statsHour['hour'] == '14') {
					$hourRange = '14:00 - 14:59';
				}
				if ($statsHour['hour'] == '15') {
					$hourRange = '15:00 - 15:59';
				}
				if ($statsHour['hour'] == '16') {
					$hourRange = '16:00 - 16:59';
				}
				if ($statsHour['hour'] == '17') {
					$hourRange = '17:00 - 17:59';
				}
				if ($statsHour['hour'] == '18') {
					$hourRange = '18:00 - 18:59';
				}
				if ($statsHour['hour'] == '19') {
					$hourRange = '19:00 - 19:59';
				}
				if ($statsHour['hour'] == '20') {
					$hourRange = '20:00 - 20:59';
				}
				if ($statsHour['hour'] == '21') {
					$hourRange = '21:00 - 21:59';
				}
				if ($statsHour['hour'] == '22') {
					$hourRange = '22:00 - 22:59';
				}
				if ($statsHour['hour'] == '23') {
					$hourRange = '23:00 - 23:59';
				}
				/* Start a new row for each row returned */
				echo '<tr height="25px">';
					/* Insert the hour range into the first column */
					echo '<td bgcolor="' . $color . '">' . $hourRange . '</td>';
					/* Work out the percentage that the hour range has been used */
					$percentage = $statsHour['counted'] / $totalHits * 100;
					/* Insert the percentage into the second column */
					echo '<td bgcolor="' . $color . '" align="right">' . round($percentage, 1) . '%</td>';
					/* Work out the image percentage for each hour returned, this enables the most used hour range to give a bar of 100% */
					$imagePercent = $statsHour['counted'] / $highest * 100;
					/* Create a div in the third column the width of the requred percentage bar */
					echo '<td bgcolor="' . $color . '"><div style="height:25px; width:' . $imagePercent . '%; background:#424242;"></div></td>';
					/* Enter the total number of records for each hour range (hits) into the fourth column */
					echo '<td bgcolor="' . $color . '" align="right">' . $statsHour['counted'] . '</td>';
					/* Chek which color the background is set to, then change it to the alternate color to enable the results to be read with ease */
					if ($color=="#ebeff5") {
						$color="#FFFFFF";
					} else {
						$color="#ebeff5";
					}
				/* Close the table row for each result returned */
				echo '</tr>';
			}
			/* Generate the bottom of the table */
			echo '<tr>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td align="right">Total:</td>';
				echo '<td align="right">' . $totalHits . '</td>';
			echo '</tr>';
		echo '</table>';
		/* End of hours */
		echo '<br><br>';
		/* Start of pages */
		echo '<table id="pages" width="100%" cellspacing="0" cellpadding="3px" frame="box" style="border-color: #424242; border-width: 3px;">';
			echo '<tr>';
				echo '<td width="150px">Page</td>';
				echo '<td width="50px"></td>';
				echo '<td></td>';
				echo '<td width="75px" align="right">Hits</td>';
			echo '</tr>';
			/* Work out the largest number of a given page */
			$highest = $bdd->query("SELECT MAX(page_occurs) FROM (SELECT `page`, COUNT(*) AS page_occurs FROM stats WHERE month = $month GROUP BY `page`) Sub1")->fetchColumn();
			/* Set the background color for the table row */
			$color="#ebeff5";
			/* Query the database for the page information for the requested month */
			$page = $bdd->query("SELECT page, COUNT( page ) AS counted FROM stats WHERE month = $month GROUP BY page ORDER BY counted DESC");
			while ($statsPage = $page->fetch())	
			{
				/* Start a new row for each row returned */
				echo '<tr height="25px">';
					/* Insert the page name i.e '/Home.html' or '?page=Home' into the first column */
					echo '<td bgcolor="' . $color . '">' . $statsPage['page'] . '</td>';
					/* Work out the percentage that the page has been used */
					$percentage = $statsPage['counted'] / $totalHits * 100;
					/* Insert the percentage into the second column */
					echo '<td bgcolor="' . $color . '" align="right">' . round($percentage, 1) . '%</td>';
					/* Work out the image percentage for each page, this enables the most used page to give a bar of 100% */
					$imagePercent = $statsPage['counted'] / $highest * 100;
					/* Create a div in the third coumn the width of the required percentage bar */
					echo '<td bgcolor="' . $color . '"><div style="height:25px; width:' . $imagePercent . '%; background:#424242;"></div></td>';
					/* Enter the total number of records for each page (hits) into the fourth column */
					echo '<td bgcolor="' . $color . '" align="right">' . $statsPage['counted'] . '</td>';
					/* Check which color the background is set to, then change it to the alternate color to enable the results to be read with ease */
					if ($color=="#ebeff5") {
						$color="#FFFFFF";
					} else {
						$color="#ebeff5";
					}
				/* Close the table for each row returned */
				echo '</tr>';
			}
			/* Generate the bottom of the table */
			echo '<tr>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td align="right">Total:</td>';
				echo '<td align="right">' . $totalHits . '</td>';
			echo '</tr>';
		echo '</table>';
		/* End of pages */
		echo '<br><br>';
		/* Start of IP */
		/* Generate the table headers */
		echo '<table id="pages" width="100%" cellspacing="0" cellpadding="3px" frame="box" style="border-color: #424242; border-width: 3px;">';
			echo '<tr>';
				echo '<td colspan="4" width="150px">Top 10 IP Address\' (<a href="?month=' . $month . '&detailed=ip">View all</a>)</td>';
				echo '<td width="75px" align="right">Hits</td>';
			echo '</tr>';
			/* Work out the largest number of a given IP */
			$highest = $bdd->query("SELECT MAX(ip_occurs) FROM (SELECT `ip`, COUNT(*) AS ip_occurs FROM stats WHERE month = $month GROUP BY `ip`) Sub1")->fetchColumn();
			/* Set the background color for the table row */
			$color="#ebeff5";
			/* Query the database for IP information for the requested month, limiting the results to 10 */
			$ip = $bdd->query("SELECT ip, COUNT( ip ) AS counted FROM stats WHERE month = $month GROUP BY ip ORDER BY counted DESC LIMIT 10");
			while ($statsIP = $ip->fetch())	
			{
				/* Start a new row for each row returned */
				echo '<tr height="25px">';
					/* Insert the IP address into the first column */
					echo '<td bgcolor="' . $color . '" width="150px">' . $statsIP['ip'] . '</td>';
					/* Work out the percentage that the IP has been used */
					$percentage = $statsIP['counted'] / $totalHits * 100;
					/* Insert the percentage into the second column */
					echo '<td bgcolor="' . $color . '" align="right" width="50px">' . round($percentage, 1) . '%</td>';
					/* Work out the image percentage for each IP , this enables the most used browser to give a bar of 100% */
					$imagePercent = $statsIP['counted'] / $highest * 100;
					/* Create a div in the third column the width of the required percentage bar */
					echo '<td bgcolor="' . $color . '"><div style="height:25px; width:' . $imagePercent . '%; background:#424242;"></div></td>';
					/* Insert an image of the country flag into the fourth column using the hostip.info API */
					echo '<td bgcolor="' . $color . '" width="35px"><IMG SRC="http://api.hostip.info/flag.php?ip=' . $statsIP['ip'] . '" title="IP address lookup by HostIP" ALT="IP Address Lookup by HostIP.info" height="25px" width="35px"></td>';
					/* Enter the total number of records for each IP (hits) into the fourth column */
					echo '<td bgcolor="' . $color . '" align="right">' . $statsIP['counted'] . '</td>';
					/* Check which color the background is set to, then change it to the alternate color to enable the results to be read with ease */
					if ($color=="#ebeff5") {
						$color="#FFFFFF";
					} else {
						$color="#ebeff5";
					}
				/* Close each table row returned */
				echo '</tr>';
			}
			/* Generate the bottom of the table */
			echo '<tr>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td align="right">Total:</td>';
				echo '<td align="right">' . $totalHits . '</td>';
			echo '</tr>';
		echo '</table>';
		/* End of IP */
		echo '<br><br>';
		/* Create a table with 2 columns to enable half size tables side by side */
		echo '<table width="100%" cellpadding="0" cellspacing="0">';
			echo '<tr valign="top">';
				echo '<td valign="top" width="50%">';
					/* Start of browsers */
					/* Generate the table headers */
					echo '<table id="browsers" width="98%" cellspacing="0" cellpadding="3px" frame="box" style="border-color: #424242; border-width: 3px;">';
						echo '<tr>';
							echo '<td colspan="3">Browser (<a href="?month=' . $month . '&detailed=browser">Detailed information</a>)</td>';
							echo '<td width="75px" align="right">Hits</td>';
						echo '</tr>';
						/* Work out the largest number of a given browser */
						$highest = $bdd->query("SELECT MAX(browser_occurs) FROM (SELECT `browser`, COUNT(*) AS browser_occurs FROM stats WHERE month = $month GROUP BY `browser`) Sub1")->fetchColumn();
						/* Set the background color for the table row */
						$color="#ebeff5";
						/* Query the database for browser information for the requested month */
						$browser = $bdd->query("SELECT browser, COUNT( browser ) AS counted FROM stats WHERE month = $month GROUP BY browser ORDER BY counted DESC");
						while ($statsBrowser = $browser->fetch())	
						{
							/* Set the browserImage to blank incase no image is set */
							$browserImage = '';
							/* For each browser that can be listed from the stats script set the thumnail image */
							if ($statsBrowser['browser'] == 'Google Chrome') {
								$browserImage = '<img src="img/chrome.png" title="Google Chrome" />';
							}
							if ($statsBrowser['browser'] == 'Internet Explorer') {
								$browserImage = '<img src="img/ie.png" title="Internet Explorer" />';
							}
							if ($statsBrowser['browser'] == 'Mozilla Firefox') {
								$browserImage = '<img src="img/firefox.png" title="Mozilla Firefox" />';
							}
							if ($statsBrowser['browser'] == 'Apple Safari') {
								$browserImage = '<img src="img/safari.png" title="Apple Safari" />';
							}
							if ($statsBrowser['browser'] == 'Opera') {
								$browserImage = '<img src="img/opera.png" title="Opera" />';
							}
							if ($statsBrowser['browser'] == 'Netscape') {
								$browserImage = '<img src="img/netscape.png" title="Netscape" />';
							}
							if ($statsBrowser['browser'] == 'Unknown') {
								$browserImage = '<img src="img/unknown.png" title="Unknown browser" />';
							}
							/* Start a new row for each row returned */
							echo '<tr height="25px">';
								/* Insert the browser image into the first column */
								echo '<td bgcolor="' . $color . '" width="25px">' . $browserImage . '</td>';
								/* Work out the percentage that the browser has been used */
								$percentage = $statsBrowser['counted'] / $totalHits * 100;
								/* Insert the percentage into the second column */
								echo '<td bgcolor="' . $color . '" align="right" width="50px">' . round($percentage, 1) . '%</td>';
								/* Work out the image percentage for each browser version, this enables the most used browser to give a bar of 100% */
								$imagePercent = $statsBrowser['counted'] / $highest * 100;
								/* Create a div in the third column the width of the requred percentage bar */
								echo '<td bgcolor="' . $color . '"><div style="height:25px; width:' . $imagePercent . '%; background:#424242;"></div></td>';
								/* Enter the total number of records for each browser (hits) into the fourth column */
								echo '<td bgcolor="' . $color . '" align="right">' . $statsBrowser['counted'] . '</td>';
								/* Check which color the background is set to, then change it to the alternate color to enable the results to be read with ease */
								if ($color=="#ebeff5") {
									$color="#FFFFFF";
								} else {
									$color="#ebeff5";
								}
							/* Close the table row for each row returned */
							echo '</tr>';
						}
						/* Generate the bottom of the table */
						echo '<tr>';
							echo '<td></td>';
							echo '<td></td>';
							echo '<td align="right">Total:</td>';
							echo '<td align="right">' . $totalHits . '</td>';
						echo '</tr>';
					echo '</table>';
					/* End of browsers */
				/* Close the column for the browser table */
				echo '</td>';
				/* Create the column for the OS table */
				echo '<td valign="top" width="50%" align="right">';
					/* Start of OS */
					/* Generate the table headers */
					echo '<table id="pages" width="98%" cellspacing="0" cellpadding="3px" frame="box" style="border-color: #424242; border-width: 3px;">';
						echo '<tr>';
							echo '<td colspan="3">Operating System</td>';
							echo '<td width="75px" align="right">Hits</td>';
						echo '</tr>';
						/* Work out the largest number of a given operating system */
						$highest = $bdd->query("SELECT MAX(os_occurs) FROM (SELECT `os`, COUNT(*) AS os_occurs FROM stats WHERE month = $month GROUP BY `os`) Sub1")->fetchColumn();
						/* Set the color for the table row */
						$color="#ebeff5";
						/* Query the database for the OS row */
						$os = $bdd->query("SELECT os, COUNT( os ) AS counted FROM stats WHERE month = $month GROUP BY os ORDER BY counted DESC");
						while ($statsOS = $os->fetch())	
						{
							/* Set the osImage to blank incase no image is set */
							$osImage = '';
							/* For each OS that can be listed from the stats script set the thumbnail image */
							if ($statsOS['os'] == 'Linux') {
								$osImage = '<img src="img/linux.png" title="Linux Based" />';
							}
							if ($statsOS['os'] == 'Mac') {
								$osImage = '<img src="img/mac.png" title="Apple Mac OS" />';
							}
							if ($statsOS['os'] == 'Windows') {
								$osImage = '<img src="img/windows.png" title="Microsoft Windows" />';
							}
							if ($statsOS['os'] == 'Unknown') {
								$osImage = '<img src="img/unknown.png" title="Unknown Operating System" />';
							}
							/* Start a new row for each returned */
							echo '<tr height="25px">';
								/* Insert the OS image into the first column */
								echo '<td bgcolor="' . $color . '" width="25px">' . $osImage . '</td>';
								/* Work out the percentage that the OS has been used */
								$percentage = $statsOS['counted'] / $totalHits * 100;
								/* Insert the percentage into the second column */
								echo '<td bgcolor="' . $color . '" align="right" width="50px">' . round($percentage, 1) . '%</td>';
								/* Work out the image percentage for each OS, this enables the most used OS to give a bar of 100% */
								$imagePercent = $statsOS['counted'] / $highest * 100;
								/* Create a div in the third column the width of the requred percentage bar */
								echo '<td bgcolor="' . $color . '"><div style="height:25px; width:' . $imagePercent . '%; background:#424242;"></div></td>';
								/* Enter the total number of records for each OS (hits) into the fourth column */
								echo '<td bgcolor="' . $color . '" align="right">' . $statsOS['counted'] . '</td>';
								/* Check which color the background is set to, then change it to the alternate color to enable the results to be read with ease */
								if ($color=="#ebeff5") {
									$color="#FFFFFF";
								} else {
									$color="#ebeff5";
								}
							/* Close the table row for each row returned */
							echo '</tr>';
						}
						/* Generate the bottom of the table */
						echo '<tr>';
							echo '<td></td>';
							echo '<td></td>';
							echo '<td align="right">Total:</td>';
							echo '<td align="right">' . $totalHits . '</td>';
						echo '</tr>';
					echo '</table>';
					/* End of OS */
				/* Close the OS table column */
				echo '</td>';
			/* Close the Browser/OS row */
			echo '</tr>';
		/* Close the OS table */
		echo '</table>';
	}
/* If no month / month & day are set, show all results */
} else {
	/* Generate the stats */
	/* Get the total number of rows in the stats table */
	$totalHits = $bdd->query("select count(*) from stats")->fetchColumn();
	/* Check if detailed stats are to be displayed for the browser information */
	if(isset($_GET['detailed']) && ($_GET['detailed']=='browser')) {
		/* Start of browsers detailed month */
		/* Generate the breadcrumb */
		echo '<strong><a href="visitor_stats.php">Stats</a> >> Browser information</strong>';
		echo '<br><br>';
		/* Generate the table header */
		echo '<table id="browser" width="100%" cellspacing="0" cellpadding="3px" frame="box" style="border-color: #424242; border-width: 3px;">';
			echo '<tr>';
				echo '<td width="200px">Browser</td>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td width="75px" align="right">Hits</td>';
			echo '<tr>';
			/* Work out the largest number of a given browser */
			$highest = $bdd->query("SELECT MAX(browser_occurs) FROM (SELECT `version`, COUNT(*) AS browser_occurs FROM stats GROUP BY `version`) Sub1")->fetchColumn();
			/* Set the background color for the table row */
			$color="#ebeff5";
			/* Query the database for browser information for the requested month */
			$browser = $bdd->query("SELECT browser, version, COUNT( version ) AS counted FROM stats GROUP BY version ORDER BY counted DESC");
			while ($statsBrowser = $browser->fetch())	
			{
				/* Set the browserImage to blank incase no image is set */
				$browserImage = '';
				/* For each browser that can be listed from the stats script set the thumbnail image */
				if ($statsBrowser['browser'] == 'Google Chrome') {
					$browserImage = '<img src="img/chrome.png" title="Google Chrome" />';
				}
				if ($statsBrowser['browser'] == 'Internet Explorer') {
					$browserImage = '<img src="img/ie.png" title="Internet Explorer" />';
				}
				if ($statsBrowser['browser'] == 'Mozilla Firefox') {
					$browserImage = '<img src="img/firefox.png" title="Mozilla Firefox" />';
				}
				if ($statsBrowser['browser'] == 'Apple Safari') {
					$browserImage = '<img src="img/safari.png" title="Apple Safari" />';
				}
				if ($statsBrowser['browser'] == 'Opera') {
					$browserImage = '<img src="img/opera.png" title="Opera" />';
				}
				if ($statsBrowser['browser'] == 'Netscape') {
					$browserImage = '<img src="img/netscape.png" title="Netscape" />';
				}
				if ($statsBrowser['browser'] == 'Unknown') {
					$browserImage = '<img src="img/unknown.png" title="Unknown browser" />';
				}
				/* Start a new row for each row returned */
				echo '<tr height="25px">';
					/* Insert the browser image into the first column */
					echo '<td bgcolor="' . $color . '">' . $browserImage . ' ' . $statsBrowser['version'] . '</td>';
					/* Work out the percentage that the browser version has been used */
					$percentage = $statsBrowser['counted'] / $totalHits * 100;
					/* Insert the percentage into the second column */
					echo '<td bgcolor="' . $color . '" align="right" width="50px">' . round($percentage, 1) . '%</td>';
					/* Work out the image percentage for each browser version, this enables the most used browser to give a bar of 100% */
					$imagePercent = $statsBrowser['counted'] / $highest * 100;
					/* Create a div in the third column the width of the required percentage bar */
					echo '<td bgcolor="' . $color . '"><div style="height:25px; width:' . $imagePercent . '%; background:#424242;"></div></td>';
					/* Enter the total number of records for each browser (hits) into the fourth column */
					echo '<td bgcolor="' . $color . '" align="right">' . $statsBrowser['counted'] . '</td>';
					/* Check which color the background is set to, then change it to the alternate color to enable the results to be read with ease */
					if ($color=="#ebeff5") {
						$color="#FFFFFF";
					} else {
						$color="#ebeff5";
					}
				/* Close the table row for each row returned */
				echo '</tr>';
			}
			/* Generate the bottom of the table */
			echo '<tr>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td align="right">Total:</td>';
				echo '<td align="right">' . $totalHits . '</td>';
			echo '</tr>';
		echo '</table>';
		/* End of browsers detailed month*/
	/* Check if detailed stats are to be displayed for the IP information */
	} elseif (isset($_GET['detailed']) && $_GET['detailed']=='ip') {
		/* Start of IP detailed month*/
		/* Generate the breadcrumb */
		echo '<strong><a href="visitor_stats.php">Stats</a> >> <a href="?month=' . $month . '">' . $theMonth . ' ' . substr($month, 0, -2);
		echo '</a> All IP Address\'</strong>';
		echo '<br><br>';
		/* Generate the table headder */
		echo '<table id="ip" width="100%" cellspacing="0" cellpadding="3px" frame="box" style="border-color: #424242; border-width: 3px;">';
			echo '<tr>';
				echo '<td colspan="4" width="150px">IP Address</td>';
				echo '<td width="75px" align="right">Hits</td>';
			echo '</tr>';
			/* Work out the largest number of a given IP */
			$highest = $bdd->query("SELECT MAX(ip_occurs) FROM (SELECT `ip`, COUNT(*) AS ip_occurs FROM stats GROUP BY `ip`) Sub1")->fetchColumn();
			/* Set the background color for the table row */
			$color="#ebeff5";
			/* Query the database for IP information for the requested month */
			$ip = $bdd->query("SELECT ip, COUNT( ip ) AS counted FROM stats GROUP BY ip ORDER BY counted DESC");
			while ($statsIP = $ip->fetch())	
			{
				/* Start a new row for each row returned */
				echo '<tr height="25px">';
					/* Insert the IP address into the first column */
					echo '<td bgcolor="' . $color . '" width="150px">' . $statsIP['ip'] . '</td>';
					/* Work out the percentage that the IP address has been used */
					$percentage = $statsIP['counted'] / $totalHits * 100;
					/* Insert the percentage into the second column */
					echo '<td bgcolor="' . $color . '" align="right" width="50px">' . round($percentage, 1) . '%</td>';
					/* Work out the image percentage for each Ip address, this enables the most used IP address to give a bar of 100% */
					$imagePercent = $statsIP['counted'] / $highest * 100;
					/* Create a div in the third column the width of the required percentage bar */
					echo '<td bgcolor="' . $color . '"><div style="height:25px; width:' . $imagePercent . '%; background:#424242;"></div></td>';
					/* Insert an image of the country flag into the fourth column using the hostip.info API */
					echo '<td bgcolor="' . $color . '" width="35px"><IMG SRC="http://api.hostip.info/flag.php?ip=' . $statsIP['ip'] . '" title="IP address lookup by HostIP" ALT="IP Address Lookup by HostIP.info" height="25px" width="35px"></td>';
					/* Enter the total number of records for each IP address (hits) into the fifth column */
					echo '<td bgcolor="' . $color . '" align="right">' . $statsIP['counted'] . '</td>';
					/* Check which color the background is set to, then change it to the alternate color to enable the results to be read with ease */
					if ($color=="#ebeff5") {
						$color="#FFFFFF";
					} else {
						$color="#ebeff5";
					}
				/* Close the table row for each row returned */
				echo '</tr>';
			}
			/* Generate the bottom of the table */
			echo '<tr>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td align="right">Total:</td>';
				echo '<td align="right">' . $totalHits . '</td>';
			echo '</tr>';
		echo '</table>';
		/* End of IP */
	} else {
		/* Start of months */
		/* Generate the breadcrumb */
		echo '<strong>Stats</strong>';
		echo '<br><br>';
		/* Generate the table header */
		echo '<table id="months" width="100%" cellspacing="0" cellpadding="3px" frame="box" style="border-color: #424242; border-width: 3px;">';
			echo '<tr>';
				echo '<td width="150px">Month</td>';
				echo '<td width="50px"></td>';
				echo '<td></td>';
				echo '<td width="75px" align="right">Hits</td>';
			echo '</tr>';
			/* Work out the largest number of times day has been used in the database */
			$highest = $bdd->query("SELECT MAX(month_occurs) FROM (SELECT `month`, COUNT(*) AS month_occurs FROM stats GROUP BY `month`) Sub1")->fetchColumn();
			/* Set the background color for the table row */
			$color="#ebeff5";
			/* Query the database for the hour information for the requested month */
			$month = $bdd->query("SELECT month, COUNT( month ) AS counted FROM stats GROUP BY month ORDER BY month DESC");
			while ($statsMonth = $month->fetch())	
			{
				/* Get the last 2 digits of the 6 digit month <YYYYMM> to give a 2 digit month number and translate that into the full month name */
				if(substr($statsMonth['month'], -2) == '01') {
					$theMonth = 'January';
				}
				if(substr($statsMonth['month'], -2) == '02') {
					$theMonth = 'February';
				}
				if(substr($statsMonth['month'], -2) == '03') {
					$theMonth = 'March';
				}
				if(substr($statsMonth['month'], -2) == '04') {
					$theMonth = 'April';
				}
				if(substr($statsMonth['month'], -2) == '05') {
					$theMonth = 'May';
				}
				if(substr($statsMonth['month'], -2) == '06') {
					$theMonth = 'June';
				}
				if(substr($statsMonth['month'], -2) == '07') {
					$theMonth = 'July';
				}
				if(substr($statsMonth['month'], -2) == '08') {
					$theMonth = 'August';
				}
				if(substr($statsMonth['month'], -2) == '09') {
					$theMonth = 'September';
				}
				if(substr($statsMonth['month'], -2) == '10') {
					$theMonth = 'October';
				}
				if(substr($statsMonth['month'], -2) == '11') {
					$theMonth = 'November';
				}
				if(substr($statsMonth['month'], -2) == '12') {
					$theMonth = 'December';
				}
				/* Start a new row for each row returned */
				echo '<tr height="25px">';
					/* Insert the hour range into the first column */
					echo '<td bgcolor="' . $color . '"><a href="?month=' . $statsMonth['month'] . '">' . $theMonth . ' ' . substr($statsMonth['month'], 0, -2) . '</a></td>';
					/* Work out the percentage that the hour range has been used */
					$percentage = $statsMonth['counted'] / $totalHits * 100;
					/* Insert the percentage into the second column */
					echo '<td bgcolor="' . $color . '" align="right">' . round($percentage, 1) . '%</td>';
					/* Work out the image percentage for each hour returned, this enables the most used hour range to give a bar of 100% */
					$imagePercent = $statsMonth['counted'] / $highest * 100;
					/* Create a div in the third column the width of the requred percentage bar */
					echo '<td bgcolor="' . $color . '"><div style="height:25px; width:' . $imagePercent . '%; background:#424242;"></div></td>';
					/* Enter the total number of records for each hour range (hits) into the fourth column */
					echo '<td bgcolor="' . $color . '" align="right">' . $statsMonth['counted'] . '</td>';
					/* Chek which color the background is set to, then change it to the alternate color to enable the results to be read with ease */
					if ($color=="#ebeff5") {
						$color="#FFFFFF";
					} else {
						$color="#ebeff5";
					}
				/* Close the table row for each result returned */
				echo '</tr>';
			}
			/* Generate the bottom of the table */
			echo '<tr>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td align="right">Total:</td>';
				echo '<td align="right">' . $totalHits . '</td>';
			echo '</tr>';
		echo '</table>';
		/* End of months */
		/* Start of hours */
		echo '<br><br>';
		/* Generate the table header */
		echo '<table id="hours" width="100%" cellspacing="0" cellpadding="3px" frame="box" style="border-color: #424242; border-width: 3px;">';
			echo '<tr>';
				echo '<td width="150px">Hour Range</td>';
				echo '<td width="50px"></td>';
				echo '<td></td>';
				echo '<td width="75px" align="right">Hits</td>';
			echo '</tr>';
			/* Work out the largest number of times an hour has been used in the database */
			$highest = $bdd->query("SELECT MAX(hour_occurs) FROM (SELECT `hour`, COUNT(*) AS hour_occurs FROM stats GROUP BY `hour`) Sub1")->fetchColumn();
			/* Set the background color for the table row */
			$color="#ebeff5";
			/* Query the database for the hour information for the requested month */
			$hour = $bdd->query("SELECT hour, COUNT( hour ) AS counted FROM stats GROUP BY hour ORDER BY hour");
			while ($statsHour = $hour->fetch())	
			{
				/* Set the hour range so instead of displaying '10', '10:00 - 10:59' is displayed */
				if ($statsHour['hour'] == '00') {
					$hourRange = '00:00 - 00:59';
				}
				if ($statsHour['hour'] == '01') {
					$hourRange = '01:00 - 01:59';
				}
				if ($statsHour['hour'] == '02') {
					$hourRange = '02:00 - 02:59';
				}
				if ($statsHour['hour'] == '03') {
					$hourRange = '03:00 - 03:59';
				}
				if ($statsHour['hour'] == '04') {
					$hourRange = '04:00 - 04:59';
				}
				if ($statsHour['hour'] == '05') {
					$hourRange = '05:00 - 05:59';
				}
				if ($statsHour['hour'] == '06') {
					$hourRange = '06:00 - 06:59';
				}
				if ($statsHour['hour'] == '07') {
					$hourRange = '07:00 - 07:59';
				}
				if ($statsHour['hour'] == '08') {
					$hourRange = '08:00 - 08:59';
				}
				if ($statsHour['hour'] == '09') {
					$hourRange = '09:00 - 09:59';
				}
				if ($statsHour['hour'] == '10') {
					$hourRange = '10:00 - 10:59';
				}
				if ($statsHour['hour'] == '11') {
					$hourRange = '11:00 - 1:59';
				}
				if ($statsHour['hour'] == '12') {
					$hourRange = '12:00 - 12:59';
				}
				if ($statsHour['hour'] == '13') {
					$hourRange = '13:00 - 13:59';
				}
				if ($statsHour['hour'] == '14') {
					$hourRange = '14:00 - 14:59';
				}
				if ($statsHour['hour'] == '15') {
					$hourRange = '15:00 - 15:59';
				}
				if ($statsHour['hour'] == '16') {
					$hourRange = '16:00 - 16:59';
				}
				if ($statsHour['hour'] == '17') {
					$hourRange = '17:00 - 17:59';
				}
				if ($statsHour['hour'] == '18') {
					$hourRange = '18:00 - 18:59';
				}
				if ($statsHour['hour'] == '19') {
					$hourRange = '19:00 - 19:59';
				}
				if ($statsHour['hour'] == '20') {
					$hourRange = '20:00 - 20:59';
				}
				if ($statsHour['hour'] == '21') {
					$hourRange = '21:00 - 21:59';
				}
				if ($statsHour['hour'] == '22') {
					$hourRange = '22:00 - 22:59';
				}
				if ($statsHour['hour'] == '23') {
					$hourRange = '23:00 - 23:59';
				}
				/* Start a new row for each row returned */
				echo '<tr height="25px">';
					/* Insert the hour range into the first column */
					echo '<td bgcolor="' . $color . '">' . $hourRange . '</td>';
					/* Work out the percentage that the hour range has been used */
					$percentage = $statsHour['counted'] / $totalHits * 100;
					/* Insert the percentage into the second column */
					echo '<td bgcolor="' . $color . '" align="right">' . round($percentage, 1) . '%</td>';
					/* Work out the image percentage for each hour returned, this enables the most used hour range to give a bar of 100% */
					$imagePercent = $statsHour['counted'] / $highest * 100;
					/* Create a div in the third column the width of the requred percentage bar */
					echo '<td bgcolor="' . $color . '"><div style="height:25px; width:' . $imagePercent . '%; background:#424242;"></div></td>';
					/* Enter the total number of records for each hour range (hits) into the fourth column */
					echo '<td bgcolor="' . $color . '" align="right">' . $statsHour['counted'] . '</td>';
					/* Chek which color the background is set to, then change it to the alternate color to enable the results to be read with ease */
					if ($color=="#ebeff5") {
						$color="#FFFFFF";
					} else {
						$color="#ebeff5";
					}
				/* Close the table row for each result returned */
				echo '</tr>';
			}
			/* Generate the bottom of the table */
			echo '<tr>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td align="right">Total:</td>';
				echo '<td align="right">' . $totalHits . '</td>';
			echo '</tr>';
		echo '</table>';
		/* End of hours */
		echo '<br><br>';
		/* Start of pages */
		echo '<table id="pages" width="100%" cellspacing="0" cellpadding="3px" frame="box" style="border-color: #424242; border-width: 3px;">';
			echo '<tr>';
				echo '<td width="150px">Page</td>';
				echo '<td width="50px"></td>';
				echo '<td></td>';
				echo '<td width="75px" align="right">Hits</td>';
			echo '</tr>';
			/* Work out the largest number of a given page */
			$highest = $bdd->query("SELECT MAX(page_occurs) FROM (SELECT `page`, COUNT(*) AS page_occurs FROM stats GROUP BY `page`) Sub1")->fetchColumn();
			/* Set the background color for the table row */
			$color="#ebeff5";
			/* Query the database for the page information for the requested month */
			$page = $bdd->query("SELECT page, COUNT( page ) AS counted FROM stats GROUP BY page ORDER BY counted DESC");
			while ($statsPage = $page->fetch())	
			{
				/* Start a new row for each row returned */
				echo '<tr height="25px">';
					/* Insert the page name i.e '/Home.html' or '?page=Home' into the first column */
					echo '<td bgcolor="' . $color . '">' . $statsPage['page'] . '</td>';
					/* Work out the percentage that the page has been used */
					$percentage = $statsPage['counted'] / $totalHits * 100;
					/* Insert the percentage into the second column */
					echo '<td bgcolor="' . $color . '" align="right">' . round($percentage, 1) . '%</td>';
					/* Work out the image percentage for each page, this enables the most used page to give a bar of 100% */
					$imagePercent = $statsPage['counted'] / $highest * 100;
					/* Create a div in the third coumn the width of the required percentage bar */
					echo '<td bgcolor="' . $color . '"><div style="height:25px; width:' . $imagePercent . '%; background:#424242;"></div></td>';
					/* Enter the total number of records for each page (hits) into the fourth column */
					echo '<td bgcolor="' . $color . '" align="right">' . $statsPage['counted'] . '</td>';
		
        			/* Check which color the background is set to, then change it to the alternate color to enable the results to be read with ease */
					if ($color=="#ebeff5") {
						$color="#FFFFFF";
					} else {
						$color="#ebeff5";
					}
				/* Close the table for each row returned */
				echo '</tr>';
			}
			/* Generate the bottom of the table */
			echo '<tr>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td align="right">Total:</td>';
				echo '<td align="right">' . $totalHits . '</td>';
			echo '</tr>';
		echo '</table>';
		/* End of pages */
		echo '<br><br>';
		/* Start of IP */
		/* Generate the table headers */
		echo '<table id="pages" width="100%" cellspacing="0" cellpadding="3px" frame="box" style="border-color: #424242; border-width: 3px;">';
			echo '<tr>';
				echo '<td colspan="4" width="150px">Top 10 IP Address\' (<a href="?detailed=ip">View all</a>)</td>';
				echo '<td width="75px" align="right">Hits</td>';
			echo '</tr>';
			/* Work out the largest number of a given IP */
			$highest = $bdd->query("SELECT MAX(ip_occurs) FROM (SELECT `ip`, COUNT(*) AS ip_occurs FROM stats GROUP BY `ip`) Sub1")->fetchColumn();
			/* Set the background color for the table row */
			$color="#ebeff5";
			/* Query the database for IP information for the requested month, limiting the results to 10 */
			$ip = $bdd->query("SELECT ip, COUNT( ip ) AS counted FROM stats GROUP BY ip ORDER BY counted DESC LIMIT 10");
			while ($statsIP = $ip->fetch())	
			{
				/* Start a new row for each row returned */
				echo '<tr height="25px">';
					/* Insert the IP address into the first column */
					echo '<td bgcolor="' . $color . '" width="150px">' . $statsIP['ip'] . '</td>';
					/* Work out the percentage that the IP has been used */
					$percentage = $statsIP['counted'] / $totalHits * 100;
					/* Insert the percentage into the second column */
					echo '<td bgcolor="' . $color . '" align="right" width="50px">' . round($percentage, 1) . '%</td>';
					/* Work out the image percentage for each IP , this enables the most used browser to give a bar of 100% */
					$imagePercent = $statsIP['counted'] / $highest * 100;
					/* Create a div in the third column the width of the required percentage bar */
					echo '<td bgcolor="' . $color . '"><div style="height:25px; width:' . $imagePercent . '%; background:#424242;"></div></td>';
					/* Insert an image of the country flag into the fourth column using the hostip.info API */
					echo '<td bgcolor="' . $color . '" width="35px"><IMG SRC="http://api.hostip.info/flag.php?ip=' . $statsIP['ip'] . '" title="IP address lookup by HostIP" ALT="IP Address Lookup by HostIP.info" height="25px" width="35px"></td>';
					/* Enter the total number of records for each IP (hits) into the fourth column */
					echo '<td bgcolor="' . $color . '" align="right">' . $statsIP['counted'] . '</td>';
					/* Check which color the background is set to, then change it to the alternate color to enable the results to be read with ease */
					if ($color=="#ebeff5") {
						$color="#FFFFFF";
					} else {
						$color="#ebeff5";
					}
				/* Close each table row returned */
				echo '</tr>';
			}
			/* Generate the bottom of the table */
			echo '<tr>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td align="right">Total:</td>';
				echo '<td align="right">' . $totalHits . '</td>';
			echo '</tr>';
		echo '</table>';
		/* End of IP */
		echo '<br><br>';
		/* Create a table with 2 columns to enable half size tables side by side */
		echo '<table width="100%" cellpadding="0" cellspacing="0">';
			echo '<tr valign="top">';
				echo '<td valign="top" width="50%">';
					/* Start of browsers */
					/* Generate the table headers */
					echo '<table id="browsers" width="98%" cellspacing="0" cellpadding="3px" frame="box" style="border-color: #424242; border-width: 3px;">';
						echo '<tr>';
							echo '<td colspan="3">Browser (<a href="?detailed=browser">Detailed information</a>)</td>';
							echo '<td width="75px" align="right">Hits</td>';
						echo '</tr>';
						/* Work out the largest number of a given browser */
						$highest = $bdd->query("SELECT MAX(browser_occurs) FROM (SELECT `browser`, COUNT(*) AS browser_occurs FROM stats GROUP BY `browser`) Sub1")->fetchColumn();
						/* Set the background color for the table row */
						$color="#ebeff5";
						/* Query the database for browser information for the requested month */
						$browser = $bdd->query("SELECT browser, COUNT( browser ) AS counted FROM stats GROUP BY browser ORDER BY counted DESC");
						while ($statsBrowser = $browser->fetch())	
						{
							/* Set the browserImage to blank incase no image is set */
							$browserImage = '';
							/* For each browser that can be listed from the stats script set the thumnail image */
							if ($statsBrowser['browser'] == 'Google Chrome') {
								$browserImage = '<img src="img/chrome.png" title="Google Chrome" />';
							}
							if ($statsBrowser['browser'] == 'Internet Explorer') {
								$browserImage = '<img src="img/ie.png" title="Internet Explorer" />';
							}
							if ($statsBrowser['browser'] == 'Mozilla Firefox') {
								$browserImage = '<img src="img/firefox.png" title="Mozilla Firefox" />';
							}
							if ($statsBrowser['browser'] == 'Apple Safari') {
								$browserImage = '<img src="img/safari.png" title="Apple Safari" />';
							}
							if ($statsBrowser['browser'] == 'Opera') {
								$browserImage = '<img src="img/opera.png" title="Opera" />';
							}
							if ($statsBrowser['browser'] == 'Netscape') {
								$browserImage = '<img src="img/netscape.png" title="Netscape" />';
							}
							if ($statsBrowser['browser'] == 'Unknown') {
								$browserImage = '<img src="img/unknown.png" title="Unknown browser" />';
							}
							/* Start a new row for each row returned */
							echo '<tr height="25px">';
								/* Insert the browser image into the first column */
								echo '<td bgcolor="' . $color . '" width="25px">' . $browserImage . '</td>';
								/* Work out the percentage that the browser has been used */
								$percentage = $statsBrowser['counted'] / $totalHits * 100;
								/* Insert the percentage into the second column */
								echo '<td bgcolor="' . $color . '" align="right" width="50px">' . round($percentage, 1) . '%</td>';
								/* Work out the image percentage for each browser version, this enables the most used browser to give a bar of 100% */
								$imagePercent = $statsBrowser['counted'] / $highest * 100;
								/* Create a div in the third column the width of the requred percentage bar */
								echo '<td bgcolor="' . $color . '"><div style="height:25px; width:' . $imagePercent . '%; background:#424242;"></div></td>';
								/* Enter the total number of records for each browser (hits) into the fourth column */
								echo '<td bgcolor="' . $color . '" align="right">' . $statsBrowser['counted'] . '</td>';
								/* Check which color the background is set to, then change it to the alternate color to enable the results to be read with ease */
								if ($color=="#ebeff5") {
									$color="#FFFFFF";
								} else {
									$color="#ebeff5";
								}
							/* Close the table row for each row returned */
							echo '</tr>';
						}
						/* Generate the bottom of the table */
						echo '<tr>';
							echo '<td></td>';
							echo '<td></td>';
							echo '<td align="right">Total:</td>';
							echo '<td align="right">' . $totalHits . '</td>';
						echo '</tr>';
					echo '</table>';
					/* End of browsers */
				/* Close the column for the browser table */
				echo '</td>';
				/* Create the column for the OS table */
				echo '<td valign="top" width="50%" align="right">';
					/* Start of OS */
					/* Generate the table headers */
					echo '<table id="os" width="98%" cellspacing="0" cellpadding="3px" frame="box" style="border-color: #424242; border-width: 3px;">';
						echo '<tr>';
							echo '<td colspan="3">Operating System</td>';
							echo '<td width="75px" align="right">Hits</td>';
						echo '</tr>';
						/* Work out the largest number of a given operating system */
						$highest = $bdd->query("SELECT MAX(os_occurs) FROM (SELECT `os`, COUNT(*) AS os_occurs FROM stats GROUP BY `os`) Sub1")->fetchColumn();
						/* Set the color for the table row */
						$color="#ebeff5";
						/* Query the database for the OS row */
						$os = $bdd->query("SELECT os, COUNT( os ) AS counted FROM stats GROUP BY os ORDER BY counted DESC");
						while ($statsOS = $os->fetch())	
						{
							/* Set the osImage to blank incase no image is set */
							$osImage = '';
							/* For each OS that can be listed from the stats script set the thumbnail image */
							if ($statsOS['os'] == 'Linux') {
								$osImage = '<img src="img/linux.png" title="Linux Based" />';
							}
							if ($statsOS['os'] == 'Mac') {
								$osImage = '<img src="img/mac.png" title="Apple Mac OS" />';
							}
							if ($statsOS['os'] == 'Windows') {
								$osImage = '<img src="img/windows.png" title="Microsoft Windows" />';
							}
							if ($statsOS['os'] == 'Unknown') {
								$osImage = '<img src="img/unknown.png" title="Unknown Operating System" />';
							}
							/* Start a new row for each returned */
							echo '<tr height="25px">';
								/* Insert the OS image into the first column */
								echo '<td bgcolor="' . $color . '" width="25px">' . $osImage . '</td>';
								/* Work out the percentage that the OS has been used */
								$percentage = $statsOS['counted'] / $totalHits * 100;
								/* Insert the percentage into the second column */
								echo '<td bgcolor="' . $color . '" align="right" width="50px">' . round($percentage, 1) . '%</td>';
								/* Work out the image percentage for each OS, this enables the most used OS to give a bar of 100% */
								$imagePercent = $statsOS['counted'] / $highest * 100;
								/* Create a div in the third column the width of the requred percentage bar */
								echo '<td bgcolor="' . $color . '"><div style="height:25px; width:' . $imagePercent . '%; background:#424242;"></div></td>';
								/* Enter the total number of records for each OS (hits) into the fourth column */
								echo '<td bgcolor="' . $color . '" align="right" width="50px">' . $statsOS['counted'] . '</td>';
								/* Check which color the background is set to, then change it to the alternate color to enable the results to be read with ease */
								if ($color=="#ebeff5") {
									$color="#FFFFFF";
								} else {
									$color="#ebeff5";
								}
							/* Close the table row for each row returned */
							echo '</tr>';
						}
						/* Generate the bottom of the table */
						echo '<tr>';
							echo '<td></td>';
							echo '<td></td>';
							echo '<td align="right">Total:</td>';
							echo '<td align="right">' . $totalHits . '</td>';
						echo '</tr>';
					echo '</table>';
					/* End of OS */
				/* Close the OS table column */
				echo '</td>';
			/* Close the Browser/OS row */
			echo '</tr>';
		/* Close the OS table */
		echo '</table>';
	}
}
?>
<?php require('includes/foot.php'); ?>