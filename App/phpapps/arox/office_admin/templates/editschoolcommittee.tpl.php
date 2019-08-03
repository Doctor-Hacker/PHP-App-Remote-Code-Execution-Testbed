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

$query="SELECT * FROM es_schoolcommittee";
		$result=mysql_query($query) or die("Data Extraction Not Possible");
		$numrows=mysql_num_rows($result);
		$i=0;
		while($i < $numrows)
		
		{
		$ex_id=mysql_result($result,$i,'ex_id');
		$ex_chariman=mysql_result($result,$i,'ex_chariman');
		$ex_member=mysql_result($result,$i,'ex_member');
		$ex_teachermem=mysql_result($result,$i,'ex_teachermem');
		$ex_nonteachingmem=mysql_result($result,$i,'ex_nonteachingmem');
		
		$ex_officioses=mysql_result($result,$i,'ex_officioses');
		
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
                 Names of School Committee Members and Phone Nos. :</span></td>
  </tr>	
  
 	  
              <tr>
                <td  align="center" valign="top">
				
				  <form name="reg" action="" method="post" enctype="multipart/form-data">
                 
				   <table width="100%" border="0" cellspacing="0" cellpadding="0">
		      <tr>
		        <td align="left">&nbsp;</td>
                  <td align="left" height="30" width="343" class="narmal">Chairman:</td>
                  <td width="3" align="left" class="narmal">:</td>
                  <td width="568" align="left" class="narmal"><label>
                    <input type="text" name="ex_chariman" value="<?php echo $ex_chariman;?>">
                  </label></td>
                  <td width="48" align="right" class="narmal"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">&nbsp;</font></td>
                </tr>
		      <tr>
		        <td align="left" width="7">&nbsp;</td>
                  <td colspan="5" align="left" class="narmal"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <!--DWLayoutTable-->
                    <tr>
                      <td width="339" align="left" height="30">Managing Committee Member: : </td>
                        <td width="9" align="left">:</td>
                        <td width="572" align="left" ><label>
                          <input type="text" name="ex_member" value="<?php echo $ex_member;?>">
                        </label></td>
                        <td width="43">&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="30" align="left">Teacher Member: </td>
                        <td align="left">:</td>
                        <td align="left"><label>
                          <input type="text" name="ex_teachermem" value="<?php echo $ex_teachermem;?>"/>
                        </label></td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="38" align="left">Non-Teaching Staff Member </td>
                        <td align="left">:</td>
                        <td align="left"><label>
                          <input type="text" name="ex_nonteachingmem" value="<?php echo $ex_nonteachingmem;?>" />
                        </label></td>
                        <td>&nbsp;</td>
                    </tr>
					  
					 
                    <tr>
                      <td height="41" align="left">Ex-officio Secretary (H.M) </td>
                        <td align="left">:</td>
                        <td align="left"><table width="83%" border="0" cellspacing="0" cellpadding="0">
                          <tr>                          </tr>
                          </table>
                          <label>
                          <input type="text" name="ex_officioses" value="<?php echo $ex_officioses;?>" />
                        </label></td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr><td height="30" colspan="3" align="center" valign="middle">
					
					
						
					  <input type="submit" name="update"  class="bgcolor_02" value="update" style="padding-left:10px;padding-right:10px;cursor:pointer;"/>
								</td>
                  <td>&nbsp;</td>
                    </table></td>
                </tr>
		      <tr>
		        <td align="left" height="10" colspan="6"></td>
                </tr>
		      <tr>
		        <td align="left" height="10" colspan="6"></td>
                </tr>
		      <tr>
		        <td align="left" height="10" colspan="6"></td>
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