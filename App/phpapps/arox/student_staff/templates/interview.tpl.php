<?php

/**
* Only Admin users can view the pages
*/

if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}

/**
* *********************Candidate Details *******************
*/


if ($action=='interview_registration' || $action=='nonselectedlist' || $action=='valuesstaff'){
	if ($action=='nonselectedlist'){
		foreach ($es_nonselectedlist as $eachrecord3){
		
			$name			= $eachrecord3->st_firstname;
			$lastname		= $eachrecord3->st_lastname;
			$gender			= $eachrecord3->st_gender; 
			$dateofbirth	= $eachrecord3->st_dob;
			$postaplied		= $eachrecord3->st_post;
			$email			= $eachrecord3->st_email;
			$department		= $eachrecord3->st_department;
			$mobile			= $eachrecord3->st_mobilenocomunication;
			$wtest			= $eachrecord3->st_writentest;
			$ttest			= $eachrecord3->st_technicalinterview;
			$finalinterview = $eachrecord3->st_finalinterview;
			$status			= $eachrecord3->status;
			$st_qualification	= $eachrecord3->st_qualification;
			$st_department		= $eachrecord3->st_department;
			$post			= $eachrecord3->st_post;
			
			$st_selectremarks= $eachrecord3->status;
		}

}
	if($st_departments!='')
	{
	$departments=$st_departments;
	}
	else
	{
	$departments=$eachrecord1->st_department;
	}
	?>	
	<script language="javascript">
	function goto_URL(object)
	{
	window.location.href = object.options[object.selectedIndex].value;
	}
	</script>
	<iframe width=199 height=178 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="<?php echo JS_PATH ?>/WeekPicker/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"> </iframe>		<table width="100%" border="0" cellspacing="0" cellpadding="0">
       <form action="" name="interview" method="post">   
			 <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp; Candidate Details &gt;&gt; Interview Registration Form </strong></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top">
				<table width="100%"  border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="left" valign="top" >&nbsp;</td>
                  </tr>                   
                  <tr>
                    <td align="right" valign="top">					
					
					  <font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font>
					<br />					
					<table width="100%" border="0" cellspacing="0" cellpadding="0">					
			         <tr>
                       <td width="21%" height="20" align="left" valign="middle" class="narmal"><p>Department</p></td>
                         <td width="2%" height="20" align="left" valign="middle">:</td>
                       <td height="20" align="left" valign="middle"><?php if($action=='interview_registration' ){ ?>
						 <select name="st_department" onchange="goto_URL(this.form.st_department);" >
						<option value="?pid=58&action=interview_registration&sid=<?php echo $sid ;?>">-Select-</option>
							<?php foreach($getdeptlist as $eachrecord) { ?>
							<option value=" ?pid=58&action=interview_registration&sid=<?php echo $sid ;?>" <?php echo ($eachrecord[es_departmentsid]==	$departments)?"selected":""?>  ><?php echo $eachrecord[es_deptname];?></option>
								<?php } ?>
						   </select>
								<?php }?>
			
							<?php if($action=='nonselectedlist'){ ?>
								<input name="st_department" type="text" id="st_fname" value="<?php if($st_department!='') if(isset($eachrecord3->st_department)&&$eachrecord3->st_department!='') echo deptname($eachrecord3->st_department);?>" readonly />
							<?php } ?>					   </td>
                      </tr>
					   <tr>
                        <td height="20" align="left" valign="middle" class="narmal">Post Applied </td>
                        <td height="20" align="left" valign="middle">:</td>
                        <td height="20" align="left" valign="middle">
						<?php if($action=='interview_registration' ){ ?>
						
						<select name="st_posts" >
                       <option value="select" >Select</option>
                       <?php if(count($es_postList) > 0 ){
					   foreach ($es_postList as $eachrecord){ ?>
					   <option value="<?php echo $eachrecord->es_deptpostsId;?>" <?php echo ($eachrecord->es_deptpostsId==$eachrecord1->st_post)?"selected":""?>  ><?php echo $eachrecord->es_postname;?></option>
					   <?php    } } ?>
                        </select>
					    <?php }?>
							 <?php if($action=='nonselectedlist' ){ ?>
							<input name="st_posts" type="text" id="st_posts" value="<?php  if(isset($eachrecord3->st_post)&&$eachrecord3->st_post!='') echo postname($eachrecord3->st_post);?>" readonly />
						<?php } ?></td>
                      </tr>
                      <tr>
                        <td height="20" align="left" valign="middle" class="narmal"><p>First Name </p></td>
                        <td height="20" align="left" valign="middle">:</td>
                        <td height="20" align="left" valign="middle"><input name="st_fname" type="text" id="st_fname" value="<?php if($name!=''){ echo $name;} if(isset($eachrecord1->st_firstname)&&$eachrecord1->st_firstname!='') echo $eachrecord1->st_firstname;?>" readonly /></td>
                      </tr>
                      <tr>
                        <td height="20" align="left" valign="middle" class="narmal"><p>Last Name</p> </td>
                        <td height="20" align="left" valign="middle">:</td>
                        <td height="20" align="left" valign="middle"><input name="st_lname" type="text" id="st_lname"  value="<?php if($lastname!='') {echo $lastname; }if(isset($eachrecord1->st_lastname)&&$eachrecord1->st_lastname!='') echo $eachrecord1->st_lastname;?>" readonly /><?php if (isset($error_lname)&&$error_lname!=""){echo'<div class="error_message">' . $error_lname . '</div>';	} ?></td>
                      </tr>
					  
                       <tr>
                        <td height="20" align="left" valign="middle" class="narmal"><p>Mobile Number</p></td>
                        <td height="20" align="left" valign="middle">:</td>
                        <td height="20" align="left" valign="middle"><input name="st_mobilenumber" type="text" id="st_mobilenumber" value="<?php if($mobile!='') {echo $mobile;}if(isset($eachrecord1->st_prmobno)&&$eachrecord1->st_prmobno!='') echo $eachrecord1->st_prmobno;?>" readonly /><?php if (isset($error_Mobileno)&&$error_Mobileno!=""){echo'<div class="error_message">' . $error_Mobileno . '</div>';	} ?>                     </td>
                      </tr>
					  <tr>
                        <td height="20" align="left" valign="middle" class="narmal"><p>Email Id</p></td>
                        <td height="20" align="left" valign="middle">:</td>
                        <td height="20" align="left" valign="middle"><input name="st_email" type="text" id="st_email" value="<?php if($email!='') {echo $email;} if(isset($eachrecord1->st_email)&&$eachrecord1->st_email!='') echo $eachrecord1->st_email; ?>" readonly /><?php if (isset($error_email)&&$error_email!=""){echo'<div class="error_message">' . $error_email . '</div>';	} ?>                        </td>
                      </tr>
					   <tr>
                        <td height="20" align="left" valign="middle" class="narmal"><p>Gender</p></td>
                        <td height="20" align="left" valign="middle">:</td>
                        <td height="20" align="left" valign="middle">
						<?php if($action=='interview_registration' ){ ?>						
						<input name="st_gender" type="text" size="58" value="<?php if($st_gender!='') {echo $st_gender;} elseif(isset($eachrecord1->st_gender)&&$eachrecord1->st_gender!='') echo $eachrecord1->st_gender; ?>" readonly/>
						<?php } ?>
						<?php if($action=='nonselectedlist' ){ ?>
						<input name="st_gender" type="text" id="st_gender" value="<?php if(isset($eachrecord3->st_gender)&&$eachrecord3->st_gender!='') echo $eachrecord3->st_gender;?>" readonly />
						<?php } ?>						</td>												
					  </tr>
					   <tr>
                        <td height="20" align="left" valign="middle" class="narmal"><p>Date of birth</p></td>
                        <td height="20" align="left" valign="middle">:</td>
                        <td height="20" align="left" valign="middle"> <table width="29%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
								    <td width="17%"><input name="st_dob"  value="<?php if($dateofbirth!='') {echo formatDBDateTOCalender($dateofbirth);}if(isset($eachrecord1->st_dob)&&$eachrecord1->st_dob!='') echo formatDBDateTOCalender($eachrecord1->st_dob); ?>"  type="text"size="14" onchange="return registrationvalid()" readonly /></td>
                                     <td width="83%"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.interview.st_dob);return false;" ><img name="popcal" align="absmiddle" src="<?php echo JS_PATH ?>/WeekPicker/calbtn.gif" width="34" height="22" border="0" alt="" /></a></td>
                                </tr>
                           </table>
                        </td>
                      </tr>
                      <tr align="left" valign="middle">
                        <td height="20" colspan="3" class="bgcolor_02"><strong>&nbsp;Interview&nbsp;Results</strong></td>
                      </tr>
					  <tr>
                        <td height="20" align="left" valign="middle" class="narmal"><p>Written test</p></td>
                        <td height="20" align="left" valign="middle">:</td>
                        <td height="20" align="left" valign="middle"><input name="st_wtest" type="text" id="st_wtest" value="<?php if($wtest!=''){echo $wtest;} if(isset($st_wtest)&&$st_wtest !="" ){echo $st_wtest;}else{echo "";} ?>"  />  </td>
                      </tr>
					  <tr>
                        <td height="20" align="left" valign="middle" class="narmal"><p>Technical Interview</p></td>
                        <td height="20" align="left" valign="middle">:</td>
                        <td height="20" align="left" valign="middle"><input name="st_techin" type="text" id="st_techin" value="<?php if($ttest!='') { echo  $ttest; } if(isset($st_techin)&&$st_techin !="" ){echo $st_techin;}else{echo "";}?>"  /> </td>
                      </tr><tr>
                        <td height="20" align="left" valign="middle" class="narmal"><p>Final Interview</p></td>
                        <td height="20" align="left" valign="middle">:</td>
                        <td height="20" align="left" valign="middle"><input name="st_finalin" type="text" id="st_finalin" value="<?php if($finalinterview!='') { echo $finalinterview; } if(isset($st_finalin)&&$st_finalin !="" ){echo $st_finalin;}else{echo "";}?>" /></td>
                        </tr>					
					  <tr>
                        <td height="20" align="left" valign="middle" class="narmal"><p>Remarks</p></td>
                        <td height="20" align="left" valign="middle">:</td>
                        <td height="20" align="left" valign="middle">
						<?php if($action!='nonselectedlist' ){ ?>
						<select name="st_selectremarks" id="st_selectremarks" onChange = "this.form.submit()" style="width:150px">
						
                          <option value="">........select.........</option>
                          <option value="notselected" <?php if(isset($st_selectremarks) && $st_selectremarks=='notselected'){echo "selected='selected'";}?> >Not Selected</option>
                          <option value="onhold" <?php if(isset($st_selectremarks) && $st_selectremarks=='onhold'){echo "selected='selected'";}?>>On Hold</option>
                          <option value="selected" <?php if(isset($st_selectremarks) && $st_selectremarks=='selected'){echo "selected='selected'";}?>>Selected</option>
                        </select><?php } else{ ?><select name="st_selectremarks" id="st_selectremarks"  style="width:150px">
						
                          <option value="">........select.........</option>
                          <option value="notselected" <?php if(isset($st_selectremarks) && $st_selectremarks=='notselected'){echo "selected='selected'";}?> >Not Selected</option>
                          <option value="onhold" <?php if(isset($st_selectremarks) && $st_selectremarks=='onhold'){echo "selected='selected'";}?>>On Hold</option>
                          <option value="selected" <?php if(isset($st_selectremarks) && $st_selectremarks=='selected'){echo "selected='selected'";}?>>Selected</option>
                        </select><?php } ?>  <font color="#FF0000"><b>*</b></font>						</td>
                      </tr>
                       <tr align="left" valign="middle">
                        <td height="20" colspan="3" class="bgcolor_02">&nbsp;<strong>If Selected</strong></td>
                      </tr>
					   <tr>
					   <td height="20" align="left" valign="middle" class="narmal"><p>Previous Package</p></td>
                         <td height="20" align="left" valign="middle">:</td>
                         <td height="20" align="left" valign="middle"><input name="st_prvpac" type="text" id="st_prvpac" value="<?php if(isset($st_prvpac)&&$st_prvpac !="" ){echo $st_prvpac;}else{echo "";} ?>"<?php if($action!='nonselectedlist' ){ ?><?php if($st_selectremarks!='selected'){ ?> readonly="readonly" <?php } }?> /></td>
                       </tr>
                       <tr>
                         <td height="20" align="left" valign="middle" class="narmal"><p>Basic</p></td>
                         <td height="20" align="left" valign="middle">:</td>
                         <td height="20" align="left" valign="middle"><input name="st_basic" type="text" id="st_basic" value="<?php if(isset($st_basic)&&$st_basic !="" ){echo $st_basic;}else{echo "";} ?>"<?php if($action!='nonselectedlist' ){ ?> <?php if($st_selectremarks!='selected'){ ?> readonly="readonly" <?php }} ?> />&nbsp;<font color="#FF0000"><b>*</b></font></td>
                       </tr>
                       <tr>
                         <td height="20" align="left" valign="middle" class="narmal"><p>Date Of Joining</p></td>
                         <td height="20" align="left" valign="middle">:</td>
                    <td height="20" align="left" valign="middle"><table width="34%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                     <td width="17%"><input name="st_doj"  value="<?php if(isset($st_doj)&&$st_doj !="" ){echo formatDateCalender($st_doj);}else{echo "";} ?>"  type="text"size="14" onchange="return registrationvalid()"  id="st_doj"/></td>
                                     <td width="83%"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.interview.st_doj);return false;" ><img name="popcal" align="absmiddle" src="<?php echo JS_PATH ?>/WeekPicker/calbtn.gif" width="34" height="22" border="0" alt="" /></a>&nbsp;&nbsp;<font color="#FF0000"><b>*</b></font></td>
                                </tr>
                           </table>                      </td>
                       </tr>
                      
                       <tr>
                         <td height="20" align="left" valign="middle" class="narmal" ><p>Remarks</p></td>
                         <td height="20" align="left" valign="middle">:</td>
                         <td height="20" align="left" valign="middle"><textarea name="st_remarks" id="st_remarks"><?php if(isset($st_remarks)&&$st_remarks !="" ){echo $st_remarks;}else{echo "";} ?></textarea></td>
                       </tr>
                       <tr>
                         <td height="20" align="left" valign="middle" class="narmal">&nbsp;</td>
                         <td height="20" align="left" valign="middle">&nbsp;</td>
                         <td height="20" align="left" valign="middle">
						 <?php
						 if($action !='nonselectedlist' )
                           { ?>
						 <input name="Submit" type="submit" class="bgcolor_02" value="Submit" style="cursor:pointer"/>
						 <?php } else { ?>
						  <input name="updateinterview" type="submit" class="bgcolor_02" value="Update" style="cursor:pointer"/>
						  <?php } ?>
						 
						<a href="?pid=23&action=take_interview">
									
						 <input name="back1" type="button" class="bgcolor_02" value="Back" style="cursor:pointer" onClick="parent.location='?pid=23&action=take_interview'"/></a></td>
                       </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">&nbsp;</td>
                  </tr>
                </table></td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
             </tr>
	<?php /*?>	<script type="text/javascript">
							
			function Disable(aList){
				if (aList.selectedIndex == 0 || aList.selectedIndex == 1 || aList.selectedIndex == 2){
					document.getElementById("st_prvpac").disabled = true;
					document.getElementById("st_basic").disabled  = true;
					document.getElementById("st_doj").disabled    = true;
					document.getElementById("st_post").disabled   = true;
			//document.getElementById("st_department").disabled=true;
					document.getElementById("st_remarks").disabled=true;
				}
				if (aList.selectedIndex == 3){
					document.getElementById("st_prvpac").disabled = false;
					document.getElementById("st_basic").disabled  = false;
					document.getElementById("st_doj").disabled    = false;
					document.getElementById("st_post").disabled   = false;
				//document.getElementById("st_department").disabled=false;
					document.getElementById("st_remarks").disabled=false;
				}
			}
			window.onload = init
				function init(){
					document.getElementById("st_prvpac").disabled=true;
					document.getElementById("st_basic").disabled=true;
					document.getElementById("st_doj").disabled=true;
					document.getElementById("st_post").disabled=true;
			//document.getElementById("st_department").disabled=true;
					document.getElementById("st_remarks").disabled=true;
				}
		</script><?php */?>
	</form>
