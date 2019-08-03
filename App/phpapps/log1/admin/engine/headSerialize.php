<?php
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
 * (C) 2010 by log1 
 * Kuba Kuropatnicki
 * log1@poczta.fm
 * log1CMS ver lite.
 *~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/

class headSerialize {

  public $title;
  public $desc;
  public $language;
  public $bgcolor;
  public $textcolor;
  public $specialcolor;
  public $googleLogin;
  public $email;
  public $copyright;

  public function __construct() {}

  public function getLanguage() {
    return $this->language ? $this->language : 0;
  }
   
}
?>
