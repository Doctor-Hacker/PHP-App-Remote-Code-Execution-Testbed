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
if ($access=='0') {
	if (isset($_GET["del"]) && isset($_GET['name'])) {
		$del_ = $_GET['del'];
		$name = $_GET['name'];
		$del = str_replace('_', ' ', $del_);
	    echo "<div class='notification'><strong>Are you sure you want to permenantly delete $name's account? <a href='user_delete.php?id=$del&name=$name'>Click here to confirm</a>.</strong></div>";    
		echo "<br>";
	}
	if (isset($_GET["gone"])) {
		$del = $_GET['gone'];
	    echo "<div class='notification'><strong>$del's  account has been permenantly deleted.</strong></div>";    
		echo "<br>";
	}
	echo '<strong><a href="user_create.php">Create a new user</a></strong><br /><br />';
	echo '<table width="100%" cellpadding="3px" cellspacing="0">';
	echo '<tr>';
	echo '<td>ID</td>';
	echo '<td>Level</td>';
	echo '<td>Name</td>';
	echo '<td>E-mail</td>';
	echo '<td>&nbsp;</td>';
	echo '<td width="25px">&nbsp;</td>';
	echo '</tr>';
	$color="#cce0ff";
	$listUsers = $bdd->query('SELECT id, access, name, email FROM users');
	while ($data = $listUsers->fetch()) {
		if ($data['access']=='0') {
			$userLevel='<span style="color: red;">Super user</span>';
		} elseif ($data['access']=='1') {
			$userLevel='<span style="color: blue;">Admin</span>';
		} else {
		    $userLevel='Website only';
		}
		echo '<tr><td bgcolor="' . $color . '">' . $data['id'] . '</td><td bgcolor="' . $color . '">' . $userLevel . '</td><td bgcolor="' . $color . '">' . $data['name'] . '</td><td bgcolor="' . $color . '">' . $data['email'] . '</td>';
		if ($data['access']=='0') {
			echo '<td bgcolor="' . $color . '"><a href="user_edit.php?id=' . $data['id'] . '"><img src="img/edit.png" title="Edit user" /></a></td bgcolor="' . $color . '"><td bgcolor="' . $color . '"></td>';
		} else {
			echo '<td bgcolor="' . $color . '"><a href="user_edit.php?id=' . $data['id'] . '"><img src="img/edit.png" title="Edit user" /></a></td bgcolor="' . $color . '"><td bgcolor="' . $color . '"><a href="user_manage.php?del=' . $data['id'] . '&name=' . $data['name'] . '"><img src="img/delete.png" title="Delete user" /></a></td>';
		}
		echo "</tr>";
		if ($color=="#cce0ff") {
			$color="#FFFFFF";
		} else {
			$color="#cce0ff";
		}
	}
	$listUsers->closeCursor();
	echo "</table>";
} else {
	echo "<div style='text-align: center'><span style='color: red; font-size: 22px;'>Only a 'Super user' can access this section.</span></div>";
}
require('includes/foot.php'); ?>