</table>
			
<?php
}

/**
* *********************Applicants List ************************************
*/

	if ($action=='applicants_list'||$action=='searchlimit'){
?>			
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;Applicants List </strong></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td  align="left" valign="top">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
				   <td colspan="6" align="center" >&nbsp;</td>
				  </tr>
				  <tr>
				  <form action="" method="post">
                    <td width="12%" height="30" align="left" valign="top">&nbsp;&nbsp;<span class="narmal">Status : </span></td>
					
                    <td width="19%" align="left" valign="top">
					<select name="searchselect" id="searchselect" style="width:110px;">
					
                     
                      <option value="notselected"  <?php echo ($searchselect=='notselected')?"selected":""?>>Not Selected</option>
                      <option value="onhold"  <?php echo ($searchselect=='onhold')?"selected":""?>>On Hold</option>
                      <option value="selected"  <?php echo ($searchselect=='selected')?"selected":""?>>Selected</option>		  
                    </select>                    
					</td>
                    <td width="17%" align="left" valign="top">&nbsp;&nbsp;<span class="narmal">Department : </span></td>
                    <td width="11%" align="left" valign="top">
					
					 <select name="serchdepartment">
						<option value="">-Select-</option>
							<?php foreach($getdeptlist as $eachrecord) { ?>
							<option value="<?php echo $eachrecord[es_departmentsid];?>" <?php echo ($eachrecord[es_departmentsid]==	$serchdepartment)?"selected":""?>  ><?php echo $eachrecord[es_deptname];?></option>
			               <?php } ?>
			        </select>
					</td>
                    <td  colspan="6"width="41%" align="left" valign="top">
					&nbsp;&nbsp;
					<input type="submit" name="selectionsearch" value="Search" class="bgcolor_02" style="cursor:pointer"/>
					<!--<input name="takainterview" type="submit" class="bgcolor_02" value="Take Interview" />--></td>
					</form>                    
                  </tr>
				  <?php if(isset($nill1) && $nill1!="")  { ?>
				   <tr>
				  <td colspan="10" align="center" class="narmal"><?php  echo $nill1 ; ?></td>
				  </tr>
				  <?php } ?>
				  <tr><td> </td></tr>
				  <?php
					if($no_rows1!=0)
					{
					
					?>
                  <tr>
				  <td colspan="10" align="center" valign="top">
					
					<table width="96%" border="1" cellspacing="0" cellpadding="1" class="tbl_grid" align="center">
                      <tr class="bgcolor_02" align="center">
                        <td width="5%" height="20" class="admin" align="center">
			             S.No</td>
                        <td width="13%" class="admin" align="center">
								 ID</td>
                        <td width="21%" class="admin" align="center">
						Name</td>
                        <td width="15%" class="admin" align="center">
						Post</td>
                        <td width="12%" class="admin" align="center">
						Dept</td>
                        <td width="19%"  class="admin" align="center">
				          Interview Date</td>
                        <td width="15%"  class="admin" align="center">
	                   Status</td>
						<td width="15%"  class="admin" align="center">&nbsp;&nbsp;<strong>Action</strong></td>
                      </tr>		  
					  
					  <?php 
						$rownum = 1;	
						foreach ($es_staffList as $eachrecord1){
						$zibracolor = ($rownum%2==0)?"even":"odd";
					   ?>	  
                      <tr class="<?php echo $zibracolor;?>">
                        <td align="center" class="narmal"><?php echo $rownum ; ?></td>
                        <td align="center" class="narmal"><?php echo $eachrecord1->es_staffId; ?></td>
                        <td align="center" class="narmal"><?php echo  ucwords($eachrecord1->st_firstname)."".ucwords($eachrecord1->st_lastname); ?></td>
                        <td align="center" class="narmal"><?php echo postname($eachrecord1->st_post); ?></td>
                        <td align="center" class="narmal"><?php echo deptname($eachrecord1->st_department); ?></td>
                        <td align="center" class="narmal"> <?php echo displaydate($eachrecord1->intdate); ?></td>
                        <td align="center" class="narmal"><?php if($eachrecord1->status=='notselected'){ echo "Not Selected";}
						if($eachrecord1->status=='onhold'){ echo "On Hold";}
						if($eachrecord1->status=='selected'){ echo "Selected";}?></td>
						<?php if($eachrecord1->status=='selected'){?>
						<td align="center" >
						<?php if(in_array('9_8',$admin_permissions)){?><a href=" ?pid=15&action=addtostaff&sid=<?php echo $eachrecord1->es_staffId; ?>&st_departments=<?php echo ($eachrecord1->st_department); ?>" class="video_link">Add&nbsp;To&nbsp;</a><?php }?>
						 </td>
						<?php } ?>
						<?php if($eachrecord1->status=='onhold'){?>
						<td align="center" class="narmal">
						<?php if(in_array('9_8',$admin_permissions)){?><a href=" ?pid=15&action=nonselectedlist&sid=<?php echo $eachrecord1->es_staffId; ?>" class="video_link"><img src="images/b_edit.png" border="0" title="Edit" alt="Edit" /></a><?php }?>
						 </td>			
						
						<?php } ?>
						<?php if($eachrecord1->status=='notselected'){?>
						<td align="center" class="narmal">
						<?php if(in_array('9_8',$admin_permissions)){?><a href=" ?pid=15&action=nonselectedlist&sid=<?php echo $eachrecord1->es_staffId; ?>&st_postaplied12=<?php echo $st_postaplied12;?>" class="video_link"><img src="images/b_edit.png" border="0" title="Edit" alt="Edit" /></a><?php }?>
						 </td>						
						
						<?php } ?>
					  </tr>
                      
					  <?php
						$rownum++;
					  }?>	  
                      </table>		   
	                </td>          
                  <tr>
                    <td colspan="8" align="center">
                      <?php paginateexte($start, $q_limit, $no_rows1, "&action=searchlimit&searchselect=".$searchselect."&serchdepartment=".$serchdepartment."&column_name=".$orderby."&asds_order=".$asds_order) ?>
					</td>
				  </tr>
				  <tr>
                    <td colspan="8" align="center"> <?php if (in_array("9_103", $admin_permissions)) {?><input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=15&action=print_list&searchselect=<?php echo $searchselect; ?>&serchdepartment=<?php echo $serchdepartment; ?>&start=<?php echo $start;?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /><?php }?></td>
				  </tr>
				  <?php
		           }
		           ?>
             </table>
			</td>
                <td width="1" class="bgcolor_02"></td>
         </tr>
              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02">
				</td>
             </tr>
</table>		
<?php
 }
?>

