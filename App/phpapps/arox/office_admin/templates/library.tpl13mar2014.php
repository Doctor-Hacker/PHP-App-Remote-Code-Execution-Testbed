<?php
/**
* Only Admin users can view the pages
*/
if (!isset($_SESSION['eschools']['admin_user']) || $_SESSION['eschools']['admin_user']=="" ) {
	header('location: ./?pid=1&unauth=0');
	exit;
}
//$_SESSION['eschools']['user_theme']

?>
<script type="text/javascript">
function mmLoadMenus() {
if (window.mm_menu_0716170010_0) return;
    window.mm_menu_0716170010_0 = new Menu("root",125,18,"Verdana, Arial, Helvetica, sans-serif",12,"#333333","#FFFFFF","#FFFFFF","#71D0D2","left","middle",3,0,1000,-5,7,true,true,true,0,true, true);
  mm_menu_0716170010_0.addMenuItem("Category","location='?pid=32&action=addcategoty'");
  mm_menu_0716170010_0.addMenuItem("Sub&nbsp;Category","location='?pid=32&action=addsubcategoty'");
/*  mm_menu_0716170010_0.addMenuItem("Add Staff ","location='?pid=32&action=addtosatffinlibrary'");
  mm_menu_0716170010_0.addMenuItem("Add Student","location='?pid=32&action=addtostudentinlibrary'");*/
  mm_menu_0716170010_0.addMenuItem("Library&nbsp;Fine","location='?pid=32&action=finedetailes'");
  mm_menu_0716170010_0.addMenuItem("Publisher/Supplier","location='?pid=32&action=addpublisher'");
  mm_menu_0716170010_0.addMenuItem("Books","location=' ?pid=32&action=addbook'");
  mm_menu_0716170010_0.hideOnMouseOut=true;
  mm_menu_0716170010_0.bgColor='#555555';
  mm_menu_0716170010_0.menuBorder=1;
  mm_menu_0716170010_0.menuLiteBgColor='#FFFFFF';
  mm_menu_0716170010_0.menuBorderBgColor='#71D0D2';
window.mm_menu_0805135813_0 = new Menu("root",199,18,"Verdana, Arial, Helvetica, sans-serif",12,"#333333","#FFFFFF","#FFFFFF","#71D0D2","left","middle",3,0,1000,-5,7,true,true,true,0,true,true);
  mm_menu_0805135813_0.addMenuItem("Issue/&nbsp;Return&nbsp;Books&nbsp;(Student)","location='?pid=32&action=bookissueforstudent'");
  mm_menu_0805135813_0.addMenuItem("Issue/&nbsp;Return&nbsp;Books&nbsp;(Staff)","location='?pid=32&action=bookissueforstaff'");
   mm_menu_0805135813_0.hideOnMouseOut=true;
   mm_menu_0805135813_0.bgColor='#555555';
   mm_menu_0805135813_0.menuBorder=1;
   mm_menu_0805135813_0.menuLiteBgColor='#FFFFFF';
   mm_menu_0805135813_0.menuBorderBgColor='#71D0D2';
   
   window.mm_menu_0823152718_0 = new Menu("root",167,18,"Verdana, Arial, Helvetica, sans-serif",12,"#333333","#FFFFFF","#FFFFFF","#71D0D2","left","middle",3,0,1000,-5,7,true,true,true,0,true,true);
  mm_menu_0823152718_0.addMenuItem("All&nbsp;Books","location='?pid=32&action=booksavailable'");
 /* mm_menu_0823152718_0.addMenuItem("Book&nbsp;Availability","location='?pid=32&action=bookdetailes'");*/
 mm_menu_0823152718_0.addMenuItem("Book&nbsp;Availability","location='?pid=32&action=books_avialability'");
mm_menu_0823152718_0.addMenuItem("Student&nbsp;Report","location='?pid=32&action=studentrecard'");
    mm_menu_0823152718_0.addMenuItem("Staff&nbsp;Report","location='?pid=32&action=facultyrecard'");

 mm_menu_0823152718_0.addMenuItem("Books&nbsp;Issued&nbsp;to&nbsp;Students","location='?pid=32&action=books_issuedstudent'");
  mm_menu_0823152718_0.addMenuItem("Books&nbsp;Issued&nbsp;to&nbsp;Staff","location='?pid=32&action=books_issuefaculty'");
  mm_menu_0823152718_0.addMenuItem("All&nbsp;Fines","location='?pid=32&action=finepayments'");
 




  mm_menu_0823152718_0.addMenuItem("Book&nbsp;Analysis","location='?pid=32&action=issueandreturn'");
/*  mm_menu_0823152718_0.addMenuItem("Library&nbsp;Student ","location='?pid=32&action=lstudent'");
  mm_menu_0823152718_0.addMenuItem("Library&nbsp;Staff ","location='?pid=32&action=lstaff'");*/
  mm_menu_0823152718_0.hideOnMouseOut=true;
  mm_menu_0823152718_0.bgColor='#555555';
  mm_menu_0823152718_0.menuBorder=1;
  mm_menu_0823152718_0.menuLiteBgColor='#FFFFFF';
  mm_menu_0823152718_0.menuBorderBgColor='#71D0D2';
  mm_menu_0805135813_0.writeMenus();
} // mmLoadMenus()

/***********************************************
* Switch Menu script- by Martial B of http://getElementById.com/
* Modified by Dynamic Drive for format & NS4/IE4 compatibility
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/

var persistmenu="yes" //"yes" or "no". Make sure each SPAN content contains an incrementing ID starting at 1 (id="sub1", id="sub2", etc)
var persisttype="sitewide" //enter "sitewide" for menu to persist across site, "local" for this page only

if (document.getElementById){ //DynamicDrive.com change
	document.write('<style type="text/css">\n')
	document.write('.submenu{display: none;}\n')
	document.write('</style>\n')
}

function SwitchMenu(obj){
	if (document.getElementById){
	var el = document.getElementById(obj);
	var ar = document.getElementById("masterdiv").getElementsByTagName("span"); //DynamicDrive.com change
		if(el.style.display != "block"){ //DynamicDrive.com change
			for (var i=0; i<ar.length; i++){
				if (ar[i].className=="submenu") //DynamicDrive.com change
				ar[i].style.display = "none";
			}
			el.style.display = "block";
		}else{
			el.style.display = "none";
		}
	}
}

function get_cookie(Name) { 
var search = Name + "="
var returnvalue = "";
if (document.cookie.length > 0) {
offset = document.cookie.indexOf(search)
if (offset != -1) { 
offset += search.length
end = document.cookie.indexOf(";", offset);
if (end == -1) end = document.cookie.length;
returnvalue=unescape(document.cookie.substring(offset, end))
}
}
return returnvalue;
}

function onloadfunction(){
if (persistmenu=="yes"){
var cookiename=(persisttype=="sitewide")? "switchmenu" : window.location.pathname
var cookievalue=get_cookie(cookiename)
if (cookievalue!="")
document.getElementById(cookievalue).style.display="block"
}
}

function savemenustates(){
var inc=1, blockid=""
while (document.getElementById("sub"+inc)){
if (document.getElementById("sub"+inc).style.display=="block"){
blockid="sub"+inc
break
}
inc++
}
var cookiename=(persisttype=="sitewide")? "switchmenu" : window.location.pathname
var cookievalue=(persisttype=="sitewide")? blockid+";path=/" : blockid
document.cookie=cookiename+"="+cookievalue
}

if (window.addEventListener)
window.addEventListener("load", onloadfunction, false)
else if (window.attachEvent)
window.attachEvent("onload", onloadfunction)
else if (document.getElementById)
window.onload=onloadfunction

if (persistmenu=="yes" && document.getElementById)
window.onunload=savemenustates

</script>
<script type="text/javascript">
			function newWindowOpen (href) {
					window.open(href,null,'width=350,height=200,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30' );
			}
		</script>
		<script type="text/javascript">
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
/* Adding chapters actions */
		function getsubjects(countryid,selval)
		{   
			url="?pid=55&action=subbookacts&cid="+countryid+"&selval="+selval;
			url=url+"&sid="+Math.random();
			xmlHttp=GetXmlHttpObject(countryChanged);
			xmlHttp.open("GET", url, true);
			xmlHttp.send(null);
		}
		function countryChanged()
		{
			if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
			{
				document.getElementById("subcatbox").innerHTML=xmlHttp.responseText
			}
		}
		
		
		
		
	
		
</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script type="text/javascript">

/***********************************************
* Switch Menu script- by Martial B of http://getElementById.com/
* Modified by Dynamic Drive for format & NS4/IE4 compatibility
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/

var persistmenu="yes" //"yes" or "no". Make sure each SPAN content contains an incrementing ID starting at 1 (id="sub1", id="sub2", etc)
var persisttype="sitewide" //enter "sitewide" for menu to persist across site, "local" for this page only

if (document.getElementById){ //DynamicDrive.com change
document.write('<style type="text/css">\n')
document.write('.submenu{display: none;}\n')
document.write('</style>\n')
}

function SwitchMenu(obj){
	if(document.getElementById){
	var el = document.getElementById(obj);
	var ar = document.getElementById("masterdiv").getElementsByTagName("span"); //DynamicDrive.com change
		if(el.style.display != "block"){ //DynamicDrive.com change
			for (var i=0; i<ar.length; i++){
				if (ar[i].className=="submenu") //DynamicDrive.com change
				ar[i].style.display = "none";
			}
			el.style.display = "block";
		}else{
			el.style.display = "none";
		}
	}
}

function get_cookie(Name) { 
var search = Name + "="
var returnvalue = "";
if (document.cookie.length > 0) {
offset = document.cookie.indexOf(search)
if (offset != -1) { 
offset += search.length
end = document.cookie.indexOf(";", offset);
if (end == -1) end = document.cookie.length;
returnvalue=unescape(document.cookie.substring(offset, end))
}
}
return returnvalue;
}

function onloadfunction(){
if (persistmenu=="yes"){
var cookiename=(persisttype=="sitewide")? "switchmenu" : window.location.pathname
var cookievalue=get_cookie(cookiename)
if (cookievalue!="")
document.getElementById(cookievalue).style.display="block"
}
}

function savemenustates(){
var inc=1, blockid=""
while (document.getElementById("sub"+inc)){
if (document.getElementById("sub"+inc).style.display=="block"){
blockid="sub"+inc
break
}
inc++
}
var cookiename=(persisttype=="sitewide")? "switchmenu" : window.location.pathname
var cookievalue=(persisttype=="sitewide")? blockid+";path=/" : blockid
document.cookie=cookiename+"="+cookievalue
}

if (window.addEventListener)
window.addEventListener("load", onloadfunction, false)
else if (window.attachEvent)
window.attachEvent("onload", onloadfunction)
else if (document.getElementById)
window.onload=onloadfunction

if (persistmenu=="yes" && document.getElementById)
window.onunload=savemenustates

</script>
<script language="JavaScript" src="includes/js/mm_menu.js"></script>
<script language="JavaScript1.2">mmLoadMenus();</script>
<script>
function goto_URL(object)
{

window.location.href = object.options[object.selectedIndex].value;
}

function changecase(obj)
{
var id=obj.value;
window.location.href=" ?pid=32&action=bookissueforstudent1&serid="+id;
}
function changecase1(obj)
{
var id=obj.value;
window.location.href=" ?pid=32&action=bookissueforstaff1&serid="+id;
}
function changecase11(obj)
{
var id=obj.value;
//alert(id);
 if(id==""){
 window.location.href=" ?pid=32&action=studentrecard";

 }else{
window.location.href=" ?pid=32&action=studentrecard1&serid="+id;
}
}function changecase111(obj)
{
var id=obj.value;
 if(id==""){
 window.location.href=" ?pid=32&action=facultyrecard";

 }else{
window.location.href=" ?pid=32&action=facultyrecard1&serid="+id;
}
}

//-->
function newWindowOpen(href)
{
    window.open(href,null, 'width=700,height=500,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');
	

}
</script>
<script type="text/javascript" src="includes/js/prototype1.js"></script>
<script type="text/javascript" src="includes/js/city.js"></script>


<style type="text/css">
.style1 {color: #FF0000}
</style>
<script type="text/javascript" >
	function showAvatar()
			{
		
				var ch = document.de_allocate_room_form.eq_paymode.value;
				if (ch=='cash' || ch=='' ){
					document.getElementById("patiddivdisp").style.display="none";
				}else{
				document.getElementById("patiddivdisp").style.display="block";
				}
			}		  
</script>
<script type="text/javascript">
function popup_letterlib(url) {
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

</script>
<script type="text/javascript" src="includes/js/prototype1.js"></script>
<script type="text/javascript" src="includes/js/city.js"></script>
<?php  if($action!="print_list_category" && $action!="print_list_subcategory" && $action!='print_list_publishers' && $action!='print_list_booksavailable'  && $action!='print_list_books_avialability' && $action!='print_list_books_issuedstudent' && $action!= 'print_list_books_issuefaculty'){?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
	 </tr>
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td  align="left" valign="top">
	<?php if ($action != 'bookdetails_print' && $action != 'student_record_print' && $action != 'book_analysis_print' && $action != 'printlstudent' && $action != 'plstaff' && $action != 'viewreserved_details' && $action!='faculty_record_print' && $action!="receipt_lib" && $action!="allpayprints") { ?>
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td height="25" colspan="3" class="bgcolor_02">
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td width="25%" height="25" align="center" class="admin"><a href="#" name="link3" class="admin" id="link1" onmouseover="MM_showMenu(window.mm_menu_0716170010_0,0,14,null,'link3')" onmouseout="MM_startTimeout();">Master Records</a></td>
                    <td width="25%" align="center" class="admin"><a href="#" name="link4"class="admin" id="link2" onmouseover="MM_showMenu(window.mm_menu_0805135813_0,0,14,null,'link4')" onmouseout="MM_startTimeout();">Transaction Records</a></td>
                    <td width="24%" align="center" class="admin"><a href="#" name="link7"class="admin" id="link5" onmouseover="MM_showMenu(window.mm_menu_0823152718_0,0,14,null,'link7')" onmouseout="MM_startTimeout();">View Reports</a></td>
                    <td width="26%" align="center" class="admin"><a href=" ?pid=38&action=serchbooks" target="_blank"class="admin">OPAC</a></td>
                </tr>
			</table>
		</td>
	</tr>
	</table>
	<?php } if($action == 'viewreserved_details'){?>
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
<td height="25" align="left" valign="middle" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Reserved Details</span></td>
</tr>
	</table>
	<?php } if($action == 'receipt_lib'){?>
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
<td height="25" align="left" valign="middle" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Library fine Receipt</span></td>
</tr>
	</table>
	<?php } if($action == 'allpayprints'){?>
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
<td height="25" align="left" valign="middle" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Library fine </span></td>
</tr>
	</table>
	<?php }?>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td height="450" align="left" valign="top" >
                    
<?php if ($action=='addcategoty' || $action=='editcategory'){ ?>

						<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
							<form action="" method="post">
							<tr>
								<td height="23" colspan="4" align="left" valign="top">
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
										<tr><td>&nbsp;</td></tr>
										<tr>
											<td height="23" align="left" valign="middle" class="bgcolor_02">&nbsp;&nbsp;&nbsp;<span class="admin">Add/Edit Category</span></td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td height="19" colspan="4" align="right" valign="middle" class="admin"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font></td>
                </tr>
                        <tr class="narmal">
                        <td height="10" colspan="4" align="right" valign="middle" class="admin"></td>
                        </tr>
                      <tr>
                        <td height="23" align="left" valign="middle" class="narmal">&nbsp;</td>
                        <td height="23" align="left" valign="middle" class="narmal">Category Name </td>
                        <td align="left" valign="top" class="admin">&nbsp;</td>
                        <td align="left" valign="top" class="admin"><input type="text" name="lib_category" value="<?php echo htmlentities($editcat->lb_categoryname);?>" /> 
                        <font color="#FF0000">*</font>&nbsp;(eg: English)</td>
                      </tr>
                      <tr class="narmal">
                        <td height="10" colspan="4" align="left" valign="middle" class="admin"></td>
                </tr>
                      <tr>
                        <td height="23" align="left" valign="middle" class="narmal">&nbsp;</td>
                        <td height="23" align="left" valign="middle" class="narmal">Description</td>
                        <td align="left" valign="top" class="admin">&nbsp;</td>
                        <td align="left" valign="top" class="admin"><textarea name="libcat_desc" cols="16"><?php echo htmlentities($editcat->lb_catdesc);?></textarea>
                        <font color="#FF0000">*</font></td>
                      </tr>
                      <tr>
                        <td height="10" colspan="4" align="left" valign="middle" class="admin"></td>
                </tr>
                      <tr>
                        <td height="23" colspan="2" align="right" valign="middle" class="admin">&nbsp;</td>
                        <td align="left" valign="top" class="admin">&nbsp;</td>
                        <td align="left" valign="top" class="admin">
						<?php
						if($action=='addcategoty')
						{
						?>
<?php if (in_array("16_1", $admin_permissions)) {?>
						<input name="AddCategory" type="submit" class="bgcolor_02" value="Submit" style="cursor:pointer;"/>
                        
<?php }?>
						<?php
						}
						else
						{
						?>
<?php if (in_array("16_2", $admin_permissions)) {?>				
						<input name="upadtecategory" type="submit" class="bgcolor_02" value="Update" style="cursor:pointer;"/>
<?php }?>
						<?php
						}
						?>
						
                        </td>
                      </tr>
					  <tr>
					  <td>&nbsp;</td>
					  </tr>
			  </form>
            </table>
					<table width="80%" border="0" align="center" cellpadding="0" cellspacing="0" >
                      <tr>
                        <td><table width="100%" border="0" cellspacing="0" cellpadding="1" class="tbl_grid">
                          
                          <tr class="bgcolor_02">
                            <td width="6%" class="admin" align="center">S No</td>
                            <td width="15%" class="admin" align="center">Name</td>
                            <td width="17%" class="admin" align="center">Action</td>
                          </tr>
                          <?php
						  if (isset($categoryview)&&is_array($categoryview))
						  {
					  $rownum = 1;	
					  foreach ($categoryview as $categoryview1){
					  $zibracolor = ($rownum%2==0)?"even":"odd";	
					  ?>
                          <tr class="<?php echo $zibracolor; ?>">
                            <td class="narmal" align="center"><?php echo $rownum; ?></td>
                            <td class="narmal" align="left"><?php echo $categoryview1->lb_categoryname; ?></td>
                            <td class="narmal" align="center">
                            <?php if (in_array("16_2", $admin_permissions)) {?>
                            <a href=" ?pid=32&action=editcategory&sid=<?php echo $categoryview1->es_categorylibraryId; ?>&start=<?php echo $start; ?>"><img src="images/b_edit.png" border="0" /></a> 
                            <?php }?>
                            <?php if (in_array("16_3", $admin_permissions)) {?>
                            <a href=" ?pid=32&action=deletecategory&sid=<?php echo $categoryview1->es_categorylibraryId; ?>" onClick="return confirm('Are you sure you want to delete ?')"><img src="images/b_drop.png"  border="0"/></a> </td>
                           <?php }?>
                          </tr>
                         
                           <?php
					 $rownum++;}
					 }
					 ?>
					 <tr>
<td colspan="3" align="center"><?php paginateexte($start, $q_limit, $no_rows, "&action=addcategoty&column_name=".$orderby."&asds_order=".$asds_order) ?></td>
				  </tr>
				  <tr>
<td colspan="3" align="right"><?php 
if(count($categoryview)>=1){
if (in_array("16_101", $admin_permissions)) {?><input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=32&action=print_list_category<?php echo $PageUrl;?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /><?php }}?></td>
				  </tr>
                        </table></td>
                      </tr>
                    </table>
					<?php
					}
					?>

			

	<?php
	if($action=='addsubcategoty' || $action=='editsubcategory')
		{
	?>				
	<form action="" method="post">
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="23" colspan="4" align="left" valign="top">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr><td>&nbsp;</td></tr>
                          <tr>
                            <td height="25" align="left" valign="middle" class="bgcolor_02">&nbsp;&nbsp;&nbsp;<span class="admin">Add/Edit Sub Category</span></td>
                          </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td height="19" colspan="4" align="right" valign="middle" class="admin"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font></td>
                </tr>
                      <tr align="left" class="narmal">
                        <td height="10" colspan="4" valign="middle" class="admin"></td>
                </tr>
                      	<tr>
                        <td height="23" align="left" valign="middle" class="narmal">&nbsp;</td>
                        <td height="23" align="left" valign="middle" class="narmal">Category Name </td>
                        <td align="left" valign="top" class="admin">&nbsp;</td>
                        <td align="left" valign="top" class="admin"><select style="width:150px" name="categoryname">
						<?php
						echo "".$categoryname=$editsubcat->subcat_catname;
						 foreach ($categoryview as $categoryview1){
						?>
				<option value="<?php echo $categoryview1->es_categorylibraryId;?>" <?php echo ($categoryview1->es_categorylibraryId==$categoryname)?"selected":""?>>
						
						<?php echo $categoryview1->lb_categoryname; ?>
						
						</option>
						<?php
						}?>
						
						</select></td>
                      </tr>
					   <tr align="left" class="narmal">
                        <td height="10" colspan="4" valign="middle" class="admin"></td>
                </tr>
					  <tr>
                        <td height="23" align="left" valign="middle" class="narmal">&nbsp;</td>
                        <td height="23" align="left" valign="middle" class="narmal">Sub Category Name </td>
                        <td align="left" valign="top" class="admin">&nbsp;</td>
                        <td align="left" valign="top" class="admin"><input type="text" name="sub_catname" id="sub_catname" value="<?php echo htmlentities($editsubcat->subcat_scatname); ?>" />
                        </td>
                      </tr>
                      <tr align="left" class="narmal">
                        <td height="10" colspan="4" valign="middle" class="admin"></td>
                </tr>
                      <tr>
                        <td height="23" align="left" valign="middle" class="narmal">&nbsp;</td>
                        <td height="23" align="left" valign="middle" class="narmal">Description</td>
                        <td align="left" valign="top" class="admin">&nbsp;</td>
                        <td align="left" valign="top" class="admin">
						<textarea name="sub_catdesc" id="sub_catdesc"><?php echo htmlentities($editsubcat->subcat_scatdesc); ?></textarea>
						<font color="#FF0000">*</font></td>
                      </tr>
                      <tr>
                        <td height="10" colspan="4" align="right" valign="middle" class="admin"></td>
                </tr>
                      <tr>
                        <td height="23" colspan="2" align="right" valign="middle" class="admin">&nbsp;</td>
                        <td align="left" valign="top" class="admin">&nbsp;</td>
                        <td align="left" valign="top" class="admin">
						<?php
						if($action=='addsubcategoty')
						{
						?>
						<?php if (in_array("16_4", $admin_permissions)) {?>
                        <input name="subaddcategory" type="submit" class="bgcolor_02" value="Submit" style="cursor:pointer;"/>
                        <?php }?>
						<?php
						}else
						{
						?>
                        <?php if (in_array("16_5", $admin_permissions)) {?>
						<input name="upadtesubaddcategory" type="submit" class="bgcolor_02" value="Update" style="cursor:pointer;" />
                        <?php }?>
						<?php
						}
						?>
                        </td>
                      </tr>
					  <tr>
					  <td>&nbsp;</td>
					  </tr>
              </table>
			</form>
					
					
					<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td><table width="100%" border="0" cellspacing="0" cellpadding="1" class="tbl_grid">
                          
                          <tr class="bgcolor_02">
                            <td width="6%" class="admin" align="center">S No</td>
                            <td width="15%" class="admin" align="center">Category Name</td>
							<td width="15%" class="admin" align="center">Sub Category Name</td>
                            <td width="17%" class="admin" align="center">Action</td>
                          </tr>
                          <?php
						  if (isset($subcategoryview)&&is_array($subcategoryview))
						  {
					  $rownum = 1;	
					  foreach ($subcategoryview as $subcategoryview1){
					  $zibracolor = ($rownum%2==0)?"even":"odd";
					  $cid=$subcategoryview1->subcat_catname;
					  $catname =$es_categorylibrary ->Get($cid);
					  	
					  ?>
                          <tr class="<?php echo $zibracolor; ?>">
                            <td class="narmal" align="center"><?php echo $rownum; ?></td>
                            <td class="narmal" align="left"><?php echo $catname ->lb_categoryname; ?></td>
							 <td class="narmal" align="left"><?php echo $subcategoryview1->subcat_scatname; ?></td>
                            <td class="narmal" align="center">
                            <?php if (in_array("16_5", $admin_permissions)) {?>
                            <a href=" ?pid=32&action=editsubcategory&sid=<?php echo $subcategoryview1->es_subcategoryId; ?>&start=<?php echo $start; ?>"><img src="images/b_edit.png" border="0" /></a>&nbsp;<?php } 
							 if (in_array("16_6", $admin_permissions)) {?><a href=" ?pid=32&action=deletesubcategory&sid=<?php echo $subcategoryview1->es_subcategoryId; ?>"><img src="images/b_drop.png"  border="0" onClick="return confirm('Are you sure you want to delete ?')"/></a>
                             
                             <?php }else{ echo "-"; }?>
                             
                            </td>
                          
                          </tr>
                          <?php
					 $rownum++;}
					 }
					 ?>
					 <tr>
<td colspan="4" align="center"><?php paginateexte($start, $q_limit, $no_rows, "&action=addsubcategoty&column_name=".$orderby."&asds_order=".$asds_order) ?></td>
				  </tr>
				  <tr>
<td colspan="4" align="right"><?php 
if(count($subcategoryview)>=1){
if (in_array("16_102", $admin_permissions)) {?><input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=32&action=print_list_subcategory<?php echo $PageUrl;?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /><?php } }?></td>
				  </tr>
                        </table></td>
                      </tr>
                    </table>
					<?php
					}
					?>	
					
<?php
	
	if ($action=='addbook' || $action=='editbook'){
?>
			<?php if (in_array("16_13", $admin_permissions)) {?><form action="" method="post" name="addbook" >
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="5"></td>
	 </tr>
	 <tr>
                        <td height="23" colspan="5" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td height="25" align="left" valign="middle" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Add/Edit Books</span></td>
                          </tr>
                        </table></td>
                </tr>
	<tr>
		<td colspan="5" align="right"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font><br /></td>
	</tr>
	<tr>
		<td width="131" height="25" align="left" valign="middle" class="narmal">&nbsp;Purchased&nbsp;on&nbsp; </td>
		<td width="219" align="left" valign="middle" class="narmal">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td width="17%"><input type="text" name="purcahsedate" id="purchasedate" value="<?php if(isset($purcahsedate)&&$purcahsedate!="") { echo $purcahsedate ; }else { echo "";} ?>" size="10" readonly="readonly" onchange="return registrationvalid()" /></td>
					<td width="83%"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.addbook.purcahsedate);return false;" ><img name="popcal" align="absmiddle" src="<?php echo JS_PATH ?>/WeekPicker/calbtn.gif" width="34" height="22" border="0" alt="" /></a><font color="#FF0000">*</font></td>
				</tr>
			</table>
				<iframe width=199 height=178 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="<?php echo JS_PATH ?>/WeekPicker/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"> </iframe>
				<?php /*?><input type="text" name="purcahsedate" id="purchasedate" value="<?php if(isset($purcahsedate)&&$purcahsedate!="") { echo $purcahsedate ; }else { echo "";}?>" /><?php */?>		</td>
		<td width="7" align="left" valign="middle" class="narmal">&nbsp;</td>
		<td width="84" align="left" valign="middle" class="narmal">&nbsp;</td>
		<td width="172" align="left" valign="middle" class="narmal">&nbsp;</td>
	</tr>
	<tr>
		<td height="25" align="left" valign="middle" class="narmal">&nbsp;Bill&nbsp;Number </td>
		<td height="25" align="left" valign="middle" class="narmal"><input type="text" name="sc_bill" id="sc_bill" value="<?php if(isset($sc_bill)&&$sc_bill!="") { echo $sc_bill ; }else { echo "";}?>"/>
		<font color="#FF0000">*</font></td>
		<td align="left" valign="middle" class="narmal">&nbsp;</td>
		<td align="left" valign="middle" class="narmal">Category</td>
		<td align="left" valign="middle" class="narmal"><?php echo $lbook_category;?>
        <select name="categoryname" id="categoryname" onchange="loadcities();" onblur="loadcities();" style="width:150px;">
		<option value="">Select</option>
		<?php
		$categoryname=$editsubcat->subcat_catname;
		foreach ($categoryview as $categoryview1){
		?>
		<option value="<?php echo $categoryview1->es_categorylibraryId;?>" <?php echo ($categoryview1->es_categorylibraryId==$categoryname)?"selected":""?><?php echo ($categoryview1->es_categorylibraryId==$libbookview->lbook_category)?"selected":""?>>

		<?php echo $categoryview1->lb_categoryname; ?></option>
		<?php
		}?>
		</select><font color="#FF0000">*</font></td>
	</tr>
	<?php if($action!="editbook"){
		$sql="SELECT es_libbookid FROM es_libbook order by es_libbookid desc limit 0,1";
		$aac=$db->getrow($sql);
		$fromacno=$aac['es_libbookid'];
		$fromacno=$fromacno+1;
}

