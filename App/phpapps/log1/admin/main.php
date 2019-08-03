<?php
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
 * (C) 2009 by log1 
 * Kuba Kuropatnicki
 * log1@poczta.fm
 * log1CMS ver lite.
 *~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
  //include('engine/head.php');
  function __autoload($class_name) {
   require_once 'engine/' . $class_name . '.php';
  }

  session_start();
  require_once('../functions/myFunctions.php');

  include('config.php');

  $hh = head::getInstance();
  $language = $hh->getHead()->getLanguage();
  $bgcolor = $hh->getHead()->bgcolor;
  $textcolor = $hh->getHead()->textcolor;
  $specialcolor = $hh->getHead()->specialcolor;
  require_once('i18n.php');
  if($_SESSION[md5($login)]){
    if(isSet($_SESSION['adminIp']) && $_SESSION['adminIp'] != myFunctions::giveIP() ){
      session_destroy();
      header("Location: index.php");
    }else{
      $isRegistered = true;
    }
  }else{
    session_destroy();
    header("Location: index.php");
  }
  $time = microtime();
  $time = explode(' ', $time);
  $time = $time[1] + $time[0];
  $start = $time;
  //print_r($_SESSION);

 /**
  * Main Admin Controller
  */
  /* check dir/file permission */
  $fileList = array('admin/config.php' => 'config.php',
				   'admin/template.php' => 'template.php',
				   'index.php' => '../index.php');
				   
  $isPermissionError = false;
  $permissionErrors = array();
  if(!myFunctions::checkFilePermissions('../db/db.php','0777')){
    //myFunctions::changePermission('../db/db.php','0777',true); // chmod -R
	//if(!myFunctions::checkFilePermissions('../db/db.php','0777')){
	$isPermissionError = true;
    $permissionErrors[] = '<p>perm(db) != 777</p>';
	//}
  }
  
  foreach($fileList as $info => $fileName){
	if(!myFunctions::checkFilePermissions($fileName,'0777')){
	  //if(!myFunctions::changePermission($fileName, '0777')){
	  $isPermissionError = true;
	  $permissionErrors[] = '<p>perm('.$info.') != 777</p>';
	  //}
	}
  }
  //foreach...
  /*
  if(!myFunctions::checkFilePermissions('config.php','0777')){
  	$isPermissionError = true;
    $permissionErrors[] = '<p>perm(admin/config.php) != 777</p>';
  }
  if(!myFunctions::checkFilePermissions('engine/styles/colors.php','0777')){
  	$isPermissionError = true;
    $permissionErrors[] = '<p>perm(admin/engine/styles/colors.php) != 777</p>';
  }*/
  if($isPermissionError){
    echo '<div id="warningInfo">';
  foreach($permissionErrors as $error)
    print $error;
  echo '</div>';
  }
  
  $action = $_REQUEST['action'];
  //print_r($_GET);
  switch($action) {
    case 'step1':
      include_once('engine/edit_head.php');
      break;
    case 'step2':
      //include('engine/menu.php');
      include_once('engine/edit_menu.php');
      break;
    case 'step3':
      //include('engine/menu.php');
      include_once('engine/edit_files.php');
      break;
    case 'step4':
      include_once('engine/choose_template.php');
      break;
    case 'savemenu':
      require_once('../db/menu/menuItems.php');
      //include('engine/menu.php');
      include_once('engine/save_menu.php');
      break;
    case 'savefile':
      include_once('../db/menu/menuItems.php');
      include_once('engine/save_file.php');
      break;
    case 'upload':
      include_once('engine/upload.php');
      break;
    case 'upload_file':
      include_once('engine/uploadFile.php');
      break;
    case 'delete':
      if(isSet($_GET['file'])){
        $file = $_GET['file'];
        myFunctions::deleteFile('../db/uploaded/'.basename($file));
      }
      include_once('engine/upload.php');
      break;
    case 'logout':
      session_destroy();
      header("Location: index.php");
      exit();
      break;
    default:
      die('Hacking Attempt');
  }

?>
