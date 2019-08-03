<?php
require_once('config.php');
require_once('../functions/myFunctions.php');
session_start();
if($_SESSION[md5($login)]){
    if(isSet($_SESSION['adminIp']) && $_SESSION['adminIp'] != myFunctions::giveIP() ){
      print '-1';
    }
  }else{
    die('-1');
  }
  require_once('../functions/myFunctions.php');
  $files = myFunctions::listDir('../db/uploaded/');
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>File list</title>
    <link href="admin/engine/styles/main.css.php" rel="stylesheet" type="text/css" />

</head>
<body>
<ol>
<?php
 foreach($files as $file){
   echo '<li><a href="../db/uploaded/'.$file['name'].'">'.$file['name'].'</a></li>';
 }
?>
</ol>
</body>
</html>
