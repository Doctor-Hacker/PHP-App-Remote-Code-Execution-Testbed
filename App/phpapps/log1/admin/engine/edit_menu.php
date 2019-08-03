<?php
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
 * (C) 2009-2010 by log1 
 * Kuba Kuropatnicki
 * log1@poczta.fm
 * log1CMS ver lite.
 *~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/

 if(!$isRegistered || !ereg("main.php", $_SERVER['SCRIPT_FILENAME']))
   header("Location: ../index.php");
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"  "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $translate['step'][$language]; ?> 2: <?php echo $translate['create_menu'][$language]; ?></title>
<script type="text/javascript" src="engine/jscripts/jquery-1.2.3.min.js"></script>
<script type="text/javascript" src="engine/jscripts/interface.js"></script>
<script type="text/javascript" src="engine/jscripts/mymenu.js"></script>
<link href="engine/styles/main.css.php" rel="stylesheet" type="text/css" />
<link href="engine/styles/steps.css.php" rel="stylesheet" type="text/css" />
</head>
<body>
<script type="text/javascript">
  var text = new Array();
  text[0] = '<?php echo $special_translate['saved'][$language]; ?>';
  text[1] = '<?php echo $translate['already_exists'][$language]; ?>';
  text[2] = '<?php echo $translate['delete_confirm'][$language]; ?>';
  text[3] = '<?php echo $translate['save_info'][$language]; ?>';
</script>
<div id="steps">
<?php
  include_once('steps.php');
?>
</div>

<div id="main">

<table>
<tr>
  <td colspan=2>
  <div id="data" class="center">
  <?php echo $translate['create_menu'][$language]; ?>:
  </div>
  </td>
</tr>
<tr>
  <td colspan=2>
    <ul id="sortme">
    <?php
      //require_once('menu.php');
      $mm = menu::getInstance(); //new menu();
      //print_r($mm->menu);
      foreach($mm->giveMenu() as $m){
        echo '<li id="'.$m->name.'_'.$m->type.'" class="sortitem">'.$m->name.' ('.$m->type.')</li>' . "\r\n";
      }
    ?>
    </ul>
  </td>
</tr>
<tr>
 <td class="center">
  <input id="saveit" type="button" value="<?php echo $special_translate['save'][$language]; ?>" />
 </td>
 <td class="left">
  <input type="text" id="whatadd" name="whatadd" size="30" maxlength="30"/>
  <input id="addit" type="button" value="<?php echo $special_translate['add'][$language]; ?>" />
  <br /><?php echo $translate['page_type'][$language]; ?>:
  <br /><input type="radio" name="ptype" value="page" id="c1" class="ptype" checked="checked"><?php echo $translate['page'][$language]; ?></input>
  <br /><input type="radio" name="ptype" value="gallery" id="c2" class="ptype"><?php echo $translate['gallery'][$language]; ?></input>
  <!--<br /><input type="radio" name="ptype" value="form" id="c3" class="ptype">Form</input>-->
 </td>
</tr>
<tr>
  <td class="left"><?php echo $translate['options'][$language]; ?></td>
  <td>
    <input class="Maction" name="act" id="obj" value="0" checked="checked" type="radio"><?php echo $translate['change_order'][$language]; ?><br />
    <input class="Maction" name="act" id="obj" value="1" type="radio"><?php echo $special_translate['delete'][$language]; ?> (<?php echo $translate['delete_item'][$language]; ?>)<br />
  </td>
</tr>
</table>
<?php include_once('engine/foot.php'); ?>
</div><!-- end of div main-->

</body>
</html>