?> 
    <tr>
		<td height="25" align="left" valign="middle" class="narmal">&nbsp;Accession&nbsp;Number </td>
		<td height="25" align="left" valign="middle" class="narmal">
		
		
		<input name="fromacno" type="text" id="fromacno" 
		value="<?php if(isset($fromacno)&&$fromacno!="") { echo $fromacno ; }else { echo "";}?>" readonly/></td>
		<td align="left" valign="middle" class="narmal">&nbsp;</td>
		<td align="left" valign="middle" class="narmal">Sub&nbsp;Category</td>
		<td align="left" valign="middle" class="narmal">
		
		
		<?php
		if($action=="editbook"){$scategory=$libbookview->lbook_booksubcategory;}
				if($action=="addbook"){$scategory=$scategoryname;}
			//echo $scategory;
				$sub_sql="SELECT * FROM es_subcategory WHERE  subcat_status!='inactive' AND  es_subcategoryid=".$scategory." ";
							?>
		<select style="width:150px" name="scategoryname" id="scategoryname" >
        <?php
				
			if ($scategory!="") {			  
				
				
				$sub_exe=mysql_query($sub_sql);
				while($sub_row=mysql_fetch_array($sub_exe)){
				?>
				
				
				<option value="<?php echo $sub_row['es_subcategoryid'];?>" <?php if ($sub_row['es_subcategoryid']==$scategory){?> selected="selected" <?php }?>><?php echo $sub_row['subcat_scatname'];?></option>
				
				<?php				
				}
				
				
			} else {
		?>
        		<option value="">Select</option>
        <?php
			}
		?>
        </select><font color="#FF0000">*</font>
        </td>
	</tr>
	<tr>
<?php
		if	($action!='editbook'){
?>
		<td height="25" align="left" valign="middle" class="narmal">&nbsp;Number of Books </td>
		<td height="25" align="left" valign="middle" class="narmal"><?php /*?>From<input name="frombookno" type="text" id="frombookno" size="3" value="<?php if(isset($frombookno)&&$frombookno!="") { echo $frombookno ; }else { echo "";}?>"/>To<?php */?><input name="tobookno" type="text" id="tobookno"  size="3" value="<?php if(isset($tobookno)&&$tobookno!="") { echo $tobookno ; }else { echo "";}?>" />
			<font color="#FF0000">*</font>		</td>
		<?php }?>
			<?php if($action=='editbook'){ ?> 
		<td height="25" align="left" valign="middle" class="narmal">&nbsp; </td>                                   
		<td height="25" align="left" valign="middle" class="narmal"><?php }?>
		<td align="left"valign="middle" class="narmal">&nbsp;</td>
		<?php /*?><td width="171" align="left" valign="middle" class="narmal">  </td>
		<td width="428" align="left" valign="middle" class="narmal">
        	<select name="bookclassno" id="bookclassno" style="width:150px;">
                <option value="">Select</option>
                <?php
                if(is_array($listallclasses) && count($listallclasses)>0) {
					foreach ($listallclasses as $clsobj){
					if(isset($bookclassno) && $bookclassno==$clsobj->es_classesId) $slctd = "selected"; else if($libbookview->lbook_class == $clsobj->es_classesId) $slctd = "selected"; else $slctd = "";
			?>
					<option value="<?php echo $clsobj->es_classesId;?>" <?php echo $slctd; ?> ><?php echo $clsobj->es_classname; ?></option>
			<?php
					}
				}
				?>
            </select>
         </td><?php */?>
	</tr>
	<tr>
		<td height="25" align="left" valign="middle" class="narmal">&nbsp;Author</td>
		<td height="25" align="left" valign="middle" class="narmal"><input name="book_author" type="text" id="book_author" value="<?php if(isset($book_author)&&$book_author!="") { echo $book_author ; }else { echo "";}?>" />
		<font color="#FF0000">*</font></td>
		<td align="left" valign="middle" class="narmal">&nbsp;</td>
		<td align="left" valign="middle" class="narmal"></td>
		<td align="left" valign="middle" class="narmal"></td>
	</tr>
	<tr>
		<td height="25" align="left" valign="middle" class="narmal">&nbsp;Title</td>
		<td height="25" align="left" valign="middle" class="narmal"><input name="booktitle" type="text" id="book title" value="<?php if(isset($booktitle)&&$booktitle!="") { echo $booktitle ; }else { echo "";}?>" />
		<font color="#FF0000">*</font></td>
		<td align="left" valign="middle" class="narmal">&nbsp;</td>
		<td align="left" valign="middle" class="narmal">&nbsp;</td>
		<td align="left" valign="middle" class="narmal">&nbsp;</td>
	</tr>
	<tr>
		<td height="25" align="left" valign="middle" class="narmal">&nbsp;Publishers Name </td>
		<td height="25" align="left" valign="middle" class="narmal">
        <select style="width:150px" name="book_publishername" id="book_publishername">
            <option value="">Select</option>
            <?php
			if(isset($book_publishername) && $book_publishername!="") 
			{
			$sel_publisher = $book_publishername;
			}
			
			if(is_array($allpublishers) && count($allpublishers)>0) {
				foreach ($allpublishers as $listpublishers){
			?>
				<option value="<?php echo $listpublishers->es_libaraypublisherId ;?>" <?php echo ($listpublishers->es_libaraypublisherId==$sel_publisher)?"selected":""?> ><?php echo $listpublishers->library_publishername; ?></option>
			<?php
				}
			} ?>
		</select>
        <font color="#FF0000">*</font></td>
		<td align="left" valign="middle" class="narmal">&nbsp;</td>
		<td align="left" valign="middle" class="narmal">&nbsp;</td>
		<td align="left" valign="middle" class="narmal">&nbsp;</td>
	</tr>
	<tr>
		<td height="25" align="left" valign="middle" class="narmal">&nbsp;Supplier Name </td>
		<td height="25" align="left" valign="middle" class="narmal">
        <select style="width:150px" name="book_placepublisher" id="book_placepublisher">
            <option value="">Select</option>
            <?php
			if(isset($book_placepublisher) && $book_placepublisher!="") $sel_supplier = $book_placepublisher;
			else $sel_supplier = $libbookview->lbook_publisherplace;
			if(is_array($allsuppliers) && count($allsuppliers)>0) {
				foreach ($allsuppliers as $listsuppliers){
			?>
				<option value="<?php echo $listsuppliers->es_libaraypublisherId ;?>" <?php echo ($listsuppliers->es_libaraypublisherId==$sel_supplier)?"selected":""?> ><?php echo $listsuppliers->library_publishername; ?></option>
			<?php
				}
			} ?>
		</select>
        </td>
		<td align="left" valign="middle" class="narmal">&nbsp;</td>
		<td align="left" valign="middle" class="narmal">&nbsp;</td>
		<td align="left" valign="middle" class="narmal">&nbsp;</td>
	</tr>
<?php /*?>	<tr>
		<td height="25" align="left" valign="middle" class="narmal">&nbsp;Subject</td>
		<td height="25" align="left" valign="middle" class="narmal"><input name="booksubject" type="text" id="booksubject" value="<?php if(isset($booksubject)&&$booksubject!="") { echo $booksubject ; }else { echo "";}?>" />
		<font color="#FF0000">*</font></td>
		<td align="left" valign="middle" class="narmal">&nbsp;</td>
		<td colspan="2" align="left" valign="middle" class="narmal">
	</td>
	</tr><?php */?>
	<tr>
		<td height="25" align="left" valign="middle" class="narmal">&nbsp;Edition</td>
		<td height="25" align="left" valign="middle" class="narmal"><input name="bbokedition" type="text" id="bbokedition"  value="<?php if(isset($bbokedition)&&$bbokedition!="") { echo $bbokedition ; }else { echo "";}?>"/>
		</td>
		<td align="left" valign="middle" class="narmal">&nbsp;</td>
		<td align="left" valign="middle" class="narmal"><!--Status--></td>
		<td align="left" valign="middle" class="narmal"><!--<select name="bookstatus" id="bookstatus">
		<option>Select</option>
		</select>--></td>
	</tr>
	<tr>
		<td height="25" align="left" valign="middle" class="narmal">&nbsp;Year</td>
		<td height="25" align="left" valign="middle" class="narmal"><input name="bookyear" type="text" id="bookyear" value="<?php if(isset($bookyear)&&$bookyear!="") { echo $bookyear ; }else { echo "";}?>"/>
		</td>
		<td align="left" valign="middle" class="narmal">&nbsp;</td>
		<td align="left" valign="middle" class="narmal">Pages</td>
		<td align="left" valign="middle" class="narmal"><input name="booknopages" type="text" id="booknopages" size="12" value="<?php if(isset($booknopages)&&$booknopages!="") { echo $booknopages ; }else { echo "";} ?>"/>
		</td>
	</tr>
	<tr>
		<td height="25" align="left" valign="middle" class="narmal">&nbsp;Cost</td>
		<td height="25" align="left" valign="middle" class="narmal"><input name="bookcast" type="text" id="bookcast" value="<?php if(isset($bookcast)&&$bookcast!="") { echo $bookcast ; }else { echo "";}?>"/>
		</td>
		<td align="left" valign="middle" class="narmal">&nbsp;</td>
		<td align="left" valign="middle" class="narmal">Volume</td>
		<td align="left" valign="middle" class="narmal"><input name="bookvolume" type="text" id="bookvolume" size="12" value="<?php if(isset($bookvolume)&&$bookvolume!="") { echo $bookvolume ; }else { echo "";}?>" />
		</td>
	</tr>
	<?php /*?><tr>
		<td height="25" align="left" valign="middle" class="narmal">&nbsp;Book Source </td>
		<td height="25" align="left" valign="middle" class="narmal"><input name="booksource" type="text" id="booksource"  value="<?php if(isset($booksource)&&$booksource!="") { echo $booksource ; }else { echo "";}if(isset($libbookview->lbook_sourse)&&$libbookview->lbook_sourse!='') echo $libbookview->lbook_sourse;?>"/>
		<font color="#FF0000">*</font></td>
		<td align="left" valign="middle" class="narmal">&nbsp;</td>
		<td align="left" valign="middle" class="narmal">Bill Number </td>
		<td align="left" valign="middle" class="narmal"><input type="text" name="sc_bill" id="sc_bill" value="<?php if(isset($frombookno)&&$sc_bill!="") { echo $sc_bill ; }else { echo "";}if(isset($libbookview->lbook_bilnumber)&&$libbookview->lbook_bilnumber!='') echo $libbookview->lbook_bilnumber;?>"/>
		<font color="#FF0000">*</font></td>
	</tr><?php */?>
	<tr>
		<td height="25" align="left" valign="middle" class="narmal">&nbsp;Additional Info </td>
		<td height="25" colspan="4" align="left" valign="middle" class="narmal"><textarea name="additinalinfofbook" cols="30" id="additinalinfofbook"><?php if(isset($additinalinfofbook)&&$additinalinfofbook!="") { echo $additinalinfofbook ; }else { echo "";} ?></textarea>
		</td>
	</tr>					  
	<?php /*?><tr>
		<td height="25" align="left" valign="middle" class="narmal">&nbsp;Book Status </td>
		<td height="25" align="left" valign="middle" class="narmal"><input name="bookstatus" type="text" id="bookstatus" value="<?php if(isset($bookstatus)&&$bookstatus!="") { echo $bookstatus ; }else { echo "";}if(isset($libbookview->lbook_bookstatus)&&$libbookview->lbook_bookstatus!='') echo $libbookview->lbook_bookstatus;?>"/></td>
		<td align="left" valign="middle" class="narmal">&nbsp;</td>
		<td align="left" valign="middle" class="narmal">&nbsp;</td>
		<td align="left" valign="middle" class="narmal">&nbsp;</td>
	</tr><?php */?>
	<tr>
		<td height="25" align="left" valign="middle" class="narmal">&nbsp;</td>
		<td height="25" colspan="3" align="center" valign="middle" class="narmal">
		<?php
			if ($action=='addbook'){
		?>
		<input name="addbooks" type="submit" class="bgcolor_02" value="Add Book" style="cursor:pointer;"/>
		<?php
			}else{
		?>
		<input name="editupbooks" type="submit" class="bgcolor_02" value="Update Book" style="cursor:pointer;"/>
		<?php
		}
		?>
		</td>
		<td align="left" valign="middle" class="narmal">&nbsp;</td>
	</tr>
</table>
</form><?php }?><br/>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td>
			<table width="100%" border="0" cellspacing="0" cellpadding="1" class="tbl_grid">
				<tr class="bgcolor_02">
					<td width="6%" class="admin" align="center">S No</td>
					<td width="15%" class="admin" align="center">Accession Number </td>
				<!--	<td width="17%" class="admin" align="center"><span class="narmal">&nbsp;Book Number</span></td>-->
					<td width="15%" class="admin" align="center">Title</td>
						<td width="15%" class="admin" align="center">Category/Subcategory</td>
					<td width="15%" class="admin" align="center">Purchased On</td>	
					<td width="17%" class="admin" align="center">Action</td>
				</tr>
<?php
	   
		if (isset($bookview)&&is_array($bookview)){
			$rownum = $start+1;	
			if (count($bookview)>=1){
				foreach ($bookview as $bookview1){
				$zibracolor = ($rownum%2==0)?"even":"odd";	
?>
				<tr class="<?php echo $zibracolor; ?>">
					<td class="narmal" align="center"><?php echo $rownum; ?></td>
					<td class="narmal" align="center"><?php echo $bookview1->lbook_aceesnofrom; ?></td>
					<?php /*?><td class="narmal" align="center"><?php echo $bookview1->lbook_aceesnofrom; ?></td><?php */?>
					<td class="narmal" align="left"><?php echo $bookview1->lbook_title; ?></td>
					<td class="narmal" align="left"><?php 
					$online_sql="select * from es_categorylibrary where es_categorylibraryid=".$bookview1->lbook_category;
 $online_row=$db->getRow($online_sql);
			$online_sql1="select * from es_subcategory where es_subcategoryid=".$bookview1->lbook_booksubcategory;
 $online_row1=$db->getRow($online_sql1);
 
 		
					echo $online_row['lb_categoryname']; ?>(<?php echo $online_row1['subcat_scatname']; ?>)</td>
					<td class="narmal" align="center"><?php echo formatDBDateTOCalender($bookview1->lbook_dateofpurchase); ?></td>
					<td class="narmal" align="center">
						<?php if (in_array("16_14", $admin_permissions)) {?><a href=" ?pid=32&action=editbook&sid=<?php echo $bookview1->es_libbookId; ?>&start=<?php echo $start; ?>"><img src="images/b_edit.png" border="0" width="15" height="15" /></a><?php }else{ echo "-"; }?>
						<?php if (in_array("16_15", $admin_permissions)) {?><a href=" ?pid=32&action=deletebook&sid=<?php echo $bookview1->es_libbookId; ?>" onclick="return confirm('Are you sure you want to  delete?')"><img src="images/b_drop.png"  border="0"  width="15" height="15"/></a><?php }else{ echo "-"; }?> </td>
                    </tr>
<?php
					 $rownum++;
				}
					 
			}
?>
				<tr>
					<td colspan="6" align="center"><?php paginateexte($start, $q_limit, $no_rows, "&action=addbook&column_name=".$orderby."&asds_order=".$asds_order) ?></td>
				</tr>
				  <?php
				  }
				  ?>
			</table>
		</td>
	</tr>
</table>
<?php
	
	}								
	if ($action=='addtosatffinlibrary' || $action=='values' ){
?>
<form action="" method="post" name="addbooklstaff">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td height="25" class="bgcolor_02" width="1"></td>
		<td></td>
		<td  class="bgcolor_02" width="1"></td>
	</tr>
	<tr>
		<td  class="bgcolor_02" width="1"></td>
		<td height="25" align="left" valign="middle" class="bgcolor_02">Add Staff</td>
		<td  class="bgcolor_02" width="1"></td>
	</tr>
	<tr><td  class="bgcolor_02" width="1"></td>
		<td height="10" align="right" valign="top"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font><br /></td>
		<td  class="bgcolor_02" width="1"></td>
		</tr>
	<tr><td  class="bgcolor_02" width="1"></td>
		<td align="left" valign="top" width="519">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr> 
					<td align="left" valign="middle" class="narmal"> Employe Id</td>
					<td align="left" valign="middle" class="narmal">
					<select name="staffid" style="width:150px" onchange="goto_URL(this.form.staffid);"  >
					<option value=" ?pid=32&action=addtosatffinlibrary">Select</option>
					<?php foreach ($es_staffview as $eachrecord2){ ?>
		<option value=" ?pid=32&action=values&sid=<?php echo $eachrecord2->es_staffId; ?>" <?php echo ($eachrecord2->es_staffId==$sid)?"selected":""?>>ST<?php echo $eachrecord2->es_staffId; ?></option>
					<?php }?>
					</select>
					<font color="#FF0000">*</font> </td>
					<td colspan="2"  rowspan="6" align="right" valign="middle" class="narmal"><div align="left"><img src="<?php echo $staffview->image;?>" width="100" height="100"/></div></td>
				</tr>
				<tr>
					<td  align="left" valign="middle" class="narmal">Employe Name </td>
					<td  align="left" valign="middle" class="narmal"><input name="empname" type="text" id="empname"  value="<?php echo $staffview->st_firstname;?>"/>
					<font color="#FF0000">*</font></td>
					<td > </td>
					
				</tr>
				<tr>
					<td  align="left" valign="middle" class="narmal">Sex</td>
					<td  align="left" valign="middle" class="narmal"><input name="empsex" type="text" id="empsex" value="<?php echo $staffview->st_gender; ?>" />
					<font color="#FF0000">*</font> </td>
					<td > </td>
				</tr>
				<tr>
					<td  align="left" valign="middle" class="narmal" style="display:none">Qualification</td>
					<td   align="left" valign="middle" class="narmal" style="display:none"><input name="empqulification" type="text" id="empqulification" value="<?php echo $staffview->st_examp1; if(isset($active12->staffadd_qulification)&& $active12->staffadd_qulification!=""){echo $active12->staffadd_qulification;} ?> "/>
					<font color="#FF0000">*</font></td>
					<td > </td>
				</tr>
				<tr>
					<td  align="left" valign="top" class="narmal">Address</td>
					<td  align="left" valign="middle" class="narmal"><textarea name="empaddress" cols="16" id="empaddress"><?php if(isset($active12->staffadd_adress)&& $active12->staffadd_adress!=""){echo $active12->staffadd_adress;} else { echo  $staffview->st_pradress; }?></textarea>
					<font color="#FF0000">*</font></td>
					<td > </td>
				</tr>
				<tr>
					<td  align="left" valign="middle" class="narmal">Phone Number </td>
					<td   align="left" valign="middle" class="narmal"><input name="empphoneno" type="text" id="empphoneno"value="<?php  if(isset($active12->staffadd_phone)&& $active12->staffadd_phone!=""){echo $active12->staffadd_phone;} else {echo $staffview->st_mobilenocomunication;} ?>" />
					<font color="#FF0000">*</font></td>
					<td > </td>
				</tr>
				<tr>
					<td  align="left" valign="middle" class="narmal">Primary&nbsp;Subject </td>
					<td  align="left" valign="middle" class="narmal"><input name="empprimarysubject" type="text" id="empprimarysubject" value="<?php  if(isset($active12->staffadd_subject)&& $active12->staffadd_subject!=""){echo str_replace(',','.',$active12->staffadd_subject);} else { echo str_replace(',','',$staffview->st_primarysubject); } ?>" readonly=""/>
					<font color="#FF0000">*</font></td>
					<td > </td>
				</tr>
				
				<tr>
					<td  align="left" valign="middle" class="narmal">Department</td>
					<td  align="left" valign="middle" class="narmal"><input type="text" name="empdepartment" id="empdepartment" value="<?php if(isset($active12->staffadd_deaprtment)&& $active12->staffadd_deaprtment!=""){echo $active12->staffadd_deaprtment;} else {echo deptname($staffview->st_department); } ?>" readonly="">
					<font color="#FF0000">*</font></td>
					<td colspan="2" align="left" valign="middle" class="narmal">&nbsp;</td>
					<td > </td>
				</tr>
				<tr>
					<td  align="left" valign="middle" class="narmal">Post</td>
					<td  align="left" valign="middle" class="narmal"><input type="text" name="empdesigantion" id="empdesigantion" value="<?php  if(isset($active12->staffadd_designation)&& $active12->staffadd_designation!=""){echo $active12->staffadd_designation;} else { echo postname($staffview->st_post); } ?>" readonly="">
					<font color="#FF0000">*</font></td>
					<td > </td>
				</tr>
				<tr>
					<td  align="left" valign="top" class="narmal">Additional&nbsp;Info. </td>
					<td height="29" colspan="4" align="left" valign="middle" class="narmal"><textarea name="empaditinalinfo" cols="52" rows="10" id="empaditinalinfo" type="text"><?php if(isset($active12->staffadd_addtinalinfo)&& $active12->staffadd_addtinalinfo!=""){echo $active12->staffadd_addtinalinfo;}?></textarea><font color="#FF0000">*</font></td>
					<td > </td>
				</tr>
				<tr>
					
					<td  align="left" valign="middle" class="narmal">&nbsp;</td>
					<td  align="left" valign="middle" class="narmal">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
							  <td width="22%">Issued  From <strong>:</strong></td>
								<td width="78%"><input name="empisuuedfrom" type="text" id="empisuuedfrom"  value="<?php if(isset($empisuuedfrom)&& $empisuuedfrom!='') echo $empisuuedfrom; if(isset($active12->staffadd_issuedfromdate)&& $active12->staffadd_issuedfromdate!=""){echo formatDBDateTOCalender($active12->staffadd_issuedfromdate);}  ?>" size="14" onchange="return registrationvalid()"  readonly=""/>
                                  <a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.addbooklstaff.empisuuedfrom);return false;" ><img src="<?php echo JS_PATH ?>/WeekPicker/calbtn.gif" alt="" name="popcal" width="34" height="22" border="0" align="absmiddle" id="popcal" /><font color="#FF0000">*</font></a><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.addbooklstaff.empisuuedfrom);return false;" ></a></td>
								<iframe width="199" height="178" name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="<?php echo JS_PATH ?>/WeekPicker/ipopeng.htm" scrolling="No" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"> </iframe>
							</tr>
						</table>
						</td>
						<td  align="left" valign="middle" class="narmal">To <strong>:</strong> </td>
						<td  align="left" valign="middle" class="narmal">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td width="17%">
										<input name="empisuedto" type="text" id="empisuedto" value="<?php if(isset($empisuedto)&& $empisuedto!='') {echo $empisuuedfrom; } if(isset($active12->staffadd_issuedtodate)&& $active12->staffadd_issuedtodate!=""){echo formatDBDateTOCalender($active12->staffadd_issuedtodate);}?>" onchange="return registrationvalid()" readonly="" size="14"/>
									</td>
									<td width="83%">
										<a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.addbooklstaff.empisuedto);return false;" ><img src="<?php echo JS_PATH ?>/WeekPicker/calbtn.gif" alt="" name="popcal" width="34" height="22" border="0" align="absmiddle" id="popcal" /><font color="#FF0000">*</font></a>
									</td>
								</tr>
							</table>
						</td>
						<td > </td>
					</tr>
					<tr>
						<td  >&nbsp;</td>
						<td   >&nbsp;</td>
						<td  >&nbsp;</td>
						
					</tr>
					<tr>
                       <td  align="left" valign="middle" class="narmal">&nbsp;</td>
                       <td  colspan="7" align="left" valign="middle" class="narmal">
							<?php
								if($active12->staffadd_status!='active'){
							?>
							<input name="submitlib" type="submit" class="bgcolor_02" value="Submit" style="cursor:pointer;"/> 
							<?php } 												
							if($active12->staffadd_status=='active')
							{
							?>
							<input name="submitprint" type="submit" class="bgcolor_02" value="Update" style="cursor:pointer;"/>
							<?php
							}
							?>
							<input name="cancel" type="submit" class="bgcolor_02" value="Cancel" style="cursor:pointer;"/>
						</td>
						<td align="left" valign="middle" class="narmal">&nbsp;</td>
				</tr>
			</table>
		</td>
		<td  class="bgcolor_02" width="1"></td>
	</tr>
