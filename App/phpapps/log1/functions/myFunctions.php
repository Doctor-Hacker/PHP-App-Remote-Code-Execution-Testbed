<?php

class myFunctions{

  public function myFunctions(){
  }

  /**
   * Funkcja podaje "prawdziwy" IP klienta (w przypadku korzystania z PROXy).
   *
   * @return real ip
   */
  public static function giveIP(){
    if (!empty($_SERVER['HTTP_CLIENT_IP'])){
      //check ip from share internet
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
      //to check ip is pass from proxy
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }else
      $ip=$_SERVER['REMOTE_ADDR'];
    return $ip;
  }

  public static function giveUserAgent(){
    return $_SERVER['HTTP_USER_AGENT'];
  }
  
  public static function changePermission($fileName, $permission, $recursive=null){
	@chmod($fileName, $permission);  // octal; correct value of mode 0755 / 0777 etc.
	if($recursive=null) {
	  return myFunctions::checkFilePermissions($fileName, $permission);
	}else{
	  // chmod -R(ecursive)
	  if(is_dir($fileName)) {
	    $files = array_slice(scandir($fileName), 2); //remove `'. and `..' 
        foreach($files as $file) {
		  myFunctions::changePermission($fileName."/".$file, $permission, true);         
		}
	  }
	  return 0;
	}
  }

  public static function checkFilePermissions($fileName, $permission){
    $system = substr($_ENV["OS"],0, 7);//$_ENV["OS"];
    if($system == "Windows")
      return 1;
    if( substr(sprintf('%o', fileperms($fileName)), -4) != $permission )
      return 0;
    return 1;
  }

  public static function checkIfExist($name){
    if (file_exists($name))
      return 0;
    return 1;
  }

  public static function saveFileContent($fileName, $content){
    if (!$fd = fopen($fileName, "w")){
      throw new Exception('Sorry, File Not Exist.');
      return 1;
    }
    else{
      fwrite($fd, $content); //stripslashes("we")
      fclose($fd);
    }
    return 0;
  }

  public static function makeDirectory($dirPath){
    //najpierw sprawdz czy taki plik już nie istnieje:
    if( !myFunctions::checkIfExist($dirPath) ){
      $rs = @mkdir( $dirPath, '0755' );
      if( $rs )
        return 0;
      else{
        throw new Exception('Sorry, Could not create new Directory.');
        return 1;
      }
    }
    return 0;
  }

  public static function deleteFile($dirPath){
    if( !@unlink($dirPath) ){
      throw new Exception('Sorry, Could not delete file');
      return 1;
    }
    return 0;
  }
  
  public static function formatFileSize($size){
    if($size < 1024){
      $size = $size;
      return $size." b";
    }else{
      $num1 = intval ($size / 1024);
      $num2 = $size % (1024);
      return ($num1 . "kb " . $num2 . " b ");
    }
  }

  public static function  formatTimetamp($timestamp){
    return date("d/m/y G:i", $timestamp);
  }

  /**
   * return list of directories in directory.
   * @param <string> $path
   */
  public static function listDirInDir($path){
    if($handle = @opendir($path)){
      $dirList = array();
      while($dir = @readdir($handle)){
        if( is_dir($path . '/' . $dir) && $dir != '.' && $dir != '..')
          $dirList[] = $dir;
      }
      closedir($handle);
      return $dirList;
    }
  }

  public static function listDir($path){
    if($handle = @opendir($path)){
      $files = array();
      # Making an array containing the files in the current directory:
      while ($file = @readdir($handle)){
        if ( !is_dir( $path . '/' . $file) ){
          $record = array();
          $record["name"] = $file;
          $record["size"] = myFunctions::formatFileSize(filesize($path.'/'.$file));
          $record["date"] = date('H:i d-m-y', filemtime($path.'/'.$file));
          $files[] = $record;
        }
      }
      closedir($handle);
      return $files;
    }
    else
      return 1;
  }

  public static function getImagesList($path){
    if($handle = @opendir($path)){
      $files = array();
      # Making an array containing the files in the current directory:
      while ($file = @readdir($handle)){
        if ( !is_dir( $path . '/' . $file) && exif_imagetype($path . '/' . $file) >= 0){
          $files[] = $file;
        }
      }
      closedir($handle);
      return $files;
    }
    else
      return 1;
  }

  public static function itemToNormalText($item){
    // Outputs: correct string
    // usuń wszytko co jest niedozwolonym znakiem
    $tmp = $item;
    $item = preg_replace('/[^0-9A-Za-z\-]/', '', $item);
    $output = strtolower($item);
    if($output == '' || $output == 'search'){
      $output = md5($tmp);
      //$output = base64_encode(rand(0, 1000));
    }
    return $output;
  }

  public static function test(){
    $text = 'ąęć dsaćżźł@#$%';
    echo 'myFunctions - OK';
  }

 /**
  * Convert HTML to plain text
  * @param string $html
  * @return string
  */
  public static function html2text($html){

    $tags = array (
      0 => '~<h[123][^>]+>~si',
      1 => '~<h[456][^>]+>~si',
      2 => '~<table[^>]+>~si',
      3 => '~<tr[^>]+>~si',
      4 => '~<li[^>]+>~si',
      5 => '~<br[^>]+>~si',
      6 => '~<p[^>]+>~si',
      7 => '~<div[^>]+>~si',
    );

    $html = preg_replace($tags,"\n",$html);
    $html = preg_replace('~</t(d|h)>\s*<t(d|h)[^>]+>~si',' - ',$html);
    $html = preg_replace('~<[^>]+>~s','',$html);
    // reducing spaces
    $html = preg_replace('~ +~s',' ',$html);
    $html = preg_replace('~^\s+~m','',$html);
    $html = preg_replace('~\s+$~m','',$html);
    // reducing newlines
    $html = preg_replace('~\n+~s',"\n",$html);
    return $html;
  }

}

/*tests:
myFunctions::makeDirectory("test");
 myFunctions::deleteFile("elo.txt");
 */

//echo ' : ' . myFunctions::itemToNormalText("ężćg");
//echo 'agent: ' . myFunctions::giveUserAgent();

?>