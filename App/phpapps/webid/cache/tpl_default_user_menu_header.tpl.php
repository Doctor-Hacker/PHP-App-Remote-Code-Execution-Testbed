<div class="content">
	<div class="padtb">
		<table width="100%" cellpadding="0" cellspacing="0" class="notd">
		<tr>
			<td>
			<dl class="tabs">
				<dd><a href="<?php echo (isset($this->_rootref['SITEURL'])) ? $this->_rootref['SITEURL'] : ''; ?>user_menu.php?cptab=summary"><?php echo ((isset($this->_rootref['L_25_0080'])) ? $this->_rootref['L_25_0080'] : ((isset($MSG['25_0080'])) ? $MSG['25_0080'] : '{ L_25_0080 }')); ?></a></dd>  
				<dd><a href="<?php echo (isset($this->_rootref['SITEURL'])) ? $this->_rootref['SITEURL'] : ''; ?>user_menu.php?cptab=account"><?php echo ((isset($this->_rootref['L_25_0081'])) ? $this->_rootref['L_25_0081'] : ((isset($MSG['25_0081'])) ? $MSG['25_0081'] : '{ L_25_0081 }')); ?></a></dd>  
<?php if ($this->_rootref['B_CAN_SELL']) {  ?>
				<dd><a href="<?php echo (isset($this->_rootref['SITEURL'])) ? $this->_rootref['SITEURL'] : ''; ?>user_menu.php?cptab=selling"><?php echo ((isset($this->_rootref['L_25_0082'])) ? $this->_rootref['L_25_0082'] : ((isset($MSG['25_0082'])) ? $MSG['25_0082'] : '{ L_25_0082 }')); ?></a></dd>	
<?php } ?>
				<dd><a href="<?php echo (isset($this->_rootref['SITEURL'])) ? $this->_rootref['SITEURL'] : ''; ?>user_menu.php?cptab=buying"><?php echo ((isset($this->_rootref['L_25_0083'])) ? $this->_rootref['L_25_0083'] : ((isset($MSG['25_0083'])) ? $MSG['25_0083'] : '{ L_25_0083 }')); ?></a></dd> 	   
			</dl>
			</td>
		</tr>
		<tr>
			<td>
			<div class="titTable4">
				<?php echo ((isset($this->_rootref['L_205'])) ? $this->_rootref['L_205'] : ((isset($MSG['205'])) ? $MSG['205'] : '{ L_205 }')); ?>
			</div>
<?php if ($this->_rootref['B_MENUTITLE']) {  ?>
			<div class="titTable4">
				<?php echo (isset($this->_rootref['UCP_TITLE'])) ? $this->_rootref['UCP_TITLE'] : ''; ?>
			</div>
<?php } if ($this->_rootref['B_ISERROR']) {  ?>
            <div class="error-box">
                <?php echo (isset($this->_rootref['UCP_ERROR'])) ? $this->_rootref['UCP_ERROR'] : ''; ?>
            </div>
<?php } ?>
			</td>
		</tr>
		</table>