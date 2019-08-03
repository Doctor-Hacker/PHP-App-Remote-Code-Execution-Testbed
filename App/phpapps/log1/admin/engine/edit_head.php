<?php
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
 * (C) 2009 by log1 
 * Kuba Kuropatnicki
 * log1@poczta.fm
 * log1CMS ver lite.
 *~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
 if(!$isRegistered || !ereg("main.php", $_SERVER['SCRIPT_FILENAME']))
   header("Location: ../index.php");
  //require_once('./config/conf.php');
  //require_once($appRoot.'/functions/myFunctions.php');
  //$appRoot = $_SERVER["DOCUMENT_ROOT"]. '/myCMS3/'; //zmie� to!!!
  require_once('engine/head.php');
  require_once('engine/configClass.php');
  include('config.php');
  $hh = head::getInstance();


 if(isset($_POST['title'])) {
   $title = stripslashes($_POST["title"]);
   $desc = stripslashes($_POST["desc"]);
   $key = stripslashes($_POST["key"]);
   $language = stripslashes($_POST["language"]);
   $bgcolorP = stripslashes($_POST["bgcolor"]);
   $textcolorP = stripslashes($_POST["textcolor"]);
   $specialcolorP = stripslashes($_POST["specialcolor"]);
   $googleLogin = stripslashes($_POST["google_login"]);
   $email = stripslashes($_POST["email"]);
   $copyright = stripslashes($_POST["copyright"]);

   if($bgcolorP != $textcolorP && $bgcolorP != $specialcolorP && $textcolorP != $specialcolorP)
    $hh->setHead($title, $desc, $key, $language, $bgcolorP, $textcolorP, $specialcolorP,$googleLogin,$email,$copyright);
   else {
    $hh->setHead($title, $desc, $key, $language,null ,null ,null, $googleLogin, $email, $copyright);
   }
   $hh->generateHead();
   //echo $_POST['title'];
   if( ($_POST['login'] != $login && strlen($_POST['login']) != 0) ||
       ( ($_POST['pass'] != $password || $_POST['isMd5'] != $isMd5) && strlen($_POST['pass']) != 0) ){
     if($_POST['isMd5'] == 1)
      $newMd5 = 1;
     else
      $newMd5 = 0;
     $newPass = $password;
     if($_POST['pass'] != $password && $_POST['pass'] != '')
      $newPass = $_POST['pass'];
     $newConf = new configClass();
     $newConf->saveConfiguration($_POST['login'], $newPass, $newMd5);
   }
   if($_POST['isMd5'] == 1){
    //echo $_POST['pass'] . $_POST['login'];
   }
 }
 
 include('config.php');
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title><?php echo $translate['step'][$language]; ?> 1: <?php echo $translate['edit_head'][$language]; ?></title>
	<link href="engine/styles/head.css.php" rel="stylesheet" type="text/css" />
    <link href="engine/styles/colorPicker.css" rel="stylesheet" type="text/css" />
    <script language="javascript" type="text/javascript" src="engine/jscripts/jquery.min.js"></script>
    <script language="javascript" type="text/javascript" src="engine/jscripts/jquery.colorPicker.js"></script>
    <link href="engine/styles/main.css.php" rel="stylesheet" type="text/css" />
    <link href="engine/styles/steps.css.php" rel="stylesheet" type="text/css" />
  <script type="text/javascript">
    //Run the code when document ready
    $(document).ready(function() {
     //use this method to add new colors to pallete
     $.fn.colorPicker.addColors(['0000ff', 'FF0099', '00CC99', '00BBBB','000080', '990000']);
     $('#bgcolor').colorPicker();
     $('#textcolor').colorPicker();
     $('#specialcolor').colorPicker();
     $('#login').val('');
     $('#pass').val('');
     
    });
  </script>

</head>
<body>
<div id="steps">
<?php
  include_once('engine/steps.php');
?>
</div>

<div id="myhead">

