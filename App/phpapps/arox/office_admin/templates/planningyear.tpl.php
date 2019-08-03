<?php
/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
	}
//echo $sss = base64_decode("Y2hhbmdl");
?>


<script type="text/javascript">
function popup_letter(url) {
		 var width  = 700;
		 var height = 500;
		 var left   = (screen.width  - width)/2;
		 var top    = (screen.height - height)/2;
		 var params = 'width='+width+', height='+height;
		 params += ', top='+top+', left='+left;
		 params += ', directories=no';
		 params += ', location=no';
		 params += ', menubar=no';
		 params += ', resizable=no';
		 params += ', scrollbars=yes';
		 params += ', status=no';
		 params += ', toolbar=no';
		 newwin=window.open(url,'windowname5', params);
		 if (window.focus) {
			 newwin.focus()
		 }
	 return false;
}
</script> <script type="text/javascript">
/************ Checking Browsers ***********/
		function GetXmlHttpObject(handler)
		{
			var objXmlHttp=null
		
			if (navigator.userAgent.indexOf("Opera")>=0)
			{
				alert("This Site doesn't work in Opera")
				return
			}
			if (navigator.userAgent.indexOf("MSIE")>=0)
			{
				var strName="Msxml2.XMLHTTP"
				if (navigator.appVersion.indexOf("MSIE 5.5")>=0)
				{
					strName="Microsoft.XMLHTTP"
				}
				try
				{
					objXmlHttp=new ActiveXObject(strName)
					objXmlHttp.onreadystatechange=handler
					return objXmlHttp
				}
				catch(e)
				{
					alert("Error. Scripting for ActiveX might be disabled")
					return
				}
			}
			if (navigator.userAgent.indexOf("Mozilla")>=0)
			{
				objXmlHttp=new XMLHttpRequest()
				objXmlHttp.onload=handler
				objXmlHttp.onerror=handler
				return objXmlHttp
			}
		}

/** Completed checking Browser.. **/
/************ Get List of Districts ***********/
		function getsubjects(countryid,selval)
		{   
		    
			url="?pid=122&action=getposts&es_departmentsid="+countryid+"&selval="+selval;
			url=url+"&sid="+Math.random();
			
			xmlHttp1=GetXmlHttpObject(countryChanged);
			xmlHttp1.open("GET", url, true);
			xmlHttp1.send(null);
		}
		function countryChanged()
		{
			if (xmlHttp1.readyState==4 || xmlHttp1.readyState=="complete")
			{
				document.getElementById("subjectselectbox").innerHTML=xmlHttp1.responseText
			}
		}
		
		function getallsubjects(countryid,getselected)
		{   
			
			url="?pid=122&action=getstaff&cid="+countryid+"&selval="+getselected;
			url=url+"&sid="+Math.random();
			xmlHttp=GetXmlHttpObject(countryChanged2);
			xmlHttp.open("GET", url, true);
			xmlHttp.send(null);
		}
		function countryChanged2()
		{
			if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
			{
				document.getElementById("subject2selectbox").innerHTML=xmlHttp.responseText
			}
		}
	
	
	
</script>
<script type="text/javascript">
var gblvar7 = 1;
function AddRow7() //This function will add extra row to provide another file
{

var prevrow = document.getElementById("uplimg7");
var tmpvar = gblvar7;
var newrow = prevrow.insertRow(prevrow.rows.length);
newrow.id = newrow.uniqueID; // give row its own ID

var newcell; // an inserted row has no cells, so insert the cells
newcell = newrow.insertCell(0);
newcell.id = newcell.uniqueID;
newcell.innerHTML = "<table width='100%' border='0' cellspacing='0' cellpadding='0'><TR height='25'><td align='left' ><input name='newimage[]' type='file'><input type='hidden' name='filecount[]' value='1' ></TD></TR></table>";

gblvar7 = tmpvar + 1;
}

function DelRow7() //This function will delete the last row
{
if(gblvar7 == 1)
return;

var prevrowas = document.getElementById("uplimg7");
//alert(gblvar);
prevrowas.deleteRow(prevrowas.rows.length-1);
gblvar7 = gblvar7 - 1;
}
</script>


