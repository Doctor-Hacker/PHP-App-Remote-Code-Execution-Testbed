<?php
$newline = "\r\n";	
if (isset($_POST["submit"]))
{
	$filename = stripslashes($_POST["filename"]);
	$mailserver = $_POST['mailserver'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	if ($_POST['oldfile'] != "")
	{
		$oldfile = "email/". $_POST['oldfile'];
		unlink($oldfile);
             }
	
	$line1 = '<?php' . $newline;
	$line2 = '$mailserver = "'. "$mailserver" . '";' . $newline;
	$line3 = '$username = "'. "$username" . '";' . $newline;
	$line4 = '$password = "'. "$password" . '";' . $newline;
	$line5 = '?>';
	$out2file = $line1 . $line2 . $line3 . $line4 . $line5;
	$filename="email/".$filename . ".email";
	$gp = fopen($filename,'w');
	fwrite($gp, $out2file);
	fclose($gp);
	header('Location: email.php');
	exit();

}
if (isset($_GET['mode']))
{
	if($_GET['mode'] == "del")
	{
		$emailfile = $_GET['mailbox'];
		$filename = "email/" . $emailfile;
		unlink($filename);
		header('Location: email.php');
		exit();

	}
}
?>
