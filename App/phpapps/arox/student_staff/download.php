<?php
if ( isset($_REQUEST["document"])&&$_REQUEST["document"]!="") {
$file = $_REQUEST['document'];
header("Content-type: application/force-download");
header("Content-Transfer-Encoding: Binary");
header("Content-length: ".filesize($file));
header("Content-disposition: attachment; filename=\"".$file."\"");
readfile($file);
exit;
}
?>
