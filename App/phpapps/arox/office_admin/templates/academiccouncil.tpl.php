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
                  Academic Council :</span></td>
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
                  <td align="left" height="30" width="343" class="narmal">Chairman (H.M.) </td>
                  <td width="3" align="left" class="narmal">:</td>
                  <td width="568" align="left" class="narmal"><label>
                    <input type="text" name="es_achairman">
                  </label></td>
                  <td width="48" align="right" class="narmal"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">&nbsp;</font></td>
                </tr>
		      <tr>
		        <td align="left" width="7">&nbsp;</td>
                  <td colspan="5" align="left" class="narmal"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <!--DWLayoutTable-->
                    <tr>
                      <td width="340" align="left" height="30">No.Of Teachers' repsentatives: <br />
(3 to 5)</td>
                        <td width="10" align="left">:</td>
                        <td width="573" align="left" ><label>
                          <input type="text" name="es_atrep1">
						 <!-- &nbsp;<input type="text" name="es_atrep2">&nbsp;<input type="text" name="es_atrep3">&nbsp;<input type="text" name="es_atrep4">&nbsp;<input type="text" name="es_atrep5">&nbsp;<input type="text" name="es_atrep6">-->
                        </label></td>
                        <td width="43"></td>
                      </tr>
					   <tr>
                      <td width="340" align="left" height="30">No.Of Teachers' repsentatives: <br />
(3 to 5)</td>
                        <td width="10" align="left">:</td>
                        <td width="573" align="left" ><label>
                          <input type="text" name="es_atrep2">
						
                        </label></td>
                        <td width="43"></td>
                      </tr>
					  <tr>
                      <td width="340" align="left" height="30">No.Of Teachers' repsentatives: <br />
(3 to 5)</td>
                        <td width="10" align="left">:</td>
                        <td width="573" align="left" ><label>
                          <input type="text" name="es_atrep3">
						
                        </label></td>
                        <td width="43"></td>
                      </tr>
					  <tr>
                      <td width="340" align="left" height="30">No.Of Teachers' repsentatives: <br />
(3 to 5)</td>
                        <td width="10" align="left">:</td>
                        <td width="573" align="left" ><label>
                          <input type="text" name="es_atrep4">
						
                        </label></td>
                        <td width="43"></td>
                      </tr>
					  
					  <tr>
                      <td width="340" align="left" height="30">No.Of Teachers' repsentatives: <br />
(3 to 5)</td>
                        <td width="10" align="left">:</td>
                        <td width="573" align="left" ><label>
                          <input type="text" name="es_atrep5">
						
                        </label></td>
                        <td width="43"></td>
                      </tr>
					  <tr>
                      <td width="340" align="left" height="30">No.Of Teachers' repsentatives: <br />
(3 to 5)</td>
                        <td width="10" align="left">:</td>
                        <td width="573" align="left" ><label>
                          <input type="text" name="es_atrep6">
						
                        </label></td>
                        <td width="43"></td>
                      </tr>
					  
                    <tr>
                      <td height="30" align="left">President Of Parents' Association </td>
                        <td align="left">:</td>
                        <td align="left"><label>
                          <input type="text" name="es_apopassociation" />
                        </label></td>
                        <td>&nbsp;</td>
                      </tr>
                   
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
						<td colspan="7" align="right" height="25" style="padding-right:20px;"><a href="?pid=126&action=add" class="bgcolor_02" style="padding:5px; text-decoration:none; color:#333333">Add New</a></td>
					  </tr>
					  <tr><td>&nbsp;</td></tr>
					  <tr class="bgcolor_02 admin" height="25">
						<td align="center" valign="middle">S No</td>
                        <td align="center" valign="middle">Chairman</td>
                       
						<td align="left" valign="middle">No.Of Teacher's Rep</td>
						<td align="left" valign="middle">President Of Parents Ass</td>
						
						
						<td align="center" valign="middle">Action</td>
						
					  </tr>
				 <?php if(count($all_sem_det)>0){
					$irow=$start;
					foreach($all_sem_det as $eachrecord){
					$irow++;
					$staff_det=$db->getRow("SELECT * FROM es_academic WHERE es_aid='".$eachrecord['es_aid']."'");
					 ?>
					  
					  <tr>
						<td align="center" valign="middle">&nbsp;<?php echo $irow; ?></td>
                        
                        <td align="center" valign="middle">&nbsp;<?php echo $eachrecord['es_achairman']; ?></td>
                                         
                      
						<td align="left" valign="middle">&nbsp;<?php echo $eachrecord['es_atrep1'];?></td>
						<td align="left" valign="middle">&nbsp;<?php echo $eachrecord['es_apopassociation']; ?></td>
						
							<td align="center" valign="middle">
							
							<?php /*?><a href="javascript:void(0)" onClick="popup_letter('?pid=122&action=print_expcertificate&es_exid=<?php echo $eachrecord['es_exid']; ?>')" ><img src="images/print_16.png" border="0" title="View" alt="View" /></a><?php */?>
							
							
							<a href="?pid=127&action=edit&es_aid=<?php echo $eachrecord['es_aid']; ?>" ><img src="images/b_edit.png" border="0" title="Edit" alt="Edit" /></a>&nbsp;&nbsp;<a href="?pid=126&action=delete&es_aid=<?php echo $eachrecord['es_aid']; ?>" onClick="return confirm('Are you sure want to delete ?')"><img src="images/b_drop.png" border="0" title="Delete" alt="Delete" /></a></td>
						
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