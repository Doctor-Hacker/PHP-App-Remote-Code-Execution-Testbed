<?php
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
 * (C) 2009-2010 by log1 
 * Kuba Kuropatnicki
 * log1@poczta.fm
 * log1CMS ver lite.
 *~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/

class head {

  private $headFile = 'head.inc';
  private $colorFile = 'colors.php';
  private $headItems = 'headItems.php';


  private $serializedHeadFile = 'head_db.php';
  private $headObj;
  
  function &getInstance() {
    static $headInstance = null;
    if(!isset($headInstance)){
      $headInstance = new head();
    }
    return $headInstance;
  }

  public function __construct(){
    //initialize variables:
    $this->XMLfile =  '../db/head/headScheme.php';
    $this->headFile = '../db/head/head.inc';
    $this->headItems = '../db/head/headItems.php';
    $this->colorFile = '../db/colors.php';
    $this->serializedHeadFile = '../db/head/head_db.php';
    $this->loadHead();
  }

  // getter
  public function getHead() {
    return $this->headObj;
  }
    
  private function loadHead() {
    try {
      $this->headObj = unserialize(file_get_contents($this->serializedHeadFile, true));
      if ($this->headObj== null) $this->headObj = new headSerialize();
    } catch (Exception $e) {
      $this->headObj = new headSerialize();
    }
  }
  
  public function saveHead() {
    try {
      file_put_contents($this->serializedHeadFile, serialize($this->headObj));
    } catch (Exception $e) { }
  }

  public function setHead($newHead=null, $newDesc=null, $newKey=null, $language=null,
    $bgcolor=null, $textcolor=null, $specialcolor=null,$googleLogin=null,$email=null,$copyright=null){
    if($newHead)
      $this->headObj->title = $newHead;
    if($newDesc)
      $this->headObj->desc = $newDesc;
    if($newKey)
      $this->headObj->key = $newKey;
    //must be always selected:
    $this->headObj->language = $language;
    if($bgcolor)
      $this->headObj->bgcolor = $bgcolor;
    if($textcolor)
      $this->headObj->textcolor = $textcolor;
    if($specialcolor)
      $this->headObj->specialcolor = $specialcolor;
    if($googleLogin)
      $this->headObj->googleLogin = $googleLogin;
    if($email)
      $this->headObj->email = $email;
    if($copyright)
      $this->headObj->copyright = $copyright;
    $this->saveHead();
    $this->generateHeadItems();
  }
 	
 	
  public function generateHead(){

    $this->Thead["language"] == 0 ? $encoding = "UTF-8" : $encoding = "utf-8";
    $text .= '<title>'.$this->Thead["title"].'</title>' . "\r\n";
    $text .= '<meta http-equiv="Content-Type" content="text/html; charset='.$encoding.'" />' . "\r\n";
    $text .= '<meta http-equiv="Generator" content="Log1 CMS" />' . "\r\n";
    $text .= '<meta name="description" content="'. $this->Thead["desc"] .'" />' . "\r\n";
    $text .= '<meta name="keywords" content="' . $this->Thead["key"]. '" />' . "\r\n";

    try{
        myFunctions::saveFileContent($this->headFile, $text);

    }catch(Exception $e){
      echo 'Error: ',  $e->getMessage(), "\n";
    }

    $text = '<?php ' . "\r\n";
    $text .= ' $bgcolor = "' . $this->headObj->bgcolor . '";' . "\r\n";
    $text .= ' $textcolor = "' . $this->headObj->textcolor . '";' . "\r\n";
    $text .= ' $specialcolor = "' . $this->headObj->specialcolor . '";' . "\r\n";
    $text .= '?>' . "\r\n";

    try{
        myFunctions::saveFileContent($this->colorFile, $text);

    }catch(Exception $e){
      echo 'Error: ',  $e->getMessage(), "\n";
    }
  }

  public function generateHeadItems(){
    $text = '<?php ';
    $text .= '$headItems = array( ';
    $i = 0;
    foreach($this->headObj  as $var=>$value) {
      $text .= '"'.$var.'" => "'.$value.'", ';
      $i++;
    }
    $text .= '); ?>';
    myFunctions::saveFileContent($this->headItems, $text);	
  }
    
}
?>