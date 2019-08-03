<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>

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

 <title><?php echo $headItems["title"] ?></title>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <meta http-equiv="Generator" content="log1_cms" />
 <meta name="description" content="<?php echo $headItems["desc"]; ?>"/>
 <meta name="keywords" content="<?php echo $headItems["key"]; ?>" />
 <link href="templates/vectorlove/default.css" rel="stylesheet" type="text/css" />

 <link href="templates/vectorlove/picasa.css" rel="stylesheet" type="text/css" />

 <script type="text/javascript" src="lightbox/js/prototype.js"></script>
 <script type="text/javascript" src="lightbox/js/scriptaculous.js?load=effects,builder"></script>
 <script type="text/javascript" src="lightbox/js/lightbox.js"></script>
 <link rel="stylesheet" href="lightbox/css/lightbox.css" type="text/css" media="screen" /> 
 
 <link rel="alternate" type="application/atom+xml" title="<?php echo $headItems["title"] ?>" href="db/head/feed.php" /> 

</head>

<body>
<!-- wrap starts here -->
<div id="wrap">
	<!--header -->
	<div id="header">			
		<h1 id="logo-text"><a href="index.php" title=""><?php echo $headItems["title"] ?></a></h1>		
		<p id="slogan"><?php echo $headItems["desc"]; ?></p>	
		<div id="top-menu">
			<p><a href="db/head/feed.php">rss feed</a> | <a href="mailto:<?php echo $headItems["email"]; ?>">contact</a> | <a href="admin/">login</a></p>
		</div>			
	<!--header ends-->					
	</div>
	<!-- navigation starts-->	
	<div  id="nav">
      <ul>
		<?php
		  foreach ($menuFiles as $i=>$item) {
            $item = split('_', $item);
            $item = $item[0];
            if($q == $item)
              echo '<li id="current"><a href="index.php?q='.$i.'&name='.$menuUrls[$i].'">'.$menuNames[$i].'</a></li>';
            else
              echo '<li><a href="index.php?q='.$i.'&name='.$menuUrls[$i].'">'.$menuNames[$i].'</a></li>';
          }
		?>
      </ul>
	<!-- navigation ends-->	
	</div>					

	<!-- content starts -->
	<div id="content">
		<div id="main">					
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
        
		<!-- main ends -->	
		</div>
				
		<div id="sidebar">
				
			<h3>Search</h3>	
			
			<form id="qsearch" action="index.php" method="get" >
			<p>
			<label for="qsearch">Search:</label>
            <input type="hidden" value="search" name="q">
			<input class="tbox" type="text" name="qsearch" value="Search this site..." title="Start typing and hit ENTER" />
			<input class="btn" alt="Search" type="image" name="searchsubmit" title="Search" src="templates/vectorlove/search.gif" />
			</p>
			</form>		
			
			<h3>Sidebar Menu</h3>
			<ul class="sidemenu">				
			<?php
		      foreach($menuNames as $i=>$item){
                echo '<li><a href="index.php?q='.$i.'&name='.$menuUrls[$i].'">'.$menuNames[$i].'</a></li>';
              }
			?>				
			</ul>		
		<!-- sidebar ends -->		
		</div>		
	<!-- content ends-->	
	</div>
		
	<!-- footer starts -->		
	<div id="footer">
						
			<p>
			&copy; <?php echo $headItems["copyright"]; ?>
			
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			
			Design by : <a href="http://www.styleshout.com/">styleshout</a> | 
			Valid <a href="http://validator.w3.org/check?uri=referer">XHTML</a> | 
			<a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a>
			
   		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			
			<a href="index.php">Home</a>&nbsp;|&nbsp;
	   	<a href="db/head/feed.php">RSS Feed</a>
   		</p>			
	
	<!-- footer ends-->
	</div>

<!-- wrap ends here -->
</div>

</body>
</html>
