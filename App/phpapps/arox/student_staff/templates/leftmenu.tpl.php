<?php 
$edit_mod = $db->getRow("SELECT * FROM es_modules_alloted  WHERE id=1");
$max_students=$edit_mod['max_no_students'];
$max_courses=$edit_mod['max_no_courses'];
$modules_permissions=$edit_mod['modules_permissions'];

$top_level_permissions= explode(',', $modules_permissions);

?>
<script type="text/javascript" src="includes/js/leftmenu/jquery_google.js"></script>
<script type="text/javascript" src="includes/js/leftmenu/ddaccordion.js"></script>
<script type="text/javascript">
ddaccordion.init({
	headerclass: "expandable", //Shared CSS class name of headers group that are expandable
	contentclass: "categoryitems", //Shared CSS class name of contents group
	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
	mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
	defaultexpanded: [0], //index of content(s) open by default [index1, index2, etc]. [] denotes no content
	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
	animatedefault: false, //Should contents open by default be animated into view?
	persiststate: true, //persist state of opened contents within browser session?
	toggleclass: ["", "openheader"], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["prefix", "", ""], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
	oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
	}
})
</script>
<style type="text/css">
.arrowlistmenu{
width: 160px; /*width of accordion menu*/
}
.arrowlistmenu .menuheader{ /*CSS class for menu headers in general (expanding or not!)*/
font: bold 10px Arial, Helvetica, sans-serif;
color: #000000;
/*background:url(js/titlebar.png);*/
/*background: black url(titlebar.png) repeat-x center left;*/
/*background-color:#999999;*/
margin-bottom: 2px; /*bottom spacing between header and rest of content*/
text-transform: uppercase;
padding: 3px 0 0px 0px; /*header text is indented 10px*/
cursor: hand;
cursor: pointer;
font-size: 100%;
}
.arrowlistmenu .openheader{ /*CSS class to apply to expandable header when it's expanded*/
/*background-image: url(js/titlebar-active.png);*/
/*background-color:#555B5C;*/
}
.arrowlistmenu ul{ /*CSS for UL of each sub menu*/
list-style-type: none;
margin: 0;
padding: 0;
margin-bottom: 2px; /*bottom spacing between each UL and rest of content*/
}
.arrowlistmenu ul li{
padding-bottom: 2px; /*bottom spacing between menu items*/
color: #000000;
display: block;
padding: 2px 0;
padding-left: 12px; 
text-decoration: none;
font-size: 90%;
font: bold 12px Arial, Helvetica, sans-serif;
}
.arrowlistmenu ul li a{
color: #000000;
display: block;
padding: 0 0;
padding-left: 20px; /*link text is indented 19px*/
text-decoration: none;
font-size: 90%;
font: normal 12px Arial, Helvetica, sans-serif;
}
.arrowlistmenu ul li a:visited{
/*color: #555B5C;*/
}
.arrowlistmenu ul li a:hover{ /*hover state CSS*/
color: #990000;
}
.mainsidelink {
color: #000000;
text-decoration:none;
}

.mainsidelink :hover{
color: #000000;
text-decoration:none;
}
</style>

