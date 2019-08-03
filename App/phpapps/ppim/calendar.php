<?php require("templates/header.html"); ?>
<style>
#warning {
		 font: bold 12pt tahoma;
		 color: #CC4444;
}
</style>
</head>
<body>
<?php require("templates/menu.html"); ?>
<div id="frame_middle">
	 <div id="frame_top_line">
	 </div>
	 <div id="frame_left">
<!-- ***************** Left Side  ***************** -->  

<form action="calendar.php" method="get">
<?php
 $months = array ('','Jan','Feb','March','April','May','June','July','August','Sep','Oct','Nov','Dec');
 print '	<select name="month">'."\n";
 print '	<option value="">Month</option>'."\n";
 for ($i = 1; $i<=12; $i++)
 {
   	 $temp = date('F',mktime(0,0,0,$i,1));
	 print '	<option value="'."$i".'">'."$temp".'</option>'."\n";
 }
 print '</select>'."\n";
?>
<input name="year" type="text" value="Year" onclick"year.value='';" size="4" /> 
<input type="submit" name="submit" value="Jump to Date" />
</form>
<form action="calendar.php" method="post">
<input type="submit" name="submit" value="Go to Today">
</form>
<form action="events.php" method="get">
<input type="submit" name="listallevents" value="List All Events">
</form>

 	 </div>

<!-- ***************** Right Side  ***************** -->  
	 <div id="frame_right">


<?php
require('calendar_source.php');
?>

	 </div>  
</div>
</div>
<div id="frame_bottom">
</div>
<?php require('templates/footer.html');?>
