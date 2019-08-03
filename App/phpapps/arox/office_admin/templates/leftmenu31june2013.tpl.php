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

<?php 
// top permitions from apex

$edit_mod = $db->getRow("SELECT * FROM es_modules_alloted  WHERE id=1");
$max_students=$edit_mod['max_no_students'];
$max_courses=$edit_mod['max_no_courses'];
$modules_permissions=$edit_mod['modules_permissions'];

$top_level_permissions= explode(',', $modules_permissions);

$admin_permissions = explode(',', $permissions['admin_permissions']);
					
				?>
<div class="menuheader expandable">

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="37px"><img src="images/birth_32.png" /></td>
    <td>Birthdays</td>
  </tr>
</table>
</div>
<ul class="categoryitems">
<li><a href="javascript:void(0)" onclick="window.open('?pid=44&action=birthday_students',null,'width=700,height=600,scrollbars=yes,toolbar=no,directories=no,status=no,menubar=yes,left=140,top=30');">Student Birthdays</a></li>
</ul>

				
					
<?php					
					if (in_array('1_p', $top_level_permissions) ){
	if (in_array('1_p', $admin_permissions) ){?>
<div class="menuheader expandable">

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="37px"><img src="images/administrator_32.png" /></td>
    <td>Administration</td>
  </tr>
</table>
</div>
<ul class="categoryitems">
<li><a href="?pid=42&action=adminlist">Admin List</a></li>
<?php if (in_array("1_3", $admin_permissions)) {?><li><a href="?pid=42&action=addadmin">Add Admin</a></li><?php }?>
</ul>
<?php } } 
if (in_array('2_p', $top_level_permissions) ){
if (in_array('2_p', $admin_permissions)){?>

<div class="menuheader expandable">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="37px"><img src="images/setup_32.png" /></td>
    <td > Setup</td>
  </tr>
</table></div>
<ul class="categoryitems">
<li><a href="?pid=22&action=school_details">Institute Details</a></li>					
<li><a href="?pid=20&action=manageclasses">Groups / Classes / Subjects</a></li>
<!--<li><a href="?pid=97&action=list">Class Sections</a></li>-->
<li><a href="?pid=20&action=htmlcode">API for Login</a></li>
<!--<li><a href="?pid=121&page=castecategory">Caste </a></li>-->
<li><a href="?pid=94&page=caste">Caste Categories</a></li>
<!--<li><a href="?pid=121&page=cat">Categories & Caste </a></li>-->
<!--<li><a href="?pid=94&page=int">Other Institutes</a></li>-->
<li><a href="?pid=94&page=transport">Student Pick-up Point </a></li>
<!--<li><a href="?pid=94&page=subject&action=list">Subjects Categorization</a></li>-->
</ul>
<?php }?>
<?php }
// Certificates
if (in_array('35_p', $top_level_permissions) ){if (in_array('35_p', $admin_permissions)){?>
<div class="menuheader expandable"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="37px"><img src="images/certi.png" width="31" height="44" /></td>
    <td >Certificates</td>
  </tr>
</table></div>
<ul class="categoryitems">
<li><a href="?pid=117&action=list">Bonafied Certificate</a></li>
<!--<li><a href="?pid=120&action=list">Bonafied for Bank_Acount</a></li>
<li><a href="?pid=119&action=list">Bonafied for IncomeTax Rebate</a></li>-->
<? //if (in_array('5_6', $admin_permissions)){?>
<li><a href="?pid=95&action=list"><span id="internal-source-marker_0.052443267584382114">Character</span> Certificate</a></li>
<?php //} ?>
<li><a href="?pid=116&action=list">Experience Letter</a></li>
<!--<li><a href="?pid=118&action=list">Loan Certificate</a></li>-->

</ul>

 <?php } // end of certificate ?>
 
 
 <?php }// Government
 /*?>if (in_array('35_p', $top_level_permissions) ){if (in_array('35_p', $admin_permissions)){?>
<div class="menuheader expandable"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="37px"><img src="images/government_icon.jpg" width="30" height="35" /></td>
    <td >Government Rules</td>
  </tr>
</table></div>
<ul class="categoryitems">
<li><a href="?pid=122&action=list">Association Executive Committee </a></li>
<!--<li><a href="?pid=120&action=list">Bonafied for Bank_Acount</a></li>
<li><a href="?pid=119&action=list">Bonafied for IncomeTax Rebate</a></li>-->
<? //if (in_array('5_6', $admin_permissions)){?>
<li><a href="?pid=123&action=list">School Committee</a></li>
<?php //} ?>
<li><a href="?pid=126&action=list">Academic Council</a></li>
<li><a href="?pid=128&action=list">Meeting</a></li>
<li><a href="?pid=130&action=list">School Year Planning</a></li>
</ul><?php */?>

 <?php //}//} // end of certificate ?>
 