<?php  if($action=="print_list"){
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_candidate','HRD','Applicants List','','Print','".$_SERVER['REMOTE_ADDR']."',NOW())";
     $log_insert_exe=mysql_query($log_insert_sql);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">

				 
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>	
               <tr>
                <td height="5" colspan="3"  ></td>
              </tr>			  
               <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Applicants List</span></td>
              </tr>	
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="center" valign="top"><br />
				
				<table width="96%" border="1" cellspacing="0" cellpadding="1" class="tbl_grid" align="center">
                      <tr class="bgcolor_02" align="center">
                        <td width="5%" height="20" class="admin" align="center">S.No</td>
                        <td width="13%" class="admin" align="center">ID</td>
                        <td width="21%" class="admin" align="center">Name</td>
                        <td width="15%" class="admin" align="center">Post</td>
                        <td width="12%" class="admin" align="center">Dept</td>
                        <td width="19%"  class="admin" align="center">Interview Date</td>
                        <td width="15%"  class="admin" align="center">Status</td>
						
                      </tr>		  
					  
					  <?php 
						$rownum = 1;	
						foreach ($es_staffList as $eachrecord1){
						$zibracolor = ($rownum%2==0)?"even":"odd";
					   ?>	  
                      <tr class="<?php echo $zibracolor;?>">
                        <td align="center" class="narmal"><?php echo $rownum ; ?></td>
                        <td align="center" class="narmal"><?php echo $eachrecord1->es_staffId; ?></td>
                        <td align="center" class="narmal"><?php echo  ucwords($eachrecord1->st_firstname)."".ucwords($eachrecord1->st_lastname); ?></td>
                        <td align="center" class="narmal"><?php echo postname($eachrecord1->st_post); ?></td>
                        <td align="center" class="narmal"><?php echo deptname($eachrecord1->st_department); ?></td>
                        <td align="center" class="narmal"> <?php echo displaydate($eachrecord1->intdate); ?></td>
                        <td align="center" class="narmal"><?php if($eachrecord1->status=='notselected'){ echo "Not Selected";}
						if($eachrecord1->status=='onhold'){ echo "On Hold";}
						if($eachrecord1->status=='selected'){ echo "Selected";}?></td>
						</tr>
                      
					  <?php
						$rownum++;
					  }?>	  
                      </table>
                
				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
             
               
              
              
  		     <tr><td colspan="3" class="bgcolor_02" height="1"></td></tr>
			  
			  
   
</table>

<?php } ?>

<?php

/**
* **************** Add / Edit Staff *******************************
*/

