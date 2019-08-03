<script type="text/javascript" src="includes/js/leftmenu/sdmenu.js"></script>
<script type="text/javascript">
	// <![CDATA[
	var myMenu;
	window.onload = function() {
		myMenu = new SDMenu("my_menu");
		myMenu.init();
	};
	// ]]>
	</script>
  <style type="text/css">
  /* Left Menu styles */
div.sdmenu {
	width: 192px;
	font-family:Geneva, Arial, Helvetica, sans-serif;
	font-size: 12px;
	padding-bottom: 10px;
	/*background: url(../images/bottom.gif) no-repeat right bottom;*/
	color: #000000;
}
div.sdmenu div {
	overflow: hidden;
	/*background-image: url(../images/title.gif);
	background-repeat: repeat-x;*/
}
div.sdmenu div:first-child {
	/*background-image: url(../images/toptitle1.gif);
	background-repeat: no-repeat;*/
}
div.sdmenu div.collapsed {
	height: 43px;
}
div.sdmenu div span {
	display: block;
	padding: 5px 5px;
	font-weight: bold;
	color: #333333;
	/*background: url(../images/expanded.gif) no-repeat 10px center;*/
	cursor: pointer;
	border-bottom: 1px solid #ddd;
	letter-spacing:1px;
}
div.sdmenu div.collapsed span {

	/*background-image: url(../images/collapsed.gif);*/
}
div.sdmenu div.fixed span {

	/*background-image: url(../images/collapsed.gif);*/
}
.rightmenulink {
	padding: 5px 13px;
	background: #eee;
	display: block;
	border-bottom: 1px solid #ddd;
	color: #666666;
	
}
div.sdmenu div b {
	padding: 5px 3px;
	background: #eee;
	display: block;
	border-bottom: 1px solid #ddd;
	color: #333333;
	font-size:14px;
}
div.sdmenu div a.current {
	background : #ccc;
}
.rightmenulink:hover {
	color: #fff;
	text-decoration: none;
	background-color: #9A9494;
	background-image: url(../../images/linkarrow.gif);
	background-repeat: no-repeat;
	background-position: right center;
}

div.sdmenu div.fixed a {
	overflow: hidden;
	/*background: url(../images/title.gif) repeat-x;
	background-repeat: repeat-x;*/
	padding: 5px 1px;
	font-weight: bold;
	color: #000000;
	cursor: default;
	border-bottom:none;
	text-decoration: none;
}
div.sdmenu div.fixed a:hover {
	background-image: url(../../images/linkarrow.gif);
	background-repeat: no-repeat;
	background-position: right;
}
div.sdmenu div.fixed span {
	display: block;
	padding: 0px;
	font-weight: bold;
	color: #000000;
	background: none;
	cursor: default;
	border-bottom: none;
}
.nocssapp{
text-decoration:none;
color: #333333;
}
/* Left Menu styles */
  </style>
<div style="float: left" id="my_menu" class="sdmenu">	
<?php $admin_permissions = explode(',', $permissions['admin_permissions']);
					if (in_array('1', $admin_permissions)){?>
    <div>
        <span><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td  width="37px" align="left"><img src="images/administrator_32.png" /></td><td>Administration</td></tr></table></span>
       <a href="" class="rightmenulink">Admin List</a>
	   <a href="" class="rightmenulink">Add Admin</a>
    </div>	
	<?php }if (in_array('24', $admin_permissions)){?>
				
    <div class="collapsed">
         <span><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td  width="37px" align="left"><img src="images/administrator_32.png"></td><td>Setup</td></tr></table></span>
		<a href="?pid=22&action=school_details" class="rightmenulink">School Details</a><a href="?pid=20&action=manageclasses" >Add&nbsp;Classes/Subjects</a>
		<a href="?pid=47&action=manageexams" class="rightmenulink">Add Exams</a>
<a href="?pid=17&action=createfeetypes" class="rightmenulink">Add New Fees </a>
<b>Create Department</b>
<a href="?pid=49&action=department" class="rightmenulink">Add Department</a>
<b>Create Payroll</b><a href="?pid=29&action=leavemaster" class="rightmenulink">Create Annual leave</a>
<a href="?pid=29&action=allowencemaster" class="rightmenulink">Create Allowance Type</a>
<a href="?pid=29&action=deductionsmaster" class="rightmenulink">Create Deduction Type</a>
<a href="?pid=29&action=loanmaster" class="rightmenulink">Create a Loan</a>
<a href="?pid=29&action=taxmaster" class="rightmenulink">Create a Tax</a>
<a href="?pid=29&action=pfmaster" class="rightmenulink"> Create PF</a>
<b>Create Accounts</b>
<a href="?pid=22&action=master_group" class="rightmenulink">Create&nbsp;Account Groups</a>
<a href="?pid=22&action=ledger" class="rightmenulink">Create&nbsp;Account&nbsp;Ledger</a>
<a href="?pid=22&action=voucher" class="rightmenulink">Create&nbsp;Voucher</a>
<b>Create Inventory</b>
<a href="?pid=7&action=addinventory" class="rightmenulink">Create Inventory Type</a>
<a href="?pid=7&action=addcategory" class="rightmenulink">Add Product Category</a>
<a href="?pid=7&action=additem" class="rightmenulink">Add an Item</a>
<a href="?pid=7&action=addsupply" class="rightmenulink">Add New Supplier</a>
</div>
		<?php }?>
     <div class="collapsed">
         <span><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td  width="37px" align="left"><img src="images/administrator_32.png"></td><td>Tutorials</td></tr></table></span>
        <a href="?pid=51&action=list" class="rightmenulink">Add&nbsp;Units</a>
