<?php
function upload_head() {
	?>
	<link rel="stylesheet" href="admin-uploadify/uploadify.css" type="text/css" />
	<script type="text/javascript" src="<?php echo WEBPATH.'/'.ZENFOLDER;?>/js/flash_detect_min.js"></script>
	<script type="text/javascript">
		//<!-- <![CDATA[
		var uploadifier_replace_message =  "<?php echo gettext('Do you want to replace the file %s?'); ?>";
		var uploadifier_queue_full_message =  "<?php echo gettext('Upload queue is full. The upload limit is %u.'); ?>";
		// ]]> -->
	</script>
	<script type="text/javascript" src="<?php echo WEBPATH.'/'.ZENFOLDER;?>/admin-uploadify/jquery.uploadify.js"></script>
	<script type="text/javascript" src="<?php echo WEBPATH.'/'.ZENFOLDER;?>/admin-uploadify/swfobject.js"></script>
	<script type="text/javascript" src="<?php echo WEBPATH.'/'.ZENFOLDER;?>/js/sprintf.js"></script>
	<?php
}

function upload_form($uploadlimit) {
	global $_zp_current_admin_obj, $upload_extensions;
	?>
	<script type="text/javascript">
		// <!-- <![CDATA[
		if (FlashDetect.installed) {
			$(document).ready(function() {
				$('#fileUpload').uploadify({
					'uploader': 'admin-uploadify/uploadify.swf',
					'cancelImg': 'images/fail.png',
					'script': 'admin-uploadify/uploader.php',
					'scriptData': {
												'auth': '<?php echo $_zp_current_admin_obj->getPass(); ?>',
												'id': '<?php echo $_zp_current_admin_obj->getID(); ?>',
												'XSRFToken': '<?php echo getXSRFToken('upload')?>'
												},
					'folder': '/',
					'multi': true,
					<?php
					$uploadbutton = SERVERPATH.'/'.ZENFOLDER.'/locale/'.getOption('locale').'/select_files_button.png';
					if(!file_exists($uploadbutton)) {
						$uploadbutton = SERVERPATH.'/'.ZENFOLDER.'/images/select_files_button.png';
					}
					$discard = NULL;
					$info = zp_imageDims($uploadbutton, $discard);
					if ($info['height']>60) {
						$info['height'] = round($info['height']/3);
						$rollover = "'rollover': true,";
					} else {
						$rollover = "";
					}
					$uploadbutton = str_replace(SERVERPATH, WEBPATH, $uploadbutton);
					?>
					'buttonImg': '<?php echo $uploadbutton; ?>',
					'height': '<?php echo $info['height'] ?>',
					'width': '<?php echo $info['width'] ?>',
					<?php echo $rollover; ?>
					'checkScript': 'admin-uploadify/check.php',
					'displayData': 'speed',
					'simUploadLimit': 3,
					'sizeLimit': <?php echo $uploadlimit; ?>,
					'onAllComplete':	function(event, data) {
															if (data.errors) {
																return false;
															} else {
															<?php
															if (zp_loggedin(ALBUM_RIGHTS | MANAGE_ALL_ALBUM_RIGHTS)) {
																?>
																launchScript('admin-edit.php',['page=edit','subpage=1','tab=imageinfo','album='+encodeURIComponent($('#folderdisplay').val()),'uploaded=1','albumimagesort=id_desc']);
																<?php
															} else {
																?>
																launchScript('admin-upload.php',['uploaded=1']);
																<?php
															}
															?>
															}
														},
					'fileDesc': '<?php echo gettext('Zenphoto supported file types | all files'); ?>',
					'fileExt': '<?php
											$list = implode(';*.',$upload_extensions);
											echo '*.'.$list.' | *.*';
											?>'
				});
		});
		}
		// ]]> -->
	</script>
	<div id="fileUpload" style="color:red">
		<?php echo gettext("There appears to be no <em>Flash</em> plugin installed in your browser."); ?>
	</div>
	<p class="buttons" id="fileUploadbuttons" style="display: none;">
		<a href="javascript:$('#fileUpload').uploadifySettings('folder','/'+$('#publishalbum').attr('checked')+':'+$('#folderdisplay').val()+':'+$('#albumtitle').val());
												$('#fileUpload').uploadifyUpload()"><img src="images/pass.png" alt="" /><?php echo gettext("Upload"); ?></a>
		<a href="javascript:$('#fileUpload').uploadifyClearQueue()"><img src="images/fail.png" alt="" /><?php echo gettext("Cancel"); ?></a>
	<br clear="all" /><br />
	</p>
	<p id="uploadswitch"><?php echo gettext('If your upload does not work try the <a href="javascript:switchUploader(\'admin-upload.php?uploadtype=httpupload\');" >jquery file upload</a> or use FTP instead.'); ?></p>
	<?php
}
?>