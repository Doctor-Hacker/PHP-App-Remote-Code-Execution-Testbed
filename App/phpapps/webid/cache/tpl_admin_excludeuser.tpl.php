<?php $this->_tpl_include('header.tpl'); ?>
    	<div style="width:25%; float:left;">
            <div style="margin-left:auto; margin-right:auto;">
            	<?php $this->_tpl_include('sidebar-' . ((isset($this->_rootref['CURRENT_PAGE'])) ? $this->_rootref['CURRENT_PAGE'] : '') . '.tpl'); ?>
            </div>
        </div>
    	<div style="width:75%; float:right;">
            <div class="main-box">
            	<h4 class="rounded-top rounded-bottom"><?php echo ((isset($this->_rootref['L_25_0010'])) ? $this->_rootref['L_25_0010'] : ((isset($MSG['25_0010'])) ? $MSG['25_0010'] : '{ L_25_0010 }')); ?>&nbsp;&gt;&gt;&nbsp;<?php echo ((isset($this->_rootref['L_045'])) ? $this->_rootref['L_045'] : ((isset($MSG['045'])) ? $MSG['045'] : '{ L_045 }')); ?>&nbsp;&gt;&gt;&nbsp;<?php echo (isset($this->_rootref['ACTION'])) ? $this->_rootref['ACTION'] : ''; ?></h4>
                <table width="98%" celpadding="0" cellspacing="0" class="blank">
                <tr>
                    <td width="204"><?php echo ((isset($this->_rootref['L_302'])) ? $this->_rootref['L_302'] : ((isset($MSG['302'])) ? $MSG['302'] : '{ L_302 }')); ?></td>
                    <td><?php echo (isset($this->_rootref['REALNAME'])) ? $this->_rootref['REALNAME'] : ''; ?></td>
                </tr>
                <tr>
                    <td><?php echo ((isset($this->_rootref['L_003'])) ? $this->_rootref['L_003'] : ((isset($MSG['003'])) ? $MSG['003'] : '{ L_003 }')); ?></td>
                    <td><?php echo (isset($this->_rootref['USERNAME'])) ? $this->_rootref['USERNAME'] : ''; ?></td>
                </tr>
                <tr>
                    <td><?php echo ((isset($this->_rootref['L_303'])) ? $this->_rootref['L_303'] : ((isset($MSG['303'])) ? $MSG['303'] : '{ L_303 }')); ?></td>
                    <td><?php echo (isset($this->_rootref['EMAIL'])) ? $this->_rootref['EMAIL'] : ''; ?></td>
                </tr>
                <tr>
                    <td><?php echo ((isset($this->_rootref['L_252'])) ? $this->_rootref['L_252'] : ((isset($MSG['252'])) ? $MSG['252'] : '{ L_252 }')); ?></td>
                    <td><?php echo (isset($this->_rootref['DOB'])) ? $this->_rootref['DOB'] : ''; ?></td>
                </tr>
                <tr>
                    <td><?php echo ((isset($this->_rootref['L_009'])) ? $this->_rootref['L_009'] : ((isset($MSG['009'])) ? $MSG['009'] : '{ L_009 }')); ?></td>
                    <td><?php echo (isset($this->_rootref['ADDRESS'])) ? $this->_rootref['ADDRESS'] : ''; ?></td>
                </tr>
                <tr>
                    <td><?php echo ((isset($this->_rootref['L_011'])) ? $this->_rootref['L_011'] : ((isset($MSG['011'])) ? $MSG['011'] : '{ L_011 }')); ?></td>
                    <td><?php echo (isset($this->_rootref['PROV'])) ? $this->_rootref['PROV'] : ''; ?></td>
                </tr>
                <tr>
                    <td><?php echo ((isset($this->_rootref['L_012'])) ? $this->_rootref['L_012'] : ((isset($MSG['012'])) ? $MSG['012'] : '{ L_012 }')); ?></td>
                    <td><?php echo (isset($this->_rootref['ZIP'])) ? $this->_rootref['ZIP'] : ''; ?></td>
                </tr>
                <tr>
                    <td><?php echo ((isset($this->_rootref['L_014'])) ? $this->_rootref['L_014'] : ((isset($MSG['014'])) ? $MSG['014'] : '{ L_014 }')); ?></td>
                    <td><?php echo (isset($this->_rootref['COUNTRY'])) ? $this->_rootref['COUNTRY'] : ''; ?></td>
                </tr>
                <tr>
                    <td><?php echo ((isset($this->_rootref['L_013'])) ? $this->_rootref['L_013'] : ((isset($MSG['013'])) ? $MSG['013'] : '{ L_013 }')); ?></td>
                    <td><?php echo (isset($this->_rootref['PHONE'])) ? $this->_rootref['PHONE'] : ''; ?></td>
                </tr>
                <tr>
                    <td><?php echo ((isset($this->_rootref['L_222'])) ? $this->_rootref['L_222'] : ((isset($MSG['222'])) ? $MSG['222'] : '{ L_222 }')); ?></td>
                    <td>
                        <p><a href="userfeedback.php?id=<?php echo (isset($this->_rootref['ID'])) ? $this->_rootref['ID'] : ''; ?>"><?php echo ((isset($this->_rootref['L_208'])) ? $this->_rootref['L_208'] : ((isset($MSG['208'])) ? $MSG['208'] : '{ L_208 }')); ?></a></p>
                    </td>
                </tr>
                <tr>
                    <td width="204">&nbsp;</td>
                    <td><?php echo (isset($this->_rootref['QUESTION'])) ? $this->_rootref['QUESTION'] : ''; ?></td>
                </tr>
                <tr>
                    <td width="204">&nbsp;</td>
                    <td>
                        <form name="details" action="" method="post">
                            <input type="hidden" name="id" value="<?php echo (isset($this->_rootref['ID'])) ? $this->_rootref['ID'] : ''; ?>">
                            <input type="hidden" name="offset" value="<?php echo (isset($this->_rootref['OFFSET'])) ? $this->_rootref['OFFSET'] : ''; ?>">
                            <input type="hidden" name="mode" value="<?php echo (isset($this->_rootref['MODE'])) ? $this->_rootref['MODE'] : ''; ?>">
                            <input type="hidden" name="csrftoken" value="<?php echo (isset($this->_rootref['_CSRFTOKEN'])) ? $this->_rootref['_CSRFTOKEN'] : ''; ?>">
                            <input type="submit" name="action" value="<?php echo ((isset($this->_rootref['L_030'])) ? $this->_rootref['L_030'] : ((isset($MSG['030'])) ? $MSG['030'] : '{ L_030 }')); ?>">
                            <input type="submit" name="action" value="<?php echo ((isset($this->_rootref['L_029'])) ? $this->_rootref['L_029'] : ((isset($MSG['029'])) ? $MSG['029'] : '{ L_029 }')); ?>">
                        </form>
                    </td>
                </tr>
                </table>
        </div>
<?php $this->_tpl_include('footer.tpl'); ?>