</table>		
</form>
				<?php
				}
				?>						
										
				
		<?php
		if($action=='finedetailes' || $action=='editfine')
		{
		?>
		<form action="" method="post">
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="23" colspan="3" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr><td>&nbsp;</td></tr>
                          <tr>
                            <td height="23" align="left" valign="middle" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Library Fine</span></td>
                          </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td height="21" colspan="3" align="right" valign="middle" class="admin"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font></td>
                </tr>
						                     <?php if ( in_array("16_7", $admin_permissions) || in_array("16_8", $admin_permissions) ) {?>
                                              <tr>
                        <td width="175" height="23" align="left" valign="middle" class="narmal">&nbsp;
                        
                        </td>
                        <td width="12" align="left" valign="top" class="admin">&nbsp;</td>
                        <td width="402" align="left" valign="top" class="admin"><select name="fineselect" id="fineselect" style="width:150px">
                          <option  value="Student" <?php echo ($editfinecat->es_libfinefor=='Student')?"selected":""?>>Student</option>
                          <option  value="Staff" <?php echo ($editfinecat->es_libfinefor=='Staff')?"selected":""?>>Staff</option>
                        </select>
                        </td>
						                      </tr>
						<tr align="left" class="narmal">
                        <td height="10" colspan="3" valign="middle" class="admin"></td>
                        </tr>
                      <tr>
                        <td width="175" height="23" align="left" valign="middle" class="narmal">&nbsp;No of Days </td>
                        <td width="12" align="left" valign="top" class="admin">&nbsp;</td>
                        <td width="402" align="left" valign="top" class="admin"><input name="fine_nodays" type="text" id="fine_nodays" value="<?php echo $editfinecat->es_libfinenoofdays; ?>"  />
                        <font color="#FF0000">*</font></td>
                      </tr>
                      <tr align="left" class="narmal">
                        <td height="10" colspan="3" valign="middle" class="admin"></td>
                </tr>
                      <tr>
                        <td height="23" align="left" valign="middle" class="narmal">&nbsp;Fine Amount  </td>
                        <td align="left" valign="top" class="admin">&nbsp;</td>
                        <td align="left" valign="top" class="admin"><input name="fineamount" type="text" id="fineamount" value="<?php echo $editfinecat->es_libfineamount; ?>" />
                        <font color="#FF0000">*</font></td>
                      </tr>
                      <tr align="left" class="narmal">
                        <td height="10" colspan="3" valign="middle" class="admin"></td>
                </tr>
						<tr>
                        <td height="23" align="left" valign="middle" class="narmal"> &nbsp;Duration</td>
                        <td align="left" valign="top" class="admin">&nbsp;</td>
                        <td align="left" valign="top" class="admin"><input name="fineduration" type="text" id="fineduration" value="<?php echo $editfinecat->es_libfineduration;?>" />&nbsp;Day(s)
                          <font color="#FF0000">*</font></td>
                      </tr>
                      <tr>
                      <?php }?>
                        <td height="10" colspan="3" align="right" valign="middle" class="admin"></td>
                </tr>
					   <tr>
                        <td height="23" align="right" valign="middle" class="admin">&nbsp;</td>
                        <td align="left" valign="top" class="admin">&nbsp;</td>
                        <td align="left" valign="top" class="admin">
						<?php
						if($action=='finedetailes')
						{
						?>
                        <?php if (in_array("16_7", $admin_permissions)) {?>
						<input name="finesubmit" type="submit" class="bgcolor_02" value="Submit" style="cursor:pointer;"/>
                        <?php }?>
						<?php } ?>
                        
                        <?php if (in_array("16_8", $admin_permissions)) {?>
						<input name="updatefinesubmit" type="submit" class="bgcolor_02" value="Update" style="cursor:pointer;"/>
                        <?php }?>
						
                         
                         </td>
                      </tr>
					  <tr>
					  <td>&nbsp;</td>
					  </tr>
              </table>
			</form>
					
					<table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td><table width="100%" border="0" cellspacing="0" cellpadding="1" class="tbl_grid">
                          
                          <tr class="bgcolor_02">
                      
                            <td width="15%" class="admin" align="center">Type</td>
                            <td width="17%" class="admin" align="center">No&nbsp;Of&nbsp;Days</td>
							<td width="15%" class="admin" align="center">Amount</td>
							<td width="15%" class="admin" align="center">Duration</td>							
                            <td width="17%" class="admin" align="center">Action</td>
                          </tr>
                          <?php
						   if (isset($fineview)&&is_array($fineview))
						  {
					  $rownum = 1;	
					  foreach ($fineview as $fineview1){
					  $zibracolor = ($rownum%2==0)?"even":"odd";	
					  ?>
                          <tr class="<?php echo $zibracolor; ?>">
                         
                            <td class="narmal" align="center"><?php echo $fineview1->es_libfinefor; ?></td>
							<td class="narmal" align="center"><?php echo $fineview1->es_libfinenoofdays; ?></td>
							<td class="narmal" align="center"><?php echo $fineview1->es_libfineamount; ?></td>
							<td class="narmal" align="center"><?php echo $fineview1->es_libfineduration."&nbsp;Day(s)"; ?></td>
							<td class="narmal" align="center">
			<?php if (in_array("16_8", $admin_permissions)) {?>
            <a href=" ?pid=32&action=editfine&sid=<?php echo $fineview1->es_libfineId; ?>&start=<?php echo $start; ?>"><img src="images/b_edit.png" border="0" width="15" height="15" /></a>
            
			<?php }else{ echo "-"; }?>
			 <?php /*?><a href=" ?pid=32&action=deletefine&sid=<?php echo $fineview1->es_libfineId; ?>"><img src="images/b_drop.png"  border="0"  width="15" height="15"/></a><?php */?> </td>
                          </tr>
                          <?php
					 $rownum++;}
					 }
					 ?>
					 <tr>
<td colspan="6" align="center"><?php paginateexte($start, $q_limit, $no_rows, "&action=finedetailes&column_name=".$orderby."&asds_order=".$asds_order) ?></td>
				  </tr>
                        </table></td>
                      </tr>
                    </table>
				<?php
					}
					?>
			<?php
			if($action=='addpublisher' || $action=='editpublisher')
			{
			?>
			
			<form action="" method="post">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="left" valign="top"><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="150" height="19" align="left" valign="middle" class="wel">&nbsp;</td>
                        <td width="260" height="19" align="right" valign="top">&nbsp;</td>
                        <td height="19" align="center" valign="middle" class="wel">&nbsp;</td>
                        <td width="25" align="left" valign="top">&nbsp;</td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <?php if (in_array("16_10", $admin_permissions)) {?><td height="450" align="left" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="23" colspan="4" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td height="25" align="left" valign="middle" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Publisher / Supplier</span></td>
                          </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td height="19" colspan="4" align="right" valign="middle" class="admin"><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Note :  * denotes mandatory&nbsp;</font></td>
                      </tr>
                      <tr align="left" class="narmal">
                        <td height="10" colspan="4" valign="middle" class="admin"></td>
                      </tr>
                      <tr>
                        <td height="23" align="left" valign="middle" class="narmal">&nbsp;</td>
                        <td height="23" align="left" valign="middle" class="narmal">Publisher / Supplier</td>
                        <td align="left" valign="top" class="admin">&nbsp;</td>
                        <td align="left" valign="top" class="admin">
                        	<select name="PubOrSup">
                                <option value="active" <?php echo ($pulishercat->status=="active")?"selected":""?> >Publisher</option>
                                <option value="inactive" <?php echo ($pulishercat->status=="inactive")?"selected":""?> >Supplier</option>
                            </select></td>
                      </tr>
                      <tr align="left" class="narmal">
                        <td height="10" colspan="4" valign="middle" class="admin"></td>
                      </tr>
                      <tr>
                        <td height="23" align="left" valign="middle" class="narmal">&nbsp;</td>
                        <td height="23" align="left" valign="middle" class="narmal">Name</td>
                        <td align="left" valign="top" class="admin">&nbsp;</td>
                        <td align="left" valign="top" class="admin"><input name="publishername" type="text" id="publishername" value="<?php  if(isset($publishername)||$publishername!='') echo $publishername; ?>" />
                        <font color="#FF0000">*</font></td>
                      </tr>
                      <tr align="left" class="narmal">
                        <td height="10" colspan="4" valign="middle" class="admin"></td>
                      </tr>
					<tr>
                        <td height="23" align="left" valign="middle" class="narmal">&nbsp;</td>
                        <td height="23" align="left" valign="top" class="narmal">Address </td>
                        <td align="left" valign="top" class="admin">&nbsp;</td>
                        <td align="left" valign="top" class="admin"><textarea name="publisheradress" cols="25" rows="5" id="publisheradress"><?php  if(isset($publisheradress)||$publisheradress!='') echo $publisheradress; ?></textarea>
                          <!--<font color="#FF0000">*</font>--></td>
					  </tr>
                      <tr align="left" class="narmal">
                        <td height="10" colspan="4" valign="middle" class="admin"></td>
                      </tr>
						<tr>
                        <td height="23" align="left" valign="middle" class="narmal">&nbsp;</td>
                        <td height="23" align="left" valign="middle" class="narmal">City</td>
                        <td align="left" valign="top" class="admin">&nbsp;</td>
                        <td align="left" valign="top" class="admin"><input name="pubcity" type="text" id="pubcity" value="<?php  if(isset($pubcity)||$pubcity!='') echo $pubcity;  ?>"/>
                          <!--<font color="#FF0000">*</font>--></td>
                      </tr>
					  <tr align="left" class="narmal">
                        <td height="10" colspan="4" valign="middle" class="admin"></td>
                      </tr>
					  <tr>
                        <td height="23" align="left" valign="middle" class="narmal">&nbsp;</td>
                        <td height="23" align="left" valign="middle" class="narmal">State</td>
                        <td align="left" valign="top" class="admin">&nbsp;</td>
                        <td align="left" valign="top" class="admin"><input name="pubstate" type="text" id="pubstate" value="<?php  if(isset($pubstate)||$pubstate!='') echo $pubstate; ?>" />
                        <!--<font color="#FF0000">*</font>--></td>
                      </tr>
					  <tr align="left" class="narmal">
                        <td height="10" colspan="4" valign="middle" class="admin"></td>
                      </tr>
					  <tr>
                        <td height="23" align="left" valign="middle" class="narmal">&nbsp;</td>
                        <td height="23" align="left" valign="middle" class="narmal">Country</td>
                        <td align="left" valign="top" class="admin">&nbsp;</td>
                        <td align="left" valign="top" class="admin"><input name="pubcountry" type="text" id="pubcountry" value="<?php   if(isset($pubcountry)||$pubcountry!='') echo $pubcountry; ?>" />
                        <!--<font color="#FF0000">*</font>--></td>
                      </tr>
					  <tr align="left" class="narmal">
                        <td height="10" colspan="4" valign="middle" class="admin"></td>
                      </tr>
					  <tr>
                        <td height="23" align="left" valign="middle" class="narmal">&nbsp;</td>
                        <td height="23" align="left" valign="middle" class="narmal">Phone No</td>
                        <td align="left" valign="top" class="admin">&nbsp;</td>
                        <td align="left" valign="top" class="admin"><input name="pubphoneno" type="text" id="pubphoneno" value="<?php   if(isset($pubphoneno)||$pubphoneno!='') echo $pubphoneno; ?>" />
                        <!--<font color="#FF0000">*</font>--></td>
                      </tr>
					  <tr align="left" class="narmal">
                        <td height="10" colspan="4" valign="middle" class="admin"></td>
                      </tr>
					  <tr>
                        <td height="23" align="left" valign="middle" class="narmal">&nbsp;</td>
                        <td height="23" align="left" valign="middle" class="narmal">Mobile No.</td>
                        <td align="left" valign="top" class="admin">&nbsp;</td>
                        <td align="left" valign="top" class="admin"><input name="pubmobileno" type="text" id="pubmobileno" value="<?php   if(isset($pubmobileno)||$pubmobileno!='') echo $pubmobileno; ?>" />
                        <!--<font color="#FF0000">*</font>--></td>
                      </tr>
					  <tr align="left" class="narmal">
                        <td height="10" colspan="4" valign="middle" class="admin"></td>
                      </tr>
					  <tr>
                        <td height="23" align="left" valign="middle" class="narmal">&nbsp;</td>
                        <td height="23" align="left" valign="middle" class="narmal">Fax</td>
                        <td align="left" valign="top" class="admin">&nbsp;</td>
                        <td align="left" valign="top" class="admin"><input name="pubfax" type="text" id="pubfax" value="<?php   if(isset($pubfax)||$pubfax!='') echo $pubfax; ?>" />
                        <!--<font color="#FF0000">*</font>--></td>
                      </tr>
					  <tr align="left" class="narmal">
                        <td height="10" colspan="4" valign="middle" class="admin"></td>
                      </tr>
					  <tr>
                        <td height="23" align="left" valign="middle" class="narmal">&nbsp;</td>
                        <td height="23" align="left" valign="middle" class="narmal">Email</td>
                        <td align="left" valign="top" class="admin">&nbsp;</td>
                        <td align="left" valign="top" class="admin"><input name="pubemail" type="text" id="pubemail" value="<?php   if(isset($pubemail)||$pubemail!='') echo $pubemail; ?>" />
                        <!--<font color="#FF0000">*</font>--></td>
                      </tr>
					  <tr align="left" class="narmal">
                        <td height="10" colspan="4" valign="middle" class="admin"></td>
                      </tr>
					  <tr>
                        <td height="23" align="left" valign="middle" class="narmal">&nbsp;</td>
                        <td height="23" align="left" valign="top" class="narmal">Additional Information </td>
                        <td align="left" valign="top" class="admin">&nbsp;</td>
                        <td align="left" valign="top" class="admin"><textarea name="pubaditinalinfo" cols="25" rows="5" id="pubaditinalinfo"><?php   if(isset($pubaditinalinfo)||$pubaditinalinfo!='') echo $pubaditinalinfo;?></textarea>
                        <!--<font color="#FF0000">*</font>--></td>
                      </tr>
					  <tr>
                        <td height="10" colspan="4" align="right" valign="middle" class="admin"></td>
                      </tr>
					   <tr>
                        <td height="23" colspan="2" align="right" valign="middle" class="admin">&nbsp;</td>
                        <td align="left" valign="top" class="admin">&nbsp;</td>
                        <td align="left" valign="top" class="admin">
						<?php
						if($action=='addpublisher')
						{
						?>
						 <input name="publisheradd" type="submit" class="bgcolor_02" id="publisheradd" value="Submit" style="cursor:pointer;"/>
						 <?php }else{?>
						 <input name="publisherupdate" type="submit" class="bgcolor_02" id="publisheradd" value="Update" style="cursor:pointer;"/>
						 <?php } ?>
						 
                         </td>
                      </tr>
                    </table>
                     
                     
                    <table width="552" border="0" align="center" cellpadding="0" cellspacing="0">
                    </table></td><?php }?>
                  </tr>
              </table>
			</form>
				<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td><table width="100%" border="0" cellspacing="0" cellpadding="1" class="tbl_grid" align="center">
                          
                          <tr class="bgcolor_02">
                            <td width="10%" class="admin" align="center">S&nbsp;No</td>
                            <td width="15%" class="admin" align="center">Publisher / Supplier</td>
                            <td width="15%" class="admin" align="center">Name</td>
                            <td width="12%" class="admin" align="center">City</td>
							<td width="12%" class="admin" align="center">State</td>
							<td width="12%" class="admin" align="center">Mobile</td>	
							<td width="12%" class="admin" align="center">Email</td>						
                            <td width="12%" class="admin" align="center">Action</td>
                          </tr>
                          <?php
						  if (isset($publisherview)&&is_array($publisherview))
						  {
					  $rownum = 1;	
					  foreach ($publisherview as $publisherview1){
					  $zibracolor = ($rownum%2==0)?"even":"odd";	
					  ?>
                          <tr class="<?php echo $zibracolor; ?>">
                            <td class="narmal" align="center"><?php echo $rownum; ?></td>
                            <td class="narmal" align="center"><?php if($publisherview1->status=="active") echo "Publisher"; else echo "Supplier"; ?></td>
                            <td class="narmal" align="center"><?php echo $publisherview1->library_publishername; ?></td>
							<td class="narmal" align="center"><?php echo $publisherview1->library_city; ?></td>
							<td class="narmal" align="center"><?php echo $publisherview1->libaray_state; ?></td>
							<td class="narmal" align="center"><?php echo $publisherview1->librray_mobileno; ?></td>
							<td class="narmal" align="center"><?php echo $publisherview1->libarary_email; ?></td>
							<td class="narmal" align="center">
			<?php if (in_array("16_11", $admin_permissions)) {?><a href="?pid=32&action=editpublisher&sid=<?php echo $publisherview1->es_libaraypublisherId; ?>&start=<?php echo $start; ?>"><img src="images/b_edit.png" border="0" width="15" height="15" /></a><?php }else{ echo "-"; }?>
			 <?php if (in_array("16_12", $admin_permissions)) {?><a href="?pid=32&action=deletepublisher&sid=<?php echo $publisherview1->es_libaraypublisherId; ?>" onclick="return confirm('Are you sure you want to  delete?')"><img src="images/b_drop.png"  border="0"  width="15" height="15"/></a> <?php }else{ echo "-"; }?></td>
                          </tr>
                          <?php
					 $rownum++;}
					 }
					 ?>
					 <tr>
<td colspan="8" align="center"><?php paginateexte($start, $q_limit, $no_rows, "&action=addpublisher&column_name=".$orderby."&asds_order=".$asds_order) ?></td>
				  </tr>
				  <tr>
<td colspan="8" align="right"><?php 
if(count($publisherview)>=1){
if (in_array("16_103", $admin_permissions)) {?><input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=32&action=print_list_publishers<?php echo $PageUrl;?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /><?php }}?></td>
				  </tr>
                        </table></td>
                      </tr>
            </table>
				<?php
				}
				?>	
		<?php
		if($action=='bookissueforstudent' || $action=='bookissueforstudent1' || $action=='bookissueforstudent12')
		{
		?>
		
		<form action="?pid=32&action=bookissueforstudent1&sid=<?php echo $sid; ?>&serid=" method="post" name="bookissue">
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="23" colspan="5" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr><td>&nbsp;</td></tr>
                        <tr>
                          <td height="25" align="left" valign="middle" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Issue /Return Books (Student)</span></td>
                        </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td height="10" colspan="5" align="left" valign="top"></td>
                  </tr>
                  <tr>
                    <td colspan="5" align="left" valign="top">&nbsp;<strong>Note :</strong> Make sure you first create Fine details for Student under Master Records - Library Fine</td>
                  </tr>
                  <tr>
                    <td height="10" colspan="5" align="left" valign="top"></td>
                  </tr>
                  <tr>
                    <td colspan="5" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="140" height="25" align="left" valign="middle" class="narmal"><p> &nbsp;Registration No</p></td>
                                <td colspan="4" align="left" valign="middle" class="narmal">
								<input type="text" name="serchstudentid" id="serchstudentid"  onblur="changecase(this);return false;"  value="<?php if(isset($serid) && $serid!='') echo $serid; ?>"/>
                                  (Enter the first numerics of Registration No to get the list in sorted order below)</td>
                              </tr>
							<tr>
                                <td width="140" height="25" align="left" valign="middle" class="narmal"><p> &nbsp;Registration No</p></td>
                                <td width="148" align="left" valign="middle" class="narmal">
								    <select name="studentid" style="width:150px" onchange="goto_URL(this.form.studentid);"  >
									<option value=" ?pid=32&action=bookissueforstudent">Select</option>
									<?php foreach ($es_staffview as $eachrecord45){ ?>
			<option value=" ?pid=32&action=bookissueforstudent1&sid=<?php echo $eachrecord45['es_preadmissionid']; ?>&serid=<?php echo $serid; ?>" <?php echo ($eachrecord45['es_preadmissionid']==$sid)?"selected":""?>><?php echo $eachrecord45['es_preadmissionid']; ?></option>
									<?php }?>
									</select></td>
                                <td width="10" align="left" valign="middle" class="narmal">&nbsp;</td>
                                <td colspan="2" align="left" valign="middle" class="narmal">&nbsp;</td>
                            </tr>
                              <tr>
                                <td height="25" align="left" valign="middle" class="narmal">&nbsp;Student Name</td>
                                <td height="25" align="left" valign="middle" class="narmal"><input type="text" name="istdbook" value="<?php echo $bookstudentview['pre_name']; ?>" readonly="readonly" /></td>
                                <td align="left" valign="middle" class="narmal">&nbsp;</td>
                                <td width="137" align="left" valign="middle" class="narmal">&nbsp;</td>
                                <td width="117" align="left" valign="middle" class="narmal">&nbsp;</td>
                              </tr>
                              <tr>
                                <td height="25" align="left" valign="middle" class="narmal">&nbsp;Class </td>
						<td height="25" align="left" valign="middle" class="narmal"><input type="text" name="istclass"  value="<?php echo classname($bookstudentview['pre_class']); ?>" readonly="readonly"/></td>
                                <td align="left" valign="middle" class="narmal">&nbsp;</td>
                                <td align="left" valign="middle" class="narmal">&nbsp;</td>
                                <td align="left" valign="middle" class="narmal">&nbsp;</td>
                              </tr>
                              <tr>
                                <td height="25" align="left" valign="middle" class="narmal" >&nbsp;Category </td>
                                <td height="25" align="left" valign="middle" class="narmal" ><select name="es_categorylibraryid" onchange=" getsubjects(this.value,'')">                               <option value="">-- Select --</option>
								<?php 
								$sel_category = "SELECT  * FROM `es_categorylibrary` WHERE `status`='active'";
                                $cat_det = $db->getrows($sel_category);
								if(count($cat_det)>=1){
								foreach($cat_det as $each){
								?>
								<option value="<?php echo $each['es_categorylibraryid']; ?>" <?php if($es_categorylibraryid==$each['es_categorylibraryid']){echo"selected='selected'";}?>><?php echo $each['lb_categoryname']; ?></option><?php }}?>
								
								</select></td>
                                <td align="left" valign="middle" class="narmal">&nbsp;</td>
                                <td align="left" valign="middle" class="narmal">&nbsp;</td>
                                <td align="left" valign="middle" class="narmal">&nbsp;</td>
                              </tr>
							  <tr>
                                <td height="25" align="left" valign="middle" class="narmal" >&nbsp;Subcategory </td>
                                <td height="25" align="left" valign="middle" class="narmal" id="subcatbox"><select name="subjectid"  >
								<option value="">- Select -</option>
								</select>
                 
				  <?php if($es_categorylibraryid!=""){ ?>
                              <script type="text/javascript">
							  getsubjects('<?php echo $es_categorylibraryid; ?>','<?php echo $subbookcatid; ?>')
							  </script>
                              
                              
                              <?php } ?></td>
                                <td align="left" valign="middle" class="narmal">&nbsp;</td>
                                <td align="left" valign="middle" class="narmal">&nbsp;</td>
                                <td align="left" valign="middle" class="narmal">&nbsp;</td>
                              </tr>
							  
                              <tr>
                                <td height="25" align="left" valign="middle" class="narmal">&nbsp;</td>
                                <td height="25" colspan="3" align="left" valign="middle" class="narmal"><input name="Submit42" type="submit" class="bgcolor_02" value="Submit" />
                                   <!-- <input name="Submit43" type="submit" class="bgcolor_02" value="Cancel" />--></td>
                                <td align="left" valign="middle" class="narmal">&nbsp;</td>
                              </tr>
							  <tr>
							  <td>&nbsp;</td>
							  </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td align="right" valign="top">
						  <?php
						  if($action=='bookissueforstudent1' || $action=='bookissueforstudent12' )
						  {
						  if($countbook!=0)
						  {
						  ?>
						  
						  
						  <table width="100%" border="1" cellspacing="0" cellpadding="1" class="tbl_grid">
                              <tr>
                                <td height="25" align="center" class="bgcolor_02"><strong>&nbsp;S.No</strong></td>
                                <td align="center" class="bgcolor_02"><strong>&nbsp;&nbsp;Book No </strong></td>
                                <td align="center" class="bgcolor_02"><strong>Title</strong></td>
								  
                                <td align="center" class="bgcolor_02"><strong>Author</strong></td>
                                <td align="center" class="bgcolor_02"><strong>Issue&nbsp;Date </strong></td>
                                <td align="center" class="bgcolor_02"><strong>Return&nbsp;Date</strong></td>
                                <td align="center" class="bgcolor_02"><strong>Fine&nbsp;Amount</strong></td>
                                <td align="center" class="bgcolor_02"><strong>Action</strong></td>
                              </tr>
							  <?php
							  $rownum = 1;	
					          foreach ($es_givenbook as $es_givenbook1){
					          $zibracolor = ($rownum%2==0)?"even":"odd";
							  $bookissuedvarginalid=$es_givenbook1->es_bookissueId;
							  $bookid=$es_givenbook1->bki_bookid;
							  
							  $bookdetailes = $es_libbook ->Get($bookid);
							  $orderby = "es_libfineid 	";
							  $order='DESC';
							  $q_limit1  = 10;
	                         if ( !isset($start) ){
		                      $start = 0;
	                            }	
							  
								$fineview =$es_fine ->GetList(array(array("status", "=", active),array("es_libfinefor", "=", student)),$orderby,$order," $start, $q_limit1 ");
                              if(count($fineview)>0)
							 {
							  foreach ($fineview as $fineview1)
							  {
							  $durationdays=$fineview1->es_libfinenoofdays;
							  $fineamount=$fineview1->es_libfineamount;
							  $finedurationdays=$fineview1->es_libfineduration; 	
							  }						
						   $issuedate=$es_givenbook1->issuedate;
							  $issuedate1=explode("-", $issuedate);
							  $issuedate11=$issuedate1[2]+$durationdays;
							  $returndate=date("Y-m-d", mktime(0,0,0,$issuedate1[1],$issuedate11,$issuedate1[0]));
							   $currdate=date("Y-m-d");
							   $totalsec = strtotime($returndate) - strtotime($currdate);
                               if ($totalsec <= 86400) {
                              $ret['days'] = floor($totalsec/86400);
                               $totalsec = $totalsec % 86400;
                                      }
									  else
									  {
									  $ret['days']='-0';
									  }
							 $finecountdays=explode("-",$ret['days']);
							$calculatefine=$finecountdays[1]/ $finedurationdays;
							if($calculatefine>0)
							{
							$calculatefine1=$calculatefine+1;
							$calculatefine2=explode(".",$calculatefine1);
							$fineamount1=$calculatefine2[0]*$fineamount;
							
							}
							else
							{
							$fineamount1=0;
							}
							 }
							 
							  ?>
                              <tr class="<?php echo $zibracolor; ?>">
                                <td height="25" align="center" class="narmal"><input name="textfield32243" type="text" size="5" readonly="readonly" value="<?php echo $rownum ; ?>" /></td>
                                <td align="center" class="narmal">
				                <input name="textfield32242" type="text" size="7" value="<?php echo $bookdetailes->lbook_aceesnofrom; ?>" readonly="readonly" />								</td>
                                <td align="center" class="narmal">
		                        <input name="textfield322422" type="text" size="7" value="<?php echo $bookdetailes->lbook_title; ?>" readonly="readonly" />		                        </td>
							
                                <td align="center" class="narmal">
			                    <input name="textfield3224222" type="text" size="7" value="<?php echo $bookdetailes->lbook_author; ?>" readonly="readonly"  />			                    </td>
                                <td align="center" class="narmal">
						        <input name="textfield3224223" type="text" size="7" readonly="readonly" value="<?php echo formatDBDateTOCalender($es_givenbook1->issuedate); ?>"/>						        </td>
                                <td align="center" class="narmal">
								<input name="returndate" type="text" size="7" readonly="readonly" value="<?php if($returndate>0) echo formatDBDateTOCalender($returndate); else echo ""; ?>"/>								</td>
                                <td align="center" class="narmal">
								<input name="textfield3224225" type="text" size="7" value="<?php echo $fineamount1; ?>" readonly="readonly" />								</td>
                                <td align="center" class="narmal"><?php if (in_array("16_18", $admin_permissions)) {?><strong>
								<?php /*?><a href=" ?pid=32&action=reissue&sid=<?php echo $sid;?>&bwid=<?php echo $bookissuedvarginalid;?>&fineamountcal=<?php echo $fineamount1; ?>">Re-issue</a>/ <?php */?>
								<a href=" ?pid=32&action=return&sid=<?php echo $sid;?>&bwid=<?php echo $bookissuedvarginalid;?>&fineamountcal=<?php echo $fineamount1; ?>&bid=<?php echo $bookid;?>">Return</a></strong><?php }else{ echo "-"; }?></td>
                              </tr>
							  <?php
							  $rownum++;}
							  ?>
                          </table>
						  <?php
						  }
						  }
						  ?>						  
						  </td>
                        </tr>
                    </table></td>
                  </tr>
				  <tr>
				  <td>&nbsp;</td>
				  </tr>
                  <?php /*?><tr>
                    <td height="25" colspan="5" align="left" valign="middle" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Search</span></td>
                  </tr>
				  
                  <tr>
                    <td width="42%" height="25" align="left" valign="middle" class="narmal">&nbsp;Book Name : 
                      <input name="serchbookname" type="text" id="serchbookname" value="<?php if(isset($serchbookname)&& $serchbookname!='') echo $serchbookname; ?>" /></td>
                    <td width="12%" align="left" valign="middle" class="narmal">Author:</td>
                    <td width="29%" align="left" valign="middle" class="narmal"><span class="narmal">
                      <input name="serchauthor" type="text" id="serchauthor" value="<?php if(isset($serchauthor)&& $serchauthor!='') echo $serchauthor; ?>" />
                    </span></td>
                   <td width="17%" height="30" align="left" valign="middle" class="narmal"><input name="bookserchstudent" type="submit" class="bgcolor_02" id="bookserchstudent" value="Search" style="cursor:pointer;"/></td>
                  </tr><?php */?>
                  <tr>
                    <td colspan="5" align="left" valign="middle"><table width="100%" border="1" cellspacing="0" cellpadding="1" class="tbl_grid">
					<?php
					  //if(isset($bookserchstudent)|| $action=='bookissueforstudent12')
					  //{
					  ?>
                      <tr>
                        <td width="5%" height="25" align="center" class="bgcolor_02"><strong>&nbsp;S.No</strong></td>
                     
                        <td width="10%" align="center" class="bgcolor_02"><strong> &nbsp;Accession&nbsp;No </strong></td>
                        <td width="18%" align="center" class="bgcolor_02"><strong> &nbsp;&nbsp;&nbsp;Title&nbsp;&nbsp; </strong></td>
					  <?php /*?>  <td width="14%" align="center" class="bgcolor_02"><strong> &nbsp;&nbsp;&nbsp;Subject&nbsp;&nbsp; </strong></td><?php */?>
						<td width="17%" align="center" class="bgcolor_02"><strong> &nbsp;&nbsp;&nbsp;Category <br /> [ Subcategory ]&nbsp;&nbsp; </strong></td>
                        <td width="16%" align="center" class="bgcolor_02"><strong>&nbsp;Author </strong></td>
                        <td width="20%" align="center" class="bgcolor_02"><strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Action</strong></td>
                      </tr>
					  <?php
					  $alexist=0;
					  //echo count($es_bookList);
					   if(count($es_bookList)>0){
					  $rownum = $start+1;	
					  foreach ($es_bookList as $es_bookList1){
					  $sql="select * from es_book_reservation where book_id=". $es_bookList1->lbook_aceesnofrom ." and expired_on >='".date("Y-m-d")."' AND status='active'";
						$num=sqlnumber($sql);
					  $zibracolor = ($rownum%2==0)?"even":"odd";
					  ?>
                      <tr>
                        <td height="25" class="narmal"><?php echo $rownum; ?></td>
                        <td class="narmal"><?php echo $es_bookList1->lbook_aceesnofrom; ?></td>
                        <td class="narmal"><?php echo $es_bookList1->lbook_title; ?></td>
						<?php /*?><td class="narmal"><?php echo $es_bookList1->lbook_booksubject; ?></td><?php */?>
						<td class="narmal"><?php echo libcategoryname($es_bookList1->lbook_category); if($es_bookList1->lbook_booksubcategory!=""){?><br />
						[ <?php echo libsubctegoryname($es_bookList1->lbook_booksubcategory);  ?> ]<?php }?></td>
						<td class="narmal"><?php echo $es_bookList1->lbook_author; ?></td>
                        <td align="left" valign="middle" class="narmal"><strong>
						<?php
						if($sid!='')
						{
						
						$select_is="select lbook_title ,lbook_author from es_libbook where es_libbookid=".$es_bookList1->es_libbookId;
						
						
						$res=$db->getrow($select_is);
						
						
						$select_isued="select * from es_bookissue  where  bki_id=".$sid." and issuetype='student' and status='active'";
						
						$res_issued=$db->getrows($select_isued);
						if(count($res_issued)>0){
						
						foreach($res_issued as $eachissue){
						$eas="select lbook_title ,lbook_author from es_libbook where es_libbookid=".$eachissue['bki_bookid'];
						$test=$db->getrow($eas);
						
						if($res['lbook_title']==$test['lbook_title'] || $res['lbook_author']== $test['lbook_author'] ){
						$alexist++;
						$nm=$test['lbook_title'];
						$au=$test['lbook_author'];
						}
						}
						}
						
						
						
						?>
						
						<?php  
							if (in_array("16_17", $admin_permissions)) {					
						
						if ($alexist>0 && $res['lbook_title']==$test['lbook_title'] ){?>
					
						<a href="?pid=32&action=issuelibrary&sid=<?php echo $sid;?>&bid=<?php echo $es_bookList1->es_libbookId; ?>&serchbookname=<?php echo $serchbookname; ?>&serchauthor=<?php echo $serchauthor; ?> "  style="color:#52CF62; font-size:12px; font-weight:bold; text-decoration:none; text-decoration:none;" onclick="return confirm('Title: <?php echo $nm ;?> Author: <?php echo $au ;?> has already been issued to this person. Are you sure to issue again?')">Issue</a>
						
						<?php } else{ ?> <a href="?pid=32&action=issuelibrary&sid=<?php echo $sid;?>&bid=<?php echo $es_bookList1->es_libbookId; ?>&serchbookname=<?php echo $serchbookname; ?>&serchauthor=<?php echo $serchauthor; ?> "  style="color:#52CF62; font-size:12px; font-weight:bold; text-decoration:none; text-decoration:none;" onclick="return confirm('Are you sure you want to issue this book?')">Issue</a> <?php }?><?php }else{ echo "-"; }?>
						
						
						&nbsp;<?php  if($es_bookList1->issuestatus=='notissued' && $num>0) { ?><a onclick="newWindowOpen('?pid=32&action=viewreserved_details&bid=<?php echo $es_bookList1->es_libbookId; ?>');"  style="cursor:pointer;">&nbsp;&nbsp;<span style='color:#FF0000; font-size:12px; font-weight:bold;'>Reserved</span></a>
					
					 <?php } ?>
					 
						<?php
						}
						?>
						</strong></td>
                      </tr>
					  <?php
					 $rownum++;  }
					 
					  ?>
					   <tr>
					<td colspan="7" align="center"><?php 
					if($Submit42=="Submit"){$Url ="&Submit42=Submit";
					if($es_categorylibraryid>=1){$Url .= "&es_categorylibraryid=".$es_categorylibraryid."";}
					if($subbookcatid>=1){$Url .= "subbookcatid=".$subbookcatid."";}
					}
					paginateexte($start, $q_limit, $no_rowsbooks, "action=$action&column_name=".$orderby."&asds_order=".$asds_order."&serchbookname=".$serchbookname."&serchauthor=".$serchauthor."&bookserchstudent=".$bookserchstudent."&sid=".$sid.$Url) ?></td>
				</tr><?php }else{?>
				<td colspan="7" align="center" class="admin"> No Books Found</td>
				</tr>
				<?php }?>
                     </table></td>
              </tr>
            </table>
			</form>
				<?php
				}
				?>	
		<?php
		if($action=='bookissueforstaff' || $action=='bookissueforstaff1' || $action=='bookissueforstaff12')
		{
		
		?>		
		<script type="text/javascript">
			function newWindowOpen (href) {
					window.open(href,null,'width=350,height=200,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30' );
			}
		</script>
				<form action="" method="post">
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="23" colspan="5" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
					<td>&nbsp;</td>
					</tr>
                      <tr>
                        <td height="25" align="left" valign="middle" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Issue / Return Books (Staff)</span></td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td height="10" colspan="5" align="left" valign="top"></td>
                  </tr>
                  <tr>
                    <td colspan="5" align="left" valign="top">&nbsp;<strong>Note :</strong> Make sure you first create Fine details for Staff under Master Records - Library Fine</td>
                  </tr>
                  <tr>
                    <td height="10" colspan="5" align="left" valign="top"></td>
                  </tr>
                  <tr>
                    <td colspan="5" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
						 <tr>
                                <td width="140" height="25" align="left" valign="middle" class="narmal"><p> &nbsp;Employee Id</p></td>
                              <td colspan="4" align="left" valign="middle" class="narmal"><input type="text" name="serchstudentid" id="serchstudentid"  onblur="changecase1(this);return false;"  value="<?php if(isset($serid) && $serid!='') echo $serid; ?>"/>
                                (Enter the first numerics of Employee ID to get the list in sorted order below)</td>
                            </tr>
						
                          <tr>
                            <td width="140" height="25" align="left" valign="middle" class="narmal"><p>&nbsp;Employee Id</p></td>
                            <td width="148" align="left" valign="middle" class="narmal">
							        <select name="staffid" style="width:150px" onchange="goto_URL(this.form.staffid);"  >
									<option value=" ?pid=32&action=bookissueforstaff1">Select</option>
									<?php foreach ($es_staffview as $eachrecord2){ ?>
			<option value=" ?pid=32&action=bookissueforstaff1&sid=<?php echo $eachrecord2->es_staffId; ?>&serid=<?php echo $serid;?>" <?php echo ($eachrecord2->es_staffId==$sid)?"selected":""?>><?php echo $eachrecord2->es_staffId; ?></option>
									<?php }?>
								</select></td>
                            <td width="10" align="left" valign="middle" class="narmal">&nbsp;</td>
                            <td colspan="2" align="left" valign="middle" class="narmal">&nbsp;</td>
                          </tr>
                          <tr>
                            <td height="25" align="left" valign="middle" class="narmal">&nbsp;Employee Name</td>
                            <td height="25" align="left" valign="middle" class="narmal"><input type="text" name="textfield3" value="<?php echo $staffview->st_firstname."&nbsp;".$staffview->st_lastname;?>" readonly="readonly" /></td>
                            <td align="left" valign="middle" class="narmal">&nbsp;</td>
                            <td width="137" align="left" valign="middle" class="narmal">&nbsp;</td>
                            <td width="117" align="left" valign="middle" class="narmal">&nbsp;</td>
                          </tr>
                       <tr>
                            <td height="25" align="left" valign="middle" class="narmal">&nbsp;Designation </td>
                            <td height="25" align="left" valign="middle" class="narmal"><input type="text" name="textfield32" value="<?php echo postname($staffview->st_post); ?>" readonly="readonly"   /></td>
                            <td align="left" valign="middle" class="narmal">&nbsp;</td>
                            <td align="left" valign="middle" class="narmal">&nbsp;</td>
                            <td align="left" valign="middle" class="narmal">&nbsp;</td>
                          </tr>
                          <tr>
                            <td height="25" align="left" valign="middle" class="narmal">&nbsp;Department</td>
                            <td height="25" align="left" valign="middle" class="narmal"><input type="text" name="textfield322" value="<?php echo deptname($staffview->st_department);?>"  readonly="readonly"/></td>
                            <td align="left" valign="middle" class="narmal">&nbsp;</td>
                            <td align="left" valign="middle" class="narmal">&nbsp;</td>
                            <td align="left" valign="middle" class="narmal">&nbsp;</td>
                          </tr>
                           <tr>
                                <td height="25" align="left" valign="middle" class="narmal" >&nbsp;Category </td>
                                <td height="25" align="left" valign="middle" class="narmal" ><select name="es_categorylibraryid" onchange="getsubjects(this.value,'')">                               <option value="">-- Select --</option>
								<?php 
								$sel_category = "SELECT  * FROM `es_categorylibrary` WHERE `status`='active'";
                                $cat_det = $db->getrows($sel_category);
								if(count($cat_det)>=1){
								foreach($cat_det as $each){
								?>
								<option value="<?php echo $each['es_categorylibraryid']; ?>" <?php if($es_categorylibraryid==$each['es_categorylibraryid']){echo"selected='selected'";}?>><?php echo $each['lb_categoryname']; ?></option><?php }}?>
								
								</select></td>
                                <td align="left" valign="middle" class="narmal">&nbsp;</td>
                                <td align="left" valign="middle" class="narmal">&nbsp;</td>
                                <td align="left" valign="middle" class="narmal">&nbsp;</td>
                              </tr>
							  <tr>
                                <td height="25" align="left" valign="middle" class="narmal" >&nbsp;Subcategory </td>
                                <td height="25" align="left" valign="middle" class="narmal" id="subcatbox"><select name="subjectid"  ><option value="">- Select -</option></select> 
                 
				  <?php if($es_categorylibraryid!=""){ ?>
                              <script type="text/javascript">
							  getsubjects('<?php echo $es_categorylibraryid; ?>','<?php echo $subbookcatid; ?>')
							  </script>
                              
                              
                              <?php } ?></td>
                                <td align="left" valign="middle" class="narmal">&nbsp;</td>
                                <td align="left" valign="middle" class="narmal">&nbsp;</td>
                                <td align="left" valign="middle" class="narmal">&nbsp;</td>
                              </tr>
							  
                              <tr>
                                <td height="25" align="left" valign="middle" class="narmal">&nbsp;</td>
                                <td height="25" colspan="3" align="left" valign="middle" class="narmal"><input name="Submit42" type="submit" class="bgcolor_02" value="Submit" />
                                   <!-- <input name="Submit43" type="submit" class="bgcolor_02" value="Cancel" />--></td>
                                <td align="left" valign="middle" class="narmal">&nbsp;</td>
                              </tr>
						  <tr>
						  <td>&nbsp;</td>
						  </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td align="right" valign="top">
						<?php
						  if($action=='bookissueforstaff1' || $action=='bookissueforstaff12' )
						  {
						  if($countbook!=0)
						  {
						  ?>
						
						<table width="100%" border="1" cellspacing="0" cellpadding="1" class="tbl_grid">
                              <tr>
                                <td width="6%" height="25" align="left" class="bgcolor_02"><strong>&nbsp;S.No</strong></td>
                                <td width="16%" align="left" class="bgcolor_02"><strong>&nbsp;Accession&nbsp;No </strong></td>
                                <td width="7%" align="left" class="bgcolor_02"><strong>Title</strong></td>
								  
                                <td width="8%" align="left" class="bgcolor_02"><strong>Author</strong></td>
                                <td width="12%" align="left" class="bgcolor_02"><strong>Issue&nbsp;Date </strong></td>
                                <td width="13%" align="left" class="bgcolor_02"><strong>Return&nbsp;Date</strong></td>
                                <td width="10%" align="left" class="bgcolor_02"><strong>Fine&nbsp;Amount</strong></td>
                                <td width="20%" align="left" class="bgcolor_02"><strong>Action</strong></td>
                              </tr>
							  <?php
							  $rownum = 1;	
					         foreach ($es_givenbook as $es_givenbook1){
					         $zibracolor = ($rownum%2==0)?"even":"odd";
							  $bookissuedvarginalid=$es_givenbook1->es_bookissueId;
							  $bookid=$es_givenbook1->bki_bookid;
							  
							  $bookdetailes = $es_libbook ->Get($bookid);
							  $orderby = "es_libfineid 	";
							  $order='DESC';
							  
							$fineview =$es_fine ->GetList(array(array("status", "=", active),array("es_libfinefor", "=", staff)),$orderby,$order);
                             if(count($fineview)>0)
							 {
							  foreach ($fineview as $fineview1)
							  {
							  $durationdays=$fineview1->es_libfinenoofdays;
							  $fineamount=$fineview1->es_libfineamount;
							  $finedurationdays=$fineview1->es_libfineduration; 	
							  }						
						   $issuedate=$es_givenbook1->issuedate;
							  $issuedate1=explode("-", $issuedate);
							  $issuedate11=$issuedate1[2]+$durationdays;
							  $returndate=date("Y-m-d", mktime(0,0,0,$issuedate1[1],$issuedate11,$issuedate1[0]));
							   $currdate=date("Y-m-d");
							   $totalsec = strtotime($returndate) - strtotime($currdate);
                               if ($totalsec <= 86400) {
                               $ret['days'] = floor($totalsec/86400);
                               $totalsec = $totalsec % 86400;
                                      }
									  else
									  {
									  $ret['days']='-0';
									  }
							$finecountdays=explode("-",$ret['days']);
							$calculatefine=$finecountdays[1]/ $finedurationdays;
							if($calculatefine>0)
							{
							$calculatefine1=$calculatefine+1;
							$calculatefine2=explode(".",$calculatefine1);
							$fineamount1=$calculatefine2[0]*$fineamount;
							
							}
							else
							{
							$fineamount1=0;
							}
							 }
							 
							  ?>
                              <tr class="<?php echo $zibracolor; ?>">
                                <td height="25" align="center" class="narmal"><input name="textfield3224" type="text" readonly="readonly" size="5" value="<?php echo $rownum ; ?>" /></td>
                <td align="center" class="narmal"><input name="textfield32242" type="text" size="7" readonly="readonly" value="<?php echo $bookdetailes->lbook_aceesnofrom; ?>" /></td>
           <td align="center" class="narmal"><input name="textfield322422" type="text" size="7" readonly="readonly" value="<?php echo $bookdetailes->lbook_title; ?>" /></td>
		  
             <td align="center" class="narmal"><input name="textfield3224222" type="text" size="7" readonly="readonly" value="<?php echo $bookdetailes->lbook_author; ?>"  /></td>
                          <td align="center" class="narmal"><input name="textfield3224223" type="text" size="7" readonly="readonly" value="<?php echo formatDBDateTOCalender($es_givenbook1->issuedate); ?>"/></td>
                                <td align="center" class="narmal"><input name="returndate" type="text" size="7" readonly="readonly" value="<?php if($returndate>0) echo formatDBDateTOCalender($returndate); else echo ""; ?>"/></td>
                                <td align="center" class="narmal"><input name="textfield3224225" type="text" size="7" value="<?php echo $fineamount1; ?>" readonly="readonly" /></td>
                                <td align="center" class="narmal"><?php if (in_array("16_21", $admin_permissions)) {?><strong><?php /*?><a href=" ?pid=32&action=reissuestaff&sid=<?php echo $sid;?>&bwid=<?php echo $bookissuedvarginalid;?>&fineamountcal=<?php echo $fineamount1; ?>">Re-issue</a>/ <?php */?><a href=" ?pid=32&action=returnstaff&sid=<?php echo $sid;?>&bwid=<?php echo $bookissuedvarginalid;?>&fineamountcal=<?php echo $fineamount1; ?>&bid=<?php echo $bookid;?>">Return</a></strong><?php }else{ echo "-"; }?></td>
                              </tr>
							  <?php
							  $rownum++;}
							  ?>
                              
                          </table>
						   <?php
						  }
						  }
						  ?>	
						  
					    </td>
                      </tr>
                    </table></td>
                  </tr>
				  <tr>
				  <td>&nbsp;</td>
				  </tr>
                  <?php /*?><tr>
                    <td height="25" colspan="5" align="left" valign="middle" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Search</span></td>
                  </tr>
                  <tr>
                    <td width="42%" height="25" align="left" valign="middle" class="narmal">&nbsp;Book Name : 
                <input name="serchbookname" type="text" id="serchbookname" value="<?php if(isset($serchbookname)&& $serchbookname!='') echo $serchbookname; ?>" /></td>
                    <td width="12%" align="left" valign="middle" class="narmal">Author:</td>
                    <td width="29%" align="left" valign="middle" class="narmal"><span class="narmal">
                      <input name="serchauthor" type="text" id="serchauthor" value="<?php if(isset($serchauthor)&& $serchauthor!='') echo $serchauthor; ?>" />
                    </span></td>
                   <td width="17%" height="30" align="left" valign="middle" class="narmal"><input name="bookserchstaff" type="submit" class="bgcolor_02" id="bookserchstudent" value="Search" style="cursor:pointer;"/></td>
                  </tr><?php */?>
                  <tr>
                    <td colspan="5" align="left" valign="middle"><table width="100%" border="1" cellspacing="0" cellpadding="1" class="tbl_grid">
					<?php
					//if(isset($bookserchstaff))
					//{
					?>
                      <tr>
                        <td width="6%" height="25" align="center" class="bgcolor_02"><strong>&nbsp;S.No</strong></td>
                       
                        <td width="12%" align="center" class="bgcolor_02"><strong> &nbsp;Accession &nbsp;No </strong></td>
                        <td width="23%" align="center" class="bgcolor_02"><strong> &nbsp;&nbsp;&nbsp;Title&nbsp;&nbsp; </strong></td>
					
						 <td width="17%" align="center" class="bgcolor_02"><strong> &nbsp;&nbsp;&nbsp;Category <br /> [ Subcategory ]&nbsp;&nbsp; </strong></td>
                        <td width="17%" align="center" class="bgcolor_02"><strong>&nbsp;Author </strong></td>
                        <td width="26%" align="center" class="bgcolor_02"><strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Action</strong></td>
                      </tr>
                      <?php
					  if(count($es_bookList)>0){
					  $rownum = $start+1;	
					  foreach ($es_bookList as $es_bookList1){
					  $sql="select * from es_book_reservation where book_id=". $es_bookList1->lbook_aceesnofrom ." and expired_on >='".date("Y-m-d")."' AND status='active'";
						$num=sqlnumber($sql);
					  $zibracolor = ($rownum%2==0)?"even":"odd";
					  ?>
                      <tr>
                        <td height="25" class="narmal"><?php echo $rownum; ?></td>
                        <td class="narmal"><?php echo $es_bookList1->lbook_aceesnofrom; ?></td>
                        <td class="narmal"><?php echo $es_bookList1->lbook_title; ?></td>
					
						<td class="narmal"><?php echo libcategoryname($es_bookList1->lbook_category); if($es_bookList1->lbook_booksubcategory!=""){ ?><br />
						[ <?php echo libsubctegoryname($es_bookList1->lbook_booksubcategory);  ?> ]<?php }?></td>
                        <td class="narmal"><?php echo $es_bookList1->lbook_author; ?></td>
                        <td align="left" class="narmal"><strong>
						<?php
						
						if($sid!='')
						{
						$select_is="select lbook_title ,lbook_author from es_libbook where es_libbookid=".$es_bookList1->lbook_aceesnofrom;
						
						
						$res=$db->getrow($select_is);
						
						
						$select_isued="select * from es_bookissue  where  bki_id=".$sid." and issuetype='staff' and status='active'";
						
						$res_issued=$db->getrows($select_isued);
						if(count($res_issued)>0){
						
						foreach($res_issued as $eachissue){
						$eas="select lbook_title ,lbook_author from es_libbook where es_libbookid=".$eachissue['bki_bookid'];
						$test=$db->getrow($eas);
						
						if($res['lbook_title']==$test['lbook_title'] && $res['lbook_author']== $test['lbook_author'] ){
						$alexist++;
						$nm=$test['lbook_title'];
						$au=$test['lbook_author'];
						}
						}
						}
						?>
						
						<?php 
						 if (in_array("16_20", $admin_permissions)) { if($alexist>0 && $res['lbook_title']==$test['lbook_title']){?>
						
						<a href="?pid=32&action=issuelibrarystaff&sid=<?php echo $sid;?>&bid=<?php echo $es_bookList1->es_libbookId; ?>&serchbookname=<?php echo $serchbookname; ?>&serchauthor=<?php echo $serchauthor; ?> " style="color:#52CF62; font-size:12px; font-weight:bold; text-decoration:none; text-decoration:none;" onclick="return confirm('Title: <?php echo $nm ;?> Author:<?php echo $au ;?> has already been issued to this person. Are you sure to issue again?')">Issue</a>
						
						
						
						<?php } else{ ?> <a href="?pid=32&action=issuelibrarystaff&sid=<?php echo $sid;?>&bid=<?php echo $es_bookList1->es_libbookId; ?>&serchbookname=<?php echo $serchbookname; ?>&serchauthor=<?php echo $serchauthor; ?> " style="color:#52CF62; font-size:12px; font-weight:bold; text-decoration:none; text-decoration:none;" onclick="return confirm('Are you sure you want to issue this book?')">Issue</a> <?php }?><?php }else{ echo "-"; }?>
						
						
						<?php  if($es_bookList1->issuestatus=='notissued' && $num>0) { ?>
						<a onclick="newWindowOpen('?pid=32&action=viewreserved_details&bid=<?php echo $es_bookList1->es_libbookId; ?>');"  style="cursor:pointer;">&nbsp;&nbsp;<span style='color:#FF0000; font-size:12px; font-weight:bold;'>Reserved</span></a>
					
					 <?php } ?>
					
				
						<?php
						}
						?>
						</strong></td>
                      </tr>
					  <?php
					 $rownum++;  }
					 
					 
					  ?>
					  <tr>
					<td colspan="7" align="center"><?php
					if($Submit42=="Submit")
					{
						$Url ="&Submit42=Submit";
						if($es_categorylibraryid>=1)
						{
							$Url .= "&es_categorylibraryid=".$es_categorylibraryid."";
						}
						
						if($subbookcatid>=1)
						{
							$Url .= "subbookcatid=".$subbookcatid."";
						}
					}
					
					 paginateexte($start, $q_limit, $no_rowsbooks, "action=$action&column_name=".$orderby."&asds_order=".$asds_order."&serchbookname=".$serchbookname."&serchauthor=".$serchauthor."&bookserchstaff=".$bookserchstaff."&sid=".$sid.$Url) ?></td>
				</tr><?php }else{?>
				<tr>
					<td colspan="7" align="center" class="admin">No Books Found</td>
				</tr>
				<?php }?>
                    </table></td>
                  </tr>
                </table>
				</form>
				
		<?php

}

 ?>
 
 
 
 <?php
