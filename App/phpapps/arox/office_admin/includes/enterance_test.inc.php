<?PHP
/**
* include (INCLUDES_CLASS_PATH . DS . 'class.enterance_test.php');
*/

/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
$enteranceexams = new enteranceexams();  

if (isset($_POST['registrationno'])){
	$enteranceexams->registration_no = $_POST['registrationno'];
}
if (isset($_POST['wardname'])){
	$enteranceexams->wardname = $_POST['wardname'];
}
if (isset($_POST['acadimic_session'])){
	$enteranceexams->acadimic_session = $_POST['acadimic_session'];
}
if (isset($_POST['sex'])){
	$enteranceexams->sex = $_POST['sex'];
}
if (isset($_POST['marks_obtain']))
{
	$enteranceexams->marks_obtain = $_POST['marks_obtain'];
}
if (isset($_POST['examination']))
{
	$enteranceexams->oral_examination = $_POST['examination'];
}
if (isset($_POST['family_interaction']))
{
	$enteranceexams->family_interaction = $_POST['family_interaction'];
}
if (isset($_POST['percentage']))
{
	$enteranceexams->percentage = $_POST['percentage'];
}

if ($enteranceexams->Save()){
	
}


?>





