<?php
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
 * (C) 2009 by log1 
 * Kuba Kuropatnicki
 * log1@poczta.fm
 * log1CMS ver lite.
 *~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/

class menuItem {

  public $id;
  public $type;
  public $name;
  public $fileName;

  public function __construct($id, $type, $name) {
    $this->id = $id;
    $this->type = $type;
    $this->name = $name;
    $this->fileName = myFunctions::itemToNormalText($name);
  }

  public function url_name() {
    $name = urlencode($name);
    $name = str_replace('+', '-', $this->name);
    return $name;
  }

}
?>
