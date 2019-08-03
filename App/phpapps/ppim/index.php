<?php require("templates/header.html"); ?>
<script>
function OpenUpload()
{
 		window.open("changepassword.php" , "Password" , "width=400, height=100" );
}
</script>
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
	 <u><b>Choose Your Style</b></u><br />
	 Comes in three color styles:<br /><br />
	 <a href="#" onclick="setActiveStyleSheet('default'); return false;">
	 Default XP Blue</a>
	 <br /><br />
	 <a href="#" onclick="setActiveStyleSheet('Slate'); return false;">
	 Longhorn Slate</a>
	 <br /><br />
	 <a href="#" onclick="setActiveStyleSheet('Enhanced'); return false;">
	 Enhanced</a>

 	 </div>

<!-- ***************** Right Side  ***************** -->  
	 <div id="frame_right">
	 <h1>Welcome to pPIM</h1>
	 <h3>Phlatline's Personal Information Manager</h3>
	 <h3>Version: 1.01</h3>
	 <br />
	 <p><a href="javascript:OpenUpload();" >Change Password</a></p>
	 <br />
	 <p><a href="http://ppim.phlatline.org">pPIM Homepage</a></p>
	 <p><a href="mailto:phlatline@phlatline.org">Report Bug</a></p>
<?php
	 @include("http://www.phlatline.org/docs/updates/pppimupdate.txt");
	 if (isset($ppimupdate));
	 {
	  	@print "$ppimupdate";
	 }
	 if (@opendir("contacts"))
	 {
	 }
	 else
	 {
	  	 print '<br /><br /><div id="warning">WARNING: You need to run <a href="setup.php">setup.php</a></div>';
	 }
?>
  	 <br /><br /><br />  	 <br /><br /><br /><br />
  	 <p>Special Thanks to:<br /> Foood for use of his icons - <a href="http://www.foood.net">www.foood.net</a></p>
	 <p>and Michael Gonzalez for inspiring Enhanced theme - 
	 <a href="http://www.enhancedlabs.com">www.enhancedlabs.com</a></p>
	 </div>  
</div>
</div>
<div id="frame_bottom">
</div>
<?php require('templates/footer.html');?>