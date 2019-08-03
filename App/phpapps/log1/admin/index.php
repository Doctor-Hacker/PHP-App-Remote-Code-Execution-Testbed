<?php
 require_once('../functions/myFunctions.php');
 session_start();
 require_once('config.php');
 require_once('i18n.php');
 include('engine/head.php');
 include('engine/headSerialize.php');
 $hh = head::getInstance();
 $language = $hh->getHead()->getLanguage();
 
 if($_SESSION[md5($login)] == true){
   if(isSet($_SESSION['adminIp']) && $_SESSION['adminIp'] != myFunctions::giveIP())
     exit();
   header("Location: main.php?action=step1");
   exit();  
 }
 
 if(isset($_POST['login']) && isset($_POST['pass'])){
   if( ($isMd5 && ($_POST['login'] == $login) && (md5($_POST['pass']) == $password )) ||
       (!$isMd5 && ($_POST['login'] == $login) && ($_POST['pass']) == $password ) ){

      $_SESSION[md5($login)] = true;
      if($_POST['ipSession'] == 1)
        $_SESSION['adminIp'] = myFunctions::giveIP();
      header("Location: main.php?action=step1");
      exit();   
    }  
  }
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>log1 cms: <?php echo $special_translate['login_as_admin'][$language]; ?></title>
	<link href="engine/styles/login.css.php" rel="stylesheet" type="text/css" />
</head>
<body>

<div id="myhead">

<form action="index.php" method="post">
<table>
 <tr>
   <td colspan="2" align="center">
   <img src="engine/images/logo.gif" alt="log1 CMS logo"/>
   <h3><?php echo $special_translate['login_form'][$language]; ?></h3>
   </td>
 </tr>
 <tr>
  <th>
   <?php echo $translate['login'][$language]; ?>:
  </th>
  <td>
   <input type="text" name="login" value="" size="20" maxlength="20" />
  </td>
 </tr>
 <tr>
  <th>
   <?php echo $translate['password'][$language]; ?>:
  </th>
  <td>
   <input type="password" name="pass" value="" size="20" maxlength="20" />
  </td>
 </tr>
 <tr>
  <th></th>
  <td><input type="checkbox" name="ipSession" value="1" />&nbsp;<?php echo $special_translate['ip_session'][$language]; ?></td>
 </tr>
 <tr align="center">
  <td colspan="2" align="center">
   <input class="button" type="submit" value="<?php echo $special_translate['login'][$language]; ?>" />
   <a href="../"><?php echo $special_translate['cancel'][$language]; ?></a>
  </td>
 </tr>
</table>
</form>
</div>
</body>
</html>
