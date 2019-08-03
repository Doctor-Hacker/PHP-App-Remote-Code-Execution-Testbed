<?function general_header($path=null,$title,$head,$home,$portfolio,$artwork,$faq,$contact){?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es-ES" xml:lang="es-ES"> 
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<title><?=$title?></title>
	<link media="screen" type="text/css" rel="stylesheet" href="style.css">
</head>

<body>
	<div id="container">
		<div id="header">
			<div id="logo">			
				<h1><a href="#">Right Banners</a></h1>
			</div>
			<div class="infolog">
				Custom Service: 0800 123456 (We are here to help)
			</div><!-- .infolog -->
			<div id="menu">
				<ul>
					<li><a href="<?=$path?>index.php" class="<?=$home?>">Home</a> |</li>
					<li><a href="<?=$path?>template.php" class="<?=$portfolio?>">Template</a> |</li>
					<li><a href="<?=$path?>artwork.php" class="<?=$artwork?>">Free Artwork</a> |</li>
					<li><a href="<?=$path?>faq.php" class="<?=$faq?>">Faq</a> |</li>
					<li><a href="<?=$path?>contact.php" class="<?=$contact?>">Contact</a></li>
				</ul>
			</div>
		</div><!-- #header -->
		<?}?>
		<?function general_footer($path=null){?>
		<div id="footer">
			<h3>We print great quality banners @ genuine trade prices</h3>
			<div class="imgs">
				<ul>
					<li><a href="#"><img src="img/imgworks/1.jpg" alt="image1" /></a></li>
					<li><a href="#"><img src="img/imgworks/2.jpg" alt="image2" /></a></li>
					<li><a href="#"><img src="img/imgworks/3.jpg" alt="image3" /></a></li>
					<li><a href="#"><img src="img/imgworks/4.jpg" alt="image4" /></a></li>
				</ul>
			</div>
			<span><h4>Right Banners</h4> is a trading name of Giant Imaging Ltd Company Registration No: 123456789 VAT Reg No:12345678</span>
		</div><!-- #footer -->
	</div>
</body>
</html>
<?}?>