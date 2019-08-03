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
/* Function getBrowser from - http://stackoverflow.com/questions/2199793/php-get-the-browser-name submitted by Sumit Bijvani */
$u_agent = $_SERVER['HTTP_USER_AGENT'];
$bname = 'Unknown';
$platform = 'Unknown';
$version= "";
/* First get the platform? */
if (preg_match('/linux/i', $u_agent)) {
	$platform = 'Linux';
} elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
	$platform = 'Mac';
} elseif (preg_match('/windows|win32/i', $u_agent)) {
	$platform = 'Windows';
}
/* Next get the name of the useragent yes seperately and for good reason */
if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) {
	$bname = 'Internet Explorer';
	$ub = "MSIE";
} elseif(preg_match('/Firefox/i',$u_agent)) {
	$bname = 'Mozilla Firefox';
	$ub = "Firefox";
} elseif(preg_match('/Chrome/i',$u_agent)) {
	$bname = 'Google Chrome';
	$ub = "Chrome";
} elseif(preg_match('/Safari/i',$u_agent)) {
	$bname = 'Apple Safari';
	$ub = "Safari";
} elseif(preg_match('/Opera/i',$u_agent)) {
	$bname = 'Opera';
	$ub = "Opera";
} elseif(preg_match('/Netscape/i',$u_agent)) {
	$bname = 'Netscape';
	$ub = "Netscape";
}
/* finally get the correct version number */
$known = array('Version', $ub, 'other');
$pattern = '#(?<browser>' . join('|', $known) . ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
if (!preg_match_all($pattern, $u_agent, $matches)) {
/* we have no matching number just continue */
}
/* see how many we have */
$i = count($matches['browser']);
if ($i != 1) {
	/*we will have two since we are not using 'other' argument yet */
	/*see if version is before or after the name */
	if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
		$version= $matches['version'][0];
	} else {
		$version= $matches['version'][1];
	}
} else {
	$version= $matches['version'][0];
}
/* check if we have a number */
if ($version==null || $version=="") {$version="?";}
/* End of getBrowser */
/* Gather the stats information to enter into the database */
$statsBrowser = $bname;
$statsVersion = $version;
$statsOS = $platform;
$statsDay = date('d');
$month = date('m');
$year = date('Y');
$statsMonth = $year . $month;
$statsHour = date('H');
$statsPage = $_SERVER['REQUEST_URI'];
$statsIP = $_SERVER['REMOTE_ADDR'];
/* submit the form */
$insertStats = "INSERT INTO stats (browser,version,os,day,month,hour,page,ip) VALUES(:browser,:version,:os,:day,:month,:hour,:page,:ip)";
$queryStats = $bdd->prepare($insertStats);
$queryStats->execute(array(':browser'=>$statsBrowser,
						   ':version'=>$statsVersion,
						   ':os'=>$statsOS,
						   ':day'=>$statsDay,
						   ':month'=>$statsMonth,
						   ':hour'=>$statsHour,
						   ':page'=>$statsPage,
						   ':ip'=>$statsIP));
$queryStats->CloseCursor();
?>