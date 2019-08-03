<?php require("templates/header.html"); ?>
<script>
function cancel()
{
		location.replace("");
}
function checkvalues()
{
		 var a=document.newevent.event_title.value;
		 var b=document.newevent.event_hour.value;
		 var c=document.newevent.event_min.value;
		 var d=document.newevent.event_ampm.value;
		 var e=document.newevent.event_description.value;
		 if (a == ""||b==""||c==""||d==""||e=="")
		 {
		 	alert ("Please fill in all fields!");
			return false;
		 }
		 return true;
}
</script>
</head>
<body>
<?php require("templates/menu.html"); ?>
<div id="frame_middle">
	 <div id="frame_top_line">
	 </div>
	 <div id="frame_left">
<!-- ***************** Left Side  ***************** -->  
	 <?php 
	 if (isset($_GET['date']))
	 {
	  	$date_id = $_GET['date'];
		print "<a href=\"events.php?mode=new&date=$date_id\">New Event</a><br / >";
	 }
	 ?>
	 <a href="events.php?listallevents=1">List All Events</a>
 	 </div>

<!-- ***************** Right Side  ***************** -->  
	 <div id="frame_right">
<?php require("events_source.php");?>
	 </div>  
</div>
</div>
<div id="frame_bottom">
</div>
<?php require('templates/footer.html');?>