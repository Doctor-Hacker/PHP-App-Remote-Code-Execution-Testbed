<?php
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
 * (C) 2009 by log1 
 * Kuba Kuropatnicki
 * log1@poczta.fm
 * log1CMS ver lite.
 *~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
 if(!$isRegistered || !ereg("main.php", $_SERVER['SCRIPT_FILENAME']))
   header("Location: ../index.php");
  //get parameters from request(post):
  $content = $_POST['content'];
  $file = $_POST['filename'];
  $tmp = split('_', $file);
  $type = $tmp[1];

  if ($type == 'page') {
    if (in_array($file, $menuFiles)) {
      $file = '../db/files/' . $file . '.php';
      echo $file;
      echo '~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~';
      //echo $content;
      $content = str_replace('\\', '', $content);
      $content = str_replace('00and00', '&', $content);
      $content = str_replace('00plus00', '+', $content);
      $content = str_replace('../db/uploaded', 'db/uploaded', $content);
      $content = stripslashes($content);
      //$content = utf8_encode($content);
      //echo '-:'  . $content;
      //$content = htmlentities($content);
      //$content = nl2br($content);
      //echo 'zawartosc: ' . $c;
      myFunctions::saveFileContent($file, $content);
      /*$fp = @fopen($file, "wb");
      if ($fp) {
        fwrite($fp, $content);
        fclose($fp);
      }
      else
        echo 'Error: zapis nie powiodl sie';*/
     } else die('Error: bad file name: ' . $file);
  } else if ($type == 'gallery') {
    if (in_array($file, $menuFiles)) {
      $file = '../db/files/' . $file . '.php';
      myFunctions::saveFileContent($file, $content);
      echo $content;
    } else die('Error: bad file name: ' . $file);
   
  }
     

?>