<?php 
	//Student module left menu
	if ($_SESSION['eschools']['login_type']=="student"){ 
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="35" align="center" class="left_student">&nbsp;</td>
  </tr>
  <tr>
    <td><div class="arrowlistmenu">

<div class="menuheader" style="cursor: default">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td width="27%"><img src="images/myprofile_32.png" /></td>
    <td width="73%"><a href="?pid=2&action=viewprofile" class="mainsidelink">My Profile</a></td>
  </tr>
</table>
</div>
<?php if (in_array('18_p', $top_level_permissions) ){?>
<div class="menuheader" style="cursor: default">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td width="27%"><img src="images/attendance_32.png" /></td>
    <td width="73%"><a href="?pid=3&action=stud_report" class="mainsidelink">Attendance</a></td>
  </tr>
 <!--<tr>
    <td width="27%"><img src="images/attendance_32.png" /></td>
    <td width="73%"><a href="?pid=58&action=edit_stud_attendence">Edit Attendance</a></td>
	<!--<li><a href="?pid=27&action=edit_stud_attendence">Edit Attendance</a></li>
  </tr>-->
 
</table></div>
<?php }?>
<?php if (in_array('7_p', $top_level_permissions) ){?>
<div class="menuheader" style="cursor: default">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td width="27%"><img src="images/assignment_32.png" /></td>
    <td width="73%"><a href="?pid=12&action=myassignment" class="mainsidelink">Assignment</a></td>
  </tr>
</table></div>
<?php }?>
<?php if (in_array('6_p', $top_level_permissions) ){?>
<div class="menuheader expandable"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="27%"><img src="images/feepayment_32.png" /></td>
    <td width="73%">Fee</td>
  </tr>
</table></div>
<ul class="categoryitems">
<li><a href="?pid=10&action=viewfeedetails" class="mainsidelink">View Fee Details</a></li>
<li><a href="?pid=10&action=finedetails" class="mainsidelink">View Misc. Fines </a></li>
</ul>
<?php }?>
<?php if (in_array('17_p', $top_level_permissions) ){?>
<div class="menuheader expandable"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="27%"><img src="images/exam_32.png" /></td>
    <td width="73%">Examination</td>
  </tr>
</table></div>
<ul class="categoryitems">
<?php /*?><li><a href="?pid=17&action=student_exportexam" class="mainsidelink">Export Exam</a></li>
<li><a href="?pid=17&action=classwise" class="mainsidelink">View Result</a></li><?php */?>
<?php /*?>
<li><a href="?pid=50&action=createxamexport">Export Create Exam</a></li>
<li><a href="?pid=50&action=stud_report" class="mainsidelink">View Result</a></li><?php */?>

<li><a href="?pid=53&action=student_exportexamd" class="mainsidelink">Export Exam</a></li>
<li><a href="?pid=53&action=classwiseviewresult" class="mainsidelink">View Result</a></li>

</ul>

<?php }?>
<?php if (in_array('15_p', $top_level_permissions) ){?>
<div class="menuheader" style="cursor: default">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td width="27%"><img src="images/time_table_32.png" /></td>
	 <td width="73%"><a href="?pid=52&action=viewtimetable1" class="mainsidelink">Time Table</a></td>
    <td width="73%"><?php /*?><a href="#" onclick="window.open('?pid=51&action=free_staff')" class="mainsidelink">Time Table</a><a href="?pid=50&action=time_table" class="mainsidelink">Time Table</a></td>
	
	<td width="73%"><a href="?pid=52&action=viewtimetable1" class="mainsidelink">Time Table</a><?php */?></td>


  </tr>
</table></div>
<?php }?>
<?php if (in_array('8_p', $top_level_permissions) ){?>


<div class="menuheader expandable"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="27%"><img src="images/tutorials_32.png" /></td>
    <td width="73%">Study Material</td>
  </tr>
</table></div>
<ul class="categoryitems">

<li><a href="?pid=34&action=tutorialslist">Tutorial</a></li>
<li><a href="?pid=35&action=bookletlist">Booklet</a></li>


</ul>
<?php }?>
<?php /*if (in_array('19_p', $top_level_permissions) ){ ?>
<div class="menuheader expandable"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="37px"><img src="images/hostel_32.png" /></td>
    <td >Hostel</td>
  </tr>
</table></div>
<ul class="categoryitems">
<li><a href="?pid=47&action=view_room_details">View Details</a></li>
<li><a href="?pid=47&action=viewdetails">View Bills</a></li>
</ul>
<?php }*/?>
<?php if (in_array('14_p', $top_level_permissions) ){ ?>
<div class="menuheader expandable">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="27%"><img src="images/transport_32.png" /></td>
    <td width="73%">Transport</td>
  </tr>
</table>
</div>
<ul class="categoryitems">
<li><a href="?pid=42&action=mydetails">My Route/Board Details</a></li>
<li><a href="?pid=43&action=alldetails">View All Routes/Boards</a></li>
</ul>
<?php }?>
<?php /*?><div class="menuheader" style="cursor: default">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td width="27%"><img src="images/transport_32.png" /></td>
    <td width="73%"><a href="?pid=6&action=addtransport" class="mainsidelink">Transport</a></td>
  </tr>
</table></div><?php */?>
<?php if (in_array('22_p', $top_level_permissions) ){ ?>

<div class="menuheader expandable">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td width="27%"><img src="images/notice_32.png" /></td>
    <td width="73%">Notice</td>
  </tr>
</table></div>
<ul class="categoryitems">
<li><a href="?pid=30&action=mails_received">Received Notices</a></li>
<li><a href="?pid=30&action=sentmails">Replied Notices</a></li></ul>
<?php }?>
<?php if (in_array('20_p', $top_level_permissions) ){ ?>
<div class="menuheader expandable"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="27%"><img src="images/compose_message_32.png" /></td>
    <td width="73%">Message</td>
  </tr>
</table></div>
<ul class="categoryitems">
<li><a href="?pid=27&action=mails_received">Message Inbox</a></li>
<li><a href="?pid=27&action=sentmails">Sent Messages</a></li>
<li><a href="?pid=27&action=mailtoadmin">Compose Message</a></li>
<!--<li><a href="?pid=27&action=mailtoadmin">Compose</a></li>-->
<!--<li><a href="?pid=27&action=mailtostaff">To Faculty</a></li>-->
<!--<li><a href="?pid=27&action=mailtostudents">To Students</a></li>-->
</ul>
<?php }?>
<?php if (in_array('16_p', $top_level_permissions) ){?>

<!--<div class="menuheader" style="cursor: default">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td width="27%"><img src="images/library_32.png" /></td>
    <td width="73%"><a href="?pid=44&action=first" class="mainsidelink">Library</a></td>
  </tr>
</table></div>
-->

<?php }?>
<?php if (in_array('30_p', $top_level_permissions) ){ ?>
<div class="menuheader expandable"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="27%"><img src="images/knowledge_base_32.png" /></td>
    <td width="73%">Knowledge Base</td>
  </tr>
</table></div>
<ul class="categoryitems">
<li><a href="?pid=4&action=know_categ">Search Articles</a></li>
</ul>
<?php }?>
<?php if (in_array('27_p', $top_level_permissions) ){ ?>

<div class="menuheader" style="cursor: default">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td width="27%"><img src="images/holiday_32.png" /></td>
    <td width="73%"><a href="?pid=29&action=holidayslist" class="mainsidelink">Holidays</a></td>
  </tr>
</table></div>
<?php }?>
<?php if (in_array('35_p', $top_level_permissions) ){ ?>

<div class="menuheader" style="cursor: default">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td width="27%"><img src="images/addons_32.png" /></td>
    <td width="73%"><a href="?pid=49" class="mainsidelink">Helpful Links </a></td>
  </tr>
</table></div>
<?php }?>
<?php if (in_array('25_p', $top_level_permissions) ){ ?>
<div class="menuheader" style="cursor: default">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<!--<tr>
    <td width="27%"><img src="images/photo_gallery_32.png" /></td>
    <td width="73%" ><a href="?pid=41&action=albumlist" class="mainsidelink">Photo Album</a></td>
  </tr>-->
</table></div>
<?php }?>
<?php if (in_array('26_p', $top_level_permissions) ){ ?>
<div class="menuheader" style="cursor: default">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<!--<tr>
    <td width="27%"><img src="images/video_32.png" /></td>
    <td width="73%"><a href="?pid=32&action=gallerylist" class="mainsidelink">Videos</a></td>
  </tr>-->
</table></div>
<?php }?>
<?php if (in_array('31_p', $top_level_permissions) ){ ?>
<div class="menuheader" style="cursor: default">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td width="27%"><img src="images/notice_board_32.png" /></td>
    <td width="73%"><a href="?pid=33&action=noticeboard" class="mainsidelink">Notice Board</a></td>
  </tr>
</table></div>
<?php }?>
</td>
  </tr>
</table>


<?php 
	}
