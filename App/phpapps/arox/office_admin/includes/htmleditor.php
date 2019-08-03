<?php
/**
* Funckja zwracajaca edytor;
* @return string
* @param  string  $sName
* @param  int     $iH
* @param  int     $iW
* @param  string  $sContent
*/
function htmlEditor( $sName = 'tresc', $iH = '300', $iW = '400', $sContent = '' ) {
  global $tpl, $aHtmlConfig;
  $sReturn = null;
  $aHtmlConfig['iH'] = $iH.'px';
  $aHtmlConfig['iW'] = $iW.'px';
  $aHtmlConfig['sName'] = $sName;
  $aHtmlConfig['sContent'] = $sContent;
  $sReturn = '<textarea name="'.$aHtmlConfig['sName'].'" id="'.$aHtmlConfig['sName'].'" rows="20" cols="60" style="width:'.  $aHtmlConfig['iW'].'; height:'.$aHtmlConfig['iH'].';" tabindex="1">'.$aHtmlConfig['sContent'].'</textarea>';
  return $sReturn;
}
?>