if($action=='books_issuedstudent')
{
?>
 <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
 <tr>
 <td>&nbsp;</td>
 </tr>
 
 
 <tr>
    <td height="25" align="left" valign="middle" class="bgcolor_02">&nbsp;&nbsp;<span class="admin"> Books Issued To Students</span></td>
                        
 </tr>
  <form action="" method="post">
<tr>
        <td><table>
		
		<tr>
        <td align="left" valign="middle" class="narmal">Class</td>
		<td align="left" valign="middle" class="narmal">
	
<select name="sm_class" style="width:120px;">
<option value="" >Select</option>
                         <option value="all" <?php echo ($sm_class=="all")?"selected":""?>>All</option>
                       <?php 
					     if (count($allClasses)>0){
					      foreach($allClasses as $eachClass){
					   ?>
                         <option value="<?php echo $eachClass['es_classesid']; ?>"  <?php echo ($eachClass['es_classesid']==$sm_class)?"selected":""?>><?php echo $eachClass['es_classname']; ?></option>
                         <?php }} ?>
                     </select></td>
		<td align="left" valign="middle" class="narmal">&nbsp;</td>
		<td align="left" valign="middle" class="narmal"><input name="search_bookstudent" type="submit" class="bgcolor_02" value="Search"  style="cursor:pointer"/></td>
		<td></td>
		

		</tr>
		
		</table>
		
		</td>
</tr></form>
 <tr><td height="15px">&nbsp;</td></tr>
	<tr>
		<td>
			<table width="100%" border="0" cellspacing="0" cellpadding="1" class="tbl_grid">
				<tr class="bgcolor_02">
					<td width="6%" class="admin" align="center">S No</td>
					<td width="14%" class="admin" align="center">Name </td>
					<td width="13%" class="admin" align="center">&nbsp;Class</td>
					<td width="10%" class="admin" align="center">&nbsp;Action</td>
				</tr>
<?php
	   
						  $rownum=$start+1;
					  if($totalcount > 0){						
				      	foreach ($issue_book_stude as $eachrecord){
					  $zibracolor = ($rownum%2==0)?"even":"odd";
			
?>
				<tr class="<?php echo $zibracolor; ?>">
					<td class="narmal" align="center"><?php echo $rownum; ?></td>
					<td class="narmal" align="center"><?php echo $eachrecord['pre_name'];?>(<?php echo $eachrecord['es_preadmissionid'];?>)</td>
					<td class="narmal" align="center"><?php echo classname($eachrecord['pre_class']);?></td>
					<td class="narmal" align="center"><a href="?pid=32&action=studentrecard1&serid=<?php echo $eachrecord['bki_id'];?>">Books List</a></td>
				
                    </tr>
<?php
					 $rownum++;
				}
					 
		?>
			
			<tr>
					<td colspan="4" align="center"><?php paginateexte($start, $q_limit, $totalcount, "action=books_issuedstudent".$pageurl) ?></td>
				</tr>
				<tr>
					<td colspan="4" align="right">
					<?php if($start!=""){$pageurl .="&start=$start";}?>
					<?php if (in_array("16_106", $admin_permissions)) {?><input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=32&action=print_list_books_issuedstudent<?php echo $pageurl;?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /><?php }?></td>
				</tr>
			<?php } else{
				echo"<tr><td colspan='4' height='20px'></td></tr><tr><td colspan='6' class='narmal' align='center'>No Records Found</td></tr>";
				}
?>
				
				
			</table></td></tr>
 </table>
		
		<?php }?>
			
			<?php
