<?php
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
 * (C) 2009 by log1 
 * Kuba Kuropatnicki
 * log1@poczta.fm
 * log1CMS ver lite.
 *~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
 if(!$isRegistered)
   header("Location: ../index.php");
 //require_once('menu.php');
 //include('../files/files.php');
 @include_once('template.php');
 $mm = menu::getInstance();
 $hh = head::getInstance();
 //print_r($mm->menu);
 $picasa = new picasa($hh->getHead()->googleLogin);
 $albums = $picasa->getAlbumList();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"  "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?php echo $translate['step'][$language]; ?> 3: <?php echo $translate['edit_files'][$language]; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script type="text/javascript" src="engine/jscripts/jquery-1.2.3.min.js"></script>
<script type="text/javascript" src="engine/jscripts/interface.js"></script>
<script type="text/javascript" src="engine/jscripts/jquery.form.js"></script>
<script type="text/javascript" src="engine/jscripts/myfiles.js"></script>
<script type="text/javascript" src="engine/jscripts/jquery.idTabs.min.js"></script>
<link href="engine/styles/tabs.css.php" rel="stylesheet" type="text/css" />
<link href="engine/styles/steps.css.php" rel="stylesheet" type="text/css" />

<!-- TinyMCE -->
<script type="text/javascript" src="engine/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
   var textMsg = '<?php echo $special_translate['saved'][$language]; ?>';
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
		language: <?php $language == 0 ? print '"en"' : print '"pl"';?>,
        extended_valid_elements : "iframe[src|width|height|name|align]",

		// Theme options
		theme_advanced_buttons1 : "newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,
        
 		relative_urls : false,

		// Example content CSS (should be your site CSS)
		content_css : "../templates/<?php echo $template; ?>/default.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",
        


		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
     
	});

</script>
<!-- /TinyMCE -->

</head>
<body>

<div id="steps">
<?php
  include_once('steps.php');
?>
</div>

<div id="data">
</div>

<div id="tabs1" class="tabs">
  <ul>
  <?php
    foreach($mm->giveMenu() as $i => $m) {
        if($i == 0)
           echo '<li><a class="selected" href="#tab1">'.$m->name.'</a></li>' . "\r\n";
        else
           echo '<li><a href="#tab'.($i+1).'">'.$m->name.'</a></li>' . "\r\n";
    }
  ?>
  </ul>
  <?php
    foreach($mm->giveMenu() as $i => $m){
      $path = '../db/files/'.$m->fileName.'_'.$m->type.'.php';
      //echo $path;
      echo '<div id="tab'.($i+1).'">';
      if ($m->type == 'page') {
        //.$m["name"].'--'.
        echo '<form>';// id="myform'.$i.'" method="post" action="save_file.php">';
        echo '<textarea class="content'.$i.'" name="content'.$i.'" rows="60" cols="80" style="width: 100%; height: 400px">';
          // file content
          $content = @file_get_contents($path);
          //$content = newlinetobr($content);
          # small fix for internal images or files
          $content = str_replace('db/uploaded', '../db/uploaded', $content);
          $content = htmlspecialchars($content);
          echo $content;
        echo '</textarea><br />';
        //echo '<input type="submit" name="save" id="save" value="Submit" />';
        echo '<input type="button" value="'.$special_translate['save'][$language].'" onclick="ajaxSave('.$i.');" />';
        echo '<input type="reset" name="reset" id="reset" value="Reset" />';
        echo '<input type="hidden" id="filename'.$i.'" name="filename'.$i.'" value="'.$m->fileName.'_'.$m->type.'"/>';
        echo '</form>';
      } else if ($m->type == 'gallery') {
        echo '<form>';
        $albumId = @file_get_contents($path);
        $albumId = (string)$albumId;
        echo '<h3>Choose album from your Picasa gallery</h3><br />';
        foreach ($albums as $k => $album) {
          echo '<p style="border: 1px dotted '.$textcolor.';"><img style="vertical-align: middle;" src="'.$album['thumb'].'" /><input name="album'.$i.'" value="'.$album['id'].'" ';
          if ($album['id'] == $albumId) { echo 'checked="checked"'; }
          echo ' type="radio">'.$album['title'].'</p><br/>';
        }
        echo '<input type="button" value="'.$special_translate['save'][$language].'" onclick="ajaxSaveGallery('.$i.');" />';
        echo '<input type="reset" name="reset" id="reset" value="Reset" />';
        echo '<input type="hidden" id="filename'.$i.'" name="filename'.$i.'" value="'.$m->fileName.'_'.$m->type.'"/>';
        echo '</form>';
      }
      echo '</div>' . "\r\n";
    }
  ?>
</div>
<?php include_once('engine/foot.php'); ?>
<script type="text/javascript">
  $("#tabs1 ul").idTabs();
</script>
</body>
</html>