if($action=='addtostaff' || $action=='editstaff' )
{
$st_permissions_arr =array();
if($action=='addtostaff')
{
foreach ($es_staffList1 as $eachrecord1){
	 $name=$eachrecord1->st_firstname;
	 $lastname=$eachrecord1->st_lastname;
	 $gender=$eachrecord1->st_gender; 
	$dateofbirth=$eachrecord1->st_dob;
	$st_prvpac=$eachrecord1->st_perviouspackage;
	$st_basic=$eachrecord1->st_basic;
	$st_doj=$eachrecord1->st_dateofjoining;
	  $departments=$eachrecord1->st_department;
	 $postaplied=$eachrecord1->st_postaplied;
	 $email=$eachrecord1->st_email;
	 // $email=$eachrecord1->st_qualification;
	$mobile=$eachrecord1->st_mobilenocomunication;
	 $st_qualification=$eachrecord1->st_qualification;
	  }
	  
	  $getdeptlist = getamultiassoc($exesqlquery);
	
	//fetching  dept  ///
	
	if(isset($departments))
	{
	$es_postList = $obj_postlist->GetList(array(array("es_postshortname","=","$departments")));
	}
	  }
	  if($action=='editstaff')
	  {
	 foreach ($es_staffListedit as $eachrecord1){
	 $name=$eachrecord1->st_firstname;
	 $lastname=$eachrecord1->st_lastname;
	 $gender=$eachrecord1->st_gender; 
	 $dateofbirth=$eachrecord1->st_dob;
	 $postaplied=$eachrecord1->st_post;
	 $email=$eachrecord1->st_email;
	 $mobile=$eachrecord1->st_mobilenocomunication;
	 $image=$eachrecord1->image;
	 $st_primarysubject=$eachrecord1->st_primarysubject;
	 $st_primarysubject1=explode(',',$st_primarysubject);
	 $st_fatherhusname=$eachrecord1->st_fatherhusname;
	 $st_noofdughters=$eachrecord1->st_noofdughters;
	 $st_noofsons=$eachrecord1->st_noofsons;
	 $st_examp1 =$eachrecord1->st_examp1 ;
	 $st_examp2 =$eachrecord1->st_examp2;
	 $st_examp3=$eachrecord1->st_examp3;
	 $st_borduniversity1=$eachrecord1->st_borduniversity1;
	 $st_borduniversity2=$eachrecord1->st_borduniversity2;
	 $st_borduniversity3=$eachrecord1->st_borduniversity3;
	 $st_year1=$eachrecord1->st_year1;
	 $st_year2=$eachrecord1->st_year2;
	 $st_year3=$eachrecord1->st_year3;
	 $st_insititute1=$eachrecord1->st_insititute1 ;
	 $st_insititute2=$eachrecord1->st_insititute2 ;
	 $st_insititute3=$eachrecord1->st_insititute3;
	 $st_position1=$eachrecord1->st_position1;
	 $st_position2=$eachrecord1->st_position2;
	 $st_position3=$eachrecord1->st_position3;
	 $st_period1=$eachrecord1->st_period1;
	 $st_period2=$eachrecord1->st_period2;
	 $st_period3=$eachrecord1->st_period3;
	 $st_pradress =$eachrecord1->st_pradress ;
	 $st_prcity=$eachrecord1->st_prcity;
	 $st_prpincode=$eachrecord1->st_prpincode;
	 $st_prphonecode=$eachrecord1->st_prphonecode;
	 $st_prstate=$eachrecord1->st_prstate;
	 $st_prresino=$eachrecord1->st_prresino;
	 $st_prcountry=$eachrecord1->st_prcountry;
	 $st_prmobno=$eachrecord1->st_prmobno;
	 $st_peadress=$eachrecord1->st_peadress;
	 $st_pecity=$eachrecord1->st_pecity;
	 $st_pepincode=$eachrecord1->st_pepincode;
	 $st_pephoneno=$eachrecord1->st_pephoneno;
	 $st_pestate=$eachrecord1->st_pestate;
	 $st_peresino=$eachrecord1->st_peresino;
	 $st_pecountry=$eachrecord1->st_pecountry;
	 $st_pemobileno=$eachrecord1->st_pemobileno;
	 $st_refposname1=$eachrecord1->st_refposname1;
	 $st_refposname2=$eachrecord1->st_refposname2;
	 $st_refposname3=$eachrecord1->st_refposname3;
	 $st_refdesignation1=$eachrecord1->st_refdesignation1;
	 $st_refdesignation2=$eachrecord1->st_refdesignation2;
	 $st_refdesignation3=$eachrecord1->st_refdesignation3;
	 $st_refinsititute1=$eachrecord1->st_refinsititute1;
	 $st_refinsititute2=$eachrecord1->st_refinsititute2;
	 $st_refinsititute3=$eachrecord1->st_refinsititute3;
	 $st_refemail1=$eachrecord1->st_refemail1;
	 $st_refemail2=$eachrecord1->st_refemail2;
	 $st_refemail3=$eachrecord1->st_refemail3;
	  $st_perviouspackage=$eachrecord1->st_perviouspackage;
	  $st_basic=$eachrecord1->st_basic;
	  $st_post=$eachrecord1->st_post;
	   $st_department=$eachrecord1->st_department;
	    $st_subject=$eachrecord1->st_subject;
	  // $st_class=$eachrecord1->st_class;
	 $st_dateofjoining=$eachrecord1->st_dateofjoining;
	 $st_remarks=$eachrecord1->st_remarks;
	 $st_user=$eachrecord1->st_username ;
	 $st_password=$eachrecord1->st_password;
	 $st_theme=$eachrecord1->st_theme;
	 $st_qualification=$eachrecord1->st_qualification;
	 $st_marks1 = $eachrecord1->st_marks1;
	 $st_marks2 = $eachrecord1->st_marks2;
	 $st_marks3 = $eachrecord1->st_marks3;
	 $st_bloodgroup = $eachrecord1->st_bloodgroup;
	 $st_permissions_123 = $eachrecord1->st_permissions;
	 $teach_nonteach_type=$eachrecord1->teach_nonteach;
    }
	 if($st_permissions_123 !=""){
	 $st_permissions_arr = explode(",",$st_permissions_123);
	 }
	  if($st_class!=''){ $st_class=$st_class ;}else{ $st_class=$eachrecord1->st_class;}
	  
	  if($st_departments!='')
	  {
	  $departments=$st_departments;
	  }
	  else
	  {
	  $departments=$st_department;
	  }
	  

	$es_postList = $obj_postlist->GetList(array(array("es_postshortname","=","$departments")));
	}
	
	?>	
	<script type="text/javascript">
function showtable(){
	if(document.getElementById("feed_dis_1").checked) {
		document.getElementById("feedback").style.display = "block";
	}
	else {
		document.getElementById("feedback").style.display = "none";
	}
}
</script>
	<script language="javascript">
	function goto_URL(object)
	{
	window.location.href = object.options[object.selectedIndex].value;
	}
	</script>	
  	
	
        <script type="text/javascript">
	
	function getfieldvalues(){
		if (document.getElementById('sameaddress1').checked){
			//alert("checked");
			document.viewstaff.st_peadress.value=document.viewstaff.st_address.value;
			document.viewstaff.st_pecity.value=document.viewstaff.st_city.value;
			document.viewstaff.st_pepin.value=document.viewstaff.st_pin.value;
			document.viewstaff.st_pephone.value=document.viewstaff.st_phone.value;
			document.viewstaff.st_pestate.value=document.viewstaff.st_state.value;
			document.viewstaff.st_pemobno.value=document.viewstaff.st_mobile.value;
			document.viewstaff.st_pecountry.value=document.viewstaff.st_country.value;
		}else{
			document.viewstaff.st_peadress.value="";
			document.viewstaff.st_pecity.value="";
			document.viewstaff.st_pepin.value="";
			document.viewstaff.st_pephone.value="";
			document.viewstaff.st_pestate.value="";
			document.viewstaff.st_pemobno.value="";
			document.viewstaff.st_pecountry.value="";
		}
  }
 </script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<form action="" method="post" name="viewstaff" enctype="multipart/form-data"> 
       
              <tr>
               <td height="3" colspan="3"></td>
	          </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp; <strong>Staff </strong></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                  <td align="center" valign="top"><table width="100%" border="0" align="center" cellpadding="3" cellspacing="0">
                   <tr>
                        <td width="3%">&nbsp;</td>
                        <td width="24%" align="left" valign="middle" class="narmal"> Employee Id </td>
                        <td width="1%" align="center" valign="middle">:</td>
                        <td width="23%" align="left" valign="middle"><?php echo $es_staffid=$eachrecord1->es_staffId; ?> </td>
                 
			</tr>
                  <tr>     
                  <tr>
                        <td width="3%">&nbsp;</td>
                        <td width="24%" align="left" valign="middle" class="narmal"> First&nbsp;Name </td>
                        <td width="1%" align="left" valign="middle">:</td>
                        <td width="23%" align="left" valign="middle"><input type="text" name="st_fname" id="st_fname" value="<?php if($name!='') echo $name; ?>" /><font color="#FF0000"><b>*</b></font></td>
                   <?php if($action=='editstaff'){?>
				<td width="49%" colspan="4" rowspan="7" align="center" valign="middle" >
				<img src="images/staff/<?php echo $image;?>" name="previewField" width="127" height="105" border="0" id="previewField" /></td>
        <?php } ?>
                    </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td align="left" valign="middle" class="narmal">Last&nbsp;Name </td>
                        <td align="left" valign="middle">:</td>
                        <td align="left" valign="middle"><input type="text" name="st_lname" id="st_lname" value="<?php if($lastname!='') echo $lastname; ?>"/></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td align="left" valign="middle" class="narmal">Gender</td>
                        <td align="left" valign="middle">:</td>
                        <td align="left" valign="middle">
                  
                        <input type="text" name="st_gender" id="st_gender" value="<?php if(isset($gender) && $gender!=''){ echo $gender;} ?>" readonly="readonly"/></td>
                      </tr>               
                       <tr height="25" >
								<td align="left" class="narmal"></td>
                               						   
                              <td  align="left" class="narmal" colspan="3" >
							  <table width="100%" border="0">
							  <?php 
							  if(!$_POST){
							   if($teach_nonteach_type=="teach" || $feed_dis==""){$a = "checked='checked'";$b = "";}
							   if($feed_dis=='nonteaching' || $teach_nonteach_type=="nonteaching"){$b = "checked='checked'";$a = "";}
							  }else{
							  if($feed_dis=='teaching'){$a = "checked='checked'";$b = "";}
							   if($feed_dis=='nonteaching'){$b = "checked='checked'";$a = "";}
							  }
							   
							  
							  ?>
							  <tr>
								<td><input type="radio" name="feed_dis" id="feed_dis_1" value="teaching" <?php echo $a;?> onclick="showtable();" />&nbsp;Teaching Staff</td>
								<td><input type="radio" name="feed_dis" id="feed_dis_2" value="nonteaching" <?php echo $b;?> onclick="showtable();" />&nbsp;Non - Teaching Staff</td>
								
							  </tr>
							</table>
                            </td>
                  </tr> 				  
					  <tr>
                        <td>&nbsp;</td>
                        <td align="left" valign="middle" class="narmal">Department </td>
                        <td align="left" valign="middle">:</td>
                        <td align="left" valign="middle">
						
						<select name="st_department" onchange="goto_URL(this.form.st_department);" style="width:150px;">
						 <?php echo $action; 
						if($action!='editstaff') {
						?> 
							<?php foreach($getdeptlist as $eachrecord) { ?>
							<option value=" ?pid=15&action=addtostaff&st_departments=<?php echo $eachrecord[es_departmentsid];?>&sid=<?php echo $sid ;?>" <?php echo ($eachrecord[es_departmentsid]==	$st_departments)?"selected":""?>  ><?php echo $eachrecord[es_deptname];?></option>
			<?php } ?>
						<?php } else {?>
					
						  
							<?php foreach($getdeptlist as $eachrecord) { ?>
							<option value=" ?pid=15&action=editstaff&st_departments=<?php echo $eachrecord[es_departmentsid];?>&sid=<?php echo $sid ;?>" <?php echo ($eachrecord[es_departmentsid]==	$st_departments)?"selected":""?>  ><?php echo $eachrecord[es_deptname];?></option>
			<?php } ?></select><?php } ?><font color="#FF0000"><b>*</b></font>
						</td>
                      </tr> 	  
					  
                      <tr>
                        <td>&nbsp;</td>
                        <td align="left" valign="middle" class="narmal">Post Applied For </td>
                        <td align="left" valign="middle">:</td>
                        <td align="left" valign="middle">
						
						<select name="st_posts" style="width:150px;"><?php 
						if($action!='editstaff') {
						?>
						
						
						
                       <option value="" >Select</option>
                       <?php 
					   if($st_departments!='')
					   {
					   $online_sql="select * from es_deptposts where es_postshortname=".$st_departments;
 $online_row=$db->getRows($online_sql);
					   if(count($online_row) > 0 ){
					   foreach ($online_row as $eachrecord){ ?>
					   <option value="<?php echo $eachrecord['es_deptpostsId'];?>" <?php echo ($eachrecord['es_deptpostsId']==$st_post)?"selected":""?>  ><?php echo $eachrecord['es_postname'];?></option>
					   <?php   } } }?>
                  <?php } else { ?>
                       <option value="" >Select</option>
                       <?php if(count($es_postList) > 0 ){
					   foreach ($es_postList as $eachrecord){ ?>
					   <option value="<?php echo $eachrecord->es_deptpostsId;?>" <?php echo ($eachrecord->es_deptpostsId==$eachrecord1->st_post)?"selected":""?>  ><?php echo $eachrecord->es_postname;?></option>
					   <?php    } }?>
                    </select><?php } ?><font color="#FF0000"><b>*</b></font>
						</td>
                      </tr>
					  <tr>
							  <td>&nbsp;</td>
							  <td colspan="3">
				  <div id="feedback" style="display:<?php if($a!="") {echo "none";} else {echo "block";} ?>;">
				  
				    <table border="0" width="100%" >
					<tr>
                       
                        <td width="29%" align="left" valign="middle" class="narmal"> Class </td>
                        <td width="2%" align="left" valign="middle">:</td>
                        <td width="69%" align="left" valign="middle">
						<select name="st_class" onchange="JavaScript:document.viewstaff.submit();" style="width:150px;">
						<option value="">-Select-</option>
							<?php foreach($getclasslist as $eachrecord) { ?>
							<option value="<?php echo $eachrecord[es_classesid];?>" <?php echo ($eachrecord[es_classesid]==	$st_class)?"selected='selected'":""?>  ><?php echo $eachrecord[es_classname];?></option>
			                <?php } ?>
			           </select>
					  <font color="#FF0000"><b>*</b></font></td>
                    </tr>					  
					<tr>
                        
                        <td width="29%" align="left" valign="middle" class="narmal"> Primary Subject </td>
                        <td width="2%" align="left" valign="middle">:</td>
                        <td width="69%" align="left" valign="middle">
                        
                        <?php  $eachrecord1->st_subject;
						 $st_subject;
						?>
						<select name="st_subject" style="width:150px;">
						<option value="" >Select</option>
						<?php if($action == 'editstaff' && !$_POST && $eachrecord1->st_class!="") {
						$es_subjectList_123 = $db->getrows("SELECT * FROM es_subject WHERE es_subjectshortname=".$eachrecord1->st_class);
						
						if(count($es_subjectList_123) > 0 ){
					   foreach ($es_subjectList_123 as $eachrecord){ ?>
					   <option value="<?php echo $eachrecord['es_subjectid'];?>" <?php echo ($eachrecord['es_subjectid']==$eachrecord1->st_subject)?"selected='selected'":""?> ><?php 
					   		
					   echo $eachrecord['es_subjectname']; echo $selvalue; ?></option>
					   <?php    } }}else{?>
						      
							 <?php if(count($es_subjectList) > 0 ){
					   foreach ($es_subjectList as $eachrecord){ ?>
					   <option value="<?php echo $eachrecord->es_subjectId;?>" <?php echo ($eachrecord->es_subjectId==$st_subject)?"selected='selected'":""?> ><?php echo $eachrecord->es_subjectname;?></option>
					   <?php    } }}?>
                       </select>
					   
					<font color="#FF0000"><b>*</b></font></td>                        
                    </tr>	
				<?php /*?>	<tr>
                        
                        <td align="left" valign="middle" class="narmal">Secondary Subject</td>
                        <td align="left" valign="middle">:</td>					
						
						 <td align="left" valign="middle"><input name="st_secsub" type="text" id="st_secsub" value="<?php if(isset($st_secsub)&&$st_secsub!='') { echo $st_secsub; } elseif(isset($st_primarysubject)&& $st_primarysubject) { echo $st_primarysubject;} ?>" /></td>              		  
                  
                     </tr><?php */
					 
				 $query="SELECT st_permissions FROM `es_staff` WHERE es_staffid= '".$eachrecord1->es_staffId."'";
					
					$res=mysql_query($query);
					while($row=mysql_fetch_array($res))
					{
						 $per=$row['st_permissions'];
						$result=explode(',',$per);
						 $permision_str1;
			  $permision_str2=explode(',',$permision_str1);
			 // array_print($permision_str2);
			$permision_str2[0];
			$permision_str2[1];
			$permision_str2[2];
			$permision_str2[3];
						
					 ?>
					 <tr>
                     
                        <td align="left" valign="middle" class="narmal">Can prepare & upload Assignment</td>
                        <td align="left" valign="middle">:</td>
                        <td colspan="4" align="left" valign="middle">
                        
                     <?php  
						  if($result[0]==1||$result[1]==1||$result[2]==1||$result[3]==1){?>
                        <input type="checkbox" name="permision_str1[]" value="1" checked="checked"/>
                        <?php }else{?><input type="checkbox" name="permision_str1[]" value="1" <?php if($permision_str2[0]==1 || $permision_str2[1]==1 || $permision_str2[2]==1 || $permision_str2[3]==1){?> checked="checked" <?php }?>  /><?php }?>
                        
                        </td>
					 </tr>
					  <tr>
                       
                        <td align="left" valign="middle" class="narmal">Can mark Attendence</td>
                        <td align="left" valign="middle">:</td>
                        <td colspan="4" align="left" valign="middle">
                         <?php   
						 if($result[0]==2||$result[1]==2||$result[2]==2||$result[3]==2){?>
                        <input type="checkbox" name="permision_str1[]" value="2" checked="checked" 	>
                        <?php }else{?><input type="checkbox" name="permision_str1[]" value="2"  <?php if($permision_str2[0]==2 || $permision_str2[1]==2 || $permision_str2[2]==2 || $permision_str2[3]==2){?> checked="checked" <?php }?>  /><?php }?>
                        </td>
                      </tr>
					  <tr>
                        
                        <td align="left" valign="middle" class="narmal">Can prepare & upload Examination</td>
                        <td align="left" valign="middle">:</td>
                        <td colspan="4" align="left" valign="middle">
                         <?php   if($result[0]==3|| $result[1]==3 || $result[2]==3 || $result[3]==3){?>
                         <input type="checkbox" name="permision_str1[]" value="3" checked="checked" >
                          <?php }else{?><input type="checkbox" name="permision_str1[]" value="3"  <?php if($permision_str2[0]==3 || $permision_str2[1]==3 || $permision_str2[2]==3 || $permision_str2[3]==3){?> checked="checked" <?php }?>  /><?php }?>
                         </td>
                      </tr>
					  <tr>
                      
                        <td align="left" valign="middle" class="narmal">Can enter Obtained Marks</td>
                        <td align="left" valign="middle">:</td>
                        <td colspan="4" align="left" valign="middle">
                       <?php   if($result[0]==4 || $result[1]==4 || $result[2]==4 || $result[3]==4){?>
                        <input type="checkbox" name="permision_str1[]" value="4" checked="checked" >
                         <?php }else{?><input type="checkbox" name="permision_str1[]" value="4" <?php if($permision_str2[0]==4 || $permision_str2[1]==4 || $permision_str2[2]==4 || $permision_str2[3]==4){?> checked="checked" <?php }?>  /><?php }?>
                        </td>
                      </tr>	
                      
                     <?php }?>
					</table>
					</div>
					
				  <script language="javascript" type="text/javascript">
				  	showtable();
				  </script>
				  </td>
				  </tr>	  		  
					
					    <tr>
                        <td>&nbsp;</td>
                        <td align="left" valign="middle" class="narmal">Username</td>
                        <td align="left" valign="middle">:</td>
                        <td colspan="4" align="left" valign="middle"><input name="st_user" type="text" id="st_user" value="<?php if($st_user!='') echo $st_user; ?>"<?php if($action=='editstaff'){?> readonly="" <?php } ?>/>				  
						
						<font color="#FF0000"><b>*</b></font></td>
                      </tr>
					  <?php
					  if($action!='editstaff')
					  {
					  ?>
					   <tr>
                        <td>&nbsp;</td>
                        <td align="left" valign="middle" class="narmal">Password</td>
                        <td align="left" valign="middle">:</td>
                        <td colspan="4" align="left" valign="middle"><input name="st_password" type="password" id="st_password"/><font color="#FF0000"><b>*</b></font></td>
                      </tr>
					  <?php
					  }
					 if($action=='editstaff'){
					  ?>
					  <tr>
                        <td>&nbsp;</td>
                        <td align="left" valign="middle" class="narmal">Password</td>
                        <td align="left" valign="middle">:</td>
                        <td colspan="4" align="left" valign="middle"><input name="" type="" value="<?php if($eachrecord1->st_password!='') echo $eachrecord1->st_password; ?>" id="st_password" readonly=""/><font color="#FF0000"><b>*</b></font></td>
                      </tr>
					  <?php }?>
					   <tr>
                       <tr>
                        <td>&nbsp;</td>
                        <td align="left" valign="middle" class="narmal">Date Of Birth </td>
						 <td align="left" valign="middle">:</td>
                       	 <td align="left" valign="middle" colspan="4"><input  name="st_dob" value="<?php if($dateofbirth!='') echo formatDBDateTOCalender($dateofbirth); ?>"  type="text" size="14" onchange="return registrationvalid()" id="st_dob" readonly/><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.viewstaff.st_dob);return false;" ><img name="popcal" align="absmiddle" src="<?php echo JS_PATH ?>/WeekPicker/calbtn.gif" width="34" height="22" border="0" alt="" /></a></td>
						
                     </tr>
					 <?php if($action=='addtostaff'){?>							
						 <tr>
						 
						  <td>&nbsp;</td>
					   <td align="left" valign="middle" class="narmal">Previous Package</td>
                         <td align="left" valign="middle">:</td>
                         <td align="left" valign="middle" colspan="4"><input name="st_prvpac" type="text" id="st_prvpac" value="<?php if(isset($st_prvpac)&& $st_prvpac !="" ){echo $st_prvpac;}?>" /></td>
                       
                       </tr>
                       <tr>
					    <td>&nbsp;</td>
                         <td align="left" valign="middle" class="narmal">Basic</td>
                         <td align="left" valign="middle">:</td>
                         <td align="left" valign="middle"><input name="st_basic" type="text" id="st_basic" value="<?php if(isset($st_basic)&& $st_basic !="" ){echo $st_basic;}?>" />&nbsp;<font color="#FF0000"><b>*</b></font></td>
                        
                       </tr>
                       <tr>
					    <td>&nbsp;</td>
                         <td align="left" valign="middle" class="narmal">Date Of Joining </td>
                         <td align="left" valign="middle">:</td>
                         <td align="left" valign="middle" colspan="4"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                     <td width="17%"><input name="st_doj"  value="<?php if(isset($st_doj)&&$st_doj !="" ){echo formatDBDateTOCalender($st_doj);}else{echo "";} ?>"  type="text" size="14" onchange="return registrationvalid()"  id="st_doj" readonly=""/></td>
                                     <td width="83%"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.viewstaff.st_doj);return false;" ><img name="popcal" align="absmiddle" src="<?php echo JS_PATH ?>/WeekPicker/calbtn.gif" width="34" height="22" border="0" alt="" /></a>&nbsp;<font color="#FF0000"><b>*</b></font></td>
                                </tr>
                           </table>
                      </td>
                        
                       </tr>		
					 <?php }?>
					   <tr>
                        <td>&nbsp;</td>
                        <td align="left" valign="middle" class="narmal">No Of Children </td>
                        <td align="left" valign="middle">:</td>
                        <td colspan="4" align="left" valign="middle"><input name="st_son" type="text" id="st_son" value="<?php if($st_noofsons!='') echo $st_noofsons; if(isset($es_staffList2->st_noofsons)&&$es_staffList2->st_noofsons!='') echo $es_staffList2->st_noofsons; ?>" /></td>
                      </tr>					 
                      <tr>
                        <td valign="top">&nbsp;</td>
                        <td align="left" valign="middle" class="narmal">Email</td>
                        <td align="left" valign="middle">:</td>
                        <td colspan="4" align="left" valign="middle"><input name="st_email" type="text" id="st_email" value="<?php 
						if(isset($st_email) && $st_email!=""){echo $st_email;}elseif(isset($email) && $email!='') {echo $email;} ?>" /></td>
                      </tr>
					  
                      <tr>
                        <td valign="top">&nbsp;</td>
                        <td align="left" valign="middle" class="narmal">Blood Group</td>
                        <td align="left" valign="middle">:</td>
                        <td colspan="4" align="left" valign="middle"><input name="st_bloodgroup" type="text" id="st_bloodgroup" value="<?php if($st_bloodgroup!='') echo $st_bloodgroup; ?>" />
						
						</td>
                      </tr>
					  <tr>
                        <td valign="top">&nbsp;</td>
                        <td align="left" valign="middle" class="narmal">Upload Photo </td>
                        <td align="left" valign="middle">:</td>
                        <td colspan="4" align="left" valign="middle"><input type="file" name="photo_upload"   id="picField"  />
                          <input type="hidden" name="photo"  id="photo" value="<?php if($image!='') echo $image; ?>"/>
						
						</td>
                      </tr>
                      <tr>                        
                        <td height="23" colspan="8" align="left" valign="middle" class="bgcolor_02"><strong>&nbsp;&nbsp;Qualification</strong></td>                 
                    </tr>
					  <tr>                        
                        <td  colspan="87" valign="top"></td>                        
                      </tr>
                      <tr>
                     
                        
                        <td colspan="8" class="narmal"><table width="100%" border="0" cellspacing="0" cellpadding="0" class = "tbl_grid">
                        <tr>
                              <td width="10%" height="20" align="center" class="bgcolor_02"><strong>&nbsp;S No </strong></td>
                              <td width="30%" align="center" class="bgcolor_02"><strong>&nbsp;&nbsp;&nbsp;Exam Passed </strong></td>
							   <td width="31%" align="center" class="bgcolor_02">&nbsp;&nbsp;&nbsp;Marks Obtained</td>
                          <td width="30%" align="center" class="bgcolor_02"><strong>&nbsp;&nbsp;Board / University </strong></td>
                          <td width="30%" align="center" class="bgcolor_02"><strong>&nbsp;&nbsp;Year</strong></td>
                          </tr>
                            <tr>
											  <td align="center" class="narmal"><input name="st_sno1" type="text" id="st_sno1" size="5"  value="1"/></td>
										      <td class="narmal"><input name="st_pass1" type="text" id="st_pass1"  value="<?php 
											  if(isset($eachrecord1->st_examp1) && $st_pass1=="" ){
											  echo $eachrecord1->st_examp1;}else{echo $st_pass1;}?>"/></td>
											  <td class="narmal"><input name="st_marks1" type="text" id="st_marks1"  value="<?php 
											  if(isset($eachrecord1->st_marks1) && $st_marks1=="" ){
											  echo $eachrecord1->st_marks1;}else{echo $st_marks1;}?>"/></td>
										      <td class="narmal"><input name="st_board1" type="text" id="st_board1" value="<?php  
											  if(isset($eachrecord1->st_borduniversity1) && $st_board1==""){
											  echo $eachrecord1->st_borduniversity1;}else{echo $st_board1;}?>" /></td>
											  <td class="narmal"><input name="st_year1" type="text" id="st_year1" value="<?php  
											  if(isset($eachrecord1->st_year1) && $st_year1==""){
											  echo $eachrecord1->st_year1;}else{echo $st_year1;}?>" /></td>
										    </tr>
										  <tr>
										    <td align="center" class="narmal"><input name="st_sno2" type="text" id="st_sno2" size="5"  value="2"/></td>
											  <td class="narmal"><input name="st_pass2" type="text" id="st_pass2"  value="<?php  
											  if(isset($eachrecord1->st_examp2) && $st_pass2=="" ){
											  echo $eachrecord1->st_examp2;}else{echo $st_pass2;}?>"/></td>
											   <td class="narmal"><input name="st_marks2" type="text" id="st_marks2"  value="<?php 
											  if(isset($eachrecord1->st_marks2) && $st_marks2=="" ){
											  echo $eachrecord1->st_marks2;}else{echo $st_marks2;}?>"/></td>
											  <td class="narmal"><input name="st_board2" type="text" id="st_board2"value="<?php 
											  if(isset($eachrecord1->st_borduniversity2) && $st_board2==""){
											  echo $eachrecord1->st_borduniversity2;}else{echo $st_board2;}?>" /></td>
											 <td class="narmal"><input name="st_year2" type="text" id="st_year2" value="<?php 
											  if(isset($eachrecord1->st_year2) && $st_year2==""){
											  echo $eachrecord1->st_year2;}else{echo $st_year2;}?>"/></td>
										 </tr>
										<tr>
										  <td align="center" class="narmal"><input name="st_sno3" type="text" id="st_sno3" size="5"  value="3"/></td>
										  <td class="narmal"><input name="st_pass3" type="text" id="st_pass3" value="<?php  
										  if(isset($eachrecord1->st_examp3) && $st_pass3=="" ){
											  echo $eachrecord1->st_examp3;}else{echo $st_pass3;}?>"/></td>
										  <td class="narmal"><input name="st_marks3" type="text" id="st_marks3"  value="<?php 
											  if(isset($eachrecord1->st_marks3) && $st_marks3=="" ){
											  echo $eachrecord1->st_marks3;}else{echo $st_marks3;}?>"/></td>
									      <td class="narmal"><input name="st_board3" type="text" id="st_board3" value="<?php 
										   if(isset($eachrecord1->st_borduniversity3) && $st_board3==""){
											  echo $eachrecord1->st_borduniversity3;}else{echo $st_board3;} ?>"/></td>
										 <td class="narmal"><input name="st_year3" type="text" id="st_year3" value="<?php 
										  if(isset($eachrecord1->st_year3) && $st_year3==""){
											  echo $eachrecord1->st_year3;}else{echo $st_year3;}?>"/>										 </td>
										</tr>
                        </table></td>
						
                      </tr>
                      <tr>                        
                        <td height="23" colspan="8" align="left" valign="middle" class="bgcolor_02"><strong>&nbsp;&nbsp;Experience</strong></td>            
                    </tr>
					  <tr>                        
                        <td  colspan="8" valign="top"></td>                        
                      </tr>
                      <tr>
                       
                        <td colspan="8" class="narmal"><table width="100%" border="0" cellspacing="0" cellpadding="0" class = "tbl_grid">
                            <tr>
                              <td width="10%" height="20" align="center" class="bgcolor_02"><strong>&nbsp;S No </strong></td>
                              <td width="30%" align="center" class="bgcolor_02"><strong>&nbsp;&nbsp;Institution</strong></td>
                              <td width="30%" align="center" class="bgcolor_02"><strong>&nbsp;&nbsp;&nbsp;Position</strong></td>
                              <td width="30%" align="center" class="bgcolor_02"><strong>Period</strong></td>
                          </tr>
                            <tr>
                              <td align="center" class="narmal"><input name="st_sno4" type="text" id="st_sno4" size="5"  value="1"/></td>
                              <td class="narmal"><input name="st_inst1" type="text" id="st_inst1"  value="<?php 
							  if(isset($eachrecord1->st_insititute1) && $st_inst1==""){
							  echo $eachrecord1->st_insititute1;}else{echo $st_inst1;}?>"/></td>
                              <td class="narmal"><input name="st_position1" type="text" id="st_position1" value="<?php 
							  if(isset($eachrecord1->st_position1) && $st_position1=="" ){
							  echo $eachrecord1->st_position1;} else{echo $st_position1;}?>" /></td>
                              <td class="narmal"><input name="st_period1" type="text" id="st_period1" value="<?php
							  if(isset($eachrecord1->st_period1) && $st_period1==""){
							   echo $eachrecord1->st_period1;}else{echo $st_period1;}?>"/></td>
                            </tr>
                            <tr>
                              <td align="center" class="narmal"><input name="st_sno5" type="text" id="st_sno5" size="5"  value="2"/></td>
                              <td class="narmal"><input name="st_inst2" type="text" id="st_inst2"  value="<?php 
							  
							  if(isset($eachrecord1->st_insititute2) && $st_inst2==""){
							  echo $eachrecord1->st_insititute2;}else{echo $st_inst2;}?>" /></td>
                              <td class="narmal"><input name="st_position2" type="text" id="st_position2"  value="<?php  
							  if(isset($eachrecord1->st_position2) && $st_position2=="" ){
							  echo $eachrecord1->st_position2;} else{echo $st_position2;}?>" /></td>
                              <td class="narmal"><input name="st_period2" type="text" id="st_period2"  value="<?php  
							  if(isset($eachrecord1->st_period2) && $st_period2==""){
							   echo $eachrecord1->st_period2;}else{echo $st_period2;}?>" /></td>
                            </tr>
                            <tr>
                              <td align="center" class="narmal"><input name="st_sno6" type="text" id="st_sno6" size="5" value="3" /></td>
                              <td class="narmal"><input name="st_inst3" type="text" id="st_inst3"  value="<?php  
							  if(isset($eachrecord1->st_insititute3) && $st_inst3==""){
							  echo $eachrecord1->st_insititute3;}else{echo $st_inst3;}?>"/></td>
                              <td class="narmal"><input name="st_position3" type="text" id="st_position3" value="<?php 
							  if(isset($eachrecord1->st_position3) && $st_position3=="" ){
							  echo $eachrecord1->st_position3;} else{echo $st_position3;}?>"/></td>
                              <td class="narmal"><input name="st_period3" type="text" id="st_period3" value="<?php  
							  if(isset($eachrecord1->st_period3) && $st_period3==""){
							   echo $eachrecord1->st_period3;}else{echo $st_period3;}?>" /></td>
                            </tr>
                        </table></td>
						
                      </tr>					  
					  <tr>
                           <td height="23" colspan="8" align="left" valign="middle" class="bgcolor_02"><strong>&nbsp;&nbsp;Present Address</strong></td>
                    </tr>
                      <tr>
                        <td valign="top">&nbsp;</td>
                        <td colspan="6" valign="top" class="narmal"><table width="100%" border="0" cellspacing="3" cellpadding="0">
                            
                            <tr>
                              
                              <td width="20%" align="left" class="narmal">Address</td>
                              <td width="2%" align="left">:</td>
                              <td width="20%" align="left"><textarea name="st_address" id="st_address"><?php 
							  if(isset($eachrecord1->st_pradress) && $st_address==""){
							  echo $eachrecord1->st_pradress;}else{echo $st_address;}?></textarea></td>
                              <td width="17%" align="left">&nbsp;</td>
                              <td width="32%" align="left">&nbsp;</td>
                              <td width="5%">&nbsp;</td>
                              <td width="4%">&nbsp;</td>
                            </tr>
                            <tr>
                              
                              <td align="left" class="narmal">City</td>
                              <td align="left">:</td>
                              <td align="left"><input name="st_city" type="text" id="st_city" size="15"  value="<?php 
							  if(isset($eachrecord1->st_prcity) && $st_city==""){
							  echo $eachrecord1->st_prcity;}else{echo $st_city;}?>"/></td>
                              <td align="left" class="narmal">State:</td>
                              <td align="left"><input name="st_state" type="text" id="st_state" size="15" value="<?php 
							  if(isset($eachrecord1->st_prstate) && $st_state==""){
							  echo $eachrecord1->st_prstate;}else{echo $st_state;}?>" /></td>
                              <td class="narmal">&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td align="left">Country</td>
                              <td align="left">:</td>
                              <td align="left"><input name="st_country" type="text" id="st_country" size="15"  value="<?php
							  if(isset($eachrecord1->st_prcountry) && $st_country==""){
							   echo $eachrecord1->st_prcountry;}else{echo $st_country;}?>"/></td>
                              <td align="left">Post Code:</td>
                              <td align="left"><input name="st_pincode" type="text" id="st_pincode" size="15" value="<?php 
							  if(isset($eachrecord1->st_prpincode) && $st_pincode==""){
							   echo $eachrecord1->st_prpincode;}else{echo $st_pincode;}?>" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              
                              <td align="left" class="narmal" >Phone </td>
                              <td align="left">:</td>
                              <td align="left"><input name="st_phone" type="text" id="st_phone" size="15" value="<?php  
							  if(isset($eachrecord1->st_prphonecode) && $st_phone==""){
							  echo  $eachrecord1->st_prphonecode;}else{echo $st_phone;}?>"/></td>
                              <td align="left" class="narmal">Mobile&nbsp;:</td>
                              <td align="left"><input name="st_mobile" type="text" id="st_mobile" size="15"  value="<?php 
							  if(isset($eachrecord1->st_prmobno) && $st_mobile==""){
							  echo  $eachrecord1->st_prmobno;}else{echo $st_mobile;}?>" />
                              &nbsp;<font color="#FF0000"><b>*</b></font></td>
                              <td class="narmal">&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td width="0%">&nbsp;</td>
                            </tr>
                        </table></td>
                      </tr>					  
					       <tr>
                              <td  colspan="8" align="left" valign="middle" class="bgcolor_02"><strong><span class="admin">&nbsp;&nbsp;Permanent</span> Address</strong><span class="admin">             
							 <input type="checkbox" name="sameaddress1" id="sameaddress1" value="0" onclick="javascript:getfieldvalues()" />Same as Above </span></td>
					</tr>
					   
                  <tr>
                        <td valign="top">&nbsp;</td>
                        <td colspan="6" valign="top" class="narmal">
						<table width="100%" border="0" cellspacing="3" cellpadding="0">
                        <tr>
                              <td width="2%">&nbsp;</td>
                              <td width="18%" align="left" class="narmal">Address</td>
                              <td width="2%" align="left">:</td>
                              <td width="20%" align="left">							  
								<textarea name="st_peadress"><?php 
								if(isset($eachrecord1->st_peadress) && $st_peadress=="" ){
								echo $eachrecord1->st_peadress;}else{echo $st_peadress;}?></textarea></td>							
						
                              <td width="17%" align="left">&nbsp;</td>
                              <td width="32%" align="left">&nbsp;</td>
                              <td width="5%">&nbsp;</td>
                          <td width="4%">&nbsp;</td>
                          </tr>
                            <tr>
                              <td>&nbsp;</td>
                              <td align="left" class="narmal">City </td>
                              <td align="left">:</td>
                              <td align="left"><input name="st_pecity" type="text" id="st_pecity" size="15"  value="<?php  
							  if(isset($eachrecord1->st_prcity) && $st_pecity==""){echo $eachrecord1->st_prcity;}else{echo $st_pecity ;}?>"/></td>
							  
                              <td align="left" class="narmal">State</td>
                              <td align="left"><input name="st_pestate" type="text" id="st_pestate" size="15" value="<?php  
							  if(isset($eachrecord1->st_prstate) && $st_pestate==""){echo $eachrecord1->st_prstate;}else{echo $st_pestate ;}?>" /></td>
							  
                              <td class="narmal">&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                              <td align="left">Country</td>
                              <td align="left">&nbsp;</td>
                              <td align="left"><input name="st_pecountry" type="text" id="st_pecountry" size="15" value="<?php 
							  if(isset($eachrecord1->st_prcountry) && $st_pecountry==""){ echo $eachrecord1->st_prcountry;}else{ echo $st_pecountry ;}?>" /></td>
                              <td align="left">Post Code</td>
                              <td align="left"><input name="st_pepin" type="text" id="st_pepin" size="15" value="<?php  
							  if(isset($eachrecord1->st_prpincode) && $st_pepin==""){echo $eachrecord1->st_prpincode;}else{echo $st_pepin ;}
							 ?>"/></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                              <td align="left" class="narmal">Phone </td>
                              <td align="left">:</td>
                              <td align="left">
							  <input name="st_pephone" type="text" id="st_pephone" size="15" value="<?php 
							  if(isset($eachrecord1->st_prphonecode) && $st_pephone=="" ){echo $eachrecord1->st_prphonecode;}else{echo $st_pephone ;}?>" /></td>
							  
                              <td align="left" class="narmal">Mobile&nbsp;</td>
                              <td align="left"><input name="st_pemobno" type="text" id="st_pemobno" size="15" value="<?php
							  if(isset($eachrecord1->st_prmobno) && $st_pemobno==""){echo $eachrecord1->st_prmobno;}else{echo $st_pemobno;}?>" /></td>
                              <td class="narmal">&nbsp;</td>
                              <td>&nbsp;</td>							
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                              <td align="left">&nbsp;</td>
                              <td align="left">&nbsp;</td>
                              <td align="left">&nbsp;</td>
                              <td align="left">&nbsp;</td>
                              <td align="left">&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>                           
                        </table></td>
                      </tr>
					  <tr>
                           <td height="23"  colspan="8" align="left" valign="middle" class="bgcolor_02"><strong><span class="admin">&nbsp;&nbsp;Reference</span> </strong></td>
				    </tr>
					<tr>
                            <td  colspan="8" ></td>
				    </tr>					  
                      <tr>
                        
                        <td colspan="8" valign="top" class="narmal"><table width="100%" border="1" cellspacing="0" cellpadding="1" class="tbl_grid" align="center">
                        <tr>
                              <td width="5%" height="20" align="center" class="bgcolor_02"><strong>&nbsp;S No </strong></td>
                              <td width="40%" align="center" class="bgcolor_02"><strong>Reference&nbsp;</strong></td>
                              <td width="20%" align="center" class="bgcolor_02"><strong>&nbsp;&nbsp;Designation </strong></td>
                              <td width="20%" align="center" class="bgcolor_02"><strong>&nbsp;&nbsp;Institute</strong></td>
                              <td width="15%" align="center" class="bgcolor_02">&nbsp;<strong>E-mail</strong> </td>
                          </tr>
                            <tr>
                     <td align="center" class="narmal"><input name="st_sno7" type="text" id="st_sno7" size="5"  value="1"/></td>
                     <td align="center" class="narmal"><input name="st_refname1" type="text" id="st_refname1" size="15" value="<?php if($st_refposname1!='') echo $st_refposname1;if(isset($es_staffList2->st_refposname1)&&$es_staffList2->st_refposname1!='') echo $es_staffList2->st_refposname1; ?>" /></td>
                     <td align="center" class="narmal"><input name="st_desg1" type="text" id="st_desg1" size="15" value="<?php if($st_refdesignation1!='') echo $st_refdesignation1; if(isset($es_staffList2->st_refdesignation1)&&$es_staffList2->st_refdesignation1!='') echo $es_staffList2->st_refdesignation1;?>" /></td>
                     <td align="center" class="narmal"><input name="st_inst4" type="text" id="st_inst4" size="15" value="<?php if($st_refinsititute1!='') echo $st_refinsititute1;if(isset($es_staffList2->st_refinsititute1)&&$es_staffList2->st_refinsititute1!='') echo $es_staffList2->st_refinsititute1; ?>" /></td>
                     <td align="center" class="narmal"><input name="st_email1" type="text" id="st_email1" size="15" value="<?php if($st_refemail1!='') echo $st_refemail1;if(isset($es_staffList2->st_refemail1)&&$es_staffList2->st_refemail1!='') echo $es_staffList2->st_refemail1; ?>" /></td>
                          </tr>
                            <tr>
                         <td align="center" class="narmal"><input name="st_sno8" type="text" id="st_sno8" size="5" value="2" /></td>
                      <td align="center" class="narmal"><input name="st_refname2" type="text" id="st_refname2" size="15" value="<?php if($st_refposname2!='') echo $st_refposname2;if(isset($es_staffList2->st_refposname2)&&$es_staffList2->st_refposname2!='') echo $es_staffList2->st_refposname2; ?>" /></td>
                      <td align="center" class="narmal"><input name="st_desg2" type="text" id="st_desg2" size="15"  value="<?php if($st_refdesignation2!='') echo $st_refdesignation2;if(isset($es_staffList2->st_refdesignation2)&&$es_staffList2->st_refdesignation2!='') echo $es_staffList2->st_refdesignation2;?>"/></td>
                       <td align="center" class="narmal"><input name="st_inst5" type="text" id="st_inst5" size="15" value="<?php if($st_refinsititute2!='') echo $st_refinsititute2; if(isset($es_staffList2->st_refinsititute2)&&$es_staffList2->st_refinsititute2!='') echo $es_staffList2->st_refinsititute2;?>" /></td>
                  <td align="center" class="narmal">
					      <input type="text" name="st_email2" id="st_email2" size="15" value="<?php if(isset($st_refemail2)&&$st_refemail2!='') {echo $st_refemail2 ; } else { echo $es_staffList2->st_refemail2;}?>"/></td>
                          </tr>
                            <tr>
                           <td align="center" class="narmal"><input name="st_sno9" type="text" id="st_sno9" size="5"  value="3"/></td>
                       <td align="center" class="narmal"><input name="st_refname3" type="text" id="st_refname3" size="15" value="<?php if($st_refposname3!='') echo $st_refposname3; if(isset($es_staffList2->st_refposname3)&&$es_staffList2->st_refposname3!='') echo $es_staffList2->st_refposname3;?>"/></td>
                       <td align="center" class="narmal"><input name="st_desg3" type="text" id="st_desg3" size="15"  value="<?php if($st_refdesignation3!='') echo $st_refdesignation3;if(isset($es_staffList2->st_refdesignation3)&&$es_staffList2->st_refdesignation3!='') echo $es_staffList2->st_refdesignation3; ?>"/></td>
                       <td align="center" class="narmal"><input name="st_inst6" type="text" id="st_inst6" size="15" value="<?php if($st_refinsititute3!='') echo $st_refinsititute3; if(isset($es_staffList2->st_refinsititute3)&&$es_staffList2->st_refinsititute3!='') echo $es_staffList2->st_refinsititute3; ?>" /></td>
                        <td align="center" class="narmal"><input name="st_email3" type="text" id="st_email3" size="15"  value="<?php if($st_refemail3!='') echo $st_refemail3;if(isset($es_staffList2->st_refemail3)&&$es_staffList2->st_refemail3!='') echo $es_staffList2->st_refemail3; ?>"/></td>
                          </tr>
                        </table></td>
                      </tr>
					  <?php
					  if($action=='editstaff')
	                  {
			          ?>
					  <tr>
					  <td>&nbsp;</td>
					  </tr>
					   <tr>					  
					 <td height="23"  colspan="8" align="left" valign="middle" class="bgcolor_02"><span><strong class="admin">&nbsp;&nbsp;Selected</strong></span></td>
                    </tr>
					  <tr>
					  <td>&nbsp;</td>
					  </tr>
					   <tr>
					   <td width="3%">&nbsp;</td>
                         <td align="left" >Previous Package</td>
                         <td align="left">:</td>
                         <td align="left">
						 <input name="st_prvpac" type="text" id="st_prvpac"  value="<?php  echo $st_perviouspackage; ?>"/>
			</td>
                         <td colspan="4" align="left">&nbsp;</td>
                    </tr>
                       <tr>
					   <td width="3%">&nbsp;</td>
                         <td align="left" >Basic</td>
                         <td align="left">:</td>
                         <td align="left"><input name="st_basic" type="text" id="st_basic" value="<?php if($st_basic!='') echo $st_basic; ?>" />&nbsp;<font color="#FF0000"><b>*</b></font></td>
                         <td colspan="4" align="left">&nbsp;</td>
                    </tr>
                       <tr>
					   <td width="3%">&nbsp;</td>
                         <td align="left" >Date Of Joining </td>
                         <td align="left">:</td>
                    <td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
															
                                     <td width="17%"><input name="st_doj2"  value="<?php if(isset($st_doj2)&& $st_doj2 !=""  ){echo $st_doj2;}else{echo formatDBDateTOCalender($st_dateofjoining);} ?>"  type="text"size="14" onchange="return registrationvalid()"  id="st_doj2" readonly/></td>
                                     <td width="83%"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.viewstaff.st_doj2);return false;" ><img name="popcal" align="absmiddle" src="<?php echo JS_PATH ?>/WeekPicker/calbtn.gif" width="34" height="22" border="0" alt="" /></a>&nbsp;<font color="#FF0000"><b>*</b></font></td>
                                </tr>
                           </table>
                   <iframe width=199 height=178 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="<?php echo JS_PATH ?>/WeekPicker/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"> </iframe>
						 
						 </td>
                         <td colspan="4" align="left">&nbsp;</td>
                    </tr>
                       
                       <tr>
					   <td width="3%">&nbsp;</td>
                         <td align="left" >Remarks</td>
                         <td align="left">:</td>
                         <td align="left"><textarea name="st_remarks" cols="16" id="st_remarks"><?php if($st_remarks!='') echo $st_remarks; ?></textarea></td>
                         <td colspan="4" align="left">&nbsp;</td>
				    </tr> 
                    
                    <tr>					  
					 <td height="23"  colspan="8" align="left" valign="middle" class="bgcolor_02"><span><strong class="admin">&nbsp;&nbsp;TRANSPORT</strong></span></td>
                    </tr>
                    <tr>
					   <td width="3%">&nbsp;</td>
                         <td align="left" >Transport</td>
                         <td align="left">:</td>
                         <td align="left">
                         <?php
						 $allote_sql="SELECT * FROM es_trans_board_allocation_to_student WHERE student_staff_id=".$sid." AND `type`='staff' AND `status`='Active'";
						 $allote_exe=mysql_query($allote_sql);
						 $allote_num=mysql_num_rows($allote_exe);
						 if($allote_num==1){
							 $allote_row=mysql_fetch_array($allote_exe);
						 }
						 ?>
                         
                         
                         <input type="checkbox" name="transport" value="YES" <?php if($transport=="YES" || $allote_num==1){?> checked="checked"<?php }?> /></td>
                         <td colspan="4" align="left">&nbsp;</td>
                    </tr>
					
                    <tr>
					   <td width="3%">&nbsp;</td>
                         <td align="left" >Route / Board</td>
                         <td align="left">:</td>
                         <td align="left">
                           <select name="boardid">
                           <option value="">Select Route/Board</option>
                           <?php
                           $route_sql="SELECT * FROM es_trans_route R WHERE R.status!='Delete'";
                           $route_exe=mysql_query($route_sql);
                           while($route_row=mysql_fetch_array($route_exe)){?>
                           <optgroup label="<?php echo $route_row['route_title']." -(".substr($route_row['route_Via'],0,25).")"; ?>">
                           <?php
                           $board_sql="SELECT * FROM es_trans_board B WHERE B.status!='Delete' AND B.route_id=".$route_row['id'];
                           $board_exe=mysql_query($board_sql);
                           while($board_row=mysql_fetch_array($board_exe)){
							   $query_sql="SELECT * FROM es_trans_board_allocation_to_student WHERE status='Active' AND board_id=".$board_row['id'];
							   $query_exe=mysql_query($query_sql);
							   $query_num=mysql_num_rows($query_exe);
							   
							   if($query_num<$board_row['capacity'] || $allote_row['board_id']==$board_row['id']){
                               
                               ?>													   
                           <option value="<?php echo $board_row['id']; ?>" <?php if($boardid==$board_row['id'] || $allote_row['board_id']==$board_row['id']){?> selected="selected"<?php }?>><?php echo $board_row['board_title']; ?></option>
                           <?php }}?>
                           </optgroup>
                           <?php }?>
                           </select></td>
                         <td colspan="4" align="left">&nbsp;</td>
                    </tr>
					  		
			       
					  <?php } ?>
                      <tr>
                        <td valign="top">&nbsp;</td>
                        <td colspan="6" align="center" valign="top" class="narmal">
						<?php if($action=='addtostaff')
                        {?>
						<input name="staffading" type="submit" class="bgcolor_02" value="Add To Staff" style="cursor:pointer"/>
						<?php } ?>
						<?php if($action=='editstaff')
                        {?>
						<?php if( $eachrecord1->tcstatus!='issued'){?>
						<input name="updateading" type="submit" class="bgcolor_02" value="Update" style="cursor:pointer"/>
						<?php } else {?>
							
						<?php }}?>
                            <?php /*?><input name="back" type="button" class="bgcolor_02" value="Back"  onClick="history.go(-1)" style="cursor:pointer"/><?php */?></td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
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
			