if($action=='books_issuefaculty')
{
?>
 <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
 <tr>
 <td>&nbsp;</td>
 </tr>
 
 
 <tr>
    <td height="25" align="left" valign="middle" class="bgcolor_02">&nbsp;&nbsp;<span class="admin"> Books Issued To Staff</span></td>
                        
 </tr>
  
 <tr><td height="15px">&nbsp;</td></tr>
	<tr>
		<td>
			<table width="100%" border="0" cellspacing="0" cellpadding="1" class="tbl_grid">
				<tr class="bgcolor_02">
					<td width="6%" class="admin" align="center">S No</td>
					<td width="14%" class="admin" align="center">Name </td>
					<td width="14%" class="admin" align="center">Department</td>
					<td width="14%" class="admin" align="center">Post </td>
					<td width="10%" class="admin" align="center">&nbsp;Action</td>
				</tr>
<?php

	   
						  $rownum=$start+1;
					  if($totalcount > 0){						
				      	foreach ($issue_book_staff as $eachrecord){
					  $zibracolor = ($rownum%2==0)?"even":"odd";
			
?>
				<tr class="<?php echo $zibracolor; ?>">
					<td class="narmal" align="center"><?php echo $rownum; ?></td>
					<td class="narmal" align="center"><?php echo $eachrecord['st_firstname']."&nbsp;".$eachrecord['st_lastname'];?>(<?php echo $eachrecord['es_staffid']; ?>)</td>
					<td class="narmal" align="center"><?php echo deptname($eachrecord['st_department']);?></td>
					<td class="narmal" align="center"><?php echo postname($eachrecord['st_post']);?></td>
					<td class="narmal" align="center"><a href="?pid=32&action=facultyrecard1&serid=<?php echo $eachrecord['bki_id'];?>">Books List</a></td>
				
                    </tr>
<?php
					 $rownum++;
				}
					 
		?>
			
			<tr>
					<td colspan="5" align="center"><?php paginateexte($start, $q_limit, $totalcount, "action=books_issuedstudent".$pageurl) ?></td>
				</tr>
				<tr>
					<td colspan="5" align="right">
					<?php if($start!=""){$pageurl="&start=$start";}?>
					<?php if (in_array("16_107", $admin_permissions)) {?><input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=32&action=print_list_books_issuefaculty<?php echo $pageurl; ?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /><?php }?></td>
				</tr>
			<?php } else{
				echo"<tr><td colspan='5' height='20px'></td></tr><tr><td colspan='6' class='narmal' align='center'>No Records Found</td></tr>";
				}
?>
				
				
			</table></td></tr>
 </table>
		
		<?php }?>
		
		
		
		<?php
if($action=='books_avialability')
{
?>

 <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
 <tr>
 <td>&nbsp;</td>
 </tr>
 
 
 <tr>
    <td height="25" align="left" valign="middle" class="bgcolor_02">&nbsp;&nbsp;<span class="admin"> Books Availability</span></td>
                        
 </tr>
  
<tr>
        <td><form action="?pid=32&action=books_avialability" method="post"><table>
		
		<tr>
		<td width="107"></td>
        <td width="147" align="left" valign="middle" class="narmal">Search</td>
		
		<td width="240" align="left" valign="middle" class="narmal">:<select name="issuestatus" style="width:120px;">
				<option value="" >Select</option>
                       <?php 
					     if (count($books_avalabile_array)>0){
					      foreach($books_avalabile_array as $key=>$value){
					   ?>
                         <option value="<?php echo $key; ?>"  <?php echo ($key==$issuestatus)?"selected":""?>><?php echo $value; ?></option>
                         <?php }} ?>
                     </select>
	
</td></tr>
		<tr>
		<td></td>
		<td align="left" valign="middle" class="narmal">Category</td>
		<td>:<select name="es_categorylibraryid" onchange="getsubjects(this.value,'')">                               <option value="">-- Select --</option>
								<?php 
								$sel_category = "SELECT  * FROM `es_categorylibrary` WHERE `status`='active'";
                                $cat_det = $db->getrows($sel_category);
								if(count($cat_det)>=1){
								foreach($cat_det as $each){
								?>
								<option value="<?php echo $each['es_categorylibraryid']; ?>" <?php if($es_categorylibraryid==$each['es_categorylibraryid']){echo"selected='selected'";}?>><?php echo $each['lb_categoryname']; ?></option><?php }}?>
								
								</select></td></tr>
		<tr>
		<td></td>
								
								<td>Subcategory</td><td id="subcatbox">:<select name="subbookcatid"  ><option value="">- Select -</option></select> 
                 
				  <?php if($es_categorylibraryid!=""){ ?>
                              <script type="text/javascript">
							  getsubjects('<?php echo $es_categorylibraryid; ?>','<?php echo $subbookcatid; ?>')
							  </script>
                              
                              
                              <?php } ?></td>
							  </tr>
		<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td align="left" valign="middle" class="narmal">&nbsp;<input name="search_bookavailability" type="submit" class="bgcolor_02" value="Search"  style="cursor:pointer"/></td>
		
		

		</tr>
		
		</table></form>
		
		</td>
</tr>
 <tr><td height="15px">&nbsp;</td></tr>
	<tr>
		<td>
			<table width="100%" border="0" cellspacing="0" cellpadding="1" class="tbl_grid">
				<tr class="bgcolor_02">
					<td width="11%" align="center" valign="top" class="admin">SNo</td>
					<td width="10%" align="center" valign="top" class="admin">Accession No</td>
					<td width="19%" align="center" valign="top" class="admin">Title</td>
				
					<td width="19%" align="center" valign="top" class="admin">Category / Subcategory</td>
					<td width="16%" align="center" valign="top" class="admin">AUTHOR</td>
					<td width="20%" align="center" valign="top" class="admin">&nbsp;PUBLISHER</td>
					<td width="24%" align="left" valign="top" class="admin">&nbsp;STATUS</td>
				</tr>
<?php
	   
						  $rownum=$start+1;
					  if($totalcount> 0){						
				      	foreach ($book_availabilitylist as $eachrecord){
						 $sql="select * from es_book_reservation where book_id=". $eachrecord['es_libbookid'] ." and expired_on >='".date("Y-m-d")."' AND status='active'";
						$num=sqlnumber($sql);
						
					  $zibracolor = ($rownum%2==0)?"even":"odd";
			
?>
				<tr class="<?php echo $zibracolor; ?>">
					<td class="narmal" align="center"><?php echo $rownum; ?></td>
					<td class="narmal" align="center"><?php echo $eachrecord['es_libbookid'];?></td>
					<td class="narmal" align="center"><?php echo $eachrecord['lbook_title'];?></td>
					
				
					<td class="narmal" align="center"><?php echo libcategoryname($eachrecord['lbook_category']); if($eachrecord['lbook_booksubcategory']!=""){ ?><br />
						[ <?php echo libsubctegoryname($eachrecord['lbook_booksubcategory']);  ?> ]<?php }?></td>
					<td class="narmal" align="center"><?php echo $eachrecord['lbook_author'];?></td>
				<td class="narmal" align="center"><?php if($publishersArr[$eachrecord['lbook_publishername']]!=""){ echo $publishersArr[$eachrecord['lbook_publishername']];}else{echo "----";}?></td>
					<td class="narmal" align="left"><span style="color:#52CF62; font-size:12px; font-weight:bold;"><?php if($eachrecord['issuestatus']=="issued"){echo "Issued";}else{echo "Not Issued";}?></span>&nbsp;<?php  if($eachrecord['issuestatus']=="notissued" && $num>0) { ?>
						&nbsp;&nbsp;<span style="color:#FF0000; font-size:12px; font-weight:bold;">Reserved</span><?php }?></td>
                    </tr>
<?php
					 $rownum++;
				}
					 
		?>
			
			<tr>
					<td colspan="8" align="center"><?php paginateexte($start, $q_limit, $totalcount, "action=books_avialability".$pageurl) ?></td>
				</tr>
				<tr>
					<td colspan="8" align="right">
					<?php if($start!=""){ $pageurl .="&start=$start";}?>
					<?php if (in_array("16_105", $admin_permissions)) {?><input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=32&action=print_list_books_avialability<?php echo $pageurl;?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /><?php }?></td>
				</tr>
			<?php } else{?>

			<tr><td colspan="8" class="narmal" align="center">No Records Found</td></tr>
				<?php }
?>
				
				
			</table></td></tr>
 </table>
		
		<?php }?>
		
<?php
if($action=='booksavailable')
{
?>
<br />

 <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
                            <td height="25" align="left" valign="middle" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">View All Books</span></td>
              </tr>
 <form action="?pid=32&action=booksavailable" method="post" name="serchbook">
 <tr>
        <td><table>
         
		<tr>
        <td align="left" valign="middle" class="narmal">Category</td>
		<td align="left" valign="middle" class="narmal">
		<select style="width:150px" name="categoryname" id="categoryname" onchange="loadcities()">
		<option value="">Select</option>
		<?php
		$categoryname=$editsubcat->subcat_catname;
		foreach ($categoryview as $categoryview1){
		?>
		<option value="<?php echo $categoryview1->es_categorylibraryId;?>" <?php echo ($categoryview1->es_categorylibraryId==$categoryname)?"selected":""?><?php echo ($categoryview1->es_categorylibraryId==$libbookview->lbook_category)?"selected":""?>>

		<?php echo $categoryview1->lb_categoryname; ?>

		</option>
		<?php
		}?>

		</select></td>
		<td align="left" valign="middle" class="narmal">Sub Category</td>
		<td align="left" valign="middle" class="narmal">
		<select style="width:150px" name="scategoryname" id="scategoryname" >
<?php

if ($action=='editbook') {
	if ($libbookview->lbook_booksubcategory!='Select'){ ?>
	<option value="<?php echo $libbookview->lbook_booksubcategory;?>"><?php $staffview11 =$es_subcategory ->Get($libbookview->lbook_booksubcategory);echo $staffview11->subcat_scatname; ?></option>
	<?php
	}
}
?>
		<option value="">Select</option>
		</select></td>
		<td></td>
		

		</tr>
		
		</table>
		</td>
</tr>

	<tr><td height="15px">&nbsp;</td></tr>	
	<tr><td height="15px"><table>
	                                        <tr>
											<td align="left"  class="narmal">From&nbsp;Date:</td>
                                            <td align="left" >
												<input class="plain" name="dc1" value="<?php if(isset($dc1)&&$dc1!=""){ echo $dc1; }?>" size="12" onfocus="this.blur()" readonly="readonly" />
											</td>
                                            <td align="left" >
												<a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fStartPop(document.serchbook.dc1,document.serchbook.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a></td>
												<td align="left"  class="narmal">To&nbsp;Date:</td>
												<td align="left" ><input class="plain" name="dc2" value="<?php if(isset($dc2)&&$dc2!=""){ echo $dc2; }?>" size="12" onfocus="this.blur()" readonly="readonly" /></td>
												<td align="left" ><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fEndPop(document.serchbook.dc1,document.serchbook.dc2);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a>
												<iframe width=132 height=142 name="gToday:contrast:agenda.js" id="gToday:contrast:agenda.js" src="<?php echo JS_PATH ?>/DateRange/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe></td>
		<td><input name="searchcategory" type="submit" value="Search" class="bgcolor_02" style="cursor:pointer;"/></td>										
                                      </tr>
									  
									  </table>
	
	
	
	   </td></tr>
	</form>
	
	<tr><td height="15px"><table width="100%" border="0" cellspacing="0" cellpadding="1" class="tbl_grid">
				<tr class="bgcolor_02">
					<td width="6%" class="admin" align="center">S No</td>
					<td width="14%" class="admin" align="center">Accession No </td>
					<!--<td width="13%" class="admin" align="center"><span class="narmal">&nbsp;Book Number</span></td>-->
					<td width="20%" class="admin" align="center">Title</td>
				
					<td width="20%" class="admin" align="center">&nbsp;Author</td>	
					<td width="10%" class="admin" align="center">&nbsp;Action</td>
				</tr>
<?php
	   
		if (isset($bookview)&&is_array($bookview)){
			$rownum = $start+1;
				
			if (count($bookview)>=1){
			//array_print($bookview);
				foreach ($bookview as $bookview1){
				$zibracolor = ($rownum%2==0)?"even":"odd";	
?>
				<tr class="<?php echo $zibracolor; ?>">
					<td class="narmal" align="center"><?php echo $rownum; ?></td>
					<td class="narmal" align="center"><?php echo $bookview1->lbook_aceesnofrom; ?></td>
					<?php /*?><td class="narmal" align="center"><?php echo $bookview1->lbook_aceesnofrom; ?></td><?php */?>
					<td class="narmal" align="center"><?php echo $bookview1->lbook_title ; ?></td>
				
					<td class="narmal" align="center"><?php echo $bookview1->lbook_author; ?></td>
					<td class="narmal" align="center"><?php if (in_array("16_24", $admin_permissions)) {?><a title="View Book" href="<?php  
					 echo buildurl(array('pid'=>32, 'action'=>'viewbook', 'uid'=>$bookview1->es_libbookId ));?>" ><?php echo viewIcon(); ?></a><?php }else{ echo "-"; }?></td>
                    </tr>
<?php
					 $rownum++;
				}
					 
			}else{
				echo"<tr><td colspan='6'height='20px'></td></tr><tr><td colspan='6' class='narmal' align='center'>No Records Found</td></tr>";
				}
?>
				<tr>
					<td colspan="6" align="center"><?php paginateexte($start, $q_limit, $no_rows, "action=booksavailable&column_name=".$orderby."&asds_order=".$asds_order."&dc1=".$dc1."&dc2=".$dc2."&categoryname=".$categoryname."&scategoryname=".$scategoryname) ?></td>
				</tr>
				<tr>
					<td colspan="6" align="right">
					<?php if($dc1!=""){$PageUrl="&dc1=$dc1";}
						if($dc2!=""){$PageUrl .="&dc2=$dc2";}
						if($categoryname!=""){$PageUrl .="&categoryname=$categoryname";}
						if($scategoryname!=""){$PageUrl .="&scategoryname=$scategoryname";}
						if($start!=""){$PageUrl .="&start=$start";}
					?>
					<?php
						if (count($bookview)>=1){
					 if (in_array("16_104", $admin_permissions)) {?>
					<input type="button" style="cursor:pointer;" value="Print" onclick="window.open('?pid=32&action=print_list_booksavailable<?php echo $PageUrl;?>',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');"  class="bgcolor_02"  /><?php }?></td>
				</tr>
				  <?php
				  }}
				  ?>
			</table></td></tr>
	<tr>
                        <td height="23"align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                         
                        </table></td>
              </tr>
	<tr><td height="15px">&nbsp;</td></tr>
	
</table>

<?php
}
if ($action=='viewbook') {
?>
<table width="60%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th colspan="3" align="left" height="25">&nbsp;Book&nbsp;Details</th>
    
  </tr>
  <tr>
    <td width="45%" align="left" class="normal">&nbsp;Purchased On </td>
    <td width="1%" align="left" class="normal">&nbsp;:</td>
    <td width="54%" align="left" class="normal">&nbsp;<?php echo func_date_conversion("Y-m-d","d/m/Y",$bookview['lbook_dateofpurchase']); ?></td>
  </tr>
   <tr>
    <td class="normal" align="left">&nbsp;Bill Number </td>
    <td class="normal" align="left">&nbsp;:</td>
    <td class="normal" align="left">&nbsp;<?php echo $bookview['lbook_bilnumber']; ?></td>
  </tr>
   <tr>
    <td class="normal" align="left">&nbsp;Category</td>
    <td class="normal" align="left">&nbsp;:</td>
    <td class="normal" align="left">&nbsp;<?php echo libcategoryname($bookview['lbook_category']); ?></td>
  </tr>
   <tr>
    <td class="normal" align="left">&nbsp;Sub Category</td>
    <td class="normal" align="left">&nbsp;:</td>
    <td class="normal" align="left">&nbsp;<?php echo libsubctegoryname($bookview['lbook_booksubcategory']); ?></td>
  </tr>
  <tr>
    <td class="normal" align="left">&nbsp;Accession No</td>
    <td class="normal" align="left">&nbsp;:</td>
    <td class="normal" align="left">&nbsp;<?php echo $bookview['lbook_aceesnofrom']; ?></td>
  </tr>
  <tr>
    <td class="normal" align="left">&nbsp;Author</td>
    <td class="normal" align="left">&nbsp;:</td>
    <td class="normal" align="left">&nbsp;<?php echo $bookview['lbook_author']; ?></td>
  </tr>
  <tr>
    <td class="normal" align="left">&nbsp;Title</td>
    <td class="normal" align="left">&nbsp;:</td>
    <td class="normal" align="left">&nbsp;<?php echo $bookview['lbook_title']; ?></td>
  </tr>
 
  <tr>
    <td class="normal" align="left">&nbsp;Publishers Name </td>
    <td class="normal" align="left">&nbsp;:</td>
    <td class="normal" align="left">&nbsp;<?php echo $publishersArr[$bookview['lbook_publishername']]; ?></td>
  </tr>
  <tr>
    <td class="normal" align="left">&nbsp;Supplier Name </td>
    <td class="normal" align="left">&nbsp;:</td>
    <td class="normal" align="left">&nbsp;<?php echo $suppliersArr[$bookview['lbook_publisherplace']]; ?></td>
  </tr>
  
   <tr>
    <td class="normal" align="left">&nbsp;Edition</td>
    <td class="normal" align="left">&nbsp;:</td>
    <td class="normal" align="left">&nbsp;<?php echo $bookview['lbook_bookedition']; ?></td>
  </tr>
  
   <tr>
    <td class="normal" align="left">&nbsp;Year</td>
    <td class="normal" align="left">&nbsp;:</td>
    <td class="normal" align="left">&nbsp;<?php echo $bookview['lbook_year']; ?></td>
  </tr>
   <tr>
    <td class="normal" align="left">&nbsp;Pages</td>
    <td class="normal" align="left">&nbsp;:</td>
    <td class="normal" align="left">&nbsp;<?php echo $bookview['lbook_pages']; ?></td>
  </tr>
   <tr>
    <td class="normal" align="left">&nbsp;Cost</td>
    <td class="normal" align="left">&nbsp;:</td>
    <td class="normal" align="left">&nbsp;<?php echo $bookview['lbook_cost']; ?></td>
  </tr>
   <tr>
    <td class="normal" align="left">&nbsp;Volume</td>
    <td class="normal" align="left">&nbsp;:</td>
    <td class="normal" align="left">&nbsp;<?php echo $bookview['lbook_volume']; ?></td>
  </tr>
  <?php /*?><tr>
    <td class="normal" align="left">&nbsp;Subject</td>
    <td class="normal" align="left">&nbsp;:</td>
    <td class="normal" align="left">&nbsp;<?php echo $bookview['lbook_booksubject']; ?></td>
  </tr><?php */?>
 
 
 
  <tr>
    <td class="normal" align="left">&nbsp;Book Source </td>
    <td class="normal" align="left">&nbsp;:</td>
    <td class="normal" align="left">&nbsp;<?php echo $bookview['lbook_sourse']; ?></td>
  </tr>
 
 <?php /*?> <tr>
    <td class="normal" align="left">&nbsp;Class </td>
    <td class="normal" align="left">&nbsp;:</td>
    <td class="normal" align="left">&nbsp;<?php echo $classesArr[$bookview['lbook_class']]; ?></td>
  </tr><?php */?>
 
 
 

 <?php /*?> <tr>
    <td class="normal" align="left">&nbsp;Book Status</td>
    <td class="normal" align="left">&nbsp;:</td>
    <td class="normal" align="left">&nbsp;<?php  if($bookview['issuestatus']=="issued"){echo "Issued";}else{echo "Not Issued";} ?></td>
  </tr><?php */?>
  <tr>
    <td>&nbsp;</td>

        <td>&nbsp;</td>
    <td><input name="Input" type="button" value="Back"  onclick="javascript:history.go(-1);" style="cursor:pointer;" class="bgcolor_02"/>
   </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
</table>

<?php
}
if($action=='bookdetailes')
{
?>
		<script type="text/javascript">
			function newWindowOpen (href) {
					window.open(href,null,'width=900,height=900,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30' );
			}
		</script>
		<form action="?pid=32&action=bookdetailes" method="post" name="bookdetiles">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
                      
                <tr>
                            <td height="25" align="left" valign="middle">&nbsp;</td>
                </tr>
             
             
             
               <tr>
                            <td height="25" align="left" valign="middle" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">
Book Detailes</span></td>
                </tr>
             
             
             
             
                      <tr>
                        <td height="25" align="left" valign="middle"><table width="100%" border="0" cellspacing="3" cellpadding="0">
                       
                       
                       
                          <tr>
                            <td colspan="6" class="error_messages" align="center"><?php if(isset($listofserckbooks)){if($no_rowsbooks==0) echo $nill1; }?></td>
                          </tr>
                          <tr>
                            <td width="17%" class="narmal">From&nbsp;Date </td>
                            <td width="11%" class="narmal"><table width="29%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                     <td width="17%"><input name="bookfrom"  value="<?php if(isset($bookfrom)&&$bookfrom !="" ){echo $bookfrom;}else{echo "";} ?>"  type="text"size="14" onchange="return registrationvalid()"  id="bookfrom" readonly /></td>
                                     <td width="83%"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.bookdetiles.bookfrom);return false;" ><img name="popcal" align="absmiddle" src="<?php echo JS_PATH ?>/WeekPicker/calbtn.gif" width="34" height="22" border="0" alt="" /></a></td>
                                </tr>
                           </table>
                   </td>
                            <td width="11%" class="narmal">To&nbsp;Date </td>
                            <td width="15%" class="narmal"><table width="29%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                     <td width="17%"><input name="booktod"  value="<?php if(isset($booktod)&&$booktod !="" ){echo $booktod;}else{echo "";} ?>"  type="text"size="14" onchange="return registrationvalid()"  id="booktod" readonly /></td>
                                     <td width="83%"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.bookdetiles.booktod);return false;" ><img name="popcal" align="absmiddle" src="<?php echo JS_PATH ?>/WeekPicker/calbtn.gif" width="34" height="22" border="0" alt="" /></a></td>
                                </tr>
                           </table>
                   <iframe width=199 height=178 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="<?php echo JS_PATH ?>/WeekPicker/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"> </iframe></td>
                            <td width="17%" class="narmal"><select name="selectstt">
                              <option value="all" <?php if($selectstt=='all'){ ?>selected="selected" <?php }?>>All</option>
                              <option value="active" <?php if($selectstt=='active'){ ?>selected="selected" <?php }?>>Issued</option>
                              <option value="inactive" <?php if($selectstt=='inactive'){ ?>selected="selected" <?php }?>>Retturn</option>
                             <?php /*?> <option value="missing" <?php if($selectstt=='missing'){ ?>selected="selected" <?php }?>>Missing</option><?php */?>
                            </select>                            </td>
                            <td width="29%" class="narmal"><span class="admin">
                              <input name="listofserckbooks" type="submit" class="bgcolor_02" value="Search" style="cursor:pointer;"/>
                            </span></td>
                          </tr>
                          </table>
						  <table width="100%" border="1" cellspacing="0" cellpadding="1" class="tbl_grid">
						  <?php
						  if(isset($listofserckbooks) || $action=='bookdetailes')
						  {
						  if($no_rowsbooks!=0)
						  {
						  ?>
                        
                            
                            <tr class="bgcolor_02">
                              <td width="9%" align="center"><strong>S.No</strong></td>
                              <td width="14%" align="center"><strong>Accession No</strong></td>
                              <td width="14%" align="center"><strong>Title</strong></td>
							  
                              <td width="22%" align="center"><strong>Author</strong></td>
                              <td width="21%" align="center"><strong>Publisher</strong></td>
                              <td width="20%" align="center"><strong>Status</strong></td>
                            </tr>
							<?php
							if (isset($es_bookList)&&is_array($es_bookList))
						  {
							$rwonum=$start+1;
							foreach($es_bookList as $es_bookList1)
							{
							$zibracolor = ($rwonum%2==0)?"even":"odd";
							 $bkbid=$es_bookList1->bki_bookid;
							 
							 $bookdet=$es_libbook ->Get($bkbid);
							$bkbst=$es_bookList1->status;
							  if($bkbst=='active')
							  {
							  $bkbst1='Issued';
							  }
							  else
							  {
							   $bkbst1='Returned';
							  }
							?>
                            <tr class="<?php echo $zibracolor ?>">
                              <td><?php echo $rwonum; ?></td>
                              <td><?php echo $bookdet->lbook_aceesnofrom; ?></td>
                              <td><?php echo $bookdet->lbook_title; ?></td>
							  
							  
							  
							     <td><?php echo $bookdet->lbook_booksubject; ?></td>
                              <td align="center" valign="middle"><span class="narmal"><?php echo $bookdet->lbook_author; ?></span></td>
                              <td align="center" valign="middle"><?php echo $publishersArr[$bookdet->lbook_publishername]; ?></td>
                              <td align="center" valign="middle"><?php echo $bkbst1;?></td>
                            </tr>
							<?php
							$rwonum++;}
							}
							
							
							?>
                          <tr><td colspan="8" align="right">
						  <?php paginateexte($start, $q_limit, $no_rowsbooks, "&action=bookdetailes&column_name=".$orderby.$bookDetailsUrl) ?>
						       </td>
						  </tr>
				 <tr><td colspan="7" align="right"><input type="submit" class="bgcolor_02" value="print" onclick="newWindowOpen('?pid=32&action=bookdetails_print<?php echo $bookDetailsUrl;?>');"  style="cursor:pointer;"/></td></tr>
						  <?php						  
						  }
						  }
						  ?>
						  </table>
                        </td>
                      </tr>
					  
            </table>
			</form>
					<?php
					}
					?>	
<!-- For printing of  Book Details -->
<?php if ($action == 'bookdetails_print') { ?>
			<table>
  					<tr class="bgcolor_02">
						  <td width="9%" align="center"><strong>S.No</strong></td>
						  <td width="14%" align="center"><strong>Accession No</strong></td>
						  <td width="14%" align="center"><strong>Title</strong></td>
						 
						  <td width="22%" align="center"><strong>Author</strong></td>
						  <td width="21%" align="center"><strong>Publisher</strong></td>
						  <td width="20%" align="center"><strong>Status</strong></td>
              </tr>
					 <?php
							if (isset($es_bookList)&&is_array($es_bookList))
						  {
							$rwonum=1;
							foreach($es_bookList as $es_bookList1)
							{
							$zibracolor = ($rwonum%2==0)?"even":"odd";
							 $bkbid=$es_bookList1->bki_bookid;
							 
							 $bookdet=$es_libbook ->Get($bkbid);
							$bkbst=$es_bookList1->status;
							  if($bkbst=='active')
							  {
							  $bkbst1='Issued';
							  }
							  else
							  {
							   $bkbst1='Returned';
							  }
							?>
                            <tr class="<?php echo $zibracolor ?>">
                              <td><?php echo $rwonum; ?></td>
                              <td><?php echo $bookdet->lbook_aceesnofrom; ?></td>
                              <td><?php echo $bookdet->lbook_title; ?></td>
							
                              <td align="center" valign="middle"><span class="narmal"><?php echo $bookdet->lbook_author; ?></span></td>
                              <td align="center" valign="middle"><?php echo $publishersArr[$bookdet->lbook_publishername]; ?></td>
                              <td align="center" valign="middle"><?php echo $bkbst1;?></td>
                            </tr>
							<?php
							$rwonum++;
							}
							}
							
							
							?>
							
			</table>


<?php } ?> 	