<?php  if($action=='add'){


?>
<form method="post" name="preadmission" action="" enctype="multipart/form-data" >
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <!--DWLayoutTable-->
   
   
  
     <tr>
         <td width="956" height="3"></td>
	     <td width="2"></td>
     </tr>
              <tr>
                <td colspan="4" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">
                  Planning Year :</span></td>
  </tr>	
  
 	  
              <tr>
                <td  align="center" valign="top">
				
<form name="reg" action="" method="post" enctype="multipart/form-data">
                 
				   <table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <!--DWLayoutTable-->
		  <?php //if($action=='schoolcommittee') { ?>
		  <tr> </tr>
		  <?php //} ?>
		  <tr>
		    <td align="right" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
		      <tr>
		        <td align="left">&nbsp;</td>
                  <td width="343" height="30" align="left" class="narmal"><strong>First Term:-  </strong></td>
                  <td width="3" align="left" class="narmal"></td>
                  <td width="568" align="left" class="narmal"><label>
                    
                  </label></td>
                  <td width="48" align="right" class="narmal"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">&nbsp;</font></td>
              </tr>
		      <tr>
		        <td align="left" width="7">&nbsp;</td>
                  <td colspan="5" align="left" class="narmal"><table width="98%" border="0" cellspacing="0" cellpadding="0">
			      <!--DWLayoutTable-->
                                  <tr>
                                   
                                    <td width="240" align="left" height="30"><div align="center"><strong>Month</strong></div></td>
                                    <td width="195" align="left"><div align="center"><strong>Working Days </strong></div></td>
                                    <td width="212" align="left"><div align="center"><strong>Sundays</strong></div></td>
                                    <td width="233" align="left"><div align="center"><strong>Total Days </strong></div></td>
                                    <td width="15" align="left" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
									 <td width="15" align="left" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
								    <td width="18" align="left"><div align="center"></div></td>
                                  </tr>
                                   <tr>
                                    <td height="30" align="left"><div align="center">June</div></td>
                                    <td align="left"><input type="text" name="es_junewd"></td>
                                    <td align="left"><input type="text" name="es_junesun"></td>
                                    <td align="left"><input type="text" name="es_junetd"></td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td height="38" align="left"><div align="center">July</div></td>
                                    <td align="left">
                                    <input type="text" name="es_julywd"></td>
                                    <td align="left"><input type="text" name="es_julysun"></td>
                                    <td align="left"><input type="text" name="es_julytd"></td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                  </tr>
								    <tr>
								      <td height="30" align="left" valign="top"><div align="center">August </div></td>
                                    <td align="left" valign="top">
                                      <input type="text" name="es_augwd"></td>
                                    <td align="left" valign="top"><input type="text" name="es_augsun"></td>
                                    <td align="left" valign="top"><input type="text" name="es_augtd"></td>
                                    <td align="left" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td align="left" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
							      </tr>
                                  <tr>
                                    <td height="30" align="left"><div align="center">Sept.</div></td>
                                    <td align="left">
                                    <input type="text" name="es_septwd"></td>
                                    <td align="left"><input type="text" name="es_septsun"></td>
                                    <td align="left"><input type="text" name="es_septtd"></td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                  </tr>
								   <tr>
                                    <td height="30" align="left"><div align="center">Oct.<b><span class="style2"></span></b></div></td>
                                    <td align="left">
                                     <input type="text" name="es_octwd"></td>
                                    <td align="left"><input type="text" name="es_octsun"></td>
                                    <td align="left"><input type="text" name="es_octtd"></td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
							      </tr>
								  
								 
								  <tr>
                                    
                                    <td height="30" align="left"><div align="center">Other Holidays </div></td>
                                    <td align="left">
                                    <input type="text" name="es_otherwd1"></td>
                                    <td align="left"><input type="text" name="es_othersun1"></td>
                                    <td align="left"><input type="text" name="es_othertd1"></td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
								  </tr>
								 
								 
								 								  
								  <tr>
                                    <td height="25" align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td align="left">
                                  <td align="left">								  </tr>
                                 <?php /*?> <tr>
                                   <font color="#FF0000"><b>*</b></font></td>
                                    <td align="left">Subjects</td>
                                    <td align="left">:</td>
                                    <td align="left">
									<?php if(isset($pre_class) && $pre_class>=1){ ?>
									<select name="scat_id" >
                                      <option value="">Select Subject</option>
                                   <?php 
									
									if(isset($pre_class) && $pre_class>=1){
									
									$sub_cat_arr = $db->getrows("SELECT * FROM subjects_cat WHERE classid='".$pre_class."'");
									}
									
									
									if(count($sub_cat_arr)>0){
									foreach($sub_cat_arr  as $each){
									?>
                                    <option value="<?php echo $each['scat_id'];?>" <?php 
									if($scat_id==$each['scat_id']){echo "selected='selected'";}?>><?php echo $each['scat_name']; ?></option>
                                    <?php
									}
									}
									
									
									?>
                                    </select><?php } elseif($es_enquiryList[0]->scat_id!='')  {?><?php ?><input type="text" name="scat_id" value="<?php 
									$online_sql="select * from subjects_cat where scat_id	=".$es_enquiryList[0]->scat_id;
 $online_row=$db->getRow($online_sql);
									
									
									if($online_row['scat_name']!='') { echo $online_row['scat_name'];} else { echo "---";}?>" readonly="readonly" style="width:110px;"/> <?php } ?> 	<font color="#FF0000"><b>*</b></font></td>
                                  </tr><?php */?>
								 
								 
								 
								 
								 <?php /*?> <tr>
                                   <?php /*?> <td height="30" align="left">Branch</td>
                                    <td align="left">:</td>
                                    <td align="left"><input name="es_branch" type="text" id="es_branch" size="15" value="<?php echo $es_branch;?>"  />
                                    <font color="#FF0000"><b>*</b></font></td>
                                  </tr>
								  <tr>									
									<td class="narmal" align="left" height="30">Level</td>
									<td>:</td>
									<td><select name="pre_contactname2" id="pre_contactname2" style="width:150px;"/>
									<option value="" >Select Level </option>
									<option value="PG"<?php if($pre_contactname2=="PG") {	echo "selected";} ?> >PG
									</option>
									<option value="UG"<?php if($pre_contactname2=="UG") {	echo "selected";} ?> >UG
									</option>
									
									</select>
									</td>
							   </tr> <?php */?>
								   <tr>
                                   
                                    <td height="22" align="left" valign="top"><strong>Second Term:- </strong></td>
                                    <td align="left" valign="top"><div align="right"></div></td>
                                    <td align="left" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td align="left" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td align="left" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td align="left" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
							      </tr>
								  
								  
                                  <tr>
                                    <td height="30" align="left"><div align="center">Nov</div></td>
                                    <td align="left">
                                    <input type="text" name="es_novwd"></td>
                                    <td align="left"><input type="text" name="es_novsun"></td>
                                    <td align="left"><input type="text" name="es_novtd"></td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                  </tr>
									<tr>
                                    <td height="22" align="left"><div align="center">Dec</div></td>
                                    <td align="left">
                                      <input type="text" name="es_decwd"></td>
                                    <td align="left"><input type="text" name="es_decsun"></td>
                                    <td align="left"><input type="text" name="es_dectd"></td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
								  </tr>
                                  <tr>
                                    <td height="30" align="left"><div align="center">Jan:</div></td>
                                    <td align="left">
                                    <input type="text" name="es_janwd"></td>
                                    <td align="left"><input type="text" name="es_jansun"></td>
                                    <td align="left"><input type="text" name="es_jantd"></td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                      </tr>
									<tr>
                                    <td height="22" align="left"><div align="center">Feb</div></td>
                                    <td align="left">
                                      <input type="text" name="es_febwd"></td>
                                    <td align="left"><input type="text" name="es_febsun"></td>
                                    <td align="left"><input type="text" name="es_febtd"></td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
								  </tr>
                                  
                                  <tr>
                                    <td height="30" align="left"><div align="center">March</div></td>
                                    <td align="left">
                                    <input type="text" name="es_marchwd"></td>
                                    <td align="left"><input type="text" name="es_marchsun"></td>
                                    <td align="left"><input type="text" name="es_marchtd"></td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                  </tr>
								  
								  <tr>
                                    <td height="27" align="left"><div align="center">April</div></td>
                                    <td align="left">
                                    <input type="text" name="es_aprilwd"></td>
                                    <td align="left"><input type="text" name="es_aprilsun"></td>
                                    <td align="left"><input type="text" name="es_apriltd"></td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
								  </tr>
								  
								  
									<tr>
                                    <td height="20" align="left"><div align="center">May</div></td>
                                    <td align="left">
                                      <input type="text" name="es_maywd"></td>
                                    <td align="left"><input type="text" name="es_maysun"></td>
                                    <td align="left"><input type="text" name="es_maytd"></td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
								  </tr>
                                  
                                   <tr>
                                    <td height="38" align="left"><div align="center">Other Holidays </div></td>
                                    <td align="left">
                                     <input type="text" name="es_otherwd2"></td>
                                    <td align="left"><input type="text" name="es_othersun2"></td>
                                    <td align="left"><input type="text" name="es_othertd2"></td>
                                    <?php 
                                   // echo $query="SELECT * FROM es_feemaster WHERE fee_particular='tuition' AND fee_class='".$pre_class."' ";
									
                                    ?>
                                    
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                   </tr>
									<?php /*?><tr>
                                    <td height="22" align="left">Old Balance</td>
                                    <td align="left">:</td>
                                    <td align="left"><input type="text" name="ann_income" value="<?php echo $ann_income;?>" /></td>
                                  </tr><?php */?>
								  
								    <tr>
                                 <?php /*?><td align="left" height="30">University Roll No.</td>
                                    <td align="left">:</td>
                              <td align="left"><input name="test2" id='test2' type="text" size="15" value="<?php echo $test2;?>" />
                                   </td>
                                  </tr>
								    <tr>
                                 <td align="left" height="30">Enrollment No.</td>
                                    <td align="left">:</td>
                                    <td align="left"><input name="pre_age" id='pre_age' type="text" size="15" value="<?php echo $pre_age;?>" />
                                   </td><?php */?>
                                  </tr>
								  
								  
								  
								 <?php /*?>  <tr>
                                    <td height="30" align="left">Name</td>
                                    <td align="left">:</td>
                                    <td align="left"><input name="pre_contactname2" type="text" size="15" value="<?php echo $pre_contactname2;?>"/></td>
                                   
                                  </tr><?php */?>
								  
								  
								  
								  
								  
								 
								 <!-- <tr>
								  <td align="left" height="30">Home</td>
                                    <td align="left">:</td>
                                    <td align="left"><input name="es_home" id='es_home' type="text" size="15" value="<?php //echo $es_home;?>" />
                                   </td>
                                  </tr>-->
								 <!-- <tr>-->
								  <?php /*?><td align="left" height="30">Hostel</td>
                                    <td align="left">:</td>
                                    <td align="left">
								
									<input type="checkbox" name="es_home" value="YES" <?php if($es_home=="YES"){?> checked="checked"<?php }?> />
									
								                                   </td>
                                  </tr>
								   <tr>
								  <td align="left" height="30">Building</td>
                                    <td align="left">:</td>
                                    <td align="left">
																	
								<select name="es_buldname" onChange="getsubjects(this.value,'');" ><option value="">-- Select --</option>
			<?php foreach($getbuldinglist as $eachrecord) { ?>
			<option value="<?php echo $eachrecord['es_hostelbuldid'];?>"<?php echo ($eachrecord['es_hostelbuldid'] ==$es_buldname)?"selected":""?>><?php echo $eachrecord['buld_name'];?></option>
			<?php } ?>
			</select>
                                   </td>
                                  </tr>
								   <tr>
								  <td align="left" height="30">Room</td>
                                    <td align="left">:</td>
                                     <td width="317" class="narmal" id="subjectselectbox"><select name="es_hostelroomid" id="s_submodule" style="width:150px;">
             <option value="">-- Select --</option>
			        
           </select></td><?php */?>
                                  <!--</tr>-->
								  <?php //if($es_buldname!=""){
					
					 ?>
<!--<script type="text/javascript">-->
<!--getsubjects('<?php //echo $es_buldname; ?>','<?php //echo $es_hostelroomid;?>');-->
<!--</script>-->
<?php //} ?>	
		   
                                </table>
                          <label>
                         
                        </label></td>
                        <td>&nbsp;</td>
              </tr>
                    
                  </table></td>
                </tr>
		      
	        </table>
          </tr>
		  <tr>
		    <td height="150" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
		      <tr>
		        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
		          <tr>
		            <td align="left" valign="top" class="narmal"><table width="100%" border="0" cellspacing="3" cellpadding="0">
		              <!--DWLayoutTable-->
		              <tr>
		                <td width="100%" height="24" align="center" valign="top"><input type="submit" name="submit_from" value="submit" class="bgcolor_02" style="padding-left:10px;padding-right:10px;cursor:pointer;" /></td>
                      </tr>
		              </table></td>
                  </tr>
		          </table></td>
              </tr>
	        </table></td>
          </tr>
	      </table>	
</form></td>
                <td>&nbsp;</td>
              </tr>
</table>

<?php } if($action=="list"){?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;Academic Council <span class="admin"> :</span></td>
  </tr>			  
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td  align="center" valign="top">
				<table width="100%" border="0">
				  <tr>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td>
					<table width="100%" border="0">
						<tr>
						<td colspan="7" align="right" height="25" style="padding-right:20px;"><a href="?pid=130&action=add" class="bgcolor_02" style="padding:5px; text-decoration:none; color:#333333">Add New</a></td>
					  </tr>
					  <tr><td>&nbsp;</td></tr>
					  <tr class="bgcolor_02 admin" height="25">
						<td align="center" valign="middle">S No</td>
                        <td align="center" valign="middle">Working Days</td>
                       
						<td align="left" valign="middle">Sunday</td>
						<td align="left" valign="middle">Total Days</td>
						
						
						<td align="center" valign="middle">Action</td>
						
					  </tr>
				 <?php if(count($all_sem_det)>0){
					$irow=$start;
					foreach($all_sem_det as $eachrecord){
					$irow++;
					$staff_det=$db->getRow("SELECT * FROM es_planningyear WHERE es_pid='".$eachrecord['es_pid']."'");
					 ?>
					  
					  <tr>
						<td align="center" valign="middle">&nbsp;<?php echo $irow; ?></td>
                        
                        <td align="center" valign="middle">&nbsp;<?php echo $eachrecord['es_otherwd1']; ?></td>
                                         
                      
						<td align="left" valign="middle">&nbsp;<?php echo $eachrecord['es_othersun1'];?></td>
						<td align="left" valign="middle">&nbsp;<?php echo $eachrecord['es_othertd1']; ?></td>
						
							<td align="center" valign="middle">
							
							<?php /*?><a href="javascript:void(0)" onClick="popup_letter('?pid=122&action=print_expcertificate&es_exid=<?php echo $eachrecord['es_exid']; ?>')" ><img src="images/print_16.png" border="0" title="View" alt="View" /></a><?php */?>
							
							
							<a href="?pid=131&action=edit&es_pid=<?php echo $eachrecord['es_pid']; ?>" ><img src="images/b_edit.png" border="0" title="Edit" alt="Edit" /></a>&nbsp;&nbsp;<a href="?pid=130&action=delete&es_pid=<?php echo $eachrecord['es_pid']; ?>" onClick="return confirm('Are you sure want to delete ?')"><img src="images/b_drop.png" border="0" title="Delete" alt="Delete" /></a></td>
						
					  </tr>
					    <?php }?>
					  <tr>
						<td colspan="7"  align="center"><?php paginateexte($start, $q_limit, $no_rec, "action=list");?></td>
					  </tr>
					  <?php }else{?>
					  <tr>
						<td colspan="7" class="admin" align="center">No Records Found</td>
					  </tr>
					  <?php }?>
					</table>

					</td>
				  </tr>
				</table>

						
				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
  </tr>
</table></form>
<?php //}?>


<script type="text/javaScript">
  function printing(){
	  document.getElementById("printbutton").style.display = "none";
	  window.print();
	  window.close();
	 }

  </script>
  
<script type="text/javascript">
	function getfieldvalues(){
		if (document.getElementById('sameaddress').checked){
	//alert("checked");
			document.preadmission.pre_address.value=document.preadmission.pre_address1.value;
			document.preadmission.pre_city.value=document.preadmission.pre_city1.value;
			document.preadmission.pre_pincode.value=document.preadmission.pre_pincode1.value;
			document.preadmission.pre_phno.value=document.preadmission.pre_phno1.value;			document.preadmission.pre_state.value=document.preadmission.pre_state1.value;
			

			document.preadmission.pre_mobile.value=document.preadmission.pre_mobile1.value;
			document.preadmission.pre_country.value=document.preadmission.pre_country1.value;
		}else{
			document.preadmission.pre_address.value="";
			document.preadmission.pre_city.value="";
			document.preadmission.pre_pincode.value="";
			document.preadmission.pre_phno.value="";			document.preadmission.pre_state.value="";
			

			document.preadmission.pre_mobile.value="";
			document.preadmission.pre_country.value="";
		}
  }
  function open_sub(val){
   popup_letter('?pid=94&action=display_sub&scat_id='+val);
  }
 
</script>
<script type="text/javascript">
function popup_letter(url) {
		 var width  = 500;
		 var height = 300;
		 var left   = (screen.width  - width)/2;
		 var top    = (screen.height - height)/2;
		 var params = 'width='+width+', height='+height;
		 params += ', top='+top+', left='+left;
		 params += ', directories=no';
		 params += ', location=no';
		 params += ', menubar=no';
		 params += ', resizable=no';
		 params += ', scrollbars=yes';
		 params += ', status=no';
		 params += ', toolbar=no';
		 newwin=window.open(url,'windowname5', params);
		 if (window.focus) {
			 newwin.focus()
		 }
	 return false;
}

</script>

<iframe width=199 height=178 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="<?php echo JS_PATH ?>/WeekPicker/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">										</iframe>
<?php }?>