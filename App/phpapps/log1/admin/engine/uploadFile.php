<?php
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
 * (C) 2009 by log1 
 * Kuba Kuropatnicki
 * log1@poczta.fm
 * log1CMS ver lite.
 *~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
 if(!$isRegistered || !ereg("main.php", $_SERVER['SCRIPT_FILENAME']))
   die('error');

//construct the path to /db/images:
$dirPath = $_SERVER['PHP_SELF']; 
$toCut = "/admin/main.php";
$dirPath = str_replace($toCut,"",$dirPath) . '/db/uploaded/';

//echo $dirPath;
$result = 'error';
if(isset($_FILES['ifile']['tmp_name'])){
  $max_size = 1024*1024*1024*1024; //don't care about it
  $tmp_file = $_POST['ifile'];
  if (is_uploaded_file($_FILES['ifile']['tmp_name'])){
    if ($_FILES['ifile']['size'] > $max_size){
      $result = 'error';
    }
    else if($_FILES['ifile']['type'] === "application/x-httpd-php" ||
            $_FILES['ifile']['type'] === "application/octet-stream"){
      $result = 'error';
    }else{
      move_uploaded_file($_FILES['ifile']['tmp_name'],
      $_SERVER['DOCUMENT_ROOT'] . $dirPath .$_FILES['ifile']['name']);
      if(@chmod(".". $dirPath . $tmp_file, 0777)){
        $result = 'ok';
      }
      $result = 'ok';
    }
  }else
    $result = 'error';
}
echo $result;
?>


