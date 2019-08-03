<?php
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
 * (C) 2009 by log1 
 * Kuba Kuropatnicki
 * log1@poczta.fm
 * log1CMS ver lite.
 *~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
 if(!$isRegistered || !ereg("main.php", $_SERVER['SCRIPT_FILENAME']))
   header("Location: ../index.php");

 $t = new template();  
 $hh = head::getInstance();
 if(isset($_POST['template'])) {
   $t->setChosen($_POST['template']); 
   $t->generateIndex();
 }
 @include_once('template.php');
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"  "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $translate['step'][$language]; ?> 4: <?php echo $translate['choose_template'][$language]; ?></title>
<script type="text/javascript" src="engine/jscripts/jquery-1.2.3.min.js"></script>
<script type="text/javascript" src="engine/jscripts/interface.js"></script>
<script type="text/javascript" src="engine/jscripts/mymenu.js"></script>
<link href="engine/styles/main.css.php" rel="stylesheet" type="text/css" />
<link href="engine/styles/steps.css.php" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="steps">
<?php
  include_once('steps.php');
  $templateList = $t->getTemplates();
?>
</div>

<div id="main">
<form action="main.php?action=step4" method="post">
 <table>
 <tr>
 <td><h5><?php echo $translate['choose_template'][$language]; ?></h5></td> 
 </tr>
 <tr>
  <td>
  <?php
   foreach($templateList as $i => $t){
     if($t == $template)
      echo '<input name="template" value="'.$i.'" type="radio" checked="checked" />'.$t.'<br />';
     else
       echo '<input name="template" value="'.$i.'" type="radio" />'.$t.'<br />';
   }
  ?>
  </td>
 </tr>
 <tr>
  <td style="text-align: center;"><input type="submit" value="<?php echo $special_translate['save'][$language]; ?>" /></td> 
 </tr> 
 </table> 
</form>
</div>
<?php include_once('engine/foot.php'); ?>
</body>
</html>
