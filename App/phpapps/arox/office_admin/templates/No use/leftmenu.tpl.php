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
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="35" align="center" class="left_admin">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top"><div class="arrowlistmenu">

<?php $admin_permissions = explode(',', $permissions['admin_permissions']);
					if (in_array('1', $admin_permissions)){?>
<div class="menuheader expandable">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="images/administrator_32.png" /></td>
    <td>Administration</td>
  </tr>
</table>
</div>
<ul class="categoryitems">
<li><a href="?pid=42&action=adminlist">Admin List</a></li>
<li><a href="?pid=42&action=addadmin">Add Admin</a></li>
</ul>
<?php }if (in_array('24', $admin_permissions)){?>
<div class="menuheader expandable">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="27%"><img src="images/setup_32.png" /></td>
    <td width="73%">Setup</td>
  </tr>
</table></div>
<ul class="categoryitems">
<li><a href="?pid=22&action=school_details">School Details</a></li>					
<li><a href="?pid=20&action=manageclasses" >Add&nbsp;Classes/Subjects</a></li>
<li><a href="?pid=47&action=manageexams" >Add Exams</a></li>
<li><a href="?pid=17&action=createfeetypes" >Add New Fees </a></li>
<li><b>Create Department</b></li>
<li><a href="?pid=49&action=department">Add Department</a></li>
<li><b>Create Payroll</b></li>
<li><a href="?pid=29&action=leavemaster">Create Annual leave</a></li>
<li><a href="?pid=29&action=allowencemaster">Create Allowance Type</a></li>
<li><a href="?pid=29&action=deductionsmaster">Create Deduction Type</a></li>
<li><a href="?pid=29&action=loanmaster">Create a Loan</a></li>
<li><a href="?pid=29&action=taxmaster">Create a Tax</a></li>
<li><a href="?pid=29&action=pfmaster"> Create PF</a></li>
<li><b>Create Accounts</b></li>
<li><a href="?pid=22&action=master_group">Create&nbsp;Account Groups</a></li>
<li><a href="?pid=22&action=ledger">Create&nbsp;Account&nbsp;Ledger</a></li>
<li><a href="?pid=22&action=voucher">Create&nbsp;Voucher</a></li>
<li><b>Create Inventory</b></li>
<li><a href="?pid=7&action=addinventory">Create Inventory Type</a></li>
<li><a href="?pid=7&action=addcategory">Add Product Category</a></li>
<li><a href="?pid=7&action=additem">Add an Item</a></li>
<li><a href="?pid=7&action=addsupply">Add New Supplier</a></li>
</ul>
	<?php }?>
<div class="menuheader expandable"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="27%"><img src="images/tutorials_32.png" /></td>
    <td width="73%">Tutorials</td>
  </tr>
