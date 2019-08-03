<?php
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
 * (C) 2009 by log1 
 * Kuba Kuropatnicki
 * log1@poczta.fm
 * log1CMS ver lite.
 *~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/

class menuSerialize {

  public $menuItems = array();

  public function __construct() { }

  public function addItem($type, $name) {
    $id = count($this->menuItems);
    $item = new menuItem($id, $type, $name);
    $this->menuItems[] = $item;
  }
  
}
?>
