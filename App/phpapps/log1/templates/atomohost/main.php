<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License
-->

<?php
 include_once('db/head/headItems.php');
 include_once('db/menu/menuItems.php');
 $q = $_GET["q"];
 $type = 'page';
 if ($q == "search") {
   $file_to_include = 'db/files/search.php';
 } else {
  $q = (int)$q;
  if ($q < 0 || $q > count($menuFiles)-1) $q = $menuFiles[0];
  else $q = $menuFiles[$q];
  $tmp = split('_', $q);
  if ($tmp[1] == "gallery") {
    $type = 'gallery';
    include_once('admin/engine/picasaAlbum.php');
    $file_to_include = 'db/files/' . $q .'.php';
    $albumId = (string)file_get_contents($file_to_include);
    $album = new picasaAlbum($headItems["googleLogin"], $albumId);
    //print_r($album->getImagesList());
  }
  $file_to_include = 'db/files/' . $q .'.php';
 }
 /*if(!in_array($q, $menuItems)){
   if($q != "search")
      $q = $menuItems[0];
 }*/

?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title><?php echo $headItems["title"] ?></title>
 <meta http-equiv="Generator" content="log1_cms" />
 <meta name="description" content="<?php echo $headItems["desc"]; ?>"/>
 <meta name="keywords" content="<?php echo $headItems["key"]; ?>" /> 
<link href="templates/atomohost/style.css" rel="stylesheet" type="text/css" />
<link href="templates/atomohost/picasa.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="lightbox/js/prototype.js"></script>
<script type="text/javascript" src="lightbox/js/scriptaculous.js?load=effects,builder"></script>
<script type="text/javascript" src="lightbox/js/lightbox.js"></script>
<link rel="stylesheet" href="lightbox/css/lightbox.css" type="text/css" media="screen" />
<link rel="alternate" type="application/atom+xml" title="<?php echo $headItems["title"] ?>" href="db/head/feed.php" />
 
</head>
<body>
<div id="header">
	<div id="topmenu">
		<ul>
			<li><a href="index.php" id="topmenu1" accesskey="1" title="">Home</a></li>
			<li><a href="mailto:<?php echo $headItems["email"]; ?>" id="topmenu3" accesskey="2" title="">Contact</a></li>
		</ul>
	</div>
	<div id="logo">
		<h1><a href=""><?php echo $headItems["title"]; ?></a></h1>
		<h2><a href=""><?php echo $headItems["desc"]; ?></a></h2>
	</div>
</div>
<div id="menu">
	<ul>
    <?php
      foreach ($menuFiles as $i=>$item) {
        $item = split('_', $item);
        $item = $item[0];
        if($i == 0)
          echo '<li class="first"><a href="index.php?q='.$i.'&name='.$menuUrls[$i].'" title="">'.$menuNames[$i].'</a></li>';
        else
          echo '<li><a href="index.php?q='.$i.'&name='.$menuUrls[$i].'" title="">'.$menuNames[$i].'</a></li>';
      }
    ?>
	</ul>
</div>
<div id="content">
	<div id="main">
		<div id="welcome">
        <!-- BEGIN:CONTENT -->
        <?php
         if ($type == 'page') {
          include_once($file_to_include);
         } else {
          $list = $album->getImagesList(); 
          echo '<h3>Album '.$album->title.'</h3>';
          echo '<div id="photos">';
          echo '<table cellspacing="0" border="0" id="photosTable"><tr>';
          foreach ($list as $i=>$photo) {
            echo '<td>';
            echo '<a href="'.$photo['url'].'?imgmax=800" rel="lightbox[roadtrip]" onFocus=\'this.blur()\'>
                  <img src="'.$photo['thumb'].'" />
                 </a>';
            echo '</td>';
            if (($i+1) % 3 == 0) echo '<tr></tr>';

          }
          echo '</tr></table></div>';
         }
         ?>
        <!-- END:CONTENT -->
		</div>
	</div>
	<div id="sidebar">
		<div id="login" class="boxed">
			<h2 class="title">Search</h2>
			<div class="content">
				<form id="form1" method="get" action="index.php">
					<fieldset>
					<legend>Search</legend>
					<label for="inputtext1">Enter Keyword(s):</label>
                    <input type="hidden" value="search" name="q">
					<input id="inputtext1" type="text" name="qsearch" value="" />
					<input id="inputsubmit1" type="submit" name="inputsubmit1" value="Go" />
					</fieldset>
				</form>
			</div>
		</div>
		<div id="partners" class="boxed">
			<h2 class="title">Other</h2>
			<div class="content">
				<ul>				
					<li><a href="mailto:<?php echo $headItems["email"]; ?>">Contact</a></li>
					<li><a href="db/head/feed.php">Rss Feed</a></li>
                    <li><a href="admin/">Login</a></li>
                    
				</ul>
			</div>
		</div>
	</div>
</div>
<div id="footer">
	<p id="legal">Copyright &copy; <?php echo $headItems["copyright"]; ?>. All Rights Reserved. Designed by <a href="http://www.freecsstemplates.org/">Free CSS Templates</a>.</p>
    <!-- please do not deleate info below, thank you -->
    <p id="links">Powered by <a href="http://log1cms.sourceforge.net" target="_blank"> Log1 CMS</a></p>
</div>
</body>
</html>
