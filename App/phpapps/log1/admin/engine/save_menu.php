<?php
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
 * (C) 2008 by log1 
 * Kuba Kuropatnicki
 * log1@poczta.fm
 * log1CMS ver lite.
 *~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
 if(!$isRegistered || !ereg("main.php", $_SERVER['SCRIPT_FILENAME']))
   header("Location: ../index.php");
//require_once('menu.php');
//require_once('../../db/menu/menuItems.php');
//require_once('../../functions/myFunctions.php');

$type = $_GET['type'];
switch ($type) {
  case 'type1' : $type = 'page'; break;
  case 'type2' : $type = 'gallery'; break;
  case 'type3' : $type = 'form'; break;
  default: $type = 'page';
}

$newMenu = $_POST['sortme'];
$newMenuLinks = array();

$mm = menu::getInstance();
$mm->menu = array();
$mm->clearMenu();

foreach($newMenu as $newM){
  $tmp = split('_', $newM);
  $name = $tmp[0];
  $type = $tmp[1];
  if (!in_array($type, array('page', 'gallery', 'form'))) {
    $type = 'page';
  }

  $link = myFunctions::itemToNormalText($name);
  $link = strtolower($link);
  $newMenuLinks[] = $link.'_'.$type;  
  //$mm->AddMenuItem($newM, $link);
  $mm->addMenuItem($type, $name);
}

//clean up from files deleated from menu:
foreach($menuFiles as $item){
  if(!(in_array($item, $newMenuLinks))){
    myFunctions::deleteFile('../db/files/'.$item.'.php');
  }
}
//$mm->menu = $newMenu;
//print_r($mm->menu);
$mm->generateMenuItems();
//$mm->generateXMLScheme();
$mm->generateMenu();
$mm->saveMenu();

echo 'done';

?>
