<?php
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
 * (C) 2009 by log1 
 * Kuba Kuropatnicki
 * log1@poczta.fm
 * log1CMS ver lite.
 *~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/

class template {
  private $indexFile = 'index.php';
  private $templateFile = 'template.php';
  private $templateList = array();
  private $chosen;

  public function template(){
    $this->indexFile = '../index.php';
    $this->templateList = myFunctions::listDirInDir('../templates/');
    //$this->getTemplates();
  }

  public function getTemplates(){
    return $this->templateList;
    //print_r($this->templateList);
  }

  public function setChosen($chosen){
    $this->chosen = $chosen;
  }

  public function generateIndex(){
    $text = "<?php" . "\r\n";
    $text .= "include('templates/". $this->templateList[$this->chosen] ."/main.php');" . "\r\n";
    $text .= "?>" . "\r\n";
    try{
      myFunctions::saveFileContent($this->indexFile, $text);
    }catch(Exception $e){
      echo 'Error: ',  $e->getMessage(), "\n";
    }

    $text = '<?php $template="' .$this->templateList[$this->chosen]. '"; ?>';
    try{
      myFunctions::saveFileContent($this->templateFile, $text);
    }catch(Exception $e){
      echo 'Error: ',  $e->getMessage(), "\n";
    }
  }


}

?>