<?

if (in_array('3_p', $top_level_permissions) ){ 
if (in_array('3_p', $admin_permissions)){ ?>
<div class="menuheader expandable"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="37px"><img src="images/frontoffice_32.png" /></td>
    <td >Front Office</td>
  </tr>
</table></div>
<ul class="categoryitems">
<?php if (in_array('3_1', $admin_permissions)){ ?><li><a href="?pid=8">Enquiry Form</a></li><?php }?>
<li><a href="?pid=2&action=list_enquiry">Enquiry List</a></li>
<?php //if (in_array("3_4", $admin_permissions)) {?><!--<li><a href="?pid=3&action=list_enquiry">Admitted Students</a></li>--><?php //}?>
<?php /*?><?php if (in_array("3_7", $admin_permissions)) {?><li><a href="?pid=3&action=enquiry_students">Admitted Students [Enquiry]</a></li><?php }?><?php */?>

 <!--<li> <a href="report.html"class="menutitlein">Reports</a><br /> </li>-->
<!--<li><a href="?pid=3">Entrance Test</a></li>-->
</ul>
<?php }

 } if (in_array('4_p', $top_level_permissions) ){if (in_array('4_p', $admin_permissions)){?>
<div class="menuheader" style="cursor: default">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td width="37px"><img src="images/preadmission_32.png" /></td>
    <td ><a href="?pid=5" class="mainsidelink">Admission Form</a></td>
  </tr>
  <!--<li><a href="?pid=107&action=feedet">New Registration Form</a></li>-->
</table></div>
<?php } }if (in_array('5_p', $top_level_permissions) ){if (in_array('5_p', $admin_permissions)){?>
<div class="menuheader expandable"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="37px"><img src="images/student_32.png" /></td>
    <td >Student</td>
  </tr>
</table></div>
<ul class="categoryitems">

<?php /*?><li><a href="?pid=96&action=assign_section">Sections / Roll Numbers</a></li>
<?php */?><li><a href="?pid=21&action=serchclass">Search Student Record</a></li>

<li><a href="?pid=21&action=classrecards">Update Class Record</a></li>
<li><a href="?pid=21&action=malefemalestudents">Male-Female</a></li>
<?php if (in_array('5_5', $admin_permissions)){?>
<li><a href="?pid=23&action=issuetcforstudent">Student Transfer</a></li>
<?php } ?>

<li><a href="?pid=3&action=cast_list">Category&nbsp;Wise&nbsp;Data </a></li>
<li><a href="?pid=3&action=age_wise">Age&nbsp;Wise&nbsp;Data</a></li>

<li><a href="?pid=21&action=studentlist2">Students&nbsp;List&nbsp;</a></li>
</ul>
<?php }}if (in_array('6_p', $top_level_permissions) ){if (in_array('6_p', $admin_permissions)){?>
<div class="menuheader expandable"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="37px"><img src="images/feepayment_32.png" /></td>
    <td >Fee Payment</td>
  </tr>
</table></div>
<ul class="categoryitems">
<li><a href="?pid=17&action=createfeetypes" >Add  Fees </a></li>
<li><a href="?pid=79&action=addfine"><span id="internal-source-marker_0.5963001342130408">Late Fee Fine</span></a></li>
<li><a href="?pid=79&action=add_lastdate">Fee Due Date</a></li>
<li><a href="?pid=17&action=viewfees">Fee Details</a></li>
<li><a href="?pid=105&action=add_examfee"> Add Exam Fee</a></li>
<?php if(in_array('6_20',$admin_permissions)){?>
<li><a href="?pid=105&action=view_list">Exam Fee Collection</a></li>
<?php } ?>
<li><a href="?pid=40&action=payfee">Pay Fee</a></li>
<li><a href="?pid=40&action=receipt_list">Print Receipt</a></li>
<li><a href="?pid=40&action=fee_card">Student Fee Card</a></li>
<li><a href="?pid=40&action=classwise_fee_card">Fee status [Class wise]</a></li>
<!--<li><a href="?pid=40&action=feepaidlist&pre_class=ALL">Paid Fee List</a></li>
<li><a href="?pid=40&action=fee_paid_list">Paid Fee [Category]</a></li>
<li><a href="?pid=40&action=classwisepayment_list">Paid Fee [Class wise]</a></li>
<li><a href="?pid=40&action=categorywisefee">Category Wise Details</a></li>
<li><a href="?pid=40&action=outstandingfees&pre_class=ALL">Outstanding Fees</a></li>-->
<li><a href="?pid=40&action=installment_fines">Late Fee Paid</a></li>
<?php if(in_array('6_14',$admin_permissions)){?>
<li><a href="?pid=79&action=add_otherfines"> Add Misc. Fine</a></li>
<?php }?>
<li><a href="?pid=79&action=view_list">Misc Fine Collection</a></li>
<li><a href="?pid=79&action=view_oldbalances">View Old Balances</a></li>
</ul>

<?php }}if (in_array('7_p', $top_level_permissions) ){if (in_array('7_p', $admin_permissions)){?>
<div class="menuheader" style="cursor: default">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td width="37px"><img src="../images/importdata.png" /></td>
    <td ><a href="../greatbritain/main_profile.php" target="_blank" class="mainsidelink">Import / Export Data</a></td>
  </tr>
</table></div>
<div class="menuheader expandable"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="37px"><img src="images/assignment_32.png" /></td>
    <td >Assignment</td>
  </tr>
</table></div>
<ul class="categoryitems">
<li><a href="?pid=4&action=addassignment">Add Assignment</a></li>
<li><a href="?pid=4&action=view">View Assignment</a></li>
</ul>

<?php }}if (in_array('8_p', $top_level_permissions) ){ if (in_array('8_p', $admin_permissions)){?>
<div class="menuheader expandable"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="37px"><img src="images/tutorials_32.png" /></td>
    <td >Study Material </td>
  </tr>
</table></div>
<ul class="categoryitems">
<li><a href="?pid=51&action=list">Add&nbsp;Units</a></li>
<li><a href="?pid=59&action=list">Add&nbsp;Topics</a></li>
<li><a href="?pid=60&action=list">Add Tutorial</a></li>
<li><a href="?pid=61&action=list">Add Booklet</a></li>
<li><a href="?pid=63&action=list">Question Bank</a></li>
</ul>
<?php }}if (in_array('10_p', $top_level_permissions) ){if (in_array('10_p', $admin_permissions)){?>
<div class="menuheader expandable"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="37px"><img src="images/staff_32.png" /></td>
    <td>STAFF</td>
  </tr>
</table></div>
<ul class="categoryitems">

<li><a href="?pid=49&action=department">Add Department</a></li>
<li><a href="?pid=46&action=addnewstaff">Add Staff</a></li>
<li><a href="?pid=15&action=staffviewing">View Staff</a></li>
<li><a href="?pid=64&action=asignincharge">Assign Incharge</a></li>
</ul>

<?php }}if (in_array('9_p', $top_level_permissions) ){if (in_array('9_p', $admin_permissions)){?>
<!--<div class="menuheader expandable"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="37px"><img src="images/hrd_32.png" /></td>
    <td >HRD</td>
  </tr>
</table></div>-->
<!--<ul class="categoryitems">-->
<!--<li><a href="?pid=9&action=post_vacancy">Post Vacancy</a></li>
<li><a href="?pid=9&action=list_classifieds">Classifieds</a></li>
<li><a href="?pid=23&action=applicant_enquiries">Applicant Enquiry</a></li>
<li><a href="?pid=23&action=search_applicants">Search Applicants</a></li>
<li><a href="?pid=23&action=take_interview">Take Interview</a></li>
<li><a href="?pid=15&action=applicants_list">Applicants List</a></li>-->
<!--<li><a href="?pid=46&action=addnewstaff">Add Staff</a></li>-->
<!--<li><a href="?pid=46&action=nonstaff">Add Non Teaching Faculty</a></li>-->
<!--<li><a href="?pid=23&action=offerletterview">Offer Latter Master</a></li>-->
<!--<li><a href="?pid=23&action=tcviewstudent">Tc Master</a></li>-->
<!--<li><a href="?pid=23&action=tcview">Resigantion Genaration</a></li>-->
<!--<li><a href="?pid=23&action=offerlettergenration">Generate Offer Letter</a></li>
<li><a href="?pid=23&action=letter_formats">Letter Formats</a></li>


<li><a href="?pid=23&action=issuetcstaff">Resignation/Termination</a></li>
<li><a href="?pid=23&action=letterslist">Other letter Formats</a></li>
<li><a href="?pid=23&action=sendlettertostaff">Send Letter</a></li>
<li><a href="?pid=23&action=otherlettergeneration">Print Letter </a></li>-->
<!--</ul>-->

<?php }}if (in_array('11_p', $top_level_permissions) ){if (in_array('11_p', $admin_permissions)){?>
<div class="menuheader expandable">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="37px"><img src="images/payroll_32.png" /></td>
    <td >Payroll</td>
  </tr>
</table></div>
<ul class="categoryitems">

<li><a href="?pid=29&action=leavemaster">Create Annual leave</a></li>
<li><a href="?pid=29&action=allowencemaster">Create Allowance Type</a></li>
<li><a href="?pid=29&action=deductionsmaster">Create Deduction Type</a></li>
<!--<li><a href="?pid=29&action=invest"> Create Investment</a></li>-->
<li><a href="?pid=29&action=loanmaster">Create a Loan</a></li>
<li><a href="?pid=29&action=taxmaster">Create a Tax</a></li>
<li><a href="?pid=29&action=pfmaster"> Create PF</a></li>

<li><b>Employee</b></li>
<li><a href="?pid=35&action=issueloan">Issue loan</a></li>
<li><a href="?pid=35&action=loanissueslist"><span id="internal-source-marker_0.820553458583017">Loan Issued To</span></a></li>

<li><b>Payslip Generation</b></li>
<li><a href="?pid=35&action=employeewisepayslip">Employee Payslip</a></li>
<?php if (in_array("11_103", $admin_permissions)) {?><li><a href="?pid=35&action=paysliplist">Payslip List</a></li><?php }?>
<!--<li><a href="?pid=35&action=yearwisepayslip">Year wise pay slip</a></li>
-->
</ul>
<?php } }if (in_array('12_p', $top_level_permissions) ){if (in_array('12_p', $admin_permissions)){?>
<div class="menuheader expandable"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="37px"><img src="images/financial_accounting_32.png" /></td>
    <td> Accounting </td>
  </tr>
</table></div>
<ul class="categoryitems">

<li><a href="?pid=22&action=master_group">Create&nbsp;Account Groups</a></li>
<li><a href="?pid=22&action=ledger">Create&nbsp;Account&nbsp;Ledger</a></li>
<li><a href="?pid=22&action=voucher">Manage&nbsp;Voucher</a></li>
<li><b>Transaction</b></li>
<li><a href="?pid=24&action=voucher_entry">Voucher Entry</a></li>
<li><a href="?pid=24&action=vouchers_list">Voucher List</a></li>
<li><b>Report</b></li>
<li><a href="?pid=25&action=balancesheet">Balance Sheet</a></li>
<li><a href="?pid=25&action=ledger">Ledger Summary</a></li>
</ul>
<?php } }if (in_array('13_p', $top_level_permissions) ){if (in_array('13_p', $admin_permissions)){?>
<div class="menuheader expandable"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="37px"><img src="images/inventory_32.png" /></td>
    <td >Inventory </td>
  </tr>
</table></div>
<ul class="categoryitems">
<?php /*?><?php if (in_array("13_1", $admin_permissions)) {?>
<li><a href="?pid=7&action=addinventory">Create Inventory Type</a></li>
<?php }?>
<?php */?>

<?php /*?><?php if (in_array("13_1", $admin_permissions)) {?>
<li><a href="?pid=7&action=addmaintain">Maintanance</a></li>
<?php }?>
<?php */?>
<?php if (in_array("13_4", $admin_permissions)) {?>
<li><a href="?pid=7&action=addcategory">Add Product Category</a></li>
<?php }?>

<?php if (in_array("13_7", $admin_permissions)) {?>
<li><a href="?pid=7&action=additem">Add  Item</a></li>
<?php }?>

<?php if (in_array("13_10", $admin_permissions)) {?>
<li><a href="?pid=7&action=addsupply">Add  Supplier</a></li>
<?php }?>

<?php if (in_array("13_13", $admin_permissions)) {?>
<li><a href="?pid=7&action=add_order">Purchase Order</a></li>
<?php }?>

<?php if (in_array("13_14", $admin_permissions)) {?>
<li><a href="?pid=7&action=goods_reciept">Goods Receipt Note</a></li>
<?php }?>

<?php if (in_array("13_15", $admin_permissions)) {?>
<li><a href="?pid=7&action=goods_issue">Goods Issue Note</a></li>
<?php }?>

<?php if (in_array("13_16", $admin_permissions)) {?>
<li><a href="?pid=7&action=return_issue">Issue Return Note</a></li>
<?php }?>
<li><a href="?pid=7&action=stock_details">Stock Details</a></li>
<li><a href="?pid=7&action=inventory_reports">Inventory Reports</a></li>

<?php /*?><li><a href="?pid=99&action=inventory_reports">Stationary Sales</a></li>
<?php if (in_array("13_108", $admin_permissions)) {?>
<li><a href="?pid=103&action=saled_stationary">Stationary&nbsp;Sales&nbsp;Invoices</a></li>
<?php } ?><?php */?>
</ul>


<?php }}if (in_array('14_p', $top_level_permissions) ){if (in_array('14_p', $admin_permissions)){?>
<div class="menuheader expandable"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="37px"><img src="images/transport_32.png"  height="32" width="32" border="0"/></td>
    <td >Transport </td>
  </tr>
</table></div>
<ul class="categoryitems">
<?php /*?><li><a href="?pid=11&action=allotdriver">Allot Driver</a></li>
<li><a href="?pid=11&action=addtransport">Transport</a></li>
<li><a href="?pid=11&action=maintenance">Maintenance Details</a></li>
<li><a href="?pid=11&action=viewreport">Report</a></li><?php */?>
<!--<li><a href="?pid=78&action=vehiclefees" >Vehicle Fees</a></li>-->
<li><a href="?pid=75&action=routelist1">Route </a></li>
<li><a href="?pid=75&action=routelist">Route List</a></li>
<li><a href="?pid=76&action=boardlist">Board List</a></li>
<li><a href="?pid=77&action=vehiclelist">Vehicle List</a></li>
<li><a href="?pid=81&action=driverlist">Drivers List</a></li>
<li><a href="?pid=80&action=allottedlist">Allot Vehicle to Board</a></li>
<li><a href="?pid=82&action=allotteddriverlist">Allot Driver to Vehicle</a></li>

<?php if (in_array("14_13", $admin_permissions)) {?>
<li><a href="?pid=83&action=preparetransportbill">Prepare Transport Fee </a></li>
<?php }?>
<li><a href="?pid=84&action=viewtransportbill">View Transport Bills</a></li>
<!--<li><a href="?pid=85&action=addmaintenance">Add Maintenance</a></li>-->


<li><a href="?pid=85&action=maintenancedetails">Maintenance Details</a></li>


<li><b>Reports</b></li>
<li><a href="?pid=86&action=driverreport">Driver Report</a></li>
<li><a href="?pid=87&action=vehiclereport">Vehicle Report</a></li>
<li><a href="?pid=88&action=studentreport">Student Wise Report</a></li>
<li><a href="?pid=88&action=driver_copy">Student Wise Report(Driver Report)</a></li>
<li><a href="?pid=89&action=staffreport">Staff Wise Report</a></li>
</ul>
<?php } } if (in_array('15_p', $top_level_permissions) ){if(in_array('15_p', $admin_permissions)){?>
<div class="menuheader expandable">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td width="37px"><img src="images/time_table_32.png" /></td>
    <td >Time Table</td>
  </tr>
</table></div>
<ul class="categoryitems">
<!--<li><a href="?pid=31&action=timetable">Class wise timetables</a></li>
<li><a href="?pid=90&action=timetable">Staff wise timetables</a></li>
<li><a href="?pid=104&action=addtmimes">Period&nbsp;Durations</a></li>
<li><a href="?pid=104&action=timetable">Time&nbsp;Tables</a></li>
<li><a href="?pid=104&action=staff_wise">Staff&nbsp;Time&nbsp;Table</a></li>-->
<li><a href="?pid=106&action=timetable">Class wise timetables</a></li>
<li><a href="?pid=90&action=staff">Staff wise timetables</a></li>
<li><a href="#" onclick="window.open('?pid=90&action=free_staff')">View Free Staff</a></li>
</ul>
<?php }}if (in_array('16_p', $top_level_permissions) ){if (in_array('16_p', $admin_permissions)){?>
<?php /*?><div class="menuheader" style="cursor: default">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td width="37px"><img src="images/library_32.png" /></td>
    <td ><a href="?pid=32&action=first" class="mainsidelink">Library</a></td>
  </tr>
</table></div>
<?php */?><?php }}if (in_array('17_p', $top_level_permissions) ){if (in_array('17_p', $admin_permissions)){?>
<div class="menuheader expandable"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="37px"><img src="images/exam_32.png" /></td>
    <td >Examination</td>
  </tr>
</table></div>
<ul class="categoryitems">
<li><b>Examination</b></li>
<li><a href="?pid=47&action=manageexams" >Add Exams</a></li>
<?php if (in_array("17_1", $admin_permissions)) {?>
<li><a href="?pid=36&action=createxam">Create Exam</a></li>
<?php }?>
<?php if (in_array("17_6", $admin_permissions)) {?>
<li><a href="?pid=36&action=createxamexport">Export Create Exam</a></li>
<?php }?>
<?php if (in_array("17_2", $admin_permissions)) {?>
<li><a href="?pid=36&action=marksentry">Subjectwise Marks</a></li>
<?php }?>
<?php if (in_array("17_3", $admin_permissions)) {?>
<li><a href="?pid=36&action=stdmarksentry">Studentwise Marks</a></li>
<?php }?>
<?php if (in_array("17_7", $admin_permissions)) {?>
<li><a href="?pid=36&action=allstudents">Report</a></li>
<?php }?>
<?php if (in_array("17_4", $admin_permissions)) {?>
<li><a href="?pid=36&action=allstudentsexport">Export Report</a></li>
<?php }?>
<?php if (in_array("17_5", $admin_permissions)) {?>
<li><a href="?pid=36&action=stud_report">Student Report</a></li>
<?php }?>
<?php if (in_array("17_8", $admin_permissions)) {?>
<li><a href="?pid=36&action=chatreports">Examination Report</a></li>
<?php }?>
<?php if (in_array("17_9", $admin_permissions)) {?>
<li><a href="?pid=36&action=chatreports_schoolwise">Institute Report</a></li>
<?php }?>
<li><a href="?pid=100">Student Ranks</a></li>
<li><a href="?pid=102"></a></li>
</ul>
<?php } }if (in_array('18_p', $top_level_permissions) ){if (in_array('18_p', $admin_permissions)){?>
<div class="menuheader expandable"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="37px"><img src="images/attendance_32.png" /></td>
    <td >Attendance</td>
  </tr>
</table></div>
<ul class="categoryitems">
<li><a href="?pid=27&action=slip">Attendance Slips</a></li>
<li><a href="?pid=27&action=stud_attend">Student Attendance</a></li>
<li><a href="?pid=27&action=edit_stud_attendence">Edit Attendance</a></li>
<li><a href="?pid=27&action=staff_attend">Staff Attendance</a></li>
<li><a href="?pid=27&action=edit_staff_attendence">Edit Attendance</a></li>
<li><a href="?pid=27&action=stud_report">Student Report</a></li>
<li><a href="?pid=27&action=class_report">Class Report</a></li>
<li><a href="?pid=27&action=staff_wise_report">Employee Report</a></li>
<li><a href="?pid=27&action=staff_report">Staff  Report</a></li>
</ul>
<?php }}if (in_array('19_p', $top_level_permissions) ){if (in_array('19_p', $admin_permissions)){?>
<div class="menuheader expandable"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="37px"><img src="images/hostel_32.png" /></td>
    <td >Hostel</td>
  </tr>
</table></div>
<ul class="categoryitems">
<li><a href="?pid=19&action=addbuilding">Add Building</a></li>
<li><a href="?pid=19&action=addroom">Add Room</a></li>
<li><a href="?pid=19&action=buildreport">Room Availability</a></li>
<li><a href="?pid=19&action=student_roomallotment">Room Allocation</a></li>
<li><a href="?pid=19&action=view_persons">View Hostel Persons</a></li>
<li><a href="?pid=19&action=collect_items">Collect Items</a></li>
<li><a href="?pid=19&action=prepare_bill">Prepare Bill</a></li>
<li><a href="?pid=19&action=viewdetails">View Details</a></li>
</ul>
<?php }}if (in_array('20_p', $top_level_permissions) ){if (in_array('20_p', $admin_permissions)){?>
<div class="menuheader expandable"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="37px"><img src="images/compose_message_32.png" /></td>
    <td > Message </td>
  </tr>
</table></div>
<ul class="categoryitems">
<li><a href="?pid=50&action=mails_received" class="mainsidelink">Message Inbox</a></li>
<li><a href="?pid=50&action=sentmails" class="mainsidelink">Sent Messages</a></li>
<li><b>Compose Message</b></li>
<?php if (in_array("20_2", $admin_permissions)) {?><li><a href="?pid=50&action=mailtoadmin">To Admin</a></li><?php }?>
<?php if (in_array("20_3", $admin_permissions)) {?><li><a href="?pid=50&action=mailtostaff">To Staff</a></li><?php }?>
<?php if (in_array("20_4", $admin_permissions)) {?><li><a href="?pid=50&action=mailtostudents">To Students</a></li><?php }?>
</ul>
<?php }}if (in_array('32_p', $top_level_permissions) ){if (in_array('32_p', $admin_permissions)){?>
<div class="menuheader expandable"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="37px"><img src="images/idcard_32.png" /></td>
    <td > ID Card </td>
  </tr>
</table></div>
<ul class="categoryitems">
<li><a href="?pid=72&action=addimage">Add Id Card Image</a></li>
<?php if (in_array("32_4", $admin_permissions)) {?>
<li><a href="?pid=72&action=mailtostaff">Staff</a></li>
<?php }?>
<?php if (in_array("32_4", $admin_permissions)) {?>
<li><a href="?pid=72&action=mailtostudents">Students</a></li><?php }?>
</ul>
<?php }}

