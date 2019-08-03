<?php
/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
session_unset($_SESSION['eschools']['admin_user']);
session_unset($_SESSION['eschools']['admin_schid']);
session_unset($_SESSION['eschools']['admin_id']);
session_unset($_SESSION['eschools']['user_type']);
session_unset($_SESSION['eschools']);
session_unset($_SESSION);
session_destroy();
//header("Location: ?pid=1");
header("Location: ../?emsg=20");
exit;
	?>