<?php
	
/**
* ******************** Staff Report **************************************
*/
	
	if($action=='staffviewing' || $action=='deletestaff' )
{
	?>
	
	<script type="text/javascript">

			function fun(){
				if(document.form1.staff_department.value=="select" ){
					alert("Select Department");
					//document.staff.dc1.focus();
					return false;
				}
				else
				{
				return true;
				}
			}
		</script>
	
	<div id="box">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="2" class="bgcolor_02">&nbsp;Staff report </td>
              </tr>
			  
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td  align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
				
				<tr>
				  <td colspan="8" align="center" >&nbsp;</td>
				  </tr>
                  
				  <form action="?pid=15&action=staffviewing" method="post" name="form1">
                <tr>
                     <td width="16%" align="left" valign="top">&nbsp;&nbsp;<span class="narmal">Department : </span></td>
                  <td width="19%" align="left" valign="baseline">
			  <select name="staff_department" style="width:150px;">
						<option value="select">-Select-</option>
							<?php foreach($getdeptlist as $eachrecord) { ?>
							<option value="<?php echo $eachrecord["es_departmentsid"];?>" <?php echo ($eachrecord["es_departmentsid"]==$staff_department)?"selected":""?>  ><?php echo $eachrecord[es_deptname];?></option>
						<?php } ?>
				  </select> </td>
                  <td width="9%" align="left" valign="top"><font color="#FF0000">*</font>&nbsp;&nbsp;&nbsp;                  </td>
				  			  
                  <td width="16%" align="left" valign="top">Staff Type : </td>
                  <td width="21%" align="left" class="narmal"><select name="staff_type" style="width:150px;">
                    <option  value="added" <?php if(isset($staff_type) && $staff_type=='added'){echo "selected";}  ?>>Current Staff</option>
                    <option  value="dismisied" <?php if(isset($staff_type) && $staff_type=='dismisied'){echo "selected";}  ?>>Ex Staff</option>
                  </select></td>			  
				  
                  <td width="19%" align="center" class="narmal"><input name="staffsearch" type="submit" class="bgcolor_02" value="Search" style="cursor:pointer" onclick="return fun();"/></td>
                </tr>
				  </form>
				  <tr>
				  <td colspan="8" align="center" >&nbsp;</td>
				  </tr>
				  <tr>
				  <td colspan="8" align="center" class="narmal"><?php if($nill!="") echo $nill ; ?></td>
				  </tr>
				  
				  <?php if($nill ==""){?>
                  <tr>
                    <td colspan="8" align="left" valign="top"><table width="100%" border="1" cellspacing="0" cellpadding="1" class="tbl_grid" align="center">
					
                      <tr class="bgcolor_02">
                        <td width="7%" height="20" align="center" valign="middle" class="admin">S.No</td>
						<td width="31%" height="20" align="left" valign="middle" class="admin">Employee</td>
                         <td width="14%" align="left" valign="middle" class="admin">Designation<br/>
                        [Dept]</td>
                        <td width="13%" align="left" valign="middle" class="admin">Academic/<br/>
                        Prof.&nbsp;Qualif.</td>
                         <td width="9%" align="center" valign="middle" class="admin">DOB</td>
                       
                        <td width="9%" align="center" valign="middle" class="admin">DOJ</td>
                          <td width="8%" align="center" valign="middle" class="admin">Salary</td>
                        <td width="9%" align="center" valign="middle" class="admin">&nbsp;&nbsp;<strong>Action</strong></td>
                      </tr>
					  <?php
					  if($no_rows>0){
                      $rownum = $start+1;	
					  				  
						foreach ($es_staffview as $eachrecord2){
										
						$zibracolor = ($rownum%2==0)?"even":"odd";
                       ?>	  
                      <tr class="<?php echo $zibracolor;?>">
                        <td align="center" class="narmal"><?php echo $rownum ; ?></td>
						<td align="left" valign="middle" class="narmal"><b>Emp ID</b> - <?php echo $eachrecord2->es_staffId;  ?><br/>
					   <b><?php echo ucwords($eachrecord2->st_firstname ." ".$eachrecord2->st_lastname); ?></b><br/><b>Username</b> - <?php echo $eachrecord2->st_username; ?><br/><b>Password</b> - <?php echo $eachrecord2->st_password; ?></td>
                       
                                        		
                        <td align="left" valign="middle" class="narmal"><?php echo postname($eachrecord2->st_post); ?><br/>
                        [<?php echo deptname($eachrecord2->st_department); ?>]</td>
                        <td align="left" valign="middle" class="narmal"><?php if($eachrecord2->st_examp1!=""){echo strtoupper($eachrecord2->st_examp1); }
						 if($eachrecord2->st_examp2!=""){echo ", ".strtoupper($eachrecord2->st_examp2); }
						  if($eachrecord2->st_examp3!=""){echo ", ".strtoupper($eachrecord2->st_examp3); }
						  ?></td>
                          <td align="center" valign="middle" class="narmal"><?php echo func_date_conversion("Y-m-d","d/m/Y",$eachrecord2->st_dob); ?></td>
                        <td align="center" valign="middle" class="narmal"><?php echo displaydate($eachrecord2->st_dateofjoining); ?></td>
                        <td align="center" valign="middle" class="narmal">Rs&nbsp;<?php echo $eachrecord2->st_basic; ?></td>
                        <td align="center" valign="middle" class="narmal">
						<?php if(in_array('10_8',$admin_permissions)){
						
						
						if( $eachrecord2->tcstatus!='issued'){?>
						
						
						
						<a href=" ?pid=15&action=editstaff&sid=<?php echo $eachrecord2->es_staffId;?>&st_departments=<?php echo $eachrecord2->st_department;?>&st_posts=<?php echo $eachrecord2->st_post;  ?>&start=<?php echo $start;?>"><img src="images/b_edit.png" width="16" height="16" hspace="2"  border="0"/></a><?php }		else {	?><a href=" ?pid=15&action=editstaff&sid=<?php echo $eachrecord2->es_staffId;?>&st_departments=<?php echo $eachrecord2->st_department;?>&st_posts=<?php echo $eachrecord2->st_post;  ?>&start=<?php echo $start;?>"><img src="images/b_browse.png" title="View" alt="View " width="16" height="16" hspace="2"  border="0" /></a>	
						<?php } }?>
						
						<?php /*?><a href=" ?pid=15&action=deletestaff&sid=<?php echo $eachrecord2->es_staffId;?>"onclick="return confirm('<?php echo SM_CONFIRM_DELETE_MESSAGE;?>');"><img src="images/b_drop.png" width="16" height="16" hspace="2" border="0"/></a><?php */?></td>
                      </tr> 
					  <?php $rownum++;} } ?>                    
                    </table></td>
                  </tr>
				  <?php } ?>
				  
                          <tr>
							<td colspan="8" align="center"><?php paginateexte($start, $q_limit, $no_rows, "action=staffviewing&action1=selsearch&column_name=".$orderby) ?></td>
					     </tr>
						 <tr>
							<td colspan="8" align="center"></td>
					     </tr>
						 <?php if($no_rows>0){?>
						 <?php if (in_array("10_11", $admin_permissions)) {?>
						 <tr>
							<td colspan="8" align="center"><input name="Submit" type="button" onclick="newWindowOpen ('?pid=15&action=print_staff<?php  echo $adminlisturl;?>&start=<?php echo $start;?><?php  echo $adminlisturl;?>');" class="bgcolor_02" value="Print" style="cursor:pointer;"/></td>
					     </tr>
						 <?php } }?>
                </table></td>
                <td width="1" class="bgcolor_02"></td>
              </tr>              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
            </tr>
   </table>
</div>
<script type="text/javascript" src="includes/js/prototype1.js"></script>
<script language="JavaScript">
	function showlargeimage(imgshow)
	{
	//alert(imgshow);
	document.getElementById('image').src=imgshow;
	//window.open('diaplay.php');
	}
	function displayimage()
	{
	
	document.getElementById('image').innerHTML="";

	document.getElementById('image').style.display='';
	}
	function popup1(theEp)
	 {
	
		var url="includes/images.php";
		var pars="id="+theEp;


	var myAjax = new Ajax.Request(
		url,
		{
			method: 'get',
			parameters: pars,
			onComplete:images
		});
	}
	function images(originalRequest)
	{

	result = originalRequest.responseText;

	document.getElementById('image').innerHTML=result;

	document.getElementById('image').style.display='block'
	}
</script>

<script type="text/javascript" src="includes/js/prototype1.js"></script>
<script type="text/javascript" src="includes/js/city.js"></script>
<script type="text/javascript" src="includes/js/lightbox.js"></script>
<style type="text/css">
			#lightbox{
		background-color:#eee;
		padding: 10px;
		border-bottom: 2px solid #666;
		border-right: 2px solid #666;
		}
	#lightboxDetails{
		font-size: 0.8em;
		padding-top: 0.4em;
		}	
	#lightboxCaption{ float: left; }
	#keyboardMsg{ float: right; }

	#lightbox img{ border: none; } 
	#overlay img{ border: none; }
	#overlay{ background-image: url(overlay.png); }
	//* html #overlay{
	//	background-color: #000;
	//	back\ground-color: transparent;
	//	background-image: url(blank.gif);
	//	filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src="overlay.png", sizingMethod="scale");
	//	}*//