/***
* Staff module left menu
*/	
	if ($_SESSION['eschools']['login_type']=="staff"){ 
	$staff_permissions_arr = array();
	
	$staff_det = $db->getrow("SELECT * FROM es_staff WHERE es_staffid=".$_SESSION['eschools']['user_id']);
	$staff_TYPE = $staff_det["teach_nonteach"];
	$staff_permisions = $staff_det["st_permissions"];
	
	if($staff_permisions!=""){
	$staff_permissions_arr = explode(",",$staff_permisions);
	}
	
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="35" align="center" class="left_staff">&nbsp;</td>
  </tr>
  <tr>
    <td>
<div class="arrowlistmenu">
<div class="menuheader" style="cursor: default">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td width="27%"><img src="images/myprofile_32.png" /></td>
    <td width="73%"><a href="?pid=16&action=viewprofile" class="mainsidelink">My Profile</a></td>
  </tr>
</table></div>
<?php if (in_array('18_p', $top_level_permissions) ){?>
<div class="menuheader expandable">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="27%"><img src="images/attendance_32.png" /></td>
    <td width="73%">Attendance</td>
  </tr>
</table>
</div>
<ul class="categoryitems">
<?php if($staff_TYPE =='teaching' && in_array('2', $staff_permissions_arr)){?>
<!--<li><a href="?pid=19&action=slip">Attendance Slips</a></li>-->
<li><a href="?pid=55&action=stud_attend">Student Attendance</a></li>
<li><a href="?pid=55&action=stud_report">Student Report</a></li>
<li><a href="?pid=55&action=class_report">Class Report</a></li>
<?php }?>
<li><a href="?pid=56&action=staff_report">View My Report</a></li>
</ul>
<?php }?>
<?php if(in_array('14_p', $top_level_permissions)){?>
<div class="menuheader expandable">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="27%"><img src="images/transport_32.png" /></td>
    <td width="73%">Transport</td>
  </tr>
</table>
</div>
<ul class="categoryitems">
<li><a href="?pid=46&action=mydetails">My Route/Board Details</a></li>
<li><a href="?pid=43&action=alldetails">View All Routes/Boards</a></li>
</ul>
<?php }?>
<?php if (in_array('15_p', $top_level_permissions) && $staff_TYPE =='teaching'){?>
<div class="menuheader expandable">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td width="27%"><img src="images/time_table_32.png" /></td>
    <td width="73%">Time Table</td>
  </tr>
</table></div>
<ul class="categoryitems">
<li><a href="?pid=52&action=timetable">Class wise timetables</a></li>
<?php /*?><li><a href="?pid=45&action=timetable">Staff wise timetables</a></li><?php */?>
<li><a href="?pid=54&action=staff">Staff wise timetables</a></li>
<?php /*?><li><a href="?pid=50&action=time_table">Time Table</a></li><?php */?>
 <?php /*?><td width="73%"><a href="#" onclick="window.open('?pid=51&action=free_staff')" class="mainsidelink">Time Table</a><a href="?pid=50&action=time_table" class="mainsidelink">Time Table</a></td><?php */?>
<?php /*?><li><a href="?pid=54&action=free_staff">Time Table</a></li><?php */?>

<li><a href="#" onclick="window.open('?pid=54&action=free_staff')">Free Staff Time Table</a></li>


</ul>
<?php }?>
<?php if (in_array('16_p', $top_level_permissions) && $staff_TYPE =='teaching' ){?>

<div class="menuheader" style="cursor: default">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<!--<tr>
    <td width="27%"><img src="images/library_32.png" /></td>
  <td width="73%"><a href="?pid=44&action=first" class="mainsidelink">Library</a></td>  
  </tr>-->
</table></div>
<?php }?>

<?php if(in_array('11_p', $top_level_permissions)){?>

<div class="menuheader expandable"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="27%"><img src="images/salary_32.png" /></td>
    <td width="73%">Salary</td>
  </tr>
</table></div>
<ul class="categoryitems">
<li><a href="?pid=20&action=viewsalary">View Salary</a></li>
<li><a href="?pid=20&action=loanissueslist">View Loan</a></li>
</ul>
<div class="menuheader" style="cursor: default">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td width="27%"><img src="images/leave_32.png" /></td>
    <td width="73%"><a href="?pid=24&action=Leave" class="mainsidelink">Annual Leaves</a></td>
  </tr>
</table></div>
<?php }?>


<?php if (in_array('7_p', $top_level_permissions) && $staff_TYPE =='teaching' && in_array('1', $staff_permissions_arr) ){?>
<div class="menuheader expandable"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="27%"><img src="images/assignment_32.png" /></td>
    <td width="73%">Assignment</td>
  </tr>
</table></div>
<ul class="categoryitems">
<li><a href="?pid=21&action=addassignment">Add Assignment</a></li>
<li><a href="?pid=21&action=view">View Assignment</a></li>
</ul>
<?php }?>
<?php if (in_array('8_p', $top_level_permissions) && $staff_TYPE =='teaching'){?>
<div class="menuheader expandable"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="27%"><img src="images/tutorials_32.png" /></td>
    <td width="73%">Study Material</td>
  </tr>
</table></div>
<ul class="categoryitems">
<li><a href="?pid=36&action=list">Add&nbsp;Tutorial</a></li>
<li><a href="?pid=37&action=list">Add&nbsp;Booklet</a></li>
<li><a href="?pid=39&action=list">Question Bank</a></li>
</ul>
<?php }?>


<?php if (in_array('17_p', $top_level_permissions) && $staff_TYPE =='teaching' ){?>

<div class="menuheader expandable"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="27%"><img src="images/exam_32.png" /></td>
    <td width="73%">Examination</td>
  </tr>
</table></div>
<ul class="categoryitems">

<?php if(in_array('3', $staff_permissions_arr) ){?>
<li><a href="?pid=17&action=createxam">Create&nbsp;Exam</a></li>
<li><a href="?pid=17&action=exportexam">Export&nbsp;Exam</a></li>
<?php }?>
<li><a href="?pid=17&action=examlistforstaff">View&nbsp;Exam</a></li>
<?php  if(in_array('4', $staff_permissions_arr) ){?>
<li><a href="?pid=53&action=marksentry">Subjectwise&nbsp;Marks</a></li>
<li><a href="?pid=53&action=stdmarksentry">Studentwise&nbsp;Marks</a></li>

<?php }?>
<!--<li><a href="?pid=57&action=allstudents">Students&nbsp;Performance</a></li>-->
</ul>
<?php }?>
<?php if (in_array('22_p', $top_level_permissions) ){ ?>
<div class="menuheader expandable">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td width="27%"><img src="images/notice_32.png" /></td>
    <td width="73%">Notice</td>
  </tr>
</table></div>
<ul class="categoryitems">
<li><a href="?pid=31&action=mails_received">Received Notices</a></li>
<li><a href="?pid=31&action=sentmails">Replied Notices</a></li></ul>
<?php 
}?>
<?php if (in_array('20_p', $top_level_permissions)  ){ ?>

<div class="menuheader expandable"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="27%"><img src="images/compose_message_32.png" /></td>
    <td width="73%">Message</td>
  </tr>
</table></div>
<ul class="categoryitems">
<li><a href="?pid=28&action=mails_received">Message Inbox</a></li>
<li><a href="?pid=28&action=sentmails">Sent Messages</a></li>
<li><b>Compose Message</b></li>
<li><a href="?pid=28&action=mailtoadmin">To Admin</a></li>
<li><a href="?pid=28&action=mailtostaff">To Staff</a></li>
<li><a href="?pid=28&action=mailtostudents">To Students</a></li>
</ul>
<?php }?>
<?php if (in_array('30_p', $top_level_permissions) ){ ?>
<div class="menuheader expandable"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="28%"><img src="images/knowledge_base_32.png" /></td>
    <td width="72%">Knowledge Base </td>
  </tr>
</table></div>
<ul class="categoryitems">
<li><a href="?pid=18&action=know_category">Create Category</a></li>
<li><a href="?pid=18&action=know_categ">Search Articles</a></li>
</ul>
<?php }?>
<!--<div class="menuheader" style="cursor: default">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td width="27%"><img src="images/resign_32.png" /></td>
    <td width="73%"><a href="?pid=25&action=res_format" class="mainsidelink">Resignation</a></td>
  </tr>
</table></div>-->
<?php /*if (in_array('19_p', $top_level_permissions) ){ ?>
<div class="menuheader expandable"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="37px"><img src="images/hostel_32.png" /></td>
    <td >Hostel</td>
  </tr>
</table></div>
<ul class="categoryitems">
<li><a href="?pid=48&action=view_room_details">View Details</a></li>
<li><a href="?pid=48&action=viewdetails">View Bills</a></li>
</ul>
<?php }*/?>
<?php if (in_array('27_p', $top_level_permissions) ){ ?>
<div class="menuheader" style="cursor: default">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td width="27%"><img src="images/holiday_32.png" /></td>
    <td width="73%"><a href="?pid=29&action=holidayslist" class="mainsidelink">Holidays</a></td>
  </tr>
</table>
</div>
<?php }?>
<?php if (in_array('25_p', $top_level_permissions) ){ ?>
<div class="menuheader" style="cursor: default">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<!--<tr>
    <td width="27%"><img src="images/photo_gallery_32.png" /></td>
    <td width="118" ><a href="?pid=41&action=albumlist" class="mainsidelink">Photo Album</a></td>
  </tr>-->
</table></div> 
<?php }?>
<?php if (in_array('26_p', $top_level_permissions) ){ ?>
<div class="menuheader" style="cursor: default">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<!--<tr>
    <td width="27%"><img src="images/video_32.png" /></td>
    <td width="73%"><a href="?pid=32&action=gallerylist" class="mainsidelink">Videos</a></td>
  </tr>-->
</table></div>
<?php }?>
<?php if (in_array('31_p', $top_level_permissions) ){ ?>
<div class="menuheader" style="cursor: default">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td width="27%"><img src="images/notice_board_32.png" /></td>
    <td width="73%"><a href="?pid=33&action=noticeboard" class="mainsidelink">Notice Board</a></td>
  </tr>
</table></div>
<?php }?>
</td>
  </tr>
</table>
<?php  } ?>