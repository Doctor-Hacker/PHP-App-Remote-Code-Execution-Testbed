<?php
/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}

/**
*   *********** View all Requirements **************
*/

	if ($action=='list_classifieds'){ 
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong> Classifieds </strong></td>
              </tr>
			  
             <tr>
                <td width="1" class="bgcolor_02"></td>
                <td  align="left" valign="top">
				
				<table width="95%" border="0" cellspacing="0" cellpadding="0">
                  
                    <tr>
                    <td align="center" valign="top" class="error_message"><?php if($_GET['updatesucess']=="*1" ) { echo "Updated Sucess Fully"; }?> <?php if($_GET['insertsucess']=="*2" ) { echo "Inserted Sucess Fully"; }?> <?php  if($nill!="") echo $nill; ?>
					</td>
                  </tr>
                 
                   	<tr>
                    <td height="30" align="right" valign="top">
			<script type="text/javascript">

					function fun()
					{ 
						 if(document.staff.dc1.value==""){
							alert("Enter Start Date");		
							return false;
						}
						if(document.staff.dc2.value==""){
							alert("Enter End Date");		
							return false;
						}
						else
						{
						return true;
						}	   
					}
	 		</script>	
					<form name="staff" action="" method="post" >
					  <table width="100%">
							<tr>
								<td width="210">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
  								<tr>
								<td width="61%">Start&nbsp;Date:</td>
								<td width="34%"><input class="plain" name="dc1"  size="12" onFocus="this.blur()" readonly value="<?php if(isset($dc1)&&$dc1!='') echo $dc1; ?>"></td>
								<td width="25%"><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fStartPop(document.staff.dc1,document.staff.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt=""></a></td>
							  </tr>
							</table></td>
								<td width="236"><table width="94%" border="0" cellspacing="0" cellpadding="0">
							  <tr>
								<td width="61%">End&nbsp;Date:</td>
								<td width="33%"><input class="plain" name="dc2"  size="12" onFocus="this.blur()" readonly value="<?php if(isset($dc2)&&$dc2!='') echo $dc2; ?>"></td>
								<td width="20%"><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fEndPop(document.staff.dc1,document.staff.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt=""></a>
								<iframe width=132 height=142 name="gToday:contrast:agenda.js" id="gToday:contrast:agenda.js" src="<?php echo JS_PATH ?>/DateRange/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe>
								</td>
							  </tr>
							</table></td>
							<td width="351"><input type="submit" name="Search" value="Search" class="bgcolor_02" OnClick="return fun();" style="cursor:pointer;"/>&nbsp;&nbsp;&nbsp;<input name="addnew" type="submit" class="bgcolor_02" value="Add Classified" style="cursor:pointer;" />
							</td>
							</tr>
												
				     </table>
				  
		             </form>
				</td>
                  </tr>
					<tr>
						<td align="left" valign="top">
						
						<?php if($no_rows !='0'){?>
						<table width="100%" border="1" cellspacing="0" cellpadding="1" class="tbl_grid" align="center">
						  <tr class="bgcolor_02">
							<td width="5%" class="admin" align="center">S.No</td>
							<td width="20%" class="admin" align="center">Name</td>
							<td width="25%" class="admin" align="center">Type Of Ad</td>
							<td width="17%" class="admin" align="center">Posted Date</td>
							 <td width="16%" class="admin" align="center">Email</td>
							<td width="16%" class="admin" align="center">Action</td>
						  </tr>
				   <?php 
					$rownum = 1;	
					foreach ($es_clsifiedsList as $eachrecord){
					$zibracolor = ($rownum%2==0)?"even":"odd";
				   ?>
						 
					<tr class="<?php echo $zibracolor;?>" >
					<td align="center" class="narmal"><?php echo $rownum ; ?></td>
					<td align="center" class="narmal"><?php echo $eachrecord->cfs_name; ?></td>
					<td align="center" class="narmal"><?php echo $eachrecord->cfs_modeofadds; ?></td>
					<td align="center" class="narmal"><?php echo displaydate($eachrecord->cfs_posteddate); ?></td>
					<td align="center" class="narmal">
					<a href="javascript:void(0)" onclick="window.open('templates/sendaemail.php?sid=<?php echo $eachrecord->es_classifiedsId; ?>&action=mail','windowname1','width=630, height=600,scrollbars=yes'); return false;">Email</a></td>
					<td align="center" class="narmal"><a href=" ?pid=13&action=edit_classifieds&sid=<?php echo $eachrecord->es_classifiedsId;?>">
			<img src="images/b_edit.png" width="16" height="16" border="0" /></a><a href=" ?pid=13&action=view_classifieds&sid=<?php echo $eachrecord->es_classifiedsId;?>"><img src="images/b_browse.png" width="16" height="16" border="0" /></a><a href=" ?pid=13&action=delete_classifieds&sid=<?php echo $eachrecord->es_classifiedsId;?>"><img src="images/b_drop.png" width="16" height="16" border="0" /></a></td>
						  
					</tr>
						  
					<?php
					$rownum++;
					}?>	  
						</table>
						
						<?php
						}
						?>
						
						</td>
					  </tr>
				  
					<tr>
<td colspan="3" align="center">
<?php paginateexte($start, $q_limit, $no_rows, "&action=list_classifieds&action1=search&column_name=".$orderby."&asds_order=".$asds_order) ?></td>
					  </tr>		  
				    <tr>
                    <td align="left" valign="top">&nbsp;</td>
                  </tr>
                </table>
				
				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
                </tr>
            </table>
			
<?php
}
?>			

<?php

/**
*   ***********For Classifieds Registration , View and Edit *****************
*/
 
if($action=='classifieds_registration' || $action=='view_classifieds' || $action=='edit_classifieds' || $action=='mail'){

?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <form action="" method="post" name="classifieds">
	 
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp; Classified</strong></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td  align="left" valign="top"><table width="95%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="left" valign="top">&nbsp;</td>
                  </tr>
                  
                  <tr>
                    <td align="left" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="3" >
<?php
	 if ($action=='view_classifieds' || $action=='edit_classifieds' || $action=='mail') {
	     foreach ($es_clsifiedsList1 as $eachrecord1){
			 $name=$eachrecord1->cfs_name;
			 $moade=$eachrecord1->cfs_modeofadds;
			 $dateof=$eachrecord1->cfs_posteddate;
			 $desc=$eachrecord1->cfs_details;
	  	}
	 }
?> 
                      <tr>
                        <td width="25%" align="right" class="naramal">Name</td>
                        <td width="0%" align="center">:</td>
                        <td width="41%">
								<?php if($action=='edit_classifieds' || $action=='classifieds_registration') { ?>		
						<input type="text" name="cfs_name" id="cfs_name" value="<?php echo  $name; ?><?php if (isset($cfs_name)&&$cfs_name !="" ){echo $_POST['cfs_name'];}else{	echo "";}  ?>"  />
  <?php if (isset($ecfs_name)&&$ecfs_name!=""){echo '<div class="error_message">' . $ecfs_name . '</div>';	}?><?php }else{ echo  $name; }?><font color="#FF0000"><b>*</b></font></td>
                        <td width="34%">&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="right" class="naramal">Type&nbsp;Of&nbsp;Ad </td>
                        <td align="center">:</td>
						<td>
						<?php if($action=='edit_classifieds' || $action=='classifieds_registration') { ?>	
                        <input type="text" name="cfs_modeofads" id="cfs_modeofads" value="<?php echo $moade; ?><?php if (isset($cfs_modeofads)&&$cfs_modeofads !="" ){echo $_POST['cfs_modeofads'];}else{	echo "";}  ?>" />
						<?php if (isset($ecfs_modeofads)&&$ecfs_modeofads!=""){echo '<div class="error_message">' . $ecfs_modeofads . '</div>';	}?><?php }else{ echo $moade; }?><font color="#FF0000"><b>*</b></font></td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="right" class="naramal">Posted&nbsp;Date</td>
                        <td align="center">:</td>
                        <td>
	           			<?php if($action=='edit_classifieds' || $action=='classifieds_registration') { ?>	
						<table width="29%" border="0" cellspacing="0" cellpadding="0"><tr>
						<td width="17%">
						<input type="text" name="cfs_poteddate" id="cfs_poteddate"onchange="return registrationvalid()" readonly="" value="<?php if (isset($dateof)) { echo  formatDBDateTOCalender($dateof); }?><?php if (isset($cfs_poteddate)&&$cfs_poteddate !="" ){echo $_POST['cfs_poteddate'];}else{	echo "";}  ?>"/></td>
						
                    <td width="83%"><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.classifieds.cfs_poteddate);return false;" >
				 
				 <img name="popcal" align="absmiddle" src="<?php echo JS_PATH ?>/WeekPicker/calbtn.gif" width="34" height="22" border="0" alt=""></a></td>
                   </tr>				   
                </table>
				<iframe width=199 height=178 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="<?php echo JS_PATH ?>/WeekPicker/ipopeng.htm"     	scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe><?php if (isset($ecfs_poteddate)&&$ecfs_poteddate!=""){echo '<div class="error_message">' . $ecfs_poteddate . '</div>';	}?><?php }else{ echo displaydate($dateof); }?></td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="right" class="naramal" valign="top">Details</td>
                        <td align="center" valign="top">:</td>
                        <td><?php 
							
							if ($action=='edit_classifieds' || $action=='classifieds_registration') { 
								echo htmlEditor( $sName = 'blogDesc', $iH = '100', $iW = '300', $desc );
						?>
                        <?php //echo  $desc; ?><?php if (isset($blogDesc)&&$blogDesc !="" ){echo $_POST['blogDesc'];}else{	echo "";}  ?></textarea>
						<?php if (isset($ecfs_desc)&&$ecfs_desc!=""){echo '<div class="error_message">' . $ecfs_desc . '</div>';	}?><?php }else{ echo  $desc; }?></td>
						<td>&nbsp;</td>
                      </tr>
					   <tr>
                        <td align="right" class="naramal">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                       <td><?php if($action=="classifieds_registration" ){?><input name="submit" type="submit" class="bgcolor_02" value="Submit" style="cursor:pointer;"/><?php } else if($action=="edit_classifieds" ) {?> <input name="update" type="submit" class="bgcolor_02" value="update" style="cursor:pointer;" /><?php }?> <input type="submit" name="back" id="back" value="back" class="bgcolor_02" style="cursor:pointer;"/></td>
                        <td>&nbsp;</td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">&nbsp;</td>
                  </tr>
                </table>
				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
            </tr>
	  </form>	
</table>
<?php
	}
?>		