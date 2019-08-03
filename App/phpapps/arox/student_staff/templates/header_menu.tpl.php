 <?php  
	$sel_year = "SELECT *FROM `es_finance_master`  ORDER BY `es_finance_masterid` DESC LIMIT 0 , 1";
	$res_year = getarrayassoc($sel_year);
	 if ($_SESSION['eschools']['login_type']=="student"){
	 	$Home = "?pid=2&action=viewprofile";
		$Help = "download.php?document=student_usermanual.pdf";
		
	 }else{
	    $Home = "?pid=16&action=viewprofile";
		$Help = "download.php?document=staff_usermanual.pdf";
		
	 
	 }

?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="55%" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        
                        <td height="23" align="left" valign="bottom" style="font-weight:bold; color: #999999">Academic&nbsp;Year:&nbsp;<?php echo displaydate($res_year['fi_ac_startdate']);?>&nbsp;to&nbsp;<?php echo displaydate($res_year['fi_ac_enddate']);?></td>
                      </tr>
                  </table></td>
                  <td width="45%" align="right" valign="top"><table width="100%" height="20" border="0" cellpadding="0" cellspacing="2">
                      <tr>
                        <td width="15%" height="23" align="right" valign="top"><table width="100%" height="23" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                              <td width="2%" class="btn1">&nbsp;</td>
                              <td width="96%" align="center" valign="middle" class="btn_mid" ><a href="<?php echo $Home; ?>" class="header_link">Home</a></td>
                              <td width="2%" class="btn_rt">&nbsp;</td>
                            </tr>
                        </table></td>
                       
                     <?php /*?>   <td width="15%" align="left" valign="top"><table width="100%" height="23" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                              <td width="2%" class="btn1">&nbsp;</td>
                              <td width="96%" align="center" valign="middle" class="btn_mid" ><a href="<?php echo $Help; ?>" class="header_link">Help</a></td>
                              <td width="2%" class="btn_rt">&nbsp;</td>
                            </tr>
                        </table></td><?php */?>
                       <!-- <td width="35%" align="left" valign="top"><table width="100%" height="23" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                              <td width="2%" class="btn1">&nbsp;</td>
                              <td width="96%" align="center" valign="middle" class="btn_mid" ><a href="?pid=5&action=change_password" class="header_link">Change Password</a></td>
                              <td width="2%" class="btn_rt">&nbsp;</td>
                            </tr>
                        </table></td>-->
                        <td width="20%" align="left" valign="top"><table width="100%" height="23" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                              <td width="2%" class="btn1">&nbsp;</td>
                              <td width="96%" align="center" valign="middle" class="btn_mid" ><a href="?pid=9" class="header_link">Logout</a></td>
                              <td width="2%" class="btn_rt">&nbsp;</td>
                            </tr>
                        </table></td>
                      </tr>
                  </table></td>
                </tr>
            </table>