<?php if ($action == 'viewreserved_details') { ?>
<table width="100%" border="0"  cellpadding="0" cellspacing="4">

  <tr>
    <td width="18%" align="left" valign="middle" class="normal">&nbsp;Name</td>
    <td width="1%" align="left" valign="middle" class="normal">&nbsp;:</td>
    <td width="81%" align="left" valign="middle" class="normal">&nbsp;<?php echo ucfirst($result_res['name'])."&nbsp;&nbsp;"; if($sql_rs['reservetype']=="staff"){ echo  ucfirst($result_res['st_lastname']);}?></td>
  </tr>
  <tr>
    <td width="18%" align="left" valign="middle" class="normal">&nbsp;Type</td>
    <td width="1%" align="left" valign="middle" class="normal">&nbsp;:</td>
    <td width="81%" align="left" valign="middle" class="normal">&nbsp;<?php echo  ucfirst($sql_rs['reservetype']);?></td>
  </tr>
  <?php if($sql_rs['reservetype']=="student"){?>
  <tr>
    <td align="left" valign="middle" class="normal">&nbsp;Reg No</td>
    <td align="left" valign="middle" class="normal">&nbsp;:</td>
    <td align="left" valign="middle" class="normal">&nbsp;<?php echo $sql_rs['staff_or_student_id'];?></td>
  </tr>
  <tr>
    <td align="left" valign="middle" class="normal">&nbsp;Class</td>
    <td align="left" valign="middle" class="normal">&nbsp;:</td>
    <td align="left" valign="middle" class="normal">&nbsp;<?php echo classname($result_res['pre_class']);?></td>
  </tr>
  <?php }?>
   <?php if($sql_rs['reservetype']=="staff"){?>
  <tr>
    <td align="left" valign="middle" class="normal">&nbsp;Reg No</td>
    <td align="left" valign="middle" class="normal">&nbsp;:</td>
    <td align="left" valign="middle" class="normal">&nbsp;<?php echo $sql_rs['staff_or_student_id'];?></td>
  </tr>
  <tr>
    <td align="left" valign="middle" class="normal">&nbsp;Department</td>
    <td align="left" valign="middle" class="normal">&nbsp;:</td>
    <td align="left" valign="middle" class="normal">&nbsp;<?php echo  ucfirst(deptname($result_res['st_department']));?></td>
  </tr>
  <?php }?>
  <tr>
    <td align="left" valign="middle" class="normal">&nbsp;Reserved&nbsp;On </td>
    <td align="left" valign="middle" class="normal">&nbsp;:</td>
    <td align="left" valign="middle" class="normal">&nbsp;<?php echo func_date_conversion("Y-m-d","d/m/Y",$sql_rs['reserved_on']);?></td>
  </tr>
  <tr>
    <td align="left" valign="middle" class="normal">&nbsp;Expiry</td>
    <td align="left" valign="middle" class="normal">&nbsp;:</td>
    <td align="left" valign="middle" class="normal">&nbsp;<?php echo  func_date_conversion("Y-m-d","d/m/Y",$sql_rs['expired_on']);?></td>
  </tr>
    
</table>
<?php }?>			
					
					<?php
					if($action=='first')
					{
					?>
					<table align="center">
					<tr height="400">
					<td align="center" class="narmal"><strong>Welcome To the Library</strong></td>
					</tr>
					</table>
					<?php
					}
					?>	
<?php
			if($action=='facultyrecard' || $action=='facultyrecard1')
			{
			// selecting the staff
	$es_staffview = $es_staff ->GetList(array(array("status", "=", 'added')) );
	
				
			?>
			<script type="text/javascript" >
				function newWindowOpen(href) {
							window.open(href,null,'width=900,height=900,scrollbar=yes,toolbar=no,directions=no,menubar=yes,left=140,right=40');
				}
			</script>
			<form action="" method="post">
            
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      
					   <tr>
                            <td height="25" align="left" valign="middle"></td>
                </tr>
                   
                     <tr>
                            <td height="25" align="left" valign="middle" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Staff Report</span></td>
                </tr>
                   
                   
                   
                      <tr>
                        <td height="25" align="left" valign="middle"><table width="100%" border="0" cellspacing="3" cellpadding="0">
                          <tr>
                            <td width="17%" class="narmal">&nbsp;Emp.ID</td>
                            <td width="26%" class="narmal">
                   
                            <select name="serchstaffid" style="width:150px" onchange="changecase111(this);return false;" >
							<option value="">Select</option>
									<?php foreach ($es_staffview as $eachrecord2){ ?>
			<option value="<?php echo $eachrecord2->es_staffId ?>" <?php echo ($eachrecord2->es_staffId==$serid)?"selected":""?>><?php echo $eachrecord2->es_staffId; ?></option>
									<?php }?>
							  </select>
                            
                            
                      </td>
                            <td width="23%" class="narmal">&nbsp;Employee Name</td>
                            <td width="34%" class="narmal"><input type="text" name="textfield3" value="<?php  echo   $facultyviewdetiles->st_firstname; ?>" readonly="readonly" /></td>
                          </tr>
     <tr>
                            <td width="10" align="left" valign="middle" class="narmal">&nbsp;Department</td>
                            <td align="left" valign="middle" class="narmal"><input type="text" name="textfield322" value="<?php  echo deptname($facultyviewdetiles->st_department);?>" readonly="readonly" />&nbsp;</td>
                   <td width="140" height="25" align="left" valign="middle" class="narmal">&nbsp;Designation</td>
                            <td width="148" align="left" valign="middle" class="narmal">
							
							<input type="text" name="textfield32" value="<?php echo postname($facultyviewdetiles->st_post); ?>" readonly="readonly"   />
						</td>
                    	 
						 
						  </tr>
                          
                        
                       
                          </table>
                        <table width="100%" border="1" cellspacing="0" cellpadding="1" class="tbl_grid">
                            
                        
						<?php
						if(isset($serchrecardinbook1) || $action=='facultyrecard1')
						
                              {
							  if($count==0) {
							  ?>
							
						<tr>
                              <td colspan="6" align="center" class="narmal">
							  <?php echo "No records found" ;?>
							  </td>
                          </tr>
						  
						<?php
						}
							  if($count!=0)
							  {
						?>
                            
                             <tr class="bgcolor_02">
                              <td width="5%" align="center"><strong>S.No</strong></td>
                              <td width="8%" align="center"><strong>Accession&nbsp;No</strong></td>
                              <td width="14%" align="center"><strong>Title<br />[Category]<br />[Subcategory]</strong></td>
							  
                              <td width="12%" align="center"><strong>Issued&nbsp;On</strong></td>
                              <td width="14%" align="center"><strong>Returned&nbsp;On</strong></td>
                              <td width="12%" align="center"><strong>Fine</strong></td>
							   <td width="12%" align="center"><strong>Fine&nbsp;Paid</strong></td>
							    <td width="12%" align="center"><strong>Fine&nbsp;Waived</strong></td>
								 <td width="11%" align="center"><strong>Action</strong></td>
                            </tr>
						
                        
                        
                        
                        		<?php
									$rownum=1;
									
									//array_print($es_facultybookList);
									
							foreach($es_facultybookList as $eachrecord)
			                 {
							 $zibracolor = ($rownum%2==0)?"even":"odd";
							 $bookdet=$es_libbook ->Get($eachrecord['bki_bookid']);
							 
							 $res="";
							  $sql="select * from es_libbookfinedet where es_libbookbwid=".$eachrecord['es_bookissueid'];
							$nm=sqlnumber($sql);
							if($nm>0){
							$res=$db->getRow($sql);
							$returndate=formatDBDateTOCalender($res['es_libbookdate']);
							}else{
							$returndate="---";
							}
						
							 
                         
						
                                              		
							?>
                             <tr class="<?php echo $zibracolor; ?>">
                              <td align="center" valign="middle"><?php echo $rownum;?></td>
                              <td align="center" valign="middle"><?php echo $bookdet->lbook_aceesnofrom;?></td>
                              <td align="center" valign="middle"><?php echo $bookdet->lbook_title;?><?php if( $bookdet->lbook_category>=1){echo "<br>[".libcategoryname($bookdet->lbook_category)."]"; } if( $bookdet->lbook_booksubcategory>=1){echo "<br>[".libsubctegoryname($bookdet->lbook_booksubcategory)."]"; }?></td>
							  
                              <td align="center" valign="middle"><?php echo formatDBDateTOCalender($eachrecord['issuedate']);?></td>
                              <td align="center" valign="middle"><?php echo $returndate;?></td>
                            <td align="center" valign="middle"><?php if($res['es_libbookfine']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($res['es_libbookfine'], 2, '.', '');}else{echo "---";}?></td>
							    <td align="center" valign="middle"><?php if($res['fine_paid']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($res['fine_paid'], 2, '.', '');}else{echo "---";}?></td>
                              <td align="center" valign="middle"><?php if($res['fine_deducted']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($res['fine_deducted'], 2, '.', '');}else{echo "---";}?></td>
                              <td align="center" valign="middle"><?php if( $res['fine_paid']==0 && $res['es_libbookfine']>0){?>
					  <?php if (in_array("16_23", $admin_permissions)) {?><a href="?pid=32&action=payamount_lib&chgid=<?php echo $res['es_libbookfinedetid']; ?>&fineamount=<?php echo $res['es_libbookfine']; ?>&serid=<?php echo $serid;?>&start=<?php echo $start; ?>" ><img src="images/pay_balance_16.png" border="0" title="Pay Amount" alt="Pay Amount" /></a><?php }else{ echo "-"; }?>&nbsp;
					  <?php }if( $res['fine_paid']>0 && $res['es_libbookfine']>0){?>
					 
					  <?php if (in_array("16_26", $admin_permissions)) {?><a href="javascript: void(0)" onclick="popup_letterlib('?pid=32&action=receipt_lib&chgid=<?php echo $res['es_libbookfinedetid']; ?>&start<?php echo $start;?>')" ><img src="images/print_16.png" border="0" title="Print Recipt" alt="Print Recipt" /></a><?php }else{ echo "-"; }?><?php }?></td>
                            </tr>
                           
							 <?php
							 $rownum++;}
		                     ?>
                        
           <tr> <td colspan="10" align="center"><?php paginateexte($start, $q_limit, $count, "&action=facultyrecard1&serid=".$serid )?></td></tr>
							<tr><td colspan="10" align="right"><?php if (in_array("16_26", $admin_permissions)) {?><input type="button" value="Print" onclick="newWindowOpen('?pid=32&action=faculty_record_print<?php echo $facultyUrl;?>');"  class="bgcolor_02" style="cursor:pointer;"/><?php }?></td></tr>	
                         
							<?php
							
							} ?>
								
							<?php 
			                   }
							?>
                            
                            
                          
                          </table>
                        </td>
                      </tr>
              </table>
					</form>
                    <?php
					}
					?>
                    
                    
                    
                    
                    
<?php if ($action == 'faculty_record_print') { 

	$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_libbookfinedet','LIBRARY','STAFF REPORT','".$ids."','PRINT STAFF REPORT','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);

