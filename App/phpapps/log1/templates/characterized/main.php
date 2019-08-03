<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : Characterized 
Description: A two-column, fixed-width design for 1024x768 screen resolutions.
Version    : 1.0
Released   : 200900814

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
 <title><?php echo $headItems["title"] ?></title>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <meta http-equiv="Generator" content="log1_cms" />
 <meta name="description" content="<?php echo $headItems["desc"]; ?>"/>
 <meta name="keywords" content="<?php echo $headItems["key"]; ?>" /> 
 <link href="templates/characterized/style.css" rel="stylesheet" type="text/css" media="screen" />
 <link href="templates/characterized/picasa.css" rel="stylesheet" type="text/css" />

 <script type="text/javascript" src="lightbox/js/prototype.js"></script>
 <script type="text/javascript" src="lightbox/js/scriptaculous.js?load=effects,builder"></script>
 <script type="text/javascript" src="lightbox/js/lightbox.js"></script>
 <link rel="stylesheet" href="lightbox/css/lightbox.css" type="text/css" media="screen" />
 <link rel="alternate" type="application/atom+xml" title="<?php echo $headItems["title"] ?>" href="db/head/feed.php" /> 
</head>
<body>
<div id="wrapper">
	<div id="logo">
		<h1><a href=""><?php echo $headItems["title"] ?></a></h1>
		<p><em><a><?php echo $headItems["desc"] ?></a></em></p>
	</div>
	<hr />
	<!-- end #logo -->
	<div id="header">
		<div id="menu">
			<ul>
				<?php
				  foreach ($menuFiles as $i=>$item) {
					$item = split('_', $item);
					$item = $item[0];
					if($q == $item) {
					  echo '<li class="current_page_item';
					  if ($i==0) { echo ' first '; }
					  echo '"><a href="index.php?q='.$item.'&name='.$menuUrls[$i].'" title="'.$menuNames[$i].'">'.$menuNames[$i].'</a></li>';
					} else {
					  echo '<li><a ';
					  if($i==0) { echo 'class="first" '; }
					  echo 'href="index.php?q='.$i.'&name='.$menuUrls[$i].'" title="'.$menuNames[$i].'">'.$menuNames[$i].'</a></li>';
					}
				  }
				?>
			</ul>
		</div>
		<!-- end #menu -->
		<div id="search">
			<form id="form1" action="index.php" method="get" >
					<fieldset>
                    <input type="hidden" value="search" name="q">
					<input id="search-text" size="15" type="text" name="qsearch" value="" />
					<input id="search-submit" type="submit" value="GO" />
					</fieldset>
			</form>
		</div>
		<!-- end #search -->
	</div>
	<!-- end #header -->
	<!-- end #header-wrapper -->
	<div id="page">
		<div id="content">
			<div id="banner"><img src="templates/characterized/images/img09.jpg" alt="" /></div>
			<div class="post">
				<div class="entry">
				<!-- BEGIN:CONTENT -->
				<?php
				 if ($type == 'page') {
				  include_once($file_to_include);
				 } else {
				  $list = $album->getImagesList(); 
				  echo '<h2>Album '.$album->title.'</h2>';
				  echo '<div id="photos">';
				  echo '<table cellspacing="0" border="0" id="photosTable"><tr>';
				  foreach ($list as $i=>$photo) {
					echo '<td>';
					echo '<a href="'.$photo['url'].'?imgmax=800" rel="lightbox[roadtrip]" onFocus=\'this.blur()\'>
						  <img src="'.$photo['thumb'].'" />
						 </a>';
					echo '</td>';
					if (($i+1) % 4 == 0) echo '<tr></tr>';

				  }
				  echo '</tr></table></div>';
				 }
				 ?>
        <!-- END:CONTENT -->
				</div>
			</div>
		</div>
		<!-- end #content -->
		<div id="sidebar">
			<ul>
				<li>
					<h2>Other </h2>
					<ul>
						<li><a href="mailto:<?php echo $headItems["email"]; ?>">Contact</a></li>
						<li><a href="db/head/feed.php">Rss Feed</a></li>
						<li><a href="admin/index.php">Login</a></li>
					</ul>
				</li>
			</ul>
		</div>
		<!-- end #sidebar -->
		<div style="clear: both;">&nbsp;</div>
	</div>
	<!-- end #page -->
	<div id="footer-bgcontent">
	<div id="footer">
		<p>Copyright &copy; <?php echo $headItems["copyright"]; ?>. All Rights Reserved. Design by <a href="http://www.freecsstemplates.org/">Free CSS Templates</a>.</p>
		<!-- please do not deleate info below, thank you -->
		<p>Powered by <a href="http://log1cms.sourceforge.net" target="_blank"> Log1 CMS</a></p>	
	</div>
	</div>
	<!-- end #footer -->
</div>
</body>
</html>
