
<script type="text/javascript">
function mmLoadMenus() {
if (window.mm_menu_0716170010_0) return;
    window.mm_menu_0716170010_0 = new Menu("root",125,18,"Verdana, Arial, Helvetica, sans-serif",12,"#333333","#FFFFFF","#FFFFFF","#71D0D2","left","middle",3,0,1000,-5,7,true,true,true,0,true, true);
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
   window.mm_menu_0823152718_0 = new Menu("root",180,18,"Verdana, Arial, Helvetica, sans-serif",12,"#333333","#FFFFFF","#FFFFFF","#71D0D2","left","middle",3,0,1000,-5,7,true,true,true,0,true,true);
<?php if($_SESSION['eschools']['login_type']=="student"){?>
 mm_menu_0823152718_0.addMenuItem("My&nbsp;books","location='?pid=44&action=studentrecard1'");
  mm_menu_0823152718_0.addMenuItem("Reserved&nbsp;Books","location='?pid=44&action=books_avialability'");
 <?php }?>
 <?php if($_SESSION['eschools']['login_type']=="staff"){?>
 mm_menu_0823152718_0.addMenuItem("My&nbsp;books","location='?pid=44&action=facultyrecard1'");
 mm_menu_0823152718_0.addMenuItem("Reserved&nbsp;Books","location='?pid=44&action=books_avialability'");
<?php }?>
 
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
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
         <td height="3" colspan="3"></td>
	 </tr>
	
	<tr>
		<td width="1" class="bgcolor_02"></td>
		<td  align="left" valign="top">
	 <?php if ( $action != 'student_record_print' && $action!='faculty_record_print') { ?>
	<table width="100%" border="0" cellpadding="0" cellspacing="0" >
	<tr>
		<td height="25" colspan="3" class="bgcolor_02">
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
				<tr>
				 <td width="24%" align="center" class="admin"><a href="#" name="link7"class="admin" id="link5" onmouseover="MM_showMenu(window.mm_menu_0823152718_0,0,14,null,'link7')" onmouseout="MM_startTimeout();">View Reports</a></td>
                    <td width="76%" align="left" valign="top" class="admin"><a href=" ?pid=15" target="_blank"class="admin">OPAC</a></td>
                </tr>
			</table>
		</td>
	</tr>
	</table>
	<?php }?>

	
					<?php
					if($action=='first')
					{
					?>
					<table align="center" class="tbl_grid" width="100%">
					<tr height="400">
					<td align="center" class="narmal"><strong>Welcome To the Library</strong></td>
					</tr>
					</table>
					<?php
					}
					?>	
					<?php
			if($action=='studentrecard1')
			{
			$es_staffview = $es_search->GetList(array(array("pre_status", "=", 'active')) );
			?>
			
			<script type="text/javascript" >
				function newWindowOpen(href) {
							window.open(href,null,'width=800,height=400,scrollbar=yes,toolbar=no,directions=no,menubar=yes,left=140,right=40');
				}
			</script>
			
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
                            <td width="17%" class="narmal"></td>
                            <td width="26%" class="narmal">
							</td>
                            <td width="23%" class="narmal"></td>
                            <td width="34%" class="narmal"></td>
                          </tr>
                          
                          </table>
                        <table width="100%" border="1" cellspacing="0" cellpadding="1" class="tbl_grid">
						<?php
						if($action=='studentrecard1')
						
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
                              <td width="8%" align="center"><strong>Book&nbsp;No</strong></td>
                              <td width="14%" align="center"><strong>Book&nbsp;Name<br />[Category]<br />[Subcategory]</strong></td>
                              <td width="12%" align="center"><strong>Issued on</strong></td>
                              <td width="14%" align="center"><strong>Returned&nbsp;on</strong></td>
                              <td width="12%" align="center"><strong>Fine&nbsp;Amount</strong></td>
							   <td width="12%" align="center"><strong>Fine&nbsp;Paid</strong></td>
							    <td width="12%" align="center"><strong>Fine&nbsp;Waived</strong></td>
								
                            </tr>
							<?php
							
							$rownum=1;
							foreach($es_studentbookList as $eachrecord)
							{
								$zibracolor = ($rownum%2==0)?"even":"odd";
								 $bookdet=$es_libbook ->Get($eachrecord['bki_bookid']);
								 //array_print($bookdet);
							 $res="";
							  $sql="select * from es_libbookfinedet where es_libbookbwid=".$eachrecord['es_bookissueid'];
							$nm=sqlnumber($sql);
							if($nm > 0){
							$res=$db->getRow($sql);
							$returndate=formatDBDateTOCalender($res['es_libbookdate']);
							}else{
							$returndate="---";
							}
							if($bookdet->lbook_category!=""){
							$category = $db->getone("SELECT lb_categoryname FROM es_categorylibrary WHERE es_categorylibraryid=".$bookdet->lbook_category);
							}
							if($bookdet->lbook_booksubcategory!=""){
							$sub_category = $db->getone("SELECT subcat_scatname FROM es_subcategory WHERE es_subcategoryid=".$bookdet->lbook_booksubcategory);
							}
							?>
                            <tr class="<?php echo $zibracolor; ?>">
                              <td align="center" valign="middle"><?php echo $rownum;?></td>
                              <td align="center" valign="middle"><?php echo $bookdet->lbook_aceesnofrom;?></td>
                              <td align="center" valign="middle"><?php echo $bookdet->lbook_title;?><?php if($category!=""){?><br />[<?php echo $category ;?>]<?php } if($sub_category!=""){?><br />[<?php echo $sub_category ;?>]<?php }?></td>
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
							$rownum++;} ?>
							<tr> <td colspan="9" align="right"><?php paginateexte($start, $q_limit, $count, "&action=studentrecard1&serid=".$serid )?></td></tr>
							<tr><td colspan="9" align="right"><input type="button" value="Print" onclick="newWindowOpen('?pid=44&action=student_record_print<?php echo $studentUrl;?>');"  class="bgcolor_02" style="cursor:pointer;"/></td></tr>	
							<?php } ?>
								
							<?php }
							?>
                          </table>
                        </td>
                      </tr>
              </table>
					
					<?php
					}
					?>
					
					
					<?php if ($action == 'student_record_print') { ?>
				<table border="0" cellpadding="0" cellspacing="0"  width="100%"  class="tbl_grid">
						<tr class="bgcolor_02">
                              <td width="9%" align="center"><strong>S.No</strong></td>
                              <td width="14%" align="center"><strong>Book No</strong></td>
                              <td width="14%" align="center"><strong>Book Name<br />[Category]<br />[Subcategory]</strong></td>
                              <td width="22%" align="center"><strong>Issued on</strong></td>
                              <td width="21%" align="center"><strong>Returned on</strong></td>
                              <td width="20%" align="center"><strong>Fine&nbsp;Amount</strong></td>
							   <td width="21%" align="center"><strong>Fine&nbsp;Paid</strong></td>
                              <td width="20%" align="center"><strong>Fine&nbsp;Waived</strong></td>
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
							if($bookdet->lbook_category!=""){
							$category = $db->getone("SELECT lb_categoryname FROM es_categorylibrary WHERE es_categorylibraryid=".$bookdet->lbook_category);
							}
							if($bookdet->lbook_booksubcategory!=""){
							$sub_category = $db->getone("SELECT subcat_scatname FROM es_subcategory WHERE es_subcategoryid=".$bookdet->lbook_booksubcategory);
							}
							
							
							?>
                            <tr class="<?php echo $zibracolor; ?>">
                              <td align="center" valign="middle"><?php echo $rownum;?></td>
                              <td align="center" valign="middle"><?php echo $bookdet->lbook_aceesnofrom;?></td>
                              <td align="center" valign="middle"><?php echo $bookdet->lbook_title;?><?php if($category!=""){?><br />[<?php echo $category ;?>]<?php } if($sub_category!=""){?><br />[<?php echo $sub_category ;?>]<?php }?></td>
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
					
					
					<?php
			if($action=='facultyrecard1')
						
                              {
							  
							  $es_staffview = $es_staff ->GetList(array(array("status", "=", 'added')) );
	
				
			?>
			<script type="text/javascript" >
				function newWindowOpen(href) {
							window.open(href,null,'width=900,height=500,scrollbar=yes,toolbar=no,directions=no,menubar=yes,left=140,right=40');
				}
			</script>
							  
                        <table width="100%" border="1" cellspacing="0" cellpadding="1" class="tbl_grid">
                            
                        
						<?php 
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
                              <td width="8%" align="center"><strong>Book&nbsp;No</strong></td>
                              <td width="14%" align="center"><strong>Book&nbsp;Name<br />[Category]<br />[Subcategory]</strong></td>
                              <td width="12%" align="center"><strong>Issued on</strong></td>
                              <td width="14%" align="center"><strong>Returned&nbsp;on</strong></td>
                              <td width="12%" align="center"><strong>Fine&nbsp;Amount</strong></td>
							   <td width="12%" align="center"><strong>Fine&nbsp;Paid</strong></td>
							   <td width="12%" align="center"><strong>Fine&nbsp;Waived</strong></td>
								 
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
							if($bookdet->lbook_category!=""){
							$category = $db->getone("SELECT lb_categoryname FROM es_categorylibrary WHERE es_categorylibraryid=".$bookdet->lbook_category);
							}
							if($bookdet->lbook_booksubcategory!=""){
							$sub_category = $db->getone("SELECT subcat_scatname FROM es_subcategory WHERE es_subcategoryid=".$bookdet->lbook_booksubcategory);
							}
						
							 
                         
						
                                              		
							?>
                             <tr class="<?php echo $zibracolor; ?>">
                              <td align="center" valign="middle"><?php echo $rownum;?></td>
                              <td align="center" valign="middle"><?php echo $bookdet->lbook_aceesnofrom;?></td>
                              <td align="center" valign="middle"><?php echo $bookdet->lbook_title;?><?php if($category!=""){?><br />[<?php echo $category ;?>]<?php } if($sub_category!=""){?><br />[<?php echo $sub_category ;?>]<?php }?></td>
                              <td align="center" valign="middle"><?php echo formatDBDateTOCalender($eachrecord['issuedate']);?></td>
                              <td align="center" valign="middle"><?php echo $returndate;?></td>
                            <td align="center" valign="middle"><?php if($res['es_libbookfine']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($res['es_libbookfine'], 2, '.', '');}else{echo "---";}?></td>
							    <td align="center" valign="middle"><?php if($res['fine_paid']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($res['fine_paid'], 2, '.', '');}else{echo "---";}?></td>
                              <td align="center" valign="middle"><?php if($res['fine_deducted']>0){echo $_SESSION['eschools']['currency']."&nbsp;".number_format($res['fine_deducted'], 2, '.', '');}else{echo "---";}?></td>
                              
                            </tr>
                           
							 <?php
							 $rownum++;}
		                     ?>
                        
           
                         
							<?php
							
							} ?>
							<tr> <td colspan="8" align="right"><?php paginateexte($start, $q_limit, $count, "&action=facultyrecard1&serid=".$serid )?></td></tr>
							<tr><td colspan="8" align="right"><input type="button" value="Print" onclick="newWindowOpen('?pid=44&action=faculty_record_print<?php echo $facultyUrl;?>');"  class="bgcolor_02" style="cursor:pointer;"/></td></tr>		
							
                            
                            
                          
                          </table>
						  <?php 
}
							?>
					<?php if ($action == 'faculty_record_print') { ?>
				<table width="100%" border="0" cellpadding="0" cellspacing="0"   class="tbl_grid">	
						<tr class="bgcolor_02">
                              <td width="5%" align="center"><strong>S.No</strong></td>
                              <td width="8%" align="center"><strong>Book&nbsp;No</strong></td>
                              <td width="14%" align="center"><strong>Book&nbsp;Name<br />[Category]<br />[Subcategory]</strong></td>
                              <td width="12%" align="center"><strong>Issued on</strong></td>
                              <td width="14%" align="center"><strong>Returned&nbsp;on</strong></td>
                              <td width="12%" align="center"><strong>Fine&nbsp;Amount</strong></td>
							   <td width="12%" align="center"><strong>Fine&nbsp;Paid</strong></td>
							    <td width="12%" align="center"><strong>Fine&nbsp;Waived</strong></td>
								
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
							if($bookdet->lbook_category!=""){
							$category = $db->getone("SELECT lb_categoryname FROM es_categorylibrary WHERE es_categorylibraryid=".$bookdet->lbook_category);
							}
							if($bookdet->lbook_booksubcategory!=""){
							$sub_category = $db->getone("SELECT subcat_scatname FROM es_subcategory WHERE es_subcategoryid=".$bookdet->lbook_booksubcategory);
							}
							?>
                             <tr class="<?php echo $zibracolor; ?>">
                              <td align="center" valign="middle"><?php echo $rownum;?></td>
                              <td align="center" valign="middle"><?php echo $bookdet->lbook_aceesnofrom;?></td>
                              <td align="center" valign="middle"><?php echo $bookdet->lbook_title;?><?php if($category!=""){?><br />[<?php echo $category ;?>]<?php } if($sub_category!=""){?><br />[<?php echo $sub_category ;?>]<?php }?></td>
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
if($action=='books_avialability')
{
?>
 <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
 <tr>
 <td>&nbsp;</td>
 </tr>
 
 
 <tr>
    <td height="25" align="left" valign="middle" class="bgcolor_02">&nbsp;&nbsp;<span class="admin"> Books</span></td>
                        
 </tr>

<tr>
        <td><table>
		
		<tr>
        <td align="left" valign="middle" class="narmal"></td>
		<td align="left" valign="middle" class="narmal">
		
	
</td>
		<td align="left" valign="middle" class="narmal">&nbsp;</td>
		<td align="left" valign="middle" class="narmal"></td>
		<td></td>
		

		</tr>
		
		</table>
		
		</td>
</tr>
 <tr><td height="15px">&nbsp;</td></tr>
	<tr>
		<td>
			<table width="100%" border="0" cellspacing="0" cellpadding="1" class="tbl_grid">
				<tr class="bgcolor_02">
					<td width="11%" class="admin" align="center">SNo</td>
					<td width="10%" class="admin" align="center"><span class="narmal">BOOK NO </span></td>
					<td width="19%" class="admin" align="center"><span class="narmal">&nbsp;BOOK NAME<br />[Category]<br />[Subcategory]</span></td>
					<td width="16%" class="admin" align="center"><span class="narmal">AUTHOR </span></td>
					<td width="21%" class="admin" align="center"><span class="narmal">&nbsp;PUBLISHER</span></td>
					<td width="23%" class="admin" align="center"><span class="narmal">&nbsp;STATUS</span></td>
				</tr>
<?php
	   
						  $rownum=$start+1;
					  if($totalcount> 0){						
				      	foreach ($book_availabilitylist as $eachrecord){
						/* $sql="select * from es_book_reservation where book_id=". $eachrecord['es_libbookid'] ." and expired_on >='".date("Y-m-d")."' AND status='active' AND  and staff_or_student_id=".$_SESSION['eschools']['user_id'].")";
						$num=sqlnumber($sql);*/
						 $sql1="select * from es_libaraypublisher where es_libaraypublisherid=".$eachrecord['lbook_publishername']. "";
						
						$publishers=$db->getrow($sql1);
					  $zibracolor = ($rownum%2==0)?"even":"odd";
					  
					  if($bookdet->lbook_category!=""){
							$category = $db->getone("SELECT lb_categoryname FROM es_categorylibrary WHERE es_categorylibraryid=".$eachrecord['lbook_category']);
							}
							if($bookdet->lbook_booksubcategory!=""){
							$sub_category = $db->getone("SELECT subcat_scatname FROM es_subcategory WHERE es_subcategoryid=".$eachrecord['lbook_booksubcategory']);
							}
			
?>
				<tr class="<?php echo $zibracolor; ?>">
					<td class="narmal" align="center"><?php echo $rownum; ?></td>
					<td class="narmal" align="center"><?php echo $eachrecord['es_libbookid'];?></td>
					<td class="narmal" align="center"><?php echo $eachrecord['lbook_title'];?><?php if($category!=""){?><br />[<?php echo $category ;?>]<?php } if($sub_category!=""){?><br />[<?php echo $sub_category ;?>]<?php }?></td>
					<td class="narmal" align="center"><?php echo $eachrecord['lbook_author'];?></td>
				<td class="narmal" align="center">
				
				
				<?php if($eachrecord['lbook_publishername']!=""){ echo $publishers['library_publishername'];}else{echo "----";}?></td>
					<td class="narmal" align="left"><span style="color:#52CF62; font-size:12px; font-weight:bold;"><?php if($eachrecord['issuestatus']=='issued') {echo "-Issued" ;} else{ echo "Not Issued"; }?></span>&nbsp;<?php  if($eachrecord['issuestatus']=="notissued") { ?>
						&nbsp;&nbsp;<span style="color:#FF0000; font-size:12px; font-weight:bold;">Reserved</span><?php }?></td>
                    </tr>
<?php
					 $rownum++;
				}
					 
		?>
			
			<tr>
					<td colspan="6" align="center"><?php paginateexte($start, $q_limit, $totalcount, "action=books_avialability".$pageurl) ?></td>
				</tr>
			<?php } else{?>

			<tr><td colspan="6" class="narmal" align="center">No Records Found</td></tr>
				<?php }
?>
				
				
			</table></td></tr>
 </table>
		<?php }?>

	</td>
		<td width="1"></td>
	</tr>
	
</table>

