<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Title      : Featuring
Version    : 1.0
Released   : 20090625
Description: A two-column fixed-width template suitable for small websites.

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
<link href="templates/featuring/style.css" rel="stylesheet" type="text/css" />

<link href="templates/featuring/picasa.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="lightbox/js/prototype.js"></script>
<script type="text/javascript" src="lightbox/js/scriptaculous.js?load=effects,builder"></script>
<script type="text/javascript" src="lightbox/js/lightbox.js"></script>
<link rel="stylesheet" href="lightbox/css/lightbox.css" type="text/css" media="screen" />

<link rel="alternate" type="application/atom+xml" title="<?php echo $headItems["title"] ?>" href="db/head/feed.php" />
</head>
<body>
<div id="wrapper">
	<div id="header">
		<div id="logo">
			<h1><a href=""><?php echo $headItems["title"]; ?></a></h1>
			<h2><a href=""><?php echo $headItems["desc"]; ?></a></h2>
		</div>
		<!-- end div#logo -->
		<div id="menu">
			<ul>
            <?php
              foreach ($menuFiles as $i=>$item) {
                $item = split('_', $item);
                $item = $item[0];
                if($q == $item)
                  echo '<li class="active"><a href="index.php?q='.$i.'&name='.$menuUrls[$i].'" title="'.$menuNames[$i].'">'.$menuNames[$i].'</a></li>';
                else
                  echo '<li><a href="index.php?q='.$i.'&name='.$menuUrls[$i].'" title="'.$menuNames[$i].'">'.$menuNames[$i].'</a></li>';
              }
            ?>
			</ul>
		</div>
		<!-- end div#menu -->
	</div>
	<!-- end div#header -->
	<div id="page">
		<div id="page-bgtop">
			<div id="content">
				<div class="post">
					<div class="entry">
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
					<div class="meta">
						<p class="links"></p>
					</div>
				</div>
			</div>
			<!-- end div#content -->
			<div id="sidebar">
				<ul>
					<li id="search">
						<h2>Search</h2>
						<form method="get" action="index.php">
							<fieldset>
                            <input type="hidden" value="search" name="q">
							<input type="text" id="seach-text" name="qsearch" value="" />
							<input type="submit" id="search-submit" value="Search" />
							</fieldset>
						</form>
					</li>
					<li>
						<h2>Other</h2>
						<ul>
                          <li><a href="mailto:<?php echo $headItems["email"]; ?>">Contact</a></li>
                          <li><a href="db/head/feed.php">Rss Feed</a></li>
                          <li><a href="admin/">Login</a></li>
						</ul>
					</li>
				</ul>
			</div>
			<!-- end div#sidebar -->
			<div style="clear: both; height: 1px"></div>
		</div>
	</div>
	<!-- end div#page -->
	<div id="footer">
		<p id="legal">Copyright &copy; <?php echo $headItems["copyright"]; ?>. All Rights Reserved. Designed by <a href="http://www.freecsstemplates.org/">Free CSS Templates</a>.</p>
        <!-- please do not deleate info below, thank you -->
        <p id="links">Powered by <a href="http://log1cms.sourceforge.net" target="_blank"> Log1 CMS</a></p>
	</div>
	<!-- end div#footer -->
</div>
<!-- end div#wrapper -->
</body>
</html>
