    <!--<link href="steps.css.php" rel="stylesheet" type="text/css" />-->
	<script type="text/javascript" src="engine/jscripts/jquery.js"></script>
	<script type="text/javascript" src="engine/jscripts/interface.js"></script>
	<script type="text/javascript" src="engine/jscripts/jquery.form.js"></script>
    <script type="text/javascript" src="engine/jscripts/jquery.expose-1.0.0.min.js"></script>
    <script type="text/javascript" src="engine/jscripts/ajaxupload.js"></script>
    <script type="text/javascript">
      
    function openWindow(url) {
      window.open(url, "file list", "menubar=1,resizable=1,scrollbars=1,width=300,height=450");
    }

	function openFileManager() {
		window.open('libraries/ajaxfilemanager/ajaxfilemanager.php', 'ajaxFileImageManager', 'width=782,height=500');
	}
    
	$(document).ready(function(){
      $('#window').css('left', 400);
      $('#window').css('top', 100);
      $('#window').Draggable( {
        zIndex: 	20,
		ghosting:	false,
		opacity: 	0.7,
		handle:	'#window_handle'
      });
      $("#window").hide();
      $('#preferences').click(function() {
        $("#window").show();
        $("#window").expose();  
      });
      $('#close').click(function() {
        $("#window").hide();
        $.expose.close(); 
      });

      /*Image Upload*/

	var button = $('#uploadButton'), interval;
	new Ajax_upload(button,{
		action: 'main.php?action=upload_file',
		name: 'ifile',
		onSubmit : function(file, ext){
			// change button text, when user selects file
			button.text('Uploading');
			// If you want to allow uploading only 1 file at time,
			// you can disable upload button
			this.disable();
			// Uploding -> Uploading. -> Uploading...
			interval = window.setInterval(function(){
				var text = button.text();
				if (text.length < 13){
					button.text(text + '.');
				} else {
					button.text('Uploading');
				}
			}, 200);
		},
		onComplete: function(file, response){
			button.text('<?php echo $translate['upload_file_or_image'][$language]; ?>');
			window.clearInterval(interval);
			// enable upload button
			this.enable();
			// add file to the list
            $('<li></li>').appendTo($('#uploadInfo')).text(file+' ('+response+')');
		}
	});

	});
    </script>

  <noscript>
    <div id="nojavascript">
      <p><?php echo $translate['no_javascript'][$language]; ?></p>
    </div>
  </noscript>

  <div id="menustripe">
    <ul id="stripe">
      <li class="menu">
        <a id="preferences" title="main menu">Menu</a>
      </li>
      <li><?php echo $translate['quick_menu'][$language]; ?>:</li>
      <li><a href="javascript:openFileManager('x');">Ajax File Manager</a></li>
      <!--<li><a href="javascript:openWindow('filelist.php'); return false;"><?php echo $translate['file_list'][$language]; ?></a></li>-->
      <li id="uploadButton" style="font-weight:bold;"><?php echo $translate['upload_file_or_image'][$language]; ?></li><li id="uploadInfo"></li>
     <?php
        switch($action){
          case 'step1':
            $prev = null;
            $next = 'step2';
            break;
          case 'step2':
            $prev = 'step1';
            $next = 'step3';
            break;
          case 'step3':
            $prev = 'step2';
            $next = 'step4';
            break;
          case 'step4':
            $prev = 'step3';
            $next = null;
            break;
          case 'upload':
            $prev = null;
            $next = 'step3';
            break;
          default:
            $prev = null;
            $next = 'step2';
        }
        if($prev)
          echo '<li><a href="main.php?action='.$prev.'">&laquo; '.$translate['prev'][$language].'</a></li>';
        if($next)
          echo '<li><a href="main.php?action='.$next.'">'.$translate['next'][$language].' &raquo;</a></li>';
      ?>
    </ul>
	</div>    


<div id="window">
  <div id="window_handle">
    <a id="close"><img src="engine/images/close-x.png" width="15px" height="15px" alt="[ x ]"></img></a>
	  Main Menu
  </div>
  <div id="window_content">
    <table>
     <tr>
	  <td><p><?php echo $translate['step'][$language]; ?> 1<a href="main.php?action=step1"><?php echo $translate['edit_head'][$language]; ?></a></p></td>
     </tr>
     <tr>
	  <td><p><?php echo $translate['step'][$language]; ?> 2<a href="main.php?action=step2"><?php echo $translate['create_menu'][$language]; ?></a></p></td>
     </tr>  
     <tr>
	  <td><p><?php echo $translate['step'][$language]; ?> 3<a href="main.php?action=step3"><?php echo $translate['edit_files'][$language]; ?></a></p></td>
     </tr>
     <tr>
	  <td><p><?php echo $translate['step'][$language]; ?> 4<a href="main.php?action=step4"><?php echo $translate['choose_template'][$language]; ?></a></p></td>
     </tr>     
     <tr>
	  <td><p><?php echo $translate['step'][$language]; ?> 5<a target="_blank" href="../index.php"><?php echo $translate['page_preview'][$language]; ?></a></p></td>
     </tr>
     <tr>
	  <td><p><a href="main.php?action=upload"><?php echo $translate['file_managment'][$language]; ?></a></p></td>
     </tr>
     <tr>
	  <td><p>******<a href="main.php?action=logout"><?php echo $translate['logout'][$language]; ?></a>******</p></td>
     </tr>
    </table>
  </div>
</div>
