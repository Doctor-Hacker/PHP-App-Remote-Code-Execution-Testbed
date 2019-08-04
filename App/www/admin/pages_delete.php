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
/* Check that the page is set */
if (isset($_GET["page"])) {
	$del_ = $_GET['page'];
	$del = str_replace('_', ' ', $del_);
	/* Check if the page you are editing has sub pages */
	$countSub = $bdd->prepare("SELECT * FROM pages WHERE menu = :editPage");
	$countSub->bindParam(':editPage', $del);
	$countSub->execute();
	$subs = $countSub->rowCount();
	/* If the page has subs then set them to blank (Hidden) to remove them from the deleted pages menu */
	if ($subs != '0') {
		$hiddenMenu = '';
		$updateSubs = "UPDATE pages SET menu=? WHERE menu=?";
		$changeSubs = $bdd->prepare($updateSubs);
		$changeSubs->execute(array($hiddenMenu, $del));			/* submit the form */
		$changeSubs->CloseCursor();
	}
    $countSub->CloseCursor();
	/* Delete the page */
	$sql = "DELETE FROM pages WHERE linkText = :del";
	$stmt = $bdd->prepare($sql);
	$stmt->bindParam(':del', $del, PDO::PARAM_INT);   
	$stmt->execute();
    $stmt->CloseCursor();
	/* Re-load the pages page with a message */
	echo 'Redirecting...';
	echo "<meta http-equiv='refresh' content='0; url=pages.php?gone=$del_'>";
}
require('includes/foot.php'); ?>