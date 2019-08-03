<?php
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
 * (C) 2009 by log1 
 * Kuba Kuropatnicki
 * log1@poczta.fm
 * log1CMS ver lite.
 *~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/

header('Content-Type: text/xml; charset=utf-8');
include('../../db/head/headItems.php');
include('../../db/menu/menuItems.php');
include('../../functions/myFunctions.php');

$toCut = "/db/head/feed.php";
$url ="http://".$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'];
$url = str_replace($toCut,"",$url);
?>
<?php echo '<?xml version="1.0" encoding="utf-8"?>'; ?>

<rss version="2.0">
  <channel>
    <title><?php echo $headItems['title']; ?></title>
	<?php /*echo $url . '/db/head/feed.php';*/ ?>
    <link><?php echo $url; ?></link>
    <description><?php echo $headItems['desc']; ?></description>
    <language>en-us</language>
    <pubDate><?php echo date("D, d M Y H:i:s O"); /*Tue, 10 Jun 2009 04:00:00 GMT*/ ?></pubDate>
    <lastBuildDate><?php echo date("D, d M Y H:i:s O"); ?></lastBuildDate>
    <generator>Log1 CMS</generator>
    <managingEditor><?php echo $headItems['email']; ?></managingEditor>
    <webMaster><?php echo $headItems['email']; ?></webMaster>
    <ttl>60</ttl>

    <?php

      foreach($menuFiles as $i=>$item){
        $tmp = split('_', $item);
        if ($tmp[1] == 'page') {
          $path = '../../db/files/' . $item . '.php';
          $content = file_get_contents($path);
          $content = myFunctions::html2text($content);
          $content =  preg_replace("/&#?[a-zA-Z0-9]+;/i", "", $content);
          echo "<item> \r\n";
          echo '<title>'.$menuNames[$i].'</title>' . "\r\n";
          echo '<link>'.$url.'/index.php?q='.$i.'&#38;name='.$menuUrls[$i].'</link>' . "\r\n";
          echo '<description>' . $content . '</description>' . "\r\n";
          echo "</item> \r\n";
        } else if ($tmp[1] == 'gallery') {
          echo "<item> \r\n";
          echo '<title>'.$menuNames[$i].'</title>' . "\r\n";
          echo '<link>'.$url.'/index.php?q='.$i.'&#38;name='.$menuUrls[$i].'</link>' . "\r\n";
          echo '<description>Image Gallery</description>' . "\r\n";
          echo "</item> \r\n";      
        }          
          
      }
      /*<item>
        <title></title>
        <link></link>
        <description></description>
        <pubDate>Tue, 03 Jun 2009 04:12:12 GMT</pubDate>
        <guid>http://...#item56</guid>
      </item>*/

    ?>
  </channel>
</rss>
