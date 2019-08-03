<?php
/**
 * Picasa Class
 *
 * @author log1@poczta.fm
 */
class picasa {

  protected $uName;
  protected $thumbSize;
  protected $picasaUrl;

  public function __construct($uName, $thumbSize='72c') {
    $this->uName = $uName;
    $this->thumbSize = $thumbSize;
    $this->constructPicasaUrl();
  }
  
  private function constructPicasaUrl() {
    $this->picasaUrl = "http://picasaweb.google.com/data/feed/api/user/".$this->uName."?kind=album&access=public&thumbsize=".$this->thumbSize;
  }

  public function getAlbumList() {
    $result = array();
    try {
      $xml_file = $this->custom_get_file_content($this->picasaUrl);
      $xml = new SimpleXMLElement($xml_file);
      $xml->registerXPathNamespace('gphoto', 'http://schemas.google.com/photos/2007');
      foreach($xml->entry as $feed) {
        $group = $feed->xpath('./media:group/media:thumbnail');
        $a = $group[0]->attributes(); //thumbnail path
        $id = $feed->xpath('./gphoto:id'); // album id
        $tmp = array();
        $tmp['title'] = (string)$feed->title;
        $tmp['id'] = (string)$id[0];
        $tmp['thumb'] = (string)$a[0];
        $result[] = $tmp;
      }
    } catch (Exception $e) { }
    return $result;
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
