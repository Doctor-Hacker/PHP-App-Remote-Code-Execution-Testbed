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


<?php  if($action=='edit'){

  
$query="SELECT * FROM es_planningyear";
		$result=mysql_query($query) or die("Data Extraction Not Possible");
		$numrows=mysql_num_rows($result);
		$i=0;
		while($i < $numrows)
		
		{
		$es_pid=mysql_result($result,$i,'es_pid');
		$es_junesun=mysql_result($result,$i,'es_junesun');
		$es_junetd=mysql_result($result,$i,'es_junetd');
		$es_julywd=mysql_result($result,$i,'es_julywd');
		$es_julysun=mysql_result($result,$i,'es_julysun');
		$es_julytd=mysql_result($result,$i,'es_julytd');
		$es_augwd=mysql_result($result,$i,'es_augwd');
		$es_augsun=mysql_result($result,$i,'es_augsun');
		$es_augtd=mysql_result($result,$i,'es_augtd');
		
		$es_septwd=mysql_result($result,$i,'es_septwd');
		$es_septsun=mysql_result($result,$i,'es_septsun');
		$es_septtd=mysql_result($result,$i,'es_septtd');
		$es_octwd=mysql_result($result,$i,'es_octwd');
		$es_octsun=mysql_result($result,$i,'es_octsun');
		$es_octtd=mysql_result($result,$i,'es_octtd');
		$es_otherwd1=mysql_result($result,$i,'es_otherwd1');
		$es_othersun1=mysql_result($result,$i,'es_othersun1');
		$es_othertd1=mysql_result($result,$i,'es_othertd1');
		
		$es_novwd=mysql_result($result,$i,'es_novwd');
		$es_novsun=mysql_result($result,$i,'es_novsun');
		$es_novtd=mysql_result($result,$i,'es_novtd');
		$es_decwd=mysql_result($result,$i,'es_decwd');
		$es_decsun=mysql_result($result,$i,'es_decsun');
		$es_dectd=mysql_result($result,$i,'es_dectd');
		$es_janwd=mysql_result($result,$i,'es_janwd');
		$es_jansun=mysql_result($result,$i,'es_jansun');
		$es_jantd=mysql_result($result,$i,'es_jantd');
		
		$es_febwd=mysql_result($result,$i,'es_febwd');
		$es_febsun=mysql_result($result,$i,'es_febsun');
		$es_febtd=mysql_result($result,$i,'es_febtd');
		$es_marchwd=mysql_result($result,$i,'es_marchwd');
		$es_marchsun=mysql_result($result,$i,'es_marchsun');
		$es_marchtd=mysql_result($result,$i,'es_marchtd');
		$es_aprilwd=mysql_result($result,$i,'es_aprilwd');
		$es_aprilsun=mysql_result($result,$i,'es_aprilsun');
		$es_apriltd=mysql_result($result,$i,'es_apriltd');
		
		$es_maywd=mysql_result($result,$i,'es_maywd');
		$es_maysun=mysql_result($result,$i,'es_maysun');
		$es_maytd=mysql_result($result,$i,'es_maytd');
		$es_otherwd2=mysql_result($result,$i,'es_otherwd2');
		$es_othersun2=mysql_result($result,$i,'es_othersun2');
		$es_othertd2=mysql_result($result,$i,'es_othertd2');
		
$i++;
		}
		mysql_free_result($result);

?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <!--DWLayoutTable-->
   
   
  
     <tr>
         <td width="956" height="3"></td>
	     <td width="2"></td>
     </tr>
              <tr>
                <td colspan="4" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">
                 Academic Council :</span></td>
  </tr>	
  
 	  
              <tr>
                <td  align="center" valign="top">
				
				  <form name="reg" action="" method="post" enctype="multipart/form-data">
                 
				   <table width="98%" border="0" cellspacing="0" cellpadding="0">
			      <!--DWLayoutTable-->
                                  <tr>
                                   
                                    <td width="241" align="left" height="30"><div align="center"><strong>Month</strong></div></td>
                                    <td width="196" align="left"><div align="center"><strong>Working Days </strong></div></td>
                                    <td width="213" align="left"><div align="center"><strong>Sundays</strong></div></td>
                                    <td width="234" align="left"><div align="center"><strong>Total Days </strong></div></td>
                                    <td width="15" align="left" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
									 <td width="15" align="left" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
								    <td width="21" align="left"><div align="center"></div></td>
                                  </tr>
                                   <tr>
                                    <td height="30" align="left"><div align="center">June</div></td>
                                    <td align="left"><input type="text" name="es_junewd" value="<?php echo $es_junewd;?>"></td>
                                    <td align="left"><input type="text" name="es_junesun" value="<?php echo $es_junesun;?>"></td>
                                    <td align="left"><input type="text" name="es_junetd" value="<?php echo $es_junetd;?>"></td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td height="38" align="left"><div align="center">July</div></td>
                                    <td align="left">
                                    <input type="text" name="es_julywd" value="<?php echo $es_julywd;?>"></td>
                                    <td align="left"><input type="text" name="es_julysun" value="<?php echo $es_julysun;?>"></td>
                                    <td align="left"><input type="text" name="es_julytd" value="<?php echo $es_julytd;?>"></td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
								    <tr>
								      <td height="30" align="left" valign="top"><div align="center">August </div></td>
                                    <td align="left" valign="top">
                                      <input type="text" name="es_augwd" value="<?php echo $es_augwd;?>"></td>
                                    <td align="left" valign="top"><input type="text" name="es_augsun" value="<?php echo $es_augsun;?>"></td>
                                    <td align="left" valign="top"><input type="text" name="es_augtd" value="<?php echo $es_augtd;?>"></td>
                                    <td align="left" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td align="left" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
							        <td>&nbsp;</td>
							      </tr>
                                  <tr>
                                    <td height="30" align="left"><div align="center">Sept.</div></td>
                                    <td align="left">
                                    <input type="text" name="es_septwd" value="<?php echo $es_septwd;?>"></td>
                                    <td align="left"><input type="text" name="es_septsun" value="<?php echo $es_septsun;?>"></td>
                                    <td align="left"><input type="text" name="es_septtd" value="<?php echo $es_septtd;?>"></td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
								   <tr>
                                    <td height="30" align="left"><div align="center">Oct.<b><span class="style2"></span></b></div></td>
                                    <td align="left">
                                     <input type="text" name="es_octwd" value="<?php echo $es_octwd;?>"></td>
                                    <td align="left"><input type="text" name="es_octsun" value="<?php echo $es_octsun;?>"></td>
                                    <td align="left"><input type="text" name="es_octtd" value="<?php echo $es_octtd;?>"></td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
							        <td>&nbsp;</td>
							      </tr>
								  
								 
								  <tr>
                                    
                                    <td height="30" align="left"><div align="center">Other Holidays </div></td>
                                    <td align="left">
                                    <input type="text" name="es_otherwd1" value="<?php echo $es_otherwd1;?>"></td>
                                    <td align="left"><input type="text" name="es_othersun1" value="<?php echo $es_othersun1;?>"></td>
                                    <td align="left"><input type="text" name="es_othertd1" value="<?php echo $es_othertd1;?>"></td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
								    <td>&nbsp;</td>
								  </tr>
								 
								 
								 								  
								  <tr>
                                    <td height="25" align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td align="left">
                                  <td align="left">								                                    
                                  <td>&nbsp;</td>
								  </tr>
                                
								
								   <tr>
                                   
                                    <td height="22" align="left" valign="top"><strong>Second Term:- </strong></td>
                                    <td align="left" valign="top"><div align="right"></div></td>
                                    <td align="left" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td align="left" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td align="left" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td align="left" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
							        <td>&nbsp;</td>
							      </tr>
								  
								  
                                  <tr>
                                    <td height="30" align="left"><div align="center">Nov</div></td>
                                    <td align="left">
                                    <input type="text" name="es_novwd" value="<?php echo $es_novwd;?>"></td>
                                    <td align="left"><input type="text" name="es_novsun" value="<?php echo $es_novsun;?>"></td>
                                    <td align="left"><input type="text" name="es_novtd" value="<?php echo $es_novtd;?>"></td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
									<tr>
                                    <td height="22" align="left"><div align="center">Dec</div></td>
                                    <td align="left">
                                      <input type="text" name="es_decwd" value="<?php echo $es_decwd;?>"></td>
                                    <td align="left"><input type="text" name="es_decsun" value="<?php echo $es_decsun;?>"></td>
                                    <td align="left"><input type="text" name="es_dectd" value="<?php echo $es_dectd;?>"></td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
								    <td>&nbsp;</td>
								  </tr>
                                  <tr>
                                    <td height="30" align="left"><div align="center">Jan:</div></td>
                                    <td align="left">
                                    <input type="text" name="es_janwd" value="<?php echo $es_janwd;?>"/></td>
                                    <td align="left"><input type="text" name="es_jansun" value="<?php echo $es_jansun;?>"/></td>
                                    <td align="left"><input type="text" name="es_jantd" value="<?php echo $es_jantd;?>"></td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td>&nbsp;</td>
                      </tr>
									<tr>
                                    <td height="22" align="left"><div align="center">Feb</div></td>
                                    <td align="left">
                                      <input type="text" name="es_febwd" value="<?php echo $es_febwd;?>"></td>
                                    <td align="left"><input type="text" name="es_febsun" value="<?php echo $es_febsun;?>"></td>
                                    <td align="left"><input type="text" name="es_febtd" value="<?php echo $es_febtd;?>"></td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
								    <td>&nbsp;</td>
								  </tr>
                                  
                                  <tr>
                                    <td height="30" align="left"><div align="center">March</div></td>
                                    <td align="left">
                                    <input type="text" name="es_marchwd" value="<?php echo $es_marchwd;?>"></td>
                                    <td align="left"><input type="text" name="es_marchsun" value="<?php echo $es_marchsun;?>"></td>
                                    <td align="left"><input type="text" name="es_marchtd" value="<?php echo $es_marchtd;?>"></td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
								  
								  <tr>
                                    <td height="27" align="left"><div align="center">April</div></td>
                                    <td align="left">
                                    <input type="text" name="es_aprilwd" value="<?php echo $es_aprilwd;?>"></td>
                                    <td align="left"><input type="text" name="es_aprilsun" value="<?php echo $es_aprilsun;?>"></td>
                                    <td align="left"><input type="text" name="es_apriltd" value="<?php echo $es_apriltd;?>"></td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
								    <td>&nbsp;</td>
								  </tr>
								  
								  
									<tr>
                                    <td height="20" align="left"><div align="center">May</div></td>
                                    <td align="left">
                                      <input type="text" name="es_maywd" value="<?php echo $es_maywd;?>"></td>
                                    <td align="left"><input type="text" name="es_maysun" value="<?php echo $es_maysun;?>"></td>
                                    <td align="left"><input type="text" name="es_maytd" value="<?php echo $es_maytd;?>"></td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
								    <td>&nbsp;</td>
								  </tr>
                                  
                                   <tr>
                                    <td height="38" align="left"><div align="center">Other Holidays </div></td>
                                    <td align="left">
                                     <input type="text" name="es_otherwd2" value="<?php echo $es_otherwd2;?>"></td>
                                    <td align="left"><input type="text" name="es_othersun2" value="<?php echo $es_othersun2;?>"></td>
                                    <td align="left"><input type="text" name="es_othertd2" value="<?php echo $es_othertd2;?>"></td>
                                    <?php 
                                   // echo $query="SELECT * FROM es_feemaster WHERE fee_particular='tuition' AND fee_class='".$pre_class."' ";
									
                                    ?>
                                    
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td align="left"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                    <td>&nbsp;</td>
                                   </tr>
									<tr>
                                    <td height="24" colspan="6" align="center" valign="top"><br />
 <input type="submit" name="update"  class="bgcolor_02" value="update" style="padding-left:10px;padding-right:10px;cursor:pointer;"/></td>
                                  <td>&nbsp;</td>
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
			    </form></td>
                <td>&nbsp;</td>
              </tr>
</table>


  

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