</table></div>
<ul class="categoryitems">
<li><a href="?pid=51&action=list">Add&nbsp;Units</a></li>
<li><a href="?pid=59&action=list">Add&nbsp;Chapter</a></li>
<li><a href="?pid=60&action=list">Add&nbsp;Tutorial</a></li>
<li><a href="?pid=61&action=list">Add&nbsp;Booklet</a></li>
</ul>
<?php if (in_array('2', $admin_permissions)){ ?>
<div class="menuheader expandable"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="27%"><img src="images/frontoffice_32.png" /></td>
    <td width="73%">Front Office</td>
  </tr>
</table></div>
<ul class="categoryitems">
<li><a href="?pid=8">Enquiry Form</a></li>
<li><a href="?pid=2&action=list_enquiry">Enquiry List</a></li>
<li><a href="?pid=3&action=list_enquiry">Admitted Students List</a></li>
 <!--<li> <a href="report.html"class="menutitlein">Reports</a><br /> </li>-->
<!--<li><a href="?pid=3">Entrance Test</a></li>-->
</ul>
<?php }if (in_array('3', $admin_permissions)){?>
<div class="menuheader" style="cursor: default">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td width="27%"><img src="images/preadmission_32.png" /></td>
    <td width="73%"><a href="?pid=5" class="mainsidelink">&nbsp;Pre Admission</a></td>
  </tr>
</table></div>
<?php }if (in_array('4', $admin_permissions)){?>
<div class="menuheader expandable"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="27%"><img src="images/student_32.png" /></td>
    <td width="73%">Student</td>
  </tr>
</table></div>

<ul class="categoryitems">
<li><a href="?pid=21&action=serchclass">Search Student Record</a></li>
<li><a href="?pid=21&action=classrecards">Update Class Record</a></li>
</ul>
<?php }if (in_array('6', $admin_permissions)){?>
<div class="menuheader expandable"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="27%"><img src="images/feepayment_32.png" /></td>
    <td width="73%">Fee Payment</td>
  </tr>
</table></div>
<ul class="categoryitems">
<li><a href="?pid=17&action=viewfees">Fee Details</a></li>
<li><a href="?pid=40&action=payfee">Pay Fee</a></li>
<li><a href="?pid=40&action=feepaidlist&pre_class=ALL">Paid Fee List</a></li>
<li><a href="?pid=40&action=categorywisefee">Category Fee Details</a></li>
<li><a href="?pid=40&action=outstandingfees&pre_class=ALL">Outstanding Fees</a></li>
<!--<li><a href="?pid=40&action=fee_list">Fee Payment Details</a></li>
-->
</ul>
<div class="menuheader" style="cursor: default">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td width="27%"><img src="images/help_32.png" /></td>
    <td width="73%"><a href="?pid=53&action=view" class="mainsidelink">Help Desk</a></td>
  </tr>
</table></div>
<?php }if (in_array('7', $admin_permissions)){?>

<div class="menuheader expandable"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="27%"><img src="images/assignment_32.png" /></td>
    <td width="73%">Assignment</td>
  </tr>
</table></div>
<ul class="categoryitems">
<li><a href="?pid=4&action=view">View Assignment</a></li>
</ul>
<?php }if (in_array('8', $admin_permissions)){?>
<div class="menuheader expandable"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="27%"><img src="images/hrd_32.png" /></td>
    <td width="73%">HRD</td>
  </tr>
</table></div>
<ul class="categoryitems">
<li><a href="?pid=9&action=post_vacancy">Post Vacancy</a></li>
<li><a href="?pid=9&action=list_classifieds">Classifieds</a></li>
<li><a href="?pid=23&action=applicant_enquiries">Applicant Enquiries</a></li>
<li><a href="?pid=23&action=search_applicants">Search Applicants</a></li>
<li><a href="?pid=23&action=take_interview">Take interview</a></li>
<li><a href="?pid=15&action=applicants_list">Applicants List</a></li>
<li><a href="?pid=46&action=addnewstaff">Add Staff</a></li>
<!--<li><a href="?pid=46&action=nonstaff">Add Non Teaching Staff</a></li>-->
<li><a href="?pid=23&action=letter_formats">Letter Formats</a></li>
<!--<li><a href="?pid=23&action=offerletterview">Offer Latter Master</a></li>-->
<!--<li><a href="?pid=23&action=tcviewstudent">Tc Master</a></li>-->
<!--<li><a href="?pid=23&action=tcview">Resigantion Genaration</a></li>-->
<li><a href="?pid=23&action=offerlettergenration">Generate Offer Letter</a></li>
<li><a href="?pid=23&action=issuetcforstudent">Generate TC (Student)</a></li>
<li><a href="?pid=23&action=issuetcstaff">Termination Letter (Staff)</a></li>
</ul>
<?php }if (in_array('9', $admin_permissions)){?>
<div class="menuheader expandable"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="27%"><img src="images/staff_32.png" /></td>
    <td width="73%">Staff</td>
  </tr>
</table></div>
<ul class="categoryitems">
<li><a href="?pid=46&action=addnewstaff">Add Staff</a></li>
<li><a href="?pid=15&action=staffviewing">View Staff</a></li>
</ul>
<?php }if (in_array('10', $admin_permissions)){?>
<div class="menuheader expandable">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="27%"><img src="images/payroll_32.png" /></td>
    <td width="73%">Payroll</td>
  </tr>
</table></div>
<ul class="categoryitems">
<li><b>Employee</b></li>
<li><a href="?pid=35&action=issueloan">Issue loan</a></li>
<li><b>Payslip Generation</b></li>
<li><a href="?pid=35&action=employeewisepayslip">Employee Payslip</a></li>
<li><a href="?pid=35&action=paysliplist">Payslip List</a></li>
<!--<li><a href="?pid=35&action=yearwisepayslip">Year wise pay slip</a></li>
-->
</ul>
<?php }if (in_array('11', $admin_permissions)){?>
<div class="menuheader expandable"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="28%"><img src="images/financial_accounting_32.png" /></td>
    <td width="72%">Financial Accounting </td>
  </tr>
</table></div>
<ul class="categoryitems">
<li><b>Transaction</b></li>
<li><a href="?pid=24&action=voucher_entry">Voucher Entry</a></li>
<li><b>Report</b></li>
<li><a href="?pid=25&action=balancesheet">Balance Sheet</a></li>
<li><a href="?pid=25&action=ledger">Ledger Summary</a></li>

</ul>
<?php }if (in_array('12', $admin_permissions)){?>
<div class="menuheader expandable"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="27%"><img src="images/inventory_32.png" /></td>
    <td width="73%">Inventory </td>
  </tr>
</table></div>
<ul class="categoryitems">
<li><a href="?pid=7&action=add_order">Purchase Order</a></li>
<li><a href="?pid=7&action=goods_reciept">Goods Receipt Note</a></li>
<li><a href="?pid=7&action=goods_issue">Goods Issue Note</a></li>
<li><a href="?pid=7&action=return_issue">Issue Return Note</a></li>
<li><a href="?pid=7&action=stock_details">Stock Details</a></li>
<li><a href="?pid=7&action=inventory_reports">Inventory Reports</a></li>
</ul>
<?php }if (in_array('13', $admin_permissions)){?>
<div class="menuheader expandable"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="27%"><img src="images/transport_32.png"  height="32" width="32" border="0"/></td>
    <td width="73%">Transport </td>
  </tr>
</table></div>
<ul class="categoryitems">
<li><a href="?pid=11&action=addtransport">Add Transport Form</a></li>
<li><a href="?pid=11&action=maintenance">Maintenance Details</a></li>
<li><a href="?pid=11&action=viewreport">View Report</a></li>
</ul>
<div class="menuheader expandable"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="27%"><img src="images/compose_message_32.png" /></td>
    <td width="73%"> Message </td>
  </tr>
</table></div>
<ul class="categoryitems">
<li><a href="?pid=50&action=mails_received" class="mainsidelink">View Inbox</a></li>
<li><b>Compose Message</b></li>
<li><a href="?pid=50&action=mailtoadmin">Admin</a></li>
<li><a href="?pid=50&action=mailtostaff">Staff</a></li>
<li><a href="?pid=50&action=mailtostudents">Students</a></li>
</ul>
<div class="menuheader expandable"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="27%"><img src="images/sms_32.png" /></td>
    <td width="73%">SMS</td>
  </tr>
</table></div>
<ul class="categoryitems">
<li><a href="?pid=62&action=smstostaff">Staff</a></li>
<li><a href="?pid=62&action=smstostudents">Students</a></li>
</ul>

<div class="menuheader expandable"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="27%"><img src="images/notice_32.png" /></td>
    <td width="73%">Send Notice</td>
  </tr>
</table></div>
<ul class="categoryitems">
<li><a href="?pid=57&action=mailtostaff">Staff</a></li>
<li><a href="?pid=57&action=mailtostudents">Students</a></li>
<li><a href="?pid=57&action=mails_received">View Replies</a></li>
<!--<li><a href="?pid=57&action=mailtoadmin">Admin</a></li>-->
</ul>
<div class="menuheader" style="cursor: default">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td width="27%"><img src="images/thought_32.png" /></td>
    <td width="73%"><a href="?pid=52&action=tip_day" class="mainsidelink">Thought of the Day</a></td>
  </tr>
</table></div>
<?php }if (in_array('14', $admin_permissions)){?>
<div class="menuheader" style="cursor: default">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td width="27%"><img src="images/time_table_32.png" /></td>
    <td width="73%"><a href="?pid=31&action=timetable" class="mainsidelink">Time Table</a></td>
  </tr>
</table></div>
<?php }if (in_array('15', $admin_permissions)){?>
<div class="menuheader" style="cursor: default">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td width="27%"><img src="images/library_32.png" /></td>
    <td width="73%"><a href="?pid=32&action=first" class="mainsidelink">Library</a></td>
  </tr>
</table></div>
<?php }if (in_array('16', $admin_permissions)){?>
<div class="menuheader expandable"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="27%"><img src="images/exam_32.png" /></td>
    <td width="73%">&nbsp;Academic&nbsp;Examination</td>
  </tr>
</table></div>
<ul class="categoryitems">
<li><a href="?pid=36&action=createxam">Create Examination</a></li>
<li><a href="?pid=36&action=marksentry">Marks Entry(Subject wise)</a></li>
<li><a href="?pid=36&action=stdmarksentry">Marks Entry(Student )</a></li>
<!--<li><a href="?pid=36&action=genaretemarks">Create Marks Sheet</a></li>-->
<li><a href="?pid=36&action=allstudents">Reports</a></li>
<li><a href="?pid=36&action=stud_report">Student Reports</a></li>
<li><a href="?pid=36&action=chatreports">Examination Reports</a></li>
<li><a href="?pid=36&action=chatreports_schoolwise">School Report</a></li>
</ul>
<?php }if (in_array('17', $admin_permissions)){?>
<div class="menuheader expandable"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="27%"><img src="images/attendance_32.png" /></td>
    <td width="73%">Attendance</td>
  </tr>
</table></div>
<ul class="categoryitems">
<li><a href="?pid=27&action=slip">Attendance Slips</a></li>
<li><a href="?pid=27&action=stud_attend">Student Attendance</a></li>
<li><a href="?pid=27&action=staff_attend">Staff Attendance</a></li>
<li><a href="?pid=27&action=stud_report">Student Report</a></li>
<li><a href="?pid=27&action=class_report">Class Report</a></li>
<li><a href="?pid=27&action=staff_wise_report">Staff Report</a></li>
<li><a href="?pid=27&action=staff_report">Staff Attendance Record</a></li>
</ul>
<?php }if (in_array('18', $admin_permissions)){?>
<div class="menuheader expandable"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="27%"><img src="images/hostel_32.png" /></td>
    <td width="73%">Hostel</td>
  </tr>
</table></div>
<ul class="categoryitems">
<li><a href="?pid=19&action=addbuilding">Add Building</a></li>
<li><a href="?pid=19&action=addroom">Add Room</a></li>
<li><a href="?pid=19&action=buildreport">Report</a></li>
<li><a href="?pid=19&action=student_roomallotment">Room Allocation</a></li>
</ul>
<?php }if (in_array('19', $admin_permissions)){?>
<div class="menuheader expandable"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="27%"><img src="images/security_32.png" /></td>
    <td width="73%">Security</td>
  </tr>
</table></div>
<ul class="categoryitems">
<li><a href="?pid=26&action=vehicle">Visitors Record</a></li>
<li><a href="?pid=26&action=report">View Report</a></li>
</ul>
<?php }if (in_array('23', $admin_permissions)){?>
<div class="menuheader expandable"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="27%"><img src="images/backup_32.png" /></td>
    <td width="73%">Backup</td>
  </tr>
</table></div>
<ul class="categoryitems">
<li><a href="?pid=48&action=Export">Export</a></li>
<li><a href="?pid=48&action=Import">Import</a></li>
</ul>
<?php }if (in_array('20', $admin_permissions)){?>
<div class="menuheader expandable"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="27%"><img src="images/knowledge_base_32.png" /></td>
    <td width="73%">Knowledge Base</td>
  </tr>
</table></div>
<ul class="categoryitems">
<li><a href="?pid=30&action=know_category">Create Category</a></li>
<li><a href="?pid=30&action=know_categ">View Categories</a></li>
</ul>
<?php }if (in_array('21', $admin_permissions)){?> 
<div class="menuheader" style="cursor: default">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td width="27%"><img src="images/notice_board_32.png" /></td>
    <td width="73%"><a href="?pid=37&action=noticeboard" class="mainsidelink">Notice Board</a></td>
  </tr>
</table></div>
 <?php }?>
<div class="menuheader" style="cursor: default">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td width="27%"><img src="images/photo_gallery_32.png" /></td>
    <td width="73%"><a href="?pid=54&action=gallerylist" class="mainsidelink">Photo Gallery</a></td>
  </tr>
</table></div>

<div class="menuheader" style="cursor: default">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td width="27%"><img src="images/video_32.png" /></td>
    <td width="73%"><a href="?pid=56&action=gallerylist" class="mainsidelink">Videos</a></td>
  </tr>
</table></div>

<div class="menuheader" style="cursor: default">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td width="27%"><img src="images/holiday_32.png" /></td>
    <td width="73%"><a href="?pid=58&action=holidayslist" class="mainsidelink">Holidays</a></td>
  </tr>
</table></div></div></td>
  </tr>
</table>

