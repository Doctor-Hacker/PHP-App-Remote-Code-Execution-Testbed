<?php
session_unset($_SESSION['eschools']['admin_user']);
session_unset($_SESSION['eschools']['admin_schid']);
session_unset($_SESSION['eschools']['admin_id']);
session_unset($_SESSION['eschools']['user_type']);
session_unset($_SESSION);
header("Location: ../?emsg=16");
exit;
	?>