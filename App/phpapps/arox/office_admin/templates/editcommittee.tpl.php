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

$query="SELECT * FROM es_execommittee";
		$result=mysql_query($query) or die("Data Extraction Not Possible");
		$numrows=mysql_num_rows($result);
		$i=0;
		while($i < $numrows)
		
		{
		$es_exid=mysql_result($result,$i,'es_exid');
		$es_chairman=mysql_result($result,$i,'es_chairman');
		$es_vchairman=mysql_result($result,$i,'es_vchairman');
		$es_secretary=mysql_result($result,$i,'es_secretary');
		$es_jointsecretary=mysql_result($result,$i,'es_jointsecretary');
		
		$es_teachrep=mysql_result($result,$i,'es_teachrep');
		$es_partrep=mysql_result($result,$i,'es_partrep');
		$es_reservedrep=mysql_result($result,$i,'es_reservedrep');
		$es_total=mysql_result($result,$i,'es_total');
		$es_eduinst=mysql_result($result,$i,'es_eduinst');
		$es_add1=mysql_result($result,$i,'es_add1');
		$es_nopresodent=mysql_result($result,$i,'es_nopresodent');
		$es_add2=mysql_result($result,$i,'es_add2');
		$es_phno2=mysql_result($result,$i,'es_phno2');
		$es_add1=mysql_result($result,$i,'es_add1');
		$es_nosecretary=mysql_result($result,$i,'es_nosecretary');
		$es_add3=mysql_result($result,$i,'es_add3');
		$es_phno3=mysql_result($result,$i,'es_phno3');
		
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
                 Parents-Teachers' Association Executive Committee :</span></td>
  </tr>	
  
 	  
              <tr>
                <td  align="center" valign="top">
				
				  <form name="reg" action="" method="post" enctype="multipart/form-data">
                 
				   <table width="96%" height="52%" border="0" cellpadding="3px" cellspacing="0">
				     <!--DWLayoutTable-->
					
                    
					 
					 
                     <tr>
                       <td width="1"></td>
                       <td colspan="3"><table width="95%">
<tr>
				<td width="36%" class="narmal"  align="left">Chairman </td>
				  <td width="1%" align="center" class="narmal"><strong> :</strong></td>
				  <td width="63%" height="33" align="left">
                  <input type="text" name="es_chairman" value="<?php echo $es_chairman;?>">
                  </td>
					</tr><tr>
					<td height="30" class="narmal"  align="left">Vice-Chairman</td>
					<td width="1%" align="center" class="narmal"><strong> :</strong></td>
					<td  align="left" >
                    <input type="text" name="es_vchairman" value="<?php echo $es_vchairman;?>">
					
               
                  
                 
                   </td>
					</tr>

   
   </table></td></tr>
					<tr>
					  <td></td>
					<td width="420" class="narmal"  align="left">Secretary</td>
					<td width="5" align="center"><strong> :</strong></td>
					<td width="473" height="30" align="left">

		
		
					 <input type="text" name="es_secretary" value="<?php echo $es_secretary;?>">                    </tr>
                    
                    <tr>
                      <td></td>
					<td valign="top" class="narmal"  align="left">Joint Secretary (2)</td>
					<td valign="top"  align="center"><strong> :</strong></td>
					<td height="30" valign="top" align="left">
					<input type="text" name="es_jointsecretary" value="<?php echo $es_jointsecretary;?>">
                    
                    </td>
					</tr>
                    
					<tr>
					  <td></td>
					<td height="25" colspan="3"  align="left" valign="top" class="narmal"><strong>Members</strong></td>
					</tr>
										<tr>
										  <td></td>
					<td valign="top" class="narmal"  align="left"><p>Teachers' Representatives <br />
					  (one teacher per class) <b><span class="style2">No.</span></b></p>					  </td>
					<td valign="top"  align="center"><strong> :</strong></td>
					<td height="30" valign="top" align="left">
						<input type="text" name="es_teachrep" value="<?php echo $es_teachrep;?>">					</td>
					</tr>
                    <tr>
                      <td></td>
					<td valign="top" class="narmal"  align="left">Parents' Pepresentatives<br /> 
					  (one parent per Division)<b><span class="style2">&nbsp;No.</span></b></td>
					<td valign="top"  align="center"><strong> :</strong></td>
					<td height="30" valign="top" align="left">
					 
				   <input type="text" name="es_partrep" value="<?php echo $es_partrep;?>">				  				</td>
					</tr><tr>
					<td></td>
					<td valign="top" class="narmal"  align="left">Reserved Parents' Representatives <b><span class="style2">No.</span></b></td>
					<td valign="top"  align="center"><strong> :</strong></td>
					<td height="30" valign="top" align="left">
			<input type="text" name="es_reservedrep" value="<?php echo $es_reservedrep;?>"></td>
					</tr>
                    <tr>
                      <td></td>
					<td valign="top" class="narmal"  align="left"><strong>Total No.</strong></td>
					<td valign="top"  align="center"><strong> :</strong></td>
					<td height="30" valign="top" align="left"><input type="text" name="es_total" value="<?php echo $es_total;?>"></td>
					</tr>
					 <tr>
					   <td></td>
					<td valign="top" class="narmal"  align="left">Name Of Educational Institution</td>
					<td valign="top"  align="center"><strong> :</strong></td>
					<td height="30" valign="top" align="left"><textarea name="es_eduinst"><?php echo $es_eduinst;?></textarea></td>
					</tr>
                    <tr>
                      <td></td>
					<td width="35%" valign="top" class="narmal"  align="left">Address</td>
					<td width="1%" valign="top"  align="center"><strong> :</strong></td>
					<td width="64%" height="30" valign="top" align="left"><textarea name="es_add1"><?php echo $es_add1;?></textarea></td>
					</tr>
					 <tr>
					   <td></td>
					<td width="35%" valign="top" class="narmal"  align="left">Name Of President</td>
					<td width="1%" valign="top"  align="center"><strong> :</strong></td>
					<td width="64%" height="30" valign="top" align="left"><input type="text" name="es_nopresodent" value="<?php echo $es_nopresodent;?>"></td>
					</tr>
					 <tr>
					   <td></td>
					<td width="35%" valign="top" class="narmal"  align="left">Address</td>
					<td width="1%" valign="top"  align="center"><strong> :</strong></td>
					<td width="64%" height="30" valign="top" align="left"><textarea name="es_add2"><?php echo $es_add2;?></textarea></td>
					</tr>
					 <tr>
					   <td></td>
					<td width="35%" valign="top" class="narmal"  align="left">Phone/ Mobile</td>
					<td width="1%" valign="top"  align="center"><strong> :</strong></td>
					<td width="64%" height="30" valign="top" align="left"><input type="text" name="es_phno2" value="<?php echo $es_phno2;?>"></td>
					</tr>
					 <tr>
					   <td></td>
					<td width="35%" valign="top" class="narmal"  align="left">Name Of The Secretary </td>
					<td width="1%" valign="top"  align="center"><strong> :</strong></td>
					<td width="64%" height="30" valign="top" align="left"><input type="text" name="es_nosecretary" value="<?php echo $es_nosecretary;?>"></td>
					</tr>
					 <tr>
					   <td></td>
					<td width="35%" valign="top" class="narmal"  align="left">Address </td>
					<td width="1%" valign="top"  align="center"><strong> :</strong></td>
					<td width="64%" height="30" valign="top" align="left"><textarea name="es_add3"><?php echo $es_add3;?></textarea></td>
					</tr>
					<tr>
					  <td></td>
					<td width="35%" valign="top" class="narmal"  align="left">Phone/ Mobile </td>
					<td width="1%" valign="top"  align="center"><strong> :</strong></td>
					<td width="64%" height="30" valign="top" align="left"><input type="text" name="es_phno3" value="<?php echo $es_phno3;?>"></td>
					</tr>
					<tr>
					  <td></td>
					<td valign="top" ></td>
					<td valign="top"  align="center"></td>
					<td height="30" valign="middle" align="left">
					
					
						
					<input type="submit" name="update"  class="bgcolor_02" value="update" style="padding-left:10px;padding-right:10px;cursor:pointer;"/>
								</td>
					</tr>
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