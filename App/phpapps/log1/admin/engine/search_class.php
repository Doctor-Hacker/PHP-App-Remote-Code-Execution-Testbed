<?php
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
 * (C) 2009-2010 by log1 
 * Kuba Kuropatnicki
 * log1@poczta.fm
 * log1CMS ver lite.
 *~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/

//include('../../db/menu/menuItems.php');
class SearchClass {

  private $keys = array();
  private $searchResults = array();
  private $searchItems = array();
  
  public function SearchClass($keys, $searchItems){
    $this->searchItems = $searchItems;
    $this->keys = explode(' ', $keys);
    //print_r($this->keys);
    $this->doSearch();
    //print_r($this->searchResults);
  }

  public function getResults() {
    return $this->searchResults;
  }

  public function doSearch() {
    foreach($this->searchItems as $item) {
      $tmp = split('_', $item);
      if ($tmp[1] == 'page') {
        $path = 'db/files/' . $item . '.php';
        $content = file_get_contents($path);
        $found = true;
        foreach($this->keys as $i=>$key){
          if(!@strpos($content, $key)){
              $found = false;
              break;
          }
          //if($found) echo $i . ' jest w: ' . $item . " \r\n" ;
        }
        if($found){
          // echo 'jest w: ' . $item . " \r\n" ;
          $this->searchResults[] = $item;
        }
      }
    }
  }
}

//$s = new SearchClass("t",$menuItems);
//print_r($s);

?>
