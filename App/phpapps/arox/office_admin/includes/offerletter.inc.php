<?php
 /**End of the permissions    **/
/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
sm_registerglobal('pid', 'action');
/******************** registration ***********************/
$es_candidate   = new es_candidate();
$es_requirement = new es_requirement();
$es_shortlisted = new es_shortlisted();
$es_offerletter = new es_offerletter();
$es_staff       = new es_staff();
$es_tcmaster    = new es_tcmaster();
$es_tcstudent   = new es_tcstudent();
?>
