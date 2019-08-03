<?php $this->_tpl_include('user_menu_header.tpl'); if ($this->_rootref['TMPMSG'] != ('')) {  ?>
	<p style="background-color;#FF9933;display:block" >
		<b><span style="color:white;"><?php echo (isset($this->_rootref['TMPMSG'])) ? $this->_rootref['TMPMSG'] : ''; ?></span></b>
	</p>
<?php } ?>
	<div class="padding">
<?php if ($this->_rootref['THISPAGE'] == ('account')) {  ?>
		<ul class="padding">
			<li><a href="yourfeedback.php"><?php echo ((isset($this->_rootref['L_208'])) ? $this->_rootref['L_208'] : ((isset($MSG['208'])) ? $MSG['208'] : '{ L_208 }')); ?></a></li>
			<li><a href="buysellnofeedback.php"><?php echo ((isset($this->_rootref['L_207'])) ? $this->_rootref['L_207'] : ((isset($MSG['207'])) ? $MSG['207'] : '{ L_207 }')); ?></a> <?php echo (isset($this->_rootref['FBTOLEAVE'])) ? $this->_rootref['FBTOLEAVE'] : ''; ?></li>
			<li><a href="mail.php"><?php echo ((isset($this->_rootref['L_623'])) ? $this->_rootref['L_623'] : ((isset($MSG['623'])) ? $MSG['623'] : '{ L_623 }')); ?></a> <?php echo (isset($this->_rootref['NEWMESSAGES'])) ? $this->_rootref['NEWMESSAGES'] : ''; ?></li>
			<li><a href="outstanding.php"><?php echo ((isset($this->_rootref['L_422'])) ? $this->_rootref['L_422'] : ((isset($MSG['422'])) ? $MSG['422'] : '{ L_422 }')); ?></a></li>
			<li><a href="invoices.php"><?php echo ((isset($this->_rootref['L_1057'])) ? $this->_rootref['L_1057'] : ((isset($MSG['1057'])) ? $MSG['1057'] : '{ L_1057 }')); ?></a></li>
		</ul>
		<div class="bigfont underline padding"><?php echo ((isset($this->_rootref['L_244'])) ? $this->_rootref['L_244'] : ((isset($MSG['244'])) ? $MSG['244'] : '{ L_244 }')); ?></div>
		<ul class="padding">
			<li><a href="selleremails.php"><?php echo ((isset($this->_rootref['L_25_0188'])) ? $this->_rootref['L_25_0188'] : ((isset($MSG['25_0188'])) ? $MSG['25_0188'] : '{ L_25_0188 }')); ?></a></li>
			<li><a href="edit_data.php"><?php echo ((isset($this->_rootref['L_621'])) ? $this->_rootref['L_621'] : ((isset($MSG['621'])) ? $MSG['621'] : '{ L_621 }')); ?></a></li>
		</ul>
<?php } else if ($this->_rootref['THISPAGE'] == ('selling')) {  if ($this->_rootref['B_CANSELL']) {  ?>
		<ul class="padding">
				<li><a href="yourauctions_p.php"><?php echo ((isset($this->_rootref['L_25_0115'])) ? $this->_rootref['L_25_0115'] : ((isset($MSG['25_0115'])) ? $MSG['25_0115'] : '{ L_25_0115 }')); ?></a></li>
				<li><a href="yourauctions.php"><?php echo ((isset($this->_rootref['L_203'])) ? $this->_rootref['L_203'] : ((isset($MSG['203'])) ? $MSG['203'] : '{ L_203 }')); ?></a></li>
				<li><a href="yourauctions_c.php"><?php echo ((isset($this->_rootref['L_204'])) ? $this->_rootref['L_204'] : ((isset($MSG['204'])) ? $MSG['204'] : '{ L_204 }')); ?></a></li>
				<li><a href="yourauctions_s.php"><?php echo ((isset($this->_rootref['L_2__0056'])) ? $this->_rootref['L_2__0056'] : ((isset($MSG['2__0056'])) ? $MSG['2__0056'] : '{ L_2__0056 }')); ?></a></li>
				<li><a href="yourauctions_sold.php"><?php echo ((isset($this->_rootref['L_25_0119'])) ? $this->_rootref['L_25_0119'] : ((isset($MSG['25_0119'])) ? $MSG['25_0119'] : '{ L_25_0119 }')); ?></a></li>
				<li><a href="selling.php"><?php echo ((isset($this->_rootref['L_453'])) ? $this->_rootref['L_453'] : ((isset($MSG['453'])) ? $MSG['453'] : '{ L_453 }')); ?></a><br></li>
		</ul>
	<?php } else { ?>
		<form name="request" action="" method="post">
			<input type="hidden" name="csrftoken" value="<?php echo (isset($this->_rootref['_CSRFTOKEN'])) ? $this->_rootref['_CSRFTOKEN'] : ''; ?>">
			<p><?php echo ((isset($this->_rootref['L_25_0140'])) ? $this->_rootref['L_25_0140'] : ((isset($MSG['25_0140'])) ? $MSG['25_0140'] : '{ L_25_0140 }')); ?></p>
			<p><input type="submit" name="requesttoadmin" value="<?php echo ((isset($this->_rootref['L_25_0141'])) ? $this->_rootref['L_25_0141'] : ((isset($MSG['25_0141'])) ? $MSG['25_0141'] : '{ L_25_0141 }')); ?>"  class="button"></p>
		</form>
	<?php } } else if ($this->_rootref['THISPAGE'] == ('summary')) {  ?>
		<table width="100%" border="0" cellspacing="2" cellpadding="3">
		<tr>
			<td class="titTable2"><?php echo ((isset($this->_rootref['L_593'])) ? $this->_rootref['L_593'] : ((isset($MSG['593'])) ? $MSG['593'] : '{ L_593 }')); ?></td>
		</tr>
		<tr>
			<td>
				<?php echo (isset($this->_rootref['FBTOLEAVE'])) ? $this->_rootref['FBTOLEAVE'] : ''; ?>
				<?php echo (isset($this->_rootref['NEWMESSAGES'])) ? $this->_rootref['NEWMESSAGES'] : ''; ?>
				<?php echo (isset($this->_rootref['NO_REMINDERS'])) ? $this->_rootref['NO_REMINDERS'] : ''; ?>
                <?php echo (isset($this->_rootref['TO_PAY'])) ? $this->_rootref['TO_PAY'] : ''; ?>
                <?php echo (isset($this->_rootref['BENDING_SOON'])) ? $this->_rootref['BENDING_SOON'] : ''; ?>
                <?php echo (isset($this->_rootref['BOUTBID'])) ? $this->_rootref['BOUTBID'] : ''; ?>
			</td>
		</tr>
		</table>
<?php } else { ?>
		<ul class="padding">
			<li><a href="auction_watch.php"><?php echo ((isset($this->_rootref['L_471'])) ? $this->_rootref['L_471'] : ((isset($MSG['471'])) ? $MSG['471'] : '{ L_471 }')); ?></a></li>
			<li><a href="item_watch.php"><?php echo ((isset($this->_rootref['L_472'])) ? $this->_rootref['L_472'] : ((isset($MSG['472'])) ? $MSG['472'] : '{ L_472 }')); ?></a></li>
			<li><a href="yourbids.php"><?php echo ((isset($this->_rootref['L_620'])) ? $this->_rootref['L_620'] : ((isset($MSG['620'])) ? $MSG['620'] : '{ L_620 }')); ?></a></li>
			<li><a href="buying.php"><?php echo ((isset($this->_rootref['L_454'])) ? $this->_rootref['L_454'] : ((isset($MSG['454'])) ? $MSG['454'] : '{ L_454 }')); ?></a></li>
		</ul>
<?php } ?>
	</div>

<?php $this->_tpl_include('user_menu_footer.tpl'); ?>