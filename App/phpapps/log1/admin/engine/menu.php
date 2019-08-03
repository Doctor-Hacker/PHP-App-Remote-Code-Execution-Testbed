<?php
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
 * (C) 2009-2010 by log1 
 * Kuba Kuropatnicki
 * log1@poczta.fm
 * log1CMS ver lite.
 *~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/

 class menu {
  public $menu = array();
  private $menuFile = 'menu.inc';
  private $menuItems = 'menuItems.php';

  private $serializedMenuFile = 'menu_db.php';

  private $menuObj;

  function &getInstance() {
    static $menuInstance = null;
    if(!isset($menuInstance)){
      $menuInstance = new menu();
    }
    return $menuInstance;
  }
 	
  //initializer
  public function __construct() {
    $this->menuFile = '../db/menu/menu.inc';
    $this->menuItems = '../db/menu/menuItems.php';
    $this->serializedMenuFile = '../db/menu/menu_db.php';
    $this->menuObj = new menuSerialize();
    $this->loadMenu();
    //print_r($this->menuObj);
    //$this->addMenuItem('page', 'test');
    //$this->addMenuItem('page', 'test2');
  }

  private function loadMenu() {
    try {
      $this->menuObj = unserialize(file_get_contents($this->serializedMenuFile, true));
      if ($this->menuObj == null) $this->menuObj = new menuSerialize();
    } catch (Exception $e) {
      $this->menuObj = new menuSerialize();
    }
  }

  public function clearMenu() {
    $this->menuObj->menuItems = array();
  }

  public function saveMenu() {
    file_put_contents($this->serializedMenuFile, serialize($this->menuObj));
  }

  public function addMenuItem($type, $name) {
    $this->menuObj->addItem($type, $name);
    $link = myFunctions::itemToNormalText($name);
    $link = strtolower($link);
     //utwórz plik dla tego item'u:
    $path = '../db/files/'.$link.'_'.$type.'.php';
    if(myFunctions::checkIfExist($path)){
      myFunctions::saveFileContent($path, '');
    }
  }
 	
  // generate menu file
  public function generateMenu() {
    $text = "";
    //$text = "<ul>";
    foreach($this->menu as $m){
      $text .= '<li><a href="index.php?q='.$m["link"].'">'.$m["name"].'</a></li>';
    }
    //$text .= "</ul>";
    myFunctions::saveFileContent($this->menuFile, $text);
  }

  public function generateMenuItems(){
    $text = '<?php ';
    // ------------------------------
    $text .= '$menuFiles = array( ';
    foreach($this->menuObj->menuItems as $m) {
      $text .= '"'.$m->fileName.'_'.$m->type.'", ';
    }
    $text .= ');' . "\r\n";
    // ------------------------------
    $text .= '$menuNames = array( ';
    foreach($this->menuObj->menuItems as $m){
      $text .= '"'.$m->name.'", ';
    }     
    $text .= ');' . "\r\n";
    $text .= '$menuUrls = array( ';
    foreach($this->menuObj->menuItems as $m){
      $text .= '"'.$m->url_name().'", ';
    }     
    $text .= ');' . "\r\n";    
  
    $text .= ' ?>';
    // ------------------------------
    myFunctions::saveFileContent($this->menuItems, $text);	
  }
 	
  // getter
  public function giveMenu(){
    return $this->menuObj->menuItems;
  }
 }

?>