</style>
<?php
}
?>	
<script type="text/javascript">
function newWindowOpen(href)
{
    window.open(href,null, 'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');
}
</script>

<?php if($action=='print_staff'){
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	 VALUES('".$_SESSION['eschools']['admin_id']."','es_staff','Staff','View Staff','','Print','".$_SERVER['REMOTE_ADDR']."',NOW())";
     $log_insert_exe=mysql_query($log_insert_sql);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="2" class="bgcolor_02">&nbsp;<?php if($staff_type=='dismisied'){ echo "Ex Staff List"; } else { echo "Staff List";}?> </td>
              </tr>
			  
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td  align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
				
				<tr>
				  <td colspan="8" align="center" >&nbsp;</td>
				  </tr>
                  
				 
				  <tr>
				  <td colspan="8" align="center" >&nbsp;</td>
				  </tr>
				  <tr>
				  <td colspan="8" align="center" class="narmal"><?php if($nill!="") echo $nill ; ?></td>
				  </tr>
				  
				  <?php if($nill ==""){?>
                  <tr>
                    <td colspan="8" align="left" valign="top">
					<table width="100%" border="1" cellspacing="0" cellpadding="1" class="tbl_grid" align="center">
					
                      <tr class="bgcolor_02">
                        <td width="8%" height="20" align="center" valign="middle" class="admin">S.No</td>
						<td width="34%" height="20" align="left" valign="middle" class="admin">Employee					   </td>
                           <td width="14%" align="left" valign="middle" class="admin">Designation<br/>
                        [Dept]</td>
                            <td width="12%" align="left" valign="middle" class="admin">Academic/<br/>Prof.&nbsp;Qualif.</td>
                         <td width="10%" align="center" valign="middle" class="admin">DOB</td>
                       
                        <td width="10%" align="center" valign="middle" class="admin">DOJ</td>
                          <td width="12%" align="center" valign="middle" class="admin">Salary</td>
                       
                      </tr>
					  <?php
					  if($no_rows>0){
                      $rownum = $start+1;	
					  				  
						foreach ($es_staffview as $eachrecord2){
										
						$zibracolor = ($rownum%2==0)?"even":"odd";
                       ?>	  
                      <tr class="<?php echo $zibracolor;?>">
                        <td align="center" valign="middle" class="narmal"><?php echo $rownum ; ?></td>
						<td align="left" valign="middle" class="narmal"><b>Emp ID</b> - <?php echo $eachrecord2->es_staffId;  ?><br/> 
					    <b><?php echo ucwords($eachrecord2->st_firstname ." ".$eachrecord2->st_lastname); ?></b><br/><b>Username</b> - <?php echo $eachrecord2->st_username; ?><br/><b>Password</b> - <?php echo $eachrecord2->st_password; ?> </td>
                       <td align="left" valign="middle" class="narmal"><?php echo postname($eachrecord2->st_post); ?><br/>
                        [<?php echo deptname($eachrecord2->st_department); ?>]</td>
                               <td align="left" valign="middle" class="narmal"><?php if($eachrecord2->st_examp1!=""){echo strtoupper($eachrecord2->st_examp1); }
						 if($eachrecord2->st_examp2!=""){echo ", ".strtoupper($eachrecord2->st_examp2); }
						  if($eachrecord2->st_examp3!=""){echo ", ".strtoupper($eachrecord2->st_examp3); }
						  ?></td>
                          <td align="center" valign="middle" class="narmal"><?php echo func_date_conversion("Y-m-d","d/m/Y",$eachrecord2->st_dob); ?></td>
                        <td align="center" valign="middle" class="narmal"><?php echo displaydate($eachrecord2->st_dateofjoining); ?></td>
                        <td align="center" valign="middle" class="narmal">Rs&nbsp;<?php echo $eachrecord2->st_basic; ?></td>
                        
                      </tr> 
					  <?php $rownum++;} } ?>                    
                    </table></td>
                  </tr>
				  <?php } ?>
				  
                         
                </table></td>
                <td width="1" class="bgcolor_02"></td>
              </tr>              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
            </tr>
   </table>
<?php }?>	
