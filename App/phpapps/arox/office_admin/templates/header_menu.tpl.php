 <?php
	$sel_year = "SELECT *FROM `es_finance_master`  ORDER BY `es_finance_masterid` DESC LIMIT 0 , 1";
	$res_year = getarrayassoc($sel_year);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="55%" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="50%" height="23" align="left" valign="middle" style="font-weight:bold; color: #999999">Financial&nbsp;year&nbsp;:&nbsp;<?php if($res_year['fi_startdate']!=""){ echo displaydate($res_year['fi_startdate']); ?>&nbsp;to&nbsp;<?php echo displaydate($res_year['fi_enddate']); } else { echo "---"; }?></td>
                        <td align="left" valign="middle" style="font-weight:bold; color: #999999">Academic&nbsp;Year:&nbsp;<?php if($res_year['fi_ac_startdate']!=""){ echo displaydate($res_year['fi_ac_startdate']);?>&nbsp;to&nbsp;<?php echo displaydate($res_year['fi_ac_enddate']); } else { echo "---"; }?></td>
                      </tr>
                  </table></td>
                  <td width="45%" align="right" valign="top"><table width="100%" height="20" border="0" cellpadding="0" cellspacing="2">
                      <tr>
                        <td width="15%" height="23" align="right" valign="top"><table width="100%" height="23" border="0" cellpadding="0" cellspacing="0">
                          <?php /*?>  <tr>
                              <td width="2%" class="btn1">&nbsp;</td>
                              <td width="96%" align="center" valign="middle" class="btn_mid" ><a href="?pid=44" class="header_link"></a></td>
                              <td width="2%" class="btn_rt">&nbsp;</td>
                            </tr><?php */?>
                        </table></td>
                        <td width="15%" align="left" valign="top"><table width="100%" height="23" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                              <td width="2%" class="btn1">&nbsp;</td>
                              <td width="96%" align="center" valign="middle" class="btn_mid" ><a href="?pid=44" class="header_link">Home</a><a href="?pid=54&action=albumlist" class="header_link"></a></td>
                              <td width="2%" class="btn_rt">&nbsp;</td>
                            </tr>
                        </table></td>
                        <td width="15%" align="left" valign="top"><table width="100%" height="23" border="0" cellpadding="0" cellspacing="0">
                            <?php /*?><tr>
                              <td width="2%" class="btn1">&nbsp;</td>
                              <td width="96%" align="center" valign="middle" class="btn_mid" ><a href="download.php?document=admin_userguide.pdf" class="header_link">Help</a></td>
                              <td width="2%" class="btn_rt">&nbsp;</td>
                            </tr><?php */?>
							 <tr>
                              <td width="2%" class="btn1">&nbsp;</td>
                              <td width="96%" align="center" valign="middle" class="btn_mid" ><a href="?pid=54&action=albumlist" class="header_link">Gallery</a><a href="download.php?document=admin_userguide.pdf" class="header_link"></a></td>
                              <td width="2%" class="btn_rt">&nbsp;</td>
                            </tr>
                        </table></td>
                        <td width="35%" align="left" valign="top"><table width="100%" height="23" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                              <td width="2%" class="btn1">&nbsp;</td>
                              <td width="96%" align="center" valign="middle" class="btn_mid" ><a href="?pid=41&action=change_password" class="header_link">Change Password</a></td>
                              <td width="2%" class="btn_rt">&nbsp;</td>
                            </tr>
                        </table></td>
                        <td width="20%" align="left" valign="top"><table width="100%" height="23" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                              <td width="2%" class="btn1">&nbsp;</td>
                              <td width="96%" align="center" valign="middle" class="btn_mid" ><a href="?pid=10" class="header_link">Logout</a></td>
                              <td width="2%" class="btn_rt">&nbsp;</td>
                            </tr>
                        </table></td>
                      </tr>
                  </table></td>
                </tr>
            </table>