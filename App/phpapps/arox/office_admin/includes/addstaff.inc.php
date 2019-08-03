<?PHP
/**
* include (INCLUDES_CLASS_PATH . DS . 'class.es_addstaff.php');
*/
sm_registerglobal('pid', 'action',  'uid', 'admin');
/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}

$form = new es_addstaff();
if ($form->Save()){
	
}

?>