<form action="main.php?action=step1" method="post">
<table>
 <tr>
  <th>
   <?php echo $translate['title'][$language]; ?>:
  </th>
  <td>
   <input type="text" name="title" value="<?php echo $hh->getHead()->title; ?>" size="100" maxlength="255" />
  </td>
 </tr>
 <tr>
  <th>
   <?php echo $translate['description'][$language]; ?>:
  </th>
  <td>
   <input type="text" name="desc" value="<?php echo $hh->getHead()->desc; ?>" size="100" maxlength="255" />
  </td>
 </tr>
 <tr>
  <th>
   <?php echo $translate['keywords'][$language]; ?>:
  </th>
  <td>
   <input type="text" name="key" value="<?php echo $hh->getHead()->key; ?>" size="100" maxlength="200" />
  </td>
 </tr>
 <tr>
    <th><?php echo $translate['language'][$language]; ?>:</th>
    <td><select name="language" class="language">
          <option <?php if($hh->getHead()->language == 0) echo 'selected="selected"'; ?> value="0">English </option>
          <option <?php if($hh->getHead()->language == 1) echo 'selected="selected"'; ?> value="1">Polski  </option>
        </select>
    </td>
 </tr>
 <tr>
   <th><?php echo $translate['bg_color'][$language]; ?>:</th>
   <td><div style="float: left;"><input id="bgcolor" type="text" name="bgcolor" value="<?php echo $hh->getHead()->bgcolor; ?>" /></div></td>
 </tr>
 <tr> 
   <th><?php echo $translate['text_color'][$language]; ?>:</th>
   <td><div style="float: left;"><input id="textcolor" type="text" name="textcolor" value="<?php echo $hh->getHead()->textcolor; ?>" /></div></td>
 </tr>
 <tr> 
   <th><?php echo $translate['special_color'][$language]; ?>:</th>
   <td><div style="float: left;"><input id="specialcolor" type="text" name="specialcolor" value="<?php echo $hh->getHead()->specialcolor; ?>" /></div></td>
 </tr> 
 <tr>
 <th>
   <?php echo $translate['login'][$language]; ?>*:
  </th>
  <td>
   <input type="text" id="login" name="login" value="<?php echo $login; ?>" size="20" maxlength="20" />
  </td>
 </tr>
 <tr>
  <th>
   <?php echo $translate['password'][$language]; ?>*:
  </th>
  <td>
   <input type="password" id="pass" name="pass" value="" size="20" maxlength="20" />
  </td>
 </tr>
 <tr>
   <th><?php echo $translate['md5'][$language]; ?>:</th>
   <td><input type="checkbox" name="isMd5" value="1" <?php if( $isMd5 ) echo 'checked="checked"'; ?> /></td>
 </tr>
 <tr>
  <th>
   Google login**:
  </th>
  <td>
   <input type="text" name="google_login" value="<?php echo $hh->getHead()->googleLogin; ?>" size="50" maxlength="50" />
  </td>
 </tr>  
 <tr>
  <th>
   <?php echo $translate['email'][$language]; ?>:
  </th>
  <td>
   <input type="text" name="email" value="<?php echo $hh->getHead()->email; ?>" size="50" maxlength="50" />
  </td>
 </tr>  
 <tr>
  <th>
   <?php echo $translate['copy_info'][$language]; ?>:
  </th>
  <td>
   <input type="text" name="copyright" value="<?php echo $hh->getHead()->copyright; ?>" size="50" maxlength="50" />
  </td>
 </tr>  
 <tr align="center">
  <td colspan="2" align="center">
   <input class="button" type="submit" value="<?php echo $special_translate['save'][$language]; ?>">
  </td>
 </tr>
 <tr align="center">
  <td colspan="2" align="center">
   * - <?php echo $translate['asterix_info'][$language]; ?><br />
   ** - <?php echo $translate['google_login'][$language]; ?>
  </td>
 </tr>
</table>
</form>
<?php include_once('engine/foot.php'); ?>
</div>
</body>
</html>