?>
				<table width="100%" border="0" cellpadding="0" cellspacing="0"  >	
				
				<tr class="bgcolor_02">
                              <td  align="left" height="1" colspan="9">Staff Record</td>
                           
								
                  </tr>
				
				<tr>
                              <td width="5%" align="center" height="1">&nbsp;</td>
                              <td width="8%" align="center"></td>
                              <td width="14%" align="left"  colspan="7"></td>
                              
								
                  </tr>
				
				
				<tr class="bgcolor_02">
                              <td width="5%" align="center">Staff&nbsp;Name</td>
                              <td width="8%" align="center">:</td>
                              <td width="14%" align="left"  colspan="7"><b><?php $stfdet=get_staffdetails($serid); echo $stfdet['st_firstname']." ". $stfdet['st_lastname'];?></b></td>
							  <tr class="bgcolor_02">
                              <td width="5%" align="center">Emp.Id</td>
                              <td width="8%" align="center">:</td>
                              <td width="14%" align="left"  colspan="7"><b><?php echo $serid;?></b></td>
                              
								
                  </tr>
				  <tr class="bgcolor_02">
                              <td width="5%" align="center">Department</td>
                              <td width="8%" align="center">:</td>
                              <td width="14%" align="left"  colspan="7"><b><?php  echo deptname($stfdet['st_department']);?></b></td>
                              
								
                  </tr>
				  <tr class="bgcolor_02">
                              <td width="5%" align="center">Post</td>
                              <td width="8%" align="center">:</td>
                              <td width="14%" align="left"  colspan="7"><b><?php  echo postname($stfdet['st_post']);?></b></td>
                              
								
                  </tr>
				  
				  
				  
				  
				  
							
					<tr>
                              <td width="5%" align="center" height="1">&nbsp;</td>
                              <td width="8%" align="center"></td>
                              <td width="14%" align="left"  colspan="7"></td>
                              
								
                  </tr>
						<tr class="bgcolor_02">
                              <td width="5%" align="center"><strong>S.No</strong></td>
                              <td width="8%" align="left"><strong>&nbsp;Accession&nbsp;No</strong></td>
                              <td width="14%" align="left"><strong>&nbsp;Title<br />[Category]<br />[Subcategory]</strong></td>
							    
                              <td width="12%" align="left"><strong>&nbsp;Issued&nbsp;on</strong></td>
                              <td width="14%" align="left"><strong>&nbsp;Returned&nbsp;on</strong></td>
                              <td width="12%" align="left"><strong>&nbsp;Fine&nbsp;Amount</strong></td>
							   <td width="12%" align="left"><strong>&nbsp;Fine&nbsp;Paid</strong></td>
							    <td width="12%" align="left"><strong>&nbsp;Fine&nbsp;Waived</strong></td>
								
                  </tr>
						
				  <?php
							
							$rownum=1;
								foreach($es_facultybookList as $eachrecord)
			                 {
							 $zibracolor = ($rownum%2==0)?"even":"odd";
							 $bookdet=$es_libbook ->Get($eachrecord['bki_bookid']);
							 $res="";
							   $sql="select * from es_libbookfinedet where es_libbookbwid=".$eachrecord['es_bookissueid'];
							$nm=sqlnumber($sql);
							if($nm>0){
							$res=$db->getRow($sql);
							$returndate=formatDBDateTOCalender($res['es_libbookdate']);
							}else{
							$returndate="---";
							}
							?>
                             <tr class="<?php echo $zibracolor; ?>">
                              <td align="center" valign="middle"><?php echo $rownum;?></td>
                              <td align="center" valign="middle"><?php echo $bookdet->lbook_aceesnofrom;?></td>
                              <td align="center" valign="middle"><?php echo $bookdet->lbook_title;?><?php if( $bookdet->lbook_category>=1){echo "<br>[".libcategoryname($bookdet->lbook_category)."]"; } if( $bookdet->lbook_booksubcategory>=1){echo "<br>[".libsubctegoryname($bookdet->lbook_booksubcategory)."]"; }?></td>
							
                              <td align="center" valign="middle"><?php echo formatDBDateTOCalender($eachrecord['issuedate']);?></td>
                              <td align="center" valign="middle"><?php echo $returndate;?></td>
                            <td align="center" valign="middle"><?php if($res['es_libbookfine']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($res['es_libbookfine'], 2, '.', '');}else{echo "---";}?></td>
							    <td align="center" valign="middle"><?php if($res['fine_paid']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($res['fine_paid'], 2, '.', '');}else{echo "---";}?></td>
                              <td align="center" valign="middle"><?php if($res['fine_deducted']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($res['fine_deducted'], 2, '.', '');}else{echo "---";}?></td>
                              
                            </tr>
							<?php
							$rownum++;
							} ?>
					</table>		
							
			<?php } ?>	
            
            
             <?php
			if($action=='books_issuedstudent' || $action=='books_issuedstudent')
			{
			//$es_staffview = $es_search->GetList(array(array("pre_status", "=", 'active')) );
			?>
			<script type="text/javascript" >
				function newWindowOpen(href) {
							window.open(href,null,'width=900,height=900,scrollbar=yes,toolbar=no,directions=no,menubar=yes,left=140,right=40');
				}
			</script>
			
			
			<?php } ?>
            
                    
  
  <?php
			if($action=='studentrecard' || $action=='studentrecard1')
			{
			$swise_sql = "SELECT * FROM es_preadmission WHERE pre_status='active'";
			$es_staffview = $db->getrows($swise_sql);
			//$es_search->GetList(array(array("pre_status", "=", 'active')) );
			?>
			
			<script type="text/javascript" >
				function newWindowOpen(href) {
							window.open(href,null,'width=900,height=900,scrollbar=yes,toolbar=no,directions=no,menubar=yes,left=140,right=40');
				}
			</script>
			<form action="" method="post">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
 <tr>
                            <td height="25" align="left" valign="middle" >&nbsp;</td>
                </tr>  
                     <tr>
                            <td height="25" align="left" valign="middle" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Student Report</span></td>
                </tr>   
                      <tr>
                        <td height="25" align="left" valign="middle"><table width="100%" border="0" cellspacing="3" cellpadding="0">
                          <tr>
                            <td width="17%" class="narmal">&nbsp;Reg.No</td>
                            <td width="26%" class="narmal">
							<select name="serchstudentid" style="width:150px" onchange="changecase11(this);return false;"  >
									<option value="">Select</option>
									<?php foreach ($es_staffview as $eachrecord45){ ?>
			<option value="<?php echo $eachrecord45['es_preadmissionid']; ?>" <?php echo ($eachrecord45['es_preadmissionid']==$serid)?"selected":""?>><?php echo $eachrecord45['es_preadmissionid']; ?></option>
									<?php }?>
							  </select>
							
							</td>
                            <td width="23%" class="narmal">&nbsp;Class</td>
                            <td width="34%" class="narmal"><input type="text" name="textfield22" readonly="readonly" value="<?php if($studentviewdetiles['pre_status']!='inactive')echo stripslashes(classname($studentviewdetiles['pre_class']));?>" /></td>
                          </tr>
                          <tr>
                            <td class="narmal">&nbsp;Student UserName </td>
                            <td class="narmal"><input type="text" name="textfield2" readonly="readonly" value="<?php if($studentviewdetiles['pre_status']!='inactive') echo $studentviewdetiles['pre_student_username'];?>" /></td>
                            <td class="narmal">&nbsp;</td>
                            <td class="narmal"><span class="admin">
                              <input name="serchrecardinbook" type="submit" class="bgcolor_02" value="Search"  style="display:none"/>
&nbsp;                            </span></td>
                          </tr>
                          </table>
                        <table width="100%" border="1" cellspacing="0" cellpadding="1" class="tbl_grid">
                        
                        
                        
                        
                        
						<?php
						if(isset($serchrecardinbook) || $action=='studentrecard1')
						
                              {
							  if($count==0) {
							  ?>
							
						<tr>
                              <td colspan="9" align="center" class="narmal">
							  <?php echo "No records found" ;?>
							  </td>
                          </tr>
						  
						<?php
						}
							  if($count!=0)
							  {
						?>
                            
                            <tr class="bgcolor_02">
                              <td width="5%" align="center"><strong>S.No</strong></td>
                              <td width="8%" align="center"><strong>Accession&nbsp;No</strong></td>
                              <td width="14%" align="center"><strong>Title<br />[Category]<br />[Subcategory]</strong></td>
							 
                              <td width="12%" align="center"><strong>Issued on</strong></td>
                              <td width="14%" align="center"><strong>Returned&nbsp;on</strong></td>
                              <td width="12%" align="center"><strong>Fine&nbsp;Amount</strong></td>
							   <td width="12%" align="center"><strong>Fine&nbsp;Paid</strong></td>
							    <td width="12%" align="center"><strong>Fine&nbsp;Waived</strong></td>
								 <td width="11%" align="center"><strong>Action</strong></td>
                            </tr>
							<?php
							
							$rownum=1;
							foreach($es_studentbookList as $eachrecord)
							{
								$zibracolor = ($rownum%2==0)?"even":"odd";
								 $bookdet=$es_libbook ->Get($eachrecord['bki_bookid']);
							 $res="";
							  $sql="select * from es_libbookfinedet where es_libbookbwid=".$eachrecord['es_bookissueid'];
							$nm=sqlnumber($sql);
							if($nm > 0){
							$res=$db->getRow($sql);
							$returndate=formatDBDateTOCalender($res['es_libbookdate']);
							}else{
							$returndate="---";
							}
							
							?>
                            <tr class="<?php echo $zibracolor; ?>">
                              <td align="center" valign="middle"><?php echo $rownum;?></td>
                              <td align="center" valign="middle"><?php echo $bookdet->lbook_aceesnofrom;?></td>
                              <td align="center" valign="middle"><?php echo $bookdet->lbook_title;?><?php if( $bookdet->lbook_category>=1){echo "<br>[".libcategoryname($bookdet->lbook_category)."]"; } if( $bookdet->lbook_booksubcategory>=1){echo "<br>[".libsubctegoryname($bookdet->lbook_booksubcategory)."]"; }?></td>
							
                              <td align="center" valign="middle"><?php echo formatDBDateTOCalender($eachrecord['issuedate']);?></td>
                              <td align="center" valign="middle"><?php echo $returndate;?></td>
                              <td align="center" valign="middle"><?php  if($res['es_libbookfine'] > 0){
							  echo $_SESSION['eschools']['currency']."&nbsp;".number_format($res['es_libbookfine'], 2, '.', '');
							  
							  }else{
							  echo "---";
							  
							  }?></td>
							    <td align="center" valign="middle"><?php if($res['fine_paid']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($res['fine_paid'], 2, '.', '');}else{echo "---";}?></td>
                              <td align="center" valign="middle"><?php if($res['fine_deducted']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($res['fine_deducted'], 2, '.', '');}else{echo "---";}?></td>
                              <td align="center" valign="middle"><?php if( $res['fine_paid']==0 && $res['es_libbookfine']>0){?>
					  <?php if (in_array("16_22", $admin_permissions)) {?><a href="?pid=32&action=payamount_lib&chgid=<?php echo $res['es_libbookfinedetid']; ?>&fineamount=<?php echo $res['es_libbookfine']; ?>&serid=<?php echo $serid;?>&start=<?php echo $start;?>&type=<?php echo $res['es_type']?>" ><img src="images/pay_balance_16.png" border="0" title="Pay Amount" alt="Pay Amount" /></a><?php }else{ echo "-"; }?>&nbsp;
					  <?php }if( $res['fine_paid']>0 && $res['es_libbookfine']>0){?>
					 
					  <?php if (in_array("16_25", $admin_permissions)) {?><a href="javascript: void(0)" onclick="popup_letterlib('?pid=32&action=receipt_lib&chgid=<?php echo $res['es_libbookfinedetid']; ?>&start=<?php echo $start;?>')" ><img src="images/print_16.png" border="0" title="Print Recipt" alt="Print Recipt" /></a><?php }else{ echo "-"; }?><?php }?></td>
                            </tr>
							<?php
							$rownum++;}
							?>
							<tr> <td colspan="10" align="center"><?php paginateexte($start, $q_limit, $count, "&action=studentrecard1&serid=".$serid )?></td></tr>
							<tr><td colspan="10" align="right"><?php if (in_array("16_25", $admin_permissions)) {?><input type="button" value="Print" onclick="newWindowOpen('?pid=32&action=student_record_print<?php echo $studentUrl;?>&start=<?php echo $start; ?>');"  class="bgcolor_02" style="cursor:pointer;"/><?php }?></td></tr>	
							<?php } 
							
							
							?>
								
							<?php }
							?>
                          </table>
                        </td>
                      </tr>
              </table>
					</form>
					<?php
					}
					?>
			<?php if ($action == 'student_record_print') { 
			// insert logs
				$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_libbookfinedet','LIBRARY','STUDENT REPORT','".$ids."','PRINT REPORT(STUDENT)','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
			
			
			?>
				<table border="0" cellpadding="0" cellspacing="0"  width="100%">
				
			<tr class="bgcolor_02">
                              <td  align="left" height="1" colspan="9">Student Report</td>
                             
                              
								
                  </tr>		
			
			
				<tr>
                              <td width="8%" align="center" height="1">&nbsp;</td>
                              <td width="6%" align="center"></td>
                              <td align="left"  colspan="7"></td>
                              
								
                  </tr>		
				
				
				
				
				
				<tr class="bgcolor_02">
                              <td width="8%" height="25" align="left" valign="middle">&nbsp;Student&nbsp;Name</td>
                              <td width="6%" align="center">:</td>
                              <td align="left"  colspan="7"><b><?php $stfdet=get_studentdetails($serid); echo $stfdet['pre_name'];?></b></td>
                              
								
                  </tr>
							<tr class="bgcolor_02">
                              <td width="8%" height="25" align="left" valign="middle">&nbsp;Reg No</td>
                              <td width="6%" align="center">:</td>
                              <td align="left"  colspan="7"><b><?php echo "".$serid;?></b></td>
                              
								
                            </tr>
							<tr class="bgcolor_02">
                              <td width="8%" height="25" align="left" valign="middle">&nbsp;Class</td>
                              <td width="6%" align="center">:</td>
                              <td align="left"  colspan="7"><b><?php $stfdet=get_studentdetails($serid); echo classname($stfdet['pre_class']);?></b></td>
                              
								
                            </tr>
							<tr class="bgcolor_02">
                              <td width="8%" height="25" align="left" valign="middle">&nbsp;Father Name</td>
                              <td width="6%" align="center">:</td>
                              <td align="left"  colspan="7"><b><?php echo $stfdet['pre_fathername'];?></b></td>
                              
								
                            </tr>
							
					<tr>
                              <td width="8%" align="center" height="1">&nbsp;</td>
                              <td width="6%" align="center"></td>
                              <td align="left"  colspan="7"></td>
                              
								
                  </tr>		
						<tr class="bgcolor_02">
                              <td width="8%" align="center" height="20"><strong>S.No</strong></td>
                              <td width="6%" align="left"><strong>Accession&nbsp;No</strong></td>
                              <td width="10%" align="left"><strong>&nbsp;Title<br />[Category]<br />[Subcategory]</strong></td>
							 
                              <td width="15%" align="left"><strong>&nbsp;Issued&nbsp;On</strong></td>
                              <td width="14%" align="left"><strong>&nbsp;Returned&nbsp;On</strong></td>
                              <td width="14%" align="left"><strong>&nbsp;Fine</strong></td>
							   <td width="14%" align="left"><strong>&nbsp;Fine&nbsp;Paid</strong></td>
                              <td width="19%" align="left"><strong>&nbsp;Fine&nbsp;Waived</strong></td
                  >
						</tr>
				  
							<?php
					
							$rownum=1;
							foreach($es_studentbookList as $eachrecord)
							{
							$zibracolor = ($rownum%2==0)?"even":"odd";
								 $bookdet=$es_libbook ->Get($eachrecord['bki_bookid']);
							 $res="";
							  $sql="select * from es_libbookfinedet where es_libbookbwid=".$eachrecord['es_bookissueid'];
							$nm=sqlnumber($sql);
							if($nm > 0){
							$res=$db->getRow($sql);
							$returndate=formatDBDateTOCalender($res['es_libbookdate']);
							}else{
							$returndate="---";
							}
							
							
							?>
                            <tr class="<?php echo $zibracolor; ?>" >
                              <td align="center" valign="middle"><?php echo $rownum;?></td>
                              <td align="center" valign="middle"><?php echo $bookdet->lbook_aceesnofrom;?></td>
                              <td align="center" valign="middle"><?php echo $bookdet->lbook_title;?><?php if( $bookdet->lbook_category>=1){echo "<br>[".libcategoryname($bookdet->lbook_category)."]"; } if( $bookdet->lbook_booksubcategory>=1){echo "<br>[".libsubctegoryname($bookdet->lbook_booksubcategory)."]"; }?></td>
							  
							 
                              <td align="center" valign="middle"><?php echo formatDBDateTOCalender($eachrecord['issuedate']);?></td>
                              <td align="center" valign="middle"><?php echo $returndate;?></td>
                              <td align="center" valign="middle"><?php  if($res['es_libbookfine'] > 0){
							  echo $_SESSION['eschools']['currency']."&nbsp;".number_format($res['es_libbookfine'], 2, '.', '');
							  
							  }else{
							  echo "---";
							  
							  }?></td>
							    <td align="center" valign="middle"><?php if($res['fine_paid']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($res['fine_paid'], 2, '.', '');}else{echo "---";}?></td>
                              <td align="center" valign="middle"><?php if($res['fine_deducted']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($res['fine_deducted'], 2, '.', '');}else{echo "---";}?></td>
                              
                            </tr>
							<?php
							$rownum++;
							} ?>
					</table>		
							
			<?php } ?>	
			<?php if ($action == 'book_analysis_print') { 
				$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_bookissue','LIBRARY','BOOK ANALYSIS','".$ids."','PRINT BOOK ANALYSIS','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
			
			
			?>
			<table border="0" cellpadding="0" cellspacing="0" width="100%" >
					
					
						<tr class="bgcolor_02">
                              <td  align="left" colspan="8"><strong> Book Analysis</strong></td>
                             
						</tr>
						<tr >
                              <td  align="center" colspan="8"><strong>&nbsp;</strong></td>
                             
						</tr>
						
					
						<tr class="bgcolor_02">
                              <td width="12%" align="center"><strong>Accession No </strong></td>
                              <td width="13%" align="center"><strong>Title</strong></td>
							
                              <td width="15%" align="center"><strong>Author</strong></td>
                             
                              <td width="15%" align="center"><strong>Publisher</strong></td>
                              <td width="15%" align="center"><strong>No.of Times Issued</strong></td>
                              <td width="15%" align="center"><strong>No.of Times Returned</strong></td>
						</tr>
							
							<?php
							$rownum=1;
							foreach($es_bookList as $es_bookList1)
			                 {
							 $zibracolor = ($rownum%2==0)?"even":"odd";
                             $bid=$es_bookList1->es_libbookId;
                             
//					$count1=count( $es_bookissueids = $es_bookissue ->GetList(array(array("bki_bookid", "=", $bid),array("issuedate",                               "between", $dc3."'  and  '".$dc4)),$orderby, $order,  "$start , $q_limit"));

					$count1 = $db->getOne("SELECT count(*) FROM es_bookissue WHERE bki_bookid ='$bid' and issuedate between '$dc3' and '$dc4' ");
					$count2 = $db->getOne("SELECT count( es_bookissue.bki_bookid ) FROM es_bookissue RIGHT JOIN es_libbookfinedet ON es_bookissue.es_bookissueid = es_libbookfinedet. es_libbookbwid WHERE es_bookissue.bki_bookid ='$bid' and es_libbookdate between '$dc3' and '$dc4' ");
                              
//                            $count3=mysql_fetch_array($count2);
//                            array_print($es_bookissueids);
			
							?>
                            <tr class="<?php echo $zibracolor;?>">
                              <td align="center" valign="middle"><?php echo $es_bookList1->lbook_aceesnofrom ; ?></td>
                              <td align="center" valign="middle"><?php echo $es_bookList1->lbook_title ; ?></td>
							   
                              <td align="center" valign="middle"><?php echo $es_bookList1->lbook_author ; ?></td>
                  
                              <td align="center" valign="middle"><?php echo $publishersArr[$es_bookList1->lbook_publishername ]; ?></td>
                              <td align="center" valign="middle"><?php echo $count1;?></td>
                              <td align="center" valign="middle"><?php echo $count2;?></td>
                            </tr>
                           
							 <?php
							 $rownum++;
		                    } ?>
			</table>				
<?php  } ?>	
					
			<?php
			if($action=='issueandreturn')
			{
			?>
			<script type="text/javascript">
				function newWindowOpen(href) {
				     window.open(href, null,'width=900,height=900,scrollbars=yes,menubar=yes,left=140,right=40');
				}
			</script>
			<form action="" name="issuereturn" method="post">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			  
                          
                          
                          <tr>
			<td>&nbsp;</td>
			</tr>
            <tr>
                            <td height="25" align="left" valign="middle" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Book Analysis</span></td>
                </tr>
                      
					  
					  
                      <tr>
                        <td height="25" align="left" valign="middle"><table width="100%" border="0" cellspacing="3" cellpadding="0">
						<tr><td colspan="7"><span class="style1">Note:</span>Please select the dates and click search to display Book Data</td>
						</tr>
						
                          <tr>
                            <td width="16%" class="narmal">&nbsp;From&nbsp;Date </td>
                            <td width="6%" class="narmal"><table width="29%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                     <td width="17%"><input class="plain" name="bookfrom" value="<?php if(isset($bookfrom)&&$bookfrom !="" ){echo $bookfrom;}else{echo "";} ?>" size="12" onfocus="this.blur()" readonly="readonly"  id="bookfrom"/></td>
                                     <td width="83%"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fStartPop(document.issuereturn.bookfrom,document.issuereturn.bookto);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a></td>
                                </tr>
                           </table></td>
                            <td width="7%" class="narmal">&nbsp;</td>
                            <td width="12%" class="narmal">To&nbsp;Date </td>
                            <td width="14%" class="narmal"><table width="29%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                     <td width="17%"><input class="plain" name="bookto" value="<?php if(isset($bookto)&&$bookto !="" ){echo $bookto;}else{echo "";} ?>" size="12" onfocus="this.blur()" readonly="readonly"  id="bookto"/></td>
                                     <td width="83%"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fEndPop(document.issuereturn.bookfrom,document.issuereturn.bookto);return false;" ><img class="PopcalTrigger" align="absmiddle" src="<?php echo JS_PATH ?>/DateRange/calbtn.gif" width="34" height="22" border="0" alt="" /></a></td>
                                </tr>
                           </table>
                     <iframe width=132 height=142 name="gToday:contrast:agenda.js" id="gToday:contrast:agenda.js" src="<?php echo JS_PATH ?>/DateRange/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe></td>
                            <td width="15%" class="narmal">&nbsp;</td>
                            <td width="30%" class="narmal"><span class="admin">
                              <input name="statusofbook" type="submit" class="bgcolor_02" value="Search" style="cursor:pointer;"/>
&nbsp;                            </span></td>
                          </tr>
                          </table>
						  <br />
                       <table width="100%" border="0" cellspacing="0" cellpadding="1" class="tbl_grid">
						
						<?php
						if(isset($statusofbook) || $action=='issueandreturn')
						{
						?>
						<tr >
                             <?php if($reacrds==0){?> <td colspan="6" align="center" class="error_messages"><?php echo "No recards find in your serch critiria" ; ?></td><?php }?>
                         </tr>
						<?php
						
						if($reacrds!=0 && isset($statusofbook))
						{
						?>
                            
                            <tr class="bgcolor_02">
                              <td width="12%" align="center"><strong>Accession No </strong></td>
                              <td width="13%" align="center"><strong>Title</strong></td>
							  
                              <td width="15%" align="center"><strong>Author</strong></td>
                             <!-- <td width="15%" align="center"><strong>Subject</strong></td>-->
                              <td width="15%" align="center"><strong>Publisher</strong></td>
                              <td width="15%" align="center"><strong>No.of Times Issued</strong></td>
                              <td width="15%" align="center"><strong>No.of Times Returned</strong></td>
                            </tr>
							
							<?php
							$rownum=1;
							//array_print($es_bookList);
							foreach($es_bookList as $es_bookList1)
			                 {
							
							 $zibracolor = ($rownum%2==0)?"even":"odd";
                             $bid=$es_bookList1['es_libbookid'];
			$count1 = $db->getone("SELECT COUNT(*) FROM es_bookissue WHERE bki_bookid=".$bid.$condition);
			$count2 = $db->getone("SELECT COUNT(*) FROM es_bookreturns WHERE book_id=".$bid.$condition2);
							?>
                            <tr class="<?php echo $zibracolor;?>">
                              <td align="center" valign="middle"><?php echo $es_bookList1['lbook_aceesnofrom'] ; ?></td>
                              <td align="center" valign="middle"><?php echo $es_bookList1['lbook_title'] ; ?></td>
							 
                              <td align="center" valign="middle"><?php echo $es_bookList1['lbook_author'] ; ?></td>
                        <?php /*?>      <td align="center" valign="middle"><?php echo $es_bookList1['lbook_booksubject'] ; ?></td><?php */?>
                              <td align="center" valign="middle"><?php echo $publishersArr[$es_bookList1['lbook_publishername']] ; ?></td>
                              <td align="center" valign="middle"><?php echo $count1;?></td>
                              <td align="center" valign="middle"><?php echo $count2;?></td>
                            </tr>
                           
							 <?php
							 $rownum++;}
		                     ?>
							<tr><td align="center" colspan="7"><?php paginateexte($start, $q_limit, $reacrds, "action=issueandreturn&bookfrom=".$bookfrom."&bookto=".$bookto."&statusofbook=".$statusofbook )?></td> </tr>
							<tr><td align="right" colspan="7"><?php if (in_array("16_29", $admin_permissions)) {?><input type="button" value="Print" class="bgcolor_02" onclick="newWindowOpen('?pid=32&action=book_analysis_print&bookfrom=<?php echo $bookfrom; ?>&bookto=<?php echo $bookto; ?>&statusofbook=<?php echo $statusofbook; ?>&start=<?php echo $start; ?>')"  style="cursor:pointer;"/><?php }?></td></tr>
					
							
							<?php 
							}}
					         ?>
                          </table>
                        </td>
                      </tr>					
              </table>
					</form>
					<?php
					}
					if($action=='lstudent')
					{
					?>		
					<table width="100%" border="0" cellspacing="4" cellpadding="0">
                      
                      <tr>
                        <td height="25" align="left" valign="middle"><table width="100%" border="0" cellspacing="3" cellpadding="0">
                          <tr>
                            <td width="17%" class="narmal">&nbsp;</td>
                            <td width="26%" class="narmal">&nbsp;</td>
                            <td width="23%" class="narmal">&nbsp;</td>
                            <td width="34%" class="narmal">&nbsp;</td>
                          </tr>
                          <tr>
                            <td class="narmal">&nbsp;</td>
                            <td class="narmal">&nbsp;</td>
                            <td class="narmal">&nbsp;</td>
                            <td class="narmal">&nbsp;</td>
                          </tr>
                          </table>
                        <table width="100%" border="0" cellspacing="0" cellpadding="1" class="tbl_grid">
						<?php
						if($action=='lstudent')
						
                              {
							  ?>
						<tr>
                              <td colspan="5" align="center" class="narmal"><?php if($count==0) echo "No records found" ;?></td>
                          </tr>
						<?php
							  if($count!=0)
							  {
						?>
                            
                            <tr class="bgcolor_02">
                              <td width="13%" align="center"><strong>S.No</strong></td>
                              <td width="17%" align="center"><strong>Student&nbsp;Name </strong></td>
                              <td width="17%" align="center"><strong>Class&nbsp;Name </strong></td>
                              <td width="21%" align="center"><strong>Phone&nbsp;Number </strong></td>
                              <td width="32%" align="center"><strong>Actiones</strong></td>
                            </tr>
							<?php
							
							$rownum=1;
							foreach($studentlib as $studentview)
							{
							$zibracolor = ($rownum%2==0)?"even":"odd";
							?>							
                            <tr class="<?php echo $zibracolor; ?>">
                              <td align="center" valign="middle"><?php echo $rownum;?></td>
                              <td align="center" valign="middle"><?php echo $studentview->student_name;?></td>
                              <td align="center" valign="middle"><?php echo classname($studentview->student_classname) ;?></td>
                              <td align="center" valign="middle"><?php echo $studentview->student_phoneno  ;?></td>
                              <td align="center" valign="middle"><a href=" ?pid=32&action=valuestudent&sid=<?php echo $studentview->student_id ; ?>&start=<?php echo $start; ?>"><img src="images/b_edit.png" border="0" width="15" height="15" /></a></td>
                            </tr>
							<?php
							$rownum++;}?>
							<tr> <td colspan="6" align="right"><?php paginateexte($start, $q_limit, $count, "&action=lstudent")?></td></tr>
							<tr><td colspan="6" align="right"><input name="printSubmit" type="button" onclick="newWindowOpen ('?pid=32&action=printlstudent&start=<?php echo $start;?>');" class="bgcolor_02" value="Print" style="cursor:pointer;"/></td></tr>	
							
								
							<?php } }
							?>
                          </table>
                        </td>
                      </tr>
                    </table>
					<?php
					}
					if($action=='lstaff')
					{
					?>		
					<table width="100%" border="0" cellspacing="4" cellpadding="0">
                      
                      <tr>
                        <td height="25" align="left" valign="middle">
						<table width="100%" border="0" cellspacing="3" cellpadding="0">
                          <tr>
                            <td width="17%" class="narmal">&nbsp;</td>
                            <td width="26%" class="narmal">&nbsp;</td>
                            <td width="23%" class="narmal">&nbsp;</td>
                            <td width="34%" class="narmal">&nbsp;</td>
                          </tr>
                          <tr>
                            <td class="narmal">&nbsp;</td>
                            <td class="narmal">&nbsp;</td>
                            <td class="narmal">&nbsp;</td>
                            <td class="narmal"><span class="admin"></span></td>
                             <td>&nbsp;</td>
                          </tr>
                          </table>
                        <table width="100%" border="0" cellspacing="0" cellpadding="1" class="tbl_grid">
						<?php
						if($action=='lstaff')						
                              {
							  ?>
						<tr class="error_messages">
                              <td colspan="5" align="center" class="narmal"><?php if($count==0) echo "No records found" ;?></td>
                          </tr>
						<?php
							  if($count!=0)
							  {
						?>
                            
                            <tr class="bgcolor_02">
                              <td width="13%" align="center"><strong>S.No</strong></td>
                              <td width="17%" align="center"><strong>Staff&nbsp;Name </strong></td>
                              <td width="17%" align="center"><strong>Department&nbsp;Name </strong></td>
                              <td width="21%" align="center"><strong>Phone&nbsp;Number </strong></td>
                              <td width="32%" align="center"><strong>Actiones</strong></td>
                            </tr>
							<?php
							
							$rownum=1;
							foreach($stafflib as $staffview)
							{
							$zibracolor = ($rownum%2==0)?"even":"odd";
							?>							
                            <tr class="<?php echo $zibracolor; ?>">
                              <td align="center" valign="middle"><?php echo $rownum;?></td>
                              <td align="center" valign="middle"><?php echo $staffview->staffadd_name;?></td>
                              <td align="center" valign="middle"><?php echo $staffview->staffadd_deaprtment  ;?></td>
                              <td align="center" valign="middle"><?php echo $staffview->staffadd_phone  ;?></td>
                              <td align="center" valign="middle"><a href=" ?pid=32&action=values&sid=<?php echo $staffview->staffadd_id  ; ?>&start=<?php echo $start; ?>"><img src="images/b_edit.png" border="0" width="15" height="15" /></a></td>
                            </tr>
							<?php
							$rownum++;}
							?>
								<tr> <td colspan="6" align="right"><?php paginateexte($start, $q_limit, $count, "&action=lstaff")?></td></tr>
							<tr><td colspan="6" align="right"><input name="printSubmit" type="button" onclick="newWindowOpen ('?pid=32&action=plstaff&start=<?php echo $start;?>');" class="bgcolor_02" value="Print" style="cursor:pointer;"/></td></tr>	
							<?php }}
							?>
                          </table>
                        </td>
                      </tr>
                    </table>
					<?php
					}
					?>
					
					
						<?php
						if($action=='printlstudent')
						
                              {
							  ?>
							  <table width="100%" border="0" cellspacing="0" cellpadding="1" class="tbl_grid">
						<tr class="error_messages">
                              <td colspan="5" align="center" class="narmal"><?php if($count==0) echo "No records found" ;?></td>
                          </tr>
						<?php
							  if($count!=0)
							  {
						?>
                            
                            <tr class="bgcolor_02">
                              <td width="13%" align="center"><strong>S.No</strong></td>
                              <td width="17%" align="center"><strong>Student&nbsp;Name </strong></td>
                              <td width="17%" align="center"><strong>Class&nbsp;Name </strong></td>
                              <td width="21%" align="center"><strong>Phone&nbsp;Number </strong></td>
                             <!-- <td width="32%" align="center"><strong>Actiones</strong></td>-->
                            </tr>
							<?php
							
							$rownum=1;
							foreach($studentlib as $studentview)
							{
							$zibracolor = ($rownum%2==0)?"even":"odd";
							?>							
                            <tr class="<?php echo $zibracolor; ?>">
                              <td align="center" valign="middle"><?php echo $rownum;?></td>
                              <td align="center" valign="middle"><?php echo $studentview->student_name;?></td>
                              <td align="center" valign="middle"><?php echo classname($studentview->student_classname) ;?></td>
                              <td align="center" valign="middle"><?php echo $studentview->student_phoneno  ;?></td>
                             <?php /*?> <td align="center" valign="middle"><a href=" ?pid=32&action=valuestudent&sid=<?php echo $studentview->student_id ; ?>&start=<?php echo $start; ?>"><img src="images/b_edit.png" border="0" width="15" height="15" /></a></td><?php */?>
                            </tr>
							<?php
							$rownum++;}
							} ?>
							<tr> <td colspan="6" align="right"><?php // paginateexte($start, $q_limit, $count, "&action=lstudent")?></td></tr>
							<tr>
							  <td colspan="6" align="right"> </td>
							</tr>	
							  </table>	
							<?php }
							?>
							<?php
						if($action=='plstaff')						
                              {
							  ?>
							<table width="100%" border="0" cellspacing="0" cellpadding="1" class="tbl_grid">
						
						<tr class="error_messages">
                              <td colspan="5" align="center" class="narmal"><?php if($count==0) echo "No records found" ;?></td>
                          </tr>
						<?php
							  if($count!=0)
							  {
						?>
                            
                            <tr class="bgcolor_02">
                              <td width="13%" align="center"><strong>S.No</strong></td>
                              <td width="17%" align="center"><strong>Staff&nbsp;Name </strong></td>
                              <td width="17%" align="center"><strong>Department&nbsp;Name </strong></td>
                              <td width="21%" align="center"><strong>Phone&nbsp;Number </strong></td>
                            </tr>
							<?php
							
							$rownum=1;
							foreach($stafflib as $staffview)
							{
							$zibracolor = ($rownum%2==0)?"even":"odd";
							?>							
                            <tr class="<?php echo $zibracolor; ?>">
                              <td align="center" valign="middle"><?php echo $rownum;?></td>
                              <td align="center" valign="middle"><?php echo $staffview->staffadd_name;?></td>
                              <td align="center" valign="middle"><?php echo $staffview->staffadd_deaprtment  ;?></td>
                              <td align="center" valign="middle"><?php echo $staffview->staffadd_phone  ;?></td>
                              </tr>
							<?php
							$rownum++;}
							} ?>
							<tr> <td colspan="6" align="right">&nbsp;</td></tr>
							<tr>
							  <td colspan="6" align="right">&nbsp;</td>
							</tr>		
							
                            
                            
                            
                            
                          </table>
						  <?php }
							?>
<?php if($action=='payamount_lib') { 
//array_print($_GET);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
              <tr>
                <td height="25" colspan="3" class="bgcolor_02"><strong>&nbsp;&nbsp;Pay Library Fine</strong></td>
              </tr>
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top">
				        <form action="" method="post" name="de_allocate_room_form">
						<table width="100%" cellpadding="0" cellspacing="0">
							<tr>
							    <td width="15%" height="25" align="left" valign="middle"></td>
								<td width="20%" height="25" align="left" valign="middle" class="admin">Name</td>
								<td width="2%" align="left" valign="middle" class="admin">:</td>
								<td width="63%" align="left" valign="middle"><?php echo ucfirst($result_res['name'])."&nbsp;&nbsp;"; if($sql_rs['reservetype']=="staff"){ echo  ucfirst($result_res['st_lastname']);}?></td>
							</tr>
							
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin">Type</td>
								<td align="left" valign="middle" class="admin">:</td>
								<td align="left" valign="middle"><?php echo  ucfirst($finedet['es_type']);?></td>
							</tr>
							 <?php if($finedet['es_type']=="student"){?>
							 
							 
							 <tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin">Reg No</td>
								<td align="left" valign="middle" class="admin">:</td>
								<td align="left" valign="middle"><?php echo $finedet['es_libbooksid'];?></td>
							</tr>
							 <tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin">Class</td>
								<td align="left" valign="middle" class="admin">:</td>
								<td align="left" valign="middle"><?php echo classname($result_res['pre_class']);?></td>
							</tr>
 
  
  <?php }?>
   <?php if($finedet['es_type']=="staff"){?>
  <tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin">Emp ID</td>
								<td align="left" valign="middle" class="admin">:</td>
								<td align="left" valign="middle"><?php echo $finedet['es_libbooksid'];?></td>
						  </tr>
							 <tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin">Department</td>
								<td align="left" valign="middle" class="admin">:</td>
								<td align="left" valign="middle"><?php echo  ucfirst(deptname($result_res['st_department']));?></td>
							</tr>
  
  <?php }?>
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin">Accession No</td>
								<td align="left" valign="middle" class="admin">:</td>
								<td align="left" valign="middle"><?php 
								$qr="select bki_bookid from es_bookissue  where es_bookissueid=".$finedet['es_libbookbwid'];
								$bkid=$db->getRow($qr);
								echo $bkid['bki_bookid'];?></td>
							</tr>
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin"> Title </td>
								<td align="left" valign="middle">:</td>
								<td align="left" valign="middle"><?php echo bookname($finedet['es_libbookbwid']);?></td>
							</tr>
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin">Issued On</td>
								<td align="left" valign="middle" class="admin">:</td>
								<td align="left" valign="middle"><?php echo func_date_conversion("Y-m-d","d/m/Y",$finedet['es_libbookdate']);?></td>
							</tr>
							
						
							<tr>
							    <td height="25" align="center" valign="middle" colspan="4">

									<table width="100%" cellpadding="3" cellspacing="3">
										<tr class="admin">
										        <td width="5%" align="center" valign="middle"></td>
												<td width="33%" align="center" valign="middle">Fine Amount</td>
												<td width="4%" align="center" valign="middle"></td>
												<td width="32%" align="center" valign="middle"> Amount</td>
												<td width="2%" align="center" valign="middle"></td>
												<td width="21%" align="center" valign="middle">Waived</td>
												<td width="3%"></td>
										</tr>
										<tr>
										        <td  align="center" valign="middle"></td>
												<td align="center" valign="middle" class="admin"><font color="#FF0000"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($fineamount, 2, '.', '');?></font></td><td align="center" valign="middle"></td>
										  <td align="left" valign="middle"><input type="text" name="amount_paid" value="<?php echo $amount_paid;?>"  /></td><td align="center" valign="middle"></td>
										  <td align="left" valign="middle"><input type="text" name="deduction" value="<?php echo $deduction;?>"  /></td><td></td>
										</tr>
								  </table>
								</td>
							</tr>
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin">Amount In words</td>
								<td align="left" valign="middle" class="admin">:</td>
							  <td align="left" valign="middle"><textarea name="remarks"><?php echo stripslashes($remarks); ?></textarea></td>
							</tr>
							<tr>
							    <td height="25" align="center" valign="middle" colspan="4">
									<table width="100%" border="0" cellspacing="3" cellpadding="0" >
											
											<tr>
                                       		  <td width="15%" align="left" valign="middle" class="admin">&nbsp;&nbsp;</td>
                                       		  <td width="19%" align="left" valign="middle" class="admin">Payment Mode</td>
                                       		  <td width="3%" align="left" valign="middle" class="admin">:</td>
                                       		  <td width="63%" align="left" valign="middle" class="admin"><select name="eq_paymode" style="width:150px;" onchange="Javascript:showAvatar();" >
                                               <option value="">--Select--</option>
                                                <option <?php if($eq_paymode=='cash') { echo "selected='selected'"; } ?> value ="cash">Cash</option>
                                                <option <?php if($eq_paymode=='cheque') { echo "selected='selected'"; } ?> value ="cheque">Cheque</option>
                                                <option <?php if($eq_paymode=='DD') { echo "selected='selected'"; } ?> value ="DD">DD</option>
                                              </select>
                                       		    <span class="style1">*</span></td>
                                   		    </tr>
											<tr>
											<td height="25" class="admin">&nbsp;</td>
											<td height="25" align="left" valign="middle" class="admin">Voucher&nbsp;Type</td>
											<td align="left" valign="middle" class="admin">:</td>
											<td align="left" valign="middle" class="narmal"><select name="vocturetypesel" style="width:150px;">
											  <option value="">--Select--</option>
											  <?php 
																						$voucherlistarr = voucher_finance();
																						krsort($voucherlistarr);
																						foreach($voucherlistarr as $eachvoucher) {	?>
											  <option value="<?php echo $eachvoucher['es_voucherid']; ?>" <?php if ($vocturetypesel==$eachvoucher['es_voucherid']){  
											   echo 'selected'; } ?> ><?php echo $eachvoucher['voucher_type'];                        ?> ( <?php echo $eachvoucher['voucher_mode']; ?> )</option>
											  <?php } ?>
											</select>
											  <span class="style1">*</span></td>
										    </tr>
                                            <tr>
												<td height="25" class="narmal">&nbsp;</td>
												<td height="25" align="left" valign="middle" class="admin">Ledger&nbsp;Type</td>
												<td align="left" valign="middle" class="admin">:</td>
											  <td align="left" valign="middle" class="narmal"><select name="es_ledger" style="width:150px;">
												  <option value="">--Select--</option>
												  <?php 
																							$ledgerlistarr = ledger_finance();
																							foreach($ledgerlistarr as $eachledger) { 
																							?>
												  <option value="<?php echo $eachledger['lg_name']; ?>" <?php if($es_ledger==$eachledger['lg_name']) { echo                        'selected'; } elseif($eachledger['lg_name']=='Staff Salary'){echo 'selected';} ?>><?php echo $eachledger['lg_name']; ?> </option>
												  <?php } ?>
											  </select>
											  <span class="style1">*</span></td>
											</tr>
											<tr>
                                       		  <td align="left" valign="middle" colspan="4"><div  id="patiddivdisp"  style="display:none;" >
																<table  border="1" cellspacing="0" class="tbl_grid" width="100%" cellpadding="3">
																						
																	<tr>
																		<td align="left" class="bgcolor_02" colspan="3">Bank Details </td>
																	</tr>
																	
																	<tr>
																		<td align="left"   width="22%" class="admin" >Bank Name </td>
																		<td align="center"  width="4%" class="admin">:</td>
																		<td align="left"  width="74%"><input type="text" name="es_bank_name" value="<?php echo $es_bank_name;?>" /></td>
																	</tr>
																	<tr>
																		<td align="left" class="admin"> Account Number</td>
																		<td align="center" class="admin">:</td>
																		<td align="left" ><input type="text" name="es_bankacc" value="<?php echo $es_bankacc;?>" />  <span class="style1">*</span></td>
																	</tr>
																	<tr>
																		<td align="left" class="admin">Cheque / DD Number </td>
																		<td align="center" class="admin">:</td>
																		<td align="left"><input type="text" name="es_checkno" value="<?php echo $es_checkno;?>" />  <span class="style1">*</span></td>
																	</tr>
																	<tr>
																		<td align="left" class="admin">Teller Number </td>
																		<td align="center" class="admin">:</td>
																		<td align="left"><input type="text" name="es_teller_number" value="<?php echo $es_teller_number;?>" /></td>
																	</tr>
																	<tr>
																		<td align="left" class="admin">Pin </td>
																		<td align="center" class="admin">:</td>
																		<td align="left"><input type="text" name="es_bank_pin" value="<?php echo $es_bank_pin;?>" /></td>
																	</tr>
																</table>	
																</div></td>
                                   		    </tr>
								  </table>
								</td>
							</tr>
							
							<?php if($eq_paymode!="cash" && $eq_paymode!=""){?>
							<script type="text/javascript">showAvatar()</script>
							<?php }?>
							<tr>
							    <td height="25" align="left" valign="middle"></td>
								<td height="25" align="left" valign="middle" class="admin"></td>
								<td align="left" valign="middle" class="admin"></td>
								<td align="left" valign="middle">
								<input type="hidden" name="fineamount" value="<?php echo $fineamount;?>" />
								<input type="submit" name="receive_amount" value="Pay Amount" class="bgcolor_02" /></td>
							</tr>
							
						</table>
						</form>
				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>              
              <tr>
                <td height="1" colspan="3" class="bgcolor_02"></td>
    </tr>
  </table>
<?php } ?>
                            