<a href="?pid=59&action=list" class="rightmenulink">Add&nbsp;Chapter</a>
<a href="?pid=60&action=list" class="rightmenulink">Add&nbsp;Tutorial</a>
<a href="?pid=61&action=list" class="rightmenulink">Add&nbsp;Booklet</a>

    </div>
	<?php if (in_array('2', $admin_permissions)){ ?>
	<div class="collapsed">
         <span><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td  width="37px" align="left"><img src="images/administrator_32.png"></td><td>Front Office</td></tr></table></span>
       
<a href="?pid=8">Enquiry Form</a>
<a href="?pid=2&action=list_enquiry">Enquiry List</a>
<a href="?pid=3&action=list_enquiry">Admitted Students List</a>
 <!-- <a href="report.html"class="menutitlein">Reports</a><br /> -->
<!--<a href="?pid=3">Entrance Test</a>-->
   </div>
	<?php }if (in_array('3', $admin_permissions)){?>
	<div>
         <span><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td width="37px" align="left"><img src="images/administrator_32.png" border="0"></td><td><a href="?pid=5" class="nocssapp">&nbsp;Pre Admission</a></td></tr></table></span>        
    </div>
	<?php }if (in_array('4', $admin_permissions)){?>

	<div class="collapsed">
         <span><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td  width="37px" align="left"><img src="images/administrator_32.png"></td><td>Student</td></tr></table></span>
 <a href="?pid=21&action=serchclass">Search Student Record</a>
<a href="?pid=21&action=classrecards">Update Class Record</a>
   </div>
	<?php }if (in_array('6', $admin_permissions)){?>
	<div class="collapsed">
         <span><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td  width="37px" align="left"><img src="images/administrator_32.png"></td><td>Fee Payment</td></tr></table></span>
        <a href="?pid=17&action=viewfees">Fee Details</a>
<a href="?pid=40&action=payfee">Pay Fee</a>
<a href="?pid=40&action=feepaidlist&pre_class=ALL">Paid Fee List</a>
<a href="?pid=40&action=categorywisefee">Category Fee Details</a>
<a href="?pid=40&action=outstandingfees&pre_class=ALL">Outstanding Fees</a>
<!--<a href="?pid=40&action=fee_list">Fee Payment Details</a>
-->
    </div>
	<?php }if (in_array('7', $admin_permissions)){?>
	<div class="collapsed">
         <span><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td  width="37px" align="left"><img src="images/administrator_32.png"></td><td>Assignment</td></tr></table></span>
       <a href="?pid=4&action=view">View Assignment</a>
    </div>
	<?php }if (in_array('8', $admin_permissions)){?>
	<div class="collapsed">
         <span><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td  width="37px" align="left"><img src="images/administrator_32.png"></td><td>HRD</td></tr></table></span>
      <a href="?pid=9&action=post_vacancy">Post Vacancy</a>
	  <a href="?pid=9&action=list_classifieds">Classifieds</a>
	  <a href="?pid=23&action=applicant_enquiries">Applicant Enquiries</a>
	  <a href="?pid=23&action=search_applicants">Search Applicants</a>
	  <a href="?pid=23&action=take_interview">Take interview</a>
	  <a href="?pid=15&action=applicants_list">Applicants List</a>
	  <a href="?pid=46&action=addnewstaff">Add Staff</a>
	  <a href="?pid=23&action=letter_formats">Letter Formats</a>
	  <a href="?pid=23&action=offerlettergenration">Generate Offer Letter</a>
	  <a href="?pid=23&action=issuetcforstudent">Generate TC (Student)</a>
	  <a href="?pid=23&action=issuetcstaff">Termination Letter (Staff)</a>
<!--<a href="?pid=46&action=nonstaff">Add Non Teaching Staff</a>-->
<!--<a href="?pid=23&action=offerletterview">Offer Latter Master</a>-->
<!--<a href="?pid=23&action=tcviewstudent">Tc Master</a>-->
<!--<a href="?pid=23&action=tcview">Resigantion Genaration</a>-->
    </div>
	<?php }if (in_array('9', $admin_permissions)){?>

	<div class="collapsed">
         <span><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td  width="37px" align="left"><img src="images/administrator_32.png"></td><td>Staff</td></tr></table></span>
      <a href="?pid=46&action=addnewstaff">Add Staff</a>
	  <a href="?pid=15&action=staffviewing">View Staff</a>
    </div>
	<?php }if (in_array('10', $admin_permissions)){?>

	<div class="collapsed">
         <span><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td  width="37px" align="left"><img src="images/administrator_32.png"></td><td>Payroll</td></tr></table></span>
        <b>Employee</b>
<a href="?pid=35&action=issueloan">Issue loan</a>
<b>Payslip Generation</b>
<a href="?pid=35&action=employeewisepayslip">Employee Payslip</a>
<a href="?pid=35&action=paysliplist">Payslip List</a>
<!--<a href="?pid=35&action=yearwisepayslip">Year wise pay slip</a>
-->
    </div>
	<?php }if (in_array('11', $admin_permissions)){?>

	<div class="collapsed">
         <span><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td  width="37px" align="left"><img src="images/administrator_32.png"></td><td>Financial Accounting</td></tr></table></span>
       <b>Transaction</b>
<a href="?pid=24&action=voucher_entry">Voucher Entry</a>
<b>Report</b>
<a href="?pid=25&action=balancesheet">Balance Sheet</a>
<a href="?pid=25&action=ledger">Ledger Summary</a>
    </div>
	<?php }if (in_array('12', $admin_permissions)){?>
<div class="collapsed">
         <span><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td  width="37px" align="left"><img src="images/administrator_32.png"></td><td>Inventory</td></tr></table></span>
       <a href="?pid=7&action=add_order">Purchase Order</a>
<a href="?pid=7&action=goods_reciept">Goods Receipt Note</a>
<a href="?pid=7&action=goods_issue">Goods Issue Note</a>
<a href="?pid=7&action=return_issue">Issue Return Note</a>
<a href="?pid=7&action=stock_details">Stock Details</a>
<a href="?pid=7&action=inventory_reports">Inventory Reports</a>
    </div>
<?php }if (in_array('13', $admin_permissions)){?>	
	
	<div class="collapsed">
         <span><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td  width="37px" align="left"><img src="images/administrator_32.png"></td><td>Transport</td></tr></table></span>
      <a href="?pid=11&action=addtransport">Add Transport Form</a>
	  <a href="?pid=11&action=maintenance">Maintenance Details</a>
	  <a href="?pid=11&action=viewreport">View Report</a>
	  
    </div>
	
	
	<div class="collapsed">
         <span><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td  width="37px" align="left"><img src="images/administrator_32.png"></td><td>Message</td></tr></table></span>
       <a href="?pid=50&action=mails_received" class="mainsidelink">View Inbox</a>
<b>Compose Message</b>
<a href="?pid=50&action=mailtoadmin">Admin</a>
<a href="?pid=50&action=mailtostaff">Staff</a>
<a href="?pid=50&action=mailtostudents">Students</a>
    </div>
	
	
	<div class="collapsed">
         <span><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td  width="37px" align="left"><img src="images/administrator_32.png"></td><td>SMS</td></tr></table></span>
      <a href="?pid=62&action=smstostaff">Staff</a>
	  <a href="?pid=62&action=smstostudents">Students</a>
    </div>
	
	
	
	
	<div class="collapsed">
         <span><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td  width="37px" align="left"><img src="images/administrator_32.png"></td><td>Send Notice</td></tr></table></span>
       <a href="?pid=57&action=mailtostaff">Staff</a>
<a href="?pid=57&action=mailtostudents">Students</a>
<a href="?pid=57&action=mails_received">View Replies</a>
<!--<a href="?pid=57&action=mailtoadmin">Admin</a>-->
    </div>
	
	<div>
	
         <span><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td width="37px" align="left"><img src="images/administrator_32.png" border="0"></td><td><a href="?pid=52&action=tip_day" class="nocssapp">Thought of the Day</a></td></tr></table></span> 
		 </div>
		 
	<?php }if (in_array('14', $admin_permissions)){?>
<div>
	
         <span><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td width="37px" align="left"><img src="images/administrator_32.png" border="0"></td><td><a href="?pid=31&action=timetable" class="nocssapp">Time Table</a>
		 </td></tr></table></span> 
		 </div>
		 <?php }if (in_array('15', $admin_permissions)){?>

         <span><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td width="37px" align="left"><img src="images/administrator_32.png" border="0"></td><td><a href="?pid=32&action=first" class="nocssapp">Library</a>
		 </td></tr></table></span> 
		 </div>
		 <?php }if (in_array('16', $admin_permissions)){?>

		 
	<div class="collapsed">
         <span><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td  width="37px" align="left"><img src="images/administrator_32.png"></td><td>Academic&nbsp;Examination</td></tr></table></span>
       <a href="?pid=36&action=createxam">Create Examination</a>
<a href="?pid=36&action=marksentry">Marks Entry(Subject wise)</a>
<a href="?pid=36&action=stdmarksentry">Marks Entry(Student )</a>
<!--<a href="?pid=36&action=genaretemarks">Create Marks Sheet</a>-->
<a href="?pid=36&action=allstudents">Reports</a>
<a href="?pid=36&action=stud_report">Student Reports</a>
<a href="?pid=36&action=chatreports">Examination Reports</a>
<a href="?pid=36&action=chatreports_schoolwise">School Report</a>
    </div>
	<?php }if (in_array('17', $admin_permissions)){?>

	
	
	
	<div class="collapsed">
         <span><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td  width="37px" align="left"><img src="images/administrator_32.png"></td><td>Attendance</td></tr></table></span>
       <a href="?pid=27&action=slip">Attendance Slips</a>
<a href="?pid=27&action=stud_attend">Student Attendance</a>
<a href="?pid=27&action=staff_attend">Staff Attendance</a>
<a href="?pid=27&action=stud_report">Student Report</a>
<a href="?pid=27&action=class_report">Class Report</a>
<a href="?pid=27&action=staff_wise_report">Staff Report</a>
<a href="?pid=27&action=staff_report">Staff Attendance Record</a>
    </div>
	
	<?php }if (in_array('18', $admin_permissions)){?>

	
	
	<div class="collapsed">
         <span><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td  width="37px" align="left"><img src="images/administrator_32.png"></td><td>Hostel</td></tr></table></span>
      <a href="?pid=19&action=addbuilding">Add Building</a>
<a href="?pid=19&action=addroom">Add Room</a>
<a href="?pid=19&action=buildreport">Report</a>
<a href="?pid=19&action=student_roomallotment">Room Allocation</a>
    </div>
	<?php }if (in_array('19', $admin_permissions)){?>

	
	<div class="collapsed">
         <span><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td  width="37px" align="left"><img src="images/administrator_32.png"></td><td>Security</td></tr></table></span>
       <a href="?pid=26&action=vehicle">Visitors Record</a>
<a href="?pid=26&action=report">View Report</a>
    </div>
	
	<?php }if (in_array('23', $admin_permissions)){?>

	
	
	<div class="collapsed">
         <span><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td  width="37px" align="left"><img src="images/administrator_32.png"></td><td>Backup</td></tr></table></span>
       <a href="?pid=48&action=Export">Export</a>
<a href="?pid=48&action=Import">Import</a>
    </div>
<?php }if (in_array('20', $admin_permissions)){?>
	
	<div class="collapsed">
         <span><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td  width="37px" align="left"><img src="images/administrator_32.png"></td><td>Knowledge Base</td></tr></table></span>
      <a href="?pid=30&action=know_category">Create Category</a>
<a href="?pid=30&action=know_categ">View Categories</a>
    </div>
	
	<?php }if (in_array('21', $admin_permissions)){?> 

    <div>
	
         <span><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td width="37px" align="left"><img src="images/administrator_32.png" border="0"></td><td><a href="?pid=37&action=noticeboard" class="nocssapp" >Notice Board</a></td></tr></table></span>        
    </div>
	 <?php }?>
	
	 <div>
	
         <span><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td width="37px" align="left"><img src="images/administrator_32.png" border="0"></td><td><a href="?pid=54&action=gallerylist" class="nocssapp" >Photo Gallery</a></td></tr></table></span>        
    </div>
	
	 <div>
	
         <span><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td width="37px" align="left"><img src="images/administrator_32.png" border="0"></td><td><a href="?pid=56&action=gallerylist"class="nocssapp" >Videos</a></td></tr></table></span>        
    </div>
	
	
    <div>
	
         <span><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td width="37px" align="left"><img src="images/administrator_32.png" border="0"></td><td><a href="?pid=58&action=holidayslist"  class="nocssapp" >Holidays</a></td></tr></table></span>        
    </div>
</div>