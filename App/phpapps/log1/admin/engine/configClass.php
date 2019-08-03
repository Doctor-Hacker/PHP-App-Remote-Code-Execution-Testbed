<?php

require_once('../functions/myFunctions.php');
//echo '<h5>OK</h5>';

class configClass {
  
  private $configFile = 'config.php';
  public function configClass(){
    $this->configFile = 'config.php';
  }
  
  /**
   * Saves changed configuration to file $config file
   * @param string $login
   * @param string $password
   * @param bool $isMd5 
   */
  public function saveConfiguration($login, $password, $isMd5){

    if($isMd5)
      $password = md5($password);
    $text = '<?php ' . "\r\n";
    $text .= ' $login = "' . $login . '";' . "\r\n";
    $text .= ' $password = "' . $password . '";' . "\r\n";
    $text .= ' $isMd5 = ' . $isMd5 . ';' . "\r\n";
    $text .= '?>' . "\r\n";
    try{
      myFunctions::saveFileContent($this->configFile, $text);
    }catch(Exception $e){
      echo 'Error: ',  $e->getMessage(), "\n";
    }
  }
}
?>
