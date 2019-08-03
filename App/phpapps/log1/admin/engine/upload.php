<?php
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
 * (C) 2009 by log1 
 * Kuba Kuropatnicki
 * log1@poczta.fm
 * log1CMS ver lite.
 *~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/

 if(!$isRegistered || !ereg("main.php", $_SERVER['SCRIPT_FILENAME']))
   header("Location: ../index.php");
//construct the path to /db/uploaded:
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"  "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $translate['file_managment'][$language]; ?></title>
<script type="text/javascript" src="engine/jscripts/jquery-1.2.3.min.js"></script>
<script type="text/javascript" src="engine/jscripts/interface.js"></script>
<link href="engine/styles/main.css.php" rel="stylesheet" type="text/css" />
<link href="engine/styles/steps.css.php" rel="stylesheet" type="text/css" />
<link href="engine/styles/upload.css.php" rel="stylesheet" type="text/css" />

</head>
<body>
<script type="text/javascript">
  //alert('ok');
</script>
<div id="steps">
<?php
  include_once('steps.php');
?>
</div>

<div id="main">
<div id="upload">
<center>

<?php

$dirPath = $_SERVER['PHP_SELF']; 
$toCut = "/admin/main.php";
$dirPath = str_replace($toCut,"",$dirPath) . '/db/uploaded/';

//if not exist "uploaded" dir - create it!
if(myFunctions::checkIfExist($_SERVER['DOCUMENT_ROOT'] . $dirPath))
  myFunctions::makeDirectory($_SERVER['DOCUMENT_ROOT'] . $dirPath);

//echo $dirPath;

if(isset($_FILES['ifile']['tmp_name'])){
  $max_rozmiar = 1024*1024*1024*1024;
  $tmp_file = $_POST['ifile'];
  if (is_uploaded_file($_FILES['ifile']['tmp_name'])){
    if ($_FILES['ifile']['size'] > $max_rozmiar){
      echo 'Error: File is to big...';
    }
    else if($_FILES['ifile']['type'] === "application/x-httpd-php" ||
            $_FILES['ifile']['type'] === "application/octet-stream"){
      echo 'Error3 : It is a runable file...';
    }else{
      echo 'OK. File Name: '.$_FILES['ifile']['name'];
      if (isset($_FILES['ifile']['type'])){
        echo '. Type: '.$_FILES['ifile']['type'].'<br/>';
      } 
      move_uploaded_file($_FILES['ifile']['tmp_name'],
      $_SERVER['DOCUMENT_ROOT'] . $dirPath .$_FILES['ifile']['name']);
      if(@chmod(".". $dirPath . $tmp_file, 0777)){
        echo "File is now public";
      }
    }
  }else{
    echo 'Error: unknown reason! Probably file is too big.';
  }
}
?>


<div id="uploadForm">
<form action="main.php?action=upload" method="POST" ENCTYPE="multipart/form-data">
<input type="file" name="ifile" />
<input type="submit" value="<?php echo  $translate['upload_file_or_image'][$language];?>" />
</form>
</div>
</center>

<table width="80%">
  <tr>
    <th width="1%">*</th>
    <th><?php echo $translate['file_name'][$language];?></th>
    <th><?php echo $translate['size'][$language];?></th>
    <th><?php echo $translate['date'][$language];?></th>
  </tr>
  <?php
  foreach(myFunctions::listDir('../db/uploaded') as $record){
    echo '<tr>';
    echo '<td><a href="main.php?action=delete&file='.$record['name'].'" onClick="return confirm(\''.$translate['delete_file_confirm'][$language].'\')" >';
    echo '<img style="float:right;" src="engine/images/close-x.png" alt="delete file" title="delete file"/></a></td>';
    echo '<td><p><a href="../db/uploaded/'.$record['name'].'" target="_blank">'.$record['name'].'</p></a></td>';
    echo '<td><p>'.$record['size'].'</p></td>';
    echo '<td><p>'.$record['date'].'</p></td>';
    echo '</tr>';
  }
   
  ?>
</table>
<?php
  //print_r(myFunctions::listDir('../db/uploaded'));
?>

</div>
</div>
<?php include_once('engine/foot.php'); ?>
</body>
</html>


