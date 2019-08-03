<?php
/**
 * Picasa Album Class
 *
 * @author log1@poczta.fm
 * 
 */
class picasaAlbum {
  
  protected $uName;
  protected $albumId;
  protected $picasaAlbumUrl;
  public $title;

  public function __construct($uName, $albumId) {
    $this->uName = $uName;
    $this->albumId = $albumId;
    $this->thumbSize = $thumbSize;
    $this->constructPicasaAlbumUrl();
  }


  public function constructPicasaAlbumUrl() {
    $this->picasaAlbumUrl = 'http://picasaweb.google.com/data/feed/api/user/'.$this->uName;
    $this->picasaAlbumUrl .= '/albumid/'.$this->albumId.'?kind=photo&access=public&thumbsize=144u';
  }

  public function getImagesList() {
    $list = array();
    try {
      $xml_file = $this->custom_get_file_content($this->picasaAlbumUrl);
      $xml = new SimpleXMLElement($xml_file);
      $this->title = (string)$xml->title[0];
      foreach($xml->entry as $feed) {
        $tmp = array();
        $group = $feed->xpath('./media:group/media:thumbnail'); // thumbnail
		$a = $group[0]->attributes(); 
		$b = $feed->content->attributes(); 
        $tmp['thumb'] = (string)$a['url'];
        $tmp['url'] = (string)$b['src'];
        $list[] = $tmp;//(string)$b['src'];
      }
    } catch (Exception $e) { }
    return $list;
  }

  public function custom_get_file_content($url) {
    if (function_exists('curl_init')) {
       $ch = curl_init();
       curl_setopt($ch, CURLOPT_URL, $url);
       curl_setopt($ch, CURLOPT_HEADER, 0);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
       curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.7.5) Gecko/20041107 Firefox/1.0');
       $content = curl_exec($ch);
       curl_close($ch);
    } else {
       $content = file_get_contents($url);
    }
    return $content;
  }


}
?>
