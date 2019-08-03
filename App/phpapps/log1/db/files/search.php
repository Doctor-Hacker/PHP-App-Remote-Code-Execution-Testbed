<?php
  include_once('admin/engine/search_class.php');
  $s = new SearchClass(strip_tags($_GET["qsearch"]),$menuFiles);
  $results = $s->getResults();
?>

<h3>Search results for <i><?php echo strip_tags($_GET["qsearch"]); ?></i>:</h3>
<ol>
<?php
  foreach($results as $item){
    $key = array_search($item,  $menuFiles);
    echo '<li><a href="index.php?q='.$key.'&name='.$menuUrls[$key].'"><u>'.$menuNames[$key].'</u></a></li>';
  }
?>
</ol>