<?php if($action=='receipt_lib') { 

if($finedet['es_type']=="staff"){
$stff_rf="STAFF RECEIPT";

}else{
$stff_rf="STUDENT RECEIPT";

}
// insert logs
					$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_voucherentry','LIBRARY','".$stff_rf."','".$chgid."','FINE RECEPT','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
//array_print($_GET);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
         <td height="3" colspan="3"></td>
	 </tr>
            
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="left" valign="top">
				   <table width="100%" border="0">
					  <tr>
						<td>
								<table width="100%" border="0">
								  <tr>
									<td width="50%"><table width="100%" border="0">
										  <tr>
											
											<td width="25%" height="25" align="left" valign="middle" class="admin">Receipt&nbsp;No</td>
											<td width="2%" align="left" valign="middle" class="admin">:</td>
											<td width="73%" align="left" valign="middle">LF<?php echo $chgid;?></td>
										  </tr>
										  <tr>
											
											<td height="25" align="left" valign="middle" class="admin">Name</td>
											<td align="left" valign="middle" class="admin">:</td>
											<td align="left" valign="middle"><?php echo ucfirst($result_res['name'])."&nbsp;&nbsp;"; if($finedet['es_type']=="staff"){ echo  ucfirst($result_res['st_lastname']);}?></td>
										</tr>
										  <tr>
										
											<td height="25" align="left" valign="middle" class="admin"> Title </td>
											<td align="left" valign="middle" class="admin">:</td>
											<td align="left" valign="middle"><?php 
											$aql="select bki_bookid from es_bookissue  where es_bookissueid =".$finedet['es_libbookbwid'];
											$bnm=$db->getrow($aql);
											echo bookname($bnm['bki_bookid']);?></td>
										</tr>
										
										</table></td>
									<td><table width="100%" border="0">
										  <tr>
												
												<td width="25%" height="25" align="left" valign="middle" class="admin">Receipt&nbsp;Date</td>
												<td width="2%" align="left" valign="middle" class="admin">:</td>
												<td width="73%" align="left" valign="middle"><?php echo func_date_conversion("Y-m-d","d/m/Y",$finedet['paid_on']); ?></td>
										  </tr>
										  <tr>
												
												<td width="25%" height="25" align="left" valign="middle" class="admin">Type</td>
												<td width="2%" align="left" valign="middle" class="admin">:</td>
												<td width="73%" align="left" valign="middle"><?php  echo $finedet['es_type'];?></td>
										  </tr>
										  <tr>
											
											<td height="25" align="left" valign="middle" class="admin">Identification&nbsp;No</td>
											<td align="left" valign="middle">:</td>
											<td align="left" valign="middle"><?php if($finedet['es_type']=="staff"){
													$stfdept=$db->getRow("select  st_department  from es_staff where es_staffid=".$finedet['es_libbooksid']);
											echo "".$finedet['es_libbooksid']."&nbsp;(".deptname($stfdept['st_department'])."&nbsp;Department)";
									
											
											
											
											
											
											
											
											}if($finedet['es_type']=="student"){
											
											$clas=$db->getRow("select  pre_class  from es_preadmission  where es_preadmissionid=".$finedet['es_libbooksid']);
											
											echo "".$finedet['es_libbooksid']."&nbsp;(".classname($clas['pre_class'])." Class)";}?></td>
										</tr>
										
										</table></td>	
									
								  </tr>
								</table>

						</td>
					  </tr>
					  <tr>
						<td><table width="100%" border="0">
							  <tr class="admin">
								
								<td align="left">Fine Amount</td>
								<td align="left">Waived</td>
								<td align="left">Amount Received</td>
							  </tr>
							  <tr>
								
								<td align="left"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($finedet['es_libbookfine'], 2, '.', '');?></td>
								<td align="left"><?php echo  $_SESSION['eschools']['currency']."&nbsp;".number_format($finedet['fine_deducted'], 2, '.', '');?></td>
								<td align="left"><?php echo $_SESSION['eschools']['currency']."&nbsp;".number_format($finedet['fine_paid'], 2, '.', '');?></td>
							  </tr>
							</table>
                      </td>
					  </tr>
					  <tr>
						<td><table width="100%" border="0">
							  <tr>
								<td align="left" valign="middle"><b>Rupees in Words: <?php if($finedet['remarks']!=""){ echo $finedet['remarks'];}else{echo "------";}?></b> </td>
							  </tr>
							</table>
						</td>
					  </tr>
					  <tr>
						<td><table width="100%" border="0">
							  <tr>
								<td align="right" valign="middle" class="admin">Authorised Signature</td>
							  </tr>
							  <tr>
								<td>&nbsp;</td>
							  </tr>
							  <tr>
								<td>&nbsp;</td>
							  </tr>
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
  </table>
<?php } ?>

<?php
if($action=='finepayments')
{
?>
 <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
 <tr>
 <td>&nbsp;</td>
 </tr>
 <tr>
    <td height="25" align="left" valign="middle" class="bgcolor_02">&nbsp;&nbsp;<span class="admin"> Library Fine</span></td>
 </tr>
  <form action="" method="post">
<tr>
        <td><table>
		
		<tr>
        <td align="left" valign="middle" class="narmal">Search</td>
		<td align="left" valign="middle" class="narmal">
		<select name="payment_stafforstudent" style="width:120px;">
		  <option value="all">All</option>
                       <?php 
					     if (count($paymentsearchtypearray)>0){
					      foreach($paymentsearchtypearray as $key=>$value){
					   ?>
                         <option value="<?php echo $key; ?>"  <?php echo ($key==$payment_stafforstudent)?"selected":""?>><?php echo $value; ?></option>
                         <?php }} ?>
                     </select>
	
</td>
		<td align="left" valign="middle" class="narmal">&nbsp;</td>
		<td align="left" valign="middle" class="narmal"><input name="search_allpayments" type="submit" class="bgcolor_02" value="Search"  style="cursor:pointer"/></td>
		<td></td>
		

		</tr>
		
		</table>
		
		</td>
</tr></form>
 <tr><td height="15px">&nbsp;</td></tr>
	<tr>
		<td>
			<table width="100%" border="0" cellspacing="0" cellpadding="1" class="tbl_grid">
				<tr class="bgcolor_02">
					<td width="8%" class="admin" align="center">SNo</td>
					<td width="21%" class="admin" align="center">Name</td>
					<td width="13%" class="admin" align="center">&nbsp;Type</td>
					<td width="17%" class="admin" align="center">Total&nbsp;Fine </td>
					<td width="15%" class="admin" align="center">&nbsp;Total&nbsp;Paid</td>
					<td width="16%" class="admin" align="center">&nbsp;Total&nbsp;Waived</td>
					<td width="10%" class="admin" align="center">&nbsp;Action</td>
				</tr>
<?php
	   
						  $rownum=$start+1;
					  if($totalcount> 0){						
				      	foreach ($book_fineamount as $eachrecord){
						 
						
					  $zibracolor = ($rownum%2==0)?"even":"odd";
			
?>
				<tr class="<?php echo $zibracolor; ?>">
					<td class="narmal" align="center"><?php echo $rownum; ?></td>
						<td class="narmal" align="center"><?php if($eachrecord['es_type']=="student"){ $studentname=get_studentdetails($eachrecord['es_libbooksid']);echo $studentname['pre_name'];} 
						if($eachrecord['es_type']=="staff"){ $staffname=get_staffdetails($eachrecord['es_libbooksid']);echo $staffname['st_firstname']." ".$staffname['st_lastname'];
						}?></td>
					<td class="narmal" align="center"><?php echo $eachrecord['es_type'];?></td>
					<td class="narmal" align="center"><?php echo  $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['totalfine'], 2, '.', '');?></td>
					<td class="narmal" align="center"><?php if($eachrecord['paidam']!="0"){ echo  $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['paidam'], 2, '.', '');}else{echo "----";}?></td>
				<td class="narmal" align="center"><?php if($eachrecord['waived']!="0"){ echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['waived'], 2, '.', '');}else{echo "----";}?></td>
					<td class="narmal" align="center">
					<?php if (in_array("16_27", $admin_permissions)) {?>
					<?php if($eachrecord['es_type']=="staff"){?>
					
					<a href="?pid=32&action=facultyrecard1&serid=<?php echo $eachrecord['es_libbooksid'];?>" ><img src="images/b_browse.png" border="0" title="View" alt="View" /></a>
					<?php }?>
					
					<?php if($eachrecord['es_type']=="student"){?>
					<a href="?pid=32&action=studentrecard1&serid=<?php echo $eachrecord['es_libbooksid'];?>" ><img src="images/b_browse.png" border="0" title="View" alt="View" /></a>
					<?php }?>
					<?php }else{ echo "-"; }?>
					</td>
                    </tr>
<?php
					 $rownum++;
				}
					 
		?>
			
			<tr>
					<td colspan="7" align="center"><?php paginateexte($start, $q_limit, $totalcount, "action=finepayments".$pageurl) ?></td>
				</tr>
				<tr><td colspan="7" align="right"><?php if (in_array("16_28", $admin_permissions)) {?><input name="printSubmit" type="button" onclick="newWindowOpen ('?pid=32&action=allpayprints&payment_stafforstudent=<?php echo $payment_stafforstudent;?>');" class="bgcolor_02" value="Print" style="cursor:pointer;"/><?php }?></td></tr>
			<?php } else{?>

			<tr><td colspan="7" class="narmal" align="center">No Records Found</td></tr>
				<?php }
?>
				
								
				
			</table></td></tr>
 </table>
		
		<?php }?>
		
		<?php
if($action=='allpayprints')
{
	$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`) VALUES('".$_SESSION['eschools']['admin_id']."','es_libbookfinedet','LIBRARY','ALL FINES','".$ids."','FINES PRINT','".$_SERVER['REMOTE_ADDR']."',NOW())";
	$log_insert_exe=mysql_query($log_insert_sql);
	
?>
 <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">

 <tr><td height="15px">&nbsp;</td></tr>
	<tr>
		<td>
			<table width="100%" border="0" cellspacing="0" cellpadding="1" class="tbl_grid">
				<tr class="bgcolor_02">
					<td width="8%" class="admin" align="center">SNo</td>
					<td width="21%" class="admin" align="center">Name</td>
					<td width="13%" class="admin" align="center">&nbsp;Type</td>
					<td width="17%" class="admin" align="center">Total&nbsp;Fine </td>
					<td width="15%" class="admin" align="center">&nbsp;Total&nbsp;Paid</td>
					<td width="16%" class="admin" align="center">&nbsp;Total&nbsp;Waived</td>
					
				</tr>
<?php
	   
						  $rownum=$start+1;
									
				      	foreach ($book_fineamount as $eachrecord){
						 
						
					  $zibracolor = ($rownum%2==0)?"even":"odd";
			
?>
				<tr class="<?php echo $zibracolor; ?>">
					<td class="narmal" align="center"><?php echo $rownum; ?></td>
						<td class="narmal" align="center"><?php if($eachrecord['es_type']=="student"){ $studentname=get_studentdetails($eachrecord['es_libbooksid']);echo $studentname['pre_name'];} 
						if($eachrecord['es_type']=="staff"){ $staffname=get_staffdetails($eachrecord['es_libbooksid']);echo $staffname['st_firstname']." ".$staffname['st_lastname'];
						}?></td>
					<td class="narmal" align="center"><?php echo $eachrecord['es_type'];?></td>
					<td class="narmal" align="center"><?php echo  $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['totalfine'], 2, '.', '');?></td>
					<td class="narmal" align="center"><?php if($eachrecord['paidam']!="0"){ echo  $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['paidam'], 2, '.', '');}else{echo "----";}?></td>
				<td class="narmal" align="center"><?php if($eachrecord['waived']!="0"){ echo $_SESSION['eschools']['currency']."&nbsp;".number_format($eachrecord['waived'], 2, '.', '');}else{echo "----";}?></td>
					
                    </tr>
<?php
					 $rownum++;
				}
					 
		?>
			
			
	
				
								
				
			</table></td></tr>
 </table>
		
		<?php }?>

                        
	</td>
	
      </tr>
    </table></td>
		<td width="1" class="bgcolor_02"></td>
	</tr>
	<tr><td height="1" colspan="3" class="bgcolor_02"></td></tr>
</table>
<?php } ?>
<?php  if($action=="print_list_category"){
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	       VALUES('".$_SESSION['eschools']['admin_id']."','es_categorylibrary','Library','Category','','Print','".$_SERVER['REMOTE_ADDR']."',NOW())";
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
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Book Category List </span></td>
              </tr>	
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="center" valign="top"><br />
				<table width="100%" border="0" cellspacing="0" cellpadding="1" class="tbl_grid">
                          
                          <tr class="bgcolor_02">
                            <td width="6%" class="admin" align="center">S No</td>
                            <td width="15%" class="admin" align="center">Name</td>
                            
                          </tr>
                          <?php
						  if (isset($categoryview)&&is_array($categoryview))
						  {
					  $rownum = 1;	
					  foreach ($categoryview as $categoryview1){
					  $zibracolor = ($rownum%2==0)?"even":"odd";	
					  ?>
                          <tr class="<?php echo $zibracolor; ?>">
                            <td class="narmal" align="center"><?php echo $rownum; ?></td>
                            <td class="narmal" align="center"><?php echo $categoryview1->lb_categoryname; ?></td>
                           </tr>
                         
                           <?php
					 $rownum++;}
					 }
					 ?>
					 
                        </table>
				
                
				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
             
               
              
              
  		     <tr><td colspan="3" class="bgcolor_02" height="1"></td></tr>
			  
			  
   
</table>

<?php } ?>
<?php  if($action=="print_list_subcategory"){
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	       VALUES('".$_SESSION['eschools']['admin_id']."','es_subcategory','Library','Subcategory','','Print','".$_SERVER['REMOTE_ADDR']."',NOW())";
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
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Book Subcategory List </span></td>
              </tr>	
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="center" valign="top"><br />
				<table width="100%" border="0" cellspacing="0" cellpadding="1" class="tbl_grid">
                          
                          <tr class="bgcolor_02">
                            <td width="6%" class="admin" align="center">S No</td>
                            <td width="15%" class="admin" align="center">Category Name</td>
							<td width="15%" class="admin" align="center">Sub Category Name</td>
                            
                          </tr>
                          <?php
						  if (isset($subcategoryview)&&is_array($subcategoryview))
						  {
					  $rownum = 1;	
					  foreach ($subcategoryview as $subcategoryview1){
					  $zibracolor = ($rownum%2==0)?"even":"odd";
					  $cid=$subcategoryview1->subcat_catname;
					  $catname =$es_categorylibrary ->Get($cid);
					  	
					  ?>
                          <tr class="<?php echo $zibracolor; ?>">
                            <td class="narmal" align="center"><?php echo $rownum; ?></td>
                            <td class="narmal" align="center"><?php echo $catname ->lb_categoryname; ?></td>
							 <td class="narmal" align="center"><?php echo $subcategoryview1->subcat_scatname; ?></td>
                            
                          
                          </tr>
                          <?php
					 $rownum++;}
					 }
					 ?>
					 
                        </table>
				
                
				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
             
               
              
              
  		     <tr><td colspan="3" class="bgcolor_02" height="1"></td></tr>
			  
			  
   
</table>

<?php } ?>

<?php  if($action=="print_list_publishers"){
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	       VALUES('".$_SESSION['eschools']['admin_id']."','es_libaraypublisher','Library','Publisher/Supplier','','Print','".$_SERVER['REMOTE_ADDR']."',NOW())";
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
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Publishers List </span></td>
              </tr>	
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="center" valign="top"><br />
				<table width="100%" border="0" cellspacing="0" cellpadding="1" class="tbl_grid" align="center">
                          
                          <tr class="bgcolor_02">
                            <td width="10%" class="admin" align="center">S&nbsp;No</td>
                            <td width="15%" class="admin" align="center">Publisher / Supplier</td>
                            <td width="15%" class="admin" align="center">Name</td>
                            <td width="12%" class="admin" align="center">City</td>
							<td width="12%" class="admin" align="center">State</td>
							<td width="12%" class="admin" align="center">Mobile</td>	
							<td width="12%" class="admin" align="center">Email</td>						
                          
                          </tr>
                          <?php
						  if (isset($publisherview)&&is_array($publisherview))
						  {
					  $rownum = 1;	
					  foreach ($publisherview as $publisherview1){
					  $zibracolor = ($rownum%2==0)?"even":"odd";	
					  ?>
                          <tr class="<?php echo $zibracolor; ?>">
                            <td class="narmal" align="center"><?php echo $rownum; ?></td>
                            <td class="narmal" align="center"><?php if($publisherview1->status=="active") echo "Publisher"; else echo "Supplier"; ?></td>
                            <td class="narmal" align="center"><?php echo $publisherview1->library_publishername; ?></td>
							<td class="narmal" align="center"><?php echo $publisherview1->library_city; ?></td>
							<td class="narmal" align="center"><?php echo $publisherview1->libaray_state; ?></td>
							<td class="narmal" align="center"><?php echo $publisherview1->librray_mobileno; ?></td>
							<td class="narmal" align="center"><?php echo $publisherview1->libarary_email; ?></td>
						</tr>
                          <?php
					 $rownum++;}
					 }
					 ?>
					 
                        </table>
				
                
				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
             
               
              
              
  		     <tr><td colspan="3" class="bgcolor_02" height="1"></td></tr>
			  
			  
   
</table>

<?php } ?>

<?php  if($action=="print_list_booksavailable"){
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	       VALUES('".$_SESSION['eschools']['admin_id']."','es_libbook','Library','All Books','','Print','".$_SERVER['REMOTE_ADDR']."',NOW())";
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
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">View All Books</span></td>
              </tr>	
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="center" valign="top"><br />
				<table width="100%" border="0" cellspacing="0" cellpadding="1" class="tbl_grid">
				<tr class="bgcolor_02">
					<td width="6%" class="admin" align="center">S No</td>
					<td width="14%" class="admin" align="center">Accession No </td>
					<td width="20%" class="admin" align="center">Title</td>
					
					<td width="20%" class="admin" align="center">&nbsp;Author</td>	
					
				</tr>
<?php
	   
		if (isset($bookview)&&is_array($bookview)){
			$rownum = $start+1;
				
			if (count($bookview)>=1){
			//array_print($bookview);
				foreach ($bookview as $bookview1){
				$zibracolor = ($rownum%2==0)?"even":"odd";	
?>
				<tr class="<?php echo $zibracolor; ?>">
					<td class="narmal" align="center"><?php echo $rownum; ?></td>
					<td class="narmal" align="center"><?php echo $bookview1->lbook_aceesnofrom; ?></td>
					<td class="narmal" align="center"><?php echo $bookview1->lbook_title ; ?></td>
					
					<td class="narmal" align="center"><?php echo $bookview1->lbook_author; ?></td>
					</tr>
<?php
					 $rownum++;
				}
					 
			}else{
				echo"<tr><td colspan='6'height='20px'></td></tr><tr><td colspan='6' class='narmal' align='center'>No Records Found</td></tr>";
				}
?>
				
				  <?php
				  }
				  ?>
			</table>
				
                
				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
             
               
              
              
  		     <tr><td colspan="3" class="bgcolor_02" height="1"></td></tr>
			  
			  
   
</table>

<?php } ?>
<?php  if($action=="print_list_books_avialability"){
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	       VALUES('".$_SESSION['eschools']['admin_id']."','es_libbook','Library','Books Availability','','Print','".$_SERVER['REMOTE_ADDR']."',NOW())";
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
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin">Books Available</span></td>
              </tr>	
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="center" valign="top"><br />
				<table width="100%" border="0" cellspacing="0" cellpadding="1" class="tbl_grid">
				<tr class="bgcolor_02">
					<td width="11%" align="center" valign="top" class="admin">SNo</td>
					<td width="10%" align="center" valign="top" class="admin">Accession No</td>
					<td width="19%" align="center" valign="top" class="admin">Title</td>
					
					<td width="19%" align="center" valign="top" class="admin">Category / Subcategory</td>
					<td width="16%" align="center" valign="top" class="admin">AUTHOR</td>
					<td width="20%" align="center" valign="top" class="admin">&nbsp;PUBLISHER</td>
					<td width="24%" align="left" valign="top" class="admin">&nbsp;STATUS</td>
				</tr>
<?php
	   
						  $rownum=$start+1;
					  if($totalcount> 0){						
				      	foreach ($book_availabilitylist as $eachrecord){
						 $sql="select * from es_book_reservation where book_id=". $eachrecord['es_libbookid'] ." and expired_on >='".date("Y-m-d")."' AND status='active'";
						$num=sqlnumber($sql);
						
					  $zibracolor = ($rownum%2==0)?"even":"odd";
			
?>
				<tr class="<?php echo $zibracolor; ?>">
					<td class="narmal" align="center"><?php echo $rownum; ?></td>
					<td class="narmal" align="center"><?php echo $eachrecord['es_libbookid'];?></td>
					<td class="narmal" align="center"><?php echo $eachrecord['lbook_title'];?></td>
					
					
					<td class="narmal" align="center"><?php echo libcategoryname($eachrecord['lbook_category']); if($eachrecord['lbook_booksubcategory']!=""){ ?><br />
						[ <?php echo libsubctegoryname($eachrecord['lbook_booksubcategory']);  ?> ]<?php }?></td>
					<td class="narmal" align="center"><?php echo $eachrecord['lbook_author'];?></td>
				<td class="narmal" align="center"><?php if($publishersArr[$eachrecord['lbook_publishername']]!=""){ echo $publishersArr[$eachrecord['lbook_publishername']];}else{echo "----";}?></td>
					<td class="narmal" align="left"><span style="color:#52CF62; font-size:12px; font-weight:bold;"><?php if($eachrecord['issuestatus']=="issued"){echo "Issued";}else{echo "Not Issued";}?></span>&nbsp;<?php  if($eachrecord['issuestatus']=="notissued" && $num>0) { ?>
						&nbsp;&nbsp;<span style="color:#FF0000; font-size:12px; font-weight:bold;">Reserved</span><?php }?></td>
                    </tr>
<?php
					 $rownum++;
				}
					 
		?>
			
			
			<?php } else{?>

			<tr><td colspan="6" class="narmal" align="center">No Records Found</td></tr>
				<?php }
?>
				
				
			</table>
				
                
				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
             
               
              
              
  		     <tr><td colspan="3" class="bgcolor_02" height="1"></td></tr>
			  
			  
   
</table>
<?php } ?>
<?php  if($action=="print_list_books_issuedstudent"){
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	       VALUES('".$_SESSION['eschools']['admin_id']."','es_bookissue','Library','Books Issued To Students','','Print','".$_SERVER['REMOTE_ADDR']."',NOW())";
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
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin"> Books Issued To Students</span></td>
              </tr>	
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="center" valign="top"><br />
				<table width="100%" border="0" cellspacing="0" cellpadding="1" class="tbl_grid">
				<tr class="bgcolor_02">
					<td width="6%" class="admin" align="center">S No</td>
					<td width="14%" class="admin" align="center"><span class="narmal">Name </span></td>
					<td width="13%" class="admin" align="center"><span class="narmal">&nbsp;Class</span></td>
					
				</tr>
<?php
	   
						  $rownum=$start+1;
					  if($totalcount > 0){						
				      	foreach ($issue_book_stude as $eachrecord){
					  $zibracolor = ($rownum%2==0)?"even":"odd";
			
?>
				<tr class="<?php echo $zibracolor; ?>">
					<td class="narmal" align="center"><?php echo $rownum; ?></td>
					<td class="narmal" align="center"><?php echo $eachrecord['pre_name'];?>(<?php echo $eachrecord['es_preadmissionid'];?>)</td>
					<td class="narmal" align="center"><?php echo classname($eachrecord['pre_class']);?></td>
					
				
                    </tr>
<?php
					 $rownum++;
				}
					 
		?>
			
			<tr>
					<td colspan="4" align="center"><?php paginateexte($start, $q_limit, $totalcount, "action=books_issuedstudent".$pageurl) ?></td>
				</tr>
			<?php } else{
				echo"<tr><td colspan='4' height='20px'></td></tr><tr><td colspan='6' class='narmal' align='center'>No Records Found</td></tr>";
				}
?>
				
				
			</table>
				
                
				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
             
               
              
              
  		     <tr><td colspan="3" class="bgcolor_02" height="1"></td></tr>
			  
			  
   
</table>
<?php } ?>
<?php  if($action=="print_list_books_issuefaculty"){
$log_insert_sql="INSERT INTO es_userlogs (`user_id`,`table_name`,`module`,`submodule`,`record_id`,`action`,`ipaddress`,`posted_on`)
	       VALUES('".$_SESSION['eschools']['admin_id']."','es_bookissue','Library','Books Issued To Staff','','Print','".$_SERVER['REMOTE_ADDR']."',NOW())";
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
                <td height="25" colspan="3" class="bgcolor_02">&nbsp;&nbsp;<span class="admin"> Books Issued To Staff</span></td>
              </tr>	
              <tr>
                <td width="1" class="bgcolor_02"></td>
                <td align="center" valign="top"><br />
				<table width="100%" border="0" cellspacing="0" cellpadding="1" class="tbl_grid">
				<tr class="bgcolor_02">
					<td width="6%" class="admin" align="center">S No</td>
					<td width="14%" class="admin" align="center"><span class="narmal">Name </span></td>
					<td width="14%" class="admin" align="center"><span class="narmal">Department </span></td>
					<td width="14%" class="admin" align="center"><span class="narmal">Post </span></td>
					
				</tr>
<?php

	   
						  $rownum=$start+1;
					  if($totalcount > 0){						
				      	foreach ($issue_book_staff as $eachrecord){
					  $zibracolor = ($rownum%2==0)?"even":"odd";
			
?>
				<tr class="<?php echo $zibracolor; ?>">
					<td class="narmal" align="center"><?php echo $rownum; ?></td>
					<td class="narmal" align="center"><?php echo $eachrecord['st_firstname']."&nbsp;".$eachrecord['st_lastname'];?>(<?php echo $eachrecord['es_staffid']; ?>)</td>
					<td class="narmal" align="center"><?php echo deptname($eachrecord['st_department']);?></td>
					<td class="narmal" align="center"><?php echo postname($eachrecord['st_post']);?></td>
					
				
                    </tr>
<?php
					 $rownum++;
				}
					 
		?>
			
			
			<?php } else{
				echo"<tr><td colspan='4' height='20px'></td></tr><tr><td colspan='6' class='narmal' align='center'>No Records Found</td></tr>";
				}
?>
				
				
			</table>
				
                
				</td>
                <td width="1" class="bgcolor_02"></td>
              </tr>
             
               
              
              
  		     <tr><td colspan="3" class="bgcolor_02" height="1"></td></tr>
			  
			  
   
</table>
<?php } ?>