if (in_array('33_p', $top_level_permissions) ){if (in_array('33_p', $admin_permissions)){?>
<div class="menuheader expandable"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="37px"><img src="images/frontoffice_32.png" /></td>
    <td > Back Office </td>
  </tr>
</table></div>
<ul class="categoryitems">
<li><a href="?pid=74&action=dispatchcategory">Add Dispatch Group</a></li>
<?php if (in_array("33_4", $admin_permissions)) {?>
<li><a href="?pid=74&action=incomingletters">Inward/Outward Dispatch Entry</a></li><?php }?>


<!--<?php //if (in_array("33_5", $admin_permissions)) {?><li><a href="?pid=74&action=outletters">Outward Dispatch Entry</a></li><?php //}?>-->
<li><a href="?pid=74&action=manageletters">Manage Letters</a></li>

</ul>
<?php }}if (in_array('21_p', $top_level_permissions) ){if (in_array('21_p', $admin_permissions)){?>
<div class="menuheader expandable"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="37px"><img src="images/sms_32.png" /></td>
    <td >SMS</td>
  </tr>
</table></div>
<ul class="categoryitems">
<?php if (in_array("21_1", $admin_permissions)) {?><li><a href="?pid=62&action=smstostaff">To Staff</a></li><?php }?>
<?php if (in_array("21_2", $admin_permissions)) {?><li><a href="?pid=62&action=smstostudents">To Students</a></li><?php }?>
<?php /*?><li><a href="?pid=62&action=balance">Check Balance</a></li><?php */?>
<?php if (in_array("21_3", $admin_permissions)) {?><li><a href="?pid=62&action=enquirylist">Enquiry List</a></li><?php }?>
</ul>
<?php }}if (in_array('22_p', $top_level_permissions) ){if (in_array('22_p', $admin_permissions)){?>
<div class="menuheader expandable"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="37px"><img src="images/notice_32.png" /></td>
    <td >Send Notice</td>
  </tr>
</table></div>
<ul class="categoryitems">
<li><a href="?pid=57&action=mails_received" class="mainsidelink">Received Replies</a></li>
<li><a href="?pid=57&action=sentmails" class="mainsidelink">Sent Notices</a></li>
<?php if (in_array("22_1", $admin_permissions)) {?>
<li><a href="?pid=57&action=mailtostaff">To Staff</a></li><?php }?>
<?php if (in_array("22_2", $admin_permissions)) {?><li><a href="?pid=57&action=mailtostudents">To Students</a></li><?php }?>

<!--<li><a href="?pid=57&action=mailtoadmin">Admin</a></li>-->
</ul>

<?php }}if (in_array('23_p', $top_level_permissions) ){if (in_array('23_p', $admin_permissions)){?>
<div class="menuheader" style="cursor: default">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td width="37px"><img src="images/help_32.png" /></td>
    <td ><a href="?pid=53&action=view" class="mainsidelink">Help Desk</a></td>
  </tr>
</table></div>

<?php }}if (in_array('24_p', $top_level_permissions) ){if (in_array('24_p', $admin_permissions)){?>
<div class="menuheader" style="cursor: default">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td width="37px"><img src="images/thought_32.png" /></td>
    <td ><a href="?pid=52&action=tip_day" class="mainsidelink">TODAY'S Thought</a></td>
  </tr>
</table></div>
<?php } }if (in_array('25_p', $top_level_permissions) ){if (in_array('25_p', $admin_permissions)){?>
<?php /*?><div class="menuheader" style="cursor: default">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td width="37px"><img src="images/photo_gallery_32.png" /></td>
    <td ><a href="?pid=54&action=albumlist" class="mainsidelink">Photo Album</a></td>
	<td width="37px"><img src="images/photo_gallery_32.png" /></td>
    <td ><a href="?pid=116&action=abcd" class="mainsidelink">Photo Album1</a></td>
  </tr>
</table></div><?php */?>
<?php }}if (in_array('26_p', $top_level_permissions) ){if (in_array('26_p', $admin_permissions)){?>
<?php /*?><div class="menuheader" style="cursor: default">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td width="37px"><img src="images/video_32.png" /></td>
    <td ><a href="?pid=56&action=gallerylist" class="mainsidelink">Videos</a></td>
  </tr>
</table></div>
<?php */?><?php }}if (in_array('27_p', $top_level_permissions) ){if (in_array('27_p', $admin_permissions)){?>
<div class="menuheader" style="cursor: default">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td width="37px"><img src="images/holiday_32.png" /></td>
    <td ><a href="?pid=58&action=holidayslist" class="mainsidelink">Holidays</a></td>
  </tr>
</table></div>
<?php }}if (in_array('35_p', $top_level_permissions) ){if (in_array('35_p', $admin_permissions)){?>
<div class="menuheader expandable"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="37px"><img src="images/addons_32.png" /></td>
    <td >Helpful Links</td>
  </tr>
</table></div>
<ul class="categoryitems">
<?php if (in_array('35_1', $admin_permissions)){?>
<li><a href="?pid=93&action=addnew">Add Link</a></li>
<?php }?>
<li><a href="?pid=93&action=list"> View Links</a></li>
</ul>
<?php }}if (in_array('28_p', $top_level_permissions) ){if (in_array('28_p', $admin_permissions)){?>
<div class="menuheader expandable"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="37px"><img src="images/security_32.png" /></td>
    <td >Security</td>
  </tr>
</table></div>
<ul class="categoryitems">
<li><a href="?pid=26&action=vehicle">Visitors Record</a></li>
<li><a href="?pid=26&action=report"> Report</a></li>
</ul>
<?php }}if (in_array('29_p', $top_level_permissions) ){if (in_array('29_p', $admin_permissions)){?>
<div class="menuheader expandable"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="37px"><img src="images/backup_32.png" /></td>
    <td >Backup</td>
  </tr>
</table></div>
<ul class="categoryitems">
<?php if (in_array("29_1", $admin_permissions)) {?>
<li><a href="?pid=48&action=Export">Export</a></li><?php }?>
<?php if (in_array("29_2", $admin_permissions)) {?><li><a href="?pid=48&action=Import">Import</a></li><?php }?>
</ul>
<?php }}
if (in_array('30_p', $top_level_permissions) ){if (in_array('30_p', $admin_permissions)){?>
<div class="menuheader expandable"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="37px"><img src="images/knowledge_base_32.png" /></td>
    <td >Knowledge Base</td>
  </tr>
</table></div>
<ul class="categoryitems">
<li><a href="?pid=30&action=know_category">Create Category</a></li>
<li><a href="?pid=30&action=know_categ">Search Articles</a></li>
</ul>
<?php }} if (in_array('31_p', $top_level_permissions) ){if (in_array('31_p', $admin_permissions)){?> 
<div class="menuheader" style="cursor: default">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td width="37px"><img src="images/notice_board_32.png" /></td>
    <td ><a href="?pid=37&action=noticeboard" class="mainsidelink">Notice Board</a></td>
  </tr>
</table></div>
 <?php }}?>
 
 <?php if (in_array('34_p', $top_level_permissions) ){if (in_array('34_p', $admin_permissions) && in_array('34_1', $admin_permissions)){?> 
<div class="menuheader" style="cursor: default">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td width="37px"><img src="images/roll_management.png" /></td>
    <td ><a href="?pid=91&action=report" class="mainsidelink">Role Management</a></td>
  </tr>
</table></div>
 <?php }}?>
 

</div></td>
  </tr>
</table>

